-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 12:16 AM
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
-- Database: `cwdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(25) NOT NULL,
  `admin_name` varchar(125) NOT NULL,
  `admin_email` varchar(125) NOT NULL,
  `admin_password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Awais Hussain', 'sabeel890@hotmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(25) NOT NULL,
  `product_name` varchar(125) NOT NULL,
  `product_category` varchar(125) NOT NULL,
  `product_description` varchar(900) NOT NULL,
  `product_image1` varchar(125) NOT NULL,
  `product_image2` varchar(125) NOT NULL,
  `product_image3` varchar(125) NOT NULL,
  `product_image4` varchar(125) NOT NULL,
  `product_price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_price`) VALUES
(1, 'New Balance 550', 'Clothing', 'The original 550 debuted in 1989 and made its mark on basketball courts from coast to coast. After its initial run, the 550 was filed away in the archives, before being reintroduced in limited-edition releases in late 2020, and returned to the full-time lineup in 2021, quickly becoming a global fashion favorite. The 550’s low top, streamlined silhouette offers a clean take on the heavy-duty designs of the late ‘80s, while the dependable leather, synthetic, and mesh upper construction is a classic look in any era.', 'BestSeller1.png', 'BestSeller2.png', 'BestSeller3.png', 'BestSeller4.png', 120.00),
(2, 'Nike Dunk Low Retro ', 'Shoes ', 'Always on trend and able to reinvent any style, the Nike Dunk Low Polar Blue comes in a blend of white, complemented by blue accents, creating a fresh allure. Honouring its legacy, classic elements like breathable perforations and a woven Nike tag on the nylon tongue exude authenticity. The pair features a robust rubber cupsole for enduring strength and a lightweight polyurethane wedge for a cushioned stride. Refresh your wardrobe with the Nike Dunk Low Polar Blue.', 'BestSeller2.png', 'BestSeller2.png', 'BestSeller2.png', 'BestSeller2.png', 150.00),
(3, 'RAY-BAN | META WAYFARER', 'Clothing', 'See the world is a smart new way. These Ray-Ban Meta smart glasses are built around the classic Wayfarer design, but there\'s more to them than meets the eye. With a 12 MP camera and 5 mic system, you can capture your finest moments in high-res photos and videos. And you\'ll look the bees knees doing it. Why not share your unique perspective with your friends? You can live stream straight to Facebook and Instagram, wherever you go. Plus, there\'s open-ear speakers built into the frame so you can accompany your adventures with a slamming soundtrack. Or use it to take hands-free calls while your phone stays in your pocket.', 'BestSeller3.png', 'BestSeller3.png', 'BestSeller3.png', 'BestSeller3.png', 250.00),
(4, 'Evyday', 'Accessories', 'Take your airport look to the next level. The EVYDAY holdall is crafted from a durable, faux leather shell and finished with stripe detailing. The double-zip opens up to a spacious, lined interior with a zipped compartment. This is the perfect partner for a couple of nights away from home.', 'BestSeller4.png', 'BestSeller4.png', 'BestSeller4.png', 'BestSeller4.png', 100.00),
(5, 'Football ', 'Adidas UCL League 23/24 Knockout Ball ', 'Play like the pros do with this UEFA Champions League 2023/24 Knockout Football from adidas. In a White colourway, this size 5 football is made with a tough but lightweight foam core for lasting use. Borrowing design lines from the official ball, it has a durable TPU cover so you can pinpoint your control and an airless construction so you never lose out on bounce. Finished with UEFA Champions League detailing and signature adidas branding. | IN9337\r\n', 'football.png', 'football.png', 'football.png', 'football.png', 35.00),
(6, 'Stone Island 90730 Lino Nylon TELA-TC', 'Accessories', 'Two, large frontal bellow pockets with boxy flap and hidden zip fastenings, Stone Island Compass patch logo. On one side, computer pocket, with long zip vertical zip fastening and additional Velcro fastened entrance from the inside. Upper flap fastened by nylon strap with adjustable buckle and inner zippered pocket; top handle with Stone Island lettering embroidery. Entrance with contour drawstring. Bottom part in tear resistant Cordura®. Padded back, with adjustable shoulder straps.', 'stoneislandbag.png', 'stoneislandbag.png', 'stoneislandbag.png', 'stoneislandbag.png', 485.00),
(7, 'Ralph Lauren Classic Logo Beanie ', 'Accessories ', 'This Beanie Hat from Polo Ralph Lauren is your new favourite winter weather addition to your ensemble, with it\'s sumptuous Pima cotton fabric enhancing your comfort. Offering a seamed crown with a fold-over cuff, this look is designed in an emboldened colourway for an easy-to-style appeal, elevated by the embroidered pony motif on the cuff for a prestigious finish. Machine Wash according to care instructions.', 'RalphLaurenBeanie.png', 'RalphLaurenBeanie.png', 'RalphLaurenBeanie.png', 'RalphLaurenBeanie.png', 69.99),
(8, 'Nike HyperFuel Drinks Bottle', 'Accessories ', 'ike Hyperfuel water bottle can hold 946ml.\r\nWith a valve operated sports top the bottle only despenses drink when you want it. The valve prevents leaking whatever angle the bottle is left at. A large opening screw top makes filling easy.\r\nThe bottle is ergonomically designed for a better grip and ease when drinking. The design ensures only one hand is needed to drink from the bottle.\r\nTranslucent body enables you to track consumption.\r\nStrategically placed grip.', 'NikeWaterBottle.jpg', 'NikeWaterBottle.jpg', 'NikeWaterBottle.jpg', 'NikeWaterBottle.jpg', 25.00),
(9, 'LOUIS VUITTON Hybrid Zipped Technical Cotton Hoodie', 'Clothing', 'This hybrid zip-through hoodie is perfect for an easy weekend look and can be worn as a set with matching trousers. The textured jersey body features this collection’s LV Epi XL motif in an embossed knit, while an embroidered LV on the chest signs this sporty piece. The padded technical sleeves and hood strengthen the outerwear feel.\r\n\r\n', 'LVHoodie.png', 'LVHoodie.png', 'LVHoodie.png', 'LVHoodie.png', 1500.00),
(10, 'Nike Outdoor Woven Cargo Trousers', 'Clothing ', 'When you have more than you can carry, it\'s nice to have cargo pockets to store all your extra stuff. Smooth with a slightly structured feel, the lightweight woven fabric won\'t weigh you down on the work—but all that stuff in your pockets might', 'Nikecargos.png', 'Nikecargos.png', 'Nikecargos.png', 'Nikecargos.png', 28.00),
(11, 'Nike Athlete Running Shirt', 'Clothing ', 'The Nike Dri-FIT T-Shirt gives you a soft feel, sweat-wicking performance and great range of motion to get you through your workout in comfort.\r\n\r\n', 'Nikeathleteshirt.png', 'Nikeathleteshirt.png', 'Nikeathleteshirt.png', 'Nikeathleteshirt.png', 15.00),
(12, 'Nike Running Trousers', 'Clothing ', 'The Nike Dri-FIT Park Pants have sweat-wicking fabric to help keep you dry and comfortable during training.\r\nStretchy calf panels make it easy to change with cleats and side pockets hold your belongings.', 'NikeRunningTrousers.png', 'NikeRunningTrousers.png', 'NikeRunningTrousers.png', 'NikeRunningTrousers.png', 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(25) NOT NULL,
  `user_name` varchar(125) NOT NULL,
  `user_email` varchar(125) NOT NULL,
  `user_password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(4, 'Sabeel Khan', 'sabeel89000@gmail.com', '6edf26f6e0badff12fca32b16db38bf2'),
(6, 'Awais Hussain', 'A.Hussain@gmail.com', '2c219fba49455692a2fd0fd693977f06'),
(7, 'Yaqoob Mohammed ', 'Y.Mohammed121231@gmail.com', '2c219fba49455692a2fd0fd693977f06'),
(8, 'Kian Biswas', 'K.Biswas@hotmail.com', '2c219fba49455692a2fd0fd693977f06'),
(9, 'Mahad Nazar', 'M.Nazar@gmail.com', '2c219fba49455692a2fd0fd693977f06'),
(10, 'Ehatsham Afzal', 'E.Afzal@outlook.com', '2c219fba49455692a2fd0fd693977f06'),
(11, 'Saeedul Islam', 'S.Islam@sky.com', '2c219fba49455692a2fd0fd693977f06'),
(12, 'Obaid Aamir', 'O.Aamir@gmail.com', '2c219fba49455692a2fd0fd693977f06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
