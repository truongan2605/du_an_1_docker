
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

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
        <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" alt="" style="width: 50%"
                                                onerror="this.onerror = null; this.src='https://th.bing.com/th/id/R.8e2c571ff125b3531705198a15d3103c?rik=gzhbzBpXBa%2bxMA&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fuser-png-icon-big-image-png-2240.png&ehk=VeWsrun%2fvDy5QDv2Z6Xm8XnIMXyeaz2fhR3AgxlvxAc%3d&risl=&pid=ImgRaw&r=0'">
                                        </div>
        <div class="col-6">
          <div class="container">

            <table class="table table-borderless">
              <tbody style="font-size: large;">
                <tr>
                  <th>Họ tên: </th>
                  <td><?= $khachHang['ten'] ?? '' ?></td>
                </tr>
                <tr>
                  <th>Ngày sinh: </th>
                  <td><?= $khachHang['ngay_sinh'] ?? '' ?></td>
                </tr>
                <tr>
                  <th>Email: </th>
                  <td><?= $khachHang['email'] ?? '' ?></td>
                </tr>
                <tr>
                  <th>Số điện thoại: </th>
                  <td><?= $khachHang['so_dien_thoai'] ?? '' ?></td>
                </tr>
                <tr>
                  <th>Giới tính: </th>
                  <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ'; ?></td>
                </tr>
                <tr>
                  <th>Địa chỉ: </th>
                  <td><?= $khachHang['dia_chi'] ?? '' ?></td>
                </tr>
               
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-12">
          <hr>
          <h2>Thông tin mua hàng</h2>
          <div class="">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã đơn hàng</th>
                  <th>Tên người nhận</th>
                  <th>Số điện thoại</th>
                  <th>Ngày đặt</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listDonHang as $key => $donHang) : ?>
                  <tr>

                    <td><?= $key + 1 ?></td>
                    <td><?= $donHang['ma_don_hang'] ?></td>
                    <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                    <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                    <td><?= $donHang['ngay_dat'] ?></td>
                    <td><?= $donHang['tong_tien'] ?></td>
                    <td><?= $donHang['ten_trang_thai'] ?></td>
                    <td>
                      <div class="btn-group">

                        <a href="<?= BASE_URL_AMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                          <button class="btn btn-primary">Chi tiết</button>
                        </a>
                        
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>

            </table>
          </div>
        </div>
        <!-- <div class="col-12">
          <hr>
          <h2>Lịch sử bình luận</h2>
          <div class="">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên sản phẩm</th>
                  <th>Nội dung</th>
                  <th>Ngày bình luận</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                
                <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                  <tr>

                    <td><?= $key + 1 ?></td>
                    <td><a target="_blank" href="<?= BASE_URL_AMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']; ?>"><?= $binhLuan['ten_san_pham'] ?></a></td>
                    <td><?= $binhLuan['noi_dung'] ?></td>
                    <td><?= $binhLuan['ngay_dang'] ?></td>
                    <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                    <td>
                      <div class="btn-group">
                      <form action="<?= BASE_URL_AMIN . '?act=update-trang-thai-binh-luan&id_binh_luan=' ?>" method="post">
                          <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                          <input type="hidden" name="name_view" value="detail_khach">
                          
                          <button onclick="return confirm('Bạn có muốn ẩn bình luận này ko?')" class="btn btn-warning">
                            <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ ẩn'?>
                          </button>

                        </form>

                        
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>

            </table>
          </div>
        </div> -->
                </div>
                </div>
  </section>
<?php include 'footer.php' ?>
<!-- end footer -->

</body>

</html>