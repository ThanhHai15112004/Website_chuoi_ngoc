<?php
// views/pages/ket_qua_ban_menh.php
if (!empty($not_found)):
?>
<main class="min-h-screen flex items-center justify-center bg-[#FAF7F2]">
    <div class="text-center px-4">
        <div class="text-6xl mb-4">🔮</div>
        <h1 class="text-3xl font-bold text-gray-800 mb-3">Không tìm thấy kết quả</h1>
        <p class="text-gray-500 mb-8">Kết quả phân tích này không tồn tại hoặc đã hết hạn.</p>
        <a href="<?= APP_URL ?>/vong-theo-menh" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-white font-semibold" style="background:#8b0000;">
            <iconify-icon icon="mdi:arrow-left"></iconify-icon> Tra cứu lại
        </a>
    </div>
</main>
<?php return; endif; ?>

<?php
$color     = $ket_qua['ngu_hanh']['color'];
$icon      = $ket_qua['ngu_hanh']['icon'];
$nguHanh   = $ket_qua['ngu_hanh']['ten'];
$r         = $ket_qua;
$row_data  = $row;

// Breadcrumb
$breadcrumb_items = $breadcrumbs;
require_once __DIR__ . '/../components/common/breadcrumb.php';
?>


<main class="min-h-screen pb-20" style="background:linear-gradient(180deg,#FAF7F2 0%, #fff 300px);">
<div class="max-w-6xl mx-auto px-4 pt-6">

<!-- ===== HERO HEADER ===== -->
<div class="rounded-3xl bg-white border border-gray-100 shadow-sm mb-10 overflow-hidden relative" data-aos="fade-up">
    <!-- BG Pattern nhẹ -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br opacity-20 rounded-full blur-3xl -mr-20 -mt-20" style="background-image: linear-gradient(to bottom right, <?= $color ?>, transparent);"></div>

    <div class="relative p-8 md:p-10 flex flex-col md:flex-row items-center gap-8">
        <!-- Mệnh Badge -->
        <div class="shrink-0 text-center relative z-10">
            <div class="w-32 h-32 md:w-36 md:h-36 rounded-full flex flex-col items-center justify-center text-white shadow-xl mx-auto mb-4 border-4 border-white" style="background:linear-gradient(135deg,<?= $color ?>,<?= $color ?>dd);">
                <span class="text-4xl md:text-5xl mb-1"><?= $icon ?></span>
                <span class="text-xl md:text-2xl font-black tracking-tight">Mệnh <?= $nguHanh ?></span>
            </div>
            <div class="text-gray-600 font-medium"><?= $r['ngu_hanh']['thien_can'] ?> <?= $r['ngu_hanh']['dia_chi'] ?> – Tuổi <?= $r['ngu_hanh']['con_giap'] ?></div>
        </div>
        
        <!-- Thông tin chính -->
        <div class="flex-1 text-center md:text-left relative z-10">
            <div class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider mb-3" style="color:<?= $color ?>; background:<?= $color ?>15;">BẢN PHÂN TÍCH BẢN MỆNH PHONG THỦY</div>
            
            <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-4 leading-tight">
                <?= $r['ngu_hanh']['thien_can'] ?> <?= $r['ngu_hanh']['dia_chi'] ?> <br class="hidden md:block">
                <span class="text-gray-500 font-medium text-2xl md:text-3xl">Ngũ Hành</span> <span style="color:<?= $color ?>;"><?= $nguHanh ?></span>
            </h1>
            
            <div class="flex flex-wrap gap-2 justify-center md:justify-start mb-6">
                <span class="px-3 py-1.5 rounded-lg text-sm font-semibold bg-gray-50 text-gray-700 border border-gray-200">
                    <iconify-icon icon="mdi:calendar-blank" class="inline-block mr-1 align-middle text-gray-400"></iconify-icon>
                    <?= $r['thong_tin_co_ban']['gioi_tinh_ten'] ?> · <?= $r['thong_tin_co_ban']['ngay_thang'] ?>/<?= $r['thong_tin_co_ban']['nam_sinh_duong'] ?> DL
                </span>
                <span class="px-3 py-1.5 rounded-lg text-sm font-semibold bg-gray-50 text-gray-700 border border-gray-200">
                    <iconify-icon icon="mdi:compass-outline" class="inline-block mr-1 align-middle text-gray-400"></iconify-icon>
                    Cung <?= $r['cung_phi']['ten'] ?> (<?= $r['cung_phi']['so'] ?>)
                </span>
                <span class="px-3 py-1.5 rounded-lg text-sm font-semibold border" style="background:<?= $color ?>10; color:<?= $color ?>; border-color:<?= $color ?>33;">
                    <?= $r['cung_phi']['nhom_menh'] ?>
                </span>
            </div>

            <!-- Stats -->
            <div class="flex flex-wrap gap-6 justify-center md:justify-start items-center p-4 rounded-2xl bg-gray-50 border border-gray-100">
                <div class="text-center md:text-left">
                    <div class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1">Tổng Vận Khí</div>
                    <div class="text-2xl font-black text-gray-900"><?= $r['diem_van_khi']['tong_van_khi'] ?><span class="text-base font-normal text-gray-400">/100</span></div>
                    <div class="text-xs font-bold mt-1" style="color:<?= $color ?>;"><?= $r['diem_van_khi']['nam_van'] ?></div>
                </div>
                <div class="w-px h-12 bg-gray-200 hidden md:block"></div>
                <div class="text-center md:text-left">
                    <div class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1">Hành Bản Mệnh</div>
                    <div class="text-2xl font-black" style="color:<?= $color ?>;"><?= $nguHanh ?></div>
                </div>
                <div class="w-px h-12 bg-gray-200 hidden md:block"></div>
                <div class="text-center md:text-left">
                    <div class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1">Cung Phi</div>
                    <div class="text-2xl font-black text-gray-900">Cung <?= $r['cung_phi']['so'] ?></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action buttons -->
    <div class="bg-gray-50 border-t border-gray-100 px-8 py-4 flex flex-wrap gap-3 justify-center md:justify-start">
        <a href="<?= APP_URL ?>/vong-theo-menh" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-700 bg-white border border-gray-200 hover:bg-gray-50 transition-all shadow-sm">
            <iconify-icon icon="mdi:refresh"></iconify-icon> Tra cứu mới
        </a>
        <button onclick="window.print()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-700 bg-white border border-gray-200 hover:bg-gray-50 transition-all shadow-sm">
            <iconify-icon icon="mdi:printer-outline"></iconify-icon> In kết quả
        </button>
        <?php if (!empty($_SESSION['user_id'])): ?>
        <a href="<?= APP_URL ?>/tai-khoan#tab-ban-menh" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold transition-all shadow-sm text-white" style="background:<?= $color ?>;">
            <iconify-icon icon="mdi:history"></iconify-icon> Lịch sử tra cứu
        </a>
        <?php endif; ?>
    </div>

<!-- ===== BODY CONTENT GRID ===== -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

<!-- LEFT COLUMN (lg:2/3) -->
<div class="lg:col-span-2 space-y-8">

    <!-- SECTION: Ngũ Hành Chi Tiết -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white text-sm" style="background:<?= $color ?>;">☯</div>
            <h2 class="text-lg font-bold text-gray-900">Ngũ Hành Bản Mệnh</h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="text-center p-4 rounded-xl" style="background:<?= $color ?>11;">
                    <div class="text-3xl mb-2"><?= $icon ?></div>
                    <div class="text-xl font-black" style="color:<?= $color ?>;"><?= $nguHanh ?></div>
                    <div class="text-xs text-gray-500 mt-1">Ngũ Hành Chủ</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-green-50">
                    <iconify-icon icon="mdi:arrow-up-circle" class="text-3xl text-green-600 mb-2"></iconify-icon>
                    <div class="text-lg font-bold text-green-700"><?= $r['ngu_hanh']['tuong_sinh_boi'] ?> sinh <?= $nguHanh ?></div>
                    <div class="text-xs text-gray-500 mt-1">Hành Tương Sinh</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-red-50">
                    <iconify-icon icon="mdi:arrow-down-circle" class="text-3xl text-red-600 mb-2"></iconify-icon>
                    <div class="text-lg font-bold text-red-700"><?= $r['ngu_hanh']['tuong_khac_boi'] ?> khắc <?= $nguHanh ?></div>
                    <div class="text-xs text-gray-500 mt-1">Hành Tương Khắc</div>
                </div>
            </div>
            
            <!-- Can Chi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-center gap-4 p-4 rounded-xl bg-gray-50 border border-gray-100">
                    <div class="w-12 h-12 shrink-0 rounded-xl flex items-center justify-center text-2xl font-black text-white shadow-sm" style="background:<?= $color ?>;"><?= mb_substr($r['ngu_hanh']['thien_can'], 0, 1) ?></div>
                    <div>
                        <div class="text-xs text-gray-500">Thiên Can</div>
                        <div class="font-bold text-gray-900"><?= $r['ngu_hanh']['thien_can'] ?></div>
                        <div class="text-xs text-gray-400">Hành <?= $nguHanh ?></div>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 rounded-xl bg-gray-50 border border-gray-100">
                    <div class="w-12 h-12 shrink-0 rounded-xl flex items-center justify-center text-2xl font-black text-white shadow-sm" style="background:#4a5568;"><?= mb_substr($r['ngu_hanh']['dia_chi'], 0, 1) ?></div>
                    <div>
                        <div class="text-xs text-gray-500">Địa Chi – Tuổi</div>
                        <div class="font-bold text-gray-900"><?= $r['ngu_hanh']['dia_chi'] ?></div>
                        <div class="text-xs text-gray-400">Tuổi <?= $r['ngu_hanh']['con_giap'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION: Màu Sắc Cát Tường -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white text-sm" style="background:<?= $color ?>;">🎨</div>
            <h2 class="text-lg font-bold text-gray-900">Màu Sắc Cát Tường & Màu Cần Tránh</h2>
        </div>
        <div class="p-6 space-y-6">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <iconify-icon icon="mdi:check-circle" class="text-green-600 text-xl"></iconify-icon>
                    <span class="font-semibold text-gray-900">Màu mang lại may mắn</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <?php foreach ($r['mau_sac']['cat'] as $mau): ?>
                    <div class="rounded-xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex flex-col">
                        <div class="h-16 shrink-0" style="background:<?= $mau['hex'] ?>;"></div>
                        <div class="p-3">
                            <div class="font-semibold text-gray-900 text-sm"><?= $mau['ten'] ?></div>
                            <div class="text-xs text-gray-400 font-mono"><?= $mau['hex'] ?></div>
                            <p class="text-xs text-gray-600 mt-1 leading-relaxed line-clamp-2"><?= $mau['y_nghia'] ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <iconify-icon icon="mdi:close-circle" class="text-red-500 text-xl"></iconify-icon>
                    <span class="font-semibold text-gray-900">Màu cần hạn chế</span>
                </div>
                <div class="flex flex-wrap gap-3">
                    <?php foreach ($r['mau_sac']['hung'] as $mau): ?>
                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl border border-red-100 bg-red-50">
                        <div class="w-5 h-5 rounded-full border-2 border-white shadow-sm" style="background:<?= $mau['hex'] ?>;"></div>
                        <div>
                            <span class="text-sm font-semibold text-red-700"><?= $mau['ten'] ?></span>
                            <span class="text-xs text-gray-500 ml-2">– <?= $mau['ly_do'] ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION: Đá Quý Hợp Mệnh -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white text-sm" style="background:<?= $color ?>;">💎</div>
            <h2 class="text-lg font-bold text-gray-900">Đá Quý Hợp Mệnh</h2>
        </div>
        <div class="p-6 space-y-6">
            <!-- Tốt nhất -->
            <div>
                <div class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold mb-3 bg-yellow-100 text-yellow-700">
                    <iconify-icon icon="mdi:star"></iconify-icon> Tương Sinh – Tốt Nhất
                </div>
                <div class="space-y-3">
                    <?php foreach ($r['da_quy']['tot_nhat'] as $da): ?>
                    <div class="flex items-start gap-4 p-4 rounded-xl border border-yellow-100 bg-yellow-50">
                        <div class="w-10 h-10 rounded-full shrink-0 flex items-center justify-center text-xl" style="background:<?= $da['mau_hex'] ?>22; border: 2px solid <?= $da['mau_hex'] ?>;">
                            <span style="color:<?= $da['mau_hex'] ?>;">💎</span>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900"><?= $da['ten'] ?></div>
                            <p class="text-sm text-gray-600 mt-1 leading-relaxed"><?= $da['y_nghia'] ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Phù hợp -->
            <div>
                <div class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold mb-3 bg-green-100 text-green-700">
                    <iconify-icon icon="mdi:check"></iconify-icon> Cùng Hành – Phù Hợp
                </div>
                <div class="space-y-3">
                    <?php foreach ($r['da_quy']['phu_hop'] as $da): ?>
                    <div class="flex items-start gap-4 p-4 rounded-xl border border-green-100 bg-green-50">
                        <div class="w-10 h-10 rounded-full shrink-0 flex items-center justify-center" style="background:<?= $da['mau_hex'] ?>22; border: 2px solid <?= $da['mau_hex'] ?>;">
                            <span>🪨</span>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900"><?= $da['ten'] ?></div>
                            <p class="text-sm text-gray-600 mt-1 leading-relaxed"><?= $da['y_nghia'] ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Cần tránh -->
            <div class="p-4 rounded-xl border border-red-100 bg-red-50">
                <div class="flex items-center gap-2 mb-2">
                    <iconify-icon icon="mdi:alert" class="text-red-500"></iconify-icon>
                    <span class="font-semibold text-red-700">Nên tránh các loại đá</span>
                </div>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($r['da_quy']['can_tranh'] as $ten): ?>
                    <span class="px-3 py-1 bg-white border border-red-200 rounded-full text-xs font-medium text-red-600"><?= $ten ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION: Lời Khuyên Theo Mong Muốn -->
    <?php if (!empty($r['loi_khuyen'])): ?>
    <div class="rounded-2xl shadow-sm border overflow-hidden" style="border-color:<?= $color ?>33; background:linear-gradient(135deg, <?= $color ?>0a, white);" data-aos="fade-up">
        <div class="px-6 py-4 border-b flex items-center gap-3" style="border-color:<?= $color ?>22; background:<?= $color ?>0d;">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white text-sm" style="background:<?= $color ?>;">⭐</div>
            <h2 class="text-lg font-bold text-gray-900"><?= $r['loi_khuyen']['tieu_de'] ?></h2>
        </div>
        <div class="p-6">
            <p class="text-gray-700 leading-relaxed mb-5 text-base"><?= $r['loi_khuyen']['mo_ta'] ?></p>
            <div class="space-y-3">
                <?php foreach ($r['loi_khuyen']['noi_dung'] as $lk): ?>
                <div class="flex items-start gap-3 p-4 bg-white rounded-xl border border-gray-100 shadow-sm">
                    <div class="text-lg leading-none shrink-0 mt-0.5"><?= mb_substr($lk, 0, 2) ?></div>
                    <p class="text-sm text-gray-700 leading-relaxed"><?= htmlspecialchars(preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', mb_substr($lk, 3)), ENT_QUOTES, 'UTF-8', false) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- SECTION: Sản Phẩm Gợi Ý -->
    <?php if (!empty($r['san_pham_goi_y'])): ?>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white" style="background:<?= $color ?>;">🛍</div>
                <h2 class="text-lg font-bold text-gray-900">Vòng Ngọc Hợp Mệnh <?= $nguHanh ?></h2>
            </div>
            <a href="<?= APP_URL ?>/san-pham" class="text-sm font-semibold hover:underline" style="color:<?= $color ?>;">Xem tất cả →</a>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php foreach ($r['san_pham_goi_y'] as $sp): 
                    $gia = $sp['gia_khuyen_mai'] ?: $sp['gia_ban'];
                    $badgeClass = $sp['loai_goi_y'] === 'tuong_hop' ? 'bg-amber-100 text-amber-700' : 
                                  ($sp['loai_goi_y'] === 'tuong_sinh' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700');
                    $badgeTen = $sp['loai_goi_y'] === 'tuong_hop' ? 'Tương hợp' : 
                                ($sp['loai_goi_y'] === 'tuong_sinh' ? 'Tương sinh' : 'Phù hợp');
                ?>
                <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $sp['id'] ?>" class="group block">
                    <div class="relative rounded-xl overflow-hidden mb-3 border border-gray-100 group-hover:shadow-lg transition-all duration-300">
                        <div class="absolute top-2 right-2 z-10">
                            <span class="px-2 py-0.5 rounded-md text-xs font-bold <?= $badgeClass ?>"><?= $badgeTen ?></span>
                        </div>
                        <img src="<?= APP_URL ?>/<?= ltrim($sp['hinh_anh_chinh'], '/') ?>" alt="<?= htmlspecialchars($sp['ten_sp']) ?>" 
                             class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-500"
                             onerror="this.src='<?= APP_URL ?>/public/images/placeholder.png'">
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 group-hover:text-[#8b0000] transition-colors line-clamp-2 mb-1"><?= htmlspecialchars($sp['ten_sp']) ?></h3>
                    <div class="font-bold text-base" style="color:#8b0000;"><?= number_format($gia, 0, ',', '.') ?>đ</div>
                    <?php if ($sp['gia_khuyen_mai']): ?>
                    <div class="text-xs text-gray-400 line-through"><?= number_format($sp['gia_ban'], 0, ',', '.') ?>đ</div>
                    <?php endif; ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>

<!-- RIGHT COLUMN (lg:1/3) -->
<div class="space-y-6">

    <!-- Điểm Vận Khí -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-4" data-aos="fade-up">
        <div class="px-5 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <iconify-icon icon="mdi:chart-donut" class="text-xl" style="color:<?= $color ?>;"></iconify-icon>
                Chỉ Số Vận Khí <?= date('Y') ?>
            </h3>
        </div>
        <div class="p-5 space-y-4">
            <?php
            $categories = [
                'tai_loc' => ['Tài Lộc & Công Danh', 'mdi:cash-multiple', '#D4AF37'],
                'binh_an' => ['Bình An & Sức Khỏe', 'mdi:heart-pulse', '#22C55E'],
                'tinh_duyen' => ['Tình Duyên & Gia Đạo', 'mdi:heart', '#EC4899'],
                'ho_menh' => ['Hộ Mệnh & Bảo Vệ', 'mdi:shield-check', '#8B5CF6'],
            ];
            foreach ($categories as $key => $info):
                $diem = $r['diem_van_khi'][$key];
            ?>
            <div>
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-2">
                        <iconify-icon icon="<?= $info[1] ?>" class="text-base" style="color:<?= $info[2] ?>;"></iconify-icon>
                        <span class="text-sm font-medium text-gray-700"><?= $info[0] ?></span>
                    </div>
                    <span class="text-sm font-bold" style="color:<?= $info[2] ?>;"><?= $diem ?></span>
                </div>
                <div class="h-2.5 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full rounded-full transition-all duration-1000" style="width:<?= $diem ?>%; background:<?= $info[2] ?>;"></div>
                </div>
            </div>
            <?php endforeach; ?>

            <div class="pt-3 mt-3 border-t border-gray-100">
                <div class="flex items-center justify-between">
                    <span class="font-semibold text-gray-700">Tổng Vận Khí</span>
                    <span class="text-xl font-black" style="color:<?= $color ?>;"><?= $r['diem_van_khi']['tong_van_khi'] ?>/100</span>
                </div>
                <div class="mt-2 text-center py-2 rounded-lg text-sm font-bold" style="background:<?= $color ?>15; color:<?= $color ?>;">
                    <?= $r['diem_van_khi']['nam_van'] ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Cung Phi & Hướng -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up">
        <div class="px-5 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <iconify-icon icon="mdi:compass" class="text-xl" style="color:<?= $color ?>;"></iconify-icon>
                Cung Phi & Hướng Vượng
            </h3>
        </div>
        <div class="p-5">
            <div class="text-center mb-5">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl text-white text-2xl font-black mb-2" style="background:<?= $color ?>;">
                    <?= $r['cung_phi']['so'] ?>
                </div>
                <div class="font-bold text-gray-900">Cung <?= $r['cung_phi']['ten'] ?></div>
                <div class="text-sm text-gray-500"><?= $r['cung_phi']['hanh'] ?> Hành · <?= $r['cung_phi']['phuong_chinh'] ?></div>
            </div>

            <div class="space-y-3">
                <div>
                    <div class="text-xs font-semibold text-green-700 mb-2 flex items-center gap-1">
                        <iconify-icon icon="mdi:arrow-up-circle"></iconify-icon> Hướng Tốt (<?= $r['cung_phi']['nhom_menh'] ?>)
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($r['cung_phi']['huong_tot'] as $h): ?>
                        <span class="px-2.5 py-1 bg-green-50 border border-green-200 text-green-700 rounded-lg text-xs font-semibold"><?= $h ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div>
                    <div class="text-xs font-semibold text-red-600 mb-2 flex items-center gap-1">
                        <iconify-icon icon="mdi:arrow-down-circle"></iconify-icon> Hướng Kỵ
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($r['cung_phi']['huong_xau'] as $h): ?>
                        <span class="px-2.5 py-1 bg-red-50 border border-red-200 text-red-600 rounded-lg text-xs font-semibold"><?= $h ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thông Tin Cơ Bản -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up">
        <div class="px-5 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <iconify-icon icon="mdi:information-outline" class="text-xl" style="color:<?= $color ?>;"></iconify-icon>
                Thông Tin Tra Cứu
            </h3>
        </div>
        <div class="p-5 space-y-3 text-sm">
            <div class="flex justify-between"><span class="text-gray-500">Ngày sinh DL</span><span class="font-semibold"><?= $r['thong_tin_co_ban']['ngay_thang'] ?>/<?= $r['thong_tin_co_ban']['nam_sinh_duong'] ?></span></div>
            <div class="flex justify-between"><span class="text-gray-500">Năm Âm lịch</span><span class="font-semibold"><?= $r['thong_tin_co_ban']['nam_sinh_am'] ?></span></div>
            <div class="flex justify-between"><span class="text-gray-500">Giới tính</span><span class="font-semibold"><?= $r['thong_tin_co_ban']['gioi_tinh_ten'] ?></span></div>
            <div class="flex justify-between"><span class="text-gray-500">Thiên Can</span><span class="font-semibold"><?= $r['ngu_hanh']['thien_can'] ?></span></div>
            <div class="flex justify-between"><span class="text-gray-500">Địa Chi</span><span class="font-semibold"><?= $r['ngu_hanh']['dia_chi'] ?> (<?= $r['ngu_hanh']['con_giap'] ?>)</span></div>
            <div class="flex justify-between"><span class="text-gray-500">Cung Phi</span><span class="font-semibold">Cung <?= $r['cung_phi']['so'] ?> – <?= $r['cung_phi']['ten'] ?></span></div>
            <div class="flex justify-between"><span class="text-gray-500">Nhóm mệnh</span><span class="font-semibold"><?= $r['cung_phi']['nhom_menh'] ?></span></div>
            <div class="pt-2 border-t border-gray-100 flex justify-between"><span class="text-gray-500">Ngày tra cứu</span><span class="font-semibold"><?= date('d/m/Y', strtotime($row_data['ngay_tra'])) ?></span></div>
        </div>
    </div>

</div><!-- end right column -->
</div><!-- end grid -->

</div><!-- end container -->
</main>
