<!-- Biểu đồ Top Sản phẩm (Horizontal Bar) -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 h-full flex flex-col">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-gray-800">Top sản phẩm bán chạy</h3>
        <select class="text-sm border-none bg-gray-50 rounded-lg px-2 py-1 text-gray-600 outline-none">
            <option>Theo doanh thu</option>
            <option>Theo số lượng</option>
        </select>
    </div>
    <div class="flex-1 min-h-[300px] w-full">
        <canvas id="topProductsChart"></canvas>
    </div>
</div>

<!-- Biểu đồ Doanh thu theo Danh mục (Doughnut) -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 h-full flex flex-col">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-gray-800">Doanh thu theo danh mục</h3>
        <button class="text-sm text-[#6B0D18] font-medium hover:underline">Chi tiết</button>
    </div>
    <div class="flex-1 flex flex-col md:flex-row items-center justify-center gap-6">
        <div class="h-[220px] w-[220px] relative">
            <canvas id="categoryChart"></canvas>
            <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                <span class="text-gray-500 text-xs">Tổng cộng</span>
                <span class="text-base font-bold text-gray-800">100%</span>
            </div>
        </div>
        
        <!-- Custom Legend -->
        <div class="flex-1 space-y-3 w-full max-w-[200px]">
            <?php 
                $colors = ['#6B0D18', '#b91c1c', '#f59e0b', '#10b981']; 
                $i = 0;
                $totalCat = array_sum($chartCategories);
                foreach($chartCategories as $name => $value):
                    $percent = round(($value / $totalCat) * 100, 1);
            ?>
            <div>
                <div class="flex justify-between items-center text-sm mb-1">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full" style="background-color: <?= $colors[$i % 4] ?>"></span>
                        <span class="text-gray-700 truncate w-24" title="<?= $name ?>"><?= $name ?></span>
                    </div>
                    <span class="font-bold text-gray-900"><?= $percent ?>%</span>
                </div>
                <div class="text-xs text-gray-500 ml-5"><?= number_format($value/1000000, 1, ',', '.') ?> Tr</div>
            </div>
            <?php $i++; endforeach; ?>
        </div>
    </div>
</div>
