<!-- Trang Chi Tiết & Duyệt Phiếu Xuất Kho -->
<div class="px-6 py-6 pb-20 max-w-[1600px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Breadcrumb & Header -->
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
            <a href="<?= APP_URL ?>/admin/xuat-kho" class="hover:text-[#6B0D18] transition-colors">Phiếu xuất kho</a>
            <span class="iconify text-gray-400" data-icon="mdi:chevron-right"></span>
            <span class="text-gray-900 font-medium"><?= htmlspecialchars($phieuXuat['ma_phieu']) ?></span>
        </div>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <h2 class="text-2xl font-bold text-gray-900 leading-tight">Chi tiết phiếu xuất: <?= htmlspecialchars($phieuXuat['ma_phieu']) ?></h2>
                <span class="px-3 py-1 bg-amber-50 text-amber-700 border border-amber-200 rounded-lg text-sm font-bold">
                    Trạng thái: <?= $phieuXuat['trang_thai'] ?>
                </span>
            </div>
            <div class="flex items-center gap-3">
                <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                    <span class="iconify text-lg" data-icon="mdi:printer"></span> In phiếu xuất
                </button>
                <button class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-medium shadow-sm">
                    Duyệt phiếu xuất
                </button>
            </div>
        </div>
    </div>

    <!-- Timeline Trạng Thái -->
    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm mb-6">
        <div class="relative flex justify-between items-center w-full max-w-2xl mx-auto">
            <!-- Line -->
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-gray-200 z-0 rounded-full"></div>
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-[0%] h-1 bg-emerald-500 z-0 rounded-full"></div>

            <!-- Steps -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center border-4 border-white shadow-sm">
                    <span class="iconify text-xl" data-icon="mdi:check"></span>
                </div>
                <div class="text-sm font-bold text-gray-900 mt-2">Khởi tạo</div>
                <div class="text-xs text-gray-500"><?= date('H:i d/m/Y', strtotime($phieuXuat['ngay_tao'])) ?></div>
            </div>

            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-amber-500 text-white flex items-center justify-center border-4 border-white shadow-sm animate-pulse">
                    <span class="iconify text-xl" data-icon="mdi:file-document-edit-outline"></span>
                </div>
                <div class="text-sm font-bold text-amber-700 mt-2">Chờ duyệt</div>
                <div class="text-xs text-gray-500">Đang chờ quản lý duyệt</div>
            </div>

            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-400 flex items-center justify-center border-4 border-white shadow-sm">
                    <span class="iconify text-xl" data-icon="mdi:package-variant"></span>
                </div>
                <div class="text-sm font-medium text-gray-500 mt-2">Đang xuất hàng</div>
            </div>

            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-400 flex items-center justify-center border-4 border-white shadow-sm">
                    <span class="iconify text-xl" data-icon="mdi:home-variant-outline"></span>
                </div>
                <div class="text-sm font-medium text-gray-500 mt-2">Hoàn thành</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Sidebar trái: Thông tin chứng từ -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Thông tin chứng từ</h3>
                <div class="space-y-4">
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Lý do xuất</div>
                        <div class="font-bold text-[#6B0D18]"><?= $phieuXuat['ly_do'] ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Người tạo</div>
                        <div class="font-medium text-gray-900"><?= $phieuXuat['nguoi_tao'] ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Kho xuất</div>
                        <div class="font-medium text-gray-900">Kho Tổng - Hà Nội</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Ghi chú</div>
                        <div class="text-sm text-gray-700 bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <?= htmlspecialchars($phieuXuat['ghi_chu'] ?? 'Không có ghi chú') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main bảng: Chi tiết sản phẩm xuất -->
        <div class="xl:col-span-2">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm h-full">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-bold text-gray-900">Danh sách sản phẩm xuất</h3>
                    <div class="text-sm text-gray-500 font-medium">
                        Tổng cộng: <span class="text-gray-900 font-bold"><?= array_sum(array_column($danhSachSP, 'so_luong')) ?></span> sản phẩm
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                                <th class="py-3 px-4 w-10 text-center">#</th>
                                <th class="py-3 px-4">Sản phẩm</th>
                                <th class="py-3 px-4 text-center">Tồn kho hiện tại</th>
                                <th class="py-3 px-4 text-center">SL Xuất</th>
                                <th class="py-3 px-4 text-center">Tồn sau xuất</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php foreach ($danhSachSP as $index => $sp): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="py-3 px-4 text-center text-sm text-gray-500"><?= $index + 1 ?></td>
                                    <td class="py-3 px-4">
                                        <div class="font-bold text-gray-900"><?= htmlspecialchars($sp['product_name']) ?></div>
                                        <div class="text-xs text-gray-500 mt-0.5">Mã: <?= htmlspecialchars($sp['sku']) ?> • <?= htmlspecialchars($sp['variant_name']) ?></div>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="font-medium text-gray-500"><?= $sp['current_stock'] ?></span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="font-bold text-[#6B0D18] bg-red-50 px-3 py-1 rounded text-lg">
                                            -<?= $sp['so_luong'] ?>
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="font-bold text-emerald-600"><?= max(0, $sp['current_stock'] - $sp['so_luong']) ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex items-start gap-4 p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <span class="iconify text-2xl text-blue-600 shrink-0 mt-0.5" data-icon="mdi:information-outline"></span>
                    <div>
                        <h4 class="text-sm font-bold text-blue-900">Thông tin xuất kho</h4>
                        <p class="text-sm text-blue-800 mt-1">Phiếu xuất đang chờ duyệt. Sau khi <b>Duyệt phiếu</b>, nhân viên kho có thể tiến hành lấy hàng và xác nhận hoàn thành. Số lượng tồn kho sẽ chỉ bị trừ khi phiếu chuyển sang trạng thái <b>Hoàn thành</b>.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
