<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 lg:p-6 mb-4">
    <div class="flex items-center gap-2 mb-4 pb-4 border-b border-gray-100">
        <iconify-icon icon="mdi:credit-card-outline" class="text-xl text-[#8B0000]"></iconify-icon>
        <h2 class="text-lg font-bold text-gray-800">Phương thức thanh toán</h2>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php foreach ($phuong_thuc_tt as $index => $pt): ?>
        <label class="flex items-start gap-4 p-4 border rounded-xl cursor-pointer transition-colors relative group payment-method-label <?php echo $index === 0 ? 'border-[#8B0000] bg-red-50/20' : 'border-gray-200 hover:bg-gray-50'; ?>">
            <div class="mt-0.5">
                <input type="radio" name="phuong_thuc_thanh_toan" value="<?php echo $pt['id']; ?>" class="w-4 h-4 text-[#8B0000] focus:ring-[#8B0000]" <?php echo $index === 0 ? 'checked' : ''; ?> onchange="handlePaymentChange(this)">
            </div>
            <div class="flex-1">
                <span class="font-bold text-gray-800 block"><?php echo htmlspecialchars($pt['ten']); ?></span>
                <span class="text-xs text-gray-500 mt-1 block"><?php echo htmlspecialchars($pt['mo_ta'] ?? 'Thanh toán tiện lợi, an toàn'); ?></span>
            </div>
            <div class="w-8 h-8 flex items-center justify-center shrink-0">
                <iconify-icon icon="<?php echo htmlspecialchars($pt['icon'] ?? 'mdi:wallet'); ?>" class="text-2xl <?php echo $index === 0 ? 'text-[#8B0000]' : 'text-gray-400'; ?>"></iconify-icon>
            </div>
        </label>
        <?php endforeach; ?>
    </div>

    <!-- QR Code Section (Hidden by default, shown if Bank Transfer is selected) -->
    <?php 
    // Tìm phương thức Chuyển Khoản trong mảng để lấy ID
    $bankMethodId = null;
    foreach ($phuong_thuc_tt as $pt) {
        if (stripos($pt['ten'], 'chuyển khoản') !== false || stripos($pt['ten'], 'bank') !== false || stripos($pt['ten'], 'ck') !== false) {
            $bankMethodId = $pt['id'];
            break;
        }
    }
    ?>
    <div id="bank-transfer-info" class="hidden mt-4 p-5 bg-[#fcf8f0] rounded-xl border border-red-100" data-bank-id="<?php echo $bankMethodId; ?>">
        <?php if ($ngan_hang): ?>
            <div class="flex flex-col md:flex-row gap-6 items-center md:items-start">
                <?php if (!empty($ngan_hang['qr_image'])): ?>
                    <div class="w-40 h-40 bg-white p-2 rounded-xl border shadow-sm shrink-0">
                        <img src="<?php echo htmlspecialchars($ngan_hang['qr_image']); ?>" alt="QR Code" class="w-full h-full object-contain">
                    </div>
                <?php endif; ?>
                <div class="flex-1 space-y-3 w-full">
                    <div class="grid grid-cols-3 md:grid-cols-4 gap-2 text-sm">
                        <div class="col-span-1 text-gray-500">Ngân hàng:</div>
                        <div class="col-span-2 md:col-span-3 font-medium text-gray-800"><?php echo htmlspecialchars($ngan_hang['ten_ngan_hang']); ?></div>
                        
                        <div class="col-span-1 text-gray-500">Chủ tài khoản:</div>
                        <div class="col-span-2 md:col-span-3 font-medium text-gray-800 uppercase"><?php echo htmlspecialchars($ngan_hang['chu_tai_khoan']); ?></div>
                        
                        <div class="col-span-1 text-gray-500 flex items-center">Số tài khoản:</div>
                        <div class="col-span-2 md:col-span-3 flex items-center gap-2">
                            <span class="font-bold text-lg text-[#8B0000]" id="bank-acc"><?php echo htmlspecialchars($ngan_hang['so_tai_khoan']); ?></span>
                            <button type="button" onclick="copyToClipboard('bank-acc')" class="text-xs px-2 py-1 bg-white border border-gray-200 rounded text-gray-600 hover:bg-gray-50 transition-colors flex items-center gap-1">
                                <iconify-icon icon="mdi:content-copy"></iconify-icon> Sao chép
                            </button>
                        </div>
                        
                        <?php if (!empty($ngan_hang['chi_nhanh'])): ?>
                        <div class="col-span-1 text-gray-500">Chi nhánh:</div>
                        <div class="col-span-2 md:col-span-3 text-gray-800"><?php echo htmlspecialchars($ngan_hang['chi_nhanh']); ?></div>
                        <?php endif; ?>

                        <div class="col-span-1 text-gray-500 mt-2">Nội dung CK:</div>
                        <div class="col-span-2 md:col-span-3 mt-2 flex items-center gap-2">
                            <span class="font-bold text-gray-800 bg-white px-2 py-1 rounded border border-gray-200" id="bank-content">DH - SĐT của bạn</span>
                            <button type="button" onclick="copyToClipboard('bank-content')" class="text-xs px-2 py-1 bg-white border border-gray-200 rounded text-gray-600 hover:bg-gray-50 transition-colors flex items-center gap-1">
                                <iconify-icon icon="mdi:content-copy"></iconify-icon> Sao chép
                            </button>
                        </div>
                    </div>
                    
                    <div class="mt-4 p-3 bg-red-50 rounded-lg text-[#8B0000] text-xs border border-red-100 flex items-start gap-2">
                        <iconify-icon icon="mdi:information-outline" class="text-lg shrink-0 mt-0.5"></iconify-icon>
                        <p>Đơn hàng sẽ được xử lý sau khi shop xác nhận thanh toán. Vui lòng chuyển khoản đúng nội dung để được xác nhận nhanh hơn.</p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p class="text-sm text-gray-500">Thông tin chuyển khoản đang được cập nhật. Bạn vui lòng liên hệ hotline để được hỗ trợ.</p>
        <?php endif; ?>
    </div>
</div>

<script>
function handlePaymentChange(radio) {
    // Reset styles
    document.querySelectorAll('.payment-method-label').forEach(label => {
        label.classList.remove('border-[#8B0000]', 'bg-red-50/20');
        label.classList.add('border-gray-200', 'hover:bg-gray-50');
        const icon = label.querySelector('iconify-icon');
        if (icon) {
            icon.classList.remove('text-[#8B0000]');
            icon.classList.add('text-gray-400');
        }
    });

    // Apply active style
    if (radio.checked) {
        const parent = radio.closest('.payment-method-label');
        parent.classList.add('border-[#8B0000]', 'bg-red-50/20');
        parent.classList.remove('border-gray-200', 'hover:bg-gray-50');
        const icon = parent.querySelector('iconify-icon');
        if (icon) {
            icon.classList.add('text-[#8B0000]');
            icon.classList.remove('text-gray-400');
        }
    }

    // Toggle Bank Transfer Info
    const bankInfo = document.getElementById('bank-transfer-info');
    if (bankInfo) {
        const bankId = bankInfo.getAttribute('data-bank-id');
        if (radio.value == bankId) {
            bankInfo.classList.remove('hidden');
            // Update the phone number in transfer content dynamically if user entered it
            const phoneInput = document.getElementById('input_sdt_nguoi_nhan');
            const contentSpan = document.getElementById('bank-content');
            if (phoneInput && contentSpan) {
                const phone = phoneInput.value.trim() || 'SĐT của bạn';
                contentSpan.textContent = `DH - ${phone}`;
            }
        } else {
            bankInfo.classList.add('hidden');
        }
    }
}

function copyToClipboard(elementId) {
    const text = document.getElementById(elementId).innerText;
    navigator.clipboard.writeText(text).then(() => {
        CartHelper._toast('Đã sao chép thành công', 'success');
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
}

// Trigger initial check
document.addEventListener('DOMContentLoaded', () => {
    const checkedRadio = document.querySelector('input[name="phuong_thuc_thanh_toan"]:checked');
    if (checkedRadio) handlePaymentChange(checkedRadio);
    
    // Listen to phone input changes to update bank content
    const phoneInput = document.getElementById('input_sdt_nguoi_nhan');
    if (phoneInput) {
        phoneInput.addEventListener('input', () => {
            const checkedBank = document.querySelector('input[name="phuong_thuc_thanh_toan"]:checked');
            if (checkedBank) handlePaymentChange(checkedBank);
        });
    }
});
</script>
