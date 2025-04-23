<?php

class adminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelTaiKhoan = new adminTaiKhoan();
        $this->modelDonHang = new adminDonHang();
        $this->modelSanPham = new adminSanPham();
    }
    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
       
        require_once './view/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri(){
        require_once './view/taikhoan/quantri/addQuanTri.php';

    }

    public function postAddQuanTri(){
     
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];

            $errors = [];
            if (empty($ten)) {
                $errors['ten'] = 'Tên không được để trống';
            }

            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
        
            if (empty($errors)) {
               $password = password_hash('123@123', PASSWORD_BCRYPT);
               $chuc_vu_id = 1;
              $this->modelTaiKhoan->insertTaiKhoan($ten, $email, $mat_khau, $chuc_vu_id);
                header('Location:' . BASE_URL_QUANLI. '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;

                header('Location:' . BASE_URL_QUANLI. '?act=form-them-quan-tri');
                exit();
            }
        }
    
    }

    public function formEditQuanTri(){
        $id_quan_tri = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
        // var_dump($quanTri);die;
        require_once './view/taikhoan/quantri/editQuanTri.php';
        deleteSessionError();
    }

    public function postEditQuanTri(){
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $quan_tri_id = $_POST['quan_tri_id']?? '';

            $ten = $_POST['ten']?? '';
            $email = $_POST['email']?? '';
            $so_dien_thoai = $_POST['so_dien_thoai']?? '';
            
            
            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten)){
                $errors['ten'] = 'tên người dung không được để trống';
            }
            if(empty($email)){
                $errors['email'] = 'Email người dung không được để trống';
            }
            

           
            $_SESSION['error'] =$errors; 
            if(empty($errors)){
                // echo 'ok' ;die();
                 $this->modelTaiKhoan->UpdateTaiKhoan($quan_tri_id,$ten,$email,$so_dien_thoai);
                //  var_dump($abc);die;
                // sử lí them ambum ảnh sản phẩm 
               
                header('Location: ' . BASE_URL_QUANLI . '?act=list-tai-khoan-quan-tri');
                // echo 'ok' ;die();
                exit();

            }else{
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_QUANLI . '?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
                exit();
            }
        }
    }

    public function resetPassword(){
        $tai_khoan_id = $_GET['quan_tri_id'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);

        $password = password_hash('123@123', PASSWORD_BCRYPT);
              
        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);
        if ($status && $tai_khoan['chuc_vu_id'] == 2){
            header("Location: " . BASE_URL_QUANLI . '?act=list-tai-khoan-quan-tri');
            exit();
        }elseif($status && $tai_khoan['chuc_vu_id'] == 1){
            header("Location: " . BASE_URL_QUANLI . '?act=list-tai-khoan-khach-hang');
            exit();

        
        }else {
            var_dump('Lỗi khi reset tài khoản');die;
        }

    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
       
        require_once './view/taikhoan/khachHang/listKhachHang.php';
    }

    public function formEditKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        // var_dump($quanTri);die;
        require_once './view/taikhoan/khachhang/editKhachHang.php';
        deleteSessionError();
    }

    public function postEditKhachHang(){
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $khach_hang_id = $_POST['khach_hang_id']?? '';

            $ten = $_POST['ten']?? '';
            $email = $_POST['email']?? '';
            $so_dien_thoai = $_POST['so_dien_thoai']?? '';
            $ngay_sinh = $_POST['ngay_sinh']?? '';
            $gioi_tinh = $_POST['gioi_tinh']?? '';
            $dia_chi = $_POST['dia_chi']?? '';
            
            
            
            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten)){
                $errors['ten'] = 'tên người dung không được để trống';
            }
            if(empty($email)){
                $errors['email'] = 'Email người dung không được để trống';
            }

            if(empty($ngay_sinh)){
                $errors['ngay_sinh'] = 'Ngày sinh người dung không được để trống';
            }

            if(empty($gioi_tinh)){
                $errors['gioi_tinh'] = 'Giới tính người dung không được để trống';
            }

           
          

           
            $_SESSION['error'] = $errors; 
            if(empty($errors)){
                // echo 'ok' ;die();
                 $this->modelTaiKhoan->UpdateKhachHang($khach_hang_id,
                 $ten,
                 $email,
                 $so_dien_thoai,
                 $ngay_sinh,
                 $gioi_tinh,
                $dia_chi
           );
                //  var_dump($abc);die;
                // sử lí them ambum ảnh sản phẩm 
               
                header('Location: ' . BASE_URL_QUANLI . '?act=list-tai-khoan-khach-hang');
                // echo 'ok' ;die();
                exit();

            }else{
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_QUANLI . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }

    public function detailKhachHang(){
        $id_khach_hang=$_GET['id_khach_hang'];
        $khachHang=$this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);


        $listDonHang=$this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
        
        $listBinhLuan=$this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
        
        require_once './view/taikhoan/khachhang/detailKhachHang.php';
    }

    // --------------------------------------------------------------------------------------------------------------------------------

    public function formLogin()
    {
        require_once './view/login.php';
        deleteSessionError(); // Hàm xóa lỗi cũ (nếu có)
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy email và password từ form
            $email = $_POST['email'];
            $password = $_POST['password']; // Đổi tên field mật khẩu khớp với form

            // Gọi hàm kiểm tra login
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            // var_dump($user); exit;
            if (is_array($user)) {
                // Đăng nhập thành công
                $_SESSION['user_management'] = $user; // Lưu thông tin user vào session
                if ($user['role'] == 3) {
                    header('location:' . BASE_URL_QUANLI);
                } else {
                    header('Location: ' . BASE_URL);
                    exit();
                }
            } else {
                // Lỗi đăng nhập
                $_SESSION['error'] = $user; // Lưu thông báo lỗi vào session
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_management'])) {
            unset($_SESSION['user_management']); // Xóa session user
            header('Location: ' . BASE_URL . '/');
        }
    }
}
