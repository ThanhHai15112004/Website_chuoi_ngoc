<?php
// views/components/Admin/nhat_ky/drawer_detail.php
?>
<div id="logDetailDrawer" class="fixed inset-0 z-[100] hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm transition-opacity opacity-0" id="logDrawerBackdrop" onclick="closeLogDetail()"></div>
    
    <!-- Drawer Panel -->
    <div class="absolute inset-y-0 right-0 w-full max-w-[600px] bg-gray-50 shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300" id="logDrawerPanel">
        
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-200">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Chi tiết hoạt động</h2>
                <p class="text-sm text-gray-500 font-mono mt-0.5" id="detailLogId">Đang tải...</p>
            </div>
            <div class="flex items-center gap-2">
                <button onclick="closeLogDetail()" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-red-50 text-gray-500 hover:text-red-600 transition-colors">
                    <span class="iconify text-xl" data-icon="mdi:close"></span>
                </button>
            </div>
        </div>

        <!-- Body Loader -->
        <div id="logDetailLoader" class="flex-1 flex justify-center items-center">
            <span class="iconify text-4xl text-gray-300 animate-spin" data-icon="mdi:loading"></span>
        </div>

        <!-- Body Content -->
        <div id="logDetailContent" class="flex-1 overflow-y-auto p-6 space-y-6 hidden">
            
            <!-- Badge Mức độ & Tóm tắt -->
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span id="detailBadge" class="px-2.5 py-1 rounded-md text-xs font-bold flex items-center gap-1"></span>
                    <span class="text-sm text-gray-500" id="detailTime"></span>
                </div>
            </div>

            <!-- Nhân viên thực hiện -->
            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Người thực hiện</h3>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img id="detailAvatar" src="" alt="Avatar" class="w-10 h-10 rounded-full border border-gray-200 object-cover">
                        <div>
                            <p class="font-bold text-gray-900" id="detailName"></p>
                            <p class="text-xs text-gray-500 mt-0.5">Vai trò: <span class="font-medium text-gray-700" id="detailRole"></span></p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-3 pt-3 border-t border-gray-100 flex flex-col gap-2 text-xs">
                    <div class="flex items-center gap-1.5 text-gray-600">
                        <span class="iconify text-gray-400 text-lg" data-icon="mdi:ip-network"></span>
                        IP: <span class="font-mono bg-gray-50 px-1.5 py-0.5 rounded border border-gray-200" id="detailIp"></span>
                    </div>
                    <div class="flex items-start gap-1.5 text-gray-600">
                        <span class="iconify text-gray-400 text-lg mt-0.5" data-icon="mdi:monitor-cellphone"></span>
                        <div class="break-all">Thiết bị: <span id="detailDevice"></span></div>
                    </div>
                </div>
            </div>

            <!-- Thông tin thao tác -->
            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Thông tin thao tác</h3>
                
                <div class="space-y-3 text-sm">
                    <div class="flex items-start gap-4">
                        <div class="w-1/3 text-gray-500">Hành động:</div>
                        <div class="w-2/3 font-bold text-gray-900" id="detailAction"></div>
                    </div>
                    <div class="flex flex-col gap-2 mt-4 pt-3 border-t border-gray-100">
                        <div class="text-gray-500 text-xs font-bold uppercase tracking-wider">Mô tả chi tiết:</div>
                        <div class="text-gray-800 break-words bg-gray-50 p-3 rounded-lg border border-gray-100" id="detailDesc"></div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 bg-white border-t border-gray-200 flex justify-end gap-3">
            <button onclick="closeLogDetail()" class="px-4 py-2 border border-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-50 text-sm">Đóng</button>
        </div>
    </div>
</div>

<script>
    function openLogDetail(id) {
        const drawer = document.getElementById('logDetailDrawer');
        const backdrop = document.getElementById('logDrawerBackdrop');
        const panel = document.getElementById('logDrawerPanel');
        
        const loader = document.getElementById('logDetailLoader');
        const content = document.getElementById('logDetailContent');

        document.getElementById('detailLogId').innerText = `Tải dữ liệu...`;
        
        loader.classList.remove('hidden');
        content.classList.add('hidden');

        drawer.classList.remove('hidden');
        
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            panel.classList.remove('translate-x-full');
        }, 10);

        fetch(`<?= APP_URL ?? '' ?>/admin/nhat-ky-hoat-dong/api/chi-tiet/${id}`)
            .then(res => res.json())
            .then(response => {
                if(response.status === 'success') {
                    const log = response.data;
                    document.getElementById('detailLogId').innerText = `ID: ${log.id}`;
                    
                    document.getElementById('detailTime').innerText = `• ${log.ngay_thuc_hien}`;
                    
                    const name = log.ho_ten || log.nguoi_thuc_hien || 'Hệ thống';
                    document.getElementById('detailName').innerText = name;
                    document.getElementById('detailRole').innerText = log.vai_tro || 'N/A';
                    document.getElementById('detailAvatar').src = log.avatar || `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=random`;
                    
                    document.getElementById('detailIp').innerText = log.ip_address || 'Không xác định';
                    document.getElementById('detailDevice').innerText = log.thiet_bi || 'Không xác định';
                    
                    document.getElementById('detailAction').innerText = log.hanh_dong;
                    document.getElementById('detailDesc').innerHTML = (log.mo_ta || 'Không có mô tả').replace(/\n/g, '<br>');

                    // Badge level
                    const badge = document.getElementById('detailBadge');
                    const actionLower = log.hanh_dong.toLowerCase();
                    const descLower = (log.mo_ta || '').toLowerCase();
                    
                    if (actionLower.includes('xóa') || descLower.includes('thất bại')) {
                        badge.className = 'px-2.5 py-1 rounded-md text-xs font-bold bg-red-50 text-red-700 border border-red-100 flex items-center gap-1 w-max';
                        badge.innerHTML = '<span class="iconify" data-icon="mdi:alert-rhombus-outline"></span> Nguy hiểm';
                    } else if (actionLower.includes('cập nhật') || actionLower.includes('đổi') || actionLower.includes('tạo') || actionLower.includes('thêm')) {
                        badge.className = 'px-2.5 py-1 rounded-md text-xs font-bold bg-amber-50 text-amber-700 border border-amber-100 flex items-center gap-1 w-max';
                        badge.innerHTML = '<span class="iconify" data-icon="mdi:star-circle-outline"></span> Quan trọng';
                    } else if (actionLower.includes('đăng nhập')) {
                        badge.className = 'px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100 flex items-center gap-1 w-max';
                        badge.innerHTML = '<span class="iconify" data-icon="mdi:shield-lock-outline"></span> Bình thường';
                    } else {
                        badge.className = 'px-2.5 py-1 rounded-md text-xs font-medium bg-gray-50 text-gray-600 border border-gray-200 flex items-center gap-1 w-max';
                        badge.innerHTML = '<span class="iconify" data-icon="mdi:information-outline"></span> Bình thường';
                    }

                    loader.classList.add('hidden');
                    content.classList.remove('hidden');
                } else {
                    alert('Không tìm thấy dữ liệu.');
                    closeLogDetail();
                }
            })
            .catch(err => {
                console.error(err);
                alert('Lỗi kết nối.');
                closeLogDetail();
            });
    }

    function closeLogDetail() {
        const drawer = document.getElementById('logDetailDrawer');
        const backdrop = document.getElementById('logDrawerBackdrop');
        const panel = document.getElementById('logDrawerPanel');

        backdrop.classList.add('opacity-0');
        panel.classList.add('translate-x-full');

        setTimeout(() => {
            drawer.classList.add('hidden');
        }, 300);
    }
</script>
