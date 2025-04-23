<?php
class SanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function timKiemSanPham($keyword)
{
    try {
        $sql = "SELECT * FROM san_pham WHERE ten_san_pham LIKE :keyword";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        throw new Exception("Lỗi khi tìm kiếm sản phẩm: " . $e->getMessage());
    }
}


    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_pham.*, danh_muc.ten_danh_muc
            FROM san_pham
            INNER JOIN danh_muc ON san_pham.danh_muc_id = danh_muc.id;';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }
    
    public function getSanPhamById($id)
    {
        try {
            $sql = 'SELECT san_pham.*, danh_muc.ten_danh_muc
                FROM san_pham
                INNER JOIN danh_muc ON san_pham.danh_muc_id = danh_muc.id
                WHERE san_pham.id = :id;';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung) {
        $sql = "INSERT INTO binh_luan (san_pham_id, tai_khoan_id, noi_dung, ngay_dang, trang_thai) 
                VALUES (:san_pham_id, :tai_khoan_id, :noi_dung, NOW(), 1)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':san_pham_id' => $san_pham_id,
            ':tai_khoan_id' => $tai_khoan_id,
            ':noi_dung' => $noi_dung,
        ]);
    }
    

    // Lấy danh sách bình luận theo sản phẩm
    public function getBinhLuanBySanPhamId($san_pham_id)
    {
        try {
            $sql = 'SELECT binh_luan.*, user.ten AS ten_tai_khoan 
                    FROM binh_luan 
                    INNER JOIN user ON binh_luan.tai_khoan_id = user.id
                    WHERE san_pham_id = :san_pham_id AND trang_thai = 1 
                    ORDER BY ngay_dang DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':san_pham_id' => $san_pham_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getSoLuongSanPham($sanPhamId) {
        try {
            $sql = "SELECT so_luong FROM san_pham WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':san_pham_id' => $sanPhamId]);
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi lấy số lượng sản phẩm: " . $e->getMessage());
        }
    }

    // Cập nhật số lượng sản phẩm
    // public function capNhatSoLuongSanPham($sanPhamId, $soLuong) {
    //     try {
    //         $sql = "UPDATE san_pham SET so_luong = so_luong - :so_luong WHERE id = :san_pham_id";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([':so_luong' => $soLuong, ':san_pham_id' => $sanPhamId]);
    //     } catch (PDOException $e) {
    //         throw new Exception("Lỗi khi cập nhật số lượng sản phẩm: " . $e->getMessage());
    //     }
    // }

    public function capNhatSoLuongSanPham($sanPhamId, $soLuong)
    {
        try {
            // $soLuong có thể là số âm để giảm hoặc số dương để tăng
            $sql = "UPDATE san_pham SET so_luong = so_luong + :so_luong WHERE id = :san_pham_id";
    
            $stmt = $this->conn->prepare($sql);
    
            // Kiểm tra nếu số lượng trong kho sau khi cập nhật sẽ nhỏ hơn 0
            $sqlCheck = "SELECT so_luong FROM san_pham WHERE id = :san_pham_id";
            $stmtCheck = $this->conn->prepare($sqlCheck);
            $stmtCheck->execute([':san_pham_id' => $sanPhamId]);
            $sanPham = $stmtCheck->fetch();
    
            if (!$sanPham) {
                throw new Exception("Sản phẩm không tồn tại.");
            }
    
            $soLuongMoi = $sanPham['so_luong'] + $soLuong;
    
            if ($soLuongMoi < 0) {
                throw new Exception("Số lượng sản phẩm không thể nhỏ hơn 0.");
            }
    
            // Thực hiện cập nhật số lượng
            $stmt->execute([':so_luong' => $soLuong, ':san_pham_id' => $sanPhamId]);
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi cập nhật số lượng sản phẩm: " . $e->getMessage());
        }
    }
    
    

}
