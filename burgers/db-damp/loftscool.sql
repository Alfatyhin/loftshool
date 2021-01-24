-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 24, 2021 at 04:32 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loftscool`
--

-- --------------------------------------------------------

--
-- Table structure for table `burger_clients`
--

CREATE TABLE `burger_clients` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `count_order` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table clients for burger';

--
-- Dumping data for table `burger_clients`
--

INSERT INTO `burger_clients` (`id`, `name`, `phone_number`, `email`, `count_order`) VALUES
(8, 'Алекс', '+7 (456) 677 77 77', 'sdfuerjtykhyk@gmail.com', 3),
(9, 'Алекс', '+7 (456) 677 77 77', 'sdfuerjtykhy333k@gmail.com', 1),
(10, 'Алекс', '+7 (488) 302 45 76', 'sdfuerjty22khyk@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `burger_orders`
--

CREATE TABLE `burger_orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `adress` text NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `burger_orders`
--

INSERT INTO `burger_orders` (`id`, `client_id`, `name`, `phone_number`, `date`, `adress`, `description`) VALUES
(1, 8, 'Алекс', '+7 (456) 677 77 77', '2021-01-21 03:41:54', 'улица - врвлывпд  дом - 34  корпус = 1  этаж - 5  квартира = 33', 'коментарий - test  оплата -   перезвон - '),
(2, 8, 'Алекс', '+7 (456) 677 77 77', '2021-01-21 03:42:43', 'улица - врвлывпд  дом - 34  корпус = 1  этаж - 5  квартира = 33', 'коментарий - test  оплата -   перезвон - '),
(3, 8, 'Алекс', '+7 (456) 677 77 77', '2021-01-21 03:44:54', 'улица - врвлывпд \n дом - 34 \n корпус - 1 \n этаж - 5 \n квартира - 33', 'коментарий - test \n оплата -  \n перезвон - '),
(4, 9, 'Алекс', '+7 (456) 677 77 77', '2021-01-21 03:46:52', 'улица - врвлывпд \n дом - 34 \n корпус - 1 \n этаж - 5 \n квартира - 33', 'коментарий - test \n оплата - on \n перезвон - on'),
(5, 10, 'Алекс', '+7 (488) 302 45 76', '2021-01-21 03:51:51', 'улица - космонавтов \n дом - 34 \n корпус -  \n этаж - 5 \n квартира - 33', 'коментарий -  \n оплата - Оплата по карте \n перезвон - '),
(6, 10, 'Алекс', '+7 (488) 302 45 76', '2021-01-21 03:53:33', 'улица - космонавтов \n дом - 34 \n корпус -  \n этаж - 5 \n квартира - 33', 'коментарий -  \n оплата - Оплата по карте \n перезвон - '),
(7, 10, 'Алекс', '+7 (488) 302 45 76', '2021-01-21 03:59:07', 'улица - космонавтов \n дом - 34 \n корпус -  \n этаж - 5 \n квартира - 33', 'коментарий -  \n оплата - Оплата по карте \n перезвон - Перезвонить'),
(8, 10, 'Алекс', '+7 (488) 302 45 76', '2021-01-21 04:01:10', 'улица - космонавтов \n дом - 34 \n корпус -  \n этаж - 5 \n квартира - 33', 'коментарий -  \n оплата - Оплата по карте \n перезвон - Перезвонить'),
(9, 10, 'Алекс', '+7 (488) 302 45 76', '2021-01-21 04:01:30', 'улица - космонавтов \n дом - 34 \n корпус -  \n этаж - 5 \n квартира - 33', 'коментарий -  \n оплата - Оплата по карте \n перезвон - Перезвонить');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `burger_clients`
--
ALTER TABLE `burger_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `burger_orders`
--
ALTER TABLE `burger_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `burger_clients`
--
ALTER TABLE `burger_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `burger_orders`
--
ALTER TABLE `burger_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
