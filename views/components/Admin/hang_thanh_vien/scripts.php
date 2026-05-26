<!-- Scripts -->
<script>
    function toggleActionDropdown(e, id) {
        e.stopPropagation();
        const dropdown = document.getElementById(id);
        const isHidden = dropdown.classList.contains('hidden');
        
        // Hide all others
        document.querySelectorAll('.action-dropdown').forEach(d => d.classList.add('hidden'));
        
        if (isHidden) {
            dropdown.classList.remove('hidden');
            const rect = e.currentTarget.getBoundingClientRect();
            
            // Check bottom overflow
            if (rect.bottom + dropdown.offsetHeight > window.innerHeight) {
                dropdown.style.top = (rect.top - dropdown.offsetHeight) + 'px';
            } else {
                dropdown.style.top = rect.bottom + 'px';
            }
            // Align to right edge of button
            dropdown.style.left = (rect.right - dropdown.offsetWidth) + 'px';
        }
    }

    // Close when click outside
    document.addEventListener('click', () => {
        document.querySelectorAll('.action-dropdown').forEach(d => d.classList.add('hidden'));
    });
    function switchRankTab(tabId) {
        // Hide all tabs
        ['list', 'compare', 'history'].forEach(id => {
            document.getElementById('tab-content-' + id).classList.remove('block');
            document.getElementById('tab-content-' + id).classList.add('hidden');
            
            // Reset tab styles
            let btn = document.getElementById('tab-btn-' + id);
            btn.className = 'px-6 py-4 font-medium text-sm text-gray-500 hover:text-gray-800 border-b-2 border-transparent whitespace-nowrap transition-colors';
        });

        // Show active tab
        document.getElementById('tab-content-' + tabId).classList.remove('hidden');
        document.getElementById('tab-content-' + tabId).classList.add('block');
        
        // Active tab style
        let activeBtn = document.getElementById('tab-btn-' + tabId);
        activeBtn.className = 'px-6 py-4 font-bold text-sm text-[#6B0D18] border-b-2 border-[#6B0D18] whitespace-nowrap transition-colors';
    }

    function openConfigModal() { document.getElementById('configModal').classList.remove('hidden'); }
    function openRankDetailModal(rankId) {
        document.getElementById('rankDetailModal').classList.remove('hidden');
    }
    function openAddRankModal() { 
        document.getElementById('editRankModal').querySelector('h3').innerHTML = '<span class="iconify text-gray-500 text-2xl" data-icon="mdi:medal-outline"></span> Thêm hạng mới';
        document.getElementById('rank-id-input').value = '';
        document.getElementById('rank-id-input').readOnly = false;
        document.getElementById('rank-display-name-input').value = '';
        document.getElementById('rank-condition-input').value = '';
        document.getElementById('rank-discount-input').value = '0';
        document.querySelectorAll('.rank-privilege-checkbox').forEach(cb => cb.checked = false);
        document.querySelector('input[name="rank_color"][value="gray"]').checked = true;

        document.getElementById('editRankModal').classList.remove('hidden'); 
        updateRankPreview();
    }
    function openEditRankModal(rankId) { 
        document.getElementById('editRankModal').querySelector('h3').innerHTML = '<span class="iconify text-yellow-500 text-2xl" data-icon="mdi:crown"></span> Chỉnh sửa hạng: <span class="uppercase text-yellow-600">GOLD</span>';
        document.getElementById('rank-id-input').value = 'Gold';
        document.getElementById('rank-id-input').readOnly = true;
        document.getElementById('rank-display-name-input').value = 'Thành viên Gold';
        document.getElementById('rank-condition-input').value = '3.000.000';
        document.getElementById('rank-discount-input').value = '5';
        document.querySelectorAll('.rank-privilege-checkbox').forEach(cb => {
            if (cb.value === 'Freeship định kỳ' || cb.value === 'Nhận ưu đãi sớm') cb.checked = true;
            else cb.checked = false;
        });
        document.querySelector('input[name="rank_color"][value="yellow"]').checked = true;

        document.getElementById('editRankModal').classList.remove('hidden'); 
        updateRankPreview();
    }
    function openAssignVoucherModal(rankId) { 
        document.getElementById('assign-rank-name').textContent = rankId;
        document.getElementById('assignVoucherModal').classList.remove('hidden');
    }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

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

    function updateRankPreview() {
        const nameInput = document.getElementById('rank-display-name-input').value || 'TÊN HẠNG';
        const discountInput = document.getElementById('rank-discount-input').value || '0';
        const conditionInput = document.getElementById('rank-condition-input').value || '0';
        const colorInput = document.querySelector('input[name="rank_color"]:checked').value;
        
        // Update Text
        document.getElementById('preview-name-text').textContent = nameInput;
        document.getElementById('preview-discount-text').textContent = 'Giảm ' + discountInput + '% mọi đơn hàng';
        
        // Update Condition Text
        let conditionStr = conditionInput.replace(/\D/g, '');
        if(conditionStr === '') conditionStr = '0';
        if(conditionStr.length > 6) {
            conditionStr = (parseInt(conditionStr) / 1000000).toFixed(1).replace('.0', '') + 'tr';
        } else if (conditionStr.length > 3) {
            conditionStr = (parseInt(conditionStr) / 1000).toFixed(0) + 'k';
        } else {
            conditionStr += 'đ';
        }
        document.getElementById('preview-condition-text').textContent = 'Cần ' + (conditionStr === '0đ' ? '0' : conditionStr);

        // Update Privileges
        const privilegesList = document.getElementById('preview-privileges-list');
        privilegesList.innerHTML = '';
        document.querySelectorAll('.rank-privilege-checkbox:checked').forEach(cb => {
            privilegesList.innerHTML += `<li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> ${cb.value}</li>`;
        });
        if(privilegesList.innerHTML === '') {
            privilegesList.innerHTML = '<li class="text-gray-400 italic">Chưa có đặc quyền nào</li>';
        }
        
        // Color Mapping
        const colors = {
            'gray': {
                nameClass: 'text-gray-500',
                borderClass: 'border-gray-300',
                bgClass: 'bg-gray-100',
                iconClass: 'text-gray-600',
                progressClass: 'from-gray-400',
                glowClass: 'bg-gray-200',
                boxBorderClass: 'border-gray-200'
            },
            'yellow': {
                nameClass: 'text-yellow-600',
                borderClass: 'border-yellow-300',
                bgClass: 'bg-yellow-50',
                iconClass: 'text-yellow-600',
                progressClass: 'from-yellow-400',
                glowClass: 'bg-yellow-100',
                boxBorderClass: 'border-yellow-200'
            },
            'red': {
                nameClass: 'text-red-600',
                borderClass: 'border-red-300',
                bgClass: 'bg-red-50',
                iconClass: 'text-red-600',
                progressClass: 'from-red-400',
                glowClass: 'bg-red-100',
                boxBorderClass: 'border-red-200'
            },
            'blue': {
                nameClass: 'text-blue-600',
                borderClass: 'border-blue-300',
                bgClass: 'bg-blue-50',
                iconClass: 'text-blue-600',
                progressClass: 'from-blue-400',
                glowClass: 'bg-blue-100',
                boxBorderClass: 'border-blue-200'
            },
            'emerald': {
                nameClass: 'text-emerald-600',
                borderClass: 'border-emerald-300',
                bgClass: 'bg-emerald-50',
                iconClass: 'text-emerald-600',
                progressClass: 'from-emerald-400',
                glowClass: 'bg-emerald-100',
                boxBorderClass: 'border-emerald-200'
            }
        };
        
        const c = colors[colorInput];
        
        // Update Classes
        document.getElementById('preview-rank-name').className = `text-2xl font-black uppercase tracking-wide flex items-center gap-2 transition-colors duration-300 ${c.nameClass}`;
        document.getElementById('preview-card-bg').className = `bg-gradient-to-br from-[#FAF8F5] to-white rounded-2xl shadow-lg border p-6 relative overflow-hidden transition-all duration-300 ${c.borderClass}`;
        document.getElementById('preview-bg-glow').className = `absolute top-0 right-0 w-32 h-32 rounded-full opacity-20 -mr-10 -mt-10 blur-xl transition-colors duration-300 ${c.glowClass}`;
        document.getElementById('preview-icon-box').className = `w-12 h-12 rounded-full border flex items-center justify-center shadow-sm transition-colors duration-300 ${c.borderClass} ${c.bgClass} ${c.iconClass}`;
        document.getElementById('preview-discount-box').className = `p-3 bg-white/80 backdrop-blur rounded-xl border shadow-sm transition-colors duration-300 ${c.boxBorderClass}`;
        document.getElementById('preview-divider').className = `pt-4 border-t transition-colors duration-300 ${c.boxBorderClass}`;
        document.getElementById('preview-progress-bar').className = `bg-gradient-to-r to-[#6B0D18] h-1.5 rounded-full transition-colors duration-300 ${c.progressClass}`;
    }
</script>
