<!-- Modal Xuất báo cáo -->
<div id="exportModal" class="fixed inset-0 z-[100] hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeExportModal()"></div>
    
    <!-- Modal Content -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:export-variant"></span> Xuất báo cáo doanh thu
            </h3>
            <button onclick="closeExportModal()" class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 p-1.5 rounded-lg transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        
        <!-- Body -->
        <div class="px-6 py-5 flex-1 overflow-y-auto custom-scrollbar">
            
            <div class="space-y-5">
                <!-- Chọn khoảng thời gian -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Khoảng thời gian báo cáo</label>
                    <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-800 font-medium">
                        01/05/2026 - 31/05/2026 (Tháng này)
                    </div>
                </div>

                <!-- Định dạng file -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Định dạng file</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="flex items-center gap-3 p-3 border border-[#6B0D18] rounded-xl cursor-pointer bg-red-50/30">
                            <input type="radio" name="export_format" value="excel" class="w-4 h-4 text-[#6B0D18] border-gray-300 focus:ring-[#6B0D18]" checked>
                            <span class="flex items-center gap-2 text-sm font-medium text-gray-800">
                                <span class="iconify text-green-600 text-lg" data-icon="mdi:file-excel"></span> Excel (.xlsx)
                            </span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:border-gray-300">
                            <input type="radio" name="export_format" value="pdf" class="w-4 h-4 text-[#6B0D18] border-gray-300 focus:ring-[#6B0D18]">
                            <span class="flex items-center gap-2 text-sm font-medium text-gray-800">
                                <span class="iconify text-red-600 text-lg" data-icon="mdi:file-pdf-box"></span> PDF (.pdf)
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Tùy chọn dữ liệu -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tùy chọn dữ liệu đính kèm</label>
                    <div class="space-y-2 border border-gray-100 rounded-xl p-3 bg-white">
                        <label class="flex items-center gap-3 p-2 rounded hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" checked class="w-4 h-4 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]">
                            <span class="text-sm text-gray-700">Chỉ số tổng quan (KPIs)</span>
                        </label>
                        <label class="flex items-center gap-3 p-2 rounded hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" checked class="w-4 h-4 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]">
                            <span class="text-sm text-gray-700">Hình ảnh biểu đồ</span>
                        </label>
                        <label class="flex items-center gap-3 p-2 rounded hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" checked class="w-4 h-4 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]">
                            <span class="text-sm text-gray-700">Bảng chi tiết từng đơn hàng</span>
                        </label>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Footer -->
        <div class="px-6 py-4 border-t border-gray-100 bg-white flex justify-end gap-3">
            <button onclick="closeExportModal()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                Hủy bỏ
            </button>
            <button onclick="startExport()" id="btnStartExport" class="px-5 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center gap-2">
                <span class="iconify" data-icon="mdi:download"></span> Bắt đầu xuất
            </button>
        </div>
    </div>
</div>

<script>
    function openExportModal() {
        const modal = document.getElementById('exportModal');
        modal.classList.remove('hidden');
    }

    function closeExportModal() {
        const modal = document.getElementById('exportModal');
        modal.classList.add('hidden');
    }

    function startExport() {
        const btn = document.getElementById('btnStartExport');
        const originalContent = btn.innerHTML;
        
        btn.innerHTML = `<span class="iconify animate-spin" data-icon="mdi:loading"></span> Đang tạo báo cáo...`;
        btn.disabled = true;
        btn.classList.add('opacity-75', 'cursor-not-allowed');

        // Giả lập delay export
        setTimeout(() => {
            btn.innerHTML = originalContent;
            btn.disabled = false;
            btn.classList.remove('opacity-75', 'cursor-not-allowed');
            closeExportModal();
            
            // Có thể thêm thư viện Toastify.js để hiện thông báo mượt hơn
            alert("Báo cáo đã sẵn sàng và đang được tải xuống!");
        }, 2000);
    }
</script>
