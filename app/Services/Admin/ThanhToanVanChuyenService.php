<?php
namespace App\Services\Admin;

use App\Models\PhuongThucThanhToanModel;
use App\Models\TaiKhoanNganHangModel;
use App\Models\PhuongThucVanChuyenModel;
use App\Models\KhuVucGiaoHangModel;
use App\Models\QuyTacFreeshipModel;
use Exception;

class ThanhToanVanChuyenService
{
    private $paymentModel;
    private $bankModel;
    private $shippingModel;
    private $zoneModel;
    private $freeshipModel;

    public function __construct()
    {
        $this->paymentModel = new PhuongThucThanhToanModel();
        $this->bankModel = new TaiKhoanNganHangModel();
        $this->shippingModel = new PhuongThucVanChuyenModel();
        $this->zoneModel = new KhuVucGiaoHangModel();
        $this->freeshipModel = new QuyTacFreeshipModel();
    }

    public function getAllData(): array
    {
        return [
            'payments' => $this->paymentModel->getAll(),
            'banks' => $this->bankModel->getAll(),
            'shipping_methods' => $this->shippingModel->getAll(),
            'shipping_zones' => $this->zoneModel->getAll(),
            'freeship_rules' => $this->freeshipModel->getAll(),
        ];
    }

    // ==================== PAYMENTS ====================
    public function savePayment(array $data, ?int $id = null): array
    {
        if (empty($data['ten'])) return ['success' => false, 'message' => 'Tên phương thức không được để trống.'];

        if ($id) {
            $this->paymentModel->update($id, $data);
            return ['success' => true, 'message' => 'Đã cập nhật phương thức thanh toán.'];
        } else {
            if (empty($data['ma'])) return ['success' => false, 'message' => 'Mã phương thức không được để trống.'];
            $newId = $this->paymentModel->create($data);
            return ['success' => true, 'message' => 'Đã thêm phương thức thanh toán.', 'id' => $newId];
        }
    }

    public function togglePayment(int $id): array
    {
        $this->paymentModel->toggleStatus($id);
        return ['success' => true, 'message' => 'Đã thay đổi trạng thái.'];
    }

    public function deletePayment(int $id): array
    {
        $this->paymentModel->delete($id);
        return ['success' => true, 'message' => 'Đã xóa phương thức thanh toán.'];
    }

    // ==================== BANKS ====================
    public function saveBank(array $data, ?int $id = null): array
    {
        if (empty($data['ten_ngan_hang'])) return ['success' => false, 'message' => 'Tên ngân hàng không được để trống.'];
        if (empty($data['chu_tai_khoan'])) return ['success' => false, 'message' => 'Chủ tài khoản không được để trống.'];
        if (empty($data['so_tai_khoan'])) return ['success' => false, 'message' => 'Số tài khoản không được để trống.'];

        if ($id) {
            $this->bankModel->update($id, $data);
            return ['success' => true, 'message' => 'Đã cập nhật tài khoản ngân hàng.'];
        } else {
            $newId = $this->bankModel->create($data);
            return ['success' => true, 'message' => 'Đã thêm tài khoản ngân hàng.', 'id' => $newId];
        }
    }

    public function deleteBank(int $id): array
    {
        $this->bankModel->delete($id);
        return ['success' => true, 'message' => 'Đã xóa tài khoản ngân hàng.'];
    }

    public function setDefaultBank(int $id): array
    {
        $this->bankModel->setDefault($id);
        return ['success' => true, 'message' => 'Đã đặt tài khoản mặc định.'];
    }

    public function toggleBank(int $id): array
    {
        $this->bankModel->toggleStatus($id);
        return ['success' => true, 'message' => 'Đã thay đổi trạng thái tài khoản.'];
    }

    public function uploadBankQr(array $file, int $bankId): string
    {
        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mime, $allowedMimes)) {
            throw new Exception('Định dạng file không hỗ trợ.');
        }
        if ($file['size'] > 5 * 1024 * 1024) {
            throw new Exception('File không vượt quá 5MB.');
        }

        $dir = __DIR__ . '/../../../public/uploads/bank/';
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION) ?: 'png';
        $filename = 'qr_' . $bankId . '_' . time() . '.' . strtolower($ext);

        if (!move_uploaded_file($file['tmp_name'], $dir . $filename)) {
            throw new Exception('Không thể lưu file.');
        }

        $url = APP_URL . '/public/uploads/bank/' . $filename;
        // Update DB
        $bank = $this->bankModel->getById($bankId);
        if ($bank) {
            $bank['qr_image'] = $url;
            $this->bankModel->update($bankId, $bank);
        }
        return $url;
    }

    // ==================== SHIPPING ====================
    public function saveShipping(array $data, ?int $id = null): array
    {
        if (empty($data['ten'])) return ['success' => false, 'message' => 'Tên phương thức không được để trống.'];

        if ($id) {
            $this->shippingModel->update($id, $data);
            return ['success' => true, 'message' => 'Đã cập nhật phương thức vận chuyển.'];
        } else {
            if (empty($data['ma'])) return ['success' => false, 'message' => 'Mã phương thức không được để trống.'];
            $newId = $this->shippingModel->create($data);
            return ['success' => true, 'message' => 'Đã thêm phương thức vận chuyển.', 'id' => $newId];
        }
    }

    public function toggleShipping(int $id): array
    {
        $this->shippingModel->toggleStatus($id);
        return ['success' => true, 'message' => 'Đã thay đổi trạng thái.'];
    }

    public function deleteShipping(int $id): array
    {
        $this->shippingModel->delete($id);
        return ['success' => true, 'message' => 'Đã xóa phương thức vận chuyển.'];
    }

    // ==================== ZONES ====================
    public function saveZone(array $data, ?int $id = null): array
    {
        if (empty($data['ten'])) return ['success' => false, 'message' => 'Tên khu vực không được để trống.'];

        if ($id) {
            $this->zoneModel->update($id, $data);
            return ['success' => true, 'message' => 'Đã cập nhật khu vực giao hàng.'];
        } else {
            $newId = $this->zoneModel->create($data);
            return ['success' => true, 'message' => 'Đã thêm khu vực giao hàng.', 'id' => $newId];
        }
    }

    public function deleteZone(int $id): array
    {
        $this->zoneModel->delete($id);
        return ['success' => true, 'message' => 'Đã xóa khu vực giao hàng.'];
    }

    // ==================== FREESHIP ====================
    public function saveFreeship(array $data, ?int $id = null): array
    {
        if (empty($data['ten'])) return ['success' => false, 'message' => 'Tên quy tắc không được để trống.'];

        if ($id) {
            $this->freeshipModel->update($id, $data);
            return ['success' => true, 'message' => 'Đã cập nhật quy tắc freeship.'];
        } else {
            $newId = $this->freeshipModel->create($data);
            return ['success' => true, 'message' => 'Đã thêm quy tắc freeship.', 'id' => $newId];
        }
    }

    public function deleteFreeship(int $id): array
    {
        $this->freeshipModel->delete($id);
        return ['success' => true, 'message' => 'Đã xóa quy tắc freeship.'];
    }

    public function toggleFreeship(int $id): array
    {
        $this->freeshipModel->toggleStatus($id);
        return ['success' => true, 'message' => 'Đã thay đổi trạng thái.'];
    }
}
