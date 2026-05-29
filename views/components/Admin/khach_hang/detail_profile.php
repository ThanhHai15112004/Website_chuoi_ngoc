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
                    <button class="px-4 py-2 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-lg text-sm font-bold hover:bg-emerald-100 transition-colors flex items-center gap-2 shadow-sm" onclick="openLockModal('<?= $kh['id'] ?>')">
                        <span class="iconify" data-icon="mdi:lock-open-outline"></span> Mở khóa tài khoản
                    </button>
                <?php else: ?>
                    <button class="px-3 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors flex items-center gap-2" onclick="openLockModal('<?= $kh['id'] ?>')">
                        Khóa tài khoản
                    </button>
                <?php endif; ?>
                <button class="px-3 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors flex items-center gap-2" onclick="openRankModal('<?= $kh['id'] ?>')">
                    Cập nhật hạng
                </button>
                <button class="px-3 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors flex items-center gap-2" onclick="openVoucherModal('<?= $kh['id'] ?>')">
                    Gán voucher
                </button>
                <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] transition-colors flex items-center gap-2 shadow-sm" onclick="openNotifyModal('<?= $kh['id'] ?>')">
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

