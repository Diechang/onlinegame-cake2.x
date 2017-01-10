-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2017 年 1 月 10 日 23:23
-- サーバのバージョン： 5.6.33
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `diechang_dzgame_test`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `titleads`
--

CREATE TABLE `titleads` (
  `id` int(8) NOT NULL COMMENT 'ID',
  `title_id` int(8) NOT NULL COMMENT 'タイトルID',
  `pc_text_src` text COLLATE utf8_unicode_ci COMMENT 'PCテキスト広告',
  `pc_image_src` text COLLATE utf8_unicode_ci COMMENT 'PCイメージ広告',
  `pc_part_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'PC広告URL',
  `pc_part_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'PC広告テキスト',
  `pc_part_img_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'PC広告画像src',
  `pc_part_track_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'PC広告トラッキングsrc',
  `pc_start` datetime DEFAULT NULL COMMENT 'PC広告開始日',
  `pc_end` datetime DEFAULT NULL COMMENT 'PC広告終了日',
  `pc_noredirect` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'PCリダイレクト不可',
  `sp_text_src` text COLLATE utf8_unicode_ci COMMENT 'スマホテキスト広告',
  `sp_image_src` text COLLATE utf8_unicode_ci COMMENT 'スマホイメージ広告',
  `sp_part_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'スマホ広告URL',
  `sp_part_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'スマホ広告テキスト',
  `sp_part_img_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'スマホ広告画像src',
  `sp_part_track_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'スマホ広告トラッキングsrc',
  `sp_start` datetime DEFAULT NULL COMMENT 'スマホ広告開始日',
  `sp_end` datetime DEFAULT NULL COMMENT 'スマホ広告終了日',
  `sp_noredirect` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'スマホリダイレクト不可',
  `ios_text_src` text COLLATE utf8_unicode_ci COMMENT 'iOSテキスト広告',
  `ios_image_src` text COLLATE utf8_unicode_ci COMMENT 'iOSイメージ広告',
  `ios_part_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'iOS広告URL',
  `ios_part_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'iOS広告テキスト',
  `ios_part_img_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'iOS広告画像src',
  `ios_part_track_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'iOS広告トラッキングsrc',
  `ios_start` datetime DEFAULT NULL COMMENT 'iOS広告開始日',
  `ios_end` datetime DEFAULT NULL COMMENT 'iOS広告終了日',
  `ios_noredirect` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'iOSリダイレクト不可',
  `android_text_src` text COLLATE utf8_unicode_ci COMMENT 'Androidテキスト広告',
  `android_image_src` text COLLATE utf8_unicode_ci COMMENT 'Androidイメージ広告',
  `android_part_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Android広告URL',
  `android_part_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Android広告テキスト',
  `android_part_img_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Android広告画像src',
  `android_part_track_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Android広告トラッキングsrc',
  `android_start` datetime DEFAULT NULL COMMENT 'Android広告開始日',
  `android_end` datetime DEFAULT NULL COMMENT 'Android広告終了日',
  `android_noredirect` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Androidリダイレクト不可'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `titleads`
--
ALTER TABLE `titleads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title_id` (`title_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `titleads`
--
ALTER TABLE `titleads`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID';