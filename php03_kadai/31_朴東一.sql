-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_kadai_table`
--

CREATE TABLE `gs_kadai_table` (
  `id` int(12) NOT NULL,
  `title` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_kadai_table`
--

INSERT INTO `gs_kadai_table` (`id`, `title`, `url`, `comment`, `date`) VALUES
(1, 'A', 'B', 'C', '2020-10-22 14:42:51'),
(2, '', '', '', '2020-10-22 14:46:47'),
(3, 'hjk', 'bnm', '', '2020-10-22 16:22:58'),
(4, 'hjk', 'jkl', '', '2020-10-22 16:36:15'),
(5, 'sdf', 'df', 'dfgh', '2020-10-22 16:56:40'),
(6, 'asd', 'asd', 'sdf', '2020-10-22 16:57:38');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_kadai_table`
--
ALTER TABLE `gs_kadai_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_kadai_table`
--
ALTER TABLE `gs_kadai_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
