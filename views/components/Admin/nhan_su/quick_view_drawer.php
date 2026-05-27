<?php
// views/components/Admin/nhan_su/quick_view_drawer.php
?>
<div id="drawerQuickView" class="fixed top-0 right-0 bottom-0 w-full max-w-xl bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <!-- Header -->
    <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-start bg-gray-50/80">
        <div class="flex items-center gap-4">
            <img src="https://ui-avatars.com/api/?name=Hai+Admin&background=6B0D18&color=fff" alt="Avatar" class="w-14 h-14 rounded-full border-2 border-white shadow-sm">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <h3 class="font-bold text-gray-900 text-xl">Hải Admin</h3>
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold bg-emerald-100 text-emerald-700">Đang hoạt động</span>
                </div>
                <p class="text-sm text-gray-500">NV0001 <span class="mx-1">•</span> <span class="font-medium text-[#6B0D18]">Super Admin</span></p>
            </div>
        </div>
        <button onclick="closeQuickView()" class="text-gray-400 hover:text-red-500 transition-colors bg-white w-8 h-8 rounded-full flex items-center justify-center border border-gray-200 shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>

    <!-- Tabs trong Drawer -->
    <div class="px-6 flex border-b border-gray-200 gap-5 mt-2 overflow-x-auto hide-scrollbar">
        <button onclick="switchQvTab('tong-quan')" id="btn-tab-tong-quan" class="qv-tab-btn whitespace-nowrap py-3 border-b-2 border-[#6B0D18] text-[#6B0D18] text-sm font-bold">Tổng quan</button>
        <button onclick="switchQvTab('thong-tin')" id="btn-tab-thong-tin" class="qv-tab-btn whitespace-nowrap py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Thông tin cá nhân</button>
        <button onclick="switchQvTab('phan-quyen')" id="btn-tab-phan-quyen" class="qv-tab-btn whitespace-nowrap py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Vai trò & Quyền</button>
        <button onclick="switchQvTab('lich-su-dang-nhap')" id="btn-tab-lich-su-dang-nhap" class="qv-tab-btn whitespace-nowrap py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Lịch sử đăng nhập</button>
        <button onclick="switchQvTab('nhat-ky')" id="btn-tab-nhat-ky" class="qv-tab-btn whitespace-nowrap py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Nhật ký hoạt động</button>
    </div>

    <!-- Content -->
    <div class="flex-1 overflow-y-auto p-6 bg-gray-50/30">
        
        <!-- TAB TỔNG QUAN -->
        <div id="qv-tab-tong-quan" class="qv-tab-content space-y-6 block">
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                    <p class="text-xs text-gray-500 font-medium mb-1">Email</p>
                    <p class="text-sm font-bold text-gray-900 truncate">thanhhai@example.com</p>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                    <p class="text-xs text-gray-500 font-medium mb-1">Số điện thoại</p>
                    <p class="text-sm font-bold text-gray-900">0901 234 567</p>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                    <p class="text-xs text-gray-500 font-medium mb-1">Phòng ban</p>
                    <p class="text-sm font-bold text-gray-900">Quản trị hệ thống</p>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                    <p class="text-xs text-gray-500 font-medium mb-1">Ngày tạo</p>
                    <p class="text-sm font-bold text-gray-900">01/01/2026</p>
                </div>
            </div>

            <!-- Cảnh báo quyền -->
            <div class="bg-orange-50 border border-orange-200 rounded-xl p-4 flex gap-3 shadow-sm">
                <span class="iconify text-orange-500 text-xl shrink-0" data-icon="mdi:shield-alert-outline"></span>
                <div>
                    <h4 class="text-sm font-bold text-orange-800">Quyền hạn cao nhất</h4>
                    <p class="text-xs text-orange-700 mt-1">Tài khoản này có toàn quyền truy cập và chỉnh sửa hệ thống. Hãy bảo mật cẩn thận.</p>
                </div>
            </div>

            <!-- Thống kê hoạt động -->
            <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                <h4 class="text-sm font-bold text-gray-900 mb-4">Hoạt động trong tháng</h4>
                <div class="flex justify-around text-center">
                    <div>
                        <p class="text-xl font-bold text-[#6B0D18]">142</p>
                        <p class="text-xs text-gray-500">Thao tác</p>
                    </div>
                    <div class="w-px bg-gray-200"></div>
                    <div>
                        <p class="text-xl font-bold text-emerald-600">28</p>
                        <p class="text-xs text-gray-500">Lần đăng nhập</p>
                    </div>
                    <div class="w-px bg-gray-200"></div>
                    <div>
                        <p class="text-xl font-bold text-blue-600">5</p>
                        <p class="text-xs text-gray-500">IP khác nhau</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB THÔNG TIN -->
        <div id="qv-tab-thong-tin" class="qv-tab-content space-y-4 hidden">
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                <div class="px-5 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <h4 class="font-bold text-gray-900">Thông tin chi tiết</h4>
                    <a href="<?= APP_URL ?>/admin/nhan-su/sua/1" class="text-xs font-bold text-[#6B0D18] hover:underline">Chỉnh sửa</a>
                </div>
                <div class="p-5 space-y-4">
                    <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                        <div class="col-span-1 text-sm font-medium text-gray-500">Họ và tên</div>
                        <div class="col-span-2 text-sm text-gray-900 font-medium">Hải Admin</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                        <div class="col-span-1 text-sm font-medium text-gray-500">Mã NV</div>
                        <div class="col-span-2 text-sm text-gray-900">NV0001</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                        <div class="col-span-1 text-sm font-medium text-gray-500">Ngày sinh</div>
                        <div class="col-span-2 text-sm text-gray-900">15/11/2004</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                        <div class="col-span-1 text-sm font-medium text-gray-500">Địa chỉ</div>
                        <div class="col-span-2 text-sm text-gray-900">123 Nguyễn Văn Linh, Đà Nẵng</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-4">
                        <div class="col-span-1 text-sm font-medium text-gray-500">Ngày vào làm</div>
                        <div class="col-span-2 text-sm text-gray-900">01/01/2026</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1 text-sm font-medium text-gray-500">Ghi chú</div>
                        <div class="col-span-2 text-sm text-gray-600 italic">"Người sáng lập hệ thống."</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB QUYỀN -->
        <div id="qv-tab-phan-quyen" class="qv-tab-content space-y-4 hidden">
            <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-bold text-gray-900">Phân quyền chi tiết</h4>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-xs font-bold bg-[#6B0D18]/10 text-[#6B0D18]">
                        <span class="iconify" data-icon="mdi:shield-crown-outline"></span> Super Admin
                    </span>
                </div>
                <div class="space-y-3">
                    <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 flex items-center gap-2"><span class="iconify text-gray-400" data-icon="mdi:package-variant-closed"></span> Quản lý Sản phẩm</span>
                        <span class="text-xs font-bold text-emerald-600">Toàn quyền</span>
                    </div>
                    <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 flex items-center gap-2"><span class="iconify text-gray-400" data-icon="mdi:receipt-text-outline"></span> Quản lý Đơn hàng</span>
                        <span class="text-xs font-bold text-emerald-600">Toàn quyền</span>
                    </div>
                    <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 flex items-center gap-2"><span class="iconify text-gray-400" data-icon="mdi:warehouse"></span> Quản lý Kho</span>
                        <span class="text-xs font-bold text-emerald-600">Toàn quyền</span>
                    </div>
                    <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 flex items-center gap-2"><span class="iconify text-gray-400" data-icon="mdi:finance"></span> Báo cáo Doanh thu</span>
                        <span class="text-xs font-bold text-emerald-600">Toàn quyền</span>
                    </div>
                    <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 flex items-center gap-2"><span class="iconify text-gray-400" data-icon="mdi:account-tie-outline"></span> Cấu hình & Nhân sự</span>
                        <span class="text-xs font-bold text-[#6B0D18]">Toàn quyền đặc biệt</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB LỊCH SỬ ĐĂNG NHẬP -->
        <div id="qv-tab-lich-su-dang-nhap" class="qv-tab-content space-y-4 hidden">
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-xs text-gray-500 font-medium">Thời gian</th>
                            <th class="px-4 py-2 text-xs text-gray-500 font-medium">IP / Thiết bị</th>
                            <th class="px-4 py-2 text-xs text-gray-500 font-medium text-right">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="px-4 py-3">
                                <p class="text-sm font-medium text-gray-900">18/05/2026</p>
                                <p class="text-xs text-gray-500">09:30:15</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="text-sm text-gray-900">113.160.22.1</p>
                                <p class="text-xs text-gray-500">Windows • Chrome</p>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-600">Thành công</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3">
                                <p class="text-sm font-medium text-gray-900">17/05/2026</p>
                                <p class="text-xs text-gray-500">14:22:10</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="text-sm text-gray-900">113.160.22.1</p>
                                <p class="text-xs text-gray-500">Windows • Chrome</p>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-600">Thành công</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3">
                                <p class="text-sm font-medium text-gray-900">16/05/2026</p>
                                <p class="text-xs text-gray-500">23:15:00</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="text-sm text-gray-900">103.22.11.5 (Lạ)</p>
                                <p class="text-xs text-gray-500">Mac OS • Safari</p>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-red-50 text-red-600">Sai mật khẩu</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- TAB NHẬT KÝ HOẠT ĐỘNG -->
        <div id="qv-tab-nhat-ky" class="qv-tab-content space-y-4 hidden">
            <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                <div class="relative border-l-2 border-gray-200 ml-3 space-y-6">
                    <!-- Item -->
                    <div class="relative pl-6">
                        <div class="absolute w-3 h-3 rounded-full bg-blue-500 border-2 border-white -left-[7px] top-1.5"></div>
                        <p class="text-xs text-gray-500 mb-1">18/05/2026 - 10:45</p>
                        <p class="text-sm font-medium text-gray-900">Tạo phiếu nhập kho <a href="#" class="text-blue-600 hover:underline">PN00123</a></p>
                        <p class="text-xs text-gray-600 mt-0.5">Module: Quản lý Kho</p>
                    </div>
                    <!-- Item -->
                    <div class="relative pl-6">
                        <div class="absolute w-3 h-3 rounded-full bg-emerald-500 border-2 border-white -left-[7px] top-1.5"></div>
                        <p class="text-xs text-gray-500 mb-1">18/05/2026 - 09:40</p>
                        <p class="text-sm font-medium text-gray-900">Cập nhật cấu hình Chính sách cửa hàng</p>
                        <p class="text-xs text-gray-600 mt-0.5">Module: Cấu hình cửa hàng</p>
                    </div>
                    <!-- Item -->
                    <div class="relative pl-6">
                        <div class="absolute w-3 h-3 rounded-full bg-red-500 border-2 border-white -left-[7px] top-1.5"></div>
                        <p class="text-xs text-gray-500 mb-1">17/05/2026 - 15:20</p>
                        <p class="text-sm font-medium text-gray-900">Xóa sản phẩm <span class="font-bold">Vòng tay thạch anh hồng</span></p>
                        <p class="text-xs text-gray-600 mt-0.5">Module: Quản lý Sản phẩm</p>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <button class="text-sm font-medium text-[#6B0D18] hover:underline">Xem toàn bộ nhật ký</button>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer Actions -->
    <div class="p-5 border-t border-gray-200 bg-gray-50 flex items-center justify-between gap-3">
        <button class="px-4 py-2 bg-white border border-gray-300 rounded-xl text-gray-700 font-medium hover:bg-gray-100 transition-colors shadow-sm flex items-center gap-2">
            <span class="iconify" data-icon="mdi:shield-account-outline"></span> Phân quyền
        </button>
        <div class="flex gap-2">
            <button onclick="openLockModal()" class="px-4 py-2 bg-white border border-gray-300 rounded-xl text-orange-600 font-medium hover:bg-orange-50 transition-colors shadow-sm tooltip" title="Khóa tài khoản">
                <span class="iconify text-lg" data-icon="mdi:lock-outline"></span>
            </button>
            <a href="<?= APP_URL ?>/admin/nhan-su/sua/1" class="px-6 py-2 bg-[#6B0D18] text-white rounded-xl font-bold text-center shadow-md hover:bg-red-900 transition-colors flex items-center gap-2">
                <span class="iconify" data-icon="mdi:pencil-outline"></span> Sửa thông tin
            </a>
        </div>
    </div>
</div>

<!-- Backdrop -->
<div id="quickViewBackdrop" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity opacity-0 backdrop-blur-sm" onclick="closeQuickView()"></div>

<script>
    function openQuickView(id) {
        const drawer = document.getElementById('drawerQuickView');
        const backdrop = document.getElementById('quickViewBackdrop');

        backdrop.classList.remove('hidden');
        setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
        drawer.classList.remove('translate-x-full');

        // Reset to default tab
        switchQvTab('tong-quan');
    }

    function closeQuickView() {
        const drawer = document.getElementById('drawerQuickView');
        const backdrop = document.getElementById('quickViewBackdrop');
        
        drawer.classList.add('translate-x-full');
        backdrop.classList.add('opacity-0');
        setTimeout(() => backdrop.classList.add('hidden'), 300);
    }

    function switchQvTab(tabId) {
        // Reset buttons
        document.querySelectorAll('.qv-tab-btn').forEach(btn => {
            btn.classList.remove('border-[#6B0D18]', 'text-[#6B0D18]', 'font-bold');
            btn.classList.add('border-transparent', 'text-gray-500', 'font-medium');
        });
        
        // Active button
        const activeBtn = document.getElementById('btn-tab-' + tabId);
        if(activeBtn) {
            activeBtn.classList.remove('border-transparent', 'text-gray-500', 'font-medium');
            activeBtn.classList.add('border-[#6B0D18]', 'text-[#6B0D18]', 'font-bold');
        }

        // Reset contents
        document.querySelectorAll('.qv-tab-content').forEach(content => {
            content.classList.remove('block');
            content.classList.add('hidden');
        });

        // Active content
        const activeContent = document.getElementById('qv-tab-' + tabId);
        if(activeContent) {
            activeContent.classList.remove('hidden');
            activeContent.classList.add('block');
        }
    }
</script>
