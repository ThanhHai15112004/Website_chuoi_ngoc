<?php
// views/pages/admin_kiem_ke_chitiet.php
$current_page = 'kiem_ke';
$tt = (int)($phieu['trang_thai'] ?? 0);
$ttText = $phieu['trang_thai_text'] ?? 'Không xác định';

// Progress
$tongSp = (int)($phieu['tong_sp'] ?? 0);
$daKiem = (int)($phieu['da_kiem'] ?? 0);
$progressPct = $tongSp > 0 ? round(($daKiem / $tongSp) * 100) : 0;
?>
<!-- Trang Chi Tiết & Thực Hiện Phiếu Kiểm Kê -->
<div class="px-6 py-6 pb-32 max-w-[1400px] mx-auto min-h-screen bg-[#FAF8F5]">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div class="flex items-center gap-4">
            <a href="<?= APP_URL ?>/admin/kiem-ke" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <div class="flex items-center gap-3 flex-wrap">
                    <h2 class="text-2xl font-bold text-gray-900 leading-tight"><?= htmlspecialchars($phieu['ma_phieu']) ?></h2>
                    <?php
                    $stClass = 'bg-gray-100 text-gray-600';
                    if ($tt == 1) $stClass = 'bg-blue-100 text-blue-700';
                    elseif ($tt == 2) $stClass = 'bg-amber-100 text-amber-700';
                    elseif ($tt >= 3 && $tt <= 5) $stClass = 'bg-emerald-100 text-emerald-700';
                    elseif ($tt == 6) $stClass = 'bg-gray-100 text-gray-400';
                    ?>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wide <?= $stClass ?>">
                        <?= htmlspecialchars($ttText) ?>
                    </span>
                </div>
                <p class="text-sm text-gray-500 mt-1">
                    <?php if (!empty($phieu['ten_dot'])): ?>
                        <span class="font-medium text-gray-700"><?= htmlspecialchars($phieu['ten_dot']) ?></span> · 
                    <?php endif; ?>
                    Kho: <span class="font-medium text-gray-700"><?= htmlspecialchars($phieu['ten_kho'] ?? '') ?></span> · 
                    Tạo bởi: <span class="font-medium text-gray-700"><?= htmlspecialchars($phieu['nguoi_tao_ten'] ?? 'N/A') ?></span> 
                    lúc <?= $phieu['ngay_tao'] ? date('H:i - d/m/Y', strtotime($phieu['ngay_tao'])) : '' ?>
                </p>
            </div>
        </div>
        
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-colors text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:printer"></span> In phiếu
            </button>
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-colors text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify text-green-600" data-icon="mdi:file-excel"></span> Xuất Excel
            </button>
        </div>
    </div>

    <!-- Header Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Tổng SP kiểm kê</p>
            <div class="text-2xl font-bold text-gray-900"><?= $tongSp ?></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Đã kiểm</p>
            <div class="text-2xl font-bold text-blue-600"><?= $daKiem ?></div>
            <div class="w-full h-1.5 bg-gray-200 rounded-full mt-2">
                <div class="h-1.5 bg-blue-500 rounded-full transition-all" style="width: <?= $progressPct ?>%"></div>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Tổng chênh lệch</p>
            <div class="text-2xl font-bold <?= ($phieu['tong_chenh_lech'] ?? 0) < 0 ? 'text-red-600' : (($phieu['tong_chenh_lech'] ?? 0) > 0 ? 'text-blue-600' : 'text-emerald-600') ?>">
                <?= ($phieu['tong_chenh_lech'] ?? 0) > 0 ? '+' : '' ?><?= $phieu['tong_chenh_lech'] ?? 0 ?>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Giá trị chênh lệch</p>
            <div class="text-lg font-bold text-gray-900"><?= number_format(abs($phieu['gia_tri_lech'] ?? 0), 0, ',', '.') ?>đ</div>
        </div>
    </div>

    <!-- Bảng kiểm đếm -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex items-center justify-between">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:clipboard-check-outline"></span> Bảng kiểm đếm sản phẩm
            </h3>
            <span class="text-sm text-gray-500">Tiến độ: <span class="font-bold text-blue-600"><?= $daKiem ?>/<?= $tongSp ?></span> (<?= $progressPct ?>%)</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1000px]">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                        <th class="py-3 px-4 font-semibold w-12 text-center">STT</th>
                        <th class="py-3 px-4 font-semibold">Sản phẩm</th>
                        <th class="py-3 px-4 font-semibold text-center">Mã SKU</th>
                        <th class="py-3 px-4 font-semibold text-center">Biến thể</th>
                        <th class="py-3 px-4 font-semibold text-center">Vị trí kho</th>
                        <th class="py-3 px-4 font-semibold text-center">Tồn HT</th>
                        <th class="py-3 px-4 font-semibold text-center">Tồn TT</th>
                        <th class="py-3 px-4 font-semibold text-center">Chênh lệch</th>
                        <th class="py-3 px-4 font-semibold">Lý do (Nếu có)</th>
                        <th class="py-3 px-4 font-semibold text-center">Trạng thái</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="kiemKeTableBody">
                    <?php foreach ($chiTiet as $idx => $ct): ?>
                    <?php
                        $clech = $ct['chenh_lech'] !== null ? (int)$ct['chenh_lech'] : null;
                        $ttKiem = $ct['trang_thai_kiem'] ?? 'Chưa kiểm';
                    ?>
                    <tr class="hover:bg-gray-50/50 transition-colors" 
                        data-id="<?= $ct['id'] ?>" 
                        data-bien-the="<?= $ct['id_bien_the'] ?>" 
                        data-ton-ht="<?= $ct['ton_he_thong'] ?>"
                        data-gia-von="<?= $ct['gia_von'] ?? 0 ?>">
                        <td class="py-3 px-4 text-center text-sm text-gray-400"><?= $idx + 1 ?></td>
                        <td class="py-3 px-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded border border-gray-200 overflow-hidden shrink-0 bg-gray-100 flex items-center justify-center">
                                    <?php if (!empty($ct['image'])): ?>
                                        <img src="<?= APP_URL ?>/<?= htmlspecialchars($ct['image']) ?>" class="w-full h-full object-cover">
                                    <?php else: ?>
                                        <span class="iconify text-gray-400 text-xl" data-icon="mdi:image-outline"></span>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-gray-900 line-clamp-1"><?= htmlspecialchars($ct['product_name'] ?? '') ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-4 text-center text-sm font-medium text-gray-600"><?= htmlspecialchars($ct['sku'] ?? '') ?></td>
                        <td class="py-3 px-4 text-center text-sm text-gray-500"><?= htmlspecialchars($ct['variant_name'] ?? 'Mặc định') ?></td>
                        <td class="py-3 px-4 text-center">
                            <span class="text-xs font-medium text-[#6B0D18] bg-red-50 px-2 py-1 rounded-md border border-red-100"><?= htmlspecialchars($ct['ten_vi_tri'] ?? 'Chưa phân bổ') ?></span>
                        </td>
                        <td class="py-3 px-4 text-center font-bold text-gray-900"><?= $ct['ton_he_thong'] ?></td>
                        <td class="py-3 px-4 text-center">
                            <?php if ($tt <= 1): // Đang kiểm - cho nhập ?>
                                <input type="number" min="0" value="<?= $ct['ton_thuc_te'] ?? '' ?>" placeholder="-" 
                                       class="ton-thuc-te w-20 text-center px-2 py-1.5 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] font-bold text-[#6B0D18] bg-white"
                                       onchange="calcChenhLech(this)">
                            <?php else: ?>
                                <span class="font-bold <?= $ct['ton_thuc_te'] !== null ? 'text-[#6B0D18]' : 'text-gray-400' ?>"><?= $ct['ton_thuc_te'] !== null ? $ct['ton_thuc_te'] : '-' ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <?php if ($clech !== null): ?>
                                <?php if ($clech < 0): ?>
                                    <span class="inline-flex px-2 py-0.5 rounded bg-red-100 text-red-700 font-bold text-sm">Thiếu <?= abs($clech) ?></span>
                                <?php elseif ($clech > 0): ?>
                                    <span class="inline-flex px-2 py-0.5 rounded bg-blue-100 text-blue-700 font-bold text-sm">Thừa <?= $clech ?></span>
                                <?php else: ?>
                                    <span class="inline-flex px-2 py-0.5 rounded bg-emerald-100 text-emerald-700 font-bold text-sm">Khớp</span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="chenh-lech-display text-gray-400 text-sm">-</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-3 px-4">
                            <?php if ($tt <= 1): ?>
                                <input type="text" value="<?= htmlspecialchars($ct['ly_do'] ?? '') ?>" placeholder="Lý do..." 
                                       class="ly-do w-full px-2 py-1 border border-transparent hover:border-gray-300 focus:border-[#6B0D18] focus:bg-white bg-gray-50 rounded text-sm transition-colors focus:outline-none">
                            <?php else: ?>
                                <span class="text-sm text-gray-600"><?= htmlspecialchars($ct['ly_do'] ?? '-') ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <?php if ($ttKiem === 'Chưa kiểm'): ?>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-gray-100 text-gray-500">Chưa kiểm</span>
                            <?php elseif ($ttKiem === 'Đã kiểm'): ?>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-emerald-100 text-emerald-700">Đã kiểm</span>
                            <?php else: ?>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-red-100 text-red-700">Có lệch</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sticky Bottom Actions -->
    <div class="fixed bottom-0 left-0 right-0 lg:left-64 bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40">
        <div class="max-w-[1400px] mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            
            <div class="flex items-center gap-3 text-sm text-gray-600">
                <span class="iconify text-lg text-gray-400" data-icon="mdi:information-outline"></span>
                Tiến độ kiểm kê: <span class="text-blue-600 font-medium"><?= $daKiem ?>/<?= $tongSp ?></span> sản phẩm
            </div>

            <div class="flex items-center gap-3">
                <?php if ($tt <= 1): ?>
                    <button onclick="luuKetQua()" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">Lưu tạm</button>
                    <button onclick="guiDuyet()" class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium shadow-sm shadow-blue-600/20 flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:send"></span> Gửi duyệt kết quả
                    </button>
                <?php elseif ($tt == 2): ?>
                    <button onclick="duyetVaDieuChinh()" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20 flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:shield-check"></span> Duyệt & Điều chỉnh kho
                    </button>
                <?php endif; ?>
                
                <?php if ($tt <= 1): ?>
                    <button onclick="huyPhieu()" class="px-4 py-2.5 bg-white border border-red-200 text-red-600 rounded-lg hover:bg-red-50 transition-colors text-sm font-medium">Hủy phiếu</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
const APP_URL = '<?= APP_URL ?>';
const PHIEU_ID = '<?= $phieu['id'] ?>';

function calcChenhLech(input) {
    const row = input.closest('tr');
    const tonHt = parseInt(row.getAttribute('data-ton-ht')) || 0;
    const tonTT = parseInt(input.value);
    const display = row.querySelector('.chenh-lech-display');
    
    if (isNaN(tonTT) || input.value === '') {
        if (display) display.innerHTML = '<span class="text-gray-400">-</span>';
        return;
    }
    
    const diff = tonTT - tonHt;
    let html = '';
    if (diff < 0) {
        html = `<span class="inline-flex px-2 py-0.5 rounded bg-red-100 text-red-700 font-bold text-sm">Thiếu ${Math.abs(diff)}</span>`;
    } else if (diff > 0) {
        html = `<span class="inline-flex px-2 py-0.5 rounded bg-blue-100 text-blue-700 font-bold text-sm">Thừa ${diff}</span>`;
    } else {
        html = `<span class="inline-flex px-2 py-0.5 rounded bg-emerald-100 text-emerald-700 font-bold text-sm">Khớp</span>`;
    }
    if (display) display.innerHTML = html;
}

function collectData() {
    const rows = document.querySelectorAll('#kiemKeTableBody tr');
    const chiTiet = [];
    rows.forEach(row => {
        const id = row.getAttribute('data-id');
        if (!id) return;
        
        const tonInput = row.querySelector('.ton-thuc-te');
        const lyDoInput = row.querySelector('.ly-do');
        
        chiTiet.push({
            id_chi_tiet: id,
            id_bien_the: row.getAttribute('data-bien-the'),
            ton_he_thong: parseInt(row.getAttribute('data-ton-ht')) || 0,
            gia_von: parseFloat(row.getAttribute('data-gia-von')) || 0,
            ton_thuc_te: tonInput ? (tonInput.value !== '' ? parseInt(tonInput.value) : null) : null,
            ly_do: lyDoInput ? lyDoInput.value : ''
        });
    });
    return chiTiet;
}

function luuKetQua() {
    const data = collectData();
    
    fetch(`${APP_URL}/admin/kiem-ke/luu-ket-qua/${PHIEU_ID}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ chi_tiet: data })
    })
    .then(r => r.json())
    .then(result => {
        showToast(result.message, result.success ? 'success' : 'error');
        if (result.success) setTimeout(() => { window.location.reload(); }, 1000);
    });
}

function guiDuyet() {
    // Trước khi gửi duyệt, lưu kết quả trước
    const data = collectData();
    const chuaKiem = data.filter(d => d.ton_thuc_te === null).length;
    
    if (chuaKiem > 0) {
        if (!confirm(`Còn ${chuaKiem} sản phẩm chưa kiểm. Bạn vẫn muốn gửi duyệt?`)) return;
    }

    // Lưu kết quả trước
    fetch(`${APP_URL}/admin/kiem-ke/luu-ket-qua/${PHIEU_ID}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ chi_tiet: data })
    })
    .then(r => r.json())
    .then(result => {
        if (!result.success) {
            showToast('Lỗi lưu kết quả: ' + result.message, 'error');
            return;
        }
        // Sau đó gửi duyệt
        return fetch(`${APP_URL}/admin/kiem-ke/gui-duyet/${PHIEU_ID}`, { method: 'POST' });
    })
    .then(r => r ? r.json() : null)
    .then(result => {
        if (result) {
            showToast(result.message, result.success ? 'success' : 'error');
            if (result.success) setTimeout(() => { window.location.reload(); }, 1000);
        }
    });
}

function duyetVaDieuChinh() {
    if (!confirm('Bạn có chắc muốn duyệt phiếu kiểm kê này?\nHệ thống sẽ tự động điều chỉnh tồn kho theo kết quả kiểm đếm.')) return;

    fetch(`${APP_URL}/admin/kiem-ke/duyet/${PHIEU_ID}`, { method: 'POST' })
        .then(r => r.json())
        .then(result => {
            showToast(result.message, result.success ? 'success' : 'error');
            if (result.success) setTimeout(() => { window.location.reload(); }, 1000);
        });
}

function huyPhieu() {
    if (!confirm('Bạn có chắc chắn muốn hủy phiếu kiểm kê này?')) return;

    fetch(`${APP_URL}/admin/kiem-ke/huy/${PHIEU_ID}`, { method: 'POST' })
        .then(r => r.json())
        .then(result => {
            showToast(result.message, result.success ? 'success' : 'error');
            if (result.success) setTimeout(() => { window.location.href = `${APP_URL}/admin/kiem-ke`; }, 1000);
        });
}
</script>
