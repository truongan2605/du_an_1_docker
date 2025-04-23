<?php
class adminThongKe
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function thongKeSanPham() {
        try {
             
            $sql = "SELECT COUNT(*) AS tong_so_luong_san_pham 
                    FROM san_pham;
                    ";
            
                    

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            
            return $ketQua['tong_so_luong_san_pham'] ?? 0;
                

        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }

    }
    public function thongKeKhachHang() {
        try {
             
            $sql = "SELECT COUNT(*) AS tong_so_khach_hang 
                    FROM user
                    WHERE chuc_vu_id = 2 ";
            
                    

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            
            return $ketQua['tong_so_khach_hang'] ?? 0;
                

        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }

    }
    public function thongKeDonHang() {
        try {
             
            $sql = "SELECT COUNT(*) AS tong_so_don_hang 
                    FROM don_hang";
            
                    

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            
            return $ketQua['tong_so_don_hang'] ?? 0;
                

        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }

    }
 
    public function doanhThu() {
        try {
            // Chỉ tính tổng tiền từ các đơn hàng đã giao (trang_thai_id = 1)
            $sql = "SELECT SUM(tong_tien) AS doanh_thu  
                    FROM don_hang
                    WHERE trang_thai_id = 1";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            
            return $ketQua['doanh_thu'] ?? 0;
    
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function thongKeDonHangTheoTrangThai() {
        try {
            $sql = "SELECT trang_thai_don_hang.ten_trang_thai, COUNT(don_hang.id) AS so_luong
                    FROM don_hang
                    INNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id
                    GROUP BY don_hang.trang_thai_id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    
    public function sanPhamBanChay() {
        try {
            $sql = "SELECT san_pham.ten_san_pham, SUM(chi_tiet_don_hang.so_luong) AS so_luong_ban
                    FROM chi_tiet_don_hang
                    INNER JOIN san_pham ON chi_tiet_don_hang.san_pham_id = san_pham.id
                    GROUP BY chi_tiet_don_hang.san_pham_id
                    ORDER BY so_luong_ban DESC
                    LIMIT 5";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function doanhThuTheoThoiGian($thoiGian) {
        try {
            $sql = "SELECT SUM(tong_tien) AS doanh_thu
                    FROM don_hang
                    WHERE trang_thai_id = 1 AND ";
            
            switch ($thoiGian) {
                case 'today':
                    $sql .= "DATE(ngay_dat) = CURDATE()";
                    break;
                case 'week':
                    $sql .= "YEARWEEK(ngay_dat, 1) = YEARWEEK(CURDATE(), 1)";
                    break;
                case 'month':
                    $sql .= "MONTH(ngay_dat) = MONTH(CURDATE()) AND YEAR(ngay_dat) = YEAR(CURDATE())";
                    break;
            }
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            return $ketQua['doanh_thu'] ?? 0;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    


}