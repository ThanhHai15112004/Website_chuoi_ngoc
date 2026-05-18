<?php
// views/pages/gio_hang.php
?>
<div class="bg-slate-50 min-h-screen py-8 pb-32 md:pb-12">
    <div class="container mx-auto px-4">
        <?php require_once 'views/components/gio_hang/breadcrumb.php'; ?>
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-6">
            <div class="flex items-center justify-between w-full md:w-auto md:justify-start gap-4">
                <?php require_once 'views/components/gio_hang/tieu_de.php'; ?>
            </div>
        </div>

        <?php if(empty($gio_hang)): ?>
            <?php require_once 'views/components/gio_hang/gio_hang_trong.php'; ?>
        <?php else: ?>
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cột trái: Danh sách sản phẩm -->
                <div class="lg:w-2/3 space-y-4">
                    <?php require_once 'views/components/gio_hang/danh_sach_san_pham.php'; ?>
                </div>

                <!-- Cột phải: Tóm tắt đơn hàng -->
                <div class="lg:w-1/3">
                    <?php require_once 'views/components/gio_hang/tom_tat_don_hang.php'; ?>
                </div>
            </div>

            <!-- Sticky Checkout Bar for Mobile -->
            <div class="md:hidden fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-50 flex items-center justify-between">
                <div>
                    <span class="block text-xs text-gray-500">Tổng thanh toán</span>
                    <span class="block text-lg font-bold text-[#8B0000]"><?php echo number_format($tong_tam_tinh ?? 0, 0, ',', '.'); ?>đ</span>
                </div>
                <a href="<?= APP_URL ?>/thanh-toan" class="bg-[#8B0000] text-white font-medium py-3 px-6 rounded-xl hover:bg-red-800 transition-colors shadow-md shadow-red-900/20">
                    Mua hàng (<?php echo count($gio_hang); ?>)
                </a>
            </div>
            
            <!-- Khu vực Mua Thêm (Cross-sell) -->
            <?php if(!empty($san_pham_goi_y)): ?>
            <div class="mt-16 border-t border-gray-200 pt-10">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl md:text-2xl font-serif text-[#8B0000]">Phụ kiện nên mua kèm</h2>
                    <div class="flex gap-2">
                        <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:text-[#8B0000] hover:border-[#8B0000] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </button>
                        <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:text-[#8B0000] hover:border-[#8B0000] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                    <?php foreach($san_pham_goi_y as $sp): ?>
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg transition-all duration-300 flex flex-col h-full">
                            <!-- Hình ảnh -->
                            <div class="relative aspect-square overflow-hidden bg-gray-100">
                                <?php if($sp['nhan']): ?>
                                    <div class="absolute top-2 left-2 z-10 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded">
                                        <?php echo htmlspecialchars($sp['nhan']); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <img src="<?php echo htmlspecialchars($sp['hinh_anh']); ?>" alt="<?php echo htmlspecialchars($sp['ten']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                
                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <button class="w-10 h-10 bg-white/90 rounded-full flex items-center justify-center text-[#8B0000] hover:bg-[#8B0000] hover:text-white transition-colors transform translate-y-4 group-hover:translate-y-0 duration-300 shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Thông tin -->
                            <div class="p-4 flex flex-col flex-1">
                                <a href="#" class="text-sm font-medium text-gray-800 hover:text-[#8B0000] line-clamp-2 transition-colors mb-2">
                                    <?php echo htmlspecialchars($sp['ten']); ?>
                                </a>
                                
                                <div class="mt-auto">
                                    <!-- Đánh giá -->
                                    <div class="flex items-center gap-1 mb-2">
                                        <div class="flex text-yellow-400 text-[10px]">
                                            <?php for($i=1; $i<=5; $i++): ?>
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                            <?php endfor; ?>
                                        </div>
                                        <span class="text-[10px] text-gray-400 border-l border-gray-300 pl-1 ml-1">Đã bán <?php echo number_format($sp['da_ban'], 0, ',', '.'); ?></span>
                                    </div>
                                    
                                    <div class="flex items-baseline gap-2">
                                        <span class="font-bold text-[#8B0000]"><?php echo number_format($sp['gia'], 0, ',', '.'); ?>đ</span>
                                        <?php if($sp['gia_cu'] > 0): ?>
                                            <span class="text-xs text-gray-400 line-through"><?php echo number_format($sp['gia_cu'], 0, ',', '.'); ?>đ</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            
        <?php endif; ?>
    </div>
</div>
