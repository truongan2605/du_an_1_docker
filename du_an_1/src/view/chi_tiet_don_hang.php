<?php include_once 'header.php'; ?>

<div class="container mt-5">
    <div class="card ">
        <div class="card-header bg-danger text-white">
            <h3 class="mb-0">Chi tiết đơn hàng</h3>
        </div>
        <div class="card-body">
            <?php if (!empty($donHang)): ?>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($donHang['ma_don_hang']) ?></p>
                        <p><strong>Ngày đặt:</strong> <?= htmlspecialchars($donHang['ngay_dat']) ?></p>
                        <p><strong>Trạng thái:</strong>
                            <span class="badge bg-success"><?= htmlspecialchars($donHang['ten_trang_thai']) ?></span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phương thức thanh toán:</strong> <?= htmlspecialchars($donHang['ten_phuong_thuc']) ?></p>
                        <p><strong>Tổng tiền:</strong>
                            <span class="text-danger"><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VND</span>
                        </p>
                    </div>
                </div>
            <?php endif; ?>

            <h4 class="text-center mb-4">Sản phẩm trong đơn hàng</h4>

            <?php if (!empty($sanPhamDonHang)): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-secondary">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên sản phẩm</th>
                                <th class="text-center">Đơn giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sanPhamDonHang as $index => $sanPham): ?>
                                <tr>
                                    <td class="text-center"><?= $index + 1 ?></td>
                                    <td><?= htmlspecialchars($sanPham['ten_san_pham']) ?></td>
                                    <td class="text-end"><?= number_format($sanPham['don_gia'], 0, ',', '.') ?> VND</td>
                                    <td class="text-center"><?= $sanPham['so_luong'] ?></td>
                                    <td class="text-end text-danger">
                                        <?= number_format($sanPham['thanh_tien'], 0, ',', '.') ?> VND
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-center text-muted">Không có sản phẩm nào trong đơn hàng này.</p>
            <?php endif; ?>
        </div>
        <div class="card-footer text-center">
    <a href="<?= BASE_URL ?>?act=don_hang" class="btn btn-danger">
        Quay lại danh sách đơn hàng
    </a>
    <?php if ($donHang['trang_thai_id'] == 3 || $donHang['trang_thai_id'] == 5): // Chỉ hiển thị nếu trạng thái là "Đang xử lý" hoặc "Chờ lấy hàng" ?>
        <form action="<?= BASE_URL ?>?act=danh_dau_giao_hang" method="POST" class="d-inline">
            <input type="hidden" name="don_hang_id" value="<?= $donHang['id'] ?>">
            <button type="submit" class="btn btn-success">Đánh dấu là đã giao hàng</button>
        </form>
        <form action="<?= BASE_URL ?>?act=huy_don_hang" method="POST" class="d-inline">
            <input type="hidden" name="don_hang_id" value="<?= $donHang['id'] ?>">
            <button type="submit" class="btn btn-warning">Hủy đơn hàng</button>
        </form>
    <?php elseif ($donHang['trang_thai_id'] == 1): ?>
        <span class="badge bg-success">Đơn hàng đã được giao</span>
    <?php elseif ($donHang['trang_thai_id'] == 2): ?>
        <span class="badge bg-warning">Đơn hàng đã bị hủy</span>
    <?php endif; ?>
</div>


    </div>
</div>

<?php include_once 'footer.php'; ?>