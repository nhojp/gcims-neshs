-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 07:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guideco2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `created_at`, `first_name`, `middle_name`, `last_name`, `position`, `picture`, `birthdate`, `sex`, `contact_number`, `address`) VALUES
(2, 'jpaulmar', 'john14manjac', 'johnpaulmarmanjac@gmail.com', '2024-07-18 13:02:12', 'john paulmar', 'lontoc', 'manjac', 'Developer/Creator', NULL, '2003-07-14', 'Male', '09304365359', 'sampaga balayan batangas'),
(3, 'pau', '12345', 'haha@gmail.com', '2024-10-27 07:12:29', 'Ferdinand Paulo', 'Felices', 'Sacdalan', 'Front End', NULL, '2002-01-12', 'Male', '345678922', 'Toong Tuy Batangas'),
(4, 'juspher', '1234', NULL, '2024-10-27 07:52:20', 'Juspher', NULL, 'Pedraza', 'Senior Developer', NULL, NULL, NULL, NULL, NULL),
(5, 'jay', '1234', 'jaybautista19@gmail.com', '2024-10-28 01:37:37', 'Jay', '', 'Bautista', 'Guidance Counselor', NULL, '1980-01-14', 'Male', '0966571618', 'Nasugbu, Batangas');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `victimFirstName` varchar(255) DEFAULT NULL,
  `victimMiddleName` varchar(255) DEFAULT NULL,
  `victimLastName` varchar(255) DEFAULT NULL,
  `victimDOB` date DEFAULT NULL,
  `victimAge` int(11) DEFAULT NULL,
  `victimSex` varchar(10) DEFAULT NULL,
  `victimGrade` varchar(50) DEFAULT NULL,
  `victimSection` varchar(50) DEFAULT NULL,
  `victimAdviser` varchar(255) DEFAULT NULL,
  `victimContact` varchar(50) DEFAULT NULL,
  `victimAddress` text DEFAULT NULL,
  `motherName` varchar(255) DEFAULT NULL,
  `motherOccupation` varchar(255) DEFAULT NULL,
  `motherAddress` text DEFAULT NULL,
  `motherContact` varchar(50) DEFAULT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `fatherOccupation` varchar(255) DEFAULT NULL,
  `fatherAddress` text DEFAULT NULL,
  `fatherContact` varchar(50) DEFAULT NULL,
  `complainantFirstName` varchar(255) DEFAULT NULL,
  `complainantMiddleName` varchar(255) DEFAULT NULL,
  `complainantLastName` varchar(255) DEFAULT NULL,
  `relationshipToVictim` varchar(255) DEFAULT NULL,
  `complainantContact` varchar(50) DEFAULT NULL,
  `complainantAddress` text DEFAULT NULL,
  `complainedFirstName` varchar(255) DEFAULT NULL,
  `complainedMiddleName` varchar(255) DEFAULT NULL,
  `complainedLastName` varchar(255) DEFAULT NULL,
  `complainedDOB` date DEFAULT NULL,
  `complainedAge` int(11) DEFAULT NULL,
  `complainedSex` varchar(10) DEFAULT NULL,
  `complainedDesignation` varchar(100) DEFAULT NULL,
  `complainedGrade` varchar(50) DEFAULT NULL,
  `complainedSection` varchar(50) DEFAULT NULL,
  `complainedAdviser` varchar(255) DEFAULT NULL,
  `complainedContact` varchar(50) DEFAULT NULL,
  `complainedAddress` text DEFAULT NULL,
  `caseDetails` text DEFAULT NULL,
  `actionTaken` text DEFAULT NULL,
  `recommendations` text DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  `status` enum('Pending','Complete') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `victimFirstName`, `victimMiddleName`, `victimLastName`, `victimDOB`, `victimAge`, `victimSex`, `victimGrade`, `victimSection`, `victimAdviser`, `victimContact`, `victimAddress`, `motherName`, `motherOccupation`, `motherAddress`, `motherContact`, `fatherName`, `fatherOccupation`, `fatherAddress`, `fatherContact`, `complainantFirstName`, `complainantMiddleName`, `complainantLastName`, `relationshipToVictim`, `complainantContact`, `complainantAddress`, `complainedFirstName`, `complainedMiddleName`, `complainedLastName`, `complainedDOB`, `complainedAge`, `complainedSex`, `complainedDesignation`, `complainedGrade`, `complainedSection`, `complainedAdviser`, `complainedContact`, `complainedAddress`, `caseDetails`, `actionTaken`, `recommendations`, `teacher_id`, `status`) VALUES
(43, 'John Paulmar', 'sada', 'manjac', '2003-07-14', 21, 'Male', '12', 'Drucker', 'maria an busilig', NULL, NULL, 'Asd', 'Asd', 'Asd', '09304365359', 'Asdsd', 'Asd', 'Asdas', '09871239871', 'mbn', 'bnm', 'nbm', 'bnm', '09999999999', 'nbm', 'fritch', 'Marie', 'cortez', '1985-05-10', 39, 'Male', 'Teacher', NULL, NULL, NULL, '09123456789', 'Tuy, Batangas', 'bnm', 'bnm', 'bnm', 46, 'Pending'),
(45, 'John Paulmar', 'lontoc', 'Manjac', '2003-07-14', 21, 'Male', '12', 'Lovelace', 'gracele cabrera', NULL, NULL, 'Mylene Manjac', 'Agent', 'Sampaga Balayan Batangas', '09995533777', 'Apolinar Manjac', 'Welder', 'Sampaga Balayan Batangas', '09871239871', 'ferdi', 'axs', 'sacdalan', 'friend', '09128366781', 'tuy batangas', 'maria an', 'Lynn', 'busilig', '1988-07-20', 36, 'Female', 'Teacher', NULL, NULL, NULL, '09123456781', 'Lian, Batangas', 'sinakal', 'counsel at the guidance office', 'respect each other', 49, 'Complete'),
(46, 'ferdinand', 'felices', 'sacdalan', '2002-07-13', 22, 'Male', '11', 'Gates', 'Lamei Ann Butiong', NULL, NULL, 'Melinda Felices', 'Businesswoman', 'Quezon City Manila', '09304365358', 'Pedro Paterno', 'Lawyer', 'Quezon City Manila', '09871239871', 'asda', 'asdasd', 'asdasd', 'asdasd', '09123123451', 'sampaga balayan batangas', 'fritch', 'Marie', 'cortez', '1985-05-10', 39, 'Female', 'Teacher', NULL, NULL, NULL, '09123456783', 'Tuy, Batangas', 'asdax', 'asxa', 'asdax', 46, 'Complete'),
(52, 'magicasd', 'asd', 'asd', '2003-07-14', 21, 'Male', '11', 'sad', 'asxaz', NULL, NULL, 'Asxasdasd', 'Axasad', 'Zxcasda', '09999999999', 'Qsadsqz', 'Zxcasda', 'Zxcasadas', '09999999999', 'dasdzx', 'azxczx', 'czxczxc', 'ascaczxc', '09999999999', 'asdasd', 'asdasd', 'asxsax', 'zxqasxa', '2003-07-14', 21, 'Male', 'asdqad', NULL, NULL, NULL, '09999999999', 'sampaga balayan batangas', 'dwqdas', 'dqsas', 'asdwqd', 0, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `complaints_student`
--

CREATE TABLE `complaints_student` (
  `id` int(11) NOT NULL,
  `victimFirstName` varchar(255) DEFAULT NULL,
  `victimMiddleName` varchar(255) DEFAULT NULL,
  `victimLastName` varchar(255) DEFAULT NULL,
  `victimDOB` date DEFAULT NULL,
  `victimAge` int(11) DEFAULT NULL,
  `victimSex` enum('Male','Female','Other') DEFAULT NULL,
  `victimGrade` varchar(50) DEFAULT NULL,
  `victimSection` varchar(50) DEFAULT NULL,
  `victimAdviser` varchar(255) DEFAULT NULL,
  `victimContact` varchar(20) DEFAULT NULL,
  `victimAddress` text DEFAULT NULL,
  `motherName` varchar(255) DEFAULT NULL,
  `motherOccupation` varchar(255) DEFAULT NULL,
  `motherAddress` text DEFAULT NULL,
  `motherContact` varchar(20) DEFAULT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `fatherOccupation` varchar(255) DEFAULT NULL,
  `fatherAddress` text DEFAULT NULL,
  `fatherContact` varchar(20) DEFAULT NULL,
  `complainantFirstName` varchar(255) DEFAULT NULL,
  `complainantMiddleName` varchar(255) DEFAULT NULL,
  `complainantLastName` varchar(255) DEFAULT NULL,
  `relationshipToVictim` varchar(255) DEFAULT NULL,
  `complainantContact` varchar(20) DEFAULT NULL,
  `complainantAddress` text DEFAULT NULL,
  `complainedFirstName` varchar(255) DEFAULT NULL,
  `complainedMiddleName` varchar(255) DEFAULT NULL,
  `complainedLastName` varchar(255) DEFAULT NULL,
  `complainedDOB` date DEFAULT NULL,
  `complainedAge` int(11) DEFAULT NULL,
  `complainedSex` enum('Male','Female','Other') DEFAULT NULL,
  `complainedGrade` varchar(50) DEFAULT NULL,
  `complainedSection` varchar(50) DEFAULT NULL,
  `complainedAdviser` varchar(255) DEFAULT NULL,
  `complainedContact` varchar(20) DEFAULT NULL,
  `complainedAddress` text DEFAULT NULL,
  `complainedMotherName` varchar(255) DEFAULT NULL,
  `complainedMotherOccupation` varchar(255) DEFAULT NULL,
  `complainedMotherAddress` text DEFAULT NULL,
  `complainedMotherContact` varchar(20) DEFAULT NULL,
  `complainedFatherName` varchar(255) DEFAULT NULL,
  `complainedFatherOccupation` varchar(255) DEFAULT NULL,
  `complainedFatherAddress` text DEFAULT NULL,
  `complainedFatherContact` varchar(20) DEFAULT NULL,
  `caseDetails` text DEFAULT NULL,
  `actionTaken` text DEFAULT NULL,
  `recommendations` text DEFAULT NULL,
  `reportedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `student_id` int(11) NOT NULL,
  `status` enum('Pending','Complete') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints_student`
--

INSERT INTO `complaints_student` (`id`, `victimFirstName`, `victimMiddleName`, `victimLastName`, `victimDOB`, `victimAge`, `victimSex`, `victimGrade`, `victimSection`, `victimAdviser`, `victimContact`, `victimAddress`, `motherName`, `motherOccupation`, `motherAddress`, `motherContact`, `fatherName`, `fatherOccupation`, `fatherAddress`, `fatherContact`, `complainantFirstName`, `complainantMiddleName`, `complainantLastName`, `relationshipToVictim`, `complainantContact`, `complainantAddress`, `complainedFirstName`, `complainedMiddleName`, `complainedLastName`, `complainedDOB`, `complainedAge`, `complainedSex`, `complainedGrade`, `complainedSection`, `complainedAdviser`, `complainedContact`, `complainedAddress`, `complainedMotherName`, `complainedMotherOccupation`, `complainedMotherAddress`, `complainedMotherContact`, `complainedFatherName`, `complainedFatherOccupation`, `complainedFatherAddress`, `complainedFatherContact`, `caseDetails`, `actionTaken`, `recommendations`, `reportedAt`, `student_id`, `status`) VALUES
(40, 'ferdinandsssaaas', 'felices', 'sacdalan', '2002-07-13', 22, 'Male', '11', 'Gates', 'Lamei Ann Butiongs', '09304365351', NULL, 'Melinda Felices', 'Businesswoman', 'Quezon City Manila', '09304365358', 'Pedro Paterno', 'Lawyer', 'Quezon City Manilas', '09871239871', 'juspher ', 'balagtas ', 'pedrazaas', 'best friend', '09856123456', 'canda balayan batangasasasas', 'John Paulmar', 'lontoc', 'Manjac', '2003-07-14', 21, 'Male', '12', 'Lovelace', 'gracele cabrera', '', NULL, 'Mylene Manjac', 'Agent', 'Sampaga Balayan Batangas', '09995533777', 'Asd', 'Welder', 'Sampaga Balayan Batangas', '09871239871', 'sinakal', 'kinausap', 'pinagayos at wag na umulit', '2024-12-01 15:51:46', 240554, 'Complete'),
(42, 'jusphera', 'balagtasa', 'pedrazaa', '2003-06-12', 21, 'Male', '11', 'galileo', 'lyzette landicho', '09917239861', NULL, 'Monica Balagtasa', 'Attorneya', 'Canda Balayan Batangasa', '09123456781', 'Bernard Pedrazaa', 'Barangay Captaina', 'Canda Balayan Batangasa', '09876543211', 'asd', 'asd', 'asd', 'asd', '09999999999', 'asd', 'ferdinanda', 'felicesa', 'sacdalana', '2002-07-13', 22, 'Male', '11', 'Gates', 'asdasds', '', NULL, 'Melinda Felicesa', 'Businesswomana', 'Quezon City Manilaa', '09304365358', 'Pedro Paternoa', 'Lawyera', 'Quezon City Manilaa', '09871239871', 'asd', 'asd', 'asd', '2024-12-02 01:01:17', 240555, 'Pending'),
(43, 'ferdinand', 'felices', 'sacdalan', '2002-07-13', 22, 'Male', '11', 'Gates', 'Lamei Ann Butiongs', '09304365351', NULL, 'Melinda Felices', 'Businesswoman', 'Quezon City Manila', '09304365358', 'Pedro Paterno', 'Lawyer', 'Quezon City Manila', '09871239871', 'asd', 'asd', 'asd', 'asd', '09999999999', 'sad', 'John Paulmar', 'lontoc', 'Manjac', '2003-07-14', 21, 'Male', '12', 'Lovelace', 'asd', '', NULL, 'Mylene Manjac', 'Agent', 'Sampaga Balayan Batangas', '09995533777', 'Apolinar Manjac', 'Welder', 'Sampaga Balayan Batangas', '09871239871', 'asd', 'asd', 'asd', '2024-12-02 03:33:16', 240554, 'Pending'),
(44, 'ferdinands', 'felicess', 'sacdalans', '2002-08-13', 22, 'Female', '12', 'Gatess', 'Lamei Ann Butiongs', '09304365351', NULL, 'Melinda Felicess', 'Businesswomans', 'Quezon City Manilas', '09304365358', 'Pedro Paternos', 'Lawyers', 'Quezon City Manilas', '09871239871', 'asds', 'asds', 'qwes', 'asds', '12345678912', 'asdasds', 'John Paulmars', 'lontocs', 'Manjacs', '2003-06-14', 21, 'Female', '11', 'Lovelaces', NULL, '', NULL, 'Mylene Manjacs', 'Agents', 'Sampaga Balayan Batangass', '09995533777', 'Apolinar Manjacs', 'Welders', 'Sampaga Balayan Batangass', '09871239871', 'asdasd\r\ns\r\n', 'asdsads', 'asdasds', '2024-12-02 03:37:01', 240554, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `fathers`
--

CREATE TABLE `fathers` (
  `parent_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fathers`
--

INSERT INTO `fathers` (`parent_id`, `student_id`, `name`, `contact_number`, `email`, `occupation`, `address`) VALUES
(24005, 240257, 'Joe Jordan', '09123456789', 'jordan.joe@example.com', 'Farmer', 'Tuy, Batangas'),
(24006, 240258, 'Michael Bird', '0917-123-4567', 'michael.bird@example.com', 'Engineer', 'Nasugbu'),
(24007, 240259, 'James Barkley', '0917-234-5678', 'james.barkley@example.com', 'Doctor', 'Lian'),
(24008, 240260, 'David Duncan', '0917-345-6789', 'david.duncan@example.com', 'Teacher', 'Tuy'),
(24009, 240261, 'Chris Malone', '0917-456-7890', 'chris.malone@example.com', 'Artist', 'Nasugbu'),
(24010, 240262, 'Kevin Chamberlain', '0917-567-8901', 'kevin.chamberlain@example.com', 'Scientist', 'Lian'),
(24011, 240263, 'Anthony Olajuwon', '0917-678-9012', 'anthony.olajuwon@example.com', 'Nurse', 'Tuy'),
(24012, 240264, 'Daniel Nowitzki', '0917-789-0123', 'daniel.nowitzki@example.com', 'Architect', 'Nasugbu'),
(24013, 240265, 'Brian Robertson', '0917-890-1234', 'brian.robertson@example.com', 'Musician', 'Lian'),
(24014, 240266, 'Matthew West', '0917-901-2345', 'matthew.west@example.com', 'Writer', 'Tuy'),
(24015, 240267, 'Jason Midoriya', '0917-012-3456', 'jason.midoriya@example.com', 'Chef', 'Nasugbu'),
(24016, 240268, 'Izuku Bakugo', '0917-123-4568', 'izuku.bakugo@example.com', 'Firefighter', 'Lian'),
(24017, 240269, 'Shoto Todoroki', '0917-234-5679', 'shoto.todoroki@example.com', 'Police Officer', 'Tuy'),
(24018, 240270, 'Ochaco Uraraka', '0917-345-6780', 'ochaco.uraraka@example.com', 'Lawyer', 'Nasugbu'),
(24019, 240271, 'Tenya Iida', '0917-456-7891', 'tenya.iida@example.com', 'Mechanic', 'Lian'),
(24020, 240272, 'Tsuyu Asui', '0917-567-8902', 'tsuyu.asui@example.com', 'Biologist', 'Tuy'),
(24021, 240273, 'Eijiro Kirishima', '0917-678-9013', 'eijiro.kirishima@example.com', 'Construction Worker', 'Nasugbu'),
(24022, 240274, 'Mina Ashido', '0917-789-0124', 'mina.ashido@example.com', 'Artist', 'Lian'),
(24023, 240275, 'Momo Yaoyorozu', '0917-890-1235', 'momo.yaoyorozu@example.com', 'Designer', 'Tuy'),
(24024, 240276, 'Fumikage Tokoyami', '0917-901-2346', 'fumikage.tokoyami@example.com', 'Photographer', 'Nasugbu'),
(240277, 240277, NULL, NULL, NULL, NULL, NULL),
(240278, 240278, NULL, NULL, NULL, NULL, NULL),
(240279, 240279, NULL, NULL, NULL, NULL, NULL),
(240280, 240280, NULL, NULL, NULL, NULL, NULL),
(240281, 240281, NULL, NULL, NULL, NULL, NULL),
(240282, 240282, NULL, NULL, NULL, NULL, NULL),
(240283, 240283, NULL, NULL, NULL, NULL, NULL),
(240284, 240284, NULL, NULL, NULL, NULL, NULL),
(240285, 240285, NULL, NULL, NULL, NULL, NULL),
(240286, 240286, NULL, NULL, NULL, NULL, NULL),
(240287, 240287, NULL, NULL, NULL, NULL, NULL),
(240288, 240288, NULL, NULL, NULL, NULL, NULL),
(240289, 240289, NULL, NULL, NULL, NULL, NULL),
(240290, 240290, NULL, NULL, NULL, NULL, NULL),
(240291, 240291, NULL, NULL, NULL, NULL, NULL),
(240292, 240292, NULL, NULL, NULL, NULL, NULL),
(240293, 240293, NULL, NULL, NULL, NULL, NULL),
(240294, 240294, NULL, NULL, NULL, NULL, NULL),
(240295, 240295, NULL, NULL, NULL, NULL, NULL),
(240296, 240296, NULL, NULL, NULL, NULL, NULL),
(240297, 240297, NULL, NULL, NULL, NULL, NULL),
(240298, 240298, NULL, NULL, NULL, NULL, NULL),
(240299, 240299, NULL, NULL, NULL, NULL, NULL),
(240300, 240300, NULL, NULL, NULL, NULL, NULL),
(240301, 240301, NULL, NULL, NULL, NULL, NULL),
(240302, 240302, NULL, NULL, NULL, NULL, NULL),
(240303, 240303, NULL, NULL, NULL, NULL, NULL),
(240304, 240304, NULL, NULL, NULL, NULL, NULL),
(240305, 240305, NULL, NULL, NULL, NULL, NULL),
(240306, 240306, NULL, NULL, NULL, NULL, NULL),
(240307, 240307, NULL, NULL, NULL, NULL, NULL),
(240308, 240308, NULL, NULL, NULL, NULL, NULL),
(240309, 240309, NULL, NULL, NULL, NULL, NULL),
(240310, 240310, NULL, NULL, NULL, NULL, NULL),
(240311, 240311, NULL, NULL, NULL, NULL, NULL),
(240312, 240312, NULL, NULL, NULL, NULL, NULL),
(240313, 240313, NULL, NULL, NULL, NULL, NULL),
(240314, 240314, NULL, NULL, NULL, NULL, NULL),
(240315, 240315, NULL, NULL, NULL, NULL, NULL),
(240316, 240316, NULL, NULL, NULL, NULL, NULL),
(240317, 240317, NULL, NULL, NULL, NULL, NULL),
(240318, 240318, NULL, NULL, NULL, NULL, NULL),
(240319, 240319, NULL, NULL, NULL, NULL, NULL),
(240320, 240320, NULL, NULL, NULL, NULL, NULL),
(240321, 240321, NULL, NULL, NULL, NULL, NULL),
(240322, 240322, NULL, NULL, NULL, NULL, NULL),
(240323, 240323, NULL, NULL, NULL, NULL, NULL),
(240324, 240324, NULL, NULL, NULL, NULL, NULL),
(240325, 240325, NULL, NULL, NULL, NULL, NULL),
(240326, 240326, NULL, NULL, NULL, NULL, NULL),
(240327, 240327, NULL, NULL, NULL, NULL, NULL),
(240328, 240328, NULL, NULL, NULL, NULL, NULL),
(240329, 240329, NULL, NULL, NULL, NULL, NULL),
(240330, 240330, NULL, NULL, NULL, NULL, NULL),
(240331, 240331, NULL, NULL, NULL, NULL, NULL),
(240332, 240332, NULL, NULL, NULL, NULL, NULL),
(240333, 240333, NULL, NULL, NULL, NULL, NULL),
(240334, 240334, NULL, NULL, NULL, NULL, NULL),
(240335, 240335, NULL, NULL, NULL, NULL, NULL),
(240336, 240336, NULL, NULL, NULL, NULL, NULL),
(240337, 240337, NULL, NULL, NULL, NULL, NULL),
(240338, 240338, NULL, NULL, NULL, NULL, NULL),
(240339, 240339, NULL, NULL, NULL, NULL, NULL),
(240340, 240340, NULL, NULL, NULL, NULL, NULL),
(240341, 240341, NULL, NULL, NULL, NULL, NULL),
(240342, 240342, NULL, NULL, NULL, NULL, NULL),
(240343, 240343, NULL, NULL, NULL, NULL, NULL),
(240344, 240344, NULL, NULL, NULL, NULL, NULL),
(240345, 240345, NULL, NULL, NULL, NULL, NULL),
(240346, 240346, NULL, NULL, NULL, NULL, NULL),
(240347, 240347, NULL, NULL, NULL, NULL, NULL),
(240348, 240348, NULL, NULL, NULL, NULL, NULL),
(240349, 240349, NULL, NULL, NULL, NULL, NULL),
(240350, 240350, NULL, NULL, NULL, NULL, NULL),
(240351, 240351, NULL, NULL, NULL, NULL, NULL),
(240352, 240352, NULL, NULL, NULL, NULL, NULL),
(240353, 240353, NULL, NULL, NULL, NULL, NULL),
(240354, 240354, NULL, NULL, NULL, NULL, NULL),
(240355, 240355, NULL, NULL, NULL, NULL, NULL),
(240356, 240356, NULL, NULL, NULL, NULL, NULL),
(240357, 240357, NULL, NULL, NULL, NULL, NULL),
(240358, 240358, NULL, NULL, NULL, NULL, NULL),
(240359, 240359, NULL, NULL, NULL, NULL, NULL),
(240360, 240360, NULL, NULL, NULL, NULL, NULL),
(240361, 240361, NULL, NULL, NULL, NULL, NULL),
(240362, 240362, NULL, NULL, NULL, NULL, NULL),
(240363, 240363, NULL, NULL, NULL, NULL, NULL),
(240364, 240364, NULL, NULL, NULL, NULL, NULL),
(240365, 240365, NULL, NULL, NULL, NULL, NULL),
(240366, 240366, NULL, NULL, NULL, NULL, NULL),
(240367, 240367, NULL, NULL, NULL, NULL, NULL),
(240368, 240368, NULL, NULL, NULL, NULL, NULL),
(240369, 240369, NULL, NULL, NULL, NULL, NULL),
(240370, 240370, NULL, NULL, NULL, NULL, NULL),
(240371, 240371, NULL, NULL, NULL, NULL, NULL),
(240372, 240372, NULL, NULL, NULL, NULL, NULL),
(240373, 240373, NULL, NULL, NULL, NULL, NULL),
(240374, 240374, NULL, NULL, NULL, NULL, NULL),
(240375, 240375, NULL, NULL, NULL, NULL, NULL),
(240376, 240376, NULL, NULL, NULL, NULL, NULL),
(240377, 240377, NULL, NULL, NULL, NULL, NULL),
(240378, 240378, NULL, NULL, NULL, NULL, NULL),
(240379, 240379, NULL, NULL, NULL, NULL, NULL),
(240380, 240380, NULL, NULL, NULL, NULL, NULL),
(240381, 240381, NULL, NULL, NULL, NULL, NULL),
(240382, 240382, NULL, NULL, NULL, NULL, NULL),
(240383, 240383, NULL, NULL, NULL, NULL, NULL),
(240384, 240384, NULL, NULL, NULL, NULL, NULL),
(240385, 240385, NULL, NULL, NULL, NULL, NULL),
(240386, 240386, NULL, NULL, NULL, NULL, NULL),
(240387, 240387, NULL, NULL, NULL, NULL, NULL),
(240388, 240388, NULL, NULL, NULL, NULL, NULL),
(240389, 240389, NULL, NULL, NULL, NULL, NULL),
(240390, 240390, NULL, NULL, NULL, NULL, NULL),
(240391, 240391, NULL, NULL, NULL, NULL, NULL),
(240392, 240392, NULL, NULL, NULL, NULL, NULL),
(240393, 240393, NULL, NULL, NULL, NULL, NULL),
(240394, 240394, NULL, NULL, NULL, NULL, NULL),
(240395, 240395, NULL, NULL, NULL, NULL, NULL),
(240396, 240396, NULL, NULL, NULL, NULL, NULL),
(240397, 240397, NULL, NULL, NULL, NULL, NULL),
(240398, 240398, NULL, NULL, NULL, NULL, NULL),
(240399, 240399, NULL, NULL, NULL, NULL, NULL),
(240400, 240400, NULL, NULL, NULL, NULL, NULL),
(240401, 240401, NULL, NULL, NULL, NULL, NULL),
(240402, 240402, NULL, NULL, NULL, NULL, NULL),
(240403, 240403, NULL, NULL, NULL, NULL, NULL),
(240404, 240404, NULL, NULL, NULL, NULL, NULL),
(240405, 240405, NULL, NULL, NULL, NULL, NULL),
(240406, 240406, NULL, NULL, NULL, NULL, NULL),
(240407, 240407, NULL, NULL, NULL, NULL, NULL),
(240408, 240408, NULL, NULL, NULL, NULL, NULL),
(240409, 240409, NULL, NULL, NULL, NULL, NULL),
(240410, 240410, NULL, NULL, NULL, NULL, NULL),
(240411, 240411, NULL, NULL, NULL, NULL, NULL),
(240412, 240412, NULL, NULL, NULL, NULL, NULL),
(240413, 240413, NULL, NULL, NULL, NULL, NULL),
(240414, 240414, NULL, NULL, NULL, NULL, NULL),
(240415, 240415, NULL, NULL, NULL, NULL, NULL),
(240416, 240416, NULL, NULL, NULL, NULL, NULL),
(240417, 240417, NULL, NULL, NULL, NULL, NULL),
(240418, 240418, NULL, NULL, NULL, NULL, NULL),
(240419, 240419, NULL, NULL, NULL, NULL, NULL),
(240420, 240420, NULL, NULL, NULL, NULL, NULL),
(240421, 240421, NULL, NULL, NULL, NULL, NULL),
(240422, 240422, NULL, NULL, NULL, NULL, NULL),
(240423, 240423, NULL, NULL, NULL, NULL, NULL),
(240424, 240424, NULL, NULL, NULL, NULL, NULL),
(240425, 240425, NULL, NULL, NULL, NULL, NULL),
(240426, 240426, NULL, NULL, NULL, NULL, NULL),
(240427, 240427, NULL, NULL, NULL, NULL, NULL),
(240428, 240428, NULL, NULL, NULL, NULL, NULL),
(240429, 240429, NULL, NULL, NULL, NULL, NULL),
(240430, 240430, NULL, NULL, NULL, NULL, NULL),
(240431, 240431, NULL, NULL, NULL, NULL, NULL),
(240432, 240432, NULL, NULL, NULL, NULL, NULL),
(240433, 240433, NULL, NULL, NULL, NULL, NULL),
(240434, 240434, NULL, NULL, NULL, NULL, NULL),
(240435, 240435, NULL, NULL, NULL, NULL, NULL),
(240436, 240436, NULL, NULL, NULL, NULL, NULL),
(240437, 240437, NULL, NULL, NULL, NULL, NULL),
(240438, 240438, NULL, NULL, NULL, NULL, NULL),
(240439, 240439, NULL, NULL, NULL, NULL, NULL),
(240440, 240440, NULL, NULL, NULL, NULL, NULL),
(240441, 240441, NULL, NULL, NULL, NULL, NULL),
(240442, 240442, NULL, NULL, NULL, NULL, NULL),
(240443, 240443, NULL, NULL, NULL, NULL, NULL),
(240444, 240444, NULL, NULL, NULL, NULL, NULL),
(240445, 240445, NULL, NULL, NULL, NULL, NULL),
(240446, 240446, NULL, NULL, NULL, NULL, NULL),
(240447, 240447, NULL, NULL, NULL, NULL, NULL),
(240448, 240448, NULL, NULL, NULL, NULL, NULL),
(240449, 240449, NULL, NULL, NULL, NULL, NULL),
(240450, 240450, NULL, NULL, NULL, NULL, NULL),
(240451, 240451, NULL, NULL, NULL, NULL, NULL),
(240452, 240452, NULL, NULL, NULL, NULL, NULL),
(240453, 240453, NULL, NULL, NULL, NULL, NULL),
(240454, 240454, NULL, NULL, NULL, NULL, NULL),
(240455, 240455, NULL, NULL, NULL, NULL, NULL),
(240456, 240456, NULL, NULL, NULL, NULL, NULL),
(240457, 240457, NULL, NULL, NULL, NULL, NULL),
(240458, 240458, NULL, NULL, NULL, NULL, NULL),
(240459, 240459, NULL, NULL, NULL, NULL, NULL),
(240460, 240460, NULL, NULL, NULL, NULL, NULL),
(240461, 240461, NULL, NULL, NULL, NULL, NULL),
(240462, 240462, NULL, NULL, NULL, NULL, NULL),
(240463, 240463, NULL, NULL, NULL, NULL, NULL),
(240464, 240464, NULL, NULL, NULL, NULL, NULL),
(240465, 240465, NULL, NULL, NULL, NULL, NULL),
(240466, 240466, NULL, NULL, NULL, NULL, NULL),
(240467, 240467, NULL, NULL, NULL, NULL, NULL),
(240468, 240468, NULL, NULL, NULL, NULL, NULL),
(240469, 240469, NULL, NULL, NULL, NULL, NULL),
(240470, 240470, NULL, NULL, NULL, NULL, NULL),
(240471, 240471, NULL, NULL, NULL, NULL, NULL),
(240472, 240472, NULL, NULL, NULL, NULL, NULL),
(240473, 240473, NULL, NULL, NULL, NULL, NULL),
(240474, 240474, NULL, NULL, NULL, NULL, NULL),
(240475, 240475, NULL, NULL, NULL, NULL, NULL),
(240476, 240476, NULL, NULL, NULL, NULL, NULL),
(240477, 240477, NULL, NULL, NULL, NULL, NULL),
(240478, 240478, NULL, NULL, NULL, NULL, NULL),
(240479, 240479, NULL, NULL, NULL, NULL, NULL),
(240480, 240480, NULL, NULL, NULL, NULL, NULL),
(240481, 240481, NULL, NULL, NULL, NULL, NULL),
(240482, 240482, NULL, NULL, NULL, NULL, NULL),
(240483, 240483, NULL, NULL, NULL, NULL, NULL),
(240484, 240484, NULL, NULL, NULL, NULL, NULL),
(240485, 240485, NULL, NULL, NULL, NULL, NULL),
(240486, 240486, NULL, NULL, NULL, NULL, NULL),
(240487, 240487, NULL, NULL, NULL, NULL, NULL),
(240488, 240488, NULL, NULL, NULL, NULL, NULL),
(240489, 240489, NULL, NULL, NULL, NULL, NULL),
(240490, 240490, NULL, NULL, NULL, NULL, NULL),
(240491, 240491, NULL, NULL, NULL, NULL, NULL),
(240492, 240492, NULL, NULL, NULL, NULL, NULL),
(240493, 240493, NULL, NULL, NULL, NULL, NULL),
(240494, 240494, NULL, NULL, NULL, NULL, NULL),
(240495, 240495, NULL, NULL, NULL, NULL, NULL),
(240496, 240496, NULL, NULL, NULL, NULL, NULL),
(240497, 240497, NULL, NULL, NULL, NULL, NULL),
(240498, 240498, NULL, NULL, NULL, NULL, NULL),
(240499, 240499, NULL, NULL, NULL, NULL, NULL),
(240500, 240500, NULL, NULL, NULL, NULL, NULL),
(240501, 240502, NULL, NULL, NULL, NULL, NULL),
(240502, 240503, NULL, NULL, NULL, NULL, NULL),
(240504, 240505, NULL, NULL, NULL, NULL, NULL),
(240505, 240506, NULL, NULL, NULL, NULL, NULL),
(240506, 240507, NULL, NULL, NULL, NULL, NULL),
(240507, 240508, NULL, NULL, NULL, NULL, NULL),
(240508, 240509, NULL, NULL, NULL, NULL, NULL),
(240509, 240510, NULL, NULL, NULL, NULL, NULL),
(240510, 240511, NULL, NULL, NULL, NULL, NULL),
(240511, 240512, NULL, NULL, NULL, NULL, NULL),
(240512, 240513, NULL, NULL, NULL, NULL, NULL),
(240513, 240514, NULL, NULL, NULL, NULL, NULL),
(240514, 240515, NULL, NULL, NULL, NULL, NULL),
(240515, 240516, NULL, NULL, NULL, NULL, NULL),
(240516, 240517, NULL, NULL, NULL, NULL, NULL),
(240517, 240518, NULL, NULL, NULL, NULL, NULL),
(240518, 240519, NULL, NULL, NULL, NULL, NULL),
(240519, 240520, NULL, NULL, NULL, NULL, NULL),
(240520, 240521, NULL, NULL, NULL, NULL, NULL),
(240521, 240522, NULL, NULL, NULL, NULL, NULL),
(240522, 240523, NULL, NULL, NULL, NULL, NULL),
(240523, 240524, NULL, NULL, NULL, NULL, NULL),
(240524, 240525, NULL, NULL, NULL, NULL, NULL),
(240525, 240526, NULL, NULL, NULL, NULL, NULL),
(240526, 240527, NULL, NULL, NULL, NULL, NULL),
(240527, 240528, NULL, NULL, NULL, NULL, NULL),
(240528, 240529, NULL, NULL, NULL, NULL, NULL),
(240529, 240530, NULL, NULL, NULL, NULL, NULL),
(240530, 240531, NULL, NULL, NULL, NULL, NULL),
(240531, 240532, NULL, NULL, NULL, NULL, NULL),
(240532, 240533, NULL, NULL, NULL, NULL, NULL),
(240533, 240534, NULL, NULL, NULL, NULL, NULL),
(240534, 240535, NULL, NULL, NULL, NULL, NULL),
(240535, 240536, NULL, NULL, NULL, NULL, NULL),
(240536, 240537, NULL, NULL, NULL, NULL, NULL),
(240537, 240538, NULL, NULL, NULL, NULL, NULL),
(240538, 240539, NULL, NULL, NULL, NULL, NULL),
(240539, 240540, NULL, NULL, NULL, NULL, NULL),
(240540, 240541, NULL, NULL, NULL, NULL, NULL),
(240541, 240542, NULL, NULL, NULL, NULL, NULL),
(240542, 240543, NULL, NULL, NULL, NULL, NULL),
(240543, 240544, NULL, NULL, NULL, NULL, NULL),
(240544, 240545, NULL, NULL, NULL, NULL, NULL),
(240545, 240546, NULL, NULL, NULL, NULL, NULL),
(240547, 240547, NULL, NULL, NULL, NULL, NULL),
(240548, 240548, NULL, NULL, NULL, NULL, NULL),
(240549, 240549, NULL, NULL, NULL, NULL, NULL),
(240550, 240550, 'apolinar manjac', '09301231231', NULL, 'welder', 'sampaga'),
(240551, 240551, NULL, NULL, NULL, NULL, NULL),
(240552, 240552, 'asdsd', '09871239871', 'asd@gmail.com', 'asd', 'asdas'),
(240553, 240553, NULL, NULL, NULL, NULL, NULL),
(240554, 240554, 'apolinar manjac', '09871239871', 'apolinar@gmail.com', 'welder', 'sampaga balayan batangas'),
(240555, 240555, 'pedro paterno', '09871239871', 'pedro@gmail.com', 'lawyer', 'quezon city manila'),
(240556, 240556, 'bernard pedraza', '09876543211', 'bernard@gmail.com', 'Barangay Captain', 'canda balayan batangas'),
(240557, 240557, NULL, NULL, NULL, NULL, NULL),
(240558, 240558, NULL, NULL, NULL, NULL, NULL),
(240559, 240559, NULL, NULL, NULL, NULL, NULL),
(240560, 240560, NULL, NULL, NULL, NULL, NULL),
(240561, 240561, NULL, NULL, NULL, NULL, NULL),
(240562, 240562, NULL, NULL, NULL, NULL, NULL),
(240563, 240563, NULL, NULL, NULL, NULL, NULL),
(240564, 240564, NULL, NULL, NULL, NULL, NULL),
(240565, 240565, NULL, NULL, NULL, NULL, NULL),
(240566, 240566, NULL, NULL, NULL, NULL, NULL),
(240567, 240567, NULL, NULL, NULL, NULL, NULL),
(240568, 240568, NULL, NULL, NULL, NULL, NULL),
(240569, 240569, NULL, NULL, NULL, NULL, NULL),
(240570, 240570, NULL, NULL, NULL, NULL, NULL),
(240571, 240571, NULL, NULL, NULL, NULL, NULL),
(240572, 240572, NULL, NULL, NULL, NULL, NULL),
(240573, 240573, NULL, NULL, NULL, NULL, NULL),
(240574, 240574, NULL, NULL, NULL, NULL, NULL),
(240575, 240575, NULL, NULL, NULL, NULL, NULL),
(240576, 240576, NULL, NULL, NULL, NULL, NULL),
(240577, 240577, NULL, NULL, NULL, NULL, NULL),
(240578, 240578, NULL, NULL, NULL, NULL, NULL),
(240579, 240579, NULL, NULL, NULL, NULL, NULL),
(240580, 240580, NULL, NULL, NULL, NULL, NULL),
(240581, 240581, NULL, NULL, NULL, NULL, NULL),
(240582, 240582, NULL, NULL, NULL, NULL, NULL),
(240586, 240586, NULL, NULL, NULL, NULL, NULL),
(240587, 240587, NULL, NULL, NULL, NULL, NULL),
(240588, 240588, NULL, NULL, NULL, NULL, NULL),
(240589, 240589, NULL, NULL, NULL, NULL, NULL),
(240590, 240590, NULL, NULL, NULL, NULL, NULL),
(240591, 240591, NULL, NULL, NULL, NULL, NULL),
(240592, 240592, NULL, NULL, NULL, NULL, NULL),
(240593, 240593, NULL, NULL, NULL, NULL, NULL),
(240594, 240594, NULL, NULL, NULL, NULL, NULL),
(240595, 240595, NULL, NULL, NULL, NULL, NULL),
(240596, 240596, NULL, NULL, NULL, NULL, NULL),
(240597, 240597, NULL, NULL, NULL, NULL, NULL),
(240598, 240598, NULL, NULL, NULL, NULL, NULL),
(240599, 240599, NULL, NULL, NULL, NULL, NULL),
(240600, 240600, NULL, NULL, NULL, NULL, NULL),
(240601, 240601, NULL, NULL, NULL, NULL, NULL),
(240602, 240602, NULL, NULL, NULL, NULL, NULL),
(240603, 240603, NULL, NULL, NULL, NULL, NULL),
(240604, 240604, NULL, NULL, NULL, NULL, NULL),
(240605, 240605, NULL, NULL, NULL, NULL, NULL),
(240606, 240606, NULL, NULL, NULL, NULL, NULL),
(240607, 240607, NULL, NULL, NULL, NULL, NULL),
(240608, 240608, NULL, NULL, NULL, NULL, NULL),
(240609, 240609, NULL, NULL, NULL, NULL, NULL),
(240610, 240610, NULL, NULL, NULL, NULL, NULL),
(240611, 240611, NULL, NULL, NULL, NULL, NULL),
(240612, 240612, NULL, NULL, NULL, NULL, NULL),
(240613, 240613, NULL, NULL, NULL, NULL, NULL),
(240614, 240614, NULL, NULL, NULL, NULL, NULL),
(240615, 240615, NULL, NULL, NULL, NULL, NULL),
(240616, 240616, NULL, NULL, NULL, NULL, NULL),
(240617, 240617, NULL, NULL, NULL, NULL, NULL),
(240618, 240618, NULL, NULL, NULL, NULL, NULL),
(240619, 240619, NULL, NULL, NULL, NULL, NULL),
(240620, 240620, NULL, NULL, NULL, NULL, NULL),
(240621, 240621, NULL, NULL, NULL, NULL, NULL),
(240622, 240622, NULL, NULL, NULL, NULL, NULL),
(240623, 240623, NULL, NULL, NULL, NULL, NULL),
(240624, 240624, NULL, NULL, NULL, NULL, NULL),
(240625, 240625, NULL, NULL, NULL, NULL, NULL),
(240626, 240626, NULL, NULL, NULL, NULL, NULL),
(240627, 240627, NULL, NULL, NULL, NULL, NULL),
(240628, 240628, NULL, NULL, NULL, NULL, NULL),
(240629, 240629, NULL, NULL, NULL, NULL, NULL),
(240630, 240630, NULL, NULL, NULL, NULL, NULL),
(240631, 240631, NULL, NULL, NULL, NULL, NULL),
(240632, 240632, NULL, NULL, NULL, NULL, NULL),
(240633, 240633, NULL, NULL, NULL, NULL, NULL),
(240634, 240634, NULL, NULL, NULL, NULL, NULL),
(240635, 240635, NULL, NULL, NULL, NULL, NULL),
(240636, 240636, NULL, NULL, NULL, NULL, NULL),
(240637, 240637, NULL, NULL, NULL, NULL, NULL),
(240638, 240638, NULL, NULL, NULL, NULL, NULL),
(240639, 240639, NULL, NULL, NULL, NULL, NULL),
(240640, 240640, NULL, NULL, NULL, NULL, NULL),
(240641, 240641, NULL, NULL, NULL, NULL, NULL),
(240642, 240642, NULL, NULL, NULL, NULL, NULL),
(240643, 240643, NULL, NULL, NULL, NULL, NULL),
(240644, 240644, NULL, NULL, NULL, NULL, NULL),
(240645, 240645, NULL, NULL, NULL, NULL, NULL),
(240646, 240646, NULL, NULL, NULL, NULL, NULL),
(240647, 240647, NULL, NULL, NULL, NULL, NULL),
(240648, 240648, NULL, NULL, NULL, NULL, NULL),
(240649, 240649, NULL, NULL, NULL, NULL, NULL),
(240650, 240650, NULL, NULL, NULL, NULL, NULL),
(240651, 240651, NULL, NULL, NULL, NULL, NULL),
(240652, 240652, NULL, NULL, NULL, NULL, NULL),
(240653, 240653, NULL, NULL, NULL, NULL, NULL),
(240654, 240654, NULL, NULL, NULL, NULL, NULL),
(240655, 240655, NULL, NULL, NULL, NULL, NULL),
(240656, 240656, NULL, NULL, NULL, NULL, NULL),
(240657, 240657, NULL, NULL, NULL, NULL, NULL),
(240658, 240658, NULL, NULL, NULL, NULL, NULL),
(240659, 240659, NULL, NULL, NULL, NULL, NULL),
(240660, 240660, NULL, NULL, NULL, NULL, NULL),
(240661, 240661, NULL, NULL, NULL, NULL, NULL),
(240662, 240662, NULL, NULL, NULL, NULL, NULL),
(240663, 240663, NULL, NULL, NULL, NULL, NULL),
(240664, 240664, NULL, NULL, NULL, NULL, NULL),
(240665, 240665, NULL, NULL, NULL, NULL, NULL),
(240666, 240666, NULL, NULL, NULL, NULL, NULL),
(240667, 240667, NULL, NULL, NULL, NULL, NULL),
(240668, 240668, NULL, NULL, NULL, NULL, NULL),
(240669, 240669, NULL, NULL, NULL, NULL, NULL),
(240670, 240670, NULL, NULL, NULL, NULL, NULL),
(240671, 240671, NULL, NULL, NULL, NULL, NULL),
(240672, 240672, NULL, NULL, NULL, NULL, NULL),
(240673, 240673, NULL, NULL, NULL, NULL, NULL),
(240674, 240674, NULL, NULL, NULL, NULL, NULL),
(240675, 240675, NULL, NULL, NULL, NULL, NULL),
(240676, 240676, NULL, NULL, NULL, NULL, NULL),
(240677, 240677, NULL, NULL, NULL, NULL, NULL),
(240678, 240678, NULL, NULL, NULL, NULL, NULL),
(240679, 240679, NULL, NULL, NULL, NULL, NULL),
(240680, 240680, NULL, NULL, NULL, NULL, NULL),
(240681, 240681, NULL, NULL, NULL, NULL, NULL),
(240682, 240682, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guards`
--

CREATE TABLE `guards` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guards`
--

INSERT INTO `guards` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `position`, `birthdate`, `sex`, `contact_number`, `address`) VALUES
(15, 'senior', '1234', 'Senior', 'Estong', 'Perez', 'Senior@gmail.com', 'Guard', '1975-01-17', 'Male', '09665171890', 'Nasugbu, Batangas');

-- --------------------------------------------------------

--
-- Table structure for table `mothers`
--

CREATE TABLE `mothers` (
  `parent_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mothers`
--

INSERT INTO `mothers` (`parent_id`, `student_id`, `name`, `contact_number`, `email`, `occupation`, `address`) VALUES
(240257, NULL, 'Rosena Jordan', '094358537', 'rosena@gmail.com', 'House Wife', 'Tuy, Batangas'),
(240258, NULL, 'Maria Clara', '09123456789', 'maria.clara@gmail.com', 'Teacher', 'Balayan, Batangas'),
(240259, NULL, 'Juana de la Cruz', '09234567890', 'juana@gmail.com', 'Nurse', 'Nasugbu, Batangas'),
(240260, NULL, 'Ana Santos', '09345678901', 'ana.santos@gmail.com', 'Engineer', 'Lian, Batangas'),
(240261, NULL, 'Liza Reyes', '09456789012', 'liza.reyes@gmail.com', 'Accountant', 'Tuy, Batangas'),
(240262, NULL, 'Carmen Lopez', '09567890123', 'carmen.lopez@gmail.com', 'Chef', 'Balayan, Batangas'),
(240263, NULL, 'Sofia Lee', '09678901234', 'sofia.lee@gmail.com', 'Artist', 'Nasugbu, Batangas'),
(240264, NULL, 'Julia Kim', '09789012345', 'julia.kim@gmail.com', 'Scientist', 'Lian, Batangas'),
(240265, NULL, 'Rita Park', '09890123456', 'rita.park@gmail.com', 'Writer', 'Tuy, Batangas'),
(240266, NULL, 'Anna Maria', '09901234567', 'anna.maria@gmail.com', 'Pharmacist', 'Balayan, Batangas'),
(240267, NULL, 'Ella Stone', '09123456780', 'ella.stone@gmail.com', 'Designer', 'Nasugbu, Batangas'),
(240268, NULL, 'Nina Brown', '09234567801', 'nina.brown@gmail.com', 'Developer', 'Lian, Batangas'),
(240269, NULL, 'Olivia White', '09345678912', 'olivia.white@gmail.com', 'Sales Associate', 'Tuy, Batangas'),
(240270, NULL, 'Emma Watson', '09456789023', 'emma.watson@gmail.com', 'Marketing Manager', 'Balayan, Batangas'),
(240271, NULL, 'Sarah Connor', '09567890134', 'sarah.connor@gmail.com', 'Project Manager', 'Nasugbu, Batangas'),
(240272, NULL, 'Lucy Hale', '09678901245', 'lucy.hale@gmail.com', 'HR Specialist', 'Lian, Batangas'),
(240273, NULL, 'Mia Wong', '09789012356', 'mia.wong@gmail.com', 'Consultant', 'Tuy, Batangas'),
(240274, NULL, 'Chloe Zhang', '09890123467', 'chloe.zhang@gmail.com', 'Data Analyst', 'Balayan, Batangas'),
(240275, NULL, 'Ella Fitzgerald', '09123456791', 'ella.fitzgerald@gmail.com', 'Photographer', 'Nasugbu, Batangas'),
(240276, NULL, 'Maya Angelou', '09234567802', 'maya.angelou@gmail.com', 'Public Speaker', 'Lian, Batangas'),
(240554, 240554, 'mylene manjac', '09995533777', 'mylene@gmail.com', 'Agent', 'sampaga balayan batangas'),
(240555, 240555, 'melinda felices', '09304365358', 'melinda@gmail.com', 'businesswoman', 'quezon city manila'),
(240556, 240556, 'monica balagtas', '09123456781', 'monica@gmail.com', 'attorney', 'canda balayan batangas'),
(240666, 240666, NULL, NULL, NULL, NULL, NULL),
(240667, 240667, NULL, NULL, NULL, NULL, NULL),
(240668, 240668, NULL, NULL, NULL, NULL, NULL),
(240669, 240669, NULL, NULL, NULL, NULL, NULL),
(240670, 240670, NULL, NULL, NULL, NULL, NULL),
(240671, 240671, NULL, NULL, NULL, NULL, NULL),
(240672, 240672, NULL, NULL, NULL, NULL, NULL),
(240673, 240673, NULL, NULL, NULL, NULL, NULL),
(240674, 240674, NULL, NULL, NULL, NULL, NULL),
(240675, 240675, NULL, NULL, NULL, NULL, NULL),
(240676, 240676, NULL, NULL, NULL, NULL, NULL),
(240677, 240677, NULL, NULL, NULL, NULL, NULL),
(240678, 240678, NULL, NULL, NULL, NULL, NULL),
(240679, 240679, NULL, NULL, NULL, NULL, NULL),
(240680, 240680, NULL, NULL, NULL, NULL, NULL),
(240681, 240681, NULL, NULL, NULL, NULL, NULL),
(240682, 240682, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `contact_number`, `created_at`) VALUES
(1, 'principal', '1234', NULL, '', '', NULL, '2024-07-25 05:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `admin_id`, `date`, `time`, `description`, `location`, `created_at`, `updated_at`) VALUES
(17, 5, '2024-10-04', '00:00:00', 'Larry Bird', '08:00', '2024-10-28 01:58:34', '2024-10-28 01:58:34'),
(18, 5, '2024-10-11', '00:00:00', 'meeting', '08:00', '2024-10-28 03:22:59', '2024-10-28 03:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int(11) NOT NULL,
  `year_start` int(11) NOT NULL,
  `year_end` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `graduated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `year_start`, `year_end`, `active`, `graduated`) VALUES
(1, 2023, 2024, 0, 1),
(2, 2024, 2025, 0, 0),
(3, 2025, 2026, 0, 0),
(4, 2026, 2027, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `section_name` varchar(120) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `strand_id` int(11) DEFAULT NULL,
  `grade_level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `teacher_id`, `strand_id`, `grade_level`) VALUES
(30, 'Euclid', 46, 7, '12'),
(31, 'Pythagoras', 48, 7, '12'),
(32, 'Drucker', 49, 8, '12'),
(33, 'fayol', 50, 8, '12'),
(34, 'aristotle', 51, 9, '12'),
(35, 'confucius', 52, 9, '12'),
(36, 'Keller', 57, 10, '12'),
(37, 'Cleopatra', 58, 10, '12'),
(38, 'Lovelace', 59, 11, '12'),
(39, 'galileo', 60, 11, '11'),
(42, 'Archimedes', 62, 7, '11'),
(43, 'Descartes', 63, 7, '11'),
(44, 'Pacioli', 64, 8, '11'),
(45, 'Weber', 65, 8, '11'),
(46, 'Aphrodite', 66, 9, '11'),
(47, 'Artemis', 67, 9, '11'),
(48, 'Athena', 68, 9, '11'),
(49, 'Hera', 69, 9, '11'),
(50, 'Hermes', 70, 9, '11'),
(51, 'Venus', 71, 9, '11'),
(52, 'Ramsay', 72, 10, '11'),
(53, 'Goldman', 73, 10, '11'),
(54, 'Gates', 74, 11, '11'),
(55, 'Democritus', 53, 9, '12'),
(56, 'Freud', 54, 9, '12'),
(57, 'Locke', 55, 9, '12'),
(58, 'Plato', 56, 9, '12'),
(59, 'Rizal', 75, 12, '11');

-- --------------------------------------------------------

--
-- Table structure for table `section_assignment`
--

CREATE TABLE `section_assignment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_assignment`
--

INSERT INTO `section_assignment` (`id`, `student_id`, `teacher_id`, `section_id`, `school_year_id`) VALUES
(370, 240554, 59, 38, 2),
(371, 240555, 74, 54, 2),
(372, 240556, 60, 39, 2),
(482, 240666, 49, 32, 2),
(483, 240667, 49, 32, 2),
(484, 240668, 49, 32, 2),
(485, 240669, 49, 32, 2),
(486, 240670, 49, 32, 2),
(487, 240671, 49, 32, 2),
(488, 240672, 49, 32, 2),
(489, 240673, 49, 32, 2),
(490, 240674, 49, 32, 2),
(491, 240675, 49, 32, 2),
(492, 240676, 49, 32, 2),
(493, 240677, 49, 32, 2),
(494, 240678, 74, 54, 2),
(495, 240679, 67, 47, 2),
(496, 240680, 51, 34, 2),
(497, 240681, 49, 32, 2),
(498, 240682, 49, 32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `strands`
--

CREATE TABLE `strands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `strands`
--

INSERT INTO `strands` (`id`, `name`, `description`) VALUES
(7, 'STEM', 'Science, Technology, Engineering, and Mathematics'),
(8, 'ABM', 'Accountancy, Business, and Management'),
(9, 'HUMSS', 'Humanities and Social Sciences'),
(10, 'TVL-HE', 'Technical-Vocational-Livelihood - Home Economics'),
(11, 'TVL-ICT', 'Technical-Vocational-Livelihood - Information and Communications Technology'),
(12, 'BSIT', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `school_year_id` int(11) DEFAULT NULL,
  `lrn` varchar(255) DEFAULT NULL,
  `barangay` varchar(50) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `graduated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `middle_name`, `last_name`, `age`, `sex`, `section_id`, `contact_number`, `religion`, `birthdate`, `user_id`, `school_year_id`, `lrn`, `barangay`, `strand_id`, `graduated`) VALUES
(240554, 'John Paulmar', 'lontoc', 'Manjac', NULL, 'Male', 38, '09304365359', 'Roman Catholic', '2003-07-14', 74, NULL, '3421981300001', '', 0, 0),
(240555, 'ferdinand', 'felices', 'sacdalan', NULL, 'Male', 54, '09304365351', 'Roman Catholic', '2002-07-13', 75, NULL, '3421981300002', '', 0, 0),
(240556, 'juspher', 'balagtas', 'pedraza', NULL, 'Male', 39, '09917239861', 'Roman Catholic', '2003-06-12', 76, NULL, '3421981300003', '', 0, 0),
(240666, 'Magic', 'D.', 'Belen', NULL, 'Male', 32, NULL, NULL, NULL, 191, NULL, '3421981300005', 'Wawa', 0, 0),
(240667, 'Mark', 'J.', 'Cruz', NULL, 'Male', 32, NULL, NULL, NULL, 192, NULL, '3421981300006', 'Poblacion', 0, 0),
(240668, 'Jayson', 'E.', 'Lim', NULL, 'Male', 32, NULL, NULL, NULL, 193, NULL, '3421981300007', 'Banilad', 0, 0),
(240669, 'Super', 'D.', 'Man', NULL, 'Male', 32, NULL, NULL, NULL, 194, NULL, '3421981300008', 'Poblacion', 0, 0),
(240670, 'Peter', 'J.', 'Reyes', NULL, 'Male', 32, NULL, NULL, NULL, 195, NULL, '3421981300009', 'Poblacion', 0, 0),
(240671, 'Carlo', 'M.', 'Tan', NULL, 'Male', 32, NULL, NULL, NULL, 196, NULL, '3421981300010', 'Talisay', 0, 0),
(240672, 'Kenneth', '.', 'Villanueva', NULL, 'Male', 32, NULL, NULL, NULL, 197, NULL, '3421981300011', 'Banilad', 0, 0),
(240673, 'Maria', 'A.', 'Dizon', NULL, 'Female', 32, NULL, NULL, NULL, 198, NULL, '3421981300012', 'Talisay', 0, 0),
(240674, 'Liza', 'M.', 'Gomez', NULL, 'Female', 32, NULL, NULL, NULL, 199, NULL, '3421981300013', 'Banilad', 0, 0),
(240675, 'Jenny', 'R.', 'Ponce', NULL, 'Female', 32, NULL, NULL, NULL, 200, NULL, '3421981300014', 'Lagnas', 0, 0),
(240676, 'Sheila', 'M.', 'Rivera', NULL, 'Female', 32, NULL, NULL, NULL, 201, NULL, '3421981300015', 'Lagnas', 0, 0),
(240677, 'Alice', 'M.', 'Santos', NULL, 'Female', 32, NULL, NULL, NULL, 202, NULL, '3421981300016', 'Lagnas', 0, 0),
(240678, 'Jhon Denver', NULL, 'Alipustain', NULL, 'Male', 54, NULL, NULL, NULL, 203, NULL, '3421981300017', '', 0, 0),
(240679, 'Sasa', NULL, 'Gonzales', NULL, 'Male', 47, NULL, NULL, NULL, 204, NULL, '3421981300018', '', 0, 0),
(240680, 'Kaye', NULL, 'Cal', NULL, 'Male', 34, NULL, NULL, NULL, 205, NULL, '3421981300019', '', 0, 0),
(240681, 'drem', '.', 'drem', NULL, 'Male', 32, NULL, NULL, NULL, 206, NULL, '3421981300020', '', 0, 0),
(240682, 'Jps', NULL, 'Cortez', NULL, 'Male', 32, NULL, NULL, NULL, 207, NULL, '3421981300021', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `position`, `birthdate`, `sex`, `contact_number`, `address`, `section_id`) VALUES
(46, 'fritch', 'fritch', 'fritch', 'Marie', 'cortez', 'fritch@example.com', 'teacher', '1985-05-10', 'Female', '09123456789', 'Tuy, Batangas', NULL),
(48, 'eron', 'eron', 'eron', 'Anne', 'pangilinan', 'eron@example.com', 'teacher', '1990-03-15', 'Female', '09123456780', 'Nasugbu, Batangas', NULL),
(49, 'maria', 'maria', 'maria an', 'Lynn', 'busilig', 'maria@example.com', 'teacher', '1988-07-20', 'Female', '09123456781', 'Lian, Batangas', NULL),
(50, 'fritz', 'fritz', 'fritz', 'Luis', 'buenviaje', 'fritz@example.com', 'teacher', '1982-11-25', 'Male', '09123456782', 'Tuy, Batangas', NULL),
(51, 'nore', 'nore', 'norecel', 'Celeste', 'gaa', 'nore@example.com', 'teacher', '1980-02-10', 'Female', '09123456783', 'Nasugbu, Batangas', NULL),
(52, 'teresa', 'teresa', 'maria teresa', 'Rosa', 'descallar', 'teresa@example.com', 'teacher', '1975-12-05', 'Female', '09123456784', 'Lian, Batangas', NULL),
(53, 'cath', 'cath', 'catherene', 'Grace', 'veroya', 'cath@example.com', 'teacher', '1995-06-18', 'Female', '09123456785', 'Tuy, Batangas', NULL),
(54, 'diji', 'diji', 'dijinirah', 'Diane', 'guyagon', 'diji@example.com', 'teacher', '1986-04-22', 'Female', '09123456786', 'Nasugbu, Batangas', NULL),
(55, 'berna', 'berna', 'bernadette', 'Renee', 'digno', 'berna@example.com', 'teacher', '1989-09-12', 'Female', '09123456787', 'Lian, Batangas', NULL),
(56, 'ally', 'ally', 'allyson', 'Joy', 'montealegre', 'ally@example.com', 'teacher', '1992-08-30', 'Female', '09123456788', 'Tuy, Batangas', NULL),
(57, 'markj', 'markj', 'mark jhun', 'Lloyd', 'atienza', 'markj@example.com', 'teacher', '1987-01-14', 'Male', '09123456789', 'Nasugbu, Batangas', NULL),
(58, 'andria', 'andria', 'andria', 'Ava', 'zafra', 'andria@example.com', 'teacher', '1993-10-27', 'Female', '09123456790', 'Lian, Batangas', NULL),
(59, 'grace', 'grace', 'gracele', 'Lou', 'cabrera', 'grace@example.com', 'teacher', '1984-07-19', 'Female', '09123456791', 'Tuy, Batangas', NULL),
(60, 'lyze', 'lyze', 'lyzette', 'Fay', 'landicho', 'lyze@example.com', 'teacher', '1983-03-21', 'Female', '09123456792', 'Nasugbu, Batangas', NULL),
(62, 'Elsa', '$2y$10$tKrCS8VAYVItI/RKqHDJiOdZ4ZmS6W2.vobCbZD0GCKH.dvKVB7y6', 'Elsa', 'Camille', 'Capacia', 'elsa@example.com', 'teacher', '1991-05-15', 'Female', '09123456793', 'Lian, Batangas', NULL),
(63, 'Jerome', '$2y$10$kxNSOrBKh3/xwXnhjuScKutQbb1qlgVqlJsGekoApWcDmrXRNuAba', 'Jerome', 'Lee', 'Guevarra', 'jerome@example.com', 'teacher', '1988-11-02', 'Male', '09123456794', 'Tuy, Batangas', NULL),
(64, 'Melissa', '$2y$10$lNwN8VDb9SNpFvlv9kp5qO65DRFsMDQ2rtk48UJnsTWJW2giIFVJW', 'Melissa', 'Lynn', 'Mendoza', 'melissa@example.com', 'teacher', '1990-04-25', 'Female', '09123456795', 'Nasugbu, Batangas', NULL),
(65, 'Melody', '$2y$10$vaz6gW4DvkdiP6joFvkEnekh1HS/J/po3Z332Ed0WmGKf2tThl4l.', 'Melody', 'Ann', 'Acosta', 'melody@example.com', 'teacher', '1994-02-28', 'Female', '09123456796', 'Lian, Batangas', NULL),
(66, 'Mary', '$2y$10$vXeVyoHNDGeygic14Kt3Ceq.yOH9NFisNk5R6BKp2XcQfiqaQNICa', 'Mary Grace', 'Hope', 'Cabingan', 'mary@example.com', 'teacher', '1982-12-30', 'Female', '09123456797', 'Tuy, Batangas', NULL),
(67, 'April', '$2y$10$yp5YiyG/Rpzwp3bdGfcBJOaKeiQChs2OM5EulmtZUBkIzyhyV.2.S', 'April Catherine', 'Marie', 'Maniquez', 'april@example.com', 'teacher', '1995-01-05', 'Female', '09123456798', 'Nasugbu, Batangas', NULL),
(68, 'Karen', '$2y$10$dUG6WqC6RRdmzzFxXay8HOZpslN8wsfiVA6aF0G7VvRRuZStWtqs6', 'Karen Joy', 'Jade', 'Micarandayo', 'karen@example.com', 'teacher', '1986-08-18', 'Female', '09123456799', 'Lian, Batangas', NULL),
(69, 'Marjorie', '$2y$10$w40osK8kFpXn9a9Fy8PnXOgN1ZpZ8j9B.ASx3sDNE8e3CDWFdTSRm', 'Marjorie', 'Dawn', 'Jumarang', 'marjorie@example.com', 'teacher', '1981-09-09', 'Female', '09123456800', 'Tuy, Batangas', NULL),
(70, 'Jory', '$2y$10$yZXC0gA9oDtrfoTkUJAE/Oz6bpMcNBvjWW5xJ2fmb6eyI9ukwNH1K', 'Coleen Jory Anne', 'Ann', 'Alcoran', 'jory@example.com', 'teacher', '1992-06-29', 'Female', '09123456801', 'Nasugbu, Batangas', NULL),
(71, 'Maricel', '$2y$10$Vo2RYuxTk7LDf9PhKtoP9uuvRqFcQWfvaFSqd3jhElakVqwf/cCee', 'Maricel', 'Marie', 'Paredes', 'maricel@example.com', 'teacher', '1983-03-01', 'Female', '09123456802', 'Lian, Batangas', NULL),
(72, 'Lezlie', '$2y$10$AcOTT40NFv1Uk8IQLI452.Al3JQYm/NuyZOvu1SYyOiKexjVbeP..', 'Lezlie', 'Ann', 'Herandez', 'lezlie@example.com', 'teacher', '1984-02-14', 'Female', '09123456803', 'Tuy, Batangas', NULL),
(73, 'Rose', '$2y$10$Ni.M1FuMvUXYAGIKgG5NleDOQPzVm825j5R4o8xey9wQiddFtbB4W', 'April Rose', NULL, 'Subijana', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Lamei', '$2y$10$hT6X3uZdKuEHvGWxsKg1qeApOLGXInxPo5puInEtCxOzlgMX/iTAy', 'Lamei Ann', NULL, 'Butiong', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'juspher', '$2y$10$3z1ro1PMTP3tZ1OvUYSK8uU4W.sR82dVIgStvbXicqo3f99lfD2Y2', 'juspher', NULL, 'pedraza', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(74, '3421981300001', '', '3421981300001'),
(75, '3421981300002', '', '3421981300002'),
(76, '3421981300003', '', '3421981300003'),
(191, '3421981300005', '', '3421981300005'),
(192, '3421981300006', '', '3421981300006'),
(193, '3421981300007', '', '3421981300007'),
(194, '3421981300008', '', '3421981300008'),
(195, '3421981300009', '', '3421981300009'),
(196, '3421981300010', '', '3421981300010'),
(197, '3421981300011', '', '3421981300011'),
(198, '3421981300012', '', '3421981300012'),
(199, '3421981300013', '', '3421981300013'),
(200, '3421981300014', '', '3421981300014'),
(201, '3421981300015', '', '3421981300015'),
(202, '3421981300016', '', '3421981300016'),
(203, '3421981300017', '', '3421981300017'),
(204, '3421981300018', '', '3421981300018'),
(205, '3421981300019', '', '3421981300019'),
(206, '3421981300020', '', '3421981300020'),
(207, '3421981300021', '', '3421981300021');

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `reported_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `guard_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `violation_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violations`
--

INSERT INTO `violations` (`id`, `student_id`, `reported_at`, `guard_id`, `teacher_id`, `violation_id`, `admin_id`) VALUES
(122, 240554, '2024-12-02 02:38:53', NULL, NULL, 16, 2),
(123, 240555, '2024-12-02 02:38:54', NULL, NULL, 16, 2),
(124, 240556, '2024-12-02 02:38:54', NULL, NULL, 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `violation_list`
--

CREATE TABLE `violation_list` (
  `id` int(11) NOT NULL,
  `violation_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violation_list`
--

INSERT INTO `violation_list` (`id`, `violation_description`) VALUES
(13, 'Brawls'),
(6, 'Bullying'),
(7, 'Cheating'),
(5, 'Cutting Classes'),
(8, 'Disrespect to Teachers'),
(4, 'Improper Haircut'),
(3, 'Improper Uniform'),
(9, 'Littering'),
(1, 'Over the Bakod'),
(10, 'Smoking'),
(16, 'stealing'),
(2, 'Wearing Earring');

-- --------------------------------------------------------

--
-- Table structure for table `violation_reported`
--

CREATE TABLE `violation_reported` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `strand` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL CHECK (`grade` in (11,12)),
  `section` varchar(255) NOT NULL,
  `violation_description` int(11) NOT NULL,
  `reported_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violation_reported`
--

INSERT INTO `violation_reported` (`id`, `first_name`, `middle_name`, `last_name`, `strand`, `grade`, `section`, `violation_description`, `reported_at`) VALUES
(3, 'John Paulmar', 'lontoc', 'Manjac', 'TVL-HE', 11, 'Hera', 16, '2024-12-07 17:12:08'),
(4, 'ferdinand', 'felices', 'sacdalan', 'ABM', 11, 'Pythagoras', 2, '2024-12-07 18:35:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_complaints_teacher_id` (`teacher_id`);

--
-- Indexes for table `complaints_student`
--
ALTER TABLE `complaints_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_complaints_student_student_id` (`student_id`);

--
-- Indexes for table `fathers`
--
ALTER TABLE `fathers`
  ADD PRIMARY KEY (`parent_id`),
  ADD UNIQUE KEY `unique_student_id_father` (`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `guards`
--
ALTER TABLE `guards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `mothers`
--
ALTER TABLE `mothers`
  ADD PRIMARY KEY (`parent_id`),
  ADD UNIQUE KEY `unique_student_id_mother` (`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `strand_id` (`strand_id`);

--
-- Indexes for table `section_assignment`
--
ALTER TABLE `section_assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `school_year_id` (`school_year_id`),
  ADD KEY `section_assignment_ibfk_1` (`student_id`);

--
-- Indexes for table `strands`
--
ALTER TABLE `strands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_students_school_year` (`school_year_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_section` (`section_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `fk_guard` (`guard_id`),
  ADD KEY `fk_teacher` (`teacher_id`),
  ADD KEY `fk_violation_id` (`violation_id`),
  ADD KEY `fk_admin` (`admin_id`);

--
-- Indexes for table `violation_list`
--
ALTER TABLE `violation_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_violation_description` (`violation_description`);

--
-- Indexes for table `violation_reported`
--
ALTER TABLE `violation_reported`
  ADD PRIMARY KEY (`id`),
  ADD KEY `violation_reported_ibfk_1` (`violation_description`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `complaints_student`
--
ALTER TABLE `complaints_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `fathers`
--
ALTER TABLE `fathers`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240683;

--
-- AUTO_INCREMENT for table `guards`
--
ALTER TABLE `guards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mothers`
--
ALTER TABLE `mothers`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240683;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `section_assignment`
--
ALTER TABLE `section_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;

--
-- AUTO_INCREMENT for table `strands`
--
ALTER TABLE `strands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240683;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `violation_list`
--
ALTER TABLE `violation_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `violation_reported`
--
ALTER TABLE `violation_reported`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `fk_complaints_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `complaints_student`
--
ALTER TABLE `complaints_student`
  ADD CONSTRAINT `fk_complaints_student_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mothers`
--
ALTER TABLE `mothers`
  ADD CONSTRAINT `mothers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `fk_strand` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`id`),
  ADD CONSTRAINT `sections_ibfk_2` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`id`);

--
-- Constraints for table `section_assignment`
--
ALTER TABLE `section_assignment`
  ADD CONSTRAINT `section_assignment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `section_assignment_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `section_assignment_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `section_assignment_ibfk_4` FOREIGN KEY (`school_year_id`) REFERENCES `school_year` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_school_year` FOREIGN KEY (`school_year_id`) REFERENCES `school_year` (`id`),
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_section` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `violations`
--
ALTER TABLE `violations`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `fk_guard` FOREIGN KEY (`guard_id`) REFERENCES `guards` (`id`),
  ADD CONSTRAINT `fk_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `fk_violation_id` FOREIGN KEY (`violation_id`) REFERENCES `violation_list` (`id`),
  ADD CONSTRAINT `violations_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `violation_reported`
--
ALTER TABLE `violation_reported`
  ADD CONSTRAINT `violation_reported_ibfk_1` FOREIGN KEY (`violation_description`) REFERENCES `violation_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
