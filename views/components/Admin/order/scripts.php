<script>
    // Copy to clipboard
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('Đã sao chép: ' + text, 'success');
        });
    }

    // Toast logic
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `flex items-center gap-3 px-4 py-3 bg-white rounded-xl shadow-lg border-l-4 transform transition-all duration-300 translate-y-10 opacity-0 min-w-[300px] z-[9999]`;
        
        if (type === 'success') {
            toast.classList.add('border-emerald-500');
            toast.innerHTML = `
                <div class="w-8 h-8 bg-emerald-50 rounded-full flex items-center justify-center shrink-0">
                    <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check"></span>
                </div>
                <p class="text-sm font-medium text-gray-800 flex-1">${message}</p>
                <button class="text-gray-400 hover:text-gray-600" onclick="this.parentElement.remove()">
                    <span class="iconify" data-icon="mdi:close"></span>
                </button>
            `;
        } else {
            toast.classList.add('border-red-500');
            toast.innerHTML = `
                <div class="w-8 h-8 bg-red-50 rounded-full flex items-center justify-center shrink-0">
                    <span class="iconify text-red-500 text-lg" data-icon="mdi:alert-circle"></span>
                </div>
                <p class="text-sm font-medium text-gray-800 flex-1">${message}</p>
                <button class="text-gray-400 hover:text-gray-600" onclick="this.parentElement.remove()">
                    <span class="iconify" data-icon="mdi:close"></span>
                </button>
            `;
        }

        document.getElementById('toastContainer').appendChild(toast);
        setTimeout(() => {
            toast.classList.remove('translate-y-10', 'opacity-0');
        }, 10);

        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-x-10');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Modal logic chung
    function openModal(id) {
        const modal = document.getElementById(id);
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            if(modal.children[1] && modal.children[1].classList.contains('scale-95')) {
                modal.children[1].classList.remove('scale-95');
            }
        }, 10);
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        modal.classList.add('opacity-0');
        if(modal.children[1] && !modal.children[1].classList.contains('scale-95')) {
            modal.children[1].classList.add('scale-95');
        }
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Các hàm mở Modal Cụ thể
    function openConfirmModal(code, customer) {
        document.getElementById('cmOrderCode').textContent = code;
        document.getElementById('cmCustomer').textContent = customer;
        openModal('confirmModal');
        closeActionMenus();
    }

    function openShippingModal(code) {
        document.getElementById('smOrderCode').textContent = code;
        openModal('shippingModal');
        closeActionMenus();
    }

    function openDeliveredModal(code) {
        document.getElementById('dmOrderCode').textContent = code;
        openModal('deliveredModal');
        closeActionMenus();
    }

    function openSuccessModal(code) {
        document.getElementById('smcOrderCode').textContent = code;
        openModal('successModal');
        closeActionMenus();
    }

    function openCancelModal(code) {
        document.getElementById('cmCancelOrderCode').textContent = code;
        openModal('cancelModal');
        closeActionMenus();
    }
    
    function openPrintModal(code = 'DH202600123') {
        document.getElementById('pmOrderCode').textContent = code;
        openModal('printModal');
        closeActionMenus();
    }

    function submitAction(modalId, successMsg) {
        closeModal(modalId);
        showToast(successMsg, 'success');
        if(modalId === 'confirmModal' || modalId === 'shippingModal') {
            closeQuickView(); // Close QuickView if open
        }
    }

    // Quick View Panel
    function openQuickView(code) {
        document.getElementById('qvOrderCode').textContent = code;
        document.getElementById('qvFullDetailLink').href = '/shopbanhangchuoingoc/admin/don-hang/chi-tiet/' + code;
        const panel = document.getElementById('quickViewPanel');
        const overlay = document.getElementById('qvOverlay');
        
        panel.classList.remove('hidden');
        overlay.classList.remove('hidden');
        
        setTimeout(() => {
            panel.classList.remove('translate-x-full');
            overlay.classList.remove('opacity-0');
        }, 10);
    }

    function closeQuickView() {
        const panel = document.getElementById('quickViewPanel');
        const overlay = document.getElementById('qvOverlay');
        
        panel.classList.add('translate-x-full');
        overlay.classList.add('opacity-0');
        
        setTimeout(() => {
            panel.classList.add('hidden');
            overlay.classList.add('hidden');
        }, 300);
    }

    // Dropdown Action Menu
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

    // Checkbox logic for Bulk Actions
    const selectAll = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');

    function updateBulkActions() {
        const count = document.querySelectorAll('.row-checkbox:checked').length;
        if(count > 0) {
            bulkActions.classList.remove('hidden');
            bulkActions.classList.add('flex');
            selectedCount.textContent = count;
        } else {
            bulkActions.classList.add('hidden');
            bulkActions.classList.remove('flex');
        }
    }

    selectAll.addEventListener('change', function() {
        rowCheckboxes.forEach(cb => cb.checked = this.checked);
        updateBulkActions();
    });

    rowCheckboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            const allChecked = Array.from(rowCheckboxes).every(c => c.checked);
            selectAll.checked = allChecked;
            updateBulkActions();
        });
    });

    // Tab logic
    function switchTab(clickedBtn, status) {
        // Reset all tabs
        const tabs = document.querySelectorAll('.tab-btn');
        tabs.forEach(tab => {
            tab.className = 'tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap flex items-center gap-2 transition-colors border-b-2 border-transparent hover:border-gray-300';
            const badge = tab.querySelector('span');
            if(badge) {
                badge.className = 'bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded text-[10px] font-mono';
            }
        });

        // Active clicked tab
        clickedBtn.className = 'tab-btn px-4 py-2 text-sm font-bold text-[#6B0D18] border-b-2 border-[#6B0D18] whitespace-nowrap flex items-center gap-2 transition-colors';
        const activeBadge = clickedBtn.querySelector('span');
        if(activeBadge) {
            if(status === 'Chờ xác nhận') activeBadge.className = 'bg-red-50 text-red-600 px-1.5 py-0.5 rounded text-[10px] font-mono font-bold';
            else if(status === 'Thành công') activeBadge.className = 'bg-emerald-50 text-emerald-600 px-1.5 py-0.5 rounded text-[10px] font-mono font-bold';
            else activeBadge.className = 'bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded text-[10px] font-mono font-bold';
        }

        // Filter rows
        const rows = document.querySelectorAll('tbody tr');
        let count = 0;
        rows.forEach(row => {
            const rowStatus = row.querySelector('td:nth-child(9) span').textContent.trim();
            if(status === 'Tất cả' || rowStatus === status) {
                row.style.display = '';
                count++;
            } else {
                row.style.display = 'none';
            }
        });
        
        // Cập nhật Pagination count text
        const paginationText = document.querySelector('.bg-white.rounded-b-2xl .flex.items-center.gap-3 span:last-child');
        if(paginationText) {
            paginationText.textContent = `trong tổng số ${count} đơn`;
        }
    }
</script>
