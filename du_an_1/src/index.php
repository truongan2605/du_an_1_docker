<?php
session_start();
require_once './commons/env.php';
require_once './commons/function.php';
// require_once './commons/auth.php';


require_once './controller/homeController.php';
require_once './model/sanPham.php';
require_once './model/clientTrangChu.php';
require_once './model/TaiKhoan.php';
require_once './model/ThanhToan.php';



// route
$act = $_GET['act'] ?? '/';

// Đảm bảo gọi đúng phương thức controller
match ($act) {
    '/' => (new HomeController())->home(),
    'tim_kiem' => (new HomeController())->timKiem(),

    'gio_hang' => (new HomeController())->giohang(),
    'them_gio_hang' => (new HomeController())->addGioHang(),
    'xoa_gio_hang' => (new HomeController())->xoaGioHang(),




    'chi_tiet_san_pham' => (new HomeController())->chitietsanpham(),

    'dang_ki' => (new HomeController())->dangki(),
    'register' => (new HomeController())->postRegister(),


    'login' => (new HomeController())->formLogin(),
    'check_login' => (new HomeController())->postLogin(),
    'logout' => (new HomeController())->Logout(),

    'danh_muc' => (new HomeController())->danhmuc(),
    'chi_tiet_don_hang' => (new HomeController())->chiTietDonHang(),

    'don_hang' => (new HomeController())->donhang(),
    'thanh_toan' => (new HomeController())->thanhtoan(),
    
    'danh_dau_giao_hang' => (new HomeController())->danhDauGiaoHang(),
    'huy_don_hang' => (new HomeController())->huyDonHang(),
    // default => include_once './view/404.php' // Trang lỗi 404 nếu không tìm thấy route
};
