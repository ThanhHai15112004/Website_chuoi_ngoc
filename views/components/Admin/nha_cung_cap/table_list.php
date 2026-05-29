<?php
// views/components/Admin/nha_cung_cap/table_list.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[1200px]">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                    <th class="py-3 px-4 font-semibold w-12 text-center">
                        <input type="checkbox" id="checkAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20" onchange="toggleAll(this)">
                    </th>
                    <th class="py-3 px-4 font-semibold">Nhà cung cấp</th>
                    <th class="py-3 px-4 font-semibold">Liên hệ</th>
                    <th class="py-3 px-4 font-semibold">Địa chỉ</th>
                    <th class="py-3 px-4 font-semibold text-center w-28">Tổng đơn</th>
                    <th class="py-3 px-4 font-semibold text-right w-36">Tổng giá trị</th>
                    <th class="py-3 px-4 font-semibold text-right w-36">Công nợ</th>
                    <th class="py-3 px-4 font-semibold text-center w-36">Trạng thái</th>
                    <th class="py-3 px-4 font-semibold text-right w-16"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if (empty($danhSachNCC)): ?>
                    <tr>
                        <td colspan="9" class="py-8 text-center text-gray-500">
                            Không có dữ liệu nhà cung cấp.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($danhSachNCC as $ncc): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 text-center">
                                <input type="checkbox" class="ncc-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20" value="<?= htmlspecialchars($ncc['id']) ?>" onchange="toggleRow(this)">
                            </td>
                            
                            <!-- 1. Cột nhà cung cấp -->
                            <td class="py-3 px-4">
                                <div class="flex flex-col">
                                    <a href="javascript:void(0)" onclick="openDrawer('<?= htmlspecialchars($ncc['id']) ?>')" class="font-bold text-gray-900 hover:text-[#6B0D18] transition-colors text-sm"><?= htmlspecialchars($ncc['ten_ncc']) ?></a>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-xs font-medium text-[#6B0D18] bg-red-50 px-1.5 py-0.5 rounded cursor-pointer" title="Mã nhà cung cấp" onclick="navigator.clipboard.writeText('<?= htmlspecialchars($ncc['ma_ncc']) ?>')">
                                            <?= htmlspecialchars($ncc['ma_ncc']) ?>
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <!-- 2. Cột Liên hệ -->
                            <td class="py-3 px-4">
                                <div class="text-sm">
                                    <?php if(!empty($ncc['nguoi_lien_he'])): ?>
                                        <div class="font-medium text-gray-800"><?= htmlspecialchars($ncc['nguoi_lien_he']) ?></div>
                                        <div class="text-gray-500 mt-0.5 flex items-center gap-1">
                                            <?= htmlspecialchars($ncc['sdt']) ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-gray-500 flex items-center gap-1">
                                            <?= htmlspecialchars($ncc['sdt']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </td>

                            <!-- 3. Cột Địa chỉ -->
                            <td class="py-3 px-4">
                                <div class="text-sm text-gray-600 max-w-[200px] truncate" title="<?= htmlspecialchars($ncc['dia_chi']) ?>">
                                    <?= htmlspecialchars($ncc['dia_chi']) ?: '<span class="text-xs text-gray-400 italic">Chưa cập nhật</span>' ?>
                                </div>
                            </td>

                            <!-- 4. Tổng đơn -->
                            <td class="py-3 px-4 text-center">
                                <div class="font-bold text-gray-900 text-sm"><?= $ncc['tong_phieu'] ?> <span class="font-normal text-xs text-gray-500">phiếu</span></div>
                            </td>

                            <!-- 5. Tổng giá trị -->
                            <td class="py-3 px-4 text-right">
                                <?php if($ncc['tong_gia_tri'] > 0): ?>
                                    <span class="font-bold text-[#6B0D18] text-sm"><?= number_format($ncc['tong_gia_tri'], 0, ',', '.') ?>đ</span>
                                <?php else: ?>
                                    <span class="text-sm text-gray-400">0đ</span>
                                <?php endif; ?>
                            </td>

                            <!-- 6. Công nợ -->
                            <td class="py-3 px-4 text-right">
                                <?php if($ncc['cong_no'] > 0): ?>
                                    <div class="font-bold text-rose-600 text-sm"><?= number_format($ncc['cong_no'], 0, ',', '.') ?>đ</div>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-600 text-[11px] px-2 py-0.5 rounded font-medium border border-emerald-100">Không nợ</span>
                                <?php endif; ?>
                            </td>

                            <!-- 8. Trạng thái -->
                            <td class="py-3 px-4 text-center">
                                <?php
                                    $badgeClass = '';
                                    $statusText = '';
                                    switch ($ncc['trang_thai']) {
                                        case 1:
                                            $badgeClass = 'bg-emerald-50 text-emerald-700 border border-emerald-200';
                                            $statusText = 'Đang hợp tác';
                                            break;
                                        case 2:
                                            $badgeClass = 'bg-amber-50 text-amber-700 border border-amber-200';
                                            $statusText = 'Tạm ngừng';
                                            break;
                                        case 0:
                                        default:
                                            $badgeClass = 'bg-gray-100 text-gray-600 border border-gray-200';
                                            $statusText = 'Ngừng hợp tác';
                                            break;
                                    }
                                ?>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-xs font-semibold <?= $badgeClass ?>">
                                    <?= $statusText ?>
                                </span>
                            </td>

                            <!-- 9. Thao tác -->
                            <td class="py-3 px-4 text-right">
                                <div class="relative inline-block text-left dropdown-container">
                                    <button type="button" class="p-1.5 text-gray-400 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition-colors focus:outline-none" onclick="toggleDropdown(this)">
                                        <span class="iconify text-xl" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    <div class="dropdown-menu hidden absolute right-0 z-10 mt-1 w-48 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none border border-gray-100 overflow-hidden">
                                        <div class="py-1">
                                            <a href="javascript:void(0)" onclick="openDrawer('<?= htmlspecialchars($ncc['id']) ?>')" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors font-medium">
                                                <span class="iconify text-lg text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết
                                            </a>
                                            <a href="<?= APP_URL ?>/admin/nha-cung-cap/sua/<?= htmlspecialchars($ncc['id']) ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                                <span class="iconify text-lg text-gray-400" data-icon="mdi:pencil-outline"></span> Sửa thông tin
                                            </a>
                                            
                                            <div class="border-t border-gray-100 my-1"></div>
                                            
                                            <a href="<?= APP_URL ?>/admin/nhap-kho/them?ncc=<?= htmlspecialchars($ncc['id']) ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                                <span class="iconify text-lg text-blue-500" data-icon="mdi:truck-plus-outline"></span> Tạo phiếu nhập
                                            </a>
                                            
                                            <div class="border-t border-gray-100 my-1"></div>
                                            
                                            <?php if((int)$ncc['trang_thai'] === 1): ?>
                                                <a href="javascript:void(0)" onclick="updateStatus('<?= htmlspecialchars($ncc['id']) ?>', 2)" class="flex items-center gap-2 px-4 py-2 text-sm text-amber-600 hover:bg-amber-50 transition-colors font-medium">
                                                    <span class="iconify text-lg" data-icon="mdi:pause-circle-outline"></span> Tạm ngừng
                                                </a>
                                            <?php elseif((int)$ncc['trang_thai'] === 2): ?>
                                                <a href="javascript:void(0)" onclick="updateStatus('<?= htmlspecialchars($ncc['id']) ?>', 1)" class="flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50 transition-colors font-medium">
                                                    <span class="iconify text-lg" data-icon="mdi:play-circle-outline"></span> Kích hoạt lại
                                                </a>
                                            <?php endif; ?>
                                            
                                            <a href="javascript:void(0)" onclick="updateStatus('<?= htmlspecialchars($ncc['id']) ?>', 0)" class="flex items-center gap-2 px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 transition-colors font-medium">
                                                <span class="iconify text-lg" data-icon="mdi:close-circle-outline"></span> Ngừng hợp tác
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Phân trang -->
    <div class="p-4 border-t border-gray-200 bg-gray-50 flex items-center justify-between">
        <div class="text-sm text-gray-500">
            Hiển thị <span class="font-medium text-gray-900"><?= count($danhSachNCC) > 0 ? 1 : 0 ?></span> đến <span class="font-medium text-gray-900"><?= count($danhSachNCC) ?></span> trong tổng số <span class="font-medium text-gray-900"><?= $total ?? 0 ?></span> NCC
        </div>
        <?php if (($pages ?? 1) > 1): ?>
        <div class="flex items-center gap-1">
            <?php for($i = 1; $i <= $pages; $i++): ?>
                <a href="?page=<?= $i ?><?= !empty($filters['keyword']) ? '&keyword='.$filters['keyword'] : '' ?>" class="w-8 h-8 flex items-center justify-center rounded-lg <?= $i == ($currentPage ?? 1) ? 'bg-[#6B0D18] text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' ?> font-medium text-sm transition-colors shadow-sm">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]">
    <div class="bg-emerald-100 rounded-full p-1" id="toast-icon-bg">
        <span class="iconify text-emerald-600" data-icon="mdi:check" id="toast-icon"></span>
    </div>
    <div>
        <h4 class="text-sm font-bold text-gray-900" id="toast-title">Thành công</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toast-msg">Thao tác thành công.</p>
    </div>
    <button type="button" onclick="hideToast()" class="text-gray-400 hover:text-gray-600 ml-4"><span class="iconify" data-icon="mdi:close"></span></button>
</div>

<script>
    let toastTimeout;
    function showToast(msg, type = 'success') {
        const toast = document.getElementById('toast');
        const toastTitle = document.getElementById('toast-title');
        const toastMsg = document.getElementById('toast-msg');
        const toastIconBg = document.getElementById('toast-icon-bg');
        const toastIcon = document.getElementById('toast-icon');

        toastMsg.textContent = msg;

        if (type === 'success') {
            toast.className = 'fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]';
            toastIconBg.className = 'bg-emerald-100 rounded-full p-1';
            toastIcon.className = 'iconify text-emerald-600';
            toastIcon.setAttribute('data-icon', 'mdi:check');
            toastTitle.textContent = 'Thành công';
        } else {
            toast.className = 'fixed bottom-6 right-6 bg-white border-l-4 border-rose-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]';
            toastIconBg.className = 'bg-rose-100 rounded-full p-1';
            toastIcon.className = 'iconify text-rose-600';
            toastIcon.setAttribute('data-icon', 'mdi:alert-circle-outline');
            toastTitle.textContent = 'Lỗi';
        }

        void toast.offsetWidth;
        toast.classList.remove('translate-y-20', 'opacity-0');
        
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            hideToast();
        }, 3000);
    }

    function hideToast() {
        const toast = document.getElementById('toast');
        toast.classList.add('translate-y-20', 'opacity-0');
    }
    // Dropdown toggle logic
    function toggleDropdown(button) {
        const menu = button.nextElementSibling;
        const isHidden = menu.classList.contains('hidden');
        
        document.querySelectorAll('.dropdown-menu').forEach(el => {
            el.classList.add('hidden');
            el.style.position = '';
            el.style.top = '';
            el.style.left = '';
            el.style.right = '';
        });

        if (isHidden) {
            const rect = button.getBoundingClientRect();
            menu.classList.remove('hidden');
            menu.style.position = 'fixed';
            menu.style.zIndex = '9999';
            const menuWidth = menu.offsetWidth || 192;
            const menuHeight = menu.offsetHeight || 200;
            let top = rect.bottom + 4;
            let left = rect.right - menuWidth;
            if (top + menuHeight > window.innerHeight) top = rect.top - menuHeight - 4;
            if (left < 8) left = 8;
            menu.style.top = top + 'px';
            menu.style.left = left + 'px';
            menu.style.right = 'auto';
        }
    }

    // Đóng menu khi click ra ngoài
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(el => {
                el.classList.add('hidden');
                el.style.position = '';
                el.style.top = '';
                el.style.left = '';
                el.style.right = '';
            });
        }
    });

    document.addEventListener('scroll', function() {
        document.querySelectorAll('.dropdown-menu:not(.hidden)').forEach(el => {
            el.classList.add('hidden');
            el.style.position = '';
            el.style.top = '';
            el.style.left = '';
            el.style.right = '';
        });
    }, true);

    async function updateStatus(id, status) {
        if (!confirm('Bạn có chắc chắn muốn thay đổi trạng thái nhà cung cấp này?')) return;

        try {
            const res = await fetch('<?= APP_URL ?>/admin/nha-cung-cap/cap-nhat-trang-thai/' + id, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ trang_thai: status })
            });
            const data = await res.json();
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showToast(data.message, 'error');
            }
        } catch (e) {
            showToast('Có lỗi xảy ra', 'error');
        }
    }
</script>
