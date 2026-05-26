<script>
    // Action menu toggler
    function toggleActionMenu(button) {
        document.querySelectorAll('.action-menu-dropdown').forEach(m => {
            if (m !== button.nextElementSibling) m.classList.add('hidden');
        });
        
        const menu = button.nextElementSibling;
        
        if (menu.classList.contains('hidden')) {
            menu.classList.add('action-menu-dropdown');
            menu.classList.remove('hidden');
            
            const rect = button.getBoundingClientRect();
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

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.action-menu-dropdown') && !e.target.closest('button[onclick^="toggleActionMenu"]')) {
            document.querySelectorAll('.action-menu-dropdown').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });

    window.addEventListener('scroll', function() {
        document.querySelectorAll('.action-menu-dropdown:not(.hidden)').forEach(m => m.classList.add('hidden'));
    }, true);

    // Drawer Logic
    function openDestinyDrawer() {
        const overlay = document.getElementById('destinyDrawerOverlay');
        const drawer = document.getElementById('destinyDrawer');
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        drawer.classList.remove('translate-x-full');
    }

    function closeDestinyDrawer() {
        const overlay = document.getElementById('destinyDrawerOverlay');
        const drawer = document.getElementById('destinyDrawer');
        overlay.classList.add('opacity-0');
        drawer.classList.add('translate-x-full');
        setTimeout(() => overlay.classList.add('hidden'), 300);
    }

    // Toggle Modal Logic
    function openToggleModal(name, count, action) {
        document.querySelectorAll('.absolute.right-0').forEach(menu => menu.classList.add('hidden')); // Close menus
        
        const isHide = action === 'hide';
        document.getElementById('toggleModalTitle').innerText = isHide ? `Ẩn ${name} khỏi trang người dùng?` : `Hiển thị ${name} trên trang người dùng?`;
        document.getElementById('toggleModalIcon').setAttribute('data-icon', isHide ? 'mdi:eye-off-outline' : 'mdi:eye-outline');
        document.getElementById('toggleModalIcon').parentElement.className = isHide ? 'w-12 h-12 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center mb-4 mx-auto' : 'w-12 h-12 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center mb-4 mx-auto';
        document.getElementById('toggleModalActionText').innerText = isHide ? 'ẩn' : 'hiển thị';
        
        const warning = document.getElementById('toggleModalWarning');
        if (count > 0) {
            warning.style.display = 'block';
            document.getElementById('toggleModalCount').innerText = count;
        } else {
            warning.style.display = 'none';
        }
        
        document.getElementById('toggleStatusModal').classList.remove('hidden');
    }

    function submitToggle() {
        document.getElementById('toggleStatusModal').classList.add('hidden');
        alert("Thao tác thành công! (Dữ liệu mẫu)");
    }
</script>
