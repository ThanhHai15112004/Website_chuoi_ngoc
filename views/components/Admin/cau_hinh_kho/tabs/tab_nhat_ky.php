<?php
// views/components/Admin/cau_hinh_kho/tabs/tab_nhat_ky.php
?>
<div class="flex flex-col h-full">
    <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h3 class="font-bold text-gray-900">Nhật ký thay đổi cấu hình kho</h3>
        <div class="flex gap-2">
            <select class="pl-3 pr-8 py-1.5 text-xs border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-md border text-gray-700 bg-white">
                <option value="">Tất cả module</option>
                <option value="kho">Kho bãi</option>
                <option value="quy_tac">Quy tắc tồn kho</option>
                <option value="canh_bao">Cảnh báo</option>
                <option value="quyen">Phân quyền</option>
            </select>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 font-medium text-xs transition-colors flex items-center gap-1">
                <span class="iconify" data-icon="mdi:export"></span> Xuất nhật ký
            </button>
        </div>
    </div>
    
    <div class="overflow-x-auto p-4">
        <table class="w-full text-left border-collapse min-w-[900px]">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase text-gray-500">
                    <th class="py-2.5 px-4 font-semibold w-40">Thời gian</th>
                    <th class="py-2.5 px-4 font-semibold w-40">Người thao tác</th>
                    <th class="py-2.5 px-4 font-semibold w-48">Hành động</th>
                    <th class="py-2.5 px-4 font-semibold w-40">Module</th>
                    <th class="py-2.5 px-4 font-semibold text-rose-600">Giá trị cũ</th>
                    <th class="py-2.5 px-4 font-semibold text-emerald-600">Giá trị mới</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                <?php if(empty($nhatKy)): ?>
                <tr><td colspan="6" class="text-center py-8 text-gray-500">Chưa có nhật ký hoạt động nào.</td></tr>
                <?php else: foreach($nhatKy as $log): 
                    $nguoiThaoTac = $log['nguoi_thao_tac'] ?? 'Hệ thống';
                    $chuCai = mb_substr($nguoiThaoTac, 0, 1);
                ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 text-gray-500 text-xs"><?= date('d/m/Y H:i', strtotime($log['ngay_tao'])) ?></td>
                    <td class="py-3 px-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold">
                                <?= htmlspecialchars($chuCai) ?>
                            </div>
                            <span class="font-medium text-gray-900"><?= htmlspecialchars($nguoiThaoTac) ?></span>
                        </div>
                    </td>
                    <td class="py-3 px-4 font-medium text-gray-700"><?= htmlspecialchars($log['hanh_dong'] ?? '') ?></td>
                    <td class="py-3 px-4 text-gray-500">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100"><?= htmlspecialchars($log['module'] ?? '') ?></span>
                    </td>
                    <td class="py-3 px-4 text-rose-600 line-through text-xs"><?= htmlspecialchars($log['chi_tiet_cu'] ?? '-') ?></td>
                    <td class="py-3 px-4 text-emerald-600 font-medium text-xs"><?= htmlspecialchars($log['chi_tiet_moi'] ?? '-') ?></td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>
