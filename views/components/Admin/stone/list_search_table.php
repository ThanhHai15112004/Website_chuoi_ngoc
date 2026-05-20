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

