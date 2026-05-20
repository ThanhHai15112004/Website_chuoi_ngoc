<?php
// views/pages/admin_customer_ranks.php
$ranks = $ranks ?? [];
$history = $history ?? [];
?>

<div class="animate-[fadeInPage_0.3s_ease-out] max-w-7xl mx-auto pb-12">
    <!-- Breadcrumb -->
    <div class="mb-4">
        <div class="flex items-center text-xs text-gray-500 mb-2">
            <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18]">Admin</a>
            <span class="mx-2">/</span>
            <a href="<?= APP_URL ?>/admin/khach-hang" class="hover:text-[#6B0D18]">Quản lý khách hàng</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-bold">Hạng thành viên</span>
        </div>
    </div>

    <!-- Tiêu đề trang -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Quản lý hạng thành viên</h2>
            <p class="text-sm text-gray-500 mt-1">Thiết lập điều kiện lên hạng, quyền lợi và ưu đãi dành cho từng nhóm khách hàng.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-2" onclick="openConfigModal()">
                <span class="iconify text-lg" data-icon="mdi:cog-outline"></span> Cấu hình hệ thống
            </button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] transition-colors shadow-sm flex items-center gap-2" onclick="openAddRankModal()">
                <span class="iconify text-lg" data-icon="mdi:plus"></span> Thêm hạng mới
            </button>
            <button class="px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors shadow-sm" title="Làm mới dữ liệu">
                <span class="iconify text-lg" data-icon="mdi:refresh"></span>
            </button>
        </div>
    </div>

    <!-- 1. Card Thống Kê Nhanh -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <div class="bg-white rounded-[20px] shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-gray-50 text-gray-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:format-list-bulleted"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Tổng số hạng</p>
            <p class="text-xl font-bold text-gray-800">3 <span class="text-[10px] font-normal text-gray-400">hạng</span></p>
        </div>
        <div class="bg-gradient-to-b from-gray-50 to-white rounded-[20px] shadow-sm border border-gray-200 p-4 relative overflow-hidden">
            <div class="absolute -right-2 -bottom-2 text-gray-200 opacity-50"><span class="iconify text-6xl" data-icon="mdi:medal-outline"></span></div>
            <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center mb-3 relative z-10">
                <span class="iconify" data-icon="mdi:medal-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5 relative z-10">Khách Silver</p>
            <p class="text-xl font-bold text-gray-800 relative z-10">1.820 <span class="text-[10px] font-normal text-gray-400">người</span></p>
        </div>
        <div class="bg-gradient-to-b from-yellow-50 to-white rounded-[20px] shadow-sm border border-yellow-200 p-4 relative overflow-hidden">
            <div class="absolute -right-2 -bottom-2 text-yellow-200 opacity-50"><span class="iconify text-6xl" data-icon="mdi:crown"></span></div>
            <div class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center mb-3 relative z-10">
                <span class="iconify" data-icon="mdi:crown"></span>
            </div>
            <p class="text-xs text-yellow-800 mb-0.5 relative z-10">Khách Gold</p>
            <p class="text-xl font-bold text-yellow-700 relative z-10">520 <span class="text-[10px] font-normal text-yellow-600/60">người</span></p>
        </div>
        <div class="bg-gradient-to-b from-red-50 to-white rounded-[20px] shadow-sm border border-red-200 p-4 relative overflow-hidden">
            <div class="absolute -right-2 -bottom-2 text-red-200 opacity-50"><span class="iconify text-6xl" data-icon="mdi:diamond-stone"></span></div>
            <div class="w-8 h-8 rounded-full bg-red-100 text-[#6B0D18] flex items-center justify-center mb-3 relative z-10">
                <span class="iconify" data-icon="mdi:diamond-stone"></span>
            </div>
            <p class="text-xs text-red-800 mb-0.5 relative z-10">Khách Diamond</p>
            <p class="text-xl font-bold text-[#6B0D18] relative z-10">86 <span class="text-[10px] font-normal text-red-800/60">người</span></p>
        </div>
        <div class="bg-white rounded-[20px] shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:account-group"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Tổng khách có hạng</p>
            <p class="text-xl font-bold text-gray-800">2.426 <span class="text-[10px] font-normal text-gray-400">người</span></p>
        </div>
        <div class="bg-amber-50 rounded-[20px] shadow-sm border border-amber-200 p-4">
            <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:trending-up"></span>
            </div>
            <p class="text-xs text-amber-800 mb-0.5">Sắp lên hạng</p>
            <p class="text-xl font-bold text-amber-600">48 <span class="text-[10px] font-normal text-amber-600/60">người</span></p>
        </div>
    </div>

    <!-- 2. Khối Tổng Quan 3 Hạng -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <?php foreach($ranks as $rank): ?>
            <?php 
                $borderClass = 'border-gray-200';
                $icon = 'mdi:medal-outline';
                $iconColor = 'text-gray-500';
                
                if($rank['id'] === 'gold') {
                    $borderClass = 'border-yellow-300 ring-2 ring-yellow-50';
                    $icon = 'mdi:crown';
                    $iconColor = 'text-yellow-500';
                }
                if($rank['id'] === 'diamond') {
                    $borderClass = 'border-red-300 ring-2 ring-red-50';
                    $icon = 'mdi:diamond-stone';
                    $iconColor = 'text-[#6B0D18]';
                }
            ?>
            <div class="bg-white rounded-3xl shadow-sm border <?= $borderClass ?> p-6 relative overflow-hidden flex flex-col">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-gray-50 to-transparent opacity-50 pointer-events-none rounded-bl-full"></div>
                
                <div class="flex items-center gap-4 mb-4 relative z-10">
                    <div class="w-14 h-14 rounded-full border-2 <?= $borderClass ?> flex items-center justify-center <?= $iconColor ?> bg-white shadow-sm">
                        <span class="iconify text-3xl" data-icon="<?= $icon ?>"></span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black uppercase <?= $iconColor ?>"><?= $rank['name'] ?></h3>
                        <p class="text-xs text-gray-500 line-clamp-1"><?= $rank['desc'] ?></p>
                    </div>
                </div>
                
                <div class="space-y-3 mb-6 flex-1">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Chi tiêu tối thiểu:</span>
                        <span class="font-bold text-gray-800"><?= number_format($rank['condition_spend'], 0, ',', '.') ?>đ</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Giảm giá mặc định:</span>
                        <span class="font-bold text-[#6B0D18]"><?= $rank['discount'] ?>%</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Khách hiện tại:</span>
                        <span class="font-bold text-gray-800"><?= number_format($rank['customer_count'], 0, ',', '.') ?></span>
                    </div>
                </div>
                
                <div class="flex items-center gap-2 mt-auto border-t border-gray-100 pt-4">
                    <button class="flex-1 py-2 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 transition-colors" onclick="openRankDetailModal('<?= $rank['id'] ?>')">Xem chi tiết</button>
                    <button class="flex-1 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm font-bold <?= $iconColor ?> hover:bg-gray-100 transition-colors flex items-center justify-center gap-1" onclick="openEditRankModal('<?= $rank['id'] ?>')">
                        <span class="iconify" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- 3. Khu vực Tab Content -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
        <div class="flex items-center border-b border-gray-100 overflow-x-auto">
            <button onclick="switchRankTab('list')" id="tab-btn-list" class="px-6 py-4 font-bold text-sm text-[#6B0D18] border-b-2 border-[#6B0D18] whitespace-nowrap">Danh sách & Quyền lợi</button>
            <button onclick="switchRankTab('compare')" id="tab-btn-compare" class="px-6 py-4 font-medium text-sm text-gray-500 hover:text-gray-800 border-b-2 border-transparent whitespace-nowrap">Bảng so sánh chi tiết</button>
            <button onclick="switchRankTab('history')" id="tab-btn-history" class="px-6 py-4 font-medium text-sm text-gray-500 hover:text-gray-800 border-b-2 border-transparent whitespace-nowrap">Lịch sử cấu hình</button>
        </div>
        
        <div class="p-0">
            <!-- Tab 1: Bảng danh sách hạng -->
            <div id="tab-content-list" class="overflow-x-auto block">
                <table class="w-full text-left border-collapse min-w-[900px]">
                    <thead>
                        <tr class="bg-gray-50/50 text-xs text-gray-500 uppercase tracking-wider border-b border-gray-100">
                            <th class="p-4 pl-6 font-medium">Hạng thành viên</th>
                            <th class="p-4 font-medium">Điều kiện lên hạng</th>
                            <th class="p-4 font-medium">Quyền lợi chính</th>
                            <th class="p-4 font-medium text-center">SL Khách</th>
                            <th class="p-4 font-medium">Voucher liên kết</th>
                            <th class="p-4 font-medium text-center">Trạng thái</th>
                            <th class="p-4 pr-6 font-medium text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-50">
                        <?php foreach($ranks as $rank): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="p-4 pl-6">
                                <div class="flex items-center gap-3">
                                    <span class="px-2 py-1 text-[10px] font-bold uppercase rounded border <?= $rank['badge'] ?>"><?= $rank['name'] ?></span>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="font-bold text-[#6B0D18]"><?= number_format($rank['condition_spend'], 0, ',', '.') ?>đ</span>
                            </td>
                            <td class="p-4">
                                <div class="text-gray-800 font-medium">Giảm <?= $rank['discount'] ?>%</div>
                                <div class="text-[11px] text-gray-500 mt-0.5 truncate max-w-[200px]" title="<?= implode(', ', $rank['benefits']) ?>">+ <?= implode(', ', $rank['benefits']) ?></div>
                            </td>
                            <td class="p-4 text-center">
                                <a href="#" class="font-bold text-blue-600 hover:underline"><?= number_format($rank['customer_count'], 0, ',', '.') ?></a>
                            </td>
                            <td class="p-4">
                                <?php if(!empty($rank['vouchers'])): ?>
                                    <div class="flex flex-wrap gap-1">
                                        <?php foreach($rank['vouchers'] as $vc): ?>
                                            <span class="px-2 py-0.5 border border-red-200 border-dashed text-[#6B0D18] text-[10px] font-bold rounded bg-red-50"><?= $vc ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <span class="text-xs text-gray-400 italic">Chưa gán</span>
                                <?php endif; ?>
                            </td>
                            <td class="p-4 text-center">
                                <?php if($rank['status'] === 'active'): ?>
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold rounded border border-emerald-100 uppercase whitespace-nowrap">Hoạt động</span>
                                <?php else: ?>
                                    <span class="px-2.5 py-1 bg-gray-100 text-gray-500 text-[10px] font-bold rounded border border-gray-200 uppercase whitespace-nowrap">Đã tắt</span>
                                <?php endif; ?>
                            </td>
                            <td class="p-4 pr-6 text-right">
                                <div class="flex items-center justify-end action-dropdown-wrapper relative">
                                    <button class="p-2 text-gray-400 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors focus:outline-none" onclick="toggleActionDropdown(event, 'dropdown-<?= $rank['id'] ?>')">
                                        <span class="iconify text-xl" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    
                                    <div id="dropdown-<?= $rank['id'] ?>" class="action-dropdown fixed w-48 bg-white border border-gray-100 rounded-xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] py-2 hidden z-[100] text-left animate-[fadeInPage_0.1s_ease-out]">
                                        <a href="<?= APP_URL ?>/admin/khach-hang?rank=<?= $rank['id'] ?>" class="flex items-center gap-3 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                            <span class="iconify text-lg text-indigo-500" data-icon="mdi:account-group-outline"></span> Xem khách hàng
                                        </a>
                                        <button onclick="openAssignVoucherModal('<?= $rank['id'] ?>')" class="w-full flex items-center gap-3 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors text-left">
                                            <span class="iconify text-lg text-blue-500" data-icon="mdi:ticket-percent-outline"></span> Gán voucher
                                        </button>
                                        <button onclick="openEditRankModal('<?= $rank['id'] ?>')" class="w-full flex items-center gap-3 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors text-left">
                                            <span class="iconify text-lg text-gray-400" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
                                        </button>
                                        <div class="h-px bg-gray-100 my-1"></div>
                                        <?php if($rank['status'] === 'active'): ?>
                                        <button onclick="if(confirm('Bạn có chắc muốn tạm ngưng hạng này?')) showToast('Đã tạm ngưng hạng!');" class="w-full flex items-center gap-3 px-4 py-2 text-sm font-medium text-amber-600 hover:bg-amber-50 transition-colors text-left">
                                            <span class="iconify text-lg" data-icon="mdi:pause-circle-outline"></span> Tạm ngưng
                                        </button>
                                        <?php else: ?>
                                        <button onclick="showToast('Đã kích hoạt hạng!');" class="w-full flex items-center gap-3 px-4 py-2 text-sm font-medium text-emerald-600 hover:bg-emerald-50 transition-colors text-left">
                                            <span class="iconify text-lg" data-icon="mdi:play-circle-outline"></span> Kích hoạt
                                        </button>
                                        <?php endif; ?>
                                        <button onclick="if(confirm('Bạn có chắc muốn xóa hạng này? Hành động này không thể hoàn tác!')) showToast('Đã xóa hạng!');" class="w-full flex items-center gap-3 px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 transition-colors text-left">
                                            <span class="iconify text-lg" data-icon="mdi:trash-can-outline"></span> Xóa
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Tab 2: So sánh quyền lợi & Khách sắp lên hạng (2 cột) -->
            <div id="tab-content-compare" class="hidden p-6">
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Khách sắp lên hạng -->
        <div class="xl:col-span-1">
            <div class="bg-amber-50 rounded-2xl shadow-sm border border-amber-200 p-6 h-full">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-amber-900 flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:trending-up"></span> Khách sắp lên hạng
                    </h3>
                    <span class="px-2 py-0.5 bg-white text-amber-700 text-xs font-bold rounded shadow-sm">48 người</span>
                </div>
                <p class="text-xs text-amber-700/80 mb-4">Gửi voucher hoặc tin nhắn để khuyến khích khách hàng mua sắm đạt mốc hạng mới.</p>
                
                <div class="space-y-3">
                    <!-- Item -->
                    <div class="bg-white p-3 rounded-xl border border-amber-100 shadow-sm flex items-center justify-between group">
                        <div>
                            <p class="font-bold text-gray-800 text-sm hover:text-[#6B0D18] cursor-pointer">Trần Thị B</p>
                            <p class="text-[10px] font-bold text-gray-500 mt-0.5">SILVER <span class="iconify inline text-amber-500" data-icon="mdi:arrow-right-thick"></span> GOLD</p>
                        </div>
                        <div class="text-right">
                            <p class="text-[11px] text-gray-500">Còn thiếu</p>
                            <p class="text-sm font-bold text-[#6B0D18]">150.000đ</p>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="bg-white p-3 rounded-xl border border-amber-100 shadow-sm flex items-center justify-between group">
                        <div>
                            <p class="font-bold text-gray-800 text-sm hover:text-[#6B0D18] cursor-pointer">Lê Văn C</p>
                            <p class="text-[10px] font-bold text-gray-500 mt-0.5">GOLD <span class="iconify inline text-amber-500" data-icon="mdi:arrow-right-thick"></span> DIAMOND</p>
                        </div>
                        <div class="text-right">
                            <p class="text-[11px] text-gray-500">Còn thiếu</p>
                            <p class="text-sm font-bold text-[#6B0D18]">450.000đ</p>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="bg-white p-3 rounded-xl border border-amber-100 shadow-sm flex items-center justify-between group">
                        <div>
                            <p class="font-bold text-gray-800 text-sm hover:text-[#6B0D18] cursor-pointer">Phạm Thu D</p>
                            <p class="text-[10px] font-bold text-gray-500 mt-0.5">SILVER <span class="iconify inline text-amber-500" data-icon="mdi:arrow-right-thick"></span> GOLD</p>
                        </div>
                        <div class="text-right">
                            <p class="text-[11px] text-gray-500">Còn thiếu</p>
                            <p class="text-sm font-bold text-[#6B0D18]">820.000đ</p>
                        </div>
                    </div>
                </div>
                
                <button class="w-full mt-4 py-2 bg-white border border-amber-200 text-amber-800 text-sm font-bold rounded-xl hover:bg-amber-100 transition-colors">Xem tất cả</button>
            </div>
        </div>

        <!-- Bảng So Sánh Quyền Lợi -->
        <div class="xl:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800">Ma trận Quyền lợi thành viên</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="p-4 pl-6 text-gray-500 font-medium">Quyền lợi</th>
                                <th class="p-4 text-center bg-gray-50 border-l border-gray-100"><span class="px-2 py-0.5 bg-gray-200 text-gray-700 text-xs font-bold rounded uppercase">Silver</span></th>
                                <th class="p-4 text-center bg-yellow-50/30 border-l border-gray-100"><span class="px-2 py-0.5 bg-yellow-200 text-yellow-800 text-xs font-bold rounded uppercase">Gold</span></th>
                                <th class="p-4 text-center bg-red-50/30 border-l border-gray-100"><span class="px-2 py-0.5 bg-red-100 text-[#6B0D18] text-xs font-bold rounded uppercase">Diamond</span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr>
                                <td class="p-4 pl-6 font-medium text-gray-800">Mức giảm giá mặc định</td>
                                <td class="p-4 text-center font-bold text-gray-700 bg-gray-50 border-l border-gray-100">2%</td>
                                <td class="p-4 text-center font-bold text-yellow-700 bg-yellow-50/30 border-l border-gray-100">5%</td>
                                <td class="p-4 text-center font-bold text-[#6B0D18] bg-red-50/30 border-l border-gray-100">10%</td>
                            </tr>
                            <tr>
                                <td class="p-4 pl-6 font-medium text-gray-800">Voucher sinh nhật</td>
                                <td class="p-4 text-center text-emerald-500 bg-gray-50 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:check"></span></td>
                                <td class="p-4 text-center text-emerald-500 bg-yellow-50/30 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:check"></span></td>
                                <td class="p-4 text-center text-emerald-500 bg-red-50/30 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:check"></span></td>
                            </tr>
                            <tr>
                                <td class="p-4 pl-6 font-medium text-gray-800">Freeship định kỳ</td>
                                <td class="p-4 text-center text-gray-300 bg-gray-50 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:minus"></span></td>
                                <td class="p-4 text-center text-emerald-500 bg-yellow-50/30 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:check"></span></td>
                                <td class="p-4 text-center text-emerald-500 bg-red-50/30 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:check"></span></td>
                            </tr>
                            <tr>
                                <td class="p-4 pl-6 font-medium text-gray-800">Nhận ưu đãi sớm</td>
                                <td class="p-4 text-center text-gray-300 bg-gray-50 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:minus"></span></td>
                                <td class="p-4 text-center text-emerald-500 bg-yellow-50/30 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:check"></span></td>
                                <td class="p-4 text-center text-emerald-500 bg-red-50/30 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:check"></span></td>
                            </tr>
                            <tr>
                                <td class="p-4 pl-6 font-medium text-gray-800">Quà tặng đặc biệt dịp lễ</td>
                                <td class="p-4 text-center text-gray-300 bg-gray-50 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:minus"></span></td>
                                <td class="p-4 text-center text-gray-300 bg-yellow-50/30 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:minus"></span></td>
                                <td class="p-4 text-center text-emerald-500 bg-red-50/30 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:check"></span></td>
                            </tr>
                            <tr>
                                <td class="p-4 pl-6 font-medium text-gray-800">Tư vấn chọn phong thủy 1:1</td>
                                <td class="p-4 text-center text-gray-300 bg-gray-50 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:minus"></span></td>
                                <td class="p-4 text-center text-gray-300 bg-yellow-50/30 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:minus"></span></td>
                                <td class="p-4 text-center text-emerald-500 bg-red-50/30 border-l border-gray-100"><span class="iconify text-xl mx-auto" data-icon="mdi:check"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> <!-- Closes tab-content-compare -->

            <!-- Tab 3: Lịch sử cấu hình -->
            <div id="tab-content-history" class="hidden p-6 bg-gray-50/30">
                <div class="max-w-3xl mx-auto">
                    <h3 class="font-bold text-gray-800 mb-6">Nhật ký cập nhật hệ thống hạng</h3>
                    <div class="space-y-6 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                        <?php foreach($history as $index => $item): ?>
                        <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-300 group-[.is-active]:bg-[#6B0D18] text-white shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 shadow">
                                <span class="iconify" data-icon="mdi:pencil-outline"></span>
                            </div>
                            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-4 rounded-xl border border-slate-200 bg-white shadow-sm">
                                <div class="flex items-center justify-between space-x-2 mb-1">
                                    <div class="font-bold text-slate-900 text-sm"><?= $item['nguoi_tao'] ?></div>
                                    <time class="font-caveat font-medium text-[#6B0D18] text-xs"><?= $item['thoi_gian'] ?></time>
                                </div>
                                <div class="text-slate-500 text-sm"><?= $item['noi_dung'] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div> <!-- Closes p-0 -->
    </div> <!-- Closes bg-white rounded-2xl -->

<!-- ========================================== -->
<!-- POPUPS MODAL -->
<!-- ========================================== -->

<!-- Popup Xem Chi Tiết Hạng -->
<div id="rankDetailModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2 text-lg">
                <span class="iconify text-yellow-500 text-2xl" data-icon="mdi:crown"></span> Thông tin hạng: <span class="uppercase text-yellow-600">GOLD</span>
            </h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="closeModal('rankDetailModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-500">Trạng thái</span>
                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold rounded border border-emerald-100 uppercase">Hoạt động</span>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-500">Mô tả</span>
                <span class="text-sm font-bold text-gray-800">Hạng thân thiết dành cho khách mua thường xuyên</span>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-500">Điều kiện lên hạng</span>
                <span class="text-sm font-bold text-[#6B0D18]">Từ 3.000.000đ</span>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-500">Số lượng khách</span>
                <a href="<?= APP_URL ?>/admin/khach-hang?rank=gold" class="text-sm font-bold text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-1">520 khách <span class="iconify" data-icon="mdi:open-in-new"></span></a>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-500">Voucher liên kết</span>
                <div class="flex gap-1">
                    <span class="px-2 py-0.5 border border-red-200 border-dashed text-[#6B0D18] text-[10px] font-bold rounded bg-red-50">GOLD5</span>
                </div>
            </div>
            <div>
                <span class="text-sm text-gray-500 block mb-2">Quyền lợi:</span>
                <ul class="space-y-1.5 text-sm font-medium text-gray-800 ml-2">
                    <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Giảm 5% mọi đơn hàng</li>
                    <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Freeship định kỳ</li>
                    <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Nhận ưu đãi sớm</li>
                </ul>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-50" onclick="closeModal('rankDetailModal')">Đóng</button>
            <button class="px-4 py-2 bg-yellow-50 text-yellow-700 border border-yellow-200 rounded-lg text-sm font-bold hover:bg-yellow-100 shadow-sm flex items-center gap-2" onclick="closeModal('rankDetailModal'); openEditRankModal('gold');">
                <span class="iconify" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
            </button>
        </div>
    </div>
</div>

<!-- Popup Cấu hình tự động lên hạng -->
<div id="configModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:cog-outline"></span> Cấu hình hệ thống hạng</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="closeModal('configModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-5">
            <div class="flex items-start gap-3 p-3 bg-red-50 rounded-xl border border-red-100">
                <span class="iconify text-red-500 text-xl shrink-0 mt-0.5" data-icon="mdi:alert-circle-outline"></span>
                <p class="text-[11px] text-red-800">Thay đổi các cài đặt này sẽ ảnh hưởng trực tiếp đến logic xét duyệt hạng của toàn bộ khách hàng trên hệ thống. Vui lòng cân nhắc kỹ.</p>
            </div>
            
            <label class="flex items-center justify-between cursor-pointer">
                <div>
                    <p class="text-sm font-bold text-gray-800">Tự động xét hạng</p>
                    <p class="text-[11px] text-gray-500">Tự động nâng/hạ hạng khi khách đạt hoặc rớt điều kiện.</p>
                </div>
                <div class="relative">
                    <input type="checkbox" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                </div>
            </label>
            
            <label class="flex items-center justify-between cursor-pointer">
                <div>
                    <p class="text-sm font-bold text-gray-800">Gửi thông báo thăng hạng</p>
                    <p class="text-[11px] text-gray-500">Gửi mail và chuông thông báo khi khách được thăng hạng.</p>
                </div>
                <div class="relative">
                    <input type="checkbox" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                </div>
            </label>

            <div>
                <label class="block text-sm font-bold text-gray-800 mb-1">Thời điểm chốt doanh số xét hạng</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    <option>Cộng dồn trọn đời (Không bao giờ hạ hạng)</option>
                    <option>Xét theo chu kỳ 1 Năm (12 tháng)</option>
                    <option>Xét theo chu kỳ 6 Tháng</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-800 mb-1">Tính đơn hàng hợp lệ</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    <option>Chỉ tính đơn đã Giao thành công</option>
                    <option>Tính ngay khi Đã thanh toán</option>
                </select>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="closeModal('configModal')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="showToast('Đã lưu cấu hình!'); closeModal('configModal');">Lưu cấu hình</button>
        </div>
    </div>
</div>

<!-- Popup Chỉnh sửa Hạng (Massive UI) -->
<div id="editRankModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl overflow-hidden animate-[fadeInPage_0.2s_ease-out] flex flex-col max-h-[90vh]">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50 shrink-0">
            <h3 class="font-bold text-gray-800 flex items-center gap-2 text-lg">
                <span class="iconify text-yellow-500 text-2xl" data-icon="mdi:crown"></span> Chỉnh sửa hạng: <span class="uppercase text-yellow-600">GOLD</span>
            </h3>
            <div class="flex items-center gap-3">
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-50" onclick="closeModal('editRankModal')">Đóng</button>
                <button class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm" onclick="showToast('Đã lưu thông tin hạng!'); closeModal('editRankModal');">Lưu thay đổi</button>
            </div>
        </div>
        
        <!-- Body (Scrollable) -->
        <div class="flex-1 overflow-y-auto p-6 bg-gray-50/30">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column: Form Settings -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Thông tin cơ bản -->
                    <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                        <h4 class="font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">1. Thông tin hiển thị</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1">Tên định danh (Hệ thống)</label>
                                <input type="text" id="rank-id-input" value="Gold" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1">Tên hiển thị cho Khách hàng <span class="text-red-500">*</span></label>
                                <input type="text" id="rank-display-name-input" onkeyup="updateRankPreview()" value="Thành viên Gold" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-gray-700 mb-1">Mô tả hạng <span class="text-red-500">*</span></label>
                                <input type="text" value="Hạng thân thiết dành cho khách mua thường xuyên" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-gray-700 mb-2">Màu sắc chủ đạo <span class="text-red-500">*</span></label>
                                <div class="flex items-center gap-3">
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="rank_color" value="gray" class="sr-only peer" onchange="updateRankPreview()">
                                        <div class="w-8 h-8 rounded-full bg-gray-500 ring-2 ring-transparent peer-checked:ring-gray-500 peer-checked:ring-offset-2 transition-all"></div>
                                    </label>
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="rank_color" value="yellow" class="sr-only peer" checked onchange="updateRankPreview()">
                                        <div class="w-8 h-8 rounded-full bg-yellow-500 ring-2 ring-transparent peer-checked:ring-yellow-500 peer-checked:ring-offset-2 transition-all"></div>
                                    </label>
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="rank_color" value="red" class="sr-only peer" onchange="updateRankPreview()">
                                        <div class="w-8 h-8 rounded-full bg-red-600 ring-2 ring-transparent peer-checked:ring-red-600 peer-checked:ring-offset-2 transition-all"></div>
                                    </label>
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="rank_color" value="blue" class="sr-only peer" onchange="updateRankPreview()">
                                        <div class="w-8 h-8 rounded-full bg-blue-500 ring-2 ring-transparent peer-checked:ring-blue-500 peer-checked:ring-offset-2 transition-all"></div>
                                    </label>
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="rank_color" value="emerald" class="sr-only peer" onchange="updateRankPreview()">
                                        <div class="w-8 h-8 rounded-full bg-emerald-500 ring-2 ring-transparent peer-checked:ring-emerald-500 peer-checked:ring-offset-2 transition-all"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Điều kiện -->
                    <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                        <h4 class="font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">2. Điều kiện đạt hạng</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-gray-700 mb-1">Tổng chi tiêu tối thiểu (VNĐ) <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="rank-condition-input" onkeyup="updateRankPreview()" value="3.000.000" class="w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg text-sm font-bold text-[#6B0D18] focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                                    <span class="absolute right-3 top-2 text-gray-400 font-bold">đ</span>
                                </div>
                                <p class="text-[11px] text-gray-500 mt-1">Khách hàng cần đạt mức chi tiêu này để được cấp huy hiệu Gold.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quyền lợi -->
                    <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                        <h4 class="font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">3. Quyền lợi & Ưu đãi</h4>
                        <div class="mb-4">
                            <label class="block text-xs font-bold text-gray-700 mb-1">Giảm giá mặc định cho mọi đơn hàng (%)</label>
                            <div class="relative w-32">
                                <input type="number" id="rank-discount-input" onkeyup="updateRankPreview()" onchange="updateRankPreview()" value="5" class="w-full pl-3 pr-8 py-2 border border-gray-300 rounded-lg text-sm font-bold text-[#6B0D18] focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                                <span class="absolute right-3 top-2 text-gray-400 font-bold">%</span>
                            </div>
                        </div>
                        
                        <label class="block text-xs font-bold text-gray-700 mb-2">Các đặc quyền khác (Chọn để hiển thị cho khách)</label>
                        <div class="grid grid-cols-2 gap-3" id="rank-privileges-container">
                            <label class="flex items-center gap-2 cursor-pointer p-2 border border-gray-200 hover:bg-gray-50 rounded-lg transition-colors">
                                <input type="checkbox" checked value="Freeship định kỳ" class="rank-privilege-checkbox text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updateRankPreview()">
                                <span class="text-sm font-medium text-gray-800">Freeship định kỳ</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer p-2 border border-gray-200 hover:bg-gray-50 rounded-lg transition-colors">
                                <input type="checkbox" checked value="Nhận ưu đãi sớm" class="rank-privilege-checkbox text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updateRankPreview()">
                                <span class="text-sm font-medium text-gray-800">Nhận ưu đãi sớm</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer p-2 border border-gray-200 hover:bg-gray-50 rounded-lg transition-colors">
                                <input type="checkbox" value="Quà tặng đặc biệt dịp lễ" class="rank-privilege-checkbox text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updateRankPreview()">
                                <span class="text-sm font-medium text-gray-600">Quà tặng đặc biệt dịp lễ</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer p-2 border border-gray-200 hover:bg-gray-50 rounded-lg transition-colors">
                                <input type="checkbox" value="Tư vấn chọn vòng riêng" class="rank-privilege-checkbox text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updateRankPreview()">
                                <span class="text-sm font-medium text-gray-600">Tư vấn chọn vòng riêng</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer p-2 border border-gray-200 hover:bg-gray-50 rounded-lg transition-colors">
                                <input type="checkbox" value="Voucher sinh nhật" class="rank-privilege-checkbox text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updateRankPreview()">
                                <span class="text-sm font-medium text-gray-600">Voucher sinh nhật</span>
                            </label>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Preview -->
                <div class="lg:col-span-1">
                    <div class="sticky top-0">
                        <h4 class="font-bold text-gray-800 mb-3 text-sm flex items-center gap-2"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Preview (Giao diện khách)</h4>
                        
                        <!-- Mockup Card Khách Hàng -->
                        <div id="preview-card-bg" class="bg-gradient-to-br from-[#FAF8F5] to-white rounded-2xl shadow-lg border border-yellow-200 p-6 relative overflow-hidden transition-all duration-300">
                            <div id="preview-bg-glow" class="absolute top-0 right-0 w-32 h-32 bg-yellow-100 rounded-full opacity-20 -mr-10 -mt-10 blur-xl transition-colors duration-300"></div>
                            
                            <div class="flex items-center justify-between mb-6 relative z-10">
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Hạng của bạn</p>
                                    <h3 id="preview-rank-name" class="text-2xl font-black text-yellow-600 uppercase tracking-wide flex items-center gap-2 transition-colors duration-300">
                                        <span id="preview-icon-1" class="iconify" data-icon="mdi:crown"></span> <span id="preview-name-text">GOLD</span>
                                    </h3>
                                </div>
                                <div id="preview-icon-box" class="w-12 h-12 rounded-full border border-yellow-300 bg-yellow-50 flex items-center justify-center text-yellow-600 shadow-sm transition-colors duration-300">
                                    <span id="preview-icon-2" class="iconify text-2xl" data-icon="mdi:crown"></span>
                                </div>
                            </div>
                            
                            <div class="space-y-4 relative z-10">
                                <div id="preview-discount-box" class="p-3 bg-white/80 backdrop-blur rounded-xl border border-yellow-100 shadow-sm transition-colors duration-300">
                                    <p class="text-xs text-gray-500 mb-1">Ưu đãi giảm giá trực tiếp</p>
                                    <p id="preview-discount-text" class="text-lg font-bold text-[#6B0D18]">Giảm 5% mọi đơn hàng</p>
                                </div>
                                
                                <div>
                                    <p class="text-xs font-bold text-gray-800 mb-2">Đặc quyền của bạn:</p>
                                    <ul id="preview-privileges-list" class="space-y-1.5 text-xs text-gray-600">
                                        <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Freeship định kỳ</li>
                                        <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Nhận ưu đãi sớm</li>
                                    </ul>
                                </div>
                                
                                <div id="preview-divider" class="pt-4 border-t border-yellow-200/50 transition-colors duration-300">
                                    <div class="flex justify-between text-[10px] font-bold text-gray-500 mb-1">
                                        <span>Đã chi tiêu: 3tr</span>
                                        <span id="preview-condition-text">Cần 10tr</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5">
                                        <div id="preview-progress-bar" class="bg-gradient-to-r from-yellow-400 to-[#6B0D18] h-1.5 rounded-full transition-colors duration-300" style="width: 30%"></div>
                                    </div>
                                    <p class="text-[10px] text-center text-gray-500 mt-1.5">Chi tiêu thêm <strong class="text-[#6B0D18]">7.000.000đ</strong> để thăng hạng <strong>DIAMOND</strong></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 p-3 bg-blue-50 border border-blue-100 rounded-xl flex gap-2 text-blue-800 text-xs">
                            <span class="iconify shrink-0 mt-0.5" data-icon="mdi:information-outline"></span>
                            <p>Đây là giao diện mô phỏng hạng thành viên hiển thị trên ứng dụng/web của khách hàng khi họ đăng nhập.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Popup Gán Voucher -->
<div id="assignVoucherModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2">
                <span class="iconify text-blue-500 text-xl" data-icon="mdi:ticket-percent-outline"></span> Gán Voucher cho hạng <span id="assign-rank-name" class="uppercase text-blue-600"></span>
            </h3>
            <button class="text-gray-400 hover:text-gray-600 transition-colors focus:outline-none" onclick="closeModal('assignVoucherModal')">
                <span class="iconify text-2xl" data-icon="mdi:close"></span>
            </button>
        </div>
        
        <div class="p-6">
            <p class="text-sm text-gray-500 mb-4">Chọn các voucher mặc định sẽ tự động được thêm vào ví của khách hàng đạt hạng này.</p>
            
            <div class="relative mb-4">
                <span class="iconify absolute left-3 top-2.5 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm kiếm voucher theo mã hoặc tên..." class="w-full pl-10 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-300 focus:bg-white transition-colors">
            </div>
            
            <div class="space-y-2 max-h-[280px] overflow-y-auto pr-2 custom-scrollbar">
                <!-- Voucher Item -->
                <label class="flex items-start gap-3 p-3 border border-gray-100 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200 group">
                    <input type="checkbox" class="mt-1 text-blue-600 focus:ring-blue-500 rounded border-gray-300 cursor-pointer" checked>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-gray-800 text-sm group-has-[:checked]:text-blue-900">GOLD5</span>
                            <span class="px-1.5 py-0.5 bg-red-100 text-red-600 text-[10px] font-bold rounded">Giảm 5%</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-1 group-has-[:checked]:text-blue-700/80">Giảm 5% cho tất cả các đơn hàng, tối đa 100k</p>
                    </div>
                </label>
                
                <label class="flex items-start gap-3 p-3 border border-gray-100 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200 group">
                    <input type="checkbox" class="mt-1 text-blue-600 focus:ring-blue-500 rounded border-gray-300 cursor-pointer">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-gray-800 text-sm group-has-[:checked]:text-blue-900">FREESHIPVIP</span>
                            <span class="px-1.5 py-0.5 bg-emerald-100 text-emerald-600 text-[10px] font-bold rounded">Freeship</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-1 group-has-[:checked]:text-blue-700/80">Miễn phí vận chuyển toàn quốc cho đơn từ 0đ</p>
                    </div>
                </label>
                
                <label class="flex items-start gap-3 p-3 border border-gray-100 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200 group">
                    <input type="checkbox" class="mt-1 text-blue-600 focus:ring-blue-500 rounded border-gray-300 cursor-pointer">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-gray-800 text-sm group-has-[:checked]:text-blue-900">SINHNHAT</span>
                            <span class="px-1.5 py-0.5 bg-purple-100 text-purple-600 text-[10px] font-bold rounded">Giảm 200k</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-1 group-has-[:checked]:text-blue-700/80">Quà tặng sinh nhật thành viên ưu tú</p>
                    </div>
                </label>
            </div>
            
            <div class="flex items-center gap-3 mt-6 pt-4 border-t border-gray-100">
                <button class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-200 transition-colors" onclick="closeModal('assignVoucherModal')">Hủy</button>
                <button class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-bold hover:bg-blue-700 transition-colors shadow-sm flex justify-center items-center gap-2" onclick="closeModal('assignVoucherModal'); showToast('Đã lưu danh sách voucher!');">
                    <span class="iconify" data-icon="mdi:check"></span> Lưu thay đổi
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-[90] flex flex-col gap-2"></div>

<!-- Scripts -->
<script>
    function toggleActionDropdown(e, id) {
        e.stopPropagation();
        const dropdown = document.getElementById(id);
        const isHidden = dropdown.classList.contains('hidden');
        
        // Hide all others
        document.querySelectorAll('.action-dropdown').forEach(d => d.classList.add('hidden'));
        
        if (isHidden) {
            dropdown.classList.remove('hidden');
            const rect = e.currentTarget.getBoundingClientRect();
            
            // Check bottom overflow
            if (rect.bottom + dropdown.offsetHeight > window.innerHeight) {
                dropdown.style.top = (rect.top - dropdown.offsetHeight) + 'px';
            } else {
                dropdown.style.top = rect.bottom + 'px';
            }
            // Align to right edge of button
            dropdown.style.left = (rect.right - dropdown.offsetWidth) + 'px';
        }
    }

    // Close when click outside
    document.addEventListener('click', () => {
        document.querySelectorAll('.action-dropdown').forEach(d => d.classList.add('hidden'));
    });
    function switchRankTab(tabId) {
        // Hide all tabs
        ['list', 'compare', 'history'].forEach(id => {
            document.getElementById('tab-content-' + id).classList.remove('block');
            document.getElementById('tab-content-' + id).classList.add('hidden');
            
            // Reset tab styles
            let btn = document.getElementById('tab-btn-' + id);
            btn.className = 'px-6 py-4 font-medium text-sm text-gray-500 hover:text-gray-800 border-b-2 border-transparent whitespace-nowrap transition-colors';
        });

        // Show active tab
        document.getElementById('tab-content-' + tabId).classList.remove('hidden');
        document.getElementById('tab-content-' + tabId).classList.add('block');
        
        // Active tab style
        let activeBtn = document.getElementById('tab-btn-' + tabId);
        activeBtn.className = 'px-6 py-4 font-bold text-sm text-[#6B0D18] border-b-2 border-[#6B0D18] whitespace-nowrap transition-colors';
    }

    function openConfigModal() { document.getElementById('configModal').classList.remove('hidden'); }
    function openRankDetailModal(rankId) {
        document.getElementById('rankDetailModal').classList.remove('hidden');
    }
    function openAddRankModal() { 
        document.getElementById('editRankModal').querySelector('h3').innerHTML = '<span class="iconify text-gray-500 text-2xl" data-icon="mdi:medal-outline"></span> Thêm hạng mới';
        document.getElementById('rank-id-input').value = '';
        document.getElementById('rank-id-input').readOnly = false;
        document.getElementById('rank-display-name-input').value = '';
        document.getElementById('rank-condition-input').value = '';
        document.getElementById('rank-discount-input').value = '0';
        document.querySelectorAll('.rank-privilege-checkbox').forEach(cb => cb.checked = false);
        document.querySelector('input[name="rank_color"][value="gray"]').checked = true;

        document.getElementById('editRankModal').classList.remove('hidden'); 
        updateRankPreview();
    }
    function openEditRankModal(rankId) { 
        document.getElementById('editRankModal').querySelector('h3').innerHTML = '<span class="iconify text-yellow-500 text-2xl" data-icon="mdi:crown"></span> Chỉnh sửa hạng: <span class="uppercase text-yellow-600">GOLD</span>';
        document.getElementById('rank-id-input').value = 'Gold';
        document.getElementById('rank-id-input').readOnly = true;
        document.getElementById('rank-display-name-input').value = 'Thành viên Gold';
        document.getElementById('rank-condition-input').value = '3.000.000';
        document.getElementById('rank-discount-input').value = '5';
        document.querySelectorAll('.rank-privilege-checkbox').forEach(cb => {
            if (cb.value === 'Freeship định kỳ' || cb.value === 'Nhận ưu đãi sớm') cb.checked = true;
            else cb.checked = false;
        });
        document.querySelector('input[name="rank_color"][value="yellow"]').checked = true;

        document.getElementById('editRankModal').classList.remove('hidden'); 
        updateRankPreview();
    }
    function openAssignVoucherModal(rankId) { 
        document.getElementById('assign-rank-name').textContent = rankId;
        document.getElementById('assignVoucherModal').classList.remove('hidden');
    }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

    function showToast(message) {
        const container = document.getElementById('toastContainer');
        const toast = document.createElement('div');
        toast.className = 'bg-gray-800 text-white px-4 py-3 rounded-xl shadow-xl text-sm font-medium flex items-center gap-3 animate-[fadeInPage_0.3s_ease-out]';
        toast.innerHTML = `
            <span class="iconify text-emerald-400 text-lg" data-icon="mdi:check-circle"></span>
            ${message}
            <button class="ml-2 text-gray-400 hover:text-white transition-colors" onclick="this.parentElement.remove()">
                <span class="iconify text-lg" data-icon="mdi:close"></span>
            </button>
        `;
        container.appendChild(toast);
        setTimeout(() => {
            if(toast.parentElement) {
                toast.classList.add('opacity-0', 'translate-y-2', 'transition-all', 'duration-300');
                setTimeout(() => toast.remove(), 300);
            }
        }, 3000);
    }

    function updateRankPreview() {
        const nameInput = document.getElementById('rank-display-name-input').value || 'TÊN HẠNG';
        const discountInput = document.getElementById('rank-discount-input').value || '0';
        const conditionInput = document.getElementById('rank-condition-input').value || '0';
        const colorInput = document.querySelector('input[name="rank_color"]:checked').value;
        
        // Update Text
        document.getElementById('preview-name-text').textContent = nameInput;
        document.getElementById('preview-discount-text').textContent = 'Giảm ' + discountInput + '% mọi đơn hàng';
        
        // Update Condition Text
        let conditionStr = conditionInput.replace(/\D/g, '');
        if(conditionStr === '') conditionStr = '0';
        if(conditionStr.length > 6) {
            conditionStr = (parseInt(conditionStr) / 1000000).toFixed(1).replace('.0', '') + 'tr';
        } else if (conditionStr.length > 3) {
            conditionStr = (parseInt(conditionStr) / 1000).toFixed(0) + 'k';
        } else {
            conditionStr += 'đ';
        }
        document.getElementById('preview-condition-text').textContent = 'Cần ' + (conditionStr === '0đ' ? '0' : conditionStr);

        // Update Privileges
        const privilegesList = document.getElementById('preview-privileges-list');
        privilegesList.innerHTML = '';
        document.querySelectorAll('.rank-privilege-checkbox:checked').forEach(cb => {
            privilegesList.innerHTML += `<li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> ${cb.value}</li>`;
        });
        if(privilegesList.innerHTML === '') {
            privilegesList.innerHTML = '<li class="text-gray-400 italic">Chưa có đặc quyền nào</li>';
        }
        
        // Color Mapping
        const colors = {
            'gray': {
                nameClass: 'text-gray-500',
                borderClass: 'border-gray-300',
                bgClass: 'bg-gray-100',
                iconClass: 'text-gray-600',
                progressClass: 'from-gray-400',
                glowClass: 'bg-gray-200',
                boxBorderClass: 'border-gray-200'
            },
            'yellow': {
                nameClass: 'text-yellow-600',
                borderClass: 'border-yellow-300',
                bgClass: 'bg-yellow-50',
                iconClass: 'text-yellow-600',
                progressClass: 'from-yellow-400',
                glowClass: 'bg-yellow-100',
                boxBorderClass: 'border-yellow-200'
            },
            'red': {
                nameClass: 'text-red-600',
                borderClass: 'border-red-300',
                bgClass: 'bg-red-50',
                iconClass: 'text-red-600',
                progressClass: 'from-red-400',
                glowClass: 'bg-red-100',
                boxBorderClass: 'border-red-200'
            },
            'blue': {
                nameClass: 'text-blue-600',
                borderClass: 'border-blue-300',
                bgClass: 'bg-blue-50',
                iconClass: 'text-blue-600',
                progressClass: 'from-blue-400',
                glowClass: 'bg-blue-100',
                boxBorderClass: 'border-blue-200'
            },
            'emerald': {
                nameClass: 'text-emerald-600',
                borderClass: 'border-emerald-300',
                bgClass: 'bg-emerald-50',
                iconClass: 'text-emerald-600',
                progressClass: 'from-emerald-400',
                glowClass: 'bg-emerald-100',
                boxBorderClass: 'border-emerald-200'
            }
        };
        
        const c = colors[colorInput];
        
        // Update Classes
        document.getElementById('preview-rank-name').className = `text-2xl font-black uppercase tracking-wide flex items-center gap-2 transition-colors duration-300 ${c.nameClass}`;
        document.getElementById('preview-card-bg').className = `bg-gradient-to-br from-[#FAF8F5] to-white rounded-2xl shadow-lg border p-6 relative overflow-hidden transition-all duration-300 ${c.borderClass}`;
        document.getElementById('preview-bg-glow').className = `absolute top-0 right-0 w-32 h-32 rounded-full opacity-20 -mr-10 -mt-10 blur-xl transition-colors duration-300 ${c.glowClass}`;
        document.getElementById('preview-icon-box').className = `w-12 h-12 rounded-full border flex items-center justify-center shadow-sm transition-colors duration-300 ${c.borderClass} ${c.bgClass} ${c.iconClass}`;
        document.getElementById('preview-discount-box').className = `p-3 bg-white/80 backdrop-blur rounded-xl border shadow-sm transition-colors duration-300 ${c.boxBorderClass}`;
        document.getElementById('preview-divider').className = `pt-4 border-t transition-colors duration-300 ${c.boxBorderClass}`;
        document.getElementById('preview-progress-bar').className = `bg-gradient-to-r to-[#6B0D18] h-1.5 rounded-full transition-colors duration-300 ${c.progressClass}`;
    }
</script>
