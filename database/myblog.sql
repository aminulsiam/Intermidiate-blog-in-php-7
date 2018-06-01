-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 10:24 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_author` varchar(50) NOT NULL,
  `blog_description` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `category_id`, `blog_title`, `blog_author`, `blog_description`, `status`, `created_at`) VALUES
(2, 6, 'umme ahmed shishir', 'Admin', '<p>hi i am umme ahmed shishir</p>\r\n', 1, '2018-05-03 20:44:40'),
(3, 7, 'aminul haq mallik', 'Admin', '<p>aminul haq mallik is a student of cse at wub</p>\r\n', 0, '2018-05-03 20:49:01'),
(5, 6, 'shglsagh', 'Admin', '<p>aldhgl ldhgla&nbsp; lhdg l lahdg lahdgl dglhagdh</p>\r\n', 1, '2018-05-25 11:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`) VALUES
(6, 'à¦¬à¦¿à¦¨à§‹à¦¦à¦¨'),
(7, 'à¦–à§‡à¦²à¦¾'),
(11, 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `image_caption` text NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`id`, `image`, `image_caption`, `blog_id`) VALUES
(2, '../images/0132264173.jpg', 'picture of my married', 2),
(3, '../images/0ffcd8c837.jpg', 'picture of aminul haq mallik', 3),
(5, '../images/980151b317.jpg', 'asdgas sdga asdgdg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE `tbl_like` (
  `id` int(11) NOT NULL,
  `bloglike` int(11) NOT NULL,
  `blogid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `image`, `created_at`, `status`) VALUES
(1, 'aminul', 'e10adc3949ba59abbe56e057f20f883e', 'aminul@gmail.com', '../images/5af0acd18f7499.91076006_fimhnqopkgjle.jpeg', '2018-05-07 21:45:21', 1),
(5, 'siam', 'e10adc3949ba59abbe56e057f20f883e', 'siam@gmail.com', '../images/1355b1b00c.jpg', '2.23 25.25.18', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
