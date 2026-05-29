<?php
$current_page = 'cau_hinh_kho';
$kho = $kho ?? null;
$nhanVien = $nhanVien ?? [];
?>
<div class="p-6 space-y-6 bg-gray-50/50 min-h-screen relative pb-24">
    
    <!-- Tiêu đề trang -->
    <div class="flex items-center gap-4">
        <a href="<?= APP_URL ?>/admin/cau-hinh-kho" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 border border-gray-200 transition-colors shadow-sm">
            <span class="iconify" data-icon="mdi:arrow-left"></span>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900"><?= isset($isEdit) && $isEdit ? 'Chỉnh sửa kho hàng' : 'Thêm kho hàng mới' ?></h1>
            <p class="text-sm text-gray-500 mt-1">Thiết lập các thông tin cơ bản và cấu hình vận hành cho kho hàng.</p>
        </div>
    </div>

    <form id="formKho" class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        
        <!-- Cột trái: Thông tin cơ bản & Địa chỉ -->
        <div class="xl:col-span-2 space-y-6">
            
            <!-- Block 1: Thông tin cơ bản -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:information-outline"></span> Thông tin cơ bản
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tên kho <span class="text-red-500">*</span></label>
                        <input type="text" id="kho_ten" value="<?= $kho ? htmlspecialchars($kho['ten_kho']) : '' ?>" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm" placeholder="VD: Kho trung tâm, Kho Q1...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mã kho <span class="text-red-500">*</span></label>
                        <input type="text" id="kho_ma" value="<?= $kho ? htmlspecialchars($kho['ma_kho']) : '' ?>" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm" placeholder="VD: KHO-TT, tự sinh nếu để trống">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Loại kho <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <?php
                        $loaiKhoOptions = [
                            'online' => 'Kho Online',
                            'tong' => 'Kho Tổng',
                            'cua_hang' => 'Kho Cửa hàng',
                            'loi' => 'Kho Lỗi/Hủy'
                        ];
                        foreach ($loaiKhoOptions as $val => $label):
                            $isChecked = $kho && $kho['loai_kho'] === $val;
                            $activeClass = $isChecked ? 'border-[#6B0D18] bg-red-50 text-[#6B0D18]' : 'border-gray-200 text-gray-600 hover:bg-gray-50';
                        ?>
                        <label class="loai-kho-label flex items-center justify-center gap-2 p-2 border <?= $activeClass ?> rounded-lg cursor-pointer transition-colors text-sm font-medium text-center">
                            <input type="radio" name="loai_kho" value="<?= $val ?>" class="hidden" <?= $isChecked ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mô tả chức năng kho</label>
                    <textarea id="kho_mo_ta" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm h-20 resize-none" placeholder="Nhập mô tả ngắn..."><?= $kho ? htmlspecialchars($kho['mo_ta'] ?? '') : '' ?></textarea>
                </div>
            </div>

            <!-- Block 2: Địa chỉ & Người phụ trách -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:map-marker-radius"></span> Vị trí & Nhân sự
                    </h3>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="kho_noi_bo" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                        <span class="text-xs text-gray-500">Kho nội bộ (Không cần địa chỉ)</span>
                    </label>
                </div>
                
                <div id="diachi_block">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tỉnh / Thành phố</label>
                            <input type="text" id="kho_tinh_thanh" value="<?= $kho ? htmlspecialchars($kho['tinh_thanh'] ?? '') : '' ?>" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm" placeholder="VD: TP. Hồ Chí Minh">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Quận / Huyện</label>
                            <input type="text" id="kho_quan_huyen" value="<?= $kho ? htmlspecialchars($kho['quan_huyen'] ?? '') : '' ?>" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm" placeholder="VD: Quận 5">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phường / Xã</label>
                            <input type="text" id="kho_phuong_xa" value="<?= $kho ? htmlspecialchars($kho['phuong_xa'] ?? '') : '' ?>" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm" placeholder="VD: Phường 4">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Địa chỉ chi tiết</label>
                        <input type="text" id="kho_dia_chi" value="<?= $kho ? htmlspecialchars($kho['dia_chi'] ?? '') : '' ?>" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm" placeholder="Số nhà, tên đường...">
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Người phụ trách chính</label>
                    <select id="kho_nguoi_phu_trach" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm">
                        <option value="">Chọn người phụ trách</option>
                        <?php foreach ($nhanVien as $nv): ?>
                            <option value="<?= htmlspecialchars($nv['id']) ?>" <?= ($kho && ($kho['npt_id'] ?? '') == $nv['id']) ? 'selected' : '' ?>><?= htmlspecialchars($nv['ho_ten']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p class="text-[11px] text-gray-500 mt-1 flex items-center gap-1">
                        <span class="iconify text-amber-500" data-icon="mdi:information"></span> Người này sẽ nhận các thông báo cảnh báo kho.
                    </p>
                </div>
            </div>
            
        </div>

        <!-- Cột phải: Cấu hình vận hành & Trạng thái -->
        <div class="xl:col-span-1 space-y-6">
            
            <!-- Block 3: Cấu hình vận hành -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:cog-outline"></span> Cấu hình vận hành
                </h3>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-gray-50">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Cho phép bán hàng</span>
                            <span class="block text-[11px] text-gray-500 mt-0.5">Kho có thể giao cho khách</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="kho_ban_hang" class="sr-only peer" <?= (!$kho || ($kho['cho_phep_ban'] ?? 1)) ? 'checked' : '' ?>>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between pb-3 border-b border-gray-50">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Làm kho mặc định Online</span>
                            <span class="block text-[11px] text-gray-500 mt-0.5">Ưu tiên trừ hàng từ kho này</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="kho_mac_dinh" class="sr-only peer" <?= ($kho && $kho['mac_dinh']) ? 'checked' : '' ?>>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between pb-3 border-b border-gray-50">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Cho phép Thuyên chuyển</span>
                            <span class="block text-[11px] text-gray-500 mt-0.5">Chuyển hàng sang kho khác</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="kho_chuyen" class="sr-only peer" <?= (!$kho || ($kho['cho_phep_chuyen'] ?? 1)) ? 'checked' : '' ?>>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Cho phép Kiểm kê</span>
                            <span class="block text-[11px] text-gray-500 mt-0.5">Được lập phiếu kiểm kê</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="kho_kiem_ke" class="sr-only peer" <?= (!$kho || ($kho['cho_phep_kiem_ke'] ?? 1)) ? 'checked' : '' ?>>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Block 4: Trạng thái -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:shield-check-outline"></span> Trạng thái kho
                </h3>
                
                <div class="space-y-3">
                    <label class="flex items-center gap-3 p-3 rounded-lg border <?= (!$kho || $kho['trang_thai'] == 1) ? 'border-emerald-200 bg-emerald-50' : 'border-gray-200 hover:bg-gray-50' ?> cursor-pointer transition-colors group">
                        <input type="radio" name="trang_thai" value="1" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]" <?= (!$kho || $kho['trang_thai'] == 1) ? 'checked' : '' ?>>
                        <div>
                            <span class="block text-sm font-semibold text-emerald-700">Đang hoạt động</span>
                        </div>
                    </label>
                    
                    <label class="flex items-center gap-3 p-3 rounded-lg border <?= ($kho && $kho['trang_thai'] == 2) ? 'border-amber-200 bg-amber-50' : 'border-gray-200 hover:bg-gray-50' ?> cursor-pointer transition-colors group">
                        <input type="radio" name="trang_thai" value="2" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]" <?= ($kho && $kho['trang_thai'] == 2) ? 'checked' : '' ?>>
                        <div>
                            <span class="block text-sm font-medium text-amber-700">Tạm ngừng</span>
                        </div>
                    </label>

                    <?php if($isEdit): ?>
                    <label class="flex items-center gap-3 p-3 rounded-lg border <?= ($kho && $kho['trang_thai'] == 0) ? 'border-rose-200 bg-rose-50' : 'border-gray-200 hover:bg-gray-50' ?> cursor-pointer transition-colors group">
                        <input type="radio" name="trang_thai" value="0" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]" <?= ($kho && $kho['trang_thai'] == 0) ? 'checked' : '' ?>>
                        <div>
                            <span class="block text-sm font-medium text-rose-700">Ngừng dùng kho</span>
                        </div>
                    </label>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </form>

    <!-- Sticky Bottom Bar -->
    <div class="fixed bottom-0 left-0 right-0 md:left-[260px] bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40 flex justify-between items-center px-6">
        <a href="<?= APP_URL ?>/admin/cau-hinh-kho" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium transition-colors">
            Hủy bỏ
        </a>
        <button type="button" onclick="saveKho()" class="px-8 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-bold transition-colors shadow-sm flex items-center gap-2">
            <span class="iconify" data-icon="mdi:check-circle-outline"></span>
            Lưu thay đổi
        </button>
    </div>

</div>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]">
    <div class="bg-emerald-100 rounded-full p-1" id="toast-icon-bg">
        <span class="iconify text-emerald-600" data-icon="mdi:check" id="toast-icon"></span>
    </div>
    <div>
        <h4 class="text-sm font-bold text-gray-900" id="toast-title">Thành công</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toast-msg">Thao tác thành công.</p>
    </div>
    <button type="button" onclick="hideToast()" class="text-gray-400 hover:text-gray-600 ml-4"><span class="iconify" data-icon="mdi:close"></span></button>
</div>

<script>
    // Toast
    let toastTimeout;
    function showToast(msg, type = 'success') {
        const toast = document.getElementById('toast');
        const toastTitle = document.getElementById('toast-title');
        const toastMsg = document.getElementById('toast-msg');
        const toastIconBg = document.getElementById('toast-icon-bg');
        const toastIcon = document.getElementById('toast-icon');
        toastMsg.textContent = msg;
        if (type === 'success') {
            toast.className = 'fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]';
            toastIconBg.className = 'bg-emerald-100 rounded-full p-1';
            toastIcon.className = 'iconify text-emerald-600';
            toastIcon.setAttribute('data-icon', 'mdi:check');
            toastTitle.textContent = 'Thành công';
        } else {
            toast.className = 'fixed bottom-6 right-6 bg-white border-l-4 border-rose-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]';
            toastIconBg.className = 'bg-rose-100 rounded-full p-1';
            toastIcon.className = 'iconify text-rose-600';
            toastIcon.setAttribute('data-icon', 'mdi:alert-circle-outline');
            toastTitle.textContent = 'Lỗi';
        }
        void toast.offsetWidth;
        toast.classList.remove('translate-y-20', 'opacity-0');
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => hideToast(), 3000);
    }
    function hideToast() {
        document.getElementById('toast').classList.add('translate-y-20', 'opacity-0');
    }

    // Loại kho radio toggle styling
    document.querySelectorAll('.loai-kho-label input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', () => {
            document.querySelectorAll('.loai-kho-label').forEach(l => {
                l.classList.remove('border-[#6B0D18]', 'bg-red-50', 'text-[#6B0D18]');
                l.classList.add('border-gray-200', 'text-gray-600');
            });
            radio.closest('.loai-kho-label').classList.remove('border-gray-200', 'text-gray-600');
            radio.closest('.loai-kho-label').classList.add('border-[#6B0D18]', 'bg-red-50', 'text-[#6B0D18]');
        });
    });

    // Kho nội bộ toggle
    document.getElementById('kho_noi_bo')?.addEventListener('change', function() {
        document.getElementById('diachi_block').style.display = this.checked ? 'none' : 'block';
    });

    // Save kho
    const isEdit = <?= $isEdit ? 'true' : 'false' ?>;
    const khoId = '<?= $khoId ?? '' ?>';

    async function saveKho() {
        const tenKho = document.getElementById('kho_ten').value.trim();
        if (!tenKho) {
            showToast('Vui lòng nhập tên kho.', 'error');
            return;
        }

        const loaiKhoRadio = document.querySelector('input[name="loai_kho"]:checked');
        const trangThaiRadio = document.querySelector('input[name="trang_thai"]:checked');

        const payload = {
            ten_kho: tenKho,
            ma_kho: document.getElementById('kho_ma').value.trim(),
            loai_kho: loaiKhoRadio ? loaiKhoRadio.value : 'tong',
            mo_ta: document.getElementById('kho_mo_ta').value.trim(),
            dia_chi: document.getElementById('kho_dia_chi')?.value.trim() || '',
            tinh_thanh: document.getElementById('kho_tinh_thanh')?.value.trim() || '',
            quan_huyen: document.getElementById('kho_quan_huyen')?.value.trim() || '',
            phuong_xa: document.getElementById('kho_phuong_xa')?.value.trim() || '',
            id_nguoi_phu_trach: document.getElementById('kho_nguoi_phu_trach').value || '',
            mac_dinh: document.getElementById('kho_mac_dinh').checked ? 1 : 0,
            cho_phep_ban: document.getElementById('kho_ban_hang').checked ? 1 : 0,
            cho_phep_chuyen: document.getElementById('kho_chuyen').checked ? 1 : 0,
            cho_phep_kiem_ke: document.getElementById('kho_kiem_ke').checked ? 1 : 0,
            trang_thai: trangThaiRadio ? parseInt(trangThaiRadio.value) : 1
        };

        const url = isEdit 
            ? '<?= APP_URL ?>/admin/cau-hinh-kho/cap-nhat/' + khoId 
            : '<?= APP_URL ?>/admin/cau-hinh-kho/luu';

        try {
            const res = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => window.location.href = '<?= APP_URL ?>/admin/cau-hinh-kho', 1000);
            } else {
                showToast(data.message, 'error');
            }
        } catch (err) {
            console.error(err);
            showToast('Có lỗi xảy ra khi kết nối đến máy chủ.', 'error');
        }
    }
</script>
