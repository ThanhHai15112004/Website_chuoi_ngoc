<!-- Trang Quản lý Nhà Cung Cấp -->
<div class="px-6 py-6 pb-20 max-w-[1600px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Tiêu đề & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">Nhà Cung Cấp</h2>
            <p class="text-sm text-gray-500 mt-1">Quản lý đối tác cung ứng, xưởng gia công và theo dõi công nợ.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg text-gray-500" data-icon="mdi:filter-variant"></span> Bộ lọc
            </button>
            <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg text-green-600" data-icon="mdi:microsoft-excel"></span> Xuất Excel
            </button>
            <a href="<?= APP_URL ?>/admin/nha-cung-cap/them" class="flex items-center gap-2 px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20">
                <span class="iconify text-lg" data-icon="mdi:plus"></span> Thêm NCC
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center gap-4">
            <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                <span class="iconify text-3xl" data-icon="mdi:truck-outline"></span>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Tổng nhà cung cấp</p>
                <div class="flex items-baseline gap-2">
                    <h3 class="text-2xl font-bold text-gray-900"><?= number_format($stats['tong_ncc']) ?></h3>
                    <span class="text-sm text-gray-500 font-medium">đối tác</span>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center gap-4">
            <div class="w-14 h-14 rounded-full bg-red-50 text-red-600 flex items-center justify-center shrink-0">
                <span class="iconify text-3xl" data-icon="mdi:cash-remove"></span>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Tổng công nợ phải trả</p>
                <div class="flex items-baseline gap-2">
                    <h3 class="text-2xl font-bold text-[#6B0D18]"><?= number_format($stats['tong_no'], 0, ',', '.') ?>đ</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs trạng thái -->
    <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-2 sidebar-scroll">
        <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-full text-sm font-medium whitespace-nowrap shadow-sm">
            Tất cả
        </button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Đang giao dịch
        </button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-red-600 hover:bg-red-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Đang nợ tiền
        </button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Ngừng giao dịch
        </button>
    </div>

    <!-- Bảng danh sách -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-gray-200 bg-gray-50/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="relative w-full md:max-w-md">
                <input type="text" placeholder="Tìm theo tên NCC, SĐT..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-colors text-sm">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-600">
                Sắp xếp theo:
                <select class="border-none bg-transparent font-medium text-gray-900 focus:ring-0 cursor-pointer">
                    <option>Công nợ giảm dần</option>
                    <option>Mới thêm nhất</option>
                    <option>Tổng mua nhiều nhất</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                        <th class="py-3 px-4 font-semibold w-12 text-center">
                            <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                        </th>
                        <th class="py-3 px-4 font-semibold">Thông tin Nhà Cung Cấp</th>
                        <th class="py-3 px-4 font-semibold">Liên hệ</th>
                        <th class="py-3 px-4 font-semibold text-right">Tổng mua</th>
                        <th class="py-3 px-4 font-semibold text-right">Công nợ hiện tại</th>
                        <th class="py-3 px-4 font-semibold">Trạng thái</th>
                        <th class="py-3 px-4 font-semibold text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($danhSach as $ncc): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="py-3 px-4 text-center">
                                <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                            </td>
                            <td class="py-3 px-4">
                                <a href="<?= APP_URL ?>/admin/nha-cung-cap/chi-tiet/<?= $ncc['id'] ?>" class="font-bold text-[#6B0D18] hover:underline text-sm"><?= $ncc['ten'] ?></a>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs text-gray-500">Mã: <?= $ncc['id'] ?></span>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-gray-100 text-gray-600">
                                        <?= $ncc['nhom'] ?>
                                    </span>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-medium text-gray-900 text-sm"><?= $ncc['sdt'] ?></div>
                                <div class="text-xs text-gray-500 mt-1 truncate max-w-[200px]" title="<?= $ncc['dia_chi'] ?>"><?= $ncc['dia_chi'] ?></div>
                            </td>
                            <td class="py-3 px-4 text-right">
                                <span class="font-medium text-gray-700"><?= number_format($ncc['tong_mua'], 0, ',', '.') ?>đ</span>
                            </td>
                            <td class="py-3 px-4 text-right">
                                <?php if ($ncc['cong_no'] > 0): ?>
                                    <span class="font-bold text-red-600"><?= number_format($ncc['cong_no'], 0, ',', '.') ?>đ</span>
                                <?php elseif ($ncc['cong_no'] < 0): ?>
                                    <span class="font-bold text-emerald-600" title="Trả trước">-<?= number_format(abs($ncc['cong_no']), 0, ',', '.') ?>đ</span>
                                <?php else: ?>
                                    <span class="font-medium text-gray-400">0đ</span>
                                <?php endif; ?>
                            </td>
                            <td class="py-3 px-4">
                                <?php if ($ncc['trang_thai'] === 'Đang giao dịch'): ?>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Đang GD
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> Ngừng GD
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="<?= APP_URL ?>/admin/nha-cung-cap/sua/<?= $ncc['id'] ?>" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-500 hover:text-blue-600 transition-colors" title="Chỉnh sửa">
                                        <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                    </a>
                                    <a href="<?= APP_URL ?>/admin/nha-cung-cap/chi-tiet/<?= $ncc['id'] ?>" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#6B0D18] transition-colors" title="Xem chi tiết & công nợ">
                                        <span class="iconify text-lg" data-icon="mdi:eye-outline"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Phân trang -->
        <div class="p-4 border-t border-gray-200 bg-gray-50/50 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-900">1</span> đến <span class="font-medium text-gray-900"><?= $stats['tong_ncc'] ?></span> trong tổng số <span class="font-medium text-gray-900"><?= $stats['tong_ncc'] ?></span> NCC
            </div>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed">
                    <span class="iconify" data-icon="mdi:chevron-left"></span>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-medium text-sm shadow-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed">
                    <span class="iconify" data-icon="mdi:chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
</div>
