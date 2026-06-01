<script>
    // Tab switching (Backend filtering)
    function switchPromoTab(tabId) {
        document.getElementById('current-tab').value = tabId;
        document.getElementById('filterForm').submit();
    }

    // Dropdown management
    function togglePromoDropdown(btn) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if(menu !== btn.nextElementSibling) menu.classList.add('hidden');
        });
        
        const menu = btn.nextElementSibling;
        const isHidden = menu.classList.contains('hidden');
        
        if (isHidden) {
            menu.classList.remove('hidden');
            const rect = btn.getBoundingClientRect();
            menu.style.position = 'fixed';
            menu.style.top = (rect.bottom + 4) + 'px';
            menu.style.left = (rect.right - 192) + 'px'; // 192px is w-48 width
        } else {
            menu.classList.add('hidden');
        }
    }
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.menu-dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        }
    });
    window.addEventListener('scroll', () => {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
    }, true);

    // Toggle Action
    function togglePromoStatus(id, code, status, btn) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        
        fetch('<?= APP_URL ?>/admin/khuyen-mai/trang-thai/' + id, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({status: status})
        })
        .then(res => res.json())
        .then(res => {
            if(res.success) {
                showPromoToast(status === 1 ? "Đã bật lại chương trình" : "Đã tắt chương trình");
                setTimeout(() => window.location.reload(), 800);
            } else {
                alert(res.message || "Lỗi");
            }
        }).catch(err => {
            alert('Lỗi kết nối');
        });
    }

    // Duplicate Action
    function duplicatePromo(id, code, btn) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        showPromoToast("Đang nhân bản...");
        
        fetch('<?= APP_URL ?>/admin/khuyen-mai/nhan-ban/' + id, {
            method: 'POST',
            headers: {'X-Requested-With': 'XMLHttpRequest'}
        })
        .then(res => res.json())
        .then(res => {
            if(res.success) {
                showPromoToast("Nhân bản thành công!");
                setTimeout(() => window.location.reload(), 800);
            } else {
                alert(res.message || "Lỗi");
            }
        }).catch(err => {
            alert('Lỗi kết nối');
        });
    }

    // Delete Modal
    const delModal = document.getElementById('deletePromoModal');
    let rowToDelete = null;
    let idToDelete = null;
    function confirmDeletePromo(id, code, btn, uses) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        document.getElementById('del-promo-code').textContent = code;
        rowToDelete = btn.closest('tr');
        idToDelete = id;
        
        const warning = document.getElementById('promo-delete-warning');
        const btnPause = document.getElementById('btn-pause-instead');
        if(uses > 0) {
            warning.classList.remove('hidden');
            btnPause.classList.remove('hidden');
        } else {
            warning.classList.add('hidden');
            btnPause.classList.add('hidden');
        }
        
        delModal.classList.remove('hidden');
        setTimeout(() => {
            delModal.classList.remove('opacity-0');
            delModal.children[0].classList.remove('scale-95');
        }, 10);
    }
    
    function closeDeletePromoModal() {
        delModal.classList.add('opacity-0');
        delModal.children[0].classList.add('scale-95');
        setTimeout(() => delModal.classList.add('hidden'), 300);
    }
    
    function executeDeletePromo() {
        closeDeletePromoModal();
        if(rowToDelete && idToDelete) {
            fetch('<?= APP_URL ?>/admin/khuyen-mai/xoa/' + idToDelete, {
                method: 'POST',
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            })
            .then(res => res.json())
            .then(res => {
                if(res.success) {
                    rowToDelete.remove();
                    rowToDelete = null;
                    showPromoToast("Đã xóa vĩnh viễn chương trình");
                } else {
                    alert(res.message || "Lỗi");
                }
            }).catch(err => {
                alert('Lỗi kết nối');
            });
        }
    }
    
    function pauseInstead() {
        closeDeletePromoModal();
        if(rowToDelete && idToDelete) {
            fetch('<?= APP_URL ?>/admin/khuyen-mai/trang-thai/' + idToDelete, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({status: 0})
            }).then(res=>res.json()).then(res=>{
                if(res.success) window.location.reload();
            });
            rowToDelete = null;
        }
    }

    // Details Drawer
    const drawer = document.getElementById('detailsPromoDrawer');
    
    function viewPromoStats(id) {
        viewPromoDetails(id);
    }

    function viewPromoDetails(id) {
        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
        
        fetch('<?= APP_URL ?>/admin/khuyen-mai/api/chi-tiet/' + id)
            .then(res => res.json())
            .then(res => {
                if(res.success) {
                    const data = res.data;
                    document.getElementById('det-name').textContent = data.ten_chuong_trinh;
                    document.getElementById('det-code').textContent = data.ma_km;
                    
                    const statusEl = document.getElementById('det-status');
                    statusEl.className = `inline-flex px-2 py-0.5 rounded text-[11px] font-bold uppercase tracking-wider ${data.trang_thai_class}`;
                    statusEl.textContent = data.trang_thai_text;
                    
                    document.getElementById('det-type').textContent = data.loai_km;
                    document.getElementById('det-time').textContent = data.thoi_gian;
                    
                    document.querySelector('#detailsPromoDrawer .space-y-3').innerHTML = `
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Đã bán</span>
                            <span class="font-bold text-gray-800">${data.so_luong_da_ban} / ${data.gioi_han_tong > 0 ? data.gioi_han_tong : '∞'} <span class="text-xs font-normal text-gray-500">sp</span></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Doanh thu mang lại</span>
                            <span class="font-bold text-[#6B0D18]">${data.doanh_thu}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Tổng tiền đã giảm</span>
                            <span class="font-bold text-amber-600">${data.tong_tien_da_giam}</span>
                        </div>
                    `;
                    
                    document.getElementById('det-creator').textContent = `Người tạo: ${data.nguoi_tao} - ${data.ngay_tao}`;
                    
                    document.querySelector('#detailsPromoDrawer a').href = `<?= APP_URL ?>/admin/khuyen-mai/sua/${data.id}`;
                    
                    // Render sản phẩm
                    const spContainer = document.getElementById('det-products-container');
                    spContainer.innerHTML = `<div class="text-sm font-bold text-gray-800 mb-3 border-b border-gray-100 pb-2">Sản phẩm áp dụng (${data.san_pham.length})</div>`;
                    
                    data.san_pham.forEach(sp => {
                        const div = document.createElement('div');
                        div.className = 'flex items-center gap-3 p-3 border border-gray-100 rounded-lg mb-2';
                        div.innerHTML = `
                            <img src="${sp.hinh_anh_chinh}" class="w-12 h-12 rounded object-cover">
                            <div class="flex-1">
                                <div class="font-medium text-gray-800 text-sm line-clamp-1">${sp.ten_sp}</div>
                                <div class="text-xs text-gray-500 mt-1">${parseInt(sp.gia_ban).toLocaleString('vi-VN')}đ <span class="iconify inline text-[10px]" data-icon="mdi:arrow-right"></span> <strong class="text-[#6B0D18]">${parseInt(sp.gia_sau_giam).toLocaleString('vi-VN')}đ</strong></div>
                            </div>
                        `;
                        spContainer.appendChild(div);
                    });
                    
                    drawer.classList.remove('hidden');
                    setTimeout(() => {
                        drawer.children[0].classList.remove('opacity-0'); // overlay
                        drawer.children[1].classList.remove('translate-x-full'); // panel
                    }, 10);
                } else {
                    alert(res.message);
                }
            })
            .catch(err => alert("Lỗi tải chi tiết: " + err));
    }
    
    function closePromoDetails() {
        drawer.children[0].classList.add('opacity-0');
        drawer.children[1].classList.add('translate-x-full');
        setTimeout(() => drawer.classList.add('hidden'), 300);
    }

    // Toast
    let promoToastTimeout;
    function showPromoToast(msg) {
        const toast = document.getElementById('promoToast');
        document.getElementById('promo-toast-msg').textContent = msg;
        toast.classList.remove('translate-y-20', 'opacity-0');
        clearTimeout(promoToastTimeout);
        promoToastTimeout = setTimeout(() => hidePromoToast(), 3000);
    }
    function hidePromoToast() {
        document.getElementById('promoToast').classList.add('translate-y-20', 'opacity-0');
    }
</script>
