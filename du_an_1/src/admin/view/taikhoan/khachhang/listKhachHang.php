<?php
include 'header.php';

?>
<div class="container mt-3">
    <h3>Quản Lý tài khoản khách hàng </h3>
</div>
<section class="content">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                       
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach ($listKhachHang as $key => $khachHang): ?>
                                    <tr>
                                        <th><?= $key + 1 ?></th>
                                        <td><?= $khachHang['ten'] ?></td>
                                        <td>
                                            <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" alt="" width="100px"
                                                onerror="this.onerror = null; this.src='https://th.bing.com/th/id/R.8e2c571ff125b3531705198a15d3103c?rik=gzhbzBpXBa%2bxMA&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fuser-png-icon-big-image-png-2240.png&ehk=VeWsrun%2fvDy5QDv2Z6Xm8XnIMXyeaz2fhR3AgxlvxAc%3d&risl=&pid=ImgRaw&r=0'">
                                        </td>
                                        <td><?= $khachHang['email'] ?></td>
                                        <td><?= $khachHang['so_dien_thoai'] ?></td>
                                      <div class="btn-group">
                                      <td>
                                            <a href="<?= BASE_URL_AMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                                                <button class="btn btn-primary">Chi tiết</button></a>

                                             <!-- <a href="<?= BASE_URL_AMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                                                 <button class="btn btn-warning">Sửa</button></a> -->



                                </div>
                                        
                                        
           
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