<script>
    function addYear() {
        const nam = document.getElementById('inputNam').value;
        const canChi = document.getElementById('inputCanChi').value;
        
        if (!nam) {
            alert('Vui lòng nhập năm sinh!');
            return;
        }

        const container = document.getElementById('namSinhContainer');
        const count = container.children.length;

        const html = `
            <div class="flex items-center justify-between px-3 py-2 border border-gray-200 rounded-lg hover:border-[#6B0D18] transition-colors group relative bg-white">
                <div>
                    <h5 class="text-sm font-bold text-gray-800">${nam}</h5>
                    <p class="text-[10px] text-gray-500">${canChi}</p>
                    <input type="hidden" name="nam_sinh[${count}][nam]" value="${nam}">
                    <input type="hidden" name="nam_sinh[${count}][can_chi]" value="${canChi}">
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-gray-400 hover:text-red-500 transition-colors opacity-0 group-hover:opacity-100" title="Xóa">
                    <span class="iconify" data-icon="mdi:trash-can-outline"></span>
                </button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
        
        document.getElementById('inputNam').value = '';
        document.getElementById('inputCanChi').value = '';
        document.getElementById('addYearModal').classList.add('hidden');
    }
</script>
