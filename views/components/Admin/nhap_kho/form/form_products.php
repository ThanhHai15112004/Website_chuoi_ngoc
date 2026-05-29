<?php
// views/components/Admin/nhap_kho/form/form_products.php
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-visible mb-6 relative z-10">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-gray-500" data-icon="mdi:format-list-checks"></span>
            Danh sách sản phẩm nhập
        </h3>
        <div class="flex items-center gap-3 w-full md:w-auto">
            <div class="relative flex-1 md:w-80">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="iconify text-gray-400" data-icon="mdi:magnify"></span>
                </div>
                <input type="text" id="nk_search_input" onkeyup="searchVariants(this.value)" class="block w-full pl-10 pr-3 py-1.5 border border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm" placeholder="Gõ tên sản phẩm, biến thể để thêm vào phiếu..." autocomplete="off">
                <!-- Dropdown kết quả tìm kiếm -->
                <div id="nk_search_results" class="absolute left-0 right-0 top-full mt-1 bg-white border border-gray-200 rounded-lg shadow-xl overflow-hidden hidden z-50 max-h-64 overflow-y-auto">
                    <!-- JS sẽ điền kết quả vào đây -->
                </div>
            </div>
            <button type="button" onclick="openAddProductModal()" class="px-4 py-1.5 bg-[#6B0D18] text-white border border-transparent rounded-lg hover:bg-red-900 transition-colors flex items-center gap-2 text-sm font-medium whitespace-nowrap shrink-0 shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:plus"></span> Thêm sản phẩm
            </button>
        </div>
    </div>

    <!-- Bảng nhập sản phẩm -->
    <div class="overflow-x-auto w-full">
        <table class="w-full text-left border-collapse min-w-[800px]">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase text-gray-500 tracking-wider">
                    <th class="py-3 px-4 font-semibold w-10 text-center">#</th>
                    <th class="py-3 px-4 font-semibold w-80">Sản phẩm & Biến thể</th>
                    <th class="py-3 px-4 font-semibold text-right w-32">Số lượng</th>
                    <th class="py-3 px-4 font-semibold text-right w-40">Đơn giá nhập</th>
                    <th class="py-3 px-4 font-semibold text-right w-40">Thành tiền</th>
                    <th class="py-3 px-4 font-semibold w-24">Ghi chú</th>
                    <th class="py-3 px-4 font-semibold w-16 text-center">Xóa</th>
                </tr>
            </thead>
            <tbody id="nk_table_body" class="divide-y divide-gray-100">
                <tr id="nk_empty_row">
                    <td colspan="7" class="py-8 text-center text-gray-400 text-sm">
                        <span class="iconify text-4xl mx-auto mb-2 text-gray-300" data-icon="mdi:package-variant-closed"></span>
                        Chưa có sản phẩm nào được chọn.<br>Vui lòng tìm kiếm và thêm sản phẩm ở ô phía trên.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
let nkProducts = [];

// Tìm kiếm sản phẩm qua API
let searchTimeout = null;
function searchVariants(keyword) {
    clearTimeout(searchTimeout);
    const resultsContainer = document.getElementById('nk_search_results');
    
    if (keyword.trim().length < 2) {
        resultsContainer.classList.add('hidden');
        return;
    }

    searchTimeout = setTimeout(async () => {
        try {
            const res = await fetch(`<?= APP_URL ?>/admin/ton-kho/api/search-variants?keyword=${encodeURIComponent(keyword)}`);
            const data = await res.json();
            
            if (data.length > 0) {
                let html = '';
                data.forEach(item => {
                    const img = item.image ? `<img src="<?= APP_URL ?>/${item.image}" class="w-10 h-10 object-cover rounded border">` : '<div class="w-10 h-10 bg-gray-100 rounded border flex items-center justify-center"><span class="iconify text-gray-400" data-icon="mdi:image"></span></div>';
                    html += `
                        <div class="px-4 py-2 hover:bg-gray-50 cursor-pointer flex items-center gap-3 border-b border-gray-100 last:border-0" 
                             onclick='addVariantToTable(${JSON.stringify(item).replace(/'/g, "&#39;")})'>
                            ${img}
                            <div>
                                <div class="text-sm font-medium text-gray-900">${item.name}</div>
                                <div class="text-xs text-gray-500">${item.variant} | SKU: ${item.sku}</div>
                            </div>
                        </div>
                    `;
                });
                resultsContainer.innerHTML = html;
                resultsContainer.classList.remove('hidden');
            } else {
                resultsContainer.innerHTML = '<div class="px-4 py-3 text-sm text-gray-500 text-center">Không tìm thấy sản phẩm phù hợp.</div>';
                resultsContainer.classList.remove('hidden');
            }
        } catch (err) {
            console.error(err);
        }
    }, 300);
}

// Click ra ngoài để đóng dropdown tìm kiếm
document.addEventListener('click', function(e) {
    if (!e.target.closest('.relative.w-full.md\\:w-80')) {
        document.getElementById('nk_search_results').classList.add('hidden');
    }
});

function addVariantToTable(item) {
    document.getElementById('nk_search_input').value = '';
    document.getElementById('nk_search_results').classList.add('hidden');
    
    // Check if exists
    const existing = nkProducts.find(p => p.id === item.id);
    if (existing) {
        existing.qty += 1;
    } else {
        nkProducts.push({
            id: item.id,
            name: item.name,
            variant: item.variant,
            sku: item.sku,
            image: item.image,
            qty: 1,
            price: 0,
            note: ''
        });
    }
    renderTable();
}

function removeVariant(id) {
    nkProducts = nkProducts.filter(p => p.id !== id);
    renderTable();
}

function updateVariantField(id, field, value) {
    const item = nkProducts.find(p => p.id === id);
    if (item) {
        item[field] = value;
        renderTable();
    }
}

function renderTable() {
    const tbody = document.getElementById('nk_table_body');
    const emptyRow = document.getElementById('nk_empty_row');
    
    if (nkProducts.length === 0) {
        tbody.innerHTML = '';
        tbody.appendChild(emptyRow);
        emptyRow.style.display = 'table-row';
        updateTotals();
        return;
    }
    
    let html = '';
    let index = 1;
    
    nkProducts.forEach(item => {
        const total = item.qty * item.price;
        const img = item.image ? `<img src="<?= APP_URL ?>/${item.image}" class="w-12 h-12 object-cover rounded border">` : '<div class="w-12 h-12 bg-gray-100 rounded border flex items-center justify-center"><span class="iconify text-gray-400" data-icon="mdi:image"></span></div>';
        
        html += `
            <tr class="hover:bg-gray-50 border-b border-gray-50 last:border-0">
                <td class="py-3 px-4 text-center text-sm font-medium text-gray-400">${index++}</td>
                <td class="py-3 px-4">
                    <div class="flex items-center gap-3">
                        ${img}
                        <div>
                            <div class="font-medium text-gray-900 text-sm">${item.name}</div>
                            <div class="text-xs text-gray-500 mt-0.5">${item.variant} | SKU: ${item.sku}</div>
                        </div>
                    </div>
                </td>
                <td class="py-3 px-4">
                    <input type="number" min="1" value="${item.qty}" onchange="updateVariantField('${item.id}', 'qty', parseFloat(this.value)||1)" class="block w-full px-2 py-1.5 text-right border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-semibold">
                </td>
                <td class="py-3 px-4">
                    <input type="number" min="0" value="${item.price}" onchange="updateVariantField('${item.id}', 'price', parseFloat(this.value)||0)" class="block w-full px-2 py-1.5 text-right border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-semibold">
                </td>
                <td class="py-3 px-4 text-right">
                    <span class="font-bold text-[#6B0D18] text-sm">${total.toLocaleString('vi-VN')}đ</span>
                </td>
                <td class="py-3 px-4">
                    <input type="text" value="${item.note}" onchange="updateVariantField('${item.id}', 'note', this.value)" placeholder="Ghi chú..." class="block w-full px-2 py-1.5 border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                </td>
                <td class="py-3 px-4 text-center">
                    <button type="button" onclick="removeVariant('${item.id}')" class="p-1 text-gray-400 hover:text-rose-600 hover:bg-rose-50 rounded transition-colors" title="Xóa dòng">
                        <span class="iconify text-lg" data-icon="mdi:trash-can-outline"></span>
                    </button>
                </td>
            </tr>
        `;
    });
    
    tbody.innerHTML = html;
    updateTotals();
}

function updateTotals() {
    let totalQty = 0;
    let grandTotal = 0;
    
    nkProducts.forEach(item => {
        totalQty += item.qty;
        grandTotal += (item.qty * item.price);
    });
    
    if (document.getElementById('nk_tong_sl_hien_thi')) {
        document.getElementById('nk_tong_sl_hien_thi').innerText = totalQty;
    }
    if (document.getElementById('nk_tong_tien_hien_thi')) {
        document.getElementById('nk_tong_tien_hien_thi').innerText = grandTotal.toLocaleString('vi-VN') + 'đ';
    }
    if (document.getElementById('nk_tong_tien')) {
        document.getElementById('nk_tong_tien').value = grandTotal;
        if(typeof updateTienNo === 'function') updateTienNo();
    }
}
</script>
