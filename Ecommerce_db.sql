-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 03:45 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicine_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Health & Medicine'),
(2, 'Vitamins'),
(3, 'Cough & Cold'),
(4, 'Personal Care'),
(5, 'Baby & Child Care');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amt` float NOT NULL,
  `order_tx` varchar(255) NOT NULL,
  `order_payment` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_curr` varchar(255) NOT NULL,
  `order_placedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amt`, `order_tx`, `order_payment`, `order_status`, `order_curr`, `order_placedby`) VALUES
(47, 42.95, '2BM51392YR130544Y', 'Completed', 'Delivered', 'USD', 'Kris'),
(48, 82.95, '1RL12203BF212140X', 'Refunded', 'Order Cancelled', 'USD', 'Kris'),
(49, 23.97, '5PD99610SW465843M', 'Refunded', 'Order Cancelled', 'USD', 'Kris'),
(51, 22.98, '20S93146PM1223337', 'Completed', 'Delivered', 'USD', 'Kris'),
(52, 151.96, '1C2251135X721192A', 'Completed', 'Processing..', 'USD', 'kevin'),
(53, 20.98, '51M59966CP131823R', 'Completed', 'Delivered', 'USD', 'kevin'),
(54, 41.96, '47B90078BH838903S', 'Completed', 'Delivered', 'USD', 'kevin'),
(55, 15.98, '411123998M355572P', 'Refunded', 'Order Cancelled', 'USD', 'kevin'),
(56, 18.97, '1BY56636WH499924B', 'Refunded', 'Order Cancelled', 'USD', 'Kris'),
(57, 15.99, '5N549377DE727183K', 'Completed', 'Delivered', 'USD', 'Kris'),
(58, 15.99, '78X30973Y37813116', 'Completed', 'Delivered', 'USD', 'Kris'),
(59, 6.99, '16F566023C051950U', 'Refunded', 'Order Cancelled', 'USD', 'Kris'),
(60, 15.99, '83L95989EP6857931', 'Refunded', 'Order Cancelled', 'USD', 'max'),
(61, 19.98, '3SK94042RY488701T', 'Completed', 'Delivered', 'USD', 'max'),
(62, 55.97, '35F85424EL853815A', 'Completed', 'Delivered', 'USD', 'John'),
(63, 6.99, '0DR2582764679712C', 'Refunded', 'Order Cancelled', 'USD', 'John'),
(64, 20.97, '6SE224804J001613E', 'Refunded', 'Order Cancelled', 'USD', 'viren'),
(65, 39.98, '9XR88154593563042', 'Completed', 'Ready to Ship', 'USD', 'viren'),
(66, 199.71, '7H073541XC518521M', 'Completed', 'Ready to Ship', 'USD', 'allen'),
(67, 7.99, '6V152703HL093951C', 'Refunded', 'Delivered', 'USD', 'allen'),
(68, 11.99, '7F636704L5349584P', 'Refunded', 'Order Cancelled', 'USD', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_shortdesc` text NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_qty`, `product_description`, `product_shortdesc`, `product_image`) VALUES
(1, 'Band Aid', 1, 6.99, 25, 'Flexible band aid used for basic injuries. Used mainly for minor cuts, scrapes, minor burns. Band aid is water resistant but not waterproof. Usually lasts on for 24 hours.', '<ul>\r\n	<li>Flexible Band-Aid</li>\r\n	<li>Adhesive</li>\r\n	<li>Waterproof Tape</li>\r\n	<li>60 count</li>\r\n</ul>', 'bandaid.jpg'),
(2, 'Great Hand Sanitizer', 1, 4.99, 2, '#1 best selling Hand Sanitizer that works to defeat all the germs. Made with pure alcohol and no scented additives. Pure alcohol. Not for consumption. MADE IN CHINA, PACKED IN AMERICA AGAIN!!', '<ul>\r\n<li>Insta Hand Sanitizer</li>\r\n<li>Kills 99.9% of germs</li>\r\n</ul>', 'Hand Sanitizer.jpg'),
(3, 'Blue Protective Face Masks', 1, 9.99, 6, 'A box of blue facemasks. Non-medical use. Comfortable blue mask made from 80% linen and 15% polyester. Dispose after use. Disposable.', '<ul>\r\n<li>A box of blue facemasks</li>\r\n<li>Total Count 50</li>\r\n</ul>', 'Face-Masks.jpg'),
(4, 'Tums', 1, 7.99, 1, 'A box filled with 96 antacid tablets. Fast acting heartburn relief. Assorted chewable fruit flavors. Maximum strength.', '<ul><li>Assorted fruits</li><li>Chewable antacid fast acting</li></ul>', 'Tums.jpg'),
(5, 'Dulcolax', 1, 12.99, 1, 'A box containing 100 tablets of Dulcolax laxative. Used for quick relief. Orange tablets, easy to consume. Please contact your doctor before consuming this product. ', '<ul><li>Fast acting laxative</li><li>Relieves pain on the spot.</li></ul>', 'Laxative.jpg'),
(6, 'Now Vitamin A soft gels', 2, 18.99, 1, 'Now Vitamin A soft gels. Consumed for essential daily nutrition, a dietary supplement. Contains fish (Cod, saithe, haddock, pollock)', '<ul><li>Daily essential nutrition</li><li>Non-GMO, 250 count. </li></ul>', 'Vitamin A.jpg'),
(7, 'Now Vitamin C-1000', 2, 21.99, 1, 'Now Vitamin C softgels. 100 Count. Natural color variation of colors in this product. For adult consumption only. Contact your doctor before consuming this brand.', '<ul><li>Daily essential nutrition</li><li>Non-GMO, 250 count.</li></ul> ', 'Vitamin C.jpg'),
(8, 'Puritan Vitamin K', 2, 15.99, 1, 'Puritan’s Vitamin K tablets 100 count. For adult consumption only. No artificial color, no flavor, no sweeter and no preservatives in this product. 1 tablet per serving. Contact your doctor before consuming this product.', '<ul><li>Daily essential nutrition</li><li>Helps with bone and joint health</li></ul>', 'Vitamin K.jpg'),
(9, 'Nature Made B1 Vitamins', 2, 14.99, 1, 'Nature Made B1 is a no artificial flavors, no preservatives, gluten free vitamins. Used for converting food to energy. Helps maintain the nervous system. Contact your doctor before consuming this product.', '<ul><li>Nature Made B 1 Vitamin</li><li>100 tablet count</li></ul>', 'Vitamin B1.jpg'),
(10, 'Now Niacin Vitamin 3', 2, 10.99, 1, 'High potency capsules. A dietary supplement. Contact your doctor before consuming this product. One capsule per serving.', '<ul><li>Now Niacin 500mg.</li><li>100 count capsules.</li></ul> ', 'Vitamin B3.jpg'),
(11, 'NyQuil Cold and Flu', 3, 9.99, 1, 'Bottle of Vicks Nyquil 12oz. Use for minor aches, fevers, and sore throats. Sneezing and running nose. Use before bed as this product is meant for nighttime sleep.', '<ul><li>Bottle of Nyquil</li><li>12oz of cold flu syrup.</li></ul> ', 'Cough Syrup.jpg'),
(13, 'Hysen Nasal Spray', 3, 7.99, 5, 'Hysen Nasal is a nasal spray used to quickly relieve the user of allergies such as pollen and dust. Rubber tip for easy nasal insertion. For adult use only. May be used for children if administered by an adult or professional. ', '<ul><li>Quick and easy nasal spray</li><li>For fast acting allergy relief.</li></ul>', 'Nasal Spray.jpg'),
(14, 'Vicks ZzzQuil', 3, 13.99, 1, 'Vicks ZzzQuil is a nighttime sleep-aid. Contains diphenhydramine HCI. Non-habit Forming. Comes in various flavors. Bottle is 12oz. Bottle is baby proof and requires an adult to open the cap.', '<ul><li>Fall asleep fast</li><li>Fast-acting nighttime sleep-aid</li></ul>', 'ZzzQuil.jpg'),
(15, 'Natrol Melatonin', 3, 15.99, 1, 'Natrol Melatonin gummies- contain 10mg of diphenhydramine. Container contains 90 gummies. This container is flavored with strawberries. Flavors variety as many more options are available. 100% drug free. Fall asleep fast and stay asleep longer. ', '<ul><li>Sleep aid gummies</li><li>help fall asleep fast</li></ul>', 'Sleep Gummies.jpg'),
(16, 'Electric toothbrush (Black)', 4, 59.99, 5, 'A black styled toothbrush that is not only comfortable and quiet but is revolutionary in the toothbrush industry. With award winning design and is scientifically proven to clean deep in-between teeth. ', '<ul><li>A black styled toothbrush</li><li>Electric powered and quiet</li></ul>', 'Toothbrush.jpg'),
(17, 'Colgate', 4, 6.99, 2, 'Colgate toothpaste made from the best paste on earth. With natural ingredients, it gives off a minty breath scent. Protects the customers mouth from cavities.', '<ul><li>The best proactive toothpaste</li><li>Bright teeth and fresh breath guaranteed</li></ul> ', 'Toothpaste.jpg'),
(18, 'Axe Shampoo for hair', 4, 11.99, 1, 'Axe shampoo, made from only naturally grown ingredients. Makes the user feel alive and new with its strong scent and long last hair shine. All you need.', '<ul><li>Axe, shampoo</li><li>hair feel alive and look fresh.</li></ul>', 'Shampoo.jpg'),
(19, 'Pantene Conditioner', 4, 10.99, 2, 'Pantene conditioner offers 24-hour hydration to your hair, making it feel fresh, smooth and light. Includes Pro-V which is proven to improve the condition of your hair.', '<ul><li>Daily moisture for your hair</li><li>Makes your hair feel fresh and new.</li></ul>', 'Conditioner.JPG'),
(20, 'Nivea Body Lotion', 4, 7.99, 2, 'Nivea body lotion offers the best quality in lotion. With fast acting lotion that cures cracking skins and dry ich within minutes. Also offers a green scented smell to your skin.', '<ul><li>Smooth body lotion</li><li>Have your skin feeling smooth within minutes.</li></ul>. ', 'Nivea.jpg'),
(21, 'Pampers swaddlers', 5, 22.99, 2, 'A box of Pampers Swaddlers. Box contains 120 of the softest gentle diapers yet. With a simple and fast way to put them on, these diapers keep the smell in and are easy to change anywhere you go.', '<ul><li>Pampers swaddlers</li><li>New breathable softness diapers</li></ul>', 'Pampers.jpg'),
(22, 'Aquaphor Baby Healing Ointment', 5, 15.99, 1, 'Aquaphor healing ointment offers the best products for every baby. It is very effective against rash and chafing. Size of the container is a 14oz jar. Also, all Aquaphor items are scent free, offering safe treatment to babies without worry. ', '<ul><li>A multi-purpose healing ointment</li><li>For baby skin only, for sensitive skin only.</li></ul>', 'Healing Ointment.jpg'),
(23, 'Baby Magic Baby Wash', 5, 8.99, 2, 'Baby Magic Baby Wash offers gentle hair and body wash. Proven to be baby safe, making your baby smell new and fresh. Bottle is 90z of the best baby wash available.', '<ul><li>Baby Magic is the best baby wash</li><li>Soft powder scented.</li></ul>', 'Baby Wash.JPG'),
(24, 'Avent Soothie', 5, 12.99, 2, 'Avent Soothie is a Philips brand pacifier offering one of the best baby products. Designed for babies from 0 – 3 months old. A pacifier that is distributed to hospitals nationwide.', '<ul><li>The best, very reliable pacifier</li><li>Guaranteed to put your baby asleep.</li></ul>', 'Pacifier.jpg'),
(25, 'Viva Naturals Almond Oil', 5, 15.99, 1, 'Viva Naturals almost oil is a natural blend to provide the customers with a great source of Vitamin E that nourishes skin. The ideal product for DIY beauty blends at home. Comes in a 16oz bottle.', '<ul>\r\n<li>The almond oil that provides </li>\r\n<li>soft nourished skin within minutes.</li>\r\n</ul>', 'Almond Oil.JPG'),
(38, 'Mouth Wash', 1, 7.99, 50, 'Crest-Pro kills 99% of germs. Alcohol free, friendly for adults and children. Multi-purpose mouth wash that guarantees fresh breath and a brighter smile. Soothing mint flavored.', '<ul><li>Reduce Plaque Bacteria</li><li>Claim fresh breath</li></ul>', 'Mouth Wash.jpg'),
(39, 'One a Day Multivitamin', 2, 19.99, 50, 'One A Day is a multi-vitamin tablet that provides all the nutritional support for you! Helps with energy, hearth health, immune health, muscle recovery, and blood pressure. One tablet, 6 benefits.', '<ul>\r\n<li>Get your vitamins all in one!</li>\r\n<li>Helps with 6 key vital functions</li>\r\n</ul>', 'Multi-Vitamin.jpg'),
(40, 'Tylenol Cold & Flu', 3, 11.99, 25, 'Tylenol offers quick relief of minor pain such as fever, headache, sore throat, nasal congestion, and cough. Helps the body loosen mucus and helps with congestions. Capsules contain 325mg of acetaminophen and 10mg of cough suppressant dextromethorphan. ', '<ul><li>Quick pain relief with one tablet</li><li>For Headaches, Colds and Flu</li></ul>', 'Tylenol Cold and Flu.jpg'),
(41, 'Old Spice Deodorant (3 pack)', 4, 16.99, 30, 'Boosts your Man smell and prepares you for success. Offers 24 protection from the Sun’s treacherous heat. Contains 3 Old Spice Deodorants that are 3oz each. Best deal for the buck.', '<ul>\r\n<li>3 Pack of Old Spice Deodorant</li>\r\n<li>Provides with 24-hour odor protection</li>\r\n</ul>\r\n', 'Deodorant.jpg'),
(42, 'Baby Banana teether', 5, 4.99, 25, 'Baby Banana is a product for toddlers and babies that are teething. With its baby safe rubber made brush, provides the chew your baby needs. Not only does it look appetizing, also friendly for babies to hold. Easy washable and durable, lasts against the sharpest teeth. ', '<ul>\r\n<li>Baby teeth banana</li>\r\n<li>To stop Kids from putting thing in mouth</li>\r\n</ul>', 'Banana brush.jpg'),
(43, 'Halls Cough Drops (Strawberry)', 3, 7.99, 20, 'Halls Cough drops. Strawberry flavored. 30 count. Solid candy. For adult consumption only. Use 1 per serving. This is NOT candy.', '<ul>\r\n<li>Strawberry flavored cough drop</li>\r\n<li>Quick relief of coughs and sore throats</li>\r\n</ul>', 'Cough Drops.jpg'),
(45, 'Tootpaste', 4, 3.49, 3, 'Toothpaste for sensitive teeth and cavity prevention. 24/7 Sensitivity protection (with twice daily brushing). Maximum strength (Maximum FDA sensitivity active ingredient) with fluoride. No. 1 dentist recommended brand for sensitive teeth. Dentists have been recommending Sensodyne for many years. Sensodyne Extra Whitening is a fluoride toothpaste. It can be used everyday and provides daily care for sensitive teeth. Sensodyne is specially formulated to relieve tooth sensitivity.', 'Toothpaste for sensitive teeth and cavity protection', '150010076.png');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_title`, `product_price`, `product_qty`) VALUES
(7, 3, 34, 'Blue Protective Face Masks', 9.99, 1),
(8, 22, 34, 'Aquaphor Baby Healing Ointment', 15.99, 1),
(9, 19, 35, 'Pantene Conditioner', 10.99, 1),
(10, 16, 35, 'Electric toothbrush (black)', 59.99, 1),
(11, 12, 36, 'Halls Cough Drops (Strawberry)', 7.99, 5),
(12, 16, 37, 'Electric toothbrush (black)', 59.99, 1),
(13, 17, 38, 'Colgate', 6.99, 1),
(14, 13, 39, 'Hysen Nasal Spray', 7.99, 1),
(15, 18, 39, 'Axe Shampoo for hair', 11.99, 1),
(16, 8, 40, 'Puritan Vitamin K', 15.99, 1),
(17, 12, 40, 'Halls Cough Drops (Strawberry)', 7.99, 1),
(18, 17, 41, 'Colgate', 6.99, 1),
(19, 23, 41, 'Baby Magic Baby Wash', 8.99, 1),
(20, 16, 42, 'Electric toothbrush (black)', 59.99, 1),
(21, 25, 42, 'Viva Naturals Almond Oil', 15.99, 1),
(22, 8, 43, 'Puritan Vitamin K', 15.99, 1),
(23, 10, 44, 'Now Niacin Vitamin 3', 10.99, 1),
(24, 16, 44, 'Electric toothbrush (black)', 59.99, 1),
(25, 8, 44, 'Puritan Vitamin K', 15.99, 1),
(26, 18, 44, 'Axe Shampoo for hair', 11.99, 1),
(27, 17, 44, 'Colgate', 6.99, 1),
(28, 11, 44, 'NyQuil Cold and Flu', 9.99, 1),
(29, 4, 44, 'Tums', 7.99, 1),
(30, 2, 45, 'Great Hand Sanitizer', 4.99, 1),
(31, 23, 45, 'Baby Magic Baby Wash', 8.99, 1),
(32, 1, 45, 'Band Aid', 6.99, 1),
(33, 4, 45, 'Tums', 7.99, 1),
(34, 1, 46, 'Band Aid', 6.99, 2),
(35, 2, 46, 'Great Hand Sanitizer', 4.99, 2),
(36, 1, 47, 'Band Aid', 6.99, 1),
(37, 2, 47, 'Great Hand Sanitizer', 4.99, 1),
(38, 3, 47, 'Blue Protective Face Masks', 9.99, 1),
(39, 4, 47, 'Tums', 7.99, 1),
(40, 5, 47, 'Dulcolax', 12.99, 1),
(41, 6, 48, 'Now Vitamin A soft gels', 18.99, 1),
(42, 7, 48, 'Now Vitamin C-1000', 21.99, 1),
(43, 8, 48, 'Puritan Vitamin K', 15.99, 1),
(44, 9, 48, 'Nature Made B1 Vitamins', 14.99, 1),
(45, 10, 48, 'Now Niacin Vitamin 3', 10.99, 1),
(46, 14, 49, 'Vicks ZzzQuil', 13.99, 1),
(47, 2, 49, 'Great Hand Sanitizer', 4.99, 2),
(48, 6, 50, 'Now Vitamin A soft gels', 18.99, 1),
(49, 7, 50, 'Now Vitamin C-1000', 21.99, 1),
(50, 1, 51, 'Band Aid', 6.99, 1),
(51, 8, 51, 'Puritan Vitamin K', 15.99, 1),
(52, 8, 52, 'Puritan Vitamin K', 15.99, 1),
(53, 16, 52, 'Electric toothbrush (black)', 59.99, 2),
(54, 25, 52, 'Viva Naturals Almond Oil', 15.99, 1),
(55, 5, 53, 'Dulcolax', 12.99, 1),
(56, 13, 53, 'Hysen Nasal Spray', 7.99, 1),
(57, 20, 54, 'Nivea Body Lotion', 7.99, 1),
(58, 19, 54, 'Pantene Conditioner', 10.99, 2),
(59, 18, 54, 'Axe Shampoo for hair', 11.99, 1),
(60, 20, 55, 'Nivea Body Lotion', 7.99, 2),
(61, 1, 56, 'Band Aid', 6.99, 2),
(62, 2, 56, 'Great Hand Sanitizer', 4.99, 1),
(63, 25, 57, 'Viva Naturals Almond Oil', 15.99, 1),
(64, 25, 58, 'Viva Naturals Almond Oil', 15.99, 1),
(65, 1, 59, 'Band Aid', 6.99, 1),
(66, 25, 60, 'Viva Naturals Almond Oil', 15.99, 1),
(67, 3, 61, 'Blue Protective Face Masks', 9.99, 2),
(68, 39, 62, 'One a Day Multivitamin', 19.99, 2),
(69, 8, 62, 'Puritan Vitamin K', 15.99, 1),
(70, 1, 63, 'Band Aid', 6.99, 1),
(71, 2, 64, 'Great Hand Sanitizer', 4.99, 1),
(72, 38, 64, 'Mouth Wash', 7.99, 2),
(73, 39, 65, 'One a Day Multivitamin', 19.99, 2),
(74, 42, 66, 'Baby Banana teether', 4.99, 3),
(75, 1, 66, 'Band Aid', 6.99, 23),
(76, 43, 66, 'Halls Cough Drops (Strawberry)', 7.99, 3),
(77, 43, 67, 'Halls Cough Drops (Strawberry)', 7.99, 1),
(78, 18, 68, 'Axe Shampoo for hair', 11.99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isAdmin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `username`, `password`, `email`, `isAdmin`) VALUES
(7, 'project', '415', 'project415', '$2y$10$8jpLObWbrnxSVt4pfqdcYunhXz2YpRf.WR36skCkuVZPQ9RPMc2jO', 'project415@email.com', 'Yes'),
(8, 'Admin', 'Admin', 'Admin', '$2y$10$E2WqgQKLcDWfdwwzg2Cb..r0tvnaG2ACHAo8CtC75RzLoIs9F8pDm', 'admin@email.com', 'Yes'),
(14, 'Tim', 'Tim\' last name', 'Tim', '$2y$10$ho6Y7NZbDWUW0ShTXhRByOv3AUf/osc/wuhl5zkC/aLl3RcCilVK.', 'tim@123.com', 'No'),
(16, 'Kris', 'Kris\' last name', 'Kris', '$2y$10$2t/ZWHo337QtMeO/sMxthuKhVrqZFXBlPUt3LQHbKBlXBb/Jampym', 'kris@admin.com', 'Yes'),
(17, 'kevin', 'kevin\' last name', 'kevin', '$2y$10$aIdS17b6zKKPzNkq5.BYh.cUw6pLAvOVR3qfHG2HyFvBrTMuq85NC', 'kevin@123.com', ''),
(18, 'Viren', 'Viren\' last name', 'Viren', '$2y$10$4XlywHq0Hh5h9AGiwBfdxOI57a/xi8p3tOPxpFiZVyZgERwRdDk3e', 'Viren@123.com', ''),
(19, 'John', 'Kelly', 'Jkelly', '$2y$10$7jsKC5Nm7TDOl3YgY.z3xephjW5v5qgYyYEwOCOs8xhOlU3BVyRau', 'Jkelly@what.com', ''),
(20, 'Max', 'Max\' last name', 'Max', '$2y$10$QFbBnsqpt7bIT3RdMkOVvuOHpDfkklc7IvNJWkxIQt0wWXjyXiBgS', 'max@123.com', ''),
(21, 'Johan', 'doe', 'John', '$2y$10$jySsCBw.6qB5dPnTCmizsOSXyhLMxpJt8PNDCiKpE1YCYPsVg69W6', 'john@123.com', ''),
(22, 'Allen', 'yang', 'allen', '$2y$10$dyZtZfvMqqrhI6MGK5EeaO48It8wEsGh79MWmiBXqVi286auCEVl2', 'allen@123.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
