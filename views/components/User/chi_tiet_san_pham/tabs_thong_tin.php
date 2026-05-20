<?php
/**
 * Component: Tabs Thông tin sản phẩm
 */
?>
<div class="product-tabs font-inter bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <!-- Tab Headers (Desktop) -->
    <div class="hidden md:flex border-b border-gray-100 overflow-x-auto">
        <button type="button" class="tab-btn active px-6 py-4 text-sm font-semibold text-[#8B0000] border-b-2 border-[#8B0000] whitespace-nowrap hover:bg-gray-50 transition-colors" onclick="switchTab('mo-ta')">Mô tả sản phẩm</button>
        <button type="button" class="tab-btn px-6 py-4 text-sm font-medium text-gray-500 border-b-2 border-transparent whitespace-nowrap hover:text-gray-900 hover:bg-gray-50 transition-colors" onclick="switchTab('chi-tiet')">Chi tiết kỹ thuật</button>
        <button type="button" class="tab-btn px-6 py-4 text-sm font-medium text-gray-500 border-b-2 border-transparent whitespace-nowrap hover:text-gray-900 hover:bg-gray-50 transition-colors" onclick="switchTab('phong-thuy')">Ý nghĩa phong thủy</button>
        <button type="button" class="tab-btn px-6 py-4 text-sm font-medium text-gray-500 border-b-2 border-transparent whitespace-nowrap hover:text-gray-900 hover:bg-gray-50 transition-colors" onclick="switchTab('bao-quan')">Hướng dẫn bảo quản</button>
        <button type="button" class="tab-btn px-6 py-4 text-sm font-medium text-gray-500 border-b-2 border-transparent whitespace-nowrap hover:text-gray-900 hover:bg-gray-50 transition-colors" onclick="switchTab('doi-tra')">Chính sách đổi trả</button>
    </div>

    <!-- Tab Contents -->
    <div class="p-6 md:p-8">
        
        <!-- Mô tả -->
        <div id="tab-mo-ta" class="tab-content active block">
            <!-- Mobile Header (Accordion style) -->
            <button type="button" class="md:hidden flex justify-between items-center w-full pb-3 border-b border-gray-100 mb-4 font-semibold text-gray-900" onclick="toggleMobileAccordion('tab-mo-ta')">
                Mô tả sản phẩm
                <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="accordion-content text-gray-700 leading-relaxed text-[15px]">
                <p><?= nl2br(htmlspecialchars($san_pham['mo_ta_chi_tiet'])) ?></p>
                <!-- Thêm ảnh minh họa nếu có -->
                <div class="mt-6 flex justify-center">
                    <img src="<?= htmlspecialchars($san_pham['anh_chinh']) ?>" alt="Mô tả <?= htmlspecialchars($san_pham['ten']) ?>" class="rounded-xl max-w-[400px] h-auto shadow-sm object-contain bg-[#F9F8F6] p-2 border border-gray-100">
                </div>
            </div>
        </div>

        <!-- Chi tiết kỹ thuật -->
        <div id="tab-chi-tiet" class="tab-content hidden">
            <button type="button" class="md:hidden flex justify-between items-center w-full py-3 border-b border-gray-100 mb-4 font-semibold text-gray-900" onclick="toggleMobileAccordion('tab-chi-tiet')">
                Chi tiết kỹ thuật
                <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="accordion-content hidden md:block">
                <div class="bg-[#FDFBF7] rounded-xl overflow-hidden border border-gray-100">
                    <table class="w-full text-sm text-left">
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($san_pham['thong_so_ky_thuat'] as $key => $val): 
                                $bg = $i % 2 === 0 ? 'bg-white' : 'bg-[#FDFBF7]';
                            ?>
                            <tr class="<?= $bg ?> border-b border-gray-100 last:border-0">
                                <th class="px-6 py-4 font-medium text-gray-500 w-1/3 align-top"><?= htmlspecialchars($key) ?></th>
                                <td class="px-6 py-4 text-gray-900"><?= htmlspecialchars($val) ?></td>
                            </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Ý nghĩa phong thủy -->
        <div id="tab-phong-thuy" class="tab-content hidden">
            <button type="button" class="md:hidden flex justify-between items-center w-full py-3 border-b border-gray-100 mb-4 font-semibold text-gray-900" onclick="toggleMobileAccordion('tab-phong-thuy')">
                Ý nghĩa phong thủy
                <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="accordion-content hidden md:block text-gray-700 leading-relaxed text-[15px]">
                <div class="p-6 bg-[#8B0000]/5 rounded-xl border border-[#8B0000]/10">
                    <h4 class="text-[#8B0000] font-semibold mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        Năng lượng từ đá tự nhiên
                    </h4>
                    <p><?= nl2br(htmlspecialchars($san_pham['y_nghia_phong_thuy'])) ?></p>
                </div>
            </div>
        </div>

        <!-- Bảo quản -->
        <div id="tab-bao-quan" class="tab-content hidden">
            <button type="button" class="md:hidden flex justify-between items-center w-full py-3 border-b border-gray-100 mb-4 font-semibold text-gray-900" onclick="toggleMobileAccordion('tab-bao-quan')">
                Hướng dẫn bảo quản
                <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="accordion-content hidden md:block text-gray-700 leading-relaxed text-[15px]">
                <ul class="space-y-3 list-none">
                    <?php foreach ($san_pham['huong_dan_bao_quan'] as $item): ?>
                    <li class="flex gap-3">
                        <svg class="w-5 h-5 text-[#D4AF37] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span><?= htmlspecialchars($item) ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Đổi trả -->
        <div id="tab-doi-tra" class="tab-content hidden">
            <button type="button" class="md:hidden flex justify-between items-center w-full py-3 border-b border-gray-100 font-semibold text-gray-900" onclick="toggleMobileAccordion('tab-doi-tra')">
                Chính sách đổi trả
                <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="accordion-content hidden md:block text-gray-700 leading-relaxed text-[15px] pt-4 md:pt-0">
                <p><?= nl2br(htmlspecialchars($san_pham['chinh_sach_doi_tra'])) ?></p>
            </div>
        </div>

    </div>
</div>

<script>
    function switchTab(tabId) {
        // Only run on desktop
        if (window.innerWidth < 768) return;
        
        // Hide all contents
        document.querySelectorAll('.tab-content').forEach(el => {
            el.classList.add('hidden');
            el.classList.remove('block');
        });
        
        // Reset all tabs
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active', 'text-[#8B0000]', 'border-[#8B0000]');
            btn.classList.add('text-gray-500', 'border-transparent');
        });
        
        // Show selected content
        const targetContent = document.getElementById('tab-' + tabId);
        targetContent.classList.remove('hidden');
        targetContent.classList.add('block');
        // Ensure accordion content inside is visible
        targetContent.querySelector('.accordion-content').classList.remove('hidden');
        targetContent.querySelector('.accordion-content').classList.add('block');
        
        // Activate clicked tab
        const clickedTab = document.querySelector(`.tab-btn[onclick="switchTab('${tabId}')"]`);
        if (clickedTab) {
            clickedTab.classList.remove('text-gray-500', 'border-transparent');
            clickedTab.classList.add('active', 'text-[#8B0000]', 'border-[#8B0000]');
        }
    }

    function toggleMobileAccordion(tabId) {
        // Only run on mobile
        if (window.innerWidth >= 768) return;
        
        const content = document.getElementById(tabId).querySelector('.accordion-content');
        const icon = document.getElementById(tabId).querySelector('svg');
        
        if (content.classList.contains('hidden')) {
            // Hides others first if we want accordion behavior, else leave them
            content.classList.remove('hidden');
            content.classList.add('block');
            icon.classList.add('rotate-180');
        } else {
            content.classList.add('hidden');
            content.classList.remove('block');
            icon.classList.remove('rotate-180');
        }
    }
</script>
