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
    <h3>Quản Lý tài khoản quản trị viên</h3>
</div>
<section class="content">
    <div class="container-fluid w-75 mt-3">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm tài khoản quản trị</h3>
                    </div>
                    <form action="<?= BASE_URL_QUANLI . '?act=them-quan-tri' ?>" method="POST">
                    <div class="card-body ">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" class="form-control" name="ten" placeholder="Nhập họ tên">
                                <?php if (isset($_SESSION['error']['ten'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['ten'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập email">
                                <?php if (isset($_SESSION['error']['email'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="mat_khau" placeholder="Nhập mật khẩu">
                                <?php if (isset($_SESSION['error']['mat_khau'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['mat_khau'] ?></p>
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

</html>