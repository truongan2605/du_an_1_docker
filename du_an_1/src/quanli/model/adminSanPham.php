<?php
class adminSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_pham.*, danh_muc.ten_danh_muc FROM san_pham
             INNER JOIN danh_muc ON san_pham.danh_muc_id =danh_muc.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function insertSanPham($ten, $danh_muc_id, $mo_ta, $gia,$gia_khuyen_mai, $so_luong,  $ngay_nhap, $trang_thai, $anh)
    {
        try {
            $sql = 'INSERT INTO san_pham(ten_san_pham,danh_muc_id,mo_ta, gia_san_pham,gia_khuyen_mai,hinh_anh,so_luong,ngay_nhap,trang_thai)
            VALUES (:ten_san_pham,:danh_muc_id,:mo_ta, :gia_san_pham,:gia_khuyen_mai,:hinh_anh,:so_luong,:ngay_nhap,:trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham' => $ten,
                ':danh_muc_id' => $danh_muc_id,
                ':mo_ta' => $mo_ta,
                ':gia_san_pham' => $gia,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':trang_thai' => $trang_thai,
                ':hinh_anh' => $anh
            ]);
            //lay id san pham
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh)
    {
        try {
            $sql = 'INSERT INTO hinh_anh_san_pham (san_pham_id, link_hinh_anh)
            VALUES (:san_pham_id, :link_hinh_anh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh

            ]);
            //lay id san pham
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getDetailSanpham($id)
    {
        try {
            $sql = 'SELECT san_pham.*, danh_muc.ten_danh_muc FROM san_pham
             INNER JOIN danh_muc ON san_pham.danh_muc_id =danh_muc.id 
            where san_pham.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getListAnhSanpham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_pham WHERE san_pham_id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function updateSanPham($san_pham_id,$ten, $danh_muc_id, $mo_ta, $gia,$gia_khuyen_mai, $so_luong,  $ngay_nhap, $trang_thai, $anh)
    {
        try {
            $sql = 'UPDATE san_pham
                    SET 
                       ten_san_pham=:ten_san_pham,
                       danh_muc_id=:danh_muc_id,
                       mo_ta=:mo_ta,
                       gia_san_pham=:gia_san_pham,
                       gia_khuyen_mai=:gia_khuyen_mai,
                       so_luong=:so_luong,
                       ngay_nhap=:ngay_nhap,
                       trang_thai=:trang_thai,
                       hinh_anh=:hinh_anh
                    WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham' => $ten,
                ':danh_muc_id' => $danh_muc_id,
                ':mo_ta' => $mo_ta,
                ':gia_san_pham' => $gia,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':trang_thai' => $trang_thai,
                ':hinh_anh' => $anh,
                ':id' => $san_pham_id,
            ]);
            //lay id san pham
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getDetailAnhSanpham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_pham WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function updateAnhSanPham($id, $new_file)
    {
        try {
            $sql = 'UPDATE hinh_anh_san_pham
                    SET 
                       linh_hinh_anh=:new_file
                      
                    WHERE id=:id   
                       ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':new_file' => $new_file,
                ':id' => $id

            ]);
            //lay id san pham
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function destroyAnhSanPham($id)
    {
        try {
            $sql = 'DELETE FROM hinh_anh_san_pham WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function destroySanPham($id)
    {
        try {
            $sql = 'DELETE FROM san_pham WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }


     //binh luan
     public function getBinhLuanFromKhachHang($id) {
        try {
            $sql = 'SELECT binh_luan.*, san_pham.ten_san_pham 
                    FROM binh_luan
                    INNER JOIN san_pham ON binh_luan.san_pham_id = san_pham.id
                    WHERE binh_luan.tai_khoan_id= :id'
                    ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
      
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

   
}
