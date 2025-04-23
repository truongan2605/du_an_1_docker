<?php
include 'header.php';

?>
<div class="container mt-3">
    <h3>Quản Lý Danh Mục</h3>
</div>
<section class="content">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= BASE_URL_AMIN . '?act=form-them-danh-muc' ?>">
                            <button class="btn btn-success">Thêm danh mục</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mô tả</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach ($listDanhMuc as $key => $danhMuc): ?>
                                    <tr>
                                        <th><?= $key + 1 ?></th>
                                        <td><?= $danhMuc['ten_danh_muc'] ?></td>
                                        <td><?= $danhMuc['mo_ta'] ?></td>
                                        <td>
                                            <a href="<?= BASE_URL_AMIN . '?act=form-sua-danh-muc&id_danh_muc=' . $danhMuc['id'] ?>">
                                                <button class="btn btn-warning">Sửa</button></a>
                                            <a href="<?= BASE_URL_AMIN . '?act=xoa-danh-muc&id_danh_muc=' . $danhMuc['id'] ?>" onclick="return confirm('Bạn có đồng ý xóa sản phẩm không')">
                                                <button class="btn btn-danger">Xóa</button></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>