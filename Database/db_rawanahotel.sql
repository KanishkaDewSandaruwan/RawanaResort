-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 12:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rawanahotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `room_id` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `booking_occupancy` int(255) NOT NULL,
  `is_deleted` int(255) NOT NULL,
  `date_updated` datetime NOT NULL,
  `booking_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_id`, `room_id`, `total`, `arrival_date`, `departure_date`, `booking_occupancy`, `is_deleted`, `date_updated`, `booking_status`) VALUES
(7, 3, 2, 3000, '2022-11-27', '2022-11-29', 1, 0, '2022-11-26 00:13:10', 2),
(8, 3, 2, 3000, '2022-12-28', '2022-12-30', 1, 0, '2022-12-04 22:38:00', 0),
(9, 3, 1, 5000, '2023-11-29', '2023-12-01', 2, 0, '2023-11-26 22:40:32', 0),
(10, 3, 1, 2500, '2023-11-27', '2023-11-28', 2, 0, '2023-11-26 23:12:28', 0),
(11, 8, 1, 2500, '2023-12-04', '2023-12-05', 2, 0, '2023-11-26 23:13:15', 0),
(12, 3, 1, 2500, '2023-12-06', '2023-12-07', 2, 0, '2023-11-26 23:30:47', 0),
(13, 3, 1, 2500, '2023-12-06', '2023-12-07', 2, 0, '2023-11-26 23:31:11', 0),
(14, 3, 1, 2500, '2023-12-06', '2023-12-07', 2, 0, '2023-11-26 23:32:05', 0),
(15, 3, 1, 2500, '2023-12-06', '2023-12-07', 2, 0, '2023-11-26 23:34:04', 0),
(16, 3, 1, 2500, '2023-12-06', '2023-12-07', 2, 0, '2023-11-26 23:36:46', 0),
(17, 3, 1, 2500, '2023-12-06', '2023-12-07', 2, 0, '2023-11-26 23:42:50', 0),
(18, 3, 1, 2500, '2023-12-06', '2023-12-07', 2, 0, '2023-11-26 23:44:06', 0),
(19, 3, 1, 2500, '2024-01-05', '2024-01-06', 2, 0, '2024-01-03 14:47:09', 1),
(21, 3, 1, 2500, '2024-01-16', '2024-01-17', 2, 0, '2024-01-03 16:30:50', 0),
(22, 3, 1, 2500, '2024-01-14', '2024-01-15', 2, 0, '2024-01-03 16:34:41', 0),
(23, 3, 1, 2500, '2024-01-14', '2024-01-15', 2, 0, '2024-01-03 16:37:40', 0),
(24, 3, 1, 2500, '2024-01-14', '2024-01-15', 2, 0, '2024-01-03 16:39:41', 0),
(25, 3, 1, 2500, '2024-01-14', '2024-01-15', 2, 0, '2024-01-03 16:39:58', 0),
(26, 3, 1, 2500, '2024-01-24', '2024-01-25', 2, 0, '2024-01-03 16:57:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `cat_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `is_deleted`, `date_updated`) VALUES
(1, 'Budget Room', 'Showers.jpg', 0, '2022-09-11 11:19:40'),
(2, 'Slipers', 'images.jfif', 1, '2022-09-05 21:19:24'),
(3, 'Double Room', 'Kitchen Mixers.jpg', 0, '2022-09-05 21:22:19'),
(4, 'dd', 'images.jfif', 1, '2022-09-05 21:21:35'),
(5, 'Phone Acc', 'hImYqMss.png', 1, '2022-09-05 22:23:22'),
(6, 'Delux', 'Spouts.jpg', 0, '2022-11-06 11:01:37'),
(7, 'Single Room', 'room1.jpg', 0, '2022-11-07 21:30:22'),
(8, 'Shoes', '14a1996cfe96713a6f5876ad08ee5224.jpg', 0, '2022-12-03 01:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `subject`, `message`, `date_updated`) VALUES
(15, 'Muthuwana Acharige Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', 'fdf', 'fdfd', '2022-11-06 15:10:50'),
(16, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', 'Hellow i am kanishja', 'sss', '2023-11-18 16:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `phone`, `nic`, `address`, `is_deleted`, `password`) VALUES
(1, '', 'admin', '', '', '', 0, '12345'),
(2, 'Thilini Maheshika', 'thili@gmail.com', '0713664071', '962670426G', 'Banwalgodalla, Kosmulla', 1, ''),
(3, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', '0713664071', '962670426G', 'Banwalgodalla, Kosmulla', 0, '12345'),
(4, 'Kanishka Dew Sandaruwan', 'Kanishkadewsandarusasaswan@gmail.com', '0713664071', '992670426V', 'Banwalgodalla, Kosmulla', 0, '12345'),
(5, 'Kanishka Dew Sandaruwan', 'Kanishkadewsandarussasaasaswan@gmail.com', '0713664071', '992670426V', 'Banwalgodalla, Kosmulla', 0, ''),
(6, 'Kanishka Dew Sandaruwan', 'Kanishkadewsandaruwan999@gmail.com', '0713664071', '992670426V', 'Banwalgodalla, Kosmulla', 0, ''),
(7, 'Kanishka Dew Sandaruwan', 'Kanishkadewsandaruwan78@gmail.com', '0713664071', '992670426V', 'Banwalgodalla, Kosmulla', 1, ''),
(8, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan94@gmail.com', '+94713664071', '992670426V', '', 0, ''),
(9, 'Dew Sandaruwan', 'dew@gmail.com', '0713664075', '962670426G', 'Banwalgodalla, Kosmulla', 0, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(255) NOT NULL,
  `facility_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facility_id`, `facility_name`, `facility_desc`) VALUES
(1, 'Restaurants', 'Usage of the Internet is becoming more common due to rapid advancement of technology and powe'),
(3, 'Sports CLub', 'Usage of the Internet is becoming more common ssdue to rapid advancement of technology and power.   ss');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_image`) VALUES
(20, 'Spouts.jpg'),
(22, 'istockphoto-1163589059-612x612.jpg'),
(23, 'Service1-1024x682.jpg'),
(24, 'white-coat-syndrome-anxiety.webp');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `location_image`) VALUES
(1, 'Mathara', 'banner_bg.jpg'),
(3, 'Galle', 'Service1-1024x682.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `room_details` varchar(255) NOT NULL,
  `room_price` int(255) NOT NULL,
  `room_occupancy` int(255) NOT NULL,
  `room_image` varchar(255) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `date_updated` datetime NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `cat_id`, `room_details`, `room_price`, `room_occupancy`, `room_image`, `is_deleted`, `date_updated`, `is_active`) VALUES
(1, 'Deulax Room', 6, 'Welcome to Deulax roo this is the most big room in this hotel', 2500, 3, 'room1.jpg', 0, '2022-11-06 12:46:27', 1),
(2, 'Dulux Single Room', 7, '<p>sasa</p>', 1500, 1, 'room1.jpg', 0, '2022-11-07 21:30:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_gallery`
--

CREATE TABLE `room_gallery` (
  `room_imageid` int(11) NOT NULL,
  `room_image` varchar(255) NOT NULL,
  `room_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_gallery`
--

INSERT INTO `room_gallery` (`room_imageid`, `room_image`, `room_id`) VALUES
(3, 'Service1-1024x682.jpg', 1),
(4, 'white-coat-syndrome-anxiety.webp', 1),
(5, 'stock-photo-smiling-female-doctor-holding-medical-records.jpeg', 1),
(6, 'download.jpeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `header_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `header_title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `header_desc` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `about_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `about_desc` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `company_phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `sub_image` varchar(255) NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `link_facebook` varchar(255) NOT NULL,
  `link_twiiter` varchar(255) NOT NULL,
  `link_instragram` varchar(255) NOT NULL,
  `header_rotate_image` varchar(255) NOT NULL,
  `about_experience` int(255) NOT NULL,
  `opening` varchar(255) CHARACTER SET cp1250 NOT NULL,
  `shop_status` int(2) NOT NULL,
  `privacy_policy` varchar(9999) NOT NULL,
  `terms_and_condition` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`header_image`, `header_title`, `header_desc`, `about_title`, `about_desc`, `company_phone`, `company_email`, `company_address`, `sub_image`, `about_image`, `link_facebook`, `link_twiiter`, `link_instragram`, `header_rotate_image`, `about_experience`, `opening`, `shop_status`, `privacy_policy`, `terms_and_condition`) VALUES
('banner_bg.jpg', 'Welcome to Rawana Hotel', 'With this shop hompeage template', 'About Us', 'Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!', '0713664076', 'asn@gmail.com', 'Banwalgodalla, Kosmulla', 'banner_bg.jpg', 'na-beers-counter-ebe988ba9d8751cbcbb6cd49476ba405673d252c-s1100-c50.jpg', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'banner_bg.jpg', 20, 'Monday - Saturday 09AM - 09PM  Sunday 10AM - 08PM', 0, '<h1>What Is a Terms and Conditions Agreement?</h1></br>\n<p>A terms and conditions agreement outlines the website administratorâ€™s rules regarding user behavior and provides information about the actions the website administrator can and will perform.</p>\n\nEssentially, your terms and conditions text is a contract between your website and its users. In the event of a legal dispute, arbitrators will look at it to determine whether each party acted within their rights.\n\nCreating the best terms and conditions page possible will protect your business from the following:\n\nAbusive users: Terms and Conditions agreements allow you to establish what constitutes appropriate activity on your site or app, empowering you to remove abusive users and content that violates your guidelines.\nIntellectual property theft: Asserting your claim to the creative assets of your site in your terms and conditions will prevent ownership disputes and copyright infringement.\nPotential litigation: If a user lodges a legal complaint against your business, showing that they were presented with clear terms and conditions before they used your site will help you immensely in court.\nIn short, terms and conditions give you control over your site and legal enforcement if users try to take advantage of your operations.', 'sasasa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_gallery`
--
ALTER TABLE `room_gallery`
  ADD PRIMARY KEY (`room_imageid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_gallery`
--
ALTER TABLE `room_gallery`
  MODIFY `room_imageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
