<?php


class HomeController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelTaiKhoan;
    public $modelThanhToan;


    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new clientTrangChu();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelThanhToan = new ThanhToan();
    }

    public function home()
    {
        // die();
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './view/home.php';
    }

    public function timKiem()
    {
        $keyword = $_GET['keyword'] ?? '';

        if (empty($keyword)) {
            $_SESSION['error'] = "Vui lòng nhập từ khóa để tìm kiếm.";
            header('Location: ' . BASE_URL);
            exit();
        }

        try {
            // Lấy danh sách sản phẩm theo từ khóa
            $listSanPham = $this->modelSanPham->timKiemSanPham($keyword);
            require_once './view/tim_kiem.php';
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL);
            exit();
        }
    }


    public function giohang()
    {
        if (!isset($_SESSION['user_client'])) {
            $_SESSION['error'] = "Vui lòng đăng nhập để xem giỏ hàng.";
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }

        $userId = $_SESSION['user_client']['id'];

        // Lấy giỏ hàng từ session
        $gioHang = $_SESSION['gio_hang'][$userId] ?? [];

        // Đảm bảo giỏ hàng không bị null
        if (!isset($_SESSION['gio_hang'][$userId])) {
            $_SESSION['gio_hang'][$userId] = [];
        }

        require_once './view/gio_hang.php';
    }


    public function xoaGioHang()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_SESSION['user_client'])) {
            $_SESSION['error'] = "Vui lòng đăng nhập để xóa sản phẩm.";
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }

        $userId = $_SESSION['user_client']['id'];
        $sanPhamId = $_POST['san_pham_id'] ?? null;

        if (!$sanPhamId || !isset($_SESSION['gio_hang'][$userId])) {
            $_SESSION['error'] = "Không thể xóa sản phẩm.";
            header('Location: ' . BASE_URL . '?act=gio_hang');
            exit();
        }

        try {
            $gioHang = &$_SESSION['gio_hang'][$userId];

            foreach ($gioHang as $index => $item) {
                if ($item['san_pham_id'] == $sanPhamId) {
                    // Trả lại số lượng sản phẩm vào kho
                    $this->modelSanPham->capNhatSoLuongSanPham($sanPhamId, $item['so_luong']); // Trả lại số lượng

                    // Xóa sản phẩm khỏi giỏ hàng
                    unset($gioHang[$index]);
                    $_SESSION['success'] = "Xóa sản phẩm khỏi giỏ hàng thành công và số lượng đã được trả lại kho.";
                    header('Location: ' . BASE_URL . '?act=gio_hang');
                    exit();
                }
            }

            $_SESSION['error'] = "Không tìm thấy sản phẩm trong giỏ hàng.";
            header('Location: ' . BASE_URL . '?act=gio_hang');
            exit();
        } catch (Exception $e) {
            $_SESSION['error'] = "Có lỗi xảy ra: " . $e->getMessage();
            header('Location: ' . BASE_URL . '?act=gio_hang');
            exit();
        }
    }
}






    public function chitietsanpham()
    {
        // Lấy ID sản phẩm từ URL
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            echo "Sản phẩm không tồn tại.";
            return;
        }

        // Lấy thông tin sản phẩm hiện tại
        $sanPham = $this->modelSanPham->getSanPhamById($id);

        if (!$sanPham) {
            echo "Không tìm thấy thông tin sản phẩm.";
            return;
        }

        // Lấy sản phẩm liên quan từ Model clientTrangChu
        $idDanhMuc = $sanPham['danh_muc_id'];
        $clientModel = new clientTrangChu();
        $sanPhamLienQuan = $clientModel->getSanPhamByDanhMuc($idDanhMuc);

        // Loại bỏ sản phẩm hiện tại ra khỏi danh sách sản phẩm liên quan
        $sanPhamLienQuan = array_filter($sanPhamLienQuan, function ($sp) use ($id) {
            return $sp['id'] != $id;
        });

        // Truyền dữ liệu sang View
        require_once './view/chi_tiet_san_pham.php';
    }



    public function dangki()
    {
        require_once './view/dang_ki.php';
        deleteSessionError();
    }

    public function dangnhap()
    {
        require_once './view/dang_nhap.php';
    }

    public function danhmuc()
    {
        $danhMucList = $this->modelDanhMuc->getAllDanhMuc();
        require_once './view/danh_muc.php';
    }


    public function postRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $ten = $_POST['ten'] ?? '';
            $gender = $_POST['gender'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Khởi tạo mảng lỗi
            $errors = [];

            // Kiểm tra các điều kiện
            if (empty($ten)) {
                $errors['ten'] = 'Tên không được để trống';
            }
            if (empty($gender)) {
                $errors['gender'] = 'Vui lòng chọn giới tính';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Vui lòng nhập ngày sinh';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            } elseif ($this->modelTaiKhoan->checkEmailExists($email)) {
                $errors['email'] = 'Email này đã được đăng ký';
            }
            if (empty($password)) {
                $errors['password'] = 'Password không được để trống';
            } elseif (strlen($password) < 6) {
                $errors['password'] = 'Password phải có ít nhất 6 ký tự';
            }

            // Lưu lỗi vào session nếu có
            $_SESSION['error'] = $errors;

            // Nếu không có lỗi
            if (empty($errors)) {
                // Gọi model để lưu dữ liệu
                $isRegister = $this->modelTaiKhoan->Register($ten, $gender, $ngay_sinh, $email, $password);
                if ($isRegister) {
                    // Đăng ký thành công, xóa lỗi trước đó
                    unset($_SESSION['error']);
                    $_SESSION['success'] = "Đăng ký thành công. Vui lòng đăng nhập.";
                    header('Location: ' . BASE_URL . '?act=login');
                    exit();
                }
            } else {
                // Có lỗi, quay lại form đăng ký
                header('Location: ' . BASE_URL . '?act=dang_ki');
                exit();
            }
        }
    }


    public function formLogin()
    {
        require_once './view/dang_nhap.php';

        deleteSessionError();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            unset($_SESSION['error']); // Xóa lỗi cũ trước khi xử lý đăng nhập
            // Lấy email và password từ form
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Xử lý kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if (is_array($user)) {
                // Nếu đăng nhập thành công, lưu thông tin vào session
                // $_SESSION['user_client'] = $user;

                if ($user['chuc_vu_id'] == 1) {
                    $_SESSION['user_admin'] = $user;
                    // var_dump($_SESSION['user_admin']);die;
                    // header('location:' . BASE_URL_AMIN);
                } elseif ($user['chuc_vu_id'] == 3) {
                    $_SESSION['user_quanli'] = $user;

                    // header('location:' . BASE_URL_QUANLI);
                } else {
                    $_SESSION['user_client'] = $user;

                    header('location: ' . BASE_URL);
                    exit();
                }
            } else {
                // Nếu đăng nhập thất bại, lưu lỗi vào session
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;header('Location: ' . BASE_URL . '?act=login');
                exit();
            }
        }
    }


    public function Logout()
    {
        // Hủy session người dùng
        unset($_SESSION['user_client']);
        unset($_SESSION['user_admin']);
        unset($_SESSION['user_quanli']);

        // Chuyển hướng về trang chủ
        header('Location: ' . BASE_URL);
        exit();
    }

    // File: homeController.php

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_SESSION['user_client'])) {
                $_SESSION['error'] = "Vui lòng đăng nhập trước khi thêm vào giỏ hàng.";
                header('Location: ' . BASE_URL . '?act=login');
                exit();
            }

            $userId = $_SESSION['user_client']['id'];
            $sanPhamId = $_POST['san_pham_id'] ?? null;
            $soLuong = $_POST['so_luong'] ?? 1;

            // Kiểm tra dữ liệu đầu vào
            if (!$sanPhamId || !is_numeric($sanPhamId) || $soLuong < 1) {
                $_SESSION['error'] = "Số lượng phải là số dương.";
                header('Location: ' . BASE_URL . '?act=chi_tiet_san_pham&id=' . $sanPhamId);
                exit();
            }

            try {
               
                $sanPham = $this->modelSanPham->getSanPhamById($sanPhamId);
                if (!$sanPham) {
                    $_SESSION['error'] = "Sản phẩm không tồn tại.";
                    header('Location: ' . BASE_URL . '?act=chi_tiet_san_pham&id=' . $sanPhamId);
                    exit();
                }

                $soLuongTonKho = $this->modelSanPham->getSoLuongSanPham($sanPhamId);

                // Kiểm tra số lượng còn đủ không
                if ($soLuong > $soLuongTonKho) {
                    $_SESSION['error'] = "Số lượng sản phẩm trong kho không đủ. Chỉ còn {$soLuongTonKho} sản phẩm.";
                    header('Location: ' . BASE_URL . '?act=chi_tiet_san_pham&id=' . $sanPhamId);
                    exit();
                }

                // Cập nhật số lượng sản phẩm
                $this->modelSanPham->capNhatSoLuongSanPham($sanPhamId, -$soLuong);


                // Khởi tạo giỏ hàng nếu chưa có
                if (!isset($_SESSION['gio_hang'][$userId])) {
                    $_SESSION['gio_hang'][$userId] = [];
                }

                $gioHang = &$_SESSION['gio_hang'][$userId];
                $found = false;
                foreach ($gioHang as &$item) {
                    if ($item['san_pham_id'] == $sanPhamId) {
                        $item['so_luong'] += $soLuong;
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    $gioHang[] = [
                        'san_pham_id' => $sanPhamId,
                        'ten_san_pham' => $sanPham['ten_san_pham'],
                        'gia' => $sanPham['gia_khuyen_mai'],
                        'so_luong' => $soLuong,
                        'hinh_anh' => $sanPham['hinh_anh']
                    ];
                }

                $_SESSION['success'] = "Thêm sản phẩm vào giỏ hàng thành công.";
                header('Location: ' . BASE_URL . '?act=gio_hang');
                exit();
            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: ' . BASE_URL . '?act=chi_tiet_san_pham&id=' . $sanPhamId);
                exit();
            }
        }
    }




    public function thanhtoan()
    {
        if (!isset($_SESSION['user_client'])) {
            $_SESSION['error'] = "Vui lòng đăng nhập để thực hiện thanh toán.";
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }

        $userId = $_SESSION['user_client']['id'];
        $gioHang = $_SESSION['gio_hang'][$userId] ?? [];

        if (empty($gioHang)) {
            $_SESSION['error'] = "Giỏ hàng của bạn đang trống.";
            header('Location: ' . BASE_URL . '?act=gio_hang');
            exit();
        }

        // Tổng tiền
        $tongTien = array_reduce($gioHang, function ($sum, $item) {
            return $sum + ($item['gia'] * $item['so_luong']);
        }, 0);

        // Lấy thông tin từ POST (người nhận, địa chỉ, thanh toán)
        $tenNguoiNhan = $_POST['ten_nguoi_nhan'] ?? '';
        $emailNguoiNhan = $_POST['email_nguoi_nhan'] ?? '';
        $sdtNguoiNhan = $_POST['sdt_nguoi_nhan'] ?? '';
        $diaChiNguoiNhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
        $phuongThucThanhToanId = $_POST['phuong_thuc_thanh_toan_id'] ?? 1;
        $ghiChu = $_POST['ghi_chu'] ?? '';

        // Kiểm tra các trường bắt buộc
        if (empty($tenNguoiNhan) || empty($emailNguoiNhan) || empty($sdtNguoiNhan) || empty($diaChiNguoiNhan)) {
            $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin người nhận.";
            header('Location: ' . BASE_URL . '?act=gio_hang');
            exit();
        }

        try {
            // Dữ liệu để tạo đơn hàng
            $data = [
                'user_id' => $userId,
                'ten_nguoi_nhan' => $tenNguoiNhan,
                'email_nguoi_nhan' => $emailNguoiNhan,
                'sdt_nguoi_nhan' => $sdtNguoiNhan,
                'dia_chi_nguoi_nhan' => $diaChiNguoiNhan,
                'tong_tien' => $tongTien,
                'ghi_chu' => $ghiChu,
                'phuong_thuc_thanh_toan_id' => $phuongThucThanhToanId,
                'tai_khoan_id' => $userId
            ];

            // Tạo đơn hàng
            $donHangId = $this->modelThanhToan->taoDonHang($data);

            // Lưu chi tiết đơn hàng
            foreach ($gioHang as $item) {
                $this->modelThanhToan->taoChiTietDonHang($donHangId, $item);
            }

            // Xóa giỏ hàng
            unset($_SESSION['gio_hang'][$userId]);

            $_SESSION['success'] = "Thanh toán thành công. Đơn hàng của bạn đang được xử lý.";
            header('Location: ' . BASE_URL . '?act=don_hang');
            exit();
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=gio_hang');
            exit();
        }
    }




    public function donhang()
    {
        if (!isset($_SESSION['user_client'])) {
            $_SESSION['error'] = "Vui lòng đăng nhập để xem đơn hàng.";
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }

        $userId = $_SESSION['user_client']['id'];

        try {
            $donHangList = $this->modelThanhToan->layDonHangTuKhachHang($userId);
            require_once './view/don_hang.php';
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL);
            exit();
        }
    }

    public function chiTietDonHang()
    {
        if (!isset($_SESSION['user_client'])) {
            $_SESSION['error'] = "Vui lòng đăng nhập để xem chi tiết đơn hàng.";
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }

        $donHangId = $_GET['id'] ?? null;

        if (!$donHangId || !is_numeric($donHangId)) {
            $_SESSION['error'] = "Đơn hàng không hợp lệ.";
            header('Location: ' . BASE_URL . '?act=don_hang');
            exit();
        }

        try {
            $donHang = $this->modelThanhToan->layChiTietDonHang($donHangId);
            $sanPhamDonHang = $this->modelThanhToan->laySanPhamDonHang($donHangId);
            require_once './view/chi_tiet_don_hang.php';
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=don_hang');
            exit();
        }
    }

    public function danhDauGiaoHang()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $donHangId = $_POST['don_hang_id'] ?? null;

            if (!$donHangId || !is_numeric($donHangId)) {
                $_SESSION['error'] = "ID đơn hàng không hợp lệ.";
                header('Location: ' . BASE_URL . '?act=chi_tiet_don_hang&id=' . $donHangId);
                exit();
            }

            try {
                // Lấy trạng thái hiện tại của đơn hàng
                $donHang = $this->modelThanhToan->layChiTietDonHang($donHangId);

                if ($donHang['trang_thai_id'] == 2) { // Trạng thái "Đã hủy"
                    $_SESSION['error'] = "Không thể đánh dấu 'Đã giao hàng' cho đơn hàng đã bị hủy.";
                    header('Location: ' . BASE_URL . '?act=chi_tiet_don_hang&id=' . $donHangId);
                    exit();
                }

                if ($donHang['trang_thai_id'] == 1) { // Trạng thái "Đã giao"
                    $_SESSION['error'] = "Đơn hàng đã được giao trước đó.";
                    header('Location: ' . BASE_URL . '?act=chi_tiet_don_hang&id=' . $donHangId);
                    exit();
                }

                // Cập nhật trạng thái đơn hàng thành "Đã giao"
                $this->modelThanhToan->capNhatTrangThaiDonHang($donHangId, 1); // 1 là ID trạng thái "Đã giao"
                $_SESSION['success'] = "Đơn hàng đã được đánh dấu là 'Đã giao hàng'.";
                header('Location: ' . BASE_URL . '?act=chi_tiet_don_hang&id=' . $donHangId);
                exit();
            } catch (Exception $e) {
                $_SESSION['error'] = "Có lỗi xảy ra: " . $e->getMessage();
                header('Location: ' . BASE_URL . '?act=chi_tiet_don_hang&id=' . $donHangId);
                exit();
            }
        }
    }


    public function huyDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $donHangId = $_POST['don_hang_id'] ?? null;

            if (!$donHangId || !is_numeric($donHangId)) {
                $_SESSION['error'] = "ID đơn hàng không hợp lệ.";
                header('Location: ' . BASE_URL . '?act=chi_tiet_don_hang&id=' . $donHangId);
                exit();
            }

            try {
                // Lấy trạng thái hiện tại của đơn hàng
                $donHang = $this->modelThanhToan->layChiTietDonHang($donHangId);

                if ($donHang['trang_thai_id'] == 1) { // Trạng thái "Đã giao"
                    $_SESSION['error'] = "Không thể hủy đơn hàng đã được giao.";
                    header('Location: ' . BASE_URL . '?act=chi_tiet_don_hang&id=' . $donHangId);
                    exit();
                }

                if ($donHang['trang_thai_id'] == 2) { // Trạng thái "Đã hủy"
                    $_SESSION['error'] = "Đơn hàng đã bị hủy trước đó.";
                    header('Location: ' . BASE_URL . '?act=chi_tiet_don_hang&id=' . $donHangId);
                    exit();
                }

                // Cập nhật trạng thái đơn hàng thành "Đã hủy"
                $this->modelThanhToan->capNhatTrangThaiDonHang($donHangId, 2); // 2 là ID trạng thái "Đã hủy"
                $_SESSION['success'] = "Đơn hàng đã được hủy thành công.";
                header('Location: ' . BASE_URL . '?act=chi_tiet_don_hang&id=' . $donHangId);
                exit();
            } catch (Exception $e) {
                $_SESSION['error'] = "Có lỗi xảy ra: " . $e->getMessage();
                header('Location: ' . BASE_URL . '?act=chi_tiet_don_hang&id=' . $donHangId);
                exit();
            }
        }
    }
};




?>