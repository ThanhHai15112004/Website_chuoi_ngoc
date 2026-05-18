<!-- Main Content -->
<main class="min-h-screen bg-[#FDFBF7] pb-20">
    
    <!-- Banner -->
    <?php require_once __DIR__ . '/../components/lien_he/banner.php'; ?>

    <!-- Breadcrumb (nằm dưới banner) -->
    <?php
    $breadcrumb_items = [
        ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
        ['ten' => 'Liên Hệ', 'url' => null, 'icon' => 'ph:envelope-bold'],
    ];
    require_once __DIR__ . '/../components/common/breadcrumb.php';
    ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 relative z-10">
        <!-- Quick Contact Cards -->
        <?php require_once __DIR__ . '/../components/lien_he/lien_he_nhanh.php'; ?>
        
        <div class="mt-16 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Consultation -->
            <div class="lg:col-span-2">
                <?php require_once __DIR__ . '/../components/lien_he/form_tu_van.php'; ?>
            </div>
            <!-- Store Info -->
            <div class="lg:col-span-1 space-y-8">
                <?php require_once __DIR__ . '/../components/lien_he/thong_tin_cua_hang.php'; ?>
                <?php require_once __DIR__ . '/../components/lien_he/chinh_sach_phan_hoi.php'; ?>
            </div>
        </div>

        <div class="mt-16">
             <!-- Map -->
             <?php require_once __DIR__ . '/../components/lien_he/ban_do.php'; ?>
        </div>

        <div class="mt-16">
            <!-- Online Support -->
            <?php require_once __DIR__ . '/../components/lien_he/ho_tro_truc_tuyen.php'; ?>
        </div>

        <div class="mt-16">
             <!-- FAQ -->
             <?php require_once __DIR__ . '/../components/lien_he/cau_hoi_thuong_gap.php'; ?>
        </div>
        
        <div class="mt-16">
             <!-- Useful Links -->
             <?php require_once __DIR__ . '/../components/lien_he/lien_ket_huu_ich.php'; ?>
        </div>

    </div>

</main>
