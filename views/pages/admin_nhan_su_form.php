<?php
// views/pages/admin_nhan_su_form.php
?>
<div class="px-4 md:px-6 py-6 pb-24 max-w-[1400px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-4">
        <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18] transition-colors">Admin</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <a href="<?= APP_URL ?>/admin/quan-ly-cua-hang" class="hover:text-[#6B0D18] transition-colors">Cấu hình cửa hàng</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <a href="<?= APP_URL ?>/admin/nhan-su" class="hover:text-[#6B0D18] transition-colors">Quản lý nhân sự</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span class="text-gray-900 font-medium"><?= isset($id) ? 'Sửa thông tin nhân viên' : 'Thêm nhân viên mới' ?></span>
    </nav>

    <!-- Tiêu đề trang & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">
                <?= isset($id) ? 'Sửa thông tin nhân viên' : 'Thêm nhân viên mới' ?>
            </h1>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="window.history.back()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:arrow-left"></span> Hủy
            </button>
            <button class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu thông tin
            </button>
        </div>
    </div>

    <form id="staffForm">
        <!-- Layout 2 cột -->
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">
            
            <!-- Cột trái (8) -->
            <div class="xl:col-span-8 space-y-6">
                <!-- Thông tin tài khoản -->
                <?php require_once __DIR__ . '/../components/Admin/nhan_su/form_content.php'; ?>
                
                <!-- Vai trò & Quyền -->
                <?php require_once __DIR__ . '/../components/Admin/nhan_su/form_permissions.php'; ?>
            </div>

            <!-- Cột phải (4) -->
            <div class="xl:col-span-4 space-y-6">
                
                <!-- Trạng thái -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                    <h3 class="font-bold text-gray-900 mb-4 pb-3 border-b border-gray-100 flex items-center gap-2">
                        <span class="iconify text-gray-400 text-lg" data-icon="mdi:toggle-switch-outline"></span> Trạng thái tài khoản
                    </h3>
                    <div class="space-y-4">
                        <label class="flex items-start gap-3 p-3 border border-emerald-200 bg-emerald-50/50 rounded-lg cursor-pointer">
                            <input type="radio" name="status" value="active" class="mt-0.5 w-4 h-4 text-emerald-600 border-gray-300 focus:ring-emerald-600" checked>
                            <div>
                                <p class="text-sm font-bold text-emerald-800 mb-0.5">Đang hoạt động</p>
                                <p class="text-xs text-emerald-600">Nhân viên có thể đăng nhập bình thường.</p>
                            </div>
                        </label>

                        <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                            <input type="radio" name="status" value="pending" class="mt-0.5 w-4 h-4 text-[#6B0D18] border-gray-300 focus:ring-[#6B0D18]">
                            <div>
                                <p class="text-sm font-bold text-gray-900 mb-0.5">Chờ kích hoạt</p>
                                <p class="text-xs text-gray-500">Hệ thống sẽ gửi email mời kích hoạt tài khoản.</p>
                            </div>
                        </label>
                        
                        <?php if(isset($id)): ?>
                        <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                            <input type="radio" name="status" value="locked" class="mt-0.5 w-4 h-4 text-red-600 border-gray-300 focus:ring-red-600">
                            <div>
                                <p class="text-sm font-bold text-red-600 mb-0.5">Tạm khóa / Vô hiệu hóa</p>
                                <p class="text-xs text-gray-500">Nhân viên không thể đăng nhập vào hệ thống.</p>
                            </div>
                        </label>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Thiết lập bảo mật -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                    <h3 class="font-bold text-gray-900 mb-4 pb-3 border-b border-gray-100 flex items-center gap-2">
                        <span class="iconify text-gray-400 text-lg" data-icon="mdi:shield-check-outline"></span> Thiết lập bảo mật
                    </h3>
                    <div class="space-y-4">
                        <?php if(!isset($id)): ?>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu khởi tạo <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" id="tempPassword" value="AutoPass123!" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18]" readonly>
                                <button type="button" class="absolute right-2 top-1/2 -translate-y-1/2 p-1 text-blue-600 hover:bg-blue-50 rounded text-xs font-bold transition-colors">
                                    Tạo ngẫu nhiên
                                </button>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Hệ thống sinh mật khẩu tự động cho nhân viên.</p>
                        </div>
                        <?php endif; ?>

                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked class="w-4 h-4 rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                            <span class="text-sm text-gray-700">Yêu cầu đổi mật khẩu ở lần đăng nhập đầu tiên</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                            <span class="text-sm text-gray-700">Gửi email thông báo cho nhân viên</span>
                        </label>
                    </div>
                </div>

                <!-- Ghi chú nội bộ -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                    <h3 class="font-bold text-gray-900 mb-4 pb-3 border-b border-gray-100 flex items-center gap-2">
                        <span class="iconify text-gray-400 text-lg" data-icon="mdi:note-edit-outline"></span> Ghi chú nội bộ
                    </h3>
                    <div>
                        <textarea rows="4" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm" placeholder="Nhập ghi chú nội bộ về nhân viên (chỉ Admin mới thấy)..."></textarea>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<?php if(isset($id)): ?>
<script>
    // Điền dữ liệu mock nếu là trang Edit
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('staffName').value = "Hải Admin";
        document.getElementById('staffEmail').value = "thanhhai@example.com";
        document.getElementById('staffPhone').value = "0901234567";
        document.getElementById('staffCode').value = "NV0001";
        document.getElementById('staffDept').value = "Quản trị";
        document.getElementById('roleSelect').value = "super_admin";
        
        // Cập nhật lại UI role
        handleRoleChange();
    });
</script>
<?php endif; ?>
