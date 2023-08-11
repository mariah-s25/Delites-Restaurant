-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: ,April 5 2023 at 09:59 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_delites`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminname` char(40) NOT NULL,
  `apassword` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminname`, `apassword`) VALUES
('admin1', 'php302'),
('admin2', 'i3302php');

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE IF NOT EXISTS `blogpost` (
  `bid` varchar(10) NOT NULL,
  `title` text NOT NULL,
  `author` char(40) NOT NULL,
  `content` text NOT NULL,
  `bpic` varchar(30) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`bid`, `title`, `author`, `content`, `bpic`, `date`) VALUES
('1124500', 'Bayrut By Hisham Assaad', 'Chef', 'This cookbook is a delight. The layout and graphics are exquisite and the photographs are outstanding and really capture all there is about Beirut. Hisham Assaad did an outstanding job with this work, he has a fine photographers eye and his shots deliver the essence of this city and its people.\r\n\r\nHe recipes are also judiciously picked. Mostly classics but approachable for the novice; Hisham also thrown in some of his own, which I found alluring.\r\n\r\nWhat I also loved about this book is that it is such a cohesive work. The layout an book design, the food styling, the location shots, all of its work harmoniously to reflect the charm and allure of Beirut.', 'blog1.png', '2022-07-30'),
('11201', 'Allo Beirut', 'Food Blogger', 'Do you miss Lebanon or feel like travelling back for a day without leaving Dubai? Allo Beirut is the answer. Inspired by Beirut old streets and our childhood nostalgic experiences, Allo Beirut provides you with the cheapest ticket home.\r\n\r\nWalk the streets of Beirut, enjoy the balconies, the old wooden windows, creative wall graffiti, an plunge into a fine traditional culinary experience the old local way.\r\n\r\nOrder a Shawarma, hummus, Mashawi, grilled chicken, Manakish or a Lebanese dessert... Simple food, no complication, and no twist, enjoy Lebanon in every bite!', 'blog2.png', '2020-10-26'),
('11202', '3 Reasons Why People Prefer Brunch', 'Food Blogger', 'Many cultures around the world would eat three meals a day, but brunch has grown in popularity, this fun meal that is not quite breakfast or lunch offers a limitless possibilities. Discover three reasons why people enjoy eating brunch.\r\n\r\n1 - It is Delicious and Varied \r\nBrunch goes beyond merely satisfying hunger. The best brunches offer a variety of beverages and sweet and savory foods. Some people treat the meal as a late breakfast, and some like to use the opportunity to get a head start on lunch.\r\n\r\n2 - The Timing Is Just Right\r\nThroughout the work week, individuals typically eat breakfast and lunch when their schedules dictate they should. But wih brunch, people can eat at the time they want.\r\nSome enjoy eating breakfast or lunch in addition to brunch, which can be an enjoyable and effective  way to maintain satiety in the first half of the day. On the other hand, some people replace one or both of those meals with brunch. Ultimately, brunch is a fexible approach to eating.\r\n\r\n3 - People Enjoy a Leisurely Meal\r\nAnother excellent reason why people enjoy eating brunch is that it is a leisurely meal. Many prefer to eat without a rush, and brunch is one of the best occasions for socializing with friends and family. Great food and company provide a sunny-side-up start to your day.', 'blog3.png', '2023-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE IF NOT EXISTS `chef` (
  `cid` varchar(10) NOT NULL,
  `name` char(40) NOT NULL,
  `rank` char(40) NOT NULL,
  `pic` varchar(30) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`cid`, `name`, `rank`, `pic`) VALUES
('20005', 'Hisham', 'Head Chef', 'chef1.png'),
('20015', 'Amir', 'Deputy Chef', 'chef2.png'),
('20035', 'Lea', 'Station Chef', 'chef3.png'),
('20045', 'Ali', 'Station Chef', 'chef4.png');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `eid` varchar(10) NOT NULL,
  `ename` char(40) NOT NULL,
  `eusername` varchar(40) NOT NULL,
  `epassword` varchar(15) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `ename`, `eusername`, `epassword`) VALUES
('6001', 'Alia', 'emp1', '3302'),
('6002', 'Ahmad', 'emp2', '302');

-- --------------------------------------------------------
--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `custid` varchar(10) NOT NULL,
  `name` char(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(8) NOT NULL,
  PRIMARY KEY (`custid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `name`, `username`, `password`,`email`,`phone`) VALUES
('8000', 'Omar', 'Omar80', '123','omar@gmail.com','03257468'),
('8100', 'Adam', 'Adam81', '345','adam@gmail.com','03265398'),
('8200','Sally','Sally82','567','sally@gmail.com','03257548'),
('8300','Hala','Hala83','789','hala@gmail.com','71384648'),
('8400','Lamar','Lamar84','901','lamar@gmail.com','03937284'),
('8500','Anna','Anna85','012','anna@gmail.com','81746294'),
('8600','Sara','Sara13','132','sara@gmail.com','03614752');


-- --------------------------------------------------------
--
-- Table structure for table `featuredfood`
--

CREATE TABLE IF NOT EXISTS `featuredfood` (
  `fid` varchar(10) NOT NULL,
  `fname` char(40) NOT NULL,
  `fdesc` text NOT NULL,
  `fprice` char(10) NOT NULL,
  `fpic` varchar(30) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featuredfood`
--

INSERT INTO `featuredfood` (`fid`, `fname`, `fdesc`, `fprice`, `fpic`) VALUES
('1050', 'Lahme Baajeen', 'Visit Baalback while your sitting in Beirut and enjoy a tasteful dish', '150,000L.L', 'pie.png'),
('1051', 'Ramadan Sweets', 'Enjoy ramadan nights with tasteful sweets', '200,000L.L', 'sweets.png'),
('1052', 'Lentil Soup', 'Start your Iftar with a tasteful lebanese soup', '70,000L.L', 'soup.png');

-- --------------------------------------------------------


--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `sid` varchar(10) NOT NULL,
  `name` char(40) NOT NULL,
  `pic` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`sid`, `name`, `pic`) VALUES
('1000', 'Breakfast', 'breakfast.jpg'),
('1001', 'Lunch', 'lunch.jpg'),
('1002', 'Dinner', 'dinner.jpg'),
('1003', 'Desssert', 'dessert.jpg');

-- --------------------------------------------------------


--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `mid` varchar(10) NOT NULL,
  `name` char(40) NOT NULL,
  `descr` text NOT NULL,
  `price` char(10) NOT NULL,
  `pic` varchar(30) NOT NULL,
  `catid` varchar(10) NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `catid` (`catid`),
  FOREIGN KEY (`catid`) REFERENCES `subcategory` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`mid`, `name`, `descr`, `price`, `pic`, `catid`) VALUES
('1010', 'Omelette', 'Fried beaten eggs mixed with cropped vegetables.', '100,000L.L', 'omelette.png', '1000'),
('1011', 'Manakish', 'All kinds of Manakish served to you with vegetables dish aside.', '70,000L.L', 'manakish.png', '1000'),
('1012', 'Croissants', 'A buttery crescent-shaped croissant filled with chocolate, cheese (with olives), thyme, pizza, or fajittas.', '90,000L.L', 'croissant.png', '1000'),
('1020', 'Grilled Steak', 'Grilled steak cooked to perfection, served alongside vegetable and mushroom sauce on the side. Wih your choice of rice, french fries or Mediterranean potatoes.', '200,000L.L', 'beef.png', '1001'),
('1021', 'Mashawi', 'A mixed grill party consisting of meat, tawook, kafta, chicken, onions, and tomatoes served with slices of spicy bread.', '300,000L.L', 'grill.png', '1001'),
('1022', 'Shawarma', 'Grilled chicken dipped in garlic sauce, with pickles on a loaf of white pita bread, served alongside french fries and fresh assorted vegetables.', '110,000L.L', 'shawarma.png', '1001'),
('1030', 'Burger', 'Grilled steak, topped with cheese, lettuce, tomatoes, pickles, and fresh onions on a whole wheat burger buns.', '105,000L.L', 'burger.png', '1002'),
('1031', 'Fajitta Sandwich', 'Grilled chicken with cheese, sweet bell peppers, mushrooms and onions on a whole wheat baguette.', '130,000L.L', 'fajitta.png', '1002'),
('1032', 'Lasagna', 'A rich creamy whole wheat pasta filled layer by layer with onions, meat and tomato topped with mozarella.', '150,000L.L', 'lasagna.png', '1002'),
('1040', 'Cheesecake', 'A thick and creamy filling of cheese, egge, and sugar on a thin crust and topped with blackberry.', '100,000L.L', 'cheesecake.png', '1003'),
('1041', 'Tiramitsu', 'Ladyfingers dipped in coffee, layered with a mixture of eggs, sugar and cheese, flavored with cocoa.', '110,000L.L', 'tiramissu.png', '1003'),
('1042', 'Oreo Crepe', 'Nutella, bananas and oreo biscuit, topped with oreo icecream and milky chocolate.', '105,000L.L', 'crepe.png', '1003');

-- --------------------------------------------------------


--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `oid` varchar(10) NOT NULL,
  `ctid` varchar(10) NOT NULL,
  `oday` date NOT NULL,
  `ohour` time NOT NULL,
  PRIMARY KEY (`oid`),
  FOREIGN KEY (`ctid`) references `customer` (`custid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `orders` (`oid`, `ctid`, `oday`,`ohour`) VALUES
('980011', '8000', '2023-4-10','10:30:00'),
('980021', '8100', '2023-4-9','14:15:00'),
('980031', '8200', '2023-4-10','18:20:00'),
('980041', '8300', '2023-4-6','16:30:00'),
('980051', '8400', '2023-4-8','20:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE IF NOT EXISTS `orders_items` (
  `orid` varchar(10) NOT NULL,
  `mrid` varchar(10) NOT NULL,
  `quantity` int (3) NOT NULL,
  FOREIGN KEY (`orid`) references `orders` (`oid`),
  FOREIGN KEY (`mrid`) references `menu` (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `orders_items` (`orid`, `mrid`, `quantity`) VALUES
('98001', '1011', '3'),
('98001', '1012', '2'),
('98001', '1010', '1'),
('98002', '1021', '1'),
('98002', '1022', '2'),
('98002', '1020', '1'),
('98003', '1031', '1'),
('98003', '1032', '1'),
('98004', '1022', '3'),
('98004', '1030', '2'),
('98005', '1042', '2'),
('98005', '1041', '2');

-- --------------------------------------------------------


--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `fdid` varchar(10) NOT NULL,
  `mfid` varchar(10) NOT NULL,
  `name` char (40) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`fdid`),
  FOREIGN KEY (`mfid`) references `menu` (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `feedback` (`fdid`,`mfid`,`name`,`text`) VALUES
('8364','1010','Ziad',' Great dish served'),
('9864','1042','Sandra','The chef is a master'),
('83087','1031','Omar','Best dish i have tasted'),
('986445','1042','Salim','I always come just to eat this dish'),
('8308723','1031','Lama','I need the recipe!!');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mesid` varchar(10) NOT NULL,
  `name` char(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(8) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`mesid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `message` (`mesid`,`name`,`email`,`phone`,`text`,`date`) VALUES
('276461','Ziad','ziad@gmail.com','81111111','Had a great time','2021-12-15'),
('028461','Joseph','joseph@gmail.com','71234234','Great Dishes','2022-07-20'),
('746361','Mary','mary@gmail.com','03847638','Amazing place','2023-01-01'),
('202741','Tara','tara@gmail.com','81626341','Good service','2022-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `rid` varchar(10) NOT NULL,
  `rday` varchar(10) NOT NULL,
  `rhour` varchar(10) NOT NULL,
  `phone` int(8) NOT NULL,
  `persons` int(3) NOT NULL,
  `custname` varchar(10) NOT NULL, 
  `custid` varchar(15) NOT NULL,
  PRIMARY KEY (`rid`),
  FOREIGN KEY (`custid`) REFERENCES `customer` (`custid`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `reservation` (`rid`,`rday`,`rhour`,`phone`,`persons`,`custname`,`custid`) VALUES
('457733','Monday','10:00:00','03257468','4','Omar','8000'),
('409733','Sunday','14:00:00','03265398','6','Adam','8100'),
('457754','Monday','18:00:00','03257548','2','Sally','8200'),
('727489','Thursday','16:00:00','71384648','4','Hala','8300'),
('294746','Saturday','20:00:00','03937284','6','Lamar','8400'),
('467832','Tuesday','08:00:00','81746294','4','Anna','8500');

-- --------------------------------------------------------
--
-- Table structure for table `subscribed`
--

CREATE TABLE IF NOT EXISTS `subscribed` (
  `email` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `subscribed` (`email`) VALUES
('sara@gmail.com'),
('amar@gmail.com'),
('hala@gmail.com'),
('yazan@gmail.com'),
('amir@gmail.com'),
('sally@gmail.com'),
('adam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `tid` int(5) NOT NULL,
  `seats` int(3) NOT NULL,
  `tday` char(10) NOT NULL,
  `thour` char(10) NOT NULL,
  `rid` varchar(10) DEFAULT NULL,
  `cstid` varchar (10) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  FOREIGN KEY (`rid`) REFERENCES `reservation` (`rid`),
  FOREIGN KEY (`cstid`) REFERENCES `customer` (`custid`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`tid` , `seats`, `tday`, `thour`, `rid`,`cstid`) VALUES
(12, 4, 'Monday', '10:00:00', '457733','8000'),
(49, 2, 'Monday', '18:00:00', '457754','8200'),
(71, 4, 'Tuesday', '08:00:00', '467832','8500'),
(253, 4, 'Thursday', '16:00:00', '727489','8300'),
(412, 6, 'Saturday', '20:00:00', '294746','8400'),
(457, 6, 'Sunday', '14:00:00', '409733','8100');


-- --------------------------------------------------------

--
-- Table structure for table `reservation_details`
--

CREATE TABLE IF NOT EXISTS `reservation_details` (
  `rid` varchar(10) NOT NULL,
  `tid` int(5) NOT NULL,
  FOREIGN KEY (`rid`) REFERENCES `reservation`(`rid`),
  FOREIGN KEY (`tid`) REFERENCES `tables`(`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_details`
--

INSERT INTO `reservation_details` (`rid`, `tid`) VALUES
('457733', '12'),
('409733', '457'),
('457754', '49'),
('727489', '253'),
('294746', '412'),
('467832', '71');

-- --------------------------------------------------------




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;