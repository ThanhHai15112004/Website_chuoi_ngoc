<?php
// views/components/Admin/xuat_kho/drawer_chi_tiet.php
?>
<div id="drawerChiTietPhieu" class="fixed inset-y-0 right-0 w-full md:w-[800px] lg:w-[900px] bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-[60] flex flex-col">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/80 backdrop-blur-sm">
        <div class="flex items-center gap-3">
            <h2 class="text-xl font-bold text-gray-900">Chi tiết phiếu xuất</h2>
            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold uppercase tracking-wide bg-orange-50 text-orange-600 border border-orange-200">
                Chờ xuất kho
            </span>
        </div>
        <div class="flex items-center gap-2">
            <button class="p-2 text-gray-400 hover:text-gray-700 hover:bg-white rounded-full transition-colors focus:outline-none shadow-sm tooltip" title="Sao chép liên kết">
                <span class="iconify text-xl" data-icon="mdi:link-variant"></span>
            </button>
            <button onclick="closeDrawer()" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-white rounded-full transition-colors focus:outline-none shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
    </div>

    <!-- Body -->
    <div class="flex-1 overflow-y-auto bg-white flex flex-col">
        
        <!-- Header thông tin chung dính (Sticky) -->
        <div class="px-6 pt-6 pb-4 border-b border-gray-100 bg-white sticky top-0 z-10">
            <div class="flex justify-between items-start mb-4">
                <div class="flex gap-4 items-start">
                    <div class="w-12 h-12 rounded-xl bg-red-50 text-[#6B0D18] flex items-center justify-center shrink-0">
                        <span class="iconify text-2xl" data-icon="mdi:package-variant"></span>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-[#6B0D18] tracking-tight">XK202600123</div>
                        <div class="text-sm text-gray-500 mt-1 flex items-center gap-2">
                            <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded text-xs font-medium">Đơn hàng</span>
                            <span>&bull;</span>
                            <span class="flex items-center gap-1"><span class="iconify" data-icon="mdi:warehouse"></span> Kho online</span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-sm font-medium text-gray-900">18/05/2026 09:30</div>
                    <div class="text-xs text-gray-500 mt-1">Ngày tạo phiếu</div>
                </div>
            </div>

            <!-- Tabs Navigation -->
            <div class="flex gap-1 overflow-x-auto hide-scrollbar mt-4 border-b border-gray-200">
                <button onclick="switchDrawerTab('tab-tong-quan')" class="drawer-tab px-4 py-2.5 text-sm font-bold text-[#6B0D18] border-b-2 border-[#6B0D18] whitespace-nowrap">1. Tổng quan</button>
                <button onclick="switchDrawerTab('tab-san-pham')" class="drawer-tab px-4 py-2.5 text-sm font-medium text-gray-500 hover:text-gray-900 border-b-2 border-transparent whitespace-nowrap">2. Sản phẩm xuất (2)</button>
                <button onclick="switchDrawerTab('tab-chuan-bi')" class="drawer-tab px-4 py-2.5 text-sm font-medium text-gray-500 hover:text-gray-900 border-b-2 border-transparent whitespace-nowrap">3. Chuẩn bị hàng</button>
                <button onclick="switchDrawerTab('tab-lien-ket')" class="drawer-tab px-4 py-2.5 text-sm font-medium text-gray-500 hover:text-gray-900 border-b-2 border-transparent whitespace-nowrap">4. Liên kết đơn hàng</button>
                <button onclick="switchDrawerTab('tab-dinh-kem')" class="drawer-tab px-4 py-2.5 text-sm font-medium text-gray-500 hover:text-gray-900 border-b-2 border-transparent whitespace-nowrap">5. Tệp đính kèm (1)</button>
                <button onclick="switchDrawerTab('tab-lich-su')" class="drawer-tab px-4 py-2.5 text-sm font-medium text-gray-500 hover:text-gray-900 border-b-2 border-transparent whitespace-nowrap">6. Lịch sử xử lý</button>
            </div>
        </div>

        <!-- Tab Contents -->
        <div class="p-6 flex-1">
            
            <!-- Tab 1: Tổng quan -->
            <div id="tab-tong-quan" class="drawer-tab-content space-y-6 block">
                <div class="grid grid-cols-2 gap-6 bg-gray-50 rounded-xl p-5 border border-gray-100">
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Mã phiếu</div>
                        <div class="font-bold text-gray-900">XK202600123</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Loại xuất</div>
                        <div class="font-medium text-gray-900">Xuất cho đơn hàng</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Kho xuất</div>
                        <div class="font-medium text-gray-900 flex items-center gap-1">
                            <span class="iconify text-gray-400" data-icon="mdi:map-marker-outline"></span> Kho online / Khu A / Kệ A1
                        </div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Đối tượng nhận</div>
                        <div class="font-bold text-[#6B0D18]">Đơn #DH202600123</div>
                        <div class="text-xs text-gray-500">Nguyễn Văn A (Khách lẻ)</div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 border-b border-gray-100 pb-6">
                    <div class="bg-white border border-gray-200 rounded-lg p-3 text-center">
                        <div class="text-xs text-gray-500 mb-1">Tổng sản phẩm</div>
                        <div class="font-black text-gray-900 text-lg">2</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg p-3 text-center">
                        <div class="text-xs text-gray-500 mb-1">Tổng SL xuất</div>
                        <div class="font-black text-[#6B0D18] text-lg">6 món</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg p-3 text-center">
                        <div class="text-xs text-gray-500 mb-1">Tổng giá trị</div>
                        <div class="font-black text-emerald-600 text-lg">12.500.000đ</div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div>
                        <div class="text-xs text-gray-500 mb-1 flex items-center gap-1"><span class="iconify" data-icon="mdi:account-edit"></span> Người tạo</div>
                        <div class="font-medium text-gray-900 text-sm">Hải Admin</div>
                        <div class="text-xs text-gray-500">Quản lý kho</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1 flex items-center gap-1"><span class="iconify" data-icon="mdi:account-check"></span> Người duyệt</div>
                        <div class="font-medium text-gray-900 text-sm">Thanh Admin</div>
                        <div class="text-xs text-gray-500">Quản lý cấp cao</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1 flex items-center gap-1"><span class="iconify" data-icon="mdi:account-arrow-right"></span> Người xuất</div>
                        <div class="font-medium text-gray-400 text-sm italic">Chưa xuất</div>
                    </div>
                </div>

                <div class="bg-yellow-50/50 border border-yellow-100 rounded-xl p-4">
                    <h4 class="text-sm font-bold text-gray-900 mb-2 flex items-center gap-2">
                        <span class="iconify text-yellow-600" data-icon="mdi:message-draw"></span> Ghi chú nội bộ
                    </h4>
                    <p class="text-sm text-gray-700 italic">Khách hàng yêu cầu bọc quà kỹ vì là quà tặng. Đơn xuất gấp trong ngày 18/05.</p>
                </div>
            </div>

            <!-- Tab 2: Sản phẩm xuất -->
            <div id="tab-san-pham" class="drawer-tab-content hidden">
                <div class="border border-gray-200 rounded-xl overflow-hidden mb-4">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[800px]">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500">
                                    <th class="py-3 px-4 font-semibold w-64">Sản phẩm</th>
                                    <th class="py-3 px-4 font-semibold">SKU / Vị trí</th>
                                    <th class="py-3 px-4 font-semibold text-center w-20">Tồn kho</th>
                                    <th class="py-3 px-4 font-semibold text-center w-20">Cần xuất</th>
                                    <th class="py-3 px-4 font-semibold text-center w-20">Thực xuất</th>
                                    <th class="py-3 px-4 font-semibold text-right">Giá trị xuất</th>
                                    <th class="py-3 px-4 font-semibold text-center w-24">Kết quả</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <!-- SP 1 -->
                                <tr class="hover:bg-gray-50 transition-colors bg-emerald-50/20">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded bg-gray-100 border border-gray-200 flex-shrink-0"></div>
                                            <div class="flex-1 min-w-0">
                                                <div class="font-bold text-gray-900 text-sm truncate">Vòng Ngọc Bích Tài Lộc</div>
                                                <div class="text-xs text-gray-500 mt-0.5">Size 16cm</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="text-sm font-mono text-gray-700">NB-TL-16</div>
                                        <div class="text-xs text-gray-500 flex items-center gap-1 mt-1"><span class="iconify" data-icon="mdi:map-marker-outline"></span> Kệ A1</div>
                                    </td>
                                    <td class="py-3 px-4 text-center"><span class="font-medium text-gray-900">25</span></td>
                                    <td class="py-3 px-4 text-center"><span class="font-bold text-gray-900 text-lg">1</span></td>
                                    <td class="py-3 px-4 text-center"><span class="font-bold text-emerald-600 text-lg">1</span></td>
                                    <td class="py-3 px-4 text-right"><span class="font-bold text-[#6B0D18] text-sm">2.400.000đ</span></td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="inline-flex items-center px-2 py-1 rounded text-[10px] font-bold bg-emerald-100 text-emerald-700">Đủ hàng</span>
                                    </td>
                                </tr>
                                <!-- SP 2 -->
                                <tr class="hover:bg-gray-50 transition-colors bg-rose-50/20">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded bg-gray-100 border border-gray-200 flex-shrink-0"></div>
                                            <div class="flex-1 min-w-0">
                                                <div class="font-bold text-gray-900 text-sm truncate">Nhẫn ngọc trai đính kim cương</div>
                                                <div class="text-xs text-gray-500 mt-0.5">Size 6</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="text-sm font-mono text-gray-700">NT-001</div>
                                        <div class="text-xs text-gray-500 flex items-center gap-1 mt-1"><span class="iconify" data-icon="mdi:map-marker-outline"></span> Tủ kính C</div>
                                    </td>
                                    <td class="py-3 px-4 text-center"><span class="font-bold text-rose-600">3</span></td>
                                    <td class="py-3 px-4 text-center"><span class="font-bold text-gray-900 text-lg">5</span></td>
                                    <td class="py-3 px-4 text-center"><span class="font-bold text-rose-600 text-lg">3</span></td>
                                    <td class="py-3 px-4 text-right"><span class="font-bold text-[#6B0D18] text-sm">10.100.000đ</span></td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="inline-flex items-center px-2 py-1 rounded text-[10px] font-bold bg-rose-100 text-rose-700">Thiếu 2</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-gray-50 p-4 border-t border-gray-200 flex items-center justify-between">
                        <span class="text-sm text-gray-600">Tồn kho sau khi xuất sản phẩm 2 sẽ giảm xuống <strong>0</strong>.</span>
                        <div class="text-right">
                            <span class="text-xs text-gray-500 mr-2">Tổng giá trị:</span>
                            <span class="text-xl font-black text-[#6B0D18]">12.500.000đ</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 3: Chuẩn bị hàng -->
            <div id="tab-chuan-bi" class="drawer-tab-content hidden">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center mb-6">
                    <div class="flex items-end justify-between mb-3">
                        <div class="text-gray-900 font-bold text-lg">Tiến độ nhặt hàng</div>
                        <div class="text-3xl font-black text-[#6B0D18]">4<span class="text-lg text-gray-400 font-medium">/6</span> <span class="text-sm font-normal text-gray-500">món</span></div>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-4 mb-3 overflow-hidden">
                        <div class="bg-gradient-to-r from-red-500 to-[#6B0D18] h-4 rounded-full transition-all duration-500" style="width: 66%"></div>
                    </div>
                    <div class="flex items-center justify-between text-sm font-medium">
                        <span class="text-emerald-600 flex items-center gap-1"><span class="iconify" data-icon="mdi:check-circle"></span> Đã lấy: 4 món</span>
                        <span class="text-rose-500 flex items-center gap-1"><span class="iconify" data-icon="mdi:alert-circle"></span> Thiếu: 2 món</span>
                    </div>
                </div>
                
                <div class="bg-rose-50 border border-rose-100 rounded-xl p-4">
                    <div class="flex items-start gap-3">
                        <span class="iconify text-rose-600 text-2xl shrink-0" data-icon="mdi:alert-outline"></span>
                        <div>
                            <h4 class="font-bold text-rose-800">Cảnh báo thiếu hàng thực tế</h4>
                            <p class="text-sm text-rose-600 mt-1">Sản phẩm <strong>Nhẫn ngọc trai đính kim cương</strong> (NT-001) chỉ còn 3 món thực tế trên kệ, thiếu 2 món so với yêu cầu đơn hàng. Cần liên hệ lại với khách hàng hoặc bổ sung nguồn hàng.</p>
                            <p class="text-xs text-rose-500 mt-2 font-medium">Người báo thiếu: Nhân viên Kho A - 18/05 lúc 10:05</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 4: Liên kết đơn hàng -->
            <div id="tab-lien-ket" class="drawer-tab-content hidden">
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                    <div class="bg-blue-50/50 px-5 py-4 border-b border-gray-200 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="iconify text-blue-600 text-xl" data-icon="mdi:cart-outline"></span>
                            <h3 class="font-bold text-gray-900">Thông tin đơn hàng liên kết</h3>
                        </div>
                        <a href="#" class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1">
                            Xem chi tiết đơn <span class="iconify" data-icon="mdi:open-in-new"></span>
                        </a>
                    </div>
                    <div class="p-5">
                        <div class="grid grid-cols-2 gap-y-4 gap-x-6 text-sm mb-6">
                            <div>
                                <div class="text-gray-500 mb-1">Mã đơn hàng</div>
                                <div class="font-bold text-[#6B0D18] text-lg">#DH202600123</div>
                            </div>
                            <div>
                                <div class="text-gray-500 mb-1">Trạng thái đơn</div>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold uppercase tracking-wide bg-blue-50 text-blue-600 border border-blue-200">
                                    Đã xác nhận thanh toán
                                </span>
                            </div>
                            <div>
                                <div class="text-gray-500 mb-1">Khách hàng</div>
                                <div class="font-medium text-gray-900">Nguyễn Văn A</div>
                                <div class="text-gray-500">0901 234 567</div>
                            </div>
                            <div>
                                <div class="text-gray-500 mb-1">Kênh bán</div>
                                <div class="font-medium text-gray-900 flex items-center gap-1">
                                    <span class="iconify text-blue-500" data-icon="mdi:web"></span> Website
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-100 pt-4">
                            <div class="text-gray-500 mb-2 text-sm">Địa chỉ giao hàng</div>
                            <div class="font-medium text-gray-900 text-sm">Nguyễn Văn A - 0901 234 567</div>
                            <div class="text-gray-600 text-sm mt-1">123 Đường Nguyễn Văn Cừ, Phường 4, Quận 5, TP. Hồ Chí Minh</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 5: Tệp đính kèm -->
            <div id="tab-dinh-kem" class="drawer-tab-content hidden">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-gray-900">Danh sách tệp đính kèm</h3>
                    <button class="px-3 py-1.5 text-sm bg-gray-50 border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-100 font-medium transition-colors flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:upload"></span> Tải lên
                    </button>
                </div>
                
                <div class="space-y-3">
                    <!-- File item -->
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg bg-white hover:border-gray-300 transition-colors group cursor-pointer">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded bg-red-50 text-red-500 flex items-center justify-center">
                                <span class="iconify text-2xl" data-icon="mdi:file-pdf-box"></span>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900 text-sm group-hover:text-[#6B0D18] transition-colors">Yeu_cau_xuat_kho_Giam_Doc.pdf</div>
                                <div class="text-xs text-gray-500 mt-0.5">2.4 MB &bull; Tải lên bởi Hải Admin &bull; 18/05/2026</div>
                            </div>
                        </div>
                        <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 text-gray-400 hover:text-blue-600 rounded transition-colors tooltip" title="Tải xuống">
                                <span class="iconify text-lg" data-icon="mdi:download"></span>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-rose-600 rounded transition-colors tooltip" title="Xóa file">
                                <span class="iconify text-lg" data-icon="mdi:trash-can-outline"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 6: Lịch sử xử lý (Timeline) -->
            <div id="tab-lich-su" class="drawer-tab-content hidden">
                <div class="relative pl-6 border-l-2 border-gray-100 space-y-8 mt-4 ml-4">
                    
                    <!-- Step 4 (Current) -->
                    <div class="relative">
                        <div class="absolute -left-[35px] bg-orange-100 text-orange-500 w-8 h-8 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                            <span class="iconify text-sm" data-icon="mdi:package-variant-closed"></span>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <h4 class="font-bold text-gray-900">Đang chuẩn bị hàng</h4>
                                <span class="text-xs font-medium text-gray-500">10:00 - 18/05/2026</span>
                            </div>
                            <p class="text-sm text-gray-600">Nhân viên kho đang tiến hành lấy hàng theo danh sách. Đã lấy 4/6 món.</p>
                            <div class="mt-2 text-xs text-rose-500 font-medium bg-rose-50 p-2 rounded inline-block border border-rose-100">
                                Phát hiện thiếu 2 sản phẩm (Nhẫn ngọc trai NT-001)
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative">
                        <div class="absolute -left-[35px] bg-emerald-100 text-emerald-600 w-8 h-8 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                            <span class="iconify text-sm" data-icon="mdi:shield-check"></span>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <h4 class="font-bold text-gray-900">Đã duyệt phiếu</h4>
                                <span class="text-xs font-medium text-gray-500">09:45 - 18/05/2026</span>
                            </div>
                            <p class="text-sm text-gray-600">Thanh Admin (Quản lý cấp cao) đã duyệt phiếu.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative">
                        <div class="absolute -left-[35px] bg-blue-100 text-blue-600 w-8 h-8 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                            <span class="iconify text-sm" data-icon="mdi:send"></span>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <h4 class="font-bold text-gray-900">Gửi yêu cầu duyệt</h4>
                                <span class="text-xs font-medium text-gray-500">09:35 - 18/05/2026</span>
                            </div>
                            <p class="text-sm text-gray-600">Hải Admin đã gửi yêu cầu duyệt phiếu lên cấp quản lý.</p>
                        </div>
                    </div>

                    <!-- Step 1 -->
                    <div class="relative">
                        <div class="absolute -left-[35px] bg-gray-200 text-gray-600 w-8 h-8 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                            <span class="iconify text-sm" data-icon="mdi:file-document-edit"></span>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <h4 class="font-bold text-gray-900">Tạo phiếu xuất kho (Nháp)</h4>
                                <span class="text-xs font-medium text-gray-500">09:30 - 18/05/2026</span>
                            </div>
                            <p class="text-sm text-gray-600">Hải Admin đã tạo mới phiếu xuất kho từ Đơn hàng #DH202600123.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Footer Actions -->
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between gap-3 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] relative z-20">
        <button type="button" onclick="openModal('modalHuyPhieu')" class="px-4 py-2.5 bg-white border border-rose-200 text-rose-600 rounded-lg hover:bg-rose-50 font-medium transition-colors text-sm">
            Hủy phiếu
        </button>
        <div class="flex gap-2">
            <button type="button" onclick="openModal('modalInPhieu')" class="px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:printer"></span> In / Xuất
            </button>
            <a href="<?= APP_URL ?>/admin/xuat-kho/chuan-bi/XK202600123" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-bold transition-colors shadow-sm flex items-center gap-2 text-sm">
                <span class="iconify" data-icon="mdi:package-variant-closed"></span> Tiếp tục chuẩn bị hàng
            </a>
        </div>
    </div>
</div>

<script>
    function switchDrawerTab(tabId) {
        // Hide all contents
        const contents = document.querySelectorAll('.drawer-tab-content');
        contents.forEach(content => {
            content.classList.add('hidden');
            content.classList.remove('block');
        });
        
        // Show target content
        const target = document.getElementById(tabId);
        if(target) {
            target.classList.remove('hidden');
            target.classList.add('block');
        }

        // Update tab styles
        const tabs = document.querySelectorAll('.drawer-tab');
        tabs.forEach(tab => {
            tab.classList.remove('text-[#6B0D18]', 'border-[#6B0D18]', 'font-bold');
            tab.classList.add('text-gray-500', 'border-transparent', 'font-medium');
        });

        // Highlight clicked tab
        const clickedTab = Array.from(tabs).find(t => t.getAttribute('onclick').includes(tabId));
        if (clickedTab) {
            clickedTab.classList.remove('text-gray-500', 'border-transparent', 'font-medium');
            clickedTab.classList.add('text-[#6B0D18]', 'border-[#6B0D18]', 'font-bold');
        }
    }
</script>
