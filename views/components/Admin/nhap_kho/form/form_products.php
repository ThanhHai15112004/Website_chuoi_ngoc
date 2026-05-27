<?php
// views/components/Admin/nhap_kho/form/form_products.php
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
    
    <!-- Header của Danh sách sản phẩm -->
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-gray-500" data-icon="mdi:format-list-checks"></span>
            Danh sách sản phẩm nhập
        </h3>
        <div class="flex items-center gap-3">
            <div class="relative w-full md:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="iconify text-gray-400" data-icon="mdi:magnify"></span>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-1.5 border border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm" placeholder="Tìm sản phẩm (Tên, SKU)...">
            </div>
            <button type="button" onclick="openAddProductModal()" class="px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center gap-2 shadow-sm whitespace-nowrap transition-colors">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:plus-box-outline"></span> Sản phẩm mới
            </button>
        </div>
    </div>

    <!-- Bảng nhập sản phẩm -->
    <div class="overflow-x-auto w-full">
        <table class="w-full text-left border-collapse min-w-[1200px]">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase text-gray-500 tracking-wider">
                    <th class="py-3 px-4 font-semibold w-10 text-center">#</th>
                    <th class="py-3 px-4 font-semibold w-80">Sản phẩm & Biến thể</th>
                    <th class="py-3 px-4 font-semibold w-24">Đơn vị</th>
                    <th class="py-3 px-4 font-semibold text-right w-28">SL Dự kiến</th>
                    <th class="py-3 px-4 font-semibold text-right w-36">Giá nhập</th>
                    <th class="py-3 px-4 font-semibold text-right w-36">Chiết khấu</th>
                    <th class="py-3 px-4 font-semibold text-right w-36">Thành tiền</th>
                    <th class="py-3 px-4 font-semibold w-16 text-center">Xóa</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Dòng 1 -->
                <tr class="hover:bg-gray-50 group">
                    <td class="py-3 px-4 text-center text-sm font-medium text-gray-400">1</td>
                    <td class="py-3 px-4">
                        <div class="flex items-start gap-3">
                            <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" class="w-12 h-12 rounded object-cover border border-gray-200" alt="">
                            <div class="flex-1">
                                <div class="font-medium text-gray-900 text-sm">Vòng Ngọc Bích Tài Lộc</div>
                                <div class="text-xs text-gray-500 mt-0.5">SKU: NB-TL-16-8MM</div>
                                <div class="mt-1">
                                    <select class="block w-full py-1 pl-2 pr-8 text-xs border-gray-300 rounded focus:ring-[#6B0D18] focus:border-[#6B0D18]">
                                        <option>Size 16cm · Hạt 8mm</option>
                                        <option>Size 18cm · Hạt 10mm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <select class="block w-full py-1.5 pl-2 pr-6 text-sm border-gray-300 rounded-md focus:ring-[#6B0D18] focus:border-[#6B0D18]">
                            <option>Vòng</option>
                            <option>Cái</option>
                        </select>
                    </td>
                    <td class="py-3 px-4">
                        <input type="number" min="1" value="50" oninput="updateNhapKhoRowTotal(this)" class="row-qty block w-full px-2 py-1.5 text-right border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-semibold">
                    </td>
                    <td class="py-3 px-4">
                        <div class="relative">
                            <input type="text" value="350000" oninput="updateNhapKhoRowTotal(this)" class="row-price block w-full pr-6 py-1.5 text-right border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-semibold">
                            <div class="absolute inset-y-0 right-0 pr-2 flex items-center pointer-events-none text-gray-500 text-xs">đ</div>
                        </div>
                        <div class="text-[10px] text-gray-400 mt-1 text-right">Lần trước: 330,000đ</div>
                    </td>
                    <td class="py-3 px-4">
                        <div class="flex items-center gap-1">
                            <input type="number" value="0" oninput="updateNhapKhoRowTotal(this)" class="row-discount block w-full px-2 py-1.5 text-right border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                            <select onchange="updateNhapKhoRowTotal(this)" class="row-discount-type py-1.5 pl-1 pr-4 text-xs border-gray-300 rounded-md">
                                <option value="vnd">đ</option>
                                <option value="percent">%</option>
                            </select>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-right">
                        <span class="row-total font-bold text-[#6B0D18] text-base">17.500.000đ</span>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <button class="p-1 text-gray-400 hover:text-rose-600 hover:bg-rose-50 rounded transition-colors tooltip" title="Xóa dòng">
                            <span class="iconify text-lg" data-icon="mdi:trash-can-outline"></span>
                        </button>
                    </td>
                </tr>

                <!-- Dòng trống -->
                <tr class="bg-gray-50/50">
                    <td colspan="8" class="py-3 px-4 text-center">
                        <button class="text-sm font-medium text-[#6B0D18] hover:underline flex items-center justify-center gap-1 mx-auto w-full">
                            <span class="iconify text-lg" data-icon="mdi:plus-circle-outline"></span> Thêm dòng mới
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tóm tắt số lượng (Footer of table) -->
    <div class="px-5 py-3 border-t border-gray-200 bg-gray-50 flex justify-end gap-10">
        <div class="text-sm">
            <span class="text-gray-500">Tổng sản phẩm:</span>
            <span id="nk-total-products" class="font-bold text-gray-900 ml-2">1</span>
        </div>
        <div class="text-sm">
            <span class="text-gray-500">Tổng số lượng đặt:</span>
            <span id="nk-total-qty" class="font-bold text-gray-900 ml-2">50 món</span>
        </div>
        <div class="text-sm">
            <span class="text-gray-500">Tổng tiền hàng:</span>
            <span id="nk-grand-total" class="font-bold text-[#6B0D18] ml-2 text-base">17.500.000đ</span>
        </div>
    </div>
</div>

<script>
    function updateNhapKhoRowTotal(element) {
        const tr = element.closest('tr');
        if (!tr) return;
        
        const qty = parseFloat(tr.querySelector('.row-qty').value) || 0;
        const price = parseFloat(tr.querySelector('.row-price').value.replace(/,/g, '')) || 0;
        const discount = parseFloat(tr.querySelector('.row-discount').value) || 0;
        const discountType = tr.querySelector('.row-discount-type').value;
        
        let discountValue = 0;
        if (discountType === 'percent') {
            discountValue = (qty * price) * (discount / 100);
        } else {
            discountValue = discount;
        }
        
        let total = (qty * price) - discountValue;
        if (total < 0) total = 0;
        
        tr.querySelector('.row-total').innerText = total.toLocaleString('vi-VN') + 'đ';
        tr.setAttribute('data-total', total);
        
        updateNhapKhoGrandTotal();
    }

    function updateNhapKhoGrandTotal() {
        const tbody = document.querySelector('#nhapKhoTableBody') || document.querySelector('.divide-y');
        if (!tbody) return;
        
        const rows = tbody.querySelectorAll('tr:not(.bg-gray-50\\/50)'); // Exclude 'Thêm dòng mới'
        let grandTotal = 0;
        let totalQty = 0;
        
        rows.forEach(tr => {
            const qty = parseFloat(tr.querySelector('.row-qty')?.value) || 0;
            const total = parseFloat(tr.getAttribute('data-total')) || 0;
            
            totalQty += qty;
            grandTotal += total;
        });
        
        document.getElementById('nk-total-products').innerText = rows.length;
        document.getElementById('nk-total-qty').innerText = totalQty + ' món';
        document.getElementById('nk-grand-total').innerText = grandTotal.toLocaleString('vi-VN') + 'đ';
    }

    // Initialize on load
    document.addEventListener('DOMContentLoaded', () => {
        const rows = document.querySelectorAll('.divide-y tr:not(.bg-gray-50\\/50)');
        rows.forEach(tr => {
            const el = tr.querySelector('.row-qty');
            if (el) updateNhapKhoRowTotal(el);
        });
    });
</script>

