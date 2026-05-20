<?php
// views/pages/admin_promotion.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Khuyến mãi sản phẩm</h2>
            <p class="text-sm text-gray-500 mt-1">Tạo và quản lý các chương trình giảm giá trực tiếp cho vòng ngọc, chuỗi đá và sản phẩm phong thủy.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:export-variant"></span>
                Xuất danh sách
            </button>
            <a href="<?= APP_URL ?>/admin/khuyen-mai/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md shadow-[#6B0D18]/20 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:plus"></span>
                Tạo khuyến mãi
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-500 mb-2">
                <span class="iconify" data-icon="mdi:sale"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Tổng chương trình</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['tong_chuong_trinh']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-emerald-600 mb-2">
                <span class="iconify" data-icon="mdi:play-circle-outline"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Đang diễn ra</span>
            </div>
            <div class="text-2xl font-bold text-emerald-600"><?= number_format($thong_ke['dang_dien_ra']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-blue-500 mb-2">
                <span class="iconify" data-icon="mdi:clock-start"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Sắp bắt đầu</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['sap_bat_dau']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-amber-500 mb-2">
                <span class="iconify" data-icon="mdi:clock-alert-outline"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Sắp kết thúc</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['sap_ket_thuc']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-purple-600 mb-2">
                <span class="iconify" data-icon="mdi:percent-circle-outline"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Sản phẩm giảm giá</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['san_pham_giam_gia']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-[#6B0D18] mb-2">
                <span class="iconify" data-icon="mdi:currency-usd"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Doanh thu K.Mãi</span>
            </div>
            <div class="text-lg font-bold text-[#6B0D18] truncate" title="<?= number_format($thong_ke['doanh_thu_km'], 0, ',', '.') ?>đ"><?= number_format($thong_ke['doanh_thu_km'], 0, ',', '.') ?>đ</div>
        </div>
    </div>

    <!-- Tabs & Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        
        <!-- Tabs -->
        <div class="flex space-x-1 border-b border-gray-100 overflow-x-auto hide-scrollbar" id="promo-tabs">
            <button class="tab-btn px-4 py-2 border-b-2 border-[#6B0D18] text-[#6B0D18] font-medium text-sm whitespace-nowrap" onclick="switchPromoTab(this)">Tất cả (24)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchPromoTab(this)">Đang diễn ra (8)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchPromoTab(this)">Sắp bắt đầu (3)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchPromoTab(this)">Sắp kết thúc (4)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchPromoTab(this)">Đã kết thúc (9)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchPromoTab(this)">Đã tắt (0)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchPromoTab(this)">Flash Sale (2)</button>
        </div>

        <!-- Search & Filters -->
        <div class="flex flex-col lg:flex-row gap-3">
            <div class="relative flex-1">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm theo tên chương trình, mã, tên sản phẩm..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
            </div>
            
            <div class="flex flex-wrap gap-2">
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Loại khuyến mãi</option>
                    <option value="percent">Giảm phần trăm</option>
                    <option value="fixed">Giảm số tiền</option>
                    <option value="flash">Flash Sale</option>
                    <option value="clearance">Xả kho</option>
                </select>

                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Danh mục áp dụng</option>
                    <option value="1">Vòng tay phong thủy</option>
                    <option value="2">Chuỗi ngọc</option>
                    <option value="3">Vòng đá tự nhiên</option>
                </select>
                
                <button class="px-3 py-2 bg-gray-50 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:filter-variant"></span>
                    Lọc thêm
                </button>
            </div>
        </div>
        
        <!-- Active Filter Chips -->
        <div class="flex flex-wrap gap-2 pt-2">
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-red-50 text-[#6B0D18] text-xs font-medium">
                Đang diễn ra
                <button class="hover:text-red-900"><span class="iconify" data-icon="mdi:close"></span></button>
            </span>
            <button class="text-xs text-gray-500 hover:text-[#6B0D18] underline font-medium">Xóa bộ lọc</button>
        </div>
    </div>

    <!-- Action Bar & Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-3 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
            <span class="text-sm text-gray-500 px-2 border-r border-gray-300">Đã chọn: <strong class="text-gray-800" id="selected-count">0</strong></span>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-emerald-600 rounded-md hover:bg-emerald-50 hover:border-emerald-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Bật</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-amber-600 rounded-md hover:bg-amber-50 hover:border-amber-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Tắt</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Xóa</button>
        </div>

        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-[11px] font-bold sticky top-0 z-10 tracking-wider">
                    <tr>
                        <th class="px-4 py-3 w-10">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </th>
                        <th class="px-4 py-3">Tên & Mã CT</th>
                        <th class="px-4 py-3">Loại</th>
                        <th class="px-4 py-3">Sản phẩm áp dụng</th>
                        <th class="px-4 py-3">Giá trị giảm</th>
                        <th class="px-4 py-3">Thời gian</th>
                        <th class="px-4 py-3">Đã bán / Số lượng</th>
                        <th class="px-4 py-3">Trạng thái</th>
                        <th class="px-4 py-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($danh_sach as $km): ?>
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1 w-[200px] whitespace-normal">
                                <div class="font-bold text-gray-800 line-clamp-2"><?= $km['ten_chuong_trinh'] ?></div>
                                <div class="text-[11px] text-gray-500 font-mono"><?= $km['ma_km'] ?></div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <?php
                                $loai_bg = 'bg-gray-100 text-gray-600';
                                if ($km['loai_km'] === 'Flash Sale') $loai_bg = 'bg-red-50 text-red-600 border border-red-100 font-bold';
                                if ($km['loai_km'] === 'Giảm số tiền') $loai_bg = 'bg-amber-50 text-amber-700';
                                if ($km['loai_km'] === 'Xả kho') $loai_bg = 'bg-slate-100 text-slate-600';
                            ?>
                            <span class="inline-flex px-2 py-0.5 rounded text-[11px] <?= $loai_bg ?>"><?= $km['loai_km'] ?></span>
                        </td>
                        <td class="px-4 py-4 align-top w-[250px]">
                            <?php if (isset($km['san_pham']['nhieu_sp'])): ?>
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center shrink-0 border border-gray-200">
                                        <span class="iconify text-gray-400 text-xl" data-icon="mdi:layers-triple-outline"></span>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-800"><?= $km['san_pham']['so_luong'] ?> sản phẩm</span>
                                        <span class="text-[11px] text-gray-500 truncate" title="<?= $km['san_pham']['loai'] ?>"><?= $km['san_pham']['loai'] ?></span>
                                        <a href="#" class="text-[11px] text-blue-600 hover:underline mt-0.5">Xem danh sách</a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="flex items-center gap-2">
                                    <img src="<?= $km['san_pham']['hinh_anh'] ?>" alt="" class="w-10 h-10 rounded-lg object-cover border border-gray-200 shrink-0">
                                    <div class="flex flex-col max-w-[180px] whitespace-normal">
                                        <span class="font-medium text-gray-800 line-clamp-2 text-[13px] leading-tight"><?= $km['san_pham']['ten_sp'] ?></span>
                                        <span class="text-[10px] text-gray-500 font-mono mt-0.5"><?= $km['san_pham']['ma_sp'] ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-0.5">
                                <?php if ($km['muc_giam']['kieu'] === 'phan_tram'): ?>
                                    <span class="inline-flex px-1.5 py-0.5 rounded text-[11px] font-bold bg-red-100 text-[#6B0D18] w-max mb-1"><?= $km['muc_giam']['gia_tri'] ?></span>
                                <?php else: ?>
                                    <span class="font-bold text-[#6B0D18] text-sm mb-1"><?= $km['muc_giam']['gia_tri'] ?></span>
                                <?php endif; ?>
                                
                                <?php if (isset($km['muc_giam']['gia_goc'])): ?>
                                    <div class="flex items-center gap-1.5 text-[12px]">
                                        <span class="text-gray-400 line-through"><?= $km['muc_giam']['gia_goc'] ?></span>
                                        <span class="iconify text-gray-300 text-[10px]" data-icon="mdi:arrow-right"></span>
                                        <span class="font-bold text-[#6B0D18]"><?= $km['muc_giam']['gia_sale'] ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1 text-[12px]">
                                <div class="text-gray-600 whitespace-nowrap"><?= $km['thoi_gian']['chi_tiet'] ?></div>
                                <div class="<?= $km['thoi_gian']['class'] ?> font-medium text-[11px]"><?= $km['thoi_gian']['trang_thai'] ?></div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <?php
                                $tong = $km['so_luong']['tong'];
                                $da_ban = $km['so_luong']['da_ban'];
                                $percent = $tong > 0 ? min(100, round(($da_ban / $tong) * 100)) : 0;
                            ?>
                            <div class="flex flex-col gap-1.5 w-32">
                                <div class="text-[13px] font-medium text-gray-800">
                                    <?= number_format($da_ban) ?> <span class="text-gray-400 text-[11px] font-normal">/ <?= $tong === -1 ? '∞' : number_format($tong) ?></span>
                                </div>
                                <?php if ($tong !== -1): ?>
                                    <div class="w-full bg-gray-100 rounded-full h-1.5">
                                        <div class="bg-<?= $percent > 80 ? 'red' : ($percent > 50 ? 'amber' : '#6B0D18') ?>-500 h-1.5 rounded-full" style="width: <?= $percent ?>%; background-color: <?= $percent > 80 ? '#ef4444' : ($percent > 50 ? '#f59e0b' : '#6B0D18') ?>;"></div>
                                    </div>
                                    <?php if ($percent > 80): ?>
                                        <div class="text-[10px] text-red-500 font-medium">Gần hết</div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="text-[10px] text-gray-400 border border-gray-200 px-1.5 py-0.5 rounded bg-gray-50 w-max">Không giới hạn</span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <?php
                                $status_classes = 'bg-emerald-50 text-emerald-700 border border-emerald-200';
                                if ($km['trang_thai'] === 'Sắp bắt đầu') $status_classes = 'bg-blue-50 text-blue-700 border border-blue-200';
                                if ($km['trang_thai'] === 'Đã kết thúc' || $km['trang_thai'] === 'Đã tắt') $status_classes = 'bg-gray-100 text-gray-600 border border-gray-200';
                                if ($km['trang_thai'] === 'Hết sản phẩm sale') $status_classes = 'bg-red-50 text-red-700 border border-red-200';
                            ?>
                            <span class="inline-flex px-2 py-1 rounded-md text-[11px] font-bold <?= $status_classes ?> status-badge uppercase tracking-wider">
                                <?= $km['trang_thai'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <a href="<?= APP_URL ?>/admin/khuyen-mai/sua" class="p-1.5 text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 rounded transition-colors" title="Sửa">
                                    <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                </a>
                                <div class="relative inline-block text-left menu-dropdown-container">
                                    <button class="p-1.5 text-gray-500 hover:bg-gray-100 rounded transition-colors" onclick="togglePromoDropdown(this)">
                                        <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    <div class="absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg border border-gray-100 hidden z-20 dropdown-menu text-left">
                                        <div class="py-1">
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="viewPromoDetails('<?= $km['ma_km'] ?>')"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết</a>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="duplicatePromo('<?= $km['ma_km'] ?>', this)"><span class="iconify text-gray-400" data-icon="mdi:content-copy"></span> Nhân bản</a>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="showPromoToast('Đang mở báo cáo hiệu quả...')"><span class="iconify text-gray-400" data-icon="mdi:chart-line"></span> Xem hiệu quả</a>
                                            <hr class="my-1 border-gray-100">
                                            <?php if ($km['trang_thai'] !== 'Đã kết thúc' && $km['trang_thai'] !== 'Đã tắt'): ?>
                                                <a href="#" class="btn-pause flex items-center gap-2 px-4 py-2 text-sm text-amber-600 hover:bg-amber-50" onclick="pausePromo('<?= $km['ma_km'] ?>', this)"><span class="iconify" data-icon="mdi:pause-circle-outline"></span> Tạm tắt</a>
                                            <?php endif; ?>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50" onclick="confirmDeletePromo('<?= $km['ma_km'] ?>', this, <?= $km['so_luong']['da_ban'] ?>)"><span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa</a>
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

        <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-white">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-800">1</span> - <span class="font-medium text-gray-800">3</span> trong <span class="font-medium text-gray-800">24</span> chương trình
            </div>
            <div class="flex items-center gap-1">
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-sm font-medium shadow-sm">1</button>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">2</button>
                <span class="px-2 text-gray-400">...</span>
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
            </div>
        </div>
    </div>
</div>

<!-- MODALS -->

<!-- Delete Modal -->
<div id="deletePromoModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[420px] max-w-[90%] transform scale-95 transition-transform duration-300 p-6 flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-red-100 text-red-600 flex items-center justify-center mb-4">
            <span class="iconify text-3xl" data-icon="mdi:delete-alert-outline"></span>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Xác nhận xóa chương trình</h3>
        <p class="text-gray-600 text-sm mb-2">Bạn có chắc muốn xóa chương trình <strong class="text-gray-900" id="del-promo-code">CODE</strong>?</p>
        
        <p class="text-amber-700 text-[13px] bg-amber-50 p-3 rounded-lg border border-amber-200 hidden w-full text-left" id="promo-delete-warning">
            <span class="iconify inline-block text-amber-500 mr-1" data-icon="mdi:alert"></span>
            Chương trình này <strong>đã phát sinh đơn hàng</strong>. Bạn nên <strong class="text-amber-800">Tắt chương trình</strong> thay vì xóa để giữ dữ liệu báo cáo chính xác.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full mt-6">
            <button onclick="closeDeletePromoModal()" class="flex-1 px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy</button>
            <button id="btn-pause-instead" class="hidden flex-1 px-4 py-2.5 bg-amber-50 border border-amber-200 text-amber-700 rounded-lg hover:bg-amber-100 transition-colors font-medium text-sm" onclick="pauseInstead()">Tắt thay thế</button>
            <button onclick="executeDeletePromo()" class="flex-1 px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium text-sm shadow-md shadow-red-600/20">Xóa luôn</button>
        </div>
    </div>
</div>

<!-- Details Drawer -->
<div id="detailsPromoDrawer" class="fixed inset-0 z-[60] hidden">
    <div class="absolute inset-0 bg-black/50 opacity-0 transition-opacity duration-300" onclick="closePromoDetails()"></div>
    <div class="absolute right-0 top-0 bottom-0 w-[450px] max-w-full bg-white shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/80">
            <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:information-outline"></span> Chi tiết chương trình
            </h3>
            <button onclick="closePromoDetails()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        
        <div class="p-6 overflow-y-auto flex-1 space-y-6">
            <div>
                <h4 class="text-xl font-bold text-gray-800 mb-1" id="det-name">Flash Sale Vòng Ngọc</h4>
                <div class="flex items-center gap-2">
                    <span class="text-sm font-mono text-gray-500 bg-gray-100 px-2 py-0.5 rounded" id="det-code">FLASH-T5</span>
                    <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 uppercase tracking-wider" id="det-status">Đang diễn ra</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Loại khuyến mãi</div>
                    <div class="font-bold text-gray-800" id="det-type">Flash Sale</div>
                </div>
                <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Thời gian</div>
                    <div class="font-bold text-gray-800 text-sm" id="det-time">01/05 - 31/05/2026</div>
                </div>
            </div>

            <div>
                <div class="text-sm font-bold text-gray-800 mb-3 border-b border-gray-100 pb-2">Hiệu quả chương trình</div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Đã bán</span>
                        <span class="font-bold text-gray-800">45 / 100 <span class="text-xs font-normal text-gray-500">sp</span></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Doanh thu mang lại</span>
                        <span class="font-bold text-[#6B0D18]">30.600.000đ</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Tổng tiền đã giảm</span>
                        <span class="font-bold text-amber-600">7.650.000đ</span>
                    </div>
                </div>
            </div>
            
            <div>
                <div class="text-sm font-bold text-gray-800 mb-3 border-b border-gray-100 pb-2">Sản phẩm áp dụng (1)</div>
                <div class="flex items-center gap-3 p-3 border border-gray-100 rounded-lg">
                    <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg" class="w-12 h-12 rounded object-cover">
                    <div class="flex-1">
                        <div class="font-medium text-gray-800 text-sm line-clamp-1">Vòng Ngọc Bích Tài Lộc</div>
                        <div class="text-xs text-gray-500 mt-1">850.000đ <span class="iconify inline text-[10px]" data-icon="mdi:arrow-right"></span> <strong class="text-[#6B0D18]">680.000đ</strong></div>
                    </div>
                </div>
            </div>
            
            <div class="text-xs text-gray-400 mt-4">
                Người tạo: Hải Admin - 01/05/2026 09:00
            </div>
        </div>
        
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex gap-3">
            <a href="<?= APP_URL ?>/admin/khuyen-mai/sua" class="flex-1 text-center px-4 py-2.5 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 transition-colors font-medium text-sm">Chỉnh sửa</a>
            <button class="flex-1 px-4 py-2.5 bg-gray-100 border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium text-sm">Xem chi tiết B/C</button>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="promoToast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]">
    <div class="text-emerald-500 mt-0.5"><span class="iconify text-xl" data-icon="mdi:check-circle"></span></div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="promo-toast-msg">Thao tác thành công.</p>
    </div>
    <button onclick="hidePromoToast()" class="text-gray-400 hover:text-gray-600 ml-4"><span class="iconify" data-icon="mdi:close"></span></button>
</div>

<script>
    // Tab switching with visual filtering
    function switchPromoTab(btn) {
        document.querySelectorAll('#promo-tabs .tab-btn').forEach(tab => {
            tab.classList.remove('border-[#6B0D18]', 'text-[#6B0D18]');
            tab.classList.add('border-transparent', 'text-gray-500');
        });
        btn.classList.remove('border-transparent', 'text-gray-500');
        btn.classList.add('border-[#6B0D18]', 'text-[#6B0D18]');
        
        const tabName = btn.textContent.split('(')[0].trim().toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        let count = 0;
        
        rows.forEach(row => {
            const statusEl = row.querySelector('.status-badge');
            const typeEl = row.querySelector('td:nth-child(3) span');
            if (!statusEl) return;
            
            const statusText = statusEl.textContent.trim().toLowerCase();
            const typeText = typeEl ? typeEl.textContent.trim().toLowerCase() : '';
            
            if (tabName === 'tất cả' || statusText.includes(tabName) || (tabName === 'flash sale' && typeText.includes('flash sale'))) {
                row.style.display = '';
                count++;
            } else {
                row.style.display = 'none';
            }
        });
        
        const pagText = document.querySelector('.p-4.border-t .text-gray-500');
        if(pagText) pagText.innerHTML = `Hiển thị <span class="font-medium text-gray-800">${count>0?1:0}</span> - <span class="font-medium text-gray-800">${count}</span> trong <span class="font-medium text-gray-800">${count}</span> chương trình`;
    }

    // Dropdown management
    function togglePromoDropdown(btn) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if(menu !== btn.nextElementSibling) menu.classList.add('hidden');
        });
        btn.nextElementSibling.classList.toggle('hidden');
    }
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.menu-dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        }
    });

    // Pause Action
    let rowToPause = null;
    function pausePromo(code, btn) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        const row = btn.closest('tr');
        executePause(row, code);
    }
    
    function executePause(row, code) {
        const badge = row.querySelector('.status-badge');
        if(badge) {
            badge.className = "inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-gray-100 text-gray-600 border border-gray-200 status-badge uppercase tracking-wider";
            badge.textContent = "Đã tắt";
        }
        const btnPause = row.querySelector('.btn-pause');
        if(btnPause) btnPause.classList.add('hidden');
        
        showPromoToast("Đã tắt chương trình " + code);
    }

    // Duplicate Action
    function duplicatePromo(code, btn) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        const row = btn.closest('tr');
        showPromoToast("Đang nhân bản...");
        setTimeout(() => {
            const newRow = row.cloneNode(true);
            const codeEl = newRow.querySelector('.font-mono');
            if(codeEl) codeEl.textContent = code + '_COPY';
            
            const badge = newRow.querySelector('.status-badge');
            if(badge) {
                badge.className = "inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-gray-100 text-gray-600 border border-gray-200 status-badge uppercase tracking-wider";
                badge.textContent = "Bản nháp";
            }
            
            row.parentNode.insertBefore(newRow, row);
            newRow.classList.add('bg-amber-50/50');
            setTimeout(() => newRow.classList.remove('bg-amber-50/50'), 2000);
            showPromoToast("Đã tạo bản sao " + code + "_COPY");
        }, 500);
    }

    // Delete Modal
    const delModal = document.getElementById('deletePromoModal');
    let rowToDelete = null;
    function confirmDeletePromo(code, btn, uses) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        document.getElementById('del-promo-code').textContent = code;
        rowToDelete = btn.closest('tr');
        
        const warning = document.getElementById('promo-delete-warning');
        const btnPause = document.getElementById('btn-pause-instead');
        if(uses > 0) {
            warning.classList.remove('hidden');
            btnPause.classList.remove('hidden');
        } else {
            warning.classList.add('hidden');
            btnPause.classList.add('hidden');
        }
        
        delModal.classList.remove('hidden');
        setTimeout(() => {
            delModal.classList.remove('opacity-0');
            delModal.children[0].classList.remove('scale-95');
        }, 10);
    }
    
    function closeDeletePromoModal() {
        delModal.classList.add('opacity-0');
        delModal.children[0].classList.add('scale-95');
        setTimeout(() => delModal.classList.add('hidden'), 300);
    }
    
    function executeDeletePromo() {
        closeDeletePromoModal();
        if(rowToDelete) {
            rowToDelete.remove();
            rowToDelete = null;
        }
        showPromoToast("Đã xóa vĩnh viễn chương trình");
    }
    
    function pauseInstead() {
        closeDeletePromoModal();
        if(rowToDelete) {
            const code = document.getElementById('del-promo-code').textContent;
            executePause(rowToDelete, code);
            rowToDelete = null;
        }
    }

    // Details Drawer
    const drawer = document.getElementById('detailsPromoDrawer');
    function viewPromoDetails(code) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        document.getElementById('det-code').textContent = code;
        
        drawer.classList.remove('hidden');
        setTimeout(() => {
            drawer.children[0].classList.remove('opacity-0'); // overlay
            drawer.children[1].classList.remove('translate-x-full'); // panel
        }, 10);
    }
    
    function closePromoDetails() {
        drawer.children[0].classList.add('opacity-0');
        drawer.children[1].classList.add('translate-x-full');
        setTimeout(() => drawer.classList.add('hidden'), 300);
    }

    // Toast
    let promoToastTimeout;
    function showPromoToast(msg) {
        const toast = document.getElementById('promoToast');
        document.getElementById('promo-toast-msg').textContent = msg;
        toast.classList.remove('translate-y-20', 'opacity-0');
        clearTimeout(promoToastTimeout);
        promoToastTimeout = setTimeout(() => hidePromoToast(), 3000);
    }
    function hidePromoToast() {
        document.getElementById('promoToast').classList.add('translate-y-20', 'opacity-0');
    }
</script>
