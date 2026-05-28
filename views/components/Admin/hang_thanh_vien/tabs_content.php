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
                                        <button onclick="toggleRankStatus('<?= $rank['id'] ?>', 'active')" class="w-full flex items-center gap-3 px-4 py-2 text-sm font-medium text-amber-600 hover:bg-amber-50 transition-colors text-left">
                                            <span class="iconify text-lg" data-icon="mdi:pause-circle-outline"></span> Tạm ngưng
                                        </button>
                                        <?php else: ?>
                                        <button onclick="toggleRankStatus('<?= $rank['id'] ?>', 'inactive')" class="w-full flex items-center gap-3 px-4 py-2 text-sm font-medium text-emerald-600 hover:bg-emerald-50 transition-colors text-left">
                                            <span class="iconify text-lg" data-icon="mdi:play-circle-outline"></span> Kích hoạt
                                        </button>
                                        <?php endif; ?>
                                        <button onclick="deleteRankItem('<?= $rank['id'] ?>')" class="w-full flex items-center gap-3 px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 transition-colors text-left">
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
                    <span class="px-2 py-0.5 bg-white text-amber-700 text-xs font-bold rounded shadow-sm"><?= count($khach_sap_len_hang) ?> người</span>
                </div>
                <p class="text-xs text-amber-700/80 mb-4">Gửi voucher hoặc tin nhắn để khuyến khích khách hàng mua sắm đạt mốc hạng mới.</p>
                
                <div class="space-y-3">
                    <?php if(empty($khach_sap_len_hang)): ?>
                        <div class="text-sm text-amber-700 italic text-center py-4">Chưa có dữ liệu.</div>
                    <?php else: ?>
                        <?php foreach($khach_sap_len_hang as $kh): ?>
                        <div class="bg-white p-3 rounded-xl border border-amber-100 shadow-sm flex items-center justify-between group">
                            <div>
                                <p class="font-bold text-gray-800 text-sm hover:text-[#6B0D18] cursor-pointer" onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['id'] ?>'"><?= $kh['ten'] ?></p>
                                <p class="text-[10px] font-bold text-gray-500 mt-0.5"><?= strtoupper($kh['current_rank']) ?> <span class="iconify inline text-amber-500" data-icon="mdi:arrow-right-thick"></span> <?= strtoupper($kh['next_rank']) ?></p>
                            </div>
                            <div class="text-right">
                                <p class="text-[11px] text-gray-500">Còn thiếu</p>
                                <p class="text-sm font-bold text-[#6B0D18]"><?= number_format($kh['con_thieu'], 0, ',', '.') ?>đ</p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
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

