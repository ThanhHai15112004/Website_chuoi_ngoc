<!-- Backdrop -->
<div id="msgDrawerBackdrop" class="fixed inset-0 bg-black/50 z-40 hidden opacity-0 transition-opacity duration-300" onclick="closeNotificationDetail()"></div>

<!-- Drawer -->
<div id="msgDrawer" class="fixed top-0 right-0 h-full w-full sm:w-[500px] md:w-[600px] bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-white shrink-0">
        <div class="flex items-center gap-3">
            <button onclick="closeNotificationDetail()" class="p-2 -ml-2 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                <span class="iconify text-xl" data-icon="mdi:arrow-right"></span>
            </button>
            <h2 class="text-lg font-bold text-gray-900">Chi tiết thông báo</h2>
        </div>
        <div class="flex items-center gap-2">
            <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors tooltip" title="Xóa">
                <span class="iconify text-xl" data-icon="mdi:delete-outline"></span>
            </button>
        </div>
    </div>

    <!-- Body -->
    <div class="flex-1 overflow-y-auto p-6 bg-gray-50/50">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <!-- Sender Info -->
            <div class="flex items-center gap-4 mb-6">
                <div id="msgIconContainer" class="w-12 h-12 rounded-full flex items-center justify-center shrink-0">
                    <span id="msgIcon" class="iconify text-2xl" data-icon="mdi:bell-outline"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <p id="msgSender" class="text-base font-bold text-gray-900 truncate">Hệ thống</p>
                    <p id="msgTime" class="text-xs text-gray-500">Hôm nay, 10:45 AM</p>
                </div>
                <div class="shrink-0">
                    <span class="bg-gray-100 text-gray-600 px-3 py-1 text-xs font-bold rounded-full uppercase tracking-wide">Inbox</span>
                </div>
            </div>

            <hr class="border-gray-100 my-6">

            <!-- Title & Content -->
            <div>
                <h3 id="msgTitle" class="text-xl font-bold text-gray-900 mb-4 leading-snug">Tiêu đề thông báo</h3>
                <div class="prose prose-sm max-w-none text-gray-700 leading-relaxed space-y-4">
                    <p id="msgContent">Nội dung chi tiết của thông báo sẽ được hiển thị ở đây.</p>
                </div>
            </div>

            <!-- Action Button (nếu có) -->
            <div class="mt-8 pt-6 border-t border-gray-100 hidden" id="msgActionContainer">
                <a href="#" id="msgActionBtn" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#8B0000] text-white font-medium rounded-lg hover:bg-red-900 transition-colors shadow-sm">
                    Xem chi tiết liên quan
                    <span class="iconify" data-icon="mdi:arrow-right"></span>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function openNotificationDetail(id) {
        // Lấy dữ liệu từ thẻ div hidden chứa data attribute
        const dataNode = document.getElementById('mockData_' + id);
        if(!dataNode) return;

        // Cập nhật DOM
        const iconContainer = document.getElementById('msgIconContainer');
        iconContainer.className = `w-12 h-12 rounded-full flex items-center justify-center shrink-0 ${dataNode.dataset.color}`;
        document.getElementById('msgIcon').setAttribute('data-icon', dataNode.dataset.icon);
        
        document.getElementById('msgSender').innerText = dataNode.dataset.nguoigui;
        document.getElementById('msgTime').innerText = dataNode.dataset.thoigian;
        document.getElementById('msgTitle').innerText = dataNode.dataset.tieude;
        document.getElementById('msgContent').innerText = dataNode.dataset.noidung;

        const actionBtn = document.getElementById('msgActionBtn');
        const actionContainer = document.getElementById('msgActionContainer');
        if (dataNode.dataset.link) {
            actionBtn.href = dataNode.dataset.link;
            actionContainer.classList.remove('hidden');
        } else {
            actionContainer.classList.add('hidden');
        }

        // Mở Drawer
        const drawer = document.getElementById('msgDrawer');
        const backdrop = document.getElementById('msgDrawerBackdrop');
        
        backdrop.classList.remove('hidden');
        // Kích hoạt transition
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            drawer.classList.remove('translate-x-full');
        }, 10);
    }

    function closeNotificationDetail() {
        const drawer = document.getElementById('msgDrawer');
        const backdrop = document.getElementById('msgDrawerBackdrop');
        
        backdrop.classList.add('opacity-0');
        drawer.classList.add('translate-x-full');
        
        setTimeout(() => {
            backdrop.classList.add('hidden');
        }, 300);
    }
</script>
