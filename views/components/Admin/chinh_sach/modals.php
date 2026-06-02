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
                
                <!-- Card Mẫu Đổi trả -->
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
                    <button class="w-full py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium group-hover:bg-[#6B0D18] group-hover:text-white transition-colors" onclick="useTemplate('bao-hanh')">Sử dụng mẫu này</button>
                </div>

                <div class="border border-gray-200 rounded-xl p-4 hover:border-[#6B0D18] hover:shadow-md transition-all cursor-pointer group bg-white">
                    <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center mb-3">
                        <span class="iconify text-xl" data-icon="mdi:truck-fast-outline"></span>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1 group-hover:text-[#6B0D18] transition-colors">Mẫu Vận chuyển</h4>
                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">Quy định thời gian giao hàng, biểu phí và đồng kiểm.</p>
                    <button class="w-full py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium group-hover:bg-[#6B0D18] group-hover:text-white transition-colors" onclick="useTemplate('van-chuyen')">Sử dụng mẫu này</button>
                </div>

                <div class="border border-gray-200 rounded-xl p-4 hover:border-[#6B0D18] hover:shadow-md transition-all cursor-pointer group bg-white">
                    <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center mb-3">
                        <span class="iconify text-xl" data-icon="mdi:credit-card-outline"></span>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1 group-hover:text-[#6B0D18] transition-colors">Mẫu Thanh toán</h4>
                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">Hướng dẫn COD, chuyển khoản và tính an toàn giao dịch.</p>
                    <button class="w-full py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium group-hover:bg-[#6B0D18] group-hover:text-white transition-colors" onclick="useTemplate('thanh-toan')">Sử dụng mẫu này</button>
                </div>

                <div class="border border-gray-200 rounded-xl p-4 hover:border-[#6B0D18] hover:shadow-md transition-all cursor-pointer group bg-white">
                    <div class="w-10 h-10 rounded-lg bg-red-50 text-red-600 flex items-center justify-center mb-3">
                        <span class="iconify text-xl" data-icon="mdi:lock-outline"></span>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-1 group-hover:text-[#6B0D18] transition-colors">Mẫu Bảo mật</h4>
                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">Chính sách thu thập, xử lý và bảo vệ dữ liệu khách hàng.</p>
                    <button class="w-full py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium group-hover:bg-[#6B0D18] group-hover:text-white transition-colors" onclick="useTemplate('bao-mat')">Sử dụng mẫu này</button>
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

    // Dữ liệu mẫu cho từng loại chính sách
    const templates = {
        'doi-tra': {
            ten: 'Chính sách đổi trả',
            loai: 'Đổi trả',
            slug: 'chinh-sach-doi-tra',
            mo_ta: 'Tìm hiểu chi tiết về điều kiện, thời gian và quy trình đổi trả các sản phẩm vòng ngọc, chuỗi đá và phụ kiện tại cửa hàng chúng tôi.',
            noi_dung: '<h2>1. ĐIỀU KIỆN ĐỔI TRẢ</h2>\n<ul>\n<li>Sản phẩm chưa qua sử dụng, còn nguyên tem mác, hộp đựng.</li>\n<li>Không bị nứt vỡ, trầy xước do tác động ngoại lực.</li>\n<li>Sản phẩm phải có hóa đơn mua hàng hợp lệ.</li>\n</ul>\n\n<h2>2. THỜI GIAN ĐỔI TRẢ</h2>\n<p>Khách hàng có thể yêu cầu đổi trả trong vòng <strong>7 ngày</strong> kể từ ngày nhận hàng.</p>\n\n<h2>3. QUY TRÌNH ĐỔI TRẢ</h2>\n<ol>\n<li>Liên hệ bộ phận CSKH qua hotline hoặc chat.</li>\n<li>Gửi sản phẩm về địa chỉ kho.</li>\n<li>Nhận hàng thay thế hoặc hoàn tiền trong 3-5 ngày.</li>\n</ol>'
        },
        'bao-hanh': {
            ten: 'Chính sách bảo hành',
            loai: 'Bảo hành',
            slug: 'chinh-sach-bao-hanh',
            mo_ta: 'Cam kết bảo hành chất lượng sản phẩm vòng ngọc, chuỗi đá tự nhiên.',
            noi_dung: '<h2>1. PHẠM VI BẢO HÀNH</h2>\n<ul>\n<li>Bảo hành đứt dây, tuột hạt do lỗi kỹ thuật: miễn phí trong 6 tháng.</li>\n<li>Bảo hành xước nhẹ bề mặt đá: đánh bóng miễn phí 1 lần.</li>\n<li>Thay thế khóa, charm bị lỗi: miễn phí trong 3 tháng.</li>\n</ul>\n\n<h2>2. KHÔNG BẢO HÀNH</h2>\n<ul>\n<li>Sản phẩm bị nứt vỡ do va đập mạnh.</li>\n<li>Hư hỏng do tiếp xúc hóa chất.</li>\n<li>Sản phẩm đã tự ý sửa chữa tại nơi khác.</li>\n</ul>'
        },
        'van-chuyen': {
            ten: 'Chính sách vận chuyển',
            loai: 'Vận chuyển',
            slug: 'chinh-sach-van-chuyen',
            mo_ta: 'Thông tin về phí vận chuyển, thời gian giao hàng và đồng kiểm.',
            noi_dung: '<h2>1. PHÍ VẬN CHUYỂN</h2>\n<p>Miễn phí giao hàng cho đơn từ <strong>500.000đ</strong> trở lên.</p>\n<p>Đơn dưới 500.000đ: phí ship cố định 30.000đ toàn quốc.</p>\n\n<h2>2. THỜI GIAN GIAO HÀNG</h2>\n<ul>\n<li>Nội thành TP.HCM, Hà Nội: 1-2 ngày làm việc.</li>\n<li>Các tỉnh thành khác: 3-5 ngày làm việc.</li>\n<li>Vùng sâu, vùng xa: 5-7 ngày làm việc.</li>\n</ul>\n\n<h2>3. ĐỒNG KIỂM</h2>\n<p>Quý khách có quyền kiểm tra sản phẩm trước khi thanh toán cho shipper.</p>'
        },
        'thanh-toan': {
            ten: 'Chính sách thanh toán',
            loai: 'Thanh toán',
            slug: 'chinh-sach-thanh-toan',
            mo_ta: 'Hướng dẫn các phương thức thanh toán được chấp nhận.',
            noi_dung: '<h2>PHƯƠNG THỨC THANH TOÁN</h2>\n<ul>\n<li><strong>COD</strong> - Thanh toán khi nhận hàng.</li>\n<li><strong>Chuyển khoản ngân hàng</strong> - Chuyển trước, giao sau.</li>\n<li><strong>Ví điện tử</strong> - MoMo, ZaloPay, VNPay.</li>\n</ul>\n\n<h2>AN TOÀN GIAO DỊCH</h2>\n<p>Mọi giao dịch đều được mã hóa SSL 256-bit, đảm bảo an toàn tuyệt đối.</p>'
        },
        'bao-mat': {
            ten: 'Chính sách bảo mật',
            loai: 'Bảo mật',
            slug: 'chinh-sach-bao-mat',
            mo_ta: 'Cam kết bảo vệ thông tin cá nhân của khách hàng.',
            noi_dung: '<h2>1. THU THẬP THÔNG TIN</h2>\n<p>Chúng tôi chỉ thu thập thông tin cần thiết cho việc xử lý đơn hàng: họ tên, số điện thoại, email, địa chỉ giao hàng.</p>\n\n<h2>2. SỬ DỤNG THÔNG TIN</h2>\n<ul>\n<li>Xử lý và giao đơn hàng.</li>\n<li>Gửi thông báo khuyến mãi (nếu đồng ý).</li>\n<li>Cải thiện trải nghiệm mua sắm.</li>\n</ul>\n\n<h2>3. BẢO VỆ DỮ LIỆU</h2>\n<p>Mọi thông tin được mã hóa và bảo vệ nghiêm ngặt. Chúng tôi <strong>không bán hoặc chia sẻ</strong> thông tin cá nhân cho bên thứ ba.</p>'
        }
    };

    function useTemplate(type) {
        const tpl = templates[type];
        if (!tpl) return;

        // Fill form
        if (document.getElementById('policyName')) {
            document.getElementById('policyName').value = tpl.ten;
            document.getElementById('policySlug').value = tpl.slug;
            document.getElementById('policyMoTa').value = tpl.mo_ta;
            document.getElementById('policyEditor').value = tpl.noi_dung;

            // Set loại
            const loaiSelect = document.getElementById('policyLoai');
            for (let i = 0; i < loaiSelect.options.length; i++) {
                if (loaiSelect.options[i].value === tpl.loai) {
                    loaiSelect.selectedIndex = i;
                    break;
                }
            }
        }

        closeModal('modalTemplates');

        // Toast
        if (typeof showToast === 'function') {
            showToast('Đã nạp mẫu "' + tpl.ten + '" vào trình soạn thảo!');
        }
    }
</script>
