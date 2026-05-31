<script>
    // JS cho Modals
    function openStatusModal() {
        const modal = document.getElementById('statusModal');
        const content = document.getElementById('statusModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
        }, 10);
    }

    function closeStatusModal() {
        const modal = document.getElementById('statusModal');
        const content = document.getElementById('statusModalContent');
        modal.classList.add('opacity-0');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function submitStatusUpdate() {
        showToast('Đã cập nhật trạng thái đơn hàng thành công!');
        closeStatusModal();
        setTimeout(() => window.location.reload(), 1000);
    }

    function openCancelModal() {
        const modal = document.getElementById('cancelModal');
        const content = document.getElementById('cancelModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
        }, 10);
    }

    function closeCancelModal() {
        const modal = document.getElementById('cancelModal');
        const content = document.getElementById('cancelModalContent');
        modal.classList.add('opacity-0');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function submitCancelOrder() {
        showToast('Đã hủy đơn hàng thành công!', 'error');
        closeCancelModal();
        setTimeout(() => window.location.reload(), 1000);
    }

    function openPrintModal() {
        const modal = document.getElementById('printModal');
        const content = document.getElementById('printModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
        }, 10);
    }

    function closePrintModal() {
        const modal = document.getElementById('printModal');
        const content = document.getElementById('printModalContent');
        modal.classList.add('opacity-0');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function capNhatTrangThai(id, trang_thai) {
        if(!confirm('Bạn có chắc chắn muốn cập nhật trạng thái đơn hàng này?')) return;
        
        fetch('<?= APP_URL ?>/admin/don-hang/api/cap-nhat-trang-thai/' + id, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ trang_thai: trang_thai })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                showToast(data.message || 'Cập nhật thành công!');
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showToast(data.error || data.message || 'Có lỗi xảy ra!', 'error');
            }
        })
        .catch(err => {
            showToast('Lỗi kết nối!', 'error');
        });
    }

    function huyDonHang(id) {
        if(!confirm('Bạn có chắc chắn muốn hủy đơn hàng này? Thao tác này không thể hoàn tác!')) return;
        
        fetch('<?= APP_URL ?>/admin/don-hang/api/cap-nhat-trang-thai/' + id, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ trang_thai: 4, ly_do: 'Hủy bởi Quản trị viên' })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                showToast(data.message || 'Đã hủy đơn hàng!', 'success');
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showToast(data.error || data.message || 'Có lỗi xảy ra!', 'error');
            }
        })
        .catch(err => {
            showToast('Lỗi kết nối!', 'error');
        });
    }
</script>
