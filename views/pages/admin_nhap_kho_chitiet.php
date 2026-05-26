<!-- Trang Chi Tiết & Duyệt Phiếu Nhập Kho -->
<div class="px-6 py-6 pb-20 max-w-[1600px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Breadcrumb & Header -->
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
            <a href="<?= APP_URL ?>/admin/nhap-kho" class="hover:text-[#6B0D18] transition-colors">Phiếu nhập kho</a>
            <span class="iconify text-gray-400" data-icon="mdi:chevron-right"></span>
            <span class="text-gray-900 font-medium"><?= $phieuNhap['id'] ?></span>
        </div>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <h2 class="text-2xl font-bold text-gray-900 leading-tight">Chi tiết phiếu: <?= $phieuNhap['id'] ?></h2>
                <span class="px-3 py-1 bg-blue-50 text-blue-700 border border-blue-200 rounded-lg text-sm font-bold">
                    <?= $phieuNhap['trang_thai'] ?>
                </span>
            </div>
            <div class="flex items-center gap-3">
                <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                    <span class="iconify text-lg" data-icon="mdi:printer"></span> In phiếu
                </button>
                <button class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20">
                    Xác nhận hoàn thành nhập kho
                </button>
            </div>
        </div>
    </div>

    <!-- Timeline Trạng Thái -->
    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm mb-6">
        <div class="relative flex justify-between items-center w-full max-w-4xl mx-auto">
            <!-- Line -->
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-gray-200 z-0 rounded-full"></div>
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-[66%] h-1 bg-emerald-500 z-0 rounded-full"></div>

            <!-- Steps -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center border-4 border-white shadow-sm">
                    <span class="iconify text-xl" data-icon="mdi:check"></span>
                </div>
                <div class="text-sm font-bold text-gray-900 mt-2">Khởi tạo</div>
                <div class="text-xs text-gray-500"><?= $phieuNhap['ngay_tao'] ?></div>
            </div>

            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center border-4 border-white shadow-sm">
                    <span class="iconify text-xl" data-icon="mdi:check"></span>
                </div>
                <div class="text-sm font-bold text-gray-900 mt-2">Đã duyệt</div>
                <div class="text-xs text-gray-500"><?= $phieuNhap['ngay_duyet'] ?></div>
            </div>

            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center border-4 border-white shadow-sm animate-pulse">
                    <span class="iconify text-xl" data-icon="mdi:truck-delivery-outline"></span>
                </div>
                <div class="text-sm font-bold text-blue-700 mt-2">Đang nhập hàng</div>
                <div class="text-xs text-gray-500">Chờ kiểm đếm</div>
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
                        <div class="text-xs text-gray-500 mb-1">Nhà cung cấp</div>
                        <div class="font-bold text-gray-900"><?= $phieuNhap['nha_cung_cap'] ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Người tạo</div>
                        <div class="font-medium text-gray-900"><?= $phieuNhap['nguoi_tao'] ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Người duyệt</div>
                        <div class="font-medium text-gray-900"><?= $phieuNhap['nguoi_duyet'] ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Kho nhận</div>
                        <div class="font-medium text-gray-900">Kho Tổng - Hà Nội</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Ghi chú</div>
                        <div class="text-sm text-gray-700 bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <?= $phieuNhap['ghi_chu'] ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Thanh toán</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Tổng tiền yêu cầu:</span>
                        <span class="font-medium text-gray-900"><?= number_format($phieuNhap['tong_tien_yeu_cau'], 0, ',', '.') ?> đ</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Tổng tiền thực tế:</span>
                        <span class="font-bold text-[#6B0D18] text-lg"><?= number_format($phieuNhap['tong_tien_thuc_te'], 0, ',', '.') ?> đ</span>
                    </div>
                    <div class="pt-3 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Trạng thái thanh toán:</span>
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs font-medium">Chưa thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main bảng: Chi tiết sản phẩm nhập -->
        <div class="xl:col-span-2">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm h-full">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-bold text-gray-900">Danh sách sản phẩm kiểm đếm</h3>
                    <div class="text-sm text-blue-700 bg-blue-50 px-3 py-1.5 rounded-lg border border-blue-100 font-medium flex items-center gap-1">
                        <span class="iconify text-lg" data-icon="mdi:information-outline"></span> Vui lòng điền số lượng thực nhận
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                                <th class="py-3 px-4 w-10 text-center">#</th>
                                <th class="py-3 px-4">Sản phẩm</th>
                                <th class="py-3 px-4 text-center">SL Yêu Cầu</th>
                                <th class="py-3 px-4 text-center">SL Thực Nhận</th>
                                <th class="py-3 px-4 text-right">Đơn giá</th>
                                <th class="py-3 px-4 text-right">Thành tiền TT</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php foreach ($danhSachSP as $index => $sp): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors <?= $sp['sl_thuc_nhan'] < $sp['sl_yeu_cau'] ? 'bg-red-50/30' : '' ?>">
                                    <td class="py-3 px-4 text-center text-sm text-gray-500"><?= $index + 1 ?></td>
                                    <td class="py-3 px-4">
                                        <div class="font-bold text-gray-900"><?= $sp['ten'] ?></div>
                                        <div class="text-xs text-gray-500 mt-0.5">Mã: <?= $sp['sku'] ?> • <?= $sp['bien_the'] ?></div>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="font-bold text-gray-500"><?= $sp['sl_yeu_cau'] ?></span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <!-- Cột này cho phép nhập để nhân viên kho báo cáo -->
                                        <input type="number" min="0" value="<?= $sp['sl_thuc_nhan'] ?>" class="w-20 px-2 py-1.5 border <?= $sp['sl_thuc_nhan'] < $sp['sl_yeu_cau'] ? 'border-red-300 text-red-700 bg-red-50' : 'border-gray-300' ?> rounded focus:outline-none focus:border-red-900 text-sm text-center font-bold">
                                        <?php if ($sp['sl_thuc_nhan'] < $sp['sl_yeu_cau']): ?>
                                            <div class="text-[10px] text-red-600 mt-1 font-medium">Thiếu <?= $sp['sl_yeu_cau'] - $sp['sl_thuc_nhan'] ?></div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3 px-4 text-right">
                                        <span class="text-sm text-gray-600"><?= number_format($sp['don_gia'], 0, ',', '.') ?> đ</span>
                                    </td>
                                    <td class="py-3 px-4 text-right">
                                        <span class="font-bold text-gray-900"><?= number_format($sp['thanh_tien'], 0, ',', '.') ?> đ</span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex items-start gap-4 p-4 bg-amber-50 rounded-lg border border-amber-100">
                    <span class="iconify text-2xl text-amber-600 shrink-0 mt-0.5" data-icon="mdi:alert-outline"></span>
                    <div>
                        <h4 class="text-sm font-bold text-amber-900">Lưu ý trước khi hoàn thành</h4>
                        <p class="text-sm text-amber-800 mt-1">Khi bạn nhấn <b>Xác nhận hoàn thành nhập kho</b>, hệ thống sẽ tự động cập nhật cộng thêm số lượng <b>thực nhận</b> vào tồn kho hiện tại của cửa hàng. Hành động này không thể hoàn tác.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
