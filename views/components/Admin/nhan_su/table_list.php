<?php
// views/components/Admin/nhan_su/table_list.php
use App\Models\NhanSuModel;
$staffs = $staffs ?? [];
?>
<div class="overflow-x-auto">
    <?php if (empty($staffs)): ?>
    <div class="px-6 py-16 text-center">
        <div class="w-16 h-16 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-4">
            <span class="iconify text-3xl text-gray-400" data-icon="mdi:account-search-outline"></span>
        </div>
        <p class="text-gray-500 font-medium mb-2">Không tìm thấy nhân viên nào</p>
        <p class="text-sm text-gray-400">Thử thay đổi bộ lọc hoặc <a href="<?= APP_URL ?>/admin/nhan-su/them" class="text-[#6B0D18] hover:underline font-medium">thêm nhân viên mới</a></p>
    </div>
    <?php else: ?>
    <table class="w-full text-left border-collapse min-w-[1200px]">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200 text-xs text-gray-500 uppercase tracking-wider">
                <th class="px-6 py-3 w-10 text-center">
                    <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" onchange="toggleSelectAll(this)">
                </th>
                <th class="px-6 py-3 font-medium">Nhân viên</th>
                <th class="px-6 py-3 font-medium">Liên hệ</th>
                <th class="px-6 py-3 font-medium">Vai trò & Phòng ban</th>
                <th class="px-6 py-3 font-medium">Quyền chính</th>
                <th class="px-6 py-3 font-medium text-center">Trạng thái</th>
                <th class="px-6 py-3 font-medium">Đăng nhập lần cuối</th>
                <th class="px-6 py-3 font-medium text-right">Thao tác</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php foreach($staffs as $s): 
                $trangThaiText = NhanSuModel::tenTrangThai($s['trang_thai']);
            ?>
            <tr class="hover:bg-gray-50 transition-colors group">
                <td class="px-6 py-4 text-center">
                    <input type="checkbox" class="staff-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" value="<?= $s['id'] ?>" onchange="updateBulkAction()">
                </td>
                
                <!-- Cột Nhân viên -->
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <img src="<?= $s['avatar_url'] ?>" alt="<?= htmlspecialchars($s['ho_ten']) ?>" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                        <div>
                            <div class="flex items-center gap-2 mb-0.5">
                                <a href="<?= APP_URL ?>/admin/nhan-su/xem/<?= $s['id'] ?>" class="font-bold text-gray-900 hover:text-[#6B0D18] transition-colors"><?= htmlspecialchars($s['ho_ten']) ?></a>
                                <?php if($s['id'] == 1): ?>
                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold bg-gray-100 text-gray-600">Bạn</span>
                                <?php endif; ?>
                            </div>
                            <span class="text-xs text-gray-500"><?= $s['ma_nv'] ?></span>
                        </div>
                    </div>
                </td>
                
                <!-- Cột Liên hệ -->
                <td class="px-6 py-4">
                    <div class="text-sm text-gray-900 font-medium mb-1"><a href="mailto:<?= $s['email'] ?>" class="hover:text-blue-600 transition-colors"><?= htmlspecialchars($s['email']) ?></a></div>
                    <div class="text-xs text-gray-500 flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:phone-outline"></span> <?= $s['dien_thoai'] ?: 'Chưa cập nhật' ?>
                    </div>
                </td>
                
                <!-- Cột Vai trò -->
                <td class="px-6 py-4">
                    <?php
                        $roleClass = 'bg-gray-100 text-gray-700';
                        $icon = 'mdi:account-outline';
                        if($s['vai_tro'] == 'Super Admin') { $roleClass = 'bg-[#6B0D18]/10 text-[#6B0D18]'; $icon = 'mdi:shield-crown-outline'; }
                        if($s['vai_tro'] == 'Admin') { $roleClass = 'bg-orange-50 text-orange-700'; $icon = 'mdi:shield-account-outline'; }
                        if($s['vai_tro'] == 'Quản lý kho') { $roleClass = 'bg-blue-50 text-blue-700'; $icon = 'mdi:warehouse'; }
                        if($s['vai_tro'] == 'CSKH') { $roleClass = 'bg-purple-50 text-purple-700'; $icon = 'mdi:headset'; }
                        if($s['vai_tro'] == 'Nhân viên bán hàng') { $roleClass = 'bg-emerald-50 text-emerald-700'; $icon = 'mdi:cart-outline'; }
                        if($s['vai_tro'] == 'Kế toán / báo cáo') { $roleClass = 'bg-orange-50 text-orange-700'; $icon = 'mdi:calculator'; }
                    ?>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-xs font-bold <?= $roleClass ?>">
                            <span class="iconify" data-icon="<?= $icon ?>"></span> <?= htmlspecialchars($s['vai_tro']) ?>
                        </span>
                    </div>
                    <div class="text-xs text-gray-500 flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:domain"></span> <?= htmlspecialchars($s['phong_ban'] ?? 'N/A') ?>
                    </div>
                </td>
                
                <!-- Cột Quyền chính -->
                <td class="px-6 py-4">
                    <div class="flex flex-wrap gap-1 max-w-[200px]">
                        <?php 
                        $perms = $s['permissions'] ?? [];
                        foreach($perms as $i => $perm): ?>
                            <?php if($i < 2): ?>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                    <?php if($perm == 'Toàn quyền hệ thống'): ?><span class="iconify mr-1 text-[#6B0D18]" data-icon="mdi:shield-star"></span><?php endif; ?>
                                    <?= htmlspecialchars($perm) ?>
                                </span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if(count($perms) > 2): ?>
                            <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[11px] font-medium bg-gray-50 text-gray-500 border border-gray-200 tooltip" title="Xem thêm trong chi tiết">
                                +<?= count($perms) - 2 ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </td>
                
                <!-- Cột Trạng thái -->
                <td class="px-6 py-4 text-center">
                    <?php
                        $statusClass = '';
                        if($s['trang_thai'] == 'hoat_dong') $statusClass = 'bg-emerald-50 text-emerald-700 border-emerald-200';
                        else if($s['trang_thai'] == 'cho_kich_hoat') $statusClass = 'bg-amber-50 text-amber-700 border-amber-200';
                        else if($s['trang_thai'] == 'bi_khoa') $statusClass = 'bg-red-50 text-red-700 border-red-200';
                    ?>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold border <?= $statusClass ?>">
                        <?= $trangThaiText ?>
                    </span>
                </td>
                
                <!-- Cột Lần đăng nhập -->
                <td class="px-6 py-4">
                    <?php if(empty($s['lan_dang_nhap_cuoi'])): ?>
                        <span class="text-xs text-gray-400 italic">Chưa từng đăng nhập</span>
                    <?php else: ?>
                        <?php 
                            $loginDate = date('d/m/Y', strtotime($s['lan_dang_nhap_cuoi']));
                            $loginTime = date('H:i', strtotime($s['lan_dang_nhap_cuoi']));
                            $daysDiff = (time() - strtotime($s['lan_dang_nhap_cuoi'])) / 86400;
                            $isOld = $daysDiff > 14;
                        ?>
                        <div class="text-sm font-medium <?= $isOld ? 'text-amber-600' : 'text-gray-900' ?> mb-0.5"><?= $loginDate ?></div>
                        <div class="text-xs text-gray-500"><?= $loginTime ?></div>
                        <?php if($isOld): ?>
                            <div class="mt-1"><span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-medium bg-amber-50 text-amber-600">Lâu chưa đăng nhập</span></div>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                
                <!-- Thao tác -->
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <div class="relative inline-block text-left dropdown-container">
                            <button onclick="toggleActionMenu(<?= $s['id'] ?>)" class="w-8 h-8 rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-100 flex items-center justify-center transition-colors shadow-sm">
                                <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                            </button>
                            
                            <!-- Dropdown menu -->
                            <div id="actionMenu-<?= $s['id'] ?>" class="hidden fixed z-[999] mt-2 w-48 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <div class="py-1">
                                    <a href="<?= APP_URL ?>/admin/nhan-su/xem/<?= $s['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                        <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết
                                    </a>
                                    <a href="<?= APP_URL ?>/admin/nhan-su/sua/<?= $s['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                        <span class="iconify text-gray-400" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
                                    </a>
                                    <button onclick="openQuickView(<?= $s['id'] ?>)" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 text-left">
                                        <span class="iconify text-gray-400" data-icon="mdi:card-account-details-outline"></span> Xem nhanh
                                    </button>
                                    <button onclick="openResetPasswordModal(<?= $s['id'] ?>, '<?= htmlspecialchars($s['email']) ?>')" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 text-left">
                                        <span class="iconify text-gray-400" data-icon="mdi:lock-reset"></span> Đặt lại mật khẩu
                                    </button>
                                    <?php if($s['trang_thai'] == 'cho_kich_hoat'): ?>
                                    <button onclick="handleActivate(<?= $s['id'] ?>)" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 text-left">
                                        <span class="iconify text-gray-400" data-icon="mdi:email-fast-outline"></span> Kích hoạt
                                    </button>
                                    <?php endif; ?>
                                    <hr class="my-1 border-gray-100">
                                    <?php if($s['trang_thai'] == 'bi_khoa'): ?>
                                    <button onclick="handleUnlock(<?= $s['id'] ?>)" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50 text-left group">
                                        <span class="iconify text-emerald-500 group-hover:text-emerald-600" data-icon="mdi:lock-open-outline"></span> Mở khóa
                                    </button>
                                    <?php else: ?>
                                    <button onclick="openLockModal(<?= $s['id'] ?>, '<?= htmlspecialchars(addslashes($s['ho_ten'])) ?>')" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-orange-600 hover:bg-orange-50 text-left group">
                                        <span class="iconify text-orange-500 group-hover:text-orange-600" data-icon="mdi:lock-outline"></span> Khóa tài khoản
                                    </button>
                                    <?php endif; ?>
                                    <button onclick="openDeleteModal(<?= $s['id'] ?>, '<?= htmlspecialchars(addslashes($s['ho_ten'])) ?>')" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 text-left group">
                                        <span class="iconify text-red-500 group-hover:text-red-600" data-icon="mdi:delete-outline"></span> Xóa tài khoản
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
