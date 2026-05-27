<script>
    // --- Modals ---
    function openModal(id) {
        const modal = document.getElementById(id);
        const overlay = document.getElementById('modalOverlay');
        if (modal && overlay) {
            overlay.classList.remove('hidden');
            modal.classList.remove('hidden');
            // Timeout for transition
            setTimeout(() => {
                modal.classList.remove('opacity-0', 'scale-95');
                modal.classList.add('opacity-100', 'scale-100');
            }, 10);
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        const overlay = document.getElementById('modalOverlay');
        if (modal && overlay) {
            modal.classList.remove('opacity-100', 'scale-100');
            modal.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                // Chỉ ẩn overlay nếu không còn drawer nào mở
                if (document.querySelectorAll('.drawer-open').length === 0) {
                    overlay.classList.add('hidden');
                }
            }, 300);
        }
    }

    function closeAllModals() {
        // Đóng modals
        ['updateStockModal', 'nhapKhoModal'].forEach(id => {
            const el = document.getElementById(id);
            if (el && !el.classList.contains('hidden')) {
                closeModal(id);
            }
        });
        
        // Đóng drawers
        ['historyDrawer'].forEach(id => {
            const el = document.getElementById(id);
            if (el && el.classList.contains('translate-x-0')) {
                closeDrawer(id);
            }
        });
    }

    // --- Drawers ---
    function openDrawer(id) {
        const drawer = document.getElementById(id);
        const overlay = document.getElementById('modalOverlay');
        if (drawer && overlay) {
            overlay.classList.remove('hidden');
            drawer.classList.remove('translate-x-full');
            drawer.classList.add('translate-x-0', 'drawer-open');
        }
    }

    function closeDrawer(id) {
        const drawer = document.getElementById(id);
        const overlay = document.getElementById('modalOverlay');
        if (drawer && overlay) {
            drawer.classList.remove('translate-x-0', 'drawer-open');
            drawer.classList.add('translate-x-full');
            setTimeout(() => {
                // Chỉ ẩn overlay nếu không còn modal nào mở
                if (document.querySelectorAll('.opacity-100.scale-100').length === 0) {
                    overlay.classList.add('hidden');
                }
            }, 300);
        }
    }

    // --- Dropdowns ---
    function toggleDropdown(btn) {
        const menu = btn.nextElementSibling;
        const isHidden = menu.classList.contains('hidden');
        
        document.querySelectorAll('.dropdown-menu').forEach(el => {
            el.classList.add('hidden');
            el.style.position = '';
            el.style.top = '';
            el.style.left = '';
            el.style.right = '';
        });

        if (isHidden) {
            const rect = btn.getBoundingClientRect();
            menu.classList.remove('hidden');
            menu.style.position = 'fixed';
            menu.style.zIndex = '9999';
            const menuWidth = menu.offsetWidth || 192;
            const menuHeight = menu.offsetHeight || 200;
            let top = rect.bottom + 4;
            let left = rect.right - menuWidth;
            if (top + menuHeight > window.innerHeight) top = rect.top - menuHeight - 4;
            if (left < 8) left = 8;
            menu.style.top = top + 'px';
            menu.style.left = left + 'px';
            menu.style.right = 'auto';
        }
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.action-dropdown')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
                menu.style.position = '';
                menu.style.top = '';
                menu.style.left = '';
                menu.style.right = '';
            });
        }
    });

    document.addEventListener('scroll', function() {
        document.querySelectorAll('.dropdown-menu:not(.hidden)').forEach(el => {
            el.classList.add('hidden');
            el.style.position = '';
            el.style.top = '';
            el.style.left = '';
            el.style.right = '';
        });
    }, true);
</script>
