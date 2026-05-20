<script>
    // Tab switching UI
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const parent = e.target.parentElement;
            parent.querySelectorAll('.tab-btn').forEach(b => {
                b.className = 'tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors';
            });
            e.target.className = 'tab-btn px-4 py-2 bg-[#6B0D18] text-white rounded-t-lg font-medium text-sm whitespace-nowrap transition-colors';
        });
    });

    // Row Menu Toggle
    function toggleRowMenu(btn) {
        // Close others
        document.querySelectorAll('.row-menu').forEach(menu => {
            if(menu !== btn.nextElementSibling) menu.classList.add('hidden');
        });
        btn.nextElementSibling.classList.toggle('hidden');
    }
    
    // Close menus on click outside
    document.addEventListener('click', (e) => {
        if(!e.target.closest('td')) {
            document.querySelectorAll('.row-menu').forEach(menu => menu.classList.add('hidden'));
        }
    });

    // Drawer Logic
    const overlay = document.getElementById('modalOverlay');
    const drawer = document.getElementById('notificationDrawer');

    function openNotificationDrawer(id) {
        overlay.classList.remove('hidden');
        // small delay for transition
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
            drawer.classList.remove('translate-x-full');
        }, 10);
    }

    function closeNotificationDrawer() {
        drawer.classList.add('translate-x-full');
        overlay.classList.add('opacity-0');
        setTimeout(() => {
            overlay.classList.add('hidden');
        }, 300);
    }

    function closeAllDrawers() {
        closeNotificationDrawer();
        closeResendModal();
    }

    // Modal Logic
    const resendModal = document.getElementById('resendModal');
    
    function openResendModal() {
        resendModal.classList.remove('hidden');
        setTimeout(() => {
            resendModal.classList.remove('opacity-0');
            resendModal.firstElementChild.classList.remove('scale-95');
        }, 10);
    }
    
    function closeResendModal() {
        resendModal.classList.add('opacity-0');
        resendModal.firstElementChild.classList.add('scale-95');
        setTimeout(() => {
            resendModal.classList.add('hidden');
        }, 300);
    }

    // Toast Logic
    function showToast(msg) {
        const toast = document.getElementById('toast');
        document.getElementById('toast-msg').textContent = msg;
        toast.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => {
            toast.classList.add('translate-y-20', 'opacity-0');
        }, 3000);
    }
</script>
