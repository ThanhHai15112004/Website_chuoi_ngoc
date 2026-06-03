<!-- Main Content -->
<main class="min-h-screen bg-[#FDFBF7] pb-20 pt-8">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <?php
        $breadcrumb_items = [
            ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
            ['ten' => 'Tài Khoản', 'url' => null, 'icon' => 'ph:user-bold'],
        ];
        require_once __DIR__ . '/../components/common/breadcrumb.php';
        ?>

        <!-- Page Header -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Tài khoản <span style="color: #8b0000;">cá nhân</span></h1>
            <p class="text-sm text-gray-500">Quản lý thông tin, đơn hàng và ưu đãi của bạn tại Chuỗi Ngọc Phong Thủy.</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar -->
            <div class="lg:w-1/4 flex-shrink-0">
                <?php require_once __DIR__ . '/../components/User/tai_khoan/sidebar.php'; ?>
            </div>

            <!-- Tab Content Area -->
            <div class="lg:w-3/4">
                
                <div id="tab-tong-quan" class="tab-content block">
                    <?php require_once __DIR__ . '/../components/User/tai_khoan/tong_quan.php'; ?>
                </div>

                <div id="tab-ho-so" class="tab-content hidden">
                    <?php require_once __DIR__ . '/../components/User/tai_khoan/ho_so.php'; ?>
                </div>

                <div id="tab-hang-thanh-vien" class="tab-content hidden">
                    <?php require_once __DIR__ . '/../components/User/tai_khoan/hang_thanh_vien.php'; ?>
                </div>

                <div id="tab-dia-chi" class="tab-content hidden">
                    <?php require_once __DIR__ . '/../components/User/tai_khoan/dia_chi.php'; ?>
                </div>

                <div id="tab-don-hang" class="tab-content hidden">
                    <?php require_once __DIR__ . '/../components/User/tai_khoan/don_hang.php'; ?>
                </div>

                <div id="tab-voucher" class="tab-content hidden">
                    <?php require_once __DIR__ . '/../components/User/tai_khoan/voucher.php'; ?>
                </div>

                <div id="tab-yeu-thich" class="tab-content hidden">
                    <?php require_once __DIR__ . '/../components/User/tai_khoan/yeu_thich.php'; ?>
                </div>

                <div id="tab-hop-thu" class="tab-content hidden">
                    <?php require_once __DIR__ . '/../components/User/tai_khoan/hop_thu.php'; ?>
                </div>

                <div id="tab-danh-gia" class="tab-content hidden">
                    <?php require_once __DIR__ . '/../components/User/tai_khoan/danh_gia.php'; ?>
                </div>

                <div id="tab-bao-mat" class="tab-content hidden">
                    <?php require_once __DIR__ . '/../components/User/tai_khoan/bao_mat.php'; ?>
                </div>

                <div id="tab-ban-menh" class="tab-content hidden">
                    <?php require_once __DIR__ . '/../components/User/tai_khoan/lich_su_ban_menh.php'; ?>
                </div>

            </div>

        </div>

    </div>

</main>

<!-- Script to handle Tab Switching -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');
        
        // Handle Mobile Select change
        const mobileSelect = document.getElementById('mobile-tab-select');
        if (mobileSelect) {
            mobileSelect.addEventListener('change', function() {
                switchTab(this.value);
                history.pushState(null, null, '#' + this.value);
            });
        }

        tabLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('data-target');
                switchTab(target);
                
                // Sync mobile select if exists
                if (mobileSelect) {
                    mobileSelect.value = target;
                }
                
                // Update URL hash
                history.pushState(null, null, '#' + target);
            });
        });

        function switchTab(targetId) {
            // Hide all contents
            tabContents.forEach(content => {
                content.classList.add('hidden');
                content.classList.remove('block', 'animate-fade-in');
            });

            // Show target content
            const targetContent = document.getElementById(targetId);
            if(targetContent) {
                targetContent.classList.remove('hidden');
                targetContent.classList.add('block', 'animate-fade-in');
            }

            // Update Active state for Sidebar Links
            tabLinks.forEach(link => {
                if(link.getAttribute('data-target') === targetId) {
                    // Set Active Style
                    link.classList.add('bg-[#8b0000]', 'text-white', 'shadow-md');
                    link.classList.remove('text-gray-700', 'hover:bg-red-50');
                    
                    // Update icon color to white
                    const icon = link.querySelector('svg');
                    if(icon) {
                        icon.classList.remove('text-gray-400');
                        icon.classList.add('text-white');
                    }
                } else {
                    // Set Inactive Style
                    link.classList.remove('bg-[#8b0000]', 'text-white', 'shadow-md');
                    link.classList.add('text-gray-700', 'hover:bg-red-50');
                    
                    // Update icon color to gray
                    const icon = link.querySelector('svg');
                    if(icon) {
                        icon.classList.remove('text-white');
                        icon.classList.add('text-gray-400');
                    }
                }
            });
            
            // Scroll to top of content on mobile
            if(window.innerWidth < 1024) {
                const targetEl = document.getElementById(targetId);
                if(targetEl) {
                    targetEl.scrollIntoView({behavior: 'smooth', block: 'start'});
                }
            }
        }
        
        // Check hash on load
        if (window.location.hash) {
            const hash = window.location.hash.substring(1); // remove #
            if (document.getElementById(hash)) {
                switchTab(hash);
                if (mobileSelect) {
                    mobileSelect.value = hash;
                }
            }
        }
        
        // Listen for hash changes (e.g., clicking anchor links from the header while already on the page)
        window.addEventListener('hashchange', function() {
            if (window.location.hash) {
                const hash = window.location.hash.substring(1); // remove #
                if (document.getElementById(hash)) {
                    switchTab(hash);
                    if (mobileSelect) {
                        mobileSelect.value = hash;
                    }
                }
            }
        });
    });
</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.4s ease-out forwards;
    }
</style>


