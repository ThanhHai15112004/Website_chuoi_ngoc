<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 h-full">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-bold text-gray-800">Hiệu quả Voucher / Khuyến mãi</h3>
        <a href="<?= APP_URL ?>/admin/ma-giam-gia" class="text-sm text-[#6B0D18] hover:underline font-medium">Chi tiết Voucher</a>
    </div>

    <!-- Tóm tắt -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
            <p class="text-xs text-gray-500 font-medium mb-1">Đơn dùng Voucher</p>
            <p class="text-xl font-bold text-gray-800"><?= $marketingReport['tong_don_dung_voucher'] ?> <span class="text-sm font-normal text-gray-500">(<?= $marketingReport['ty_le_don_co_giam_gia'] ?>%)</span></p>
        </div>
        <div class="bg-orange-50 rounded-lg p-4 border border-orange-100">
            <p class="text-xs text-orange-700 font-medium mb-1">Tổng giảm từ Voucher</p>
            <p class="text-xl font-bold text-orange-700"><?= number_format($marketingReport['tong_giam_tu_voucher']/1000000, 1, ',', '.') ?> Tr</p>
        </div>
        <div class="bg-red-50 rounded-lg p-4 border border-red-100 md:col-span-2">
            <p class="text-xs text-[#6B0D18] font-medium mb-1">Doanh thu mang lại từ đơn có Voucher</p>
            <p class="text-xl font-bold text-[#6B0D18]"><?= number_format($marketingReport['doanh_thu_tu_don_voucher'], 0, ',', '.') ?>đ</p>
        </div>
    </div>

    <!-- Bảng Voucher -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-xs uppercase text-gray-500 font-medium border-y border-gray-100">
                    <th class="py-2 px-3">Mã Voucher</th>
                    <th class="py-2 px-3 text-center">Lượt dùng</th>
                    <th class="py-2 px-3 text-right">Tổng giảm</th>
                    <th class="py-2 px-3 text-right">Doanh thu</th>
                    <th class="py-2 px-3 text-center">Trạng thái</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                <?php if (empty($marketingReport['danh_sach_voucher'])): ?>
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">Chưa có voucher nào được sử dụng.</td>
                </tr>
                <?php else: ?>
                <?php foreach($marketingReport['danh_sach_voucher'] as $vc): ?>
                <tr class="hover:bg-gray-50">
                    <td class="py-2.5 px-3">
                        <span class="inline-block border border-dashed border-gray-300 bg-gray-50 text-gray-800 font-bold px-2 py-1 rounded text-xs tracking-wider"><?= $vc['ma'] ?></span>
                    </td>
                    <td class="py-2.5 px-3 text-center font-medium text-gray-700"><?= $vc['luot_dung'] ?></td>
                    <td class="py-2.5 px-3 text-right text-orange-600 font-medium"><?= number_format($vc['tong_giam']/1000000, 1, ',', '.') ?> Tr</td>
                    <td class="py-2.5 px-3 text-right font-bold text-[#6B0D18]"><?= number_format($vc['doanh_thu']/1000000, 1, ',', '.') ?> Tr</td>
                    <td class="py-2.5 px-3 text-center">
                        <?php if($vc['trang_thai'] === 'active'): ?>
                            <span class="w-2 h-2 rounded-full bg-green-500 inline-block" title="Đang chạy"></span>
                        <?php else: ?>
                            <span class="w-2 h-2 rounded-full bg-gray-400 inline-block" title="Đã kết thúc"></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
