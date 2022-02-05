DROP TABLE absent;

CREATE TABLE `absent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reason` text DEFAULT NULL,
  `attendance_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;

INSERT INTO absent VALUES("3","Injured","149");
INSERT INTO absent VALUES("6","Sick Leave","147");
INSERT INTO absent VALUES("14","Vacation","146");
INSERT INTO absent VALUES("42","jjj","75");
INSERT INTO absent VALUES("59","a","192");
INSERT INTO absent VALUES("68","Leave","87");
INSERT INTO absent VALUES("71","Vacation","88");



DROP TABLE account;

CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4;

INSERT INTO account VALUES("1","userCoor1","$2y$10$56pWKFgs1uNsByjCoFM16OPfmTr5EYFrG/vrBK5fV5uSa2q.JDymS","Coordinator");
INSERT INTO account VALUES("2","userCoorP","$2y$10$KCWrBw2675r31GefFCDhVOEhRGS16Ac.JaIEU7/MaWHwzAs2Tzw0a","Coordinator");
INSERT INTO account VALUES("3","userCoor3","$2y$10$mop5rQDP.hU2zcvX66Gyg.EQolj0uijO.4qNbLNm2dU6vkETmn0uq","Coordinator");
INSERT INTO account VALUES("4","userCoor4","$2y$10$R/5F51TX2D4s0ZpwGz4U6edcMYYpeNHh0q/utQ2FBE.yvGFy.hxfW","Coordinator");
INSERT INTO account VALUES("5","userCoor5","$2y$10$BQ4QqF6R9TTx0vlChFsMee/wvNn.K85/AbELFBfSbxX5ZdKImptiK","Coordinator");
INSERT INTO account VALUES("6","userCoor6","$2y$10$HBUDuEAqaWqe5UcssKi6K.TbcTKfQayL8WFKwafXBVBXX98zjDGbG","Coordinator");
INSERT INTO account VALUES("7","userCoorSSS","$2y$10$ADQOACGDaM6oklANlpU11.FwLJSkFzC..d.3s4KP9mlCPklRMD4uO","Coordinator");
INSERT INTO account VALUES("8","userCoor8","$2y$10$mqb3ZI8n3GpQrpfWEUuuauiTAYU/QfeInjua9mdZ4PygoKleA5SJ6","Coordinator");
INSERT INTO account VALUES("9","userCoor9","$2y$10$npRxSoaI15k96nF8v2eBxOuGfymD/3SOv/b6eCdoASzDwTXmgydAO","Coordinator");
INSERT INTO account VALUES("10","userCoor10","$2y$10$LdVM9f6hWfQ2ombY4tpsEOzhvC7vxZZT/JsMcPKhDrsKU8FCgV1Ji","Coordinator");
INSERT INTO account VALUES("43","userTest1","$2y$10$Zuaj/x6D1Fw1aCLJdzTqwu2.WWVxPPE16qGcvyqvpyNyd778IROh6","Coordinator");
INSERT INTO account VALUES("44","userTest2","$2y$10$MDLJp7r3ee9Ln0rxX.QLIeP8Jmy6IcptW5otuF6mcs1zBWiJHnISm","Coordinator");
INSERT INTO account VALUES("45","userTest3","$2y$10$sc0YZUb93ZSL6hf4lPqjXutosj0JvTKr03ZEhiOP8.MdttfvFGH5q","Coordinator");
INSERT INTO account VALUES("46","userTest4","$2y$10$x5LlcnCpll5JUyj2h/woJupqltWLN7pH/j75ymz3xm.MnnQHAcoeG","Coordinator");
INSERT INTO account VALUES("47","userTest5","$2y$10$ZoyPr0lBWreArSEZ4wNTuOFrGKd4JFkmxdTfAD85R/C7KXzL/7sMK","Coordinator");
INSERT INTO account VALUES("68","subjectUser1","$2y$10$dRyzzUeXgsZFscx1KVnH5OJFng2XfaPnfRC3LIn3EKYvGUVcxsifK","Coordinator");
INSERT INTO account VALUES("69","subjectUser2","$2y$10$NSZQLVXgw7Z/VtNEJVLUj.xKSTJVc2aR8Hs3iTwtJiiwjqx6Fv0OS","Coordinator");
INSERT INTO account VALUES("70","subjectUserY","$2y$10$/C0VKmPrxBMKn6.KkNpGaugNbY3CsYO3ZPAhSbnnB6/W837lPLzVq","Coordinator");
INSERT INTO account VALUES("77","taCoordinator","$2y$10$rCAlApID3zTrVlEyX7f2kevYFFKP2cX3MRtZJYnTmK1Dg8eHP8LLu","Coordinator");
INSERT INTO account VALUES("78","taTeacher","$2y$10$CkEL/RMS7uFpf1lz/cvDfuGVgykPT6zXtlfu9ldFVOheUQPbmmCd2","Teacher");
INSERT INTO account VALUES("79","taAdmin","$2y$10$grGyCQPAeIjJ/9.t6TsLPezx4N2EEonHBy4sCADNPDU9Kbfbv5QQC","Admin");
INSERT INTO account VALUES("80","taCTeacher","$2y$10$c7s2qypiJ4nNrHUve3guae43.sm03jfj2T80.E6UQ409S1lWDCvjm","Class Teacher");
INSERT INTO account VALUES("108","hellohello","$2y$10$h0iJxJPeK9Q1JjK5HqrmjO7FUahnFTsmnPQ5.u2KMpGx/e8pgxZMi","Coordinator");
INSERT INTO account VALUES("109","KishenUser","$2y$10$Kpzk63wd1kKDzChNioG9nujmRleSq1xZgYUH7nFMx8my37NHv1sdK","Coordinator");
INSERT INTO account VALUES("111","username","$2y$10$h6kha5cmQ0lz0.qQovRxTuULEELWo2mbUgoWoBNZt/tQy.u14jbOC","Coordinator");
INSERT INTO account VALUES("117","varIcoor","$2y$10$HU3MsWpFaJHDK0U9XjvlY.RQMcq7sDxcAT.mc2i2PGyZPb8gtNLta","Coordinator");
INSERT INTO account VALUES("118","victori92","$2y$10$M.OtCIKNJ.BeU2ndWEs5vOznfkv.Qdnfooadzu7ZpIDoJXiGDS.ra","Coordinator");
INSERT INTO account VALUES("123","adamLevi33","$2y$10$CWM1IUv5ZvIYu9YMaLufR.SB9PqgrdGq8M4g197oJL9ffv7z0gpDu","Coordinator");
INSERT INTO account VALUES("127","brunoM1","$2y$10$wk299oC2Swz/vRK83ulj3ucb.tQ.Dmr8I0DTBaFczf4kE2xLgM8/6","Class Teacher");
INSERT INTO account VALUES("128","katyUserAAA","$2y$10$JXRuMLwnxMxQN2yPu1odx.UzeGD7YdkypGSAz90NTYpXamimSLUlW","Class Teacher");



DROP TABLE admin;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) NOT NULL,
  `school_address` varchar(255) NOT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO admin VALUES("1","SMK Ahmad Boestamam","Jalan Haji Mohammad Ali, 32000 Sitiawan, Perak","79");



DROP TABLE attendance;

CREATE TABLE `attendance` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb4;

INSERT INTO attendance VALUES("1","2022-02-03","22","1");
INSERT INTO attendance VALUES("2","2022-02-03","23","1");
INSERT INTO attendance VALUES("3","2022-02-03","24","1");
INSERT INTO attendance VALUES("4","2022-02-03","25","1");
INSERT INTO attendance VALUES("5","2022-02-03","26","1");
INSERT INTO attendance VALUES("6","2022-02-03","27","1");
INSERT INTO attendance VALUES("7","2022-02-03","28","1");
INSERT INTO attendance VALUES("8","2022-02-03","29","1");
INSERT INTO attendance VALUES("9","2022-02-03","30","1");
INSERT INTO attendance VALUES("10","2022-02-03","31","0");
INSERT INTO attendance VALUES("11","2022-02-04","22","1");
INSERT INTO attendance VALUES("12","2022-02-04","23","1");
INSERT INTO attendance VALUES("13","2022-02-04","24","1");
INSERT INTO attendance VALUES("14","2022-02-04","25","1");
INSERT INTO attendance VALUES("15","2022-02-04","26","1");
INSERT INTO attendance VALUES("16","2022-02-04","27","0");
INSERT INTO attendance VALUES("17","2022-02-04","28","0");
INSERT INTO attendance VALUES("18","2022-02-04","29","1");
INSERT INTO attendance VALUES("19","2022-02-04","30","1");
INSERT INTO attendance VALUES("20","2022-02-04","31","1");
INSERT INTO attendance VALUES("21","2022-02-05","22","1");
INSERT INTO attendance VALUES("22","2022-02-05","23","1");
INSERT INTO attendance VALUES("23","2022-02-05","24","0");
INSERT INTO attendance VALUES("24","2022-02-05","25","0");
INSERT INTO attendance VALUES("25","2022-02-05","26","1");
INSERT INTO attendance VALUES("26","2022-02-05","27","0");
INSERT INTO attendance VALUES("27","2022-02-05","28","0");
INSERT INTO attendance VALUES("28","2022-02-05","29","1");
INSERT INTO attendance VALUES("29","2022-02-05","30","0");
INSERT INTO attendance VALUES("30","2022-02-05","31","1");
INSERT INTO attendance VALUES("31","2022-02-06","22","0");
INSERT INTO attendance VALUES("32","2022-02-06","23","1");
INSERT INTO attendance VALUES("33","2022-02-06","24","0");
INSERT INTO attendance VALUES("34","2022-02-06","25","0");
INSERT INTO attendance VALUES("35","2022-02-06","26","1");
INSERT INTO attendance VALUES("36","2022-02-06","27","1");
INSERT INTO attendance VALUES("37","2022-02-06","28","0");
INSERT INTO attendance VALUES("38","2022-02-06","29","0");
INSERT INTO attendance VALUES("39","2022-02-06","30","1");
INSERT INTO attendance VALUES("40","2022-02-06","31","0");
INSERT INTO attendance VALUES("41","2022-02-05","32","1");
INSERT INTO attendance VALUES("42","2022-02-05","33","1");
INSERT INTO attendance VALUES("43","2022-02-05","34","0");
INSERT INTO attendance VALUES("44","2022-02-05","35","0");
INSERT INTO attendance VALUES("45","2022-02-05","36","1");
INSERT INTO attendance VALUES("46","2022-02-05","37","1");
INSERT INTO attendance VALUES("47","2022-02-05","38","0");
INSERT INTO attendance VALUES("48","2022-02-05","39","0");
INSERT INTO attendance VALUES("49","2022-02-05","40","1");
INSERT INTO attendance VALUES("50","2022-02-05","41","1");
INSERT INTO attendance VALUES("51","2022-02-06","32","1");
INSERT INTO attendance VALUES("52","2022-02-06","33","0");
INSERT INTO attendance VALUES("53","2022-02-06","34","1");
INSERT INTO attendance VALUES("54","2022-02-06","35","1");
INSERT INTO attendance VALUES("55","2022-02-06","36","0");
INSERT INTO attendance VALUES("56","2022-02-06","37","0");
INSERT INTO attendance VALUES("57","2022-02-06","38","1");
INSERT INTO attendance VALUES("58","2022-02-06","39","1");
INSERT INTO attendance VALUES("59","2022-02-06","40","0");
INSERT INTO attendance VALUES("60","2022-02-06","41","0");
INSERT INTO attendance VALUES("61","2022-02-04","32","1");
INSERT INTO attendance VALUES("62","2022-02-04","33","1");
INSERT INTO attendance VALUES("63","2022-02-04","34","1");
INSERT INTO attendance VALUES("64","2022-02-04","35","0");
INSERT INTO attendance VALUES("65","2022-02-04","36","1");
INSERT INTO attendance VALUES("66","2022-02-04","37","1");
INSERT INTO attendance VALUES("67","2022-02-04","38","1");
INSERT INTO attendance VALUES("68","2022-02-04","39","1");
INSERT INTO attendance VALUES("69","2022-02-04","40","1");
INSERT INTO attendance VALUES("70","2022-02-04","41","0");
INSERT INTO attendance VALUES("71","2022-02-03","32","1");
INSERT INTO attendance VALUES("72","2022-02-03","33","1");
INSERT INTO attendance VALUES("73","2022-02-03","34","1");
INSERT INTO attendance VALUES("74","2022-02-03","35","1");
INSERT INTO attendance VALUES("75","2022-02-03","36","1");
INSERT INTO attendance VALUES("76","2022-02-03","37","1");
INSERT INTO attendance VALUES("77","2022-02-03","38","1");
INSERT INTO attendance VALUES("78","2022-02-03","39","0");
INSERT INTO attendance VALUES("79","2022-02-03","40","0");
INSERT INTO attendance VALUES("80","2022-02-03","41","1");
INSERT INTO attendance VALUES("81","2022-02-03","42","1");
INSERT INTO attendance VALUES("82","2022-02-03","43","0");
INSERT INTO attendance VALUES("83","2022-02-03","44","1");
INSERT INTO attendance VALUES("84","2022-02-03","45","1");
INSERT INTO attendance VALUES("85","2022-02-03","46","1");
INSERT INTO attendance VALUES("86","2022-02-03","47","1");
INSERT INTO attendance VALUES("87","2022-02-03","48","0");
INSERT INTO attendance VALUES("88","2022-02-03","49","1");
INSERT INTO attendance VALUES("89","2022-02-03","50","1");
INSERT INTO attendance VALUES("90","2022-02-03","51","1");
INSERT INTO attendance VALUES("91","2022-02-04","42","1");
INSERT INTO attendance VALUES("92","2022-02-04","43","1");
INSERT INTO attendance VALUES("93","2022-02-04","44","1");
INSERT INTO attendance VALUES("94","2022-02-04","45","1");
INSERT INTO attendance VALUES("95","2022-02-04","46","0");
INSERT INTO attendance VALUES("96","2022-02-04","47","0");
INSERT INTO attendance VALUES("97","2022-02-04","48","1");
INSERT INTO attendance VALUES("98","2022-02-04","49","0");
INSERT INTO attendance VALUES("99","2022-02-04","50","1");
INSERT INTO attendance VALUES("100","2022-02-04","51","1");
INSERT INTO attendance VALUES("101","2022-02-05","42","0");
INSERT INTO attendance VALUES("102","2022-02-05","43","0");
INSERT INTO attendance VALUES("103","2022-02-05","44","0");
INSERT INTO attendance VALUES("104","2022-02-05","45","1");
INSERT INTO attendance VALUES("105","2022-02-05","46","1");
INSERT INTO attendance VALUES("106","2022-02-05","47","1");
INSERT INTO attendance VALUES("107","2022-02-05","48","0");
INSERT INTO attendance VALUES("108","2022-02-05","49","0");
INSERT INTO attendance VALUES("109","2022-02-05","50","0");
INSERT INTO attendance VALUES("110","2022-02-05","51","1");
INSERT INTO attendance VALUES("111","2022-02-06","42","1");
INSERT INTO attendance VALUES("112","2022-02-06","43","0");
INSERT INTO attendance VALUES("113","2022-02-06","44","0");
INSERT INTO attendance VALUES("114","2022-02-06","45","1");
INSERT INTO attendance VALUES("115","2022-02-06","46","1");
INSERT INTO attendance VALUES("116","2022-02-06","47","0");
INSERT INTO attendance VALUES("117","2022-02-06","48","0");
INSERT INTO attendance VALUES("118","2022-02-06","49","0");
INSERT INTO attendance VALUES("119","2022-02-06","50","0");
INSERT INTO attendance VALUES("120","2022-02-06","51","0");
INSERT INTO attendance VALUES("121","2022-02-03","52","0");
INSERT INTO attendance VALUES("122","2022-02-03","53","1");
INSERT INTO attendance VALUES("123","2022-02-03","54","1");
INSERT INTO attendance VALUES("124","2022-02-03","55","1");
INSERT INTO attendance VALUES("125","2022-02-03","56","1");
INSERT INTO attendance VALUES("126","2022-02-03","57","1");
INSERT INTO attendance VALUES("127","2022-02-03","58","1");
INSERT INTO attendance VALUES("128","2022-02-03","59","1");
INSERT INTO attendance VALUES("129","2022-02-03","60","1");
INSERT INTO attendance VALUES("130","2022-02-03","61","1");
INSERT INTO attendance VALUES("131","2022-02-04","52","1");
INSERT INTO attendance VALUES("132","2022-02-04","53","1");
INSERT INTO attendance VALUES("133","2022-02-04","54","1");
INSERT INTO attendance VALUES("134","2022-02-04","55","1");
INSERT INTO attendance VALUES("135","2022-02-04","56","1");
INSERT INTO attendance VALUES("136","2022-02-04","57","1");
INSERT INTO attendance VALUES("137","2022-02-04","58","1");
INSERT INTO attendance VALUES("138","2022-02-04","59","1");
INSERT INTO attendance VALUES("139","2022-02-04","60","1");
INSERT INTO attendance VALUES("140","2022-02-04","61","1");
INSERT INTO attendance VALUES("141","2022-02-05","52","0");
INSERT INTO attendance VALUES("142","2022-02-05","53","1");
INSERT INTO attendance VALUES("143","2022-02-05","54","1");
INSERT INTO attendance VALUES("144","2022-02-05","55","0");
INSERT INTO attendance VALUES("145","2022-02-05","56","0");
INSERT INTO attendance VALUES("146","2022-02-05","57","0");
INSERT INTO attendance VALUES("147","2022-02-05","58","1");
INSERT INTO attendance VALUES("148","2022-02-05","59","1");
INSERT INTO attendance VALUES("149","2022-02-05","60","1");
INSERT INTO attendance VALUES("150","2022-02-05","61","1");
INSERT INTO attendance VALUES("151","2022-02-06","52","0");
INSERT INTO attendance VALUES("152","2022-02-06","53","1");
INSERT INTO attendance VALUES("153","2022-02-06","54","0");
INSERT INTO attendance VALUES("154","2022-02-06","55","1");
INSERT INTO attendance VALUES("155","2022-02-06","56","1");
INSERT INTO attendance VALUES("156","2022-02-06","57","1");
INSERT INTO attendance VALUES("157","2022-02-06","58","0");
INSERT INTO attendance VALUES("158","2022-02-06","59","0");
INSERT INTO attendance VALUES("159","2022-02-06","60","1");
INSERT INTO attendance VALUES("160","2022-02-06","61","0");
INSERT INTO attendance VALUES("161","2022-02-03","62","1");
INSERT INTO attendance VALUES("162","2022-02-03","63","1");
INSERT INTO attendance VALUES("163","2022-02-03","64","1");
INSERT INTO attendance VALUES("164","2022-02-03","65","1");
INSERT INTO attendance VALUES("165","2022-02-03","66","1");
INSERT INTO attendance VALUES("166","2022-02-04","62","1");
INSERT INTO attendance VALUES("167","2022-02-04","63","1");
INSERT INTO attendance VALUES("168","2022-02-04","64","1");
INSERT INTO attendance VALUES("169","2022-02-04","65","1");
INSERT INTO attendance VALUES("170","2022-02-04","66","1");
INSERT INTO attendance VALUES("171","2022-02-05","62","0");
INSERT INTO attendance VALUES("172","2022-02-05","63","1");
INSERT INTO attendance VALUES("173","2022-02-05","64","1");
INSERT INTO attendance VALUES("174","2022-02-05","65","0");
INSERT INTO attendance VALUES("175","2022-02-05","66","0");
INSERT INTO attendance VALUES("176","2022-02-06","62","0");
INSERT INTO attendance VALUES("177","2022-02-06","63","1");
INSERT INTO attendance VALUES("178","2022-02-06","64","1");
INSERT INTO attendance VALUES("179","2022-02-06","65","0");
INSERT INTO attendance VALUES("180","2022-02-06","66","0");
INSERT INTO attendance VALUES("181","2022-02-03","92","0");
INSERT INTO attendance VALUES("182","2022-02-03","93","0");
INSERT INTO attendance VALUES("183","2022-02-03","94","1");
INSERT INTO attendance VALUES("184","2022-02-03","95","1");
INSERT INTO attendance VALUES("185","2022-02-03","96","1");
INSERT INTO attendance VALUES("186","2022-02-04","92","1");
INSERT INTO attendance VALUES("187","2022-02-04","93","1");
INSERT INTO attendance VALUES("188","2022-02-04","94","1");
INSERT INTO attendance VALUES("189","2022-02-04","95","1");
INSERT INTO attendance VALUES("190","2022-02-04","96","1");
INSERT INTO attendance VALUES("191","2022-02-05","92","0");
INSERT INTO attendance VALUES("192","2022-02-05","93","1");
INSERT INTO attendance VALUES("193","2022-02-05","94","0");
INSERT INTO attendance VALUES("194","2022-02-05","95","0");
INSERT INTO attendance VALUES("195","2022-02-05","96","1");
INSERT INTO attendance VALUES("196","2022-02-06","92","0");
INSERT INTO attendance VALUES("197","2022-02-06","93","1");
INSERT INTO attendance VALUES("198","2022-02-06","94","0");
INSERT INTO attendance VALUES("199","2022-02-06","95","1");
INSERT INTO attendance VALUES("200","2022-02-06","96","1");
INSERT INTO attendance VALUES("201","2022-02-03","87","0");
INSERT INTO attendance VALUES("202","2022-02-03","88","1");
INSERT INTO attendance VALUES("203","2022-02-03","89","1");
INSERT INTO attendance VALUES("204","2022-02-03","90","1");
INSERT INTO attendance VALUES("205","2022-02-03","91","1");
INSERT INTO attendance VALUES("206","2022-02-04","87","1");
INSERT INTO attendance VALUES("207","2022-02-04","88","1");
INSERT INTO attendance VALUES("208","2022-02-04","89","0");
INSERT INTO attendance VALUES("209","2022-02-04","90","1");
INSERT INTO attendance VALUES("210","2022-02-04","91","1");
INSERT INTO attendance VALUES("211","2022-02-05","87","0");
INSERT INTO attendance VALUES("212","2022-02-05","88","0");
INSERT INTO attendance VALUES("213","2022-02-05","89","1");
INSERT INTO attendance VALUES("214","2022-02-05","90","1");
INSERT INTO attendance VALUES("215","2022-02-05","91","1");
INSERT INTO attendance VALUES("216","2022-02-06","87","0");
INSERT INTO attendance VALUES("217","2022-02-06","88","0");
INSERT INTO attendance VALUES("218","2022-02-06","89","1");
INSERT INTO attendance VALUES("219","2022-02-06","90","1");
INSERT INTO attendance VALUES("220","2022-02-06","91","0");
INSERT INTO attendance VALUES("221","2022-02-03","82","1");
INSERT INTO attendance VALUES("222","2022-02-03","83","1");
INSERT INTO attendance VALUES("223","2022-02-03","84","1");
INSERT INTO attendance VALUES("224","2022-02-03","85","1");
INSERT INTO attendance VALUES("225","2022-02-03","86","1");
INSERT INTO attendance VALUES("226","2022-02-04","82","1");
INSERT INTO attendance VALUES("227","2022-02-04","83","1");
INSERT INTO attendance VALUES("228","2022-02-04","84","1");
INSERT INTO attendance VALUES("229","2022-02-04","85","1");
INSERT INTO attendance VALUES("230","2022-02-04","86","1");
INSERT INTO attendance VALUES("231","2022-02-05","82","0");
INSERT INTO attendance VALUES("232","2022-02-05","83","0");
INSERT INTO attendance VALUES("233","2022-02-05","84","1");
INSERT INTO attendance VALUES("234","2022-02-05","85","1");
INSERT INTO attendance VALUES("235","2022-02-05","86","0");
INSERT INTO attendance VALUES("236","2022-02-06","82","0");
INSERT INTO attendance VALUES("237","2022-02-06","83","1");
INSERT INTO attendance VALUES("238","2022-02-06","84","1");
INSERT INTO attendance VALUES("239","2022-02-06","85","1");
INSERT INTO attendance VALUES("240","2022-02-06","86","0");



DROP TABLE backup;

CREATE TABLE `backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

INSERT INTO backup VALUES("23","Thu 20-Jan-2022 01-50","Thu 20-Jan","2022","01:50:44 am");
INSERT INTO backup VALUES("24","Thu 20-Jan-2022 01-50","Thu 20-Jan","2022","01:50:52 am");
INSERT INTO backup VALUES("25","Thu 20-Jan-2022 01-54","Thu 20-Jan","2022","01:54:25 am");
INSERT INTO backup VALUES("26","Thu 20-Jan-2022 01-54","Thu 20-Jan","2022","01:54:26 am");
INSERT INTO backup VALUES("27","Thu 20-Jan-2022 01-54","Thu 20-Jan","2022","01:54:32 am");
INSERT INTO backup VALUES("28","Thu 20-Jan-2022 01-58","Thu 20-Jan","2022","01:58:59 am");



DROP TABLE calendar;

CREATE TABLE `calendar` (
  `date` date NOT NULL,
  UNIQUE KEY `date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO calendar VALUES("2022-02-03");
INSERT INTO calendar VALUES("2022-02-04");
INSERT INTO calendar VALUES("2022-02-05");
INSERT INTO calendar VALUES("2022-02-06");
INSERT INTO calendar VALUES("2022-02-20");
INSERT INTO calendar VALUES("2022-02-21");
INSERT INTO calendar VALUES("2022-02-22");
INSERT INTO calendar VALUES("2022-02-23");
INSERT INTO calendar VALUES("2022-02-24");
INSERT INTO calendar VALUES("2022-02-25");
INSERT INTO calendar VALUES("2022-02-26");
INSERT INTO calendar VALUES("2022-02-27");
INSERT INTO calendar VALUES("2022-02-28");



DROP TABLE calendar_events;

CREATE TABLE `calendar_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;

INSERT INTO calendar_events VALUES("1","2021-12-25","Christmas Day 1");
INSERT INTO calendar_events VALUES("2","2021-12-26","Christmas Day 2");
INSERT INTO calendar_events VALUES("3","2021-12-21","Public Holiday");
INSERT INTO calendar_events VALUES("4","2021-12-04","Book fair");
INSERT INTO calendar_events VALUES("5","2021-12-17","Sports Day");
INSERT INTO calendar_events VALUES("6","2021-12-16","Sports Day (rehearsal)");
INSERT INTO calendar_events VALUES("10","2021-11-17","Test Nov Event");
INSERT INTO calendar_events VALUES("22","2021-12-08","Test Event Dec");
INSERT INTO calendar_events VALUES("23","2022-01-03","School Open");
INSERT INTO calendar_events VALUES("51","2022-01-08","Event Name");
INSERT INTO calendar_events VALUES("54","2022-01-14","Event 14 Jan 2022");
INSERT INTO calendar_events VALUES("56","2022-01-25","Chinese New Year Holiday");
INSERT INTO calendar_events VALUES("57","2022-01-26","CNY 2");
INSERT INTO calendar_events VALUES("58","2022-02-01","Chinese New Year Day 1");
INSERT INTO calendar_events VALUES("59","2022-02-02","Chinese New Year Day 2");
INSERT INTO calendar_events VALUES("60","2022-02-10","Sports Day");
INSERT INTO calendar_events VALUES("61","2022-02-15","Israk & Mikraj Holiday");
INSERT INTO calendar_events VALUES("62","2022-02-26","YDBD Perak\'s Birthday");



DROP TABLE class;

CREATE TABLE `class` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `form` varchar(255) NOT NULL,
  `student_amount` int(255) NOT NULL DEFAULT 0,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

INSERT INTO class VALUES("18","3 Baiduri","Form 3","5","5");
INSERT INTO class VALUES("19","3 Berlian","Form 3","2","6");
INSERT INTO class VALUES("20","4 Ruby","Form 4","5","0");
INSERT INTO class VALUES("21","5 Nilam","Form 5","5","0");
INSERT INTO class VALUES("24","1 Baiduri","Form 1","10","4");
INSERT INTO class VALUES("25","1 Berlian","Form 1","10","0");
INSERT INTO class VALUES("26","2 Topaz","Form 2","10","0");
INSERT INTO class VALUES("27","2 Jed","Form 2","10","0");
INSERT INTO class VALUES("30","6 Delima","Form 6","5","0");
INSERT INTO class VALUES("31","1 Nilam","Form 1","0","0");
INSERT INTO class VALUES("32","1 Ruby","Form 1","0","0");
INSERT INTO class VALUES("33","1 Zamrud","Form 1","0","0");
INSERT INTO class VALUES("34","1 Delima","Form 1","0","0");
INSERT INTO class VALUES("35","1 Mutiara","Form 1","0","0");
INSERT INTO class VALUES("42","2 Wow","Form 2","0","0");



DROP TABLE coordinator;

CREATE TABLE `coordinator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4;

INSERT INTO coordinator VALUES("1","Coordinator1","Principle","","","1");
INSERT INTO coordinator VALUES("2","Coordinator2","Vice Principle","","","2");
INSERT INTO coordinator VALUES("3","Coordinator3","Discipline Teacher","","","3");
INSERT INTO coordinator VALUES("4","Coordinator4","Head of Form 1","","","4");
INSERT INTO coordinator VALUES("5","Coordinator5","Head of Form 2","","","5");
INSERT INTO coordinator VALUES("6","Coordinator6","Head of Form 3","","","6");
INSERT INTO coordinator VALUES("7","Coordinator7","Head of Form 4","","","7");
INSERT INTO coordinator VALUES("8","Coordinator8","Head of Form 5","","","8");
INSERT INTO coordinator VALUES("9","Coordinator9","Head of Form 6","","","9");
INSERT INTO coordinator VALUES("10","Coordinator10","Co-curriculum in Charge","","","10");
INSERT INTO coordinator VALUES("36","Test Coordinator 1","Position A","","","43");
INSERT INTO coordinator VALUES("37","Test Coordinator 2","","","","44");
INSERT INTO coordinator VALUES("38","Test Coordinator 3","","","","45");
INSERT INTO coordinator VALUES("39","Test Coordinator 4","Position B","","","46");
INSERT INTO coordinator VALUES("40","Test Coordinator 5","","","","47");
INSERT INTO coordinator VALUES("61","Subject1","Position C","","","68");
INSERT INTO coordinator VALUES("62","Subject2","","","","69");
INSERT INTO coordinator VALUES("63","Subject3","Position D","","","70");
INSERT INTO coordinator VALUES("70","Coordinator Test","Head of Form 2","AAA@gmail.com","012-3456789","77");
INSERT INTO coordinator VALUES("98","HelloEEE","","","","108");
INSERT INTO coordinator VALUES("99","Kishen","Coordinator","","","109");
INSERT INTO coordinator VALUES("101","Kishen BBB","position","","","111");
INSERT INTO coordinator VALUES("107","Ivar","","","","117");
INSERT INTO coordinator VALUES("108","Victoria","Form 4 in-charge","","","118");
INSERT INTO coordinator VALUES("113","Adam Levi","Co-Head Form 4","","","123");



DROP TABLE forcast;

CREATE TABLE `forcast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `attendance` float(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

INSERT INTO forcast VALUES("1","2022-02-03","85.00");
INSERT INTO forcast VALUES("2","2022-02-04","86.70");
INSERT INTO forcast VALUES("3","2022-02-05","50.00");
INSERT INTO forcast VALUES("12","2022-02-06","45.00");
INSERT INTO forcast VALUES("17","2022-02-20","0.00");
INSERT INTO forcast VALUES("18","2022-02-21","0.00");
INSERT INTO forcast VALUES("19","2022-02-22","0.00");
INSERT INTO forcast VALUES("20","2022-02-23","0.00");
INSERT INTO forcast VALUES("21","2022-02-24","0.00");
INSERT INTO forcast VALUES("22","2022-02-25","0.00");
INSERT INTO forcast VALUES("23","2022-02-26","0.00");
INSERT INTO forcast VALUES("24","2022-02-27","0.00");
INSERT INTO forcast VALUES("25","2022-02-28","0.00");



DROP TABLE parent;

CREATE TABLE `parent` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

INSERT INTO parent VALUES("1","Parent","Father","xkishenkumarx@gmail.com","0188887777");
INSERT INTO parent VALUES("2","Parent2","Mother","xdruvakumarx@gmail.com","0168887213");
INSERT INTO parent VALUES("3","Parent3","Guardian","xkishenkumarx@gmail.com","0181234566");
INSERT INTO parent VALUES("4","Parent4","Father","xdruvakumarx@gmail.com","0181232366");
INSERT INTO parent VALUES("5","Parent5","Mother","xkishenkumarx@gmail.com","0181232366");
INSERT INTO parent VALUES("6","Parent6","Guardian","xdruvakumarx@gmail.com","0188887777");
INSERT INTO parent VALUES("7","Parent7","Father","xkishenkumarx@gmail.com","0181232366");
INSERT INTO parent VALUES("8","Parent8","Mother","xdruvakumarx@gmail.com","0188887777");
INSERT INTO parent VALUES("9","Parent9","Guardian","xkishenkumarx@gmail.com","0181232366");
INSERT INTO parent VALUES("10","Parent10","Father","xdruvakumarx@gmail.com","0188887777");
INSERT INTO parent VALUES("14","Parent AAA","Father","we@gmail.com","+60123456789");
INSERT INTO parent VALUES("17","Will Smith","Father","","+60123456789");
INSERT INTO parent VALUES("18","Dave Bautista","Father","we@gmail.com","+60123456789");
INSERT INTO parent VALUES("19","Vanessa Hudgens","Mother","we@gmail.com","+6012345678");
INSERT INTO parent VALUES("20","Ellie Kemper","Mother","quill@gmail.com","+60123456789");
INSERT INTO parent VALUES("21","Vera Farmiga","Mother","ver_farmiga@gmail.com","+6012345678");
INSERT INTO parent VALUES("24","Camilo Madrigal","Mother","f00@gmail.com","+6012345679");
INSERT INTO parent VALUES("25","Alexandra Shipp","Mother","e@yahoo.com","+60123456789");
INSERT INTO parent VALUES("37","parent parent","Guardian","","012334456666");
INSERT INTO parent VALUES("38","parent","Guardian","","+60123456282");
INSERT INTO parent VALUES("39","parent","Father","","+601556773332");
INSERT INTO parent VALUES("40","parent","Mother","","058343722244");
INSERT INTO parent VALUES("41","parent","Mother","","+601235598335");
INSERT INTO parent VALUES("42","parentNmae","Guardian","","+60123657843");
INSERT INTO parent VALUES("43","parent","Father","","+601488949434");
INSERT INTO parent VALUES("44","parent","Father","","017366493434");
INSERT INTO parent VALUES("45","parent","Father","","018783325525");
INSERT INTO parent VALUES("46","Michael","Father","","012873653453");
INSERT INTO parent VALUES("47","parent","Father","","+601236759455");
INSERT INTO parent VALUES("48","parent","Father","","+601236745945");
INSERT INTO parent VALUES("49","parent","Mother","","+601893737733");
INSERT INTO parent VALUES("50","wwwww","Father","","018727314627");
INSERT INTO parent VALUES("51","parent","Father","","+601234734242");



DROP TABLE student;

CREATE TABLE `student` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `total_absent_days` int(255) DEFAULT NULL,
  `cons_absent_days` int(255) DEFAULT NULL,
  `parent_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4;

INSERT INTO student VALUES("22","Donald Ducky","2021-12-01","Male","24","1","0","1");
INSERT INTO student VALUES("23","Goofy Goof","2021-12-01","Male","24","2","3","2");
INSERT INTO student VALUES("24","Balto Brave","2021-12-01","Male","24","2","2","1");
INSERT INTO student VALUES("25","Snow White","2021-12-01","Male","24","2","2","1");
INSERT INTO student VALUES("26","Alice Wonderful","2022-01-12","Female","24","2","2","1");
INSERT INTO student VALUES("27","Simba Green","2021-12-01","Male","24","3","2","1");
INSERT INTO student VALUES("28","Timon Pumba","2021-12-01","Male","24","2","2","1");
INSERT INTO student VALUES("29","Queen Elsa","2021-12-01","Male","24","2","2","1");
INSERT INTO student VALUES("30","Malik Shelly","2021-12-01","Male","24","2","2","1");
INSERT INTO student VALUES("31","Norman Lance","2021-12-01","Male","24","2","2","1");
INSERT INTO student VALUES("32","Johny Jackson","2021-12-01","Male","25","1","3","1");
INSERT INTO student VALUES("33","Mary Jane","2021-12-01","Male","25","2","2","1");
INSERT INTO student VALUES("34","Peter Parker","2021-12-01","Male","25","3","2","1");
INSERT INTO student VALUES("35","Thomas Shelby","2021-12-01","Male","25","2","2","1");
INSERT INTO student VALUES("36","Ezio Brito","2021-12-01","Male","25","2","2","1");
INSERT INTO student VALUES("37","Andrew Garfield","2022-01-02","Male","25","2","2","1");
INSERT INTO student VALUES("38","Zendaya","2021-12-01","Male","25","2","2","1");
INSERT INTO student VALUES("39","Tom Holland","2021-12-01","Male","25","2","1","1");
INSERT INTO student VALUES("40","Tobey Maguire","2021-12-01","Male","25","2","2","1");
INSERT INTO student VALUES("41","Jamie Foxx","2021-12-01","Male","25","2","2","1");
INSERT INTO student VALUES("42","Jon Snow","2021-12-01","Male","26","2","2","1");
INSERT INTO student VALUES("43","Sansa Stark","2021-12-01","Male","26","2","2","1");
INSERT INTO student VALUES("44","Arya Stark","2021-12-01","Male","26","2","2","1");
INSERT INTO student VALUES("45","Tyrion Lannister","2021-12-01","Male","26","2","2","1");
INSERT INTO student VALUES("46","Cersei Lannister","2021-12-01","Male","26","2","2","1");
INSERT INTO student VALUES("47","Jammie Lannister","2021-12-01","Male","26","2","2","1");
INSERT INTO student VALUES("48","Bran Stark","2021-12-01","Male","26","2","2","1");
INSERT INTO student VALUES("49","Theon Greyjoy","2021-12-01","Male","26","2","2","1");
INSERT INTO student VALUES("50","Petyr Baelish","2021-12-01","Male","26","2","2","1");
INSERT INTO student VALUES("51","Davos Seaworth","2021-12-01","Male","26","2","2","1");
INSERT INTO student VALUES("52","Scarlett Johansson","2021-12-01","Male","27","2","2","1");
INSERT INTO student VALUES("53","Robert Downey Jr.","2021-12-01","Male","27","2","2","1");
INSERT INTO student VALUES("54","Benedict Cumberbatch","2021-12-01","Male","27","2","2","1");
INSERT INTO student VALUES("55","Elizabeth Olsen","2021-12-01","Male","27","2","2","1");
INSERT INTO student VALUES("56","Chris Pratt","2021-12-01","Male","27","2","2","1");
INSERT INTO student VALUES("57","Mark Ruffalo","2021-12-01","Male","27","2","2","1");
INSERT INTO student VALUES("58","Chris Evans","2021-12-01","Male","27","2","2","1");
INSERT INTO student VALUES("59","Josh Brolin","2021-12-01","Male","27","2","2","1");
INSERT INTO student VALUES("60","Chadwick Boseman","2021-12-01","Male","27","2","2","1");
INSERT INTO student VALUES("61","Sebastian Stan
","2021-12-01","Male","27","2","2","1");
INSERT INTO student VALUES("62","Jaden Smith","2022-01-12","Male","18","2","2","17");
INSERT INTO student VALUES("63","Isaac Oscar","2022-01-04","Male","18","2","2","18");
INSERT INTO student VALUES("64","Zac Efron","2022-01-23","Male","18","2","2","19");
INSERT INTO student VALUES("65","Archie Yates","2000-01-05","Male","18","2","2","20");
INSERT INTO student VALUES("66","Patrick Wilson","2022-01-10","Male","18","2","2","21");
INSERT INTO student VALUES("69","Stephanie Beatrix","2022-01-05","Female","19","0","0","24");
INSERT INTO student VALUES("70","Jessica Darrow","2022-01-11","Female","19","2","2","25");
INSERT INTO student VALUES("82","Adele Lim","2022-01-17","Female","30","2","2","37");
INSERT INTO student VALUES("83","Evelyne Granjean","2022-01-18","Female","30","2","2","38");
INSERT INTO student VALUES("84","Jona Xiao","2022-01-15","Male","30","2","2","39");
INSERT INTO student VALUES("85","Francois Chau","2022-01-20","Male","30","2","2","40");
INSERT INTO student VALUES("86","Adeline Chetail","2022-01-02","Female","30","2","2","41");
INSERT INTO student VALUES("87","Dichen Lachman","2022-01-11","Male","21","2","2","42");
INSERT INTO student VALUES("88","Cassie Steele","2022-01-05","Female","21","2","2","43");
INSERT INTO student VALUES("89","Sung Kang","2022-01-04","Male","21","2","2","44");
INSERT INTO student VALUES("90","Patti Harrison","2021-12-27","Female","21","2","2","45");
INSERT INTO student VALUES("91","Thalia Tan","2021-11-29","Female","21","2","2","46");
INSERT INTO student VALUES("92","Ross Butler","2021-11-23","Male","20","2","2","47");
INSERT INTO student VALUES("93","Benedict Wong","2021-11-18","Male","20","2","2","48");
INSERT INTO student VALUES("94","Izaac Wong","2021-11-09","Male","20","2","2","49");
INSERT INTO student VALUES("95","Alan Tudyk","2021-11-09","Male","20","2","2","50");
INSERT INTO student VALUES("96","Lucille Soong","2021-11-09","Female","20","4","1","51");



DROP TABLE teacher;

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO teacher VALUES("3","Teacher Test","0182234663","78");
INSERT INTO teacher VALUES("4","Robert Joy","0122394577","80");
INSERT INTO teacher VALUES("5","Bruno Mars","","127");
INSERT INTO teacher VALUES("6","Katy Perry","","128");



DROP TABLE warning;

CREATE TABLE `warning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `case` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4;

INSERT INTO warning VALUES("104","Total Days","22");
INSERT INTO warning VALUES("105","Cons. Days","32");
INSERT INTO warning VALUES("106","Total Days","27");
INSERT INTO warning VALUES("110","Cons. Days","39");
INSERT INTO warning VALUES("111","Cons. Days","96");
INSERT INTO warning VALUES("112","Total Days","32");



DROP TABLE warning_exception;

CREATE TABLE `warning_exception` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file_type` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

INSERT INTO warning_exception VALUES("6","25","2021-11-22","2021-11-24","Leave for vacation","");
INSERT INTO warning_exception VALUES("11","45","2021-12-29","2022-01-01","Test AAA Exception","");
INSERT INTO warning_exception VALUES("12","24","2021-12-30","2022-01-07","Test AAB","");
INSERT INTO warning_exception VALUES("13","36","2021-12-30","2022-01-01","Test CCC Exception","");
INSERT INTO warning_exception VALUES("14","54","2022-01-07","2022-01-20","Exception Test Old","");
INSERT INTO warning_exception VALUES("15","55","2022-01-13","2022-01-14","Subject Leave","png");
INSERT INTO warning_exception VALUES("19","33","2022-01-19","2022-01-20","","");
INSERT INTO warning_exception VALUES("20","45","2022-01-20","2022-01-21","","");
INSERT INTO warning_exception VALUES("26","69","2022-01-30","2022-02-02","Exception Hello","");



