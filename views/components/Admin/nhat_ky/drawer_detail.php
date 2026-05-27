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
                <p class="text-sm text-gray-500 font-mono mt-0.5" id="detailLogId">LOG-1004</p>
            </div>
            <div class="flex items-center gap-2">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-500 transition-colors tooltip" title="Sao chép ID" onclick="navigator.clipboard.writeText('LOG-1004')">
                    <span class="iconify" data-icon="mdi:content-copy"></span>
                </button>
                <button onclick="closeLogDetail()" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-red-50 text-gray-500 hover:text-red-600 transition-colors">
                    <span class="iconify text-xl" data-icon="mdi:close"></span>
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="flex-1 overflow-y-auto p-6 space-y-6">
            
            <!-- Badge Mức độ & Tóm tắt -->
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="px-2.5 py-1 rounded-md text-xs font-bold bg-amber-50 text-amber-700 border border-amber-100 flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:star-circle-outline"></span> Quan trọng
                    </span>
                    <span class="text-sm text-gray-500">• 18/05/2026 09:25:00</span>
                </div>
            </div>

            <!-- Nhân viên thực hiện -->
            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Người thực hiện</h3>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name=Lan+CSKH&background=7c3aed&color=fff" alt="Avatar" class="w-10 h-10 rounded-full border border-gray-200">
                        <div>
                            <p class="font-bold text-gray-900">Lan CSKH</p>
                            <p class="text-xs text-gray-500 mt-0.5">Vai trò: <span class="font-medium text-gray-700">CSKH</span></p>
                        </div>
                    </div>
                    <a href="<?= APP_URL ?>/admin/nhan-su/xem/5" class="px-3 py-1.5 bg-gray-50 text-gray-600 border border-gray-200 rounded text-xs font-medium hover:bg-gray-100 transition-colors">Hồ sơ</a>
                </div>
                
                <div class="mt-3 pt-3 border-t border-gray-100 flex flex-wrap gap-x-6 gap-y-2 text-xs">
                    <div class="flex items-center gap-1.5 text-gray-600">
                        <span class="iconify text-gray-400" data-icon="mdi:ip-network"></span>
                        IP: <span class="font-mono bg-gray-50 px-1 rounded border border-gray-100">14.162.20.10</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-gray-600">
                        <span class="iconify text-gray-400" data-icon="mdi:monitor-cellphone"></span>
                        Thiết bị: Safari · Mac OS
                    </div>
                </div>
            </div>

            <!-- Đối tượng tác động -->
            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Thông tin thao tác</h3>
                
                <div class="space-y-3 text-sm">
                    <div class="flex items-start gap-4">
                        <div class="w-1/3 text-gray-500">Hành động:</div>
                        <div class="w-2/3 font-bold text-gray-900">Đổi trạng thái đơn</div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-1/3 text-gray-500">Module:</div>
                        <div class="w-2/3"><span class="inline-flex px-1.5 py-0.5 rounded text-xs font-bold bg-gray-100 text-gray-600 uppercase">Đơn hàng</span></div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-1/3 text-gray-500">Đối tượng:</div>
                        <div class="w-2/3 flex flex-col gap-1">
                            <a href="#" class="font-bold text-[#6B0D18] hover:underline flex items-center gap-1 w-max">
                                DH202600123 <span class="iconify text-xs" data-icon="mdi:open-in-new"></span>
                            </a>
                            <span class="text-gray-700 font-medium">Khách hàng: Nguyễn Văn A</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- So sánh thay đổi -->
            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Chi tiết thay đổi</h3>
                
                <!-- Layout 2 cột -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Cũ -->
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-3">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 flex items-center gap-1">
                            <span class="iconify" data-icon="mdi:history"></span> Trước thay đổi
                        </p>
                        <div class="p-2 bg-white border border-gray-100 rounded text-sm text-gray-600 break-words font-mono">
                            Chờ xác nhận
                        </div>
                    </div>

                    <!-- Mới -->
                    <div class="bg-red-50/30 border border-red-100 rounded-lg p-3 relative">
                        <div class="absolute -left-3 top-1/2 -translate-y-1/2 w-6 h-6 bg-white border border-gray-200 rounded-full flex flex-col items-center justify-center text-gray-400 z-10 sm:flex hidden">
                            <span class="iconify" data-icon="mdi:arrow-right"></span>
                        </div>
                        
                        <p class="text-xs font-bold text-red-600 uppercase tracking-wider mb-2 flex items-center gap-1">
                            <span class="iconify" data-icon="mdi:update"></span> Sau thay đổi
                        </p>
                        <div class="p-2 bg-white border border-red-50 rounded text-sm font-bold text-[#6B0D18] break-words font-mono shadow-sm">
                            Đã xác nhận
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ghi chú hệ thống -->
            <div class="bg-blue-50 border border-blue-100 p-4 rounded-xl">
                <p class="text-xs font-bold text-blue-800 flex items-center gap-1.5 mb-1">
                    <span class="iconify" data-icon="mdi:robot-outline"></span> Ghi chú tự động
                </p>
                <p class="text-xs text-blue-700">Thao tác này đã kích hoạt tiến trình gửi email xác nhận cho khách hàng (Nguyễn Văn A).</p>
            </div>
            
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 bg-white border-t border-gray-200 flex justify-end gap-3">
            <button onclick="closeLogDetail()" class="px-4 py-2 border border-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-50 text-sm">Đóng</button>
            <button class="px-4 py-2 bg-white border border-amber-200 text-amber-700 font-medium rounded-lg hover:bg-amber-50 text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:check-all"></span> Đánh dấu đã xem
            </button>
        </div>
    </div>
</div>

<script>
    function openLogDetail(id) {
        // Trong thực tế, gọi Ajax lấy dữ liệu của ID rồi điền vào đây.
        const drawer = document.getElementById('logDetailDrawer');
        const backdrop = document.getElementById('logDrawerBackdrop');
        const panel = document.getElementById('logDrawerPanel');

        // Gán ID để làm màu
        document.getElementById('detailLogId').innerText = id;

        drawer.classList.remove('hidden');
        
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            panel.classList.remove('translate-x-full');
        }, 10);
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
