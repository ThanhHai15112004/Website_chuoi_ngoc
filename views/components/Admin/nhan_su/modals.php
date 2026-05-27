<?php
// views/components/Admin/nhan_su/modals.php
?>
<!-- Modal Khóa Tài Khoản -->
<div id="lockModal" class="fixed inset-0 bg-black/50 z-[60] hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4 overflow-hidden transform transition-all scale-95 opacity-0" id="lockModalContent">
        <div class="p-6">
            <div class="flex items-start gap-4 mb-4">
                <div class="w-12 h-12 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-2xl" data-icon="mdi:account-lock"></span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Khóa tài khoản nhân viên?</h3>
                    <p class="text-sm text-gray-500">Nhân viên này sẽ không thể đăng nhập vào hệ thống Admin cho đến khi được mở khóa. Các phiên đăng nhập hiện tại sẽ bị đăng xuất.</p>
                </div>
            </div>

            <div class="space-y-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lý do khóa <span class="text-red-500">*</span></label>
                    <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-colors text-sm text-gray-700">
                        <option value="">Chọn lý do...</option>
                        <option value="1">Nhân viên nghỉ việc / Thôi việc</option>
                        <option value="2">Tạm ngừng công việc</option>
                        <option value="3">Nghi ngờ tài khoản bị lộ</option>
                        <option value="4">Vi phạm quy trình làm việc</option>
                        <option value="5">Lý do khác</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú thêm</label>
                    <textarea rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-colors text-sm" placeholder="Nhập ghi chú chi tiết..."></textarea>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <button onclick="closeLockModal()" class="px-4 py-2 bg-white text-gray-700 font-medium rounded-lg hover:bg-gray-50 border border-gray-200 transition-colors text-sm shadow-sm">Hủy bỏ</button>
                <button onclick="confirmLock()" class="px-6 py-2 bg-orange-600 text-white font-bold rounded-lg hover:bg-orange-700 transition-colors text-sm shadow-md">Khóa tài khoản</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Reset Password -->
<div id="resetPasswordModal" class="fixed inset-0 bg-black/50 z-[60] hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4 overflow-hidden transform transition-all scale-95 opacity-0" id="resetPasswordModalContent">
        <div class="p-6">
            <div class="flex items-start gap-4 mb-4">
                <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-2xl" data-icon="mdi:lock-reset"></span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Đặt lại mật khẩu?</h3>
                    <p class="text-sm text-gray-500">Hệ thống sẽ gửi email chứa liên kết đặt lại mật khẩu hoặc cung cấp mật khẩu tạm thời cho nhân viên <span class="font-bold text-gray-900">thanhhai@example.com</span>.</p>
                </div>
            </div>

            <div class="space-y-3 mb-6">
                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50/50">
                    <input type="radio" name="resetMethod" value="email" class="mt-0.5 w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-600" checked>
                    <div>
                        <p class="text-sm font-bold text-gray-900 mb-0.5">Gửi link qua Email</p>
                        <p class="text-xs text-gray-500">Nhân viên sẽ nhận email và tự đặt lại mật khẩu mới.</p>
                    </div>
                </label>

                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50/50">
                    <input type="radio" name="resetMethod" value="temp" class="mt-0.5 w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-600">
                    <div>
                        <p class="text-sm font-bold text-gray-900 mb-0.5">Tạo mật khẩu tạm thời</p>
                        <p class="text-xs text-gray-500">Hệ thống sinh mật khẩu ngẫu nhiên. Nhân viên phải đổi mật khẩu khi đăng nhập lần đầu.</p>
                    </div>
                </label>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <button onclick="closeResetPasswordModal()" class="px-4 py-2 bg-white text-gray-700 font-medium rounded-lg hover:bg-gray-50 border border-gray-200 transition-colors text-sm shadow-sm">Hủy bỏ</button>
                <button onclick="confirmResetPassword()" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition-colors text-sm shadow-md flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:send-outline"></span> Xác nhận
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Xóa Tài Khoản -->
<div id="deleteModal" class="fixed inset-0 bg-black/50 z-[60] hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4 overflow-hidden transform transition-all scale-95 opacity-0" id="deleteModalContent">
        <div class="p-6">
            <div class="flex items-start gap-4 mb-4">
                <div class="w-12 h-12 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-2xl" data-icon="mdi:delete-outline"></span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Xóa tài khoản nhân viên?</h3>
                    <p class="text-sm text-gray-500">Tài khoản này sẽ bị xóa khỏi hệ thống. Thao tác này không thể hoàn tác.</p>
                </div>
            </div>
            
            <div class="bg-orange-50 border border-orange-200 p-3 rounded-lg mb-6">
                <p class="text-xs text-orange-700 font-medium flex items-center gap-1.5 mb-1">
                    <span class="iconify text-orange-500" data-icon="mdi:alert-outline"></span> Lời khuyên
                </p>
                <p class="text-xs text-orange-600">Nếu nhân viên này đã có lịch sử thao tác, bạn nên chọn <strong>Khóa tài khoản</strong> để giữ lại log lịch sử thay vì xóa hoàn toàn.</p>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <button onclick="closeDeleteModal()" class="px-4 py-2 bg-white text-gray-700 font-medium rounded-lg hover:bg-gray-50 border border-gray-200 transition-colors text-sm shadow-sm">Hủy bỏ</button>
                <button onclick="confirmDelete()" class="px-6 py-2 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition-colors text-sm shadow-md">Xóa vĩnh viễn</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Lock Modal
    function openLockModal() {
        const modal = document.getElementById('lockModal');
        const content = document.getElementById('lockModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeLockModal() {
        const modal = document.getElementById('lockModal');
        const content = document.getElementById('lockModalContent');
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function confirmLock() {
        closeLockModal();
        alert('Tài khoản đã bị khóa.');
    }

    // Unlock Modal Mock
    function openUnlockModal() {
        if(confirm("Bạn có chắc chắn muốn mở khóa tài khoản này?")) {
            alert("Tài khoản đã được mở khóa.");
        }
    }

    // Reset Password Modal
    function openResetPasswordModal() {
        const modal = document.getElementById('resetPasswordModal');
        const content = document.getElementById('resetPasswordModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeResetPasswordModal() {
        const modal = document.getElementById('resetPasswordModal');
        const content = document.getElementById('resetPasswordModalContent');
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function confirmResetPassword() {
        closeResetPasswordModal();
        alert('Yêu cầu đặt lại mật khẩu đã được xử lý.');
    }

    // Delete Modal
    function openDeleteModal() {
        const modal = document.getElementById('deleteModal');
        const content = document.getElementById('deleteModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        const content = document.getElementById('deleteModalContent');
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function confirmDelete() {
        closeDeleteModal();
        alert('Tài khoản đã bị xóa vĩnh viễn.');
    }
</script>
