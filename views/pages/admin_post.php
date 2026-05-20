<?php
// views/pages/admin_post.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Quản lý bài viết</h2>
            <p class="text-sm text-gray-500 mt-1">Tạo, chỉnh sửa và quản lý các bài viết kiến thức, tin tức và nội dung phong thủy trên website.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-3 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm hidden md:flex items-center gap-2">
                <span class="iconify" data-icon="mdi:shape-outline"></span>
                Danh mục
            </button>
            <button class="px-3 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm hidden md:flex items-center gap-2">
                <span class="iconify" data-icon="mdi:tag-outline"></span>
                Quản lý Tag
            </button>
            <a href="<?= APP_URL ?>/admin/post/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md shadow-[#6B0D18]/20 flex items-center gap-2">
                <span class="iconify text-lg" data-icon="mdi:plus"></span>
                Thêm bài viết
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-500 mb-2">
                <span class="iconify text-lg" data-icon="mdi:file-document-multiple-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Tổng bài viết</span>
            </div>
            <div class="text-2xl font-bold text-gray-800">128 <span class="text-sm font-normal text-gray-500">bài</span></div>
        </div>

        <div class="bg-emerald-50 p-4 rounded-xl shadow-sm border border-emerald-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-emerald-600 mb-2">
                <span class="iconify text-lg" data-icon="mdi:check-circle-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Đã đăng</span>
            </div>
            <div class="text-2xl font-bold text-emerald-800">96 <span class="text-sm font-normal text-emerald-700/70">bài</span></div>
        </div>

        <div class="bg-gray-50 p-4 rounded-xl shadow-sm border border-gray-200 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-600 mb-2">
                <span class="iconify text-lg" data-icon="mdi:file-edit-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Bản nháp</span>
            </div>
            <div class="text-2xl font-bold text-gray-800">18 <span class="text-sm font-normal text-gray-500">bài</span></div>
        </div>

        <div class="bg-yellow-50 p-4 rounded-xl shadow-sm border border-yellow-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-amber-600 mb-2">
                <span class="iconify text-lg" data-icon="mdi:clock-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Chờ duyệt</span>
            </div>
            <div class="text-2xl font-bold text-amber-700">6 <span class="text-sm font-normal text-amber-600/70">bài</span></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-400 mb-2">
                <span class="iconify text-lg" data-icon="mdi:eye-off-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Đã ẩn</span>
            </div>
            <div class="text-2xl font-bold text-gray-500">8 <span class="text-sm font-normal text-gray-400">bài</span></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-[#6B0D18] mb-2">
                <span class="iconify text-lg" data-icon="mdi:eye-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Tổng lượt xem</span>
            </div>
            <div class="text-2xl font-bold text-[#6B0D18]">45.8K <span class="text-sm font-normal text-gray-500">lượt</span></div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        
        <!-- Tabs Trạng thái -->
        <div class="flex space-x-1 border-b border-gray-100 overflow-x-auto hide-scrollbar pb-1">
            <button class="tab-btn px-4 py-2 bg-[#6B0D18] text-white rounded-t-lg font-medium text-sm whitespace-nowrap transition-colors">Tất cả (128)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Đã đăng (96)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Bản nháp (18)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Chờ duyệt (6)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Đã ẩn (8)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-amber-600 hover:text-amber-800 font-medium text-sm whitespace-nowrap transition-colors relative">Cần tối ưu SEO <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-amber-500"></span></button>
        </div>

        <!-- Search & Filters -->
        <div class="flex flex-col lg:flex-row gap-3 pt-2">
            <div class="relative flex-1">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm theo tiêu đề, tác giả, tag, danh mục..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
            </div>
            
            <div class="flex flex-wrap gap-2">
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Danh mục</option>
                    <option value="kt">Kiến thức phong thủy</option>
                    <option value="cv">Chọn vòng theo mệnh</option>
                    <option value="yn">Ý nghĩa đá / ngọc</option>
                </select>

                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">SEO</option>
                    <option value="good">Đã tối ưu SEO</option>
                    <option value="missing">Thiếu Meta/Ảnh</option>
                </select>

                <button class="px-3 py-2 bg-gray-50 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:filter-variant"></span>
                    Bộ lọc
                </button>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Bulk Actions -->
        <div class="p-3 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
            <span class="text-sm text-gray-500 px-2 border-r border-gray-300">Đã chọn: <strong class="text-gray-800">0</strong></span>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-sm font-medium disabled:opacity-50" disabled>Đăng bài</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-sm font-medium disabled:opacity-50" disabled>Ẩn bài</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Xóa</button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-[11px] font-semibold sticky top-0 z-10 tracking-wider">
                    <tr>
                        <th class="px-4 py-3 w-10">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </th>
                        <th class="px-4 py-3">Bài viết</th>
                        <th class="px-4 py-3">Danh mục & Tag</th>
                        <th class="px-4 py-3 text-center">Tương tác</th>
                        <th class="px-4 py-3">Trạng thái & SEO</th>
                        <th class="px-4 py-3">Thời gian & Tác giả</th>
                        <th class="px-4 py-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <!-- Bài 1: Đã đăng, SEO Tốt -->
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top max-w-[280px]">
                            <div class="flex gap-3">
                                <div class="w-[72px] h-[48px] bg-gray-200 rounded-[10px] overflow-hidden shrink-0">
                                    <img src="https://images.unsplash.com/photo-1611080352516-724bbba96ee7?w=150&q=80" alt="thumbnail" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0 cursor-pointer" onclick="openPostDrawer(1)">
                                    <div class="font-bold text-gray-900 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors text-sm leading-tight">
                                        Cách chọn vòng phong thủy theo mệnh chuẩn và dễ hiểu
                                    </div>
                                    <div class="text-[11px] text-gray-400 mt-1 truncate">/cach-chon-vong-phong-thuy-theo-menh</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-medium bg-red-50 text-[#6B0D18] border border-red-100 mb-2">Chọn vòng theo mệnh</span>
                            <div class="flex flex-wrap gap-1">
                                <span class="inline-flex px-1.5 py-0.5 rounded-full bg-gray-100 text-gray-600 text-[10px]">Mệnh Hỏa</span>
                                <span class="inline-flex px-1.5 py-0.5 rounded-full bg-gray-100 text-gray-600 text-[10px]">Ngọc bích</span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top text-center">
                            <div class="flex flex-col gap-1.5 items-center">
                                <div class="flex items-center gap-1 font-bold text-[#6B0D18]" title="Lượt xem">
                                    <span class="iconify text-sm" data-icon="mdi:eye"></span> 1.2K
                                </div>
                                <div class="flex items-center gap-1 text-gray-600 text-xs" title="Bình luận">
                                    <span class="iconify text-sm" data-icon="mdi:comment-text-outline"></span> 12
                                </div>
                                <a href="#" class="text-[10px] text-blue-600 hover:underline flex items-center gap-0.5 mt-1">
                                    <span class="iconify" data-icon="mdi:link-variant"></span> 4 SP liên quan
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-2 items-start">
                                <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-emerald-50 text-emerald-700">Đã đăng</span>
                                <span class="inline-flex px-1.5 py-0.5 rounded border border-emerald-200 text-[10px] font-medium bg-white text-emerald-600 flex items-center gap-1">
                                    <span class="iconify" data-icon="mdi:check-circle"></span> SEO Tốt
                                </span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-800 mb-0.5">17/05/2026</div>
                            <div class="text-[10px] text-gray-400 mb-2">Cập nhật: 18/05</div>
                            <div class="flex items-center gap-1.5">
                                <div class="w-4 h-4 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-[8px]">HA</div>
                                <span class="text-xs font-medium text-gray-700">Hải Admin</span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-1">
                                <a href="<?= APP_URL ?>/admin/post/sua" class="px-2.5 py-1.5 bg-white border border-gray-200 text-[#6B0D18] rounded-md hover:bg-red-50 transition-colors text-xs font-medium">Sửa</a>
                                <button class="p-1.5 text-gray-400 hover:text-gray-700 hover:bg-gray-100 rounded transition-colors" onclick="toggleRowMenu(this)">
                                    <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                </button>
                                <!-- Menu -->
                                <div class="absolute right-0 top-10 mt-1 w-40 bg-white rounded-md shadow-lg border border-gray-100 hidden z-20 row-menu">
                                    <div class="py-1">
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="openPostDrawer(1)"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem trước</a>
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"><span class="iconify text-gray-400" data-icon="mdi:content-copy"></span> Nhân bản</a>
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="openHideModal()"><span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn bài viết</a>
                                        <hr class="my-1 border-gray-100">
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50" onclick="openDeleteModal()"><span class="iconify text-red-400" data-icon="mdi:trash-can-outline"></span> Xóa bài</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Bài 2: Bản nháp, Thiếu SEO -->
                    <tr class="hover:bg-gray-50/80 transition-colors group bg-gray-50/30">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top max-w-[280px]">
                            <div class="flex gap-3">
                                <div class="w-[72px] h-[48px] bg-gray-100 border border-gray-200 border-dashed rounded-[10px] flex items-center justify-center shrink-0">
                                    <span class="iconify text-gray-300 text-xl" data-icon="mdi:image-outline"></span>
                                </div>
                                <div class="flex-1 min-w-0 cursor-pointer">
                                    <div class="font-bold text-gray-900 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors text-sm leading-tight">
                                        Bí quyết bảo quản vòng đá thạch anh luôn sáng bóng
                                    </div>
                                    <div class="text-[11px] text-gray-400 mt-1 truncate">/bao-quan-vong-da</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-600 mb-2">Hướng dẫn bảo quản</span>
                        </td>
                        <td class="px-4 py-4 align-top text-center">
                            <div class="text-gray-400 text-xs">-</div>
                            <span class="inline-flex px-1.5 py-0.5 rounded-full bg-yellow-50 text-amber-600 text-[10px] mt-2 border border-amber-100">Chưa gắn SP</span>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-2 items-start">
                                <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">Bản nháp</span>
                                <span class="inline-flex px-1.5 py-0.5 rounded border border-red-200 text-[10px] font-medium bg-red-50 text-red-600 flex items-center gap-1" title="Thiếu ảnh đại diện, meta description">
                                    <span class="iconify" data-icon="mdi:alert-circle-outline"></span> Thiếu thông tin
                                </span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-800 mb-2">Hôm nay</div>
                            <div class="flex items-center gap-1.5">
                                <div class="w-4 h-4 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold text-[8px]">NV</div>
                                <span class="text-xs text-gray-600">Nhân viên nội dung</span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-1">
                                <a href="#" class="px-2.5 py-1.5 bg-white border border-gray-200 text-[#6B0D18] rounded-md hover:bg-red-50 transition-colors text-xs font-medium">Sửa</a>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-white">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-800">1</span> - <span class="font-medium text-gray-800">2</span> trong <span class="font-medium text-gray-800">128</span> bài viết
            </div>
            <div class="flex items-center gap-1">
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-sm font-medium shadow-sm">1</button>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">2</button>
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
            </div>
        </div>
    </div>
</div>

<!-- ================== OVERLAYS & MODALS ================== -->
<div id="modalOverlay" class="fixed inset-0 bg-black/50 z-40 hidden opacity-0 transition-opacity duration-300" onclick="closeAll()"></div>

<!-- Drawer Xem Nhanh -->
<div id="postDrawer" class="fixed top-0 right-0 h-full w-[700px] max-w-full bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-white sticky top-0 z-10">
        <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:text-box-search-outline"></span> Xem trước bài viết
        </h3>
        <button onclick="closePostDrawer()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
    </div>
    
    <div class="flex-1 overflow-y-auto bg-gray-50 p-6">
        <!-- Card preview như bên ngoài web -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden max-w-[600px] mx-auto">
            <div class="h-64 w-full bg-gray-200">
                <img src="https://images.unsplash.com/photo-1611080352516-724bbba96ee7?w=800&q=80" alt="Thumbnail" class="w-full h-full object-cover">
            </div>
            <div class="p-8">
                <div class="flex items-center gap-3 mb-4">
                    <span class="inline-flex px-2 py-1 rounded text-[11px] font-bold uppercase tracking-wider bg-red-50 text-[#6B0D18]">Chọn vòng theo mệnh</span>
                    <span class="text-xs text-gray-400">17 Tháng 5, 2026</span>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4 leading-tight font-luxury">Cách chọn vòng phong thủy theo mệnh chuẩn và dễ hiểu</h1>
                <div class="flex gap-2 mb-6 border-b border-gray-100 pb-6">
                    <span class="text-xs text-gray-500 flex items-center gap-1"><span class="iconify" data-icon="mdi:eye"></span> 1.248 lượt xem</span>
                    <span class="text-xs text-gray-500 flex items-center gap-1"><span class="iconify" data-icon="mdi:account-edit"></span> Hải Admin</span>
                </div>
                
                <div class="prose prose-sm max-w-none text-gray-700 space-y-4">
                    <p class="font-medium">Việc chọn vòng phong thủy không chỉ dựa vào sở thích mà còn cần tuân theo ngũ hành tương sinh tương khắc. Bài viết này sẽ hướng dẫn bạn cách chọn màu sắc vòng đá phù hợp nhất.</p>
                    <h3>1. Người mệnh Kim</h3>
                    <p>Mệnh Kim hợp với các màu tương sinh thuộc Thổ (Vàng, Nâu đất) và màu tương hợp (Trắng, Xám, Ghi). Không nên chọn màu thuộc Hỏa (Đỏ, Hồng, Tím).</p>
                    <!-- Khối sản phẩm gợi ý -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 my-4 flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1599643478514-4a820cbf311c?w=100&h=100&fit=crop" class="w-16 h-16 rounded-md object-cover">
                        <div>
                            <div class="font-bold text-gray-800 text-sm">Vòng ngọc bích tự nhiên Mix Tỳ hưu</div>
                            <div class="text-[#6B0D18] font-bold text-sm mt-1">1.250.000đ</div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 pt-4 border-t border-gray-100 flex flex-wrap gap-2">
                    <span class="text-xs font-medium text-gray-500 mt-1 mr-2">Tags:</span>
                    <span class="inline-flex px-2 py-1 rounded bg-gray-100 text-gray-600 text-xs">Mệnh Kim</span>
                    <span class="inline-flex px-2 py-1 rounded bg-gray-100 text-gray-600 text-xs">Ngọc bích</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="px-6 py-4 bg-white border-t border-gray-100 flex justify-between gap-3 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
        <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-1">
            <span class="iconify" data-icon="mdi:web"></span> Xem trên website
        </button>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-white border border-amber-200 text-amber-600 rounded-lg hover:bg-amber-50 transition-colors font-medium text-sm" onclick="openHideModal()">Ẩn bài</button>
            <a href="<?= APP_URL ?>/admin/post/sua" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md">Chỉnh sửa</a>
        </div>
    </div>
</div>

<!-- Modal Ẩn Bài -->
<div id="hideModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[400px] transform scale-95 transition-transform duration-300 p-6 text-center">
        <div class="w-16 h-16 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl" data-icon="mdi:eye-off-outline"></span>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Ẩn bài viết này?</h3>
        <p class="text-gray-500 text-sm mb-6">Bài viết sẽ không còn hiển thị ở trang người dùng, nhưng vẫn được lưu trong hệ thống quản trị.</p>
        <div class="flex gap-3 w-full">
            <button onclick="closeHideModal()" class="flex-1 px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm">Hủy</button>
            <button onclick="closeHideModal(); showToast('Đã ẩn bài viết.')" class="flex-1 px-4 py-2.5 bg-amber-500 text-white rounded-lg hover:bg-amber-600 font-medium text-sm shadow-md">Xác nhận ẩn</button>
        </div>
    </div>
</div>

<!-- Modal Xóa Bài -->
<div id="deleteModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[400px] transform scale-95 transition-transform duration-300 p-6 text-center">
        <div class="w-16 h-16 rounded-full bg-red-100 text-red-600 flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl" data-icon="mdi:trash-can-outline"></span>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Xóa bài viết?</h3>
        <p class="text-gray-500 text-sm mb-4">Bạn có chắc muốn xóa vĩnh viễn bài viết này không?</p>
        <div class="bg-amber-50 p-3 rounded-lg border border-amber-100 mb-6 text-xs text-amber-700 text-left">
            <span class="font-bold">Lưu ý:</span> Bài viết này đã có lượt xem và bình luận. Việc xóa sẽ làm mất dữ liệu. Bạn nên <strong>Ẩn bài viết</strong> thay vì xóa.
        </div>
        <div class="flex gap-3 w-full">
            <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm">Hủy</button>
            <button onclick="closeDeleteModal(); showToast('Đã xóa bài viết.')" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 font-medium text-sm shadow-md">Xóa vĩnh viễn</button>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="toastMsg" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70] pointer-events-none">
    <div class="text-emerald-500 mt-0.5"><span class="iconify text-xl" data-icon="mdi:check-circle"></span></div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toast-text">Thao tác thành công.</p>
    </div>
</div>

<script>
    function toggleRowMenu(btn) {
        document.querySelectorAll('.row-menu').forEach(menu => {
            if(menu !== btn.nextElementSibling) menu.classList.add('hidden');
        });
        btn.nextElementSibling.classList.toggle('hidden');
    }
    
    document.addEventListener('click', (e) => {
        if(!e.target.closest('td')) {
            document.querySelectorAll('.row-menu').forEach(menu => menu.classList.add('hidden'));
        }
    });

    const overlay = document.getElementById('modalOverlay');
    const postDrawer = document.getElementById('postDrawer');
    const hideModal = document.getElementById('hideModal');
    const deleteModal = document.getElementById('deleteModal');

    function openPostDrawer() {
        overlay.classList.remove('hidden');
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
            postDrawer.classList.remove('translate-x-full');
        }, 10);
    }
    
    function closePostDrawer() {
        postDrawer.classList.add('translate-x-full');
        closeOverlay();
    }

    function openHideModal() {
        overlay.classList.remove('hidden');
        hideModal.classList.remove('hidden');
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
            hideModal.classList.remove('opacity-0');
            hideModal.firstElementChild.classList.remove('scale-95');
        }, 10);
    }

    function closeHideModal() {
        hideModal.classList.add('opacity-0');
        hideModal.firstElementChild.classList.add('scale-95');
        setTimeout(() => hideModal.classList.add('hidden'), 300);
        closeOverlayIfNoModals();
    }

    function openDeleteModal() {
        overlay.classList.remove('hidden');
        deleteModal.classList.remove('hidden');
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
            deleteModal.classList.remove('opacity-0');
            deleteModal.firstElementChild.classList.remove('scale-95');
        }, 10);
    }

    function closeDeleteModal() {
        deleteModal.classList.add('opacity-0');
        deleteModal.firstElementChild.classList.add('scale-95');
        setTimeout(() => deleteModal.classList.add('hidden'), 300);
        closeOverlayIfNoModals();
    }

    function closeOverlay() {
        overlay.classList.add('opacity-0');
        setTimeout(() => overlay.classList.add('hidden'), 300);
    }

    function closeOverlayIfNoModals() {
        if (postDrawer.classList.contains('translate-x-full')) {
            closeOverlay();
        }
    }

    function closeAll() {
        closePostDrawer();
        closeHideModal();
        closeDeleteModal();
    }

    function showToast(text) {
        const toast = document.getElementById('toastMsg');
        document.getElementById('toast-text').textContent = text;
        toast.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => toast.classList.add('translate-y-20', 'opacity-0'), 3000);
    }
</script>
