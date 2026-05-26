<!-- MODALS -->

<!-- Delete Modal -->
<div id="deleteStoneModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[450px] max-w-[90%] transform scale-95 transition-transform duration-300 p-6 flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-red-100 text-red-600 flex items-center justify-center mb-4">
            <span class="iconify text-3xl" data-icon="mdi:delete-alert-outline"></span>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Xác nhận xóa loại đá / ngọc</h3>
        <p class="text-gray-600 text-sm mb-2">Bạn có chắc muốn xóa <strong class="text-gray-900 text-lg" id="del-stone-name">Ngọc bích</strong> khỏi hệ thống?</p>
        
        <div class="text-amber-700 text-[13px] bg-amber-50 p-4 rounded-xl border border-amber-200 hidden w-full text-left mt-2 flex items-start gap-3" id="stone-delete-warning">
            <span class="iconify text-amber-500 text-2xl shrink-0" data-icon="mdi:alert"></span>
            <div>
                Loại đá này đang được sử dụng trong <strong class="text-amber-900" id="del-stone-count">0</strong> sản phẩm. 
                Bạn nên <strong class="text-amber-900">Ẩn loại đá</strong> thay vì xóa để tránh lỗi hiển thị bộ lọc ngoài trang người dùng.
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full mt-6">
            <button onclick="closeDeleteStoneModal()" class="flex-1 px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy bỏ</button>
            <button id="btn-hide-instead" class="hidden flex-1 px-4 py-2.5 bg-gray-100 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium text-sm" onclick="hideInstead()">Ẩn thay thế</button>
            <button id="btn-confirm-delete" onclick="executeDeleteStone()" class="flex-1 px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium text-sm shadow-md shadow-red-600/20">Xóa vĩnh viễn</button>
        </div>
    </div>
</div>

<!-- Details Drawer -->
<div id="detailsStoneDrawer" class="fixed inset-0 z-[60] hidden">
    <div class="absolute inset-0 bg-black/50 opacity-0 transition-opacity duration-300" onclick="closeStoneDetails()"></div>
    <div class="absolute right-0 top-0 bottom-0 w-[450px] max-w-full bg-white shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/80">
            <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:diamond-stone"></span> Chi tiết Đá / Ngọc
            </h3>
            <button onclick="closeStoneDetails()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        
        <div class="p-6 overflow-y-auto flex-1 space-y-6">
            <div class="flex items-center gap-4">
                <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg" class="w-20 h-20 rounded-xl object-cover border border-gray-200 shadow-sm shrink-0">
                <div>
                    <h4 class="text-2xl font-bold text-gray-800 mb-1" id="det-name">Ngọc bích</h4>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-sm text-gray-500 font-medium">Jade</span>
                        <span class="text-gray-300">|</span>
                        <span class="text-sm font-mono text-gray-400" id="det-code">STONE-JADE</span>
                    </div>
                    <span class="inline-flex px-2 py-0.5 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 uppercase tracking-wider" id="det-status">Đang hiển thị</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 flex flex-col">
                    <span class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Nhóm chất liệu</span>
                    <span class="font-bold text-gray-800">Ngọc</span>
                </div>
                <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 flex flex-col">
                    <span class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Màu sắc</span>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="w-3.5 h-3.5 rounded-full border border-gray-300 shadow-sm" style="background-color: #10B981"></span>
                        <span class="font-bold text-gray-800 text-sm">Xanh ngọc</span>
                    </div>
                </div>
            </div>

            <div>
                <div class="text-sm font-bold text-gray-800 mb-3 border-b border-gray-100 pb-2">Phong thủy & Ý nghĩa</div>
                <div class="space-y-4">
                    <div>
                        <span class="text-xs text-gray-500 block mb-2">Mệnh phù hợp:</span>
                        <div class="flex gap-2">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-red-50 text-[#6B0D18] border border-red-100">Mộc</span>
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-red-50 text-[#6B0D18] border border-red-100">Hỏa</span>
                        </div>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 block mb-2">Nhu cầu / Công dụng:</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex px-2 py-1 rounded text-xs bg-amber-50 text-amber-700 border border-amber-100">Bình an</span>
                            <span class="inline-flex px-2 py-1 rounded text-xs bg-amber-50 text-amber-700 border border-amber-100">Tài lộc</span>
                            <span class="inline-flex px-2 py-1 rounded text-xs bg-amber-50 text-amber-700 border border-amber-100">Sức khỏe tinh thần</span>
                        </div>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 block mb-1">Ý nghĩa chi tiết:</span>
                        <p class="text-sm text-gray-700 leading-relaxed bg-gray-50 p-3 rounded-lg border border-gray-100">Ngọc bích thường được xem là biểu tượng của sự bình an, hài hòa và tài lộc. Sắc xanh nhẹ nhàng của ngọc thường được gợi ý cho người mệnh Mộc và Hỏa.</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 block mb-1">Lưu ý sử dụng:</span>
                        <p class="text-sm text-gray-700 leading-relaxed bg-amber-50 p-3 rounded-lg border border-amber-100">Tránh va đập mạnh, hạn chế tiếp xúc hóa chất, nên lau bằng khăn mềm.</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 flex items-center justify-between">
                <div>
                    <span class="text-xs text-blue-600 block mb-0.5">Sản phẩm đang dùng loại đá này</span>
                    <div class="font-bold text-blue-800 text-lg">48 sản phẩm</div>
                </div>
                <button class="p-2 bg-white text-blue-600 rounded-lg shadow-sm hover:bg-blue-600 hover:text-white transition-colors">
                    <span class="iconify text-xl" data-icon="mdi:arrow-right"></span>
                </button>
            </div>
            
            <div class="text-xs text-gray-400 mt-4 text-center">
                Được tạo bởi: Admin - Cập nhật cuối: 18/05/2026 09:30
            </div>
        </div>
        
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex gap-3">
            <a href="<?= APP_URL ?>/admin/loai-da/sua" class="flex-1 text-center px-4 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md">Chỉnh sửa</a>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="stoneToast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]">
    <div class="text-emerald-500 mt-0.5"><span class="iconify text-xl" data-icon="mdi:check-circle"></span></div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="stone-toast-msg">Thao tác thành công.</p>
    </div>
    <button onclick="hideStoneToast()" class="text-gray-400 hover:text-gray-600 ml-4"><span class="iconify" data-icon="mdi:close"></span></button>
</div>

