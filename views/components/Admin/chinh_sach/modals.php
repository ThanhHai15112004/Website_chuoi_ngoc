<?php
// views/components/Admin/chinh_sach/modals.php
?>
<!-- Modal Chọn Mẫu Chính Sách -->
<div id="modalTemplates" class="fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity opacity-0" id="modalTemplatesBackdrop" onclick="closeModal('modalTemplates')"></div>
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl mx-4 relative z-10 transform scale-95 opacity-0 transition-all duration-300 flex flex-col max-h-[90vh]" id="modalTemplatesContent">
        
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between bg-gray-50/50 rounded-t-2xl">
            <div>
                <h3 class="font-bold text-gray-900 text-lg">Mẫu chính sách có sẵn</h3>
                <p class="text-sm text-gray-500 mt-1">Chọn một mẫu chuẩn để bắt đầu soạn thảo nhanh hơn.</p>
            </div>
            <button onclick="closeModal('modalTemplates')" class="text-gray-400 hover:text-red-500 transition-colors w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-200">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 overflow-y-auto flex-1">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                
                <!-- Card Mẫu -->
                <div class="border border-gray-200 rounded-xl p-4 hover:border-[#6B0D18] hover:shadow-md transition-all cursor-pointer group bg-white">
                    <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center mb-3">
                        <span class="iconify text-xl" data-icon="mdi:swap-horizontal"></span>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1 group-hover:text-[#6B0D18] transition-colors">Mẫu Đổi trả</h4>
                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">Quy định về thời gian, điều kiện đổi trả và hoàn tiền chuẩn E-commerce.</p>
                    <button class="w-full py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium group-hover:bg-[#6B0D18] group-hover:text-white transition-colors" onclick="useTemplate('doi-tra')">Sử dụng mẫu này</button>
                </div>

                <div class="border border-gray-200 rounded-xl p-4 hover:border-[#6B0D18] hover:shadow-md transition-all cursor-pointer group bg-white">
                    <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center mb-3">
                        <span class="iconify text-xl" data-icon="mdi:shield-check-outline"></span>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1 group-hover:text-[#6B0D18] transition-colors">Mẫu Bảo hành</h4>
                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">Các điều khoản bảo hành vòng ngọc, hỗ trợ đứt dây, xước đá...</p>
                    <button class="w-full py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium group-hover:bg-[#6B0D18] group-hover:text-white transition-colors">Sử dụng mẫu này</button>
                </div>

                <div class="border border-gray-200 rounded-xl p-4 hover:border-[#6B0D18] hover:shadow-md transition-all cursor-pointer group bg-white">
                    <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center mb-3">
                        <span class="iconify text-xl" data-icon="mdi:truck-fast-outline"></span>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1 group-hover:text-[#6B0D18] transition-colors">Mẫu Vận chuyển</h4>
                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">Quy định thời gian giao hàng, biểu phí và đồng kiểm.</p>
                    <button class="w-full py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium group-hover:bg-[#6B0D18] group-hover:text-white transition-colors">Sử dụng mẫu này</button>
                </div>

                <div class="border border-gray-200 rounded-xl p-4 hover:border-[#6B0D18] hover:shadow-md transition-all cursor-pointer group bg-white">
                    <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center mb-3">
                        <span class="iconify text-xl" data-icon="mdi:credit-card-outline"></span>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1 group-hover:text-[#6B0D18] transition-colors">Mẫu Thanh toán</h4>
                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">Hướng dẫn COD, chuyển khoản và tính an toàn giao dịch.</p>
                    <button class="w-full py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium group-hover:bg-[#6B0D18] group-hover:text-white transition-colors">Sử dụng mẫu này</button>
                </div>

                <div class="border border-gray-200 rounded-xl p-4 hover:border-[#6B0D18] hover:shadow-md transition-all cursor-pointer group bg-white">
                    <div class="w-10 h-10 rounded-lg bg-red-50 text-red-600 flex items-center justify-center mb-3">
                        <span class="iconify text-xl" data-icon="mdi:lock-outline"></span>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1 group-hover:text-[#6B0D18] transition-colors">Mẫu Bảo mật</h4>
                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">Chính sách thu thập, xử lý và bảo vệ dữ liệu khách hàng.</p>
                    <button class="w-full py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium group-hover:bg-[#6B0D18] group-hover:text-white transition-colors">Sử dụng mẫu này</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        const backdrop = document.getElementById(modalId + 'Backdrop');
        const content = document.getElementById(modalId + 'Content');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            content.classList.remove('scale-95', 'opacity-0');
        }, 10);
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        const backdrop = document.getElementById(modalId + 'Backdrop');
        const content = document.getElementById(modalId + 'Content');
        
        backdrop.classList.add('opacity-0');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function useTemplate(type) {
        alert("Nội dung mẫu đã được nạp vào Trình soạn thảo!");
        closeModal('modalTemplates');
        
        // Mock data filling
        if(document.getElementById('policyName')) {
            document.getElementById('policyName').value = "Chính sách đổi trả";
            document.getElementById('policySlug').value = "chinh-sach-doi-tra";
            document.getElementById('policyEditor').value = "1. ĐIỀU KIỆN ĐỔI TRẢ:\n- Sản phẩm chưa qua sử dụng, còn nguyên tem mác.\n- Thời gian áp dụng: 7 ngày kể từ ngày nhận.\n\n2. CÁC BƯỚC ĐỔI TRẢ:\n- Bước 1: Liên hệ CSKH.\n- Bước 2: Gửi hàng về kho.\n- Bước 3: Nhận tiền hoàn lại.";
        }
    }
</script>
