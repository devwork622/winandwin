-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2022 at 10:41 AM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `win_n_win`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `iCountryId` int(11) NOT NULL,
  `vCountry` varchar(52) NOT NULL DEFAULT '',
  `vCountryCode` varchar(10) NOT NULL,
  `eStatus` enum('Active','Inactive') DEFAULT 'Active',
  `vCountryImage` varchar(255) DEFAULT NULL,
  `vCurrency` varchar(255) DEFAULT NULL,
  `vCountryPhoneCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`iCountryId`, `vCountry`, `vCountryCode`, `eStatus`, `vCountryImage`, `vCurrency`, `vCountryPhoneCode`) VALUES
(1, 'Aruba', 'ABW', 'Active', 'ABW.png', 'AWG', NULL),
(2, 'Afghanistan', 'AFG', 'Active', 'AFG.png', 'AFN', NULL),
(3, 'Angola', 'AGO', 'Active', 'AGO.png', 'AOA', NULL),
(4, 'Anguilla', 'AIA', 'Active', 'AIA.png', 'XCD', NULL),
(5, 'Aland Islands', 'ALA', 'Active', 'ALA.png', 'EUR', NULL),
(6, 'Albania', 'ALB', 'Active', 'ALB.png', 'ALL', NULL),
(7, 'Andorra', 'AND', 'Active', 'AND.png', 'EUR', NULL),
(8, 'Netherlands Antilles', 'ANT', 'Active', 'ANT.png', 'ANG', NULL),
(9, 'United Arab Emirates', 'ARE', 'Active', 'ARE.png', 'AED', NULL),
(10, 'Argentina', 'ARG', 'Active', 'ARG.png', 'ARS', NULL),
(11, 'Armenia', 'ARM', 'Active', 'ARM.png', 'AMD', NULL),
(12, 'American Samoa', 'ASM', 'Active', 'ASM.png', 'USD', NULL),
(13, 'Antarctica', 'ATA', 'Active', 'ATA.png', '', NULL),
(14, 'French Southern territories', 'ATF', 'Active', 'ATF.png', 'EUR', NULL),
(15, 'Antigua and Barbuda', 'ATG', 'Active', 'ATG.png', 'XCD', NULL),
(16, 'Australia', 'AUS', 'Active', 'AUS.png', 'AUD', NULL),
(17, 'Austria', 'AUT', 'Active', 'AUT.png', 'EUR', NULL),
(18, 'Azerbaijan', 'AZE', 'Active', 'AZE.png', 'AZN', NULL),
(19, 'Burundi', 'BDI', 'Active', 'BDI.png', 'BIF', NULL),
(20, 'Belgium', 'BEL', 'Active', 'BEL.png', 'EUR', NULL),
(21, 'Benin', 'BEN', 'Active', 'BEN.png', 'XOF', NULL),
(22, 'Caribbean Netherlands', 'BES', 'Active', 'BES.png', NULL, NULL),
(23, 'Burkina Faso', 'BFA', 'Active', 'BFA.png', 'XOF', NULL),
(24, 'Bangladesh', 'BGD', 'Active', 'BGD.png', 'BDT', NULL),
(25, 'Bulgaria', 'BGR', 'Active', 'BGR.png', 'BGN', NULL),
(26, 'Bahrain', 'BHR', 'Active', 'BHR.png', 'BHD', NULL),
(27, 'Bahamas', 'BHS', 'Active', 'BHS.png', 'BSD', NULL),
(28, 'Bosnia and Herzegovina', 'BIH', 'Active', 'BIH.png', 'BAM', NULL),
(29, 'Saint Barthelemy', 'BLM', 'Active', 'BLM.png', 'EUR', NULL),
(30, 'Belarus', 'BLR', 'Active', 'BLR.png', 'BYN', NULL),
(31, 'Belize', 'BLZ', 'Active', 'BLZ.png', 'BZD', NULL),
(32, 'Bermuda', 'BMU', 'Active', 'BMU.png', 'BMD', NULL),
(33, 'Bolivia', 'BOL', 'Active', 'BOL.png', 'BOB', NULL),
(34, 'Brazil', 'BRA', 'Active', 'BRA.png', 'BRL', NULL),
(35, 'Barbados', 'BRB', 'Active', 'BRB.png', 'BBD', NULL),
(36, 'Brunei', 'BRN', 'Active', 'BRN.png', 'BND', NULL),
(37, 'Bhutan', 'BTN', 'Active', 'BTN.png', 'BTN', NULL),
(38, 'Bouvet Island', 'BVT', 'Active', 'BVT.png', 'NOK', NULL),
(39, 'Botswana', 'BWA', 'Active', 'BWA.png', 'BWP', NULL),
(40, 'Central African Republic', 'CAF', 'Active', 'CAF.png', 'XAF', NULL),
(41, 'Canada', 'CAN', 'Active', 'CAN.png', 'CAD', NULL),
(42, 'Cyberbunker', 'CBR', 'Active', 'CBR.png', NULL, NULL),
(43, 'Cocos (Keeling) Islands', 'CCK', 'Active', 'CCK.png', 'AUD', NULL),
(44, 'Switzerland', 'CHE', 'Active', 'CHE.png', 'CHW', NULL),
(45, 'Chile', 'CHL', 'Active', 'CHL.png', 'CLF', NULL),
(46, 'China', 'CHN', 'Active', 'CHN.png', 'CNY', NULL),
(47, 'Côte d’Ivoire', 'CIV', 'Active', 'CIV.png', 'XOF', NULL),
(48, 'Cameroon', 'CMR', 'Active', 'CMR.png', 'XAF', NULL),
(49, 'Congo, Democratic Republic', 'COD', 'Active', 'COD.png', 'CDF', NULL),
(50, 'Congo', 'COG', 'Active', 'COG.png', 'XAF', NULL),
(51, 'Cook Islands', 'COK', 'Active', 'COK.png', 'NZD', NULL),
(52, 'Colombia', 'COL', 'Active', 'COL.png', 'COU', NULL),
(53, 'Comoros', 'COM', 'Active', 'COM.png', 'KMF', NULL),
(54, 'Cape Verde', 'CPV', 'Active', 'CPV.png', 'CVE', NULL),
(55, 'Costa Rica', 'CRI', 'Active', 'CRI.png', 'CRC', NULL),
(56, 'Cuba', 'CUB', 'Active', 'CUB.png', 'CUC', NULL),
(57, 'Curacao', 'CUW', 'Active', 'CUW.png', 'ANG', NULL),
(58, 'Christmas Island', 'CXR', 'Active', 'CXR.png', 'AUD', NULL),
(59, 'Cayman Islands', 'CYM', 'Active', 'CYM.png', 'KYD', NULL),
(60, 'Cyprus', 'CYP', 'Active', 'CYP.png', 'EUR', NULL),
(61, 'Czech Republic', 'CZE', 'Active', 'CZE.png', 'CZK', NULL),
(62, 'Germany', 'DEU', 'Active', 'DEU.png', 'EUR', NULL),
(63, 'Djibouti', 'DJI', 'Active', 'DJI.png', 'DJF', NULL),
(64, 'Dominica', 'DMA', 'Active', 'DMA.png', 'XCD', NULL),
(65, 'Denmark', 'DNK', 'Active', 'DNK.png', 'DKK', NULL),
(66, 'Dominican Republic', 'DOM', 'Active', 'DOM.png', 'DOP', NULL),
(67, 'Algeria', 'DZA', 'Active', 'DZA.png', 'DZD', NULL),
(68, 'Ecuador', 'ECU', 'Active', 'ECU.png', 'USD', NULL),
(69, 'Egypt', 'EGY', 'Active', 'EGY.png', 'EGP', NULL),
(70, 'Eritrea', 'ERI', 'Active', 'ERI.png', 'ERN', NULL),
(71, 'Western Sahara', 'ESH', 'Active', 'ESH.png', 'MAD', NULL),
(72, 'Spain', 'ESP', 'Active', 'ESP.png', 'EUR', NULL),
(73, 'Estonia', 'EST', 'Active', 'EST.png', 'EUR', NULL),
(74, 'Ethiopia', 'ETH', 'Active', 'ETH.png', 'ETB', NULL),
(75, 'European Union', 'EUR', 'Active', 'EUR.png', 'EUR', NULL),
(76, 'Finland', 'FIN', 'Active', 'FIN.png', 'EUR', NULL),
(77, 'Fiji Islands', 'FJI', 'Active', 'FJI.png', 'FJD', NULL),
(78, 'Falkland Islands', 'FLK', 'Active', 'FLK.png', 'FKP', NULL),
(79, 'France', 'FRA', 'Active', 'FRA.png', 'EUR', NULL),
(80, 'Faroe Islands', 'FRO', 'Active', 'FRO.png', 'DKK', NULL),
(81, 'Micronesia, Federated States', 'FSM', 'Active', 'FSM.png', NULL, NULL),
(82, 'Gabon', 'GAB', 'Active', 'GAB.png', 'XAF', NULL),
(83, 'United Kingdom', 'GBR', 'Active', 'GBR.png', 'GBP', NULL),
(84, 'Georgia', 'GEO', 'Active', 'GEO.png', 'GEL', NULL),
(85, 'Guernsey', 'GGY', 'Active', 'GGY.png', 'GBP', NULL),
(86, 'Ghana', 'GHA', 'Active', 'GHA.png', 'GHS', NULL),
(87, 'Gibraltar', 'GIB', 'Active', 'GIB.png', 'GIP', NULL),
(88, 'Guinea', 'GIN', 'Active', 'GIN.png', 'GNF', NULL),
(89, 'Guadeloupe', 'GLP', 'Active', 'GLP.png', 'EUR', NULL),
(90, 'Gambia', 'GMB', 'Active', 'GMB.png', 'GMD', NULL),
(91, 'Guinea-Bissau', 'GNB', 'Active', 'GNB.png', 'XOF', NULL),
(92, 'Equatorial Guinea', 'GNQ', 'Active', 'GNQ.png', 'XAF', NULL),
(93, 'Greece', 'GRC', 'Active', 'GRC.png', 'EUR', NULL),
(94, 'Grenada', 'GRD', 'Active', 'GRD.png', 'XCD', NULL),
(95, 'Greenland', 'GRL', 'Active', 'GRL.png', 'DKK', NULL),
(96, 'Guatemala', 'GTM', 'Active', 'GTM.png', 'GTQ', NULL),
(97, 'French Guiana', 'GUF', 'Active', 'GUF.png', 'EUR', NULL),
(98, 'Guam', 'GUM', 'Active', 'GUM.png', 'USD', NULL),
(99, 'Guyana', 'GUY', 'Active', 'GUY.png', 'GYD', NULL),
(100, 'Hong Kong', 'HKG', 'Active', 'HKG.png', 'HKD', NULL),
(101, 'Heard Island and McDonald Islands', 'HMD', 'Active', 'HMD.png', 'AUD', NULL),
(102, 'Honduras', 'HND', 'Active', 'HND.png', 'HNL', NULL),
(103, 'Croatia', 'HRV', 'Active', 'HRV.png', 'HRK', NULL),
(104, 'Haiti', 'HTI', 'Active', 'HTI.png', 'USD', NULL),
(105, 'Hungary', 'HUN', 'Active', 'HUN.png', 'HUF', NULL),
(106, 'Indonesia', 'IDN', 'Active', 'IDN.png', 'IDR', NULL),
(107, 'Isle of Man', 'IMN', 'Active', 'IMN.png', 'GBP', NULL),
(108, 'India', 'IND', 'Active', 'IND.png', 'INR', '91'),
(109, 'British Indian Ocean Territory', 'IOT', 'Active', 'IOT.png', 'USD', NULL),
(110, 'Ireland', 'IRL', 'Active', 'IRL.png', 'EUR', NULL),
(111, 'Iran', 'IRN', 'Active', 'IRN.png', 'IRR', NULL),
(112, 'Iraq', 'IRQ', 'Active', 'IRQ.png', 'IQD', NULL),
(113, 'Iceland', 'ISL', 'Active', 'ISL.png', 'ISK', NULL),
(114, 'Israel', 'ISR', 'Active', 'ISR.png', 'ILS', NULL),
(115, 'Italy', 'ITA', 'Active', 'ITA.png', 'EUR', NULL),
(116, 'Jamaica', 'JAM', 'Active', 'JAM.png', 'JMD', NULL),
(117, 'Jersey', 'JEY', 'Active', 'JEY.png', 'GBP', NULL),
(118, 'Jordan', 'JOR', 'Active', 'JOR.png', 'JOD', NULL),
(119, 'Japan', 'JPN', 'Active', 'JPN.png', 'JPY', NULL),
(120, 'Kazakstan', 'KAZ', 'Active', 'KAZ.png', 'KZT', NULL),
(121, 'Kenya', 'KEN', 'Active', 'KEN.png', 'KES', NULL),
(122, 'Kyrgyzstan', 'KGZ', 'Active', 'KGZ.png', 'KGS', NULL),
(123, 'Cambodia', 'KHM', 'Active', 'KHM.png', 'KHR', NULL),
(124, 'Kiribati', 'KIR', 'Active', 'KIR.png', 'AUD', NULL),
(125, 'Saint Kitts and Nevis', 'KNA', 'Active', 'KNA.png', 'XCD', NULL),
(126, 'South Korea', 'KOR', 'Active', 'KOR.png', 'KRW', NULL),
(127, 'Kuwait', 'KWT', 'Active', 'KWT.png', 'KWD', NULL),
(128, 'Laos', 'LAO', 'Active', 'LAO.png', 'LAK', NULL),
(129, 'Lebanon', 'LBN', 'Active', 'LBN.png', 'LBP', NULL),
(130, 'Liberia', 'LBR', 'Active', 'LBR.png', 'LRD', NULL),
(131, 'Libya', 'LBY', 'Active', 'LBY.png', 'LYD', NULL),
(132, 'Saint Lucia', 'LCA', 'Active', 'LCA.png', 'XCD', NULL),
(133, 'Liechtenstein', 'LIE', 'Active', 'LIE.png', 'CHF', NULL),
(134, 'Sri Lanka', 'LKA', 'Active', 'LKA.png', 'LKR', NULL),
(135, 'Lesotho', 'LSO', 'Active', 'LSO.png', 'ZAR', NULL),
(136, 'Lithuania', 'LTU', 'Active', 'LTU.png', 'EUR', NULL),
(137, 'Luxembourg', 'LUX', 'Active', 'LUX.png', 'EUR', NULL),
(138, 'Latvia', 'LVA', 'Active', 'LVA.png', 'EUR', NULL),
(139, 'Macao', 'MAC', 'Active', 'MAC.png', 'MOP', NULL),
(140, 'Saint Martin', 'MAF', 'Active', 'MAF.png', 'EUR', NULL),
(141, 'Morocco', 'MAR', 'Active', 'MAR.png', 'MAD', NULL),
(142, 'Monaco', 'MCO', 'Active', 'MCO.png', 'EUR', NULL),
(143, 'Moldova', 'MDA', 'Active', 'MDA.png', 'MDL', NULL),
(144, 'Madagascar', 'MDG', 'Active', 'MDG.png', 'MGA', NULL),
(145, 'Maldives', 'MDV', 'Active', 'MDV.png', 'MVR', NULL),
(146, 'Mexico', 'MEX', 'Active', 'MEX.png', 'MXV', NULL),
(147, 'Marshall Islands', 'MHL', 'Active', 'MHL.png', 'USD', NULL),
(148, 'Macedonia', 'MKD', 'Active', 'MKD.png', 'MKD', NULL),
(149, 'Mali', 'MLI', 'Active', 'MLI.png', 'XOF', NULL),
(150, 'Malta', 'MLT', 'Active', 'MLT.png', 'EUR', NULL),
(151, 'Myanmar', 'MMR', 'Active', 'MMR.png', 'MMK', NULL),
(152, 'Montenegro', 'MNE', 'Active', 'MNE.png', 'EUR', NULL),
(153, 'Mongolia', 'MNG', 'Active', 'MNG.png', 'MNT', NULL),
(154, 'Northern Mariana Islands', 'MNP', 'Active', 'MNP.png', 'USD', NULL),
(155, 'Mozambique', 'MOZ', 'Active', 'MOZ.png', 'MZN', NULL),
(156, 'Mauritania', 'MRT', 'Active', 'MRT.png', 'MRU', NULL),
(157, 'Montserrat', 'MSR', 'Active', 'MSR.png', 'XCD', NULL),
(158, 'Martinique', 'MTQ', 'Active', 'MTQ.png', 'EUR', NULL),
(159, 'Mauritius', 'MUS', 'Active', 'MUS.png', 'MUR', NULL),
(160, 'Malawi', 'MWI', 'Active', 'MWI.png', 'MWK', NULL),
(161, 'Malaysia', 'MYS', 'Active', 'MYS.png', 'MYR', NULL),
(162, 'Mayotte', 'MYT', 'Active', 'MYT.png', 'EUR', NULL),
(163, 'Namibia', 'NAM', 'Active', 'NAM.png', 'ZAR', NULL),
(164, 'New Caledonia', 'NCL', 'Active', 'NCL.png', 'XPF', NULL),
(165, 'Niger', 'NER', 'Active', 'NER.png', 'XOF', NULL),
(166, 'Norfolk Island', 'NFK', 'Active', 'NFK.png', 'AUD', NULL),
(167, 'Nigeria', 'NGA', 'Active', 'NGA.png', 'NGN', NULL),
(168, 'Nicaragua', 'NIC', 'Active', 'NIC.png', 'NIO', NULL),
(169, 'Niue', 'NIU', 'Active', 'NIU.png', 'NZD', NULL),
(170, 'Netherlands', 'NLD', 'Active', 'NLD.png', 'EUR', NULL),
(171, 'Norway', 'NOR', 'Active', 'NOR.png', 'NOK', NULL),
(172, 'Nepal', 'NPL', 'Active', 'NPL.png', 'NPR', NULL),
(173, 'Nauru', 'NRU', 'Active', 'NRU.png', 'AUD', NULL),
(174, 'New Zealand', 'NZL', 'Active', 'NZL.png', 'NZD', NULL),
(175, 'Oman', 'OMN', 'Active', 'OMN.png', 'OMR', NULL),
(176, 'Pakistan', 'PAK', 'Active', 'PAK.png', 'PKR', NULL),
(177, 'Panama', 'PAN', 'Active', 'PAN.png', 'USD', NULL),
(178, 'Pitcairn', 'PCN', 'Active', 'PCN.png', 'NZD', NULL),
(179, 'Peru', 'PER', 'Active', 'PER.png', 'PEN', NULL),
(180, 'Philippines', 'PHL', 'Active', 'PHL.png', 'PHP', NULL),
(181, 'Palau', 'PLW', 'Active', 'PLW.png', 'USD', NULL),
(182, 'Papua New Guinea', 'PNG', 'Active', 'PNG.png', 'PGK', NULL),
(183, 'Poland', 'POL', 'Active', 'POL.png', 'PLN', NULL),
(184, 'Puerto Rico', 'PRI', 'Active', 'PRI.png', 'USD', NULL),
(185, 'North Korea', 'PRK', 'Active', 'PRK.png', 'KPW', NULL),
(186, 'Portugal', 'PRT', 'Active', 'PRT.png', 'EUR', NULL),
(187, 'Paraguay', 'PRY', 'Active', 'PRY.png', 'PYG', NULL),
(188, 'Palestine', 'PSE', 'Active', 'PSE.png', NULL, NULL),
(189, 'French Polynesia', 'PYF', 'Active', 'PYF.png', 'XPF', NULL),
(190, 'Qatar', 'QAT', 'Active', 'QAT.png', 'QAR', NULL),
(191, 'Réunion', 'REU', 'Active', 'REU.png', 'EUR', NULL),
(192, 'Romania', 'ROM', 'Active', 'ROM.png', 'RON', NULL),
(193, 'Russia', 'RUS', 'Active', 'RUS.png', 'RUB', NULL),
(194, 'Rwanda', 'RWA', 'Active', 'RWA.png', 'RWF', NULL),
(195, 'Saudi Arabia', 'SAU', 'Active', 'SAU.png', 'SAR', NULL),
(196, 'Sudan', 'SDN', 'Active', 'SDN.png', 'SDG', NULL),
(197, 'Senegal', 'SEN', 'Active', 'SEN.png', 'XOF', NULL),
(198, 'Singapore', 'SGP', 'Active', 'SGP.png', 'SGD', NULL),
(199, 'South Georgia and the South Sandwich Islands', 'SGS', 'Active', 'SGS.png', 'GBP', NULL),
(200, 'Saint Helena', 'SHN', 'Active', 'SHN.png', 'SHP', NULL),
(201, 'Svalbard and Jan Mayen', 'SJM', 'Active', 'SJM.png', 'NOK', NULL),
(202, 'Solomon Islands', 'SLB', 'Active', 'SLB.png', 'SBD', NULL),
(203, 'Sierra Leone', 'SLE', 'Active', 'SLE.png', 'SLL', NULL),
(204, 'El Salvador', 'SLV', 'Active', 'SLV.png', 'USD', NULL),
(205, 'San Marino', 'SMR', 'Active', 'SMR.png', 'EUR', NULL),
(206, 'Somalia', 'SOM', 'Active', 'SOM.png', 'SOS', NULL),
(207, 'Saint Pierre and Miquelon', 'SPM', 'Active', 'SPM.png', 'EUR', NULL),
(208, 'Serbia', 'SRB', 'Active', 'SRB.png', 'RSD', NULL),
(209, 'South Sudan', 'SSD', 'Active', 'SSD.png', 'SSP', NULL),
(210, 'Sao Tome and Principe', 'STP', 'Active', 'STP.png', 'STN', NULL),
(211, 'Suriname', 'SUR', 'Active', 'SUR.png', 'SRD', NULL),
(212, 'Slovakia', 'SVK', 'Active', 'SVK.png', 'EUR', NULL),
(213, 'Slovenia', 'SVN', 'Active', 'SVN.png', 'EUR', NULL),
(214, 'Sweden', 'SWE', 'Active', 'SWE.png', 'SEK', NULL),
(215, 'Swaziland', 'SWZ', 'Active', 'SWZ.png', 'SZL', NULL),
(216, 'Sint Maarten', 'SXM', 'Active', 'SXM.png', 'ANG', NULL),
(217, 'Seychelles', 'SYC', 'Active', 'SYC.png', 'SCR', NULL),
(218, 'Syria', 'SYR', 'Active', 'SYR.png', 'SYP', NULL),
(219, 'Turks and Caicos Islands', 'TCA', 'Active', 'TCA.png', 'USD', NULL),
(220, 'Chad', 'TCD', 'Active', 'TCD.png', 'XAF', NULL),
(221, 'Togo', 'TGO', 'Active', 'TGO.png', 'XOF', NULL),
(222, 'Thailand', 'THA', 'Active', 'THA.png', 'THB', NULL),
(223, 'Tajikistan', 'TJK', 'Active', 'TJK.png', 'TJS', NULL),
(224, 'Tokelau', 'TKL', 'Active', 'TKL.png', 'NZD', NULL),
(225, 'Turkmenistan', 'TKM', 'Active', 'TKM.png', 'TMT', NULL),
(226, 'East Timor', 'TMP', 'Active', 'TMP.png', NULL, NULL),
(227, 'Tonga', 'TON', 'Active', 'TON.png', 'TOP', NULL),
(228, 'Trinidad and Tobago', 'TTO', 'Active', 'TTO.png', 'TTD', NULL),
(229, 'Tunisia', 'TUN', 'Active', 'TUN.png', 'TND', NULL),
(230, 'Turkey', 'TUR', 'Active', 'TUR.png', 'TRY', NULL),
(231, 'Tuvalu', 'TUV', 'Active', 'TUV.png', 'AUD', NULL),
(232, 'Taiwan', 'TWN', 'Active', 'TWN.png', 'TWD', NULL),
(233, 'Tanzania', 'TZA', 'Active', 'TZA.png', 'TZS', NULL),
(234, 'Uganda', 'UGA', 'Active', 'UGA.png', 'UGX', NULL),
(235, 'Ukraine', 'UKR', 'Active', 'UKR.png', 'UAH', NULL),
(236, 'United States Minor Outlying Islands', 'UMI', 'Active', 'UMI.png', 'USD', NULL),
(237, 'Uruguay', 'URY', 'Active', 'URY.png', 'UYW', NULL),
(238, 'USA', 'USA', 'Active', 'USA.png', 'USD', NULL),
(239, 'Uzbekistan', 'UZB', 'Active', 'UZB.png', 'UZS', NULL),
(240, 'Vatican (Holy See)', 'VAT', 'Active', 'VAT.png', 'EUR', NULL),
(241, 'Saint Vincent and the Grenadines', 'VCT', 'Active', 'VCT.png', 'XCD', NULL),
(242, 'Venezuela', 'VEN', 'Active', 'VEN.png', 'VES', NULL),
(243, 'Virgin Islands, British', 'VGB', 'Active', 'VGB.png', 'USD', NULL),
(244, 'Virgin Islands, U.S.', 'VIR', 'Active', 'VIR.png', 'USD', NULL),
(245, 'Vietnam', 'VNM', 'Active', 'VNM.png', NULL, NULL),
(246, 'Vanuatu', 'VUT', 'Active', 'VUT.png', 'VUV', NULL),
(247, 'Wallis and Futuna', 'WLF', 'Active', 'WLF.png', 'XPF', NULL),
(248, 'Samoa', 'WSM', 'Active', 'WSM.png', 'WST', NULL),
(249, 'Kosovo', 'XKX', 'Active', 'XKX.png', NULL, NULL),
(250, 'Yemen', 'YEM', 'Active', 'YEM.png', 'YER', NULL),
(251, 'South Africa', 'ZAF', 'Active', 'ZAF.png', 'ZAR', NULL),
(252, 'Zambia', 'ZMB', 'Active', 'ZMB.png', 'ZMW', NULL),
(253, 'Zimbabwe', 'ZWE', 'Active', 'ZWE.png', 'ZWL', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `draws`
--

CREATE TABLE `draws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `draw_date` date NOT NULL,
  `is_current` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `draws`
--

INSERT INTO `draws` (`id`, `draw_date`, `is_current`, `created_at`, `updated_at`) VALUES
(1, '2022-07-25', '0', '2022-07-12 18:30:00', '2022-07-25 07:36:27'),
(2, '2022-07-26', '1', '2022-07-25 07:36:27', '2022-07-25 07:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `draw_winners`
--

CREATE TABLE `draw_winners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `draw_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `draw_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `draw_winners`
--

INSERT INTO `draw_winners` (`id`, `draw_id`, `user_id`, `ticket_number`, `draw_date`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '48,24,38,40,32,15,2', '2022-07-25', '2022-07-25 07:33:46', '2022-07-25 07:33:46'),
(2, 1, NULL, '8,39,1,43,44,35,1', '2022-07-25', '2022-07-25 07:36:27', '2022-07-25 07:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `id` int(11) NOT NULL,
  `name` varchar(52) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`id`, `name`) VALUES
(1, 'Afghan'),
(2, 'Albanian'),
(3, 'Algerian'),
(4, 'American'),
(5, 'Andorran'),
(6, 'Angolan'),
(7, 'Antiguans'),
(8, 'Argentinean'),
(9, 'Armenian'),
(10, 'Australian'),
(11, 'Austrian'),
(12, 'Azerbaijani'),
(13, 'Bahamian'),
(14, 'Bahraini'),
(15, 'Bangladeshi'),
(16, 'Barbadian'),
(17, 'Barbudans'),
(18, 'Batswana'),
(19, 'Belarusian'),
(20, 'Belgian'),
(21, 'Belizean'),
(22, 'Beninese'),
(23, 'Bhutanese'),
(24, 'Bolivian'),
(25, 'Bosnian'),
(26, 'Brazilian'),
(27, 'British'),
(28, 'Bruneian'),
(29, 'Bulgarian'),
(30, 'Burkinabe'),
(31, 'Burmese'),
(32, 'Burundian'),
(33, 'Cambodian'),
(34, 'Cameroonian'),
(35, 'Canadian'),
(36, 'Cape Verdean'),
(37, 'Central African'),
(38, 'Chadian'),
(39, 'Chilean'),
(40, 'Chinese'),
(41, 'Colombian'),
(42, 'Comoran'),
(43, 'Congolese'),
(44, 'Costa Rican'),
(45, 'Croatian'),
(46, 'Cuban'),
(47, 'Cypriot'),
(48, 'Czech'),
(49, 'Danish'),
(50, 'Djibouti'),
(51, 'Dominican'),
(52, 'Dutch'),
(53, 'East Timorese'),
(54, 'Ecuadorean'),
(55, 'Egyptian'),
(56, 'Emirian'),
(57, 'Equatorial Guinean'),
(58, 'Eritrean'),
(59, 'Estonian'),
(60, 'Ethiopian'),
(61, 'Fijian'),
(62, 'Filipino'),
(63, 'Finnish'),
(64, 'French'),
(65, 'Gabonese'),
(66, 'Gambian'),
(67, 'Georgian'),
(68, 'German'),
(69, 'Ghanaian'),
(70, 'Greek'),
(71, 'Grenadian'),
(72, 'Guatemalan'),
(73, 'Guinea-Bissauan'),
(74, 'Guinean'),
(75, 'Guyanese'),
(76, 'Haitian'),
(77, 'Herzegovinian'),
(78, 'Honduran'),
(79, 'Hungarian'),
(80, 'I-Kiribati'),
(81, 'Icelander'),
(82, 'Indian'),
(83, 'Indonesian'),
(84, 'Iranian'),
(85, 'Iraqi'),
(86, 'Irish'),
(87, 'Israeli'),
(88, 'Italian'),
(89, 'Ivorian'),
(90, 'Jamaican'),
(91, 'Japanese'),
(92, 'Jordanian'),
(93, 'Kazakhstani'),
(94, 'Kenyan'),
(95, 'Kittian and Nevisian'),
(96, 'Kuwaiti'),
(97, 'Kyrgyz'),
(98, 'Laotian'),
(99, 'Latvian'),
(100, 'Lebanese'),
(101, 'Liberian'),
(102, 'Libyan'),
(103, 'Liechtensteiner'),
(104, 'Lithuanian'),
(105, 'Luxembourger'),
(106, 'Macedonian'),
(107, 'Malagasy'),
(108, 'Malawian'),
(109, 'Malaysian'),
(110, 'Maldivan'),
(111, 'Malian'),
(112, 'Maltese'),
(113, 'Marshallese'),
(114, 'Mauritanian'),
(115, 'Mauritian'),
(116, 'Mexican'),
(117, 'Micronesian'),
(118, 'Moldovan'),
(119, 'Monacan'),
(120, 'Mongolian'),
(121, 'Moroccan'),
(122, 'Mosotho'),
(123, 'Motswana'),
(124, 'Mozambican'),
(125, 'Namibian'),
(126, 'Nauruan'),
(127, 'Nepalese'),
(128, 'New Zealander'),
(129, 'Nicaraguan'),
(130, 'Nigerian'),
(131, 'Nigerien'),
(132, 'North Korean'),
(133, 'Northern Irish'),
(134, 'Norwegian'),
(135, 'Omani'),
(136, 'Pakistani'),
(137, 'Palauan'),
(138, 'Panamanian'),
(139, 'Papua New Guinean'),
(140, 'Paraguayan'),
(141, 'Peruvian'),
(142, 'Polish'),
(143, 'Portuguese'),
(144, 'Qatari'),
(145, 'Romanian'),
(146, 'Russian'),
(147, 'Rwandan'),
(148, 'Saint Lucian'),
(149, 'Salvadoran'),
(150, 'Samoan'),
(151, 'San Marinese'),
(152, 'Sao Tomean'),
(153, 'Saudi'),
(154, 'Scottish'),
(155, 'Senegalese'),
(156, 'Serbian'),
(157, 'Seychellois'),
(158, 'Sierra Leonean'),
(159, 'Singaporean'),
(160, 'Slovakian'),
(161, 'Slovenian'),
(162, 'Solomon Islander'),
(163, 'Somali'),
(164, 'South African'),
(165, 'South Korean'),
(166, 'Spanish'),
(167, 'Sri Lankan'),
(168, 'Sudanese'),
(169, 'Surinamer'),
(170, 'Swazi'),
(171, 'Swedish'),
(172, 'Swiss'),
(173, 'Syrian'),
(174, 'Taiwanese'),
(175, 'Tajik'),
(176, 'Tanzanian'),
(177, 'Thai'),
(178, 'Togolese'),
(179, 'Tongan'),
(180, 'Trinidadian or Tobagonian'),
(181, 'Tunisian'),
(182, 'Turkish'),
(183, 'Tuvaluan'),
(184, 'Ugandan'),
(185, 'Ukrainian'),
(186, 'Uruguayan'),
(187, 'Uzbekistani'),
(188, 'Venezuelan'),
(189, 'Vietnamese'),
(190, 'Welsh'),
(191, 'Yemenite'),
(192, 'Zambian'),
(193, 'Zimbabwean');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `wallet_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `paypal_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `draw_id` int(11) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_name`, `email`, `mobile`, `total_amount`, `wallet_amount`, `paypal_amount`, `draw_id`, `transaction_id`, `transaction_data`, `created_at`, `updated_at`) VALUES
(1, 2, 'James Smith', 'james@mailinator.com', '123456123', '80', '[object HTMLLabelElement]', '70', 1, NULL, NULL, '2022-07-13 09:27:15', '2022-07-13 09:27:15'),
(2, 2, 'James Smith', 'james@mailinator.com', '123456123', '80', '10', '70', 1, NULL, NULL, '2022-07-13 09:40:45', '2022-07-13 09:40:45'),
(3, 2, 'James Smith', 'james@mailinator.com', '123456123', '40', '0', '40', 1, NULL, '{"orderID": "1C0115305R585870D", "payerID": "L9YGEBX68ZJD8", "paymentID": null, "billingToken": null, "paymentSource": "paypal", "facilitatorAccessToken": "A21AAIqKnOql8RjmWLNBWaS89m3GDrz1FRQT3RohMN60mIRh1aTTGUWHBZG8rg5Yz2frOHjgOqZk2eWeqr-HTpUGYsjm6Q3cQ"}', '2022-07-13 09:43:20', '2022-07-13 09:43:20'),
(4, 2, 'James Smith', 'james@mailinator.com', '123456123', '40', '40', '0', 1, NULL, NULL, '2022-07-13 09:47:07', '2022-07-13 09:47:07'),
(5, 2, 'James Smith', 'james@mailinator.com', '123456123', '40', '40', '0', 1, NULL, NULL, '2022-07-13 09:50:57', '2022-07-13 09:50:57'),
(6, 2, 'James Smith', 'james@mailinator.com', '123456123', '40', '40', '0', 1, NULL, NULL, '2022-07-13 09:52:46', '2022-07-13 09:52:46'),
(7, 2, 'James Smith', 'james@mailinator.com', '123456123', '40', '40', '0', 1, NULL, NULL, '2022-07-13 09:53:45', '2022-07-13 09:53:45'),
(8, 2, 'James Smith', 'james@mailinator.com', '123456123', '80', '20', '60', 1, NULL, '{"orderID": "6MD758821T130412E", "payerID": "L9YGEBX68ZJD8", "paymentID": null, "billingToken": null, "paymentSource": "paypal", "facilitatorAccessToken": "A21AAKN6HdfrsbRhXCL3ZMYerh-o0JGIkUj7Fh_u8Ekyd3s6tFUXUzQXtUjonQH7j3aeV5fYRhQg1Ojf6f77fNTTpXIjrnUtQ"}', '2022-07-25 06:45:15', '2022-07-25 06:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ticket_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `draw_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `order_id`, `ticket_number`, `ticket_amount`, `draw_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '26,27,28,29,30,5', '40', 1, '2022-07-13 09:27:15', '2022-07-13 09:27:15'),
(2, 2, 1, '41,42,43,44,45,8', '40', 1, '2022-07-13 09:27:15', '2022-07-13 09:27:15'),
(3, 2, 2, '26,27,28,29,30,5', '40', 1, '2022-07-13 09:40:45', '2022-07-13 09:40:45'),
(4, 2, 2, '46,47,48,49,50,5', '40', 1, '2022-07-13 09:40:45', '2022-07-13 09:40:45'),
(5, 2, 3, '11,17,23,29,35', '40', 1, '2022-07-13 09:43:20', '2022-07-13 09:43:20'),
(6, 2, 4, '20,25,30,35,40,4', '40', 1, '2022-07-13 09:47:07', '2022-07-13 09:47:07'),
(7, 2, 5, '1,2,3,4,5,10', '40', 1, '2022-07-13 09:50:57', '2022-07-13 09:50:57'),
(8, 2, 6, '16,17,18,19,20', '40', 1, '2022-07-13 09:52:46', '2022-07-13 09:52:46'),
(9, 2, 7, '36,38,40,42,44', '40', 1, '2022-07-13 09:53:45', '2022-07-13 09:53:45'),
(10, 2, 8, '32,37,38,43,48,3', '40', 1, '2022-07-25 06:45:15', '2022-07-25 06:45:15'),
(11, 2, 8, '34,39,43,45,47,1', '40', 1, '2022-07-25 06:45:15', '2022-07-25 06:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('james@mailinator.com', '$2y$10$wwZVdaDItDYPxKTKf25j8uZQSrlPbmxmf49QQe2vS65LZFerV5g5i', '2022-07-04 07:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationality_id` int(10) DEFAULT NULL,
  `country_id` int(10) DEFAULT NULL,
  `credit` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `role` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0-Admin, 1-User',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `paypal_email`, `phone_code`, `mobile`, `gender`, `date_of_birth`, `nationality_id`, `country_id`, `credit`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AA', NULL, 'aa@aa.com', NULL, 'eyJpdiI6Ik0zY0VuSHpGeTVLTUFBWldiUERjb0E9PSIsInZhbHVlIjoiamR0UGJRWTFmeVhKQUl4ak1pTXlzUT09IiwibWFjIjoiNDAwZDA3MzY1ZTcyNDcyZmVkM2MyNDY1ZDI3YjY5NDkyMjBmYTUxNjM2ZTMxYjljZTUwZjYwYmY3ZjJhNmMzNiIsInRhZyI6IiJ9', NULL, '+972', '123123123', NULL, NULL, NULL, NULL, '0', '1', NULL, '2022-07-03 03:09:18', '2022-07-03 03:09:18'),
(2, 'James', 'Smith', 'james@mailinator.com', NULL, 'eyJpdiI6InN0UkFrdWJOVE90Uml2TmJxZk9sb3c9PSIsInZhbHVlIjoiRnc3SjFmMEpNWWhoR0VFTVVDV3FSdz09IiwibWFjIjoiZDMxZTlhNzU1ZDVjMDQ2OTFkOTNiOTkyYzMzZGVlMjdhZDExZDYwODlmYjczODc1ZWU5MDMzZjM4M2JkMWI3YiIsInRhZyI6IiJ9', 'id.email2012-buyer@gmail.com', '+971', '123456123', 'Male', '2008-03-05', 82, 108, '0', '1', NULL, '2022-07-03 04:33:24', '2022-07-25 06:45:15'),
(3, 'John', NULL, 'john@mailinator.com', NULL, 'eyJpdiI6IlZ1ZkRLT0IvUlBvSkdaQlc2NHhmL1E9PSIsInZhbHVlIjoiZVcvYVZWMFFTaGZKOVRjd2ZqUHJsZz09IiwibWFjIjoiOTFmNmMzZjcwNGVkODY4ZmRkYzg4OTM2YjZjODkzYmY2MTJhYzhhYjIxOTAzYTBjMTg1YzNmNmRhNmMyOGU4ZSIsInRhZyI6IiJ9', NULL, '+971', '123456124', NULL, NULL, NULL, NULL, '0', '1', NULL, '2022-07-03 04:35:21', '2022-07-03 04:35:21'),
(5, 'John Smith', NULL, 'john.smith@mailinator.com', NULL, 'eyJpdiI6IkZhakpNL0NPMi9Cek1iNVlBenZseXc9PSIsInZhbHVlIjoidVZmcno3LzNPM1NsYXE3N3JISGtSdz09IiwibWFjIjoiMTZhOTc3Y2I5YzcxY2JiMGM2YmQ3ZDA2OWUyNTEyNmRiZDg4MDY0ZmMzMDJiNTA1Y2I3NjAwYjhlN2MxMDg5MCIsInRhZyI6IiJ9', NULL, '+971', '1231234567', NULL, NULL, NULL, NULL, '0', '1', NULL, '2022-07-04 11:59:15', '2022-07-04 11:59:15'),
(6, 'Jack', 'Smith', 'jack.smith@mailinator.com', NULL, 'eyJpdiI6IlBtdjJyeVlleGlZOTZLVHB5M25vQ2c9PSIsInZhbHVlIjoiMWlGMnFPaGRXZC9UN2ZMbGN5WDdQUT09IiwibWFjIjoiNjI0ZDIxMWViMGZmMWMzZmMzZDYzNDA3MjUxYWVjZGY1YTRhMWQ4MGYyZjZjNjg4Njk5ODU2NmUwZGFmYzYwMSIsInRhZyI6IiJ9', NULL, '', '1234567890', NULL, NULL, NULL, NULL, '0', '1', NULL, '2022-07-05 06:48:53', '2022-07-05 06:50:05'),
(7, 'A', 'B', 'aa@mailinator.com', NULL, 'eyJpdiI6IlNkZ25TVUVOTGlQSlF3MmtmWUJ3Mnc9PSIsInZhbHVlIjoiandvWUdVWldocWtHZjF4QkhDZTN5UT09IiwibWFjIjoiOTRjMzJlOGUxNWJkYTlmZWI0YzIzNGY0Y2RhN2I5M2JjMGYwY2U1MmQ3NmNiNDk1MjRhY2ZhMTVlZjczYzI5OSIsInRhZyI6IiJ9', NULL, '', '123123456', NULL, NULL, NULL, NULL, '0', '1', NULL, '2022-07-05 07:42:46', '2022-07-05 07:42:46'),
(8, 'Super', 'Admin', 'admin@mailinator.com', NULL, 'eyJpdiI6InN0UkFrdWJOVE90Uml2TmJxZk9sb3c9PSIsInZhbHVlIjoiRnc3SjFmMEpNWWhoR0VFTVVDV3FSdz09IiwibWFjIjoiZDMxZTlhNzU1ZDVjMDQ2OTFkOTNiOTkyYzMzZGVlMjdhZDExZDYwODlmYjczODc1ZWU5MDMzZjM4M2JkMWI3YiIsInRhZyI6IiJ9', NULL, '+971', '123456120', 'Male', '2008-03-05', 82, 108, '0', '0', NULL, '2022-07-03 04:33:24', '2022-07-13 09:53:45'),
(10, 'Kevins', 'Smiths', 'kevin.smiths@mailinator.com', NULL, 'eyJpdiI6IjdlRUxHMW83T2pRblNZQUlVVlZyV0E9PSIsInZhbHVlIjoib20vbzRwRXlWTnFSc2tMVGgvUW5qdz09IiwibWFjIjoiNWI2ZDAzNTEyOWJlNjJiYjU2YmRhMGI0NTA5ZDk2NTljYWIxZTBhOGI1ZTFlOGRjMGIyMWE0ZDdkZTRjMDY4MyIsInRhZyI6IiJ9', NULL, NULL, '1231231235', 'Female', '2004-07-08', 83, 106, '0', '1', NULL, '2022-07-21 02:42:18', '2022-07-21 04:56:29'),
(11, 'A1', 'B1', 'aabb@mailinator.com', NULL, 'eyJpdiI6ImRaL1l0MDBSVU4zQjZpWnJTWElGYXc9PSIsInZhbHVlIjoiU2h6RWRhaEtNYVJvNWNEZ0tmRHU3QT09IiwibWFjIjoiYzJlYzY2OWQ5MDcyM2EzMTVjODEwODllYTgwM2ZkMzYxYWE3YzkwMDE5M2RmOTJkNWMwZDk0NWJjOGQyMzdhZiIsInRhZyI6IiJ9', 'aabb@mailinator.com', NULL, '1312312312', 'Male', '2012-07-04', 82, 108, '0', '1', NULL, '2022-07-22 08:34:10', '2022-07-22 09:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_transactions`
--

CREATE TABLE `user_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_transactions`
--

INSERT INTO `user_transactions` (`id`, `user_id`, `amount`, `transaction_type`, `transaction_id`, `transaction_data`, `created_at`, `updated_at`) VALUES
(1, 2, '1', 'add_wallet', NULL, '{"orderID": "17Y23254DS423853T", "payerID": "L9YGEBX68ZJD8", "paymentID": null, "billingToken": null, "paymentSource": "paypal", "facilitatorAccessToken": "A21AALkTnHOgbtEMUEIoEz46bmXDRm2wCP3VT-Xxf5pq2mwy3mevn6Hv3aaoI2KsMyXoKxefgw4F-TQTc308VHJ9nArr6SKTQ"}', '2022-07-12 02:47:43', '2022-07-12 02:47:43'),
(2, 2, '5', 'add_wallet', NULL, '{"orderID": "97348640MC3196030", "payerID": "L9YGEBX68ZJD8", "paymentID": null, "billingToken": null, "paymentSource": "paypal", "facilitatorAccessToken": "A21AAJ9yWoGo_bRHie-d6DJoMfqRJkG1xmFO64CbooV_ozPapa-LvrpFy_Pxhikl_t8Ph7ZfkZpo9BsY4exXhU846A68xDgbQ"}', '2022-07-12 03:39:28', '2022-07-12 03:39:28'),
(3, 2, '1', 'add_wallet', NULL, '{"orderID": "1YC88886X34795833", "payerID": "L9YGEBX68ZJD8", "paymentID": null, "billingToken": null, "paymentSource": "paypal", "facilitatorAccessToken": "A21AALD2Is_teXWCWAkwl7ofvlu_Fg7G8vVBTJLBJrRoZDYBs-cSqp609MoIBzV8deDea-Vs3Njbi8yoF8M7jfUJ-p6nvMG0g"}', '2022-07-12 03:40:37', '2022-07-12 03:40:37'),
(4, 2, '1', 'add_wallet', NULL, '{"orderID": "26A998081M517620B", "payerID": "L9YGEBX68ZJD8", "paymentID": null, "billingToken": null, "paymentSource": "paypal", "facilitatorAccessToken": "A21AAL9UkzutXAG4KX1IdOIG0YKvcZ0rFtlirGGvxs67fNJI-7RP-9fvNeyiaAp4n9WDFaOaViVFZJLyvttgAXR6JDIxmKBtg"}', '2022-07-12 04:46:19', '2022-07-12 04:46:19'),
(5, 2, '-40', 'order_placed', NULL, NULL, '2022-07-13 09:53:45', '2022-07-13 09:53:45'),
(6, 2, '-20', 'order_placed', NULL, NULL, '2022-07-25 06:45:15', '2022-07-25 06:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `verify_register`
--

CREATE TABLE `verify_register` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('email','phone') COLLATE utf8mb4_unicode_ci DEFAULT 'email',
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_register`
--

INSERT INTO `verify_register` (`id`, `email`, `otp`, `type`, `mobile`, `created_at`) VALUES
(1, 'aaa@aaa.com', '691786', 'email', NULL, '2022-07-04 09:21:13'),
(2, 'aaa@aaa.com', '406234', 'email', NULL, '2022-07-04 09:54:15'),
(3, 'jack@mailinator.com', '411889', 'email', NULL, '2022-07-04 10:46:03'),
(4, 'jack@mailinator.com', '304417', 'email', NULL, '2022-07-04 10:51:11'),
(5, 'jack@mailinator.com', '497654', 'email', NULL, '2022-07-04 11:00:34'),
(6, 'jack@mailinator.com', '973197', 'email', NULL, '2022-07-04 11:02:56'),
(7, 'jack@mailinator.com', '989875', 'email', NULL, '2022-07-04 11:04:25'),
(8, 'jack@mailinator.com', '566950', 'email', NULL, '2022-07-04 11:09:32'),
(9, 'jack@mailinator.com', '431297', 'email', NULL, '2022-07-04 11:12:40'),
(10, 'jack@mailinator.com', '579809', 'email', NULL, '2022-07-04 11:18:49'),
(11, 'john@mailinator.com', '190151', 'email', NULL, '2022-07-04 11:27:06'),
(12, 'john.smith@mailinator.com', '526781', 'email', NULL, '2022-07-04 11:48:39'),
(13, 'john.smith@mailinator.com', '476612', 'email', NULL, '2022-07-04 11:48:58'),
(14, 'john.smith@mailinator.com', '534415', 'email', NULL, '2022-07-04 11:58:06'),
(15, 'jack@mailinator.com', '604811', 'email', NULL, '2022-07-05 00:13:55'),
(16, 'jack@mailinator.com', '753808', 'email', NULL, '2022-07-05 06:05:26'),
(17, 'jack@mailinator.com', '357091', 'email', NULL, '2022-07-05 06:10:54'),
(18, 'jack@mailinator.com', '113262', 'email', NULL, '2022-07-05 06:15:25'),
(19, 'jack@mailinator.com', '566532', 'email', NULL, '2022-07-05 06:23:32'),
(20, 'jack@mailinator.com', '927159', 'email', NULL, '2022-07-05 06:25:04'),
(21, 'jack@mailinator.com', '331299', 'email', NULL, '2022-07-05 06:25:21'),
(22, 'james@mailinator.com', '351997', 'email', NULL, '2022-07-05 06:42:38'),
(23, 'jack.smith@mailinator.com', '337118', 'email', NULL, '2022-07-05 06:43:49'),
(24, 'jack.smith@mailinator.com', '728556', 'email', NULL, '2022-07-05 06:47:54'),
(25, 'aa@mailinator.com', '289072', 'email', NULL, '2022-07-05 07:42:07'),
(26, 'aa@mailinator.com', '776584', 'email', NULL, '2022-07-05 08:14:51'),
(27, 'tt@mailinator.com', '143515', 'email', NULL, '2022-07-05 08:17:12'),
(28, 'kevin.smith@mailinator.com', '347132', 'email', NULL, '2022-07-23 00:37:37'),
(29, 'kevin.smith@mailinator.com', '707727', 'email', NULL, '2022-07-23 00:38:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`iCountryId`),
  ADD UNIQUE KEY `countryName` (`vCountry`);

--
-- Indexes for table `draws`
--
ALTER TABLE `draws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draw_winners`
--
ALTER TABLE `draw_winners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_transactions`
--
ALTER TABLE `user_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify_register`
--
ALTER TABLE `verify_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `iCountryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;
--
-- AUTO_INCREMENT for table `draws`
--
ALTER TABLE `draws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `draw_winners`
--
ALTER TABLE `draw_winners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_transactions`
--
ALTER TABLE `user_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `verify_register`
--
ALTER TABLE `verify_register`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
