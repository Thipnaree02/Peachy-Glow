-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2025 at 11:06 PM
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
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(7) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_detail` text NOT NULL,
  `p_price` float(9,2) NOT NULL,
  `p_ext` varchar(50) NOT NULL,
  `c_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_ext`, `c_id`) VALUES
(1, 'Olay Regenerist', 'ครีมบำรุงผิวช่วยลดเลือนริ้วรอย เสริมสร้างความยืดหยุ่น และกระชับผิว ด้วยสูตรที่มีเปปไทด์และไนอาซินาไมด์', 599.00, 'png', 1),
(2, 'Hada Labo\r\n', 'โลชั่นและเซรั่มบำรุงผิวจากญี่ปุ่น เน้นการเติมความชุ่มชื้นล้ำลึกด้วยกรดไฮยาลูโรนิกหลายโมเลกุล', 520.00, 'png', 1),
(3, 'Anessa', 'กันแดดจากญี่ปุ่นที่มีประสิทธิภาพสูง ป้องกันรังสี UVA/UVB และกันน้ำได้ดี เหมาะสำหรับกิจกรรมกลางแจ้ง', 775.00, 'png', 1),
(4, 'Mille ', 'แบรนด์เครื่องสำอางที่เน้นการแต่งหน้าแบบเบาบาง เนื้อเนียนนุ่ม ติดทนนาน และให้ลุคธรรมชาติ', 599.00, 'png', 3),
(5, 'Bio-Oil', 'น้ำมันบำรุงผิวสำหรับลดรอยแผลเป็น รอยแตกลาย และปรับสีผิวให้สม่ำเสมอ พร้อมมอบความชุ่มชื้น', 620.00, 'png', 4),
(6, 'Ormedic', 'ผลิตภัณฑ์ดูแลผิวแนวออร์แกนิก ช่วยปรับสมดุลผิว บำรุงและปลอบประโลมผิวบอบบาง', 229.00, 'png', 3),
(7, 'Eucerin Hyaluron', 'เซรั่มและครีมที่ช่วยเติมเต็มริ้วรอยลึกด้วยไฮยาลูรอนิกแอซิด พร้อมเสริมความยืดหยุ่นของผิว', 675.00, 'png', 1),
(8, 'Garnier Fast Bright  Vitamin C & Hyaloronic', 'เซรั่มผสมวิตามิน C และไฮยาลูโรนิก ช่วยให้ผิวกระจ่างใสและชุ่มชื้น', 499.00, 'png', 2),
(9, 'Garnier Bright Complete Vitamin C Water', 'น้ำตบวิตามิน C ช่วยปรับผิวให้กระจ่างใส ลดจุดด่างดำ และมอบความสดชื่น', 259.00, 'png', 1),
(10, 'Glycolic Bright Instant Glowing Serum', 'ผลิตภัณฑ์เซรั่มบำรุงผิวหน้า เพื่อผิวดูโกลว์ และกระจ่างใสขึ้น สถาบันวิจัย ลอรีอัล ปารีส คิดค้นพัฒนานวัตกรรมเพื่อผิวดูโกลว์ และกระจ่างใสขึ้นในทันที ด้วยพลัง ไกลโคลิค แอซิด ผิวดูกระจ่างใสขึ้น จุดด่างดำดูลดเลือน', 599.00, 'png', 2),
(11, 'The Ordinary', 'ผลิตภัณฑ์รักษาสิว ด้วยสารละลายกรดซาลิไซลิก 2% และหากสิวยังไม่หายก็ไม่ต้องกังวล เพราะผลิตภัณฑ์นี้อ่อนโยนพอที่จะใช้ในตอนเช้าโดยไม่ต้องกังวลเรื่องการอักเสบ', 245.00, 'png', 2),
(12, 'Roushun', 'ผลิตภัณฑ์ช่วยผลัดเซลล์ผิวที่ตายแล้วออกอย่างอ่อนโยน ทำความสะอาดผิวหน้าได้อย่างล้ำลึก เผยผิวดูกระจ่างใสขึ้น', 120.00, 'png', 2);

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
