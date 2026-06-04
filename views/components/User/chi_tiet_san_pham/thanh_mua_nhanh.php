<?php
/**
 * Component: Thanh mua nhanh cố định trên Mobile (Sticky Bottom Bar)
 */
?>

<!-- Thanh mua hàng cố định (Chỉ hiển thị trên Mobile) -->
<div class="lg:hidden fixed bottom-0 left-0 right-0 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.05)] border-t border-gray-100 z-50 transform transition-transform duration-300 translate-y-full" id="sticky-buy-bar">
    <div class="flex items-center h-16 px-2">
        <!-- Icons -->
        <div class="flex items-center space-x-1 pr-2 border-r border-gray-200">
            <button class="flex flex-col items-center justify-center w-12 h-12 text-gray-500 hover:text-[#8B0000] transition">
                <i class="far fa-comment-dots text-lg mb-0.5"></i>
                <span class="text-[10px]">Chat</span>
            </button>
            <a href="<?= APP_URL ?>/gio-hang" class="flex flex-col items-center justify-center w-12 h-12 text-gray-500 hover:text-[#8B0000] transition relative">
                <i class="fas fa-shopping-cart text-lg mb-0.5"></i>
                <span class="text-[10px]">Giỏ hàng</span>
                <span class="absolute top-1 right-2 bg-[#8B0000] text-white text-[9px] font-bold w-4 h-4 rounded-full flex items-center justify-center">2</span>
            </a>
        </div>

        <!-- Buttons -->
        <div class="flex-1 flex items-center gap-2 pl-2">
            <button class="flex-1 py-2.5 px-2 bg-[#FAF7F2] text-[#8B0000] border border-[#8B0000] rounded-lg text-sm font-medium hover:bg-red-50 transition"
                onclick="(function(){ const id='<?= $san_pham['id'] ?>'; const bt=document.getElementById('id_bien_the_input'); const qty=document.getElementById('quantity'); CartHelper.addDirect(id, bt?bt.value:null, qty?parseInt(qty.value):1); })()">
                Thêm giỏ
            </button>
            <button class="flex-1 py-2.5 px-2 bg-[#8B0000] text-white rounded-lg text-sm font-medium shadow-md hover:bg-[#7A0C0C] transition"
                onclick="(function(){ const id='<?= $san_pham['id'] ?>'; const bt=document.getElementById('id_bien_the_input'); const qty=document.getElementById('quantity'); CartHelper.buyNow(id, bt?bt.value:null, qty?parseInt(qty.value):1); })()">
                Mua ngay
            </button>
        </div>
    </div>
</div>

<script>
    // JS logic để hiển thị thanh mua hàng khi cuộn qua phần thông tin
    document.addEventListener('DOMContentLoaded', function() {
        const stickyBar = document.getElementById('sticky-buy-bar');
        // Chọn phần tử mà khi cuộn qua nó, thanh sticky sẽ hiện lên
        // Ở đây giả sử cuộn qua khu vực nút mua ở phần thông tin sản phẩm chính
        const targetElement = document.querySelector('.product-action-area'); 
        
        if (!stickyBar) return;

        window.addEventListener('scroll', function() {
            // Hiển thị trên mobile khi cuộn xuống 500px
            if (window.scrollY > 500) {
                stickyBar.classList.remove('translate-y-full');
            } else {
                stickyBar.classList.add('translate-y-full');
            }
        });
    });
</script>
