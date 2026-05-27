<?php
// views/components/Admin/quan_ly_cua_hang/preview_panel.php
?>
<div class="sticky top-6">
    <div class="bg-white rounded-[20px] border border-gray-200 shadow-sm overflow-hidden flex flex-col h-[calc(100vh-120px)] min-h-[600px]">
        <!-- Panel Header -->
        <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50">
            <div class="flex items-center gap-2 mb-3">
                <span class="iconify text-gray-400 text-xl" data-icon="mdi:eye-outline"></span>
                <h2 class="font-bold text-gray-900 text-lg">Xem trước hiển thị</h2>
            </div>
            
            <!-- Tabs -->
            <div class="flex gap-1 bg-gray-200/50 p-1 rounded-lg overflow-x-auto hide-scrollbar">
                <button type="button" onclick="switchPreviewTab('footer')" id="tab-footer" class="preview-tab active flex-1 px-3 py-1.5 text-xs font-medium rounded-md whitespace-nowrap transition-colors bg-white text-[#6B0D18] shadow-sm">Footer</button>
                <button type="button" onclick="switchPreviewTab('contact')" id="tab-contact" class="preview-tab flex-1 px-3 py-1.5 text-xs font-medium rounded-md whitespace-nowrap text-gray-600 hover:text-gray-900 transition-colors">Liên hệ</button>
                <button type="button" onclick="switchPreviewTab('email')" id="tab-email" class="preview-tab flex-1 px-3 py-1.5 text-xs font-medium rounded-md whitespace-nowrap text-gray-600 hover:text-gray-900 transition-colors">Email</button>
            </div>
        </div>
        
        <!-- Preview Content Area -->
        <div class="flex-1 overflow-y-auto bg-[#f8f9fa] p-4 relative" id="preview-container">
            
            <!-- 1. Footer Preview -->
            <div id="preview-footer" class="preview-content">
                <div class="bg-[#1a1a1a] text-gray-300 p-6 rounded-xl text-sm shadow-lg border border-gray-800">
                    <img src="<?= APP_URL ?>/public/images/logo_placeholder.png" class="h-8 mb-4 brightness-0 invert opacity-80" alt="Logo">
                    <h3 class="text-white font-bold text-base mb-1" id="prev-ft-ten"><?= $storeConfig['ten_cua_hang'] ?></h3>
                    <p class="text-gray-400 text-xs mb-4 italic" id="prev-ft-slogan"><?= $storeConfig['slogan'] ?></p>
                    
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start gap-3">
                            <span class="iconify mt-0.5 text-gray-500 shrink-0" data-icon="mdi:map-marker"></span>
                            <span id="prev-ft-diachi"><?= $storeConfig['dia_chi_chi_tiet'] . ', ' . $storeConfig['phuong_xa'] . ', ' . $storeConfig['quan_huyen'] . ', ' . $storeConfig['tinh_thanh'] ?></span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="iconify text-gray-500 shrink-0" data-icon="mdi:phone"></span>
                            <span id="prev-ft-hotline"><?= $storeConfig['hotline_chinh'] ?></span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="iconify text-gray-500 shrink-0" data-icon="mdi:email"></span>
                            <span id="prev-ft-email"><?= $storeConfig['email'] ?></span>
                        </li>
                    </ul>
                    
                    <div class="flex gap-3">
                        <div class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-white"><span class="iconify" data-icon="mdi:facebook"></span></div>
                        <div class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-white"><span class="iconify" data-icon="mdi:music-note"></span></div>
                        <div class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-white"><span class="iconify" data-icon="mdi:chat-processing"></span></div>
                    </div>
                </div>
            </div>

            <!-- 2. Trang liên hệ Preview -->
            <div id="preview-contact" class="preview-content hidden">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="h-32 bg-gray-200 relative">
                        <div class="absolute inset-0 flex items-center justify-center text-gray-400 flex-col">
                            <span class="iconify text-3xl mb-1" data-icon="mdi:map"></span>
                            <span class="text-xs">Bản đồ Google Maps</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-gray-900 text-lg mb-4" id="prev-ct-ten"><?= $storeConfig['ten_cua_hang'] ?></h3>
                        <div class="space-y-4 text-sm text-gray-600">
                            <div>
                                <p class="font-medium text-gray-900 mb-1">Địa chỉ cửa hàng:</p>
                                <p id="prev-ct-diachi"><?= $storeConfig['dia_chi_chi_tiet'] . ', ' . $storeConfig['tinh_thanh'] ?></p>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900 mb-1">Thời gian hoạt động:</p>
                                <p id="prev-ct-giolam"><?= $storeConfig['gio_lam_viec'] ?></p>
                            </div>
                            <div class="pt-4 border-t border-gray-100 flex gap-2">
                                <button class="flex-1 py-2 bg-[#6B0D18] text-white rounded-lg text-xs font-bold text-center">Gọi điện</button>
                                <button class="flex-1 py-2 bg-[#0068FF] text-white rounded-lg text-xs font-bold text-center">Chat Zalo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Email Preview -->
            <div id="preview-email" class="preview-content hidden">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 text-center max-w-sm mx-auto mt-4">
                    <img src="<?= APP_URL ?>/public/images/logo_placeholder.png" class="h-10 mx-auto mb-4" alt="Logo">
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Cảm ơn bạn đã đặt hàng!</h3>
                    <p class="text-sm text-gray-500 mb-6">Xin chào Nguyễn Văn A, đơn hàng #DH12345 của bạn đã được tiếp nhận và đang chờ xử lý.</p>
                    
                    <div class="bg-gray-50 rounded-lg p-4 text-sm text-left border border-gray-100 mb-6">
                        <p class="font-medium text-gray-900 mb-2">Nếu cần hỗ trợ gấp:</p>
                        <p class="text-gray-600 flex items-center gap-2 mb-1"><span class="iconify" data-icon="mdi:phone"></span> <span id="prev-em-hotline"><?= $storeConfig['hotline_chinh'] ?></span></p>
                        <p class="text-gray-600 flex items-center gap-2"><span class="iconify" data-icon="mdi:email"></span> <span id="prev-em-email"><?= $storeConfig['email'] ?></span></p>
                    </div>
                    
                    <p class="text-xs text-gray-400 mt-4 border-t border-gray-100 pt-4" id="prev-em-ten">&copy; 2026 <?= $storeConfig['ten_cua_hang'] ?>. All rights reserved.</p>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
    function switchPreviewTab(tabId) {
        // Cập nhật styles cho tabs
        document.querySelectorAll('.preview-tab').forEach(tab => {
            tab.classList.remove('bg-white', 'text-[#6B0D18]', 'shadow-sm', 'active');
            tab.classList.add('text-gray-600', 'hover:text-gray-900');
        });
        const activeTab = document.getElementById('tab-' + tabId);
        activeTab.classList.add('bg-white', 'text-[#6B0D18]', 'shadow-sm', 'active');
        activeTab.classList.remove('text-gray-600', 'hover:text-gray-900');

        // Hiển thị nội dung tương ứng
        document.querySelectorAll('.preview-content').forEach(content => {
            content.classList.add('hidden');
        });
        document.getElementById('preview-' + tabId).classList.remove('hidden');
    }

    // Hàm update preview theo real-time
    function updatePreview() {
        // Lấy giá trị từ các input
        const ten = document.getElementById('inp-ten')?.value || 'Tên cửa hàng';
        const slogan = document.getElementById('inp-slogan')?.value || '';
        const diachi = document.getElementById('inp-diachi')?.value || 'Địa chỉ';
        const hotline = document.getElementById('inp-hotline')?.value || 'Hotline';
        const email = document.getElementById('inp-email')?.value || 'Email';
        const giolam = document.getElementById('inp-giolamviec')?.value || 'Giờ làm việc';

        // Cập nhật Footer
        if(document.getElementById('prev-ft-ten')) document.getElementById('prev-ft-ten').textContent = ten;
        if(document.getElementById('prev-ft-slogan')) document.getElementById('prev-ft-slogan').textContent = slogan;
        if(document.getElementById('prev-ft-diachi')) document.getElementById('prev-ft-diachi').textContent = diachi;
        if(document.getElementById('prev-ft-hotline')) document.getElementById('prev-ft-hotline').textContent = hotline;
        if(document.getElementById('prev-ft-email')) document.getElementById('prev-ft-email').textContent = email;

        // Cập nhật Contact
        if(document.getElementById('prev-ct-ten')) document.getElementById('prev-ct-ten').textContent = ten;
        if(document.getElementById('prev-ct-diachi')) document.getElementById('prev-ct-diachi').textContent = diachi;
        if(document.getElementById('prev-ct-giolam')) document.getElementById('prev-ct-giolam').textContent = giolam;

        // Cập nhật Email
        if(document.getElementById('prev-em-hotline')) document.getElementById('prev-em-hotline').textContent = hotline;
        if(document.getElementById('prev-em-email')) document.getElementById('prev-em-email').textContent = email;
        if(document.getElementById('prev-em-ten')) document.getElementById('prev-em-ten').textContent = '© 2026 ' + ten + '. All rights reserved.';
    }
</script>
