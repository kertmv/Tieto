-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 12:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tieto`
--

-- --------------------------------------------------------

--
-- Table structure for table `asukohad`
--

CREATE TABLE `asukohad` (
  `keskminehinnang` int(11) NOT NULL,
  `hinnangarv` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nimi` text NOT NULL,
  `asukoht` varchar(255) NOT NULL,
  `tyybid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asukohad`
--

INSERT INTO `asukohad` (`keskminehinnang`, `hinnangarv`, `id`, `nimi`, `asukoht`, `tyybid`) VALUES
(4, 2, 1, 'Youopia', 'Serrana', 'hotell'),
(0, 0, 2, 'Camimbo', 'Maliq', 'soogikoht'),
(4, 2, 3, 'Dynazzy', 'Jiyizhuang', 'motell'),
(2, 2, 4, 'Pixonyx', 'Karawatung', 'pood'),
(6, 4, 5, 'Fatz', 'Privodino', 'hostel'),
(7, 3, 7, 'Quamba', 'Amuntai', 'soogikoht'),
(0, 0, 8, 'Meevee', 'Kentongan', 'motell'),
(3, 2, 9, 'Yacero', 'Le Pontet', 'pood'),
(0, 0, 10, 'Yambee', 'Thị Trấn Tủa Chùa', 'hostel'),
(5, 2, 11, 'LiveZ', 'Oujda', 'hotell'),
(6, 2, 12, 'Dabvine', 'Kuantan', 'soogikoht'),
(1, 1, 13, 'Wikido', 'Puerto Colombia', 'motell'),
(0, 0, 14, 'Bubblebox', 'Seboruco', 'pood'),
(0, 0, 15, 'Yambee', 'Lófos', 'hostel'),
(3, 1, 16, 'Realfire', 'Ambunti', 'hotell'),
(2, 1, 17, 'Vimbo', 'Syntul', 'soogikoht'),
(0, 0, 18, 'Jetpulse', 'Zhendu', 'motell'),
(3, 2, 19, 'Zooxo', 'Watangan', 'pood'),
(2, 1, 20, 'Aimbo', 'Obonoma', 'soogikoht'),
(0, 0, 21, 'Topiczoom', 'Gabi', 'hotell'),
(2, 1, 22, 'Jaxnation', 'Qiaozhuang', 'soogikoht'),
(6, 1, 23, 'Photofeed', 'Tullyallen', 'motell'),
(6, 1, 24, 'Jaxspan', 'Kalininaul', 'pood'),
(4, 2, 25, 'Skiptube', 'Dioila', 'hostel'),
(6, 1, 26, 'Yotz', 'Psevdás', 'hotell'),
(5, 1, 27, 'Jaxnation', 'Cibiru', 'soogikoht'),
(3, 1, 28, 'Vitz', 'Wangkung', 'motell'),
(4, 1, 29, 'Edgeclub', 'Dunmanway', 'pood'),
(0, 0, 30, 'Tazz', 'Blois', 'hostel'),
(0, 0, 31, 'Skyba', 'Alakak', 'hotell'),
(3, 1, 32, 'Realcube', 'Caibiran', 'soogikoht'),
(0, 0, 33, 'Skiptube', 'Arcoverde', 'motell'),
(6, 2, 34, 'Dabtype', 'Chom Bueng', 'pood'),
(0, 0, 35, 'Zoomdog', 'Nijemci', 'hostel'),
(6, 2, 36, 'Quinu', 'Nunhala', 'hotell'),
(5, 1, 37, 'Devify', 'Dolna Banya', 'soogikoht'),
(7, 1, 38, 'Jaxspan', 'Campok', 'motell'),
(0, 0, 39, 'Quaxo', 'Cafayate', 'pood'),
(2, 2, 40, 'Zoombox', 'Seia', 'hostel'),
(1, 1, 41, 'Cogidoo', 'Maguling', 'hotell'),
(0, 0, 42, 'Blogpad', 'Podgorenskiy', 'soogikoht'),
(0, 0, 43, 'Edgeify', 'Corbeil-Essonnes', 'motell'),
(3, 1, 44, 'Skalith', 'Limbangan', 'pood'),
(0, 0, 45, 'Bubblebox', 'Perechyn', 'hostel'),
(0, 0, 46, 'Browsedrive', 'Hushi', 'hotell'),
(0, 0, 47, 'Ntags', 'Zhengyu', 'soogikoht'),
(4, 2, 48, 'Thoughtworks', 'Gampingan', 'motell'),
(3, 1, 49, 'Tekfly', 'Oslo', 'pood'),
(4, 2, 50, 'Brainlounge', 'Los Angeles', 'hostel'),
(4, 1, 51, 'Skyvu', 'Anuling', 'hotell'),
(6, 1, 52, 'Jabberstorm', 'Kubangeceng', 'soogikoht'),
(6, 2, 53, 'Skalith', 'Salvador', 'motell'),
(5, 1, 54, 'Demimbu', 'Zhangaqorghan', 'pood'),
(2, 1, 55, 'Dabvine', 'Ciketak', 'hostel'),
(10, 1, 57, 'Fivespan', 'Caen', 'soogikoht'),
(6, 1, 58, 'Wordware', 'Jiangpu', 'motell'),
(8, 2, 59, 'Mynte', 'Tulu Bolo', 'pood'),
(0, 0, 60, 'Yotz', 'Shangfang', 'hostel'),
(3, 3, 61, 'Buzzshare', 'Boro', 'hotell'),
(6, 1, 62, 'Thoughtbridge', 'Cruces de Anorí', 'soogikoht'),
(0, 0, 63, 'Voomm', 'Kabardinka', 'motell'),
(0, 0, 64, 'Mynte', 'Sosnovka', 'pood'),
(2, 1, 65, 'Photofeed', 'Xarrë', 'hostel'),
(10, 1, 66, 'Linkbuzz', 'Emiliano Zapata', 'hotell'),
(0, 0, 67, 'Skivee', 'Krasnoshchekovo', 'soogikoht'),
(4, 2, 68, 'Trunyx', 'Tangxi', 'motell'),
(0, 0, 69, 'Edgepulse', 'Krajan', 'pood'),
(7, 4, 70, 'Jaxspan', 'Battle Creek', 'hostel'),
(0, 0, 71, 'Ntag', 'Duraznopampa', 'hotell'),
(0, 0, 72, 'Meedoo', 'Jarash', 'soogikoht'),
(6, 2, 73, 'Brainverse', 'Cabcaben', 'motell'),
(0, 0, 74, 'Twitterbridge', 'Las Vegas', 'pood'),
(0, 0, 75, 'Zoomlounge', 'Motong', 'hostel'),
(0, 0, 76, 'Flashspan', 'Yoshida-kasugachō', 'hotell'),
(3, 1, 77, 'Topicshots', 'Suchen', 'soogikoht'),
(4, 2, 78, 'Browsezoom', 'Puerto Francisco de Orellana', 'motell'),
(1, 1, 79, 'Blogspan', 'Ubonratana', 'pood'),
(8, 3, 80, 'Youbridge', 'Ḩarastā', 'hostel'),
(4, 2, 81, 'Buzzshare', 'Lerrnanist', 'hotell'),
(5, 1, 82, 'Zoomzone', 'Punsu', 'soogikoht'),
(6, 4, 83, 'Twitterworks', 'Gävle', 'motell'),
(2, 1, 84, 'Ozu', 'Puchong', 'pood'),
(0, 0, 85, 'Zazio', 'Alcantara', 'hostel'),
(3, 1, 86, 'Youspan', 'Cileles', 'hotell'),
(8, 2, 87, 'Flashdog', 'Ngujung', 'soogikoht'),
(0, 0, 88, 'Zoombeat', 'San Fernando del Valle de Catamarca', 'motell'),
(8, 1, 89, 'Voolia', 'Wassa-Akropong', 'pood'),
(6, 3, 90, 'Topdrive', 'Brandfort', 'hostel'),
(6, 2, 91, 'InnoZ', 'Pingya', 'hotell'),
(8, 2, 92, 'Kare', 'Tha Mai', 'soogikoht'),
(0, 0, 93, 'Jatri', 'Yasugichō', 'motell'),
(7, 2, 94, 'Twimm', 'København', 'pood'),
(0, 0, 95, 'Topdrive', 'Lučina', 'hostel'),
(10, 1, 96, 'Eire', 'Saint Paul', 'hotell'),
(3, 1, 97, 'Gabtune', 'Iḩsim', 'soogikoht'),
(0, 0, 98, 'Flipopia', 'Basiao', 'motell'),
(0, 0, 99, 'Linkbridge', 'Muritiba', 'pood'),
(7, 1, 100, 'Dablist', 'Roubaix', 'hostel'),
(0, 0, 101, 'NewPlace', 'NewLocation', 'hostel'),
(0, 0, 102, 'test', 'test', 'soogikoht');

-- --------------------------------------------------------

--
-- Table structure for table `hinnangud`
--

CREATE TABLE `hinnangud` (
  `nimi` text NOT NULL,
  `comment` text NOT NULL,
  `hinnang` int(11) NOT NULL,
  `asukoht_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinnangud`
--

INSERT INTO `hinnangud` (`nimi`, `comment`, `hinnang`, `asukoht_id`) VALUES
('Wernher', 'in blandit ultrices enim', 8, 59),
('Johan', 'turpis sed ante vivamus tortor duis', 3, 49),
('Dorelle', 'erat tortor sollicitudin mi sit amet lobortis', 2, 7),
('Delila', 'tellus nulla ut erat id', 1, 13),
('Andie', 'blandit non interdum in', 5, 78),
('Arlena', 'nulla ultrices aliquet maecenas leo', 4, 29),
('Coreen', 'quisque ut erat', 1, 50),
('Dominga', 'metus vitae ipsum aliquam non mauris morbi', 7, 100),
('Angelina', 'et commodo vulputate', 10, 7),
('Kelley', 'vestibulum sed magna at nunc commodo placerat', 3, 24),
('Gerty', 'aliquet at feugiat non pretium', 2, 3),
('Andie', 'turpis elementum ligula vehicula consequat morbi a', 10, 96),
('Georgie', 'maecenas tristique est et tempus semper', 6, 3),
('Pincas', 'aliquam convallis nunc proin at turpis', 8, 87),
('Corine', 'nulla sed accumsan felis ut', 4, 25),
('Chip', 'at vulputate vitae nisl aenean', 5, 37),
('Bert', 'integer non velit donec', 7, 38),
('Morly', 'quis turpis sed ante', 10, 92),
('Eleni', 'massa donec dapibus duis', 4, 25),
('Bel', 'in eleifend quam a odio', 6, 81),
('Blakelee', 'neque aenean auctor gravida sem praesent', 2, 6),
('Hogan', 'ut erat curabitur', 1, 19),
('Beatrisa', 'iaculis diam erat fermentum justo nec condimentum', 5, 53),
('Langsdon', 'magna ac consequat metus sapien', 3, 73),
('Veronike', 'dui maecenas tristique est et tempus', 8, 59),
('Norrie', 'aenean fermentum donec ut mauris eget massa', 5, 80),
('Neddy', 'nulla integer pede justo lacinia', 6, 70),
('Heddi', 'urna ut tellus nulla ut erat', 7, 90),
('Faythe', 'nulla ac enim', 6, 5),
('Eachelle', 'ultrices posuere cubilia', 7, 50),
('Elana', 'suscipit ligula in lacus', 1, 5),
('Demetri', 'maecenas pulvinar lobortis est phasellus sit', 10, 80),
('Guillema', 'aenean lectus pellentesque eget nunc', 3, 4),
('Meade', 'nisl venenatis lacinia aenean', 10, 70),
('Gill', 'potenti nullam porttitor lacus', 9, 83),
('Anthony', 'commodo vulputate justo', 8, 11),
('Shelby', 'nunc commodo placerat praesent blandit nam nulla', 10, 57),
('Ebba', 'semper porta volutpat quam pede lobortis', 4, 94),
('Olivier', 'et eros vestibulum', 2, 90),
('Emmery', 'ut massa quis augue luctus tincidunt', 2, 27),
('Leese', 'viverra eget congue eget', 4, 61),
('Lucky', 'odio odio elementum', 7, 83),
('Mignonne', 'mus vivamus vestibulum sagittis sapien', 1, 11),
('Benji', 'duis ac nibh fusce lacus purus', 2, 61),
('Minnaminnie', 'amet sapien dignissim vestibulum vestibulum ante', 3, 40),
('Shirline', 'turpis sed ante vivamus tortor', 8, 89),
('Hobey', 'proin at turpis a pede posuere', 7, 83),
('Horatius', 'tortor id nulla ultrices aliquet maecenas leo', 8, 73),
('Bernardo', 'condimentum id luctus nec molestie', 3, 44),
('Ave', 'eget vulputate ut ultrices vel augue vestibulum', 3, 6),
('Justis', 'at dolor quis odio consequat', 4, 51),
('Boyce', 'interdum mauris ullamcorper purus sit', 10, 66),
('Rheba', 'eget eleifend luctus ultricies eu', 7, 53),
('Tannie', 'metus aenean fermentum donec ut mauris eget', 1, 40),
('Tatiana', 'vel augue vestibulum ante ipsum', 10, 7),
('Joshia', 'odio odio elementum eu interdum eu tincidunt', 2, 78),
('Arleen', 'ut massa volutpat convallis morbi', 8, 5),
('Leslie', 'ultricies eu nibh quisque id justo sit', 8, 91),
('Ertha', 'eu tincidunt in leo', 2, 84),
('Odele', 'habitasse platea dictumst etiam faucibus cursus urna', 3, 77),
('Maude', 'in lectus pellentesque at nulla', 3, 34),
('Dael', 'a nibh in quis justo maecenas', 8, 17),
('Augusto', 'et commodo vulputate', 6, 58),
('Paten', 'nulla elit ac nulla sed', 2, 65),
('Clare', 'maecenas ut massa quis augue luctus', 2, 81),
('Wilmer', 'donec semper sapien a libero nam dui', 7, 5),
('Leyla', 'leo pellentesque ultrices mattis odio donec vitae', 4, 1),
('Alley', 'aliquam lacus morbi quis tortor', 6, 62),
('Nicholas', 'sagittis sapien cum sociis natoque', 10, 94),
('Sigismond', 'porttitor lorem id ligula suspendisse ornare consequat', 4, 70),
('Stillmann', 'nisi venenatis tristique fusce congue', 3, 28),
('Orella', 'nulla tellus in sagittis dui', 5, 82),
('Tabby', 'sapien varius ut blandit non interdum', 2, 55),
('Raf', 'luctus et ultrices posuere cubilia curae', 5, 9),
('Marje', 'nulla integer pede justo lacinia', 3, 32),
('Skipton', 'donec posuere metus', 3, 97),
('Drusilla', 'suspendisse potenti cras', 7, 87),
('Charlton', 'lacus morbi quis tortor id nulla', 7, 27),
('Sunny', 'mauris enim leo rhoncus sed vestibulum sit', 2, 24),
('Graig', 'nunc purus phasellus in felis', 3, 91),
('Clovis', 'interdum mauris non ligula pellentesque ultrices', 3, 1),
('Bondy', 'aliquet pulvinar sed nisl nunc rhoncus', 1, 79),
('Halley', 'ante ipsum primis', 1, 83),
('Arron', 'ut nulla sed', 2, 61),
('Cam', 'semper rutrum nulla nunc purus phasellus', 4, 19),
('Cristi', 'pulvinar nulla pede ullamcorper augue a', 3, 86),
('Bartram', 'faucibus orci luctus et', 1, 4),
('Claudian', 'vestibulum ante ipsum primis in faucibus orci', 5, 54),
('Keene', 'sem praesent id massa id nisl', 9, 34),
('Danyelle', 'tellus nisi eu orci mauris', 8, 90),
('Henderson', 'et tempus semper est quam', 6, 26),
('Carine', 'sit amet sapien dignissim', 6, 23),
('Sydney', 'justo pellentesque viverra pede', 6, 92),
('Susie', 'vestibulum ante ipsum primis', 4, 12),
('Rudolfo', 'quisque arcu libero rutrum ac lobortis', 7, 24),
('Caprice', 'mauris vulputate elementum nullam', 9, 80),
('Noll', 'vivamus tortor duis mattis', 1, 9),
('Philippa', 'ornare imperdiet sapien urna', 9, 22),
('Camile', 'erat nulla tempus vivamus in felis', 3, 16),
('Heida', 'sem praesent id', 7, 70),
('2', '2', 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `kasutajad`
--

CREATE TABLE `kasutajad` (
  `id` int(11) NOT NULL,
  `nimi` text NOT NULL,
  `parool` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasutajad`
--

INSERT INTO `kasutajad` (`id`, `nimi`, `parool`) VALUES
(1, 'kert', 'parool');

-- --------------------------------------------------------

--
-- Table structure for table `tyybid`
--

CREATE TABLE `tyybid` (
  `id` int(6) NOT NULL,
  `tyyp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tyybid`
--

INSERT INTO `tyybid` (`id`, `tyyp`) VALUES
(1, 'soogikoht'),
(2, 'pood'),
(3, 'motell'),
(4, 'hotell'),
(5, 'hostel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asukohad`
--
ALTER TABLE `asukohad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tyybid`
--
ALTER TABLE `tyybid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asukohad`
--
ALTER TABLE `asukohad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tyybid`
--
ALTER TABLE `tyybid`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
