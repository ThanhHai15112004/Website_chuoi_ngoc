<script>
    // Dropdown management
    function toggleStoneDropdown(btn) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if(menu !== btn.nextElementSibling) menu.classList.add('hidden');
        });
        btn.nextElementSibling.classList.toggle('hidden');
    }
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.menu-dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        }
    });

    // Toggle Action
    let currentRow = null;
    function toggleStoneStatus(code, btn, action) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        const row = btn.closest('tr');
        executeToggle(row, action);
    }
    
    function executeToggle(row, action) {
        const badge = row.querySelector('.status-badge');
        const btnToggle = row.querySelector('.btn-toggle');
        
        if (action === 'hide') {
            if(badge) {
                badge.className = "inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-gray-100 text-gray-500 border border-gray-200 status-badge uppercase tracking-wider";
                badge.textContent = "Đang ẩn";
            }
            if(btnToggle) {
                btnToggle.innerHTML = '<span class="iconify" data-icon="mdi:eye-outline"></span> Hiện loại đá';
                btnToggle.className = 'btn-toggle flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50';
                btnToggle.setAttribute('onclick', btnToggle.getAttribute('onclick').replace("'hide'", "'show'"));
            }
            showStoneToast("Đã ẩn loại đá này khỏi website.");
        } else {
            if(badge) {
                badge.className = "inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 status-badge uppercase tracking-wider";
                badge.textContent = "Đang hiển thị";
            }
            if(btnToggle) {
                btnToggle.innerHTML = '<span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn loại đá';
                btnToggle.className = 'btn-toggle flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50';
                btnToggle.setAttribute('onclick', btnToggle.getAttribute('onclick').replace("'show'", "'hide'"));
            }
            showStoneToast("Đã hiển thị loại đá này trên website.");
        }
    }

    // Delete Modal
    const delModal = document.getElementById('deleteStoneModal');
    function confirmDeleteStone(code, name, btn, uses) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        document.getElementById('del-stone-name').textContent = name;
        currentRow = btn.closest('tr');
        
        const warning = document.getElementById('stone-delete-warning');
        const btnHide = document.getElementById('btn-hide-instead');
        const btnConfirm = document.getElementById('btn-confirm-delete');
        
        if(uses > 0) {
            document.getElementById('del-stone-count').textContent = uses;
            warning.classList.remove('hidden');
            btnHide.classList.remove('hidden');
            // Disable delete if there are products
            btnConfirm.classList.replace('bg-red-600', 'bg-red-300');
            btnConfirm.classList.replace('hover:bg-red-700', 'hover:bg-red-300');
            btnConfirm.classList.add('cursor-not-allowed');
            btnConfirm.disabled = true;
        } else {
            warning.classList.add('hidden');
            btnHide.classList.add('hidden');
            // Enable delete
            btnConfirm.classList.replace('bg-red-300', 'bg-red-600');
            btnConfirm.classList.replace('hover:bg-red-300', 'hover:bg-red-700');
            btnConfirm.classList.remove('cursor-not-allowed');
            btnConfirm.disabled = false;
        }
        
        delModal.classList.remove('hidden');
        setTimeout(() => {
            delModal.classList.remove('opacity-0');
            delModal.children[0].classList.remove('scale-95');
        }, 10);
    }
    
    function closeDeleteStoneModal() {
        delModal.classList.add('opacity-0');
        delModal.children[0].classList.add('scale-95');
        setTimeout(() => delModal.classList.add('hidden'), 300);
    }
    
    function executeDeleteStone() {
        closeDeleteStoneModal();
        if(currentRow) {
            currentRow.remove();
            currentRow = null;
        }
        showStoneToast("Đã xóa vĩnh viễn loại đá / ngọc.");
    }
    
    function hideInstead() {
        closeDeleteStoneModal();
        if(currentRow) {
            executeToggle(currentRow, 'hide');
            currentRow = null;
        }
    }

    // Details Drawer
    const drawer = document.getElementById('detailsStoneDrawer');
    function viewStoneDetails(code) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        
        drawer.classList.remove('hidden');
        setTimeout(() => {
            drawer.children[0].classList.remove('opacity-0'); 
            drawer.children[1].classList.remove('translate-x-full'); 
        }, 10);
    }
    
    function closeStoneDetails() {
        drawer.children[0].classList.add('opacity-0');
        drawer.children[1].classList.add('translate-x-full');
        setTimeout(() => drawer.classList.add('hidden'), 300);
    }

    // Toast
    let stoneToastTimeout;
    function showStoneToast(msg) {
        const toast = document.getElementById('stoneToast');
        document.getElementById('stone-toast-msg').textContent = msg;
        toast.classList.remove('translate-y-20', 'opacity-0');
        clearTimeout(stoneToastTimeout);
        stoneToastTimeout = setTimeout(() => hideStoneToast(), 3000);
    }
    function hideStoneToast() {
        document.getElementById('stoneToast').classList.add('translate-y-20', 'opacity-0');
    }
</script>
