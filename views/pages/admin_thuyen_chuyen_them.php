<!-- Trang Tạo Phiếu Thuyên Chuyển Kho -->
<div class="px-6 py-6 pb-20 max-w-[1200px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex items-center gap-4 mb-6">
        <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">Tạo phiếu thuyên chuyển</h2>
            <p class="text-sm text-gray-500 mt-1">Lập chứng từ điều chuyển hàng hóa giữa các kho nội bộ.</p>
        </div>
    </div>

    <form onsubmit="event.preventDefault(); alert('Đã lưu phiếu thuyên chuyển thành công!'); window.location.href='<?= APP_URL ?>/admin/thuyen-chuyen-kho';" class="space-y-6">
        <!-- Thông tin chung -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
                <h3 class="font-bold text-gray-900 text-lg flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:information-outline"></span> Thông tin điều chuyển
                </h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kho Xuất -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Từ kho (Kho xuất) <span class="text-red-500">*</span></label>
                        <select id="khoXuat" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm" required onchange="checkKhoHopLe()">
                            <option value="">-- Chọn kho xuất --</option>
                            <?php foreach ($danhSachKho as $kho): ?>
                                <option value="<?= $kho['id'] ?>"><?= $kho['ten'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Hệ thống sẽ trừ tồn kho tại kho này.</p>
                    </div>

                    <!-- Kho Nhập -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Đến kho (Kho nhập) <span class="text-red-500">*</span></label>
                        <select id="khoNhap" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm" required onchange="checkKhoHopLe()">
                            <option value="">-- Chọn kho nhập --</option>
                            <?php foreach ($danhSachKho as $kho): ?>
                                <option value="<?= $kho['id'] ?>"><?= $kho['ten'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Hệ thống sẽ cộng tồn kho tại kho này.</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú điều chuyển</label>
                        <textarea rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm" placeholder="Nhập lý do thuyên chuyển..."></textarea>
                    </div>
                </div>
                <div id="khoError" class="hidden mt-3 p-3 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm flex items-center gap-2">
                    <span class="iconify text-lg" data-icon="mdi:alert-circle-outline"></span>
                    Kho xuất và Kho nhập không được trùng nhau!
                </div>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
                <h3 class="font-bold text-gray-900 text-lg flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:package-variant-closed"></span> Danh sách sản phẩm chuyển
                </h3>
            </div>
            
            <div class="p-6">
                <!-- Chọn sản phẩm -->
                <div class="mb-6 flex gap-3 relative">
                    <select id="selectSP" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm">
                        <option value="">-- Chọn sản phẩm để thêm vào phiếu --</option>
                        <?php foreach ($sanPhamList as $sp): ?>
                            <option value="<?= $sp['id'] ?>" data-name="<?= $sp['ten'] ?>" data-ton="<?= $sp['ton_kho'] ?>">
                                <?= $sp['id'] ?> - <?= $sp['ten'] ?> (Tồn: <?= $sp['ton_kho'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="button" onclick="addSP()" class="px-4 py-2 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors text-sm flex items-center gap-2 border border-gray-300 shadow-sm whitespace-nowrap">
                        <span class="iconify" data-icon="mdi:plus"></span> Thêm vào danh sách
                    </button>
                </div>

                <!-- Bảng chi tiết -->
                <div class="overflow-x-auto border border-gray-200 rounded-lg">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                                <th class="py-3 px-4 font-semibold w-12 text-center">STT</th>
                                <th class="py-3 px-4 font-semibold">Sản phẩm</th>
                                <th class="py-3 px-4 font-semibold text-center w-32">Tồn kho hiện tại<br>(Kho xuất)</th>
                                <th class="py-3 px-4 font-semibold text-center w-40">Số lượng chuyển</th>
                                <th class="py-3 px-4 font-semibold text-center w-16">Xóa</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-gray-100">
                            <!-- JS render here -->
                            <tr id="emptyRow">
                                <td colspan="5" class="py-8 text-center text-gray-500 text-sm">
                                    <span class="iconify text-4xl text-gray-300 mx-auto mb-2" data-icon="mdi:package-variant"></span>
                                    Chưa có sản phẩm nào được chọn
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-end gap-3 pt-4">
            <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                Hủy bỏ
            </a>
            <button type="submit" id="btnSubmit" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu phiếu chuyển kho
            </button>
        </div>
    </form>
</div>

<script>
    let listSP = [];
    
    function checkKhoHopLe() {
        const khoXuat = document.getElementById('khoXuat').value;
        const khoNhap = document.getElementById('khoNhap').value;
        const errorDiv = document.getElementById('khoError');
        const btnSubmit = document.getElementById('btnSubmit');

        if (khoXuat && khoNhap && khoXuat === khoNhap) {
            errorDiv.classList.remove('hidden');
            btnSubmit.disabled = true;
            btnSubmit.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            errorDiv.classList.add('hidden');
            btnSubmit.disabled = false;
            btnSubmit.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }

    function addSP() {
        const khoXuat = document.getElementById('khoXuat').value;
        if (!khoXuat) {
            alert('Vui lòng chọn Kho xuất trước khi thêm sản phẩm (để lấy số lượng tồn thực tế).');
            return;
        }

        const select = document.getElementById('selectSP');
        if(!select.value) return;

        const option = select.options[select.selectedIndex];
        const id = select.value;
        
        if(listSP.find(item => item.id === id)) {
            alert('Sản phẩm này đã có trong danh sách!');
            return;
        }

        listSP.push({
            id: id,
            name: option.getAttribute('data-name'),
            ton: parseInt(option.getAttribute('data-ton')),
            so_luong: 1
        });

        renderTable();
        select.value = '';
    }

    function removeSP(id) {
        listSP = listSP.filter(item => item.id !== id);
        renderTable();
    }

    function updateQty(id, input) {
        let val = parseInt(input.value) || 1;
        const item = listSP.find(i => i.id === id);
        
        if (val > item.ton) {
            alert(`Lỗi: Số lượng chuyển (${val}) không được vượt quá số lượng tồn kho hiện tại (${item.ton}).`);
            val = item.ton;
            input.value = val;
        }
        if (val < 1) {
            val = 1;
            input.value = val;
        }
        item.so_luong = val;
    }

    function renderTable() {
        const tbody = document.getElementById('tableBody');
        if(listSP.length === 0) {
            tbody.innerHTML = `
                <tr id="emptyRow">
                    <td colspan="5" class="py-8 text-center text-gray-500 text-sm">
                        <span class="iconify text-4xl text-gray-300 mx-auto mb-2" data-icon="mdi:package-variant"></span>
                        Chưa có sản phẩm nào được chọn
                    </td>
                </tr>`;
            return;
        }

        tbody.innerHTML = listSP.map((sp, index) => `
            <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="py-3 px-4 text-center text-sm text-gray-500">${index + 1}</td>
                <td class="py-3 px-4">
                    <div class="font-medium text-gray-900">${sp.name}</div>
                    <div class="text-xs text-gray-500">Mã: ${sp.id}</div>
                </td>
                <td class="py-3 px-4 text-center">
                    <span class="font-bold text-gray-900">${sp.ton}</span>
                </td>
                <td class="py-3 px-4 text-center">
                    <input type="number" min="1" max="${sp.ton}" value="${sp.so_luong}" onchange="updateQty('${sp.id}', this)" class="w-20 px-2 py-1.5 border border-gray-300 rounded text-center text-sm focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900">
                </td>
                <td class="py-3 px-4 text-center">
                    <button type="button" onclick="removeSP('${sp.id}')" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                        <span class="iconify text-lg" data-icon="mdi:delete-outline"></span>
                    </button>
                </td>
            </tr>
        `).join('');
    }
</script>
