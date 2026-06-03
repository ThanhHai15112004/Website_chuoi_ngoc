<section id="tra-cuu" class="py-16 relative" style="background:linear-gradient(180deg,#FAF7F2,#fff);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-8" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4" style="color:#8b0000;">Khám Phá Bản Mệnh Của Bạn</h2>
                <p class="text-gray-600">Nhập thông tin cá nhân để nhận bản phân tích bản mệnh phong thủy chi tiết và gợi ý vòng trang sức phù hợp nhất.</p>
            </div>
            
            <div class="bg-white p-8 md:p-10 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.07)] border border-gray-100" data-aos="fade-up" data-aos-delay="100">
                <form id="fengshuiForm" class="space-y-7" novalidate>
                    
                    <!-- Row 1: Loại lịch -->
                    <div class="space-y-3">
                        <label class="block text-sm font-semibold text-gray-800">Bạn nhập theo lịch nào? *</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="lich_type" value="duong" class="peer" style="display:none;" checked>
                                <div class="flex items-center justify-center gap-2 px-4 py-3 border-2 border-gray-200 rounded-xl peer-checked:border-[#8b0000] peer-checked:bg-red-50 transition-all text-center">
                                    <iconify-icon icon="mdi:white-balance-sunny" class="text-xl text-gray-400 peer-checked:text-[#8b0000]"></iconify-icon>
                                    <span class="text-sm font-medium text-gray-700">Dương lịch</span>
                                </div>
                            </label>
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="lich_type" value="am" class="peer" style="display:none;">
                                <div class="flex items-center justify-center gap-2 px-4 py-3 border-2 border-gray-200 rounded-xl peer-checked:border-[#8b0000] peer-checked:bg-red-50 transition-all text-center">
                                    <iconify-icon icon="mdi:moon-waning-crescent" class="text-xl text-gray-400 peer-checked:text-[#8b0000]"></iconify-icon>
                                    <span class="text-sm font-medium text-gray-700">Âm lịch</span>
                                </div>
                            </label>
                        </div>
                        <p class="text-xs text-amber-600 bg-amber-50 px-3 py-2 rounded-lg">
                            <iconify-icon icon="mdi:information-outline" class="inline mr-1"></iconify-icon>
                            Nếu sinh từ <strong>01/01 đến trước ngày Tết Nguyên Đán</strong> theo dương lịch, mệnh phong thủy thuộc năm trước. Hãy nhập đúng ngày để hệ thống tự động xác định.
                        </p>
                    </div>

                    <!-- Row 2: Ngày/Tháng/Năm sinh + Giới tính -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Ngày tháng năm sinh -->
                        <div class="space-y-3">
                            <label class="block text-sm font-semibold text-gray-800">Ngày sinh *</label>
                            <div class="grid grid-cols-3 gap-2">
                                <div class="relative">
                                    <select id="birthDay" name="birth_day" required class="block w-full px-3 py-3 border-2 border-gray-200 rounded-xl focus:ring-0 focus:border-[#8b0000] bg-gray-50 focus:bg-white transition-all text-gray-800 font-medium text-sm" style="-webkit-appearance:none;-moz-appearance:none;appearance:none;">
                                        <option value="" disabled selected>Ngày</option>
                                        <?php for ($d = 1; $d <= 31; $d++): ?>
                                        <option value="<?= $d ?>"><?= sprintf('%02d', $d) ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="relative">
                                    <select id="birthMonth" name="birth_month" required class="block w-full px-3 py-3 border-2 border-gray-200 rounded-xl focus:ring-0 focus:border-[#8b0000] bg-gray-50 focus:bg-white transition-all text-gray-800 font-medium text-sm" style="-webkit-appearance:none;-moz-appearance:none;appearance:none;">
                                        <option value="" disabled selected>Tháng</option>
                                        <?php for ($m = 1; $m <= 12; $m++): ?>
                                        <option value="<?= $m ?>">Tháng <?= $m ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="relative">
                                    <input type="number" id="birthYear" name="birth_year" required min="1920" max="<?= date('Y') ?>" placeholder="Năm" class="block w-full px-3 py-3 border-2 border-gray-200 rounded-xl focus:ring-0 focus:border-[#8b0000] bg-gray-50 focus:bg-white transition-all text-gray-800 font-medium text-sm" />
                                </div>
                            </div>
                        </div>
                        
                        <!-- Giới tính -->
                        <div class="space-y-3">
                            <label class="block text-sm font-semibold text-gray-800">Giới tính *</label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="cursor-pointer">
                                    <input type="radio" name="gender" value="male" class="peer" style="display:none;">
                                    <div class="flex items-center justify-center gap-2 px-3 py-3 border-2 border-gray-200 rounded-xl peer-checked:border-[#8b0000] peer-checked:bg-red-50 transition-all text-sm font-medium text-gray-700 peer-checked:text-[#8b0000]">
                                        <iconify-icon icon="mdi:gender-male" class="text-xl"></iconify-icon> Nam
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="gender" value="female" class="peer" style="display:none;">
                                    <div class="flex items-center justify-center gap-2 px-3 py-3 border-2 border-gray-200 rounded-xl peer-checked:border-[#8b0000] peer-checked:bg-red-50 transition-all text-sm font-medium text-gray-700 peer-checked:text-[#8b0000]">
                                        <iconify-icon icon="mdi:gender-female" class="text-xl"></iconify-icon> Nữ
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Nhu cầu -->
                    <div class="space-y-4 pt-4 border-t border-gray-100">
                        <label class="block text-sm font-semibold text-gray-800 text-center mb-2">Mong muốn của bạn <span class="font-normal text-gray-400">(Tùy chọn)</span></label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="desire" value="tai_loc" class="peer" style="display:none;">
                                <div class="px-3 py-4 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[#fdf9f0] peer-checked:text-[#b5952f] group-hover:border-gray-300 transition-all flex flex-col items-center justify-center gap-2 h-full min-h-[90px]">
                                    <iconify-icon icon="mdi:cash-multiple" class="text-2xl opacity-80"></iconify-icon>
                                    <span>Tài Lộc & Công Danh</span>
                                </div>
                            </label>
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="desire" value="binh_an" class="peer" style="display:none;">
                                <div class="px-3 py-4 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[#fdf9f0] peer-checked:text-[#b5952f] group-hover:border-gray-300 transition-all flex flex-col items-center justify-center gap-2 h-full min-h-[90px]">
                                    <iconify-icon icon="mdi:cards-heart-outline" class="text-2xl opacity-80"></iconify-icon>
                                    <span>Bình An & Sức Khỏe</span>
                                </div>
                            </label>
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="desire" value="tinh_duyen" class="peer" style="display:none;">
                                <div class="px-3 py-4 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[#fdf9f0] peer-checked:text-[#b5952f] group-hover:border-gray-300 transition-all flex flex-col items-center justify-center gap-2 h-full min-h-[90px]">
                                    <iconify-icon icon="mdi:heart-outline" class="text-2xl opacity-80"></iconify-icon>
                                    <span>Tình Duyên & Gia Đạo</span>
                                </div>
                            </label>
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="desire" value="ho_menh" class="peer" style="display:none;">
                                <div class="px-3 py-4 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[#fdf9f0] peer-checked:text-[#b5952f] group-hover:border-gray-300 transition-all flex flex-col items-center justify-center gap-2 h-full min-h-[90px]">
                                    <iconify-icon icon="mdi:shield-check-outline" class="text-2xl opacity-80"></iconify-icon>
                                    <span>Hộ Mệnh Chống Tà</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Error message -->
                    <div id="form-error" class="hidden px-4 py-3 rounded-xl text-sm text-red-700 bg-red-50 border border-red-200 flex items-center gap-2">
                        <iconify-icon icon="mdi:alert-circle-outline" class="text-xl shrink-0"></iconify-icon>
                        <span id="form-error-text"></span>
                    </div>

                    <div class="pt-2">
                        <button type="submit" id="submitBtn" class="w-full flex items-center justify-center gap-2 py-4 rounded-xl text-white font-bold text-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl shadow-[0_10px_20px_rgba(139,0,0,0.15)]" style="background: linear-gradient(135deg, #8b0000, #a52a2a);">
                            <span id="submitText">Xem Kết Quả Phong Thủy</span>
                            <iconify-icon icon="mdi:arrow-right" class="text-xl" id="submitIcon"></iconify-icon>
                            <svg id="submitLoader" class="hidden w-6 h-6 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('fengshuiForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const btn     = document.getElementById('submitBtn');
    const errBox  = document.getElementById('form-error');
    const errText = document.getElementById('form-error-text');

    // Hide old error
    errBox.classList.add('hidden');

    // Client-side validation
    const day      = document.getElementById('birthDay').value;
    const month    = document.getElementById('birthMonth').value;
    const year     = document.getElementById('birthYear').value;
    const gender   = document.querySelector('input[name="gender"]:checked')?.value;
    const desire   = document.querySelector('input[name="desire"]:checked')?.value || '';
    const lichType = document.querySelector('input[name="lich_type"]:checked')?.value || 'duong';

    if (!day || !month || !year) {
        showError('Vui lòng chọn đầy đủ ngày, tháng, năm sinh.');
        return;
    }
    if (!gender) {
        showError('Vui lòng chọn giới tính.');
        return;
    }

    // Loading state
    btn.disabled = true;
    document.getElementById('submitText').textContent = 'Đang phân tích bản mệnh...';
    document.getElementById('submitIcon').classList.add('hidden');
    document.getElementById('submitLoader').classList.remove('hidden');

    try {
        const formData = new FormData();
        formData.append('birth_day', day);
        formData.append('birth_month', month);
        formData.append('birth_year', year);
        formData.append('gender', gender);
        formData.append('desire', desire);
        formData.append('lich_type', lichType);

        const res  = await fetch('<?= APP_URL ?>/vong-theo-menh/phan-tich', {
            method: 'POST',
            body: formData
        });
        const data = await res.json();

        if (data.success && data.redirect_url) {
            window.location.href = data.redirect_url;
        } else if (data.require_login) {
            // Save form to session
            const fd = new FormData(document.getElementById('fengshuiForm'));
            const savedData = {};
            fd.forEach((v, k) => savedData[k] = v);
            sessionStorage.setItem('pending_fengshui', JSON.stringify(savedData));
            
            // Show SweetAlert2 Toast instead of normal text error
            resetBtn();
            if (typeof Toast !== 'undefined') {
                Toast.fire({
                    icon: 'warning',
                    title: data.message || 'Vui lòng đăng nhập để tra cứu bản mệnh.'
                });
            } else {
                alert(data.message || 'Vui lòng đăng nhập để tra cứu bản mệnh.');
            }

            // Delay redirect to let user see the Toast
            setTimeout(() => {
                window.location.href = '<?= APP_URL ?>/dang-nhap?redirect=' + encodeURIComponent('<?= APP_URL ?>/vong-theo-menh?auto=1');
            }, 5000);
        } else {
            const msg = (data.errors || ['Có lỗi xảy ra, vui lòng thử lại.']).join(' ');
            showError(msg);
            resetBtn();
        }
    } catch (err) {
        showError('Không thể kết nối tới máy chủ. Vui lòng thử lại.');
        resetBtn();
    }

    function showError(msg) {
        errText.textContent = msg;
        errBox.classList.remove('hidden');
    }
    function resetBtn() {
        btn.disabled = false;
        document.getElementById('submitText').textContent = 'Xem Kết Quả Phong Thủy';
        document.getElementById('submitIcon').classList.remove('hidden');
        document.getElementById('submitLoader').classList.add('hidden');
    }
});

// Auto fill & submit if redirect back from login
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('auto') && <?= !empty($_SESSION['user_id']) ? 'true' : 'false' ?>) {
        const saved = sessionStorage.getItem('pending_fengshui');
        if (saved) {
            try {
                const data = JSON.parse(saved);
                if (data.birth_day) document.getElementById('birthDay').value = data.birth_day;
                if (data.birth_month) document.getElementById('birthMonth').value = data.birth_month;
                if (data.birth_year) document.getElementById('birthYear').value = data.birth_year;
                
                if (data.gender) {
                    const el = document.querySelector(`input[name="gender"][value="${data.gender}"]`);
                    if (el) el.checked = true;
                }
                if (data.desire) {
                    const el = document.querySelector(`input[name="desire"][value="${data.desire}"]`);
                    if (el) el.checked = true;
                }
                if (data.lich_type) {
                    const el = document.querySelector(`input[name="lich_type"][value="${data.lich_type}"]`);
                    if (el) el.checked = true;
                }
                
                // Clear session storage and auto submit
                sessionStorage.removeItem('pending_fengshui');
                document.getElementById('submitBtn').click();
            } catch (e) {
                console.error('Error auto-filling form', e);
            }
        }
    }
});
</script>
