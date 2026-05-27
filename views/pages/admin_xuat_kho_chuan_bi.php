<?php
// views/pages/admin_xuat_kho_chuan_bi.php
$pageTitle = 'Chuẩn bị hàng xuất kho | Admin';
$current_page = 'xuat_kho';
?>

<!-- Modal Overlay -->
<div id="modalOverlay" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden z-50 transition-opacity"></div>

<div class="max-w-[1400px] mx-auto">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 mt-4 px-4 lg:px-0">
        <div class="flex items-center gap-3">
                        <a href="<?= APP_URL ?>/admin/xuat-kho" class="p-2 -ml-2 text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 rounded-lg transition-colors">
                            <span class="iconify text-2xl" data-icon="mdi:arrow-left"></span>
                        </a>
                        <div>
                            <div class="flex items-center gap-2">
                                <h1 class="text-xl font-black text-gray-900 tracking-tight">Chuẩn bị hàng: XK202600123</h1>
                                <span class="px-2 py-0.5 bg-orange-50 text-orange-600 rounded text-xs font-bold border border-orange-200">Đang chuẩn bị</span>
                            </div>
                            <div class="text-sm text-gray-500 flex items-center gap-3 mt-1">
                                <span class="flex items-center gap-1"><span class="iconify text-gray-400" data-icon="mdi:warehouse"></span> Kho online</span>
                                <span>&bull;</span>
                                <span class="flex items-center gap-1 text-[#6B0D18] font-medium"><span class="iconify text-gray-400" data-icon="mdi:account-box"></span> Đơn #DH202600123</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button type="button" class="px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm">
                            Lưu tiến độ
                        </button>
                        <button type="button" onclick="openModal('modalXacNhanXuat')" class="px-4 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-bold text-sm transition-colors shadow-sm flex items-center gap-2">
                            <span class="iconify text-lg" data-icon="mdi:check-all"></span> Xác nhận xuất kho
                        </button>
                    </div>
        </div>
    </div>

    <div class="px-4 lg:px-0 w-full space-y-6">
        
        <!-- Tiến độ & Barcode Scanner -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Progress Card -->
                    <div class="lg:col-span-1 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center">
                        <div class="flex items-end justify-between mb-2">
                            <div class="text-gray-500 font-medium">Tiến độ chuẩn bị</div>
                            <div class="text-2xl font-black text-[#6B0D18]">2<span class="text-base text-gray-400 font-medium">/3</span></div>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3 mb-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-red-500 to-[#6B0D18] h-3 rounded-full transition-all duration-500" style="width: 66%"></div>
                        </div>
                        <div class="flex items-center justify-between text-xs font-medium">
                            <span class="text-emerald-600 flex items-center gap-1"><span class="iconify" data-icon="mdi:check-circle"></span> Đã lấy: 2 món</span>
                            <span class="text-amber-600 flex items-center gap-1"><span class="iconify" data-icon="mdi:clock-outline"></span> Cần lấy: 1 món</span>
                        </div>
                    </div>
                    
        <!-- Scanner Card -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center">
            <label class="block text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                <span class="iconify text-emerald-600 text-xl" data-icon="mdi:barcode-scan"></span> Quét mã vạch / SKU sản phẩm
            </label>
            <div class="relative max-w-lg">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:magnify"></span>
                </div>
                <input type="text" id="barcodeInput" autofocus class="block w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-300 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-mono text-lg" placeholder="Nhập mã hoặc dùng máy quét...">
                <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
                    <button class="px-3 py-1.5 bg-emerald-600 text-white rounded-lg text-sm font-bold shadow hover:bg-emerald-700 transition-colors">Quét</button>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-3">Hệ thống sẽ tự động tăng số lượng "Đã lấy" khi quét đúng mã sản phẩm trong phiếu.</p>
        </div>
                </div>

                <!-- Bảng danh sách cần lấy (Picking List) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                        <h2 class="text-lg font-bold text-gray-900">Danh sách cần lấy (Picking List)</h2>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <span class="inline-block w-3 h-3 rounded-full bg-gray-200"></span> Chưa lấy
                            <span class="inline-block w-3 h-3 rounded-full bg-emerald-400 ml-3"></span> Đã lấy đủ
                            <span class="inline-block w-3 h-3 rounded-full bg-rose-400 ml-3"></span> Thiếu hàng
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[1000px]">
                            <thead>
                                <tr class="bg-white border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500">
                                    <th class="py-3 px-4 w-12 text-center">Trạng thái</th>
                                    <th class="py-3 px-4 w-64">Sản phẩm</th>
                                    <th class="py-3 px-4 w-40">Mã SKU / Biến thể</th>
                                    <th class="py-3 px-4 w-40">Vị trí lấy</th>
                                    <th class="py-3 px-4 text-center w-28">Cần xuất</th>
                                    <th class="py-3 px-4 text-center w-32">Thực xuất</th>
                                    <th class="py-3 px-4 w-32">Kết quả</th>
                                    <th class="py-3 px-4 text-right w-20"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                
                                <!-- Dòng 1: Đã lấy đủ -->
                                <tr class="hover:bg-gray-50/50 transition-colors bg-emerald-50/30">
                                    <td class="py-4 px-4 text-center">
                                        <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
                                            <span class="iconify" data-icon="mdi:check"></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded bg-white border border-gray-200 flex-shrink-0 shadow-sm"></div>
                                            <div class="font-bold text-gray-900 text-sm">Vòng Ngọc Bích Tài Lộc</div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="text-sm font-mono text-gray-700">NB-TL-16</div>
                                        <div class="text-xs text-gray-500 mt-0.5">Size 16cm</div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="text-sm font-medium text-gray-700 flex items-center gap-1.5"><span class="iconify text-gray-400" data-icon="mdi:map-marker-outline"></span> Khu A / Kệ A1</div>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <span class="font-bold text-gray-900 text-lg">2</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button onclick="updateQty(this, -1, 2)" class="w-8 h-8 rounded bg-white border border-gray-300 text-gray-600 flex items-center justify-center hover:bg-gray-50 font-bold">-</button>
                                            <input type="text" value="2" readonly class="qty-input w-12 text-center font-bold text-emerald-700 bg-transparent border-none focus:outline-none text-lg">
                                            <button onclick="updateQty(this, 1, 2)" class="w-8 h-8 rounded bg-white border border-gray-300 text-gray-600 flex items-center justify-center hover:bg-gray-50 font-bold">+</button>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 status-cell">
                                        <span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold bg-emerald-100 text-emerald-700">
                                            Đã lấy đủ
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <button class="p-1.5 text-gray-400 hover:text-amber-600 rounded transition-colors tooltip" title="Ghi chú thêm">
                                            <span class="iconify text-lg" data-icon="mdi:message-draw"></span>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Dòng 2: Chưa lấy đủ -->
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="py-4 px-4 text-center">
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center mx-auto"></div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded bg-white border border-gray-200 flex-shrink-0 shadow-sm"></div>
                                            <div class="font-bold text-gray-900 text-sm">Nhẫn ngọc trai đính đá</div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="text-sm font-mono text-gray-700">NT-DD-01</div>
                                        <div class="text-xs text-gray-500 mt-0.5">Size 6</div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="text-sm font-medium text-gray-700 flex items-center gap-1.5"><span class="iconify text-gray-400" data-icon="mdi:map-marker-outline"></span> Khu C / Tủ Kính</div>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <span class="font-bold text-gray-900 text-lg">1</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button onclick="updateQty(this, -1, 1)" class="w-8 h-8 rounded bg-white border border-gray-300 text-gray-600 flex items-center justify-center hover:bg-gray-50 font-bold">-</button>
                                            <input type="text" value="0" readonly class="qty-input w-12 text-center font-bold text-gray-900 bg-transparent border-none focus:outline-none text-lg">
                                            <button onclick="updateQty(this, 1, 1)" class="w-8 h-8 rounded bg-white border border-gray-300 text-gray-600 flex items-center justify-center hover:bg-gray-50 font-bold">+</button>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 status-cell">
                                        <span class="text-xs text-gray-400 italic">Chưa lấy hàng</span>
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <button onclick="openModal('modalBaoThieu')" class="p-1.5 text-rose-500 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 rounded transition-colors tooltip flex items-center justify-center ml-auto" title="Báo thiếu hàng">
                                            <span class="iconify text-lg" data-icon="mdi:alert-outline"></span>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

    </div>
</div>

<!-- Modal Báo thiếu hàng -->
<div id="modalBaoThieu" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalBaoThieuContent">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-rose-50/50">
            <h3 class="text-lg font-bold text-rose-700 flex items-center gap-2">
                <span class="iconify text-rose-600 text-2xl" data-icon="mdi:alert-circle-outline"></span> Báo thiếu hàng
            </h3>
            <button onclick="closeModal('modalBaoThieu')" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-white rounded-full transition-colors focus:outline-none shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6">
            <div class="mb-4">
                <div class="font-bold text-gray-900">Nhẫn ngọc trai đính đá</div>
                <div class="text-sm text-gray-500">SKU: NT-DD-01</div>
            </div>
            
            <div class="grid grid-cols-2 gap-4 mb-4 p-3 bg-gray-50 rounded-lg border border-gray-200 text-center">
                <div>
                    <div class="text-xs text-gray-500 mb-1">Cần xuất</div>
                    <div class="font-bold text-gray-900 text-lg">1</div>
                </div>
                <div class="border-l border-gray-200">
                    <div class="text-xs text-rose-500 mb-1">Thiếu</div>
                    <div class="font-bold text-rose-600 text-lg">1</div>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Lý do thiếu hàng <span class="text-red-500">*</span></label>
                <select class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                    <option>Hết hàng thực tế trên kệ</option>
                    <option>Hàng bị lỗi / vỡ không thể xuất</option>
                    <option>Không tìm thấy tại vị trí</option>
                    <option>Lý do khác</option>
                </select>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú chi tiết</label>
                <textarea rows="3" class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="Mô tả thêm tình trạng (nếu có)..."></textarea>
            </div>

            <div class="flex items-center gap-3">
                <button type="button" onclick="closeModal('modalBaoThieu')" class="flex-1 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                    Hủy
                </button>
                <button type="button" class="flex-1 py-2.5 bg-rose-600 text-white rounded-lg hover:bg-rose-700 font-medium transition-colors shadow-sm">
                    Xác nhận thiếu
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Xác nhận xuất kho -->
<div id="modalXacNhanXuat" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalXacNhanXuatContent">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-emerald-50/50">
            <h3 class="text-lg font-bold text-emerald-800 flex items-center gap-2">
                <span class="iconify text-emerald-600 text-2xl" data-icon="mdi:check-decagram"></span> Xác nhận xuất kho?
            </h3>
            <button onclick="closeModal('modalXacNhanXuat')" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-white rounded-full transition-colors focus:outline-none shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6">
            <p class="text-sm text-gray-600 mb-4">Hệ thống sẽ <strong class="text-rose-600">trừ số lượng thực xuất khỏi tồn kho</strong> và cập nhật trạng thái đơn hàng liên quan.</p>
            
            <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 mb-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-500">Mã phiếu:</span>
                    <span class="font-bold text-gray-900">XK202600123</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-500">Kho xuất:</span>
                    <span class="font-medium text-gray-900">Kho online</span>
                </div>
                <div class="flex justify-between items-center border-t border-gray-200 pt-2 mt-2">
                    <span class="text-sm text-gray-500">Thực xuất:</span>
                    <span class="font-black text-[#6B0D18]">2/3 món</span>
                </div>
            </div>

            <div class="p-3 bg-amber-50 border border-amber-200 rounded-lg text-sm text-amber-700 mb-6 flex gap-2 items-start">
                <span class="iconify shrink-0 mt-0.5 text-lg" data-icon="mdi:alert"></span>
                <span>Phiếu này chưa xuất đủ số lượng yêu cầu (thiếu 1 món). Bạn vẫn muốn xuất kho phần đã chuẩn bị?</span>
            </div>

            <label class="flex items-start gap-2 mb-6 cursor-pointer">
                <input type="checkbox" class="mt-1 w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                <span class="text-sm text-gray-700 font-medium">Tôi đã kiểm tra kỹ số lượng thực xuất và đồng ý trừ tồn kho.</span>
            </label>

            <div class="flex items-center gap-3">
                <button type="button" onclick="closeModal('modalXacNhanXuat')" class="flex-1 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                    Hủy bỏ
                </button>
                <button type="button" class="flex-1 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium transition-colors shadow-sm">
                    Xác nhận xuất
                </button>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function updateQty(btn, change, maxQty) {
        const input = btn.parentElement.querySelector('.qty-input');
        let currentQty = parseInt(input.value) || 0;
        let newQty = currentQty + change;
        if(newQty < 0) newQty = 0;
        if(newQty > maxQty) newQty = maxQty;
        
        input.value = newQty;
        
        // Update input styling and status
        const tr = btn.closest('tr');
        const statusCell = tr.querySelector('.status-cell');
        const iconCell = tr.firstElementChild;
        
        // Reset styles first
        input.classList.remove('text-emerald-700', 'text-rose-600', 'text-gray-900');
        tr.classList.remove('bg-emerald-50/30', 'bg-rose-50/30');
        
        if (newQty === maxQty) {
            input.classList.add('text-emerald-700');
            tr.classList.add('bg-emerald-50/30');
            statusCell.innerHTML = '<span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold bg-emerald-100 text-emerald-700">Đã lấy đủ</span>';
            iconCell.innerHTML = '<div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto"><span class="iconify" data-icon="mdi:check"></span></div>';
        } else if (newQty > 0 && newQty < maxQty) {
            input.classList.add('text-rose-600');
            tr.classList.add('bg-rose-50/30');
            statusCell.innerHTML = `<span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold bg-rose-100 text-rose-700">Thiếu ${maxQty - newQty}</span>`;
            iconCell.innerHTML = '<div class="w-6 h-6 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mx-auto"><span class="iconify" data-icon="mdi:alert"></span></div>';
        } else {
            input.classList.add('text-gray-900');
            statusCell.innerHTML = '<span class="text-xs text-gray-400 italic">Chưa lấy hàng</span>';
            iconCell.innerHTML = '<div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center mx-auto"></div>';
        }
    }
    function openModal(id) {
        const modal = document.getElementById(id);
        const overlay = document.getElementById('modalOverlay');
        if (modal && overlay) {
            overlay.classList.remove('hidden');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                const content = document.getElementById(id + 'Content');
                if(content) {
                    content.classList.remove('scale-95', 'opacity-0');
                    content.classList.add('scale-100', 'opacity-100');
                }
            }, 10);
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        const overlay = document.getElementById('modalOverlay');
        if (modal && overlay) {
            const content = document.getElementById(id + 'Content');
            if(content) {
                content.classList.remove('scale-100', 'opacity-100');
                content.classList.add('scale-95', 'opacity-0');
            }
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                overlay.classList.add('hidden');
            }, 300);
        }
    }
</script>
