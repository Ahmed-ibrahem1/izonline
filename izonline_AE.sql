-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2023 at 04:30 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `izonline_AE`
--

-- --------------------------------------------------------

--
-- Table structure for table `branchs`
--

CREATE TABLE `branchs` (
  `id` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`id`, `name`) VALUES
(1, 'Course'),
(2, 'Certificate'),
(3, 'Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED DEFAULT NULL,
  `coupon_id` bigint UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `program_id`, `coupon_id`, `price`, `created_at`, `updated_at`) VALUES
(2, 6, NULL, 11313.34, '2023-05-03 09:05:39', '2023-05-03 09:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `icon`, `title`, `featured`, `created_at`, `updated_at`) VALUES
(1, NULL, '168380097213.png', '{\"en\":\"Sports\",\"ar\":\"Sports\"}', 1, '2023-05-11 10:29:32', '2023-05-11 10:29:47'),
(2, NULL, '16838014376.png', '{\"en\":\"Cooking\",\"ar\":\"\\u0637\\u0628\\u062e\"}', 1, '2023-05-11 10:37:17', '2023-05-11 10:38:13'),
(3, NULL, '168380161124.png', '{\"en\":\"Beverage\",\"ar\":\"\\u0645\\u0634\\u0631\\u0648\\u0628\\u0627\\u062a\"}', 1, '2023-05-11 10:40:11', '2023-05-11 10:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int UNSIGNED NOT NULL,
  `usage_limit` int UNSIGNED DEFAULT NULL,
  `user_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `course_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `category_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `all_users` tinyint(1) NOT NULL DEFAULT '0',
  `all_courses` tinyint(1) NOT NULL DEFAULT '0',
  `valid_from` date NOT NULL DEFAULT '0001-01-01',
  `valid_to` date NOT NULL DEFAULT '9999-12-31',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `course_instructor`
--

CREATE TABLE `course_instructor` (
  `program_id` bigint UNSIGNED NOT NULL,
  `instructor_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_instructor`
--

INSERT INTO `course_instructor` (`program_id`, `instructor_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `biography` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `experience` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `biography`, `experience`, `instagram`, `facebook`, `image`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Denis Kessler\",\"ar\":\"Isabel Cruickshank\"}', '{\"en\":\"Occaecati veritatis placeat nostrum velit qui. Consectetur voluptate enim consequatur aut. Ut corporis odit cupiditate illo fugiat id velit totam.\",\"ar\":\"Dicta illo soluta et nihil. Labore fugit dolores similique praesentium. Voluptatum vel qui explicabo sit ad mollitia.\"}', '{\"en\":\"Sit architecto est esse sunt cumque commodi. Veritatis qui aspernatur repellendus ex quas assumenda omnis quis. Doloribus ex enim eos perferendis nobis.\",\"ar\":\"Ut est perspiciatis adipisci a reiciendis veritatis. Aut consequatur maiores cum. Cumque et nisi laboriosam.\"}', 'http://www.abbott.net/dolor-soluta-vero-laboriosam-tempore-voluptatem-asperiores-ut-eum', 'http://koepp.com/', 'instructors/w9C05tgyb2ihT8n4jJGXqmILhPxBSBVXIbYghRc0.jpg', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(2, '{\"en\":\"Dr. Major Schamberger DVM\",\"ar\":\"Delphine Bogisich\"}', '{\"en\":\"Laborum asperiores quis placeat perferendis sit sed. Qui architecto et aut tenetur omnis iste sit. Qui nisi optio necessitatibus recusandae magnam aut dolorem. Autem quaerat sint qui molestias autem dolorem.\",\"ar\":\"Vitae voluptatum eum ea incidunt. Inventore rerum aut a tempora libero et est rem. Impedit nihil qui impedit sit nesciunt voluptas.\"}', '{\"en\":\"Ut vitae exercitationem explicabo non nam. Doloremque sint occaecati minus sunt consequatur non repudiandae. Necessitatibus distinctio deserunt ut sed vel tempora.\",\"ar\":\"Voluptatibus tempora aliquam quasi dolorem eligendi corporis optio. Ipsa velit nihil voluptas accusantium beatae et. Omnis dolores et dolores qui nihil veritatis.\"}', 'http://lang.com/quas-consectetur-nostrum-sit-unde-reiciendis-qui', 'http://bauch.com/optio-qui-et-reprehenderit-ut-ducimus', 'instructors/w9C05tgyb2ihT8n4jJGXqmILhPxBSBVXIbYghRc0.jpg', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(3, '{\"en\":\"Nicholaus Medhurst\",\"ar\":\"Hailey Hintz\"}', '{\"en\":\"Vero sequi qui veniam. Voluptatem labore eum quis consequatur.\",\"ar\":\"Perferendis et eum maiores eos voluptatem in. Voluptatem minus voluptatem est quibusdam. Est doloremque sit tenetur esse molestiae culpa. Aliquid suscipit vel voluptate quo tenetur est voluptas. Fugiat totam accusantium nulla saepe voluptas illo.\"}', '{\"en\":\"Temporibus libero voluptatibus voluptate. Delectus velit ea totam dolorum quia hic est nihil.\",\"ar\":\"Autem fugiat incidunt expedita amet optio quidem et. Vel suscipit velit sunt sit debitis. Sint officiis vero deserunt quia excepturi unde a. Et sit qui soluta excepturi temporibus.\"}', 'http://smith.com/eum-sed-ab-quibusdam-non-asperiores', 'http://www.thiel.biz/deleniti-aliquid-quisquam-nisi-numquam', 'instructors/w9C05tgyb2ihT8n4jJGXqmILhPxBSBVXIbYghRc0.jpg', '2023-05-03 07:57:01', '2023-05-03 07:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Beginner\",\"ar\":\"\\u0645\\u0628\\u062a\\u062f\\u0626\"}', '2023-05-03 07:56:59', '2023-05-03 07:56:59'),
(2, '{\"en\":\"Intermediate\",\"ar\":\"\\u0645\\u062a\\u0648\\u0633\\u0637\"}', '2023-05-03 07:56:59', '2023-05-03 07:56:59'),
(3, '{\"en\":\"Advanced\",\"ar\":\"\\u0645\\u062a\\u0642\\u062f\\u0645\"}', '2023-05-03 07:56:59', '2023-05-03 07:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_29_174832_create_lionix_seo_manager_table', 1),
(4, '2019_01_08_132731_create_locales_table', 1),
(5, '2019_01_12_174747_create_translates_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2022_01_15_223928_create_programs_table', 1),
(9, '2022_01_15_232245_create_categories_table', 1),
(10, '2022_01_18_154103_create_instructors_table', 1),
(11, '2022_01_19_070056_create_levels_table', 1),
(12, '2022_01_19_160029_create_sales_table', 1),
(13, '2022_01_20_063131_create_roles_table', 1),
(14, '2022_01_21_132630_create_course_instructor_table', 1),
(15, '2022_02_14_165521_create_coupons_table', 1),
(16, '2022_02_20_225757_create_carts_table', 1),
(17, '2022_02_27_214123_create_media_table', 1),
(18, '2022_09_04_132922_create_organisations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`id`, `name`, `description`, `attributes`, `image`, `cover`, `website`, `instagram`, `facebook`, `twitter`, `created_at`, `updated_at`) VALUES
(8, '{\"en\":\"Innovam Nieuwegein\",\"ar\":\"Innovam Nieuwegein\"}', '{\"en\":\"Trainingen die je verder helpen in de mobiliteitsbranche\",\"ar\":\"Trainingen die je verder helpen in de mobiliteitsbranche\"}', '{\"en\":\"Welkom bij Innovam. Leuk dat je er bent!\",\"ar\":\"Welkom bij Innovam. Leuk dat je er bent!\"}', '168380433214.png', '168380433228.png', 'https://www.innovam.nl/', 'https://www.linkedin.com/company/innovam/', 'https://www.facebook.com/InnovamGroep/', 'https://www.youtube.com/user/InnovamGroup', '2023-05-11 11:25:32', '2023-05-11 11:25:32'),
(9, '{\"en\":\"Rouxbe\",\"ar\":\"Rouxbe\"}', '{\"en\":\"The New Culinary Standard\",\"ar\":\"The New Culinary Standard\"}', '{\"en\":\"We train culinary students, professional cooks, home cooks and everyone in between.\",\"ar\":\"We train culinary students, professional cooks, home cooks and everyone in between.\"}', '168380559020.png', '16838055907.jpg', 'https://rouxbe.com/individual-training/', 'https://www.instagram.com/rouxbe/', 'https://www.facebook.com/rouxbe', 'https://twitter.com/rouxbe', '2023-05-11 11:46:30', '2023-05-11 11:46:30'),
(10, '{\"en\":\"Italian Barista Certificate\",\"ar\":\"Italian Barista Certificate\"}', '{\"en\":\"The Worldwide barista certification\",\"ar\":\"The Worldwide barista certification\"}', '{\"en\":\"certified and accredited training protocol used all over the professional coffee world, for those who work, want to work or wish to open a coffee related startup.\",\"ar\":\"certified and accredited training protocol used all over the professional coffee world, for those who work, want to work or wish to open a coffee related startup.\"}', '168380600310.png', '168380600314.jpg', 'https://italianbaristamethod.com/', 'https://www.instagram.com/espressoacademy/', 'https://www.facebook.com/1', 'https://twitter.com/1', '2023-05-11 11:53:23', '2023-05-11 11:53:23'),
(11, '{\"en\":\"Canadian Education Council\",\"ar\":\"Canadian Education Council\"}', '{\"en\":\"The Canadian Education Council is focused on developing partnerships and projects between overseas partners and Canadian governments and organizations\",\"ar\":\"The Canadian Education Council is focused on developing partnerships and projects between overseas partners and Canadian governments and organizations\"}', '{\"en\":\"Offering a full scholarship for a Training Prep program for Remote Job Positions at Amazon\",\"ar\":\"Offering a full scholarship for a Training Prep program for Remote Job Positions at Amazon\"}', '16838077796.png', '168380777926.png', 'https://canadianeducationcouncil.org/', 'https://www.linkedin.com/company/cec/', 'https://m.me/108240425408749', 'https://twitter.com/2', '2023-05-11 12:22:59', '2023-05-11 12:22:59');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `level_id` bigint UNSIGNED NOT NULL,
  `org_id` int NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `objectives` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `aimed_at` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `learn_to` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `modules` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `duration` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `category_id`, `level_id`, `org_id`, `title`, `description`, `objectives`, `aimed_at`, `learn_to`, `modules`, `duration`, `image`, `price`, `language`, `delivery_mode`, `featured`, `created_at`, `updated_at`) VALUES
(1, 28, 3, 0, '{\"en\":\"amet\",\"ar\":\"\\u0642\\u0644\\u0648\\u0629\"}', NULL, NULL, NULL, NULL, NULL, 3, 'course_images/wBPiMdYY2yversuj1Db5OQpLJwebtWK4rIM68Nuv.png', 75000, 'ar', 'online', 0, '2023-05-03 07:57:01', '2023-05-09 12:12:13'),
(2, NULL, 3, 0, '{\"en\":\"nam\",\"ar\":\"\\u0627\\u0644\\u0628\\u062f\\u0639\"}', NULL, NULL, NULL, NULL, NULL, 0, 'course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png', 968, 'ar', 'online', 1, '2023-05-03 07:57:01', '2023-05-07 11:18:37'),
(3, NULL, 2, 0, '{\"en\":\"ut\",\"ar\":\"\\u0645\\u0647\\u062f \\u0627\\u0644\\u0630\\u0647\\u0628\"}', NULL, NULL, NULL, NULL, NULL, 3, 'course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png', 919, 'ar', 'online', 1, '2023-05-03 07:57:01', '2023-05-07 11:46:00'),
(4, NULL, 3, 0, '{\"en\":\"excepturi\",\"ar\":\"\\u062d\\u0641\\u0631 \\u0627\\u0644\\u0628\\u0627\\u0637\\u0646\"}', NULL, NULL, NULL, NULL, NULL, 3, 'course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png', 946, 'ar', 'online', 0, '2023-05-03 07:57:01', '2023-05-07 11:46:00'),
(5, NULL, 2, 0, '{\"en\":\"sed\",\"ar\":\"\\u0633\\u0645\\u064a\\u0631\\u0627\\u0621\"}', NULL, NULL, NULL, NULL, NULL, 7, 'course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png', 929, 'en', 'online', 1, '2023-05-03 07:57:01', '2023-05-07 11:18:40'),
(6, NULL, 1, 0, '{\"en\":\"distinctio\",\"ar\":\"\\u0627\\u0644\\u0645\\u0630\\u0646\\u0628\"}', NULL, NULL, NULL, NULL, NULL, 5, 'course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png', 635, 'ar', 'online', 0, '2023-05-03 07:57:01', '2023-05-07 11:18:37'),
(7, NULL, 3, 0, '{\"en\":\"soluta\",\"ar\":\"\\u0627\\u0644\\u0639\\u0627\\u0631\\u0636\\u0629\"}', NULL, NULL, NULL, NULL, NULL, 5, 'course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png', 741, 'en', 'online', 1, '2023-05-03 07:57:01', '2023-05-07 11:18:30'),
(8, NULL, 1, 0, '{\"en\":\"et\",\"ar\":\"\\u0639\\u0631\\u0639\\u0631\"}', NULL, NULL, NULL, NULL, NULL, 8, 'course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png', 584, 'ar', 'online', 0, '2023-05-03 07:57:01', '2023-05-07 11:18:29'),
(9, NULL, 3, 0, '{\"en\":\"inventore\",\"ar\":\"\\u0627\\u0644\\u062f\\u0648\\u0627\\u062f\\u0645\\u064a\"}', NULL, NULL, NULL, NULL, NULL, 9, 'course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png', 993, 'ar', 'online', 1, '2023-05-03 07:57:01', '2023-05-07 11:18:39'),
(10, NULL, 1, 0, '{\"en\":\"cupiditate\",\"ar\":\"\\u0628\\u062d\\u0631\\u0629\"}', NULL, NULL, NULL, NULL, NULL, 2, 'course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png', 860, 'en', 'online', 0, '2023-05-03 07:57:01', '2023-05-07 11:18:42'),
(11, NULL, 1, 0, '{\"en\":\"Rouxbe | Budget Cooking\",\"ar\":\"Rouxbe| Budget Cooking\"}', '{\"en\":\"Reinvigorate your favorite dishes that emphasizes flavor, versatility, easy storage and reheating. Includes an approachable menu with endless variations that dances across the globe without breaking the bank\",\"ar\":\"Reinvigorate your favorite dishes that emphasizes flavor, versatility, easy storage and reheating. Includes an approachable menu with endless variations that dances across the globe without breaking the bank\"}', '{\"en\":\"Learn how to make delicious dishes that emphasize flavor and versatility \\u2014 and are also easy to store and reheat. This course also includes an approachable menu with endless variations that dance across the globe without breaking the bank.\",\"ar\":\"Learn how to make delicious dishes that emphasize flavor and versatility \\u2014 and are also easy to store and reheat. This course also includes an approachable menu with endless variations that dance across the globe without breaking the bank.\"}', '{\"en\":[\"Reinvigorate your favorite dishes\"],\"ar\":[\"Reinvigorate your favorite dishes\"]}', '{\"en\":[\"Budget Cooking\"],\"ar\":[\"Budget Cooking\"]}', '{\"en\":[[\"Cooking on a Budget Course\",\"Rouxbe\",\"Rouxbe\",\"Rouxbe\"]],\"ar\":[[\"Cooking on a Budget Course\"]]}', 100, 'course_images/eIN3SFMyfRrO0UGnlptp1bf1CDlcrzmpecFDpcof.jpg', 47, 'en', 'online', 1, '2023-05-07 11:29:03', '2023-05-11 10:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2023-05-01 11:08:29', '2023-05-01 11:08:29'),
(2, 'customer', 2, '2023-05-01 11:08:29', '2023-05-01 11:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `coupon_id` bigint UNSIGNED DEFAULT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `program_id`, `coupon_id`, `ref_no`, `amount`, `created_at`, `updated_at`) VALUES
(1, 9, 1, NULL, 'Nihil.', 824.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(2, 22, 6, NULL, 'Autem.', 503.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(3, 14, 4, NULL, 'Magni.', 511.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(4, 3, 6, NULL, 'Error.', 709.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(5, 6, 2, NULL, 'Eos.', 878.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(6, 14, 9, NULL, 'In.', 796.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(7, 16, 2, NULL, 'Quas.', 720.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(8, 16, 10, NULL, 'Nulla.', 567.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(9, 3, 5, NULL, 'Optio.', 893.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(10, 15, 4, NULL, 'Esse.', 712.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(11, 10, 3, NULL, 'Quo.', 784.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(12, 13, 10, NULL, 'Modi.', 803.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(13, 10, 3, NULL, 'Sed.', 879.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(14, 14, 4, NULL, 'Rerum.', 595.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(15, 2, 2, NULL, 'Neque.', 868.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(16, 5, 5, NULL, 'Animi.', 654.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(17, 3, 10, NULL, 'Illum.', 575.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(18, 20, 10, NULL, 'Magni.', 613.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(19, 4, 5, NULL, 'Rerum.', 704.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(20, 13, 8, NULL, 'Quia.', 907.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(21, 6, 9, NULL, 'Quia.', 886.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(22, 14, 6, NULL, 'Quis.', 902.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(23, 20, 10, NULL, 'Omnis.', 631.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(24, 21, 10, NULL, 'Iste.', 795.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(25, 21, 7, NULL, 'Ut.', 855.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(26, 19, 9, NULL, 'Est.', 745.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(27, 2, 5, NULL, 'Natus.', 952.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(28, 15, 2, NULL, 'Qui.', 774.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(29, 16, 7, NULL, 'Omnis.', 996.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(30, 14, 2, NULL, 'Nisi.', 791.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(31, 16, 4, NULL, 'Porro.', 873.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(32, 20, 1, NULL, 'Odit.', 574.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(33, 10, 9, NULL, 'Culpa.', 843.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(34, 5, 4, NULL, 'Ad.', 663.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(35, 14, 5, NULL, 'Et.', 704.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(36, 7, 4, NULL, 'Sed.', 526.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(37, 11, 5, NULL, 'Qui.', 905.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(38, 18, 6, NULL, 'Et.', 909.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(39, 6, 6, NULL, 'Ad.', 742.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(40, 3, 10, NULL, 'Fuga.', 696.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(41, 6, 4, NULL, 'Eum.', 624.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(42, 20, 9, NULL, 'Odio.', 508.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(43, 22, 10, NULL, 'Quas.', 974.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(44, 11, 7, NULL, 'Nemo.', 787.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(45, 11, 9, NULL, 'Omnis.', 500.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(46, 11, 7, NULL, 'Quas.', 680.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(47, 3, 10, NULL, 'Qui.', 975.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(48, 15, 10, NULL, 'Qui.', 975.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(49, 8, 2, NULL, 'Et id.', 995.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(50, 17, 10, NULL, 'Ex in.', 525.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(51, 5, 9, NULL, 'Rerum.', 768.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(52, 22, 5, NULL, 'Ut.', 571.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(53, 17, 7, NULL, 'Fuga.', 869.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(54, 14, 10, NULL, 'Iure.', 859.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(55, 7, 2, NULL, 'Quae.', 742.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(56, 12, 3, NULL, 'Est.', 900.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(57, 8, 10, NULL, 'Sint.', 926.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(58, 20, 4, NULL, 'Non.', 849.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(59, 10, 8, NULL, 'Id.', 783.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(60, 9, 9, NULL, 'Atque.', 715.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(61, 16, 7, NULL, 'Et ut.', 903.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(62, 22, 6, NULL, 'A quo.', 642.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(63, 14, 7, NULL, 'Fugit.', 664.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(64, 3, 6, NULL, 'Nobis.', 748.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(65, 16, 7, NULL, 'Quia.', 586.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(66, 13, 10, NULL, 'Sed.', 887.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(67, 15, 8, NULL, 'Qui.', 614.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(68, 2, 5, NULL, 'Earum.', 918.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(69, 5, 2, NULL, 'Sed.', 892.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(70, 22, 5, NULL, 'Autem.', 661.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(71, 4, 4, NULL, 'Ab.', 964.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(72, 4, 9, NULL, 'Quo.', 779.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(73, 5, 4, NULL, 'Ipsum.', 767.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(74, 13, 10, NULL, 'Rerum.', 561.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(75, 19, 7, NULL, 'Ut.', 898.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(76, 11, 6, NULL, 'Sit.', 700.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(77, 21, 3, NULL, 'Iure.', 702.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(78, 17, 10, NULL, 'Qui.', 910.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(79, 17, 10, NULL, 'Esse.', 845.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(80, 12, 10, NULL, 'Nisi.', 675.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(81, 17, 10, NULL, 'Ut.', 557.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(82, 16, 9, NULL, 'Ut.', 827.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(83, 12, 10, NULL, 'Magni.', 748.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(84, 10, 2, NULL, 'Ut.', 682.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(85, 21, 3, NULL, 'Sit.', 632.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(86, 17, 7, NULL, 'Eum.', 687.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(87, 21, 9, NULL, 'At.', 682.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(88, 21, 8, NULL, 'Vel.', 630.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(89, 20, 5, NULL, 'Qui.', 604.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(90, 22, 5, NULL, 'Et.', 881.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(91, 2, 3, NULL, 'In.', 790.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(92, 20, 4, NULL, 'Eius.', 545.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(93, 9, 6, NULL, 'Qui.', 855.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(94, 22, 5, NULL, 'Eum.', 634.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(95, 4, 4, NULL, 'Eos.', 501.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(96, 18, 6, NULL, 'Est.', 911.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(97, 3, 10, NULL, 'Fuga.', 814.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(98, 22, 9, NULL, 'Et.', 814.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(99, 16, 4, NULL, 'Autem.', 879.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(100, 8, 3, NULL, 'Vel.', 910.00, '2023-05-03 07:57:01', '2023-05-03 07:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `seo_manager`
--

CREATE TABLE `seo_manager` (
  `id` int UNSIGNED NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `mapping` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `keywords` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_dynamic` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `og_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `seo_manager_locales`
--

CREATE TABLE `seo_manager_locales` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_manager_locales`
--

INSERT INTO `seo_manager_locales` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'en', '2023-05-01 08:50:48', '2023-05-01 08:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `seo_manager_translates`
--

CREATE TABLE `seo_manager_translates` (
  `id` int UNSIGNED NOT NULL,
  `route_id` int NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_dynamic` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `og_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '2',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'admin', 'admin@izonlineedu.com', '$2y$10$zlf6sRsGLDhc2GYwAQvfzuSEqszVNWguEUUa1CSVtT8SLAPzCSz6S', 'NA', 'NA', 'NA', 'NA', '2023-05-03 07:56:59', 'c069nDDJ8T3v2HRPN8zL2XOlhDRDLzWqyPpE9yTy7vuDTcmcR5bytpkNAk26', '2023-05-03 07:57:00', '2023-05-03 07:57:00'),
(3, 2, 'Lavonne Dach', 'iokon@example.org', '$2y$10$uVMTH5iTndrvSYmqnruiCO.8sf0qZ/AM08Vuy0ic1DfzccyUnIAJa', 'Bartholome', 'Mr. Eugene Langworth', 'Towne', '+1.509.977.8256', '2023-05-03 07:57:00', 'eTTABNR7xl', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(4, 2, 'Mr. Kennedi Mraz', 'cloyd04@example.org', '$2y$10$OqsUmk5U9w8UHPsG61K.Y.EeT2mzTU0rqb9KvDrP9faMfXLug6LPW', 'Ken', 'Willis Balistreri', 'Casper', '+1-351-490-8717', '2023-05-03 07:57:00', 'yZZXCqbord', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(5, 2, 'Miss Alejandra Price', 'schroeder.lacey@example.org', '$2y$10$CcpSeTygX80sJq52KPQb/.D051r0vw88ns.2EZ7PlE0ai6fuoG.B.', 'Cassie', 'Prof. Dena Kuhic', 'O\'Conner', '+1-820-630-5540', '2023-05-03 07:57:00', 'YnKuF9at9R', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(6, 2, 'Maeve Harvey', 'brando.barrows@example.com', '$2y$10$ZsaAy4a.vp59DyAAb0sbPu1qf/NwJ8FMy4SFG.7qctY90DbU6d1yK', 'Nelson', 'Cleve Cassin', 'Schmeler', '667-629-3819', '2023-05-03 07:57:00', 'vuPVfaMyLq', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(7, 2, 'Prof. Earlene Emmerich', 'owilkinson@example.net', '$2y$10$pSNR4TZxf79qwwcykmMIYuZrWDsurwZNyxiVlXKoZarkBYfBHaT4K', 'Janet', 'Moriah Leffler', 'Wisoky', '1-281-472-7068', '2023-05-03 07:57:00', 'mCPtNtLGVZ', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(8, 2, 'Dr. Jeffry Ferry', 'carolanne77@example.org', '$2y$10$q2aawdF.bXYnnl.yAEGC6uTO8QEMTqxLVdYn/0sxAsgwEdkMh6KLm', 'Maverick', 'Hallie Sipes', 'Christiansen', '1-434-201-1934', '2023-05-03 07:57:00', 'dXWLFcF8yc', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(9, 2, 'Robb Hegmann', 'agottlieb@example.com', '$2y$10$O8AVsgRxk3UWG5nLklE24Of.RaJRiXkwUhgnh4Bz4nIn0rNTrmM42', 'Geoffrey', 'Lupe Oberbrunner', 'Grant', '801-910-3451', '2023-05-03 07:57:00', 'fBoYOLdUxY', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(10, 2, 'Prof. Judson Keebler', 'funk.geovanny@example.net', '$2y$10$tVMn2WqQJ3symMtcRcfLDuaZ4qJHX7HoKj9ULTF6tOk3nAuzQY7xi', 'Briana', 'Mrs. Allison Ankunding', 'Carter', '1-484-540-4863', '2023-05-03 07:57:00', 'wE5lozTQrM', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(11, 2, 'Tressie Mohr', 'tstreich@example.com', '$2y$10$qmGrfd/KKUKSrdhxCENVNuYKdMwYpwbG6L/uC/08bhPvUayC4Ib0O', 'Jeffrey', 'Albina Walsh', 'Hamill', '703.766.5456', '2023-05-03 07:57:00', 'fdVPbYEOUR', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(12, 2, 'Guadalupe Roberts', 'schmitt.zetta@example.com', '$2y$10$NCRR2oPeUyQopwrBvXyhPO8WADdzlE2hYKSPvYVKMynVVbieFw.w2', 'Adela', 'Willis Graham', 'O\'Conner', '(316) 316-2090', '2023-05-03 07:57:00', 'w9PZj2P2OP', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(13, 2, 'Xander Roberts', 'gonzalo.bernhard@example.net', '$2y$10$aVKq5uYRNDiXmlVCqTLOpuBoVk927xtlXzpedj60JFexhupl9BgbO', 'Malvina', 'Carmel Kemmer', 'O\'Connell', '701-552-7529', '2023-05-03 07:57:00', 'JYN7daRe6J', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(14, 2, 'Zaria Kerluke MD', 'nella31@example.net', '$2y$10$W1d34kRMJ7fZ4Jx1B6MXzeldS2aOmMMdD/77MpFtn1b0HfeB.pB0y', 'Malvina', 'August Schamberger', 'Fritsch', '628-595-2783', '2023-05-03 07:57:00', 'VXk0i3bU1r', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(15, 2, 'Ms. Lavonne Hessel', 'jewell43@example.com', '$2y$10$xnC0Me/w4JD5Qqj1I7/l8O4cBFQoz8V6JWc0jOYARB4R6zI43qMLC', 'Alanis', 'Maybell Miller', 'Herzog', '534-282-6631', '2023-05-03 07:57:00', 'kHpY60o8Oa', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(16, 2, 'Ana Carroll Jr.', 'marisa97@example.org', '$2y$10$f.gvzH5W/6L1m6ebRGLIMOuwT6wsXo19ilvdm15mtpC00/PLoQju.', 'Natasha', 'Dr. Coralie Williamson IV', 'Labadie', '+1-352-693-8459', '2023-05-03 07:57:00', 'UeHfc2sC2c', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(17, 2, 'Sierra Hansen', 'ywillms@example.com', '$2y$10$L0.7gQdqyvk/KaVf6lCaw.dKYOTDaSDfcaisL0ktuVBlgPBR4uFy6', 'Reta', 'Lela Schiller', 'Schuppe', '+1-657-842-9507', '2023-05-03 07:57:00', 'SYcq8cbbA4', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(18, 2, 'Icie Stoltenberg', 'felton92@example.com', '$2y$10$uhZ/ZEmjtFApYKw8rLiWou4LR4diz8K0EDleFFNkDE7b2TDPzhHv6', 'Shaina', 'Dr. Ottilie Rippin III', 'Waters', '954-586-5389', '2023-05-03 07:57:00', 'Xi7bA8oRUL', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(19, 2, 'Vicky Maggio', 'pablo.pacocha@example.com', '$2y$10$ACuGzcbAVIR9uzS87m/Ue.eTxn2SoGKyqnE5fTJj7AUhHq3xX.eJW', 'Taya', 'Ms. Elizabeth Jones I', 'Rolfson', '+17546768682', '2023-05-03 07:57:00', 'n7Mlgl6COC', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(20, 2, 'Mr. Dell Rodriguez III', 'funk.everardo@example.org', '$2y$10$m7z1siQzKJCagMmCO3I14.RCgox/NzhOVcat.1ENazbKafebMUzA6', 'Tina', 'Therese Daniel', 'Johns', '1-615-697-8217', '2023-05-03 07:57:00', 'wvVezy48Fi', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(21, 2, 'Maymie Heidenreich Jr.', 'janae15@example.org', '$2y$10$h7vyXle2MxvInlMfFb3yneTpc3KmzcQGF2xmiJA/W2Dwp/Zj451pG', 'Morris', 'Oscar Lebsack', 'Johnston', '940.649.1595', '2023-05-03 07:57:01', 'In5QkyfIuD', '2023-05-03 07:57:01', '2023-05-03 07:57:01'),
(22, 2, 'Cesar Lakin', 'swilliamson@example.com', '$2y$10$Beer0LQrN9yazMdnq11ZkOyB7kg3OycyzMGQp5CRyqIC/h8zulhwu', 'Vito', 'Isabel Farrell', 'Kiehn', '+1.601.961.6355', '2023-05-03 07:57:01', 'vsP4kFxqyD', '2023-05-03 07:57:01', '2023-05-03 07:57:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branchs`
--
ALTER TABLE `branchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_title_unique` (`title`),
  ADD UNIQUE KEY `roles_code_unique` (`code`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_manager`
--
ALTER TABLE `seo_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_manager_locales`
--
ALTER TABLE `seo_manager_locales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_manager_translates`
--
ALTER TABLE `seo_manager_translates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branchs`
--
ALTER TABLE `branchs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `seo_manager`
--
ALTER TABLE `seo_manager`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo_manager_locales`
--
ALTER TABLE `seo_manager_locales`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seo_manager_translates`
--
ALTER TABLE `seo_manager_translates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
