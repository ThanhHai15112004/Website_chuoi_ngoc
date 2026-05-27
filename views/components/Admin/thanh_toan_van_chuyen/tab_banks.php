<?php
// views/components/Admin/thanh_toan_van_chuyen/tab_banks.php
?>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h3 class="text-lg font-bold text-gray-900">Danh sách tài khoản ngân hàng</h3>
        <p class="text-sm text-gray-500">Khách sẽ chuyển khoản vào các tài khoản này khi đặt hàng.</p>
    </div>
    <button onclick="openDrawer('drawerBank')" class="px-4 py-2 bg-[#6B0D18] text-white text-sm font-medium rounded-lg hover:bg-red-900 transition-colors shadow-sm flex items-center gap-1">
        <span class="iconify" data-icon="mdi:plus"></span> Thêm tài khoản
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach($banks as $bank): ?>
    <div class="bg-white rounded-2xl border <?= $bank['is_default'] ? 'border-blue-500 shadow-md ring-1 ring-blue-500' : 'border-gray-200 shadow-sm' ?> overflow-hidden relative group">
        <?php if($bank['is_default']): ?>
            <div class="absolute top-0 right-0 bg-blue-500 text-white text-[10px] font-bold px-3 py-1 rounded-bl-lg z-10">MẶC ĐỊNH</div>
        <?php endif; ?>
        
        <div class="p-5 flex justify-between items-start gap-4">
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center shrink-0">
                        <span class="iconify text-2xl" data-icon="mdi:bank"></span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 leading-tight"><?= $bank['bank_name'] ?></h4>
                        <p class="text-xs text-gray-500">Chi nhánh: <?= $bank['branch'] ?></p>
                    </div>
                </div>
                
                <div class="space-y-2 mb-4">
                    <div>
                        <p class="text-[11px] text-gray-400 uppercase tracking-wider font-semibold">Chủ tài khoản</p>
                        <p class="font-bold text-gray-900 text-sm"><?= $bank['owner'] ?></p>
                    </div>
                    <div>
                        <p class="text-[11px] text-gray-400 uppercase tracking-wider font-semibold">Số tài khoản</p>
                        <div class="flex items-center gap-2">
                            <p class="font-bold text-gray-900 text-lg tracking-wider"><?= $bank['number'] ?></p>
                            <button class="text-gray-400 hover:text-blue-600 tooltip" title="Copy">
                                <span class="iconify" data-icon="mdi:content-copy"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="w-24 h-24 bg-gray-100 rounded-lg border border-gray-200 p-1 flex items-center justify-center shrink-0">
                <!-- Giả lập QR code -->
                <span class="iconify text-gray-300 text-4xl" data-icon="mdi:qrcode-scan"></span>
            </div>
        </div>
        
        <!-- Actions footer -->
        <div class="bg-gray-50/80 px-5 py-3 border-t border-gray-100 flex items-center justify-between">
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <div class="relative">
                    <input type="checkbox" class="sr-only toggle-switch" <?= $bank['status'] ? 'checked' : '' ?> onchange="markUnsaved()">
                    <div class="block bg-gray-200 w-8 h-5 rounded-full transition-colors toggle-bg"></div>
                    <div class="dot absolute left-1 top-1 bg-white w-3 h-3 rounded-full transition-transform toggle-dot shadow-sm"></div>
                </div>
                <span class="text-xs font-medium text-gray-600"><?= $bank['status'] ? 'Đang bật' : 'Đang tắt' ?></span>
            </label>
            
            <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                <button onclick="openDrawer('drawerBank')" class="w-8 h-8 rounded-lg bg-white border border-gray-200 text-blue-600 hover:bg-blue-50 flex items-center justify-center shadow-sm">
                    <span class="iconify text-sm" data-icon="mdi:pencil"></span>
                </button>
                <button class="w-8 h-8 rounded-lg bg-white border border-gray-200 text-red-600 hover:bg-red-50 flex items-center justify-center shadow-sm">
                    <span class="iconify text-sm" data-icon="mdi:trash-can-outline"></span>
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
