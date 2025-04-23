<?php include_once 'header.php'; ?>
<div class="container">
    <h3 class="text-center mt-4">Danh sách đơn hàng của bạn</h3>

    <!-- Hiển thị thông báo nếu có -->
    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <?php if (!empty($donHangList)): ?>
        <table class="table table-bordered table-hover mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Ngày Đặt</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donHangList as $donHang): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($donHang['ma_don_hang']) ?></strong></td>
                        <td><?= date("d-m-Y", strtotime($donHang['ngay_dat'])) ?></td>
                        <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VNĐ</td>
                        <td>
                            <span >
                                <?= htmlspecialchars($donHang['ten_trang_thai']) ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= BASE_URL ?>?act=chi_tiet_don_hang&id=<?= $donHang['id'] ?>" class="btn btn-info btn-sm">
                                Xem chi tiết
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert text-center">
            <p>Bạn chưa có đơn hàng nào.</p>
            <a href="<?= BASE_URL ?>" class="btn btn-primary">Tiếp tục mua sắm</a>
        </div>
    <?php endif; ?>
</div>
<?php include_once 'footer.php'; ?>
