-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `bank_details`;
CREATE TABLE `bank_details` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `acc_type` enum('Current','Savings') NOT NULL,
  `account_name` varchar(150) NOT NULL,
  `ifsc_code` varchar(200) NOT NULL,
  `micr_code` varchar(200) NOT NULL,
  `swift_code` varchar(200) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `bank_details` (`bank_id`, `user_id`, `bank_name`, `account_number`, `acc_type`, `account_name`, `ifsc_code`, `micr_code`, `swift_code`, `url`) VALUES
(1,	1,	'HDFC',	'342534534',	'Savings',	'test',	'test',	'test',	'',	'');

DROP TABLE IF EXISTS `buyer_details`;
CREATE TABLE `buyer_details` (
  `buyer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `code` int(11) NOT NULL,
  `buyer_name` varchar(50) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `cin` varchar(50) NOT NULL,
  PRIMARY KEY (`buyer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `buyer_details` (`buyer_id`, `user_id`, `company_name`, `address`, `gst`, `code`, `buyer_name`, `pan`, `cin`) VALUES
(1,	1,	'test',	'test add',	'test',	1,	'test',	'test',	'test'),
(2,	1,	'B Jayalakshmi',	'No: 141,( 3/67),Dr Ambetkar salai ,Puducherry.',	'',	1,	'B Jayalakshmi',	'',	'');

DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `type` varchar(200) NOT NULL,
  `client` varchar(100) NOT NULL,
  `project` varchar(255) NOT NULL,
  `workorder` varchar(191) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `discount` varchar(3) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `data` (`data_id`, `user_id`, `invoice_number`, `type`, `client`, `project`, `workorder`, `gst`, `discount`, `date`) VALUES
(1,	1,	'1',	'Proforma Invoice',	'1',	'quotation',	'1',	'0',	'0',	'2023-10-12'),
(2,	1,	'11',	'Quotation',	'1',	'quotation',	'1',	'0',	'10',	'2023-10-13'),
(3,	1,	'12',	'Invoice',	'2',	'',	'',	'0',	'2',	'2023-10-13');

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `accountno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `employees` (`emp_id`, `name`, `age`, `address`, `contact_number`, `position`, `accountno`) VALUES
(0,	'Balachandaran C',	30,	'uppalam',	'9150381103',	'Manager',	'sdfsf342'),
(2,	'Muthaiyan',	25,	'Kathirkamam',	'9150381102',	'Admin',	'0');

DROP TABLE IF EXISTS `gst`;
CREATE TABLE `gst` (
  `gst_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `gst` varchar(10) NOT NULL,
  PRIMARY KEY (`gst_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `logo`;
CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `logo` (`logo_id`, `user_id`, `image`) VALUES
(1,	1,	'Technaus Solar Logo P - RGB - PNG.png');

DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `smtp` varchar(5) NOT NULL,
  `hostname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `message_from` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `mail` (`mail_id`, `smtp`, `hostname`, `username`, `password`, `message_from`, `subject`) VALUES
(1,	'465',	'host',	'username',	'password',	'Technaus Renewable',	'Recover Password');

DROP TABLE IF EXISTS `other_data`;
CREATE TABLE `other_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_id` int(11) NOT NULL,
  `product` varchar(191) NOT NULL,
  `qty` varchar(191) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `rate` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `other_data` (`id`, `data_id`, `product`, `qty`, `desc`, `rate`) VALUES
(1,	1,	'Solar Panel',	'1',	'test',	'50000'),
(2,	2,	'Solar Panel',	'2',	'',	'50000'),
(3,	2,	'Solar Panel',	'2',	'',	'50000'),
(4,	3,	'Solar Panel',	'1',	'',	'50000');

DROP TABLE IF EXISTS `permanent_details`;
CREATE TABLE `permanent_details` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pincode` int(11) NOT NULL,
  `ph_number` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `whatsapp` varchar(14) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `pan_number` varchar(20) NOT NULL,
  `cin` varchar(26) NOT NULL,
  `statecode` int(11) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `permanent_details` (`company_id`, `user_id`, `company_name`, `user_name`, `designation`, `address`, `pincode`, `ph_number`, `email`, `website`, `whatsapp`, `gst`, `pan_number`, `cin`, `statecode`) VALUES
(1,	1,	'Technaus Solar Renewable Pvt Ltd.',	'Balachandar',	'Supervisor',	'#27, Puducherry - Tindivanam Main Road, V.I.P Nagar, Pattanur',	605006,	'7418650503',	'solar@technaus.co.in',	'www.technaus.co.in',	'',	'',	' ',	'',	1);

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `sac` varchar(10) NOT NULL,
  `rate` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `product` (`product_id`, `user_id`, `product_description`, `sac`, `rate`) VALUES
(1,	1,	'Solar Panel',	'PV001',	50000),
(2,	1,	'Solar Panel',	'PV002',	54000);

DROP TABLE IF EXISTS `quotation`;
CREATE TABLE `quotation` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `quotdate` date DEFAULT NULL,
  `owner` varchar(255) NOT NULL,
  `quotation_no` int(20) NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `State` varchar(200) NOT NULL,
  `meterno` varchar(20) DEFAULT NULL,
  `distributor` varchar(255) DEFAULT NULL,
  `rooftype` varchar(50) DEFAULT NULL,
  `rooflevel` varchar(50) DEFAULT NULL,
  `phase` varchar(20) DEFAULT NULL,
  `panelbrand` varchar(50) DEFAULT NULL,
  `panelwatts` varchar(50) DEFAULT NULL,
  `panelcount` int(20) NOT NULL,
  `inverterbrand` varchar(50) DEFAULT NULL,
  `invertertype` varchar(50) DEFAULT NULL,
  `inverterkw` varchar(200) NOT NULL,
  `invertercount` int(20) NOT NULL,
  `included` varchar(255) DEFAULT NULL,
  `batterycapacity` varchar(255) DEFAULT NULL,
  `batterycount` int(20) DEFAULT NULL,
  `paymenttype` varchar(30) NOT NULL,
  `totoutlay` decimal(10,2) DEFAULT NULL,
  `grandtotal` decimal(10,2) DEFAULT NULL,
  `is_deleted` int(4) NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `quotation` (`owner_id`, `emp_id`, `quotdate`, `owner`, `quotation_no`, `mobile`, `email`, `address`, `State`, `meterno`, `distributor`, `rooftype`, `rooflevel`, `phase`, `panelbrand`, `panelwatts`, `panelcount`, `inverterbrand`, `invertertype`, `inverterkw`, `invertercount`, `included`, `batterycapacity`, `batterycount`, `paymenttype`, `totoutlay`, `grandtotal`, `is_deleted`) VALUES
(93,	0,	'2023-11-23',	'Mr. Murugan',	213,	'9840128208',	'NA',	'2/65, Veerabadaran Street, Pudupet',	'Tamilnadu - 600002',	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Three storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	221484.00,	221484.00,	0),
(96,	0,	'2023-11-24',	'Mr. Manikasamy',	201,	'9443624947',	'NA',	'N17, 18, 4th Main road, Marital Nagar, Reddiyarpalyam',	'Puducherry - 605010',	'NA',	'Electricity Department - Puducherry',	'RCC',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	240978.00,	240978.00,	0),
(98,	0,	'2023-11-26',	'Mr. Sivacoumar',	202,	'9442189342',	'NA',	'Kamaraj Street, Shanmugapuram',	'Puducherry - 605009',	'1674568',	'Electricity Department - Puducherry',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	235728.00,	235728.00,	0),
(100,	0,	'2023-11-27',	'Mrs. Lakshmi Govindan',	203,	'7094748422',	'govindarajlg1974@gmail.com',	'Chetty Street, White Town',	'Puducherry - 605001',	'03-13-05-0629 ',	'Electricity Department - Puducherry',	'RCC',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	25,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'8',	2,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	946916.00,	946916.00,	0),
(101,	0,	'2023-11-26',	'test',	204,	'9894215252',	'',	'84, Kurunji street, pdy',	'Puducherry - 605001',	'8745454',	'Electricity Department - Puducherry',	'Flat Roof',	'Ground Floor',	'Single phase',	'Waaree',	'540',	6,	'Growatt',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'6 Ah',	1,	'Cash / Finance',	210000.00,	210000.00,	1),
(102,	0,	'2023-11-27',	'Mr. Murali Krishnan ',	205,	'9489964825 / 9489964825',	'NA',	'Annamalaiyar st, Rainbow Nagar',	'Puducherry - 605011',	'7022246 / 7022247',	'Electricity Department - Puducherry',	'Others',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	10,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3',	2,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	356857.00,	356857.00,	0),
(103,	0,	'2023-11-26',	'Mr. Srinivasan',	206,	'9442365442',	'NA',	'Krishna nagar, , Muthialpet',	'Puducherry - 605003',	'00489396',	'Electricity Department - Puducherry',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	8,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'4',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	297748.00,	297748.00,	0),
(104,	0,	'2023-11-28',	'Mrs. Tilagavady',	207,	'9600879738',	'NA',	'Raja vijayan avenue, marie oulgaret, Moolakulam',	'Puducherry - 605009',	'31-84-05-1130K',	'Electricity Department - Puducherry',	'RCC',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	213149.00,	213149.00,	0),
(105,	0,	'2023-11-28',	'Mr. Elangovan',	208,	'7299415945',	'NA',	'MADAMBAKKAM , CHENNAI ',	'Tamilnadu - 6000126',	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'335',	5,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'Off-Grid Inverter',	'2',	1,	'All Mountings, Electricals and Installation',	'150Ah',	2,	'Cash / Finance',	147080.00,	147080.00,	0),
(106,	0,	'2023-11-27',	'Mrs. Benadicta Mary',	209,	'9094378913',	'NA',	'Paiyanur, Kanchipuram district',	'Tamilnadu - 603104 ',	'NA',	'Tamil nadu Electricity Board - TN',	'Sheets',	'Ground Floor',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	3,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'Off-Grid Inverter',	'3',	1,	'All Mountings, Electricals and Installation',	'200Ah',	2,	'Cash / Finance',	167013.00,	167013.00,	0),
(107,	0,	'2023-11-28',	'Mr. Harikumar',	210,	'9123506663',	'NA',	'Medavakkam , Chennai',	'Tamilnadu - 600100',	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	5,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	164803.00,	164803.00,	0),
(108,	0,	'2023-11-27',	'Mr. Srinivasan',	211,	'9791161720',	'NA',	'Ramapuram , Chennai',	'Tamilnadu - 613003',	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	213149.00,	213149.00,	0),
(109,	0,	'2023-11-27',	'Mr. Prasana',	212,	'9080709763',	'NA',	'Cuddalore',	'Tamilnadu - 605009',	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	8,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3',	2,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	292748.00,	292748.00,	0),
(110,	0,	'2023-11-27',	'Mrs. Surya',	213,	'9003277608',	'NA',	'Alathur, KANCHEEPURAM',	'Tamilnadu - 600016',	'095750021373',	'Tamil nadu Electricity Board - TN',	'RCC',	'Ground Floor',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'335',	9,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'4KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	212548.00,	212548.00,	0),
(111,	0,	'2023-11-28',	'Mr. G. Kaliyaperumal (Anandh)',	214,	'7305858153',	'NA',	'No.45, Subramaniyar koil street, Pethuchettipet (Lawspet)',	'Puducherry - 605008',	'23-27-02-0172',	'Electricity Department - Puducherry',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	4,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'2KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	146729.00,	146729.00,	0),
(112,	0,	'2023-11-28',	'Mr. Jayakumar',	215,	'9381499666',	'NA',	'Parrys, Chennai',	'Tamilnadu - 600001',	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA ',	0,	'Cash / Finance',	213149.00,	213149.00,	0),
(113,	0,	'2023-11-28',	'Mr. Jayakumar',	216,	'9381499666',	'',	'Parrys, Chennai',	'Tamilnadu - 600001',	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	10,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'5KW',	1,	'All Mountings, Electricals and Installation',	'NA ',	0,	'Cash / Finance',	305177.00,	305177.00,	0),
(114,	0,	'2023-11-28',	'Mr. L. Babu',	217,	'9094542945',	'NA',	'Flat No.1 PRR homes, New No: 14, Mohanapuri 5 st, Brindavan nagar, Adambakkam, Chennai ',	'Tamilnadu - 600088',	'243/118/229',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	8,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'4KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	297748.00,	297748.00,	0),
(115,	0,	'2023-11-28',	'Mr. Duraisamy',	218,	'9789497552',	'NA',	'No. 10, 2nd cross street, perumal raja garden,, Reddiyarpalayam',	'Puducherry - 605010',	'NA',	'Electricity Department - Puducherry',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	13,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'6KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	446651.00,	446651.00,	0),
(116,	0,	'2023-11-29',	'Mr. L. Babu',	219,	'9094542945',	'NA',	'Flat No.1 PRR homes, New No: 14, Mohanapuri 5 st, Brindavan nagar, Adambakkam, Chennai ',	'Tamilnadu - 600088',	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	213149.00,	213149.00,	0),
(117,	0,	'2023-11-29',	'Mr. S. Raju',	220,	'9382142686',	'NA',	'Bharathi Nagar,, Ramapuram, Chennai',	'Tamilnadu - 600089',	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	10,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'5',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	345177.00,	345177.00,	0);

DROP TABLE IF EXISTS `sign`;
CREATE TABLE `sign` (
  `sign_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`sign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `sign` (`sign_id`, `user_id`, `image`) VALUES
(3,	1,	'technausSealRound.png');

DROP TABLE IF EXISTS `statecode`;
CREATE TABLE `statecode` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `statecode` (`state_id`, `user_id`, `name`, `code`) VALUES
(1,	1,	'Puducherrry',	101),
(2,	1,	'CHENNAI',	102);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `company` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `company`, `type`, `email`, `password`, `pass`) VALUES
(1,	'Technaus',	'Solar',	'Technaus Renewable',	'Service',	'solar@technaus.co.in',	'0192023a7bbd73250516f069df18b500',	'admin123');

-- 2023-11-29 05:15:05