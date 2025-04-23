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
    <h3>Quản Lý Danh Mục</h3>
</div>
<section class="content">
    <div class="container-fluid w-75 mt-3">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa danh mục sản phẩm</h3>
                    </div>
                    <form action="<?= BASE_URL_AMIN . '?act=sua-danh-muc' ?>" method="POST">
                        <input type="text" name="id" value="<?= $danhMuc['id'] ?>" hidden>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control" name="ten_danh_muc"  placeholder="Tên danh mục">
                                <?php if (isset($errors['ten_danh_muc'])) { ?>
                                    <p class="text-danger"><?= $errors['ten_danh_muc'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="mo_ta" placeholder="Mô tả"><?= $danhMuc['mo_ta'] ?></textarea>
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