<div class="max-w-2xl mx-auto mb-6">
    <form action="<?= APP_URL ?>/bai-viet/tim-kiem" method="GET" class="relative group">
        <input type="text" 
               name="q" 
               placeholder="Tìm kiếm bài viết, hướng dẫn, tên loại đá..." 
               class="w-full pl-12 pr-32 py-3.5 rounded-full border border-gray-300 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-red-800/30 focus:border-red-800 transition-all duration-300 text-gray-700"
               required>
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-red-800 transition-colors">
            <iconify-icon icon="ph:magnifying-glass" class="text-xl"></iconify-icon>
        </div>
        <button type="submit" 
                class="absolute inset-y-1.5 right-1.5 px-6 rounded-full bg-red-800 text-white font-medium hover:bg-red-900 transition-colors flex items-center gap-2">
            Tìm kiếm
        </button>
    </form>
</div>
