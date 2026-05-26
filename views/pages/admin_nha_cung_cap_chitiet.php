<!-- Trang Chi Tiết Nhà Cung Cấp & Công Nợ -->
<div class="px-6 py-6 pb-20 max-w-[1400px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="<?= APP_URL ?>/admin/nha-cung-cap" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <div class="flex items-center gap-3">
                    <h2 class="text-2xl font-bold text-gray-900 leading-tight"><?= $ncc['ten'] ?></h2>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-600">
                        <?= $ncc['nhom'] ?>
                    </span>
                </div>
                <p class="text-sm text-gray-500 mt-1">Mã NCC: <?= $ncc['id'] ?></p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/nha-cung-cap/sua/<?= $ncc['id'] ?>" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
            </a>
        </div>
    </div>

    <!-- Thông tin Tóm tắt -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <!-- Card Liên hệ -->
        <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Thông tin liên hệ</h3>
            <div class="space-y-3 text-sm">
                <div class="flex items-start gap-3">
                    <span class="iconify text-gray-400 mt-0.5 text-lg" data-icon="mdi:phone"></span>
                    <span class="font-medium text-gray-900"><?= $ncc['sdt'] ?></span>
                </div>
                <div class="flex items-start gap-3">
                    <span class="iconify text-gray-400 mt-0.5 text-lg" data-icon="mdi:email-outline"></span>
                    <span class="text-gray-600"><?= $ncc['email'] ?: 'Chưa cập nhật' ?></span>
                </div>
                <div class="flex items-start gap-3">
                    <span class="iconify text-gray-400 mt-0.5 text-lg" data-icon="mdi:map-marker-outline"></span>
                    <span class="text-gray-600"><?= $ncc['dia_chi'] ?: 'Chưa cập nhật' ?></span>
                </div>
            </div>
        </div>

        <!-- Card Ngân hàng -->
        <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Tài khoản thanh toán</h3>
            <div class="space-y-3">
                <?php if($ncc['stk']): ?>
                <div class="p-3 bg-blue-50 border border-blue-100 rounded-lg">
                    <div class="font-bold text-blue-900 font-mono"><?= explode('-', $ncc['stk'])[0] ?? '' ?></div>
                    <div class="text-xs text-blue-700 mt-1"><?= explode('-', $ncc['stk'])[1] ?? '' ?> - <?= explode('-', $ncc['stk'])[2] ?? '' ?></div>
                </div>
                <?php else: ?>
                <p class="text-sm text-gray-500 italic">Chưa cập nhật thông tin chuyển khoản.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Card Mua hàng -->
        <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Tổng tiền nhập hàng</h3>
            <div class="text-2xl font-bold text-gray-900 mt-2"><?= number_format($ncc['tong_mua'], 0, ',', '.') ?>đ</div>
            <div class="text-sm text-gray-500 mt-2 pt-2 border-t border-gray-100 flex justify-between">
                <span>Đã thanh toán:</span>
                <span class="font-medium text-gray-700"><?= number_format($ncc['da_tra'], 0, ',', '.') ?>đ</span>
            </div>
        </div>

        <!-- Card Công nợ -->
        <div class="bg-white rounded-xl border <?= $ncc['cong_no'] > 0 ? 'border-red-200 bg-red-50/30' : 'border-gray-200' ?> p-5 shadow-sm relative overflow-hidden">
            <h3 class="text-xs font-bold <?= $ncc['cong_no'] > 0 ? 'text-red-500' : 'text-gray-400' ?> uppercase tracking-wider mb-1">Công nợ hiện tại</h3>
            
            <?php if ($ncc['cong_no'] > 0): ?>
                <div class="text-3xl font-bold text-red-600 mt-2"><?= number_format($ncc['cong_no'], 0, ',', '.') ?>đ</div>
                <button onclick="alert('Mở popup lập Phiếu Chi trả nợ')" class="mt-3 w-full py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                    Thanh toán nợ
                </button>
            <?php elseif ($ncc['cong_no'] < 0): ?>
                <div class="text-3xl font-bold text-emerald-600 mt-2">-<?= number_format(abs($ncc['cong_no']), 0, ',', '.') ?>đ</div>
                <p class="text-xs text-emerald-600 mt-2 font-medium">Nhà cung cấp đang nợ (Bạn đã trả trước)</p>
            <?php else: ?>
                <div class="text-3xl font-bold text-gray-400 mt-2">0đ</div>
                <p class="text-xs text-gray-500 mt-2">Không có dư nợ.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Tabs Content -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        
        <!-- Tab Headers -->
        <div class="flex border-b border-gray-200">
            <button onclick="switchTab('tabNhapHang')" id="btnTabNhapHang" class="flex-1 py-4 text-sm font-bold text-[#6B0D18] border-b-2 border-[#6B0D18] bg-gray-50/50 hover:bg-gray-50 transition-colors">
                LỊCH SỬ NHẬP HÀNG
            </button>
            <button onclick="switchTab('tabCongNo')" id="btnTabCongNo" class="flex-1 py-4 text-sm font-bold text-gray-500 border-b-2 border-transparent hover:bg-gray-50 hover:text-gray-700 transition-colors">
                SỔ CÔNG NỢ & THANH TOÁN
            </button>
        </div>

        <!-- Nội dung Tab Nhập Hàng -->
        <div id="tabNhapHang" class="block">
            <div class="overflow-x-auto min-h-[300px]">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-200 text-xs uppercase text-gray-500">
                            <th class="py-3 px-6 font-semibold">Mã Phiếu Nhập</th>
                            <th class="py-3 px-6 font-semibold">Ngày nhập</th>
                            <th class="py-3 px-6 font-semibold text-right">Tổng tiền</th>
                            <th class="py-3 px-6 font-semibold text-right">Đã thanh toán</th>
                            <th class="py-3 px-6 font-semibold text-right">Còn nợ phiếu này</th>
                            <th class="py-3 px-6 font-semibold">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php foreach($lichSuNhap as $pn): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-6">
                                <a href="#" class="font-bold text-[#6B0D18] hover:underline"><?= $pn['id'] ?></a>
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-600"><?= $pn['ngay'] ?></td>
                            <td class="py-4 px-6 text-right font-bold text-gray-900"><?= number_format($pn['tong_tien'], 0, ',', '.') ?>đ</td>
                            <td class="py-4 px-6 text-right text-gray-600"><?= number_format($pn['da_tra'], 0, ',', '.') ?>đ</td>
                            <td class="py-4 px-6 text-right text-red-600 font-medium"><?= number_format($pn['con_no'], 0, ',', '.') ?>đ</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-amber-50 text-amber-600 border border-amber-200">
                                    <?= $pn['trang_thai'] ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if(empty($lichSuNhap)): ?>
                        <tr><td colspan="6" class="py-8 text-center text-gray-500">Chưa có giao dịch nhập hàng nào.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Nội dung Tab Công Nợ -->
        <div id="tabCongNo" class="hidden">
            <div class="overflow-x-auto min-h-[300px]">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-200 text-xs uppercase text-gray-500">
                            <th class="py-3 px-6 font-semibold">Ngày chứng từ</th>
                            <th class="py-3 px-6 font-semibold">Loại giao dịch</th>
                            <th class="py-3 px-6 font-semibold">Mã chứng từ</th>
                            <th class="py-3 px-6 font-semibold text-right">Phát sinh tăng (Nợ)</th>
                            <th class="py-3 px-6 font-semibold text-right">Phát sinh giảm (Trả)</th>
                            <th class="py-3 px-6 font-semibold text-right">Dư nợ cuối</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php foreach($lichSuCongNo as $cn): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-6 text-sm text-gray-600"><?= $cn['ngay'] ?></td>
                            <td class="py-4 px-6">
                                <?php if($cn['loai'] === 'Nhập nợ'): ?>
                                    <span class="inline-flex items-center gap-1.5 font-medium text-red-600">
                                        <span class="iconify" data-icon="mdi:arrow-up-bold-circle-outline"></span> <?= $cn['loai'] ?>
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1.5 font-medium text-emerald-600">
                                        <span class="iconify" data-icon="mdi:arrow-down-bold-circle-outline"></span> <?= $cn['loai'] ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6">
                                <a href="#" class="font-bold text-blue-600 hover:underline text-sm"><?= $cn['chung_tu'] ?></a>
                            </td>
                            <td class="py-4 px-6 text-right font-medium text-gray-900">
                                <?= $cn['so_tien'] > 0 ? number_format($cn['so_tien'], 0, ',', '.') . 'đ' : '-' ?>
                            </td>
                            <td class="py-4 px-6 text-right font-medium text-gray-900">
                                <?= $cn['so_tien'] < 0 ? number_format(abs($cn['so_tien']), 0, ',', '.') . 'đ' : '-' ?>
                            </td>
                            <td class="py-4 px-6 text-right font-bold text-[#6B0D18]">
                                <?= number_format($cn['du_no_cuoi'], 0, ',', '.') ?>đ
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if(empty($lichSuCongNo)): ?>
                        <tr><td colspan="6" class="py-8 text-center text-gray-500">Chưa có phát sinh công nợ nào.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
function switchTab(tabId) {
    // Ẩn tất cả nội dung tab
    document.getElementById('tabNhapHang').classList.add('hidden');
    document.getElementById('tabNhapHang').classList.remove('block');
    document.getElementById('tabCongNo').classList.add('hidden');
    document.getElementById('tabCongNo').classList.remove('block');

    // Hiện tab được chọn
    document.getElementById(tabId).classList.remove('hidden');
    document.getElementById(tabId).classList.add('block');

    // Reset màu nút
    const btnClassInactive = "flex-1 py-4 text-sm font-bold text-gray-500 border-b-2 border-transparent hover:bg-gray-50 hover:text-gray-700 transition-colors";
    const btnClassActive = "flex-1 py-4 text-sm font-bold text-[#6B0D18] border-b-2 border-[#6B0D18] bg-gray-50/50 hover:bg-gray-50 transition-colors";

    document.getElementById('btnTabNhapHang').className = btnClassInactive;
    document.getElementById('btnTabCongNo').className = btnClassInactive;

    if(tabId === 'tabNhapHang') {
        document.getElementById('btnTabNhapHang').className = btnClassActive;
    } else {
        document.getElementById('btnTabCongNo').className = btnClassActive;
    }
}
</script>
