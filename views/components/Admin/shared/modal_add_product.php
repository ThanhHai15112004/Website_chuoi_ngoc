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
                <input type="text" id="modalSearchInput" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] sm:text-sm text-gray-700 bg-gray-50/50 focus:bg-white transition-colors" placeholder="Tìm theo tên sản phẩm, mã SKU...">
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
            <div class="space-y-3" id="modalProductList">
                <div class="text-center py-8 text-gray-500">
                    <span class="iconify text-3xl mx-auto mb-2 text-gray-300" data-icon="mdi:loading-spin"></span>
                    Đang tải danh sách sản phẩm...
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

    let modalSearchTimeout = null;

    document.getElementById('modalSearchInput')?.addEventListener('input', function(e) {
        clearTimeout(modalSearchTimeout);
        modalSearchTimeout = setTimeout(() => {
            loadModalProducts(e.target.value);
        }, 300);
    });

    function openAddProductModal() {
        const modal = document.getElementById('addProductModal');
        const overlay = document.getElementById('addProductModalOverlay');
        const content = document.getElementById('addProductModalContent');
        
        if (modal && overlay) {
            overlay.classList.remove('hidden');
            modal.classList.remove('hidden');
            
            setTimeout(() => {
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
                
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);

            loadModalProducts('');
        }
    }

    async function loadModalProducts(keyword = '') {
        const listContainer = document.getElementById('modalProductList');
        if (!listContainer) return;

        listContainer.innerHTML = '<div class="text-center py-8 text-gray-500"><span class="iconify text-3xl mx-auto mb-2 text-gray-300 animate-spin" data-icon="mdi:loading"></span>Đang tải dữ liệu...</div>';
        
        try {
            let apiUrl = `<?= APP_URL ?>/admin/ton-kho/api/search-variants?keyword=${encodeURIComponent(keyword)}`;
            
            // Nếu đang ở form Kiểm Kê, gọi API của Kiem Ke để lấy vị trí
            const khoKiemKe = document.getElementById('khoKiemKe');
            if (khoKiemKe && khoKiemKe.value) {
                apiUrl = `<?= APP_URL ?>/admin/kiem-ke/api/search-variants?id_kho=${khoKiemKe.value}&keyword=${encodeURIComponent(keyword)}`;
            }

            const res = await fetch(apiUrl);
            const data = await res.json();
            
            if (!data || data.length === 0) {
                listContainer.innerHTML = '<div class="text-center py-8 text-gray-500">Không tìm thấy sản phẩm nào.</div>';
                return;
            }
            
            let html = '';
            data.forEach(item => {
                const img = item.image ? `<img src="<?= APP_URL ?>/${item.image}" alt="Sản phẩm" class="w-14 h-14 rounded-lg object-cover border border-gray-100">` : `<div class="w-14 h-14 rounded-lg bg-gray-100 border border-gray-100 flex items-center justify-center shrink-0"><span class="iconify text-2xl text-gray-400" data-icon="mdi:image-outline"></span></div>`;
                
                const stock = parseInt(item.stock || 0);
                const isOutOfStock = stock <= 0;
                
                // Determine form type based on which JS functions exist
                const isXuatKho = typeof addToXkCart !== 'undefined';
                
                let btnHtml = '';
                if (isXuatKho && isOutOfStock) {
                    btnHtml = `<button type="button" disabled class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg text-sm font-medium cursor-not-allowed shrink-0">Hết hàng</button>`;
                } else {
                    btnHtml = `<button type="button" class="px-4 py-2 bg-red-50 text-[#6B0D18] border border-red-100 rounded-lg hover:bg-[#6B0D18] hover:text-white hover:border-[#6B0D18] text-sm font-medium transition-colors flex items-center gap-1.5 shrink-0" onclick='addProductFromModal(${JSON.stringify(item).replace(/'/g, "&#39;")})'><span class="iconify" data-icon="mdi:plus"></span> Thêm</button>`;
                }

                const price = parseInt(item.price || 0);

                html += `
                <div class="bg-white border border-gray-200 rounded-xl p-3 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-[#6B0D18]/40 hover:shadow-sm transition-all group ${isOutOfStock ? 'opacity-70' : ''}">
                    <div class="flex items-center gap-4">
                        ${img}
                        <div>
                            <div class="font-bold text-gray-900">${item.product_name || item.name}</div>
                            <div class="text-xs text-gray-500 mt-1 flex items-center gap-3">
                                <span>SKU: ${item.sku}</span>
                                <span>${item.variant_name || item.variant || 'Mặc định'}</span>
                                ${item.ten_vi_tri ? `<span class="text-[#6B0D18]">${item.ten_vi_tri}</span>` : ''}
                                <span class="${isOutOfStock ? 'text-gray-500 font-bold' : 'text-emerald-600 font-medium'}">Tồn kho: ${stock}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-4">
                        <div class="text-right">
                            <div class="font-bold text-[#6B0D18]">${price.toLocaleString('vi-VN')}đ</div>
                        </div>
                        ${btnHtml}
                    </div>
                </div>
                `;
            });
            listContainer.innerHTML = html;
        } catch (err) {
            console.error(err);
            listContainer.innerHTML = '<div class="text-center py-8 text-red-500">Lỗi tải dữ liệu.</div>';
        }
    }

    function addProductFromModal(item) {
        if (typeof addVariantToTable === 'function') {
            // Nhap Kho
            addVariantToTable({
                id: item.id,
                name: item.product_name || item.name,
                variant: item.variant_name || item.variant,
                sku: item.sku,
                image: item.image,
                price: item.price || 0
            });
        } else if (typeof addToXkCart === 'function') {
            // Xuat kho
            addToXkCart(item.id, item.product_name || item.name, item.sku, item.variant_name || item.variant, item.price, item.stock || 0, item.image);
        } else if (typeof addProductKK === 'function') {
            // Kiem ke
            addProductKK(item);
        } else if (typeof addProduct === 'function' && document.getElementById('formThuyenChuyen')) {
            // Thuyen chuyen
            addProduct(item);
        }
        
        // Show success animation or toast
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-4 right-4 bg-emerald-500 text-white px-4 py-2 rounded shadow-lg z-[70] flex items-center gap-2 transition-all duration-300 transform translate-y-0 opacity-100';
        toast.innerHTML = `<span class="iconify text-xl" data-icon="mdi:check-circle"></span> Đã thêm ${item.product_name || item.name}`;
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-2');
            setTimeout(() => toast.remove(), 300);
        }, 1500);
    }
</script>
