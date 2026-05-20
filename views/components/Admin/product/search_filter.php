    <!-- Search & Filters -->
    <div class="bg-white p-4 rounded-[18px] shadow-sm border border-gray-100 space-y-4">
        <!-- Search bar -->
        <div class="relative">
            <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-[#6B0D18] text-xl" data-icon="mdi:magnify"></span>
            <input type="text" placeholder="Tìm theo tên sản phẩm, mã sản phẩm, loại đá..." 
                class="w-full pl-12 pr-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
        </div>
        
        <!-- Filters -->
        <div class="flex flex-wrap items-center gap-3">
            <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 relative bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <?php foreach($danh_muc_list as $dm): ?>
                    <option><?= $dm ?></option>
                <?php endforeach; ?>
            </select>
            
            <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Tất cả loại đá</option>
                <?php foreach($loai_da_list as $da): ?>
                    <option><?= $da ?></option>
                <?php endforeach; ?>
            </select>
            
            <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Tất cả mệnh</option>
                <?php foreach($menh_list as $m): ?>
                    <option><?= $m ?></option>
                <?php endforeach; ?>
            </select>
            
            <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Trạng thái: Tất cả</option>
                <option value="1">Đang hiển thị</option>
                <option value="0">Đang ẩn</option>
            </select>
            
            <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Tồn kho: Tất cả</option>
                <option value="con_hang">Còn hàng</option>
                <option value="sap_het">Sắp hết hàng</option>
                <option value="het_hang">Hết hàng</option>
            </select>
            
            <div class="flex-1"></div>
            
            <button class="px-4 py-2 text-[#6B0D18] hover:bg-red-50 rounded-lg transition-colors text-sm font-medium">
                Xóa bộ lọc
            </button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm">
                Lọc
            </button>
        </div>
    </div>
