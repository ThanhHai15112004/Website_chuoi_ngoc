<?php
$has_address = !empty($dia_chi_mac_dinh);
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden relative">
    <!-- Đường viền mỏng ở trên -->
    <div class="h-1 w-full" style="background-image: repeating-linear-gradient(45deg, #6fa6d6, #6fa6d6 33px, transparent 0, transparent 41px, #f18d9b 0, #f18d9b 74px, transparent 0, transparent 82px);"></div>

    <!-- Hidden inputs LUÔN nằm ngoài để submit form -->
    <input type="hidden" name="ten_nguoi_nhan" id="hidden_ten" value="<?php echo htmlspecialchars($dia_chi_mac_dinh['ho_ten'] ?? ''); ?>">
    <input type="hidden" name="sdt_nguoi_nhan" id="hidden_sdt" value="<?php echo htmlspecialchars($dia_chi_mac_dinh['so_dien_thoai'] ?? ''); ?>">
    <input type="hidden" name="dia_chi" id="hidden_dia_chi" value="<?php 
        if ($has_address) {
            $parts = array_filter([$dia_chi_mac_dinh['dia_chi_cu_the'], $dia_chi_mac_dinh['phuong_xa'], $dia_chi_mac_dinh['quan_huyen'], $dia_chi_mac_dinh['tinh_thanh']]);
            echo htmlspecialchars(implode(', ', $parts));
        }
    ?>">

    <div class="p-5 lg:p-6">
        <div class="flex items-center gap-2 text-[#8B0000] mb-4">
            <iconify-icon icon="mdi:map-marker-outline" class="text-xl"></iconify-icon>
            <h2 class="text-lg font-bold">Địa chỉ nhận hàng</h2>
        </div>

        <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
            <!-- Hiển thị địa chỉ đã chọn -->
            <div id="address-display" class="flex-1">
                <?php if (!$has_address): ?>
                    <div class="text-gray-500 mb-3">Bạn chưa có địa chỉ nhận hàng. Vui lòng thêm số điện thoại và địa chỉ để shop giao hàng chính xác.</div>
                    <button type="button" onclick="openAddressFormModal()" class="inline-flex items-center gap-1 text-[#8B0000] font-medium border border-[#8B0000] rounded-lg px-4 py-2 hover:bg-red-50 transition-colors text-sm">
                        <iconify-icon icon="mdi:plus"></iconify-icon> Thêm địa chỉ nhận hàng
                    </button>
                <?php else: ?>
                    <div class="flex flex-col gap-1">
                        <div class="flex items-center gap-3">
                            <span class="font-bold text-gray-800 text-base" id="display-name"><?php echo htmlspecialchars($dia_chi_mac_dinh['ho_ten']); ?></span>
                            <span class="text-gray-300">|</span>
                            <span class="font-bold text-gray-800 text-base" id="display-phone"><?php echo htmlspecialchars($dia_chi_mac_dinh['so_dien_thoai']); ?></span>
                        </div>
                        <span class="text-gray-600 mt-1" id="display-address">
                            <?php 
                                $parts = array_filter([$dia_chi_mac_dinh['dia_chi_cu_the'], $dia_chi_mac_dinh['phuong_xa'], $dia_chi_mac_dinh['quan_huyen'], $dia_chi_mac_dinh['tinh_thanh']]);
                                echo htmlspecialchars(implode(', ', $parts)); 
                            ?>
                        </span>
                        <?php if ($dia_chi_mac_dinh['la_mac_dinh']): ?>
                            <div class="mt-1"><span class="inline-block border border-[#8B0000] text-[#8B0000] text-[10px] px-1.5 py-0.5 rounded">Mặc định</span></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="shrink-0" id="address-change-btn" <?= !$has_address ? 'style="display:none;"' : '' ?>>
                <button type="button" onclick="openAddressListModal()" class="inline-flex items-center gap-1 text-[#8B0000] font-medium hover:underline text-sm uppercase px-2 py-1">
                    Thay đổi <iconify-icon icon="mdi:chevron-right" class="text-lg"></iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>


