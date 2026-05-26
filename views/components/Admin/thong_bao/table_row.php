                    
                    <!-- Dòng 1: Quan trọng chưa đọc (Đơn hàng) -->
                    <tr class="hover:bg-gray-50/80 transition-colors group bg-red-50/20">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-teal-100 text-teal-600 mb-1" title="Đơn hàng">
                                <span class="iconify text-lg" data-icon="mdi:shopping-outline"></span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top cursor-pointer" onclick="openNotificationDrawer(1)">
                            <div class="font-bold text-gray-900 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors">
                                Đơn hàng #DH202600123 đã được xác nhận
                            </div>
                            <span class="inline-flex mt-1 px-1.5 py-0.5 rounded text-[10px] font-medium bg-red-100 text-red-700 border border-red-200">Quan trọng</span>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Nguyễn Văn A</div>
                            <div class="text-xs text-gray-500">KH000123</div>
                        </td>
                        <td class="px-4 py-4 align-top whitespace-normal">
                            <div class="text-gray-600 line-clamp-2 text-xs">
                                Cửa hàng đã xác nhận đơn hàng của bạn và đang chuẩn bị sản phẩm để giao cho đơn vị vận chuyển.
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-emerald-50 text-emerald-700">Đã gửi</span>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-amber-50 text-amber-700">Chưa đọc</span>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Hệ thống</div>
                            <div class="text-xs text-gray-500">Tự động</div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-800 font-medium">10:30 Hôm nay</div>
                            <div class="text-[10px] text-gray-500">Tạo lúc 10:29</div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-[#6B0D18] rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-xs font-medium" onclick="openNotificationDrawer(1)">Xem</button>
                        </td>
                    </tr>

                    <!-- Dòng 2: Voucher gửi nhóm -->
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 mb-1" title="Voucher">
                                <span class="iconify text-lg" data-icon="mdi:ticket-percent-outline"></span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top cursor-pointer" onclick="openNotificationDrawer(2)">
                            <div class="font-medium text-gray-700 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors">
                                Voucher GOLD5 dành riêng cho bạn tháng này
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Nhóm Gold</div>
                            <div class="text-xs text-gray-500">520 khách</div>
                        </td>
                        <td class="px-4 py-4 align-top whitespace-normal">
                            <div class="text-gray-500 line-clamp-2 text-xs">
                                Chào bạn, shop xin tặng bạn mã giảm giá 5% cho mọi đơn hàng vòng ngọc...
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-emerald-50 text-emerald-700">Đã gửi</span>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs font-medium text-gray-800 mb-1">320 / 520 <span class="text-gray-400 font-normal">đã đọc</span></div>
                            <div class="w-full bg-gray-100 rounded-full h-1.5">
                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 61%"></div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Hải Admin</div>
                            <div class="text-xs text-gray-500">Quản trị viên</div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-600">18/05/2026 09:00</div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-xs font-medium" onclick="openNotificationDrawer(2)">Xem</button>
                                <button class="p-1.5 text-gray-400 hover:text-gray-700 hover:bg-gray-100 rounded transition-colors" onclick="toggleRowMenu(this)">
                                    <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                </button>
                                <!-- Row Dropdown -->
                                <div class="absolute right-0 top-10 mt-1 w-40 bg-white rounded-md shadow-lg border border-gray-100 hidden z-20 row-menu">
                                    <div class="py-1">
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"><span class="iconify text-gray-400" data-icon="mdi:refresh"></span> Gửi lại</a>
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"><span class="iconify text-gray-400" data-icon="mdi:archive-outline"></span> Lưu trữ</a>
                                        <hr class="my-1 border-gray-100">
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50"><span class="iconify text-red-400" data-icon="mdi:trash-can-outline"></span> Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Dòng 3: Gửi thất bại -->
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-red-100 text-red-600 mb-1" title="Khuyến mãi">
                                <span class="iconify text-lg" data-icon="mdi:sale"></span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top cursor-pointer">
                            <div class="font-medium text-gray-700 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors">
                                Flash Sale Vòng Ngọc bắt đầu lúc 20:00
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Tất cả KH</div>
                            <div class="text-xs text-gray-500">2.500 khách</div>
                        </td>
                        <td class="px-4 py-4 align-top whitespace-normal">
                            <div class="text-gray-500 line-clamp-2 text-xs">
                                Đừng bỏ lỡ cơ hội sở hữu vòng ngọc quý với giá ưu đãi lớn nhất năm...
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-red-50 text-red-600 border border-red-100">Gửi thất bại (15)</span>
                        </td>
                        <td class="px-4 py-4 align-top text-gray-400 text-xs">
                            Không khả dụng
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Hải Admin</div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-600">17/05/2026 19:00</div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <button class="px-3 py-1.5 bg-red-50 border border-red-200 text-red-600 rounded-md hover:bg-red-100 transition-colors text-xs font-medium flex items-center gap-1" onclick="openResendModal()">Gửi lại lỗi</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Dòng 4: Đang lên lịch -->
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 mb-1" title="Tin nhắn">
                                <span class="iconify text-lg" data-icon="mdi:message-text-outline"></span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top cursor-pointer">
                            <div class="font-medium text-gray-700 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors">
                                Chúc mừng sinh nhật tháng 5
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Khách sinh tháng 5</div>
                            <div class="text-xs text-gray-500">120 khách</div>
                        </td>
                        <td class="px-4 py-4 align-top whitespace-normal">
                            <div class="text-gray-500 line-clamp-2 text-xs">
                                Shop tặng bạn mã voucher giảm 10% cho tháng sinh nhật...
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Đang lên lịch</span>
                        </td>
                        <td class="px-4 py-4 align-top text-gray-400 text-xs">
                            -
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Hải Admin</div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-[10px] text-gray-500">Lịch gửi:</div>
                            <div class="text-xs text-blue-700 font-medium">21/05/2026 08:00</div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-xs font-medium">Sửa</button>
                            </div>
                        </td>
                    </tr>

                     <!-- Dòng 5: Cảnh báo nội bộ -->
                     <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 text-gray-600 mb-1" title="Cảnh báo">
                                <span class="iconify text-lg" data-icon="mdi:shield-alert-outline"></span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top cursor-pointer">
                            <div class="font-bold text-gray-800 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors">
                                Có 5 đơn hàng đang chờ xác nhận quá 24h
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Nội bộ Admin</div>
                        </td>
                        <td class="px-4 py-4 align-top whitespace-normal">
                            <div class="text-gray-500 line-clamp-2 text-xs">
                                Hệ thống phát hiện 5 đơn hàng chưa được xử lý, vui lòng kiểm tra.
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-emerald-50 text-emerald-700">Đã gửi</span>
                        </td>
                        <td class="px-4 py-4 align-top text-gray-400 text-xs">
                            -
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Hệ thống</div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-600">16/05/2026 08:00</div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-xs font-medium">Xem</button>
                        </td>
                    </tr>
