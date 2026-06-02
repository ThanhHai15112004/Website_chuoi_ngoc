<script>
    // =====================================================
    // 1. Target (Đối tượng nhận) — Radio Label Styling
    // =====================================================
    function handleTargetChange(radio) {
        document.querySelectorAll('.target-label').forEach(label => {
            label.classList.remove('border-[#6B0D18]', 'bg-red-50/20');
            label.classList.add('border-gray-200');
        });
        const parent = radio.closest('.target-label');
        parent.classList.remove('border-gray-200');
        parent.classList.add('border-[#6B0D18]', 'bg-red-50/20');

        const val = radio.value;
        document.getElementById('target-group-panel').classList.toggle('hidden', val !== 'group');
        document.getElementById('target-specific-panel').classList.toggle('hidden', val !== 'specific');
    }

    document.addEventListener('DOMContentLoaded', () => {
        const checkedTarget = document.querySelector('input[name="target"]:checked');
        if(checkedTarget) handleTargetChange(checkedTarget);
    });

    // =====================================================
    // 2. Schedule (Lịch gửi)
    // =====================================================
    function handleScheduleChange(radio) {
        const isLater = radio.value === 'later';
        document.getElementById('schedule-panel').classList.toggle('hidden', !isLater);
        document.getElementById('schedule-note').classList.toggle('hidden', !isLater);

        const submitBtn = document.getElementById('btn-submit');
        if(isLater) {
            submitBtn.innerHTML = '<span class="iconify" data-icon="mdi:calendar-clock-outline"></span> Lên lịch gửi';
        } else {
            submitBtn.innerHTML = '<span class="iconify" data-icon="mdi:send-outline"></span> Gửi thông báo';
        }
    }

    // =====================================================
    // 3. Text Variable Insertion
    // =====================================================
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

    function countChars(textarea) {
        const count = textarea.value.length;
        const el = document.getElementById('char-count');
        el.textContent = count;
        el.classList.toggle('text-red-500', count > 500);
    }

    // =====================================================
    // 4. Live Preview Update
    // =====================================================
    function updatePreview() {
        const title = document.getElementById('noti-title').value || 'Tiêu đề thông báo';
        const content = document.getElementById('noti-content').value || 'Nội dung thông báo sẽ hiển thị ở đây. Bạn có thể sử dụng các biến cá nhân hóa để làm thông báo thân thiện hơn.';
        const type = document.getElementById('noti-type').value;
        const isHighPriority = document.querySelector('input[name="priority"]:checked').value === 'high';
        
        const typeConfig = {
            'tin_nhan': { icon: 'mdi:message-text-outline', bg: 'bg-blue-50', text: 'text-blue-600' },
            'khuyen_mai': { icon: 'mdi:ticket-percent-outline', bg: 'bg-yellow-50', text: 'text-yellow-600' },
            'don_hang': { icon: 'mdi:shopping-outline', bg: 'bg-teal-50', text: 'text-teal-600' },
            'tai_khoan': { icon: 'mdi:account-star-outline', bg: 'bg-purple-50', text: 'text-purple-600' },
            'he_thong': { icon: 'mdi:shield-alert-outline', bg: 'bg-gray-100', text: 'text-gray-600' }
        };
        
        const config = typeConfig[type] || typeConfig['tin_nhan'];

        document.getElementById('preview-title').textContent = title;
        let previewHtml = content.replace(/\n/g, '<br>')
                                .replace(/{ten_khach_hang}/g, '<strong>Nguyễn Văn A</strong>')
                                .replace(/{ma_voucher}/g, '<strong>GOLD5</strong>')
                                .replace(/{ma_don_hang}/g, '<strong>#DH123</strong>')
                                .replace(/{hang_thanh_vien}/g, '<strong>Gold</strong>');
        document.getElementById('preview-content').innerHTML = previewHtml;

        const iconWrapper = document.getElementById('preview-icon-wrapper');
        iconWrapper.className = `w-10 h-10 rounded-full flex items-center justify-center shrink-0 mt-0.5 ${config.bg} ${config.text}`;
        document.getElementById('preview-icon').setAttribute('data-icon', config.icon);

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

    // =====================================================
    // 5. Link Type Handler (#5)
    // =====================================================
    const linkPresets = {
        'voucher': '<?= APP_URL ?>/khuyen-mai',
        'product': '<?= APP_URL ?>/san-pham',
        'order': '<?= APP_URL ?>/tai-khoan',
    };

    function handleLinkTypeChange(select) {
        const linkInput = document.getElementById('link-url-input');
        const val = select.value;

        if (val === '') {
            linkInput.value = '';
            linkInput.disabled = true;
            linkInput.classList.add('bg-gray-50');
        } else if (val === 'custom') {
            linkInput.value = '';
            linkInput.disabled = false;
            linkInput.classList.remove('bg-gray-50');
            linkInput.placeholder = 'Nhập URL đầy đủ (https://...)';
            linkInput.focus();
        } else {
            linkInput.value = linkPresets[val] || '';
            linkInput.disabled = false;
            linkInput.classList.remove('bg-gray-50');
            linkInput.placeholder = 'Có thể chỉnh sửa link...';
        }
    }

    function getLinkValue() {
        const type = document.getElementById('link-type-select').value;
        if (!type) return null;
        return document.getElementById('link-url-input').value || null;
    }

    // =====================================================
    // 6. Customer Search (#4 — Khách cụ thể)
    // =====================================================
    let selectedUsers = []; // [{id, ho_ten, sdt}]
    let searchTimeout = null;

    function searchCustomers(keyword) {
        clearTimeout(searchTimeout);
        const resultsDiv = document.getElementById('search-customer-results');
        
        if (keyword.length < 2) {
            resultsDiv.classList.add('hidden');
            return;
        }

        searchTimeout = setTimeout(async () => {
            try {
                const res = await fetch(`<?= APP_URL ?>/admin/notification/api/search-khach-hang?keyword=${encodeURIComponent(keyword)}`);
                const json = await res.json();
                
                if (json.success && json.data.length > 0) {
                    const selectedIds = selectedUsers.map(u => u.id);
                    let html = '';
                    json.data.forEach(u => {
                        const isSelected = selectedIds.includes(u.id);
                        const sdtDisplay = u.sdt ? u.sdt.substring(0, 4) + '***' + u.sdt.substring(u.sdt.length - 3) : '';
                        html += `
                            <div class="px-3 py-2.5 hover:bg-gray-50 cursor-pointer flex items-center justify-between gap-2 border-b border-gray-50 last:border-0 ${isSelected ? 'opacity-50' : ''}"
                                 onclick="${isSelected ? '' : `addCustomer('${u.id}', '${u.ho_ten.replace(/'/g, "\\'")}', '${sdtDisplay}')`}">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-500">
                                        ${u.ho_ten.charAt(0).toUpperCase()}
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-800">${u.ho_ten}</div>
                                        <div class="text-xs text-gray-400">${sdtDisplay} · ${u.email || ''}</div>
                                    </div>
                                </div>
                                <span class="text-xs px-2 py-0.5 rounded-full ${isSelected ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500'}">${isSelected ? 'Đã chọn' : u.hang}</span>
                            </div>
                        `;
                    });
                    resultsDiv.innerHTML = html;
                    resultsDiv.classList.remove('hidden');
                } else {
                    resultsDiv.innerHTML = '<div class="px-3 py-4 text-center text-sm text-gray-400">Không tìm thấy khách hàng nào</div>';
                    resultsDiv.classList.remove('hidden');
                }
            } catch (e) {
                console.error('Search error:', e);
            }
        }, 350);
    }

    function addCustomer(id, name, sdt) {
        if (selectedUsers.find(u => u.id === id)) return;
        selectedUsers.push({ id, ho_ten: name, sdt });
        renderSelectedCustomers();
        
        // Re-trigger search to update "Đã chọn" badges
        const input = document.getElementById('search-customer-input');
        if (input.value.length >= 2) searchCustomers(input.value);
    }

    function removeCustomer(id) {
        selectedUsers = selectedUsers.filter(u => u.id !== id);
        renderSelectedCustomers();
    }

    function renderSelectedCustomers() {
        const container = document.getElementById('selected-customers');
        const countEl = document.getElementById('selected-count');
        const countNumEl = document.getElementById('selected-count-num');

        if (selectedUsers.length === 0) {
            container.innerHTML = '';
            countEl.classList.add('hidden');
            return;
        }

        countEl.classList.remove('hidden');
        countNumEl.textContent = selectedUsers.length;

        container.innerHTML = selectedUsers.map(u => `
            <span class="inline-flex items-center gap-1 pl-2.5 pr-1 py-1 rounded-md bg-white border border-gray-200 text-gray-700 text-xs font-medium">
                ${u.ho_ten}${u.sdt ? ' (' + u.sdt + ')' : ''}
                <button type="button" onclick="removeCustomer('${u.id}')" class="p-0.5 hover:bg-red-50 hover:text-red-500 rounded transition-colors">
                    <span class="iconify" data-icon="mdi:close"></span>
                </button>
            </span>
        `).join('');
    }

    // Close search dropdown on click outside
    document.addEventListener('click', (e) => {
        const panel = document.getElementById('target-specific-panel');
        const results = document.getElementById('search-customer-results');
        if (panel && !panel.contains(e.target)) {
            results?.classList.add('hidden');
        }
    });

    // =====================================================
    // 7. Modal Confirm + Submit
    // =====================================================
    const confirmModal = document.getElementById('confirmModal');
    
    function getTargetDescription() {
        const target = document.querySelector('input[name="target"]:checked').value;
        if (target === 'all') return 'Tất cả khách hàng (~<?= number_format($tong_khach_hang ?? 0, 0, ',', '.') ?> người)';
        if (target === 'group') {
            const checked = document.querySelectorAll('.rank-checkbox:checked');
            if (checked.length === 0) return 'Chưa chọn hạng nào';
            const names = Array.from(checked).map(cb => cb.closest('.rank-checkbox-label').querySelector('span').textContent.trim());
            return 'Hạng: ' + names.join(', ');
        }
        if (target === 'specific') return selectedUsers.length + ' khách hàng được chọn';
        if (target === 'internal') return 'Nội bộ Admin';
        return '';
    }

    function confirmSend() {
        // Validate
        const title = document.getElementById('noti-title').value.trim();
        const content = document.getElementById('noti-content').value.trim();
        if (!title || !content) {
            alert('Vui lòng nhập đầy đủ tiêu đề và nội dung.');
            return;
        }

        const target = document.querySelector('input[name="target"]:checked').value;
        if (target === 'specific' && selectedUsers.length === 0) {
            alert('Vui lòng chọn ít nhất 1 khách hàng.');
            return;
        }
        if (target === 'group') {
            const checked = document.querySelectorAll('.rank-checkbox:checked');
            if (checked.length === 0) {
                alert('Vui lòng chọn ít nhất 1 hạng thành viên.');
                return;
            }
        }

        // Update modal text
        document.getElementById('modal-target-text').textContent = getTargetDescription();

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

    function buildPayload() {
        const targetType = document.querySelector('input[name="target"]:checked').value;
        const data = {
            tieu_de: document.getElementById('noti-title').value.trim(),
            noi_dung: document.getElementById('noti-content').value.trim(),
            loai_thong_bao: document.getElementById('noti-type').value,
            target_type: targetType,
            link: getLinkValue(),
        };

        if (targetType === 'specific') {
            data.specific_users = selectedUsers.map(u => u.id);
        } else if (targetType === 'group') {
            data.group_ranks = Array.from(document.querySelectorAll('.rank-checkbox:checked')).map(cb => cb.value);
        }

        return data;
    }

    async function submitNotification() {
        const data = buildPayload();

        document.getElementById('btn-final-send').disabled = true;
        document.getElementById('btn-final-send').innerHTML = '<span class="iconify animate-spin" data-icon="mdi:loading"></span> Đang gửi...';

        try {
            const res = await fetch('<?= APP_URL ?>/admin/notification/luu', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            const result = await res.json();
            
            if(result.success) {
                alert(result.message || 'Gửi thông báo thành công!');
                window.location.href = '<?= APP_URL ?>/admin/notification';
            } else {
                alert(result.message || 'Có lỗi xảy ra');
                document.getElementById('btn-final-send').disabled = false;
                document.getElementById('btn-final-send').innerHTML = 'Xác nhận gửi';
            }
        } catch(e) {
            console.error(e);
            alert('Lỗi kết nối máy chủ');
        } finally {
            closeConfirmModal();
        }
    }

    // =====================================================
    // 8. Save Draft (#7 — Lưu nháp)
    // =====================================================
    async function saveDraft() {
        const title = document.getElementById('noti-title').value.trim();
        const content = document.getElementById('noti-content').value.trim();
        
        if (!title) {
            alert('Vui lòng nhập ít nhất tiêu đề để lưu nháp.');
            return;
        }

        // Lưu nháp = gửi cho admin internal
        const data = {
            tieu_de: '[NHÁP] ' + title,
            noi_dung: content || '(Chưa có nội dung)',
            loai_thong_bao: document.getElementById('noti-type').value,
            target_type: 'internal',
            link: null
        };

        try {
            const res = await fetch('<?= APP_URL ?>/admin/notification/luu', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            const result = await res.json();
            if(result.success) {
                alert('Đã lưu nháp thành công! Bạn có thể tìm lại trong hộp thư Admin.');
                window.location.href = '<?= APP_URL ?>/admin/notification';
            } else {
                alert(result.message || 'Có lỗi khi lưu nháp');
            }
        } catch(e) {
            alert('Lỗi kết nối máy chủ');
        }
    }

    // =====================================================
    // 9. Templates (#6 — Mẫu thông báo)
    // =====================================================
    const templates = [
        {
            name: 'Chào mừng thành viên mới',
            title: 'Chào mừng bạn đến với Chuỗi Ngọc! 🎉',
            content: 'Xin chào {ten_khach_hang}! Cảm ơn bạn đã đăng ký tài khoản tại Chuỗi Ngọc Phong Thủy. Chúc bạn có trải nghiệm mua sắm tuyệt vời!',
            type: 'tai_khoan'
        },
        {
            name: 'Thông báo voucher mới',
            title: 'Bạn có voucher mới! 🎁',
            content: 'Xin chào {ten_khach_hang}! Bạn vừa nhận được voucher {ma_voucher}. Áp dụng ngay khi mua hàng để được ưu đãi!',
            type: 'khuyen_mai'
        },
        {
            name: 'Nhắc đánh giá sản phẩm',
            title: 'Hãy chia sẻ trải nghiệm của bạn! ⭐',
            content: 'Xin chào {ten_khach_hang}! Đơn hàng {ma_don_hang} đã được giao thành công. Hãy đánh giá sản phẩm để giúp khách hàng khác nhé!',
            type: 'don_hang'
        },
        {
            name: 'Cảnh báo hệ thống',
            title: 'Thông báo bảo trì hệ thống',
            content: 'Hệ thống sẽ tiến hành bảo trì định kỳ. Trong thời gian này một số tính năng có thể bị gián đoạn. Cảm ơn bạn đã thông cảm!',
            type: 'he_thong'
        }
    ];

    function openTemplateModal() {
        const modal = document.getElementById('templateModal');
        if (!modal) return;

        let html = '';
        templates.forEach((t, i) => {
            html += `
                <div class="p-3 border border-gray-200 rounded-lg hover:border-[#6B0D18] hover:bg-red-50/20 cursor-pointer transition-colors" onclick="applyTemplate(${i})">
                    <div class="font-medium text-sm text-gray-800 mb-1">${t.name}</div>
                    <div class="text-xs text-gray-500 line-clamp-2">${t.content.substring(0, 80)}...</div>
                </div>
            `;
        });
        document.getElementById('template-list').innerHTML = html;

        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.querySelector('.modal-inner').classList.remove('scale-95');
        }, 10);
    }

    function closeTemplateModal() {
        const modal = document.getElementById('templateModal');
        modal.classList.add('opacity-0');
        modal.querySelector('.modal-inner').classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 300);
    }

    function applyTemplate(index) {
        const t = templates[index];
        document.getElementById('noti-title').value = t.title;
        document.getElementById('noti-content').value = t.content;
        document.getElementById('noti-type').value = t.type;
        updatePreview();
        countChars(document.getElementById('noti-content'));
        closeTemplateModal();
    }
</script>
