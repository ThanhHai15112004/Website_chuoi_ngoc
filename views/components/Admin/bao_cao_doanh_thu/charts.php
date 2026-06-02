<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <!-- Biểu đồ doanh thu chính (Line Chart) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 lg:col-span-2">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-gray-800">Doanh thu theo thời gian</h3>
            <div class="flex items-center gap-2 bg-gray-50 rounded-lg p-1" id="chartIntervalTabs">
                <button data-interval="day" class="chart-tab-btn px-3 py-1 text-xs font-medium bg-white shadow-sm rounded-md text-gray-800 transition-colors">Ngày</button>
                <button data-interval="week" class="chart-tab-btn px-3 py-1 text-xs font-medium text-gray-500 hover:text-gray-800 transition-colors">Tuần</button>
                <button data-interval="month" class="chart-tab-btn px-3 py-1 text-xs font-medium text-gray-500 hover:text-gray-800 transition-colors">Tháng</button>
            </div>
        </div>
        <div class="h-[300px] w-full">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    <!-- Biểu đồ tình trạng đơn hàng (Donut Chart) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-gray-800">Tình trạng đơn hàng</h3>
            <a href="<?= APP_URL ?>/admin/don-hang" class="text-sm text-[#6B0D18] hover:underline font-medium">Xem đơn</a>
        </div>
        <div class="h-[220px] w-full flex items-center justify-center relative">
            <canvas id="orderStatusChart"></canvas>
            <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                <span class="text-gray-500 text-xs">Tổng đơn</span>
                <span class="text-2xl font-bold text-gray-800"><?= array_sum($chartOrderStatus) ?></span>
            </div>
        </div>
        <div class="mt-4 space-y-2">
            <!-- Legend tự build -->
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-green-500"></span> Thành công</div>
                <span class="font-medium text-gray-800"><?= $chartOrderStatus['Thành công'] ?></span>
            </div>
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-blue-500"></span> Đang giao</div>
                <span class="font-medium text-gray-800"><?= $chartOrderStatus['Đang giao'] ?></span>
            </div>
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-yellow-500"></span> Chờ xác nhận</div>
                <span class="font-medium text-gray-800"><?= $chartOrderStatus['Chờ xác nhận'] ?></span>
            </div>
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-red-400"></span> Đã hủy</div>
                <span class="font-medium text-gray-800"><?= $chartOrderStatus['Đã hủy'] ?></span>
            </div>
        </div>
    </div>

</div>
