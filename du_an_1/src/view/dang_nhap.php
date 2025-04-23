<?php
include_once 'header.php'
?>

<style>
    .dang_nhap_body {
        width: 55%;
        height: 110%;
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
        height: 110%;
        margin-left: 20px;
        padding: 30px;
    }

    .dang_nhap_email input {
        height: 40px;
        width: 90%;
        border-radius: 5px;
        border: hidden;
        margin-bottom: 25px;
    }

    .dang_nhap_mk input {
        height: 40px;
        width: 90%;
        border-radius: 5px;
        border: hidden;
        margin-bottom: 25px;
    }

    .dang_nhap_button button{
        height: 35px;
        width: 30%;
        border-radius: 5px;
        background-color: red;
        color: white;
    }

    .dang_nhap_button{
        text-align: center;

    }
</style>

<body>
<div class="dang_nhap_body">
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
            <form action="<?= BASE_URL . '?act=check_login' ?>" method="POST">
                <div class="dang_nhap_email">
                    <input type="email" name="email" placeholder="Nhập email của bạn" required>
                </div>
                <div class="dang_nhap_mk">
                    <input type="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
                </div>
                <?php if (isset($_SESSION['error']) && is_string($_SESSION['error'])): ?>
                    <div class="alert"><?= htmlspecialchars($_SESSION['error']); ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <div class="dang_nhap_button">
                    <button type="submit">Đăng nhập</button>
                </div>
            </form>


        </div>
    </div>


</body>


<?php
include_once 'footer.php'

?>