    <!-- Khối tổng quan ngũ hành -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
        <?php foreach ($destinies as $d): ?>
            <a href="<?= APP_URL ?>/admin/menh-phong-thuy/sua" class="block bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:border-[#6B0D18] hover:shadow-md transition-all group relative">
                <?php if ($d['trang_thai'] === 2): ?>
                    <span class="absolute -top-2 -right-2 bg-amber-100 text-amber-700 text-[10px] font-bold px-2 py-0.5 rounded-full border border-amber-200">Cần bổ sung</span>
                <?php endif; ?>
                <div class="flex items-center gap-2 mb-3">
                    <span class="w-3 h-3 rounded-full" style="background-color: <?= $d['mau_dai_dien'] ?>; box-shadow: 0 0 0 1px rgba(0,0,0,0.1)"></span>
                    <h4 class="font-bold text-gray-800 group-hover:text-[#6B0D18] transition-colors"><?= $d['ten'] ?></h4>
                </div>
                <div class="space-y-1.5">
                    <p class="text-xs text-gray-500"><span class="font-medium text-gray-700">Màu hợp:</span> <span class="truncate"><?= implode(', ', array_slice($d['mau_hop'], 0, 2)) ?>...</span></p>
                    <div class="flex items-center justify-between text-xs text-gray-500 mt-2">
                        <span class="flex items-center gap-1"><span class="iconify text-gray-400" data-icon="mdi:diamond-stone"></span> <?= $d['da_hop_count'] ?> đá</span>
                        <span class="flex items-center gap-1"><span class="iconify text-gray-400" data-icon="mdi:package-variant-closed"></span> <?= $d['so_san_pham'] ?> SP</span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

