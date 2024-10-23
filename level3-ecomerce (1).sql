-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 03:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `level3-ecomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`description`, `image`) VALUES
('Welcome to Avito, your number one source for all things clothes. We are dedicated to providing you the very best of fashion, with an emphasis on quality, customer service, and beauty.Founded in 2024 by Doaa, Avito has come a long way from its beginnings in Lebanon. When Doaa first started out, her passion for beauty and fashion drove her to start her own business.We now serve customers all over the world and are thrilled that we are able to turn our passion into our own website.We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please do not hesitate to contact us.', 'about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_posted` date NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `description`, `type`, `date_posted`, `image`) VALUES
(8, 'Exploring the Vibrant Culture of Barcelona', 'Join us on a journey through the streets of Barcelona, where ancient history meets modern charm. Discover hidden gems, indulge in local cuisine, and immerse yourself in the vibrant Catalan culture.', 'travel', '2024-07-16', 'blog-post-3.jpg'),
(9, 'Fall Fashion Trends 2024: Cozy Knits and Bold Colors', 'Get ready for the upcoming season with our guide to the latest fall fashion trends. From cozy knitted sweaters to bold and vibrant color palettes, elevate your wardrobe with these must-have pieces.', 'fashion', '2024-07-16', 'blog-post-1.jpg'),
(10, 'Skincare Routine for Glowing Summer Skin', 'Achieve radiant and glowing skin this summer with our expert skincare routine. Discover essential tips, recommended products, and simple techniques to keep your skin hydrated and healthy under the sun.', 'beauty', '2024-07-16', 'blog-post-2.jpg'),
(11, 'Hidden Gems of Kyoto: Beyond the Tourist Trail', 'Uncover the serene beauty of Kyotos hidden gems, away from the bustling crowds. From tranquil temples to picturesque gardens, experience the essence of traditional Japan in these lesser-known spots.', 'travel', '2024-07-16', 'blog-post-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`) VALUES
(25, 'Sports'),
(26, 'Dresses'),
(28, 'Casual');

-- --------------------------------------------------------

--
-- Table structure for table `couponcode`
--

CREATE TABLE `couponcode` (
  `code_id` int(11) NOT NULL,
  `code_name` varchar(50) NOT NULL,
  `percentage` decimal(5,2) NOT NULL,
  `limits` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `used_by` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `couponcode`
--

INSERT INTO `couponcode` (`code_id`, `code_name`, `percentage`, `limits`, `expiry_date`, `used_by`) VALUES
(4, 'name13', 16.00, 94, '2025-07-31', '/doaa/dima'),
(12, 'violet24', 15.00, 9, '2024-08-11', '/dima');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'customer',
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `UserName`, `Email`, `Password`, `user_type`, `Address`) VALUES
(13, 'doaa', 'samra@gmail.com', '$2y$10$HNpytGExwANS6DtfPs.gYOb3t6U3PxovEyaIwXnmYh1QQZvxz126C', 'customer', 'Lebanon'),
(14, 'Ali', 'ali@gmail.com', '$2y$10$7hlS8kKyCJZO2oB.KYP5HOq9HhCipQxcKTD.F94vF366c.hq1iIhq', 'customer', 'Qana'),
(15, 'lara', 'lara@gmail.com', '$2y$10$2TYiHrV2i5HfwspxgYvueO74KTrAGZxiSvAnivzSW2gQvwk.aTyPK', 'customer', 'lebanon'),
(16, 'Dima', 'dima@gmail.com', '$2y$10$Be9aruMzePgINi646zilUuks6efWtsZOcVVjrzV59Dh65tBmN7Y8.', 'customer', 'Av. dos Andradas, 3000');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$AZdu3XPnJGygFbTJn23K7uT.rLCK7XDPYo8a8Dkel1fSiic4RCvfK', 'SuperAdmin'),
(6, 'Samar', 'samra@gmail', '$2y$10$Xbv3ovQROaq/93iSIRMpdutIoNq4LGQJPBx2DPfV3LXdf72rN/fdG', 'Employee'),
(8, 'Ali', 'ali@gmail.com', '$2y$10$FMvYGozRU8lDr59cJSW/0.Od1mp0Hml5nxV6mIrHh.FBxbF.nKRha', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `title`, `description`) VALUES
(7, 'What is your return policy?', 'We accept returns within 30 days of purchase. Items must be unworn, unwashed, and in their original condition with tags attached. For more details, visit our Return Policy page.'),
(8, 'How do I track my order?', 'Once your order has shipped, you will receive an email with a tracking number. You can use this number on our website or the carrier\'s website to track your package.'),
(9, 'Do you offer international shipping?', 'Yes, we offer international shipping to select countries. Shipping fees and delivery times vary based on the destination. Please check our Shipping Information page for more details.'),
(10, 'How can I contact customer service?', 'You can contact our customer service team via email at support@clothingstore.com or by calling (123) 456-7890. Our team is available Monday to Friday from 9 AM to 5 PM.'),
(11, 'What payment methods do you accept?', 'We accept all major credit cards, PayPal, and Apple Pay. All payments are processed securely to ensure your information is protected.');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `productID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `productID`) VALUES
(58, 'Your-Muse-_Dress-Black-2_1000_8a469f85-223e-41a1-82fb-2b656c103c1d_720x.webp', 36),
(59, 'Your-Muse-_Dress-Black-4_1000_ac152a53-5716-4452-9196-7e063e7e11e5_720x.webp', 36),
(60, 'Too-good-to-pass-up-purple-1_1_720x.webp', 37),
(61, 'Too-good-to-pass-up-purple-3_1_720x.webp', 37),
(63, 'Too-Good-to-Pass-Up-Powder-Blue-Dress-1_copy_8abddf64-60cf-40fe-9113-1b3df124d54e_720x.webp', 38),
(64, 'Too-Good-to-Pass-Up-Powder-Blue-Dress-2_copy_71200edf-93b0-4ca8-b5a6-0a8e1245498c_720x.webp', 38),
(65, 'Too-Good-to-Pass-Up-Powder-Blue-Dress-4_copy_d785272d-8190-4d3f-af53-dc77ed60b5cc_720x-0.webp', 38),
(72, 'Too-Good-To-Pass-Up-Dress-Magenta-21000_720x.webp', 39),
(73, 'Too-Good-To-Pass-Up-Dress-Magenta-11000_1000x.webp', 39),
(74, 'Romancing-sage-4_1000_da1f45f1-9e98-4a3e-87fb-9f0ef9baaa88_720x.webp', 40),
(75, 'Romancing-sage-1_1000_473badec-ea83-49f0-9e1d-8d2e5398ff35_720x-0.webp', 40),
(77, 'Prettiest-Problem-Dress-Royal-Dress-1_720x (1).webp', 41),
(78, 'Prettiest-Problem-Dress-Royal-Dress-3_720x.webp', 41),
(79, 'Prettiest-Problem-Dress-Royal-Dress-4_720x-0.webp', 41),
(80, 'Your-Muse-Dress-White-1_3f8f17de-7cc9-474f-9b02-54f77f47bfd6_720x-0.webp', 35),
(81, 'Your-Muse-Dress-White-2_9bcacb16-cb03-4a92-8cf3-732d9fbfa21e_720x-0.webp', 35),
(82, 'Your-Muse-Dress-White-4_e4976fea-3341-41eb-90bc-104cb4a70f27_720x-0.webp', 35),
(83, 'Too-Good-To-Pass-Up-Magenta-2_1000_be3228b7-1a9f-49d4-b818-2c2632f3fbbd_720x-0.webp', 39),
(85, '908403_rollover.jpeg', 45),
(86, '913586_back.jpeg', 42),
(87, '913586_main.jpeg', 42),
(88, 'Lover-Girl-White-Dress-1_1000_a70daab3-64e6-4614-8000-0f49a43bf3fe_720x.webp', 43),
(89, 'Lover-Girl-White-Dress-2_1000_562d5d59-da5f-4656-82be-683011ac8712_720x.webp', 43),
(91, '908403_back-0.jpeg', 45),
(93, '913478_rollover-0.jpeg', 44),
(96, '913478_back.jpeg', 44),
(97, '908286_rollover.jpeg', 46),
(99, '908286_back (1).jpeg', 46),
(109, 'Yoga_Future_Ensemble_De_Sport_Sans_Couture_Manches_Raglan__Destroy-Pushup-Set-gofitbrand-3.webp', 50),
(111, 'Yoga_Future_Ensemble_De_Sport_Sans_Couture_Manches_Raglan__Destroy-Pushup-Set-gofitbrand-6 (1).webp', 50),
(112, 'FLARE-scoop-romper-SET-GOFITBRAND-ENSEMBLE-DE-SPORTS-AU-MAROC-2 (1).webp', 51),
(113, 'FLARE-scoop-romper-SET-GOFITBRAND-ENSEMBLE-DE-SPORTS-AU-MAROC-1.webp', 51),
(114, 'Stylish-Yoga-Gym-Jumpsuits-tie-dye-gofitbrand.com_.webp', 52),
(115, 'Stylish-Yoga-Gym-Jumpsuits-tie-dye-gofitbrand-3.webp', 52),
(116, 'Adapt-Seamless-sports-Sets-gofitbrand-ensembles-de-sports-gofitbrand-2.webp', 47),
(117, 'Adapt-Seamless-sports-Sets-gofitbrand-ensembles-de-sports-gofitbrand-1.webp', 47),
(121, 'Yoga_Trendy_Combinaison_De_Sport_Tie_Dye_Dos-Nu-Stylish-Yoga-Gym-Jumpsuits-tie-dye-gofitbrand-6-0.webp', 48),
(122, 'Yoga_Trendy_Combinaison_De_Sport_Tie_Dye_Dos-Nu-Stylish-Yoga-Gym-Jumpsuits-tie-dye-gofitbrand-4-0.webp', 48),
(123, 'Yoga_Trendy_Combinaison_De_Sport_Tie_Dye_Dos-Nu-Stylish-Yoga-Gym-Jumpsuits-tie-dye-gofitbrand-5-0.webp', 48),
(125, 'zipper-jacket-sports-sets_DailyCasual_Cut_Out_Back_Sports_Set__gofitbrand_South_Africa_main_4-4.webp', 49),
(126, 'zipper-jacket-sports-sets_DailyCasual_Cut_Out_Back_Sports_Set__gofitbrand_South_Africa_main_4-2-0.webp', 49),
(127, 'zipper-jacket-sports-sets_DailyCasual_Cut_Out_Back_Sports_Set__gofitbrand_South_Africa_main_4-3.webp', 49),
(128, 'LIFT-CONTOUR-SEAMLESS-SETS-GOFITBRAND-ENSEMBE-SPORTS-MOROCCO-4.webp', 53),
(131, 'LIFT-CONTOUR-SEAMLESS-SETS-GOFITBRAND-ENSEMBE-SPORTS-MOROCCO-2.webp', 53),
(133, '1000168586.webp', 54),
(134, '1000168588-0.webp', 54),
(135, 'female-black-black-basic-t-shirt.webp', 55),
(136, 'female-black-basic-oversized-t-shirt.webp', 55),
(137, 'female-ecru-ecru-basic-t-shirt (1).webp', 61),
(138, 'female-ecru-ecru-basic-t-shirt.webp', 61),
(139, 'female-ecru-basic-oversized-t-shirt.webp', 61),
(141, 'female-white-ringer-t-shirt.webp', 62),
(143, 'female-white-white-ringer-t-shirt-0.webp', 62),
(144, 'female-dsgn-studio-sports-bubble-slogan-oversized-t-shirt- (1).webp', 59),
(145, 'female-dsgn-studio-sports-bubble-slogan-oversized-t-shirt-.webp', 59),
(146, 'female-teal-dsgn-studio-sports-bubble-slogan-oversized-t-shirt-.webp', 59),
(147, 'female-grey-basic-t-shirt (1).webp', 60),
(148, 'female-grey-basic-t-shirt.webp', 60),
(149, 'female-grey-basic-oversized-t-shirt.webp', 60),
(150, 'female-grey-basic-t-shirt (2).webp', 60),
(151, 'female-stone-stone-basic-oversized-boyfriend-t-shirt (1).webp', 58),
(152, 'female-stone-stone-basic-oversized-boyfriend-t-shirt.webp', 58),
(153, 'female-stone-basic-oversized-boyfriend-t-shirt.webp', 58),
(154, 'female-grey-wide-leg-jeans (1).webp', 56),
(155, 'female-grey-wide-leg-jeans.webp', 56),
(156, 'female-white-soft-touch-maxi-skirt.webp', 57),
(157, 'female-white-soft-touch-maxi-skirt (1).webp', 57),
(159, 'female-ecru-linen-beaded-trapeze-jumpsuit.webp', 64),
(160, 'female-ecru-linen-beaded-trapeze-jumpsuit (1)-0.webp', 64),
(161, 'female-neutral-basic-rib-stripe-square-neck-maxi (3).webp', 63),
(162, 'female-neutral-basic-rib-stripe-square-neck-maxi (2).webp', 63);

-- --------------------------------------------------------

--
-- Table structure for table `moreinfo`
--

CREATE TABLE `moreinfo` (
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `pinterest` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shipping` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moreinfo`
--

INSERT INTO `moreinfo` (`name`, `number`, `facebook`, `instagram`, `twitter`, `pinterest`, `location`, `email`, `shipping`) VALUES
('Aviato', '+961-70131623', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://twitter.com/', 'https://www.pinterest.com/', 'Lebaono-AlHamra Street', 'doaakhashab32@gmail.com', 12.00);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `OrderID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Size` varchar(5) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`OrderID`, `ProductID`, `Size`, `Quantity`, `Price`) VALUES
(6, 36, 'S', 10, 19.00),
(1, 36, 'S', 10, 19.00),
(1, 35, 'S', 10, 19.00),
(7, 35, 'S', 1, 55.50),
(8, 35, 'S', 1, 55.50),
(9, 35, 'S', 1, 55.50),
(10, 35, 'S', 1, 55.50),
(11, 35, 'S', 1, 55.50),
(12, 35, 'S', 1, 55.50),
(13, 35, 'S', 1, 55.50),
(17, 35, 'S', 1, 55.50),
(18, 35, 'S', 1, 55.50),
(19, 35, 'S', 1, 55.50),
(20, 35, 'S', 1, 55.50),
(21, 35, 'S', 1, 55.50),
(22, 35, 'S', 1, 55.50),
(23, 35, 'S', 1, 55.50),
(24, 35, 'S', 1, 55.50),
(25, 35, 'S', 1, 55.50),
(26, 35, 'S', 1, 55.50),
(27, 35, 'S', 1, 55.50),
(28, 35, 'S', 1, 55.50),
(29, 35, 'S', 1, 55.50),
(30, 35, 'S', 1, 55.50),
(31, 35, 'S', 5, 55.50),
(32, 35, 'S', 5, 55.50),
(33, 35, 'S', 6, 55.50),
(34, 35, 'S', 6, 55.50),
(35, 35, 'S', 1, 55.50),
(36, 35, 'S', 1, 55.50),
(37, 35, 'S', 1, 55.50),
(38, 35, 'S', 1, 55.50),
(39, 35, 'S', 1, 55.50),
(40, 35, 'S', 1, 55.50),
(41, 35, 'S', 1, 55.50),
(42, 39, 'S', 1, 40.00),
(43, 39, 'S', 1, 40.00),
(44, 39, 'S', 1, 40.00),
(45, 39, 'S', 1, 40.00),
(46, 39, 'S', 1, 40.00),
(47, 39, 'S', 1, 40.00),
(48, 39, 'S', 1, 40.00),
(49, 39, 'S', 1, 40.00),
(50, 39, 'S', 1, 40.00),
(51, 39, 'S', 1, 40.00),
(52, 39, 'S', 1, 40.00),
(53, 39, 'S', 1, 40.00),
(54, 40, 'S', 4, 30.50),
(55, 40, 'S', 4, 30.50),
(56, 38, 'S', 1, 60.00),
(61, 41, 'S', 12, 110.00),
(61, 41, 'S', 0, 110.00),
(68, 36, 'S', 1, 70.70),
(68, 36, 'S', 1, 70.70),
(69, 41, 'S', 0, 110.00),
(83, 38, 'S', 11, 60.00),
(84, 36, 'S', 2, 70.70),
(84, 51, 'S', 1, 50.00),
(84, 36, 'S', 0, 70.70),
(84, 51, 'S', 1, 50.00),
(85, 60, 'M', 1, 29.00),
(86, 63, 'S', 7, 45.00),
(91, 50, 'S', 5, 30.00),
(92, 64, 'S', 1, 50.00),
(93, 52, 'S', 9, 60.00),
(94, 52, 'S', 6, 60.00),
(95, 35, 'S', 7, 55.50),
(96, 58, 'S', 18, 42.00),
(97, 56, 'S', 3, 55.00),
(100, 39, 'S', 1, 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT current_timestamp(),
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `PhoneNumber` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `ZipCode` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `OrderDate`, `TotalAmount`, `PhoneNumber`, `Address`, `ZipCode`, `City`, `Status`) VALUES
(1, 13, '2024-03-23', 6227.00, 'dd', 'dd', 'dd', 'dddd', 'Delivered'),
(2, 13, '2023-07-23', 25.00, '70131623', 'wssss', '122ws', 'fdv', 'Shipped'),
(3, 13, '2024-07-23', 23.44, '70131623', 'almansori', '123dc', 'tyre', 'Shipped'),
(4, 15, '2024-07-23', 12259.84, '70131623', 'wssss', '122ws', 'fdv', 'Shipped'),
(5, 13, '2024-01-24', 2232.56, '70131623', 'wssss', '122ws', 'fdv', 'Pending'),
(6, 13, '2024-07-25', 24.00, '', '', '', '', 'Delivered'),
(7, 13, '2024-07-31', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(8, 13, '2024-07-31', 67.50, '', '', '', '', ''),
(9, 13, '2024-07-31', 67.50, '', '', '', '', ''),
(10, 13, '2024-07-31', 67.50, '', '', '', '', ''),
(11, 13, '2024-07-31', 67.50, '', '', '', '', ''),
(12, 13, '2024-07-31', 67.50, '', '', '', '', ''),
(13, 13, '2024-07-31', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(17, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(18, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(19, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(20, 13, '2024-08-02', 67.50, '1233', 'wssss', '122ws', 'fdv', ''),
(21, 13, '2024-08-02', 67.50, '5553428400', 'C. Montes Urales 445', '11000', 'Ciudad de México', ''),
(22, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(23, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(24, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(25, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(26, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(27, 13, '2024-08-02', 67.50, '3121286800', 'Av. dos Andradas, 3000', '30260-070', 'Belo Horizonte', ''),
(28, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(29, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(30, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(31, 13, '2024-08-02', 289.50, '1233', 'wssss', '122ws', 'fdv', ''),
(32, 13, '2024-08-02', 289.50, '1233', 'wssss', '122ws', 'fdv', ''),
(33, 13, '2024-08-02', 345.00, '1233', 'wssss', '122ws', 'fdv', ''),
(34, 13, '2024-08-02', 345.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(35, 13, '2024-08-02', 67.50, '1233', 'wssss', '122ws', 'fdv', ''),
(36, 13, '2024-08-02', 58.62, '1233', 'wssss', '122ws', 'fdv', ''),
(37, 13, '2024-08-02', 67.50, '1233', 'wssss', '122ws', 'fdv', ''),
(38, 13, '2024-08-02', 67.50, '1233', 'wssss', '122ws', 'fdv', ''),
(39, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(40, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(41, 13, '2024-08-02', 67.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(42, 13, '2024-08-02', 52.00, '1233', 'wssss', '122ws', 'fdv', ''),
(43, 13, '2024-08-02', 52.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(44, 13, '2024-08-02', 52.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(45, 13, '2024-08-02', 52.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(46, 13, '2024-08-02', 52.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(47, 13, '2024-08-03', 52.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(48, 13, '2024-08-03', 52.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(49, 13, '2024-08-03', 52.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(50, 13, '2024-08-03', 52.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(51, 13, '2024-08-03', 45.60, '70131623', 'wssss', '122ws', 'fdv', ''),
(52, 13, '2024-08-03', 45.60, '1233', 'wssss', '122ws', 'fdv', ''),
(53, 13, '2024-08-03', 45.60, '70131623', 'wssss', '122ws', 'fdv', ''),
(54, 13, '2024-08-03', 114.48, '1233', 'wssss', '122ws', 'fdv', ''),
(55, 13, '2024-08-03', 134.00, '1233', 'wssss', '122ws', 'fdv', ''),
(56, 13, '2024-08-03', 62.40, '70131623', 'wssss', '122ws', 'fdv', ''),
(57, 13, '2024-08-03', 0.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(58, 13, '2024-08-03', 0.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(59, 13, '2024-08-03', 0.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(60, 13, '2024-08-03', 0.00, '71604224', 'nn', 'n', 'n', ''),
(61, 13, '2024-08-06', 1.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(62, 13, '2024-08-06', 1.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(63, 13, '2024-08-06', 1.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(64, 13, '2024-08-06', 1.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(65, 13, '2024-08-06', 1.00, '70131623', 'wssss', '122ws', 'fdv', ''),
(66, 13, '2024-08-06', 0.00, '71604224', 'wssss', '122ws', 'fdv', ''),
(67, 13, '2024-08-06', 0.00, '71604224', 'wssss', '122ws', 'fdv', ''),
(68, 13, '2024-08-06', 82.70, '1233', 'wssss', '122ws', 'fdv', ''),
(69, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(70, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(71, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(72, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(73, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(74, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(75, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(76, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(77, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(78, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(79, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(80, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(81, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(82, 13, '2024-08-06', 562.00, '1233', 'wssss', '122ws', 'fdv', ''),
(83, 13, '2024-08-06', 852.00, '1233', 'wssss', '122ws', 'fdv', ''),
(84, 13, '2024-08-08', 415.50, '70131623', 'wssss', '122ws', 'fdv', ''),
(85, 16, '2024-08-08', 41.00, '70131623', 'Mansouri', '1234-66', 'Tyre', ''),
(86, 16, '2024-08-08', 327.00, '70131623', 'MOnt', '125-888', 'Tyre', 'Pending'),
(91, 13, '2024-08-09', 138.00, '1233', 'wssss', '122ws', 'fdv', 'Pending'),
(92, 16, '2024-08-09', 54.00, '70131623', 'wssss', '122ws', 'fdv', 'Pending'),
(93, 16, '2024-08-09', 552.00, '70131623', 'Al-Mansouri', '1233211', 'Tyre', 'Pending'),
(94, 16, '2024-08-09', 672.00, '70131623', 'Mansouri', '123454', 'Tyre', 'Pending'),
(95, 16, '2024-08-09', 400.50, '70131623', 'Mansouri', '123321', 'tyre', 'Pending'),
(96, 16, '2024-08-09', 768.00, '1221323', 'Mansouri', '1234-66', 'Tyre', 'Pending'),
(97, 16, '2024-08-09', 152.25, '70131623', 'Mansori', '12321', 'Tyre', 'Pending'),
(100, 13, '2024-08-09', 52.00, '70131623', 'wssss', '122ws', 'fdv', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `small_description` text DEFAULT NULL,
  `large_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `quantity`, `category_id`, `small_description`, `large_description`) VALUES
(35, 'Luxury Evening Gown', 55.50, 7, 26, 'A stunning luxury evening gown made with the finest materials. Perfect for any formal occasion, ensuring you stand out with elegance and sophistication.', 'This Luxury Evening Gown is crafted from premium fabrics and features intricate detailing that adds a touch of glamour to your look. The dress is designed to provide a flattering fit, enhancing your natural beauty. With a timeless design, this gown is suitable for various formal events, from galas to weddings. The delicate embroidery and high-quality stitching ensure that you will look and feel exceptional. Pair this dress with your favorite heels and accessories to complete the look. Available in multiple sizes to cater to different body types. Experience the luxury and elegance of this exquisite evening gown. Each piece is meticulously crafted to ensure the highest level of quality and style.'),
(36, 'Elegant Black Dress', 70.70, 0, 26, 'An elegant black dress that is a must-have for every wardrobe. Perfect for a night out or a formal event, offering both style and comfort.', 'The Elegant Black Dress is a timeless piece that can be worn on various occasions. Made from high-quality fabric, it offers a comfortable fit and a sophisticated look. The dress features a classic design with modern touches, making it a versatile addition to your collection. Whether you are attending a cocktail party, a formal dinner, or any special event, this dress will make you look effortlessly chic. The sleek silhouette and the attention to detail in the stitching and finish set this dress apart. Pair it with statement jewelry and high heels to complete your elegant ensemble. Available in different sizes to suit your needs. Elevate your wardrobe with this elegant and stylish black dress.'),
(37, 'Shimmering Shine Dress', 33.30, 0, 26, 'A dazzling shimmering dress that will make you shine at any event. Perfect for parties and special occasions, offering a unique and glamorous look.', 'The Shimmering Shine Dress is designed to make you the center of attention. Crafted from a blend of high-quality materials, it features a shimmering effect that catches the light beautifully. The dress is both stylish and comfortable, allowing you to move with ease while looking stunning. Ideal for parties, proms, or any event where you want to stand out. The dress is available in various sizes to ensure a perfect fit for different body types. The exquisite design and attention to detail make this dress a standout piece in any wardrobe. Pair it with your favorite accessories and heels to complete the look. Shine bright and make a lasting impression with the Shimmering Shine Dress.'),
(38, 'Forever Classic Dress', 60.00, 0, 26, 'A classic dress that never goes out of style. Perfect for any occasion, offering timeless elegance and a flattering fit.', 'The Forever Classic Dress is a staple piece that belongs in every wardrobe. Made from durable and comfortable fabric, this dress is designed to offer a timeless look that can be dressed up or down. Whether you are attending a formal event, a casual gathering, or a special occasion, this dress will make you look sophisticated and stylish. The simple yet elegant design ensures versatility and long-lasting appeal. Available in a range of sizes to cater to different body types. The Forever Classic Dress is easy to accessorize, allowing you to create various looks with minimal effort. Experience the elegance and versatility of this classic dress. It is a perfect choice for those who appreciate timeless fashion.'),
(39, 'Serene Patterned Dress', 40.00, 29, 26, 'A beautiful patterned dress that exudes serenity and style. Perfect for casual outings and special occasions, offering a unique and fashionable look.', 'The Serene Patterned Dress is designed to bring a touch of tranquility to your wardrobe. Made from high-quality materials, this dress features a serene pattern that is both eye-catching and stylish. Ideal for casual outings, parties, or special occasions, this dress offers a perfect blend of comfort and fashion. The unique pattern and flattering fit make it a standout piece in any collection. Available in various sizes to ensure a perfect fit for different body types. The Serene Patterned Dress is easy to accessorize and can be paired with different shoes and accessories to create a variety of looks. Embrace the serenity and style of this beautiful patterned dress and make a fashion statement wherever you go.'),
(40, 'Darina Floral Dress', 30.50, 0, 26, 'A charming floral dress that is perfect for spring and summer. Offering a fresh and vibrant look, ideal for casual and semi-formal occasions.', 'The Darina Floral Dress is a delightful addition to your wardrobe. Crafted from lightweight and breathable fabric, it features a beautiful floral pattern that is perfect for warmer seasons. This dress is designed to provide a comfortable and flattering fit, making it ideal for casual outings, garden parties, and semi-formal events. The vibrant floral design adds a touch of freshness and elegance to your look. Available in various sizes to cater to different body types. The Darina Floral Dress is easy to style with different accessories and shoes, allowing you to create a range of looks. Embrace the beauty and charm of this floral dress and enjoy the compliments that come your way. A perfect choice for those who love fresh and vibrant fashion.'),
(41, 'Luxury Cocktail Dress', 110.00, 0, 26, 'A sophisticated cocktail dress that is perfect for special occasions. Offering a luxurious look with intricate detailing and a flattering fit.', 'The Luxury Cocktail Dress is designed to make you feel elegant and confident. Made from high-quality materials, this dress features intricate detailing that adds a touch of luxury to your look. Ideal for cocktail parties, formal dinners, and special events, this dress offers a sophisticated and stylish appearance. The flattering fit enhances your silhouette, making you look and feel your best. Available in a range of sizes to suit different body types. The Luxury Cocktail Dress is easy to accessorize with your favorite jewelry and heels, allowing you to create a polished and glamorous look. Experience the luxury and sophistication of this beautiful cocktail dress and make a statement at your next event. A must-have for those who appreciate refined fashion.'),
(42, 'Radiant  Dress', 85.00, 10, 26, 'A radiant dress that exudes confidence and elegance. Perfect for evening events and parties, offering a bold and stylish look. This dress features a flattering fit and vibrant color, making it a standout piece in any wardrobe.', 'The Radiant  Dress is designed to make a bold statement. Crafted from high-quality materials, it offers a comfortable and flattering fit. The vibrant red color ensures you stand out at any event, from evening parties to formal gatherings. This dress features intricate detailing that adds a touch of sophistication and glamour. Available in various sizes to suit different body types. The Radiant Red Dress is easy to accessorize with your favorite jewelry and heels, allowing you to create a stunning look. Experience the confidence and elegance that comes with wearing this beautiful red dress. A must-have for those who love bold and stylish fashion. This dress promises not just style, but also comfort, making it a versatile addition to your wardrobe. Enjoy the compliments and attention you will receive in this radiant dress. It is designed to make you feel confident and glamorous, ensuring you enjoy every moment of your special occasion.'),
(43, 'Ethereal White Dress', 95.00, 8, 26, 'An ethereal white dress that is perfect for special occasions. Offering a delicate and elegant look, ideal for weddings and formal events. This dress features a graceful design with intricate lace detailing.', 'The Ethereal White Dress is a stunning piece that is perfect for weddings, proms, and other special occasions. Made from high-quality fabric, it offers a comfortable and flattering fit. The intricate lace detailing adds a touch of elegance and sophistication, making you look and feel like a princess. Available in a range of sizes to cater to different body types. The Ethereal White Dress is easy to accessorize with delicate jewelry and heels, allowing you to create a timeless and graceful look. Experience the beauty and elegance of this ethereal dress and make a lasting impression. A perfect choice for those who appreciate delicate and refined fashion. This dress promises not just style, but also comfort, ensuring you enjoy every moment of your special occasion. The dress is designed to enhance your natural beauty and provide a memorable look for your special day.'),
(44, 'Chic Navy Blue Dress', 75.00, 15, 26, 'A chic navy blue dress that offers a sophisticated and stylish look. Perfect for office wear and formal events, providing a versatile and elegant option. This dress features a classic design with modern touches.', 'The Chic Navy Blue Dress is designed for the modern woman who appreciates both style and comfort. Made from premium materials, it offers a flattering fit and a sleek silhouette. The classic navy blue color is versatile, making this dress suitable for various occasions, from office meetings to formal dinners. The dress features subtle detailing that adds a touch of modernity to the classic design. Available in various sizes to suit different body types. The Chic Navy Blue Dress is easy to accessorize with different jewelry and shoes, allowing you to create a range of looks. Elevate your wardrobe with this stylish and sophisticated dress. A must-have for those who appreciate timeless and chic fashion. This dress promises not just elegance, but also comfort, making it a reliable choice for different events and occasions. Enjoy the confidence and style that comes with wearing this chic navy blue dress.'),
(45, 'Vintage  Dress', 65.00, 12, 26, 'A beautiful vintage  dress that is perfect for spring and summer. Offering a fresh and charming look, ideal for casual outings and garden parties. The vintage floral pattern adds a touch of nostalgia and elegance to your wardrobe.', 'The Vintage Dress is a delightful piece that brings a touch of nostalgia to your wardrobe. Crafted from lightweight and breathable fabric, it features a charming floral pattern that is perfect for warmer seasons. This dress is designed to provide a comfortable and flattering fit, making it ideal for casual outings, garden parties, and semi-formal events. The vintage floral design adds a touch of elegance and beauty to your look. Available in various sizes to cater to different body types. The Vintage Floral Dress is easy to style with different accessories and shoes, allowing you to create a range of looks. Embrace the charm and elegance of this vintage floral dress and enjoy the compliments that come your way. A perfect choice for those who love timeless and beautiful fashion. This dress promises not just style, but also comfort, making it a must-have for your spring and summer wardrobe. Enjoy the freshness and beauty of this vintage dress.'),
(46, 'Elegant Dark Blue Dress', 80.00, 20, 26, 'An elegant dark blue dress that exudes sophistication and grace. Perfect for evening occasions and formal events, providing a timeless and stylish option. This dress features a sleek design with subtle detailing.', 'The Elegant Dark Blue Dress is a sophisticated piece perfect for evening occasions and formal events. Made from high-quality fabric, it offers a comfortable and flattering fit that highlights your silhouette. The dark blue color is timeless and versatile, making this dress a great addition to any wardrobe. This dress features subtle detailing that adds a touch of elegance without overpowering the overall look. Available in a range of sizes to suit different body types, ensuring a perfect fit for everyone. The Elegant Dark Blue Dress is easy to accessorize with statement jewelry and stylish heels, allowing you to create a polished and refined look. Elevate your wardrobe with this chic and sophisticated dress that promises not only style but also comfort. Experience the confidence and grace that comes with wearing this elegant dark blue dress. It is designed to make you feel poised and glamorous, ensuring you make a lasting impression at any event. Enjoy the compliments and admiration that come your way in this exquisite dress.'),
(47, 'Athletic Performance Top', 35.00, 25, 25, 'A versatile athletic performance top designed for maximum comfort and flexibility during workouts. Ideal for a variety of sports and fitness activities, offering excellent breathability and support.', 'The Athletic Performance Top is crafted from high-quality, moisture-wicking fabric that keeps you cool and dry during intense workouts. Its design ensures a comfortable and flexible fit, allowing for a full range of motion. This top is perfect for various sports and fitness activities, from running and yoga to gym sessions and outdoor adventures. The Athletic Performance Top features flatlock seams to minimize chafing and irritation, providing a smooth and comfortable feel against the skin. Available in various sizes, this top is designed to suit different body types and preferences. Whether you are hitting the gym or going for a run, this top is a reliable and stylish choice that enhances your athletic performance.'),
(48, 'High-Impact Sports Bra', 40.00, 30, 25, 'A high-impact sports bra designed to provide maximum support and comfort during intense workouts. Ideal for high-intensity sports and fitness activities, ensuring a secure and stable fit.', 'The High-Impact Sports Bra is engineered to offer superior support and comfort during high-intensity workouts. Made from durable and breathable fabric, it provides a secure fit that minimizes bounce and movement. The sports bra features adjustable straps and a hook-and-eye closure for a customized fit. Its moisture-wicking properties keep you dry and comfortable, even during the most intense training sessions. Designed with a focus on functionality and style, this sports bra is perfect for running, HIIT, and other high-impact activities. Available in a range of sizes to cater to different body types, it ensures you feel supported and confident during your workouts.'),
(49, 'Compression Leggings', 45.00, 20, 25, 'High-performance compression leggings designed to enhance your workout experience. Providing excellent support and flexibility, these leggings are perfect for a variety of sports and fitness activities.', 'The Compression Leggings are crafted from high-quality, stretchy fabric that offers optimal support and flexibility during workouts. These leggings provide a snug fit that enhances muscle performance and reduces fatigue. The moisture-wicking material keeps you cool and dry, making them ideal for high-intensity activities. Featuring a high waistband for added support and coverage, these leggings stay in place during movement. The flatlock seams reduce chafing and irritation, ensuring maximum comfort. Perfect for running, yoga, and gym sessions, these compression leggings are a must-have for any fitness enthusiast. Available in various sizes to suit different body types and preferences.'),
(50, 'Breathable Running Set', 30.00, 30, 25, 'Lightweight and breathable running set designed for maximum comfort and performance. Ideal for running and other aerobic activities, offering excellent ventilation and freedom of movement.', 'The Breathable Running Set are made from lightweight, moisture-wicking fabric that keeps you cool and dry during your runs. These shorts offer excellent ventilation and freedom of movement, making them perfect for running and other aerobic activities. The elastic waistband with an adjustable drawstring ensures a secure and comfortable fit. Featuring built-in briefs for added support and coverage, these running shorts provide the comfort and functionality you need for your workouts. Available in various sizes to suit different body types, these shorts are designed to enhance your running experience. Enjoy the perfect blend of style and performance with these breathable running shorts.'),
(51, 'Flexible Yoga Pants', 50.00, 16, 25, 'Comfortable and flexible yoga pants designed for maximum freedom of movement. Perfect for yoga and other low-impact activities, offering a flattering fit and excellent breathability.', 'The Flexible Yoga Pants are made from soft, stretchy fabric that provides maximum comfort and flexibility during your yoga sessions. These pants offer a flattering fit that enhances your natural curves while allowing for a full range of motion. The moisture-wicking material keeps you cool and dry, making them ideal for yoga and other low-impact activities. Featuring a high waistband for added support and coverage, these yoga pants stay in place during movement. Available in various sizes to suit different body types, these pants are designed to provide the ultimate in comfort and style. Whether you are practicing yoga or simply lounging at home, these flexible yoga pants are a versatile and stylish choice.'),
(52, 'Versatile Training Jacket', 60.00, 0, 25, 'A versatile training jacket designed to provide comfort and protection during outdoor workouts. Ideal for running and other outdoor activities, offering excellent insulation and breathability.', 'The Versatile Training Jacket is crafted from high-quality, breathable fabric that provides comfort and protection during outdoor workouts. This jacket offers excellent insulation to keep you warm in cooler weather, while its moisture-wicking properties ensure you stay dry and comfortable. The lightweight design allows for easy layering, making it perfect for running and other outdoor activities. Featuring a zippered front and secure pockets for storage, this jacket combines functionality with style. Available in various sizes to suit different body types, the Versatile Training Jacket is a reliable choice for any outdoor fitness enthusiast. Stay comfortable and protected during your outdoor workouts with this versatile and stylish training jacket.'),
(53, 'Seamless Workout Tank', 28.00, 22, 25, 'A seamless workout tank that offers superior comfort and flexibility. Perfect for a variety of fitness activities, providing excellent breathability and support.', 'The Seamless Workout Tank is designed to provide maximum comfort and flexibility during your workouts. Made from high-quality, breathable fabric, this tank ensures you stay cool and dry even during the most intense sessions. The seamless construction reduces chafing and irritation, offering a smooth and comfortable fit. Ideal for a variety of fitness activities such as running, yoga, and gym workouts, this tank provides the support you need to perform at your best. Available in various sizes, it is designed to suit different body types and preferences. The Seamless Workout Tank combines style and functionality, making it a must-have addition to your fitness wardrobe.'),
(54, 'Performance Training Set', 32.00, 28, 25, 'Performance training set designed for optimal comfort and flexibility. Suitable for high-intensity workouts and various sports activities, offering excellent ventilation and support.', 'The Performance Training Set are crafted from high-performance fabric that offers superior comfort and flexibility during your workouts. These shorts provide excellent ventilation and support, making them ideal for high-intensity training sessions and various sports activities. The elastic waistband with an adjustable drawstring ensures a secure and comfortable fit. These shorts feature moisture-wicking properties to keep you dry and comfortable, even during the most intense workouts. With a focus on functionality and style, the Performance Training Shorts are available in various sizes to suit different body types. Perfect for running, gym workouts, and other sports activities, these shorts are a reliable and stylish choice for any fitness enthusiast.'),
(55, ' EveryDay Maxi Set', 45.00, 15, 28, 'A stunning  maxi set with a flowy design for ease of movement. Perfect for casual outings and summer events. Features an adjustable waist tie for a personalized fit. Ideal for warm weather with a relaxed fit. Elegant and comfortable for any occasion.', 'This Floral Print Maxi Set is designed to turn heads with its vibrant floral pattern and flowing silhouette. Made from lightweight and breathable fabric, it ensures comfort and style during warm weather. The dress features an adjustable waist tie to provide a customized fit and enhance its flattering shape. The relaxed fit allows for easy movement, making it perfect for various occasions such as beach outings, garden parties, or casual gatherings. The maxi length adds a touch of elegance, while the high-quality fabric ensures durability. This dress is available in multiple sizes to cater to different body types, combining functionality with fashion in a timeless design.'),
(56, 'Casual Denim Jacket', 55.00, 17, 28, 'A classic denim jacket offering versatile styling options. Features button-front closure and durable denim fabric. Ideal for layering over outfits. Perfect for cooler weather and transitional seasons. Adds a relaxed, effortless touch to your look.', 'This Casual Denim Jacket is a wardrobe staple that never goes out of style. Its classic design includes a button-front closure and two chest pockets, providing both functionality and fashion. Made from high-quality denim, this jacket is built to withstand daily wear while maintaining its stylish appearance. The relaxed fit makes it easy to layer over various tops and dresses, offering versatility for different outfits. Ideal for cooler weather or transitional seasons, this jacket adds a touch of casual sophistication to any look. Whether you are heading out for a casual day or a relaxed evening, this denim jacket is the perfect finishing touch.'),
(57, 'Striped T-Shirt Dress', 34.00, 25, 28, 'A comfortable striped t-shirt dress with a relaxed fit and short sleeves. Made from soft, stretchy fabric for all-day comfort. Features a classic stripe pattern. Easy to dress up or down with accessories. Available in various sizes for different body types.', 'The Striped T-Shirt Dress offers a perfect combination of style and comfort. The soft, stretchy fabric ensures all-day wearability, while the relaxed fit and short sleeves make it an ideal choice for casual days. The classic stripe pattern adds a touch of timeless style, making it easy to accessorize for various looks. This dress is versatile enough to be dressed up with accessories or kept simple for a laid-back appearance. Available in multiple sizes, it caters to different body types, making it a must-have piece for your casual wardrobe. Ideal for running errands, lounging at home, or casual outings, this dress delivers both comfort and style.'),
(58, 'Lightweight Cargo Pants', 42.00, 0, 28, 'Stylish cargo pants designed for everyday wear with multiple pockets. Made from lightweight fabric for breathability. Features an elastic waistband with adjustable drawstring. Ideal for casual outings or outdoor activities. Versatile design for different tops.', 'These Lightweight Cargo Pants are crafted for both style and utility. The breathable fabric ensures comfort, while the multiple pockets offer practical storage solutions. The elastic waistband with an adjustable drawstring allows for a customizable fit, making these pants ideal for a range of activities. Whether you are heading out for a casual day or engaging in outdoor adventures, these pants provide both function and fashion. The versatile design pairs effortlessly with various tops, and the range of available sizes ensures a great fit for different body types. Designed for durability and comfort, these cargo pants are a reliable choice for your casual wardrobe.'),
(59, 'V-Neck Pullover Sweater', 38.00, 22, 28, 'A cozy v-neck pullover sweater that combines warmth and style. Features a soft knit fabric and elegant v-neck design. Ideal for layering in cooler weather. Easy to pair with jeans or skirts. Available in various sizes for a comfortable fit.', 'This V-Neck Pullover Sweater is designed for both comfort and sophistication. Made from a soft, knit fabric, it provides warmth and ease during cooler weather. The v-neck design adds a stylish touch, making it suitable for both casual and semi-formal occasions. The sweater relaxed fit allows for easy layering over different tops, making it a versatile piece for various outfits. Available in multiple sizes, it offers a comfortable fit for different body types. Whether you are lounging at home or heading out for a casual day, this sweater is a perfect blend of functionality and fashion.'),
(60, 'Patterned A-Line Skirt', 29.00, 29, 28, 'A chic patterned a-line skirt with a flattering cut and lightweight fabric. Perfect for casual events and everyday wear. Features a versatile design that pairs with various tops. Easy to dress up or down. Available in multiple sizes.', 'This Patterned A-Line Skirt combines style and comfort with its flattering a-line cut and playful pattern. The lightweight fabric ensures comfort, making it an ideal choice for casual outings or everyday wear. The skirt versatile design allows it to be dressed up with heels and a blouse or dressed down with flats and a t-shirt. The a-line shape enhances the silhouette, providing a stylish yet relaxed look. Available in various sizes, it accommodates different body types and adds a touch of flair to your wardrobe. This skirt is a must-have piece for any fashion-conscious individual looking for versatile and stylish options.'),
(61, 'Ruffled Sleeve Blouse', 36.00, 17, 28, 'A feminine blouse with ruffled sleeves for an elegant look. Features lightweight fabric for comfort and breathability. Perfect for casual or semi-formal occasions. Pairs well with jeans, skirts, or trousers. Available in various sizes for a great fit.', 'This Ruffled Sleeve Blouse offers a chic and feminine touch to your casual wardrobe. The lightweight fabric ensures comfort and breathability, while the ruffled sleeves add a stylish and flirty detail. The blouse is versatile enough to be worn for both casual and semi-formal occasions, making it a great addition to any wardrobe. It pairs effortlessly with jeans, skirts, or trousers, allowing for a range of outfit combinations. Available in multiple sizes, it provides a comfortable and flattering fit for different body types. This blouse combines elegance with everyday practicality, making it a must-have piece for a sophisticated yet relaxed look.'),
(62, 'Elastic Waist Joggers', 33.00, 25, 28, 'Comfortable joggers with an elastic waistband for a relaxed fit. Made from soft, breathable fabric for all-day wear. Features an adjustable waistband for a custom fit. Ideal for lounging or casual outings. Available in multiple sizes.', 'These Elastic Waist Joggers are crafted for ultimate comfort and ease. Made from soft and breathable fabric, they provide a relaxed fit perfect for lounging at home or casual outings. The adjustable waistband ensures a custom fit, allowing you to modify the fit to your preference. The joggers feature a versatile design that pairs well with a range of tops, from casual tees to stylish blouses. Available in various sizes, they cater to different body types, making them a practical choice for everyday wear. Whether you are running errands or relaxing at home, these joggers offer both comfort and style in a practical package.'),
(63, 'Sophisticated Wrap Dress', 45.00, 8, 28, 'A sophisticated wrap dress with a flattering silhouette. Features a tie waist and adjustable fit. Made from soft, flowy fabric for added comfort. Ideal for both casual and formal occasions. Available in various sizes.', 'The Sophisticated Wrap Dress is designed to offer both elegance and comfort with its wrap-around style and adjustable tie waist. Crafted from a soft, flowy fabric, this dress drapes beautifully and enhances your silhouette while providing exceptional comfort. The wrap design allows for a customizable fit, making it suitable for a range of body types. This versatile dress is perfect for both casual outings and formal events, allowing you to transition effortlessly from day to night. Pair it with heels for a sophisticated evening look or with flats for a more relaxed day appearance. Available in various sizes, it ensures a flattering fit for every body type, combining timeless style with modern functionality.'),
(64, 'Trendy Denim Overalls', 50.00, 19, 28, 'Trendy denim overalls with a relaxed fit and adjustable straps. Made from durable fabric for long-lasting wear. Features multiple pockets for added convenience. Perfect for a casual, effortless look. Available in various sizes.', 'These Trendy Denim Overalls are crafted to blend style with practicality. Featuring a relaxed fit and adjustable straps, they provide a comfortable and customizable fit, making them a versatile addition to your casual wardrobe. The durable denim fabric is designed for long-lasting wear, ensuring that these overalls stand up to everyday use while maintaining their stylish appearance. With multiple pockets, these overalls offer ample storage space for essentials, adding to their functionality. Ideal for a laid-back, effortless look, they can be paired with various tops and accessories to create different outfits. Perfect for casual outings, running errands, or simply lounging, these overalls offer both comfort and trend-setting style. Available in multiple sizes to fit different body types, they are a practical yet fashionable choice for any wardrobe.');

-- --------------------------------------------------------

--
-- Table structure for table `slide_show`
--

CREATE TABLE `slide_show` (
  `slide_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slide_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slide_show`
--

INSERT INTO `slide_show` (`slide_id`, `title`, `description`, `image`, `slide_type`) VALUES
(1, 'Products!', 'The beauty of nature is<br> hidden in details!', 'women-s-fashion-store-shopping-center-mall-clothes-store-with-mannequin-shopping-day_326694-24079-0.jpg', 'Opening'),
(2, 'Explore the Beauty', 'Your look <br> reflects your taste!', 'model.jpg', 'Opening'),
(3, 'Elegancy', 'Be elegant & <br>  dive in the world', 'm.png', 'Opening'),
(4, 'Clothes!', 'To shine wherever you are', 'room-with-large-round-window-pink-curtain_916191-6394-0.jpg', 'Explore'),
(5, 'Scroll', 'You born to shine!', 'dress-that-is-hanger-room_655090-108337.jpg', 'Explore'),
(6, 'Shop Now!', 'Special pieces is ready for you', 'pngtree-computer-desktop-interface-showcasing-3d-rendered-online-shopping-with-a-shopping-image_3613084-1.jpg', 'Explore'),
(7, 'Quality products', 'Discover our range of top-quality products designed to meet the highest standards. Each item is carefully selected to ensure durability and performance, bringing you only the best in the market.', 'ser.jpg', 'Services'),
(8, 'Fast Delivery', 'Enjoy lightning-fast delivery with our efficient logistics network. We ensure that your orders arrive on time, every time, so you can get your hands on your favorite products without delay.', 'istockphoto-1290498730-612x612.jpg', 'Services'),
(9, 'Affordable Prices', 'We believe in offering excellent value for money. Our products are priced competitively to ensure that you get high-quality items without breaking the bank. Shop with us for the best deals!', 'istockphoto-1145478777-612x612.jpg', 'Services'),
(10, 'Dresses', 'Elevate your style with our elegant  dresses', 'a966007c7443a7c643ca2f5bc272d787.jpg', 'Categories'),
(11, 'Sport', 'Comfortable, durable athletic wear', 'Fabletics x Khloe - Motion 365  Open Back Onesie and The Heights Cargo Jacket.jpg', 'Categories'),
(12, 'Casual', 'Stylish clothing for everyday comfort', '004fc6d1db84592a5b69955f1ccfcbac.jpg', 'Categories');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `couponcode`
--
ALTER TABLE `couponcode`
  ADD PRIMARY KEY (`code_id`),
  ADD UNIQUE KEY `code_name` (`code_name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `slide_show`
--
ALTER TABLE `slide_show`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `couponcode`
--
ALTER TABLE `couponcode`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `slide_show`
--
ALTER TABLE `slide_show`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
