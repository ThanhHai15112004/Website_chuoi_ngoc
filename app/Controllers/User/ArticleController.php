<?php

namespace App\Controllers\User;

use App\Core\Controller;

class ArticleController extends Controller {
    public function index() {
        // Mock dữ liệu danh mục bài viết
        $categories = [
            ['id' => 1, 'name' => 'Tất cả kiến thức', 'slug' => 'tat-ca', 'active' => true],
            ['id' => 2, 'name' => 'Vòng Ngọc', 'slug' => 'vong-ngoc', 'active' => false],
            ['id' => 3, 'name' => 'Chuỗi Đá', 'slug' => 'chuoi-da', 'active' => false],
            ['id' => 4, 'name' => 'Chọn Theo Mệnh', 'slug' => 'chon-theo-menh', 'active' => false],
            ['id' => 5, 'name' => 'Bảo Quản', 'slug' => 'bao-quan', 'active' => false],
            ['id' => 6, 'name' => 'Quà Tặng', 'slug' => 'qua-tang', 'active' => false]
        ];

        // Mock dữ liệu bài viết nổi bật (thường là 1 bài chính và 2 bài phụ)
        $featured_articles = [
            [
                'id' => 1,
                'title' => 'Bí quyết chọn vòng tay phong thủy hợp mệnh Kim giúp thu hút tài lộc năm 2024',
                'excerpt' => 'Người mệnh Kim nên chọn vòng tay màu gì, chất liệu đá nào để tăng cường may mắn và tài lộc? Khám phá ngay những bí quyết chuyên sâu từ chuyên gia.',
                'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg', 
                'category' => 'Chọn Theo Mệnh',
                'date' => '15/11/2023',
                'author' => 'Thanh Hải',
                'views' => 1250,
                'is_main' => true
            ],
            [
                'id' => 2,
                'title' => 'Phân biệt Ngọc Bích thật giả - Những lưu ý quan trọng',
                'excerpt' => 'Cách nhận biết ngọc bích tự nhiên chuẩn xác qua màu sắc, độ trong và cảm giác khi chạm.',
                'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-2.jpg',
                'category' => 'Vòng Ngọc',
                'date' => '10/11/2023',
                'author' => 'Minh Tuấn',
                'views' => 840,
                'is_main' => false
            ],
            [
                'id' => 3,
                'title' => 'Cách thanh tẩy và nạp năng lượng cho chuỗi đá thạch anh',
                'excerpt' => 'Hướng dẫn chi tiết cách thanh tẩy đá phong thủy đúng chuẩn để giữ nguyên năng lượng tốt.',
                'image' => APP_URL . '/public/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg',
                'category' => 'Bảo Quản',
                'date' => '05/11/2023',
                'author' => 'Thanh Hải',
                'views' => 920,
                'is_main' => false
            ]
        ];

        // Mock dữ liệu danh sách bài viết mới
        $recent_articles = [
            [
                'id' => 4,
                'title' => 'Gợi ý quà tặng mẹ ngày 8/3: Chuỗi ngọc trai hay vòng mã não?',
                'excerpt' => 'Lựa chọn món quà ý nghĩa và tinh tế tặng đấng sinh thành trong những dịp đặc biệt.',
                'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-3.jpg',
                'category' => 'Quà Tặng',
                'date' => '01/11/2023'
            ],
            [
                'id' => 5,
                'title' => 'Sự khác biệt giữa Đá Thạch Anh Tóc Vàng và Tóc Đỏ',
                'excerpt' => 'Tìm hiểu công dụng và ý nghĩa phong thủy riêng biệt của hai loại thạch anh tóc phổ biến nhất.',
                'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg',
                'category' => 'Chuỗi Đá',
                'date' => '28/10/2023'
            ],
            [
                'id' => 6,
                'title' => 'Bảo quản vòng Trầm Hương sao cho luôn giữ được mùi thơm',
                'excerpt' => 'Trầm hương rất dễ mất mùi nếu không biết cách bảo quản. Dưới đây là những lưu ý bạn cần nắm rõ.',
                'image' => APP_URL . '/public/images/Sản phẩm/Trầm Hương và Nhang/nhang-1.jpg',
                'category' => 'Bảo Quản',
                'date' => '25/10/2023'
            ],
            [
                'id' => 7,
                'title' => 'Ý nghĩa của số lượng hạt trong chuỗi hạt phong thủy',
                'excerpt' => 'Đeo chuỗi 108 hạt, 54 hạt hay 14 hạt có ý nghĩa gì trong Phật giáo và phong thủy?',
                'image' => APP_URL . '/public/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-4.jpg',
                'category' => 'Chuỗi Đá',
                'date' => '20/10/2023'
            ],
            [
                'id' => 8,
                'title' => 'Người mệnh Thủy nên đeo đá gì để công việc thuận lợi?',
                'excerpt' => 'Top 5 loại đá phong thủy tương sinh, tương hợp mang lại bình an, thăng tiến cho người mệnh Thủy.',
                'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Shentacui Bánh Đậu Mứt Cam/shentacui-2 (1).jpg',
                'category' => 'Chọn Theo Mệnh',
                'date' => '15/10/2023'
            ],
            [
                'id' => 9,
                'title' => 'Đá Mắt Hổ: Viên đá của sự tự tin và dũng khí',
                'excerpt' => 'Khám phá năng lượng mạnh mẽ từ viên đá Mắt Hổ giúp vượt qua sợ hãi, tiến bước thành công.',
                'image' => APP_URL . '/public/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-4.jpg',
                'category' => 'Chuỗi Đá',
                'date' => '10/10/2023'
            ]
        ];

        // Dữ liệu chung truyền ra view
        $data = [
            'tieu_de' => 'Góc Tư Vấn - Kiến Thức Trang Sức Phong Thuỷ',
            'trang_hien_tai' => 'bai_viet', // Để menu header active
            'breadcrumbs' => [
                ['ten' => 'Trang chủ', 'url' => APP_URL . '/'],
                ['ten' => 'Góc tư vấn', 'url' => APP_URL . '/bai-viet']
            ],
            'categories' => $categories,
            'featured_articles' => $featured_articles,
            'recent_articles' => $recent_articles
        ];
        
        $this->view('bai_viet', $data);
    }

    public function detail() {
        // Mock data cho bài viết chi tiết
        $article = [
            'id' => 1,
            'title' => 'Bí quyết chọn vòng tay phong thủy hợp mệnh Kim giúp thu hút tài lộc năm 2024',
            'excerpt' => 'Người mệnh Kim nên chọn vòng tay màu gì, chất liệu đá nào để tăng cường may mắn và tài lộc? Khám phá ngay những bí quyết chuyên sâu từ chuyên gia.',
            'content' => 'Nội dung chi tiết sẽ được render ở view...',
            'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg',
            'category' => 'Chọn Theo Mệnh',
            'date' => '15/11/2023',
            'author' => 'Thanh Hải',
            'views' => 1250,
            'reading_time' => '5 phút đọc',
        ];

        // Mock dữ liệu bài viết liên quan
        $related_articles = [
            [
                'id' => 2,
                'title' => 'Phân biệt Ngọc Bích thật giả - Những lưu ý quan trọng',
                'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-2.jpg',
                'date' => '10/11/2023',
            ],
            [
                'id' => 8,
                'title' => 'Người mệnh Thủy nên đeo đá gì để công việc thuận lợi?',
                'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Shentacui Bánh Đậu Mứt Cam/shentacui-2 (1).jpg',
                'date' => '15/10/2023',
            ],
            [
                'id' => 9,
                'title' => 'Đá Mắt Hổ: Viên đá của sự tự tin và dũng khí',
                'image' => APP_URL . '/public/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-4.jpg',
                'date' => '10/10/2023',
            ]
        ];

        // Mock dữ liệu sản phẩm liên quan
        $related_products = [
            [
                'id' => 1,
                'name' => 'Vòng Thạch Anh Tóc Vàng',
                'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg',
                'price' => 850000,
                'old_price' => 1000000,
            ],
            [
                'id' => 2,
                'name' => 'Vòng Đá Mắt Hổ Cao Cấp',
                'image' => APP_URL . '/public/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-4.jpg',
                'price' => 650000,
                'old_price' => null,
            ]
        ];

        $data = [
            'tieu_de' => $article['title'] . ' - Góc Tư Vấn',
            'trang_hien_tai' => 'bai_viet', // Để menu header active phần Bài viết
            'breadcrumbs' => [
                ['ten' => 'Trang chủ', 'url' => APP_URL . '/'],
                ['ten' => 'Góc tư vấn', 'url' => APP_URL . '/bai-viet'],
                ['ten' => 'Chi tiết bài viết', 'url' => null]
            ],
            'article' => $article,
            'related_articles' => $related_articles,
            'related_products' => $related_products
        ];

        $this->view('chi_tiet_bai_viet', $data);
    }
}
