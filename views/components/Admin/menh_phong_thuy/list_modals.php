<!-- Drawer Xem chi tiết Mệnh -->
<div id="destinyDrawerOverlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[60] hidden opacity-0 transition-opacity duration-300" onclick="closeDestinyDrawer()"></div>
<div id="destinyDrawer" class="fixed top-0 right-0 h-full w-full max-w-[420px] bg-[#FAF8F5] shadow-2xl z-[70] transform translate-x-full transition-transform duration-300 ease-out overflow-hidden flex flex-col">
    <!-- Drawer Header -->
    <div class="bg-white px-6 py-4 border-b border-gray-100 flex items-center justify-between shrink-0">
        <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
            Chi tiết bản mệnh
        </h3>
        <button class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition-colors" onclick="closeDestinyDrawer()">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>
    
    <!-- Drawer Content -->
    <div class="flex-1 overflow-y-auto p-6 scrollbar-hide" id="det-drawer-content">
        <!-- Banner/Title -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 mb-5 text-center relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 opacity-5">
                <span class="iconify text-9xl text-[#10B981]" id="det-bg-icon" data-icon="mdi:yin-yang"></span>
            </div>
            <div class="w-16 h-16 rounded-full bg-emerald-50 text-[#10B981] flex items-center justify-center mx-auto mb-3 shadow-sm border border-emerald-100" id="det-icon-container">
                <span class="iconify text-3xl" data-icon="mdi:yin-yang"></span>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-1" id="det-name"></h2>
            <p class="text-sm text-gray-500" id="det-short-desc"></p>
        </div>

        <div class="space-y-4">
            <!-- Màu sắc -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:palette-outline"></span> Màu sắc phong thủy
                </h4>
                <div class="space-y-4">
                    <div>
                        <span class="text-[11px] font-bold text-gray-400 block mb-1.5">MÀU ĐẠI DIỆN</span>
                        <div class="flex items-center gap-2">
                            <span class="w-5 h-5 rounded-full shadow-[0_0_0_1px_rgba(0,0,0,0.1)]" id="det-mau-dai-dien"></span>
                            <span class="text-sm font-medium text-gray-700" id="det-mau-dai-dien-text"></span>
                        </div>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-emerald-600 block mb-1.5">MÀU TƯƠNG SINH / TƯƠNG HỢP</span>
                        <div class="flex flex-wrap gap-2" id="det-mau-hop">
                        </div>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-red-500 block mb-1.5">MÀU TƯƠNG KHẮC (NÊN TRÁNH)</span>
                        <div class="flex flex-wrap gap-2" id="det-mau-ky">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Đá phù hợp -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:diamond-stone"></span> Đá / Ngọc phù hợp
                    </h4>
                    <span class="text-[10px] font-bold bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full" id="det-stones-count"></span>
                </div>
                <div class="flex flex-wrap gap-2" id="det-stones">
                </div>
            </div>

            <!-- Thống kê SP và Năm sinh -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 text-center cursor-pointer hover:border-[#6B0D18] transition-colors group">
                    <span class="iconify text-2xl text-gray-300 group-hover:text-[#6B0D18] mb-1 transition-colors" data-icon="mdi:package-variant-closed"></span>
                    <h5 class="text-[10px] font-bold text-gray-400 uppercase">Sản phẩm liên quan</h5>
                    <p class="text-xl font-bold text-gray-800 mt-1" id="det-sp-count">0</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 text-center cursor-pointer hover:border-[#6B0D18] transition-colors group">
                    <span class="iconify text-2xl text-gray-300 group-hover:text-[#6B0D18] mb-1 transition-colors" data-icon="mdi:calendar-account-outline"></span>
                    <h5 class="text-[10px] font-bold text-gray-400 uppercase">Năm sinh cấu hình</h5>
                    <p class="text-xl font-bold text-gray-800 mt-1" id="det-nam-count">0</p>
                </div>
            </div>

            <!-- Ý nghĩa -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:book-open-page-variant-outline"></span> Ý nghĩa phong thủy
                </h4>
                <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line" id="det-mo-ta"></p>
            </div>
        </div>
    </div>
    
    <!-- Drawer Footer -->
    <div class="bg-white px-6 py-4 border-t border-gray-100 flex gap-3 shrink-0">
        <a href="#" id="det-edit-link" class="flex-1 px-4 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm flex items-center justify-center gap-2 shadow-md">
            <span class="iconify" data-icon="mdi:pencil"></span> Chỉnh sửa mệnh
        </a>
    </div>
</div>

<!-- Modal Ẩn/Hiện Mệnh -->
<div id="toggleStatusModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <form id="toggleStatusForm" method="POST" action="" class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="p-6">
            <div class="w-12 h-12 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center mb-4 mx-auto" id="toggleModalIconContainer">
                <span class="iconify text-2xl" id="toggleModalIcon" data-icon="mdi:eye-off-outline"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 text-center mb-2" id="toggleModalTitle">Ẩn mệnh khỏi trang người dùng?</h3>
            <p class="text-sm text-gray-500 text-center mb-4">Mệnh này sẽ không hiển thị ở các trang như Vòng Sinh Mệnh hoặc bộ lọc User, nhưng dữ liệu vẫn được lưu trong hệ thống.</p>
            <div class="bg-amber-50 border border-amber-100 rounded-lg p-3 text-sm text-amber-700 text-center mb-2" id="toggleModalWarning">
                Mệnh này hiện có <strong id="toggleModalCount">0</strong> sản phẩm liên quan. Các sản phẩm không bị xóa.
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button type="button" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('toggleStatusModal').classList.add('hidden')">Hủy</button>
            <button type="submit" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-[#8A111F]">Xác nhận <span id="toggleModalActionText">ẩn</span></button>
        </div>
    </form>
</div>

