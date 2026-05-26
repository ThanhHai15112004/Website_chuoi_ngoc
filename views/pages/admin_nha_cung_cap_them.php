<!-- Trang Thêm/Sửa Nhà Cung Cấp -->
<?php 
$isEdit = $mode === 'edit'; 
$title = $isEdit ? 'Cập nhật nhà cung cấp' : 'Thêm nhà cung cấp mới';
// Dữ liệu mặc định nếu là thêm mới
$n = $isEdit ? $ncc : [
    'id' => '', 'ten' => '', 'nhom' => '', 'sdt' => '', 'email' => '', 
    'dia_chi' => '', 'mst' => '', 'stk' => '', 'ghi_chu' => ''
];
?>
<div class="px-6 py-6 pb-20 max-w-[1000px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex items-center gap-4 mb-6">
        <a href="<?= APP_URL ?>/admin/nha-cung-cap" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-900 leading-tight"><?= $title ?></h2>
            <p class="text-sm text-gray-500 mt-1"><?= $isEdit ? 'Cập nhật thông tin đối tác cung ứng.' : 'Khởi tạo hồ sơ đối tác cung ứng mới trên hệ thống.' ?></p>
        </div>
    </div>

    <form onsubmit="event.preventDefault(); alert('Lưu thông tin thành công!'); window.location.href='<?= APP_URL ?>/admin/nha-cung-cap';" class="space-y-6">
        
        <!-- Khối thông tin cơ bản -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
                <h3 class="font-bold text-gray-900 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:domain"></span> Thông tin cơ bản
                </h3>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tên NCC -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tên nhà cung cấp <span class="text-red-500">*</span></label>
                    <input type="text" required value="<?= $n['ten'] ?>" placeholder="VD: Xưởng gia công đá quý Hải Ngọc..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm">
                </div>

                <!-- Mã NCC -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mã nhà cung cấp</label>
                    <input type="text" value="<?= $n['id'] ?>" placeholder="Hệ thống tự sinh nếu để trống" <?= $isEdit ? 'readonly' : '' ?> class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm <?= $isEdit ? 'bg-gray-100 cursor-not-allowed' : '' ?>">
                </div>

                <!-- Nhóm NCC -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nhóm đối tác <span class="text-red-500">*</span></label>
                    <select required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm">
                        <option value="">-- Chọn nhóm --</option>
                        <option value="xuong_gia_cong" <?= $n['nhom'] === 'Xưởng gia công' ? 'selected' : '' ?>>Xưởng gia công</option>
                        <option value="cho_da_quy" <?= $n['nhom'] === 'Chợ đá quý' ? 'selected' : '' ?>>Chợ đá quý nguyên liệu</option>
                        <option value="doi_tac_vang_bac" <?= $n['nhom'] === 'Đối tác Vàng Bạc' ? 'selected' : '' ?>>Đối tác Vàng Bạc</option>
                        <option value="khac">Khác</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Khối liên hệ & Tài chính -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
                <h3 class="font-bold text-gray-900 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:card-account-details-outline"></span> Liên hệ & Tài khoản
                </h3>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- SĐT -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Số điện thoại <span class="text-red-500">*</span></label>
                    <input type="text" required value="<?= $n['sdt'] ?>" placeholder="SĐT liên hệ" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" value="<?= $n['email'] ?>" placeholder="Email đối tác" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm">
                </div>

                <!-- Địa chỉ -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Địa chỉ</label>
                    <input type="text" value="<?= $n['dia_chi'] ?>" placeholder="Địa chỉ chi tiết" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm">
                </div>

                <!-- MST -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mã số thuế</label>
                    <input type="text" value="<?= $n['mst'] ?>" placeholder="Nếu là công ty/tổ chức" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm">
                </div>

                <!-- STK Ngân hàng -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Số tài khoản thanh toán</label>
                    <input type="text" value="<?= $n['stk'] ?>" placeholder="VD: 1903... - Techcombank - Nguyen Van A" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm">
                </div>

                <!-- Ghi chú -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú thêm</label>
                    <textarea rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm" placeholder="Các lưu ý khi làm việc với đối tác này..."><?= $n['ghi_chu'] ?></textarea>
                </div>
            </div>
        </div>

        <!-- Nút lưu -->
        <div class="flex items-center justify-end gap-3 pt-2">
            <a href="<?= APP_URL ?>/admin/nha-cung-cap" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                Hủy bỏ
            </a>
            <button type="submit" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:content-save-outline"></span> LƯU NHÀ CUNG CẤP
            </button>
        </div>
    </form>
</div>
