<?php
// views/components/Admin/cau_hinh_kho/tabs/tab_canh_bao.php
?>
<div class="p-6">
    <div class="flex justify-between items-center pb-4 border-b border-gray-100 mb-6">
        <div>
            <h3 class="text-lg font-bold text-gray-900">Ngưỡng cảnh báo kho</h3>
            <p class="text-sm text-gray-500 mt-1">Cấu hình hệ thống tự động thông báo khi tồn kho đạt đến các mức độ bất thường.</p>
        </div>
        <button onclick="saveCanhBao()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
            <span class="iconify" data-icon="mdi:content-save"></span> Lưu cấu hình
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        
        <!-- Cảnh báo sắp hết hàng -->
        <div class="border border-gray-200 rounded-xl p-5 bg-white relative hover:shadow-sm transition-shadow">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
                        <span class="iconify text-xl" data-icon="mdi:alert-outline"></span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Sắp hết hàng</h4>
                        <p class="text-[11px] text-gray-500 mt-0.5">Báo khi tồn kho xuống thấp</p>
                    </div>
                </div>
                <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-[#6B0D18] checked:right-0 transition-all duration-200" style="right: 0;">
                    <label class="toggle-label block overflow-hidden h-5 rounded-full bg-[#6B0D18] cursor-pointer"></label>
                </div>
            </div>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Ngưỡng cảnh báo (mặc định)</label>
                    <div class="relative">
                        <input type="number" id="cb_nguong_sap_het" value="<?= $cauHinh['nguong_sap_het'] ?? '5' ?>" class="w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] text-sm" />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-500 text-sm">SP</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cảnh báo tồn kho cao -->
        <div class="border border-gray-200 rounded-xl p-5 bg-white relative hover:shadow-sm transition-shadow">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                        <span class="iconify text-xl" data-icon="mdi:package-variant"></span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Tồn kho cao</h4>
                        <p class="text-[11px] text-gray-500 mt-0.5">Báo hàng tồn lâu không bán</p>
                    </div>
                </div>
                <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-[#6B0D18] checked:right-0 transition-all duration-200" style="right: 1.25rem;">
                    <label class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
            </div>
            <div class="space-y-4 opacity-50 pointer-events-none">
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Ngưỡng tồn cao (> SP)</label>
                    <div class="relative">
                        <input type="number" id="cb_nguong_ton_cao" value="<?= $cauHinh['nguong_ton_cao'] ?? '50' ?>" class="w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] text-sm" />
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Thời gian không bán (Ngày)</label>
                    <div class="relative">
                        <input type="number" id="cb_ngay_khong_ban" value="<?= $cauHinh['ngay_khong_ban'] ?? '60' ?>" class="w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] text-sm" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Cảnh báo tồn âm -->
        <div class="border-2 border-rose-200 rounded-xl p-5 bg-rose-50/20 relative shadow-[0_4px_10px_-3px_rgba(225,29,72,0.1)]">
            <div class="absolute -top-3 right-4 bg-rose-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">
                Khuyên dùng
            </div>
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-rose-100 flex items-center justify-center text-rose-600">
                        <span class="iconify text-xl" data-icon="mdi:alert-octagon-outline"></span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Tồn kho âm (< 0)</h4>
                        <p class="text-[11px] text-gray-500 mt-0.5">Ghi nhận lỗi số liệu kho</p>
                    </div>
                </div>
                <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-rose-600 checked:right-0 transition-all duration-200" style="right: 0;">
                    <label class="toggle-label block overflow-hidden h-5 rounded-full bg-rose-600 cursor-pointer"></label>
                </div>
            </div>
            <p class="text-xs text-rose-700 leading-relaxed bg-white/50 p-2 rounded border border-rose-100">
                Khi bật, hệ thống sẽ gửi thông báo khẩn cấp đến Super Admin nếu phát hiện số lượng tồn kho của bất kỳ sản phẩm nào nhỏ hơn 0.
            </p>
        </div>

    </div>

    <!-- Người nhận thông báo -->
    <div class="mt-8">
        <h4 class="text-sm font-bold text-gray-900 mb-4 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:account-group-outline"></span> Đối tượng nhận cảnh báo
        </h4>
        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
            <div class="flex flex-wrap gap-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" disabled>
                    <span class="text-sm font-medium text-gray-900">Super Admin (Mặc định)</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                    <span class="text-sm text-gray-700">Quản lý kho</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                    <span class="text-sm text-gray-700">Người phụ trách kho cụ thể</span>
                </label>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-200 flex flex-wrap gap-4">
                <span class="text-sm font-medium text-gray-700">Kênh nhận:</span>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                    <span class="text-sm text-gray-700 flex items-center gap-1"><span class="iconify" data-icon="mdi:bell-outline"></span> App Admin</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                    <span class="text-sm text-gray-700 flex items-center gap-1"><span class="iconify" data-icon="mdi:email-outline"></span> Email</span>
                </label>
            </div>
        </div>
    </div>

</div>

<script>
    async function saveCanhBao() {
        const payload = {
            nguong_sap_het: document.getElementById('cb_nguong_sap_het')?.value || '5',
            nguong_ton_cao: document.getElementById('cb_nguong_ton_cao')?.value || '50',
            ngay_khong_ban: document.getElementById('cb_ngay_khong_ban')?.value || '60'
        };
        try {
            const res = await fetch('<?= APP_URL ?>/admin/cau-hinh-kho/cau-hinh/luu', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.success) {
                showToast(data.message, 'success');
            } else {
                showToast(data.message, 'error');
            }
        } catch (err) {
            console.error(err);
            showToast('Có lỗi xảy ra.', 'error');
        }
    }
</script>
