<?php

namespace App\Services\User;

use App\Models\Admin\BannerModel;
use App\Models\Admin\DanhMucModel;
use App\Models\Admin\SanPhamModel;
use App\Models\Admin\CauHinhModel;
use App\Models\Admin\MenhPhongThuyModel;
use App\Models\Admin\KhuyenMaiModel;
use App\Models\Admin\DanhGiaModel;
use App\Models\Admin\BaiVietModel;
use App\Models\Admin\VoucherModel;
use App\Constants\SystemConstants;

class HomeService
{
    private $bannerModel;
    private $danhMucModel;
    private $sanPhamModel;
    private $cauHinhModel;
    private $menhModel;
    private $khuyenMaiModel;
    private $danhGiaModel;
    private $baiVietModel;
    private $voucherModel;

    public function __construct()
    {
        $this->bannerModel = new BannerModel();
        $this->danhMucModel = new DanhMucModel();
        $this->sanPhamModel = new SanPhamModel();
        $this->cauHinhModel = new CauHinhModel();
        $this->menhModel = new MenhPhongThuyModel();
        $this->khuyenMaiModel = new KhuyenMaiModel();
        $this->danhGiaModel = new DanhGiaModel();
        $this->baiVietModel = new BaiVietModel();
        $this->voucherModel = new VoucherModel();
    }

    public function getHomeData()
    {
        // Lấy voucher đang hoạt động (còn lượt dùng, chưa hết hạn), giới hạn 3
        $allVouchers = $this->voucherModel->getActiveVouchers();
        $vouchers = array_slice($allVouchers, 0, 4);
        
        $saved_vouchers = [];
        if (!empty($_SESSION['user_id'])) {
            $khuyenMaiService = new \App\Services\User\KhuyenMaiService();
            $saved_vouchers = $khuyenMaiService->getSavedVoucherIds($_SESSION['user_id']);
        }

        return [
            'saved_vouchers' => $saved_vouchers,
            'banners' => $this->bannerModel->getActiveBanners('slider_chinh', 5),
            'danh_muc' => $this->danhMucModel->getFeaturedCategories(6),
            'san_pham_ban_chay' => $this->sanPhamModel->getBestSellers(8),
            'bo_suu_tap' => $this->sanPhamModel->getNewProducts(8),
            'tai_sao_chon_chung_toi' => [
                'tieu_de' => $this->cauHinhModel->get('ts_tieu_de', 'Tại sao chọn Chuỗi Ngọc?'),
                'mo_ta' => $this->cauHinhModel->get('ts_mo_ta', 'Chúng tôi cung cấp những sản phẩm phong thủy chất lượng nhất, mang lại may mắn và bình an cho bạn.'),
                'diem_noibat_1' => $this->cauHinhModel->get('ts_diem1', 'Chất lượng đá tự nhiên 100%'),
                'diem_noibat_2' => $this->cauHinhModel->get('ts_diem2', 'Bảo hành dây trọn đời'),
                'diem_noibat_3' => $this->cauHinhModel->get('ts_diem3', 'Tư vấn phong thủy miễn phí')
            ],
            'ngu_hanh' => $this->menhModel->layTatCa(['status' => SystemConstants::STATUS_ACTIVE]),
            'flash_sale' => $this->khuyenMaiModel->getActiveFlashSale(),
            'vouchers' => $vouchers,
            'danh_gia' => $this->danhGiaModel->getFeaturedReviews(6),
            'bai_viet' => $this->baiVietModel->getLatestPosts(3)
        ];
    }
}
