-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 07:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `billingAddress` varchar(255) DEFAULT NULL,
  `biilingCity` varchar(150) DEFAULT NULL,
  `billingState` varchar(100) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `billingCountry` varchar(100) DEFAULT NULL,
  `shippingAddress` varchar(300) DEFAULT NULL,
  `shippingCity` varchar(150) DEFAULT NULL,
  `shippingState` varchar(100) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `shippingCountry` varchar(100) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `userId`, `billingAddress`, `biilingCity`, `billingState`, `billingPincode`, `billingCountry`, `shippingAddress`, `shippingCity`, `shippingState`, `shippingPincode`, `shippingCountry`, `postingDate`) VALUES
(1, 12, 'A 123 XYZ Colony', 'Ghazibad', 'UP', 201014, 'India', 'A 123 XYZ Colony', 'Ghazibad', 'UP', 201014, 'India', '2023-09-05 07:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productQty` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userID`, `productId`, `productQty`, `postingDate`) VALUES
(2, 12, 15, 1, '2023-09-05 11:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `createdBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`, `createdBy`) VALUES
(1, 'Puzzle', 'A puzzle is a game, problem, or toy that tests a person\'s ingenuity or knowledge. In a puzzle, the solver is expected to put pieces together in a logical way, in order to arrive at the correct or fun solution of the puzzle', '2023-08-22 04:52:17', NULL, 1),
(2, 'Board Games', 'Board games are tabletop games that typically use pieces. These pieces are moved or placed on a pre-marked board and often include elements of table, card, role-playing, and miniatures games as well. Many board games feature a competition between two or more players', '2023-08-22 04:53:03', NULL, 1),
(3, 'Action figure', 'An action figure is a poseable character model figure made most commonly of plastic, and often based upon characters from a film, comic book, military, video game or television program; fictional or historical. These figures are usually marketed toward boys and adult collectors', '2023-08-22 04:53:24', NULL, 1),
(4, 'Doll', 'A doll is a model typically of a human or humanoid character, often used as a toy for children. Dolls have also been used in traditional religious rituals throughout the world. Traditional dolls made of materials such as clay and wood are found in the Americas, Asia, Africa and Europe', '2023-08-22 04:54:00', NULL, 1),
(5, 'Stuffed toy', 'A stuffed toy is a toy doll with an outer fabric sewn from a textile and stuffed with flexible material. They are known by many names, such as plush toys, plushies, stuffed animals, and stuffies; in Britain and Australia, they may also be called soft toys or cuddly toys.', '2023-08-22 04:54:25', NULL, 1),
(6, 'Construction set', 'A construction set is a set of standardized pieces that allow for the construction of a variety of different models. Construction sets are generally marketed as toys. One very popular brand of construction set toys is Lego', '2023-08-22 04:54:47', NULL, 1),
(7, 'Digital pet', 'A virtual pet is a type of artificial human companion. They are usually kept for companionship or enjoyment, as people may choose to keep a digital pet instead of a real one. Digital pets have no concrete physical form other than the hardware they run on. Interaction with virtual pets may or may not be goal oriented.', '2023-08-22 04:55:10', NULL, 1),
(8, 'Educational toy', 'Educational toys are objects of play, generally designed for children, which are expected to stimulate learning. They are often intended to meet an educational purpose such as helping a child develop a particular skill or teaching a child about a particular subject.', '2023-08-22 04:55:30', NULL, 1),
(9, 'Play-Doh', 'Play-Doh is a modeling compound for young children to make arts and crafts projects. The product was first manufactured in Cincinnati, Ohio, United States, as a wallpaper cleaner in the 1930s. Play-Doh was then reworked and marketed to Cincinnati schools in the mid-1950s.', '2023-08-22 04:55:53', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderNumber` bigint(12) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL,
  `totalAmount` decimal(10,2) DEFAULT NULL,
  `txnType` varchar(200) DEFAULT NULL,
  `txnNumber` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(120) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderNumber`, `userId`, `addressId`, `totalAmount`, `txnType`, `txnNumber`, `orderStatus`, `orderDate`) VALUES
(14, 562415123, 12, 1, 300.00, 'Cash on Delivery', '', 'Delivered', '2023-09-05 07:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetails`
--

CREATE TABLE `ordersdetails` (
  `id` int(11) NOT NULL,
  `orderNumber` bigint(12) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordersdetails`
--

INSERT INTO `ordersdetails` (`id`, `orderNumber`, `userId`, `productId`, `quantity`, `orderDate`, `orderStatus`) VALUES
(1, 562415123, 12, 15, 1, '2023-09-05 07:51:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `actionBy` int(3) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `canceledBy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `actionBy`, `postingDate`, `canceledBy`) VALUES
(1, 14, 'Packed', 'Packed', 1, '2023-09-05 07:52:02', NULL),
(2, 14, 'Dispatched', 'Item  Dispacted', 1, '2023-09-05 07:52:17', NULL),
(3, 14, 'In Transit', 'Item is in transit', 1, '2023-09-05 07:52:36', NULL),
(4, 14, 'Out For Delivery', 'Item is out for delivery', 1, '2023-09-05 07:52:56', NULL),
(5, 14, 'Delivered', 'Delivered', 1, '2023-09-05 07:53:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategoryName` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `createdBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategoryName`, `creationDate`, `updationDate`, `createdBy`) VALUES
(1, 2, 'Peg puzzles', '2023-08-22 04:57:41', '2023-09-04 06:25:01', 1),
(2, 1, 'Shape sorters', '2023-08-22 04:59:19', NULL, 1),
(3, 1, 'Chunky wooden puzzles', '2023-08-22 04:59:32', NULL, 1),
(4, 1, '2, 3, 4, 8 or 12-piece jigsaw puzzles', '2023-08-22 04:59:44', NULL, 1),
(5, 1, 'Cube puzzles', '2023-08-22 04:59:56', NULL, 1),
(6, 1, 'Puzzles with wooden boards', '2023-08-22 05:00:10', NULL, 1),
(7, 2, 'race', '2023-08-22 05:00:39', NULL, 1),
(8, 2, 'chase', '2023-08-22 05:00:47', NULL, 1),
(9, 2, 'space', '2023-08-22 05:00:56', NULL, 1),
(10, 2, 'displace', '2023-08-22 05:01:07', NULL, 1),
(11, 3, 'firm', '2023-08-22 05:02:06', NULL, 1),
(12, 3, 'jointed', '2023-08-22 05:02:17', NULL, 1),
(13, 4, 'African dolls', '2023-08-22 05:02:39', NULL, 1),
(14, 4, 'Apple doll', '2023-08-22 05:02:51', NULL, 1),
(15, 4, 'Art doll', '2023-08-22 05:03:05', NULL, 1),
(16, 4, 'Baby Alive', '2023-08-22 05:03:15', NULL, 1),
(17, 5, 'Stuffed Doll', '2023-08-23 04:46:47', NULL, 1),
(18, 6, 'Building Construction Set', '2023-08-23 04:48:02', NULL, 1),
(19, 6, 'Magnetic Building Blocks', '2023-08-23 04:48:29', NULL, 1),
(20, 8, 'Flash Card', '2023-08-23 04:49:45', NULL, 1),
(21, 8, 'Alphabets and Numbers', '2023-08-23 04:50:09', NULL, 1),
(22, 8, 'Science Experiment', '2023-08-23 04:50:29', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactNumber` bigint(12) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`, `contactNumber`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', 45231025890, '2023-09-03 16:21:18', '2023-09-04 08:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `id` int(11) NOT NULL,
  `BrandName` text DEFAULT NULL,
  `BrandDescription` mediumtext DEFAULT NULL,
  `createdBy` int(10) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbrand`
--

INSERT INTO `tblbrand` (`id`, `BrandName`, `BrandDescription`, `createdBy`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Disney', 'The band acts as your theme park entry ticket, your Disney Resort Hotel room key and a charging card for buying merchandise, food and drinks.', 1, '2023-08-21 12:33:51', NULL),
(2, 'Funskools', 'Funskool is India\'s leading toy manufacturing company promoted by the MRF group. Having commenced its commercial operations in the year 1988, the company has a state-of-the-art manufacturing facility at Goa, located in a sprawling area of 80,000 sq. ft. and a second factory at Ranipet', 1, '2023-08-21 12:37:45', '2023-08-22 04:45:20'),
(3, 'XYZ', 'Funskool is India\'s leading toy manufacturing company promoted by the MRF group. Having commenced its commercial operations in the year 1988, the company has a state-of-the-art manufacturing facility at Goa, located in a sprawling area of 80,000 sq. ft. and a second factory at Ranipet', 1, '2023-08-21 12:45:17', '2023-08-22 04:45:48'),
(4, 'Barbie', 'Barbie is a fashion doll created by American businesswoman Ruth Handler, manufactured by American toy company Mattel and launched in 1959. The toy is the figurehead of the Barbie brand that includes a range of fashion dolls and accessories', 1, '2023-08-21 12:45:55', NULL),
(5, 'Chicco', 'Chicco is one of the biggest retailers of kids’ clothing and toys in the world. The company was founded in the year 1958 with headquarters in Como, Lombardy, Italy. The brand has a massive customer base in India and exports to more than 120 countries today. From feeding accessories to kids’ bath care to fashional apparel to fun toys, it is a one-stop solution for all needs.', 1, '2023-08-21 12:46:25', NULL),
(6, 'Fisher-Price', 'Fisher-Price is an American company that makes educational toys for kids and adults. It was founded in the year 1930 by Herman Fisher, Irving Price, Margaret Evans Price, Helen Schelle, and Rebecca D Fisher and had its headquarters in East Aurora, New York. While this company has a well-established market in India, it also exports its top-quality toys to several countries worldwide.', 1, '2023-08-21 12:46:52', NULL),
(7, 'Toyshine', 'Toyshine is one of the largest toy manufacturers in India. The company was founded in 2004 by Rohit Khanna and had its headquarters in Jalandhar, Punjab. It retails top-quality toys that are durable and convenient for kids. The brand also sells toys from the biggest manufacturers such as Barbie, Disney, Nerf, and Hot Wheels. The unique collection of toys by Toyshine is worth exploring.', 1, '2023-08-21 12:47:23', NULL),
(8, 'Hot Wheels', 'Almost every car lover has heard this brand, and there’s no reason why they wouldn’t. Hot Wheels is a highly established toy car brand that was founded in 1968 by Mattel. The company has its headquarters in the US and exports to most parts of the world, including India. If your kid is interested in cars, this is the brand that you must pick for gifting them a toy.', 1, '2023-08-21 12:47:48', NULL),
(9, 'Lego', 'Lego is another leading toy brand that has made a mark in the global market with its unique range of products. It’s widely known for its interlocking plastic brick games, and millions of kids and adults enjoy it. The company was founded in 1932 by Ole Kirk Christiansen and had its headquarters in Billund, Denmark. It has different types of toy options that cater well to boost kids’ intelligence.', 1, '2023-08-21 12:48:14', NULL),
(10, 'Hamleys', 'Hamleys is one of the largest toy retailers in the world today. The company was founded in 1760 by William Hamley and had more than 90 franchises worldwide. This British brand makes toys, games, and dolls for kids of all age groups. With multiple stores all across the world, this brand offers a magical experience with live demos, interaction with cartoon characters, and extensive options.', 1, '2023-08-21 12:48:59', NULL),
(11, 'Mattel', 'Founded in 1945 by Harold Matson, Elliot Handler, and Ruth Handler, Mattel is one of the largest toy suppliers in India as well as the entire world. The company has a solid global network and exports to several countries. It also owns many toy and entertainment brands and has the strongest catalog for child’s entertainment. Mattel has headquarters in California, but you can easily find its products online', 1, '2023-08-21 12:49:31', NULL),
(12, 'Simba', 'Simba Dickie Group is a German toy company that was founded in 1982 by Fritz Sieber and Micheal Sieber. It is counted amongst the top 5 manufacturers of kids’ toys in Germany and has a massive customer base internationally as well. With headquarters in Furth, Bavaria, Germany, Simba exports to over 30 countries worldwide today. In India, it has a huge fan base for high-quality toys.', 1, '2023-08-21 12:50:24', NULL),
(13, 'Playskool', 'Playskool is an American company that makes educational and fun toys for children. It was launched in the year 1928 and is a subsidiary of Hasbro. With headquarters in Rhode Island, Playskool has gained a considerable amount of fandom worldwide and is known to be very reliable regarding kids’ toys.', 1, '2023-08-21 12:50:52', NULL),
(14, 'Hasbro', 'Hasbro is a popular American toy and games company that was founded in 1923 by Henry Hassenfeld, Hillel Hassenfeld, and Herman Hassenfeld. The company has a global reputation for manufacturing top-quality toys and games such as Power Rangers, Transformers, Monopoly, and My Little Pony. Since the time it entered the Indian market, it has held a special place in kids’ life.', 1, '2023-08-21 12:51:11', NULL),
(15, 'Playmates', 'Playmates is a Hong Kong-based company that manufactures kids’ toys and action figures. It was founded in 1966 by Sam Chan and had its headquarters in Hong Kong and multiple subsidiaries in Boston and California. This company is highly known for manufacturing quality toys and creatures of various cartoon characters.', 1, '2023-08-21 12:51:54', NULL),
(16, 'Masoom Playmates', 'Masoom Toy Shop was launched by Kailash Chand Jain in the year 1942 and is known as one of the best toy companies in India. The brand has a great online presence and enjoys attention from every part of the country. It’s popular for making mechanical and battery-operated toys which are an absolute favorite of kids across the board.', 1, '2023-08-21 12:52:14', NULL),
(17, 'Firstcry', 'Founded in 2010, Firstcry is one of the fastest-growing e-commerce companies that manufacture products for kids in India. It retails everything from clothes to diapers to toys for children. The company is owned by Brainbees Solutions Pvt. Ltd. and has its headquarters in Pune, Maharashtra. It is a perfect destination for all your child’s needs.', 1, '2023-08-21 12:52:34', NULL),
(18, 'Babyhug', 'Babyhug is one of India’s most trusted baby brands that has earned its position with exceptional quality products. It manufactures everything from baby gear, clothes, diapers, and toys to feeding and nursing products. If you’re looking for a one-stop shop for baby products in India, you must check out this brand. You can trust it for quality, innovative design products.', 1, '2023-08-21 12:53:03', NULL),
(19, 'Mothercare', 'Founded in 1961 by Selim Zilkha James Goldsmith, Mothercare is a leading mom and child care brand. It manufactures everything from kids’ clothing, toys, and gear to mother-feeding care items. This British brand has its headquarters in Hertfordshire and a great presence in different parts of the world.', 1, '2023-08-21 12:53:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(5) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `dateofcontact` timestamp NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL,
  `ReadDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `Name`, `Email`, `Phone`, `Message`, `dateofcontact`, `IsRead`, `ReadDate`) VALUES
(1, 'Rajat Mehta', 'admin@gmail.com', 1234567899, 'fghfghsdfer', '2023-08-23 06:14:19', 1, '2023-08-29 06:43:51'),
(2, 'Anuj Kumar', 'gjsjdk@gmail.com', 24234325, 'This is for testing', '2023-09-05 08:03:00', 1, '2023-09-05 08:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', 'Welcome to The Toy Shop, a treasure trove of children’s toys, games, and gifts.\r\nWith 16 years experience in the toy trade, we decided to take the plunge and open our first shop on the 1st of June 2017.\r\nOur aim was to create a magical space for kids (and kids at heart), where they could touch, feel, play and interact with the toys they see. To create an experience, not just a shopping trip. To supply our valued customer with toys of the highest quality and value for money.', NULL, NULL, '2023-08-22 12:11:10'),
(2, 'contactus', 'Contact Us', '#890 CFG Apartment, Mayur Vihar, Delhi-India.', 'toysstoreinfo@test.com', 1234567890, '2023-08-22 12:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblreview`
--

CREATE TABLE `tblreview` (
  `ID` int(5) NOT NULL,
  `ProductID` int(5) DEFAULT NULL,
  `ReviewTitle` mediumtext DEFAULT NULL,
  `Review` longtext DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `DateofReview` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Remark` mediumtext DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreview`
--

INSERT INTO `tblreview` (`ID`, `ProductID`, `ReviewTitle`, `Review`, `Name`, `DateofReview`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 15, 'Good Toy', 'Nice toy, Good for Kids', 'Sarita', '2023-09-03 20:01:25', '', 'Review Accept', '2023-09-03 20:01:25'),
(2, 15, 'Good Toy', 'Must buy toy for every kid', 'Shanu Mishra', '2023-09-03 20:01:30', '', 'Review Accept', '2023-09-03 20:01:30'),
(3, 13, 'abc', 'Must buy toy for every kid', 'gjh', '2023-09-03 20:01:32', NULL, NULL, '2023-09-03 20:01:32'),
(4, 10, 'Good Material', 'Nice toy, Good for Kids', 'Rajat Mehta', '2023-09-03 19:15:29', NULL, 'Review Accept', '2023-09-03 19:15:29'),
(5, 10, 'Excellent Toy', 'Must buy toy for every kid', 'rasdha', '2023-09-03 19:16:17', NULL, 'Review Accept', '2023-09-03 19:16:17'),
(6, 8, 'ghg', 'It\'s cool toy for kids.', 'ghjg', '2023-09-03 20:02:19', NULL, NULL, '2023-09-03 20:02:19'),
(7, 11, 'Good Toy', 'My toddler loved the toy. Satisfied with the product.', 'Manav', '2023-09-03 20:02:47', NULL, NULL, '2023-09-03 20:02:47'),
(8, 9, 'Good Toy', 'Very attractive design ,in very very cheap price ....', 'Shanu Mishra', '2023-09-03 20:03:25', NULL, NULL, '2023-09-03 20:03:25'),
(9, 15, 'Excellent Toys', 'This is good toy', 'John Doe', '2023-09-05 08:02:15', '', 'Review Accept', '2023-09-05 08:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscriber`
--

CREATE TABLE `tblsubscriber` (
  `id` int(5) NOT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `SubscriptionDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubscriber`
--

INSERT INTO `tblsubscriber` (`id`, `Email`, `SubscriptionDate`) VALUES
(1, 'test123@gmail.com', '2023-08-23 05:49:17'),
(2, 'ak30@gmail.com', '2023-09-05 08:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbltoys`
--

CREATE TABLE `tbltoys` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `ToyName` varchar(255) DEFAULT NULL,
  `Brandid` varchar(255) DEFAULT NULL,
  `Age` varchar(20) DEFAULT NULL,
  `Battery` varchar(20) DEFAULT NULL,
  `Materials` varchar(255) DEFAULT NULL,
  `ProductDimension` varchar(250) DEFAULT NULL,
  `BoxDimension` varchar(250) DEFAULT NULL,
  `Countryoforigin` varchar(250) DEFAULT NULL,
  `Instruction` varchar(250) DEFAULT NULL,
  `ToyPriceAfterDiscount` decimal(10,2) DEFAULT NULL,
  `ToyPriceBeforeDiscount` decimal(10,2) DEFAULT NULL,
  `ToyDescription` longtext DEFAULT NULL,
  `Features` mediumtext DEFAULT NULL,
  `ToyImage1` varchar(255) DEFAULT NULL,
  `ToyImage2` varchar(255) DEFAULT NULL,
  `ToyImage3` varchar(255) DEFAULT NULL,
  `ShippingCharge` decimal(10,2) DEFAULT NULL,
  `ToyAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `addedBy` int(11) DEFAULT NULL,
  `lastUpdatedBy` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltoys`
--

INSERT INTO `tbltoys` (`id`, `category`, `subCategory`, `ToyName`, `Brandid`, `Age`, `Battery`, `Materials`, `ProductDimension`, `BoxDimension`, `Countryoforigin`, `Instruction`, `ToyPriceAfterDiscount`, `ToyPriceBeforeDiscount`, `ToyDescription`, `Features`, `ToyImage1`, `ToyImage2`, `ToyImage3`, `ShippingCharge`, `ToyAvailability`, `postingDate`, `updationDate`, `addedBy`, `lastUpdatedBy`) VALUES
(1, 1, 1, 'Toyshine Wooden ABC 123 Chunky Letters', '13', '?12 months and up', 'Required', 'Wood', '?33.4 x 30.4 x 5 cm', '?31.4 x 30.4 x 6 cm', 'China', 'ghghjgjhgjhgjhgjhg', 200.00, 300.00, 'toydescription', 'SAFE&NON-TOXIC MARTERIAL: BPA free and environmental-friendly. These puzzles are made of sturdy and smooth wooden materials which have smooth edges and suitable size that great for little hands to handle and play. Easy to pick and sit well in their spot', '753d20931fbb42543c6af30c3f596057.jpg', 'e1954f0e9d02f74f15a8aec495946be0.jpg', '9bbd50e2bb111f0319357657d0605d27.jpg', 10.00, 'In Stock', '2023-08-22 06:26:49', '2023-08-23 05:02:34', 1, 1),
(2, 1, 2, 'Shape Sorter and Stacker', '12', '0 To 24 Months', 'Required', 'Plastic', 'L 11 x B 11 x H 11 cm', 'L 11 x B 11 x H 11 cm', 'India', 'gjhgsdjjashytgrw', 200.00, 300.00, 'toydescription', 'Key Features:\r\n\r\n34 Pieces of different shapes in 6 colours\r\nEasy to grip shapes\r\nDevelops colour and shape recognition in children\r\nPromotes hand-eye coordination as well as problem solving in a child\r\nMade with non-toxic material keeping a child\'s safety as top priority\r\nFun activity to engage and learn for children', 'b1717d080a62b5c47aa5c1e06d7cd3ad.jpg', 'e8bb9cd19ee5a690eec97f6ca0cf14d1.jpg', 'c18611a92b30caa3121e07339235ba87.jpg', 100.00, 'In Stock', '2023-08-22 06:38:17', '2023-08-23 05:05:21', 1, 1),
(3, 2, 7, 'Water Fishing Game Set Battery Operated', '6', 'above 3 yrs', 'Required', 'Plastic', '?33.4 x 30.4 x 5 cm', '?31.4 x 30.4 x 6 cm', 'India', 'gjhgjhgkghjlhilhiuyui', 600.00, 800.00, 'Specifications:\r\n\r\nBrand - Fiddlerz\r\n\r\nType - Fishing toy\r\n\r\nAge - 3 Years+\r\n\r\nProduct dimension - L 30.5 x B 30.5 x H 5.5 cm\r\n\r\n\r\n\r\nProduct Description:\r\n\r\nPour enough water on the play table and turn on the switch under table, the rotating fan will creates a whirlpool effect that make more fun.\r\n\r\n\r\n\r\nItems included in the Package:\r\n\r\n1 set Of Fishing Toys', 'Key Features:\r\n\r\nThe fishing game has 2 playing mode: difficult mode - hook skill fishing, easy mode - magnetic suction fishing.\r\nTotal 25 pieces, includes poles, fishes, starfishes, whirlpool spinner, musical lighthouse, spoons, water cup.\r\nThe toy is made of high quality plastic without sharp corners, components of this product are not easy to be broken.', '90cbf971a2444d692495f060be38461d.jpg', 'c0ee8aa350cf0aad4b31c9417b3cbf49.jpg', '9b748deb01d26b49c9047a43e3dd3caf.jpg', 100.00, 'In Stock', '2023-08-22 06:44:28', '2023-08-23 05:11:48', 1, 1),
(4, 2, 7, 'Racetrack ', '16', 'above 3 yrs', 'Required', 'Plastic', '33.4 x 30.4 x 5 cm', '31.4 x 30.4 x 6 cm', 'India', 'gjhgjhgkghjlhilhiuyui', 600.00, 800.00, 'toydescription', 'Key Features:\r\nParent-Child Interaction playing with the family is a great opportunity to learn. Par can teach children word, colors, and fruit during the game. Practice word recognition by inserting cards into the machine. Which will inspire children\'s language skills and shape coordination ability. This is a simple and fun interactive educational toy for kids and parents.\r\nSight word flashcards are made with heavyweight cards, smooth edges, environmentally friendly colorful paint. Safety for children. Size: 2.3×3.5 inch, perfect hand-held size. The machine is made of ABS material, which is durable and smooth to prevent breaking\r\nParent-Child Interaction playing with the family is a great opportunity to learn. Par can teach children word, colors, and fruit during the game. Practice word recognition by inserting cards into the machine. Which will inspire children\'s language skills and shape coordination ability. This is a simple and fun interactive educational toy for kids and parents.', 'a343701d5cb159fbc0d699bca2ce50a7.jpg', 'bef6a87458964e3e00194dd72aff09dc.jpg', '9c74a8e84a7b7068ccfde4105ab898ae.jpg', 100.00, 'In Stock', '2023-08-22 06:44:28', '2023-09-03 19:21:58', 1, 1),
(5, 1, 2, 'Shape Sorter and Stacker', '17', '0 To 24 Months', 'Required', 'Plastic', 'L 11 x B 11 x H 11 cm', 'L 11 x B 11 x H 11 cm', 'India', 'gjhgsdjjashytgrw', 200.00, 300.00, 'toydescription', 'Key Features:\r\n\r\n34 Pieces of different shapes in 6 colours\r\nEasy to grip shapes\r\nDevelops colour and shape recognition in children\r\nPromotes hand-eye coordination as well as problem solving in a child\r\nMade with non-toxic material keeping a child\'s safety as top priority\r\nFun activity to engage and learn for children', '75e2f49cb13e690df86f3d66b4623f37.jpg', '3d5daf4946666089d2b38fdbfa0dfe5c.jpg', 'fb7effaa45158ef2d12643a26f6c7f45.jpg', 100.00, 'In Stock', '2023-08-22 06:38:17', '2023-08-23 05:06:50', 1, 1),
(6, 1, 2, 'Shape Sorter and Stacker', '17', '0 To 24 Months', 'Required', 'Plastic', 'L 11 x B 11 x H 11 cm', 'L 11 x B 11 x H 11 cm', 'India', 'gjhgsdjjashytgrw', 200.00, 300.00, 'toydescription', 'Key Features:\r\n\r\n34 Pieces of different shapes in 6 colours\r\nEasy to grip shapes\r\nDevelops colour and shape recognition in children\r\nPromotes hand-eye coordination as well as problem solving in a child\r\nMade with non-toxic material keeping a child\'s safety as top priority\r\nFun activity to engage and learn for children', 'ee1d82be1fd8340f29914bea62a8e095.jpg', '9093feb339ce5749f193e87c40783ccf.jpg', 'ce644222a75b5dc18095d76393774c70.jpg', 100.00, 'In Stock', '2023-08-22 06:38:17', '2023-08-23 05:03:59', 1, 1),
(7, 1, 1, 'Toyshine Wooden ABC 123 Chunky Letters', '7', '12 months and up', 'Notrequired', 'Wood', '33.4 x 30.4 x 5 cm', '31.4 x 30.4 x 6 cm', 'China', 'ghghjgjhgjhgjhgjhg', 200.00, 300.00, 'toydescription', 'SAFE&NON-TOXIC MARTERIAL: BPA free and environmental-friendly. These puzzles are made of sturdy and smooth wooden materials which have smooth edges and suitable size that great for little hands to handle and play. Easy to pick and sit well in their spot', '753d20931fbb42543c6af30c3f596057.jpg', 'e1954f0e9d02f74f15a8aec495946be0.jpg', '9bbd50e2bb111f0319357657d0605d27.jpg', 10.00, 'In Stock', '2023-08-22 06:26:49', '2023-09-04 16:57:11', 1, 1),
(8, 5, 17, 'Babyhug Baby Lion Soft Toy Yellow - Height 25 cm', '18', '2 Years+', 'Required', 'Outer material - poly velor fabric  Inner filling - polyster fiber', 'L 11 x B 11 x H 11 cm', 'L 11 x B 11 x H 11 cm', 'India', 'Key Features:\r\nKeeps kids playful for long hours\r\nMade with quality material, safe for kids\r\nDevelops social and emotional growth', 200.00, 300.00, 'Designed in an attractive colour and made from soft fabric, this furry friend will surely make a great addition to your child\'s toy collection. Reliable and safe for your child to play with, this cartoon soft toy is great at hugging, comforting and is fond of mischief and play! ', 'Keeps kids playful for long hours\r\nMade with quality material, safe for kids\r\nDevelops social and emotional growth', '7bbebdb0f79dda4e829c3659ef49e6fc.jpg', '279af1202776987e9dabb3070bfd3469.jpg', '5686de8ec1755c1feffba4e62e341ca9.jpg', 50.00, 'In Stock', '2023-08-22 06:38:17', '2023-08-23 04:59:51', 1, 1),
(9, 8, 20, 'Intelliskills 190 Brain Boosting Flashcards', '14', '2 to 4 yrs', 'Required', 'Paper', 'L 29.7 x B 19.54 x H 1.10 cm', 'L 29.7 x B 19.54 x H 1.10 cm', 'India', 'These flashcards assist your child in identifying the world around them while also enhancing their general knowledge and developing their recognition and recall skills', 200.00, 300.00, 'Product Description:\r\n\r\nTeach your kids new concepts with Intelliskills all-new - Brain Boosting Flashcards. The set of 7 makes a great versatile learning tool for children that not only allows them to interact and retain information but also makes learning fun. The purpose of flashcards is to improve active recall in young children and increase their knowledge retention. These vibrant graphic cards stimulate learning in a fun and effective way while also helping with memory improvement.\r\n\r\n\r\n\r\nItems Included in Package:\r\n\r\n190+ Cards (Set of 7 Flashcards Animals, Birds, Fruits, Vegetables, Numbers, the Alphabet and Shapes and Colours).\r\n\r\n\r\n\r\nNote: Adult supervision is advised. Minor colour changes may exist, but these do not impact the quality of the product.', 'Key Features:\r\n\r\nDevelops Memory: Using flashcards helps children become more aware of their surroundings, encourages object recognition, and helps develop a photographic memory. They also support learning through memorization by using \'active recall.\' Flashcards boost cognitive development and critical thinking by triggering a quick recall.\r\nEnhances Vocabulary: These durable flashcards build your child\'s vocabulary and boost & fine-tune their overall language skills.\r\nTeaches New Concepts: The main objective of using flashcards is to improve a child\'s knowledge on different subjects and concepts. It not only gives them an edge through knowledge enhancement but also improves their self-confidence by being exposed to, and learning bits of new information every day.\r\nDevelops Fine Motor Skills: Your child\'s interaction with the easy-to-grip Intelliskills Brain-Boosting Flashcards builds their fine motor skills and strengthens their grasp. Early development of fine motor abilities can help children succeed academically, socially, and personally.\r\nCreates Visual Stimulation: Learning becomes enjoyable and engaging thanks to the colourful pictures on the flashcards. Flashcards help creating curiosity by capturing the child\'s attention through visual stimulation.', '109db167b2c20c98e4fcd526b3739ebe.jpg', 'dbb695f17ca7de27415999a8750d0977.jpg', 'ef932b247666e7624fbc7b8c2bc33b53.jpg', 100.00, 'In Stock', '2023-08-22 06:38:17', '2023-08-23 04:55:03', 1, 1),
(10, 4, 15, 'Racetrack ', '13', 'above 3 yrs', 'Required', 'Plastic', '33.4 x 30.4 x 5 cm', '31.4 x 30.4 x 6 cm', 'India', 'gjhgjhgkghjlhilhiuyui', 600.00, 800.00, 'hdjfhjdkshfjkrhjkhreskjg\r\nhdfreytuirt\r\niurywuiryuieytui', 'Key Features:\r\nParent-Child Interaction playing with the family is a great opportunity to learn. Par can teach children word, colors, and fruit during the game. Practice word recognition by inserting cards into the machine. Which will inspire children\'s language skills and shape coordination ability. This is a simple and fun interactive educational toy for kids and parents.\r\nSight word flashcards are made with heavyweight cards, smooth edges, environmentally friendly colorful paint. Safety for children. Size: 2.3×3.5 inch, perfect hand-held size. The machine is made of ABS material, which is durable and smooth to prevent breaking\r\nParent-Child Interaction playing with the family is a great opportunity to learn. Par can teach children word, colors, and fruit during the game. Practice word recognition by inserting cards into the machine. Which will inspire children\'s language skills and shape coordination ability. This is a simple and fun interactive educational toy for kids and parents.', 'd7db569c4424e9d0e27801fcff77653d.jpg', '7f681fe302a9f67bd4e256e93f590415.jpg', '3b912d7c8ed2e70371a7051f442482d1.jpg', 100.00, 'In Stock', '2023-08-22 06:44:28', '2023-09-03 19:22:37', 1, 1),
(11, 1, 1, 'Toyshine Wooden ABC 123 Chunky Letters', '7', '?12 months and up', 'Notrequired', 'Wood', '33.4 x 30.4 x 5 cm', '31.4 x 30.4 x 6 cm', 'China', 'ghghjgjhgjhgjhgjhg', 200.00, 300.00, 'toydescription', 'SAFE&NON-TOXIC MARTERIAL: BPA free and environmental-friendly. These puzzles are made of sturdy and smooth wooden materials which have smooth edges and suitable size that great for little hands to handle and play. Easy to pick and sit well in their spot', '753d20931fbb42543c6af30c3f596057.jpg', 'e1954f0e9d02f74f15a8aec495946be0.jpg', '9bbd50e2bb111f0319357657d0605d27.jpg', 10.00, 'In Stock', '2023-08-22 06:26:49', '2023-09-03 19:22:44', 1, NULL),
(12, 3, 11, 'Ratanas Action Figure', '17', '0 To 24 Months', 'Notrequired', 'Plastic', 'L 11 x B 11 x H 11 cm', 'L 11 x B 11 x H 11 cm', 'India', 'gjhgsdjjashytgrw', 200.00, 300.00, 'bdghjgwdfjhe\r\nweriuvyrtebyu', 'Key Features:\r\n\r\n34 Pieces of different shapes in 6 colours\r\nEasy to grip shapes\r\nDevelops colour and shape recognition in children\r\nPromotes hand-eye coordination as well as problem solving in a child\r\nMade with non-toxic material keeping a child\'s safety as top priority\r\nFun activity to engage and learn for children', '82667a859e93a9665e8413a137dffa48.jpg', 'e3cc0da613833a18cb41ad2f25e2560c.jpg', 'a0248fe68c88cac3f4a2032f1e09cdc2.jpg', 100.00, 'In Stock', '2023-08-22 06:38:17', '2023-08-25 06:41:33', 1, 1),
(13, 4, 16, 'Baby Alive Doll', '16', 'above 4 yrs', 'Notrequired', 'Plastic', '?33.4 x 30.4 x 5 cm', '?31.4 x 30.4 x 6 cm', 'India', 'gjhgjhgkghjlhilhiuyui', 600.00, 800.00, 'kjhjkhjksdhvkjhjvbyr\r\niu5vtiyuivybh\r\nkrytuivyui', 'Key Features:\r\nParent-Child Interaction playing with the family is a great opportunity to learn. Par can teach children word, colors, and fruit during the game. Practice word recognition by inserting cards into the machine. Which will inspire children\'s language skills and shape coordination ability. This is a simple and fun interactive educational toy for kids and parents.\r\nSight word flashcards are made with heavyweight cards, smooth edges, environmentally friendly colorful paint. Safety for children. Size: 2.3×3.5 inch, perfect hand-held size. The machine is made of ABS material, which is durable and smooth to prevent breaking\r\nParent-Child Interaction playing with the family is a great opportunity to learn. Par can teach children word, colors, and fruit during the game. Practice word recognition by inserting cards into the machine. Which will inspire children\'s language skills and shape coordination ability. This is a simple and fun interactive educational toy for kids and parents.', '64368a4fba0ff604c72f6004f65b81a3.jpg', '09815cd30740cf857aded8bffa8cb2bb.jpg', 'd7c13d396abd7022bece506e6d65168e.jpg', 100.00, 'In Stock', '2023-08-22 06:44:28', '2023-08-22 12:54:18', 1, 1),
(14, 2, 7, 'Racetrack ', '17', 'above 3 yrs', 'Notrequired', 'Plastic', '?33.4 x 30.4 x 5 cm', '?31.4 x 30.4 x 6 cm', 'India', 'gjhgjhgkghjlhilhiuyui', 600.00, 800.00, 'toydescription', 'Key Features:\r\nParent-Child Interaction playing with the family is a great opportunity to learn. Par can teach children word, colors, and fruit during the game. Practice word recognition by inserting cards into the machine. Which will inspire children\'s language skills and shape coordination ability. This is a simple and fun interactive educational toy for kids and parents.\r\nSight word flashcards are made with heavyweight cards, smooth edges, environmentally friendly colorful paint. Safety for children. Size: 2.3×3.5 inch, perfect hand-held size. The machine is made of ABS material, which is durable and smooth to prevent breaking\r\nParent-Child Interaction playing with the family is a great opportunity to learn. Par can teach children word, colors, and fruit during the game. Practice word recognition by inserting cards into the machine. Which will inspire children\'s language skills and shape coordination ability. This is a simple and fun interactive educational toy for kids and parents.', '4f9550fd93bf2459e73d3c695c5721e4.jpg', '7a1a279a10f27f24d07bc86ecda47061.jpg', 'c92ff4b0d7bc3ca70b7f5a3bbe9cff11.jpg', 100.00, 'In Stock', '2023-08-22 06:44:28', '2023-08-22 12:58:58', 1, 1),
(15, 1, 2, 'Ratanas Shape Sorter and Stacker', '17', '0 To 24 Months', 'Required', 'Plastic', 'L 11 x B 11 x H 11 cm', 'L 11 x B 11 x H 11 cm', 'India', 'gjhgsdjjashytgrw', 200.00, 300.00, 'vdshfkjhfkjyhrdukgitnbty\r\nmcvtuivyni', 'Key Features:\r\n\r\n34 Pieces of different shapes in 6 colours\r\nEasy to grip shapes\r\nDevelops colour and shape recognition in children\r\nPromotes hand-eye coordination as well as problem solving in a child\r\nMade with non-toxic material keeping a child\'s safety as top priority\r\nFun activity to engage and learn for children', 'cb4c8cfe598a355be66b60d0820046fe.jpg', 'b5fe79359573a061dfba22dda52d6388.jpg', '78f13ab38df93034a883e85b1b36e193.jpg', 100.00, 'In Stock', '2023-08-22 06:38:17', '2023-09-04 16:52:18', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `regDate`, `updationDate`) VALUES
(8, 'Rakesh Singh', 'rak@gmail.com', 1234567899, '202cb962ac59075b964b07152d234b70', '2023-08-14 12:46:38', '2023-08-25 12:54:41'),
(9, 'Test Test123', 'test123@gmail.com', 6868686871, '202cb962ac59075b964b07152d234b70', '2023-08-20 08:53:01', NULL),
(10, 'Sarita Pandey', 'sarita@gmail.com', 4578962356, '202cb962ac59075b964b07152d234b70', '2023-08-25 13:06:47', NULL),
(12, 'John Doe', 'jhnde12@gmail.com', 1414152362, 'f925916e2754e5e03f75dd58a5733251', '2023-09-05 07:48:17', '2023-09-05 07:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(2, 12, 11, '2023-09-05 07:49:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userrrid` (`userId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uiid` (`userID`),
  ADD KEY `piddd` (`productId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uidddd` (`userId`),
  ADD KEY `addressid` (`addressId`),
  ADD KEY `orderNumber` (`orderNumber`);

--
-- Indexes for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderidd` (`orderNumber`),
  ADD KEY `useridd` (`userId`),
  ADD KEY `productiddd` (`productId`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderidddddd` (`orderId`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catid` (`categoryid`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltoys`
--
ALTER TABLE `tbltoys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catidddd` (`category`),
  ADD KEY `subCategory` (`subCategory`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usseridddd` (`userId`),
  ADD KEY `ppiidd` (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbrand`
--
ALTER TABLE `tblbrand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblreview`
--
ALTER TABLE `tblreview`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltoys`
--
ALTER TABLE `tbltoys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `uid` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
