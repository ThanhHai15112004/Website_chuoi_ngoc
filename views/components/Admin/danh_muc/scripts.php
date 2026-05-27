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

    // Modal logic
    function previewCatImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('catImagePreview').src = e.target.result;
                document.getElementById('catImagePreview').classList.remove('hidden');
                document.getElementById('catImagePlaceholder').classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function openModal(id, mode = 'add', title = '') {
        const modal = document.getElementById(id);
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.children[1].classList.remove('scale-95');
        }, 10);

        if (id === 'categoryModal') {
            const nameInput = document.getElementById('catName');
            nameInput.classList.remove('border-red-500');
            document.getElementById('catNameError').classList.add('hidden');

            if(mode === 'add') {
                document.getElementById('categoryModalTitle').textContent = 'Thêm danh mục mới';
                document.getElementById('categoryForm').reset();
                document.getElementById('catId').value = '';
                document.getElementById('categoryProductWarning').classList.add('hidden');
                
                // Reset image
                document.getElementById('catImagePreview').src = '';
                document.getElementById('catImagePreview').classList.add('hidden');
                document.getElementById('catImagePlaceholder').classList.remove('hidden');
            }
        }
    }

    function openEditModal(dm) {
        openModal('categoryModal', 'edit');
        document.getElementById('categoryModalTitle').textContent = 'Chỉnh sửa danh mục';
        
        document.getElementById('catId').value = dm.id;
        document.getElementById('catName').value = dm.ten_danh_muc;
        document.getElementById('catCode').value = dm.ma_danh_muc || '';
        document.getElementById('catSlug').value = dm.slug || '';
        document.getElementById('catDesc').value = dm.mo_ta || '';
        
        document.getElementById('catPosMenu').checked = dm.vi_tri.includes('Menu chính');
        document.getElementById('catPosHome').checked = dm.vi_tri.includes('Trang chủ');
        document.getElementById('catPosFilter').checked = dm.vi_tri.includes('Bộ lọc SP');
        
        document.getElementById('catStatus').checked = dm.trang_thai == 1;
        document.getElementById('catOrder').value = dm.thu_tu;
        
        // Handle image
        if (dm.hinh_anh) {
            document.getElementById('catImagePreview').src = `<?= APP_URL ?>/public/uploads/danh_muc/${dm.hinh_anh}`;
            document.getElementById('catImagePreview').classList.remove('hidden');
            document.getElementById('catImagePlaceholder').classList.add('hidden');
        } else {
            document.getElementById('catImagePreview').src = '';
            document.getElementById('catImagePreview').classList.add('hidden');
            document.getElementById('catImagePlaceholder').classList.remove('hidden');
        }

        const warning = document.getElementById('categoryProductWarning');
        if(dm.so_san_pham > 0) {
            warning.classList.remove('hidden');
            document.getElementById('categoryProductCount').textContent = dm.so_san_pham;
        } else {
            warning.classList.add('hidden');
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        modal.classList.add('opacity-0');
        modal.children[1].classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Category Form Submit is handled by standard HTML <form> submit now.
    // We just keep this here if we wanted to prevent default, but native HTML required handles it.

    // Sort modal
    function submitSort() {
        closeModal('sortModal');
        showToast('Đã cập nhật thứ tự hiển thị', 'success');
    }

    // Hide/Delete Modals
    let currentCategoryId = '';

    function submitToggleStatus(id) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?= APP_URL ?>/admin/danh-muc/an-hien/' + id;
        document.body.appendChild(form);
        form.submit();
    }

    function openDeleteModal(dm, btn) {
        currentCategoryId = dm.id;
        document.getElementById('deleteModalTitle').textContent = dm.ten_danh_muc;
        
        const warning = document.getElementById('deleteModalWarning');
        const btnDelete = document.getElementById('btnConfirmDelete');
        const btnSwitch = document.getElementById('btnSwitchToHide');

        if(dm.so_san_pham > 0) {
            warning.classList.remove('hidden');
            document.getElementById('deleteModalCount').textContent = dm.so_san_pham;
            btnDelete.classList.add('opacity-50', 'cursor-not-allowed');
            btnSwitch.classList.remove('hidden');
        } else {
            warning.classList.add('hidden');
            btnDelete.classList.remove('opacity-50', 'cursor-not-allowed');
            btnSwitch.classList.add('hidden');
        }
        
        document.querySelectorAll('.action-menu').forEach(m => m.classList.add('hidden'));
        openModal('deleteModal');
    }

    function submitDelete() {
        const warning = document.getElementById('deleteModalWarning');
        if(!warning.classList.contains('hidden')) {
            showToast('Không thể xóa danh mục đang có sản phẩm!', 'error');
            return;
        }
        
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?= APP_URL ?>/admin/danh-muc/xoa/' + currentCategoryId;
        document.body.appendChild(form);
        form.submit();
    }

    function switchToHide() {
        closeModal('deleteModal');
        setTimeout(() => {
            submitToggleStatus(currentCategoryId);
        }, 300);
    }

    // Dropdown logic
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

    document.querySelector('.flex-1.overflow-auto').addEventListener('scroll', () => {
        document.querySelectorAll('.action-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
    });

    // Checkbox logic
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
            const someChecked = Array.from(rowCheckboxes).some(c => c.checked);
            selectAll.checked = allChecked;
            selectAll.indeterminate = someChecked && !allChecked;
            updateBulkActions();
        });
    });

    // Bulk action buttons
    document.querySelectorAll('#bulkActions button').forEach(btn => {
        btn.addEventListener('click', function() {
            const text = this.textContent.trim().toLowerCase();
            const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
            const count = checkedBoxes.length;

            if(count > 0) {
                if(text.includes('xóa')) {
                    checkedBoxes.forEach(cb => {
                        const tr = cb.closest('tr');
                        tr.style.opacity = '0';
                        setTimeout(() => tr.remove(), 300);
                    });
                } else if(text.includes('ẩn')) {
                    checkedBoxes.forEach(cb => {
                        const badge = cb.closest('tr').querySelector('td:nth-child(8) span');
                        if(badge) {
                            badge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-gray-100 text-gray-600 border-gray-200 inline-block whitespace-nowrap';
                            badge.textContent = 'Đang ẩn';
                        }
                    });
                } else if(text.includes('hiện')) {
                    checkedBoxes.forEach(cb => {
                        const badge = cb.closest('tr').querySelector('td:nth-child(8) span');
                        if(badge) {
                            badge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-emerald-50 text-emerald-700 border-emerald-200 inline-block whitespace-nowrap';
                            badge.textContent = 'Đang hiển thị';
                        }
                    });
                }
                
                showToast(`Đã ${text} ${count} danh mục thành công`, 'success');
                
                setTimeout(() => {
                    rowCheckboxes.forEach(cb => cb.checked = false);
                    selectAll.checked = false;
                    updateBulkActions();
                }, 300);
            }
        });
    });
    // Drag and drop logic for sortModal
    const sortableList = document.getElementById('sortableList');
    let draggedItem = null;

    sortableList.addEventListener('dragstart', (e) => {
        draggedItem = e.target.closest('.sortable-item');
        if(draggedItem) {
            draggedItem.classList.add('opacity-50');
            setTimeout(() => draggedItem.classList.add('hidden'), 0);
        }
    });

    sortableList.addEventListener('dragend', (e) => {
        if(draggedItem) {
            draggedItem.classList.remove('opacity-50', 'hidden');
            draggedItem = null;
        }
    });

    sortableList.addEventListener('dragover', (e) => {
        e.preventDefault();
        const afterElement = getDragAfterElement(sortableList, e.clientY);
        const currentItem = document.querySelector('.sortable-item.hidden');
        if (currentItem) {
            if (afterElement == null) {
                sortableList.appendChild(currentItem);
            } else {
                sortableList.insertBefore(currentItem, afterElement);
            }
        }
    });

    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll('.sortable-item:not(.hidden)')];
        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child };
            } else {
                return closest;
            }
        }, { offset: Number.NEGATIVE_INFINITY }).element;
    }
</script>
