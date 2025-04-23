-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2024 at 09:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_cua_binh_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ngay_dang` date NOT NULL,
  `san_pham_id` int NOT NULL,
  `trang_thai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `san_pham_id`, `trang_thai`) VALUES
(1, 1, 'tuyet voi', '2024-11-20', 6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int DEFAULT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` int NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(1, 1, 1, 200000, 2, 400000),
(2, 2, 2, 150000, 3, 450000),
(1, 1, 1, 200000, 2, 4000000);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `id` int DEFAULT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_gio_hang`
--

INSERT INTO `chi_tiet_gio_hang` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(1, 1, 1, 2),
(2, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chuc_vu`
--

INSERT INTO `chuc_vu` (`id`, `ten_chuc_vu`) VALUES
(1, 'Nhân viên'),
(2, 'Khách hàng'),
(3, 'Quản trị');

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mo_ta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(8, 'Máy tính macbook', 'mackbook '),
(9, 'Máy tính Tuf Gaming', 'Tuf Gaming'),
(10, 'máy tính Acer', 'máy tính Acer'),
(11, 'Máy tính Asus', 'Máy tính Asus'),
(12, 'Máy tính Dell', 'Máy tính Dell');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `user_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id`, `ma_don_hang`, `user_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`, `tai_khoan_id`) VALUES
(1, '1', 1, 'Nguyễn Thị Bình', 'binhntph52138@gmail.com', '0346564005', 'Thạch Thất- Hà Nội', '2024-11-12', '10000000.00', '', 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `anh` varchar(255) NOT NULL,
  `gia` int NOT NULL,
  `ghi_chu` varchar(255) NOT NULL,
  `id_san_pham` int NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `ten_san_pham`, `anh`, `gia`, `ghi_chu`, `id_san_pham`, `trang_thai`, `tai_khoan_id`) VALUES
(1, 'Máy tính I5', '', 10000, '', 6, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_pham`
--

CREATE TABLE `hinh_anh_san_pham` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toan`
--

CREATE TABLE `phuong_thuc_thanh_toan` (
  `id` int NOT NULL,
  `ten_phuong_thuc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toan`
--

INSERT INTO `phuong_thuc_thanh_toan` (`id`, `ten_phuong_thuc`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Thẻ ngân hàng');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `danh_muc_id` int NOT NULL,
  `mo_ta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gia_san_pham` int NOT NULL DEFAULT '0',
  `gia_khuyen_mai` int NOT NULL DEFAULT '0',
  `hinh_anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `so_luong` int NOT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `trang_thai` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_san_pham`, `danh_muc_id`, `mo_ta`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `ngay_nhap`, `trang_thai`) VALUES
(6, 'Máy Tính dell i5 2', 8, 'Máy Tính dell i5 cấu hình mạnh mẽ, trẻ trung năng động', 10000000, 9000000, './upload/1732939648dell.jpg', 1, '2024-02-11', 1),
(7, 'Máy Tính Tuf Gaming', 9, 'Máy Tính Tuf Gaming hiệu năng mạnh mẽ, chiến mọi loại game', 12000000, 11000000, './upload/1732939726tuf.jpg', 1, '2024-11-11', 1),
(8, 'Máy Tính Macbook', 8, 'Máy Tính Macbook ngoại hình đẹp mắt, trẻ trung năng động', 30000000, 28000000, './upload/1732939872macbook.jpg', 1, '2024-12-12', 1),
(10, 'Máy tính acer', 10, 'Máy tính acer mạnh mẽ hiệu năng dáng vẻ trẻ trung ', 12000000, 10000000, './upload/1733200601acer.jpg', 1, '2024-11-11', 1),
(11, 'Máy tính acer', 10, 'Laptop Acer Aspire 3 Spin 14 A3SP14-31PT-387Z - Laptop lai nhỏ gọn, hiệu năng ổn định', 12000000, 11000000, './upload/1733205636acer.jpg', 1, '2024-12-12', 1),
(12, 'ádas', 10, '12312312', 1212312, 12312312, './upload/1733205783tuf.jpg', 1231, '1232-03-12', 1),
(14, 'Máy tính asus', 11, 'Máy tính asus', 12000000, 11000000, './upload/1733206064dell.jpg', 2, '2024-12-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hang`
--

CREATE TABLE `trang_thai_don_hang` (
  `id` int NOT NULL,
  `ten_trang_thai` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hang`
--

INSERT INTO `trang_thai_don_hang` (`id`, `ten_trang_thai`) VALUES
(1, 'Đã giao'),
(2, 'Đang xử lý'),
(3, 'Đã hủy'),
(4, 'Chờ Xác Nhận'),
(5, 'Chờ Lấy Hàng'),
(6, 'Chờ giao hàng'),
(7, 'Trả hàng');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ten` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tai_khoan` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mat_khau` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id` int NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `email` text NOT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `chuc_vu_id` int NOT NULL,
  `anh_dai_dien` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `gioi_tinh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ten`, `tai_khoan`, `mat_khau`, `id`, `ngay_sinh`, `email`, `so_dien_thoai`, `dia_chi`, `chuc_vu_id`, `anh_dai_dien`, `gioi_tinh`) VALUES
('Nguyễn Ngọc Bình đẳng cấp-))', 'Ngocbinh', '1234', 1, '2005-08-04', 'binhntph52138@gmail.com', '0346564005', 'Thạch Thất- Hà Nội', 2, '', '2'),
('Nguyễn Ngọc Diệp', 'Ngọc Diệp', '123456', 2, '2005-11-27', 'ngocdiep123@gmail.com', '03465640066', 'Thạch Thất-Hà Nội', 1, '', '2'),
('Nguyễn Hữu Dương', 'duongne', '1234@', 3, '2005-08-17', 'duongne12@gmail.com', '0346564007', 'Hoài Đức- Hà Nội', 3, '', ''),
('Trương an', NULL, '12345', 4, NULL, 'binhntph52138@gmail.com', '0346564007', NULL, 1, NULL, NULL),
('Chu Thị Huyền Trang', NULL, '1234', 5, NULL, 'trangcthph52136@gmail.com', '0346564006', NULL, 1, NULL, NULL),
('Lỗ Trương An', NULL, 'anngua12345', 6, NULL, 'truongan26052005@gmail.com', '0382013369', NULL, 1, NULL, NULL),
('tôi là admin 23', NULL, 'a12312312', 7, NULL, 'admin@gmail.com', '03465640066', NULL, 1, NULL, NULL),
('tôi là người thường', NULL, '123456', 8, '2005-05-26', 'toilanguoithuong@gmail.com', NULL, NULL, 2, NULL, 'Nam'),
('an', NULL, '123456', 9, '2222-02-22', 'an@gmail.com', NULL, NULL, 0, NULL, 'Nam'),
('test1', NULL, '123456', 10, NULL, 'test@gmail.com', '0382013369', NULL, 1, NULL, NULL),
('tôi là người thường 22', NULL, '123456', 12, '2222-02-22', '2222@gmail.com', NULL, NULL, 2, NULL, 'Nữ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_id_nguoi_dung` (`tai_khoan_id`);

--
-- Indexes for table `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_id_san_pham` (`id_san_pham`),
  ADD KEY `lk_id_khach_hang` (`tai_khoan_id`);

--
-- Indexes for table `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_id_danh_muc` (`danh_muc_id`);

--
-- Indexes for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `lk_id_nguoi_dung` FOREIGN KEY (`tai_khoan_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `lk_id_khach_hang` FOREIGN KEY (`tai_khoan_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_id_san_pham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `lk_id_danh_muc` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_muc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
