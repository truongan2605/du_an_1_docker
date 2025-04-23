<?php include 'header.php'?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>QUẢN LÍ THONG TIN ĐƠN HÀNG</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sửa thông tin đơn hàng <?= $DonHang['ma_don_hang']; ?> </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_AMIN . '?act=sua-don-hang' ?>" method="post">
              <input type="text" value="<?= $DonHang['id'] ?>" name="don_hang_id" hidden readonly>
              <div class="card-body">
                <div class="form-group">
                  <label for="">Tên người nhận</label>
                  <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $DonHang['ten_nguoi_nhan'] ?>" readonly>
                  <?php if (isset($errors['ten_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $errors['ten_nguoi_nhan'] ?></p>
                  <?php  } ?>
                </div>

                <div class="form-group">
                  <label for="">Số điện thoại</label>
                  <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $DonHang['sdt_nguoi_nhan'] ?>"readonly>
                  <?php if (isset($errors['sdt_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $errors['sdt_nguoi_nhan'] ?></p>
                  <?php  } ?>
                </div>

                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" name="email_nguoi_nhan" value="<?= $DonHang['email_nguoi_nhan'] ?>" readonly>
                  <?php if (isset($errors['email_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $errors['email_nguoi_nhan'] ?></p>
                  <?php  } ?>
                </div>

                <div class="form-group">
                  <label for="">Địa chỉ</label>
                  <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= $DonHang['dia_chi_nguoi_nhan'] ?>" readonly>
                  <?php if (isset($errors['dia_chi_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $errors['dia_chi_nguoi_nhan'] ?></p>
                  <?php  } ?>
                </div>

                <div class="form-group">
                  <label for="">Ghi chú</label>
                  <textarea name="ghi_chu" id="" class="form-control" readonly><?= $DonHang['ghi_chu'] ?></textarea>
                </div>

                <hr>

                <div class="form-group">
                  <label for="trang_thai_id">Trạng thái đơn hàng</label>
                  <select id="trang_thai_id" name="trang_thai_id" class="form-control custom-select">
                    <?php foreach ($listTrangThaiDonHang as $trangthai) : ?>
                      <option <?php

                              if (
                                $DonHang['trang_thai_id'] > $trangthai['id']
                                || $DonHang['trang_thai_id'] == 9
                                || $DonHang['trang_thai_id'] == 10
                                || $DonHang['trang_thai_id'] == 11
                              ) {
                                echo 'disabled';
                              }

                              ?> <?= $trangthai['id'] == $DonHang['trang_thai_id'] ? 'selected' : '' ?> value="<?= $trangthai['id'] ?>"><?= $trangthai['ten_trang_thai'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>

<?php include 'footer.php'?>

</body>

</html>