<?php
// Mảng chứa thông tin các menu item trong sidebar
$menuItems = [
    [
        'id' => 'tong-quan',
        'title' => 'Tổng quan',
        'icon' => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>'
    ],
    [
        'id' => 'ho-so',
        'title' => 'Hồ sơ cá nhân',
        'icon' => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>'
    ],
    [
        'id' => 'hang-thanh-vien',
        'title' => 'Hạng thành viên',
        'icon' => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>'
    ],
    [
        'id' => 'dia-chi',
        'title' => 'Sổ địa chỉ',
        'icon' => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>'
    ],
    [
        'id' => 'don-hang',
        'title' => 'Quản lý đơn hàng',
        'icon' => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>'
    ],
    [
        'id' => 'voucher',
        'title' => 'Kho Voucher',
        'icon' => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>'
    ],
    [
        'id' => 'yeu-thich',
        'title' => 'Sản phẩm yêu thích',
        'icon' => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>'
    ],
    [
        'id' => 'hop-thu',
        'title' => 'Thông báo',
        'icon' => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>',
        'badge' => 3
    ],
    [
        'id' => 'bao-mat',
        'title' => 'Đổi mật khẩu',
        'icon' => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>'
    ]
];
?>

<!-- User Profile Summary in Sidebar -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6 text-center">
    <div class="relative inline-block mb-4">
        <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center mx-auto border-4 border-white shadow-md overflow-hidden">
            <!-- Thay bằng ảnh đại diện thật nếu có -->
            <svg class="w-10 h-10 text-[#8b0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
        </div>
        <button class="absolute bottom-0 right-0 bg-white rounded-full p-1.5 shadow border border-gray-200 text-gray-500 hover:text-[#8b0000] transition-colors" title="Đổi ảnh đại diện">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        </button>
    </div>
    <h3 class="text-lg font-bold text-gray-900">Nguyễn Văn A</h3>
    <div class="inline-flex items-center mt-2 px-3 py-1 rounded-full bg-yellow-50 border border-yellow-200">
        <svg class="w-4 h-4 text-yellow-500 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        <span class="text-xs font-medium text-yellow-700">Thành viên Vàng</span>
    </div>
</div>

<!-- Mobile Tab Selector -->
<div class="lg:hidden mb-6">
    <select id="mobile-tab-select" class="block w-full rounded-xl border-gray-300 py-3 pl-4 pr-10 text-base focus:border-[#8b0000] focus:outline-none focus:ring-[#8b0000] sm:text-sm shadow-sm bg-white">
        <?php foreach ($menuItems as $item): ?>
            <option value="tab-<?= $item['id'] ?>"><?= $item['title'] ?><?= isset($item['badge']) ? " ({$item['badge']})" : "" ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Desktop Sidebar Navigation -->
<div class="hidden lg:block bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <nav class="flex flex-col py-2">
        <?php foreach ($menuItems as $index => $item): ?>
            <a href="#" data-target="tab-<?= $item['id'] ?>" class="tab-link flex items-center px-6 py-3.5 <?= $index === 0 ? 'bg-[#8b0000] text-white shadow-md' : 'text-gray-700 hover:bg-red-50 hover:text-[#8b0000]' ?> transition-all duration-200 font-medium group">
                <!-- Icon with color transition -->
                <div class="[&>svg]:transition-colors [&>svg]:duration-200 <?= $index === 0 ? '[&>svg]:text-white' : '[&>svg]:text-gray-400 group-hover:[&>svg]:text-[#8b0000]' ?>">
                    <?= $item['icon'] ?>
                </div>
                <span class="flex-1"><?= $item['title'] ?></span>
                <?php if(isset($item['badge'])): ?>
                    <span class="badge-pill inline-flex items-center justify-center px-2 py-0.5 ml-2 text-xs font-bold rounded-full transition-colors <?= $index === 0 ? 'bg-white text-[#8b0000]' : 'bg-red-100 text-red-600 group-hover:bg-[#8b0000] group-hover:text-white' ?>"><?= $item['badge'] ?></span>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
        
        <div class="h-px bg-gray-100 my-2 mx-4"></div>
        
        <a href="<?= APP_URL ?>/dang-xuat" class="flex items-center px-6 py-3.5 text-gray-700 hover:bg-red-50 hover:text-[#8b0000] transition-all duration-200 font-medium group">
            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-[#8b0000] transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            Đăng xuất
        </a>
    </nav>
</div>
