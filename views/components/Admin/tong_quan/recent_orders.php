<?php
// views/components/admin/tong-quan/recent_orders.php
?>
<!-- Recent Orders -->
<div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="px-5 py-4 border-b border-gray-100 flex justify-between items-center">
        <h3 class="text-lg font-bold text-gray-800">Đơn hàng mới nhất</h3>
        <?php $base = defined('APP_URL') ? APP_URL : ''; ?>
        <a href="<?= $base ?>/admin/don-hang" class="text-sm text-red-900 font-medium hover:underline">Xem tất cả</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50/50 text-xs uppercase text-gray-500 font-semibold">
                <tr>
                    <th class="px-5 py-3">Mã Đơn</th>
                    <th class="px-5 py-3">Khách Hàng</th>
                    <th class="px-5 py-3">Tổng Tiền</th>
                    <th class="px-5 py-3">Trạng Thái</th>
                    <th class="px-5 py-3 text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach($don_hang_moi_nhat as $don): ?>
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-5 py-3 font-medium text-gray-900">#<?= $don['ma_don'] ?></td>
                    <td class="px-5 py-3"><?= $don['khach_hang'] ?></td>
                    <td class="px-5 py-3 font-medium text-red-900"><?= format_currency_short($don['tong_tien']) ?></td>
                    <td class="px-5 py-3">
                        <?php
                            $badgeClass = '';
                            switch($don['trang_thai']) {
                                case 'Chờ xác nhận': $badgeClass = 'bg-yellow-100 text-yellow-800'; break;
                                case 'Xác nhận đơn hàng': $badgeClass = 'bg-blue-100 text-blue-800'; break;
                                case 'Đang giao': $badgeClass = 'bg-indigo-100 text-indigo-800'; break;
                                case 'Đã giao': $badgeClass = 'bg-green-100 text-green-800'; break;
                                case 'Đã hủy': $badgeClass = 'bg-red-100 text-red-800'; break;
                                default: $badgeClass = 'bg-gray-100 text-gray-800';
                            }
                        ?>
                        <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold <?= $badgeClass ?>">
                            <?= $don['trang_thai'] ?>
                        </span>
                    </td>
                    <td class="px-5 py-3 text-right">
                        <a href="<?= defined('APP_URL') ? APP_URL : '' ?>/admin/don-hang/chi-tiet/<?= $don['id'] ?>" class="text-gray-400 hover:text-red-900 transition-colors inline-block" title="Xem chi tiết">
                            <span class="iconify text-lg" data-icon="mdi:eye-outline"></span>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
