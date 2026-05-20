<?php
// views/pages/admin_san_pham_chi_tiet.php
?>
<div class="space-y-6">
    <!-- Breadcrumb & Header -->
    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                <a href="<?= APP_URL ?>/admin/san-pham" class="hover:text-[#6B0D18] transition-colors flex items-center gap-1">
                    <span class="iconify text-base" data-icon="mdi:arrow-left"></span>
                    Danh sách sản phẩm
                </a>
                <span>/</span>
                <span class="text-gray-900 font-medium">Chi tiết sản phẩm</span>
            </div>
            <div class="flex items-center gap-3">
                <h2 class="text-2xl font-bold text-gray-900 font-luxury"><?= $san_pham['ten_sp'] ?></h2>
                <?php 
                    $tt = $san_pham['trang_thai'];
                    $ttClass = 'bg-gray-100 text-gray-700 border-gray-200';
                    if ($tt === 'Đang hiển thị') $ttClass = 'bg-emerald-50 text-emerald-700 border-emerald-200';
                    if ($tt === 'Đang ẩn') $ttClass = 'bg-gray-100 text-gray-600 border-gray-200';
                ?>
                <span class="text-xs font-bold px-2.5 py-1 rounded-md border <?= $ttClass ?> uppercase tracking-wide">
                    <?= $tt ?>
                </span>
            </div>
            <p class="text-sm text-gray-500 mt-1 font-mono">Mã SP: <?= $san_pham['ma_sp'] ?> &bull; Cập nhật lần cuối: <?= $san_pham['ngay_cap_nhat'] ?></p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg text-gray-500" data-icon="mdi:ticket-percent-outline"></span>
                Tạo khuyến mãi
            </button>
            <button class="flex items-center gap-2 px-4 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                Chỉnh sửa
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Cột Trái (2/3) -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Gallery & Basic Info -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100 flex flex-col md:flex-row gap-6">
                <!-- Hình ảnh -->
                <div class="w-full md:w-5/12 flex flex-col gap-3">
                    <div class="aspect-square rounded-[18px] bg-gray-50 border border-gray-100 overflow-hidden relative group">
                        <img src="<?= $san_pham['anh_chinh'] ?>" alt="<?= $san_pham['ten_sp'] ?>" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-gray-900 shadow-lg hover:scale-110 transition-transform">
                                <span class="iconify" data-icon="mdi:magnify-plus-outline"></span>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 overflow-x-auto pb-1 custom-scrollbar">
                        <div class="w-16 h-16 rounded-xl border-2 border-[#6B0D18] flex-shrink-0 cursor-pointer overflow-hidden p-0.5">
                            <img src="<?= $san_pham['anh_chinh'] ?>" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <?php foreach($san_pham['anh_phu'] as $anh): ?>
                        <div class="w-16 h-16 rounded-xl border border-gray-200 flex-shrink-0 cursor-pointer overflow-hidden opacity-70 hover:opacity-100 transition-opacity">
                            <img src="<?= $anh ?>" class="w-full h-full object-cover">
                        </div>
                        <?php endforeach; ?>
                        <div class="w-16 h-16 rounded-xl border border-dashed border-gray-300 flex items-center justify-center text-gray-400 hover:text-[#6B0D18] hover:border-[#6B0D18] hover:bg-red-50 flex-shrink-0 cursor-pointer transition-colors">
                            <span class="iconify text-2xl" data-icon="mdi:plus"></span>
                        </div>
                    </div>
                </div>

                <!-- Thông tin -->
                <div class="w-full md:w-7/12 flex flex-col">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Phân loại & Thuộc tính</h3>
                    
                    <div class="space-y-4">
                        <div class="grid grid-cols-3 gap-2 text-sm">
                            <span class="text-gray-500">Danh mục</span>
                            <span class="col-span-2 font-medium text-gray-900">
                                <a href="#" class="hover:text-[#6B0D18] underline decoration-gray-300 underline-offset-2"><?= $san_pham['danh_muc'] ?></a>
                            </span>
                        </div>
                        <div class="grid grid-cols-3 gap-2 text-sm">
                            <span class="text-gray-500">Loại đá</span>
                            <span class="col-span-2 font-medium text-gray-900 flex items-center gap-1.5">
                                <span class="iconify text-gray-400" data-icon="mdi:diamond-stone"></span>
                                <?= $san_pham['loai_da'] ?>
                            </span>
                        </div>
                        <div class="grid grid-cols-3 gap-2 text-sm items-center">
                            <span class="text-gray-500">Mệnh phù hợp</span>
                            <div class="col-span-2 flex flex-wrap gap-1.5">
                                <?php foreach($san_pham['menh'] as $m): ?>
                                    <span class="text-[11px] font-bold bg-[#FAF8F5] text-[#6B0D18] border border-[#E4D5C3]/50 px-2 py-0.5 rounded uppercase">
                                        <?= $m ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2 text-sm">
                            <span class="text-gray-500">Mô tả ngắn</span>
                            <span class="col-span-2 text-gray-700 italic">"<?= $san_pham['mo_ta_ngan'] ?>"</span>
                        </div>
                        <div class="grid grid-cols-3 gap-2 text-sm">
                            <span class="text-gray-500">Ngày tạo</span>
                            <span class="col-span-2 text-gray-900"><?= $san_pham['ngay_tao'] ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bài viết mô tả chi tiết -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4 border-b border-gray-100 pb-3">
                    <h3 class="text-lg font-bold text-gray-900">Mô tả chi tiết (Bài viết)</h3>
                    <button class="text-sm font-medium text-[#6B0D18] hover:underline flex items-center gap-1">
                        Sửa bài viết <span class="iconify" data-icon="mdi:pencil-outline"></span>
                    </button>
                </div>
                <div class="prose prose-sm max-w-none text-gray-700 prose-p:leading-relaxed">
                    <?= $san_pham['mo_ta_chi_tiet'] ?>
                </div>
            </div>

        </div>

        <!-- Cột Phải (1/3) -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Doanh thu & Giá -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Giá & Doanh thu</h3>
                
                <div class="space-y-4">
                    <div class="bg-[#FAF8F5] rounded-xl p-4 border border-[#E4D5C3]/30">
                        <div class="text-xs text-gray-500 uppercase tracking-wider font-medium mb-1">Giá khuyến mãi hiện tại</div>
                        <div class="text-2xl font-bold text-[#6B0D18] font-luxury"><?= number_format($san_pham['gia_khuyen_mai'], 0, ',', '.') ?>đ</div>
                        <div class="text-sm text-gray-400 line-through mt-0.5">Giá gốc: <?= number_format($san_pham['gia_ban'], 0, ',', '.') ?>đ</div>
                    </div>

                    <div class="flex justify-between items-center py-2 border-b border-dashed border-gray-200">
                        <span class="text-sm text-gray-500">Đã bán</span>
                        <span class="font-bold text-gray-900 text-base"><?= number_format($san_pham['da_ban']) ?> <span class="text-xs font-normal text-gray-500">sản phẩm</span></span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-dashed border-gray-200">
                        <span class="text-sm text-gray-500">Doanh thu tạm tính</span>
                        <span class="font-bold text-green-600 text-base"><?= number_format($san_pham['doanh_thu'], 0, ',', '.') ?>đ</span>
                    </div>
                </div>
            </div>

            <!-- Tồn kho & Phân loại -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4 border-b border-gray-100 pb-3">
                    <h3 class="text-base font-bold text-gray-900">Quản lý kho & Biến thể</h3>
                    <button class="text-[#6B0D18] hover:bg-red-50 p-1.5 rounded-lg transition-colors" title="Nhập kho nhanh">
                        <span class="iconify text-lg" data-icon="mdi:package-down"></span>
                    </button>
                </div>
                
                <div class="mb-5 flex items-center justify-between bg-gray-50 p-3 rounded-xl border border-gray-100">
                    <span class="text-sm text-gray-700 font-medium">Tổng tồn kho:</span>
                    <div class="flex items-center gap-2">
                        <span class="text-xl font-bold text-gray-900"><?= $san_pham['ton_kho'] ?></span>
                        <span class="text-[10px] font-bold bg-green-100 text-green-700 px-1.5 py-0.5 rounded uppercase">Còn hàng</span>
                    </div>
                </div>

                <!-- Bảng biến thể -->
                <div class="space-y-3">
                    <h4 class="text-sm font-bold text-gray-700">Các phiên bản (Kích thước)</h4>
                    <?php foreach($san_pham['bien_the'] as $bt): ?>
                        <div class="flex items-center justify-between p-3 rounded-xl border border-gray-100 hover:border-[#6B0D18]/30 transition-colors group cursor-pointer">
                            <div>
                                <div class="font-medium text-gray-900 text-sm group-hover:text-[#6B0D18] transition-colors"><?= $bt['ten'] ?></div>
                                <div class="text-xs text-gray-500 mt-0.5"><?= number_format($bt['gia_ban'], 0, ',', '.') ?>đ &bull; Đã bán: <?= $bt['da_ban'] ?></div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-bold <?= $bt['ton_kho'] > 5 ? 'text-gray-900' : 'text-orange-500' ?>"><?= $bt['ton_kho'] ?></div>
                                <div class="text-[10px] text-gray-400">Tồn kho</div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Tabs: Đánh giá & Lịch sử kho -->
    <div class="bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden" x-data="{ tab: 'danh_gia' }">
        <div class="flex border-b border-gray-100">
            <button @click="tab = 'danh_gia'" class="px-6 py-4 text-sm font-medium transition-colors relative" :class="tab === 'danh_gia' ? 'text-[#6B0D18]' : 'text-gray-500 hover:text-gray-900'">
                Đánh giá khách hàng (<?= count($danh_gia) ?>)
                <div class="absolute bottom-0 left-0 w-full h-0.5 bg-[#6B0D18]" x-show="tab === 'danh_gia'"></div>
            </button>
            <button @click="tab = 'lich_su'" class="px-6 py-4 text-sm font-medium transition-colors relative" :class="tab === 'lich_su' ? 'text-[#6B0D18]' : 'text-gray-500 hover:text-gray-900'">
                Lịch sử nhập / xuất kho
                <div class="absolute bottom-0 left-0 w-full h-0.5 bg-[#6B0D18]" x-show="tab === 'lich_su'"></div>
            </button>
        </div>

        <div class="p-6">
            <!-- Tab Đánh giá -->
            <div x-show="tab === 'danh_gia'" class="space-y-4">
                <?php foreach($danh_gia as $dg): ?>
                    <div class="p-4 border border-gray-100 rounded-xl bg-gray-50/50 hover:bg-gray-50 transition-colors">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#E4D5C3] to-[#C5A880] text-white flex items-center justify-center font-bold text-xs uppercase">
                                    <?= substr($dg['khach_hang'], 0, 1) ?>
                                </div>
                                <div>
                                    <div class="font-medium text-sm text-gray-900"><?= $dg['khach_hang'] ?></div>
                                    <div class="text-[11px] text-gray-400"><?= $dg['ngay'] ?></div>
                                </div>
                            </div>
                            <div class="flex text-yellow-400 text-sm">
                                <?php for($i=1; $i<=5; $i++): ?>
                                    <span class="iconify <?= $i <= $dg['so_sao'] ? '' : 'text-gray-300' ?>" data-icon="mdi:star"></span>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 pl-10"><?= $dg['noi_dung'] ?></p>
                        <div class="pl-10 mt-2">
                            <button class="text-xs text-[#6B0D18] font-medium hover:underline">Phản hồi</button>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="text-center mt-4">
                    <button class="text-sm text-gray-600 hover:text-[#6B0D18] font-medium transition-colors border border-gray-200 hover:border-[#6B0D18] px-4 py-2 rounded-lg bg-white">Xem tất cả đánh giá</button>
                </div>
            </div>

            <!-- Tab Lịch sử kho -->
            <div x-show="tab === 'lich_su'" style="display: none;">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="text-gray-500 uppercase tracking-wider text-[11px] font-bold border-b border-gray-100">
                                <th class="pb-3 w-32">Ngày giờ</th>
                                <th class="pb-3 w-24 text-center">Loại</th>
                                <th class="pb-3 w-24 text-center">Số lượng</th>
                                <th class="pb-3">Ghi chú</th>
                                <th class="pb-3 w-32">Người thực hiện</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php foreach($lich_su_kho as $ls): ?>
                                <tr class="hover:bg-gray-50/50">
                                    <td class="py-3 text-gray-500 text-xs"><?= $ls['ngay'] ?></td>
                                    <td class="py-3 text-center">
                                        <?php 
                                            $loaiClass = 'bg-gray-100 text-gray-600';
                                            if ($ls['loai'] === 'Nhập') $loaiClass = 'bg-green-50 text-green-700';
                                            if ($ls['loai'] === 'Xuất') $loaiClass = 'bg-orange-50 text-orange-700';
                                            if ($ls['loai'] === 'Cập nhật') $loaiClass = 'bg-blue-50 text-blue-700';
                                        ?>
                                        <span class="text-[10px] font-bold px-2 py-0.5 rounded <?= $loaiClass ?> uppercase"><?= $ls['loai'] ?></span>
                                    </td>
                                    <td class="py-3 text-center font-bold <?= strpos($ls['so_luong'], '+') !== false ? 'text-green-600' : (strpos($ls['so_luong'], '-') !== false ? 'text-orange-500' : 'text-blue-600') ?>">
                                        <?= $ls['so_luong'] ?>
                                    </td>
                                    <td class="py-3 text-gray-700 text-xs"><?= $ls['ghi_chu'] ?></td>
                                    <td class="py-3 text-gray-900 font-medium text-xs">
                                        <div class="flex items-center gap-1.5">
                                            <span class="iconify text-gray-400" data-icon="<?= $ls['nguoi_thuc_hien'] === 'Hệ thống' ? 'mdi:robot-outline' : 'mdi:account-circle-outline' ?>"></span>
                                            <?= $ls['nguoi_thuc_hien'] ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Thêm Alpine.js cho trang này nếu chưa có trong layout -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
