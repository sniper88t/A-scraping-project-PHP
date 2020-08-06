-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 03, 2020 at 09:43 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parsernew`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `Title` varchar(200) NOT NULL,
  `Image` text NOT NULL,
  `PriceGBP` varchar(20) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Size` varchar(20) NOT NULL,
  `Strength` varchar(20) NOT NULL,
  `url` varchar(250) NOT NULL,
  `SoldOn` varchar(200) NOT NULL,
  `caurl` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=266383 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Title`, `Image`, `PriceGBP`, `Region`, `Status`, `Type`, `Size`, `Strength`, `url`, `SoldOn`, `caurl`, `description`) VALUES
(21, 'Glenfarclas 60 Year Old', 'https://d2ph7mtwix1r5n.cloudfront.net/s3fs-public/styles/uc_product_full/public/IMG_3019_30_0_0_0.jpg?itok=iEWT5ZiE', '95', '1953', 'Operational', 'Official', '70cl', '43.3%', 'https://www.whiskyauctioneer.com/lot/266969/glenfarclas-60-year-old', '  3 August from 7pm (BST).Â ', '/june-2020-auction-0', 'Glenfarclas 60 Year oldGlenfarclas is considered by many to be one of the finest distilleries in Speyside. Its direct-fired stills produce a heavy single malt that is almost exclusively matured in Jerez sherry casks. The distillery focuses on single malt over blends, and a cool microclimate around the distillery that means that their casks are particularly stingy to the \"angels,\" resulting in an incredible depth of stock. Glenfarclas also feel they share some credit for the modern day love of cask strength whisky, introducing their acclaimed 105 proof expressions back in 1968.The impressive cask stock in the Glenfarclas warehouses means there has been a great output of well-agedÂ core range and limited edition age statements. This is aÂ stunning 60 year old,Â presented in a crystal decanter with a hexagonal display case representing the six generation of the Grant family that have managed the Distillery.Â Only 360 bottles of this wereÂ produced, officially launched on the 3rd of April 2014 at the Nth Whisky Show in Las Vegas and offering a unique opportunity to acquire one of the oldest bottles ever released by this iconicÂ distillery.Aged in first fill sherry butt #1672.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
