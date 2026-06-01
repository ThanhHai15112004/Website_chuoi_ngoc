<!-- Modal Đăng Bài (Xác nhận) -->
<div id="publishModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[450px] transform scale-95 transition-transform duration-300 p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-2 border-b border-gray-100 pb-3 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:publish"></span> Xác nhận xuất bản
        </h3>
        
        <div class="py-4">
            <p class="text-gray-600 text-sm mb-4">Bài viết sẽ được hiển thị công khai trên website. Các cài đặt hiện tại:</p>
            
            <ul class="space-y-2 text-sm text-gray-700 bg-gray-50 p-4 rounded-lg border border-gray-200">
                <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Tiêu đề và nội dung đầy đủ</li>
                <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Đã chọn danh mục (Kiến thức phong thủy)</li>
                <li class="flex items-center gap-2"><span class="iconify text-amber-500" data-icon="mdi:alert-circle-outline"></span> Chưa điền Meta Description cho SEO</li>
            </ul>
        </div>

        <div class="flex gap-3 w-full justify-end mt-2 pt-4 border-t border-gray-100">
            <button onclick="closePublishModal()" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm">Quay lại chỉnh sửa</button>
            <button type="button" onclick="closePublishModal(); savePost(1)" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] font-medium text-sm shadow-md">Vẫn đăng bài</button>
        </div>
    </div>
</div>

