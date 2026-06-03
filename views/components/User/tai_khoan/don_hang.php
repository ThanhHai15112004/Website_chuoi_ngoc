<?php
use App\Constants\DonHangConstants;

$trangThaiMap = [
    DonHangConstants::TRANG_THAI_CHO_XU_LY => ['text' => 'Chờ xác nhận', 'bg' => 'bg-yellow-50', 'color' => 'text-yellow-700', 'border' => 'border-yellow-100', 'dot' => 'bg-yellow-500'],
    DonHangConstants::TRANG_THAI_DANG_XU_LY => ['text' => 'Đang xử lý', 'bg' => 'bg-blue-50', 'color' => 'text-blue-700', 'border' => 'border-blue-100', 'dot' => 'bg-blue-500'],
    DonHangConstants::TRANG_THAI_DA_GIAO_CHO_DON_VI_VAN_CHUYEN => ['text' => 'Đang giao hàng', 'bg' => 'bg-teal-50', 'color' => 'text-teal-700', 'border' => 'border-teal-100', 'dot' => 'bg-teal-500'],
    DonHangConstants::TRANG_THAI_DA_GIAO_HANG => ['text' => 'Hoàn thành', 'bg' => 'bg-green-50', 'color' => 'text-green-700', 'border' => 'border-green-100', 'dot' => 'bg-green-500'],
    DonHangConstants::TRANG_THAI_DA_HUY => ['text' => 'Đã hủy', 'bg' => 'bg-red-100', 'color' => 'text-[#8b0000]', 'border' => 'border-red-200', 'dot' => 'bg-red-500'],
];

$donHangItems = $don_hang['items'] ?? [];
$totalDon = $don_hang['total'] ?? 0;

// Đếm theo trạng thái
$demTrangThai = [];
foreach ($donHangItems as $dh) {
    $tt = $dh['trang_thai_don_hang'];
    $demTrangThai[$tt] = ($demTrangThai[$tt] ?? 0) + 1;
}
?>
<div class="bg-white rounded-2xl shadow-sm p-6 lg:p-10">
    
    <!-- Tiêu đề trang -->
    <div class="mb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Lịch sử đơn hàng</h2>
            <p class="text-gray-500 mt-1 text-sm">Theo dõi, kiểm tra và quản lý các đơn hàng bạn đã đặt.</p>
        </div>
        <div class="text-sm text-gray-600 bg-red-50 px-4 py-2 rounded-lg border border-red-100">
            Bạn có <span class="text-[#8b0000] font-bold text-base"><?= $totalDon ?></span> đơn hàng
        </div>
    </div>

    <?php if (!empty($donHangItems)): ?>
    <!-- Danh sách Đơn hàng -->
    <div class="space-y-6">
        <?php foreach ($donHangItems as $dh): ?>
        <?php 
        $tt = $trangThaiMap[$dh['trang_thai_don_hang']] ?? ['text' => 'Không rõ', 'bg' => 'bg-gray-50', 'color' => 'text-gray-700', 'border' => 'border-gray-100', 'dot' => 'bg-gray-500'];
        $isHuy = $dh['trang_thai_don_hang'] == DonHangConstants::TRANG_THAI_DA_HUY;
        $isHoanThanh = $dh['trang_thai_don_hang'] == DonHangConstants::TRANG_THAI_DA_GIAO_HANG;
        $isChoXuLy = $dh['trang_thai_don_hang'] == DonHangConstants::TRANG_THAI_CHO_XU_LY;
        ?>
        <div class="border <?= $isHuy ? 'border-red-100' : 'border-gray-200' ?> rounded-2xl overflow-hidden hover:shadow-md transition-shadow bg-white">
            <!-- Header Card -->
            <div class="<?= $isHuy ? 'bg-red-50/50' : 'bg-gray-50/50' ?> px-4 py-3 sm:px-6 sm:py-4 border-b <?= $isHuy ? 'border-red-100' : 'border-gray-100' ?> flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm">
                    <span class="font-bold text-gray-900">Mã đơn: #<?= htmlspecialchars($dh['ma_don_hang']) ?></span>
                    <span class="hidden sm:inline text-gray-300">|</span>
                    <span class="text-gray-500">Ngày đặt: <?= date('d/m/Y', strtotime($dh['ngay_tao'])) ?></span>
                    <span class="hidden sm:inline text-gray-300">|</span>
                    <span class="text-gray-500">Thanh toán: <?= htmlspecialchars($dh['pt_thanh_toan'] ?? 'COD') ?></span>
                </div>
                <div class="self-start sm:self-auto">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium <?= $tt['bg'] ?> <?= $tt['color'] ?> border <?= $tt['border'] ?>">
                        <span class="w-1.5 h-1.5 rounded-full <?= $tt['dot'] ?>"></span>
                        <?= $tt['text'] ?>
                    </span>
                </div>
            </div>
            
            <!-- Danh sách sản phẩm -->
            <div class="p-4 sm:p-6">
                <?php $chiTiet = $dh['chi_tiet'] ?? []; ?>
                <?php foreach (array_slice($chiTiet, 0, 2) as $idx => $ct): ?>
                <?php if ($idx > 0): ?>
                <div class="my-4 border-t border-dashed border-gray-200"></div>
                <?php endif; ?>
                <div class="flex gap-4 items-start <?= $isHuy ? 'opacity-75' : '' ?>">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gray-50 rounded-xl overflow-hidden shrink-0 border border-gray-100">
                        <?php if (!empty($ct['hinh_anh_chinh'])): ?>
                        <img src="<?= get_image_url($ct['hinh_anh_chinh']) ?>" alt="<?= htmlspecialchars($ct['ten_sp']) ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                        <div class="w-full h-full bg-[#8b0000] opacity-20"></div>
                        <?php endif; ?>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-col sm:flex-row sm:justify-between gap-2">
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1 truncate"><?= htmlspecialchars($ct['ten_sp']) ?></h3>
                                <?php if (!empty($ct['thuoc_tinh'])): ?>
                                <p class="text-sm text-gray-500 mb-1">Phân loại: <?= htmlspecialchars($ct['thuoc_tinh']) ?></p>
                                <?php endif; ?>
                                <p class="text-sm font-medium text-gray-700">x<?= $ct['so_luong'] ?></p>
                            </div>
                            <div class="sm:text-right">
                                <p class="text-gray-900 font-medium"><?= number_format($ct['don_gia'], 0, ',', '.') ?>đ</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <?php if (count($chiTiet) > 2): ?>
                <div class="mt-4 text-center">
                    <a href="<?= APP_URL ?>/chi-tiet-don-hang?id=<?= htmlspecialchars($dh['ma_don_hang']) ?>" class="text-sm text-[#8b0000] hover:underline font-medium">Xem thêm <?= count($chiTiet) - 2 ?> sản phẩm khác</a>
                </div>
                <?php endif; ?>
            </div>

            <!-- Footer Card -->
            <div class="bg-gray-50/30 px-4 py-4 sm:px-6 border-t border-gray-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <div class="text-right lg:text-left">
                    <?php if (!empty($dh['tien_giam_gia']) && $dh['tien_giam_gia'] > 0): ?>
                    <p class="text-sm text-gray-500 mb-1">Giảm giá: <span class="text-green-600">-<?= number_format($dh['tien_giam_gia'], 0, ',', '.') ?>đ</span></p>
                    <?php endif; ?>
                    <div class="text-sm text-gray-600">
                        Tổng thanh toán: <span class="text-xl font-bold <?= $isHuy ? 'text-gray-500 line-through' : 'text-[#8b0000]' ?> ml-2"><?= number_format($dh['thanh_tien'], 0, ',', '.') ?>đ</span>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                    <?php if ($isChoXuLy): ?>
                    <button onclick="huyDonHang('<?= htmlspecialchars($dh['ma_don_hang']) ?>')" class="flex-1 sm:flex-none px-6 py-2.5 border border-[#8b0000] text-[#8b0000] rounded-xl font-medium hover:bg-red-50 transition-colors text-sm text-center">
                        Hủy đơn
                    </button>
                    <?php endif; ?>
                    <?php if ($isHuy || $isHoanThanh): ?>
                    <button class="flex-1 sm:flex-none px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-100 transition-colors text-sm text-center">
                        Mua lại
                    </button>
                    <?php endif; ?>
                    <a href="<?= APP_URL ?>/chi-tiet-don-hang?id=<?= htmlspecialchars($dh['ma_don_hang']) ?>" class="flex-1 sm:flex-none px-6 py-2.5 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] shadow-sm transition-colors text-sm text-center" style="text-decoration: none;">
                        Xem chi tiết
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <?php else: ?>
    <!-- Empty State -->
    <div class="flex flex-col items-center justify-center py-16 text-center">
        <div class="w-32 h-32 mb-6 bg-red-50 rounded-full flex items-center justify-center">
            <iconify-icon icon="ph:package" class="text-6xl text-[#8b0000] opacity-50"></iconify-icon>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Bạn chưa có đơn hàng nào</h3>
        <p class="text-gray-500 mb-8 max-w-md">Hãy khám phá các mẫu vòng ngọc và chuỗi đá phong thủy cao cấp phù hợp với bản mệnh của bạn.</p>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="<?= APP_URL ?>/san-pham" class="px-8 py-3 bg-[#8b0000] text-white rounded-xl font-bold shadow-md hover:bg-[#700000] hover:shadow-lg transition-all text-sm">
                Khám phá sản phẩm
            </a>
            <a href="<?= APP_URL ?>/vong-theo-menh" class="px-8 py-3 bg-white border-2 border-[#8b0000] text-[#8b0000] rounded-xl font-bold hover:bg-red-50 transition-colors text-sm">
                Tra cứu Vòng Sinh Mệnh
            </a>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
function huyDonHang(maDon) {
    Swal.fire({
        title: 'Xác nhận hủy đơn hàng',
        html: `Bạn có chắc muốn hủy đơn hàng <strong>#${maDon}</strong>?<br>Thao tác này không thể hoàn tác.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8b0000',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Xác nhận hủy',
        cancelButtonText: 'Không, giữ đơn'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('<?= APP_URL ?>/chi-tiet-don-hang/huy', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'ma_don_hang=' + maDon
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    Toast.fire({ icon: 'success', title: 'Đã hủy đơn hàng thành công!' });
                    setTimeout(() => location.reload(), 1500);
                } else {
                    Toast.fire({ icon: 'error', title: data.message || 'Không thể hủy đơn hàng.' });
                }
            })
            .catch(() => Toast.fire({ icon: 'error', title: 'Có lỗi xảy ra.' }));
        }
    });
}
</script>
