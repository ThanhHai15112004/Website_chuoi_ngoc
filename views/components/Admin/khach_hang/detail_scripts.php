<script>
    // Tab switching logic
    function switchTab(tabId) {
        // Reset all buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-[#6B0D18]', 'text-white');
            btn.classList.add('text-gray-600', 'hover:bg-gray-50', 'hover:text-[#6B0D18]');
        });
        
        // Hide all contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Active selected button
        const activeBtn = document.getElementById('btn-' + tabId);
        if(activeBtn) {
            activeBtn.classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-[#6B0D18]');
            activeBtn.classList.add('bg-[#6B0D18]', 'text-white');
        }
        
        // Show selected content
        const activeContent = document.getElementById('tab-' + tabId);
        if(activeContent) {
            activeContent.classList.remove('hidden');
        }
        
        // Update URL hash/param without reload (optional UX enhancement)
        const newUrl = window.location.pathname + '?tab=' + tabId;
        window.history.pushState({path:newUrl}, '', newUrl);
    }

    // Initialize tab from URL param
    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const tab = urlParams.get('tab');
        if(tab && document.getElementById('btn-' + tab)) {
            switchTab(tab);
        }
    });

    // Modal Helpers
    function openNotifyModal() { document.getElementById('notifyModal').classList.remove('hidden'); }
    function openVoucherModal() { document.getElementById('voucherModal').classList.remove('hidden'); }
    function openRankModal() { document.getElementById('rankModal').classList.remove('hidden'); }
    function openLockModal() { document.getElementById('lockModal').classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

    // Toast Notification
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

    const APP_URL = '<?= APP_URL ?>';

    // Logic Submit Gửi Thông Báo
    async function submitNotify(userId) {
        const title = document.getElementById('notifyTitle').value;
        const message = document.getElementById('notifyContent').value;
        if(!title || !message) {
            showToast('Vui lòng nhập đầy đủ tiêu đề và nội dung', 'error');
            return;
        }

        showLoading();
        try {
            const res = await fetch(APP_URL + '/admin/khach-hang/send-notification', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: userId, title, message })
            });
            hideLoading();
            const data = await res.json();
            if(data.success) {
                showToast('Đã gửi thông báo cho khách hàng!');
                closeModal('notifyModal');
            } else {
                showToast(data.message || 'Lỗi hệ thống', 'error');
            }
        } catch (error) {
            hideLoading();
            console.error(error);
            showToast('Lỗi kết nối', 'error');
        }
    }

    // JS cho Radio UI
    function highlightRankRadio(radioInput) {
        const allLabels = document.querySelectorAll('.radio-rank-label');
        allLabels.forEach(lbl => {
            lbl.className = 'border border-gray-200 rounded-lg p-2 text-center cursor-pointer hover:bg-gray-50 flex flex-col items-center gap-1 radio-rank-label';
        });
        const selectedLabel = radioInput.parentElement;
        selectedLabel.className = 'border-2 border-[#6B0D18] bg-red-50/30 rounded-lg p-2 text-center cursor-pointer flex flex-col items-center gap-1 radio-rank-label';
    }

    // Logic Cập Nhật Hạng
    async function submitUpdateRank(userId) {
        const selectedRadio = document.querySelector('input[name="newRank"]:checked');
        if(!selectedRadio) {
            showToast('Vui lòng chọn hạng mới', 'error');
            return;
        }
        
        showLoading();
        try {
            const res = await fetch(APP_URL + '/admin/khach-hang/update-rank', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: userId, id_hang: selectedRadio.value })
            });
            hideLoading();
            const data = await res.json();
            if(data.success) {
                showToast('Đã cập nhật hạng thành công!');
                closeModal('rankModal');
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showToast(data.message || 'Lỗi hệ thống', 'error');
            }
        } catch (error) {
            hideLoading();
            console.error(error);
            showToast('Lỗi kết nối', 'error');
        }
    }

    // Logic Khóa Tài Khoản
    async function submitLock(userId) {
        if(!userId) return;
        showLoading();
        try {
            const res = await fetch(APP_URL + '/admin/khach-hang/bulk-lock', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ ids: [userId], trang_thai: 0 })
            });
            hideLoading();
            const data = await res.json();
            if(data.success) {
                showToast('Đã khóa tài khoản thành công!');
                closeModal('lockModal');
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showToast(data.message || 'Lỗi hệ thống', 'error');
            }
        } catch (error) {
            hideLoading();
            console.error(error);
            showToast('Lỗi kết nối', 'error');
        }
    }

    // Logic Gán Voucher
    async function submitAssignVoucher(userId) {
        if(!userId) return;
        showLoading();
        try {
            // Fix cứng voucher FREESHIP cho test
            const res = await fetch(APP_URL + '/admin/khach-hang/bulk-voucher', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ ids: [userId], voucher_code: 'FREESHIP' })
            });
            hideLoading();
            const data = await res.json();
            if(data.success) {
                showToast('Đã gán voucher thành công!');
                closeModal('voucherModal');
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showToast(data.message || 'Lỗi hệ thống', 'error');
            }
        } catch (error) {
            hideLoading();
            console.error(error);
            showToast('Lỗi kết nối', 'error');
        }
    }
</script>
