<?php
// views/components/Admin/xuat_kho/modals.php
?>
<!-- Modal Duyệt phiếu -->
<div id="modalDuyetPhieu" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalDuyetPhieuContent">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-blue-600 text-2xl" data-icon="mdi:shield-check"></span> Duyệt phiếu xuất kho?
            </h3>
            <button onclick="closeModal('modalDuyetPhieu')" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-white rounded-full transition-colors focus:outline-none shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6">
            <div class="bg-blue-50/50 border border-blue-100 rounded-xl p-4 mb-4">
                <div class="grid grid-cols-2 gap-y-3 gap-x-4 text-sm">
                    <div><span class="text-gray-500 block text-xs mb-0.5">Mã phiếu</span><span class="font-bold text-[#6B0D18]">XK202600123</span></div>
                    <div><span class="text-gray-500 block text-xs mb-0.5">Kho xuất</span><span class="font-medium text-gray-900">Kho online</span></div>
                    <div><span class="text-gray-500 block text-xs mb-0.5">Giá trị</span><span class="font-bold text-gray-900">12.500.000đ</span></div>
                    <div><span class="text-gray-500 block text-xs mb-0.5">Tình trạng tồn</span><span class="font-bold text-emerald-600">Đủ hàng</span></div>
                </div>
            </div>

            <!-- Tùy chọn duyệt -->
            <div class="space-y-3 mb-6">
                <label class="block text-sm font-bold text-gray-900 mb-2">Tùy chọn xử lý tiếp theo <span class="text-red-500">*</span></label>
                
                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors">
                    <input type="radio" name="duyet_option" checked class="mt-0.5 w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-600">
                    <div>
                        <div class="text-sm font-bold text-gray-900">Duyệt và chờ xuất kho</div>
                        <div class="text-xs text-gray-500 mt-0.5">Phiếu sẽ chuyển trạng thái chờ nhân viên kho vào xử lý.</div>
                    </div>
                </label>
                
                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors">
                    <input type="radio" name="duyet_option" class="mt-0.5 w-4 h-4 text-emerald-600 border-gray-300 focus:ring-emerald-600">
                    <div>
                        <div class="text-sm font-bold text-gray-900">Duyệt và chuyển sang chuẩn bị hàng ngay</div>
                        <div class="text-xs text-gray-500 mt-0.5">Chuyển trực tiếp đến màn hình chuẩn bị (picking) hàng.</div>
                    </div>
                </label>

                <label class="flex items-start gap-3 p-3 border border-rose-200 bg-rose-50/50 rounded-xl hover:bg-rose-50 cursor-pointer transition-colors">
                    <input type="radio" name="duyet_option" class="mt-0.5 w-4 h-4 text-[#6B0D18] border-gray-300 focus:ring-[#6B0D18]">
                    <div>
                        <div class="text-sm font-bold text-[#6B0D18]">Duyệt và Xác nhận xuất kho (Bỏ qua chuẩn bị)</div>
                        <div class="text-xs text-gray-600 mt-0.5">Cảnh báo: Sẽ trừ trực tiếp tồn kho ngay lập tức. Dành cho Admin.</div>
                    </div>
                </label>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú duyệt</label>
                <textarea rows="2" class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-sm" placeholder="Nhập lời nhắn cho nhân viên kho (nếu có)..."></textarea>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="closeModal('modalDuyetPhieu')" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors text-sm">
                    Hủy
                </button>
                <button type="button" class="px-4 py-2 bg-white border border-orange-200 text-orange-600 rounded-lg hover:bg-orange-50 font-medium transition-colors text-sm">
                    Yêu cầu sửa lại
                </button>
                <button type="button" class="flex-1 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-bold transition-colors shadow-sm text-sm">
                    Xác nhận duyệt
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hủy phiếu -->
<div id="modalHuyPhieu" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalHuyPhieuContent">
        <div class="p-6">
            <!-- Nếu phiếu chưa xuất -->
            <div id="cancelFormNormal">
                <div class="w-12 h-12 rounded-full bg-rose-100 flex items-center justify-center text-rose-600 mb-4 mx-auto">
                    <span class="iconify text-2xl" data-icon="mdi:alert-outline"></span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 text-center mb-2">Hủy phiếu xuất kho?</h3>
                <p class="text-sm text-gray-500 text-center mb-6">Phiếu xuất sẽ bị hủy bỏ và không được tiếp tục xử lý.</p>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lý do hủy <span class="text-red-500">*</span></label>
                    <select class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm mb-3">
                        <option value="">-- Chọn lý do --</option>
                        <option>Tạo nhầm phiếu</option>
                        <option>Đơn hàng bị hủy</option>
                        <option>Sai kho xuất hoặc sai sản phẩm</option>
                        <option>Không đủ tồn kho thực tế</option>
                        <option>Lý do khác</option>
                    </select>
                    <textarea class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="Ghi chú thêm (không bắt buộc)..." rows="2"></textarea>
                </div>

                <div class="flex items-center gap-3">
                    <button type="button" onclick="closeModal('modalHuyPhieu')" class="flex-1 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors text-sm">
                        Không hủy
                    </button>
                    <button type="button" class="flex-1 py-2.5 bg-rose-600 text-white rounded-lg hover:bg-rose-700 font-bold transition-colors shadow-sm text-sm">
                        Xác nhận hủy phiếu
                    </button>
                </div>
            </div>

            <!-- Nếu phiếu ĐÃ XUẤT KHO (Dùng JS để toggle div này khi cần test) -->
            <div id="cancelFormExported" class="hidden text-center">
                <div class="w-16 h-16 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 mb-4 mx-auto border-4 border-white shadow-sm">
                    <span class="iconify text-3xl" data-icon="mdi:cancel"></span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Không thể hủy trực tiếp!</h3>
                <p class="text-sm text-gray-600 mb-6 bg-orange-50 p-3 rounded-lg border border-orange-100">
                    Phiếu này <strong class="text-orange-700">Đã xuất kho</strong> và đã giảm trừ tồn kho trên hệ thống. Không thể hủy phiếu trực tiếp.
                    <br><br>
                    Vui lòng tạo <strong>Phiếu hoàn kho</strong> để trả lại hàng hóa vào kho.
                </p>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="closeModal('modalHuyPhieu')" class="flex-1 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors text-sm">
                        Đóng
                    </button>
                    <button type="button" onclick="closeModal('modalHuyPhieu'); openModal('modalHoanKho')" class="flex-1 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-bold transition-colors shadow-sm text-sm flex justify-center items-center gap-2">
                        <span class="iconify" data-icon="mdi:undo-variant"></span> Tạo phiếu hoàn kho
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tạo phiếu hoàn kho (Hoàn thiện quy trình trả hàng) -->
<div id="modalHoanKho" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-3xl max-h-[90vh] flex flex-col overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalHoanKhoContent">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-emerald-50/50 shrink-0">
            <div>
                <h3 class="text-lg font-bold text-emerald-800 flex items-center gap-2">
                    <span class="iconify text-emerald-600 text-2xl" data-icon="mdi:undo-variant"></span> Tạo phiếu hoàn kho
                </h3>
                <p class="text-xs text-emerald-600 mt-1 font-medium">Hoàn lại hàng hóa từ phiếu xuất gốc: <strong>XK202600123</strong></p>
            </div>
            <button onclick="closeModal('modalHoanKho')" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-white rounded-full transition-colors focus:outline-none shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        
        <div class="p-6 overflow-y-auto">
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kho nhận lại <span class="text-red-500">*</span></label>
                    <select class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm">
                        <option>Kho online (Kho gốc)</option>
                        <option>Kho hàng lỗi / bảo hành</option>
                        <option>Kho cửa hàng</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lý do hoàn kho <span class="text-red-500">*</span></label>
                    <select class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm">
                        <option>Đơn bị hủy sau khi xuất</option>
                        <option>Giao thất bại / Hoàn hàng</option>
                        <option>Khách hàng đổi/trả sản phẩm</option>
                        <option>Xuất nhầm hàng</option>
                        <option>Khác</option>
                    </select>
                </div>
            </div>

            <!-- Bảng sản phẩm để hoàn -->
            <div class="border border-gray-200 rounded-xl overflow-hidden mb-6">
                <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
                    <h4 class="font-bold text-gray-900 text-sm">Chọn sản phẩm và số lượng hoàn lại</h4>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white border-b border-gray-100 text-xs uppercase tracking-wider text-gray-500">
                            <th class="py-2.5 px-4 font-semibold">Sản phẩm</th>
                            <th class="py-2.5 px-4 font-semibold text-center w-24">Đã xuất</th>
                            <th class="py-2.5 px-4 font-semibold text-center w-32">SL Hoàn lại</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50/50">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" checked class="text-emerald-600 rounded border-gray-300">
                                    <div>
                                        <div class="font-bold text-gray-900 text-sm">Vòng Ngọc Bích Tài Lộc</div>
                                        <div class="text-xs text-gray-500">NB-TL-16</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-4 text-center font-bold text-gray-900">1</td>
                            <td class="py-3 px-4">
                                <input type="number" value="1" max="1" min="0" class="w-full text-center font-bold px-2 py-1.5 bg-white border border-gray-300 rounded text-sm focus:outline-none focus:border-emerald-500">
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50/50">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" checked class="text-emerald-600 rounded border-gray-300">
                                    <div>
                                        <div class="font-bold text-gray-900 text-sm">Nhẫn ngọc trai đính kim cương</div>
                                        <div class="text-xs text-gray-500">NT-001</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-4 text-center font-bold text-gray-900">3</td>
                            <td class="py-3 px-4">
                                <input type="number" value="3" max="3" min="0" class="w-full text-center font-bold px-2 py-1.5 bg-white border border-gray-300 rounded text-sm focus:outline-none focus:border-emerald-500">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="bg-rose-50 p-2 text-center text-xs text-rose-600 border-t border-rose-100 font-medium">
                    Không thể hoàn số lượng lớn hơn số lượng đã xuất kho gốc.
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú hoàn kho</label>
                <textarea rows="2" class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm" placeholder="Mô tả tình trạng hàng hóa khi nhận lại..."></textarea>
            </div>
        </div>

        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 shrink-0 flex items-center justify-between gap-3">
            <button type="button" onclick="closeModal('modalHoanKho')" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors text-sm">
                Hủy bỏ
            </button>
            <button type="button" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 font-bold transition-colors shadow-sm text-sm">
                Xác nhận tạo Phiếu Hoàn
            </button>
        </div>
    </div>
</div>

<!-- Modal In / Xuất Phiếu -->
<div id="modalInPhieu" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalInPhieuContent">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-gray-600 text-2xl" data-icon="mdi:printer"></span> In / Xuất phiếu xuất kho
            </h3>
            <button onclick="closeModal('modalInPhieu')" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-white rounded-full transition-colors focus:outline-none shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6">
            <!-- Bản preview thu nhỏ mường tượng -->
            <div class="aspect-[1/1.4] w-48 mx-auto bg-gray-50 border border-gray-200 rounded shadow-sm mb-6 flex flex-col p-4 relative overflow-hidden">
                <div class="text-center border-b border-gray-300 pb-2 mb-2">
                    <div class="w-12 h-4 bg-gray-300 mx-auto rounded mb-1"></div>
                    <div class="text-[8px] font-bold">PHIẾU XUẤT KHO</div>
                    <div class="text-[6px] text-gray-500">Mã: XK202600123</div>
                </div>
                <div class="space-y-1 mb-2">
                    <div class="w-full h-1.5 bg-gray-200 rounded"></div>
                    <div class="w-4/5 h-1.5 bg-gray-200 rounded"></div>
                </div>
                <div class="border border-gray-300 flex-1">
                    <div class="border-b border-gray-300 h-2 bg-gray-200"></div>
                    <div class="h-2"></div>
                    <div class="h-2"></div>
                </div>
                <div class="flex justify-between mt-2 px-2">
                    <div class="w-6 h-6 border border-gray-300 border-dashed rounded-full flex items-center justify-center text-[5px]">Ký</div>
                    <div class="w-6 h-6 border border-gray-300 border-dashed rounded-full flex items-center justify-center text-[5px]">Ký</div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <button class="flex flex-col items-center justify-center gap-2 p-4 border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-colors group">
                    <span class="iconify text-3xl text-gray-500 group-hover:text-gray-900" data-icon="mdi:printer"></span>
                    <span class="text-sm font-bold text-gray-900">In trực tiếp</span>
                </button>
                <button class="flex flex-col items-center justify-center gap-2 p-4 border border-gray-200 rounded-xl hover:bg-rose-50 hover:border-rose-400 transition-colors group">
                    <span class="iconify text-3xl text-rose-500 group-hover:text-rose-600" data-icon="mdi:file-pdf-box"></span>
                    <span class="text-sm font-bold text-gray-900">Xuất PDF</span>
                </button>
                <button class="flex flex-col items-center justify-center gap-2 p-4 border border-gray-200 rounded-xl hover:bg-emerald-50 hover:border-emerald-400 transition-colors group">
                    <span class="iconify text-3xl text-emerald-500 group-hover:text-emerald-600" data-icon="mdi:file-excel-box"></span>
                    <span class="text-sm font-bold text-gray-900">Xuất Excel</span>
                </button>
            </div>
            <div class="text-center mt-4">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" class="w-4 h-4 text-[#6B0D18] rounded border-gray-300">
                    <span class="text-sm text-gray-600">Đính kèm giá trị hàng xuất trong phiếu in</span>
                </label>
            </div>
        </div>
    </div>
</div>
