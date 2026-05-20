<?php
// views/pages/admin_san_pham.php
?>
<div class="space-y-6" x-data="productManagement()">
    <!-- Header Area -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 font-luxury">Quản lý sản phẩm</h2>
            <p class="text-sm text-gray-500 mt-1">Theo dõi, chỉnh sửa và quản lý toàn bộ sản phẩm vòng ngọc, chuỗi đá và trang sức phong thủy.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                <span class="iconify" data-icon="mdi:file-excel-outline"></span>
                Nhập / Xuất
            </button>
            <a href="<?= APP_URL ?>/admin/san-pham/them" class="flex items-center gap-2 px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:plus"></span>
                Thêm sản phẩm
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-gray-400" data-icon="mdi:package-variant-closed"></span> Tổng SP
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($thong_ke['tong_san_pham'] ?? 0) ?></div>
        </div>
        
        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-green-500" data-icon="mdi:eye-outline"></span> Đang hiển thị
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($thong_ke['dang_hien_thi'] ?? 0) ?></div>
        </div>

        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-orange-500" data-icon="mdi:alert-outline"></span> Sắp hết hàng
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($thong_ke['sap_het_hang'] ?? 0) ?></div>
        </div>

        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-red-600" data-icon="mdi:close-circle-outline"></span> Hết hàng
            </div>
            <div class="text-2xl font-bold text-red-600"><?= number_format($thong_ke['het_hang'] ?? 0) ?></div>
        </div>

        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:sale"></span> Giảm giá
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($thong_ke['dang_giam_gia'] ?? 0) ?></div>
        </div>

        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Đang ẩn
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($thong_ke['dang_an'] ?? 0) ?></div>
        </div>
    </div>

    <!-- Search & Filters -->
    <div class="bg-white p-4 rounded-[18px] shadow-sm border border-gray-100 space-y-4">
        <!-- Search bar -->
        <div class="relative">
            <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-[#6B0D18] text-xl" data-icon="mdi:magnify"></span>
            <input type="text" placeholder="Tìm theo tên sản phẩm, mã sản phẩm, loại đá..." 
                class="w-full pl-12 pr-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
        </div>
        
        <!-- Filters -->
        <div class="flex flex-wrap items-center gap-3">
            <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 relative bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <?php foreach($danh_muc_list as $dm): ?>
                    <option><?= $dm ?></option>
                <?php endforeach; ?>
            </select>
            
            <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Tất cả loại đá</option>
                <?php foreach($loai_da_list as $da): ?>
                    <option><?= $da ?></option>
                <?php endforeach; ?>
            </select>
            
            <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Tất cả mệnh</option>
                <?php foreach($menh_list as $m): ?>
                    <option><?= $m ?></option>
                <?php endforeach; ?>
            </select>
            
            <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Trạng thái: Tất cả</option>
                <option value="1">Đang hiển thị</option>
                <option value="0">Đang ẩn</option>
            </select>
            
            <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Tồn kho: Tất cả</option>
                <option value="con_hang">Còn hàng</option>
                <option value="sap_het">Sắp hết hàng</option>
                <option value="het_hang">Hết hàng</option>
            </select>
            
            <div class="flex-1"></div>
            
            <button class="px-4 py-2 text-[#6B0D18] hover:bg-red-50 rounded-lg transition-colors text-sm font-medium">
                Xóa bộ lọc
            </button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm">
                Lọc
            </button>
        </div>
    </div>

    <!-- Bulk Actions (Hidden by default, shown when items are selected) -->
    <div id="bulkActions" class="bg-white px-4 py-3 rounded-xl shadow-sm border border-[#6B0D18]/20 flex items-center justify-between hidden transition-all">
        <div class="flex items-center gap-3">
            <span class="text-[#6B0D18] font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:check-circle"></span>
                Đã chọn <span id="selectedCount">0</span> sản phẩm
            </span>
            <div class="h-4 w-px bg-gray-300 mx-1"></div>
            <button class="text-sm text-gray-600 hover:text-[#6B0D18] px-2 py-1 rounded transition-colors font-medium">Hiển thị</button>
            <button class="text-sm text-gray-600 hover:text-[#6B0D18] px-2 py-1 rounded transition-colors font-medium">Ẩn</button>
            <button class="text-sm text-gray-600 hover:text-[#6B0D18] px-2 py-1 rounded transition-colors font-medium">Gắn nhãn</button>
            <button class="text-sm text-gray-600 hover:text-[#6B0D18] px-2 py-1 rounded transition-colors font-medium">Tạo khuyến mãi</button>
        </div>
        <button class="text-sm text-red-600 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-colors font-medium border border-transparent hover:border-red-200 flex items-center gap-1">
            <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa
        </button>
    </div>

    <!-- Data Table -->
    <div class="bg-white border border-gray-200 rounded-[18px] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="productTable">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500 font-bold">
                        <th class="p-4 w-12 text-center">
                            <input type="checkbox" id="selectAll" class="w-4 h-4 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18] cursor-pointer">
                        </th>
                        <th class="p-4 w-20">Ảnh</th>
                        <th class="p-4 min-w-[250px] cursor-pointer hover:text-[#6B0D18] group">Sản phẩm <span class="iconify inline-block opacity-0 group-hover:opacity-100 transition-opacity" data-icon="mdi:arrow-down"></span></th>
                        <th class="p-4">Phân loại</th>
                        <th class="p-4">Mệnh</th>
                        <th class="p-4 text-right cursor-pointer hover:text-[#6B0D18] group">Giá <span class="iconify inline-block opacity-0 group-hover:opacity-100 transition-opacity" data-icon="mdi:arrow-down"></span></th>
                        <th class="p-4 text-right cursor-pointer hover:text-[#6B0D18] group">Tồn kho <span class="iconify inline-block opacity-0 group-hover:opacity-100 transition-opacity" data-icon="mdi:arrow-down"></span></th>
                        <th class="p-4 text-center">Trạng thái</th>
                        <th class="p-4 text-center w-24">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    <?php if (empty($san_pham_list)): ?>
                        <tr>
                            <td colspan="9" class="p-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <span class="iconify text-6xl mb-3" data-icon="mdi:package-variant-closed"></span>
                                    <p class="text-lg text-gray-600 font-medium mb-1">Chưa có sản phẩm nào</p>
                                    <p class="text-sm mb-4">Hãy thêm sản phẩm đầu tiên để bắt đầu bán vòng ngọc và chuỗi đá phong thủy.</p>
                                    <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm flex items-center gap-2">
                                        <span class="iconify" data-icon="mdi:plus"></span> Thêm sản phẩm
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($san_pham_list as $sp): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="p-4 text-center">
                                    <input type="checkbox" class="row-checkbox w-4 h-4 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18] cursor-pointer">
                                </td>
                                <td class="p-4">
                                    <?php if($sp['anh']): ?>
                                        <img src="<?= $sp['anh'] ?>" alt="Product" class="w-14 h-14 object-cover rounded-xl bg-gray-100 border border-gray-200">
                                    <?php else: ?>
                                        <div class="w-14 h-14 bg-gray-100 border border-gray-200 rounded-xl flex flex-col items-center justify-center text-gray-400">
                                            <span class="iconify text-xl" data-icon="mdi:image-outline"></span>
                                            <span class="text-[8px] mt-0.5">Trống</span>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="p-4">
                                    <div class="flex flex-col gap-0.5">
                                        <div class="flex items-center gap-1.5 flex-wrap">
                                            <span class="text-xs text-gray-500 font-medium font-mono cursor-pointer hover:text-[#6B0D18] whitespace-nowrap shrink-0" onclick="copyToClipboard('<?= $sp['ma_sp'] ?>')" title="Sao chép mã">
                                                <?= $sp['ma_sp'] ?>
                                            </span>
                                            <?php foreach($sp['nhan'] as $nhan): ?>
                                                <?php 
                                                    $badgeClass = 'bg-gray-100 text-gray-600';
                                                    if ($nhan === 'Mới') $badgeClass = 'bg-teal-50 text-teal-700 border border-teal-100';
                                                    if ($nhan === 'Bán chạy') $badgeClass = 'bg-[#E4D5C3]/30 text-[#6B0D18] border border-[#E4D5C3]';
                                                    if ($nhan === 'Giảm giá' || $nhan === 'Flash sale') $badgeClass = 'bg-red-50 text-red-700 border border-red-100';
                                                    if ($nhan === 'Cao cấp') $badgeClass = 'bg-gray-800 text-gray-100 border border-gray-700';
                                                ?>
                                                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded <?= $badgeClass ?> uppercase tracking-wider whitespace-nowrap shrink-0"><?= $nhan ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                        <a href="#" class="font-bold text-gray-900 hover:text-[#6B0D18] transition-colors leading-tight"><?= $sp['ten_sp'] ?></a>
                                        <span class="text-xs text-gray-500"><?= $sp['mo_ta_ngan'] ?></span>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-xs bg-gray-100 text-gray-700 px-2 py-0.5 rounded-md inline-block w-max font-medium"><?= $sp['danh_muc'] ?></span>
                                        <span class="text-xs text-gray-600 flex items-center gap-1"><span class="w-1 h-1 rounded-full bg-gray-400"></span> <?= $sp['loai_da'] ?></span>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div class="flex flex-wrap gap-1">
                                        <?php foreach($sp['menh'] as $m): ?>
                                            <span class="text-[10px] font-bold bg-[#FAF8F5] text-[#6B0D18] border border-[#E4D5C3]/50 px-1.5 py-0.5 rounded-md uppercase">
                                                <?= $m ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                                <td class="p-4 text-right">
                                    <div class="flex flex-col items-end">
                                        <?php if($sp['gia_khuyen_mai']): ?>
                                            <span class="font-bold text-[#6B0D18]"><?= number_format($sp['gia_khuyen_mai'], 0, ',', '.') ?>đ</span>
                                            <span class="text-xs text-gray-400 line-through"><?= number_format($sp['gia_ban'], 0, ',', '.') ?>đ</span>
                                        <?php else: ?>
                                            <span class="font-bold text-gray-900"><?= number_format($sp['gia_ban'], 0, ',', '.') ?>đ</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="p-4 text-right">
                                    <div class="flex flex-col items-end gap-1">
                                        <button onclick="openStockModal('<?= $sp['ten_sp'] ?>', <?= $sp['ton_kho'] ?>, this)" class="font-bold hover:text-[#6B0D18] transition-colors text-base flex items-center gap-1 group-hover:bg-white group-hover:px-2 group-hover:-mr-2 group-hover:rounded-md group-hover:shadow-sm">
                                            <?= $sp['ton_kho'] ?>
                                            <span class="iconify text-sm opacity-0 group-hover:opacity-100 text-gray-400" data-icon="mdi:pencil-outline"></span>
                                        </button>
                                        <?php 
                                            $tkStatus = $sp['trang_thai_ton_kho'];
                                            $tkClass = 'bg-gray-100 text-gray-600';
                                            if ($tkStatus === 'Còn hàng') $tkClass = 'text-green-600';
                                            if ($tkStatus === 'Sắp hết') $tkClass = 'text-orange-500 bg-orange-50 px-1.5 rounded';
                                            if ($tkStatus === 'Hết hàng') $tkClass = 'text-red-600 bg-red-50 px-1.5 rounded';
                                        ?>
                                        <span class="text-[10px] font-bold uppercase tracking-wider <?= $tkClass ?>"><?= $tkStatus ?></span>
                                    </div>
                                </td>
                                <td class="p-4 text-center">
                                    <?php 
                                        $tt = $sp['trang_thai'];
                                        $ttClass = 'bg-gray-100 text-gray-700 border-gray-200';
                                        if ($tt === 'Đang hiển thị') $ttClass = 'bg-emerald-50 text-emerald-700 border-emerald-200';
                                        if ($tt === 'Đang ẩn') $ttClass = 'bg-gray-100 text-gray-600 border-gray-200';
                                        if ($tt === 'Hết hàng') $ttClass = 'bg-red-50 text-red-700 border-red-200';
                                        if ($tt === 'Ngừng kinh doanh') $ttClass = 'bg-slate-100 text-slate-500 border-slate-200';
                                    ?>
                                    <span class="text-[11px] font-medium px-2 py-1 rounded-full border <?= $ttClass ?> inline-block whitespace-nowrap">
                                        <?= $tt ?>
                                    </span>
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center justify-center gap-1">
                                        <a href="<?= APP_URL ?>/admin/san-pham/chi-tiet" class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 transition-colors" title="Xem chi tiết">
                                            <span class="iconify text-lg" data-icon="mdi:eye-outline"></span>
                                        </a>
                                        <a href="<?= APP_URL ?>/admin/san-pham/sua" class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 transition-colors" title="Chỉnh sửa">
                                            <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                        </a>
                                        
                                        <!-- Dropdown Menu Toggle -->
                                        <div class="relative">
                                            <button onclick="toggleActionMenu(this)" class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-500 hover:bg-gray-100 transition-colors action-btn" title="Thêm thao tác">
                                                <span class="iconify text-lg pointer-events-none" data-icon="mdi:dots-vertical"></span>
                                            </button>
                                            
                                            <!-- Dropdown Menu -->
                                            <div class="w-48 bg-white border border-gray-100 rounded-xl shadow-lg z-[9999] hidden action-menu py-1">
                                                <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                    <span class="iconify text-gray-400" data-icon="mdi:content-copy"></span> Nhân bản SP
                                                </a>
                                                <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                    <span class="iconify text-gray-400" data-icon="mdi:ticket-percent-outline"></span> Tạo khuyến mãi
                                                </a>
                                                <?php if($tt === 'Đang hiển thị'): ?>
                                                <button onclick="openHideModal('<?= $sp['ten_sp'] ?>', this)" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                    <span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn sản phẩm
                                                </button>
                                                <?php else: ?>
                                                <button class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-green-600 transition-colors">
                                                    <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Hiện sản phẩm
                                                </button>
                                                <?php endif; ?>
                                                <div class="h-px bg-gray-100 my-1"></div>
                                                <button onclick="openDeleteModal('<?= $sp['ten_sp'] ?>', <?= $sp['da_ban'] ?>, this)" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                                    <span class="iconify text-red-500" data-icon="mdi:trash-can-outline"></span> Xóa sản phẩm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2 text-sm text-gray-500">
                Hiển thị 
                <select class="px-2 py-1 border border-gray-200 rounded-md bg-white focus:outline-none focus:border-[#6B0D18]">
                    <option>10</option>
                    <option>20</option>
                    <option>50</option>
                </select>
                trong 256 sản phẩm
            </div>
            
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 hover:bg-gray-50 transition-colors cursor-not-allowed">
                    <span class="iconify" data-icon="mdi:chevron-left"></span>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-[#6B0D18] bg-[#6B0D18] text-white transition-colors font-medium text-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18] hover:border-gray-300 transition-colors font-medium text-sm">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18] hover:border-gray-300 transition-colors font-medium text-sm">3</button>
                <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18] hover:border-gray-300 transition-colors font-medium text-sm">26</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition-colors">
                    <span class="iconify" data-icon="mdi:chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ================= MODALS ================= -->

<!-- Overlay -->
<div id="modalOverlay" class="fixed inset-0 bg-gray-900/40 z-40 hidden backdrop-blur-sm transition-opacity opacity-0" onclick="closeAllModals()"></div>

<!-- Quick View Modal -->
<div id="viewModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-3xl hidden opacity-0 scale-95 transition-all duration-300 max-h-[90vh] flex flex-col overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
        <h3 class="font-bold text-lg text-gray-900 font-luxury">Thông tin sản phẩm</h3>
        <button onclick="closeModal('viewModal')" class="text-gray-400 hover:text-gray-700 bg-gray-100 hover:bg-gray-200 p-1.5 rounded-full transition-colors">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>
    <div class="p-6 overflow-y-auto flex-1">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="w-full md:w-2/5">
                <div class="aspect-square bg-gray-100 rounded-[18px] border border-gray-200 overflow-hidden flex items-center justify-center">
                    <span class="iconify text-6xl text-gray-300" data-icon="mdi:image-outline"></span>
                </div>
            </div>
            <div class="w-full md:w-3/5 space-y-4">
                <div>
                    <h4 class="text-xl font-bold text-gray-900" id="viewModalTitle">Vòng Ngọc Bích Tài Lộc</h4>
                    <p class="text-sm text-gray-500 font-mono mt-1">Mã SP: NB-TL-001</p>
                </div>
                
                <div class="grid grid-cols-2 gap-y-4 gap-x-2 text-sm">
                    <div>
                        <span class="text-gray-500 block mb-1 text-xs">Danh mục</span>
                        <span class="font-medium text-gray-900">Vòng tay phong thủy</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block mb-1 text-xs">Loại đá</span>
                        <span class="font-medium text-gray-900">Ngọc bích</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block mb-1 text-xs">Giá bán</span>
                        <span class="font-bold text-[#6B0D18] text-base">850.000đ</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block mb-1 text-xs">Tồn kho / Đã bán</span>
                        <span class="font-medium text-gray-900">25 / 128</span>
                    </div>
                </div>
                
                <div class="h-px bg-gray-100 w-full my-2"></div>
                
                <div>
                    <span class="text-gray-500 block mb-1 text-xs">Mô tả ngắn</span>
                    <p class="text-gray-700 text-sm">Sản phẩm làm từ ngọc bích tự nhiên nguyên khối, được mài dũa thủ công. Phù hợp cho người mệnh Mộc và Hỏa, mang lại tài lộc, bình an.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-3 bg-gray-50/50">
        <button onclick="closeModal('viewModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-200 bg-gray-100 rounded-xl font-medium text-sm transition-colors">Đóng</button>
        <button class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
            <span class="iconify" data-icon="mdi:pencil"></span> Chỉnh sửa SP
        </button>
    </div>
</div>

<!-- Stock Update Modal -->
<div id="stockModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-sm hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-5">
        <h3 class="font-bold text-lg text-gray-900 mb-1">Cập nhật tồn kho</h3>
        <p class="text-sm text-gray-500" id="stockModalTitle">Vòng Ngọc Bích Tài Lộc</p>
        
        <div class="mt-5 space-y-4">
            <div>
                <label class="block text-xs font-medium text-gray-700 mb-1.5 uppercase tracking-wider">Số lượng thực tế trong kho</label>
                <input type="number" id="stockInput" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:bg-white text-lg font-bold transition-colors" min="0">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-700 mb-1.5 uppercase tracking-wider">Ghi chú (Tùy chọn)</label>
                <input type="text" placeholder="VD: Nhập thêm lô hàng mới" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:bg-white text-sm transition-colors">
            </div>
        </div>
    </div>
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-2 bg-gray-50/50 rounded-b-[24px]">
        <button onclick="closeModal('stockModal')" class="px-4 py-2 text-gray-600 hover:bg-gray-200 bg-gray-100 rounded-lg font-medium text-sm transition-colors">Hủy</button>
        <button onclick="submitStockModal()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm">Lưu cập nhật</button>
    </div>
</div>

<!-- Promo Modal -->
<div id="promoModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-sm hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-5">
        <h3 class="font-bold text-lg text-gray-900 mb-1">Tạo khuyến mãi</h3>
        <p class="text-sm text-gray-500" id="promoModalTitle">Sản phẩm</p>
        
        <div class="mt-5 space-y-4">
            <div>
                <label class="block text-xs font-medium text-gray-700 mb-1.5 uppercase tracking-wider">Mức giảm giá (%)</label>
                <input type="number" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:bg-white text-lg font-bold transition-colors" min="1" max="100" placeholder="VD: 15">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-700 mb-1.5 uppercase tracking-wider">Thời gian kết thúc</label>
                <input type="date" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:bg-white text-sm transition-colors">
            </div>
        </div>
    </div>
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-2 bg-gray-50/50 rounded-b-[24px]">
        <button onclick="closeModal('promoModal')" class="px-4 py-2 text-gray-600 hover:bg-gray-200 bg-gray-100 rounded-lg font-medium text-sm transition-colors">Hủy</button>
        <button onclick="submitPromoModal()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm">Lưu khuyến mãi</button>
    </div>
</div>

<!-- Tag Modal -->
<div id="tagModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-sm hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-5">
        <h3 class="font-bold text-lg text-gray-900 mb-1">Gắn nhãn sản phẩm</h3>
        <p class="text-sm text-gray-500">Chọn nhãn cho các sản phẩm đã chọn</p>
        
        <div class="mt-5 flex flex-wrap gap-2">
            <label class="cursor-pointer">
                <input type="checkbox" class="peer sr-only">
                <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-[#FAF8F5] peer-checked:text-[#6B0D18] peer-checked:border-[#E4D5C3] peer-checked:font-medium hover:bg-gray-50 transition-colors">Mới</div>
            </label>
            <label class="cursor-pointer">
                <input type="checkbox" class="peer sr-only">
                <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-[#FAF8F5] peer-checked:text-[#6B0D18] peer-checked:border-[#E4D5C3] peer-checked:font-medium hover:bg-gray-50 transition-colors">Bán chạy</div>
            </label>
            <label class="cursor-pointer">
                <input type="checkbox" class="peer sr-only">
                <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-[#FAF8F5] peer-checked:text-[#6B0D18] peer-checked:border-[#E4D5C3] peer-checked:font-medium hover:bg-gray-50 transition-colors">Flash sale</div>
            </label>
            <label class="cursor-pointer">
                <input type="checkbox" class="peer sr-only">
                <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-[#FAF8F5] peer-checked:text-[#6B0D18] peer-checked:border-[#E4D5C3] peer-checked:font-medium hover:bg-gray-50 transition-colors">Cao cấp</div>
            </label>
        </div>
    </div>
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-2 bg-gray-50/50 rounded-b-[24px]">
        <button onclick="closeModal('tagModal')" class="px-4 py-2 text-gray-600 hover:bg-gray-200 bg-gray-100 rounded-lg font-medium text-sm transition-colors">Hủy</button>
        <button onclick="submitTagModal()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm">Lưu nhãn</button>
    </div>
</div>

<!-- Hide Modal -->
<div id="hideModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-sm hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl text-gray-600" data-icon="mdi:eye-off-outline"></span>
        </div>
        <h3 class="font-bold text-lg text-gray-900 mb-2">Ẩn sản phẩm khỏi website?</h3>
        <p class="text-sm text-gray-500">Sản phẩm <strong class="text-gray-700" id="hideModalTitle"></strong> sẽ không còn hiển thị ở trang người dùng, nhưng dữ liệu vẫn được lưu trong hệ thống.</p>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('hideModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1">Hủy</button>
        <button onclick="submitHideModal()" class="px-5 py-2.5 bg-gray-800 text-white rounded-xl hover:bg-gray-900 font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận ẩn</button>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl text-red-500" data-icon="mdi:alert-outline"></span>
        </div>
        <h3 class="font-bold text-lg text-gray-900 mb-2">Xác nhận xóa sản phẩm</h3>
        <p class="text-sm text-gray-500">Bạn có chắc muốn xóa sản phẩm <strong class="text-gray-700" id="deleteModalTitle"></strong> không? Thao tác này không thể hoàn tác.</p>
        
        <div id="deleteWarning" class="mt-4 p-3 bg-orange-50 border border-orange-100 rounded-xl text-left flex gap-3 hidden">
            <span class="iconify text-orange-500 text-xl flex-shrink-0 mt-0.5" data-icon="mdi:information-outline"></span>
            <p class="text-xs text-orange-800">Sản phẩm này đã phát sinh <strong>đơn hàng</strong>. Bạn nên <span class="font-bold">Ẩn sản phẩm</span> thay vì xóa để tránh lỗi dữ liệu thống kê doanh thu.</p>
        </div>
    </div>
    <div class="px-6 pb-6 flex flex-col gap-2">
        <button onclick="closeModal('deleteModal')" class="w-full py-3 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm hidden" id="btnAlternativeHide">
            Ẩn sản phẩm thay thế
        </button>
        <div class="flex items-center gap-2">
            <button onclick="closeModal('deleteModal')" class="flex-1 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors">Hủy</button>
            <button onclick="submitDeleteModal()" class="flex-1 py-2.5 bg-red-100 text-red-700 hover:bg-red-200 rounded-xl font-medium text-sm transition-colors">Vẫn xóa</button>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('Đã copy mã: ' + text, 'success');
        });
    }

    // Toast System
    function showToast(message, type = 'success') {
        const toastContainer = document.getElementById('toastContainer') || createToastContainer();
        
        const toast = document.createElement('div');
        toast.className = `transform transition-all duration-300 translate-y-full opacity-0 flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg border text-sm font-medium mb-3`;
        
        if(type === 'success') {
            toast.classList.add('bg-emerald-50', 'text-emerald-800', 'border-emerald-200');
            toast.innerHTML = `<span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle"></span> ${message}`;
        } else if(type === 'error') {
            toast.classList.add('bg-red-50', 'text-red-800', 'border-red-200');
            toast.innerHTML = `<span class="iconify text-red-500 text-lg" data-icon="mdi:alert-circle"></span> ${message}`;
        }
        
        toastContainer.appendChild(toast);
        
        // Animate in
        setTimeout(() => {
            toast.classList.remove('translate-y-full', 'opacity-0');
        }, 10);
        
        // Remove after 3s
        setTimeout(() => {
            toast.classList.add('translate-y-full', 'opacity-0');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    function createToastContainer() {
        const container = document.createElement('div');
        container.id = 'toastContainer';
        container.className = 'fixed bottom-4 right-4 z-[9999] flex flex-col items-end';
        document.body.appendChild(container);
        return container;
    }

    // Modal Control Logic
    const overlay = document.getElementById('modalOverlay');
    let activeModal = null;

    function openModal(id) {
        const modal = document.getElementById(id);
        if(!modal) return;
        
        // Hide active modal if any
        if(activeModal) {
            activeModal.classList.remove('opacity-100', 'scale-100');
            activeModal.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                activeModal.classList.add('hidden');
                showNewModal(modal);
            }, 200);
        } else {
            showNewModal(modal);
        }
    }

    function showNewModal(modal) {
        overlay.classList.remove('hidden');
        modal.classList.remove('hidden');
        
        // Trigger reflow
        void modal.offsetWidth;
        
        overlay.classList.remove('opacity-0');
        overlay.classList.add('opacity-100');
        modal.classList.remove('opacity-0', 'scale-95');
        modal.classList.add('opacity-100', 'scale-100');
        activeModal = modal;
        
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if(!modal) return;
        
        modal.classList.remove('opacity-100', 'scale-100');
        modal.classList.add('opacity-0', 'scale-95');
        overlay.classList.remove('opacity-100');
        overlay.classList.add('opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            overlay.classList.add('hidden');
            activeModal = null;
            document.body.style.overflow = '';
        }, 300);
    }

    function closeAllModals() {
        if(activeModal) {
            closeModal(activeModal.id);
        }
    }

    // Specific modal openers
    let currentRow = null;

    function openViewModal(title) {
        document.getElementById('viewModalTitle').textContent = title;
        openModal('viewModal');
    }

    function openStockModal(title, currentStock, btn) {
        currentRow = btn.closest('tr');
        document.getElementById('stockModalTitle').textContent = title;
        document.getElementById('stockInput').value = currentStock;
        openModal('stockModal');
    }

    function submitStockModal() {
        const newVal = parseInt(document.getElementById('stockInput').value);
        if(isNaN(newVal) || newVal < 0) {
            showToast('Số lượng tồn kho không hợp lệ', 'error');
            return;
        }

        if(currentRow) {
            const stockBtn = currentRow.querySelector('button[onclick^="openStockModal"]');
            if(stockBtn) {
                stockBtn.innerHTML = `${newVal} <span class="iconify text-sm opacity-0 group-hover:opacity-100 text-gray-400" data-icon="mdi:pencil-outline"></span>`;
            }
            
            // Cập nhật trạng thái text bên dưới
            const statusDiv = currentRow.querySelector('td:nth-child(7) div.flex-col');
            if(statusDiv) {
                let statusHtml = '';
                if(newVal === 0) {
                    statusHtml = `<span class="text-[10px] font-bold uppercase tracking-wider text-red-600 bg-red-50 px-1.5 rounded status-stock">Hết hàng</span>`;
                } else if(newVal <= 5) {
                    statusHtml = `<span class="text-[10px] font-bold uppercase tracking-wider text-orange-500 bg-orange-50 px-1.5 rounded status-stock">Sắp hết</span>`;
                } else {
                    statusHtml = `<span class="text-[10px] font-bold uppercase tracking-wider text-green-600 status-stock">Còn hàng</span>`;
                }
                
                const existingStatus = statusDiv.querySelector('span.status-stock') || statusDiv.querySelector('span.text-\\[10px\\]');
                if(existingStatus) {
                    existingStatus.outerHTML = statusHtml;
                } else {
                    statusDiv.insertAdjacentHTML('beforeend', statusHtml);
                }
            }
        }
        closeModal('stockModal');
        showToast('Cập nhật tồn kho thành công', 'success');
    }

    function openPromoModal(title, btn) {
        currentRow = btn.closest('tr');
        document.getElementById('promoModalTitle').textContent = title;
        openModal('promoModal');
    }

    function submitPromoModal() {
        const discountInput = document.querySelector('#promoModal input[type="number"]').value;
        const discount = parseInt(discountInput);
        
        if(isNaN(discount) || discount < 1 || discount > 100) {
            showToast('Vui lòng nhập mức giảm giá hợp lệ từ 1-100%', 'error');
            return;
        }

        if(currentRow) {
            // Apply to single row
            applyPromoToRow(currentRow, discount);
        } else {
            // Apply to multiple rows
            document.querySelectorAll('.row-checkbox:checked').forEach(cb => {
                applyPromoToRow(cb.closest('tr'), discount);
            });
            // Uncheck all after bulk action
            setTimeout(() => {
                rowCheckboxes.forEach(cb => cb.checked = false);
                selectAll.checked = false;
                updateBulkActions();
            }, 300);
        }

        closeModal('promoModal');
        showToast('Đã tạo khuyến mãi thành công', 'success');
    }

    function applyPromoToRow(tr, discount) {
        // Find price cell (column 6)
        const priceDiv = tr.querySelector('td:nth-child(6) div.flex-col');
        if(!priceDiv) return;
        
        // Find current price (either strong text-gray-900 or line-through if already discounted)
        const currentPriceSpan = priceDiv.querySelector('span.text-gray-900, span.line-through');
        if(currentPriceSpan) {
            // Extract numeric value
            const priceText = currentPriceSpan.textContent.replace(/\D/g, '');
            const originalPrice = parseInt(priceText);
            
            if(originalPrice > 0) {
                const newPrice = originalPrice * (100 - discount) / 100;
                
                // Format prices
                const formatNumber = (num) => new Intl.NumberFormat('vi-VN').format(Math.round(num)) + 'đ';
                
                priceDiv.innerHTML = `
                    <span class="font-bold text-[#6B0D18]">${formatNumber(newPrice)}</span>
                    <span class="text-xs text-gray-400 line-through">${formatNumber(originalPrice)}</span>
                `;
            }
        }
        
        // Add "GIẢM GIÁ" tag to column 3
        addTagToRow(tr, 'Giảm giá', 'bg-red-50 text-red-700 border border-red-100');
    }

    function submitTagModal() {
        const selectedTags = [];
        document.querySelectorAll('#tagModal input[type="checkbox"]:checked').forEach(cb => {
            selectedTags.push(cb.nextElementSibling.textContent.trim());
        });
        
        if(selectedTags.length === 0) {
            showToast('Vui lòng chọn ít nhất một nhãn', 'error');
            return;
        }

        const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
        if(checkedBoxes.length > 0) {
            checkedBoxes.forEach(cb => {
                const tr = cb.closest('tr');
                selectedTags.forEach(tag => {
                    let badgeClass = 'bg-gray-100 text-gray-600';
                    if (tag === 'Mới') badgeClass = 'bg-teal-50 text-teal-700 border border-teal-100';
                    if (tag === 'Bán chạy') badgeClass = 'bg-[#E4D5C3]/30 text-[#6B0D18] border border-[#E4D5C3]';
                    if (tag === 'Flash sale') badgeClass = 'bg-red-50 text-red-700 border border-red-100';
                    if (tag === 'Cao cấp') badgeClass = 'bg-gray-800 text-gray-100 border border-gray-700';
                    
                    addTagToRow(tr, tag, badgeClass);
                });
            });
            
            setTimeout(() => {
                rowCheckboxes.forEach(cb => cb.checked = false);
                selectAll.checked = false;
                updateBulkActions();
            }, 300);
        }

        closeModal('tagModal');
        showToast('Đã gắn nhãn thành công', 'success');
        
        // Reset checkboxes in modal
        document.querySelectorAll('#tagModal input[type="checkbox"]').forEach(cb => cb.checked = false);
    }
    
    function addTagToRow(tr, tagText, badgeClass) {
        const tagsContainer = tr.querySelector('td:nth-child(3) div.flex.items-center');
        if(tagsContainer) {
            // Check if tag already exists
            const existingTags = Array.from(tagsContainer.querySelectorAll('span')).map(s => s.textContent.trim().toUpperCase());
            if(!existingTags.includes(tagText.toUpperCase())) {
                const newTag = `<span class="text-[9px] font-bold px-1.5 py-0.5 rounded ${badgeClass} uppercase tracking-wider whitespace-nowrap shrink-0">${tagText}</span>`;
                tagsContainer.insertAdjacentHTML('beforeend', newTag);
            }
        }
    }

    function openHideModal(title, btn) {
        currentRow = btn.closest('tr');
        document.getElementById('hideModalTitle').textContent = title;
        openModal('hideModal');
    }

    function submitHideModal() {
        if(currentRow) {
            // Đổi trạng thái hiển thị
            const statusBadge = currentRow.querySelector('td:nth-child(8) span');
            if(statusBadge) {
                statusBadge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-gray-100 text-gray-600 border-gray-200 inline-block whitespace-nowrap';
                statusBadge.textContent = 'Đang ẩn';
            }
        }
        closeModal('hideModal');
        showToast('Đã ẩn sản phẩm', 'success');
    }

    function openDeleteModal(title, soldCount, btn) {
        currentRow = btn.closest('tr');
        document.getElementById('deleteModalTitle').textContent = title;
        
        const warning = document.getElementById('deleteWarning');
        const btnAlternativeHide = document.getElementById('btnAlternativeHide');
        
        if(soldCount > 0) {
            warning.classList.remove('hidden');
            btnAlternativeHide.classList.remove('hidden');
        } else {
            warning.classList.add('hidden');
            btnAlternativeHide.classList.add('hidden');
        }
        
        openModal('deleteModal');
    }

    function submitDeleteModal() {
        if(currentRow) {
            currentRow.style.opacity = '0';
            setTimeout(() => {
                currentRow.remove();
            }, 300);
        }
        closeModal('deleteModal');
        showToast('Đã xóa sản phẩm', 'success');
    }

    // Dropdown Action Menu Logic
    function toggleActionMenu(button) {
        // Close all other menus first
        document.querySelectorAll('.action-menu').forEach(menu => {
            if(menu !== button.nextElementSibling) {
                menu.classList.add('hidden');
            }
        });
        
        const menu = button.nextElementSibling;
        
        if (menu.classList.contains('hidden')) {
            // Hiển thị menu trước để lấy chiều cao thực tế
            menu.classList.remove('hidden');
            
            // Lấy tọa độ của nút và kích thước menu
            const rect = button.getBoundingClientRect();
            const menuHeight = menu.offsetHeight;
            const spaceBelow = window.innerHeight - rect.bottom;
            
            // Đặt fixed position
            menu.style.position = 'fixed';
            menu.style.left = (rect.right - 192) + 'px'; // 192px = w-48
            menu.style.zIndex = '9999';
            
            // Nếu không đủ chỗ trống phía dưới, mở menu ngược lên trên
            if (spaceBelow < menuHeight + 10) {
                menu.style.top = (rect.top - menuHeight - 5) + 'px';
            } else {
                menu.style.top = (rect.bottom + 5) + 'px';
            }
        } else {
            menu.classList.add('hidden');
        }
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.action-btn') && !e.target.closest('.action-menu')) {
            document.querySelectorAll('.action-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });

    // Close dropdowns on scroll to prevent fixed position detachment
    window.addEventListener('scroll', () => {
        document.querySelectorAll('.action-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
    }, true);

    // Checkbox and Bulk Actions Logic
    const selectAll = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCountSpan = document.getElementById('selectedCount');

    function updateBulkActions() {
        const selectedCount = document.querySelectorAll('.row-checkbox:checked').length;
        selectedCountSpan.textContent = selectedCount;
        
        if (selectedCount > 0) {
            bulkActions.classList.remove('hidden');
        } else {
            bulkActions.classList.add('hidden');
        }
        
        selectAll.checked = selectedCount === rowCheckboxes.length && rowCheckboxes.length > 0;
    }

    selectAll.addEventListener('change', (e) => {
        const isChecked = e.target.checked;
        rowCheckboxes.forEach(cb => {
            cb.checked = isChecked;
        });
        updateBulkActions();
    });

    rowCheckboxes.forEach(cb => {
        cb.addEventListener('change', updateBulkActions);
    });

    // Bulk actions simulate
    function simulateBulkAction(actionName) {
        const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
        const count = checkedBoxes.length;
        if(count > 0) {
            if(actionName.includes('xóa')) {
                checkedBoxes.forEach(cb => {
                    const tr = cb.closest('tr');
                    tr.style.opacity = '0';
                    setTimeout(() => tr.remove(), 300);
                });
            } else if(actionName.includes('ẩn')) {
                checkedBoxes.forEach(cb => {
                    const badge = cb.closest('tr').querySelector('td:nth-child(8) span');
                    if(badge) {
                        badge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-gray-100 text-gray-600 border-gray-200 inline-block whitespace-nowrap';
                        badge.textContent = 'Đang ẩn';
                    }
                });
            } else if(actionName.includes('hiển thị')) {
                checkedBoxes.forEach(cb => {
                    const badge = cb.closest('tr').querySelector('td:nth-child(8) span');
                    if(badge) {
                        badge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-emerald-50 text-emerald-700 border-emerald-200 inline-block whitespace-nowrap';
                        badge.textContent = 'Đang hiển thị';
                    }
                });
            } else if(actionName.includes('gắn nhãn')) {
                openModal('tagModal');
                return; // Prevent showing toast here since modal will handle it
            } else if(actionName.includes('tạo khuyến mãi')) {
                openModal('promoModal');
                document.getElementById('promoModalTitle').textContent = `${count} sản phẩm đã chọn`;
                return;
            }
            
            showToast(`Đã ${actionName} ${count} sản phẩm thành công`, 'success');
            
            // Uncheck all
            setTimeout(() => {
                rowCheckboxes.forEach(cb => cb.checked = false);
                selectAll.checked = false;
                updateBulkActions();
            }, 300);
        }
    }

    // Attach bulk actions
    document.querySelectorAll('#bulkActions button').forEach(btn => {
        btn.addEventListener('click', function() {
            const text = this.textContent.trim().toLowerCase();
            simulateBulkAction(text); 
        });
    });

    // Mock Single dropdown actions
    document.addEventListener('click', (e) => {
        const link = e.target.closest('a[href="#"]');
        if(link) {
            const text = link.textContent.trim();
            if(text.includes('Nhân bản')) {
                e.preventDefault();
                const tr = link.closest('tr');
                if(tr) {
                    const clone = tr.cloneNode(true);
                    // Reset checkbox id/state if needed
                    const cb = clone.querySelector('.row-checkbox');
                    if(cb) cb.checked = false;
                    
                    clone.style.backgroundColor = '#f0fdf4'; // Light green to highlight
                    tr.parentNode.insertBefore(clone, tr.nextSibling);
                    
                    setTimeout(() => {
                        clone.style.backgroundColor = '';
                    }, 2000);
                }
                showToast('Đã nhân bản sản phẩm', 'success');
            } else if(text.includes('Tạo khuyến mãi')) {
                e.preventDefault();
                const tr = link.closest('tr');
                if(tr) {
                    openPromoModal(tr.querySelector('td:nth-child(3) a').textContent.trim(), link);
                }
            }
        }
        
        // Handle "Hiện sản phẩm" button inside dropdown
        const btn = e.target.closest('button');
        if(btn && btn.textContent.trim() === 'Hiện sản phẩm') {
            const tr = btn.closest('tr');
            if(tr) {
                const statusBadge = tr.querySelector('td:nth-child(8) span');
                if(statusBadge) {
                    statusBadge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-emerald-50 text-emerald-700 border-emerald-200 inline-block whitespace-nowrap';
                    statusBadge.textContent = 'Đang hiển thị';
                }
                showToast('Đã hiện sản phẩm', 'success');
                // Hide dropdown
                btn.closest('.action-menu').classList.add('hidden');
                
                // Change button text back to Hide
                btn.innerHTML = `<span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn sản phẩm`;
                btn.setAttribute('onclick', `openHideModal('${tr.querySelector('td:nth-child(3) a').textContent.trim()}', this)`);
            }
        }
    });

</script>
