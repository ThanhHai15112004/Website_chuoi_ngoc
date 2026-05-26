<?php
// views/components/Admin/cau_hinh_kho/tabs/tab_khu_vuc.php
?>
<div class="flex flex-col lg:flex-row h-full min-h-[500px]">
    
    <!-- Cột trái: Sơ đồ kho (Tree View) -->
    <div class="w-full lg:w-1/3 border-b lg:border-b-0 lg:border-r border-gray-200 bg-gray-50/30 p-4">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-bold text-gray-900">Sơ đồ kho</h3>
            <button onclick="openModal('modalThemViTri')" class="w-8 h-8 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-500 hover:text-[#6B0D18] hover:border-[#6B0D18]/30 transition-colors tooltip" title="Thêm kho mới">
                <span class="iconify" data-icon="mdi:plus"></span>
            </button>
        </div>
        
        <div class="space-y-1 max-h-[600px] overflow-y-auto custom-scrollbar">
            <?php foreach($treeKhuVuc as $idKho => $khoData): ?>
                <!-- Level 1: Kho -->
                <div class="tree-item">
                    <div class="flex items-center gap-2 p-2 rounded-lg hover:bg-white border border-transparent hover:border-gray-200 cursor-pointer group bg-white border-gray-200 shadow-sm relative">
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#6B0D18] rounded-l-lg"></div>
                        <button class="w-5 h-5 flex items-center justify-center text-gray-400 hover:text-gray-700">
                            <span class="iconify" data-icon="mdi:chevron-down"></span>
                        </button>
                        <span class="iconify text-[#6B0D18] text-lg" data-icon="mdi:warehouse"></span>
                        <span class="font-bold text-gray-900 text-sm flex-1"><?= $khoData['ten'] ?></span>
                        <div class="opacity-0 group-hover:opacity-100 flex items-center">
                            <button onclick="openModal('modalThemViTri')" class="w-6 h-6 flex items-center justify-center text-gray-400 hover:text-[#6B0D18]"><span class="iconify text-sm" data-icon="mdi:plus"></span></button>
                        </div>
                    </div>
                    
                    <!-- Level 2: Khu vực -->
                    <div class="ml-6 mt-1 border-l border-gray-200 pl-2 space-y-1">
                        <?php if(isset($khoData['children'])): foreach($khoData['children'] as $khu): ?>
                            <div class="tree-item">
                                <div class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-gray-100 cursor-pointer group">
                                    <button class="w-5 h-5 flex items-center justify-center text-gray-400 hover:text-gray-700">
                                        <span class="iconify text-sm" data-icon="<?= isset($khu['children']) ? 'mdi:chevron-down' : 'mdi:circle-small' ?>"></span>
                                    </button>
                                    <span class="iconify text-blue-500" data-icon="mdi:view-grid-outline"></span>
                                    <span class="font-medium text-gray-700 text-sm flex-1"><?= $khu['ten'] ?></span>
                                    <div class="opacity-0 group-hover:opacity-100 flex items-center">
                                        <button onclick="openModal('modalThemViTri')" class="w-6 h-6 flex items-center justify-center text-gray-400 hover:text-[#6B0D18]"><span class="iconify text-sm" data-icon="mdi:plus"></span></button>
                                    </div>
                                </div>
                                
                                <!-- Level 3: Kệ -->
                                <?php if(isset($khu['children'])): ?>
                                    <div class="ml-6 mt-1 border-l border-gray-200 pl-2 space-y-1">
                                        <?php foreach($khu['children'] as $ke): ?>
                                            <div class="tree-item">
                                                <div class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-gray-100 cursor-pointer group">
                                                    <button class="w-5 h-5 flex items-center justify-center text-gray-400 hover:text-gray-700">
                                                        <span class="iconify text-sm" data-icon="<?= isset($ke['children']) ? 'mdi:chevron-down' : 'mdi:circle-small' ?>"></span>
                                                    </button>
                                                    <span class="iconify text-emerald-500" data-icon="mdi:bookshelf"></span>
                                                    <span class="text-gray-600 text-sm flex-1"><?= $ke['ten'] ?></span>
                                                    <div class="opacity-0 group-hover:opacity-100 flex items-center">
                                                        <button onclick="openModal('modalThemViTri')" class="w-6 h-6 flex items-center justify-center text-gray-400 hover:text-[#6B0D18]"><span class="iconify text-sm" data-icon="mdi:plus"></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <div class="tree-item">
                <div class="flex items-center gap-2 p-2 rounded-lg hover:bg-white border border-transparent hover:border-gray-200 cursor-pointer group text-gray-500">
                    <button class="w-5 h-5 flex items-center justify-center text-gray-400"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
                    <span class="iconify text-gray-400 text-lg" data-icon="mdi:warehouse"></span>
                    <span class="font-medium text-sm">Kho Tổng</span>
                </div>
            </div>
            <div class="tree-item">
                <div class="flex items-center gap-2 p-2 rounded-lg hover:bg-white border border-transparent hover:border-gray-200 cursor-pointer group text-gray-500">
                    <button class="w-5 h-5 flex items-center justify-center text-gray-400"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
                    <span class="iconify text-gray-400 text-lg" data-icon="mdi:store-outline"></span>
                    <span class="font-medium text-sm">Kho Cửa hàng Q1</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Cột phải: Bảng chi tiết khu vực đang chọn -->
    <div class="w-full lg:w-2/3 p-4 flex flex-col">
        <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-100">
            <div>
                <div class="flex items-center gap-2 text-xs font-medium text-gray-500 mb-1">
                    <span class="iconify text-gray-400" data-icon="mdi:warehouse"></span>
                    <span>Kho Online</span>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Chi tiết khu vực</h3>
            </div>
            <button onclick="openModal('modalThemViTri')" class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2">
                <span class="iconify" data-icon="mdi:plus"></span> Thêm vị trí
            </button>
        </div>
        
        <div class="overflow-x-auto border border-gray-200 rounded-lg flex-1">
            <table class="w-full text-left border-collapse min-w-[700px]">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase text-gray-500">
                        <th class="py-2.5 px-4 font-semibold">Mã vị trí</th>
                        <th class="py-2.5 px-4 font-semibold">Tên vị trí</th>
                        <th class="py-2.5 px-4 font-semibold text-center">Cấp</th>
                        <th class="py-2.5 px-4 font-semibold text-center">Sức chứa</th>
                        <th class="py-2.5 px-4 font-semibold text-center">Trạng thái</th>
                        <th class="py-2.5 px-4 font-semibold text-right"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50/50">
                        <td class="py-2.5 px-4 font-semibold text-[#6B0D18] text-sm">KV-A</td>
                        <td class="py-2.5 px-4 text-sm font-medium text-gray-900">Khu A - Vòng ngọc</td>
                        <td class="py-2.5 px-4 text-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-blue-50 text-blue-700">Khu</span>
                        </td>
                        <td class="py-2.5 px-4 text-center">
                            <div class="w-24 bg-gray-200 rounded-full h-1.5 mx-auto mb-1">
                                <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 45%"></div>
                            </div>
                            <span class="text-[10px] text-gray-500">45/100 vị trí</span>
                        </td>
                        <td class="py-2.5 px-4 text-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-emerald-50 text-emerald-700">Trống</span>
                        </td>
                        <td class="py-2.5 px-4 text-right">
                            <button class="text-gray-400 hover:text-blue-600 mx-1"><span class="iconify" data-icon="mdi:pencil"></span></button>
                            <button class="text-gray-400 hover:text-rose-600 mx-1"><span class="iconify" data-icon="mdi:trash-can"></span></button>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50/50">
                        <td class="py-2.5 px-4 font-semibold text-[#6B0D18] text-sm pl-8 text-gray-500">KE-A1</td>
                        <td class="py-2.5 px-4 text-sm text-gray-700">Kệ A1</td>
                        <td class="py-2.5 px-4 text-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">Kệ</span>
                        </td>
                        <td class="py-2.5 px-4 text-center">
                            <div class="w-24 bg-gray-200 rounded-full h-1.5 mx-auto mb-1">
                                <div class="bg-rose-500 h-1.5 rounded-full" style="width: 95%"></div>
                            </div>
                            <span class="text-[10px] text-gray-500">48/50 vị trí</span>
                        </td>
                        <td class="py-2.5 px-4 text-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-rose-50 text-rose-700">Gần đầy</span>
                        </td>
                        <td class="py-2.5 px-4 text-right">
                            <button class="text-gray-400 hover:text-blue-600 mx-1"><span class="iconify" data-icon="mdi:pencil"></span></button>
                            <button class="text-gray-400 hover:text-rose-600 mx-1"><span class="iconify" data-icon="mdi:trash-can"></span></button>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50/50">
                        <td class="py-2.5 px-4 font-semibold text-[#6B0D18] text-sm pl-8 text-gray-500">KE-A2</td>
                        <td class="py-2.5 px-4 text-sm text-gray-700">Kệ A2</td>
                        <td class="py-2.5 px-4 text-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">Kệ</span>
                        </td>
                        <td class="py-2.5 px-4 text-center">
                            <div class="w-24 bg-gray-200 rounded-full h-1.5 mx-auto mb-1">
                                <div class="bg-gray-400 h-1.5 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="text-[10px] text-gray-500">0/50 vị trí</span>
                        </td>
                        <td class="py-2.5 px-4 text-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-600">Trống</span>
                        </td>
                        <td class="py-2.5 px-4 text-right">
                            <button class="text-gray-400 hover:text-blue-600 mx-1"><span class="iconify" data-icon="mdi:pencil"></span></button>
                            <button class="text-gray-400 hover:text-rose-600 mx-1"><span class="iconify" data-icon="mdi:trash-can"></span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
