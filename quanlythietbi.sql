-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 20, 2023 lúc 04:13 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlythietbi`
--
CREATE DATABASE IF NOT EXISTS `quanlythietbi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `quanlythietbi`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baotrivien`
--

CREATE TABLE `baotrivien` (
  `maNhanVien` char(10) NOT NULL,
  `doiTuongBaoTri` varchar(45) NOT NULL,
  `tinhTrang` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `maChucVu` char(10) NOT NULL,
  `tenChucVul` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` VALUES
('01', 'admin'),
('02', 'truongP'),
('03', 'nhanVien'),
('04', 'btv_dt'),
('05', 'btv_ck'),
('06', 'btv_nt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachchiphi`
--

CREATE TABLE `danhsachchiphi` (
  `maPhieuChiPhi` char(10) NOT NULL,
  `tenChiPhi` varchar(45) NOT NULL,
  `soTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichbaotri`
--

CREATE TABLE `lichbaotri` (
  `ngayBaoTri` date NOT NULL,
  `maNhanVien` char(10) NOT NULL,
  `maThietBi` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `maNhanVien` char(10) NOT NULL,
  `hoTen` varchar(45) NOT NULL,
  `tuoi` int(11) NOT NULL,
  `soDienThoai` char(10) DEFAULT NULL,
  `tenTaiKhoan` char(20) NOT NULL,
  `matKhau` char(20) NOT NULL,
  `maChucVu` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` VALUES
('NV01', 'Cao Đức Hiếu', 22, '0375353543', 'hieu2001z1', '2', '01'),
('NV02', 'Đặng Cẩm Tú', 22, '0932948230', 'tudang01', '1', '03'),
('NV03', 'Đặng Cẩm Tú', 22, '0932948230', 'tudang01', '1', '02'),
('NV030', 'Đặng Cẩm Tú', 6, '0932948230', 'tudang01', '2', '05'),
('NV031', 'Đặng Cẩm Tú', 22, '0932948230', 'tudang01', '1', '03'),
('NV0322', 'Đặng Cẩm Tú', 22, '0932948230', 'tudang01', '1', '02'),
('NV05', 'Đặng Cẩm Tú', 22, '0932948230', 'tudang01', '1', '05'),
('NV06', 'Cao Đức Hiếu', 22, '0923823132', 'hieu1999', '1', '02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvienthuocphongban`
--

CREATE TABLE `nhanvienthuocphongban` (
  `maNhanVien` char(10) NOT NULL,
  `maPhongBan` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieubangiao`
--

CREATE TABLE `phieubangiao` (
  `maPhieuBanGiao` char(10) NOT NULL,
  `maNguoiViet` char(10) NOT NULL,
  `maPhieuChiPhi` char(10) NOT NULL,
  `maNhanVienQuanLy` char(10) NOT NULL,
  `maThietBi` char(20) NOT NULL,
  `thoiDiemBanGiao` date NOT NULL,
  `xacNhan` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuchiphi`
--

CREATE TABLE `phieuchiphi` (
  `maPhieuChiPhi` char(10) NOT NULL,
  `maNhanVien` char(10) NOT NULL,
  `suaDoi` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieulaythietbi`
--

CREATE TABLE `phieulaythietbi` (
  `maPhieuLayThietBi` char(10) NOT NULL,
  `maNguoiSua` char(10) NOT NULL,
  `maNhanVienQuanLy` char(10) NOT NULL,
  `maThietBi` char(20) NOT NULL,
  `thoiDiemTaoPhieu` date NOT NULL,
  `xacNhan` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuyeucaumuatb`
--

CREATE TABLE `phieuyeucaumuatb` (
  `maPhieuYeuCauMua` char(10) NOT NULL,
  `nguoiViet` char(10) NOT NULL,
  `yeuCau` varchar(200) NOT NULL,
  `lyDo` varchar(200) NOT NULL,
  `xacNhan` char(1) NOT NULL,
  `thoiDiemTaoPhieu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuyeucaumuatb`
--

INSERT INTO `phieuyeucaumuatb` VALUES
('PM01', 'NV03', 'Mua mới', 'none', '0', '2023-01-02'),
('PM02', 'NV06', 'Mua cũ', 'none', '0', '2022-01-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuyeucausuachua`
--

CREATE TABLE `phieuyeucausuachua` (
  `maPhieuYeuCau` char(10) NOT NULL,
  `thongTinThem` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `thoiDiemTaoPhieu` date NOT NULL,
  `xacNhan` char(1) NOT NULL,
  `maTruongPhong` char(10) NOT NULL,
  `maNhanVienQuanLy` char(10) NOT NULL,
  `maThietBi` char(20) NOT NULL,
  `maPhongBan` char(10) NOT NULL,
  `maNguoiSua` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `maPhongBan` char(10) NOT NULL,
  `tenPhongBan` varchar(45) NOT NULL,
  `viTri` varchar(45) DEFAULT NULL,
  `maTruongPhong` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` VALUES
('P101', 'Phòng nhân sự', 'Tầng 1', 'NV03'),
('P102', 'Phòng IT', 'Tầng 1', 'NV06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietbi`
--

CREATE TABLE `thietbi` (
  `maThietBi` char(20) NOT NULL,
  `tenThietBi` varchar(45) NOT NULL,
  `ngayMua` datetime NOT NULL,
  `soTienMua` int(11) NOT NULL,
  `thongTinThietBi` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `loaiThietBi` varchar(45) NOT NULL,
  `ngaySuDung` datetime DEFAULT NULL,
  `tinhTrang` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thietbi`
--

INSERT INTO `thietbi` VALUES
('TB02', 'Tủ lạnh', '2023-05-11 01:51:00', 200000, 'none', 'loai2', '2023-06-12 01:52:00', 'ok'),
('TB04', 'Quạt', '2023-05-18 01:54:00', 20000, 'df', 'loai1', '2023-05-25 01:55:00', 'ok');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietbiquanlycuanhanvien`
--

CREATE TABLE `thietbiquanlycuanhanvien` (
  `maNhanVienQuanLy` char(10) NOT NULL,
  `maThietBi` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `tk` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` VALUES
('hieu2001z1', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baotrivien`
--
ALTER TABLE `baotrivien`
  ADD PRIMARY KEY (`maNhanVien`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`maChucVu`);

--
-- Chỉ mục cho bảng `danhsachchiphi`
--
ALTER TABLE `danhsachchiphi`
  ADD PRIMARY KEY (`maPhieuChiPhi`);

--
-- Chỉ mục cho bảng `lichbaotri`
--
ALTER TABLE `lichbaotri`
  ADD KEY `mnv_lbt_key` (`maNhanVien`),
  ADD KEY `mtb_lbt_key` (`maThietBi`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`maNhanVien`),
  ADD KEY `maChucVu` (`maChucVu`);

--
-- Chỉ mục cho bảng `nhanvienthuocphongban`
--
ALTER TABLE `nhanvienthuocphongban`
  ADD PRIMARY KEY (`maNhanVien`,`maPhongBan`),
  ADD KEY `maPB_nvtpb_key` (`maPhongBan`);

--
-- Chỉ mục cho bảng `phieubangiao`
--
ALTER TABLE `phieubangiao`
  ADD PRIMARY KEY (`maPhieuBanGiao`),
  ADD KEY `mnv_pbg_key` (`maNguoiViet`),
  ADD KEY `mpcp` (`maPhieuChiPhi`),
  ADD KEY `mnvql_pbg_key` (`maNhanVienQuanLy`),
  ADD KEY `mtb_pbg_key` (`maThietBi`);

--
-- Chỉ mục cho bảng `phieuchiphi`
--
ALTER TABLE `phieuchiphi`
  ADD PRIMARY KEY (`maPhieuChiPhi`),
  ADD KEY `mnv_pcp_key` (`maNhanVien`);

--
-- Chỉ mục cho bảng `phieulaythietbi`
--
ALTER TABLE `phieulaythietbi`
  ADD PRIMARY KEY (`maPhieuLayThietBi`),
  ADD KEY `mns_pltb_key` (`maNguoiSua`),
  ADD KEY `mnvql_pltb_key` (`maNhanVienQuanLy`),
  ADD KEY `mtb_pltb_key` (`maThietBi`);

--
-- Chỉ mục cho bảng `phieuyeucaumuatb`
--
ALTER TABLE `phieuyeucaumuatb`
  ADD PRIMARY KEY (`maPhieuYeuCauMua`),
  ADD KEY `nguoiViet_pycmtb_key` (`nguoiViet`);

--
-- Chỉ mục cho bảng `phieuyeucausuachua`
--
ALTER TABLE `phieuyeucausuachua`
  ADD PRIMARY KEY (`maPhieuYeuCau`),
  ADD KEY `mnvql_pycsc_key` (`maNhanVienQuanLy`),
  ADD KEY `mtb_pycsc_key` (`maThietBi`),
  ADD KEY `mbp_pycsc_key` (`maPhongBan`),
  ADD KEY `mns_pycsc_key` (`maNguoiSua`),
  ADD KEY `mtp_pycsc_key` (`maTruongPhong`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`maPhongBan`),
  ADD KEY `maNhanVien` (`maTruongPhong`);

--
-- Chỉ mục cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  ADD PRIMARY KEY (`maThietBi`);

--
-- Chỉ mục cho bảng `thietbiquanlycuanhanvien`
--
ALTER TABLE `thietbiquanlycuanhanvien`
  ADD PRIMARY KEY (`maNhanVienQuanLy`,`maThietBi`),
  ADD KEY `maThietBi` (`maThietBi`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`tk`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baotrivien`
--
ALTER TABLE `baotrivien`
  ADD CONSTRAINT `mnv_btv_key` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`maNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `danhsachchiphi`
--
ALTER TABLE `danhsachchiphi`
  ADD CONSTRAINT `mpcp_dscp_key` FOREIGN KEY (`maPhieuChiPhi`) REFERENCES `phieuchiphi` (`maPhieuChiPhi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `lichbaotri`
--
ALTER TABLE `lichbaotri`
  ADD CONSTRAINT `mnv_lbt_key` FOREIGN KEY (`maNhanVien`) REFERENCES `baotrivien` (`maNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mtb_lbt_key` FOREIGN KEY (`maThietBi`) REFERENCES `thietbi` (`maThietBi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `maChucVu` FOREIGN KEY (`maChucVu`) REFERENCES `chucvu` (`maChucVu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `nhanvienthuocphongban`
--
ALTER TABLE `nhanvienthuocphongban`
  ADD CONSTRAINT `maNV_nvtpb_key` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`maNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `maPB_nvtpb_key` FOREIGN KEY (`maPhongBan`) REFERENCES `phongban` (`maPhongBan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `phieubangiao`
--
ALTER TABLE `phieubangiao`
  ADD CONSTRAINT `mnv_pbg_key` FOREIGN KEY (`maNguoiViet`) REFERENCES `baotrivien` (`maNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mnvql_pbg_key` FOREIGN KEY (`maNhanVienQuanLy`) REFERENCES `thietbiquanlycuanhanvien` (`maNhanVienQuanLy`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mpcp` FOREIGN KEY (`maPhieuChiPhi`) REFERENCES `phieuchiphi` (`maPhieuChiPhi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mtb_pbg_key` FOREIGN KEY (`maThietBi`) REFERENCES `thietbiquanlycuanhanvien` (`maThietBi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `phieuchiphi`
--
ALTER TABLE `phieuchiphi`
  ADD CONSTRAINT `mnv_pcp_key` FOREIGN KEY (`maNhanVien`) REFERENCES `baotrivien` (`maNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `phieulaythietbi`
--
ALTER TABLE `phieulaythietbi`
  ADD CONSTRAINT `mns_pltb_key` FOREIGN KEY (`maNguoiSua`) REFERENCES `baotrivien` (`maNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mnvql_pltb_key` FOREIGN KEY (`maNhanVienQuanLy`) REFERENCES `thietbiquanlycuanhanvien` (`maNhanVienQuanLy`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mtb_pltb_key` FOREIGN KEY (`maThietBi`) REFERENCES `thietbiquanlycuanhanvien` (`maThietBi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `phieuyeucaumuatb`
--
ALTER TABLE `phieuyeucaumuatb`
  ADD CONSTRAINT `nguoiViet_pycmtb_key` FOREIGN KEY (`nguoiViet`) REFERENCES `nhanvien` (`maNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `phieuyeucausuachua`
--
ALTER TABLE `phieuyeucausuachua`
  ADD CONSTRAINT `mbp_pycsc_key` FOREIGN KEY (`maPhongBan`) REFERENCES `phongban` (`maPhongBan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mns_pycsc_key` FOREIGN KEY (`maNguoiSua`) REFERENCES `baotrivien` (`maNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mnvql_pycsc_key` FOREIGN KEY (`maNhanVienQuanLy`) REFERENCES `thietbiquanlycuanhanvien` (`maNhanVienQuanLy`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mtb_pycsc_key` FOREIGN KEY (`maThietBi`) REFERENCES `thietbiquanlycuanhanvien` (`maThietBi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mtp_pycsc_key` FOREIGN KEY (`maTruongPhong`) REFERENCES `phongban` (`maTruongPhong`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD CONSTRAINT `maNhanVien` FOREIGN KEY (`maTruongPhong`) REFERENCES `nhanvien` (`maNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `thietbiquanlycuanhanvien`
--
ALTER TABLE `thietbiquanlycuanhanvien`
  ADD CONSTRAINT `maNhanVienQuanLy_key` FOREIGN KEY (`maNhanVienQuanLy`) REFERENCES `nhanvien` (`maNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `maThietBi` FOREIGN KEY (`maThietBi`) REFERENCES `thietbi` (`maThietBi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
