<?php
// views/components/Admin/cau_hinh_kho/tabs/tab_khu_vuc.php
?>
<div class="flex flex-col lg:flex-row h-full min-h-[500px]">
    
    <!-- Cột trái: Sơ đồ kho (Tree View) -->
    <div class="w-full lg:w-1/3 border-b lg:border-b-0 lg:border-r border-gray-200 bg-gray-50/30 p-4">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-bold text-gray-900">Sơ đồ kho</h3>
            <button onclick="openModal('modalThemViTri')" class="w-8 h-8 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-500 hover:text-[#6B0D18] hover:border-[#6B0D18]/30 transition-colors tooltip" title="Thêm vị trí mới">
                <span class="iconify" data-icon="mdi:plus"></span>
            </button>
        </div>
        
        <div class="space-y-1 max-h-[600px] overflow-y-auto custom-scrollbar">
            <?php foreach($treeKhuVuc as $idKho => $khoData): ?>
                <!-- Level 1: Kho -->
                <div class="tree-item">
                    <div class="flex items-center gap-2 p-2 rounded-lg hover:bg-white border border-transparent hover:border-gray-200 cursor-pointer group bg-white border-gray-200 shadow-sm relative" onclick="showKhuVucDetail('kho', '<?= $idKho ?>')">
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#6B0D18] rounded-l-lg"></div>
                        <button class="w-5 h-5 flex items-center justify-center text-gray-400 hover:text-gray-700" onclick="event.stopPropagation(); toggleTree(this)">
                            <span class="iconify" data-icon="mdi:chevron-down"></span>
                        </button>
                        <span class="iconify text-[#6B0D18] text-lg" data-icon="mdi:warehouse"></span>
                        <span class="font-bold text-gray-900 text-sm flex-1"><?= htmlspecialchars($khoData['ten']) ?></span>
                        <div class="opacity-0 group-hover:opacity-100 flex items-center">
                            <button onclick="openModal('modalThemViTri')" class="w-6 h-6 flex items-center justify-center text-gray-400 hover:text-[#6B0D18]"><span class="iconify text-sm" data-icon="mdi:plus"></span></button>
                        </div>
                    </div>
                    
                    <!-- Level 2: Khu vực -->
                    <div class="ml-6 mt-1 border-l border-gray-200 pl-2 space-y-1">
                        <?php if(isset($khoData['children'])): foreach($khoData['children'] as $khu): ?>
                            <div class="tree-item">
                                <div class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-gray-100 cursor-pointer group" onclick="showKhuVucDetail('khu', '<?= $khu['id'] ?>', '<?= $idKho ?>')">
                                    <button class="w-5 h-5 flex items-center justify-center text-gray-400 hover:text-gray-700" onclick="event.stopPropagation(); toggleTree(this)">
                                        <span class="iconify text-sm" data-icon="<?= isset($khu['children']) ? 'mdi:chevron-down' : 'mdi:circle-small' ?>"></span>
                                    </button>
                                    <span class="iconify text-blue-500" data-icon="mdi:view-grid-outline"></span>
                                    <span class="font-medium text-gray-700 text-sm flex-1"><?= htmlspecialchars($khu['ten_vi_tri']) ?></span>
                                    <div class="opacity-0 group-hover:opacity-100 flex items-center">
                                        <button onclick="openModal('modalThemViTri')" class="w-6 h-6 flex items-center justify-center text-gray-400 hover:text-[#6B0D18]"><span class="iconify text-sm" data-icon="mdi:plus"></span></button>
                                    </div>
                                </div>
                                
                                <!-- Level 3: Kệ -->
                                <?php if(isset($khu['children'])): ?>
                                    <div class="ml-6 mt-1 border-l border-gray-200 pl-2 space-y-1">
                                        <?php foreach($khu['children'] as $ke): ?>
                                            <div class="tree-item">
                                                <div class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-gray-100 cursor-pointer group" onclick="showKhuVucDetail('ke', '<?= $ke['id'] ?>', '<?= $idKho ?>')">
                                                    <button class="w-5 h-5 flex items-center justify-center text-gray-400 hover:text-gray-700" onclick="event.stopPropagation(); toggleTree(this)">
                                                        <span class="iconify text-sm" data-icon="<?= isset($ke['children']) ? 'mdi:chevron-down' : 'mdi:circle-small' ?>"></span>
                                                    </button>
                                                    <span class="iconify text-emerald-500" data-icon="mdi:bookshelf"></span>
                                                    <span class="text-gray-600 text-sm flex-1"><?= htmlspecialchars($ke['ten_vi_tri']) ?></span>
                                                    <div class="opacity-0 group-hover:opacity-100 flex items-center">
                                                        <button onclick="openModal('modalThemViTri')" class="w-6 h-6 flex items-center justify-center text-gray-400 hover:text-[#6B0D18]"><span class="iconify text-sm" data-icon="mdi:plus"></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            

        </div>
    </div>

    <!-- Cột phải: Bảng chi tiết khu vực đang chọn -->
    <div class="w-full lg:w-2/3 p-4 flex flex-col">
        <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-100">
            <div>
                <div class="flex items-center gap-2 text-xs font-medium text-gray-500 mb-1">
                    <span class="iconify text-gray-400" data-icon="mdi:warehouse"></span>
                    <span id="kvDetailSubtitle">Vui lòng chọn sơ đồ</span>
                </div>
                <h3 class="text-lg font-bold text-gray-900" id="kvDetailTitle">Chi tiết khu vực</h3>
            </div>
            <button onclick="openModal('modalThemViTri')" class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2">
                <span class="iconify" data-icon="mdi:plus"></span> Thêm vị trí
            </button>
        </div>
        
        <div class="overflow-x-auto border border-gray-200 rounded-lg flex-1">
            <table class="w-full text-left border-collapse min-w-[700px]">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase text-gray-500">
                        <th class="py-2.5 px-4 font-semibold">Mã vị trí</th>
                        <th class="py-2.5 px-4 font-semibold">Tên vị trí</th>
                        <th class="py-2.5 px-4 font-semibold text-center">Cấp</th>
                        <th class="py-2.5 px-4 font-semibold text-center">Sức chứa</th>
                        <th class="py-2.5 px-4 font-semibold text-center">Trạng thái</th>
                        <th class="py-2.5 px-4 font-semibold text-right"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="khuVucDetailTable">
                    <tr><td colspan="6" class="text-center py-8 text-gray-500">Vui lòng chọn một kho hoặc khu vực ở sơ đồ bên trái để xem chi tiết.</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const treeData = <?= json_encode($treeKhuVuc) ?>;

    function toggleTree(btn) {
        const icon = btn.querySelector('.iconify');
        const childrenContainer = btn.closest('.tree-item').querySelector('.border-l');
        
        if (childrenContainer) {
            childrenContainer.classList.toggle('hidden');
            const isHidden = childrenContainer.classList.contains('hidden');
            icon.setAttribute('data-icon', isHidden ? 'mdi:chevron-right' : 'mdi:chevron-down');
        }
    }

    function showKhuVucDetail(type, id, khoId = null) {
        let title = '';
        let subtitle = '';
        let children = [];

        if (type === 'kho') {
            const kho = treeData[id];
            title = 'Chi tiết vị trí trong Kho';
            subtitle = kho.ten;
            children = kho.children || [];
        } else {
            const kho = treeData[khoId];
            subtitle = kho.ten;
            // Find the node
            let node = null;
            for (const khu of (kho.children || [])) {
                if (khu.id === id) { node = khu; break; }
                if (khu.children) {
                    for (const ke of khu.children) {
                        if (ke.id === id) { node = ke; break; }
                        if (ke.children) {
                            for (const ngan of ke.children) {
                                if (ngan.id === id) { node = ngan; break; }
                            }
                        }
                    }
                }
            }
            if (node) {
                title = 'Vị trí con của: ' + node.ten_vi_tri;
                children = node.children || [];
            }
        }

        document.getElementById('kvDetailTitle').textContent = title;
        document.getElementById('kvDetailSubtitle').textContent = subtitle;

        const tbody = document.getElementById('khuVucDetailTable');
        tbody.innerHTML = '';

        if (children.length === 0) {
            tbody.innerHTML = '<tr><td colspan="6" class="text-center py-8 text-gray-500">Không có vị trí con nào.</td></tr>';
            return;
        }

        children.forEach(child => {
            const capDoText = child.cap_do === 'khu' ? 'Khu' : (child.cap_do === 'ke' ? 'Kệ' : 'Ngăn');
            const capDoColor = child.cap_do === 'khu' ? 'bg-blue-50 text-blue-700' : 'bg-emerald-50 text-emerald-700 border border-emerald-100';
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-gray-50/50';
            tr.innerHTML = `
                <td class="py-2.5 px-4 font-semibold text-[#6B0D18] text-sm">${child.ma_vi_tri}</td>
                <td class="py-2.5 px-4 text-sm font-medium text-gray-900">${child.ten_vi_tri}</td>
                <td class="py-2.5 px-4 text-center">
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium ${capDoColor}">${capDoText}</span>
                </td>
                <td class="py-2.5 px-4 text-center">
                    <span class="text-[12px] font-medium text-gray-700">${child.suc_chua ? child.suc_chua : 'Không giới hạn'}</span>
                </td>
                <td class="py-2.5 px-4 text-center">
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium ${child.trang_thai == 1 ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-600'}">${child.trang_thai == 1 ? 'Hoạt động' : 'Tạm khóa'}</span>
                </td>
                <td class="py-2.5 px-4 text-right">
                    <button onclick="xoaViTri('${child.id}')" class="text-gray-400 hover:text-rose-600 mx-1"><span class="iconify" data-icon="mdi:trash-can"></span></button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    async function xoaViTri(id) {
        if(!confirm('Bạn có chắc chắn muốn xóa vị trí này?')) return;
        try {
            const res = await fetch('<?= APP_URL ?>/admin/cau-hinh-kho/vi-tri/xoa/' + id, { method: 'POST' });
            const data = await res.json();
            if(data.success) {
                showToast(data.message, 'success');
                setTimeout(() => window.location.reload(), 800);
            } else {
                showToast(data.message, 'error');
            }
        } catch(err) {
            console.error(err);
        }
    }
</script>
