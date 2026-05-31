<?php
// views/components/Admin/kiem_ke/form/form_products.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:package-variant-closed"></span> 2. Sản phẩm kiểm kê
        </h3>
        <div class="flex gap-2">
            <button type="button" onclick="loadAllSP()" class="px-4 py-2 bg-gray-100 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:download-multiple"></span> Thêm toàn bộ Kho
            </button>
        </div>
    </div>
    
    <div class="p-6">
        <div class="mb-6 flex gap-3 relative">
            <div class="flex-1 relative flex gap-2 w-full">
                <div class="relative flex-1">
                    <input type="text" id="searchProductKK" placeholder="Tìm sản phẩm theo tên, mã SKU..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm"
                           oninput="searchProductKK(this.value)">
                    <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:barcode-scan"></span>
                    <!-- Dropdown kết quả -->
                    <div id="searchResultsKK" class="absolute top-full left-0 right-0 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg z-50 max-h-60 overflow-y-auto hidden"></div>
                </div>
                <button type="button" onclick="openAddProductModal()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors flex items-center gap-2 text-sm font-medium shrink-0 shadow-sm">
                    <span class="iconify text-lg" data-icon="mdi:plus"></span> Thêm sản phẩm
                </button>
            </div>
        </div>

        <div class="mb-4 flex items-center justify-between text-sm">
            <span class="font-medium text-gray-700">Tổng số: <span id="totalProductsCount" class="text-[#6B0D18] font-bold">0</span> sản phẩm sẽ được kiểm kê</span>
            <button type="button" onclick="resetList()" class="text-red-500 hover:underline">Xóa tất cả</button>
        </div>

        <!-- Bảng chi tiết -->
        <div class="overflow-x-auto border border-gray-200 rounded-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                        <th class="py-3 px-4 font-semibold w-12 text-center">STT</th>
                        <th class="py-3 px-4 font-semibold">Hình Ảnh & Sản phẩm</th>
                        <th class="py-3 px-4 font-semibold text-center w-32">Mã / SKU</th>
                        <th class="py-3 px-4 font-semibold text-center w-32">Vị trí kho</th>
                        <th class="py-3 px-4 font-semibold text-center w-32">Tồn HT</th>
                        <th class="py-3 px-4 font-semibold text-center w-48">Ghi chú thêm (Tùy chọn)</th>
                        <th class="py-3 px-4 font-semibold text-center w-16">Xóa</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="divide-y divide-gray-100">
                    <!-- JS render here -->
                    <tr id="emptyRow">
                        <td colspan="6" class="py-12 text-center text-gray-500 text-sm bg-gray-50/30">
                            <span class="iconify text-5xl text-gray-300 mx-auto mb-3" data-icon="mdi:package-variant"></span>
                            <p class="font-medium text-gray-600 mb-1">Chưa có sản phẩm nào được chọn</p>
                            <p class="text-xs text-gray-400">Vui lòng chọn sản phẩm hoặc bấm "Thêm toàn bộ Kho"</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
let searchTimeoutKK = null;

function searchProductKK(keyword) {
    clearTimeout(searchTimeoutKK);
    const resultsDiv = document.getElementById('searchResultsKK');
    
    if (keyword.length < 2) {
        resultsDiv.classList.add('hidden');
        return;
    }

    searchTimeoutKK = setTimeout(() => {
        const khoId = document.getElementById('khoKiemKe').value;
        if (!khoId) {
            alert('Vui lòng chọn Kho kiểm kê trước khi tìm sản phẩm.');
            return;
        }

        fetch(`${APP_URL}/admin/kiem-ke/api/search-variants?id_kho=${khoId}&keyword=${encodeURIComponent(keyword)}`)
            .then(r => r.json())
            .then(data => {
                if (data.length === 0) {
                    resultsDiv.innerHTML = '<div class="p-4 text-sm text-gray-500 text-center">Không tìm thấy sản phẩm</div>';
                } else {
                    resultsDiv.innerHTML = data.map(item => `
                        <div class="px-4 py-3 hover:bg-gray-50 cursor-pointer flex items-center gap-3 border-b border-gray-100 last:border-0"
                             onclick='addProductKK(${JSON.stringify(item).replace(/'/g, "\\'")})'>
                            <div class="w-8 h-8 rounded bg-gray-100 shrink-0 flex items-center justify-center overflow-hidden">
                                ${item.image ? `<img src="${APP_URL}/${item.image}" class="w-full h-full object-cover">` : '<span class="iconify text-gray-400" data-icon="mdi:image-outline"></span>'}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-medium text-gray-900 truncate">${item.name} - ${item.variant || 'Mặc định'}</div>
                                <div class="text-xs text-gray-500">${item.sku} · ${item.ten_vi_tri || 'Chưa phân bổ'} · Tồn: ${item.stock}</div>
                            </div>
                        </div>
                    `).join('');
                }
                resultsDiv.classList.remove('hidden');
            });
    }, 300);
}

function addProductKK(item) {
    document.getElementById('searchResultsKK').classList.add('hidden');
    document.getElementById('searchProductKK').value = '';
    
    // Now items are identified by both id_bien_the and id_vi_tri
    if (listSP.find(p => p.id === item.id && p.id_vi_tri === item.id_vi_tri)) {
        alert('Sản phẩm tại vị trí này đã có trong danh sách!');
        return;
    }
    
    listSP.push({
        id: item.id,
        id_vi_tri: item.id_vi_tri || null,
        ten_vi_tri: item.ten_vi_tri || 'Chưa phân bổ',
        name: item.name + (item.variant ? ' - ' + item.variant : ''),
        sku: item.sku || '',
        ton_he_thong: item.stock || 0,
        image: item.image || ''
    });
    
    renderTable();
}

// Close search results when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('#searchProductKK') && !e.target.closest('#searchResultsKK')) {
        document.getElementById('searchResultsKK')?.classList.add('hidden');
    }
});
</script>
