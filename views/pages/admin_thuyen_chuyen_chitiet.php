<!-- Trang Chi Tiết Phiếu Thuyên Chuyển Kho -->
<div class="px-6 py-6 pb-20 max-w-[1200px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-gray-900 leading-tight">Chi tiết Phiếu: <?= $phieu['id'] ?></h2>
                <p class="text-sm text-gray-500 mt-1">
                    <span class="iconify inline text-gray-400" data-icon="mdi:clock-outline"></span> Tạo lúc: <?= $phieu['ngay_tao'] ?> bởi <span class="font-medium text-gray-700"><?= $phieu['nguoi_tao'] ?></span>
                </p>
            </div>
        </div>
        
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:printer"></span> In phiếu
            </button>
            <?php if ($phieu['trang_thai'] === 'Chờ duyệt'): ?>
                <button class="px-4 py-2 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 transition-colors text-sm flex items-center gap-2 shadow-sm">
                    <span class="iconify" data-icon="mdi:check-circle-outline"></span> Duyệt phiếu
                </button>
            <?php elseif ($phieu['trang_thai'] === 'Đang xuất kho'): ?>
                <button class="px-4 py-2 bg-indigo-500 text-white font-medium rounded-lg hover:bg-indigo-600 transition-colors text-sm flex items-center gap-2 shadow-sm">
                    <span class="iconify" data-icon="mdi:truck-fast-outline"></span> Bắt đầu vận chuyển
                </button>
            <?php elseif ($phieu['trang_thai'] === 'Đang vận chuyển'): ?>
                <button class="px-4 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition-colors text-sm flex items-center gap-2 shadow-sm">
                    <span class="iconify" data-icon="mdi:check-all"></span> Xác nhận đã nhập kho
                </button>
            <?php endif; ?>
        </div>
    </div>

    <!-- Timeline Trạng Thái -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 mb-6">
        <h3 class="font-bold text-gray-900 text-lg mb-6">Tiến trình điều chuyển</h3>
        
        <div class="relative">
            <!-- Đường line nền -->
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-gray-200 rounded-full z-0"></div>
            <!-- Đường line progress (Ví dụ: 100% nếu là Đã nhập kho) -->
            <?php
                $progress = 0;
                if ($phieu['trang_thai'] === 'Chờ duyệt') $progress = 0;
                if ($phieu['trang_thai'] === 'Đang xuất kho') $progress = 33;
                if ($phieu['trang_thai'] === 'Đang vận chuyển') $progress = 66;
                if ($phieu['trang_thai'] === 'Đã nhập kho') $progress = 100;
            ?>
            <div class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-[#6B0D18] rounded-full z-0 transition-all duration-500" style="width: <?= $progress ?>%;"></div>

            <div class="relative z-10 flex justify-between">
                <!-- Bước 1: Khởi tạo -->
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center <?= $progress >= 0 ? 'bg-[#6B0D18] text-white shadow-md shadow-red-900/20' : 'bg-gray-100 text-gray-400 border border-gray-200' ?>">
                        <span class="iconify text-xl" data-icon="mdi:file-document-edit-outline"></span>
                    </div>
                    <p class="text-sm font-bold text-gray-900 mt-3">Chờ duyệt</p>
                    <p class="text-xs text-gray-500 mt-1"><?= $phieu['ngay_tao'] ?></p>
                </div>
                <!-- Bước 2: Đang xuất kho -->
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center <?= $progress >= 33 ? 'bg-[#6B0D18] text-white shadow-md shadow-red-900/20' : 'bg-gray-100 text-gray-400 border border-gray-200' ?>">
                        <span class="iconify text-xl" data-icon="mdi:tray-arrow-up"></span>
                    </div>
                    <p class="text-sm font-bold <?= $progress >= 33 ? 'text-gray-900' : 'text-gray-500' ?> mt-3">Đang xuất kho</p>
                    <?php if($progress >= 33): ?><p class="text-xs text-gray-500 mt-1"><?= $phieu['ngay_xuat'] ?></p><?php endif; ?>
                </div>
                <!-- Bước 3: Đang vận chuyển -->
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center <?= $progress >= 66 ? 'bg-[#6B0D18] text-white shadow-md shadow-red-900/20' : 'bg-gray-100 text-gray-400 border border-gray-200' ?>">
                        <span class="iconify text-xl" data-icon="mdi:truck-fast-outline"></span>
                    </div>
                    <p class="text-sm font-bold <?= $progress >= 66 ? 'text-gray-900' : 'text-gray-500' ?> mt-3">Đang vận chuyển</p>
                </div>
                <!-- Bước 4: Đã nhập kho -->
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center <?= $progress >= 100 ? 'bg-emerald-500 text-white shadow-md shadow-emerald-500/20' : 'bg-gray-100 text-gray-400 border border-gray-200' ?>">
                        <span class="iconify text-xl" data-icon="mdi:check-all"></span>
                    </div>
                    <p class="text-sm font-bold <?= $progress >= 100 ? 'text-emerald-600' : 'text-gray-500' ?> mt-3">Đã nhập kho</p>
                    <?php if($progress >= 100): ?><p class="text-xs text-gray-500 mt-1"><?= $phieu['ngay_nhap'] ?></p><?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Cột trái: Thông tin phiếu -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-5 py-4 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:information-outline"></span> Thông tin chung
                    </h3>
                </div>
                <div class="p-5 space-y-4">
                    <div>
                        <p class="text-xs text-gray-500 font-medium uppercase mb-1">Kho xuất (Trừ tồn)</p>
                        <p class="font-bold text-gray-900"><?= $phieu['kho_xuat'] ?></p>
                    </div>
                    <div class="flex justify-center text-gray-300">
                        <span class="iconify text-2xl" data-icon="mdi:arrow-down-thick"></span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium uppercase mb-1">Kho nhập (Cộng tồn)</p>
                        <p class="font-bold text-[#6B0D18]"><?= $phieu['kho_nhap'] ?></p>
                    </div>
                    
                    <hr class="border-gray-100">
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Tổng số lượng</p>
                            <p class="font-bold text-gray-900"><?= $phieu['tong_so_luong'] ?> sp</p>
                        </div>
                    </div>
                    
                    <?php if (!empty($phieu['ghi_chu'])): ?>
                    <hr class="border-gray-100">
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Ghi chú</p>
                        <p class="text-sm text-gray-700 bg-gray-50 p-3 rounded-lg border border-gray-100 italic"><?= $phieu['ghi_chu'] ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Cột phải: Danh sách sản phẩm -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-5 py-4 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
                    <h3 class="font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:package-variant-closed"></span> Danh sách sản phẩm chuyển
                    </h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-gray-200 text-xs uppercase text-gray-500">
                                <th class="py-3 px-4 font-semibold w-12 text-center">STT</th>
                                <th class="py-3 px-4 font-semibold">Mã SP</th>
                                <th class="py-3 px-4 font-semibold">Tên sản phẩm</th>
                                <th class="py-3 px-4 font-semibold text-center">SL chuyển</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php foreach ($chiTiet as $index => $item): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="py-3 px-4 text-center text-sm text-gray-500"><?= $index + 1 ?></td>
                                    <td class="py-3 px-4 text-sm font-medium text-gray-700"><?= $item['ma_sp'] ?></td>
                                    <td class="py-3 px-4 text-sm text-gray-900"><?= $item['ten_sp'] ?></td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="inline-flex items-center justify-center min-w-[2rem] px-2 py-1 rounded bg-[#6B0D18] text-white text-xs font-bold shadow-sm shadow-red-900/20">
                                            <?= $item['so_luong'] ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="bg-gray-50">
                                <td colspan="3" class="py-4 px-4 text-right font-bold text-gray-700">Tổng cộng:</td>
                                <td class="py-4 px-4 text-center">
                                    <span class="text-lg font-bold text-[#6B0D18]"><?= $phieu['tong_so_luong'] ?></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
