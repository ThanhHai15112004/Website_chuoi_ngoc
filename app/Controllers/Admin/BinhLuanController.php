<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class BinhLuanController extends Controller
{
    public function index()
    {
        $thong_ke = [
            'tong' => 1248,
            'cho_duyet' => 18,
            'da_duyet' => 1120,
            'da_an' => 42,
            'diem_tb' => 4.8,
            'co_anh' => 326
        ];

        $reviews = [
            [
                'id' => 1,
                'loai' => 'danh_gia',
                'ten_khach' => 'Nguyễn Văn A',
                'hang_thanh_vien' => 'Gold',
                'da_mua' => true,
                'san_pham' => 'Vòng Ngọc Bích Tài Lộc',
                'ma_sp' => 'NB-TL-001',
                'anh_sp' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg',
                'sao' => 5,
                'noi_dung' => 'Vòng đẹp, màu ngọc sáng nhẹ nhàng, đóng gói cực kỳ cẩn thận. Mình mua làm quà tặng mẹ, mẹ mình rất ưng ý. Sẽ ủng hộ shop thêm nhiều lần nữa!',
                'anh_dinh_kem' => [
                    APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-2.jpg',
                    APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-3.jpg'
                ],
                'trang_thai' => 'cho_duyet',
                'thoi_gian' => '2 giờ trước',
                'phan_hoi' => null
            ],
            [
                'id' => 2,
                'loai' => 'danh_gia',
                'ten_khach' => 'Trần Thị B',
                'hang_thanh_vien' => 'Silver',
                'da_mua' => true,
                'san_pham' => 'Chuỗi Đá Obsidian',
                'ma_sp' => 'OB-002',
                'anh_sp' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg',
                'sao' => 2,
                'noi_dung' => 'Màu đá hơi tối so với ảnh trên web. Mình tay nhỏ đeo dây này cảm giác hơi lỏng lẻo, shop có nhận đổi size dây không ạ?',
                'anh_dinh_kem' => [],
                'trang_thai' => 'da_duyet',
                'thoi_gian' => '1 ngày trước',
                'phan_hoi' => [
                    'nhan_vien' => 'Hải Admin',
                    'thoi_gian' => '1 ngày trước',
                    'noi_dung' => 'Chào bạn, Chuỗi Ngọc xin ghi nhận phản hồi của bạn. Các mẫu Obsidian tự nhiên sẽ có tông đen đặc trưng. Về phần dây rộng, nhân viên CSKH sẽ liên hệ qua SĐT để hỗ trợ bạn đổi size miễn phí nhé ạ!'
                ]
            ],
            [
                'id' => 3,
                'loai' => 'binh_luan',
                'ten_khach' => 'Lê Hoàng C',
                'hang_thanh_vien' => 'New',
                'da_mua' => false,
                'san_pham' => 'Cách chọn vòng phong thủy theo mệnh',
                'ma_sp' => 'Cẩm nang',
                'anh_sp' => '', // Bài viết ko cần ảnh nhỏ
                'sao' => 0,
                'noi_dung' => 'Người mệnh Hỏa có đeo được ngọc bích không shop? Hay bắt buộc phải đeo đá màu đỏ?',
                'anh_dinh_kem' => [],
                'trang_thai' => 'cho_duyet',
                'thoi_gian' => '3 ngày trước',
                'phan_hoi' => null
            ],
            [
                'id' => 4,
                'loai' => 'danh_gia',
                'ten_khach' => 'Phạm D',
                'hang_thanh_vien' => 'Diamond',
                'da_mua' => true,
                'san_pham' => 'Thạch Anh Tóc Vàng Vip',
                'ma_sp' => 'TA-TV-VIP',
                'anh_sp' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-2.jpg',
                'sao' => 5,
                'noi_dung' => 'Chất tóc lên đồng trục tuyệt đẹp, rất đáng tiền.',
                'anh_dinh_kem' => [APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-3.jpg'],
                'trang_thai' => 'da_an',
                'thoi_gian' => '1 tuần trước',
                'phan_hoi' => null
            ]
        ];

        $data = [
            'thong_ke' => $thong_ke,
            'reviews' => $reviews,
            'current_page' => 'binh_luan',
            'tieu_de' => 'Bình luận / Đánh giá - Admin'
        ];

        $this->view('admin_binh_luan', $data, 'admin');
    }
}
