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
