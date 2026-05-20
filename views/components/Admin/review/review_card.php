        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:border-gray-300 transition-colors relative flex gap-4">
            
            <!-- Checkbox cho thao tác hàng loạt (tùy chọn) -->
            <div class="shrink-0 pt-1">
                <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18] cursor-pointer">
            </div>

            <div class="flex-1 min-w-0">
                <!-- Header Card: Khách hàng & Trạng thái -->
                <div class="flex flex-wrap items-start justify-between gap-3 mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center font-bold text-gray-500 uppercase shrink-0">
                            <?= mb_substr($item['ten_khach'], 0, 1) ?>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm flex items-center gap-2">
                                <?= $item['ten_khach'] ?>
                                
                                <?php if ($item['loai'] === 'danh_gia'): ?>
                                    <span class="px-2 py-0.5 bg-yellow-50 text-yellow-700 text-[10px] font-bold rounded border border-yellow-100">Đánh giá SP</span>
                                <?php else: ?>
                                    <span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-[10px] font-bold rounded border border-blue-100">Bình luận bài viết</span>
                                <?php endif; ?>
                            </h4>
                            
                            <!-- Thẻ khách hàng & Trạng thái mua -->
                            <div class="flex items-center gap-2 mt-1">
                                <?php if ($item['hang_thanh_vien'] === 'Gold'): ?>
                                    <span class="px-1.5 py-0.5 bg-yellow-100 text-yellow-800 text-[10px] font-bold rounded">GOLD</span>
                                <?php elseif ($item['hang_thanh_vien'] === 'Diamond'): ?>
                                    <span class="px-1.5 py-0.5 bg-red-100 text-[#6B0D18] text-[10px] font-bold rounded">DIAMOND</span>
                                <?php elseif ($item['hang_thanh_vien'] === 'Silver'): ?>
                                    <span class="px-1.5 py-0.5 bg-gray-100 text-gray-700 text-[10px] font-bold rounded">SILVER</span>
                                <?php else: ?>
                                    <span class="px-1.5 py-0.5 bg-gray-50 text-gray-500 text-[10px] font-bold rounded border border-gray-200">NEW</span>
                                <?php endif; ?>

                                <?php if ($item['da_mua']): ?>
                                    <span class="flex items-center gap-1 text-[10px] text-emerald-600 font-medium">
                                        <span class="iconify" data-icon="mdi:check-circle"></span> Đã mua hàng
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Trạng thái duyệt -->
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400"><?= $item['thoi_gian'] ?></span>
                        <?php if ($item['trang_thai'] === 'cho_duyet'): ?>
                            <span class="px-2.5 py-1 bg-amber-50 text-amber-700 text-xs font-bold rounded-md border border-amber-200 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Chờ duyệt
                            </span>
                        <?php elseif ($item['trang_thai'] === 'da_duyet'): ?>
                            <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-md border border-emerald-100 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Đã duyệt
                            </span>
                        <?php elseif ($item['trang_thai'] === 'da_an'): ?>
                            <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded-md border border-gray-200 flex items-center gap-1.5">
                                <span class="iconify text-sm" data-icon="mdi:eye-off-outline"></span> Đã ẩn
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sản phẩm liên quan -->
                <div class="flex items-center gap-3 p-2 bg-gray-50 rounded-lg border border-gray-100 mb-3 w-fit pr-4">
                    <?php if (!empty($item['anh_sp'])): ?>
                        <img src="<?= $item['anh_sp'] ?>" class="w-10 h-10 rounded border border-gray-200 object-cover">
                    <?php else: ?>
                        <div class="w-10 h-10 rounded bg-white border border-gray-200 flex items-center justify-center text-gray-400">
                            <span class="iconify text-xl" data-icon="mdi:newspaper-variant-outline"></span>
                        </div>
                    <?php endif; ?>
                    <div>
                        <a href="#" class="text-sm font-bold text-gray-800 hover:text-[#6B0D18] transition-colors"><?= $item['san_pham'] ?></a>
                        <p class="text-[10px] text-gray-500"><?= $item['ma_sp'] ?></p>
                    </div>
                </div>

                <!-- Sao đánh giá & Cảnh báo -->
                <?php if ($item['loai'] === 'danh_gia'): ?>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="flex text-yellow-400 text-lg">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="iconify" data-icon="<?= $i <= $item['sao'] ? 'mdi:star' : 'mdi:star-outline' ?>"></span>
                            <?php endfor; ?>
                        </div>
                        <?php if ($item['sao'] <= 2): ?>
                            <span class="px-2 py-0.5 bg-red-50 text-red-600 text-[10px] font-bold rounded uppercase border border-red-100">Cần phản hồi</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Nội dung chữ -->
                <p class="text-sm text-gray-700 leading-relaxed mb-3 pr-4">
                    <?= $item['noi_dung'] ?>
                </p>

                <!-- Ảnh đính kèm -->
                <?php if (!empty($item['anh_dinh_kem'])): ?>
                    <div class="flex gap-2 mb-4">
                        <?php foreach ($item['anh_dinh_kem'] as $img): ?>
                            <div class="w-16 h-16 rounded-lg border border-gray-200 overflow-hidden cursor-pointer hover:border-[#6B0D18] transition-colors">
                                <img src="<?= $img ?>" class="w-full h-full object-cover">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Phản hồi từ cửa hàng -->
                <?php if ($item['phan_hoi']): ?>
                    <div class="bg-amber-50/50 border-l-4 border-l-[#6B0D18] rounded-r-lg p-3 mt-3 mb-4">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="iconify text-[#6B0D18] text-sm" data-icon="mdi:store-outline"></span>
                            <span class="text-xs font-bold text-gray-800">Phản hồi từ cửa hàng</span>
                            <span class="text-[10px] text-gray-400">• <?= $item['phan_hoi']['nhan_vien'] ?> • <?= $item['phan_hoi']['thoi_gian'] ?></span>
                        </div>
                        <p class="text-sm text-gray-700"><?= $item['phan_hoi']['noi_dung'] ?></p>
                    </div>
                <?php endif; ?>

                <!-- Nút thao tác -->
                <div class="flex items-center gap-2 border-t border-gray-100 pt-3 mt-2">
                    <?php if ($item['trang_thai'] === 'cho_duyet'): ?>
                        <button class="px-4 py-1.5 bg-[#6B0D18] text-white rounded-md text-xs font-bold hover:bg-[#8A111F] transition-colors" onclick="approveReview(this)">Duyệt ngay</button>
                        <button class="px-4 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-md text-xs font-medium hover:bg-gray-50 transition-colors" onclick="openHideModal()">Ẩn</button>
                    <?php elseif ($item['trang_thai'] === 'da_duyet'): ?>
                        <button class="px-4 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-md text-xs font-medium hover:bg-gray-50 transition-colors" onclick="openReviewDrawer()">Trả lời</button>
                        <button class="px-4 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-md text-xs font-medium hover:bg-gray-50 transition-colors" onclick="openHideModal()">Ẩn</button>
                    <?php elseif ($item['trang_thai'] === 'da_an'): ?>
                        <button class="px-4 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-md text-xs font-medium hover:bg-gray-50 transition-colors">Hiện lại</button>
                        <button class="px-4 py-1.5 bg-red-50 text-red-600 rounded-md text-xs font-bold hover:bg-red-100 transition-colors ml-auto">Xóa vĩnh viễn</button>
                    <?php endif; ?>
                    
                    <?php if ($item['trang_thai'] !== 'da_an'): ?>
                        <button class="px-4 py-1.5 text-gray-500 hover:text-[#6B0D18] rounded-md text-xs font-medium transition-colors ml-auto flex items-center gap-1" onclick="openReviewDrawer()">
                            Chi tiết <span class="iconify" data-icon="mdi:arrow-right"></span>
                        </button>
                    <?php endif; ?>
                </div>

            </div>
        </div>
