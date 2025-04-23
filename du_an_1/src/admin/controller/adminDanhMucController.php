<?php
class adminDanhMucController
{
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new adminDanhMuc();
    }
    public function danhSachDanhMuc()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './view/danhmuc/listDanhMuc.php';
    }
    public function formThemDanhMuc()
    {
        require_once './view/danhmuc/addDanhMuc.php';
    }
    public function postAddDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            if (empty($errors)) {
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header('Location:' . BASE_URL_AMIN. '?act=danh-muc');
                exit();
            } else {
                require_once './view/danhmuc/addDanhMuc.php';
            }
        }
    }
    public function formSuaDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            require_once './view/danhmuc/editDanhMuc.php';
        } else {
            header('Location:' . BASE_URL_AMIN . '?act=danh-muc');
            exit();
        }
    }
    public function postEditDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id  = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            if (empty($errors)) {
                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header('Location:' . BASE_URL_AMIN . '?act=danh-muc');
                exit();
            } else {
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './view/danhmuc/editDanhMuc.php';
            }
        }
    }
    public function deleteDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
        }
        header('Location:' . BASE_URL_AMIN . '?act=danh-muc');
        exit();
    }
}
