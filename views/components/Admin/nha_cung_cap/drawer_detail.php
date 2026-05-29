<?php
// views/components/Admin/nha_cung_cap/drawer_detail.php
?>
<!-- Drawer Container -->
<div id="supplierDrawer" class="fixed top-0 right-0 h-full w-full md:w-[600px] lg:w-[800px] bg-gray-50 shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out overflow-hidden flex flex-col">
    
    <!-- Drawer Header -->
    <div class="px-6 py-4 bg-white border-b border-gray-200 flex flex-col gap-4 sticky top-0 z-10">
        <!-- Nút đóng và thao tác nhanh -->
        <div class="flex items-center justify-between">
            <button onclick="closeDrawer()" class="p-2 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-colors focus:outline-none">
                <span class="iconify text-2xl" data-icon="mdi:close"></span>
            </button>
            <div class="flex items-center gap-2">
                <a href="#" id="drawer-btn-sua" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors shadow-sm ml-2">
                    Sửa thông tin
                </a>
            </div>
        </div>

        <!-- Thông tin cơ bản Header -->
        <div class="flex items-start gap-4">
            <div class="w-16 h-16 rounded-xl bg-gray-100 border border-gray-200 flex items-center justify-center shrink-0">
                <span class="iconify text-3xl text-gray-400" data-icon="mdi:domain"></span>
            </div>
            <div>
                <h2 id="drawer-ncc-ten" class="text-xl font-bold text-gray-900 leading-tight mb-1">Đang tải...</h2>
                <div class="flex items-center gap-3 text-sm">
                    <span id="drawer-ncc-ma" class="font-medium text-[#6B0D18] bg-red-50 px-2 py-0.5 rounded cursor-pointer tooltip" title="Sao chép">...</span>
                    <span class="text-gray-500 flex items-center gap-1"><span class="iconify" data-icon="mdi:map-marker-outline"></span> <span id="drawer-ncc-dia-chi" class="truncate max-w-[200px]">...</span></span>
                    <span id="drawer-ncc-trang-thai" class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">...</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Drawer Navigation (Tabs) -->
    <div class="bg-white px-6 border-b border-gray-200 sticky top-[148px] z-10 shadow-sm">
        <nav class="flex overflow-x-auto sidebar-scroll gap-6" aria-label="Tabs">
            <button onclick="switchDrawerTab('overview')" id="tab-btn-overview" class="drawer-tab relative py-3 text-sm font-medium text-[#6B0D18] transition-colors whitespace-nowrap">
                Tổng quan
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#6B0D18] rounded-t-full tab-indicator"></span>
            </button>
            <button onclick="switchDrawerTab('contact')" id="tab-btn-contact" class="drawer-tab relative py-3 text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors whitespace-nowrap">
                Liên hệ
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-transparent rounded-t-full tab-indicator hidden"></span>
            </button>
        </nav>
    </div>

    <!-- Drawer Content (Scrollable) -->
    <div class="flex-1 overflow-y-auto p-6 bg-gray-50/50 space-y-6" id="drawerContentArea">
        
        <!-- Tab: Tổng quan -->
        <div id="tab-overview" class="drawer-tab-content block space-y-6">
            
            <!-- Highlight Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                    <p class="text-xs text-gray-500 mb-1">Tổng đơn nhập</p>
                    <p class="text-xl font-bold text-gray-900" id="drawer-tong-phieu">0</p>
                </div>
                <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                    <p class="text-xs text-gray-500 mb-1">Tổng giá trị</p>
                    <p class="text-xl font-bold text-[#6B0D18]" id="drawer-tong-gia-tri">0đ</p>
                </div>
                <div class="bg-white rounded-xl p-4 border border-rose-100 shadow-sm bg-rose-50/30">
                    <p class="text-xs text-rose-600 mb-1">Công nợ</p>
                    <p class="text-xl font-bold text-rose-600" id="drawer-cong-no">0đ</p>
                </div>
                <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                    <p class="text-xs text-gray-500 mb-1">Lần nhập cuối</p>
                    <p class="text-lg font-bold text-gray-900" id="drawer-ngay-nhap">-</p>
                </div>
            </div>

            <!-- Basic Info Card -->
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                    <h3 class="font-semibold text-gray-800 text-sm">Thông tin chính</h3>
                </div>
                <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6">
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Người liên hệ</p>
                        <p class="text-sm font-medium text-gray-900" id="drawer-nguoi-lh">-</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Điện thoại</p>
                        <p class="text-sm font-medium text-gray-900 flex items-center gap-2">
                            <span id="drawer-sdt">-</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Các Tab còn lại -->
        <div id="tab-contact" class="drawer-tab-content hidden">
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                <table class="w-full text-sm text-left">
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="px-4 py-3 text-gray-500 w-1/3 bg-gray-50/50">Điện thoại</td>
                            <td class="px-4 py-3 font-medium" id="drawer-lh-sdt">-</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-gray-500 w-1/3 bg-gray-50/50">Email</td>
                            <td class="px-4 py-3 font-medium" id="drawer-lh-email">-</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-gray-500 w-1/3 bg-gray-50/50">Địa chỉ</td>
                            <td class="px-4 py-3 font-medium" id="drawer-lh-dia-chi">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    // Hàm mở Drawer và fetch data
    function openDrawer(id) {
        const drawer = document.getElementById('supplierDrawer');
        const overlay = document.getElementById('drawerOverlay');
        
        // Hiển thị overlay
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        
        // Trượt Drawer ra
        drawer.classList.remove('translate-x-full');

        // Reset tab về Overview
        switchDrawerTab('overview');

        // Gán link sửa
        document.getElementById('drawer-btn-sua').href = `<?= APP_URL ?>/admin/nha-cung-cap/sua/${id}`;

        // Gọi AJAX lấy data
        fetch(`<?= APP_URL ?>/admin/nha-cung-cap/chi-tiet/${id}`)
            .then(res => res.json())
            .then(res => {
                if(res.status === 'success') {
                    const data = res.data;
                    document.getElementById('drawer-ncc-ten').textContent = data.ten_ncc || '-';
                    document.getElementById('drawer-ncc-ma').textContent = data.ma_ncc || '-';
                    document.getElementById('drawer-ncc-dia-chi').textContent = data.dia_chi || '-';
                    
                    document.getElementById('drawer-tong-phieu').textContent = data.tong_phieu || 0;
                    document.getElementById('drawer-tong-gia-tri').textContent = new Intl.NumberFormat('vi-VN').format(data.tong_gia_tri || 0) + 'đ';
                    document.getElementById('drawer-cong-no').textContent = new Intl.NumberFormat('vi-VN').format(data.cong_no || 0) + 'đ';
                    document.getElementById('drawer-ngay-nhap').textContent = data.lan_nhap_gan_nhat || '-';
                    
                    document.getElementById('drawer-nguoi-lh').textContent = data.nguoi_lien_he || '-';
                    document.getElementById('drawer-sdt').textContent = data.sdt || '-';
                    
                    document.getElementById('drawer-lh-sdt').textContent = data.sdt || '-';
                    document.getElementById('drawer-lh-email').innerHTML = data.email ? `<a href="mailto:${data.email}" class="text-blue-600 hover:underline">${data.email}</a>` : '-';
                    document.getElementById('drawer-lh-dia-chi').textContent = data.dia_chi || '-';
                    
                    let badgeClass = '';
                    let statusText = '';
                    switch (parseInt(data.trang_thai)) {
                        case 1:
                            badgeClass = 'bg-emerald-50 text-emerald-700 border-emerald-200';
                            statusText = 'Đang hợp tác';
                            break;
                        case 2:
                            badgeClass = 'bg-amber-50 text-amber-700 border-amber-200';
                            statusText = 'Tạm ngừng';
                            break;
                        case 0:
                        default:
                            badgeClass = 'bg-gray-100 text-gray-600 border-gray-200';
                            statusText = 'Ngừng hợp tác';
                            break;
                    }
                    
                    const badge = document.getElementById('drawer-ncc-trang-thai');
                    badge.className = `inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-xs font-semibold border ${badgeClass}`;
                    badge.textContent = statusText;
                }
            });
    }

    // Hàm đóng Drawer
    function closeDrawer() {
        const drawer = document.getElementById('supplierDrawer');
        const overlay = document.getElementById('drawerOverlay');
        
        drawer.classList.add('translate-x-full');
        overlay.classList.add('opacity-0');
        setTimeout(() => overlay.classList.add('hidden'), 300); // Đợi CSS transition xong
    }

    // Hàm chuyển Tab trong Drawer
    function switchDrawerTab(tabId) {
        // Ẩn tất cả content
        document.querySelectorAll('.drawer-tab-content').forEach(el => {
            el.classList.remove('block');
            el.classList.add('hidden');
        });
        
        // Hiện content được chọn
        document.getElementById(`tab-${tabId}`).classList.remove('hidden');
        document.getElementById(`tab-${tabId}`).classList.add('block');

        // Xử lý active state cho nút Tab
        document.querySelectorAll('.drawer-tab').forEach(btn => {
            btn.classList.remove('text-[#6B0D18]');
            btn.classList.add('text-gray-500', 'hover:text-gray-700');
            btn.querySelector('.tab-indicator').classList.add('hidden');
            btn.querySelector('.tab-indicator').classList.remove('bg-[#6B0D18]');
        });

        const activeBtn = document.getElementById(`tab-btn-${tabId}`);
        activeBtn.classList.add('text-[#6B0D18]');
        activeBtn.classList.remove('text-gray-500', 'hover:text-gray-700');
        activeBtn.querySelector('.tab-indicator').classList.remove('hidden');
        activeBtn.querySelector('.tab-indicator').classList.add('bg-[#6B0D18]');
    }
</script>
