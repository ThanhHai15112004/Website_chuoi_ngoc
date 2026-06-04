<?php
namespace App\Controllers\User;

use App\Core\Controller;
use App\Models\Admin\DanhGiaModel;

class DanhGiaController extends Controller
{
    private $danhGiaModel;

    public function __construct()
    {
        $this->danhGiaModel = new DanhGiaModel();
    }

    public function submit()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid method']);
            return;
        }

        if (!$this->isLoggedIn()) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để đánh giá.']);
            return;
        }

        $userId = $_SESSION['user_id'];
        $productId = $_POST['id_san_pham'] ?? '';
        $reviewId = $_POST['review_id'] ?? '';
        
        if (empty($productId)) {
            echo json_encode(['success' => false, 'message' => 'Thiếu ID sản phẩm.']);
            return;
        }

        // Kiểm tra đã mua hàng
        if (!$this->danhGiaModel->hasBought($userId, $productId)) {
            echo json_encode(['success' => false, 'message' => 'Bạn chưa mua sản phẩm này hoặc đơn hàng chưa hoàn thành.']);
            return;
        }

        // Lấy thông tin
        $soSao = (int)($_POST['so_sao'] ?? 0);
        $saoChatLuong = (int)($_POST['sao_chat_luong'] ?? 0);
        $saoMoTa = (int)($_POST['sao_mo_ta'] ?? 0);
        $saoDichVu = (int)($_POST['sao_dich_vu'] ?? 0);
        $noiDung = trim($_POST['noi_dung'] ?? '');
        $bienTheMua = $_POST['bien_the_mua'] ?? null;

        // Validate: phải chọn ít nhất 1 sao đánh giá chung
        if ($soSao < 1 || $soSao > 5) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng chọn số sao đánh giá chung (1-5).']);
            return;
        }

        // Xử lý upload ảnh (nếu có)
        // Note: Project currently doesn't use complex Cloudinary uploads here, we'll save local if needed, 
        // but for now let's just handle simple comma-separated string if provided by client or basic file upload.
        $hinhAnhPaths = [];
        if (!empty($_FILES['hinh_anh']['name'][0])) {
            $uploadDir = __DIR__ . '/../../../public/uploads/danh_gia/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            foreach ($_FILES['hinh_anh']['tmp_name'] as $key => $tmpName) {
                if ($_FILES['hinh_anh']['error'][$key] === UPLOAD_ERR_OK) {
                    $filename = uniqid() . '-' . basename($_FILES['hinh_anh']['name'][$key]);
                    $targetPath = $uploadDir . $filename;
                    if (move_uploaded_file($tmpName, $targetPath)) {
                        $hinhAnhPaths[] = '/uploads/danh_gia/' . $filename;
                    }
                }
            }
        }
        
        $hinhAnhStr = !empty($hinhAnhPaths) ? implode(',', $hinhAnhPaths) : null;

        $data = [
            'id_san_pham' => $productId,
            'id_nguoi_dung' => $userId,
            'bien_the_mua' => $bienTheMua,
            'so_sao' => $soSao,
            'sao_chat_luong' => $saoChatLuong,
            'sao_mo_ta' => $saoMoTa,
            'sao_dich_vu' => $saoDichVu,
            'noi_dung' => $noiDung,
            'hinh_anh' => $hinhAnhStr
        ];

        // Nếu có reviewId, đây là sửa đánh giá
        if (!empty($reviewId)) {
            // Lấy review cũ xem hình ảnh
            $oldReview = $this->danhGiaModel->getUserReview($userId, $productId);
            if ($oldReview && $oldReview['id'] === $reviewId) {
                // Giữ lại hình ảnh cũ nếu không up hình mới
                if (empty($hinhAnhStr)) {
                    $data['hinh_anh'] = $oldReview['hinh_anh'];
                }
                
                $success = $this->danhGiaModel->updateUserReview($reviewId, $userId, $data);
                if ($success) {
                    echo json_encode(['success' => true, 'message' => 'Cập nhật đánh giá thành công! Đánh giá đang chờ duyệt.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi cập nhật.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Không tìm thấy bài đánh giá của bạn.']);
            }
            return;
        }

        // Thêm mới
        $existing = $this->danhGiaModel->getUserReview($userId, $productId);
        if ($existing) {
            echo json_encode(['success' => false, 'message' => 'Bạn đã đánh giá sản phẩm này rồi.']);
            return;
        }

        $result = $this->danhGiaModel->insert($data);
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Cảm ơn bạn đã đánh giá! Đánh giá đang chờ duyệt.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra.']);
        }
    }

    public function getList()
    {
        // AJAX cho Load More
        header('Content-Type: application/json');
        $productId = $_GET['id_sp'] ?? '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        if (empty($productId)) {
            echo json_encode(['success' => false, 'data' => []]);
            return;
        }

        $reviews = $this->danhGiaModel->getByProductId($productId, $limit, $offset);
        $stats = $this->danhGiaModel->getStatsByProductId($productId);
        $total = $stats['tong_danh_gia'] ?? 0;

        echo json_encode([
            'success' => true, 
            'data' => $reviews,
            'total' => $total,
            'page' => $page,
            'limit' => $limit
        ]);
    }
}
