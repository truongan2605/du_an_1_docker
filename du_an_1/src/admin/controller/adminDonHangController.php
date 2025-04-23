<?php

class AdminDonHangController
{
    public $modelDonHang;
    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }

    public function danhSachDonHang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once './view/don_hang/listDonHang.php';
    }

public function detailDonHang(){
    $don_hang_id = $_GET['id_don_hang'];

    $donHang=$this->modelDonHang->getDetailDonHang($don_hang_id);
    // var_dump($donHang);die;

    $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);

    $listTrangDonHang=$this->modelDonHang->getAllTrangThaiDonHang();
    require_once './view/don_hang/DetailDonHang.php';

}
    public function formEditDonHang(){

        $id = $_GET['id_don_hang'];
        $DonHang = $this->modelDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        
        //lấy ra thông tin của danh mục cần sửa
        
        if($DonHang){
           require_once './view/don_hang/EditDonHang.php';
           deleteSessionError();

        }else{

            header('Location: ' . BASE_URL_AMIN . '?act=don-hang');
            exit();

        }
    }
    public function postEditDonHang(){
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $don_hang_id = $_POST['don_hang_id']?? '';

            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan']?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan']?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan']?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan']?? '';
            $ghi_chu = $_POST['ghi_chu']?? '';
            $trang_thai_id = $_POST['trang_thai_id']?? '';
            
            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten_nguoi_nhan)){
                $errors['ten_nguoi_nhan'] = 'tên người nhân không được để trống';
            }

            if(empty($sdt_nguoi_nhan)){
                $errors['sdt_nguoi_nhan'] = 'số điện thoại không được để trống';
            }

            if(empty($email_nguoi_nhan)){
                $errors['email_nguoi_nhan'] = 'email không được để trống';
            }

            if(empty($dia_chi_nguoi_nhan)){
                $errors['dia_chi_nguoi_nhan'] = 'địa chỉ không được để trống';
            }
   
            if(empty($trang_thai_id)){
                $errors['trang_thai_id'] = 'trạng thía đơn hàng phải chọn';
            }            
            $_SESSION['error'] =$errors; 
            if(empty($errors)){
                // echo 'ok' ;die();
                 $this->modelDonHang->UpdateDonHang($don_hang_id,$ten_nguoi_nhan,$sdt_nguoi_nhan,$email_nguoi_nhan,$dia_chi_nguoi_nhan,$ghi_chu,$trang_thai_id);
                //  var_dump($abc);die;
                // sử lí them ambum ảnh sản phẩm 
               
                header('Location: ' . BASE_URL_AMIN . '?act=don-hang');
                // echo 'ok' ;die();
                exit();

            }else{
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_AMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
            }
        }
    }

  

}
