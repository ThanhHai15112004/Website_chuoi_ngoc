<?php
/**
 * Component: Đánh giá sản phẩm
 */

$diem_tb = $thong_ke_danh_gia['diem_trung_binh'] ?? 0;
$tong_dg = $thong_ke_danh_gia['tong_danh_gia'] ?? 0;
$phan_bo = $thong_ke_danh_gia['phan_bo'] ?? [5=>0, 4=>0, 3=>0, 2=>0, 1=>0];
?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8" id="khu-vuc-danh-gia">
    <h2 class="text-2xl font-semibold text-gray-900 mb-6 flex items-center">
        <iconify-icon icon="heroicons:star-solid" class="text-[#D4AF37] mr-3"></iconify-icon>
        Đánh Giá Của Khách Hàng
    </h2>

    <?php if ($tong_dg > 0): ?>
    <!-- Overview -->
    <div class="flex flex-col md:flex-row items-center gap-8 mb-10 pb-10 border-b border-gray-100">
        <!-- Average Rating -->
        <div class="text-center md:w-1/3">
            <div class="text-5xl font-bold text-[#8B0000] mb-2"><?= number_format($diem_tb, 1) ?></div>
            <div class="flex justify-center text-xl mb-2">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <iconify-icon icon="heroicons:star-solid" class="<?= $i <= round($diem_tb) ? 'text-[#D4AF37]' : 'text-gray-200' ?>"></iconify-icon>
                <?php endfor; ?>
            </div>
            <div class="text-gray-500 text-sm"><?= $tong_dg ?> đánh giá</div>
        </div>

        <!-- Rating Bars -->
        <div class="md:w-2/3 w-full space-y-3">
            <?php foreach ([5, 4, 3, 2, 1] as $sao): 
                $percent = $phan_bo[$sao] ?? 0;
            ?>
            <div class="flex items-center text-sm">
                <div class="w-12 font-medium text-gray-700 flex items-center justify-end pr-3">
                    <?= $sao ?> <iconify-icon icon="heroicons:star-solid" class="text-[#D4AF37] ml-1"></iconify-icon>
                </div>
                <div class="flex-1 h-2 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-[#8B0000] rounded-full transition-all duration-500" style="width: <?= $percent ?>%"></div>
                </div>
                <div class="w-12 text-right text-gray-500 pl-3"><?= $percent ?>%</div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($hasBought): ?>
    <!-- Form Viết Đánh Giá -->
    <div class="mb-10 pb-10 border-b border-gray-100" id="form-danh-gia-container">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">
            <?= $userReview ? 'Cập nhật đánh giá của bạn' : 'Viết đánh giá của bạn' ?>
        </h3>
        <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
            <div class="flex items-center gap-4 mb-6">
                <?php
                $avatar = $_SESSION['user']['anh_dai_dien'] ?? '';
                $name = $_SESSION['user']['ho_ten'] ?? 'Khách hàng';
                if (!empty($avatar)): ?>
                    <img src="<?= APP_URL . '/' . ltrim($avatar, '/') ?>" class="w-12 h-12 rounded-full object-cover border border-gray-200">
                <?php else: ?>
                    <div class="w-12 h-12 rounded-full bg-[#FAF7F2] overflow-hidden flex items-center justify-center text-[#8B0000] font-semibold text-lg">
                        <?= mb_strtoupper(mb_substr($name, 0, 1, "UTF-8"), "UTF-8") ?>
                    </div>
                <?php endif; ?>
                <div>
                    <div class="font-medium text-gray-900"><?= htmlspecialchars($name) ?></div>
                    <div class="text-xs text-gray-500">Hãy chia sẻ cảm nhận về sản phẩm này nhé!</div>
                </div>
            </div>
            
            <form id="form-danh-gia" enctype="multipart/form-data">
                <input type="hidden" name="id_san_pham" value="<?= $san_pham['id'] ?>">
                <input type="hidden" name="review_id" value="<?= $userReview['id'] ?? '' ?>">
                
                <input type="hidden" name="so_sao" id="input-so-sao" value="<?= $userReview['so_sao'] ?? 0 ?>">
                <input type="hidden" name="sao_chat_luong" id="input-sao-chat-luong" value="<?= $userReview['sao_chat_luong'] ?? 0 ?>">
                <input type="hidden" name="sao_mo_ta" id="input-sao-mo-ta" value="<?= $userReview['sao_mo_ta'] ?? 0 ?>">
                <input type="hidden" name="sao_dich_vu" id="input-sao-dich-vu" value="<?= $userReview['sao_dich_vu'] ?? 0 ?>">

                <!-- Đánh giá tổng quan -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Đánh giá chung <span class="text-red-500">*</span></label>
                    <div class="flex gap-1 text-3xl cursor-pointer star-rating-group" data-target="#input-so-sao">
                        <?php $currentSoSao = $userReview['so_sao'] ?? 0; ?>
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <iconify-icon icon="heroicons:star-solid" data-val="<?= $i ?>" class="star-item <?= $i <= $currentSoSao ? 'text-[#D4AF37]' : 'text-gray-300' ?> hover:text-[#D4AF37] transition"></iconify-icon>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- Đánh giá tiêu chí -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6 p-4 bg-white rounded-lg border border-gray-100">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Chất lượng sản phẩm</label>
                        <div class="flex gap-1 text-xl cursor-pointer star-rating-group" data-target="#input-sao-chat-luong">
                            <?php $currentChatLuong = $userReview['sao_chat_luong'] ?? 0; ?>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <iconify-icon icon="heroicons:star-solid" data-val="<?= $i ?>" class="star-item <?= $i <= $currentChatLuong ? 'text-[#D4AF37]' : 'text-gray-300' ?> hover:text-[#D4AF37] transition"></iconify-icon>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Đúng với mô tả</label>
                        <div class="flex gap-1 text-xl cursor-pointer star-rating-group" data-target="#input-sao-mo-ta">
                            <?php $currentMoTa = $userReview['sao_mo_ta'] ?? 0; ?>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <iconify-icon icon="heroicons:star-solid" data-val="<?= $i ?>" class="star-item <?= $i <= $currentMoTa ? 'text-[#D4AF37]' : 'text-gray-300' ?> hover:text-[#D4AF37] transition"></iconify-icon>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Đóng gói & Giao hàng</label>
                        <div class="flex gap-1 text-xl cursor-pointer star-rating-group" data-target="#input-sao-dich-vu">
                            <?php $currentDichVu = $userReview['sao_dich_vu'] ?? 0; ?>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <iconify-icon icon="heroicons:star-solid" data-val="<?= $i ?>" class="star-item <?= $i <= $currentDichVu ? 'text-[#D4AF37]' : 'text-gray-300' ?> hover:text-[#D4AF37] transition"></iconify-icon>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <!-- Nội dung -->
                <div class="mb-6">
                    <textarea name="noi_dung" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#8B0000] focus:ring-1 focus:ring-[#8B0000] outline-none transition text-sm" placeholder="Mời bạn chia sẻ thêm cảm nhận..."><?= htmlspecialchars($userReview['noi_dung'] ?? '') ?></textarea>
                </div>
                
                <!-- Hình ảnh -->
                <div class="mb-6">
                    <?php if (!empty($userReview['hinh_anh'])): ?>
                        <div class="mb-3 text-sm text-gray-600">
                            Ảnh cũ đã tải lên:
                            <div class="flex gap-2 mt-2">
                                <?php foreach(explode(',', $userReview['hinh_anh']) as $img): ?>
                                    <img src="<?= APP_URL . '/' . ltrim(trim($img), '/') ?>" class="w-16 h-16 object-cover rounded border border-gray-200">
                                <?php endforeach; ?>
                            </div>
                            <div class="text-xs text-orange-500 mt-1">Lưu ý: Nếu bạn tải ảnh mới lên, ảnh cũ sẽ bị xóa.</div>
                        </div>
                    <?php endif; ?>
                    <label class="inline-flex items-center gap-2 px-4 py-2 border border-dashed border-gray-300 rounded-lg text-sm font-medium text-gray-600 bg-white cursor-pointer hover:bg-gray-50 transition">
                        <iconify-icon icon="heroicons:camera" class="text-lg text-gray-400"></iconify-icon> Thêm ảnh (Tối đa 3)
                        <input type="file" name="hinh_anh[]" id="file-hinh-anh" class="hidden" multiple accept="image/*">
                    </label>
                    <span class="text-xs text-gray-500 ml-2" id="file-name-display"></span>
                </div>

                <div class="flex justify-end">
                    <button type="submit" id="btn-submit-review" class="px-6 py-2.5 bg-[#8B0000] text-white font-semibold rounded-lg shadow hover:bg-red-800 transition">
                        <?= $userReview ? 'Cập nhật đánh giá' : 'Gửi đánh giá' ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($tong_dg > 0): ?>
    <!-- Review List -->
    <div class="space-y-8" id="danh-sach-danh-gia">
        <?php foreach ($danh_gia_list as $review): 
            $ten_khach = $review['ten_khach'] ?: 'Khách hàng';
            $chu_cai_dau = mb_substr($ten_khach, 0, 1, "UTF-8");
            // Ẩn bớt tên
            if (mb_strlen($ten_khach) > 3) {
                $ten_khach = mb_substr($ten_khach, 0, 2) . '***' . mb_substr($ten_khach, -1);
            }
        ?>
        <div class="border-b border-gray-100 pb-8 last:border-0 last:pb-0 review-item">
            <div class="flex justify-between items-start mb-3">
                <div class="flex items-center gap-3">
                    <?php if (!empty($review['avatar_khach'])): ?>
                        <img src="<?= APP_URL . '/' . ltrim($review['avatar_khach'], '/') ?>" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                    <?php else: ?>
                        <div class="w-10 h-10 rounded-full bg-[#FAF7F2] flex items-center justify-center text-[#8B0000] font-semibold">
                            <?= mb_strtoupper($chu_cai_dau, "UTF-8") ?>
                        </div>
                    <?php endif; ?>
                    <div>
                        <div class="font-medium text-gray-900"><?= htmlspecialchars($ten_khach) ?></div>
                        <div class="flex items-center mt-1">
                            <div class="flex text-xs mr-2">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <iconify-icon icon="heroicons:star-solid" class="<?= $i <= $review['so_sao'] ? 'text-[#D4AF37]' : 'text-gray-200' ?>"></iconify-icon>
                                <?php endfor; ?>
                            </div>
                            <span class="text-xs text-green-600 bg-green-50 px-2 py-0.5 rounded-full flex items-center gap-1">
                                <iconify-icon icon="heroicons:check-circle-solid"></iconify-icon> Đã mua hàng
                            </span>
                        </div>
                    </div>
                </div>
                <div class="text-sm text-gray-400"><?= date('d/m/Y', strtotime($review['ngay_tao'])) ?></div>
            </div>

            <?php if (!empty($review['bien_the_mua'])): ?>
            <div class="text-sm text-gray-500 mb-2 ml-13 font-medium">Phân loại: <?= htmlspecialchars($review['bien_the_mua']) ?></div>
            <?php endif; ?>
            
            <!-- Tiêu chí đã đánh giá -->
            <div class="flex flex-wrap gap-4 ml-13 mb-3 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg inline-flex">
                <div class="flex items-center gap-1">
                    <span class="text-gray-500">Chất lượng:</span>
                    <span class="font-medium flex items-center gap-0.5"><?= $review['sao_chat_luong'] ?? 5 ?> <iconify-icon icon="heroicons:star-solid" class="text-[#D4AF37] text-[10px]"></iconify-icon></span>
                </div>
                <div class="w-px h-3 bg-gray-300"></div>
                <div class="flex items-center gap-1">
                    <span class="text-gray-500">Mô tả:</span>
                    <span class="font-medium flex items-center gap-0.5"><?= $review['sao_mo_ta'] ?? 5 ?> <iconify-icon icon="heroicons:star-solid" class="text-[#D4AF37] text-[10px]"></iconify-icon></span>
                </div>
                <div class="w-px h-3 bg-gray-300"></div>
                <div class="flex items-center gap-1">
                    <span class="text-gray-500">Đóng gói:</span>
                    <span class="font-medium flex items-center gap-0.5"><?= $review['sao_dich_vu'] ?? 5 ?> <iconify-icon icon="heroicons:star-solid" class="text-[#D4AF37] text-[10px]"></iconify-icon></span>
                </div>
            </div>
            
            <div class="text-gray-700 mb-4 ml-13 leading-relaxed">
                <?= nl2br(htmlspecialchars($review['noi_dung'] ?? '')) ?>
            </div>

            <?php if (!empty($review['hinh_anh'])): 
                $hinh_anh = explode(',', $review['hinh_anh']);
            ?>
            <div class="flex flex-wrap gap-3 ml-13 mb-4">
                <?php foreach ($hinh_anh as $img): ?>
                <div class="w-20 h-20 rounded-lg overflow-hidden border border-gray-200 cursor-pointer hover:opacity-90 transition group relative">
                    <img src="<?= APP_URL . '/' . ltrim(trim($img), '/') ?>" alt="Ảnh đánh giá" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <iconify-icon icon="heroicons:magnifying-glass-plus" class="text-white text-xl"></iconify-icon>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- Phản hồi từ Shop -->
            <?php if (!empty($review['phan_hoi_noi_dung'])): ?>
            <div class="ml-13 mt-3 bg-[#FFF9F0] border border-[#F0E6D6] rounded-xl p-4 relative">
                <div class="absolute -top-2 left-6 w-4 h-4 bg-[#FFF9F0] border-l border-t border-[#F0E6D6] transform rotate-45"></div>
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-7 h-7 rounded-full bg-[#8B0000] flex items-center justify-center flex-shrink-0">
                        <iconify-icon icon="heroicons:building-storefront-solid" class="text-white text-xs"></iconify-icon>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-semibold text-sm text-[#8B0000]">Chuỗi Ngọc Phong Thủy</span>
                        <span class="text-xs bg-[#8B0000]/10 text-[#8B0000] px-2 py-0.5 rounded-full font-medium">Shop</span>
                    </div>
                    <?php if (!empty($review['phan_hoi_ngay'])): ?>
                    <span class="text-xs text-gray-400 ml-auto"><?= date('d/m/Y', strtotime($review['phan_hoi_ngay'])) ?></span>
                    <?php endif; ?>
                </div>
                <div class="text-sm text-gray-700 leading-relaxed pl-9">
                    <?= nl2br(htmlspecialchars($review['phan_hoi_noi_dung'])) ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    
    <?php if ($tong_dg > count($danh_gia_list)): ?>
    <!-- Pagination/Load More -->
    <div class="mt-8 text-center" id="load-more-container">
        <button id="btn-load-more-reviews" class="px-6 py-2.5 border border-[#8B0000] text-[#8B0000] font-medium rounded-full hover:bg-[#8B0000] hover:text-white transition duration-300 flex items-center justify-center gap-2 mx-auto">
            <span>Xem Thêm Đánh Giá</span>
            <iconify-icon icon="heroicons:chevron-down" class="text-sm"></iconify-icon>
        </button>
    </div>
    <?php endif; ?>
    
    <?php else: ?>
        <div class="text-center py-10">
            <div class="text-gray-300 mb-3"><iconify-icon icon="heroicons:chat-bubble-bottom-center-text" class="text-5xl"></iconify-icon></div>
            <p class="text-gray-500">Chưa có đánh giá nào cho sản phẩm này.</p>
        </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Star rating logic
    const starGroups = document.querySelectorAll('.star-rating-group');
    
    starGroups.forEach(group => {
        const targetInput = document.querySelector(group.getAttribute('data-target'));
        const stars = group.querySelectorAll('.star-item');
        
        stars.forEach(star => {
            star.addEventListener('click', function() {
                const val = parseInt(this.getAttribute('data-val'));
                targetInput.value = val;
                
                // Update UI
                stars.forEach((s, idx) => {
                    if (idx < val) {
                        s.classList.remove('text-gray-300');
                        s.classList.add('text-[#D4AF37]');
                    } else {
                        s.classList.remove('text-[#D4AF37]');
                        s.classList.add('text-gray-300');
                    }
                });
            });
        });
    });

    // File input name display
    const fileInput = document.getElementById('file-hinh-anh');
    if(fileInput) {
        fileInput.addEventListener('change', function() {
            if(this.files && this.files.length > 0) {
                if(this.files.length > 3) {
                    alert('Chỉ được tải lên tối đa 3 ảnh!');
                    this.value = '';
                    document.getElementById('file-name-display').textContent = '';
                } else {
                    document.getElementById('file-name-display').textContent = `Đã chọn ${this.files.length} ảnh`;
                }
            } else {
                document.getElementById('file-name-display').textContent = '';
            }
        });
    }

    // Submit form
    const formDanhGia = document.getElementById('form-danh-gia');
    if (formDanhGia) {
        formDanhGia.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate: phải chọn ít nhất 1 sao cho đánh giá chung
            const soSao = parseInt(document.getElementById('input-so-sao').value);
            if (soSao < 1) {
                alert('Vui lòng chọn số sao đánh giá chung!');
                return;
            }

            const formData = new FormData(this);
            
            const btnSubmit = document.getElementById('btn-submit-review');
            const originalText = btnSubmit.innerHTML;
            btnSubmit.innerHTML = '<iconify-icon icon="eos-icons:loading" class="mr-2"></iconify-icon> Đang gửi...';
            btnSubmit.disabled = true;

            fetch('<?= APP_URL ?>/api/danh-gia/submit', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    window.location.reload();
                } else {
                    alert(data.message);
                    btnSubmit.innerHTML = originalText;
                    btnSubmit.disabled = false;
                }
            })
            .catch(err => {
                console.error(err);
                alert('Có lỗi xảy ra khi gửi đánh giá');
                btnSubmit.innerHTML = originalText;
                btnSubmit.disabled = false;
            });
        });
    }

    // Helper: tạo HTML cho 1 review item
    function buildReviewHtml(review) {
        const name = review.ten_khach || 'Khách hàng';
        const firstChar = name.charAt(0).toUpperCase();
        
        let avatarHtml = '';
        if (review.avatar_khach) {
            avatarHtml = `<img src="<?= APP_URL ?>/${review.avatar_khach.replace(/^\/+/, '')}" class="w-10 h-10 rounded-full object-cover border border-gray-200">`;
        } else {
            avatarHtml = `<div class="w-10 h-10 rounded-full bg-[#FAF7F2] flex items-center justify-center text-[#8B0000] font-semibold">${firstChar}</div>`;
        }

        let starsHtml = '';
        for (let i = 1; i <= 5; i++) {
            starsHtml += `<iconify-icon icon="heroicons:star-solid" class="${i <= review.so_sao ? 'text-[#D4AF37]' : 'text-gray-200'}"></iconify-icon>`;
        }

        const dateStr = new Date(review.ngay_tao).toLocaleDateString('vi-VN');

        let phanLoaiHtml = review.bien_the_mua 
            ? `<div class="text-sm text-gray-500 mb-2 ml-13 font-medium">Phân loại: ${escapeHtml(review.bien_the_mua)}</div>` 
            : '';

        // Hình ảnh đánh giá
        let hinhAnhHtml = '';
        if (review.hinh_anh) {
            hinhAnhHtml = `<div class="flex flex-wrap gap-3 ml-13 mb-4">`;
            review.hinh_anh.split(',').forEach(img => {
                hinhAnhHtml += `
                <div class="w-20 h-20 rounded-lg overflow-hidden border border-gray-200 cursor-pointer hover:opacity-90 transition group relative">
                    <img src="<?= APP_URL ?>/${img.trim().replace(/^\/+/, '')}" alt="Ảnh đánh giá" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <iconify-icon icon="heroicons:magnifying-glass-plus" class="text-white text-xl"></iconify-icon>
                    </div>
                </div>`;
            });
            hinhAnhHtml += `</div>`;
        }

        // Phản hồi từ Shop
        let replyHtml = '';
        if (review.phan_hoi_noi_dung) {
            const replyDate = review.phan_hoi_ngay 
                ? new Date(review.phan_hoi_ngay).toLocaleDateString('vi-VN') 
                : '';
            replyHtml = `
            <div class="ml-13 mt-3 bg-[#FFF9F0] border border-[#F0E6D6] rounded-xl p-4 relative">
                <div class="absolute -top-2 left-6 w-4 h-4 bg-[#FFF9F0] border-l border-t border-[#F0E6D6] transform rotate-45"></div>
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-7 h-7 rounded-full bg-[#8B0000] flex items-center justify-center flex-shrink-0">
                        <iconify-icon icon="heroicons:building-storefront-solid" class="text-white text-xs"></iconify-icon>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-semibold text-sm text-[#8B0000]">Chuỗi Ngọc Phong Thủy</span>
                        <span class="text-xs bg-[#8B0000]/10 text-[#8B0000] px-2 py-0.5 rounded-full font-medium">Shop</span>
                    </div>
                    ${replyDate ? `<span class="text-xs text-gray-400 ml-auto">${replyDate}</span>` : ''}
                </div>
                <div class="text-sm text-gray-700 leading-relaxed pl-9">
                    ${escapeHtml(review.phan_hoi_noi_dung).replace(/\n/g, '<br>')}
                </div>
            </div>`;
        }

        return `
        <div class="border-b border-gray-100 pb-8 last:border-0 last:pb-0 review-item" style="animation: reviewFadeIn 0.5s ease-out forwards;">
            <div class="flex justify-between items-start mb-3">
                <div class="flex items-center gap-3">
                    ${avatarHtml}
                    <div>
                        <div class="font-medium text-gray-900">${escapeHtml(name)}</div>
                        <div class="flex items-center mt-1">
                            <div class="flex text-xs mr-2">${starsHtml}</div>
                            <span class="text-xs text-green-600 bg-green-50 px-2 py-0.5 rounded-full flex items-center gap-1">
                                <iconify-icon icon="heroicons:check-circle-solid"></iconify-icon> Đã mua hàng
                            </span>
                        </div>
                    </div>
                </div>
                <div class="text-sm text-gray-400">${dateStr}</div>
            </div>

            ${phanLoaiHtml}
            
            <!-- Tiêu chí đã đánh giá -->
            <div class="flex flex-wrap gap-4 ml-13 mb-3 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg inline-flex">
                <div class="flex items-center gap-1">
                    <span class="text-gray-500">Chất lượng:</span>
                    <span class="font-medium flex items-center gap-0.5">${review.sao_chat_luong || 5} <iconify-icon icon="heroicons:star-solid" class="text-[#D4AF37] text-[10px]"></iconify-icon></span>
                </div>
                <div class="w-px h-3 bg-gray-300"></div>
                <div class="flex items-center gap-1">
                    <span class="text-gray-500">Mô tả:</span>
                    <span class="font-medium flex items-center gap-0.5">${review.sao_mo_ta || 5} <iconify-icon icon="heroicons:star-solid" class="text-[#D4AF37] text-[10px]"></iconify-icon></span>
                </div>
                <div class="w-px h-3 bg-gray-300"></div>
                <div class="flex items-center gap-1">
                    <span class="text-gray-500">Đóng gói:</span>
                    <span class="font-medium flex items-center gap-0.5">${review.sao_dich_vu || 5} <iconify-icon icon="heroicons:star-solid" class="text-[#D4AF37] text-[10px]"></iconify-icon></span>
                </div>
            </div>
            
            <div class="text-gray-700 mb-4 ml-13 leading-relaxed">
                ${escapeHtml(review.noi_dung || '').replace(/\n/g, '<br>')}
            </div>

            ${hinhAnhHtml}
            ${replyHtml}
        </div>`;
    }

    // Helper: escape HTML
    function escapeHtml(str) {
        if (!str) return '';
        const div = document.createElement('div');
        div.appendChild(document.createTextNode(str));
        return div.innerHTML;
    }

    // Load More logic
    const btnLoadMore = document.getElementById('btn-load-more-reviews');
    if (btnLoadMore) {
        let currentPage = 1;
        const productId = '<?= $san_pham['id'] ?>';
        const reviewListContainer = document.getElementById('danh-sach-danh-gia');
        const loadMoreContainer = document.getElementById('load-more-container');

        btnLoadMore.addEventListener('click', function() {
            currentPage++;
            const originalBtnText = btnLoadMore.innerHTML;
            btnLoadMore.innerHTML = '<iconify-icon icon="eos-icons:loading" class="mr-2"></iconify-icon> Đang tải...';
            btnLoadMore.disabled = true;

            const url = `<?= APP_URL ?>/api/danh-gia/danh-sach?id_sp=${productId}&page=${currentPage}`;

            fetch(url)
            .then(res => {
                if (!res.ok) {
                    throw new Error('HTTP ' + res.status);
                }
                return res.json();
            })
            .then(data => {
                if (data.success && data.data && data.data.length > 0) {
                    data.data.forEach(review => {
                        reviewListContainer.insertAdjacentHTML('beforeend', buildReviewHtml(review));
                    });
                    
                    btnLoadMore.innerHTML = originalBtnText;
                    btnLoadMore.disabled = false;

                    // Ẩn nút nếu đã tải hết
                    const loadedCount = reviewListContainer.querySelectorAll('.review-item').length;
                    const total = data.total || 0;
                    if (loadedCount >= total) {
                        loadMoreContainer.style.display = 'none';
                    }
                } else {
                    // Không còn đánh giá nào nữa
                    loadMoreContainer.style.display = 'none';
                }
            })
            .catch(err => {
                console.error('Load more reviews error:', err);
                currentPage--; // Rollback page count
                btnLoadMore.innerHTML = originalBtnText;
                btnLoadMore.disabled = false;
            });
        });
    }
});
</script>

<style>
@keyframes reviewFadeIn {
    from {
        opacity: 0;
        transform: translateY(12px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
