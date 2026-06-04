/**
 * Cart Helper — Quản lý giỏ hàng toàn cục
 * Include file này trong main.php layout
 */
const CartHelper = {
    baseUrl: typeof APP_URL !== 'undefined' ? APP_URL : '',

    /**
     * Thêm sản phẩm vào giỏ (có kiểm tra biến thể)
     */
    async addToCart(idSanPham, idBienThe = null, soLuong = 1) {
        // Nếu không có biến thể → kiểm tra SP có biến thể không
        if (!idBienThe) {
            try {
                const variantRes = await this._fetchVariants(idSanPham);
                if (variantRes.success && variantRes.data.bien_the && variantRes.data.bien_the.length > 0) {
                    // SP có biến thể → hiện modal chọn
                    this._showVariantModal(variantRes.data);
                    return;
                }
                // SP không có biến thể → thêm luôn
            } catch (e) {
                // fallback: thêm luôn
            }
        }

        await this._doAdd(idSanPham, idBienThe, soLuong);
    },

    /**
     * Thêm trực tiếp (bỏ qua check biến thể) - dùng cho trang chi tiết
     */
    async addDirect(idSanPham, idBienThe, soLuong = 1) {
        await this._doAdd(idSanPham, idBienThe, soLuong);
    },

    /**
     * Thêm và chuyển tới giỏ hàng (Mua ngay)
     */
    async buyNow(idSanPham, idBienThe, soLuong = 1) {
        const result = await this._doAdd(idSanPham, idBienThe, soLuong);
        if (result && result.success) {
            window.location.href = this.baseUrl + '/gio-hang';
        }
    },

    /**
     * Cập nhật số lượng
     */
    async updateQty(cartId, soLuong) {
        try {
            const fd = new FormData();
            fd.append('cart_id', cartId);
            fd.append('so_luong', soLuong);
            const res = await fetch(this.baseUrl + '/gio-hang/cap-nhat', { method: 'POST', body: fd });
            const data = await res.json();
            if (data.success) {
                this.updateBadge();
            } else {
                this._toast(data.message, 'error');
            }
            return data;
        } catch (e) {
            this._toast('Đã có lỗi xảy ra.', 'error');
            return null;
        }
    },

    /**
     * Xóa item khỏi giỏ
     */
    async removeItem(cartId) {
        try {
            const fd = new FormData();
            fd.append('cart_id', cartId);
            const res = await fetch(this.baseUrl + '/gio-hang/xoa', { method: 'POST', body: fd });
            const data = await res.json();
            if (data.success) {
                this._toast(data.message, 'success');
                this.updateBadge();
            } else {
                this._toast(data.message, 'error');
            }
            return data;
        } catch (e) {
            this._toast('Đã có lỗi xảy ra.', 'error');
            return null;
        }
    },

    /**
     * Cập nhật badge giỏ hàng trên header
     */
    async updateBadge() {
        try {
            const res = await fetch(this.baseUrl + '/gio-hang/count');
            const data = await res.json();
            const badges = document.querySelectorAll('.cart-badge');
            badges.forEach(badge => {
                if (data.count > 0) {
                    badge.textContent = data.count > 99 ? '99+' : data.count;
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            });
        } catch (e) { /* silent */ }
    },

    // =====================================================
    // PRIVATE METHODS
    // =====================================================

    async _doAdd(idSanPham, idBienThe, soLuong) {
        try {
            const fd = new FormData();
            fd.append('id_san_pham', idSanPham);
            if (idBienThe) fd.append('id_bien_the', idBienThe);
            fd.append('so_luong', soLuong);

            const res = await fetch(this.baseUrl + '/gio-hang/them', { method: 'POST', body: fd });
            const data = await res.json();

            if (data.success) {
                this._toast(data.message, 'success');
                this.updateBadge();
            } else {
                this._toast(data.message, 'error');
            }
            return data;
        } catch (e) {
            this._toast('Đã có lỗi xảy ra, vui lòng thử lại.', 'error');
            return null;
        }
    },

    async _fetchVariants(idSanPham) {
        const fd = new FormData();
        fd.append('id_san_pham', idSanPham);
        const res = await fetch(this.baseUrl + '/gio-hang/variants', { method: 'POST', body: fd });
        return await res.json();
    },

    /**
     * Hiển thị modal chọn biến thể
     */
    _showVariantModal(product) {
        // Remove existing modal
        const old = document.getElementById('variant-modal');
        if (old) old.remove();

        const gia = product.gia_khuyen_mai || product.gia_ban;
        let selectedVariantId = product.bien_the[0]?.id || null;
        let selectedAddPrice = parseFloat(product.bien_the[0]?.gia_cong_them || 0);
        let selectedStock = parseInt(product.bien_the[0]?.so_luong_ton || 0);

        const modal = document.createElement('div');
        modal.id = 'variant-modal';
        modal.className = 'fixed inset-0 z-[9999] flex items-end sm:items-center justify-center';
        modal.innerHTML = `
            <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="document.getElementById('variant-modal').remove()"></div>
            <div class="relative bg-white w-full max-w-md mx-auto rounded-t-2xl sm:rounded-2xl shadow-2xl overflow-hidden animate-slide-up z-10 max-h-[90vh] flex flex-col">
                <!-- Header -->
                <div class="p-5 pb-4 flex gap-4 border-b border-gray-100">
                    <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0 border border-gray-100">
                        <img src="${product.hinh_anh}" alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-semibold text-gray-900 line-clamp-2 text-sm">${this._escape(product.ten)}</h3>
                        <p class="text-lg font-bold text-[#8B0000] mt-1" id="vm-price">${this._formatPrice(gia + selectedAddPrice)}đ</p>
                        <p class="text-xs text-gray-500 mt-0.5" id="vm-stock">Kho: ${selectedStock}</p>
                    </div>
                    <button class="self-start p-1 text-gray-400 hover:text-gray-600" onclick="document.getElementById('variant-modal').remove()">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Variants -->
                <div class="p-5 overflow-y-auto flex-1">
                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Chọn phân loại</h4>
                    <div class="flex flex-wrap gap-2" id="vm-variants">
                        ${product.bien_the.map((bt, i) => `
                            <button type="button" 
                                class="vm-btn px-4 py-2.5 text-sm rounded-lg border-2 transition-all duration-200 ${i === 0 ? 'border-[#8B0000] bg-[#8B0000]/5 text-[#8B0000] font-semibold' : 'border-gray-200 text-gray-700 hover:border-[#8B0000] hover:text-[#8B0000]'} ${parseInt(bt.so_luong_ton) <= 0 ? 'opacity-40 cursor-not-allowed line-through' : ''}"
                                data-id="${bt.id}" 
                                data-price="${bt.gia_cong_them}" 
                                data-stock="${bt.so_luong_ton}"
                                ${parseInt(bt.so_luong_ton) <= 0 ? 'disabled' : ''}>
                                ${this._escape(bt.thuoc_tinh)}
                            </button>
                        `).join('')}
                    </div>

                    <!-- Quantity -->
                    <h4 class="text-sm font-semibold text-gray-700 mt-5 mb-3">Số lượng</h4>
                    <div class="flex items-center gap-3">
                        <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden h-10">
                            <button type="button" class="w-10 h-full text-gray-600 hover:bg-gray-100 text-lg font-medium" onclick="CartHelper._vmQty(-1)">−</button>
                            <input type="number" id="vm-qty" value="1" min="1" max="${selectedStock}" class="w-14 h-full text-center border-x border-gray-300 font-medium text-sm focus:outline-none" style="-moz-appearance:textfield">
                            <button type="button" class="w-10 h-full text-gray-600 hover:bg-gray-100 text-lg font-medium" onclick="CartHelper._vmQty(1)">+</button>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="p-5 pt-4 border-t border-gray-100 flex gap-3">
                    <button type="button" id="vm-add-btn" 
                        class="flex-1 bg-[#8B0000] text-white font-semibold py-3 rounded-xl hover:bg-[#6B0000] transition-colors shadow-md flex items-center justify-center gap-2"
                        onclick="CartHelper._vmSubmit('${product.id}')">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        Thêm vào giỏ
                    </button>
                </div>
            </div>
        `;

        document.body.appendChild(modal);

        // Attach variant click handlers
        modal.querySelectorAll('.vm-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                modal.querySelectorAll('.vm-btn').forEach(b => {
                    b.classList.remove('border-[#8B0000]', 'bg-[#8B0000]/5', 'text-[#8B0000]', 'font-semibold');
                    b.classList.add('border-gray-200', 'text-gray-700');
                });
                btn.classList.remove('border-gray-200', 'text-gray-700');
                btn.classList.add('border-[#8B0000]', 'bg-[#8B0000]/5', 'text-[#8B0000]', 'font-semibold');

                selectedVariantId = btn.dataset.id;
                selectedAddPrice = parseFloat(btn.dataset.price);
                selectedStock = parseInt(btn.dataset.stock);

                document.getElementById('vm-price').textContent = this._formatPrice(gia + selectedAddPrice) + 'đ';
                document.getElementById('vm-stock').textContent = 'Kho: ' + selectedStock;
                document.getElementById('vm-qty').max = selectedStock;
                if (parseInt(document.getElementById('vm-qty').value) > selectedStock) {
                    document.getElementById('vm-qty').value = Math.max(1, selectedStock);
                }
            });
        });

        // Store selected variant ID on modal
        modal._getSelectedVariantId = () => selectedVariantId;
    },

    _vmQty(change) {
        const input = document.getElementById('vm-qty');
        if (!input) return;
        let val = parseInt(input.value) + change;
        val = Math.max(parseInt(input.min), Math.min(val, parseInt(input.max)));
        input.value = val;
    },

    async _vmSubmit(idSanPham) {
        const modal = document.getElementById('variant-modal');
        if (!modal) return;
        const selectedBtn = modal.querySelector('.vm-btn.border-\\[\\#8B0000\\]');
        const idBienThe = selectedBtn ? selectedBtn.dataset.id : null;
        const soLuong = parseInt(document.getElementById('vm-qty')?.value || 1);

        const btn = document.getElementById('vm-add-btn');
        if (btn) {
            btn.disabled = true;
            btn.innerHTML = '<svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25"/><path fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" class="opacity-75"/></svg> Đang thêm...';
        }

        await this._doAdd(idSanPham, idBienThe, soLuong);
        modal.remove();
    },

    _toast(message, type = 'success') {
        // Use SweetAlert2 Toast if available
        if (typeof Swal !== 'undefined') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true
            });
            Toast.fire({ icon: type, title: message });
        } else {
            // Fallback simple toast
            const toast = document.createElement('div');
            toast.className = `fixed top-4 right-4 z-[10000] px-5 py-3 rounded-xl shadow-lg text-white text-sm font-medium transition-all transform translate-x-full ${type === 'success' ? 'bg-green-600' : 'bg-red-600'}`;
            toast.textContent = message;
            document.body.appendChild(toast);
            requestAnimationFrame(() => {
                toast.classList.remove('translate-x-full');
            });
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, 2500);
        }
    },

    _formatPrice(price) {
        return new Intl.NumberFormat('vi-VN').format(Math.round(price));
    },

    _escape(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }
};

// =====================================================
// AUTO INIT: Bind tất cả nút có data-add-cart
// =====================================================
document.addEventListener('DOMContentLoaded', function() {
    // Update badge on page load
    CartHelper.updateBadge();

    // Bind all [data-add-cart] buttons
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('[data-add-cart]');
        if (btn && !btn.disabled) {
            e.preventDefault();
            const idSanPham = btn.getAttribute('data-add-cart');
            CartHelper.addToCart(idSanPham);
        }
    });
});

// CSS animation for modal slide-up
(function() {
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideUp {
            from { transform: translateY(100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .animate-slide-up { animation: slideUp 0.3s ease-out; }
    `;
    document.head.appendChild(style);
})();

// =====================================================
// VOUCHER MODAL & LOGIC
// =====================================================

function openVoucherModal() {
    const modal = document.getElementById('voucherModal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    setTimeout(() => {
        document.body.classList.add('modal-open');
        const content = document.getElementById('voucherModalContent');
        if (content) {
            content.classList.remove('translate-y-full');
            content.classList.add('translate-y-0');
        }
    }, 10);
    fetchVouchers();
}

function closeVoucherModal() {
    const modal = document.getElementById('voucherModal');
    if (!modal) return;
    document.body.classList.remove('modal-open');
    const content = document.getElementById('voucherModalContent');
    if (content) {
        content.classList.remove('translate-y-0');
        content.classList.add('translate-y-full');
    }
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300);
}

async function fetchVouchers() {
    const container = document.getElementById('voucherListContainer');
    if (!container) return;
    
    container.innerHTML = '<div class="flex justify-center py-10"><iconify-icon icon="mdi:loading" class="text-3xl text-[#8B0000] animate-spin"></iconify-icon></div>';

    try {
        const res = await fetch(CartHelper.baseUrl + '/gio-hang/vouchers');
        const data = await res.json();
        
        if (data.success) {
            renderVouchers(data.data);
        } else {
            container.innerHTML = '<p class="text-center text-red-500 text-sm py-4">Lỗi tải danh sách mã giảm giá.</p>';
        }
    } catch (e) {
        container.innerHTML = '<p class="text-center text-red-500 text-sm py-4">Có lỗi xảy ra.</p>';
    }
}

function renderVouchers(vouchers) {
    const container = document.getElementById('voucherListContainer');
    if (!container) return;

    if (!vouchers || vouchers.length === 0) {
        container.innerHTML = '<div class="text-center py-10"><p class="text-gray-500 text-sm">Chưa có mã giảm giá nào phù hợp.</p></div>';
        return;
    }

    let html = '';
    vouchers.forEach(vc => {
        const isEligible = vc.is_eligible;
        
        // Label format based on loai_giam
        let label = '';
        if (vc.loai_giam == 1) {
            label = 'Giảm ' + vc.gia_tri + '%';
        } else if (vc.loai_giam == 2) {
            label = 'Giảm ' + CartHelper._formatPrice(vc.gia_tri) + 'đ';
        } else if (vc.loai_giam == 3) {
            label = 'Freeship';
        } else if (vc.loai_giam == 4) {
            label = 'Quà tặng';
        }

        let conditionText = vc.don_toi_thieu > 0 ? 'Đơn từ ' + CartHelper._formatPrice(vc.don_toi_thieu) + 'đ' : 'Áp dụng mọi đơn hàng';

        html += `
        <div class="relative rounded-lg border flex overflow-hidden shadow-sm transition-all ${isEligible ? 'bg-white border-[#8B0000]/20 hover:border-[#8B0000]/50' : 'bg-gray-50 border-gray-200 opacity-60'}">
            <!-- Left Ticket Edge -->
            <div class="w-24 ${isEligible ? 'bg-red-50' : 'bg-gray-100'} flex flex-col items-center justify-center p-2 border-r border-dashed ${isEligible ? 'border-red-200' : 'border-gray-300'} relative shrink-0">
                <div class="w-4 h-4 bg-white rounded-full absolute -top-2 -right-2 border-b ${isEligible ? 'border-red-200' : 'border-gray-300'}"></div>
                <div class="w-4 h-4 bg-white rounded-full absolute -bottom-2 -right-2 border-t ${isEligible ? 'border-red-200' : 'border-gray-300'}"></div>
                <span class="text-[#8B0000] font-bold text-center leading-tight">
                    ${label}
                </span>
            </div>
            
            <!-- Content -->
            <div class="flex-1 p-3 flex flex-col justify-center">
                <div class="flex justify-between items-start mb-1">
                    <div>
                        <h4 class="font-bold text-gray-800 text-sm flex items-center gap-2">
                            ${vc.ma_voucher}
                        </h4>
                        <p class="text-xs text-gray-600 line-clamp-1">${vc.ten_chuong_trinh}</p>
                    </div>
                </div>
                <div class="text-[11px] text-gray-500 mt-1 flex items-center gap-1.5">
                    <span>${conditionText}</span>
                    <span>•</span>
                    <span>HSD: ${new Date(vc.ngay_ket_thuc).toLocaleDateString('vi-VN')}</span>
                </div>
                
                ${!isEligible ? `
                    <div class="mt-2 text-[11px] text-red-500 font-medium flex items-center gap-1">
                        <iconify-icon icon="mdi:information-outline"></iconify-icon> ${vc.reason}
                    </div>
                ` : ''}
            </div>

            <!-- Action -->
            <div class="w-16 shrink-0 flex items-center justify-center p-2 border-l border-gray-100">
                ${isEligible ? `
                    <button onclick="applyVoucher('${vc.ma_voucher}')" class="w-full text-xs font-medium bg-[#8B0000] text-white py-1.5 rounded hover:bg-red-800 transition-colors">
                        Dùng
                    </button>
                ` : `
                    <span class="text-xs text-gray-400 font-medium">Bỏ qua</span>
                `}
            </div>
        </div>
        `;
    });

    container.innerHTML = html;
}

async function applyVoucherCode() {
    const input = document.getElementById('voucher-code-input');
    if (!input || !input.value.trim()) {
        CartHelper._toast('Vui lòng nhập mã', 'error');
        return;
    }
    await applyVoucher(input.value.trim());
    input.value = '';
}

async function applyVoucher(code) {
    try {
        const fd = new FormData();
        fd.append('ma_voucher', code);
        const res = await fetch(CartHelper.baseUrl + '/gio-hang/ap-voucher', { method: 'POST', body: fd });
        const data = await res.json();
        
        if (data.success) {
            CartHelper._toast(data.message, 'success');
            closeVoucherModal();
            updateCartSummary(data);
        } else {
            CartHelper._toast(data.message, 'error');
        }
    } catch (e) {
        CartHelper._toast('Đã có lỗi xảy ra.', 'error');
    }
}

async function removeVoucher(idVoucher) {
    try {
        const fd = new FormData();
        fd.append('id_voucher', idVoucher);
        const res = await fetch(CartHelper.baseUrl + '/gio-hang/xoa-voucher', { method: 'POST', body: fd });
        const data = await res.json();
        
        if (data.success) {
            CartHelper._toast('Đã bỏ áp dụng mã', 'success');
            updateCartSummary(data);
        }
    } catch (e) {
        CartHelper._toast('Đã có lỗi xảy ra.', 'error');
    }
}

function updateCartSummary(data) {
    setTimeout(() => {
        window.location.reload();
    }, 500);
}
