<script>
    // Radio toggle for schedule
    const scheduleRadios = document.querySelectorAll('input[name="publish_type"]');
    const scheduleBox = document.getElementById('scheduleBox');
    
    scheduleRadios.forEach(radio => {
        radio.addEventListener('change', (e) => {
            if (e.target.parentElement.textContent.includes('Lên lịch')) {
                scheduleBox.classList.remove('hidden');
            } else {
                scheduleBox.classList.add('hidden');
            }
        });
    });

    const publishModal = document.getElementById('publishModal');

    function openPublishConfirm() {
        publishModal.classList.remove('hidden');
        setTimeout(() => {
            publishModal.classList.remove('opacity-0');
            publishModal.firstElementChild.classList.remove('scale-95');
        }, 10);
    }

    function closePublishModal() {
        publishModal.classList.add('opacity-0');
        publishModal.firstElementChild.classList.add('scale-95');
        setTimeout(() => publishModal.classList.add('hidden'), 300);
    }

    function openPreview() {
        alert("Tính năng preview sẽ mở một tab mới hiển thị bài viết y hệt ngoài giao diện người dùng.");
    }
</script>
