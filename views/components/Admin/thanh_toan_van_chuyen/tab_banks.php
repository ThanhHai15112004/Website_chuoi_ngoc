<?php
// views/components/Admin/thanh_toan_van_chuyen/tab_banks.php
?>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h3 class="text-lg font-bold text-gray-900">Danh sách tài khoản ngân hàng</h3>
        <p class="text-sm text-gray-500">Khách sẽ chuyển khoản vào các tài khoản này khi đặt hàng.</p>
    </div>
    <button onclick="addBank()" class="px-4 py-2 bg-[#6B0D18] text-white text-sm font-medium rounded-lg hover:bg-red-900 transition-colors shadow-sm flex items-center gap-1">
        <span class="iconify" data-icon="mdi:plus"></span> Thêm tài khoản
    </button>
</div>

<?php if(empty($banks)): ?>
<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-12 text-center">
    <span class="iconify text-gray-300 text-5xl mx-auto mb-3" data-icon="mdi:bank-outline"></span>
    <p class="text-gray-400">Chưa có tài khoản ngân hàng nào.</p>
</div>
<?php else: ?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach($banks as $bank): ?>
    <div class="bg-white rounded-2xl border <?= $bank['la_mac_dinh'] ? 'border-blue-500 shadow-md ring-1 ring-blue-500' : 'border-gray-200 shadow-sm' ?> overflow-hidden relative group" data-id="<?= $bank['id'] ?>">
        <?php if($bank['la_mac_dinh']): ?>
            <div class="absolute top-0 right-0 bg-blue-500 text-white text-[10px] font-bold px-3 py-1 rounded-bl-lg z-10">MẶC ĐỊNH</div>
        <?php endif; ?>
        
        <div class="p-5 flex justify-between items-start gap-4">
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center shrink-0">
                        <span class="iconify text-2xl" data-icon="mdi:bank"></span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 leading-tight"><?= htmlspecialchars($bank['ten_ngan_hang']) ?></h4>
                        <p class="text-xs text-gray-500">Chi nhánh: <?= htmlspecialchars($bank['chi_nhanh'] ?? 'N/A') ?></p>
                    </div>
                </div>
                
                <div class="space-y-2 mb-4">
                    <div>
                        <p class="text-[11px] text-gray-400 uppercase tracking-wider font-semibold">Chủ tài khoản</p>
                        <p class="font-bold text-gray-900 text-sm"><?= htmlspecialchars($bank['chu_tai_khoan']) ?></p>
                    </div>
                    <div>
                        <p class="text-[11px] text-gray-400 uppercase tracking-wider font-semibold">Số tài khoản</p>
                        <div class="flex items-center gap-2">
                            <p class="font-bold text-gray-900 text-lg tracking-wider"><?= htmlspecialchars($bank['so_tai_khoan']) ?></p>
                            <button onclick="navigator.clipboard.writeText('<?= $bank['so_tai_khoan'] ?>'); showToast('Đã copy số tài khoản!', 'success')" class="text-gray-400 hover:text-blue-600" title="Copy">
                                <span class="iconify" data-icon="mdi:content-copy"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="w-24 h-24 bg-gray-100 rounded-lg border border-gray-200 p-1 flex items-center justify-center shrink-0 overflow-hidden">
                <?php if(!empty($bank['qr_image'])): ?>
                    <img src="<?= $bank['qr_image'] ?>" class="w-full h-full object-contain" alt="QR Code">
                <?php else: ?>
                    <span class="iconify text-gray-300 text-4xl" data-icon="mdi:qrcode-scan"></span>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Actions footer -->
        <div class="bg-gray-50/80 px-5 py-3 border-t border-gray-100 flex items-center justify-between">
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <div class="relative">
                    <input type="checkbox" class="sr-only toggle-switch" <?= $bank['trang_thai'] ? 'checked' : '' ?> onchange="toggleEntity('bank', <?= $bank['id'] ?>)">
                    <div class="block bg-gray-200 w-8 h-5 rounded-full transition-colors toggle-bg"></div>
                    <div class="dot absolute left-1 top-1 bg-white w-3 h-3 rounded-full transition-transform toggle-dot shadow-sm"></div>
                </div>
                <span class="text-xs font-medium text-gray-600"><?= $bank['trang_thai'] ? 'Đang bật' : 'Đang tắt' ?></span>
            </label>
            
            <div class="flex items-center gap-1">
                <?php if(!$bank['la_mac_dinh']): ?>
                <button onclick="setDefaultBank(<?= $bank['id'] ?>)" class="w-8 h-8 rounded-lg bg-white border border-gray-200 text-yellow-600 hover:bg-yellow-50 flex items-center justify-center shadow-sm" title="Đặt mặc định">
                    <span class="iconify text-sm" data-icon="mdi:star-outline"></span>
                </button>
                <?php endif; ?>
                <button onclick='editBank(<?= $bank["id"] ?>, <?= json_encode($bank, JSON_HEX_APOS|JSON_HEX_QUOT|JSON_UNESCAPED_UNICODE) ?>)' class="w-8 h-8 rounded-lg bg-white border border-gray-200 text-blue-600 hover:bg-blue-50 flex items-center justify-center shadow-sm" title="Sửa">
                    <span class="iconify text-sm" data-icon="mdi:pencil"></span>
                </button>
                <button onclick="requestDelete('bank', <?= $bank['id'] ?>, '<?= htmlspecialchars($bank['ten_ngan_hang'], ENT_QUOTES) ?>')" class="w-8 h-8 rounded-lg bg-white border border-gray-200 text-red-600 hover:bg-red-50 flex items-center justify-center shadow-sm" title="Xóa">
                    <span class="iconify text-sm" data-icon="mdi:trash-can-outline"></span>
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
