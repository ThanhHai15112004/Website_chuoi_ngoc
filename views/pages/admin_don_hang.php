<?php
// views/pages/admin_don_hang.php
?>
<<div class="max-w-7xl mx-auto space-y-6 relative">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Quản lý đơn hàng</h1>
            <p class="text-gray-500 text-sm mt-1">Theo dõi, xác nhận và cập nhật trạng thái các đơn hàng của khách.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="showToast('Đang xuất danh sách đơn hàng ra file Excel...')" class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify text-lg" data-icon="mdi:file-excel-outline"></span>
                Xuất danh sách
            </button>
            <button onclick="showToast('Đã làm mới dữ liệu đơn hàng')" class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify text-lg" data-icon="mdi:refresh"></span>
                Làm mới
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
        <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center gap-2 mb-2">
                <span class="iconify text-gray-400 text-lg" data-icon="mdi:receipt-text-outline"></span>
                <span class="text-[10px] font-medium text-gray-500 uppercase tracking-wider">Tổng đơn hàng</span>
            </div>
            <div>
                <span class="text-2xl font-bold text-gray-900" id="statTongDon"><?= number_format($stats['tong_don'], 0, ',', '.') ?></span>
                <span class="text-[10px] text-gray-500 ml-1">đơn</span>
            </div>
        </div>
        <div class="bg-yellow-50 p-4 rounded-[18px] border border-yellow-200 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute -right-2 -top-2 w-12 h-12 bg-yellow-100 rounded-full opacity-50"></div>
            <div class="flex items-center gap-2 mb-2 relative z-10">
                <span class="iconify text-yellow-600 text-lg" data-icon="mdi:clock-outline"></span>
                <span class="text-[10px] font-bold text-yellow-700 uppercase tracking-wider">Chờ xác nhận</span>
            </div>
            <div class="relative z-10 flex items-baseline gap-2">
                <span class="text-2xl font-bold text-yellow-800" id="statChoXacNhan"><?= number_format($stats['cho_xac_nhan'], 0, ',', '.') ?></span>
                <span class="text-[10px] font-bold text-yellow-700 bg-yellow-200 px-1.5 py-0.5 rounded">Cần xử lý</span>
            </div>
        </div>
        <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center gap-2 mb-2">
                <span class="iconify text-teal-500 text-lg" data-icon="mdi:truck-delivery-outline"></span>
                <span class="text-[10px] font-medium text-teal-600 uppercase tracking-wider">Đang giao</span>
            </div>
            <div>
                <span class="text-2xl font-bold text-gray-900" id="statDangGiao"><?= number_format($stats['dang_giao'], 0, ',', '.') ?></span>
                <span class="text-[10px] text-gray-500 ml-1">đơn</span>
            </div>
        </div>
        <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center gap-2 mb-2">
                <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle-outline"></span>
                <span class="text-[10px] font-medium text-emerald-600 uppercase tracking-wider">Thành công</span>
            </div>
            <div>
                <span class="text-2xl font-bold text-gray-900" id="statThanhCong"><?= number_format($stats['thanh_cong'], 0, ',', '.') ?></span>
                <span class="text-[10px] text-gray-500 ml-1">đơn</span>
            </div>
        </div>
        <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center gap-2 mb-2">
                <span class="iconify text-gray-400 text-lg" data-icon="mdi:cancel"></span>
                <span class="text-[10px] font-medium text-gray-500 uppercase tracking-wider">Đã hủy</span>
            </div>
            <div>
                <span class="text-2xl font-bold text-gray-600" id="statDaHuy"><?= number_format($stats['da_huy'], 0, ',', '.') ?></span>
                <span class="text-[10px] text-gray-400 ml-1">đơn</span>
            </div>
        </div>
        <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-red-50 rounded-full opacity-50"></div>
            <div class="flex items-center gap-2 mb-2 relative z-10">
                <span class="iconify text-[#6B0D18] text-lg" data-icon="mdi:cash-multiple"></span>
                <span class="text-[10px] font-medium text-gray-500 uppercase tracking-wider">Doanh thu (Thành công)</span>
            </div>
            <div class="relative z-10">
                <span class="text-xl font-bold text-[#6B0D18] tracking-tight"><?= number_format($stats['doanh_thu'], 0, ',', '.') ?>đ</span>
            </div>
        </div>
    </div>

    <!-- Tabs trạng thái -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 hide-scrollbar border-b border-gray-200" id="statusTabs">
        <button onclick="switchTab(this, 'Tất cả')" class="tab-btn px-4 py-2 text-sm font-bold text-[#6B0D18] border-b-2 border-[#6B0D18] whitespace-nowrap flex items-center gap-2 transition-colors">
            Tất cả <span class="bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded text-[10px] font-mono"><?= number_format($stats['tong_don'], 0, ',', '.') ?></span>
        </button>
        <button onclick="switchTab(this, 'Chờ xác nhận')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap flex items-center gap-2 transition-colors border-b-2 border-transparent hover:border-gray-300">
            Chờ xác nhận <span class="bg-red-50 text-red-600 px-1.5 py-0.5 rounded text-[10px] font-mono font-bold" id="tabChoXacNhan"><?= $stats['cho_xac_nhan'] ?></span>
        </button>
        <button onclick="switchTab(this, 'Xác nhận đơn hàng')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap transition-colors border-b-2 border-transparent hover:border-gray-300">
            Xác nhận đơn hàng
        </button>
        <button onclick="switchTab(this, 'Đang giao')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap flex items-center gap-2 transition-colors border-b-2 border-transparent hover:border-gray-300">
            Đang giao <span class="bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded text-[10px] font-mono" id="tabDangGiao"><?= $stats['dang_giao'] ?></span>
        </button>
        <button onclick="switchTab(this, 'Đã giao')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap transition-colors border-b-2 border-transparent hover:border-gray-300">
            Đã giao
        </button>
        <button onclick="switchTab(this, 'Thành công')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap flex items-center gap-2 transition-colors border-b-2 border-transparent hover:border-gray-300">
            Thành công <span class="bg-emerald-50 text-emerald-600 px-1.5 py-0.5 rounded text-[10px] font-mono font-bold" id="tabThanhCong"><?= $stats['thanh_cong'] ?></span>
        </button>
        <button onclick="switchTab(this, 'Đã hủy')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap flex items-center gap-2 transition-colors border-b-2 border-transparent hover:border-gray-300">
            Đã hủy <span class="bg-gray-100 text-gray-500 px-1.5 py-0.5 rounded text-[10px] font-mono" id="tabDaHuy"><?= $stats['da_huy'] ?></span>
        </button>
    </div>

    <!-- Main Table Container -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm mb-10">
        
        <!-- Search & Filter Bar -->
        <div class="p-4 border-b border-gray-100 flex flex-col gap-3">
            <div class="flex flex-col lg:flex-row gap-3">
                <!-- Search -->
                <div class="relative flex-1 group">
                    <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-[#6B0D18] transition-colors" data-icon="mdi:magnify"></span>
                    <input type="text" placeholder="Tìm theo mã đơn, tên khách hàng, số điện thoại..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                </div>
                
                <!-- Filters -->
                <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar">
                    <select class="px-3 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 min-w-[140px] cursor-pointer">
                        <option value="">Thời gian: Tất cả</option>
                        <option value="today">Hôm nay</option>
                        <option value="7days">7 ngày qua</option>
                        <option value="30days">30 ngày qua</option>
                        <option value="month">Tháng này</option>
                    </select>
                    
                    <select class="px-3 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 min-w-[140px] cursor-pointer">
                        <option value="">Thanh toán: Tất cả</option>
                        <option value="chua_tt">Chưa thanh toán</option>
                        <option value="cho_tt">Chờ thanh toán</option>
                        <option value="da_tt">Đã thanh toán</option>
                        <option value="loi">Thanh toán thất bại</option>
                    </select>
                    
                    <select class="px-3 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 min-w-[160px] cursor-pointer">
                        <option value="">Hình thức: Tất cả</option>
                        <option value="cod">Thanh toán khi nhận hàng</option>
                        <option value="ck">Chuyển khoản</option>
                        <option value="vnpay">VNPay</option>
                    </select>
                    
                    <button class="px-4 py-2 text-white bg-[#6B0D18] rounded-xl hover:bg-[#4C0519] text-sm font-medium transition-colors whitespace-nowrap flex items-center gap-1.5 shadow-sm">
                        <span class="iconify" data-icon="mdi:filter-variant"></span> Lọc
                    </button>
                </div>
            </div>
            
            <!-- Active Filters Chips -->
            <div class="flex items-center gap-2 flex-wrap">
                <span class="text-xs text-gray-500 font-medium">Đang lọc theo:</span>
                <div class="flex items-center gap-1 px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-700">
                    Thời gian: Tháng này
                    <button class="text-gray-400 hover:text-red-500 ml-1"><span class="iconify" data-icon="mdi:close"></span></button>
                </div>
                <div class="flex items-center gap-1 px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-700">
                    Hình thức: COD
                    <button class="text-gray-400 hover:text-red-500 ml-1"><span class="iconify" data-icon="mdi:close"></span></button>
                </div>
                <button class="text-xs text-[#6B0D18] hover:underline ml-2 font-medium">Xóa bộ lọc</button>
            </div>
        </div>

        <!-- Bulk Actions Bar (Hidden by default) -->
        <div id="bulkActions" class="bg-red-50/50 px-4 py-3 border-b border-red-100 hidden items-center justify-between">
            <div class="flex items-center gap-2 text-sm">
                <span class="font-bold text-[#6B0D18]" id="selectedCount">0</span>
                <span class="text-gray-700">đơn hàng đang chọn</span>
            </div>
            <div class="flex items-center gap-2">
                <button onclick="showToast('Đã xác nhận các đơn hàng được chọn!')" class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="iconify text-emerald-500" data-icon="mdi:check-all"></span> Xác nhận đơn
                </button>
                <button onclick="openPrintModal()" class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="iconify text-gray-500" data-icon="mdi:printer-outline"></span> In phiếu giao
                </button>
                <button onclick="showToast('Đã hủy các đơn hàng được chọn!', 'error')" class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-lg text-xs font-medium hover:bg-red-50 hover:border-red-200 transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="iconify" data-icon="mdi:cancel"></span> Hủy đơn
                </button>
            </div>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap min-w-[1200px]">
                <thead class="sticky top-0 bg-white z-10 shadow-[0_1px_2px_rgba(0,0,0,0.05)]">
                    <tr class="bg-gray-50/80 backdrop-blur-sm border-b border-gray-200 text-xs text-gray-500 uppercase tracking-wider font-semibold">
                        <th class="p-3 w-10 text-center"><input type="checkbox" id="selectAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] cursor-pointer"></th>
                        <th class="p-3 w-32">Mã đơn hàng</th>
                        <th class="p-3 w-48">Khách hàng</th>
                        <th class="p-3 w-64">Sản phẩm</th>
                        <th class="p-3 w-32">Ngày đặt</th>
                        <th class="p-3 w-32 text-right">Tổng tiền</th>
                        <th class="p-3 w-40 text-center">Thanh toán</th>
                        <th class="p-3 w-40 text-center">Vận chuyển</th>
                        <th class="p-3 w-32 text-center">Trạng thái</th>
                        <th class="p-3 w-32 text-center">Nhân viên</th>
                        <th class="p-3 w-28 text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <?php foreach($don_hang_list as $dh): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="p-3 text-center">
                                <input type="checkbox" class="row-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] cursor-pointer opacity-50 group-hover:opacity-100 transition-opacity">
                            </td>
                            <td class="p-3">
                                <button onclick="openQuickView('<?= $dh['ma_don'] ?>')" class="font-bold text-[#6B0D18] hover:underline tracking-tight"><?= $dh['ma_don'] ?></button>
                                <?php if($dh['ma_van_don']): ?>
                                    <div class="text-[10px] text-gray-400 mt-0.5 flex items-center gap-1" title="Mã vận đơn">
                                        <span class="iconify" data-icon="mdi:barcode-scan"></span> <?= $dh['ma_van_don'] ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="p-3">
                                <div class="font-bold text-gray-900"><?= $dh['khach_hang'] ?></div>
                                <div class="text-xs text-gray-500 mt-0.5"><?= $dh['sdt'] ?></div>
                            </td>
                            <td class="p-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-xs <?= $dh['icon_mau'] ?> shadow-sm shrink-0">
                                        <?= $dh['icon_chu'] ?>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-900 truncate max-w-[180px]" title="<?= $dh['san_pham_chinh'] ?>"><?= $dh['san_pham_chinh'] ?></span>
                                        <div class="flex items-center gap-1 mt-0.5 text-xs text-gray-500">
                                            <span><?= $dh['tong_so_luong'] ?> sản phẩm</span>
                                            <?php if($dh['so_luong_sp_khac'] > 0): ?>
                                                <span class="text-gray-300">•</span>
                                                <button onclick="openQuickView('<?= $dh['ma_don'] ?>')" class="text-[#6B0D18] hover:underline">+<?= $dh['so_luong_sp_khac'] ?> sp khác</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-3">
                                <div class="text-gray-900"><?= explode(' ', $dh['ngay_dat'])[0] ?></div>
                                <div class="text-xs text-gray-500 mt-0.5"><?= explode(' ', $dh['ngay_dat'])[1] ?></div>
                            </td>
                            <td class="p-3 text-right font-bold text-[#6B0D18]">
                                <?= number_format($dh['tong_tien'], 0, ',', '.') ?>đ
                            </td>
                            <td class="p-3">
                                <div class="flex flex-col items-center gap-1">
                                    <div class="text-xs font-medium text-gray-700"><?= $dh['hinh_thuc_thanh_toan'] ?></div>
                                    <?php
                                        $tt_class = '';
                                        if($dh['trang_thai_thanh_toan'] == 'Chưa thanh toán') $tt_class = 'bg-yellow-50 text-yellow-700 border-yellow-200';
                                        elseif($dh['trang_thai_thanh_toan'] == 'Chờ thanh toán') $tt_class = 'bg-orange-50 text-orange-700 border-orange-200';
                                        elseif($dh['trang_thai_thanh_toan'] == 'Đã thanh toán') $tt_class = 'bg-blue-50 text-blue-700 border-blue-200';
                                        elseif($dh['trang_thai_thanh_toan'] == 'Thanh toán thất bại') $tt_class = 'bg-red-50 text-red-700 border-red-200';
                                        else $tt_class = 'bg-gray-50 text-gray-700 border-gray-200';
                                    ?>
                                    <span class="text-[10px] font-medium px-2 py-0.5 rounded-md border <?= $tt_class ?> tracking-wide whitespace-nowrap">
                                        <?= $dh['trang_thai_thanh_toan'] ?>
                                    </span>
                                </div>
                            </td>
                            <td class="p-3 text-center">
                                <div class="text-sm text-gray-700"><?= $dh['van_chuyen'] ?></div>
                                <?php if(!$dh['ma_van_don']): ?>
                                    <div class="text-[10px] text-gray-400 mt-0.5">Chưa có vận đơn</div>
                                <?php endif; ?>
                            </td>
                            <td class="p-3 text-center">
                                <?php
                                    $st_class = '';
                                    if($dh['trang_thai'] == 'Chờ xác nhận') $st_class = 'bg-red-50 text-[#6B0D18] border-red-200 font-bold';
                                    elseif($dh['trang_thai'] == 'Xác nhận đơn hàng') $st_class = 'bg-blue-50 text-blue-700 border-blue-200';
                                    elseif($dh['trang_thai'] == 'Đang giao') $st_class = 'bg-teal-50 text-teal-700 border-teal-200';
                                    elseif($dh['trang_thai'] == 'Đã giao') $st_class = 'bg-purple-50 text-purple-700 border-purple-200';
                                    elseif($dh['trang_thai'] == 'Thành công') $st_class = 'bg-emerald-50 text-emerald-700 border-emerald-200 font-bold';
                                    elseif($dh['trang_thai'] == 'Đã hủy') $st_class = 'bg-gray-100 text-gray-600 border-gray-200';
                                    else $st_class = 'bg-gray-50 text-gray-600 border-gray-200';
                                ?>
                                <span class="text-[11px] px-2.5 py-1 rounded-full border <?= $st_class ?> inline-block shadow-[0_1px_2px_rgba(0,0,0,0.02)]">
                                    <?= $dh['trang_thai'] ?>
                                </span>
                            </td>
                            <td class="p-3 text-center">
                                <?php if($dh['nhan_vien'] == 'Chưa xử lý'): ?>
                                    <span class="text-[10px] font-medium px-2 py-0.5 rounded bg-yellow-50 text-yellow-700 border border-yellow-200">Chưa xử lý</span>
                                <?php else: ?>
                                    <div class="text-sm font-medium text-gray-800"><?= $dh['nhan_vien'] ?></div>
                                    <div class="text-[10px] text-gray-400 mt-0.5" title="Thời gian cập nhật">Cập nhật: <?= $dh['thoi_gian_xl'] ?></div>
                                <?php endif; ?>
                            </td>
                            <td class="p-3 text-center relative">
                                <div class="flex items-center justify-center gap-1.5 relative">
                                    <!-- Nút thao tác nhanh dựa trên trạng thái -->
                                    <?php if($dh['trang_thai'] == 'Chờ xác nhận'): ?>
                                        <button onclick="openConfirmModal('<?= $dh['ma_don'] ?>', '<?= $dh['khach_hang'] ?>')" class="px-2.5 py-1.5 bg-[#6B0D18] text-white rounded-lg text-xs font-medium hover:bg-[#4C0519] transition-colors shadow-sm" title="Xác nhận đơn">Xác nhận</button>
                                    <?php elseif($dh['trang_thai'] == 'Xác nhận đơn hàng'): ?>
                                        <button onclick="openShippingModal('<?= $dh['ma_don'] ?>')" class="px-2.5 py-1.5 bg-blue-600 text-white rounded-lg text-xs font-medium hover:bg-blue-700 transition-colors shadow-sm" title="Chuyển sang Đang giao">Giao hàng</button>
                                    <?php elseif($dh['trang_thai'] == 'Đang giao'): ?>
                                        <button onclick="openDeliveredModal('<?= $dh['ma_don'] ?>')" class="px-2.5 py-1.5 bg-purple-600 text-white rounded-lg text-xs font-medium hover:bg-purple-700 transition-colors shadow-sm" title="Đánh dấu Đã giao">Đã giao</button>
                                    <?php elseif($dh['trang_thai'] == 'Đã giao'): ?>
                                        <button onclick="openSuccessModal('<?= $dh['ma_don'] ?>')" class="px-2.5 py-1.5 bg-emerald-600 text-white rounded-lg text-xs font-medium hover:bg-emerald-700 transition-colors shadow-sm" title="Xác nhận Thành công">Hoàn tất</button>
                                    <?php else: ?>
                                        <button onclick="openQuickView('<?= $dh['ma_don'] ?>')" class="px-2.5 py-1.5 bg-gray-100 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-200 transition-colors border border-gray-200">Xem</button>
                                    <?php endif; ?>

                                    <button class="action-btn p-1.5 text-gray-400 hover:text-gray-900 hover:bg-gray-200 rounded-lg transition-colors border border-transparent" onclick="toggleActionMenu(this)">
                                        <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                    </button>

                                    <!-- Dropdown Menu -->
                                    <div class="w-52 bg-white border border-gray-100 rounded-xl shadow-xl z-[99] hidden action-menu py-1.5 fixed text-left right-0 origin-top-right">
                                        <button onclick="openQuickView('<?= $dh['ma_don'] ?>')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                            <span class="iconify text-gray-400" data-icon="mdi:flash-outline"></span> Xem nhanh
                                        </button>
                                        <a href="/shopbanhangchuoingoc/admin/don-hang/chi-tiet/<?= $dh['ma_don'] ?>" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                            <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết đầy đủ
                                        </a>
                                        <button onclick="openPrintModal('<?= $dh['ma_don'] ?>')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                            <span class="iconify text-gray-400" data-icon="mdi:printer-outline"></span> In hóa đơn
                                        </button>
                                        <?php if(in_array($dh['trang_thai'], ['Chờ xác nhận', 'Xác nhận đơn hàng'])): ?>
                                            <div class="h-px bg-gray-100 my-1.5 w-full"></div>
                                            <button onclick="openCancelModal('<?= $dh['ma_don'] ?>')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors font-medium">
                                                <span class="iconify" data-icon="mdi:cancel"></span> Hủy đơn hàng
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between shrink-0 bg-white rounded-b-2xl">
            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-500">Hiển thị</span>
                <select class="px-2 py-1.5 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-[#6B0D18] text-sm text-gray-700">
                    <option>10</option>
                    <option selected>20</option>
                    <option>50</option>
                    <option>100</option>
                </select>
                <span class="text-sm text-gray-500">trong tổng số <?= number_format($stats['tong_don'], 0, ',', '.') ?> đơn</span>
            </div>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed bg-gray-50"><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-medium text-sm shadow-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">3</button>
                <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">63</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
            </div>
        </div>
    </div>
</div>

<!-- ================= MODALS & PANELS ================= -->

<!-- Quick View Panel (Right Slide-in) -->
<div id="quickViewPanel" class="fixed inset-y-0 right-0 z-50 w-full md:w-[480px] bg-white shadow-[-10px_0_30px_rgba(0,0,0,0.1)] translate-x-full transition-transform duration-300 flex flex-col hidden">
    <!-- Panel Header -->
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between shrink-0 bg-[#FAF8F5]">
        <div class="flex items-center gap-3">
            <h3 class="font-bold text-xl text-[#6B0D18] tracking-tight" id="qvOrderCode">#DH202600123</h3>
            <span id="qvOrderStatus" class="text-[11px] font-bold px-2.5 py-1 rounded-full border bg-red-50 text-[#6B0D18] border-red-200">Chờ xác nhận</span>
        </div>
        <button onclick="closeQuickView()" class="text-gray-400 hover:text-gray-700 transition-colors p-1.5 rounded-xl hover:bg-gray-200 bg-white shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>
    
    <!-- Panel Content -->
    <div class="flex-1 overflow-y-auto p-6 space-y-6">
        <!-- Khách hàng & Giao hàng -->
        <div class="bg-gray-50/50 rounded-2xl p-4 border border-gray-100 space-y-4">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center shrink-0">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:account-circle-outline"></span>
                </div>
                <div>
                    <div class="font-bold text-gray-900" id="qvCustomerName">Nguyễn Văn An</div>
                    <div class="text-sm text-gray-500 mt-0.5" id="qvCustomerPhone">0901234567</div>
                </div>
            </div>
            <div class="h-px w-full bg-gray-200"></div>
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center shrink-0">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:map-marker-outline"></span>
                </div>
                <div class="text-sm text-gray-700 leading-relaxed">
                    123 Đường Nguyễn Trãi, Phường 2, Quận 5, TP.HCM
                </div>
            </div>
        </div>

        <!-- Sản phẩm -->
        <div>
            <h4 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:package-variant"></span> Sản phẩm
            </h4>
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-xl shadow-sm shrink-0 border border-emerald-100">NB</div>
                    <div class="flex-1 min-w-0">
                        <div class="font-medium text-gray-900 truncate">Vòng Ngọc Bích Tài Lộc</div>
                        <div class="text-xs text-gray-500 mt-0.5">Size: 16cm</div>
                    </div>
                    <div class="text-right shrink-0">
                        <div class="font-bold text-[#6B0D18]">850.000đ</div>
                        <div class="text-xs text-gray-500">x1</div>
                    </div>
                </div>
                <!-- Sp 2 -->
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-xl shadow-sm shrink-0 border border-amber-100">TH</div>
                    <div class="flex-1 min-w-0">
                        <div class="font-medium text-gray-900 truncate">Nhẫn Tỳ Hưu Mạ Vàng</div>
                        <div class="text-xs text-gray-500 mt-0.5">Size: 10</div>
                    </div>
                    <div class="text-right shrink-0">
                        <div class="font-bold text-[#6B0D18]">450.000đ</div>
                        <div class="text-xs text-gray-500">x1</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ghi chú nội bộ -->
        <div class="bg-yellow-50/50 rounded-2xl p-4 border border-yellow-100">
            <h4 class="font-bold text-yellow-800 text-sm mb-2 flex items-center gap-1.5">
                <span class="iconify" data-icon="mdi:note-edit-outline"></span> Ghi chú nội bộ (Khách không thấy)
            </h4>
            <textarea class="w-full bg-white border border-yellow-200 rounded-xl p-3 text-sm focus:outline-none focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 placeholder-yellow-300 resize-none" rows="3" placeholder="Nhập ghi chú cho nhân viên kho / đóng gói..."></textarea>
            <button class="mt-2 px-3 py-1.5 bg-yellow-100 text-yellow-800 hover:bg-yellow-200 rounded-lg text-xs font-bold transition-colors">Lưu ghi chú</button>
        </div>
    </div>

    <!-- Panel Footer -->
    <div class="px-6 py-4 border-t border-gray-100 flex flex-col gap-3 shrink-0 bg-white">
        <div class="flex items-center justify-between">
            <span class="text-gray-500 text-sm">Tổng thanh toán</span>
            <span class="font-bold text-xl text-[#6B0D18]">1.360.000đ</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="#" id="qvFullDetailLink" class="flex-1 px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors text-center shadow-sm">
                Xem chi tiết đầy đủ
            </a>
            <button onclick="openConfirmModal('DH202600123', 'Nguyễn Văn An')" class="flex-1 px-4 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors text-center shadow-sm">
                Xác nhận đơn
            </button>
        </div>
    </div>
</div>

<!-- Modal Overlay cho Quick View -->
<div id="qvOverlay" class="fixed inset-0 bg-gray-900/40 backdrop-blur-sm z-40 hidden opacity-0 transition-opacity duration-300" onclick="closeQuickView()"></div>

<!-- Confirm Modal (Xác nhận đơn) -->
<div id="confirmModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-3xl shadow-2xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-sm">
            <span class="iconify text-3xl text-[#6B0D18]" data-icon="mdi:check-decagram-outline"></span>
        </div>
        <h3 class="font-bold text-xl text-gray-900 mb-2">Xác nhận đơn hàng</h3>
        <p class="text-sm text-gray-500 mb-4">Xác nhận đơn <strong class="text-[#6B0D18]" id="cmOrderCode"></strong> của khách <strong class="text-gray-800" id="cmCustomer"></strong>?</p>
        
        <div class="bg-amber-50 border border-amber-100 rounded-xl p-3 text-sm text-amber-800 text-left mb-4 flex items-start gap-2">
            <span class="iconify text-amber-600 text-lg shrink-0 mt-0.5" data-icon="mdi:information-outline"></span>
            Vui lòng kiểm tra tồn kho sản phẩm và thông tin giao hàng trước khi xác nhận.
        </div>
        
        <label class="flex items-center gap-2 cursor-pointer bg-gray-50 p-3 rounded-xl border border-gray-200">
            <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] w-4 h-4">
            <span class="text-sm text-gray-700 font-medium">Gửi thông báo (Email/SMS) cho khách hàng</span>
        </label>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('confirmModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
        <button onclick="submitAction('confirmModal', 'Đã xác nhận đơn hàng thành công!')" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận đơn</button>
    </div>
</div>

<!-- Shipping Modal (Chuyển Đang Giao) -->
<div id="shippingModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-3xl shadow-2xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 shrink-0">
                <span class="iconify text-2xl" data-icon="mdi:truck-fast-outline"></span>
            </div>
            <div>
                <h3 class="font-bold text-lg text-gray-900">Giao cho vận chuyển</h3>
                <p class="text-xs text-gray-500">Đơn hàng <strong id="smOrderCode"></strong></p>
            </div>
        </div>
        
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Đơn vị vận chuyển</label>
                <select class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 text-sm">
                    <option>Giao Hàng Nhanh (GHN)</option>
                    <option>Giao Hàng Tiết Kiệm (GHTK)</option>
                    <option>Viettel Post</option>
                    <option>AhaMove (Hỏa tốc)</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Mã vận đơn <span class="text-red-500">*</span></label>
                <input type="text" placeholder="VD: GHN123456789" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all text-sm font-mono">
            </div>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" checked class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 w-4 h-4">
                <span class="text-sm text-gray-700">Gửi mã vận đơn cho khách theo dõi</span>
            </label>
        </div>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('shippingModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
        <button onclick="submitAction('shippingModal', 'Đã chuyển sang trạng thái Đang giao!')" class="px-5 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 font-medium text-sm transition-colors flex-1 shadow-sm">Cập nhật Đang giao</button>
    </div>
</div>

<!-- Delivered Modal (Đã giao) -->
<div id="deliveredModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-3xl shadow-2xl w-full max-w-sm hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-8 text-center">
        <div class="w-16 h-16 bg-purple-50 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-sm">
            <span class="iconify text-3xl text-purple-600" data-icon="mdi:package-check"></span>
        </div>
        <h3 class="font-bold text-xl text-gray-900 mb-2">Đánh dấu đã giao hàng?</h3>
        <p class="text-sm text-gray-500">Xác nhận đơn hàng <strong class="text-gray-800" id="dmOrderCode"></strong> đã được giao thành công đến tay người nhận.</p>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('deliveredModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
        <button onclick="submitAction('deliveredModal', 'Đã đánh dấu Đã giao hàng!')" class="px-5 py-2.5 bg-purple-600 text-white rounded-xl hover:bg-purple-700 font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận</button>
    </div>
</div>

<!-- Success Modal (Hoàn tất / Thành công) -->
<div id="successModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-3xl shadow-2xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-sm">
            <span class="iconify text-3xl text-emerald-500" data-icon="mdi:check-decagram"></span>
        </div>
        <h3 class="font-bold text-xl text-gray-900 mb-2">Hoàn tất đơn hàng</h3>
        <p class="text-sm text-gray-500 mb-4">Đơn hàng <strong class="text-gray-800" id="smcOrderCode"></strong> sẽ được tính vào doanh thu thành công.</p>
        
        <label class="flex items-center gap-2 cursor-pointer bg-emerald-50/50 p-3 rounded-xl border border-emerald-100">
            <input type="checkbox" checked class="rounded border-emerald-500 text-emerald-600 focus:ring-emerald-500 w-4 h-4">
            <span class="text-sm text-emerald-800 font-medium">Gửi email cảm ơn và mời đánh giá sản phẩm</span>
        </label>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('successModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
        <button onclick="submitAction('successModal', 'Đơn hàng đã hoàn tất thành công!')" class="px-5 py-2.5 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận thành công</button>
    </div>
</div>

<!-- Cancel Modal (Hủy đơn) -->
<div id="cancelModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-3xl shadow-2xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-sm">
            <span class="iconify text-3xl text-red-600" data-icon="mdi:close-octagon-outline"></span>
        </div>
        <h3 class="font-bold text-xl text-gray-900 mb-2">Hủy đơn hàng</h3>
        <p class="text-sm text-gray-500 mb-4">Vui lòng chọn lý do hủy đơn hàng <strong class="text-gray-800" id="cmCancelOrderCode"></strong>.</p>
        
        <div class="text-left space-y-3 mb-4">
            <label class="flex items-center gap-2 cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-200">
                <input type="radio" name="cancelReason" checked class="text-red-600 focus:ring-red-500 w-4 h-4">
                <span class="text-sm text-gray-700">Khách yêu cầu hủy</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-200">
                <input type="radio" name="cancelReason" class="text-red-600 focus:ring-red-500 w-4 h-4">
                <span class="text-sm text-gray-700">Không liên hệ được khách</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-200">
                <input type="radio" name="cancelReason" class="text-red-600 focus:ring-red-500 w-4 h-4">
                <span class="text-sm text-gray-700">Sản phẩm hết hàng</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-200">
                <input type="radio" name="cancelReason" class="text-red-600 focus:ring-red-500 w-4 h-4">
                <span class="text-sm text-gray-700">Lý do khác...</span>
            </label>
        </div>
        
        <label class="flex items-center gap-2 cursor-pointer bg-gray-50 p-3 rounded-xl border border-gray-200 text-left">
            <input type="checkbox" checked class="rounded border-red-300 text-red-600 focus:ring-red-500 w-4 h-4">
            <span class="text-sm text-gray-700 font-medium">Hoàn lại số lượng tồn kho</span>
        </label>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('cancelModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Không hủy</button>
        <button onclick="submitAction('cancelModal', 'Đã hủy đơn hàng!')" class="px-5 py-2.5 bg-red-600 text-white rounded-xl hover:bg-red-700 font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận hủy đơn</button>
    </div>
</div>

<!-- Print Invoice Modal (Giả lập) -->
<div id="printModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm" onclick="closeModal('printModal')"></div>
    <div class="bg-gray-100 rounded-2xl shadow-2xl w-full max-w-3xl mx-4 relative z-10 scale-95 transition-transform duration-300 flex flex-col max-h-[90vh] overflow-hidden border border-gray-300">
        <!-- Toolbar Máy in -->
        <div class="px-4 py-3 bg-gray-800 text-white flex items-center justify-between shrink-0">
            <div class="flex items-center gap-3">
                <span class="iconify text-xl text-gray-400" data-icon="mdi:printer"></span>
                <span class="font-medium text-sm">Xem trước bản in hóa đơn</span>
            </div>
            <div class="flex items-center gap-2">
                <button onclick="showToast('Đang kết nối máy in...'); setTimeout(() => closeModal('printModal'), 1000);" class="px-4 py-1.5 bg-blue-600 hover:bg-blue-500 rounded text-sm font-bold shadow transition-colors">
                    In ngay
                </button>
                <button onclick="closeModal('printModal')" class="px-3 py-1.5 bg-gray-700 hover:bg-gray-600 rounded text-sm font-medium transition-colors">
                    Đóng
                </button>
            </div>
        </div>
        
        <!-- Khổ giấy A5/A4 -->
        <div class="flex-1 overflow-auto p-8 flex justify-center bg-gray-300 print-bg">
            <div class="bg-white w-[500px] min-h-[600px] shadow-lg p-8 relative print-paper font-serif text-black">
                <!-- Nội dung hóa đơn giả lập -->
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold uppercase tracking-widest border-b-2 border-black pb-2 inline-block">Chuỗi Ngọc Phong Thủy</h1>
                    <p class="text-xs mt-2 italic">Mang tài lộc, vượng bình an</p>
                    <p class="text-xs">Đ/c: Phố Ngọc Trai, TP. Phong Thủy - SĐT: 0909.123.456</p>
                </div>
                
                <h2 class="text-xl font-bold text-center uppercase mb-6">Phiếu Giao Hàng & Hóa Đơn</h2>
                
                <div class="flex justify-between text-sm mb-6">
                    <div>
                        <p><strong>Mã đơn:</strong> <span id="pmOrderCode">DH202600123</span></p>
                        <p><strong>Ngày đặt:</strong> 17/05/2026 20:35</p>
                    </div>
                    <div class="text-right border border-black p-2 rounded">
                        <p class="text-xs mb-1">Mã vận đơn:</p>
                        <p class="font-bold font-mono tracking-widest text-lg">GHN-12345</p>
                    </div>
                </div>

                <div class="border-t border-b border-dashed border-gray-400 py-4 mb-6 text-sm">
                    <p><strong>Khách hàng:</strong> Nguyễn Văn An</p>
                    <p><strong>Điện thoại:</strong> 0901234567</p>
                    <p><strong>Địa chỉ:</strong> 123 Đường Ngọc Trai, Phường Đá Quý, Quận Cẩm Thạch, TP. Phong Thủy</p>
                </div>

                <table class="w-full text-sm mb-6 text-left">
                    <thead class="border-b-2 border-black">
                        <tr>
                            <th class="py-2">Sản phẩm</th>
                            <th class="py-2 text-center w-12">SL</th>
                            <th class="py-2 text-right w-24">Đơn giá</th>
                            <th class="py-2 text-right w-24">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody class="border-b border-black">
                        <tr>
                            <td class="py-2 pr-2">Vòng Ngọc Bích Tài Lộc (16cm)</td>
                            <td class="py-2 text-center">1</td>
                            <td class="py-2 text-right">1.360.000</td>
                            <td class="py-2 text-right">1.360.000</td>
                        </tr>
                    </tbody>
                    <tfoot class="font-bold">
                        <tr>
                            <td colspan="3" class="py-2 text-right">Tổng cộng:</td>
                            <td class="py-2 text-right text-lg">1.360.000đ</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="py-1 text-right font-normal">Hình thức thanh toán:</td>
                            <td class="py-1 text-right font-normal">Thanh toán COD</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="py-1 text-right font-bold uppercase text-red-600">Tiền cần thu (COD):</td>
                            <td class="py-1 text-right font-bold text-xl border-t border-black">1.360.000đ</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="text-center text-sm mt-12 italic text-gray-600">
                    <p>Cảm ơn quý khách đã mua sắm tại Chuỗi Ngọc Phong Thủy!</p>
                    <p>Hỗ trợ bảo hành/đổi trả: 0909.123.456</p>
                </div>
                
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-[10px] text-gray-400">
                    Trang 1/1
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-6 right-6 z-[9999] flex flex-col gap-3"></div>

<script>
    // Copy to clipboard
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('Đã sao chép: ' + text, 'success');
        });
    }

    // Toast logic
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `flex items-center gap-3 px-4 py-3 bg-white rounded-xl shadow-lg border-l-4 transform transition-all duration-300 translate-y-10 opacity-0 min-w-[300px] z-[9999]`;
        
        if (type === 'success') {
            toast.classList.add('border-emerald-500');
            toast.innerHTML = `
                <div class="w-8 h-8 bg-emerald-50 rounded-full flex items-center justify-center shrink-0">
                    <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check"></span>
                </div>
                <p class="text-sm font-medium text-gray-800 flex-1">${message}</p>
                <button class="text-gray-400 hover:text-gray-600" onclick="this.parentElement.remove()">
                    <span class="iconify" data-icon="mdi:close"></span>
                </button>
            `;
        } else {
            toast.classList.add('border-red-500');
            toast.innerHTML = `
                <div class="w-8 h-8 bg-red-50 rounded-full flex items-center justify-center shrink-0">
                    <span class="iconify text-red-500 text-lg" data-icon="mdi:alert-circle"></span>
                </div>
                <p class="text-sm font-medium text-gray-800 flex-1">${message}</p>
                <button class="text-gray-400 hover:text-gray-600" onclick="this.parentElement.remove()">
                    <span class="iconify" data-icon="mdi:close"></span>
                </button>
            `;
        }

        document.getElementById('toastContainer').appendChild(toast);
        setTimeout(() => {
            toast.classList.remove('translate-y-10', 'opacity-0');
        }, 10);

        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-x-10');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Modal logic chung
    function openModal(id) {
        const modal = document.getElementById(id);
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            if(modal.children[1] && modal.children[1].classList.contains('scale-95')) {
                modal.children[1].classList.remove('scale-95');
            }
        }, 10);
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        modal.classList.add('opacity-0');
        if(modal.children[1] && !modal.children[1].classList.contains('scale-95')) {
            modal.children[1].classList.add('scale-95');
        }
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Các hàm mở Modal Cụ thể
    function openConfirmModal(code, customer) {
        document.getElementById('cmOrderCode').textContent = code;
        document.getElementById('cmCustomer').textContent = customer;
        openModal('confirmModal');
        closeActionMenus();
    }

    function openShippingModal(code) {
        document.getElementById('smOrderCode').textContent = code;
        openModal('shippingModal');
        closeActionMenus();
    }

    function openDeliveredModal(code) {
        document.getElementById('dmOrderCode').textContent = code;
        openModal('deliveredModal');
        closeActionMenus();
    }

    function openSuccessModal(code) {
        document.getElementById('smcOrderCode').textContent = code;
        openModal('successModal');
        closeActionMenus();
    }

    function openCancelModal(code) {
        document.getElementById('cmCancelOrderCode').textContent = code;
        openModal('cancelModal');
        closeActionMenus();
    }
    
    function openPrintModal(code = 'DH202600123') {
        document.getElementById('pmOrderCode').textContent = code;
        openModal('printModal');
        closeActionMenus();
    }

    function submitAction(modalId, successMsg) {
        closeModal(modalId);
        showToast(successMsg, 'success');
        if(modalId === 'confirmModal' || modalId === 'shippingModal') {
            closeQuickView(); // Close QuickView if open
        }
    }

    // Quick View Panel
    function openQuickView(code) {
        document.getElementById('qvOrderCode').textContent = code;
        document.getElementById('qvFullDetailLink').href = '/shopbanhangchuoingoc/admin/don-hang/chi-tiet/' + code;
        const panel = document.getElementById('quickViewPanel');
        const overlay = document.getElementById('qvOverlay');
        
        panel.classList.remove('hidden');
        overlay.classList.remove('hidden');
        
        setTimeout(() => {
            panel.classList.remove('translate-x-full');
            overlay.classList.remove('opacity-0');
        }, 10);
    }

    function closeQuickView() {
        const panel = document.getElementById('quickViewPanel');
        const overlay = document.getElementById('qvOverlay');
        
        panel.classList.add('translate-x-full');
        overlay.classList.add('opacity-0');
        
        setTimeout(() => {
            panel.classList.add('hidden');
            overlay.classList.add('hidden');
        }, 300);
    }

    // Dropdown Action Menu
    function toggleActionMenu(button) {
        document.querySelectorAll('.action-menu-dropdown').forEach(m => {
            if (m !== button.nextElementSibling) m.classList.add('hidden');
        });
        
        const menu = button.nextElementSibling;
        
        if (menu.classList.contains('hidden')) {
            menu.classList.add('action-menu-dropdown');
            menu.classList.remove('hidden');
            
            const rect = button.getBoundingClientRect();
            const menuHeight = menu.offsetHeight;
            const spaceBelow = window.innerHeight - rect.bottom;
            
            menu.style.position = 'fixed';
            menu.style.right = (window.innerWidth - rect.right) + 'px';
            menu.style.left = 'auto';
            menu.style.zIndex = '9999';
            
            // Nếu không đủ chỗ trống phía dưới, mở menu ngược lên trên
            if (spaceBelow < menuHeight + 10) {
                menu.style.top = (rect.top - menuHeight - 5) + 'px';
                menu.style.bottom = 'auto';
            } else {
                menu.style.top = (rect.bottom + 5) + 'px';
                menu.style.bottom = 'auto';
            }
        } else {
            menu.classList.add('hidden');
        }
    }

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.action-menu-dropdown') && !e.target.closest('button[onclick^="toggleActionMenu"]')) {
            document.querySelectorAll('.action-menu-dropdown').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });

    window.addEventListener('scroll', function() {
        document.querySelectorAll('.action-menu-dropdown:not(.hidden)').forEach(m => m.classList.add('hidden'));
    }, true);

    // Checkbox logic for Bulk Actions
    const selectAll = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');

    function updateBulkActions() {
        const count = document.querySelectorAll('.row-checkbox:checked').length;
        if(count > 0) {
            bulkActions.classList.remove('hidden');
            bulkActions.classList.add('flex');
            selectedCount.textContent = count;
        } else {
            bulkActions.classList.add('hidden');
            bulkActions.classList.remove('flex');
        }
    }

    selectAll.addEventListener('change', function() {
        rowCheckboxes.forEach(cb => cb.checked = this.checked);
        updateBulkActions();
    });

    rowCheckboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            const allChecked = Array.from(rowCheckboxes).every(c => c.checked);
            selectAll.checked = allChecked;
            updateBulkActions();
        });
    });

    // Tab logic
    function switchTab(clickedBtn, status) {
        // Reset all tabs
        const tabs = document.querySelectorAll('.tab-btn');
        tabs.forEach(tab => {
            tab.className = 'tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap flex items-center gap-2 transition-colors border-b-2 border-transparent hover:border-gray-300';
            const badge = tab.querySelector('span');
            if(badge) {
                badge.className = 'bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded text-[10px] font-mono';
            }
        });

        // Active clicked tab
        clickedBtn.className = 'tab-btn px-4 py-2 text-sm font-bold text-[#6B0D18] border-b-2 border-[#6B0D18] whitespace-nowrap flex items-center gap-2 transition-colors';
        const activeBadge = clickedBtn.querySelector('span');
        if(activeBadge) {
            if(status === 'Chờ xác nhận') activeBadge.className = 'bg-red-50 text-red-600 px-1.5 py-0.5 rounded text-[10px] font-mono font-bold';
            else if(status === 'Thành công') activeBadge.className = 'bg-emerald-50 text-emerald-600 px-1.5 py-0.5 rounded text-[10px] font-mono font-bold';
            else activeBadge.className = 'bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded text-[10px] font-mono font-bold';
        }

        // Filter rows
        const rows = document.querySelectorAll('tbody tr');
        let count = 0;
        rows.forEach(row => {
            const rowStatus = row.querySelector('td:nth-child(9) span').textContent.trim();
            if(status === 'Tất cả' || rowStatus === status) {
                row.style.display = '';
                count++;
            } else {
                row.style.display = 'none';
            }
        });
        
        // Cập nhật Pagination count text
        const paginationText = document.querySelector('.bg-white.rounded-b-2xl .flex.items-center.gap-3 span:last-child');
        if(paginationText) {
            paginationText.textContent = `trong tổng số ${count} đơn`;
        }
    }
</script>
