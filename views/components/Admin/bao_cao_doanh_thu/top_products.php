<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 h-full flex flex-col">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-gray-800">Doanh thu theo sản phẩm</h3>
        <a href="<?= APP_URL ?>/admin/bao-cao-san-pham" class="text-sm text-[#6B0D18] hover:underline font-medium">Báo cáo chi tiết</a>
    </div>

    <!-- Top Sản Phẩm Bán Chạy -->
    <div class="flex-1 space-y-4">
        <?php foreach($topProducts as $index => $sp): ?>
        <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-red-50/50 border border-transparent hover:border-red-100 transition-colors group">
            <div class="w-6 font-bold text-gray-400 text-center flex-shrink-0">
                <?php if($index === 0): ?>
                    <span class="iconify text-yellow-500 text-2xl mx-auto" data-icon="mdi:crown"></span>
                <?php else: ?>
                    #<?= $index + 1 ?>
                <?php endif; ?>
            </div>
            <img src="<?= $sp['hinh_anh'] ?>" alt="<?= $sp['ten_sp'] ?>" class="w-12 h-12 rounded object-cover border border-gray-200 shrink-0">
            <div class="flex-1 min-w-0">
                <a href="<?= APP_URL ?>/admin/san-pham/chi-tiet?id=<?= $sp['ma_sp'] ?>" class="text-sm font-bold text-gray-800 hover:text-[#6B0D18] truncate block"><?= $sp['ten_sp'] ?></a>
                <div class="flex items-center text-xs text-gray-500 mt-1 gap-2">
                    <span>Đã bán: <strong class="text-gray-700"><?= $sp['da_ban'] ?></strong></span>
                    <span>&bull;</span>
                    <span>Tồn: <strong class="<?= $sp['ton_kho'] < 10 ? 'text-red-500' : 'text-gray-700' ?>"><?= $sp['ton_kho'] ?></strong></span>
                </div>
            </div>
            <div class="text-right shrink-0">
                <div class="text-sm font-bold text-[#6B0D18]"><?= number_format($sp['doanh_thu'], 0, ',', '.') ?>đ</div>
                <div class="w-20 h-1.5 bg-gray-100 rounded-full mt-2 ml-auto overflow-hidden">
                    <div class="h-full bg-red-400 rounded-full" style="width: <?= $sp['ty_trong'] ?>%"></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Cảnh báo sản phẩm bán chậm -->
    <div class="mt-6 pt-4 border-t border-gray-100">
        <h4 class="text-sm font-bold text-gray-700 mb-3 flex items-center gap-2">
            <span class="iconify text-orange-500" data-icon="mdi:alert-circle-outline"></span> Cần tối ưu (Bán chậm)
        </h4>
        <div class="space-y-3">
            <?php foreach($slowProducts as $sp): ?>
            <div class="bg-orange-50/50 border border-orange-100 rounded-lg p-3 flex justify-between items-center">
                <div>
                    <p class="text-sm font-medium text-gray-800"><?= $sp['ten_sp'] ?></p>
                    <p class="text-xs text-gray-500 mt-0.5">Tồn: <?= $sp['ton_kho'] ?> &bull; Đã bán: <?= $sp['da_ban_ky'] ?></p>
                </div>
                <button class="px-3 py-1.5 bg-white border border-[#6B0D18] text-[#6B0D18] rounded text-xs font-medium hover:bg-red-50 transition-colors whitespace-nowrap">
                    Tạo khuyến mãi
                </button>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
