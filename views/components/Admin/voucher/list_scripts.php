<script>
    // Toggle 3-dots Menu
    function toggleDropdown(btn) {
        // Close all other dropdowns
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if(menu !== btn.nextElementSibling) menu.classList.add('hidden');
        });
        btn.nextElementSibling.classList.toggle('hidden');
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.menu-dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        }
    });

    // Copy Voucher Code
    function copyCode(code) {
        navigator.clipboard.writeText(code);
        const tooltip = document.getElementById('tooltip-' + code);
        if(tooltip) {
            tooltip.classList.remove('opacity-0');
            tooltip.classList.add('opacity-100');
            tooltip.style.top = '-2.5rem';
            setTimeout(() => {
                tooltip.classList.add('opacity-0');
                tooltip.classList.remove('opacity-100');
                tooltip.style.top = '-2rem';
            }, 1500);
        }
    }

    // Toggle Status (API call)
    async function toggleVoucherStatus(id, status) {
        try {
            const res = await fetch('<?= APP_URL ?>/admin/voucher/toggle_status', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id, status })
            });
            const data = await res.json();
            if(data.success) {
                showToast(data.message);
                setTimeout(() => window.location.reload(), 1000);
            } else {
                alert(data.message);
            }
        } catch (e) {
            alert('Lỗi kết nối!');
        }
    }

    // Switch Tabs
    function switchTab(btn) {
        // Remove active class from all tabs
        const tabs = document.querySelectorAll('.tab-btn');
        tabs.forEach(tab => {
            tab.classList.remove('border-[#6B0D18]', 'text-[#6B0D18]');
            tab.classList.add('border-transparent', 'text-gray-500');
        });
        
        // Add active class to clicked tab
        btn.classList.remove('border-transparent', 'text-gray-500');
        btn.classList.add('border-[#6B0D18]', 'text-[#6B0D18]');
        
        // Filtering logic
        const tabName = btn.textContent.split('(')[0].trim().toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        let count = 0;
        
        rows.forEach(row => {
            const statusEl = row.querySelector('td:nth-child(7) span.inline-flex');
            if (!statusEl) return;
            
            const statusText = statusEl.textContent.trim().toLowerCase();
            
            // "tất cả" shows all. Other tabs filter by text matching.
            if (tabName === 'tất cả' || statusText.includes(tabName) || (tabName === 'hết lượt' && statusText.includes('hết lượt dùng'))) {
                row.style.display = '';
                count++;
            } else {
                row.style.display = 'none';
            }
        });

        // Update pagination text for mockup
        const paginationText = document.querySelector('.p-4.border-t .text-gray-500');
        if (paginationText) {
            paginationText.innerHTML = `Hiển thị <span class="font-medium text-gray-800">${count > 0 ? 1 : 0}</span> - <span class="font-medium text-gray-800">${count}</span> trong <span class="font-medium text-gray-800">${count}</span> voucher`;
        }
    }

    // Mock generic actions
    function mockAction(msg) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        showToast(msg);
    }

    // Dropdown Management
    function toggleDropdown(btn) {
        // Close all other dropdowns
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if (menu !== btn.nextElementSibling) {
                menu.classList.add('hidden');
            }
        });
        // Toggle the clicked one
        btn.nextElementSibling.classList.toggle('hidden');
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.menu-dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });

    // Duplicate Voucher
    function duplicateVoucher(code, btn) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        const row = btn.closest('tr');
        
        showToast("Đang nhân bản voucher...");
        
        setTimeout(() => {
            const newRow = row.cloneNode(true);
            const newCode = code + "_COPY";
            
            // Update Code Text
            const codeSpan = newRow.querySelector('span.font-bold.tracking-wider');
            if (codeSpan) codeSpan.textContent = newCode;

            // Remove specific ids to avoid duplicates (like tooltips)
            const tooltip = newRow.querySelector('[id^="tooltip-"]');
            if (tooltip) tooltip.id = 'tooltip-' + newCode;
            
            // Rebind onClick for copyCode
            const copyDiv = newRow.querySelector('.group\\/code');
            if (copyDiv) copyDiv.setAttribute('onclick', `copyCode('${newCode}')`);

            // Insert new row after current row
            row.parentNode.insertBefore(newRow, row.nextSibling);
            
            // Highlight animation
            newRow.classList.add('bg-amber-50/50');
            setTimeout(() => newRow.classList.remove('bg-amber-50/50'), 2000);

            showToast("Đã nhân bản thành công mã " + newCode);
        }, 800);
    }

    // Delete Modal
    const delModal = document.getElementById('deleteModal');
    let rowToDelete = null;
    let voucherIdToDelete = null;

    function confirmDeleteVoucher(id, code, uses, btn) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        document.getElementById('del-voucher-code').textContent = code;
        rowToDelete = btn.closest('tr');
        voucherIdToDelete = id;
        
        const warning = document.getElementById('delete-warning');
        const btnDisable = document.getElementById('btn-disable-alt');
        
        if (uses > 0) {
            warning.classList.remove('hidden');
            btnDisable.classList.remove('hidden');
        } else {
            warning.classList.add('hidden');
            btnDisable.classList.add('hidden');
        }
        
        delModal.classList.remove('hidden');
        setTimeout(() => {
            delModal.classList.remove('opacity-0');
            delModal.children[0].classList.remove('scale-95');
        }, 10);
    }

    function closeDeleteModal() {
        delModal.classList.add('opacity-0');
        delModal.children[0].classList.add('scale-95');
        setTimeout(() => {
            delModal.classList.add('hidden');
        }, 300);
    }

    async function executeDelete() {
        if (!voucherIdToDelete) return;
        
        try {
            const res = await fetch('<?= APP_URL ?>/admin/voucher/xoa', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: voucherIdToDelete })
            });
            const data = await res.json();
            if(data.success) {
                showToast(data.message);
                closeDeleteModal();
                setTimeout(() => window.location.reload(), 1000);
            } else {
                alert(data.message);
                closeDeleteModal();
            }
        } catch (e) {
            alert('Lỗi kết nối!');
            closeDeleteModal();
        }
    }

    // Toast functionality
    let toastTimeout;
    function showToast(msg) {
        const toast = document.getElementById('toast');
        document.getElementById('toast-msg').textContent = msg;
        
        toast.classList.remove('translate-y-20', 'opacity-0');
        
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            hideToast();
        }, 3000);
    }

    function hideToast() {
        const toast = document.getElementById('toast');
        toast.classList.add('translate-y-20', 'opacity-0');
    }

    // Details Modal
    const detailsModal = document.getElementById('detailsModal');
    function openDetailsModal(code) {
        // Mock data loading based on code
        document.getElementById('detail-code').textContent = code;
        document.getElementById('detail-name').textContent = code === 'THANG3' ? 'Khuyến mãi tháng 3' : 'Chương trình ưu đãi';
        document.getElementById('detail-value').textContent = code.includes('50') ? 'Giảm 50%' : 'Giảm 50.000đ';
        document.getElementById('detail-used').textContent = Math.floor(Math.random() * 50);
        document.getElementById('detail-total').textContent = 100;
        
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));

        detailsModal.classList.remove('hidden');
        setTimeout(() => {
            detailsModal.classList.remove('opacity-0');
            detailsModal.children[0].classList.remove('scale-95');
        }, 10);
    }

    function closeDetailsModal() {
        detailsModal.classList.add('opacity-0');
        detailsModal.children[0].classList.add('scale-95');
        setTimeout(() => {
            detailsModal.classList.add('hidden');
        }, 300);
    }

    // History Modal
    const historyModal = document.getElementById('historyModal');
    function openHistoryModal(code) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        document.getElementById('history-code').textContent = code;
        
        historyModal.classList.remove('hidden');
        setTimeout(() => {
            historyModal.classList.remove('opacity-0');
            historyModal.children[0].classList.remove('scale-95');
        }, 10);
    }

    function closeHistoryModal() {
        historyModal.classList.add('opacity-0');
        historyModal.children[0].classList.add('scale-95');
        setTimeout(() => {
            historyModal.classList.add('hidden');
        }, 300);
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
        // Nothing here for now
    });
</script>
