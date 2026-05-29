<?php
// views/components/Admin/nhap_kho/kiem_hang/kiem_hang_header.php
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6 p-5">
    <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">
        
        <!-- Thông tin phiếu -->
        <div class="flex-1">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Mã phiếu: <span class="text-[#6B0D18]"><?= htmlspecialchars($phieuNhap['ma_phieu']) ?></span></h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-sm">
                <div>
                    <p class="text-gray-500 mb-1">Nhà cung cấp</p>
                    <p class="font-medium text-gray-900"><?= htmlspecialchars($phieuNhap['ten_ncc'] ?? 'Khác') ?></p>
                </div>
                <div>
                    <p class="text-gray-500 mb-1">Kho nhập</p>
                    <p class="font-medium text-gray-900">Chưa phân kho</p>
                </div>
                <div>
                    <p class="text-gray-500 mb-1">Người kiểm hàng</p>
                    <p class="font-medium text-gray-900"><?= htmlspecialchars($phieuNhap['nguoi_kiem'] ?? 'Đang chờ') ?></p>
                </div>
                <div>
                    <p class="text-gray-500 mb-1">Thời gian tạo</p>
                    <p class="font-medium text-gray-900"><?= date('H:i, d/m/Y', strtotime($phieuNhap['ngay_tao'])) ?></p>
                </div>
            </div>
        </div>

        <!-- Tiến độ kiểm hàng -->
        <div class="w-full md:w-72 bg-gray-50 rounded-xl p-4 border border-gray-200 shrink-0">
            <h3 class="text-sm font-bold text-gray-900 mb-2">Thông tin phụ</h3>
            <div class="flex items-center justify-between text-sm mb-2">
                <span class="text-gray-600">Tổng sản phẩm: <span class="font-bold text-gray-900"><?= count($danhSachSP) ?></span> SP</span>
            </div>
            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                <div class="bg-[#6B0D18] h-2 rounded-full" style="width: 0%"></div>
            </div>
            
            <div class="flex items-center justify-between text-xs font-medium">
                <span class="text-emerald-600 flex items-center gap-1"><span class="iconify" data-icon="mdi:check-circle"></span> Yêu cầu: <?= array_sum(array_column($danhSachSP, 'so_luong')) ?></span>
            </div>
        </div>
    </div>
</div>
