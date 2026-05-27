<script>
    // Action menu toggler
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

    // Drawer Logic
    async function openDestinyDrawer(id) {
        const overlay = document.getElementById('destinyDrawerOverlay');
        const drawer = document.getElementById('destinyDrawer');
        const content = document.getElementById('det-drawer-content');
        
        try {
            content.style.opacity = '0.5';
            overlay.classList.remove('hidden');
            setTimeout(() => overlay.classList.remove('opacity-0'), 10);
            drawer.classList.remove('translate-x-full');
            
            const res = await fetch(`<?= APP_URL ?>/admin/menh-phong-thuy/api/chi-tiet/${id}`);
            const data = await res.json();
            
            if(data.success) {
                const destiny = data.data;
                const color = destiny.mau_dai_dien_hex || '#10B981';
                
                document.getElementById('det-bg-icon').style.color = color;
                document.getElementById('det-icon-container').style.color = color;
                document.getElementById('det-icon-container').style.backgroundColor = color + '20';
                document.getElementById('det-icon-container').style.borderColor = color + '40';
                
                document.getElementById('det-name').textContent = destiny.ten_menh;
                document.getElementById('det-short-desc').textContent = destiny.mo_ta || 'Không có mô tả ngắn';
                
                document.getElementById('det-mau-dai-dien').style.backgroundColor = color;
                document.getElementById('det-mau-dai-dien-text').textContent = color;
                
                const mauHop = document.getElementById('det-mau-hop');
                mauHop.innerHTML = '';
                if(destiny.mau_hop && destiny.mau_hop.length) {
                    destiny.mau_hop.forEach(m => {
                        mauHop.innerHTML += `<span class="px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-md text-xs font-medium text-gray-700">${m}</span>`;
                    });
                }
                
                const mauKy = document.getElementById('det-mau-ky');
                mauKy.innerHTML = '';
                if(destiny.mau_ky && destiny.mau_ky.length) {
                    destiny.mau_ky.forEach(m => {
                        mauKy.innerHTML += `<span class="px-2.5 py-1 bg-red-50/50 border border-red-100 rounded-md text-xs font-medium text-red-600">${m}</span>`;
                    });
                }
                
                const stonesCount = document.getElementById('det-stones-count');
                const stones = document.getElementById('det-stones');
                stones.innerHTML = '';
                if(destiny.da_hop && destiny.da_hop.length) {
                    stonesCount.textContent = destiny.da_hop.length + ' loại';
                    destiny.da_hop.forEach(s => {
                        stones.innerHTML += `<span class="px-2.5 py-1.5 bg-white border border-gray-200 rounded-lg text-xs font-medium text-gray-700 shadow-sm flex items-center gap-1.5">${s.ten}</span>`;
                    });
                } else {
                    stonesCount.textContent = '0 loại';
                }
                
                document.getElementById('det-sp-count').textContent = (destiny.san_pham && destiny.san_pham.length) ? destiny.san_pham.length : 0;
                document.getElementById('det-nam-count').textContent = (destiny.nam_sinh && destiny.nam_sinh.length) ? destiny.nam_sinh.length : 0;
                
                document.getElementById('det-mo-ta').textContent = destiny.mo_ta_chi_tiet || 'Chưa cập nhật ý nghĩa phong thủy.';
                document.getElementById('det-edit-link').href = `<?= APP_URL ?>/admin/menh-phong-thuy/sua/${destiny.id}`;
            }
        } catch(e) {
            console.error(e);
        } finally {
            content.style.opacity = '1';
        }
    }

    function closeDestinyDrawer() {
        const overlay = document.getElementById('destinyDrawerOverlay');
        const drawer = document.getElementById('destinyDrawer');
        overlay.classList.add('opacity-0');
        drawer.classList.add('translate-x-full');
        setTimeout(() => overlay.classList.add('hidden'), 300);
    }

    // Toggle Modal Logic
    function openToggleModal(id, name, count, action) {
        document.querySelectorAll('.absolute.right-0').forEach(menu => menu.classList.add('hidden')); // Close menus
        
        const isHide = action === 'hide';
        document.getElementById('toggleModalTitle').innerText = isHide ? `Ẩn ${name} khỏi trang người dùng?` : `Hiển thị ${name} trên trang người dùng?`;
        document.getElementById('toggleModalIcon').setAttribute('data-icon', isHide ? 'mdi:eye-off-outline' : 'mdi:eye-outline');
        document.getElementById('toggleModalIconContainer').className = isHide ? 'w-12 h-12 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center mb-4 mx-auto' : 'w-12 h-12 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center mb-4 mx-auto';
        document.getElementById('toggleModalActionText').innerText = isHide ? 'ẩn' : 'hiển thị';
        
        const warning = document.getElementById('toggleModalWarning');
        if (count > 0) {
            warning.style.display = 'block';
            document.getElementById('toggleModalCount').innerText = count;
        } else {
            warning.style.display = 'none';
        }
        
        document.getElementById('toggleStatusForm').action = `<?= APP_URL ?>/admin/menh-phong-thuy/an-hien/${id}`;
        document.getElementById('toggleStatusModal').classList.remove('hidden');
    }
</script>
