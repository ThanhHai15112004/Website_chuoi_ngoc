<script>
    // Interactive Preview updating
    function updatePreview() {
        const ma = document.getElementById('input_ma').value.trim().toUpperCase() || 'MÃ_VOUCHER';
        const ten = document.getElementById('input_ten').value.trim() || 'Tên chương trình';
        const dk = document.getElementById('input_dieu_kien').value;
        const date = document.getElementById('input_date').value;
        
        // Update Code
        document.getElementById('input_ma').value = ma;
        document.getElementById('preview_ma').textContent = ma;
        document.getElementById('preview_ten').textContent = ten;
        
        // Update Condition
        if (dk && dk > 0) {
            document.getElementById('preview_dieu_kien').textContent = `Đơn từ ${parseInt(dk).toLocaleString('vi-VN')}đ`;
        } else {
            document.getElementById('preview_dieu_kien').textContent = 'Không yêu cầu';
        }
        
        // Update Date
        if (date) {
            const d = new Date(date);
            document.getElementById('preview_date').textContent = `HSD: ${d.toLocaleDateString('vi-VN')}`;
        }

        // Update Value based on Type
        const type = document.querySelector('input[name="loai_giam"]:checked').value;
        let gia_tri = '';
        if (type === 'percent') {
            const val = document.getElementById('input_gia_tri').value;
            gia_tri = val ? `Giảm ${val}%` : 'Giảm 0%';
        } else if (type === 'fixed') {
            const val = document.getElementById('input_gia_tri_fixed').value;
            gia_tri = val ? `Giảm ${parseInt(val).toLocaleString('vi-VN')}đ` : 'Giảm 0đ';
        } else if (type === 'freeship') {
            gia_tri = 'Miễn phí vận chuyển';
        } else {
            gia_tri = 'Quà tặng bí mật';
        }
        document.getElementById('preview_gia_tri').textContent = gia_tri;
    }

    function toggleDiscountType() {
        const type = document.querySelector('input[name="loai_giam"]:checked').value;
        const divPercent = document.getElementById('discountFieldsPercent');
        const divFixed = document.getElementById('discountFieldsFixed');
        const fieldPercent = document.getElementById('field_percent');
        
        if (type === 'percent') {
            divPercent.classList.remove('hidden');
            divFixed.classList.add('hidden');
            if(fieldPercent) fieldPercent.style.display = 'block';
        } else if (type === 'fixed') {
            divPercent.classList.add('hidden');
            divFixed.classList.remove('hidden');
            if(fieldPercent) fieldPercent.style.display = 'block';
        } else if (type === 'freeship') {
            divPercent.classList.remove('hidden');
            divFixed.classList.add('hidden');
            if(fieldPercent) fieldPercent.style.display = 'none';
        } else {
            divPercent.classList.add('hidden');
            divFixed.classList.add('hidden');
        }
        updatePreview();
    }

    function generateRandomCode() {
        const prefixes = ['NGOC', 'CHUOI', 'LIXI', 'SALE', 'NEW', 'VIP'];
        const p = prefixes[Math.floor(Math.random() * prefixes.length)];
        const num = Math.floor(10 + Math.random() * 90);
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        const str = chars.charAt(Math.floor(Math.random() * chars.length)) + chars.charAt(Math.floor(Math.random() * chars.length));
        
        const input = document.getElementById('input_ma');
        input.value = `${p}${num}${str}`;
        updatePreview();
    }

    // Save button logic
    async function saveVoucher(btn) {
        const id = document.getElementById('voucher_id').value;
        const ma_voucher = document.getElementById('input_ma').value.trim();
        const ten_chuong_trinh = document.getElementById('input_ten').value.trim();
        const mo_ta = document.getElementById('input_mo_ta').value.trim();
        
        const loai_giam = document.querySelector('input[name="loai_giam"]:checked').value;
        let gia_tri = 0;
        if (loai_giam === 'percent') gia_tri = document.getElementById('input_gia_tri').value;
        if (loai_giam === 'fixed') gia_tri = document.getElementById('input_gia_tri_fixed').value;
        
        const giam_toi_da = document.getElementById('input_giam_toi_da') ? document.getElementById('input_giam_toi_da').value : 0;
        const don_toi_thieu = document.getElementById('input_dieu_kien').value;
        const pham_vi_san_pham = document.getElementById('input_pham_vi').value;
        const is_combine = document.getElementById('input_is_combine').checked;
        
        const ngay_bat_dau = document.getElementById('input_ngay_bat_dau').value;
        const ngay_ket_thuc = document.getElementById('input_date').value;
        
        const is_unlimited_usage = document.getElementById('input_unlimited').checked;
        const so_luong = is_unlimited_usage ? -1 : document.getElementById('input_so_luong').value;
        
        const doi_tuong = document.querySelector('input[name="doi_tuong"]:checked').value;
        const htvNodes = document.querySelectorAll('input[name="hang_thanh_vien[]"]:checked');
        const hang_thanh_vien = Array.from(htvNodes).map(n => n.value);
        
        const trang_thai = document.getElementById('input_trang_thai').checked;

        // Xử lý Danh mục và Sản phẩm
        let danh_muc_ids = [];
        let san_pham_ids = [];
        if (pham_vi_san_pham === 'category') {
            const checkedCategories = document.querySelectorAll('.category-checkbox:checked');
            danh_muc_ids = Array.from(checkedCategories).map(cb => cb.value);
            if (danh_muc_ids.length === 0) {
                alert('Vui lòng chọn ít nhất 1 danh mục!');
                return;
            }
        } else if (pham_vi_san_pham === 'product') {
            san_pham_ids = selectedProducts.map(p => p.id);
            if (san_pham_ids.length === 0) {
                alert('Vui lòng chọn ít nhất 1 sản phẩm!');
                return;
            }
        }

        if (!ma_voucher || !ten_chuong_trinh || !ngay_bat_dau || !ngay_ket_thuc) {
            alert('Vui lòng điền đầy đủ các trường bắt buộc!');
            return;
        }

        const payload = {
            ma_voucher, ten_chuong_trinh, mo_ta, loai_giam, gia_tri, giam_toi_da,
            don_toi_thieu, pham_vi_san_pham, is_combine, ngay_bat_dau, ngay_ket_thuc,
            is_unlimited_usage, so_luong, doi_tuong, hang_thanh_vien, trang_thai,
            danh_muc_ids, san_pham_ids
        };

        const originalContent = btn.innerHTML;
        btn.innerHTML = `<span class="iconify animate-spin text-xl" data-icon="mdi:loading"></span> Đang xử lý...`;
        btn.disabled = true;
        
        try {
            const url = id ? `<?= APP_URL ?>/admin/voucher/update/${id}` : `<?= APP_URL ?>/admin/voucher/store`;
            const res = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            
            if (data.success) {
                showToast(data.message);
                setTimeout(() => {
                    window.location.href = '<?= APP_URL ?>/admin/voucher';
                }, 1500);
            } else {
                alert(data.message || 'Có lỗi xảy ra!');
                btn.innerHTML = originalContent;
                btn.disabled = false;
            }
        } catch (e) {
            alert('Lỗi kết nối!');
            btn.innerHTML = originalContent;
            btn.disabled = false;
        }
    }

    // Toast functionality
    let toastTimeout;
    function showToast(msg) {
        const toast = document.getElementById('toast');
        document.getElementById('toast-msg').textContent = msg;
        
        toast.classList.remove('translate-y-20', 'opacity-0');
        
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            hideToast();
        }, 3000);
    }

    function hideToast() {
        const toast = document.getElementById('toast');
        toast.classList.add('translate-y-20', 'opacity-0');
    }

    // SCOPE UI LOGIC
    function toggleScopeUI() {
        const pham_vi = document.getElementById('input_pham_vi').value;
        const catBox = document.getElementById('scope_category_box');
        const prodBox = document.getElementById('scope_product_box');
        
        if (catBox) catBox.classList.add('hidden');
        if (prodBox) prodBox.classList.add('hidden');
        
        if (pham_vi === 'category' && catBox) {
            catBox.classList.remove('hidden');
        } else if (pham_vi === 'product' && prodBox) {
            prodBox.classList.remove('hidden');
        }
    }

    let selectedProducts = [
        <?php foreach($voucher_san_pham ?? [] as $sp): ?>
        { id: '<?= $sp['id_san_pham'] ?>', ten_sp: '<?= addslashes($sp['ten_sp']) ?>', ma_sp: '<?= addslashes($sp['ma_sp']) ?>', anh_chinh: '<?= addslashes($sp['anh_chinh']) ?>' },
        <?php endforeach; ?>
    ];

    let searchDebounceTimeout;
    function searchProductDebounce(keyword) {
        clearTimeout(searchDebounceTimeout);
        const resultsBox = document.getElementById('search_product_results');
        
        if (!keyword.trim()) {
            resultsBox.classList.add('hidden');
            return;
        }

        searchDebounceTimeout = setTimeout(async () => {
            try {
                resultsBox.classList.remove('hidden');
                resultsBox.innerHTML = '<div class="p-3 text-center text-sm text-gray-500"><span class="iconify animate-spin" data-icon="mdi:loading"></span> Đang tìm kiếm...</div>';
                
                const res = await fetch(`<?= APP_URL ?>/admin/san-pham/api/search?q=${encodeURIComponent(keyword)}`);
                const json = await res.json();
                
                if (json.success && json.data.length > 0) {
                    let html = '';
                    json.data.forEach(p => {
                        const isSelected = selectedProducts.some(sp => sp.id == p.id);
                        if (!isSelected) {
                            html += `
                            <div class="p-2 border-b border-gray-100 hover:bg-gray-50 cursor-pointer flex items-center gap-3 transition-colors" onclick="addProduct('${p.id}', '${p.ten_sp.replace(/'/g, "\\'")}', '${p.ma_sp}', '${p.anh_chinh}')">
                                <img src="${p.anh_chinh}" class="w-10 h-10 object-cover rounded border border-gray-200">
                                <div>
                                    <p class="text-sm font-medium text-gray-800 line-clamp-1">${p.ten_sp}</p>
                                    <p class="text-xs text-gray-500">${p.ma_sp}</p>
                                </div>
                                <span class="iconify ml-auto text-gray-400" data-icon="mdi:plus-circle-outline"></span>
                            </div>`;
                        }
                    });
                    resultsBox.innerHTML = html || '<div class="p-3 text-center text-sm text-gray-500">Các sản phẩm này đã được chọn</div>';
                } else {
                    resultsBox.innerHTML = '<div class="p-3 text-center text-sm text-gray-500">Không tìm thấy sản phẩm</div>';
                }
            } catch (e) {
                resultsBox.innerHTML = '<div class="p-3 text-center text-sm text-red-500">Lỗi kết nối</div>';
            }
        }, 500);
    }

    function addProduct(id, ten_sp, ma_sp, anh_chinh) {
        if (!selectedProducts.some(p => p.id == id)) {
            selectedProducts.push({id, ten_sp, ma_sp, anh_chinh});
            renderSelectedProducts();
        }
        document.getElementById('search_product_results').classList.add('hidden');
        document.getElementById('search_product_input').value = '';
    }

    function removeProduct(id) {
        selectedProducts = selectedProducts.filter(p => p.id != id);
        renderSelectedProducts();
    }

    function renderSelectedProducts() {
        const list = document.getElementById('selected_products_list');
        const count = document.getElementById('selected_products_count');
        if (!list) return;
        
        count.textContent = selectedProducts.length;
        let html = '';
        selectedProducts.forEach(sp => {
            html += `
            <div class="flex items-center justify-between bg-white p-2 border border-gray-200 rounded animate-[fadeIn_0.2s_ease-out]">
                <div class="flex items-center gap-2">
                    <img src="${sp.anh_chinh}" class="w-8 h-8 rounded object-cover border border-gray-100">
                    <div>
                        <p class="text-sm font-medium text-gray-800 line-clamp-1">${sp.ten_sp}</p>
                        <p class="text-xs text-gray-500">${sp.ma_sp}</p>
                    </div>
                </div>
                <button type="button" onclick="removeProduct('${sp.id}')" class="text-red-500 hover:text-red-700 p-1">
                    <span class="iconify" data-icon="mdi:close"></span>
                </button>
            </div>`;
        });
        list.innerHTML = html;
    }

    // Hide search results when clicking outside
    document.addEventListener('click', function(e) {
        const box = document.getElementById('search_product_results');
        const input = document.getElementById('search_product_input');
        if (box && !box.contains(e.target) && e.target !== input) {
            box.classList.add('hidden');
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        updatePreview();
        toggleScopeUI();
    });
</script>
