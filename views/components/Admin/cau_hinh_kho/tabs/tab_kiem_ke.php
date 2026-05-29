<?php
// views/components/Admin/cau_hinh_kho/tabs/tab_kiem_ke.php
?>
<div class="p-6">
    <div class="flex justify-between items-center pb-4 border-b border-gray-100 mb-6">
        <div>
            <h3 class="text-lg font-bold text-gray-900">Lịch kiểm kê định kỳ tự động</h3>
            <p class="text-sm text-gray-500 mt-1">Hệ thống sẽ tự động tạo phiếu kiểm kê theo chu kỳ và nhắc nhở nhân viên thực hiện.</p>
        </div>
        <button onclick="openModal('modalThemLichKiemKe')" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
            <span class="iconify" data-icon="mdi:plus-circle-outline"></span> Thêm lịch mới
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <?php if(empty($danhSachLich)): ?>
            <div class="col-span-full py-8 text-center text-gray-500">Chưa có lịch kiểm kê nào.</div>
        <?php else: foreach($danhSachLich as $lich): ?>
        <div class="border <?= $lich['trang_thai'] == 1 ? 'border-emerald-200 bg-emerald-50/20 shadow-[0_2px_10px_-3px_rgba(16,185,129,0.1)]' : 'border-gray-200 bg-white shadow-sm opacity-70' ?> rounded-xl overflow-hidden relative group">
            <div class="p-4 border-b border-gray-100 flex justify-between items-start <?= $lich['trang_thai'] == 1 ? 'bg-white' : 'bg-gray-50' ?>">
                <div class="pr-12">
                    <h4 class="font-bold text-gray-900"><?= htmlspecialchars($lich['ten_lich']) ?></h4>
                    <p class="text-[11px] text-gray-500 mt-0.5">Tạo tự động <?= htmlspecialchars($lich['thoi_gian_tao']) ?></p>
                </div>
                <div class="absolute top-4 right-4 relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" onchange="toggleLich(this, '<?= $lich['id'] ?>')" <?= $lich['trang_thai'] == 1 ? 'checked' : '' ?> class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-emerald-500 checked:right-0 transition-all duration-200" style="right: <?= $lich['trang_thai'] == 1 ? '0' : '1.25rem' ?>;">
                    <label class="toggle-label block overflow-hidden h-5 rounded-full <?= $lich['trang_thai'] == 1 ? 'bg-emerald-500' : 'bg-gray-300' ?> cursor-pointer"></label>
                </div>
            </div>
            <div class="p-4 space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Kho áp dụng:</span>
                    <span class="font-medium text-gray-900"><?= htmlspecialchars($lich['ten_kho']) ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Phạm vi:</span>
                    <span class="font-medium text-gray-900"><?= htmlspecialchars($lich['pham_vi']) ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Chu kỳ:</span>
                    <span class="font-medium text-gray-900"><?= htmlspecialchars($lich['chu_ky']) ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Nhắc trước:</span>
                    <span class="font-medium text-gray-900"><?= $lich['nhac_truoc_ngay'] ?> ngày</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Người thực hiện:</span>
                    <span class="font-medium text-gray-900"><?= htmlspecialchars($lich['nguoi_thuc_hien'] ?? 'Tất cả (chưa gán)') ?></span>
                </div>
            </div>
            <div class="p-3 bg-gray-50 flex justify-end gap-2 border-t border-gray-100">
                <button onclick="xoaLich('<?= $lich['id'] ?>')" class="px-3 py-1.5 text-xs font-medium text-rose-600 hover:text-white hover:bg-rose-600 bg-white border border-rose-200 rounded transition-colors">Xóa</button>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>
</div>

<!-- Modal Thêm Lịch Kiểm Kê -->
<div id="modalThemLichKiemKe" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <form id="formThemLich" onsubmit="event.preventDefault(); saveLich();" class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalThemLichKiemKeContent">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:calendar-plus"></span> Thêm lịch kiểm kê tự động
            </h3>
            <button type="button" onclick="closeModal('modalThemLichKiemKe')" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-gray-200 rounded-full transition-colors focus:outline-none">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tên lịch <span class="text-red-500">*</span></label>
                <input type="text" name="ten_lich" required class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="VD: Kiểm kê cuối tháng Kho Online">
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kho áp dụng <span class="text-red-500">*</span></label>
                    <select name="id_kho" required class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                        <option value="">-- Chọn kho --</option>
                        <?php foreach($danhSachKhoSelect as $k): ?>
                            <option value="<?= $k['id'] ?>"><?= htmlspecialchars($k['ten_kho']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phạm vi kiểm kê <span class="text-red-500">*</span></label>
                    <select name="pham_vi" required class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                        <option value="Toàn kho">Toàn kho</option>
                        <option value="Theo danh mục">Theo danh mục</option>
                        <option value="Khu vực/Kệ">Theo khu vực/kệ</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Chu kỳ <span class="text-red-500">*</span></label>
                    <select name="chu_ky" required class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                        <option value="Hàng tháng">Hàng tháng</option>
                        <option value="Hàng tuần">Hàng tuần</option>
                        <option value="Hàng ngày">Hàng ngày</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Thời gian tạo <span class="text-red-500">*</span></label>
                    <input type="text" name="thoi_gian_tao" required class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="VD: Ngày 28, Thứ 2...">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nhắc trước (ngày) <span class="text-red-500">*</span></label>
                    <input type="number" name="nhac_truoc_ngay" value="1" min="0" required class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Người thực hiện</label>
                    <select name="id_nguoi_thuc_hien" class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                        <option value="">-- Ai cũng được --</option>
                        <?php foreach($danhSachNhanVien as $nv): ?>
                            <option value="<?= $nv['id'] ?>"><?= htmlspecialchars($nv['ho_ten']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="flex items-center gap-2 mt-2">
                <input type="checkbox" name="trang_thai" value="1" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                <label class="text-sm text-gray-700">Kích hoạt lịch ngay sau khi lưu</label>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
            <button type="button" onclick="closeModal('modalThemLichKiemKe')" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors text-sm">
                Hủy bỏ
            </button>
            <button type="submit" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium transition-colors shadow-sm flex items-center gap-2 text-sm">
                <span class="iconify" data-icon="mdi:check"></span> Thêm lịch
            </button>
        </div>
    </form>
</div>

<script>
    async function saveLich() {
        const form = document.getElementById('formThemLich');
        const formData = new FormData(form);

        try {
            const res = await fetch('<?= APP_URL ?>/admin/cau-hinh-kho/lich-kiem-ke/luu', {
                method: 'POST',
                body: formData
            });
            const data = await res.json();
            if (data.success) {
                showToast(data.message, 'success');
                closeModal('modalThemLichKiemKe');
                setTimeout(() => window.location.reload(), 800);
            } else {
                showToast(data.message, 'error');
            }
        } catch (e) {
            console.error(e);
            showToast('Có lỗi xảy ra', 'error');
        }
    }

    async function toggleLich(cb, id) {
        const checked = cb.checked;
        cb.style.right = checked ? '0' : '1.25rem';
        const label = cb.nextElementSibling;
        label.className = checked ? 'toggle-label block overflow-hidden h-5 rounded-full bg-emerald-500 cursor-pointer' : 'toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer';
        
        const formData = new FormData();
        formData.append('trang_thai', checked ? 1 : 0);
        try {
            const res = await fetch(`<?= APP_URL ?>/admin/cau-hinh-kho/lich-kiem-ke/trang-thai/${id}`, {
                method: 'POST',
                body: formData
            });
            const data = await res.json();
            if (data.success) {
                showToast(data.message, 'success');
            } else {
                showToast(data.message, 'error');
                cb.checked = !checked; // revert
            }
        } catch (e) {
            console.error(e);
            showToast('Có lỗi xảy ra', 'error');
            cb.checked = !checked;
        }
    }

    async function xoaLich(id) {
        if(!confirm('Xóa lịch kiểm kê này?')) return;
        try {
            const res = await fetch(`<?= APP_URL ?>/admin/cau-hinh-kho/lich-kiem-ke/xoa/${id}`, {
                method: 'POST'
            });
            const data = await res.json();
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => window.location.reload(), 800);
            } else {
                showToast(data.message, 'error');
            }
        } catch (e) {
            console.error(e);
            showToast('Có lỗi xảy ra', 'error');
        }
    }
</script>
