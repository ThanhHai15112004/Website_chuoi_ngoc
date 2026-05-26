<!-- Trang Chi Tiết Phiếu Kiểm Kê -->
<div class="px-6 py-6 pb-20 max-w-[1200px] mx-auto min-h-screen bg-gray-50">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="<?= APP_URL ?>/admin/kiem-ke" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-gray-900 leading-tight">Chi tiết Phiếu Kiểm Kê: <?= $phieu['id'] ?></h2>
                <p class="text-sm text-gray-500 mt-1">
                    <span class="iconify inline text-gray-400" data-icon="mdi:account-outline"></span> Tạo bởi: <span class="font-medium text-gray-700"><?= $phieu['nguoi_tao'] ?></span> lúc <?= $phieu['ngay_tao'] ?>
                    <?php if (isset($phieu['ngay_hoan_thanh'])): ?>
                        <span class="mx-2 text-gray-300">|</span>
                        <span class="iconify inline text-gray-400" data-icon="mdi:check-circle-outline"></span> Hoàn tất: <span class="font-medium text-emerald-600"><?= $phieu['ngay_hoan_thanh'] ?></span>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:printer"></span> In biên bản
            </button>
            <?php if ($phieu['trang_thai'] === 'Đang kiểm kê'): ?>
                <button class="px-4 py-2 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 transition-colors text-sm flex items-center gap-2 shadow-sm" onclick="alert('Đã cập nhật phiếu nháp thành công!')">
                    <span class="iconify" data-icon="mdi:content-save"></span> Lưu nháp
                </button>
                <button class="px-4 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition-colors text-sm flex items-center gap-2 shadow-sm shadow-emerald-600/20" onclick="alert('Hệ thống đã tự động tạo các phiếu Nhập/Xuất điều chỉnh để cân bằng kho!')">
                    <span class="iconify" data-icon="mdi:scale-balance"></span> Cân bằng kho
                </button>
            <?php else: ?>
                <span class="inline-flex items-center gap-1.5 px-4 py-2 bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-lg text-sm font-bold">
                    <span class="iconify" data-icon="mdi:check-decagram"></span> Đã cân bằng
                </span>
            <?php endif; ?>
        </div>
    </div>

    <!-- Thông tin chung -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-6">
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-5 py-4 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:information-outline"></span> Thông tin chung
                    </h3>
                </div>
                <div class="p-5 space-y-4">
                    <div>
                        <p class="text-xs text-gray-500 font-medium uppercase mb-1">Kho kiểm kê</p>
                        <p class="font-bold text-gray-900"><?= $phieu['kho'] ?></p>
                    </div>
                    <?php if (isset($phieu['nguoi_kiem_dem'])): ?>
                    <div class="mt-4">
                        <p class="text-xs text-gray-500 font-medium uppercase mb-1">Người kiểm đếm</p>
                        <p class="text-sm font-medium text-gray-700"><?= $phieu['nguoi_kiem_dem'] ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <hr class="border-gray-100">
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Số lượng SP</p>
                            <p class="font-bold text-gray-900"><?= $phieu['tong_sp_kiem_ke'] ?> mã</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">SL chênh lệch</p>
                            <?php if ($phieu['tong_chenh_lech'] < 0): ?>
                                <p class="font-bold text-red-600"><?= $phieu['tong_chenh_lech'] ?></p>
                            <?php elseif ($phieu['tong_chenh_lech'] > 0): ?>
                                <p class="font-bold text-blue-600">+<?= $phieu['tong_chenh_lech'] ?></p>
                            <?php else: ?>
                                <p class="font-bold text-emerald-600">Khớp</p>
                            <?php endif; ?>
                        </div>
                        <?php if (isset($phieu['tong_gia_tri_lech'])): ?>
                        <div class="col-span-2 mt-2 pt-2 border-t border-gray-100">
                            <p class="text-xs text-gray-500 mb-1">Giá trị chênh lệch (Ước tính)</p>
                            <?php if ($phieu['tong_gia_tri_lech'] < 0): ?>
                                <p class="text-lg font-bold text-red-600"><?= number_format($phieu['tong_gia_tri_lech'], 0, ',', '.') ?>đ <span class="text-xs font-normal text-gray-500">(Thất thoát)</span></p>
                            <?php elseif ($phieu['tong_gia_tri_lech'] > 0): ?>
                                <p class="text-lg font-bold text-blue-600">+<?= number_format($phieu['tong_gia_tri_lech'], 0, ',', '.') ?>đ <span class="text-xs font-normal text-gray-500">(Dư thừa)</span></p>
                            <?php else: ?>
                                <p class="text-lg font-bold text-emerald-600">0đ</p>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (!empty($phieu['ghi_chu'])): ?>
                    <hr class="border-gray-100">
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Lý do / Ghi chú</p>
                        <p class="text-sm text-gray-700 bg-gray-50 p-3 rounded-lg border border-gray-100 italic"><?= $phieu['ghi_chu'] ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($phieu['trang_thai'] === 'Đã cân bằng'): ?>
            <div class="bg-blue-50 rounded-xl border border-blue-200 p-5">
                <h4 class="font-bold text-blue-800 mb-2 flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:file-document-multiple-outline"></span> Chứng từ điều chỉnh
                </h4>
                <p class="text-xs text-blue-700 mb-3">Hệ thống đã tự động sinh các chứng từ sau để cân bằng kho:</p>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="font-medium text-[#6B0D18] hover:underline">PXK-DC-001</a> <span class="text-gray-500">(Xuất 2 sp)</span></li>
                </ul>
            </div>
            <?php endif; ?>
        </div>

        <!-- Chi tiết sản phẩm -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-5 py-4 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
                    <h3 class="font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:format-list-checks"></span> Chi tiết kiểm kê
                    </h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-gray-200 text-xs uppercase text-gray-500">
                                <th class="py-3 px-4 font-semibold w-12 text-center">STT</th>
                                <th class="py-3 px-4 font-semibold">Sản phẩm</th>
                                <th class="py-3 px-4 font-semibold text-center">Tồn HT</th>
                                <th class="py-3 px-4 font-semibold text-center">Tồn TT</th>
                                <th class="py-3 px-4 font-semibold text-center">Chênh lệch</th>
                                <th class="py-3 px-4 font-semibold text-right">Giá trị lệch</th>
                                <th class="py-3 px-4 font-semibold">Ghi chú thêm</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php foreach ($chiTiet as $index => $item): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="py-3 px-4 text-center text-sm text-gray-500"><?= $index + 1 ?></td>
                                    <td class="py-3 px-4">
                                        <div class="font-medium text-gray-900 text-sm"><?= $item['ten_sp'] ?></div>
                                        <div class="text-xs text-gray-500">Mã: <?= $item['ma_sp'] ?></div>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="font-medium text-gray-500"><?= $item['ton_he_thong'] ?></span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="font-bold text-gray-900"><?= $item['ton_thuc_te'] ?></span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <?php if ($item['chenh_lech'] < 0): ?>
                                            <span class="inline-flex items-center gap-1 font-bold text-red-600 bg-red-50 px-2 py-0.5 rounded text-xs">
                                                <span class="iconify" data-icon="mdi:trending-down"></span> Thiếu <?= $item['chenh_lech'] ?>
                                            </span>
                                        <?php elseif ($item['chenh_lech'] > 0): ?>
                                            <span class="inline-flex items-center gap-1 font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded text-xs">
                                                <span class="iconify" data-icon="mdi:trending-up"></span> Thừa +<?= $item['chenh_lech'] ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center gap-1 font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded text-xs">
                                                <span class="iconify" data-icon="mdi:check"></span> Khớp
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3 px-4 text-right">
                                        <?php if (isset($item['thanh_tien_lech']) && $item['thanh_tien_lech'] != 0): ?>
                                            <span class="text-sm font-medium <?= $item['thanh_tien_lech'] < 0 ? 'text-red-600' : 'text-blue-600' ?>">
                                                <?= number_format($item['thanh_tien_lech'], 0, ',', '.') ?>đ
                                            </span>
                                            <div class="text-[10px] text-gray-400">Giá vốn: <?= number_format($item['gia_von'], 0, ',', '.') ?>đ</div>
                                        <?php else: ?>
                                            <span class="text-sm text-gray-400">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3 px-4 text-sm text-gray-600 italic">
                                        <?= $item['ghi_chu'] ?: '-' ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
