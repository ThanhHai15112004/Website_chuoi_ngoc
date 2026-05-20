<script>
    function approveReview(btn) {
        btn.innerText = "Đã duyệt";
        btn.classList.remove('bg-[#6B0D18]', 'hover:bg-[#8A111F]', 'text-white');
        btn.classList.add('bg-emerald-50', 'text-emerald-600', 'border', 'border-emerald-200', 'cursor-default');
        btn.disabled = true;
        showReviewToast('Đã duyệt nội dung thành công!');
    }

    function openHideModal() {
        document.getElementById('hideModal').classList.remove('hidden');
    }

    function showReviewToast(msg) {
        const t = document.getElementById('reviewToast');
        document.getElementById('toastMsg').innerText = msg;
        t.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => t.classList.add('translate-y-20', 'opacity-0'), 3000);
    }

    // Drawer Logic
    function openReviewDrawer() {
        const overlay = document.getElementById('reviewDrawerOverlay');
        const drawer = document.getElementById('reviewDrawer');
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        drawer.classList.remove('translate-x-full');
    }

    function closeReviewDrawer() {
        const overlay = document.getElementById('reviewDrawerOverlay');
        const drawer = document.getElementById('reviewDrawer');
        overlay.classList.add('opacity-0');
        drawer.classList.add('translate-x-full');
        setTimeout(() => overlay.classList.add('hidden'), 300);
    }
</script>
