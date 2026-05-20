<?php
// views/pages/admin_customer.php
$thong_ke = $thong_ke ?? [];
$customers = $customers ?? [];
?>
<div class="animate-[fadeInPage_0.3s_ease-out] max-w-7xl mx-auto pb-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Quản lý khách hàng</h2>
            <p class="text-sm text-gray-500 mt-1">Theo dõi thông tin khách hàng, hạng thành viên, lịch sử mua hàng và trạng thái tài khoản.</p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm flex items-center gap-2 shadow-md" onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/them'">
                <span class="iconify" data-icon="mdi:plus"></span> Thêm khách hàng
            </button>
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:refresh"></span> Làm mới
            </button>
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:export-variant"></span> Xuất danh sách
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600"><span class="iconify text-lg" data-icon="mdi:account-group"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Tổng khách</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['tong'], 0, ',', '.') ?></p>
        </div>
        <div class="bg-emerald-50 rounded-xl shadow-sm border border-emerald-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600"><span class="iconify text-lg" data-icon="mdi:account-plus"></span></div>
                <h3 class="text-xs font-bold text-emerald-700 uppercase tracking-wider">Khách mới</h3>
            </div>
            <p class="text-2xl font-bold text-emerald-800">+<?= $thong_ke['khach_moi'] ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-purple-50 flex items-center justify-center text-purple-600"><span class="iconify text-lg" data-icon="mdi:cart-check"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Đã mua hàng</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['da_mua'], 0, ',', '.') ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600"><span class="iconify text-lg" data-icon="mdi:cart-off"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Chưa mua</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['chua_mua'], 0, ',', '.') ?></p>
        </div>
        <div class="bg-red-50 rounded-xl shadow-sm border border-red-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-600"><span class="iconify text-lg" data-icon="mdi:lock"></span></div>
                <h3 class="text-xs font-bold text-red-700 uppercase tracking-wider">Bị khóa</h3>
            </div>
            <p class="text-2xl font-bold text-red-800"><?= $thong_ke['bi_khoa'] ?></p>
        </div>
        <div class="bg-gradient-to-br from-white to-orange-50 rounded-xl shadow-sm border border-orange-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600"><span class="iconify text-lg" data-icon="mdi:diamond-stone"></span></div>
                <h3 class="text-xs font-bold text-orange-700 uppercase tracking-wider">Diamond</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= $thong_ke['diamond'] ?></p>
        </div>
    </div>

    <!-- Tabs Phân Loại -->
    <div class="flex items-center gap-2 overflow-x-auto scrollbar-hide mb-4">
        <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Tất cả (<?= $thong_ke['tong'] ?>)</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap shrink-0 transition-colors">Khách mới (<?= $thong_ke['khach_moi'] ?>)</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap shrink-0 transition-colors">Đã mua hàng (<?= $thong_ke['da_mua'] ?>)</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap shrink-0 transition-colors">Gold</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap shrink-0 transition-colors">Diamond</button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-red-600 rounded-full text-sm font-medium hover:bg-red-50 whitespace-nowrap shrink-0 transition-colors">Bị khóa (<?= $thong_ke['bi_khoa'] ?>)</button>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6 flex flex-col xl:flex-row xl:items-center justify-between gap-4">
        <div class="relative w-full xl:w-80 shrink-0">
            <input type="text" placeholder="Tìm tên, email, sđt, mã KH..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-shadow">
            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
        </div>
        <div class="flex items-center gap-3 overflow-x-auto pb-1 xl:pb-0 scrollbar-hide w-full xl:w-auto">
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Hạng thành viên</option>
                <option value="silver">Silver</option>
                <option value="gold">Gold</option>
                <option value="diamond">Diamond</option>
            </select>
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Trạng thái tài khoản</option>
                <option value="active">Đang hoạt động</option>
                <option value="locked">Bị khóa</option>
                <option value="unverified">Chưa xác thực</option>
            </select>
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Tổng chi tiêu</option>
                <option value="1">Dưới 500k</option>
                <option value="2">500k - 2tr</option>
                <option value="3">Trên 2tr</option>
            </select>
            <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors shrink-0 flex items-center gap-2">
                Bộ lọc nâng cao <span class="iconify" data-icon="mdi:filter-variant"></span>
            </button>
            <button class="px-3 py-2 text-[#6B0D18] text-sm font-medium hover:underline whitespace-nowrap shrink-0">
                Xóa lọc
            </button>
        </div>
    </div>

    <!-- Thanh thao tác hàng loạt (ẩn mặc định) -->
    <div id="bulkActionBar" class="hidden bg-white border border-[#6B0D18]/20 rounded-xl shadow-sm mb-4 px-4 py-3 flex items-center justify-between animate-[fadeInPage_0.2s_ease-out]">
        <div class="flex items-center gap-2 text-sm text-gray-700">
            <span class="w-6 h-6 rounded bg-[#6B0D18]/10 text-[#6B0D18] font-bold flex items-center justify-center">2</span>
            <span>Khách hàng đang chọn</span>
        </div>
        <div class="flex items-center gap-2">
            <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded text-xs font-medium hover:bg-[#8A111F]" onclick="openNotifyModal()">Gửi thông báo</button>
            <button class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 rounded text-xs font-medium hover:bg-gray-50" onclick="openVoucherModal()">Gán voucher</button>
            <button class="px-3 py-1.5 border border-red-200 text-red-600 rounded text-xs font-medium hover:bg-red-50" onclick="openLockModal()">Khóa tài khoản</button>
            <button class="px-3 py-1.5 bg-red-600 text-white rounded text-xs font-medium hover:bg-red-700" onclick="openDeleteModal()">Xóa</button>
        </div>
    </div>

    <!-- Bảng danh sách Khách hàng -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        
        <!-- Desktop Table -->
        <div class="hidden lg:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-xs text-gray-500 uppercase tracking-wider">
                        <th class="py-4 pl-6 pr-3 w-12">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18] cursor-pointer" onchange="toggleBulkAction(this)">
                        </th>
                        <th class="py-4 px-3 font-bold">Khách hàng</th>
                        <th class="py-4 px-3 font-bold">Liên hệ</th>
                        <th class="py-4 px-3 font-bold">Hạng</th>
                        <th class="py-4 px-3 font-bold">Lịch sử mua</th>
                        <th class="py-4 px-3 font-bold">Mệnh</th>
                        <th class="py-4 px-3 font-bold">Trạng thái</th>
                        <th class="py-4 pr-6 pl-3 font-bold text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($customers as $kh): ?>
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="py-4 pl-6 pr-3">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18] cursor-pointer" onchange="toggleBulkAction(this)">
                        </td>
                        <td class="py-4 px-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center font-bold text-gray-500 uppercase shrink-0">
                                    <?= mb_substr($kh['ten'], 0, 1) ?>
                                </div>
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <a href="<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>" class="font-bold text-gray-800 hover:text-[#6B0D18] text-sm"><?= $kh['ten'] ?></a>
                                        <?php if ($kh['ghi_chu_vip']): ?>
                                            <span class="iconify text-amber-500 text-sm" data-icon="mdi:star" title="Khách VIP cần chú ý"></span>
                                        <?php endif; ?>
                                        <?php if ($kh['nhieu_don_huy'] ?? false): ?>
                                            <span class="iconify text-red-500 text-sm" data-icon="mdi:alert-circle" title="Có nhiều đơn hủy"></span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="text-[11px] text-gray-500 mt-0.5"><?= $kh['ma'] ?> • <?= $kh['gioi_tinh'] ?><?= $kh['tuoi'] ? ' ' . $kh['tuoi'] . ' tuổi' : '' ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-3">
                            <div class="text-sm text-gray-800 flex items-center gap-1 group/copy cursor-pointer" onclick="copyToClipboard('<?= $kh['sdt'] ?>')">
                                <?= $kh['sdt'] ?> <span class="iconify text-gray-300 opacity-0 group-hover/copy:opacity-100 transition-opacity" data-icon="mdi:content-copy"></span>
                            </div>
                            <div class="text-[11px] text-gray-500 flex items-center gap-1 mt-0.5 group/copy2 cursor-pointer" onclick="copyToClipboard('<?= $kh['email'] ?>')">
                                <?= $kh['email'] ?> <span class="iconify text-gray-300 opacity-0 group-hover/copy2:opacity-100 transition-opacity" data-icon="mdi:content-copy"></span>
                            </div>
                        </td>
                        <td class="py-4 px-3">
                            <?php if ($kh['hang'] === 'Gold'): ?>
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded">GOLD</span>
                            <?php elseif ($kh['hang'] === 'Diamond'): ?>
                                <span class="px-2 py-1 bg-red-100 text-[#6B0D18] text-xs font-bold rounded">DIAMOND</span>
                            <?php else: ?>
                                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs font-bold rounded">SILVER</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-3">
                            <div class="text-sm font-bold text-[#6B0D18]"><?= number_format($kh['tong_chi_tieu'], 0, ',', '.') ?>đ</div>
                            <div class="text-[11px] text-gray-500 mt-0.5 cursor-pointer hover:text-[#6B0D18]" onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>'">
                                <?= $kh['tong_don'] ?> đơn 
                                <?php if ($kh['don_gan_nhat']): ?>
                                    • Gần nhất: <span class="font-medium"><?= $kh['don_gan_nhat']['ma'] ?></span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="py-4 px-3">
                            <?php if ($kh['menh']): ?>
                                <span class="px-2 py-1 bg-blue-50 border border-blue-100 text-blue-700 text-[11px] font-bold rounded-md">
                                    Mệnh <?= $kh['menh'] ?>
                                </span>
                            <?php else: ?>
                                <span class="px-2 py-1 bg-gray-50 border border-gray-200 text-gray-400 text-[11px] rounded-md">
                                    Thiếu
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-3">
                            <?php if ($kh['trang_thai'] === 'hoat_dong'): ?>
                                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-md flex items-center gap-1.5 w-fit">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Hoạt động
                                </span>
                            <?php elseif ($kh['trang_thai'] === 'bi_khoa'): ?>
                                <span class="px-2.5 py-1 bg-red-50 text-red-700 text-xs font-bold rounded-md flex items-center gap-1.5 w-fit border border-red-100">
                                    <span class="iconify" data-icon="mdi:lock"></span> Bị khóa
                                </span>
                            <?php else: ?>
                                <span class="px-2.5 py-1 bg-amber-50 text-amber-700 text-xs font-bold rounded-md flex items-center gap-1.5 w-fit border border-amber-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Chưa xác thực
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 pr-6 pl-3 text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <button onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>'" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Xem chi tiết sơ">
                                    <span class="iconify text-lg" data-icon="mdi:eye-outline"></span>
                                </button>
                                
                                <button class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-gray-500 transition-colors" onclick="toggleActionMenu(this)">
                                    <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                </button>
                                
                                <!-- Dropdown Menu -->
                                <div class="absolute right-6 top-10 mt-1 w-56 bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.1)] border border-gray-100 py-2 hidden z-10 transform origin-top-right transition-all">
                                    <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2" onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>'"><span class="iconify text-gray-400" data-icon="mdi:cart-outline"></span> Xem đơn hàng</button>
                                    <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2" onclick="openNotifyModal()"><span class="iconify text-gray-400" data-icon="mdi:bell-outline"></span> Gửi thông báo</button>
                                    <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2" onclick="openVoucherModal()"><span class="iconify text-gray-400" data-icon="mdi:ticket-percent-outline"></span> Gán voucher</button>
                                    <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2" onclick="openRankModal()"><span class="iconify text-gray-400" data-icon="mdi:chevron-double-up"></span> Cập nhật hạng</button>
                                    <div class="h-px bg-gray-100 my-1"></div>
                                    <?php if ($kh['trang_thai'] === 'bi_khoa'): ?>
                                        <button class="w-full px-4 py-2 text-left text-sm text-emerald-600 hover:bg-emerald-50 flex items-center gap-2" onclick="alert('Đã mở khóa!')"><span class="iconify" data-icon="mdi:lock-open-outline"></span> Mở khóa tài khoản</button>
                                    <?php else: ?>
                                        <button class="w-full px-4 py-2 text-left text-sm text-amber-600 hover:bg-amber-50 flex items-center gap-2" onclick="openLockModal()"><span class="iconify" data-icon="mdi:lock-outline"></span> Khóa tài khoản</button>
                                    <?php endif; ?>
                                    <button class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 flex items-center gap-2" onclick="openDeleteModal()"><span class="iconify" data-icon="mdi:delete-outline"></span> Xóa tài khoản</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Mobile Card List -->
        <div class="lg:hidden flex flex-col divide-y divide-gray-100">
            <?php foreach ($customers as $kh): ?>
            <div class="p-4 flex gap-4">
                <div class="shrink-0 pt-1">
                    <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center font-bold text-gray-500 uppercase">
                                <?= mb_substr($kh['ten'], 0, 1) ?>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 text-sm"><?= $kh['ten'] ?></h4>
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <span class="text-xs text-gray-500"><?= $kh['sdt'] ?></span>
                                    <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                    <?php if ($kh['hang'] === 'Gold'): ?>
                                        <span class="text-[10px] font-bold text-yellow-600">GOLD</span>
                                    <?php elseif ($kh['hang'] === 'Diamond'): ?>
                                        <span class="text-[10px] font-bold text-[#6B0D18]">DIAMOND</span>
                                    <?php else: ?>
                                        <span class="text-[10px] font-bold text-gray-500">SILVER</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <button onclick="toggleActionMenu(this)" class="p-1 text-gray-400 hover:text-gray-700">
                            <span class="iconify" data-icon="mdi:dots-vertical"></span>
                        </button>
                        <!-- Mobile Dropdown -->
                        <div class="absolute right-4 mt-8 w-48 bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.1)] border border-gray-100 py-2 hidden z-10">
                            <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50" onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>'">Xem đơn hàng</button>
                            <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50" onclick="openRankModal()">Cập nhật hạng</button>
                            <button class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50" onclick="openDeleteModal()">Xóa tài khoản</button>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-2.5 rounded-lg border border-gray-100 flex justify-between items-center mb-3">
                        <div>
                            <p class="text-[10px] text-gray-500 uppercase tracking-wide">Chi tiêu</p>
                            <p class="font-bold text-[#6B0D18] text-sm"><?= number_format($kh['tong_chi_tieu'], 0, ',', '.') ?>đ</p>
                        </div>
                        <div class="w-px h-6 bg-gray-200"></div>
                        <div>
                            <p class="text-[10px] text-gray-500 uppercase tracking-wide">Đơn hàng</p>
                            <p class="font-bold text-gray-800 text-sm"><?= $kh['tong_don'] ?> đơn</p>
                        </div>
                        <div class="w-px h-6 bg-gray-200"></div>
                        <div>
                            <p class="text-[10px] text-gray-500 uppercase tracking-wide">Trạng thái</p>
                            <?php if ($kh['trang_thai'] === 'hoat_dong'): ?>
                                <p class="font-bold text-emerald-600 text-xs mt-0.5">Hoạt động</p>
                            <?php elseif ($kh['trang_thai'] === 'bi_khoa'): ?>
                                <p class="font-bold text-red-600 text-xs mt-0.5">Bị khóa</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <button onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>'" class="w-full py-2 border border-blue-100 text-blue-600 bg-blue-50 rounded-lg text-sm font-bold hover:bg-blue-100 transition-colors text-center flex items-center justify-center gap-2">
                        <span class="iconify text-lg" data-icon="mdi:eye-outline"></span> Xem chi tiết sơ
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Phân trang -->
    <div class="mt-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <span class="text-sm text-gray-500">Hiển thị 1 - 20 trong <?= number_format($thong_ke['tong'], 0, ',', '.') ?> khách hàng</span>
        <div class="flex items-center gap-1">
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 bg-white"><span class="iconify" data-icon="mdi:chevron-left"></span></button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-bold text-sm shadow-md">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 font-medium text-sm bg-white">2</button>
            <span class="w-8 h-8 flex items-center justify-center text-gray-500 text-sm">...</span>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 font-medium text-sm bg-white">123</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 bg-white"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
        </div>
    </div>
</div>

<!-- ============================================== -->
<!-- POPUPS & DRAWERS -->
<!-- ============================================== -->

                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Nâng/Hạ Hạng -->
<div id="rankModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:chevron-double-up"></span> Cập Nhật Hạng Thành Viên</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="document.getElementById('rankModal').classList.add('hidden')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-4">
            <div class="bg-blue-50 border border-blue-100 p-3 rounded-lg text-sm text-blue-700 mb-2">
                Hạng hiện tại của <strong>Nguyễn Văn A</strong>: <span class="font-bold">GOLD</span>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Chọn hạng mới <span class="text-red-500">*</span></label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    <option value="silver">Silver</option>
                    <option value="gold" selected>Gold</option>
                    <option value="diamond">Diamond</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Lý do cập nhật (Bắt buộc) <span class="text-red-500">*</span></label>
                <textarea rows="2" placeholder="Vd: Thưởng đặc biệt, Điều chỉnh lỗi..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"></textarea>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('rankModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="document.getElementById('rankModal').classList.add('hidden'); alert('Đã cập nhật hạng');">Lưu thay đổi</button>
        </div>
    </div>
</div>

<!-- Modal Khóa Tài Khoản -->
<div id="lockModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="p-6">
            <div class="w-12 h-12 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center mb-4 mx-auto">
                <span class="iconify text-2xl" data-icon="mdi:lock"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 text-center mb-2">Khóa tài khoản khách hàng?</h3>
            <p class="text-sm text-gray-500 text-center mb-5">Khách hàng sẽ không thể đăng nhập hoặc đặt hàng bằng tài khoản này cho đến khi được mở khóa.</p>
            
            <div class="bg-gray-50 rounded-lg p-3 mb-4 flex items-center gap-3 border border-gray-100">
                <div class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center font-bold text-gray-500">N</div>
                <div>
                    <p class="text-sm font-bold text-gray-800">Nguyễn Văn A</p>
                    <p class="text-xs text-gray-500">nguyenvana@gmail.com</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Lý do khóa <span class="text-red-500">*</span></label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18]">
                    <option value="">-- Chọn lý do --</option>
                    <option value="1">Spam / Đặt hàng ảo nhiều lần</option>
                    <option value="2">Vi phạm chính sách đánh giá</option>
                    <option value="3">Nghi ngờ bị chiếm quyền</option>
                    <option value="4">Khách hàng yêu cầu</option>
                </select>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('lockModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-amber-600 text-white rounded-lg text-sm font-bold hover:bg-amber-700 shadow-sm" onclick="document.getElementById('lockModal').classList.add('hidden'); alert('Đã khóa');">Xác nhận khóa</button>
        </div>
    </div>
</div>

<!-- Modal Xóa Tài Khoản -->
<div id="deleteModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="p-6">
            <div class="w-12 h-12 rounded-full bg-red-50 text-red-500 flex items-center justify-center mb-4 mx-auto">
                <span class="iconify text-2xl" data-icon="mdi:alert-circle-outline"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 text-center mb-2">Cảnh báo: Xóa vĩnh viễn?</h3>
            <p class="text-sm text-gray-500 text-center mb-5">Dữ liệu tài khoản của <strong>Nguyễn Văn A</strong> sẽ bị xóa sạch khỏi hệ thống. Nếu chỉ để cấm truy cập, hãy dùng chức năng <strong>Khóa tài khoản</strong>.</p>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('deleteModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-bold hover:bg-red-700 shadow-sm" onclick="document.getElementById('deleteModal').classList.add('hidden'); alert('Đã xóa vĩnh viễn');">Vẫn xóa</button>
        </div>
    </div>
</div>

<!-- Modal Gửi Thông Báo -->
<div id="notifyModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:bell-ring-outline"></span> Gửi thông báo riêng</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="document.getElementById('notifyModal').classList.add('hidden')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Người nhận</label>
                <div class="px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-600 font-medium">Nguyễn Văn A</div>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Loại thông báo</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    <option>Tin nhắn từ cửa hàng</option>
                    <option>Hỗ trợ đơn hàng</option>
                    <option>Tặng Voucher</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Tiêu đề</label>
                <input type="text" placeholder="Vd: Chuỗi Ngọc tặng bạn voucher sinh nhật" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Nội dung</label>
                <textarea rows="3" placeholder="Nhập nội dung thông báo..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"></textarea>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('notifyModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="document.getElementById('notifyModal').classList.add('hidden'); alert('Đã gửi thông báo');"><span class="iconify" data-icon="mdi:send"></span> Gửi ngay</button>
        </div>
    </div>
</div>

<!-- Modal Gán Voucher -->
<div id="voucherModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:ticket-percent-outline"></span> Gán Voucher Nhanh</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="document.getElementById('voucherModal').classList.add('hidden')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6">
            <p class="text-sm text-gray-500 mb-4">Chọn voucher đang có hiệu lực để tặng riêng cho <strong class="text-gray-800">Nguyễn Văn A</strong>.</p>
            
            <div class="space-y-3 max-h-60 overflow-y-auto pr-2">
                <!-- Voucher Item -->
                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:border-[#6B0D18] hover:bg-red-50/30 transition-colors">
                    <div class="mt-1">
                        <input type="radio" name="select_voucher" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="px-2 py-0.5 bg-[#6B0D18] text-white text-[10px] font-bold rounded">GIẢM 50K</span>
                            <span class="text-sm font-bold text-gray-800">VIP50K</span>
                        </div>
                        <p class="text-[11px] text-gray-500">Đơn tối thiểu 500k. Hạn: 30/12/2026</p>
                    </div>
                </label>
                <!-- Voucher Item -->
                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:border-[#6B0D18] hover:bg-red-50/30 transition-colors">
                    <div class="mt-1">
                        <input type="radio" name="select_voucher" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="px-2 py-0.5 bg-[#6B0D18] text-white text-[10px] font-bold rounded">FREESHIP</span>
                            <span class="text-sm font-bold text-gray-800">FREESHIP</span>
                        </div>
                        <p class="text-[11px] text-gray-500">Không giới hạn đơn tối thiểu. Hạn: 01/06/2026</p>
                    </div>
                </label>
            </div>
            
            <div class="mt-4 pt-4 border-t border-gray-100">
                <input type="text" placeholder="Hoặc ghi chú nội bộ (không bắt buộc)..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('voucherModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="document.getElementById('voucherModal').classList.add('hidden'); alert('Đã gán voucher');"><span class="iconify" data-icon="mdi:check"></span> Hoàn tất gán</button>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text);
        // Có thể thay bằng custom Toast sau
    }

    function toggleActionMenu(btn) {
        // Đóng các menu khác
        document.querySelectorAll('.action-menu-dropdown').forEach(m => {
            if (m !== btn.nextElementSibling) m.classList.add('hidden');
        });
        
        const menu = btn.nextElementSibling;
        
        if (menu.classList.contains('hidden')) {
            menu.classList.add('action-menu-dropdown');
            menu.classList.remove('hidden');
            
            const rect = btn.getBoundingClientRect();
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

    // Đóng menu khi click ra ngoài
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.action-menu-dropdown') && !e.target.closest('button[onclick^="toggleActionMenu"]')) {
            document.querySelectorAll('.action-menu-dropdown').forEach(m => m.classList.add('hidden'));
        }
    });

    // Đóng menu khi scroll
    window.addEventListener('scroll', function() {
        document.querySelectorAll('.action-menu-dropdown:not(.hidden)').forEach(m => m.classList.add('hidden'));
    }, true);

    function toggleBulkAction(checkbox) {
        const bar = document.getElementById('bulkActionBar');
        // Fake logic hiện bar
        if(checkbox.checked) bar.classList.remove('hidden');
    }

    // Modal Triggers
    function openLockModal() { document.getElementById('lockModal').classList.remove('hidden'); }
    function openNotifyModal() { document.getElementById('notifyModal').classList.remove('hidden'); }
    function openVoucherModal() { document.getElementById('voucherModal').classList.remove('hidden'); }
    function openRankModal() { document.getElementById('rankModal').classList.remove('hidden'); }
    function openDeleteModal() { document.getElementById('deleteModal').classList.remove('hidden'); }
</script>
