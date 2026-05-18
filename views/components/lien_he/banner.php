<!-- views/components/lien_he/banner.php -->
<section class="relative bg-white pt-12 lg:pt-16 pb-16 lg:pb-24 overflow-hidden border-b border-gray-100">
    <!-- Subtle Pattern Background -->
    <div class="absolute inset-0 z-0 opacity-30 pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%239C92AC\' fill-opacity=\'0.15\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    
    <!-- Gradient Overlay for Softness -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#FDFBF7]/80 to-transparent z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Text Content -->
            <div class="space-y-6">
                <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-red-50 border border-red-100 text-red-800 text-sm font-medium">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Hỗ trợ & tư vấn</span>
                </div>
                
                <h1 class="text-4xl font-serif text-gray-900 leading-tight">
                    Cần tư vấn chọn <br/>
                    <span class="text-red-800">vòng ngọc phong thủy?</span>
                </h1>
                
                <p class="text-sm text-gray-600 max-w-lg leading-relaxed">
                    Đội ngũ của chúng tôi luôn sẵn sàng hỗ trợ bạn chọn vòng ngọc, chuỗi đá phù hợp với mệnh, nhu cầu và phong cách cá nhân.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="#form-tu-van" class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-800 transition duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                        Gửi yêu cầu tư vấn
                    </a>
                    
                    <a href="tel:0901234567" class="inline-flex justify-center items-center px-6 py-3 border-2 border-red-800 text-base font-medium rounded-full text-red-800 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-800 transition duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Gọi hotline: 090.123.4567
                    </a>
                </div>
            </div>

            <!-- Image/Illustration -->
            <div class="hidden lg:flex justify-end relative pr-8">
                <!-- Using a placeholder image styling that fits the jewelry theme -->
                <div class="w-full max-w-[400px] aspect-[4/5] rounded-2xl overflow-hidden shadow-2xl relative">
                    <img src="/public/images/contact-banner.jpg" alt="Tư vấn vòng phong thủy" class="object-cover w-full h-full" onerror="this.src='https://images.unsplash.com/photo-1611085583191-a3b181a88401?q=80&w=1000&auto=format&fit=crop'">
                    <div class="absolute inset-0 border border-black/5 rounded-2xl pointer-events-none"></div>
                </div>
                
                <!-- Floating Card 1 -->
                <div class="absolute -bottom-6 -left-8 bg-white/90 backdrop-blur-sm p-4 rounded-xl shadow-lg border border-gray-100 flex items-center space-x-3 animate-bounce" style="animation-duration: 3s;">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Phản hồi</p>
                        <p class="text-xs text-gray-500">Trong vòng 24h</p>
                    </div>
                </div>

                <!-- Floating Card 2 -->
                <div class="absolute -top-6 -right-6 bg-white/90 backdrop-blur-sm p-4 rounded-xl shadow-lg border border-gray-100 flex items-center space-x-3 animate-bounce" style="animation-duration: 4s; animation-delay: 1s;">
                    <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Tư vấn chọn mệnh</p>
                        <p class="text-xs text-gray-500">Chính xác, tận tâm</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
