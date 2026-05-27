<?php
// views/components/Admin/chinh_sach/quick_view_drawer.php
?>
<div id="drawerQuickView" class="fixed top-0 right-0 bottom-0 w-full max-w-lg bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <!-- Header -->
    <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-start bg-gray-50/80">
        <div>
            <div class="flex items-center gap-3 mb-1">
                <h3 class="font-bold text-gray-900 text-xl" id="qv-title">Chính sách đổi trả</h3>
                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold bg-emerald-100 text-emerald-700">Đang hiển thị</span>
            </div>
            <p class="text-sm text-gray-500">Loại: <span class="font-medium text-gray-700">Đổi trả</span></p>
        </div>
        <button onclick="closeQuickView()" class="text-gray-400 hover:text-red-500 transition-colors bg-white w-8 h-8 rounded-full flex items-center justify-center border border-gray-200 shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>

    <!-- Tabs trong Drawer -->
    <div class="px-6 flex border-b border-gray-200 gap-6 mt-2">
        <button onclick="switchQvTab('tong-quan')" id="btn-tab-tong-quan" class="qv-tab-btn py-3 border-b-2 border-[#6B0D18] text-[#6B0D18] text-sm font-bold">Tổng quan</button>
        <button onclick="switchQvTab('noi-dung')" id="btn-tab-noi-dung" class="qv-tab-btn py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Nội dung</button>
        <button onclick="switchQvTab('lich-su')" id="btn-tab-lich-su" class="qv-tab-btn py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Lịch sử</button>
    </div>

    <!-- Content -->
    <div class="flex-1 overflow-y-auto p-6 bg-gray-50/30">
        
        <!-- TAB TỔNG QUAN -->
        <div id="qv-tab-tong-quan" class="qv-tab-content space-y-6 block">
            <!-- Info Group -->
            <div class="bg-white rounded-xl border border-gray-200 p-4 space-y-4 shadow-sm">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold tracking-wider mb-1">Đường dẫn (Slug)</p>
                    <div class="flex items-center gap-2">
                        <a href="#" class="text-blue-600 hover:underline text-sm truncate font-medium">/chinh-sach/chinh-sach-doi-tra</a>
                        <button class="text-gray-400 hover:text-blue-600"><span class="iconify text-sm" data-icon="mdi:open-in-new"></span></button>
                    </div>
                </div>
                
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold tracking-wider mb-2">Vị trí hiển thị</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Footer</span>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Checkout</span>
                    </div>
                </div>
            </div>

            <!-- SEO Summary -->
            <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                <div class="flex items-center gap-2 mb-3">
                    <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle"></span>
                    <p class="font-bold text-gray-900 text-sm">SEO Tốt</p>
                </div>
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Meta Title (54/60)</p>
                        <p class="text-sm text-gray-900 font-medium">Chính sách đổi trả - Chuỗi Ngọc Phong Thủy</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Meta Description (145/160)</p>
                        <p class="text-sm text-gray-600 line-clamp-2">Tìm hiểu chi tiết về điều kiện, thời gian và quy trình đổi trả các sản phẩm vòng ngọc, chuỗi đá và phụ kiện tại cửa hàng chúng tôi.</p>
                    </div>
                </div>
            </div>

            <!-- Preview content snippet -->
            <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                <div class="flex items-center justify-between mb-3">
                    <p class="text-xs text-gray-500 uppercase font-semibold tracking-wider">Trích xuất nội dung</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-3 text-sm text-gray-600 line-clamp-5 italic border border-gray-100">
                    "1. Điều kiện đổi trả: Sản phẩm phải còn nguyên vẹn, không bị xước xát, đứt gãy. Còn đầy đủ hóa đơn, hộp đựng và giấy kiểm định (nếu có). 2. Thời gian đổi trả: Hỗ trợ đổi trả trong vòng 7 ngày kể từ ngày nhận hàng. 3. Các sản phẩm không áp dụng đổi trả: Vòng ngọc đã qua chỉnh sửa kích thước theo yêu cầu..."
                </div>
            </div>

            <!-- Update Info -->
            <div class="text-xs text-gray-500 flex items-center justify-between px-2">
                <span>Cập nhật lần cuối: 18/05/2026 09:30</span>
                <span class="flex items-center gap-1"><span class="iconify" data-icon="mdi:account"></span> Hải Admin</span>
            </div>
        </div>

        <!-- TAB NỘI DUNG -->
        <div id="qv-tab-noi-dung" class="qv-tab-content space-y-4 hidden">
            <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm prose prose-sm max-w-none text-gray-700">
                <h2 class="text-lg font-bold text-gray-900 mb-4">1. ĐIỀU KIỆN ĐỔI TRẢ</h2>
                <ul class="list-disc pl-5 space-y-2">
                    <li>Sản phẩm chưa qua sử dụng, còn nguyên tem mác, hộp đựng.</li>
                    <li>Không bị nứt vỡ, trầy xước do tác động ngoại lực.</li>
                    <li>Sản phẩm phải có hóa đơn mua hàng hợp lệ tại Chuỗi Ngọc.</li>
                </ul>

                <h2 class="text-lg font-bold text-gray-900 mt-6 mb-4">2. THỜI GIAN ĐỔI TRẢ</h2>
                <p>Khách hàng có thể yêu cầu đổi trả trong vòng <strong>7 ngày</strong> kể từ ngày nhận hàng được ghi nhận trên hệ thống vận chuyển.</p>

                <h2 class="text-lg font-bold text-gray-900 mt-6 mb-4">3. CÁC TRƯỜNG HỢP KHÔNG HỖ TRỢ</h2>
                <ul class="list-disc pl-5 space-y-2">
                    <li>Vòng ngọc, chuỗi đá đã qua chỉnh sửa kích thước (cắt bớt hạt, thêm charm) theo yêu cầu riêng.</li>
                    <li>Sản phẩm khuyến mãi sâu trong các chương trình Flash Sale.</li>
                </ul>
            </div>
        </div>

        <!-- TAB LỊCH SỬ -->
        <div id="qv-tab-lich-su" class="qv-tab-content space-y-4 hidden">
            <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-6">Lịch sử chỉnh sửa</h3>
                
                <div class="relative border-l-2 border-gray-200 ml-3 space-y-8">
                    <!-- Item 1 -->
                    <div class="relative pl-6">
                        <div class="absolute w-4 h-4 rounded-full bg-[#6B0D18] border-4 border-white -left-[9px] top-1"></div>
                        <p class="text-xs text-gray-500 mb-1">18/05/2026 - 09:30</p>
                        <p class="text-sm font-medium text-gray-900">Cập nhật nội dung chính sách</p>
                        <p class="text-xs text-gray-600 mt-1 flex items-center gap-1"><span class="iconify" data-icon="mdi:account"></span> Hải Admin</p>
                        <div class="mt-2 text-xs bg-gray-50 border border-gray-100 rounded p-2 text-gray-600 italic">"Bổ sung điều khoản cho sản phẩm Flash Sale không được đổi trả."</div>
                    </div>

                    <!-- Item 2 -->
                    <div class="relative pl-6">
                        <div class="absolute w-3 h-3 rounded-full bg-gray-300 border-2 border-white -left-[7px] top-1.5"></div>
                        <p class="text-xs text-gray-500 mb-1">15/05/2026 - 14:20</p>
                        <p class="text-sm font-medium text-gray-900">Bật hiển thị tại Checkout</p>
                        <p class="text-xs text-gray-600 mt-1 flex items-center gap-1"><span class="iconify" data-icon="mdi:account"></span> Super Admin</p>
                    </div>

                    <!-- Item 3 -->
                    <div class="relative pl-6">
                        <div class="absolute w-3 h-3 rounded-full bg-gray-300 border-2 border-white -left-[7px] top-1.5"></div>
                        <p class="text-xs text-gray-500 mb-1">10/05/2026 - 08:00</p>
                        <p class="text-sm font-medium text-gray-900">Khởi tạo bản nháp</p>
                        <p class="text-xs text-gray-600 mt-1 flex items-center gap-1"><span class="iconify" data-icon="mdi:account"></span> Hải Admin</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer Actions -->
    <div class="p-5 border-t border-gray-200 bg-white flex items-center justify-between gap-3">
        <button class="px-4 py-2 border border-gray-300 rounded-xl text-gray-700 font-medium hover:bg-gray-50 transition-colors">Ẩn hiển thị</button>
        <a id="qv-edit-link" href="<?= APP_URL ?>/admin/chinh-sach/sua/1" class="flex-1 py-2 bg-[#6B0D18] text-white rounded-xl font-bold text-center shadow-md hover:bg-red-900 transition-colors">Chỉnh sửa toàn văn</a>
    </div>
</div>

<!-- Backdrop -->
<div id="quickViewBackdrop" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity opacity-0 backdrop-blur-sm" onclick="closeQuickView()"></div>

<script>
    function openQuickView(id) {
        const drawer = document.getElementById('drawerQuickView');
        const backdrop = document.getElementById('quickViewBackdrop');
        const editLink = document.getElementById('qv-edit-link');
        
        if (editLink) {
            editLink.href = '<?= APP_URL ?>/admin/chinh-sach/sua/' + id;
        }

        backdrop.classList.remove('hidden');
        setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
        drawer.classList.remove('translate-x-full');

        // Reset to default tab
        switchQvTab('tong-quan');
    }

    function closeQuickView() {
        const drawer = document.getElementById('drawerQuickView');
        const backdrop = document.getElementById('quickViewBackdrop');
        
        drawer.classList.add('translate-x-full');
        backdrop.classList.add('opacity-0');
        setTimeout(() => backdrop.classList.add('hidden'), 300);
    }

    function switchQvTab(tabId) {
        // Reset buttons
        document.querySelectorAll('.qv-tab-btn').forEach(btn => {
            btn.classList.remove('border-[#6B0D18]', 'text-[#6B0D18]', 'font-bold');
            btn.classList.add('border-transparent', 'text-gray-500', 'font-medium');
        });
        
        // Active button
        const activeBtn = document.getElementById('btn-tab-' + tabId);
        if(activeBtn) {
            activeBtn.classList.remove('border-transparent', 'text-gray-500', 'font-medium');
            activeBtn.classList.add('border-[#6B0D18]', 'text-[#6B0D18]', 'font-bold');
        }

        // Reset contents
        document.querySelectorAll('.qv-tab-content').forEach(content => {
            content.classList.remove('block');
            content.classList.add('hidden');
        });

        // Active content
        const activeContent = document.getElementById('qv-tab-' + tabId);
        if(activeContent) {
            activeContent.classList.remove('hidden');
            activeContent.classList.add('block');
        }
    }
</script>
