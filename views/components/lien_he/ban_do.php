<!-- views/components/lien_he/ban_do.php -->
<section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
        <div>
            <h2 class="text-2xl font-serif font-bold text-gray-900">Tìm chúng tôi trên bản đồ</h2>
            <p class="text-gray-600 mt-1">Ghé thăm cửa hàng để trải nghiệm trực tiếp các sản phẩm ngọc và đá quý thiên nhiên.</p>
        </div>
        <a href="https://maps.google.com" target="_blank" class="inline-flex items-center px-5 py-2.5 border border-red-800 text-sm font-medium rounded-full text-red-800 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-800 transition duration-300 flex-shrink-0">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            Chỉ đường
        </a>
    </div>

    <!-- Map Container -->
    <div class="rounded-xl overflow-hidden shadow-inner border border-gray-200 h-[300px] md:h-[450px] relative bg-gray-50 flex items-center justify-center">
        <!-- Optional: Real iframe when available -->
        <!-- <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
        
        <!-- Fallback/Placeholder if no physical store yet -->
        <div class="text-center p-6">
            <div class="w-16 h-16 bg-red-50 text-red-800 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Hiện cửa hàng đang hoạt động Online</h3>
            <p class="text-gray-600 max-w-md mx-auto">Chúng tôi hỗ trợ giao hàng toàn quốc và tư vấn trực tuyến. Bạn có thể liên hệ qua Hotline, Zalo hoặc Facebook để được hỗ trợ nhanh nhất.</p>
        </div>
    </div>
</section>
