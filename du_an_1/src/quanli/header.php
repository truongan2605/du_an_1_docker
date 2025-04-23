<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-VoPF5CRkD8u5FVgG1pfeW0pJphnQezzzh7e5JGFS2X15C34hxLBz4lVkeQ22xrFd" crossorigin="anonymous"></script>
    <style>
        .nav-item .dropdown-items {
            display: none;
            position: absolute;
            background-color: #fff;
            /* Chỉnh màu nền */
            border: 1px solid #ccc;
            /* Chỉnh đường viền */
            padding: 10px;
            /* Thêm khoảng cách xung quanh */
            z-index: 100;
            /* Đảm bảo các thẻ này hiển thị trên các phần tử khác */
        }

        /* Khi hover vào thẻ <a> cha, hiển thị các thẻ <a> con */
        .nav-item:hover .dropdown-items {
            display: block;
        }

        /* Thêm một chút styling cho các thẻ con */
        .nav-item .dropdown-items a {
            display: block;
            padding: 8px 15px;
            color: #333;
            /* Màu chữ */
            text-decoration: none;
        }

        .nav-item .dropdown-items a:hover {
            background-color: #f0f0f0;
            /* Màu nền khi hover */
        }
    </style>

</head>

<body>
    <div class="container">
        <!-- <div class="row align-items-start">
            <div class="d-flex row">
                <div class="p flex-fill col-3">
                    <div class="col" id="logo">
                        <img src="img/logo..png " alt="" height="100px">
                    </div>
                </div>
                <div class="p-4 flex-fill col-7">
                    <nav class="navbar">
                            <form class="d-flex w-75" role="search">
                                <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        
                    </nav>
                </div>
                <div class="p-4 flex-fill col-2">
                    <div class="logout">
                        <a class="btn btn-outline-secondary" href="#" role="button">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div> -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary mt-3">
            <div class="container-md">
                <a class="navbar-brand" href="#">MANAGEMENT</a>
            </div>
            <div class="icon me-5">
                <a href="<?= BASE_URL ?>" onclick="return confirm('Bạn muốn đăng xuất?')">
                    <img width="25" height="25" src="https://img.icons8.com/pixels/32/exit.png" alt="exit" />
                </a>
            </div>
        </nav>

        <nav class="navbar navbar-expand-sm bg-danger-subtle">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav text-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= BASE_URL_QUANLI . '?act=danh-muc' ?>">Quản lý danh mục sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= BASE_URL_QUANLI . '?act=san-pham' ?>">Quản lý sản phẩm </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= BASE_URL_QUANLI . '?act=list-tai-khoan-quan-tri' ?>">Quản lý tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= BASE_URL_QUANLI . '?act=thong-ke' ?>">Thống kê </a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </div>