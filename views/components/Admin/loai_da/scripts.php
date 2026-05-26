<script>
    function setColor(hex) {
        document.getElementById('stoneColorPicker').value = hex;
        document.getElementById('hexInput').value = hex;
    }

    function showStoneFormToast() {
        const t = document.getElementById('stoneFormToast');
        t.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => t.classList.add('translate-y-20', 'opacity-0'), 3000);
        setTimeout(() => window.location.href = '<?= APP_URL ?>/admin/loai-da', 1500);
    }
</script>
