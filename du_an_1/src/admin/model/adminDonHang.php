<?php

class AdminDonHang
{

    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDonHang()
    {
        try {
            $sql = 'SELECT don_hang.*, trang_thai_don_hang.ten_trang_thai 
                    FROM don_hang 
                    INNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * from trang_thai_don_hang ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getDetailDonHang($don_hang_id)
    {
        try {
            // Câu truy vấn SQL đã sửa
            $sql = 'SELECT don_hang.*, 
               trang_thai_don_hang.ten_trang_thai, 
               user.ten, 
               user.email, 
               user.so_dien_thoai, 
               phuong_thuc_thanh_toan.ten_phuong_thuc
        FROM don_hang
        INNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id
        INNER JOIN user ON don_hang.user_id = user.id
        INNER JOIN phuong_thuc_thanh_toan ON don_hang.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toan.id
        WHERE don_hang.id = :don_hang_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':don_hang_id', $don_hang_id, PDO::PARAM_INT);




            // Thực thi truy vấn với tham số
            $stmt->execute();
            return $stmt->fetch(); // Sử dụng fetch() thay vì fetchAll() nếu chỉ lấy 1 bản ghi



        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function getListSpDonHang($id)
    {
        try {
            // $sql = 'SELECT chi_tiet_don_hang.*,san_pham.ten_san_pham
            $sql = 'SELECT chi_tiet_don_hang.*, san_pham.ten_san_pham
            FROM chi_tiet_don_hang
            INNER JOIN san_pham ON chi_tiet_don_hang.san_pham_id = san_pham.id
            WHERE chi_tiet_don_hang.don_hang_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function UpdateDonHang($id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id)
    {
        try {
            $sql = 'UPDATE don_hang SET 
            ten_nguoi_nhan = :ten_nguoi_nhan,
            sdt_nguoi_nhan=:sdt_nguoi_nhan,
            email_nguoi_nhan=:email_nguoi_nhan,
            dia_chi_nguoi_nhan=:dia_chi_nguoi_nhan,
            ghi_chu=:ghi_chu,
            trang_thai_id = :trang_thai_id
            where id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,

                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ghi_chu' => $ghi_chu,
                ':trang_thai_id' => $trang_thai_id,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'lỗi ' . $e->getMessage();
        }
    }


    public function getDonHangFromKhachHang($id)
    {
        try {
            $sql = 'SELECT don_hang.*, trang_thai_don_hang.ten_trang_thai 
                    FROM don_hang
                    INNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id
                    WHERE don_hang.tai_khoan_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function destroyDonHang($id)
    {
        try {
            $sql = 'DELETE FROM don_hang WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
}
