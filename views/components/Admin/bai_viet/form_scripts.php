<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    // Khởi tạo Editor
    var quill = new Quill('#editor-container', {
        modules: {
            toolbar: [
                [{ header: [2, 3, 4, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['link', 'image', 'video'],
                ['clean']
            ]
        },
        theme: 'snow'
    });

    // Toggle Schedule (Radio buttons)
    function toggleSchedule(show) {
        const scheduleBox = document.getElementById('scheduleBox');
        if (scheduleBox) {
            if (show) scheduleBox.classList.remove('hidden');
            else scheduleBox.classList.add('hidden');
        }
    }
    
    // Tag management
    let tags = typeof INITIAL_TAGS !== 'undefined' ? INITIAL_TAGS : [];
    const tagInput = document.getElementById('tagInput');
    const tagsContainer = document.getElementById('tagsContainer');

    function renderTags() {
        // Xóa các tag cũ (chỉ giữ lại input cuối cùng)
        Array.from(tagsContainer.children).forEach(child => {
            if (child.id !== 'tagInput') child.remove();
        });

        tags.forEach((tag, index) => {
            const span = document.createElement('span');
            span.className = 'inline-flex items-center gap-1 px-2 py-1 bg-gray-100 border border-gray-200 rounded text-xs text-gray-700';
            span.innerHTML = `${tag} <button type="button" class="hover:text-red-500" onclick="removeTag(${index})"><span class="iconify" data-icon="mdi:close"></span></button>`;
            tagsContainer.insertBefore(span, tagInput);
        });
    }

    function handleTagInput(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const val = tagInput.value.trim();
            if (val && !tags.includes(val)) {
                tags.push(val);
                tagInput.value = '';
                renderTags();
            }
        }
    }

    function removeTag(index) {
        tags.splice(index, 1);
        renderTags();
    }
    renderTags();

    // Related Products management
    let relatedProducts = typeof INITIAL_RELATED_PRODUCTS !== 'undefined' ? INITIAL_RELATED_PRODUCTS : [];
    const searchInput = document.getElementById('searchProductInput');
    const searchResults = document.getElementById('productSearchResults');
    const relatedList = document.getElementById('relatedProductsList');
    const relatedCount = document.getElementById('relatedCount');

    let searchTimeout;
    searchInput.addEventListener('input', (e) => {
        clearTimeout(searchTimeout);
        const q = e.target.value.trim();
        if (q.length < 2) {
            searchResults.classList.add('hidden');
            return;
        }

        searchTimeout = setTimeout(() => {
            fetch(`<?= APP_URL ?>/admin/post/api/search-products?q=${encodeURIComponent(q)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.data.length > 0) {
                        searchResults.innerHTML = '';
                        data.data.forEach(p => {
                            const div = document.createElement('div');
                            div.className = 'p-2 hover:bg-gray-50 flex items-center gap-3 cursor-pointer border-b border-gray-100 last:border-0';
                            div.innerHTML = `
                                <img src="${p.hinh_anh}" class="w-8 h-8 rounded object-cover">
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs font-bold text-gray-800 truncate">${p.ten_sp}</div>
                                    <div class="text-[10px] text-[#6B0D18]">${new Intl.NumberFormat('vi-VN').format(p.gia_ban)}đ</div>
                                </div>
                            `;
                            div.onclick = () => addRelatedProduct(p);
                            searchResults.appendChild(div);
                        });
                        searchResults.classList.remove('hidden');
                    } else {
                        searchResults.innerHTML = '<div class="p-3 text-xs text-gray-500 text-center">Không tìm thấy sản phẩm</div>';
                        searchResults.classList.remove('hidden');
                    }
                });
        }, 300);
    });

    document.addEventListener('click', (e) => {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });

    function addRelatedProduct(product) {
        if (!relatedProducts.find(p => p.id === product.id)) {
            relatedProducts.push(product);
            renderRelatedProducts();
        }
        searchInput.value = '';
        searchResults.classList.add('hidden');
    }

    function removeRelatedProduct(index) {
        relatedProducts.splice(index, 1);
        renderRelatedProducts();
    }

    function renderRelatedProducts() {
        relatedList.innerHTML = '';
        relatedCount.textContent = relatedProducts.length;
        relatedProducts.forEach((p, index) => {
            const div = document.createElement('div');
            div.className = 'flex items-center gap-3 p-2 bg-gray-50 border border-gray-200 rounded-lg relative group';
            div.innerHTML = `
                <img src="${p.hinh_anh}" class="w-10 h-10 rounded object-cover">
                <div class="flex-1 min-w-0">
                    <div class="text-xs font-bold text-gray-800 truncate">${p.ten_sp}</div>
                </div>
                <button type="button" onclick="removeRelatedProduct(${index})" class="text-gray-400 hover:text-red-500 transition-colors p-1"><span class="iconify" data-icon="mdi:close"></span></button>
            `;
            relatedList.appendChild(div);
        });
    }
    renderRelatedProducts();

    // Image upload
    function uploadImage(input) {
        if (!input.files || input.files.length === 0) return;
        const file = input.files[0];
        const formData = new FormData();
        formData.append('image', file);

        const uploadText = document.getElementById('uploadText');
        if(uploadText) uploadText.innerText = 'Đang tải...';

        fetch('<?= APP_URL ?>/admin/post/api/upload-image', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                document.getElementById('hinh_anh').value = data.url;
                document.getElementById('previewImg').src = data.url;
                document.getElementById('imagePreview').classList.remove('hidden');
                document.getElementById('imageUploadBtn').classList.add('hidden');
            } else {
                showToast(data.message || 'Lỗi tải ảnh', 'error');
            }
            if(uploadText) uploadText.innerText = 'Tải ảnh lên';
            input.value = '';
        })
        .catch(err => {
            showToast('Lỗi kết nối server khi tải ảnh', 'error');
            if(uploadText) uploadText.innerText = 'Tải ảnh lên';
            input.value = '';
        });
    }
    function removeImage() {
        document.getElementById('hinh_anh').value = '';
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('imageUploadBtn').classList.remove('hidden');
    }

    // Slug generation
    function toSlug(str) {
        str = str.toLowerCase();
        str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
        str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
        str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
        str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
        str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
        str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
        str = str.replace(/(đ)/g, 'd');
        str = str.replace(/([^a-z0-9-\s])/g, '');
        str = str.replace(/(\s+)/g, '-');
        str = str.replace(/^-+|-+$/g, '');
        return str;
    }
    function generateSlug() {
        const tieuDe = document.getElementById('tieu_de').value;
        const slug = toSlug(tieuDe);
        document.getElementById('slug').value = slug;
    }

    // Modal
    const publishModal = document.getElementById('publishModal');
    function openPublishConfirm() {
        // Validate required fields
        if(!document.getElementById('tieu_de').value) {
            showToast("Vui lòng nhập tiêu đề bài viết!", 'error');
            return;
        }
        if(!document.getElementById('id_danh_muc').value) {
            showToast("Vui lòng chọn danh mục!", 'error');
            return;
        }

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
        showToast("Chức năng đang phát triển.", 'warning');
    }

    // Save POST
    function savePost(trang_thai) {
        const data = {
            id: document.getElementById('postId').value || null,
            tieu_de: document.getElementById('tieu_de').value,
            slug: document.getElementById('slug').value,
            tom_tat: document.getElementById('tom_tat').value,
            noi_dung: quill.root.innerHTML,
            hinh_anh: document.getElementById('hinh_anh').value,
            id_danh_muc: document.getElementById('id_danh_muc').value,
            tags: tags,
            san_pham_lien_quan: relatedProducts.map(p => p.id), // chỉ gửi mảng ID
            seo_title: document.getElementById('seo_title').value,
            seo_description: document.getElementById('seo_description').value,
            trang_thai: trang_thai
        };

        if(!data.tieu_de) {
            showToast("Vui lòng nhập tiêu đề bài viết!", 'error');
            return;
        }

        // Change button text
        const btnText = event.target.innerHTML;
        event.target.innerHTML = 'Đang lưu...';

        fetch('<?= APP_URL ?>/admin/post/api/luu', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(resData => {
            if(resData.success) {
                showToast(resData.message, 'success');
                window.location.href = '<?= APP_URL ?>/admin/post';
            } else {
                showToast(resData.message, 'error');
                event.target.innerHTML = btnText;
            }
        })
        .catch(err => {
            showToast("Lỗi kết nối server", 'error');
            event.target.innerHTML = btnText;
        });
    }
</script>
