<?php
// views/components/Admin/chinh_sach/filter_bar.php
// Tab active & filter dynamic dựa trên query params từ Controller
$currentTab = $tab ?? 'all';
$currentLoai = $loai ?? '';
$currentViTri = $vi_tri ?? '';
$currentSearch = $search ?? '';

// Xây dựng URL giữ lại các filter khác khi chuyển tab
function buildFilterUrl($params = []) {
    $base = APP_URL . '/admin/chinh-sach';
    $defaults = [
        'tab' => $_GET['tab'] ?? 'all',
        'loai' => $_GET['loai'] ?? '',
        'vi_tri' => $_GET['vi_tri'] ?? '',
        'search' => $_GET['search'] ?? '',
        'page' => 1,
    ];
    $merged = array_merge($defaults, $params);
    // Bỏ các giá trị rỗng
    $filtered = array_filter($merged, fn($v) => $v !== '' && $v !== 'all' && $v !== null);
    if (empty($filtered)) return $base;
    return $base . '?' . http_build_query($filtered);
}

$tabs = [
    ['key' => 'all', 'label' => 'Tất cả', 'count' => $stats['total'] ?? 0],
    ['key' => 'dang_hien_thi', 'label' => 'Đang hiển thị', 'count' => $stats['dang_hien_thi'] ?? 0],
    ['key' => 'dang_an', 'label' => 'Đang ẩn', 'count' => $stats['dang_an'] ?? 0],
    ['key' => 'ban_nhap', 'label' => 'Bản nháp', 'count' => $stats['ban_nhap'] ?? 0],
    ['key' => 'checkout', 'label' => 'Checkout', 'count' => $stats['in_checkout'] ?? 0],
    ['key' => 'can_cap_nhat', 'label' => 'Cần cập nhật', 'count' => $stats['can_cap_nhat'] ?? 0],
];
?>
<!-- Tabs trạng thái -->
<div class="px-6 pt-4 border-b border-gray-200">
    <div class="flex overflow-x-auto hide-scrollbar gap-2 pb-3">
        <?php foreach ($tabs as $t): ?>
            <?php
                $isActive = ($currentTab === $t['key']);
                $isWarning = ($t['key'] === 'can_cap_nhat' && $t['count'] > 0);
                
                if ($isActive) {
                    $btnClass = 'bg-[#6B0D18] text-white';
                } elseif ($isWarning) {
                    $btnClass = 'bg-amber-50 text-amber-600 border border-amber-200 hover:bg-amber-100';
                } else {
                    $btnClass = 'bg-white border border-gray-200 text-gray-700 hover:bg-gray-50';
                }
            ?>
            <a href="<?= buildFilterUrl(['tab' => $t['key']]) ?>" 
               class="px-4 py-1.5 <?= $btnClass ?> rounded-full text-sm font-medium whitespace-nowrap transition-colors">
                <?= $t['label'] ?> (<?= $t['count'] ?>)
            </a>
        <?php endforeach; ?>
    </div>
</div>

<!-- Thanh tìm kiếm & Lọc -->
<form method="GET" action="<?= APP_URL ?>/admin/chinh-sach" class="px-6 py-4 flex flex-col md:flex-row items-center gap-4 border-b border-gray-100 bg-gray-50/30">
    <!-- Giữ tab hiện tại -->
    <input type="hidden" name="tab" value="<?= htmlspecialchars($currentTab) ?>">
    
    <!-- Search -->
    <div class="relative w-full md:w-96">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
            <span class="iconify" data-icon="mdi:magnify"></span>
        </span>
        <input type="text" name="search" value="<?= htmlspecialchars($currentSearch) ?>" 
               class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-colors" 
               placeholder="Tìm theo tên chính sách, slug, người cập nhật...">
    </div>

    <!-- Filters -->
    <div class="flex items-center gap-3 w-full md:w-auto">
        <select name="loai" class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18]">
            <option value="">Loại chính sách</option>
            <?php
            $loaiOptions = ['Đổi trả', 'Bảo hành', 'Vận chuyển', 'Thanh toán', 'Bảo mật', 'Điều khoản', 'Hướng dẫn', 'Kiểm hàng'];
            foreach ($loaiOptions as $opt):
            ?>
                <option value="<?= $opt ?>" <?= $currentLoai === $opt ? 'selected' : '' ?>><?= $opt ?></option>
            <?php endforeach; ?>
        </select>
        <select name="vi_tri" class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18]">
            <option value="">Vị trí hiển thị</option>
            <option value="footer" <?= $currentViTri === 'footer' ? 'selected' : '' ?>>Footer</option>
            <option value="checkout" <?= $currentViTri === 'checkout' ? 'selected' : '' ?>>Checkout</option>
            <option value="product" <?= $currentViTri === 'product' ? 'selected' : '' ?>>Trang sản phẩm</option>
            <option value="register" <?= $currentViTri === 'register' ? 'selected' : '' ?>>Trang đăng ký</option>
        </select>
        
        <button type="submit" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center gap-1">
            <span class="iconify" data-icon="mdi:filter-variant"></span> Lọc
        </button>
        <?php if (!empty($currentSearch) || !empty($currentLoai) || !empty($currentViTri)): ?>
        <a href="<?= buildFilterUrl(['tab' => $currentTab, 'loai' => '', 'vi_tri' => '', 'search' => '']) ?>" 
           class="px-3 py-2 text-gray-500 hover:text-red-600 text-sm font-medium flex items-center gap-1 transition-colors" title="Xóa bộ lọc">
            <span class="iconify" data-icon="mdi:filter-remove-outline"></span> Xóa lọc
        </a>
        <?php endif; ?>
    </div>
</form>

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
