<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-bold text-gray-800">Bảng chi tiết toàn bộ sản phẩm</h3>
            <p class="text-sm text-gray-500 mt-1">Chi tiết doanh thu, tồn kho và trạng thái của từng sản phẩm.</p>
        </div>
        <div class="flex items-center gap-2">
            <div class="relative">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm sản phẩm, mã SP..." class="pl-9 pr-4 py-1.5 border border-gray-200 rounded-lg text-sm w-48 focus:border-[#6B0D18] focus:ring-0 outline-none">
            </div>
            <button class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-[#6B0D18] hover:bg-red-50 flex items-center gap-1 font-medium whitespace-nowrap">
                <span class="iconify" data-icon="mdi:export"></span> Xuất Excel
            </button>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[1200px]">
            <thead>
                <tr class="bg-gray-50 text-xs uppercase tracking-wider text-gray-500 font-medium">
                    <th class="py-3 px-4 w-10 text-center"><input type="checkbox" class="text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]"></th>
                    <th class="py-3 px-4 w-16">Ảnh</th>
                    <th class="py-3 px-4">Sản phẩm</th>
                    <th class="py-3 px-4">Đá / Mệnh</th>
                    <th class="py-3 px-4 text-right">Giá bán</th>
                    <th class="py-3 px-4 text-center cursor-pointer hover:text-[#6B0D18]">Tồn kho <span class="iconify inline-block align-middle" data-icon="mdi:swap-vertical"></span></th>
                    <th class="py-3 px-4 text-center cursor-pointer hover:text-[#6B0D18]">Đã bán <span class="iconify inline-block align-middle" data-icon="mdi:swap-vertical"></span></th>
                    <th class="py-3 px-4 text-right cursor-pointer text-[#6B0D18]">Doanh thu <span class="iconify inline-block align-middle" data-icon="mdi:arrow-down"></span></th>
                    <th class="py-3 px-4 text-center">Trạng thái</th>
                    <th class="py-3 px-4 text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                <?php foreach($allProducts as $p): ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 text-center"><input type="checkbox" class="text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]"></td>
                    <td class="py-3 px-4">
                        <img src="<?= $p['anh'] ?>" alt="<?= $p['ten'] ?>" class="w-10 h-10 rounded object-cover border border-gray-200">
                    </td>
                    <td class="py-3 px-4">
                        <a href="<?= APP_URL ?>/admin/san-pham/chi-tiet?id=<?= $p['id'] ?>" class="font-bold text-gray-800 hover:text-[#6B0D18]"><?= $p['ten'] ?></a>
                        <div class="text-[11px] text-gray-500"><?= $p['id'] ?> &bull; <?= $p['danh_muc'] ?></div>
                    </td>
                    <td class="py-3 px-4 text-xs text-gray-600">
                        <div>Đá: <span class="font-medium text-gray-800"><?= $p['da'] ?></span></div>
                        <div class="mt-0.5">Mệnh: <span class="font-medium text-gray-800"><?= $p['menh'] ?></span></div>
                    </td>
                    <td class="py-3 px-4 text-right text-gray-800 font-medium"><?= number_format($p['gia'], 0, ',', '.') ?>đ</td>
                    <td class="py-3 px-4 text-center">
                        <span class="<?= $p['ton_kho'] < 5 ? 'text-red-600 font-bold' : 'text-gray-800' ?>"><?= $p['ton_kho'] ?></span>
                    </td>
                    <td class="py-3 px-4 text-center font-bold text-gray-800"><?= $p['da_ban'] ?></td>
                    <td class="py-3 px-4 text-right">
                        <div class="font-bold text-[#6B0D18]"><?= number_format($p['doanh_thu'], 0, ',', '.') ?>đ</div>
                        <div class="text-[11px] text-gray-400 mt-0.5"><?= $p['ty_trong'] ?>% tổng DT</div>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <?php 
                        $badgeClass = 'bg-gray-100 text-gray-800';
                        if($p['trang_thai'] == 'Bán chạy') $badgeClass = 'bg-green-100 text-green-800 border-green-200';
                        if($p['trang_thai'] == 'Chưa có đơn') $badgeClass = 'bg-red-50 text-red-700 border-red-200';
                        ?>
                        <span class="inline-block px-2.5 py-1 rounded text-xs font-medium border <?= $badgeClass ?>"><?= $p['trang_thai'] ?></span>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <a href="<?= APP_URL ?>/admin/san-pham/chi-tiet?id=<?= $p['id'] ?>" class="text-[#6B0D18] hover:bg-red-50 p-1.5 rounded inline-flex" title="Xem chi tiết">
                            <span class="iconify text-lg" data-icon="mdi:eye-outline"></span>
                        </a>
                        <button class="text-gray-500 hover:text-[#6B0D18] hover:bg-gray-100 p-1.5 rounded inline-flex" title="Thêm khuyến mãi">
                            <span class="iconify text-lg" data-icon="mdi:ticket-percent-outline"></span>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-gray-50">
        <span class="text-sm text-gray-500">Hiển thị 1-4 trên tổng số 120 sản phẩm</span>
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
