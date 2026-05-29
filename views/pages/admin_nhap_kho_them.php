<?php
// views/pages/admin_nhap_kho_them.php
$current_page = 'nhap_kho';
$isEdit = $isEdit ?? false;
$id = $id ?? '';
$title = $isEdit ? 'Sửa phiếu nhập kho' : 'Tạo phiếu nhập kho';
?>
<div class="max-w-6xl mx-auto">
    
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/nhap-kho" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight"><?= $title ?></h1>
                <div class="text-sm text-gray-500 mt-0.5 flex items-center gap-2">
                    <a href="<?= APP_URL ?>/admin/nhap-kho" class="hover:text-[#6B0D18]">Phiếu nhập kho</a>
                    <span class="iconify text-xs" data-icon="mdi:chevron-right"></span>
                    <span><?= $isEdit ? $id : 'Tạo mới' ?></span>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm">
                Hủy bỏ
            </button>
            <button onclick="saveAndSend(true)" type="button" class="px-6 py-2 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 font-medium text-sm transition-colors shadow-sm">
                Lưu nháp
            </button>
            <button onclick="saveAndSend(false)" type="button" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:send"></span> Gửi kiểm hàng
            </button>
        </div>
    </div>

    <form action="#" method="POST">
        <!-- Khối 1: Thông tin phiếu -->
        <?php require_once __DIR__ . '/../components/Admin/nhap_kho/form/form_info.php'; ?>

        <!-- Khối 2: Nhà cung cấp & Kho nhập -->
        <?php require_once __DIR__ . '/../components/Admin/nhap_kho/form/form_supplier.php'; ?>

        <!-- Khối 3: Bảng Sản phẩm -->
        <?php require_once __DIR__ . '/../components/Admin/nhap_kho/form/form_products.php'; ?>

        <!-- Khối 4: Thanh toán & Ghi chú -->
        <?php require_once __DIR__ . '/../components/Admin/nhap_kho/form/form_payment.php'; ?>
    </form>

</div>

<!-- Modal Thêm Sản Phẩm -->
<?php require_once __DIR__ . '/../components/Admin/shared/modal_add_product.php'; ?>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]">
    <div class="bg-emerald-100 rounded-full p-1" id="toast-icon-bg">
        <span class="iconify text-emerald-600" data-icon="mdi:check" id="toast-icon"></span>
    </div>
    <div>
        <h4 class="text-sm font-bold text-gray-900" id="toast-title">Thành công</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toast-msg">Thao tác thành công.</p>
    </div>
    <button type="button" onclick="hideToast()" class="text-gray-400 hover:text-gray-600 ml-4"><span class="iconify" data-icon="mdi:close"></span></button>
</div>

<script>
    let toastTimeout;
    function showToast(msg, type = 'success') {
        const toast = document.getElementById('toast');
        const toastTitle = document.getElementById('toast-title');
        const toastMsg = document.getElementById('toast-msg');
        const toastIconBg = document.getElementById('toast-icon-bg');
        const toastIcon = document.getElementById('toast-icon');

        toastMsg.textContent = msg;

        if (type === 'success') {
            toast.className = 'fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]';
            toastIconBg.className = 'bg-emerald-100 rounded-full p-1';
            toastIcon.className = 'iconify text-emerald-600';
            toastIcon.setAttribute('data-icon', 'mdi:check');
            toastTitle.textContent = 'Thành công';
        } else {
            toast.className = 'fixed bottom-6 right-6 bg-white border-l-4 border-rose-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]';
            toastIconBg.className = 'bg-rose-100 rounded-full p-1';
            toastIcon.className = 'iconify text-rose-600';
            toastIcon.setAttribute('data-icon', 'mdi:alert-circle-outline');
            toastTitle.textContent = 'Lỗi';
        }

        void toast.offsetWidth;
        toast.classList.remove('translate-y-20', 'opacity-0');
        
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            hideToast();
        }, 3000);
    }

    function hideToast() {
        const toast = document.getElementById('toast');
        toast.classList.add('translate-y-20', 'opacity-0');
    }

    async function saveAndSend(isDraft = false) {
        if (typeof nkProducts === 'undefined' || nkProducts.length === 0) {
            showToast('Vui lòng thêm ít nhất 1 sản phẩm vào phiếu nhập.', 'error');
            return;
        }

        const payload = {
            ma_phieu: document.getElementById('nk_ma_phieu')?.value || '',
            loai_phieu: 1,
            ly_do: document.getElementById('nk_loai_phieu')?.value || 'Nhập hàng',
            muc_do_uu_tien: document.getElementById('nk_muc_do_uu_tien')?.value || '0',
            ngay_du_kien: document.getElementById('nk_ngay_du_kien')?.value || '',
            id_nha_cung_cap: document.getElementById('nk_id_nha_cung_cap')?.value || '',
            id_kho: document.getElementById('nk_id_kho')?.value || '1',
            ghi_chu: document.getElementById('nk_ghi_chu')?.value || '',
            tien_da_tra: document.getElementById('nk_tien_da_tra')?.value || 0,
            tong_tien: document.getElementById('nk_tong_tien')?.value || 0,
            trang_thai: isDraft ? 0 : 1, // 0: Nháp, 1: Chờ duyệt
            chi_tiet: nkProducts.map(p => ({
                id_bien_the: p.id,
                so_luong: p.qty,
                don_gia: p.price,
                ghi_chu_ct: p.note
            }))
        };

        try {
            const res = await fetch('<?= APP_URL ?>/admin/nhap-kho/luu', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => window.location.href = '<?= APP_URL ?>/admin/nhap-kho', 1000);
            } else {
                showToast('Lỗi: ' + data.message, 'error');
            }
        } catch (err) {
            console.error(err);
            showToast('Có lỗi xảy ra khi kết nối đến máy chủ.', 'error');
        }
    }
</script>
