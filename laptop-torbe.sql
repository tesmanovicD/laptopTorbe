-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2018 at 02:17 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop-torbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Korisnicko_ime` varchar(30) NOT NULL,
  `Lozinka` varchar(35) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Ime` varchar(50) DEFAULT NULL,
  `Prezime` varchar(100) DEFAULT NULL,
  `Datum_rodjenja` date DEFAULT NULL,
  `JMBG` varchar(13) DEFAULT NULL,
  `Mobilni` varchar(20) DEFAULT NULL,
  `Adresa` varchar(50) DEFAULT NULL,
  `Postanski_broj` varchar(6) DEFAULT NULL,
  `Grad` varchar(20) DEFAULT NULL,
  `Drzava` varchar(20) DEFAULT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ID`, `Korisnicko_ime`, `Lozinka`, `Email`, `Ime`, `Prezime`, `Datum_rodjenja`, `JMBG`, `Mobilni`, `Adresa`, `Postanski_broj`, `Grad`, `Drzava`, `Admin`) VALUES
(1, 'test', '123', 'danites007@gmail.com', '', 'Tesmanovic', '0000-00-00', '', '', 'Stevana Filipovica 60/11', '24000', 'Subotica', 'Serbia', 0),
(2, 'danites', '123123', 'danites007@gmail.com', '', 'Tesmanovic', '0000-00-00', '', '', 'Stevana Filipovica 60/11', '24000', 'Subotica', 'Serbia', 0),
(3, 'rwe', '123', 'edincedin@gmail.com', '', 'Tesmanovic', '0000-00-00', '', '', 'Stevana Filipovica 60/11', '24000', 'Subotica', 'Serbia', 0),
(4, 'ertgert', '123', 'edincedin@gmail.com', '', '', '0000-00-00', '', '', '', '', '', '', 0),
(5, 'testte', '123123123', '12115231@vts.su.ac.rs', '', '', '0000-00-00', '', '', '', '', '', '', 0),
(6, 'kriptovani', '4297f44b13955235245b2497399d7a93', 'kript@gmail.com', '', '', '0000-00-00', '', '', '', '', '', '', 1),
(7, 'obican', '4297f44b13955235245b2497399d7a93', 'dadijawid@gmail.com', '', '', '0000-00-00', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stavke_torbe`
--

DROP TABLE IF EXISTS `stavke_torbe`;
CREATE TABLE IF NOT EXISTS `stavke_torbe` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(50) NOT NULL,
  `Opis` varchar(20) NOT NULL,
  `Cena` int(11) NOT NULL,
  `Slika` varchar(80) NOT NULL,
  `Alt` varchar(80) NOT NULL,
  `Link` varchar(150) NOT NULL,
  `Kategorija` enum('Asus','Hama','Lenovo','Spirit','Dell','Hp','Targus') NOT NULL,
  `Kolicina` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stavke_torbe`
--

INSERT INTO `stavke_torbe` (`ID`, `Naziv`, `Opis`, `Cena`, `Slika`, `Alt`, `Link`, `Kategorija`, `Kolicina`) VALUES
(1, 'ASUS Ranac ROG Ranger', 'Do 17\'\'', 18990, 'asus_ranac_rog_ranger.png', 'Asus Ranac ROG Ranger za laptop do 17 inca', 'https://www.gigatron.rs/rancevi/asus_ranac_rog_ranger_za_laptop_do_17_crna__not09743-98059', 'Asus', 0),
(2, 'ASUS Torba ROG Ranger', 'Do 15.6\'\'', 9990, 'asus_laptop_torba_rog_ranger.png', 'ASUS laptop torba ROG Ranger Messenger do 15.6 inca', 'https://www.gigatron.rs/torbe/asus_laptop_torba_rog_ranger_messenger-74031', 'Asus', 0),
(3, 'HAMA Ranac Tortuga - 101525', 'Do 17.3\'\'', 3190, 'hama_tortuga.png', 'HAMA Ranac Tortuga za laptop do 17.3 inca (Crna) - 101525', 'https://www.gigatron.rs/rancevi/hama_ranac_tortuga_za_laptop_do_173_crna__101525-106323', 'Asus', 0),
(4, 'HAMA Phuket - 101082', 'Do 15.6\'\'', 3690, 'hama_phuket.jpg', 'HAMA Phuket ranac za notebook do 15.6 inca - 101082', 'https://www.gigatron.rs/rancevi/hama_phuket_ranac_za_notebook_do_156__101082-30449', 'Asus', 0),
(5, 'HAMA Ranac Dublin - 101274', 'Do 17.3\'', 4290, 'hama_dublin.png', 'HAMA Ranac Dublin za laptop do 17.3 inca (Crna) - 101274', 'https://www.gigatron.rs/rancevi/hama_ranac_dublin_za_laptop_do_173_crna__101274-106305', 'Asus', 0),
(6, 'HAMA Phuket ranac za notebook - 101083', 'Do 17.3\'\'', 4590, 'hama_ranac_za_notebook.png', 'HAMA Phuket ranac za notebook do 17.3 inca - 101083', 'https://www.gigatron.rs/rancevi/hama_phuket_ranac_za_notebook_do_173__101083-49579', 'Asus', 0),
(7, 'HAMA torba za laptop Florence II- 00101569', 'Do 15.6\'\'', 4190, 'hama_florence.png', 'HAMA torba za laptop Florence II (Siva/crna) - 00101569', 'https://www.gigatron.rs/torbe/hama_torba_za_laptop_florence_ii_sivacrna__00101569-111631', 'Asus', 0),
(8, 'HAMA Torba Santorin za laptop - 101562', 'Do 13.3\'\'', 4490, 'hama_santorin.png', 'HAMA Torba Santorin za laptop do 13.3 inca(Braon) - 101562', 'https://www.gigatron.rs/torbe/hama_torba_santorin_za_laptop_do_133_braon__101562-106353', 'Asus', 0),
(9, 'HAMA Torba Miami za laptop - 101218', 'Do 15.6\'\'', 3990, 'hama_miami.png', 'HAMA Torba Miami za laptop do 15.6 inca (Crna) - 101218', 'https://www.gigatron.rs/torbe/hama_torba_miami_za_laptop_do_156_crna__101218-62749', 'Asus', 0),
(10, 'LENOVO Ranac za laptop B5650', 'Do 15.6\'\'', 4990, 'lenovo_ranac_B5650.png', 'LENOVO Ranac za laptop do 15.6 inca B5650 (Crni)', 'https://www.gigatron.rs/rancevi/lenovo_ranac_za_laptop_do_156_b5650_crni__888010315-103543', 'Asus', 0),
(11, 'LENOVO YC600-WW Ranac za laptop', 'Do 15.6\'\'', 5990, 'lenovo_yc600_ww.png', 'LENOVO YC600-WW Ranac za laptop do 15.6 inca', 'https://www.gigatron.rs/rancevi/lenovo_yc600ww-115311', 'Asus', 0),
(12, 'LENOVO Y Gaming Armored - GX40L16533', 'Do 17\'\'', 8990, 'lenovo_y_gaming_armored.png', 'LENOVO Y Gaming Armored - GX40L16533 Ranac za laptop, do 17 inca, Crna', 'https://www.gigatron.rs/rancevi/lenovo_y_gaming_armored__gx40l16533-115301', 'Asus', 0),
(13, 'LENOVO Ranac ThinkPad Professional Backpack', 'Do 15.6\'\'', 10990, 'lenovo_thinkpad.png', 'LENOVO Ranac ThinkPad Professional Backpack za laptop do 15.6 inca', 'https://www.gigatron.rs/rancevi/lenovo_ranac_thinkpad_professional_backpack_za_laptop_do_156-66213', 'Asus', 0),
(14, 'LENOVO Torba Simple Toploader T1050', 'Do 15.6\'\'', 1090, 'lenovo_simple_toploader.png', 'LENOVO Torba Simple Toploader T1050 za laptop do 15.6 inca', 'https://www.gigatron.rs/torbe/lenovo_torba_simple_toploader_t1050_za_laptop_do_156__888015205-77311', 'Asus', 0),
(15, 'LENOVO Torba T500 Top Loader- GX40J46741', 'Do 15.6\'\'', 3990, 'lenovo_toploader.png', 'LENOVO Torba za laptop do 15.6 inca T500 Top Loader (Crna) - GX40J46741', 'https://www.gigatron.rs/torbe/lenovo_torba_za_laptop_do_156_t500_top_loader_crna__gx40j46741-103541', 'Asus', 0),
(16, 'SPIRIT Ranac Carbon - TTS 405159', 'Do 17\'\'', 3990, 'spirit_carbon.png', 'SPIRIT Ranac Carbon - TTS 405159 do 17 inca', 'https://www.gigatron.rs/rancevi/spirit_ranac_carbon__tts_405159-100219', 'Asus', 0),
(17, 'SPIRIT Ranac Avenue - TTS 404840', 'Do 15.6\'\'', 3990, 'spirit_avenue.png', 'SPIRIT Ranac Avenue - TTS 404840 do 15.6 inca', 'https://www.gigatron.rs/rancevi/spirit_ranac_avenue__tts_404840-100233', 'Asus', 0),
(18, 'SPIRIT Ranac Carbon - TTS 405158', 'Do 17\'\'', 3990, 'spirit_carbon_pink.png', 'SPIRIT Ranac Carbon - TTS 405158', 'https://www.gigatron.rs/rancevi/spirit_ranac_carbon__tts_405158-100239', 'Asus', 0),
(19, 'SPIRIT Torba Business M - TTS 404849', 'Do 13.3\'\'', 2990, 'spirit_business_m.png', 'SPIRIT Torba Business M - TTS 404849 do 13.3 inca', 'https://www.gigatron.rs/torbe/spirit_torba_business_m__tts_404849-100221', 'Asus', 0),
(20, 'SPIRIT Torba Business L - TTS 404850', 'Do 15.6\'\'', 3490, 'spirit_business_l.png', 'SPIRIT Torba Business L - TTS 404850 do 15.6', 'https://www.gigatron.rs/torbe/spirit_torba_business_l__tts_404850-100243', 'Asus', 0),
(21, 'SPIRIT Torba Business XL - TTS 404851', 'Do 15.6\'\'', 3990, 'spirit_business_xl.png', 'SPIRIT Torba Business XL - TTS 404851 do 15.6 inca', 'https://www.gigatron.rs/torbe/spirit_torba_business_xl__tts_404851-100245', 'Asus', 0),
(22, 'DELL Ranac Alienware Vindicator', 'Do 17\'\'', 17990, 'dell_ranac_alienware_vindicator.png', 'DELL Ranac Alienware Vindicator za laptop do 17 inca', 'https://www.gigatron.rs/rancevi/dell_ranac_alienware_vindicator_za_laptop_do_17_crna__not10242-96953', 'Asus', 0),
(23, 'DELL Torba Essential Topload - NOT10601', 'Do 15.6\'\'', 2190, 'dell_torba_topload.png', 'DELL Torba Essential Topload za laptop do 15.6 inca (Crna) - NOT10601', 'https://www.gigatron.rs/torbe/dell_torba_essential_topload_za_laptop_do_156_crna__not10601-98915', 'Asus', 0),
(24, 'HP Powerup Backpack - 1JJ05AA', 'Do 17.3\'\'', 25990, 'hp_powerup_backpack.png', 'HP Powerup Backpack - 1JJ05AA - Ranac za laptop, do 17.3 inca', 'https://www.gigatron.rs/rancevi/hp_powerup_backpack__1jj05aa_-119744', 'Asus', 0),
(25, 'HP Ranac Executive Brown - P6N22AA', 'Do 15.6\'\'', 9900, 'hp_executive_brown.png', 'HP Ranac Executive Brown za laptop do 15.6 inca - P6N22AA', 'https://www.gigatron.rs/rancevi/hp_ranac_executive_brown_za_laptop_do_156__p6n22aa-81835', 'Asus', 0),
(26, 'HP Ranac Rolling Backpack- J6X32AA', 'Do 15.6\'\'', 8990, 'hp_rolling_backpack.png', 'HP Ranac Rolling Backpack za laptop do 15.6 inca - J6X32AA', 'https://www.gigatron.rs/rancevi/hp_ranac_rolling_backpack_za_laptop_do_156__j6x32aa-66929', 'Asus', 0),
(27, 'HP ranac za notebook - F8T76AA', 'Do 17.3\'\'', 7990, 'hp_ranac_za_notebook.png', 'HP ranac za notebook do 17.3 inca - F8T76AA', 'https://www.gigatron.rs/rancevi/hp_ranac_za_notebook_do_173__f8t76aa-37453', 'Asus', 0),
(28, 'HP Odyssey Backpack (Crna) - L8J88AA', 'Do 15.6\'\'', 4990, 'hp_odyssey.png', 'HP 15.6 inca Odyssey Backpack (Crna) - L8J88AA', 'https://www.gigatron.rs/rancevi/hp_156_odyssey_backpack_crna__l8j88aa-100003', 'Asus', 0),
(29, 'HP Torba Elite Top Load Colombian Leather', 'Do 14\'\'', 34990, 'hp_elite.png', 'HP Torba Elite Top Load Colombian Leather za laptop do 14 inca - T9H72AA', 'https://www.gigatron.rs/torbe/hp_torba_elite_top_load_colombian_leather_za_laptop_do_14__t9h72aa-92839', 'Asus', 0),
(30, 'HP Torba Executive Topload - K0S30AA', 'Do 15.6\'\'', 13990, 'hp_executive_topload.png', 'HP Torba Executive Topload za laptop do 15.6 inca - K0S30AA', 'https://www.gigatron.rs/torbe/hp_torba_executive_topload_za_laptop_do_156__k0s30aa-71343', 'Asus', 0),
(31, 'HP Torba Duotone Blue-Y4T19AA', 'Do 15.6\'\'', 2490, 'hp_duotone_blue.png', 'HP Torba Duotone Blue za laptop do 15.6 inca - Y4T19AA', 'https://www.gigatron.rs/torbe/hp_torba_duotone_blue_za_laptop_do_156__y4t19aa-90945', 'Asus', 0),
(32, 'HP Torba Duotone Red - Y4T18AA', 'Do 15.6\'\'', 2490, 'hp_duotone_red.png', 'HP Torba Duotone Red za laptop do 15.6 inca - Y4T18AA', 'https://www.gigatron.rs/torbe/hp_torba_duotone_red_za_laptop_do_156__y4t18aa-90961', 'Asus', 0),
(33, 'HP Torba Value Top Load Case - QB683AA', 'Do 18\'\'', 2990, 'hp_value.png', 'HP Torba Value Top Load Case za laptop do 18 inca - QB683AA', 'https://www.gigatron.rs/torbe/hp_torba_value_top_load_case_za_laptop_do_18__qb683aa-8379', 'Asus', 0),
(34, 'TARGUS Ranac za notebook- CN600', 'Do 15.4\'\'', 4490, 'targus_ranac.jpg', 'TARGUS Ranac za notebook 15.4 inca- CN600', 'https://www.gigatron.rs/rancevi/targus_ranac_za_notebook_154_cn600-6154', 'Asus', 0),
(35, 'TARGUS Torba za notebook- TAR300', 'Do 15.6\'\'', 2190, 'targus_torba_tar300.png', 'TARGUS Torba za notbook do 15.6 inca- TAR300', 'https://www.gigatron.rs/torbe/targus_torba_za_notbook_do_156_tar300-84953', 'Asus', 0),
(36, 'TARGUS Torba za notebook - CN31', 'Do 16\'\'', 2490, 'targus_cn31.jpg', 'TARGUS Torba za notebook 16 inca - CN31', 'https://www.gigatron.rs/torbe/targus_torba_za_notebook_16__cn31-17241', 'Asus', 0),
(37, 'TARGUS Torba za notebook - CN01', 'Do 16\'\'', 3990, 'targus_cn01.jpg', 'TARGUS Torba za notebook 16 inca - CN01', 'https://www.gigatron.rs/torbe/targus_torba_za_notebook_16__cn01-6142', 'Asus', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;