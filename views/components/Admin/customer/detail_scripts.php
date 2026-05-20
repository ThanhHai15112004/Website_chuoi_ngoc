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
    function showToast(message) {
        const container = document.getElementById('toastContainer');
        const toast = document.createElement('div');
        toast.className = 'bg-gray-800 text-white px-4 py-3 rounded-xl shadow-xl text-sm font-medium flex items-center gap-3 animate-[fadeInPage_0.3s_ease-out]';
        toast.innerHTML = `
            <span class="iconify text-emerald-400 text-lg" data-icon="mdi:check-circle"></span>
            ${message}
            <button class="ml-2 text-gray-400 hover:text-white transition-colors" onclick="this.parentElement.remove()">
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
</script>
