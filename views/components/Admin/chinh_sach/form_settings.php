<?php
// views/components/Admin/chinh_sach/form_settings.php
$p = $policy ?? null;
$viTriArr = $p['vi_tri_hien_thi'] ?? [];
$isVisible = (!$p || $p['trang_thai'] === 'dang_hien_thi');
$currentStatus = $p['trang_thai'] ?? 'ban_nhap';

use App\Models\ChinhSachModel;
$trangThaiText = $p ? ChinhSachModel::tenTrangThai($currentStatus) : 'Bản nháp';

// SEO status
$seoTitle = $p['seo_title'] ?? '';
$seoDesc = $p['seo_description'] ?? '';
$seoStatus = 'Chưa kiểm tra';
if (!empty($seoTitle) && !empty($seoDesc)) $seoStatus = 'Tốt';
elseif (!empty($seoTitle) || !empty($seoDesc)) $seoStatus = 'Cần tối ưu';

$seoStatusClass = 'bg-gray-100 text-gray-600';
if ($seoStatus === 'Tốt') $seoStatusClass = 'bg-emerald-100 text-emerald-700';
elseif ($seoStatus === 'Cần tối ưu') $seoStatusClass = 'bg-amber-100 text-amber-700';
?>
<!-- 1. Trạng thái hiển thị -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5">
    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
        <span class="iconify text-gray-400" data-icon="mdi:toggle-switch-outline"></span> Trạng thái
    </h3>
    
    <div class="space-y-4">
        <label class="flex items-center justify-between cursor-pointer p-3 bg-gray-50 rounded-xl border border-gray-200">
            <div>
                <p class="font-bold text-gray-900 text-sm">Hiển thị ngoài website</p>
                <p class="text-xs text-gray-500 mt-0.5">Khách có thể xem chính sách này</p>
            </div>
            <div class="relative">
                <input type="checkbox" id="toggleStatus" class="sr-only toggle-switch" <?= $isVisible ? 'checked' : '' ?> onchange="updateStatusDisplay()">
                <div class="block bg-gray-300 w-12 h-7 rounded-full transition-colors toggle-bg"></div>
                <div class="dot absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition-transform toggle-dot shadow-sm"></div>
            </div>
        </label>

        <div id="statusInfoBox" class="flex items-center gap-2 p-3 <?= $isVisible ? 'bg-blue-50 border-blue-100' : 'bg-gray-50 border-gray-200' ?> border rounded-xl">
            <span class="iconify <?= $isVisible ? 'text-blue-500' : 'text-gray-400' ?> text-xl shrink-0" data-icon="mdi:information-outline" id="statusInfoIcon"></span>
            <p class="text-xs <?= $isVisible ? 'text-blue-800' : 'text-gray-600' ?>" id="statusInfoText">
                Chính sách này đang được thiết lập là <span class="font-bold" id="statusInfoLabel"><?= $trangThaiText ?></span>.
            </p>
        </div>
    </div>
</div>

<!-- 2. Vị trí hiển thị -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5">
    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
        <span class="iconify text-gray-400" data-icon="mdi:map-marker-path"></span> Vị trí hiển thị
    </h3>
    <p class="text-xs text-gray-500 mb-3">Chọn nơi chính sách này sẽ xuất hiện trên website.</p>
    
    <div class="space-y-3">
        <label class="flex items-start gap-3 cursor-pointer group">
            <div class="mt-0.5">
                <input type="checkbox" name="vi_tri[]" value="Footer" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" <?= in_array('Footer', $viTriArr) ? 'checked' : '' ?>>
            </div>
            <div>
                <p class="font-medium text-gray-900 text-sm group-hover:text-[#6B0D18] transition-colors">Dưới chân trang (Footer)</p>
            </div>
        </label>
        
        <label class="flex items-start gap-3 cursor-pointer group">
            <div class="mt-0.5">
                <input type="checkbox" name="vi_tri[]" value="Checkout" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" <?= in_array('Checkout', $viTriArr) ? 'checked' : '' ?>>
            </div>
            <div>
                <p class="font-medium text-gray-900 text-sm group-hover:text-[#6B0D18] transition-colors">Trang Thanh toán (Checkout)</p>
                <p class="text-[11px] text-gray-500 mt-0.5 italic">Khách phải tích đồng ý trước khi đặt hàng.</p>
            </div>
        </label>

        <label class="flex items-start gap-3 cursor-pointer group">
            <div class="mt-0.5">
                <input type="checkbox" name="vi_tri[]" value="Trang sản phẩm" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" <?= in_array('Trang sản phẩm', $viTriArr) ? 'checked' : '' ?>>
            </div>
            <div>
                <p class="font-medium text-gray-900 text-sm group-hover:text-[#6B0D18] transition-colors">Chi tiết Sản phẩm</p>
                <p class="text-[11px] text-gray-500 mt-0.5 italic">Thường dùng cho Đổi trả, Bảo hành.</p>
            </div>
        </label>

        <label class="flex items-start gap-3 cursor-pointer group">
            <div class="mt-0.5">
                <input type="checkbox" name="vi_tri[]" value="Đăng ký" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" <?= in_array('Đăng ký', $viTriArr) ? 'checked' : '' ?>>
            </div>
            <div>
                <p class="font-medium text-gray-900 text-sm group-hover:text-[#6B0D18] transition-colors">Form Đăng ký / Đăng nhập</p>
            </div>
        </label>
    </div>
</div>

<!-- 3. Tối ưu SEO -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-gray-400" data-icon="mdi:google"></span> Tối ưu SEO
        </h3>
        <span id="seoBadge" class="px-2 py-0.5 <?= $seoStatusClass ?> text-[10px] font-bold rounded"><?= $seoStatus ?></span>
    </div>
    
    <div class="space-y-4">
        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Meta Title</label>
            <input type="text" id="seoTitleInput" name="seo_title" value="<?= htmlspecialchars($seoTitle) ?>" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" 
                   placeholder="Nhập tiêu đề SEO..." maxlength="60" oninput="updateSeoCounters()">
            <p class="text-[10px] text-gray-400 mt-1 text-right" id="seoTitleCounter"><?= mb_strlen($seoTitle) ?>/60 ký tự</p>
        </div>
        
        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Meta Description</label>
            <textarea id="seoDescInput" name="seo_description" rows="3" 
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" 
                      placeholder="Nhập mô tả SEO..." maxlength="160" oninput="updateSeoCounters()"><?= htmlspecialchars($seoDesc) ?></textarea>
            <p class="text-[10px] text-gray-400 mt-1 text-right" id="seoDescCounter"><?= mb_strlen($seoDesc) ?>/160 ký tự</p>
        </div>
    </div>
</div>

<script>
    function updateStatusDisplay() {
        const checked = document.getElementById('toggleStatus').checked;
        const box = document.getElementById('statusInfoBox');
        const icon = document.getElementById('statusInfoIcon');
        const text = document.getElementById('statusInfoText');
        const label = document.getElementById('statusInfoLabel');

        if (checked) {
            box.className = 'flex items-center gap-2 p-3 bg-blue-50 border-blue-100 border rounded-xl';
            icon.className = 'iconify text-blue-500 text-xl shrink-0';
            text.className = 'text-xs text-blue-800';
            label.textContent = 'Đang hiển thị';
        } else {
            box.className = 'flex items-center gap-2 p-3 bg-gray-50 border-gray-200 border rounded-xl';
            icon.className = 'iconify text-gray-400 text-xl shrink-0';
            text.className = 'text-xs text-gray-600';
            label.textContent = 'Đang ẩn';
        }
    }

    function updateSeoCounters() {
        const titleLen = document.getElementById('seoTitleInput').value.length;
        const descLen = document.getElementById('seoDescInput').value.length;
        document.getElementById('seoTitleCounter').textContent = titleLen + '/60 ký tự';
        document.getElementById('seoDescCounter').textContent = descLen + '/160 ký tự';

        // Update badge
        const badge = document.getElementById('seoBadge');
        if (titleLen > 0 && descLen > 0) {
            badge.textContent = 'Tốt';
            badge.className = 'px-2 py-0.5 bg-emerald-100 text-emerald-700 text-[10px] font-bold rounded';
        } else if (titleLen > 0 || descLen > 0) {
            badge.textContent = 'Cần tối ưu';
            badge.className = 'px-2 py-0.5 bg-amber-100 text-amber-700 text-[10px] font-bold rounded';
        } else {
            badge.textContent = 'Chưa kiểm tra';
            badge.className = 'px-2 py-0.5 bg-gray-100 text-gray-600 text-[10px] font-bold rounded';
        }
    }
</script>

<style>
    /* Custom Toggle Switch */
    .toggle-switch:checked + .toggle-bg { background-color: #10B981; }
    .toggle-switch:checked ~ .toggle-dot { transform: translateX(100%); }
</style>
