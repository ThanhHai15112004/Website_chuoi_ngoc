<?php
// views/pages/admin_destiny.php
$destinies = $destinies ?? [];
?>
<div class="animate-[fadeInPage_0.3s_ease-out] max-w-7xl mx-auto pb-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Mệnh phong thủy</h2>
            <p class="text-sm text-gray-500 mt-1">Quản lý thông tin ngũ hành, màu sắc, loại đá và sản phẩm gợi ý theo từng bản mệnh.</p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:refresh"></span> Làm mới
            </button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm flex items-center gap-2 shadow-md">
                <span class="iconify" data-icon="mdi:export-variant"></span> Xuất danh sách
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-[#6B0D18]"><span class="iconify text-lg" data-icon="mdi:yin-yang"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Tổng mệnh</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800">5 mệnh</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600"><span class="iconify text-lg" data-icon="mdi:eye-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Đang hiển thị</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800">5 mệnh</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600"><span class="iconify text-lg" data-icon="mdi:diamond-stone"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Loại đá liên kết</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800">32 loại</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-purple-50 flex items-center justify-center text-purple-600"><span class="iconify text-lg" data-icon="mdi:package-variant-closed"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Sản phẩm gắn mệnh</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800">186 SP</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-amber-50 flex items-center justify-center text-amber-600"><span class="iconify text-lg" data-icon="mdi:calendar-account-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Năm sinh cấu hình</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800">80 năm</p>
        </div>
        <div class="bg-amber-50 rounded-xl shadow-sm border border-amber-200 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center text-amber-700"><span class="iconify text-lg" data-icon="mdi:alert-circle-outline"></span></div>
                <h3 class="text-xs font-bold text-amber-700 uppercase tracking-wider">Cần bổ sung</h3>
            </div>
            <p class="text-2xl font-bold text-amber-800">1 mệnh</p>
        </div>
    </div>

    <!-- Khối tổng quan ngũ hành -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
        <?php foreach ($destinies as $d): ?>
            <a href="<?= APP_URL ?>/admin/menh-phong-thuy/sua" class="block bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:border-[#6B0D18] hover:shadow-md transition-all group relative">
                <?php if ($d['trang_thai'] === 2): ?>
                    <span class="absolute -top-2 -right-2 bg-amber-100 text-amber-700 text-[10px] font-bold px-2 py-0.5 rounded-full border border-amber-200">Cần bổ sung</span>
                <?php endif; ?>
                <div class="flex items-center gap-2 mb-3">
                    <span class="w-3 h-3 rounded-full" style="background-color: <?= $d['mau_dai_dien'] ?>; box-shadow: 0 0 0 1px rgba(0,0,0,0.1)"></span>
                    <h4 class="font-bold text-gray-800 group-hover:text-[#6B0D18] transition-colors"><?= $d['ten'] ?></h4>
                </div>
                <div class="space-y-1.5">
                    <p class="text-xs text-gray-500"><span class="font-medium text-gray-700">Màu hợp:</span> <span class="truncate"><?= implode(', ', array_slice($d['mau_hop'], 0, 2)) ?>...</span></p>
                    <div class="flex items-center justify-between text-xs text-gray-500 mt-2">
                        <span class="flex items-center gap-1"><span class="iconify text-gray-400" data-icon="mdi:diamond-stone"></span> <?= $d['da_hop_count'] ?> đá</span>
                        <span class="flex items-center gap-1"><span class="iconify text-gray-400" data-icon="mdi:package-variant-closed"></span> <?= $d['so_san_pham'] ?> SP</span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="relative w-full md:w-96 shrink-0">
            <input type="text" placeholder="Tìm theo tên mệnh, màu sắc, loại đá, năm sinh..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-shadow">
            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
        </div>
        <div class="flex items-center gap-3 overflow-x-auto pb-1 md:pb-0 scrollbar-hide">
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Tất cả trạng thái</option>
                <option value="1">Đang hiển thị</option>
                <option value="0">Đang ẩn</option>
                <option value="2">Cần bổ sung</option>
            </select>
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Tất cả dữ liệu</option>
                <option value="has_product">Có sản phẩm</option>
                <option value="no_product">Chưa có SP</option>
                <option value="no_stone">Chưa gắn đá</option>
            </select>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1200px]">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-[220px]">Tên mệnh</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Màu đại diện</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Màu phù hợp / kỵ</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Đá / Ngọc liên kết</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Gợi ý & SP</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Trạng thái</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider w-[120px]">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($destinies as $index => $item): ?>
                    <tr class="hover:bg-red-50/20 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center border border-gray-200/60 shadow-sm" style="background-color: <?= $item['mau_dai_dien'] ?>20">
                                    <span class="iconify text-xl" style="color: <?= $item['mau_dai_dien'] ?>" data-icon="mdi:yin-yang"></span>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-gray-800 cursor-pointer hover:text-[#6B0D18]" onclick="openDestinyDrawer()"><?= $item['ten'] ?></h4>
                                    <p class="text-xs text-gray-500 mt-0.5 truncate max-w-[140px]" title="<?= $item['mo_ta'] ?>"><?= $item['mo_ta'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full" style="background-color: <?= $item['mau_dai_dien'] ?>; box-shadow: 0 0 0 1px rgba(0,0,0,0.1)"></span>
                                <span class="text-sm text-gray-700 font-medium"><?= $item['ten_mau_dai_dien'] ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4 space-y-2">
                            <!-- Màu hợp -->
                            <div class="flex flex-wrap gap-1.5">
                                <span class="text-[10px] font-bold text-emerald-600 uppercase w-8 flex-shrink-0 mt-0.5">Hợp:</span>
                                <?php foreach (array_slice($item['mau_hop'], 0, 3) as $m): ?>
                                    <span class="px-2 py-0.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-600"><?= $m ?></span>
                                <?php endforeach; ?>
                                <?php if (count($item['mau_hop']) > 3): ?>
                                    <span class="px-1.5 py-0.5 bg-gray-100 rounded text-[10px] text-gray-500">+<?= count($item['mau_hop']) - 3 ?></span>
                                <?php endif; ?>
                            </div>
                            <!-- Màu kỵ -->
                            <div class="flex flex-wrap gap-1.5">
                                <span class="text-[10px] font-bold text-red-500 uppercase w-8 flex-shrink-0 mt-0.5">Kỵ:</span>
                                <?php foreach ($item['mau_ky'] as $m): ?>
                                    <span class="px-2 py-0.5 bg-red-50/50 border border-red-100 rounded text-xs text-red-600"><?= $m ?></span>
                                <?php endforeach; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-1.5">
                                <?php foreach (array_slice($item['da_hop'], 0, 2) as $da): ?>
                                    <span class="px-2.5 py-1 bg-white border border-gray-200 rounded-full text-xs text-gray-700 font-medium shadow-sm"><?= $da ?></span>
                                <?php endforeach; ?>
                                <?php if (count($item['da_hop']) > 2): ?>
                                    <span class="px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-full text-[10px] text-gray-500 font-bold">+<?= $item['da_hop_count'] - 2 ?> loại</span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4 text-sm">
                                <div class="text-gray-600 cursor-pointer hover:text-[#6B0D18] flex flex-col group/info">
                                    <span class="font-bold text-gray-800 group-hover/info:text-[#6B0D18]"><?= $item['so_san_pham'] ?></span>
                                    <span class="text-[10px] text-gray-400">Sản phẩm</span>
                                </div>
                                <div class="w-px h-6 bg-gray-200"></div>
                                <div class="text-gray-600 cursor-pointer hover:text-[#6B0D18] flex flex-col group/info">
                                    <span class="font-bold text-gray-800 group-hover/info:text-[#6B0D18]"><?= $item['so_nam_sinh'] ?></span>
                                    <span class="text-[10px] text-gray-400">Năm sinh</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <?php if ($item['trang_thai'] === 1): ?>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700 text-xs font-medium border border-emerald-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Hiển thị
                                </span>
                            <?php elseif ($item['trang_thai'] === 0): ?>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 text-xs font-medium border border-gray-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                    Đang ẩn
                                </span>
                            <?php elseif ($item['trang_thai'] === 2): ?>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-amber-50 text-amber-700 text-xs font-medium border border-amber-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                    Cần bổ sung
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="<?= APP_URL ?>/admin/menh-phong-thuy/sua" class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-[#6B0D18] hover:bg-red-50 transition-colors" title="Chỉnh sửa">
                                    <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                </a>
                                <div class="relative">
                                    <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-gray-700 hover:bg-gray-100 transition-colors" onclick="toggleActionMenu(this)" title="Thêm thao tác">
                                        <span class="iconify text-xl" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    <div class="absolute right-0 mt-1 w-48 bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.1)] border border-gray-100 py-2 hidden z-50 transform origin-top-right transition-all">
                                        <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2" onclick="openDestinyDrawer()"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết</button>
                                        <a href="<?= APP_URL ?>/admin/menh-phong-thuy/sua" class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2"><span class="iconify text-gray-400" data-icon="mdi:calendar-account-outline"></span> Quản lý năm sinh</a>
                                        <div class="h-px bg-gray-100 my-1"></div>
                                        <?php if ($item['trang_thai'] === 1): ?>
                                            <button class="w-full px-4 py-2 text-left text-sm text-amber-600 hover:bg-amber-50 flex items-center gap-2" onclick="openToggleModal('<?= $item['ten'] ?>', <?= $item['so_san_pham'] ?>, 'hide')"><span class="iconify" data-icon="mdi:eye-off-outline"></span> Ẩn mệnh này</button>
                                        <?php else: ?>
                                            <button class="w-full px-4 py-2 text-left text-sm text-emerald-600 hover:bg-emerald-50 flex items-center gap-2" onclick="openToggleModal('<?= $item['ten'] ?>', <?= $item['so_san_pham'] ?>, 'show')"><span class="iconify" data-icon="mdi:eye-outline"></span> Hiển thị mệnh</button>
                                        <?php endif; ?>
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
</div>

<!-- Drawer Xem chi tiết Mệnh -->
<div id="destinyDrawerOverlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[60] hidden opacity-0 transition-opacity duration-300" onclick="closeDestinyDrawer()"></div>
<div id="destinyDrawer" class="fixed top-0 right-0 h-full w-full max-w-[420px] bg-[#FAF8F5] shadow-2xl z-[70] transform translate-x-full transition-transform duration-300 ease-out overflow-hidden flex flex-col">
    <!-- Drawer Header -->
    <div class="bg-white px-6 py-4 border-b border-gray-100 flex items-center justify-between shrink-0">
        <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
            Chi tiết bản mệnh
        </h3>
        <button class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition-colors" onclick="closeDestinyDrawer()">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>
    
    <!-- Drawer Content -->
    <div class="flex-1 overflow-y-auto p-6 scrollbar-hide">
        <!-- Banner/Title -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 mb-5 text-center relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 opacity-5">
                <span class="iconify text-9xl text-[#10B981]" data-icon="mdi:yin-yang"></span>
            </div>
            <div class="w-16 h-16 rounded-full bg-emerald-50 text-[#10B981] flex items-center justify-center mx-auto mb-3 shadow-sm border border-emerald-100">
                <span class="iconify text-3xl" data-icon="mdi:yin-yang"></span>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-1">Mệnh Mộc</h2>
            <p class="text-sm text-gray-500">Sự sinh sôi, phát triển, mềm dẻo</p>
        </div>

        <div class="space-y-4">
            <!-- Màu sắc -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:palette-outline"></span> Màu sắc phong thủy
                </h4>
                <div class="space-y-4">
                    <div>
                        <span class="text-[11px] font-bold text-gray-400 block mb-1.5">MÀU ĐẠI DIỆN</span>
                        <div class="flex items-center gap-2">
                            <span class="w-5 h-5 rounded-full shadow-[0_0_0_1px_rgba(0,0,0,0.1)]" style="background-color: #10B981"></span>
                            <span class="text-sm font-medium text-gray-700">Xanh lá</span>
                        </div>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-emerald-600 block mb-1.5">MÀU TƯƠNG SINH / TƯƠNG HỢP</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-md text-xs font-medium text-gray-700">Xanh lá</span>
                            <span class="px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-md text-xs font-medium text-gray-700">Xanh ngọc</span>
                            <span class="px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-md text-xs font-medium text-gray-700">Xanh dương</span>
                            <span class="px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-md text-xs font-medium text-gray-700">Đen</span>
                        </div>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-red-500 block mb-1.5">MÀU TƯƠNG KHẮC (NÊN TRÁNH)</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2.5 py-1 bg-red-50/50 border border-red-100 rounded-md text-xs font-medium text-red-600">Trắng</span>
                            <span class="px-2.5 py-1 bg-red-50/50 border border-red-100 rounded-md text-xs font-medium text-red-600">Bạc</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Đá phù hợp -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:diamond-stone"></span> Đá / Ngọc phù hợp
                    </h4>
                    <span class="text-[10px] font-bold bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full">12 loại</span>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="px-2.5 py-1.5 bg-white border border-gray-200 rounded-lg text-xs font-medium text-gray-700 shadow-sm flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>Ngọc bích</span>
                    <span class="px-2.5 py-1.5 bg-white border border-gray-200 rounded-lg text-xs font-medium text-gray-700 shadow-sm flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Thạch anh xanh</span>
                    <span class="px-2.5 py-1.5 bg-white border border-gray-200 rounded-lg text-xs font-medium text-gray-700 shadow-sm flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>Aquamarine</span>
                    <span class="px-2.5 py-1.5 bg-gray-50 border border-gray-200 rounded-lg text-xs font-medium text-gray-500 cursor-pointer hover:bg-gray-100">+9 loại khác</span>
                </div>
            </div>

            <!-- Thống kê SP và Năm sinh -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 text-center cursor-pointer hover:border-[#6B0D18] transition-colors group">
                    <span class="iconify text-2xl text-gray-300 group-hover:text-[#6B0D18] mb-1 transition-colors" data-icon="mdi:package-variant-closed"></span>
                    <h5 class="text-[10px] font-bold text-gray-400 uppercase">Sản phẩm liên quan</h5>
                    <p class="text-xl font-bold text-gray-800 mt-1">42</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 text-center cursor-pointer hover:border-[#6B0D18] transition-colors group">
                    <span class="iconify text-2xl text-gray-300 group-hover:text-[#6B0D18] mb-1 transition-colors" data-icon="mdi:calendar-account-outline"></span>
                    <h5 class="text-[10px] font-bold text-gray-400 uppercase">Năm sinh cấu hình</h5>
                    <p class="text-xl font-bold text-gray-800 mt-1">16</p>
                </div>
            </div>

            <!-- Ý nghĩa -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:book-open-page-variant-outline"></span> Ý nghĩa phong thủy
                </h4>
                <p class="text-sm text-gray-600 leading-relaxed">Mệnh Mộc tượng trưng cho mùa xuân, sự sinh sôi nảy nở. Người mệnh Mộc thường có tính cách thân thiện, chu đáo, tận tâm và hòa đồng. Việc sử dụng các loại đá phong thủy màu xanh lá hoặc đen/xanh dương (Thủy sinh Mộc) sẽ giúp tăng cường năng lượng tích cực.</p>
            </div>
        </div>
    </div>
    
    <!-- Drawer Footer -->
    <div class="bg-white px-6 py-4 border-t border-gray-100 flex gap-3 shrink-0">
        <a href="<?= APP_URL ?>/admin/menh-phong-thuy/sua" class="flex-1 px-4 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm flex items-center justify-center gap-2 shadow-md">
            <span class="iconify" data-icon="mdi:pencil"></span> Chỉnh sửa mệnh
        </a>
    </div>
</div>

<!-- Modal Ẩn/Hiện Mệnh -->
<div id="toggleStatusModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="p-6">
            <div class="w-12 h-12 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center mb-4 mx-auto">
                <span class="iconify text-2xl" id="toggleModalIcon" data-icon="mdi:eye-off-outline"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 text-center mb-2" id="toggleModalTitle">Ẩn mệnh khỏi trang người dùng?</h3>
            <p class="text-sm text-gray-500 text-center mb-4">Mệnh này sẽ không hiển thị ở các trang như Vòng Sinh Mệnh hoặc bộ lọc User, nhưng dữ liệu vẫn được lưu trong hệ thống.</p>
            <div class="bg-amber-50 border border-amber-100 rounded-lg p-3 text-sm text-amber-700 text-center mb-2" id="toggleModalWarning">
                Mệnh này hiện có <strong id="toggleModalCount">42</strong> sản phẩm liên quan. Các sản phẩm không bị xóa.
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('toggleStatusModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-[#8A111F]" onclick="submitToggle()">Xác nhận <span id="toggleModalActionText">ẩn</span></button>
        </div>
    </div>
</div>

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
    function openDestinyDrawer() {
        const overlay = document.getElementById('destinyDrawerOverlay');
        const drawer = document.getElementById('destinyDrawer');
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        drawer.classList.remove('translate-x-full');
    }

    function closeDestinyDrawer() {
        const overlay = document.getElementById('destinyDrawerOverlay');
        const drawer = document.getElementById('destinyDrawer');
        overlay.classList.add('opacity-0');
        drawer.classList.add('translate-x-full');
        setTimeout(() => overlay.classList.add('hidden'), 300);
    }

    // Toggle Modal Logic
    function openToggleModal(name, count, action) {
        document.querySelectorAll('.absolute.right-0').forEach(menu => menu.classList.add('hidden')); // Close menus
        
        const isHide = action === 'hide';
        document.getElementById('toggleModalTitle').innerText = isHide ? `Ẩn ${name} khỏi trang người dùng?` : `Hiển thị ${name} trên trang người dùng?`;
        document.getElementById('toggleModalIcon').setAttribute('data-icon', isHide ? 'mdi:eye-off-outline' : 'mdi:eye-outline');
        document.getElementById('toggleModalIcon').parentElement.className = isHide ? 'w-12 h-12 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center mb-4 mx-auto' : 'w-12 h-12 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center mb-4 mx-auto';
        document.getElementById('toggleModalActionText').innerText = isHide ? 'ẩn' : 'hiển thị';
        
        const warning = document.getElementById('toggleModalWarning');
        if (count > 0) {
            warning.style.display = 'block';
            document.getElementById('toggleModalCount').innerText = count;
        } else {
            warning.style.display = 'none';
        }
        
        document.getElementById('toggleStatusModal').classList.remove('hidden');
    }

    function submitToggle() {
        document.getElementById('toggleStatusModal').classList.add('hidden');
        alert("Thao tác thành công! (Dữ liệu mẫu)");
    }
</script>
