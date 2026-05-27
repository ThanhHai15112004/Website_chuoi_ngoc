<?php
// views/components/Admin/chinh_sach/filter_bar.php
?>
<!-- Tabs trạng thái -->
<div class="px-6 pt-4 border-b border-gray-200">
    <div class="flex overflow-x-auto hide-scrollbar gap-2 pb-3">
        <button class="px-4 py-1.5 bg-[#6B0D18] text-white rounded-full text-sm font-medium whitespace-nowrap transition-colors">Tất cả (8)</button>
        <button class="px-4 py-1.5 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">Đang hiển thị (6)</button>
        <button class="px-4 py-1.5 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">Đang ẩn (1)</button>
        <button class="px-4 py-1.5 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">Bản nháp (1)</button>
        <button class="px-4 py-1.5 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">Checkout (3)</button>
        <button class="px-4 py-1.5 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors text-amber-600 border-amber-200 bg-amber-50">Cần cập nhật (1)</button>
    </div>
</div>

<!-- Thanh tìm kiếm & Lọc -->
<div class="px-6 py-4 flex flex-col md:flex-row items-center gap-4 border-b border-gray-100 bg-gray-50/30">
    <!-- Search -->
    <div class="relative w-full md:w-96">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
            <span class="iconify" data-icon="mdi:magnify"></span>
        </span>
        <input type="text" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-colors" placeholder="Tìm theo tên chính sách, slug, người cập nhật...">
    </div>

    <!-- Filters -->
    <div class="flex items-center gap-3 w-full md:w-auto">
        <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18]">
            <option value="">Loại chính sách</option>
            <option value="1">Đổi trả</option>
            <option value="2">Bảo hành</option>
            <option value="3">Vận chuyển</option>
            <option value="4">Thanh toán</option>
            <option value="5">Bảo mật</option>
            <option value="6">Điều khoản</option>
        </select>
        <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18]">
            <option value="">Vị trí hiển thị</option>
            <option value="footer">Footer</option>
            <option value="checkout">Checkout</option>
            <option value="product">Trang sản phẩm</option>
            <option value="register">Trang đăng ký</option>
        </select>
        
        <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center gap-1">
            <span class="iconify" data-icon="mdi:filter-variant"></span> Lọc
        </button>
    </div>
</div>

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
