<!-- Trang Lập Phiếu Kiểm Kê Kho -->
<div class="px-6 py-6 pb-32 max-w-[1200px] mx-auto min-h-screen bg-[#FAF8F5]">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex items-center gap-4 mb-6">
        <a href="<?= APP_URL ?>/admin/kiem-ke" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">Tạo phiếu kiểm kê</h2>
            <p class="text-sm text-gray-500 mt-1">Lập danh sách sản phẩm để thực hiện đếm đối chiếu tồn kho thực tế.</p>
        </div>
    </div>

    <form onsubmit="event.preventDefault(); window.location.href='<?= APP_URL ?>/admin/kiem-ke/chi-tiet/KK202600124';" class="space-y-6">
        
        <!-- 1. Thông tin phiếu kiểm kê -->
        <?php require_once __DIR__ . '/../components/Admin/kiem_ke/form/form_info.php'; ?>

        <!-- 2. Sản phẩm kiểm kê -->
        <?php require_once __DIR__ . '/../components/Admin/kiem_ke/form/form_products.php'; ?>

        <!-- 3. Người thực hiện & Ghi chú -->
        <?php require_once __DIR__ . '/../components/Admin/kiem_ke/form/form_assignees.php'; ?>

        <!-- Sticky Bottom Actions -->
        <div class="fixed bottom-0 left-0 right-0 lg:left-64 bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40">
            <div class="max-w-[1200px] mx-auto flex items-center justify-between">
                <button type="button" onclick="alert('Đã hủy tạo phiếu!')" class="text-red-500 hover:text-red-700 text-sm font-medium">Hủy tạo phiếu</button>
                <div class="flex items-center gap-3">
                    <button type="button" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                        Lưu nháp
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20 flex items-center gap-2">
                        Tạo & Bắt đầu kiểm kê <span class="iconify" data-icon="mdi:arrow-right"></span>
                    </button>
                </div>
            </div>
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
            ton_he_thong: tonHt
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

        if(listSP.length > 0 && !confirm("Tải toàn bộ sẽ ghi đè danh sách hiện tại. Tiếp tục?")) {
            return;
        }

        // Tải mock toàn bộ SP
        listSP = mockSanPhamList.map(sp => ({
            id: sp.id,
            name: sp.ten,
            ton_he_thong: sp.ton_he_thong
        }));

        renderTable();
    }

    function removeSP(id) {
        listSP = listSP.filter(item => item.id !== id);
        renderTable();
    }

    function renderTable() {
        const tbody = document.getElementById('tableBody');
        const countDisplay = document.getElementById('totalProductsCount');
        countDisplay.textContent = listSP.length;

        if(listSP.length === 0) {
            tbody.innerHTML = `
                <tr id="emptyRow">
                    <td colspan="6" class="py-12 text-center text-gray-500 text-sm bg-gray-50/30">
                        <span class="iconify text-5xl text-gray-300 mx-auto mb-3" data-icon="mdi:package-variant"></span>
                        <p class="font-medium text-gray-600 mb-1">Chưa có sản phẩm nào được chọn</p>
                        <p class="text-xs text-gray-400">Vui lòng chọn sản phẩm hoặc bấm "Thêm toàn bộ Kho"</p>
                    </td>
                </tr>`;
            return;
        }

        tbody.innerHTML = listSP.map((sp, index) => {
            return `
            <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="py-3 px-4 text-center text-sm text-gray-500">${index + 1}</td>
                <td class="py-3 px-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded bg-gray-200 shrink-0 border border-gray-300 flex items-center justify-center text-gray-400">
                            <span class="iconify text-xl" data-icon="mdi:image-outline"></span>
                        </div>
                        <div>
                            <div class="font-medium text-gray-900 text-sm">${sp.name}</div>
                        </div>
                    </div>
                </td>
                <td class="py-3 px-4 text-center">
                    <span class="text-sm font-bold text-gray-700">${sp.id}</span>
                </td>
                <td class="py-3 px-4 text-center">
                    <span class="font-bold text-gray-900">${sp.ton_he_thong}</span>
                </td>
                <td class="py-3 px-4">
                    <input type="text" placeholder="Nhập ghi chú (nếu có)..." class="w-full px-2 py-1.5 border border-transparent hover:border-gray-300 focus:border-[#6B0D18] focus:bg-white bg-gray-50 rounded text-sm transition-colors focus:outline-none">
                </td>
                <td class="py-3 px-4 text-center">
                    <button type="button" onclick="removeSP('${sp.id}')" class="p-1.5 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                        <span class="iconify text-xl" data-icon="mdi:trash-can-outline"></span>
                    </button>
                </td>
            </tr>
            `;
        }).join('');
    }
</script>
