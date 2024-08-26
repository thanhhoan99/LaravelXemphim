-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 07:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webphim_tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `position`) VALUES
(1, 'Phim Bộ', 'AD', 1, 'phim-bo', 0),
(2, 'Phim Lẻ', 'phim lẻ', 1, 'phim-le', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Việt Nam', 'vn', 1, 'Việt Nam'),
(2, 'Mỹ', 'm', 1, 'Mỹ'),
(3, 'Thái Lan', 'a', 1, 'Thái Lan'),
(4, 'Hàn Quốc', 'h', 1, 'Hàn Quốc');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `linkphim` varchar(255) NOT NULL,
  `episode` int(11) NOT NULL,
  `updated_at` varchar(150) NOT NULL,
  `created_at` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `linkphim`, `episode`, `updated_at`, `created_at`) VALUES
(11, 13, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/1fJlz2Muta0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-11-30 16:01:25', '2022-11-30 16:01:25'),
(13, 13, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dj7qclioH6o\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 2, '2022-11-30 16:02:58', '2022-11-30 16:02:58'),
(14, 10, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dj7qclioH6o\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-11-30 16:22:38', '2022-11-30 16:22:38'),
(15, 10, '<p><iframe allowfullscreen frameboder=\"0\"  height=\"360\" scrolling=\"0\" src=\"https://short.ink/laFhd6T5P\" witdh=\"100%\"></iframe></p>', 2, '2022-11-30 16:22:49', '2022-11-30 16:22:49'),
(16, 13, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZtcMh-HGY_I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 3, '2022-12-01 23:11:29', '2022-12-01 23:11:29'),
(17, 13, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZtcMh-HGY_I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 4, '2022-12-01 23:13:18', '2022-12-01 23:13:18'),
(18, 8, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZtcMh-HGY_I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-12-01 23:17:18', '2022-12-01 23:17:18'),
(20, 16, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" scrolling=\"0\" src=\"https://short.ink/ 86yn9ugy03ak\" width=\"100%\">  </iframe></p>', 1, '2022-12-20 12:21:42', '2022-12-20 12:21:42'),
(21, 15, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/3968160959147\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 1, '2022-12-07 13:45:33', '2022-12-07 13:45:33'),
(22, 15, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/3972833151659\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 2, '2022-12-07 13:46:13', '2022-12-07 13:46:13'),
(23, 4, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dK-Yswz6UFk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-12-08 20:51:54', '2022-12-08 20:51:54'),
(24, 18, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/4135331695266\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 1, '2022-12-20 12:37:18', '2022-12-20 12:37:18'),
(25, 2, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/3968160959147\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 1, '2022-12-16 15:38:58', '2022-12-16 15:38:58'),
(27, 18, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/4143927790242\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 2, '2022-12-20 12:38:42', '2022-12-20 12:38:42'),
(28, 19, '<iframe src=\"https://vk.com/video_ext.php?oid=759726865&id=456239181&hash=3b23b2ed1231e882\" width=\"640\" height=\"360\" frameborder=\"0\" allowfullscreen=\"1\" allow=\"autoplay; encrypted-media; fullscreen; picture-in-picture\"></iframe>', 1, '2022-12-20 12:34:14', '2022-12-20 12:34:14'),
(29, 18, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/4148548995746\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 3, '2022-12-20 12:48:33', '2022-12-20 12:48:33'),
(30, 18, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/4160080775842\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 4, '2022-12-20 12:49:23', '2022-12-20 12:49:23'),
(31, 18, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/4168658258594\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 5, '2022-12-20 12:50:21', '2022-12-20 12:50:21'),
(32, 18, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/4171027843746\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 6, '2022-12-20 12:50:51', '2022-12-20 12:50:51'),
(33, 18, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/4195790752418\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 7, '2022-12-20 12:51:30', '2022-12-20 12:51:30'),
(34, 18, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/4197539121826\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 8, '2022-12-20 12:51:59', '2022-12-20 12:51:59'),
(35, 18, '<iframe width=\"560\" height=\"315\" src=\"//ok.ru/videoembed/4723029838547\" frameborder=\"0\" allow=\"autoplay\" allowfullscreen></iframe>', 9, '2022-12-20 12:52:23', '2022-12-20 12:52:23'),
(36, 17, '<iframe src=\"https://vk.com/video_ext.php?oid=759726865&id=456239135&hash=466c2b50ce908e9b\" width=\"640\" height=\"360\" frameborder=\"0\" allowfullscreen=\"1\" allow=\"autoplay; encrypted-media; fullscreen; picture-in-picture\"></iframe>', 1, '2022-12-20 12:58:45', '2022-12-20 12:58:45'),
(37, 17, '<iframe src=\"https://vk.com/video_ext.php?oid=759726865&id=456239136&hash=2627806d3941db06\" width=\"640\" height=\"360\" frameborder=\"0\" allowfullscreen=\"1\" allow=\"autoplay; encrypted-media; fullscreen; picture-in-picture\"></iframe>', 2, '2022-12-20 12:59:22', '2022-12-20 12:59:22'),
(38, 17, '<iframe src=\"https://vk.com/video_ext.php?oid=759726865&id=456239137&hash=93045a893057b4d1\" width=\"640\" height=\"360\" frameborder=\"0\" allowfullscreen=\"1\" allow=\"autoplay; encrypted-media; fullscreen; picture-in-picture\"></iframe>', 3, '2022-12-20 13:00:03', '2022-12-20 13:00:03'),
(39, 17, '<iframe src=\"https://vk.com/video_ext.php?oid=759726865&id=456239139&hash=0f0db00ce62e0687\" width=\"640\" height=\"360\" frameborder=\"0\" allowfullscreen=\"1\" allow=\"autoplay; encrypted-media; fullscreen; picture-in-picture\"></iframe>', 4, '2022-12-20 13:00:25', '2022-12-20 13:00:25'),
(40, 17, '<iframe src=\"https://vk.com/video_ext.php?oid=759726865&id=456239140&hash=5d2a4fd001e19d0c\" width=\"640\" height=\"360\" frameborder=\"0\" allowfullscreen=\"1\" allow=\"autoplay; encrypted-media; fullscreen; picture-in-picture\"></iframe>', 5, '2022-12-20 13:00:51', '2022-12-20 13:00:51'),
(41, 17, '<iframe src=\"https://vk.com/video_ext.php?oid=759726865&id=456239141&hash=170500d3d7e25a41\" width=\"640\" height=\"360\" frameborder=\"0\" allowfullscreen=\"1\" allow=\"autoplay; encrypted-media; fullscreen; picture-in-picture\"></iframe>', 6, '2022-12-20 13:01:17', '2022-12-20 13:01:17'),
(42, 20, '<iframe src=\"https://vk.com/video_ext.php?oid=759726865&id=456239177&hash=0cb04f1ca942100c\" width=\"640\" height=\"360\" frameborder=\"0\" allowfullscreen=\"1\" allow=\"autoplay; encrypted-media; fullscreen; picture-in-picture\"></iframe>', 1, '2022-12-20 13:04:42', '2022-12-20 13:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Kinh dị', 'ad', 1, 'kinh-di'),
(2, 'Hành động', 'Hành động', 1, 'hanh-dong'),
(3, 'Hoạt hình', 'hh', 1, 'hoat-hinh'),
(4, 'Viễn tưởng', 'vt', 1, 'vien-tuong'),
(5, 'Tâm lý', 'tl', 1, 'tam-ly'),
(6, 'Phiêu lưu', 'pl', 1, 'phieu-luu'),
(7, 'Hài hước', 'hh', 1, 'hai-huoc'),
(8, 'Chiến tranh', 'ct', 1, 'chien-tranh');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phim_hot` int(11) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `name_eng` varchar(255) NOT NULL,
  `phude` int(11) NOT NULL DEFAULT 0,
  `ngaytao` varchar(150) DEFAULT NULL,
  `ngaycapnhat` varchar(150) DEFAULT NULL,
  `year` varchar(30) DEFAULT NULL,
  `thoiluong` varchar(50) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `season` int(11) DEFAULT 0,
  `trailer` varchar(255) DEFAULT NULL,
  `sotap` int(11) NOT NULL DEFAULT 1,
  `count_view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `slug`, `description`, `status`, `image`, `category_id`, `genre_id`, `country_id`, `phim_hot`, `resolution`, `name_eng`, `phude`, `ngaytao`, `ngaycapnhat`, `year`, `thoiluong`, `tags`, `topview`, `season`, `trailer`, `sotap`, `count_view`) VALUES
(1, 'NGƯỜI NHỆN: KHÔNG CÒN NHÀ', 'nguoi-nhen-khong-con-nha', 'Người Nhện: Không Còn Nhà, Spider-Man: No Way Home 2021 HD Vietsub + Thuyết minh\r\nNgười Nhện: Không Còn Nhà - Spider-Man: No Way Home, Spider-Man: No Way Home 2021 CAM Với Danh Tính Của Người Nhện Giờ đã được Tiết Lộ, Peter Nhờ Doctor Strange Giúp đỡ. Khi Một Câu Thần Chú Bị Sai, Những Kẻ Thù Nguy Hiểm Từ Các Thế Giới Khác Bắt đầu Xuất Hiện, Buộc Peter Phải Khám Phá Ra ý Nghĩa Thực Sự Của Việc Trở Thành Người Nhện.', 1, 'nguoi-nhen-khong-con-nha-58642-thumbnail-250x3504200.jpg', 2, 4, 2, 1, 4, 'Spider-Man: No Way Home (2021)', 1, NULL, '2022-11-13 20:35:52', '2021', '145 phút', NULL, 1, NULL, 'OB3g37GTALc', 1, 1111),
(2, 'NGÔI NHÀ PHỐ QUỶ', 'ngoi-nha-pho-quy', 'Ngôi Nhà Phố Quỷ\r\nPhim Ngôi Nhà Phố Quỷ sau khi bắt cóc một cô gái trẻ, những kẻ xấu nhanh chóng nhận ra sự thật kinh hoàng rằng… Có lẽ, chúng mới là những người đang gặp nguy hiểm. Bởi cô gái kia đang che giấu một bí mật vô cùng đen tối. From a House on Willow Street là bộ phim kinh dị mới nhất của đạo diễn Alastair Orr, với sự tham gia của Carlyn Burchell, Gustav Gerdener và Zino Ventura.', 1, 'anh-tvhayy-3694-200x2502724.webp', 2, 1, 3, 1, 4, 'From a House on Willow Street2016', 1, NULL, '2022-11-17 22:29:49', '2011', '145 phút', NULL, 1, NULL, NULL, 1, NULL),
(3, 'VÔ THƯỢNG THẦN ĐẾ', 'vo-thuong-than-de', 'Vô Thượng Thần Đế\r\nPHIM ĐƯỢC CẬP NHẬT MỖI THỨ 2 VÀ THỨ 6 HÀNG TUẦN Main: Tiên Vương Mục Vân 9 vợ: Mạnh Tử Mặc, Tần Mộng Dao, Diệp Tuyết Kỳ, Tiêu Doãn Nhi, Vương Tâm Nhã, Cửu Nhi, Diệu Tiên Ngữ, Minh Nguyệt Tâm, Bích Thanh Ngọc Cảnh giới: Nhục Thân-Linh Khiếu-Thông Thần-Niết Bàn-Tam Chuyển Chi cảnh-Vũ Tiên cảnh - Sinh Tử cảnhTiên giới : Nhân Tiên - Địa Tiên - Thiên Tiên - Huyền Tiên - Chân Tiên - Kim Tiên - Đại La Kim Tiên - Tiên Vương - Tiên ĐếThần giới: Hư Thần - Chân Thần - Địa Thần - Thiên Thần - Thần Quân - Thần Vương - Thần Hoàng - Thần Chủ - Tổ Thần - Hư Thánh - Bán Thánh - Hóa Thánh.Thương Lan giới: Thánh vị : Thánh Nhân- Đại Thánh-Cổ Thánh - Thánh Vương - Thánh Hoàng - Thánh Đế - Thiên Thánh Đế - Cổ Thánh ĐếQuân vị : Nhân Quân - Địa Quân - Thiên Quân - Quân Vương - Thánh Quân - Đế Quân.Tôn vị : Chí Tôn - Địa Tôn - Thiên Tôn - Thần Tôn.Giới vị : Giới Vương - Giới Hoàng - Giới Thánh - Giới Tôn - Giới Thần - Giới Chủ.Chúa Tể - Nửa bước Hóa Đế - Chuẩn Đế - xưng hào thần (xưng hào đế) - Thần Đế đại đạo ( Đạo Trụ - Đạo Đài - Đạo Hải ) - Vô Pháp - Vô Thiên - Thần Đế', 1, 'animehay-3722-200x250816.webp', 1, 3, 1, 1, 5, 'Vô Thượng Thần Đế2020', 0, NULL, '2022-11-14 15:32:20', '2018', '135 phút', NULL, 0, 2, NULL, 1, NULL),
(4, 'MỤC ĐÍCH SỐNG CỦA MỘT CHÚ CHÓ', 'muc-dich-song-cua-mot-chu-cho', 'Mục Đích Sống Của Một Chú Chó\r\nMục Đích Sống Của Một Chú Chó được chuyển thể từ tiểu thuyết ăn khách cùng tên kể về Bailey – một chú chó qua nhiều lần đầu thai, chung sống với nhiều người khác nhau trong những hoàn cảnh khác nhau để tìm hiểu mục đích sống của cuộc đời mình. Tuy nhiên người mà Bailey gắn bó nhất chính là cậu bé Ethan. Dù hàng chục năm trôi qua, trải qua bao nhiêu kiếp sống, Bailey vẫn tìm đường quay về với người chủ đầu tiên mà nó nhớ đến…', 1, 'anh-tvhayy-3702-200x250573.webp', 2, 6, 2, 1, 4, 'A Dog\'s Purpose2017', 0, NULL, '2022-12-08 20:51:16', NULL, NULL, NULL, 1, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/J9wOK_XQch4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, NULL),
(5, 'HỌC VIỆN SKYLANDERS', 'hoc-vien-skylanders', 'Học Viện Skylanders\r\nPhim hoạt hình Học Viện Skylanders do hãng Netflix sản xuất là bộ phim sẽ nói về một nhóm người hùng cùng tên với kỹ năng điêu luyện. Cùng nhau họ sẽ chiến đấu và bảo vệ những vùng đất Skyland rộng lớn, hùng vĩ khỏi quỷ dữ cũng như xây dựng lòng tin vào học viên Skylanders. Netflix đã xác nhận họ sẽ sản xuất 2 mùa đầu của tựa phim này.\r\n\r\nPhim Học Viện Skylanders – Skylanders Academy 12 tập lồng tiếng 2016.', 1, 'anh-tvhayy-3446-200x2501546.webp', 1, 4, 2, 1, 0, 'Skylanders Academy2016', 0, NULL, '2022-11-08 22:48:40', '2013', '145 phút', NULL, 2, NULL, NULL, 1, NULL),
(6, 'KHÁM PHÁ VŨ TRỤ', 'kham-pha-vu-tru', 'Khám Phá Vũ Trụ\r\nKhám Phá Vũ Trụ là bộ phim truyền hình phim tài liệu tìm hiểu những vấn đề khoa học xoay quanh vũ trụ (Big Bang, Mặt trời, các hành tinh, lỗ đen, thiên hà khác, Astrobiology…) bằng công nghệ đồ họa máy tính CGI mới nhất, các dữ liệu cùng các cuộc phỏng vấn với những chuyên gia nghiên cứu trong lĩnh vực vũ trụ học, thiên văn học, và vật lý thiên văn.', 1, 'anh-tvhayy-3438-200x2506989.webp', 1, 6, 2, 1, 0, 'The Universe2007', 1, NULL, '2022-11-08 22:48:17', '2016', '45 phút', NULL, 1, NULL, NULL, 1, NULL),
(7, 'BỖNG DƯNG TRÚNG SỐ', 'bong-dung-trung-so', 'Bỗng Dưng Trúng Số – 6/45 là một bộ phim Hàn Quốc năm 2022 của đạo diễn Park Gyu-tae, với sự tham gia của Go Kyung-pyo, Lee Yi-kyung, Eum Moon-suk, Park Se-wan và Kwak Dong-yeon. Bộ phim mô tả cuộc gặp gỡ hài hước giữa những người lính Nam và Bắc Triều Tiên qua giải xổ số 5,7 tỷ won vượt qua Ranh giới quân sự trong gió.\r\n\r\nNgười lính Hàn Quốc Chun Woo (Ko Kyoung-pyo) vô tình nhặt được tờ vé số trúng độc đắc trị giá lên đến gần 6 triệu đô! Nhưng chưa kịp vui mừng bao lâu, tờ vé số ấy không may bị cuốn bay sang bên kia biên giới và rơi vào tay anh lính Triều Tiên Yong Ho (Lee Yi-kyung). Chun Woo cần tờ vé số để đổi tiền, trong khi Yong Ho dù nắm giữ tờ vé quan trọng lại không thể đặt chân đến Hàn Quốc. Câu chuyện ngày càng trở nên rắc rối và hài hước khi có thêm những người đồng đội của hai anh chàng biết được sự việc và nhất quyết tham gia vào cuộc đàm phán chia tiền.', 1, 'bong-dung-trung-so-thumb3964.jpg', 1, 7, 4, 1, 4, '6/45 (2022)', 1, NULL, '2022-11-13 19:27:23', '2004', '135 phút', 'Bỗng Dưng Trúng Số', 0, NULL, '1AcRyEcNEno', 12, NULL),
(8, 'Kẻ Săn Tiền Thưởng', 'ke-san-tien-thuong', 'Hàng loạt cảnh sát trở thành con mồi của một băng đảng sát thủ chuyên nghiệp. Trò chơi giết chóc ngày càng tàn bạo và điên cuồng nhưng tung tích của bọn chúng vẫn là ẩn số. Gã thám tử săn tiền thưởng là hy vọng cuối cùng để cảnh sát giành lại thế thượng phong. Bộ phim hành động cực kỳ hấp dẫn!', 1, 'ke-san-tien-thuong1789.jpg', 2, 4, 2, 1, 4, '- Cop Hunt - Cop Mortem (2016)', 1, '2022-10-31 21:07:06', '2022-11-09 21:40:40', '2016', '135 phút', 'Kẻ Săn Tiền Thưởng', 1, 4, NULL, 1, NULL),
(9, 'LỜI MỜI ĐẾN ĐỊA NGỤC', 'loi-moi-den-dia-nguc', 'Lời Mời Đến Địa Ngục - The Invitation, kể về câu chuyện của cô gái tên Evie, sau khi mẹ mất Evie hỉ còn một mình. Cho đến khi cô đi xét nghiệm DNA và phát hiện mình có một người em họ thất lạc. Sau đó cô được gia đình em họ mời tham dự đám cưới sang trọng. Tại đây cô gặp một anh chàng điển trai và có tình cảm với anh ấy. Nhưng không ngờ Evie lại đang rơi vào cạm bẫy của quỷ dữ lúc nào không h', 1, 'Lien-Ket-Van-Menh99.jpg', 1, 5, 2, 1, 2, 'The Invitation (2022)', 1, '2022-11-08 22:37:44', '2022-11-13 14:47:31', NULL, '135 phút', 'Lời Mời Đến Địa Ngục -', 1, 0, NULL, 12, NULL),
(10, 'BIỆT THỰ ĐOẠT MỆNH', 'biet-thu-doat-menh', 'Phim Biệt Thự Đoạt Mệnh | The Villa of Death – Full HD – Trung Quốc 2018 phim kinh dị Diễn biến chính của bộ phim xoay quanh một gia đình đang cố gắng để sinh tồn trong thế giới hậu tận thế bởi ở đây có một loại sinh vật ngoài hành tinh tuy mù nhưng có thính lực vô cùng nhạy bén. Cách duy nhất để ẩn nấp khỏi chúng đó là không bao giờ được phát ra tiếng động nếu muốn sống sót.', 1, 'Biet-Thu-Doat-Menh2285.jpg', 1, 5, 1, 1, 4, 'THE VILLA OF DEATH (2018)', 1, '2022-11-09 22:09:29', '2022-11-24 13:23:22', '2014', '145 phút', 'Phim Biệt Thự Đoạt Mệnh | The Villa of Death – Full HD – Trung Quốc 2018 t.', NULL, 0, NULL, 7, NULL),
(13, 'VÌ SAO ĐƯA ANH TỚI', 'vi-sao-dua-anh-toi', 'Phim Vì sao đưa anh tới nói về câu chuyện tình yêu lãng mạn giữa chàng trai ngoài hành tinh từ thời Chosun cách đây 400 năm và nữ diễn viên ngôi sao hàng đầu. Phim lấy bối cảnh từ năm 1609 - năm trị vì đầu tiên của vua Kwang Hae, nội dung dựa trên sự kiện phát hiện vật thể bay không xác định năm 1609 được ghi chép trong Biên niên sử triều đại Joseon.', 1, 'víao4375.jpg', 1, 7, 4, 1, 4, 'You Who Came from the Stars (2013)', 1, '2022-11-14 15:51:33', '2022-11-19 13:17:59', '2016', '60 phút', NULL, 1, 0, NULL, 21, NULL),
(15, 'Luật sư 1000w', 'luat-su-1000w', 'ádsadasd', 1, '450_600_68204_luat-su-1000-won615.jpg', 1, 7, 4, 1, 4, 'A Dog\'s Purpose2017', 1, '2022-11-25 15:20:34', '2022-12-07 13:44:18', NULL, '45 phút', NULL, NULL, 0, NULL, 12, 64565),
(16, 'Công phu Gấu Trúc (2008)', 'cong-phu-gau-truc-2008', 'Po là một chú gấu trúc to béo, ham ăn và mê môn võ kungfu. Trong một ngày hội, lời tiên tri từ xưa đã giúp Po có thể thực hiện ước mơ của mình. Po được học với sư phụ Shifu và nhóm Ngũ Hùng. Nhưng vấn đề ở chỗ cậu chàng lại là kẻ lười biếng nhất thung lũng Thanh Bình. Và rồi mọi chuyện hoàn toàn thay đổi khi con báo tuyết gian ác Tai Lung trốn thoát khỏi tù. Hắn ráo riết lên kế hoạch tấn công thung lũng. Và người anh hùng được chọn để chiến đấu chống lại Tai Lung, không ai khác chính là Po béo. Một đội ngũ hùng hậu những bậc thầy kungfu được huy động để hướng dẫn Po những miếng võ cơ bản nhất…', 1, 'xCn3VOST64XpOA8x0gaQkQiZtZY9520.jpg', 2, 7, 2, 1, 0, 'Kung Fu Panda', 1, '2022-12-07 13:18:01', '2022-12-07 13:37:56', NULL, '1 giờ 32 phút', NULL, 0, 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dtXlFn04Q-4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 60263),
(17, 'LIÊN KẾT VẬN MỆNH', 'lien-ket-van-menh', 'Liên Kết Vận Mệnh kể câu chuyện về một loài người bất tử mới có tên là \'Connect\'. Jung Hae In đóng vai Ha Dongsoo, người thuộc loài người mới này. Một ngày nọ, anh bị một nhóm buôn bán nội tạng người bắt cóc. Một bên mắt của anh ta đã bị cướp đi và cấy ghép cho một kẻ giết người hàng loạt. Kể từ đó, anh có thể nhìn thấy những gì kẻ giết người hàng loạt này nhìn thấy. Anh đuổi theo kẻ giết người hàng loạt để ngăn hắn giết thêm người nữa.', 1, 'Lien-Ket-Van-Menh6931.jpg', 1, 5, 4, 1, 4, 'Connect (2022)', 1, '2022-12-09 12:26:32', '2022-12-09 12:26:32', NULL, '60 Phút', 'xem phim Liên Kết Vận Mệnh vietsub, phim Connect vietsub, xem Liên Kết Vận Mệnh vietsub online tap 1, tap 2, tap 3, tap 4, phim Connect ep 5, ep 6, ep 7, ep 8, ep 9, ep 10, xem Liên Kết Vận Mệnh review Liên Kết Vận Mệnh netflix, Liên Kết Vận Mệnh', 2, 0, NULL, 6, 65625),
(18, 'Cậu Út Nhà Tài Phiệt', 'cau-ut-nha-tai-phiet', 'Sau mười năm, một nhân viên trung thành bị buộc tội tham ô, sau đó bị chủ của mình sát hại, chỉ để được tái sinh thành con trai út của họ, với khao khát trả thù dẫn đến sự tiếp quản thù địch của anh ta.', 1, 'cauut4687.jpg', 1, 5, 4, 1, 4, 'Reborn Rich', 1, '2022-12-09 12:32:02', '2022-12-09 12:38:08', NULL, '120 Phút', 'Cậu Út Nhà Tài Phiệt Reborn Rich', 1, 0, NULL, 16, 11820),
(19, 'Avatar 2: Dòng Chảy Của Nước', 'avatar-2-dong-chay-cua-nuoc', 'Sau avatar 1 Hai nhân vật chính, Jake Sully và Neytiri, giờ đã thành đôi, nguyện sẽ ở bên nhau. Tuy nhiên, cả hai buộc phải rời khỏi nhà và khám phá những miền đất mới trên mặt trăng Pandora, cũng chính là lúc những mối nguy cũ trở lại với họ.', 1, 'avatar-2-dong-chay-cua-nuoc-thumb5691.jpg', 2, 5, 2, 1, 4, 'Avatar 2', 1, '2022-12-20 11:56:12', '2022-12-20 11:56:12', NULL, '3:02:22', 'Sau avatar 1 Hai nhân vật chính, Jake Sully và Neytiri,', NULL, 0, NULL, 1, 97137),
(20, 'Mồi Quỷ Dữ', 'moi-quy-du', 'Mồi Quỷ Dữ xoay quanh sơ Ann (do Jacqueline Byers thủ vai) bị kéo vào một cuộc chiến tại một Nhà Thờ Công Giáo trước thế lực quỷ ám đang ngày một hùng mạnh. Với khả năng chiến đấu với quỷ dữ, sơ Ann được phép thực hiện các buổi trừ tà dẫu cho các luật lệ xưa cũ chỉ cho phép Cha xứ thực hiện công việc này. Cùng với Cha Dante, sơ Ann chạm mặt một con quỷ dữ đang cố chiếm lấy linh hồn của một cô gái trẻ, và cũng có thể là kẻ đã ám lấy người mẹ quá cố của sơ. Sơ Ann dần nhận ra mối nguy đang đe dọa mình khủng khiếp thế nào, và cả lý do con quỷ dữ đó khao khát đoạt mạng cô.', 1, 'moi-quy-du-prey-for-the-devil88.jpg', 2, 4, 3, 1, 0, 'Prey For The Devil (2022)', 1, '2022-12-20 13:04:33', '2022-12-20 13:04:33', NULL, '1:33:07 Phút', 'Mồi Quỷ Dữ xoay quanh sơ Ann (do Jacqueline Byers thủ vai)', 2, 0, 'https://youtu.be/1DmNc8KKZ8g', 1, 52776);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(1, 9, 1),
(2, 9, 5),
(3, 8, 2),
(4, 7, 5),
(5, 7, 7),
(6, 6, 2),
(7, 6, 4),
(8, 6, 5),
(9, 6, 6),
(10, 5, 2),
(11, 5, 3),
(12, 5, 4),
(13, 7, 6),
(14, 8, 4),
(20, 10, 1),
(21, 10, 2),
(22, 10, 5),
(23, 1, 2),
(24, 1, 4),
(25, 2, 1),
(26, 3, 3),
(27, 13, 2),
(28, 13, 5),
(29, 13, 7),
(30, 4, 5),
(31, 4, 6),
(33, 15, 5),
(34, 15, 7),
(35, 16, 2),
(36, 16, 3),
(37, 16, 5),
(38, 16, 7),
(39, 17, 2),
(40, 17, 4),
(41, 17, 5),
(42, 18, 2),
(43, 18, 5),
(44, 19, 1),
(45, 19, 2),
(46, 19, 4),
(47, 19, 5),
(48, 20, 1),
(49, 20, 2),
(50, 20, 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rating`, `movie_id`, `ip_address`) VALUES
(2, 4, 1, '::1'),
(3, 2, 3, '::1'),
(4, 2, 13, '::1'),
(5, 4, 20, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Thanh Hoan', 'thanhhoan0908@gmail.com', NULL, '$2y$10$ToBiiZz0tSUM4AtkphcT7e69LI5kf8PnshUa1w0f4qizj0lVfViY2', 'efRimB6si6FJs3fGvmcb00WwbfD4lDIejTkqYgftLKbEfJtjjtiKvJ0LcCPx', '2022-10-31 07:03:51', '2022-10-31 07:03:51'),
(9, 'Admin', 'thanhhoan7878647@gmail.comd', NULL, '$2y$10$lvfUV1NKeII1gr7JY9lltex25RS.V1UGzAD2LSvmwq1FagC1WOXbO', NULL, '2022-12-07 01:22:48', '2022-12-07 01:22:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
