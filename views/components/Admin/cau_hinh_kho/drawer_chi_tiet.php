<?php
// views/components/Admin/cau_hinh_kho/drawer_chi_tiet.php
?>
<div id="khoDrawer" class="fixed inset-y-0 right-0 w-full md:w-[600px] bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col border-l border-gray-200">
    
    <!-- Drawer Header -->
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/80 sticky top-0 z-10">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">
                <span class="iconify text-xl" data-icon="mdi:web"></span>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-900" id="drawerKhoTen">Kho Online</h2>
                <div class="flex items-center gap-2 mt-0.5">
                    <span class="text-xs font-semibold text-[#6B0D18]" id="drawerKhoMa">KHO-ONLINE</span>
                    <span class="text-[10px] text-gray-400">&bull;</span>
                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-medium bg-emerald-50 text-emerald-700" id="drawerKhoTrangThai">Đang hoạt động</span>
                </div>
            </div>
        </div>
        <button onclick="closeDrawer()" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-gray-200 rounded-full transition-colors focus:outline-none">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>

    <!-- Drawer Content -->
    <div class="flex-1 overflow-y-auto custom-scrollbar p-6">
        
        <!-- Thống kê nhanh -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <p class="text-xs text-gray-500 mb-1">Tổng sản phẩm</p>
                <p class="text-xl font-bold text-gray-900">128 <span class="text-xs font-normal text-gray-500">mã SP</span></p>
            </div>
            <div class="bg-red-50/50 rounded-xl p-4 border border-red-100">
                <p class="text-xs text-[#6B0D18]/70 mb-1">Tổng tồn kho</p>
                <p class="text-xl font-bold text-[#6B0D18]">2.450 <span class="text-xs font-normal text-[#6B0D18]/70">món</span></p>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Thông tin liên hệ / Vị trí -->
            <div>
                <h3 class="text-sm font-bold text-gray-900 mb-3 border-l-2 border-[#6B0D18] pl-2">Thông tin chung</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between items-start py-2 border-b border-dashed border-gray-100">
                        <span class="text-gray-500 w-1/3">Loại kho</span>
                        <span class="font-medium text-gray-900 text-right w-2/3">Kho online</span>
                    </div>
                    <div class="flex justify-between items-start py-2 border-b border-dashed border-gray-100">
                        <span class="text-gray-500 w-1/3">Địa chỉ</span>
                        <span class="font-medium text-gray-900 text-right w-2/3">123 Nguyễn Trãi, Quận 5, TP.HCM</span>
                    </div>
                    <div class="flex justify-between items-start py-2 border-b border-dashed border-gray-100">
                        <span class="text-gray-500 w-1/3">Người phụ trách</span>
                        <div class="text-right w-2/3">
                            <span class="font-medium text-gray-900 block">Hải Admin</span>
                            <span class="text-[11px] text-gray-500">Quản lý kho</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cấu trúc kho -->
            <div>
                <h3 class="text-sm font-bold text-gray-900 mb-3 border-l-2 border-[#6B0D18] pl-2">Cấu trúc kho</h3>
                <div class="grid grid-cols-2 gap-3">
                    <div class="border border-gray-200 rounded-lg p-3 text-center">
                        <span class="block text-2xl font-bold text-blue-600 mb-1">6</span>
                        <span class="text-xs text-gray-500">Khu vực</span>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-3 text-center">
                        <span class="block text-2xl font-bold text-emerald-600 mb-1">24</span>
                        <span class="text-xs text-gray-500">Kệ / Ngăn</span>
                    </div>
                </div>
                <button onclick="switchTab('khu_vuc'); closeDrawer()" class="w-full mt-3 py-2 border border-dashed border-gray-300 rounded-lg text-sm text-blue-600 hover:bg-blue-50 transition-colors font-medium">
                    Xem sơ đồ chi tiết
                </button>
            </div>

            <!-- Cấu hình vận hành -->
            <div>
                <h3 class="text-sm font-bold text-gray-900 mb-3 border-l-2 border-[#6B0D18] pl-2">Cấu hình vận hành</h3>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-sm text-gray-700">
                        <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle"></span> Cho phép bán hàng
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-700">
                        <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle"></span> Cho phép nhập/xuất
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-700">
                        <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle"></span> Cho phép kiểm kê
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Drawer Footer Actions -->
    <div class="p-4 border-t border-gray-100 bg-gray-50/80 flex items-center justify-end gap-3 sticky bottom-0">
        <a href="<?= APP_URL ?>/admin/ton-kho" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-100 font-medium text-sm transition-colors shadow-sm">
            Tồn kho hiện tại
        </a>
        <a href="<?= APP_URL ?>/admin/cau-hinh-kho/sua/1" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
            <span class="iconify" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
        </a>
    </div>
</div>

<script>
    function openDrawer(id) {
        document.getElementById('khoDrawer').classList.remove('translate-x-full');
        document.getElementById('drawerOverlay').classList.remove('hidden');
        
        setTimeout(() => {
            document.getElementById('drawerOverlay').classList.remove('opacity-0');
        }, 10);
    }

    function closeDrawer() {
        document.getElementById('khoDrawer').classList.add('translate-x-full');
        document.getElementById('drawerOverlay').classList.add('opacity-0');
        
        setTimeout(() => {
            document.getElementById('drawerOverlay').classList.add('hidden');
        }, 300);
    }
</script>
