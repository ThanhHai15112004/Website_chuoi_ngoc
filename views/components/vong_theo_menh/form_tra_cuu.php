<section id="tra-cuu" class="py-16 relative" style="background:linear-gradient(180deg,#FAF7F2,#fff);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-8" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4" style="color:#8b0000;">Khám Phá Bản Mệnh Của Bạn</h2>
                <p class="text-gray-600">Nhập thông tin cá nhân để tìm ra chiếc vòng tương sinh, tương hợp mang lại năng lượng tích cực nhất.</p>
            </div>
            
            <div class="bg-white p-8 md:p-10 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-gray-100" data-aos="fade-up" data-aos-delay="100">
                <form id="fengshuiForm" class="space-y-8">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Năm sinh -->
                        <div class="space-y-3">
                            <label class="block text-sm font-semibold text-gray-800">Năm sinh (Âm lịch/Dương lịch) *</label>
                            <div class="relative group">
                                <div class="absolute top-1/2 left-0 pl-4 -translate-y-1/2 flex items-center pointer-events-none">
                                    <iconify-icon icon="mdi:calendar-outline" class="text-xl text-gray-400 group-focus-within:text-[#8b0000] transition-colors"></iconify-icon>
                                </div>
                                <input type="number" id="birthYear" required min="1920" max="2025" placeholder="VD: 1995" class="block w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-0 focus:border-[#8b0000] bg-gray-50 focus:bg-white transition-all text-gray-800 font-medium" />
                            </div>
                        </div>
                        
                        <!-- Giới tính -->
                        <div class="space-y-3">
                            <label class="block text-sm font-semibold text-gray-800">Giới tính *</label>
                            <div class="relative group">
                                <div class="absolute top-1/2 left-0 pl-4 -translate-y-1/2 flex items-center pointer-events-none">
                                    <iconify-icon icon="mdi:account-outline" class="text-xl text-gray-400 group-focus-within:text-[#8b0000] transition-colors"></iconify-icon>
                                </div>
                                <select id="gender" required style="-webkit-appearance:none; -moz-appearance:none; appearance:none;" class="block w-full pl-12 pr-10 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-0 focus:border-[#8b0000] bg-gray-50 focus:bg-white transition-all appearance-none text-gray-800 font-medium">
                                    <option value="" disabled selected>Chọn giới tính</option>
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                </select>
                                <div class="absolute top-1/2 right-0 pr-4 -translate-y-1/2 flex items-center pointer-events-none">
                                    <iconify-icon icon="mdi:chevron-down" class="text-xl text-gray-400"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Nhu cầu -->
                    <div class="space-y-4 pt-4 border-t border-gray-100">
                        <label class="block text-sm font-semibold text-gray-800 text-center mb-2">Mong muốn của bạn (Tùy chọn)</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="desire" value="tai_loc" class="peer" style="display:none;">
                                <div class="px-3 py-3 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[#fdf9f0] peer-checked:text-[#b5952f] group-hover:border-gray-300 transition-all flex flex-col items-center justify-center gap-1 h-full">
                                    <iconify-icon icon="mdi:cash-multiple" class="text-2xl mb-1 opacity-80"></iconify-icon>
                                    Tài Lộc & Công Danh
                                </div>
                            </label>
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="desire" value="binh_an" class="peer" style="display:none;">
                                <div class="px-3 py-3 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[#fdf9f0] peer-checked:text-[#b5952f] group-hover:border-gray-300 transition-all flex flex-col items-center justify-center gap-1 h-full">
                                    <iconify-icon icon="mdi:cards-heart-outline" class="text-2xl mb-1 opacity-80"></iconify-icon>
                                    Bình An & Sức Khỏe
                                </div>
                            </label>
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="desire" value="tinh_duyen" class="peer" style="display:none;">
                                <div class="px-3 py-3 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[#fdf9f0] peer-checked:text-[#b5952f] group-hover:border-gray-300 transition-all flex flex-col items-center justify-center gap-1 h-full">
                                    <iconify-icon icon="mdi:cards-heart-outline" class="text-2xl mb-1 opacity-80"></iconify-icon>
                                    Tình Duyên & Gia Đạo
                                </div>
                            </label>
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="desire" value="ho_menh" class="peer" style="display:none;">
                                <div class="px-3 py-3 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[#fdf9f0] peer-checked:text-[#b5952f] group-hover:border-gray-300 transition-all flex flex-col items-center justify-center gap-1 h-full">
                                    <iconify-icon icon="mdi:shield-check-outline" class="text-2xl mb-1 opacity-80"></iconify-icon>
                                    Hộ Mệnh Chống Tà
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <div class="pt-2">
                        <button type="submit" class="w-full flex items-center justify-center gap-2 py-4 rounded-xl text-white font-bold text-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl shadow-[0_10px_20px_rgba(139,0,0,0.15)]" style="background: linear-gradient(135deg, #8b0000, #a52a2a);">
                            <span>Xem Kết Quả Phong Thủy</span>
                            <iconify-icon icon="mdi:arrow-right" class="text-xl animate-bounce-x"></iconify-icon>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes bounce-x {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(25%); }
}
.animate-bounce-x {
    animation: bounce-x 1.5s infinite;
}
</style>
<script>
document.getElementById('fengshuiForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const year = document.getElementById('birthYear').value;
    const gender = document.getElementById('gender').value;
    if(!year || !gender) return;
    
    // Simple mock logic for demonstration
    const menhList = ['Kim', 'Mộc', 'Thủy', 'Hỏa', 'Thổ'];
    const menhIndex = year % 5;
    const menh = menhList[menhIndex];
    
    document.getElementById('ket-qua-section').classList.remove('hidden');
    document.getElementById('ket-qua-section').scrollIntoView({behavior: 'smooth', block: 'start'});
    
    // Update Result UI (this would normally be handled by a more complex JS function or AJAX call)
    document.getElementById('result-menh').textContent = 'Mệnh ' + menh;
    document.getElementById('result-year').textContent = year;
    
    let tuongSinh = '', tuongHop = '', elementColor = '';
    switch(menh) {
        case 'Kim': 
            tuongSinh = 'Vàng, Nâu đất (Thổ)'; tuongHop = 'Trắng, Xám, Ghi (Kim)'; 
            elementColor = '#d4af37';
            break;
        case 'Mộc': 
            tuongSinh = 'Đen, Xanh nước biển (Thủy)'; tuongHop = 'Xanh lá cây (Mộc)'; 
            elementColor = '#2e8b57';
            break;
        case 'Thủy': 
            tuongSinh = 'Trắng, Xám, Ghi (Kim)'; tuongHop = 'Đen, Xanh nước biển (Thủy)'; 
            elementColor = '#1e90ff';
            break;
        case 'Hỏa': 
            tuongSinh = 'Xanh lá cây (Mộc)'; tuongHop = 'Đỏ, Hồng, Tím (Hỏa)'; 
            elementColor = '#8b0000';
            break;
        case 'Thổ': 
            tuongSinh = 'Đỏ, Hồng, Tím (Hỏa)'; tuongHop = 'Vàng, Nâu đất (Thổ)'; 
            elementColor = '#8b4513';
            break;
    }
    
    document.getElementById('result-tuongsinh').textContent = tuongSinh;
    document.getElementById('result-tuonghop').textContent = tuongHop;
    document.getElementById('menh-badge').style.backgroundColor = elementColor;
    document.getElementById('menh-badge').style.color = '#fff';
});
</script>
