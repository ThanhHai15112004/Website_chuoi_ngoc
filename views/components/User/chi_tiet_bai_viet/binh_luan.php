<?php
// views/components/User/chi_tiet_bai_viet/binh_luan.php
?>
<div class="mt-16">
    <h3 class="text-2xl font-serif text-gray-900 mb-8 flex items-center gap-3">
        Bình Luận (3)
    </h3>

    <!-- Form bình luận -->
    <div class="bg-gray-50 rounded-2xl p-6 mb-10 border border-gray-100">
        <h4 class="font-medium text-gray-900 mb-4">Để lại bình luận của bạn</h4>
        <form action="#" method="POST" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <input type="text" placeholder="Họ và tên *" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#8B1538] focus:ring-1 focus:ring-[#8B1538] outline-none transition-all">
                </div>
                <div>
                    <input type="email" placeholder="Email (không bắt buộc)" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#8B1538] focus:ring-1 focus:ring-[#8B1538] outline-none transition-all">
                </div>
            </div>
            <div>
                <textarea rows="4" placeholder="Nhập nội dung bình luận..." required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#8B1538] focus:ring-1 focus:ring-[#8B1538] outline-none transition-all resize-none"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-[#8B1538] text-white px-8 py-3 rounded-xl font-medium hover:bg-red-800 transition-colors flex items-center gap-2">
                    <span class="iconify" data-icon="ph:paper-plane-right-fill"></span>
                    Gửi bình luận
                </button>
            </div>
        </form>
    </div>

    <!-- Danh sách bình luận -->
    <div class="space-y-8">
        <!-- Bình luận 1 -->
        <div class="flex gap-4">
            <div class="w-12 h-12 rounded-full bg-gray-200 shrink-0 overflow-hidden flex items-center justify-center text-gray-500 font-bold text-lg">
                H
            </div>
            <div class="flex-1">
                <div class="bg-gray-50 rounded-2xl p-5 relative group">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h5 class="font-bold text-gray-900">Hoàng Kim</h5>
                            <p class="text-xs text-gray-500">12/11/2023 lúc 14:30</p>
                        </div>
                        <button class="text-sm text-gray-500 hover:text-[#8B1538] font-medium hidden group-hover:block transition-all">Phản hồi</button>
                    </div>
                    <p class="text-gray-700">Bài viết rất chi tiết và bổ ích. Mình mệnh Kim đang phân vân không biết nên chọn Thạch Anh Tóc Vàng hay Mắt Hổ. Cho mình hỏi cổ tay nhỏ thì nên đeo hạt mấy ly ạ?</p>
                </div>
                
                <!-- Admin Phản hồi -->
                <div class="flex gap-4 mt-4 ml-8">
                    <div class="w-10 h-10 rounded-full shrink-0 overflow-hidden border-2 border-[#8B1538]/20 bg-white flex justify-center items-center">
                        <img src="<?= APP_URL ?>/public/images/Logo/Logo2.jpg" alt="Admin" class="w-8 h-8 object-cover rounded-full">
                    </div>
                    <div class="flex-1">
                        <div class="bg-[#8B1538]/5 rounded-2xl p-4 relative group border border-[#8B1538]/10">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h5 class="font-bold text-[#8B1538] flex items-center gap-1">
                                        Chuỗi Ngọc Quán
                                        <span class="iconify text-[#8B1538] text-xs" data-icon="ph:check-circle-fill"></span>
                                    </h5>
                                    <p class="text-xs text-gray-500">12/11/2023 lúc 15:00</p>
                                </div>
                            </div>
                            <p class="text-gray-700 text-sm">Chào bạn Hoàng Kim, cảm ơn bạn đã quan tâm đến bài viết. Nếu cổ tay bạn nhỏ (dưới 15cm), bạn nên chọn hạt size 8mm hoặc 10mm để vừa vặn và thanh lịch nhất nhé. Bạn có thể inbox fanpage để shop tư vấn kỹ hơn ạ.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bình luận 2 -->
        <div class="flex gap-4">
            <div class="w-12 h-12 rounded-full bg-blue-100 shrink-0 overflow-hidden flex items-center justify-center text-blue-600 font-bold text-lg">
                T
            </div>
            <div class="flex-1">
                <div class="bg-gray-50 rounded-2xl p-5 relative group">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h5 class="font-bold text-gray-900">Trần Phương</h5>
                            <p class="text-xs text-gray-500">10/11/2023 lúc 09:15</p>
                        </div>
                        <button class="text-sm text-gray-500 hover:text-[#8B1538] font-medium hidden group-hover:block transition-all">Phản hồi</button>
                    </div>
                    <p class="text-gray-700">Mình đã mua vòng Thạch Anh Tóc Vàng bên shop, đá rất sáng và đẹp. Sẽ ủng hộ shop dài dài.</p>
                </div>
            </div>
        </div>
    </div>
</div>

