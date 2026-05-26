<!-- Drawer Lịch sử kho -->
<div id="historyDrawer" class="fixed inset-y-0 right-0 w-full max-w-md bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50 shrink-0">
        <h3 class="text-lg font-bold text-gray-900">Lịch sử kho</h3>
        <button onclick="closeDrawer('historyDrawer')" class="text-gray-400 hover:text-red-600 transition-colors">
            <span class="iconify text-2xl" data-icon="mdi:close"></span>
        </button>
    </div>

    <!-- Product Info -->
    <div class="p-6 border-b border-gray-100 shrink-0">
        <div class="flex items-start gap-4">
            <div class="w-16 h-16 rounded-xl bg-gray-100 border border-gray-200 flex items-center justify-center shrink-0">
                <span class="iconify text-gray-400 text-3xl" data-icon="mdi:image-outline"></span>
            </div>
            <div>
                <h4 class="font-bold text-gray-900">Vòng Ngọc Bích Tài Lộc</h4>
                <div class="text-sm text-gray-500 mt-1">SKU: NB-TL-001</div>
                <div class="inline-block mt-2 px-3 py-1 bg-gray-100 text-gray-700 font-bold rounded-lg text-sm">
                    Tồn hiện tại: <span class="text-red-900">25</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Timeline Lịch sử -->
    <div class="p-6 flex-1 overflow-y-auto sidebar-scroll">
        <h5 class="text-sm font-bold text-gray-900 mb-4">Hoạt động gần đây</h5>
        
        <div class="relative pl-4 space-y-6">
            <!-- Đường dọc timeline -->
            <div class="absolute left-[11px] top-2 bottom-0 w-[2px] bg-gray-100"></div>

            <!-- Item 1: Điều chỉnh -->
            <div class="relative">
                <div class="absolute -left-[20px] top-1 w-6 h-6 rounded-full bg-blue-100 border-2 border-white flex items-center justify-center">
                    <span class="iconify text-xs text-blue-600" data-icon="mdi:tune"></span>
                </div>
                <div class="text-sm text-gray-500 mb-1">18/05/2026, 09:30</div>
                <div class="bg-gray-50 rounded-lg p-3 border border-gray-200">
                    <div class="flex justify-between items-start mb-1">
                        <span class="font-medium text-gray-900">Điều chỉnh kho</span>
                        <span class="font-bold text-gray-900">25</span>
                    </div>
                    <div class="text-sm text-gray-600">Thay đổi: <span class="text-blue-600 font-medium">0</span></div>
                    <div class="text-xs text-gray-500 mt-2">Lý do: Kiểm kê định kỳ</div>
                    <div class="text-xs text-gray-500">Người thực hiện: Hải Admin</div>
                </div>
            </div>

            <!-- Item 2: Xuất kho -->
            <div class="relative">
                <div class="absolute -left-[20px] top-1 w-6 h-6 rounded-full bg-amber-100 border-2 border-white flex items-center justify-center">
                    <span class="iconify text-xs text-amber-600" data-icon="mdi:tray-arrow-up"></span>
                </div>
                <div class="text-sm text-gray-500 mb-1">17/05/2026, 14:15</div>
                <div class="bg-gray-50 rounded-lg p-3 border border-gray-200">
                    <div class="flex justify-between items-start mb-1">
                        <span class="font-medium text-gray-900">Xuất kho (Đơn hàng)</span>
                        <span class="font-bold text-gray-900">25</span>
                    </div>
                    <div class="text-sm text-gray-600">Thay đổi: <span class="text-red-600 font-medium">-1</span></div>
                    <div class="text-xs text-gray-500 mt-2">Mã đơn: <a href="#" class="text-red-700 font-medium hover:underline">#DH0012</a></div>
                    <div class="text-xs text-gray-500">Người thực hiện: Hệ thống</div>
                </div>
            </div>

            <!-- Item 3: Nhập kho -->
            <div class="relative">
                <div class="absolute -left-[20px] top-1 w-6 h-6 rounded-full bg-emerald-100 border-2 border-white flex items-center justify-center">
                    <span class="iconify text-xs text-emerald-600" data-icon="mdi:tray-arrow-down"></span>
                </div>
                <div class="text-sm text-gray-500 mb-1">10/05/2026, 08:00</div>
                <div class="bg-gray-50 rounded-lg p-3 border border-gray-200">
                    <div class="flex justify-between items-start mb-1">
                        <span class="font-medium text-gray-900">Nhập kho lô mới</span>
                        <span class="font-bold text-gray-900">26</span>
                    </div>
                    <div class="text-sm text-gray-600">Thay đổi: <span class="text-emerald-600 font-medium">+20</span></div>
                    <div class="text-xs text-gray-500 mt-2">Nguồn: Xưởng đá Quý Lê</div>
                    <div class="text-xs text-gray-500">Người thực hiện: Hải Admin</div>
                </div>
            </div>

        </div>
    </div>
</div>
