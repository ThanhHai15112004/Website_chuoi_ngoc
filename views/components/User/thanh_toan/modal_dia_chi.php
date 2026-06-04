<!-- Modal 1: Danh sách địa chỉ -->
<div id="addressListModal" class="fixed inset-0 z-[100] hidden items-center justify-center">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeAddressListModal()"></div>
    <div class="bg-white w-full sm:w-[500px] relative flex flex-col rounded-2xl shadow-xl transform scale-95 opacity-0 transition-all duration-300 mx-4" style="max-height: 85vh;" id="addressListModalContent">
        <div class="flex items-center justify-between p-4 border-b border-gray-100 shrink-0">
            <h3 class="text-lg font-bold text-gray-800">Địa Chỉ Của Tôi</h3>
            <button type="button" onclick="closeAddressListModal()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 text-gray-500 transition-colors">
                <iconify-icon icon="mdi:close" class="text-xl"></iconify-icon>
            </button>
        </div>
        <div class="p-4 overflow-y-auto flex-1 space-y-4" id="address-list-container">
            <!-- Render danh sách địa chỉ bằng JS -->
        </div>
        <div class="p-4 border-t border-gray-100 shrink-0">
            <button type="button" onclick="openAddressFormModal()" class="w-full py-3 border border-[#8B0000] text-[#8B0000] font-medium rounded-xl hover:bg-red-50 flex items-center justify-center gap-2 transition-colors">
                <iconify-icon icon="mdi:plus"></iconify-icon> Thêm địa chỉ mới
            </button>
        </div>
    </div>
</div>

<!-- Modal 2: Thêm/Sửa địa chỉ -->
<div id="addressFormModal" class="fixed inset-0 z-[110] hidden items-center justify-center">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeAddressFormModal()"></div>
    <div class="bg-white w-full sm:w-[500px] relative flex flex-col rounded-2xl shadow-xl transform scale-95 opacity-0 transition-all duration-300 mx-4" style="max-height: 90vh;" id="addressFormModalContent">
        <div class="flex items-center justify-between p-4 border-b border-gray-100 shrink-0">
            <h3 class="text-lg font-bold text-gray-800" id="address-form-title">Thêm địa chỉ mới</h3>
            <button type="button" onclick="closeAddressFormModal()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 text-gray-500 transition-colors">
                <iconify-icon icon="mdi:close" class="text-xl"></iconify-icon>
            </button>
        </div>
        <div class="p-4 overflow-y-auto flex-1">
            <form id="address-api-form" onsubmit="submitAddressForm(event)">
                <input type="hidden" id="edit_address_id" value="">
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2 sm:col-span-1">
                        <input type="text" id="api_ho_ten" placeholder="Họ và tên" required class="w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 focus:border-[#8B0000] focus:ring-1 focus:ring-[#8B0000] outline-none">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <input type="text" id="api_sdt" placeholder="Số điện thoại" required class="w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 focus:border-[#8B0000] focus:ring-1 focus:ring-[#8B0000] outline-none">
                    </div>
                </div>

                <div class="space-y-4 mb-4">
                    <input type="text" id="api_tinh" placeholder="Tỉnh / Thành phố" required class="w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 focus:border-[#8B0000] focus:ring-1 focus:ring-[#8B0000] outline-none">
                    <input type="text" id="api_quan" placeholder="Quận / Huyện" required class="w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 focus:border-[#8B0000] focus:ring-1 focus:ring-[#8B0000] outline-none">
                    <input type="text" id="api_phuong" placeholder="Phường / Xã" required class="w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 focus:border-[#8B0000] focus:ring-1 focus:ring-[#8B0000] outline-none">
                    <input type="text" id="api_cu_the" placeholder="Địa chỉ cụ thể (Số nhà, tên đường...)" required class="w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 focus:border-[#8B0000] focus:ring-1 focus:ring-[#8B0000] outline-none">
                </div>

                <div class="flex items-center gap-2 mb-6">
                    <input type="checkbox" id="api_mac_dinh" class="w-4 h-4 text-[#8B0000] rounded focus:ring-[#8B0000]">
                    <label for="api_mac_dinh" class="text-sm text-gray-700">Đặt làm địa chỉ mặc định</label>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeAddressFormModal()" class="px-5 py-2.5 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Trở lại</button>
                    <button type="submit" id="btn-save-address" class="px-5 py-2.5 text-sm font-medium text-white bg-[#8B0000] rounded-lg hover:bg-red-800 min-w-[120px]">Hoàn thành</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let addressesData = <?php echo json_encode($danh_sach_dia_chi ?? []); ?>;
let selectedAddressId = '<?php echo $dia_chi_mac_dinh['id'] ?? ''; ?>';

function openAddressListModal() {
    const modal = document.getElementById('addressListModal');
    const content = document.getElementById('addressListModalContent');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    renderAddressList();
    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeAddressListModal() {
    const modal = document.getElementById('addressListModal');
    const content = document.getElementById('addressListModalContent');
    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300);
}

function openAddressFormModal(editId = null) {
    const modal = document.getElementById('addressFormModal');
    const content = document.getElementById('addressFormModalContent');
    
    // Reset form 
    document.getElementById('address-api-form').reset();
    document.getElementById('edit_address_id').value = '';
    
    if (editId) {
        document.getElementById('address-form-title').innerText = 'Cập nhật địa chỉ';
        const addr = addressesData.find(a => a.id === editId);
        if (addr) {
            document.getElementById('edit_address_id').value = addr.id;
            document.getElementById('api_ho_ten').value = addr.ho_ten;
            document.getElementById('api_sdt').value = addr.so_dien_thoai;
            document.getElementById('api_tinh').value = addr.tinh_thanh;
            document.getElementById('api_quan').value = addr.quan_huyen;
            document.getElementById('api_phuong').value = addr.phuong_xa;
            document.getElementById('api_cu_the').value = addr.dia_chi_cu_the;
            document.getElementById('api_mac_dinh').checked = (addr.la_mac_dinh == 1);
        }
    } else {
        document.getElementById('address-form-title').innerText = 'Thêm địa chỉ mới';
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeAddressFormModal() {
    const modal = document.getElementById('addressFormModal');
    const content = document.getElementById('addressFormModalContent');
    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300);
}

function renderAddressList() {
    const container = document.getElementById('address-list-container');
    if (addressesData.length === 0) {
        container.innerHTML = `<div class="text-center py-10 text-gray-500 text-sm">Chưa có địa chỉ nào.</div>`;
        return;
    }

    let html = '';
    addressesData.forEach(addr => {
        const parts = [addr.dia_chi_cu_the, addr.phuong_xa, addr.quan_huyen, addr.tinh_thanh].filter(Boolean);
        const fullAddr = parts.join(', ');
        const isSelected = addr.id === selectedAddressId;
        
        html += `
        <div class="relative border rounded-xl p-4 transition-colors ${isSelected ? 'border-[#8B0000] bg-red-50/30' : 'border-gray-200 hover:border-gray-300'} cursor-pointer" onclick="selectAddress('${addr.id}')">
            <div class="flex justify-between items-start">
                <div class="flex items-center gap-3">
                    <span class="font-bold text-gray-800">${addr.ho_ten}</span>
                    <span class="text-gray-300">|</span>
                    <span class="text-gray-600">${addr.so_dien_thoai}</span>
                </div>
                <button type="button" onclick="event.stopPropagation(); openAddressFormModal('${addr.id}')" class="text-blue-600 hover:underline text-sm font-medium">Cập nhật</button>
            </div>
            <div class="text-sm text-gray-600 mt-1 mb-2">${fullAddr}</div>
            
            <div class="flex items-center gap-3 mt-2">
                ${addr.la_mac_dinh == 1 
                    ? '<span class="inline-block border border-[#8B0000] text-[#8B0000] text-[10px] px-1.5 py-0.5 rounded">Mặc định</span>' 
                    : `<button type="button" onclick="event.stopPropagation(); setDefaultAddress('${addr.id}')" class="text-xs text-gray-500 border border-gray-300 hover:border-gray-500 px-2 py-1 rounded transition-colors">Thiết lập mặc định</button>`
                }
            </div>
            
            ${isSelected ? '<div class="absolute top-1/2 -translate-y-1/2 right-4 text-[#8B0000]"><iconify-icon icon="mdi:check-circle" class="text-2xl"></iconify-icon></div>' : ''}
        </div>
        `;
    });
    container.innerHTML = html;
}

function selectAddress(id) {
    selectedAddressId = id;
    const addr = addressesData.find(a => a.id === id);
    if (!addr) return;

    // Update UI
    const parts = [addr.dia_chi_cu_the, addr.phuong_xa, addr.quan_huyen, addr.tinh_thanh].filter(Boolean);
    const fullAddr = parts.join(', ');

    // Remove no address UI if it exists
    const displayDiv = document.getElementById('address-display');
    displayDiv.innerHTML = `
        <div class="flex flex-col gap-1">
            <div class="flex items-center gap-3">
                <span class="font-bold text-gray-800 text-base" id="display-name">${addr.ho_ten}</span>
                <span class="text-gray-300">|</span>
                <span class="font-bold text-gray-800 text-base" id="display-phone">${addr.so_dien_thoai}</span>
            </div>
            <span class="text-gray-600 mt-1" id="display-address">${fullAddr}</span>
            ${addr.la_mac_dinh == 1 ? '<div class="mt-1"><span class="inline-block border border-[#8B0000] text-[#8B0000] text-[10px] px-1.5 py-0.5 rounded">Mặc định</span></div>' : ''}
        </div>
    `;

    document.getElementById('address-change-btn').style.display = 'block';

    // Update hidden inputs
    document.getElementById('hidden_ten').value = addr.ho_ten;
    document.getElementById('hidden_sdt').value = addr.so_dien_thoai;
    document.getElementById('hidden_dia_chi').value = fullAddr;

    // Enable checkout button
    const btnDatHang = document.getElementById('btn-dat-hang');
    if (btnDatHang && btnDatHang.disabled) {
        btnDatHang.disabled = false;
        btnDatHang.className = 'w-full bg-[#8B0000] hover:bg-red-800 text-white font-bold py-3 rounded-xl transition-all shadow-[0_4px_14px_0_rgba(139,0,0,0.3)] hover:shadow-[0_6px_20px_rgba(139,0,0,0.2)] text-base uppercase flex justify-center items-center gap-2';
        btnDatHang.innerHTML = '<iconify-icon icon="mdi:shopping-outline" class="text-lg"></iconify-icon> Đặt Hàng';
    }

    closeAddressListModal();
}

function submitAddressForm(e) {
    e.preventDefault();
    const id = document.getElementById('edit_address_id').value;
    const isEdit = !!id;
    const url = APP_URL + (isEdit ? '/api/dia-chi/sua' : '/api/dia-chi/them');
    
    const data = {
        id: id,
        ho_ten: document.getElementById('api_ho_ten').value,
        so_dien_thoai: document.getElementById('api_sdt').value,
        tinh_thanh: document.getElementById('api_tinh').value,
        quan_huyen: document.getElementById('api_quan').value,
        phuong_xa: document.getElementById('api_phuong').value,
        dia_chi_cu_the: document.getElementById('api_cu_the').value,
        la_mac_dinh: document.getElementById('api_mac_dinh').checked ? 1 : 0
    };

    const btn = document.getElementById('btn-save-address');
    const originalText = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = 'Đang lưu...';

    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(res => {
        if (res.success) {
            if (typeof CartHelper !== 'undefined') CartHelper._toast(res.message, 'success');
            
            // Reload list
            fetch(APP_URL + '/api/dia-chi/danh-sach')
            .then(r => r.json())
            .then(dataList => {
                if(dataList.success) {
                    addressesData = dataList.data;
                    closeAddressFormModal();
                    
                    // If this is the first address, or it was set as default, or we are editing the currently selected one, select it
                    if (data.la_mac_dinh || addressesData.length === 1 || selectedAddressId === res.data.id) {
                        selectAddress(res.data.id);
                    } else if (document.getElementById('addressListModal').classList.contains('flex')) {
                        renderAddressList();
                    }
                }
            });
        } else {
            if (typeof CartHelper !== 'undefined') CartHelper._toast(res.message, 'error');
            else alert(res.message);
        }
    })
    .catch(err => {
        console.error(err);
        if (typeof CartHelper !== 'undefined') CartHelper._toast('Có lỗi xảy ra', 'error');
    })
    .finally(() => {
        btn.disabled = false;
        btn.innerHTML = originalText;
    });
}

function setDefaultAddress(id) {
    fetch(APP_URL + '/api/dia-chi/mac-dinh', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: id })
    })
    .then(res => res.json())
    .then(res => {
        if (res.success) {
            if (typeof CartHelper !== 'undefined') CartHelper._toast(res.message, 'success');
            // Reload list
            fetch(APP_URL + '/api/dia-chi/danh-sach')
            .then(r => r.json())
            .then(dataList => {
                if(dataList.success) {
                    addressesData = dataList.data;
                    renderAddressList();
                }
            });
        } else {
            if (typeof CartHelper !== 'undefined') CartHelper._toast(res.message, 'error');
            else alert(res.message);
        }
    })
    .catch(err => {
        console.error(err);
        if (typeof CartHelper !== 'undefined') CartHelper._toast('Có lỗi xảy ra', 'error');
    });
}
</script>
