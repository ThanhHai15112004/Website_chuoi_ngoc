<section id="tra-cuu" class="py-16 relative" style="background:linear-gradient(180deg,#FAF7F2,#fff);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-8" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4" style="color:#8b0000;">Khám Phá Bản Mệnh Của Bạn</h2>
                <p class="text-gray-600">Nhập thông tin cá nhân để tìm ra chiếc vòng tương sinh, tương hợp mang lại năng lượng tích cực nhất.</p>
            </div>
            
            <div class="bg-white p-8 md:p-10 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-gray-100" data-aos="fade-up" data-aos-delay="100">
                <form id="fengshuiForm" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Năm sinh -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">Năm sinh (Âm lịch/Dương lịch) *</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <input type="number" id="birthYear" required min="1920" max="2025" placeholder="VD: 1995" class="block w-full pl-11 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-0 focus:border-[#8b0000] transition-colors" />
                            </div>
                        </div>
                        
                        <!-- Giới tính -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">Giới tính *</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <select id="gender" required class="block w-full pl-11 pr-10 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-0 focus:border-[#8b0000] transition-colors appearance-none bg-white">
                                    <option value="" disabled selected>Chọn giới tính</option>
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Nhu cầu -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">Mong muốn của bạn (Tùy chọn)</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="cursor-pointer relative">
                                <input type="radio" name="desire" value="tai_loc" class="peer sr-only">
                                <div class="px-4 py-3 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[rgba(212,175,55,0.05)] peer-checked:text-[#b5952f] transition-all">
                                    Tài Lộc & Công Danh
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input type="radio" name="desire" value="binh_an" class="peer sr-only">
                                <div class="px-4 py-3 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[rgba(212,175,55,0.05)] peer-checked:text-[#b5952f] transition-all">
                                    Bình An & Sức Khỏe
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input type="radio" name="desire" value="tinh_duyen" class="peer sr-only">
                                <div class="px-4 py-3 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[rgba(212,175,55,0.05)] peer-checked:text-[#b5952f] transition-all">
                                    Tình Duyên & Gia Đạo
                                </div>
                            </label>
                            <label class="cursor-pointer relative">
                                <input type="radio" name="desire" value="ho_menh" class="peer sr-only">
                                <div class="px-4 py-3 text-center text-sm font-medium border-2 border-gray-200 rounded-xl peer-checked:border-[#d4af37] peer-checked:bg-[rgba(212,175,55,0.05)] peer-checked:text-[#b5952f] transition-all">
                                    Hộ Mệnh Chống Tà
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full flex items-center justify-center gap-2 py-4 rounded-xl text-white font-bold text-lg transition-all duration-300 transform hover:-translate-y-1 shadow-[0_10px_20px_rgba(139,0,0,0.2)]" style="background: linear-gradient(135deg, #8b0000, #a52a2a);">
                        <span>Xem Kết Quả Phong Thủy</span>
                        <svg class="w-5 h-5 animate-bounce-x" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
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
