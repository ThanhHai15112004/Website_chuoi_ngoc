<div class="divide-y divide-gray-100 bg-white min-h-full">
    <?php if(!empty($notifications)): ?>
        <?php foreach($notifications as $item): ?>
            <!-- Lớp phủ (bg-gray-50) nếu đã đọc, nền trắng nếu chưa đọc -->
            <div class="group relative flex items-start gap-3 sm:gap-4 p-3 sm:p-4 hover:shadow-[0_2px_8px_-2px_rgba(0,0,0,0.1)] hover:z-10 transition-all cursor-pointer border-l-2 <?= $item['da_doc'] ? 'border-transparent bg-white' : 'border-red-600 bg-red-50/20' ?>" onclick="window.location.href='<?= defined('APP_URL') ? APP_URL : '' ?>/admin/notification/chi-tiet/<?= $item['id'] ?>'">
                
                <!-- Checkbox (Ngăn chặn sực kiện click lan ra ngoài để không mở drawer) -->
                <div class="pt-1 shrink-0" onclick="event.stopPropagation()">
                    <label class="flex items-center cursor-pointer">
                        <div class="relative flex items-center">
                            <input type="checkbox" class="msg-checkbox peer sr-only" value="<?= $item['id'] ?>">
                            <div class="w-5 h-5 border-2 border-gray-300 rounded transition-all peer-checked:bg-red-600 peer-checked:border-red-600 group-hover:border-red-400"></div>
                            <span class="iconify absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none" data-icon="mdi:check"></span>
                        </div>
                    </label>
                </div>

                <!-- Icon/Avatar -->
                <div class="shrink-0 pt-0.5 hidden sm:block">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center <?= $item['color_class'] ?>">
                        <span class="iconify text-xl" data-icon="<?= $item['icon'] ?>"></span>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 min-w-0 pr-12">
                    <div class="flex items-center justify-between gap-2 mb-1">
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-bold <?= $item['da_doc'] ? 'text-gray-700' : 'text-gray-900' ?> truncate max-w-[120px] sm:max-w-[200px]">
                                <?= htmlspecialchars($item['nguoi_gui']) ?>
                            </span>
                            <?php if(!$item['da_doc']): ?>
                                <span class="bg-red-100 text-red-600 text-[10px] font-bold px-2 py-0.5 rounded-full">Mới</span>
                            <?php endif; ?>
                        </div>
                        <span class="text-xs <?= $item['da_doc'] ? 'text-gray-400' : 'text-red-600 font-medium' ?> shrink-0 whitespace-nowrap">
                            <?= $item['thoi_gian'] ?>
                        </span>
                    </div>
                    
                    <p class="text-sm <?= $item['da_doc'] ? 'font-medium text-gray-600' : 'font-bold text-gray-900' ?> truncate">
                        <?= htmlspecialchars($item['tieu_de']) ?>
                    </p>
                    <p class="text-sm text-gray-500 line-clamp-1 mt-0.5">
                        <?= htmlspecialchars($item['noi_dung']) ?>
                    </p>
                </div>

                <!-- Hover Actions -->
                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity bg-white/90 backdrop-blur px-2 py-1.5 rounded-lg shadow-sm border border-gray-100" onclick="event.stopPropagation()">
                    <button class="p-1.5 text-gray-400 hover:text-red-600 rounded transition-colors tooltip" title="Xóa" onclick="event.stopPropagation(); deleteItem('<?= $item['id'] ?>')">
                        <span class="iconify text-lg" data-icon="mdi:delete-outline"></span>
                    </button>
                    <?php if(!$item['da_doc']): ?>
                        <button class="p-1.5 text-gray-400 hover:text-blue-600 rounded transition-colors tooltip" title="Đánh dấu đã đọc" onclick="event.stopPropagation(); toggleRead('<?= $item['id'] ?>', 1)">
                            <span class="iconify text-lg" data-icon="mdi:email-open-outline"></span>
                        </button>
                    <?php else: ?>
                        <button class="p-1.5 text-gray-400 hover:text-blue-600 rounded transition-colors tooltip" title="Đánh dấu chưa đọc" onclick="event.stopPropagation(); toggleRead('<?= $item['id'] ?>', 0)">
                            <span class="iconify text-lg" data-icon="mdi:email-outline"></span>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Modal data hidden for JS (Mocking fetch API) -->
            <div id="mockData_<?= $item['id'] ?>" class="hidden" 
                data-tieude="<?= htmlspecialchars($item['tieu_de']) ?>"
                data-nguoigui="<?= htmlspecialchars($item['nguoi_gui']) ?>"
                data-thoigian="<?= $item['thoi_gian'] ?>"
                data-noidung="<?= htmlspecialchars($item['noi_dung']) ?>"
                data-icon="<?= $item['icon'] ?>"
                data-color="<?= $item['color_class'] ?>"
                <?php 
                    $link = $item['link'] ?? '#';
                    if ($link !== '#' && !empty($link) && strpos($link, 'http') !== 0) {
                        $base = defined('APP_URL') ? APP_URL : '';
                        $link = $base . '/' . ltrim($link, '/');
                    }
                ?>
                data-link="<?= htmlspecialchars($link) ?>"
            ></div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="flex flex-col items-center justify-center p-12 text-center min-h-[400px]">
            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center text-gray-300 mb-4">
                <span class="iconify text-4xl" data-icon="mdi:inbox-outline"></span>
            </div>
            <p class="text-gray-500 font-medium">Hộp thư trống</p>
            <p class="text-gray-400 text-sm mt-1">Không có thông báo nào trong danh mục này.</p>
        </div>
    <?php endif; ?>
</div>
