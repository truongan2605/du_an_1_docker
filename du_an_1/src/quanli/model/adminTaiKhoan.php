<?php 

class adminTaiKhoan{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllTaiKhoan($chuc_vu_id)
    {
        try {
            $sql = 'SELECT * FROM user WHERE chuc_vu_id = :chuc_vu_id';
             $stmt = $this->conn->prepare($sql);
            $stmt->execute([':chuc_vu_id'=>$chuc_vu_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }
    public function insertTaiKhoan($ten, $email, $mat_khau, $chuc_vu_id)
    {
        try {
            $sql = 'INSERT INTO user(ten, email, mat_khau, chuc_vu_id) VALUES (:ten, :email, :mat_khau, :chuc_vu_id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten' => $ten,
                ':email' => $email,
                ':mat_khau' => $mat_khau,
                ':chuc_vu_id' => $chuc_vu_id
              
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function getDetailTaiKhoan($id){
        try {
            $sql = 'SELECT * FROM user WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    
    public function UpdateTaiKhoan($id, $ten, $email, $so_dien_thoai){
        try {
            $sql = 'UPDATE user SET 
            ten = :ten,
            email = :email,
            so_dien_thoai = :so_dien_thoai
         
            where id = :id';            
            $stmt = $this->conn->prepare($sql);
            $stmt ->execute([
                ':ten'=>$ten,
                ':email'=>$email,
                ':so_dien_thoai'=>$so_dien_thoai,
                ':id'=>$id
            ]);
            return true;

        } catch (Exception $e) {
            echo 'lỗi ' .$e->getMessage();
        }
    }

    public function resetPassword($id, $mat_khau){
        try {
            $sql = 'UPDATE user SET 
            mat_khau = :mat_khau
            
            where id = :id';            
            $stmt = $this->conn->prepare($sql);
            $stmt ->execute([
                ':mat_khau' => $mat_khau,
                
                ':id'=>$id
            ]);
            return true;

        } catch (Exception $e) {
            echo 'lỗi ' .$e->getMessage();
        }
    }

    public function UpdateKhachHang($id, $ten, $email, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi){
        try {
            $sql = 'UPDATE user SET 
            ten = :ten,
            email = :email,
            so_dien_thoai = :so_dien_thoai,
            ngay_sinh = :ngay_sinh,
            gioi_tinh = :gioi_tinh,
            dia_chi = :dia_chi
            
         
            where id = :id';            
            $stmt = $this->conn->prepare($sql);
            $stmt ->execute([
                ':ten'=>$ten,
                ':email'=>$email,
                ':so_dien_thoai'=>$so_dien_thoai,
                ':ngay_sinh'=>$ngay_sinh,
                ':gioi_tinh'=>$gioi_tinh,
                ':dia_chi'=>$dia_chi,
                
                ':id'=>$id
            ]);
            return true;

        } catch (Exception $e) {
            echo 'lỗi ' .$e->getMessage();
        }
    }

    public function checkLogin($email, $password) {
        try {
            $sql = 'SELECT * FROM user WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
    
            $user = $stmt->fetch();
    
            if ($user) {
                if ($password === $user['mat_khau']) {
                    if ($user['chuc_vu_id'] == 1) {
                        return $user; // Return the user data for session storage
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
}