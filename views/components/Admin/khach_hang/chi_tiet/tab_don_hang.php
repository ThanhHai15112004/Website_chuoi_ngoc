<?php
$don_hangs = $don_hangs ?? [];
?>
<div class="p-6">
    <?php if(empty($don_hangs)): ?>
        <div class="text-center py-12">
            <span class="iconify text-gray-300 text-6xl mx-auto mb-4" data-icon="mdi:receipt-text-remove-outline"></span>
            <h4 class="text-lg font-medium text-gray-800 mb-1">Chưa có đơn hàng nào</h4>
            <p class="text-gray-500 text-sm">Khách hàng này chưa thực hiện giao dịch nào trên hệ thống.</p>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-xs font-semibold text-gray-500 uppercase bg-gray-50/50 border-b border-gray-100">
                        <th class="px-4 py-3 rounded-tl-lg">Mã Đơn</th>
                        <th class="px-4 py-3">Ngày đặt</th>
                        <th class="px-4 py-3">Tổng tiền</th>
                        <th class="px-4 py-3">Thanh toán</th>
                        <th class="px-4 py-3">Trạng thái</th>
                        <th class="px-4 py-3 text-right rounded-tr-lg">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach($don_hangs as $don): 
                        // Status styling
                        $sttColor = 'gray'; $sttText = 'Không rõ';
                        switch($don['trang_thai_don_hang']) {
                            case 0: $sttColor = 'yellow'; $sttText = 'Chờ xác nhận'; break;
                            case 1: $sttColor = 'blue'; $sttText = 'Đang xử lý'; break;
                            case 2: $sttColor = 'indigo'; $sttText = 'Đang giao hàng'; break;
                            case 3: $sttColor = 'green'; $sttText = 'Hoàn thành'; break;
                            case 4: $sttColor = 'red'; $sttText = 'Đã hủy'; break;
                        }
                    ?>
                        <tr class="hover:bg-gray-50 transition-colors group">
                            <td class="px-4 py-3 font-medium text-gray-800">
                                <?= htmlspecialchars($don['ma'] ?? '') ?>
                            </td>
                            <td class="px-4 py-3 text-gray-600">
                                <?= date('H:i - d/m/Y', strtotime($don['ngay_tao'])) ?>
                            </td>
                            <td class="px-4 py-3 font-bold text-[#6B0D18]">
                                <?= number_format($don['tong_tien'] ?? 0, 0, ',', '.') ?>đ
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs font-medium rounded-md uppercase">
                                    <?= htmlspecialchars($don['phuong_thuc_thanh_toan'] ?? 'COD') ?>
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2.5 py-1 bg-<?= $sttColor ?>-50 text-<?= $sttColor ?>-700 text-xs font-medium rounded-full inline-flex items-center gap-1 border border-<?= $sttColor ?>-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-<?= $sttColor ?>-500"></span>
                                    <?= $sttText ?>
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <a href="<?= APP_URL ?>/admin/don-hang/chi-tiet/<?= $don['id'] ?>" class="p-2 text-gray-400 hover:text-[#6B0D18] hover:bg-red-50 rounded-lg transition-colors inline-block tooltip" data-tip="Xem chi tiết">
                                    <span class="iconify" data-icon="mdi:eye-outline"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
