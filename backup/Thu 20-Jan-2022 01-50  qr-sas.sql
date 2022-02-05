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
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8mb4;

INSERT INTO attendance VALUES("72","2021-12-19","22","1");
INSERT INTO attendance VALUES("73","2021-12-19","23","1");
INSERT INTO attendance VALUES("74","2021-12-19","24","1");
INSERT INTO attendance VALUES("75","2021-12-19","25","0");
INSERT INTO attendance VALUES("76","2021-12-19","26","1");
INSERT INTO attendance VALUES("77","2021-12-19","27","0");
INSERT INTO attendance VALUES("78","2021-12-19","28","1");
INSERT INTO attendance VALUES("79","2021-12-19","29","0");
INSERT INTO attendance VALUES("80","2021-12-19","30","1");
INSERT INTO attendance VALUES("81","2021-12-19","31","0");
INSERT INTO attendance VALUES("82","2021-12-20","22","1");
INSERT INTO attendance VALUES("83","2021-12-20","23","1");
INSERT INTO attendance VALUES("84","2021-12-20","24","1");
INSERT INTO attendance VALUES("85","2021-12-20","25","1");
INSERT INTO attendance VALUES("86","2021-12-20","26","1");
INSERT INTO attendance VALUES("87","2021-12-20","27","0");
INSERT INTO attendance VALUES("88","2021-12-20","28","0");
INSERT INTO attendance VALUES("89","2021-12-20","29","1");
INSERT INTO attendance VALUES("90","2021-12-20","30","0");
INSERT INTO attendance VALUES("91","2021-12-20","31","1");
INSERT INTO attendance VALUES("92","2021-11-15","22","1");
INSERT INTO attendance VALUES("93","2021-11-15","23","1");
INSERT INTO attendance VALUES("94","2021-11-15","24","0");
INSERT INTO attendance VALUES("95","2021-11-15","25","0");
INSERT INTO attendance VALUES("96","2021-11-15","26","1");
INSERT INTO attendance VALUES("97","2021-11-15","27","1");
INSERT INTO attendance VALUES("98","2021-11-15","28","0");
INSERT INTO attendance VALUES("99","2021-11-15","29","1");
INSERT INTO attendance VALUES("100","2021-11-15","30","1");
INSERT INTO attendance VALUES("101","2021-11-15","31","1");
INSERT INTO attendance VALUES("102","2021-12-19","32","0");
INSERT INTO attendance VALUES("103","2021-12-19","33","0");
INSERT INTO attendance VALUES("104","2021-12-19","34","0");
INSERT INTO attendance VALUES("105","2021-12-19","35","1");
INSERT INTO attendance VALUES("106","2021-12-19","36","1");
INSERT INTO attendance VALUES("107","2021-12-19","37","1");
INSERT INTO attendance VALUES("108","2021-12-19","38","0");
INSERT INTO attendance VALUES("109","2021-12-19","39","0");
INSERT INTO attendance VALUES("110","2021-12-19","40","1");
INSERT INTO attendance VALUES("111","2021-12-19","41","1");
INSERT INTO attendance VALUES("112","2021-12-20","32","1");
INSERT INTO attendance VALUES("113","2021-12-20","33","1");
INSERT INTO attendance VALUES("114","2021-12-20","34","1");
INSERT INTO attendance VALUES("115","2021-12-20","35","0");
INSERT INTO attendance VALUES("116","2021-12-20","36","1");
INSERT INTO attendance VALUES("117","2021-12-20","37","1");
INSERT INTO attendance VALUES("118","2021-12-20","38","1");
INSERT INTO attendance VALUES("119","2021-12-20","39","1");
INSERT INTO attendance VALUES("120","2021-12-20","40","1");
INSERT INTO attendance VALUES("121","2021-12-20","41","0");
INSERT INTO attendance VALUES("122","2021-11-15","32","1");
INSERT INTO attendance VALUES("123","2021-11-15","33","1");
INSERT INTO attendance VALUES("124","2021-11-15","34","0");
INSERT INTO attendance VALUES("125","2021-11-15","35","0");
INSERT INTO attendance VALUES("126","2021-11-15","36","1");
INSERT INTO attendance VALUES("127","2021-11-15","37","1");
INSERT INTO attendance VALUES("128","2021-11-15","38","0");
INSERT INTO attendance VALUES("129","2021-11-15","39","0");
INSERT INTO attendance VALUES("130","2021-11-15","40","1");
INSERT INTO attendance VALUES("131","2021-11-15","41","1");
INSERT INTO attendance VALUES("132","2021-12-19","42","1");
INSERT INTO attendance VALUES("133","2021-12-19","43","0");
INSERT INTO attendance VALUES("134","2021-12-19","44","1");
INSERT INTO attendance VALUES("135","2021-12-19","45","1");
INSERT INTO attendance VALUES("136","2021-12-19","46","1");
INSERT INTO attendance VALUES("137","2021-12-19","47","0");
INSERT INTO attendance VALUES("138","2021-12-19","48","0");
INSERT INTO attendance VALUES("139","2021-12-19","49","0");
INSERT INTO attendance VALUES("140","2021-12-19","50","0");
INSERT INTO attendance VALUES("141","2021-12-19","51","0");
INSERT INTO attendance VALUES("142","2021-12-20","42","1");
INSERT INTO attendance VALUES("143","2021-12-20","43","1");
INSERT INTO attendance VALUES("144","2021-12-20","44","1");
INSERT INTO attendance VALUES("145","2021-12-20","45","1");
INSERT INTO attendance VALUES("146","2021-12-20","46","0");
INSERT INTO attendance VALUES("147","2021-12-20","47","0");
INSERT INTO attendance VALUES("148","2021-12-20","48","1");
INSERT INTO attendance VALUES("149","2021-12-20","49","0");
INSERT INTO attendance VALUES("150","2021-12-20","50","1");
INSERT INTO attendance VALUES("151","2021-12-20","51","1");
INSERT INTO attendance VALUES("152","2021-11-15","42","0");
INSERT INTO attendance VALUES("153","2021-11-15","43","0");
INSERT INTO attendance VALUES("154","2021-11-15","44","0");
INSERT INTO attendance VALUES("155","2021-11-15","45","1");
INSERT INTO attendance VALUES("156","2021-11-15","46","1");
INSERT INTO attendance VALUES("157","2021-11-15","47","1");
INSERT INTO attendance VALUES("158","2021-11-15","48","0");
INSERT INTO attendance VALUES("159","2021-11-15","49","1");
INSERT INTO attendance VALUES("160","2021-11-15","50","1");
INSERT INTO attendance VALUES("161","2021-11-15","51","1");
INSERT INTO attendance VALUES("162","2021-11-15","52","0");
INSERT INTO attendance VALUES("163","2021-11-15","53","1");
INSERT INTO attendance VALUES("164","2021-11-15","54","1");
INSERT INTO attendance VALUES("165","2021-11-15","55","1");
INSERT INTO attendance VALUES("166","2021-11-15","56","1");
INSERT INTO attendance VALUES("167","2021-11-15","57","1");
INSERT INTO attendance VALUES("168","2021-11-15","58","1");
INSERT INTO attendance VALUES("169","2021-11-15","59","1");
INSERT INTO attendance VALUES("170","2021-11-15","60","1");
INSERT INTO attendance VALUES("171","2021-11-15","61","1");
INSERT INTO attendance VALUES("172","2021-12-20","52","1");
INSERT INTO attendance VALUES("173","2021-12-20","53","1");
INSERT INTO attendance VALUES("174","2021-12-20","54","1");
INSERT INTO attendance VALUES("175","2021-12-20","55","1");
INSERT INTO attendance VALUES("176","2021-12-20","56","1");
INSERT INTO attendance VALUES("177","2021-12-20","57","1");
INSERT INTO attendance VALUES("178","2021-12-20","58","1");
INSERT INTO attendance VALUES("179","2021-12-20","59","1");
INSERT INTO attendance VALUES("180","2021-12-20","60","1");
INSERT INTO attendance VALUES("181","2021-12-20","61","1");
INSERT INTO attendance VALUES("182","2021-12-19","52","0");
INSERT INTO attendance VALUES("183","2021-12-19","53","0");
INSERT INTO attendance VALUES("184","2021-12-19","54","1");
INSERT INTO attendance VALUES("185","2021-12-19","55","1");
INSERT INTO attendance VALUES("186","2021-12-19","56","0");
INSERT INTO attendance VALUES("187","2021-12-19","57","0");
INSERT INTO attendance VALUES("188","2021-12-19","58","1");
INSERT INTO attendance VALUES("189","2021-12-19","59","1");
INSERT INTO attendance VALUES("190","2021-12-19","60","1");
INSERT INTO attendance VALUES("191","2021-12-19","61","1");



DROP TABLE backup;

CREATE TABLE `backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

INSERT INTO backup VALUES("1","Thu 27-May-2021 04-34","Thu 27-May","2021","04-34");
INSERT INTO backup VALUES("2","Fri 04-Jun-2021 07-30","Fri 04-Jun","2021","07-30");
INSERT INTO backup VALUES("17","Sun 09-Jan-2022 16-36","Sun 09-Jan","2022","16-36");
INSERT INTO backup VALUES("18","Sun 09-Jan-2022 17-36","Sun 09-Jan","2022","17-36");
INSERT INTO backup VALUES("19","Tue 18-Jan-2022 20-37","Tue 18-Jan","2022","20-37");
INSERT INTO backup VALUES("20","Wed 19-Jan-2022 22-41","Wed 19-Jan","2022","22-41");
INSERT INTO backup VALUES("21","Thu 20-Jan-2022 00-15","Thu 20-Jan","2022","00-15");
INSERT INTO backup VALUES("22","Thu 20-Jan-2022 00-51","Thu 20-Jan","2022","00-51");
INSERT INTO backup VALUES("23","Thu 20-Jan-2022 01-50","Thu 20-Jan","2022","01:50:44am");



DROP TABLE calendar;

CREATE TABLE `calendar` (
  `date` date NOT NULL,
  UNIQUE KEY `date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO calendar VALUES("2021-01-02");
INSERT INTO calendar VALUES("2021-01-03");
INSERT INTO calendar VALUES("2021-01-04");
INSERT INTO calendar VALUES("2021-01-08");
INSERT INTO calendar VALUES("2021-01-11");
INSERT INTO calendar VALUES("2021-01-16");
INSERT INTO calendar VALUES("2021-01-18");
INSERT INTO calendar VALUES("2021-01-22");
INSERT INTO calendar VALUES("2021-01-25");
INSERT INTO calendar VALUES("2021-01-26");
INSERT INTO calendar VALUES("2021-01-27");
INSERT INTO calendar VALUES("2021-01-31");
INSERT INTO calendar VALUES("2021-02-19");
INSERT INTO calendar VALUES("2021-02-20");
INSERT INTO calendar VALUES("2021-04-01");
INSERT INTO calendar VALUES("2021-04-02");
INSERT INTO calendar VALUES("2021-04-03");
INSERT INTO calendar VALUES("2021-04-05");
INSERT INTO calendar VALUES("2021-04-17");
INSERT INTO calendar VALUES("2021-04-18");
INSERT INTO calendar VALUES("2021-04-19");
INSERT INTO calendar VALUES("2021-04-30");
INSERT INTO calendar VALUES("2021-05-01");
INSERT INTO calendar VALUES("2021-05-03");
INSERT INTO calendar VALUES("2021-05-04");
INSERT INTO calendar VALUES("2021-05-05");
INSERT INTO calendar VALUES("2021-05-06");
INSERT INTO calendar VALUES("2021-05-07");
INSERT INTO calendar VALUES("2021-05-08");
INSERT INTO calendar VALUES("2021-05-09");
INSERT INTO calendar VALUES("2021-05-10");
INSERT INTO calendar VALUES("2021-05-11");
INSERT INTO calendar VALUES("2021-05-12");
INSERT INTO calendar VALUES("2021-05-13");
INSERT INTO calendar VALUES("2021-05-14");
INSERT INTO calendar VALUES("2021-05-15");
INSERT INTO calendar VALUES("2021-05-17");
INSERT INTO calendar VALUES("2021-05-25");
INSERT INTO calendar VALUES("2021-06-08");
INSERT INTO calendar VALUES("2021-06-09");
INSERT INTO calendar VALUES("2021-06-10");
INSERT INTO calendar VALUES("2021-09-01");
INSERT INTO calendar VALUES("2021-09-09");
INSERT INTO calendar VALUES("2021-09-16");
INSERT INTO calendar VALUES("2021-09-30");
INSERT INTO calendar VALUES("2021-11-01");
INSERT INTO calendar VALUES("2021-11-09");
INSERT INTO calendar VALUES("2021-11-10");
INSERT INTO calendar VALUES("2021-11-16");
INSERT INTO calendar VALUES("2021-12-01");
INSERT INTO calendar VALUES("2021-12-02");
INSERT INTO calendar VALUES("2022-01-03");
INSERT INTO calendar VALUES("2022-01-04");
INSERT INTO calendar VALUES("2022-01-05");
INSERT INTO calendar VALUES("2022-01-06");
INSERT INTO calendar VALUES("2022-01-07");
INSERT INTO calendar VALUES("2022-01-10");
INSERT INTO calendar VALUES("2022-01-11");
INSERT INTO calendar VALUES("2022-01-12");
INSERT INTO calendar VALUES("2022-01-13");
INSERT INTO calendar VALUES("2022-01-14");
INSERT INTO calendar VALUES("2022-01-17");
INSERT INTO calendar VALUES("2022-01-18");
INSERT INTO calendar VALUES("2022-01-19");
INSERT INTO calendar VALUES("2022-01-20");
INSERT INTO calendar VALUES("2022-01-21");
INSERT INTO calendar VALUES("2022-01-24");
INSERT INTO calendar VALUES("2022-01-25");
INSERT INTO calendar VALUES("2022-01-26");
INSERT INTO calendar VALUES("2022-01-27");
INSERT INTO calendar VALUES("2022-01-28");
INSERT INTO calendar VALUES("2022-01-31");



DROP TABLE calendar_events;

CREATE TABLE `calendar_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

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



DROP TABLE class;

CREATE TABLE `class` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `form` varchar(255) NOT NULL,
  `student_amount` int(255) NOT NULL DEFAULT 0,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO class VALUES("18","3A","Form 3","5","0");
INSERT INTO class VALUES("19","3B","Form 3","2","0");
INSERT INTO class VALUES("20","4A","Form 4","0","0");
INSERT INTO class VALUES("21","5A","Form 5","0","0");
INSERT INTO class VALUES("22","5B","Form 5","0","0");
INSERT INTO class VALUES("24","1 Baiduri","Form 1","12","4");
INSERT INTO class VALUES("25","1 Berlian","Form 1","9","0");
INSERT INTO class VALUES("26","2 Topaz","Form 2","10","0");
INSERT INTO class VALUES("27","2 Jed","Form 2","11","0");
INSERT INTO class VALUES("30","6A","Form 6","0","0");
INSERT INTO class VALUES("31","1 Nilam","Form 1","0","0");
INSERT INTO class VALUES("32","1 Ruby","Form 1","1","0");
INSERT INTO class VALUES("33","1 Zamrud","Form 1","0","0");
INSERT INTO class VALUES("34","1 Delima","Form 1","0","0");
INSERT INTO class VALUES("35","1 Mutiara","Form 1","0","0");
INSERT INTO class VALUES("36","3 Baiduri","Form 3","0","5");
INSERT INTO class VALUES("40","5 Baiduri","Form 5","0","6");



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



DROP TABLE parent;

CREATE TABLE `parent` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO parent VALUES("23","Walter White","Father","sq@gmail.com","+60123345689");
INSERT INTO parent VALUES("24","Camilo Madrigal","Mother","f00@gmail.com","+6012345679");
INSERT INTO parent VALUES("25","Alexandra Shipp","Mother","e@yahoo.com","+60123456789");
INSERT INTO parent VALUES("29","parentddd","Guardian","","+6044455566");
INSERT INTO parent VALUES("32","Matt Damon","Father","q@s.com","+60123457882");



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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;

INSERT INTO student VALUES("22","Donald Ducky","2021-12-01","Male","24","1","0","1");
INSERT INTO student VALUES("23","Goofy Goof","2021-12-01","Male","24","0","1","2");
INSERT INTO student VALUES("24","Balto Brave","2021-12-01","Male","24","0","0","1");
INSERT INTO student VALUES("25","Snow White","2021-12-01","Male","24","0","0","1");
INSERT INTO student VALUES("26","Alice Wonderful","2022-01-12","Female","24","0","0","1");
INSERT INTO student VALUES("27","Simba Green","2021-12-01","Male","24","1","0","1");
INSERT INTO student VALUES("28","Timon Pumba","2021-12-01","Male","24","0","0","1");
INSERT INTO student VALUES("29","Queen Elsa","2021-12-01","Male","24","0","0","1");
INSERT INTO student VALUES("30","Malik Shelly","2021-12-01","Male","24","0","0","1");
INSERT INTO student VALUES("31","Norman Lance","2021-12-01","Male","24","0","0","1");
INSERT INTO student VALUES("32","Johny Jackson","2021-12-01","Male","25","0","1","1");
INSERT INTO student VALUES("33","Mary Jane","2021-12-01","Male","25","0","0","1");
INSERT INTO student VALUES("34","Peter Parker","2021-12-01","Male","25","1","0","1");
INSERT INTO student VALUES("35","Thomas Shelby","2021-12-01","Male","25","0","0","1");
INSERT INTO student VALUES("36","Ezio Brito","2021-12-01","Male","25","0","0","1");
INSERT INTO student VALUES("37","Andrew Garfield","2022-01-02","Male","24","0","0","1");
INSERT INTO student VALUES("38","Zendaya","2021-12-01","Male","25","0","0","1");
INSERT INTO student VALUES("39","Tom Holland","2021-12-01","Male","25","0","0","1");
INSERT INTO student VALUES("40","Tobey Maguire","2021-12-01","Male","25","0","0","1");
INSERT INTO student VALUES("41","Jamie Foxx","2021-12-01","Male","25","0","0","1");
INSERT INTO student VALUES("42","Jon Snow","2021-12-01","Male","26","0","0","1");
INSERT INTO student VALUES("43","Sansa Stark","2021-12-01","Male","26","0","0","1");
INSERT INTO student VALUES("44","Arya Stark","2021-12-01","Male","26","0","0","1");
INSERT INTO student VALUES("45","Tyrion Lannister","2021-12-01","Male","26","0","0","1");
INSERT INTO student VALUES("46","Cersei Lannister","2021-12-01","Male","26","0","0","1");
INSERT INTO student VALUES("47","Jammie Lannister","2021-12-01","Male","26","0","0","1");
INSERT INTO student VALUES("48","Bran Stark","2021-12-01","Male","26","0","0","1");
INSERT INTO student VALUES("49","Theon Greyjoy","2021-12-01","Male","26","0","0","1");
INSERT INTO student VALUES("50","Petyr Baelish","2021-12-01","Male","26","0","0","1");
INSERT INTO student VALUES("51","Davos Seaworth","2021-12-01","Male","26","0","0","1");
INSERT INTO student VALUES("52","Scarlett Johansson","2021-12-01","Male","27","0","0","1");
INSERT INTO student VALUES("53","Robert Downey Jr.","2021-12-01","Male","27","0","0","1");
INSERT INTO student VALUES("54","Benedict Cumberbatch","2021-12-01","Male","27","0","0","1");
INSERT INTO student VALUES("55","Elizabeth Olsen","2021-12-01","Male","27","0","0","1");
INSERT INTO student VALUES("56","Chris Pratt","2021-12-01","Male","27","0","0","1");
INSERT INTO student VALUES("57","Mark Ruffalo","2021-12-01","Male","27","0","0","1");
INSERT INTO student VALUES("58","Chris Evans","2021-12-01","Male","27","0","0","1");
INSERT INTO student VALUES("59","Josh Brolin","2021-12-01","Male","27","0","0","1");
INSERT INTO student VALUES("60","Chadwick Boseman","2021-12-01","Male","27","0","0","1");
INSERT INTO student VALUES("61","Sebastian Stan
","2021-12-01","Male","27","0","0","1");
INSERT INTO student VALUES("62","Jaden Smith","2022-01-12","Male","18","0","0","17");
INSERT INTO student VALUES("63","Isaac Oscar","2022-01-04","Male","18","0","0","18");
INSERT INTO student VALUES("64","Zac Efron","2022-01-23","Male","18","0","0","19");
INSERT INTO student VALUES("65","Archie Yates","2000-01-05","Male","18","0","0","20");
INSERT INTO student VALUES("66","Patrick Wilson","2022-01-10","Male","18","0","0","21");
INSERT INTO student VALUES("68","Jessie Pinkman","2022-01-04","Male","27","0","0","23");
INSERT INTO student VALUES("69","Stephanie Beatrix","2022-01-05","Female","19","0","0","24");
INSERT INTO student VALUES("70","Jessica Darrow","2022-01-11","Female","19","0","0","25");
INSERT INTO student VALUES("74","ddd","2022-01-31","Female","32","0","0","29");
INSERT INTO student VALUES("77","Jodie Comer","2022-02-02","Female","24","0","0","32");



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
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4;

INSERT INTO warning VALUES("104","Total Days","22");
INSERT INTO warning VALUES("105","Cons. Days","32");
INSERT INTO warning VALUES("106","Total Days","27");



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
INSERT INTO warning_exception VALUES("27","76","2022-01-30","2022-02-03","Desc","");



