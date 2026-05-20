<div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-6">
    <div class="flex items-center justify-between w-full md:w-auto md:justify-start gap-4">
        <h1 class="text-2xl md:text-3xl font-serif text-[#8B0000]">Giỏ hàng của bạn</h1>
        <span class="text-gray-500 bg-white px-3 py-1 rounded-full text-sm border border-gray-200 shadow-sm hidden md:inline-block">
            <span class="font-bold text-[#8B0000]"><?php echo count($gio_hang ?? []); ?></span> Sản phẩm
        </span>
    </div>
</div>
