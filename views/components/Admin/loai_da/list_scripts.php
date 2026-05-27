<script>
    // Dropdown management
    function toggleStoneDropdown(btn) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if(menu !== btn.nextElementSibling) menu.classList.add('hidden');
        });
        btn.nextElementSibling.classList.toggle('hidden');
    }
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.menu-dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        }
    });

    // Toggle Action
    let currentRow = null;
    function toggleStoneStatus(code, btn, action) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        const row = btn.closest('tr');
        executeToggle(row, action);
    }
    
    function executeToggle(row, action) {
        const badge = row.querySelector('.status-badge');
        const btnToggle = row.querySelector('.btn-toggle');
        
        if (action === 'hide') {
            if(badge) {
                badge.className = "inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-gray-100 text-gray-500 border border-gray-200 status-badge uppercase tracking-wider";
                badge.textContent = "Đang ẩn";
            }
            if(btnToggle) {
                btnToggle.innerHTML = '<span class="iconify" data-icon="mdi:eye-outline"></span> Hiện loại đá';
                btnToggle.className = 'btn-toggle flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50';
                btnToggle.setAttribute('onclick', btnToggle.getAttribute('onclick').replace("'hide'", "'show'"));
            }
            showStoneToast("Đã ẩn loại đá này khỏi website.");
        } else {
            if(badge) {
                badge.className = "inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 status-badge uppercase tracking-wider";
                badge.textContent = "Đang hiển thị";
            }
            if(btnToggle) {
                btnToggle.innerHTML = '<span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn loại đá';
                btnToggle.className = 'btn-toggle flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50';
                btnToggle.setAttribute('onclick', btnToggle.getAttribute('onclick').replace("'show'", "'hide'"));
            }
            showStoneToast("Đã hiển thị loại đá này trên website.");
        }
    }

    // Delete Modal
    const delModal = document.getElementById('deleteStoneModal');
    function confirmDeleteStone(code, name, btn, uses) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        document.getElementById('del-stone-name').textContent = name;
        currentRow = btn.closest('tr');
        
        const warning = document.getElementById('stone-delete-warning');
        const btnHide = document.getElementById('btn-hide-instead');
        const btnConfirm = document.getElementById('btn-confirm-delete');
        
        if(uses > 0) {
            document.getElementById('del-stone-count').textContent = uses;
            warning.classList.remove('hidden');
            btnHide.classList.remove('hidden');
            // Disable delete if there are products
            btnConfirm.classList.replace('bg-red-600', 'bg-red-300');
            btnConfirm.classList.replace('hover:bg-red-700', 'hover:bg-red-300');
            btnConfirm.classList.add('cursor-not-allowed');
            btnConfirm.disabled = true;
        } else {
            warning.classList.add('hidden');
            btnHide.classList.add('hidden');
            // Enable delete
            btnConfirm.classList.replace('bg-red-300', 'bg-red-600');
            btnConfirm.classList.replace('hover:bg-red-300', 'hover:bg-red-700');
            btnConfirm.classList.remove('cursor-not-allowed');
            btnConfirm.disabled = false;
        }
        
        delModal.classList.remove('hidden');
        setTimeout(() => {
            delModal.classList.remove('opacity-0');
            delModal.children[0].classList.remove('scale-95');
        }, 10);
    }
    
    function closeDeleteStoneModal() {
        delModal.classList.add('opacity-0');
        delModal.children[0].classList.add('scale-95');
        setTimeout(() => delModal.classList.add('hidden'), 300);
    }
    
    function executeDeleteStone() {
        closeDeleteStoneModal();
        if(currentRow) {
            currentRow.remove();
            currentRow = null;
        }
        showStoneToast("Đã xóa vĩnh viễn loại đá / ngọc.");
    }
    
    function hideInstead() {
        closeDeleteStoneModal();
        if(currentRow) {
            executeToggle(currentRow, 'hide');
            currentRow = null;
        }
    }

    // Details Drawer
    const drawer = document.getElementById('detailsStoneDrawer');
    async function viewStoneDetails(id) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        
        try {
            const response = await fetch(`<?= APP_URL ?>/admin/loai-da/api/chi-tiet/${id}`);
            const result = await response.json();
            
            if (result.success) {
                const data = result.data;
                
                // Populate data
                const img = document.getElementById('det-img');
                if (data.hinh_anh_url) {
                    img.src = data.hinh_anh_url;
                    img.classList.remove('hidden');
                } else {
                    img.src = '<?= APP_URL ?>/public/images/no-image.png'; // Fallback
                }
                
                document.getElementById('det-name').textContent = data.ten_loai_da;
                document.getElementById('det-eng').textContent = data.ten_tieng_anh || '';
                document.getElementById('det-code').textContent = data.ma_loai_da;
                
                const statusSpan = document.getElementById('det-status');
                if (data.trang_thai == 1) {
                    statusSpan.className = "inline-flex px-2 py-0.5 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 uppercase tracking-wider";
                    statusSpan.textContent = "Đang hiển thị";
                } else {
                    statusSpan.className = "inline-flex px-2 py-0.5 rounded-md text-[11px] font-bold bg-gray-100 text-gray-500 border border-gray-200 uppercase tracking-wider";
                    statusSpan.textContent = "Đang ẩn";
                }
                
                document.getElementById('det-nhom').textContent = data.nhom;
                document.getElementById('det-mau-dot').style.backgroundColor = data.mau_sac_hex || '#ccc';
                document.getElementById('det-mau-text').textContent = data.mau_sac_ten || 'Không rõ';
                
                // Mệnh
                const menhContainer = document.getElementById('det-menh-container');
                menhContainer.innerHTML = '';
                if (data.menh_ids && data.menh_list) {
                    let menhIds = [];
                    if (typeof data.menh_ids === 'string') menhIds = data.menh_ids.split(',');
                    else if (Array.isArray(data.menh_ids)) menhIds = data.menh_ids;
                    
                    data.menh_list.forEach(m => {
                        if (menhIds.includes(m.id.toString()) || menhIds.includes(m.id)) {
                            menhContainer.innerHTML += `<span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-red-50 text-[#6B0D18] border border-red-100 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full" style="background-color: ${m.mau_sac_hop || '#ccc'}"></span>${m.ten_menh}</span>`;
                        }
                    });
                }
                
                // Nhu cầu
                const nhuCauContainer = document.getElementById('det-nhucau-container');
                nhuCauContainer.innerHTML = '';
                if (data.nhu_cau) {
                    let nhuCauArr = [];
                    try {
                        nhuCauArr = typeof data.nhu_cau === 'string' ? JSON.parse(data.nhu_cau) : data.nhu_cau;
                    } catch (e) {}
                    
                    if (Array.isArray(nhuCauArr)) {
                        nhuCauArr.forEach(nc => {
                            nhuCauContainer.innerHTML += `<span class="inline-flex px-2 py-1 rounded text-xs bg-amber-50 text-amber-700 border border-amber-100">${nc}</span>`;
                        });
                    }
                }
                
                document.getElementById('det-ynghia').textContent = data.y_nghia || 'Chưa cập nhật.';
                document.getElementById('det-luuy').textContent = data.luu_y || 'Chưa cập nhật.';
                
                document.getElementById('det-count').textContent = data.so_san_pham || 0;
                document.getElementById('det-count-link').href = `<?= APP_URL ?>/admin/san-pham?loai_da=${encodeURIComponent(data.ten_loai_da)}`;
                
                document.getElementById('det-edit-link').href = `<?= APP_URL ?>/admin/loai-da/sua/${data.id}`;
                
                let dateStr = '';
                if (data.ngay_cap_nhat) {
                    dateStr = `Cập nhật cuối: ${data.ngay_cap_nhat}`;
                } else if (data.ngay_tao) {
                    dateStr = `Ngày tạo: ${data.ngay_tao}`;
                }
                document.getElementById('det-date').textContent = dateStr;
                
                // Show drawer
                drawer.classList.remove('hidden');
                setTimeout(() => {
                    drawer.children[0].classList.remove('opacity-0'); 
                    drawer.children[1].classList.remove('translate-x-full'); 
                }, 10);
                
            } else {
                showStoneToast('Lỗi: ' + result.message);
            }
        } catch (error) {
            console.error(error);
            showStoneToast('Đã có lỗi xảy ra khi tải dữ liệu.');
        }
    }
    
    function closeStoneDetails() {
        drawer.children[0].classList.add('opacity-0');
        drawer.children[1].classList.add('translate-x-full');
        setTimeout(() => drawer.classList.add('hidden'), 300);
    }

    // Toast
    let stoneToastTimeout;
    function showStoneToast(msg) {
        const toast = document.getElementById('stoneToast');
        document.getElementById('stone-toast-msg').textContent = msg;
        toast.classList.remove('translate-y-20', 'opacity-0');
        clearTimeout(stoneToastTimeout);
        stoneToastTimeout = setTimeout(() => hideStoneToast(), 3000);
    }
    function hideStoneToast() {
        document.getElementById('stoneToast').classList.add('translate-y-20', 'opacity-0');
    }
</script>
