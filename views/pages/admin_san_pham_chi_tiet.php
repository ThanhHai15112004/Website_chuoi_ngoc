<?php
// views/pages/admin_san_pham_chi_tiet.php
?>
<div class="space-y-6">
    <!-- Breadcrumb & Header -->
    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                <a href="<?= APP_URL ?>/admin/san-pham" class="hover:text-[#6B0D18] transition-colors flex items-center gap-1">
                    <span class="iconify text-base" data-icon="mdi:arrow-left"></span>
                    Danh sách sản phẩm
                </a>
                <span>/</span>
                <span class="text-gray-900 font-medium">Chi tiết sản phẩm</span>
            </div>
            <div class="flex items-center gap-3">
                <h2 class="text-2xl font-bold text-gray-900 font-luxury"><?= $san_pham['ten_sp'] ?></h2>
                <?php 
                    $tt = $san_pham['trang_thai'];
                    $ttClass = 'bg-gray-100 text-gray-700 border-gray-200';
                    if ($tt === 'Đang hiển thị') $ttClass = 'bg-emerald-50 text-emerald-700 border-emerald-200';
                    if ($tt === 'Đang ẩn') $ttClass = 'bg-gray-100 text-gray-600 border-gray-200';
                ?>
                <span class="text-xs font-bold px-2.5 py-1 rounded-md border <?= $ttClass ?> uppercase tracking-wide">
                    <?= $tt ?>
                </span>
            </div>
            <p class="text-sm text-gray-500 mt-1 font-mono">Mã SP: <?= $san_pham['ma_sp'] ?> &bull; Cập nhật lần cuối: <?= $san_pham['ngay_cap_nhat'] ?></p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/san-pham/sua/<?= $san_pham['id'] ?>" class="flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg text-gray-500" data-icon="mdi:ticket-percent-outline"></span>
                Tạo khuyến mãi
            </a>
            <a href="<?= APP_URL ?>/admin/san-pham/sua/<?= $san_pham['id'] ?>" class="flex items-center gap-2 px-4 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                Chỉnh sửa
            </a>
        </div>
    </div>

<?php include __DIR__ . '/../components/Admin/san_pham/detail_info.php'; ?>

</div>

<?php include __DIR__ . '/../components/Admin/san_pham/detail_scripts.php'; ?>
