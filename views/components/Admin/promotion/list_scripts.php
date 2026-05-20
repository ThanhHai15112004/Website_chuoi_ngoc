<script>
    // Tab switching with visual filtering
    function switchPromoTab(btn) {
        document.querySelectorAll('#promo-tabs .tab-btn').forEach(tab => {
            tab.classList.remove('border-[#6B0D18]', 'text-[#6B0D18]');
            tab.classList.add('border-transparent', 'text-gray-500');
        });
        btn.classList.remove('border-transparent', 'text-gray-500');
        btn.classList.add('border-[#6B0D18]', 'text-[#6B0D18]');
        
        const tabName = btn.textContent.split('(')[0].trim().toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        let count = 0;
        
        rows.forEach(row => {
            const statusEl = row.querySelector('.status-badge');
            const typeEl = row.querySelector('td:nth-child(3) span');
            if (!statusEl) return;
            
            const statusText = statusEl.textContent.trim().toLowerCase();
            const typeText = typeEl ? typeEl.textContent.trim().toLowerCase() : '';
            
            if (tabName === 'tất cả' || statusText.includes(tabName) || (tabName === 'flash sale' && typeText.includes('flash sale'))) {
                row.style.display = '';
                count++;
            } else {
                row.style.display = 'none';
            }
        });
        
        const pagText = document.querySelector('.p-4.border-t .text-gray-500');
        if(pagText) pagText.innerHTML = `Hiển thị <span class="font-medium text-gray-800">${count>0?1:0}</span> - <span class="font-medium text-gray-800">${count}</span> trong <span class="font-medium text-gray-800">${count}</span> chương trình`;
    }

    // Dropdown management
    function togglePromoDropdown(btn) {
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

    // Pause Action
    let rowToPause = null;
    function pausePromo(code, btn) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        const row = btn.closest('tr');
        executePause(row, code);
    }
    
    function executePause(row, code) {
        const badge = row.querySelector('.status-badge');
        if(badge) {
            badge.className = "inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-gray-100 text-gray-600 border border-gray-200 status-badge uppercase tracking-wider";
            badge.textContent = "Đã tắt";
        }
        const btnPause = row.querySelector('.btn-pause');
        if(btnPause) btnPause.classList.add('hidden');
        
        showPromoToast("Đã tắt chương trình " + code);
    }

    // Duplicate Action
    function duplicatePromo(code, btn) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        const row = btn.closest('tr');
        showPromoToast("Đang nhân bản...");
        setTimeout(() => {
            const newRow = row.cloneNode(true);
            const codeEl = newRow.querySelector('.font-mono');
            if(codeEl) codeEl.textContent = code + '_COPY';
            
            const badge = newRow.querySelector('.status-badge');
            if(badge) {
                badge.className = "inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-gray-100 text-gray-600 border border-gray-200 status-badge uppercase tracking-wider";
                badge.textContent = "Bản nháp";
            }
            
            row.parentNode.insertBefore(newRow, row);
            newRow.classList.add('bg-amber-50/50');
            setTimeout(() => newRow.classList.remove('bg-amber-50/50'), 2000);
            showPromoToast("Đã tạo bản sao " + code + "_COPY");
        }, 500);
    }

    // Delete Modal
    const delModal = document.getElementById('deletePromoModal');
    let rowToDelete = null;
    function confirmDeletePromo(code, btn, uses) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        document.getElementById('del-promo-code').textContent = code;
        rowToDelete = btn.closest('tr');
        
        const warning = document.getElementById('promo-delete-warning');
        const btnPause = document.getElementById('btn-pause-instead');
        if(uses > 0) {
            warning.classList.remove('hidden');
            btnPause.classList.remove('hidden');
        } else {
            warning.classList.add('hidden');
            btnPause.classList.add('hidden');
        }
        
        delModal.classList.remove('hidden');
        setTimeout(() => {
            delModal.classList.remove('opacity-0');
            delModal.children[0].classList.remove('scale-95');
        }, 10);
    }
    
    function closeDeletePromoModal() {
        delModal.classList.add('opacity-0');
        delModal.children[0].classList.add('scale-95');
        setTimeout(() => delModal.classList.add('hidden'), 300);
    }
    
    function executeDeletePromo() {
        closeDeletePromoModal();
        if(rowToDelete) {
            rowToDelete.remove();
            rowToDelete = null;
        }
        showPromoToast("Đã xóa vĩnh viễn chương trình");
    }
    
    function pauseInstead() {
        closeDeletePromoModal();
        if(rowToDelete) {
            const code = document.getElementById('del-promo-code').textContent;
            executePause(rowToDelete, code);
            rowToDelete = null;
        }
    }

    // Details Drawer
    const drawer = document.getElementById('detailsPromoDrawer');
    function viewPromoDetails(code) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        document.getElementById('det-code').textContent = code;
        
        drawer.classList.remove('hidden');
        setTimeout(() => {
            drawer.children[0].classList.remove('opacity-0'); // overlay
            drawer.children[1].classList.remove('translate-x-full'); // panel
        }, 10);
    }
    
    function closePromoDetails() {
        drawer.children[0].classList.add('opacity-0');
        drawer.children[1].classList.add('translate-x-full');
        setTimeout(() => drawer.classList.add('hidden'), 300);
    }

    // Toast
    let promoToastTimeout;
    function showPromoToast(msg) {
        const toast = document.getElementById('promoToast');
        document.getElementById('promo-toast-msg').textContent = msg;
        toast.classList.remove('translate-y-20', 'opacity-0');
        clearTimeout(promoToastTimeout);
        promoToastTimeout = setTimeout(() => hidePromoToast(), 3000);
    }
    function hidePromoToast() {
        document.getElementById('promoToast').classList.add('translate-y-20', 'opacity-0');
    }
</script>
