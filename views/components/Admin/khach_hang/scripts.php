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

    function toggleAllCheckboxes(selectAll) {
        const checkboxes = document.querySelectorAll('.user-checkbox');
        checkboxes.forEach(cb => cb.checked = selectAll.checked);
        toggleBulkAction();
    }

    function toggleBulkAction() {
        const bar = document.getElementById('bulkActionBar');
        const countSpan = document.getElementById('bulkSelectedCount');
        const checkedCount = document.querySelectorAll('.user-checkbox:checked').length;
        
        if (checkedCount > 0) {
            countSpan.textContent = checkedCount;
            bar.classList.remove('hidden');
        } else {
            bar.classList.add('hidden');
        }
    }

    let currentUserId = null;

    // Modal Triggers
    function openLockModal(id) { currentUserId = id; document.getElementById('lockModal').classList.remove('hidden'); }
    function openNotifyModal(id) { currentUserId = id; document.getElementById('notifyModal').classList.remove('hidden'); }
    function openVoucherModal(id) { currentUserId = id; document.getElementById('voucherModal').classList.remove('hidden'); }
    function openRankModal(id) { currentUserId = id; document.getElementById('rankModal').classList.remove('hidden'); }
    function openDeleteModal(id) { currentUserId = id; document.getElementById('deleteModal').classList.remove('hidden'); }

    // API Helpers
    const APP_URL = '<?= APP_URL ?>';

    function showLoading() {
        let loader = document.getElementById('globalLoading');
        if(!loader) {
            document.body.insertAdjacentHTML('beforeend', `<div id="globalLoading" class="fixed inset-0 bg-black/20 backdrop-blur-sm z-[9999] hidden flex items-center justify-center">
                <div class="bg-white p-4 rounded-xl shadow-xl flex items-center gap-3">
                    <div class="w-6 h-6 border-4 border-[#6B0D18] border-t-transparent rounded-full animate-spin"></div>
                    <span class="font-bold text-gray-700">Đang xử lý...</span>
                </div>
            </div>`);
            loader = document.getElementById('globalLoading');
        }
        loader.classList.remove('hidden');
    }

    function hideLoading() {
        const loader = document.getElementById('globalLoading');
        if(loader) loader.classList.add('hidden');
    }

    function showToast(message, type = 'success') {
        let container = document.getElementById('toastContainer');
        if (!container) {
            container = document.createElement('div');
            container.id = 'toastContainer';
            container.className = 'fixed bottom-4 right-4 z-[9999] flex flex-col gap-2';
            document.body.appendChild(container);
        }
        const toast = document.createElement('div');
        const bgColor = type === 'success' ? 'bg-gray-800' : 'bg-red-600';
        const icon = type === 'success' ? 'mdi:check-circle' : 'mdi:alert-circle';
        const iconColor = type === 'success' ? 'text-emerald-400' : 'text-white';
        toast.className = `${bgColor} text-white px-4 py-3 rounded-xl shadow-xl text-sm font-medium flex items-center gap-3 animate-[fadeInPage_0.3s_ease-out]`;
        toast.innerHTML = `
            <span class="iconify ${iconColor} text-lg" data-icon="${icon}"></span>
            ${message}
            <button class="ml-2 text-white/50 hover:text-white transition-colors" onclick="this.parentElement.remove()">
                <span class="iconify text-lg" data-icon="mdi:close"></span>
            </button>
        `;
        container.appendChild(toast);
        setTimeout(() => {
            if(toast.parentElement) {
                toast.classList.add('opacity-0', 'translate-y-2', 'transition-all', 'duration-300');
                setTimeout(() => toast.remove(), 300);
            }
        }, 3000);
    }
    
    async function callApi(url, data) {
        showLoading();
        try {
            const res = await fetch(APP_URL + url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            hideLoading();
            return await res.json();
        } catch (error) {
            hideLoading();
            console.error(error);
            return { success: false, message: 'Lỗi kết nối' };
        }
    }

    function getSelectedIds() {
        return Array.from(document.querySelectorAll('.user-checkbox:checked')).map(cb => cb.value);
    }

    // Bulk Submit
    async function submitBulkNotify() {
        const ids = getSelectedIds();
        if(ids.length === 0) return;
        const res = await callApi('/admin/khach-hang/bulk-notify', { ids, title: 'Thông báo chung', message: 'Bạn có một thông báo mới' });
        if(res.success) { showToast('Đã gửi thông báo!'); setTimeout(() => window.location.reload(), 1000); }
        else { showToast('Lỗi: ' + res.message, 'error'); }
    }
    
    async function submitBulkLock() {
        const ids = getSelectedIds();
        if(ids.length === 0) return;
        const res = await callApi('/admin/khach-hang/bulk-lock', { ids, trang_thai: 0 }); // 0 = locked
        if(res.success) { showToast('Đã khóa tài khoản!'); setTimeout(() => window.location.reload(), 1000); }
        else { showToast('Lỗi: ' + res.message, 'error'); }
    }
    
    async function submitBulkDelete() {
        const ids = getSelectedIds();
        if(ids.length === 0) return;
        if(confirm('Chắc chắn xóa?')) {
            const res = await callApi('/admin/khach-hang/bulk-delete', { ids });
            if(res.success) { showToast('Đã xóa!'); setTimeout(() => window.location.reload(), 1000); }
            else { showToast('Lỗi: ' + res.message, 'error'); }
        }
    }
    
    async function submitBulkAssignVoucher() {
        const ids = getSelectedIds();
        if(ids.length === 0) return;
        // Giả sử lấy mã voucher từ đâu đó, hiện tại fix cứng
        const res = await callApi('/admin/khach-hang/bulk-voucher', { ids, voucher_code: 'FREESHIP' });
        if(res.success) { showToast('Đã gán voucher!'); setTimeout(() => window.location.reload(), 1000); }
        else { showToast('Lỗi: ' + res.message, 'error'); }
    }

    // Single Submit
    async function submitSingleNotify() {
        if(!currentUserId) return;
        const res = await callApi('/admin/khach-hang/send-notification', { id: currentUserId, title: 'Thông báo', message: 'Nội dung thông báo' });
        if(res.success) { showToast('Đã gửi'); setTimeout(() => window.location.reload(), 1000); }
        else { showToast('Lỗi: ' + res.message, 'error'); }
    }
    async function submitSingleRank() {
        if(!currentUserId) return;
        // fix logic lấy id rank từ select nếu cần, hiện tại giả lập gửi id
        const res = await callApi('/admin/khach-hang/update-rank', { id: currentUserId, id_hang: document.querySelector('#rankModal select').value });
        if(res.success) { showToast('Đã cập nhật hạng'); setTimeout(() => window.location.reload(), 1000); }
        else { showToast('Lỗi: ' + res.message, 'error'); }
    }
    async function submitSingleLock(id = null, type = 'lock') {
        const targetId = id || currentUserId;
        if(!targetId) return;
        const status = type === 'lock' ? 0 : 1;
        const res = await callApi('/admin/khach-hang/bulk-lock', { ids: [targetId], trang_thai: status });
        if(res.success) { showToast(type === 'lock' ? 'Đã khóa' : 'Đã mở khóa'); setTimeout(() => window.location.reload(), 1000); }
        else { showToast('Lỗi: ' + res.message, 'error'); }
    }
    async function submitSingleDelete() {
        if(!currentUserId) return;
        const res = await callApi('/admin/khach-hang/bulk-delete', { ids: [currentUserId] });
        if(res.success) { showToast('Đã xóa'); setTimeout(() => window.location.reload(), 1000); }
        else { showToast('Lỗi: ' + res.message, 'error'); }
    }
    async function submitSingleAssignVoucher() {
        if(!currentUserId) return;
        const res = await callApi('/admin/khach-hang/bulk-voucher', { ids: [currentUserId], voucher_code: 'FREESHIP' });
        if(res.success) { showToast('Đã gán'); setTimeout(() => window.location.reload(), 1000); }
        else { showToast('Lỗi: ' + res.message, 'error'); }
    }
</script>
