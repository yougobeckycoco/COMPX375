-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 02, 2021 at 08:02 AM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `newland`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`) VALUES
('jwang89');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `username` varchar(20) NOT NULL,
  `property_id` int(5) NOT NULL,
  `purpose_of_stay` varchar(50) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`username`, `property_id`, `purpose_of_stay`, `occupation`, `start_date`, `end_date`) VALUES
('jdoe', 1, 'Work', 'Software Engineer', '2021-11-11', '2021-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`username`) VALUES
('danny03'),
('eris'),
('jam98'),
('jdoe'),
('jdough81'),
('lenny_5'),
('yesjess6');

-- --------------------------------------------------------

--
-- Table structure for table `client_rating`
--

CREATE TABLE `client_rating` (
  `rating_id` int(5) NOT NULL,
  `property_id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `damage_rating` int(1) NOT NULL,
  `payment_rating` int(1) NOT NULL,
  `tidiness_rating` int(1) NOT NULL,
  `comment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_rating`
--

INSERT INTO `client_rating` (`rating_id`, `property_id`, `username`, `damage_rating`, `payment_rating`, `tidiness_rating`, `comment`) VALUES
(1, 1, 'jam98', 5, 4, 4, 'none'),
(3, 1, 'lenny_5', 5, 5, 3, 'none'),
(4, 1, 'eris', 1, 1, 1, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `title` varchar(50) NOT NULL,
  `datetime` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(5) NOT NULL,
  `address` varchar(20) NOT NULL,
  `property_condition` varchar(50) NOT NULL,
  `revenue_year` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `address`, `property_condition`, `revenue_year`) VALUES
(1, '12 Tranmere Road', 'No Damage, Occupied', 21000);

-- --------------------------------------------------------

--
-- Table structure for table `property_rating`
--

CREATE TABLE `property_rating` (
  `rating_id` int(5) NOT NULL,
  `property_id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `rating` varchar(1) NOT NULL,
  `comments` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_rating`
--

INSERT INTO `property_rating` (`rating_id`, `property_id`, `username`, `rating`, `comments`) VALUES
(1, 1, 'jam98', '4', 'Clean'),
(2, 1, 'yesjess6', '5', 'Awesome place');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `fname`, `lname`, `email`, `phone`, `password`) VALUES
('danny03', 'Danny', 'Hanson', 'dannyhanson@gmail.com', 27644325, 'test'),
('dupyjam', 'Quincy', 'Downs', 'buhice@mailinator.com', 1, 'Pa$$w0rd!'),
('eris', 'Peter', 'Davis', 'eris@gmail.com', 211235699, 'test'),
('jam98', 'Jacob', 'Mitchell', 'jam@gmail.com', 277552588, 'test'),
('jdoe', 'John', 'Doe', 'jdoe02', 213443355, 'test'),
('jdough81', 'Jane', 'Dough', 'jdough@gmail.com', 215663611, 'test'),
('jwang89', 'Jerry', 'Wang', 'jerrywang89@gmail.com', 213442188, 'admin'),
('lenny_5', 'Liam', 'Godwin', 'lenny5@gmail.com', 275883921, 'test'),
('test', 'test', 'test', 'test@test.com', 99561894, 'test'),
('yesjess6', 'Jess', 'Godwin', 'jessgodwin@gmail.com', 275643232, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`username`,`property_id`),
  ADD KEY `booking_property_property_id` (`property_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `client_rating`
--
ALTER TABLE `client_rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `property_rating`
--
ALTER TABLE `property_rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_rating`
--
ALTER TABLE `client_rating`
  MODIFY `rating_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `property_rating`
--
ALTER TABLE `property_rating`
  MODIFY `rating_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_user_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_property_property_id` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`),
  ADD CONSTRAINT `booking_user_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_user_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `client_rating`
--
ALTER TABLE `client_rating`
  ADD CONSTRAINT `client_rating_property_property_id` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`),
  ADD CONSTRAINT `client_rating_user_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `property_rating`
--
ALTER TABLE `property_rating`
  ADD CONSTRAINT `property_rating_property_property_id` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`);
