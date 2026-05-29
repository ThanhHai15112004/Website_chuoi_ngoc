<?php
// views/pages/admin_nhap_kho_kiem.php
$current_page = 'nhap_kho';
?>
<div class="max-w-6xl mx-auto">
    
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/nhap-kho" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Kiểm hàng nhập kho</h1>
                <div class="text-sm text-gray-500 mt-0.5 flex items-center gap-2">
                    <a href="<?= APP_URL ?>/admin/nhap-kho" class="hover:text-[#6B0D18]">Phiếu nhập kho</a>
                    <span class="iconify text-xs" data-icon="mdi:chevron-right"></span>
                    <span>Kiểm hàng</span>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm">
                Lưu nháp
            </button>
            <button onclick="openModal('modalGuiDuyet')" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:send-check"></span> Gửi duyệt
            </button>
        </div>
    </div>

    <!-- Khối Header Kiểm hàng -->
    <?php require_once __DIR__ . '/../components/Admin/nhap_kho/kiem_hang/kiem_hang_header.php'; ?>

    <!-- Khối Bảng Kiểm hàng -->
    <?php require_once __DIR__ . '/../components/Admin/nhap_kho/kiem_hang/kiem_hang_table.php'; ?>

</div>

<!-- Modal Xác nhận Gửi duyệt -->
<div id="modalGuiDuyet" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform transition-all">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:send-check"></span>
                Gửi phiếu nhập để duyệt?
            </h3>
            <button onclick="closeModal('modalGuiDuyet')" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6">
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 flex gap-3 mb-4">
                <span class="iconify text-yellow-600 text-xl shrink-0" data-icon="mdi:alert"></span>
                <p class="text-sm text-yellow-800">Còn <span class="font-bold">1</span> sản phẩm chưa kiểm. Bạn có chắc chắn muốn gửi duyệt phiếu nhập này?</p>
            </div>
            
            <div class="space-y-2 text-sm text-gray-600 mb-4 bg-gray-50 p-4 rounded-lg border border-gray-100">
                <div class="flex justify-between">
                    <span>Tổng sản phẩm:</span>
                    <span class="font-medium text-gray-900">4</span>
                </div>
                <div class="flex justify-between">
                    <span>Sản phẩm đạt:</span>
                    <span class="font-medium text-emerald-600">2</span>
                </div>
                <div class="flex justify-between border-t border-dashed border-gray-200 pt-2">
                    <span>Sản phẩm có lỗi/thiếu:</span>
                    <span class="font-bold text-rose-600">1</span>
                </div>
            </div>

            <label class="flex items-start gap-2 cursor-pointer mt-2">
                <input type="checkbox" class="mt-0.5 rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                <span class="text-sm text-gray-700">Ghi chú cho người duyệt: "Sản phẩm MDC-QA-SP chưa được giao"</span>
            </label>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
            <button onclick="closeModal('modalGuiDuyet')" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                Quay lại kiểm tra
            </button>
            <button onclick="submitKiemHang()" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-red-900 shadow-sm">
                Xác nhận gửi duyệt
            </button>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        const el = document.getElementById(id);
        el.classList.remove('hidden');
        el.classList.add('flex');
    }
    
    function closeModal(id) {
        const el = document.getElementById(id);
        el.classList.add('hidden');
        el.classList.remove('flex');
    }

    async function submitKiemHang() {
        const rows = document.querySelectorAll('.sku-row');
        const chiTiet = [];
        rows.forEach(row => {
            chiTiet.push({
                id_chi_tiet: row.getAttribute('data-id'),
                so_luong_nhan: parseInt(row.querySelector('.qty-received').value) || 0,
                so_luong_loi: parseInt(row.querySelector('.qty-error').value) || 0,
                ly_do: row.querySelector('.note-error').value || ''
            });
        });

        const payload = { chi_tiet: chiTiet };

        try {
            const res = await fetch('<?= APP_URL ?>/admin/nhap-kho/kiem-hang/luu/<?= $id ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            
            if (data.success) {
                alert(data.message);
                window.location.href = '<?= APP_URL ?>/admin/nhap-kho';
            } else {
                alert('Lỗi: ' + data.message);
            }
        } catch (err) {
            console.error(err);
            alert('Có lỗi xảy ra khi kết nối đến máy chủ.');
        }
    }
</script>
