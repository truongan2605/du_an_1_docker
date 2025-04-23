<?php
class adminThongkeController
{
    public $modelThongKe;
    public function __construct()
    {
        $this->modelThongKe = new adminThongKe();
    }

    public function thongke()
    {


        $soLuongSanPham = $this->modelThongKe->thongKeSanPham();
        $soLuongKhachHang = $this->modelThongKe->thongKeKhachHang();
        $soLuongDonHang = $this->modelThongKe->thongKeDonHang();
        $doanhThu = $this->modelThongKe->doanhThu();
        $donHangTheoTrangThai = $this->modelThongKe->thongKeDonHangTheoTrangThai();
        $doanhThuHomNay = $this->modelThongKe->doanhThuTheoThoiGian('today');
        $doanhThuTuanNay = $this->modelThongKe->doanhThuTheoThoiGian('week');
        $doanhThuThangNay = $this->modelThongKe->doanhThuTheoThoiGian('month');
        $sanPhamBanChay = $this->modelThongKe->sanPhamBanChay();
        require_once './view/dashboard.php';
    }

}
