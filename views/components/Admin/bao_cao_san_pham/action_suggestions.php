<div class="bg-gray-50 border border-gray-200 rounded-xl p-5 mb-6">
    <h3 class="text-base font-bold text-gray-800 flex items-center gap-2 mb-4">
        <span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:lightbulb-on"></span> Gợi ý hành động từ hệ thống
    </h3>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php foreach($actionSuggestions as $suggestion): ?>
        <div class="bg-white rounded-lg p-4 border border-gray-100 shadow-sm flex flex-col">
            <div class="flex items-start gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-<?= $suggestion['color'] ?>-50 text-<?= $suggestion['color'] ?>-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="<?= $suggestion['icon'] ?>"></span>
                </div>
                <h4 class="text-sm font-bold text-gray-800 leading-tight"><?= $suggestion['title'] ?></h4>
            </div>
            <p class="text-xs text-gray-600 mb-4 flex-1 line-clamp-2"><?= $suggestion['desc'] ?></p>
            <button class="w-full py-1.5 px-3 text-xs font-medium text-center rounded border <?= $suggestion['btn_class'] ?> transition-colors">
                <?= $suggestion['btn_text'] ?>
            </button>
        </div>
        <?php endforeach; ?>
    </div>
</div>
