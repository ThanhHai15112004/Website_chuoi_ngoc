<?php
$userThongBao = $thong_bao ?? [];

// Map icon theo loại thông báo
$iconMap = [
    'don_hang' => ['icon' => 'ph:package', 'bg' => 'bg-blue-50', 'color' => 'text-blue-600'],
    'khuyen_mai' => ['icon' => 'ph:tag', 'bg' => 'bg-green-50', 'color' => 'text-green-600'],
    'he_thong' => ['icon' => 'ph:gear', 'bg' => 'bg-gray-100', 'color' => 'text-gray-600'],
    'thanh_vien' => ['icon' => 'ph:crown-simple', 'bg' => 'bg-yellow-50', 'color' => 'text-yellow-600'],
    'tai_khoan' => ['icon' => 'ph:user-circle', 'bg' => 'bg-purple-50', 'color' => 'text-purple-600'],
    'danh_gia' => ['icon' => 'ph:star', 'bg' => 'bg-orange-50', 'color' => 'text-orange-600'],
    'kho' => ['icon' => 'ph:warehouse', 'bg' => 'bg-teal-50', 'color' => 'text-teal-600'],
];

$chuaDoc = array_filter($userThongBao, fn($t) => !$t['da_doc']);
$soChuaDoc = count($chuaDoc);
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Thông báo</h2>
            <p class="text-gray-500 mt-1">Cập nhật mới nhất về đơn hàng và ưu đãi 
                <?php if ($soChuaDoc > 0): ?>
                <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold bg-red-100 text-red-600 rounded-full ml-1"><?= $soChuaDoc ?> mới</span>
                <?php endif; ?>
            </p>
        </div>
        <?php if (!empty($userThongBao)): ?>
        <div class="flex items-center gap-2">
            <button onclick="docTatCaThongBao()" class="text-sm text-[#8b0000] font-medium hover:opacity-80 transition-opacity flex items-center gap-1" title="Đánh dấu tất cả đã đọc">
                <iconify-icon icon="ph:checks"></iconify-icon> <span class="hidden sm:inline">Đọc tất cả</span>
            </button>
            <button onclick="xoaTatCaDaDocThongBao()" class="text-sm text-gray-500 font-medium hover:text-red-500 hover:opacity-80 transition-all flex items-center gap-1" title="Xóa tất cả đã đọc">
                <iconify-icon icon="ph:trash-simple"></iconify-icon> <span class="hidden sm:inline">Xóa đã đọc</span>
            </button>
        </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($userThongBao)): ?>
    <div class="space-y-3" id="thong-bao-list">
        <?php foreach ($userThongBao as $tb): ?>
        <?php 
        $loai = $tb['loai_thong_bao'] ?? 'he_thong';
        $ic = $iconMap[$loai] ?? $iconMap['he_thong'];
        $chuaDocItem = !$tb['da_doc'];
        $thoiGian = strtotime($tb['ngay_tao']);
        $now = time();
        $diff = $now - $thoiGian;
        
        // Format thời gian relative
        if ($diff < 60) {
            $timeStr = 'Vừa xong';
        } elseif ($diff < 3600) {
            $timeStr = floor($diff / 60) . ' phút trước';
        } elseif ($diff < 86400) {
            $timeStr = floor($diff / 3600) . ' giờ trước';
        } elseif ($diff < 604800) {
            $timeStr = floor($diff / 86400) . ' ngày trước';
        } else {
            $timeStr = date('d/m/Y H:i', $thoiGian);
        }
        ?>
        <div class="flex items-start gap-4 p-4 rounded-xl border transition-all cursor-pointer group
            <?= $chuaDocItem ? 'border-red-100 bg-red-50/30 hover:bg-red-50/60' : 'border-gray-100 bg-white hover:bg-gray-50' ?>" 
            id="tb-<?= htmlspecialchars($tb['id']) ?>"
            onclick="moChiTietThongBao('<?= htmlspecialchars($tb['id']) ?>', <?= htmlspecialchars(json_encode($tb['tieu_de'])) ?>, <?= htmlspecialchars(json_encode($tb['noi_dung'])) ?>, '<?= htmlspecialchars($tb['link'] ?? '') ?>', '<?= $timeStr ?>', '<?= $loai ?>', <?= $chuaDocItem ? 'true' : 'false' ?>)"
        >
            <div class="w-10 h-10 rounded-full <?= $ic['bg'] ?> <?= $ic['color'] ?> flex items-center justify-center shrink-0">
                <iconify-icon icon="<?= $ic['icon'] ?>" class="text-xl"></iconify-icon>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-start justify-between gap-2">
                    <h3 class="text-sm line-clamp-1 <?= $chuaDocItem ? 'font-bold text-gray-900' : 'font-normal text-gray-700' ?>"><?= htmlspecialchars($tb['tieu_de']) ?></h3>
                    <div class="flex items-center gap-2 shrink-0">
                        <?php if ($chuaDocItem): ?>
                        <span class="w-2.5 h-2.5 bg-[#8b0000] rounded-full shrink-0"></span>
                        <?php endif; ?>
                        <!-- Delete button -->
                        <button onclick="event.stopPropagation(); xoaThongBao('<?= htmlspecialchars($tb['id']) ?>')" class="opacity-0 group-hover:opacity-100 transition-opacity w-7 h-7 flex items-center justify-center rounded-full hover:bg-red-100 text-gray-400 hover:text-red-500" title="Xóa">
                            <iconify-icon icon="ph:trash-simple" class="text-sm"></iconify-icon>
                        </button>
                    </div>
                </div>
                <p class="text-sm text-gray-600 mt-1 line-clamp-2"><?= htmlspecialchars($tb['noi_dung']) ?></p>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xs text-gray-400"><?= $timeStr ?></span>
                    <?php if (!empty($tb['link'])): ?>
                    <span class="text-xs text-[#8b0000] font-medium opacity-0 group-hover:opacity-100 transition-opacity">Xem chi tiết →</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center py-16" id="thong-bao-empty">
        <iconify-icon icon="ph:bell-slash" class="text-5xl text-gray-300 mb-3"></iconify-icon>
        <h3 class="text-lg font-bold text-gray-900 mb-2">Chưa có thông báo nào</h3>
        <p class="text-gray-500">Bạn sẽ nhận thông báo khi có cập nhật về đơn hàng hoặc ưu đãi mới.</p>
    </div>
    <?php endif; ?>
</div>

<!-- Drawer Chi tiết Thông báo -->
<div id="thong-bao-modal" class="fixed inset-0 z-[100] hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm opacity-0 transition-opacity duration-300" id="tb-backdrop" onclick="dongThongBaoModal()"></div>
    
    <!-- Drawer Panel -->
    <div class="absolute top-0 right-0 h-full w-full max-w-md bg-white shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col" id="thong-bao-modal-content">
        
        <!-- Drawer Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <button onclick="dongThongBaoModal()" class="w-8 h-8 flex items-center justify-center rounded-full text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition-colors">
                    <iconify-icon icon="ph:arrow-right" class="text-xl"></iconify-icon>
                </button>
                <h2 class="font-bold text-gray-900 text-lg">Chi tiết thông báo</h2>
            </div>
            <button onclick="xoaThongBaoHienTai()" class="w-8 h-8 flex items-center justify-center rounded-full text-gray-400 hover:bg-red-50 hover:text-red-500 transition-colors" title="Xóa thông báo">
                <iconify-icon icon="ph:trash" class="text-xl"></iconify-icon>
            </button>
        </div>

        <!-- Drawer Body -->
        <div class="p-6 flex-1 overflow-y-auto bg-gray-50">
            <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm">
                <!-- Header of Notification -->
                <div class="flex items-start gap-4 mb-5">
                    <div id="tb-modal-icon" class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <iconify-icon icon="ph:bell" class="text-2xl"></iconify-icon>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Hệ thống</h3>
                        <p id="tb-modal-time" class="text-xs text-gray-500 mt-0.5"></p>
                    </div>
                    <div class="ml-auto">
                        <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-[10px] font-bold rounded uppercase tracking-wider">Inbox</span>
                    </div>
                </div>

                <!-- Content -->
                <h4 id="tb-modal-title" class="font-bold text-gray-900 text-lg mb-3"></h4>
                <p id="tb-modal-content" class="text-sm text-gray-600 leading-relaxed"></p>

                <!-- Button -->
                <div id="tb-modal-footer" class="mt-6 hidden">
                    <a id="tb-modal-link" href="#" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-[#8b0000] hover:bg-[#700000] text-white rounded-lg font-medium shadow-sm transition-colors text-sm">
                        Xem chi tiết liên quan <iconify-icon icon="ph:arrow-right"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let currentTbId = null;

function xoaThongBaoHienTai() {
    if (currentTbId) {
        xoaThongBao(currentTbId);
        dongThongBaoModal();
    }
}
const TB_BASE = '<?= APP_URL ?>';
const tbIconMap = {
    'don_hang': { icon: 'ph:package', bg: 'bg-blue-50', color: 'text-blue-600' },
    'khuyen_mai': { icon: 'ph:tag', bg: 'bg-green-50', color: 'text-green-600' },
    'he_thong': { icon: 'ph:gear', bg: 'bg-gray-100', color: 'text-gray-600' },
    'thanh_vien': { icon: 'ph:crown-simple', bg: 'bg-yellow-50', color: 'text-yellow-600' },
    'tai_khoan': { icon: 'ph:user-circle', bg: 'bg-purple-50', color: 'text-purple-600' },
    'danh_gia': { icon: 'ph:star', bg: 'bg-orange-50', color: 'text-orange-600' },
};

function docTatCaThongBao() {
    fetch(TB_BASE + '/tai-khoan/doc-thong-bao', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id=all'
    }).then(r => r.json()).then(data => {
        if (data.success) {
            document.querySelectorAll('[id^="tb-"]').forEach(el => {
                if (el.id === 'tb-modal-icon' || el.id === 'tb-modal-title' || el.id === 'tb-modal-time' || el.id === 'tb-modal-content' || el.id === 'tb-modal-footer' || el.id === 'tb-modal-link') return;
                el.classList.remove('border-red-100', 'bg-red-50/30', 'hover:bg-red-50/60');
                el.classList.add('border-gray-100', 'bg-white', 'hover:bg-gray-50');
                const dot = el.querySelector('.bg-\\[\\#8b0000\\].rounded-full.w-2\\.5');
                if (dot) dot.remove();
                const h3 = el.querySelector('h3');
                if (h3) { h3.classList.remove('font-bold', 'text-gray-900'); h3.classList.add('font-normal', 'text-gray-700'); }
            });
            Toast.fire({ icon: 'success', title: 'Đã đọc tất cả thông báo' });
        }
    });
}

function xoaThongBao(id) {
    Swal.fire({
        title: 'Xác nhận xóa',
        text: 'Bạn có chắc muốn xóa thông báo này?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8b0000',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(TB_BASE + '/tai-khoan/xoa-thong-bao', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'id=' + encodeURIComponent(id)
            }).then(r => r.json()).then(data => {
                if (data.success) {
                    const el = document.getElementById('tb-' + id);
                    if (el) {
                        el.style.transition = 'all 0.3s';
                        el.style.opacity = '0';
                        el.style.transform = 'translateX(20px)';
                        setTimeout(() => {
                            el.remove();
                            const list = document.getElementById('thong-bao-list');
                            if (list && list.children.length === 0) {
                                location.reload();
                            }
                        }, 300);
                    }
                    Toast.fire({ icon: 'success', title: 'Đã xóa thông báo' });
                }
            });
        }
    });
}

function xoaTatCaDaDocThongBao() {
    Swal.fire({
        title: 'Xác nhận xóa',
        text: 'Bạn có chắc muốn xóa tất cả thông báo đã đọc?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8b0000',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Xóa tất cả',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(TB_BASE + '/tai-khoan/xoa-thong-bao', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'id=all_read'
            }).then(r => r.json()).then(data => {
                if (data.success) {
                    Toast.fire({ icon: 'success', title: 'Đã xóa thông báo đã đọc' });
                    setTimeout(() => location.reload(), 500);
                }
            });
        }
    });
}

function moChiTietThongBao(id, title, content, link, time, loai, chuaDoc) {
    // Mark as read
    if (chuaDoc) {
        fetch(TB_BASE + '/tai-khoan/doc-thong-bao', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'id=' + encodeURIComponent(id)
        }).then(r => r.json()).then(data => {
            if (data.success) {
                const el = document.getElementById('tb-' + id);
                if (el) {
                    el.classList.remove('border-red-100', 'bg-red-50/30', 'hover:bg-red-50/60');
                    el.classList.add('border-gray-100', 'bg-white', 'hover:bg-gray-50');
                    const dot = el.querySelector('.bg-\\[\\#8b0000\\].rounded-full.w-2\\.5');
                    if (dot) dot.remove();
                    const h3 = el.querySelector('h3');
                    if (h3) { h3.classList.remove('font-bold', 'text-gray-900'); h3.classList.add('font-normal', 'text-gray-700'); }
                }
            }
        });
    }
    
    currentTbId = id;
    
    // Show modal
    const ic = tbIconMap[loai] || tbIconMap['he_thong'];
    document.getElementById('tb-modal-title').textContent = title;
    document.getElementById('tb-modal-content').textContent = content;
    document.getElementById('tb-modal-time').textContent = time;
    
    const iconDiv = document.getElementById('tb-modal-icon');
    iconDiv.className = 'w-12 h-12 rounded-full flex items-center justify-center shrink-0 ' + ic.bg + ' ' + ic.color;
    iconDiv.innerHTML = '<iconify-icon icon="' + ic.icon + '" class="text-2xl"></iconify-icon>';
    
    const footer = document.getElementById('tb-modal-footer');
    const linkEl = document.getElementById('tb-modal-link');
    if (link) {
        footer.classList.remove('hidden');
        linkEl.href = link;
    } else {
        footer.classList.add('hidden');
    }
    
    const modal = document.getElementById('thong-bao-modal');
    const backdrop = document.getElementById('tb-backdrop');
    const modalContent = document.getElementById('thong-bao-modal-content');
    
    modal.classList.remove('hidden');
    // Force reflow
    void modal.offsetWidth;
    backdrop.classList.remove('opacity-0');
    backdrop.classList.add('opacity-100');
    modalContent.classList.remove('translate-x-full');
    modalContent.classList.add('translate-x-0');
    
    document.body.style.overflow = 'hidden';
}

function dongThongBaoModal() {
    const modal = document.getElementById('thong-bao-modal');
    const backdrop = document.getElementById('tb-backdrop');
    const modalContent = document.getElementById('thong-bao-modal-content');
    
    backdrop.classList.remove('opacity-100');
    backdrop.classList.add('opacity-0');
    modalContent.classList.remove('translate-x-0');
    modalContent.classList.add('translate-x-full');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }, 300);
}
</script>
