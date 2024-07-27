-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 10:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emu`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_batch`
--

CREATE TABLE `academic_batch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `batch_name` varchar(255) NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `academic_branch`
--

CREATE TABLE `academic_branch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_address` varchar(255) DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_branch`
--

INSERT INTO `academic_branch` (`id`, `branch_name`, `branch_address`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Barisal', NULL, 1, '2024-07-17 20:21:53', '2024-07-17 20:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `academic_class`
--

CREATE TABLE `academic_class` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_class`
--

INSERT INTO `academic_class` (`id`, `branch_id`, `class_name`, `status_id`) VALUES
(1, 1, 'Class 7', 1),
(2, 1, 'Class 8', 1),
(3, 1, 'Class 9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `academic_class_settings`
--

CREATE TABLE `academic_class_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_class_settings`
--

INSERT INTO `academic_class_settings` (`id`, `branch_id`, `class_id`, `section_id`, `status_id`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 1, 1),
(3, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `academic_room`
--

CREATE TABLE `academic_room` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `academic_section`
--

CREATE TABLE `academic_section` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_section`
--

INSERT INTO `academic_section` (`id`, `branch_id`, `section_name`, `status_id`) VALUES
(1, 1, 'Section A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `academic_shift`
--

CREATE TABLE `academic_shift` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `shift_name` varchar(255) NOT NULL,
  `shift_start` time NOT NULL,
  `shift_end` time NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `academic_subject`
--

CREATE TABLE `academic_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_subject`
--

INSERT INTO `academic_subject` (`id`, `subject_name`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', 1, NULL, NULL),
(2, 'English', 1, NULL, NULL),
(3, 'Arabic', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `academic_subject_assign`
--

CREATE TABLE `academic_subject_assign` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `acc_type_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `tnx_charge` decimal(12,2) DEFAULT NULL,
  `initial_blance` decimal(12,2) NOT NULL DEFAULT 0.00,
  `curr_blance` decimal(12,2) NOT NULL DEFAULT 0.00,
  `status_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_bank_name`
--

CREATE TABLE `accounts_bank_name` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_type` tinyint(4) NOT NULL COMMENT '1= Bank Account, 2=Mobile Bank',
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_transactions`
--

CREATE TABLE `account_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `tnx_type_id` int(11) NOT NULL,
  `tnx_cat_id` int(11) NOT NULL,
  `tnx_subcat_id` int(11) NOT NULL,
  `tnx_ac_id` int(11) NOT NULL,
  `tnx_user_type` int(11) NOT NULL,
  `tnx_user_id` int(11) NOT NULL,
  `tnx_amount` decimal(11,2) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `payment_method_des` text DEFAULT NULL,
  `tnx_date` date NOT NULL,
  `tnx_note` text DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_transaction_category`
--

CREATE TABLE `account_transaction_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tnx_name` varchar(255) NOT NULL,
  `parent_id` tinyint(4) NOT NULL DEFAULT 0,
  `tnx_type` tinyint(4) NOT NULL COMMENT '1-Income, 2=expense',
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'a', 1, '2024-07-17 20:25:38', '2024-07-17 20:25:38'),
(2, 'b', 1, '2024-07-27 20:03:11', '2024-07-27 20:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_subject_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `course_subject_id`, `chapter_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lesson-1', '2024-07-27 20:22:25', '2024-07-27 20:22:25'),
(2, 2, 'Lesson-1', '2024-07-27 20:22:25', '2024-07-27 20:22:25'),
(3, 3, 'Lesson-1', '2024-07-27 20:24:38', '2024-07-27 20:24:38'),
(4, 3, 'Lesson-2', '2024-07-27 20:24:38', '2024-07-27 20:24:38'),
(5, 3, 'Lesson-3', '2024-07-27 20:24:38', '2024-07-27 20:24:38'),
(6, 4, 'Lesson-1', '2024-07-27 20:24:39', '2024-07-27 20:24:39'),
(7, 4, 'Lesson-2', '2024-07-27 20:24:39', '2024-07-27 20:24:39'),
(8, 5, 'Lesson-1', '2024-07-27 20:26:56', '2024-07-27 20:26:56'),
(9, 5, 'Lesson-2', '2024-07-27 20:26:56', '2024-07-27 20:26:56'),
(10, 5, 'Lesson-3', '2024-07-27 20:26:56', '2024-07-27 20:26:56'),
(11, 6, 'Lesson-1', '2024-07-27 20:26:56', '2024-07-27 20:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `start_date` varchar(191) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `class_routine` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `course_description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `course_title`, `start_date`, `image`, `class_routine`, `video`, `price`, `discount_price`, `course_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Duis eos est ducimus', '11-Oct-1988', 'course/1722111745.webp', 'course/1722111745.webp', '#', 329, 977, 'Est incidunt recus,io.', 1, '2024-07-27 20:22:25', '2024-07-27 20:22:25'),
(2, 1, 'ক্লাস ১১ - HSC \'26 (ব্যবসায় শিক্ষা)', '2024-07-31', 'course/1722111878.webp', 'course/1722111878.webp', '#', 3900, 3500, '১১শ শ্রেণির ব্যবসায় শিক্ষা বিভাগের শিক্ষার্থীদের HSC পরীক্ষার A+ প্রস্তুতি নিশ্চিতের জন্য দেশসেরা টিচারদের সাথে সারাবছর পড়ালেখার পূর্ণাঙ্গ প্রোগ্রাম। এই প্রোগ্রামটি কাদের জন্য? ১১শ শ্রেণির ব্যবসায় শিক্ষা বিভাগের শিক্ষার্থীদের বাংলা, ইংরেজি ও আইসিটি বিষয়ের লাইভ ক্লাস, লাইভ টেস্ট এবং অ্যানিমেটেড ভিডিওর মাধ্যমে বছরজুড়ে HSC পরীক্ষার A+ প্রস্তুতি নিশ্চিতে এই প্রোগ্রামটি সাজানো হয়েছে। কোর্সটি তোমার কেন প্রয়োজন? ঘরে বসেই ১৭ বছর পর্যন্ত অভিজ্ঞতাসম্পন্ন টিচারদের সাথে সারাবছর পড়ালেখা করে ইয়ার ফাইনাল পরীক্ষা ও HSC পরীক্ষার প্রস্তুতি নিতে টিচারদের থেকে সরাসরি সব প্রশ্নের উত্তর বুঝে নিতে এবং কনফিউশন দূর করতে নিয়মিত হোমওয়ার্কে অ্যানিমেটেড ভিডিও দেখে, প্র্যাকটিস MCQ টেস্ট দিয়ে নিজের শেখার অবস্থা জানতে কলেজের পড়াশোনা আগে আগে শেষ করে ক্লাসে-পরীক্ষায় এগিয়ে থাকতে', 1, '2024-07-27 20:24:38', '2024-07-27 20:24:38'),
(3, 2, 'Class 9 Batch -2', '2024-07-31', 'course/1722112015.webp', 'course/1722112016.webp', '#', 10000, 8000, '১১শ শ্রেণির ব্যবসায় শিক্ষা বিভাগের শিক্ষার্থীদের HSC পরীক্ষার A+ প্রস্তুতি নিশ্চিতের জন্য দেশসেরা টিচারদের সাথে সারাবছর পড়ালেখার পূর্ণাঙ্গ প্রোগ্রাম। এই প্রোগ্রামটি কাদের জন্য? ১১শ শ্রেণির ব্যবসায় শিক্ষা বিভাগের শিক্ষার্থীদের বাংলা, ইংরেজি ও আইসিটি বিষয়ের লাইভ ক্লাস, লাইভ টেস্ট এবং অ্যানিমেটেড ভিডিওর মাধ্যমে বছরজুড়ে HSC পরীক্ষার A+ প্রস্তুতি নিশ্চিতে এই প্রোগ্রামটি সাজানো হয়েছে। কোর্সটি তোমার কেন প্রয়োজন? ঘরে বসেই ১৭ বছর পর্যন্ত অভিজ্ঞতাসম্পন্ন টিচারদের সাথে সারাবছর পড়ালেখা করে ইয়ার ফাইনাল পরীক্ষা ও HSC পরীক্ষার প্রস্তুতি নিতে টিচারদের থেকে সরাসরি সব প্রশ্নের উত্তর বুঝে নিতে এবং কনফিউশন দূর করতে নিয়মিত হোমওয়ার্কে অ্যানিমেটেড ভিডিও দেখে, প্র্যাকটিস MCQ টেস্ট দিয়ে নিজের শেখার অবস্থা জানতে কলেজের পড়াশোনা আগে আগে শেষ করে ক্লাসে-পরীক্ষায় এগিয়ে থাকতে', 1, '2024-07-27 20:26:56', '2024-07-27 20:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `course_subjects`
--

CREATE TABLE `course_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_subjects`
--

INSERT INTO `course_subjects` (`id`, `course_id`, `subject_id`, `instructor_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, NULL, '2024-07-27 20:22:25', '2024-07-27 20:22:25'),
(2, 1, 2, 1, NULL, '2024-07-27 20:22:25', '2024-07-27 20:22:25'),
(3, 2, 1, 1, NULL, '2024-07-27 20:24:38', '2024-07-27 20:24:38'),
(4, 2, 2, 2, NULL, '2024-07-27 20:24:39', '2024-07-27 20:24:39'),
(5, 3, 1, 1, NULL, '2024-07-27 20:26:56', '2024-07-27 20:26:56'),
(6, 3, 2, 2, NULL, '2024-07-27 20:26:56', '2024-07-27 20:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_collections`
--

CREATE TABLE `fees_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tnx_ac_id` int(11) NOT NULL,
  `tnx_note` varchar(255) DEFAULT NULL,
  `tnx_amount` decimal(12,2) NOT NULL,
  `sub_total` decimal(12,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `payment_method` int(11) NOT NULL,
  `payment_method_des` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_collection_details`
--

CREATE TABLE `fees_collection_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fees_collection_id` int(11) NOT NULL,
  `tnx_fees_cat` int(11) NOT NULL,
  `tnx_amount` decimal(12,2) NOT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `branch_id`, `name`, `mobile`, `email`, `photo`, `subject_id`, `qualification`, `address`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'S.M Shamim', '01901027591', 'shamim.dev2@gmail.com', 'instructor/img-8686266.png', '1', 'BSC', 'Ashkona, 7 tola, Hajcamp, Dakshinkhan,Dhaka-1230', 1, '2024-07-27 20:00:32', '2024-07-27 20:00:32'),
(2, 1, 'Sakub', '01631025895', 'sakib@gmail.com', 'instructor/img-2027788.png', '2', 'BBA', 'Ashkona, 7 tola, Hajcamp, Dakshinkhan,Dhaka-1230', 1, '2024-07-27 20:02:14', '2024-07-27 20:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_29_052352_create_admins_table', 1),
(6, '2023_12_10_190231_create_settings_table', 1),
(7, '2024_06_07_102827_create_permission_tables', 1),
(8, '2024_06_07_112354_create_academic_batch_table', 1),
(9, '2024_06_07_112835_create_academic_branch_table', 1),
(10, '2024_06_07_113143_create_academic_class_table', 1),
(11, '2024_06_07_113402_create_academic_class_settings_table', 1),
(12, '2024_06_07_113545_create_academic_room_table', 1),
(13, '2024_06_07_113722_create_academic_section_table', 1),
(14, '2024_06_07_113903_create_academic_shift_table', 1),
(15, '2024_06_07_114252_create_academic_subject_table', 1),
(16, '2024_06_07_114350_create_academic_subject_assign_table', 1),
(17, '2024_06_07_114525_create_accounts_table', 1),
(18, '2024_06_07_161012_create_accounts_bank_name_table', 1),
(19, '2024_06_07_161938_create_account_transactions_table', 1),
(20, '2024_06_07_162831_create_account_transaction_category_table', 1),
(21, '2024_06_07_164138_create_fees_collections_table', 1),
(22, '2024_06_07_164634_create_fees_collection_details_table', 1),
(23, '2024_06_07_184630_create_student_class_assignment_table', 1),
(24, '2024_06_07_185030_create_student_fees_category_table', 1),
(25, '2024_06_07_185147_create_student_info_category_table', 1),
(26, '2024_06_07_232833_create_student_info_table', 1),
(28, '2024_07_15_003912_create_instructors_table', 1),
(29, '2024_07_15_004443_create_course_subjects_table', 1),
(30, '2024_07_16_232007_create_categories_table', 1),
(31, '2024_07_27_215353_create_chapters_table', 2),
(32, '2024_07_15_003027_create_courses_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `feature` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `feature`, `order`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list-student', 'student', 0, 'admin', '2024-07-17 20:22:00', '2024-07-17 20:22:00'),
(2, 'create-student', 'student', 0, 'admin', '2024-07-17 20:22:00', '2024-07-17 20:22:00'),
(3, 'edit-student', 'student', 0, 'admin', '2024-07-17 20:22:00', '2024-07-17 20:22:00'),
(4, 'delete-student', 'student', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(5, 'list-branch', 'branch', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(6, 'create-branch', 'branch', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(7, 'edit-branch', 'branch', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(8, 'delete-branch', 'branch', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(9, 'list-class', 'class', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(10, 'create-class', 'class', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(11, 'edit-class', 'class', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(12, 'delete-class', 'class', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(13, 'list-section', 'section', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(14, 'create-section', 'section', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(15, 'edit-section', 'section', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(16, 'delete-section', 'section', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(17, 'list-batch', 'batch', 0, 'admin', '2024-07-17 20:22:02', '2024-07-17 20:22:02'),
(18, 'create-batch', 'batch', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(19, 'edit-batch', 'batch', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(20, 'delete-batch', 'batch', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(21, 'list-shift', 'shift', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(22, 'create-shift', 'shift', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(23, 'edit-shift', 'shift', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(24, 'delete-shift', 'shift', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(25, 'list-subject', 'subject', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(26, 'create-subject', 'subject', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(27, 'edit-subject', 'subject', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(28, 'delete-subject', 'subject', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(29, 'list-subject_assign', 'subject_assign', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(30, 'create-subject_assign', 'subject_assign', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(31, 'edit-subject_assign', 'subject_assign', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(32, 'delete-subject_assign', 'subject_assign', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(33, 'list-fees-collections', 'fees-collections', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(34, 'create-fees-collections', 'fees-collections', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(35, 'edit-fees-collections', 'fees-collections', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(36, 'delete-fees-collections', 'fees-collections', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(37, 'list-accounts', 'accounts', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(38, 'create-accounts', 'accounts', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(39, 'edit-accounts', 'accounts', 0, 'admin', '2024-07-17 20:22:03', '2024-07-17 20:22:03'),
(40, 'delete-accounts', 'accounts', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(41, 'list-transactions', 'transactions', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(42, 'create-transactions', 'transactions', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(43, 'edit-transactions', 'transactions', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(44, 'delete-transactions', 'transactions', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(45, 'list-transaction_category', 'transaction_category', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(46, 'create-transaction_category', 'transaction_category', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(47, 'edit-transaction_category', 'transaction_category', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(48, 'delete-transaction_category', 'transaction_category', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(49, 'list-instructor', 'instructor', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(50, 'create-instructor', 'instructor', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(51, 'edit-instructor', 'instructor', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(52, 'delete-instructor', 'instructor', 0, 'admin', '2024-07-17 20:22:04', '2024-07-17 20:22:04'),
(53, 'list-course', 'course', 0, 'admin', '2024-07-17 20:22:05', '2024-07-17 20:22:05'),
(54, 'create-course', 'course', 0, 'admin', '2024-07-17 20:22:06', '2024-07-17 20:22:06'),
(55, 'edit-course', 'course', 0, 'admin', '2024-07-17 20:22:07', '2024-07-17 20:22:07'),
(56, 'delete-course', 'course', 0, 'admin', '2024-07-17 20:22:07', '2024-07-17 20:22:07'),
(57, 'list-course-category', 'course-category', 0, 'admin', '2024-07-17 20:22:07', '2024-07-17 20:22:07'),
(58, 'create-course-category', 'course-category', 0, 'admin', '2024-07-17 20:22:07', '2024-07-17 20:22:07'),
(59, 'edit-course-category', 'course-category', 0, 'admin', '2024-07-17 20:22:08', '2024-07-17 20:22:08'),
(60, 'delete-course-category', 'course-category', 0, 'admin', '2024-07-17 20:22:08', '2024-07-17 20:22:08'),
(61, 'list-role', 'role', 0, 'admin', '2024-07-17 20:22:08', '2024-07-17 20:22:08'),
(62, 'create-role', 'role', 0, 'admin', '2024-07-17 20:22:09', '2024-07-17 20:22:09'),
(63, 'edit-role', 'role', 0, 'admin', '2024-07-17 20:22:09', '2024-07-17 20:22:09'),
(64, 'delete-role', 'role', 0, 'admin', '2024-07-17 20:22:09', '2024-07-17 20:22:09'),
(65, 'list-user', 'user', 0, 'admin', '2024-07-17 20:22:09', '2024-07-17 20:22:09'),
(66, 'create-user', 'user', 0, 'admin', '2024-07-17 20:22:09', '2024-07-17 20:22:09'),
(67, 'edit-user', 'user', 0, 'admin', '2024-07-17 20:22:09', '2024-07-17 20:22:09'),
(68, 'delete-user', 'user', 0, 'admin', '2024-07-17 20:22:09', '2024-07-17 20:22:09'),
(69, 'academic', 'academic', 0, 'admin', '2024-07-17 20:22:09', '2024-07-17 20:22:09'),
(70, 'accounting', 'accounting', 0, 'admin', '2024-07-17 20:22:10', '2024-07-17 20:22:10'),
(71, 'setting', 'misc', 0, 'admin', '2024-07-17 20:22:10', '2024-07-17 20:22:10'),
(72, 'backup', 'misc', 0, 'admin', '2024-07-17 20:22:11', '2024-07-17 20:22:11'),
(73, 'permissions', 'role', 0, 'admin', '2024-07-17 20:22:11', '2024-07-17 20:22:11'),
(74, 'profile', 'profile', 0, 'admin', '2024-07-17 20:22:11', '2024-07-17 20:22:11'),
(75, 'change_password', 'profile', 0, 'admin', '2024-07-17 20:22:11', '2024-07-17 20:22:11'),
(76, 'dashboard', 'dashboard', 0, 'admin', '2024-07-17 20:22:12', '2024-07-17 20:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2024-07-17 20:21:53', '2024-07-17 20:21:53'),
(2, 'test_admin', 'admin', '2024-07-17 20:21:53', '2024-07-17 20:21:53'),
(3, 'operator', 'admin', '2024-07-17 20:21:53', '2024-07-17 20:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(74, 3),
(75, 1),
(75, 2),
(75, 3),
(76, 1),
(76, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `invoice_logo_type` enum('Logo','Name','Both') NOT NULL DEFAULT 'Name',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company`, `logo`, `address`, `email`, `phone`, `invoice_logo_type`, `created_at`, `updated_at`) VALUES
(1, 'EMU ', 'asset/images/logo.png', 'Barisal, Bangladesh', '#', '#', 'Name', '2024-07-17 20:21:53', '2024-07-17 20:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_assignment`
--

CREATE TABLE `student_class_assignment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_category`
--

CREATE TABLE `student_fees_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fees_category`
--

INSERT INTO `student_fees_category` (`id`, `name`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Admission Fee', 1, '2024-07-17 20:21:52', '2024-07-17 20:21:52'),
(2, 'Monthly Fee', 1, '2024-07-17 20:21:52', '2024-07-17 20:21:52'),
(3, 'Exam Fee', 1, '2024-07-17 20:21:52', '2024-07-17 20:21:52'),
(4, 'Others Fee', 1, '2024-07-17 20:21:52', '2024-07-17 20:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `img` varchar(255) NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `mobile_verified` tinyint(4) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(4) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `father_mobile` varchar(255) DEFAULT NULL,
  `mother_mobile` varchar(255) DEFAULT NULL,
  `father_email` varchar(255) DEFAULT NULL,
  `mother_email` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_info_category`
--

CREATE TABLE `student_info_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `branch_id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin@gmail.com', NULL, '$2y$10$8FT4R.1X2lrZi1/wIhQ.p.IKH7S3OOZTb9kuorT4aIEuIgd/WX2jG', 'asset/images/profile/1.jpg', NULL, '2024-07-17 20:21:53', '2024-07-17 20:21:53'),
(2, NULL, 'Test-Admin', 'test@admin.com', NULL, '$2y$10$lAFPId7Ba/UhqCTdOmV/OexmVzMRRUEaFWTSrbxGgDQMURbPqJoyy', 'asset/images/profile/1.jpg', NULL, '2024-07-17 20:21:53', '2024-07-17 20:21:53'),
(3, 1, 'Operator', 'operator@emu.com', NULL, '$2y$10$bQrtRtEykdHICDiY42BxIO179kz/hhz9/Hjezoe9ufhGs5g4VrGCO', 'asset/images/profile/1.jpg', NULL, '2024-07-17 20:21:53', '2024-07-17 20:21:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_batch`
--
ALTER TABLE `academic_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_branch`
--
ALTER TABLE `academic_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_class`
--
ALTER TABLE `academic_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_class_settings`
--
ALTER TABLE `academic_class_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_room`
--
ALTER TABLE `academic_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_section`
--
ALTER TABLE `academic_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_shift`
--
ALTER TABLE `academic_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_subject`
--
ALTER TABLE `academic_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_subject_assign`
--
ALTER TABLE `academic_subject_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts_bank_name`
--
ALTER TABLE `accounts_bank_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_transactions`
--
ALTER TABLE `account_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_transaction_category`
--
ALTER TABLE `account_transaction_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_number_unique` (`phone_number`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapters_course_subject_id_foreign` (`course_subject_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_subjects`
--
ALTER TABLE `course_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees_collections`
--
ALTER TABLE `fees_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_collection_details`
--
ALTER TABLE `fees_collection_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_class_assignment`
--
ALTER TABLE `student_class_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees_category`
--
ALTER TABLE `student_fees_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info_category`
--
ALTER TABLE `student_info_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_batch`
--
ALTER TABLE `academic_batch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `academic_branch`
--
ALTER TABLE `academic_branch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academic_class`
--
ALTER TABLE `academic_class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `academic_class_settings`
--
ALTER TABLE `academic_class_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `academic_room`
--
ALTER TABLE `academic_room`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `academic_section`
--
ALTER TABLE `academic_section`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academic_shift`
--
ALTER TABLE `academic_shift`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `academic_subject`
--
ALTER TABLE `academic_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `academic_subject_assign`
--
ALTER TABLE `academic_subject_assign`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts_bank_name`
--
ALTER TABLE `accounts_bank_name`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_transactions`
--
ALTER TABLE `account_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_transaction_category`
--
ALTER TABLE `account_transaction_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_subjects`
--
ALTER TABLE `course_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_collections`
--
ALTER TABLE `fees_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_collection_details`
--
ALTER TABLE `fees_collection_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_class_assignment`
--
ALTER TABLE `student_class_assignment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fees_category`
--
ALTER TABLE `student_fees_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_info_category`
--
ALTER TABLE `student_info_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_course_subject_id_foreign` FOREIGN KEY (`course_subject_id`) REFERENCES `course_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
