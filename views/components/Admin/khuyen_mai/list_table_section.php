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
                                <a href="<?= APP_URL ?>/admin/khuyen-mai/sua/<?= $km['id'] ?>" class="p-1.5 text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 rounded transition-colors" title="Sửa">
                                    <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                </a>
                                <div class="relative inline-block text-left menu-dropdown-container">
                                    <button class="p-1.5 text-gray-500 hover:bg-gray-100 rounded transition-colors" onclick="togglePromoDropdown(this)">
                                        <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    <div class="absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg border border-gray-100 hidden z-20 dropdown-menu text-left">
                                        <div class="py-1">
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="viewPromoDetails('<?= $km['id'] ?>')"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết</a>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="duplicatePromo('<?= $km['id'] ?>', '<?= $km['ma_km'] ?>', this)"><span class="iconify text-gray-400" data-icon="mdi:content-copy"></span> Nhân bản</a>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="viewPromoStats('<?= $km['id'] ?>')"><span class="iconify text-gray-400" data-icon="mdi:chart-line"></span> Xem hiệu quả</a>
                                            <hr class="my-1 border-gray-100">
                                            <?php if ($km['trang_thai'] !== 'Đã kết thúc'): ?>
                                                <?php if ($km['trang_thai'] !== 'Đã tắt'): ?>
                                                    <a href="#" class="btn-pause flex items-center gap-2 px-4 py-2 text-sm text-amber-600 hover:bg-amber-50" onclick="togglePromoStatus('<?= $km['id'] ?>', '<?= $km['ma_km'] ?>', 0, this)"><span class="iconify" data-icon="mdi:pause-circle-outline"></span> Tạm tắt</a>
                                                <?php else: ?>
                                                    <a href="#" class="btn-pause flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50" onclick="togglePromoStatus('<?= $km['id'] ?>', '<?= $km['ma_km'] ?>', 1, this)"><span class="iconify" data-icon="mdi:play-circle-outline"></span> Bật lại</a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50" onclick="confirmDeletePromo('<?= $km['id'] ?>', '<?= $km['ma_km'] ?>', this, <?= $km['so_luong']['da_ban'] ?>)"><span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa</a>
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

        <?php
            $p_current = $pagination['current'] ?? 1;
            $total_pages = $pagination['total_pages'] ?? 1;
            $limit = $pagination['limit'] ?? 10;
            $total_records = $pagination['total_records'] ?? 0;
            $start = ($p_current - 1) * $limit + 1;
            $end = min($p_current * $limit, $total_records);
            
            $url_params = $_GET;
            unset($url_params['url']);
            $build_url = function($page) use ($url_params) {
                $url_params['page'] = $page;
                return '?' . http_build_query($url_params);
            };
        ?>
        <?php if ($total_records > 0): ?>
        <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-white">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-800"><?= $start ?></span> - <span class="font-medium text-gray-800"><?= $end ?></span> trong <span class="font-medium text-gray-800"><?= $total_records ?></span> chương trình
            </div>
            <div class="flex items-center gap-1">
                <?php if ($p_current > 1): ?>
                    <a href="<?= $build_url($p_current - 1) ?>" class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50"><span class="iconify" data-icon="mdi:chevron-left"></span></a>
                <?php else: ?>
                    <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <?php endif; ?>
                
                <?php
                    $start_page = max(1, $p_current - 2);
                    $end_page = min($total_pages, $p_current + 2);
                    
                    if ($start_page > 1) {
                        echo '<a href="' . $build_url(1) . '" class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">1</a>';
                        if ($start_page > 2) echo '<span class="px-2 text-gray-400">...</span>';
                    }
                    
                    for ($i = $start_page; $i <= $end_page; $i++) {
                        if ($i == $p_current) {
                            echo '<button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-sm font-medium shadow-sm">' . $i . '</button>';
                        } else {
                            echo '<a href="' . $build_url($i) . '" class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">' . $i . '</a>';
                        }
                    }
                    
                    if ($end_page < $total_pages) {
                        if ($end_page < $total_pages - 1) echo '<span class="px-2 text-gray-400">...</span>';
                        echo '<a href="' . $build_url($total_pages) . '" class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">' . $total_pages . '</a>';
                    }
                ?>
                
                <?php if ($p_current < $total_pages): ?>
                    <a href="<?= $build_url($p_current + 1) ?>" class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></a>
                <?php else: ?>
                    <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled><span class="iconify" data-icon="mdi:chevron-right"></span></button>
                <?php endif; ?>
            </div>
        </div>
        <?php else: ?>
        <div class="p-8 text-center text-gray-500">
            Không có chương trình khuyến mãi nào.
        </div>
        <?php endif; ?>
    </div>
</div>

