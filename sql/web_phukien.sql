-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2022 lúc 05:53 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_phukien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `qty`) VALUES
(4, 'Củ sạc Anker 20W hỗ trợ sạc nhanh', 299000, '10050768-sac-nhanh-anker-powerport-iii-nano-20w-a2633-trang-1.jpg', 1),
(7, 'Củ sạc Baseus 20W công nghệ SI', 150000, '600c9e57bf3dfabf9d72cb987c1efc08.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Cáp sạc', 1),
(2, 'Củ sạc', 1),
(4, 'Ốp', 1),
(10, 'Dán PPF', 1),
(11, 'Kính cường lực', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `phone`, `email`) VALUES
(1, 'kien', '123456', '123456789', 'backien2k2@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `phuong` varchar(255) NOT NULL,
  `thanhpho` varchar(255) NOT NULL,
  `total_products` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `diachi`, `phuong`, `thanhpho`, `total_products`, `total_price`) VALUES
(4, 'Việt long', 2147483647, 'admin@gmail.com', 'cash on delivery', '140add', 'my dinh', 'ha noi', 0, 449000),
(5, 'Việt long', 2147483647, 'admin@gmail.com', 'cash on delivery', '140add', 'my dinh', 'ha noi', 0, 449000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(300) NOT NULL,
  `qty` int(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `cateid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `image`, `qty`, `description`, `cateid`) VALUES
(14, 'Củ sạc Baseus 20W công nghệ SI', 150000, '600c9e57bf3dfabf9d72cb987c1efc08.jpg', 50, 'Adapter Cóc củ sạc type c sạc nhanh 20W chuẩn PD 3.0 Type-C hiệu Baseus Super Si trang bị chip sạc thông minh cho iPhone 12 / iPad Pro 2020 / Samsung / Oppo / Huawei / Vivo (phiên bản đầu cắm US-UK) - Hàng nhập khẩu', 2),
(15, 'Củ sạc Anker 20W hỗ trợ sạc nhanh', 299000, '10050768-sac-nhanh-anker-powerport-iii-nano-20w-a2633-trang-1.jpg', 50, 'Công suất 20W sạc cực nhanh\r\nSiêu nhỏ gọn dễ dàng mang theo\r\nCông nghệ Power IQ 3.0', 2),
(16, 'Cáp sạc Baesus 100W C to C ', 150000, 'pd-100-1.jpg', 1000, 'Baseus AL91 Hai đầu Type-C, dễ dàng sử dụng và chuyển đổi\r\nChất liệu vỏ polyester không hút ẩm, chống nước, chống bụi, chống cháy và chống kéo giãn\r\nTốc độ truyền dữ liệu Baseus AL91 : 480Mbps, có thể vừa sạc và truyền dữ liệu cùng lúc\r\nBaseus AL91 giúp bạn dễ dàng sử dụng vào ban đêm. Hỗ trợ chuâ', 1),
(17, 'Cáp Bagi C to Lightning dây dù dài 1.5CM', 99000, 'cap-sac-nhanh-pd-i120-10.jpg', 50, 'Cổng kết nối: Type-C ra Lightning, sạc và truyền dữ liệu nhanh chóng. Hỗ trợ tính năng sạc nhanh trên iPhone 8/ 8 Plus/ iPhone X, Xs max, 11 promax, 12…. Độ dài dây: 1.2 m. Công suất tối đa: 18 W. Tương thích : Apple iPhone / iPad/ Mac….. Chất liệu: Bọc dây dù, siêu bền chắc, chịu được áp lực căng c', 1),
(18, 'Cáp sạc Baesus 100W C to C ', 150000, 'pd-100-1.jpg', 1000, 'Baseus AL91 Hai đầu Type-C, dễ dàng sử dụng và chuyển đổi\r\nChất liệu vỏ polyester không hút ẩm, chống nước, chống bụi, chống cháy và chống kéo giãn\r\nTốc độ truyền dữ liệu Baseus AL91 : 480Mbps, có thể vừa sạc và truyền dữ liệu cùng lúc\r\nBaseus AL91 giúp bạn dễ dàng sử dụng vào ban đêm. Hỗ trợ chuâ', 1),
(19, 'Củ sạc Mophie 409905679 Đen', 250000, '10046899-cu-sac-mophie-den-409905679-2_y3hk-1v.jpg', 50, 'Tích hợp công nghệ sạc nhanh Power Delivery 18W, Trang bị cổng sạc USB-C phù hợp với nhiều thiết bị, Đạt chứng nhận về các tiêu chuẩn an toàn từ châu Âu.', 2),
(20, 'Kính cường lục ', 50000, '85e8c338e89ceeeea27f1051309cdfd0.jpg', 50, 'Độ mỏng : 0.22mm\r\nĐộ cứng 9H, cứng gấp chục lần so với các sản phẩm khác\r\nĐộ trong suốt đạt chuẩn HD, sáng bóng (Điểm chất lượng vượt trội so với phần còn lại)\r\nChống va đập cực mạnh, cào cấu, va chấn, bao trầy', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'kien', '123@gmail.com', '12345'),
(2, 'longkaka', 'abc@gmail.com', '12345');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cateid` (`cateid`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`cateid`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
