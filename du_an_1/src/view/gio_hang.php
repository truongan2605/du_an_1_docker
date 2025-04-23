<?php include_once 'header.php'; ?>

<body>
    <div class="gio_hang_body">
        <div class="gio_hang_thanh_trai">
            <h3 style="margin:20px">Giỏ hàng của bạn</h3>
            <a href="?act=don_hang" style="margin: 15px;">Lịch sử mua hàng</a>
            <hr>

            <?php if (!empty($_SESSION['error'])): ?>
                <div style="color: red;"><?= htmlspecialchars($_SESSION['error']);
                                            unset($_SESSION['error']); ?></div>
            <?php endif; ?>

            <?php if (!empty($_SESSION['success'])): ?>
                <div style="color: green;"><?= htmlspecialchars($_SESSION['success']);
                                            unset($_SESSION['success']); ?></div>
            <?php endif; ?>

            <div class="gio_hang_thanh_trai_body">
                <?php
                $tongTien = 0; // Khởi tạo mặc định
                if (!empty($gioHang)):
                ?>
                    <p style="margin-bottom: 20px;">Bạn đang có <?= count($gioHang) ?> sản phẩm trong giỏ hàng</p>

                    <?php
                    foreach ($gioHang as $item):
                        $tongTien += $item['gia'] * $item['so_luong'];
                    ?>
                        <div class="gio_hang_sp">
                            <div class="gio_hang_sp_1">
                                <img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="<?= htmlspecialchars($item['ten_san_pham']) ?>" style="height: 50px; width:80px;">
                                <p style="margin-left:30px"><?= htmlspecialchars($item['ten_san_pham']) ?> (x<?= $item['so_luong'] ?>)</p>
                            </div>

                            <div class="gio_hang_gia">
                                <p><?= number_format($item['gia'] * $item['so_luong'], 0, ',', '.') ?> VND</p>
                            </div>

                            <div class="gio_hang_button">
                                <form action="<?= BASE_URL ?>?act=xoa_gio_hang" method="POST">
                                    <input type="hidden" name="san_pham_id" value="<?= $item['san_pham_id'] ?>">
                                    <button type="submit">Xoá</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Giỏ hàng của bạn đang trống. Quay lại <a href="<?= BASE_URL ?>">trang chủ</a> để thêm sản phẩm.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="gio_hang_thanh_phai">
            <div>
                <form action="<?= BASE_URL ?>?act=thanh_toan" method="POST">
                    <h4 style="margin: 30px">Tổng tiền:
                        <div style="color: red;">
                            <?= number_format($tongTien, 0, ',', '.') ?> VND
                        </div>
                    </h4>
                    <!-- <button type="submit">Thanh toán</button> -->
                </form>
            </div>

            <div class="form_nguoi_dung">
            <form action="<?= BASE_URL ?>?act=thanh_toan" method="POST">
                <label>Họ tên người nhận:</label><br>
                <input type="text" name="ten_nguoi_nhan" required><br>

                <label>Email người nhận:</label><br>
                <input type="email" name="email_nguoi_nhan" required><br>

                <label>Số điện thoại:</label><br>
                <input type="text" name="sdt_nguoi_nhan" required><br>

                <label>Địa chỉ:</label><br>
                <textarea name="dia_chi_nguoi_nhan" required></textarea><br>

                <label>Phương thức thanh toán:</label><br>
                <select name="phuong_thuc_thanh_toan_id">
                    <option value="1">Thanh toán khi nhận hàng</option>
                    <option value="2">Chuyển khoản</option>
                </select><br>

                <label>Ghi chú:</label><br>
                <textarea name="ghi_chu"></textarea>

                <button type="submit">Thanh toán</button>
            </form>
        </div>

        </div>




    </div>
</body>

<?php include_once 'footer.php'; ?>