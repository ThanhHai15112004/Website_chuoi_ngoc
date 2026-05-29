<?php
// views/components/Admin/cau_hinh_kho/modals.php
$danhSachKhoSelect = $danhSachKhoSelect ?? [];
?>
<!-- Modal Thêm Vị Trí Khu Vực -->
<div id="modalThemViTri" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalThemViTriContent">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:plus-box-outline"></span> Thêm vị trí mới
            </h3>
            <button onclick="closeModal('modalThemViTri')" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-gray-200 rounded-full transition-colors focus:outline-none">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kho trực thuộc <span class="text-red-500">*</span></label>
                <select id="vt_id_kho" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                    <?php foreach ($danhSachKhoSelect as $k): ?>
                        <option value="<?= htmlspecialchars($k['id']) ?>"><?= htmlspecialchars($k['ten_kho']) ?> (<?= htmlspecialchars($k['ma_kho']) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cấp độ vị trí <span class="text-red-500">*</span></label>
                    <select id="vt_cap_do" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                        <option value="khu">Khu vực (Zone)</option>
                        <option value="ke">Kệ (Rack)</option>
                        <option value="ngan">Ngăn (Bin)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Vị trí cha (Tùy chọn)</label>
                    <select id="vt_id_cha" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm text-gray-500">
                        <option value="">-- Không có (Gốc) --</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mã vị trí <span class="text-red-500">*</span></label>
                    <input type="text" id="vt_ma" class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="VD: KV-C">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tên vị trí <span class="text-red-500">*</span></label>
                    <input type="text" id="vt_ten" class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="VD: Khu C - Hộp quà">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sức chứa tối đa (Số lượng SP)</label>
                <input type="number" id="vt_suc_chua" class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="Để trống nếu không giới hạn">
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
            <button type="button" onclick="closeModal('modalThemViTri')" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors text-sm">
                Hủy bỏ
            </button>
            <button type="button" onclick="saveViTri()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium transition-colors shadow-sm flex items-center gap-2 text-sm">
                <span class="iconify" data-icon="mdi:check"></span> Thêm vị trí
            </button>
        </div>
    </div>
</div>

<!-- Toast cho trang chính -->
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

    // Modal open/close
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        const content = document.getElementById(modalId + 'Content');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        const content = document.getElementById(modalId + 'Content');
        
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
    }

    // Save vị trí
    async function saveViTri() {
        const maVt = document.getElementById('vt_ma').value.trim();
        const tenVt = document.getElementById('vt_ten').value.trim();
        const idKho = document.getElementById('vt_id_kho').value;

        if (!maVt || !tenVt || !idKho) {
            showToast('Vui lòng điền đầy đủ thông tin bắt buộc.', 'error');
            return;
        }

        const payload = {
            id_kho: idKho,
            id_cha: document.getElementById('vt_id_cha').value || null,
            ma_vi_tri: maVt,
            ten_vi_tri: tenVt,
            cap_do: document.getElementById('vt_cap_do').value,
            suc_chua: document.getElementById('vt_suc_chua').value || null
        };

        try {
            const res = await fetch('<?= APP_URL ?>/admin/cau-hinh-kho/vi-tri/luu', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.success) {
                showToast(data.message, 'success');
                closeModal('modalThemViTri');
                setTimeout(() => window.location.reload(), 800);
            } else {
                showToast(data.message, 'error');
            }
        } catch (err) {
            console.error(err);
            showToast('Có lỗi xảy ra khi kết nối.', 'error');
        }
    }
</script>
