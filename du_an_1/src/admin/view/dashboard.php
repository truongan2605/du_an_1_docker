<?php
include 'header.php';
?>

<div class="container mt-3">
    <h3>Thống Kê</h3>
</div>

<section class="content">
    <div class="container mt-3">
        <div class="row">
            <!-- Bảng thống kê tổng quan -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Thống kê tổng quan</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Thống Kê</th>
                                    <th>Số Lượng</th>
                                    <th>Đơn Vị</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Số lượng sản phẩm</td>
                                    <td><?= $soLuongSanPham ?></td>
                                    <td>Sản phẩm</td>
                                </tr>
                                <tr>
                                    <td>Số lượng khách hàng</td>
                                    <td><?= $soLuongKhachHang ?></td>
                                    <td>Khách hàng</td>
                                </tr>
                                <tr>
                                    <td>Số lượng đơn hàng</td>
                                    <td><?= $soLuongDonHang ?></td>
                                    <td>Đơn hàng</td>
                                </tr>
                                <tr>
                                    <td>Doanh thu</td>
                                    <td><?= formatPrice($doanhThu) ?></td>
                                    <td>VND</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Thống kê đơn hàng theo trạng thái -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5>Thống kê đơn hàng theo trạng thái</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Trạng thái</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($donHangTheoTrangThai as $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['ten_trang_thai']) ?></td>
                                        <td><?= $item['so_luong'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Biểu đồ doanh thu -->
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header bg-info text-white">
                        <h5>Thống kê doanh thu</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Hôm nay:</strong> <?= number_format($doanhThuHomNay, 0, ',', '.') ?> VND</p>
                        <p><strong>Tuần này:</strong> <?= number_format($doanhThuTuanNay, 0, ',', '.') ?> VND</p>
                        <p><strong>Tháng này:</strong> <?= number_format($doanhThuThangNay, 0, ',', '.') ?> VND</p>
                        <p><strong>Tổng cộng:</strong> <?= number_format($doanhThu, 0, ',', '.') ?> VND</p>
                    </div>
                </div>

                <!-- Biểu đồ doanh thu -->
                <canvas id="chartDoanhThu" width="400" height="200"></canvas>
            </div>
        </div>

        <!-- Sản phẩm bán chạy -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        <h5>Sản phẩm bán chạy</h5>
                    </div>
                    <div class="card-body">
                        <ul>
                            <?php foreach ($sanPhamBanChay as $sp): ?>
                                <li>
                                    <?= htmlspecialchars($sp['ten_san_pham']) ?> - 
                                    <strong><?= $sp['so_luong_ban'] ?> sản phẩm</strong>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Biểu đồ với Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartDoanhThu').getContext('2d');
    const chartDoanhThu = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Hôm nay', 'Tuần này', 'Tháng này'],
            datasets: [{
                label: 'Doanh thu (VND)',
                data: [<?= $doanhThuHomNay ?>, <?= $doanhThuTuanNay ?>, <?= $doanhThuThangNay ?>],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Biểu đồ doanh thu'
                }
            }
        },
    });
</script>
