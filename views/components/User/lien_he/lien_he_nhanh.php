<!-- views/components/User/lien_he/lien_he_nhanh.php -->
<section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
    <h2 class="text-xl font-bold text-gray-900 mb-6">Kênh liên hệ nhanh</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Hotline -->
        <a href="tel:<?= htmlspecialchars($cau_hinh['hotline_chinh']) ?>" class="group block p-6 rounded-2xl border border-red-100 bg-red-50/50 hover:bg-white hover:border-red-200 hover:shadow-md transition-all duration-300">
            <div class="w-12 h-12 rounded-full bg-red-100 text-red-800 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-1">Hotline</h3>
            <p class="text-xl font-medium text-red-800 mb-2"><?= htmlspecialchars(format_phone_number($cau_hinh['hotline_chinh']) ?? $cau_hinh['hotline_chinh']) ?></p>
            <p class="text-sm text-gray-500 mb-4">Hỗ trợ tư vấn và đơn hàng</p>
            <span class="inline-block px-4 py-1.5 rounded-full text-sm font-medium bg-red-800 text-white">Gọi ngay</span>
        </a>

        <?php if (!empty($cau_hinh['zalo']) && $cau_hinh['zalo_active'] == 1): ?>
        <!-- Zalo -->
        <?php
            $zalo_link = is_numeric($cau_hinh['zalo']) ? "https://zalo.me/" . $cau_hinh['zalo'] : $cau_hinh['zalo'];
        ?>
        <a href="<?= htmlspecialchars($zalo_link) ?>" target="_blank" class="group block p-6 rounded-2xl border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all duration-300 bg-white">
            <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.477 2 2 6.03 2 11c0 2.84 1.48 5.37 3.79 7.02-.13.78-.45 1.83-1.03 2.71-.14.21.03.48.28.43 2.05-.44 4.05-1.58 5.35-2.58A10.74 10.74 0 0012 20c5.523 0 10-4.03 10-9s-4.477-9-10-9z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-1">Zalo</h3>
            <p class="text-base text-gray-900 mb-2">Chat nhanh qua Zalo</p>
            <p class="text-sm text-gray-500 mb-4 line-clamp-2">Phù hợp khi cần gửi ảnh sản phẩm hoặc mẫu mã.</p>
            <span class="inline-block px-4 py-1.5 rounded-full text-sm font-medium border border-blue-600 text-blue-600 group-hover:bg-blue-50">Chat Zalo</span>
        </a>
        <?php endif; ?>

        <?php if (!empty($cau_hinh['facebook']) && $cau_hinh['facebook_active'] == 1): ?>
        <!-- Facebook -->
        <a href="<?= htmlspecialchars($cau_hinh['facebook']) ?>" target="_blank" class="group block p-6 rounded-2xl border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all duration-300 bg-white">
            <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-1">Facebook</h3>
            <p class="text-base text-gray-900 mb-2">Messenger / Fanpage</p>
            <p class="text-sm text-gray-500 mb-4 line-clamp-2">Theo dõi bộ sưu tập mới & nhắn tin với shop.</p>
            <span class="inline-block px-4 py-1.5 rounded-full text-sm font-medium border border-blue-600 text-blue-600 group-hover:bg-blue-50">Nhắn tin</span>
        </a>
        <?php endif; ?>

        <?php if (!empty($cau_hinh['email'])): ?>
        <!-- Email -->
        <a href="mailto:<?= htmlspecialchars($cau_hinh['email']) ?>" class="group block p-6 rounded-2xl border border-gray-100 hover:border-red-200 hover:shadow-md transition-all duration-300 bg-white">
            <div class="w-12 h-12 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-1">Email</h3>
            <p class="text-base text-gray-900 mb-2 truncate" title="<?= htmlspecialchars($cau_hinh['email']) ?>"><?= htmlspecialchars($cau_hinh['email']) ?></p>
            <p class="text-sm text-gray-500 mb-4 line-clamp-2">Gửi yêu cầu hỗ trợ đối tác hoặc khiếu nại.</p>
            <span class="inline-block px-4 py-1.5 rounded-full text-sm font-medium border border-red-800 text-red-800 group-hover:bg-red-50">Gửi Email</span>
        </a>
        <?php endif; ?>

    </div>
</section>

