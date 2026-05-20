<?php
// views/pages/admin_customer_detail.php
$kh = $kh ?? [];
$id = $id ?? '';
$current_tab = $_GET['tab'] ?? 'tong_quan';

// Helpers
function getStatusColor($status) {
    if ($status === 'hoat_dong') return 'bg-emerald-50 text-emerald-700 border-emerald-100';
    if ($status === 'bi_khoa') return 'bg-red-50 text-red-700 border-red-100';
    return 'bg-amber-50 text-amber-700 border-amber-100';
}
function getStatusText($status) {
    if ($status === 'hoat_dong') return 'Đang hoạt động';
    if ($status === 'bi_khoa') return 'Bị khóa';
    return 'Chưa xác thực';
}
function getRankBadge($rank) {
    if ($rank === 'Gold') return 'bg-yellow-100 text-yellow-800 border border-yellow-200';
    if ($rank === 'Diamond') return 'bg-red-100 text-[#6B0D18] border border-red-200 shadow-sm';
    return 'bg-gray-100 text-gray-700 border border-gray-200';
}
?>

<div class="animate-[fadeInPage_0.3s_ease-out] max-w-7xl mx-auto pb-12">
    <!-- Breadcrumb & Quay lại -->
    <div class="mb-4">
        <div class="flex items-center text-xs text-gray-500 mb-2">
            <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18]">Admin</a>
            <span class="mx-2">/</span>
            <a href="<?= APP_URL ?>/admin/khach-hang" class="hover:text-[#6B0D18]">Quản lý khách hàng</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-bold">Chi tiết khách hàng</span>
        </div>
        <a href="<?= APP_URL ?>/admin/khach-hang" class="inline-flex items-center gap-1 text-sm font-medium text-gray-600 hover:text-[#6B0D18] transition-colors bg-white px-3 py-1.5 rounded-lg border border-gray-200 shadow-sm">
            <span class="iconify" data-icon="mdi:arrow-left"></span> Quay lại danh sách
        </a>
    </div>

    <!-- Header Hồ Sơ -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-bl from-red-50 to-transparent rounded-bl-full opacity-50 pointer-events-none"></div>
        <div class="flex flex-col md:flex-row md:items-start justify-between gap-6 relative z-10">
            <div class="flex items-center gap-5">
                <div class="relative">
                    <div class="w-20 h-20 rounded-full bg-gray-50 border-4 border-white shadow-md flex items-center justify-center font-bold text-gray-400 text-3xl uppercase">
                        <?= mb_substr($kh['ten'], 0, 1) ?>
                    </div>
                    <?php if($kh['trang_thai'] === 'hoat_dong'): ?>
                        <div class="absolute bottom-1 right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full"></div>
                    <?php endif; ?>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 font-luxury flex items-center gap-3">
                        <?= $kh['ten'] ?>
                        <span class="px-2 py-0.5 text-[11px] font-bold uppercase rounded <?= getRankBadge($kh['hang']) ?>"><?= $kh['hang'] ?></span>
                        <span class="px-2 py-0.5 text-[11px] font-bold rounded border <?= getStatusColor($kh['trang_thai']) ?>"><?= getStatusText($kh['trang_thai']) ?></span>
                    </h2>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-2 text-sm text-gray-500">
                        <span class="flex items-center gap-1 text-gray-700 font-medium bg-gray-50 px-2 py-0.5 rounded cursor-pointer hover:bg-gray-100" onclick="copyToClipboard('<?= $kh['ma'] ?>')">
                            <?= $kh['ma'] ?> <span class="iconify text-[10px]" data-icon="mdi:content-copy"></span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-gray-400" data-icon="mdi:email-outline"></span> <?= $kh['email'] ?>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-gray-400" data-icon="mdi:phone-outline"></span> <?= $kh['sdt'] ?>
                        </span>
                    </div>
                    <div class="text-[11px] text-gray-400 mt-2">
                        Đăng ký: <?= $kh['ngay_dang_ky'] ?> • Đăng nhập gần nhất: <?= $kh['lan_dang_nhap_cuoi'] ?>
                    </div>
                </div>
            </div>

            <!-- Thao tác nhanh -->
            <div class="flex flex-wrap items-center gap-2">
                <?php if($kh['trang_thai'] === 'bi_khoa'): ?>
                    <button class="px-4 py-2 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-lg text-sm font-bold hover:bg-emerald-100 transition-colors flex items-center gap-2 shadow-sm" onclick="openLockModal()">
                        <span class="iconify" data-icon="mdi:lock-open-outline"></span> Mở khóa tài khoản
                    </button>
                <?php else: ?>
                    <button class="px-3 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors flex items-center gap-2" onclick="openLockModal()">
                        Khóa tài khoản
                    </button>
                <?php endif; ?>
                <button class="px-3 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors flex items-center gap-2" onclick="openRankModal()">
                    Cập nhật hạng
                </button>
                <button class="px-3 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors flex items-center gap-2" onclick="openVoucherModal()">
                    Gán voucher
                </button>
                <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] transition-colors flex items-center gap-2 shadow-sm" onclick="openNotifyModal()">
                    <span class="iconify" data-icon="mdi:bell-outline"></span> Gửi thông báo
                </button>
            </div>
        </div>
    </div>

    <!-- Cảnh báo nếu có -->
    <?php if(!empty($kh['canh_bao'])): ?>
    <div class="mb-6 space-y-2">
        <?php foreach($kh['canh_bao'] as $cb): ?>
            <div class="bg-amber-50 border border-amber-200 rounded-xl p-3 flex items-center justify-between text-amber-800 text-sm">
                <div class="flex items-center gap-2">
                    <span class="iconify text-lg text-amber-500" data-icon="mdi:alert-circle-outline"></span>
                    <span class="font-bold"><?= $cb ?></span>
                </div>
                <button class="text-xs font-bold underline hover:text-amber-900">Xem chi tiết</button>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Card Thống Kê Nhanh (Grid) -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:shopping-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Tổng đơn hàng</p>
            <p class="text-xl font-bold text-gray-800"><?= $kh['tong_don'] ?> <span class="text-xs font-normal text-gray-400">đơn</span></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:check-circle-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Đơn thành công</p>
            <p class="text-xl font-bold text-gray-800"><?= $kh['don_thanh_cong'] ?> <span class="text-xs font-normal text-gray-400">đơn</span></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 opacity-5 text-red-900">
                <span class="iconify text-6xl" data-icon="mdi:cash-multiple"></span>
            </div>
            <div class="w-8 h-8 rounded-full bg-red-50 text-[#6B0D18] flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:cash"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Tổng chi tiêu</p>
            <p class="text-xl font-bold text-[#6B0D18] relative z-10"><?= number_format($kh['tong_chi_tieu'], 0, ',', '.') ?>đ</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-orange-50 text-orange-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:ticket-percent-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Voucher khả dụng</p>
            <p class="text-xl font-bold text-gray-800"><?= $kh['so_voucher'] ?> <span class="text-xs font-normal text-gray-400">mã</span></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-pink-50 text-pink-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:heart-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Yêu thích</p>
            <p class="text-xl font-bold text-gray-800"><?= $kh['so_yeu_thich'] ?> <span class="text-xs font-normal text-gray-400">SP</span></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-yellow-50 text-yellow-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:star-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Đánh giá</p>
            <p class="text-xl font-bold text-gray-800"><?= $kh['so_danh_gia'] ?> <span class="text-xs font-normal text-gray-400">lượt</span></p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Sidebar nhỏ bên trái cho Tabs + Hạng -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Card Hạng Thành Viên -->
            <div class="bg-gradient-to-br from-[#FAF8F5] to-white rounded-xl shadow-sm border border-gray-100 p-5 relative overflow-hidden">
                <h3 class="text-sm font-bold text-gray-800 mb-4">Hạng thành viên</h3>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center <?= getRankBadge($kh['hang']) ?> border-2">
                        <span class="iconify text-2xl" data-icon="<?= $kh['hang'] === 'Diamond' ? 'mdi:diamond-stone' : ($kh['hang'] === 'Gold' ? 'mdi:crown' : 'mdi:medal-outline') ?>"></span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Hạng hiện tại</p>
                        <p class="text-lg font-bold text-gray-800 uppercase"><?= $kh['hang'] ?></p>
                    </div>
                </div>

                <div class="space-y-1.5 relative z-10">
                    <div class="flex justify-between text-xs font-medium text-gray-600">
                        <span>Đã chi tiêu:</span>
                        <span class="text-gray-800"><?= number_format($kh['tong_chi_tieu'], 0, ',', '.') ?>đ</span>
                    </div>
                    
                    <?php if($kh['muc_len_hang_tiep_theo'] > 0): ?>
                        <?php
                            $progress = ($kh['tong_chi_tieu'] / $kh['muc_len_hang_tiep_theo']) * 100;
                            if($progress > 100) $progress = 100;
                        ?>
                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2 mb-1">
                            <div class="bg-[#6B0D18] h-1.5 rounded-full" style="width: <?= $progress ?>%"></div>
                        </div>
                        <div class="text-[10px] text-gray-500 text-center mt-2">
                            Còn <span class="font-bold text-[#6B0D18]"><?= number_format($kh['muc_len_hang_tiep_theo'] - $kh['tong_chi_tieu'], 0, ',', '.') ?>đ</span> để lên hạng tiếp theo
                        </div>
                    <?php else: ?>
                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2 mb-1">
                            <div class="bg-yellow-500 h-1.5 rounded-full" style="width: 100%"></div>
                        </div>
                        <div class="text-[10px] text-gray-500 text-center mt-2">Đã đạt mức hạng cao nhất.</div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Vertical Tabs Menu -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-2 space-y-1">
                <button onclick="switchTab('tong_quan')" id="btn-tong_quan" class="tab-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors text-left bg-[#6B0D18] text-white">
                    <span class="iconify" data-icon="mdi:account-details-outline"></span> Tổng quan
                </button>
                <button onclick="switchTab('don_hang')" id="btn-don_hang" class="tab-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors text-left text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:receipt-text-outline"></span> Đơn hàng (<?= $kh['tong_don'] ?>)
                </button>
                <button onclick="switchTab('dia_chi')" id="btn-dia_chi" class="tab-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors text-left text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:map-marker-outline"></span> Địa chỉ (<?= count($kh['dia_chi']) ?>)
                </button>
                <button onclick="switchTab('voucher')" id="btn-voucher" class="tab-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors text-left text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:ticket-percent-outline"></span> Voucher (<?= count($kh['voucher']) ?>)
                </button>
                <button onclick="switchTab('yeu_thich')" id="btn-yeu_thich" class="tab-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors text-left text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:heart-outline"></span> Yêu thích (<?= $kh['so_yeu_thich'] ?>)
                </button>
                <button onclick="switchTab('danh_gia')" id="btn-danh_gia" class="tab-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors text-left text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:star-outline"></span> Đánh giá (<?= count($kh['danh_gia']) ?>)
                </button>
                <button onclick="switchTab('ghi_chu')" id="btn-ghi_chu" class="tab-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors text-left text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:note-edit-outline"></span> Ghi chú nội bộ
                </button>
                <button onclick="switchTab('lich_su')" id="btn-lich_su" class="tab-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors text-left text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:history"></span> Lịch sử hoạt động
                </button>
            </div>
        </div>

        <!-- Cột phải: Nội dung Tabs -->
        <div class="lg:col-span-3">
            
            <!-- TAB: TỔNG QUAN -->
            <div id="tab-tong_quan" class="tab-content block space-y-6 animate-[fadeInPage_0.2s_ease-out]">
                <!-- Thông tin cá nhân -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-4">
                        <h3 class="font-bold text-gray-800 text-lg flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:card-account-details-outline"></span> Thông tin cá nhân
                        </h3>
                        <button class="text-sm font-bold text-[#6B0D18] hover:underline">Chỉnh sửa</button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-5 gap-x-8">
                        <div>
                            <p class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Họ và tên</p>
                            <p class="text-sm font-medium text-gray-800"><?= $kh['ten'] ?></p>
                        </div>
                        <div>
                            <p class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Giới tính</p>
                            <p class="text-sm font-medium text-gray-800"><?= $kh['gioi_tinh'] ?></p>
                        </div>
                        <div>
                            <p class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Ngày sinh</p>
                            <p class="text-sm font-medium text-gray-800"><?= $kh['ngay_sinh'] ?></p>
                        </div>
                        <div>
                            <p class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Số điện thoại</p>
                            <p class="text-sm font-medium text-gray-800 flex items-center gap-2">
                                <?= $kh['sdt'] ?>
                                <span class="iconify text-gray-400 cursor-pointer hover:text-[#6B0D18]" data-icon="mdi:content-copy" onclick="copyToClipboard('<?= $kh['sdt'] ?>')"></span>
                            </p>
                        </div>
                        <div>
                            <p class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Email</p>
                            <p class="text-sm font-medium text-gray-800 flex items-center gap-2 break-all">
                                <?= $kh['email'] ?>
                                <span class="iconify text-gray-400 cursor-pointer hover:text-[#6B0D18]" data-icon="mdi:content-copy" onclick="copyToClipboard('<?= $kh['email'] ?>')"></span>
                            </p>
                        </div>
                        <div>
                            <p class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Năm sinh phong thủy</p>
                            <p class="text-sm font-medium text-gray-800"><?= $kh['nam_sinh'] ?></p>
                        </div>
                    </div>
                </div>

                <!-- Thông tin phong thủy -->
                <div class="bg-gradient-to-br from-red-50 to-white rounded-xl shadow-sm border border-red-100 p-6 relative overflow-hidden">
                    <div class="absolute right-0 top-0 opacity-10 text-red-900 pointer-events-none transform translate-x-1/4 -translate-y-1/4">
                        <span class="iconify text-9xl" data-icon="mdi:yin-yang"></span>
                    </div>
                    <div class="flex items-center justify-between border-b border-red-100 pb-4 mb-4 relative z-10">
                        <h3 class="font-bold text-[#6B0D18] text-lg flex items-center gap-2">
                            <span class="iconify" data-icon="mdi:yin-yang"></span> Hồ sơ phong thủy
                        </h3>
                        <a href="#" class="text-sm font-bold text-[#6B0D18] hover:underline bg-white px-3 py-1.5 rounded-lg shadow-sm border border-red-100">Gợi ý sản phẩm</a>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-5 gap-x-8 relative z-10">
                        <div>
                            <p class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Bản Mệnh</p>
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 font-bold rounded-lg border border-blue-200 text-sm">Mệnh <?= $kh['menh'] ?></span>
                        </div>
                        <div>
                            <p class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Màu sắc tương sinh / tương hợp</p>
                            <div class="flex flex-wrap gap-2 mt-1.5">
                                <?php foreach($kh['mau_phu_hop'] as $m): ?>
                                    <span class="px-2.5 py-1 bg-white border border-gray-200 text-gray-700 text-xs font-medium rounded-full shadow-sm"><?= $m ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Đá / Ngọc nên dùng</p>
                            <div class="flex flex-wrap gap-2 mt-1.5">
                                <?php foreach($kh['da_goi_y'] as $d): ?>
                                    <span class="px-2.5 py-1 bg-white border border-red-100 text-[#6B0D18] text-xs font-medium rounded-full shadow-sm"><?= $d ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- TAB: ĐƠN HÀNG -->
            <div id="tab-don_hang" class="tab-content hidden space-y-4 animate-[fadeInPage_0.2s_ease-out]">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                        <h3 class="font-bold text-gray-800">Lịch sử đơn hàng (<?= count($kh['don_hang']) ?>)</h3>
                        <a href="<?= APP_URL ?>/admin/don-hang?kh=<?= $kh['ma'] ?>" class="text-sm font-medium text-[#6B0D18] hover:underline flex items-center gap-1">Xem trong Quản lý đơn <span class="iconify" data-icon="mdi:arrow-right"></span></a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[600px]">
                            <thead>
                                <tr class="bg-white border-b border-gray-100 text-xs text-gray-500 uppercase tracking-wider">
                                    <th class="p-4 pl-6 font-medium">Mã đơn</th>
                                    <th class="p-4 font-medium">Ngày đặt</th>
                                    <th class="p-4 font-medium">Sản phẩm</th>
                                    <th class="p-4 font-medium text-right">Tổng tiền</th>
                                    <th class="p-4 pr-6 font-medium text-right">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-50">
                                <?php foreach($kh['don_hang'] as $dh): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="p-4 pl-6">
                                        <a href="<?= APP_URL ?>/admin/don-hang/chi-tiet/<?= str_replace('#', '', $dh['ma']) ?>" class="font-bold text-[#6B0D18] hover:underline"><?= $dh['ma'] ?></a>
                                    </td>
                                    <td class="p-4 text-gray-500"><?= $dh['ngay_dat'] ?></td>
                                    <td class="p-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center shrink-0 overflow-hidden">
                                                <span class="iconify text-gray-400" data-icon="mdi:image-outline"></span>
                                            </div>
                                            <div class="truncate max-w-[200px]">
                                                <p class="font-medium text-gray-800 truncate" title="<?= $dh['san_pham'] ?>"><?= $dh['san_pham'] ?></p>
                                                <p class="text-[10px] text-gray-400 mt-0.5">+ các sản phẩm khác</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 text-right font-bold text-gray-800"><?= number_format($dh['tong_tien'], 0, ',', '.') ?>đ</td>
                                    <td class="p-4 pr-6 text-right">
                                        <?php if($dh['trang_thai'] === 'Thành công'): ?>
                                            <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-[11px] font-bold rounded border border-emerald-100">Thành công</span>
                                        <?php else: ?>
                                            <span class="px-2.5 py-1 bg-gray-100 text-gray-500 text-[11px] font-bold rounded border border-gray-200">Đã hủy</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TAB: ĐỊA CHỈ -->
            <div id="tab-dia_chi" class="tab-content hidden space-y-4 animate-[fadeInPage_0.2s_ease-out]">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php foreach($kh['dia_chi'] as $dc): ?>
                    <div class="bg-white rounded-xl shadow-sm border <?= $dc['mac_dinh'] ? 'border-red-200 ring-1 ring-red-50' : 'border-gray-100' ?> p-5 relative">
                        <?php if($dc['mac_dinh']): ?>
                            <div class="absolute top-4 right-4 px-2 py-0.5 bg-red-50 text-[#6B0D18] text-[10px] font-bold uppercase rounded border border-red-100">Mặc định</div>
                        <?php endif; ?>
                        
                        <div class="flex items-center gap-2 mb-3 pr-16">
                            <h4 class="font-bold text-gray-800 text-base"><?= $dc['ten_nguoi_nhan'] ?></h4>
                            <span class="text-gray-300">|</span>
                            <span class="text-gray-600 text-sm"><?= $dc['sdt'] ?></span>
                        </div>
                        
                        <p class="text-sm text-gray-600 mb-4 h-10"><?= $dc['dia_chi'] ?></p>
                        
                        <div class="flex items-center gap-3 pt-3 border-t border-gray-50">
                            <button class="text-xs font-bold text-[#6B0D18] hover:underline" onclick="copyToClipboard('<?= $dc['ten_nguoi_nhan'] ?> - <?= $dc['sdt'] ?> - <?= $dc['dia_chi'] ?>')">Sao chép địa chỉ</button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- TAB: VOUCHER -->
            <div id="tab-voucher" class="tab-content hidden space-y-4 animate-[fadeInPage_0.2s_ease-out]">
                <div class="flex justify-end mb-2">
                    <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] transition-colors flex items-center gap-2 shadow-sm" onclick="openVoucherModal()">
                        <span class="iconify" data-icon="mdi:ticket-percent-outline"></span> Gán voucher mới
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php foreach($kh['voucher'] as $vc): ?>
                    <div class="bg-white rounded-xl shadow-sm border <?= $vc['trang_thai'] === 'Hợp lệ' ? 'border-red-100' : 'border-gray-200 opacity-60' ?> p-0 flex relative overflow-hidden">
                        <!-- Cạnh răng cưa -->
                        <div class="w-4 flex flex-col justify-between -ml-2 py-2">
                            <?php for($i=0; $i<6; $i++): ?>
                                <div class="w-4 h-4 bg-[#FAF8F5] rounded-full"></div>
                            <?php endfor; ?>
                        </div>
                        
                        <div class="flex-1 p-4 pl-2 flex flex-col justify-center border-l-2 border-dashed <?= $vc['trang_thai'] === 'Hợp lệ' ? 'border-red-200' : 'border-gray-200' ?>">
                            <div class="flex justify-between items-start mb-2">
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-[10px] font-bold uppercase rounded"><?= $vc['nguon'] ?></span>
                                <?php if($vc['trang_thai'] === 'Hợp lệ'): ?>
                                    <span class="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">Khả dụng</span>
                                <?php else: ?>
                                    <span class="text-[11px] font-bold text-gray-500 bg-gray-100 px-2 py-0.5 rounded">Hết hạn</span>
                                <?php endif; ?>
                            </div>
                            <h4 class="font-black text-lg <?= $vc['trang_thai'] === 'Hợp lệ' ? 'text-[#6B0D18]' : 'text-gray-500' ?> tracking-wide mb-1"><?= $vc['ma'] ?></h4>
                            <p class="text-sm text-gray-600 mb-2"><?= $vc['mota'] ?></p>
                            <p class="text-[11px] text-gray-400 flex items-center gap-1 mt-auto">
                                <span class="iconify" data-icon="mdi:clock-outline"></span> HSD: <?= $vc['han_dung'] ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- TAB: SẢN PHẨM YÊU THÍCH -->
            <div id="tab-yeu_thich" class="tab-content hidden animate-[fadeInPage_0.2s_ease-out]">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    <?php foreach($kh['yeu_thich'] as $sp): ?>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group">
                        <div class="h-32 bg-gray-100 flex items-center justify-center relative">
                            <span class="iconify text-gray-300 text-4xl" data-icon="mdi:image-outline"></span>
                            <div class="absolute top-2 right-2 px-2 py-1 bg-white/90 backdrop-blur rounded text-[10px] font-bold text-gray-700 shadow-sm">
                                <?= $sp['ngay_them'] ?>
                            </div>
                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <h4 class="font-medium text-sm text-gray-800 line-clamp-2 mb-2 group-hover:text-[#6B0D18] transition-colors cursor-pointer"><?= $sp['ten'] ?></h4>
                            <p class="font-bold text-[#6B0D18] mb-3"><?= number_format($sp['gia'], 0, ',', '.') ?>đ</p>
                            
                            <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-50">
                                <span class="text-[10px] text-gray-500 flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> <?= $sp['trang_thai'] ?>
                                </span>
                                <span class="text-[10px] px-2 py-0.5 bg-gray-100 text-gray-600 rounded">Mệnh: <?= $sp['menh'] ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="mt-6 p-4 bg-red-50 border border-red-100 rounded-xl flex items-center justify-between">
                    <div>
                        <h4 class="font-bold text-red-900 text-sm">Gợi ý chăm sóc</h4>
                        <p class="text-xs text-red-700 mt-0.5">Khách hàng có <?= count($kh['yeu_thich']) ?> sản phẩm yêu thích nhưng chưa mua.</p>
                    </div>
                    <button class="px-4 py-2 bg-[#6B0D18] text-white text-xs font-bold rounded-lg shadow-sm hover:bg-[#8A111F]" onclick="openNotifyModal()">Gửi voucher ưu đãi</button>
                </div>
            </div>

            <!-- TAB: ĐÁNH GIÁ -->
            <div id="tab-danh_gia" class="tab-content hidden space-y-4 animate-[fadeInPage_0.2s_ease-out]">
                <?php foreach($kh['danh_gia'] as $dg): ?>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center shrink-0">
                            <span class="iconify text-gray-400 text-xl" data-icon="mdi:image-outline"></span>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-1">
                                <p class="text-sm font-bold text-gray-800 hover:text-[#6B0D18] cursor-pointer"><?= $dg['san_pham'] ?></p>
                                <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 border border-emerald-100 text-[10px] font-bold rounded"><?= $dg['trang_thai'] ?></span>
                            </div>
                            
                            <div class="flex items-center gap-2 mb-2">
                                <div class="flex text-yellow-400 text-sm">
                                    <?php for($i=0; $i<$dg['sao']; $i++) echo '<span class="iconify" data-icon="mdi:star"></span>'; ?>
                                </div>
                                <span class="text-xs text-gray-400">• <?= $dg['ngay'] ?></span>
                            </div>
                            
                            <p class="text-sm text-gray-600 bg-gray-50 p-3 rounded-lg border border-gray-100"><?= $dg['noi_dung'] ?></p>
                            
                            <div class="flex gap-3 mt-3">
                                <button class="text-xs font-bold text-[#6B0D18] hover:underline">Phản hồi</button>
                                <button class="text-xs font-bold text-gray-500 hover:underline">Ẩn đánh giá</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- TAB: GHI CHÚ NỘI BỘ -->
            <div id="tab-ghi_chu" class="tab-content hidden animate-[fadeInPage_0.2s_ease-out]">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
                    <h3 class="text-sm font-bold text-gray-800 mb-2 flex items-center gap-2">
                        <span class="iconify text-gray-400" data-icon="mdi:pencil-outline"></span> Thêm ghi chú nội bộ
                    </h3>
                    <p class="text-xs text-gray-500 mb-3">Ghi chú này chỉ nhân viên quản trị mới thấy, dùng để lưu ý chăm sóc khách hàng.</p>
                    <textarea rows="3" placeholder="Nhập ghi chú mới..." class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] resize-none mb-3"></textarea>
                    <div class="flex justify-end">
                        <button class="px-5 py-2 bg-gray-800 text-white rounded-lg font-bold text-sm hover:bg-black transition-colors shadow-sm">Lưu ghi chú</button>
                    </div>
                </div>

                <div class="space-y-4 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gray-100">
                    <?php foreach($kh['ghi_chu_noibo'] as $gc): ?>
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-white bg-amber-100 text-amber-600 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                            <span class="iconify" data-icon="mdi:note-text-outline"></span>
                        </div>
                        <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-4 rounded-xl border border-gray-100 bg-white shadow-sm">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold text-gray-800"><?= $gc['nguoi_tao'] ?></span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-50 px-2 py-0.5 rounded"><?= $gc['thoi_gian'] ?></span>
                            </div>
                            <p class="text-sm text-gray-600 leading-relaxed"><?= $gc['noi_dung'] ?></p>
                            <div class="mt-2 pt-2 border-t border-gray-50 text-right opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="text-[10px] font-bold text-red-500 hover:underline">Xóa</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- TAB: LỊCH SỬ HOẠT ĐỘNG -->
            <div id="tab-lich_su" class="tab-content hidden animate-[fadeInPage_0.2s_ease-out]">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-bold text-gray-800">Lịch sử hoạt động tài khoản</h3>
                        <select class="px-3 py-1.5 border border-gray-200 rounded-lg text-xs focus:outline-none">
                            <option>Tất cả hoạt động</option>
                            <option>Đơn hàng</option>
                            <option>Đăng nhập</option>
                            <option>Hệ thống</option>
                        </select>
                    </div>

                    <div class="relative border-l-2 border-gray-100 ml-3 pl-6 space-y-6">
                        <?php foreach($kh['lich_su'] as $ls): ?>
                        <div class="relative">
                            <?php 
                                $iconBg = 'bg-gray-100'; $iconColor = 'text-gray-500'; $icon = 'mdi:circle-small';
                                if($ls['loai'] === 'login') { $iconBg = 'bg-blue-50'; $iconColor = 'text-blue-500'; $icon = 'mdi:login'; }
                                if($ls['loai'] === 'order') { $iconBg = 'bg-emerald-50'; $iconColor = 'text-emerald-500'; $icon = 'mdi:receipt-text-check'; }
                                if($ls['loai'] === 'rank') { $iconBg = 'bg-yellow-50'; $iconColor = 'text-yellow-500'; $icon = 'mdi:crown'; }
                            ?>
                            <div class="absolute w-8 h-8 <?= $iconBg ?> <?= $iconColor ?> rounded-full -left-[42px] top-0 flex items-center justify-center ring-4 ring-white border border-gray-100">
                                <span class="iconify text-sm" data-icon="<?= $icon ?>"></span>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 w-fit min-w-[250px]">
                                <p class="text-sm font-medium text-gray-800"><?= $ls['noi_dung'] ?></p>
                                <p class="text-[11px] text-gray-400 mt-1"><?= $ls['thoi_gian'] ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
                        <div class="relative">
                            <div class="absolute w-8 h-8 bg-gray-50 text-gray-400 rounded-full -left-[42px] top-0 flex items-center justify-center ring-4 ring-white border border-gray-100">
                                <span class="iconify text-sm" data-icon="mdi:account-plus"></span>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 w-fit min-w-[250px]">
                                <p class="text-sm font-medium text-gray-800">Đăng ký tài khoản thành công</p>
                                <p class="text-[11px] text-gray-400 mt-1"><?= $kh['ngay_dang_ky'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- POPUPS -->
<!-- ========================================== -->

<!-- Popup Gửi Thông Báo -->
<div id="notifyModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl overflow-hidden animate-[fadeInPage_0.2s_ease-out] flex flex-col md:flex-row">
        <!-- Form -->
        <div class="w-full md:w-3/5 p-6 border-b md:border-b-0 md:border-r border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:bell-outline"></span> Gửi Thông Báo Riêng</h3>
                <button class="md:hidden text-gray-400 hover:text-gray-700" onclick="closeModal('notifyModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Loại thông báo</label>
                    <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        <option>Tin nhắn từ cửa hàng</option>
                        <option>Tặng Voucher ưu đãi</option>
                        <option>Tư vấn phong thủy</option>
                        <option>Hỗ trợ đơn hàng</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Tiêu đề</label>
                    <input type="text" placeholder="Nhập tiêu đề..." value="Quà tặng đặc biệt dành cho bạn!" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Nội dung</label>
                    <textarea rows="4" placeholder="Nhập nội dung..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none">Chuỗi Ngọc xin tặng bạn mã giảm giá 10% cho lần mua sắm tiếp theo. Cảm ơn bạn đã luôn ủng hộ!</textarea>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end gap-3">
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="closeModal('notifyModal')">Hủy</button>
                <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="showToast('Đã gửi thông báo cho khách hàng!'); closeModal('notifyModal');">Gửi thông báo</button>
            </div>
        </div>
        
        <!-- Preview -->
        <div class="w-full md:w-2/5 bg-gray-50 p-6 flex flex-col items-center justify-center relative">
            <button class="hidden md:block absolute top-4 right-4 text-gray-400 hover:text-gray-700" onclick="closeModal('notifyModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
            
            <p class="text-xs font-bold text-gray-400 uppercase mb-4 text-center">Xem trước tin nhắn</p>
            <!-- Mock Phone Notification -->
            <div class="bg-white p-3 rounded-xl shadow-md border border-gray-100 w-full max-w-[250px] relative">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-6 h-6 rounded bg-red-50 text-[#6B0D18] flex items-center justify-center">
                        <span class="iconify text-sm" data-icon="mdi:diamond-stone"></span>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-800 leading-tight">Chuỗi Ngọc</p>
                        <p class="text-[8px] text-gray-400">Vừa xong</p>
                    </div>
                </div>
                <p class="text-xs font-bold text-gray-800 mb-0.5">Quà tặng đặc biệt dành cho bạn!</p>
                <p class="text-[10px] text-gray-600 leading-relaxed line-clamp-3">Chuỗi Ngọc xin tặng bạn mã giảm giá 10% cho lần mua sắm tiếp theo. Cảm ơn bạn đã luôn ủng hộ!</p>
            </div>
        </div>
    </div>
</div>

<!-- Popup Gán Voucher -->
<div id="voucherModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:ticket-percent-outline"></span> Gán Voucher Cho Khách</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="closeModal('voucherModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6">
            <div class="relative mb-4">
                <span class="iconify absolute left-3 top-2.5 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm mã voucher..." class="w-full pl-9 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
            </div>
            
            <div class="space-y-3 max-h-60 overflow-y-auto pr-1">
                <!-- Voucher Item Active -->
                <label class="flex items-start gap-3 p-3 border-2 border-[#6B0D18] bg-red-50/30 rounded-xl cursor-pointer">
                    <input type="radio" name="selectVoucher" class="mt-1 text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-[#6B0D18] text-base">FREESHIP</span>
                            <span class="text-[10px] bg-red-100 text-red-800 px-2 py-0.5 rounded font-bold">SL: 100</span>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">Miễn phí vận chuyển cho đơn từ 0đ</p>
                        <p class="text-[10px] text-gray-400 mt-1">HSD: 30/06/2026</p>
                    </div>
                </label>
                <!-- Voucher Item Normal -->
                <label class="flex items-start gap-3 p-3 border border-gray-200 hover:border-[#6B0D18] rounded-xl cursor-pointer transition-colors">
                    <input type="radio" name="selectVoucher" class="mt-1 text-[#6B0D18] focus:ring-[#6B0D18]">
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-gray-800 text-base">VIP10</span>
                            <span class="text-[10px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded font-bold">SL: 10</span>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">Giảm 10% (Tối đa 500k)</p>
                        <p class="text-[10px] text-gray-400 mt-1">HSD: 30/12/2026</p>
                    </div>
                </label>
            </div>
            
            <div class="mt-4 pt-4 border-t border-gray-100">
                <label class="block text-xs font-bold text-gray-700 mb-1">Ghi chú (Tùy chọn)</label>
                <input type="text" placeholder="Lý do tặng: Đền bù lỗi vận chuyển..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="closeModal('voucherModal')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="showToast('Đã gán voucher thành công!'); closeModal('voucherModal');"><span class="iconify" data-icon="mdi:check"></span> Gán Voucher</button>
        </div>
    </div>
</div>

<!-- Popup Cập Nhật Hạng -->
<div id="rankModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:chevron-double-up"></span> Cập Nhật Hạng Thành Viên</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="closeModal('rankModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-5">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl border border-gray-100">
                <span class="text-sm font-medium text-gray-600">Hạng hiện tại:</span>
                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded border border-yellow-200 uppercase">GOLD</span>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Chọn hạng mới <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-3 gap-2">
                    <label class="border border-gray-200 rounded-lg p-2 text-center cursor-pointer hover:bg-gray-50 flex flex-col items-center gap-1">
                        <input type="radio" name="newRank" value="silver" class="hidden">
                        <span class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-gray-500"><span class="iconify text-sm" data-icon="mdi:medal-outline"></span></span>
                        <span class="text-xs font-bold text-gray-600">SILVER</span>
                    </label>
                    <label class="border-2 border-[#6B0D18] bg-red-50/30 rounded-lg p-2 text-center cursor-pointer flex flex-col items-center gap-1">
                        <input type="radio" name="newRank" value="gold" checked class="hidden">
                        <span class="w-6 h-6 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600"><span class="iconify text-sm" data-icon="mdi:crown"></span></span>
                        <span class="text-xs font-bold text-[#6B0D18]">GOLD</span>
                    </label>
                    <label class="border border-gray-200 rounded-lg p-2 text-center cursor-pointer hover:bg-gray-50 flex flex-col items-center gap-1">
                        <input type="radio" name="newRank" value="diamond" class="hidden">
                        <span class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center text-red-600"><span class="iconify text-sm" data-icon="mdi:diamond-stone"></span></span>
                        <span class="text-xs font-bold text-gray-600">DIAMOND</span>
                    </label>
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Lý do cập nhật (Bắt buộc) <span class="text-red-500">*</span></label>
                <textarea rows="2" placeholder="Vd: Thưởng đặc biệt, Hỗ trợ sự cố..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"></textarea>
            </div>
            <div class="p-3 bg-blue-50 border border-blue-100 rounded-lg flex gap-2 text-blue-800 text-xs">
                <span class="iconify shrink-0 mt-0.5" data-icon="mdi:information-outline"></span>
                <p>Khách hàng sẽ nhận được thông báo về việc thay đổi hạng thành viên trên hệ thống.</p>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="closeModal('rankModal')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="showToast('Đã cập nhật hạng thành công!'); closeModal('rankModal');">Lưu thay đổi</button>
        </div>
    </div>
</div>

<!-- Popup Khóa Tài Khoản -->
<div id="lockModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="p-6 relative">
            <button class="absolute top-4 right-4 text-gray-400 hover:text-gray-700" onclick="closeModal('lockModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
            <div class="w-16 h-16 rounded-full bg-red-50 text-red-500 flex items-center justify-center mb-4 mx-auto border-4 border-white shadow-sm">
                <span class="iconify text-3xl" data-icon="mdi:lock"></span>
            </div>
            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Khóa tài khoản khách hàng?</h3>
            <p class="text-sm text-gray-500 text-center mb-6 px-4">Khách hàng sẽ bị đăng xuất khỏi tất cả thiết bị và không thể đăng nhập cho đến khi bạn mở khóa.</p>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Lý do khóa <span class="text-red-500">*</span></label>
                    <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-red-500">
                        <option value="">-- Chọn lý do --</option>
                        <option value="1">Spam / Đặt hàng ảo liên tục</option>
                        <option value="2">Nghi ngờ bị chiếm quyền (Bảo mật)</option>
                        <option value="3">Vi phạm chính sách cộng đồng</option>
                        <option value="4">Lý do khác</option>
                    </select>
                </div>
                
                <label class="flex items-center gap-2 cursor-pointer bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <input type="checkbox" class="w-4 h-4 text-red-600 rounded border-gray-300 focus:ring-red-500" checked>
                    <span class="text-sm text-gray-700 font-medium">Gửi email thông báo khóa cho khách</span>
                </label>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="closeModal('lockModal')">Hủy bỏ</button>
            <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-bold hover:bg-red-700 shadow-sm" onclick="showToast('Đã khóa tài khoản khách hàng!'); closeModal('lockModal');">Xác nhận Khóa</button>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-[90] flex flex-col gap-2"></div>

<!-- Scripts -->
<script>
    // Tab switching logic
    function switchTab(tabId) {
        // Reset all buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-[#6B0D18]', 'text-white');
            btn.classList.add('text-gray-600', 'hover:bg-gray-50', 'hover:text-[#6B0D18]');
        });
        
        // Hide all contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Active selected button
        const activeBtn = document.getElementById('btn-' + tabId);
        if(activeBtn) {
            activeBtn.classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-[#6B0D18]');
            activeBtn.classList.add('bg-[#6B0D18]', 'text-white');
        }
        
        // Show selected content
        const activeContent = document.getElementById('tab-' + tabId);
        if(activeContent) {
            activeContent.classList.remove('hidden');
        }
        
        // Update URL hash/param without reload (optional UX enhancement)
        const newUrl = window.location.pathname + '?tab=' + tabId;
        window.history.pushState({path:newUrl}, '', newUrl);
    }

    // Initialize tab from URL param
    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const tab = urlParams.get('tab');
        if(tab && document.getElementById('btn-' + tab)) {
            switchTab(tab);
        }
    });

    // Modal Helpers
    function openNotifyModal() { document.getElementById('notifyModal').classList.remove('hidden'); }
    function openVoucherModal() { document.getElementById('voucherModal').classList.remove('hidden'); }
    function openRankModal() { document.getElementById('rankModal').classList.remove('hidden'); }
    function openLockModal() { document.getElementById('lockModal').classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

    // Toast Notification
    function showToast(message) {
        const container = document.getElementById('toastContainer');
        const toast = document.createElement('div');
        toast.className = 'bg-gray-800 text-white px-4 py-3 rounded-xl shadow-xl text-sm font-medium flex items-center gap-3 animate-[fadeInPage_0.3s_ease-out]';
        toast.innerHTML = `
            <span class="iconify text-emerald-400 text-lg" data-icon="mdi:check-circle"></span>
            ${message}
            <button class="ml-2 text-gray-400 hover:text-white transition-colors" onclick="this.parentElement.remove()">
                <span class="iconify text-lg" data-icon="mdi:close"></span>
            </button>
        `;
        container.appendChild(toast);
        
        setTimeout(() => {
            if(toast.parentElement) {
                toast.classList.add('opacity-0', 'translate-y-2', 'transition-all', 'duration-300');
                setTimeout(() => toast.remove(), 300);
            }
        }, 3000);
    }
</script>
