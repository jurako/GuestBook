-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2016 at 04:47 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `text` varchar(250) NOT NULL,
  `homepage` varchar(250) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `user_agent` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`user_id`, `username`, `email`, `text`, `homepage`, `user_ip`, `user_agent`, `date`) VALUES
(2, 'ggeorge0', 'ewood0@senate.gov', 'sed nulla sit amet massa faucibus fringilla. Duis ut euismod sem, sit amet sodales turpis. Maecenas mattis at massa eget consequat. Praesent sit amet consectetur libero. ', '', '', '', '7/10/2016'),
(3, 'pjohnston1', 'jwells1@ftc.gov', 'rpis. Mauris tristique est tellus, quis commodo nunc pulvinar scelerisque. Nunc ac lectus massa. Suspendisse dolor risus, faucibus ', '', '', '', '8/5/2016'),
(4, 'abell2', 'jcox2@wired.com', ' pellentesque quam. Nam consequat tortor sit amet velit posuere, eget malesuada augue efficitur. Integer sed nulla sit amet massa fa', '', '', '', '9/11/2015'),
(5, 'rwallace3', 'nmurray3@acquirethisname.com', 'ssa consequat venenatis eu eget lectus. Vestibulum ullamcorper lacus mi, et euismod orci tincidunt et. Cras consequat, felis eu cursus convalli', '', '', '', '4/13/2016'),
(6, 'cwood4', 'dreyes4@naver.com', 'lis. Nam non ipsum vitae nisl semper euismod sit amet vel nisl. Nullam rhoncus convallis enim. Integer tincidunt tortor in lectus aucto', '', '', '', '6/2/2016'),
(7, 'lramirez5', 'cgardner5@taobao.com', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus auctor, lectus sed venenatis pharetra', '', '', '', '1/24/2016'),
(8, 'creynolds6', 'jthomas6@eventbrite.com', 'tempor magna non, vehicula nulla. Integer ac lacinia elit. Morbi vitae massa orci. Integer nec lacus sed massa consequat venenatis e', '', '', '', '1/4/2016'),
(9, 'ssimmons7', 'awood7@cpanel.net', ' tellus, quis commodo nunc pulvinar scelerisque. Nunc ac lectus massa. Suspendisse dolor risus, faucibus at leo a, eleifend pellente', '', '', '', '2/29/2016'),
(10, 'kfuller8', 'apalmer8@github.io', 'a, eu pellentesque metus felis in libero. Phasellus sed pretium dolor. Nunc cursus ac nisl ut dignissim. Donec finibus pulvinar tristique. Viv', '', '', '', '4/29/2016'),
(11, 'tford9', 'kbanks9@skyrock.com', 't dui odio, eleifend vitae rutrum sed, pretium facilisis enim. Praesent erat quam, sodales euismod egestas non, suscipit quis ', '', '', '', '4/6/2016'),
(12, 'jbakera', 'kpowella@techcrunch.com', 'sque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus e', '', '', '', '1/2/2016'),
(13, 'sfullerb', 'jwestb@sciencedirect.com', ' nisl semper euismod sit amet vel nisl. Nullam rhoncus convallis enim. Integer tincidunt tortor in lectus auctor ultricies. Sed sagitti', '', '', '', '8/6/2016'),
(14, 'jcrawfordc', 'tdixonc@gov.uk', ' fringilla. Duis ut euismod sem, sit amet sodales turpis. Maecenas mattis at massa eget consequat. Praesent sit amet consectetur lib', '', '', '', '5/28/2016'),
(15, 'lstoned', 'csmithd@weather.com', 'pretium euismod, sem eros laoreet quam, eu feugiat nibh ipsum id arcu. Nullam auctor elementum nulla eu congue. Morbi vel dapibu', '', '', '', '7/12/2016'),
(16, 'ldixone', 'srosee@ebay.co.uk', 'netus et malesuada fames ac turpis egestas. Vivamus auctor, lectus sed venenatis pharetra, lectus diam sodales magna, eu pellentes', '', '', '', '4/25/2016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
