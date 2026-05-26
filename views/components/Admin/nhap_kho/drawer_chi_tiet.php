<?php
// views/components/Admin/nhap_kho/drawer_chi_tiet.php
?>
<div id="drawerChiTiet" class="fixed inset-y-0 right-0 w-full md:w-[600px] lg:w-[800px] bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-50 flex flex-col">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between bg-white shrink-0">
        <div class="flex items-center gap-3">
            <h2 class="text-xl font-bold text-gray-900">Chi tiết Phiếu nhập</h2>
            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                Đã nhập kho
            </span>
        </div>
        <div class="flex items-center gap-2">
            <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors tooltip" title="In phiếu">
                <span class="iconify text-xl" data-icon="mdi:printer-outline"></span>
            </button>
            <button onclick="closeDrawer()" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
    </div>

    <!-- Body (Scrollable) -->
    <div class="flex-1 overflow-y-auto bg-gray-50/30">
        
        <!-- Tổng quan -->
        <div class="p-6">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
                <div class="px-5 py-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                    <div>
                        <div class="text-sm text-gray-500 mb-1">Mã phiếu</div>
                        <div class="text-lg font-bold text-[#6B0D18]">NK202600123</div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm text-gray-500 mb-1">Ngày tạo</div>
                        <div class="text-sm font-medium text-gray-900">18/05/2026 09:30</div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-2 gap-x-8 gap-y-6">
                        <div>
                            <div class="text-[11px] text-gray-500 uppercase font-medium tracking-wide mb-1">Nhà cung cấp</div>
                            <div class="font-semibold text-gray-900">Công ty Ngọc An Phát</div>
                            <div class="text-sm text-gray-500">Mã NCC: NCC000123</div>
                        </div>
                        <div>
                            <div class="text-[11px] text-gray-500 uppercase font-medium tracking-wide mb-1">Kho nhập</div>
                            <div class="font-semibold text-gray-900">Kho online</div>
                            <div class="text-sm text-gray-500">Ngày nhập: 18/05/2026 16:30</div>
                        </div>
                        <div>
                            <div class="text-[11px] text-gray-500 uppercase font-medium tracking-wide mb-1">Nhân sự</div>
                            <div class="text-sm">
                                <span class="text-gray-500">Tạo bởi:</span> <span class="font-medium text-gray-900">Hải Admin</span>
                            </div>
                            <div class="text-sm mt-1">
                                <span class="text-gray-500">Kiểm bởi:</span> <span class="font-medium text-gray-900">Nguyễn Văn A</span>
                            </div>
                        </div>
                        <div>
                            <div class="text-[11px] text-gray-500 uppercase font-medium tracking-wide mb-1">Ghi chú</div>
                            <div class="text-sm text-gray-700 bg-yellow-50 p-2 rounded border border-yellow-100">
                                Lô ngọc bích tháng 5, cần kiểm kỹ màu và size vòng.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs chi tiết -->
            <div class="border-b border-gray-200 mb-4">
                <nav class="-mb-px flex space-x-6" aria-label="Tabs">
                    <a href="#" class="border-[#6B0D18] text-[#6B0D18] whitespace-nowrap py-3 border-b-2 font-medium text-sm">
                        Sản phẩm nhập (8)
                    </a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 border-b-2 font-medium text-sm">
                        Lịch sử xử lý
                    </a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 border-b-2 font-medium text-sm">
                        Tài liệu đính kèm (2)
                    </a>
                </nav>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto w-full">
                    <table class="w-full text-left border-collapse min-w-[700px]">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase text-gray-500 tracking-wider">
                                <th class="py-3 px-4 font-semibold">Sản phẩm / SKU</th>
                                <th class="py-3 px-4 font-semibold text-right">Dự kiến</th>
                                <th class="py-3 px-4 font-semibold text-right">Thực nhận</th>
                                <th class="py-3 px-4 font-semibold text-right">Giá nhập</th>
                                <th class="py-3 px-4 font-semibold text-right">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Dòng 1 -->
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-start gap-3">
                                        <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" class="w-10 h-10 rounded object-cover" alt="">
                                        <div>
                                            <div class="font-medium text-gray-900 text-sm">Vòng Ngọc Bích Tài Lộc</div>
                                            <div class="text-xs text-gray-500">SKU: NB-TL-16-8MM</div>
                                            <div class="text-[11px] text-gray-400 mt-0.5">Size 16cm · Hạt 8mm</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-right text-sm">50</td>
                                <td class="py-3 px-4 text-right text-sm font-bold text-emerald-600">50</td>
                                <td class="py-3 px-4 text-right text-sm">350.000đ</td>
                                <td class="py-3 px-4 text-right text-sm font-medium text-gray-900">17.500.000đ</td>
                            </tr>
                            <!-- Dòng 2 (Lỗi) -->
                            <tr class="hover:bg-gray-50 bg-rose-50/30">
                                <td class="py-3 px-4">
                                    <div class="flex items-start gap-3">
                                        <img src="https://images.unsplash.com/photo-1599643478514-4a888f61ca78?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" class="w-10 h-10 rounded object-cover" alt="">
                                        <div>
                                            <div class="font-medium text-gray-900 text-sm">Chuỗi Trầm Hương 108 Hạt</div>
                                            <div class="text-xs text-gray-500">SKU: C-TH-108-6MM</div>
                                            <span class="inline-flex mt-1 px-1.5 py-0.5 rounded text-[10px] font-medium bg-rose-100 text-rose-700">Lỗi: 2 hạt bị nứt</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-right text-sm">70</td>
                                <td class="py-3 px-4 text-right">
                                    <div class="text-sm font-bold text-gray-900">68</div>
                                    <div class="text-xs text-rose-600 font-medium mt-0.5">Lỗi: 2</div>
                                </td>
                                <td class="py-3 px-4 text-right text-sm">250.000đ</td>
                                <td class="py-3 px-4 text-right text-sm font-medium text-gray-900">17.000.000đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Footer Summary & Actions -->
    <div class="border-t border-gray-200 bg-white p-6 shrink-0 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
        <div class="flex items-end justify-between mb-4">
            <div>
                <p class="text-sm text-gray-500">Thanh toán</p>
                <div class="flex items-center gap-2 mt-1">
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-orange-50 text-orange-700 border border-orange-200">Công nợ</span>
                    <span class="text-sm font-medium text-rose-600">Nợ: 12.000.000đ</span>
                </div>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">Tổng cần thanh toán</p>
                <p class="text-2xl font-bold text-[#6B0D18] mt-1">35.600.000đ</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <button onclick="openModal('modalThanhToan')" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors flex items-center justify-center gap-2">
                <span class="iconify" data-icon="mdi:cash-plus"></span>
                Ghi nhận thanh toán
            </button>
            <button class="w-full px-4 py-2 border border-[#6B0D18] rounded-lg text-sm font-medium text-white bg-[#6B0D18] hover:bg-red-900 transition-colors flex items-center justify-center gap-2">
                <span class="iconify" data-icon="mdi:database-outline"></span>
                Xem tồn kho hiện tại
            </button>
        </div>
    </div>
</div>

<!-- Backdrop Drawer -->
<div id="drawerBackdrop" onclick="closeDrawer()" class="fixed inset-0 bg-gray-900/50 z-40 hidden backdrop-blur-sm transition-opacity"></div>

<script>
    function openDrawer(id) {
        document.getElementById('drawerBackdrop').classList.remove('hidden');
        setTimeout(() => {
            document.getElementById('drawerChiTiet').classList.remove('translate-x-full');
        }, 10);
        // Trong thực tế, gọi AJAX để lấy chi tiết id và render lại body
    }

    function closeDrawer() {
        document.getElementById('drawerChiTiet').classList.add('translate-x-full');
        setTimeout(() => {
            document.getElementById('drawerBackdrop').classList.add('hidden');
        }, 300);
    }
</script>
