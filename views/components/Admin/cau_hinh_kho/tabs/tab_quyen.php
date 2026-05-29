<?php
// views/components/Admin/cau_hinh_kho/tabs/tab_quyen.php
?>
<div class="flex flex-col lg:flex-row h-full min-h-[500px]">
    
    <!-- Cột trái: Danh sách kho -->
    <div class="w-full lg:w-1/4 border-b lg:border-b-0 lg:border-r border-gray-200 bg-gray-50/30 p-4">
        <h3 class="font-bold text-gray-900 mb-4">Chọn kho</h3>
        <div class="space-y-2">
            <?php foreach($danhSachKho as $index => $kho): ?>
            <button onclick="loadQuyenKho('<?= $kho['id'] ?>', '<?= htmlspecialchars($kho['ten_kho']) ?>', this)" class="btn-kho-quyen w-full text-left px-3 py-2 rounded-lg <?= $index === 0 ? 'bg-white border border-[#6B0D18] shadow-sm' : 'bg-transparent border border-transparent hover:bg-gray-100' ?> flex items-center gap-2 transition-colors">
                <span class="iconify <?= $index === 0 ? 'text-[#6B0D18]' : 'text-gray-500' ?>" data-icon="mdi:warehouse"></span>
                <span class="font-bold <?= $index === 0 ? 'text-[#6B0D18]' : 'text-gray-700' ?> text-sm"><?= htmlspecialchars($kho['ten_kho']) ?></span>
            </button>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Cột phải: Bảng ma trận quyền -->
    <div class="w-full lg:w-3/4 flex flex-col">
        <div class="p-4 flex justify-between items-center border-b border-gray-100">
            <div>
                <h3 class="font-bold text-gray-900" id="titleQuyenKho">Phân quyền: <?= !empty($danhSachKho) ? htmlspecialchars($danhSachKho[0]['ten_kho']) : '...' ?></h3>
                <p class="text-[11px] text-gray-500 mt-1">Chỉ những nhân viên được cấp quyền mới có thể thao tác với kho này.</p>
                <input type="hidden" id="currentKhoIdQuyen" value="<?= !empty($danhSachKho) ? $danhSachKho[0]['id'] : '' ?>">
            </div>
            <button onclick="saveTatCaQuyen()" class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2">
                <span class="iconify" data-icon="mdi:content-save"></span> Lưu phân quyền
            </button>
        </div>
        
        <div class="overflow-x-auto p-4 flex-1">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase text-gray-500">
                        <th class="py-3 px-4 font-semibold w-48">Nhân viên</th>
                        <th class="py-3 px-4 font-semibold text-center w-20">Xem</th>
                        <th class="py-3 px-4 font-semibold text-center w-20">Nhập</th>
                        <th class="py-3 px-4 font-semibold text-center w-20 text-rose-600 tooltip" title="Có quyền xuất hàng ra khỏi kho">Xuất*</th>
                        <th class="py-3 px-4 font-semibold text-center w-20 text-rose-600 tooltip" title="Điều chỉnh/Sửa số liệu kho">Đ.Chỉnh*</th>
                        <th class="py-3 px-4 font-semibold text-center w-20">Kiểm kê</th>
                        <th class="py-3 px-4 font-semibold text-center w-20">Chuyển</th>
                        <th class="py-3 px-4 font-semibold text-center w-20 text-rose-600 tooltip" title="Có quyền duyệt phiếu xuất/nhập/kiểm kê">Duyệt*</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="tbodyQuyen">
                    <tr><td colspan="8" class="text-center py-8 text-gray-500">Đang tải dữ liệu...</td></tr>
                </tbody>
            </table>
            
            <div class="mt-4 pt-4 border-t border-gray-200 flex items-center gap-4">
                <select id="selectNhanVienMoi" class="block w-64 pl-3 pr-8 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-md border text-gray-700 bg-white">
                    <option value="">-- Chọn nhân viên để thêm --</option>
                </select>
                <button onclick="themNhanVienVaoBangQuyen()" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1 bg-blue-50 px-3 py-1.5 rounded-lg border border-blue-100">
                    <span class="iconify" data-icon="mdi:plus"></span> Thêm nhân viên
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let currentQuyenData = [];
    let currentNhanVienMoi = [];

    document.addEventListener('DOMContentLoaded', () => {
        const firstKhoId = document.getElementById('currentKhoIdQuyen').value;
        if(firstKhoId) {
            loadQuyenKho(firstKhoId, document.getElementById('titleQuyenKho').innerText.replace('Phân quyền: ', ''), null);
        }
    });

    async function loadQuyenKho(idKho, tenKho, btnElement = null) {
        document.getElementById('currentKhoIdQuyen').value = idKho;
        document.getElementById('titleQuyenKho').textContent = 'Phân quyền: ' + tenKho;

        // Cập nhật UI button
        if(btnElement) {
            document.querySelectorAll('.btn-kho-quyen').forEach(btn => {
                btn.className = 'btn-kho-quyen w-full text-left px-3 py-2 rounded-lg bg-transparent border border-transparent hover:bg-gray-100 flex items-center gap-2 transition-colors';
                btn.querySelector('.iconify').className = 'iconify text-gray-500';
                btn.querySelector('span.font-bold').className = 'font-bold text-gray-700 text-sm';
            });
            btnElement.className = 'btn-kho-quyen w-full text-left px-3 py-2 rounded-lg bg-white border border-[#6B0D18] shadow-sm flex items-center gap-2 transition-colors';
            btnElement.querySelector('.iconify').className = 'iconify text-[#6B0D18]';
            btnElement.querySelector('span.font-bold').className = 'font-bold text-[#6B0D18] text-sm';
        }

        const tbody = document.getElementById('tbodyQuyen');
        tbody.innerHTML = '<tr><td colspan="8" class="text-center py-8 text-gray-500">Đang tải dữ liệu...</td></tr>';

        try {
            const res = await fetch(`<?= APP_URL ?>/admin/cau-hinh-kho/api/phan-quyen?id_kho=${idKho}`);
            const data = await res.json();
            if(data.success) {
                currentQuyenData = data.quyen;
                currentNhanVienMoi = data.nhan_vien_moi;
                renderBangQuyen();
                renderSelectNhanVien();
            } else {
                tbody.innerHTML = `<tr><td colspan="8" class="text-center py-8 text-rose-500">${data.message}</td></tr>`;
            }
        } catch (e) {
            console.error(e);
            tbody.innerHTML = `<tr><td colspan="8" class="text-center py-8 text-rose-500">Lỗi kết nối máy chủ</td></tr>`;
        }
    }

    function renderBangQuyen() {
        const tbody = document.getElementById('tbodyQuyen');
        tbody.innerHTML = '';
        if(currentQuyenData.length === 0) {
            tbody.innerHTML = '<tr><td colspan="8" class="text-center py-8 text-gray-500">Chưa có nhân viên nào được phân quyền trong kho này.</td></tr>';
            return;
        }

        currentQuyenData.forEach(row => {
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-gray-50/50 quyen-row';
            tr.setAttribute('data-nd-id', row.id_nguoi_dung);
            tr.innerHTML = `
                <td class="py-3 px-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                            ${row.ho_ten.charAt(0)}
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-900">${row.ho_ten}</div>
                            <div class="text-[10px] text-gray-500">${row.ten_vai_tro || 'Nhân viên'}</div>
                        </div>
                    </div>
                </td>
                <td class="py-3 px-4 text-center"><input type="checkbox" name="q_xem" ${row.quyen_xem == 1 ? 'checked' : ''} class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                <td class="py-3 px-4 text-center"><input type="checkbox" name="q_nhap" ${row.quyen_nhap == 1 ? 'checked' : ''} class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                <td class="py-3 px-4 text-center"><input type="checkbox" name="q_xuat" ${row.quyen_xuat == 1 ? 'checked' : ''} class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                <td class="py-3 px-4 text-center"><input type="checkbox" name="q_dc" ${row.quyen_dieu_chinh == 1 ? 'checked' : ''} class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                <td class="py-3 px-4 text-center"><input type="checkbox" name="q_kk" ${row.quyen_kiem_ke == 1 ? 'checked' : ''} class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                <td class="py-3 px-4 text-center"><input type="checkbox" name="q_chuyen" ${row.quyen_chuyen == 1 ? 'checked' : ''} class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                <td class="py-3 px-4 text-center"><input type="checkbox" name="q_duyet" ${row.quyen_duyet == 1 ? 'checked' : ''} class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
            `;
            tbody.appendChild(tr);
        });
    }

    function renderSelectNhanVien() {
        const sel = document.getElementById('selectNhanVienMoi');
        sel.innerHTML = '<option value="">-- Chọn nhân viên để thêm --</option>';
        currentNhanVienMoi.forEach(nv => {
            const opt = document.createElement('option');
            opt.value = nv.id;
            opt.textContent = `${nv.ho_ten} (${nv.ten_vai_tro || 'Nhân viên'})`;
            sel.appendChild(opt);
        });
    }

    function themNhanVienVaoBangQuyen() {
        const sel = document.getElementById('selectNhanVienMoi');
        const idNv = sel.value;
        if(!idNv) return;
        
        const nv = currentNhanVienMoi.find(x => x.id == idNv);
        if(!nv) return;

        // Xóa thông báo trống nếu có
        const tbody = document.getElementById('tbodyQuyen');
        if(tbody.querySelector('td[colspan="8"]')) {
            tbody.innerHTML = '';
        }

        const tr = document.createElement('tr');
        tr.className = 'hover:bg-gray-50/50 quyen-row bg-yellow-50/30';
        tr.setAttribute('data-nd-id', nv.id);
        tr.innerHTML = `
            <td class="py-3 px-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                        ${nv.ho_ten.charAt(0)}
                    </div>
                    <div>
                        <div class="text-sm font-bold text-gray-900">${nv.ho_ten}</div>
                        <div class="text-[10px] text-gray-500">${nv.ten_vai_tro || 'Nhân viên'}</div>
                    </div>
                </div>
            </td>
            <td class="py-3 px-4 text-center"><input type="checkbox" name="q_xem" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
            <td class="py-3 px-4 text-center"><input type="checkbox" name="q_nhap" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
            <td class="py-3 px-4 text-center"><input type="checkbox" name="q_xuat" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
            <td class="py-3 px-4 text-center"><input type="checkbox" name="q_dc" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
            <td class="py-3 px-4 text-center"><input type="checkbox" name="q_kk" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
            <td class="py-3 px-4 text-center"><input type="checkbox" name="q_chuyen" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
            <td class="py-3 px-4 text-center"><input type="checkbox" name="q_duyet" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
        `;
        tbody.appendChild(tr);

        // Remove from list
        currentNhanVienMoi = currentNhanVienMoi.filter(x => x.id != idNv);
        renderSelectNhanVien();
    }

    async function saveTatCaQuyen() {
        const idKho = document.getElementById('currentKhoIdQuyen').value;
        if(!idKho) return;

        const rows = document.querySelectorAll('.quyen-row');
        let promises = [];

        rows.forEach(row => {
            const idNd = row.getAttribute('data-nd-id');
            const formData = new FormData();
            formData.append('id_kho', idKho);
            formData.append('id_nguoi_dung', idNd);
            if(row.querySelector('input[name="q_xem"]').checked) formData.append('quyen[quyen_xem]', 1);
            if(row.querySelector('input[name="q_nhap"]').checked) formData.append('quyen[quyen_nhap]', 1);
            if(row.querySelector('input[name="q_xuat"]').checked) formData.append('quyen[quyen_xuat]', 1);
            if(row.querySelector('input[name="q_dc"]').checked) formData.append('quyen[quyen_dieu_chinh]', 1);
            if(row.querySelector('input[name="q_kk"]').checked) formData.append('quyen[quyen_kiem_ke]', 1);
            if(row.querySelector('input[name="q_chuyen"]').checked) formData.append('quyen[quyen_chuyen]', 1);
            if(row.querySelector('input[name="q_duyet"]').checked) formData.append('quyen[quyen_duyet]', 1);

            promises.push(
                fetch('<?= APP_URL ?>/admin/cau-hinh-kho/phan-quyen/luu', {
                    method: 'POST',
                    body: formData
                }).then(res => res.json())
            );
        });

        if(promises.length === 0) {
            showToast('Không có dữ liệu nào để lưu.', 'info');
            return;
        }

        try {
            const results = await Promise.all(promises);
            const allOk = results.every(r => r.success);
            if(allOk) {
                showToast('Lưu phân quyền thành công!', 'success');
                loadQuyenKho(idKho, document.getElementById('titleQuyenKho').innerText.replace('Phân quyền: ', ''), null);
            } else {
                showToast('Có lỗi xảy ra khi lưu một số quyền.', 'warning');
            }
        } catch (e) {
            console.error(e);
            showToast('Lỗi kết nối máy chủ.', 'error');
        }
    }
</script>
