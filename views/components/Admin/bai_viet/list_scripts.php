<script>
    function toggleRowMenu(btn) {
        document.querySelectorAll('.row-menu').forEach(menu => {
            if(menu !== btn.nextElementSibling) menu.classList.add('hidden');
        });
        btn.nextElementSibling.classList.toggle('hidden');
    }
    
    document.addEventListener('click', (e) => {
        if(!e.target.closest('td')) {
            document.querySelectorAll('.row-menu').forEach(menu => menu.classList.add('hidden'));
        }
    });

    const overlay = document.getElementById('modalOverlay');
    const postDrawer = document.getElementById('postDrawer');
    const hideModal = document.getElementById('hideModal');
    const deleteModal = document.getElementById('deleteModal');

    function openPostDrawer() {
        overlay.classList.remove('hidden');
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
            postDrawer.classList.remove('translate-x-full');
        }, 10);
    }
    
    function closePostDrawer() {
        postDrawer.classList.add('translate-x-full');
        closeOverlay();
    }

    function openHideModal() {
        overlay.classList.remove('hidden');
        hideModal.classList.remove('hidden');
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
            hideModal.classList.remove('opacity-0');
            hideModal.firstElementChild.classList.remove('scale-95');
        }, 10);
    }

    function closeHideModal() {
        hideModal.classList.add('opacity-0');
        hideModal.firstElementChild.classList.add('scale-95');
        setTimeout(() => hideModal.classList.add('hidden'), 300);
        closeOverlayIfNoModals();
    }

    function openDeleteModal() {
        overlay.classList.remove('hidden');
        deleteModal.classList.remove('hidden');
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
            deleteModal.classList.remove('opacity-0');
            deleteModal.firstElementChild.classList.remove('scale-95');
        }, 10);
    }

    function closeDeleteModal() {
        deleteModal.classList.add('opacity-0');
        deleteModal.firstElementChild.classList.add('scale-95');
        setTimeout(() => deleteModal.classList.add('hidden'), 300);
        closeOverlayIfNoModals();
    }

    function closeOverlay() {
        overlay.classList.add('opacity-0');
        setTimeout(() => overlay.classList.add('hidden'), 300);
    }

    function closeOverlayIfNoModals() {
        if (postDrawer.classList.contains('translate-x-full')) {
            closeOverlay();
        }
    }

    function closeAll() {
        closePostDrawer();
        closeHideModal();
        closeDeleteModal();
    }



    let currentPostId = null;

    function duplicatePost(id) {
        if (!confirm('Bạn có chắc muốn nhân bản bài viết này?')) return;
        
        fetch('<?= APP_URL ?>/admin/post/api/nhan-ban', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({id: id})
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showToast(data.message, 'error');
            }
        });
    }

    function toggleStatus(id, status) {
        if (!confirm(status == 2 ? 'Bạn có chắc muốn ẩn bài viết này?' : 'Bạn muốn hiện bài viết này?')) return;
        
        fetch('<?= APP_URL ?>/admin/post/api/trang-thai', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({id: id, trang_thai: status})
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => window.location.reload(), 500);
            } else {
                showToast(data.message, 'error');
            }
        });
    }

    function deletePost(id) {
        if (!confirm('Bạn có chắc muốn xóa vĩnh viễn bài viết này? Thao tác không thể hoàn tác!')) return;
        
        fetch('<?= APP_URL ?>/admin/post/api/xoa', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({id: id})
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => window.location.reload(), 500);
            } else {
                showToast(data.message, 'error');
            }
        });
    }
</script>
