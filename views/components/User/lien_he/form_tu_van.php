<!-- views/components/User/lien_he/form_tu_van.php -->
<div id="form-tu-van" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8 relative overflow-hidden">
    <!-- Decorative accent -->
    <div class="absolute top-0 left-0 w-2 h-full bg-red-800 rounded-l-2xl"></div>
    
    <div class="pl-4">
        <h2 class="text-2xl font-serif font-bold text-gray-900 mb-2">Gửi yêu cầu tư vấn</h2>
        <p class="text-gray-600 mb-8">Hãy để lại thông tin, chúng tôi sẽ liên hệ lại để hỗ trợ bạn chọn sản phẩm phù hợp.</p>

        <!-- Form Success State (Hidden by default) -->
        <div id="contactSuccessMessage" class="hidden bg-green-50 border border-green-200 rounded-xl p-6 mb-8 text-center">
            <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Gửi yêu cầu thành công!</h3>
            <p class="text-gray-600 mb-4">Cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi qua kênh bạn đã chọn trong thời gian sớm nhất.</p>
            <button type="button" onclick="resetContactForm()" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-full text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-800">
                Gửi yêu cầu khác
            </button>
        </div>

        <!-- Form Error State (Hidden by default) -->
        <div id="contactErrorMessage" class="hidden bg-red-50 border border-red-200 rounded-xl p-4 mb-6 flex items-start">
            <svg class="w-5 h-5 text-red-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div>
                <h3 class="text-sm font-bold text-red-800">Gửi yêu cầu chưa thành công</h3>
                <p class="text-sm text-red-700 mt-1">Vui lòng kiểm tra lại các trường thông tin bắt buộc và thử lại.</p>
            </div>
        </div>

        <form id="contactForm" onsubmit="handleContactSubmit(event)" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Họ Tên -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên <span class="text-red-600">*</span></label>
                    <input type="text" id="name" name="name" required placeholder="Nhập họ và tên của bạn" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 transition-colors bg-white outline-none">
                </div>

                <!-- Điện Thoại -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại <span class="text-red-600">*</span></label>
                    <input type="tel" id="phone" name="phone" required placeholder="Nhập số điện thoại" pattern="[0-9]{10,11}"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 transition-colors bg-white outline-none">
                    <p class="text-xs text-red-600 mt-1 hidden" id="phoneError">Vui lòng nhập số điện thoại hợp lệ.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email (Không bắt buộc)</label>
                    <input type="email" id="email" name="email" placeholder="Nhập email của bạn" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 transition-colors bg-white outline-none">
                </div>

                <!-- Chủ đề -->
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Chủ đề liên hệ <span class="text-red-600">*</span></label>
                    <select id="subject" name="subject" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 transition-colors bg-white outline-none appearance-none cursor-pointer">
                        <option value="" disabled selected>Chọn chủ đề...</option>
                        <option value="tu-van-menh">Tư vấn chọn vòng theo mệnh</option>
                        <option value="san-pham">Hỏi về sản phẩm</option>
                        <option value="don-hang">Hỗ trợ đơn hàng</option>
                        <option value="doi-tra">Đổi trả / bảo hành</option>
                        <option value="khac">Góp ý khác</option>
                    </select>
                </div>
            </div>

            <!-- Optional: Mệnh / Năm sinh (revealed based on subject or kept visible) -->
            <div>
                <label for="destiny_year" class="block text-sm font-medium text-gray-700 mb-1">Mệnh hoặc năm sinh (Nếu có)</label>
                <input type="text" id="destiny_year" name="destiny_year" placeholder="Ví dụ: 2004, hoặc Mệnh Hỏa..." 
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 transition-colors bg-white outline-none">
            </div>

            <!-- Nội dung tin nhắn -->
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Nội dung tin nhắn <span class="text-red-600">*</span></label>
                <textarea id="message" name="message" rows="4" required placeholder="Ví dụ: Tôi sinh năm 2004, muốn chọn vòng cầu bình an và tài lộc, ngân sách khoảng 500.000đ..." 
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 transition-colors bg-white outline-none resize-none"></textarea>
            </div>

            <!-- Tùy chọn liên hệ -->
            <div class="space-y-3">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="pref_zalo" name="preferences" value="zalo" type="checkbox" checked class="focus:ring-red-800 h-4 w-4 text-red-800 border-gray-300 rounded cursor-pointer">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="pref_zalo" class="font-medium text-gray-700 cursor-pointer">Tôi muốn được tư vấn qua Zalo</label>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="pref_call" name="preferences" value="call" type="checkbox" class="focus:ring-red-800 h-4 w-4 text-red-800 border-gray-300 rounded cursor-pointer">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="pref_call" class="font-medium text-gray-700 cursor-pointer">Tôi muốn được gọi điện tư vấn</label>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="pref_promo" name="preferences" value="promo" type="checkbox" class="focus:ring-red-800 h-4 w-4 text-red-800 border-gray-300 rounded cursor-pointer">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="pref_promo" class="font-medium text-gray-700 cursor-pointer">Tôi muốn nhận thông tin khuyến mãi</label>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" id="submitBtn" class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-3.5 border border-transparent text-base font-bold rounded-xl shadow-sm text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-800 transition duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    Gửi yêu cầu
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function handleContactSubmit(e) {
        e.preventDefault();
        
        const form = document.getElementById('contactForm');
        const phone = document.getElementById('phone');
        const phoneError = document.getElementById('phoneError');
        const successMsg = document.getElementById('contactSuccessMessage');
        const errorMsg = document.getElementById('contactErrorMessage');
        const submitBtn = document.getElementById('submitBtn');

        // Simple validation
        const phoneRegex = /^[0-9]{10,11}$/;
        if (!phoneRegex.test(phone.value)) {
            phone.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
            phoneError.classList.remove('hidden');
            errorMsg.classList.remove('hidden');
            return;
        } else {
            phone.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
            phoneError.classList.add('hidden');
            errorMsg.classList.add('hidden');
        }

        // Simulate API call
        submitBtn.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Đang gửi...';
        submitBtn.disabled = true;

        setTimeout(() => {
            // Success
            form.classList.add('hidden');
            successMsg.classList.remove('hidden');
            
            // Reset button
            submitBtn.innerHTML = '<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg> Gửi yêu cầu';
            submitBtn.disabled = false;
        }, 1000);
    }

    function resetContactForm() {
        const form = document.getElementById('contactForm');
        const successMsg = document.getElementById('contactSuccessMessage');
        
        form.reset();
        form.classList.remove('hidden');
        successMsg.classList.add('hidden');
    }
</script>

