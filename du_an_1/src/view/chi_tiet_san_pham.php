<?php
include_once 'header.php';
include_once 'model/sanPham.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>Sản phẩm không tồn tại.</p>";
    exit();
}

$san_pham_id = $_GET['id'];
$sanPhamModel = new SanPham();
$sanPham = $sanPhamModel->getSanPhamById($san_pham_id);

if (!$sanPham) {
    echo "<p>Sản phẩm không tồn tại.</p>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_client'])) {
        echo "<p>Bạn cần đăng nhập để gửi bình luận.</p>";
        exit();
    } else {
        $tai_khoan_id = $_SESSION['user_client']['id'];
        $noi_dung = htmlspecialchars($_POST['noi_dung']);
        $sanPhamModel->addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung);
    }
}

$binhLuanList = $sanPhamModel->getBinhLuanBySanPhamId($san_pham_id);
$sanPhamLienQuan = $sanPhamLienQuan ?? [];



?>

<body>
    <div class="chi_tiet_san_pham_body">
        <div class="chi_tiet_san_pham_img">
            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>">
        </div>

        <div class="chi_tiet_san_pham_block">
            <h2><?= htmlspecialchars($sanPham['ten_san_pham']) ?></h2>

            <div class="chi_tiet_san_pham_gia">
                <div class="gia2">
                    <?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?> VND
                </div>
                <div class="gia1">
                    <?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?> VND
                </div>
            </div>
            <div class="chi_tiet_san_pham_so_luong_con" style="background-color: whitesmoke; padding: 5px; border-radius: 5px;">
                <p><strong>Số lượng còn lại:</strong> <?= $sanPham['so_luong'] ?> sản phẩm</p>
            </div>
            <div class="chi_tiet_san_pham_mo_ta">
                <p><strong>Mô tả sản phẩm:</strong></p>
                <p><?= nl2br(htmlspecialchars($sanPham['mo_ta'])) ?></p>

            </div>
            <!-- <div class="chi_tiet_san_pham_so_luong">
                <label for="quantity">Số lượng:</label>
                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?> ">
                <input type="number" id="quantity" name="so_luong" min="1" value="1">
            </div> -->

            <div class="chi_tiet_san_pham_button">
                <form action="<?= BASE_URL . '?act=them_gio_hang' ?>" method="POST">
                    <!-- Truyền san_pham_id qua hidden input -->
                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                    <label for="quantity">Số lượng:</label>
                    <input type="number" id="quantity" name="so_luong" min="1" value="1">
                    <button type="submit" class="button_1">Thêm vào giỏ hàng</button>
                </form>
            </div>

        </div>

        <!-- Chính sách khách hàng -->
        <div class="chi_tiet_san_pham_chinh_sach">
            <h2>Chính sách khách hàng</h2>
            <ul>
                <li><img src="./upload/box-solid.svg" style="height: 20px;  width: 50px;" alt=""> Cam kết 100% chính hãng</li>
                <li><img src="./upload/phone-solid.svg" style="height: 20px;  width: 20px;" alt=""> Hỗ trợ 24/7</li>
                <li><img src="./upload/shield-solid.svg" style="height: 20px;  width: 20px;" alt=""> Hoàn tiền 111% nếu hàng giả</li>
                <li><img src="./upload/thumbs-up-regular.svg" style="height: 20px;  width: 20px;" alt=""> Mở hộp kiểm tra nhận hàng</li>
                <li><img src="./upload/reply-solid.svg" style="height: 20px;  width: 20px;" alt=""> Đổi trả trong 7 ngày</li>
            </ul>
        </div>
    </div>
    </div>

    <!-- Mô tả sản phẩm -->
    <!-- bình luận  -->
    <div class="binh_luan">
        <?php if (isset($_SESSION['user_client'])): ?>
            <div class="binh_luan_form">
                <h3>Thêm bình luận</h3>
                <form method="POST">
                    <textarea name="noi_dung" placeholder="Nhập bình luận" required></textarea><br>
                    <button type="submit">Gửi</button>
                </form>
            </div>
        <?php else: ?>
            <p>Bạn cần <a href="dang_nhap.php">đăng nhập</a> để thêm bình luận.</p>
        <?php endif; ?>

        <div class="binh_luan_list">
            <h3>Bình luận</h3>
            <?php foreach ($binhLuanList as $binhLuan): ?>
                <div class="binh_luan_item">
                    <small><?= $binhLuan['ngay_dang'] ?></small>
                    <p><strong><?= htmlspecialchars($binhLuan['ten_tai_khoan']) ?>:</strong> <?= htmlspecialchars($binhLuan['noi_dung']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- Sản phẩm liên quan -->
    <div class="san_pham_lien_quan">
        <?php if (!empty($sanPhamLienQuan)): ?>
            <?php foreach ($sanPhamLienQuan as $sp): ?>
                <div class="block_lien_quan">
                    <img src="<?= BASE_URL . $sp['hinh_anh'] ?>" alt="<?= htmlspecialchars($sp['ten_san_pham']) ?>">
                    <div class="mo_ta_lien_quan">
                        <p><?= htmlspecialchars($sp['ten_san_pham']) ?></p>
                        <p class="gia2"><?= number_format($sp['gia_khuyen_mai'], 0, ',', '.') ?> VND</p>
                    </div>
                    <div class="button_lien_quan">
                        <button>
                            <a href="index.php?act=chi_tiet_san_pham&id=<?= $sp['id'] ?>">Xem chi tiết</a>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sản phẩm liên quan nào.</p>
        <?php endif; ?>
    </div>

</body>


<?php
include_once 'footer.php'
?>