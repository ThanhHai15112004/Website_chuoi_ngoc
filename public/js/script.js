// Countdown Timer for Flash Sale
document.addEventListener('DOMContentLoaded', () => {
    const timerElement = document.getElementById('flash-sale-timer');
    if (timerElement) {
        // Initialize with 5 hours, 23 minutes, 18 seconds (as in HTML)
        let hours = 5;
        let minutes = 23;
        let seconds = 18;

        const updateTimer = () => {
            if (seconds > 0) {
                seconds--;
            } else {
                seconds = 59;
                if (minutes > 0) {
                    minutes--;
                } else {
                    minutes = 59;
                    if (hours > 0) {
                        hours--;
                    } else {
                        // Reset or hide when finished
                        hours = 0;
                        minutes = 0;
                        seconds = 0;
                        clearInterval(interval);
                    }
                }
            }

            const spans = timerElement.querySelectorAll('span.bg-crimson-600');
            if (spans.length === 3) {
                spans[0].textContent = hours.toString().padStart(2, '0');
                spans[1].textContent = minutes.toString().padStart(2, '0');
                spans[2].textContent = seconds.toString().padStart(2, '0');
            }
        };

        const interval = setInterval(updateTimer, 1000);
    }

    // Header smooth transition on scroll
    const header = document.querySelector('header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('shadow-md');
                header.classList.remove('py-4');
                header.classList.add('py-2');
            } else {
                header.classList.remove('shadow-md');
                header.classList.add('py-4');
                header.classList.remove('py-2');
            }
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Initialize Swiper for Hero Banner
    const heroSwiperElement = document.querySelector('.hero-swiper');
    if (heroSwiperElement && typeof Swiper !== 'undefined') {
        new Swiper('.hero-swiper', {
            loop: true,
            effect: 'fade',
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    // Initialize CountUp for stats when they scroll into view
    const statsSection = document.getElementById('stats-section');
    if (statsSection && window.countUp) {
        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                document.querySelectorAll('.countup').forEach(el => {
                    const target = parseInt(el.getAttribute('data-target'), 10);
                    if (!isNaN(target)) {
                        const countUpOptions = {
                            duration: 2.5,
                            separator: '.',
                        };
                        const numAnim = new countUp.CountUp(el, target, countUpOptions);
                        if (!numAnim.error) {
                            numAnim.start();
                        }
                    }
                });
                observer.disconnect(); // Run only once
            }
        }, { threshold: 0.5 });
        
        observer.observe(statsSection);
    }

    // ===== Product Page: Filter Sidebar =====
    
    // Mobile filter toggle
    const btnOpenFilter = document.getElementById('btn-open-filter');
    const filterSidebar = document.getElementById('filter-sidebar');
    
    if (btnOpenFilter && filterSidebar) {
        btnOpenFilter.addEventListener('click', () => {
            filterSidebar.classList.toggle('mobile-filter-open');
            document.body.classList.toggle('overflow-hidden');
        });
    }

    // Menh button toggle (active state)
    document.querySelectorAll('.filter-content .menh-btn, .filter-content button[class*="rounded-full"][class*="border-2"]').forEach(btn => {
        btn.addEventListener('click', () => {
            btn.classList.toggle('ring-2');
            btn.classList.toggle('ring-offset-1');
            btn.classList.toggle('scale-95');
        });
    });
});

// ===== Global Filter Functions =====

function toggleFilter(button) {
    const group = button.closest('.filter-group');
    const content = group.querySelector('.filter-content');
    const arrow = group.querySelector('.filter-arrow');
    
    if (content.style.display === 'none') {
        content.style.display = '';
        arrow.style.transform = 'rotate(0deg)';
    } else {
        content.style.display = 'none';
        arrow.style.transform = 'rotate(-90deg)';
    }
}

function closeMobileFilter() {
    const filterSidebar = document.getElementById('filter-sidebar');
    if (filterSidebar) {
        filterSidebar.classList.remove('mobile-filter-open');
        document.body.classList.remove('overflow-hidden');
    }
}
