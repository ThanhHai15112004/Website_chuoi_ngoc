<?php
// views/components/Admin/chinh_sach/table_list.php
use App\Models\Admin\ChinhSachModel;
?>
<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse min-w-[1000px]">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200 text-xs text-gray-500 uppercase tracking-wider">
                <th class="px-6 py-3 w-10 text-center">
                    <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" onchange="toggleSelectAll(this)">
                </th>
                <th class="px-6 py-3 font-medium">Tên & Loại chính sách</th>
                <th class="px-6 py-3 font-medium">Đường dẫn (Slug)</th>
                <th class="px-6 py-3 font-medium">Vị trí hiển thị</th>
                <th class="px-6 py-3 font-medium text-center">Trạng thái</th>
                <th class="px-6 py-3 font-medium text-center">SEO</th>
                <th class="px-6 py-3 font-medium">Cập nhật lúc</th>
                <th class="px-6 py-3 font-medium text-right">Thao tác</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php if (empty($policies)): ?>
            <tr>
                <td colspan="8" class="px-6 py-12 text-center">
                    <div class="flex flex-col items-center gap-3">
                        <span class="iconify text-5xl text-gray-300" data-icon="mdi:file-document-remove-outline"></span>
                        <p class="text-gray-500 font-medium">Không tìm thấy chính sách nào</p>
                        <a href="<?= APP_URL ?>/admin/chinh-sach/them" class="text-[#6B0D18] text-sm font-medium hover:underline">+ Thêm chính sách mới</a>
                    </div>
                </td>
            </tr>
            <?php else: ?>
            <?php foreach($policies as $p): ?>
            <?php
                // Xác định trạng thái hiển thị
                $trangThaiText = ChinhSachModel::tenTrangThai($p['trang_thai']);
                $statusClass = '';
                if ($p['trang_thai'] === 'dang_hien_thi') $statusClass = 'bg-emerald-50 text-emerald-700 border-emerald-200';
                elseif ($p['trang_thai'] === 'dang_an' || $p['trang_thai'] === 'ban_nhap') $statusClass = 'bg-gray-100 text-gray-600 border-gray-200';
                elseif ($p['trang_thai'] === 'can_cap_nhat') $statusClass = 'bg-amber-50 text-amber-700 border-amber-200';

                // Xác định SEO status
                $seoStatus = $p['seo_status'] ?? 'Chưa kiểm tra';
                $seoColor = 'text-emerald-500';
                $seoIcon = 'mdi:check-circle';
                if ($seoStatus === 'Cần tối ưu') { $seoColor = 'text-amber-500'; $seoIcon = 'mdi:alert-circle'; }
                elseif ($seoStatus === 'Thiếu meta') { $seoColor = 'text-red-500'; $seoIcon = 'mdi:alert-circle'; }
                elseif ($seoStatus === 'Chưa kiểm tra') { $seoColor = 'text-gray-400'; $seoIcon = 'mdi:alert-circle'; }

                // Vị trí hiển thị
                $locations = $p['vi_tri_hien_thi'] ?? [];

                // Loại quan trọng
                $isImportant = in_array($p['loai'], ['Đổi trả', 'Bảo hành', 'Thanh toán', 'Bảo mật']);
            ?>
            <tr class="hover:bg-gray-50 transition-colors group">
                <td class="px-6 py-4 text-center">
                    <input type="checkbox" class="policy-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" value="<?= $p['id'] ?>" onchange="updateBulkAction()">
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-start gap-3">
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="font-bold text-gray-900 cursor-pointer hover:text-[#6B0D18] transition-colors" onclick="openQuickView(<?= $p['id'] ?>)"><?= htmlspecialchars($p['ten']) ?></span>
                                <?php if($isImportant): ?>
                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-700">Quan trọng</span>
                                <?php endif; ?>
                            </div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                <?= htmlspecialchars($p['loai']) ?>
                            </span>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <span class="max-w-[150px] truncate" title="/chinh-sach/<?= htmlspecialchars($p['slug']) ?>">/chinh-sach/<?= htmlspecialchars($p['slug']) ?></span>
                        <button onclick="copyToClipboard('/chinh-sach/<?= htmlspecialchars($p['slug']) ?>')" class="text-gray-400 hover:text-blue-600 tooltip" title="Copy link"><span class="iconify" data-icon="mdi:content-copy"></span></button>
                        <a href="<?= APP_URL ?>/chinh-sach/<?= htmlspecialchars($p['slug']) ?>" target="_blank" class="text-gray-400 hover:text-blue-600 tooltip" title="Mở link"><span class="iconify" data-icon="mdi:open-in-new"></span></a>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <?php if(empty($locations)): ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">Chưa gắn vị trí</span>
                    <?php else: ?>
                        <div class="flex flex-wrap gap-1">
                            <?php foreach($locations as $loc): ?>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100"><?= htmlspecialchars($loc) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4 text-center">
                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold border <?= $statusClass ?>">
                        <?= $trangThaiText ?>
                    </span>
                </td>
                <td class="px-6 py-4 text-center">
                    <span class="iconify text-xl mx-auto tooltip <?= $seoColor ?>" data-icon="<?= $seoIcon ?>" title="<?= $seoStatus ?>"></span>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-medium text-gray-900 mb-0.5"><?= date('d/m/Y', strtotime($p['ngay_cap_nhat'])) ?></div>
                    <div class="text-xs text-gray-500 flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:account-outline"></span> <?= htmlspecialchars($p['nguoi_cap_nhat'] ?? '') ?>
                    </div>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="relative inline-block text-left dropdown-container">
                        <button onclick="toggleActionMenu(<?= $p['id'] ?>)" class="w-8 h-8 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 flex items-center justify-center transition-colors">
                            <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                        </button>
                        
                        <!-- Dropdown menu -->
                        <div id="actionMenu-<?= $p['id'] ?>" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1">
                                <button onclick="openQuickView(<?= $p['id'] ?>)" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 text-left">
                                    <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem nhanh
                                </button>
                                <a href="<?= APP_URL ?>/admin/chinh-sach/sua/<?= $p['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <span class="iconify text-gray-400" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
                                </a>
                                <button onclick="handleDuplicate(<?= $p['id'] ?>)" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 text-left">
                                    <span class="iconify text-gray-400" data-icon="mdi:content-copy"></span> Nhân bản
                                </button>
                                <hr class="my-1 border-gray-100">
                                <?php if ($p['trang_thai'] === 'dang_hien_thi'): ?>
                                <button onclick="handleToggleStatus(<?= $p['id'] ?>, 'dang_an')" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 text-left">
                                    <span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn hiển thị
                                </button>
                                <?php else: ?>
                                <button onclick="handleToggleStatus(<?= $p['id'] ?>, 'dang_hien_thi')" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 text-left">
                                    <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Hiển thị
                                </button>
                                <?php endif; ?>
                                <button onclick="handleDelete(<?= $p['id'] ?>, '<?= htmlspecialchars(addslashes($p['ten'])) ?>')" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 text-left group">
                                    <span class="iconify text-red-500 group-hover:text-red-600" data-icon="mdi:trash-can-outline"></span> Xóa
                                </button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
