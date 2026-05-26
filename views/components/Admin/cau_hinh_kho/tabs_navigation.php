<?php
// views/components/Admin/cau_hinh_kho/tabs_navigation.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden p-2">
    <div class="overflow-x-auto sidebar-scroll">
        <nav class="flex gap-2 min-w-max" aria-label="Tabs">
            <button id="nav-tab-danh_sach" onclick="switchTab('danh_sach')" class="nav-tab-btn px-4 py-2 text-sm font-medium rounded-lg text-white bg-[#6B0D18] shadow-sm transition-colors whitespace-nowrap flex items-center gap-2">
                <span class="iconify" data-icon="mdi:view-list"></span>
                Danh sách kho
            </button>
            <button id="nav-tab-khu_vuc" onclick="switchTab('khu_vuc')" class="nav-tab-btn px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors whitespace-nowrap flex items-center gap-2">
                <span class="iconify" data-icon="mdi:map-marker-path"></span>
                Khu vực / Kệ
            </button>
            <button id="nav-tab-quy_tac" onclick="switchTab('quy_tac')" class="nav-tab-btn px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors whitespace-nowrap flex items-center gap-2">
                <span class="iconify" data-icon="mdi:cog-transfer"></span>
                Quy tắc tồn kho
            </button>
            <button id="nav-tab-canh_bao" onclick="switchTab('canh_bao')" class="nav-tab-btn px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors whitespace-nowrap flex items-center gap-2">
                <span class="iconify" data-icon="mdi:bell-alert-outline"></span>
                Cảnh báo kho
                <span class="bg-rose-100 text-rose-600 px-1.5 py-0.5 rounded text-[10px] font-bold ml-1">2</span>
            </button>
            <button id="nav-tab-quyen" onclick="switchTab('quyen')" class="nav-tab-btn px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors whitespace-nowrap flex items-center gap-2">
                <span class="iconify" data-icon="mdi:shield-account-outline"></span>
                Quyền nhân viên
                <span class="bg-amber-100 text-amber-600 px-1.5 py-0.5 rounded text-[10px] font-bold ml-1">1</span>
            </button>
            <button id="nav-tab-kiem_ke" onclick="switchTab('kiem_ke')" class="nav-tab-btn px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors whitespace-nowrap flex items-center gap-2">
                <span class="iconify" data-icon="mdi:clipboard-check-outline"></span>
                Kiểm kê định kỳ
            </button>
            <button id="nav-tab-sku" onclick="switchTab('sku')" class="nav-tab-btn px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors whitespace-nowrap flex items-center gap-2">
                <span class="iconify" data-icon="mdi:barcode-scan"></span>
                SKU / Barcode
            </button>
            <button id="nav-tab-nhat_ky" onclick="switchTab('nhat_ky')" class="nav-tab-btn px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors whitespace-nowrap flex items-center gap-2">
                <span class="iconify" data-icon="mdi:history"></span>
                Nhật ký cấu hình
            </button>
        </nav>
    </div>
</div>
