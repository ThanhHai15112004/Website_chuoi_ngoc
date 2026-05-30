<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $tieu_de ?? 'Đăng nhập Quản Trị Cao Cấp - Chuỗi Ngọc Phong Thủy' ?></title>
    <meta name="view-transition" content="same-origin">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --color-crimson: #6B0D18;
            --color-crimson-dark: #4C0519;
            --color-crimson-light: #9B1C31;
            --color-gold: #C5A880;
            --color-gold-light: #E4D5C3;
            --color-gold-dark: #9A7B56;
        }
        @keyframes fadeInPage {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #FAF8F5;
            animation: fadeInPage 0.3s ease-out forwards;
        }
        .font-luxury {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Floating particles / sacred geometry background animation */
        @keyframes rotateSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        @keyframes pulseGlow {
            0%, 100% { opacity: 0.15; transform: scale(1); }
            50% { opacity: 0.25; transform: scale(1.08); }
        }
        .animated-mandala {
            animation: rotateSlow 80s linear infinite;
        }
        .pulse-glow-circle {
            animation: pulseGlow 12s ease-in-out infinite;
        }
        
        /* Smooth state transitions */
        .auth-card-transition {
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        /* Gold gradient styling */
        .gold-text-gradient {
            background: linear-gradient(135deg, var(--color-gold-light) 0%, var(--color-gold) 50%, var(--color-gold-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Custom marble overlay */
        .marble-bg {
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(228, 213, 195, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(107, 13, 24, 0.05) 0%, transparent 50%);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #E4D5C3;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #C5A880;
        }
    </style>
</head>
<body class="bg-[#FAF8F5] text-gray-800 h-screen flex overflow-hidden marble-bg">
    <?php if (isset($is_auth_page) && $is_auth_page): ?>
        <?= $content ?? '' ?>
    <?php else: ?>
        <!-- Sidebar -->
        <?php include __DIR__ . '/../components/Admin/sidebar.php'; ?>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden">
            <!-- Topbar -->
            <?php include __DIR__ . '/../components/Admin/header.php'; ?>
            
            <!-- Dashboard Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-transparent p-6">
                <?= $content ?? '' ?>
            </main>
        </div>
    <?php endif; ?>

    <!-- Global Toast Component -->
    <?php require_once __DIR__ . '/../components/common/toast.php'; ?>
</body>
</html>
