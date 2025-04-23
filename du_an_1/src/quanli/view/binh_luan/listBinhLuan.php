
<?php include 'header.php'; ?>
<div class="container mt-3">
    <h3>Quản Lý Bình Luận</h3>
</div>
<section class="content">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= BASE_URL_AMIN . '?act=form-them-danh-muc' ?>">
                            <button class="btn btn-success">Bình Luận</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                <th></th>
                        <th>ID</th>
                        <th>ID người dùng</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <?php
                    foreach ($listbinhluan as $binhluan) :?>
                        <tr>
                        <td><input type="checkbox" name="" id="" /></td>
                         <td> <?= $binhluan['id'] ?> </td>
                          <td> <?= $binhluan['tai_khoan_id'] ?> </td>

                           <td> <?= $binhluan['noi_dung'] ?> </td>
                           <td> <?= $binhluan['ngay_dang'] ?> </td>
                
                <td>
                
                <a href="<?= BASE_URL_AMIN . '?act=xoa_binh_luan&id_binh_luan=' . $binhluan['id'] ?>" onclick="return confirm('Bạn có đồng ý xóa sản phẩm không')">
    <button class="btn btn-danger">Xóa</button>
</a>
                </td>
            </tr>
           <?php endforeach ?>
                            </tbody>
                        </table>
                        <div>
                <input class="mr20" type="button" value="CHỌN TẤT CẢ" />
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ" />
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>
