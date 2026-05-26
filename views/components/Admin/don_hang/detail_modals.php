<!-- Modal Cập nhật Trạng thái -->
<div id="statusModal" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-[100] hidden flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 transform scale-95 transition-transform duration-300" id="statusModalContent">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900">Cập nhật trạng thái đơn hàng</h3>
            <button onclick="closeStatusModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-5 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Trạng thái mới</label>
                <select class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
                    <option value="xac_nhan">Xác nhận đơn hàng</option>
                    <option value="dang_giao">Đang giao</option>
                    <option value="da_giao">Đã giao</option>
                    <option value="thanh_cong">Thành công</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Ghi chú cập nhật</label>
                <textarea placeholder="Nhập ghi chú cho lần cập nhật này..." class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all h-24 resize-none"></textarea>
            </div>
            <label class="flex items-center gap-2 cursor-pointer group">
                <div class="relative flex items-center">
                    <input type="checkbox" class="peer sr-only" checked>
                    <div class="w-5 h-5 bg-white border-2 border-gray-300 rounded peer-checked:bg-[#6B0D18] peer-checked:border-[#6B0D18] transition-colors"></div>
                    <span class="iconify text-white absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0 peer-checked:opacity-100" data-icon="mdi:check"></span>
                </div>
                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Gửi thông báo cập nhật cho khách hàng</span>
            </label>
        </div>
        <div class="p-5 border-t border-gray-100 flex items-center justify-end gap-3 bg-gray-50/50 rounded-b-2xl">
            <button onclick="closeStatusModal()" class="px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors">Hủy bỏ</button>
            <button onclick="submitStatusUpdate()" class="px-5 py-2.5 text-sm font-bold text-white bg-[#6B0D18] hover:bg-[#4C0519] rounded-xl shadow-sm transition-colors flex items-center gap-2">
                <span class="iconify" data-icon="mdi:check"></span> Lưu thay đổi
            </button>
        </div>
    </div>
</div>

<!-- Modal Hủy Đơn -->
<div id="cancelModal" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-[100] hidden flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 transform scale-95 transition-transform duration-300" id="cancelModalContent">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <div class="flex items-center gap-2 text-red-600">
                <span class="iconify text-2xl" data-icon="mdi:alert-circle"></span>
                <h3 class="text-lg font-bold">Hủy đơn hàng</h3>
            </div>
            <button onclick="closeCancelModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-5 space-y-4">
            <p class="text-sm text-gray-600">Bạn có chắc muốn hủy đơn <strong class="text-gray-900">#<?= $don_hang['ma_don'] ?></strong> không? Hành động này không thể hoàn tác trực tiếp.</p>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Lý do hủy <span class="text-red-500">*</span></label>
                <select class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all text-sm">
                    <option value="">-- Chọn lý do --</option>
                    <option value="1">Khách yêu cầu hủy</option>
                    <option value="2">Không liên hệ được khách</option>
                    <option value="3">Sản phẩm hết hàng</option>
                    <option value="4">Lý do khác...</option>
                </select>
            </div>
            
            <label class="flex items-center gap-2 cursor-pointer group">
                <div class="relative flex items-center">
                    <input type="checkbox" class="peer sr-only" checked>
                    <div class="w-5 h-5 bg-white border-2 border-gray-300 rounded peer-checked:bg-[#6B0D18] peer-checked:border-[#6B0D18] transition-colors"></div>
                    <span class="iconify text-white absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0 peer-checked:opacity-100" data-icon="mdi:check"></span>
                </div>
                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Hoàn lại số lượng tồn kho cho các sản phẩm</span>
            </label>
        </div>
        <div class="p-5 border-t border-gray-100 flex items-center justify-end gap-3 bg-red-50/30 rounded-b-2xl">
            <button onclick="closeCancelModal()" class="px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors">Không hủy</button>
            <button onclick="submitCancelOrder()" class="px-5 py-2.5 text-sm font-bold text-white bg-red-600 hover:bg-red-700 rounded-xl shadow-sm transition-colors flex items-center gap-2">
                <span class="iconify" data-icon="mdi:cancel"></span> Xác nhận hủy đơn
            </button>
        </div>
    </div>
</div>

<!-- Form In (Print Mockup) -->
<div id="printModal" class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm z-[100] hidden flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="bg-white shadow-2xl w-full max-w-2xl h-[90vh] flex flex-col mx-4 transform scale-95 transition-transform duration-300" id="printModalContent">
        <div class="p-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center shrink-0">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify" data-icon="mdi:printer"></span> Xem trước bản in</h3>
            <div class="flex gap-2">
                <button onclick="showToast('Đang gửi lệnh in tới máy in mặc định...')" class="px-4 py-2 bg-blue-600 text-white rounded font-medium text-sm hover:bg-blue-700 shadow flex items-center gap-1.5"><span class="iconify" data-icon="mdi:printer"></span> In ngay</button>
                <button onclick="closePrintModal()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded font-medium text-sm hover:bg-gray-100">Đóng</button>
            </div>
        </div>
        
        <div class="flex-1 overflow-auto bg-gray-200 p-8 flex justify-center custom-scrollbar">
            <div class="bg-white w-[210mm] min-h-[297mm] shadow-md p-10 font-sans text-black print-paper relative">
                <div class="absolute inset-0 flex items-center justify-center opacity-[0.03] pointer-events-none">
                    <span class="iconify text-[300px]" data-icon="mdi:gem"></span>
                </div>
                
                <div class="flex justify-between items-start border-b-2 border-black pb-4 mb-6 relative z-10">
                    <div>
                        <h1 class="text-2xl font-black uppercase tracking-wider mb-1">Chuỗi Ngọc Store</h1>
                        <p class="text-sm">123 Đường Phong Thủy, Quận 1, TP.HCM</p>
                        <p class="text-sm">SĐT: 0909 123 456 - Web: chuoingoc.com</p>
                    </div>
                    <div class="text-right">
                        <h2 class="text-xl font-bold uppercase border border-black px-3 py-1 inline-block mb-2">Phiếu Giao Hàng</h2>
                        <p class="text-sm">Mã đơn: <strong class="text-lg"><?= $don_hang['ma_don'] ?></strong></p>
                        <p class="text-sm">Ngày: 17/05/2026</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-8 mb-6 text-sm relative z-10">
                    <div>
                        <h3 class="font-bold underline mb-2">THÔNG TIN NGƯỜI NHẬN:</h3>
                        <p class="mb-1"><strong>Khách hàng:</strong> <?= $don_hang['giao_hang']['nguoi_nhan'] ?></p>
                        <p class="mb-1"><strong>SĐT:</strong> <?= $don_hang['giao_hang']['sdt_nhan'] ?></p>
                        <p class="mb-1"><strong>Địa chỉ:</strong> <?= $don_hang['giao_hang']['dia_chi'] ?></p>
                    </div>
                    <div>
                        <h3 class="font-bold underline mb-2">THÔNG TIN GIAO HÀNG:</h3>
                        <p class="mb-1"><strong>Vận chuyển:</strong> <?= $don_hang['giao_hang']['phuong_thuc'] ?></p>
                        <p class="mb-1"><strong>Mã VĐ:</strong> <?= $don_hang['giao_hang']['ma_van_don'] ?: 'Chưa có' ?></p>
                        <p class="mb-1"><strong>Thanh toán:</strong> COD</p>
                    </div>
                </div>

                <table class="w-full text-sm border-collapse border border-black mb-6 relative z-10">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-black p-2 text-center w-12">STT</th>
                            <th class="border border-black p-2 text-left">Tên sản phẩm</th>
                            <th class="border border-black p-2 text-center w-16">SL</th>
                            <th class="border border-black p-2 text-right w-32">Đơn giá</th>
                            <th class="border border-black p-2 text-right w-32">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($don_hang['san_pham'] as $index => $sp): ?>
                        <tr>
                            <td class="border border-black p-2 text-center"><?= $index + 1 ?></td>
                            <td class="border border-black p-2"><?= $sp['ten'] ?> (<?= $sp['bien_the'] ?>)</td>
                            <td class="border border-black p-2 text-center"><?= $sp['so_luong'] ?></td>
                            <td class="border border-black p-2 text-right"><?= number_format($sp['don_gia'], 0, ',', '.') ?></td>
                            <td class="border border-black p-2 text-right"><?= number_format($sp['thanh_tien'], 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="border border-black p-2 text-right font-bold">Tổng cộng:</td>
                            <td class="border border-black p-2 text-right font-bold"><?= number_format($don_hang['chi_tiet_tien']['tam_tinh'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border border-black p-2 text-right font-bold">Giảm giá (Voucher):</td>
                            <td class="border border-black p-2 text-right"><?= number_format($don_hang['chi_tiet_tien']['giam_gia'] + $don_hang['chi_tiet_tien']['voucher']['tien_giam'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border border-black p-2 text-right font-bold">Phí vận chuyển + Gói quà:</td>
                            <td class="border border-black p-2 text-right"><?= number_format($don_hang['chi_tiet_tien']['phi_van_chuyen'] + $don_hang['chi_tiet_tien']['goi_qua'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border border-black p-2 text-right font-black uppercase text-lg">Phải thu (COD):</td>
                            <td class="border border-black p-2 text-right font-black text-lg"><?= number_format($don_hang['chi_tiet_tien']['tong_thanh_toan'], 0, ',', '.') ?>đ</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="grid grid-cols-2 text-center mt-12 relative z-10">
                    <div>
                        <p class="font-bold">Người gửi</p>
                        <p class="text-xs italic">(Ký & ghi rõ họ tên)</p>
                    </div>
                    <div>
                        <p class="font-bold">Người nhận</p>
                        <p class="text-xs italic">(Ký & ghi rõ họ tên)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
