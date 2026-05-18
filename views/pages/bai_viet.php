<main class="bg-[#FAF9F6] pb-16">
    <!-- Banner Góc Tư Vấn -->
    <?php require_once __DIR__ . '/../components/bai_viet/banner.php'; ?>

    <!-- Breadcrumb (nằm dưới banner) -->
    <div class="py-4">
    <?php
    if (isset($breadcrumbs) && !empty($breadcrumbs)) {
        // Chuyển đổi breadcrumbs từ controller sang format mới
        $breadcrumb_items = [];
        foreach ($breadcrumbs as $crumb) {
            $breadcrumb_items[] = [
                'ten' => $crumb['ten'],
                'url' => $crumb['url'] ?? null,
                'icon' => $crumb['icon'] ?? 'ph:article-bold',
            ];
        }
    } else {
        $breadcrumb_items = [
            ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
            ['ten' => 'Bài Viết', 'url' => null, 'icon' => 'ph:article-bold'],
        ];
    }
    require_once __DIR__ . '/../components/common/breadcrumb.php';
    ?>
    </div>

    <!-- Khối tìm kiếm & Danh mục -->
    <div class="container mx-auto px-4 lg:px-8 mt-8 mb-10">
        <?php require_once __DIR__ . '/../components/bai_viet/thanh_tim_kiem.php'; ?>
        <?php require_once __DIR__ . '/../components/bai_viet/danh_muc.php'; ?>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 lg:px-8 mb-12">
        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Cột trái: Nội dung chính -->
            <div class="w-full lg:w-3/4">
                <!-- Bài viết nổi bật -->
                <section class="mb-14">
                    <div class="flex items-center gap-3 mb-6">
                        <iconify-icon icon="ph:sparkle-fill" class="text-yellow-600 text-xl"></iconify-icon>
                        <h2 class="text-2xl font-serif text-red-900">Tiêu điểm phong thuỷ</h2>
                        <div class="h-px bg-gray-200 flex-grow ml-4"></div>
                    </div>
                    <?php require_once __DIR__ . '/../components/bai_viet/bai_viet_noi_bat.php'; ?>
                </section>

                <!-- Danh sách bài viết mới -->
                <section>
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-serif text-red-900">Bài viết mới nhất</h2>
                    </div>
                    <?php require_once __DIR__ . '/../components/bai_viet/danh_sach_bai_viet.php'; ?>
                    
                    <!-- Phân trang -->
                    <div class="mt-12 flex justify-center">
                        <nav class="flex space-x-2">
                            <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-gray-200 text-gray-500 hover:bg-red-50 hover:text-red-800 hover:border-red-200 transition-colors"><iconify-icon icon="ph:caret-left-bold"></iconify-icon></a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center rounded bg-red-800 text-white font-medium shadow-sm">1</a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-gray-200 text-gray-700 hover:bg-red-50 hover:text-red-800 hover:border-red-200 transition-colors">2</a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-gray-200 text-gray-700 hover:bg-red-50 hover:text-red-800 hover:border-red-200 transition-colors">3</a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-gray-200 text-gray-500 hover:bg-red-50 hover:text-red-800 hover:border-red-200 transition-colors"><iconify-icon icon="ph:caret-right-bold"></iconify-icon></a>
                        </nav>
                    </div>
                </section>
            </div>

            <!-- Cột phải: Sidebar -->
            <div class="w-full lg:w-1/4 mt-10 lg:mt-0">
                <?php require_once __DIR__ . '/../components/bai_viet/sidebar.php'; ?>
            </div>
        </div>
    </div>

    <!-- Form Đăng ký nhận tin -->
    <?php require_once __DIR__ . '/../components/bai_viet/dang_ky_nhan_tin.php'; ?>
</main>
