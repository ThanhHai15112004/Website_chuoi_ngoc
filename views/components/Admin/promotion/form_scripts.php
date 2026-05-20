<script>
    function showFormToast() {
        const t = document.getElementById('formToast');
        t.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => t.classList.add('translate-y-20', 'opacity-0'), 3000);
        setTimeout(() => window.location.href = '<?= APP_URL ?>/admin/khuyen-mai', 1500);
    }

    function updatePreview() {
        // Logic to update live preview
        const discountInput = document.getElementById('input-discount').value;
        const typeFlash = document.querySelector('input[name="promo_type"][value="flash"]').checked;
        
        // Update math
        if(discountInput && discountInput <= 100) {
            const salePrice = 850000 * (1 - (discountInput / 100));
            const formattedSale = salePrice.toLocaleString('vi-VN') + 'đ';
            document.getElementById('calc-result').textContent = formattedSale;
            document.getElementById('prev-price-sale').textContent = formattedSale;
            document.getElementById('prev-discount-val').textContent = '-' + discountInput + '%';
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
