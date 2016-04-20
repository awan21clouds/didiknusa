-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2016 at 05:44 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `didik_bangsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `bank_id` varchar(100) NOT NULL,
  `detail` text,
  `account` text,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `detail`, `account`, `status`) VALUES
('1122016041509563763', 'Mandiri', '1111 1111 1111 1111', 0),
('1122016041509565956', 'BNI', '3333 3333 3333 3333', 0),
('1122016041509571217', 'BCA', '4444 4444 4444 4444', 0),
('1122016041510232222', 'BRI', '2222 2222 2222 2222', 0),
('1122016041510234431', 'BTN', '5555 5555 5555 5555', 0),
('1122016041616493228', 'Danamon', '6666 6666 6666 6666', 0);

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE IF NOT EXISTS `confirmation` (
  `confirmation_id` varchar(200) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `transaction_id` varchar(200) DEFAULT NULL,
  `bank_id` varchar(200) DEFAULT NULL,
  `name` text,
  `account` text,
  `bank` text,
  `total` int(12) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirmation`
--

INSERT INTO `confirmation` (`confirmation_id`, `payment_date`, `created`, `transaction_id`, `bank_id`, `name`, `account`, `bank`, `total`, `note`) VALUES
('1172016041814041588', '2016-04-18', '2016-04-18 14:04:15', '1152016041809221171', '1122016041509563763', 'Ramona', '111111111111111', 'Mandiri', 1000000, NULL),
('1172016041909150971', '2016-04-19', '2016-04-19 09:15:09', '1152016041909142332', '1122016041509563763', 'Juliet', '111111111111111', 'Mandiri', 500000, NULL),
('1172016041911461438', '2016-04-19', '2016-04-19 11:46:14', '1152016041911452933', '1122016041509563763', 'Ramona', '111111111111111', 'Mandiri', 500000, NULL),
('1172016041911464910', '2016-04-19', '2016-04-19 11:46:49', '1152016041911452933', '1122016041509563763', 'Ramona', '111111111111111', 'Mandiri', 300000, NULL),
('1172016041911514418', '2016-04-19', '2016-04-19 11:51:44', '1152016041911510323', '1122016041509563763', 'louis', '111111111111111', 'Mandiri', 100000, NULL),
('1172016042005594374', '2016-04-20', '2016-04-20 05:59:43', '1152016041809511646', '1122016041509563763', 'Ramona', '111111111111111', 'Mandiri', 400000, NULL),
('1172016042006225785', '2016-04-20', '2016-04-20 06:22:57', '1152016041809344569', '1122016041509563763', 'Ramona', '111111111111111', 'Mandiri', 100811, 'Sudah transfer'),
('1172016042006281713', '2016-04-20', '2016-04-20 06:28:17', '1152016041809511646', '1122016041509563763', 'louis', '111111111111111', 'Mandiri', 400534, 'Sudah transfer'),
('1172016042006294220', '2016-04-20', '2016-04-20 06:29:42', '1152016042006270553', '1122016041509563763', 'louis', '111111111111111', 'Mandiri', 100693, 'Sudah transfer'),
('1172016042009145195', '2016-04-20', '2016-04-20 09:14:51', '1152016042008431828', '1122016041509563763', 'Ramona', '111111111111111', 'Mandiri', 1000780, ''),
('1172016042009191212', '2016-04-20', '2016-04-20 09:19:12', '1152016042009182658', '1122016041509563763', 'Awan', '111111111111111', 'Mandiri', 5000922, '');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE IF NOT EXISTS `credit` (
  `credit_id` varchar(100) NOT NULL,
  `total` text,
  `transaction_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`credit_id`, `total`, `transaction_id`) VALUES
('1182016041816540717', '164', '1152016041816540764'),
('1182016041909155235', '382', '1152016041909155247'),
('1182016041911473742', '236', '1152016041911473745'),
('1182016041911530357', '116', '1152016041911530359'),
('1182016042006303136', '693', '1152016042006303135'),
('1182016042006303369', '534', '1152016042006303387'),
('1182016042009164165', '780', '1152016042009164116'),
('1182016042009201063', '922', '1152016042009201076');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `donation_id` varchar(100) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `random` int(3) DEFAULT NULL,
  `scholarship_id` varchar(100) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `total`, `random`, `scholarship_id`, `transaction_id`) VALUES
('1162016041809221137', 1000000, 164, '1132016041722142173', '1152016041809221171'),
('1162016041809344584', 100000, 811, '1132016041722142173', '1152016041809344569'),
('1162016041809511670', 400000, 534, '1132016041715495150', '1152016041809511646'),
('1162016041909142333', 500000, 382, '1132016041722142173', '1152016041909142332'),
('1162016041911452980', 300000, 236, '1132016041722142173', '1152016041911452933'),
('1162016041911510349', 100000, 116, '1132016041722142173', '1152016041911510323'),
('1162016042006270594', 100000, 693, '1132016041715292829', '1152016042006270553'),
('1162016042006271246', 200000, 479, '1132016041715495150', '1152016042006271282'),
('1162016042008431856', 1000000, 780, '1132016041722142173', '1152016042008431828'),
('1162016042009182629', 5000000, 922, '1132016041722142173', '1152016042009182658');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `lat` text,
  `lng` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `detail`, `lat`, `lng`) VALUES
('0', '-', '-', '-'),
('1112016041423574310', 'Bojongsoang, Bandung', '-7.0037585', '107.64781820000007'),
('1112016041500511062', 'Lembong, Bandung', '-6.9178223', '107.61260270000002'),
('1112016041508472550', 'Sukapura Bandung', '-6.9699811', '107.62893069999996');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` varchar(100) NOT NULL,
  `name` text,
  `phone` text,
  `email` text,
  `photo` text,
  `biography` text,
  `last_login` datetime DEFAULT NULL,
  `register_date` datetime DEFAULT NULL,
  `password` text,
  `status` tinyint(1) DEFAULT NULL,
  `location_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `phone`, `email`, `photo`, `biography`, `last_login`, `register_date`, `password`, `status`, `location_id`) VALUES
('1242016040907543682', 'Ramona', '123', 'ramona@email.com', 'public/adminLTE/dist/img/13476.png', NULL, NULL, '2016-04-09 00:54:36', '202cb962ac59075b964b07152d234b70', 0, '0'),
('1242016040907544527', 'John', '6285742926200', 'johny@email.com', 'public/adminLTE/dist/img/70751.png', 'Bissmillahirahmanirahim', NULL, '2016-04-09 00:54:45', '024d7f84fff11dd7e8d9c510137a2381', 1, '1112016041423574310'),
('1242016040907593665', 'neo', '123', 'neo@gmail.com', 'public/adminLTE/dist/img/19802.png', 'Biografi', NULL, '2016-04-09 00:59:36', '202cb962ac59075b964b07152d234b70', 0, '1112016041423574310'),
('1242016041112502243', 'Fahmi', '85742926207', 'rizqyfahmi@gmail.com', 'public/adminLTE/dist/img/default.png', NULL, NULL, '2016-04-11 05:50:22', 'f11d50d63d3891a44c332e46d6d7d561', 1, '0'),
('1242016041408064427', 'Luis', '12345', 'luis@email.com', 'public/adminLTE/dist/img/22482.png', NULL, NULL, '2016-04-14 01:06:44', '202cb962ac59075b964b07152d234b70', 0, '0'),
('1242016042008354046', 'awan', '6285742926207', 'awanrmb@gmail.com', 'public/adminLTE/dist/img/62310.png', NULL, NULL, '2016-04-20 01:35:41', '16ab6e6b9f057e162d5a135022ff5b25', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE IF NOT EXISTS `scholarship` (
  `scholarship_id` varchar(100) NOT NULL,
  `student_name` text,
  `deadline` date DEFAULT NULL,
  `picture` text,
  `video` text,
  `short_description` text,
  `long_description` text,
  `created` datetime DEFAULT NULL,
  `location_id` varchar(100) DEFAULT NULL,
  `member_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`scholarship_id`, `student_name`, `deadline`, `picture`, `video`, `short_description`, `long_description`, `created`, `location_id`, `member_id`) VALUES
('1132016041715182798', 'Joseph', '2016-04-27', NULL, 'https://www.youtube.com/watch?v=fRh_vgS2dFE', 'sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue|ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vita', 'sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue|ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vita', '2016-04-17 08:18:28', '1112016041423574310', '1242016040907543682'),
('1132016041715292829', 'Mark', '2016-04-23', 'public/adminLTE/dist/img/93505.jpg', 'https://www.youtube.com/watch?v=fRh_vgS2dFE', 'sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue|ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vita', 'sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue|ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vita', '2016-04-17 08:29:28', '0', '1242016040907543682'),
('1132016041715495150', 'Nana', '2016-04-30', NULL, 'https://www.youtube.com/watch?v=fRh_vgS2dFE', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.', '2016-04-17 15:49:51', '0', '1242016040907543682'),
('1132016041722142173', 'Brian', '2016-04-28', NULL, 'https://www.youtube.com/watch?v=fRh_vgS2dFE', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.', '2016-04-17 22:14:21', '0', '1242016040907593665'),
('1132016042008563486', 'Ali Yusup', '2016-04-20', 'public/adminLTE/dist/img/97905.png', '', 'sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue|ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vita', 'sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue|ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vita', '2016-04-20 08:56:34', '1112016041423574310', '1242016042008354046');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_variable`
--

CREATE TABLE IF NOT EXISTS `scholarship_variable` (
  `scholarship_variable_id` varchar(100) NOT NULL,
  `label` text,
  `total` int(11) DEFAULT '0',
  `scholarship_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholarship_variable`
--

INSERT INTO `scholarship_variable` (`scholarship_variable_id`, `label`, `total`, `scholarship_id`) VALUES
('1142016041715182716', 'Uang Saku', 1000000, '1132016041715182798'),
('1142016041715292866', 'SPP', 5000000, '1132016041715292829'),
('1142016041715292886', 'Uang Saku', 1000000, '1132016041715292829'),
('1142016041715495164', 'Uang Saku', 1000000, '1132016041715495150'),
('1142016041722142124', 'Uang Saku', 5000000, '1132016041722142173'),
('1142016042008563442', 'SPP', 500, '1132016042008563486'),
('1142016042008563448', 'Uang Saku', 100, '1132016042008563486');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `transaction_detail_id` int(1) DEFAULT NULL,
  `transaction_status_id` int(1) DEFAULT NULL,
  `member_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `created`, `transaction_detail_id`, `transaction_status_id`, `member_id`) VALUES
('1152016041809035562', '2016-04-18 09:03:55', 0, 0, '1242016040907593665'),
('1152016041809221171', '2016-04-18 09:22:11', 0, 2, '1242016040907593665'),
('1152016041809344569', '2016-04-18 09:34:45', 0, 0, '1242016040907593665'),
('1152016041809511646', '2016-04-18 09:51:16', 0, 2, '1242016041408064427'),
('1152016041816540764', '2016-04-18 16:54:07', 1, 2, '1242016040907593665'),
('1152016041909142332', '2016-04-19 09:14:23', 0, 2, '1242016040907593665'),
('1152016041909155247', '2016-04-19 09:15:52', 1, 2, '1242016040907593665'),
('1152016041911452933', '2016-04-19 11:45:29', 0, 2, '1242016040907543682'),
('1152016041911473745', '2016-04-19 11:47:37', 1, 2, '1242016040907593665'),
('1152016041911510323', '2016-04-19 11:51:03', 0, 2, '1242016041408064427'),
('1152016041911530359', '2016-04-19 11:53:03', 1, 2, '1242016040907593665'),
('1152016042006270553', '2016-04-20 06:27:05', 0, 2, '1242016041408064427'),
('1152016042006271282', '2016-04-20 06:27:12', 0, 0, '1242016041408064427'),
('1152016042006303135', '2016-04-20 06:30:31', 1, 2, '1242016040907543682'),
('1152016042006303387', '2016-04-20 06:30:33', 1, 2, '1242016040907543682'),
('1152016042008431828', '2016-04-20 08:43:18', 0, 2, '1242016042008354046'),
('1152016042009164116', '2016-04-20 09:16:41', 1, 2, '1242016040907593665'),
('1152016042009182658', '2016-04-20 09:18:26', 0, 2, '1242016042008354046'),
('1152016042009201076', '2016-04-20 09:20:10', 1, 2, '1242016040907593665');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE IF NOT EXISTS `transaction_detail` (
  `transaction_detail_id` int(1) NOT NULL,
  `detail` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`transaction_detail_id`, `detail`) VALUES
(0, 'donasi'),
(1, 'kredit');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_status`
--

CREATE TABLE IF NOT EXISTS `transaction_status` (
  `transaction_status_id` int(1) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_status`
--

INSERT INTO `transaction_status` (`transaction_status_id`, `detail`) VALUES
(0, 'Menunggu Konfirmasi Pembayaran'),
(1, 'Dalam Proses Verifikasi'),
(2, 'Donasi Telah Diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`),
  ADD KEY `payment_method_id` (`status`);

--
-- Indexes for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD KEY `transaction_id` (`transaction_id`,`bank_id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`credit_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `scholarship_id` (`scholarship_id`,`transaction_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`scholarship_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `scholarship_variable`
--
ALTER TABLE `scholarship_variable`
  ADD PRIMARY KEY (`scholarship_variable_id`),
  ADD KEY `scholarship_id` (`scholarship_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `transaction_detail_id` (`transaction_detail_id`),
  ADD KEY `transaction_status_id` (`transaction_status_id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`transaction_detail_id`);

--
-- Indexes for table `transaction_status`
--
ALTER TABLE `transaction_status`
  ADD PRIMARY KEY (`transaction_status_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD CONSTRAINT `confirmation_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `confirmation_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`bank_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit`
--
ALTER TABLE `credit`
  ADD CONSTRAINT `credit_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`scholarship_id`) REFERENCES `scholarship` (`scholarship_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD CONSTRAINT `scholarship_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scholarship_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scholarship_variable`
--
ALTER TABLE `scholarship_variable`
  ADD CONSTRAINT `scholarship_variable_ibfk_1` FOREIGN KEY (`scholarship_id`) REFERENCES `scholarship` (`scholarship_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`transaction_detail_id`) REFERENCES `transaction_detail` (`transaction_detail_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`transaction_status_id`) REFERENCES `transaction_status` (`transaction_status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
