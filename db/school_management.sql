-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 12:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_employee_salaries`
--

INSERT INTO `account_employee_salaries` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 10, '2020-12', 30000, '2020-12-03 18:35:02', '2020-12-03 18:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `account_other_costs`
--

CREATE TABLE `account_other_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_other_costs`
--

INSERT INTO `account_other_costs` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '2020-12-04', 200, 'Pens', '202012040129gettyimages-1175573811-612x612.jpg', '2020-12-03 19:29:41', '2020-12-03 19:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 6, 2, '2020-12', 285, '2020-12-03 16:09:24', '2020-12-03 16:09:24'),
(2, 3, 1, 6, 4, '2020-12', 475, '2020-12-03 16:16:01', '2020-12-03 16:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 1, 1, NULL, NULL, '2020-11-28 14:27:48', '2020-11-29 12:24:31'),
(2, 5, NULL, 2, 1, NULL, NULL, '2020-11-28 15:21:37', '2020-11-28 15:21:37'),
(3, 6, 1, 1, 3, NULL, NULL, '2020-11-28 15:23:50', '2020-12-02 17:05:08'),
(4, 7, NULL, 2, 3, NULL, NULL, '2020-11-28 15:26:24', '2020-11-28 15:26:24'),
(5, 5, NULL, 4, 3, NULL, NULL, '2020-11-29 12:25:08', '2020-11-29 12:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 100, 33, 100, '2020-11-27 12:30:10', '2020-11-27 12:30:10'),
(5, 2, 3, 100, 33, 100, '2020-11-27 12:30:10', '2020-11-27 12:30:10'),
(6, 2, 4, 100, 33, 100, '2020-11-27 12:30:10', '2020-11-27 12:30:10'),
(7, 4, 1, 100, 33, 100, '2020-11-27 12:31:07', '2020-11-27 12:31:07'),
(8, 4, 3, 100, 33, 100, '2020-11-27 12:31:07', '2020-11-27 12:31:07'),
(9, 4, 4, 100, 33, 100, '2020-11-27 12:31:07', '2020-11-27 12:31:07'),
(10, 4, 5, 100, 33, 100, '2020-11-27 12:31:07', '2020-11-27 12:31:07'),
(11, 4, 6, 100, 33, 100, '2020-11-27 12:31:07', '2020-11-27 12:31:07'),
(12, 4, 7, 100, 33, 100, '2020-11-27 12:31:07', '2020-11-27 12:31:07'),
(13, 5, 1, 100, 33, 100, '2020-11-27 12:32:05', '2020-11-27 12:32:05'),
(14, 5, 3, 100, 33, 100, '2020-11-27 12:32:05', '2020-11-27 12:32:05'),
(15, 5, 4, 100, 33, 100, '2020-11-27 12:32:05', '2020-11-27 12:32:05'),
(16, 5, 5, 100, 33, 100, '2020-11-27 12:32:05', '2020-11-27 12:32:05'),
(17, 5, 6, 100, 33, 100, '2020-11-27 12:32:05', '2020-11-27 12:32:05'),
(18, 5, 7, 100, 33, 100, '2020-11-27 12:32:05', '2020-11-27 12:32:05'),
(31, 1, 1, 100, 33, 100, '2020-11-27 13:29:18', '2020-11-27 13:29:18'),
(32, 1, 3, 100, 33, 100, '2020-11-27 13:29:18', '2020-11-27 13:29:18'),
(33, 1, 4, 100, 33, 100, '2020-11-27 13:29:18', '2020-11-27 13:29:18'),
(40, 6, 1, 100, 33, 100, '2020-11-27 13:37:35', '2020-11-27 13:37:35'),
(41, 6, 3, 100, 33, 100, '2020-11-27 13:37:35', '2020-11-27 13:37:35'),
(42, 6, 4, 100, 33, 100, '2020-11-27 13:37:35', '2020-11-27 13:37:35'),
(43, 6, 5, 100, 33, 100, '2020-11-27 13:37:35', '2020-11-27 13:37:35'),
(44, 6, 6, 100, 33, 100, '2020-11-27 13:37:35', '2020-11-27 13:37:35'),
(46, 6, 7, 100, 33, 100, '2020-12-02 17:56:08', '2020-12-02 17:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Assistant Teacher', '2020-11-27 14:00:21', '2020-11-27 14:01:19'),
(3, 'Teacher', '2020-11-27 14:01:33', '2020-11-27 14:01:33'),
(4, 'Head Teacher', '2020-11-27 14:01:44', '2020-11-27 14:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, '2020-11-28 14:27:48', '2020-11-28 14:27:48'),
(2, 2, 1, 50, '2020-11-28 15:21:37', '2020-11-28 15:21:37'),
(3, 3, 1, 5, '2020-11-28 15:23:50', '2020-11-28 15:23:50'),
(4, 4, 1, 0, '2020-11-28 15:26:24', '2020-11-30 12:15:57'),
(5, 5, 1, 50, '2020-11-29 12:25:08', '2020-11-29 12:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `date` date NOT NULL,
  `attend_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(5, 10, '2020-12-02', 'Leave', '2020-12-02 11:37:10', '2020-12-02 11:37:10'),
(6, 11, '2020-12-02', 'Present', '2020-12-02 11:37:10', '2020-12-02 11:37:10'),
(9, 10, '2020-12-03', 'Present', '2020-12-02 11:49:14', '2020-12-02 11:49:14'),
(10, 11, '2020-12-03', 'Present', '2020-12-02 11:49:14', '2020-12-02 11:49:14'),
(11, 10, '2020-12-04', 'Present', '2020-12-02 11:49:35', '2020-12-02 11:49:35'),
(12, 11, '2020-12-04', 'Absent', '2020-12-02 11:49:35', '2020-12-02 11:49:35'),
(13, 10, '2020-12-05', 'Leave', '2020-12-04 14:05:21', '2020-12-04 14:05:21'),
(14, 11, '2020-12-05', 'Leave', '2020-12-04 14:05:21', '2020-12-04 14:05:21'),
(15, 10, '2020-12-06', 'Absent', '2020-12-05 12:53:54', '2020-12-05 12:53:54'),
(16, 11, '2020-12-06', 'Present', '2020-12-05 12:53:54', '2020-12-05 12:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leavves`
--

CREATE TABLE `employee_leavves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `leave_purpose_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leavves`
--

INSERT INTO `employee_leavves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '2020-12-01', '2020-12-02', '2020-12-01 17:05:24', '2020-12-01 17:27:58'),
(2, 11, 3, '2020-12-01', '2020-12-03', '2020-12-01 17:07:16', '2020-12-01 17:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = User_id',
  `previous_salary` int(11) DEFAULT NULL,
  `present_salary` int(11) DEFAULT NULL,
  `increment_salary` int(11) DEFAULT NULL,
  `effected_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_date`, `created_at`, `updated_at`) VALUES
(3, 10, 25000, 25000, 0, '2020-12-01', '2020-11-30 22:24:40', '2020-11-30 22:24:40'),
(4, 11, 11000, 11000, 0, '2020-11-02', '2020-12-01 11:26:00', '2020-12-01 11:26:00'),
(5, 10, 25000, 30000, 5000, '2021-01-01', '2020-12-01 14:16:33', '2020-12-01 14:16:33'),
(6, 11, 11000, 12000, 1000, '2021-01-01', '2020-12-01 14:19:59', '2020-12-01 14:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, '1st Terminal Examination', '2020-11-27 11:05:16', '2020-11-27 11:05:16'),
(3, '2nd Terminal Examination', '2020-11-27 11:05:38', '2020-11-27 11:05:38'),
(4, 'Final Examination', '2020-11-27 11:05:55', '2020-11-27 11:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Registration Fee', '2020-11-26 06:26:24', '2020-11-26 06:26:24'),
(4, 'Monthly Fee', '2020-11-26 06:27:27', '2020-11-26 06:27:27'),
(5, 'Exam Fee', '2020-11-26 06:27:36', '2020-11-26 06:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(6, 4, 1, 500, '2020-11-26 08:13:49', '2020-11-26 08:13:49'),
(7, 4, 2, 500, '2020-11-26 08:13:49', '2020-11-26 08:13:49'),
(8, 4, 4, 600, '2020-11-26 08:13:49', '2020-11-26 08:13:49'),
(9, 4, 5, 700, '2020-11-26 08:13:49', '2020-11-26 08:13:49'),
(10, 4, 6, 800, '2020-11-26 08:13:49', '2020-11-26 08:13:49'),
(11, 5, 1, 200, '2020-11-26 08:14:39', '2020-11-26 08:14:39'),
(12, 5, 2, 200, '2020-11-26 08:14:39', '2020-11-26 08:14:39'),
(13, 5, 4, 300, '2020-11-26 08:14:39', '2020-11-26 08:14:39'),
(14, 5, 5, 350, '2020-11-26 08:14:39', '2020-11-26 08:14:39'),
(15, 5, 6, 500, '2020-11-26 08:14:39', '2020-11-26 08:14:39'),
(16, 2, 1, 300, '2020-11-26 12:38:09', '2020-11-26 12:38:09'),
(17, 2, 2, 400, '2020-11-26 12:38:09', '2020-11-26 12:38:09'),
(18, 2, 4, 500, '2020-11-26 12:38:10', '2020-11-26 12:38:10'),
(19, 2, 5, 800, '2020-11-26 12:38:10', '2020-11-26 12:38:10'),
(20, 2, 6, 900, '2020-11-26 12:38:10', '2020-11-26 12:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Family Probelm', NULL, NULL),
(2, 'Personal Problem', NULL, NULL),
(3, 'Physical Problem', '2020-12-01 17:07:16', '2020-12-01 17:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `grade_name`, `grade_point`, `start_mark`, `end_marks`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5', '80', '99', '5', '5', 'Excellent', '2020-12-03 13:21:17', '2020-12-04 16:32:57'),
(2, 'A', '4', '70', '79', '4', '4.99', 'Very Good', '2020-12-03 13:25:38', '2020-12-04 16:33:22'),
(3, 'A-', '3.5', '60', '69', '3', '3.99', 'Good', '2020-12-03 13:26:27', '2020-12-04 16:35:10'),
(4, 'B', '3', '50', '59', '3', '3.49', 'Average', '2020-12-03 13:27:09', '2020-12-04 16:34:07'),
(5, 'C', '2', '40', '49', '2', '2.99', 'Disappoint', '2020-12-03 13:27:52', '2020-12-04 16:34:20'),
(6, 'D', '1', '33', '39', '1', '1.99', 'Bad', '2020-12-03 13:28:28', '2020-12-04 16:34:36'),
(7, 'F', '0', '00', '32', '0', '0.99', 'Fail', '2020-12-03 13:28:58', '2020-12-04 16:34:47');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_26_103655_create_student_classes_table', 2),
(5, '2020_11_26_111132_create_years_table', 3),
(6, '2020_11_26_112632_create_student_groups_table', 4),
(7, '2020_11_26_114021_create_student_shifts_table', 5),
(8, '2020_11_26_121214_create_fee_categories_table', 6),
(9, '2020_11_26_123816_create_fee_category_amounts_table', 7),
(10, '2020_11_27_163903_create_exam_types_table', 8),
(11, '2020_11_27_170949_create_subjects_table', 9),
(12, '2020_11_27_173652_create_assign_subjects_table', 10),
(13, '2020_11_27_194527_create_designations_table', 11),
(14, '2014_10_12_000000_create_users_table', 12),
(15, '2020_11_28_094833_create_assign_students_table', 13),
(16, '2020_11_28_095301_create_discount_students_table', 13),
(17, '2020_12_01_030437_create_employee_salary_logs_table', 14),
(18, '2020_12_01_214356_create_leave_purposes_table', 15),
(19, '2020_12_01_214416_create_employee_leavves_table', 15),
(20, '2020_12_01_235115_create_employee_attendances_table', 16),
(21, '2020_12_02_214205_create_student_marks_table', 17),
(22, '2020_12_03_174323_create_marks_grades_table', 18),
(23, '2020_12_03_194148_create_account_student_fees_table', 19),
(24, '2020_12_03_223042_create_account_employee_salaries_table', 20),
(25, '2020_12_04_004420_create_account_other_costs_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'One', '2020-11-26 04:53:33', '2020-11-26 04:58:00'),
(2, 'Two', '2020-11-26 04:54:25', '2020-11-26 04:54:25'),
(4, 'Three', '2020-11-26 06:28:35', '2020-11-26 06:28:35'),
(5, 'Four', '2020-11-26 06:28:44', '2020-11-26 06:28:44'),
(6, 'Five', '2020-11-26 06:28:57', '2020-11-26 06:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Science', '2020-11-26 05:35:26', '2020-11-26 05:35:26'),
(3, 'Commerce', '2020-11-26 05:35:42', '2020-11-26 05:35:42'),
(4, 'Arts', '2020-11-26 05:36:09', '2020-11-26 05:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id = user_id',
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(5, 6, '20200006', 3, 1, 32, 2, 90, '2020-12-04 14:08:20', '2020-12-04 14:08:20'),
(6, 6, '20200006', 3, 1, 33, 2, 95, '2020-12-04 14:08:54', '2020-12-04 14:08:54'),
(8, 6, '20200006', 3, 1, 31, 2, 82, '2020-12-04 19:47:38', '2020-12-04 19:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Shift A', '2020-11-26 06:00:24', '2020-11-26 06:00:24'),
(3, 'Shift B', '2020-11-26 06:00:34', '2020-11-26 06:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', '2020-11-27 11:23:39', '2020-11-27 11:25:39'),
(3, 'English', '2020-11-27 11:25:53', '2020-11-27 11:25:53'),
(4, 'Math', '2020-11-27 11:26:08', '2020-11-27 11:26:08'),
(5, 'Islamic Studies', '2020-11-27 11:26:21', '2020-11-27 11:26:21'),
(6, 'Social Science', '2020-11-27 11:26:35', '2020-11-27 11:26:35'),
(7, 'General Science', '2020-11-27 11:27:22', '2020-11-27 11:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'student,employee,admin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin=head of software, operator=computer operator, user=employee',
  `joint_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive, 1=active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `joint_date`, `designation_id`, `salary`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Anisul Haque', 'xpfun420@gmail.com', NULL, '$2y$10$8rRgoComTzp9pP/uZkIdXuWYo58.2OYL6QliNY2dfVeOsIalyUmbW', '01923552130', 'Dattapara, Savar, Dhaka-1216', 'Male', '202011280925rsz_bg1.png', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, '2020-11-28 03:25:32'),
(3, 'admin', 'Rubel', 'rubel@gmail.com', NULL, '$2y$10$TFQMU03bqTKKMjxGLYG5N.dNcqkR0EvCmSS7dzRIiIgOGdJlY5sDO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3005', 'Operator', NULL, NULL, NULL, 1, NULL, '2020-11-28 04:11:17', '2020-11-28 04:11:17'),
(4, 'student', 'X khan', NULL, NULL, '$2y$10$vRsN75qbV8d07//2YRH9DOdY25iy5MaXs4Ar7SGoT59C3G9UBW8MC', '01923552130', 'Dattapara, Savar, Dhaka-1216', 'Male', '20201128202752603638-asian-little-school-boy-holding-books-with-backpack-on-white-background.jpg', 'Y Khan', 'Z khan', 'Islam', '20190001', '1999-01-01', '7068', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-28 14:27:48', '2020-11-28 14:27:48'),
(5, 'student', 'Jems Bond', NULL, NULL, '$2y$10$DeJMfC1Y3GFsvnCyts8pYuUZ3NRaHZkM6R8Z1o5b293u9wdp0IskW', '01923552131', 'Savar, Dhaka', 'Male', '202011282121portrait-smiling-hispanic-boy-looking-260nw-1104967028.webp', 'X Sarker', 'W Khatun', 'Islam', '20190005', '2003-11-19', '9942', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-28 15:21:37', '2020-11-28 15:21:37'),
(6, 'student', 'Vijay', NULL, NULL, '$2y$10$XcCBS9atcBNS0wXLPNJpi.7aEqKzKgLYIwMKtmWr1.HbjlumNfEMy', '01923552134', 'Belkuchi, Sirajgonj', 'Male', '202011282123gettyimages-1175573811-612x612.jpg', 'A Haque', 'A Haque', 'Islam', '20200006', '2002-11-06', '9006', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-28 15:23:50', '2020-11-29 12:06:43'),
(7, 'student', 'Sagor Islam', NULL, NULL, '$2y$10$PT.cu4xZzvLXTcL8WSR89eYK2KP0XWuKs6SK5377v3tcZ7BsnZIJm', '01923552135', 'Sector 10 - Uttara, Dhaka', 'Male', '202011282126gettyimages-614848702-612x612.jpg', 'C Poramanik', 'D Begum', 'Islam', '20200007', '2000-11-01', '4037', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-28 15:26:24', '2020-11-28 15:26:24'),
(10, 'employee', 'Tuhin Islam', NULL, NULL, '$2y$10$BLxYPSja0nzl1/ZI4osYCe5QXfkRJRjuWBtTCvQYatf/UuqFV6zri', '01923552130', 'Dattapara, Savar, Dhaka-1216', 'Male', '202012010424rsz_bg1.png', 'Xyz', 'Abcd', 'Islam', '2020070001', '1996-06-02', '5595', NULL, '2020-12-01', 4, 30000, 1, NULL, '2020-11-30 22:24:40', '2020-12-01 14:16:33'),
(11, 'employee', 'Faisal Ahmed', NULL, NULL, '$2y$10$BI5pbm/Rxy7V8Qrir2t5tuADe2BqR0tNlw7zFWhQCcWdOh1.eUhHu', '01923552139', 'Savar, Dhaka', 'Male', '202012011726630-07071785en_Masterfile.jpg', 'Y Khan', 'Bcd', 'Islam', '2020110011', '2001-12-05', '7545', NULL, '2020-11-02', 1, 12000, 1, NULL, '2020-12-01 11:26:00', '2020-12-01 14:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2019', '2020-11-26 05:21:30', '2020-11-26 05:21:30'),
(3, '2020', '2020-11-26 05:22:21', '2020-11-26 05:22:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leavves`
--
ALTER TABLE `employee_leavves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

--
-- Indexes for table `marks_grades`
--
ALTER TABLE `marks_grades`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `years_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_leavves`
--
ALTER TABLE `employee_leavves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
