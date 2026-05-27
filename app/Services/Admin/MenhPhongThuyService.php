<?php
namespace App\Services\Admin;

use App\Models\MenhPhongThuyModel;
use App\Models\LoaiDaModel;
use App\Models\SanPhamModel;

class MenhPhongThuyService
{
    private $model;
    private $loaiDaModel;
    private $sanPhamModel;

    public function __construct()
    {
        $this->model = new MenhPhongThuyModel();
        $this->loaiDaModel = new LoaiDaModel();
        $this->sanPhamModel = new SanPhamModel();
    }

    public function getAdminList($filters = [])
    {
        $list = $this->model->getAll($filters);
        
        foreach ($list as &$item) {
            $item['mau_hop'] = !empty($item['mau_sac_hop']) ? array_map('trim', explode(',', $item['mau_sac_hop'])) : [];
            $item['mau_ky'] = !empty($item['mau_ky']) ? array_map('trim', explode(',', $item['mau_ky'])) : [];
            $item['nhu_cau'] = !empty($item['nhu_cau']) ? json_decode($item['nhu_cau'], true) : [];
            $namSinh = !empty($item['nam_sinh']) ? json_decode($item['nam_sinh'], true) : [];
            $item['so_nam_sinh'] = is_array($namSinh) ? count($namSinh) : 0;
            $item['ten_mau_dai_dien'] = $item['mau_dai_dien_hex'] ?? '#E5E7EB';
        }

        return $list;
    }

    public function getStats()
    {
        $all = $this->model->getAll();
        
        $loai_da_lien_ket = 0;
        $san_pham_gan_menh = 0;
        $nam_sinh_cau_hinh = 0;

        foreach ($all as $item) {
            $loai_da_lien_ket += (int)($item['da_hop_count'] ?? 0);
            $san_pham_gan_menh += (int)($item['so_san_pham'] ?? 0);
            $namSinh = !empty($item['nam_sinh']) ? json_decode($item['nam_sinh'], true) : [];
            $nam_sinh_cau_hinh += is_array($namSinh) ? count($namSinh) : 0;
        }

        return [
            'tong_menh' => count($all),
            'dang_hien_thi' => count(array_filter($all, fn($m) => $m['trang_thai'] == 1)),
            'dang_an' => count(array_filter($all, fn($m) => $m['trang_thai'] == 0)),
            'loai_da_lien_ket' => $loai_da_lien_ket,
            'san_pham_gan_menh' => $san_pham_gan_menh,
            'nam_sinh_cau_hinh' => $nam_sinh_cau_hinh
        ];
    }

    public function getDestinyDetails($id)
    {
        $destiny = $this->model->findById($id);
        if (!$destiny) return null;

        $destiny['mau_hop'] = !empty($destiny['mau_sac_hop']) ? array_map('trim', explode(',', $destiny['mau_sac_hop'])) : [];
        $destiny['mau_ky'] = !empty($destiny['mau_ky']) ? array_map('trim', explode(',', $destiny['mau_ky'])) : [];
        $destiny['nhu_cau'] = !empty($destiny['nhu_cau']) ? json_decode($destiny['nhu_cau'], true) : [];
        $destiny['nam_sinh'] = !empty($destiny['nam_sinh']) ? json_decode($destiny['nam_sinh'], true) : [];

        // Fetch related stones
        $destiny['da_hop'] = $this->getRelatedStones($id);
        
        // Fetch related products
        $destiny['san_pham'] = $this->getRelatedProducts($id);
        
        return $destiny;
    }

    private function getRelatedStones($menhId)
    {
        $db = \App\Core\Database::getInstance()->getConnection();
        $sql = "SELECT ld.id, ld.ten_loai_da as ten, ld.mau_sac_ten as mau, ld.nhom as nhom 
                FROM loai_da ld
                JOIN loai_da_menh ldm ON ld.id = ldm.id_loai_da
                WHERE ldm.id_menh = :menh_id";
        $stmt = $db->prepare($sql);
        $stmt->execute(['menh_id' => $menhId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    private function getRelatedProducts($menhId)
    {
        $db = \App\Core\Database::getInstance()->getConnection();
        $sql = "SELECT sp.id, sp.ten_sp as ten, sp.gia_ban as gia, ld.ten_loai_da as da,
                (SELECT SUM(so_luong_ton) FROM san_pham_bien_the spbt2 WHERE spbt2.id_san_pham = sp.id) as ton
                FROM san_pham sp
                LEFT JOIN loai_da ld ON sp.id_loai_da = ld.id
                LEFT JOIN loai_da_menh ldm ON ld.id = ldm.id_loai_da
                WHERE (ldm.id_menh = :menh_id OR FIND_IN_SET(:menh_id2, sp.id_menh_phong_thuy) > 0) AND sp.da_xoa = 0
                GROUP BY sp.id";
        $stmt = $db->prepare($sql);
        $stmt->execute(['menh_id' => $menhId, 'menh_id2' => $menhId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateDestiny($id, $data)
    {
        $updateData = [
            'ten_menh' => trim($data['ten_menh']),
            'slug' => trim($data['slug']),
            'mo_ta' => trim($data['mo_ta'] ?? ''),
            'mo_ta_chi_tiet' => trim($data['mo_ta_chi_tiet'] ?? ''),
            'tuong_sinh' => trim($data['tuong_sinh'] ?? ''),
            'tuong_khac' => trim($data['tuong_khac'] ?? ''),
            'mau_sac_hop' => trim($data['mau_sac_hop'] ?? ''),
            'mau_ky' => trim($data['mau_ky'] ?? ''),
            'mau_dai_dien_hex' => trim($data['mau_dai_dien_hex'] ?? ''),
            'seo_tieu_de' => trim($data['seo_tieu_de'] ?? ''),
            'seo_mo_ta' => trim($data['seo_mo_ta'] ?? ''),
            'trang_thai' => isset($data['trang_thai']) ? 1 : 0
        ];

        if (!empty($data['nam_sinh']) && is_array($data['nam_sinh'])) {
            $updateData['nam_sinh'] = json_encode(array_values(array_filter($data['nam_sinh'], fn($item) => !empty($item['nam']) || !empty($item['can_chi']))));
        } else {
            $updateData['nam_sinh'] = null;
        }

        if (!empty($data['nhu_cau'])) {
            // Need to handle tag input which might come as comma separated or array
            $nhuCauArr = is_array($data['nhu_cau']) ? $data['nhu_cau'] : array_map('trim', explode(',', $data['nhu_cau']));
            $updateData['nhu_cau'] = json_encode(array_filter($nhuCauArr));
        } else {
            $updateData['nhu_cau'] = null;
        }

        return $this->model->update($id, $updateData);
    }

    public function toggleStatus($id)
    {
        return $this->model->toggleStatus($id);
    }
}
