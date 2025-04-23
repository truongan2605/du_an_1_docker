<?php include_once 'header.php'; ?>

<div class="container">
    <h3>Kết quả tìm kiếm cho từ khóa: "<?= htmlspecialchars($_GET['keyword']) ?>"</h3>

    <?php if (!empty($listSanPham)): ?>
        <div class="san_pham">
            <?php foreach ($listSanPham as $sanPham): ?>
                <div class="block_sp">
                    <div class="img_sp">
                        <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="">
                    </div>
                    <div class="mo_ta">
                        <div class="ten_san_pham">
                            <p><?= htmlspecialchars($sanPham['ten_san_pham']) ?></p>
                        </div>
                        <div class="gia2">
                            <p><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?> VND</p>
                        </div>
                        <div class="gia1">
                            <p><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?> VND</p>
                        </div>
                    </div>
                    <div class="button_sp">
                        <a href="index.php?act=chi_tiet_san_pham&id=<?= $sanPham['id'] ?>">Mua hàng</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Không tìm thấy sản phẩm nào phù hợp.</p>
    <?php endif; ?>
</div>

<?php include_once 'footer.php'; ?>
