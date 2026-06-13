<?php
// views/components/Admin/don_hang/tao_scripts.php
?>
<script>
    let cart = [];
    let searchProductTimeout = null;
    let searchCustomerTimeout = null;

    // Định dạng tiền
    function formatMoney(amount) {
        return new Intl.NumberFormat('vi-VN').format(amount) + 'đ';
    }

    function formatCurrencyInput(input) {
        let val = input.value.replace(/[^0-9]/g, '');
        if (val) {
            input.value = new Intl.NumberFormat('vi-VN').format(val);
        } else {
            input.value = '0';
        }
    }

    function getNumberFromInput(val) {
        if (!val) return 0;
        return parseInt(val.toString().replace(/[^0-9]/g, '')) || 0;
    }

    // ================= SẢN PHẨM & GIỎ HÀNG ================= //

    const searchProductInput = document.getElementById('search-product');
    const productResultsContainer = document.getElementById('product-results');

    searchProductInput.addEventListener('input', function() {
        const keyword = this.value.trim();
        clearTimeout(searchProductTimeout);

        if (keyword.length < 2) {
            productResultsContainer.classList.add('hidden');
            return;
        }

        searchProductTimeout = setTimeout(() => {
            fetch(`<?= APP_URL ?>/admin/ton-kho/api/search-variants?keyword=${encodeURIComponent(keyword)}`)
                .then(res => res.json())
                .then(data => {
                    renderProductResults(data);
                })
                .catch(err => console.error(err));
        }, 300);
    });

    function renderProductResults(products) {
        productResultsContainer.innerHTML = '';
        if (products.length === 0) {
            productResultsContainer.innerHTML = '<div class="p-4 text-center text-gray-500 text-sm">Không tìm thấy sản phẩm.</div>';
        } else {
            products.forEach(p => {
                const img = p.image ? `<?= APP_URL ?>/${p.image}` : '';
                const imgTag = img ? `<img src="${img}" class="w-10 h-10 rounded object-cover">` : `<div class="w-10 h-10 rounded bg-gray-100 flex items-center justify-center"><span class="iconify text-gray-400" data-icon="mdi:image-outline"></span></div>`;
                
                const item = document.createElement('div');
                item.className = 'flex items-center gap-3 p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-50 transition-colors';
                // Only allow adding if stock > 0
                if (p.stock > 0) {
                    item.onclick = () => {
                        addToCart(p);
                        productResultsContainer.classList.add('hidden');
                        searchProductInput.value = '';
                    };
                } else {
                    item.classList.add('opacity-50', 'cursor-not-allowed');
                }

                item.innerHTML = `
                    ${imgTag}
                    <div class="flex-1">
                        <div class="font-bold text-gray-900 text-sm">${p.name}</div>
                        <div class="text-xs text-gray-500 flex gap-2"><span>${p.sku}</span> | <span>${p.variant}</span></div>
                    </div>
                    <div class="text-right">
                        ${p.is_on_sale && p.original_price > p.price ? `
                            <div class="text-[10px] text-gray-400 line-through">${formatMoney(p.original_price)}</div>
                            <div class="font-bold text-[#6B0D18] text-sm flex items-center gap-1 justify-end">${formatMoney(p.price)} <span class="bg-red-100 text-red-700 text-[9px] px-1 rounded font-bold">KM</span></div>
                        ` : `
                            <div class="font-bold text-[#6B0D18] text-sm">${formatMoney(p.price)}</div>
                        `}
                        <div class="text-[10px] ${p.stock > 0 ? 'text-emerald-600' : 'text-red-500'} font-medium">Tồn: ${p.stock}</div>
                    </div>
                `;
                productResultsContainer.appendChild(item);
            });
        }
        productResultsContainer.classList.remove('hidden');
    }

    // Hide results on click outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('#search-product') && !e.target.closest('#product-results')) {
            productResultsContainer.classList.add('hidden');
        }
        if (!e.target.closest('#search-customer') && !e.target.closest('#customer-results')) {
            document.getElementById('customer-results').classList.add('hidden');
        }
    });

    function addToCart(product) {
        const existingIndex = cart.findIndex(item => item.id === product.id);
        if (existingIndex > -1) {
            if (cart[existingIndex].quantity < product.stock) {
                cart[existingIndex].quantity += 1;
            } else {
                showToast('Vượt quá số lượng tồn kho', 'error');
            }
        } else {
            cart.push({ ...product, quantity: 1 });
        }
        renderCart();
    }

    function updateQuantity(id, action) {
        const index = cart.findIndex(item => item.id === id);
        if (index > -1) {
            if (action === 'increase') {
                if (cart[index].quantity < cart[index].stock) {
                    cart[index].quantity += 1;
                } else {
                    showToast('Vượt quá tồn kho', 'error');
                }
            } else if (action === 'decrease') {
                if (cart[index].quantity > 1) {
                    cart[index].quantity -= 1;
                } else {
                    removeFromCart(id);
                    return;
                }
            }
            renderCart();
        }
    }

    function changeQuantityManual(id, el) {
        const index = cart.findIndex(item => item.id === id);
        if (index > -1) {
            let val = parseInt(el.value);
            if (isNaN(val) || val < 1) val = 1;
            if (val > cart[index].stock) {
                val = cart[index].stock;
                showToast('Vượt quá tồn kho', 'error');
            }
            cart[index].quantity = val;
            renderCart();
        }
    }

    function removeFromCart(id) {
        cart = cart.filter(item => item.id !== id);
        renderCart();
    }

    function renderCart() {
        const tbody = document.getElementById('cart-items');
        document.getElementById('cart-count').textContent = `${cart.length} sản phẩm`;
        
        if (cart.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="p-12 text-center text-gray-400">
                        <div class="flex flex-col items-center justify-center">
                            <span class="iconify text-4xl mb-2" data-icon="mdi:cart-remove"></span>
                            <p>Giỏ hàng đang trống</p>
                            <p class="text-xs mt-1">Vui lòng tìm kiếm và thêm sản phẩm</p>
                        </div>
                    </td>
                </tr>
            `;
            calculateTotals();
            return;
        }

        tbody.innerHTML = '';
        cart.forEach((item, index) => {
            const img = item.image ? `<img src="<?= APP_URL ?>/${item.image}" class="w-10 h-10 object-cover rounded">` : `<div class="w-10 h-10 rounded bg-gray-100"></div>`;
            const total = item.price * item.quantity;
            
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td class="p-4 text-center text-gray-500 font-medium">${index + 1}</td>
                <td class="p-4">
                    <div class="flex items-center gap-3">
                        ${img}
                        <div>
                            <div class="font-bold text-gray-900">${item.name}</div>
                            <div class="text-xs text-gray-500 flex gap-1"><span>${item.sku}</span> • <span>${item.variant}</span></div>
                        </div>
                    </div>
                </td>
                <td class="p-4 text-right">
                    ${item.is_on_sale && item.original_price > item.price ? `<div class="text-[10px] text-gray-400 line-through">${formatMoney(item.original_price)}</div>` : ''}
                    <div class="font-medium text-gray-700">${formatMoney(item.price)}</div>
                </td>
                <td class="p-4">
                    <div class="flex items-center justify-center">
                        <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden bg-white">
                            <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:bg-gray-50 hover:text-red-500 transition-colors border-r border-gray-200" onclick="updateQuantity('${item.id}', 'decrease')">
                                <span class="iconify" data-icon="mdi:minus"></span>
                            </button>
                            <input type="text" class="w-12 h-8 text-center text-sm font-bold text-gray-700 focus:outline-none" value="${item.quantity}" onchange="changeQuantityManual('${item.id}', this)">
                            <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:bg-gray-50 hover:text-emerald-500 transition-colors border-l border-gray-200" onclick="updateQuantity('${item.id}', 'increase')">
                                <span class="iconify" data-icon="mdi:plus"></span>
                            </button>
                        </div>
                    </div>
                </td>
                <td class="p-4 text-right font-bold text-[#6B0D18]">${formatMoney(total)}</td>
                <td class="p-4 text-center">
                    <button class="text-gray-400 hover:text-red-500 p-1.5 rounded-lg hover:bg-red-50 transition-colors" onclick="removeFromCart('${item.id}')" title="Xóa">
                        <span class="iconify text-lg" data-icon="mdi:delete-outline"></span>
                    </button>
                </td>
            `;
            tbody.appendChild(tr);
        });

        calculateTotals();
    }

    // ================= KHÁCH HÀNG ================= //

    const searchCustomerInput = document.getElementById('search-customer');
    const customerResultsContainer = document.getElementById('customer-results');

    searchCustomerInput.addEventListener('input', function() {
        const keyword = this.value.trim();
        clearTimeout(searchCustomerTimeout);

        if (keyword.length < 2) {
            customerResultsContainer.classList.add('hidden');
            return;
        }

        searchCustomerTimeout = setTimeout(() => {
            fetch(`<?= APP_URL ?>/admin/khach-hang/api/search?keyword=${encodeURIComponent(keyword)}`)
                .then(res => res.json())
                .then(data => {
                    renderCustomerResults(data);
                })
                .catch(err => console.error(err));
        }, 300);
    });

    function renderCustomerResults(customers) {
        customerResultsContainer.innerHTML = '';
        if (customers.length === 0) {
            customerResultsContainer.innerHTML = '<div class="p-3 text-center text-gray-500 text-sm">Không tìm thấy khách hàng.</div>';
        } else {
            customers.forEach(c => {
                const item = document.createElement('div');
                item.className = 'p-3 hover:bg-blue-50 cursor-pointer border-b border-gray-50 transition-colors';
                item.onclick = () => selectCustomer(c);
                item.innerHTML = `
                    <div class="font-bold text-gray-900 text-sm">${c.ho_ten}</div>
                    <div class="text-xs text-gray-500 mt-0.5">${c.sdt} | ${c.ten_hang || 'Thành viên'}</div>
                `;
                customerResultsContainer.appendChild(item);
            });
        }
        customerResultsContainer.classList.remove('hidden');
    }

    function selectCustomer(c) {
        document.getElementById('id_khach_hang').value = c.id;
        document.getElementById('cus-name').textContent = c.ho_ten;
        document.getElementById('cus-phone').textContent = c.sdt;
        document.getElementById('cus-rank').textContent = c.ten_hang || 'Thành viên';
        document.getElementById('cus-points').textContent = formatMoney(c.diem_tich_luy || 0).replace('đ', '');
        
        // Auto fill address if empty
        const addressEl = document.getElementById('dia_chi_giao_hang');
        if (!addressEl.value.trim() && c.dia_chi) {
            addressEl.value = c.dia_chi;
        }

        const percent = parseFloat(c.phan_tram_giam) || 0;
        document.getElementById('phan_tram_giam_rank').value = percent;
        document.getElementById('discount-percent').textContent = percent;

        document.getElementById('customer-search-box').classList.add('hidden');
        document.getElementById('selected-customer').classList.remove('hidden');
        
        calculateTotals();
    }

    function removeCustomer() {
        document.getElementById('id_khach_hang').value = '';
        document.getElementById('phan_tram_giam_rank').value = 0;
        document.getElementById('discount-percent').textContent = 0;
        
        document.getElementById('selected-customer').classList.add('hidden');
        document.getElementById('customer-search-box').classList.remove('hidden');
        searchCustomerInput.value = '';
        
        calculateTotals();
    }

    // Modal Add Customer
    function openAddCustomerModal() {
        const modal = document.getElementById('addCustomerModal');
        const modalInner = modal.querySelector('div');
        modal.classList.remove('hidden');
        // Trigger reflow
        void modal.offsetWidth;
        modal.classList.remove('opacity-0');
        modalInner.classList.remove('scale-95');
    }

    function closeAddCustomerModal() {
        const modal = document.getElementById('addCustomerModal');
        const modalInner = modal.querySelector('div');
        modal.classList.add('opacity-0');
        modalInner.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.getElementById('fastAddCustomerForm').reset();
        }, 300);
    }

    function submitFastAddCustomer() {
        const form = document.getElementById('fastAddCustomerForm');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const data = {
            ho_ten: document.getElementById('fast_ho_ten').value,
            sdt: document.getElementById('fast_sdt').value
        };

        fetch('<?= APP_URL ?>/admin/khach-hang/api/them-nhanh', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                showToast(res.message);
                closeAddCustomerModal();
                selectCustomer(res.data); // Auto select new customer
            } else {
                showToast(res.message, 'error');
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Đã xảy ra lỗi', 'error');
        });
    }

    // ================= THANH TOÁN & SUBMIT ================= //

    function updatePaymentUI(radio) {
        document.querySelectorAll('.payment-method-label').forEach(el => {
            el.classList.remove('border-emerald-500', 'bg-emerald-50');
            el.classList.add('border-gray-200', 'bg-white');
        });
        const parent = radio.closest('label');
        parent.classList.remove('border-gray-200', 'bg-white');
        parent.classList.add('border-emerald-500', 'bg-emerald-50');
    }

    function applyVoucher() {
        const ma = document.getElementById('ma_voucher_input').value.trim();
        const msgEl = document.getElementById('voucher-msg');
        
        if (!ma) {
            msgEl.textContent = 'Vui lòng nhập mã giảm giá!';
            msgEl.className = 'text-xs mt-1 text-red-500 block';
            document.getElementById('applied_voucher_id').value = '';
            document.getElementById('applied_voucher_code').value = '';
            document.getElementById('applied_voucher_discount').value = 0;
            calculateTotals();
            return;
        }

        let subtotal = 0;
        cart.forEach(item => { subtotal += item.price * item.quantity; });

        fetch('<?= APP_URL ?>/admin/ma-giam-gia/api/check', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ ma_voucher: ma, tong_tien: subtotal })
        })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                document.getElementById('applied_voucher_id').value = res.id_voucher;
                document.getElementById('applied_voucher_code').value = res.ma_voucher;
                document.getElementById('applied_voucher_discount').value = res.giam_gia;
                msgEl.textContent = res.message + (res.giam_gia > 0 ? ' (-' + formatMoney(res.giam_gia) + ')' : '');
                msgEl.className = 'text-xs mt-1 text-emerald-600 font-medium block';

                // Freeship: tự động set phí ship = 0
                if (res.is_freeship) {
                    document.getElementById('phi_van_chuyen').value = 0;
                    document.getElementById('summary-shipping').textContent = '0đ (Freeship)';
                }
            } else {
                document.getElementById('applied_voucher_id').value = '';
                document.getElementById('applied_voucher_code').value = '';
                document.getElementById('applied_voucher_discount').value = 0;
                msgEl.textContent = res.message;
                msgEl.className = 'text-xs mt-1 text-red-500 block';
            }
            calculateTotals();
        })
        .catch(err => {
            console.error(err);
            msgEl.textContent = 'Lỗi hệ thống khi kiểm tra mã.';
            msgEl.className = 'text-xs mt-1 text-red-500 block';
        });
    }

    function calculateTotals() {
        let subtotal = 0;
        cart.forEach(item => {
            subtotal += item.price * item.quantity;
        });

        document.getElementById('summary-subtotal').textContent = formatMoney(subtotal);

        // Giảm giá theo hạng
        const discountPercent = parseFloat(document.getElementById('phan_tram_giam_rank').value) || 0;
        let rankDiscount = 0;
        if (discountPercent > 0) {
            rankDiscount = subtotal * (discountPercent / 100);
        }

        // Giảm giá từ voucher
        const voucherDiscount = parseFloat(document.getElementById('applied_voucher_discount').value) || 0;
        
        const totalDiscount = rankDiscount + voucherDiscount;
        document.getElementById('summary-discount').textContent = '-' + formatMoney(totalDiscount);

        const shipping = parseInt(document.getElementById('phi_van_chuyen').value) || 0;
        
        let total = subtotal - totalDiscount + shipping;
        if (total < 0) total = 0;

        document.getElementById('summary-total').textContent = formatMoney(total);
    }

    // Xử lý khi chọn phương thức vận chuyển
    function onShippingChange() {
        const select = document.getElementById('phuong_thuc_van_chuyen');
        const selectedOption = select.options[select.selectedIndex];
        const fee = parseInt(selectedOption.getAttribute('data-fee')) || 0;
        
        document.getElementById('phi_van_chuyen').value = fee;
        document.getElementById('summary-shipping').textContent = fee === 0 ? '0đ' : formatMoney(fee);
        calculateTotals();
    }

    function submitOrder() {
        if (cart.length === 0) {
            showToast('Giỏ hàng trống!', 'error');
            return;
        }

        const id_kh = document.getElementById('id_khach_hang').value;
        if (!id_kh) {
            showToast('Vui lòng chọn khách hàng!', 'error');
            return;
        }

        const btn = document.getElementById('btn-submit-order');
        btn.disabled = true;
        btn.innerHTML = '<span class="iconify animate-spin text-xl" data-icon="mdi:loading"></span> Đang xử lý...';

        const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const discountPercent = parseFloat(document.getElementById('phan_tram_giam_rank').value) || 0;
        const rankDiscount = discountPercent > 0 ? subtotal * (discountPercent / 100) : 0;
        const voucherDiscount = parseFloat(document.getElementById('applied_voucher_discount').value) || 0;
        const totalDiscount = rankDiscount + voucherDiscount;
        
        const shipping = getNumberFromInput(document.getElementById('phi_van_chuyen').value);
        const total = Math.max(0, subtotal - totalDiscount + shipping);
        const isPaid = document.getElementById('da_thu_tien').checked;
        const pt = document.querySelector('input[name="pt_thanh_toan"]:checked').value;

        const payload = {
            id_khach_hang: id_kh,
            dia_chi_giao_hang: document.getElementById('dia_chi_giao_hang').value,
            ghi_chu: document.getElementById('ghi_chu').value,
            phuong_thuc_thanh_toan: pt,
            tong_tien_hang: subtotal,
            tong_tien: total,
            phi_van_chuyen: shipping,
            giam_gia: totalDiscount,
            id_voucher: document.getElementById('applied_voucher_id').value || null,
            trang_thai_thanh_toan: isPaid ? 1 : 0,
            hoan_thanh_ngay: isPaid, // Flag for model to set status = 3
            products: cart.map(i => ({ id: i.id, quantity: i.quantity, price: i.price }))
        };

        fetch('<?= APP_URL ?>/admin/don-hang/luu', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                showToast(res.message);
                setTimeout(() => {
                    window.location.href = `<?= APP_URL ?>/admin/don-hang/chi-tiet/${res.id_don_hang}`;
                }, 1000);
            } else {
                showToast(res.message, 'error');
                btn.disabled = false;
                btn.innerHTML = '<span class="iconify text-xl" data-icon="mdi:check-circle-outline"></span> Tạo Đơn Hàng';
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Lỗi hệ thống', 'error');
            btn.disabled = false;
            btn.innerHTML = '<span class="iconify text-xl" data-icon="mdi:check-circle-outline"></span> Tạo Đơn Hàng';
        });
    }

</script>
