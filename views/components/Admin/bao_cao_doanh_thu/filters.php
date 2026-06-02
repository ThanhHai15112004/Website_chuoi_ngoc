<?php
$thoiGian = $params['thoiGian'] ?? '30days';
$tuNgay = $_GET['tu_ngay'] ?? '';
$denNgay = $_GET['den_ngay'] ?? '';

$timeLabels = [
    '7days' => '7 ngày qua',
    '30days' => '30 ngày qua',
    'thang_nay' => 'Tháng này',
    'quy_nay' => 'Quý này',
    'nam_nay' => 'Năm nay',
    'custom' => 'Tùy chọn'
];
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
    
    <form action="" method="GET" id="filterForm">
        <!-- Bộ lọc thời gian (Quick filters) -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4 pb-4 border-b border-gray-100">
            <div class="flex items-center gap-2 overflow-x-auto scrollbar-hide pb-1">
                <input type="hidden" name="thoi_gian" id="thoi_gian_input" value="<?= $thoiGian ?>">
                
                <button type="button" onclick="setThoiGian('7days')" class="px-4 py-1.5 <?= $thoiGian == '7days' ? 'bg-[#6B0D18] text-white border-[#6B0D18] shadow-sm' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50' ?> border rounded-full text-sm font-medium whitespace-nowrap">7 ngày qua</button>
                <button type="button" onclick="setThoiGian('30days')" class="px-4 py-1.5 <?= $thoiGian == '30days' ? 'bg-[#6B0D18] text-white border-[#6B0D18] shadow-sm' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50' ?> border rounded-full text-sm font-medium whitespace-nowrap">30 ngày qua</button>
                <button type="button" onclick="setThoiGian('thang_nay')" class="px-4 py-1.5 <?= $thoiGian == 'thang_nay' ? 'bg-[#6B0D18] text-white border-[#6B0D18] shadow-sm' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50' ?> border rounded-full text-sm font-medium whitespace-nowrap">Tháng này</button>
                <button type="button" onclick="setThoiGian('quy_nay')" class="px-4 py-1.5 <?= $thoiGian == 'quy_nay' ? 'bg-[#6B0D18] text-white border-[#6B0D18] shadow-sm' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50' ?> border rounded-full text-sm font-medium whitespace-nowrap">Quý này</button>
                <button type="button" onclick="setThoiGian('nam_nay')" class="px-4 py-1.5 <?= $thoiGian == 'nam_nay' ? 'bg-[#6B0D18] text-white border-[#6B0D18] shadow-sm' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50' ?> border rounded-full text-sm font-medium whitespace-nowrap">Năm nay</button>
                <button type="button" onclick="toggleCustomTime()" class="px-4 py-1.5 <?= $thoiGian == 'custom' ? 'bg-[#6B0D18] text-white border-[#6B0D18] shadow-sm' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50' ?> border rounded-full text-sm font-medium whitespace-nowrap flex items-center gap-1.5">
                    <span class="iconify" data-icon="mdi:calendar-range"></span> Tùy chọn
                </button>
            </div>
            
            <div class="flex items-center text-[13px] text-gray-500 shrink-0">
                <span class="iconify mr-1" data-icon="mdi:information-outline"></span> 
                Dữ liệu tính từ đơn hàng có trạng thái <strong class="text-green-600 ml-1">Thành công</strong>
            </div>
        </div>

        <div id="customTimeSection" class="<?= $thoiGian == 'custom' ? 'flex' : 'hidden' ?> items-end gap-3 mb-4 pb-4 border-b border-gray-100">
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Từ ngày</label>
                <input type="date" name="tu_ngay" value="<?= $tuNgay ?>" class="px-3 py-2 border border-gray-200 rounded-lg text-sm outline-none focus:border-[#6B0D18]">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Đến ngày</label>
                <input type="date" name="den_ngay" value="<?= $denNgay ?>" class="px-3 py-2 border border-gray-200 rounded-lg text-sm outline-none focus:border-[#6B0D18]">
            </div>
            <button type="submit" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors">
                Áp dụng
            </button>
        </div>
    </form>
    
    <!-- Chip đang lọc -->
    <div class="flex items-center gap-2 mt-4">
        <span class="text-xs text-gray-500 font-medium">Đang lọc:</span>
        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-red-50 text-red-800 text-xs font-medium border border-red-100">
            <?= $timeLabels[$thoiGian] ?? '30 ngày qua' ?>
            <?php if($thoiGian == 'custom'): ?>
                (<?= date('d/m/Y', strtotime($params['tuNgay'])) ?> - <?= date('d/m/Y', strtotime($params['denNgay'])) ?>)
            <?php endif; ?>
        </span>
        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-green-50 text-green-800 text-xs font-medium border border-green-100">
            Thành công
        </span>
    </div>

</div>

<script>
function setThoiGian(val) {
    document.getElementById('thoi_gian_input').value = val;
    if (val !== 'custom') {
        document.getElementById('filterForm').submit();
    }
}
function toggleCustomTime() {
    document.getElementById('thoi_gian_input').value = 'custom';
    const sec = document.getElementById('customTimeSection');
    sec.classList.remove('hidden');
    sec.classList.add('flex');
}
</script>
