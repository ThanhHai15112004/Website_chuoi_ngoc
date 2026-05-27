<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('Đã copy mã: ' + text, 'success');
        });
    }

    // Toast System
    function showToast(message, type = 'success') {
        const toastContainer = document.getElementById('toastContainer') || createToastContainer();
        
        const toast = document.createElement('div');
        toast.className = `transform transition-all duration-300 translate-y-full opacity-0 flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg border text-sm font-medium mb-3`;
        
        if(type === 'success') {
            toast.classList.add('bg-emerald-50', 'text-emerald-800', 'border-emerald-200');
            toast.innerHTML = `<span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle"></span> ${message}`;
        } else if(type === 'error') {
            toast.classList.add('bg-red-50', 'text-red-800', 'border-red-200');
            toast.innerHTML = `<span class="iconify text-red-500 text-lg" data-icon="mdi:alert-circle"></span> ${message}`;
        }
        
        toastContainer.appendChild(toast);
        
        // Animate in
        setTimeout(() => {
            toast.classList.remove('translate-y-full', 'opacity-0');
        }, 10);
        
        // Remove after 3s
        setTimeout(() => {
            toast.classList.add('translate-y-full', 'opacity-0');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    function createToastContainer() {
        const container = document.createElement('div');
        container.id = 'toastContainer';
        container.className = 'fixed bottom-4 right-4 z-[9999] flex flex-col items-end';
        document.body.appendChild(container);
        return container;
    }

    // Modal Control Logic
    const overlay = document.getElementById('modalOverlay');
    let activeModal = null;

    function openModal(id) {
        const modal = document.getElementById(id);
        if(!modal) return;
        
        // Hide active modal if any
        if(activeModal) {
            activeModal.classList.remove('opacity-100', 'scale-100');
            activeModal.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                activeModal.classList.add('hidden');
                showNewModal(modal);
            }, 200);
        } else {
            showNewModal(modal);
        }
    }

    function showNewModal(modal) {
        overlay.classList.remove('hidden');
        modal.classList.remove('hidden');
        
        // Trigger reflow
        void modal.offsetWidth;
        
        overlay.classList.remove('opacity-0');
        overlay.classList.add('opacity-100');
        modal.classList.remove('opacity-0', 'scale-95');
        modal.classList.add('opacity-100', 'scale-100');
        activeModal = modal;
        
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if(!modal) return;
        
        modal.classList.remove('opacity-100', 'scale-100');
        modal.classList.add('opacity-0', 'scale-95');
        overlay.classList.remove('opacity-100');
        overlay.classList.add('opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            overlay.classList.add('hidden');
            activeModal = null;
            document.body.style.overflow = '';
        }, 300);
    }

    function closeAllModals() {
        if(activeModal) {
            closeModal(activeModal.id);
        }
    }

    // Specific modal openers
    let currentRow = null;

    function openViewModal(title) {
        document.getElementById('viewModalTitle').textContent = title;
        openModal('viewModal');
    }

    function openStockModal(title, currentStock, btn) {
        currentRow = btn.closest('tr');
        document.getElementById('stockModalTitle').textContent = title;
        document.getElementById('stockInput').value = currentStock;
        openModal('stockModal');
    }

    function submitStockModal() {
        const newVal = parseInt(document.getElementById('stockInput').value);
        if(isNaN(newVal) || newVal < 0) {
            showToast('Số lượng tồn kho không hợp lệ', 'error');
            return;
        }

        if(currentRow) {
            const stockBtn = currentRow.querySelector('button[onclick^="openStockModal"]');
            if(stockBtn) {
                stockBtn.innerHTML = `${newVal} <span class="iconify text-sm opacity-0 group-hover:opacity-100 text-gray-400" data-icon="mdi:pencil-outline"></span>`;
            }
            
            // Cập nhật trạng thái text bên dưới
            const statusDiv = currentRow.querySelector('td:nth-child(7) div.flex-col');
            if(statusDiv) {
                let statusHtml = '';
                if(newVal === 0) {
                    statusHtml = `<span class="text-[10px] font-bold uppercase tracking-wider text-red-600 bg-red-50 px-1.5 rounded status-stock">Hết hàng</span>`;
                } else if(newVal <= 5) {
                    statusHtml = `<span class="text-[10px] font-bold uppercase tracking-wider text-orange-500 bg-orange-50 px-1.5 rounded status-stock">Sắp hết</span>`;
                } else {
                    statusHtml = `<span class="text-[10px] font-bold uppercase tracking-wider text-green-600 status-stock">Còn hàng</span>`;
                }
                
                const existingStatus = statusDiv.querySelector('span.status-stock') || statusDiv.querySelector('span.text-\\[10px\\]');
                if(existingStatus) {
                    existingStatus.outerHTML = statusHtml;
                } else {
                    statusDiv.insertAdjacentHTML('beforeend', statusHtml);
                }
            }
        }
        closeModal('stockModal');
        showToast('Cập nhật tồn kho thành công', 'success');
    }

    function openPromoModal(title, btn) {
        currentRow = btn.closest('tr');
        document.getElementById('promoModalTitle').textContent = title;
        openModal('promoModal');
    }

    function submitPromoModal() {
        const discountInput = document.querySelector('#promoModal input[type="number"]').value;
        const discount = parseInt(discountInput);
        
        if(isNaN(discount) || discount < 1 || discount > 100) {
            showToast('Vui lòng nhập mức giảm giá hợp lệ từ 1-100%', 'error');
            return;
        }

        if(currentRow) {
            // Apply to single row
            applyPromoToRow(currentRow, discount);
        } else {
            // Apply to multiple rows
            document.querySelectorAll('.row-checkbox:checked').forEach(cb => {
                applyPromoToRow(cb.closest('tr'), discount);
            });
            // Uncheck all after bulk action
            setTimeout(() => {
                rowCheckboxes.forEach(cb => cb.checked = false);
                selectAll.checked = false;
                updateBulkActions();
            }, 300);
        }

        closeModal('promoModal');
        showToast('Đã tạo khuyến mãi thành công', 'success');
    }

    function applyPromoToRow(tr, discount) {
        // Find price cell (column 6)
        const priceDiv = tr.querySelector('td:nth-child(6) div.flex-col');
        if(!priceDiv) return;
        
        // Find current price (either strong text-gray-900 or line-through if already discounted)
        const currentPriceSpan = priceDiv.querySelector('span.text-gray-900, span.line-through');
        if(currentPriceSpan) {
            // Extract numeric value
            const priceText = currentPriceSpan.textContent.replace(/\D/g, '');
            const originalPrice = parseInt(priceText);
            
            if(originalPrice > 0) {
                const newPrice = originalPrice * (100 - discount) / 100;
                
                // Format prices
                const formatNumber = (num) => new Intl.NumberFormat('vi-VN').format(Math.round(num)) + 'đ';
                
                priceDiv.innerHTML = `
                    <span class="font-bold text-[#6B0D18]">${formatNumber(newPrice)}</span>
                    <span class="text-xs text-gray-400 line-through">${formatNumber(originalPrice)}</span>
                `;
            }
        }
        
        // Add "GIẢM GIÁ" tag to column 3
        addTagToRow(tr, 'Giảm giá', 'bg-red-50 text-red-700 border border-red-100');
    }

    function submitTagModal() {
        const selectedTags = [];
        document.querySelectorAll('#tagModal input[type="checkbox"]:checked').forEach(cb => {
            selectedTags.push(cb.nextElementSibling.textContent.trim());
        });
        
        if(selectedTags.length === 0) {
            showToast('Vui lòng chọn ít nhất một nhãn', 'error');
            return;
        }

        const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
        if(checkedBoxes.length > 0) {
            checkedBoxes.forEach(cb => {
                const tr = cb.closest('tr');
                selectedTags.forEach(tag => {
                    let badgeClass = 'bg-gray-100 text-gray-600';
                    if (tag === 'Mới') badgeClass = 'bg-teal-50 text-teal-700 border border-teal-100';
                    if (tag === 'Bán chạy') badgeClass = 'bg-[#E4D5C3]/30 text-[#6B0D18] border border-[#E4D5C3]';
                    if (tag === 'Flash sale') badgeClass = 'bg-red-50 text-red-700 border border-red-100';
                    if (tag === 'Cao cấp') badgeClass = 'bg-gray-800 text-gray-100 border border-gray-700';
                    
                    addTagToRow(tr, tag, badgeClass);
                });
            });
            
            setTimeout(() => {
                rowCheckboxes.forEach(cb => cb.checked = false);
                selectAll.checked = false;
                updateBulkActions();
            }, 300);
        }

        closeModal('tagModal');
        showToast('Đã gắn nhãn thành công', 'success');
        
        // Reset checkboxes in modal
        document.querySelectorAll('#tagModal input[type="checkbox"]').forEach(cb => cb.checked = false);
    }
    
    function addTagToRow(tr, tagText, badgeClass) {
        const tagsContainer = tr.querySelector('td:nth-child(3) div.flex.items-center');
        if(tagsContainer) {
            // Check if tag already exists
            const existingTags = Array.from(tagsContainer.querySelectorAll('span')).map(s => s.textContent.trim().toUpperCase());
            if(!existingTags.includes(tagText.toUpperCase())) {
                const newTag = `<span class="text-[9px] font-bold px-1.5 py-0.5 rounded ${badgeClass} uppercase tracking-wider whitespace-nowrap shrink-0">${tagText}</span>`;
                tagsContainer.insertAdjacentHTML('beforeend', newTag);
            }
        }
    }

    function openHideModal(title, btn) {
        currentRow = btn.closest('tr');
        document.getElementById('hideModalTitle').textContent = title;
        openModal('hideModal');
    }

    function submitHideModal() {
        if(currentRow) {
            const id = currentRow.dataset.id;
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?= APP_URL ?>/admin/san-pham/an-hien/' + id;
            document.body.appendChild(form);
            form.submit();
        }
    }

    function openDeleteModal(title, soldCount, btn) {
        currentRow = btn.closest('tr');
        document.getElementById('deleteModalTitle').textContent = title;
        
        const warning = document.getElementById('deleteWarning');
        const btnAlternativeHide = document.getElementById('btnAlternativeHide');
        
        if(soldCount > 0) {
            warning.classList.remove('hidden');
            btnAlternativeHide.classList.remove('hidden');
        } else {
            warning.classList.add('hidden');
            btnAlternativeHide.classList.add('hidden');
        }
        
        openModal('deleteModal');
    }

    function submitToggleStatus(id) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?= APP_URL ?>/admin/san-pham/an-hien/' + id;
        document.body.appendChild(form);
        form.submit();
    }

    function submitDeleteModal() {
        if(currentRow) {
            const id = currentRow.dataset.id;
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?= APP_URL ?>/admin/san-pham/xoa/' + id;
            document.body.appendChild(form);
            form.submit();
        }
    }

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
            }
        } else {
            menu.classList.add('hidden');
        }
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.action-btn') && !e.target.closest('.action-menu')) {
            document.querySelectorAll('.action-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });

    // Close dropdowns on scroll to prevent fixed position detachment
    window.addEventListener('scroll', () => {
        document.querySelectorAll('.action-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
    }, true);

    // Checkbox and Bulk Actions Logic
    const selectAll = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCountSpan = document.getElementById('selectedCount');

    function updateBulkActions() {
        const selectedCount = document.querySelectorAll('.row-checkbox:checked').length;
        selectedCountSpan.textContent = selectedCount;
        
        if (selectedCount > 0) {
            bulkActions.classList.remove('hidden');
        } else {
            bulkActions.classList.add('hidden');
        }
        
        selectAll.checked = selectedCount === rowCheckboxes.length && rowCheckboxes.length > 0;
    }

    selectAll.addEventListener('change', (e) => {
        const isChecked = e.target.checked;
        rowCheckboxes.forEach(cb => {
            cb.checked = isChecked;
        });
        updateBulkActions();
    });

    rowCheckboxes.forEach(cb => {
        cb.addEventListener('change', updateBulkActions);
    });

    // Bulk actions simulate
    function simulateBulkAction(actionName) {
        const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
        const count = checkedBoxes.length;
        if(count > 0) {
            if(actionName.includes('xóa')) {
                checkedBoxes.forEach(cb => {
                    const tr = cb.closest('tr');
                    tr.style.opacity = '0';
                    setTimeout(() => tr.remove(), 300);
                });
            } else if(actionName.includes('ẩn')) {
                checkedBoxes.forEach(cb => {
                    const badge = cb.closest('tr').querySelector('td:nth-child(8) span');
                    if(badge) {
                        badge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-gray-100 text-gray-600 border-gray-200 inline-block whitespace-nowrap';
                        badge.textContent = 'Đang ẩn';
                    }
                });
            } else if(actionName.includes('hiển thị')) {
                checkedBoxes.forEach(cb => {
                    const badge = cb.closest('tr').querySelector('td:nth-child(8) span');
                    if(badge) {
                        badge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-emerald-50 text-emerald-700 border-emerald-200 inline-block whitespace-nowrap';
                        badge.textContent = 'Đang hiển thị';
                    }
                });
            } else if(actionName.includes('gắn nhãn')) {
                openModal('tagModal');
                return; // Prevent showing toast here since modal will handle it
            } else if(actionName.includes('tạo khuyến mãi')) {
                openModal('promoModal');
                document.getElementById('promoModalTitle').textContent = `${count} sản phẩm đã chọn`;
                return;
            }
            
            showToast(`Đã ${actionName} ${count} sản phẩm thành công`, 'success');
            
            // Uncheck all
            setTimeout(() => {
                rowCheckboxes.forEach(cb => cb.checked = false);
                selectAll.checked = false;
                updateBulkActions();
            }, 300);
        }
    }

    // Attach bulk actions
    document.querySelectorAll('#bulkActions button').forEach(btn => {
        btn.addEventListener('click', function() {
            const text = this.textContent.trim().toLowerCase();
            simulateBulkAction(text); 
        });
    });

    // Mock Single dropdown actions
    document.addEventListener('click', (e) => {
        const link = e.target.closest('a[href="#"]');
        if(link) {
            const text = link.textContent.trim();
            if(text.includes('Nhân bản')) {
                e.preventDefault();
                const tr = link.closest('tr');
                if(tr) {
                    const clone = tr.cloneNode(true);
                    // Reset checkbox id/state if needed
                    const cb = clone.querySelector('.row-checkbox');
                    if(cb) cb.checked = false;
                    
                    clone.style.backgroundColor = '#f0fdf4'; // Light green to highlight
                    tr.parentNode.insertBefore(clone, tr.nextSibling);
                    
                    setTimeout(() => {
                        clone.style.backgroundColor = '';
                    }, 2000);
                }
                showToast('Đã nhân bản sản phẩm', 'success');
            } else if(text.includes('Tạo khuyến mãi')) {
                e.preventDefault();
                const tr = link.closest('tr');
                if(tr) {
                    openPromoModal(tr.querySelector('td:nth-child(3) a').textContent.trim(), link);
                }
            }
        }
        
        // Handle "Hiện sản phẩm" button inside dropdown
        const btn = e.target.closest('button');
        if(btn && btn.textContent.trim() === 'Hiện sản phẩm') {
            const tr = btn.closest('tr');
            if(tr) {
                const statusBadge = tr.querySelector('td:nth-child(8) span');
                if(statusBadge) {
                    statusBadge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-emerald-50 text-emerald-700 border-emerald-200 inline-block whitespace-nowrap';
                    statusBadge.textContent = 'Đang hiển thị';
                }
                showToast('Đã hiện sản phẩm', 'success');
                // Hide dropdown
                btn.closest('.action-menu').classList.add('hidden');
                
                // Change button text back to Hide
                btn.innerHTML = `<span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn sản phẩm`;
                btn.setAttribute('onclick', `openHideModal('${tr.querySelector('td:nth-child(3) a').textContent.trim()}', this)`);
            }
        }
    });

</script>
