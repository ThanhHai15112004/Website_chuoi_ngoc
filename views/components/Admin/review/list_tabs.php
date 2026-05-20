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

