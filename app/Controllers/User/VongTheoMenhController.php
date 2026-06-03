<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Services\User\BanMenhService;
use App\Models\Admin\BanMenhModel;
use App\Models\Admin\MenhPhongThuyModel;

class VongTheoMenhController extends Controller
{
    private BanMenhService $banMenhService;
    private BanMenhModel $banMenhModel;

    public function __construct()
    {
        $this->banMenhService = new BanMenhService();
        $this->banMenhModel   = new BanMenhModel();
    }

    /**
     * Trang chủ Vòng Theo Mệnh
     */
    public function index(): void
    {
        $data = [
            'tieu_de'       => 'Vòng Theo Mệnh – Khám Phá Bản Mệnh Phong Thủy | Chuỗi Ngọc',
            'trang_hien_tai' => 'vong_theo_menh',
            'breadcrumbs'   => [
                ['ten' => 'Trang chủ',   'url' => APP_URL . '/'],
                ['ten' => 'Vòng Theo Mệnh', 'url' => APP_URL . '/vong-theo-menh'],
            ],
        ];

        $this->view('vong_theo_menh', $data);
    }

    /**
     * Xử lý phân tích bản mệnh – POST AJAX
     * Lưu kết quả và redirect tới trang chi tiết
     */
    public function analyze(): void
    {
        header('Content-Type: application/json; charset=utf-8');

        // 1. Nhận và validate input
        $day      = isset($_POST['birth_day'])   ? (int)trim($_POST['birth_day'])   : 0;
        $month    = isset($_POST['birth_month']) ? (int)trim($_POST['birth_month']) : 0;
        $year     = isset($_POST['birth_year'])  ? (int)trim($_POST['birth_year'])  : 0;
        $gender   = isset($_POST['gender'])      ? trim($_POST['gender'])            : '';
        $desire   = isset($_POST['desire'])      ? trim($_POST['desire'])            : '';
        $lichType = isset($_POST['lich_type'])   ? trim($_POST['lich_type'])         : 'duong';

        $errors = [];
        if ($day < 1 || $day > 31)                      $errors[] = 'Ngày sinh không hợp lệ.';
        if ($month < 1 || $month > 12)                   $errors[] = 'Tháng sinh không hợp lệ.';
        if ($year < 1920 || $year > (int)date('Y'))     $errors[] = 'Năm sinh không hợp lệ (1920–' . date('Y') . ').';
        if (!in_array($gender, ['male', 'female']))      $errors[] = 'Vui lòng chọn giới tính.';
        if (!in_array($lichType, ['duong', 'am']))       $lichType = 'duong';
        if (!empty($desire) && !in_array($desire, ['tai_loc', 'binh_an', 'tinh_duyen', 'ho_menh'])) $desire = '';

        if (!empty($errors)) {
            echo json_encode(['success' => false, 'errors' => $errors]);
            return;
        }

        // 2. Phân tích bản mệnh
        $ketQua = $this->banMenhService->phanTich($day, $month, $year, $gender, $desire, $lichType);

        // 3. Lấy sản phẩm gợi ý từ DB
        $cache  = $ketQua['_cache'];
        $idMenh = $this->banMenhModel->layIdMenhTheoTen($cache['ten_menh']);

        // Lấy tên đá quý từ service data
        $tenDaTuongSinh = array_column($ketQua['da_quy']['tot_nhat'], 'ten');
        $tenDaCungHanh  = array_column($ketQua['da_quy']['phu_hop'], 'ten');

        // Tìm ID loại đá trong DB (nếu có đặt tên khớp)
        $idDaTuongSinh = !empty($tenDaTuongSinh) ? $this->banMenhModel->layIdLoaiDaTheoTen($tenDaTuongSinh) : [];
        $idDaCungHanh  = !empty($tenDaCungHanh)  ? $this->banMenhModel->layIdLoaiDaTheoTen($tenDaCungHanh)  : [];

        $sanPhamGoiY = $this->banMenhModel->laySanPhamHopMenh($idMenh ?? '', $idDaTuongSinh, $idDaCungHanh, 8);
        $ketQua['san_pham_goi_y'] = $sanPhamGoiY;

        // Xóa cache nội bộ trước khi serialize
        unset($ketQua['_cache']);

        // 4. Tạo slug UUID cho URL kết quả
        $slugKetQua = $this->generateUUID();

        // 5. Lưu vào DB
        $idNguoiDung = $_SESSION['user_id'] ?? null;

        $this->banMenhModel->luuKetQua([
            'id'            => $this->generateUUID(),
            'id_nguoi_dung' => $idNguoiDung,
            'slug_ket_qua'  => $slugKetQua,
            'loai_lich'     => $lichType,
            'ngay_sinh'     => $day,
            'thang_sinh'    => $month,
            'nam_sinh'      => $year,
            'gioi_tinh'     => $gender,
            'mong_muon'     => $desire ?: null,
            'ten_menh'      => $cache['ten_menh'],
            'thien_can'     => $cache['thien_can'],
            'dia_chi'       => $cache['dia_chi'],
            'cung_phi'      => $cache['cung_phi'],
            'ten_cung'      => $cache['ten_cung'],
            'nhom_menh'     => $cache['nhom_menh'],
            'ket_qua_json'  => json_encode($ketQua, JSON_UNESCAPED_UNICODE),
        ]);

        // 6. Trả về redirect URL
        echo json_encode([
            'success'      => true,
            'redirect_url' => APP_URL . '/vong-theo-menh/ket-qua/' . $slugKetQua,
        ]);
    }

    /**
     * Trang kết quả phân tích theo slug
     */
    public function ketQua(string $slug = ''): void
    {
        $slug = trim($slug);


        if (empty($slug)) {
            header('Location: ' . APP_URL . '/vong-theo-menh');
            exit;
        }

        $row = $this->banMenhModel->layTheoSlug($slug);

        if (!$row) {
            // Không tìm thấy kết quả
            $data = [
                'tieu_de'       => 'Không tìm thấy kết quả | Chuỗi Ngọc',
                'trang_hien_tai' => 'vong_theo_menh',
                'not_found'     => true,
            ];
            $this->view('ket_qua_ban_menh', $data);
            return;
        }

        $ketQuaData = json_decode($row['ket_qua_json'], true);

        $data = [
            'tieu_de'        => 'Bản Mệnh ' . $row['ten_menh'] . ' – ' . $row['thien_can'] . ' ' . $row['dia_chi'] . ' | Chuỗi Ngọc',
            'trang_hien_tai' => 'vong_theo_menh',
            'breadcrumbs'    => [
                ['ten' => 'Trang chủ',       'url' => APP_URL . '/'],
                ['ten' => 'Vòng Theo Mệnh',  'url' => APP_URL . '/vong-theo-menh'],
                ['ten' => 'Kết quả bản mệnh','url' => null],
            ],
            'row'       => $row,
            'ket_qua'   => $ketQuaData,
            'slug'      => $slug,
        ];

        $this->view('ket_qua_ban_menh', $data);
    }

    /**
     * Generate UUID v4
     */
    private function generateUUID(): string
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}
