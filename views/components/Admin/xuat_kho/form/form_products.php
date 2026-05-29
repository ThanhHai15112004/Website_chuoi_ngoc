<?php
// views/components/Admin/xuat_kho/form/form_products.php
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:package-variant"></span>
            Danh sách sản phẩm xuất
        </h3>
    </div>
    
    <!-- Search Bar -->
    <div class="p-4 border-b border-gray-100 bg-white">
        <div class="flex flex-col md:flex-row gap-3 w-full">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="iconify text-[#6B0D18] text-lg" data-icon="mdi:magnify"></span>
                </div>
                <input type="text" id="xkSearchInput" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700 bg-white" placeholder="Tìm kiếm theo mã SKU, tên sản phẩm để thêm vào phiếu xuất...">
                <div id="xkSearchResults" class="absolute z-10 w-full bg-white border border-gray-200 mt-1 rounded-lg shadow-lg hidden max-h-60 overflow-y-auto">
                    <!-- Ajax results will be placed here -->
                </div>
            </div>
            <button type="button" onclick="openAddProductModal()" class="px-4 py-2 bg-[#6B0D18] text-white border border-transparent rounded-lg hover:bg-red-900 transition-colors flex items-center justify-center gap-2 text-sm font-medium whitespace-nowrap shrink-0 shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:plus"></span> Thêm sản phẩm
            </button>
        </div>
    </div>

    <!-- Bảng sản phẩm -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[800px]">
            <thead>
                <tr class="bg-gray-50 border-y border-gray-100 text-xs uppercase tracking-wider text-gray-500">
                    <th class="py-3 px-4 font-semibold w-72">Sản phẩm & Biến thể</th>
                    <th class="py-3 px-4 font-semibold text-center w-24">Tồn kho hiện tại</th>
                    <th class="py-3 px-4 font-semibold text-center w-32">Số lượng xuất</th>
                    <th class="py-3 px-4 font-semibold text-right w-32">Đơn giá / Thành tiền</th>
                    <th class="py-3 px-4 font-semibold w-16"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100" id="xkCartBody">
                <tr id="xkEmptyRow">
                    <td colspan="5" class="py-8 text-center text-gray-500">
                        Chưa có sản phẩm nào. Vui lòng tìm kiếm và thêm sản phẩm.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    let xkProducts = [];
    const appUrl = '<?= APP_URL ?>';

    // Search and Autocomplete
    const searchInput = document.getElementById('xkSearchInput');
    const searchResults = document.getElementById('xkSearchResults');
    let searchTimeout = null;

    searchInput.addEventListener('input', function() {
        const keyword = this.value.trim();
        clearTimeout(searchTimeout);
        
        if (keyword.length < 2) {
            searchResults.classList.add('hidden');
            return;
        }

        searchTimeout = setTimeout(() => {
            fetch(`${appUrl}/admin/ton-kho/api/search-variants?keyword=${encodeURIComponent(keyword)}`)
                .then(res => res.json())
                .then(data => {
                    renderSearchResults(data);
                })
                .catch(err => console.error(err));
        }, 300);
    });

    function renderSearchResults(data) {
        if (!data || data.length === 0) {
            searchResults.innerHTML = '<div class="p-3 text-sm text-gray-500">Không tìm thấy sản phẩm.</div>';
            searchResults.classList.remove('hidden');
            return;
        }

        let html = '';
        data.forEach(item => {
            html += `
                <div class="p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100 flex items-center gap-3" 
                     onclick="addToXkCart(${item.id}, '${item.product_name}', '${item.sku}', '${item.variant_name}', ${item.price}, ${item.stock}, '${item.image}')">
                    <img src="${appUrl}/${item.image}" class="w-10 h-10 rounded object-cover border">
                    <div>
                        <div class="text-sm font-bold text-gray-900">${item.product_name}</div>
                        <div class="text-xs text-gray-500">SKU: ${item.sku} | Biến thể: ${item.variant_name} | Tồn: ${item.stock}</div>
                    </div>
                </div>
            `;
        });
        searchResults.innerHTML = html;
        searchResults.classList.remove('hidden');
    }

    // Hide search results when click outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });

    function addToXkCart(id, name, sku, variant, price, stock, image) {
        const exist = xkProducts.find(p => p.id === id);
        if (exist) {
            if (exist.qty < stock) exist.qty++;
            else alert('Số lượng xuất vượt quá tồn kho hiện tại!');
        } else {
            xkProducts.push({
                id: id,
                name: name,
                sku: sku,
                variant: variant,
                price: price,
                stock: stock,
                image: image,
                qty: 1
            });
        }
        
        searchInput.value = '';
        searchResults.classList.add('hidden');
        renderXkCart();
    }

    function removeXkProduct(id) {
        xkProducts = xkProducts.filter(p => p.id !== id);
        renderXkCart();
    }

    function updateXkQty(id, qty) {
        const p = xkProducts.find(p => p.id === id);
        if (p) {
            qty = parseInt(qty) || 1;
            if (qty > p.stock) {
                alert('Số lượng xuất vượt quá tồn kho!');
                qty = p.stock;
            }
            p.qty = qty;
            renderXkCart();
        }
    }

    function updateXkPrice(id, price) {
        const p = xkProducts.find(p => p.id === id);
        if (p) {
            p.price = parseInt(price) || 0;
            renderXkCart();
        }
    }

    function renderXkCart() {
        const tbody = document.getElementById('xkCartBody');
        if (xkProducts.length === 0) {
            tbody.innerHTML = `
                <tr id="xkEmptyRow">
                    <td colspan="5" class="py-8 text-center text-gray-500">
                        Chưa có sản phẩm nào. Vui lòng tìm kiếm và thêm sản phẩm.
                    </td>
                </tr>
            `;
            updateXkSummary();
            return;
        }

        let html = '';
        xkProducts.forEach(p => {
            const total = p.qty * p.price;
            html += `
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="py-3 px-4">
                        <div class="flex items-center gap-3">
                            <img src="${appUrl}/${p.image}" class="w-10 h-10 rounded object-cover border border-gray-200">
                            <div class="flex-1 min-w-0">
                                <div class="font-bold text-gray-900 text-sm truncate">${p.name}</div>
                                <div class="text-xs text-gray-500 mt-0.5">SKU: ${p.sku} · ${p.variant}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <span class="font-bold text-gray-900">${p.stock}</span>
                    </td>
                    <td class="py-3 px-4">
                        <input type="number" min="1" max="${p.stock}" value="${p.qty}" onchange="updateXkQty(${p.id}, this.value)" class="w-full text-center font-bold px-2 py-1.5 bg-white border border-gray-300 rounded text-sm focus:outline-none focus:border-[#6B0D18]">
                    </td>
                    <td class="py-3 px-4 text-right">
                        <input type="number" min="0" value="${p.price}" onchange="updateXkPrice(${p.id}, this.value)" class="w-24 text-right px-2 py-1 text-xs border border-gray-300 rounded mb-1 focus:border-[#6B0D18]">
                        <div class="font-bold text-[#6B0D18] text-sm">${total.toLocaleString('vi-VN')}đ</div>
                    </td>
                    <td class="py-3 px-4 text-right">
                        <button type="button" onclick="removeXkProduct(${p.id})" class="p-1.5 text-gray-400 hover:text-rose-600 rounded transition-colors focus:outline-none">
                            <span class="iconify text-lg" data-icon="mdi:trash-can-outline"></span>
                        </button>
                    </td>
                </tr>
            `;
        });
        tbody.innerHTML = html;
        updateXkSummary();
    }

    function updateXkSummary() {
        let totalQty = 0;
        let totalMoney = 0;
        xkProducts.forEach(p => {
            totalQty += p.qty;
            totalMoney += (p.qty * p.price);
        });
        
        const sumQtyEl = document.getElementById('xk_sum_qty');
        const sumMoneyEl = document.getElementById('xk_sum_money');
        const xkTongTien = document.getElementById('xk_tong_tien');

        if (sumQtyEl) sumQtyEl.innerText = totalQty;
        if (sumMoneyEl) sumMoneyEl.innerText = totalMoney.toLocaleString('vi-VN') + 'đ';
        if (xkTongTien) xkTongTien.value = totalMoney;
    }
</script>
