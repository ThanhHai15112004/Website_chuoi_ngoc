<!-- Bảng Cảnh báo tồn kho -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <div class="p-5 border-b border-gray-100 flex items-center justify-between">
        <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
            <span class="iconify text-yellow-600" data-icon="mdi:warehouse"></span> Cảnh báo tồn kho
        </h3>
        <a href="<?= APP_URL ?>/admin/ton-kho" class="text-sm text-[#6B0D18] font-medium hover:underline">Chi tiết kho</a>
    </div>
    <div class="overflow-x-auto">
        <?php if(empty($inventoryWarnings)): ?>
            <div class="flex flex-col items-center justify-center py-8">
                <span class="iconify text-gray-300 text-4xl mb-2" data-icon="mdi:check-circle-outline"></span>
                <p class="text-sm text-gray-500">Tất cả sản phẩm đang có tồn kho ở mức an toàn</p>
            </div>
        <?php else: ?>
        <table class="w-full text-left border-collapse min-w-[800px]">
            <thead>
                <tr class="bg-gray-50 text-xs uppercase text-gray-500 font-medium">
                    <th class="py-3 px-5">Sản phẩm</th>
                    <th class="py-3 px-5 text-center">Tồn kho</th>
                    <th class="py-3 px-5 text-center">Mức cảnh báo</th>
                    <th class="py-3 px-5 text-center">Tốc độ bán</th>
                    <th class="py-3 px-5 text-center">Dự kiến hết</th>
                    <th class="py-3 px-5 text-center">Hành động</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                <?php foreach($inventoryWarnings as $item): ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-5">
                        <div class="font-bold text-gray-800 truncate max-w-[250px]" title="<?= $item['ten_sp'] ?>"><?= $item['ten_sp'] ?></div>
                        <div class="text-[11px] text-gray-500">ID: <?= $item['ma_sp'] ?> &bull; Đã bán kỳ này: <?= $item['da_ban_ky'] ?></div>
                    </td>
                    <td class="py-3 px-5 text-center font-bold text-gray-800"><?= $item['ton_kho'] ?></td>
                    <td class="py-3 px-5 text-center">
                        <span class="inline-block px-2.5 py-1 rounded-md text-xs font-bold <?= $item['badge'] ?>"><?= $item['canh_bao'] ?></span>
                    </td>
                    <td class="py-3 px-5 text-center text-gray-600"><?= $item['toc_do_ban'] ?></td>
                    <td class="py-3 px-5 text-center text-gray-600 font-medium"><?= $item['du_kien_het'] ?></td>
                    <td class="py-3 px-5 text-center">
                        <?php if($item['canh_bao'] == 'Tồn cao'): ?>
                            <a href="<?= APP_URL ?>/admin/khuyen-mai/them" class="inline-block text-xs px-3 py-1.5 border border-[#6B0D18] text-[#6B0D18] rounded hover:bg-red-50 font-medium">Khuyến mãi</a>
                        <?php else: ?>
                            <a href="<?= APP_URL ?>/admin/nhap-kho/them" class="inline-block text-xs px-3 py-1.5 bg-[#6B0D18] text-white rounded hover:bg-red-900 font-medium border border-transparent">Nhập kho</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<!-- Bảng Sản phẩm bán chậm (Cần tối ưu) -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <div class="p-5 border-b border-gray-100 flex items-center justify-between">
        <div>
            <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                <span class="iconify text-orange-600" data-icon="mdi:trending-down"></span> Sản phẩm cần tối ưu (Bán chậm)
            </h3>
            <p class="text-sm text-gray-500 mt-1">Danh sách sản phẩm có lượt mua thấp trong kỳ.</p>
        </div>
        <a href="<?= APP_URL ?>/admin/bao-cao-san-pham?hieu_qua=Bán+chậm" class="text-sm text-[#6B0D18] font-medium hover:underline">Xem tất cả</a>
    </div>
    <div class="overflow-x-auto">
        <?php if(empty($slowProducts)): ?>
            <div class="flex flex-col items-center justify-center py-8">
                <span class="iconify text-gray-300 text-4xl mb-2" data-icon="mdi:emoticon-happy-outline"></span>
                <p class="text-sm text-gray-500">Tuyệt vời! Không có sản phẩm nào bị ế trong kỳ này</p>
            </div>
        <?php else: ?>
        <table class="w-full text-left border-collapse min-w-[900px]">
            <thead>
                <tr class="bg-gray-50 text-xs uppercase text-gray-500 font-medium">
                    <th class="py-3 px-5">Sản phẩm</th>
                    <th class="py-3 px-5 text-center">Tồn kho</th>
                    <th class="py-3 px-5 text-center">Đã bán kỳ</th>
                    <th class="py-3 px-5 text-center">Ngày chưa bán</th>
                    <th class="py-3 px-5">Lý do gợi ý</th>
                    <th class="py-3 px-5 text-center">Đề xuất</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                <?php foreach($slowProducts as $item): ?>
                <tr class="hover:bg-orange-50/30 transition-colors">
                    <td class="py-3 px-5">
                        <div class="font-medium text-gray-800 truncate max-w-[200px]" title="<?= $item['ten_sp'] ?>"><?= $item['ten_sp'] ?></div>
                        <div class="text-[11px] text-gray-500">ID: <?= $item['ma_sp'] ?> &bull; <?= $item['danh_muc'] ?></div>
                    </td>
                    <td class="py-3 px-5 text-center text-gray-600"><?= $item['ton_kho'] ?></td>
                    <td class="py-3 px-5 text-center font-bold text-gray-800"><?= $item['da_ban_ky'] ?></td>
                    <td class="py-3 px-5 text-center font-medium text-orange-600"><?= $item['ngay_chua_ban'] ?> ngày</td>
                    <td class="py-3 px-5 text-gray-600 italic text-xs"><?= $item['ly_do'] ?></td>
                    <td class="py-3 px-5 text-center">
                        <?php if($item['de_xuat'] == 'Tạo khuyến mãi'): ?>
                            <a href="<?= APP_URL ?>/admin/khuyen-mai/them" class="inline-block text-xs px-3 py-1.5 border border-[#6B0D18] text-[#6B0D18] rounded hover:bg-red-50 font-medium"><?= $item['de_xuat'] ?></a>
                        <?php elseif($item['de_xuat'] == 'Điều chỉnh giá'): ?>
                            <a href="<?= APP_URL ?>/admin/san-pham/sua/<?= $item['ma_sp'] ?>" class="inline-block text-xs px-3 py-1.5 border border-[#6B0D18] text-[#6B0D18] rounded hover:bg-red-50 font-medium"><?= $item['de_xuat'] ?></a>
                        <?php else: ?>
                            <button class="text-xs px-3 py-1.5 border border-gray-300 text-gray-700 rounded hover:bg-gray-50 font-medium"><?= $item['de_xuat'] ?></button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<!-- Bảng Hiệu quả khuyến mãi -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <div class="p-5 border-b border-gray-100">
        <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
            <span class="iconify text-green-600" data-icon="mdi:sale"></span> Hiệu quả Khuyến mãi sản phẩm
        </h3>
    </div>
    <div class="overflow-x-auto">
        <?php if(empty($promoEfficiency)): ?>
            <div class="flex flex-col items-center justify-center py-8">
                <span class="iconify text-gray-300 text-4xl mb-2" data-icon="mdi:ticket-percent-outline"></span>
                <p class="text-sm text-gray-500">Chưa có chương trình khuyến mãi nào được diễn ra trong kỳ này</p>
                <a href="<?= APP_URL ?>/admin/khuyen-mai/them" class="mt-3 px-4 py-2 bg-[#6B0D18] text-white rounded text-sm font-medium">Tạo khuyến mãi ngay</a>
            </div>
        <?php else: ?>
        <table class="w-full text-left border-collapse min-w-[900px]">
            <thead>
                <tr class="bg-gray-50 text-xs uppercase text-gray-500 font-medium">
                    <th class="py-3 px-5">Sản phẩm / Chương trình</th>
                    <th class="py-3 px-5 text-right">Giá sale</th>
                    <th class="py-3 px-5 text-center">Bán trước KM</th>
                    <th class="py-3 px-5 text-center">Bán trong KM</th>
                    <th class="py-3 px-5 text-right">DT Khuyến mãi</th>
                    <th class="py-3 px-5 text-center">Hiệu quả</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                <?php foreach($promoEfficiency as $item): ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-5">
                        <div class="font-bold text-gray-800 truncate max-w-[200px]" title="<?= $item['ten_sp'] ?>"><?= $item['ten_sp'] ?></div>
                        <div class="text-[11px] text-gray-500 mt-0.5 truncate max-w-[200px]"><span class="iconify inline-block text-red-500" data-icon="mdi:ticket-percent"></span> <?= $item['chuong_trinh'] ?></div>
                    </td>
                    <td class="py-3 px-5 text-right">
                        <div class="font-bold text-[#6B0D18]"><?= number_format($item['gia_sale'], 0, ',', '.') ?>đ</div>
                        <div class="text-[11px] text-gray-400 line-through"><?= number_format($item['gia_goc'], 0, ',', '.') ?>đ</div>
                    </td>
                    <td class="py-3 px-5 text-center text-gray-500"><?= $item['ban_truoc'] ?></td>
                    <td class="py-3 px-5 text-center font-bold text-green-600">+<?= $item['ban_trong'] ?></td>
                    <td class="py-3 px-5 text-right">
                        <div class="font-bold text-gray-800"><?= number_format($item['doanh_thu'], 0, ',', '.') ?>đ</div>
                        <div class="text-[11px] text-orange-500">Giảm: -<?= number_format($item['tong_giam']/1000, 0, ',', '.') ?>k</div>
                    </td>
                    <td class="py-3 px-5 text-center">
                        <span class="inline-block px-2.5 py-1 rounded-md text-xs font-bold <?= $item['badge'] ?>"><?= $item['hieu_qua'] ?></span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>
