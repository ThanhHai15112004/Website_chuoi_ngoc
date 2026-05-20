<?php
// views/pages/admin_stone.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Quản lý Loại Đá / Ngọc</h2>
            <p class="text-sm text-gray-500 mt-1">Tạo và quản lý các chất liệu đá, ngọc dùng cho sản phẩm phong thủy.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:export-variant"></span>
                Xuất danh sách
            </button>
            <a href="<?= APP_URL ?>/admin/loai-da/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md shadow-[#6B0D18]/20 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:plus"></span>
                Thêm loại đá / ngọc
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-500 mb-2">
                <span class="iconify" data-icon="mdi:diamond-stone"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Tổng loại đá</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['tong_loai']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-emerald-600 mb-2">
                <span class="iconify" data-icon="mdi:eye-outline"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Đang hiển thị</span>
            </div>
            <div class="text-2xl font-bold text-emerald-600"><?= number_format($thong_ke['dang_hien_thi']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-400 mb-2">
                <span class="iconify" data-icon="mdi:eye-off-outline"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Đang ẩn</span>
            </div>
            <div class="text-2xl font-bold text-gray-500"><?= number_format($thong_ke['dang_an']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-blue-500 mb-2">
                <span class="iconify" data-icon="mdi:package-variant-closed"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Có sản phẩm</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['co_san_pham']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-amber-500 mb-2">
                <span class="iconify" data-icon="mdi:package-variant"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Chưa có SP</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['chua_co_sp']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-[#6B0D18] mb-2">
                <span class="iconify text-[#D4AF37]" data-icon="mdi:crown"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Dùng nhiều nhất</span>
            </div>
            <div class="text-sm font-bold text-gray-800 truncate" title="<?= $thong_ke['dung_nhieu_nhat'] ?>"><?= $thong_ke['dung_nhieu_nhat'] ?></div>
        </div>
    </div>

    <!-- Search & Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        <div class="flex flex-col lg:flex-row gap-3">
            <div class="relative flex-1">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm theo tên đá, tên tiếng Anh, màu sắc, mệnh..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
            </div>
            
            <div class="flex flex-wrap gap-2">
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Trạng thái</option>
                    <option value="show">Đang hiển thị</option>
                    <option value="hide">Đang ẩn</option>
                </select>

                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Nhóm chất liệu</option>
                    <option value="ngoc">Ngọc</option>
                    <option value="tu_nhien">Đá tự nhiên</option>
                    <option value="cao_cap">Đá cao cấp</option>
                </select>

                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Mệnh phù hợp</option>
                    <option value="kim">Kim</option>
                    <option value="moc">Mộc</option>
                    <option value="thuy">Thủy</option>
                    <option value="hoa">Hỏa</option>
                    <option value="tho">Thổ</option>
                </select>
                
                <button class="px-3 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm flex items-center gap-1">
                    Lọc
                </button>
            </div>
        </div>
        
        <!-- Active Filter Chips -->
        <div class="flex flex-wrap gap-2 pt-2">
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-red-50 text-[#6B0D18] text-xs font-medium border border-red-100">
                Mệnh Mộc
                <button class="hover:text-red-900"><span class="iconify" data-icon="mdi:close"></span></button>
            </span>
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-red-50 text-[#6B0D18] text-xs font-medium border border-red-100">
                Đang hiển thị
                <button class="hover:text-red-900"><span class="iconify" data-icon="mdi:close"></span></button>
            </span>
            <button class="text-xs text-gray-500 hover:text-[#6B0D18] underline font-medium">Xóa bộ lọc</button>
        </div>
    </div>

    <!-- Action Bar & Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-3 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
            <span class="text-sm text-gray-500 px-2 border-r border-gray-300">Đã chọn: <strong class="text-gray-800" id="selected-count">0</strong></span>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-emerald-600 rounded-md hover:bg-emerald-50 hover:border-emerald-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Hiện</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-100 transition-colors text-sm font-medium disabled:opacity-50" disabled>Ẩn</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Xóa</button>
        </div>

        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-[11px] font-bold sticky top-0 z-10 tracking-wider">
                    <tr>
                        <th class="px-4 py-3 w-10">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </th>
                        <th class="px-4 py-3">Loại đá / ngọc</th>
                        <th class="px-4 py-3">Nhóm & Màu sắc</th>
                        <th class="px-4 py-3">Phong thủy</th>
                        <th class="px-4 py-3 text-center">Số sản phẩm</th>
                        <th class="px-4 py-3">Trạng thái</th>
                        <th class="px-4 py-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($danh_sach as $da): ?>
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top w-[280px]">
                            <div class="flex items-start gap-3">
                                <?php if ($da['hinh_anh']): ?>
                                    <img src="<?= $da['hinh_anh'] ?>" class="w-14 h-14 rounded-lg object-cover border border-gray-200 shrink-0">
                                <?php else: ?>
                                    <div class="w-14 h-14 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center shrink-0">
                                        <span class="iconify text-gray-400 text-2xl" data-icon="mdi:diamond-stone"></span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="flex flex-col whitespace-normal">
                                    <div class="font-bold text-gray-800 text-[14px] hover:text-[#6B0D18] cursor-pointer" onclick="viewStoneDetails('<?= $da['ma_da'] ?>')"><?= $da['ten_da'] ?></div>
                                    <div class="text-[11px] text-gray-400 font-mono mt-0.5"><?= $da['ma_da'] ?></div>
                                    <?php if ($da['ten_tieng_anh']): ?>
                                        <div class="text-[11px] text-gray-500 mt-0.5">AKA: <?= $da['ten_tieng_anh'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-2">
                                <div>
                                    <span class="inline-flex px-2 py-0.5 rounded text-[11px] bg-gray-100 text-gray-600 border border-gray-200"><?= $da['nhom'] ?></span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-3 h-3 rounded-full border border-gray-300 shadow-sm" style="background-color: <?= $da['mau_sac']['hex'] ?>"></span>
                                    <span class="text-xs text-gray-600"><?= $da['mau_sac']['ten'] ?></span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top w-[250px]">
                            <div class="flex flex-col gap-2 whitespace-normal">
                                <div class="flex flex-wrap gap-1">
                                    <?php foreach ($da['menh'] as $menh): ?>
                                        <span class="inline-flex px-2 py-0.5 rounded-full text-[10px] font-bold bg-red-50 text-[#6B0D18] border border-red-100"><?= $menh ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="flex flex-wrap gap-1">
                                    <?php $count = 0; foreach ($da['nhu_cau'] as $nhu_cau): $count++; ?>
                                        <?php if ($count <= 2): ?>
                                            <span class="inline-flex px-1.5 py-0.5 rounded text-[10px] bg-amber-50 text-amber-700 border border-amber-100"><?= $nhu_cau ?></span>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php if (count($da['nhu_cau']) > 2): ?>
                                        <span class="inline-flex px-1.5 py-0.5 rounded text-[10px] bg-gray-50 text-gray-500 border border-gray-200">+<?= count($da['nhu_cau']) - 2 ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top text-center">
                            <?php if ($da['so_san_pham'] > 0): ?>
                                <a href="#" class="inline-flex flex-col items-center hover:bg-gray-50 p-1.5 rounded transition-colors group/link">
                                    <span class="font-bold text-gray-800 text-[14px] group-hover/link:text-[#6B0D18]"><?= $da['so_san_pham'] ?></span>
                                    <span class="text-[10px] text-gray-400 group-hover/link:text-[#6B0D18]">Sản phẩm</span>
                                </a>
                            <?php else: ?>
                                <span class="inline-flex px-2 py-1 rounded text-[10px] font-medium bg-gray-100 text-gray-500 border border-gray-200 mt-1">Chưa dùng</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <?php if ($da['trang_thai'] === 'Đang hiển thị'): ?>
                                <span class="inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 status-badge uppercase tracking-wider">
                                    Đang hiển thị
                                </span>
                            <?php else: ?>
                                <span class="inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-gray-100 text-gray-500 border border-gray-200 status-badge uppercase tracking-wider">
                                    Đang ẩn
                                </span>
                            <?php endif; ?>
                            <div class="text-[10px] text-gray-400 mt-2">Cập nhật: <?= explode(' ', $da['ngay_cap_nhat'])[0] ?></div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <a href="<?= APP_URL ?>/admin/loai-da/sua" class="p-1.5 text-[#6B0D18] hover:bg-red-50 rounded transition-colors" title="Sửa">
                                    <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                </a>
                                <div class="relative inline-block text-left menu-dropdown-container">
                                    <button class="p-1.5 text-gray-500 hover:bg-gray-100 rounded transition-colors" onclick="toggleStoneDropdown(this)">
                                        <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    <div class="absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg border border-gray-100 hidden z-20 dropdown-menu text-left">
                                        <div class="py-1">
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="viewStoneDetails('<?= $da['ma_da'] ?>')"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết</a>
                                            <?php if ($da['so_san_pham'] > 0): ?>
                                                <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"><span class="iconify text-gray-400" data-icon="mdi:package-variant"></span> Xem sản phẩm</a>
                                            <?php endif; ?>
                                            <hr class="my-1 border-gray-100">
                                            <?php if ($da['trang_thai'] === 'Đang hiển thị'): ?>
                                                <a href="#" class="btn-toggle flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="toggleStoneStatus('<?= $da['ma_da'] ?>', this, 'hide')"><span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn loại đá</a>
                                            <?php else: ?>
                                                <a href="#" class="btn-toggle flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50" onclick="toggleStoneStatus('<?= $da['ma_da'] ?>', this, 'show')"><span class="iconify" data-icon="mdi:eye-outline"></span> Hiện loại đá</a>
                                            <?php endif; ?>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50" onclick="confirmDeleteStone('<?= $da['ma_da'] ?>', '<?= $da['ten_da'] ?>', this, <?= $da['so_san_pham'] ?>)"><span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa</a>
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
                Hiển thị <span class="font-medium text-gray-800">1</span> - <span class="font-medium text-gray-800">4</span> trong <span class="font-medium text-gray-800">32</span> loại đá / ngọc
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
<div id="deleteStoneModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[450px] max-w-[90%] transform scale-95 transition-transform duration-300 p-6 flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-red-100 text-red-600 flex items-center justify-center mb-4">
            <span class="iconify text-3xl" data-icon="mdi:delete-alert-outline"></span>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Xác nhận xóa loại đá / ngọc</h3>
        <p class="text-gray-600 text-sm mb-2">Bạn có chắc muốn xóa <strong class="text-gray-900 text-lg" id="del-stone-name">Ngọc bích</strong> khỏi hệ thống?</p>
        
        <div class="text-amber-700 text-[13px] bg-amber-50 p-4 rounded-xl border border-amber-200 hidden w-full text-left mt-2 flex items-start gap-3" id="stone-delete-warning">
            <span class="iconify text-amber-500 text-2xl shrink-0" data-icon="mdi:alert"></span>
            <div>
                Loại đá này đang được sử dụng trong <strong class="text-amber-900" id="del-stone-count">0</strong> sản phẩm. 
                Bạn nên <strong class="text-amber-900">Ẩn loại đá</strong> thay vì xóa để tránh lỗi hiển thị bộ lọc ngoài trang người dùng.
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full mt-6">
            <button onclick="closeDeleteStoneModal()" class="flex-1 px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy bỏ</button>
            <button id="btn-hide-instead" class="hidden flex-1 px-4 py-2.5 bg-gray-100 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium text-sm" onclick="hideInstead()">Ẩn thay thế</button>
            <button id="btn-confirm-delete" onclick="executeDeleteStone()" class="flex-1 px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium text-sm shadow-md shadow-red-600/20">Xóa vĩnh viễn</button>
        </div>
    </div>
</div>

<!-- Details Drawer -->
<div id="detailsStoneDrawer" class="fixed inset-0 z-[60] hidden">
    <div class="absolute inset-0 bg-black/50 opacity-0 transition-opacity duration-300" onclick="closeStoneDetails()"></div>
    <div class="absolute right-0 top-0 bottom-0 w-[450px] max-w-full bg-white shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/80">
            <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:diamond-stone"></span> Chi tiết Đá / Ngọc
            </h3>
            <button onclick="closeStoneDetails()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        
        <div class="p-6 overflow-y-auto flex-1 space-y-6">
            <div class="flex items-center gap-4">
                <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg" class="w-20 h-20 rounded-xl object-cover border border-gray-200 shadow-sm shrink-0">
                <div>
                    <h4 class="text-2xl font-bold text-gray-800 mb-1" id="det-name">Ngọc bích</h4>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-sm text-gray-500 font-medium">Jade</span>
                        <span class="text-gray-300">|</span>
                        <span class="text-sm font-mono text-gray-400" id="det-code">STONE-JADE</span>
                    </div>
                    <span class="inline-flex px-2 py-0.5 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 uppercase tracking-wider" id="det-status">Đang hiển thị</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 flex flex-col">
                    <span class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Nhóm chất liệu</span>
                    <span class="font-bold text-gray-800">Ngọc</span>
                </div>
                <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 flex flex-col">
                    <span class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Màu sắc</span>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="w-3.5 h-3.5 rounded-full border border-gray-300 shadow-sm" style="background-color: #10B981"></span>
                        <span class="font-bold text-gray-800 text-sm">Xanh ngọc</span>
                    </div>
                </div>
            </div>

            <div>
                <div class="text-sm font-bold text-gray-800 mb-3 border-b border-gray-100 pb-2">Phong thủy & Ý nghĩa</div>
                <div class="space-y-4">
                    <div>
                        <span class="text-xs text-gray-500 block mb-2">Mệnh phù hợp:</span>
                        <div class="flex gap-2">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-red-50 text-[#6B0D18] border border-red-100">Mộc</span>
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-red-50 text-[#6B0D18] border border-red-100">Hỏa</span>
                        </div>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 block mb-2">Nhu cầu / Công dụng:</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex px-2 py-1 rounded text-xs bg-amber-50 text-amber-700 border border-amber-100">Bình an</span>
                            <span class="inline-flex px-2 py-1 rounded text-xs bg-amber-50 text-amber-700 border border-amber-100">Tài lộc</span>
                            <span class="inline-flex px-2 py-1 rounded text-xs bg-amber-50 text-amber-700 border border-amber-100">Sức khỏe tinh thần</span>
                        </div>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 block mb-1">Ý nghĩa chi tiết:</span>
                        <p class="text-sm text-gray-700 leading-relaxed bg-gray-50 p-3 rounded-lg border border-gray-100">Ngọc bích thường được xem là biểu tượng của sự bình an, hài hòa và tài lộc. Sắc xanh nhẹ nhàng của ngọc thường được gợi ý cho người mệnh Mộc và Hỏa.</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 block mb-1">Lưu ý sử dụng:</span>
                        <p class="text-sm text-gray-700 leading-relaxed bg-amber-50 p-3 rounded-lg border border-amber-100">Tránh va đập mạnh, hạn chế tiếp xúc hóa chất, nên lau bằng khăn mềm.</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 flex items-center justify-between">
                <div>
                    <span class="text-xs text-blue-600 block mb-0.5">Sản phẩm đang dùng loại đá này</span>
                    <div class="font-bold text-blue-800 text-lg">48 sản phẩm</div>
                </div>
                <button class="p-2 bg-white text-blue-600 rounded-lg shadow-sm hover:bg-blue-600 hover:text-white transition-colors">
                    <span class="iconify text-xl" data-icon="mdi:arrow-right"></span>
                </button>
            </div>
            
            <div class="text-xs text-gray-400 mt-4 text-center">
                Được tạo bởi: Admin - Cập nhật cuối: 18/05/2026 09:30
            </div>
        </div>
        
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex gap-3">
            <a href="<?= APP_URL ?>/admin/loai-da/sua" class="flex-1 text-center px-4 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md">Chỉnh sửa</a>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="stoneToast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]">
    <div class="text-emerald-500 mt-0.5"><span class="iconify text-xl" data-icon="mdi:check-circle"></span></div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="stone-toast-msg">Thao tác thành công.</p>
    </div>
    <button onclick="hideStoneToast()" class="text-gray-400 hover:text-gray-600 ml-4"><span class="iconify" data-icon="mdi:close"></span></button>
</div>

<script>
    // Dropdown management
    function toggleStoneDropdown(btn) {
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

    // Toggle Action
    let currentRow = null;
    function toggleStoneStatus(code, btn, action) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        const row = btn.closest('tr');
        executeToggle(row, action);
    }
    
    function executeToggle(row, action) {
        const badge = row.querySelector('.status-badge');
        const btnToggle = row.querySelector('.btn-toggle');
        
        if (action === 'hide') {
            if(badge) {
                badge.className = "inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-gray-100 text-gray-500 border border-gray-200 status-badge uppercase tracking-wider";
                badge.textContent = "Đang ẩn";
            }
            if(btnToggle) {
                btnToggle.innerHTML = '<span class="iconify" data-icon="mdi:eye-outline"></span> Hiện loại đá';
                btnToggle.className = 'btn-toggle flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50';
                btnToggle.setAttribute('onclick', btnToggle.getAttribute('onclick').replace("'hide'", "'show'"));
            }
            showStoneToast("Đã ẩn loại đá này khỏi website.");
        } else {
            if(badge) {
                badge.className = "inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 status-badge uppercase tracking-wider";
                badge.textContent = "Đang hiển thị";
            }
            if(btnToggle) {
                btnToggle.innerHTML = '<span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn loại đá';
                btnToggle.className = 'btn-toggle flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50';
                btnToggle.setAttribute('onclick', btnToggle.getAttribute('onclick').replace("'show'", "'hide'"));
            }
            showStoneToast("Đã hiển thị loại đá này trên website.");
        }
    }

    // Delete Modal
    const delModal = document.getElementById('deleteStoneModal');
    function confirmDeleteStone(code, name, btn, uses) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        document.getElementById('del-stone-name').textContent = name;
        currentRow = btn.closest('tr');
        
        const warning = document.getElementById('stone-delete-warning');
        const btnHide = document.getElementById('btn-hide-instead');
        const btnConfirm = document.getElementById('btn-confirm-delete');
        
        if(uses > 0) {
            document.getElementById('del-stone-count').textContent = uses;
            warning.classList.remove('hidden');
            btnHide.classList.remove('hidden');
            // Disable delete if there are products
            btnConfirm.classList.replace('bg-red-600', 'bg-red-300');
            btnConfirm.classList.replace('hover:bg-red-700', 'hover:bg-red-300');
            btnConfirm.classList.add('cursor-not-allowed');
            btnConfirm.disabled = true;
        } else {
            warning.classList.add('hidden');
            btnHide.classList.add('hidden');
            // Enable delete
            btnConfirm.classList.replace('bg-red-300', 'bg-red-600');
            btnConfirm.classList.replace('hover:bg-red-300', 'hover:bg-red-700');
            btnConfirm.classList.remove('cursor-not-allowed');
            btnConfirm.disabled = false;
        }
        
        delModal.classList.remove('hidden');
        setTimeout(() => {
            delModal.classList.remove('opacity-0');
            delModal.children[0].classList.remove('scale-95');
        }, 10);
    }
    
    function closeDeleteStoneModal() {
        delModal.classList.add('opacity-0');
        delModal.children[0].classList.add('scale-95');
        setTimeout(() => delModal.classList.add('hidden'), 300);
    }
    
    function executeDeleteStone() {
        closeDeleteStoneModal();
        if(currentRow) {
            currentRow.remove();
            currentRow = null;
        }
        showStoneToast("Đã xóa vĩnh viễn loại đá / ngọc.");
    }
    
    function hideInstead() {
        closeDeleteStoneModal();
        if(currentRow) {
            executeToggle(currentRow, 'hide');
            currentRow = null;
        }
    }

    // Details Drawer
    const drawer = document.getElementById('detailsStoneDrawer');
    function viewStoneDetails(code) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        
        drawer.classList.remove('hidden');
        setTimeout(() => {
            drawer.children[0].classList.remove('opacity-0'); 
            drawer.children[1].classList.remove('translate-x-full'); 
        }, 10);
    }
    
    function closeStoneDetails() {
        drawer.children[0].classList.add('opacity-0');
        drawer.children[1].classList.add('translate-x-full');
        setTimeout(() => drawer.classList.add('hidden'), 300);
    }

    // Toast
    let stoneToastTimeout;
    function showStoneToast(msg) {
        const toast = document.getElementById('stoneToast');
        document.getElementById('stone-toast-msg').textContent = msg;
        toast.classList.remove('translate-y-20', 'opacity-0');
        clearTimeout(stoneToastTimeout);
        stoneToastTimeout = setTimeout(() => hideStoneToast(), 3000);
    }
    function hideStoneToast() {
        document.getElementById('stoneToast').classList.add('translate-y-20', 'opacity-0');
    }
</script>
