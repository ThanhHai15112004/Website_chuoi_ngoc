<?php
// views/components/Admin/quan_ly_cua_hang/form_basic_info.php
?>
<div class="bg-white rounded-[20px] border border-gray-200 shadow-sm overflow-hidden" id="section-basic">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center gap-2">
        <span class="iconify text-gray-400 text-xl" data-icon="mdi:store-edit-outline"></span>
        <h2 class="font-bold text-gray-900 text-lg">Thông tin cơ bản</h2>
    </div>
    
    <div class="p-5 md:p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Tên cửa hàng <span class="text-red-500">*</span></label>
            <input type="text" id="inp-ten" name="ten_cua_hang" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18] transition-colors" value="<?= htmlspecialchars($storeConfig['ten_cua_hang'] ?? '', ENT_QUOTES) ?>" placeholder="Ví dụ: Chuỗi Ngọc Phong Thủy" required>
        </div>
        
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Tên thương hiệu ngắn</label>
            <input type="text" id="inp-thuong-hieu" name="thuong_hieu" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18] transition-colors" value="<?= htmlspecialchars($storeConfig['thuong_hieu'] ?? '', ENT_QUOTES) ?>" placeholder="Ví dụ: Chuỗi Ngọc">
            <p class="text-[11px] text-gray-400">Dùng cho SMS hoặc các không gian hiển thị hẹp.</p>
        </div>

        <div class="space-y-1 md:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Slogan / Câu khẩu hiệu</label>
            <input type="text" id="inp-slogan" name="slogan" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18] transition-colors" value="<?= htmlspecialchars($storeConfig['slogan'] ?? '', ENT_QUOTES) ?>" placeholder="Ví dụ: Vòng ngọc hợp mệnh, gửi may mắn trong từng hạt đá">
        </div>

        <div class="space-y-1 md:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Mô tả ngắn cửa hàng</label>
            <textarea id="inp-mota" name="mo_ta" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18] transition-colors" placeholder="Nhập mô tả ngắn về cửa hàng..."><?= htmlspecialchars($storeConfig['mo_ta'] ?? '', ENT_QUOTES) ?></textarea>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Hotline chính <span class="text-red-500">*</span></label>
            <input type="text" id="inp-hotline" name="hotline_chinh" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18] transition-colors" value="<?= htmlspecialchars($storeConfig['hotline_chinh'] ?? '', ENT_QUOTES) ?>" placeholder="Ví dụ: 0901234567" required>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Số điện thoại CSKH</label>
            <input type="text" id="inp-cskh" name="sdt_cskh" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18] transition-colors" value="<?= htmlspecialchars($storeConfig['sdt_cskh'] ?? '', ENT_QUOTES) ?>" placeholder="Dùng cho hỗ trợ kỹ thuật/khiếu nại">
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Email hỗ trợ <span class="text-red-500">*</span></label>
            <input type="email" id="inp-email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18] transition-colors" value="<?= htmlspecialchars($storeConfig['email'] ?? '', ENT_QUOTES) ?>" placeholder="hotro@example.com" required>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Giờ làm việc</label>
            <input type="text" id="inp-giolamviec" name="gio_lam_viec" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18] transition-colors" value="<?= htmlspecialchars($storeConfig['gio_lam_viec'] ?? '', ENT_QUOTES) ?>" placeholder="Ví dụ: 08:00 - 21:00, Thứ 2 - Chủ nhật">
        </div>
    </div>
</div>
