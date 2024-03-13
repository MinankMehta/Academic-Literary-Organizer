SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academic_records`
--
CREATE DATABASE IF NOT EXISTS `academic_records` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `academic_records`;

-- --------------------------------------------------------
CREATE TABLE `userdata` (
  `sno` int(11) NOT NULL,
  `Emailid` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Type` text NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`sno`, `Emailid`, `Password`, `Type`, `name`) VALUES
(1, 'admin@somaiya.edu', 'admin123', 'admin', 'admin'),
(2, 'teacher@somaiya.edu', 'teacher123', 'teacher', 'Latha'),
(3, 'student@somaiya.edu', 'student123', 'student', 'Bhavya');
--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`sno`);
ALTER TABLE `userdata`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `userdata` ADD COLUMN `sno` int AUTO_INCREMENT PRIMARY KEY;