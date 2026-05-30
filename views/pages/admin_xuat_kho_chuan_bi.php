<?php
// views/pages/admin_xuat_kho_chuan_bi.php
$pageTitle = 'Chuẩn bị hàng xuất kho | Admin';
$current_page = 'xuat_kho';
?>

<!-- Modal Overlay -->
<div id="modalOverlay" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden z-50 transition-opacity"></div>

<div class="max-w-[1400px] mx-auto">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 mt-4 px-4 lg:px-0">
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/xuat-kho" class="p-2 -ml-2 text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 rounded-lg transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <div class="flex items-center gap-2">
                    <h1 class="text-xl font-black text-gray-900 tracking-tight">Chuẩn bị hàng: <?= $phieuXuat['ma_phieu'] ?></h1>
                    <span class="px-2 py-0.5 bg-orange-50 text-orange-600 rounded text-xs font-bold border border-orange-200">Đang chuẩn bị</span>
                </div>
                <div class="text-sm text-gray-500 flex items-center gap-3 mt-1">
                    <span class="flex items-center gap-1"><span class="iconify text-gray-400" data-icon="mdi:warehouse"></span> Kho tổng</span>
                    <?php if(!empty($phieuXuat['id_don_hang'])): ?>
                    <span>&bull;</span>
                    <span class="flex items-center gap-1 text-[#6B0D18] font-medium"><span class="iconify text-gray-400" data-icon="mdi:account-box"></span> Đơn #<?= $phieuXuat['id_don_hang'] ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" onclick="openModal('modalXacNhanXuat')" class="px-4 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-bold text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify text-lg" data-icon="mdi:check-all"></span> Xác nhận xuất kho
            </button>
        </div>
    </div>

    <div class="px-4 lg:px-0 w-full space-y-6">
        
        <!-- Tiến độ & Barcode Scanner -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Progress Card -->
            <div class="lg:col-span-1 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center">
                <div class="flex items-end justify-between mb-2">
                    <div class="text-gray-500 font-medium">Tiến độ chuẩn bị</div>
                    <div class="text-2xl font-black text-[#6B0D18]"><span id="progress-done">0</span><span class="text-base text-gray-400 font-medium">/<?= count($danhSachSP) ?></span></div>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-3 mb-2 overflow-hidden">
                    <div id="progress-bar" class="bg-gradient-to-r from-red-500 to-[#6B0D18] h-3 rounded-full transition-all duration-500" style="width: 0%"></div>
                </div>
                <div class="flex items-center justify-between text-xs font-medium">
                    <span class="text-emerald-600 flex items-center gap-1"><span class="iconify" data-icon="mdi:check-circle"></span> Đã lấy đủ: <span id="progress-full">0</span></span>
                </div>
            </div>
            
            <!-- Scanner Card -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center">
                <label class="block text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                    <span class="iconify text-emerald-600 text-xl" data-icon="mdi:barcode-scan"></span> Quét mã vạch / SKU sản phẩm
                </label>
                <div class="relative max-w-lg">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <span class="iconify text-gray-400 text-xl" data-icon="mdi:magnify"></span>
                    </div>
                    <input type="text" id="barcodeInput" autofocus class="block w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-300 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-mono text-lg" placeholder="Nhập SKU...">
                    <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
                        <button class="px-3 py-1.5 bg-emerald-600 text-white rounded-lg text-sm font-bold shadow hover:bg-emerald-700 transition-colors">Quét</button>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-3">Hệ thống tự động tăng "Thực xuất" khi nhập mã đúng.</p>
            </div>
        </div>

        <!-- Bảng danh sách cần lấy -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-900">Danh sách cần lấy (Picking List)</h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[1000px]">
                    <thead>
                        <tr class="bg-white border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500">
                            <th class="py-3 px-4 w-12 text-center">Trạng thái</th>
                            <th class="py-3 px-4 w-64">Sản phẩm</th>
                            <th class="py-3 px-4 w-40">Mã SKU / Biến thể</th>
                            <th class="py-3 px-4 min-w-[150px]">Vị trí lấy hàng</th>
                            <th class="py-3 px-4 text-center w-28">Cần xuất</th>
                            <th class="py-3 px-4 text-center w-32">Thực xuất</th>
                            <th class="py-3 px-4 w-32">Kết quả</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100" id="sanPhamBody">
                        
                        <?php foreach($danhSachSP as $sp): ?>
                        <tr class="sp-row hover:bg-gray-50/50 transition-colors" data-id="<?= $sp['id'] ?>" data-sku="<?= $sp['sku'] ?>" data-max="<?= $sp['so_luong'] ?>">
                            <td class="py-4 px-4 text-center icon-cell">
                                <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center mx-auto"></div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <?php if ($sp['image']): ?>
                                        <img src="<?= APP_URL ?>/<?= $sp['image'] ?>" class="w-10 h-10 rounded border border-gray-200 object-cover">
                                    <?php else: ?>
                                        <div class="w-10 h-10 rounded bg-white border border-gray-200 flex-shrink-0 shadow-sm"></div>
                                    <?php endif; ?>
                                    <div class="font-bold text-gray-900 text-sm"><?= $sp['product_name'] ?></div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="text-sm font-mono text-gray-700"><?= $sp['sku'] ?></div>
                                <div class="text-xs text-gray-500 mt-0.5"><?= $sp['variant_name'] ?></div>
                            </td>
                            <td class="py-4 px-4">
                                <?php if (!empty($sp['ten_vi_tri'])): ?>
                                    <div class="text-sm text-gray-900 font-medium"><?= htmlspecialchars($sp['ten_kho'] . ' > ' . $sp['ten_vi_tri']) ?></div>
                                <?php else: ?>
                                    <span class="text-xs text-gray-400 italic">Chưa xác định</span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="font-bold text-gray-900 text-lg"><?= $sp['so_luong'] ?></span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="updateQty(this, -1, <?= $sp['so_luong'] ?>)" class="w-8 h-8 rounded bg-white border border-gray-300 text-gray-600 flex items-center justify-center hover:bg-gray-50 font-bold">-</button>
                                    <input type="number" min="0" max="<?= $sp['so_luong'] ?>" value="<?= $sp['so_luong_nhan'] ?? 0 ?>" onchange="updateQtyManual(this, <?= $sp['so_luong'] ?>)" class="qty-input w-16 text-center font-bold text-gray-900 bg-white border border-gray-300 rounded focus:outline-none focus:border-[#6B0D18] text-lg px-1 py-0.5 mx-1">
                                    <button onclick="updateQty(this, 1, <?= $sp['so_luong'] ?>)" class="w-8 h-8 rounded bg-white border border-gray-300 text-gray-600 flex items-center justify-center hover:bg-gray-50 font-bold">+</button>
                                </div>
                            </td>
                            <td class="py-4 px-4 status-cell">
                                <span class="text-xs text-gray-400 italic">Chưa lấy hàng</span>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- Modal Xác nhận xuất kho -->
<div id="modalXacNhanXuat" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalXacNhanXuatContent">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-emerald-50/50">
            <h3 class="text-lg font-bold text-emerald-800 flex items-center gap-2">
                <span class="iconify text-emerald-600 text-2xl" data-icon="mdi:check-decagram"></span> Xác nhận xuất kho?
            </h3>
            <button onclick="closeModal('modalXacNhanXuat')" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-white rounded-full transition-colors focus:outline-none shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6">
            <div id="modalAlertBox" class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 flex gap-3 mb-4 hidden">
                <span class="iconify text-yellow-600 text-xl shrink-0" data-icon="mdi:alert"></span>
                <p class="text-sm text-yellow-800" id="modalAlertText"></p>
            </div>
            <p class="text-sm text-gray-600 mb-4">Hệ thống sẽ <strong class="text-rose-600">trừ số lượng thực xuất khỏi tồn kho</strong>.</p>
            
            <label class="flex items-start gap-2 mb-6 cursor-pointer">
                <input type="checkbox" id="chkConfirm" class="mt-1 w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                <span class="text-sm text-gray-700 font-medium">Tôi đã kiểm tra kỹ số lượng thực xuất và đồng ý trừ tồn kho.</span>
            </label>

            <div class="flex items-center gap-3">
                <button type="button" onclick="closeModal('modalXacNhanXuat')" class="flex-1 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                    Hủy bỏ
                </button>
                <button type="button" onclick="submitChuanBi()" class="flex-1 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium transition-colors shadow-sm">
                    Xác nhận xuất
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Init row styles based on initial values
        document.querySelectorAll('.sp-row').forEach(row => {
            const btn = row.querySelector('button');
            if (btn) {
                updateQty(btn, 0, parseInt(row.getAttribute('data-max')));
            }
        });

        // Barcode enter
        document.getElementById('barcodeInput').addEventListener('keypress', function(e) {
            if(e.key === 'Enter') {
                const sku = this.value.trim();
                const row = document.querySelector(`.sp-row[data-sku="${sku}"]`);
                if(row) {
                    const max = parseInt(row.getAttribute('data-max'));
                    const btn = row.querySelector('button:last-child');
                    updateQty(btn, 1, max);
                    row.classList.add('bg-yellow-50');
                    setTimeout(() => row.classList.remove('bg-yellow-50'), 1000);
                } else {
                    showToast('SKU không tồn tại trong phiếu!', 'error');
                }
                this.value = '';
            }
        });
    });

    function updateQtyManual(input, maxQty) {
        let newQty = parseInt(input.value) || 0;
        if(newQty < 0) newQty = 0;
        if(newQty > maxQty) newQty = maxQty;
        input.value = newQty;
        
        const btn = input.parentElement.querySelector('button');
        if (btn) {
            updateQty(btn, 0, maxQty);
        }
    }

    function updateQty(btn, change, maxQty) {
        const input = btn.parentElement.querySelector('.qty-input');
        let currentQty = parseInt(input.value) || 0;
        let newQty = currentQty + change;
        if(newQty < 0) newQty = 0;
        if(newQty > maxQty) newQty = maxQty;
        
        input.value = newQty;
        
        const tr = btn.closest('tr');
        const statusCell = tr.querySelector('.status-cell');
        const iconCell = tr.querySelector('.icon-cell');
        
        input.classList.remove('text-emerald-700', 'text-rose-600', 'text-gray-900');
        tr.classList.remove('bg-emerald-50/30', 'bg-rose-50/30');
        
        if (newQty === maxQty && maxQty > 0) {
            input.classList.add('text-emerald-700');
            tr.classList.add('bg-emerald-50/30');
            statusCell.innerHTML = '<span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold bg-emerald-100 text-emerald-700">Đã lấy đủ</span>';
            iconCell.innerHTML = '<div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto"><span class="iconify" data-icon="mdi:check"></span></div>';
            tr.setAttribute('data-status', 'full');
        } else if (newQty > 0 && newQty < maxQty) {
            input.classList.add('text-rose-600');
            tr.classList.add('bg-rose-50/30');
            statusCell.innerHTML = `<span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold bg-rose-100 text-rose-700">Thiếu ${maxQty - newQty}</span>`;
            iconCell.innerHTML = '<div class="w-6 h-6 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mx-auto"><span class="iconify" data-icon="mdi:alert"></span></div>';
            tr.setAttribute('data-status', 'partial');
        } else {
            input.classList.add('text-gray-900');
            statusCell.innerHTML = '<span class="text-xs text-gray-400 italic">Chưa lấy hàng</span>';
            iconCell.innerHTML = '<div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center mx-auto"></div>';
            tr.setAttribute('data-status', 'none');
        }

        updateProgress();
    }

    function updateProgress() {
        const rows = document.querySelectorAll('.sp-row');
        let done = 0;
        let full = 0;
        rows.forEach(r => {
            if (r.getAttribute('data-status') === 'full') {
                full++;
                done++;
            } else if (r.getAttribute('data-status') === 'partial') {
                done++;
            }
        });
        
        const total = rows.length;
        document.getElementById('progress-done').innerText = done;
        document.getElementById('progress-full').innerText = full;
        
        let percent = total > 0 ? (done / total) * 100 : 0;
        document.getElementById('progress-bar').style.width = percent + '%';
    }

    function openModal(id) {
        if (id === 'modalXacNhanXuat') {
            const rows = document.querySelectorAll('.sp-row');
            let missing = 0;

            rows.forEach(row => {
                const max = parseInt(row.getAttribute('data-max')) || 0;
                const qty = parseInt(row.querySelector('.qty-input').value) || 0;
                if (qty < max) missing++;
            });

            const alertBox = document.getElementById('modalAlertBox');
            const alertText = document.getElementById('modalAlertText');
            if (missing > 0) {
                alertBox.classList.remove('hidden');
                alertText.innerHTML = `Còn <span class="font-bold">${missing}</span> sản phẩm chưa lấy đủ số lượng. Các sản phẩm lấy thiếu sẽ được ghi nhận là lỗi/thất thoát. Bạn có chắc chắn?`;
            } else {
                alertBox.classList.add('hidden');
            }
        }

        const modal = document.getElementById(id);
        const overlay = document.getElementById('modalOverlay');
        if (modal && overlay) {
            overlay.classList.remove('hidden');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                const content = document.getElementById(id + 'Content');
                if(content) {
                    content.classList.remove('scale-95', 'opacity-0');
                    content.classList.add('scale-100', 'opacity-100');
                }
            }, 10);
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        const overlay = document.getElementById('modalOverlay');
        if (modal && overlay) {
            const content = document.getElementById(id + 'Content');
            if(content) {
                content.classList.remove('scale-100', 'opacity-100');
                content.classList.add('scale-95', 'opacity-0');
            }
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                overlay.classList.add('hidden');
            }, 300);
        }
    }

    async function submitChuanBi() {
        if (!document.getElementById('chkConfirm').checked) {
            showToast('Vui lòng xác nhận đồng ý trừ tồn kho!', 'error');
            return;
        }

        const chiTiet = [];
        document.querySelectorAll('.sp-row').forEach(row => {
            const max = parseInt(row.getAttribute('data-max'));
            const qty = parseInt(row.querySelector('.qty-input').value) || 0;
            chiTiet.push({
                id_chi_tiet: row.getAttribute('data-id'),
                so_luong_nhan: qty, // Thực xuất
                so_luong_loi: max - qty, // Nếu thiếu coi như lỗi/thất thoát
                ly_do: max > qty ? 'Thiếu hàng' : ''
            });
        });

        const payload = { chi_tiet: chiTiet };

        try {
            const res = await fetch('<?= APP_URL ?>/admin/xuat-kho/chuan-bi/luu/<?= $id ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => window.location.href = '<?= APP_URL ?>/admin/xuat-kho', 1000);
            } else {
                showToast('Lỗi: ' + data.message, 'error');
            }
        } catch (err) {
            console.error(err);
            showToast('Có lỗi xảy ra.', 'error');
        }
    }
</script>
