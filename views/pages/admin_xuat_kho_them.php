<!-- Trang Tạo Phiếu Xuất Kho -->
<div class="px-6 py-6 pb-20 max-w-[1600px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Breadcrumb & Header -->
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
            <a href="<?= APP_URL ?>/admin/xuat-kho" class="hover:text-[#6B0D18] transition-colors">Phiếu xuất kho</a>
            <span class="iconify text-gray-400" data-icon="mdi:chevron-right"></span>
            <span class="text-gray-900 font-medium">Tạo phiếu mới</span>
        </div>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">Tạo Phiếu Xuất Kho Mới</h2>
            <div class="flex items-center gap-3">
                <a href="<?= APP_URL ?>/admin/xuat-kho" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                    Hủy bỏ
                </a>
                <button class="px-4 py-2 bg-white border border-gray-200 text-[#6B0D18] rounded-lg hover:bg-red-50 hover:border-red-200 transition-colors text-sm font-medium shadow-sm">
                    Lưu nháp
                </button>
                <button class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20">
                    Tạo phiếu & Gửi duyệt
                </button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Main Form: Sản phẩm xuất -->
        <div class="xl:col-span-2 space-y-6">
            <!-- Thông tin chứng từ -->
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-base font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:file-document-outline"></span> Thông tin chứng từ
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lý do xuất kho <span class="text-red-500">*</span></label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 bg-white text-sm">
                            <option value="">-- Chọn lý do xuất --</option>
                            <option value="ban_hang">Xuất bán hàng (Đơn online/offline)</option>
                            <option value="hang_hong">Xuất hàng hỏng/lỗi</option>
                            <option value="tra_ncc">Xuất trả Nhà cung cấp</option>
                            <option value="tieu_hao">Xuất tặng/Tiêu hao nội bộ</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mã đơn hàng tham chiếu (Nếu có)</label>
                        <input type="text" placeholder="Ví dụ: ORD-2026-102" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ngày xuất dự kiến</label>
                        <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm text-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kho xuất hàng</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 bg-gray-50 text-sm" disabled>
                            <option value="1">Kho Tổng - Hà Nội</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Bảng sản phẩm -->
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-gray-400" data-icon="mdi:package-variant-closed"></span> Danh sách sản phẩm xuất
                    </h3>
                    <button onclick="themDongSanPham()" class="text-sm font-medium text-[#6B0D18] hover:text-red-900 flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:plus-circle-outline"></span> Thêm sản phẩm khác
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="bangXuatHang">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                                <th class="py-2 px-3 w-10 text-center">#</th>
                                <th class="py-2 px-3 w-1/3">Sản phẩm <span class="text-red-500">*</span></th>
                                <th class="py-2 px-3">Phân loại</th>
                                <th class="py-2 px-3 w-24 text-center">Tồn kho</th>
                                <th class="py-2 px-3 w-32 text-center">SL Xuất <span class="text-red-500">*</span></th>
                                <th class="py-2 px-3 w-10 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100" id="dsSanPham">
                            <!-- Dòng 1 -->
                            <tr class="sp-row">
                                <td class="py-3 px-3 text-center text-sm text-gray-500 stt">1</td>
                                <td class="py-3 px-3">
                                    <select class="w-full px-2 py-1.5 border border-gray-300 rounded focus:outline-none focus:border-red-900 text-sm" onchange="capNhatTonKho(this)">
                                        <option value="">Chọn sản phẩm</option>
                                        <option value="1" data-ton="25" selected>Vòng Ngọc Bích Tài Lộc</option>
                                        <option value="2" data-ton="8">Chuỗi Cẩm Thạch Bình An</option>
                                        <option value="3" data-ton="2">Vòng Thạch Anh Tím</option>
                                    </select>
                                </td>
                                <td class="py-3 px-3">
                                    <select class="w-full px-2 py-1.5 border border-gray-300 rounded focus:outline-none focus:border-red-900 text-sm">
                                        <option value="">Mặc định</option>
                                        <option value="16cm" selected>Size 16cm</option>
                                        <option value="18cm">Size 18cm</option>
                                    </select>
                                </td>
                                <td class="py-3 px-3 text-center">
                                    <span class="font-bold text-gray-600 ton-kho-hien-tai">25</span>
                                </td>
                                <td class="py-3 px-3">
                                    <input type="number" min="1" value="1" class="w-full px-2 py-1.5 border border-gray-300 rounded focus:outline-none focus:border-red-900 text-sm text-center font-bold input-sl-xuat" oninput="kiemTraSoLuong(this)">
                                    <div class="text-[10px] text-red-600 mt-1 font-medium hidden msg-loi-ton-kho">Vượt quá tồn kho!</div>
                                </td>
                                <td class="py-3 px-3 text-center">
                                    <button class="text-gray-400 hover:text-red-600 transition-colors p-1" onclick="xoaDong(this)">
                                        <span class="iconify text-lg" data-icon="mdi:delete-outline"></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar Phải: Ghi chú & Tóm tắt -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-base font-bold text-gray-900 mb-4">Ghi chú & Tài liệu</h3>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú phiếu xuất</label>
                    <textarea rows="4" placeholder="Nhập mục đích, thông tin người nhận..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm"></textarea>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Đính kèm chứng từ</label>
                    <div class="w-full p-4 border-2 border-dashed border-gray-300 rounded-lg text-center hover:bg-gray-50 transition-colors cursor-pointer">
                        <span class="iconify text-gray-400 text-3xl mx-auto mb-2" data-icon="mdi:cloud-upload-outline"></span>
                        <p class="text-sm text-gray-500">Kéo thả file hoặc <span class="text-[#6B0D18] font-medium">Bấm để tải lên</span></p>
                        <p class="text-xs text-gray-400 mt-1">Biên bản hỏng hóc, Hóa đơn... (Tối đa 5MB)</p>
                    </div>
                </div>
            </div>

            <div class="bg-amber-50 p-6 rounded-xl border border-amber-100">
                <h3 class="text-base font-bold text-amber-900 mb-2 flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:alert-circle-outline"></span> Nguyên tắc xuất kho
                </h3>
                <ul class="text-sm text-amber-800 space-y-2 list-disc list-inside">
                    <li>Hệ thống <span class="font-bold text-red-700">không cho phép</span> xuất âm. Số lượng xuất phải &le; số lượng tồn kho.</li>
                    <li>Phiếu cần được duyệt trước khi nhân viên kho thực hiện việc lấy hàng khỏi kho.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function capNhatTonKho(select) {
        const row = select.closest('tr');
        const selectedOption = select.options[select.selectedIndex];
        const tonKho = selectedOption.dataset.ton || 0;
        row.querySelector('.ton-kho-hien-tai').innerText = tonKho;
        
        kiemTraSoLuong(row.querySelector('.input-sl-xuat'));
    }

    function kiemTraSoLuong(input) {
        const row = input.closest('tr');
        const slXuat = parseInt(input.value) || 0;
        const tonKho = parseInt(row.querySelector('.ton-kho-hien-tai').innerText) || 0;
        const msgLoi = row.querySelector('.msg-loi-ton-kho');

        if (slXuat > tonKho) {
            input.classList.remove('border-gray-300', 'focus:border-red-900');
            input.classList.add('border-red-500', 'bg-red-50', 'text-red-700');
            msgLoi.classList.remove('hidden');
        } else {
            input.classList.remove('border-red-500', 'bg-red-50', 'text-red-700');
            input.classList.add('border-gray-300', 'focus:border-red-900');
            msgLoi.classList.add('hidden');
        }
    }

    function xoaDong(btn) {
        const tbody = document.getElementById('dsSanPham');
        if (tbody.children.length > 1) {
            btn.closest('tr').remove();
            capNhatSTT();
        } else {
            alert('Phiếu xuất phải có ít nhất 1 sản phẩm!');
        }
    }

    function themDongSanPham() {
        const tbody = document.getElementById('dsSanPham');
        const firstRow = tbody.firstElementChild;
        const newRow = firstRow.cloneNode(true);
        
        // Reset values
        newRow.querySelector('td:nth-child(2) select').value = '';
        newRow.querySelector('td:nth-child(3) select').value = '';
        newRow.querySelector('td:nth-child(4) span').innerText = '0';
        const inputSL = newRow.querySelector('.input-sl-xuat');
        inputSL.value = '1';
        
        // Reset styles for error
        inputSL.classList.remove('border-red-500', 'bg-red-50', 'text-red-700');
        inputSL.classList.add('border-gray-300', 'focus:border-red-900');
        newRow.querySelector('.msg-loi-ton-kho').classList.add('hidden');

        tbody.appendChild(newRow);
        capNhatSTT();
    }

    function capNhatSTT() {
        const rows = document.querySelectorAll('#dsSanPham tr');
        rows.forEach((row, index) => {
            row.querySelector('.stt').innerText = index + 1;
        });
    }
</script>
