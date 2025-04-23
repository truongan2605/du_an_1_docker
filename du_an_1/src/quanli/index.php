<?php
session_start();
require_once '../commons/env.php';
require_once '../commons/function.php';
// require_once '../commons/auth.php';


require_once './controller/adminSanPhamController.php';
require_once './controller/adminDanhMucController.php';
require_once './controller/adminDonHangController.php';
require_once './controller/adminBinhLuanController.php';
require_once './controller/adminTaiKhoanController.php';
require_once './controller/adminThongkeController.php';



require_once './model/adminSanPham.php';
require_once './model/adminDanhMuc.php';
require_once './model/adminDonHang.php';
require_once './model/adminBinhLuan.php';
require_once './model/adminTaiKhoan.php';
require_once './model/adminThongKe.php';



// Route
$act = $_GET['act'] ?? '/';
checkLoginQuanLi();
match($act){
    '/'=>(new adminDanhMucController())->danhSachDanhMuc(),

    'danh-muc'=>(new adminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc'=>(new adminDanhMucController())->formThemDanhMuc(),
    'them-danh-muc'=>(new adminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc'=>(new adminDanhMucController())->formSuaDanhMuc(),
    'sua-danh-muc'=>(new adminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc'=>(new adminDanhMucController())->deleteDanhMuc(),

    'san-pham'=>(new adminSanPhamController())->danhSachSanPham(),
    'form-them-san-pham'=>(new adminSanPhamController())->formAddSanPham(),
    'them-san-pham'=>(new adminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham'=>(new adminSanPhamController())->formEditSanPham(),
    'sua-san-pham'=>(new adminSanPhamController())->postEditSanPham(),
    'xoa-san-pham'=>(new adminSanPhamController())->deleteSanPham(),


    'don-hang'=>(new adminDonHangController())->danhSachDonHang(),
    'form-sua-don-hang'=>(new adminDonHangController())->formEditDonHang(),
    'sua-don-hang'=>(new adminDonHangController())->postEditDonHang(),
    'chi-tiet-don-hang'=>(new adminDonHangController())->detailDonHang(),


    'binh-luan'=>(new adminBinhLuanController())->danhSachBinhLuan(),
    'xoa_binh_luan' => (new adminBinhLuanController())->delete_binh_luan($id),
    // 'update-trang-thai-binh-luan'=>(new adminSanPhamController())->updateTrangThaiBinhLuan(),


    'login_admin' => (new adminTaiKhoanController())->formLogin(),
    'check_login_admin'=> (new adminTaiKhoanController())->login(),
    'logout_admin'=> (new adminTaiKhoanController())->logout(),


    'list-tai-khoan-quan-tri' =>(new adminTaiKhoanController())->danhSachQuanTri(),
    'form-them-quan-tri' =>(new adminTaiKhoanController())->formAddQuanTri(),
    'them-quan-tri' =>(new adminTaiKhoanController())->postAddQuanTri(),
    'form-sua-quan-tri'=>(new adminTaiKhoanController())->formEditQuanTri(),
    'sua-quan-tri'=>(new adminTaiKhoanController())->postEditQuanTri(),
    
    'reset-password'=>(new adminTaiKhoanController())->resetPassword(),
    
    'list-tai-khoan-khach-hang' =>(new adminTaiKhoanController())->danhSachKhachHang(),
    'form-sua-khach-hang'=>(new adminTaiKhoanController())->formEditKhachHang(),
    'sua-khach-hang'=>(new adminTaiKhoanController())->postEditKhachHang(),
    'chi-tiet-khach-hang'=>(new adminTaiKhoanController())->detailKhachHang(),

    'thong-ke'=>(new adminThongKeController())->thongke(),


    
}
?>
