-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2017 年 1 月 04 日 17:43
-- サーバのバージョン： 5.6.33
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diechang_dzgame_test`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `platforms`
--

CREATE TABLE `platforms` (
  `id` tinyint(4) NOT NULL COMMENT 'ID',
  `public` tinyint(1) NOT NULL DEFAULT '1' COMMENT '公開フラグ',
  `str` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '文字列',
  `str_sub` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'サブ文字列',
  `description` text COLLATE utf8_unicode_ci COMMENT '概要',
  `path` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'パス',
  `sort` int(4) NOT NULL COMMENT 'ソート'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `platforms_titles`
--

CREATE TABLE `platforms_titles` (
  `platform_id` int(4) NOT NULL COMMENT 'プラットフォームID',
  `title_id` int(4) NOT NULL COMMENT 'タイトルID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platforms_titles`
--
ALTER TABLE `platforms_titles`
  ADD KEY `platform_id` (`platform_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
