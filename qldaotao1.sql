-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2019 lúc 03:55 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qldaotao1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangky`
--

CREATE TABLE `dangky` (
  `id` int(11) NOT NULL,
  `mssv` int(100) NOT NULL,
  `id_hocky` int(11) NOT NULL,
  `id_tkb` char(20) NOT NULL,
  `isSign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dotdangky`
--

CREATE TABLE `dotdangky` (
  `id` int(11) NOT NULL,
  `tendot` varchar(255) NOT NULL,
  `ngaybatdaudk` date NOT NULL,
  `ngayketthucdk` date NOT NULL,
  `id_hocky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dotdangky`
--

INSERT INTO `dotdangky` (`id`, `tendot`, `ngaybatdaudk`, `ngayketthucdk`, `id_hocky`) VALUES
(1, 'Học kỳ 1, 2019-2020, Lần 1, K42', '2019-12-18', '2019-12-20', 1),
(2, 'Học kỳ 1, 2019-2020, Lần 1, K41', '2019-12-16', '2019-12-20', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `id_giangvien` int(11) NOT NULL,
  `email` char(100) NOT NULL,
  `hoten` varchar(55) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`id_giangvien`, `email`, `hoten`, `ngaysinh`, `gioitinh`) VALUES
(3, 'linhvip@gmail.com', 'Nguyễn Vân Khánh Linh', '1998-09-22', 0),
(4, 'voxuanloc98@gmail.com', 'Võ Xuân Lộc', '1998-10-02', 0),
(5, 'linhnguyen@gmail.com', 'Nguyễn Vân Khánh Linh', '1998-09-22', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocky`
--

CREATE TABLE `hocky` (
  `id_hocky` int(11) NOT NULL,
  `tenhocky` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hocky`
--

INSERT INTO `hocky` (`id_hocky`, `tenhocky`) VALUES
(1, 'Học kỳ 1, 2019-2020'),
(2, 'Học kỳ 1, 2019-2020, Lần 1, K41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphan`
--

CREATE TABLE `hocphan` (
  `id_hocphan` char(10) NOT NULL,
  `tenhocphan` varchar(100) NOT NULL,
  `sotinchi` int(11) NOT NULL,
  `tongsogio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hocphan`
--

INSERT INTO `hocphan` (`id_hocphan`, `tenhocphan`, `sotinchi`, `tongsogio`) VALUES
('TH1308', 'Lập trình web', 1, 30),
('TH1321', 'Nhập môn công nghệ phần mềm', 1, 30),
('TH1323', 'Kiểm thử phần mềm', 1, 30),
('TH1324', 'Phân tích thiết kế hướng đối tượng', 1, 30),
('TH1325', 'Phát triển phần mềm hướng dịch vụ', 1, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id_lop` char(55) NOT NULL,
  `id_hocphan` char(10) NOT NULL,
  `sosv` int(11) NOT NULL,
  `socatrongtuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id_lop`, `id_hocphan`, `sosv`, `socatrongtuan`) VALUES
('2019_TH1308_1', 'TH1308', 30, 1),
('2019_TH1308_2', 'TH1308', 30, 1),
('2019_TH1308_3', 'TH1308', 30, 1),
('2019_TH1308_4', 'TH1308', 20, 2),
('2019_TH1325', 'TH1325', 25, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongmay`
--

CREATE TABLE `phongmay` (
  `id_phong` char(10) NOT NULL,
  `somayhd` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phongmay`
--

INSERT INTO `phongmay` (`id_phong`, `somayhd`) VALUES
('A201', 25),
('A203', 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `mssv` int(11) NOT NULL,
  `hoten` varchar(55) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `email` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`mssv`, `hoten`, `ngaysinh`, `gioitinh`, `email`) VALUES
(16004037, 'Nguyễn Vân Khánh Linh', '1998-09-22', 0, 'linhvip1998vl@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoikhoabieu`
--

CREATE TABLE `thoikhoabieu` (
  `id_tkb` char(20) NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `id_hocky` int(11) NOT NULL,
  `id_lop` char(55) NOT NULL,
  `id_phong` char(55) NOT NULL,
  `ngaybatdauhp` date NOT NULL,
  `ngayketthuchp` date NOT NULL,
  `ca` int(11) NOT NULL,
  `thu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thoikhoabieu`
--

INSERT INTO `thoikhoabieu` (`id_tkb`, `id_giangvien`, `id_hocky`, `id_lop`, `id_phong`, `ngaybatdauhp`, `ngayketthuchp`, `ca`, `thu`) VALUES
('2019_TH1308_312', 5, 1, '2019_TH1308_3', 'A201', '2019-08-18', '2019-12-18', 1, 2),
('2019_TH1308_412', 5, 1, '2019_TH1308_4', 'A203', '2019-09-18', '2019-12-18', 1, 2),
('2019_TH132512', 4, 1, '2019_TH1325', 'A201', '2019-10-15', '2019-12-15', 1, 2),
('2019_TH132545', 4, 2, '2019_TH1325', 'A203', '2019-11-15', '2019-12-15', 4, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` char(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `quyen` int(11) NOT NULL,
  `remember_token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `quyen`, `remember_token`) VALUES
(1, 'linhnguyen@gmail.com', '$2y$10$j0KLUbxz/m5uF.kLJGOiq.Apyex2WGOzsJpF4BM/CMvCqRPYxuOLC', 1, 'c9gEP8V0f0jSq01CqY1USHt0vOs3C9GmFgHWxusHvn7JmOye4Ix2accn0JVv'),
(2, '16004037', '$2y$10$RkYqlKZmHUZOrcSQMU4bSOBmNPeVe2C58ruIpHJhSODV8.q7kJMkm', 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dangky_fk1` (`id_hocky`),
  ADD KEY `dangky_fk2` (`id_tkb`),
  ADD KEY `mssv` (`mssv`);

--
-- Chỉ mục cho bảng `dotdangky`
--
ALTER TABLE `dotdangky`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dotdangky_fk0` (`id_hocky`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`id_giangvien`);

--
-- Chỉ mục cho bảng `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`id_hocky`);

--
-- Chỉ mục cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`id_hocphan`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id_lop`),
  ADD KEY `lop_fk0` (`id_hocphan`);

--
-- Chỉ mục cho bảng `phongmay`
--
ALTER TABLE `phongmay`
  ADD PRIMARY KEY (`id_phong`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`mssv`);

--
-- Chỉ mục cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD PRIMARY KEY (`id_tkb`),
  ADD KEY `thoikhoabieu_fk1` (`id_hocky`),
  ADD KEY `thoikhoabieu_fk2` (`id_lop`),
  ADD KEY `thoikhoabieu_fk3` (`id_phong`),
  ADD KEY `thoikhoabieu_fk0` (`id_giangvien`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dangky`
--
ALTER TABLE `dangky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `dotdangky`
--
ALTER TABLE `dotdangky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `id_giangvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hocky`
--
ALTER TABLE `hocky`
  MODIFY `id_hocky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD CONSTRAINT `dangky_fk0` FOREIGN KEY (`mssv`) REFERENCES `sinhvien` (`mssv`),
  ADD CONSTRAINT `dangky_fk1` FOREIGN KEY (`id_hocky`) REFERENCES `hocky` (`id_hocky`),
  ADD CONSTRAINT `dangky_fk2` FOREIGN KEY (`id_tkb`) REFERENCES `thoikhoabieu` (`id_tkb`);

--
-- Các ràng buộc cho bảng `dotdangky`
--
ALTER TABLE `dotdangky`
  ADD CONSTRAINT `dotdangky_fk0` FOREIGN KEY (`id_hocky`) REFERENCES `hocky` (`id_hocky`);

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_fk0` FOREIGN KEY (`id_hocphan`) REFERENCES `hocphan` (`id_hocphan`);

--
-- Các ràng buộc cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD CONSTRAINT `thoikhoabieu_fk0` FOREIGN KEY (`id_giangvien`) REFERENCES `giangvien` (`id_giangvien`),
  ADD CONSTRAINT `thoikhoabieu_fk1` FOREIGN KEY (`id_hocky`) REFERENCES `hocky` (`id_hocky`),
  ADD CONSTRAINT `thoikhoabieu_fk2` FOREIGN KEY (`id_lop`) REFERENCES `lop` (`id_lop`),
  ADD CONSTRAINT `thoikhoabieu_fk3` FOREIGN KEY (`id_phong`) REFERENCES `phongmay` (`id_phong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
