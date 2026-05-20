<?php
/**
 * Common Toast/Alert Component
 * 
 * Usually placed once in a layout and controlled via Javascript,
 * or rendered on server-side if a flash message exists.
 * 
 * Props:
 * - $id: string (default 'toast-container')
 */
$id = $id ?? 'toast-container';
?>
<div id="<?= $id ?>" class="fixed bottom-4 right-4 z-50 flex flex-col gap-2 pointer-events-none">
    <!-- Toasts will be injected here by JS -->
</div>

<!-- Simple Toast JS Helper -->
<script>
    function showToast(message, type = 'success', duration = 3000) {
        const container = document.getElementById('<?= $id ?>');
        if (!container) return;
        
        const toast = document.createElement('div');
        toast.className = `transform transition-all duration-300 translate-y-full opacity-0 flex items-center gap-3 px-4 py-3 rounded-lg shadow-lg pointer-events-auto bg-white border-l-4 min-w-[250px]`;
        
        let icon = '';
        let colorClass = '';
        
        if (type === 'success') {
            icon = 'mdi:check-circle';
            colorClass = 'text-green-500 border-green-500';
        } else if (type === 'error') {
            icon = 'mdi:alert-circle';
            colorClass = 'text-red-500 border-red-500';
        } else if (type === 'warning') {
            icon = 'mdi:alert';
            colorClass = 'text-yellow-500 border-yellow-500';
        } else {
            icon = 'mdi:information';
            colorClass = 'text-blue-500 border-blue-500';
        }
        
        toast.classList.add(colorClass.split(' ')[1]);
        
        toast.innerHTML = `
            <span class="iconify text-2xl ${colorClass.split(' ')[0]}" data-icon="${icon}"></span>
            <span class="text-sm font-medium text-gray-800">${message}</span>
            <button type="button" onclick="this.parentElement.remove()" class="ml-auto text-gray-400 hover:text-gray-600 focus:outline-none">
                <span class="iconify" data-icon="mdi:close"></span>
            </button>
        `;
        
        container.appendChild(toast);
        
        // Animate in
        setTimeout(() => {
            toast.classList.remove('translate-y-full', 'opacity-0');
        }, 10);
        
        // Animate out
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-x-full');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, duration);
    }
</script>
