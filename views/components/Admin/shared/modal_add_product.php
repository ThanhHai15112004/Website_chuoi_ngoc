<?php
// views/components/Admin/shared/modal_add_product.php
?>
<!-- Overlay Modal Tìm kiếm sản phẩm -->
<div id="addProductModalOverlay" class="fixed inset-0 bg-black/60 z-[60] hidden transition-opacity duration-300 opacity-0" onclick="closeAddProductModal()"></div>

<!-- Modal Tìm kiếm sản phẩm -->
<div id="addProductModal" class="fixed inset-0 z-[60] hidden flex items-center justify-center pointer-events-none p-4">
    <div id="addProductModalContent" class="bg-white w-full max-w-4xl rounded-2xl shadow-2xl flex flex-col pointer-events-auto transform scale-95 opacity-0 transition-all duration-300 max-h-[90vh]">
        
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50 rounded-t-2xl">
            <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:plus-box-multiple-outline"></span>
                Tìm kiếm và thêm sản phẩm
            </h2>
            <button type="button" onclick="closeAddProductModal()" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:close"></span>
            </button>
        </div>
        
        <!-- Thanh Tìm kiếm và Bộ lọc -->
        <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row gap-4 bg-white">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="iconify text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] sm:text-sm text-gray-700 bg-gray-50/50 focus:bg-white transition-colors" placeholder="Tìm theo tên sản phẩm, mã SKU, hoặc quét mã vạch...">
            </div>
            <div class="w-full sm:w-48">
                <select class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] sm:text-sm text-gray-700 bg-white">
                    <option value="">Tất cả danh mục</option>
                    <option value="vong_tay">Vòng tay phong thủy</option>
                    <option value="nhan">Nhẫn</option>
                    <option value="day_chuyen">Dây chuyền</option>
                </select>
            </div>
        </div>

        <!-- Danh sách Kết quả -->
        <div class="flex-1 overflow-y-auto p-6 bg-gray-50/30 custom-scrollbar">
            <div class="space-y-3">
                
                <!-- Item 1 -->
                <div class="bg-white border border-gray-200 rounded-xl p-3 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-[#6B0D18]/40 hover:shadow-sm transition-all group">
                    <div class="flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?ixlib=rb-4.0.3&w=100&q=80" alt="Sản phẩm" class="w-14 h-14 rounded-lg object-cover border border-gray-100">
                        <div>
                            <div class="font-bold text-gray-900">Vòng Ngọc Bích Tài Lộc</div>
                            <div class="text-xs text-gray-500 mt-1 flex items-center gap-3">
                                <span>SKU: NB-TL-16</span>
                                <span>Size: 16cm</span>
                                <span class="text-emerald-600 font-medium">Tồn kho: 25</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-4">
                        <div class="text-right">
                            <div class="font-bold text-[#6B0D18]">1.200.000đ</div>
                        </div>
                        <button type="button" class="px-4 py-2 bg-red-50 text-[#6B0D18] border border-red-100 rounded-lg hover:bg-[#6B0D18] hover:text-white hover:border-[#6B0D18] text-sm font-medium transition-colors flex items-center gap-1.5 shrink-0" onclick="addProductToTable('Vòng Ngọc Bích Tài Lộc', 'NB-TL-16')">
                            <span class="iconify" data-icon="mdi:plus"></span> Thêm
                        </button>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="bg-white border border-gray-200 rounded-xl p-3 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-[#6B0D18]/40 hover:shadow-sm transition-all group">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-lg bg-gray-100 border border-gray-100 flex items-center justify-center shrink-0">
                            <span class="iconify text-2xl text-gray-400" data-icon="mdi:image-outline"></span>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Nhẫn ngọc trai đính kim cương</div>
                            <div class="text-xs text-gray-500 mt-1 flex items-center gap-3">
                                <span>SKU: NT-002</span>
                                <span>Đá: Kim cương tự nhiên</span>
                                <span class="text-rose-600 font-medium">Tồn kho: 1</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-4">
                        <div class="text-right">
                            <div class="font-bold text-[#6B0D18]">3.500.000đ</div>
                        </div>
                        <button type="button" class="px-4 py-2 bg-red-50 text-[#6B0D18] border border-red-100 rounded-lg hover:bg-[#6B0D18] hover:text-white hover:border-[#6B0D18] text-sm font-medium transition-colors flex items-center gap-1.5 shrink-0" onclick="addProductToTable('Nhẫn ngọc trai đính kim cương', 'NT-002')">
                            <span class="iconify" data-icon="mdi:plus"></span> Thêm
                        </button>
                    </div>
                </div>
                
                <!-- Item 3 (Hết hàng) -->
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-3 flex flex-col sm:flex-row sm:items-center justify-between gap-4 opacity-70">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-lg bg-gray-200 border border-gray-200 flex items-center justify-center shrink-0">
                            <span class="iconify text-2xl text-gray-400" data-icon="mdi:image-outline"></span>
                        </div>
                        <div>
                            <div class="font-bold text-gray-700">Lắc tay bạc đính đá Ruby</div>
                            <div class="text-xs text-gray-500 mt-1 flex items-center gap-3">
                                <span>SKU: LT-RB-01</span>
                                <span class="text-gray-500 font-bold">Hết hàng</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-4">
                        <div class="text-right">
                            <div class="font-bold text-gray-500">850.000đ</div>
                        </div>
                        <button type="button" disabled class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg text-sm font-medium cursor-not-allowed shrink-0">
                            Hết hàng
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal Footer -->
        <div class="px-6 py-4 border-t border-gray-100 bg-white rounded-b-2xl flex items-center justify-between">
            <span class="text-sm text-gray-500">Đã chọn <strong class="text-[#6B0D18]">0</strong> sản phẩm (tự động thêm)</span>
            <button type="button" onclick="closeAddProductModal()" class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium text-sm transition-colors">
                Đóng
            </button>
        </div>

    </div>
</div>

<script>
    function openAddProductModal() {
        const modal = document.getElementById('addProductModal');
        const overlay = document.getElementById('addProductModalOverlay');
        const content = document.getElementById('addProductModalContent');
        
        if (modal && overlay) {
            overlay.classList.remove('hidden');
            modal.classList.remove('hidden');
            
            // Animation
            setTimeout(() => {
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
                
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        }
    }

    function closeAddProductModal() {
        const modal = document.getElementById('addProductModal');
        const overlay = document.getElementById('addProductModalOverlay');
        const content = document.getElementById('addProductModalContent');
        
        if (modal && overlay) {
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
            
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                overlay.classList.add('hidden');
            }, 300);
        }
    }

    function addProductToTable(name, sku) {
        // Mock function
        alert('Đã thêm sản phẩm: ' + name);
        // Có thể bổ sung animation JS tạo dòng mới ở form_products table tại đây
    }
</script>
