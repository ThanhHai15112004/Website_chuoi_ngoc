<?php
// views/pages/admin_san_pham_form.php
$is_edit = $is_edit ?? false;
$sp = $san_pham ?? [];
?>
<div class="space-y-6">
    <!-- Breadcrumb & Header -->
    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                <a href="<?= APP_URL ?>/admin/san-pham" class="hover:text-[#6B0D18] transition-colors flex items-center gap-1">
                    <span class="iconify text-base" data-icon="mdi:arrow-left"></span>
                    Danh sách sản phẩm
                </a>
                <span>/</span>
                <span class="text-gray-900 font-medium"><?= $is_edit ? 'Chỉnh sửa sản phẩm' : 'Thêm sản phẩm mới' ?></span>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 font-luxury"><?= $is_edit ? 'Chỉnh sửa: ' . ($sp['ten_sp'] ?? '') : 'Thêm sản phẩm mới' ?></h2>
            <?php if($is_edit): ?>
            <p class="text-sm text-gray-500 mt-1 font-mono">Mã SP: <?= $sp['ma_sp'] ?? '' ?></p>
            <?php endif; ?>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/san-pham" class="px-5 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm inline-block">
                Hủy bỏ
            </a>
            <button type="submit" form="productForm" class="flex items-center gap-2 px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:content-save-outline"></span>
                <?= $is_edit ? 'Lưu thay đổi' : 'Tạo sản phẩm' ?>
            </button>
        </div>
    </div>

    <!-- Form Area -->
    <form id="productForm" action="" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Cột Trái (2/3) -->
        <div class="lg:col-span-2 space-y-6">
            
<?php include __DIR__ . '/../components/Admin/san_pham/form_basic.php'; ?>

        </div>

        <!-- Cột Phải (1/3) -->
        <div class="lg:col-span-1 space-y-6">
            
<?php include __DIR__ . '/../components/Admin/san_pham/form_sidebar.php'; ?>

        </div>
    </form>
</div>

<!-- Quill JS CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    .ql-toolbar.ql-snow {
        border: none !important;
        border-bottom: 1px solid #e5e7eb !important;
        background-color: #f9fafb;
        padding: 8px 12px;
        font-family: inherit;
    }
    .ql-container.ql-snow {
        border: none !important;
        font-family: inherit;
        font-size: 14px;
    }
    .ql-editor {
        min-height: 250px;
    }
    .ql-editor:focus {
        outline: none;
    }
</style>

<!-- Quill JS Script -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'align': [] }],

        ['link', 'image', 'video'],
        ['clean']                                         // remove formatting button
    ];

    var quill = new Quill('#editor-container', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow',
        placeholder: 'Viết bài mô tả chuẩn SEO...'
    });

    // Đồng bộ dữ liệu vào hidden input trước khi submit form
    var form = document.getElementById('productForm');
    var input = document.getElementById('mo_ta_chi_tiet_input');
    
    // Gán dữ liệu ban đầu
    if (quill.root.innerHTML === '<p><br></p>') {
        input.value = '';
    } else {
        input.value = quill.root.innerHTML;
    }

    if(form) {
        form.addEventListener('submit', function() {
            var content = quill.root.innerHTML;
            if (content === '<p><br></p>') {
                input.value = '';
            } else {
                input.value = content;
            }
        });
    }
});
</script>
