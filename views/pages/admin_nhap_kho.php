<!-- Trang Quản lý Phiếu Nhập Kho -->
<div class="px-6 py-6 pb-20 max-w-[1600px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Tiêu đề & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">Quản lý Phiếu Nhập Kho</h2>
            <p class="text-sm text-gray-500 mt-1">Theo dõi, tạo mới và xét duyệt các chứng từ nhập kho hàng hóa.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg text-gray-500" data-icon="mdi:filter-variant"></span> Bộ lọc
            </button>
            <a href="<?= APP_URL ?>/admin/nhap-kho/them" class="flex items-center gap-2 px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20">
                <span class="iconify text-lg" data-icon="mdi:plus"></span> Tạo phiếu nhập kho
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center gap-4">
            <div class="w-14 h-14 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <span class="iconify text-3xl" data-icon="mdi:check-circle-outline"></span>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Nhập kho thành công (Tháng này)</p>
                <div class="flex items-baseline gap-2">
                    <h3 class="text-2xl font-bold text-gray-900">125</h3>
                    <span class="text-xs text-emerald-600 font-medium bg-emerald-50 px-2 py-0.5 rounded border border-emerald-100">+12% so với tháng trước</span>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center gap-4">
            <div class="w-14 h-14 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <span class="iconify text-3xl" data-icon="mdi:clock-outline"></span>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Đang chờ xử lý / Đang nhập</p>
                <div class="flex items-baseline gap-2">
                    <h3 class="text-2xl font-bold text-gray-900">5</h3>
                    <span class="text-sm text-gray-500 font-medium">phiếu</span>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center gap-4">
            <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                <span class="iconify text-3xl" data-icon="mdi:currency-usd"></span>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Tổng giá trị nhập (Tháng này)</p>
                <h3 class="text-xl font-bold text-[#6B0D18]">452.500.000 đ</h3>
            </div>
        </div>
    </div>

    <!-- Tabs trạng thái -->
    <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-2 sidebar-scroll">
        <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-full text-sm font-medium whitespace-nowrap shadow-sm">
            Tất cả (<?= $stats['tat_ca'] ?>)
        </button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-amber-600 hover:bg-amber-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Chờ duyệt (<?= $stats['cho_duyet'] ?>)
        </button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-blue-600 hover:bg-blue-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Đang nhập hàng (<?= $stats['dang_nhap'] ?>)
        </button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-emerald-600 hover:bg-emerald-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Hoàn thành (<?= $stats['hoan_thanh'] ?>)
        </button>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-500 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            Đã hủy (1)
        </button>
    </div>

    <!-- Bảng danh sách phiếu nhập -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-gray-200 bg-gray-50/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="relative w-full md:max-w-md">
                <input type="text" placeholder="Tìm theo mã phiếu, nhà cung cấp..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-colors text-sm">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
            </div>
        </div>

        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                        <th class="py-3 px-4 font-semibold">Mã phiếu</th>
                        <th class="py-3 px-4 font-semibold">Nhà cung cấp</th>
                        <th class="py-3 px-4 font-semibold text-center">Số lượng</th>
                        <th class="py-3 px-4 font-semibold text-right">Tổng tiền</th>
                        <th class="py-3 px-4 font-semibold">Thời gian tạo</th>
                        <th class="py-3 px-4 font-semibold">Trạng thái</th>
                        <th class="py-3 px-4 font-semibold text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($phieuNhapList as $pn): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="py-3 px-4">
                                <a href="<?= APP_URL ?>/admin/nhap-kho/chi-tiet/<?= $pn['id'] ?>" class="font-bold text-[#6B0D18] hover:underline"><?= $pn['id'] ?></a>
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-medium text-gray-900"><?= $pn['nha_cung_cap'] ?></div>
                                <div class="text-xs text-gray-500 mt-0.5"><span class="iconify inline text-gray-400" data-icon="mdi:account-outline"></span> Tạo bởi: <?= $pn['nguoi_tao'] ?></div>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <span class="font-medium text-gray-900"><?= $pn['so_luong_sp'] ?></span> <span class="text-xs text-gray-500">sp</span>
                            </td>
                            <td class="py-3 px-4 text-right">
                                <span class="font-bold text-gray-900"><?= number_format($pn['tong_tien'], 0, ',', '.') ?> đ</span>
                            </td>
                            <td class="py-3 px-4">
                                <div class="text-sm text-gray-600"><?= $pn['ngay_tao'] ?></div>
                            </td>
                            <td class="py-3 px-4">
                                <?php if ($pn['trang_thai'] === 'Chờ duyệt'): ?>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                        Chờ duyệt
                                    </span>
                                <?php elseif ($pn['trang_thai'] === 'Đang nhập hàng'): ?>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                        Đang nhập hàng
                                    </span>
                                <?php elseif ($pn['trang_thai'] === 'Hoàn thành'): ?>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        Hoàn thành
                                    </span>
                                <?php elseif ($pn['trang_thai'] === 'Đã hủy'): ?>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                        Đã hủy
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <a href="<?= APP_URL ?>/admin/nhap-kho/chi-tiet/<?= $pn['id'] ?>" class="inline-flex items-center gap-1 px-3 py-1.5 bg-gray-50 border border-gray-200 text-gray-700 hover:bg-white hover:border-[#6B0D18] hover:text-[#6B0D18] rounded-lg text-sm font-medium transition-colors">
                                    Chi tiết <span class="iconify" data-icon="mdi:arrow-right"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Phân trang -->
        <div class="p-4 border-t border-gray-200 bg-gray-50/50 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-900">1</span> đến <span class="font-medium text-gray-900">4</span> trong tổng số <span class="font-medium text-gray-900"><?= $stats['tat_ca'] ?></span> phiếu
            </div>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed">
                    <span class="iconify" data-icon="mdi:chevron-left"></span>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-medium text-sm shadow-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#6B0D18] hover:text-[#6B0D18] font-medium text-sm transition-colors">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#6B0D18] hover:text-[#6B0D18] transition-colors">
                    <span class="iconify" data-icon="mdi:chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
</div>
