<!-- Modal Thêm Năm Sinh -->
<div id="addYearModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800">Thêm Năm sinh cho Mệnh Mộc</h3>
            <button class="text-gray-400 hover:text-gray-700 transition-colors" onclick="document.getElementById('addYearModal').classList.add('hidden')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Năm sinh</label>
                <input type="number" placeholder="Ví dụ: 1988" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Can chi (tùy chọn)</label>
                <input type="text" placeholder="Ví dụ: Mậu Thìn" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('addYearModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-[#8A111F]" onclick="document.getElementById('addYearModal').classList.add('hidden'); showFormToast('Đã thêm năm sinh');">Lưu năm sinh</button>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="formToast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[90]">
    <div class="text-emerald-500 mt-0.5"><span class="iconify text-xl" data-icon="mdi:check-circle"></span></div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toastMsg">Đã cập nhật thông tin Mệnh Mộc.</p>
    </div>
</div>

