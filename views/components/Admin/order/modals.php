<!-- Confirm Modal (Xác nhận đơn) -->
<div id="confirmModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-3xl shadow-2xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-sm">
            <span class="iconify text-3xl text-[#6B0D18]" data-icon="mdi:check-decagram-outline"></span>
        </div>
        <h3 class="font-bold text-xl text-gray-900 mb-2">Xác nhận đơn hàng</h3>
        <p class="text-sm text-gray-500 mb-4">Xác nhận đơn <strong class="text-[#6B0D18]" id="cmOrderCode"></strong> của khách <strong class="text-gray-800" id="cmCustomer"></strong>?</p>
        
        <div class="bg-amber-50 border border-amber-100 rounded-xl p-3 text-sm text-amber-800 text-left mb-4 flex items-start gap-2">
            <span class="iconify text-amber-600 text-lg shrink-0 mt-0.5" data-icon="mdi:information-outline"></span>
            Vui lòng kiểm tra tồn kho sản phẩm và thông tin giao hàng trước khi xác nhận.
        </div>
        
        <label class="flex items-center gap-2 cursor-pointer bg-gray-50 p-3 rounded-xl border border-gray-200">
            <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] w-4 h-4">
            <span class="text-sm text-gray-700 font-medium">Gửi thông báo (Email/SMS) cho khách hàng</span>
        </label>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('confirmModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
        <button onclick="submitAction('confirmModal', 'Đã xác nhận đơn hàng thành công!')" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận đơn</button>
    </div>
</div>

<!-- Shipping Modal (Chuyển Đang Giao) -->
<div id="shippingModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-3xl shadow-2xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 shrink-0">
                <span class="iconify text-2xl" data-icon="mdi:truck-fast-outline"></span>
            </div>
            <div>
                <h3 class="font-bold text-lg text-gray-900">Giao cho vận chuyển</h3>
                <p class="text-xs text-gray-500">Đơn hàng <strong id="smOrderCode"></strong></p>
            </div>
        </div>
        
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Đơn vị vận chuyển</label>
                <select class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 text-sm">
                    <option>Giao Hàng Nhanh (GHN)</option>
                    <option>Giao Hàng Tiết Kiệm (GHTK)</option>
                    <option>Viettel Post</option>
                    <option>AhaMove (Hỏa tốc)</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Mã vận đơn <span class="text-red-500">*</span></label>
                <input type="text" placeholder="VD: GHN123456789" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all text-sm font-mono">
            </div>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" checked class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 w-4 h-4">
                <span class="text-sm text-gray-700">Gửi mã vận đơn cho khách theo dõi</span>
            </label>
        </div>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('shippingModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
        <button onclick="submitAction('shippingModal', 'Đã chuyển sang trạng thái Đang giao!')" class="px-5 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 font-medium text-sm transition-colors flex-1 shadow-sm">Cập nhật Đang giao</button>
    </div>
</div>

<!-- Delivered Modal (Đã giao) -->
<div id="deliveredModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-3xl shadow-2xl w-full max-w-sm hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-8 text-center">
        <div class="w-16 h-16 bg-purple-50 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-sm">
            <span class="iconify text-3xl text-purple-600" data-icon="mdi:package-check"></span>
        </div>
        <h3 class="font-bold text-xl text-gray-900 mb-2">Đánh dấu đã giao hàng?</h3>
        <p class="text-sm text-gray-500">Xác nhận đơn hàng <strong class="text-gray-800" id="dmOrderCode"></strong> đã được giao thành công đến tay người nhận.</p>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('deliveredModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
        <button onclick="submitAction('deliveredModal', 'Đã đánh dấu Đã giao hàng!')" class="px-5 py-2.5 bg-purple-600 text-white rounded-xl hover:bg-purple-700 font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận</button>
    </div>
</div>

<!-- Success Modal (Hoàn tất / Thành công) -->
<div id="successModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-3xl shadow-2xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-sm">
            <span class="iconify text-3xl text-emerald-500" data-icon="mdi:check-decagram"></span>
        </div>
        <h3 class="font-bold text-xl text-gray-900 mb-2">Hoàn tất đơn hàng</h3>
        <p class="text-sm text-gray-500 mb-4">Đơn hàng <strong class="text-gray-800" id="smcOrderCode"></strong> sẽ được tính vào doanh thu thành công.</p>
        
        <label class="flex items-center gap-2 cursor-pointer bg-emerald-50/50 p-3 rounded-xl border border-emerald-100">
            <input type="checkbox" checked class="rounded border-emerald-500 text-emerald-600 focus:ring-emerald-500 w-4 h-4">
            <span class="text-sm text-emerald-800 font-medium">Gửi email cảm ơn và mời đánh giá sản phẩm</span>
        </label>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('successModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
        <button onclick="submitAction('successModal', 'Đơn hàng đã hoàn tất thành công!')" class="px-5 py-2.5 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận thành công</button>
    </div>
</div>

<!-- Cancel Modal (Hủy đơn) -->
<div id="cancelModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-3xl shadow-2xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-sm">
            <span class="iconify text-3xl text-red-600" data-icon="mdi:close-octagon-outline"></span>
        </div>
        <h3 class="font-bold text-xl text-gray-900 mb-2">Hủy đơn hàng</h3>
        <p class="text-sm text-gray-500 mb-4">Vui lòng chọn lý do hủy đơn hàng <strong class="text-gray-800" id="cmCancelOrderCode"></strong>.</p>
        
        <div class="text-left space-y-3 mb-4">
            <label class="flex items-center gap-2 cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-200">
                <input type="radio" name="cancelReason" checked class="text-red-600 focus:ring-red-500 w-4 h-4">
                <span class="text-sm text-gray-700">Khách yêu cầu hủy</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-200">
                <input type="radio" name="cancelReason" class="text-red-600 focus:ring-red-500 w-4 h-4">
                <span class="text-sm text-gray-700">Không liên hệ được khách</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-200">
                <input type="radio" name="cancelReason" class="text-red-600 focus:ring-red-500 w-4 h-4">
                <span class="text-sm text-gray-700">Sản phẩm hết hàng</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer p-2 hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-200">
                <input type="radio" name="cancelReason" class="text-red-600 focus:ring-red-500 w-4 h-4">
                <span class="text-sm text-gray-700">Lý do khác...</span>
            </label>
        </div>
        
        <label class="flex items-center gap-2 cursor-pointer bg-gray-50 p-3 rounded-xl border border-gray-200 text-left">
            <input type="checkbox" checked class="rounded border-red-300 text-red-600 focus:ring-red-500 w-4 h-4">
            <span class="text-sm text-gray-700 font-medium">Hoàn lại số lượng tồn kho</span>
        </label>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('cancelModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Không hủy</button>
        <button onclick="submitAction('cancelModal', 'Đã hủy đơn hàng!')" class="px-5 py-2.5 bg-red-600 text-white rounded-xl hover:bg-red-700 font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận hủy đơn</button>
    </div>
</div>

<!-- Print Invoice Modal (Giả lập) -->
<div id="printModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm" onclick="closeModal('printModal')"></div>
    <div class="bg-gray-100 rounded-2xl shadow-2xl w-full max-w-3xl mx-4 relative z-10 scale-95 transition-transform duration-300 flex flex-col max-h-[90vh] overflow-hidden border border-gray-300">
        <!-- Toolbar Máy in -->
        <div class="px-4 py-3 bg-gray-800 text-white flex items-center justify-between shrink-0">
            <div class="flex items-center gap-3">
                <span class="iconify text-xl text-gray-400" data-icon="mdi:printer"></span>
                <span class="font-medium text-sm">Xem trước bản in hóa đơn</span>
            </div>
            <div class="flex items-center gap-2">
                <button onclick="showToast('Đang kết nối máy in...'); setTimeout(() => closeModal('printModal'), 1000);" class="px-4 py-1.5 bg-blue-600 hover:bg-blue-500 rounded text-sm font-bold shadow transition-colors">
                    In ngay
                </button>
                <button onclick="closeModal('printModal')" class="px-3 py-1.5 bg-gray-700 hover:bg-gray-600 rounded text-sm font-medium transition-colors">
                    Đóng
                </button>
            </div>
        </div>
        
        <!-- Khổ giấy A5/A4 -->
        <div class="flex-1 overflow-auto p-8 flex justify-center bg-gray-300 print-bg">
            <div class="bg-white w-[500px] min-h-[600px] shadow-lg p-8 relative print-paper font-serif text-black">
                <!-- Nội dung hóa đơn giả lập -->
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold uppercase tracking-widest border-b-2 border-black pb-2 inline-block">Chuỗi Ngọc Phong Thủy</h1>
                    <p class="text-xs mt-2 italic">Mang tài lộc, vượng bình an</p>
                    <p class="text-xs">Đ/c: Phố Ngọc Trai, TP. Phong Thủy - SĐT: 0909.123.456</p>
                </div>
                
                <h2 class="text-xl font-bold text-center uppercase mb-6">Phiếu Giao Hàng & Hóa Đơn</h2>
                
                <div class="flex justify-between text-sm mb-6">
                    <div>
                        <p><strong>Mã đơn:</strong> <span id="pmOrderCode">DH202600123</span></p>
                        <p><strong>Ngày đặt:</strong> 17/05/2026 20:35</p>
                    </div>
                    <div class="text-right border border-black p-2 rounded">
                        <p class="text-xs mb-1">Mã vận đơn:</p>
                        <p class="font-bold font-mono tracking-widest text-lg">GHN-12345</p>
                    </div>
                </div>

                <div class="border-t border-b border-dashed border-gray-400 py-4 mb-6 text-sm">
                    <p><strong>Khách hàng:</strong> Nguyễn Văn An</p>
                    <p><strong>Điện thoại:</strong> 0901234567</p>
                    <p><strong>Địa chỉ:</strong> 123 Đường Ngọc Trai, Phường Đá Quý, Quận Cẩm Thạch, TP. Phong Thủy</p>
                </div>

                <table class="w-full text-sm mb-6 text-left">
                    <thead class="border-b-2 border-black">
                        <tr>
                            <th class="py-2">Sản phẩm</th>
                            <th class="py-2 text-center w-12">SL</th>
                            <th class="py-2 text-right w-24">Đơn giá</th>
                            <th class="py-2 text-right w-24">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody class="border-b border-black">
                        <tr>
                            <td class="py-2 pr-2">Vòng Ngọc Bích Tài Lộc (16cm)</td>
                            <td class="py-2 text-center">1</td>
                            <td class="py-2 text-right">1.360.000</td>
                            <td class="py-2 text-right">1.360.000</td>
                        </tr>
                    </tbody>
                    <tfoot class="font-bold">
                        <tr>
                            <td colspan="3" class="py-2 text-right">Tổng cộng:</td>
                            <td class="py-2 text-right text-lg">1.360.000đ</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="py-1 text-right font-normal">Hình thức thanh toán:</td>
                            <td class="py-1 text-right font-normal">Thanh toán COD</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="py-1 text-right font-bold uppercase text-red-600">Tiền cần thu (COD):</td>
                            <td class="py-1 text-right font-bold text-xl border-t border-black">1.360.000đ</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="text-center text-sm mt-12 italic text-gray-600">
                    <p>Cảm ơn quý khách đã mua sắm tại Chuỗi Ngọc Phong Thủy!</p>
                    <p>Hỗ trợ bảo hành/đổi trả: 0909.123.456</p>
                </div>
                
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-[10px] text-gray-400">
                    Trang 1/1
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-6 right-6 z-[9999] flex flex-col gap-3"></div>
