<script>
document.addEventListener('DOMContentLoaded', () => {
    let searchTimeout = null;
    const searchInput = document.getElementById('search-product-input');
    const resultContainer = document.getElementById('search-results');
    const btnSearchTrigger = document.getElementById('btn-search-trigger');

    function performSearch(query) {
        if (query.length < 2) {
            resultContainer.classList.add('hidden');
            return;
        }

        fetch(`<?= APP_URL ?>/admin/khuyen-mai/api/search?q=${encodeURIComponent(query)}`)
            .then(async res => {
                const text = await res.text();
                try {
                    const data = JSON.parse(text);
                    return data;
                } catch (e) {
                    console.error("RAW RESPONSE:", text);
                    throw new Error(text.substring(0, 100)); // Throw first 100 chars of HTML error
                }
            })
            .then(data => {
                resultContainer.innerHTML = '';
                if (data.length === 0) {
                    resultContainer.innerHTML = '<div class="p-3 text-sm text-gray-500 text-center">Không tìm thấy sản phẩm</div>';
                } else {
                    data.forEach(item => {
                        const row = document.createElement('div');
                        row.className = 'flex items-center gap-3 p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100 last:border-0';
                        row.innerHTML = `
                            <img src="${item.hinh_anh_chinh}" class="w-10 h-10 rounded border border-gray-100 object-cover">
                            <div class="flex-1">
                                <div class="font-medium text-gray-800 text-sm">${item.ten_sp}</div>
                                <div class="text-xs text-gray-500">${item.ma_sp} - Tồn: ${item.tong_ton_kho}</div>
                            </div>
                            <div class="text-[#6B0D18] font-medium text-sm">${parseInt(item.gia_ban).toLocaleString('vi-VN')}đ</div>
                        `;
                        row.onclick = () => addProductToPromotion(item);
                        resultContainer.appendChild(row);
                    });
                }
                resultContainer.classList.remove('hidden');
            }).catch(err => {
                console.error(err);
                resultContainer.innerHTML = '<div class="p-3 text-sm text-red-500 text-center">Lỗi: ' + err.message + '</div>';
                resultContainer.classList.remove('hidden');
            });
    }

    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            const query = e.target.value.trim();
            searchTimeout = setTimeout(() => performSearch(query), 300);
        });
    }

    if (btnSearchTrigger) {
        btnSearchTrigger.addEventListener('click', () => {
            const query = searchInput.value.trim();
            performSearch(query);
        });
    }

    // Hide search results when clicking outside
    document.addEventListener('click', (e) => {
        if (resultContainer && searchInput && !e.target.closest('#search-results') && !e.target.closest('#search-product-input') && !e.target.closest('#btn-search-trigger')) {
            resultContainer.classList.add('hidden');
        }
    });

    // Initialize preview state
    updatePreview();
});

function addProductToPromotion(item) {
        const tbody = document.getElementById('selected-products-body');
        
        // Prevent duplicate
        if (tbody.querySelector(`tr[data-id="${item.id}"]`)) {
            alert('Sản phẩm này đã được chọn!');
            return;
        }

        const tr = document.createElement('tr');
        tr.dataset.id = item.id;
        tr.dataset.price = item.gia_ban;
        tr.dataset.name = item.ten_sp;
        tr.dataset.img = item.hinh_anh_chinh;
        tr.innerHTML = `
            <td class="px-4 py-3 flex items-center gap-2">
                <img src="${item.hinh_anh_chinh}" class="w-8 h-8 rounded border border-gray-100 object-cover">
                <div>
                    <div class="font-medium text-gray-800 text-[13px]">${item.ten_sp}</div>
                    <div class="text-[10px] text-gray-400 font-mono">${item.ma_sp}</div>
                </div>
            </td>
            <td class="px-4 py-3 text-gray-800">${parseInt(item.gia_ban).toLocaleString('vi-VN')}đ</td>
            <td class="px-4 py-3 text-gray-800">${item.tong_ton_kho}</td>
            <td class="px-4 py-3 text-right">
                <button type="button" class="text-red-400 hover:text-red-600 remove-product-btn"><span class="iconify text-lg" data-icon="mdi:close-circle"></span></button>
            </td>
        `;
        tbody.appendChild(tr);
        document.getElementById('search-results').classList.add('hidden');
        document.getElementById('search-product-input').value = '';
        updatePreview();
    }

    // Delegate remove product
    const selectedBody = document.getElementById('selected-products-body');
    if (selectedBody) {
        selectedBody.addEventListener('click', function(e) {
            const btn = e.target.closest('.remove-product-btn');
            if (btn) {
                btn.closest('tr').remove();
                updatePreview();
            }
        });
    }

    function submitPromotionForm(isDraft) {
        const inputId = document.getElementById('input-id');
        const url = inputId ? 
            '<?= APP_URL ?>/admin/khuyen-mai/cap-nhat/' + inputId.value : 
            '<?= APP_URL ?>/admin/khuyen-mai/luu';

        const data = new FormData();
        data.append('ten_chuong_trinh', document.getElementById('input-name').value);
        data.append('ma_km', document.getElementById('input-code').value);
        
        const type = document.querySelector('input[name="promo_type"]:checked');
        if(type) data.append('loai_km', type.value);
        
        const kieu = document.querySelector('input[name="kieu_giam"]:checked');
        if(kieu) data.append('kieu_giam', kieu.value);
        
        data.append('gia_tri_giam', document.getElementById('input-discount').value);
        data.append('ngay_bat_dau', document.getElementById('input-start').value);
        data.append('ngay_ket_thuc', document.getElementById('input-end').value);
        
        if(document.getElementById('input-limit-total').value) data.append('gioi_han_tong', document.getElementById('input-limit-total').value);
        if(document.getElementById('input-limit-user').value) data.append('gioi_han_khach', document.getElementById('input-limit-user').value);
        
        if(document.getElementById('input-badge').checked) data.append('hien_thi_badge', '1');
        if(document.getElementById('input-countdown').checked) data.append('hien_thi_countdown', '1');
        if(document.getElementById('input-progress').checked) data.append('hien_thi_progress', '1');
        if(isDraft) data.append('draft', '1');

        // Collect products
        const products = [];
        document.querySelectorAll('#selected-products-body tr').forEach(tr => {
            if(tr.dataset.id) products.push(tr.dataset.id);
        });
        
        if(products.length === 0) {
            alert('Vui lòng chọn ít nhất 1 sản phẩm áp dụng!');
            return;
        }
        
        data.append('products', JSON.stringify(products));

        fetch(url, {
            method: 'POST',
            body: data,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.json())
        .then(res => {
            if(res.success) {
                showFormToast();
            } else {
                alert('Lỗi: ' + res.message);
            }
        })
        .catch(err => {
            console.error(err);
            alert('Có lỗi xảy ra khi lưu chương trình');
        });
    }

    function showFormToast() {
        const t = document.getElementById('formToast');
        if (t) {
            t.classList.remove('translate-y-20', 'opacity-0');
            setTimeout(() => t.classList.add('translate-y-20', 'opacity-0'), 3000);
        }
        setTimeout(() => window.location.href = '<?= APP_URL ?>/admin/khuyen-mai', 1500);
    }

    function updatePreview() {
        const discountInput = document.getElementById('input-discount')?.value;
        const typeFlash = document.querySelector('input[name="promo_type"][value="flash"]')?.checked;
        const kieuGiam = document.querySelector('input[name="kieu_giam"]:checked')?.value;
        
        // Find first selected product to use as base, else use mock
        const firstTr = document.querySelector('#selected-products-body tr');
        let basePrice = 1000000;
        let baseName = "Vòng Ngọc Bích Tài Lộc Hảo Hạng Tự Nhiên";
        let baseImg = "<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg";
        
        if (firstTr) {
            basePrice = parseFloat(firstTr.dataset.price) || 1000000;
            baseName = firstTr.dataset.name || baseName;
            baseImg = firstTr.dataset.img || baseImg;
        }

        // Update preview card details
        const prevName = document.querySelector('#prev-name');
        if (prevName) prevName.textContent = baseName;
        const prevImg = document.querySelector('#prev-img');
        if (prevImg) prevImg.src = baseImg;
        const prevPriceOriginal = document.querySelector('#prev-price-original');
        if (prevPriceOriginal) prevPriceOriginal.textContent = basePrice.toLocaleString('vi-VN') + 'đ';

        // Update estimation text
        const estimationText = document.getElementById('estimation-text');
        if (estimationText) estimationText.textContent = `Giá trị sau khi giảm (ước tính cho sp gốc ${basePrice.toLocaleString('vi-VN')}đ):`;
        const estimationOriginal = document.getElementById('estimation-original');
        if (estimationOriginal) estimationOriginal.textContent = basePrice.toLocaleString('vi-VN') + 'đ';

        // Update unit
        const unitEl = document.getElementById('discount-unit');
        if(unitEl) {
            if(kieuGiam === 'phan_tram') unitEl.textContent = '%';
            else unitEl.textContent = 'đ';
        }

        // Update math
        if(discountInput !== undefined) {
            let salePrice = basePrice;
            const val = parseFloat(discountInput.replace(/,/g, '')) || 0;
            if(kieuGiam === 'phan_tram') {
                salePrice = basePrice * (1 - (val / 100));
            } else if (kieuGiam === 'so_tien') {
                salePrice = Math.max(0, basePrice - val);
            } else {
                salePrice = val;
            }
            
            const formattedSale = salePrice.toLocaleString('vi-VN') + 'đ';
            document.getElementById('calc-result').textContent = formattedSale;
            
            const prevPriceSale = document.getElementById('prev-price-sale');
            if(prevPriceSale) prevPriceSale.textContent = formattedSale;
            
            const prevDiscountVal = document.getElementById('prev-discount-val');
            if(prevDiscountVal) {
                if(kieuGiam === 'phan_tram') prevDiscountVal.textContent = '-' + val + '%';
                else {
                    const pct = Math.round(((basePrice - salePrice) / basePrice) * 100);
                    prevDiscountVal.textContent = '-' + pct + '%';
                }
            }
        }

        // Toggle flash badge specifically
        const flashBadge = document.getElementById('prev-flash-badge');
        if(flashBadge) {
            if(typeFlash) {
                flashBadge.style.opacity = '1';
                flashBadge.style.display = 'flex';
            } else {
                flashBadge.style.opacity = '0';
                setTimeout(() => { if(flashBadge.style.opacity === '0') flashBadge.style.display = 'none'; }, 300);
            }
        }
    }

    function togglePreviewBadge(type, isShow) {
        let el;
        if(type === 'sale_badge') el = document.getElementById('prev-sale-badge');
        if(type === 'countdown') el = document.getElementById('prev-countdown');
        if(type === 'progress') el = document.getElementById('prev-progress');
        
        if(el) {
            if(isShow) {
                el.style.display = type === 'countdown' || type === 'sale_badge' ? 'flex' : 'block';
                setTimeout(() => el.style.opacity = '1', 10);
            } else {
                el.style.opacity = '0';
                setTimeout(() => { if(el.style.opacity === '0') el.style.display = 'none'; }, 300);
            }
        }
    }

    // Initialize state
    document.addEventListener('DOMContentLoaded', () => {
        updatePreview();
    });
</script>
