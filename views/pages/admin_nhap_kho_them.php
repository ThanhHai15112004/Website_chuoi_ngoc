<!-- Trang Tạo Phiếu Nhập Kho -->
<div class="px-6 py-6 pb-20 max-w-[1600px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Breadcrumb & Header -->
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
            <a href="<?= APP_URL ?>/admin/nhap-kho" class="hover:text-[#6B0D18] transition-colors">Phiếu nhập kho</a>
            <span class="iconify text-gray-400" data-icon="mdi:chevron-right"></span>
            <span class="text-gray-900 font-medium">Tạo phiếu mới</span>
        </div>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">Tạo Phiếu Nhập Kho Mới</h2>
            <div class="flex items-center gap-3">
                <a href="<?= APP_URL ?>/admin/nhap-kho" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
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
        <!-- Main Form: Sản phẩm nhập -->
        <div class="xl:col-span-2 space-y-6">
            <!-- Thông tin chứng từ -->
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-base font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:file-document-outline"></span> Thông tin chứng từ
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nhà cung cấp <span class="text-red-500">*</span></label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 bg-white text-sm">
                            <option value="">-- Chọn nhà cung cấp --</option>
                            <?php foreach($nhaCungCapList as $ncc): ?>
                                <option value="<?= $ncc['id'] ?>"><?= $ncc['ten'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mã phiếu tham chiếu (từ NCC)</label>
                        <input type="text" placeholder="Ví dụ: INV-2026-001" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ngày hẹn giao hàng</label>
                        <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm text-gray-700">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Chi nhánh / Kho nhận hàng</label>
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
                        <span class="iconify text-gray-400" data-icon="mdi:package-variant-closed"></span> Danh sách sản phẩm nhập
                    </h3>
                    <button onclick="themDongSanPham()" class="text-sm font-medium text-[#6B0D18] hover:text-red-900 flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:plus-circle-outline"></span> Thêm sản phẩm khác
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="bangNhapHang">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                                <th class="py-2 px-3 w-10 text-center">#</th>
                                <th class="py-2 px-3 w-1/3">Sản phẩm <span class="text-red-500">*</span></th>
                                <th class="py-2 px-3">Phân loại</th>
                                <th class="py-2 px-3 w-24 text-center">SL <span class="text-red-500">*</span></th>
                                <th class="py-2 px-3 w-32 text-right">Đơn giá <span class="text-red-500">*</span></th>
                                <th class="py-2 px-3 w-32 text-right">Thành tiền</th>
                                <th class="py-2 px-3 w-10 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100" id="dsSanPham">
                            <!-- Dòng 1 -->
                            <tr class="sp-row">
                                <td class="py-3 px-3 text-center text-sm text-gray-500 stt">1</td>
                                <td class="py-3 px-3">
                                    <select class="w-full px-2 py-1.5 border border-gray-300 rounded focus:outline-none focus:border-red-900 text-sm">
                                        <option value="">Chọn sản phẩm</option>
                                        <option value="1" selected>Vòng Ngọc Bích Tài Lộc</option>
                                        <option value="2">Chuỗi Cẩm Thạch Bình An</option>
                                        <option value="3">Vòng Thạch Anh Tím</option>
                                    </select>
                                </td>
                                <td class="py-3 px-3">
                                    <select class="w-full px-2 py-1.5 border border-gray-300 rounded focus:outline-none focus:border-red-900 text-sm">
                                        <option value="">Mặc định</option>
                                        <option value="16cm" selected>Size 16cm</option>
                                        <option value="18cm">Size 18cm</option>
                                    </select>
                                </td>
                                <td class="py-3 px-3">
                                    <input type="number" min="1" value="50" class="w-full px-2 py-1.5 border border-gray-300 rounded focus:outline-none focus:border-red-900 text-sm text-center font-bold" oninput="tinhTongTien(this)">
                                </td>
                                <td class="py-3 px-3">
                                    <input type="number" min="0" value="200000" class="w-full px-2 py-1.5 border border-gray-300 rounded focus:outline-none focus:border-red-900 text-sm text-right" oninput="tinhTongTien(this)">
                                </td>
                                <td class="py-3 px-3 text-right">
                                    <span class="font-bold text-[#6B0D18] text-sm thanh-tien">10.000.000</span>
                                </td>
                                <td class="py-3 px-3 text-center">
                                    <button class="text-gray-400 hover:text-red-600 transition-colors p-1" onclick="xoaDong(this)">
                                        <span class="iconify text-lg" data-icon="mdi:delete-outline"></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="bg-gray-50">
                                <td colspan="5" class="py-3 px-4 text-right font-medium text-gray-700">Tổng cộng:</td>
                                <td class="py-3 px-3 text-right">
                                    <span class="font-bold text-lg text-[#6B0D18]" id="tongTienPhieu">10.000.000</span>
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar Phải: Ghi chú & Tóm tắt -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-base font-bold text-gray-900 mb-4">Ghi chú & Tài liệu</h3>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú phiếu nhập</label>
                    <textarea rows="4" placeholder="Nhập mục đích, thông tin lưu ý..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm"></textarea>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Đính kèm chứng từ</label>
                    <div class="w-full p-4 border-2 border-dashed border-gray-300 rounded-lg text-center hover:bg-gray-50 transition-colors cursor-pointer">
                        <span class="iconify text-gray-400 text-3xl mx-auto mb-2" data-icon="mdi:cloud-upload-outline"></span>
                        <p class="text-sm text-gray-500">Kéo thả file hoặc <span class="text-[#6B0D18] font-medium">Bấm để tải lên</span></p>
                        <p class="text-xs text-gray-400 mt-1">PDF, JPG, PNG (Tối đa 5MB)</p>
                    </div>
                </div>
            </div>

            <div class="bg-[#6B0D18]/5 p-6 rounded-xl border border-red-100">
                <h3 class="text-base font-bold text-[#6B0D18] mb-2 flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:lightbulb-outline"></span> Hướng dẫn
                </h3>
                <ul class="text-sm text-red-900/80 space-y-2 list-disc list-inside">
                    <li>Sau khi tạo, phiếu sẽ ở trạng thái <span class="font-bold">Chờ duyệt</span>.</li>
                    <li>Chỉ sau khi được duyệt và xác nhận hàng về tới kho, số lượng tồn kho mới được cộng thêm.</li>
                    <li>Đảm bảo điền đúng Đơn giá nhập để hệ thống tính giá trị tồn kho chính xác.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function tinhTongTien(input) {
        const row = input.closest('tr');
        const soLuong = row.querySelector('td:nth-child(4) input').value || 0;
        const donGia = row.querySelector('td:nth-child(5) input').value || 0;
        const thanhTien = soLuong * donGia;
        
        // Format tiền
        row.querySelector('.thanh-tien').innerText = new Intl.NumberFormat('vi-VN').format(thanhTien);
        tinhTongPhieu();
    }

    function tinhTongPhieu() {
        let tong = 0;
        document.querySelectorAll('#dsSanPham tr').forEach(row => {
            const soLuong = row.querySelector('td:nth-child(4) input').value || 0;
            const donGia = row.querySelector('td:nth-child(5) input').value || 0;
            tong += soLuong * donGia;
        });
        document.getElementById('tongTienPhieu').innerText = new Intl.NumberFormat('vi-VN').format(tong);
    }

    function xoaDong(btn) {
        const tbody = document.getElementById('dsSanPham');
        if (tbody.children.length > 1) {
            btn.closest('tr').remove();
            capNhatSTT();
            tinhTongPhieu();
        } else {
            alert('Phiếu nhập phải có ít nhất 1 sản phẩm!');
        }
    }

    function themDongSanPham() {
        const tbody = document.getElementById('dsSanPham');
        const firstRow = tbody.firstElementChild;
        const newRow = firstRow.cloneNode(true);
        
        // Reset values
        newRow.querySelector('td:nth-child(2) select').value = '';
        newRow.querySelector('td:nth-child(3) select').value = '';
        newRow.querySelector('td:nth-child(4) input').value = '1';
        newRow.querySelector('td:nth-child(5) input').value = '0';
        newRow.querySelector('.thanh-tien').innerText = '0';

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
