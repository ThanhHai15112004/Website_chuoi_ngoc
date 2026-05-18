<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-4" style="color:#8b0000;">Câu Hỏi Thường Gặp</h2>
            <div class="w-24 h-1 mx-auto mb-6" style="background:#d4af37;"></div>
        </div>
        
        <div class="space-y-4" data-aos="fade-up" data-aos-delay="100">
            <!-- FAQ 1 -->
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-md">
                <button class="w-full text-left px-6 py-5 flex items-center justify-between focus:outline-none" onclick="toggleFaq(this)">
                    <span class="font-bold text-gray-900 text-lg">Nên đeo vòng tay trái hay tay phải?</span>
                    <svg class="w-6 h-6 text-gray-400 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="px-6 pb-5 text-gray-600 hidden">
                    Theo quy tắc phong thủy "Trái vào - Phải ra", bạn nên đeo vòng tay trái khi muốn thu hút tài lộc, may mắn (như khi đi phỏng vấn, ký hợp đồng). Đeo tay phải khi cần trừ tà, xua đuổi năng lượng tiêu cực (như đi viếng tang, qua nơi hoang vắng).
                </div>
            </div>
            
            <!-- FAQ 2 -->
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-md">
                <button class="w-full text-left px-6 py-5 flex items-center justify-between focus:outline-none" onclick="toggleFaq(this)">
                    <span class="font-bold text-gray-900 text-lg">Tôi có thể chọn vòng màu tương khắc không?</span>
                    <svg class="w-6 h-6 text-gray-400 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="px-6 pb-5 text-gray-600 hidden">
                    Màu tương khắc sẽ cản trở năng lượng phát triển của bạn, có thể gây ra những khó khăn không đáng có. Vì vậy, tốt nhất là nên tránh hoặc chỉ sử dụng làm điểm nhấn rất nhỏ trên chiếc vòng. Bạn nên ưu tiên chọn màu Tương Sinh (tốt nhất) hoặc Tương Hợp.
                </div>
            </div>
            
            <!-- FAQ 3 -->
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-md">
                <button class="w-full text-left px-6 py-5 flex items-center justify-between focus:outline-none" onclick="toggleFaq(this)">
                    <span class="font-bold text-gray-900 text-lg">Đá tự nhiên có thực sự mang lại năng lượng?</span>
                    <svg class="w-6 h-6 text-gray-400 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="px-6 pb-5 text-gray-600 hidden">
                    Có. Đá tự nhiên hình thành hàng triệu năm dưới lòng đất nên hấp thụ tinh hoa đất trời. Khoa học đã chứng minh các loại đá thạch anh, ngọc bích phát ra tần số rung động nhất định, giúp cân bằng điện từ trường xung quanh cơ thể con người.
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function toggleFaq(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('svg');
    
    // Toggle current
    if(content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
        button.parentElement.classList.add('border-[#8b0000]', 'ring-1', 'ring-[#8b0000]');
    } else {
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
        button.parentElement.classList.remove('border-[#8b0000]', 'ring-1', 'ring-[#8b0000]');
    }
}
</script>
