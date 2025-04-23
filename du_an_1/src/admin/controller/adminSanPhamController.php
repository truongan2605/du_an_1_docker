<?php
class adminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new adminSanPham();
        $this->modelDanhMuc = new adminDanhMuc();
    }
    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './view/sanpham/list.php';
    }
    public function formAddSanPham()
    {
        //hien thi form nhap
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        require_once './view/sanpham/add.php';
        // xoa session sau khi load tran 
        deleteSessionError();
    }

    public function postAddSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ten = $_POST['ten_san_pham'] ?? '';
            $gia = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $anh = $_FILES['hinh_anh'] ?? null;

            //mang hinh anh

            $img_array = $_FILES['img_array'];


            $errors = [];
            if (empty($ten)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không để trống';
            }
            if (empty($gia)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Nhày nhập sản phẩm không để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Chọn danh mục sản phẩm';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Chọn trạng thái sản phẩm';
            }
            if ($anh['error'] !== 0) {
                $errors['hinh_anh'] = ' Phải chọn  ảnh sản phẩm';
            }
            $_SESSION['error'] = $errors;


            if (empty($errors)) {
            $file_thumb = uploadFile($anh, './upload/');

                 $san_pham_id = $this->modelSanPham->insertSanPham($ten,$danh_muc_id, $mo_ta, $gia,$gia_khuyen_mai, $so_luong,  $ngay_nhap, $trang_thai, $file_thumb);
                //xu lis them alum anh img_array
                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key]
                        ];
                        $link_hinh_anh = uploadFile($file, './upload/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }
                header('location: ' . BASE_URL_AMIN . '?act=san-pham');
                exit;
            } else {
                // dat chi thi cua sesion sau khi hien thi form 
                $_SESSION['flash'] = true;
                header('location: ' . BASE_URL_AMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }
    //
    public function formEditSanPham()
    {
        //hien thi form nhap
        //lay ra thong tin danh muc can sua
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanpham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if ($sanPham) {
            require_once './view/sanpham/edit.php';
            deleteSessionError();
        } else {
            header('location: ' . BASE_URL_AMIN . '?act=san-pham');
            exit();
        }
    }



    public function postEditSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //    lay ra du lieu cu cua san pham 
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            //truy van
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; //lay anh cu de phuc vu cho sua anh
            $ten = $_POST['ten_san_pham'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $gia = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $anh = $_FILES['hinh_anh'] ?? null;
            if ($gia_khuyen_mai === '') {
                $gia_khuyen_mai = null; // 
            }
            $errors = [];
            if (empty($ten)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không để trống';
            }
            if (empty($gia)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Nhày nhập sản phẩm không để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Chọn danh mục sản phẩm';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Chọn trạng thái sản phẩm';
            }
            // if ($anh['error'] !== 0) {
            //     $errors['hinh_anh'] = ' Phải chọn  ảnh sản phẩm';
            // }
            $_SESSION['error'] = $errors;

            //    logic sua anh 
            if (isset($anh) && $anh['error'] == UPLOAD_ERR_OK) {
                // uploads anh moi len
                $new_file = uploadFile($anh, './upload/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }


            if (empty($errors)) {
                $san_pham_id = $this->modelSanPham->updateSanPham($san_pham_id, $ten, $danh_muc_id, $mo_ta, $gia, $gia_khuyen_mai, $so_luong, $ngay_nhap, $trang_thai, $new_file);
                if ($san_pham_id) {
                    header('location: ' . BASE_URL_AMIN . '?act=san-pham');
                    exit;
                } else {
                    echo "Cập nhật không thành công.";
                }
            } else {
                var_dump($errors); // Kiểm tra lỗi
                $_SESSION['flash'] = true;
                header('location: ' . BASE_URL_AMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        }
    }


    public function postEditAnhSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            //lay ds anh hien tai
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
            //xu li anh duoc gui tu form
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'];

            //khai bao mag de luu anh theem anh moi thay the anh cu
            $uploads_file = [];
            //uploads anh moi
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $uploads_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }
            //lu anh moi vao db va xoa anh cu
            foreach ($uploads_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
                    //cap nhat anh cu
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);
                    //xoa anh cu
                    deleteFile($old_file);
                } else {
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }
            //xu ly xoa anh
            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                    //xoa anh
                    $this->modelSanPham->destroyAnhSanPham($anh_id);
                    //xoa file
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }
            header('location: ' . BASE_URL_AMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }


    public function deleteSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);


        if ($sanPham) {
            deleteFile($sanPham['hinh_anh']);
            $this->modelSanPham->destroySanPham($id);
        }
        if ($listAnhSanPham) {
            foreach ($listAnhSanPham as $key => $anhSP) {
                deleteFile($anhSP['link_hinh_anh']);
                $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
            }
        }

        header('location: ' . BASE_URL_AMIN . '?act=san-pham');
        exit();
    }
    // public function detaiSanPham()
    // {

    //     $id = $_GET['id_san_pham'];

    //     $sanPham = $this->modelSanPham->getDetailSanpham($id);

    //     $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);


    //     if ($sanPham) {
    //         require_once './view/sanpham/detailSanPham.php';
    //     } else {
    //         header('location: ' . BASE_URL_AMIN . '?act=san-pham');
    //         exit();
    //     }
    // }

}
