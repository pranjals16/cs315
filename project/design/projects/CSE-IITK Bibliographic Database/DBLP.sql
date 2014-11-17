-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2011 at 04:46 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DBLP`
--

-- --------------------------------------------------------

--
-- Table structure for table `Auth`
--

CREATE TABLE IF NOT EXISTS `Auth` (
  `PId` int(10) NOT NULL,
  `AuthId` int(10) NOT NULL,
  KEY `PId` (`PId`),
  KEY `AuthId` (`AuthId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Auth`
--

INSERT INTO `Auth` (`PId`, `AuthId`) VALUES
(1, 11),
(1, 17),
(3, 14),
(4, 18),
(5, 18),
(9, 11),
(10, 11),
(11, 11),
(12, 11),
(13, 11),
(14, 11),
(15, 11),
(16, 11),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(25, 6),
(26, 14),
(27, 14),
(28, 14),
(29, 14),
(30, 11),
(31, 16),
(32, 21),
(33, 19),
(34, 19),
(35, 6),
(36, 18),
(37, 15),
(38, 6),
(39, 6),
(40, 1),
(41, 3),
(42, 18),
(43, 3),
(44, 3),
(45, 6),
(46, 18),
(47, 16),
(48, 21),
(49, 3),
(50, 10),
(50, 22),
(51, 3),
(52, 1),
(53, 6),
(54, 3),
(54, 7),
(55, 16),
(56, 16),
(57, 3),
(59, 18),
(60, 3),
(61, 6),
(62, 18),
(63, 18),
(64, 18),
(65, 18),
(66, 18),
(67, 18),
(68, 18),
(69, 18),
(70, 21),
(70, 3),
(71, 3),
(72, 3),
(73, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

CREATE TABLE IF NOT EXISTS `Author` (
  `AuthId` int(10) NOT NULL AUTO_INCREMENT,
  `AuthName` text NOT NULL,
  `Designation` text,
  `AuthMail` text NOT NULL,
  PRIMARY KEY (`AuthId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `Author`
--

INSERT INTO `Author` (`AuthId`, `AuthName`, `Designation`, `AuthMail`) VALUES
(1, 'Ajai Jain', 'Professor', 'ajain'),
(2, 'Amey Karkare', 'Assistant Professor', 'kakare'),
(3, 'Amitabha Mukerjee', 'Professor', 'amit'),
(4, 'Anil Seth', 'Associate Professor', 'seth'),
(5, 'Arnab Bhattacharya', 'Assistant Professor', 'arnabb'),
(6, 'Dheeraj Sanghi', 'Professor', 'dheeraj'),
(7, 'Harish Karnik', 'Professor and Head', 'hk'),
(8, 'Krithika Venkataramani', 'Assistant Professor', 'krithika'),
(9, 'Mainak Choudhari', 'Assistant Professor', 'mainakc'),
(10, 'Manindra Agrawal', 'N Rama Rao Chaired Professor', 'manindra'),
(11, 'Phalguni Gupta', 'Professor', 'pg'),
(12, 'Piyush P. Kurur', 'Assistant Professor', 'ppk'),
(13, 'Prabhakar T V', 'Professor', 'tvp'),
(14, 'R M K Sinha', 'Professor', 'rmk'),
(15, 'Rajat Moona', 'Poonam and Prabhu Goel Chaired Professor', 'moona'),
(16, 'Ratan K Ghosh', 'Professor', 'rkg'),
(17, 'Sanjay G Dhande', 'Professor and Director', 'sgd'),
(18, 'Sanjeev K Aggrawal', 'Professor', 'ska'),
(19, 'Sanjeev Saxena', 'Professor', 'ssax'),
(20, 'Satyadev Nandakumar', 'Assistant Professor', 'satyadev'),
(21, 'Shashank Mehta', 'Professor', 'skmehta'),
(22, 'Somenath Biswas', 'Professor', 'sb'),
(23, 'Subhajit Roy', 'Assistant Professor', 'subhajit'),
(24, 'Sumit Ganguly', 'Professor', 'sganguly'),
(25, 'Surender Baswana', 'Assistant Professor', 'sbaswana');

-- --------------------------------------------------------

--
-- Table structure for table `BelongsTo`
--

CREATE TABLE IF NOT EXISTS `BelongsTo` (
  `PId` int(10) NOT NULL,
  `RId` int(10) NOT NULL,
  KEY `PId` (`PId`),
  KEY `RId` (`RId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BelongsTo`
--

INSERT INTO `BelongsTo` (`PId`, `RId`) VALUES
(1, 17),
(2, 1),
(3, 11),
(4, 3),
(4, 5),
(5, 5),
(5, 22),
(6, 23),
(7, 23),
(8, 18),
(9, 5),
(10, 7),
(11, 7),
(11, 17),
(12, 17),
(13, 5),
(14, 7),
(15, 17),
(16, 2),
(16, 7),
(17, 1),
(18, 23),
(19, 3),
(20, 3),
(20, 23),
(21, 3),
(21, 23),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(27, 11),
(27, 12),
(26, 11),
(28, 21),
(29, 21),
(30, 7),
(30, 15),
(31, 5),
(31, 7),
(32, 2),
(32, 7),
(33, 15),
(34, 5),
(35, 3),
(36, 9),
(37, 10),
(38, 3),
(39, 3),
(40, 17),
(41, 21),
(42, 9),
(43, 11),
(44, 11),
(45, 3),
(46, 22),
(47, 3),
(48, 11),
(49, 11),
(50, 16),
(51, 11),
(52, 11),
(53, 3),
(54, 11),
(55, 3),
(56, 23),
(57, 11),
(58, 19),
(59, 1),
(60, 11),
(60, 17),
(61, 3),
(62, 7),
(63, 5),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 7),
(71, 21),
(72, 22),
(73, 11);

-- --------------------------------------------------------

--
-- Table structure for table `Cites`
--

CREATE TABLE IF NOT EXISTS `Cites` (
  `FromPId` int(10) NOT NULL,
  `ToPId` int(10) NOT NULL,
  KEY `FromPId` (`FromPId`),
  KEY `ToPId` (`ToPId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cites`
--

INSERT INTO `Cites` (`FromPId`, `ToPId`) VALUES
(59, 2),
(59, 17),
(36, 16),
(69, 4),
(69, 20),
(69, 25),
(69, 22),
(65, 19),
(65, 21),
(65, 25),
(65, 35),
(55, 20),
(55, 24),
(55, 38),
(34, 4),
(34, 5),
(34, 9),
(63, 34),
(31, 14),
(31, 16),
(70, 32),
(70, 30),
(42, 36),
(60, 27),
(60, 44),
(60, 52),
(52, 43),
(40, 12),
(40, 15),
(71, 28),
(71, 41),
(72, 5),
(56, 20);

-- --------------------------------------------------------

--
-- Table structure for table `Conference`
--

CREATE TABLE IF NOT EXISTS `Conference` (
  `CId` int(10) NOT NULL AUTO_INCREMENT,
  `CName` text NOT NULL,
  `Venue` text,
  `Year` int(4) DEFAULT NULL,
  PRIMARY KEY (`CId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `Conference`
--

INSERT INTO `Conference` (`CId`, `CName`, `Venue`, `Year`) VALUES
(1, 'Int. Journal of Engineering Simulation, Vol. 3(3)', NULL, 2002),
(2, 'IEEE Transaction on Software Engieneering', NULL, 2002),
(3, 'Pattern Recognition, Vol. 35, pp 875-893', NULL, 2002),
(4, 'Parallel and Distributed Processing and Applications (NPDPA 2002)', 'Tsukuba, Japan', 2002),
(5, '6th International High Performance Computing Conference', 'Bangalore', 2002),
(6, 'Proc. IADIS Internetionel Conference WWW/Internet 2002', 'Lisbon, Portugal', 2002),
(8, 'Proc. Principle and Practice of Programming in Java (PPPJ''02)', 'Dublin', 2002),
(9, 'Proceedings of International Workshop on Distributing Computing (IWDC)', 'Kolkata, India', 2002),
(10, 'Proceedings of International Conference on CIT', 'Bhubaneshwar, India', 2002),
(11, 'Proceedings of HPC Asia 2002 Conference', 'Bangalore, India', 2002),
(12, 'Proceedings of ICVGIP02', 'Ahmedabad, India', 2002),
(13, 'Proceedings of IASTED Int. Conference on PDCS', 'Cambridge, USA', 2002),
(14, 'Proceedings of 22nd Int. Conference on SCCC', 'Copiapo,Chile', 2002),
(15, 'Proceedings of IASTED Int. Conference on NPDCS', 'Japan', 2002),
(16, 'Proceedings of HiPC', 'Bangalore, India', 2002),
(17, 'Proc. 9th Asia Pacific Conference on Software Engineering, ASPEC2002', 'Gold Coast, Australia', 2002),
(18, 'First WWW/Internet conference', 'Portugal', 2002),
(19, 'Proc. First The First Eurasian Conference on Advances in information and Communication Technology', 'Tehran', 2002),
(20, 'Proceedings of IADIS Int''l Conference WWW/Internet ', 'Lisbon, Portugal', 2002),
(21, 'Proc. of 1st EurAsian Conf. on Advances in Info.& Commun.Technology', 'Shiraz, Iran', 2002),
(22, 'Proc. of 17th IEEE Region 10 Int''l Conf. on Computers, Commun.,Control and Power Engineering (IEEE TENCON 2002)', 'Beijing, China', 2002),
(23, 'Proc. of Conf. on IIT Research and Applications (CITRA 2002)', 'Kelana Jaya, Malayasia', 2002),
(24, 'Proc. of Int''l Conf. on Computer Communication (ICCC 2002)', 'Mumbai, India', 2002),
(25, 'Proc. of 3rd Int''l SANE Conference (SANE ''02)', 'Maastricht, Netherlands', 2002),
(26, '6th IASTED International Conference on Artificial Intelligence and Soft Computing (ASC2002)', 'Banff, Canada', 2002),
(27, '5th International Conference on Document Analysis and Recognition', 'Bangalore,India', 1999),
(28, 'Invited Paper, Language Engineering Conference LEC-2002', 'Hyderabad,India', 2002),
(29, 'Invited Paper at International Conference on Universal Knowledge and Language (ICUKL- 2002)', 'Goa', 2002),
(30, 'Journal on Mathematical Modeling & Algorithms, Vol. 2,1-16', NULL, 2003),
(31, 'Information Processing Letters, Vol 88, No. 4, pp 187-194', NULL, NULL),
(32, 'Journal of Electronic Testing: Theory and Applications, Vol 19, No. 3,pp 271-284', NULL, NULL),
(33, 'Graph and Combinatorics, Volume: 19, Year: 2003, Pages: 551 - 565', NULL, NULL),
(34, 'Parallel and Distributed Computing Volume: 63,Year: 2003, Pages: 775-785', NULL, NULL),
(35, '2nd Workshop on Hot Topics in Networks (HotNets-II) ', 'Cambridge, MA, USA', 2003),
(36, '21stInternational Conference on Applied Informatics 2003 (SE 2003)', 'Innnsbruck, Austria', 2003),
(37, 'Proc. 5th Nordu/USNIX Conference', 'Vasteras, Sweden', 2003),
(38, 'Proc. of IEEE Wireless Commun. and Networking Conf. (WCNC 2003)', 'New Orleans,LA', 2003),
(40, 'International Conference on Information Technology Coding and Computing (ITCC 2003)', 'Las Vegas, USA', 2003),
(41, '10th Conference of the European Chapter of the Association for Computational Linguistics (EACL03)', 'Budapest', 2003),
(42, 'International Conference CST 2003', 'Mexico', 2003),
(43, 'Seventh International Conference on Pattern Recognition and Information Processing PRIP 2003', 'Minsk, Belarus', 2003),
(44, 'Seventh International Conference on Pattern Recognition and Information Processing PRIP 2003', 'Minsk, Belarus', 2003),
(45, 'In Proc. of Int''l Conf. on Information Technology (ITPC 2003)', 'Kathmandu, Nepal', 2003),
(46, 'High Performance Computing in Science and Engineering', 'Moscow', 2003),
(47, 'Proceedings of 2003 IEEE CEC''03, pp 223-230', NULL, 2003),
(48, 'Workshop on document analysis and information retrieval', 'Madison', 2003),
(49, 'International Conference on Engineering in Education, ICEE', 'Valencia Spain', 2003),
(50, 'Journal of the ACM, Vol.50, No.4, pp.429 – 443', NULL, 2003),
(51, 'Proceedings of International Conference on Engineering Education', 'Valencia, Spain', 2003),
(52, 'IX Summit on Machine Translation', 'New Orleans, USA', 2003),
(53, 'In Proc. of 6th IFIP/IEEE Int''l Conf. on Management of Multimedia Networks and Services (MMNS 2003)', 'Belfast, UK', 2003),
(54, 'IEEE International Conference on Systems, Man and Cybernetics', 'Washington DC', 2003),
(55, 'IEEE TENCON 2003', NULL, 2003),
(57, 'International Seminar on Downsizing Technology for Rural Development (ISDTRD)', 'Bhubaneswar', 2003),
(58, 'Workshop on Metadata for Security (WMS), OTM 2003', 'Catania, Sicily, Italy', 2003),
(59, 'Seventh Conference on Software Engineering and Applications', 'Los Angeles', 2003),
(60, 'EDS-PLM User''s Conference', 'Pune, Maharashtra', 2003),
(61, 'Second Workshop on Hot Topics in Networks (HotNets-II)', 'Cambridge (MA, USA)', 2003),
(62, 'CIT 2003', NULL, 2003),
(63, 'IWDC 2003', NULL, 2003),
(66, 'Mobile Commerce, Allied Publisher', NULL, 2003),
(70, '6th International Conference of the Association of Asia Pecific Operational Research Societies', 'New Delhi, India', 2003),
(71, 'Convergences 03, International Conference on the Convergence of Knowledge, Culture, Language and Information Tech, Library of Alexandria', 'Alexandria,Egypt', 2003),
(72, '10thInternational Conference on High Performance Computing (HiPC 2003) Dec', 'Hyderabad', 2003),
(73, 'Indian International Conference on Artificial Intelligence (IICAI)', 'Hyderabad, India', 2003);

-- --------------------------------------------------------

--
-- Table structure for table `Keyword`
--

CREATE TABLE IF NOT EXISTS `Keyword` (
  `PId` int(10) NOT NULL,
  `Word` text,
  KEY `PId` (`PId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Keyword`
--

INSERT INTO `Keyword` (`PId`, `Word`) VALUES
(1, 'Geometric Modeling, Surface Modeling, End Mills, Tool Geometry, Mapping'),
(2, 'Software metrics, software process improvement (SPI), statistical process control (SPC), control charts, inspections/\r\nreviews, software quality control'),
(3, 'Devanagari Script,Character fusion,\r\nCharacter/Text Recognition, Prototype Construction,\r\nCharacter fragmentation,\r\nCharacter,segmentation/decomposition.'),
(4, 'Compiling, distributed memory'),
(5, 'distributed, automatic data layout'),
(6, 'Software Exchange, Component Specification, CDML, XML, Component Licensing.'),
(7, 'URI Scheme for Objects, Object Browser'),
(8, 'Software, Operating Systems'),
(9, 'coloring graph CREW PRAM'),
(10, 'sorting mesh'),
(11, 'selection algorithm'),
(12, 'digital satellite '),
(13, 'Parallel Algorithms, Bi-dimensional Pattern Matching,\r\nScaling, CREW PRAM'),
(14, 'deterministic algorithms , list processing'),
(15, 'string matching'),
(16, 'DFA minimization'),
(17, 'lessons software'),
(18, 'Replicated web servers, load balancing, testbed, comparison'),
(19, 'proximity load balancing'),
(20, 'Replicated web servers, load balancing, testbed, comparison'),
(21, 'Using Proximity Information for Load Balancing in Geographically Distributed Web Server Systems'),
(22, 'Strategies Query Localization  Ad-hoc On-demand Distance Vector Routing'),
(23, 'Study Electronic Market  Bandwidth'),
(24, 'Enhancing Bandwidth Utilization Bluetooth Optimal SAR'),
(25, 'Argus Distributed Network Intrusion Detection System'),
(26, 'News Headlines, Translation, English to Hindi, NLP'),
(27, 'Dictionary Correction  Optically Read Devanagari Character Strings'),
(28, 'Machine Translation Indian Perspective'),
(29, 'Building Infrastructure for MT R & D: An Indian Perspective'),
(30, 'Incremental Algorithm Maximum Flow Problem'),
(31, 'k-core, ad hoc networks, distributed algorithms, rooted core, routing'),
(32, 'Modeling fault coverage random test patterns'),
(33, 'Local Nature  Brooks'' Colouring degree 3 Graphs, Graph Combinatorics'),
(34, 'Fast Parallel Edge Colouring of Graphs J'),
(35, '802.11'),
(36, 'Automated Generation Code Compliance Checkers'),
(37, 'Userdev Framework user Level Device Drivers Linux'),
(38, 'A Simple Code Allocation Protocol for Maximizing Throughput in CDMA Based Ad-hoc Networks'),
(39, 'Location Determination Mobile Device IEEE 802.11 Access Point Signals '),
(40, 'Stochastic Image Compression Fractals'),
(41, 'bilingual parser Hindi English code-switching structures'),
(42, 'A Framework to Generate Code Optimizers Automatically'),
(43, 'surveillance system human action recognition'),
(44, 'Applying real coded genetic algorithms Gabor filter bank design supervised texture classification segmentation'),
(45, 'Ulysses - A New Approach to Maintaining Connectivity'),
(46, 'Optimized Code Generation for Adaptive Irregular Problems'),
(47, 'Mobile Computing Environment, Distributed Computing Environment, E-Ticket, Validation'),
(48, 'Indirect symbolic correlation approach to unsegmented text recognition'),
(49, 'BRICS: An Indian Experiment In Educational Robotics'),
(50, 'Primality Identity Testing Chinese Remaindering'),
(51, 'BRiCS An Indian Experiment in Educational Robotics'),
(52, 'AnglaHindi An English to Hindi Machine Translation System'),
(53, 'On Reciprocal Altruism and its Application to QoS'),
(54, 'Artificial ontogenesis of controllers for robotic behavior using VLG GA'),
(55, 'mobile computing , mobile radio , modelling , object-oriented methods , telecommunication computing'),
(56, 'Web Ticker: An Adaptable News-based Information Retrieval Tool for WEB Navigator'),
(57, 'Build Robots Create Science (BRiCS) - Digital Learning Tools without a Computer'),
(58, 'Simplifying CORBA security service to support service level access control'),
(59, 'Test Coverage Analysis: A Method for Generic Reporting'),
(60, 'Interactive Shape Optimization for Aesthetics using Genetic Algorithms'),
(61, 'Turning 802.11 Inside Out'),
(62, 'Hybrid Approach Model Workflow Business Process'),
(63, 'Location management by movement prediction using mobility patterns and regional route maps'),
(64, 'A Routing Algorithm for Multi-Hop Mobile Ad Hoc Network Using Additively Weighted Delaunay Triangulation'),
(65, 'A Survey on Event Notification Service System'),
(66, 'Trends in Mobile Commmerce'),
(67, 'Transaction Models and Enabling Technology for Mobile Commerce'),
(68, 'Ensuring Atomic Uses of E-Tickets by Mobile Users: A Security Mechanism in Mobile Commmerce'),
(69, 'Smart Card Based Protocol for Secure Access of Mobile Host in IPv6 Foreign N/W'),
(70, 'A New Algorithm for Universal Groebner Basis for Toric Ideals'),
(71, 'Universal Networking Language - A Tool for Language-Independent Semantics'),
(72, 'A Cost-effective Multiple Camera Vision System using Firewire Cameras and Software Synchronization'),
(73, 'Pointing Gesture Detection');

-- --------------------------------------------------------

--
-- Table structure for table `Paper`
--

CREATE TABLE IF NOT EXISTS `Paper` (
  `PId` int(10) NOT NULL AUTO_INCREMENT,
  `PTitle` text NOT NULL,
  `DOI` text,
  `PRank` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=229 ;

--
-- Dumping data for table `Paper`
--

INSERT INTO `Paper` (`PId`, `PTitle`, `DOI`, `PRank`) VALUES
(1, 'Geometric Modeling of Side Milling Cutting Tool Surfaces', '10.1007/s00170-002-1447-3', 0),
(2, 'Optimum control limits for employing Statistical process control in software process', '10.1109/TSE.2002.1158286', 1),
(3, 'Segmentation of touching and fused Devanagari Characters', '10.1016/S0031-3203(01)00081-4', 0),
(4, 'A Scheme for Automatic Data Layout in Distributed Machines', NULL, 2),
(5, 'A Distribution Analysis Technique For Automatics Data Layout for Dsitributed Memory Machines', NULL, 2),
(6, 'ComponentXchange: An E- Excange for Software Components', NULL, 0),
(7, 'Accessing CORBA Objects on the Web', '10.1.1.104.1434', 0),
(8, 'Design and Implementation of a portable and Extensible FTP to NFS Gateway', NULL, 0),
(9, 'Approximating the Range Sum of a Graph on CREW PRAM', '10.1007/3-540-36385-8_31', 1),
(10, 'A Generalized Bitonic Sorting Technique for a Q-Dimensional Mesh Connected Computer', NULL, 0),
(11, 'An Efficient Parallel Selection Algorithm', NULL, 0),
(12, 'Digital Watermarking of Satellite Images', '10.1.1.12.132', 1),
(13, 'Parallel Bi-dimensional Pattern Matching With Scaling', '10.1.1.139.538', 0),
(14, 'Approximation and On-line Algorithms for List-update Problem', '10.1109/SCCC.2002.1173169', 1),
(15, 'Cost Optimal String Matching Algorithm on Linear Arrays', NULL, 1),
(16, 'A Parallel DFA minimization Algorithm', '10.1.1.112.6395', 2),
(17, 'Lessons learned in framework-based software process Improvement', '10.1109/APSEC.2002.1182995', 1),
(18, 'A testbed for evaluating load balancing strategies', NULL, 0),
(19, 'Using proximity information For load balancing in geographically distributed web server Systems', '10.1007/3-540-36087-5_77', 1),
(20, 'A Testbed for Performance Evaluation of Load Balancing Schemes for Web server Systems.', NULL, 3),
(21, 'Using Proximity Information for Load Balancing in Geographically Distributed Web Server Systems', NULL, 1),
(22, 'Strategies for Query Localization in Ad-hoc On-demand Distance Vector Routing', '10.1.1.14.3123', 1),
(23, 'A Study of Electronic Market for Bandwidth', NULL, 0),
(24, 'Enhancing Bandwidth Utilization in Bluetooth Using Optimal SAR', NULL, 1),
(25, 'Argus - A Distributed Network Intrusion Detection System', '10.1.1.16.2771', 2),
(26, 'Translating News Headings from English to Hindi', NULL, 0),
(27, 'Partitioning and Searching Dictionary for Correction of Optically Read Devanagari Character Strings', '10.1007/s100320100066', 1),
(28, 'Machine Translation: An Indian Perspective', '10.1109/LEC.2002.1182306', 1),
(29, 'Building Infrastructure for MT R & D: An Indian Perspective', NULL, 0),
(30, 'An Incremental Algorithm for Maximum Flow Problem', '10.1023/A:1023607406540', 1),
(31, 'Distributed Algorithms for Finding and Maintaining a k-Tree Core in a Dynamic Network', '10.1016/S0020-0190(03)00365-X', 0),
(32, 'Modeling fault coverage of random test patterns', '10.1023/A:1023796929359', 1),
(33, 'Local Nature of Brooks'' Colouring for degree 3 Graphs, Graph and Combinatorics', '10.1007/s00373-002-0520-x', 0),
(34, 'Fast Parallel Edge Colouring of Graphs J', '10.1016/S0743-7315(03)00115-1', 1),
(35, 'Turning 802.11 Inside-Out', '10.1.1.9.9592', 1),
(36, 'Automated Generation of Code Compliance Checkers', '10.1.1.5.8049', 1),
(37, 'Userdev: A Framework for user Level Device Drivers in Linux', '10.1.1.3.4461', 0),
(38, 'A Simple Code Allocation Protocol for Maximizing Throughput in CDMA Based Ad-hoc Networks', '10.1109/WCNC.2003.1200576  ', 1),
(39, 'Location Determination of a Mobile Device Using IEEE 802.11Access Point Signals', '10.1.1.16.7183', 0),
(40, 'Stochastic Image Compression using Fractals', '10.1109/ITCC.2003.1197593  ', 0),
(41, 'A Bilingual Parser for Hindi, English and Code-Switching Structures', '10.1.1.132.6122', 1),
(42, 'A Framework to Generate Code Optimizers Automatically', '10.1.1.6.1520', 0),
(43, 'A surveillance system with human action recognition', NULL, 1),
(44, 'Applying real coded genetic algorithms to Gabor filter bank design for supervised texture classification and segmentation', '10.1.1.106.9156', 1),
(45, 'Ulysses - A New Approach to Maintaining Connectivity', NULL, 0),
(46, 'Optimized Code Generation for Adaptive Irregular Problems', NULL, 0),
(47, 'Two Distributed Algorithms for E-Ticket Validation Protocols for Mobile Clients', '10.1109/COEC.2003.1210253', 0),
(48, 'Indirect symbolic correlation approach to unsegmented text recognition', '10.1.1.129.6035', 0),
(49, 'BRICS: An Indian Experiment In Educational Robotics', NULL, 0),
(50, 'Primality and Identity Testing via Chinese Remaindering', NULL, 0),
(51, 'BRiCS An Indian Experiment in Educational Robotics', NULL, 0),
(52, 'AnglaHindi: An English to Hindi Machine Translation System', NULL, 1),
(53, 'On Reciprocal Altruism and its Application to QoS', NULL, 0),
(54, 'Artificial ontogenesis of controllers for robotic behavior using VLG GA', '10.1109/ICSMC.2003.1244411', 0),
(55, 'Mobichart For Modeling Mobile Computing Tasks', '10.1109/TENCON.2003.1273313 ', 0),
(56, 'Web Ticker: An Adaptable News-based Information Retrieval Tool for WEB Navigator', '10.1.1.6.2862', 0),
(57, 'Build Robots Create Science (BRiCS) - Digital Learning Tools without a Computer', NULL, 0),
(58, 'Simplifying CORBA security service to support service level access control', NULL, 0),
(59, 'Test Coverage Analysis: A Method for Generic Reporting', NULL, 0),
(60, 'Interactive Shape Optimization for Aesthetics using Genetic Algorithms', NULL, 0),
(61, 'Turning 802.11 Inside Out', NULL, 0),
(62, 'A Hybrid Approach To Model Workflow in Business Process', NULL, 0),
(63, 'Location Management by Movement Prediction Using Mobility Patterns and Regional Route Maps', '10.1.1.75.780', 0),
(64, 'A Routing Algorithm for Multi-Hop Mobile Ad Hoc Network Using Additively Weighted Delaunay Triangulation', NULL, 0),
(65, 'A Survey on Event Notification Service System', NULL, 0),
(66, 'Trends in Mobile Commmerce', NULL, 0),
(67, 'Transaction Models and Enabling Technology for Mobile Commerce', NULL, 0),
(68, 'Ensuring Atomic Uses of E-Tickets by Mobile Users: A Security Mechanism in Mobile Commmerce', NULL, 0),
(69, 'Smart Card Based Protocol for Secure Access of Mobile Host in IPv6 Foreign N/W', NULL, 0),
(70, 'A New Algorithm for Universal Groebner Basis for Toric Ideals', NULL, 0),
(71, 'Universal Networking Language - A Tool for Language-Independent Semantics', '10.1.1.102.2118', 0),
(72, 'A Cost-effective Multiple Camera Vision System using Firewire Cameras and Software Synchronization', NULL, 0),
(73, 'Pointing Gesture Detection', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `PublishedIn`
--

CREATE TABLE IF NOT EXISTS `PublishedIn` (
  `PId` int(10) NOT NULL,
  `CId` int(10) NOT NULL,
  PRIMARY KEY (`PId`),
  KEY `CId` (`CId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PublishedIn`
--

INSERT INTO `PublishedIn` (`PId`, `CId`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 6),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 38),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 55),
(57, 57),
(58, 58),
(59, 59),
(60, 60),
(61, 61),
(62, 62),
(64, 62),
(65, 62),
(63, 63),
(66, 66),
(67, 66),
(68, 66),
(69, 66),
(70, 70),
(71, 71),
(72, 72),
(73, 73);

-- --------------------------------------------------------

--
-- Table structure for table `ResearchArea`
--

CREATE TABLE IF NOT EXISTS `ResearchArea` (
  `RId` int(10) NOT NULL AUTO_INCREMENT,
  `RName` text NOT NULL,
  PRIMARY KEY (`RId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `ResearchArea`
--

INSERT INTO `ResearchArea` (`RId`, `RName`) VALUES
(1, 'Software Engineering'),
(2, 'Theoretical Computer Science'),
(3, 'Mobile/Wireless,Computer Networks'),
(4, 'Databases'),
(5, 'Distributed Systems'),
(6, 'Embedded Systems'),
(7, 'Algorithms'),
(8, 'CAD and Graphics'),
(9, 'Compilers'),
(10, 'Computer Architecture'),
(11, 'Machine Learning and Cognition'),
(12, 'Data Mining'),
(13, 'Computational Geometry'),
(14, 'Operating Systems'),
(15, 'Graph Theory'),
(16, 'Number Theory'),
(17, 'Biometrics and Vision'),
(18, 'Programming Languages'),
(19, 'Security'),
(20, 'Functional Programming'),
(21, 'Natural Language Processing'),
(22, 'Grid and High Performance Computing'),
(23, 'Internet and Web Technology');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Auth`
--
ALTER TABLE `Auth`
  ADD CONSTRAINT `Auth_ibfk_1` FOREIGN KEY (`PId`) REFERENCES `Paper` (`PId`),
  ADD CONSTRAINT `Auth_ibfk_2` FOREIGN KEY (`AuthId`) REFERENCES `Author` (`AuthId`);

--
-- Constraints for table `BelongsTo`
--
ALTER TABLE `BelongsTo`
  ADD CONSTRAINT `BelongsTo_ibfk_1` FOREIGN KEY (`PId`) REFERENCES `Paper` (`PId`),
  ADD CONSTRAINT `BelongsTo_ibfk_2` FOREIGN KEY (`RId`) REFERENCES `ResearchArea` (`RId`);

--
-- Constraints for table `Cites`
--
ALTER TABLE `Cites`
  ADD CONSTRAINT `Cites_ibfk_1` FOREIGN KEY (`FromPId`) REFERENCES `Paper` (`PId`),
  ADD CONSTRAINT `Cites_ibfk_2` FOREIGN KEY (`ToPId`) REFERENCES `Paper` (`PId`);

--
-- Constraints for table `Keyword`
--
ALTER TABLE `Keyword`
  ADD CONSTRAINT `Keyword_ibfk_1` FOREIGN KEY (`PId`) REFERENCES `Paper` (`PId`);

--
-- Constraints for table `PublishedIn`
--
ALTER TABLE `PublishedIn`
  ADD CONSTRAINT `PublishedIn_ibfk_1` FOREIGN KEY (`PId`) REFERENCES `Paper` (`PId`),
  ADD CONSTRAINT `PublishedIn_ibfk_2` FOREIGN KEY (`CId`) REFERENCES `Conference` (`CId`);
