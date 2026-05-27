        <!-- Khối 1: Thông tin cơ bản -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:information-outline"></span>
                    Thông tin cơ bản
                </h3>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tên mệnh</label>
                    <input type="text" value="<?= $destiny['ten_menh'] ?>" name="ten_menh" class="w-full md:w-1/2 px-4 py-2 border border-gray-200 rounded-lg text-sm bg-gray-50 text-gray-500 font-bold" required readonly>
                    <input type="hidden" name="slug" value="<?= $destiny['slug'] ?>">
                    <p class="text-xs text-gray-400 mt-1">Tên ngũ hành và slug là cố định, không thể thay đổi.</p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả ngắn</label>
                    <input type="text" value="<?= htmlspecialchars($destiny['mo_ta'] ?? '') ?>" name="mo_ta" placeholder="Ví dụ: Sự sinh sôi, phát triển..." class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả chi tiết & Ý nghĩa</label>
                    <p class="text-[11px] text-gray-400 mb-2">Nội dung phong thủy nên viết theo hướng tham khảo, tránh khẳng định tuyệt đối.</p>
                    <textarea name="mo_ta_chi_tiet" rows="4" placeholder="Nhập ý nghĩa chi tiết..." class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] resize-none leading-relaxed"><?= htmlspecialchars($destiny['mo_ta_chi_tiet'] ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <!-- Khối 2: Màu sắc -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:palette-outline"></span>
                    Màu sắc phong thủy
                </h3>
            </div>
            <div class="p-6 space-y-6">
                <!-- Màu đại diện -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">Màu đại diện</label>
                    <div class="flex items-center gap-3">
                        <input type="color" name="mau_dai_dien_hex" value="<?= $destiny['mau_dai_dien_hex'] ?? '#E5E7EB' ?>" class="w-10 h-10 rounded cursor-pointer border-0 p-0">
                        <span class="text-sm text-gray-500">Màu này dùng làm chấm màu (badge) hiển thị chung cho Mệnh.</span>
                    </div>
                </div>

                <hr class="border-gray-100">

                <?php 
                $allColors = ['Trắng', 'Bạc', 'Vàng', 'Nâu', 'Xanh lá', 'Xanh ngọc', 'Xanh dương', 'Đen', 'Đỏ', 'Hồng', 'Tím', 'Cam', 'Vàng đất', 'Nâu đất'];
                ?>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Màu hợp -->
                    <div>
                        <label class="block text-sm font-bold text-emerald-600 mb-3">Màu tương sinh / tương hợp</label>
                        <input type="hidden" name="mau_sac_hop" id="input_mau_hop" value="<?= htmlspecialchars($destiny['mau_sac_hop'] ?? '') ?>">
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($allColors as $c): 
                                $isChecked = in_array($c, $destiny['mau_hop']);
                            ?>
                                <label class="cursor-pointer">
                                    <input type="checkbox" class="peer hidden cb-mau-hop" value="<?= $c ?>" <?= $isChecked ? 'checked' : '' ?>>
                                    <div class="px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium text-gray-600 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:text-emerald-700 transition-all select-none">
                                        <?= $c ?>
                                    </div>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Màu kỵ -->
                    <div>
                        <label class="block text-sm font-bold text-red-500 mb-3">Màu tương khắc (Nên tránh)</label>
                        <input type="hidden" name="mau_ky" id="input_mau_ky" value="<?= htmlspecialchars(implode(', ', $destiny['mau_ky'] ?? [])) ?>">
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($allColors as $c): 
                                $isChecked = in_array($c, $destiny['mau_ky']);
                            ?>
                                <label class="cursor-pointer">
                                    <input type="checkbox" class="peer hidden cb-mau-ky" value="<?= $c ?>" <?= $isChecked ? 'checked' : '' ?>>
                                    <div class="px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium text-gray-600 peer-checked:border-red-500 peer-checked:bg-red-50 peer-checked:text-red-700 transition-all select-none">
                                        <?= $c ?>
                                    </div>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Khối 3: Đá & Nhu cầu -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden border-l-4 border-l-[#6B0D18]">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
                <h3 class="font-bold text-[#6B0D18] flex items-center gap-2">
                    <span class="iconify text-lg" data-icon="mdi:diamond-stone"></span>
                    Đá phong thủy & Nhu cầu
                </h3>
            </div>
            <div class="p-6 space-y-6">
                <!-- Nhu cầu phù hợp -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">Nhu cầu phù hợp</label>
                    <div class="flex flex-wrap gap-3">
                        <?php 
                        $nhucaus = ['Bình an', 'Tài lộc', 'May mắn', 'Tình duyên', 'Công việc', 'Sức khỏe tinh thần', 'Quà tặng', 'Trừ tà', 'Bảo trợ sức khỏe'];
                        foreach ($nhucaus as $n): 
                            $isChecked = in_array($n, $destiny['nhu_cau']);
                        ?>
                            <label class="cursor-pointer relative">
                                <input type="checkbox" name="nhu_cau[]" value="<?= $n ?>" class="peer hidden" <?= $isChecked ? 'checked' : '' ?>>
                                <div class="px-4 py-2 border border-gray-200 rounded-full text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18] peer-checked:text-white transition-all select-none">
                                    <?= $n ?>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- Loại đá phù hợp -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <label class="block text-sm font-bold text-gray-700">Loại đá / ngọc gợi ý (Chỉ đọc, chỉnh sửa bên quản lý Loại đá)</label>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <?php foreach ($destiny['da_hop'] as $da): ?>
                            <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg bg-gray-50 group">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-white border border-gray-200 rounded-full flex items-center justify-center shrink-0">
                                        <span class="iconify text-gray-400" data-icon="mdi:diamond-stone"></span>
                                    </div>
                                    <div class="min-w-0">
                                        <h5 class="text-sm font-bold text-gray-800 truncate"><?= $da['ten'] ?></h5>
                                        <p class="text-[10px] text-gray-500"><?= $da['mau'] ?> • <?= $da['nhom'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Khối 4: Quản lý Năm sinh -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:calendar-account-outline"></span>
                    Năm sinh cấu hình
                </h3>
                <button type="button" class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-xs font-bold hover:bg-[#8A111F] transition-colors flex items-center gap-1" onclick="document.getElementById('addYearModal').classList.remove('hidden')">
                    <span class="iconify" data-icon="mdi:plus"></span> Thêm năm sinh
                </button>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3" id="namSinhContainer">
                    <?php foreach ($destiny['nam_sinh'] as $index => $ns): ?>
                        <div class="flex items-center justify-between px-3 py-2 border border-gray-200 rounded-lg hover:border-[#6B0D18] transition-colors group relative bg-white">
                            <div>
                                <h5 class="text-sm font-bold text-gray-800"><?= $ns['nam'] ?></h5>
                                <p class="text-[10px] text-gray-500"><?= $ns['can_chi'] ?></p>
                                <input type="hidden" name="nam_sinh[<?= $index ?>][nam]" value="<?= $ns['nam'] ?>">
                                <input type="hidden" name="nam_sinh[<?= $index ?>][can_chi]" value="<?= $ns['can_chi'] ?>">
                            </div>
                            <button type="button" onclick="this.parentElement.remove()" class="text-gray-400 hover:text-red-500 transition-colors opacity-0 group-hover:opacity-100" title="Xóa">
                                <span class="iconify" data-icon="mdi:trash-can-outline"></span>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Khối 5: Sản phẩm gợi ý -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hidden">
            <!-- Hidden by default, products load via stones automatically -->
        </div>

        <!-- Khối 6: SEO & Trạng thái -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="iconify text-gray-400" data-icon="mdi:web"></span>
                        Nội dung hiển thị trên User (Vòng theo mệnh)
                    </h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề hiển thị (SEO)</label>
                        <input type="text" name="seo_tieu_de" value="<?= htmlspecialchars($destiny['seo_tieu_de'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Đoạn giới thiệu ngắn (SEO)</label>
                        <textarea name="seo_mo_ta" rows="3" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"><?= htmlspecialchars($destiny['seo_mo_ta'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span>
                        Trạng thái hiển thị
                    </h3>
                </div>
                <div class="p-6">
                    <label class="block text-sm font-medium text-gray-800 mb-3">Hiển thị trên trang User?</label>
                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="trang_thai" value="1" <?= $destiny['trang_thai'] == 1 ? 'checked' : '' ?> class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                            <span class="text-sm font-medium text-emerald-600">Đang hiển thị</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="trang_thai" value="0" <?= $destiny['trang_thai'] == 0 ? 'checked' : '' ?> class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                            <span class="text-sm text-gray-500">Ẩn đi</span>
                        </label>
                    </div>
                    <p class="text-xs text-gray-500 mt-4 leading-relaxed bg-gray-50 p-3 rounded-lg border border-gray-100">Nếu tắt, mệnh này sẽ không hiển thị ở các trang gợi ý hoặc bộ lọc người dùng, nhưng dữ liệu vẫn được bảo lưu.</p>
                </div>
            </div>

        </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxesHop = document.querySelectorAll('.cb-mau-hop');
        const inputMauHop = document.getElementById('input_mau_hop');
        
        checkboxesHop.forEach(cb => {
            cb.addEventListener('change', function() {
                const selected = Array.from(checkboxesHop).filter(i => i.checked).map(i => i.value);
                inputMauHop.value = selected.join(', ');
            });
        });

        const checkboxesKy = document.querySelectorAll('.cb-mau-ky');
        const inputMauKy = document.getElementById('input_mau_ky');
        
        checkboxesKy.forEach(cb => {
            cb.addEventListener('change', function() {
                const selected = Array.from(checkboxesKy).filter(i => i.checked).map(i => i.value);
                inputMauKy.value = selected.join(', ');
            });
        });
    });
</script>
