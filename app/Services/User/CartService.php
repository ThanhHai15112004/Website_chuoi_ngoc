<?php

namespace App\Services\User;

use App\Models\Admin\GioHangModel;

class CartService {
    private $model;
    private const MAX_QTY_PER_ITEM = 50;

    public function __construct() {
        $this->model = new GioHangModel();
    }

    /**
     * Kiểm tra user đã đăng nhập chưa
     */
    private function getUserId() {
        return $_SESSION['user_id'] ?? $_SESSION['user']['id'] ?? null;
    }

    /**
     * Gen UUID
     */
    private function uuid() {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    // =====================================================
    // THÊM VÀO GIỎ
    // =====================================================

    public function addItem($id_san_pham, $id_bien_the = null, $so_luong = 1) {
        // Validate sản phẩm tồn tại
        $sp = $this->model->layThongTinSanPham($id_san_pham);
        if (!$sp) {
            return ['success' => false, 'message' => 'Sản phẩm không tồn tại hoặc đã ngừng bán.'];
        }

        // Validate biến thể
        $bien_the = null;
        if ($id_bien_the) {
            $bien_the = $this->model->layThongTinBienThe($id_bien_the);
            if (!$bien_the || $bien_the['id_san_pham'] !== $id_san_pham) {
                return ['success' => false, 'message' => 'Phân loại sản phẩm không hợp lệ.'];
            }
        }

        // Validate tồn kho
        $ton_kho = $bien_the ? (int)$bien_the['so_luong_ton'] : (int)$sp['tong_ton_kho'];
        if ($ton_kho <= 0) {
            return ['success' => false, 'message' => 'Sản phẩm đã hết hàng.'];
        }

        $userId = $this->getUserId();

        if ($userId) {
            return $this->addItemDB($userId, $id_san_pham, $id_bien_the, $so_luong, $ton_kho);
        } else {
            return $this->addItemSession($id_san_pham, $id_bien_the, $so_luong, $ton_kho);
        }
    }

    private function addItemDB($userId, $id_san_pham, $id_bien_the, $so_luong, $ton_kho) {
        $existing = $this->model->timItem($userId, $id_san_pham, $id_bien_the);
        
        if ($existing) {
            $newQty = (int)$existing['so_luong'] + $so_luong;
            $newQty = min($newQty, self::MAX_QTY_PER_ITEM, $ton_kho);
            $this->model->capNhatSoLuong($existing['id'], $newQty);
        } else {
            $so_luong = min($so_luong, self::MAX_QTY_PER_ITEM, $ton_kho);
            $this->model->themItem($this->uuid(), $userId, $id_san_pham, $id_bien_the, $so_luong);
        }

        return ['success' => true, 'message' => 'Đã thêm vào giỏ hàng!', 'count' => $this->getCount()];
    }

    private function addItemSession($id_san_pham, $id_bien_the, $so_luong, $ton_kho) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Tìm item trùng
        $foundIndex = null;
        foreach ($_SESSION['cart'] as $i => $item) {
            if ($item['id_san_pham'] === $id_san_pham && $item['id_bien_the'] === $id_bien_the) {
                $foundIndex = $i;
                break;
            }
        }

        if ($foundIndex !== null) {
            $newQty = $_SESSION['cart'][$foundIndex]['so_luong'] + $so_luong;
            $newQty = min($newQty, self::MAX_QTY_PER_ITEM, $ton_kho);
            $_SESSION['cart'][$foundIndex]['so_luong'] = $newQty;
        } else {
            $so_luong = min($so_luong, self::MAX_QTY_PER_ITEM, $ton_kho);
            $_SESSION['cart'][] = [
                'id_san_pham' => $id_san_pham,
                'id_bien_the' => $id_bien_the,
                'so_luong' => $so_luong
            ];
        }

        return ['success' => true, 'message' => 'Đã thêm vào giỏ hàng!', 'count' => $this->getCount()];
    }

    // =====================================================
    // CẬP NHẬT SỐ LƯỢNG
    // =====================================================

    public function updateItem($index, $so_luong) {
        $so_luong = max(1, min((int)$so_luong, self::MAX_QTY_PER_ITEM));
        $userId = $this->getUserId();

        if ($userId) {
            return $this->updateItemDB($userId, $index, $so_luong);
        } else {
            return $this->updateItemSession($index, $so_luong);
        }
    }

    private function updateItemDB($userId, $cartItemId, $so_luong) {
        // $cartItemId here is the gio_hang.id
        $cart = $this->model->layGioHangTheoUser($userId);
        $found = null;
        foreach ($cart as $item) {
            if ($item['id'] === $cartItemId) {
                $found = $item;
                break;
            }
        }
        if (!$found) {
            return ['success' => false, 'message' => 'Sản phẩm không có trong giỏ.'];
        }

        // Check stock
        $ton_kho = $found['id_bien_the'] ? (int)$found['bt_ton_kho'] : (int)$found['tong_ton_kho'];
        if ($so_luong > $ton_kho) {
            $so_luong = $ton_kho;
        }

        $this->model->capNhatSoLuong($cartItemId, $so_luong);
        return ['success' => true, 'message' => 'Đã cập nhật số lượng.', 'so_luong' => $so_luong, 'count' => $this->getCount()];
    }

    private function updateItemSession($index, $so_luong) {
        if (!isset($_SESSION['cart'][$index])) {
            return ['success' => false, 'message' => 'Sản phẩm không có trong giỏ.'];
        }

        $item = $_SESSION['cart'][$index];
        $sp = $this->model->layThongTinSanPham($item['id_san_pham']);
        if (!$sp) {
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            return ['success' => false, 'message' => 'Sản phẩm không còn tồn tại.'];
        }

        $ton_kho = (int)$sp['tong_ton_kho'];
        if ($item['id_bien_the']) {
            $bt = $this->model->layThongTinBienThe($item['id_bien_the']);
            if ($bt) $ton_kho = (int)$bt['so_luong_ton'];
        }

        if ($so_luong > $ton_kho) {
            $so_luong = $ton_kho;
        }

        $_SESSION['cart'][$index]['so_luong'] = $so_luong;
        return ['success' => true, 'message' => 'Đã cập nhật số lượng.', 'so_luong' => $so_luong, 'count' => $this->getCount()];
    }

    // =====================================================
    // XÓA ITEM
    // =====================================================

    public function removeItem($index) {
        $userId = $this->getUserId();
        if ($userId) {
            return $this->removeItemDB($index);
        } else {
            return $this->removeItemSession($index);
        }
    }

    private function removeItemDB($cartItemId) {
        $this->model->xoaItem($cartItemId);
        return ['success' => true, 'message' => 'Đã xóa sản phẩm khỏi giỏ hàng.', 'count' => $this->getCount()];
    }

    private function removeItemSession($index) {
        if (isset($_SESSION['cart'][$index])) {
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
        return ['success' => true, 'message' => 'Đã xóa sản phẩm khỏi giỏ hàng.', 'count' => $this->getCount()];
    }

    // =====================================================
    // LẤY GIỎ HÀNG (Full data cho view)
    // =====================================================

    public function getCart() {
        $userId = $this->getUserId();
        if ($userId) {
            return $this->getCartDB($userId);
        } else {
            return $this->getCartSession();
        }
    }

    private function getCartDB($userId) {
        $rows = $this->model->layGioHangTheoUser($userId);
        $result = [];
        foreach ($rows as $row) {
            $gia_ban = (float)$row['gia_ban'];
            $gia_km = $row['gia_khuyen_mai'] ? (float)$row['gia_khuyen_mai'] : null;
            $gia_hien_tai = $gia_km ?: $gia_ban;
            $gia_cong_them = $row['gia_cong_them'] ? (float)$row['gia_cong_them'] : 0;
            $gia_cuoi = $gia_hien_tai + $gia_cong_them;

            $ton_kho = $row['id_bien_the'] ? (int)$row['bt_ton_kho'] : (int)$row['tong_ton_kho'];
            $con_hang = $ton_kho > 0 && $row['sp_trang_thai'] == 1;

            $hinh_anh = $row['hinh_anh_chinh'];
            if ($hinh_anh && strpos($hinh_anh, 'http') !== 0) {
                $hinh_anh = APP_URL . '/' . ltrim($hinh_anh, '/');
            }

            $result[] = [
                'cart_id' => $row['id'],  // gio_hang.id (for DB updates)
                'id_san_pham' => $row['id_san_pham'],
                'id_bien_the' => $row['id_bien_the'],
                'ten' => $row['ten_sp'],
                'hinh_anh' => $hinh_anh ?: APP_URL . '/images/Logo_.jpg',
                'loai_da' => $row['ten_loai_da'] ?? '',
                'menh' => $row['ten_menh'] ?? '',
                'danh_muc' => $row['ten_danh_muc'] ?? '',
                'bien_the' => $row['ten_bien_the'] ?? '',
                'gia' => $gia_cuoi,
                'gia_goc' => ($gia_km && $gia_km < $gia_ban) ? ($gia_ban + $gia_cong_them) : null,
                'so_luong' => (int)$row['so_luong'],
                'con_hang' => $con_hang,
                'ton_kho' => $ton_kho,
                'slug' => $row['sp_slug'] ?? '',
                'id_danh_muc' => $row['id_danh_muc'] ?? null
            ];
        }
        return $result;
    }

    private function getCartSession() {
        if (empty($_SESSION['cart'])) return [];

        $result = [];
        foreach ($_SESSION['cart'] as $index => $item) {
            $sp = $this->model->layThongTinSanPham($item['id_san_pham']);
            if (!$sp) continue; // SP đã bị xóa

            $gia_ban = (float)$sp['gia_ban'];
            $gia_km = $sp['gia_khuyen_mai'] ? (float)$sp['gia_khuyen_mai'] : null;
            $gia_hien_tai = $gia_km ?: $gia_ban;

            $bien_the_ten = '';
            $gia_cong_them = 0;
            $ton_kho = (int)$sp['tong_ton_kho'];

            if ($item['id_bien_the']) {
                $bt = $this->model->layThongTinBienThe($item['id_bien_the']);
                if ($bt) {
                    $bien_the_ten = $bt['thuoc_tinh'];
                    $gia_cong_them = (float)$bt['gia_cong_them'];
                    $ton_kho = (int)$bt['so_luong_ton'];
                }
            }

            $gia_cuoi = $gia_hien_tai + $gia_cong_them;
            $con_hang = $ton_kho > 0 && $sp['trang_thai'] == 1;

            $hinh_anh = $sp['hinh_anh_chinh'];
            if ($hinh_anh && strpos($hinh_anh, 'http') !== 0) {
                $hinh_anh = APP_URL . '/' . ltrim($hinh_anh, '/');
            }

            $result[] = [
                'cart_id' => $index,  // session index (for session updates)
                'id_san_pham' => $item['id_san_pham'],
                'id_bien_the' => $item['id_bien_the'],
                'ten' => $sp['ten_sp'],
                'hinh_anh' => $hinh_anh ?: APP_URL . '/images/Logo_.jpg',
                'loai_da' => $sp['ten_loai_da'] ?? '',
                'menh' => $sp['ten_menh'] ?? '',
                'danh_muc' => $sp['ten_danh_muc'] ?? '',
                'bien_the' => $bien_the_ten,
                'gia' => $gia_cuoi,
                'gia_goc' => ($gia_km && $gia_km < $gia_ban) ? ($gia_ban + $gia_cong_them) : null,
                'so_luong' => (int)$item['so_luong'],
                'con_hang' => $con_hang,
                'ton_kho' => $ton_kho,
                'slug' => $sp['slug'] ?? '',
                'id_danh_muc' => $sp['id_danh_muc'] ?? null
            ];
        }
        return $result;
    }

    // =====================================================
    // ĐẾM SỐ LƯỢNG
    // =====================================================

    public function getCount() {
        $userId = $this->getUserId();
        if ($userId) {
            return $this->model->demSoItem($userId);
        } else {
            if (empty($_SESSION['cart'])) return 0;
            $total = 0;
            foreach ($_SESSION['cart'] as $item) {
                $total += (int)$item['so_luong'];
            }
            return $total;
        }
    }

    // =====================================================
    // KIỂM TRA SẢN PHẨM CÓ BIẾN THỂ KHÔNG
    // =====================================================

    public function getProductVariants($id_san_pham) {
        $sp = $this->model->layThongTinSanPham($id_san_pham);
        if (!$sp) return null;

        $bien_the = $this->model->layBienThe($id_san_pham);

        $hinh_anh = $sp['hinh_anh_chinh'];
        if ($hinh_anh && strpos($hinh_anh, 'http') !== 0) {
            $hinh_anh = APP_URL . '/' . ltrim($hinh_anh, '/');
        }

        return [
            'id' => $sp['id'],
            'ten' => $sp['ten_sp'],
            'hinh_anh' => $hinh_anh ?: APP_URL . '/images/Logo_.jpg',
            'gia_ban' => (float)$sp['gia_ban'],
            'gia_khuyen_mai' => $sp['gia_khuyen_mai'] ? (float)$sp['gia_khuyen_mai'] : null,
            'tong_ton_kho' => (int)$sp['tong_ton_kho'],
            'bien_the' => $bien_the
        ];
    }

    // =====================================================
    // MERGE SESSION CART → DB (khi user đăng nhập)
    // =====================================================

    public function mergeSessionToDb($userId) {
        if (empty($_SESSION['cart'])) return;

        foreach ($_SESSION['cart'] as $item) {
            $sp = $this->model->layThongTinSanPham($item['id_san_pham']);
            if (!$sp) continue;

            $ton_kho = (int)$sp['tong_ton_kho'];
            if ($item['id_bien_the']) {
                $bt = $this->model->layThongTinBienThe($item['id_bien_the']);
                if ($bt) $ton_kho = (int)$bt['so_luong_ton'];
            }

            $existing = $this->model->timItem($userId, $item['id_san_pham'], $item['id_bien_the']);
            if ($existing) {
                $newQty = (int)$existing['so_luong'] + (int)$item['so_luong'];
                $newQty = min($newQty, self::MAX_QTY_PER_ITEM, $ton_kho);
                $this->model->capNhatSoLuong($existing['id'], $newQty);
            } else {
                $so_luong = min((int)$item['so_luong'], self::MAX_QTY_PER_ITEM, $ton_kho);
                if ($so_luong > 0) {
                    $this->model->themItem($this->uuid(), $userId, $item['id_san_pham'], $item['id_bien_the'], $so_luong);
                }
            }
        }

        // Clear session cart after merge
        unset($_SESSION['cart']);
    }

    // =====================================================
    // XÓA TOÀN BỘ GIỎ HÀNG
    // =====================================================

    public function clearCart($userId = null) {
        if ($userId) {
            $this->model->xoaTatCa($userId);
        }
        unset($_SESSION['cart']);
    }
}
