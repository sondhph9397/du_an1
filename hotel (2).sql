-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 02, 2020 lúc 10:57 AM
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
-- Cơ sở dữ liệu: `hotel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `checkin_date` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `adults` varchar(255) DEFAULT NULL,
  `chidren` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `rely_by` int(11) DEFAULT NULL,
  `reply_message` varchar(255) DEFAULT NULL,
  `checked_in` varchar(255) DEFAULT NULL,
  `check_in_date` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `feedback_room` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `reply_by` int(11) DEFAULT NULL,
  `reply_content` varchar(255) DEFAULT NULL,
  `reply_for` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custom_feedback`
--

CREATE TABLE `custom_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `short_desc` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `author_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `                id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `img_url` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `short_desc` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `adults` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `featrue_image`, `status`, `short_desc`, `about`, `adults`, `children`) VALUES
(24, 'Vip', 'public/admin/img/5e7f105fe9983-lmht-skt-chinh-thuc-chieu-mo-duoc-khan-va-haru1542882349.jpg', 'INACTIVE', 'LARGE CAFE', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralizd of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bounds toOn the other hand, we denounce wi', NULL, NULL),
(25, 'dohongon', 'public/admin/img/5e7f0d66de53c-ten-nhan-vat-game-audition-5.jpg', 'ACTIVE', 'LARGE CAFE', 'On the other hand, we denounce with righteous ini', 1, 1),
(32, 'Sơn', 'public/admin/img/5e82fcb9c8704-INSIDE-1.jpg', 'INACTIVE', 'Spwn', 'Sơn', 1, 1);

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
(12, 'fdfsdgsdg', '65', 'than@gmail.com', '$2y$10$P.o0MF2LI88MmW4M5XfGxeV7uB/XtS.rbVGHW8F2v58PJxfkYCth.', '1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `web_setting`
--

CREATE TABLE `web_setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title_hotel` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `small-logo` varchar(255) NOT NULL,
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

INSERT INTO `web_setting` (`id`, `name`, `title_hotel`, `logo`, `small-logo`, `hotline`, `map_url`, `email`, `background_img`, `slogan`, `slogan_author`, `intro_youtube_url`, `intro_content`, `about_page_title`, `about_page_content`) VALUES
(2, 'HOTEL KINGCLUB', 'PERFECT HOTEL', 'logo.png', 'banner-logo.png', '807 302 2186', 'Green lake, Hotel plaza\r\nnew york, USA', 'mail@domain.com', 'banner-bg.jpg', 'content here making look like readable English. Many desktop publishing packages and apage editors now use Lorem Ipsum as their default point of using is that it has a more or less normal distribution of letters, as opposed to using content here', 'sign.jpg', 'https://www.youtube.com/watch?v=hEq2qDKYe3s', NULL, NULL, NULL);

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
  ADD PRIMARY KEY (`                id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `custom_feedback`
--
ALTER TABLE `custom_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `home_galleries`
--
ALTER TABLE `home_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `                id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `room_service`
--
ALTER TABLE `room_service`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
