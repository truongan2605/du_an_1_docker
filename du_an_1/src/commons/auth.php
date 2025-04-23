<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_admin'])) {
    $_SESSION['error'] = "Vui lòng đăng nhập để truy cập.";
    header('Location: ' . BASE_URL . '?act=login'); // Chuyển hướng đến trang đăng nhập
    exit();
}

// Kiểm tra quyền truy cập
$user = $_SESSION['user_client'];
if ($user['chuc_vu_id'] == 1 && strpos($_SERVER['REQUEST_URI'], 'admin') === false) {
    $_SESSION['error'] = "Bạn không có quyền truy cập vào trang quản lý.";
    header('Location: ' . BASE_URL_AMIN);
    exit();
}

if ($user['chuc_vu_id'] == 3 && strpos($_SERVER['REQUEST_URI'], 'quanli') === false) {
    $_SESSION['error'] = "Bạn không có quyền truy cập vào trang quản trị.";
    header('Location: ' . BASE_URL_QUANLI);
    exit();
}
?>
