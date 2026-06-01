<!-- ================== OVERLAYS & MODALS ================== -->
<div id="modalOverlay" class="fixed inset-0 bg-black/50 z-40 hidden opacity-0 transition-opacity duration-300" onclick="closeAll()"></div>

<!-- Drawer Xem Nhanh -->
<div id="postDrawer" class="fixed top-0 right-0 h-full w-[700px] max-w-full bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-white sticky top-0 z-10">
        <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:text-box-search-outline"></span> Xem trước bài viết
        </h3>
        <button onclick="closePostDrawer()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
    </div>
    
    <div class="flex-1 overflow-y-auto bg-gray-50 p-6">
        <!-- Card preview như bên ngoài web -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden max-w-[600px] mx-auto">
            <div class="h-64 w-full bg-gray-200">
                <img src="https://images.unsplash.com/photo-1611080352516-724bbba96ee7?w=800&q=80" alt="Thumbnail" class="w-full h-full object-cover">
            </div>
            <div class="p-8">
                <div class="flex items-center gap-3 mb-4">
                    <span class="inline-flex px-2 py-1 rounded text-[11px] font-bold uppercase tracking-wider bg-red-50 text-[#6B0D18]">Chọn vòng theo mệnh</span>
                    <span class="text-xs text-gray-400">17 Tháng 5, 2026</span>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4 leading-tight font-luxury">Cách chọn vòng phong thủy theo mệnh chuẩn và dễ hiểu</h1>
                <div class="flex gap-2 mb-6 border-b border-gray-100 pb-6">
                    <span class="text-xs text-gray-500 flex items-center gap-1"><span class="iconify" data-icon="mdi:eye"></span> 1.248 lượt xem</span>
                    <span class="text-xs text-gray-500 flex items-center gap-1"><span class="iconify" data-icon="mdi:account-edit"></span> Hải Admin</span>
                </div>
                
                <div class="prose prose-sm max-w-none text-gray-700 space-y-4">
                    <p class="font-medium">Việc chọn vòng phong thủy không chỉ dựa vào sở thích mà còn cần tuân theo ngũ hành tương sinh tương khắc. Bài viết này sẽ hướng dẫn bạn cách chọn màu sắc vòng đá phù hợp nhất.</p>
                    <h3>1. Người mệnh Kim</h3>
                    <p>Mệnh Kim hợp với các màu tương sinh thuộc Thổ (Vàng, Nâu đất) và màu tương hợp (Trắng, Xám, Ghi). Không nên chọn màu thuộc Hỏa (Đỏ, Hồng, Tím).</p>
                    <!-- Khối sản phẩm gợi ý -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 my-4 flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1599643478514-4a820cbf311c?w=100&h=100&fit=crop" class="w-16 h-16 rounded-md object-cover">
                        <div>
                            <div class="font-bold text-gray-800 text-sm">Vòng ngọc bích tự nhiên Mix Tỳ hưu</div>
                            <div class="text-[#6B0D18] font-bold text-sm mt-1">1.250.000đ</div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 pt-4 border-t border-gray-100 flex flex-wrap gap-2">
                    <span class="text-xs font-medium text-gray-500 mt-1 mr-2">Tags:</span>
                    <span class="inline-flex px-2 py-1 rounded bg-gray-100 text-gray-600 text-xs">Mệnh Kim</span>
                    <span class="inline-flex px-2 py-1 rounded bg-gray-100 text-gray-600 text-xs">Ngọc bích</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="px-6 py-4 bg-white border-t border-gray-100 flex justify-between gap-3 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
        <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-1">
            <span class="iconify" data-icon="mdi:web"></span> Xem trên website
        </button>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-white border border-amber-200 text-amber-600 rounded-lg hover:bg-amber-50 transition-colors font-medium text-sm" onclick="openHideModal()">Ẩn bài</button>
            <a href="<?= APP_URL ?>/admin/post/sua" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md">Chỉnh sửa</a>
        </div>
    </div>
</div>

<!-- Modal Ẩn Bài -->
<div id="hideModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[400px] transform scale-95 transition-transform duration-300 p-6 text-center">
        <div class="w-16 h-16 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl" data-icon="mdi:eye-off-outline"></span>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Ẩn bài viết này?</h3>
        <p class="text-gray-500 text-sm mb-6">Bài viết sẽ không còn hiển thị ở trang người dùng, nhưng vẫn được lưu trong hệ thống quản trị.</p>
        <div class="flex gap-3 w-full">
            <button onclick="closeHideModal()" class="flex-1 px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm">Hủy</button>
            <button onclick="closeHideModal(); showToast('Đã ẩn bài viết.')" class="flex-1 px-4 py-2.5 bg-amber-500 text-white rounded-lg hover:bg-amber-600 font-medium text-sm shadow-md">Xác nhận ẩn</button>
        </div>
    </div>
</div>

<!-- Modal Xóa Bài -->
<div id="deleteModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[400px] transform scale-95 transition-transform duration-300 p-6 text-center">
        <div class="w-16 h-16 rounded-full bg-red-100 text-red-600 flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl" data-icon="mdi:trash-can-outline"></span>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Xóa bài viết?</h3>
        <p class="text-gray-500 text-sm mb-4">Bạn có chắc muốn xóa vĩnh viễn bài viết này không?</p>
        <div class="bg-amber-50 p-3 rounded-lg border border-amber-100 mb-6 text-xs text-amber-700 text-left">
            <span class="font-bold">Lưu ý:</span> Bài viết này đã có lượt xem và bình luận. Việc xóa sẽ làm mất dữ liệu. Bạn nên <strong>Ẩn bài viết</strong> thay vì xóa.
        </div>
        <div class="flex gap-3 w-full">
            <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm">Hủy</button>
            <button onclick="closeDeleteModal(); showToast('Đã xóa bài viết.')" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 font-medium text-sm shadow-md">Xóa vĩnh viễn</button>
        </div>
    </div>
</div>



