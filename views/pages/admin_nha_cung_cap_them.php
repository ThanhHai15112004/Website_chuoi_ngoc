<?php
$isEdit = $isEdit ?? false;
$ncc = $ncc ?? [];
?>
<div class="p-6 space-y-6 bg-gray-50/50 min-h-screen relative pb-24">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="<?= APP_URL ?>/admin/nha-cung-cap" class="p-2 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-colors focus:outline-none">
            <span class="iconify text-2xl" data-icon="mdi:arrow-left"></span>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900"><?= $isEdit ? 'Chỉnh sửa nhà cung cấp' : 'Thêm nhà cung cấp mới' ?></h1>
            <p class="text-sm text-gray-500 mt-1"><?= $isEdit ? 'Cập nhật thông tin đối tác ' . htmlspecialchars($ncc['ten_ncc'] ?? '') : 'Điền thông tin để khởi tạo hồ sơ đối tác cung cấp mới.' ?></p>
        </div>
    </div>

    <!-- Layout 2 cột -->
    <form id="supplierForm" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Cột trái (Rộng hơn) -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Thông tin cơ bản & liên hệ -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:domain"></span>
                    Thông tin nhà cung cấp
                </h2>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tên nhà cung cấp <span class="text-red-500">*</span></label>
                            <input type="text" id="ten_ncc" value="<?= htmlspecialchars($ncc['ten_ncc'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18]" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mã nhà cung cấp (Tự động nếu để trống)</label>
                            <input type="text" id="ma_ncc" value="<?= htmlspecialchars($ncc['ma_ncc'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18]" placeholder="VD: NCC001">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Người liên hệ</label>
                            <input type="text" id="nguoi_lien_he" value="<?= htmlspecialchars($ncc['nguoi_lien_he'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                            <input type="text" id="sdt" value="<?= htmlspecialchars($ncc['sdt'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18]">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" value="<?= htmlspecialchars($ncc['email'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ chi tiết</label>
                        <textarea id="dia_chi" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18]"><?= htmlspecialchars($ncc['dia_chi'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cột phải (Hẹp hơn) -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Trạng thái -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:check-circle-outline"></span>
                    Trạng thái hợp tác
                </h2>
                
                <div class="space-y-3">
                    <?php $trang_thai = isset($ncc['trang_thai']) ? (int)$ncc['trang_thai'] : 1; ?>
                    <label class="flex items-start gap-3 p-3 border border-emerald-100 bg-emerald-50/50 rounded-xl cursor-pointer hover:bg-emerald-50 transition-colors">
                        <div class="flex items-center h-5">
                            <input type="radio" name="trang_thai" value="1" <?= $trang_thai === 1 ? 'checked' : '' ?> class="w-4 h-4 text-emerald-600 focus:ring-emerald-500 border-gray-300">
                        </div>
                        <div class="flex-1">
                            <span class="block text-sm font-medium text-emerald-800">Đang hợp tác</span>
                            <span class="block text-xs text-emerald-600 mt-0.5">Nhà cung cấp hoạt động bình thường</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-3 border border-amber-100 rounded-xl cursor-pointer hover:bg-amber-50 transition-colors">
                        <div class="flex items-center h-5">
                            <input type="radio" name="trang_thai" value="2" <?= $trang_thai === 2 ? 'checked' : '' ?> class="w-4 h-4 text-amber-600 focus:ring-amber-500 border-gray-300">
                        </div>
                        <div class="flex-1">
                            <span class="block text-sm font-medium text-gray-700">Tạm ngừng</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Tạm thời không nhập hàng</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                        <div class="flex items-center h-5">
                            <input type="radio" name="trang_thai" value="0" <?= $trang_thai === 0 ? 'checked' : '' ?> class="w-4 h-4 text-gray-600 focus:ring-gray-500 border-gray-300">
                        </div>
                        <div class="flex-1">
                            <span class="block text-sm font-medium text-gray-700">Ngừng hợp tác</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Không còn giao dịch với đối tác này</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        
        <!-- Sticky Bottom Actions -->
        <div class="fixed bottom-0 left-0 right-0 lg:left-64 bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40">
            <div class="max-w-[1600px] mx-auto flex items-center justify-between">
                <div>
                    <span class="text-sm text-gray-500"><span class="text-red-500">*</span> Các trường bắt buộc nhập</span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="<?= APP_URL ?>/admin/nha-cung-cap" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                        Hủy bỏ
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium transition-colors shadow-sm flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:content-save"></span>
                        <?= $isEdit ? 'Lưu cập nhật' : 'Lưu nhà cung cấp' ?>
                    </button>
                </div>
            </div>
        </div>
    </form>
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

    // Force reflow
    void toast.offsetWidth;
    toast.classList.remove('translate-y-20', 'opacity-0');
    
    clearTimeout(toastTimeout);
    toastTimeout = setTimeout(() => {
        hideToast();
    }, 3000);
}

function hideToast() {
    const toast = document.getElementById('toast');
    toast.classList.add('translate-y-20', 'opacity-0');
}
document.getElementById('supplierForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const data = {
        ten_ncc: document.getElementById('ten_ncc').value,
        ma_ncc: document.getElementById('ma_ncc').value,
        nguoi_lien_he: document.getElementById('nguoi_lien_he').value,
        sdt: document.getElementById('sdt').value,
        email: document.getElementById('email').value,
        dia_chi: document.getElementById('dia_chi').value,
        trang_thai: document.querySelector('input[name="trang_thai"]:checked').value
    };

    const isEdit = <?= $isEdit ? 'true' : 'false' ?>;
    const url = isEdit ? '<?= APP_URL ?>/admin/nha-cung-cap/cap-nhat/<?= $ncc['id'] ?? '' ?>' : '<?= APP_URL ?>/admin/nha-cung-cap/luu';

    try {
        const res = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        
        const result = await res.json();
        
        if(result.success) {
            showToast(result.message, 'success');
            setTimeout(() => {
                window.location.href = '<?= APP_URL ?>/admin/nha-cung-cap';
            }, 1000);
        } else {
            showToast(result.message || 'Có lỗi xảy ra', 'error');
        }
    } catch (error) {
        console.error(error);
        showToast('Lỗi kết nối đến máy chủ!', 'error');
    }
});
</script>
