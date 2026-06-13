<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Models\User\YeuThichModel;

class YeuThichController extends Controller
{
    /**
     * API: Toggle yêu thích sản phẩm
     * POST /api/yeu-thich/toggle
     * Body: { id_san_pham: "..." }
     */
    public function toggle()
    {
        header('Content-Type: application/json');

        if (empty($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để sử dụng chức năng này']);
            return;
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $productId = $input['id_san_pham'] ?? ($_POST['id_san_pham'] ?? '');

        if (empty($productId)) {
            echo json_encode(['success' => false, 'message' => 'Thiếu ID sản phẩm']);
            return;
        }

        $model = new YeuThichModel();
        $isLiked = $model->toggle($_SESSION['user_id'], $productId);
        $total = $model->countByUser($_SESSION['user_id']);

        echo json_encode([
            'success' => true,
            'is_liked' => $isLiked,
            'total' => $total
        ]);
    }

    /**
     * API: Lấy danh sách ID sản phẩm đã yêu thích
     * GET /api/yeu-thich/danh-sach
     */
    public function getIds()
    {
        header('Content-Type: application/json');

        if (empty($_SESSION['user_id'])) {
            echo json_encode(['success' => true, 'data' => [], 'total' => 0]);
            return;
        }

        $model = new YeuThichModel();
        $ids = $model->getProductIds($_SESSION['user_id']);
        $total = count($ids);

        echo json_encode([
            'success' => true,
            'data' => $ids,
            'total' => $total
        ]);
    }
}
