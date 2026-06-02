<?php
// views/components/Admin/nhan_su/form_permissions.php
$staff = $staff ?? null;
$quyen = $quyen ?? [];

$currentRole = $staff['vai_tro'] ?? 'cskh';
$roleMap = [
    'Super Admin' => 'super_admin',
    'Admin' => 'admin',
    'Quản lý kho' => 'kho',
    'CSKH' => 'cskh',
    'Tùy chỉnh' => 'custom',
];
$currentRoleKey = $roleMap[$currentRole] ?? 'cskh';

// Build quyền map cho JS
$quyenMap = [];
foreach ($quyen as $q) {
    $quyenMap[$q['module']] = $q;
}

$modules = [
    ['key' => 0, 'name' => 'Dashboard & Thống kê'],
    ['key' => 1, 'name' => 'Sản phẩm & Danh mục'],
    ['key' => 2, 'name' => 'Đơn hàng & Thanh toán'],
    ['key' => 3, 'name' => 'Quản lý Kho'],
    ['key' => 4, 'name' => 'Cấu hình & Nhân sự'],
];
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <div class="flex items-center justify-between mb-6 pb-3 border-b border-gray-100">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-gray-400 text-xl" data-icon="mdi:shield-account-outline"></span> Vai trò & Phân quyền
        </h3>
        <button type="button" class="text-sm font-medium text-[#6B0D18] hover:underline">Quản lý các vai trò</button>
    </div>

    <!-- Chọn vai trò -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">Vai trò trong hệ thống <span class="text-red-500">*</span></label>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
            <!-- Super Admin -->
            <label class="relative block cursor-pointer group">
                <input type="radio" name="vai_tro" value="Super Admin" class="peer sr-only" onchange="handleRoleChange()" <?= $currentRoleKey === 'super_admin' ? 'checked' : '' ?>>
                <div class="p-4 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18]/5 transition-all">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:shield-crown-outline"></span>
                        <span class="font-bold text-gray-900">Super Admin</span>
                    </div>
                    <p class="text-xs text-gray-500 line-clamp-2">Toàn quyền kiểm soát hệ thống, bao gồm phân quyền và xóa dữ liệu.</p>
                </div>
                <div class="absolute top-4 right-4 hidden peer-checked:block text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:check-circle"></span>
                </div>
            </label>

            <!-- Admin -->
            <label class="relative block cursor-pointer group">
                <input type="radio" name="vai_tro" value="Admin" class="peer sr-only" onchange="handleRoleChange()" <?= $currentRoleKey === 'admin' ? 'checked' : '' ?>>
                <div class="p-4 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18]/5 transition-all">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="iconify text-orange-600" data-icon="mdi:shield-account-outline"></span>
                        <span class="font-bold text-gray-900">Admin</span>
                    </div>
                    <p class="text-xs text-gray-500 line-clamp-2">Quản lý hầu hết chức năng, ngoại trừ thiết lập hệ thống.</p>
                </div>
                <div class="absolute top-4 right-4 hidden peer-checked:block text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:check-circle"></span>
                </div>
            </label>

            <!-- Quản lý kho -->
            <label class="relative block cursor-pointer group">
                <input type="radio" name="vai_tro" value="Quản lý kho" class="peer sr-only" onchange="handleRoleChange()" <?= $currentRoleKey === 'kho' ? 'checked' : '' ?>>
                <div class="p-4 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18]/5 transition-all">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="iconify text-blue-600" data-icon="mdi:warehouse"></span>
                        <span class="font-bold text-gray-900">Quản lý kho</span>
                    </div>
                    <p class="text-xs text-gray-500 line-clamp-2">Kiểm soát tồn kho, nhập/xuất và kiểm kê hàng hóa.</p>
                </div>
                <div class="absolute top-4 right-4 hidden peer-checked:block text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:check-circle"></span>
                </div>
            </label>

            <!-- CSKH -->
            <label class="relative block cursor-pointer group">
                <input type="radio" name="vai_tro" value="CSKH" class="peer sr-only" onchange="handleRoleChange()" <?= $currentRoleKey === 'cskh' ? 'checked' : '' ?>>
                <div class="p-4 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18]/5 transition-all">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="iconify text-purple-600" data-icon="mdi:headset"></span>
                        <span class="font-bold text-gray-900">CSKH</span>
                    </div>
                    <p class="text-xs text-gray-500 line-clamp-2">Tương tác khách hàng, xem đơn hàng, hỗ trợ giải đáp.</p>
                </div>
                <div class="absolute top-4 right-4 hidden peer-checked:block text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:check-circle"></span>
                </div>
            </label>

            <!-- Tùy chỉnh -->
            <label class="relative block cursor-pointer group">
                <input type="radio" name="vai_tro" value="Tùy chỉnh" class="peer sr-only" onchange="handleRoleChange()" <?= $currentRoleKey === 'custom' ? 'checked' : '' ?>>
                <div class="p-4 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18]/5 transition-all h-full">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="iconify text-gray-600" data-icon="mdi:cog-outline"></span>
                        <span class="font-bold text-gray-900">Tùy chỉnh quyền</span>
                    </div>
                    <p class="text-xs text-gray-500 line-clamp-2">Thiết lập quyền hạn thủ công cho từng module.</p>
                </div>
                <div class="absolute top-4 right-4 hidden peer-checked:block text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:check-circle"></span>
                </div>
            </label>
        </div>

        <div id="superAdminWarning" class="hidden mt-4 p-4 bg-orange-50 border border-orange-200 rounded-xl flex gap-3">
            <span class="iconify text-orange-500 text-xl shrink-0 mt-0.5" data-icon="mdi:alert"></span>
            <div>
                <p class="text-sm font-bold text-orange-800">Cảnh báo bảo mật</p>
                <p class="text-xs text-orange-700 mt-1">Vai trò Super Admin có toàn quyền hệ thống. Hãy đảm bảo bạn cấp quyền này cho đúng người và yêu cầu họ bật xác minh bảo mật.</p>
            </div>
        </div>
    </div>

    <!-- Ma trận phân quyền -->
    <div id="permissionMatrixSection" class="mt-8 pt-6 border-t border-gray-200">
        <h4 class="font-bold text-gray-900 mb-4 flex items-center justify-between">
            <span>Chi tiết phân quyền (Theo vai trò)</span>
            <button type="button" class="text-xs text-gray-500 font-normal underline hover:text-[#6B0D18]">Sao chép quyền từ vai trò khác</button>
        </h4>
        
        <div class="overflow-x-auto border border-gray-200 rounded-xl relative">
            <table class="w-full text-left min-w-[800px] permission-table">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 w-1/3">Module quản lý</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 text-center w-24">Xem</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 text-center w-24">Thêm</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 text-center w-24">Sửa</th>
                        <th class="px-4 py-3 text-xs font-medium text-red-500 text-center w-24">Xóa</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 text-center w-24">Đặc biệt</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    <?php foreach ($modules as $m): 
                        $mq = $quyenMap[$m['name']] ?? ['xem' => 0, 'them' => 0, 'sua' => 0, 'xoa' => 0, 'dac_biet' => 0];
                        $prefix = 'perm_' . $m['key'];
                    ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900"><?= $m['name'] ?></td>
                        <td class="px-4 py-3 text-center"><?php if ($m['key'] == 0 || true): ?><input type="checkbox" name="<?= $prefix ?>_xem" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-view" <?= $mq['xem'] ? 'checked' : '' ?>><?php else: ?>-<?php endif; ?></td>
                        <td class="px-4 py-3 text-center"><?php if ($m['key'] > 0 || $m['key'] == 0): ?><input type="checkbox" name="<?= $prefix ?>_them" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-add" <?= $mq['them'] ? 'checked' : '' ?>><?php else: ?>-<?php endif; ?></td>
                        <td class="px-4 py-3 text-center"><?php if ($m['key'] > 0 || $m['key'] == 0): ?><input type="checkbox" name="<?= $prefix ?>_sua" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-edit" <?= $mq['sua'] ? 'checked' : '' ?>><?php else: ?>-<?php endif; ?></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" name="<?= $prefix ?>_xoa" class="rounded border-gray-300 text-red-500 focus:ring-red-500 p-check p-delete" <?= $mq['xoa'] ? 'checked' : '' ?>></td>
                        <td class="px-4 py-3 text-center">
                            <label class="inline-flex items-center gap-1 cursor-pointer" title="Quyền đặc biệt">
                                <input type="checkbox" name="<?= $prefix ?>_dac_biet" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-special" <?= $mq['dac_biet'] ? 'checked' : '' ?>>
                                <span class="iconify text-gray-400" data-icon="<?= $m['key'] == 3 ? 'mdi:check-decagram-outline' : 'mdi:file-excel-outline' ?>"></span>
                            </label>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div id="matrixOverlay" class="absolute inset-0 bg-white/60 backdrop-blur-[1px] hidden items-center justify-center border border-gray-200 rounded-xl" style="margin-top: -1px">
                <div class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm font-medium shadow-lg flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:shield-check-outline"></span> Quyền hạn được thiết lập sẵn theo vai trò
                </div>
            </div>
        </div>
        <p class="text-xs text-gray-500 mt-3 flex items-center gap-1">
            <span class="iconify text-gray-400" data-icon="mdi:information-outline"></span> Chọn vai trò "Tùy chỉnh quyền" để có thể check/uncheck các quyền thủ công ở bảng trên.
        </p>
    </div>
</div>

<style>
    .permission-table {
        position: relative;
    }
</style>

<script>
    // Preset permissions per role
    const rolePresets = {
        'Super Admin': {all: true},
        'Admin': {
            'perm_0_xem':1,'perm_0_dac_biet':1,
            'perm_1_xem':1,'perm_1_them':1,'perm_1_sua':1,'perm_1_xoa':1,'perm_1_dac_biet':1,
            'perm_2_xem':1,'perm_2_them':1,'perm_2_sua':1,'perm_2_xoa':1,'perm_2_dac_biet':1,
            'perm_3_xem':1,'perm_3_them':1,'perm_3_sua':1,'perm_3_xoa':1,'perm_3_dac_biet':1,
            'perm_4_xem':1,'perm_4_them':0,'perm_4_sua':0,'perm_4_xoa':0
        },
        'Quản lý kho': {
            'perm_0_xem':1,
            'perm_1_xem':1,'perm_1_them':1,'perm_1_sua':1,'perm_1_dac_biet':1,
            'perm_2_xem':1,
            'perm_3_xem':1,'perm_3_them':1,'perm_3_sua':1,'perm_3_xoa':1,'perm_3_dac_biet':1
        },
        'CSKH': {
            'perm_0_xem':1,
            'perm_1_xem':1,
            'perm_2_xem':1,'perm_2_them':1,'perm_2_sua':1
        }
    };

    function handleRoleChange() {
        const selected = document.querySelector('input[name="vai_tro"]:checked');
        if (!selected) return;
        const role = selected.value;

        const warning = document.getElementById('superAdminWarning');
        const overlay = document.getElementById('matrixOverlay');
        const checkboxes = document.querySelectorAll('.p-check');

        warning.classList.add('hidden');
        overlay.classList.add('hidden');
        overlay.classList.remove('flex');

        if (role === 'Tùy chỉnh') {
            checkboxes.forEach(cb => { cb.disabled = false; });
            return;
        }

        // Show overlay for preset roles
        overlay.classList.add('flex');
        overlay.classList.remove('hidden');

        if (role === 'Super Admin') {
            warning.classList.remove('hidden');
            checkboxes.forEach(cb => { cb.checked = true; cb.disabled = true; });
            return;
        }

        const preset = rolePresets[role] || {};
        checkboxes.forEach(cb => {
            const name = cb.getAttribute('name');
            cb.checked = preset[name] === 1;
            cb.disabled = true;
        });
    }

    // Init on load
    document.addEventListener('DOMContentLoaded', handleRoleChange);
</script>
