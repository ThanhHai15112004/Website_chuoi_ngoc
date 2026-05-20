<?php
// views/pages/admin_voucher.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Quản lý voucher</h2>
            <p class="text-sm text-gray-500 mt-1">Tạo và quản lý các mã giảm giá áp dụng cho khách hàng khi mua vòng ngọc, chuỗi đá và trang sức phong thủy.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:export-variant"></span>
                Xuất danh sách
            </button>
            <a href="<?= APP_URL ?>/admin/voucher/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md shadow-[#6B0D18]/20 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:plus"></span>
                Tạo voucher
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <!-- Tổng voucher -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-500 mb-2">
                <span class="iconify" data-icon="mdi:ticket-percent-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Tổng voucher</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['tong_voucher']) ?> <span class="text-sm font-normal text-gray-500">mã</span></div>
        </div>

        <!-- Đang hoạt động -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-emerald-600 mb-2">
                <span class="iconify" data-icon="mdi:check-circle-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Đang hoạt động</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['dang_hoat_dong']) ?> <span class="text-sm font-normal text-gray-500">mã</span></div>
        </div>

        <!-- Sắp hết hạn -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-amber-500 mb-2">
                <span class="iconify" data-icon="mdi:clock-alert-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Sắp hết hạn</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['sap_het_han']) ?> <span class="text-sm font-normal text-gray-500">mã</span></div>
        </div>

        <!-- Đã hết hạn -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-400 mb-2">
                <span class="iconify" data-icon="mdi:clock-remove-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Đã hết hạn</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['het_han']) ?> <span class="text-sm font-normal text-gray-500">mã</span></div>
        </div>

        <!-- Đã dùng -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-blue-500 mb-2">
                <span class="iconify" data-icon="mdi:cart-check"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Đã dùng</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['da_dung']) ?> <span class="text-sm font-normal text-gray-500">lượt</span></div>
        </div>

        <!-- Tổng giảm giá -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-[#6B0D18] mb-2">
                <span class="iconify" data-icon="mdi:currency-usd"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Tổng giảm giá</span>
            </div>
            <div class="text-xl font-bold text-[#6B0D18] truncate" title="<?= number_format($thong_ke['tong_giam_gia'], 0, ',', '.') ?>đ"><?= number_format($thong_ke['tong_giam_gia'], 0, ',', '.') ?>đ</div>
        </div>
    </div>

    <!-- Tabs & Filters Container -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        
        <!-- Tabs -->
        <div class="flex space-x-1 border-b border-gray-100 overflow-x-auto hide-scrollbar" id="voucher-tabs">
            <button class="tab-btn px-4 py-2 border-b-2 border-[#6B0D18] text-[#6B0D18] font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Tất cả (48)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Đang hoạt động (12)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Sắp hết hạn (5)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Hết hạn (18)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Chưa bắt đầu (8)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Hết lượt (3)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Đã tắt (2)</button>
        </div>

        <!-- Search & Filters -->
        <div class="flex flex-col lg:flex-row gap-3">
            <div class="relative flex-1">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm theo mã voucher, tên chương trình..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
            </div>
            
            <div class="flex flex-wrap gap-2">
                <!-- Bộ lọc Loại -->
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Loại giảm giá</option>
                    <option value="percent">Giảm phần trăm</option>
                    <option value="fixed">Giảm số tiền cố định</option>
                    <option value="freeship">Miễn phí vận chuyển</option>
                    <option value="gift">Quà tặng</option>
                </select>

                <!-- Bộ lọc Thời gian -->
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Thời gian</option>
                    <option value="active">Đang hiệu lực</option>
                    <option value="upcoming">Sắp diễn ra</option>
                    <option value="expired">Đã hết hạn</option>
                </select>
                
                <!-- Bộ lọc Đối tượng -->
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Đối tượng</option>
                    <option value="all">Tất cả khách hàng</option>
                    <option value="new">Khách hàng mới</option>
                    <option value="silver">Hạng Silver</option>
                    <option value="gold">Hạng Gold</option>
                    <option value="diamond">Hạng Diamond</option>
                </select>

                <button class="px-3 py-2 bg-gray-50 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:filter-variant"></span>
                    Lọc thêm
                </button>
            </div>
        </div>

        <!-- Active Filters Chips -->
        <div class="flex flex-wrap gap-2 pt-2">
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-red-50 text-[#6B0D18] text-xs font-medium">
                Đang hoạt động
                <button class="hover:text-red-900"><span class="iconify" data-icon="mdi:close"></span></button>
            </span>
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 text-xs font-medium">
                Loại: Giảm số tiền
                <button class="hover:text-gray-900"><span class="iconify" data-icon="mdi:close"></span></button>
            </span>
            <button class="text-xs text-gray-500 hover:text-[#6B0D18] underline font-medium">Xóa bộ lọc</button>
        </div>
    </div>

    <!-- Action Bar & Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Bulk Actions -->
        <div class="p-3 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
            <span class="text-sm text-gray-500 px-2 border-r border-gray-300">Đã chọn: <strong class="text-gray-800" id="selected-count">0</strong></span>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-emerald-600 rounded-md hover:bg-emerald-50 hover:border-emerald-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Bật</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-amber-600 rounded-md hover:bg-amber-50 hover:border-amber-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Tắt</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Xóa</button>
        </div>

        <!-- Table Responsive Container -->
        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold sticky top-0 z-10">
                    <tr>
                        <th class="px-4 py-3 w-10">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </th>
                        <th class="px-4 py-3">Mã & Chương trình</th>
                        <th class="px-4 py-3">Mức giảm & Loại</th>
                        <th class="px-4 py-3">Điều kiện & Đối tượng</th>
                        <th class="px-4 py-3">Thời gian</th>
                        <th class="px-4 py-3">Sử dụng</th>
                        <th class="px-4 py-3">Trạng thái</th>
                        <th class="px-4 py-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($voucher_list as $voucher): ?>
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1.5">
                                <div class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded border border-dashed border-[#6B0D18]/50 bg-red-50 w-max group/code cursor-pointer relative" onclick="copyCode('<?= $voucher['ma_voucher'] ?>')">
                                    <span class="font-bold text-[#6B0D18] tracking-wider"><?= $voucher['ma_voucher'] ?></span>
                                    <span class="iconify text-[#6B0D18]/60 group-hover/code:text-[#6B0D18]" data-icon="mdi:content-copy"></span>
                                    <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-[10px] px-2 py-1 rounded opacity-0 transition-opacity pointer-events-none" id="tooltip-<?= $voucher['ma_voucher'] ?>">Đã copy</div>
                                </div>
                                <div class="font-medium text-gray-800 whitespace-normal line-clamp-1 max-w-[250px]" title="<?= $voucher['ten_chuong_trinh'] ?>"><?= $voucher['ten_chuong_trinh'] ?></div>
                                <div class="text-xs text-gray-500 whitespace-normal line-clamp-1 max-w-[250px]" title="<?= $voucher['mo_ta'] ?>"><?= $voucher['mo_ta'] ?></div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1">
                                <div class="font-bold text-[#6B0D18] text-base"><?= $voucher['gia_tri_giam'] ?></div>
                                <?php if (isset($voucher['giam_toi_da'])): ?>
                                    <div class="text-xs text-gray-500"><?= $voucher['giam_toi_da'] ?></div>
                                <?php endif; ?>
                                <div>
                                    <?php
                                        $loai_bg = 'bg-gray-100 text-gray-600';
                                        if ($voucher['loai_giam'] === 'Giảm phần trăm') $loai_bg = 'bg-rose-50 text-rose-700';
                                        if ($voucher['loai_giam'] === 'Giảm số tiền') $loai_bg = 'bg-amber-50 text-amber-700';
                                        if ($voucher['loai_giam'] === 'Freeship') $loai_bg = 'bg-teal-50 text-teal-700';
                                        if ($voucher['loai_giam'] === 'Quà tặng') $loai_bg = 'bg-purple-50 text-purple-700';
                                        if ($voucher['loai_giam'] === 'Ưu đãi thành viên') $loai_bg = 'bg-yellow-50 text-yellow-700';
                                    ?>
                                    <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-medium <?= $loai_bg ?>"><?= $voucher['loai_giam'] ?></span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1.5">
                                <div class="text-sm font-medium text-gray-700 flex items-center gap-1">
                                    <span class="iconify text-gray-400 text-xs" data-icon="mdi:cart-outline"></span>
                                    <?= $voucher['dieu_kien'] ?>
                                </div>
                                <div class="flex flex-wrap gap-1">
                                    <?php foreach ($voucher['doi_tuong'] as $dt): ?>
                                        <?php
                                            $dt_bg = 'bg-gray-100 text-gray-600 border border-gray-200';
                                            if ($dt === 'Gold') $dt_bg = 'bg-yellow-50 border-yellow-200 text-yellow-700';
                                            if ($dt === 'Diamond') $dt_bg = 'bg-red-50 border-red-200 text-[#6B0D18]';
                                            if ($dt === 'Silver') $dt_bg = 'bg-slate-50 border-slate-200 text-slate-600';
                                            if ($dt === 'Khách hàng mới') $dt_bg = 'bg-emerald-50 border-emerald-200 text-emerald-700';
                                        ?>
                                        <span class="inline-flex px-1.5 py-0.5 rounded text-[10px] font-medium <?= $dt_bg ?>"><?= $dt ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <a href="#" class="text-xs text-blue-600 hover:underline mt-0.5 inline-block">Xem chi tiết ĐK</a>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1">
                                <div class="text-xs text-gray-600"><?= $voucher['ngay_bat_dau'] ?> - <?= $voucher['ngay_ket_thuc'] ?></div>
                                <?php
                                    $time_color = 'text-gray-500';
                                    if (strpos($voucher['trang_thai_thoi_gian'], 'Còn') !== false) $time_color = 'text-emerald-600 font-medium';
                                    if (strpos($voucher['trang_thai_thoi_gian'], 'Sắp hết hạn') !== false || strpos($voucher['trang_thai_thoi_gian'], 'Hết hạn sau') !== false) $time_color = 'text-amber-600 font-bold';
                                    if (strpos($voucher['trang_thai_thoi_gian'], 'Đã qua') !== false) $time_color = 'text-gray-400';
                                    if (strpos($voucher['trang_thai_thoi_gian'], 'Bắt đầu sau') !== false) $time_color = 'text-blue-500';
                                    if (strpos($voucher['trang_thai_thoi_gian'], 'Đã tắt') !== false) $time_color = 'text-gray-400';
                                ?>
                                <div class="text-[11px] <?= $time_color ?>"><?= $voucher['trang_thai_thoi_gian'] ?></div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1.5 w-32">
                                <?php
                                    $luot = $voucher['tong_luot'] == -1 ? '∞' : $voucher['tong_luot'];
                                    $percent = 0;
                                    if ($voucher['tong_luot'] > 0) {
                                        $percent = min(100, round(($voucher['da_dung'] / $voucher['tong_luot']) * 100));
                                    }
                                    
                                    $progress_color = 'bg-[#6B0D18]';
                                    if ($percent > 80) $progress_color = 'bg-amber-500';
                                    if ($percent >= 100) $progress_color = 'bg-red-500';
                                    if ($voucher['tong_luot'] == -1) {
                                        $percent = 100;
                                        $progress_color = 'bg-emerald-500';
                                    }
                                ?>
                                <div class="text-sm font-medium text-gray-800">
                                    <?= number_format($voucher['da_dung']) ?> / <span class="text-gray-500 text-xs font-normal"><?= $luot ?></span>
                                </div>
                                <?php if ($voucher['tong_luot'] != -1): ?>
                                <div class="w-full bg-gray-100 rounded-full h-1.5">
                                    <div class="<?= $progress_color ?> h-1.5 rounded-full" style="width: <?= $percent ?>%"></div>
                                </div>
                                <div class="text-[10px] text-gray-500 text-right"><?= $percent ?>%</div>
                                <?php else: ?>
                                <span class="text-[10px] text-gray-400 border border-gray-200 px-1.5 py-0.5 rounded bg-gray-50 w-max">Không giới hạn</span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <?php
                                $status_classes = 'bg-emerald-50 text-emerald-700 border border-emerald-200'; // Đang hoạt động
                                if ($voucher['trang_thai'] === 'Sắp hết hạn') $status_classes = 'bg-amber-50 text-amber-700 border border-amber-200';
                                if ($voucher['trang_thai'] === 'Hết hạn' || $voucher['trang_thai'] === 'Đã tắt') $status_classes = 'bg-gray-100 text-gray-600 border border-gray-200';
                                if ($voucher['trang_thai'] === 'Chưa bắt đầu') $status_classes = 'bg-blue-50 text-blue-700 border border-blue-200';
                                if ($voucher['trang_thai'] === 'Hết lượt dùng') $status_classes = 'bg-red-50 text-red-700 border border-red-200';
                            ?>
                            <span class="inline-flex px-2 py-1 rounded-md text-xs font-medium <?= $status_classes ?>">
                                <?= $voucher['trang_thai'] ?>
                            </span>
                            
                            <?php if ($voucher['trang_thai'] === 'Đang hoạt động' || $voucher['trang_thai'] === 'Sắp hết hạn' || $voucher['trang_thai'] === 'Chưa bắt đầu'): ?>
                                <div class="mt-2 flex items-center w-max cursor-pointer toggle-switch" onclick="toggleVoucherStatus(this)">
                                    <div class="relative inline-flex h-5 w-9 shrink-0 rounded-full transition-colors duration-200 ease-in-out bg-[#6B0D18]">
                                        <div class="absolute left-0.5 top-0.5 h-4 w-4 rounded-full bg-white transition-transform duration-200 ease-in-out translate-x-4 shadow"></div>
                                    </div>
                                </div>
                            <?php elseif ($voucher['trang_thai'] === 'Đã tắt'): ?>
                                <div class="mt-2 flex items-center w-max cursor-pointer toggle-switch" onclick="toggleVoucherStatus(this)">
                                    <div class="relative inline-flex h-5 w-9 shrink-0 rounded-full transition-colors duration-200 ease-in-out bg-gray-300">
                                        <div class="absolute left-0.5 top-0.5 h-4 w-4 rounded-full bg-white transition-transform duration-200 ease-in-out translate-x-0 shadow"></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <a href="<?= APP_URL ?>/admin/voucher/sua" class="p-1.5 text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 rounded transition-colors" title="Sửa">
                                    <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                </a>
                                <div class="relative inline-block text-left menu-dropdown-container">
                                    <button class="p-1.5 text-gray-500 hover:bg-gray-100 rounded transition-colors" onclick="toggleDropdown(this)">
                                        <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    <div class="absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg border border-gray-100 hidden z-20 dropdown-menu">
                                        <div class="py-1">
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="openDetailsModal('<?= $voucher['ma_voucher'] ?>')"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết</a>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="duplicateVoucher('<?= $voucher['ma_voucher'] ?>', this)"><span class="iconify text-gray-400" data-icon="mdi:content-copy"></span> Nhân bản</a>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="openHistoryModal('<?= $voucher['ma_voucher'] ?>')"><span class="iconify text-gray-400" data-icon="mdi:receipt-text-outline"></span> Lịch sử sử dụng</a>
                                            <hr class="my-1 border-gray-100">
                                            <?php if ($voucher['trang_thai'] !== 'Hết hạn' && $voucher['trang_thai'] !== 'Hết lượt dùng'): ?>
                                                <?php if ($voucher['trang_thai'] === 'Đã tắt'): ?>
                                                    <a href="#" class="action-toggle-btn flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50" onclick="triggerToggleFromMenu(this)"><span class="iconify" data-icon="mdi:play-circle-outline"></span> <span>Bật lại</span></a>
                                                <?php else: ?>
                                                    <a href="#" class="action-toggle-btn flex items-center gap-2 px-4 py-2 text-sm text-amber-600 hover:bg-amber-50" onclick="triggerToggleFromMenu(this)"><span class="iconify" data-icon="mdi:pause-circle-outline"></span> <span>Tạm tắt</span></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50" onclick="confirmDeleteVoucher('<?= $voucher['ma_voucher'] ?>', <?= $voucher['da_dung'] ?>, this)"><span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa voucher</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-white">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-800">1</span> - <span class="font-medium text-gray-800">8</span> trong <span class="font-medium text-gray-800">48</span> voucher
            </div>
            <div class="flex items-center gap-1">
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-sm font-medium shadow-sm">1</button>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">2</button>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">3</button>
                <span class="px-2 text-gray-400">...</span>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">6</button>
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
            </div>
        </div>
    </div>
</div>

<!-- MODALS -->

<!-- Modal overlay -->
<div id="modalOverlay" class="fixed inset-0 bg-black/50 z-40 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Confirm Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[400px] max-w-[90%] transform scale-95 transition-transform duration-300 p-6 flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-red-100 text-red-600 flex items-center justify-center mb-4">
            <span class="iconify text-3xl" data-icon="mdi:alert-circle-outline"></span>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Xác nhận xóa voucher</h3>
        <p class="text-gray-600 text-sm mb-1" id="delete-msg">Bạn có chắc muốn xóa voucher <strong class="text-gray-900" id="del-voucher-code">CODE</strong> không?</p>
        <p class="text-amber-600 text-[13px] bg-amber-50 p-2 rounded-lg border border-amber-100 hidden mb-4 w-full" id="delete-warning">
            Voucher này đã có lượt sử dụng. Bạn nên <strong>Tắt voucher</strong> thay vì xóa để giữ dữ liệu báo cáo.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full mt-6">
            <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy</button>
            <button id="btn-disable-alt" class="hidden flex-1 px-4 py-2.5 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 transition-colors font-medium text-sm" onclick="closeDeleteModal(); mockAction('Đã tạm tắt voucher')">Tắt thay thế</button>
            <button onclick="executeDelete()" class="flex-1 px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium text-sm shadow-md shadow-red-600/20">Xóa voucher</button>
        </div>
    </div>
</div>

<!-- View Details Modal -->
<div id="detailsModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[500px] max-w-[90%] transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:ticket-outline"></span> Chi tiết Voucher
            </h3>
            <button onclick="closeDetailsModal()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        
        <div class="p-6 bg-white overflow-y-auto max-h-[70vh]">
            <!-- Ticket UI -->
            <div class="relative mx-auto w-full rounded-xl overflow-hidden shadow-sm border border-red-100 bg-gradient-to-br from-red-50 to-white mb-6">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-repeat-x flex justify-around">
                    <?php for($i=0; $i<20; $i++): ?><div class="w-2 h-2 bg-white rounded-full -mt-1 shadow-inner"></div><?php endfor; ?>
                </div>
                <div class="p-5 relative z-10 border-l-4 border-[#6B0D18] flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-red-100 text-[#6B0D18] flex items-center justify-center shrink-0">
                        <span class="iconify text-2xl" data-icon="mdi:ticket-percent"></span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-black text-[#6B0D18] tracking-widest uppercase" id="detail-code">MÃ_VOUCHER</h3>
                        <p class="font-bold text-gray-800" id="detail-value">Giảm 0%</p>
                    </div>
                </div>
            </div>

            <!-- Details List -->
            <div class="space-y-4">
                <div class="flex justify-between border-b border-gray-50 pb-2">
                    <span class="text-gray-500 text-sm">Chương trình</span>
                    <span class="font-medium text-gray-800 text-sm text-right" id="detail-name">Tên chương trình</span>
                </div>
                <div class="flex justify-between border-b border-gray-50 pb-2">
                    <span class="text-gray-500 text-sm">Điều kiện</span>
                    <span class="font-medium text-gray-800 text-sm text-right" id="detail-condition">Đơn từ 0đ</span>
                </div>
                <div class="flex justify-between border-b border-gray-50 pb-2">
                    <span class="text-gray-500 text-sm">Đối tượng</span>
                    <span class="font-medium text-gray-800 text-sm text-right" id="detail-target">Tất cả khách hàng</span>
                </div>
                <div class="flex justify-between border-b border-gray-50 pb-2">
                    <span class="text-gray-500 text-sm">Thời gian</span>
                    <span class="font-medium text-gray-800 text-sm text-right" id="detail-time">01/01/2026 - 31/12/2026</span>
                </div>
                <div class="flex justify-between border-b border-gray-50 pb-2">
                    <span class="text-gray-500 text-sm">Lượt sử dụng</span>
                    <span class="font-medium text-gray-800 text-sm text-right"><span id="detail-used">0</span> / <span id="detail-total">100</span></span>
                </div>
                <div class="flex justify-between pt-1">
                    <span class="text-gray-500 text-sm">Trạng thái</span>
                    <span class="inline-flex px-2 py-0.5 rounded text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200" id="detail-status">Đang hoạt động</span>
                </div>
            </div>
        </div>
        
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
            <button onclick="closeDetailsModal()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Đóng</button>
            <a href="<?= APP_URL ?>/admin/voucher/sua" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md">Chỉnh sửa</a>
        </div>
    </div>
</div>

<!-- History Modal -->
<div id="historyModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[700px] max-w-[95%] transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <div>
                <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:receipt-text-outline"></span> Lịch sử sử dụng
                </h3>
                <p class="text-xs text-gray-500 mt-0.5">Voucher: <strong id="history-code" class="text-[#6B0D18]">CODE</strong></p>
            </div>
            <button onclick="closeHistoryModal()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        
        <div class="p-0 bg-white overflow-y-auto max-h-[60vh]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold sticky top-0">
                    <tr>
                        <th class="px-6 py-3">Khách hàng</th>
                        <th class="px-6 py-3">Mã đơn hàng</th>
                        <th class="px-6 py-3">Thời gian</th>
                        <th class="px-6 py-3 text-right">Giảm giá</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <!-- Mock rows -->
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-6 py-3 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">NA</div>
                            <div>
                                <div class="font-medium text-gray-800">Nguyễn Văn A</div>
                                <div class="text-[10px] text-gray-400">0901234567</div>
                            </div>
                        </td>
                        <td class="px-6 py-3"><a href="#" class="text-blue-600 hover:underline">#DH10025</a></td>
                        <td class="px-6 py-3">20/05/2026 14:30</td>
                        <td class="px-6 py-3 text-right font-medium text-[#6B0D18]">-50.000đ</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-6 py-3 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xs">TB</div>
                            <div>
                                <div class="font-medium text-gray-800">Trần Thị B</div>
                                <div class="text-[10px] text-gray-400">0987654321</div>
                            </div>
                        </td>
                        <td class="px-6 py-3"><a href="#" class="text-blue-600 hover:underline">#DH10024</a></td>
                        <td class="px-6 py-3">19/05/2026 09:15</td>
                        <td class="px-6 py-3 text-right font-medium text-[#6B0D18]">-20.000đ</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-6 py-3 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-xs">LC</div>
                            <div>
                                <div class="font-medium text-gray-800">Lê Văn C</div>
                                <div class="text-[10px] text-gray-400">0911223344</div>
                            </div>
                        </td>
                        <td class="px-6 py-3"><a href="#" class="text-blue-600 hover:underline">#DH10018</a></td>
                        <td class="px-6 py-3">18/05/2026 16:45</td>
                        <td class="px-6 py-3 text-right font-medium text-[#6B0D18]">-50.000đ</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
            <span class="text-sm text-gray-500">Hiển thị 3 giao dịch gần nhất</span>
            <button onclick="closeHistoryModal()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Đóng</button>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]">
    <div class="text-emerald-500 mt-0.5">
        <span class="iconify text-xl" data-icon="mdi:check-circle"></span>
    </div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toast-msg">Đã tạo voucher thành công.</p>
    </div>
    <button onclick="hideToast()" class="text-gray-400 hover:text-gray-600 ml-4"><span class="iconify" data-icon="mdi:close"></span></button>
</div>

<!-- Scripts -->
<script>
    // Toggle 3-dots Menu
    function toggleDropdown(btn) {
        // Close all other dropdowns
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if(menu !== btn.nextElementSibling) menu.classList.add('hidden');
        });
        btn.nextElementSibling.classList.toggle('hidden');
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.menu-dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        }
    });

    // Copy Voucher Code
    function copyCode(code) {
        navigator.clipboard.writeText(code);
        const tooltip = document.getElementById('tooltip-' + code);
        if(tooltip) {
            tooltip.classList.remove('opacity-0');
            tooltip.classList.add('opacity-100');
            tooltip.style.top = '-2.5rem';
            setTimeout(() => {
                tooltip.classList.add('opacity-0');
                tooltip.classList.remove('opacity-100');
                tooltip.style.top = '-2rem';
            }, 1500);
        }
    }

    // Trigger Toggle from Dropdown Menu
    function triggerToggleFromMenu(btn) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        const row = btn.closest('tr');
        const switchEl = row.querySelector('.toggle-switch');
        if (switchEl) {
            toggleVoucherStatus(switchEl);
        }
    }

    // Toggle Status (Switch & Logic Unified)
    function toggleVoucherStatus(el) {
        const thumb = el.querySelector('div > div');
        const bg = el.querySelector('div');
        const row = el.closest('tr');
        
        // Elements to update
        const statusSpan = row.querySelector('td:nth-child(7) > span.inline-flex');
        const actionBtn = row.querySelector('.action-toggle-btn');
        
        if (thumb.classList.contains('translate-x-4')) {
            // Action: Turn off
            thumb.classList.remove('translate-x-4');
            thumb.classList.add('translate-x-0');
            bg.classList.remove('bg-[#6B0D18]');
            bg.classList.add('bg-gray-300');
            
            // Update Pill
            if (statusSpan) {
                statusSpan.className = "inline-flex px-2 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200";
                statusSpan.textContent = "Đã tắt";
            }
            
            // Update Dropdown Button to "Bật lại"
            if (actionBtn) {
                actionBtn.className = "action-toggle-btn flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50";
                actionBtn.innerHTML = `<span class="iconify" data-icon="mdi:play-circle-outline"></span> <span>Bật lại</span>`;
            }
            
            showToast("Đã tạm tắt voucher.");
        } else {
            // Action: Turn on
            thumb.classList.remove('translate-x-0');
            thumb.classList.add('translate-x-4');
            bg.classList.remove('bg-gray-300');
            bg.classList.add('bg-[#6B0D18]');
            
            // Update Pill
            if (statusSpan) {
                statusSpan.className = "inline-flex px-2 py-1 rounded-md text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200";
                statusSpan.textContent = "Đang hoạt động";
            }
            
            // Update Dropdown Button to "Tạm tắt"
            if (actionBtn) {
                actionBtn.className = "action-toggle-btn flex items-center gap-2 px-4 py-2 text-sm text-amber-600 hover:bg-amber-50";
                actionBtn.innerHTML = `<span class="iconify" data-icon="mdi:pause-circle-outline"></span> <span>Tạm tắt</span>`;
            }
            
            showToast("Đã bật lại voucher.");
        }
    }

    // Switch Tabs
    function switchTab(btn) {
        // Remove active class from all tabs
        const tabs = document.querySelectorAll('.tab-btn');
        tabs.forEach(tab => {
            tab.classList.remove('border-[#6B0D18]', 'text-[#6B0D18]');
            tab.classList.add('border-transparent', 'text-gray-500');
        });
        
        // Add active class to clicked tab
        btn.classList.remove('border-transparent', 'text-gray-500');
        btn.classList.add('border-[#6B0D18]', 'text-[#6B0D18]');
        
        // Filtering logic
        const tabName = btn.textContent.split('(')[0].trim().toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        let count = 0;
        
        rows.forEach(row => {
            const statusEl = row.querySelector('td:nth-child(7) span.inline-flex');
            if (!statusEl) return;
            
            const statusText = statusEl.textContent.trim().toLowerCase();
            
            // "tất cả" shows all. Other tabs filter by text matching.
            if (tabName === 'tất cả' || statusText.includes(tabName) || (tabName === 'hết lượt' && statusText.includes('hết lượt dùng'))) {
                row.style.display = '';
                count++;
            } else {
                row.style.display = 'none';
            }
        });

        // Update pagination text for mockup
        const paginationText = document.querySelector('.p-4.border-t .text-gray-500');
        if (paginationText) {
            paginationText.innerHTML = `Hiển thị <span class="font-medium text-gray-800">${count > 0 ? 1 : 0}</span> - <span class="font-medium text-gray-800">${count}</span> trong <span class="font-medium text-gray-800">${count}</span> voucher`;
        }
    }

    // Mock generic actions
    function mockAction(msg) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        showToast(msg);
    }

    // Dropdown Management
    function toggleDropdown(btn) {
        // Close all other dropdowns
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if (menu !== btn.nextElementSibling) {
                menu.classList.add('hidden');
            }
        });
        // Toggle the clicked one
        btn.nextElementSibling.classList.toggle('hidden');
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.menu-dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });

    // Duplicate Voucher
    function duplicateVoucher(code, btn) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        const row = btn.closest('tr');
        
        showToast("Đang nhân bản voucher...");
        
        setTimeout(() => {
            const newRow = row.cloneNode(true);
            const newCode = code + "_COPY";
            
            // Update Code Text
            const codeSpan = newRow.querySelector('span.font-bold.tracking-wider');
            if (codeSpan) codeSpan.textContent = newCode;

            // Remove specific ids to avoid duplicates (like tooltips)
            const tooltip = newRow.querySelector('[id^="tooltip-"]');
            if (tooltip) tooltip.id = 'tooltip-' + newCode;
            
            // Rebind onClick for copyCode
            const copyDiv = newRow.querySelector('.group\\/code');
            if (copyDiv) copyDiv.setAttribute('onclick', `copyCode('${newCode}')`);

            // Insert new row after current row
            row.parentNode.insertBefore(newRow, row.nextSibling);
            
            // Highlight animation
            newRow.classList.add('bg-amber-50/50');
            setTimeout(() => newRow.classList.remove('bg-amber-50/50'), 2000);

            showToast("Đã nhân bản thành công mã " + newCode);
        }, 800);
    }

    // Delete Modal
    const delModal = document.getElementById('deleteModal');
    let rowToDelete = null;

    function confirmDeleteVoucher(code, uses, btn) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        document.getElementById('del-voucher-code').textContent = code;
        rowToDelete = btn.closest('tr');
        
        const warning = document.getElementById('delete-warning');
        const btnDisable = document.getElementById('btn-disable-alt');
        
        if (uses > 0) {
            warning.classList.remove('hidden');
            btnDisable.classList.remove('hidden');
        } else {
            warning.classList.add('hidden');
            btnDisable.classList.add('hidden');
        }
        
        delModal.classList.remove('hidden');
        setTimeout(() => {
            delModal.classList.remove('opacity-0');
            delModal.children[0].classList.remove('scale-95');
        }, 10);
    }

    function closeDeleteModal() {
        delModal.classList.add('opacity-0');
        delModal.children[0].classList.add('scale-95');
        setTimeout(() => {
            delModal.classList.add('hidden');
        }, 300);
    }

    function executeDelete() {
        closeDeleteModal();
        if (rowToDelete) {
            rowToDelete.remove();
            rowToDelete = null;
        }
        showToast("Đã xóa voucher thành công.");
    }

    // Toast functionality
    let toastTimeout;
    function showToast(msg) {
        const toast = document.getElementById('toast');
        document.getElementById('toast-msg').textContent = msg;
        
        toast.classList.remove('translate-y-20', 'opacity-0');
        
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            hideToast();
        }, 3000);
    }

    function hideToast() {
        const toast = document.getElementById('toast');
        toast.classList.add('translate-y-20', 'opacity-0');
    }

    // Details Modal
    const detailsModal = document.getElementById('detailsModal');
    function openDetailsModal(code) {
        // Mock data loading based on code
        document.getElementById('detail-code').textContent = code;
        document.getElementById('detail-name').textContent = code === 'THANG3' ? 'Khuyến mãi tháng 3' : 'Chương trình ưu đãi';
        document.getElementById('detail-value').textContent = code.includes('50') ? 'Giảm 50%' : 'Giảm 50.000đ';
        document.getElementById('detail-used').textContent = Math.floor(Math.random() * 50);
        document.getElementById('detail-total').textContent = 100;
        
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));

        detailsModal.classList.remove('hidden');
        setTimeout(() => {
            detailsModal.classList.remove('opacity-0');
            detailsModal.children[0].classList.remove('scale-95');
        }, 10);
    }

    function closeDetailsModal() {
        detailsModal.classList.add('opacity-0');
        detailsModal.children[0].classList.add('scale-95');
        setTimeout(() => {
            detailsModal.classList.add('hidden');
        }, 300);
    }

    // History Modal
    const historyModal = document.getElementById('historyModal');
    function openHistoryModal(code) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        document.getElementById('history-code').textContent = code;
        
        historyModal.classList.remove('hidden');
        setTimeout(() => {
            historyModal.classList.remove('opacity-0');
            historyModal.children[0].classList.remove('scale-95');
        }, 10);
    }

    function closeHistoryModal() {
        historyModal.classList.add('opacity-0');
        historyModal.children[0].classList.add('scale-95');
        setTimeout(() => {
            historyModal.classList.add('hidden');
        }, 300);
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
        // Nothing here for now
    });
</script>
