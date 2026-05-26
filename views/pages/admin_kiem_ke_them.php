<!-- Trang Tạo Phiếu Kiểm Kê -->
<div class="px-6 py-6 pb-20 max-w-[1200px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex items-center gap-4 mb-6">
        <a href="<?= APP_URL ?>/admin/kiem-ke" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">Lập phiếu kiểm kê</h2>
            <p class="text-sm text-gray-500 mt-1">Ghi nhận số lượng đếm được thực tế tại kho.</p>
        </div>
    </div>

    <form onsubmit="event.preventDefault(); alert('Đã lưu phiếu kiểm kê nháp!'); window.location.href='<?= APP_URL ?>/admin/kiem-ke';" class="space-y-6">
        <!-- Thông tin chung -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
                <h3 class="font-bold text-gray-900 text-lg flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:information-outline"></span> Thông tin kiểm kê
                </h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kho Kiểm Kê -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kho cần kiểm kê <span class="text-red-500">*</span></label>
                        <select id="khoKiemKe" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm" required onchange="resetList()">
                            <option value="">-- Chọn kho để kiểm kê --</option>
                            <?php foreach ($danhSachKho as $kho): ?>
                                <option value="<?= $kho['id'] ?>"><?= $kho['ten'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú / Lý do kiểm kê</label>
                        <textarea rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm" placeholder="VD: Kiểm kê định kỳ tháng 10..."></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                <h3 class="font-bold text-gray-900 text-lg flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:package-variant-closed"></span> Danh sách sản phẩm kiểm kê
                </h3>
                <button type="button" onclick="loadAllSP()" class="px-4 py-2 bg-gray-100 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium shadow-sm flex items-center gap-2">
                    <span class="iconify text-lg" data-icon="mdi:download-multiple"></span> Tải toàn bộ SP trong kho này
                </button>
            </div>
            
            <div class="p-6">
                <!-- Chọn sản phẩm lẻ -->
                <div class="mb-6 flex gap-3 relative">
                    <select id="selectSP" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm">
                        <option value="">-- Chọn sản phẩm lẻ để thêm vào phiếu --</option>
                        <?php foreach ($sanPhamList as $sp): ?>
                            <option value="<?= $sp['id'] ?>" data-name="<?= $sp['ten'] ?>" data-ton="<?= $sp['ton_he_thong'] ?>">
                                <?= $sp['id'] ?> - <?= $sp['ten'] ?> (Tồn HT: <?= $sp['ton_he_thong'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="button" onclick="addSP()" class="px-4 py-2 bg-[#6B0D18] text-white font-medium rounded-lg hover:bg-red-900 transition-colors text-sm flex items-center gap-2 shadow-sm whitespace-nowrap">
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
                                <th class="py-3 px-4 font-semibold text-center w-32">Tồn hệ thống</th>
                                <th class="py-3 px-4 font-semibold text-center w-36">Tồn thực tế</th>
                                <th class="py-3 px-4 font-semibold text-center w-32">Chênh lệch</th>
                                <th class="py-3 px-4 font-semibold text-center w-16">Xóa</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-gray-100">
                            <!-- JS render here -->
                            <tr id="emptyRow">
                                <td colspan="6" class="py-8 text-center text-gray-500 text-sm">
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
            <a href="<?= APP_URL ?>/admin/kiem-ke" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                Hủy bỏ
            </a>
            <button type="submit" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu phiếu kiểm kê nháp
            </button>
        </div>
    </form>
</div>

<!-- Dữ liệu nguồn JS -->
<script>
    const mockSanPhamList = <?= json_encode($sanPhamList) ?>;
</script>

<script>
    let listSP = [];
    
    function resetList() {
        listSP = [];
        renderTable();
    }

    function addSP() {
        const kho = document.getElementById('khoKiemKe').value;
        if (!kho) {
            alert('Vui lòng chọn Kho kiểm kê trước.');
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

        const tonHt = parseInt(option.getAttribute('data-ton'));
        listSP.push({
            id: id,
            name: option.getAttribute('data-name'),
            ton_he_thong: tonHt,
            ton_thuc_te: tonHt, // Mặc định bằng tồn HT
            chenh_lech: 0
        });

        renderTable();
        select.value = '';
    }

    function loadAllSP() {
        const kho = document.getElementById('khoKiemKe').value;
        if (!kho) {
            alert('Vui lòng chọn Kho kiểm kê trước khi tải toàn bộ.');
            return;
        }

        // Xóa list cũ và nạp toàn bộ
        listSP = mockSanPhamList.map(sp => ({
            id: sp.id,
            name: sp.ten,
            ton_he_thong: sp.ton_he_thong,
            ton_thuc_te: sp.ton_he_thong, // Mặc định bằng tồn HT để nhân viên chỉ sửa con nào bị lệch
            chenh_lech: 0
        }));

        renderTable();
    }

    function removeSP(id) {
        listSP = listSP.filter(item => item.id !== id);
        renderTable();
    }

    function updateQty(id, input) {
        let val = parseInt(input.value);
        if (isNaN(val) || val < 0) {
            val = 0;
            input.value = 0;
        }
        
        const item = listSP.find(i => i.id === id);
        item.ton_thuc_te = val;
        item.chenh_lech = val - item.ton_he_thong;
        
        // Re-render chỉ dòng đó để mượt hơn, nhưng ở đây render lại cả bảng cho tiện
        renderTable();
    }

    function renderTable() {
        const tbody = document.getElementById('tableBody');
        if(listSP.length === 0) {
            tbody.innerHTML = `
                <tr id="emptyRow">
                    <td colspan="6" class="py-8 text-center text-gray-500 text-sm">
                        <span class="iconify text-4xl text-gray-300 mx-auto mb-2" data-icon="mdi:package-variant"></span>
                        Chưa có sản phẩm nào được chọn
                    </td>
                </tr>`;
            return;
        }

        tbody.innerHTML = listSP.map((sp, index) => {
            let chColor = 'text-gray-500';
            let chText = '0';
            let chBg = '';
            let icon = '<span class="iconify" data-icon="mdi:check"></span> Khớp';

            if (sp.chenh_lech > 0) {
                chColor = 'text-blue-600';
                chBg = 'bg-blue-50';
                chText = '+' + sp.chenh_lech;
                icon = `<span class="iconify" data-icon="mdi:trending-up"></span> Thừa ${chText}`;
            } else if (sp.chenh_lech < 0) {
                chColor = 'text-red-600';
                chBg = 'bg-red-50';
                chText = sp.chenh_lech;
                icon = `<span class="iconify" data-icon="mdi:trending-down"></span> Thiếu ${chText}`;
            }

            return `
            <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="py-3 px-4 text-center text-sm text-gray-500">${index + 1}</td>
                <td class="py-3 px-4">
                    <div class="font-medium text-gray-900">${sp.name}</div>
                    <div class="text-xs text-gray-500">Mã: ${sp.id}</div>
                </td>
                <td class="py-3 px-4 text-center">
                    <span class="font-bold text-gray-900">${sp.ton_he_thong}</span>
                </td>
                <td class="py-3 px-4 text-center">
                    <input type="number" min="0" value="${sp.ton_thuc_te}" onchange="updateQty('${sp.id}', this)" class="w-20 px-2 py-1.5 border border-gray-300 rounded text-center text-sm focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 font-bold text-[#6B0D18]">
                </td>
                <td class="py-3 px-4 text-center">
                    ${sp.chenh_lech === 0 ? 
                        `<span class="inline-flex items-center gap-1 font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded text-xs"><span class="iconify" data-icon="mdi:check"></span> Khớp</span>` 
                        : 
                        `<span class="inline-flex items-center gap-1 font-bold ${chColor} ${chBg} px-2 py-0.5 rounded text-xs">${icon}</span>`
                    }
                </td>
                <td class="py-3 px-4 text-center">
                    <button type="button" onclick="removeSP('${sp.id}')" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                        <span class="iconify text-lg" data-icon="mdi:delete-outline"></span>
                    </button>
                </td>
            </tr>
            `;
        }).join('');
    }
</script>
