<?php
// views/components/Admin/xuat_kho/table_list.php
?>
    <!-- Table Wrapper cho cuộn ngang -->
    <div class="overflow-x-auto min-h-[400px]">
        <table class="w-full text-left border-collapse min-w-[1500px]">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase tracking-wider text-gray-500">
                    <th class="py-3 px-4 font-semibold w-10 text-center"><input type="checkbox" id="selectAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20" onchange="toggleAll(this)"></th>
                    <th class="py-3 px-4 font-semibold w-32">Mã Phiếu</th>
                    <th class="py-3 px-4 font-semibold w-36">Loại phiếu</th>
                    <th class="py-3 px-4 font-semibold w-48">Đối tượng nhận</th>
                    <th class="py-3 px-4 font-semibold text-right w-36">Giá trị xuất</th>
                    <th class="py-3 px-4 font-semibold w-32">Người tạo</th>
                    <th class="py-3 px-4 font-semibold w-32">Thời gian tạo</th>
                    <th class="py-3 px-4 font-semibold text-center w-36">Trạng Thái</th>
                    <th class="py-3 px-4 font-semibold text-right w-16"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if (empty($phieuXuatList)): ?>
                <tr>
                    <td colspan="9" class="py-8 text-center text-gray-500">Không tìm thấy phiếu xuất nào.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($phieuXuatList as $xk): ?>
                    <tr class="hover:bg-gray-50/70 transition-colors group">
                        <!-- 1. Checkbox -->
                        <td class="py-3 px-4 text-center">
                            <input type="checkbox" class="row-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20" value="<?= $xk['id'] ?>" onchange="toggleRow(this)">
                        </td>
                        
                        <!-- 2. Mã phiếu -->
                        <td class="py-3 px-4">
                            <a href="<?= APP_URL ?>/admin/xuat-kho/chi-tiet/<?= $xk['id'] ?>" class="font-bold text-[#6B0D18] hover:underline text-sm"><?= $xk['ma_phieu'] ?></a>
                            <?php if(!empty($xk['muc_do_uu_tien']) && $xk['muc_do_uu_tien'] == 1): ?>
                                <span class="ml-1 inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-700 tooltip" title="Cần xử lý gấp">GẤP</span>
                            <?php endif; ?>
                        </td>
                        
                        <!-- 3. Loại / Kho xuất -->
                        <td class="py-3 px-4">
                            <div class="mb-1">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-blue-600 tracking-wide uppercase">
                                    Xuất kho
                                </span>
                            </div>
                        </td>
                        
                        <!-- 4. Đối tượng nhận -->
                        <td class="py-3 px-4">
                            <div class="font-bold text-[#6B0D18] text-[13px] hover:underline cursor-pointer flex items-center gap-1">
                                <?php if(!empty($xk['id_don_hang'])): ?>
                                    <span class="iconify text-gray-400" data-icon="mdi:shopping-outline"></span>
                                    DH #<?= $xk['id_don_hang'] ?>
                                <?php else: ?>
                                    <span class="iconify text-gray-400" data-icon="mdi:account-box-outline"></span>
                                    Khác
                                <?php endif; ?>
                            </div>
                            <div class="text-xs text-gray-500 mt-0.5 truncate max-w-[160px]"><?= htmlspecialchars($xk['ly_do'] ?? 'Không rõ lý do') ?></div>
                        </td>
                        
                        <!-- 7. Giá trị xuất -->
                        <td class="py-3 px-4 text-right">
                            <div class="font-bold text-[#6B0D18] text-[13px]"><?= number_format($xk['tong_tien'], 0, ',', '.') ?>đ</div>
                        </td>
                        
                        <!-- 8. Người tạo -->
                        <td class="py-3 px-4">
                            <div class="flex items-center gap-2">
                                <div class="flex flex-col">
                                    <span class="text-[13px] font-medium text-gray-700 truncate max-w-[100px]"><?= $xk['nguoi_tao_ten'] ?? 'System' ?></span>
                                </div>
                            </div>
                        </td>
                        
                        <!-- 10. Thời gian tạo -->
                        <td class="py-3 px-4">
                            <div class="flex flex-col gap-1 text-[11px]">
                                <span class="text-gray-900 font-medium"><?= date('d/m/Y H:i', strtotime($xk['ngay_tao'])) ?></span>
                            </div>
                        </td>
                        
                        <!-- 11. Trạng thái -->
                        <td class="py-3 px-4 text-center">
                            <?php 
                                $statusClass = 'bg-gray-100 text-gray-700';
                                if ($xk['trang_thai'] == 0) $statusClass = 'bg-gray-100 text-gray-600 border border-gray-200';
                                elseif ($xk['trang_thai'] == 1) $statusClass = 'bg-yellow-50 text-amber-600 border border-yellow-200';
                                elseif ($xk['trang_thai'] == 2) $statusClass = 'bg-blue-50 text-blue-700 border border-blue-200';
                                elseif ($xk['trang_thai'] == 3) $statusClass = 'bg-emerald-50 text-emerald-700 border border-emerald-200';
                                elseif ($xk['trang_thai'] == 4) $statusClass = 'bg-gray-100 text-gray-400 border border-gray-200 line-through';
                            ?>
                            <span class="inline-flex items-center px-2.5 py-1.5 rounded-md text-[11px] font-bold uppercase tracking-wide w-full justify-center <?= $statusClass ?>">
                                <?= $xk['status_text'] ?>
                            </span>
                        </td>
                        
                        <!-- 12. Thao tác -->
                        <td class="py-3 px-4 text-right">
                            <div class="relative inline-block text-left dropdown-container">
                                <button type="button" class="p-1.5 text-gray-400 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition-colors focus:outline-none" onclick="toggleDropdown(this)">
                                    <span class="iconify text-xl" data-icon="mdi:dots-vertical"></span>
                                </button>
                                <div class="dropdown-menu hidden absolute right-0 z-50 mt-1 w-56 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none border border-gray-100 overflow-hidden">
                                    <div class="py-1">
                                        <!-- Actions based on status -->
                                        <?php if($xk['trang_thai'] == 1): ?>
                                            <a href="javascript:void(0)" onclick="duyetPhieu(<?= $xk['id'] ?>)" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-colors font-medium">
                                                <span class="iconify text-lg" data-icon="mdi:shield-check-outline"></span> Duyệt phiếu
                                            </a>
                                        <?php endif; ?>
                                        
                                        <?php if($xk['trang_thai'] == 2): ?>
                                            <a href="<?= APP_URL ?>/admin/xuat-kho/chuan-bi/<?= $xk['id'] ?>" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors font-medium">
                                                <span class="iconify text-lg" data-icon="mdi:package-variant-closed"></span> Chuẩn bị hàng & Xuất
                                            </a>
                                        <?php endif; ?>
                                        
                                        <a href="<?= APP_URL ?>/admin/xuat-kho/chi-tiet/<?= $xk['id'] ?>" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                            <span class="iconify text-lg text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết
                                        </a>
                                        
                                        <?php if($xk['trang_thai'] != 3 && $xk['trang_thai'] != 4): ?>
                                            <div class="border-t border-gray-100 my-1"></div>
                                            <a href="javascript:void(0)" onclick="huyPhieu('<?= $xk['id'] ?>')" class="flex items-center gap-2 px-4 py-2.5 text-sm text-rose-600 hover:bg-rose-50 transition-colors font-medium">
                                                <span class="iconify text-lg" data-icon="mdi:trash-can-outline"></span> Hủy phiếu
                                            </a>
                                        <?php endif; ?>
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
    <div class="p-4 border-t border-gray-200 bg-white flex flex-col md:flex-row items-center justify-between gap-4 rounded-b-xl">
        <div class="text-sm text-gray-500 text-center md:text-left">
            Hiển thị <span class="font-medium text-gray-900"><?= count($phieuXuatList) ?></span> trong tổng số <span class="font-medium text-gray-900"><?= $stats['tat_ca'] ?? 0 ?></span> phiếu
        </div>
        <div class="flex items-center gap-1">
            <?php if(isset($pagination) && $pagination['total_pages'] > 1): ?>
                <?php for($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                    <a href="?page=<?= $i ?>" class="w-8 h-8 flex items-center justify-center rounded-lg <?= $pagination['current'] == $i ? 'bg-[#6B0D18] text-white' : 'bg-white border border-gray-200 text-gray-600' ?> hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
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
    function toggleDropdown(button) {
        const menu = button.nextElementSibling;
        const isHidden = menu.classList.contains('hidden');
        
        document.querySelectorAll('.dropdown-menu').forEach(el => {
            el.classList.add('hidden');
        });

        if (isHidden) {
            const rect = button.getBoundingClientRect();
            menu.classList.remove('hidden');
            menu.style.position = 'fixed';
            menu.style.zIndex = '9999';
            const menuWidth = 224;
            const menuHeight = menu.offsetHeight || 150;
            let top = rect.bottom + 4;
            let left = rect.right - menuWidth;
            if (top + menuHeight > window.innerHeight) top = rect.top - menuHeight - 4;
            if (left < 8) left = 8;
            menu.style.top = top + 'px';
            menu.style.left = left + 'px';
            menu.style.right = 'auto';
        }
    }

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(el => {
                el.classList.add('hidden');
            });
        }
    });

    document.addEventListener('scroll', function() {
        document.querySelectorAll('.dropdown-menu:not(.hidden)').forEach(el => {
            el.classList.add('hidden');
        });
    }, true);

    async function duyetPhieu(id) {
        if(confirm('Xác nhận duyệt phiếu xuất kho này? Phiếu sẽ chuyển sang trạng thái Chuẩn bị hàng.')) {
            try {
                const res = await fetch('<?= APP_URL ?>/admin/xuat-kho/duyet/' + id, {
                    method: 'POST'
                });
                const data = await res.json();
                if(data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    showToast(data.message, 'error');
                }
            } catch (err) {
                console.error(err);
                showToast('Có lỗi xảy ra', 'error');
            }
        }
    }

    async function huyPhieu(id) {
        if(confirm('Bạn có chắc chắn muốn hủy phiếu xuất kho này không? (Thao tác này không thể hoàn tác)')) {
            try {
                const res = await fetch('<?= APP_URL ?>/admin/xuat-kho/huy/' + id, { method: 'POST' });
                const data = await res.json();
                if(data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    showToast(data.message, 'error');
                }
            } catch (err) {
                console.error(err);
                showToast('Có lỗi xảy ra', 'error');
            }
        }
    }
</script>
