<script>
    // Styling states based on Target selection
    function handleTargetChange(radio) {
        // Reset styles for all labels
        document.querySelectorAll('.target-label').forEach(label => {
            label.classList.remove('border-[#6B0D18]', 'bg-red-50/20');
            label.classList.add('border-gray-200');
        });
        
        // Add active style to selected
        const parent = radio.closest('.target-label');
        parent.classList.remove('border-gray-200');
        parent.classList.add('border-[#6B0D18]', 'bg-red-50/20');

        // Show/Hide panels
        const val = radio.value;
        document.getElementById('target-group-panel').classList.toggle('hidden', val !== 'group');
        document.getElementById('target-specific-panel').classList.toggle('hidden', val !== 'specific');
    }

    // Initialize radio styles on load
    document.addEventListener('DOMContentLoaded', () => {
        const checkedTarget = document.querySelector('input[name="target"]:checked');
        if(checkedTarget) handleTargetChange(checkedTarget);
    });

    // Schedule panel logic
    function handleScheduleChange(radio) {
        document.getElementById('schedule-panel').classList.toggle('hidden', radio.value === 'now');
        const submitBtn = document.getElementById('btn-submit');
        if(radio.value === 'now') {
            submitBtn.innerHTML = '<span class="iconify" data-icon="mdi:send-outline"></span> Gửi thông báo';
        } else {
            submitBtn.innerHTML = '<span class="iconify" data-icon="mdi:calendar-clock-outline"></span> Lên lịch gửi';
        }
    }

    // Textarea var insertion
    function insertVar(val) {
        const textarea = document.getElementById('noti-content');
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const text = textarea.value;
        textarea.value = text.substring(0, start) + val + text.substring(end);
        textarea.focus();
        textarea.selectionEnd = start + val.length;
        updatePreview();
        countChars(textarea);
    }

    // Char counter
    function countChars(textarea) {
        document.getElementById('char-count').textContent = textarea.value.length;
        if(textarea.value.length > 500) {
            document.getElementById('char-count').classList.add('text-red-500');
        } else {
            document.getElementById('char-count').classList.remove('text-red-500');
        }
    }

    // Update Live Preview
    function updatePreview() {
        const title = document.getElementById('noti-title').value || 'Tiêu đề thông báo';
        const content = document.getElementById('noti-content').value || 'Nội dung thông báo sẽ hiển thị ở đây. Bạn có thể sử dụng các biến cá nhân hóa để làm thông báo thân thiện hơn.';
        const type = document.getElementById('noti-type').value;
        const isHighPriority = document.querySelector('input[name="priority"]:checked').value === 'high';
        
        // Map types to icons/colors
        const typeConfig = {
            'tin_nhan': { icon: 'mdi:message-text-outline', bg: 'bg-blue-50', text: 'text-blue-600' },
            'voucher': { icon: 'mdi:ticket-percent-outline', bg: 'bg-yellow-50', text: 'text-yellow-600' },
            'don_hang': { icon: 'mdi:shopping-outline', bg: 'bg-teal-50', text: 'text-teal-600' },
            'tai_khoan': { icon: 'mdi:account-star-outline', bg: 'bg-purple-50', text: 'text-purple-600' },
            'he_thong': { icon: 'mdi:shield-alert-outline', bg: 'bg-gray-100', text: 'text-gray-600' }
        };
        
        const config = typeConfig[type];

        // Update Text
        document.getElementById('preview-title').textContent = title;
        // Simple replace variables for preview
        let previewHtml = content.replace(/\n/g, '<br>')
                                .replace(/{ten_khach_hang}/g, '<strong>Nguyễn Văn A</strong>')
                                .replace(/{ma_voucher}/g, '<strong>GOLD5</strong>')
                                .replace(/{ma_don_hang}/g, '<strong>#DH123</strong>')
                                .replace(/{hang_thanh_vien}/g, '<strong>Gold</strong>');
        document.getElementById('preview-content').innerHTML = previewHtml;

        // Update Icon
        const iconWrapper = document.getElementById('preview-icon-wrapper');
        iconWrapper.className = `w-10 h-10 rounded-full flex items-center justify-center shrink-0 mt-0.5 ${config.bg} ${config.text}`;
        document.getElementById('preview-icon').setAttribute('data-icon', config.icon);

        // Priority Logic
        document.getElementById('preview-priority-bar').classList.toggle('hidden', !isHighPriority);
        document.getElementById('priority-warning').classList.toggle('hidden', !isHighPriority);
        
        const titleEl = document.getElementById('preview-title');
        if (isHighPriority) {
            titleEl.classList.remove('text-gray-900');
            titleEl.classList.add('text-[#6B0D18]');
        } else {
            titleEl.classList.add('text-gray-900');
            titleEl.classList.remove('text-[#6B0D18]');
        }
    }

    // Modal Confirmation
    const confirmModal = document.getElementById('confirmModal');
    
    function confirmSend() {
        // Reset checkbox
        document.getElementById('check-confirm').checked = false;
        document.getElementById('btn-final-send').disabled = true;

        confirmModal.classList.remove('hidden');
        setTimeout(() => {
            confirmModal.classList.remove('opacity-0');
            confirmModal.firstElementChild.classList.remove('scale-95');
        }, 10);
    }
    
    function closeConfirmModal() {
        confirmModal.classList.add('opacity-0');
        confirmModal.firstElementChild.classList.add('scale-95');
        setTimeout(() => {
            confirmModal.classList.add('hidden');
        }, 300);
    }
</script>
