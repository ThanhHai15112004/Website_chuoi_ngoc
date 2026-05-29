<?php
// views/components/Admin/cau_hinh_kho/drawer_chi_tiet.php
?>
<div id="khoDrawer" class="fixed inset-y-0 right-0 w-full md:w-[600px] bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col border-l border-gray-200">
    
    <!-- Drawer Header -->
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/80 sticky top-0 z-10">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600" id="drawerIcon">
                <span class="iconify text-xl" data-icon="mdi:warehouse"></span>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-900" id="drawerKhoTen">Đang tải...</h2>
                <div class="flex items-center gap-2 mt-0.5">
                    <span class="text-xs font-semibold text-[#6B0D18]" id="drawerKhoMa">---</span>
                    <span class="text-[10px] text-gray-400">&bull;</span>
                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-medium bg-emerald-50 text-emerald-700" id="drawerKhoTrangThai">---</span>
                </div>
            </div>
        </div>
        <button onclick="closeDrawer()" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-gray-200 rounded-full transition-colors focus:outline-none">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>

    <!-- Drawer Content -->
    <div class="flex-1 overflow-y-auto custom-scrollbar p-6" id="drawerContent">
        
        <!-- Thống kê nhanh -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <p class="text-xs text-gray-500 mb-1">Khu vực</p>
                <p class="text-xl font-bold text-gray-900" id="drawerKhuVuc">0</p>
            </div>
            <div class="bg-red-50/50 rounded-xl p-4 border border-red-100">
                <p class="text-xs text-[#6B0D18]/70 mb-1">Kệ / Ngăn</p>
                <p class="text-xl font-bold text-[#6B0D18]" id="drawerKe">0</p>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Thông tin liên hệ / Vị trí -->
            <div>
                <h3 class="text-sm font-bold text-gray-900 mb-3 border-l-2 border-[#6B0D18] pl-2">Thông tin chung</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between items-start py-2 border-b border-dashed border-gray-100">
                        <span class="text-gray-500 w-1/3">Loại kho</span>
                        <span class="font-medium text-gray-900 text-right w-2/3" id="drawerLoaiKho">---</span>
                    </div>
                    <div class="flex justify-between items-start py-2 border-b border-dashed border-gray-100">
                        <span class="text-gray-500 w-1/3">Địa chỉ</span>
                        <span class="font-medium text-gray-900 text-right w-2/3" id="drawerDiaChi">---</span>
                    </div>
                    <div class="flex justify-between items-start py-2 border-b border-dashed border-gray-100">
                        <span class="text-gray-500 w-1/3">Người phụ trách</span>
                        <span class="font-medium text-gray-900 text-right w-2/3" id="drawerNguoiPhuTrach">---</span>
                    </div>
                    <div class="flex justify-between items-start py-2 border-b border-dashed border-gray-100">
                        <span class="text-gray-500 w-1/3">Mô tả</span>
                        <span class="font-medium text-gray-900 text-right w-2/3" id="drawerMoTa">---</span>
                    </div>
                </div>
            </div>

            <!-- Cấu hình vận hành -->
            <div>
                <h3 class="text-sm font-bold text-gray-900 mb-3 border-l-2 border-[#6B0D18] pl-2">Cấu hình vận hành</h3>
                <div class="space-y-2" id="drawerCauHinh">
                    <div class="text-sm text-gray-500">Đang tải...</div>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Drawer Footer Actions -->
    <div class="p-4 border-t border-gray-100 bg-gray-50/80 flex items-center justify-end gap-3 sticky bottom-0">
        <a href="<?= APP_URL ?>/admin/ton-kho" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-100 font-medium text-sm transition-colors shadow-sm">
            Tồn kho hiện tại
        </a>
        <a href="#" id="drawerEditLink" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
            <span class="iconify" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
        </a>
    </div>
</div>

<script>
    let currentDrawerKhoId = null;

    async function openDrawer(id) {
        currentDrawerKhoId = id;
        document.getElementById('khoDrawer').classList.remove('translate-x-full');
        document.getElementById('drawerOverlay').classList.remove('hidden');
        
        setTimeout(() => {
            document.getElementById('drawerOverlay').classList.remove('opacity-0');
        }, 10);

        // Fetch data from API
        try {
            const res = await fetch('<?= APP_URL ?>/admin/cau-hinh-kho/api/chi-tiet/' + id);
            const json = await res.json();
            if (json.success) {
                renderDrawer(json.data);
            } else {
                document.getElementById('drawerKhoTen').textContent = 'Lỗi tải dữ liệu';
            }
        } catch (err) {
            console.error(err);
            document.getElementById('drawerKhoTen').textContent = 'Lỗi kết nối';
        }
    }

    function renderDrawer(kho) {
        document.getElementById('drawerKhoTen').textContent = kho.ten_kho;
        document.getElementById('drawerKhoMa').textContent = kho.ma_kho;
        document.getElementById('drawerKhoTrangThai').textContent = kho.trang_thai_text;
        document.getElementById('drawerEditLink').href = '<?= APP_URL ?>/admin/cau-hinh-kho/sua/' + kho.id;

        // Stats
        document.getElementById('drawerKhuVuc').textContent = kho.so_khu_vuc ?? 0;
        document.getElementById('drawerKe').textContent = kho.so_ke ?? 0;

        // Info
        document.getElementById('drawerLoaiKho').textContent = kho.loai_kho_text ?? kho.loai_kho;
        
        const diaChi = [kho.dia_chi, kho.phuong_xa, kho.quan_huyen, kho.tinh_thanh].filter(Boolean).join(', ');
        document.getElementById('drawerDiaChi').textContent = diaChi || 'Kho nội bộ';
        document.getElementById('drawerNguoiPhuTrach').textContent = kho.nguoi_phu_trach || 'Chưa gán';
        document.getElementById('drawerMoTa').textContent = kho.mo_ta || 'Không có mô tả';

        // Cấu hình
        const configs = [
            { label: 'Cho phép bán hàng', value: kho.cho_phep_ban },
            { label: 'Cho phép thuyên chuyển', value: kho.cho_phep_chuyen },
            { label: 'Cho phép kiểm kê', value: kho.cho_phep_kiem_ke },
            { label: 'Kho mặc định', value: kho.mac_dinh }
        ];
        const cauHinhEl = document.getElementById('drawerCauHinh');
        cauHinhEl.innerHTML = configs.map(c => {
            const icon = c.value ? 'mdi:check-circle' : 'mdi:close-circle';
            const color = c.value ? 'text-emerald-500' : 'text-gray-300';
            return `<div class="flex items-center gap-2 text-sm text-gray-700">
                        <span class="iconify ${color} text-lg" data-icon="${icon}"></span> ${c.label}
                    </div>`;
        }).join('');

        // Status badge color
        const badge = document.getElementById('drawerKhoTrangThai');
        badge.className = 'inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-medium';
        switch (parseInt(kho.trang_thai)) {
            case 1: badge.classList.add('bg-emerald-50', 'text-emerald-700'); break;
            case 2: badge.classList.add('bg-amber-50', 'text-amber-700'); break;
            case 0: badge.classList.add('bg-gray-100', 'text-gray-600'); break;
        }
    }

    function closeDrawer() {
        document.getElementById('khoDrawer').classList.add('translate-x-full');
        document.getElementById('drawerOverlay').classList.add('opacity-0');
        
        setTimeout(() => {
            document.getElementById('drawerOverlay').classList.add('hidden');
        }, 300);
    }
</script>
