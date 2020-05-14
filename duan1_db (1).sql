-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 14, 2020 lúc 02:37 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `check_out` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `room_stype` varchar(255) NOT NULL DEFAULT '''NULL''',
  `room_id` int(11) DEFAULT NULL,
  `adults` varchar(255) DEFAULT NULL,
  `children` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `reply_by` varchar(255) DEFAULT NULL,
  `reply_message` varchar(255) DEFAULT NULL,
  `feedback_room` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`id`, `check_in`, `check_out`, `name`, `email`, `room_stype`, `room_id`, `adults`, `children`, `total_price`, `created_date`, `reply_by`, `reply_message`, `feedback_room`) VALUES
(71, '2020-05-13', '2020-05-14', 'Sơn', 'son@gmail.com', 'Phòng Coupper', 24, '1', '1', '150', NULL, 'Sơn', 'Cảm ơn đã', NULL),
(72, '2020-05-14', '2020-05-16', 'Sơn', 'son@gmail.com', 'Phòng không có ghế tình yêu', 24, '1', '1', '300', NULL, NULL, NULL, NULL),
(73, '2020-05-14', '2020-05-16', 'Sơn', 'son@gmail.com', 'Phòng không có ghế tình yêu', 24, '1', '1', '300', NULL, NULL, NULL, NULL),
(76, '2020-05-14', '2020-05-15', 'Sơn', 'son@gmail.com', 'Phòng Vip', 36, '1', '1', '125', NULL, NULL, NULL, NULL),
(89, '2020-05-14', '2020-05-15', 'Sơn', 'son@gmail.com', 'Phòng Coupper', 24, '1', '1', '150', NULL, NULL, NULL, NULL),
(90, '2020-05-14', '2020-05-16', 'Sơn', 'son@gmail.com', 'Phòng Coupper', 24, '1', '1', '300', NULL, NULL, NULL, NULL),
(91, '2020-05-14', '2020-05-15', 'Sơn', 'son@gmail.com', 'Phòng Coupper', 24, '1', '1', '150', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `reply_by` int(11) DEFAULT NULL,
  `reply_for` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `status`, `reply_by`, `reply_for`, `created_at`) VALUES
(28, 'Son', 'son@gmail.com', '0123456789', '1', 1, 15, '28', '2020-04-26 16:47:04'),
(35, 'Son', 'sondhph09397@fpt.edu.vn', '0123456789', 'a', 1, 15, '35', '2020-04-27 06:55:04'),
(39, 'Son', 'son@gmail.com', '0123456789', 'ádasd', 1, 5, '39', '2020-05-06 08:46:28'),
(42, 'Son', 'sondhph09397@fpt.edu.vn', '0123456789', '11', 1, 0, '42', '2020-05-13 15:31:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custom_feedback`
--

CREATE TABLE `custom_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `custom_feedback`
--

INSERT INTO `custom_feedback` (`id`, `name`, `email`, `rating`, `comment`) VALUES
(10, 'Son', 'son@gmail.com', 0, 'Phòng rất đẹp và sạch sẽ, dịch vụ hàng đầu, sẽ ủng hộ sau');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `home_galleries`
--

CREATE TABLE `home_galleries` (
  `id` int(11) NOT NULL,
  `img_text` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `img_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `featrue_image` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `featrue_image`, `content`, `created_at`) VALUES
(2, 'Sơn', 'public/admin/img/5eb2893055ddf-lenovo-ideapad-s145-15iwl-i5-8265u-8gb-256gb-mx110-19-600x600.jpg', '2134wdsfhsahdjfjlkasldfhasdjhfhajskdfhjasdhfjahljksfdhjasdlkfajhsdkfhajksdfhkjask', '2020-05-08'),
(3, 'What is Lorem Ipsum?', 'public/admin/img/5eb28ebb0a64a-blackberry-evolve-black-400x460.png ', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a', '2020-05-08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `our_team`
--

CREATE TABLE `our_team` (
  `  id` int(11) NOT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twiter_url` varchar(255) DEFAULT NULL,
  `linked_in_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`) VALUES
(1, 'Người Dùng', '1'),
(2, 'Nhân Viên', '1'),
(3, 'Supper ADMIN', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_galleries`
--

CREATE TABLE `room_galleries` (
  `id` int(11) NOT NULL,
  `room_id` varchar(255) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room_galleries`
--

INSERT INTO `room_galleries` (`id`, `room_id`, `img_url`) VALUES
(11, 'Phòng Coupper', 'public/admin/img/5e992c8d2c4ca-dich-vu-ghep-anh-chuyen-nghiep-hpconnect-2.jpg'),
(12, 'Phòng tình yêu', 'public/admin/img/5ebbd034d2727-anh-dep-chup-dien-thoai.jpg'),
(13, 'Phòng không có ghế tình yêu', 'public/admin/img/5e992ca05ffe3-dich-vu-ghep-anh-chuyen-nghiep-hpconnect-2.jpg'),
(16, 'Phòng Vip', 'public/admin/img/5ebbd9b0aa36e-samsung-galaxy-a70-vantay.jpg'),
(17, 'Phòng tình yêu', 'public/admin/img/5ebbd9bb528d1-dong-ho-apple-watch-3-phien-ban-42-mm-nutbam.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_service`
--

CREATE TABLE `room_service` (
  `room_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_types`
--

CREATE TABLE `room_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `featrue_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `price` int(255) NOT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `adults` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `featrue_image`, `status`, `price`, `short_desc`, `about`, `adults`, `children`) VALUES
(24, 'Phòng Coupper', 'public/admin/img/5e992d269e8ba-anh-dep-chup-dien-thoai.jpg', 'ACTIVE', 150, 'LARGE CAFE', 'On sdsafasfdasdfasfdasdfasdfa', 1, 1),
(34, 'Phòng tình yêu', 'public/admin/img/5e9935442093f-anh-dep-chup-dien-thoai.jpg', 'ACTIVE', 250, 'LARGE CAFE', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralizd of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bounds toOn the other hand, we denounce', 1, 1),
(35, 'Phòng không có ghế tình yêu', 'public/admin/img/5ea457286c226-anh-dep-chup-dien-thoai.jpg', 'ACTIVE', 150, 'LARGE CAFE', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralizd of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bounds toOn the other hand, we denounce', 1, 1),
(36, 'Phòng Vip', 'public/admin/img/5ebbfe36648e0-dong-ho-apple-watch-3-phien-ban-42-mm-nutbam.jpg', 'ACTIVE', 125, 'LARGE CAFE', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralizd of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bounds toOn the other hand, we denounce', 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_position` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `number_phone`, `email`, `password`, `status`, `role_id`) VALUES
(5, 'Sơn', '123123123123', 'son@gmail.com', '$2y$10$fFhWJhzJcQMfiAoeL7337uNVb.lFSUxlhiWyauAoewVOGKAU7e4Yi', '1', 3),
(12, 'than', '65123123', 'than@gmail.com', '$2y$10$P.o0MF2LI88MmW4M5XfGxeV7uB/XtS.rbVGHW8F2v58PJxfkYCth.', '1', 1),
(15, 'Son', '1234567890', 'sonn@gmail.com', '$2y$10$3jxwNh/s/mHn5ekZC9hH/.1y7L5lb2xAvuWo5H2fR3K/mamYUq1ca', '1', 1),
(17, 'Sonn', '1234567890', 'son2@gmail.com', '$2y$10$SaIGrcwqA30eWnzH.7Sw4uIZMvrLPv/wiEzCPZUlL9K5g0WNCEsvi', '1', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `web_setting`
--

CREATE TABLE `web_setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title_hotel` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `small_logo` varchar(255) DEFAULT NULL,
  `hotline` varchar(255) DEFAULT NULL,
  `map_url` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `background_img` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `slogan_author` varchar(255) DEFAULT NULL,
  `intro_youtube_url` varchar(255) DEFAULT NULL,
  `intro_content` varchar(255) DEFAULT NULL,
  `about_page_title` varchar(255) DEFAULT NULL,
  `about_page_content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `web_setting`
--

INSERT INTO `web_setting` (`id`, `name`, `title_hotel`, `logo`, `small_logo`, `hotline`, `map_url`, `email`, `background_img`, `slogan`, `slogan_author`, `intro_youtube_url`, `intro_content`, `about_page_title`, `about_page_content`) VALUES
(2, 'HOTEL KINGCLUB', 'PERFECT HOTEL', 'public/admin/img/5ebcdbe533764-logo.png', 'public/admin/img/5ebcdbe533d4f-banner-logo.png', '807 302 2186', 'Green lake, Hotel plazanew york, USA', 'mail@domain.com', 'public/admin/img/5ebcdbe534387-banner-bg-2.jpg', 'content here making look like readable English. Many desktop publishing packages and apage editors now use Lorem Ipsum as their default point of using is that it has a more or less normal distribution of letters, as opposed to using content here', 'public/admin/img/5ebcdbe534646-sign.jpg', 'https://www.youtube.com/watch?v=hEq2qDKYe3s', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `custom_feedback`
--
ALTER TABLE `custom_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `home_galleries`
--
ALTER TABLE `home_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`  id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room_galleries`
--
ALTER TABLE `room_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room_service`
--
ALTER TABLE `room_service`
  ADD PRIMARY KEY (`room_id`,`service_id`);

--
-- Chỉ mục cho bảng `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `custom_feedback`
--
ALTER TABLE `custom_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `home_galleries`
--
ALTER TABLE `home_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `our_team`
--
ALTER TABLE `our_team`
  MODIFY `  id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `room_galleries`
--
ALTER TABLE `room_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `room_service`
--
ALTER TABLE `room_service`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
