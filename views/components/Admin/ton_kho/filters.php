<form method="GET" action="" class="p-4 border-b border-gray-200 bg-white grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <?php if (!empty($_GET['tab'])): ?>
        <input type="hidden" name="tab" value="<?= htmlspecialchars($_GET['tab']) ?>">
    <?php endif; ?>
    
    <!-- Tìm kiếm -->
    <div class="relative">
        <input type="text" name="keyword" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" placeholder="Tìm theo tên sản phẩm, mã SKU..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-colors text-sm">
        <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
        <button type="submit" class="hidden">Search</button>
    </div>

    <!-- Danh mục -->
    <div>
        <select name="category" onchange="this.form.submit()" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 bg-white">
            <option value="">Tất cả danh mục</option>
            <?php foreach($categories ?? [] as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= ($_GET['category'] ?? '') == $cat['id'] ? 'selected' : '' ?>><?= $cat['ten_danh_muc'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
        
    <!-- Loại đá -->
    <div>
        <select name="gemstone" onchange="this.form.submit()" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 bg-white">
            <option value="">Loại đá / ngọc</option>
            <?php foreach($gemstones ?? [] as $gem): ?>
                <option value="<?= $gem['id'] ?>" <?= ($_GET['gemstone'] ?? '') == $gem['id'] ? 'selected' : '' ?>><?= $gem['ten_loai_da'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Ngưỡng tồn kho -->
    <div>
        <select name="stock_status" onchange="this.form.submit()" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 bg-white">
            <option value="">Ngưỡng tồn kho</option>
            <option value="0" <?= ($_GET['stock_status'] ?? '') === '0' ? 'selected' : '' ?>>Bằng 0</option>
            <option value="under_5" <?= ($_GET['stock_status'] ?? '') === 'under_5' ? 'selected' : '' ?>>Dưới ngưỡng cảnh báo (5)</option>
            <option value="10_50" <?= ($_GET['stock_status'] ?? '') === '10_50' ? 'selected' : '' ?>>Từ 10 - 50</option>
            <option value="over_50" <?= ($_GET['stock_status'] ?? '') === 'over_50' ? 'selected' : '' ?>>Trên 50</option>
        </select>
    </div>
</form>

<!-- Active Filters -->
<?php
    $hasFilter = !empty($_GET['keyword']) || !empty($_GET['category']) || !empty($_GET['gemstone']) || !empty($_GET['stock_status']);
?>
<?php if ($hasFilter): ?>
<div class="px-4 py-3 bg-gray-50/50 border-b border-gray-200 flex flex-wrap items-center gap-2 text-sm">
    <span class="text-gray-500 mr-1">Đang lọc:</span>
    <a href="<?= APP_URL ?>/admin/ton-kho<?= !empty($_GET['tab']) ? '?tab='.$_GET['tab'] : '' ?>" class="text-red-600 hover:text-red-800 font-medium text-xs ml-2">Xóa tất cả bộ lọc</a>
</div>
<?php endif; ?>
