<?php
include_once 'header.php';
?>

<style>
    .dang_ki_body {
        width: 55%;
        height: 600px;
        /* height: 600px; */
        background-color: whitesmoke;
        margin-left: 300px;
        margin-top: 40px;
        border-radius: 5px;
    }

    .thanh1 {
        display: flex;
        justify-content: space-around;
        padding: 20px;
    }

    .block1 a {
        text-decoration: none;
        color: black;
    }

    .block2 a {
        text-decoration: none;
        color: black;
    }

    .block3 {
        width: 95%;
        height: 400px;
        margin-left: 20px;
        padding: 30px;
    }

    .dang_ki_ten input{
        height: 40px;
        width: 90%;
        border-radius: 5px;
        border: hidden;
        margin-bottom: 25px;
    }

    .dang_ki_gioi_tinh{
        margin-bottom: 25px;

    }

    .dang_ki_ngay input{
        height: 40px;
        width: 90%;
        border-radius: 5px;
        border: hidden;
        margin-bottom: 25px;
        /* text-align: center; */
    }

    .dang_ki_email input{
        height: 40px;
        width: 90%;
        border-radius: 5px;
        border: hidden;
        margin-bottom: 25px;
    }

    .dang_ki_mk input{
        height: 40px;
        width: 90%;
        border-radius: 5px;
        border: hidden;
        margin-bottom: 25px;
    }

    .dang_ki_button{
        text-align: center;

    }

    .dang_ki_button button{
        height: 35px;
        width: 30%;
        border-radius: 5px;
        background-color: red;
        color: white;
    }
</style>

<body>
<div class="dang_ki_body">
        <div class="thanh1">
            <div class="block1">
                <a href="<?= BASE_URL . '?act=dang_ki' ?>">
                    <h2>Đăng kí</h2>
                </a>
            </div>

            <div class="block2">
                <a href="<?= BASE_URL . '?act=login' ?>">
                    <h2>Đăng nhập</h2>
                </a>
            </div>
        </div>
        <div class="block3">
            <?php if (isset($_SESSION['error']['general'])) { ?>
                <p style="color: red; text-align: center;"><?= $_SESSION['error']['general'] ?></p>
                <?php unset($_SESSION['error']['general']); // Xóa thông báo lỗi sau khi hiển thị 
                ?>
            <?php } ?>
            <div class="block3">
                <form action="<?= BASE_URL . '?act=register' ?>" method="POST">
                    <div class="dang_ki_ten">
                        <input type="text" name="ten" placeholder="Nhập họ và tên của bạn">
                        <?php if (isset($_SESSION['error']['ten'])) { ?>
                            <p style="color: red;"><?= $_SESSION['error']['ten'] ?></p>
                            <?php unset($_SESSION['error']['ten']); // Xóa thông báo lỗi sau khi hiển thị 
                            ?>
                        <?php } ?>
                    </div>

                    <div class="dang_ki_gioi_tinh">
                        <label>
                            <input type="radio" name="gender" value="Nam"> Nam
                        </label>
                        <label>
                            <input type="radio" name="gender" value="Nữ"> Nữ
                        </label>
                        <?php if (isset($_SESSION['error']['gender'])) { ?>
                            <p style="color: red;"><?= $_SESSION['error']['gender'] ?></p>
                            <?php unset($_SESSION['error']['gender']); // Xóa thông báo lỗi sau khi hiển thị 
                            ?>
                        <?php } ?>
                    </div>

                    <div class="dang_ki_ngay">
                        <label for="" style="margin: 25px;">Ngày sinh:</label>
                        <input type="date" name="ngay_sinh">
                        <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                            <p style="color: red;"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                            <?php unset($_SESSION['error']['ngay_sinh']); // Xóa thông báo lỗi sau khi hiển thị 
                            ?>
                        <?php } ?>
                    </div>

                    <div class="dang_ki_email">
                        <input type="email" name="email" placeholder="Nhập email của bạn">
                        <?php if (isset($_SESSION['error']['email'])) { ?>
                            <p style="color: red;"><?= $_SESSION['error']['email'] ?></p>
                            <?php unset($_SESSION['error']['email']); // Xóa thông báo lỗi sau khi hiển thị 
                            ?>
                        <?php } ?>
                    </div>

                    <div class="dang_ki_mk">
                        <input type="password" name="password" placeholder="Nhập mật khẩu của bạn">
                        <?php if (isset($_SESSION['error']['password'])) { ?>
                            <p style="color: red;"><?= $_SESSION['error']['password'] ?></p>
                            <?php unset($_SESSION['error']['password']); // Xóa thông báo lỗi sau khi hiển thị 
                            ?>
                        <?php } ?>
                    </div>

                    <div class="dang_ki_button">
                        <button type="submit">Đăng kí</button>
                    </div>
                </form>
            </div>
        </div>
</body>


<?php
// include_once 'footer.php';

?>