<?php
// views/components/Admin/xuat_kho/form/form_products.php
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:package-variant"></span>
            Danh sách sản phẩm xuất
        </h3>
        <div class="flex items-center gap-3">
            <button type="button" class="px-3 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:barcode-scan"></span> Quét mã
            </button>
            <button type="button" onclick="openAddProductModal()" class="px-3 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:plus"></span> Thêm sản phẩm
            </button>
        </div>
    </div>
    
    <!-- Bảng sản phẩm -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[1000px]">
            <thead>
                <tr class="bg-gray-50 border-y border-gray-100 text-xs uppercase tracking-wider text-gray-500">
                    <th class="py-3 px-4 font-semibold w-72">Sản phẩm & Biến thể</th>
                    <th class="py-3 px-4 font-semibold w-40">Vị trí lấy hàng</th>
                    <th class="py-3 px-4 font-semibold text-center w-24">Tồn kho</th>
                    <th class="py-3 px-4 font-semibold text-center w-32">Cần xuất</th>
                    <th class="py-3 px-4 font-semibold text-center w-32">Thực xuất</th>
                    <th class="py-3 px-4 font-semibold text-right w-32">Giá trị</th>
                    <th class="py-3 px-4 font-semibold text-center w-20">Trạng thái</th>
                    <th class="py-3 px-4 font-semibold w-16"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100" id="sanPhamTableBody">
                
                <!-- Dòng mẫu 1: Đủ hàng -->
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="py-3 px-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded bg-gray-100 border border-gray-200 flex-shrink-0"></div>
                            <div class="flex-1 min-w-0">
                                <div class="font-bold text-gray-900 text-sm truncate">Vòng Ngọc Bích Tài Lộc</div>
                                <div class="text-xs text-gray-500 mt-0.5">SKU: NB-TL-16 · Size 16cm</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <select class="w-full px-2 py-1.5 bg-white border border-gray-300 rounded text-sm text-gray-700 focus:outline-none">
                            <option>Khu A / Kệ A1</option>
                        </select>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <span class="font-bold text-gray-900">25</span>
                    </td>
                    <td class="py-3 px-4">
                        <div class="relative flex items-center max-w-[100px] mx-auto">
                            <input type="number" value="2" oninput="updateXuatKhoRowStatus(this)" class="row-can-xuat w-full text-center font-bold px-2 py-1.5 bg-white border border-gray-300 rounded text-sm focus:outline-none focus:border-[#6B0D18]">
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <div class="relative flex items-center max-w-[100px] mx-auto">
                            <input type="number" value="2" oninput="updateXuatKhoRowStatus(this)" class="row-thuc-xuat w-full text-center font-bold text-[#6B0D18] px-2 py-1.5 bg-red-50 border border-red-200 rounded text-sm focus:outline-none focus:border-[#6B0D18]">
                        </div>
                        <div class="row-warning text-[10px] text-center text-rose-600 mt-1 font-medium hidden">Thiếu <span class="row-missing-qty"></span></div>
                    </td>
                    <td class="py-3 px-4 text-right">
                        <span class="font-bold text-[#6B0D18] text-sm" data-price="1200000">2.400.000đ</span>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <span class="row-status inline-flex items-center justify-center p-1 rounded-full bg-emerald-50 text-emerald-600 tooltip" title="Đủ hàng">
                            <span class="row-status-icon iconify text-lg" data-icon="mdi:check-circle"></span>
                        </span>
                    </td>
                    <td class="py-3 px-4 text-right">
                        <button type="button" class="p-1.5 text-gray-400 hover:text-rose-600 rounded transition-colors focus:outline-none">
                            <span class="iconify text-lg" data-icon="mdi:trash-can-outline"></span>
                        </button>
                    </td>
                </tr>

                <!-- Dòng mẫu 2: Thiếu hàng -->
                <tr class="hover:bg-gray-50/50 transition-colors bg-rose-50/30">
                    <td class="py-3 px-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded bg-gray-100 border border-gray-200 flex-shrink-0"></div>
                            <div class="flex-1 min-w-0">
                                <div class="font-bold text-gray-900 text-sm truncate">Nhẫn ngọc trai đính kim cương</div>
                                <div class="text-xs text-gray-500 mt-0.5">SKU: NT-002</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <select class="w-full px-2 py-1.5 bg-white border border-rose-300 rounded text-sm text-gray-700 focus:outline-none">
                            <option>Kho tổng</option>
                        </select>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <span class="font-bold text-rose-600">1</span>
                    </td>
                    <td class="py-3 px-4">
                        <div class="relative flex items-center max-w-[100px] mx-auto">
                            <input type="number" value="3" oninput="updateXuatKhoRowStatus(this)" class="row-can-xuat w-full text-center font-bold px-2 py-1.5 bg-white border border-gray-300 rounded text-sm focus:outline-none focus:border-[#6B0D18]">
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <div class="relative flex items-center max-w-[100px] mx-auto">
                            <input type="number" value="1" oninput="updateXuatKhoRowStatus(this)" class="row-thuc-xuat w-full text-center font-bold text-rose-600 px-2 py-1.5 bg-white border border-rose-300 rounded text-sm focus:outline-none">
                        </div>
                        <div class="row-warning text-[10px] text-center text-rose-600 mt-1 font-medium">Thiếu <span class="row-missing-qty">2</span></div>
                    </td>
                    <td class="py-3 px-4 text-right">
                        <span class="font-bold text-[#6B0D18] text-sm" data-price="3500000">3.500.000đ</span>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <span class="row-status inline-flex items-center justify-center p-1 rounded-full bg-rose-100 text-rose-600 tooltip" title="Thiếu hàng so với yêu cầu">
                            <span class="row-status-icon iconify text-lg" data-icon="mdi:alert-circle"></span>
                        </span>
                    </td>
                    <td class="py-3 px-4 text-right">
                        <button type="button" class="p-1.5 text-gray-400 hover:text-rose-600 rounded transition-colors focus:outline-none">
                            <span class="iconify text-lg" data-icon="mdi:trash-can-outline"></span>
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    
    <!-- Search rỗng ở cuối bảng -->
    <div class="p-4 border-t border-gray-100 bg-gray-50/50">
        <div class="relative w-full max-w-md mx-auto">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="iconify text-[#6B0D18] text-lg" data-icon="mdi:magnify"></span>
            </div>
            <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700 bg-white" placeholder="Tìm kiếm và thêm sản phẩm...">
        </div>
    </div>
</div>

<script>
    function updateXuatKhoRowStatus(element) {
        const tr = element.closest('tr');
        if (!tr) return;

        const canXuatInput = tr.querySelector('.row-can-xuat');
        const thucXuatInput = tr.querySelector('.row-thuc-xuat');
        
        const canXuat = parseFloat(canXuatInput.value) || 0;
        const thucXuat = parseFloat(thucXuatInput.value) || 0;
        
        const statusSpan = tr.querySelector('.row-status');
        const statusIcon = tr.querySelector('.row-status-icon');
        const warningDiv = tr.querySelector('.row-warning');
        const missingQtySpan = tr.querySelector('.row-missing-qty');
        
        if (thucXuat >= canXuat) {
            // Đủ hàng
            tr.classList.remove('bg-rose-50/30');
            thucXuatInput.classList.remove('text-rose-600', 'bg-white', 'border-rose-300');
            thucXuatInput.classList.add('text-[#6B0D18]', 'bg-red-50', 'border-red-200');
            
            warningDiv.classList.add('hidden');
            
            statusSpan.className = 'row-status inline-flex items-center justify-center p-1 rounded-full bg-emerald-50 text-emerald-600 tooltip';
            statusSpan.title = 'Đủ hàng';
            statusIcon.setAttribute('data-icon', 'mdi:check-circle');
            
        } else {
            // Thiếu hàng
            tr.classList.add('bg-rose-50/30');
            thucXuatInput.classList.remove('text-[#6B0D18]', 'bg-red-50', 'border-red-200');
            thucXuatInput.classList.add('text-rose-600', 'bg-white', 'border-rose-300');
            
            warningDiv.classList.remove('hidden');
            missingQtySpan.innerText = canXuat - thucXuat;
            
            statusSpan.className = 'row-status inline-flex items-center justify-center p-1 rounded-full bg-rose-100 text-rose-600 tooltip';
            statusSpan.title = 'Thiếu hàng so với yêu cầu';
            statusIcon.setAttribute('data-icon', 'mdi:alert-circle');
        }

        // Cập nhật giá trị
        const priceSpan = tr.querySelector('td.text-right span[data-price]');
        if (priceSpan) {
            const price = parseFloat(priceSpan.getAttribute('data-price')) || 0;
            priceSpan.innerText = (thucXuat * price).toLocaleString('vi-VN') + 'đ';
        }

        updateXuatKhoSummary();
    }

    function updateXuatKhoSummary() {
        const tbody = document.getElementById('sanPhamTableBody');
        if (!tbody) return;

        const rows = tbody.querySelectorAll('tr');
        let totalCanXuat = 0;
        let totalThucXuat = 0;
        let grandTotal = 0;
        let totalMissing = 0;
        let totalProducts = 0;

        rows.forEach(tr => {
            const canXuat = parseFloat(tr.querySelector('.row-can-xuat')?.value) || 0;
            const thucXuat = parseFloat(tr.querySelector('.row-thuc-xuat')?.value) || 0;
            const price = parseFloat(tr.querySelector('td.text-right span[data-price]')?.getAttribute('data-price')) || 0;
            
            if (canXuat > 0 || thucXuat > 0) totalProducts++;
            totalCanXuat += canXuat;
            totalThucXuat += thucXuat;
            grandTotal += (thucXuat * price);
            
            if (thucXuat < canXuat) {
                totalMissing += (canXuat - thucXuat);
            }
        });

        // Cập nhật các element trong form_summary.php
        const summaryTotalProducts = document.getElementById('summary-total-products');
        const summaryTotalCanXuat = document.getElementById('summary-total-can-xuat');
        const summaryTotalThucXuat = document.getElementById('summary-total-thuc-xuat');
        const summaryGrandTotal = document.getElementById('summary-grand-total');
        const summaryWarningBox = document.getElementById('summary-warning-box');
        const summaryMissingQty = document.getElementById('summary-missing-qty');

        if (summaryTotalProducts) summaryTotalProducts.innerText = totalProducts;
        if (summaryTotalCanXuat) summaryTotalCanXuat.innerText = totalCanXuat + ' món';
        if (summaryTotalThucXuat) summaryTotalThucXuat.innerText = totalThucXuat + ' món';
        if (summaryGrandTotal) summaryGrandTotal.innerText = grandTotal.toLocaleString('vi-VN') + 'đ';

        if (summaryWarningBox) {
            if (totalMissing > 0) {
                summaryWarningBox.classList.remove('hidden');
                summaryMissingQty.innerText = totalMissing + ' món';
            } else {
                summaryWarningBox.classList.add('hidden');
            }
        }
    }
</script>
