<?php
// views/pages/admin_don_hang_chi_tiet.php
    $statusMap = [
        0 => 'Chờ xác nhận',
        1 => 'Đang chuẩn bị',
        2 => 'Đang giao',
        3 => 'Thành công',
        4 => 'Đã hủy'
    ];
    $ttText = $statusMap[$don_hang['trang_thai_don_hang']] ?? 'Không xác định';
    $paymentStatus = $don_hang['trang_thai_thanh_toan'] == 1 ? 'Đã thanh toán' : 'Chưa thanh toán';
?>
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Breadcrumb & Back -->
    <div class="flex items-center gap-2 text-sm text-gray-500">
        <a href="/shopbanhangchuoingoc/admin/don-hang" class="hover:text-[#6B0D18] flex items-center gap-1 transition-colors">
            <span class="iconify" data-icon="mdi:arrow-left"></span>
            Quay lại danh sách
        </a>
        <span>/</span>
        <span>Quản lý đơn hàng</span>
        <span>/</span>
        <span class="font-medium text-gray-900">Chi tiết đơn hàng</span>
    </div>

    <!-- Title Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight flex items-center gap-3">
                Chi tiết đơn hàng 
                <span class="text-[#6B0D18]">#<?= $don_hang['ma_don_hang'] ?></span>
            </h1>
            <div class="text-sm text-gray-500 mt-1 flex items-center gap-4">
                <span class="flex items-center gap-1"><span class="iconify" data-icon="mdi:calendar-outline"></span> Ngày đặt: <?= date('d/m/Y H:i', strtotime($don_hang['ngay_tao'])) ?></span>
                <span class="flex items-center gap-1"><span class="iconify" data-icon="mdi:web"></span> Nguồn: Website</span>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <button onclick="openPrintModal()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:printer-outline"></span>
                In hóa đơn
            </button>
            <?php if($don_hang['trang_thai_don_hang'] == 0): ?>
                <button onclick="capNhatTrangThai('<?= $don_hang['id'] ?>', 1)" class="px-4 py-2 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:check-circle-outline"></span>
                    Xác nhận đơn
                </button>
            <?php endif; ?>
            <button onclick="openStatusModal()" class="px-4 py-2 bg-gray-800 text-white rounded-xl hover:bg-gray-900 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:refresh"></span>
                Cập nhật trạng thái
            </button>
        </div>
    </div>

    <!-- Status Overview Card -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 relative overflow-hidden">
        <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-red-50/50 to-transparent pointer-events-none"></div>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="text-sm text-gray-500 mb-1">Trạng thái hiện tại</div>
                <div class="flex items-center gap-3">
                    <?php 
                        $badgeClasses = 'bg-gray-50 text-gray-600';
                        $icon = 'mdi:clock-outline';
                        if($don_hang['trang_thai_don_hang'] == 0) { $badgeClasses = 'bg-red-50 text-[#6B0D18] border border-red-200 font-bold'; }
                        elseif($don_hang['trang_thai_don_hang'] == 1) { $badgeClasses = 'bg-blue-50 text-blue-700 border border-blue-200'; $icon = 'mdi:check-circle-outline'; }
                        elseif($don_hang['trang_thai_don_hang'] == 2) { $badgeClasses = 'bg-teal-50 text-teal-700 border border-teal-200'; $icon = 'mdi:truck-delivery-outline'; }
                        elseif($don_hang['trang_thai_don_hang'] == 3) { $badgeClasses = 'bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold'; $icon = 'mdi:check-all'; }
                        elseif($don_hang['trang_thai_don_hang'] == 4) { $badgeClasses = 'bg-gray-100 text-gray-600 border border-gray-200'; $icon = 'mdi:cancel'; }
                    ?>
                    <span class="px-3 py-1.5 rounded-lg text-sm flex items-center gap-1.5 <?= $badgeClasses ?>">
                        <span class="iconify text-lg" data-icon="<?= $icon ?>"></span>
                        <?= $ttText ?>
                    </span>
                    <span class="text-xs text-gray-400">Cập nhật: <?= !empty($don_hang['lich_su']) ? date('d/m/Y H:i', strtotime($don_hang['lich_su'][0]['ngay_tao'])) : 'Chưa có' ?></span>
                </div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 flex-1 md:border-l border-gray-100 md:pl-6">
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Thanh toán</div>
                    <div class="font-medium text-sm text-gray-900"><?= $paymentStatus ?></div>
                </div>
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Tổng tiền</div>
                    <div class="font-bold text-[#6B0D18] text-base"><?= number_format($don_hang['thanh_tien'], 0, ',', '.') ?>đ</div>
                </div>
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Thanh toán</div>
                    <div class="font-medium text-sm text-gray-900 truncate" title="<?= htmlspecialchars($don_hang['pt_thanh_toan']) ?>"><?= htmlspecialchars($don_hang['pt_thanh_toan']) ?></div>
                </div>
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Sản phẩm</div>
                    <div class="font-medium text-sm text-gray-900"><?= count($don_hang['san_pham']) ?> mã SP</div>
                </div>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/../components/Admin/don_hang/detail_timeline.php'; ?>

    <!-- Quick Actions Bar -->
    <div class="flex items-center gap-3">
        <?php if(in_array($don_hang['trang_thai_don_hang'], [0, 1])): ?>
            <button onclick="capNhatTrangThai('<?= $don_hang['id'] ?>', <?= $don_hang['trang_thai_don_hang'] + 1 ?>)" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm">
                <?= $don_hang['trang_thai_don_hang'] == 0 ? 'Xác nhận đơn' : 'Giao hàng' ?>
            </button>
            <button onclick="huyDonHang('<?= $don_hang['id'] ?>')" class="px-5 py-2.5 bg-white border border-red-200 text-red-600 rounded-xl hover:bg-red-50 font-medium text-sm transition-colors shadow-sm">Hủy đơn</button>
        <?php endif; ?>
        <?php if($don_hang['trang_thai_don_hang'] == 2): ?>
            <button onclick="capNhatTrangThai('<?= $don_hang['id'] ?>', 3)" class="px-5 py-2.5 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 font-medium text-sm transition-colors shadow-sm">Hoàn tất (Thành công)</button>
            <button onclick="huyDonHang('<?= $don_hang['id'] ?>')" class="px-5 py-2.5 bg-white border border-red-200 text-red-600 rounded-xl hover:bg-red-50 font-medium text-sm transition-colors shadow-sm">Thất bại (Hủy)</button>
        <?php endif; ?>
        
        <a href="tel:<?= $don_hang['sdt_nguoi_nhan'] ?>" class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
            <span class="iconify" data-icon="mdi:phone-outline"></span> Liên hệ khách
        </a>
    </div>

    <!-- 2 Column Layout -->
    <div class="flex flex-col lg:flex-row gap-6">
        
        <!-- Cột Trái (Main Content) -->
        <div class="lg:w-2/3 space-y-6">
            
<?php include __DIR__ . '/../components/Admin/don_hang/detail_products.php'; ?>

        </div>

        <!-- Cột Phải (Sidebar) -->
        <div class="lg:w-1/3 space-y-6">
            
<?php include __DIR__ . '/../components/Admin/don_hang/detail_customer_info.php'; ?>

        </div>
    </div>
</div>

<?php include __DIR__ . '/../components/Admin/don_hang/detail_modals.php'; ?>

<?php include __DIR__ . '/../components/Admin/don_hang/detail_scripts.php'; ?>
