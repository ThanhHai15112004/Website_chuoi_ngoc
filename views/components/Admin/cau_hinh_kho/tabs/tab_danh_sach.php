<?php
// views/components/Admin/cau_hinh_kho/tabs/tab_danh_sach.php
?>
<div class="flex flex-col h-full">
    
    <!-- Thanh công cụ lọc & tìm kiếm -->
    <div class="p-4 border-b border-gray-100 flex flex-col md:flex-row gap-4 justify-between items-start md:items-center bg-gray-50/50">
        <div class="relative w-full md:w-[350px]">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="iconify text-gray-400 text-lg" data-icon="mdi:magnify"></span>
            </div>
            <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] sm:text-sm transition-colors" placeholder="Tên kho, mã kho, người phụ trách...">
        </div>
        
        <div class="flex items-center gap-3 w-full md:w-auto">
            <select class="block w-full md:w-auto pl-3 pr-8 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-md border text-gray-700 bg-white">
                <option value="">Tất cả loại kho</option>
                <option value="tong">Kho tổng</option>
                <option value="online">Kho online</option>
                <option value="cua_hang">Kho cửa hàng</option>
                <option value="loi">Kho lỗi / bảo hành</option>
            </select>
            <select class="block w-full md:w-auto pl-3 pr-8 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-md border text-gray-700 bg-white">
                <option value="">Trạng thái: Tất cả</option>
                <option value="hoat_dong">Đang hoạt động</option>
                <option value="tam_ngung">Tạm ngừng</option>
                <option value="ngung_dung">Ngừng dùng</option>
            </select>
        </div>
    </div>

    <!-- Bảng danh sách kho -->
    <div class="overflow-x-auto w-full">
        <table class="w-full text-left border-collapse min-w-[1200px]">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase text-gray-500 tracking-wider">
                    <th class="py-3 px-4 font-semibold w-64">Mã & Tên kho</th>
                    <th class="py-3 px-4 font-semibold w-40">Loại kho</th>
                    <th class="py-3 px-4 font-semibold w-48">Người phụ trách</th>
                    <th class="py-3 px-4 font-semibold text-center w-32">Khu vực / Kệ</th>
                    <th class="py-3 px-4 font-semibold text-right w-32">Sản phẩm tồn</th>
                    <th class="py-3 px-4 font-semibold text-center w-32">Trạng thái</th>
                    <th class="py-3 px-4 font-semibold text-right w-20">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach ($danhSachKho as $kho): ?>
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        
                        <!-- 1. Cột Tên & Mã -->
                        <td class="py-3 px-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center shrink-0">
                                    <span class="iconify text-xl text-gray-500" data-icon="<?= $kho['loai'] == 'Kho online' ? 'mdi:web' : ($kho['loai'] == 'Kho tổng' ? 'mdi:warehouse' : 'mdi:store-outline') ?>"></span>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-2 mb-0.5">
                                        <a href="javascript:void(0)" onclick="openDrawer('<?= $kho['id'] ?>')" class="font-bold text-gray-900 hover:text-[#6B0D18] transition-colors text-sm"><?= $kho['ten'] ?></a>
                                        <?php if($kho['mac_dinh']): ?>
                                            <span class="bg-red-50 text-[#6B0D18] px-1.5 py-0.5 rounded text-[10px] font-bold border border-red-100 tooltip" title="Kho xuất mặc định cho đơn Online">Mặc định</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-semibold text-[#6B0D18]" title="Mã kho"><?= $kho['id'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- 2. Cột Loại & Mô tả -->
                        <td class="py-3 px-4">
                            <div class="text-sm font-medium text-gray-700"><?= $kho['loai'] ?></div>
                            <div class="text-[11px] text-gray-500 mt-0.5 truncate max-w-[150px]" title="<?= $kho['mo_ta'] ?>"><?= $kho['mo_ta'] ?></div>
                        </td>

                        <!-- 3. Cột Người phụ trách -->
                        <td class="py-3 px-4">
                            <?php if(!empty($kho['nguoi_phu_trach'])): ?>
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold shrink-0">
                                        <?= substr($kho['nguoi_phu_trach'], 0, 1) ?>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-900"><?= $kho['nguoi_phu_trach'] ?></span>
                                        <span class="text-[11px] text-gray-500"><?= $kho['vai_tro_npt'] ?></span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[11px] font-medium bg-amber-50 text-amber-700 border border-amber-200">Chưa gán</span>
                            <?php endif; ?>
                        </td>

                        <!-- 4. Cột Khu vực / Kệ -->
                        <td class="py-3 px-4 text-center">
                            <div class="text-sm font-bold text-gray-900"><?= $kho['so_khu_vuc'] ?> <span class="text-[11px] font-normal text-gray-500">khu</span></div>
                            <button onclick="switchTab('khu_vuc')" class="text-[11px] text-blue-600 hover:text-blue-800 hover:underline mt-0.5"><?= $kho['so_ke'] ?> kệ / ngăn</button>
                        </td>

                        <!-- 5. Cột Sản phẩm & Tồn -->
                        <td class="py-3 px-4 text-right">
                            <div class="text-sm font-bold text-[#6B0D18]"><?= number_format($kho['tong_ton'], 0, ',', '.') ?> <span class="text-[11px] font-normal text-gray-500">món</span></div>
                            <div class="text-[11px] text-gray-500 mt-0.5"><?= $kho['so_san_pham'] ?> mã SP</div>
                        </td>

                        <!-- 6. Cột Trạng thái -->
                        <td class="py-3 px-4 text-center">
                            <?php
                                $badgeClass = '';
                                switch ($kho['trang_thai']) {
                                    case 'Đang hoạt động':
                                        $badgeClass = 'bg-emerald-50 text-emerald-700 border border-emerald-200';
                                        break;
                                    case 'Tạm ngừng':
                                        $badgeClass = 'bg-amber-50 text-amber-700 border border-amber-200';
                                        break;
                                    case 'Ngừng dùng':
                                        $badgeClass = 'bg-gray-100 text-gray-600 border border-gray-200';
                                        break;
                                    case 'Chờ cấu hình':
                                        $badgeClass = 'bg-rose-50 text-rose-700 border border-rose-200';
                                        break;
                                }
                            ?>
                            <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-md text-[11px] font-semibold <?= $badgeClass ?> w-24">
                                <?= $kho['trang_thai'] ?>
                            </span>
                        </td>

                        <!-- 7. Cột Thao tác -->
                        <td class="py-3 px-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <div class="relative inline-block text-left dropdown-container">
                                    <button type="button" class="w-8 h-8 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-500 hover:text-gray-900 transition-colors focus:outline-none" onclick="toggleDropdown(this)">
                                        <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    <div class="dropdown-menu hidden absolute right-0 z-20 mt-1 w-48 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none border border-gray-100 overflow-hidden">
                                        <div class="py-1">
                                            <a href="javascript:void(0)" onclick="openDrawer('<?= $kho['id'] ?>')" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors font-medium">
                                                <span class="iconify text-lg text-blue-500" data-icon="mdi:eye-outline"></span> Xem chi tiết
                                            </a>
                                            <a href="<?= APP_URL ?>/admin/cau-hinh-kho/sua/<?= $kho['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                                <span class="iconify text-lg text-gray-400" data-icon="mdi:pencil-outline"></span> Sửa thông tin
                                            </a>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors" onclick="switchTab('khu_vuc')">
                                                <span class="iconify text-lg text-gray-400" data-icon="mdi:view-grid-plus-outline"></span> Quản lý khu vực
                                            </a>
                                            
                                            <div class="border-t border-gray-100 my-1"></div>
                                            
                                            <?php if(!$kho['mac_dinh']): ?>
                                                <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                                    <span class="iconify text-lg text-emerald-500" data-icon="mdi:star-outline"></span> Đặt làm mặc định
                                                </a>
                                            <?php endif; ?>
                                            
                                            <?php if($kho['trang_thai'] === 'Đang hoạt động'): ?>
                                                <a href="#" onclick="openModal('modalPause')" class="flex items-center gap-2 px-4 py-2 text-sm text-amber-600 hover:bg-amber-50 transition-colors font-medium">
                                                    <span class="iconify text-lg" data-icon="mdi:pause-circle-outline"></span> Tạm ngừng
                                                </a>
                                            <?php endif; ?>
                                            
                                            <a href="#" onclick="openModal('modalDelete')" class="flex items-center gap-2 px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 transition-colors font-medium">
                                                <span class="iconify text-lg" data-icon="mdi:archive-cancel-outline"></span> Ngừng dùng kho
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleDropdown(button) {
        const menu = button.nextElementSibling;
        document.querySelectorAll('.dropdown-menu').forEach(el => {
            if (el !== menu) el.classList.add('hidden');
        });
        menu.classList.toggle('hidden');
    }
    
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(el => {
                el.classList.add('hidden');
            });
        }
    });
</script>
