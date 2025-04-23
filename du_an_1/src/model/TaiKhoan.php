<?php
class TaiKhoan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function Register($ten, $gender, $ngay_sinh, $email, $password)
    {
        try {
            // Mã hóa mật khẩu
            // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = 'INSERT INTO user(ten, gioi_tinh, ngay_sinh, email, mat_khau, chuc_vu_id) 
                    VALUES (:ten, :gioi_tinh, :ngay_sinh, :email, :mat_khau, :chuc_vu_id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten' => $ten,
                ':gioi_tinh' => $gender,
                ':ngay_sinh' => $ngay_sinh,
                ':email' => $email,
                ':mat_khau' => $password,
                ':chuc_vu_id' => 2 // Gán mặc định chuc_vu_id cho người dùng (1: nhân viên, 2: người dùng, 3: quản lí)
            ]);
            return true;
        } catch (Exception $e) {
            $_SESSION['error']['general'] = "Lỗi hệ thống: " . $e->getMessage();
            error_log($e->getMessage());
            return false;
        }
    }


    public function checkLogin($email, $password)
    {
        try {
            $sql = 'SELECT * FROM user WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);

            $user = $stmt->fetch();

            if ($user) {
                if ($password === $user['mat_khau']) {
                    if ($user['chuc_vu_id'] == 1 || $user['chuc_vu_id'] == 2 ||$user['chuc_vu_id'] == 3 ) {
                        return $user;
                    } else {
                        return "Tài khoản không có quyền đăng nhập";
                    }
                } else {
                    return "Mật khẩu không đúng";
                }
            } else {
                return "Tài khoản không tồn tại";
            }
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
    public function checkEmailExists($email)
    {
        try {
            $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            $count = $stmt->fetchColumn();
            return $count > 0; // Nếu số lượng lớn hơn 0, email đã tồn tại
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    
    public function getTaiKhoanFromEmail($email){
        try {
            $sql = 'SELECT * FROM user WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);

            return $stmt->fetch();

        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            
        }
    }
}
