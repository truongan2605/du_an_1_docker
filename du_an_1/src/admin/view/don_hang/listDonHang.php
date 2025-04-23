<?php include 'header.php'?>

<div class="container mt-3">
<h3>Quản Lí Danh Sách Đơn Hàng</h3>
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
                    <th>Mã Đơn Hàng</th>
                    <th>Tên Người Nhận</th>
                    <th>Số Điện Thoại</th>
                    <th>Ngày Đặt</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th> Thao tác </th>
                  </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <?php foreach ($listDonHang as $key => $DonHang) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $DonHang['ma_don_hang'] ?></td>
                      <td><?= $DonHang['ten_nguoi_nhan'] ?></td>
                      <td><?= $DonHang['sdt_nguoi_nhan'] ?></td>
                      <td><?= $DonHang['ngay_dat'] ?></td>
                      <td><?= $DonHang['tong_tien'] ?></td>
                      <td><?= $DonHang['ten_trang_thai'] ?></td>
                      <td>
                      <a href="<?= BASE_URL_AMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $DonHang['id']?>">
                        <button class="btn btn-primary"><i class="far fa-eye"></i>Xem chi tiết</button>
                        </a>
                        <a href="<?= BASE_URL_AMIN . '?act=form-sua-don-hang&id_don_hang=' . $DonHang['id']?>">
                        <button class="btn btn-warning"><i class="fas fa-wrench"></i>Sửa</button>
                        </a>
                       


                          
                      </td>
                    </tr>
                  <?php endforeach; ?>
                            </tbody>
                        </table>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</aside>
<?php include 'footer.php'?>
</body>
<!-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->
</html>