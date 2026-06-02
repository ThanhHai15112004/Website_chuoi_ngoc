<?php
// views/components/Admin/nhan_su/quick_view_drawer.php
use App\Models\Admin\NhanSuModel;
?>
<div id="drawerQuickView" class="fixed top-0 right-0 bottom-0 w-full max-w-xl bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <!-- Header -->
    <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-start bg-gray-50/80">
        <div class="flex items-center gap-4">
            <img id="qv-avatar" src="" alt="Avatar" class="w-14 h-14 rounded-full border-2 border-white shadow-sm">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <h3 id="qv-name" class="font-bold text-gray-900 text-xl"></h3>
                    <span id="qv-status-badge" class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold"></span>
                </div>
                <p class="text-sm text-gray-500"><span id="qv-code"></span> <span class="mx-1">•</span> <span id="qv-role" class="font-medium text-[#6B0D18]"></span></p>
            </div>
        </div>
        <button onclick="closeQuickView()" class="text-gray-400 hover:text-red-500 transition-colors bg-white w-8 h-8 rounded-full flex items-center justify-center border border-gray-200 shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>

    <!-- Tabs trong Drawer -->
    <div class="px-6 flex border-b border-gray-200 gap-5 mt-2 overflow-x-auto hide-scrollbar">
        <button onclick="switchQvTab('tong-quan')" id="btn-tab-tong-quan" class="qv-tab-btn whitespace-nowrap py-3 border-b-2 border-[#6B0D18] text-[#6B0D18] text-sm font-bold">Tổng quan</button>
        <button onclick="switchQvTab('thong-tin')" id="btn-tab-thong-tin" class="qv-tab-btn whitespace-nowrap py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Thông tin cá nhân</button>
        <button onclick="switchQvTab('phan-quyen')" id="btn-tab-phan-quyen" class="qv-tab-btn whitespace-nowrap py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Vai trò & Quyền</button>
        <button onclick="switchQvTab('lich-su-dang-nhap')" id="btn-tab-lich-su-dang-nhap" class="qv-tab-btn whitespace-nowrap py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Lịch sử đăng nhập</button>
        <button onclick="switchQvTab('nhat-ky')" id="btn-tab-nhat-ky" class="qv-tab-btn whitespace-nowrap py-3 border-b-2 border-transparent text-gray-500 hover:text-gray-900 text-sm font-medium">Nhật ký hoạt động</button>
    </div>

    <!-- Content -->
    <div class="flex-1 overflow-y-auto p-6 bg-gray-50/30">
        
        <!-- TAB TỔNG QUAN -->
        <div id="qv-tab-tong-quan" class="qv-tab-content space-y-6 block">
            <div class="grid grid-cols-2 gap-4" id="qv-overview-grid">
                <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                    <p class="text-xs text-gray-500 font-medium mb-1">Email</p>
                    <p id="qv-email" class="text-sm font-bold text-gray-900 truncate"></p>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                    <p class="text-xs text-gray-500 font-medium mb-1">Số điện thoại</p>
                    <p id="qv-phone" class="text-sm font-bold text-gray-900"></p>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                    <p class="text-xs text-gray-500 font-medium mb-1">Phòng ban</p>
                    <p id="qv-dept" class="text-sm font-bold text-gray-900"></p>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                    <p class="text-xs text-gray-500 font-medium mb-1">Ngày tạo</p>
                    <p id="qv-created" class="text-sm font-bold text-gray-900"></p>
                </div>
            </div>
            <div id="qv-warning-box" class="hidden bg-orange-50 border border-orange-200 rounded-xl p-4 flex gap-3 shadow-sm">
                <span class="iconify text-orange-500 text-xl shrink-0" data-icon="mdi:shield-alert-outline"></span>
                <div>
                    <h4 class="text-sm font-bold text-orange-800">Quyền hạn cao nhất</h4>
                    <p class="text-xs text-orange-700 mt-1">Tài khoản này có toàn quyền truy cập và chỉnh sửa hệ thống. Hãy bảo mật cẩn thận.</p>
                </div>
            </div>
        </div>

        <!-- TAB THÔNG TIN -->
        <div id="qv-tab-thong-tin" class="qv-tab-content space-y-4 hidden">
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                <div class="px-5 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <h4 class="font-bold text-gray-900">Thông tin chi tiết</h4>
                    <a id="qv-edit-link" href="#" class="text-xs font-bold text-[#6B0D18] hover:underline">Chỉnh sửa</a>
                </div>
                <div id="qv-info-content" class="p-5 space-y-4"></div>
            </div>
        </div>

        <!-- TAB QUYỀN -->
        <div id="qv-tab-phan-quyen" class="qv-tab-content space-y-4 hidden">
            <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-bold text-gray-900">Phân quyền chi tiết</h4>
                    <span id="qv-role-badge" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-xs font-bold bg-[#6B0D18]/10 text-[#6B0D18]"></span>
                </div>
                <div id="qv-quyen-list" class="space-y-3"></div>
            </div>
        </div>

        <!-- TAB LỊCH SỬ ĐĂNG NHẬP -->
        <div id="qv-tab-lich-su-dang-nhap" class="qv-tab-content space-y-4 hidden">
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-xs text-gray-500 font-medium">Thời gian</th>
                            <th class="px-4 py-2 text-xs text-gray-500 font-medium">IP / Thiết bị</th>
                            <th class="px-4 py-2 text-xs text-gray-500 font-medium text-right">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody id="qv-login-history" class="divide-y divide-gray-100"></tbody>
                </table>
            </div>
        </div>

        <!-- TAB NHẬT KÝ -->
        <div id="qv-tab-nhat-ky" class="qv-tab-content space-y-4 hidden">
            <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                <div id="qv-activity-log" class="relative border-l-2 border-gray-200 ml-3 space-y-6"></div>
            </div>
        </div>
    </div>

    <!-- Footer Actions -->
    <div class="p-5 border-t border-gray-200 bg-gray-50 flex items-center justify-between gap-3">
        <button id="qv-lock-btn" class="px-4 py-2 bg-white border border-gray-300 rounded-xl text-orange-600 font-medium hover:bg-orange-50 transition-colors shadow-sm tooltip" title="Khóa tài khoản">
            <span class="iconify text-lg" data-icon="mdi:lock-outline"></span>
        </button>
        <div class="flex gap-2">
            <a id="qv-view-link" href="#" class="px-4 py-2 bg-white border border-gray-300 rounded-xl text-gray-700 font-medium hover:bg-gray-100 transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:eye-outline"></span> Xem đầy đủ
            </a>
            <a id="qv-edit-btn" href="#" class="px-6 py-2 bg-[#6B0D18] text-white rounded-xl font-bold text-center shadow-md hover:bg-red-900 transition-colors flex items-center gap-2">
                <span class="iconify" data-icon="mdi:pencil-outline"></span> Sửa
            </a>
        </div>
    </div>
</div>

<!-- Backdrop -->
<div id="quickViewBackdrop" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity opacity-0 backdrop-blur-sm" onclick="closeQuickView()"></div>

<script>
    let currentQvId = null;

    function openQuickView(id) {
        currentQvId = id;
        const drawer = document.getElementById('drawerQuickView');
        const backdrop = document.getElementById('quickViewBackdrop');

        backdrop.classList.remove('hidden');
        setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
        drawer.classList.remove('translate-x-full');
        switchQvTab('tong-quan');

        // Fetch data
        fetch(`<?= APP_URL ?>/admin/nhan-su/api/chi-tiet/${id}`)
            .then(r => r.json())
            .then(data => {
                if (!data.success) return;
                const s = data.staff;
                const tt = data.trang_thai_text;

                // Header
                document.getElementById('qv-avatar').src = s.avatar_url;
                document.getElementById('qv-name').textContent = s.ho_ten;
                document.getElementById('qv-code').textContent = s.ma_nv;
                document.getElementById('qv-role').textContent = s.vai_tro;

                const badge = document.getElementById('qv-status-badge');
                badge.textContent = tt;
                badge.className = 'inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold ';
                if (s.trang_thai === 'hoat_dong') badge.className += 'bg-emerald-100 text-emerald-700';
                else if (s.trang_thai === 'cho_kich_hoat') badge.className += 'bg-amber-100 text-amber-700';
                else badge.className += 'bg-red-100 text-red-700';

                // Overview
                document.getElementById('qv-email').textContent = s.email;
                document.getElementById('qv-phone').textContent = s.dien_thoai || 'Chưa cập nhật';
                document.getElementById('qv-dept').textContent = s.phong_ban || 'N/A';
                document.getElementById('qv-created').textContent = s.ngay_tao ? new Date(s.ngay_tao).toLocaleDateString('vi-VN') : '';

                const warnBox = document.getElementById('qv-warning-box');
                warnBox.classList.toggle('hidden', s.vai_tro !== 'Super Admin');

                // Info tab
                const infoHtml = [
                    {l: 'Họ và tên', v: s.ho_ten, bold: true},
                    {l: 'Mã NV', v: s.ma_nv},
                    {l: 'Ngày sinh', v: s.ngay_sinh ? new Date(s.ngay_sinh).toLocaleDateString('vi-VN') : 'Chưa cập nhật'},
                    {l: 'Địa chỉ', v: s.dia_chi || 'Chưa cập nhật'},
                    {l: 'Ngày vào làm', v: s.ngay_vao_lam ? new Date(s.ngay_vao_lam).toLocaleDateString('vi-VN') : 'Chưa cập nhật'},
                    {l: 'Ghi chú', v: s.ghi_chu || 'Không có', italic: true},
                ].map((item, i, arr) => `
                    <div class="grid grid-cols-3 gap-4 ${i < arr.length - 1 ? 'border-b border-gray-100 pb-4' : ''}">
                        <div class="col-span-1 text-sm font-medium text-gray-500">${item.l}</div>
                        <div class="col-span-2 text-sm ${item.bold ? 'text-gray-900 font-medium' : 'text-gray-900'} ${item.italic ? 'italic text-gray-600' : ''}">${item.v}</div>
                    </div>
                `).join('');
                document.getElementById('qv-info-content').innerHTML = infoHtml;
                document.getElementById('qv-edit-link').href = `<?= APP_URL ?>/admin/nhan-su/sua/${id}`;

                // Permissions tab
                const roleBadge = document.getElementById('qv-role-badge');
                roleBadge.innerHTML = `<span class="iconify" data-icon="mdi:shield-crown-outline"></span> ${s.vai_tro}`;

                const moduleIcons = {'Sản phẩm': 'mdi:package-variant-closed', 'Đơn hàng': 'mdi:receipt-text-outline', 'Kho': 'mdi:warehouse', 'Dashboard': 'mdi:view-dashboard-outline', 'Cấu hình': 'mdi:cog-outline'};
                const quyenHtml = data.quyen.map(q => {
                    const hasAny = q.xem || q.them || q.sua || q.xoa || q.dac_biet;
                    const allPerms = q.xem && q.them && q.sua && q.xoa;
                    const permText = allPerms ? 'Toàn quyền' : (hasAny ? ['Xem','Thêm','Sửa','Xóa','Đặc biệt'].filter((_,i) => [q.xem,q.them,q.sua,q.xoa,q.dac_biet][i]).join(', ') : 'Không có quyền');
                    const permClass = allPerms ? 'text-emerald-600' : (hasAny ? 'text-blue-600' : 'text-gray-400');
                    const icon = Object.entries(moduleIcons).find(([k]) => q.module.includes(k))?.[1] || 'mdi:view-grid-outline';
                    return `<div class="p-3 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 flex items-center gap-2"><span class="iconify text-gray-400" data-icon="${icon}"></span> ${q.module}</span>
                        <span class="text-xs font-bold ${permClass}">${permText}</span>
                    </div>`;
                }).join('');
                document.getElementById('qv-quyen-list').innerHTML = quyenHtml || '<p class="text-sm text-gray-400 text-center py-4">Chưa có quyền nào</p>';

                // Login history
                const loginHtml = data.lich_su_dang_nhap.map(l => {
                    const d = new Date(l.ngay_thuc_hien);
                    const isSuccess = l.mo_ta.includes('thành công');
                    return `<tr>
                        <td class="px-4 py-3"><p class="text-sm font-medium text-gray-900">${d.toLocaleDateString('vi-VN')}</p><p class="text-xs text-gray-500">${d.toLocaleTimeString('vi-VN')}</p></td>
                        <td class="px-4 py-3"><p class="text-sm text-gray-900">${l.ip_address || 'N/A'}</p><p class="text-xs text-gray-500">${l.thiet_bi || 'N/A'}</p></td>
                        <td class="px-4 py-3 text-right"><span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold ${isSuccess ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-600'}">${l.mo_ta}</span></td>
                    </tr>`;
                }).join('');
                document.getElementById('qv-login-history').innerHTML = loginHtml || '<tr><td colspan="3" class="px-4 py-6 text-center text-gray-400 text-sm">Chưa có lịch sử</td></tr>';

                // Activity log
                const actColors = {'Tạo': 'bg-emerald-500', 'Cập nhật': 'bg-blue-500', 'Xóa': 'bg-red-500', 'Khóa': 'bg-orange-500', 'Mở khóa': 'bg-emerald-500'};
                const actHtml = data.lich_su.map(l => {
                    const d = new Date(l.ngay_thuc_hien);
                    const color = Object.entries(actColors).find(([k]) => l.hanh_dong.includes(k))?.[1] || 'bg-blue-500';
                    return `<div class="relative pl-6">
                        <div class="absolute w-3 h-3 rounded-full ${color} border-2 border-white -left-[7px] top-1.5"></div>
                        <p class="text-xs text-gray-500 mb-1">${d.toLocaleDateString('vi-VN')} - ${d.toLocaleTimeString('vi-VN', {hour:'2-digit',minute:'2-digit'})}</p>
                        <p class="text-sm font-medium text-gray-900">${l.hanh_dong}</p>
                        ${l.mo_ta ? `<p class="text-xs text-gray-600 mt-0.5">${l.mo_ta}</p>` : ''}
                    </div>`;
                }).join('');
                document.getElementById('qv-activity-log').innerHTML = actHtml || '<p class="text-sm text-gray-400 text-center py-4">Chưa có nhật ký</p>';

                // Footer links
                document.getElementById('qv-view-link').href = `<?= APP_URL ?>/admin/nhan-su/xem/${id}`;
                document.getElementById('qv-edit-btn').href = `<?= APP_URL ?>/admin/nhan-su/sua/${id}`;
                document.getElementById('qv-lock-btn').onclick = () => { closeQuickView(); openLockModal(id, s.ho_ten); };
            });
    }

    function closeQuickView() {
        const drawer = document.getElementById('drawerQuickView');
        const backdrop = document.getElementById('quickViewBackdrop');
        drawer.classList.add('translate-x-full');
        backdrop.classList.add('opacity-0');
        setTimeout(() => backdrop.classList.add('hidden'), 300);
    }

    function switchQvTab(tabId) {
        document.querySelectorAll('.qv-tab-btn').forEach(btn => {
            btn.classList.remove('border-[#6B0D18]', 'text-[#6B0D18]', 'font-bold');
            btn.classList.add('border-transparent', 'text-gray-500', 'font-medium');
        });
        const activeBtn = document.getElementById('btn-tab-' + tabId);
        if(activeBtn) {
            activeBtn.classList.remove('border-transparent', 'text-gray-500', 'font-medium');
            activeBtn.classList.add('border-[#6B0D18]', 'text-[#6B0D18]', 'font-bold');
        }
        document.querySelectorAll('.qv-tab-content').forEach(c => {
            c.classList.remove('block');
            c.classList.add('hidden');
        });
        const activeContent = document.getElementById('qv-tab-' + tabId);
        if(activeContent) {
            activeContent.classList.remove('hidden');
            activeContent.classList.add('block');
        }
    }
</script>
