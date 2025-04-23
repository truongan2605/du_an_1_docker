<!-- header -->
<?php include 'header.php'?>

<!-- Content Wrapper. Contains page content -->
<div class="container mt-3">

<h3>QUẢN LÍ DANH SÁCH ĐƠN HÀNG - ĐƠN HÀNG: <?= $donHang['ma_don_hang'] ?></h3>
</div>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

       
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->

      <section class="content">
        <div class="container mt-3">
          <div class="row">
            <div class="col-12">
              <?php
              if ($donHang['trang_thai_id'] == 1) {
                $coloAlerst = 'primary';
              } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9) {
                $coloAlerst = 'warning';
              } elseif ($donHang['trang_thai_id'] == 10) {
                $coloAlerst = 'success';
              } else {
                $coloAlerst = 'danger';
              }
              ?>
              <div class="alert alert-<?= $coloAlerst ?>" role="alert">
                Đơn hàng: <?= $donHang['ten_trang_thai'] ?>
              </div>

              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-cat"></i> TECHSTORE
                      <small class="float-right">Ngày đặt: <?= formatDate($donHang['ngay_dat']) ?></small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    Thông tin người đặt
                    <address>
                      <strong><?= $donHang['ten'] ?></strong><br>
                      Email: <?= $donHang['email'] ?><br>
                      Số điện thoại: <?= $donHang['so_dien_thoai'] ?><br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    Người nhận
                    <address>
                      <strong><?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                      Email: <?= $donHang['email_nguoi_nhan'] ?><br>
                      Số điện thoại: <?= $donHang['sdt_nguoi_nhan'] ?><br>
                      Địa chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <address>
                      <strong>Mã đơn hàng <?= $donHang['ma_don_hang'] ?></strong><br>
                      Tổng tiền: <?= $donHang['tong_tien'] ?><br>
                      Thanh toán: <?= $donHang['ten_phuong_thuc'] ?><br>
                    </address>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Tên sản phẩm</th>
                          <th>Đơn giá</th>
                          <th>Số lượng</th>
                          <th>Thành tiền</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        <?php $tong_tien = 0; ?>
                        <?php foreach ($sanPhamDonHang as $key => $sanpham): ?>
                        <tr>
                          <td><?= $sanpham['ten_san_pham'] ?></td>
                          <td><?= $sanpham['don_gia'] ?></td>
                          <td><?= $sanpham['so_luong'] ?></td>
                          <td><?= $sanpham['thanh_tien'] ?></td>
                        </tr>
                        <?php $tong_tien += $sanpham['thanh_tien']; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-6">
                    <p class="lead">Ngày đặt hàng: <?= $donHang['ngay_dat'] ?></p>
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th style="width:50%">Thành tiền:</th>
                          <td><?= $tong_tien ?></td>
                        </tr>
                        <tr>
                          <th>Vận chuyển:</th>
                          <td>20000</td>
                        </tr>
                        <tr>
                          <th>Tổng tiền:</th>
                          <td><?= $tong_tien + 20000 ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- footer -->
<?php include 'footer.php'?>
<!-- endfooter -->

</body>

</html>
