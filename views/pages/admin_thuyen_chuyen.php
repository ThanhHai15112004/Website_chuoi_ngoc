<!-- Trang Thuyên Chuyển Kho Admin (V2) -->
<div class="px-6 py-6 pb-20 max-w-[1600px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Tiêu đề & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <div class="flex items-center gap-3">
                <h2 class="text-3xl font-bold text-gray-900 leading-tight">Thuyên chuyển kho</h2>
            </div>
            <p class="text-sm text-gray-500 mt-1">Tạo và theo dõi các phiếu chuyển sản phẩm giữa các kho, chi nhánh hoặc khu vực lưu trữ.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg text-gray-400" data-icon="mdi:refresh"></span> Làm mới
            </button>
            <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg text-gray-500" data-icon="mdi:download"></span> Xuất danh sách
            </button>
            <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho/them" class="flex items-center gap-2 px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20">
                <span class="iconify text-lg" data-icon="mdi:plus"></span> Tạo phiếu chuyển
            </a>
        </div>
    </div>

    <!-- 7 Card Thống Kê Nhanh -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Tổng phiếu chuyển</p>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($stats['tong']) ?> <span class="text-xs font-normal text-gray-400">phiếu</span></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span> Chờ xác nhận
            </p>
            <div class="text-2xl font-bold text-amber-600"><?= number_format($stats['cho_xac_nhan']) ?></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-blue-400"></span> Đang chuyển
            </p>
            <div class="text-2xl font-bold text-blue-600"><?= number_format($stats['dang_chuyen']) ?></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Đã hoàn tất
            </p>
            <div class="text-2xl font-bold text-emerald-600"><?= number_format($stats['hoan_tat']) ?></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-gray-400"></span> Đã hủy
            </p>
            <div class="text-2xl font-bold text-gray-600"><?= number_format($stats['da_huy']) ?></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Sản phẩm đã chuyển</p>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($stats['sp_chuyen']) ?> <span class="text-xs font-normal text-gray-400">món</span></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-red-500"></span> Có lỗi / Thiếu
            </p>
            <div class="text-2xl font-bold text-red-600"><?= number_format($stats['co_loi']) ?></div>
        </div>
    </div>

    <!-- Tabs Trạng thái -->
    <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-2 sidebar-scroll">
        <button class="px-5 py-2 bg-[#6B0D18] text-white rounded-full text-sm font-medium whitespace-nowrap shadow-sm border border-transparent">
            Tất cả (<?= $stats['tong'] ?>)
        </button>
        <button class="px-5 py-2 bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Chờ xác nhận (<?= $stats['cho_xac_nhan'] ?>)
        </button>
        <button class="px-5 py-2 bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Đã duyệt
        </button>
        <button class="px-5 py-2 bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Đang chuyển (<?= $stats['dang_chuyen'] ?>)
        </button>
        <button class="px-5 py-2 bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Chờ nhận hàng
        </button>
        <button class="px-5 py-2 bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Đã hoàn tất (<?= $stats['hoan_tat'] ?>)
        </button>
        <button class="px-5 py-2 bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Đã hủy
        </button>
        <button class="px-5 py-2 bg-red-50 text-red-700 border border-red-200 hover:bg-red-100 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Có lỗi / thiếu hàng (<?= $stats['co_loi'] ?>)
        </button>
    </div>

    <!-- Bảng danh sách -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <!-- Toolbar bộ lọc -->
        <div class="p-4 border-b border-gray-200 bg-white flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="relative w-full md:max-w-md">
                <input type="text" placeholder="Tìm theo mã phiếu, sản phẩm, kho gửi, kho nhận..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-[#6B0D18] text-lg" data-icon="mdi:magnify"></span>
            </div>
            <div class="flex items-center gap-3">
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:filter-menu-outline"></span> Bộ lọc nâng cao
                </button>
            </div>
        </div>

        <!-- Bảng -->
        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-200 text-xs uppercase text-gray-500">
                        <th class="py-3 px-4 font-semibold w-12 text-center">
                            <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                        </th>
                        <th class="py-3 px-4 font-semibold">Mã phiếu</th>
                        <th class="py-3 px-4 font-semibold">Kho gửi <span class="mx-1">→</span> Kho nhận</th>
                        <th class="py-3 px-4 font-semibold">Sản phẩm & SL</th>
                        <th class="py-3 px-4 font-semibold">Người thực hiện</th>
                        <th class="py-3 px-4 font-semibold">Thời gian</th>
                        <th class="py-3 px-4 font-semibold text-center">Trạng thái</th>
                        <th class="py-3 px-4 font-semibold text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($danhSach as $phieu): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="py-3 px-4 text-center align-top">
                                <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                            </td>
                            <td class="py-3 px-4 align-top">
                                <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho/chi-tiet/<?= $phieu['id'] ?>" class="font-bold text-[#6B0D18] hover:underline flex items-center gap-1">
                                    <?= $phieu['id'] ?>
                                </a>
                                <?php if($phieu['gap']): ?>
                                    <span class="inline-block mt-1 px-1.5 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-700">GẤP</span>
                                <?php endif; ?>
                            </td>
                            <td class="py-3 px-4 align-top">
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center gap-1.5">
                                        <span class="iconify text-gray-400" data-icon="mdi:warehouse"></span>
                                        <span class="text-sm font-medium text-gray-600"><?= $phieu['kho_gui'] ?></span>
                                    </div>
                                    <span class="iconify text-[#6B0D18] text-lg" data-icon="mdi:arrow-right"></span>
                                    <div class="flex items-center gap-1.5">
                                        <span class="iconify text-[#6B0D18]" data-icon="mdi:warehouse"></span>
                                        <span class="text-sm font-bold text-gray-900"><?= $phieu['kho_nhan'] ?></span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-4 align-top">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 rounded border border-gray-200 overflow-hidden shrink-0">
                                        <img src="<?= $phieu['san_pham'][0]['hinh_anh'] ?>" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900 truncate max-w-[200px]"><?= $phieu['san_pham'][0]['ten'] ?></div>
                                        <div class="text-xs text-gray-500 mt-0.5"><?= $phieu['san_pham'][0]['sku'] ?> &middot; <?= $phieu['san_pham'][0]['size'] ?></div>
                                        <?php if(count($phieu['san_pham']) > 1): ?>
                                            <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho/chi-tiet/<?= $phieu['id'] ?>" class="text-[11px] font-medium text-[#6B0D18] hover:underline mt-1 block">
                                                +<?= count($phieu['san_pham']) - 1 ?> sản phẩm khác
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mt-2 text-sm">
                                    <span class="font-semibold text-gray-900">SL: <?= $phieu['tong_sl'] ?></span> món
                                    <?php if(isset($phieu['thiếu'])): ?>
                                        <span class="ml-2 text-xs font-bold text-red-600 bg-red-50 px-1.5 py-0.5 rounded">Thiếu <?= $phieu['thiếu'] ?></span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-3 px-4 align-top">
                                <div class="mb-2">
                                    <div class="text-xs text-gray-500">Người tạo:</div>
                                    <div class="text-sm font-medium text-gray-900"><?= $phieu['nguoi_tao'] ?></div>
                                    <div class="text-[11px] text-gray-400"><?= $phieu['vai_tro_tao'] ?></div>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">Người duyệt/Nhận:</div>
                                    <?php if($phieu['nguoi_duyet'] == 'Chưa duyệt'): ?>
                                        <span class="inline-block mt-0.5 px-1.5 py-0.5 rounded text-[10px] font-medium bg-amber-100 text-amber-700">Chờ Admin duyệt</span>
                                    <?php else: ?>
                                        <div class="text-sm font-medium text-gray-900"><?= $phieu['nguoi_duyet'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-3 px-4 align-top">
                                <div class="text-sm text-gray-900 mb-1">
                                    <span class="text-gray-500 text-xs">Tạo:</span><br>
                                    <span class="font-medium"><?= explode(' ', $phieu['ngay_tao'])[0] ?></span>
                                    <span class="text-xs text-gray-500 ml-1"><?= explode(' ', $phieu['ngay_tao'])[1] ?></span>
                                </div>
                                <div class="text-sm text-gray-900">
                                    <span class="text-gray-500 text-xs">Chuyển:</span><br>
                                    <?php if($phieu['ngay_chuyen'] == 'Chưa chuyển'): ?>
                                        <span class="text-xs text-gray-400">Chưa chuyển</span>
                                    <?php else: ?>
                                        <span class="font-medium"><?= explode(' ', $phieu['ngay_chuyen'])[0] ?></span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-3 px-4 align-top text-center">
                                <?php 
                                    $bg = 'bg-gray-100'; $text = 'text-gray-700'; $icon = 'mdi:circle-medium';
                                    if ($phieu['trang_thai'] === 'Chờ xác nhận') { $bg = 'bg-amber-100'; $text = 'text-amber-700'; $icon = 'mdi:clock-outline'; }
                                    elseif ($phieu['trang_thai'] === 'Đã duyệt') { $bg = 'bg-blue-100'; $text = 'text-blue-700'; $icon = 'mdi:check-circle-outline'; }
                                    elseif ($phieu['trang_thai'] === 'Đang chuyển') { $bg = 'bg-cyan-100'; $text = 'text-cyan-700'; $icon = 'mdi:truck-fast-outline'; }
                                    elseif ($phieu['trang_thai'] === 'Chờ nhận hàng') { $bg = 'bg-amber-50'; $text = 'text-amber-600'; $icon = 'mdi:package-down'; }
                                    elseif ($phieu['trang_thai'] === 'Đã hoàn tất') { $bg = 'bg-emerald-100'; $text = 'text-emerald-700'; $icon = 'mdi:check-all'; }
                                    elseif ($phieu['trang_thai'] === 'Đã hủy') { $bg = 'bg-gray-100'; $text = 'text-gray-500'; $icon = 'mdi:close-circle-outline'; }
                                    elseif ($phieu['trang_thai'] === 'Có lỗi / thiếu hàng') { $bg = 'bg-red-100'; $text = 'text-[#6B0D18]'; $icon = 'mdi:alert-circle-outline'; }
                                ?>
                                <span class="inline-flex items-center justify-center gap-1.5 px-2.5 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-wide <?= $bg ?> <?= $text ?>">
                                    <span class="iconify text-sm" data-icon="<?= $icon ?>"></span> <?= $phieu['trang_thai'] ?>
                                </span>
                            </td>
                            <td class="py-3 px-4 align-top text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho/chi-tiet/<?= $phieu['id'] ?>" class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-50 hover:bg-[#6B0D18] text-gray-600 hover:text-white transition-colors" title="Xem chi tiết">
                                        <span class="iconify" data-icon="mdi:eye-outline"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Phân trang -->
        <div class="p-4 border-t border-gray-200 bg-gray-50/50 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-900">1</span> đến <span class="font-medium text-gray-900">4</span> trong số <span class="font-medium text-gray-900"><?= $stats['tong'] ?></span> phiếu
            </div>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed">
                    <span class="iconify" data-icon="mdi:chevron-left"></span>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-medium text-sm shadow-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 text-sm font-medium">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 text-sm font-medium">3</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50">
                    <span class="iconify" data-icon="mdi:chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
</div>
