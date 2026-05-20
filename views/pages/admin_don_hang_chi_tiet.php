<?php
// views/pages/admin_don_hang_chi_tiet.php
?>
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Breadcrumb & Back -->
    <div class="flex items-center gap-2 text-sm text-gray-500">
        <a href="/shopbanhangchuoingoc/admin/don-hang" class="hover:text-[#6B0D18] flex items-center gap-1 transition-colors">
            <span class="iconify" data-icon="mdi:arrow-left"></span>
            Quay lại danh sách
        </a>
        <span>/</span>
        <span>Quản lý đơn hàng</span>
        <span>/</span>
        <span class="font-medium text-gray-900">Chi tiết đơn hàng</span>
    </div>

    <!-- Title Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight flex items-center gap-3">
                Chi tiết đơn hàng 
                <span class="text-[#6B0D18]">#<?= $don_hang['ma_don'] ?></span>
            </h1>
            <div class="text-sm text-gray-500 mt-1 flex items-center gap-4">
                <span class="flex items-center gap-1"><span class="iconify" data-icon="mdi:calendar-outline"></span> Ngày đặt: <?= $don_hang['ngay_dat'] ?></span>
                <span class="flex items-center gap-1"><span class="iconify" data-icon="mdi:web"></span> Nguồn: <?= $don_hang['nguon_don'] ?></span>
                <span class="flex items-center gap-1"><span class="iconify" data-icon="mdi:account-outline"></span> Xử lý: <?= $don_hang['nhan_vien'] ?></span>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <button onclick="openPrintModal()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:printer-outline"></span>
                In hóa đơn
            </button>
            <button onclick="openStatusModal()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:refresh"></span>
                Cập nhật trạng thái
            </button>
        </div>
    </div>

    <!-- Status Overview Card -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 relative overflow-hidden">
        <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-red-50/50 to-transparent pointer-events-none"></div>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="text-sm text-gray-500 mb-1">Trạng thái hiện tại</div>
                <div class="flex items-center gap-3">
                    <?php 
                        // Logic badge cho trang thai hien tai
                        $badgeClasses = 'bg-yellow-50 text-yellow-700'; // Default cho Chờ xác nhận
                        $icon = 'mdi:clock-outline';
                        if($don_hang['trang_thai'] == 'Xác nhận đơn hàng') { $badgeClasses = 'bg-blue-50 text-blue-700'; $icon = 'mdi:check-circle-outline'; }
                        if($don_hang['trang_thai'] == 'Đang giao') { $badgeClasses = 'bg-teal-50 text-teal-700'; $icon = 'mdi:truck-delivery-outline'; }
                        if($don_hang['trang_thai'] == 'Đã giao' || $don_hang['trang_thai'] == 'Thành công') { $badgeClasses = 'bg-emerald-50 text-emerald-700'; $icon = 'mdi:check-all'; }
                        if($don_hang['trang_thai'] == 'Đã hủy') { $badgeClasses = 'bg-gray-100 text-gray-600'; $icon = 'mdi:cancel'; }
                    ?>
                    <span class="px-3 py-1.5 rounded-lg text-sm font-bold flex items-center gap-1.5 <?= $badgeClasses ?>">
                        <span class="iconify text-lg" data-icon="<?= $icon ?>"></span>
                        <?= $don_hang['trang_thai'] ?>
                    </span>
                    <span class="text-xs text-gray-400">Cập nhật: <?= $don_hang['thoi_gian_cap_nhat'] ?></span>
                </div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 flex-1 md:border-l border-gray-100 md:pl-6">
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Thanh toán</div>
                    <div class="font-medium text-sm text-gray-900"><?= $don_hang['thanh_toan']['trang_thai'] ?></div>
                </div>
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Tổng tiền</div>
                    <div class="font-bold text-[#6B0D18] text-base"><?= number_format($don_hang['chi_tiet_tien']['tong_thanh_toan'], 0, ',', '.') ?>đ</div>
                </div>
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Vận chuyển</div>
                    <div class="font-medium text-sm text-gray-900 truncate" title="<?= $don_hang['giao_hang']['phuong_thuc'] ?>"><?= $don_hang['giao_hang']['phuong_thuc'] ?></div>
                </div>
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Sản phẩm</div>
                    <div class="font-medium text-sm text-gray-900"><?= count($don_hang['san_pham']) ?> mã SP</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Timeline Xử lý đơn hàng -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 overflow-x-auto hide-scrollbar">
        <div class="flex items-center min-w-[700px]">
            <!-- Step 1 -->
            <div class="relative flex flex-col items-center flex-1">
                <div class="w-8 h-8 rounded-full bg-[#6B0D18] text-white flex items-center justify-center relative z-10 shadow-md">
                    <span class="iconify" data-icon="mdi:check"></span>
                </div>
                <div class="absolute top-4 left-1/2 w-full h-0.5 bg-[#6B0D18]"></div>
                <div class="mt-3 text-center">
                    <div class="text-sm font-bold text-gray-900">Chờ xác nhận</div>
                    <div class="text-xs text-gray-500 mt-0.5">17/05, 20:35</div>
                </div>
            </div>
            
            <!-- Step 2 -->
            <div class="relative flex flex-col items-center flex-1">
                <div class="w-8 h-8 rounded-full bg-white border-2 border-[#6B0D18] text-[#6B0D18] flex items-center justify-center relative z-10 shadow-sm">
                    <div class="w-2.5 h-2.5 bg-[#6B0D18] rounded-full"></div>
                </div>
                <div class="absolute top-4 left-0 w-1/2 h-0.5 bg-[#6B0D18]"></div>
                <div class="absolute top-4 left-1/2 w-full h-0.5 bg-gray-200"></div>
                <div class="mt-3 text-center">
                    <div class="text-sm font-bold text-[#6B0D18]">Xác nhận đơn</div>
                    <div class="text-xs text-gray-400 mt-0.5">Đang chờ</div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative flex flex-col items-center flex-1">
                <div class="w-8 h-8 rounded-full bg-gray-50 border-2 border-gray-200 text-gray-300 flex items-center justify-center relative z-10">
                    <div class="w-2.5 h-2.5 bg-gray-300 rounded-full"></div>
                </div>
                <div class="absolute top-4 left-0 w-1/2 h-0.5 bg-gray-200"></div>
                <div class="absolute top-4 left-1/2 w-full h-0.5 bg-gray-200"></div>
                <div class="mt-3 text-center">
                    <div class="text-sm font-medium text-gray-400">Đang giao</div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="relative flex flex-col items-center flex-1">
                <div class="w-8 h-8 rounded-full bg-gray-50 border-2 border-gray-200 text-gray-300 flex items-center justify-center relative z-10">
                    <div class="w-2.5 h-2.5 bg-gray-300 rounded-full"></div>
                </div>
                <div class="absolute top-4 left-0 w-1/2 h-0.5 bg-gray-200"></div>
                <div class="absolute top-4 left-1/2 w-full h-0.5 bg-gray-200"></div>
                <div class="mt-3 text-center">
                    <div class="text-sm font-medium text-gray-400">Đã giao</div>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="relative flex flex-col items-center flex-1">
                <div class="w-8 h-8 rounded-full bg-gray-50 border-2 border-gray-200 text-gray-300 flex items-center justify-center relative z-10">
                    <div class="w-2.5 h-2.5 bg-gray-300 rounded-full"></div>
                </div>
                <div class="absolute top-4 left-0 w-1/2 h-0.5 bg-gray-200"></div>
                <div class="mt-3 text-center">
                    <div class="text-sm font-medium text-gray-400">Thành công</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Bar -->
    <div class="flex items-center gap-3">
        <?php if($don_hang['trang_thai'] == 'Chờ xác nhận'): ?>
            <button onclick="openStatusModal('Xác nhận')" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm">Xác nhận đơn</button>
            <button onclick="openCancelModal()" class="px-5 py-2.5 bg-white border border-red-200 text-red-600 rounded-xl hover:bg-red-50 font-medium text-sm transition-colors shadow-sm">Hủy đơn</button>
        <?php endif; ?>
        
        <button class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
            <span class="iconify" data-icon="mdi:message-outline"></span> Liên hệ khách
        </button>
    </div>

    <!-- 2 Column Layout -->
    <div class="flex flex-col lg:flex-row gap-6">
        
        <!-- Cột Trái (Main Content) -->
        <div class="lg:w-2/3 space-y-6">
            
            <!-- Danh sách sản phẩm -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="p-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                    <h2 class="font-bold text-gray-900">Sản phẩm trong đơn hàng</h2>
                    <span class="text-sm text-gray-500 bg-white px-2 py-1 border border-gray-200 rounded-lg shadow-sm"><?= count($don_hang['san_pham']) ?> loại sản phẩm</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-gray-50/50 border-b border-gray-100 text-gray-500 uppercase tracking-wider font-semibold text-xs">
                            <tr>
                                <th class="p-4 w-12"></th>
                                <th class="p-4 min-w-[200px]">Sản phẩm</th>
                                <th class="p-4 text-right">Đơn giá</th>
                                <th class="p-4 text-center">SL</th>
                                <th class="p-4 text-right">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            <?php foreach($don_hang['san_pham'] as $sp): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="p-4">
                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center font-bold text-base <?= $sp['mau_anh'] ?> border border-white shadow-sm">
                                        <?= $sp['anh'] ?>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div class="font-bold text-gray-900"><?= $sp['ten'] ?></div>
                                    <div class="text-xs text-gray-500 mt-1 flex items-center gap-2">
                                        <span class="bg-gray-100 px-1.5 py-0.5 rounded"><?= $sp['ma_sp'] ?></span>
                                        <span><?= $sp['bien_the'] ?></span>
                                    </div>
                                    <?php if($sp['ton_kho'] < 5): ?>
                                        <div class="text-[10px] text-red-500 mt-1 flex items-center gap-1">
                                            <span class="iconify" data-icon="mdi:alert-circle-outline"></span> Tồn kho thấp (còn <?= $sp['ton_kho'] ?>)
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="p-4 text-right font-medium text-gray-700"><?= number_format($sp['don_gia'], 0, ',', '.') ?>đ</td>
                                <td class="p-4 text-center font-bold text-gray-900">x<?= $sp['so_luong'] ?></td>
                                <td class="p-4 text-right font-bold text-[#6B0D18]"><?= number_format($sp['thanh_tien'], 0, ',', '.') ?>đ</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Ghi chú Khách hàng & Nội bộ -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- KH -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 relative overflow-hidden">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-8 h-8 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center">
                            <span class="iconify text-lg" data-icon="mdi:note-text-outline"></span>
                        </div>
                        <h2 class="font-bold text-gray-900">Khách hàng ghi chú</h2>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 text-sm text-gray-700 italic relative z-10">
                        "<?= $don_hang['giao_hang']['ghi_chu'] ?>"
                    </div>
                </div>

                <!-- Nội bộ -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 relative overflow-hidden">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-8 h-8 rounded-lg bg-gray-100 text-gray-600 flex items-center justify-center">
                            <span class="iconify text-lg" data-icon="mdi:lock-outline"></span>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-900">Ghi chú nội bộ</h2>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <?php foreach($don_hang['ghi_chu_noi_bo'] as $note): ?>
                            <div class="p-3 bg-yellow-50 rounded-xl border border-yellow-100 text-sm">
                                <div class="text-xs text-gray-500 mb-1 font-medium flex justify-between">
                                    <span><?= $note['nhan_vien'] ?></span>
                                    <span><?= $note['thoi_gian'] ?></span>
                                </div>
                                <div class="text-gray-800"><?= $note['noi_dung'] ?></div>
                            </div>
                        <?php endforeach; ?>
                        
                        <div class="relative">
                            <textarea placeholder="Thêm ghi chú nội bộ mới..." class="w-full p-3 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#6B0D18] resize-none h-20 transition-colors"></textarea>
                            <button onclick="showToast('Đã lưu ghi chú nội bộ!')" class="absolute bottom-2 right-2 px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold rounded-lg transition-colors">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lịch sử xử lý -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h2 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:history"></span>
                    Lịch sử xử lý đơn hàng
                </h2>
                
                <div class="relative pl-6 space-y-6 before:absolute before:inset-0 before:ml-[11px] before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-gray-200 before:to-transparent">
                    
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                        <div class="flex items-center justify-center w-6 h-6 rounded-full border-4 border-white bg-[#6B0D18] text-white shadow shrink-0 absolute left-[-23px] top-0 z-10"></div>
                        <div class="w-full pb-2">
                            <div class="flex justify-between items-center mb-1">
                                <span class="font-bold text-gray-900 text-sm">Cập nhật ghi chú nội bộ</span>
                                <span class="text-xs font-medium text-gray-400">18/05/2026, 09:30</span>
                            </div>
                            <div class="text-sm text-gray-600 mb-1">Hải Admin đã thêm ghi chú mới.</div>
                        </div>
                    </div>
                    
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                        <div class="flex items-center justify-center w-6 h-6 rounded-full border-4 border-white bg-gray-300 text-white shadow shrink-0 absolute left-[-23px] top-0 z-10"></div>
                        <div class="w-full pb-2">
                            <div class="flex justify-between items-center mb-1">
                                <span class="font-bold text-gray-900 text-sm">Hệ thống tạo đơn hàng</span>
                                <span class="text-xs font-medium text-gray-400">17/05/2026, 20:35</span>
                            </div>
                            <div class="text-sm text-gray-600">Đơn hàng được đặt qua Website thành công.</div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>

        <!-- Cột Phải (Sidebar) -->
        <div class="lg:w-1/3 space-y-6">
            
            <!-- Khách hàng -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:account-circle"></span> Thông tin khách hàng
                    </h2>
                    <a href="#" class="text-xs text-[#6B0D18] font-medium hover:underline">Xem hồ sơ</a>
                </div>
                
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-xl font-bold text-gray-500">
                        N
                    </div>
                    <div>
                        <div class="font-bold text-gray-900"><?= $don_hang['khach_hang']['ho_ten'] ?></div>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="bg-yellow-100 text-yellow-800 text-[10px] px-2 py-0.5 rounded-full font-bold uppercase tracking-wider"><?= $don_hang['khach_hang']['hang_thanh_vien'] ?></span>
                            <span class="text-xs text-emerald-600 flex items-center"><span class="iconify" data-icon="mdi:check-circle"></span> Đã xác thực</span>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-3 text-sm">
                    <div class="flex items-start gap-2 text-gray-600">
                        <span class="iconify mt-0.5 shrink-0" data-icon="mdi:phone"></span>
                        <a href="tel:<?= $don_hang['khach_hang']['sdt'] ?>" class="hover:text-[#6B0D18] font-medium transition-colors"><?= $don_hang['khach_hang']['sdt'] ?></a>
                    </div>
                    <div class="flex items-start gap-2 text-gray-600">
                        <span class="iconify mt-0.5 shrink-0" data-icon="mdi:email"></span>
                        <a href="mailto:<?= $don_hang['khach_hang']['email'] ?>" class="hover:text-[#6B0D18] transition-colors"><?= $don_hang['khach_hang']['email'] ?></a>
                    </div>
                </div>
                
                <div class="mt-4 pt-4 border-t border-gray-100 grid grid-cols-2 gap-4">
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Tổng đơn đã mua</div>
                        <div class="font-bold text-gray-900"><?= $don_hang['khach_hang']['tong_don'] ?> đơn</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Tổng chi tiêu</div>
                        <div class="font-bold text-gray-900"><?= number_format($don_hang['khach_hang']['tong_chi_tieu'], 0, ',', '.') ?>đ</div>
                    </div>
                </div>
            </div>

            <!-- Giao hàng -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-teal-600" data-icon="mdi:map-marker"></span> Giao hàng
                    </h2>
                    <button class="text-xs text-gray-500 font-medium hover:text-gray-900 flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:content-copy"></span> Copy
                    </button>
                </div>
                
                <div class="space-y-3 text-sm">
                    <div>
                        <span class="font-bold text-gray-900"><?= $don_hang['giao_hang']['nguoi_nhan'] ?></span>
                        <span class="text-gray-500 ml-2"><?= $don_hang['giao_hang']['sdt_nhan'] ?></span>
                    </div>
                    <div class="text-gray-600 leading-relaxed">
                        <?= $don_hang['giao_hang']['dia_chi'] ?>
                    </div>
                </div>
                
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="bg-gray-100 px-2 py-1 rounded text-xs font-medium text-gray-700"><?= $don_hang['giao_hang']['phuong_thuc'] ?></span>
                    </div>
                    <?php if(empty($don_hang['giao_hang']['ma_van_don'])): ?>
                        <div class="text-sm text-orange-600 flex items-center gap-1.5 mt-2 bg-orange-50 p-2 rounded-lg border border-orange-100">
                            <span class="iconify" data-icon="mdi:alert-circle-outline"></span> Chưa có mã vận đơn
                        </div>
                    <?php else: ?>
                        <div class="text-sm text-gray-600 flex justify-between items-center mt-2 bg-gray-50 p-2 rounded-lg">
                            <span>Mã VĐ: <span class="font-bold text-gray-900"><?= $don_hang['giao_hang']['ma_van_don'] ?></span></span>
                            <button class="text-[#6B0D18] hover:underline text-xs font-medium">Theo dõi</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Chi tiết thanh toán -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h2 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:cash-multiple"></span> Chi tiết thanh toán
                </h2>
                
                <div class="space-y-3 text-sm mb-4">
                    <div class="flex justify-between text-gray-600">
                        <span>Tạm tính</span>
                        <span class="font-medium"><?= number_format($don_hang['chi_tiet_tien']['tam_tinh'], 0, ',', '.') ?>đ</span>
                    </div>
                    <?php if($don_hang['chi_tiet_tien']['giam_gia'] < 0): ?>
                    <div class="flex justify-between text-gray-600">
                        <span>Giảm giá sản phẩm</span>
                        <span class="font-medium text-green-600"><?= number_format($don_hang['chi_tiet_tien']['giam_gia'], 0, ',', '.') ?>đ</span>
                    </div>
                    <?php endif; ?>
                    
                    <div class="flex justify-between text-gray-600">
                        <span>Phí vận chuyển</span>
                        <span class="font-medium"><?= number_format($don_hang['chi_tiet_tien']['phi_van_chuyen'], 0, ',', '.') ?>đ</span>
                    </div>
                    
                    <?php if($don_hang['chi_tiet_tien']['goi_qua'] > 0): ?>
                    <div class="flex justify-between text-gray-600">
                        <span>Dịch vụ gói quà</span>
                        <span class="font-medium"><?= number_format($don_hang['chi_tiet_tien']['goi_qua'], 0, ',', '.') ?>đ</span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(!empty($don_hang['chi_tiet_tien']['voucher'])): ?>
                    <div class="flex justify-between items-center text-gray-600 border border-red-200 border-dashed bg-red-50/50 p-2 rounded-lg">
                        <div class="flex items-center gap-1.5">
                            <span class="iconify text-[#6B0D18]" data-icon="mdi:ticket-percent"></span>
                            <span class="font-bold text-[#6B0D18] text-xs"><?= $don_hang['chi_tiet_tien']['voucher']['ma'] ?></span>
                        </div>
                        <span class="font-bold text-[#6B0D18]"><?= number_format($don_hang['chi_tiet_tien']['voucher']['tien_giam'], 0, ',', '.') ?>đ</span>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="pt-4 border-t border-gray-100 flex justify-between items-end mb-4">
                    <div class="font-bold text-gray-900">Tổng thanh toán</div>
                    <div class="font-black text-[#6B0D18] text-xl"><?= number_format($don_hang['chi_tiet_tien']['tong_thanh_toan'], 0, ',', '.') ?>đ</div>
                </div>

                <div class="bg-gray-50 rounded-xl p-3 border border-gray-100">
                    <div class="text-xs text-gray-500 mb-1">Phương thức</div>
                    <div class="font-bold text-gray-900 text-sm mb-2"><?= $don_hang['thanh_toan']['phuong_thuc'] ?></div>
                    
                    <div class="flex items-center justify-between">
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-md uppercase"><?= $don_hang['thanh_toan']['trang_thai'] ?></span>
                        <button class="text-xs font-medium text-[#6B0D18] hover:underline">Xác nhận đã thu tiền</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Cập nhật Trạng thái -->
<div id="statusModal" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-[100] hidden flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 transform scale-95 transition-transform duration-300" id="statusModalContent">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900">Cập nhật trạng thái đơn hàng</h3>
            <button onclick="closeStatusModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-5 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Trạng thái mới</label>
                <select class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
                    <option value="xac_nhan">Xác nhận đơn hàng</option>
                    <option value="dang_giao">Đang giao</option>
                    <option value="da_giao">Đã giao</option>
                    <option value="thanh_cong">Thành công</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Ghi chú cập nhật</label>
                <textarea placeholder="Nhập ghi chú cho lần cập nhật này..." class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all h-24 resize-none"></textarea>
            </div>
            <label class="flex items-center gap-2 cursor-pointer group">
                <div class="relative flex items-center">
                    <input type="checkbox" class="peer sr-only" checked>
                    <div class="w-5 h-5 bg-white border-2 border-gray-300 rounded peer-checked:bg-[#6B0D18] peer-checked:border-[#6B0D18] transition-colors"></div>
                    <span class="iconify text-white absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0 peer-checked:opacity-100" data-icon="mdi:check"></span>
                </div>
                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Gửi thông báo cập nhật cho khách hàng</span>
            </label>
        </div>
        <div class="p-5 border-t border-gray-100 flex items-center justify-end gap-3 bg-gray-50/50 rounded-b-2xl">
            <button onclick="closeStatusModal()" class="px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors">Hủy bỏ</button>
            <button onclick="submitStatusUpdate()" class="px-5 py-2.5 text-sm font-bold text-white bg-[#6B0D18] hover:bg-[#4C0519] rounded-xl shadow-sm transition-colors flex items-center gap-2">
                <span class="iconify" data-icon="mdi:check"></span> Lưu thay đổi
            </button>
        </div>
    </div>
</div>

<!-- Modal Hủy Đơn -->
<div id="cancelModal" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-[100] hidden flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 transform scale-95 transition-transform duration-300" id="cancelModalContent">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <div class="flex items-center gap-2 text-red-600">
                <span class="iconify text-2xl" data-icon="mdi:alert-circle"></span>
                <h3 class="text-lg font-bold">Hủy đơn hàng</h3>
            </div>
            <button onclick="closeCancelModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-5 space-y-4">
            <p class="text-sm text-gray-600">Bạn có chắc muốn hủy đơn <strong class="text-gray-900">#<?= $don_hang['ma_don'] ?></strong> không? Hành động này không thể hoàn tác trực tiếp.</p>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Lý do hủy <span class="text-red-500">*</span></label>
                <select class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all text-sm">
                    <option value="">-- Chọn lý do --</option>
                    <option value="1">Khách yêu cầu hủy</option>
                    <option value="2">Không liên hệ được khách</option>
                    <option value="3">Sản phẩm hết hàng</option>
                    <option value="4">Lý do khác...</option>
                </select>
            </div>
            
            <label class="flex items-center gap-2 cursor-pointer group">
                <div class="relative flex items-center">
                    <input type="checkbox" class="peer sr-only" checked>
                    <div class="w-5 h-5 bg-white border-2 border-gray-300 rounded peer-checked:bg-[#6B0D18] peer-checked:border-[#6B0D18] transition-colors"></div>
                    <span class="iconify text-white absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0 peer-checked:opacity-100" data-icon="mdi:check"></span>
                </div>
                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Hoàn lại số lượng tồn kho cho các sản phẩm</span>
            </label>
        </div>
        <div class="p-5 border-t border-gray-100 flex items-center justify-end gap-3 bg-red-50/30 rounded-b-2xl">
            <button onclick="closeCancelModal()" class="px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors">Không hủy</button>
            <button onclick="submitCancelOrder()" class="px-5 py-2.5 text-sm font-bold text-white bg-red-600 hover:bg-red-700 rounded-xl shadow-sm transition-colors flex items-center gap-2">
                <span class="iconify" data-icon="mdi:cancel"></span> Xác nhận hủy đơn
            </button>
        </div>
    </div>
</div>

<!-- Form In (Print Mockup) -->
<div id="printModal" class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm z-[100] hidden flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="bg-white shadow-2xl w-full max-w-2xl h-[90vh] flex flex-col mx-4 transform scale-95 transition-transform duration-300" id="printModalContent">
        <div class="p-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center shrink-0">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify" data-icon="mdi:printer"></span> Xem trước bản in</h3>
            <div class="flex gap-2">
                <button onclick="showToast('Đang gửi lệnh in tới máy in mặc định...')" class="px-4 py-2 bg-blue-600 text-white rounded font-medium text-sm hover:bg-blue-700 shadow flex items-center gap-1.5"><span class="iconify" data-icon="mdi:printer"></span> In ngay</button>
                <button onclick="closePrintModal()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded font-medium text-sm hover:bg-gray-100">Đóng</button>
            </div>
        </div>
        
        <div class="flex-1 overflow-auto bg-gray-200 p-8 flex justify-center custom-scrollbar">
            <div class="bg-white w-[210mm] min-h-[297mm] shadow-md p-10 font-sans text-black print-paper relative">
                <div class="absolute inset-0 flex items-center justify-center opacity-[0.03] pointer-events-none">
                    <span class="iconify text-[300px]" data-icon="mdi:gem"></span>
                </div>
                
                <div class="flex justify-between items-start border-b-2 border-black pb-4 mb-6 relative z-10">
                    <div>
                        <h1 class="text-2xl font-black uppercase tracking-wider mb-1">Chuỗi Ngọc Store</h1>
                        <p class="text-sm">123 Đường Phong Thủy, Quận 1, TP.HCM</p>
                        <p class="text-sm">SĐT: 0909 123 456 - Web: chuoingoc.com</p>
                    </div>
                    <div class="text-right">
                        <h2 class="text-xl font-bold uppercase border border-black px-3 py-1 inline-block mb-2">Phiếu Giao Hàng</h2>
                        <p class="text-sm">Mã đơn: <strong class="text-lg"><?= $don_hang['ma_don'] ?></strong></p>
                        <p class="text-sm">Ngày: 17/05/2026</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-8 mb-6 text-sm relative z-10">
                    <div>
                        <h3 class="font-bold underline mb-2">THÔNG TIN NGƯỜI NHẬN:</h3>
                        <p class="mb-1"><strong>Khách hàng:</strong> <?= $don_hang['giao_hang']['nguoi_nhan'] ?></p>
                        <p class="mb-1"><strong>SĐT:</strong> <?= $don_hang['giao_hang']['sdt_nhan'] ?></p>
                        <p class="mb-1"><strong>Địa chỉ:</strong> <?= $don_hang['giao_hang']['dia_chi'] ?></p>
                    </div>
                    <div>
                        <h3 class="font-bold underline mb-2">THÔNG TIN GIAO HÀNG:</h3>
                        <p class="mb-1"><strong>Vận chuyển:</strong> <?= $don_hang['giao_hang']['phuong_thuc'] ?></p>
                        <p class="mb-1"><strong>Mã VĐ:</strong> <?= $don_hang['giao_hang']['ma_van_don'] ?: 'Chưa có' ?></p>
                        <p class="mb-1"><strong>Thanh toán:</strong> COD</p>
                    </div>
                </div>

                <table class="w-full text-sm border-collapse border border-black mb-6 relative z-10">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-black p-2 text-center w-12">STT</th>
                            <th class="border border-black p-2 text-left">Tên sản phẩm</th>
                            <th class="border border-black p-2 text-center w-16">SL</th>
                            <th class="border border-black p-2 text-right w-32">Đơn giá</th>
                            <th class="border border-black p-2 text-right w-32">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($don_hang['san_pham'] as $index => $sp): ?>
                        <tr>
                            <td class="border border-black p-2 text-center"><?= $index + 1 ?></td>
                            <td class="border border-black p-2"><?= $sp['ten'] ?> (<?= $sp['bien_the'] ?>)</td>
                            <td class="border border-black p-2 text-center"><?= $sp['so_luong'] ?></td>
                            <td class="border border-black p-2 text-right"><?= number_format($sp['don_gia'], 0, ',', '.') ?></td>
                            <td class="border border-black p-2 text-right"><?= number_format($sp['thanh_tien'], 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="border border-black p-2 text-right font-bold">Tổng cộng:</td>
                            <td class="border border-black p-2 text-right font-bold"><?= number_format($don_hang['chi_tiet_tien']['tam_tinh'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border border-black p-2 text-right font-bold">Giảm giá (Voucher):</td>
                            <td class="border border-black p-2 text-right"><?= number_format($don_hang['chi_tiet_tien']['giam_gia'] + $don_hang['chi_tiet_tien']['voucher']['tien_giam'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border border-black p-2 text-right font-bold">Phí vận chuyển + Gói quà:</td>
                            <td class="border border-black p-2 text-right"><?= number_format($don_hang['chi_tiet_tien']['phi_van_chuyen'] + $don_hang['chi_tiet_tien']['goi_qua'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border border-black p-2 text-right font-black uppercase text-lg">Phải thu (COD):</td>
                            <td class="border border-black p-2 text-right font-black text-lg"><?= number_format($don_hang['chi_tiet_tien']['tong_thanh_toan'], 0, ',', '.') ?>đ</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="grid grid-cols-2 text-center mt-12 relative z-10">
                    <div>
                        <p class="font-bold">Người gửi</p>
                        <p class="text-xs italic">(Ký & ghi rõ họ tên)</p>
                    </div>
                    <div>
                        <p class="font-bold">Người nhận</p>
                        <p class="text-xs italic">(Ký & ghi rõ họ tên)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // JS cho Modals
    function openStatusModal() {
        const modal = document.getElementById('statusModal');
        const content = document.getElementById('statusModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
        }, 10);
    }

    function closeStatusModal() {
        const modal = document.getElementById('statusModal');
        const content = document.getElementById('statusModalContent');
        modal.classList.add('opacity-0');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function submitStatusUpdate() {
        showToast('Đã cập nhật trạng thái đơn hàng thành công!');
        closeStatusModal();
        setTimeout(() => window.location.reload(), 1000);
    }

    function openCancelModal() {
        const modal = document.getElementById('cancelModal');
        const content = document.getElementById('cancelModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
        }, 10);
    }

    function closeCancelModal() {
        const modal = document.getElementById('cancelModal');
        const content = document.getElementById('cancelModalContent');
        modal.classList.add('opacity-0');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function submitCancelOrder() {
        showToast('Đã hủy đơn hàng thành công!', 'error');
        closeCancelModal();
        setTimeout(() => window.location.reload(), 1000);
    }

    function openPrintModal() {
        const modal = document.getElementById('printModal');
        const content = document.getElementById('printModalContent');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
        }, 10);
    }

    function closePrintModal() {
        const modal = document.getElementById('printModal');
        const content = document.getElementById('printModalContent');
        modal.classList.add('opacity-0');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>
