<!-- Trang Chi Tiết Thuyên Chuyển Kho Admin (V2) -->
<div class="px-6 py-6 pb-20 max-w-[1400px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <div class="flex items-center gap-3">
                    <h2 class="text-2xl font-bold text-[#6B0D18] leading-tight">Mã phiếu: <?= $phieu['id'] ?></h2>
                    <?php 
                        $bg = 'bg-gray-100'; $text = 'text-gray-700';
                        if ($phieu['trang_thai'] === 'Chờ xác nhận') { $bg = 'bg-amber-100'; $text = 'text-amber-700'; }
                        elseif ($phieu['trang_thai'] === 'Đã duyệt') { $bg = 'bg-blue-100'; $text = 'text-blue-700'; }
                        elseif ($phieu['trang_thai'] === 'Đang chuyển') { $bg = 'bg-cyan-100'; $text = 'text-cyan-700'; }
                        elseif ($phieu['trang_thai'] === 'Chờ nhận hàng') { $bg = 'bg-amber-50'; $text = 'text-amber-600'; }
                        elseif ($phieu['trang_thai'] === 'Đã hoàn tất') { $bg = 'bg-emerald-100'; $text = 'text-emerald-700'; }
                        elseif ($phieu['trang_thai'] === 'Có lỗi / thiếu hàng') { $bg = 'bg-red-100'; $text = 'text-[#6B0D18]'; }
                    ?>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wide <?= $bg ?> <?= $text ?>">
                        <?= $phieu['trang_thai'] ?>
                    </span>
                    <?php if($phieu['gap']): ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-amber-100 text-amber-700">GẤP</span>
                    <?php endif; ?>
                </div>
                <p class="text-sm text-gray-500 mt-1">Tạo ngày <?= $phieu['ngay_tao'] ?> bởi <span class="font-medium text-gray-700"><?= $phieu['nguoi_tao'] ?></span></p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:printer-outline"></span> In phiếu
            </button>
            <?php if($phieu['trang_thai'] === 'Chờ xác nhận'): ?>
                <button onclick="duyetPhieu()" class="px-5 py-2 bg-[#6B0D18] text-white font-bold rounded-lg hover:bg-red-900 transition-colors text-sm shadow-sm flex items-center gap-2">
                    <span class="iconify text-lg" data-icon="mdi:check-circle-outline"></span> DUYỆT PHIẾU
                </button>
            <?php elseif($phieu['trang_thai'] === 'Đã duyệt'): ?>
                <button onclick="batDauChuyen()" class="px-5 py-2 bg-[#6B0D18] text-white font-bold rounded-lg hover:bg-red-900 transition-colors text-sm shadow-sm flex items-center gap-2">
                    <span class="iconify text-lg" data-icon="mdi:truck-fast-outline"></span> BẮT ĐẦU CHUYỂN
                </button>
            <?php elseif($phieu['trang_thai'] === 'Đang chuyển' || $phieu['trang_thai'] === 'Chờ nhận hàng'): ?>
                <button onclick="nhanHang()" class="px-5 py-2 bg-emerald-600 text-white font-bold rounded-lg hover:bg-emerald-700 transition-colors text-sm shadow-sm flex items-center gap-2">
                    <span class="iconify text-lg" data-icon="mdi:package-down"></span> XÁC NHẬN NHẬN HÀNG
                </button>
            <?php endif; ?>
        </div>
    </div>

    <!-- Thông tin Tổng quan -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        
        <!-- Cột 1 & 2: Sản phẩm & Thông tin phiếu -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Kho Gửi -> Nhận -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 flex items-center justify-between shadow-sm relative overflow-hidden">
                <div class="absolute inset-y-0 left-1/2 -ml-0.5 w-1 bg-gray-100"></div>
                <div class="w-[45%] text-center">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Từ kho gửi</p>
                    <div class="flex flex-col items-center gap-2">
                        <div class="w-12 h-12 rounded-full bg-gray-50 border border-gray-200 flex items-center justify-center text-gray-500">
                            <span class="iconify text-2xl" data-icon="mdi:warehouse"></span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900"><?= $phieu['kho_gui'] ?></h3>
                        <p class="text-sm text-gray-500 font-medium">Xuất: <?= $phieu['tong_sl'] ?> món</p>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-full bg-white border border-gray-200 shadow-sm flex items-center justify-center shrink-0 z-10 text-[#6B0D18]">
                    <span class="iconify text-xl" data-icon="mdi:arrow-right-thick"></span>
                </div>
                <div class="w-[45%] text-center">
                    <p class="text-xs font-bold text-[#6B0D18] uppercase tracking-wider mb-2">Đến kho nhận</p>
                    <div class="flex flex-col items-center gap-2">
                        <div class="w-12 h-12 rounded-full bg-red-50 border border-red-100 flex items-center justify-center text-[#6B0D18]">
                            <span class="iconify text-2xl" data-icon="mdi:warehouse"></span>
                        </div>
                        <h3 class="text-lg font-bold text-[#6B0D18]"><?= $phieu['kho_nhan'] ?></h3>
                        <p class="text-sm text-gray-500 font-medium">
                            <?php if($phieu['trang_thai'] === 'Đã hoàn tất'): ?>
                                Đã nhận đủ: <?= $phieu['tong_sl'] ?> món
                            <?php elseif(isset($phieu['thiếu'])): ?>
                                Nhận: <?= $phieu['tong_sl'] - $phieu['thiếu'] ?> món <span class="text-red-500">(Thiếu <?= $phieu['thiếu'] ?>)</span>
                            <?php else: ?>
                                Chờ nhận: <?= $phieu['tong_sl'] ?> món
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between bg-gray-50/50">
                    <h3 class="font-bold text-gray-900">Danh sách sản phẩm thuyên chuyển</h3>
                    <span class="text-sm font-medium text-gray-600 bg-white px-3 py-1 rounded-full border border-gray-200 shadow-sm">Tổng cộng: <?= $phieu['tong_sl'] ?> món</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white text-xs uppercase text-gray-500 border-b border-gray-100">
                                <th class="py-3 px-6 font-semibold">Sản phẩm</th>
                                <th class="py-3 px-6 font-semibold text-center">Mã SKU</th>
                                <th class="py-3 px-6 font-semibold text-center">Biến thể</th>
                                <th class="py-3 px-6 font-semibold text-right">SL chuyển</th>
                                <?php if($phieu['trang_thai'] === 'Đã hoàn tất' || $phieu['trang_thai'] === 'Có lỗi / thiếu hàng'): ?>
                                    <th class="py-3 px-6 font-semibold text-right">Thực nhận</th>
                                    <th class="py-3 px-6 font-semibold text-right">Chênh lệch</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php foreach($phieu['san_pham'] as $sp): ?>
                            <tr class="hover:bg-gray-50/50">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded border border-gray-200 overflow-hidden shrink-0">
                                            <img src="<?= $sp['hinh_anh'] ?>" class="w-full h-full object-cover">
                                        </div>
                                        <div class="font-bold text-gray-900"><?= $sp['ten'] ?></div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-center text-sm font-medium text-gray-600"><?= $sp['sku'] ?></td>
                                <td class="py-4 px-6 text-center text-sm text-gray-500"><?= $sp['size'] ?></td>
                                <td class="py-4 px-6 text-right font-bold text-[#6B0D18] text-lg"><?= $sp['so_luong'] ?></td>
                                <?php if($phieu['trang_thai'] === 'Đã hoàn tất' || $phieu['trang_thai'] === 'Có lỗi / thiếu hàng'): ?>
                                    <?php 
                                        $thuc_nhan = $sp['so_luong']; 
                                        $chenh = 0;
                                        if (isset($phieu['thiếu']) && $phieu['thiếu'] > 0) {
                                            // Mock logic: SP đầu tiên bị trừ đi số thiếu
                                            $chenh = -$phieu['thiếu'];
                                            $thuc_nhan = $sp['so_luong'] + $chenh;
                                            $phieu['thiếu'] = 0; // Chỉ trừ 1 lần cho mock
                                        }
                                    ?>
                                    <td class="py-4 px-6 text-right font-bold text-gray-900 text-lg"><?= $thuc_nhan ?></td>
                                    <td class="py-4 px-6 text-right font-medium">
                                        <?php if($chenh < 0): ?>
                                            <span class="inline-flex px-2 py-0.5 rounded bg-red-100 text-red-700 text-sm">Thiếu <?= abs($chenh) ?></span>
                                        <?php else: ?>
                                            <span class="text-gray-400">-</span>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if($phieu['ghi_chu']): ?>
                    <div class="p-4 bg-yellow-50 border-t border-yellow-100 flex gap-3">
                        <span class="iconify text-yellow-600 text-xl shrink-0" data-icon="mdi:alert-circle-outline"></span>
                        <div>
                            <p class="text-xs font-bold text-yellow-800 uppercase mb-1">Ghi chú phiếu</p>
                            <p class="text-sm text-yellow-700"><?= $phieu['ghi_chu'] ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <!-- Cột 3: Timeline & Trạng thái -->
        <div class="space-y-6">
            
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="font-bold text-gray-900 mb-6 pb-4 border-b border-gray-200">Tiến trình xử lý</h3>
                
                <div class="relative pl-6 space-y-6 border-l-2 border-gray-100 ml-3">
                    <?php foreach($timeline as $step): ?>
                        <div class="relative">
                            <!-- Icon/Chấm Timeline -->
                            <div class="absolute -left-[35px] top-1 w-6 h-6 rounded-full border-2 flex items-center justify-center bg-white
                                <?= $step['status'] === 'completed' ? 'border-[#6B0D18] text-[#6B0D18]' : 'border-gray-300 text-gray-300' ?>">
                                <?php if($step['status'] === 'completed'): ?>
                                    <span class="iconify text-sm" data-icon="mdi:check"></span>
                                <?php else: ?>
                                    <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Nội dung -->
                            <div>
                                <h4 class="text-sm font-bold <?= $step['status'] === 'completed' ? 'text-gray-900' : 'text-gray-500' ?>"><?= $step['title'] ?></h4>
                                <?php if($step['time']): ?>
                                    <div class="text-xs text-gray-500 mt-1">
                                        <?= $step['time'] ?> 
                                        <?php if($step['actor']): ?>
                                            &middot; <span class="font-medium"><?= $step['actor'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="text-xs text-gray-400 mt-1 italic">Chưa thực hiện</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Thao tác Hủy -->
                <?php if($phieu['trang_thai'] !== 'Đã hoàn tất' && $phieu['trang_thai'] !== 'Đã hủy'): ?>
                    <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                        <button onclick="huyPhieu()" class="text-sm font-medium text-red-500 hover:text-red-700 transition-colors">
                            <span class="iconify inline-block align-text-bottom text-lg" data-icon="mdi:close-circle-outline"></span> Hủy phiếu chuyển kho này
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>

<script>
function duyetPhieu() {
    if(confirm('Bạn có chắc muốn Duyệt phiếu chuyển kho này?\nPhiếu sẽ được chuyển sang trạng thái "Đã duyệt" và có thể bắt đầu xuất kho chuyển đi.')) {
        alert('Đã duyệt thành công!');
        window.location.reload();
    }
}

function batDauChuyen() {
    if(confirm('Bắt đầu chuyển hàng?\nSố lượng sản phẩm sẽ được trừ khỏi kho gửi và trạng thái đổi thành "Đang chuyển".')) {
        alert('Đã chuyển thành công!');
        window.location.reload();
    }
}

function nhanHang() {
    let sl = prompt('Nhập số lượng thực nhận từ kho gửi:', '<?= $phieu['tong_sl'] ?>');
    if (sl !== null) {
        if (sl < <?= $phieu['tong_sl'] ?>) {
            alert('Cảnh báo: Bạn đã nhận THIẾU ' + (<?= $phieu['tong_sl'] ?> - sl) + ' sản phẩm!\nTrạng thái sẽ được cập nhật thành "Có lỗi / thiếu hàng".');
        } else {
            alert('Đã xác nhận nhận đủ hàng. Trạng thái cập nhật thành "Đã hoàn tất".');
        }
        window.location.reload();
    }
}

function huyPhieu() {
    let reason = prompt('Nhập lý do hủy phiếu chuyển kho này:');
    if (reason) {
        alert('Đã hủy phiếu thành công với lý do: ' + reason);
        window.location.reload();
    }
}
</script>
