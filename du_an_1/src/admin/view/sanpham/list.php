<?php
include 'header.php';

?>
<div class="container mt-3">
    <h3>Quản Lý Sản Phẩm</h3>
</div>
<section class="content">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= BASE_URL_AMIN . '?act=form-them-san-pham' ?>">
                            <button class="btn btn-success">Thêm sản phẩm</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mô tả</th>
                                    <th>Giá</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Trạng thái</th>
                                    <th>Danh mục</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach ($listSanPham as $key => $sanPham): ?>
                                    <tr>
                                        <th><?= $key + 1 ?></th>
                                        <td><?= $sanPham['ten_san_pham'] ?></td>
                                        <td><?= $sanPham['mo_ta'] ?></td>
                                        <td><?= $sanPham['gia_san_pham'] ?></td>
                                        <td>
                                            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" width="100px"
                                                onerror="this.onerror = null; this.src='https://product.hstatic.net/1000288298/product/dsc00077_771cff22357147ddb67832b9e9c24148_master.jpg'">
                                        </td>
                                        <td><?= $sanPham['so_luong'] ?></td>
                                        <td><?= $sanPham['trang_thai'] == 1 ? 'Còn bán':'Dừng bán' ?></td>
                                        <td>
                                            <?= $sanPham['ten_danh_muc'] ?>
                                        </td>
                                        <td>
                                            <a href="<?= BASE_URL_AMIN . '?act=form-sua-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                                <button class="btn btn-warning">Sửa</button></a>
                                            <!-- <a href="<?= BASE_URL_AMIN . '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>" onclick="return confirm('Bạn có đồng ý xóa sản phẩm không')">
                                                <button class="btn btn-danger">Xóa</button></a> -->
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