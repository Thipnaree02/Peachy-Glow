-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2025 at 12:36 PM
-- Server version: 10.5.28-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peachy_glow`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(7) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_detail` varchar(650) NOT NULL,
  `p_price` int(10) NOT NULL,
  `p_ext` varchar(10) NOT NULL,
  `c_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_ext`, `c_id`) VALUES
(1, 'Olay Regenerist', 'ผลิตภัณฑ์บำรุงผิวหน้าที่มีส่วนผสมของเปปไทด์และไนอาซินาไมด์', 599, 'png', 1),
(2, 'Hada Labo', 'แบรนด์สกินแคร์จากญี่ปุ่นที่เน้นความชุ่มชื้น มีผลิตภัณฑ์ที่มีไฮยาลูโรนิค แอซิด', 520, 'png', 1),
(3, 'Anessa', 'แบรนด์กันแดดจากญี่ปุ่นที่มีชื่อเสียง ผลิตภัณฑ์มีค่า SPF สูง ปกป้องผิวจากรังสี UVA และ UVB', 775, 'png', 1),
(4, 'Mille', 'แบรนด์เครื่องสำอางที่มีผลิตภัณฑ์หลากหลาย เช่น รองพื้น ลิปสติก และแป้งพัฟ เน้นความติดทนและคุณภาพ', 599, 'png', 3),
(5, 'Bio-Oil', 'น้ำมันบำรุงผิวที่ช่วยลดเลือนรอยแผลเป็น รอยแตกลาย และสีผิวไม่สม่ำเสมอ', 620, 'png', 4),
(6, 'Ormedic', 'ผลิตภัณฑ์สกินแคร์ที่ผสานส่วนผสมจากธรรมชาติและวิทยาศาสตร์ เพื่อปรับสมดุลผิวและฟื้นฟูสุขภาพผิว', 229, 'png', 3),
(7, 'Eucerin Hyaluron', 'ผลิตภัณฑ์บำรุงผิวที่มีไฮยาลูโรนิค แอซิด ช่วยเติมเต็มริ้วรอยและเพิ่มความชุ่มชื้นให้ผิว', 675, 'png', 1),
(8, 'Garnier Fast Bright Vitamin C & Hyaloronic', 'เซรั่มที่มีวิตามินซีและไฮยาลูโรนิค แอซิด ช่วยให้ผิวกระจ่างใสและชุ่มชื้น', 499, 'png', 2),
(9, 'Garnier Bright Complete Vitamin C Water', 'โทนเนอร์ที่มีวิตามินซี ช่วยปรับสภาพผิวให้สดชื่นและกระจ่างใส', 259, 'png', 1),
(10, 'Glycolic Bright Instant Glowing Serum', 'เซรั่มที่มีไกลโคลิก แอซิด ช่วยผลัดเซลล์ผิวและเพิ่มความกระจ่างใสทันที', 599, 'png', 2),
(11, 'The Ordinary', 'แบรนด์สกินแคร์ที่เน้นส่วนผสมที่มีประสิทธิภาพและราคาย่อมเยา มีผลิตภัณฑ์หลากหลายสำหรับปัญหาผิวต่างๆ', 245, 'png', 2),
(12, 'Roushun', 'แบรนด์สกินแคร์ที่มีผลิตภัณฑ์หลากหลาย เช่น ครีมบำรุงผิว เซรั่ม และสบู่ เน้นการดูแลผิวในราคาประหยัด', 120, 'png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
