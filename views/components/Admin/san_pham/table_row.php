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
