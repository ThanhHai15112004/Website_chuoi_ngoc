<?php
// views/components/Admin/quan_ly_cua_hang/form_legal.php
?>
<div class="bg-white rounded-[20px] border border-gray-200 shadow-sm overflow-hidden mb-6" id="section-legal">
    <!-- Accordion Header -->
    <button type="button" onclick="toggleLegalSection()" class="w-full px-5 py-4 bg-gray-50/50 hover:bg-gray-100 transition-colors flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="iconify text-gray-400 text-xl" data-icon="mdi:scale-balance"></span>
            <h2 class="font-bold text-gray-900 text-lg">Thông tin pháp lý (Tùy chọn)</h2>
        </div>
        <span class="iconify text-xl text-gray-400 transition-transform duration-300" id="legal-chevron" data-icon="mdi:chevron-down"></span>
    </button>
    
    <!-- Accordion Content -->
    <div class="hidden border-t border-gray-100" id="legal-content">
        <div class="p-5 md:p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Tên Doanh nghiệp / Hộ kinh doanh</label>
                <input type="text" name="ten_doanh_nghiep" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= htmlspecialchars($storeConfig['ten_doanh_nghiep'] ?? '', ENT_QUOTES) ?>" placeholder="Nhập tên ĐKKD...">
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Mã số thuế / Mã DKKD</label>
                <input type="text" name="ma_so_thue" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= htmlspecialchars($storeConfig['ma_so_thue'] ?? '', ENT_QUOTES) ?>" placeholder="Nhập mã số thuế...">
            </div>
            <div class="space-y-1 md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Địa chỉ đăng ký kinh doanh</label>
                <input type="text" name="dia_chi_dkkd" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= htmlspecialchars($storeConfig['dia_chi_dkkd'] ?? '', ENT_QUOTES) ?>" placeholder="Địa chỉ ghi trên giấy tờ...">
            </div>
            
            <div class="space-y-1 md:col-span-2">
                <label class="flex items-center gap-2 cursor-pointer mt-2">
                    <input type="hidden" name="hien_thi_phap_ly" value="0">
                    <input type="checkbox" name="hien_thi_phap_ly" value="1" class="w-4 h-4 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]" <?= ($storeConfig['hien_thi_phap_ly'] ?? '0') === '1' ? 'checked' : '' ?>>
                    <span class="text-sm font-medium text-gray-700">Hiển thị thông tin pháp lý công khai trên Footer website</span>
                </label>
                <p class="text-xs text-gray-500 ml-6">Giúp tăng độ uy tín với khách hàng, hoặc phục vụ khai báo Bộ Công Thương.</p>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleLegalSection() {
        const content = document.getElementById('legal-content');
        const chevron = document.getElementById('legal-chevron');
        
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            chevron.classList.add('rotate-180');
        } else {
            content.classList.add('hidden');
            chevron.classList.remove('rotate-180');
        }
    }
</script>
