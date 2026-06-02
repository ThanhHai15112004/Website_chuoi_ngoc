<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
    
    <form method="GET" action="<?= APP_URL ?>/admin/bao-cao-san-pham" id="filterForm">
        <!-- Preserve time params -->
        <input type="hidden" name="thoiGian" value="<?= $params['thoiGian'] ?>" id="timeInput">
        <input type="hidden" name="tuNgay" value="<?= $params['tuNgay'] ?>" id="tuNgayInput">
        <input type="hidden" name="denNgay" value="<?= $params['denNgay'] ?>" id="denNgayInput">
        <?php if (!empty($_GET['keyword'])): ?>
        <input type="hidden" name="keyword" value="<?= htmlspecialchars($_GET['keyword']) ?>">
        <?php endif; ?>

        <!-- Bộ lọc thời gian (Quick filters) -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4 pb-4 border-b border-gray-100">
            <div class="flex items-center gap-2 overflow-x-auto scrollbar-hide pb-1">
                <?php
                $timeFilters = [
                    'hom_nay' => 'Hôm nay',
                    '7_ngay' => '7 ngày qua',
                    'thang_nay' => 'Tháng này',
                    'thang_truoc' => 'Tháng trước',
                    'nam_nay' => 'Năm nay' // Optional, not fully implemented in backend but UI has it
                ];
                foreach ($timeFilters as $val => $label):
                    $isActive = ($params['thoiGian'] == $val);
                    $btnClass = $isActive 
                        ? 'bg-[#6B0D18] text-white border border-[#6B0D18] shadow-sm'
                        : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50';
                ?>
                <button type="button" onclick="setTimeFilter('<?= $val ?>')" class="px-4 py-1.5 rounded-full text-sm font-medium whitespace-nowrap <?= $btnClass ?>">
                    <?= $label ?>
                </button>
                <?php endforeach; ?>
                
                <button type="button" onclick="document.getElementById('customTimePicker').classList.toggle('hidden')" class="px-4 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap flex items-center gap-1.5 <?= $params['thoiGian'] == 'tuy_chon' ? 'bg-red-50 border-red-200 text-red-700' : '' ?>">
                    <span class="iconify" data-icon="mdi:calendar-range"></span> Tùy chọn
                </button>
            </div>
            
            <div class="flex items-center text-[13px] text-gray-500 shrink-0">
                <span class="iconify mr-1" data-icon="mdi:information-outline"></span> 
                Dữ liệu tính từ đơn hàng có trạng thái <strong class="text-green-600 ml-1">Thành công</strong>
            </div>
        </div>

        <div id="customTimePicker" class="<?= $params['thoiGian'] == 'tuy_chon' ? '' : 'hidden' ?> mb-4 p-3 bg-gray-50 border border-gray-200 rounded-lg flex items-center gap-3 w-fit">
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-600">Từ:</span>
                <input type="date" id="customTuNgay" value="<?= $params['tuNgay'] ?>" class="px-3 py-1.5 border border-gray-300 rounded text-sm text-gray-700 outline-none focus:border-[#6B0D18]">
            </div>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-600">Đến:</span>
                <input type="date" id="customDenNgay" value="<?= $params['denNgay'] ?>" class="px-3 py-1.5 border border-gray-300 rounded text-sm text-gray-700 outline-none focus:border-[#6B0D18]">
            </div>
            <button type="button" onclick="applyCustomTime()" class="px-3 py-1.5 bg-[#6B0D18] text-white rounded text-sm font-medium hover:bg-red-900">Xem</button>
        </div>

        <!-- Bộ lọc nâng cao -->
        <div class="flex flex-wrap items-center gap-3">
            <select name="danh_muc" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:border-[#6B0D18] focus:ring-0 outline-none min-w-[160px] max-w-full md:max-w-[220px]">
                <option value="">Tất cả danh mục</option>
                <?php foreach ($danhMucs as $dm): ?>
                    <option value="<?= htmlspecialchars($dm['ten_danh_muc']) ?>" <?= ($filters['danh_muc'] == $dm['ten_danh_muc']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($dm['ten_danh_muc']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <select name="loai_da" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:border-[#6B0D18] focus:ring-0 outline-none min-w-[160px] max-w-full md:max-w-[220px]">
                <option value="">Loại đá / ngọc</option>
                <?php foreach ($loaiDas as $ld): ?>
                    <option value="<?= htmlspecialchars($ld['ten_loai_da']) ?>" <?= ($filters['loai_da'] == $ld['ten_loai_da']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($ld['ten_loai_da']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="menh" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:border-[#6B0D18] focus:ring-0 outline-none min-w-[160px] max-w-full md:max-w-[220px]">
                <option value="">Mệnh phong thủy</option>
                <?php foreach ($menhs as $m): ?>
                    <option value="<?= htmlspecialchars($m['ten_menh']) ?>" <?= ($filters['menh'] == $m['ten_menh']) ? 'selected' : '' ?>>
                        Mệnh <?= htmlspecialchars($m['ten_menh']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="hieu_qua" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:border-[#6B0D18] focus:ring-0 outline-none min-w-[160px] max-w-full md:max-w-[220px]">
                <option value="">Hiệu quả bán</option>
                <option value="Bán chạy" <?= ($filters['hieu_qua'] == 'Bán chạy') ? 'selected' : '' ?>>Bán chạy</option>
                <option value="Bán chậm" <?= ($filters['hieu_qua'] == 'Bán chậm') ? 'selected' : '' ?>>Bán chậm</option>
                <option value="Tồn kho cao" <?= ($filters['hieu_qua'] == 'Tồn kho cao') ? 'selected' : '' ?>>Tồn kho cao</option>
            </select>

            <div class="flex-1"></div>

            <a href="<?= APP_URL ?>/admin/bao-cao-san-pham" class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors w-full md:w-auto text-center">
                Xóa bộ lọc
            </a>
            <button type="submit" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors w-full md:w-auto text-center">
                Áp dụng
            </button>
        </div>
    </form>
    
    <!-- Chip đang lọc -->
    <div class="flex items-center gap-2 mt-4 pt-4 border-t border-gray-50 flex-wrap">
        <span class="text-xs text-gray-500 font-medium">Đang lọc:</span>
        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-red-50 text-red-800 text-xs font-medium border border-red-100">
            <?= isset($timeFilters[$params['thoiGian']]) ? $timeFilters[$params['thoiGian']] : 'Tùy chọn: ' . date('d/m/Y', strtotime($params['tuNgay'])) . ' - ' . date('d/m/Y', strtotime($params['denNgay'])) ?> 
        </span>
        
        <?php foreach ($filters as $key => $val): ?>
            <?php if (!empty($val) && $key != 'keyword'): ?>
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-blue-50 text-blue-800 text-xs font-medium border border-blue-100">
                    <?= htmlspecialchars($val) ?>
                </span>
            <?php endif; ?>
        <?php endforeach; ?>
        
        <?php if (!empty($filters['keyword'])): ?>
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-gray-100 text-gray-800 text-xs font-medium border border-gray-200">
                Từ khóa: <?= htmlspecialchars($filters['keyword']) ?>
            </span>
        <?php endif; ?>
    </div>

</div>

<script>
function setTimeFilter(thoiGian) {
    document.getElementById('timeInput').value = thoiGian;
    // Xóa tuNgay và denNgay để backend tự tính toán cho đúng
    document.getElementById('tuNgayInput').value = '';
    document.getElementById('denNgayInput').value = '';
    document.getElementById('filterForm').submit();
}

function applyCustomTime() {
    const tuNgay = document.getElementById('customTuNgay').value;
    const denNgay = document.getElementById('customDenNgay').value;
    if(tuNgay && denNgay) {
        document.getElementById('timeInput').value = 'tuy_chon';
        document.getElementById('tuNgayInput').value = tuNgay;
        document.getElementById('denNgayInput').value = denNgay;
        document.getElementById('filterForm').submit();
    } else {
        alert("Vui lòng chọn cả từ ngày và đến ngày");
    }
}
</script>
