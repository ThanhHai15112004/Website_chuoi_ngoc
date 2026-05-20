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
        
        if (type === 'percent') {
            divPercent.classList.remove('hidden');
            divFixed.classList.add('hidden');
        } else if (type === 'fixed') {
            divPercent.classList.add('hidden');
            divFixed.classList.remove('hidden');
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

    // Save button mock
    function saveVoucher(btn) {
        const originalContent = btn.innerHTML;
        btn.innerHTML = `<span class="iconify animate-spin text-xl" data-icon="mdi:loading"></span> Đang xử lý...`;
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = originalContent;
            btn.disabled = false;
            showToast("Đã lưu voucher thành công!");
            setTimeout(() => {
                window.location.href = '<?= APP_URL ?>/admin/voucher';
            }, 1500);
        }, 1000);
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

    // Mock population for Edit Mode
    <?php if ($is_edit): ?>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('input_ma').value = 'GIAM50K';
        document.getElementById('input_ten').value = 'Giảm 50K cho đơn từ 500K';
        document.getElementById('input_dieu_kien').value = 500000;
        document.querySelector('input[name="loai_giam"][value="fixed"]').checked = true;
        toggleDiscountType();
        document.getElementById('input_gia_tri_fixed').value = 50000;
        updatePreview();
    });
    <?php else: ?>
    document.addEventListener('DOMContentLoaded', updatePreview);
    <?php endif; ?>
</script>
