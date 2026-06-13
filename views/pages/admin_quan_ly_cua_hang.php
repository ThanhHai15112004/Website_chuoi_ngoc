<?php
// views/pages/admin_quan_ly_cua_hang.php
?>
<div class="px-4 md:px-6 py-6 pb-24 max-w-[1400px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-4">
        <a href="<?= APP_URL ?>/admin/tong-quan" class="hover:text-[#6B0D18] transition-colors">Admin</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span>Quản lý cửa hàng</span>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span class="text-gray-900 font-medium">Thông tin cửa hàng</span>
    </nav>

    <!-- Tiêu đề trang & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">Thông tin cửa hàng</h1>
            <p class="text-gray-500 mt-1 text-sm">Cập nhật thông tin thương hiệu, liên hệ, địa chỉ và nội dung hiển thị trên website.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="reloadStoreConfig()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm tooltip" title="Làm mới dữ liệu">
                <span class="iconify" data-icon="mdi:refresh" id="btn-refresh-icon"></span> <span class="hidden md:inline">Làm mới</span>
            </button>
            <a href="<?= APP_URL ?>" target="_blank" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:eye-outline"></span> Xem ngoài website
            </a>
            <button onclick="saveStoreConfig()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu thay đổi
            </button>
        </div>
    </div>

    <!-- Alert cảnh báo thiếu thông tin (ẩn nếu hoàn thiện 100%) -->
    <?php if (!empty($warnings)): ?>
    <div class="mb-6 bg-yellow-50 border border-yellow-200 rounded-xl p-4 flex items-start gap-3 shadow-sm" id="warning-alert">
        <div class="text-yellow-600 mt-0.5"><span class="iconify text-xl" data-icon="mdi:alert-circle-outline"></span></div>
        <div class="flex-1">
            <h4 class="font-bold text-yellow-800 text-sm">Hồ sơ cửa hàng chưa hoàn thiện</h4>
            <p class="text-yellow-700 text-sm mt-1 mb-2">Website của bạn còn thiếu một số thông tin quan trọng để vận hành tối ưu:</p>
            <ul class="text-sm text-yellow-700 list-disc list-inside mb-3">
                <?php foreach ($warnings as $w): ?>
                <li>Chưa hoàn thiện: <?= htmlspecialchars($w) ?></li>
                <?php endforeach; ?>
            </ul>
            <button onclick="document.getElementById('section-basic').scrollIntoView({behavior:'smooth'})" class="px-3 py-1.5 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 text-xs font-bold rounded-lg transition-colors">
                Hoàn thiện ngay
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Card trạng thái tiến độ -->
    <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/status_card.php'; ?>

    <!-- Layout 2 Cột -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 relative">
        
        <!-- CỘT TRÁI: Form Cấu hình (8 cột) -->
        <div class="lg:col-span-8 space-y-6">
            <form id="storeConfigForm">
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_basic_info.php'; ?>
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_branding.php'; ?>
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_address.php'; ?>
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_contact_channels.php'; ?>
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_seo.php'; ?>
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_legal.php'; ?>
            </form>
        </div>

        <!-- CỘT PHẢI: Preview Panel (4 cột) -->
        <div class="lg:col-span-4">
            <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/preview_panel.php'; ?>
        </div>

    </div>

    <!-- Thanh Lưu Thay Đổi Sticky (ẩn mặc định, hiện khi có thay đổi) -->
    <div id="stickySaveBar" class="fixed bottom-0 left-0 md:left-64 right-0 bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40 transform translate-y-full transition-transform duration-300 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
                <span class="iconify text-xl" data-icon="mdi:content-save-edit-outline"></span>
            </div>
            <div>
                <p class="font-bold text-gray-900">Bạn có thay đổi chưa lưu</p>
                <p class="text-xs text-gray-500">Hãy lưu lại để cập nhật hiển thị ngoài website.</p>
            </div>
        </div>
        <div class="flex gap-3">
            <button onclick="cancelChanges()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">Hủy thay đổi</button>
            <button onclick="saveStoreConfig()" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-md hover:shadow-lg">Lưu thay đổi</button>
        </div>
    </div>
</div>

<!-- Modal Xác nhận -->
<div id="confirmModal" class="fixed inset-0 bg-black/50 z-[60] hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4 overflow-hidden transform transition-all scale-95 opacity-0" id="confirmModalContent">
        <div class="p-6 text-center">
            <div class="w-16 h-16 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mx-auto mb-4">
                <span class="iconify text-3xl" data-icon="mdi:alert"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Xác nhận lưu thay đổi?</h3>
            <p class="text-sm text-gray-500 mb-6">Thông tin cửa hàng sẽ được cập nhật trên toàn bộ website. Bạn có chắc chắn muốn lưu?</p>
            <div class="flex gap-3 justify-center">
                <button onclick="closeConfirmModal()" class="px-4 py-2 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors text-sm">Kiểm tra lại</button>
                <button onclick="confirmSave()" id="btn-confirm-save" class="px-6 py-2 bg-[#6B0D18] text-white font-medium rounded-lg hover:bg-red-900 transition-colors text-sm shadow-md flex items-center gap-2">
                    <span class="iconify hidden animate-spin" data-icon="mdi:loading" id="save-spinner"></span>
                    Xác nhận lưu
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toast-container" class="fixed top-4 right-4 z-[70] flex flex-col gap-2 pointer-events-none"></div>

<script>
    // ==================================================
    // STATE
    // ==================================================
    let hasUnsavedChanges = false;
    let isSaving = false;
    const API_BASE = '<?= APP_URL ?>/admin/quan-ly-cua-hang';
    
    // ==================================================
    // TOAST NOTIFICATION
    // ==================================================
    function showToast(message, type = 'success', duration = 4000) {
        const container = document.getElementById('toast-container');
        const toast = document.createElement('div');
        
        const icons = {
            success: 'mdi:check-circle',
            error: 'mdi:alert-circle',
            warning: 'mdi:alert',
            info: 'mdi:information'
        };
        const colors = {
            success: 'bg-emerald-600',
            error: 'bg-red-600',
            warning: 'bg-amber-600',
            info: 'bg-blue-600'
        };
        
        toast.className = `pointer-events-auto flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg text-white text-sm font-medium ${colors[type] || colors.info} transform translate-x-full transition-transform duration-300`;
        toast.innerHTML = `
            <span class="iconify text-xl shrink-0" data-icon="${icons[type] || icons.info}"></span>
            <span class="flex-1">${message}</span>
            <button onclick="this.parentElement.remove()" class="shrink-0 hover:opacity-70">
                <span class="iconify" data-icon="mdi:close"></span>
            </button>
        `;
        
        container.appendChild(toast);
        
        // Animate in
        requestAnimationFrame(() => {
            toast.classList.remove('translate-x-full');
            toast.classList.add('translate-x-0');
        });
        
        // Auto remove
        setTimeout(() => {
            toast.classList.remove('translate-x-0');
            toast.classList.add('translate-x-full');
            setTimeout(() => toast.remove(), 300);
        }, duration);
    }

    // ==================================================
    // FORM CHANGE TRACKING
    // ==================================================
    document.getElementById('storeConfigForm').addEventListener('input', function() {
        if(!hasUnsavedChanges) {
            hasUnsavedChanges = true;
            document.getElementById('stickySaveBar').classList.remove('translate-y-full');
        }
        updatePreview();
    });

    // Track select changes too
    document.getElementById('storeConfigForm').addEventListener('change', function(e) {
        if (e.target.tagName === 'SELECT' || e.target.type === 'checkbox' || e.target.type === 'color') {
            if(!hasUnsavedChanges) {
                hasUnsavedChanges = true;
                document.getElementById('stickySaveBar').classList.remove('translate-y-full');
            }
            updatePreview();
        }
    });

    // ==================================================
    // SAVE FLOW
    // ==================================================
    function saveStoreConfig() {
        if (isSaving) return;
        
        // Hiển thị modal xác nhận
        document.getElementById('confirmModal').classList.remove('hidden');
        setTimeout(() => {
            document.getElementById('confirmModalContent').classList.remove('scale-95', 'opacity-0');
            document.getElementById('confirmModalContent').classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeConfirmModal() {
        document.getElementById('confirmModalContent').classList.remove('scale-100', 'opacity-100');
        document.getElementById('confirmModalContent').classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            document.getElementById('confirmModal').classList.add('hidden');
        }, 300);
    }

    function confirmSave() {
        if (isSaving) return;
        isSaving = true;

        const spinner = document.getElementById('save-spinner');
        const btnText = document.getElementById('btn-confirm-save');
        spinner.classList.remove('hidden');
        btnText.setAttribute('disabled', 'true');
        btnText.classList.add('opacity-70');

        // Collect form data
        const form = document.getElementById('storeConfigForm');
        const formData = new FormData(form);

        fetch(`${API_BASE}/api/luu`, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            isSaving = false;
            spinner.classList.add('hidden');
            btnText.removeAttribute('disabled');
            btnText.classList.remove('opacity-70');
            
            closeConfirmModal();

            if (data.success) {
                hasUnsavedChanges = false;
                document.getElementById('stickySaveBar').classList.add('translate-y-full');
                showToast(data.message || 'Đã lưu thành công!', 'success');
                
                // Cập nhật completion status nếu có
                if (data.completion) {
                    updateCompletionUI(data.completion);
                }
            } else {
                showToast(data.message || 'Lỗi khi lưu. Vui lòng thử lại.', 'error', 6000);
            }
        })
        .catch(err => {
            isSaving = false;
            spinner.classList.add('hidden');
            btnText.removeAttribute('disabled');
            btnText.classList.remove('opacity-70');
            closeConfirmModal();
            showToast('Lỗi kết nối server. Vui lòng kiểm tra lại.', 'error');
            console.error('Save error:', err);
        });
    }

    // ==================================================
    // RELOAD CONFIG
    // ==================================================
    function reloadStoreConfig() {
        const icon = document.getElementById('btn-refresh-icon');
        icon.classList.add('animate-spin');

        fetch(`${API_BASE}/api/load`)
        .then(res => res.json())
        .then(data => {
            icon.classList.remove('animate-spin');

            if (data.success) {
                populateForm(data.config);
                if (data.completion) {
                    updateCompletionUI(data.completion);
                }
                hasUnsavedChanges = false;
                document.getElementById('stickySaveBar').classList.add('translate-y-full');
                showToast('Đã tải lại dữ liệu từ server.', 'info');
                updatePreview();
            } else {
                showToast(data.message || 'Lỗi tải dữ liệu.', 'error');
            }
        })
        .catch(err => {
            icon.classList.remove('animate-spin');
            showToast('Lỗi kết nối server.', 'error');
            console.error('Load error:', err);
        });
    }

    function cancelChanges() {
        if(confirm('Bạn có chắc muốn hủy các thay đổi chưa lưu? Dữ liệu sẽ được tải lại từ server.')) {
            reloadStoreConfig();
        }
    }

    // ==================================================
    // POPULATE FORM FROM CONFIG DATA
    // ==================================================
    function populateForm(config) {
        const form = document.getElementById('storeConfigForm');
        
        // Text/email inputs & textareas
        const textFields = [
            'ten_cua_hang', 'thuong_hieu', 'slogan', 'mo_ta',
            'hotline_chinh', 'sdt_cskh', 'email', 'gio_lam_viec',
            'quan_huyen', 'phuong_xa', 'dia_chi_chi_tiet', 'google_map_iframe',
            'zalo', 'facebook', 'tiktok', 'shopee', 'youtube',
            'meta_title', 'meta_description', 'keywords',
            'ten_doanh_nghiep', 'ma_so_thue', 'dia_chi_dkkd'
        ];
        
        textFields.forEach(field => {
            const el = form.querySelector(`[name="${field}"]`);
            if (el) {
                if (el.tagName === 'TEXTAREA') {
                    el.textContent = config[field] || '';
                } else {
                    el.value = config[field] || '';
                }
            }
        });
        
        // Select fields
        const selectFields = ['tinh_thanh'];
        selectFields.forEach(field => {
            const el = form.querySelector(`select[name="${field}"]`);
            if (el) el.value = config[field] || '';
        });

        // Color input
        const colorInput = form.querySelector('[name="mau_thuong_hieu"]');
        if (colorInput) {
            colorInput.value = config.mau_thuong_hieu || '#6B0D18';
            const display = document.getElementById('color-display');
            if (display) display.textContent = config.mau_thuong_hieu || '#6B0D18';
        }
        
        // Checkbox/toggle fields
        const toggleFields = ['chi_ban_online', 'hien_thi_phap_ly', 'zalo_active', 'facebook_active', 'tiktok_active', 'shopee_active', 'youtube_active'];
        toggleFields.forEach(field => {
            const checkboxes = form.querySelectorAll(`input[name="${field}"][type="checkbox"]`);
            checkboxes.forEach(cb => {
                cb.checked = config[field] === '1';
            });
        });

        // Trigger address form toggle
        if (typeof toggleAddressForm === 'function') toggleAddressForm();

        // Update SEO preview
        const metaTitle = document.getElementById('inp-meta-title');
        const metaDesc = document.getElementById('inp-meta-desc');
        if (metaTitle) metaTitle.dispatchEvent(new Event('input'));
        if (metaDesc) metaDesc.dispatchEvent(new Event('input'));
    }

    // ==================================================
    // UPDATE COMPLETION UI
    // ==================================================
    function updateCompletionUI(completion) {
        const circumference = 226.2;
        const offset = circumference - (circumference * completion.percent / 100);
        
        // Update circle
        const circle = document.getElementById('progress-circle');
        if (circle) circle.setAttribute('stroke-dashoffset', offset);
        
        // Update percent text
        const percentEl = document.getElementById('progress-percent');
        if (percentEl) percentEl.textContent = completion.percent + '%';
        
        // Update checklist
        const checklist = document.getElementById('completion-checklist');
        if (checklist && completion.all) {
            checklist.innerHTML = completion.all.map(item => `
                <div class="flex items-center gap-2 ${item.done ? 'text-gray-700' : 'text-amber-600 font-medium'}">
                    <span class="iconify ${item.done ? 'text-emerald-500' : 'text-amber-500'} text-lg shrink-0" data-icon="${item.done ? 'mdi:check-circle' : 'mdi:alert-circle'}"></span>
                    ${item.label}
                </div>
            `).join('');
        }

        // Hide/show warning alert
        const warningAlert = document.getElementById('warning-alert');
        if (warningAlert) {
            if (completion.percent >= 100) {
                warningAlert.classList.add('hidden');
            }
        }
    }
</script>
