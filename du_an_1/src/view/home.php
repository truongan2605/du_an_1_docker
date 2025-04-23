<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        .boxcenter {
            width: 60%;
            margin: 0 auto;
        }


        .body {
            /* background-color: rgb(233, 233, 233); */
            background-color: white;
            height: 100%;
        }

        * {
            margin: 0;
            padding: 0;

        }

        .thanh1 {
            justify-content: center;
            display: flex;
        }

        header {
            /* background-color: rgb(233, 233, 233); */
            background-color: white;
            display: flex;
            /* justify-content: center; */
            /* padding: 20px; */
            width: 100%;
            margin: auto;
            height: 150px;
        }

        .logo {
            height: 100px;
            width: 100px;
            padding-top: 10px;
            margin-left: 70px;
        }


        .timkiem {
            display: flex;
            align-items: center;
            margin: 50px 100px;
        }

        .timkiem input {
            width: 600px;
            height: 40px;
            margin-right: 10px;
            border-radius: 5px;

        }

        .timkiem button {
            width: 50px;
            height: 40px;
            background-color: yellow;
            border-radius: 5px;
        }



        .button a {
            text-decoration: none;
            color: black;

        }

        .button a:hover {
            color: #0056b3;

        }

        .button {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            /* Khoảng cách giữa các phần tử */
        }

        .button span {
            white-space: nowrap;
            /* Không xuống dòng */
            overflow: hidden;
            /* Ẩn phần bị tràn */
            text-overflow: ellipsis;
            /* Thêm dấu ... khi tràn */
            max-width: 150px;
            /* Đặt giới hạn chiều rộng */
        }

        .thanh2 {
            /* background-color: white; */
            background-color: rgb(233, 233, 233);

            display: flex;
            /* space between: Dùng để tạo khoảng cách bằng nhau giữa các phần tử */
            /* justify-content: space-between; */
            align-items: center;
            justify-content: center;
        }

        .thanh2 ul {
            display: flex;
            list-style: none;
            margin-right: 600px;
        }

        .thanh2 ul p {
            margin: 20px;
        }

        .thanh2 li a {
            text-decoration: none;
            color: black;
        }

        main {
            display: flex;
            margin-bottom: 50px;
        }

        aside {
            margin-left: 60px;
            /* background-color: white; */
            background-color: rgb(233, 233, 233);
            width: 15%;
            height: 100%;
            border-radius: 5px;
        }

        aside ul {
            list-style: none;

        }

        aside li {
            /* margin-left: 20px; */
            padding: 20px;

        }

        aside a {
            text-decoration: none;
            color: black;
        }

        aside li:hover {
            background-color: red;
        }

        article img {
            height: 500px;
            width: 100%;
            padding: 10px;

        }



     

        .san_pham,
.san_pham_noi_bat {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 sản phẩm mỗi dòng */
    gap: 20px; /* Khoảng cách giữa các sản phẩm */
    padding: 20px;
    margin: 0 auto;
    width: 90%;
}




        .san_pham form {
            display: flex;
        }



        .san_pham_noi_bat form {
            display: flex;

        }

        .block_sp {
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            overflow: hidden;
            /* Đảm bảo hình ảnh không bị tràn */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Hiệu ứng nổi */
            transition: transform 0.2s, box-shadow 0.2s;
            /* Hiệu ứng hover */
            text-align: center;
            padding: 15px;
        }

        .block_sp:hover {
            transform: translateY(-5px);
            /* Di chuyển nhẹ lên trên khi hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            /* Hiệu ứng bóng */
        }



        .img_sp img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #eee;
            /* Viền ngăn cách hình ảnh */
            margin-bottom: 10px;
        }

        .mo_ta {
            padding: 10px;
        }


        .ten_san_pham {
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
            white-space: nowrap;
            /* Không xuống dòng */
            overflow: hidden;
            /* Ẩn nội dung tràn */
            text-overflow: ellipsis;
            /* Dấu "..." khi quá dài */
        }

        .img_sp {
            margin-bottom: 55px;
        }

        .gia1 {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
        }

        .gia2 {
            font-size: 18px;
            color: red;
            font-weight: bold;
        }


        .button_sp {
            /* width: 100%;
            background-color: black;
            height: 50px; */

            margin-top: 10px;
            padding: 10px;


        }

        .button_sp button {
            margin-top: 20px;
            border: hidden;
            background-color: black;
            border-radius: 5px;

        }

        .button_sp a {
            display: inline-block;
            padding: 10px 20px;
            background-color: red;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button_sp a:hover {
            background-color: orange;
        }


        /* ------------------------------------------------- -----------------------------------------------------------------------*/

        nav {
            /* float: left; */
            /* width: 30%; */
            width: 100%;
            height: 300px;
            background: white;
            padding: 20px;
        }

        .chu {
            float: left;
            padding: 40px;
            padding-left: 100px;
            padding-right: 100px;
            width: 25%;
            background-color: white;
            height: 300px;
        }

        section::after {
            content: "";
            display: table;
            clear: both;
        }

        footer {
            background-color: #b80e0e;
            padding: 10px;
            text-align: center;
            color: white;
            height: 150px;
            display: flex;
            margin-top: 100px;
        }

        .text {
            float: left;
            width: 50%;
            margin-left: 50px;

        }

        .text1 {
            width: 50%;
            text-align: right;

        }

        .text1 input {
            width: 700px;
            height: 70px;
            margin: 40px;
            border-radius: 5px;
        }

        @media (max-width: 600px) {

            nav,
            article {
                width: 100%;
                height: auto;
            }
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* ------------------------------------------------------------------------------------------------------------------- */
        .gio_hang_body {
            display: flex;
            width: 80%;
            height: 100%;
            margin-left: 120px;
            margin-top: 50px;
        }

        .gio_hang_thanh_trai {
            background-color: rgb(233, 233, 233);
            width: 65%;
            margin-right: 20px;
            height: 150%;
        }

        .gio_hang_thanh_phai {
            background-color: rgb(233, 233, 233);
            width: 25%;
            height: 190%;

        }

        .gio_hang_thanh_trai_body {
            margin: 20px;
        }

        .gio_hang_sp {
            /* display: flex; */
            border-radius: 5px;
            border: 1px solid black;
            padding: 20px;
            width: 90%;
            margin-bottom: 50px;
        }

        .gio_hang_sp_1 {
            display: flex;
            margin-bottom: 10px;
        }

        .gio_hang_button button {
            background-color: red;
            border: hidden;
            height: 30px;
            width: 60px;
            border-radius: 5px;
            color: white;
        }

        .gio_hang_thanh_phai button {
            background-color: red;
            border: hidden;
            height: 50px;
            width: 100%;
            border-radius: 5px;
            color: white;

        }



        /* ---------------------------------------------------------------------------------------- */
        .chi_tiet_san_pham_body {
            width: 90%;
            height: 110%;
            margin-left: 40px;
            display: flex;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .chi_tiet_san_pham_img {
            width: 35%;
        }

        .chi_tiet_san_pham_img img {
            height: 300px;
            width: 400px;
        }

        .chi_tiet_san_pham_block {
            width: 65%;
            height: 120%;
            /* height: 500px; */
            /* background-color: rgb(233, 233, 233); */
            background-color: white;
        }

        .chi_tiet_san_pham_gia {
            margin-bottom: 50px;
            background: #fafafa;
            padding: 15px;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }

        .chi_tiet_san_pham_block_2 {
            display: flex;
        }

        .chi_tiet_san_pham_block_3 {
            width: 60%;
            margin: 20px;


        }

        .chi_tiet_san_pham_chinh_sach {
            border: 2px solid rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 8px;
            background-color: white;
        }

        .chi_tiet_san_pham_button {
            display: flex;
        }

        .chi_tiet_san_pham_button_1 button {
            border: 2px solid red;
            /* border: hidden; */
            background-color: white;
            color: red;
            font-size: 20px;
            padding: 10px;
            margin-right: 20px;
        }

        .chi_tiet_san_pham_button_2 button {
            border: 2px solid red;
            /* border: hidden; */
            background-color: red;
            color: white;
            font-size: 20px;
            padding: 10px;
        }

        .chi_tiet_san_pham_so_luong {
            display: flex;
            margin-bottom: 20px;
        }

        .chi_tiet_san_pham_so_luong input {
            width: 60px;
        }

        .chi_tiet_san_pham_mo_ta {
            margin-top: 50px;
        }

        .san_pham_lien_quan {
            height: 90%;
            width: 100%;
            background-color: white;
            display: flex;
        }

        .san_pham_lien_quan img {
            height: 20%;
            width: 100%;
        }

        .block_lien_quan {
            border: 1px solid black;
            border-radius: 5px;
            width: 20%;
            margin-left: 50px;
        }

        .mo_ta_lien_quan {
            width: 80%;
            margin-left: 20px;
            margin-bottom: 20px;
        }

        .button_lien_quan button {
            width: 100%;
            height: 40px;
            margin-top: 20px;
            background-color: red;
            color: white;
        }
    </style>

</head>

<body>
    <div class="body">
        <header>
            <div class="thanh1">
                <div class="logo">
                    <a href="index.php">
                        <img src="./upload/logo.png" alt="" style="height: 130px; width: 170px;">
                    </a>
                </div>

                <div class="timkiem">
                    <form action="index.php" method="get">
                    <input type="hidden" name="act" value="tim_kiem">
                        <input type="text" name="keyword" id="" placeholder="      Tìm kiếm">
                        <button type="submit">
                            <img src="./upload/magnifying-glass-solid.svg" alt="" style="height: 20px; width: 20px;">
                        </button>
                    </form>
                </div>


                <div class="button">
                    <form action="" method="get">
                        <?php if (isset($_SESSION['user_client'])): ?>
                            <?php $user = $_SESSION['user_client']; ?>
                            <?php if ($user['chuc_vu_id'] == 2): // Chỉ hiển thị cho người dùng bình thường 
                            ?>
                                <?php $shortName = mb_strimwidth($user['ten'], 0, 15, '...'); ?>
                                <span>Xin chào, <?= htmlspecialchars($shortName) ?></span>
                                <a href="<?= BASE_URL . '?act=logout' ?>" style="color: red; margin-left: 10px;">Đăng xuất</a>
                            <?php elseif ($user['chuc_vu_id'] == 1): // Chỉ hiển thị cho admin 
                            ?>
                                <a href="<?= BASE_URL . '?act=dang_ki' ?>">
                                    <img src="./upload/user-solid.svg" alt="" style="height: 20px; width: 20px;">
                                    Đăng ký/
                                </a>
                                <a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a>
                            <?php elseif ($user['chuc_vu_id'] == 3): // Chỉ hiển thị cho quản lý 
                            ?>
                                <a href="<?= BASE_URL . '?act=dang_ki' ?>">
                                    <img src="./upload/user-solid.svg" alt="" style="height: 20px; width: 20px;">
                                    Đăng ký/
                                </a>
                                <a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a>
                            <?php endif; ?>
                        <?php else: // Không có user trong session 
                        ?>
                            <a href="<?= BASE_URL . '?act=dang_ki' ?>">
                                <img src="./upload/user-solid.svg" alt="" style="height: 20px; width: 20px;">
                                Đăng ký/
                            </a>
                            <a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a>
                        <?php endif; ?>
                        <a href="index.php?act=gio_hang" style="margin-left: 100px;">
                            <img src="./upload/cart-shopping-solid.svg" alt="" style="height: 20px; width: 20px;">
                            Giỏ hàng
                        </a>
                    </form>
                </div>
            </div>


        </header>

        <div class="thanh2">
            <ul>
                <li>
                    <img src="./upload/bars-solid.svg" alt="" style="height: 20px; width: 20px; margin-top: 20px;">
                </li>
                <li>
                    <a href="index.php">
                        <p>Danh mục sản phẩm test nhé </p>
                    </a>
                </li>
                <li>
                    <img src="./upload/medal-solid.svg" alt="" style="height: 20px; width: 20px; margin-top: 20px;">
                </li>
                <li>
                    <p>Đảm bảo chất lượng</p>

                </li>
                <li>
                    <img src="./upload/truck-fast-solid.svg" alt="" style="height: 20px; width: 20px; margin-top: 20px;">
                </li>
                <li>
                    <p>Vận chuyển siêu tốc</p>
                </li>
                <li>
                    <img src="./upload/phone-solid.svg" alt="" style="height: 20px; width: 20px; margin-top: 20px;">
                </li>
                <li>
                    <p>Buil PC: 0987654321</p>
                </li>


            </ul>
        </div>

        <?php


        $client = new clientTrangChu();
        $danhMucList = $client->getAllDanhMuc();
        $listSanPham = $client->getAllSanPham();
        ?>





        <main>
            <aside>
                <ul>
                    <?php foreach ($danhMucList as $danhMuc): ?>
                        <li>
                            <a href="index.php?act=danh_muc&id_danh_muc=<?= $danhMuc['id'] ?>">
                                <?= $danhMuc['ten_danh_muc'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </aside>

            <article>
                <section>
                    <img src="./upload/banner.jpg" alt="">
                </section>

            </article>

        </main>

        <h2 style="margin: 50px;">Ưu đãi bất ngờ</h2>

       

        <div class="san_pham">
    <?php foreach ($listSanPham as $key => $sanPham): ?>
        <div class="block_sp">
            <div class="img_sp">
                <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="">
            </div>
            <div class="mo_ta">
                <div class="ten_san_pham">
                    <p><?= $sanPham['ten_san_pham'] ?></p>
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
    <?php endforeach ?>
</div>


        <h2 style="margin: 50px;">Sản phẩm nổi bật</h2>

        <div class="san_pham_noi_bat">
    <?php foreach ($listSanPham as $key => $sanPham): ?>
        <div class="block_sp">
            <div class="img_sp">
                <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="">
            </div>
            <div class="mo_ta">
                <div class="ten_san_pham">
                    <p><?= $sanPham['ten_san_pham'] ?></p>
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
    <?php endforeach ?>
</div>


        <?php
        include_once 'footer.php'
        ?>