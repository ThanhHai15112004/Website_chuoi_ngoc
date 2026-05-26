<?php
// views/components/Admin/nhap_kho/form/form_supplier.php
?>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    
    <!-- Cột Nhà cung cấp -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-gray-500" data-icon="mdi:truck-outline"></span>
                Nhà cung cấp
            </h3>
            <button class="text-[11px] font-medium text-[#6B0D18] hover:underline flex items-center gap-1">
                <span class="iconify" data-icon="mdi:plus"></span> Thêm nhanh NCC
            </button>
        </div>
        <div class="p-5">
            <label class="block text-sm font-medium text-gray-700 mb-1">Chọn nhà cung cấp <span class="text-red-500">*</span></label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="iconify text-gray-400" data-icon="mdi:magnify"></span>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm" placeholder="Tìm nhà cung cấp theo tên, mã, SĐT...">
            </div>

            <!-- Preview thông tin NCC khi đã chọn (Giả lập) -->
            <div class="mt-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                <div class="flex justify-between items-start">
                    <div>
                        <h4 class="font-bold text-gray-900">Công ty Ngọc An Phát</h4>
                        <p class="text-xs text-gray-500 mt-1">Mã NCC: NCC000123</p>
                    </div>
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">Đang hợp tác</span>
                </div>
                <div class="mt-3 grid grid-cols-2 gap-3 text-sm">
                    <div>
                        <span class="text-gray-500 block text-[11px] uppercase tracking-wide">Người liên hệ</span>
                        <span class="font-medium">Anh Tuấn - 0901234567</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block text-[11px] uppercase tracking-wide">Công nợ hiện tại</span>
                        <span class="font-bold text-orange-600">15.000.000đ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cột Kho nhận & Nhân sự -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-gray-500" data-icon="mdi:warehouse"></span>
                Kho nhập & Nhân sự
            </h3>
        </div>
        <div class="p-5 space-y-4">
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kho nhập hàng <span class="text-red-500">*</span></label>
                <select class="block w-full pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-lg shadow-sm">
                    <option value="" disabled>-- Chọn kho nhập --</option>
                    <option value="tong">Kho tổng</option>
                    <option value="online" selected>Kho online</option>
                    <option value="cho_kiem">Kho chờ kiểm</option>
                    <option value="cua_hang">Kho cửa hàng Q1</option>
                </select>
                <p class="text-[11px] text-gray-500 mt-1">Hàng hóa sẽ được cộng vào kho này sau khi duyệt phiếu.</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Người phụ trách nhập <span class="text-red-500">*</span></label>
                    <select class="block w-full pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-lg shadow-sm bg-gray-50 pointer-events-none">
                        <option value="hai" selected>Hải Admin</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Người kiểm hàng</label>
                    <select class="block w-full pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-lg shadow-sm">
                        <option value="">-- Chưa phân công --</option>
                        <option value="nv1">Nguyễn Văn A</option>
                        <option value="nv2">Trần Thị B</option>
                    </select>
                </div>
            </div>

        </div>
    </div>

</div>
