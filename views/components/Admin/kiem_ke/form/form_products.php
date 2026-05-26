<?php
// views/components/Admin/kiem_ke/form/form_products.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:package-variant-closed"></span> 2. Sản phẩm kiểm kê
        </h3>
        <div class="flex gap-2">
            <button type="button" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:file-excel-outline"></span> Nhập từ Excel
            </button>
            <button type="button" onclick="loadAllSP()" class="px-4 py-2 bg-gray-100 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:download-multiple"></span> Thêm toàn bộ Kho
            </button>
        </div>
    </div>
    
    <div class="p-6">
        <!-- Thêm SP lẻ -->
        <div class="mb-6 flex gap-3 relative">
            <div class="flex-1 relative">
                <select id="selectSP" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                    <option value="">-- Tìm và chọn sản phẩm để thêm vào phiếu --</option>
                    <?php foreach ($sanPhamList as $sp): ?>
                        <option value="<?= $sp['id'] ?>" data-name="<?= $sp['ten'] ?>" data-ton="<?= $sp['ton_he_thong'] ?>">
                            <?= $sp['id'] ?> - <?= $sp['ten'] ?> (Tồn HT: <?= $sp['ton_he_thong'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:barcode-scan"></span>
            </div>
            <button type="button" onclick="addSP()" class="px-4 py-2 bg-[#6B0D18] text-white font-medium rounded-lg hover:bg-red-900 transition-colors text-sm flex items-center gap-2 shadow-sm whitespace-nowrap">
                <span class="iconify" data-icon="mdi:plus"></span> Thêm vào danh sách
            </button>
        </div>

        <div class="mb-4 flex items-center justify-between text-sm">
            <span class="font-medium text-gray-700">Tổng số: <span id="totalProductsCount" class="text-[#6B0D18] font-bold">0</span> sản phẩm sẽ được kiểm kê</span>
            <button type="button" onclick="resetList()" class="text-red-500 hover:underline">Xóa tất cả</button>
        </div>

        <!-- Bảng chi tiết -->
        <div class="overflow-x-auto border border-gray-200 rounded-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                        <th class="py-3 px-4 font-semibold w-12 text-center">STT</th>
                        <th class="py-3 px-4 font-semibold">Hình Ảnh & Sản phẩm</th>
                        <th class="py-3 px-4 font-semibold text-center w-32">Mã / SKU</th>
                        <th class="py-3 px-4 font-semibold text-center w-32">Tồn HT</th>
                        <th class="py-3 px-4 font-semibold text-center w-48">Ghi chú thêm (Tùy chọn)</th>
                        <th class="py-3 px-4 font-semibold text-center w-16">Xóa</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="divide-y divide-gray-100">
                    <!-- JS render here -->
                    <tr id="emptyRow">
                        <td colspan="6" class="py-12 text-center text-gray-500 text-sm bg-gray-50/30">
                            <span class="iconify text-5xl text-gray-300 mx-auto mb-3" data-icon="mdi:package-variant"></span>
                            <p class="font-medium text-gray-600 mb-1">Chưa có sản phẩm nào được chọn</p>
                            <p class="text-xs text-gray-400">Vui lòng chọn sản phẩm hoặc bấm "Thêm toàn bộ Kho"</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
