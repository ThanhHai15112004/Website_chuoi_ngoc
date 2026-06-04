<?php
$danhSachDiaChi = $danh_sach_dia_chi ?? [];
?>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-10">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 pb-6 border-b border-gray-100">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-1">Sổ địa chỉ</h2>
            <p class="text-gray-500 text-sm">Quản lý thông tin giao hàng để thanh toán nhanh chóng hơn.</p>
        </div>
        <button onclick="moDiaChiModal()" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] transition-colors text-sm shadow-sm">
            <iconify-icon icon="ph:plus-bold"></iconify-icon> Thêm địa chỉ mới
        </button>
    </div>

    <div id="danh-sach-dia-chi" class="space-y-4">
        <?php if (!empty($danhSachDiaChi)): ?>
            <?php foreach ($danhSachDiaChi as $dc): ?>
            <div class="group border-2 <?= $dc['la_mac_dinh'] ? 'border-red-100 bg-gradient-to-br from-red-50/50 to-white' : 'border-gray-100 bg-white hover:border-gray-200' ?> rounded-2xl p-5 relative transition-all hover:shadow-md overflow-hidden" data-id="<?= htmlspecialchars($dc['id']) ?>">
                <?php if ($dc['la_mac_dinh']): ?>
                <div class="absolute top-0 right-0 w-32 h-32 bg-red-100/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
                <?php endif; ?>
                
                <div class="relative z-10">
                    <div class="flex flex-wrap items-center gap-2 mb-3">
                        <h3 class="text-lg font-bold text-gray-900"><?= htmlspecialchars($dc['ho_ten']) ?></h3>
                        <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                        <span class="text-gray-600 font-medium"><?= htmlspecialchars($dc['so_dien_thoai']) ?></span>
                        <?php if ($dc['la_mac_dinh']): ?>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#8b0000] text-white shadow-sm">
                            <iconify-icon icon="ph:check-circle-fill"></iconify-icon>
                            Mặc định
                        </span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="flex items-start gap-3 text-gray-600 mb-4">
                        <iconify-icon icon="ph:map-pin-line-duotone" class="text-xl text-[#8b0000] mt-0.5 flex-shrink-0"></iconify-icon>
                        <p class="leading-relaxed">
                            <?= htmlspecialchars($dc['dia_chi_cu_the']) ?>, 
                            <?= htmlspecialchars($dc['phuong_xa']) ?>, 
                            <?= htmlspecialchars($dc['quan_huyen']) ?>, 
                            <?= htmlspecialchars($dc['tinh_thanh']) ?>
                        </p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-wrap items-center gap-2">
                        <button onclick="suaDiaChi('<?= htmlspecialchars($dc['id']) ?>')" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-[#8b0000] border border-[#8b0000]/30 rounded-lg hover:bg-red-50 transition-colors">
                            <iconify-icon icon="ph:pencil-simple"></iconify-icon> Sửa
                        </button>
                        <?php if (!$dc['la_mac_dinh']): ?>
                        <button onclick="datMacDinh('<?= htmlspecialchars($dc['id']) ?>')" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-blue-600 border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors">
                            <iconify-icon icon="ph:star"></iconify-icon> Đặt mặc định
                        </button>
                        <button onclick="xoaDiaChi('<?= htmlspecialchars($dc['id']) ?>')" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-gray-500 border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-red-500 hover:border-red-200 transition-colors">
                            <iconify-icon icon="ph:trash-simple"></iconify-icon> Xóa
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-16" id="dia-chi-empty">
            <iconify-icon icon="ph:map-pin" class="text-5xl text-gray-300 mb-3"></iconify-icon>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Chưa có địa chỉ</h3>
            <p class="text-gray-500 mb-6">Thêm địa chỉ giao hàng để thanh toán nhanh hơn.</p>
            <button onclick="moDiaChiModal()" class="px-6 py-2.5 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] transition-colors text-sm">
                Thêm địa chỉ đầu tiên
            </button>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Thêm/Sửa Địa chỉ -->
<div id="dia-chi-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="dongDiaChiModal()"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white px-6 py-4 border-b border-gray-100 rounded-t-2xl flex items-center justify-between z-10">
            <h3 id="dia-chi-modal-title" class="text-lg font-bold text-gray-900">Thêm địa chỉ mới</h3>
            <button onclick="dongDiaChiModal()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
                <iconify-icon icon="ph:x" class="text-xl text-gray-400"></iconify-icon>
            </button>
        </div>
        <form id="dia-chi-form" class="p-6 space-y-4">
            <input type="hidden" id="dc-id" value="">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Họ tên <span class="text-red-500">*</span></label>
                    <input type="text" id="dc-ho-ten" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#8b0000]/20 focus:border-[#8b0000] outline-none transition-all text-sm" placeholder="Nguyễn Văn A">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại <span class="text-red-500">*</span></label>
                    <input type="text" id="dc-sdt" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#8b0000]/20 focus:border-[#8b0000] outline-none transition-all text-sm" placeholder="0xxx xxx xxx">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tỉnh/Thành phố <span class="text-red-500">*</span></label>
                <input type="text" id="dc-tinh" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#8b0000]/20 focus:border-[#8b0000] outline-none transition-all text-sm" placeholder="VD: TPHCM">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Quận/Huyện <span class="text-red-500">*</span></label>
                    <input type="text" id="dc-quan" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#8b0000]/20 focus:border-[#8b0000] outline-none transition-all text-sm" placeholder="VD: Quận Tân Phú">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phường/Xã <span class="text-red-500">*</span></label>
                    <input type="text" id="dc-phuong" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#8b0000]/20 focus:border-[#8b0000] outline-none transition-all text-sm" placeholder="VD: Phường Phú Trung">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ cụ thể <span class="text-red-500">*</span></label>
                <input type="text" id="dc-cu-the" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#8b0000]/20 focus:border-[#8b0000] outline-none transition-all text-sm" placeholder="Số nhà, tên đường...">
            </div>

            <div class="flex items-center gap-3 pt-2">
                <input type="checkbox" id="dc-mac-dinh" class="w-4 h-4 text-[#8b0000] border-gray-300 rounded focus:ring-[#8b0000]">
                <label for="dc-mac-dinh" class="text-sm text-gray-700 font-medium cursor-pointer">Đặt làm địa chỉ mặc định</label>
            </div>

            <div class="flex gap-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="dongDiaChiModal()" class="flex-1 px-4 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition-colors text-sm">Hủy</button>
                <button type="submit" id="dc-submit-btn" class="flex-1 px-4 py-2.5 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] transition-colors text-sm">Thêm địa chỉ</button>
            </div>
        </form>
    </div>
</div>

<script>
const DC_BASE = '<?= APP_URL ?>';
let diaChiDangSua = null;

function moDiaChiModal(editId = null) {
    const modal = document.getElementById('dia-chi-modal');
    const title = document.getElementById('dia-chi-modal-title');
    const submitBtn = document.getElementById('dc-submit-btn');
    
    // Reset form
    document.getElementById('dia-chi-form').reset();
    document.getElementById('dc-id').value = '';
    diaChiDangSua = null;

    if (editId) {
        title.textContent = 'Sửa địa chỉ';
        submitBtn.textContent = 'Cập nhật';
    } else {
        title.textContent = 'Thêm địa chỉ mới';
        submitBtn.textContent = 'Thêm địa chỉ';
    }
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function dongDiaChiModal() {
    document.getElementById('dia-chi-modal').classList.add('hidden');
    document.body.style.overflow = '';
}

function suaDiaChi(id) {
    // Fetch address data
    fetch(DC_BASE + '/api/dia-chi/danh-sach')
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                const dc = data.data.find(d => d.id === id);
                if (dc) {
                    moDiaChiModal(id);
                    document.getElementById('dc-id').value = dc.id;
                    document.getElementById('dc-ho-ten').value = dc.ho_ten || '';
                    document.getElementById('dc-sdt').value = dc.so_dien_thoai || '';
                    document.getElementById('dc-tinh').value = dc.tinh_thanh || '';
                    document.getElementById('dc-quan').value = dc.quan_huyen || '';
                    document.getElementById('dc-phuong').value = dc.phuong_xa || '';
                    document.getElementById('dc-cu-the').value = dc.dia_chi_cu_the || '';
                    document.getElementById('dc-mac-dinh').checked = dc.la_mac_dinh == 1;
                    diaChiDangSua = dc;
                }
            }
        });
}

function datMacDinh(id) {
    Swal.fire({
        title: 'Xác nhận',
        text: 'Đặt địa chỉ này làm mặc định?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#8b0000',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(DC_BASE + '/api/dia-chi/mac-dinh', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id })
            }).then(r => r.json()).then(data => {
                if (data.success) {
                    Toast.fire({ icon: 'success', title: 'Đã đặt mặc định' });
                    setTimeout(() => location.reload(), 500);
                } else {
                    Toast.fire({ icon: 'error', title: data.message || 'Thao tác thất bại' });
                }
            });
        }
    });
}

function xoaDiaChi(id) {
    Swal.fire({
        title: 'Xác nhận xóa',
        text: 'Bạn có chắc muốn xóa địa chỉ này?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8b0000',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(DC_BASE + '/api/dia-chi/xoa', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id })
            }).then(r => r.json()).then(data => {
                if (data.success) {
                    Toast.fire({ icon: 'success', title: 'Đã xóa địa chỉ' });
                    const card = document.querySelector(`[data-id="${id}"]`);
                    if (card) {
                        card.style.transition = 'all 0.3s';
                        card.style.opacity = '0';
                        card.style.transform = 'translateX(20px)';
                        setTimeout(() => {
                            card.remove();
                            // Check if empty
                            const list = document.getElementById('danh-sach-dia-chi');
                            if (list.querySelectorAll('[data-id]').length === 0) {
                                location.reload();
                            }
                        }, 300);
                    }
                } else {
                    Toast.fire({ icon: 'error', title: data.message || 'Xóa thất bại' });
                }
            });
        }
    });
}

// Form submit
document.getElementById('dia-chi-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const id = document.getElementById('dc-id').value;
    const payload = {
        ho_ten: document.getElementById('dc-ho-ten').value.trim(),
        so_dien_thoai: document.getElementById('dc-sdt').value.trim(),
        tinh_thanh: document.getElementById('dc-tinh').value.trim(),
        quan_huyen: document.getElementById('dc-quan').value.trim(),
        phuong_xa: document.getElementById('dc-phuong').value.trim(),
        dia_chi_cu_the: document.getElementById('dc-cu-the').value.trim(),
        la_mac_dinh: document.getElementById('dc-mac-dinh').checked ? 1 : 0,
    };

    if (!payload.ho_ten || !payload.so_dien_thoai || !payload.tinh_thanh || !payload.quan_huyen || !payload.phuong_xa || !payload.dia_chi_cu_the) {
        Toast.fire({ icon: 'warning', title: 'Vui lòng điền đầy đủ thông tin' });
        return;
    }

    const url = id ? DC_BASE + '/api/dia-chi/sua' : DC_BASE + '/api/dia-chi/them';
    if (id) payload.id = id;

    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    }).then(r => r.json()).then(data => {
        if (data.success) {
            Toast.fire({ icon: 'success', title: id ? 'Cập nhật thành công' : 'Thêm địa chỉ thành công' });
            dongDiaChiModal();
            setTimeout(() => location.reload(), 500);
        } else {
            Toast.fire({ icon: 'error', title: data.message || 'Thao tác thất bại' });
        }
    });
});
</script>
