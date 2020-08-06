-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 юли 2020 в 20:58
-- Версия на сървъра: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parser`
--

-- --------------------------------------------------------

--
-- Структура на таблица `itemurl`
--

CREATE TABLE `itemurl` (
  `id` int(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `checked` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `products`
--

CREATE TABLE `products` (
  `id` int(200) NOT NULL,
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
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `products`
--

INSERT INTO `products` (`id`, `Title`, `Image`, `PriceGBP`, `Region`, `Status`, `Type`, `Size`, `Strength`, `url`, `SoldOn`, `description`) VALUES
(1, 'Bowmore 50 Years Old 1966', 'https://www.just-whisky.co.uk/157119-thickbox_default/bowmore-50-years-old-1966.jpg', ' 30,525.00', 'Islay', 'Cask No: 5675', 'Bottle No: 42', '700ml', '41.5%', 'https://www.just-whisky.co.uk/february-2019/68592-bowmore-50-years-old-1966-5010496004760.html', ' 17-02-2019 20:00', 'One of just 74 bottles Worldwide, making it one of the rarest Bowmore whisky ever bottled.'),
(2, 'Glenlivet 70 Years Old 1943 - G&M Private Collection', 'https://www.just-whisky.co.uk/164903-thickbox_default/glenlivet-70-years-old-1943-gm-private-collection.jpg', ' 29,885.00', 'Speyside', 'Number Bottles Produced: 42', 'Bottle No: 24', '70 cl', '49.1%', 'https://www.just-whisky.co.uk/april-2019/71831-glenlivet-70-years-old-1943-gm-private-collection.html', ' 21-04-2019 20:00', 'Private Collection Glenlivet 1943 by Gordon & MacPhail is quite simply one of the rarest Scotch whiskies ever bottled with only 42 decanters ever produced.'),
(3, 'Glenlivet 70 Years Old 1943 - G&M Private Collection', 'https://www.just-whisky.co.uk/170544-thickbox_default/glenlivet-70-years-old-1943-gm-private-collection.jpg', ' 28,000.00', 'Speyside', 'Number Bottles Produced: 42', 'Bottle No: 24', '70 cl', '49.1%', 'https://www.just-whisky.co.uk/june-2019/74309-glenlivet-70-years-old-1943-gm-private-collection.html', ' 16-06-2019 20:00', 'Private Collection Glenlivet 1943 by Gordon & MacPhail is quite simply one of the rarest Scotch whiskies ever bottled with only 42 decanters ever produced.'),
(4, 'Bowmore 52 Years Old 1965', 'https://www.just-whisky.co.uk/194619-thickbox_default/bowmore-52-years-old-1965.jpg', ' 27,400.00', 'Islay', 'Cask Type: Oloroso Sherry', 'Number Bottles Produced: 232', '70 cl', '42%', 'https://www.just-whisky.co.uk/january-2020/84787-bowmore-52-years-old-1965.html', ' 19-01-2020 20:00', 'Matured for 52 years, this is the third edition from the Bowmore 50-Year-Old Vaults Series.  The liquid in this remarkably rare limited-edition bottling was some of the first to pass through Bowmoreâs then-new steam-heated stills in 1965. The extended maturation period has created a rare and refined whisky with the perfect blend of complexity and elegance, exemplifying Bowmoreâs history spent perfecting the art of whisky maturation. This expression is a rich reward for those who value the importance of savouring time.'),
(5, 'Glenlivet 70 Years Old 1943 - G&M Private Collection', 'https://www.just-whisky.co.uk/174446-thickbox_default/glenlivet-70-years-old-1943-gm-private-collection.jpg', ' 27,250.00', 'Speyside', 'Number Bottles Produced: 42', 'Bottle No: 24', '70 cl', '49.1%', 'https://www.just-whisky.co.uk/july-2019/76249-glenlivet-70-years-old-1943-gm-private-collection.html', ' 21-07-2019 20:00', 'Private Collection Glenlivet 1943 by Gordon & MacPhail is quite simply one of the rarest Scotch whiskies ever bottled with only 42 decanters ever produced.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itemurl`
--
ALTER TABLE `itemurl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itemurl`
--
ALTER TABLE `itemurl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
