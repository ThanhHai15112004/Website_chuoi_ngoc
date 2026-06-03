<!-- views/components/User/lien_he/cau_hoi_thuong_gap.php -->
<section class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 sm:p-10">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-gray-900 mb-3">Câu hỏi thường gặp</h2>
        <p class="text-gray-600">Những thắc mắc phổ biến của khách hàng khi liên hệ với chúng tôi.</p>
    </div>

    <div class="divide-y divide-gray-100" id="faqAccordion">
        
        <!-- Item 1 -->
        <div class="faq-item py-2">
            <button class="w-full py-4 text-left flex justify-between items-center focus:outline-none group" onclick="toggleFaq(this)">
                <span class="font-bold text-gray-900 group-hover:text-red-800 transition-colors">Tôi muốn chọn vòng theo mệnh thì cần cung cấp gì?</span>
                <span class="text-gray-400 group-hover:text-red-800 transition-all duration-300 transform faq-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </span>
            </button>
            <div class="pb-4 hidden faq-content text-gray-600 leading-relaxed pr-8">
                Bạn có thể cung cấp năm sinh, giới tính, nhu cầu sử dụng (cầu tài lộc, bình an, sức khỏe...) và ngân sách dự kiến để chuyên viên tư vấn của chúng tôi có thể gợi ý sản phẩm phù hợp nhất.
            </div>
        </div>

        <!-- Item 2 -->
        <div class="faq-item py-2">
            <button class="w-full py-4 text-left flex justify-between items-center focus:outline-none group" onclick="toggleFaq(this)">
                <span class="font-bold text-gray-900 group-hover:text-red-800 transition-colors">Cửa hàng phản hồi trong bao lâu?</span>
                <span class="text-gray-400 group-hover:text-red-800 transition-all duration-300 transform faq-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </span>
            </button>
            <div class="pb-4 hidden faq-content text-gray-600 leading-relaxed pr-8">
                Thông thường chúng tôi phản hồi trong vòng 24 giờ làm việc qua kênh bạn đã chọn. Nếu bạn cần hỗ trợ gấp, vui lòng gọi trực tiếp Hotline 090.123.4567.
            </div>
        </div>

        <!-- Item 3 -->
        <div class="faq-item py-2">
            <button class="w-full py-4 text-left flex justify-between items-center focus:outline-none group" onclick="toggleFaq(this)">
                <span class="font-bold text-gray-900 group-hover:text-red-800 transition-colors">Tôi có thể đổi thông tin đơn hàng sau khi đặt không?</span>
                <span class="text-gray-400 group-hover:text-red-800 transition-all duration-300 transform faq-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </span>
            </button>
            <div class="pb-4 hidden faq-content text-gray-600 leading-relaxed pr-8">
                Nếu đơn hàng chưa được giao cho đơn vị vận chuyển, bạn hoàn toàn có thể liên hệ Hotline hoặc Zalo kèm theo mã đơn hàng để được hỗ trợ thay đổi thông tin (địa chỉ, số điện thoại, sản phẩm).
            </div>
        </div>

        <!-- Item 4 -->
        <div class="faq-item py-2">
            <button class="w-full py-4 text-left flex justify-between items-center focus:outline-none group" onclick="toggleFaq(this)">
                <span class="font-bold text-gray-900 group-hover:text-red-800 transition-colors">Tôi muốn mua làm quà tặng thì cửa hàng có hỗ trợ không?</span>
                <span class="text-gray-400 group-hover:text-red-800 transition-all duration-300 transform faq-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </span>
            </button>
            <div class="pb-4 hidden faq-content text-gray-600 leading-relaxed pr-8">
                Có. Chúng tôi hỗ trợ dịch vụ gói quà, hộp cao cấp và viết thiệp lời chúc. Bạn cũng có thể cung cấp thông tin người nhận để chuyên viên tư vấn chọn vòng phù hợp.
            </div>
        </div>

    </div>
</section>

<script>
    function toggleFaq(button) {
        const item = button.parentElement;
        const content = item.querySelector('.faq-content');
        const icon = item.querySelector('.faq-icon');
        const isHidden = content.classList.contains('hidden');
        
        // Close all other items softly
        const allItems = document.querySelectorAll('.faq-item');
        allItems.forEach(i => {
            if (i !== item) {
                const iContent = i.querySelector('.faq-content');
                const iIcon = i.querySelector('.faq-icon');
                if(!iContent.classList.contains('hidden')) {
                    iContent.classList.add('hidden');
                    iIcon.classList.remove('rotate-180', 'text-red-800');
                    iIcon.classList.add('text-gray-400');
                }
            }
        });

        // Toggle current item
        if (isHidden) {
            content.classList.remove('hidden');
            icon.classList.add('rotate-180', 'text-red-800');
            icon.classList.remove('text-gray-400');
        } else {
            content.classList.add('hidden');
            icon.classList.remove('rotate-180', 'text-red-800');
            icon.classList.add('text-gray-400');
        }
    }
</script>

