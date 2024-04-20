-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 11:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axios-pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Invitations'),
(2, 'Greetings Notes'),
(3, 'Favor Bags'),
(4, 'Food'),
(5, 'Miscellaneous'),
(6, 'Partyware'),
(7, 'Decorations');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `contact_number`, `created_at`, `updated_at`) VALUES
(1, 'Genasx', 'Gillets', '3336526144', NULL, '2024-04-15 03:46:34'),
(2, 'Quintina', 'Bellord', '1784460409', NULL, NULL),
(3, 'Winn', 'Fears', '4633759265', NULL, NULL),
(4, 'Arnie', 'Kiddie', '7128493233', NULL, NULL),
(5, 'Geoffry', 'Pryke', '3437052981', NULL, NULL),
(6, 'Sisely', 'Bispham', '5284659169', NULL, NULL),
(7, 'Kylen', 'Maudsley', '9412849893', NULL, NULL),
(8, 'Brinn', 'Douty', '7958134507', NULL, NULL),
(9, 'Kendra', 'Kauscher', '9186517940', NULL, NULL),
(10, 'Charmian', 'Domelow', '5113536174', NULL, NULL),
(11, 'Pietra', 'Flaxman', '5237485723', NULL, NULL),
(12, 'Peta', 'Coulter', '4045130556', NULL, NULL),
(13, 'Margie', 'Domino', '2982958133', NULL, NULL),
(14, 'Cori', 'Egalton', '4853346725', NULL, NULL),
(15, 'Felike', 'Maseyk', '4665373733', NULL, NULL),
(16, 'Pacorro', 'Darte', '5447048631', NULL, NULL),
(18, 'Xavier', 'Pindell', '2011483585', NULL, NULL),
(19, 'Riordan', 'Duker', '4721321124', NULL, NULL),
(20, 'Katine', 'Thomas', '4271235295', NULL, NULL),
(21, 'Huntley', 'Droghan', '3189882369', NULL, NULL),
(22, 'Jerrilyn', 'Neiland', '8409132718', NULL, NULL),
(23, 'Clemmy', 'Scriver', '3898430924', NULL, NULL),
(24, 'Karlik', 'Pyser', '6513271583', NULL, NULL),
(25, 'Yehudit', 'Byford', '5078607890', NULL, NULL),
(26, 'Tiler', 'Deverson', '2563124145', NULL, NULL),
(27, 'Cookie', 'Poacher', '6384665428', NULL, NULL),
(28, 'Gwendolyn', 'Brothwood', '7544414872', NULL, NULL),
(29, 'Eadmund', 'Desouza', '5411875966', NULL, NULL),
(30, 'Ardisj', 'Mougenel', '9781466825', NULL, NULL),
(31, 'Koren', 'Soldan', '7085869867', NULL, NULL),
(32, 'Jenica', 'Cunniam', '8096239533', NULL, NULL),
(33, 'Sophronia', 'Iskowicz', '9229156139', NULL, NULL),
(35, 'Bernardine', 'Doneld', '5639350945', NULL, NULL),
(36, 'Sunshine', 'Abrahami', '4621174343', NULL, NULL),
(37, 'Neville', 'Lain', '7987880277', NULL, NULL),
(38, 'Aleen', 'Tern', '5572090169', NULL, NULL),
(39, 'Flinn', 'Berkowitz', '1978898515', NULL, NULL),
(40, 'Mercie', 'Lackney', '4813157920', NULL, NULL),
(41, 'Izak', 'Espin', '2715760319', NULL, NULL),
(42, 'Rad', 'McAndrew', '3865623665', NULL, NULL),
(43, 'Salmon', 'Gartan', '3924150577', NULL, NULL),
(44, 'Elsworth', 'Cottem', '4948043661', NULL, NULL),
(45, 'Doralyn', 'Adamovicz', '7003871048', NULL, NULL),
(46, 'Tammy', 'Fettis', '3257783106', NULL, NULL),
(47, 'Poul', 'Beeswing', '7643038951', NULL, NULL),
(48, 'Wini', 'Coger', '2972253842', NULL, NULL),
(49, 'Rosemonde', 'Dorsey', '5953679066', NULL, NULL),
(50, 'Cassie', 'Semrad', '2218521070', NULL, NULL),
(51, 'Christi', 'Smeath', '6484233124', NULL, NULL),
(52, 'Brooks', 'Northen', '9216430498', NULL, NULL),
(53, 'Elvira', 'Masi', '4413961673', NULL, NULL),
(54, 'Alla', 'Key', '9363603168', NULL, NULL),
(55, 'Leanor', 'Stannion', '3632516960', NULL, NULL),
(56, 'Alyson', 'Sissens', '8008984257', NULL, NULL),
(57, 'Merrie', 'Sergeant', '8302269593', NULL, NULL),
(58, 'Faith', 'Shackesby', '6696347293', NULL, NULL),
(59, 'Anabella', 'Pellman', '8032204177', NULL, NULL),
(60, 'Joanna', 'Rechert', '8528753649', NULL, NULL),
(61, 'Griffy', 'Kochl', '1004742489', NULL, NULL),
(62, 'Brockie', 'Hatherleigh', '2413389852', NULL, NULL),
(63, 'Shae', 'Conisbee', '4519112172', NULL, NULL),
(64, 'Bradley', 'Terrans', '3463774449', NULL, NULL),
(65, 'Valeda', 'Mc Queen', '9808665116', NULL, NULL),
(66, 'Sashenka', 'Scading', '5142211145', NULL, NULL),
(67, 'Allison', 'Bruster', '5136826443', NULL, NULL),
(68, 'Jedd', 'Kinder', '3724608878', NULL, NULL),
(69, 'Garrik', 'Baulk', '9733796200', NULL, NULL),
(70, 'Shara', 'Ducastel', '3267469200', NULL, NULL),
(71, 'Fiann', 'Jansema', '8893706323', NULL, NULL),
(72, 'Davy', 'Beningfield', '3199744869', NULL, NULL),
(73, 'Irwin', 'Pinnijar', '2527009691', NULL, NULL),
(74, 'Ottilie', 'Robion', '9794074424', NULL, NULL),
(75, 'Kelly', 'Burry', '1078268003', NULL, NULL),
(76, 'Alvie', 'Sargant', '9687902432', NULL, NULL),
(77, 'Axe', 'Daintree', '7831973946', NULL, NULL),
(78, 'Si', 'Hearty', '5786580587', NULL, NULL),
(79, 'Cad', 'Lenox', '4191854865', NULL, NULL),
(80, 'Kristal', 'Moret', '4087516796', NULL, NULL),
(81, 'Carlos', 'Pessold', '8516082243', NULL, NULL),
(82, 'Celinka', 'Donnellan', '1767707325', NULL, NULL),
(83, 'Emmalynn', 'McMurdo', '2933673462', NULL, NULL),
(84, 'Natala', 'Kennan', '7675209698', NULL, NULL),
(85, 'Floria', 'Tabour', '5554562386', NULL, NULL),
(86, 'Arlana', 'Connal', '4883913155', NULL, NULL),
(87, 'Rodney', 'MacPaik', '2626280431', NULL, NULL),
(88, 'Jaime', 'Gullan', '8739889370', NULL, NULL),
(89, 'Timmie', 'McFee', '2673352911', NULL, NULL),
(90, 'Orsa', 'Appleford', '4569979145', NULL, NULL),
(91, 'Felicity', 'O\'Mannion', '2963612935', NULL, NULL),
(92, 'King', 'Harbottle', '3984279765', NULL, NULL),
(93, 'Kessiah', 'Gladwin', '3527599668', NULL, NULL),
(94, 'Alison', 'Noweak', '1006046281', NULL, NULL),
(95, 'Torrin', 'Saffell', '5052232888', NULL, NULL),
(96, 'Wren', 'Reynold', '9599698361', NULL, NULL),
(97, 'Virgina', 'Demschke', '4542063068', NULL, NULL),
(98, 'Brandie', 'Crumpe', '6085249144', NULL, NULL),
(99, 'Manolo', 'Rycraft', '9122718513', NULL, NULL),
(100, 'Allin', 'Traite', '6262422289', NULL, NULL),
(101, 'Mike', 'Ink', '09123456789', '2024-04-15 03:26:30', '2024-04-15 03:26:30'),
(102, 'Jonas', 'Smith', '8052370510', '2024-04-16 23:38:52', '2024-04-16 23:38:52'),
(103, 'Tiffany', 'White', '01481722660', '2024-04-16 23:42:12', '2024-04-16 23:42:12'),
(104, 'Hard', 'ToGet', '0123921398123', '2024-04-16 23:43:27', '2024-04-16 23:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `hired_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `gender`, `email`, `user_type`, `hired_date`, `location_id`, `contact_number`) VALUES
(1, 'John', 'Mamanao', 'Male', 'johnmamanao@gmail.com', 1, '06/08/2023', 130, '3957120027'),
(2, 'Gunilla', 'Lipyeat', 'Female', 'glipyeat1@cbslocal.com', 3, '06/14/2023', 102, '5765952241'),
(3, 'Vaughan', 'Longhirst', 'Male', 'vlonghirst2@independent.co.uk', 1, '03/07/2024', 121, '5322579827'),
(4, 'Carny', 'Proughten', 'Male', 'cproughten3@mail.ru', 1, '06/25/2023', 90, '1928532422'),
(5, 'Tremayne', 'Scotson', 'Male', 'tscotson4@sciencedaily.com', 2, '03/03/2024', 45, '1556662179'),
(6, 'Granthem', 'Kibard', 'Male', 'gkibard5@paypal.com', 2, '04/02/2024', 3, '2586327248'),
(7, 'Betsy', 'Bosley', 'Female', 'bbosley6@nsw.gov.au', 1, '07/07/2023', 92, '9045576547'),
(8, 'Ward', 'Spendlove', 'Male', 'wspendlove7@mac.com', 3, '08/09/2023', 16, '5297374070'),
(9, 'Rufe', 'Sibylla', 'Male', 'rsibylla8@dagondesign.com', 2, '05/02/2023', 49, '5222824807'),
(11, 'Max', 'Grzelczak', 'Male', 'mgrzelczaka@skyrock.com', 3, '11/27/2023', 108, '5096299786'),
(12, 'Garrek', 'Yele', 'Male', 'gyeleb@chronoengine.com', 1, '09/03/2023', 20, '1988282170'),
(13, 'Finley', 'Duffil', 'Male', 'fduffilc@mozilla.org', 2, '11/11/2023', 35, '3302116600'),
(14, 'Thekla', 'Surgison', 'Female', 'tsurgisond@tripadvisor.com', 2, '05/23/2023', 51, '1195868605'),
(16, 'Karleen', 'Shirland', 'Female', 'kshirlandf@google.co.uk', 2, '03/01/2024', 68, '5772538593'),
(17, 'Rafa', 'Glenn', 'Female', 'rglenng@studiopress.com', 3, '05/31/2023', 6, '4037805206'),
(18, 'Theodoric', 'Martignoni', 'Male', 'tmartignonih@adobe.com', 2, '08/21/2023', 30, '2059726793'),
(19, 'Inga', 'Rowney', 'Female', 'irowneyi@weibo.com', 3, '12/23/2023', 53, '4129763934'),
(20, 'Stafford', 'Serrurier', 'Male', 'sserrurierj@hugedomains.com', 1, '11/11/2023', 21, '1077800013'),
(21, 'Casie', 'Staning', 'Female', 'cstaningk@businesswire.com', 2, '08/04/2023', 67, '6567026884'),
(22, 'Mallorie', 'Keesman', 'Female', 'mkeesmanl@baidu.com', 1, '02/11/2024', 29, '5554119719'),
(23, 'Luisa', 'Croix', 'Female', 'lcroixm@bbc.co.uk', 2, '06/19/2023', 118, '1392421372'),
(24, 'Haslett', 'Cawdery', 'Male', 'hcawderyn@joomla.org', 1, '11/14/2023', 29, '5927355211'),
(25, 'Tadeas', 'Annandale', 'Male', 'tannandaleo@wikia.com', 2, '06/07/2023', 63, '1337621885'),
(26, 'Bennie', 'Toppes', 'Female', 'btoppesp@bloglovin.com', 3, '02/14/2024', 79, '3504526064'),
(27, 'Britt', 'Minister', 'Female', 'bministerq@alexa.com', 2, '06/18/2023', 94, '3045043861'),
(28, 'Becka', 'Vasilchikov', 'Female', 'bvasilchikovr@reference.com', 1, '12/18/2023', 5, '4864494862'),
(29, 'Kimble', 'Hackworthy', 'Male', 'khackworthys@last.fm', 3, '05/13/2023', 91, '5808615436'),
(30, 'Aureliass', 'Farland', 'Female', 'afarlandt@aol.coms', 1, '2023-08-24', 59, '51881751482'),
(31, 'Loralyn', 'Cannings', 'Genderfluid', 'lcanningsu@jimdo.com', 3, '11/10/2023', 86, '5356992267'),
(32, 'Carrie', 'Simionato', 'Female', 'csimionatov@apache.org', 1, '11/28/2023', 31, '2913323210'),
(33, 'Merrick', 'Betun', 'Male', 'mbetunw@virginia.edu', 1, '03/24/2024', 128, '4443697564'),
(34, 'Carey', 'Horwell', 'Female', 'chorwellx@comcast.net', 2, '01/23/2024', 27, '3046819200'),
(35, 'Esdras', 'Sines', 'Male', 'esinesy@xing.com', 2, '01/08/2024', 36, '8591570683'),
(36, 'Rosalynd', 'Chatteris', 'Female', 'rchatterisz@washington.edu', 1, '03/06/2024', 75, '4785585592'),
(39, 'Jaimie', 'Chaman', 'Female', 'jchaman12@e-recht24.de', 1, '08/25/2023', 7, '7829134123'),
(40, 'Rickysxxsex', 'Winsiowieckiss', 'Female', 'rwinsiowiecki13@myspace.com', 3, '12/08/2023', 21, '8887881719'),
(41, 'Carling', 'Kitman', 'Bigender', 'ckitman14@paginegialle.it', 1, '02/19/2024', 45, '3994344381'),
(42, 'Inigo', 'Canton', 'Male', 'icanton15@pbs.org', 3, '01/22/2024', 69, '1464354859'),
(43, 'Hanan', 'Hugonnet', 'Male', 'hhugonnet16@privacy.gov.au', 1, '10/07/2023', 66, '4848874296'),
(44, 'Cherice', 'Tidbald', 'Female', 'ctidbald17@ibm.com', 1, '07/05/2023', 39, '3452575968'),
(45, 'Kipper', 'Gueinn', 'Male', 'kgueinn18@barnesandnoble.com', 2, '01/20/2024', 65, '3265145993'),
(46, 'Hamlin', 'Aurelius', 'Male', 'haurelius19@comsenz.com', 1, '05/12/2023', 40, '3493274444'),
(47, 'Domingo', 'Bampkin', 'Male', 'dbampkin1a@blog.com', 2, '06/14/2023', 49, '7878824293'),
(48, 'Willie', 'Sieghart', 'Male', 'wsieghart1b@narod.ru', 1, '09/09/2023', 20, '1674432304'),
(49, 'Elyn', 'Bagshaw', 'Polygender', 'ebagshaw1c@weebly.com', 3, '06/12/2023', 107, '6625424929'),
(50, 'Bird', 'Widd', 'Female', 'bwidd1d@paginegialle.it', 1, '03/16/2024', 34, '8806393597'),
(57, 'John Charles Frederick', 'Mamanao', 'Male', 'beastnectus@gmail.com', NULL, '2024-04-17', NULL, '09194312460');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_name` varchar(250) NOT NULL,
  `num_of_items` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `cash` varchar(250) NOT NULL,
  `customer_change` varchar(250) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `customer_id`, `product_name`, `num_of_items`, `price`, `total`, `cash`, `customer_change`, `date`) VALUES
(19, 18, 'Benefon TWIG Discovery Pro', '1', '901', '901', '1000', '99', '2024-04-19 00:21:54'),
(20, 8, 'Benefon TWIG Discovery Pro', '2', '901', '1802', '3000', '1198', '2024-04-19 01:06:49'),
(21, 12, 'Benefon TWIG Discovery Pro', '2', '901', '1802', '5000', '3198', '2024-04-19 01:33:24'),
(22, 10, 'Benefon TWIG Discovery Pro', '2', '901', '1802', '2000', '198', '2024-04-19 01:40:09'),
(23, 18, 'Benefon TWIG Discovery Pro', '2', '901', '1802', '3000', '1198', '2024-04-19 01:45:22'),
(24, 13, 'Benefon TWIG Discovery Pro', '2', '901', '1802', '2000', '198', '2024-04-19 01:47:39'),
(25, 14, 'Benefon TWIG Discovery Pro', '1', '901', '901', '2000', '1099', '2024-04-19 01:48:32'),
(26, 14, 'Benefon TWIG Discovery Pro', '1', '901', '901', '1000', '99', '2024-04-19 01:49:14'),
(27, 7, 'Benefon TWIG Discovery Pro', '1', '901', '901', '1000', '99', '2024-04-19 01:53:00'),
(28, 13, 'Benefon TWIG Discovery Pro', '1', '901', '901', '1000', '99', '2024-04-19 01:53:48'),
(29, 11, 'Benefon TWIG Discovery Pro', '1', '901', '901', '2000', '1099', '2024-04-19 01:56:01'),
(30, 9, 'Benefon TWIG Discovery Pro', '1', '901', '901', '1000', '99', '2024-04-19 01:56:29'),
(31, 11, 'Benefon TWIG Discovery Pro', '2', '901', '1802', '2000', '198', '2024-04-19 01:58:49'),
(32, 15, 'Benefon TWIG Discovery Pro', '2', '901', '1802', '2000', '198', '2024-04-19 02:00:43'),
(33, 18, 'Benefon TWIG Discovery Pro', '1', '901', '901', '5000', '4099', '2024-04-19 02:01:28'),
(34, 13, 'Benefon TWIG Discovery Pro', '5', '901', '4505', '5000', '495', '2024-04-19 02:01:49'),
(35, 13, 'Benefon TWIG Discovery Pro', '2', '901', '1802', '2000', '198', '2024-04-19 02:09:43'),
(36, 76, 'Benefon TWIG Discovery Pro', '1', '901', '901', '1000', '99', '2024-04-19 02:10:26'),
(37, 10, 'Chea 208', '5', '809', '4045', '5000', '955', '2024-04-19 02:13:13'),
(38, 13, 'Chea 208', '4', '809', '3236', '4000', '764', '2024-04-19 03:02:47'),
(39, 12, 'Energizer E280s', '2', '851', '1702', '2000', '298', '2024-04-19 03:04:50'),
(40, 13, 'Chea 208', '5', '809', '4045', '5000', '955', '2024-04-19 03:08:08'),
(41, 14, 'Chea 208', '5', '809', '4045', '5000', '955', '2024-04-19 03:15:30'),
(42, 14, 'Benefon TWIG Discovery Pro', '1', '901', '901', '2000', '1099', '2024-04-19 03:18:43'),
(43, 8, 'Chea 208', '5', '809', '4045', '5000', '955', '2024-04-19 03:21:45'),
(44, 16, 'Chea 208', '5', '809', '4045', '5000', '955', '2024-04-19 03:23:32'),
(45, 14, 'Chea 208', '2', '809', '1618', '2000', '382', '2024-04-19 03:24:46'),
(46, 10, 'Chea 208', '2', '809', '1618', '2000', '382', '2024-04-19 03:25:06'),
(47, 16, 'Chea 208', '2', '809', '1618', '2000', '382', '2024-04-19 03:34:24'),
(48, 14, 'Chea 208', '2', '809', '1618', '2000', '382', '2024-04-19 03:35:02'),
(49, 15, 'Chea 208', '2', '809', '1618', '2000', '382', '2024-04-19 03:36:36'),
(50, 20, 'Chea 208', '2', '809', '1618', '2000', '382', '2024-04-19 03:37:13'),
(51, 19, 'Chea 208', '2', '809', '1618', '5000', '3382', '2024-04-19 03:39:46'),
(52, 14, 'Chea 208', '2', '809', '1618', '2000', '382', '2024-04-19 03:42:04'),
(53, 15, 'Chea 208', '2', '809', '1618', '2000', '382', '2024-04-19 03:43:21'),
(54, 15, 'Chea 208', '2', '809', '1618', '2000', '382', '2024-04-19 03:47:43'),
(55, 15, 'Chea 208', '5', '809', '4045', '5000', '955', '2024-04-19 05:46:16'),
(56, 18, 'Chea 208', '2', '809', '1618', '10000', '8382', '2024-04-19 06:04:48'),
(57, 18, 'Energizer E280s', '2', '851', '1702', '10000', '8298', '2024-04-19 06:04:48'),
(58, 18, 'Gionee Pioneer P5L', '2', '893', '1786', '10000', '8214', '2024-04-19 06:04:48'),
(59, 102, 'Chea 208', '1', '809', '809', '3000', '2191', '2024-04-19 06:25:20'),
(60, 102, 'Energizer E280s', '1', '851', '851', '3000', '2149', '2024-04-19 06:25:20'),
(61, 102, 'Gionee Pioneer P5L', '1', '893', '893', '3000', '2107', '2024-04-19 06:25:20'),
(62, 98, 'alcatel A3', '10', '868', '8680', '25000', '16320', '2024-04-19 06:33:31'),
(63, 98, 'Amoi A102', '5', '762', '3810', '25000', '21190', '2024-04-19 06:33:31'),
(64, 98, 'BLU Life One X2 Mini', '5', '606', '3030', '25000', '21970', '2024-04-19 06:33:31'),
(65, 98, 'Micromax Canvas Nitro 4G E455', '7', '739', '5173', '25000', '19827', '2024-04-19 06:33:31'),
(66, 98, 'Telit t210', '2', '916', '1832', '25000', '23168', '2024-04-19 06:33:31'),
(67, 12, 'Bird S798', '2', '797', '1594', '4000', '2406', '2024-04-19 08:29:27'),
(68, 12, 'Asus Zenfone C ZC451CG', '2', '710', '1420', '4000', '2580', '2024-04-19 08:29:27'),
(69, 12, 'Chea 208', '2', '809', '1618', '4000', '2382', '2024-04-19 08:31:12'),
(70, 12, 'Energizer E280s', '2', '851', '1702', '4000', '2298', '2024-04-19 08:31:12'),
(71, 99, 'Gionee Pioneer P5L', '2', '893', '1786', '2000', '214', '2024-04-19 08:33:08'),
(72, 96, 'Gionee Pioneer P5L', '1', '893', '893', '2000', '1107', '2024-04-19 08:37:45'),
(73, 11, 'Gionee Pioneer P5L', '2', '893', '1786', '3000', '1214', '2024-04-20 05:35:01'),
(74, 11, 'Honor 30', '2', '567', '1134', '3000', '1866', '2024-04-20 05:35:01'),
(75, 18, 'Gionee Pioneer P5L', '2', '893', '1786', '20000', '18214', '2024-04-20 06:15:47'),
(76, 18, 'Bird S798', '1', '797', '797', '20000', '19203', '2024-04-20 06:15:47'),
(77, 18, 'HTC Sensation XL', '3', '784', '2352', '20000', '17648', '2024-04-20 06:15:47'),
(78, 18, 'Icemobile Apollo Touch', '2', '541', '1082', '20000', '18918', '2024-04-20 06:15:47'),
(79, 18, 'Kyocera Brio', '4', '518', '2072', '20000', '17928', '2024-04-20 06:15:47'),
(80, 18, 'Wiko WIM', '5', '681', '3405', '20000', '16595', '2024-04-20 06:15:48'),
(81, 18, 'Motorola One Fusion+', '6', '989', '5934', '20000', '14066', '2024-04-20 06:15:48'),
(82, 7, 'Asus Zenfone C ZC451CG', '2', '710', '1420', '20000', '18580', '2024-04-20 06:16:31'),
(83, 7, 'Bird S798', '2', '797', '1594', '20000', '18406', '2024-04-20 06:16:31'),
(84, 7, 'HTC Sensation XL', '2', '784', '1568', '20000', '18432', '2024-04-20 06:16:31'),
(85, 7, 'Icemobile Apollo Touch', '2', '541', '1082', '20000', '18918', '2024-04-20 06:16:31'),
(86, 7, 'Kyocera Brio', '2', '518', '1036', '20000', '18964', '2024-04-20 06:16:31'),
(87, 7, 'alcatel A3', '2', '868', '1736', '20000', '18264', '2024-04-20 06:16:31'),
(88, 7, 'Amoi A102', '2', '762', '1524', '20000', '18476', '2024-04-20 06:16:31'),
(89, 7, 'BLU Life One X2 Mini', '2', '606', '1212', '20000', '18788', '2024-04-20 06:16:31'),
(90, 7, 'Micromax Canvas Nitro 4G E455', '2', '739', '1478', '20000', '18522', '2024-04-20 06:16:31'),
(91, 7, 'Telit t210', '2', '916', '1832', '20000', '18168', '2024-04-20 06:16:31'),
(92, 18, 'Gionee Pioneer P5L', '1', '893', '893', '2000', '1107', '2024-04-20 06:22:10'),
(93, 11, 'Gionee Pioneer P5L', '1', '893', '893', '1000', '107', '2024-04-20 06:26:46'),
(94, 13, 'Gionee Pioneer P5L', '1', '893', '893', '1000', '107', '2024-04-20 06:28:07'),
(95, 13, 'Gionee Pioneer P5L', '1', '893', '893', '1000', '107', '2024-04-20 06:28:29'),
(96, 12, 'Gionee Pioneer P5L', '1', '893', '893', '2000', '1107', '2024-04-20 06:29:49'),
(97, 18, 'Gionee Pioneer P5L', '1', '893', '893', '2000', '1107', '2024-04-20 06:30:56'),
(98, 19, 'Gionee Pioneer P5L', '1', '893', '893', '2000', '1107', '2024-04-20 06:32:43'),
(99, 14, 'Gionee Pioneer P5L', '1', '893', '893', '2000', '1107', '2024-04-20 06:34:18'),
(100, 15, 'Gionee Pioneer P5L', '1', '893', '893', '1000', '107', '2024-04-20 06:36:57'),
(101, 15, 'Gionee Pioneer P5L', '1', '893', '893', '2000', '1107', '2024-04-20 06:37:36'),
(102, 19, 'Gionee Pioneer P5L', '1', '893', '893', '1000', '107', '2024-04-20 06:39:49'),
(103, 84, 'Gionee Pioneer P5L', '1', '893', '893', '1000', '107', '2024-04-20 06:41:03'),
(104, 102, 'Asus Zenfone C ZC451CG', '2', '710', '1420', '10000', '8580', '2024-04-20 06:41:52'),
(105, 102, 'Icemobile Apollo Touch', '2', '541', '1082', '10000', '8918', '2024-04-20 06:41:52'),
(106, 102, 'Kyocera Brio', '2', '518', '1036', '10000', '8964', '2024-04-20 06:41:52'),
(107, 102, 'HTC Sensation XL', '2', '784', '1568', '10000', '8432', '2024-04-20 06:41:52'),
(108, 61, 'Tecno Spark 6', '2', '621', '1242', '5000', '3758', '2024-04-20 08:52:35'),
(109, 61, 'Xiaomi Redmi Note 2', '2', '718', '1436', '5000', '3564', '2024-04-20 08:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `city`, `province`) VALUES
(1, 'Manila', 'Metro Manila'),
(2, 'Quezon City', 'Metro Manila'),
(3, 'Caloocan', 'Metro Manila'),
(4, 'Las Piñas', 'Metro Manila'),
(5, 'Makati', 'Metro Manila'),
(6, 'Malabon', 'Metro Manila'),
(7, 'Mandaluyong', 'Metro Manila'),
(8, 'Marikina', 'Metro Manila'),
(9, 'Muntinlupa', 'Metro Manila'),
(10, 'Navotas', 'Metro Manila'),
(11, 'Parañaque', 'Metro Manila'),
(12, 'Pasay', 'Metro Manila'),
(13, 'Pasig', 'Metro Manila'),
(14, 'Pateros', 'Metro Manila'),
(15, 'San Juan', 'Metro Manila'),
(16, 'Taguig', 'Metro Manila'),
(17, 'Valenzuela', 'Metro Manila'),
(18, 'Bangued', 'Abra'),
(19, 'Cabadbaran', 'Agusan del Norte'),
(20, 'Butuan', 'Agusan del Norte'),
(21, 'Prosperidad', 'Agusan del Sur'),
(22, 'San Francisco', 'Agusan del Sur'),
(23, 'Kalibo', 'Aklan'),
(24, 'Legazpi', 'Albay'),
(25, 'San Jose de Buenavista', 'Antique'),
(26, 'Kabugao', 'Apayao'),
(27, 'Baler', 'Aurora'),
(28, 'Lamitan', 'Basilan'),
(29, 'Isabela City', 'Basilan'),
(30, 'Balanga', 'Bataan'),
(31, 'Basco', 'Batanes'),
(32, 'Batangas City', 'Batangas'),
(33, 'Lipa', 'Batangas'),
(34, 'Tanauan', 'Batangas'),
(35, 'Baguio', 'Benguet'),
(36, 'Naval', 'Biliran'),
(37, 'Tagbilaran', 'Bohol'),
(38, 'Malaybalay', 'Bukidnon'),
(39, 'Valencia', 'Bukidnon'),
(40, 'Malolos', 'Bulacan'),
(41, 'Meycauayan', 'Bulacan'),
(42, 'San Jose del Monte', 'Bulacan'),
(43, 'Tuguegarao', 'Cagayan'),
(44, 'Daet', 'Camarines Norte'),
(45, 'Naga', 'Camarines Sur'),
(46, 'Mambajao', 'Camiguin'),
(47, 'Roxas City', 'Capiz'),
(48, 'Virac', 'Catanduanes'),
(49, 'Cavite City', 'Cavite'),
(50, 'Dasmarinas', 'Cavite'),
(51, 'Tagaytay', 'Cavite'),
(52, 'Trece Martires', 'Cavite'),
(53, 'Cebu City', 'Cebu'),
(54, 'Lapu-Lapu', 'Cebu'),
(55, 'Mandaue', 'Cebu'),
(56, 'Toledo', 'Cebu'),
(57, 'Nabunturan', 'Compostela Valley'),
(58, 'Kidapawan', 'Cotabato'),
(59, 'Tagum', 'Davao del Norte'),
(60, 'Davao City', 'Davao del Sur'),
(61, 'Digos', 'Davao del Sur'),
(62, 'Malita', 'Davao Occidental'),
(63, 'Mati', 'Davao Oriental'),
(64, 'San Jose', 'Dinagat Islands'),
(65, 'Borongan', 'Eastern Samar'),
(66, 'Jordan', 'Guimaras'),
(67, 'Lagawe', 'Ifugao'),
(68, 'Laoag', 'Ilocos Norte'),
(69, 'Vigan', 'Ilocos Sur'),
(70, 'Iloilo City', 'Iloilo'),
(71, 'Passi', 'Iloilo'),
(72, 'Ilagan', 'Isabela'),
(73, 'Santiago', 'Isabela'),
(74, 'Tabuk', 'Kalinga'),
(75, 'San Fernando', 'La Union'),
(76, 'Biñan', 'Laguna'),
(77, 'Cabuyao', 'Laguna'),
(78, 'Calamba', 'Laguna'),
(79, 'San Pablo', 'Laguna'),
(80, 'Santa Rosa', 'Laguna'),
(81, 'Iligan', 'Lanao del Norte'),
(82, 'Marawi', 'Lanao del Sur'),
(83, 'Ormoc', 'Leyte'),
(84, 'Tacloban', 'Leyte'),
(85, 'Buluan', 'Maguindanao'),
(86, 'Boac', 'Marinduque'),
(87, 'Masbate City', 'Masbate'),
(88, 'Oroquieta', 'Misamis Occidental'),
(89, 'Ozamiz', 'Misamis Occidental'),
(90, 'Tangub', 'Misamis Occidental'),
(91, 'Cagayan de Oro', 'Misamis Oriental'),
(92, 'Gingoog', 'Misamis Oriental'),
(93, 'Bontoc', 'Mountain Province'),
(94, 'Bacolod', 'Negros Occidental'),
(95, 'Bago', 'Negros Occidental'),
(96, 'Cadiz', 'Negros Occidental'),
(97, 'Escalante', 'Negros Occidental'),
(98, 'Himamaylan', 'Negros Occidental'),
(99, 'Kabankalan', 'Negros Occidental'),
(100, 'La Carlota', 'Negros Occidental'),
(101, 'Sagay', 'Negros Occidental'),
(102, 'San Carlos', 'Negros Occidental'),
(103, 'Silay', 'Negros Occidental'),
(104, 'Sipalay', 'Negros Occidental'),
(105, 'Talisay', 'Negros Occidental'),
(106, 'Victorias', 'Negros Occidental'),
(107, 'Bais', 'Negros Oriental'),
(108, 'Bayawan', 'Negros Oriental'),
(109, 'Dumaguete', 'Negros Oriental'),
(110, 'Guihulngan', 'Negros Oriental'),
(111, 'Tanjay', 'Negros Oriental'),
(112, 'Catarman', 'Northern Samar'),
(113, 'Alabel', 'Sarangani'),
(114, 'Siquijor', 'Siquijor'),
(115, 'Sorsogon City', 'Sorsogon'),
(116, 'General Santos', 'South Cotabato'),
(117, 'Koronadal', 'South Cotabato'),
(118, 'Maasin', 'Southern Leyte'),
(119, 'Isulan', 'Sultan Kudarat'),
(120, 'Jolo', 'Sulu'),
(121, 'Surigao City', 'Surigao del Norte'),
(122, 'Tandag', 'Surigao del Sur'),
(123, 'Tarlac City', 'Tarlac'),
(124, 'Bongao', 'Tawi-Tawi'),
(125, 'Olongapo', 'Zambales'),
(126, 'Masinloc', 'Zambales'),
(127, 'Dapitan', 'Zamboanga del Norte'),
(128, 'Dipolog', 'Zamboanga del Norte'),
(129, 'Pagadian', 'Zamboanga del Sur'),
(130, 'Ipil', 'Zamboanga Sibugay');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_04_10_003139_user_types', 2),
(7, '2024_04_10_003616_user_types', 3),
(8, '2024_04_10_004119_user_types', 4),
(12, '2024_04_15_035520_create_products_table', 5),
(13, '2024_04_15_090613_create_customers_table', 6),
(15, '2024_04_15_232012_create_employees_table', 7),
(16, '2024_04_15_234928_create_user_types_table', 8),
(20, '2024_04_15_235950_create_locations_table', 9),
(22, '2024_04_16_043405_create_categories_table', 10),
(23, '2024_04_16_045130_create_products_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_stock` int(11) DEFAULT NULL,
  `on_hand` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `date_stock_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `name`, `description`, `qty_stock`, `on_hand`, `price`, `category_id`, `supplier_id`, `date_stock_in`) VALUES
(1, '03-217-6621', 'LG KF700', 'lacus morbi quis tortor id nulla ultrices aliquet maecenas leo', 77, 100, 922, 5, 28, '2023-07-01'),
(2, '17-552-3778', 'Samsung X460', 'id luctus nec molestie sed justo pellentesque viverra', 82, 30, 944, 5, 27, '2023-09-12'),
(3, '41-476-3067', 'Samsung I9190 Galaxy S4 mini', 'velit donec diam neque vestibulum eget vulputate ut ultrices', 73, 28, 572, 1, 53, '2023-12-08'),
(4, '64-884-2188', 'ZTE Grand Memo V9815', 'pede ac diam cras pellentesque volutpat dui maecenas tristique est', 8, 56, 990, 2, 80, '2023-09-25'),
(5, '06-947-9914', 'Celkon A105', 'justo pellentesque viverra pede ac diam cras pellentesque volutpat', 8, 56, 721, 7, 37, '2023-12-29'),
(6, '87-288-0890', 'ZTE Blade A7 Vita', 'in lacus curabitur at ipsum', 5, 56, 549, 7, 77, '2023-08-13'),
(7, '94-817-8657', 'Lenovo P90', 'vivamus tortor duis mattis egestas metus aenean fermentum donec', 69, 59, 847, 5, 96, '2023-07-11'),
(8, '09-924-4927', 'Wiko Upulse lite', 'enim lorem ipsum dolor sit amet consectetuer adipiscing elit proin', 1, 97, 799, 5, 66, '2023-08-15'),
(9, '54-373-5862', 'Asus ZenFone Live (L2)', 'eu est congue elementum in', 36, 48, 791, 7, 96, '2023-09-15'),
(10, '29-977-8889', 'HTC Desire 626', 'ut nunc vestibulum ante ipsum primis in', 13, 88, 549, 1, 79, '2023-12-30'),
(11, '39-895-7332', 'Orange Dallas', 'ac diam cras pellentesque volutpat dui maecenas', 13, 85, 509, 4, 23, '2023-08-17'),
(12, '05-324-6349', 'Telit t210', 'orci vehicula condimentum curabitur in', 52, 69, 916, 3, 11, '2023-06-11'),
(14, '43-373-2420', 'ZTE Axon 10 Pro', 'commodo vulputate justo in blandit ultrices', 89, 53, 783, 3, 18, '2024-01-08'),
(15, '36-427-8735', 'Prestigio MultiPad Note 8.0 3G', 'orci luctus et ultrices posuere cubilia curae donec pharetra', 63, 84, 599, 1, 32, '2024-01-05'),
(16, '98-223-9464', 'Philips Xenium 9@9q', 'quisque id justo sit amet sapien dignissim vestibulum vestibulum ante', 11, 20, 772, 7, 47, '2023-04-19'),
(17, '89-815-7723', 'Allview Soul X7 Pro', 'enim in tempor turpis nec euismod scelerisque', 4, 63, 931, 5, 35, '2023-05-28'),
(18, '12-939-8743', 'Plum Inspire', 'aliquam erat volutpat in congue', 90, 34, 560, 1, 31, '2023-07-31'),
(19, '18-108-2846', 'Huawei P30', 'neque vestibulum eget vulputate ut ultrices', 45, 11, 807, 1, 30, '2023-05-02'),
(20, '11-000-1556', 'Plum Trigger Z104', 'lobortis sapien sapien non mi integer ac neque duis bibendum', 54, 97, 822, 1, 43, '2024-03-03'),
(21, '76-735-0453', 'Motorola PEBL U6', 'amet nulla quisque arcu libero', 19, 12, 982, 1, 86, '2023-05-20'),
(22, '04-044-5214', 'Motorola One Fusion+', 'nunc commodo placerat praesent blandit', 48, 31, 989, 2, 6, '2023-10-11'),
(23, '03-955-5486', 'O2 Ice', 'sit amet eleifend pede libero quis orci nullam molestie', 39, 58, 511, 7, 80, '2023-08-16'),
(24, '42-568-4699', 'Lenovo LePhone S2', 'nisl nunc nisl duis bibendum felis sed', 55, 49, 534, 4, 32, '2023-11-11'),
(25, '66-294-1695', 'Asus Zenfone C ZC451CG', 'ullamcorper augue a suscipit nulla elit', 66, 85, 710, 2, 64, '2023-12-27'),
(26, '72-240-0253', 'Sagem my750x', 'mattis egestas metus aenean fermentum donec', 12, 45, 846, 1, 8, '2024-03-24'),
(27, '95-605-8959', 'Chea 208', 'suscipit nulla elit ac nulla sed vel enim sit amet', 0, 76, 809, 1, 4, '2023-08-13'),
(28, '34-213-5964', 'BLU Studio 5.0 C', 'porttitor lorem id ligula suspendisse ornare consequat lectus in est', 46, 68, 806, 5, 100, '2023-12-22'),
(29, '77-675-3316', 'Lava Iris 550Q', 'id luctus nec molestie sed justo pellentesque viverra pede', 60, 44, 715, 2, 29, '2024-01-04'),
(30, '98-894-9322', 'Bird S1190', 'nam ultrices libero non mattis pulvinar nulla pede', 33, 5, 551, 6, 11, '2023-09-07'),
(31, '74-901-0720', 'Archos 40b Titanium', 'eget tempus vel pede morbi porttitor', 0, 76, 639, 1, 24, '2023-06-30'),
(32, '07-662-1253', 'verykool s4007 Leo IV', 'tempus vivamus in felis eu sapien cursus', 82, 100, 678, 7, 57, '2024-03-21'),
(33, '12-068-9480', 'Motorola Timeport L7089', 'rutrum rutrum neque aenean auctor gravida', 98, 98, 533, 1, 19, '2023-09-11'),
(34, '11-855-1203', 'Oppo F17 Pro', 'aliquet ultrices erat tortor sollicitudin mi', 89, 40, 713, 6, 79, '2023-12-10'),
(35, '35-152-5875', 'Asus PadFone Infinity', 'duis bibendum felis sed interdum venenatis turpis enim blandit', 56, 58, 884, 7, 99, '2024-03-19'),
(36, '38-513-7162', 'Huawei Children\'s Watch 4X', 'eget massa tempor convallis nulla neque libero', 28, 3, 695, 6, 76, '2023-07-14'),
(37, '46-791-9332', 'Xiaomi Redmi Note 2', 'nisl ut volutpat sapien arcu sed augue aliquam', 89, 98, 718, 1, 99, '2023-08-05'),
(38, '57-043-9650', 'Spice M-5170', 'ligula suspendisse ornare consequat lectus in', 11, 57, 708, 4, 47, '2023-05-29'),
(39, '69-281-4767', 'alcatel A3', 'venenatis tristique fusce congue diam id ornare imperdiet', 55, 8, 868, 3, 46, '2024-01-12'),
(40, '34-581-8508', 'Kyocera Brio', 'ultrices posuere cubilia curae duis', 71, 79, 518, 2, 4, '2023-11-15'),
(41, '58-974-5598', 'HTC Sensation XL', 'potenti cras in purus eu magna vulputate', 43, 99, 784, 2, 11, '2024-02-25'),
(42, '81-142-5216', 'Samsung Galaxy A Quantum', 'odio elementum eu interdum eu tincidunt in leo maecenas', 97, 31, 846, 4, 99, '2023-12-12'),
(43, '09-288-8284', 'ZTE Axon 9 Pro', 'ut ultrices vel augue vestibulum ante ipsum', 28, 36, 811, 7, 82, '2023-10-11'),
(44, '28-398-1205', 'Pantech Burst', 'vehicula consequat morbi a ipsum integer a nibh in quis', 24, 3, 918, 7, 3, '2023-08-06'),
(45, '40-033-9522', 'Micromax Canvas Nitro 4G E455', 'faucibus cursus urna ut tellus nulla ut', 37, 42, 739, 3, 2, '2023-05-14'),
(46, '45-033-3518', 'VK Mobile VK4000', 'proin interdum mauris non ligula pellentesque ultrices', 57, 69, 649, 5, 46, '2023-08-03'),
(47, '69-783-2469', 'Samsung Galaxy A5 Duos', 'tincidunt eu felis fusce posuere felis sed', 34, 52, 637, 6, 81, '2023-12-24'),
(48, '54-699-1044', 'Sony Ericsson W880', 'amet sapien dignissim vestibulum vestibulum ante ipsum', 49, 9, 972, 6, 55, '2024-01-10'),
(49, '55-169-4760', 'Sony Ericsson Xperia PLAY CDMA', 'pede justo eu massa donec dapibus duis at velit eu', 93, 11, 803, 6, 25, '2023-05-06'),
(50, '09-905-5389', 'vivo V5s', 'viverra dapibus nulla suscipit ligula in lacus curabitur at', 99, 59, 915, 6, 54, '2023-11-12'),
(51, '82-037-6239', 'Lava Z61', 'gravida sem praesent id massa id nisl venenatis lacinia', 43, 17, 526, 1, 27, '2023-10-15'),
(52, '36-515-4257', 'NEC e636', 'sapien placerat ante nulla justo aliquam quis turpis eget elit', 93, 43, 811, 4, 12, '2023-07-05'),
(53, '95-178-9193', 'vivo Y17', 'sed magna at nunc commodo placerat praesent blandit', 15, 23, 703, 7, 41, '2023-09-23'),
(54, '50-058-4804', 'Sony Ericsson Z250', 'rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem', 65, 65, 843, 7, 30, '2024-03-19'),
(55, '94-818-4726', 'Huawei U8510 IDEOS X3', 'integer a nibh in quis justo maecenas rhoncus aliquam', 18, 25, 728, 4, 33, '2023-12-07'),
(56, '20-040-4657', 'Honor 30', 'a suscipit nulla elit ac nulla sed vel enim', 27, 74, 567, 1, 5, '2024-02-13'),
(57, '99-870-2749', 'BlackBerry Torch 9810', 'sed vel enim sit amet nunc', 45, 54, 567, 7, 25, '2023-08-13'),
(58, '37-090-3331', 'Samsung Galaxy Z Fold2 5G', 'nulla tellus in sagittis dui vel nisl', 39, 48, 945, 1, 55, '2023-04-27'),
(59, '80-480-7234', 'ZTE Blade II V880+', 'id ligula suspendisse ornare consequat lectus in est', 90, 18, 694, 1, 82, '2023-10-10'),
(60, '20-450-4613', 'Acer Liquid Z530', 'lacus morbi sem mauris laoreet ut rhoncus', 14, 71, 548, 6, 67, '2023-08-22'),
(61, '77-127-4909', 'Meizu 16Xs', 'convallis duis consequat dui nec nisi volutpat eleifend', 99, 82, 554, 4, 93, '2024-02-24'),
(62, '18-039-4785', 'Samsung M350 Seek', 'lacus purus aliquet at feugiat non pretium quis lectus suspendisse', 76, 50, 538, 7, 73, '2023-12-31'),
(63, '39-151-1195', 'alcatel OT-997D', 'in imperdiet et commodo vulputate justo in blandit ultrices enim', 94, 76, 503, 6, 33, '2023-10-17'),
(64, '53-627-1990', 'Micromax Canvas Fire 6 Q428', 'id ornare imperdiet sapien urna pretium nisl ut volutpat sapien', 90, 11, 804, 2, 90, '2023-09-10'),
(65, '88-000-9409', 'Asus ROG Phone ZS600KL', 'turpis integer aliquet massa id', 30, 57, 773, 6, 32, '2024-02-13'),
(66, '72-313-8452', 'Bird S798', 'in consequat ut nulla sed accumsan felis ut at dolor', 5, 7, 797, 2, 58, '2023-10-29'),
(67, '40-493-0537', 'Sonim XP3 Enduro', 'eu interdum eu tincidunt in leo maecenas pulvinar lobortis est', 3, 35, 729, 1, 50, '2024-03-05'),
(68, '20-079-2021', 'Icemobile Apollo Touch', 'semper rutrum nulla nunc purus phasellus in', 90, 87, 541, 2, 62, '2024-01-22'),
(69, '34-354-7917', 'Nokia N-Gage', 'posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices', 96, 29, 994, 5, 15, '2023-09-25'),
(70, '24-250-0275', 'Wiko WIM', 'ut odio cras mi pede malesuada in imperdiet et', 66, 62, 681, 2, 27, '2023-12-06'),
(71, '35-794-6836', 'NEC DB2000', 'quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit', 32, 18, 750, 4, 10, '2023-09-17'),
(72, '75-068-1371', 'Tecno Spark 6', 'dolor sit amet consectetuer adipiscing elit', 29, 28, 621, 1, 91, '2023-09-14'),
(73, '93-163-7408', 'vivo V9', 'pede ullamcorper augue a suscipit nulla elit', 10, 84, 509, 7, 34, '2023-11-11'),
(74, '88-873-9425', 'Sagem my231x', 'volutpat quam pede lobortis ligula sit amet eleifend pede libero', 13, 21, 897, 7, 47, '2023-08-25'),
(75, '15-498-7735', 'Karbonn A2', 'sit amet eleifend pede libero quis orci nullam molestie nibh', 79, 50, 766, 6, 86, '2024-02-25'),
(76, '53-615-0684', 'Samsung Galaxy S5 Plus', 'vehicula condimentum curabitur in libero', 31, 1, 717, 4, 62, '2024-01-28'),
(77, '90-555-1833', 'Motorola EX119', 'a libero nam dui proin', 100, 32, 604, 4, 6, '2023-04-16'),
(78, '45-796-6639', 'Philips X223', 'et ultrices posuere cubilia curae nulla dapibus', 45, 22, 871, 6, 33, '2023-12-18'),
(79, '68-315-2377', 'Amoi A102', 'molestie sed justo pellentesque viverra', 90, 70, 762, 3, 84, '2023-11-21'),
(80, '53-100-3160', 'Sony Xperia LT29i Hayabusa', 'ligula sit amet eleifend pede libero quis orci nullam', 85, 80, 882, 6, 41, '2023-04-30'),
(81, '63-249-5923', 'BlackBerry 7100t', 'pede libero quis orci nullam molestie nibh in lectus', 80, 99, 776, 4, 59, '2023-08-04'),
(82, '14-693-7646', 'Nokia 6630', 'viverra eget congue eget semper rutrum', 41, 65, 859, 5, 83, '2023-05-31'),
(83, '32-558-3552', 'Honor Pad 6', 'semper porta volutpat quam pede', 65, 90, 833, 6, 29, '2024-04-15'),
(84, '35-401-0146', 'Bird D720', 'curae nulla dapibus dolor vel est donec', 62, 13, 743, 5, 89, '2023-09-03'),
(85, '85-728-9112', 'O2 Cosmo', 'sapien non mi integer ac neque', 61, 11, 726, 5, 20, '2024-01-27'),
(86, '53-332-5046', 'ZTE F100', 'vulputate nonummy maecenas tincidunt lacus at velit vivamus vel', 64, 6, 570, 1, 43, '2024-02-20'),
(87, '79-511-9056', 'Benefon TWIG Discovery Pro', 'amet consectetuer adipiscing elit proin risus', 0, 8, 901, 1, 73, '2023-04-17'),
(88, '19-151-3356', 'Lenovo K5 play', 'lectus in quam fringilla rhoncus mauris enim leo rhoncus', 12, 17, 822, 7, 49, '2023-05-31'),
(89, '92-449-6262', 'Karbonn Titanium S1 Plus', 'platea dictumst aliquam augue quam sollicitudin', 13, 11, 992, 7, 2, '2023-05-28'),
(90, '08-574-5414', 'Gionee Pioneer P5L', 'vulputate elementum nullam varius nulla facilisi cras', 55, 8, 893, 1, 37, '2023-07-19'),
(91, '93-274-0161', 'Bird D736', 'sapien ut nunc vestibulum ante ipsum primis', 45, 31, 652, 4, 61, '2023-10-01'),
(92, '26-071-8135', 'Lenovo ZUK Edge', 'lobortis ligula sit amet eleifend pede libero', 96, 48, 934, 1, 61, '2023-09-15'),
(93, '97-559-0899', 'Micromax A70', 'lacinia aenean sit amet justo morbi ut', 86, 6, 705, 5, 38, '2024-02-22'),
(94, '49-379-3267', 'Toshiba Thrive', 'justo sollicitudin ut suscipit a feugiat', 15, 61, 988, 6, 59, '2023-12-20'),
(95, '11-262-1934', 'Energizer E280s', 'curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor', 0, 20, 851, 1, 26, '2023-12-27'),
(96, '94-690-8808', 'BLU Life One X2 Mini', 'nullam porttitor lacus at turpis', 63, 100, 606, 3, 34, '2023-11-05'),
(97, '12-641-6390', 'Tecno Phantom 9', 'elementum ligula vehicula consequat morbi a ipsum integer a nibh', 99, 46, 963, 5, 46, '2023-04-29'),
(98, '95-309-5661', 'Micromax Funbook 3G P600', 'aliquet ultrices erat tortor sollicitudin mi sit amet', 68, 6, 757, 2, 61, '2023-07-19'),
(99, '96-480-4709', 'Motorola MOTOSMART MIX XT550', 'nullam sit amet turpis elementum ligula vehicula consequat morbi a', 96, 61, 936, 7, 78, '2023-09-28'),
(100, '34-047-0511', 'Honor V30', 'sit amet lobortis sapien sapien non mi integer ac', 97, 5, 502, 1, 96, '2023-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company_name`, `location_id`, `contact_number`) VALUES
(2, 'Sauer, Wisozk and Romaguera', 92, '6101083165'),
(3, 'Langworth, Herman and Bailey', 71, '1295260845'),
(4, 'Effertz and Sons', 31, '8047862002'),
(5, 'Terry-Mann', 19, '6426622268'),
(6, 'Dickens and Sons', 74, '4808692287'),
(7, 'Lubowitz-Zulauf', 102, '8045824208'),
(8, 'Wilkinson, Skiles and Rohan', 98, '9942116615'),
(9, 'Emmerich, Gleason and Durgan', 38, '5639586499'),
(10, 'Kozey-Huel', 97, '2034199269'),
(11, 'Langworth, Upton and Turner', 88, '7735329191'),
(12, 'Cummings Group', 100, '5023371895'),
(13, 'Herman-Considine', 58, '4401399302'),
(14, 'Swaniawski-Cremin', 37, '8642835275'),
(15, 'Mohr-McDermott', 37, '1621515986'),
(16, 'Howell-Russel', 60, '4193531724'),
(17, 'Schumm Group', 104, '6568829535'),
(18, 'Dickens-Mitchell', 67, '7715936813'),
(19, 'Reichel-Spencer', 59, '7954932582'),
(20, 'Roob Group', 19, '4156761159'),
(21, 'Herman-Kiehn', 114, '7598169481'),
(22, 'Erdman and Sons', 96, '2711009251'),
(23, 'Dach-Williamson', 82, '2076394177'),
(24, 'Carter and Sons', 43, '6436651534'),
(25, 'Hauck, Jaskolski and Weissnat', 122, '9525651760'),
(26, 'Pfeffer and Sons', 124, '4198814412'),
(27, 'Green-Hahn', 59, '1724024831'),
(28, 'Spinka Inc', 128, '6102471775'),
(29, 'Stark, Cummings and Kshlerin', 17, '2938309994'),
(30, 'Mueller, Reinger and Kling', 70, '5644028610'),
(31, 'Olson Inc', 1, '2625879224'),
(32, 'Shanahan, Swaniawski and Conn', 74, '8034667573'),
(33, 'Shields and Sons', 64, '3999969519'),
(34, 'Koelpin, White and Kulas', 71, '1729659657'),
(35, 'Friesen, Mueller and Ondricka', 95, '4833949890'),
(36, 'Paucek-Thiel', 124, '4856210134'),
(37, 'Goldner-Kemmer', 36, '4449101367'),
(38, 'Sanford, Kiehn and Fritsch', 10, '9817430609'),
(39, 'Lesch, Kreiger and Bartoletti', 116, '3159839466'),
(40, 'Crooks-Kreiger', 74, '9496436967'),
(41, 'Leuschke-Fahey', 36, '5882263747'),
(42, 'Bashirian, Stamm and Olson', 8, '9188733946'),
(43, 'Marks LLC', 52, '6605106564'),
(44, 'Rempel-Bins', 8, '8493995982'),
(45, 'Mueller-Greenfelder', 45, '4724527276'),
(46, 'Towne-Lubowitz', 129, '7445574609'),
(47, 'Crona, Kuvalis and Hayes', 61, '6839313120'),
(48, 'Swift, Lockman and Stoltenberg', 80, '9668148730'),
(49, 'Bruen-Becker', 33, '5972384276'),
(50, 'Von, Morar and Sawayn', 64, '2412129977'),
(51, 'Cronin Inc', 27, '5288179000'),
(52, 'Sporer and Sons', 60, '9783691225'),
(53, 'Friesen Inc', 18, '7751555333'),
(54, 'Paucek, Jast and Goldner', 109, '3005095584'),
(55, 'Wuckert, Schumm and Armstrong', 41, '2648772966'),
(56, 'Green Group', 4, '9907008704'),
(57, 'Grady-Terry', 3, '6836726510'),
(58, 'Denesik, Larson and Kovacek', 95, '3409257228'),
(59, 'Harris-Metz', 41, '2225833931'),
(60, 'Skiles, Bode and Bechtelar', 88, '2013046963'),
(61, 'Jaskolski and Sons', 51, '1961188941'),
(62, 'Hand, Jacobson and Witting', 61, '6482182369'),
(63, 'Lubowitz-Will', 36, '2924634300'),
(64, 'Denesik-Torp', 44, '5225548982'),
(65, 'Nicolas-Corkery', 100, '8723921052'),
(66, 'Okuneva-Considine', 84, '6086380413'),
(67, 'Torp-Mante', 97, '2353760040'),
(68, 'Murazik Group', 76, '5079223206'),
(69, 'Strosin and Sons', 12, '7126850259'),
(70, 'Ankunding, Reynolds and Graham', 113, '9627439743'),
(71, 'Mosciski Group', 67, '8865649468'),
(72, 'Gleason Inc', 95, '9906280803'),
(73, 'Murray LLC', 51, '1036567937'),
(74, 'Davis and Sons', 35, '2266772816'),
(75, 'Breitenberg-Krajcik', 39, '1623688142'),
(76, 'Gibson, Kautzer and Stanton', 92, '9475184502'),
(77, 'Watsica, Turcotte and Wyman', 54, '2304671768'),
(78, 'Bednar, Yundt and Monahan', 42, '3112578993'),
(79, 'Pollich and Sons', 73, '1703737014'),
(80, 'Cole and Sons', 87, '4766476502'),
(81, 'Hirthe and Sons', 103, '1499950838'),
(82, 'Beahan Group', 112, '3363357861'),
(83, 'Bogisich Inc', 79, '1204018680'),
(84, 'Johnson-Bednar', 38, '4265187701'),
(85, 'Effertz, Hansen and Mann', 24, '7748462254'),
(86, 'Smitham-Hammes', 67, '5876530841'),
(87, 'Lynch, Dickinson and Morissette', 43, '8145772506'),
(88, 'Gorczany and Sons', 115, '5785331946'),
(89, 'Smitham, Kshlerin and Schoen', 72, '8965762150'),
(90, 'Skiles, Kub and Homenick', 78, '5935312523'),
(91, 'Cronin-Rutherford', 115, '4767069168'),
(92, 'Franecki, Zulauf and Watsica', 84, '8228976594'),
(93, 'Mohr, Anderson and Schmeler', 56, '4664154758'),
(94, 'Cassin-Okuneva', 40, '1005432825'),
(95, 'O\'Kon, Jacobson and Wuckert', 85, '1717243705'),
(97, 'Keeling, Hudson and Hansen', 1, '7419818884'),
(98, 'Kuhlman Group', 21, '1782517253'),
(99, 'Pfeffer, Reynolds and Hodkiewicz', 76, '5638903217'),
(100, 'Hickle and Sons', 68, '9558073081'),
(102, 'Riko Woc Coin', NULL, '8052370510'),
(103, 'Test Company', NULL, '01481722660'),
(104, 'Bi Sat Coin', NULL, '8052370510');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `employee_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'johnmamanao@gmail.com', NULL, '$2y$12$Or84uoEwvA96LZ4mH42Qeu7TsiU9jBh0lyW8Jx.MH0RL/mpwjuQHe', NULL, NULL, '2024-04-17 01:56:50'),
(203, '2', 40, 'test2@gmail.com', NULL, '$2y$12$K0m4iESo68fo4dVk/2H7a.Wm.yHxFtD3dVcPabG/rRmqt8Qj3a24y', NULL, '2024-04-16 19:19:13', '2024-04-16 22:28:28'),
(220, '2', 6, 'test@gmail.com', NULL, '$2y$12$9OY7BP6JEixr.7pRTa4U8etqozvCGaXX1Pe8I.1XFRxd7jCq/1MSu', NULL, '2024-04-16 22:15:38', '2024-04-16 22:15:38'),
(222, '2', 3, 'test3@gmail.com', NULL, '$2y$12$FrCNmHBk5u/4ipgvLmDHFuAyUZopQZvix50oP2fhJ182WGK9XHFFm', NULL, '2024-04-17 18:12:14', '2024-04-17 18:12:14'),
(223, '3', 45, 'user@gmail.com', NULL, '$2y$12$amyGSt5nqXpb4bqBHNCkJ.4Vbc5VdQqcZPx7J0Mj4qfeeZnaWh.mC', NULL, '2024-04-17 18:32:50', '2024-04-17 20:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2024-04-15 23:50:47', '2024-04-15 23:50:47'),
(2, 'Manager', '2024-04-15 23:51:14', '2024-04-15 23:51:14'),
(3, 'User', '2024-04-15 23:51:32', '2024-04-15 23:51:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
