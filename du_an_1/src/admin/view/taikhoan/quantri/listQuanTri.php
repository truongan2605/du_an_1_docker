<?php
include 'header.php';

?>
<div class="container mt-3">
    <h3>Quản Lý tài khoản quản trị viên </h3>
</div>
<section class="content">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= BASE_URL_AMIN . '?act=form-them-quan-tri' ?>">
                            <button class="btn btn-success">Thêm tài khoản</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach ($listQuanTri as $key => $quanTri): ?>
                                    <tr>
                                        <th><?= $key + 1 ?></th>
                                        <td><?= $quanTri['ten'] ?></td>
                                        <td><?= $quanTri['email'] ?></td>
                                        <td><?= $quanTri['so_dien_thoai'] ?></td>
                                      
                                        
                                        
                                        <td>
                                            <a href="<?= BASE_URL_AMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quanTri['id'] ?>">
                                                <button class="btn btn-warning">Sửa</button></a>

                            
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