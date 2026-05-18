<!-- Trạng thái giỏ hàng trống -->
<div class="bg-white rounded-2xl p-12 text-center shadow-sm border border-gray-100">
    <div class="w-24 h-24 mx-auto bg-red-50 rounded-full flex items-center justify-center mb-4 text-[#8B0000]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
    </div>
    <h2 class="text-xl font-medium text-gray-800 mb-2">Giỏ hàng của bạn đang trống</h2>
    <p class="text-gray-500 mb-8">Chưa có sản phẩm nào trong giỏ hàng. Hãy tham khảo thêm các sản phẩm tuyệt vời của chúng tôi nhé!</p>
    <a href="<?= APP_URL ?>/" class="inline-block bg-[#8B0000] hover:bg-red-800 text-white font-medium py-3 px-8 rounded-full transition-colors shadow-md shadow-red-900/20">
        Tiếp tục mua sắm
    </a>
</div>
