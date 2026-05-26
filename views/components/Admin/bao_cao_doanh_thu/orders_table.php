<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 border-b border-gray-100 flex items-center justify-between">
        <div>
            <h3 class="text-lg font-bold text-gray-800">Chi tiết đơn hàng tính vào doanh thu</h3>
            <p class="text-sm text-gray-500 mt-1">Danh sách 5 đơn hàng mới nhất trong khoảng thời gian này.</p>
        </div>
        <div class="flex items-center gap-2">
            <button class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 flex items-center gap-1">
                <span class="iconify" data-icon="mdi:filter-outline"></span> Lọc
            </button>
            <button class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-[#6B0D18] hover:bg-red-50 flex items-center gap-1 font-medium">
                <span class="iconify" data-icon="mdi:export"></span> Xuất bảng này
            </button>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[1000px]">
            <thead>
                <tr class="bg-gray-50 text-xs uppercase tracking-wider text-gray-500 font-medium">
                    <th class="py-3 px-5">Mã Đơn</th>
                    <th class="py-3 px-5">Khách hàng</th>
                    <th class="py-3 px-5">Ngày HT</th>
                    <th class="py-3 px-5 text-right">Tổng tiền</th>
                    <th class="py-3 px-5 text-right">Giảm giá</th>
                    <th class="py-3 px-5 text-right">Phí VC</th>
                    <th class="py-3 px-5 text-right">Thực nhận</th>
                    <th class="py-3 px-5 text-center">Thanh toán</th>
                    <th class="py-3 px-5 text-center">Trạng thái</th>
                    <th class="py-3 px-5 text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                <?php foreach($recentOrders as $order): ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-5 font-bold text-[#6B0D18]"><?= $order['ma_don'] ?></td>
                    <td class="py-3 px-5 text-gray-800"><?= $order['khach_hang'] ?></td>
                    <td class="py-3 px-5 text-gray-500 text-xs"><?= $order['ngay_ht'] ?></td>
                    <td class="py-3 px-5 text-right text-gray-600"><?= number_format($order['tong_tien'], 0, ',', '.') ?>đ</td>
                    <td class="py-3 px-5 text-right text-orange-600"><?= number_format($order['giam_gia'], 0, ',', '.') ?>đ</td>
                    <td class="py-3 px-5 text-right text-gray-500"><?= number_format($order['phi_vc'], 0, ',', '.') ?>đ</td>
                    <td class="py-3 px-5 text-right font-bold text-gray-900"><?= number_format($order['thuc_nhan'], 0, ',', '.') ?>đ</td>
                    <td class="py-3 px-5 text-center text-xs">
                        <?php if($order['thanh_toan'] == 'COD'): ?>
                            <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded"><?= $order['thanh_toan'] ?></span>
                        <?php else: ?>
                            <span class="bg-blue-50 text-blue-700 px-2 py-1 rounded"><?= $order['thanh_toan'] ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="py-3 px-5 text-center">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-1 rounded-full border border-green-200"><?= $order['trang_thai'] ?></span>
                    </td>
                    <td class="py-3 px-5 text-center">
                        <a href="<?= APP_URL ?>/admin/don-hang/chi-tiet/<?= $order['ma_don'] ?>" class="text-[#6B0D18] hover:bg-red-50 p-1.5 rounded inline-flex" title="Xem chi tiết">
                            <span class="iconify text-lg" data-icon="mdi:eye-outline"></span>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-gray-50">
        <span class="text-sm text-gray-500">Hiển thị 5 trên tổng số <?= $overview['don_thanh_cong']['gia_tri'] ?> đơn hàng</span>
        <div class="flex items-center gap-1">
            <button class="px-2.5 py-1.5 rounded border border-gray-200 bg-white text-gray-400 cursor-not-allowed"><span class="iconify" data-icon="mdi:chevron-left"></span></button>
            <button class="px-3 py-1.5 rounded border border-[#6B0D18] bg-[#6B0D18] text-white text-sm font-medium">1</button>
            <button class="px-3 py-1.5 rounded border border-gray-200 bg-white text-gray-600 hover:bg-gray-50 text-sm font-medium">2</button>
            <button class="px-3 py-1.5 rounded border border-gray-200 bg-white text-gray-600 hover:bg-gray-50 text-sm font-medium">3</button>
            <span class="px-2 text-gray-400">...</span>
            <button class="px-2.5 py-1.5 rounded border border-gray-200 bg-white text-gray-600 hover:bg-gray-50"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
        </div>
    </div>
</div>
