-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2026 at 04:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kfc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` varchar(10) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` double NOT NULL,
  `menu_image` text NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `menu_price`, `menu_image`, `type_id`) VALUES
('M01', 'เครื่องดื่มเป๊บซี่', 67, 'https://images.ctfassets.net/n4pc9wlortyn/6vvUyuXaRROoCVhOY3nmLX/7f8d09b4d8ecbb318218886680d99681/Pepsi_1_Glass_480x388.png?h=600&w=800&fm=webp&fit=fill', 5),
('M02', 'เดอะบอกซ์วิงซ์ภูเขาไฟระเบิด', 67, 'https://images.ctfassets.net/n4pc9wlortyn/6rtQ7yQyjlNwdu2yCSkZAd/a441ddf1fdd28ba494902b2e382a0996/Volcano-wingz_THE-BOX.png?h=900&w=1200&fm=webp&fit=fill', 1),
('M03', 'ทาร์ตไข่คิทแคทโอเวอร์โหลด', 67, 'https://images.ctfassets.net/n4pc9wlortyn/3tBf1AKe272wtPnmrBeiI5/1cb54d8510ea19016640486320fcc31d/4pcs_Egg-Tart-KITKAT-Overload.png?h=900&w=1200&fm=webp&fit=fill', 4),
('M05', 'ชุดอิ่มคุ้ม', 67, 'https://images.ctfassets.net/n4pc9wlortyn/2ybyqKXKRmfFnAJz2XRdhF/df2215c81bf8baf1ed70ae5a12ea2b32/JPU_Don_Jai_3_480x388.png?h=600&w=800&fm=webp&fit=fill', 2),
('M06', 'ไก่ดุก', 67, 'https://www.asiafarmandfoods.co.th/wp-content/uploads/2023/03/%E0%B9%84%E0%B8%81%E0%B9%88%E0%B8%81%E0%B8%A5%E0%B8%A1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE `menu_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_types`
--

INSERT INTO `menu_types` (`type_id`, `type_name`) VALUES
(1, 'เดอะบอทซ์'),
(2, 'ชุดอิ่มคุ้ม'),
(3, 'เบอร์เกอร์'),
(4, 'ของหวาน'),
(5, 'เครื่องดื่มnig');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `menu_types` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
