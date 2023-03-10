-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 06:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hayatdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `donnation`
--

CREATE TABLE `donnation` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `date_nais` varchar(30) NOT NULL,
  `date_don` varchar(30) NOT NULL,
  `cin` varchar(20) NOT NULL,
  `telephone` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `donnation`
--

INSERT INTO `donnation` (`id`, `nom`, `prenom`, `ville`, `date_nais`, `date_don`, `cin`, `telephone`) VALUES
(7, 'Chaymae', 'Mharzi', 'Oujda', '16/07/1999', '05/09/2022', 'E11113', '0644444444'),
(8, 'sbai', 'salah', 'Oujda', '02/13/2000', '06/10/2022', 'F111111', '0630322146'),
(9, 'Sheikh Haris', 'NAEEM', '+923234142909', '01/10/2023', '01/26/2023', '242352352345', '+923234142909');

-- --------------------------------------------------------

--
-- Table structure for table `form_needer`
--

CREATE TABLE `form_needer` (
  `id` int(11) NOT NULL,
  `num_tel` varchar(15) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `nom_needer` varchar(100) NOT NULL,
  `prenom_needer` varchar(100) NOT NULL,
  `type_need` varchar(5) NOT NULL,
  `date_need` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recent_add`
--

CREATE TABLE `recent_add` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date_don` date NOT NULL,
  `blood_type` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recent_add`
--

INSERT INTO `recent_add` (`id`, `name`, `date_don`, `blood_type`) VALUES
(1, 'Chaymae Mharzi', '2022-02-01', 'O+'),
(2, 'Sbai Salah', '2022-02-12', 'O-'),
(3, 'Chaymae Mharzi', '2022-03-04', 'AB'),
(4, 'Sbai Salah', '2022-11-10', 'A'),
(5, 'Chaymae Mharzi', '2023-03-04', 'B+'),
(6, 'Chaymae Salah', '2020-12-01', 'O+'),
(7, 'Chaymae Salah', '2020-12-01', 'O+'),
(8, 'Chaymae Salah', '2020-12-01', 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `users_new`
--

CREATE TABLE `users_new` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_new`
--

INSERT INTO `users_new` (`id`, `user_id`, `user_name`, `user_email`, `password`) VALUES
(8, 61, 'Haris Naeem', 'harrisnaeem008@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donnation`
--
ALTER TABLE `donnation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_needer`
--
ALTER TABLE `form_needer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent_add`
--
ALTER TABLE `recent_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_new`
--
ALTER TABLE `users_new`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donnation`
--
ALTER TABLE `donnation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `form_needer`
--
ALTER TABLE `form_needer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recent_add`
--
ALTER TABLE `recent_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_new`
--
ALTER TABLE `users_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
