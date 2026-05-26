<!-- Trang Tạo Phiếu Thuyên Chuyển Kho Admin (V2) -->
<div class="px-6 py-6 pb-20 max-w-[1400px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex items-center gap-4 mb-6">
        <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">Tạo phiếu chuyển kho</h2>
            <p class="text-sm text-gray-500 mt-1">Điều chuyển sản phẩm giữa các kho, chi nhánh.</p>
        </div>
    </div>

    <form onsubmit="event.preventDefault(); alert('Tạo phiếu chuyển thành công!'); window.location.href='<?= APP_URL ?>/admin/thuyen-chuyen-kho';" class="flex flex-col lg:flex-row gap-6">
        
        <!-- Cột Trái (Form chính) -->
        <div class="flex-1 space-y-6">
            
            <!-- 1. Thông tin phiếu chuyển -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-4">
                    <span class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs text-gray-500">1</span> 
                    Thông tin phiếu chuyển
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mã phiếu</label>
                        <input type="text" value="CK202600127" readonly class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-[#6B0D18] font-bold text-sm cursor-not-allowed focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Loại chuyển kho <span class="text-red-500">*</span></label>
                        <select required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                            <option>Chuyển nội bộ</option>
                            <option>Chuyển sang kho bán hàng</option>
                            <option>Chuyển sang kho kiểm hàng</option>
                            <option>Chuyển sang kho bảo hành</option>
                            <option>Chuyển sang chi nhánh</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mức độ ưu tiên</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                            <option>Bình thường</option>
                            <option value="gap">Gấp</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- 2. Chọn kho gửi và kho nhận -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-4">
                    <span class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs text-gray-500">2</span> 
                    Chọn kho gửi & kho nhận
                </h3>
                
                <div class="flex flex-col md:flex-row items-center gap-4 relative">
                    <!-- Kho gửi -->
                    <div class="flex-1 w-full bg-gray-50 rounded-xl border border-gray-200 p-4 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1 h-full bg-gray-400"></div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-1.5">
                            <span class="iconify text-gray-500" data-icon="mdi:warehouse"></span> Kho gửi xuất hàng <span class="text-red-500">*</span>
                        </label>
                        <select id="kho_gui" onchange="checkKho()" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm font-medium">
                            <option value="">-- Chọn kho gửi --</option>
                            <?php foreach($dsKho as $k): ?>
                                <option value="<?= $k ?>"><?= $k ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <!-- Arrow -->
                    <div class="w-10 h-10 rounded-full bg-white border border-gray-200 shadow-sm flex items-center justify-center shrink-0 z-10 md:absolute md:left-1/2 md:top-1/2 md:-translate-x-1/2 md:-translate-y-1/2 text-[#6B0D18]">
                        <span class="iconify text-xl" data-icon="mdi:arrow-right-thick"></span>
                    </div>

                    <!-- Kho nhận -->
                    <div class="flex-1 w-full bg-red-50/30 rounded-xl border border-red-100 p-4 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1 h-full bg-[#6B0D18]"></div>
                        <label class="block text-sm font-semibold text-[#6B0D18] mb-2 flex items-center gap-1.5">
                            <span class="iconify" data-icon="mdi:warehouse"></span> Kho nhận hàng <span class="text-red-500">*</span>
                        </label>
                        <select id="kho_nhan" onchange="checkKho()" required class="w-full px-4 py-2.5 border border-red-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm font-medium bg-white text-[#6B0D18]">
                            <option value="">-- Chọn kho nhận --</option>
                            <?php foreach($dsKho as $k): ?>
                                <option value="<?= $k ?>"><?= $k ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <p id="errorKho" class="text-red-500 text-xs mt-3 font-medium hidden">Kho gửi và kho nhận không được trùng nhau!</p>
            </div>

            <!-- 3. Chọn sản phẩm chuyển -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-4">
                        <span class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs text-gray-500">3</span> 
                        Chọn sản phẩm thuyên chuyển
                    </h3>
                    <div class="relative">
                        <input type="text" placeholder="Tìm sản phẩm theo tên, mã, SKU, loại đá... (Nhấn Enter để thêm)" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm">
                        <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xl" data-icon="mdi:barcode-scan"></span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[700px]">
                        <thead>
                            <tr class="bg-gray-50 text-xs uppercase text-gray-500 border-b border-gray-200">
                                <th class="py-3 px-4 font-semibold w-10">#</th>
                                <th class="py-3 px-4 font-semibold">Sản phẩm</th>
                                <th class="py-3 px-4 font-semibold text-center w-28">Tồn kho gửi</th>
                                <th class="py-3 px-4 font-semibold text-center w-32">SL chuyển</th>
                                <th class="py-3 px-4 font-semibold text-center w-28">Còn lại</th>
                                <th class="py-3 px-4 font-semibold w-12 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100" id="productList">
                            <!-- Mock Product 1 -->
                            <tr class="hover:bg-gray-50/50">
                                <td class="py-3 px-4 text-gray-400 text-sm">1</td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded border border-gray-200 overflow-hidden shrink-0">
                                            <img src="https://via.placeholder.com/60" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <div class="text-sm font-bold text-gray-900">Vòng Ngọc Bích Tài Lộc</div>
                                            <div class="text-xs text-gray-500">SKU: NB-TL-001-16CM</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <span class="inline-flex items-center justify-center px-2 py-1 rounded bg-gray-100 text-gray-700 font-bold text-sm" id="ton_1">12</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <input type="number" min="1" value="5" oninput="calcTon(1)" id="chuyen_1" class="w-20 text-center px-2 py-1.5 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] font-bold text-[#6B0D18] bg-white">
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <span class="font-medium text-gray-500" id="con_1">7</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <button type="button" class="text-red-500 hover:bg-red-50 p-1.5 rounded-lg transition-colors">
                                        <span class="iconify" data-icon="mdi:trash-can-outline"></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 4. Ghi chú & Đính kèm -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-4">
                    <span class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs text-gray-500">4</span> 
                    Ghi chú & Đính kèm
                </h3>
                <div class="space-y-4">
                    <textarea rows="3" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="Nhập ghi chú cho phiếu chuyển kho (nội bộ)..."></textarea>
                    
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:bg-gray-50 transition-colors cursor-pointer group">
                        <span class="iconify text-4xl text-gray-400 group-hover:text-[#6B0D18] mx-auto mb-2 transition-colors" data-icon="mdi:cloud-upload-outline"></span>
                        <p class="text-sm font-medium text-gray-700">Kéo thả biên bản kiểm hàng hoặc <span class="text-[#6B0D18]">Tải file lên</span></p>
                        <p class="text-xs text-gray-500 mt-1">Hỗ trợ PDF, JPG, PNG (Tối đa 5MB)</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Cột Phải (Tóm tắt phiếu sticky) -->
        <div class="w-full lg:w-[380px] shrink-0">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 sticky top-24">
                <h3 class="text-lg font-bold text-gray-900 mb-4 pb-4 border-b border-gray-200">Tóm tắt phiếu chuyển</h3>
                
                <div class="space-y-4 mb-6">
                    <div class="flex justify-between items-start">
                        <span class="text-sm text-gray-500">Mã phiếu</span>
                        <span class="text-sm font-bold text-[#6B0D18]">CK202600127</span>
                    </div>
                    <div class="flex justify-between items-start">
                        <span class="text-sm text-gray-500">Hành trình</span>
                        <div class="text-right">
                            <div class="text-sm font-medium text-gray-600" id="summary_kho_gui">Chưa chọn</div>
                            <div class="text-gray-400 text-xs my-0.5">↓</div>
                            <div class="text-sm font-bold text-[#6B0D18]" id="summary_kho_nhan">Chưa chọn</div>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <span class="text-sm text-gray-500">Tổng sản phẩm</span>
                        <span class="text-sm font-bold text-gray-900">1</span>
                    </div>
                    <div class="flex justify-between items-start pt-4 border-t border-gray-100">
                        <span class="text-sm font-medium text-gray-700">Tổng số lượng chuyển</span>
                        <span class="text-xl font-bold text-gray-900" id="summary_tong_sl">5</span>
                    </div>
                </div>

                <div class="space-y-3">
                    <button type="submit" class="w-full py-3 bg-[#6B0D18] text-white font-bold rounded-lg hover:bg-red-900 transition-colors shadow-sm shadow-red-900/20 flex items-center justify-center gap-2">
                        <span class="iconify text-lg" data-icon="mdi:send-check-outline"></span> TẠO VÀ GỬI DUYỆT
                    </button>
                    <button type="button" class="w-full py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors flex items-center justify-center gap-2">
                        <span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu nháp
                    </button>
                    <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho" class="w-full py-2.5 block text-center text-sm text-gray-500 hover:text-gray-700 font-medium transition-colors">
                        Hủy bỏ
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function checkKho() {
    const gui = document.getElementById('kho_gui').value;
    const nhan = document.getElementById('kho_nhan').value;
    const err = document.getElementById('errorKho');
    
    document.getElementById('summary_kho_gui').innerText = gui || 'Chưa chọn';
    document.getElementById('summary_kho_nhan').innerText = nhan || 'Chưa chọn';

    if (gui && nhan && gui === nhan) {
        err.classList.remove('hidden');
        document.getElementById('kho_nhan').classList.add('border-red-500', 'ring-red-500/20');
    } else {
        err.classList.add('hidden');
        document.getElementById('kho_nhan').classList.remove('border-red-500', 'ring-red-500/20');
    }
}

function calcTon(id) {
    const ton = parseInt(document.getElementById('ton_'+id).innerText);
    const input = document.getElementById('chuyen_'+id);
    let chuyen = parseInt(input.value) || 0;
    
    if (chuyen > ton) {
        alert("Số lượng chuyển không được vượt quá tồn kho hiện tại (" + ton + ")!");
        input.value = ton;
        chuyen = ton;
    }
    if (chuyen < 0) { input.value = 0; chuyen = 0; }
    
    document.getElementById('con_'+id).innerText = ton - chuyen;
    document.getElementById('summary_tong_sl').innerText = chuyen;
}
</script>
