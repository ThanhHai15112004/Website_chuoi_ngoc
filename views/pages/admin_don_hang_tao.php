<?php
// views/pages/admin_don_hang_tao.php
?>
<div class="max-w-full mx-auto pb-10" id="pos-app">
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/don-hang" class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <h1 class="text-xl font-bold text-gray-900 tracking-tight">Tạo đơn hàng mới (POS)</h1>
                <p class="text-gray-500 text-sm">Điểm bán hàng / Tạo đơn thủ công</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2" onclick="window.location.reload()">
                <span class="iconify text-lg" data-icon="mdi:refresh"></span> Làm mới
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <!-- CỘT TRÁI: Sản phẩm & Giỏ hàng (8/12) -->
        <div class="lg:col-span-8 flex flex-col gap-6">
            <!-- Ô Tìm kiếm sản phẩm -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 relative z-20">
                <div class="relative">
                    <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl" data-icon="mdi:magnify"></span>
                    <input type="text" id="search-product" placeholder="Tìm kiếm sản phẩm (Tên, Mã SKU)..." class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm" autocomplete="off">
                    
                    <!-- Kết quả tìm kiếm SP -->
                    <div id="product-results" class="absolute left-0 right-0 top-full mt-2 bg-white border border-gray-100 rounded-xl shadow-xl overflow-hidden hidden max-h-80 overflow-y-auto">
                        <!-- Render via JS -->
                    </div>
                </div>
            </div>

            <!-- Bảng Giỏ hàng -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex-1">
                <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                    <h2 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:cart-outline"></span> Giỏ hàng
                    </h2>
                    <span class="text-sm text-gray-500" id="cart-count">0 sản phẩm</span>
                </div>
                
                <div class="min-h-[300px]">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-white border-b border-gray-100 text-gray-500 uppercase tracking-wider font-semibold text-xs">
                            <tr>
                                <th class="p-4 w-12 text-center">#</th>
                                <th class="p-4">Sản phẩm</th>
                                <th class="p-4 text-right w-32">Đơn giá</th>
                                <th class="p-4 text-center w-36">Số lượng</th>
                                <th class="p-4 text-right w-32">Thành tiền</th>
                                <th class="p-4 w-12"></th>
                            </tr>
                        </thead>
                        <tbody id="cart-items" class="divide-y divide-gray-50">
                            <tr>
                                <td colspan="6" class="p-12 text-center text-gray-400">
                                    <div class="flex flex-col items-center justify-center">
                                        <span class="iconify text-4xl mb-2" data-icon="mdi:cart-remove"></span>
                                        <p>Giỏ hàng đang trống</p>
                                        <p class="text-xs mt-1">Vui lòng tìm kiếm và thêm sản phẩm</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- CỘT PHẢI: Khách hàng & Thanh toán (4/12) -->
        <div class="lg:col-span-4 flex flex-col gap-6 sticky top-6 z-10">
            <!-- Thông tin khách hàng -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h2 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="iconify text-blue-600" data-icon="mdi:account-circle-outline"></span> Khách hàng
                    </h2>
                    <button type="button" onclick="openAddCustomerModal()" class="text-sm text-[#6B0D18] hover:underline font-medium flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:plus"></span> Thêm mới
                    </button>
                </div>
                <div class="p-5">
                    <!-- Search Khách hàng -->
                    <div class="relative mb-4" id="customer-search-box">
                        <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" data-icon="mdi:magnify"></span>
                        <input type="text" id="search-customer" placeholder="Tìm tên hoặc SĐT..." class="w-full pl-9 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm" autocomplete="off">
                        
                        <!-- Kết quả tìm kiếm KH -->
                        <div id="customer-results" class="absolute left-0 right-0 top-full mt-1 bg-white border border-gray-100 rounded-lg shadow-xl overflow-hidden hidden max-h-60 overflow-y-auto z-30">
                            <!-- Render via JS -->
                        </div>
                    </div>

                    <!-- Khách hàng đã chọn -->
                    <div id="selected-customer" class="hidden bg-blue-50/50 border border-blue-100 rounded-xl p-4 relative">
                        <button type="button" onclick="removeCustomer()" class="absolute top-2 right-2 text-gray-400 hover:text-red-500 transition-colors p-1">
                            <span class="iconify" data-icon="mdi:close"></span>
                        </button>
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                                <span class="iconify text-xl" data-icon="mdi:account"></span>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900" id="cus-name">Nguyễn Văn A</div>
                                <div class="text-xs text-gray-500" id="cus-phone">0901234567</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mt-3 pt-3 border-t border-blue-100/50">
                            <div>
                                <div class="text-[10px] text-gray-500 uppercase font-semibold">Hạng thành viên</div>
                                <div class="text-xs font-medium text-gray-900 mt-0.5" id="cus-rank">Thành viên</div>
                            </div>
                            <div>
                                <div class="text-[10px] text-gray-500 uppercase font-semibold">Điểm tích lũy</div>
                                <div class="text-xs font-medium text-blue-600 mt-0.5" id="cus-points">0</div>
                            </div>
                        </div>
                        <!-- Ẩn id khach hang -->
                        <input type="hidden" id="id_khach_hang" value="">
                        <input type="hidden" id="phan_tram_giam_rank" value="0">
                    </div>
                </div>
            </div>

            <!-- Thanh toán -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="iconify text-emerald-600" data-icon="mdi:cash-register"></span> Thanh toán
                    </h2>
                </div>
                <div class="p-5 flex flex-col gap-4">
                    
                    <!-- Thông tin giao hàng -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1.5">Địa chỉ giao hàng (Tùy chọn)</label>
                        <textarea id="dia_chi_giao_hang" rows="2" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-emerald-500 text-sm" placeholder="Nhập địa chỉ..."></textarea>
                    </div>

                    <!-- Ghi chú -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1.5">Ghi chú đơn hàng</label>
                        <input type="text" id="ghi_chu" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-emerald-500 text-sm" placeholder="Ghi chú...">
                    </div>

                    <div class="h-px bg-gray-100 my-1"></div>

                    <!-- Voucher -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1.5">Mã giảm giá / Voucher</label>
                        <div class="flex gap-2">
                            <input type="text" id="ma_voucher_input" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-emerald-500 text-sm uppercase" placeholder="Nhập mã...">
                            <button type="button" onclick="applyVoucher()" class="px-4 py-2 bg-gray-800 text-white rounded-lg text-sm font-medium hover:bg-gray-900 transition-colors shrink-0">Áp dụng</button>
                        </div>
                        <input type="hidden" id="applied_voucher_id" value="">
                        <input type="hidden" id="applied_voucher_code" value="">
                        <input type="hidden" id="applied_voucher_discount" value="0">
                        <div id="voucher-msg" class="text-xs mt-1 hidden"></div>
                    </div>

                    <div class="h-px bg-gray-100 my-1"></div>

                    <!-- Tính toán -->
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">Tổng tiền hàng:</span>
                        <span class="font-medium text-gray-900" id="summary-subtotal">0đ</span>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">Chiết khấu (<span id="discount-percent">0</span>%):</span>
                        <span class="font-medium text-red-500" id="summary-discount">-0đ</span>
                    </div>
                    
                    <!-- Phương thức vận chuyển -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1.5">Phương thức vận chuyển</label>
                        <select id="phuong_thuc_van_chuyen" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-emerald-500 text-sm" onchange="onShippingChange()">
                            <option value="" data-fee="0">-- Không giao (Nhận tại cửa hàng) --</option>
                            <?php
                            $active_ships = array_filter($shipping_methods, fn($s) => $s['trang_thai'] == 1);
                            foreach($active_ships as $sm): ?>
                            <option value="<?= $sm['id'] ?>" data-fee="<?= $sm['phi_mac_dinh'] ?>">
                                <?= htmlspecialchars($sm['ten']) ?> (<?= $sm['phi_mac_dinh'] == 0 ? 'Miễn phí' : number_format($sm['phi_mac_dinh'],0,',','.') . 'đ' ?>)
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">Phí giao hàng:</span>
                        <span class="font-medium text-gray-900" id="summary-shipping">0đ</span>
                        <input type="hidden" id="phi_van_chuyen" value="0">
                    </div>

                    <div class="h-px bg-gray-100 my-1"></div>

                    <div class="flex items-end justify-between">
                        <span class="font-bold text-gray-800">Khách phải trả:</span>
                        <span class="text-xl font-bold text-[#6B0D18]" id="summary-total">0đ</span>
                    </div>

                    <!-- Phương thức thanh toán -->
                    <div class="mt-2">
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-2">Phương thức thanh toán</label>
                        <div class="grid grid-cols-2 gap-2">
                            <?php
                            $active_payments = array_filter($payments, fn($p) => $p['trang_thai'] == 1);
                            $first = true;
                            foreach($active_payments as $pay): 
                                $iconMap = ['mdi:cash' => 'mdi:cash', 'mdi:bank-transfer' => 'mdi:bank-transfer', 'mdi:qrcode' => 'mdi:qrcode', 'mdi:wallet' => 'mdi:wallet'];
                                $icon = $pay['icon'] ?? 'mdi:wallet';
                            ?>
                            <label class="flex items-center gap-2 p-2.5 border <?= $first ? 'border-emerald-500 bg-emerald-50' : 'border-gray-200 bg-white hover:bg-gray-50' ?> rounded-lg cursor-pointer transition-colors relative payment-method-label">
                                <input type="radio" name="pt_thanh_toan" value="<?= htmlspecialchars($pay['ten']) ?>" class="hidden" <?= $first ? 'checked' : '' ?> onchange="updatePaymentUI(this)">
                                <span class="iconify text-xl <?= $first ? 'text-emerald-600' : 'text-gray-600' ?>" data-icon="<?= htmlspecialchars($icon) ?>"></span>
                                <span class="text-sm font-medium <?= $first ? 'text-emerald-800' : 'text-gray-700' ?>"><?= htmlspecialchars($pay['ten']) ?></span>
                                <div class="absolute inset-0 border-2 border-emerald-500 rounded-lg pointer-events-none hidden check-ring"></div>
                            </label>
                            <?php $first = false; endforeach; ?>
                        </div>
                    </div>

                    <label class="flex items-center gap-2 mt-1 cursor-pointer">
                        <input type="checkbox" id="da_thu_tien" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                        <span class="text-sm font-medium text-gray-700">Đã thu tiền & Hoàn thành đơn</span>
                    </label>

                    <button type="button" onclick="submitOrder()" id="btn-submit-order" class="w-full py-3.5 bg-[#6B0D18] text-white rounded-xl font-bold hover:bg-[#590a13] transition-colors shadow-sm flex items-center justify-center gap-2 mt-2">
                        <span class="iconify text-xl" data-icon="mdi:check-circle-outline"></span>
                        Tạo Đơn Hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Thêm Khách Hàng Nhanh -->
<div id="addCustomerModal" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-[100] hidden flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md scale-95 transition-transform duration-300 flex flex-col max-h-[90vh]">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between shrink-0">
            <h3 class="font-bold text-lg text-gray-900">Thêm khách hàng nhanh</h3>
            <button onclick="closeAddCustomerModal()" class="text-gray-400 hover:text-gray-600 transition-colors p-1 rounded-lg hover:bg-gray-100">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-5 overflow-y-auto">
            <form id="fastAddCustomerForm" class="flex flex-col gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Họ tên <span class="text-red-500">*</span></label>
                    <input type="text" id="fast_ho_ten" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:bg-white transition-colors" placeholder="Nguyễn Văn A">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại <span class="text-red-500">*</span></label>
                    <input type="tel" id="fast_sdt" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:bg-white transition-colors" placeholder="0987654321">
                </div>
            </form>
        </div>
        <div class="p-5 border-t border-gray-100 bg-gray-50/50 rounded-b-2xl flex justify-end gap-3 shrink-0">
            <button onclick="closeAddCustomerModal()" class="px-4 py-2 text-gray-600 bg-white border border-gray-200 rounded-xl font-medium hover:bg-gray-50 transition-colors">Hủy</button>
            <button onclick="submitFastAddCustomer()" class="px-6 py-2 bg-[#6B0D18] text-white rounded-xl font-medium hover:bg-[#590a13] transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:content-save"></span> Lưu khách hàng
            </button>
        </div>
    </div>
</div>

<style>
/* CSS cho Payment Method Radio */
.payment-method-label input:checked ~ .check-ring {
    display: block;
}
</style>

<?php include __DIR__ . '/../components/Admin/don_hang/tao_scripts.php'; ?>
