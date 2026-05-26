<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text);
        // Có thể thay bằng custom Toast sau
    }

    function toggleActionMenu(btn) {
        // Đóng các menu khác
        document.querySelectorAll('.action-menu-dropdown').forEach(m => {
            if (m !== btn.nextElementSibling) m.classList.add('hidden');
        });
        
        const menu = btn.nextElementSibling;
        
        if (menu.classList.contains('hidden')) {
            menu.classList.add('action-menu-dropdown');
            menu.classList.remove('hidden');
            
            const rect = btn.getBoundingClientRect();
            const menuHeight = menu.offsetHeight;
            const spaceBelow = window.innerHeight - rect.bottom;
            
            menu.style.position = 'fixed';
            menu.style.right = (window.innerWidth - rect.right) + 'px';
            menu.style.left = 'auto';
            menu.style.zIndex = '9999';
            
            // Nếu không đủ chỗ trống phía dưới, mở menu ngược lên trên
            if (spaceBelow < menuHeight + 10) {
                menu.style.top = (rect.top - menuHeight - 5) + 'px';
                menu.style.bottom = 'auto';
            } else {
                menu.style.top = (rect.bottom + 5) + 'px';
                menu.style.bottom = 'auto';
            }
        } else {
            menu.classList.add('hidden');
        }
    }

    // Đóng menu khi click ra ngoài
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.action-menu-dropdown') && !e.target.closest('button[onclick^="toggleActionMenu"]')) {
            document.querySelectorAll('.action-menu-dropdown').forEach(m => m.classList.add('hidden'));
        }
    });

    // Đóng menu khi scroll
    window.addEventListener('scroll', function() {
        document.querySelectorAll('.action-menu-dropdown:not(.hidden)').forEach(m => m.classList.add('hidden'));
    }, true);

    function toggleBulkAction(checkbox) {
        const bar = document.getElementById('bulkActionBar');
        // Fake logic hiện bar
        if(checkbox.checked) bar.classList.remove('hidden');
    }

    // Modal Triggers
    function openLockModal() { document.getElementById('lockModal').classList.remove('hidden'); }
    function openNotifyModal() { document.getElementById('notifyModal').classList.remove('hidden'); }
    function openVoucherModal() { document.getElementById('voucherModal').classList.remove('hidden'); }
    function openRankModal() { document.getElementById('rankModal').classList.remove('hidden'); }
    function openDeleteModal() { document.getElementById('deleteModal').classList.remove('hidden'); }
</script>
