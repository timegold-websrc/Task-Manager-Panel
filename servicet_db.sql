-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2020 at 05:54 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servicet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2020_02_14_045500_create_tasks_table', 1),
(11, '2020_02_14_192037_create_user_task_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$9hptSn.RCsCcNzGW8YZWaeID0cuTVrOZyLnhSEdgW1kzE0Fllsu.2', '2020-02-20 07:38:32'),
('Jmm2965943@outlook.com', '$2y$10$VDE6L/qBiuaIlchf9gaHNOD8Zbfu07gvmYR/YPl3MqcVCXeBbafny', '2020-02-20 09:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `head` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_due` date DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `priority` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `head`, `description`, `status`, `date_due`, `site_id`, `priority`) VALUES
(1, 'Interview Skill Development', 'Setup interview practice, must create list of 5 questions to ask.', 0, '2019-12-27', 1, 'high'),
(6, 'On Boarding', 'Create a written process for the first day.', 1, '2019-12-17', 1, 'medium'),
(7, 'FireBox', 'Order Firebox for flammable items', 1, '2019-11-29', 15, 'medium'),
(8, 'Core Responsibility', 'Complete online on boarding training. Make a day 1 plan for all new staff.', 0, '2019-12-16', 1, NULL),
(9, 'Test Task 1', 'this is test task 1', 0, '2019-12-04', 15, NULL),
(10, 'Test Task 2', 'this is also test task 2', 1, '2019-12-06', 15, NULL),
(11, 'Test Task 3', 'this is also test task 3', 2, '2019-12-19', 15, NULL),
(12, 'Test Task 5', 'this is test task', 1, '2019-12-31', 17, NULL),
(13, 'test task 4', 'this is test task', 0, '2020-01-08', 17, NULL),
(14, 'test task 7', 'this is test task', 2, '2019-12-03', 17, NULL),
(15, 'test task 8', 'this is test task', 0, '2020-01-15', 17, NULL),
(16, 'test task 9', 'this is test task', 1, '2019-12-08', 17, NULL),
(17, 'test task 10', 'this is test task', 2, '2019-11-28', 17, NULL),
(19, 'sdfsd', 'sdfsf', 0, '2020-02-18', 1, NULL),
(20, 'fghfgh', 'rtrt', 0, '2020-02-26', 1, NULL),
(21, 'hjhjkh', 'jkhjk', 0, '2020-02-19', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(111) NOT NULL,
  `category` varchar(111) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`) VALUES
(1, 'Core Responsibility'),
(2, 'Daily Operations'),
(3, 'Inventory'),
(4, 'Make Ready'),
(5, 'Manager Skills');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(250) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(250) NOT NULL,
  `PostalCode` varchar(30) NOT NULL,
  `Country` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_evaluations`
--

CREATE TABLE `tbl_evaluations` (
  `id` int(111) NOT NULL,
  `question_id` int(111) DEFAULT NULL,
  `score_P` int(2) DEFAULT NULL,
  `score_M` int(2) DEFAULT NULL,
  `score_F` int(2) DEFAULT NULL,
  `cat_id` int(111) DEFAULT NULL,
  `note` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_id` int(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_evaluations`
--

INSERT INTO `tbl_evaluations` (`id`, `question_id`, `score_P`, `score_M`, `score_F`, `cat_id`, `note`, `site_id`) VALUES
(745, 1, 3, 0, 0, 1, NULL, 0),
(746, 2, 5, 0, 0, 1, NULL, 0),
(747, 3, 0, 0, 0, 1, NULL, 0),
(748, 4, 0, 0, 0, 1, NULL, 0),
(749, 5, 0, 0, 0, 1, NULL, 0),
(750, 6, 0, 0, 0, 1, NULL, 0),
(751, 7, 0, 0, 0, 1, NULL, 0),
(752, 8, 0, 0, 0, 1, NULL, 0),
(753, 9, 0, 0, 0, 1, NULL, 0),
(754, 10, 0, 0, 0, 1, NULL, 0),
(755, 11, 0, 0, 0, 1, NULL, 0),
(756, 12, 0, 0, 0, 1, NULL, 0),
(757, 13, 0, 0, 0, 1, NULL, 0),
(758, 14, 0, 0, 0, 1, NULL, 0),
(759, 15, 0, 0, 0, 1, NULL, 0),
(760, 16, 0, 0, 0, 1, NULL, 0),
(761, 17, 0, 0, 0, 2, NULL, 0),
(762, 18, 0, 0, 0, 2, NULL, 0),
(763, 19, 0, 0, 0, 2, NULL, 0),
(764, 20, 0, 0, 0, 2, NULL, 0),
(765, 21, 0, 0, 0, 2, NULL, 0),
(766, 22, 0, 0, 0, 2, NULL, 0),
(767, 23, 0, 0, 0, 2, NULL, 0),
(768, 24, 0, 0, 0, 2, NULL, 0),
(769, 25, 0, 0, 0, 2, NULL, 0),
(770, 26, 0, 0, 0, 2, NULL, 0),
(771, 27, 0, 0, 0, 2, NULL, 0),
(772, 28, 0, 0, 0, 2, NULL, 0),
(773, 29, 0, 0, 0, 2, NULL, 0),
(774, 30, 0, 0, 0, 2, NULL, 0),
(775, 31, 0, 0, 0, 2, NULL, 0),
(776, 32, 0, 0, 0, 2, NULL, 0),
(777, 33, 0, 0, 0, 2, NULL, 0),
(778, 34, 0, 0, 0, 2, NULL, 0),
(779, 35, 0, 0, 0, 2, NULL, 0),
(780, 36, 0, 0, 0, 3, NULL, 0),
(781, 37, 0, 0, 0, 3, NULL, 0),
(782, 38, 0, 0, 0, 3, NULL, 0),
(783, 39, 0, 0, 0, 3, NULL, 0),
(784, 40, 0, 0, 0, 3, NULL, 0),
(785, 41, 0, 0, 0, 3, NULL, 0),
(786, 42, 0, 0, 0, 3, NULL, 0),
(787, 43, 0, 0, 0, 3, NULL, 0),
(788, 44, 0, 0, 0, 3, NULL, 0),
(789, 45, 0, 0, 0, 4, NULL, 0),
(790, 46, 0, 0, 0, 4, NULL, 0),
(791, 47, 0, 0, 0, 4, NULL, 0),
(792, 48, 0, 0, 0, 4, NULL, 0),
(793, 49, 0, 0, 0, 4, NULL, 0),
(794, 50, 0, 0, 0, 4, NULL, 0),
(795, 51, 0, 0, 0, 4, NULL, 0),
(796, 52, 0, 0, 0, 4, NULL, 0),
(797, 53, 0, 0, 0, 4, NULL, 0),
(798, 54, 0, 0, 0, 5, NULL, 0),
(799, 55, 0, 0, 0, 5, NULL, 0),
(800, 56, 0, 0, 0, 5, NULL, 0),
(801, 57, 0, 0, 0, 5, NULL, 0),
(802, 58, 0, 0, 0, 5, NULL, 0),
(803, 59, 0, 0, 0, 5, NULL, 0),
(804, 60, 0, 0, 0, 5, NULL, 0),
(805, 61, 0, 0, 0, 5, NULL, 0),
(806, 62, 0, 0, 0, 5, NULL, 0),
(5024, 1, 0, 0, 0, 1, NULL, 15),
(5025, 2, 0, 0, 0, 1, NULL, 15),
(5026, 3, 0, 0, 0, 1, NULL, 15),
(5027, 4, 0, 0, 0, 1, NULL, 15),
(5028, 5, 0, 0, 0, 1, NULL, 15),
(5029, 6, 0, 0, 0, 1, NULL, 15),
(5030, 7, 0, 0, 0, 1, NULL, 15),
(5031, 8, 0, 0, 0, 1, NULL, 15),
(5032, 9, 0, 0, 0, 1, NULL, 15),
(5033, 10, 0, 0, 0, 1, NULL, 15),
(5034, 11, 0, 0, 0, 1, NULL, 15),
(5035, 12, 0, 0, 0, 1, NULL, 15),
(5036, 13, 0, 0, 0, 1, NULL, 15),
(5037, 14, 0, 0, 0, 1, NULL, 15),
(5038, 15, 0, 0, 0, 1, NULL, 15),
(5039, 16, 0, 0, 0, 1, NULL, 15),
(5040, 17, 0, 0, 0, 2, NULL, 15),
(5041, 18, 0, 0, 0, 2, NULL, 15),
(5042, 19, 0, 0, 0, 2, NULL, 15),
(5043, 20, 0, 0, 0, 2, NULL, 15),
(5044, 21, 0, 0, 0, 2, NULL, 15),
(5045, 22, 0, 0, 0, 2, NULL, 15),
(5046, 23, 0, 0, 0, 2, NULL, 15),
(5047, 24, 0, 0, 0, 2, NULL, 15),
(5048, 25, 0, 0, 0, 2, NULL, 15),
(5049, 26, 0, 0, 0, 2, NULL, 15),
(5050, 27, 0, 0, 0, 2, NULL, 15),
(5051, 28, 0, 0, 0, 2, NULL, 15),
(5052, 29, 0, 0, 0, 2, NULL, 15),
(5053, 30, 0, 0, 0, 2, NULL, 15),
(5054, 31, 0, 0, 0, 2, NULL, 15),
(5055, 32, 0, 0, 0, 2, NULL, 15),
(5056, 33, 0, 0, 0, 2, NULL, 15),
(5057, 34, 0, 0, 0, 2, NULL, 15),
(5058, 35, 0, 0, 0, 2, NULL, 15),
(5059, 36, 0, 0, 0, 3, NULL, 15),
(5060, 37, 0, 0, 0, 3, NULL, 15),
(5061, 38, 0, 0, 0, 3, NULL, 15),
(5062, 39, 0, 0, 0, 3, NULL, 15),
(5063, 40, 0, 0, 0, 3, NULL, 15),
(5064, 41, 0, 0, 0, 3, NULL, 15),
(5065, 42, 0, 0, 0, 3, NULL, 15),
(5066, 43, 0, 0, 0, 3, NULL, 15),
(5067, 44, 0, 0, 0, 3, NULL, 15),
(5068, 45, 0, 0, 0, 4, NULL, 15),
(5069, 46, 0, 0, 0, 4, NULL, 15),
(5070, 47, 0, 0, 0, 4, NULL, 15),
(5071, 48, 0, 0, 0, 4, NULL, 15),
(5072, 49, 0, 0, 0, 4, NULL, 15),
(5073, 50, 0, 0, 0, 4, NULL, 15),
(5074, 51, 0, 0, 0, 4, NULL, 15),
(5075, 52, 0, 0, 0, 4, NULL, 15),
(5076, 53, 0, 0, 0, 4, NULL, 15),
(5077, 54, 0, 0, 0, 5, NULL, 15),
(5078, 55, 0, 0, 0, 5, NULL, 15),
(5079, 56, 0, 0, 0, 5, NULL, 15),
(5080, 57, 0, 0, 0, 5, NULL, 15),
(5081, 58, 0, 0, 0, 5, NULL, 15),
(5082, 59, 0, 0, 0, 5, NULL, 15),
(5083, 60, 0, 0, 0, 5, NULL, 15),
(5084, 61, 0, 0, 0, 5, NULL, 15),
(5085, 62, 0, 0, 0, 5, NULL, 15),
(8000, 1, 1, 2, 3, 1, 'Bradley doesn\'t have any manager experience. This is his first time holding this position and is trying to find his leadership style. He can be abrasive and come across as mean. His team gets frustrated with the lack of instruction and demonstration.\r\n12/8/19 After 2 training sessions he has shown he can lead his team and they are getting a work pattern.', 1),
(8001, 2, 1, 2, 3, 1, 'Doesn\'t have experience giving interviews.', 1),
(8002, 3, 1, 3, 3, 1, 'Doesn\'t have experience on boarding new employees.', 1),
(8003, 4, 1, 2, 4, 1, 'CM is concerned he is overwhelmed. Is not having regular meetings with CM. 12/5/19', 1),
(8004, 5, 3, 4, 4, 1, 'Using RoseLife and MRI without incident.', 1),
(8005, 6, 2, 2, 3, 1, NULL, 1),
(8006, 7, 4, 4, 4, 1, 'Has a great relationship with residents. Personality makes the difference when the level of service is low.', 1),
(8007, 8, 2, 3, 4, 1, 'Needs training in mechanics and BMS systems. 12/1/19    \r\nCompleted Automated Logics training and can operate system. 12/5/19', 1),
(8008, 9, 2, 4, 4, 1, 'Property style is very reactionary and this leaves little time to plan.  12/6/19', 1),
(8009, 10, 1, 3, 4, 1, 'Takes the resident is wrong, doing it, causing the issue, approach. Doesn\'t see the big picture yet of value of service will train.', 1),
(8010, 11, 4, 4, 4, 1, 'This is one of Bradly\'s strongest areas he is very motivated to succeed.', 1),
(8011, 12, 4, 4, 4, 1, 'Is very friendly and motivated, friendly.', 1),
(8012, 13, 2, 3, 4, 1, 'Doesn\'t yet get the big picture but training is set for this month 12/9/19', 1),
(8013, 14, 2, 3, 4, 1, 'Still establishing himself. Hasn\'t portrayed a real work ethic yet but getting started.', 1),
(8014, 15, 1, 2, 4, 1, 'Gave the task to create a workflow process. 12/9/19 \r\nIs implementing the changes and understands process. 12/11/19', 1),
(8015, 16, 2, 3, 3, 1, 'Has been writing these out so he can organize who is responsible for what.', 1),
(8016, 17, 2, 2, 4, 2, NULL, 1),
(8017, 18, 2, 1, 3, 2, NULL, 1),
(8018, 19, 2, 2, 4, 2, NULL, 1),
(8019, 20, 2, 1, 4, 2, NULL, 1),
(8020, 21, 3, 1, 4, 2, NULL, 1),
(8021, 22, 5, 2, 3, 2, NULL, 1),
(8022, 23, 5, 1, 4, 2, NULL, 1),
(8023, 24, 5, 1, 4, 2, NULL, 1),
(8024, 25, 2, 1, 4, 2, NULL, 1),
(8025, 26, 2, 1, 4, 2, NULL, 1),
(8026, 27, 2, 1, 4, 2, NULL, 1),
(8027, 28, 5, 5, 4, 2, NULL, 1),
(8028, 29, 5, 4, 4, 2, NULL, 1),
(8029, 30, 3, 5, 3, 2, NULL, 1),
(8030, 31, 5, 3, 4, 2, NULL, 1),
(8031, 32, 3, 4, 4, 2, NULL, 1),
(8032, 33, 4, 3, 4, 2, NULL, 1),
(8033, 34, 4, 5, 4, 2, NULL, 1),
(8034, 35, 2, 4, 4, 2, NULL, 1),
(8035, 36, 4, 3, 4, 3, NULL, 1),
(8036, 37, 3, 3, 5, 3, NULL, 1),
(8037, 38, 4, 3, 4, 3, NULL, 1),
(8038, 39, 1, 3, 4, 3, NULL, 1),
(8039, 40, 1, 4, 4, 3, NULL, 1),
(8040, 41, 2, 2, 4, 3, NULL, 1),
(8041, 42, 3, 3, 4, 3, NULL, 1),
(8042, 43, 1, 3, 4, 3, NULL, 1),
(8043, 44, 2, 3, 4, 3, NULL, 1),
(8044, 45, 2, 3, 4, 4, NULL, 1),
(8045, 46, 1, 4, 4, 4, NULL, 1),
(8046, 47, 2, 3, 4, 4, NULL, 1),
(8047, 48, 1, 3, 4, 4, NULL, 1),
(8048, 49, 1, 2, 3, 4, NULL, 1),
(8049, 50, 1, 3, 4, 4, NULL, 1),
(8050, 51, 1, 3, 4, 4, NULL, 1),
(8051, 52, 1, 2, 3, 4, NULL, 1),
(8052, 53, 2, 3, 4, 4, NULL, 1),
(8053, 54, 4, 3, 4, 5, NULL, 1),
(8054, 55, 1, 4, 4, 5, NULL, 1),
(8055, 56, 2, 3, 4, 5, NULL, 1),
(8056, 57, 2, 3, 4, 5, NULL, 1),
(8057, 58, 2, 3, 4, 5, NULL, 1),
(8058, 59, 4, 2, 3, 5, NULL, 1),
(8059, 60, 5, 3, 5, 5, NULL, 1),
(8060, 61, 2, 4, 4, 5, NULL, 1),
(8061, 62, 3, 2, 5, 5, NULL, 1),
(8124, 1, 4, 0, 0, 1, 'Will need more time to observe this.', 17),
(8125, 2, 4, 0, 0, 1, 'Needs training and experience.', 17),
(8126, 3, 4, 0, 0, 1, 'Doesn\'t have a plan such a a cleaning plan.', 17),
(8127, 4, 4, 0, 0, 1, 'Needs to develop a better style of communication with CM', 17),
(8128, 5, 4, 0, 0, 1, NULL, 17),
(8129, 6, 4, 0, 0, 1, 'Doorman were open about not getting communication. Will follow up.', 17),
(8130, 7, 4, 0, 0, 1, 'Residents have had nothing but positive things to say about the RM', 17),
(8131, 8, 4, 0, 0, 1, NULL, 17),
(8132, 9, 4, 0, 0, 1, NULL, 17),
(8133, 10, 4, 0, 0, 1, NULL, 17),
(8134, 11, 4, 0, 0, 1, NULL, 17),
(8135, 12, 4, 0, 0, 1, NULL, 17),
(8136, 13, 4, 0, 0, 1, NULL, 17),
(8137, 14, 4, 0, 0, 1, NULL, 17),
(8138, 15, 4, 0, 0, 1, NULL, 17),
(8139, 16, 5, 0, 0, 1, NULL, 17),
(8140, 17, 4, 0, 0, 2, NULL, 17),
(8141, 18, 4, 0, 0, 2, NULL, 17),
(8142, 19, 4, 0, 0, 2, NULL, 17),
(8143, 20, 4, 0, 0, 2, NULL, 17),
(8144, 21, 4, 0, 0, 2, NULL, 17),
(8145, 22, 5, 0, 0, 2, NULL, 17),
(8146, 23, 4, 0, 0, 2, NULL, 17),
(8147, 24, 4, 0, 0, 2, NULL, 17),
(8148, 25, 4, 0, 0, 2, NULL, 17),
(8149, 26, 4, 0, 0, 2, NULL, 17),
(8150, 27, 4, 0, 0, 2, NULL, 17),
(8151, 28, 4, 0, 0, 2, NULL, 17),
(8152, 29, 4, 0, 0, 2, NULL, 17),
(8153, 30, 4, 0, 0, 2, NULL, 17),
(8154, 31, 4, 0, 0, 2, NULL, 17),
(8155, 32, 4, 0, 0, 2, NULL, 17),
(8156, 33, 4, 0, 0, 2, NULL, 17),
(8157, 34, 4, 0, 0, 2, NULL, 17),
(8158, 35, 4, 0, 0, 2, NULL, 17),
(8159, 36, 5, 0, 0, 3, NULL, 17),
(8160, 37, 4, 0, 0, 3, NULL, 17),
(8161, 38, 4, 0, 0, 3, NULL, 17),
(8162, 39, 4, 0, 0, 3, NULL, 17),
(8163, 40, 4, 0, 0, 3, NULL, 17),
(8164, 41, 4, 0, 0, 3, NULL, 17),
(8165, 42, 4, 0, 0, 3, NULL, 17),
(8166, 43, 4, 0, 0, 3, NULL, 17),
(8167, 44, 4, 0, 0, 3, NULL, 17),
(8168, 45, 4, 0, 0, 4, NULL, 17),
(8169, 46, 4, 0, 0, 4, NULL, 17),
(8170, 47, 4, 0, 0, 4, NULL, 17),
(8171, 48, 4, 0, 0, 4, NULL, 17),
(8172, 49, 4, 0, 0, 4, NULL, 17),
(8173, 50, 4, 0, 0, 4, NULL, 17),
(8174, 51, 4, 0, 0, 4, NULL, 17),
(8175, 52, 4, 0, 0, 4, NULL, 17),
(8176, 53, 4, 0, 0, 4, NULL, 17),
(8177, 54, 4, 0, 0, 5, NULL, 17),
(8178, 55, 5, 0, 0, 5, NULL, 17),
(8179, 56, 4, 0, 0, 5, NULL, 17),
(8180, 57, 4, 0, 0, 5, NULL, 17),
(8181, 58, 4, 0, 0, 5, NULL, 17),
(8182, 59, 4, 0, 0, 5, NULL, 17),
(8183, 60, 4, 0, 0, 5, NULL, 17),
(8184, 61, 4, 0, 0, 5, NULL, 17),
(8185, 62, 4, 0, 0, 5, NULL, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE `tbl_questions` (
  `id` int(111) NOT NULL,
  `question` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_id` int(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`id`, `question`, `cat_id`) VALUES
(1, 'Provides leadership to the service team.', 1),
(2, 'Conducts interviews with plan to hire the best candidate.', 1),
(3, 'Knows how to onboard with orientation and training.', 1),
(4, 'Good communication skills, providing feedback to the Community Director.', 1),
(5, 'Is tech savvy, not intimidated by technology. ', 1),
(6, 'Communicates well with staff, providing feedback on performance. ', 1),
(7, 'Has a good repor with the residents?  Verified by 5 or more tenants.', 1),
(8, 'Is knowledgeable about the property.', 1),
(9, 'Anticipates issues and set priorities to get problems solved.', 1),
(10, 'Responds positive to concerns of tenants and staff. Uses issues to better processes.', 1),
(11, 'Is motivated.', 1),
(12, 'Is friendly & professional.', 1),
(13, 'Respects and understands what is important to CM and RM.', 1),
(14, 'Is respected and understood by the CM and RM.', 1),
(15, 'Uses processes to complete tickets efficiently. ', 1),
(16, 'Clearly defines the job duties of staff.', 1),
(17, 'Has an efficient process for tracking market ready units. ', 2),
(18, 'Inspects and walks units for quality assurance.', 2),
(19, 'Has a process for repairing or replacing appliances?', 2),
(20, 'Is able to budget and manage the financial resources necessary to accommodate current and future maintenance and repair projects? ', 2),
(21, 'Manage and schedule the service support, necessary to maintain the overall appearance of the community.', 2),
(22, 'Has a preventative maintenance plan. ', 2),
(23, 'Promotes a safe work environment.', 2),
(24, 'Continuity between leasing office and maintenance.', 2),
(25, 'Office organized. ', 2),
(26, 'Safety is made a priority? MSDS, First Aid, Manuals', 2),
(27, 'Is punctual and keeps scheduled appointments', 2),
(28, 'Staff uniforms clean, undamaged?', 2),
(29, 'Maintains mobile equipment, such as golf carts, tool carts.', 2),
(30, 'Does the staff have safe, functioning, organized tools? ', 2),
(31, 'Meets with staff regularly.', 2),
(32, 'Is the property clean.', 2),
(33, 'Is the property trash process managed? ', 2),
(34, 'Is there processes in place to deal with issues?  Water intrusion, mold etc.?', 2),
(35, 'Has protective supplies to protect residents home during work including shoe covers.', 2),
(36, 'Has a location for appliances.', 3),
(37, 'Has essential tools needed such as multi meter, gas leak detector? ', 3),
(38, 'Is the inventory located in one location? ', 3),
(39, 'Is the inventory neat and organized?', 3),
(40, 'Are items in stock?', 3),
(41, 'Does the team know where to find items?', 3),
(42, 'Does inventory stock reflect service tickets?', 3),
(43, 'Is there a process for keeping items in stock?', 3),
(44, 'Is there an inventory reorder process? ', 3),
(45, 'How would you rate the apartment entrance?', 4),
(46, 'How does the unit smell?', 4),
(47, 'Do you feel like this is somewhere you would like to live? ', 4),
(48, 'Is the unit clean? ', 4),
(49, 'Does everything work?', 4),
(50, 'Is it freshly painted? ', 4),
(51, 'Flooring refreshed?', 4),
(52, 'Are there any special touches that make you feel like it was prepared for you? ', 4),
(53, 'Are the mechanics serviced and maintained? Water Heater, HVAC, smoke alarms, filters, flappers, shower heads?', 4),
(54, 'Shows by example the work that needs to be completed.', 5),
(55, 'Resolves residents issues and leaves no doubt issues are resolved.', 5),
(56, 'Is there any fun time together as staff such as lunches, parties? ', 5),
(57, 'How would you rate the SM electrical knowledge? ', 5),
(58, 'How would you rate the SM plumbing knowledge? ', 5),
(59, 'How would you rate the SM carpentry knowledge?', 5),
(60, 'How would you rate the SM HVAC knowledge?', 5),
(61, 'Seeks knowledge and certification.', 5),
(62, 'Open to training and instruction?', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scores`
--

CREATE TABLE `tbl_scores` (
  `id` int(111) NOT NULL,
  `val_p` int(2) DEFAULT NULL,
  `val_m` int(2) DEFAULT NULL,
  `val_f` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siteproperties`
--

CREATE TABLE `tbl_siteproperties` (
  `id` int(111) NOT NULL,
  `site_name` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_location` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lng` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_manager` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `property_build_date` date DEFAULT NULL,
  `date_added_STF` date DEFAULT NULL,
  `num_service_staff` int(111) DEFAULT NULL,
  `num_built` int(111) DEFAULT NULL,
  `num_units` int(111) DEFAULT NULL,
  `pic_property` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticket_last30` int(111) DEFAULT NULL,
  `avgticket_closetime_last30` int(111) DEFAULT NULL,
  `callback_percentage` int(111) DEFAULT NULL,
  `ready_percentage` int(111) DEFAULT NULL,
  `servicemng_id` int(111) DEFAULT NULL,
  `communitymng_id` int(111) DEFAULT NULL,
  `reginalmng_id` int(111) DEFAULT NULL,
  `primary_eval_date` date DEFAULT NULL,
  `milestone_eval_date` date DEFAULT NULL,
  `final_eval_date` date DEFAULT NULL,
  `primary_eval_by` varchar(111) COLLATE utf8_unicode_ci DEFAULT NULL,
  `milestone_eval_by` varchar(111) COLLATE utf8_unicode_ci DEFAULT NULL,
  `final_eval_by` varchar(111) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eval_scoreP` int(111) DEFAULT NULL,
  `eval_scoreM` int(111) DEFAULT NULL,
  `eval_scoreF` int(111) DEFAULT NULL,
  `gallery_before` text COLLATE utf8_unicode_ci,
  `gallery_after` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_siteproperties`
--

INSERT INTO `tbl_siteproperties` (`id`, `site_name`, `site_location`, `lat`, `lng`, `site_manager`, `property_build_date`, `date_added_STF`, `num_service_staff`, `num_built`, `num_units`, `pic_property`, `ticket_last30`, `avgticket_closetime_last30`, `callback_percentage`, `ready_percentage`, `servicemng_id`, `communitymng_id`, `reginalmng_id`, `primary_eval_date`, `milestone_eval_date`, `final_eval_date`, `primary_eval_by`, `milestone_eval_by`, `final_eval_by`, `eval_scoreP`, `eval_scoreM`, `eval_scoreF`, `gallery_before`, `gallery_after`) VALUES
(1, 'Ridgeleigh@ Van Dorn Metro', '5901 Coverdale way, Alexandria VA 22310', '38.792582', '-77.1383649', 'Test Manger', '1986-01-01', '2019-10-01', 4, 2006, 252, 'images/yGrU46gs0TBfdFnnvzyEHyBJWvZPtbwjdUpCrfRO.jpeg', 346, 8, 3, 84, 14, 15, 16, '2019-10-01', '2019-11-01', '2019-11-25', 'Jonathan Jackson', 'Jonathan Jackson', 'Jonathan Jackson', 0, 1, 2, ',,,,,,blogs/before/nQtuzTt4ZcUSebKyCas4epfi8EuPazgYuuu30l8L.jpeg,blogs/before/8o9R2Ma9lZPX1vBQGvkgrkEeYmLf7fRH2Bs4n53F.jpeg,blogs/before/pGNfHo8naYJyi2zCUjSMX5vv7PyyF1DzSyF5Dzo8.jpeg,blogs/before/ZT98vMqA1y1sXjysBml8ZHmZo27ds4ETDNhq4phu.jpeg,blogs/before/OeaxirDslgwBwvwsexjh0VwEL47JA3wj6EMGcb6v.jpeg,blogs/before/gri3ouHtnu9OAhl2ErMXWEXBBoN6jxKhF7fHgWu0.jpeg,blogs/before/ShNXCO0RkrUriwLwlcfpWat1Bc50aLJ20m7RQIOj.jpeg,blogs/before/t7zvORpFahzaFdhXRb6Qequ3Mm0uOWBV846avZ6x.jpeg,blogs/before/jZZdKeC617ZQSlphEyOKncmWKbHsdO5T48JAsH6Z.jpeg', 'blogs/after/bFsY5Hg6PJAV8cOstOPm2L8thw6KrzKf7zSyOd9r.jpeg,blogs/after/JPndY4Bn10nVkMpxMvKL5V803BMEDqGogzuQEc73.jpeg,blogs/after/UFLFnfql26BIkHuGRCYTdBHucitC2SzRzHDMsIUJ.jpeg,blogs/after/aglFKzbACdyjsO25yyx6sEJ7sZmp0CJuQjQdT5Wp.jpeg,,'),
(15, 'zaiju wang site', 'china', NULL, NULL, NULL, '2019-11-06', '2019-11-07', 45, 23, 45, 'images/UUwofcJpXA51ykOW1nCHqSd8QgYBb7il8iAK4Rdh.jpeg', 1700, 3, 6, 2, 14, 17, 18, '2019-11-13', '2019-11-13', '2019-11-14', 'zaiju', 'zaiju', 'zaiju', 0, 0, 0, ',,,,,,blogs/before/OG2dQqnchTUPE99l8drYmduNzRmjt134EaRfrOg5.jpeg', ',,,,blogs/after/rr6Gjvch4UhGjqscerTfoxeGWItALDk066oclkYH.jpeg'),
(17, '146 Pierrepont', '146 Pierrepont Street Brooklyn NY 11201', NULL, NULL, NULL, '2018-12-14', '2019-02-22', 4, 2019, 90, 'images/GMqVp2SOhGGvNIpj3Kcbkq9bbAmSmQ7JArS5gCl5.jpeg', 245, 10, 2, 55, 19, 23, 23, '2019-06-19', NULL, NULL, 'Jonathan Jackson', NULL, NULL, 0, 2, 0, ',blogs/before/rACX46h5qyU1KEyeDqnSRN2N7qYqAUadnASryyef.jpeg', ',blogs/after/MCvPA3bXuO8Rjw7nUIeGGHSdyAdKGjSdJrEVPghK.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorization` int(11) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `site_id`, `authorization`, `phone`, `resume`, `created_at`, `updated_at`) VALUES
(1, 'Jonathan Jackson', 'jjackson@ServiceTaskForce.com', '2019-11-04 22:29:22', '$2y$10$N0bEYAuoSZ1n.OgmUIH/N.DjIW9jjC4/yRR7za7OqhrwGqRoNYWYO', 'avatars/djtr4nOyx9AKhF5Z8Yluitv5v9EcRZhskD9waEmt.jpeg', 'ujVLMkPgHwUySTwxErKcfaeJjYVgAEEk4RHv6djeErbZ4KTjNJej1AOMKyEK', '1', 1, '917-348-9688', NULL, NULL, NULL),
(16, 'Hugh Laurie', 'reginal@test.com', NULL, '$2y$10$ahf./lLZW2CEnpe6ErTck.Je0A7Y1yWudn8mbLvvGduKyDn/T8JOm', 'avatars/Gf8QJMabB1GuDQ6N8By59YEnI6S4hiloxwJPYB75.jpeg', NULL, '1', NULL, '123-456-7898', 'resumes/Ap2awQth9BXallvrxovkgH0U4qRgzMO361mRf5Zc.pdf', '2019-11-19 05:05:04', '2019-11-19 05:05:04'),
(17, 'Mandy Jankins', 'communitymanager@test.com', NULL, '$2y$10$GsF.qmJtsfvhWpq4kwg6jeTEb27WEI0U2moLmBHIP4fu3Rmb1b/W2', 'avatars/4dJSDFpwR2y9Eqp6eF94yyQZHIDMqcYNQBLGeuLx.jpeg', NULL, NULL, NULL, NULL, 'resumes/ZwFCu0r0tkImgYLtW1p73sX3BGS6O0TjqTGeGULi.pdf', '2019-11-23 10:35:58', '2019-11-23 10:35:58'),
(18, 'Hugh Laurie', 'reginalmanager@test.com', NULL, '$2y$10$.Wio416TgcW6dBrGr6x1qeIFFCLULMyhrULbsyoljpxz.vDwi9H2e', 'avatars/yr82X7kbQdneiUW1m9FGyYV9lTmCZwNwSgO2Ua4K.jpeg', NULL, NULL, NULL, NULL, NULL, '2019-11-23 10:35:58', '2019-11-23 10:35:58'),
(19, 'Kevin Ward', 'kward@rosenyc.com', NULL, '$2y$10$q3lQ160QeVbc5e1mgiIPwOW0VFFPYLdaMqHf5CBHCbJRbapvR0bW6', 'avatars/DFNrnxyuLBp8kMIXj5S48RCfbcHHTvHi2264FfiL.jpeg', NULL, NULL, NULL, '212-343-1998', NULL, '2019-11-25 03:09:52', '2019-11-25 03:09:52'),
(23, 'unknown', 'unknown@unknown.com', NULL, '$2y$10$exTjTAv43JBXSy.xheOFCeGCpzyHaUpW6XCxgkZ4SuSbqiYNoFFcu', 'avatars/9hHXhdxOYaMUwR0X6IsYRSY73bFE8uzqFE7ZM4bk.png', NULL, NULL, NULL, NULL, NULL, '2019-11-29 14:20:56', '2019-11-29 14:20:56'),
(24, 'Jonathan Jackson', 'jjack811088@gmail.com', NULL, '$2y$10$S5hB2Aa2vxZOIzrLBIbyieOrI9rhn6Z6.tQRdmVQnftXhtAKMJFIS', NULL, 'oevRTIFZ0Jj8gR2BJDjVJHh7XgNzkr14ItTLDsj9y9u7cx4fgnSbh5nIaLIy', NULL, NULL, NULL, NULL, '2020-02-14 23:25:12', '2020-02-14 23:25:12'),
(25, 'admin', 'admin@admin.com', NULL, '$2y$10$rBdxpgeNjoaQgA9/TF26.e4Ult4QHNkzhbt0CgeR.og67bN8m.41S', NULL, 'Ayq0l7geZNicMVwuc8mGD0nPoWBBSRAUB6lzoDeCdisgZHfP8jcFOFBqcJZI', NULL, 1, NULL, NULL, '2020-02-15 00:12:49', '2020-02-15 00:12:49'),
(26, 'john doe', 'Jmm2965943@outlook.com', NULL, '$2y$10$KYS/ZrC5yO7ixL6ElFSsNutcXWBs7KL9d0yPNnviwBcEYyU1dDlxq', NULL, 'qBVrQybY8Ml2mn0eqML3L2qt29GHFiP9QBPZ5D20s5AXf5AIyj8O3nddAM1c', NULL, 1, NULL, NULL, '2020-02-20 08:00:43', '2020-02-20 08:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE `user_task` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_task`
--

INSERT INTO `user_task` (`id`, `user_id`, `task_id`) VALUES
(6, 18, 8),
(7, 1, 9),
(9, 16, 9),
(10, 17, 9),
(11, 18, 9),
(13, 16, 10),
(16, 18, 13),
(18, 17, 14),
(19, 16, 15),
(21, 17, 16),
(22, 1, 17),
(23, 17, 17),
(36, 17, 1),
(37, 19, 1),
(45, 17, 7),
(48, 17, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `tbl_evaluations`
--
ALTER TABLE `tbl_evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_scores`
--
ALTER TABLE `tbl_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siteproperties`
--
ALTER TABLE `tbl_siteproperties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_task`
--
ALTER TABLE `user_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_task_user_id_index` (`user_id`),
  ADD KEY `user_task_task_id_index` (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `tbl_evaluations`
--
ALTER TABLE `tbl_evaluations`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8186;

--
-- AUTO_INCREMENT for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_scores`
--
ALTER TABLE `tbl_scores`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_siteproperties`
--
ALTER TABLE `tbl_siteproperties`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_task`
--
ALTER TABLE `user_task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_task`
--
ALTER TABLE `user_task`
  ADD CONSTRAINT `user_task_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_task_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
