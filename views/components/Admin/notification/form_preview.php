        <!-- Cột Preview (Bên phải) -->
        <div class="lg:col-span-4">
            <div class="sticky top-6">
                <h3 class="text-base font-bold text-gray-800 mb-4 px-2">Preview hiển thị (Bản User)</h3>
                
                <div class="bg-gray-100 p-4 rounded-[24px] shadow-inner border border-gray-200 flex justify-center">
                    <!-- Mobile frame mockup -->
                    <div class="w-[320px] bg-gray-50 rounded-2xl shadow-xl overflow-hidden border-4 border-gray-800 relative">
                        <!-- Screen Header -->
                        <div class="bg-white px-4 py-3 border-b border-gray-100 flex items-center justify-between sticky top-0 z-10">
                            <span class="font-bold text-gray-800 text-sm">Hộp thư</span>
                            <span class="iconify text-gray-400" data-icon="mdi:dots-horizontal"></span>
                        </div>
                        
                        <!-- Screen Body -->
                        <div class="p-3 h-[400px] overflow-y-auto bg-gray-50/50">
                            
                            <!-- The Notification Card -->
                            <div class="bg-white rounded-xl p-3 shadow-sm border border-transparent transition-all relative overflow-hidden" id="preview-card">
                                <div class="absolute top-0 left-0 w-1 h-full bg-[#6B0D18] hidden" id="preview-priority-bar"></div>
                                <div class="flex gap-3 relative z-10">
                                    <div class="w-10 h-10 rounded-full bg-red-50 text-[#6B0D18] flex items-center justify-center shrink-0 mt-0.5" id="preview-icon-wrapper">
                                        <span class="iconify text-xl" data-icon="mdi:message-text-outline" id="preview-icon"></span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex justify-between items-start gap-2 mb-1">
                                            <h4 class="font-bold text-gray-900 text-[13px] leading-tight" id="preview-title">Tiêu đề thông báo</h4>
                                            <span class="text-[10px] text-gray-400 whitespace-nowrap mt-0.5">Vừa xong</span>
                                        </div>
                                        <p class="text-xs text-gray-600 line-clamp-2 leading-relaxed" id="preview-content">
                                            Nội dung thông báo sẽ hiển thị ở đây. Bạn có thể sử dụng các biến cá nhân hóa để làm thông báo thân thiện hơn.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Dummy past notification -->
                            <div class="bg-white rounded-xl p-3 shadow-sm border border-transparent mt-3 opacity-60">
                                <div class="flex gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gray-100 text-gray-500 flex items-center justify-center shrink-0 mt-0.5">
                                        <span class="iconify text-xl" data-icon="mdi:shopping-outline"></span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex justify-between items-start mb-1">
                                            <h4 class="font-medium text-gray-700 text-[13px]">Giao hàng thành công</h4>
                                            <span class="text-[10px] text-gray-400">2 ngày trước</span>
                                        </div>
                                        <p class="text-xs text-gray-500 line-clamp-1">Đơn hàng #DH12345 đã được giao.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="mt-4 p-4 bg-blue-50 rounded-xl border border-blue-100">
                    <p class="text-xs text-blue-700 flex gap-2">
                        <span class="iconify text-lg shrink-0" data-icon="mdi:information-outline"></span>
                        Thông báo thực tế có thể thay đổi cách hiển thị tùy thuộc vào thiết bị của người dùng. Các biến {Tên_khách} sẽ tự động thay bằng dữ liệu thực.
                    </p>
                </div>
            </div>
        </div>
