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
                <input type="hidden" name="chi_ban_online" value="0">
                <input type="checkbox" name="chi_ban_online" value="1" id="toggle-online-only" class="sr-only" <?= ($storeConfig['chi_ban_online'] ?? '0') === '1' ? 'checked' : '' ?> onchange="toggleAddressForm()">
                <div class="block bg-gray-200 w-10 h-6 rounded-full transition-colors" id="toggle-bg"></div>
                <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform" id="toggle-dot"></div>
            </div>
        </label>
    </div>
    
    <div class="p-5 md:p-6" id="address-form-container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Tỉnh / Thành phố</label>
                <select name="tinh_thanh" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18] bg-white">
                    <option value="">-- Chọn tỉnh/thành --</option>
                    <option value="Hà Nội" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Hà Nội' ? 'selected' : '' ?>>Hà Nội</option>
                    <option value="Hồ Chí Minh" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Hồ Chí Minh' ? 'selected' : '' ?>>TP. Hồ Chí Minh</option>
                    <option value="Đà Nẵng" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Đà Nẵng' ? 'selected' : '' ?>>Đà Nẵng</option>
                    <option value="Hải Phòng" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Hải Phòng' ? 'selected' : '' ?>>Hải Phòng</option>
                    <option value="Cần Thơ" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Cần Thơ' ? 'selected' : '' ?>>Cần Thơ</option>
                    <option value="An Giang" <?= ($storeConfig['tinh_thanh'] ?? '') == 'An Giang' ? 'selected' : '' ?>>An Giang</option>
                    <option value="Bà Rịa - Vũng Tàu" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Bà Rịa - Vũng Tàu' ? 'selected' : '' ?>>Bà Rịa - Vũng Tàu</option>
                    <option value="Bắc Giang" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Bắc Giang' ? 'selected' : '' ?>>Bắc Giang</option>
                    <option value="Bắc Kạn" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Bắc Kạn' ? 'selected' : '' ?>>Bắc Kạn</option>
                    <option value="Bạc Liêu" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Bạc Liêu' ? 'selected' : '' ?>>Bạc Liêu</option>
                    <option value="Bắc Ninh" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Bắc Ninh' ? 'selected' : '' ?>>Bắc Ninh</option>
                    <option value="Bến Tre" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Bến Tre' ? 'selected' : '' ?>>Bến Tre</option>
                    <option value="Bình Định" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Bình Định' ? 'selected' : '' ?>>Bình Định</option>
                    <option value="Bình Dương" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Bình Dương' ? 'selected' : '' ?>>Bình Dương</option>
                    <option value="Bình Phước" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Bình Phước' ? 'selected' : '' ?>>Bình Phước</option>
                    <option value="Bình Thuận" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Bình Thuận' ? 'selected' : '' ?>>Bình Thuận</option>
                    <option value="Cà Mau" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Cà Mau' ? 'selected' : '' ?>>Cà Mau</option>
                    <option value="Cao Bằng" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Cao Bằng' ? 'selected' : '' ?>>Cao Bằng</option>
                    <option value="Đắk Lắk" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Đắk Lắk' ? 'selected' : '' ?>>Đắk Lắk</option>
                    <option value="Đắk Nông" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Đắk Nông' ? 'selected' : '' ?>>Đắk Nông</option>
                    <option value="Điện Biên" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Điện Biên' ? 'selected' : '' ?>>Điện Biên</option>
                    <option value="Đồng Nai" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Đồng Nai' ? 'selected' : '' ?>>Đồng Nai</option>
                    <option value="Đồng Tháp" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Đồng Tháp' ? 'selected' : '' ?>>Đồng Tháp</option>
                    <option value="Gia Lai" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Gia Lai' ? 'selected' : '' ?>>Gia Lai</option>
                    <option value="Hà Giang" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Hà Giang' ? 'selected' : '' ?>>Hà Giang</option>
                    <option value="Hà Nam" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Hà Nam' ? 'selected' : '' ?>>Hà Nam</option>
                    <option value="Hà Tĩnh" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Hà Tĩnh' ? 'selected' : '' ?>>Hà Tĩnh</option>
                    <option value="Hậu Giang" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Hậu Giang' ? 'selected' : '' ?>>Hậu Giang</option>
                    <option value="Hoà Bình" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Hoà Bình' ? 'selected' : '' ?>>Hoà Bình</option>
                    <option value="Hưng Yên" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Hưng Yên' ? 'selected' : '' ?>>Hưng Yên</option>
                    <option value="Khánh Hòa" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Khánh Hòa' ? 'selected' : '' ?>>Khánh Hòa</option>
                    <option value="Kiên Giang" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Kiên Giang' ? 'selected' : '' ?>>Kiên Giang</option>
                    <option value="Kon Tum" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Kon Tum' ? 'selected' : '' ?>>Kon Tum</option>
                    <option value="Lai Châu" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Lai Châu' ? 'selected' : '' ?>>Lai Châu</option>
                    <option value="Lâm Đồng" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Lâm Đồng' ? 'selected' : '' ?>>Lâm Đồng</option>
                    <option value="Lạng Sơn" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Lạng Sơn' ? 'selected' : '' ?>>Lạng Sơn</option>
                    <option value="Lào Cai" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Lào Cai' ? 'selected' : '' ?>>Lào Cai</option>
                    <option value="Long An" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Long An' ? 'selected' : '' ?>>Long An</option>
                    <option value="Nam Định" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Nam Định' ? 'selected' : '' ?>>Nam Định</option>
                    <option value="Nghệ An" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Nghệ An' ? 'selected' : '' ?>>Nghệ An</option>
                    <option value="Ninh Bình" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Ninh Bình' ? 'selected' : '' ?>>Ninh Bình</option>
                    <option value="Ninh Thuận" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Ninh Thuận' ? 'selected' : '' ?>>Ninh Thuận</option>
                    <option value="Phú Thọ" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Phú Thọ' ? 'selected' : '' ?>>Phú Thọ</option>
                    <option value="Phú Yên" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Phú Yên' ? 'selected' : '' ?>>Phú Yên</option>
                    <option value="Quảng Bình" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Quảng Bình' ? 'selected' : '' ?>>Quảng Bình</option>
                    <option value="Quảng Nam" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Quảng Nam' ? 'selected' : '' ?>>Quảng Nam</option>
                    <option value="Quảng Ngãi" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Quảng Ngãi' ? 'selected' : '' ?>>Quảng Ngãi</option>
                    <option value="Quảng Ninh" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Quảng Ninh' ? 'selected' : '' ?>>Quảng Ninh</option>
                    <option value="Quảng Trị" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Quảng Trị' ? 'selected' : '' ?>>Quảng Trị</option>
                    <option value="Sóc Trăng" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Sóc Trăng' ? 'selected' : '' ?>>Sóc Trăng</option>
                    <option value="Sơn La" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Sơn La' ? 'selected' : '' ?>>Sơn La</option>
                    <option value="Tây Ninh" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Tây Ninh' ? 'selected' : '' ?>>Tây Ninh</option>
                    <option value="Thái Bình" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Thái Bình' ? 'selected' : '' ?>>Thái Bình</option>
                    <option value="Thái Nguyên" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Thái Nguyên' ? 'selected' : '' ?>>Thái Nguyên</option>
                    <option value="Thanh Hóa" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Thanh Hóa' ? 'selected' : '' ?>>Thanh Hóa</option>
                    <option value="Thừa Thiên Huế" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Thừa Thiên Huế' ? 'selected' : '' ?>>Thừa Thiên Huế</option>
                    <option value="Tiền Giang" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Tiền Giang' ? 'selected' : '' ?>>Tiền Giang</option>
                    <option value="Trà Vinh" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Trà Vinh' ? 'selected' : '' ?>>Trà Vinh</option>
                    <option value="Tuyên Quang" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Tuyên Quang' ? 'selected' : '' ?>>Tuyên Quang</option>
                    <option value="Vĩnh Long" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Vĩnh Long' ? 'selected' : '' ?>>Vĩnh Long</option>
                    <option value="Vĩnh Phúc" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Vĩnh Phúc' ? 'selected' : '' ?>>Vĩnh Phúc</option>
                    <option value="Yên Bái" <?= ($storeConfig['tinh_thanh'] ?? '') == 'Yên Bái' ? 'selected' : '' ?>>Yên Bái</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Quận / Huyện</label>
                <input type="text" name="quan_huyen" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= htmlspecialchars($storeConfig['quan_huyen'] ?? '', ENT_QUOTES) ?>">
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Phường / Xã</label>
                <input type="text" name="phuong_xa" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= htmlspecialchars($storeConfig['phuong_xa'] ?? '', ENT_QUOTES) ?>">
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Số nhà, Tên đường</label>
                <input type="text" name="dia_chi_chi_tiet" id="inp-diachi" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= htmlspecialchars($storeConfig['dia_chi_chi_tiet'] ?? '', ENT_QUOTES) ?>">
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Google Maps Iframe / Link</label>
            <div class="flex gap-2">
                <input type="text" name="google_map_iframe" id="inp-google-map" class="flex-1 px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" placeholder="Nhập thẻ <iframe> từ Google Maps..." value="<?= htmlspecialchars($storeConfig['google_map_iframe'] ?? '', ENT_QUOTES) ?>">
                <button type="button" onclick="previewMap()" class="px-4 py-2 bg-gray-100 border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-200 transition-colors text-sm font-medium whitespace-nowrap">Kiểm tra bản đồ</button>
            </div>
            
            <!-- Map Preview -->
            <div class="mt-3 h-48 bg-gray-100 rounded-xl border border-gray-200 flex flex-col items-center justify-center relative overflow-hidden group" id="map-preview-container">
                <?php 
                $mapIframe = $storeConfig['google_map_iframe'] ?? '';
                if (!empty($mapIframe) && strpos($mapIframe, '<iframe') !== false): 
                ?>
                <div class="w-full h-full" id="map-iframe-wrapper"><?= $mapIframe ?></div>
                <?php else: ?>
                <div class="relative z-10 flex flex-col items-center" id="map-placeholder">
                    <span class="iconify text-gray-400 text-4xl mb-1" data-icon="mdi:map-marker"></span>
                    <p class="text-sm text-gray-500">Dán iframe Google Maps để xem trước bản đồ</p>
                </div>
                <?php endif; ?>
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
    
    /* Make embedded iframes responsive */
    #map-iframe-wrapper iframe {
        width: 100% !important;
        height: 100% !important;
        border-radius: 0.75rem;
    }
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

    function previewMap() {
        const iframeCode = document.getElementById('inp-google-map').value.trim();
        const container = document.getElementById('map-preview-container');
        
        if (!iframeCode) {
            showToast('Vui lòng nhập mã iframe từ Google Maps.', 'error');
            return;
        }

        if (iframeCode.includes('<iframe')) {
            container.innerHTML = '<div class="w-full h-full" id="map-iframe-wrapper">' + iframeCode + '</div>';
            // Apply responsive style
            const iframe = container.querySelector('iframe');
            if (iframe) {
                iframe.style.width = '100%';
                iframe.style.height = '100%';
                iframe.style.borderRadius = '0.75rem';
            }
            showToast('Đã tải bản đồ thành công!', 'success');

            // Cập nhật preview panel liên hệ
            if (typeof updatePreviewMap === 'function') {
                updatePreviewMap();
            }
        } else {
            showToast('Mã nhúng không hợp lệ. Vui lòng dán thẻ <iframe> từ Google Maps.', 'error');
        }
    }

    // Initialize state on load
    document.addEventListener('DOMContentLoaded', toggleAddressForm);
</script>
