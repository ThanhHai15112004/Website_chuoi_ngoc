<script>
    function toggleReviewStatus(id, status, btn) {
        // Show loading state if needed
        const originalText = btn.innerHTML;
        btn.innerHTML = '<span class="iconify animate-spin" data-icon="mdi:loading"></span>...';
        btn.disabled = true;

        fetch('<?= APP_URL ?>/admin/binh-luan/toggle-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'id': id,
                'action': status
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showReviewToast(status === 'da_duyet' ? 'Đã duyệt bình luận thành công!' : 'Đã ẩn bình luận!');
                setTimeout(() => window.location.reload(), 1000);
            } else {
                alert('Có lỗi xảy ra: ' + (data.message || ''));
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        })
        .catch(err => {
            console.error(err);
            alert('Lỗi kết nối server.');
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
    }

    function deleteReview(id) {
        if (!confirm('Bạn có chắc chắn muốn xóa vĩnh viễn đánh giá này? Không thể khôi phục!')) return;

        fetch('<?= APP_URL ?>/admin/binh-luan/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'id': id
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showReviewToast('Đã xóa đánh giá thành công!');
                setTimeout(() => window.location.reload(), 1000);
            } else {
                alert('Có lỗi xảy ra: ' + (data.message || ''));
            }
        })
        .catch(err => {
            console.error(err);
            alert('Lỗi kết nối server.');
        });
    }

    // Modal / Toast
    function openHideModal() {
        document.getElementById('hideModal').classList.remove('hidden');
    }

    function showReviewToast(msg) {
        const t = document.getElementById('reviewToast');
        document.getElementById('toastMsg').innerText = msg;
        t.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => t.classList.add('translate-y-20', 'opacity-0'), 3000);
    }

    // Drawer Logic
    let currentReviewId = null;

    function openReviewDrawer(id) {
        currentReviewId = id;
        const overlay = document.getElementById('reviewDrawerOverlay');
        const drawer = document.getElementById('reviewDrawer');
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        drawer.classList.remove('translate-x-full');

        // Show loading, hide content
        document.getElementById('drawerLoading').classList.remove('hidden');
        document.getElementById('drawerContent').classList.add('hidden');
        document.getElementById('replyTextarea').value = '';

        fetch('<?= APP_URL ?>/admin/binh-luan/detail?id=' + id)
        .then(response => response.json())
        .then(res => {
            if (res.success) {
                const data = res.data;
                document.getElementById('drawerCustomerAvatar').innerText = data.chu_cai_dau;
                document.getElementById('drawerCustomerName').innerText = data.ten_khach;
                document.getElementById('drawerCustomerRank').innerText = data.hang_thanh_vien || 'MEMBER';
                document.getElementById('drawerCustomerPhone').innerText = '• ' + data.sdt_khach_masked;
                
                // Render stars
                let starsHtml = '';
                for (let i = 1; i <= 5; i++) {
                    if (i <= data.so_sao) {
                        starsHtml += '<span class="iconify" data-icon="mdi:star"></span>';
                    } else {
                        starsHtml += '<span class="iconify" data-icon="mdi:star-outline"></span>';
                    }
                }
                document.getElementById('drawerStars').innerHTML = starsHtml;
                document.getElementById('drawerReviewContent').innerText = data.noi_dung;
                document.getElementById('drawerReviewTime').innerText = data.ngay_tao_ago + ' qua Web';
                
                if (data.phan_hoi_noi_dung) {
                    document.getElementById('replyTextarea').value = data.phan_hoi_noi_dung;
                }

                // Render history
                let historyHtml = '';
                // Reply history if exists
                if (data.phan_hoi_noi_dung) {
                    historyHtml += `
                    <div class="relative">
                        <div class="absolute w-2.5 h-2.5 bg-[#6B0D18] rounded-full -left-[21px] top-1 ring-4 ring-[#FAF8F5]"></div>
                        <p class="text-xs font-bold text-gray-800">${data.ten_nhan_vien || 'Admin'} phản hồi</p>
                        <p class="text-[10px] text-gray-400 mt-0.5">${data.phan_hoi_ngay_ago}</p>
                    </div>`;
                }
                // Approval history
                if (data.trang_thai == 1) {
                    historyHtml += `
                    <div class="relative">
                        <div class="absolute w-2.5 h-2.5 bg-emerald-500 rounded-full -left-[21px] top-1 ring-4 ring-[#FAF8F5]"></div>
                        <p class="text-xs font-bold text-gray-700">Đã duyệt đánh giá</p>
                    </div>`;
                } else if (data.trang_thai == 2) {
                    historyHtml += `
                    <div class="relative">
                        <div class="absolute w-2.5 h-2.5 bg-amber-500 rounded-full -left-[21px] top-1 ring-4 ring-[#FAF8F5]"></div>
                        <p class="text-xs font-bold text-gray-700">Đã ẩn đánh giá</p>
                    </div>`;
                }
                // Create history
                historyHtml += `
                <div class="relative">
                    <div class="absolute w-2.5 h-2.5 bg-gray-300 rounded-full -left-[21px] top-1 ring-4 ring-[#FAF8F5]"></div>
                    <p class="text-xs font-bold text-gray-700">Khách gửi đánh giá</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">${data.ngay_tao_ago}</p>
                </div>`;

                document.getElementById('drawerHistory').innerHTML = historyHtml;

                document.getElementById('drawerLoading').classList.add('hidden');
                document.getElementById('drawerContent').classList.remove('hidden');
            } else {
                alert(res.message);
                closeReviewDrawer();
            }
        })
        .catch(err => {
            console.error(err);
            alert('Lỗi lấy thông tin.');
            closeReviewDrawer();
        });
    }

    function closeReviewDrawer() {
        currentReviewId = null;
        const overlay = document.getElementById('reviewDrawerOverlay');
        const drawer = document.getElementById('reviewDrawer');
        overlay.classList.add('opacity-0');
        drawer.classList.add('translate-x-full');
        setTimeout(() => overlay.classList.add('hidden'), 300);
    }

    function fillQuickReply(value) {
        if (value) {
            document.getElementById('replyTextarea').value = value;
        }
    }

    function submitReply() {
        const textarea = document.getElementById('replyTextarea');
        const content = textarea.value.trim();
        if (!content) {
            alert('Vui lòng nhập nội dung trả lời!');
            return;
        }
        if (!currentReviewId) {
            alert('Không tìm thấy ID đánh giá!');
            return;
        }

        const btn = document.getElementById('btnSubmitReply');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<span class="iconify animate-spin" data-icon="mdi:loading"></span> Đang gửi...';
        btn.disabled = true;

        fetch('<?= APP_URL ?>/admin/binh-luan/reply', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'id': currentReviewId,
                'content': content
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showReviewToast('Gửi câu trả lời thành công!');
                closeReviewDrawer();
                setTimeout(() => window.location.reload(), 1000);
            } else {
                alert('Có lỗi xảy ra: ' + (data.message || ''));
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        })
        .catch(err => {
            console.error(err);
            alert('Lỗi kết nối server.');
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
    }
    function submitSettings(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);
        const btn = document.getElementById('btnSaveSettings');
        const originalText = btn.innerHTML;
        
        btn.innerHTML = '<span class="iconify animate-spin" data-icon="mdi:loading"></span> Đang lưu...';
        btn.disabled = true;

        fetch('<?= APP_URL ?>/admin/binh-luan/save-settings', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('autoApproveModal').classList.add('hidden');
                showReviewToast('Đã lưu cài đặt tự động!');
                btn.innerHTML = originalText;
                btn.disabled = false;
            } else {
                alert('Có lỗi xảy ra: ' + (data.message || ''));
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        })
        .catch(err => {
            console.error(err);
            alert('Lỗi kết nối server.');
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
    }
</script>
