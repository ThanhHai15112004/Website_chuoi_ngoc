<?php
// views/components/Admin/quan_ly_cua_hang/form_address.php
?>
<div class="bg-white rounded-[20px] border border-gray-200 shadow-sm overflow-hidden" id="section-address">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="iconify text-gray-400 text-xl" data-icon="mdi:map-marker-outline"></span>
            <h2 class="font-bold text-gray-900 text-lg">Địa chỉ & Bản đồ</h2>
        </div>
        <!-- Chỉ bán online Toggle -->
        <label class="flex items-center gap-2 cursor-pointer">
            <span class="text-sm text-gray-600 font-medium">Chỉ bán online</span>
            <div class="relative">
                <input type="checkbox" id="toggle-online-only" class="sr-only" <?= ($storeConfig['chi_ban_online'] ?? false) ? 'checked' : '' ?> onchange="toggleAddressForm()">
                <div class="block bg-gray-200 w-10 h-6 rounded-full transition-colors" id="toggle-bg"></div>
                <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform" id="toggle-dot"></div>
            </div>
        </label>
    </div>
    
    <div class="p-5 md:p-6" id="address-form-container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Tỉnh / Thành phố</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18] bg-white">
                    <option value="Hà Nội" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Hà Nội' ? 'selected' : '' ?>>Hà Nội</option>
                    <option value="Hồ Chí Minh" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Hồ Chí Minh' ? 'selected' : '' ?>>TP. Hồ Chí Minh</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Quận / Huyện</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= $storeConfig['quan_huyen'] ?? '' ?>">
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Phường / Xã</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= $storeConfig['phuong_xa'] ?? '' ?>">
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Số nhà, Tên đường</label>
                <input type="text" id="inp-diachi" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= $storeConfig['dia_chi_chi_tiet'] ?? '' ?>">
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Google Maps Iframe / Link</label>
            <div class="flex gap-2">
                <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" placeholder="Nhập thẻ <iframe> từ Google Maps...">
                <button type="button" class="px-4 py-2 bg-gray-100 border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-200 transition-colors text-sm font-medium whitespace-nowrap">Kiểm tra bản đồ</button>
            </div>
            
            <!-- Map Preview Mock -->
            <div class="mt-3 h-48 bg-gray-100 rounded-xl border border-gray-200 flex flex-col items-center justify-center relative overflow-hidden group">
                <div class="absolute inset-0 bg-[url('https://www.google.com/maps/d/thumbnail?mid=1vXy44-h2Vw_t3z4qY0uE-c36b6w&hl=en')] bg-cover bg-center opacity-50"></div>
                <div class="relative z-10 flex flex-col items-center">
                    <span class="iconify text-red-600 text-4xl mb-1 drop-shadow-md" data-icon="mdi:map-marker"></span>
                    <p class="text-sm font-bold text-gray-900 bg-white/90 px-3 py-1 rounded-full shadow-sm">123 Xuân Thủy, Cầu Giấy, Hà Nội</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="p-5 md:p-6 bg-blue-50/50 hidden" id="online-only-message">
        <div class="flex items-start gap-3">
            <span class="iconify text-blue-500 text-xl mt-0.5" data-icon="mdi:information"></span>
            <div>
                <h4 class="font-bold text-blue-900 text-sm">Chế độ Chỉ bán online đang bật</h4>
                <p class="text-sm text-blue-800 mt-1">Hệ thống sẽ ẩn địa chỉ chi tiết và bản đồ trên toàn bộ giao diện website (Footer, trang Liên hệ). Khách hàng vẫn có thể thấy Khu vực hoạt động (Ví dụ: Hà Nội).</p>
            </div>
        </div>
    </div>
</div>

<style>
    /* CSS for Toggle Switch */
    input:checked + #toggle-bg { background-color: #6B0D18; }
    input:checked ~ #toggle-dot { transform: translateX(100%); }
</style>

<script>
    function toggleAddressForm() {
        const isOnlineOnly = document.getElementById('toggle-online-only').checked;
        const formContainer = document.getElementById('address-form-container');
        const messageContainer = document.getElementById('online-only-message');

        if (isOnlineOnly) {
            formContainer.classList.add('opacity-50', 'pointer-events-none');
            messageContainer.classList.remove('hidden');
        } else {
            formContainer.classList.remove('opacity-50', 'pointer-events-none');
            messageContainer.classList.add('hidden');
        }
    }
    // Initialize state on load
    document.addEventListener('DOMContentLoaded', toggleAddressForm);
</script>
