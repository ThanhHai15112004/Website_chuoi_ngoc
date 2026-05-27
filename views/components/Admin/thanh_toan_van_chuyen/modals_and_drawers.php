<?php
// views/components/Admin/thanh_toan_van_chuyen/modals_and_drawers.php
?>
<!-- Backdrop chung cho Drawers -->
<div id="drawerBackdrop" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity opacity-0 backdrop-blur-sm" onclick="closeAllDrawers()"></div>

<!-- 1. Drawer: Thêm/Sửa Phương thức thanh toán -->
<div id="drawerPayment" class="fixed top-0 right-0 bottom-0 w-full max-w-md bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <div class="px-5 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-900 text-lg">Cấu hình Phương thức thanh toán</h3>
        <button onclick="closeDrawer('drawerPayment')" class="text-gray-400 hover:text-red-500 transition-colors">
            <span class="iconify text-2xl" data-icon="mdi:close"></span>
        </button>
    </div>
    <div class="flex-1 overflow-y-auto p-5 space-y-5">
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Tên phương thức</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" value="Thanh toán khi nhận hàng">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Mô tả hiển thị</label>
            <textarea rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]">Khách thanh toán cho nhân viên giao hàng khi nhận sản phẩm</textarea>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Phí thanh toán (nếu có)</label>
            <div class="relative">
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl pr-10 focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" value="0">
                <span class="absolute right-3 top-2.5 text-gray-500 text-sm">đ</span>
            </div>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Trạng thái bật/tắt</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] bg-white">
                <option value="1" selected>Đang bật</option>
                <option value="0">Tắt</option>
            </select>
        </div>
    </div>
    <div class="p-5 border-t border-gray-200 bg-white">
        <button onclick="closeDrawer('drawerPayment'); markUnsaved();" class="w-full py-2.5 bg-[#6B0D18] text-white rounded-xl font-bold shadow-md hover:bg-red-900 transition-colors">Xác nhận</button>
    </div>
</div>

<!-- 2. Drawer: Thêm/Sửa Tài khoản ngân hàng -->
<div id="drawerBank" class="fixed top-0 right-0 bottom-0 w-full max-w-md bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <div class="px-5 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-900 text-lg">Cấu hình Tài khoản ngân hàng</h3>
        <button onclick="closeDrawer('drawerBank')" class="text-gray-400 hover:text-red-500 transition-colors">
            <span class="iconify text-2xl" data-icon="mdi:close"></span>
        </button>
    </div>
    <div class="flex-1 overflow-y-auto p-5 space-y-5">
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Ngân hàng</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: Vietcombank">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Chủ tài khoản</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: NGUYEN VAN A">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Số tài khoản</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="Nhập số tài khoản">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Chi nhánh</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="Nhập chi nhánh">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Mã QR (Tùy chọn)</label>
            <input type="file" class="w-full px-3 py-1.5 border border-gray-300 rounded-xl text-sm" accept="image/*">
        </div>
        <div class="space-y-1 mt-4">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" checked>
                <span class="text-sm font-medium text-gray-900">Đặt làm tài khoản mặc định</span>
            </label>
        </div>
    </div>
    <div class="p-5 border-t border-gray-200 bg-white">
        <button onclick="closeDrawer('drawerBank'); markUnsaved();" class="w-full py-2.5 bg-[#6B0D18] text-white rounded-xl font-bold shadow-md hover:bg-red-900 transition-colors">Lưu tài khoản</button>
    </div>
</div>

<!-- 3. Drawer: Thêm/Sửa Phương thức vận chuyển -->
<div id="drawerShipping" class="fixed top-0 right-0 bottom-0 w-full max-w-md bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <div class="px-5 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-900 text-lg">Cấu hình Vận chuyển</h3>
        <button onclick="closeDrawer('drawerShipping')" class="text-gray-400 hover:text-red-500 transition-colors">
            <span class="iconify text-2xl" data-icon="mdi:close"></span>
        </button>
    </div>
    <div class="flex-1 overflow-y-auto p-5 space-y-5">
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Tên phương thức</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="Giao hàng tiêu chuẩn">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Thời gian dự kiến</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: 2 - 5 ngày">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Phí mặc định</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="30000">
        </div>
    </div>
    <div class="p-5 border-t border-gray-200 bg-white">
        <button onclick="closeDrawer('drawerShipping'); markUnsaved();" class="w-full py-2.5 bg-[#6B0D18] text-white rounded-xl font-bold shadow-md hover:bg-red-900 transition-colors">Lưu lại</button>
    </div>
</div>

<script>
    function openDrawer(drawerId) {
        const backdrop = document.getElementById('drawerBackdrop');
        const drawer = document.getElementById(drawerId);
        
        backdrop.classList.remove('hidden');
        setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
        
        drawer.classList.remove('translate-x-full');
    }

    function closeDrawer(drawerId) {
        const backdrop = document.getElementById('drawerBackdrop');
        const drawer = document.getElementById(drawerId);
        
        drawer.classList.add('translate-x-full');
        backdrop.classList.add('opacity-0');
        setTimeout(() => backdrop.classList.add('hidden'), 300);
    }

    function closeAllDrawers() {
        ['drawerPayment', 'drawerBank', 'drawerShipping'].forEach(id => {
            const drawer = document.getElementById(id);
            if(drawer) drawer.classList.add('translate-x-full');
        });
        const backdrop = document.getElementById('drawerBackdrop');
        backdrop.classList.add('opacity-0');
        setTimeout(() => backdrop.classList.add('hidden'), 300);
    }

    // Mock functions for modals (Zone & Freeship) - In real app, they would be similar drawers/modals
    function openModal(modalId) {
        alert("Tính năng mở Modal " + modalId + " đang được giả lập. Giao diện thực tế sẽ tương tự các Drawer bên cạnh.");
    }
</script>
