<?php
include_once 'header.php'; 

$client = new clientTrangChu(); 


if (isset($_GET['id_danh_muc'])) {
    $idDanhMuc = $_GET['id_danh_muc']; 
    $sanPhamList = $client->getSanPhamByDanhMuc($idDanhMuc); 
} else {
    echo "Không tìm thấy danh mục."; 
    exit;
}
?>

<body>
    <div class="danh_muc_body">
        <h1>Sản phẩm theo danh mục</h1>

        <div class="san_pham">
            <form action="">
                <?php if (!empty($sanPhamList)): ?>
                    <?php foreach ($sanPhamList as $sanPham): ?>
                        <div class="block_sp">
                            <div class="img_sp">
                                <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="<?= $sanPham['ten_san_pham'] ?>">
                            </div>
                            <div class="mo_ta">
                                <p><?= $sanPham['ten_san_pham'] ?></p>
                                <p class="gia2"><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?> VND</p>
                                <p class="gia1"><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?> VND</p>
                            </div>
                            <div class="button_sp">
                                <button>
                                    <a href="index.php?act=chi_tiet_san_pham&id=<?= $sanPham['id'] ?>">Mua hàng</a>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có sản phẩm nào trong danh mục này.</p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>

<?php include_once 'footer.php'; ?>
