<?php
// views/components/Admin/banner/banner_drawer.php
?>
<!-- Overlay mờ -->
<div id="drawerOverlay" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity" onclick="closeBannerDrawer()"></div>

<!-- Slide over / Drawer -->
<div id="bannerDrawer" class="fixed inset-y-0 right-0 w-full max-w-md bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col">
    <!-- Header Drawer -->
    <div class="flex items-center justify-between p-4 border-b border-gray-100 bg-gray-50/50">
        <h3 class="text-lg font-bold text-gray-800">Chi tiết Banner</h3>
        <button onclick="closeBannerDrawer()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-200 text-gray-500 transition-colors">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>

    <!-- Nội dung cuộn -->
    <div class="flex-1 overflow-y-auto p-5 space-y-6 sidebar-scroll">
        
        <!-- Ảnh Desktop Preview -->
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <label class="text-xs font-bold text-gray-500 uppercase tracking-wider">Ảnh Desktop</label>
                <span class="text-xs text-gray-400">1920x600</span>
            </div>
            <div class="aspect-[21/9] bg-gray-100 rounded-lg border border-gray-200 overflow-hidden relative">
                <img src="<?= APP_URL ?>/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg" alt="Desktop Preview" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Ảnh Mobile Preview -->
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <label class="text-xs font-bold text-gray-500 uppercase tracking-wider">Ảnh Mobile</label>
                <span class="text-xs text-gray-400">750x900</span>
            </div>
            <div class="aspect-[4/5] w-1/2 mx-auto bg-gray-100 rounded-lg border border-gray-200 overflow-hidden relative shadow-md">
                <img src="<?= APP_URL ?>/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-2.jpg" alt="Mobile Preview" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Info List -->
        <div class="bg-gray-50/50 rounded-xl border border-gray-100 p-4 space-y-4">
            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider block mb-1">Tên banner</label>
                <div class="font-semibold text-gray-800">Flash Sale Vòng Ngọc Tháng 5</div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider block mb-1">Trạng thái</label>
                    <span class="px-2 py-0.5 bg-green-50 text-green-700 text-xs font-medium rounded border border-green-100 inline-flex">Đang hiển thị</span>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider block mb-1">Thứ tự</label>
                    <div class="text-sm font-medium text-gray-800">1</div>
                </div>
            </div>
            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider block mb-1">Vị trí hiển thị</label>
                <div class="text-sm text-gray-800 bg-white border border-gray-200 px-3 py-1.5 rounded-md inline-block">Trang chủ · Slider chính</div>
            </div>
            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider block mb-1">Thiết bị</label>
                <div class="flex items-center gap-2">
                    <span class="flex items-center gap-1.5 text-xs bg-white border border-gray-200 px-2 py-1 rounded"><span class="iconify text-gray-500" data-icon="mdi:monitor"></span> Desktop</span>
                    <span class="flex items-center gap-1.5 text-xs bg-white border border-gray-200 px-2 py-1 rounded"><span class="iconify text-gray-500" data-icon="mdi:cellphone"></span> Mobile</span>
                </div>
            </div>
            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider block mb-1">Link liên kết</label>
                <a href="#" class="text-sm text-[#6B0D18] hover:underline flex items-center gap-1">
                    /san-pham/khuyen-mai <span class="iconify text-xs" data-icon="mdi:open-in-new"></span>
                </a>
            </div>
            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider block mb-1">Thời gian hiển thị</label>
                <div class="text-sm text-gray-800 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:calendar-clock"></span>
                    01/05/2026 00:00 - 31/05/2026 23:59
                </div>
                <div class="text-xs text-green-600 mt-1 font-medium italic">Còn 5 ngày</div>
            </div>
        </div>

        <!-- Audit log -->
        <div class="text-xs text-gray-400 space-y-1 px-1">
            <div class="flex justify-between"><span>Người tạo:</span> <span class="text-gray-600 font-medium">Admin (01/04/2026)</span></div>
            <div class="flex justify-between"><span>Cập nhật cuối:</span> <span class="text-gray-600 font-medium">Nguyễn Văn A (15/05/2026)</span></div>
        </div>
    </div>

    <!-- Footer Drawer (Nút thao tác) -->
    <div class="p-4 border-t border-gray-100 bg-white flex items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <button class="w-10 h-10 flex items-center justify-center bg-gray-50 hover:bg-gray-100 text-gray-600 rounded-lg border border-gray-200 transition-colors" title="Nhân bản">
                <span class="iconify text-lg" data-icon="mdi:content-copy"></span>
            </button>
            <button onclick="openToggleModal(1, 'dang_hien_thi')" class="w-10 h-10 flex items-center justify-center bg-gray-50 hover:bg-gray-100 text-gray-600 rounded-lg border border-gray-200 transition-colors" title="Bật/Tắt">
                <span class="iconify text-lg text-green-600" data-icon="mdi:toggle-switch-outline"></span>
            </button>
        </div>
        <div class="flex items-center gap-2">
            <a href="<?= APP_URL ?>/admin/banner/sua" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A1120] transition-colors text-sm font-medium shadow-sm">
                Chỉnh sửa
            </a>
        </div>
    </div>
</div>
