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
                <th class="py-3 px-4 font-semibold w-48">Sản phẩm</th>
                <th class="py-3 px-4 font-semibold text-right w-32">Số lượng</th>
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
                    <tr class="hover:bg-gray-50/80 transition-colors group" data-status="<?= $phieu['trang_thai'] ?>">
                        <td class="py-3 px-4 text-center">
                        <input type="checkbox" class="row-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" value="<?= $phieu['id'] ?>">
                    </td>
                    
                    <!-- Mã phiếu -->
                    <td class="py-3 px-4">
                        <a href="javascript:void(0)" onclick="openDrawer('<?= $phieu['id'] ?>')" class="font-bold text-[#6B0D18] hover:underline block mb-0.5"><?= $phieu['id'] ?></a>
                        <div class="text-[10px] text-gray-400 flex items-center gap-1">
                            <span class="iconify" data-icon="mdi:content-copy"></span> Copy
                        </div>
                    </td>

                    <!-- Nhà cung cấp -->
                    <td class="py-3 px-4">
                        <div class="font-semibold text-gray-900 text-sm truncate w-52" title="<?= $phieu['ncc'] ?>"><?= $phieu['ncc'] ?></div>
                        <div class="text-xs text-gray-500 mt-0.5"><?= $phieu['ma_ncc'] ?></div>
                    </td>

                    <!-- Kho nhập -->
                    <td class="py-3 px-4">
                        <?php if($phieu['kho']): ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium <?= $phieu['kho_id'] === 'KHO-CK' ? 'bg-yellow-50 text-yellow-700 border border-yellow-200' : 'bg-gray-100 text-gray-700 border border-gray-200' ?>">
                                <?= $phieu['kho'] ?>
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                Chưa chọn kho
                            </span>
                        <?php endif; ?>
                    </td>

                    <!-- Sản phẩm -->
                    <td class="py-3 px-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded bg-gray-100 flex items-center justify-center shrink-0">
                                <span class="iconify text-gray-400" data-icon="mdi:diamond-stone"></span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-gray-900"><?= $phieu['tong_sp'] ?> dòng sản phẩm</span>
                                <?php if($phieu['tong_sp'] > 1): ?>
                                    <span class="text-[11px] text-blue-600 hover:underline cursor-pointer">Xem danh sách</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>

                    <!-- Số lượng -->
                    <td class="py-3 px-4 text-right">
                        <div class="text-sm font-bold text-gray-900"><?= number_format($phieu['so_luong'], 0, ',', '.') ?> <span class="text-[10px] font-normal text-gray-500">món</span></div>
                        <?php if($phieu['trang_thai'] === 'Đã nhập kho' || $phieu['trang_thai'] === 'Có lỗi / thiếu hàng' || $phieu['trang_thai'] === 'Chờ duyệt'): ?>
                            <div class="text-[11px] mt-0.5">
                                <?php if($phieu['loi_thieu'] > 0): ?>
                                    <span class="text-rose-600 font-medium">Thiếu/Lỗi: <?= $phieu['loi_thieu'] ?></span>
                                <?php else: ?>
                                    <span class="text-emerald-600">Nhận đủ: <?= $phieu['so_luong_nhan'] ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </td>

                    <!-- Tổng giá trị -->
                    <td class="py-3 px-4 text-right">
                        <?php if($phieu['tong_tien'] > 0): ?>
                            <div class="text-sm font-bold text-[#6B0D18]"><?= number_format($phieu['tong_tien'], 0, ',', '.') ?>đ</div>
                        <?php else: ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-amber-50 text-amber-700">Chưa có giá</span>
                        <?php endif; ?>
                    </td>

                    <!-- Thanh toán -->
                    <td class="py-3 px-4 text-center">
                        <?php if($phieu['thanh_toan'] === 'Đã thanh toán'): ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">Đã thanh toán</span>
                        <?php elseif($phieu['thanh_toan'] === 'Công nợ' || $phieu['thanh_toan'] === 'Thanh toán một phần'): ?>
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
                            switch ($phieu['trang_thai']) {
                                case 'Nháp':
                                    $badgeClass = 'bg-gray-100 text-gray-700 border border-gray-200';
                                    break;
                                case 'Chờ kiểm hàng':
                                    $badgeClass = 'bg-yellow-50 text-yellow-700 border border-yellow-200';
                                    break;
                                case 'Đang kiểm hàng':
                                    $badgeClass = 'bg-blue-50 text-blue-700 border border-blue-200';
                                    break;
                                case 'Chờ duyệt':
                                    $badgeClass = 'bg-orange-50 text-orange-700 border border-orange-200';
                                    break;
                                case 'Đã nhập kho':
                                    $badgeClass = 'bg-emerald-50 text-emerald-700 border border-emerald-200';
                                    break;
                                case 'Có lỗi / thiếu hàng':
                                    $badgeClass = 'bg-rose-50 text-rose-700 border border-rose-200';
                                    break;
                                case 'Đã hủy':
                                    $badgeClass = 'bg-gray-100 text-gray-500 border border-gray-200';
                                    break;
                            }
                        ?>
                        <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-md text-[11px] font-bold <?= $badgeClass ?> w-28 text-center">
                            <?= $phieu['trang_thai'] ?>
                        </span>
                    </td>

                    <!-- Ngày tạo -->
                    <td class="py-3 px-4">
                        <div class="text-sm font-medium text-gray-900"><?= explode(' ', $phieu['ngay_tao'])[0] ?></div>
                        <div class="text-xs text-gray-500"><?= explode(' ', $phieu['ngay_tao'])[1] ?></div>
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
                                        <a href="javascript:void(0)" onclick="openDrawer('<?= $phieu['id'] ?>')" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                            <span class="iconify text-lg text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết
                                        </a>

                                        <?php if($phieu['trang_thai'] === 'Chờ kiểm hàng' || $phieu['trang_thai'] === 'Đang kiểm hàng'): ?>
                                            <a href="<?= APP_URL ?>/admin/nhap-kho/kiem-hang/<?= $phieu['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-blue-700 hover:bg-blue-50 transition-colors font-medium">
                                                <span class="iconify text-lg text-blue-500" data-icon="mdi:clipboard-check-outline"></span> Kiểm hàng
                                            </a>
                                            <a href="<?= APP_URL ?>/admin/nhap-kho/sua/<?= $phieu['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                                <span class="iconify text-lg text-gray-400" data-icon="mdi:pencil-outline"></span> Sửa thông tin
                                            </a>
                                        <?php elseif($phieu['trang_thai'] === 'Chờ duyệt' || $phieu['trang_thai'] === 'Có lỗi / thiếu hàng'): ?>
                                            <a href="javascript:void(0)" onclick="openModal('modalDuyetPhieu')" class="flex items-center gap-2 px-4 py-2 text-sm text-orange-700 hover:bg-orange-50 transition-colors font-medium">
                                                <span class="iconify text-lg text-orange-500" data-icon="mdi:check-decagram-outline"></span> Duyệt phiếu
                                            </a>
                                        <?php elseif($phieu['trang_thai'] === 'Nháp'): ?>
                                            <a href="<?= APP_URL ?>/admin/nhap-kho/sua/<?= $phieu['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors font-medium">
                                                <span class="iconify text-lg text-gray-400" data-icon="mdi:pencil-outline"></span> Tiếp tục sửa
                                            </a>
                                        <?php endif; ?>

                                        <!-- In phiếu -->
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                            <span class="iconify text-lg text-gray-400" data-icon="mdi:printer-outline"></span> In phiếu
                                        </a>
                                        
                                        <!-- Ghi nhận thanh toán (nếu có nợ) -->
                                        <?php if($phieu['tien_no'] > 0 && $phieu['trang_thai'] !== 'Đã hủy'): ?>
                                        <div class="border-t border-gray-100 my-1"></div>
                                        <a href="#" onclick="openModal('modalThanhToan')" class="flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50 transition-colors font-medium">
                                            <span class="iconify text-lg" data-icon="mdi:cash-plus"></span> Ghi nhận thanh toán
                                        </a>
                                        <?php endif; ?>

                                        <!-- Hủy phiếu (ẩn nếu đã nhập kho hoặc đã hủy) -->
                                        <?php if($phieu['trang_thai'] !== 'Đã nhập kho' && $phieu['trang_thai'] !== 'Đã hủy'): ?>
                                        <div class="border-t border-gray-100 my-1"></div>
                                        <a href="#" onclick="openModal('modalHuyPhieu')" class="flex items-center gap-2 px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 transition-colors font-medium">
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
                    <td colspan="11" class="py-16 text-center">
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
<div class="p-4 border-t border-gray-200 bg-white flex items-center justify-between rounded-b-xl">
    <div class="text-sm text-gray-500">
        Hiển thị <span class="font-medium text-gray-900">1</span> đến <span class="font-medium text-gray-900">7</span> trong số <span class="font-medium text-gray-900">186</span> phiếu
    </div>
    <div class="flex items-center gap-1">
        <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 bg-gray-50 cursor-not-allowed">Trước</button>
        <button class="px-3 py-1.5 border border-[#6B0D18] rounded-lg text-sm font-medium text-white bg-[#6B0D18]">1</button>
        <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">2</button>
        <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">3</button>
        <span class="px-2 text-gray-500">...</span>
        <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">Tiếp</button>
    </div>
</div>

<script>
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
</script>
