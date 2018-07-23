<?php
	$dbh=new PDO('mysql:host:localhost','root','');

	
	
	/*
-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2017 at 01:48 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 5.6.29-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



--
-- Database: `security`
--
CREATE DATABASE IF NOT EXISTS `security` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `security`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `time_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `product`, `price`, `color`) VALUES
(1, 'iphone 3', '99', 'Black'),
(2, 'iphone 3g', '149', 'Black'),
(3, 'iphone 3gs', '199', 'Black'),
(4, 'iphone 4', '249', 'Black'),
(5, 'iphone 4s', '299', 'Black'),
(6, 'iphone 5', '349', 'Black/White'),
(7, 'iphone 5s', '399', 'White/Red/Yellow'),
(8, 'samsung galaxy', '250', 'Black'),
(9, 'HTC magic', '150', 'white');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Department`, `email`) VALUES
(1, 'Hans', '1234', 'Sales', 'hans@hansen.dk'),
(2, 'Lars', '5678', 'Tech', 'lars@larsen.dk'),
(3, 'Peter', '1111', 'Tech', 'peter@petersen.dk'),
(4, 'Mogens', '9999', 'Sales', 'mogens@mogensen.dk'),
(5, 'Admin', '0000', 'IT', 'admin@admin.dk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
*/
?>
