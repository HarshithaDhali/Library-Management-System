-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 12:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `type`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `bookpic` varchar(25) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `bookdescription` varchar(150) NOT NULL,
  `bookauthor` varchar(25) NOT NULL,
  `bookpublication` varchar(50) NOT NULL,
  `bookprice` int(11) NOT NULL,
  `bookquantity` int(11) NOT NULL,
  `bookavailable` int(11) NOT NULL,
  `bookrented` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `bookpic`, `bookname`, `bookdescription`, `bookauthor`, `bookpublication`, `bookprice`, `bookquantity`, `bookavailable`, `bookrented`) VALUES
(1, 'management.jpg', 'management and entreprenaurship for IT industry', 'It elaborates on the importance of organizing and staffing and directing and controlling.', 'vandana gupta', 'technical publication', 280, 3, 3, 0),
(2, 'DBMS.png', 'DataBase Management System', ' Provide a strong foundation in database concepts, technology, and practice.', 'AA puttambekar', 'technical publication', 430, 4, 4, 0),
(3, 'cn.png', 'computer networking', 'Computer Networks contains Principles of Network Applications', 'james f kurose', 'pearson education', 450, 5, 5, 0),
(4, 'atc.jpg', 'Automata theory and compability', 'Develop skills in formal reasoning and reduction of a problem to a formal model, with an emphasis on semantic precision and conciseness', 'AM padma reddy', 'sri nandi publications', 420, 4, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `fineid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`fineid`, `name`, `remark`, `amount`, `status`) VALUES
(1, 'tashif', 'lost book', 100, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `issuedbook` varchar(50) NOT NULL,
  `issuetype` varchar(25) NOT NULL,
  `issuedays` int(11) NOT NULL,
  `issuedate` varchar(25) NOT NULL,
  `issuereturn` varchar(25) NOT NULL,
  `fine` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`id`, `userid`, `name`, `issuedbook`, `issuetype`, `issuedays`, `issuedate`, `issuereturn`, `fine`, `status`) VALUES
(1, 1, 'tashif', 'DataBase Management System', 'student', 2, '02/01/2023', '04/01/2023', 100, 'returned'),
(2, 1, 'tashif', 'DataBase Management System', 'student', 3, '09/01/2023', '12/01/2023', 100, 'returned'),
(3, 1, 'tashif', 'computer networking', 'student', 7, '09/01/2023', '16/01/2023', 0, 'returned');

-- --------------------------------------------------------

--
-- Table structure for table `rentedbook`
--

CREATE TABLE `rentedbook` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `issuedbook` varchar(50) NOT NULL,
  `issuetype` varchar(25) NOT NULL,
  `issuedays` int(11) NOT NULL,
  `issuedate` varchar(25) NOT NULL,
  `issuereturn` varchar(25) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requestbook`
--

CREATE TABLE `requestbook` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `usertype` varchar(25) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `issuedays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returnrequest`
--

CREATE TABLE `returnrequest` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `issuedbook` varchar(120) NOT NULL,
  `issuetype` varchar(50) NOT NULL,
  `issuedays` int(11) NOT NULL,
  `issuedate` varchar(50) NOT NULL,
  `issuereturn` varchar(50) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userid`, `name`, `email`, `password`, `type`) VALUES
(1, 'tashif', 'tashifmanna@yahoo.com', '12345', 'student'),
(2, 'manna', 'tashifmanna@gmail.com', 'qwerty', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`fineid`);

--
-- Indexes for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentedbook`
--
ALTER TABLE `rentedbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestbook`
--
ALTER TABLE `requestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returnrequest`
--
ALTER TABLE `returnrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
  MODIFY `fineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issuebook`
--
ALTER TABLE `issuebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rentedbook`
--
ALTER TABLE `rentedbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requestbook`
--
ALTER TABLE `requestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `returnrequest`
--
ALTER TABLE `returnrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
