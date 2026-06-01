<?php
// views/components/Admin/thanh_toan_van_chuyen/modals_and_drawers.php
$apiBase = APP_URL . '/admin/cai-dat/thanh-toan/api';
?>
<!-- Backdrop chung cho Drawers -->
<div id="drawerBackdrop" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity opacity-0 backdrop-blur-sm" onclick="closeAllDrawers()"></div>

<!-- 1. Drawer: Thêm/Sửa Phương thức thanh toán -->
<div id="drawerPayment" class="fixed top-0 right-0 bottom-0 w-full max-w-md bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <div class="px-5 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-900 text-lg" id="drawerPaymentTitle">Thêm phương thức thanh toán</h3>
        <button onclick="closeDrawer('drawerPayment')" class="text-gray-400 hover:text-red-500 transition-colors">
            <span class="iconify text-2xl" data-icon="mdi:close"></span>
        </button>
    </div>
    <form id="formPayment" class="flex-1 overflow-y-auto p-5 space-y-5" onsubmit="return false;">
        <input type="hidden" name="id" id="payment-id">
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Mã phương thức <span class="text-red-500">*</span></label>
            <input type="text" name="ma" id="payment-ma" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: COD, MOMO" required>
            <p class="text-xs text-gray-400">Chỉ dùng khi thêm mới, không sửa được</p>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Tên phương thức <span class="text-red-500">*</span></label>
            <input type="text" name="ten" id="payment-ten" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" required>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Mô tả hiển thị</label>
            <textarea rows="2" name="mo_ta" id="payment-mo_ta" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]"></textarea>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Điều kiện áp dụng</label>
            <input type="text" name="dieu_kien" id="payment-dieu_kien" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: Đơn từ 0đ">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Phí thanh toán</label>
            <div class="relative">
                <input type="number" name="phi" id="payment-phi" class="w-full px-3 py-2 border border-gray-300 rounded-xl pr-10 focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" value="0" min="0">
                <span class="absolute right-3 top-2.5 text-gray-500 text-sm">đ</span>
            </div>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Trạng thái</label>
            <select name="trang_thai" id="payment-trang_thai" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] bg-white">
                <option value="1">Đang bật</option>
                <option value="0">Tắt</option>
            </select>
        </div>
    </form>
    <div class="p-5 border-t border-gray-200 bg-white">
        <button onclick="submitPayment()" class="w-full py-2.5 bg-[#6B0D18] text-white rounded-xl font-bold shadow-md hover:bg-red-900 transition-colors">Lưu phương thức</button>
    </div>
</div>

<!-- 2. Drawer: Thêm/Sửa Tài khoản ngân hàng -->
<div id="drawerBank" class="fixed top-0 right-0 bottom-0 w-full max-w-md bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <div class="px-5 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-900 text-lg" id="drawerBankTitle">Thêm tài khoản ngân hàng</h3>
        <button onclick="closeDrawer('drawerBank')" class="text-gray-400 hover:text-red-500 transition-colors">
            <span class="iconify text-2xl" data-icon="mdi:close"></span>
        </button>
    </div>
    <form id="formBank" class="flex-1 overflow-y-auto p-5 space-y-5" onsubmit="return false;" enctype="multipart/form-data">
        <input type="hidden" name="id" id="bank-id">
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Ngân hàng <span class="text-red-500">*</span></label>
            <input type="text" name="ten_ngan_hang" id="bank-ten_ngan_hang" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: Vietcombank" required>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Chủ tài khoản <span class="text-red-500">*</span></label>
            <input type="text" name="chu_tai_khoan" id="bank-chu_tai_khoan" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: NGUYEN VAN A" required>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Số tài khoản <span class="text-red-500">*</span></label>
            <input type="text" name="so_tai_khoan" id="bank-so_tai_khoan" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" required>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Chi nhánh</label>
            <input type="text" name="chi_nhanh" id="bank-chi_nhanh" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Mã QR (Tùy chọn)</label>
            <input type="file" name="qr_image" id="bank-qr_image" class="w-full px-3 py-1.5 border border-gray-300 rounded-xl text-sm" accept="image/*">
        </div>
        <div class="space-y-1">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="la_mac_dinh" id="bank-la_mac_dinh" value="1" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                <span class="text-sm font-medium text-gray-900">Đặt làm tài khoản mặc định</span>
            </label>
        </div>
    </form>
    <div class="p-5 border-t border-gray-200 bg-white">
        <button onclick="submitBank()" class="w-full py-2.5 bg-[#6B0D18] text-white rounded-xl font-bold shadow-md hover:bg-red-900 transition-colors">Lưu tài khoản</button>
    </div>
</div>

<!-- 3. Drawer: Thêm/Sửa Phương thức vận chuyển -->
<div id="drawerShipping" class="fixed top-0 right-0 bottom-0 w-full max-w-md bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <div class="px-5 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-900 text-lg" id="drawerShippingTitle">Thêm phương thức vận chuyển</h3>
        <button onclick="closeDrawer('drawerShipping')" class="text-gray-400 hover:text-red-500 transition-colors">
            <span class="iconify text-2xl" data-icon="mdi:close"></span>
        </button>
    </div>
    <form id="formShipping" class="flex-1 overflow-y-auto p-5 space-y-5" onsubmit="return false;">
        <input type="hidden" name="id" id="shipping-id">
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Mã phương thức <span class="text-red-500">*</span></label>
            <input type="text" name="ma" id="shipping-ma" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: EXPRESS" required>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Tên phương thức <span class="text-red-500">*</span></label>
            <input type="text" name="ten" id="shipping-ten" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" required>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Mô tả</label>
            <textarea rows="2" name="mo_ta" id="shipping-mo_ta" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Khu vực</label>
                <input type="text" name="khu_vuc" id="shipping-khu_vuc" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" value="Toàn quốc">
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Thời gian dự kiến</label>
                <input type="text" name="thoi_gian" id="shipping-thoi_gian" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: 2 - 5 ngày">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Phí mặc định</label>
                <div class="relative">
                    <input type="number" name="phi_mac_dinh" id="shipping-phi_mac_dinh" class="w-full px-3 py-2 border border-gray-300 rounded-xl pr-10 focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" value="0" min="0">
                    <span class="absolute right-3 top-2.5 text-gray-500 text-sm">đ</span>
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Freeship từ</label>
                <div class="relative">
                    <input type="number" name="freeship_tu" id="shipping-freeship_tu" class="w-full px-3 py-2 border border-gray-300 rounded-xl pr-10 focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" value="0" min="0">
                    <span class="absolute right-3 top-2.5 text-gray-500 text-sm">đ</span>
                </div>
            </div>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Trạng thái</label>
            <select name="trang_thai" id="shipping-trang_thai" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] bg-white">
                <option value="1">Đang bật</option>
                <option value="0">Tắt</option>
            </select>
        </div>
    </form>
    <div class="p-5 border-t border-gray-200 bg-white">
        <button onclick="submitShipping()" class="w-full py-2.5 bg-[#6B0D18] text-white rounded-xl font-bold shadow-md hover:bg-red-900 transition-colors">Lưu phương thức</button>
    </div>
</div>

<!-- 4. Drawer: Thêm/Sửa Khu vực giao hàng -->
<div id="drawerZone" class="fixed top-0 right-0 bottom-0 w-full max-w-md bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <div class="px-5 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-900 text-lg" id="drawerZoneTitle">Thêm khu vực giao hàng</h3>
        <button onclick="closeDrawer('drawerZone')" class="text-gray-400 hover:text-red-500 transition-colors">
            <span class="iconify text-2xl" data-icon="mdi:close"></span>
        </button>
    </div>
    <form id="formZone" class="flex-1 overflow-y-auto p-5 space-y-5" onsubmit="return false;">
        <input type="hidden" name="id" id="zone-id">
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Tên khu vực <span class="text-red-500">*</span></label>
            <input type="text" name="ten" id="zone-ten" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: Nội thành Hà Nội" required>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Danh sách tỉnh/quận</label>
            <textarea rows="3" name="danh_sach_tinh" id="zone-danh_sach_tinh" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="Liệt kê tỉnh/quận cách nhau bằng dấu phẩy"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Phí tiêu chuẩn</label>
                <div class="relative">
                    <input type="number" name="phi_tieu_chuan" id="zone-phi_tieu_chuan" class="w-full px-3 py-2 border border-gray-300 rounded-xl pr-10 focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" value="0" min="0">
                    <span class="absolute right-3 top-2.5 text-gray-500 text-sm">đ</span>
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Phí nhanh</label>
                <div class="relative">
                    <input type="number" name="phi_nhanh" id="zone-phi_nhanh" class="w-full px-3 py-2 border border-gray-300 rounded-xl pr-10 focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" value="0" min="0">
                    <span class="absolute right-3 top-2.5 text-gray-500 text-sm">đ</span>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Freeship từ</label>
                <div class="relative">
                    <input type="number" name="freeship_tu" id="zone-freeship_tu" class="w-full px-3 py-2 border border-gray-300 rounded-xl pr-10 focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" value="0" min="0">
                    <span class="absolute right-3 top-2.5 text-gray-500 text-sm">đ</span>
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Thời gian giao</label>
                <input type="text" name="thoi_gian" id="zone-thoi_gian" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: 1 - 2 ngày">
            </div>
        </div>
    </form>
    <div class="p-5 border-t border-gray-200 bg-white">
        <button onclick="submitZone()" class="w-full py-2.5 bg-[#6B0D18] text-white rounded-xl font-bold shadow-md hover:bg-red-900 transition-colors">Lưu khu vực</button>
    </div>
</div>

<!-- 5. Drawer: Thêm/Sửa Quy tắc Freeship -->
<div id="drawerFreeship" class="fixed top-0 right-0 bottom-0 w-full max-w-md bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <div class="px-5 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-900 text-lg" id="drawerFreeshipTitle">Thêm quy tắc Freeship</h3>
        <button onclick="closeDrawer('drawerFreeship')" class="text-gray-400 hover:text-red-500 transition-colors">
            <span class="iconify text-2xl" data-icon="mdi:close"></span>
        </button>
    </div>
    <form id="formFreeship" class="flex-1 overflow-y-auto p-5 space-y-5" onsubmit="return false;">
        <input type="hidden" name="id" id="freeship-id">
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Tên quy tắc <span class="text-red-500">*</span></label>
            <input type="text" name="ten" id="freeship-ten" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: Freeship đơn từ 500K" required>
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Khu vực áp dụng</label>
            <input type="text" name="khu_vuc_ap_dung" id="freeship-khu_vuc_ap_dung" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: Áp dụng toàn quốc">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Điều kiện</label>
            <input type="text" name="dieu_kien" id="freeship-dieu_kien" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="VD: Đơn từ 500.000đ">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Trạng thái</label>
            <select name="trang_thai" id="freeship-trang_thai" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] bg-white">
                <option value="1">Đang bật</option>
                <option value="0">Tắt</option>
            </select>
        </div>
    </form>
    <div class="p-5 border-t border-gray-200 bg-white">
        <button onclick="submitFreeship()" class="w-full py-2.5 bg-[#6B0D18] text-white rounded-xl font-bold shadow-md hover:bg-red-900 transition-colors">Lưu quy tắc</button>
    </div>
</div>

<!-- Confirm Delete Modal -->
<div id="modalConfirmDelete" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm mx-4 p-6 text-center">
        <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-red-600 text-3xl" data-icon="mdi:trash-can-outline"></span>
        </div>
        <h3 class="font-bold text-gray-900 text-lg mb-2">Xác nhận xóa?</h3>
        <p class="text-gray-500 text-sm mb-6" id="deleteConfirmMsg">Bạn có chắc muốn xóa mục này? Hành động không thể hoàn tác.</p>
        <div class="flex gap-3">
            <button onclick="closeDeleteModal()" class="flex-1 py-2.5 bg-gray-100 text-gray-700 rounded-xl font-medium hover:bg-gray-200 transition-colors">Hủy</button>
            <button onclick="confirmDelete()" class="flex-1 py-2.5 bg-red-600 text-white rounded-xl font-bold hover:bg-red-700 transition-colors">Xóa</button>
        </div>
    </div>
</div>

<script>
    const API_BASE = '<?= $apiBase ?>';
    let pendingDeleteAction = null;

    // ==================== DRAWER CONTROLS ====================
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
        ['drawerPayment', 'drawerBank', 'drawerShipping', 'drawerZone', 'drawerFreeship'].forEach(id => {
            const drawer = document.getElementById(id);
            if(drawer) drawer.classList.add('translate-x-full');
        });
        const backdrop = document.getElementById('drawerBackdrop');
        backdrop.classList.add('opacity-0');
        setTimeout(() => backdrop.classList.add('hidden'), 300);
    }

    // ==================== EDIT helpers ====================
    function editPayment(id, data) {
        document.getElementById('drawerPaymentTitle').textContent = 'Sửa phương thức thanh toán';
        document.getElementById('payment-id').value = id;
        document.getElementById('payment-ma').value = data.ma;
        document.getElementById('payment-ma').disabled = true;
        document.getElementById('payment-ten').value = data.ten;
        document.getElementById('payment-mo_ta').value = data.mo_ta || '';
        document.getElementById('payment-dieu_kien').value = data.dieu_kien || '';
        document.getElementById('payment-phi').value = data.phi || 0;
        document.getElementById('payment-trang_thai').value = data.trang_thai;
        openDrawer('drawerPayment');
    }

    function addPayment() {
        document.getElementById('drawerPaymentTitle').textContent = 'Thêm phương thức thanh toán';
        document.getElementById('formPayment').reset();
        document.getElementById('payment-id').value = '';
        document.getElementById('payment-ma').disabled = false;
        openDrawer('drawerPayment');
    }

    function editBank(id, data) {
        document.getElementById('drawerBankTitle').textContent = 'Sửa tài khoản ngân hàng';
        document.getElementById('bank-id').value = id;
        document.getElementById('bank-ten_ngan_hang').value = data.ten_ngan_hang;
        document.getElementById('bank-chu_tai_khoan').value = data.chu_tai_khoan;
        document.getElementById('bank-so_tai_khoan').value = data.so_tai_khoan;
        document.getElementById('bank-chi_nhanh').value = data.chi_nhanh || '';
        document.getElementById('bank-la_mac_dinh').checked = data.la_mac_dinh == 1;
        openDrawer('drawerBank');
    }

    function addBank() {
        document.getElementById('drawerBankTitle').textContent = 'Thêm tài khoản ngân hàng';
        document.getElementById('formBank').reset();
        document.getElementById('bank-id').value = '';
        openDrawer('drawerBank');
    }

    function editShipping(id, data) {
        document.getElementById('drawerShippingTitle').textContent = 'Sửa phương thức vận chuyển';
        document.getElementById('shipping-id').value = id;
        document.getElementById('shipping-ma').value = data.ma;
        document.getElementById('shipping-ma').disabled = true;
        document.getElementById('shipping-ten').value = data.ten;
        document.getElementById('shipping-mo_ta').value = data.mo_ta || '';
        document.getElementById('shipping-khu_vuc').value = data.khu_vuc || 'Toàn quốc';
        document.getElementById('shipping-thoi_gian').value = data.thoi_gian || '';
        document.getElementById('shipping-phi_mac_dinh').value = data.phi_mac_dinh || 0;
        document.getElementById('shipping-freeship_tu').value = data.freeship_tu || 0;
        document.getElementById('shipping-trang_thai').value = data.trang_thai;
        openDrawer('drawerShipping');
    }

    function addShipping() {
        document.getElementById('drawerShippingTitle').textContent = 'Thêm phương thức vận chuyển';
        document.getElementById('formShipping').reset();
        document.getElementById('shipping-id').value = '';
        document.getElementById('shipping-ma').disabled = false;
        openDrawer('drawerShipping');
    }

    function editZone(id, data) {
        document.getElementById('drawerZoneTitle').textContent = 'Sửa khu vực giao hàng';
        document.getElementById('zone-id').value = id;
        document.getElementById('zone-ten').value = data.ten;
        document.getElementById('zone-danh_sach_tinh').value = data.danh_sach_tinh || '';
        document.getElementById('zone-phi_tieu_chuan').value = data.phi_tieu_chuan || 0;
        document.getElementById('zone-phi_nhanh').value = data.phi_nhanh || 0;
        document.getElementById('zone-freeship_tu').value = data.freeship_tu || 0;
        document.getElementById('zone-thoi_gian').value = data.thoi_gian || '';
        openDrawer('drawerZone');
    }

    function addZone() {
        document.getElementById('drawerZoneTitle').textContent = 'Thêm khu vực giao hàng';
        document.getElementById('formZone').reset();
        document.getElementById('zone-id').value = '';
        openDrawer('drawerZone');
    }

    function editFreeship(id, data) {
        document.getElementById('drawerFreeshipTitle').textContent = 'Sửa quy tắc Freeship';
        document.getElementById('freeship-id').value = id;
        document.getElementById('freeship-ten').value = data.ten;
        document.getElementById('freeship-khu_vuc_ap_dung').value = data.khu_vuc_ap_dung || '';
        document.getElementById('freeship-dieu_kien').value = data.dieu_kien || '';
        document.getElementById('freeship-trang_thai').value = data.trang_thai;
        openDrawer('drawerFreeship');
    }

    function addFreeship() {
        document.getElementById('drawerFreeshipTitle').textContent = 'Thêm quy tắc Freeship';
        document.getElementById('formFreeship').reset();
        document.getElementById('freeship-id').value = '';
        openDrawer('drawerFreeship');
    }

    // ==================== SUBMIT functions ====================
    function submitPayment() {
        const form = document.getElementById('formPayment');
        const fd = new FormData(form);
        if (!fd.get('ten')) { showToast('Vui lòng nhập tên phương thức.', 'error'); return; }
        fetch(API_BASE + '/payment/save', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(d => { showToast(d.message, d.success ? 'success' : 'error'); if(d.success) { closeDrawer('drawerPayment'); location.reload(); } })
            .catch(() => showToast('Lỗi kết nối.', 'error'));
    }

    function submitBank() {
        const form = document.getElementById('formBank');
        const fd = new FormData(form);
        if (!fd.get('ten_ngan_hang')) { showToast('Vui lòng nhập tên ngân hàng.', 'error'); return; }
        fetch(API_BASE + '/bank/save', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(d => { showToast(d.message, d.success ? 'success' : 'error'); if(d.success) { closeDrawer('drawerBank'); location.reload(); } })
            .catch(() => showToast('Lỗi kết nối.', 'error'));
    }

    function submitShipping() {
        const form = document.getElementById('formShipping');
        const fd = new FormData(form);
        if (!fd.get('ten')) { showToast('Vui lòng nhập tên phương thức.', 'error'); return; }
        fetch(API_BASE + '/shipping/save', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(d => { showToast(d.message, d.success ? 'success' : 'error'); if(d.success) { closeDrawer('drawerShipping'); location.reload(); } })
            .catch(() => showToast('Lỗi kết nối.', 'error'));
    }

    function submitZone() {
        const form = document.getElementById('formZone');
        const fd = new FormData(form);
        if (!fd.get('ten')) { showToast('Vui lòng nhập tên khu vực.', 'error'); return; }
        fetch(API_BASE + '/zone/save', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(d => { showToast(d.message, d.success ? 'success' : 'error'); if(d.success) { closeDrawer('drawerZone'); location.reload(); } })
            .catch(() => showToast('Lỗi kết nối.', 'error'));
    }

    function submitFreeship() {
        const form = document.getElementById('formFreeship');
        const fd = new FormData(form);
        if (!fd.get('ten')) { showToast('Vui lòng nhập tên quy tắc.', 'error'); return; }
        fetch(API_BASE + '/freeship/save', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(d => { showToast(d.message, d.success ? 'success' : 'error'); if(d.success) { closeDrawer('drawerFreeship'); location.reload(); } })
            .catch(() => showToast('Lỗi kết nối.', 'error'));
    }

    // ==================== TOGGLE ====================
    function toggleEntity(entity, id) {
        fetch(API_BASE + '/' + entity + '/toggle', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({id: id})
        }).then(r => r.json()).then(d => {
            showToast(d.message, d.success ? 'success' : 'error');
        }).catch(() => showToast('Lỗi kết nối.', 'error'));
    }

    // ==================== DELETE ====================
    function requestDelete(entity, id, label) {
        document.getElementById('deleteConfirmMsg').textContent = 'Bạn có chắc muốn xóa "' + label + '"? Hành động không thể hoàn tác.';
        document.getElementById('modalConfirmDelete').classList.remove('hidden');
        document.getElementById('modalConfirmDelete').classList.add('flex');
        pendingDeleteAction = { entity, id };
    }

    function closeDeleteModal() {
        document.getElementById('modalConfirmDelete').classList.add('hidden');
        document.getElementById('modalConfirmDelete').classList.remove('flex');
        pendingDeleteAction = null;
    }

    function confirmDelete() {
        if (!pendingDeleteAction) return;
        const { entity, id } = pendingDeleteAction;
        fetch(API_BASE + '/' + entity + '/delete', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({id: id})
        }).then(r => r.json()).then(d => {
            closeDeleteModal();
            showToast(d.message, d.success ? 'success' : 'error');
            if(d.success) location.reload();
        }).catch(() => { closeDeleteModal(); showToast('Lỗi kết nối.', 'error'); });
    }

    function setDefaultBank(id) {
        fetch(API_BASE + '/bank/set-default', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({id: id})
        }).then(r => r.json()).then(d => {
            showToast(d.message, d.success ? 'success' : 'error');
            if(d.success) location.reload();
        }).catch(() => showToast('Lỗi kết nối.', 'error'));
    }
</script>
