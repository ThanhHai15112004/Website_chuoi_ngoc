<?php
// views/components/User/chi_tiet_bai_viet/sidebar.php
?>
<div class="sticky top-24 space-y-8">
    <!-- Mục lục -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
            <span class="iconify text-[#8B1538]" data-icon="ph:list-dashes-bold"></span>
            Mục Lục Bài Viết
        </h3>
        <nav class="toc-nav">
            <ul class="space-y-3 text-sm text-gray-600">
                <li>
                    <a href="#section-1" class="hover:text-[#8B1538] transition-colors block border-l-2 border-transparent hover:border-[#8B1538] pl-3 py-1">1. Đặc điểm của người mệnh Kim năm 2024</a>
                </li>
                <li>
                    <a href="#section-2" class="hover:text-[#8B1538] transition-colors block border-l-2 border-transparent hover:border-[#8B1538] pl-3 py-1">2. Những loại đá phong thủy phù hợp</a>
                </li>
                <li>
                    <a href="#section-3" class="hover:text-[#8B1538] transition-colors block border-l-2 border-transparent hover:border-[#8B1538] pl-3 py-1">3. Lưu ý khi chọn và bảo quản vòng tay</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Bài viết liên quan -->
    <?php if (!empty($related_articles)): ?>
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
            <span class="iconify text-[#8B1538]" data-icon="ph:article-bold"></span>
            Bài Viết Liên Quan
        </h3>
        <div class="space-y-6">
            <?php foreach ($related_articles as $rel_article): ?>
            <a href="<?= APP_URL ?>/chi-tiet-bai-viet?id=<?= $rel_article['id'] ?>" class="group block">
                <div class="flex gap-4">
                    <div class="w-20 h-20 rounded-lg overflow-hidden shrink-0">
                        <img src="<?= htmlspecialchars($rel_article['image']) ?>" alt="<?= htmlspecialchars($rel_article['title']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-900 line-clamp-2 mb-2 group-hover:text-[#8B1538] transition-colors leading-tight">
                            <?= htmlspecialchars($rel_article['title']) ?>
                        </h4>
                        <div class="text-xs text-gray-500 flex items-center gap-1">
                            <span class="iconify" data-icon="ph:calendar-blank"></span>
                            <?= htmlspecialchars($rel_article['date']) ?>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- Banner CTA -->
    <a href="<?= APP_URL ?>/vong-theo-menh" class="block rounded-2xl overflow-hidden shadow-sm relative group">
        <img src="<?= APP_URL ?>/public/images/Banner/banner3.jpg" alt="Tra cứu vòng theo mệnh" class="w-full h-auto group-hover:scale-105 transition-transform duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
            <h4 class="text-white font-serif text-xl font-bold mb-2">Vòng Sinh Mệnh</h4>
            <p class="text-white/80 text-sm mb-4">Khám phá ngay viên đá hộ mệnh dành riêng cho bạn.</p>
            <span class="inline-block bg-[#8B1538] text-white text-sm px-4 py-2 rounded font-medium text-center group-hover:bg-white group-hover:text-[#8B1538] transition-colors">Tra cứu ngay</span>
        </div>
    </a>
</div>

<!-- Script cho smooth scroll của mục lục -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.toc-nav a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100, // offset header
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>

