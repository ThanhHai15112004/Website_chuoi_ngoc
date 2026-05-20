<!-- MODALS -->

<!-- Modal overlay -->
<div id="modalOverlay" class="fixed inset-0 bg-black/50 z-40 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Confirm Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[400px] max-w-[90%] transform scale-95 transition-transform duration-300 p-6 flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-red-100 text-red-600 flex items-center justify-center mb-4">
            <span class="iconify text-3xl" data-icon="mdi:alert-circle-outline"></span>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Xác nhận xóa voucher</h3>
        <p class="text-gray-600 text-sm mb-1" id="delete-msg">Bạn có chắc muốn xóa voucher <strong class="text-gray-900" id="del-voucher-code">CODE</strong> không?</p>
        <p class="text-amber-600 text-[13px] bg-amber-50 p-2 rounded-lg border border-amber-100 hidden mb-4 w-full" id="delete-warning">
            Voucher này đã có lượt sử dụng. Bạn nên <strong>Tắt voucher</strong> thay vì xóa để giữ dữ liệu báo cáo.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full mt-6">
            <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy</button>
            <button id="btn-disable-alt" class="hidden flex-1 px-4 py-2.5 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 transition-colors font-medium text-sm" onclick="closeDeleteModal(); mockAction('Đã tạm tắt voucher')">Tắt thay thế</button>
            <button onclick="executeDelete()" class="flex-1 px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium text-sm shadow-md shadow-red-600/20">Xóa voucher</button>
        </div>
    </div>
</div>

<!-- View Details Modal -->
<div id="detailsModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[500px] max-w-[90%] transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:ticket-outline"></span> Chi tiết Voucher
            </h3>
            <button onclick="closeDetailsModal()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        
        <div class="p-6 bg-white overflow-y-auto max-h-[70vh]">
            <!-- Ticket UI -->
            <div class="relative mx-auto w-full rounded-xl overflow-hidden shadow-sm border border-red-100 bg-gradient-to-br from-red-50 to-white mb-6">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-repeat-x flex justify-around">
                    <?php for($i=0; $i<20; $i++): ?><div class="w-2 h-2 bg-white rounded-full -mt-1 shadow-inner"></div><?php endfor; ?>
                </div>
                <div class="p-5 relative z-10 border-l-4 border-[#6B0D18] flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-red-100 text-[#6B0D18] flex items-center justify-center shrink-0">
                        <span class="iconify text-2xl" data-icon="mdi:ticket-percent"></span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-black text-[#6B0D18] tracking-widest uppercase" id="detail-code">MÃ_VOUCHER</h3>
                        <p class="font-bold text-gray-800" id="detail-value">Giảm 0%</p>
                    </div>
                </div>
            </div>

            <!-- Details List -->
            <div class="space-y-4">
                <div class="flex justify-between border-b border-gray-50 pb-2">
                    <span class="text-gray-500 text-sm">Chương trình</span>
                    <span class="font-medium text-gray-800 text-sm text-right" id="detail-name">Tên chương trình</span>
                </div>
                <div class="flex justify-between border-b border-gray-50 pb-2">
                    <span class="text-gray-500 text-sm">Điều kiện</span>
                    <span class="font-medium text-gray-800 text-sm text-right" id="detail-condition">Đơn từ 0đ</span>
                </div>
                <div class="flex justify-between border-b border-gray-50 pb-2">
                    <span class="text-gray-500 text-sm">Đối tượng</span>
                    <span class="font-medium text-gray-800 text-sm text-right" id="detail-target">Tất cả khách hàng</span>
                </div>
                <div class="flex justify-between border-b border-gray-50 pb-2">
                    <span class="text-gray-500 text-sm">Thời gian</span>
                    <span class="font-medium text-gray-800 text-sm text-right" id="detail-time">01/01/2026 - 31/12/2026</span>
                </div>
                <div class="flex justify-between border-b border-gray-50 pb-2">
                    <span class="text-gray-500 text-sm">Lượt sử dụng</span>
                    <span class="font-medium text-gray-800 text-sm text-right"><span id="detail-used">0</span> / <span id="detail-total">100</span></span>
                </div>
                <div class="flex justify-between pt-1">
                    <span class="text-gray-500 text-sm">Trạng thái</span>
                    <span class="inline-flex px-2 py-0.5 rounded text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200" id="detail-status">Đang hoạt động</span>
                </div>
            </div>
        </div>
        
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
            <button onclick="closeDetailsModal()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Đóng</button>
            <a href="<?= APP_URL ?>/admin/voucher/sua" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md">Chỉnh sửa</a>
        </div>
    </div>
</div>

<!-- History Modal -->
<div id="historyModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[700px] max-w-[95%] transform scale-95 transition-transform duration-300 overflow-hidden flex flex-col">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <div>
                <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:receipt-text-outline"></span> Lịch sử sử dụng
                </h3>
                <p class="text-xs text-gray-500 mt-0.5">Voucher: <strong id="history-code" class="text-[#6B0D18]">CODE</strong></p>
            </div>
            <button onclick="closeHistoryModal()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        
        <div class="p-0 bg-white overflow-y-auto max-h-[60vh]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold sticky top-0">
                    <tr>
                        <th class="px-6 py-3">Khách hàng</th>
                        <th class="px-6 py-3">Mã đơn hàng</th>
                        <th class="px-6 py-3">Thời gian</th>
                        <th class="px-6 py-3 text-right">Giảm giá</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <!-- Mock rows -->
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-6 py-3 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">NA</div>
                            <div>
                                <div class="font-medium text-gray-800">Nguyễn Văn A</div>
                                <div class="text-[10px] text-gray-400">0901234567</div>
                            </div>
                        </td>
                        <td class="px-6 py-3"><a href="#" class="text-blue-600 hover:underline">#DH10025</a></td>
                        <td class="px-6 py-3">20/05/2026 14:30</td>
                        <td class="px-6 py-3 text-right font-medium text-[#6B0D18]">-50.000đ</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-6 py-3 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xs">TB</div>
                            <div>
                                <div class="font-medium text-gray-800">Trần Thị B</div>
                                <div class="text-[10px] text-gray-400">0987654321</div>
                            </div>
                        </td>
                        <td class="px-6 py-3"><a href="#" class="text-blue-600 hover:underline">#DH10024</a></td>
                        <td class="px-6 py-3">19/05/2026 09:15</td>
                        <td class="px-6 py-3 text-right font-medium text-[#6B0D18]">-20.000đ</td>
                    </tr>
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-6 py-3 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-xs">LC</div>
                            <div>
                                <div class="font-medium text-gray-800">Lê Văn C</div>
                                <div class="text-[10px] text-gray-400">0911223344</div>
                            </div>
                        </td>
                        <td class="px-6 py-3"><a href="#" class="text-blue-600 hover:underline">#DH10018</a></td>
                        <td class="px-6 py-3">18/05/2026 16:45</td>
                        <td class="px-6 py-3 text-right font-medium text-[#6B0D18]">-50.000đ</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
            <span class="text-sm text-gray-500">Hiển thị 3 giao dịch gần nhất</span>
            <button onclick="closeHistoryModal()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Đóng</button>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]">
    <div class="text-emerald-500 mt-0.5">
        <span class="iconify text-xl" data-icon="mdi:check-circle"></span>
    </div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toast-msg">Đã tạo voucher thành công.</p>
    </div>
    <button onclick="hideToast()" class="text-gray-400 hover:text-gray-600 ml-4"><span class="iconify" data-icon="mdi:close"></span></button>
</div>

<!-- Scripts -->
