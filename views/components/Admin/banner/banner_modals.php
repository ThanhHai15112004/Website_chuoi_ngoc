<?php
// views/components/Admin/banner/banner_modals.php
?>
<!-- Modal Bật/Tắt Banner -->
<div id="toggleBannerModal" class="fixed inset-0 z-[60] hidden">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeToggleModal()"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-50 sm:mx-0 sm:h-10 sm:w-10">
                            <span class="iconify text-2xl text-blue-600" data-icon="mdi:information-outline"></span>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-bold leading-6 text-gray-900" id="modal-title">Thay đổi trạng thái banner?</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Bạn đang chuẩn bị thay đổi trạng thái hiển thị của banner ngoài website. <br>
                                    <span class="text-xs text-orange-600 mt-2 block bg-orange-50 p-2 rounded border border-orange-100 hidden" id="toggleWarning">
                                        Lưu ý: Banner chưa có ảnh mobile hoặc link đích. Vui lòng kiểm tra kỹ trước khi bật.
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" onclick="closeToggleModal()" class="inline-flex w-full justify-center rounded-lg bg-[#6B0D18] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#8A1120] sm:ml-3 sm:w-auto">Xác nhận</button>
                    <button type="button" onclick="closeToggleModal()" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Xóa Banner -->
<div id="deleteBannerModal" class="fixed inset-0 z-[60] hidden">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeDeleteModal()"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <span class="iconify text-2xl text-red-600" data-icon="mdi:alert-outline"></span>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-bold leading-6 text-gray-900" id="modal-title">Xóa banner?</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Bạn có chắc muốn xóa banner này không? Dữ liệu sẽ bị xóa vĩnh viễn và không thể khôi phục.
                                </p>
                                <div class="mt-3 p-3 bg-red-50 border border-red-100 rounded-lg text-sm text-red-800 font-medium">
                                    Banner này đang hiển thị ngoài website. Bạn nên xem xét tắt nó đi thay vì xóa hoàn toàn.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" onclick="closeDeleteModal()" class="inline-flex w-full justify-center rounded-lg bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Xóa banner</button>
                    <button type="button" onclick="closeDeleteModal()" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Tắt thay vì xóa</button>
                    <button type="button" onclick="closeDeleteModal()" class="mt-3 sm:mt-0 mr-auto text-sm text-gray-500 hover:text-gray-800 hover:underline">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>
