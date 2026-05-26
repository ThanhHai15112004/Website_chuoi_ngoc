<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 h-full">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-gray-800">Doanh thu theo thời gian</h3>
        <button class="text-gray-400 hover:text-[#6B0D18]"><span class="iconify text-xl" data-icon="mdi:export"></span></button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[600px]">
            <thead>
                <tr class="bg-gray-50 border-y border-gray-100 text-xs uppercase tracking-wider text-gray-500 font-medium">
                    <th class="py-3 px-4">Ngày</th>
                    <th class="py-3 px-4 text-center">Đơn TC</th>
                    <th class="py-3 px-4 text-center">SP bán</th>
                    <th class="py-3 px-4 text-right">Doanh thu</th>
                    <th class="py-3 px-4 text-right">Giảm giá</th>
                    <th class="py-3 px-4 text-right">Thực nhận</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                <?php 
                $tong_dt = 0; $tong_giam = 0; $tong_thuc = 0;
                foreach($tableTime as $row): 
                    $tong_dt += $row['tong_doanh_thu'];
                    $tong_giam += $row['giam_gia'];
                    $tong_thuc += $row['thuc_nhan'];
                ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-gray-800"><?= $row['ngay'] ?></td>
                    <td class="py-3 px-4 text-center text-gray-600">
                        <span class="text-green-600 font-medium"><?= $row['don_thanh_cong'] ?></span> 
                        <span class="text-xs text-gray-400">/ <?= $row['don_huy'] ?> hủy</span>
                    </td>
                    <td class="py-3 px-4 text-center text-gray-600"><?= $row['sp_ban'] ?></td>
                    <td class="py-3 px-4 text-right font-medium text-[#6B0D18]"><?= number_format($row['tong_doanh_thu'], 0, ',', '.') ?>đ</td>
                    <td class="py-3 px-4 text-right text-gray-500"><?= number_format($row['giam_gia'], 0, ',', '.') ?>đ</td>
                    <td class="py-3 px-4 text-right font-bold text-gray-800"><?= number_format($row['thuc_nhan'], 0, ',', '.') ?>đ</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="bg-red-50/50 border-t border-gray-200 text-sm font-bold">
                    <td class="py-3 px-4" colspan="3">Tổng cộng</td>
                    <td class="py-3 px-4 text-right text-[#6B0D18]"><?= number_format($tong_dt, 0, ',', '.') ?>đ</td>
                    <td class="py-3 px-4 text-right text-orange-600"><?= number_format($tong_giam, 0, ',', '.') ?>đ</td>
                    <td class="py-3 px-4 text-right text-gray-900"><?= number_format($tong_thuc, 0, ',', '.') ?>đ</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
