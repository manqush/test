-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2022 at 03:56 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'abduallah', '123');

-- --------------------------------------------------------

--
-- Table structure for table `main_que`
--

CREATE TABLE `main_que` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_que`
--

INSERT INTO `main_que` (`id`, `title`, `num`, `mark`) VALUES
('6272ca5dc19cf', 'تم تعديل العنوان 2', '2', '40'),
('6272cb0aa477d', 'اختبار رقم 2', '2', '40'),
('6272cb4935c1e', 'اختبار رقم 3', '3', '30');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `username` varchar(255) NOT NULL,
  `id_que` varchar(255) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`username`, `id_que`, `mark`) VALUES
('e', '6272cb4935c1e', 30),
('e', '6272ca5dc19cf', 0),
('صالح', '6272ca5dc19cf', 40),
('محمد', '6272ca5dc19cf', 40),
('محمد', '6272cb0aa477d', 40),
('محمد', '6272cb4935c1e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(3) NOT NULL,
  `id_que` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `anser` int(3) NOT NULL,
  `n` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `id_que`, `title`, `option1`, `option2`, `option3`, `option4`, `anser`, `n`) VALUES
(14, '6272ca5dc19cf', 'السؤال الاول تعديل', 'تعديل', 'تعديل2', 'تعديل', 'تعديل4', 1, 1),
(15, '6272ca5dc19cf', 'السؤال الثاني تعديل', 'تعديل1', 'تعديل', 'تعديل3', 'تعديل 4', 1, 2),
(16, '6272cb0aa477d', 'السؤال الاول', 'اختيار 1', 'صحيح', 'اختيار 3', 'اختيار 4', 2, 1),
(17, '6272cb0aa477d', 'السؤال الثاني', 'اختيار 1', 'اختيار 2', 'صحيح', 'اختيار 4', 3, 2),
(18, '6272cb4935c1e', 'السؤال الاول', 'صحيح', 'اختيار 2', 'اختيار 3', 'اختيار 4', 1, 1),
(19, '6272cb4935c1e', 'السؤال الثاني', 'اختيار 1', 'صحيح', 'اختيار 3', 'اختيار 4', 1, 2),
(20, '6272cb4935c1e', 'السؤال الثالث', 'اختيار 1', 'اختيار 2', 'صحيح', 'اختيار 4', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `num_test` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `num_test`, `mark`) VALUES
(27, 'e', 'عبدالله يوسف محمد', 'abduallah@a.com', '$2y$10$2WD/oFIZAanCMpPdI6j4VuFX1mfLi61xBFN/DzE1BIxBHBLY3hn32', 0, 0),
(28, 'w', 'عبدالله يوسف محمد', 'abduallah@a.com', '$2y$10$P9nc1bS9nFYERwnsdpuzo.fMniurjZ4L0rOvAN.BSrfi6K1ExRomy', 0, 0),
(29, 'صالح', 'صالح محمد صالح', 'gglr@fgg.com', '$2y$10$W.KxIslg2g.xkOUQyOxD4OH8iFXRAnEIObEo1OK4p28Zu1Y/kYnXK', 0, 0),
(30, 'محمد', 'محمد احمد علي', 'a@a.com', '$2y$10$fXOpVChw8SxyzvsWOy3qU.ZxGx9IhpdA3RzcrN2b1AAe/POQT226.', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
