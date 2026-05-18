<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $tieu_de ?? 'Đăng Nhập / Đăng Ký - Chuỗi Ngọc Phong Thủy' ?></title>
    <meta name="description" content="<?= $mo_ta ?? 'Đăng nhập hoặc đăng ký tài khoản để trải nghiệm mua sắm tuyệt vời tại Chuỗi Ngọc Phong Thủy.' ?>">
    
    <!-- Tailwind CSS (Build output) -->
    <link rel="stylesheet" href="<?= APP_URL ?>/css/style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Iconify -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <style>
        /* Global Base Styles */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #333;
            background: #fdfbf7; /* Off-white background */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Float Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    
    <!-- Header Rút Gọn -->
    <header class="bg-white shadow-sm border-b border-gray-100 z-50 sticky top-0">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="<?= APP_URL ?>/" class="flex items-center gap-2 group">
                        <div class="w-10 h-10 bg-[#8b0000] rounded-full flex items-center justify-center text-white font-bold text-xl transition-transform duration-300 group-hover:rotate-12 shadow-md">
                            C
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-xl tracking-tight text-[#8b0000] leading-none">Chuỗi Ngọc</span>
                            <span class="text-xs text-gray-500 font-medium tracking-widest uppercase mt-1">Phong Thủy</span>
                        </div>
                    </a>
                </div>

                <!-- Hotline -->
                <div class="hidden sm:flex items-center gap-2 text-sm text-gray-600">
                    <span>Cần hỗ trợ?</span>
                    <a href="tel:1900xxxx" class="font-bold text-[#8b0000] hover:underline flex items-center gap-1">
                        <iconify-icon icon="ph:phone-call-fill"></iconify-icon>
                        1900 xxxx
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center">
        <!-- Render Page Content -->
        <?= $content ?? '' ?>
    </main>

    <!-- Footer Rút Gọn -->
    <footer class="bg-white py-6 border-t border-gray-100 mt-auto">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm text-gray-500">
                &copy; <?= date('Y') ?> Chuỗi Ngọc Phong Thủy. Bảo lưu mọi quyền.
            </p>
        </div>
    </footer>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true,
                offset: 50,
            });
        });
    </script>
</body>
</html>
