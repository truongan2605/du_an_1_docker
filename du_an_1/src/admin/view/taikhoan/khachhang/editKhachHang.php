<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<div class="container w-75 mt-3">
    <h3>Quản Lý tài khoản khách hàng</h3>
</div>
<section class="content">
    <div class="container-fluid w-75 mt-3">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa thông tin tài khoản khách hàng: <?= $khachHang['ten']; ?></h3>
                    </div>
                    <form action="<?= BASE_URL_AMIN . '?act=sua-khach-hang' ?>" method="POST">
                    <input type="hidden" name="khach_hang_id" value="<?= $khachHang['id'] ?>">
                    <div class="card-body ">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" class="form-control" name="name" value="<?= $khachHang['ten'] ?>" placeholder="Nhập họ tên">
                                <?php if (isset($_SESSION['error']['ten'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['name'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $khachHang['email'] ?>" placeholder="Nhập email">
                                <?php if (isset($_SESSION['error']['email'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="so_dien_thoai" value="<?= $khachHang['so_dien_thoai'] ?>">
                                <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" class="form-control" name="ngay_sinh" value="<?= $khachHang['ngay_sinh'] ?>">
                                <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Giới tính</label>
                               <select id="inputStatus" name="gioi_tinh" class="form-control custom-select">
                                <option <?= $khachHang['gioi_tinh'] == 1 ? 'selected': '' ?> value="1">Nam</option>
                                <option <?= $khachHang['gioi_tinh'] !== 1 ? 'selected': '' ?> value="2">Nữ</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="dia_chi" value="<?= $khachHang['dia_chi'] ?>" placeholder="Nhập địa chỉ">
                                <?php if (isset($_SESSION['error']['dia_chi'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
                                <?php } ?>
                            </div>

                            

                        
      
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php' ?>
</html>