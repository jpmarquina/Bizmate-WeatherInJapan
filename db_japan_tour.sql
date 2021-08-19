-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 11:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_japan_tour`
--
CREATE DATABASE IF NOT EXISTS `db_japan_tour` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_japan_tour`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attractions`
--

CREATE TABLE `tbl_attractions` (
  `aid` int(10) UNSIGNED NOT NULL,
  `pid` varchar(45) NOT NULL DEFAULT '',
  `attraction_main_image` varchar(45) NOT NULL DEFAULT '',
  `attraction_summary` longtext NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attractions`
--

INSERT INTO `tbl_attractions` (`aid`, `pid`, `attraction_main_image`, `attraction_summary`) VALUES
(1, '1', 'nshfuyge5i.jpg', 'Tomorrowland is one of the many themed lands featured at all of the Magic Kingdom styled Disney theme parks around the world owned or licensed by The Walt Disney Company. Each version of the land is different and features numerous attractions that depict views of the future'),
(2, '2', 'nshfuyge5i.jpg', 'Tomorrowland is one of the many themed lands featured at all of the Magic Kingdom styled Disney theme parks around the world owned or licensed by The Walt Disney Company. Each version of the land is different and features numerous attractions that depict views of the future'),
(3, '3', '30280626097_5d6238fd83_o.jpg', 'Fushimi Inari-taisha is the head shrine of the kami Inari, located in Fushimi-ku, Kyoto, Kyoto Prefecture, Japan.'),
(4, '4', '1200px-USJ_5years.jpg', 'Universal Studios Japan, located in Osaka, is one of six Universal Studios theme parks, owned and operated by USJ LLC, which is wholly owned by NBCUniversal. The park is similar to the Universal Orlando Resort since it also contains selected attractions from Universal Orlando Resort and Universal Studios Hollywood.'),
(5, '5', '01.jpg', 'Hitsujigaoka Observation Hill is a famous scenic spot located in Toyohira-ku, Sapporo, Hokkaidō, Japan. The bronze statue of Dr. William S. Clark, which stands on the hill, is well known as the symbol of frontier spirit of Hokkaidō.'),
(6, '6', 'japan-nara-todai-ji-temple.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attraction_gallery`
--

CREATE TABLE `tbl_attraction_gallery` (
  `ag_id` int(10) UNSIGNED NOT NULL,
  `aid` varchar(45) NOT NULL DEFAULT '',
  `ag_image` varchar(45) NOT NULL DEFAULT '',
  `ag_status` tinyint(1) NOT NULL DEFAULT 1,
  `datetime_created` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `datetime_updated` datetime DEFAULT NULL,
  `last_updated_by` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attraction_gallery`
--

INSERT INTO `tbl_attraction_gallery` (`ag_id`, `aid`, `ag_image`, `ag_status`, `datetime_created`, `created_by`, `datetime_updated`, `last_updated_by`) VALUES
(1, '1', 'en_tdr_main_map.jpg', 1, NULL, 0, NULL, 0),
(2, '1', 'DL-1.jpg', 1, NULL, 0, NULL, 0),
(3, '2', 'en_tdr_main_map.jpg', 1, NULL, 0, NULL, 0),
(4, '2', 'DL-1.jpg', 1, NULL, 0, NULL, 0),
(5, '3', '45169782892_af70df5058_b.jpg', 1, NULL, 0, NULL, 0),
(6, '3', '08-20131216_FushimiInari_Mainspot-307.jpg', 1, NULL, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `pid` int(10) UNSIGNED NOT NULL,
  `page_view` varchar(45) NOT NULL DEFAULT '',
  `page_summary` longtext NOT NULL DEFAULT '',
  `page_main_banner` varchar(45) NOT NULL DEFAULT '',
  `page_is_published` tinyint(1) NOT NULL DEFAULT 1,
  `datetime_create` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `datetime_updated` datetime DEFAULT NULL,
  `last_updated_by` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`pid`, `page_view`, `page_summary`, `page_main_banner`, `page_is_published`, `datetime_create`, `created_by`, `datetime_updated`, `last_updated_by`) VALUES
(1, 'tokyo', 'Tokyo, Japan\'s busy capital, mixes the ultramodern and the traditional, from neon-lit skyscrapers to historic temples. The opulent Meiji Shinto Shrine is known for its towering gate and surrounding woods. The Imperial Palace sits amid large public gardens. The city\'s many museums offer exhibits ranging from classical art (in the Tokyo National Museum) to a reconstructed kabuki theater (in the Edo-Tokyo Museum).', '858697.jpg', 1, NULL, 0, NULL, 0),
(2, 'yokohama', 'Yokohama, a Japanese city south of Tokyo, was one of the first Japanese ports opened to foreign trade, in 1859. It contains a large Chinatown with hundreds of Chinese restaurants and shops. It’s also known for Sankei-en Garden, a botanical park containing preserved Japanese residences from different eras, and the seaside Minato Mirai district, site of the 296m Landmark Tower.', 'Yokohama-Chinatown-1024x683.jpg', 0, NULL, 0, NULL, 0),
(3, 'kyoto', 'Kyoto, once the capital of Japan, is a city on the island of Honshu. It\'s famous for its numerous classical Buddhist temples, as well as gardens, imperial palaces, Shinto shrines and traditional wooden houses. It’s also known for formal traditions such as kaiseki dining, consisting of multiple courses of precise dishes, and geisha, female entertainers often found in the Gion district.', 'kyoto-japan-26.jpg', 1, NULL, 0, NULL, 0),
(4, 'osaka', 'Osaka is a large port city and commercial center on the Japanese island of Honshu. It\'s known for its modern architecture, nightlife and hearty street food. The 16th-century shogunate Osaka Castle, which has undergone several restorations, is its main historical landmark. It\'s surrounded by a moat and park with plum, peach and cherry-blossom trees. Sumiyoshi-taisha is among Japan’s oldest Shinto shrines.', '4000_top.jpg', 1, NULL, 0, NULL, 0),
(5, 'sapporo', 'Sapporo, capital of the mountainous northern Japanese island of Hokkaido, is famous for its beer, skiing and annual Sapporo Snow Festival featuring enormous ice sculptures. The Sapporo Beer Museum traces the city’s brewing history and has tastings and a beer garden. Ski hills and jumps from the 1972 Winter Olympics are scattered within the city limits, and Niseko, a renowned ski resort, is nearby.', 'Sapporo_main.jpg', 1, NULL, 0, NULL, 0),
(6, 'nagoya', 'Nagoya, capital of Japan\'s Aichi Prefecture, is a manufacturing and shipping hub in central Honshu. The city’s Naka ward is home to museums and pachinko (gambling machine) parlors. Naka also includes the Sakae entertainment district, with attractions like the Sky-Boat Ferris wheel, which is attached to a mall. In northern Naka is Nagoya Castle, a partly reconstructed 1612 royal home displaying Edo-era artifacts.', 'Nagoya-and-Oasis-21-1024x683.jpg', 1, NULL, 0, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attractions`
--
ALTER TABLE `tbl_attractions`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tbl_attraction_gallery`
--
ALTER TABLE `tbl_attraction_gallery`
  ADD PRIMARY KEY (`ag_id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attractions`
--
ALTER TABLE `tbl_attractions`
  MODIFY `aid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_attraction_gallery`
--
ALTER TABLE `tbl_attraction_gallery`
  MODIFY `ag_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
