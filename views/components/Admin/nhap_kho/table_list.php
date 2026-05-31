    <?php
// views/components/Admin/nhap_kho/table_list.php
?>
<div class="overflow-x-auto w-full">
    <table class="w-full text-left border-collapse min-w-[1400px]">
        <thead>
            <tr class="bg-gray-50 border-y border-gray-200 text-[11px] uppercase text-gray-500 tracking-wider">
                <th class="py-3 px-4 font-semibold w-12 text-center">
                    <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                </th>
                <th class="py-3 px-4 font-semibold w-36">Mã phiếu</th>
                <th class="py-3 px-4 font-semibold w-56">Nhà cung cấp</th>
                <th class="py-3 px-4 font-semibold w-40">Kho nhập</th>
                <th class="py-3 px-4 font-semibold text-right w-40">Tổng giá trị</th>
                <th class="py-3 px-4 font-semibold w-40 text-center">Thanh toán</th>
                <th class="py-3 px-4 font-semibold w-36 text-center">Trạng thái</th>
                <th class="py-3 px-4 font-semibold w-32">Ngày tạo</th>
                <th class="py-3 px-4 font-semibold text-right w-24">Thao tác</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            <?php if (!empty($danhSachPhieuNhap)): ?>
                <?php foreach ($danhSachPhieuNhap as $phieu): ?>
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="py-3 px-4 text-center">
                        <input type="checkbox" class="row-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" value="<?= $phieu['id'] ?>">
                    </td>
                    
                    <!-- Mã phiếu -->
                    <td class="py-3 px-4">
                        <a href="<?= APP_URL ?>/admin/nhap-kho/chi-tiet/<?= $phieu['id'] ?>" class="font-bold text-[#6B0D18] hover:underline block mb-0.5"><?= htmlspecialchars($phieu['ma_phieu']) ?></a>
                        <?php if(!empty($phieu['muc_do_uu_tien']) && $phieu['muc_do_uu_tien'] == 1): ?>
                            <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-700 tooltip" title="Cần xử lý gấp">GẤP</span>
                        <?php endif; ?>
                    </td>

                    <!-- Nhà cung cấp -->
                    <td class="py-3 px-4">
                        <?php if(!empty($phieu['ncc'])): ?>
                            <div class="font-semibold text-gray-900 text-sm truncate w-52"><?= htmlspecialchars($phieu['ncc']) ?></div>
                        <?php elseif(!empty($phieu['id_nha_cung_cap'])): ?>
                            <div class="font-semibold text-gray-900 text-sm truncate w-52">NCC ID: <?= $phieu['id_nha_cung_cap'] ?></div>
                        <?php else: ?>
                            <div class="font-semibold text-gray-900 text-sm truncate w-52 text-gray-400 italic">Khác</div>
                        <?php endif; ?>
                        <div class="text-xs text-gray-500 mt-0.5"><?= htmlspecialchars($phieu['ly_do'] ?? 'Nhập hàng') ?></div>
                    </td>

                    <!-- Kho nhập -->
                    <td class="py-3 px-4">
                        <?php if(!empty($phieu['danh_sach_kho'])): ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200" title="<?= htmlspecialchars($phieu['danh_sach_kho']) ?>">
                                <?= htmlspecialchars(mb_strlen($phieu['danh_sach_kho']) > 20 ? mb_substr($phieu['danh_sach_kho'], 0, 20) . '...' : $phieu['danh_sach_kho']) ?>
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-gray-100 text-gray-700 border border-gray-200">
                                Chưa phân kho
                            </span>
                        <?php endif; ?>
                    </td>

                    <!-- Tổng giá trị -->
                    <td class="py-3 px-4 text-right">
                        <?php if($phieu['tong_tien'] > 0): ?>
                            <div class="text-sm font-bold text-[#6B0D18]"><?= number_format($phieu['tong_tien'], 0, ',', '.') ?>đ</div>
                        <?php else: ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-amber-50 text-amber-700">0đ</span>
                        <?php endif; ?>
                    </td>

                    <!-- Thanh toán -->
                    <td class="py-3 px-4 text-center">
                        <?php if($phieu['thanh_toan'] === 'Đã thanh toán'): ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">Đã thanh toán</span>
                        <?php elseif($phieu['thanh_toan'] === 'Thanh toán một phần'): ?>
                            <div class="flex flex-col items-center">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-orange-50 text-orange-700 border border-orange-200"><?= $phieu['thanh_toan'] ?></span>
                                <span class="text-[10px] text-red-600 font-bold mt-0.5 border-t border-dashed border-red-200 pt-0.5">Nợ: <?= number_format($phieu['tien_no'], 0, ',', '.') ?>đ</span>
                            </div>
                        <?php else: ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-gray-100 text-gray-600 border border-gray-200">Chưa thanh toán</span>
                        <?php endif; ?>
                    </td>

                    <!-- Trạng thái -->
                    <td class="py-3 px-4 text-center">
                        <?php
                            $badgeClass = '';
                            if ($phieu['trang_thai'] == 0) $badgeClass = 'bg-gray-100 text-gray-700 border border-gray-200';
                            elseif ($phieu['trang_thai'] == 1) $badgeClass = 'bg-yellow-50 text-yellow-700 border border-yellow-200';
                            elseif ($phieu['trang_thai'] == 2) $badgeClass = 'bg-blue-50 text-blue-700 border border-blue-200';
                            elseif ($phieu['trang_thai'] == 3) $badgeClass = 'bg-emerald-50 text-emerald-700 border border-emerald-200';
                            elseif ($phieu['trang_thai'] == 4) $badgeClass = 'bg-gray-100 text-gray-500 border border-gray-200';
                        ?>
                        <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-md text-[11px] font-bold <?= $badgeClass ?> w-28 text-center">
                            <?= $phieu['status_text'] ?>
                        </span>
                    </td>

                    <!-- Ngày tạo -->
                    <td class="py-3 px-4">
                        <div class="text-sm font-medium text-gray-900"><?= date('d/m/Y', strtotime($phieu['ngay_tao'])) ?></div>
                        <div class="text-xs text-gray-500"><?= date('H:i', strtotime($phieu['ngay_tao'])) ?></div>
                    </td>

                    <!-- Thao tác -->
                    <td class="py-3 px-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <!-- Dropdown Menu chứa tất cả thao tác -->
                            <div class="relative inline-block text-left dropdown-container">
                                <button type="button" class="w-8 h-8 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-colors focus:outline-none" onclick="toggleDropdown(this)">
                                    <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                </button>
                                <div class="dropdown-menu hidden absolute right-0 z-20 mt-1 w-48 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none border border-gray-100 overflow-hidden">
                                    <div class="py-1">
                                        <!-- Xem chi tiết luôn có -->
                                        <a href="<?= APP_URL ?>/admin/nhap-kho/chi-tiet/<?= $phieu['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                            <span class="iconify text-lg text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết
                                        </a>

                                        <!-- Actions based on status -->
                                        <?php if($phieu['trang_thai'] == 1): ?>
                                            <a href="javascript:void(0)" onclick="duyetPhieu('<?= $phieu['id'] ?>')" class="flex items-center gap-2 px-4 py-2 text-sm text-amber-600 hover:bg-amber-50 transition-colors font-medium">
                                                <span class="iconify text-lg text-amber-500" data-icon="mdi:shield-check-outline"></span> Duyệt phiếu
                                            </a>
                                        <?php endif; ?>

                                        <?php if($phieu['trang_thai'] == 2): ?>
                                            <a href="<?= APP_URL ?>/admin/nhap-kho/kiem-hang/<?= $phieu['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-blue-700 hover:bg-blue-50 transition-colors font-medium">
                                                <span class="iconify text-lg text-blue-500" data-icon="mdi:clipboard-check-outline"></span> Kiểm hàng
                                            </a>
                                        <?php elseif($phieu['trang_thai'] == 0): ?>
                                            <a href="<?= APP_URL ?>/admin/nhap-kho/sua/<?= $phieu['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors font-medium">
                                                <span class="iconify text-lg text-gray-400" data-icon="mdi:pencil-outline"></span> Tiếp tục sửa
                                            </a>
                                        <?php endif; ?>
                                        
                                        <!-- Ghi nhận thanh toán (nếu có nợ) -->
                                        <?php if($phieu['tien_no'] > 0 && $phieu['trang_thai'] != 4): ?>
                                        <div class="border-t border-gray-100 my-1"></div>
                                        <a href="javascript:void(0)" class="flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50 transition-colors font-medium">
                                            <span class="iconify text-lg" data-icon="mdi:cash-plus"></span> Ghi nhận thanh toán
                                        </a>
                                        <?php endif; ?>

                                        <!-- Hủy phiếu (ẩn nếu đã nhập kho hoặc đã hủy) -->
                                        <?php if($phieu['trang_thai'] != 3 && $phieu['trang_thai'] != 4): ?>
                                        <div class="border-t border-gray-100 my-1"></div>
                                        <a href="javascript:void(0)" onclick="huyPhieu('<?= $phieu['id'] ?>')" class="flex items-center gap-2 px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 transition-colors font-medium">
                                            <span class="iconify text-lg" data-icon="mdi:close-circle-outline"></span> Hủy phiếu
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="py-16 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-24 h-24 mb-4 rounded-full bg-gray-50 flex items-center justify-center border border-dashed border-gray-200">
                                <span class="iconify text-4xl text-gray-300" data-icon="mdi:package-variant-closed"></span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Chưa có phiếu nhập kho nào</h3>
                            <p class="text-sm text-gray-500 mb-6 max-w-sm mx-auto">Hãy tạo phiếu nhập đầu tiên để ghi nhận hàng từ nhà cung cấp và cập nhật tồn kho.</p>
                            <div class="flex items-center gap-3">
                                <a href="<?= APP_URL ?>/admin/nhap-kho/them" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                                    <span class="iconify" data-icon="mdi:plus"></span> Tạo phiếu nhập
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Phân trang -->
<div class="p-4 border-t border-gray-200 bg-white flex flex-col md:flex-row items-center justify-between gap-4 rounded-b-xl">
    <div class="text-sm text-gray-500 text-center md:text-left">
        Hiển thị <span class="font-medium text-gray-900"><?= count($danhSachPhieuNhap) ?></span> trong tổng số <span class="font-medium text-gray-900"><?= $stats['tat_ca'] ?? 0 ?></span> phiếu
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
        
        // Đóng tất cả dropdown khác trước
        document.querySelectorAll('.dropdown-menu').forEach(el => {
            el.classList.add('hidden');
            el.style.position = '';
            el.style.top = '';
            el.style.left = '';
            el.style.right = '';
        });
        
        if (isHidden) {
            // Tính toán vị trí hiển thị dựa trên nút bấm
            const rect = button.getBoundingClientRect();
            menu.classList.remove('hidden');
            menu.style.position = 'fixed';
            menu.style.zIndex = '9999';
            
            // Hiển thị bên trái nút, phía dưới
            const menuWidth = menu.offsetWidth || 192;
            const menuHeight = menu.offsetHeight || 200;
            
            let top = rect.bottom + 4;
            let left = rect.right - menuWidth;
            
            // Đảm bảo không tràn ra ngoài viewport
            if (top + menuHeight > window.innerHeight) {
                top = rect.top - menuHeight - 4;
            }
            if (left < 8) {
                left = 8;
            }
            
            menu.style.top = top + 'px';
            menu.style.left = left + 'px';
            menu.style.right = 'auto';
        }
    }
    
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
    
    // Đóng dropdown khi cuộn bảng
    document.addEventListener('scroll', function() {
        document.querySelectorAll('.dropdown-menu:not(.hidden)').forEach(el => {
            el.classList.add('hidden');
            el.style.position = '';
            el.style.top = '';
            el.style.left = '';
            el.style.right = '';
        });
    }, true);

    async function duyetPhieu(id) {
        if(confirm('Xác nhận duyệt phiếu nhập kho này? Phiếu sẽ được chuyển sang giai đoạn Kiểm hàng.')) {
            try {
                const res = await fetch('<?= APP_URL ?>/admin/nhap-kho/duyet/' + id, { method: 'POST' });
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
        if(confirm('Bạn có chắc chắn muốn hủy phiếu nhập kho này không? (Thao tác này không thể hoàn tác)')) {
            try {
                const res = await fetch('<?= APP_URL ?>/admin/nhap-kho/huy/' + id, { method: 'POST' });
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
