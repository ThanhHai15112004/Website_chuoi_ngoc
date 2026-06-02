<?php
// views/pages/admin_nhan_su_view.php
use App\Models\Admin\NhanSuModel;

$staff           = $staff ?? null;
$quyen           = $quyen ?? [];
$lichSu          = $lichSu ?? [];
$lichSuDangNhap  = $lichSuDangNhap ?? [];

if (!$staff) {
    echo '<div class="p-8 text-center text-gray-500">Không tìm thấy nhân viên.</div>';
    return;
}

$trangThaiText = NhanSuModel::tenTrangThai($staff['trang_thai']);
$statusClass = '';
if ($staff['trang_thai'] == 'hoat_dong') $statusClass = 'bg-emerald-100 text-emerald-700 border border-emerald-200';
elseif ($staff['trang_thai'] == 'cho_kich_hoat') $statusClass = 'bg-amber-100 text-amber-700 border border-amber-200';
else $statusClass = 'bg-red-100 text-red-700 border border-red-200';
?>
<div class="px-4 md:px-6 py-6 pb-24 max-w-[1200px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-6">
        <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18] transition-colors">Admin</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <a href="<?= APP_URL ?>/admin/nhan-su" class="hover:text-[#6B0D18] transition-colors">Quản lý nhân sự</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span class="text-gray-900 font-medium">Chi tiết nhân viên</span>
    </nav>

    <!-- Header Thông tin -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div class="flex items-center gap-5">
            <img src="<?= $staff['avatar_url'] ?>" alt="Avatar" class="w-20 h-20 rounded-full border-4 border-white shadow-md">
            <div>
                <div class="flex items-center gap-3 mb-1.5">
                    <h3 class="font-bold text-gray-900 text-2xl"><?= htmlspecialchars($staff['ho_ten']) ?></h3>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold <?= $statusClass ?>"><?= $trangThaiText ?></span>
                </div>
                <p class="text-sm text-gray-500 flex items-center gap-2">
                    <span class="font-medium text-gray-700"><?= $staff['ma_nv'] ?></span> 
                    <span class="w-1 h-1 rounded-full bg-gray-300"></span> 
                    <span class="inline-flex items-center gap-1 font-bold text-[#6B0D18] bg-[#6B0D18]/10 px-2 py-0.5 rounded-md"><span class="iconify" data-icon="mdi:shield-crown-outline"></span> <?= htmlspecialchars($staff['vai_tro']) ?></span>
                </p>
            </div>
        </div>
        
        <div class="flex flex-wrap items-center gap-3 w-full md:w-auto border-t border-gray-100 md:border-0 pt-4 md:pt-0 mt-2 md:mt-0">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify text-gray-400" data-icon="mdi:shield-account-outline"></span> Phân quyền
            </button>
            <?php if ($staff['trang_thai'] !== 'bi_khoa'): ?>
            <button onclick="openLockModal(<?= $id ?>, '<?= htmlspecialchars(addslashes($staff['ho_ten'])) ?>')" class="px-4 py-2 bg-white border border-gray-200 text-orange-600 rounded-lg hover:bg-orange-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm tooltip" title="Khóa tài khoản">
                <span class="iconify text-lg" data-icon="mdi:lock-outline"></span> <span class="md:hidden">Khóa</span>
            </button>
            <?php else: ?>
            <button onclick="handleUnlock(<?= $id ?>)" class="px-4 py-2 bg-white border border-gray-200 text-emerald-600 rounded-lg hover:bg-emerald-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:lock-open-outline"></span> Mở khóa
            </button>
            <?php endif; ?>
            <a href="<?= APP_URL ?>/admin/nhan-su/sua/<?= $id ?>" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-bold flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
            </a>
        </div>
    </div>

    <!-- Nội dung chính chia 2 cột -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Cột trái: Menu Tabs -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden p-2">
                <button onclick="switchViewTab('tong-quan')" id="btn-view-tong-quan" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-sm font-bold text-[#6B0D18] bg-red-50 transition-colors mb-1">
                    <span class="iconify text-lg" data-icon="mdi:view-dashboard-outline"></span> Tổng quan
                </button>
                <button onclick="switchViewTab('thong-tin')" id="btn-view-thong-tin" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors mb-1">
                    <span class="iconify text-lg" data-icon="mdi:card-account-details-outline"></span> Thông tin cá nhân
                </button>
                <button onclick="switchViewTab('phan-quyen')" id="btn-view-phan-quyen" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors mb-1">
                    <span class="iconify text-lg" data-icon="mdi:shield-check-outline"></span> Vai trò & Quyền
                </button>
                <button onclick="switchViewTab('lich-su-dang-nhap')" id="btn-view-lich-su-dang-nhap" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors mb-1">
                    <span class="iconify text-lg" data-icon="mdi:login-variant"></span> Lịch sử đăng nhập
                </button>
                <button onclick="switchViewTab('nhat-ky')" id="btn-view-nhat-ky" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <span class="iconify text-lg" data-icon="mdi:history"></span> Nhật ký hoạt động
                </button>
            </div>

            <!-- Liên hệ nhanh -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5">
                <h4 class="text-sm font-bold text-gray-900 mb-4 pb-3 border-b border-gray-100 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:card-account-mail-outline"></span> Thông tin liên lạc
                </h4>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                            <span class="iconify" data-icon="mdi:email-outline"></span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-0.5">Email</p>
                            <p class="text-sm font-bold text-gray-900"><?= htmlspecialchars($staff['email']) ?></p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                            <span class="iconify" data-icon="mdi:phone-outline"></span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-0.5">Số điện thoại</p>
                            <p class="text-sm font-bold text-gray-900"><?= $staff['dien_thoai'] ?: 'Chưa cập nhật' ?></p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                            <span class="iconify" data-icon="mdi:domain"></span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-0.5">Phòng ban</p>
                            <p class="text-sm font-bold text-gray-900"><?= htmlspecialchars($staff['phong_ban'] ?? 'Chưa cập nhật') ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if ($staff['vai_tro'] === 'Super Admin'): ?>
            <div class="bg-orange-50 border border-orange-200 rounded-2xl p-5 shadow-sm">
                <h4 class="text-sm font-bold text-orange-800 mb-2 flex items-center gap-2">
                    <span class="iconify text-lg text-orange-500" data-icon="mdi:shield-alert-outline"></span> Cảnh báo quyền
                </h4>
                <p class="text-xs text-orange-700 leading-relaxed">Tài khoản này có toàn quyền truy cập và chỉnh sửa hệ thống. Hãy bảo mật cẩn thận và bật xác minh 2 bước nếu có thể.</p>
            </div>
            <?php endif; ?>
        </div>

        <!-- Cột phải: Content Tabs -->
        <div class="lg:col-span-2">
            
            <!-- TAB TỔNG QUAN -->
            <div id="view-tab-tong-quan" class="view-tab-content block">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gray-50 text-gray-600 flex items-center justify-center shrink-0 border border-gray-100">
                            <span class="iconify text-2xl" data-icon="mdi:calendar-account-outline"></span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium mb-1">Ngày tạo tài khoản</p>
                            <p class="text-lg font-bold text-gray-900"><?= $staff['ngay_tao'] ? date('d/m/Y', strtotime($staff['ngay_tao'])) : 'N/A' ?></p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                            <span class="iconify text-2xl" data-icon="mdi:login-variant"></span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium mb-1">Lần đăng nhập cuối</p>
                            <p class="text-lg font-bold text-gray-900">
                                <?php if ($staff['lan_dang_nhap_cuoi']): ?>
                                    <?= date('d/m/Y', strtotime($staff['lan_dang_nhap_cuoi'])) ?> <span class="text-sm text-gray-500 font-normal ml-1"><?= date('H:i', strtotime($staff['lan_dang_nhap_cuoi'])) ?></span>
                                <?php else: ?>
                                    <span class="text-sm text-gray-400">Chưa từng</span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-base font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <span class="iconify text-gray-400" data-icon="mdi:chart-line"></span> Thông tin bổ sung
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between text-sm border-b border-gray-100 pb-3">
                            <span class="text-gray-500">Ngày vào làm</span>
                            <span class="font-medium text-gray-900"><?= $staff['ngay_vao_lam'] ? date('d/m/Y', strtotime($staff['ngay_vao_lam'])) : 'Chưa cập nhật' ?></span>
                        </div>
                        <div class="flex justify-between text-sm border-b border-gray-100 pb-3">
                            <span class="text-gray-500">Người tạo</span>
                            <span class="font-medium text-gray-900"><?= htmlspecialchars($staff['nguoi_tao'] ?? 'N/A') ?></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Yêu cầu đổi mật khẩu</span>
                            <span class="font-medium <?= $staff['yeu_cau_doi_mk'] ? 'text-amber-600' : 'text-emerald-600' ?>"><?= $staff['yeu_cau_doi_mk'] ? 'Có' : 'Không' ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB THÔNG TIN -->
            <div id="view-tab-thong-tin" class="view-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                        <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:card-account-details-outline"></span> Chi tiết nhân sự
                        </h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <?php
                        $infoRows = [
                            ['Họ và tên', $staff['ho_ten'], true],
                            ['Mã NV', $staff['ma_nv']],
                            ['Ngày sinh', $staff['ngay_sinh'] ? date('d/m/Y', strtotime($staff['ngay_sinh'])) : 'Chưa cập nhật'],
                            ['Địa chỉ', $staff['dia_chi'] ?: 'Chưa cập nhật'],
                            ['Ngày vào làm', $staff['ngay_vao_lam'] ? date('d/m/Y', strtotime($staff['ngay_vao_lam'])) : 'Chưa cập nhật'],
                        ];
                        foreach ($infoRows as $i => $row): ?>
                        <div class="grid grid-cols-3 gap-6 border-b border-gray-100 pb-6">
                            <div class="col-span-1 text-sm font-medium text-gray-500"><?= $row[0] ?></div>
                            <div class="col-span-2 text-sm text-gray-900 <?= ($row[2] ?? false) ? 'font-bold' : '' ?>"><?= htmlspecialchars($row[1]) ?></div>
                        </div>
                        <?php endforeach; ?>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-1 text-sm font-medium text-gray-500">Ghi chú nội bộ</div>
                            <div class="col-span-2">
                                <p class="text-sm text-gray-600 bg-gray-50 p-4 rounded-xl border border-gray-100 italic">"<?= htmlspecialchars($staff['ghi_chu'] ?: 'Không có ghi chú') ?>"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB PHÂN QUYỀN -->
            <div id="view-tab-phan-quyen" class="view-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:shield-check-outline"></span> Bảng phân quyền chi tiết
                        </h3>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-bold bg-[#6B0D18]/10 text-[#6B0D18] border border-[#6B0D18]/20">
                            <span class="iconify" data-icon="mdi:shield-crown-outline"></span> <?= htmlspecialchars($staff['vai_tro']) ?>
                        </span>
                    </div>
                    
                    <div class="space-y-4">
                        <?php 
                        $moduleIcons = [
                            'Dashboard' => 'mdi:view-dashboard-outline',
                            'Sản phẩm' => 'mdi:package-variant-closed',
                            'Đơn hàng' => 'mdi:receipt-text-outline',
                            'Kho' => 'mdi:warehouse',
                            'Cấu hình' => 'mdi:cog-outline',
                        ];
                        foreach ($quyen as $q): 
                            $hasAny = $q['xem'] || $q['them'] || $q['sua'] || $q['xoa'] || $q['dac_biet'];
                            $allPerms = $q['xem'] && $q['them'] && $q['sua'] && $q['xoa'];
                            $permText = $allPerms ? 'Toàn quyền' : ($hasAny ? implode(', ', array_filter([
                                $q['xem'] ? 'Xem' : '', $q['them'] ? 'Thêm' : '', $q['sua'] ? 'Sửa' : '', $q['xoa'] ? 'Xóa' : '', $q['dac_biet'] ? 'Đặc biệt' : ''
                            ])) : 'Không có quyền');
                            $permClass = $allPerms ? 'bg-emerald-100 text-emerald-700' : ($hasAny ? 'bg-blue-50 text-blue-700' : 'bg-gray-100 text-gray-500');
                            $icon = 'mdi:view-grid-outline';
                            foreach ($moduleIcons as $k => $v) { if (strpos($q['module'], $k) !== false) { $icon = $v; break; } }
                            $isSuperModule = strpos($q['module'], 'Cấu hình') !== false && $staff['vai_tro'] === 'Super Admin';
                        ?>
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-between hover:border-gray-300 transition-colors <?= $isSuperModule ? 'relative overflow-hidden' : '' ?>">
                            <?php if ($isSuperModule): ?><div class="absolute inset-0 bg-[#6B0D18]/5 pointer-events-none"></div><?php endif; ?>
                            <div class="flex items-center gap-3 <?= $isSuperModule ? 'relative z-10' : '' ?>">
                                <div class="w-10 h-10 rounded-lg bg-white border <?= $isSuperModule ? 'border-[#6B0D18]/30 text-[#6B0D18]' : 'border-gray-200 text-gray-500' ?> flex items-center justify-center">
                                    <span class="iconify text-xl" data-icon="<?= $icon ?>"></span>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900"><?= htmlspecialchars($q['module']) ?></p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold <?= $isSuperModule ? 'bg-[#6B0D18] text-white shadow-sm relative z-10' : $permClass ?>"><?= $isSuperModule ? 'Quyền tối cao' : $permText ?></span>
                        </div>
                        <?php endforeach; ?>
                        <?php if (empty($quyen)): ?>
                            <p class="text-center text-gray-400 py-6">Chưa có quyền nào được thiết lập.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- TAB LỊCH SỬ ĐĂNG NHẬP -->
            <div id="view-tab-lich-su-dang-nhap" class="view-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/50">
                        <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:login-variant"></span> Phiên đăng nhập gần đây
                        </h3>
                    </div>
                    <table class="w-full text-left">
                        <thead class="bg-white border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-xs text-gray-500 font-medium">Thời gian</th>
                                <th class="px-6 py-3 text-xs text-gray-500 font-medium">IP / Thiết bị</th>
                                <th class="px-6 py-3 text-xs text-gray-500 font-medium text-right">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            <?php if (empty($lichSuDangNhap)): ?>
                                <tr><td colspan="3" class="px-6 py-8 text-center text-gray-400 text-sm">Chưa có lịch sử đăng nhập</td></tr>
                            <?php else: ?>
                                <?php foreach ($lichSuDangNhap as $l): 
                                    $isSuccess = strpos($l['mo_ta'], 'thành công') !== false;
                                    $isSuspect = !$isSuccess;
                                ?>
                                <tr class="hover:bg-gray-50 transition-colors <?= $isSuspect ? 'bg-red-50/20' : '' ?>">
                                    <td class="px-6 py-4">
                                        <p class="text-sm font-bold text-gray-900"><?= date('d/m/Y', strtotime($l['ngay_thuc_hien'])) ?></p>
                                        <p class="text-xs text-gray-500"><?= date('H:i:s', strtotime($l['ngay_thuc_hien'])) ?></p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-sm <?= $isSuspect ? 'text-red-600 font-medium flex items-center gap-1' : 'text-gray-900 font-medium' ?>">
                                            <?php if ($isSuspect): ?><span class="iconify" data-icon="mdi:alert-circle-outline"></span><?php endif; ?>
                                            <?= htmlspecialchars($l['ip_address'] ?: 'N/A') ?>
                                        </p>
                                        <p class="text-xs text-gray-500 flex items-center gap-1 mt-0.5"><?= htmlspecialchars($l['thiet_bi'] ?: 'N/A') ?></p>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold <?= $isSuccess ? 'bg-emerald-50 text-emerald-700 border border-emerald-100' : 'bg-red-50 text-red-700 border border-red-100' ?>">
                                            <?= htmlspecialchars($l['mo_ta']) ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TAB NHẬT KÝ -->
            <div id="view-tab-nhat-ky" class="view-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:history"></span> Nhật ký hoạt động gần đây
                        </h3>
                    </div>

                    <?php if (empty($lichSu)): ?>
                        <p class="text-center text-gray-400 py-8">Chưa có nhật ký hoạt động</p>
                    <?php else: ?>
                    <div class="relative border-l-2 border-gray-100 ml-4 space-y-8">
                        <?php foreach ($lichSu as $l): 
                            $color = 'bg-blue-500';
                            if (strpos($l['hanh_dong'], 'Tạo') !== false) $color = 'bg-emerald-500';
                            elseif (strpos($l['hanh_dong'], 'Xóa') !== false) $color = 'bg-red-500';
                            elseif (strpos($l['hanh_dong'], 'Khóa') !== false) $color = 'bg-orange-500';
                            elseif (strpos($l['hanh_dong'], 'Mở khóa') !== false) $color = 'bg-emerald-500';
                            $isDanger = strpos($l['hanh_dong'], 'Xóa') !== false;
                        ?>
                        <div class="relative pl-8">
                            <div class="absolute w-4 h-4 rounded-full <?= $color ?> border-[3px] border-white -left-[9px] top-1 shadow-sm"></div>
                            <div class="<?= $isDanger ? 'bg-red-50 border-red-100' : 'bg-gray-50 border-gray-100' ?> rounded-xl p-4 border">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-sm font-bold <?= $isDanger ? 'text-red-900' : 'text-gray-900' ?>"><?= htmlspecialchars($l['hanh_dong']) ?></p>
                                    <p class="text-xs <?= $isDanger ? 'text-red-500' : 'text-gray-500' ?> font-medium whitespace-nowrap"><?= date('d/m/Y - H:i', strtotime($l['ngay_thuc_hien'])) ?></p>
                                </div>
                                <?php if ($l['mo_ta']): ?>
                                <p class="text-xs <?= $isDanger ? 'text-red-700' : 'text-gray-600' ?> mb-2"><?= htmlspecialchars($l['mo_ta']) ?></p>
                                <?php endif; ?>
                                <?php if ($l['nguoi_thuc_hien']): ?>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-white border border-gray-200 text-gray-500">Bởi: <?= htmlspecialchars($l['nguoi_thuc_hien']) ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modals -->
<?php require_once __DIR__ . '/../components/Admin/nhan_su/modals.php'; ?>

<script>
    function switchViewTab(tabId) {
        document.querySelectorAll('[id^="btn-view-"]').forEach(btn => {
            btn.classList.remove('bg-red-50', 'text-[#6B0D18]', 'font-bold');
            btn.classList.add('text-gray-600', 'font-medium');
        });
        const activeBtn = document.getElementById('btn-view-' + tabId);
        if(activeBtn) {
            activeBtn.classList.remove('text-gray-600', 'font-medium');
            activeBtn.classList.add('bg-red-50', 'text-[#6B0D18]', 'font-bold');
        }
        document.querySelectorAll('.view-tab-content').forEach(content => {
            content.classList.remove('block');
            content.classList.add('hidden');
        });
        const activeContent = document.getElementById('view-tab-' + tabId);
        if(activeContent) {
            activeContent.classList.remove('hidden');
            activeContent.classList.add('block');
        }
    }
</script>
