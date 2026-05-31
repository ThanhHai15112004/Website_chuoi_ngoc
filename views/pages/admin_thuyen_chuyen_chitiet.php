<?php
// views/pages/admin_thuyen_chuyen_chitiet.php
$current_page = 'thuyen_chuyen_kho';

$tt = (int)$phieu['trang_thai'];
$bgMap = [
    0 => ['bg' => 'bg-gray-100', 'text' => 'text-gray-700'],
    1 => ['bg' => 'bg-amber-100', 'text' => 'text-amber-700'],
    2 => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700'],
    3 => ['bg' => 'bg-cyan-100', 'text' => 'text-cyan-700'],
    4 => ['bg' => 'bg-emerald-100', 'text' => 'text-emerald-700'],
    5 => ['bg' => 'bg-red-100', 'text' => 'text-[#6B0D18]'],
    6 => ['bg' => 'bg-gray-100', 'text' => 'text-gray-500'],
];
$st = $bgMap[$tt] ?? $bgMap[0];

$tongSL = 0;
$tongThucNhan = 0;
foreach ($chiTiet as $sp) {
    $tongSL += (int)$sp['so_luong'];
    if ($sp['so_luong_thuc_nhan'] !== null) $tongThucNhan += (int)$sp['so_luong_thuc_nhan'];
}
?>

<!-- Trang Chi Tiết Thuyên Chuyển Kho Admin -->
<div class="px-6 py-6 pb-20 max-w-[1400px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <div class="flex items-center gap-3">
                    <h2 class="text-2xl font-bold text-[#6B0D18] leading-tight">Mã phiếu: <?= htmlspecialchars($phieu['ma_phieu']) ?></h2>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wide <?= $st['bg'] ?> <?= $st['text'] ?>">
                        <?= $phieu['trang_thai_text'] ?>
                    </span>
                    <?php if ($phieu['muc_do_uu_tien'] == 1): ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-amber-100 text-amber-700">GẤP</span>
                    <?php endif; ?>
                </div>
                <p class="text-sm text-gray-500 mt-1">Tạo ngày <?= $phieu['ngay_tao'] ? date('d/m/Y H:i', strtotime($phieu['ngay_tao'])) : '' ?> bởi <span class="font-medium text-gray-700"><?= htmlspecialchars($phieu['nguoi_tao_ten'] ?? 'N/A') ?></span></p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:printer-outline"></span> In phiếu
            </button>
            <?php if ($tt == 1): ?>
                <button onclick="actionDuyet()" class="px-5 py-2 bg-[#6B0D18] text-white font-bold rounded-lg hover:bg-red-900 transition-colors text-sm shadow-sm flex items-center gap-2">
                    <span class="iconify text-lg" data-icon="mdi:check-circle-outline"></span> DUYỆT PHIẾU
                </button>
            <?php elseif ($tt == 2): ?>
                <button onclick="actionBatDauChuyen()" class="px-5 py-2 bg-[#6B0D18] text-white font-bold rounded-lg hover:bg-red-900 transition-colors text-sm shadow-sm flex items-center gap-2">
                    <span class="iconify text-lg" data-icon="mdi:truck-fast-outline"></span> BẮT ĐẦU CHUYỂN
                </button>
            <?php elseif ($tt == 3): ?>
                <button onclick="actionNhanHang()" class="px-5 py-2 bg-emerald-600 text-white font-bold rounded-lg hover:bg-emerald-700 transition-colors text-sm shadow-sm flex items-center gap-2">
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
                        <h3 class="text-lg font-bold text-gray-900"><?= htmlspecialchars($phieu['ten_kho_gui'] ?? '') ?></h3>
                        <p class="text-sm text-gray-500 font-medium">Xuất: <?= $tongSL ?> món</p>
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
                        <h3 class="text-lg font-bold text-[#6B0D18]"><?= htmlspecialchars($phieu['ten_kho_nhan'] ?? '') ?></h3>
                        <p class="text-sm text-gray-500 font-medium">
                            <?php if ($tt == 4): ?>
                                Đã nhận đủ: <?= $tongThucNhan ?> món
                            <?php elseif ($tt == 5): ?>
                                Nhận: <?= $tongThucNhan ?> món <span class="text-red-500">(Thiếu <?= $tongSL - $tongThucNhan ?>)</span>
                            <?php else: ?>
                                Chờ nhận: <?= $tongSL ?> món
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between bg-gray-50/50">
                    <h3 class="font-bold text-gray-900">Danh sách sản phẩm thuyên chuyển</h3>
                    <span class="text-sm font-medium text-gray-600 bg-white px-3 py-1 rounded-full border border-gray-200 shadow-sm">Tổng cộng: <?= $tongSL ?> món</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white text-xs uppercase text-gray-500 border-b border-gray-100">
                                <th class="py-3 px-6 font-semibold">Sản phẩm</th>
                                <th class="py-3 px-6 font-semibold text-center">Mã SKU</th>
                                <th class="py-3 px-6 font-semibold text-center">Biến thể</th>
                                <th class="py-3 px-6 font-semibold">Vị trí kho</th>
                                <th class="py-3 px-6 font-semibold text-right">SL chuyển</th>
                                <?php if ($tt == 4 || $tt == 5): ?>
                                    <th class="py-3 px-6 font-semibold text-right">Thực nhận</th>
                                    <th class="py-3 px-6 font-semibold text-right">Chênh lệch</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100" id="chiTietTable">
                            <?php foreach ($chiTiet as $sp): ?>
                            <tr class="hover:bg-gray-50/50" data-id="<?= $sp['id'] ?>" data-bien-the="<?= $sp['id_bien_the'] ?>" data-so-luong="<?= $sp['so_luong'] ?>">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded border border-gray-200 overflow-hidden shrink-0 bg-gray-100 flex items-center justify-center">
                                            <?php if (!empty($sp['image'])): ?>
                                                <img src="<?= APP_URL ?>/<?= htmlspecialchars($sp['image']) ?>" class="w-full h-full object-cover">
                                            <?php else: ?>
                                                <span class="iconify text-gray-400 text-xl" data-icon="mdi:image-outline"></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="font-bold text-gray-900"><?= htmlspecialchars($sp['product_name'] ?? '') ?></div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-center text-sm font-medium text-gray-600"><?= htmlspecialchars($sp['sku'] ?? '') ?></td>
                                <td class="py-4 px-6 text-center text-sm text-gray-500"><?= htmlspecialchars($sp['variant_name'] ?? 'Mặc định') ?></td>
                                <td class="py-4 px-6">
                                    <?php if (!empty($sp['ten_vi_tri'])): ?>
                                        <div class="flex items-center gap-1.5 text-sm">
                                            <span class="iconify text-gray-400" data-icon="mdi:map-marker-outline"></span>
                                            <span class="text-gray-700 font-medium"><?= htmlspecialchars($sp['ten_kho_vi_tri'] ?? '') ?> > <?= htmlspecialchars($sp['ten_vi_tri']) ?></span>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-xs text-gray-400 italic">Không xác định</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-6 text-right font-bold text-[#6B0D18] text-lg"><?= $sp['so_luong'] ?></td>
                                <?php if ($tt == 4 || $tt == 5): ?>
                                    <?php
                                        $thucNhan = $sp['so_luong_thuc_nhan'] !== null ? (int)$sp['so_luong_thuc_nhan'] : (int)$sp['so_luong'];
                                        $chenh = $thucNhan - (int)$sp['so_luong'];
                                    ?>
                                    <td class="py-4 px-6 text-right font-bold text-gray-900 text-lg"><?= $thucNhan ?></td>
                                    <td class="py-4 px-6 text-right font-medium">
                                        <?php if ($chenh < 0): ?>
                                            <span class="inline-flex px-2 py-0.5 rounded bg-red-100 text-red-700 text-sm">Thiếu <?= abs($chenh) ?></span>
                                        <?php elseif ($chenh > 0): ?>
                                            <span class="inline-flex px-2 py-0.5 rounded bg-emerald-100 text-emerald-700 text-sm">Thừa <?= $chenh ?></span>
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
                <?php if (!empty($phieu['ghi_chu'])): ?>
                    <div class="p-4 bg-yellow-50 border-t border-yellow-100 flex gap-3">
                        <span class="iconify text-yellow-600 text-xl shrink-0" data-icon="mdi:alert-circle-outline"></span>
                        <div>
                            <p class="text-xs font-bold text-yellow-800 uppercase mb-1">Ghi chú phiếu</p>
                            <p class="text-sm text-yellow-700"><?= htmlspecialchars($phieu['ghi_chu']) ?></p>
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
                    <?php foreach ($timeline as $step): ?>
                        <div class="relative">
                            <div class="absolute -left-[35px] top-1 w-6 h-6 rounded-full border-2 flex items-center justify-center bg-white
                                <?= $step['status'] === 'completed' ? 'border-[#6B0D18] text-[#6B0D18]' : 'border-gray-300 text-gray-300' ?>">
                                <?php if ($step['status'] === 'completed'): ?>
                                    <span class="iconify text-sm" data-icon="mdi:check"></span>
                                <?php else: ?>
                                    <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold <?= $step['status'] === 'completed' ? 'text-gray-900' : 'text-gray-500' ?>"><?= $step['title'] ?></h4>
                                <?php if ($step['time']): ?>
                                    <div class="text-xs text-gray-500 mt-1">
                                        <?= $step['time'] ?> 
                                        <?php if ($step['actor']): ?>
                                            &middot; <span class="font-medium"><?= htmlspecialchars($step['actor']) ?></span>
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
                <?php if ($tt < 3 || $tt == 6): ?>
                <?php if ($tt != 6): ?>
                    <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                        <button onclick="actionHuy()" class="text-sm font-medium text-red-500 hover:text-red-700 transition-colors">
                            <span class="iconify inline-block align-text-bottom text-lg" data-icon="mdi:close-circle-outline"></span> Hủy phiếu chuyển kho này
                        </button>
                    </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal Nhận Hàng -->
<div id="modalNhanHang" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 hidden items-center justify-center">
    <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900">Xác nhận nhận hàng</h3>
            <button onclick="closeNhanHangModal()" class="text-gray-400 hover:text-gray-600"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6">
            <p class="text-sm text-gray-500 mb-4">Nhập số lượng thực nhận cho từng sản phẩm:</p>
            <table class="w-full text-left border-collapse mb-4">
                <thead>
                    <tr class="text-xs uppercase text-gray-500 border-b border-gray-200">
                        <th class="py-2 px-3 font-semibold">Sản phẩm</th>
                        <th class="py-2 px-3 font-semibold w-48">Vị trí lưu (Kho nhận)</th>
                        <th class="py-2 px-3 text-center font-semibold">SL chuyển</th>
                        <th class="py-2 px-3 text-center font-semibold">Thực nhận</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="nhanHangBody">
                </tbody>
            </table>
            <div class="flex justify-end gap-3">
                <button onclick="closeNhanHangModal()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50">Hủy</button>
                <button onclick="confirmNhanHang()" class="px-6 py-2 bg-emerald-600 text-white rounded-lg text-sm font-bold hover:bg-emerald-700">Xác nhận nhận hàng</button>
            </div>
        </div>
    </div>
</div>

<script>
const APP_URL = '<?= APP_URL ?>';
const PHIEU_ID = '<?= $phieu['id'] ?>';

function actionDuyet() {
    if (!confirm('Bạn có chắc muốn Duyệt phiếu chuyển kho này?\nPhiếu sẽ được chuyển sang trạng thái "Đã duyệt".')) return;
    
    fetch(`${APP_URL}/admin/thuyen-chuyen-kho/duyet/${PHIEU_ID}`, { method: 'POST' })
        .then(r => r.json())
        .then(result => {
            showToast(result.message, result.success ? 'success' : 'error');
            if (result.success) setTimeout(() => { window.location.reload(); }, 1000);
        });
}

function actionBatDauChuyen() {
    if (!confirm('Bắt đầu chuyển hàng?\nSố lượng sản phẩm sẽ được trừ khỏi kho gửi.')) return;
    
    fetch(`${APP_URL}/admin/thuyen-chuyen-kho/bat-dau-chuyen/${PHIEU_ID}`, { method: 'POST' })
        .then(r => r.json())
        .then(result => {
            showToast(result.message, result.success ? 'success' : 'error');
            if (result.success) setTimeout(() => { window.location.reload(); }, 1000);
        });
}

async function actionNhanHang() {
    const idKhoNhan = '<?= $phieu['id_kho_nhan'] ?>';
    let locations = [];
    try {
        const res = await fetch(`${APP_URL}/admin/cau-hinh-kho/api/vi-tri-kho/${idKhoNhan}`);
        const data = await res.json();
        if (data.success) locations = data.data;
    } catch (e) {
        console.error(e);
    }
    
    let locOptions = '<option value="">-- Chọn vị trí --</option>';
    locations.forEach(l => {
        locOptions += `<option value="${l.id}">${l.ten_vi_tri}</option>`;
    });

    // Mở modal nhập số lượng thực nhận
    const rows = document.querySelectorAll('#chiTietTable tr[data-id]');
    let html = '';
    rows.forEach(row => {
        const id = row.getAttribute('data-id');
        const bienThe = row.getAttribute('data-bien-the');
        const soLuong = row.getAttribute('data-so-luong');
        const tenSp = row.querySelector('.font-bold.text-gray-900')?.textContent || '';
        
        if (id) {
            html += `
                <tr>
                    <td class="py-2 px-3 text-sm font-medium text-gray-900">${tenSp}</td>
                    <td class="py-2 px-3">
                        <select class="nhan-hang-location w-full px-2 py-1.5 border border-gray-300 rounded text-xs focus:border-emerald-500" data-id="${id}">
                            ${locOptions}
                        </select>
                    </td>
                    <td class="py-2 px-3 text-center font-bold text-[#6B0D18]">${soLuong}</td>
                    <td class="py-2 px-3 text-center">
                        <input type="number" min="0" max="${soLuong}" value="${soLuong}" 
                               data-id="${id}" data-bien-the="${bienThe}" data-so-luong="${soLuong}"
                               class="nhan-hang-input w-20 text-center px-2 py-1 border border-gray-300 rounded font-bold focus:outline-none focus:ring-2 focus:ring-emerald-200 focus:border-emerald-500">
                    </td>
                </tr>`;
        }
    });
    
    document.getElementById('nhanHangBody').innerHTML = html;
    document.getElementById('modalNhanHang').classList.remove('hidden');
    document.getElementById('modalNhanHang').classList.add('flex');
}

function closeNhanHangModal() {
    document.getElementById('modalNhanHang').classList.add('hidden');
    document.getElementById('modalNhanHang').classList.remove('flex');
}

function confirmNhanHang() {
    const inputs = document.querySelectorAll('.nhan-hang-input');
    const locSelects = document.querySelectorAll('.nhan-hang-location');
    const chiTiet = [];
    
    let hasMissingLoc = false;
    
    inputs.forEach((input, index) => {
        const locId = locSelects[index].value;
        const thucNhan = parseInt(input.value) || 0;
        
        if (thucNhan > 0 && !locId) {
            hasMissingLoc = true;
            locSelects[index].classList.add('border-red-500', 'bg-red-50');
        } else {
            locSelects[index].classList.remove('border-red-500', 'bg-red-50');
        }
        
        chiTiet.push({
            id_chi_tiet: input.getAttribute('data-id'),
            id_bien_the: input.getAttribute('data-bien-the'),
            so_luong_thuc_nhan: thucNhan,
            id_vi_tri_nhan: locId || null,
            so_luong_loi: 0,
            so_luong_yeu_cau: parseInt(input.getAttribute('data-so-luong')) || 0
        });
    });
    
    if (hasMissingLoc) {
        showToast('Vui lòng chọn Vị trí lưu cho các sản phẩm có số lượng thực nhận > 0.', 'warning');
        return;
    }
    
    fetch(`${APP_URL}/admin/thuyen-chuyen-kho/nhan-hang/${PHIEU_ID}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ chi_tiet: chiTiet })
    })
    .then(r => r.json())
    .then(result => {
        showToast(result.message, result.success ? 'success' : 'error');
        if (result.success) setTimeout(() => { window.location.reload(); }, 1000);
    });
}

function actionHuy() {
    let reason = prompt('Nhập lý do hủy phiếu chuyển kho:');
    if (!reason) return;
    
    fetch(`${APP_URL}/admin/thuyen-chuyen-kho/huy/${PHIEU_ID}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ ly_do: reason })
    })
    .then(r => r.json())
    .then(result => {
        showToast(result.message, result.success ? 'success' : 'error');
        if (result.success) setTimeout(() => { window.location.href = `${APP_URL}/admin/thuyen-chuyen-kho`; }, 1000);
    });
}
</script>
