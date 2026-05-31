<?php
// views/pages/admin_thuyen_chuyen_them.php
$current_page = 'thuyen_chuyen_kho';
?>

<!-- Trang Tạo Phiếu Thuyên Chuyển Kho -->
<div class="px-6 py-6 pb-20 max-w-[1400px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex items-center gap-4 mb-6">
        <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">Tạo phiếu chuyển kho</h2>
            <p class="text-sm text-gray-500 mt-1">Điều chuyển sản phẩm giữa các kho, chi nhánh.</p>
        </div>
    </div>

    <form id="formThuyenChuyen" class="flex flex-col xl:flex-row gap-6 items-start">
        
        <!-- Cột Trái (Form chính) -->
        <div class="flex-1 space-y-6 min-w-0 w-full">
            
            <!-- 1. Thông tin phiếu chuyển -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-4">
                    <span class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs text-gray-500">1</span> 
                    Thông tin phiếu chuyển
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Loại chuyển kho <span class="text-red-500">*</span></label>
                        <select id="loai_chuyen" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                            <option>Chuyển nội bộ</option>
                            <option>Chuyển sang kho bán hàng</option>
                            <option>Chuyển sang kho kiểm hàng</option>
                            <option>Chuyển sang kho bảo hành</option>
                            <option>Chuyển sang chi nhánh</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mức độ ưu tiên</label>
                        <select id="muc_do_uu_tien" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                            <option value="0">Bình thường</option>
                            <option value="1">Gấp</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- 2. Chọn kho gửi và kho nhận -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-4">
                    <span class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs text-gray-500">2</span> 
                    Chọn kho gửi & kho nhận
                </h3>
                
                <div class="flex flex-col md:flex-row items-center gap-4 relative">
                    <!-- Kho gửi -->
                    <div class="flex-1 w-full bg-gray-50 rounded-xl border border-gray-200 p-4 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1 h-full bg-gray-400"></div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <span class="iconify text-gray-500" data-icon="mdi:warehouse"></span> Kho gửi xuất hàng <span class="text-red-500">*</span>
                        </label>
                        <select id="kho_gui" onchange="checkKho()" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm font-medium">
                            <option value="">-- Chọn kho gửi --</option>
                            <?php foreach($danhSachKho as $k): ?>
                                <option value="<?= $k['id'] ?>"><?= htmlspecialchars($k['ten_kho']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <!-- Arrow -->
                    <div class="w-10 h-10 rounded-full bg-white border border-gray-200 shadow-sm flex items-center justify-center shrink-0 z-10 md:absolute md:left-1/2 md:top-1/2 md:-translate-x-1/2 md:-translate-y-1/2 text-[#6B0D18]">
                        <span class="iconify text-xl" data-icon="mdi:arrow-right-thick"></span>
                    </div>

                    <!-- Kho nhận -->
                    <div class="flex-1 w-full bg-red-50/30 rounded-xl border border-red-100 p-4 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1 h-full bg-[#6B0D18]"></div>
                        <label class="block text-sm font-semibold text-[#6B0D18] mb-2 flex items-center gap-1.5">
                            <span class="iconify" data-icon="mdi:warehouse"></span> Kho nhận hàng <span class="text-red-500">*</span>
                        </label>
                        <select id="kho_nhan" onchange="checkKho()" required class="w-full px-4 py-2.5 border border-red-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm font-medium bg-white text-[#6B0D18]">
                            <option value="">-- Chọn kho nhận --</option>
                            <?php foreach($danhSachKho as $k): ?>
                                <option value="<?= $k['id'] ?>"><?= htmlspecialchars($k['ten_kho']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <p id="errorKho" class="text-red-500 text-xs mt-3 font-medium hidden">Kho gửi và kho nhận không được trùng nhau!</p>
            </div>

            <!-- 3. Chọn sản phẩm chuyển -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-4">
                        <span class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs text-gray-500">3</span> 
                        Chọn sản phẩm thuyên chuyển
                    </h3>
                    <div class="relative flex gap-2">
                        <div class="relative flex-1">
                            <input type="text" id="searchProduct" placeholder="Tìm sản phẩm theo tên, mã SKU..." 
                                   class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm"
                                   oninput="searchProducts(this.value)">
                            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xl" data-icon="mdi:barcode-scan"></span>
                            <!-- Dropdown kết quả tìm kiếm -->
                            <div id="searchResults" class="absolute top-full left-0 right-0 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg z-50 max-h-60 overflow-y-auto hidden"></div>
                        </div>
                        <button type="button" onclick="openAddProductModal()" class="px-4 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors flex items-center gap-2 text-sm font-medium shrink-0 shadow-sm">
                            <span class="iconify text-lg" data-icon="mdi:plus"></span> Thêm sản phẩm
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[900px]">
                        <thead>
                            <tr class="bg-gray-50 text-xs uppercase text-gray-500 border-b border-gray-200">
                                <th class="py-3 px-4 font-semibold w-10">#</th>
                                <th class="py-3 px-4 font-semibold">Sản phẩm</th>
                                <th class="py-3 px-4 font-semibold w-52">Vị trí kho</th>
                                <th class="py-3 px-4 font-semibold text-center w-24">Tồn kho</th>
                                <th class="py-3 px-4 font-semibold text-center w-28">SL chuyển</th>
                                <th class="py-3 px-4 font-semibold text-center w-24">Còn lại</th>
                                <th class="py-3 px-4 font-semibold w-12 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100" id="productList">
                            <tr id="emptyRow">
                                <td colspan="7" class="py-12 text-center text-gray-500">
                                    <span class="iconify text-4xl text-gray-300 mx-auto mb-2" data-icon="mdi:package-variant"></span>
                                    <p class="text-sm font-medium">Chưa có sản phẩm. Tìm và thêm sản phẩm ở trên.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 4. Ghi chú -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-4">
                    <span class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs text-gray-500">4</span> 
                    Ghi chú
                </h3>
                <textarea id="ghi_chu" rows="3" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="Nhập ghi chú cho phiếu chuyển kho (nội bộ)..."></textarea>
            </div>

        </div>

        <!-- Cột Phải (Tóm tắt) -->
        <div class="w-full xl:w-[320px] shrink-0">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 sticky top-24">
                <h3 class="text-lg font-bold text-gray-900 mb-4 pb-4 border-b border-gray-200">Tóm tắt phiếu chuyển</h3>
                
                <div class="space-y-4 mb-6">
                    <div class="flex justify-between items-start">
                        <span class="text-sm text-gray-500">Hành trình</span>
                        <div class="text-right">
                            <div class="text-sm font-medium text-gray-600" id="summary_kho_gui">Chưa chọn</div>
                            <div class="text-gray-400 text-xs my-0.5">↓</div>
                            <div class="text-sm font-bold text-[#6B0D18]" id="summary_kho_nhan">Chưa chọn</div>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <span class="text-sm text-gray-500">Tổng sản phẩm</span>
                        <span class="text-sm font-bold text-gray-900" id="summary_tong_sp">0</span>
                    </div>
                    <div class="flex justify-between items-start pt-4 border-t border-gray-100">
                        <span class="text-sm font-medium text-gray-700">Tổng số lượng chuyển</span>
                        <span class="text-xl font-bold text-gray-900" id="summary_tong_sl">0</span>
                    </div>
                </div>

                <div class="space-y-3">
                    <button type="button" onclick="submitForm(1)" class="w-full py-3 bg-[#6B0D18] text-white font-bold rounded-lg hover:bg-red-900 transition-colors shadow-sm shadow-red-900/20 flex items-center justify-center gap-2">
                        <span class="iconify text-lg" data-icon="mdi:send-check-outline"></span> TẠO VÀ GỬI DUYỆT
                    </button>
                    <button type="button" onclick="submitForm(0)" class="w-full py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors flex items-center justify-center gap-2">
                        <span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu nháp
                    </button>
                    <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho" class="w-full py-2.5 block text-center text-sm text-gray-500 hover:text-gray-700 font-medium transition-colors">
                        Hủy bỏ
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal Thêm Sản Phẩm -->
<?php require_once __DIR__ . '/../components/Admin/shared/modal_add_product.php'; ?>

<script>
const APP_URL = '<?= APP_URL ?>';
let selectedProducts = [];
let searchTimeout = null;

function checkKho() {
    const gui = document.getElementById('kho_gui');
    const nhan = document.getElementById('kho_nhan');
    const err = document.getElementById('errorKho');
    
    document.getElementById('summary_kho_gui').innerText = gui.options[gui.selectedIndex]?.text || 'Chưa chọn';
    document.getElementById('summary_kho_nhan').innerText = nhan.options[nhan.selectedIndex]?.text || 'Chưa chọn';

    if (gui.value && nhan.value && gui.value === nhan.value) {
        err.classList.remove('hidden');
        nhan.classList.add('border-red-500');
    } else {
        err.classList.add('hidden');
        nhan.classList.remove('border-red-500');
    }
}

function searchProducts(keyword) {
    clearTimeout(searchTimeout);
    const resultsDiv = document.getElementById('searchResults');
    
    if (keyword.length < 2) {
        resultsDiv.classList.add('hidden');
        return;
    }

    searchTimeout = setTimeout(() => {
        fetch(`${APP_URL}/admin/ton-kho/api/search-variants?keyword=${encodeURIComponent(keyword)}`)
            .then(r => r.json())
            .then(data => {
                if (data.length === 0) {
                    resultsDiv.innerHTML = '<div class="p-4 text-sm text-gray-500 text-center">Không tìm thấy sản phẩm</div>';
                } else {
                    resultsDiv.innerHTML = data.map(item => `
                        <div class="px-4 py-3 hover:bg-gray-50 cursor-pointer flex items-center gap-3 border-b border-gray-100 last:border-0"
                             onclick='addProduct(${JSON.stringify(item).replace(/'/g, "\\'")})'>
                            <div class="w-8 h-8 rounded bg-gray-100 shrink-0 flex items-center justify-center overflow-hidden">
                                ${item.image ? `<img src="${APP_URL}/${item.image}" class="w-full h-full object-cover">` : '<span class="iconify text-gray-400" data-icon="mdi:image-outline"></span>'}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-medium text-gray-900 truncate">${item.name} - ${item.variant || 'Mặc định'}</div>
                                <div class="text-xs text-gray-500">${item.sku} · Tồn: ${item.stock}</div>
                            </div>
                        </div>
                    `).join('');
                }
                resultsDiv.classList.remove('hidden');
            });
    }, 300);
}

function addProduct(item) {
    document.getElementById('searchResults').classList.add('hidden');
    document.getElementById('searchProduct').value = '';
    
    if (selectedProducts.find(p => p.id === item.id)) {
        showToast('Sản phẩm này đã có trong danh sách!', 'warning');
        return;
    }
    
    // Fetch available locations for this variant
    fetch(`${APP_URL}/admin/ton-kho/api/vi-tri/${item.id}`)
        .then(r => r.json())
        .then(data => {
            const locations = data.success ? data.data : [];
            selectedProducts.push({
                id: item.id,
                name: item.name,
                variant: item.variant || 'Mặc định',
                sku: item.sku,
                image: item.image,
                stock: item.stock,
                quantity: 1,
                locations: locations,
                id_vi_tri: locations.length === 1 ? locations[0].id_vi_tri : ''
            });
            renderProductList();
        })
        .catch(() => {
            selectedProducts.push({
                id: item.id,
                name: item.name,
                variant: item.variant || 'Mặc định',
                sku: item.sku,
                image: item.image,
                stock: item.stock,
                quantity: 1,
                locations: [],
                id_vi_tri: ''
            });
            renderProductList();
        });
}

function removeProduct(id) {
    selectedProducts = selectedProducts.filter(p => p.id !== id);
    renderProductList();
}

function updateQuantity(id, value) {
    const product = selectedProducts.find(p => p.id === id);
    if (!product) return;
    
    let qty = parseInt(value) || 0;
    if (qty > product.stock) {
        showToast(`Số lượng chuyển không được vượt quá tồn kho (${product.stock})!`, 'warning');
        qty = product.stock;
    }
    if (qty < 0) qty = 0;
    
    product.quantity = qty;
    renderProductList();
}

function updateLocation(id, value) {
    const product = selectedProducts.find(p => p.id === id);
    if (product) {
        product.id_vi_tri = value;
        // Update stock display based on selected location
        if (value && product.locations) {
            const loc = product.locations.find(l => String(l.id_vi_tri) === String(value));
            if (loc) {
                product.stock_at_loc = loc.so_luong;
            }
        } else {
            product.stock_at_loc = null;
        }
        renderProductList();
    }
}

function renderProductList() {
    const tbody = document.getElementById('productList');
    
    if (selectedProducts.length === 0) {
        tbody.innerHTML = `<tr id="emptyRow"><td colspan="7" class="py-12 text-center text-gray-500">
            <span class="iconify text-4xl text-gray-300 mx-auto mb-2" data-icon="mdi:package-variant"></span>
            <p class="text-sm font-medium">Chưa có sản phẩm. Tìm và thêm sản phẩm ở trên.</p>
        </td></tr>`;
    } else {
        tbody.innerHTML = selectedProducts.map((p, i) => {
            const displayStock = p.stock_at_loc != null ? p.stock_at_loc : p.stock;
            const locOptions = (p.locations || []).map(loc => 
                `<option value="${loc.id_vi_tri}" ${String(p.id_vi_tri) === String(loc.id_vi_tri) ? 'selected' : ''}>${loc.ten_kho} > ${loc.ten_vi_tri} (Sẵn: ${loc.so_luong})</option>`
            ).join('');
            
            return `
            <tr class="hover:bg-gray-50/50">
                <td class="py-3 px-4 text-gray-400 text-sm">${i + 1}</td>
                <td class="py-3 px-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded border border-gray-200 overflow-hidden shrink-0 bg-gray-100 flex items-center justify-center">
                            ${p.image ? `<img src="${APP_URL}/${p.image}" class="w-full h-full object-cover">` : '<span class="iconify text-gray-400" data-icon="mdi:image-outline"></span>'}
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-900">${p.name}</div>
                            <div class="text-xs text-gray-500">${p.sku} · ${p.variant}</div>
                        </div>
                    </div>
                </td>
                <td class="py-3 px-4">
                    <select onchange="updateLocation('${p.id}', this.value)" 
                            class="w-full px-2 py-1.5 border ${p.id_vi_tri ? 'border-gray-300' : 'border-amber-400 bg-amber-50'} rounded-lg text-xs focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]/20 transition-colors">
                        <option value="">-- Chọn vị trí --</option>
                        ${locOptions}
                    </select>
                    ${!p.id_vi_tri && (p.locations || []).length > 0 ? '<div class="text-[10px] text-amber-600 mt-1 font-medium">⚠ Chưa chọn vị trí</div>' : ''}
                    ${(p.locations || []).length === 0 ? '<div class="text-[10px] text-gray-400 mt-1">Chưa gán vị trí lưu trữ</div>' : ''}
                </td>
                <td class="py-3 px-4 text-center">
                    <span class="inline-flex items-center justify-center px-2 py-1 rounded bg-gray-100 text-gray-700 font-bold text-sm">${displayStock}</span>
                </td>
                <td class="py-3 px-4 text-center">
                    <input type="number" min="1" max="${displayStock}" value="${p.quantity}" 
                           onchange="updateQuantity('${p.id}', this.value)"
                           class="w-20 text-center px-2 py-1.5 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] font-bold text-[#6B0D18] bg-white">
                </td>
                <td class="py-3 px-4 text-center">
                    <span class="font-medium text-gray-500">${displayStock - p.quantity}</span>
                </td>
                <td class="py-3 px-4 text-center">
                    <button type="button" onclick="removeProduct('${p.id}')" class="text-red-500 hover:bg-red-50 p-1.5 rounded-lg transition-colors">
                        <span class="iconify" data-icon="mdi:trash-can-outline"></span>
                    </button>
                </td>
            </tr>
        `}).join('');
    }
    
    // Update summary
    document.getElementById('summary_tong_sp').innerText = selectedProducts.length;
    document.getElementById('summary_tong_sl').innerText = selectedProducts.reduce((sum, p) => sum + p.quantity, 0);
}

function submitForm(trangThai) {
    const khoGui = document.getElementById('kho_gui').value;
    const khoNhan = document.getElementById('kho_nhan').value;
    
    if (!khoGui || !khoNhan) {
        showToast('Vui lòng chọn kho gửi và kho nhận.', 'warning');
        return;
    }
    if (khoGui === khoNhan) {
        showToast('Kho gửi và kho nhận không được trùng nhau!', 'warning');
        return;
    }
    if (selectedProducts.length === 0) {
        showToast('Vui lòng chọn ít nhất 1 sản phẩm.', 'warning');
        return;
    }
    
    // Validate locations
    const missingLoc = selectedProducts.filter(p => (p.locations || []).length > 0 && !p.id_vi_tri);
    if (missingLoc.length > 0) {
        showToast('Vui lòng chọn Vị trí xuất (Kho/Kệ) cho tất cả sản phẩm.', 'warning');
        return;
    }
    
    const data = {
        id_kho_gui: khoGui,
        id_kho_nhan: khoNhan,
        loai_chuyen: document.getElementById('loai_chuyen').value,
        muc_do_uu_tien: document.getElementById('muc_do_uu_tien').value,
        ghi_chu: document.getElementById('ghi_chu').value,
        trang_thai: trangThai,
        chi_tiet: selectedProducts.map(p => ({
            id_bien_the: p.id,
            so_luong: p.quantity,
            id_vi_tri: p.id_vi_tri || null
        }))
    };
    
    fetch(`${APP_URL}/admin/thuyen-chuyen-kho/luu`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(r => r.json())
    .then(result => {
        if (result.success) {
            showToast(result.message, 'success');
            setTimeout(() => { window.location.href = `${APP_URL}/admin/thuyen-chuyen-kho`; }, 1000);
        } else {
            showToast('Lỗi: ' + result.message, 'error');
        }
    })
    .catch(err => showToast('Có lỗi xảy ra: ' + err.message, 'error'));
}

// Close search results when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('#searchProduct') && !e.target.closest('#searchResults')) {
        document.getElementById('searchResults').classList.add('hidden');
    }
});
</script>
