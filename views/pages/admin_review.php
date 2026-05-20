<?php
// views/pages/admin_review.php
$thong_ke = $thong_ke ?? [];
$reviews = $reviews ?? [];
?>
<div class="animate-[fadeInPage_0.3s_ease-out] max-w-7xl mx-auto pb-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Bình luận / Đánh giá</h2>
            <p class="text-sm text-gray-500 mt-1">Quản lý đánh giá sản phẩm, bình luận bài viết và phản hồi của khách hàng.</p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2" onclick="document.getElementById('autoApproveModal').classList.remove('hidden')">
                <span class="iconify text-lg" data-icon="mdi:cog-outline"></span> Cài đặt duyệt
            </button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm flex items-center gap-2 shadow-md">
                <span class="iconify" data-icon="mdi:export-variant"></span> Xuất danh sách
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600"><span class="iconify text-lg" data-icon="mdi:comment-text-multiple-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Tổng đánh giá</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['tong'], 0, ',', '.') ?></p>
        </div>
        <div class="bg-amber-50 rounded-xl shadow-sm border border-amber-200 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center text-amber-700"><span class="iconify text-lg" data-icon="mdi:clock-outline"></span></div>
                <h3 class="text-xs font-bold text-amber-700 uppercase tracking-wider">Chờ duyệt</h3>
            </div>
            <p class="text-2xl font-bold text-amber-800"><?= $thong_ke['cho_duyet'] ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600"><span class="iconify text-lg" data-icon="mdi:check-circle-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Đã duyệt</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['da_duyet'], 0, ',', '.') ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600"><span class="iconify text-lg" data-icon="mdi:eye-off-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Đã ẩn</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= $thong_ke['da_an'] ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-yellow-50 flex items-center justify-center text-yellow-500"><span class="iconify text-lg" data-icon="mdi:star"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Điểm trung bình</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= $thong_ke['diem_tb'] ?> <span class="text-sm font-normal text-gray-500">/ 5</span></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-purple-50 flex items-center justify-center text-purple-600"><span class="iconify text-lg" data-icon="mdi:image-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Có hình ảnh</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= $thong_ke['co_anh'] ?></p>
        </div>
    </div>

    <!-- Tabs Content Type -->
    <div class="flex items-center gap-2 overflow-x-auto scrollbar-hide mb-4">
        <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Tất cả (<?= $thong_ke['tong'] ?>)</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap shrink-0 transition-colors">Đánh giá sản phẩm (980)</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap shrink-0 transition-colors">Bình luận bài viết (268)</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap shrink-0 transition-colors">Phản hồi từ cửa hàng</button>
    </div>

    <!-- Tabs Status -->
    <div class="border-b border-gray-200 mb-6 flex overflow-x-auto scrollbar-hide">
        <button class="px-4 py-3 border-b-2 border-[#6B0D18] text-[#6B0D18] text-sm font-bold whitespace-nowrap shrink-0">Tất cả</button>
        <button class="px-4 py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-800 text-sm font-medium whitespace-nowrap shrink-0 flex items-center gap-1.5">
            Chờ duyệt <span class="bg-amber-100 text-amber-700 text-[10px] font-bold px-2 py-0.5 rounded-full"><?= $thong_ke['cho_duyet'] ?></span>
        </button>
        <button class="px-4 py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-800 text-sm font-medium whitespace-nowrap shrink-0">Đã duyệt</button>
        <button class="px-4 py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-800 text-sm font-medium whitespace-nowrap shrink-0">Chưa trả lời</button>
        <button class="px-4 py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-800 text-sm font-medium whitespace-nowrap shrink-0">Đã ẩn</button>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="relative w-full md:w-96 shrink-0">
            <input type="text" placeholder="Tìm tên khách, sản phẩm, nội dung..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-shadow">
            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
        </div>
        <div class="flex items-center gap-3 overflow-x-auto pb-1 md:pb-0 scrollbar-hide w-full md:w-auto">
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Tất cả sao</option>
                <option value="5">5 Sao</option>
                <option value="4">4 Sao</option>
                <option value="1-2">1 - 2 Sao (Cần chú ý)</option>
            </select>
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Loại đính kèm</option>
                <option value="has_img">Có hình ảnh</option>
                <option value="no_img">Không có hình ảnh</option>
            </select>
            <button class="px-3 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors shrink-0">
                Xóa lọc
            </button>
        </div>
    </div>

    <!-- Danh sách Reviews (Card Layout) -->
    <div class="space-y-4">
        <?php foreach ($reviews as $item): ?>
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
        <?php endforeach; ?>
    </div>

    <!-- Phân trang -->
    <div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-4">
        <span class="text-sm text-gray-500">Hiển thị 1 - 20 trong <?= number_format($thong_ke['tong'], 0, ',', '.') ?> nội dung</span>
        <div class="flex items-center gap-1">
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 bg-white"><span class="iconify" data-icon="mdi:chevron-left"></span></button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-bold text-sm shadow-md">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 font-medium text-sm bg-white">2</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 font-medium text-sm bg-white">3</button>
            <span class="w-8 h-8 flex items-center justify-center text-gray-500 text-sm">...</span>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 font-medium text-sm bg-white">63</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 bg-white"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
        </div>
    </div>
</div>

<!-- Drawer Xem chi tiết & Phản hồi -->
<div id="reviewDrawerOverlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[60] hidden opacity-0 transition-opacity duration-300" onclick="closeReviewDrawer()"></div>
<div id="reviewDrawer" class="fixed top-0 right-0 h-full w-full max-w-lg bg-[#FAF8F5] shadow-2xl z-[70] transform translate-x-full transition-transform duration-300 ease-out flex flex-col">
    <!-- Drawer Header -->
    <div class="bg-white px-6 py-4 border-b border-gray-100 flex items-center justify-between shrink-0">
        <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
            Chi tiết đánh giá
        </h3>
        <button class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition-colors" onclick="closeReviewDrawer()">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>
    
    <!-- Drawer Content -->
    <div class="flex-1 overflow-y-auto p-6 scrollbar-hide space-y-5">
        <!-- Khách hàng -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center font-bold text-gray-500 uppercase text-lg">
                T
            </div>
            <div>
                <h4 class="font-bold text-gray-800 text-base">Trần Thị B</h4>
                <div class="flex items-center gap-2 mt-1">
                    <span class="px-1.5 py-0.5 bg-gray-100 text-gray-700 text-[10px] font-bold rounded">SILVER</span>
                    <span class="text-[10px] text-gray-400">• 090123xxxx</span>
                </div>
            </div>
        </div>

        <!-- Nội dung gốc -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex text-yellow-400 text-lg mb-2">
                <span class="iconify" data-icon="mdi:star"></span>
                <span class="iconify" data-icon="mdi:star"></span>
                <span class="iconify" data-icon="mdi:star-outline"></span>
                <span class="iconify" data-icon="mdi:star-outline"></span>
                <span class="iconify" data-icon="mdi:star-outline"></span>
            </div>
            <p class="text-sm text-gray-700 leading-relaxed">Màu đá hơi tối so với ảnh trên web. Mình tay nhỏ đeo dây này cảm giác hơi lỏng lẻo, shop có nhận đổi size dây không ạ?</p>
            <p class="text-xs text-gray-400 mt-2">1 ngày trước qua Web</p>
        </div>

        <!-- Trả lời -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <h4 class="text-sm font-bold text-gray-800 mb-3 flex items-center gap-2"><span class="iconify text-[#6B0D18]" data-icon="mdi:reply"></span> Phản hồi khách hàng</h4>
            
            <div class="mb-3">
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-gray-50 cursor-pointer">
                    <option value="">-- Chọn mẫu phản hồi nhanh --</option>
                    <option value="1">Cảm ơn đánh giá tích cực 5 sao</option>
                    <option value="2">Xin lỗi và hỗ trợ vấn đề (1-2 sao)</option>
                    <option value="3">Hướng dẫn đổi trả / bảo hành</option>
                </select>
            </div>

            <textarea rows="4" placeholder="Nhập phản hồi của cửa hàng..." class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none leading-relaxed">Chào bạn, Chuỗi Ngọc xin ghi nhận phản hồi của bạn. Các mẫu Obsidian tự nhiên sẽ có tông đen đặc trưng. Về phần dây rộng, nhân viên CSKH sẽ liên hệ qua SĐT để hỗ trợ bạn đổi size miễn phí nhé ạ!</textarea>
            
            <div class="mt-3 flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" checked class="w-4 h-4 text-[#6B0D18] rounded focus:ring-[#6B0D18] border-gray-300">
                    <span class="text-sm text-gray-600">Hiển thị công khai</span>
                </label>
                <button class="px-5 py-2 bg-[#6B0D18] text-white rounded-lg font-bold text-sm hover:bg-[#8A111F] transition-colors shadow-sm" onclick="showReviewToast('Đã gửi phản hồi thành công!')">Gửi phản hồi</button>
            </div>
        </div>

        <!-- Lịch sử xử lý -->
        <div>
            <h4 class="text-xs font-bold text-gray-500 uppercase mb-3">Lịch sử xử lý</h4>
            <div class="relative border-l-2 border-gray-200 ml-3 pl-4 space-y-4">
                <div class="relative">
                    <div class="absolute w-2.5 h-2.5 bg-[#6B0D18] rounded-full -left-[21px] top-1 ring-4 ring-[#FAF8F5]"></div>
                    <p class="text-xs font-bold text-gray-800">Hải Admin phản hồi</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">1 ngày trước</p>
                </div>
                <div class="relative">
                    <div class="absolute w-2.5 h-2.5 bg-gray-300 rounded-full -left-[21px] top-1 ring-4 ring-[#FAF8F5]"></div>
                    <p class="text-xs font-bold text-gray-700">Hải Admin duyệt đánh giá</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">1 ngày trước</p>
                </div>
                <div class="relative">
                    <div class="absolute w-2.5 h-2.5 bg-gray-300 rounded-full -left-[21px] top-1 ring-4 ring-[#FAF8F5]"></div>
                    <p class="text-xs font-bold text-gray-700">Khách gửi đánh giá</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">1 ngày trước</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ẩn nội dung -->
<div id="hideModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-amber-500 text-xl" data-icon="mdi:eye-off-outline"></span> Ẩn nội dung này?</h3>
            <button class="text-gray-400 hover:text-gray-700 transition-colors" onclick="document.getElementById('hideModal').classList.add('hidden')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-4">
            <p class="text-sm text-gray-600">Nội dung sẽ không còn hiển thị ngoài trang người dùng nhưng vẫn được lưu trong hệ thống.</p>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Lý do ẩn <span class="text-red-500">*</span></label>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-700">
                        <input type="radio" name="hide_reason" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]"> Ngôn từ thiếu lịch sự / Xúc phạm
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-700">
                        <input type="radio" name="hide_reason" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]"> Spam / Quảng cáo
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-700">
                        <input type="radio" name="hide_reason" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]"> Nhầm sản phẩm / Không liên quan
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-700">
                        <input type="radio" name="hide_reason" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]"> Khách yêu cầu ẩn
                    </label>
                </div>
            </div>
            
            <textarea rows="2" placeholder="Ghi chú thêm (không bắt buộc)..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"></textarea>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('hideModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-amber-500 text-white rounded-lg text-sm font-medium hover:bg-amber-600 shadow-sm" onclick="document.getElementById('hideModal').classList.add('hidden'); showReviewToast('Đã ẩn nội dung');">Xác nhận ẩn</button>
        </div>
    </div>
</div>

<!-- Modal Cài đặt duyệt tự động -->
<div id="autoApproveModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:cog-outline"></span> Cài đặt duyệt tự động</h3>
            <button class="text-gray-400 hover:text-gray-700 transition-colors" onclick="document.getElementById('autoApproveModal').classList.add('hidden')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-5">
            
            <div class="flex items-center justify-between bg-emerald-50 border border-emerald-100 p-3 rounded-lg">
                <div>
                    <h5 class="text-sm font-bold text-emerald-800">Tự động duyệt 4-5 sao</h5>
                    <p class="text-[11px] text-emerald-600 mt-0.5">Bỏ qua bước duyệt thủ công với đánh giá tích cực.</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                </label>
            </div>

            <div class="flex items-center justify-between border border-gray-200 p-3 rounded-lg">
                <div>
                    <h5 class="text-sm font-bold text-gray-800">Treo duyệt nếu có hình ảnh</h5>
                    <p class="text-[11px] text-gray-500 mt-0.5">Yêu cầu Admin kiểm duyệt thủ công ảnh tải lên.</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                </label>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-800 mb-2">Từ khóa chặn / Đưa vào danh sách đen</label>
                <div class="p-3 border border-gray-200 rounded-lg flex flex-wrap gap-2">
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded border border-gray-200 flex items-center gap-1">đồ giả <span class="iconify cursor-pointer hover:text-red-500" data-icon="mdi:close"></span></span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded border border-gray-200 flex items-center gap-1">lừa đảo <span class="iconify cursor-pointer hover:text-red-500" data-icon="mdi:close"></span></span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded border border-gray-200 flex items-center gap-1">kém chất lượng <span class="iconify cursor-pointer hover:text-red-500" data-icon="mdi:close"></span></span>
                    <input type="text" placeholder="+ Thêm từ khóa..." class="outline-none text-xs w-24 bg-transparent ml-1">
                </div>
                <p class="text-[10px] text-gray-400 mt-1">Bình luận chứa các từ khóa này sẽ bị tự động Ẩn (Không duyệt).</p>
            </div>

        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('autoApproveModal').classList.add('hidden')">Đóng</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-[#8A111F] shadow-sm" onclick="document.getElementById('autoApproveModal').classList.add('hidden'); showReviewToast('Đã lưu cài đặt!');">Lưu cài đặt</button>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="reviewToast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[90]">
    <div class="text-emerald-500 mt-0.5"><span class="iconify text-xl" data-icon="mdi:check-circle"></span></div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toastMsg">Thao tác thành công.</p>
    </div>
</div>

<script>
    function approveReview(btn) {
        btn.innerText = "Đã duyệt";
        btn.classList.remove('bg-[#6B0D18]', 'hover:bg-[#8A111F]', 'text-white');
        btn.classList.add('bg-emerald-50', 'text-emerald-600', 'border', 'border-emerald-200', 'cursor-default');
        btn.disabled = true;
        showReviewToast('Đã duyệt nội dung thành công!');
    }

    function openHideModal() {
        document.getElementById('hideModal').classList.remove('hidden');
    }

    function showReviewToast(msg) {
        const t = document.getElementById('reviewToast');
        document.getElementById('toastMsg').innerText = msg;
        t.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => t.classList.add('translate-y-20', 'opacity-0'), 3000);
    }

    // Drawer Logic
    function openReviewDrawer() {
        const overlay = document.getElementById('reviewDrawerOverlay');
        const drawer = document.getElementById('reviewDrawer');
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        drawer.classList.remove('translate-x-full');
    }

    function closeReviewDrawer() {
        const overlay = document.getElementById('reviewDrawerOverlay');
        const drawer = document.getElementById('reviewDrawer');
        overlay.classList.add('opacity-0');
        drawer.classList.add('translate-x-full');
        setTimeout(() => overlay.classList.add('hidden'), 300);
    }
</script>
