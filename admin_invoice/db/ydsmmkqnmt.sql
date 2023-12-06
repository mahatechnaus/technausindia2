-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

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


DROP TABLE IF EXISTS `leads`;
CREATE TABLE `leads` (
  `leadid` int(10) NOT NULL AUTO_INCREMENT,
  `leadno` varchar(20) DEFAULT NULL,
  `lddate` date NOT NULL,
  `source` varchar(100) NOT NULL,
  `leadtype` varchar(100) NOT NULL,
  `leadname` varchar(200) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `area` varchar(500) NOT NULL,
  `state` varchar(200) NOT NULL,
  `ebillamt` int(20) DEFAULT NULL,
  `phase` varchar(20) NOT NULL,
  `appointmentdt` date NOT NULL,
  `assignto` varchar(50) NOT NULL,
  `statustc` varchar(200) NOT NULL,
  `notestc` varchar(500) NOT NULL,
  `nextcalltcdt` date NOT NULL,
  `appx_kw` varchar(10) NOT NULL,
  `sanction_load` varchar(20) NOT NULL,
  `space_solar` varchar(20) NOT NULL,
  `statusta` varchar(30) NOT NULL,
  `is_quotation` int(4) NOT NULL DEFAULT 0,
  `quot_dt` date DEFAULT NULL,
  `quot_no` varchar(20) NOT NULL,
  `quot_price` varchar(20) NOT NULL,
  `is_deleted` int(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`leadid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


SET NAMES utf8mb4;

DROP TABLE IF EXISTS `logo`;
CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `quotation`;
CREATE TABLE `quotation` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `leadid` int(20) NOT NULL DEFAULT 0,
  `leadno` varchar(20) DEFAULT NULL,
  `quotdate` date DEFAULT NULL,
  `owner` varchar(255) NOT NULL,
  `quotation_no` int(20) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `State` varchar(200) NOT NULL,
  `meterno` varchar(20) DEFAULT NULL,
  `quot_status` int(4) NOT NULL DEFAULT 0,
  `sanctionload` varchar(20) NOT NULL DEFAULT 'NA',
  `distributor` varchar(255) DEFAULT NULL,
  `rooftype` varchar(50) DEFAULT NULL,
  `rooflevel` varchar(50) DEFAULT NULL,
  `phase` varchar(20) DEFAULT NULL,
  `panelbrand` varchar(50) DEFAULT NULL,
  `panelwatts` varchar(50) DEFAULT NULL,
  `panelcount` int(20) DEFAULT NULL,
  `inverterbrand` varchar(50) DEFAULT NULL,
  `invertertype` varchar(50) DEFAULT NULL,
  `inverterkw` varchar(200) DEFAULT NULL,
  `invertercount` int(20) DEFAULT NULL,
  `included` varchar(255) DEFAULT NULL,
  `batterycapacity` varchar(255) DEFAULT NULL,
  `batterycount` int(20) DEFAULT NULL,
  `paymenttype` varchar(30) DEFAULT NULL,
  `totoutlay` decimal(10,2) DEFAULT NULL,
  `grandtotal` decimal(10,2) DEFAULT NULL,
  `is_deleted` int(4) NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `quotation` (`owner_id`, `emp_id`, `leadid`, `leadno`, `quotdate`, `owner`, `quotation_no`, `mobile`, `email`, `address`, `State`, `meterno`, `quot_status`, `sanctionload`, `distributor`, `rooftype`, `rooflevel`, `phase`, `panelbrand`, `panelwatts`, `panelcount`, `inverterbrand`, `invertertype`, `inverterkw`, `invertercount`, `included`, `batterycapacity`, `batterycount`, `paymenttype`, `totoutlay`, `grandtotal`, `is_deleted`) VALUES
(93,	0,	0,	'',	'2023-11-23',	'Mr. Murugan',	213,	'9840128208',	'NA',	'2/65, Veerabadaran Street, Pudupet',	'Tamilnadu - 600002',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Three storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	221484.00,	221484.00,	0),
(96,	0,	0,	'',	'2023-11-24',	'Mr. Manikasamy',	201,	'9443624947',	'NA',	'N17, 18, 4th Main road, Marital Nagar, Reddiyarpalyam',	'Puducherry - 605010',	'NA',	1,	'NA',	'Electricity Department - Puducherry',	'RCC',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	240978.00,	240978.00,	0),
(98,	0,	0,	'',	'2023-12-02',	'M/s. Sri Subramania Swamy Devasthanam',	202,	'9442189342',	'NA',	'Subramniyar koil  Street, Shanmugapuram',	'Puducherry - 605009',	'1674568',	1,	'NA',	'Electricity Department - Puducherry',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'5KW (Single Phase Inverter)',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	261988.00,	261988.00,	0),
(100,	0,	0,	'',	'2023-11-27',	'Mrs. Lakshmi Govindan',	203,	'7094748422',	'govindarajlg1974@gmail.com',	'Chetty Street, White Town',	'Puducherry - 605001',	'03-13-05-0629 ',	1,	'NA',	'Electricity Department - Puducherry',	'RCC',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	25,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'8',	2,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	946916.00,	946916.00,	0),
(101,	0,	0,	'',	'2023-11-26',	'test',	204,	'9894215252',	'',	'84, Kurunji street, pdy',	'Puducherry - 605001',	'8745454',	1,	'NA',	'Electricity Department - Puducherry',	'Flat Roof',	'Ground Floor',	'Single phase',	'Waaree',	'540',	6,	'Growatt',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'6 Ah',	1,	'Cash / Finance',	210000.00,	210000.00,	1),
(102,	0,	0,	'',	'2023-12-02',	'Mr. Murali Krishnan ',	205,	'9489964825',	'NA',	'Annamalaiyar st, Rainbow Nagar',	'Puducherry - 605011',	'7022246 / 7022247',	1,	'NA',	'Electricity Department - Puducherry',	'Others',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	12,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	2,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	417950.00,	417950.00,	0),
(103,	0,	0,	'',	'2023-11-26',	'Mr. Srinivasan',	206,	'9442365442',	'NA',	'Krishna nagar, , Muthialpet',	'Puducherry - 605003',	'00489396',	1,	'NA',	'Electricity Department - Puducherry',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	8,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'4',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	297748.00,	297748.00,	0),
(104,	0,	0,	'',	'2023-11-28',	'Mrs. Tilagavady',	207,	'9600879738',	'NA',	'Raja vijayan avenue, marie oulgaret, Moolakulam',	'Puducherry - 605009',	'31-84-05-1130K',	1,	'NA',	'Electricity Department - Puducherry',	'RCC',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	213149.00,	213149.00,	0),
(105,	0,	0,	'',	'2023-11-28',	'Mr. Elangovan',	208,	'7299415945',	'NA',	'MADAMBAKKAM , CHENNAI ',	'Tamilnadu - 6000126',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'335',	5,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'Off-Grid Inverter',	'2',	1,	'All Mountings, Electricals and Installation',	'150Ah',	2,	'Cash / Finance',	147080.00,	147080.00,	0),
(106,	0,	0,	'',	'2023-11-27',	'Mrs. Benadicta Mary',	209,	'9094378913',	'NA',	'Paiyanur, Kanchipuram district',	'Tamilnadu - 603104 ',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'Sheets',	'Ground Floor',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	3,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'Off-Grid Inverter',	'3',	1,	'All Mountings, Electricals and Installation',	'200Ah',	2,	'Cash / Finance',	167013.00,	167013.00,	0),
(107,	0,	0,	'',	'2023-11-28',	'Mr. Harikumar',	210,	'9123506663',	'NA',	'Medavakkam , Chennai',	'Tamilnadu - 600100',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	5,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	164803.00,	164803.00,	0),
(108,	0,	0,	'',	'2023-11-27',	'Mr. Srinivasan',	211,	'9791161720',	'NA',	'Ramapuram , Chennai',	'Tamilnadu - 613003',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	213149.00,	213149.00,	0),
(109,	0,	0,	'',	'2023-11-27',	'Mr. Prasana',	212,	'9080709763',	'NA',	'Cuddalore',	'Tamilnadu - 605009',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	8,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3',	2,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	292748.00,	292748.00,	0),
(110,	0,	0,	'',	'2023-11-27',	'Mrs. Surya',	213,	'9003277608',	'NA',	'Alathur, KANCHEEPURAM',	'Tamilnadu - 600016',	'095750021373',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Ground Floor',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'335',	9,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'4KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	212548.00,	212548.00,	0),
(111,	0,	0,	'',	'2023-12-02',	'Mr. G. Kaliyaperumal (Anandh)',	214,	'7305858153',	'NA',	'No.45, Subramaniyar koil street, Pethuchettipet (Lawspet)',	'Puducherry - 605008',	'23-27-02-0172',	1,	'NA',	'Electricity Department - Puducherry',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	8,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'4KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	285272.00,	285272.00,	0),
(112,	0,	0,	'',	'2023-11-28',	'Mr. Jayakumar',	215,	'9381499666',	'NA',	'Parrys, Chennai',	'Tamilnadu - 600001',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA ',	0,	'Cash / Finance',	213149.00,	213149.00,	0),
(113,	0,	0,	'',	'2023-11-28',	'Mr. Jayakumar',	216,	'9381499666',	'',	'Parrys, Chennai',	'Tamilnadu - 600001',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	10,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'5KW',	1,	'All Mountings, Electricals and Installation',	'NA ',	0,	'Cash / Finance',	305177.00,	305177.00,	0),
(114,	0,	0,	'',	'2023-11-28',	'Mr. L. Babu',	217,	'9094542945',	'NA',	'Flat No.1 PRR homes, New No: 14, Mohanapuri 5 st, Brindavan nagar, Adambakkam, Chennai ',	'Tamilnadu - 600088',	'243/118/229',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	8,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'4KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	297748.00,	297748.00,	0),
(115,	0,	0,	'',	'2023-11-28',	'Mr. Duraisamy',	218,	'9789497552',	'NA',	'No. 10, 2nd cross street, perumal raja garden,, Reddiyarpalayam',	'Puducherry - 605010',	'NA',	1,	'NA',	'Electricity Department - Puducherry',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	13,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'6KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	446651.00,	446651.00,	0),
(116,	0,	0,	'',	'2023-11-29',	'Mr. L. Babu',	219,	'9094542945',	'NA',	'Flat No.1 PRR homes, New No: 14, Mohanapuri 5 st, Brindavan nagar, Adambakkam, Chennai ',	'Tamilnadu - 600088',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	213149.00,	213149.00,	0),
(117,	0,	0,	'',	'2023-11-29',	'Mr. S. Raju',	220,	'9382142686',	'NA',	'Bharathi Nagar,, Ramapuram, Chennai',	'Tamilnadu - 600089',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	10,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'5',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	305177.00,	305177.00,	0),
(118,	0,	0,	'',	'2023-11-29',	'Mr. M. Mohamed Meeran ',	221,	'9094036444',	'NA',	' OSH ROAD, Royapuram, Chennai',	'Tamilnadu - 600013',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	12,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'6KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	417950.00,	417950.00,	0),
(119,	0,	0,	'',	'2023-11-29',	'Mr. Shivakumar',	222,	'9710994829',	'NA',	'Peraiyur, Madurai',	'Tamilnadu - 625703',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'One storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	19,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'10KW[3Phase]',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	639122.00,	639122.00,	0),
(120,	0,	0,	'',	'2023-11-29',	'Mr. Prasana',	223,	'9080709763',	'',	'-, Cuddalore',	'Tamilnadu - 607001',	'meter no. 1 & 2',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	8,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'2KW',	2,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	285272.00,	285272.00,	0),
(121,	0,	0,	'',	'2023-11-29',	'Mr. Ashwin',	224,	'7373730158',	'',	'Navarkulam main road,, Pattanur',	'Puducherry - 605101',	'-',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'One storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	56,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'30',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	1725000.00,	1725000.00,	0),
(122,	0,	0,	'',	'2023-11-29',	'Mr. Govindan',	225,	'7094748422',	'',	'chetty street, White Town',	'Puducherry - 605001',	'03-13-05-0629',	1,	'NA',	'Electricity Department - Puducherry',	'Sheets',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	14,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'8Kw',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Finance',	506614.00,	506614.00,	0),
(123,	0,	0,	'',	'2023-11-29',	'M/s.  Ramesh Kavitha',	226,	'9952065296',	'NA',	'Thuraipakkam PTC Quarters,, Chennai',	'Tamilnadu - 600097',	'092141261474',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	2,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'1KW[3phase]',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	85000.00,	85000.00,	1),
(124,	0,	0,	'',	'2023-11-29',	'Mr. Govindan',	227,	'07094748422',	'',	'chetty street, White Town',	'Puducherry - 605001',	'03-13-05-0627',	1,	'NA',	'Electricity Department - Puducherry',	'Sheets',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	10,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'8Kw',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Finance',	348537.00,	348537.00,	0),
(125,	0,	0,	'',	'2023-11-29',	'Miss. Vasukiammal',	228,	'9566959916',	'NA',	'Natarajan,72, Vinayagar kovil street, Dhalavalappattu,V.Nallalam,villupuram, Gingee',	'Tamilnadu - 605651',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	4,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'2.16KW[3Phase]',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	146729.00,	146729.00,	1),
(126,	0,	0,	'',	'2023-11-29',	'Mr. Parthasarathi',	229,	'7904122037',	'',	'A.K.palayam, Panruti',	'Tamilnadu - 607112',	'-',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'Others',	'Others',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	8,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'4KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	285272.00,	285272.00,	0),
(127,	0,	0,	'',	'2023-11-30',	'Mr. Prakash',	230,	'na',	'',	'ECR, kanathur',	'Tamilnadu - 600119',	'na',	1,	'NA',	'Others',	'Others',	'Others',	'Single phase',	'others',	'0',	0,	'UTL',	'others',	'5kva',	1,	'All Mountings, Electricals and Installation',	'200Ah',	8,	'Cash / Finance',	249510.00,	249510.00,	0),
(128,	0,	0,	'',	'2023-11-30',	'Mr. B.Ramesh ',	231,	'9952065296',	'',	'Thuraipakkam PTC, Chennai',	'Tamilnadu - 600097',	'8719877',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Ground Floor',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	213149.00,	213149.00,	0),
(129,	0,	0,	'',	'2023-11-30',	'Mr. Arumugaselvan',	232,	' 9043511600',	'NA',	'21/Krishna puram colony 4 th Street extension, West ,Madurai',	'Tamilnadu - 625014',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Ground Floor',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'Off-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'200 Ah',	4,	'Cash / Finance',	281000.00,	281000.00,	0),
(130,	0,	0,	'',	'2023-11-30',	'Mr. Sankarnarayanan',	233,	'9790222381',	'',	'Pondicherry, Puducherry',	'Puducherry - 605001',	'NA',	1,	'NA',	'Electricity Department - Puducherry',	'Sheets',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	34,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'15KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	855122.00,	855122.00,	0),
(131,	0,	0,	'',	'2023-12-02',	'M/s. Ashwin Minerals',	234,	'7373730158',	'NA',	'Navakulam Main Road, Vanur',	'Tamilnadu - 605101',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'Sheets',	'Ground Floor',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'545',	56,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'30KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	1746748.00,	1746748.00,	0),
(132,	0,	0,	'',	'2023-12-02',	'M/s. Veera Industries',	235,	'9841494969',	'NA',	'Chennai',	'Tamilnadu - NA',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'Sheets',	'Others',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'545',	36,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'30KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	3954691.00,	3954691.00,	0),
(133,	0,	0,	'',	'2023-12-02',	'Mr. Senthil',	236,	'8870751895',	'NA',	',Tindivanam',	'Tamilnadu - 604001',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Single phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'Off-Grid Inverter',	'3KW',	1,	'All Mountings, Electricals and Installation',	'200Ah',	4,	'Cash / Finance',	279766.00,	279766.00,	0),
(134,	0,	0,	'',	'2023-12-02',	'Mr. Sankarnarayanan',	237,	'9790222381',	'NA',	',',	'Puducherry - 605001',	'NA',	1,	'NA',	'Electricity Department - Puducherry',	'Sheets',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	10,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'5KW (Single Phase Inverter)',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	305177.00,	305177.00,	0),
(135,	0,	0,	'',	'2023-12-02',	'Mr. S. Ramadass',	238,	'9566602888 ',	'ramsfedrik123@gmail.com',	'No.29, 3rd Cross, Sriram nagar, Ariankuppam',	'Puducherry - 605007',	'41-03-03-0292MC',	1,	'NA',	'Electricity Department - Puducherry',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	12,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'6KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Finance',	421015.00,	421015.00,	0),
(136,	0,	0,	'',	'2023-12-02',	'Mr. Karthikeyan',	239,	'9840067936',	'NA',	'ECR, Chennai',	'Tamilnadu - 600041',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	10,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'5KW',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	345177.00,	345177.00,	0),
(137,	0,	0,	'',	'2023-12-02',	'Mr. Karthikeyan',	240,	'9840067936',	'NA',	'ECR, Chennai',	'Tamilnadu - 600041',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	13,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'6KW[3P]',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	446651.00,	446651.00,	0),
(138,	0,	0,	'',	'2023-12-02',	'Mr. Rajendra',	241,	'9445876166',	'NA',	'Chennai',	'Tamilnadu - 600000',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'Others',	'Ground Floor',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	8,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'Off-Grid Inverter',	'BLDC 5HP MOTOR',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	293809.00,	293809.00,	0),
(139,	0,	0,	'',	'2023-12-04',	'Mr. Kumar',	242,	'9444841842',	'NA',	'Chrompet, Chennai',	'Tamilnadu - 600044',	'NA',	1,	'NA',	'Tamil nadu Electricity Board - TN',	'Others',	'Others',	'Others',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	213149.00,	213149.00,	0),
(140,	0,	0,	'',	'2023-12-04',	'Mr. Benjamin Jerry',	243,	'9994632237',	'NA',	'ECR Main Road, Bommaiyar Palayam',	'Puducherry - 605104 ',	'NA',	1,	'NA',	'Electricity Department - Puducherry',	'Sheets',	'Ground Floor',	'N/A',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'Off-Grid Inverter',	'3KW (Single Phase Inverter)',	1,	'All Mountings, Electricals and Installation',	'200Ah',	4,	'Cash / Finance',	279766.00,	279766.00,	0),
(141,	0,	0,	'',	'2023-12-05',	'Mr. Suman',	244,	'9962543438',	'',	'ECR, Sholinganallur',	'Tamilnadu - 600119',	'NA',	1,	'Na',	'Tamil nadu Electricity Board - TN',	'RCC',	'Three storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	19,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'8Kw',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	639122.00,	639122.00,	0),
(142,	0,	0,	'',	'2023-12-04',	'Mr. VELMURUGAN',	245,	'9367173729',	'',	'Sriram Nagar, Vanur',	'Tamilnadu - 605011',	'02-435-003-1183',	1,	'3Kw',	'Tamil nadu Electricity Board - TN',	'RCC',	'Two storey',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	6,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'3Kw',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	213149.00,	213149.00,	0),
(144,	0,	1,	'ENQ0000',	'2023-12-05',	'Testing',	NULL,	'9940933927',	'',	'',	'Puducherry',	NULL,	0,	'NA',	NULL,	NULL,	NULL,	'Single phase',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(145,	0,	2,	'ENQ0001',	'2023-12-05',	'Sugumar',	NULL,	'888888888',	'',	'',	'Tamilnadu',	NULL,	0,	'NA',	NULL,	NULL,	NULL,	'',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(147,	0,	0,	NULL,	'2023-12-05',	'Mr. S. KARTHICK',	248,	'9952712134',	'NA',	'Padappai, Salamangalam',	'Tamilnadu - 601301',	'095700102145',	1,	'5KW',	'Tamil nadu Electricity Board - TN',	'N/A',	'N/A',	'Three phase',	'Waaree / Renewsys / Saatvik / Rayzon',	'540',	10,	'Growatt/ EVVO/ UTL/ Deye/ K-Solar',	'On-Grid Inverter',	'5',	1,	'All Mountings, Electricals and Installation',	'NA',	0,	'Cash / Finance',	345177.00,	345177.00,	0);

DROP TABLE IF EXISTS `sign`;
CREATE TABLE `sign` (
  `sign_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`sign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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


-- 2023-12-05 10:02:29
