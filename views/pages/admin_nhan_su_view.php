<?php
// views/pages/admin_nhan_su_view.php
?>
<div class="px-4 md:px-6 py-6 pb-24 max-w-[1200px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-6">
        <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18] transition-colors">Admin</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <a href="<?= APP_URL ?>/admin/nhan-su" class="hover:text-[#6B0D18] transition-colors">Quản lý nhân sự</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span class="text-gray-900 font-medium">Chi tiết nhân viên</span>
    </nav>

    <!-- Header Thông tin -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div class="flex items-center gap-5">
            <img src="https://ui-avatars.com/api/?name=Hai+Admin&background=6B0D18&color=fff" alt="Avatar" class="w-20 h-20 rounded-full border-4 border-white shadow-md">
            <div>
                <div class="flex items-center gap-3 mb-1.5">
                    <h3 class="font-bold text-gray-900 text-2xl">Hải Admin</h3>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-emerald-100 text-emerald-700 border border-emerald-200">Đang hoạt động</span>
                </div>
                <p class="text-sm text-gray-500 flex items-center gap-2">
                    <span class="font-medium text-gray-700">NV0001</span> 
                    <span class="w-1 h-1 rounded-full bg-gray-300"></span> 
                    <span class="inline-flex items-center gap-1 font-bold text-[#6B0D18] bg-[#6B0D18]/10 px-2 py-0.5 rounded-md"><span class="iconify" data-icon="mdi:shield-crown-outline"></span> Super Admin</span>
                </p>
            </div>
        </div>
        
        <div class="flex flex-wrap items-center gap-3 w-full md:w-auto border-t border-gray-100 md:border-0 pt-4 md:pt-0 mt-2 md:mt-0">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify text-gray-400" data-icon="mdi:shield-account-outline"></span> Phân quyền
            </button>
            <button onclick="openLockModal()" class="px-4 py-2 bg-white border border-gray-200 text-orange-600 rounded-lg hover:bg-orange-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm tooltip" title="Khóa tài khoản">
                <span class="iconify text-lg" data-icon="mdi:lock-outline"></span> <span class="md:hidden">Khóa</span>
            </button>
            <a href="<?= APP_URL ?>/admin/nhan-su/sua/<?= $id ?>" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-bold flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
            </a>
        </div>
    </div>

    <!-- Nội dung chính chia 2 cột -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Cột trái: Menu Tabs / Thông tin cơ bản -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Menu Navigation -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden p-2">
                <button onclick="switchViewTab('tong-quan')" id="btn-view-tong-quan" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-sm font-bold text-[#6B0D18] bg-red-50 transition-colors mb-1">
                    <span class="iconify text-lg" data-icon="mdi:view-dashboard-outline"></span> Tổng quan
                </button>
                <button onclick="switchViewTab('thong-tin')" id="btn-view-thong-tin" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors mb-1">
                    <span class="iconify text-lg" data-icon="mdi:card-account-details-outline"></span> Thông tin cá nhân
                </button>
                <button onclick="switchViewTab('phan-quyen')" id="btn-view-phan-quyen" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors mb-1">
                    <span class="iconify text-lg" data-icon="mdi:shield-check-outline"></span> Vai trò & Quyền
                </button>
                <button onclick="switchViewTab('lich-su-dang-nhap')" id="btn-view-lich-su-dang-nhap" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors mb-1">
                    <span class="iconify text-lg" data-icon="mdi:login-variant"></span> Lịch sử đăng nhập
                </button>
                <button onclick="switchViewTab('nhat-ky')" id="btn-view-nhat-ky" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <span class="iconify text-lg" data-icon="mdi:history"></span> Nhật ký hoạt động
                </button>
            </div>

            <!-- Liên hệ nhanh -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5">
                <h4 class="text-sm font-bold text-gray-900 mb-4 pb-3 border-b border-gray-100 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:card-account-mail-outline"></span> Thông tin liên lạc
                </h4>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                            <span class="iconify" data-icon="mdi:email-outline"></span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-0.5">Email</p>
                            <p class="text-sm font-bold text-gray-900">thanhhai@example.com</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                            <span class="iconify" data-icon="mdi:phone-outline"></span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-0.5">Số điện thoại</p>
                            <p class="text-sm font-bold text-gray-900">0901 234 567</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                            <span class="iconify" data-icon="mdi:domain"></span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-0.5">Phòng ban</p>
                            <p class="text-sm font-bold text-gray-900">Quản trị hệ thống</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-orange-50 border border-orange-200 rounded-2xl p-5 shadow-sm">
                <h4 class="text-sm font-bold text-orange-800 mb-2 flex items-center gap-2">
                    <span class="iconify text-lg text-orange-500" data-icon="mdi:shield-alert-outline"></span> Cảnh báo quyền
                </h4>
                <p class="text-xs text-orange-700 leading-relaxed">Tài khoản này có toàn quyền truy cập và chỉnh sửa hệ thống. Hãy bảo mật cẩn thận và bật xác minh 2 bước nếu có thể.</p>
            </div>
        </div>

        <!-- Cột phải: Content Tabs -->
        <div class="lg:col-span-2">
            
            <!-- TAB TỔNG QUAN -->
            <div id="view-tab-tong-quan" class="view-tab-content block">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gray-50 text-gray-600 flex items-center justify-center shrink-0 border border-gray-100">
                            <span class="iconify text-2xl" data-icon="mdi:calendar-account-outline"></span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium mb-1">Ngày tạo tài khoản</p>
                            <p class="text-lg font-bold text-gray-900">01/01/2026</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <span class="iconify text-2xl" data-icon="mdi:login-variant"></span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium mb-1">Lần đăng nhập cuối</p>
                            <p class="text-lg font-bold text-gray-900">18/05/2026 <span class="text-sm text-gray-500 font-normal ml-1">09:30</span></p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-base font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <span class="iconify text-gray-400" data-icon="mdi:chart-line"></span> Thống kê hoạt động (Tháng này)
                    </h3>
                    <div class="grid grid-cols-3 divide-x divide-gray-100 border-y border-gray-100 py-6">
                        <div class="text-center px-4">
                            <p class="text-3xl font-bold text-[#6B0D18] mb-1">142</p>
                            <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Thao tác</p>
                        </div>
                        <div class="text-center px-4">
                            <p class="text-3xl font-bold text-emerald-600 mb-1">28</p>
                            <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Lần đăng nhập</p>
                        </div>
                        <div class="text-center px-4">
                            <p class="text-3xl font-bold text-blue-600 mb-1">5</p>
                            <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Địa chỉ IP khác nhau</p>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <h4 class="text-sm font-bold text-gray-900 mb-4">Mức độ thao tác theo Module</h4>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="font-medium text-gray-700">Quản lý Sản phẩm</span>
                                    <span class="text-gray-500">65 thao tác (45%)</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full" style="width: 45%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="font-medium text-gray-700">Quản lý Đơn hàng</span>
                                    <span class="text-gray-500">42 thao tác (30%)</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-emerald-500 h-2 rounded-full" style="width: 30%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="font-medium text-gray-700">Cấu hình hệ thống</span>
                                    <span class="text-gray-500">20 thao tác (14%)</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-orange-500 h-2 rounded-full" style="width: 14%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB THÔNG TIN -->
            <div id="view-tab-thong-tin" class="view-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                        <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:card-account-details-outline"></span> Chi tiết nhân sự
                        </h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-3 gap-6 border-b border-gray-100 pb-6">
                            <div class="col-span-1 text-sm font-medium text-gray-500">Họ và tên</div>
                            <div class="col-span-2 text-sm text-gray-900 font-bold">Hải Admin</div>
                        </div>
                        <div class="grid grid-cols-3 gap-6 border-b border-gray-100 pb-6">
                            <div class="col-span-1 text-sm font-medium text-gray-500">Mã NV</div>
                            <div class="col-span-2 text-sm text-gray-900">NV0001</div>
                        </div>
                        <div class="grid grid-cols-3 gap-6 border-b border-gray-100 pb-6">
                            <div class="col-span-1 text-sm font-medium text-gray-500">Ngày sinh</div>
                            <div class="col-span-2 text-sm text-gray-900">15/11/2004</div>
                        </div>
                        <div class="grid grid-cols-3 gap-6 border-b border-gray-100 pb-6">
                            <div class="col-span-1 text-sm font-medium text-gray-500">Địa chỉ</div>
                            <div class="col-span-2 text-sm text-gray-900">123 Nguyễn Văn Linh, Quận Hải Châu, TP. Đà Nẵng</div>
                        </div>
                        <div class="grid grid-cols-3 gap-6 border-b border-gray-100 pb-6">
                            <div class="col-span-1 text-sm font-medium text-gray-500">Ngày vào làm</div>
                            <div class="col-span-2 text-sm text-gray-900">01/01/2026</div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-1 text-sm font-medium text-gray-500">Ghi chú nội bộ</div>
                            <div class="col-span-2">
                                <p class="text-sm text-gray-600 bg-gray-50 p-4 rounded-xl border border-gray-100 italic">"Người sáng lập hệ thống. Phụ trách tổng thể nền tảng."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB PHÂN QUYỀN -->
            <div id="view-tab-phan-quyen" class="view-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:shield-check-outline"></span> Bảng phân quyền chi tiết
                        </h3>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-bold bg-[#6B0D18]/10 text-[#6B0D18] border border-[#6B0D18]/20">
                            <span class="iconify" data-icon="mdi:shield-crown-outline"></span> Super Admin
                        </span>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-between hover:border-gray-300 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-500">
                                    <span class="iconify text-xl" data-icon="mdi:package-variant-closed"></span>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900">Quản lý Sản phẩm</p>
                                    <p class="text-xs text-gray-500">Sản phẩm, danh mục, biến thể</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-100 text-emerald-700">Toàn quyền</span>
                        </div>
                        
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-between hover:border-gray-300 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-500">
                                    <span class="iconify text-xl" data-icon="mdi:receipt-text-outline"></span>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900">Quản lý Đơn hàng</p>
                                    <p class="text-xs text-gray-500">Đơn hàng, thanh toán, vận chuyển</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-100 text-emerald-700">Toàn quyền</span>
                        </div>

                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-between hover:border-gray-300 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-500">
                                    <span class="iconify text-xl" data-icon="mdi:warehouse"></span>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900">Quản lý Kho</p>
                                    <p class="text-xs text-gray-500">Nhập/xuất, kiểm kê tồn kho</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-100 text-emerald-700">Toàn quyền</span>
                        </div>

                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-between hover:border-gray-300 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-500">
                                    <span class="iconify text-xl" data-icon="mdi:finance"></span>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900">Báo cáo Doanh thu</p>
                                    <p class="text-xs text-gray-500">Thống kê, biểu đồ doanh thu</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-100 text-emerald-700">Toàn quyền</span>
                        </div>

                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-between hover:border-gray-300 transition-colors relative overflow-hidden">
                            <div class="absolute inset-0 bg-[#6B0D18]/5 pointer-events-none"></div>
                            <div class="flex items-center gap-3 relative z-10">
                                <div class="w-10 h-10 rounded-lg bg-white border border-[#6B0D18]/30 flex items-center justify-center text-[#6B0D18]">
                                    <span class="iconify text-xl" data-icon="mdi:cog-outline"></span>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900">Cấu hình & Nhân sự</p>
                                    <p class="text-xs text-gray-500">Hệ thống, phân quyền, bảo mật</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-[#6B0D18] text-white relative z-10 shadow-sm">Quyền tối cao</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB LỊCH SỬ -->
            <div id="view-tab-lich-su-dang-nhap" class="view-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/50">
                        <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:login-variant"></span> Phiên đăng nhập gần đây
                        </h3>
                    </div>
                    <table class="w-full text-left">
                        <thead class="bg-white border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-xs text-gray-500 font-medium">Thời gian</th>
                                <th class="px-6 py-3 text-xs text-gray-500 font-medium">IP / Thiết bị</th>
                                <th class="px-6 py-3 text-xs text-gray-500 font-medium text-right">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="text-sm font-bold text-gray-900">Hôm nay, 18/05/2026</p>
                                    <p class="text-xs text-gray-500">09:30:15</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-900 font-medium">113.160.22.1</p>
                                    <p class="text-xs text-gray-500 flex items-center gap-1 mt-0.5"><span class="iconify" data-icon="mdi:microsoft-windows"></span> Windows • Chrome</p>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">Thành công</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="text-sm font-bold text-gray-900">Hôm qua, 17/05/2026</p>
                                    <p class="text-xs text-gray-500">14:22:10</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-900 font-medium">113.160.22.1</p>
                                    <p class="text-xs text-gray-500 flex items-center gap-1 mt-0.5"><span class="iconify" data-icon="mdi:microsoft-windows"></span> Windows • Chrome</p>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">Thành công</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors bg-red-50/20">
                                <td class="px-6 py-4">
                                    <p class="text-sm font-bold text-gray-900">16/05/2026</p>
                                    <p class="text-xs text-gray-500">23:15:00</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-red-600 font-medium flex items-center gap-1"><span class="iconify" data-icon="mdi:alert-circle-outline"></span> 103.22.11.5 (IP Lạ)</p>
                                    <p class="text-xs text-gray-500 flex items-center gap-1 mt-0.5"><span class="iconify" data-icon="mdi:apple"></span> Mac OS • Safari</p>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-red-50 text-red-700 border border-red-100">Sai mật khẩu</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TAB NHẬT KÝ -->
            <div id="view-tab-nhat-ky" class="view-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:history"></span> Nhật ký hoạt động gần đây
                        </h3>
                        <a href="#" class="text-sm font-medium text-[#6B0D18] hover:underline flex items-center gap-1">Xem toàn bộ <span class="iconify" data-icon="mdi:arrow-right"></span></a>
                    </div>

                    <div class="relative border-l-2 border-gray-100 ml-4 space-y-8">
                        <!-- Item -->
                        <div class="relative pl-8">
                            <div class="absolute w-4 h-4 rounded-full bg-blue-500 border-[3px] border-white -left-[9px] top-1 shadow-sm"></div>
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-sm font-bold text-gray-900">Tạo phiếu nhập kho <a href="#" class="text-blue-600 hover:underline">PN00123</a></p>
                                    <p class="text-xs text-gray-500 font-medium whitespace-nowrap">18/05/2026 - 10:45</p>
                                </div>
                                <p class="text-xs text-gray-600 mb-2">Đã thêm 50 sản phẩm "Vòng tay thạch anh tím" vào kho chính.</p>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-white border border-gray-200 text-gray-500">Module: Quản lý Kho</span>
                            </div>
                        </div>
                        
                        <!-- Item -->
                        <div class="relative pl-8">
                            <div class="absolute w-4 h-4 rounded-full bg-orange-500 border-[3px] border-white -left-[9px] top-1 shadow-sm"></div>
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-sm font-bold text-gray-900">Cập nhật cấu hình <a href="#" class="text-blue-600 hover:underline">Chính sách cửa hàng</a></p>
                                    <p class="text-xs text-gray-500 font-medium whitespace-nowrap">18/05/2026 - 09:40</p>
                                </div>
                                <p class="text-xs text-gray-600 mb-2">Đã chỉnh sửa nội dung tab "Chính sách bảo hành".</p>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-white border border-gray-200 text-gray-500">Module: Cấu hình cửa hàng</span>
                            </div>
                        </div>

                        <!-- Item (Delete/Danger) -->
                        <div class="relative pl-8">
                            <div class="absolute w-4 h-4 rounded-full bg-red-500 border-[3px] border-white -left-[9px] top-1 shadow-sm"></div>
                            <div class="bg-red-50 rounded-xl p-4 border border-red-100">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-sm font-bold text-red-900">Xóa sản phẩm</p>
                                    <p class="text-xs text-red-500 font-medium whitespace-nowrap">17/05/2026 - 15:20</p>
                                </div>
                                <p class="text-xs text-red-700 mb-2">Xóa vĩnh viễn sản phẩm <span class="font-bold">"Vòng tay thạch anh hồng cũ"</span>.</p>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-white/50 border border-red-200 text-red-700">Module: Quản lý Sản phẩm</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modals -->
<?php require_once __DIR__ . '/../components/Admin/nhan_su/modals.php'; ?>

<script>
    function switchViewTab(tabId) {
        // Reset buttons
        document.querySelectorAll('[id^="btn-view-"]').forEach(btn => {
            btn.classList.remove('bg-red-50', 'text-[#6B0D18]', 'font-bold');
            btn.classList.add('text-gray-600', 'font-medium');
        });
        
        // Active button
        const activeBtn = document.getElementById('btn-view-' + tabId);
        if(activeBtn) {
            activeBtn.classList.remove('text-gray-600', 'font-medium');
            activeBtn.classList.add('bg-red-50', 'text-[#6B0D18]', 'font-bold');
        }

        // Reset contents
        document.querySelectorAll('.view-tab-content').forEach(content => {
            content.classList.remove('block');
            content.classList.add('hidden');
        });

        // Active content
        const activeContent = document.getElementById('view-tab-' + tabId);
        if(activeContent) {
            activeContent.classList.remove('hidden');
            activeContent.classList.add('block');
        }
    }
</script>
