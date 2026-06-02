<?php
// views/components/Admin/chinh_sach/quick_view_drawer.php
use App\Models\Admin\ChinhSachModel;
?>
<div id="drawerQuickView" class="fixed top-0 right-0 bottom-0 w-full max-w-lg bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <!-- Header -->
    <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-start bg-gray-50/80">
        <div>
            <div class="flex items-center gap-3 mb-1">
                <h3 class="font-bold text-gray-900 text-xl" id="qv-title">Đang tải...</h3>
                <span id="qv-status-badge" class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold"></span>
            </div>
            <p class="text-sm text-gray-500">Loại: <span class="font-medium text-gray-700" id="qv-type">--</span></p>
        </div>
        <button onclick="closeQuickView()" class="text-gray-400 hover:text-red-500 transition-colors bg-white w-8 h-8 rounded-full flex items-center justify-center border border-gray-200 shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>

    <!-- Tabs trong Drawer -->
    <div class="px-6 flex border-b border-gray-200 gap-6 mt-2">
        <button onclick="switchQvTab('tong-quan')" id="btn-tab-tong-quan" class="qv-tab-btn py-3 border-b-2 border-[#6B0D18] text-[#6B0D18] text-sm font-bold">Tổng quan</button>
        <button onclick="switchQvTab('noi-dung')" id="btn-tab-noi-dung" class="qv-tab-btn py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Nội dung</button>
        <button onclick="switchQvTab('lich-su')" id="btn-tab-lich-su" class="qv-tab-btn py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Lịch sử</button>
    </div>

    <!-- Content -->
    <div class="flex-1 overflow-y-auto p-6 bg-gray-50/30">
        
        <!-- TAB TỔNG QUAN -->
        <div id="qv-tab-tong-quan" class="qv-tab-content space-y-6 block">
            <!-- Info Group -->
            <div class="bg-white rounded-xl border border-gray-200 p-4 space-y-4 shadow-sm">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold tracking-wider mb-1">Đường dẫn (Slug)</p>
                    <div class="flex items-center gap-2">
                        <a href="#" id="qv-slug-link" class="text-blue-600 hover:underline text-sm truncate font-medium" target="_blank">--</a>
                        <button onclick="window.open(document.getElementById('qv-slug-link').href, '_blank')" class="text-gray-400 hover:text-blue-600"><span class="iconify text-sm" data-icon="mdi:open-in-new"></span></button>
                    </div>
                </div>
                
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold tracking-wider mb-2">Vị trí hiển thị</p>
                    <div id="qv-locations" class="flex flex-wrap gap-2">
                        <span class="text-sm text-gray-400">--</span>
                    </div>
                </div>
            </div>

            <!-- SEO Summary -->
            <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                <div class="flex items-center gap-2 mb-3">
                    <span id="qv-seo-icon" class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle"></span>
                    <p class="font-bold text-gray-900 text-sm" id="qv-seo-label">SEO --</p>
                </div>
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-500 mb-1" id="qv-seo-title-count">Meta Title (0/60)</p>
                        <p class="text-sm text-gray-900 font-medium" id="qv-seo-title">--</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1" id="qv-seo-desc-count">Meta Description (0/160)</p>
                        <p class="text-sm text-gray-600 line-clamp-2" id="qv-seo-desc">--</p>
                    </div>
                </div>
            </div>

            <!-- Preview content snippet -->
            <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                <div class="flex items-center justify-between mb-3">
                    <p class="text-xs text-gray-500 uppercase font-semibold tracking-wider">Trích xuất nội dung</p>
                </div>
                <div id="qv-content-preview" class="bg-gray-50 rounded-lg p-3 text-sm text-gray-600 line-clamp-5 italic border border-gray-100">
                    --
                </div>
            </div>

            <!-- Update Info -->
            <div class="text-xs text-gray-500 flex items-center justify-between px-2">
                <span id="qv-updated-at">Cập nhật lần cuối: --</span>
                <span class="flex items-center gap-1"><span class="iconify" data-icon="mdi:account"></span> <span id="qv-updater">--</span></span>
            </div>
        </div>

        <!-- TAB NỘI DUNG -->
        <div id="qv-tab-noi-dung" class="qv-tab-content space-y-4 hidden">
            <div id="qv-full-content" class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm prose prose-sm max-w-none text-gray-700">
                <p class="text-gray-400 italic">Đang tải nội dung...</p>
            </div>
        </div>

        <!-- TAB LỊCH SỬ -->
        <div id="qv-tab-lich-su" class="qv-tab-content space-y-4 hidden">
            <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-6">Lịch sử chỉnh sửa</h3>
                <div id="qv-history-timeline" class="relative border-l-2 border-gray-200 ml-3 space-y-8">
                    <p class="pl-6 text-gray-400 italic text-sm">Đang tải...</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer Actions -->
    <div class="p-5 border-t border-gray-200 bg-white flex items-center justify-between gap-3">
        <button id="qv-toggle-btn" onclick="handleQvToggleStatus()" class="px-4 py-2 border border-gray-300 rounded-xl text-gray-700 font-medium hover:bg-gray-50 transition-colors">Ẩn hiển thị</button>
        <a id="qv-edit-link" href="#" class="flex-1 py-2 bg-[#6B0D18] text-white rounded-xl font-bold text-center shadow-md hover:bg-red-900 transition-colors">Chỉnh sửa toàn văn</a>
    </div>
</div>

<!-- Backdrop -->
<div id="quickViewBackdrop" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity opacity-0 backdrop-blur-sm" onclick="closeQuickView()"></div>

<script>
    let currentQvPolicy = null;

    function openQuickView(id) {
        const drawer = document.getElementById('drawerQuickView');
        const backdrop = document.getElementById('quickViewBackdrop');

        // Hiện drawer
        backdrop.classList.remove('hidden');
        setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
        drawer.classList.remove('translate-x-full');

        // Reset to default tab
        switchQvTab('tong-quan');

        // Fetch chi tiết từ API
        fetch('<?= APP_URL ?>/admin/chinh-sach/api/chi-tiet/' + id)
            .then(res => res.json())
            .then(data => {
                if (!data.success) {
                    alert(data.message || 'Lỗi tải dữ liệu');
                    return;
                }
                currentQvPolicy = data.policy;
                const p = data.policy;
                const ls = data.lich_su || [];

                // Header
                document.getElementById('qv-title').textContent = p.ten;
                document.getElementById('qv-type').textContent = p.loai;
                
                // Status badge
                const badge = document.getElementById('qv-status-badge');
                const statusText = data.trang_thai_text;
                badge.textContent = statusText;
                badge.className = 'inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold ';
                if (p.trang_thai === 'dang_hien_thi') badge.className += 'bg-emerald-100 text-emerald-700';
                else if (p.trang_thai === 'can_cap_nhat') badge.className += 'bg-amber-100 text-amber-700';
                else badge.className += 'bg-gray-100 text-gray-600';

                // Edit link
                document.getElementById('qv-edit-link').href = '<?= APP_URL ?>/admin/chinh-sach/sua/' + p.id;

                // Toggle button
                const toggleBtn = document.getElementById('qv-toggle-btn');
                if (p.trang_thai === 'dang_hien_thi') {
                    toggleBtn.textContent = 'Ẩn hiển thị';
                } else {
                    toggleBtn.textContent = 'Hiển thị';
                }

                // Slug
                const slugLink = document.getElementById('qv-slug-link');
                slugLink.textContent = '/chinh-sach/' + p.slug;
                slugLink.href = '<?= APP_URL ?>/chinh-sach/' + p.slug;

                // Locations
                const locContainer = document.getElementById('qv-locations');
                const locations = p.vi_tri_hien_thi || [];
                if (locations.length === 0) {
                    locContainer.innerHTML = '<span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">Chưa gắn vị trí</span>';
                } else {
                    locContainer.innerHTML = locations.map(l => 
                        `<span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">${l}</span>`
                    ).join('');
                }

                // SEO
                const seoStatus = p.seo_status || 'Chưa kiểm tra';
                document.getElementById('qv-seo-label').textContent = 'SEO ' + seoStatus;
                const seoIcon = document.getElementById('qv-seo-icon');
                if (seoStatus === 'Tốt') {
                    seoIcon.className = 'iconify text-emerald-500 text-lg';
                    seoIcon.dataset.icon = 'mdi:check-circle';
                } else {
                    seoIcon.className = 'iconify text-amber-500 text-lg';
                    seoIcon.dataset.icon = 'mdi:alert-circle';
                }

                const seoTitle = p.seo_title || '';
                const seoDesc = p.seo_description || '';
                document.getElementById('qv-seo-title').textContent = seoTitle || '(Chưa có)';
                document.getElementById('qv-seo-desc').textContent = seoDesc || '(Chưa có)';
                document.getElementById('qv-seo-title-count').textContent = `Meta Title (${seoTitle.length}/60)`;
                document.getElementById('qv-seo-desc-count').textContent = `Meta Description (${seoDesc.length}/160)`;

                // Content preview (strip HTML)
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = p.noi_dung || '';
                const plainText = tempDiv.textContent || tempDiv.innerText || '';
                document.getElementById('qv-content-preview').textContent = plainText.substring(0, 300) + (plainText.length > 300 ? '...' : '');

                // Full content
                document.getElementById('qv-full-content').innerHTML = p.noi_dung || '<p class="text-gray-400 italic">Chưa có nội dung</p>';

                // Update info
                const updatedAt = p.ngay_cap_nhat ? new Date(p.ngay_cap_nhat).toLocaleString('vi-VN') : '--';
                document.getElementById('qv-updated-at').textContent = 'Cập nhật lần cuối: ' + updatedAt;
                document.getElementById('qv-updater').textContent = p.nguoi_cap_nhat || '--';

                // History timeline
                renderHistory(ls);
            })
            .catch(err => {
                console.error('Error loading policy detail:', err);
            });
    }

    function renderHistory(lichSu) {
        const container = document.getElementById('qv-history-timeline');
        if (lichSu.length === 0) {
            container.innerHTML = '<p class="pl-6 text-gray-400 italic text-sm">Chưa có lịch sử chỉnh sửa.</p>';
            return;
        }

        container.innerHTML = lichSu.map((item, index) => {
            const dotClass = index === 0 
                ? 'w-4 h-4 rounded-full bg-[#6B0D18] border-4 border-white -left-[9px] top-1'
                : 'w-3 h-3 rounded-full bg-gray-300 border-2 border-white -left-[7px] top-1.5';
            
            const date = new Date(item.ngay_thuc_hien).toLocaleString('vi-VN');
            
            let html = `<div class="relative pl-6">
                <div class="absolute ${dotClass}"></div>
                <p class="text-xs text-gray-500 mb-1">${date}</p>
                <p class="text-sm font-medium text-gray-900">${item.hanh_dong}</p>
                <p class="text-xs text-gray-600 mt-1 flex items-center gap-1"><span class="iconify" data-icon="mdi:account"></span> ${item.nguoi_thuc_hien || 'Admin'}</p>`;
            
            if (item.mo_ta) {
                html += `<div class="mt-2 text-xs bg-gray-50 border border-gray-100 rounded p-2 text-gray-600 italic">"${item.mo_ta}"</div>`;
            }
            
            html += '</div>';
            return html;
        }).join('');
    }

    function handleQvToggleStatus() {
        if (!currentQvPolicy) return;
        const newStatus = currentQvPolicy.trang_thai === 'dang_hien_thi' ? 'dang_an' : 'dang_hien_thi';
        
        fetch('<?= APP_URL ?>/admin/chinh-sach/api/trang-thai', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ id: currentQvPolicy.id, trang_thai: newStatus })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert(data.message || 'Lỗi cập nhật trạng thái');
            }
        });
    }

    function closeQuickView() {
        const drawer = document.getElementById('drawerQuickView');
        const backdrop = document.getElementById('quickViewBackdrop');
        
        drawer.classList.add('translate-x-full');
        backdrop.classList.add('opacity-0');
        setTimeout(() => backdrop.classList.add('hidden'), 300);
        currentQvPolicy = null;
    }

    function switchQvTab(tabId) {
        // Reset buttons
        document.querySelectorAll('.qv-tab-btn').forEach(btn => {
            btn.classList.remove('border-[#6B0D18]', 'text-[#6B0D18]', 'font-bold');
            btn.classList.add('border-transparent', 'text-gray-500', 'font-medium');
        });
        
        // Active button
        const activeBtn = document.getElementById('btn-tab-' + tabId);
        if(activeBtn) {
            activeBtn.classList.remove('border-transparent', 'text-gray-500', 'font-medium');
            activeBtn.classList.add('border-[#6B0D18]', 'text-[#6B0D18]', 'font-bold');
        }

        // Reset contents
        document.querySelectorAll('.qv-tab-content').forEach(content => {
            content.classList.remove('block');
            content.classList.add('hidden');
        });

        // Active content
        const activeContent = document.getElementById('qv-tab-' + tabId);
        if(activeContent) {
            activeContent.classList.remove('hidden');
            activeContent.classList.add('block');
        }
    }
</script>
