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

        if (!ma_voucher || !ten_chuong_trinh || !ngay_bat_dau || !ngay_ket_thuc) {
            alert('Vui lòng điền đầy đủ các trường bắt buộc!');
            return;
        }

        const payload = {
            ma_voucher, ten_chuong_trinh, mo_ta, loai_giam, gia_tri, giam_toi_da,
            don_toi_thieu, pham_vi_san_pham, is_combine, ngay_bat_dau, ngay_ket_thuc,
            is_unlimited_usage, so_luong, doi_tuong, hang_thanh_vien, trang_thai
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

    document.addEventListener('DOMContentLoaded', updatePreview);
</script>
