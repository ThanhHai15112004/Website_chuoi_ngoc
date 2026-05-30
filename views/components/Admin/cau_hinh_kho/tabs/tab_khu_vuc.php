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
            <?php 
            function renderTreeViTri($items, $khoId) {
                if (empty($items)) return '';
                $html = '<div class="ml-6 mt-1 border-l border-gray-200 pl-2 space-y-1">';
                foreach ($items as $item) {
                    $icon = 'mdi:view-grid-outline';
                    $color = 'text-blue-500';
                    if ($item['cap_do'] === 'ke') {
                        $icon = 'mdi:bookshelf';
                        $color = 'text-emerald-500';
                    } elseif ($item['cap_do'] === 'ngan') {
                        $icon = 'mdi:inbox-outline';
                        $color = 'text-amber-500';
                    }
                    
                    $hasChild = !empty($item['children']);
                    $iconToggle = $hasChild ? 'mdi:chevron-down' : 'mdi:circle-small';
                    
                    $soLuong = $item['so_luong_hien_tai'] ?? 0;
                    $sucChua = $item['suc_chua'] ? $item['suc_chua'] : '∞';
                    $isFull = $item['suc_chua'] && $soLuong >= $item['suc_chua'];
                    $capInfo = "<span class='text-[10px] text-gray-500 ml-1'>($soLuong/$sucChua)</span>";
                    if ($isFull) $capInfo = "<span class='text-[10px] text-red-500 ml-1 font-bold'>($soLuong/$sucChua - Đầy)</span>";
                    
                    $html .= '<div class="tree-item">';
                    $html .= '<div class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-gray-100 cursor-pointer group" onclick="showKhuVucDetail(\''.$item['cap_do'].'\', \''.$item['id'].'\', \''.$khoId.'\')">';
                    $html .= '<button class="w-5 h-5 flex items-center justify-center text-gray-400 hover:text-gray-700" onclick="event.stopPropagation(); toggleTree(this)">';
                    $html .= '<span class="iconify text-sm" data-icon="'.$iconToggle.'"></span>';
                    $html .= '</button>';
                    $html .= '<span class="iconify '.$color.'" data-icon="'.$icon.'"></span>';
                    $html .= '<span class="font-medium text-gray-700 text-sm flex-1">'.htmlspecialchars($item['ten_vi_tri']).$capInfo.'</span>';
                    $html .= '<div class="opacity-0 group-hover:opacity-100 flex items-center">';
                    $html .= '<button onclick="event.stopPropagation(); openModalThemViTri(\''.$khoId.'\', \''.$item['id'].'\')" class="w-6 h-6 flex items-center justify-center text-gray-400 hover:text-[#6B0D18]"><span class="iconify text-sm" data-icon="mdi:plus"></span></button>';
                    $html .= '</div></div>';
                    
                    if ($hasChild) {
                        $html .= renderTreeViTri($item['children'], $khoId);
                    }
                    $html .= '</div>';
                }
                $html .= '</div>';
                return $html;
            }
            ?>
            
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
                            <button onclick="event.stopPropagation(); openModalThemViTri('<?= $idKho ?>', null)" class="w-6 h-6 flex items-center justify-center text-gray-400 hover:text-[#6B0D18]"><span class="iconify text-sm" data-icon="mdi:plus"></span></button>
                        </div>
                    </div>
                    
                    <!-- Level 2+: Đệ quy -->
                    <?= renderTreeViTri($khoData['children'] ?? [], $idKho) ?>
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
        
        <div class="mb-4">
            <div class="flex gap-4 border-b border-gray-200">
                <button id="tab-btn-vitri" class="py-2 px-4 border-b-2 font-medium text-sm border-[#6B0D18] text-[#6B0D18]" onclick="switchDetailTab('vitri')">Vị trí con</button>
                <button id="tab-btn-sanpham" class="py-2 px-4 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700" onclick="switchDetailTab('sanpham')">Sản phẩm đang chứa</button>
            </div>
        </div>

        <div id="tab-content-vitri" class="overflow-x-auto border border-gray-200 rounded-lg flex-1">
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

        <div id="tab-content-sanpham" class="hidden overflow-x-auto border border-gray-200 rounded-lg flex-1">
            <table class="w-full text-left border-collapse min-w-[700px]">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase text-gray-500">
                        <th class="py-2.5 px-4 font-semibold w-16">Hình ảnh</th>
                        <th class="py-2.5 px-4 font-semibold">Sản phẩm</th>
                        <th class="py-2.5 px-4 font-semibold">Biến thể</th>
                        <th class="py-2.5 px-4 font-semibold text-center">Số lượng</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="sanPhamDetailTable">
                    <tr><td colspan="4" class="text-center py-8 text-gray-500">Vui lòng chọn một vị trí để xem sản phẩm.</td></tr>
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
            let node = null;
            function findNode(children, idToFind) {
                if (!children) return null;
                for (const child of children) {
                    if (child.id === idToFind) return child;
                    const found = findNode(child.children, idToFind);
                    if (found) return found;
                }
                return null;
            }
            node = findNode(kho.children, id);
            if (node) {
                title = 'Vị trí con của: ' + node.ten_vi_tri;
                children = node.children || [];
            }
        }

        document.getElementById('kvDetailTitle').textContent = title;
        document.getElementById('kvDetailSubtitle').textContent = subtitle;

        const tbody = document.getElementById('khuVucDetailTable');
        tbody.innerHTML = '';

        // Luôn luôn load sản phẩm trước, không bị block bởi early return
        if (type !== 'kho') {
            loadSanPhamTaiViTri(id);
        } else {
            document.getElementById('sanPhamDetailTable').innerHTML = '<tr><td colspan="4" class="text-center py-8 text-gray-500">Vui lòng chọn vị trí chi tiết để xem sản phẩm.</td></tr>';
        }

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

    function switchDetailTab(tab) {
        document.getElementById('tab-content-vitri').classList.add('hidden');
        document.getElementById('tab-content-sanpham').classList.add('hidden');
        document.getElementById('tab-btn-vitri').className = "py-2 px-4 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700";
        document.getElementById('tab-btn-sanpham').className = "py-2 px-4 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700";
        
        document.getElementById('tab-content-' + tab).classList.remove('hidden');
        document.getElementById('tab-btn-' + tab).className = "py-2 px-4 border-b-2 font-medium text-sm border-[#6B0D18] text-[#6B0D18]";
    }

    async function loadSanPhamTaiViTri(idViTri) {
        const tbody = document.getElementById('sanPhamDetailTable');
        tbody.innerHTML = '<tr><td colspan="4" class="text-center py-8"><div class="spinner border-4 border-[#6B0D18] border-t-transparent rounded-full w-6 h-6 mx-auto animate-spin"></div></td></tr>';
        
        try {
            const res = await fetch(`<?= APP_URL ?>/admin/cau-hinh-kho/api/vi-tri/san-pham/${idViTri}`, {
                cache: 'no-store'
            });
            const data = await res.json();
            
            if (data.success && data.data.length > 0) {
                tbody.innerHTML = '';
                data.data.forEach(sp => {
                    let imgSrc = sp.hinh_anh_chinh;
                    if (imgSrc && !imgSrc.startsWith('http')) {
                        if (imgSrc.startsWith('/')) {
                            imgSrc = `<?= APP_URL ?>/public${imgSrc}`;
                        } else {
                            imgSrc = `<?= APP_URL ?>/public/uploads/san_pham/${imgSrc}`;
                        }
                    }

                    const tr = document.createElement('tr');
                    tr.className = 'hover:bg-gray-50/50';
                    tr.innerHTML = `
                        <td class="py-2.5 px-4">
                            <img src="${imgSrc}" class="w-10 h-10 object-cover rounded-md border border-gray-200">
                        </td>
                        <td class="py-2.5 px-4">
                            <div class="font-medium text-sm text-gray-900">${sp.ten_sp}</div>
                            <div class="text-xs text-gray-500">${sp.ma_sp}</div>
                        </td>
                        <td class="py-2.5 px-4 text-sm text-gray-700">${sp.bien_the_ten}</td>
                        <td class="py-2.5 px-4 text-center font-bold text-[#6B0D18]">${sp.so_luong}</td>
                    `;
                    tbody.appendChild(tr);
                });
            } else {
                tbody.innerHTML = '<tr><td colspan="4" class="text-center py-8 text-gray-500">Không có sản phẩm nào tại vị trí này.</td></tr>';
            }
        } catch (err) {
            tbody.innerHTML = '<tr><td colspan="4" class="text-center py-8 text-rose-500">Lỗi tải dữ liệu.</td></tr>';
        }
    }

    function openModalThemViTri(khoId, parentId) {
        // Mở modal và gọi hàm setup data (hàm này ở bên modals.php)
        openModal('modalThemViTri');
        if (typeof setupViTriModal === 'function') {
            setupViTriModal(khoId, parentId);
        }
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
