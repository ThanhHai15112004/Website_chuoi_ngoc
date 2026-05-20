<?php
// views/pages/admin_danh_muc.php
?>
<div class="max-w-7xl mx-auto space-y-6">
                
                <!-- Page Header -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Quản lý danh mục</h1>
                        <p class="text-gray-500 text-sm mt-1">Tạo, chỉnh sửa và sắp xếp các danh mục sản phẩm hiển thị trên website.</p>
                    </div>
                    <button onclick="openModal('categoryModal')" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm flex items-center gap-2 shrink-0">
                        <span class="iconify text-lg" data-icon="mdi:plus"></span>
                        Thêm danh mục
                    </button>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="iconify text-gray-400 text-lg" data-icon="mdi:folder-multiple-outline"></span>
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng danh mục</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900"><?= $stats['tong'] ?></span>
                            <span class="text-xs text-gray-500 ml-1">danh mục</span>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="iconify text-emerald-500 text-lg" data-icon="mdi:eye-outline"></span>
                            <span class="text-xs font-medium text-emerald-600 uppercase tracking-wider">Đang hiển thị</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900"><?= $stats['hien_thi'] ?></span>
                            <span class="text-xs text-gray-500 ml-1">danh mục</span>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="iconify text-gray-400 text-lg" data-icon="mdi:eye-off-outline"></span>
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wider">Đang ẩn</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900"><?= $stats['dang_an'] ?></span>
                            <span class="text-xs text-gray-500 ml-1">danh mục</span>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="iconify text-blue-500 text-lg" data-icon="mdi:package-variant-closed"></span>
                            <span class="text-xs font-medium text-blue-600 uppercase tracking-wider">Có sản phẩm</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900"><?= $stats['co_sp'] ?></span>
                            <span class="text-xs text-gray-500 ml-1">danh mục</span>
                        </div>
                    </div>
                    <div class="bg-yellow-50 p-4 rounded-[18px] border border-yellow-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="iconify text-yellow-600 text-lg" data-icon="mdi:alert-circle-outline"></span>
                            <span class="text-xs font-medium text-yellow-700 uppercase tracking-wider">Chưa có SP</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-yellow-800"><?= $stats['trong'] ?></span>
                            <span class="text-xs text-yellow-600 ml-1">danh mục</span>
                        </div>
                    </div>
                </div>

                <!-- Main Table Section -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">
                    
                    <!-- Search & Filter Bar -->
                    <div class="p-4 border-b border-gray-100 flex flex-col md:flex-row gap-4 items-center justify-between bg-white">
                        <div class="relative w-full md:w-80 group">
                            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-[#6B0D18] transition-colors" data-icon="mdi:magnify"></span>
                            <input type="text" placeholder="Tìm theo tên, mã danh mục..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                        </div>
                        <div class="flex items-center gap-3 w-full md:w-auto">
                            <select class="w-full md:w-auto px-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 cursor-pointer">
                                <option value="">Trạng thái: Tất cả</option>
                                <option value="hien">Đang hiển thị</option>
                                <option value="an">Đang ẩn</option>
                            </select>
                            <select class="w-full md:w-auto px-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 cursor-pointer">
                                <option value="">Sản phẩm: Tất cả</option>
                                <option value="co">Đã có sản phẩm</option>
                                <option value="trong">Danh mục trống</option>
                            </select>
                            <button class="px-4 py-2 text-gray-500 bg-gray-50 border border-gray-200 rounded-xl hover:bg-gray-100 text-sm font-medium transition-colors whitespace-nowrap shrink-0 flex items-center gap-1">
                                Lọc
                            </button>
                        </div>
                    </div>

                    <!-- Bulk Actions Bar (Hidden by default) -->
                    <div id="bulkActions" class="bg-[#FAF8F5] px-4 py-3 border-b border-[#E4D5C3] hidden items-center justify-between">
                        <div class="flex items-center gap-2 text-sm">
                            <span class="font-bold text-[#6B0D18] id="selectedCount">0</span>
                            <span class="text-gray-600">danh mục đang chọn</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1.5">
                                <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Hiện
                            </button>
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1.5">
                                <span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn
                            </button>
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-lg text-xs font-medium hover:bg-red-50 hover:border-red-200 transition-colors shadow-sm flex items-center gap-1.5">
                                <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa
                            </button>
                        </div>
                    </div>

                    <div class="px-4 py-2 border-b border-gray-100 flex items-center justify-end">
                        <button onclick="openModal('sortModal')" class="px-4 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:swap-vertical"></span> Sắp xếp thứ tự
                        </button>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto min-h-[400px]">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50/50 border-b border-gray-100 text-xs text-gray-500 uppercase tracking-wider font-semibold">
                                    <th class="p-4 w-12 text-center">
                                        <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] cursor-pointer">
                                    </th>
                                    <th class="p-4 w-16">Icon</th>
                                    <th class="p-4">Danh mục</th>
                                    <th class="p-4">Đường dẫn (Slug)</th>
                                    <th class="p-4 text-center">Sản phẩm</th>
                                    <th class="p-4 text-center">Vị trí</th>
                                    <th class="p-4 text-center">Thứ tự</th>
                                    <th class="p-4 text-center">Trạng thái</th>
                                    <th class="p-4 text-right w-20">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-50">
                                <?php foreach($danh_muc_list as $dm): ?>
                                    <tr class="hover:bg-gray-50/50 transition-colors group">
                                        <td class="p-4 text-center">
                                            <input type="checkbox" class="row-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] cursor-pointer opacity-50 group-hover:opacity-100 transition-opacity">
                                        </td>
                                        <td class="p-4">
                                            <div class="w-12 h-12 rounded-xl flex items-center justify-center font-bold text-lg <?= $dm['mau_sac_icon'] ?> shadow-sm">
                                                <?= $dm['chu_cai'] ?>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex flex-col gap-0.5">
                                                <div class="flex items-center gap-1.5 flex-wrap">
                                                    <span class="text-[10px] text-gray-500 font-medium font-mono whitespace-nowrap shrink-0"><?= $dm['ma_dm'] ?></span>
                                                </div>
                                                <a href="#" class="font-bold text-gray-900 hover:text-[#6B0D18] transition-colors leading-tight text-base"><?= $dm['ten_dm'] ?></a>
                                                <span class="text-xs text-gray-500 mt-0.5 max-w-xs truncate" title="<?= $dm['mo_ta'] ?>"><?= $dm['mo_ta'] ?></span>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex items-center gap-1 text-gray-500 text-xs">
                                                /<?= $dm['slug'] ?>
                                                <button class="text-gray-400 hover:text-[#6B0D18] p-1 rounded" onclick="copyToClipboard('/<?= $dm['slug'] ?>')" title="Sao chép">
                                                    <span class="iconify" data-icon="mdi:content-copy"></span>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="p-4 text-center">
                                            <?php if($dm['so_san_pham'] > 0): ?>
                                                <a href="<?= APP_URL ?>/admin/san-pham" class="font-bold text-gray-900 hover:text-[#6B0D18] hover:underline"><?= $dm['so_san_pham'] ?></a>
                                            <?php else: ?>
                                                <span class="text-[11px] font-bold px-2 py-0.5 rounded bg-yellow-50 text-yellow-700 border border-yellow-200 uppercase tracking-wide">Trống</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex flex-col gap-1 items-center">
                                                <?php $count = 0; foreach($dm['vi_tri'] as $vt): $count++; if($count > 2) break; ?>
                                                    <span class="text-[10px] font-medium bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full whitespace-nowrap"><?= $vt ?></span>
                                                <?php endforeach; ?>
                                                <?php if(count($dm['vi_tri']) > 2): ?>
                                                    <span class="text-[9px] font-bold text-gray-400">+<?= count($dm['vi_tri']) - 2 ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td class="p-4 text-center">
                                            <div class="font-bold text-gray-700 bg-white border border-gray-200 w-8 h-8 rounded-lg flex items-center justify-center mx-auto shadow-sm">
                                                <?= $dm['thu_tu'] ?>
                                            </div>
                                        </td>
                                        <td class="p-4 text-center">
                                            <?php if($dm['trang_thai'] === 'Đang hiển thị'): ?>
                                                <span class="text-[11px] font-medium px-2 py-1 rounded-full border bg-emerald-50 text-emerald-700 border-emerald-200 inline-block whitespace-nowrap">Đang hiển thị</span>
                                            <?php else: ?>
                                                <span class="text-[11px] font-medium px-2 py-1 rounded-full border bg-gray-100 text-gray-600 border-gray-200 inline-block whitespace-nowrap">Đang ẩn</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="p-4 text-right">
                                            <div class="flex items-center justify-end gap-1 relative">
                                                <button onclick="openModal('categoryModal', 'edit', '<?= $dm['ten_dm'] ?>')" class="p-1.5 text-gray-400 hover:text-[#6B0D18] hover:bg-red-50 rounded-lg transition-colors" title="Sửa">
                                                    <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                                </button>
                                                <button class="action-btn p-1.5 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors" onclick="toggleActionMenu(this)">
                                                    <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                                </button>
                                                <!-- Dropdown Menu -->
                                                <div class="w-48 bg-white border border-gray-100 rounded-xl shadow-lg z-[9999] hidden action-menu py-1 fixed">
                                                    <button onclick="showToast('Mở popup chọn sản phẩm thêm vào danh mục này...', 'success')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                        <span class="iconify text-gray-400" data-icon="mdi:plus-box-outline"></span> Thêm sản phẩm
                                                    </button>
                                                    <a href="<?= APP_URL ?>/admin/san-pham" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                        <span class="iconify text-gray-400" data-icon="mdi:format-list-bulleted"></span> Xem DS sản phẩm
                                                    </a>
                                                    <?php if($dm['trang_thai'] === 'Đang hiển thị'): ?>
                                                        <button onclick="openHideModal('<?= $dm['ten_dm'] ?>', <?= $dm['so_san_pham'] ?>, this)" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                            <span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn danh mục
                                                        </button>
                                                    <?php else: ?>
                                                        <button onclick="showToast('Đã hiển thị danh mục', 'success')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                            <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Hiện danh mục
                                                        </button>
                                                    <?php endif; ?>
                                                    <button onclick="showToast('Đã dừng hoạt động danh mục', 'success'); this.closest('tr').querySelector('td:nth-child(8) span').className='text-[11px] font-medium px-2 py-1 rounded-full border bg-red-50 text-red-700 border-red-200 inline-block whitespace-nowrap'; this.closest('tr').querySelector('td:nth-child(8) span').textContent='Dừng hoạt động';" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                        <span class="iconify text-gray-400" data-icon="mdi:power"></span> Dừng hoạt động
                                                    </button>
                                                    <div class="h-px bg-gray-100 my-1 w-full"></div>
                                                    <button onclick="openDeleteModal('<?= $dm['ten_dm'] ?>', <?= $dm['so_san_pham'] ?>, this)" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                                        <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa danh mục
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

<!-- Category Modal (Add/Edit) -->
<div id="categoryModal" class="fixed inset-0 z-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-sm" onclick="closeModal('categoryModal')"></div>
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 relative z-10 scale-95 transition-transform duration-300 flex flex-col max-h-[90vh]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between shrink-0">
            <h3 class="font-bold text-xl text-gray-900" id="categoryModalTitle">Thêm danh mục mới</h3>
            <button onclick="closeModal('categoryModal')" class="text-gray-400 hover:text-gray-700 transition-colors p-1 rounded-lg hover:bg-gray-100">
                <span class="iconify text-2xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="px-6 py-6 overflow-y-auto">
            <div id="categoryProductWarning" class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex gap-3 items-start mb-6 hidden">
                <span class="iconify text-blue-500 text-xl shrink-0 mt-0.5" data-icon="mdi:information-outline"></span>
                <div>
                    <p class="text-sm text-blue-800 font-medium">Danh mục này hiện có <span id="categoryProductCount">0</span> sản phẩm.</p>
                    <a href="<?= APP_URL ?>/admin/san-pham" class="text-xs text-blue-600 hover:text-blue-800 underline mt-1 inline-block">Xem sản phẩm thuộc danh mục</a>
                </div>
            </div>

            <div class="space-y-5">
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Tên danh mục <span class="text-red-500">*</span></label>
                        <input type="text" id="catName" placeholder="Ví dụ: Vòng tay phong thủy" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                        <p class="text-red-500 text-xs mt-1 hidden" id="catNameError">Vui lòng nhập tên danh mục</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Mã danh mục</label>
                        <input type="text" id="catCode" placeholder="Tự động sinh hoặc nhập (VD: DM001)" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Đường dẫn (Slug)</label>
                    <div class="flex items-center gap-2">
                        <span class="text-gray-400 text-sm bg-gray-50 border border-gray-200 px-3 py-2.5 rounded-xl border-r-0 rounded-r-none">/</span>
                        <input type="text" id="catSlug" placeholder="vong-tay-phong-thuy" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl rounded-l-none -ml-2 focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Mô tả ngắn</label>
                    <textarea rows="2" placeholder="Nhập mô tả ngắn cho danh mục..." class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm resize-none"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Vị trí hiển thị</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Hiển thị ở Menu chính</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Hiển thị ở Trang chủ</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Hiển thị trong Bộ lọc SP</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Thiết lập khác</label>
                        <div class="space-y-4 mt-2">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-700">Trạng thái</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                                    <span class="ml-2 text-xs font-medium text-emerald-600 peer-checked:text-emerald-600 peer-checked:block hidden">Hiển thị</span>
                                    <span class="ml-2 text-xs font-medium text-gray-500 peer-checked:hidden">Đang ẩn</span>
                                </label>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-700">Thứ tự ưu tiên</span>
                                <input type="number" value="1" min="1" class="w-20 px-3 py-1.5 bg-white border border-gray-200 rounded-lg text-center text-sm focus:outline-none focus:border-[#6B0D18]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-3 shrink-0 bg-gray-50/50 rounded-b-2xl">
            <button onclick="closeModal('categoryModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-200 bg-white border border-gray-200 rounded-xl font-medium text-sm transition-colors">Hủy</button>
            <button onclick="submitCategory()" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm" id="btnSubmitCategory">Lưu danh mục</button>
        </div>
    </div>
</div>

<!-- Sort Modal -->
<div id="sortModal" class="fixed inset-0 z-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-sm" onclick="closeModal('sortModal')"></div>
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-4 relative z-10 scale-95 transition-transform duration-300 flex flex-col max-h-[80vh]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between shrink-0">
            <div>
                <h3 class="font-bold text-lg text-gray-900">Sắp xếp thứ tự danh mục</h3>
                <p class="text-xs text-gray-500 mt-0.5">Kéo thả để thay đổi vị trí hiển thị trên menu/trang chủ</p>
            </div>
            <button onclick="closeModal('sortModal')" class="text-gray-400 hover:text-gray-700 transition-colors p-1 rounded-lg hover:bg-gray-100">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="px-6 py-4 overflow-y-auto flex-1 bg-gray-50/50">
            <div class="space-y-2" id="sortableList">
                <!-- Mock draggable items -->
                <div draggable="true" class="sortable-item flex items-center gap-3 p-3 bg-white border border-gray-200 rounded-xl shadow-sm cursor-grab active:cursor-grabbing hover:border-[#6B0D18] transition-colors">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:drag"></span>
                    <div class="w-8 h-8 rounded-lg bg-red-50 text-red-700 flex items-center justify-center font-bold text-xs">VT</div>
                    <span class="font-medium text-sm text-gray-900">Vòng tay phong thủy</span>
                </div>
                <div draggable="true" class="sortable-item flex items-center gap-3 p-3 bg-white border border-gray-200 rounded-xl shadow-sm cursor-grab active:cursor-grabbing hover:border-[#6B0D18] transition-colors">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:drag"></span>
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-xs">CN</div>
                    <span class="font-medium text-sm text-gray-900">Chuỗi ngọc</span>
                </div>
                <div draggable="true" class="sortable-item flex items-center gap-3 p-3 bg-white border border-gray-200 rounded-xl shadow-sm cursor-grab active:cursor-grabbing hover:border-[#6B0D18] transition-colors">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:drag"></span>
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-xs">VĐ</div>
                    <span class="font-medium text-sm text-gray-900">Vòng đá tự nhiên</span>
                </div>
                <div draggable="true" class="sortable-item flex items-center gap-3 p-3 bg-white border border-gray-200 rounded-xl shadow-sm cursor-grab active:cursor-grabbing hover:border-[#6B0D18] transition-colors">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:drag"></span>
                    <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-xs">ND</div>
                    <span class="font-medium text-sm text-gray-900">Nhẫn đá phong thủy</span>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-3 shrink-0 bg-white rounded-b-2xl">
            <button onclick="closeModal('sortModal')" class="px-5 py-2 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors">Hủy</button>
            <button onclick="submitSort()" class="px-5 py-2 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm">Lưu thứ tự</button>
        </div>
    </div>
</div>

<!-- Hide Category Modal -->
<div id="hideModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl text-gray-600" data-icon="mdi:eye-off-outline"></span>
        </div>
        <h3 class="font-bold text-lg text-gray-900 mb-2">Ẩn danh mục khỏi website?</h3>
        <p class="text-sm text-gray-500 mb-4">Danh mục <strong class="text-gray-700" id="hideModalTitle"></strong> sẽ không còn hiển thị ở trang người dùng.</p>
        <div id="hideModalWarning" class="bg-yellow-50 border border-yellow-100 rounded-xl p-3 text-sm text-yellow-800 text-left hidden">
            Danh mục này hiện có <strong id="hideModalCount">0</strong> sản phẩm. Các sản phẩm này vẫn tồn tại nhưng người dùng có thể khó tìm thấy chúng.
        </div>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('hideModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
        <button onclick="submitHide()" class="px-5 py-2.5 bg-gray-800 text-white rounded-xl hover:bg-gray-900 font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận ẩn</button>
    </div>
</div>

<!-- Delete Category Modal -->
<div id="deleteModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl text-red-600" data-icon="mdi:trash-can-outline"></span>
        </div>
        <h3 class="font-bold text-lg text-gray-900 mb-2">Xác nhận xóa danh mục</h3>
        <p class="text-sm text-gray-500 mb-4">Bạn có chắc muốn xóa danh mục <strong class="text-gray-700" id="deleteModalTitle"></strong> không? Hành động này không thể hoàn tác.</p>
        
        <div id="deleteModalWarning" class="bg-red-50 border border-red-100 rounded-xl p-3 text-sm text-red-800 text-left hidden">
            <span class="font-semibold block mb-1">CẢNH BÁO!</span>
            Danh mục này đang chứa <strong id="deleteModalCount">0</strong> sản phẩm. Vui lòng chuyển các sản phẩm này sang danh mục khác trước khi xóa, hoặc chọn <strong>"Ẩn danh mục"</strong> để an toàn hơn.
        </div>
    </div>
    <div class="px-6 pb-6 flex flex-col gap-2">
        <div class="flex items-center justify-center gap-3">
            <button onclick="closeModal('deleteModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
            <button id="btnConfirmDelete" onclick="submitDelete()" class="px-5 py-2.5 bg-red-600 text-white rounded-xl hover:bg-red-700 font-medium text-sm transition-colors flex-1 shadow-sm">Xóa danh mục</button>
        </div>
        <button onclick="switchToHide()" id="btnSwitchToHide" class="px-5 py-2 text-gray-600 hover:text-gray-900 text-sm font-medium underline mt-2 hidden">
            Chuyển sang Ẩn danh mục thay thế
        </button>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-6 right-6 z-50 flex flex-col gap-3"></div>

<script>
    // Copy to clipboard
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('Đã sao chép: ' + text, 'success');
        });
    }

    // Toast logic
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `flex items-center gap-3 px-4 py-3 bg-white rounded-xl shadow-lg border-l-4 transform transition-all duration-300 translate-y-10 opacity-0 min-w-[300px] z-[9999]`;
        
        if (type === 'success') {
            toast.classList.add('border-emerald-500');
            toast.innerHTML = `
                <div class="w-8 h-8 bg-emerald-50 rounded-full flex items-center justify-center shrink-0">
                    <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check"></span>
                </div>
                <p class="text-sm font-medium text-gray-800 flex-1">${message}</p>
                <button class="text-gray-400 hover:text-gray-600" onclick="this.parentElement.remove()">
                    <span class="iconify" data-icon="mdi:close"></span>
                </button>
            `;
        } else {
            toast.classList.add('border-red-500');
            toast.innerHTML = `
                <div class="w-8 h-8 bg-red-50 rounded-full flex items-center justify-center shrink-0">
                    <span class="iconify text-red-500 text-lg" data-icon="mdi:alert-circle"></span>
                </div>
                <p class="text-sm font-medium text-gray-800 flex-1">${message}</p>
                <button class="text-gray-400 hover:text-gray-600" onclick="this.parentElement.remove()">
                    <span class="iconify" data-icon="mdi:close"></span>
                </button>
            `;
        }

        document.getElementById('toastContainer').appendChild(toast);
        setTimeout(() => {
            toast.classList.remove('translate-y-10', 'opacity-0');
        }, 10);

        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-x-10');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Modal logic
    function openModal(id, mode = 'add', title = '') {
        const modal = document.getElementById(id);
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.children[1].classList.remove('scale-95');
        }, 10);

        if (id === 'categoryModal') {
            const nameInput = document.getElementById('catName');
            nameInput.classList.remove('border-red-500');
            document.getElementById('catNameError').classList.add('hidden');

            if(mode === 'edit') {
                document.getElementById('categoryModalTitle').textContent = 'Chỉnh sửa danh mục';
                nameInput.value = title;
                // Mock product count for edit mode
                document.getElementById('categoryProductWarning').classList.remove('hidden');
                document.getElementById('categoryProductCount').textContent = Math.floor(Math.random() * 50) + 1;
            } else {
                document.getElementById('categoryModalTitle').textContent = 'Thêm danh mục mới';
                nameInput.value = '';
                document.getElementById('categoryProductWarning').classList.add('hidden');
            }
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        modal.classList.add('opacity-0');
        modal.children[1].classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function submitCategory() {
        const nameInput = document.getElementById('catName');
        const errorText = document.getElementById('catNameError');
        const btn = document.getElementById('btnSubmitCategory');
        
        if(!nameInput.value.trim()) {
            nameInput.classList.add('border-red-500');
            errorText.classList.remove('hidden');
            return;
        }

        btn.textContent = 'Đang lưu...';
        btn.classList.add('opacity-75', 'cursor-not-allowed');

        setTimeout(() => {
            btn.textContent = 'Lưu danh mục';
            btn.classList.remove('opacity-75', 'cursor-not-allowed');
            closeModal('categoryModal');
            showToast('Đã lưu danh mục thành công', 'success');
        }, 600);
    }

    // Sort modal
    function submitSort() {
        closeModal('sortModal');
        showToast('Đã cập nhật thứ tự hiển thị', 'success');
    }

    // Hide/Delete Modals
    let currentCategory = '';
    let currentCategoryEl = null;

    function openHideModal(title, count, btn) {
        currentCategory = title;
        currentCategoryEl = btn.closest('tr');
        document.getElementById('hideModalTitle').textContent = title;
        
        const warning = document.getElementById('hideModalWarning');
        if(count > 0) {
            warning.classList.remove('hidden');
            document.getElementById('hideModalCount').textContent = count;
        } else {
            warning.classList.add('hidden');
        }
        
        // Hide action menu first
        document.querySelectorAll('.action-menu').forEach(m => m.classList.add('hidden'));
        
        openModal('hideModal');
    }

    function submitHide() {
        if(currentCategoryEl) {
            const badge = currentCategoryEl.querySelector('td:nth-child(8) span');
            if(badge) {
                badge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-gray-100 text-gray-600 border-gray-200 inline-block whitespace-nowrap';
                badge.textContent = 'Đang ẩn';
            }
        }
        closeModal('hideModal');
        showToast(`Đã ẩn danh mục "${currentCategory}"`, 'success');
    }

    function openDeleteModal(title, count, btn) {
        currentCategory = title;
        currentCategoryEl = btn.closest('tr');
        document.getElementById('deleteModalTitle').textContent = title;
        
        const warning = document.getElementById('deleteModalWarning');
        const btnDelete = document.getElementById('btnConfirmDelete');
        const btnSwitch = document.getElementById('btnSwitchToHide');

        if(count > 0) {
            warning.classList.remove('hidden');
            document.getElementById('deleteModalCount').textContent = count;
            btnDelete.classList.add('opacity-50', 'cursor-not-allowed');
            btnSwitch.classList.remove('hidden');
        } else {
            warning.classList.add('hidden');
            btnDelete.classList.remove('opacity-50', 'cursor-not-allowed');
            btnSwitch.classList.add('hidden');
        }
        
        document.querySelectorAll('.action-menu').forEach(m => m.classList.add('hidden'));
        openModal('deleteModal');
    }

    function submitDelete() {
        const warning = document.getElementById('deleteModalWarning');
        if(!warning.classList.contains('hidden')) {
            showToast('Không thể xóa danh mục đang có sản phẩm!', 'error');
            return;
        }
        
        if(currentCategoryEl) {
            currentCategoryEl.style.opacity = '0';
            setTimeout(() => currentCategoryEl.remove(), 300);
        }
        closeModal('deleteModal');
        showToast(`Đã xóa danh mục "${currentCategory}"`, 'success');
    }

    function switchToHide() {
        closeModal('deleteModal');
        setTimeout(() => {
            openHideModal(currentCategory, parseInt(document.getElementById('deleteModalCount').textContent), null);
        }, 300);
    }

    // Dropdown logic
    function toggleActionMenu(button) {
        document.querySelectorAll('.action-menu-dropdown').forEach(m => {
            if (m !== button.nextElementSibling) m.classList.add('hidden');
        });
        
        const menu = button.nextElementSibling;
        
        if (menu.classList.contains('hidden')) {
            menu.classList.add('action-menu-dropdown');
            menu.classList.remove('hidden');
            
            const rect = button.getBoundingClientRect();
            const menuHeight = menu.offsetHeight;
            const spaceBelow = window.innerHeight - rect.bottom;
            
            menu.style.position = 'fixed';
            menu.style.right = (window.innerWidth - rect.right) + 'px';
            menu.style.left = 'auto';
            menu.style.zIndex = '9999';
            
            // Nếu không đủ chỗ trống phía dưới, mở menu ngược lên trên
            if (spaceBelow < menuHeight + 10) {
                menu.style.top = (rect.top - menuHeight - 5) + 'px';
                menu.style.bottom = 'auto';
            } else {
                menu.style.top = (rect.bottom + 5) + 'px';
                menu.style.bottom = 'auto';
            }
        } else {
            menu.classList.add('hidden');
        }
    }

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.action-menu-dropdown') && !e.target.closest('button[onclick^="toggleActionMenu"]')) {
            document.querySelectorAll('.action-menu-dropdown').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });

    window.addEventListener('scroll', function() {
        document.querySelectorAll('.action-menu-dropdown:not(.hidden)').forEach(m => m.classList.add('hidden'));
    }, true);

    document.querySelector('.flex-1.overflow-auto').addEventListener('scroll', () => {
        document.querySelectorAll('.action-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
    });

    // Checkbox logic
    const selectAll = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');

    function updateBulkActions() {
        const count = document.querySelectorAll('.row-checkbox:checked').length;
        if(count > 0) {
            bulkActions.classList.remove('hidden');
            bulkActions.classList.add('flex');
            selectedCount.textContent = count;
        } else {
            bulkActions.classList.add('hidden');
            bulkActions.classList.remove('flex');
        }
    }

    selectAll.addEventListener('change', function() {
        rowCheckboxes.forEach(cb => cb.checked = this.checked);
        updateBulkActions();
    });

    rowCheckboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            const allChecked = Array.from(rowCheckboxes).every(c => c.checked);
            const someChecked = Array.from(rowCheckboxes).some(c => c.checked);
            selectAll.checked = allChecked;
            selectAll.indeterminate = someChecked && !allChecked;
            updateBulkActions();
        });
    });

    // Bulk action buttons
    document.querySelectorAll('#bulkActions button').forEach(btn => {
        btn.addEventListener('click', function() {
            const text = this.textContent.trim().toLowerCase();
            const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
            const count = checkedBoxes.length;

            if(count > 0) {
                if(text.includes('xóa')) {
                    checkedBoxes.forEach(cb => {
                        const tr = cb.closest('tr');
                        tr.style.opacity = '0';
                        setTimeout(() => tr.remove(), 300);
                    });
                } else if(text.includes('ẩn')) {
                    checkedBoxes.forEach(cb => {
                        const badge = cb.closest('tr').querySelector('td:nth-child(8) span');
                        if(badge) {
                            badge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-gray-100 text-gray-600 border-gray-200 inline-block whitespace-nowrap';
                            badge.textContent = 'Đang ẩn';
                        }
                    });
                } else if(text.includes('hiện')) {
                    checkedBoxes.forEach(cb => {
                        const badge = cb.closest('tr').querySelector('td:nth-child(8) span');
                        if(badge) {
                            badge.className = 'text-[11px] font-medium px-2 py-1 rounded-full border bg-emerald-50 text-emerald-700 border-emerald-200 inline-block whitespace-nowrap';
                            badge.textContent = 'Đang hiển thị';
                        }
                    });
                }
                
                showToast(`Đã ${text} ${count} danh mục thành công`, 'success');
                
                setTimeout(() => {
                    rowCheckboxes.forEach(cb => cb.checked = false);
                    selectAll.checked = false;
                    updateBulkActions();
                }, 300);
            }
        });
    });
    // Drag and drop logic for sortModal
    const sortableList = document.getElementById('sortableList');
    let draggedItem = null;

    sortableList.addEventListener('dragstart', (e) => {
        draggedItem = e.target.closest('.sortable-item');
        if(draggedItem) {
            draggedItem.classList.add('opacity-50');
            setTimeout(() => draggedItem.classList.add('hidden'), 0);
        }
    });

    sortableList.addEventListener('dragend', (e) => {
        if(draggedItem) {
            draggedItem.classList.remove('opacity-50', 'hidden');
            draggedItem = null;
        }
    });

    sortableList.addEventListener('dragover', (e) => {
        e.preventDefault();
        const afterElement = getDragAfterElement(sortableList, e.clientY);
        const currentItem = document.querySelector('.sortable-item.hidden');
        if (currentItem) {
            if (afterElement == null) {
                sortableList.appendChild(currentItem);
            } else {
                sortableList.insertBefore(currentItem, afterElement);
            }
        }
    });

    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll('.sortable-item:not(.hidden)')];
        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child };
            } else {
                return closest;
            }
        }, { offset: Number.NEGATIVE_INFINITY }).element;
    }
</script>
