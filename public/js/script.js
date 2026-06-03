// Countdown Timer for Flash Sale (supports both homepage and khuyen-mai page)
document.addEventListener('DOMContentLoaded', () => {
    // Initialize timers for all flash sale countdown elements
    initFlashSaleTimer('flash-sale-timer');
    initFlashSaleTimer('flash-sale-timer-page');

    function initFlashSaleTimer(elementId) {
        const timerElement = document.getElementById(elementId);
        if (!timerElement) return;

        const endTimeStr = timerElement.getAttribute('data-endtime');
        if (!endTimeStr) return; // No endtime = no timer

        const endTime = new Date(endTimeStr.replace(' ', 'T')).getTime();

        // Find the 3 time display elements (span or div with background)
        const getTimeSlots = () => {
            // Try spans with inline background style (homepage)
            let slots = timerElement.querySelectorAll('span[style*="background"]');
            if (slots.length >= 3) return slots;
            // Try divs with Tailwind bg class (khuyen-mai page)
            slots = timerElement.querySelectorAll('div[class*="bg-"]');
            if (slots.length >= 3) return slots;
            return [];
        };

        const updateTimer = () => {
            const now = new Date().getTime();
            const distance = endTime - now;

            if (distance < 0) {
                clearInterval(interval);
                timerElement.innerHTML = '<span class="text-xs font-semibold text-gray-500">Đã kết thúc</span>';
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            const daysSlot = timerElement.querySelector('.timer-day');
            const daySepSlot = timerElement.querySelector('.timer-day-sep');
            const hoursSlot = timerElement.querySelector('.timer-hour');
            const minsSlot = timerElement.querySelector('.timer-min');
            const secsSlot = timerElement.querySelector('.timer-sec');

            if (hoursSlot && minsSlot && secsSlot) {
                if (daysSlot) {
                    if (days > 0) {
                        daysSlot.textContent = days.toString().padStart(2, '0');
                        daysSlot.style.display = '';
                        if (daySepSlot) daySepSlot.style.display = '';
                    } else {
                        daysSlot.style.display = 'none';
                        if (daySepSlot) daySepSlot.style.display = 'none';
                    }
                }
                hoursSlot.textContent = hours.toString().padStart(2, '0');
                minsSlot.textContent = minutes.toString().padStart(2, '0');
                secsSlot.textContent = seconds.toString().padStart(2, '0');
            } else {
                const totalHours = Math.floor(distance / (1000 * 60 * 60));
                const slots = getTimeSlots();
                if (slots.length >= 3) {
                    slots[0].textContent = totalHours.toString().padStart(2, '0');
                    slots[1].textContent = minutes.toString().padStart(2, '0');
                    slots[2].textContent = seconds.toString().padStart(2, '0');
                }
            }
        };

        updateTimer();
        const interval = setInterval(updateTimer, 1000);
    }

  // Header smooth transition on scroll
  const header = document.querySelector("header");
  if (header) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 50) {
        header.classList.add("shadow-md");
        header.classList.remove("py-4");
        header.classList.add("py-2");
      } else {
        header.classList.remove("shadow-md");
        header.classList.add("py-4");
        header.classList.remove("py-2");
      }
    });
  }

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      const targetId = this.getAttribute("href");
      if (targetId === "#") return;

      const target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });

  // Initialize Swiper for Hero Banner
  const heroSwiperElement = document.querySelector(".hero-swiper");
  if (heroSwiperElement && typeof Swiper !== "undefined") {
    new Swiper(".hero-swiper", {
      loop: true,
      effect: "fade",
      fadeEffect: { crossFade: true },
      speed: 1000,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }

  // Initialize CountUp for stats when they scroll into view
  const statsSection = document.getElementById("stats-section");
  if (statsSection && window.countUp) {
    const observer = new IntersectionObserver(
      (entries) => {
        if (entries[0].isIntersecting) {
          document.querySelectorAll(".countup").forEach((el) => {
            const target = parseInt(el.getAttribute("data-target"), 10);
            if (!isNaN(target)) {
              const countUpOptions = {
                duration: 2.5,
                separator: ".",
              };
              const numAnim = new countUp.CountUp(el, target, countUpOptions);
              if (!numAnim.error) {
                numAnim.start();
              }
            }
          });
          observer.disconnect(); // Run only once
        }
      },
      { threshold: 0.5 },
    );

    observer.observe(statsSection);
  }

  // ===== Product Page: Filter Sidebar =====

  // Mobile filter toggle
  const btnOpenFilter = document.getElementById("btn-open-filter");
  const filterSidebar = document.getElementById("filter-sidebar");

  if (btnOpenFilter && filterSidebar) {
    btnOpenFilter.addEventListener("click", () => {
      filterSidebar.classList.toggle("mobile-filter-open");
      document.body.classList.toggle("overflow-hidden");
    });
  }

  // Menh button toggle (active state)
  document
    .querySelectorAll(
      '.filter-content .menh-btn, .filter-content button[class*="rounded-full"][class*="border-2"]',
    )
    .forEach((btn) => {
      btn.addEventListener("click", () => {
        btn.classList.toggle("ring-2");
        btn.classList.toggle("ring-offset-1");
        btn.classList.toggle("scale-95");
      });
    });
});

// ===== Global Filter Functions =====

function toggleFilter(button) {
  const group = button.closest(".filter-group");
  const content = group.querySelector(".filter-content");
  const arrow = group.querySelector(".filter-arrow");

  if (content.style.display === "none") {
    content.style.display = "";
    arrow.style.transform = "rotate(0deg)";
  } else {
    content.style.display = "none";
    arrow.style.transform = "rotate(-90deg)";
  }
}

function closeMobileFilter() {
  const filterSidebar = document.getElementById("filter-sidebar");
  if (filterSidebar) {
    filterSidebar.classList.remove("mobile-filter-open");
    document.body.classList.remove("overflow-hidden");
  }
}

// ===== Lưu Mã Khuyến Mãi =====
function saveVoucher(appUrl, voucherId, btnElement) {
  const originalText = btnElement.innerText;
  btnElement.innerText = "Đang lưu...";
  btnElement.disabled = true;

  fetch(appUrl + "/khuyen-mai/luu-voucher", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "voucher_id=" + encodeURIComponent(voucherId),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        btnElement.innerText = "Đã lưu";
        btnElement.style.background = "#8b0000";
        btnElement.style.color = "#fff";
        if (typeof Swal !== "undefined") {
          Swal.fire({
            icon: "success",
            title: "Lưu mã thành công",
            text: data.message,
            timer: 2000,
            showConfirmButton: false,
          });
        } else {
          alert("Lưu mã thành công: " + data.message);
        }
      } else {
        btnElement.innerText = originalText;
        btnElement.disabled = false;
        if (typeof Swal !== "undefined") {
          Swal.fire({
            icon: "warning",
            title: "Thông báo",
            text: data.message,
          });
        } else {
          alert(data.message);
        }
      }
    })
    .catch((error) => {
      console.error("Error saving voucher:", error);
      btnElement.innerText = originalText;
      btnElement.disabled = false;
      alert("Có lỗi xảy ra, vui lòng thử lại sau.");
    });
}
