-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2021 at 04:16 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_text` text NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table clients for burger';

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `message_text`, `create_date`) VALUES
(1, 3, 'test test test test test test ', '2021-01-31'),
(2, 1, '1test test test test test test ', '2021-01-31'),
(3, 2, '2. test test test test test test ', '2021-01-31'),
(4, 2, '2. test test test test test test ', '2021-01-31'),
(5, 2, 'Поле textarea представляет собой элемент формы для создания области, в которую можно вводить несколько строк текста. В отличие от тега input в текстовом поле допустимо делать переносы строк, они сохраняются при отправке данных на сервер.\r\n\r\nМежду тегами textarea и /textare можно поместить любой текст, который будет отображаться внутри поля.', '2021-01-31'),
(6, 2, 'Допустимый ресурс контекста, созданный с помощью stream_context_create () . Если вам не нужно использовать настраиваемый контекст, вы можете пропустить этот параметр с помощью null.', '2021-01-31'),
(7, 6, 'Seeking ( offset) не поддерживается для удаленных файлов. Попытка поиска в нелокальных файлах может работать с небольшими смещениями, но это непредсказуемо, потому что она работает с буферизованным потоком.', '2021-01-31'),
(8, 3, 'Максимальная длина считываемых данных. По умолчанию чтение выполняется до тех пор, пока не будет достигнут конец файла. Обратите внимание, что этот параметр применяется к потоку, обрабатываемому фильтрами.', '2021-01-31'),
(9, 6, '1 auto messageэто тестовое авто сообщение', '2021-01-31'),
(10, 1, '2 auto messageэто тестовое авто сообщение', '2021-01-31'),
(11, 6, '3 auto messageэто тестовое авто сообщение', '2021-01-31'),
(12, 5, '4 auto messageэто тестовое авто сообщение', '2021-01-31'),
(13, 3, '5 auto messageэто тестовое авто сообщение', '2021-01-31'),
(14, 6, '6 auto messageэто тестовое авто сообщение', '2021-01-31'),
(15, 1, '7 auto messageэто тестовое авто сообщение', '2021-01-31'),
(16, 4, '8 auto messageэто тестовое авто сообщение', '2021-01-31'),
(17, 1, '9 auto messageэто тестовое авто сообщение', '2021-01-31'),
(18, 3, '10 auto messageэто тестовое авто сообщение', '2021-01-31'),
(19, 1, '11 auto messageэто тестовое авто сообщение', '2021-01-31'),
(20, 4, '12 auto messageэто тестовое авто сообщение', '2021-01-31'),
(21, 6, '13 auto messageэто тестовое авто сообщение', '2021-01-31'),
(22, 5, '14 auto messageэто тестовое авто сообщение', '2021-01-31'),
(23, 5, '15 auto messageэто тестовое авто сообщение', '2021-01-31'),
(24, 6, '16 auto messageэто тестовое авто сообщение', '2021-01-31'),
(25, 4, '17 auto messageэто тестовое авто сообщение', '2021-01-31'),
(26, 1, '18 auto messageэто тестовое авто сообщение', '2021-01-31'),
(27, 1, '19 auto messageэто тестовое авто сообщение', '2021-01-31'),
(28, 2, '20 auto messageэто тестовое авто сообщение', '2021-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table clients for burger';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `create_date`) VALUES
(1, 'Taras #700', 'mailN625@md', 'a210c0b259ae3321493841fb09033a5dc0bc608e', '2021-01-30'),
(2, 'Taras #915', 'mailN19@md', 'a210c0b259ae3321493841fb09033a5dc0bc608e', '2021-01-30'),
(3, 'Алекс 1', 'sdfuerjtykhyk@gmail.com', 'e6151f2947671dd97bb9eefb575cc791cc4d312f', '2021-01-30'),
(4, 'Алекс 2', 'sdfuerjtykhyk1@gmail.com', 'e6151f2947671dd97bb9eefb575cc791cc4d312f', '2021-01-30'),
(5, 'Алекс 3', 'sdfuerjtykhyk2@gmail.com', 'e6151f2947671dd97bb9eefb575cc791cc4d312f', '2021-01-30'),
(6, 'Алекс 4', 'sdfuerjtykhyk3@gmail.com', 'e6151f2947671dd97bb9eefb575cc791cc4d312f', '2021-01-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
