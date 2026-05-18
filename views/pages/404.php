<style>
    @keyframes fadeUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes floatImage {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
        100% { transform: translateY(0px); }
    }
    
    .animate-fade-up {
        animation: fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }
    .animate-float {
        animation: floatImage 4s ease-in-out infinite;
    }
    
    /* Animation Delays */
    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }
    .delay-400 { animation-delay: 400ms; }
    .delay-500 { animation-delay: 500ms; }
</style>

<div class="min-h-[70vh] bg-[#f9fafc] py-12 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="max-w-5xl mx-auto relative">
        <!-- Background Decorative Elements -->
        <div class="absolute top-0 left-1/4 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float" style="animation-duration: 7s;"></div>
        <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-yellow-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float" style="animation-duration: 9s; animation-delay: 1s;"></div>

        <!-- Back link -->
        <div class="mb-10 animate-fade-up relative z-10">
            <a href="<?= APP_URL ?>/" class="inline-flex items-center text-[#2b78d2] hover:text-[#1a5baf] font-medium transition-transform duration-300 hover:-translate-x-1">
                <iconify-icon icon="ph:caret-left-light" class="text-xl mr-1"></iconify-icon>
                Quay về Trang chủ
            </a>
        </div>

        <!-- Content -->
        <div class="text-center flex flex-col items-center relative z-10">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-3 animate-fade-up delay-100">
                Đường dẫn không tồn tại hoặc đã bị xóa!
            </h1>
            
            <p class="text-gray-500 mb-12 animate-fade-up delay-200">
                Vui lòng liên hệ với hỗ trợ để biết thêm chi tiết.
            </p>

            <!-- Error Image -->
            <div class="w-full max-w-md mx-auto mb-10 animate-fade-up delay-300">
                <div class="animate-float">
                    <img src="<?= APP_URL ?>/images/error/error-404-2.png" alt="404 Error" class="w-full h-auto object-contain drop-shadow-sm hover:drop-shadow-xl transition-all duration-500">
                </div>
            </div>

            <!-- Search Bar -->
            <div class="w-full max-w-lg mx-auto mb-10 animate-fade-up delay-400">
                <p class="text-sm text-gray-500 mb-3 font-medium">Bạn có thể tìm kiếm sản phẩm khác tại đây:</p>
                <form action="<?= APP_URL ?>/san-pham" method="GET" class="relative group">
                    <input type="text" name="keyword" placeholder="Nhập tên sản phẩm cần tìm..." class="w-full pl-5 pr-14 py-3.5 rounded-full border border-gray-200 bg-white shadow-sm hover:shadow-md focus:outline-none focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] transition-all duration-300 text-gray-700">
                    <button type="submit" class="absolute right-1.5 top-1.5 bottom-1.5 px-4 bg-[#800000] text-white rounded-full hover:bg-[#600000] transition-all duration-300 flex items-center justify-center hover:scale-105 active:scale-95">
                        <iconify-icon icon="ph:magnifying-glass-light" class="text-lg"></iconify-icon>
                    </button>
                </form>
            </div>

            <!-- Quick Links -->
            <div class="w-full max-w-2xl mx-auto border-t border-gray-100 pt-8 animate-fade-up delay-500">
                <p class="text-sm text-gray-400 mb-4 font-medium uppercase tracking-wider">Hoặc xem các danh mục phổ biến</p>
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <a href="<?= APP_URL ?>/san-pham" class="px-5 py-2 rounded-full border border-gray-200 text-gray-600 hover:text-[#800000] hover:border-[#800000] hover:bg-[#800000]/5 hover:-translate-y-1 transition-all duration-300 text-sm font-medium shadow-sm hover:shadow-md">Tất cả sản phẩm</a>
                    <a href="<?= APP_URL ?>/khuyen-mai" class="px-5 py-2 rounded-full border border-gray-200 text-gray-600 hover:text-[#800000] hover:border-[#800000] hover:bg-[#800000]/5 hover:-translate-y-1 transition-all duration-300 text-sm font-medium shadow-sm hover:shadow-md">Khuyến mãi</a>
                    <a href="<?= APP_URL ?>/bai-viet" class="px-5 py-2 rounded-full border border-gray-200 text-gray-600 hover:text-[#800000] hover:border-[#800000] hover:bg-[#800000]/5 hover:-translate-y-1 transition-all duration-300 text-sm font-medium shadow-sm hover:shadow-md">Kiến thức phong thủy</a>
                    <a href="<?= APP_URL ?>/lien-he" class="px-5 py-2 rounded-full border border-gray-200 text-gray-600 hover:text-[#800000] hover:border-[#800000] hover:bg-[#800000]/5 hover:-translate-y-1 transition-all duration-300 text-sm font-medium shadow-sm hover:shadow-md">Liên hệ hỗ trợ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load Iconify -->
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
