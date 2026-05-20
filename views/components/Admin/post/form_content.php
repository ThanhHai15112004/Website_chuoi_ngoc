        <!-- CỘT TRÁI (Nội dung chính) -->
        <div class="flex-1 space-y-6">
            <!-- Thông tin cơ bản -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề bài viết <span class="text-red-500">*</span></label>
                    <input type="text" placeholder="Ví dụ: Cách chọn vòng phong thủy theo mệnh chuẩn và dễ hiểu" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-colors text-lg font-bold text-gray-800" value="<?= $is_edit ? 'Cách chọn vòng phong thủy theo mệnh chuẩn và dễ hiểu' : '' ?>">
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="block text-sm font-medium text-gray-700">Slug đường dẫn</label>
                        <button class="text-xs text-blue-600 hover:underline">Chỉnh sửa slug</button>
                    </div>
                    <div class="flex items-center">
                        <span class="px-3 py-2 bg-gray-50 border border-gray-300 border-r-0 rounded-l-lg text-sm text-gray-500">/bai-viet/</span>
                        <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-r-lg text-sm focus:outline-none focus:border-[#6B0D18] bg-gray-50 text-gray-500" value="<?= $is_edit ? 'cach-chon-vong-phong-thuy-theo-menh' : '' ?>" readonly>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="block text-sm font-medium text-gray-700">Mô tả ngắn</label>
                        <span class="text-xs text-gray-400">0 / 180</span>
                    </div>
                    <textarea rows="3" placeholder="Nhập đoạn tóm tắt ngắn hiển thị ở trang danh sách bài viết..." class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] transition-colors resize-none"><?= $is_edit ? 'Việc chọn vòng phong thủy không chỉ dựa vào sở thích mà còn cần tuân theo ngũ hành tương sinh tương khắc. Bài viết này sẽ hướng dẫn bạn cách chọn màu sắc vòng đá phù hợp nhất.' : '' ?></textarea>
                </div>
            </div>

            <!-- Trình soạn thảo (Mockup) -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-[600px]">
                <!-- Toolbar -->
                <div class="p-2 border-b border-gray-200 bg-gray-50 flex flex-wrap items-center gap-1">
                    <select class="px-2 py-1.5 border border-gray-300 rounded text-sm bg-white focus:outline-none">
                        <option>Đoạn văn (P)</option>
                        <option>Tiêu đề 2 (H2)</option>
                        <option>Tiêu đề 3 (H3)</option>
                        <option>Tiêu đề 4 (H4)</option>
                    </select>
                    <div class="w-px h-5 bg-gray-300 mx-1"></div>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-gray-700 transition-colors"><span class="iconify" data-icon="mdi:format-bold"></span></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-gray-700 transition-colors"><span class="iconify" data-icon="mdi:format-italic"></span></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-gray-700 transition-colors"><span class="iconify" data-icon="mdi:format-underline"></span></button>
                    <div class="w-px h-5 bg-gray-300 mx-1"></div>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-gray-700 transition-colors"><span class="iconify" data-icon="mdi:format-list-bulleted"></span></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-gray-700 transition-colors"><span class="iconify" data-icon="mdi:format-list-numbered"></span></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-gray-700 transition-colors"><span class="iconify" data-icon="mdi:format-quote-close"></span></button>
                    <div class="w-px h-5 bg-gray-300 mx-1"></div>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-blue-600 transition-colors" title="Chèn link"><span class="iconify" data-icon="mdi:link-variant"></span></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-emerald-600 transition-colors" title="Chèn ảnh"><span class="iconify" data-icon="mdi:image-outline"></span></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-[#6B0D18] transition-colors" title="Chèn sản phẩm liên quan"><span class="iconify" data-icon="mdi:shopping-outline"></span></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-amber-600 transition-colors" title="Chèn khối lưu ý"><span class="iconify" data-icon="mdi:alert-circle-outline"></span></button>
                </div>
                
                <!-- Editor Area -->
                <div class="flex-1 p-6 overflow-y-auto" contenteditable="true" style="outline:none;">
                    <?php if ($is_edit): ?>
                        <h2 class="text-2xl font-bold mb-4">1. Người mệnh Kim</h2>
                        <p class="mb-4">Mệnh Kim hợp với các màu tương sinh thuộc Thổ (Vàng, Nâu đất) và màu tương hợp (Trắng, Xám, Ghi). Không nên chọn màu thuộc Hỏa (Đỏ, Hồng, Tím).</p>
                        
                        <!-- Mockup block sản phẩm trong nội dung -->
                        <div contenteditable="false" class="bg-gray-50 border border-gray-200 rounded-lg p-3 my-4 flex items-center gap-4 relative group cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1599643478514-4a820cbf311c?w=100&h=100&fit=crop" class="w-16 h-16 rounded object-cover">
                            <div>
                                <div class="font-bold text-gray-800">Vòng ngọc bích tự nhiên Mix Tỳ hưu</div>
                                <div class="text-[#6B0D18] font-medium text-sm">1.250.000đ</div>
                            </div>
                            <button class="absolute top-2 right-2 p-1 bg-white border border-gray-200 rounded shadow-sm opacity-0 group-hover:opacity-100 text-red-500 hover:bg-red-50 transition-all"><span class="iconify" data-icon="mdi:trash-can-outline"></span></button>
                        </div>

                        <blockquote class="border-l-4 border-amber-400 bg-amber-50 p-4 rounded-r-lg my-4 italic text-amber-800">
                            <strong>Lưu ý:</strong> Các gợi ý phong thủy chỉ mang tính tham khảo, quan trọng nhất vẫn là cảm giác bình an của chính bạn khi đeo vòng.
                        </blockquote>
                    <?php else: ?>
                        <p class="text-gray-400">Bắt đầu viết nội dung bài viết tại đây...</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- CỘT PHẢI (Cài đặt) -->
        <div class="w-full lg:w-[320px] xl:w-[360px] space-y-6">
            
            <!-- Trạng thái & Lịch đăng -->
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100">Xuất bản</h3>
                
                <div class="space-y-3 mb-4">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="radio" name="publish_type" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                        <span class="text-sm text-gray-700 group-hover:text-[#6B0D18] transition-colors">Đăng ngay</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="radio" name="publish_type" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                        <span class="text-sm text-gray-700 group-hover:text-[#6B0D18] transition-colors">Lên lịch đăng</span>
                    </label>
                </div>
                
                <div class="space-y-3 bg-gray-50 p-3 rounded-lg border border-gray-200 hidden" id="scheduleBox">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Ngày đăng</label>
                        <input type="date" class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-[#6B0D18]">
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Giờ đăng</label>
                        <input type="time" class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-[#6B0D18]">
                    </div>
                </div>
            </div>

            <!-- Ảnh đại diện -->
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100">Ảnh đại diện <span class="text-red-500">*</span></h3>
                
                <?php if ($is_edit): ?>
                    <div class="relative group rounded-lg overflow-hidden border border-gray-200 aspect-video mb-3">
                        <img src="https://images.unsplash.com/photo-1611080352516-724bbba96ee7?w=600&q=80" alt="Thumbnail" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <button class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-gray-700 hover:text-[#6B0D18] hover:scale-110 transition-all"><span class="iconify" data-icon="mdi:pencil"></span></button>
                            <button class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-gray-700 hover:text-red-600 hover:scale-110 transition-all"><span class="iconify" data-icon="mdi:trash-can-outline"></span></button>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg aspect-video flex flex-col items-center justify-center text-gray-400 hover:text-[#6B0D18] hover:border-[#6B0D18] hover:bg-red-50/30 transition-all cursor-pointer mb-3">
                        <span class="iconify text-3xl mb-1" data-icon="mdi:cloud-upload-outline"></span>
                        <span class="text-sm font-medium">Tải ảnh lên</span>
                    </div>
                    <div class="bg-amber-50 text-amber-700 text-[11px] p-2 rounded flex items-start gap-1.5">
                        <span class="iconify text-sm shrink-0" data-icon="mdi:alert-circle-outline"></span>
                        <span>Bài viết nên có ảnh đại diện để hiển thị tốt trên danh sách và chia sẻ Facebook.</span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Danh mục & Tag -->
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100">Phân loại</h3>
                
                <div class="mb-5">
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-sm font-medium text-gray-700">Danh mục <span class="text-red-500">*</span></label>
                        <button class="text-xs text-[#6B0D18] font-medium hover:underline">+ Thêm mới</button>
                    </div>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        <option value="">Chọn danh mục</option>
                        <option value="1" <?= $is_edit ? 'selected' : '' ?>>Kiến thức phong thủy</option>
                        <option value="2">Chọn vòng theo mệnh</option>
                        <option value="3">Ý nghĩa đá / ngọc</option>
                        <option value="4">Hướng dẫn bảo quản</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Tags</label>
                    <div class="border border-gray-300 rounded-lg p-2 focus-within:border-[#6B0D18] transition-colors flex flex-wrap gap-1 items-center bg-white">
                        <?php if($is_edit): ?>
                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-gray-100 border border-gray-200 rounded text-xs text-gray-700">
                                Mệnh Kim <button class="hover:text-red-500"><span class="iconify" data-icon="mdi:close"></span></button>
                            </span>
                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-gray-100 border border-gray-200 rounded text-xs text-gray-700">
                                Ngọc bích <button class="hover:text-red-500"><span class="iconify" data-icon="mdi:close"></span></button>
                            </span>
                        <?php endif; ?>
                        <input type="text" placeholder="Nhập tag..." class="flex-1 min-w-[80px] bg-transparent text-sm focus:outline-none px-1 py-0.5">
                    </div>
                    <div class="text-[11px] text-gray-400 mt-1">Gợi ý: Vòng phong thủy, Thạch anh...</div>
                </div>
            </div>

            <!-- Gắn sản phẩm -->
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100">
                    <h3 class="font-bold text-gray-800">Sản phẩm liên quan</h3>
                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded-full font-bold">2</span>
                </div>
                
                <div class="relative mb-3">
                    <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" data-icon="mdi:magnify"></span>
                    <input type="text" placeholder="Tìm sản phẩm để gắn..." class="w-full pl-9 pr-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                </div>

                <!-- Danh sách đã chọn -->
                <div class="space-y-2">
                    <div class="flex items-center gap-3 p-2 bg-gray-50 border border-gray-200 rounded-lg relative group cursor-move">
                        <span class="iconify text-gray-400 cursor-move" data-icon="mdi:drag"></span>
                        <img src="https://images.unsplash.com/photo-1599643478514-4a820cbf311c?w=100&h=100&fit=crop" class="w-10 h-10 rounded object-cover">
                        <div class="flex-1 min-w-0">
                            <div class="text-xs font-bold text-gray-800 truncate">Vòng ngọc bích Tỳ Hưu</div>
                            <div class="text-[10px] text-[#6B0D18] font-bold">1.250.000đ</div>
                        </div>
                        <button class="text-gray-400 hover:text-red-500 transition-colors p-1"><span class="iconify" data-icon="mdi:close"></span></button>
                    </div>

                    <div class="flex items-center gap-3 p-2 bg-gray-50 border border-gray-200 rounded-lg relative group cursor-move">
                        <span class="iconify text-gray-400 cursor-move" data-icon="mdi:drag"></span>
                        <img src="https://images.unsplash.com/photo-1611080352516-724bbba96ee7?w=100&h=100&fit=crop" class="w-10 h-10 rounded object-cover">
                        <div class="flex-1 min-w-0">
                            <div class="text-xs font-bold text-gray-800 truncate">Chuỗi Thạch Anh Tóc Vàng</div>
                            <div class="text-[10px] text-[#6B0D18] font-bold">850.000đ</div>
                        </div>
                        <button class="text-gray-400 hover:text-red-500 transition-colors p-1"><span class="iconify" data-icon="mdi:close"></span></button>
                    </div>
                </div>
            </div>

            <!-- SEO -->
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100">
                    <h3 class="font-bold text-gray-800">Tối ưu SEO</h3>
                    <?php if ($is_edit): ?>
                        <span class="inline-flex px-1.5 py-0.5 rounded border border-emerald-200 text-[10px] font-medium bg-emerald-50 text-emerald-600 flex items-center gap-1">
                            <span class="iconify" data-icon="mdi:check-circle"></span> Tốt
                        </span>
                    <?php else: ?>
                        <span class="inline-flex px-1.5 py-0.5 rounded border border-red-200 text-[10px] font-medium bg-red-50 text-red-600 flex items-center gap-1">
                            <span class="iconify" data-icon="mdi:alert-circle-outline"></span> Thiếu
                        </span>
                    <?php endif; ?>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Thẻ Meta Title</label>
                        <input type="text" placeholder="Nhập tiêu đề SEO..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]" value="<?= $is_edit ? 'Cách chọn vòng phong thủy theo mệnh | Chuỗi Ngọc' : '' ?>">
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label class="block text-xs font-medium text-gray-700">Meta Description</label>
                            <span class="text-[10px] text-gray-400">120/160</span>
                        </div>
                        <textarea rows="3" placeholder="Nhập mô tả SEO (150-160 ký tự)..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"><?= $is_edit ? 'Việc chọn vòng phong thủy không chỉ dựa vào sở thích mà còn cần tuân theo ngũ hành tương sinh tương khắc.' : '' ?></textarea>
                    </div>

                    <!-- SEO Preview -->
                    <div class="bg-gray-50 border border-gray-200 rounded p-3">
                        <div class="text-xs text-gray-400 mb-1">Preview kết quả Google:</div>
                        <div class="text-[13px] text-blue-800 font-medium truncate cursor-pointer hover:underline">
                            Cách chọn vòng phong thủy theo mệnh | Chuỗi Ngọc
                        </div>
                        <div class="text-[11px] text-emerald-700 mt-0.5 truncate">
                            chuoi-ngoc.com/bai-viet/cach-chon-vong-phong-thuy-theo-menh
                        </div>
                        <div class="text-xs text-gray-600 mt-1 line-clamp-2">
                            Việc chọn vòng phong thủy không chỉ dựa vào sở thích mà còn cần tuân theo ngũ hành tương sinh tương khắc...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

