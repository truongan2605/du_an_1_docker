<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
            height: 300px;
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
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            /* Giao diện responsive */
            gap: 20px;
            /* Khoảng cách giữa các sản phẩm */
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
            /* background-color: white; */

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

        .form_nguoi_dung label,
        input,
        select,
        textarea {
            margin-left: 30px;
            margin-bottom: 10px;
        }



        /* ---------------------------------------------------------------------------------------- */
        .chi_tiet_san_pham_body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            gap: 20px;
            background-color: #fff;
            margin: 20px auto;
            border-radius: 10px;
            max-width: 1200px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .chi_tiet_san_pham_img img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .chi_tiet_san_pham_block {
            flex: none;
            width: 28%;
            padding-right: 30px;
        }


        .ten_san_pham {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .mo_ta_san_pham {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .chi_tiet_san_pham_gia {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
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

        /*************** Nút hành động ***************/
        .chi_tiet_san_pham_button {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .button_1,
        .button_2 {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .button_1 {
            background-color: red;
            color: white;
        }

        .button_1:hover {
            background-color: orange;
        }

        .button_2 {
            background-color: #ff5e57;
            color: white;
        }

        .button_2:hover {
            background-color: #e04a45;
        }

        /*************** Chính sách ***************/
        .chi_tiet_san_pham_chinh_sach {
            margin-top: 20px;
            margin-left: 250px;
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 10px;
        }

        .chi_tiet_san_pham_chinh_sach ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .chi_tiet_san_pham_chinh_sach li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .chi_tiet_san_pham_chinh_sach img {
            margin-right: 10px;
        }

        /*************** Bình luận ***************/
        .binh_luan {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            padding: 20px;
            gap: 20px;
            background-color: #fff;
            margin: 20px auto;
            border-radius: 10px;
            max-width: 1200px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .binh_luan_form textarea {
            border-radius: 5px;
            width: 600px;
            height: 60px;
        }

        .binh_luan_form button {
            border: hidden;
            border-radius: 5px;
            width: 200px;
            height: 50px;
            background-color: red;
            color: white;
        }




        /*************** Sản phẩm liên quan ***************/
        .san_pham_lien_quan {
            max-width: 1200px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .block_lien_quan {
            display: inline-block;
            width: 23%;
            margin: 10px;
            padding: 10px;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .block_lien_quan img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;

        }

        .block_lien_quan .button_lien_quan {
            margin-top: 10px;
            background-color: red;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button_lien_quan button a {
            text-decoration: none;
            background-color: red;
            border: none;
            color: white;
        }

        .button_lien_quan button {
            text-decoration: none;
            background-color: red;
            border: none;
        }

        .button_lien_quan a:hover {
            background-color: orange;
        }

        .block_lien_quan .button_lien_quan:hover {
            background-color: orange;
        }


        /* ------------------------------------------------------------------------------------------------ */

        .danh_muc_body {
            margin-top: 50px;
        }

        .danh_muc_body h1 {
            margin: 20px;
        }
    </style>

</head>

<body>
    <div class="body">
        <header>
            <div class="thanh1">
                <div class="logo">
                    <a href="index.php">
                        <img src="./upload/logo.png" alt="" style="height: 120px; width: 130px;">
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
                        <p>Danh mục sản phẩm</p>
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

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>