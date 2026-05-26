    <!-- Tabs Phân Loại -->
    <div class="flex items-center gap-2 overflow-x-auto scrollbar-hide mb-4">
        <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Tất cả (<?= $thong_ke['tong'] ?>)</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap shrink-0 transition-colors">Khách mới (<?= $thong_ke['khach_moi'] ?>)</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap shrink-0 transition-colors">Đã mua hàng (<?= $thong_ke['da_mua'] ?>)</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap shrink-0 transition-colors">Gold</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap shrink-0 transition-colors">Diamond</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-red-600 rounded-full text-sm font-medium hover:bg-red-50 whitespace-nowrap shrink-0 transition-colors">Bị khóa (<?= $thong_ke['bi_khoa'] ?>)</button>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6 flex flex-col xl:flex-row xl:items-center justify-between gap-4">
        <div class="relative w-full xl:w-80 shrink-0">
            <input type="text" placeholder="Tìm tên, email, sđt, mã KH..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-shadow">
            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
        </div>
        <div class="flex items-center gap-3 overflow-x-auto pb-1 xl:pb-0 scrollbar-hide w-full xl:w-auto">
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Hạng thành viên</option>
                <option value="silver">Silver</option>
                <option value="gold">Gold</option>
                <option value="diamond">Diamond</option>
            </select>
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Trạng thái tài khoản</option>
                <option value="active">Đang hoạt động</option>
                <option value="locked">Bị khóa</option>
                <option value="unverified">Chưa xác thực</option>
            </select>
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Tổng chi tiêu</option>
                <option value="1">Dưới 500k</option>
                <option value="2">500k - 2tr</option>
                <option value="3">Trên 2tr</option>
            </select>
            <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors shrink-0 flex items-center gap-2">
                Bộ lọc nâng cao <span class="iconify" data-icon="mdi:filter-variant"></span>
            </button>
            <button class="px-3 py-2 text-[#6B0D18] text-sm font-medium hover:underline whitespace-nowrap shrink-0">
                Xóa lọc
            </button>
        </div>
    </div>
