<script>
    function showFormToast(msg = 'Đã cập nhật thông tin Mệnh Mộc.') {
        const t = document.getElementById('formToast');
        document.getElementById('toastMsg').innerText = msg;
        t.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => t.classList.add('translate-y-20', 'opacity-0'), 3000);
        if(msg.includes('cập nhật')) {
            setTimeout(() => window.location.href = '<?= APP_URL ?>/admin/menh-phong-thuy', 1500);
        }
    }
</script>
