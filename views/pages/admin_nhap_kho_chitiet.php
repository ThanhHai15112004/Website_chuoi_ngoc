<!-- Trang Chi Tiết & Duyệt Phiếu Nhập Kho -->
<div class="px-6 py-6 pb-20 max-w-[1600px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Breadcrumb & Header -->
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
            <a href="<?= APP_URL ?>/admin/nhap-kho" class="hover:text-[#6B0D18] transition-colors">Phiếu nhập kho</a>
            <span class="iconify text-gray-400" data-icon="mdi:chevron-right"></span>
            <span class="text-gray-900 font-medium"><?= htmlspecialchars($phieuNhap['ma_phieu']) ?></span>
        </div>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <h2 class="text-2xl font-bold text-gray-900 leading-tight">Chi tiết phiếu: <?= htmlspecialchars($phieuNhap['ma_phieu']) ?></h2>
                <?php
                    $badgeClass = '';
                    $statusText = '';
                    if ($phieuNhap['trang_thai'] == 0) { $badgeClass = 'bg-gray-100 text-gray-700 border-gray-200'; $statusText = 'Bản nháp'; }
                    elseif ($phieuNhap['trang_thai'] == 1) { $badgeClass = 'bg-yellow-50 text-yellow-700 border-yellow-200'; $statusText = 'Chờ duyệt'; }
                    elseif ($phieuNhap['trang_thai'] == 2) { $badgeClass = 'bg-blue-50 text-blue-700 border-blue-200'; $statusText = 'Chờ kiểm đếm'; }
                    elseif ($phieuNhap['trang_thai'] == 3) { $badgeClass = 'bg-emerald-50 text-emerald-700 border-emerald-200'; $statusText = 'Hoàn thành'; }
                    elseif ($phieuNhap['trang_thai'] == 4) { $badgeClass = 'bg-gray-100 text-gray-500 border-gray-200'; $statusText = 'Đã hủy'; }
                ?>
                <span class="px-3 py-1 border rounded-lg text-sm font-bold <?= $badgeClass ?>">
                    Trạng thái: <?= $statusText ?>
                </span>
            </div>
            <div class="flex items-center gap-3">
                <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm" onclick="window.print()">
                    <span class="iconify text-lg" data-icon="mdi:printer"></span> In phiếu
                </button>
                
                <?php if($phieuNhap['trang_thai'] == 0): ?>
                    <a href="<?= APP_URL ?>/admin/nhap-kho/sua/<?= $phieuNhap['id'] ?>" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                        Tiếp tục sửa
                    </a>
                <?php endif; ?>

                <?php if($phieuNhap['trang_thai'] != 3 && $phieuNhap['trang_thai'] != 4): ?>
                    <button onclick="huyPhieu('<?= $phieuNhap['id'] ?>')" class="px-4 py-2 bg-white border border-rose-200 text-rose-600 rounded-lg hover:bg-rose-50 transition-colors text-sm font-medium shadow-sm">
                        Hủy phiếu
                    </button>
                <?php endif; ?>

                <?php if($phieuNhap['trang_thai'] == 1): ?>
                    <button onclick="duyetPhieu('<?= $phieuNhap['id'] ?>')" class="px-6 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-colors text-sm font-medium shadow-sm">
                        Duyệt phiếu nhập kho
                    </button>
                <?php elseif($phieuNhap['trang_thai'] == 2): ?>
                    <a href="<?= APP_URL ?>/admin/nhap-kho/kiem-hang/<?= $phieuNhap['id'] ?>" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20">
                        Kiểm hàng & Nhập kho
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Timeline Trạng Thái -->
    <?php if($phieuNhap['trang_thai'] != 4): ?>
    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm mb-6">
        <div class="relative flex justify-between items-center w-full max-w-4xl mx-auto">
            <!-- Line -->
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-gray-200 z-0 rounded-full"></div>
            <?php 
                $lineWidth = '0%';
                if ($phieuNhap['trang_thai'] == 1) $lineWidth = '33%';
                elseif ($phieuNhap['trang_thai'] == 2) $lineWidth = '66%';
                elseif ($phieuNhap['trang_thai'] == 3) $lineWidth = '100%';
            ?>
            <div class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-emerald-500 z-0 rounded-full transition-all duration-500" style="width: <?= $lineWidth ?>;"></div>

            <!-- Steps -->
            <!-- Step 1: Khởi tạo -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center border-4 border-white shadow-sm <?= $phieuNhap['trang_thai'] == 0 ? 'animate-pulse' : '' ?>">
                    <span class="iconify text-xl" data-icon="mdi:check"></span>
                </div>
                <div class="text-sm font-bold text-gray-900 mt-2">Khởi tạo</div>
                <div class="text-xs text-gray-500"><?= date('H:i d/m/Y', strtotime($phieuNhap['ngay_tao'])) ?></div>
            </div>

            <!-- Step 2: Cập nhật lúc -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full <?= $phieuNhap['trang_thai'] >= 1 ? 'bg-emerald-500 text-white' : 'bg-gray-200 text-gray-400' ?> flex items-center justify-center border-4 border-white shadow-sm <?= $phieuNhap['trang_thai'] == 1 ? 'animate-pulse' : '' ?>">
                    <span class="iconify text-xl" data-icon="<?= $phieuNhap['trang_thai'] >= 2 ? 'mdi:check' : 'mdi:clock-outline' ?>"></span>
                </div>
                <div class="text-sm <?= $phieuNhap['trang_thai'] >= 1 ? 'font-bold text-gray-900' : 'font-medium text-gray-500' ?> mt-2">Chờ duyệt</div>
                <div class="text-xs text-gray-500"><?= $phieuNhap['trang_thai'] >= 2 && !empty($phieuNhap['ngay_nhap']) ? date('H:i d/m/Y', strtotime($phieuNhap['ngay_nhap'])) : 'Đang chờ' ?></div>
            </div>

            <!-- Step 3: Đang nhập hàng -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full <?= $phieuNhap['trang_thai'] >= 2 ? ($phieuNhap['trang_thai'] == 3 ? 'bg-emerald-500 text-white' : 'bg-blue-500 text-white animate-pulse') : 'bg-gray-200 text-gray-400' ?> flex items-center justify-center border-4 border-white shadow-sm">
                    <span class="iconify text-xl" data-icon="<?= $phieuNhap['trang_thai'] == 3 ? 'mdi:check' : 'mdi:truck-delivery-outline' ?>"></span>
                </div>
                <div class="text-sm <?= $phieuNhap['trang_thai'] >= 2 ? 'font-bold text-blue-700' : 'font-medium text-gray-500' ?> mt-2">Đang nhập hàng</div>
                <div class="text-xs text-gray-500"><?= $phieuNhap['trang_thai'] >= 2 ? 'Chờ kiểm đếm' : '' ?></div>
            </div>

            <!-- Step 4: Hoàn thành -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full <?= $phieuNhap['trang_thai'] == 3 ? 'bg-emerald-500 text-white' : 'bg-gray-200 text-gray-400' ?> flex items-center justify-center border-4 border-white shadow-sm">
                    <span class="iconify text-xl" data-icon="<?= $phieuNhap['trang_thai'] == 3 ? 'mdi:check' : 'mdi:home-variant-outline' ?>"></span>
                </div>
                <div class="text-sm <?= $phieuNhap['trang_thai'] == 3 ? 'font-bold text-emerald-600' : 'font-medium text-gray-500' ?> mt-2">Hoàn thành</div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <!-- Đã hủy -->
    <div class="bg-rose-50 p-6 rounded-xl border border-rose-200 shadow-sm mb-6 flex items-center gap-4">
        <div class="w-12 h-12 rounded-full bg-rose-100 flex items-center justify-center text-rose-600">
            <span class="iconify text-2xl" data-icon="mdi:close-circle-outline"></span>
        </div>
        <div>
            <h3 class="text-lg font-bold text-rose-900">Phiếu nhập kho đã bị hủy</h3>
            <p class="text-rose-700 text-sm mt-1">Phiếu này không còn hiệu lực và tồn kho không bị ảnh hưởng.</p>
        </div>
    </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Sidebar trái: Thông tin chứng từ -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Thông tin chứng từ</h3>
                <div class="space-y-4">
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Nhà cung cấp</div>
                        <div class="font-bold text-gray-900"><?= htmlspecialchars($phieuNhap['ten_ncc'] ?? 'Khác') ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Người tạo</div>
                        <div class="font-medium text-gray-900"><?= htmlspecialchars($phieuNhap['nguoi_tao'] ?? 'Hệ thống') ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Người kiểm/duyệt</div>
                        <div class="font-medium text-gray-900"><?= htmlspecialchars($phieuNhap['nguoi_kiem'] ?? 'Chưa có') ?></div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Kho nhận</div>
                        <div class="font-medium text-gray-900 text-sm">Kho Tổng (chờ định vị cụ thể ở bước kiểm đếm)</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Ghi chú</div>
                        <div class="text-sm text-gray-700 bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <?= htmlspecialchars($phieuNhap['ghi_chu'] ?? 'Không có') ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Thanh toán</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Tổng tiền dự kiến:</span>
                        <span class="font-medium text-gray-900"><?= number_format($phieuNhap['tong_tien'], 0, ',', '.') ?> đ</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Đã thanh toán:</span>
                        <span class="font-bold text-[#6B0D18] text-lg"><?= number_format($phieuNhap['tien_da_tra'], 0, ',', '.') ?> đ</span>
                    </div>
                    <div class="pt-3 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Trạng thái thanh toán:</span>
                            <?php if ($phieuNhap['trang_thai_thanh_toan'] == 2): ?>
                                <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-bold">Đã thanh toán</span>
                            <?php elseif ($phieuNhap['trang_thai_thanh_toan'] == 1): ?>
                                <span class="px-2 py-1 bg-amber-100 text-amber-700 rounded text-xs font-bold">Thanh toán một phần</span>
                            <?php else: ?>
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs font-bold">Chưa thanh toán</span>
                            <?php endif; ?>
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
                            <?php foreach ($danhSachSP as $index => $sp): 
                                $slThucNhan = $sp['so_luong_nhan'] ?? $sp['so_luong'];
                            ?>
                                <tr class="hover:bg-gray-50/50 transition-colors <?= $slThucNhan < $sp['so_luong'] ? 'bg-red-50/30' : '' ?>">
                                    <td class="py-3 px-4 text-center text-sm text-gray-500"><?= $index + 1 ?></td>
                                    <td class="py-3 px-4">
                                        <div class="font-bold text-gray-900"><?= htmlspecialchars($sp['product_name']) ?></div>
                                        <div class="text-xs text-gray-500 mt-0.5">Mã: <?= htmlspecialchars($sp['sku']) ?> • <?= htmlspecialchars($sp['variant_name']) ?></div>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="font-bold text-gray-500"><?= $sp['so_luong'] ?> <span class="text-xs font-normal"><?= htmlspecialchars($sp['don_vi_tinh'] ?? '') ?></span></span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex items-center justify-center gap-1">
                                            <input type="number" min="0" value="<?= $slThucNhan ?>" readonly class="w-20 px-2 py-1.5 border <?= $slThucNhan < $sp['so_luong'] ? 'border-red-300 text-red-700 bg-red-50' : 'border-gray-300 bg-gray-50' ?> rounded focus:outline-none focus:border-red-900 text-sm text-center font-bold">
                                            <span class="text-xs text-gray-500"><?= htmlspecialchars($sp['don_vi_tinh'] ?? '') ?></span>
                                        </div>
                                        <?php if ($slThucNhan < $sp['so_luong']): ?>
                                            <div class="text-[10px] text-red-600 mt-1 font-medium">Thiếu <?= $sp['so_luong'] - $slThucNhan ?> <?= htmlspecialchars($sp['don_vi_tinh'] ?? '') ?></div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3 px-4 text-right">
                                        <span class="text-sm text-gray-600"><?= number_format($sp['don_gia'], 0, ',', '.') ?> đ</span>
                                    </td>
                                    <td class="py-3 px-4 text-right">
                                        <span class="font-bold text-gray-900"><?= number_format($slThucNhan * $sp['don_gia'], 0, ',', '.') ?> đ</span>
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

<script>
    async function duyetPhieu(id) {
        if(confirm('Xác nhận duyệt phiếu nhập kho này? Phiếu sẽ được chuyển sang giai đoạn Kiểm hàng.')) {
            try {
                const res = await fetch('<?= APP_URL ?>/admin/nhap-kho/duyet/' + id, { method: 'POST' });
                const data = await res.json();
                if(data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    showToast(data.message, 'error');
                }
            } catch (err) {
                showToast('Có lỗi xảy ra', 'error');
            }
        }
    }

    async function huyPhieu(id) {
        if(confirm('Bạn có chắc chắn muốn hủy phiếu này không? (Thao tác này không thể hoàn tác)')) {
            try {
                const res = await fetch('<?= APP_URL ?>/admin/nhap-kho/huy/' + id, { method: 'POST' });
                const data = await res.json();
                if(data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    showToast(data.message, 'error');
                }
            } catch (err) {
                showToast('Có lỗi xảy ra', 'error');
            }
        }
    }
</script>
