<?php
class ThanhToan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function layDonHangTuKhachHang($taiKhoanId)
    {
        try {
            $sql = 'SELECT don_hang.*, trang_thai_don_hang.ten_trang_thai 
                    FROM don_hang
                    INNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id 
                    WHERE don_hang.tai_khoan_id = :tai_khoan_id
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $taiKhoanId]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            throw new Exception("Lỗi khi lấy danh sách đơn hàng: " . $e->getMessage());
        }
    }

    public function layChiTietDonHang($donHangId)
    {
        try {
            $sql = 'SELECT don_hang.*, trang_thai_don_hang.ten_trang_thai, phuong_thuc_thanh_toan.ten_phuong_thuc
                    FROM don_hang
                    INNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id
                    INNER JOIN phuong_thuc_thanh_toan ON don_hang.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toan.id
                    WHERE don_hang.id = :don_hang_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':don_hang_id' => $donHangId]);
            return $stmt->fetch();
        } catch (Exception $e) {
            throw new Exception("Lỗi khi lấy chi tiết đơn hàng: " . $e->getMessage());
        }
    }

    public function laySanPhamDonHang($donHangId)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hang.*, san_pham.ten_san_pham, san_pham.gia_khuyen_mai AS don_gia
                    FROM chi_tiet_don_hang
                    INNER JOIN san_pham ON chi_tiet_don_hang.san_pham_id = san_pham.id  
                    WHERE chi_tiet_don_hang.don_hang_id = :don_hang_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':don_hang_id' => $donHangId]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            throw new Exception("Lỗi khi lấy danh sách sản phẩm của đơn hàng: " . $e->getMessage());
        }
    }

    public function taoDonHang($data)
    {
        try {
            // Tạo mã đơn hàng ngẫu nhiên
            $maDonHang = 'MT' . strtoupper(uniqid());

            $sql = "INSERT INTO don_hang (
                    ma_don_hang, user_id, ten_nguoi_nhan, email_nguoi_nhan, 
                    sdt_nguoi_nhan, dia_chi_nguoi_nhan, ngay_dat, tong_tien, 
                    ghi_chu, phuong_thuc_thanh_toan_id, trang_thai_id, tai_khoan_id
                ) VALUES (
                    :ma_don_hang, :user_id, :ten_nguoi_nhan, :email_nguoi_nhan, 
                    :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, :ngay_dat, :tong_tien, 
                    :ghi_chu, :phuong_thuc_thanh_toan_id, :trang_thai_id, :tai_khoan_id
                )";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ma_don_hang' => $maDonHang,
                ':user_id' => $data['user_id'],
                ':ten_nguoi_nhan' => $data['ten_nguoi_nhan'],
                ':email_nguoi_nhan' => $data['email_nguoi_nhan'],
                ':sdt_nguoi_nhan' => $data['sdt_nguoi_nhan'],
                ':dia_chi_nguoi_nhan' => $data['dia_chi_nguoi_nhan'],
                ':ngay_dat' => date('Y-m-d'),
                ':tong_tien' => $data['tong_tien'],
                ':ghi_chu' => $data['ghi_chu'] ?? null,
                ':phuong_thuc_thanh_toan_id' => $data['phuong_thuc_thanh_toan_id'],
                ':trang_thai_id' => 3, // Mặc định là "Đang xử lý"
                ':tai_khoan_id' => $data['tai_khoan_id']
            ]);
            return $this->conn->lastInsertId(); // Lấy ID của đơn hàng vừa tạo
        } catch (Exception $e) {
            throw new Exception("Lỗi khi tạo đơn hàng: " . $e->getMessage());
        }
    }





    public function taoChiTietDonHang($donHangId, $sanPham)
    {
        try {
            $sql = "INSERT INTO chi_tiet_don_hang (don_hang_id, san_pham_id, don_gia, so_luong, thanh_tien) 
                VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong, :thanh_tien)";
            $stmt = $this->conn->prepare($sql);

            // Tính toán `thanh_tien`
            $thanhTien = $sanPham['gia'] * $sanPham['so_luong'];

            $stmt->execute([
                ':don_hang_id' => $donHangId,
                ':san_pham_id' => $sanPham['san_pham_id'],
                ':don_gia' => $sanPham['gia'],
                ':so_luong' => $sanPham['so_luong'],
                ':thanh_tien' => $thanhTien
            ]);
        } catch (Exception $e) {
            throw new Exception("Lỗi khi lưu chi tiết đơn hàng: " . $e->getMessage());
        }
    }

    public function capNhatTrangThaiDonHang($donHangId, $trangThaiId)
    {
        try {
            $sql = "UPDATE don_hang SET trang_thai_id = :trang_thai_id WHERE id = :don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trang_thai_id' => $trangThaiId,
                ':don_hang_id' => $donHangId
            ]);
        } catch (Exception $e) {
            throw new Exception("Lỗi khi cập nhật trạng thái đơn hàng: " . $e->getMessage());
        }
    }
}
