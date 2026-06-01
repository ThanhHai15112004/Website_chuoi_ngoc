<?php
// views/components/Admin/banner/banner_link_modal.php
?>
<!-- Modal Tìm kiếm liên kết -->
<div id="linkSearchModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeLinkSearchModal()"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-lg bg-white rounded-xl shadow-2xl flex flex-col max-h-[80vh]">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-800" id="linkSearchTitle">Tìm kiếm Sản phẩm</h3>
            <button onclick="closeLinkSearchModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:close"></span>
            </button>
        </div>
        
        <!-- Body -->
        <div class="p-4 flex-1 flex flex-col min-h-0">
            <div class="relative mb-4">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="iconify text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                </div>
                <input type="text" id="linkSearchInput" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] bg-white transition-colors" placeholder="Gõ tên để tìm kiếm...">
            </div>
            
            <div class="flex-1 overflow-y-auto border border-gray-100 rounded-lg bg-gray-50/50 p-2 space-y-1" id="linkSearchResults">
                <div class="text-center py-8 text-gray-400 text-sm">
                    Gõ từ khóa để bắt đầu tìm kiếm
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let searchTimeout = null;

    function openLinkSearchModal() {
        const type = document.getElementById('loai_link').value;
        if (type === 'tuy_chinh') {
            alert('Vui lòng nhập link trực tiếp cho tùy chọn "Link tùy chỉnh"');
            return;
        }
        
        let title = 'Tìm kiếm Sản phẩm';
        if (type === 'danh_muc') title = 'Tìm kiếm Danh mục';
        else if (type === 'khuyen_mai') title = 'Tìm kiếm Khuyến mãi';
        else if (type === 'bai_viet') title = 'Tìm kiếm Bài viết';
        
        document.getElementById('linkSearchTitle').textContent = title;
        document.getElementById('linkSearchInput').value = '';
        document.getElementById('linkSearchResults').innerHTML = '<div class="text-center py-8 text-gray-400 text-sm">Gõ từ khóa để bắt đầu tìm kiếm</div>';
        
        document.getElementById('linkSearchModal').classList.remove('hidden');
        setTimeout(() => document.getElementById('linkSearchInput').focus(), 100);
    }

    function closeLinkSearchModal() {
        document.getElementById('linkSearchModal').classList.add('hidden');
    }

    document.getElementById('linkSearchInput').addEventListener('input', function(e) {
        clearTimeout(searchTimeout);
        const keyword = e.target.value.trim();
        const type = document.getElementById('loai_link').value;
        
        if (keyword.length < 2) {
            if (keyword.length === 0) {
                document.getElementById('linkSearchResults').innerHTML = '<div class="text-center py-8 text-gray-400 text-sm">Gõ từ khóa để bắt đầu tìm kiếm</div>';
            }
            return;
        }

        document.getElementById('linkSearchResults').innerHTML = '<div class="text-center py-8 text-gray-500 text-sm"><span class="iconify animate-spin mx-auto mb-2 text-2xl" data-icon="mdi:loading"></span> Đang tìm kiếm...</div>';

        searchTimeout = setTimeout(async () => {
            try {
                let url = '';
                if (type === 'san_pham') url = `<?= APP_URL ?>/admin/san-pham/api/search?q=${encodeURIComponent(keyword)}`;
                else if (type === 'bai_viet') url = `<?= APP_URL ?>/admin/post/api/search-products?q=${encodeURIComponent(keyword)}`; // Mượn API search của bài viết cho demo
                // Thêm các API khác nếu có, nếu chưa có thì fallback fake data
                
                if (url) {
                    const res = await fetch(url);
                    const data = await res.json();
                    if (data.success && data.data && data.data.length > 0) {
                        renderResults(data.data, type);
                    } else {
                        document.getElementById('linkSearchResults').innerHTML = '<div class="text-center py-8 text-gray-400 text-sm">Không tìm thấy kết quả phù hợp</div>';
                    }
                } else {
                    // Fallback
                    renderResults([
                        { id: 1, ten_sp: `Mẫu kết quả cho "${keyword}"`, ma_sp: 'demo', slug: 'demo' }
                    ], type);
                }
            } catch (err) {
                document.getElementById('linkSearchResults').innerHTML = '<div class="text-center py-8 text-red-500 text-sm">Lỗi tìm kiếm. Vui lòng thử lại.</div>';
            }
        }, 500);
    });

    function renderResults(items, type) {
        const container = document.getElementById('linkSearchResults');
        container.innerHTML = '';
        
        items.forEach(item => {
            const div = document.createElement('div');
            div.className = 'p-2 hover:bg-white rounded cursor-pointer border border-transparent hover:border-gray-200 transition-colors flex items-center gap-3';
            
            let name = item.ten_sp || item.tieu_de || item.ten || 'Chưa rõ tên';
            let path = '';
            let idOrCode = item.ma_sp || item.slug || item.id;
            
            if (type === 'san_pham') {
                path = `/san-pham/${idOrCode}`;
            } else if (type === 'bai_viet') {
                path = `/bai-viet/${idOrCode}`;
            } else if (type === 'danh_muc') {
                path = `/danh-muc/${idOrCode}`;
            } else {
                path = `/${type}/${idOrCode}`;
            }

            let imgHtml = '';
            if (item.anh_chinh || item.hinh_anh) {
                imgHtml = `<img src="${item.anh_chinh || item.hinh_anh}" class="w-10 h-10 object-cover rounded bg-gray-200 shrink-0">`;
            } else {
                imgHtml = `<div class="w-10 h-10 rounded bg-gray-200 flex items-center justify-center shrink-0"><span class="iconify text-gray-400" data-icon="mdi:image"></span></div>`;
            }

            div.innerHTML = `
                ${imgHtml}
                <div class="flex-1 min-w-0">
                    <h4 class="text-sm font-bold text-gray-800 truncate">${name}</h4>
                    <p class="text-xs text-gray-500 truncate mt-0.5">${path}</p>
                </div>
            `;
            
            div.onclick = () => {
                document.getElementById('link_input').value = path;
                closeLinkSearchModal();
            };
            
            container.appendChild(div);
        });
    }

    // Xử lý đổi Loại link thì thay đổi icon hoặc placeholder
    document.getElementById('loai_link').addEventListener('change', function(e) {
        const type = e.target.value;
        const btn = document.getElementById('btnSearchLink');
        const input = document.getElementById('link_input');
        if (type === 'tuy_chinh') {
            btn.classList.add('opacity-50', 'pointer-events-none');
            input.placeholder = "Nhập link đầy đủ (vd: https://...)";
        } else {
            btn.classList.remove('opacity-50', 'pointer-events-none');
            input.placeholder = "Nhập link hoặc tìm kiếm...";
        }
    });
</script>
