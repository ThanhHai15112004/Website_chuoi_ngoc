<?php
// views/components/Admin/nhat_ky/modals.php
?>

<!-- Modal Xuất Nhật ký -->
<div id="exportModal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeExportModal()"></div>
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md relative z-10 transform scale-95 opacity-0 transition-all duration-300" id="exportModalContent">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:file-export-outline"></span> Xuất nhật ký hoạt động
            </h3>
            <button onclick="closeExportModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        
        <div class="p-5 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Phạm vi xuất</label>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="exportScope" value="filtered" class="text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                        <span class="text-sm text-gray-700">Tất cả nhật ký theo bộ lọc hiện tại (128 dòng)</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="exportScope" value="danger" class="text-[#6B0D18] focus:ring-[#6B0D18]">
                        <span class="text-sm text-gray-700">Chỉ các hoạt động nguy hiểm và bảo mật</span>
                    </label>
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Khoảng thời gian</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                    <option value="today">Hôm nay</option>
                    <option value="7days">7 ngày qua</option>
                    <option value="30days" selected>30 ngày qua</option>
                    <option value="all">Tất cả thời gian</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Định dạng file</label>
                <div class="grid grid-cols-3 gap-3">
                    <label class="relative block cursor-pointer group">
                        <input type="radio" name="exportFormat" value="excel" class="peer sr-only" checked>
                        <div class="p-3 border border-gray-200 rounded-lg text-center hover:bg-gray-50 peer-checked:border-green-500 peer-checked:bg-green-50 transition-colors">
                            <span class="iconify text-green-600 text-2xl mx-auto mb-1" data-icon="mdi:microsoft-excel"></span>
                            <span class="text-xs font-bold text-gray-700 peer-checked:text-green-700">Excel</span>
                        </div>
                    </label>
                    <label class="relative block cursor-pointer group">
                        <input type="radio" name="exportFormat" value="csv" class="peer sr-only">
                        <div class="p-3 border border-gray-200 rounded-lg text-center hover:bg-gray-50 peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-colors">
                            <span class="iconify text-blue-600 text-2xl mx-auto mb-1" data-icon="mdi:file-delimited-outline"></span>
                            <span class="text-xs font-bold text-gray-700 peer-checked:text-blue-700">CSV</span>
                        </div>
                    </label>
                    <label class="relative block cursor-pointer group">
                        <input type="radio" name="exportFormat" value="pdf" class="peer sr-only">
                        <div class="p-3 border border-gray-200 rounded-lg text-center hover:bg-gray-50 peer-checked:border-red-500 peer-checked:bg-red-50 transition-colors">
                            <span class="iconify text-red-600 text-2xl mx-auto mb-1" data-icon="mdi:file-pdf-box"></span>
                            <span class="text-xs font-bold text-gray-700 peer-checked:text-red-700">PDF</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        
        <div class="p-5 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50 rounded-b-xl">
            <button onclick="closeExportModal()" class="px-4 py-2 bg-white text-gray-700 font-medium rounded-lg hover:bg-gray-50 border border-gray-200 transition-colors text-sm">Hủy bỏ</button>
            <button onclick="handleExport()" class="px-6 py-2 bg-[#6B0D18] text-white font-bold rounded-lg hover:bg-red-900 transition-colors text-sm shadow-md flex items-center gap-2">
                <span class="iconify" data-icon="mdi:download"></span> Bắt đầu xuất
            </button>
        </div>
    </div>
</div>

<!-- Modal Cấu hình lưu trữ -->
<div id="configModal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeConfigModal()"></div>
    <div class="bg-white rounded-xl shadow-xl w-full max-w-lg relative z-10 transform scale-95 opacity-0 transition-all duration-300" id="configModalContent">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-gray-500 text-xl" data-icon="mdi:cog-outline"></span> Cấu hình nhật ký
            </h3>
            <button onclick="closeConfigModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        
        <div class="p-5 space-y-5">
            <div>
                <label class="block text-sm font-bold text-gray-900 mb-1">Thời gian lưu trữ dữ liệu</label>
                <p class="text-xs text-gray-500 mb-3">Nhật ký cũ hơn thời gian này sẽ tự động bị xóa để giải phóng dung lượng database.</p>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                    <option value="30">30 ngày</option>
                    <option value="90">90 ngày</option>
                    <option value="180" selected>180 ngày (Mặc định)</option>
                    <option value="365">1 năm</option>
                    <option value="unlimited">Không giới hạn (Không khuyến nghị)</option>
                </select>
            </div>
            
            <hr class="border-gray-100">

            <div class="space-y-4">
                <h4 class="text-sm font-bold text-gray-900">Thiết lập ghi nhận</h4>
                
                <label class="flex items-start justify-between cursor-pointer group">
                    <div>
                        <p class="text-sm font-medium text-gray-900 group-hover:text-[#6B0D18]">Lưu địa chỉ IP & Thiết bị</p>
                        <p class="text-xs text-gray-500">Hỗ trợ tra cứu khi có xâm nhập trái phép.</p>
                    </div>
                    <div class="relative mt-1">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                    </div>
                </label>
                
                <label class="flex items-start justify-between cursor-pointer group">
                    <div>
                        <p class="text-sm font-medium text-gray-900 group-hover:text-[#6B0D18]">Ghi nhận hoạt động "Xem"</p>
                        <p class="text-xs text-gray-500">Tạo log khi nhân viên chỉ xem dữ liệu (Sẽ tốn nhiều dung lượng).</p>
                    </div>
                    <div class="relative mt-1">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                    </div>
                </label>
                
                <label class="flex items-start justify-between cursor-pointer group">
                    <div>
                        <p class="text-sm font-medium text-gray-900 group-hover:text-[#6B0D18]">Cảnh báo hành vi nguy hiểm</p>
                        <p class="text-xs text-gray-500">Hiển thị thông báo trên Dashboard khi có log cấp độ Nguy hiểm.</p>
                    </div>
                    <div class="relative mt-1">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                    </div>
                </label>
            </div>
        </div>
        
        <div class="p-5 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50 rounded-b-xl">
            <button onclick="closeConfigModal()" class="px-4 py-2 bg-white text-gray-700 font-medium rounded-lg hover:bg-gray-50 border border-gray-200 transition-colors text-sm">Hủy bỏ</button>
            <button onclick="closeConfigModal()" class="px-6 py-2 bg-[#6B0D18] text-white font-bold rounded-lg hover:bg-red-900 transition-colors text-sm shadow-md">Lưu cấu hình</button>
        </div>
    </div>
</div>

<script>
    // Export Modal
    function openExportModal() {
        const modal = document.getElementById('exportModal');
        const content = document.getElementById('exportModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeExportModal() {
        const modal = document.getElementById('exportModal');
        const content = document.getElementById('exportModalContent');
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => modal.classList.add('hidden'), 300);
    }

    function handleExport() {
        // Mock loading
        const btn = event.currentTarget;
        const originalContent = btn.innerHTML;
        btn.innerHTML = `<span class="iconify animate-spin" data-icon="mdi:loading"></span> Đang xử lý...`;
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = originalContent;
            btn.disabled = false;
            closeExportModal();
            // Show toast (giả lập)
            alert('Xuất nhật ký thành công! File đã được tải xuống.');
        }, 1500);
    }

    // Config Modal
    function openConfigModal() {
        const modal = document.getElementById('configModal');
        const content = document.getElementById('configModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeConfigModal() {
        const modal = document.getElementById('configModal');
        const content = document.getElementById('configModalContent');
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => modal.classList.add('hidden'), 300);
    }
</script>
