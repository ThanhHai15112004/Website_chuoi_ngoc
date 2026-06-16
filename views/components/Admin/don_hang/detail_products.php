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
                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center font-bold text-base bg-gray-100 border border-white shadow-sm overflow-hidden">
                                        <?php if(!empty($sp['image'])): ?>
                                            <img src="<?= get_image_url($sp['image']) ?>" alt="" class="w-full h-full object-cover">
                                        <?php else: ?>
                                            <span class="iconify text-gray-400" data-icon="mdi:image-outline"></span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div class="font-bold text-gray-900"><?= $sp['ten_sp'] ?></div>
                                    <div class="text-xs text-gray-500 mt-1 flex items-center gap-2">
                                        <span class="bg-gray-100 px-1.5 py-0.5 rounded"><?= $sp['ma_sp'] ?></span>
                                        <span><?= $sp['variant_name'] ?></span>
                                    </div>
                                    <?php if($sp['so_luong_ton'] < 5): ?>
                                        <div class="text-[10px] text-red-500 mt-1 flex items-center gap-1">
                                            <span class="iconify" data-icon="mdi:alert-circle-outline"></span> Tồn kho thấp (còn <?= $sp['so_luong_ton'] ?>)
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="p-4 text-right font-medium text-gray-700"><?= number_format($sp['don_gia'], 0, ',', '.') ?>đ</td>
                                <td class="p-4 text-center font-bold text-gray-900">x<?= $sp['so_luong'] ?></td>
                                <td class="p-4 text-right font-bold text-[#6B0D18]"><?= number_format($sp['don_gia'] * $sp['so_luong'], 0, ',', '.') ?>đ</td>
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
                        "<?= !empty($don_hang['ghi_chu']) ? htmlspecialchars($don_hang['ghi_chu']) : 'Không có ghi chú' ?>"
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
                        
                        <div class="relative">
                            <textarea id="ghi_chu_noi_bo_input" placeholder="Thêm ghi chú nội bộ mới (chức năng đang phát triển)..." class="w-full p-3 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#6B0D18] resize-none h-20 transition-colors"></textarea>
                            <button onclick="showToast('Tính năng này sẽ được phát triển sau!')" class="absolute bottom-2 right-2 px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold rounded-lg transition-colors">Lưu</button>
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
                    
                    <?php if(!empty($don_hang['lich_su'])): ?>
                        <?php foreach($don_hang['lich_su'] as $index => $ls): ?>
                        <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group <?= $index === 0 ? 'is-active' : '' ?>">
                            <div class="flex items-center justify-center w-6 h-6 rounded-full border-4 border-white <?= $index === 0 ? 'bg-[#6B0D18]' : 'bg-gray-300' ?> text-white shadow shrink-0 absolute left-[-23px] top-0 z-10"></div>
                            <div class="w-full pb-2">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="font-bold text-gray-900 text-sm"><?= htmlspecialchars($ls['hanh_dong']) ?></span>
                                    <span class="text-xs font-medium text-gray-400"><?= date('d/m/Y, H:i', strtotime($ls['ngay_tao'])) ?></span>
                                </div>
                                <div class="text-sm text-gray-600 mb-1"><?= htmlspecialchars($ls['gia_tri_moi']) ?> (Bởi: <?= $ls['ten_nhan_vien'] ?>)</div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-sm text-gray-500">Chưa có lịch sử cập nhật.</p>
                    <?php endif; ?>
                    
                </div>
            </div>
