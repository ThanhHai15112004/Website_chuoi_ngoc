    <!-- Tabs trạng thái -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 hide-scrollbar border-b border-gray-200" id="statusTabs">
        <button onclick="switchTab(this, 'Tất cả')" class="tab-btn px-4 py-2 text-sm font-bold text-[#6B0D18] border-b-2 border-[#6B0D18] whitespace-nowrap flex items-center gap-2 transition-colors">
            Tất cả <span class="bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded text-[10px] font-mono"><?= number_format($stats['tong_don'], 0, ',', '.') ?></span>
        </button>
        <button onclick="switchTab(this, 'Chờ xác nhận')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap flex items-center gap-2 transition-colors border-b-2 border-transparent hover:border-gray-300">
            Chờ xác nhận <span class="bg-red-50 text-red-600 px-1.5 py-0.5 rounded text-[10px] font-mono font-bold" id="tabChoXacNhan"><?= $stats['cho_xac_nhan'] ?></span>
        </button>
        <button onclick="switchTab(this, 'Xác nhận đơn hàng')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap transition-colors border-b-2 border-transparent hover:border-gray-300">
            Xác nhận đơn hàng
        </button>
        <button onclick="switchTab(this, 'Đang giao')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap flex items-center gap-2 transition-colors border-b-2 border-transparent hover:border-gray-300">
            Đang giao <span class="bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded text-[10px] font-mono" id="tabDangGiao"><?= $stats['dang_giao'] ?></span>
        </button>
        <button onclick="switchTab(this, 'Đã giao')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap transition-colors border-b-2 border-transparent hover:border-gray-300">
            Đã giao
        </button>
        <button onclick="switchTab(this, 'Thành công')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap flex items-center gap-2 transition-colors border-b-2 border-transparent hover:border-gray-300">
            Thành công <span class="bg-emerald-50 text-emerald-600 px-1.5 py-0.5 rounded text-[10px] font-mono font-bold" id="tabThanhCong"><?= $stats['thanh_cong'] ?></span>
        </button>
        <button onclick="switchTab(this, 'Đã hủy')" class="tab-btn px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 whitespace-nowrap flex items-center gap-2 transition-colors border-b-2 border-transparent hover:border-gray-300">
            Đã hủy <span class="bg-gray-100 text-gray-500 px-1.5 py-0.5 rounded text-[10px] font-mono" id="tabDaHuy"><?= $stats['da_huy'] ?></span>
        </button>
    </div>
