

CREATE TABLE `audit_trail` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO audit_trail VALUES
("2018-02-09 16:53:39","admin","Updated Employee Record:yie->Pasig City"),
("2018-02-09 16:55:54","admin","Updated Employee Record:Abra --> blank"),
("2018-02-14 13:47:30","admin","Updated Position Record:Sample position --> Sample positions"),
("2018-02-16 13:18:48","admin","Updated Position Record:Sample positions --> Sample position"),
("2018-02-16 20:25:09","admin","Added Billing Record"),
("2018-02-16 20:25:51","admin","Added Billing Record"),
("2018-02-16 20:27:36","admin","Added Billing Record"),
("2018-02-16 20:27:54","admin","Added Billing Record"),
("2018-02-16 20:28:16","admin","Added Payment Record"),
("2018-02-16 20:28:16","admin","Updated Billing Record:500.00 --> blank"),
("2018-02-16 20:28:26","admin","Added Payment Record"),
("2018-02-16 20:28:26","admin","Updated Billing Record:1000.00 --> blank"),
("2018-02-20 16:34:48","admin","Restored Materials Record"),
("2018-02-20 16:35:26","admin","Added Billing Record"),
("2018-02-20 16:35:43","admin","Added Payment Record"),
("2018-02-20 16:35:43","admin","Updated Billing Record:1200.00 --> blank"),
("2018-02-22 15:38:01","admin","Deleted Materials Record"),
("2018-02-22 15:38:20","admin","Restored Materials Record"),
("2018-02-22 15:43:35","admin","Deleted Employee Record"),
("2018-02-22 16:13:26","admin","Restored Employee Record"),
("2018-02-22 16:13:37","admin","Restored Employee Record"),
("2018-02-22 16:14:09","admin","Restored Employee Record"),
("2018-02-22 16:14:15","admin","Restored Employee Record"),
("2018-02-22 16:14:37","admin","Restored Employee Record"),
("2018-02-22 16:14:37","admin","Restored Employee Record"),
("2018-02-22 16:14:37","admin","Restored Employee Record"),
("2018-02-22 16:14:37","admin","Deleted Employee Record"),
("2018-02-22 16:14:37","admin","Restored Employee Record"),
("2018-02-22 16:14:37","admin","Deleted Employee Record"),
("2018-02-22 16:14:37","admin","Deleted Employee Record"),
("2018-02-22 16:14:37","admin","Deleted Employee Record"),
("2018-02-22 16:14:37","admin","Restored Employee Record"),
("2018-02-22 16:14:37","admin","Deleted Employee Record"),
("2018-02-22 16:14:37","admin","Deleted Employee Record"),
("2018-02-22 16:14:37","admin","Deleted Employee Record"),
("2018-02-22 16:14:37","admin","Deleted Employee Record"),
("2018-02-22 16:14:37","admin","Deleted Employee Record"),
("2018-02-22 16:18:54","admin","Restored Employee Record"),
("2018-02-22 16:19:14","admin","Restored Employee Record"),
("2018-02-22 16:19:14","admin","Restored Employee Record"),
("2018-02-22 16:19:14","admin","Restored Employee Record"),
("2018-02-22 16:19:14","admin","Deleted Employee Record"),
("2018-02-22 16:19:14","admin","Restored Employee Record"),
("2018-02-22 16:19:14","admin","Deleted Employee Record"),
("2018-02-22 16:19:14","admin","Deleted Employee Record"),
("2018-02-22 16:19:14","admin","Deleted Employee Record"),
("2018-02-22 16:19:14","admin","Restored Employee Record"),
("2018-02-22 16:19:14","admin","Deleted Employee Record"),
("2018-02-22 16:19:14","admin","Deleted Employee Record"),
("2018-02-22 16:19:14","admin","Deleted Employee Record"),
("2018-02-22 16:19:14","admin","Deleted Employee Record"),
("2018-02-22 16:19:14","admin","Deleted Employee Record"),
("2018-02-22 16:31:25","admin","Restored Employee Record"),
("2018-02-22 16:32:44","admin","Restored Employee Record"),
("2018-02-22 16:41:03","admin","Updated Employee Record:blank --> admin"),
("2018-02-22 16:41:13","admin","Restored Employee Record"),
("2018-02-22 16:41:32","admin","Updated Employee Record:blank --> admin"),
("2018-02-22 16:43:31","admin","Restored Employee Record"),
("2018-02-22 16:43:55","admin","Restored Employee Record"),
("2018-02-22 16:44:08","admin","Restored Employee Record"),
("2018-02-22 16:44:37","admin","Added Employee Record"),
("2018-02-22 16:45:53","admin","Added Employee Record"),
("2018-02-22 16:46:06","admin","Updated Employee Record:test --> admin"),
("2018-02-22 16:59:05","admin","Restored Employee Record"),
("2018-02-22 17:05:27","admin","Deleted Employee Record"),
("2018-02-22 19:24:23","admin","Updated Employee Record:Test --> Tests"),
("2018-02-22 19:28:14","admin","Updated Employee Record:blank -->  samp"),
("2018-02-22 19:30:26","admin","Restored Employee Record"),
("2018-02-22 19:30:44","admin","Restored Employee Record"),
("2018-02-22 19:32:30","admin","Restored Employee Record"),
("2018-02-22 19:50:41","admin","Restored Employee Record"),
("2018-02-22 19:57:13","admin","Restored Employee Record"),
("2018-02-22 19:57:21","admin","Restored Employee Record"),
("2018-02-22 19:58:16","admin","Restored Employee Record"),
("2018-02-22 20:01:38","admin","Restored Employee Record"),
("2018-02-22 20:02:44","admin","Restored Employee Record"),
("2018-02-23 08:20:05","admin","Updated Employee Record:Saus --> Sauses"),
("2018-02-23 08:21:14","admin","Restored Employee Record"),
("2018-02-23 08:57:13","admin","Added Employee Record"),
("2018-02-23 08:57:53","admin","Restored Employee Record"),
("2018-02-23 08:57:53","admin","Restored Employee Record"),
("2018-02-23 08:57:53","admin","Restored Employee Record"),
("2018-02-23 08:57:53","admin","Restored Employee Record"),
("2018-02-23 08:57:53","admin","Restored Employee Record"),
("2018-02-23 08:57:54","admin","Restored Employee Record"),
("2018-02-23 08:57:54","admin","Restored Employee Record"),
("2018-02-23 08:57:54","admin","Restored Employee Record"),
("2018-02-23 08:57:54","admin","Restored Employee Record"),
("2018-02-23 08:57:54","admin","Restored Employee Record"),
("2018-02-23 09:00:33","admin","Restored Employee Record"),
("2018-02-23 09:00:33","admin","Restored Employee Record"),
("2018-02-23 09:00:33","admin","Restored Employee Record"),
("2018-02-23 09:00:33","admin","Restored Employee Record"),
("2018-02-23 09:00:33","admin","Restored Employee Record"),
("2018-02-23 09:00:33","admin","Restored Employee Record"),
("2018-02-23 09:00:33","admin","Restored Employee Record"),
("2018-02-23 09:00:34","admin","Restored Employee Record"),
("2018-02-23 09:00:34","admin","Restored Employee Record"),
("2018-02-23 09:00:50","admin","Restored Employee Record"),
("2018-02-23 09:00:51","admin","Restored Employee Record");
INSERT INTO audit_trail VALUES
("2018-02-23 09:00:51","admin","Restored Employee Record"),
("2018-02-23 09:00:51","admin","Restored Employee Record"),
("2018-02-23 09:00:51","admin","Restored Employee Record"),
("2018-02-23 09:00:51","admin","Restored Employee Record"),
("2018-02-23 09:00:51","admin","Restored Employee Record"),
("2018-02-23 09:00:51","admin","Restored Employee Record"),
("2018-02-23 09:01:04","admin","Restored Employee Record"),
("2018-02-23 09:01:04","admin","Restored Employee Record"),
("2018-02-23 09:01:04","admin","Restored Employee Record"),
("2018-02-23 09:01:04","admin","Restored Employee Record"),
("2018-02-23 09:01:04","admin","Restored Employee Record"),
("2018-02-23 09:01:04","admin","Restored Employee Record"),
("2018-02-23 09:01:04","admin","Restored Employee Record"),
("2018-02-23 09:01:30","admin","Restored Employee Record"),
("2018-02-23 09:01:49","admin","Restored Employee Record"),
("2018-02-23 09:02:12","admin","Updated Employee Record:asdsad --> asdsad@yahoo.com"),
("2018-02-23 09:02:28","admin","Restored Employee Record"),
("2018-02-23 09:05:47","admin","Restored Employee Record"),
("2018-02-23 09:05:53","admin","Restored Employee Record"),
("2018-02-23 09:06:10","admin","Restored Employee Record"),
("2018-02-23 09:06:17","admin","Restored Employee Record"),
("2018-02-23 09:06:38","admin","Restored Employee Record"),
("2018-02-23 09:07:11","admin","Restored Employee Record"),
("2018-02-23 09:07:52","admin","Restored Employee Record"),
("2018-02-23 09:08:05","admin","Restored Employee Record"),
("2018-02-23 09:08:17","admin","Deleted Employee Record"),
("2018-02-23 09:08:26","admin","Deleted Employee Record"),
("2018-02-23 09:09:48","admin","Updated Employee Record:Iris --> 89 Iris Street, Brgy. Addition"),
("2018-02-23 09:10:13","admin","Restored Employee Record"),
("2018-02-23 09:10:22","admin","Restored Employee Record"),
("2018-02-23 09:10:33","admin","Restored Employee Record"),
("2018-02-23 09:10:42","admin","Restored Employee Record"),
("2018-02-23 09:10:50","admin","Restored Employee Record"),
("2018-02-23 09:10:59","admin","Restored Employee Record"),
("2018-02-23 09:11:13","admin","Restored Employee Record"),
("2018-02-23 09:11:18","admin","Restored Employee Record"),
("2018-02-23 09:11:45","admin","Restored Employee Record"),
("2018-02-23 09:11:52","admin","Restored Employee Record"),
("2018-02-23 09:11:58","admin","Restored Employee Record"),
("2018-02-23 09:12:06","admin","Restored Employee Record"),
("2018-02-23 09:12:17","admin","Restored Employee Record"),
("2018-02-23 09:12:30","admin","Restored Employee Record"),
("2018-02-23 09:12:42","admin","Restored Employee Record"),
("2018-02-23 09:13:05","admin","Restored Employee Record"),
("2018-02-23 09:13:13","admin","Restored Employee Record"),
("2018-02-23 09:13:24","admin","Restored Employee Record"),
("2018-02-23 09:13:37","admin","Restored Employee Record"),
("2018-02-23 09:14:11","admin","Restored Employee Record"),
("2018-02-23 09:14:23","admin","Restored Employee Record"),
("2018-02-23 09:22:11","admin","Added Category Record"),
("2018-02-23 09:22:36","admin","Added Subcategory Record"),
("2018-02-23 09:22:47","admin","Updated Subcategory Record:subcategory finale --> subcategory testing"),
("2018-02-23 09:23:39","admin","Added Unit Measurement Record"),
("2018-02-23 09:24:12","admin","Added Materials Record"),
("2018-02-23 09:25:02","admin","Added Employee Record"),
("2018-02-23 09:25:36","admin","Added Supplier Record"),
("2018-02-23 09:25:53","admin","Added Position Record"),
("2018-02-23 09:30:06","admin","Restored Materials Record"),
("2018-02-23 09:31:00","admin","Restored Materials Record");




CREATE TABLE `billing` (
  `billing_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(50) NOT NULL,
  `project` varchar(123) NOT NULL,
  `totalcost` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `topay` decimal(10,2) NOT NULL,
  `datee` varchar(50) NOT NULL,
  `enddate` date NOT NULL,
  `prepared` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`billing_no`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;


INSERT INTO billing VALUES
("3","Escobinas, Carmina","Road Widening","2620.00","2320.00","0.00","2017-02-01","0000-00-00","Beltran, Eunice S.","hidden"),
("4","Escobinas, Carmina","Road Widening","2320.00","1320.00","13220.00","2017-02-01","2017-02-01","Beltran, Eunice S.","hidden"),
("5","Escobinas, Carmina","Persan","1500.00","1000.00","0.00","2017-02-01","0000-00-00","Beltran, Eunice S.","hidden"),
("6","Escobinas, Carmina","Condominium","1040.00","540.00","0.00","2017-02-01","2017-02-23","Beltran, Eunice S.","Active"),
("7","Escobinas, Carmina","","0.00","0.00","0.00","2017-11-23","0000-00-00","",""),
("8","Escobinas, Carmina","","0.00","0.00","0.00","2017-11-23","0000-00-00","",""),
("9","Escobinas, Carmina","Condominium","150.00","150.00","150.00","2017-11-23","0000-00-00","Beltran, Eunice S.","Active"),
("10","Doe, John .","final project","2100.00","0.00","0.00","2018-02-09","2018-07-18","Beltran, Eunice  S","Active"),
("11","Escobinas, Carmina","Persan","1000.00","0.00","0.00","2018-02-09","2018-02-28","Beltran, Eunice S.","Active"),
("12","Escobinas, Carmina","Persan","1000.00","1000.00","1000.00","2018-02-16","0000-00-00","Beltran, Eunice S.","Active"),
("13","Escobinas, Carmina","Persan","1000.00","1000.00","1000.00","2018-02-16","0000-00-00","Beltran, Eunice S.","Active"),
("14","Escobinas, Carmina","Persan","1000.00","1000.00","1000.00","2018-02-16","0000-00-00","Beltran, Eunice S.","Active"),
("15","Escobinas, Carmina","Persan","1000.00","500.00","0.00","2018-02-16","2018-02-24","Beltran, Eunice S.","Active"),
("16","Doe, John .","construction","1200.00","0.00","0.00","2018-02-20","2018-02-21","Beltran, Eunice  S","Active");




CREATE TABLE `category` (
  `category_no` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`category_no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


INSERT INTO category VALUES
("1","metals","active"),
("2","woods","Active"),
("3","electrical","Active"),
("4","finale","Active");




CREATE TABLE `customer` (
  `customer_no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL,
  `cust_type` varchar(50) DEFAULT NULL,
  `comp_name` varchar(100) DEFAULT NULL,
  `phone_num` varchar(12) NOT NULL,
  `fax` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO customer VALUES
("1","john","admin","Individual","","","","johndoe@yahoo.com","John","","Doe","09123786658","Ricoa","Valenzuela","inactive"),
("2","finale","admin","Individual","","","","finale@yahoo.com","finale","finale","finale","123","finale","finale","inactive"),
("3","123","123","Individual","","","","13@yahoo.com","132","13","132","132","13","123","inactive");




CREATE TABLE `defect` (
  `def_no` int(111) NOT NULL,
  `pullout_no` int(111) NOT NULL,
  `req_no` int(111) NOT NULL,
  `code` varchar(1111) NOT NULL,
  `customer` varchar(111) NOT NULL,
  `project` varchar(111) NOT NULL,
  `material_no` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `delivery` (
  `delivery_no` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(50) DEFAULT NULL,
  `date` varchar(123) DEFAULT NULL,
  `verified_by` varchar(50) DEFAULT NULL,
  `status` varchar(123) NOT NULL,
  PRIMARY KEY (`delivery_no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


INSERT INTO delivery VALUES
("1","Persan","2017-02-01","Beltran, Eunice S.","active"),
("2","Persan","2017-02-01","Beltran, Eunice S.","active"),
("3","Persan","2017-11-24","Beltran, Eunice S.","active"),
("4","Persan","2017-11-24","Beltran, Eunice S.","active"),
("5","Persan","2017-11-24","Beltran, Eunice S.","active"),
("6","Persan","2017-11-24","Beltran, Eunice S.","active"),
("7","final supplier","02-23-2018","Beltran, Eunice  S","active");




CREATE TABLE `delivery_cart` (
  `delivery_no` int(11) DEFAULT NULL,
  `po_no` int(123) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `material_no` int(11) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `scategory_name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `package` varchar(100) DEFAULT NULL,
  `unit_measurement` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `abbre` varchar(50) NOT NULL,
  `status` varchar(123) NOT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO delivery_cart VALUES
("1","1","b321a284f16dcfb7f148a006aea26d2e","Persan","5","mets","metals","nail","heyya","silver","box","100","5","m","active"),
("2","2","2d6a0b05c47c1a3e27d0a2f647443ae7","Persan","5","mets","metals","nail","heyya","silver","box","100","5","m","active"),
("2","2","5c8662c6ea9e520a239c37960a207b7b","Persan","7","","metals","poles","long","","box","100","5","m","active"),
("2","2","fdbc06badfa5bd6ce7c4266c1031fe9a","Persan","6","","electrical","wires","aluminum","","box","100","5","m","active"),
("2","2","9ab3eeeca2c9a1ac4ee6064e87db644b","Persan","8","","woods","ply wood","","","box","50","5","m","active"),
("4","1","5ed5414ecfc96975d84485ce5499bd46","Persan","5","mets","metals","nail","heyya","silver","box","100","1","m","active"),
("4","4","e22a83e4562b8503a4505c60a4ac22e2","Persan","6","","electrical","wires","aluminum","","box","100","4","m","active"),
("4","4","b138babf37434cc9d56daf2350c1c0ef","Persan","7","","metals","poles","long","","box","100","4","m","active"),
("4","4","0d1bd46b3bf92dd6a7e5c82cd3af618e","Persan","8","","woods","ply wood","","","box","50","3","m","active"),
("4","4","4871dc73552bc48fb3b1e7e411769566","Persan","5","mets","metals","nail","heyya","silver","box","100","8","m","active"),
("4","2","04f85531132aca644472d5e234044acd","Persan","6","","electrical","wires","aluminum","","box","100","5","m","active"),
("4","2","c070f79afc24633b07fae6c47a2e8f7b","Persan","7","","metals","poles","long","","box","100","5","m","active"),
("4","2","54d2373127f4a4eb3eda41c0cffc1c9c","Persan","8","","woods","ply wood","","","box","50","5","m","active"),
("4","2","3531472ae8d217b0985024741ac1bcac","Persan","5","mets","metals","nail","heyya","silver","box","100","5","m","active"),
("4","1","87cae00af54d2e4190500b756df5aaa4","Persan","5","mets","metals","nail","heyya","silver","box","100","1","m","active"),
("7","5","d855a9b5786c2ae5624d5c39eb8eaa66","final supplier","9","finale","finale","subcategory testing","finale","finale","finale","123","17","finale","active");




CREATE TABLE `employee` (
  `image` text,
  `emp_no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`emp_no`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;


INSERT INTO employee VALUES
("download.jpeg","1","admin","admin","Eunice ","Sauses","Beltran","Admin","09561574211","belts@yahoo.com","25 N. Domingo","San Juan","active"),
("profile2.jpg","2","carlito","admin","Carl","","Kalabaw","Foreman","09489338914","edni@gmail.com","Sta. Ana","Manila","active"),
("download.jpeg","3","erika","admin","Erika"," faker","Marquez","Foreman","09093354326","Erikaperez@gmail.com","Iligan ","Pampanga","Active"),
("image/external-hard-drive.jpg","4","john","admin","Maria Louis","F","Equikor","Quantity Surveyor","09235637824","mariannebunyi@gmail.com","D. Macapagal","Manila","inactive"),
("download.jpeg","5","user1","admin","Ashley","","Gray","Secretary","09167872845","ashleygray@gmail.com","89 Iris Street, Brgy. Addition","Mandaluyong","Active"),
("camera.jpg","6","fake","admin","Fake"," ","Faker","Stockman","09237658902","kleopatra@yahoo.com","Kalentong","Mandaluyong","Active"),
("image/external-hard-drive.jpg","7","celeena","admin","steph"," ","curry","Stockman","09127589903","shitty@yahoo.com","Kalentong","Mandaluyong","inactive"),
("up-cartoon-pixar-movie-hd-wallpaper-by-891952386-iltwmt.jpg","8","klay","admin","Klay"," ","Thompson","Accountant","09186352227","sasuke@gmail.com","Theodore","Pasig City","Active"),
("external-hard-drive.jpg","9","admin1","admins","Jenrielle"," samp","Gaon","Admin","09124676689","adminme@gmail.com","Maybunga","Pasig City","Active"),
("external-hard-drive.jpg","10","naruto","admin","Naruto"," E","Uzumaki","Quantity Surveyor","09364693975","narutoship@gmail.com","san miguel","pasig city","inactive"),
("image/external-hard-drive.jpg","11","test","admin","test","caban","o\'neal","Foreman","12345678901","antonio_santos@17yahoo.com","1 gold","Pasig City","inactive"),
("mbuntu-11.jpg","12","asd","admin","Asdasd","Dasdasd","Asdasd","Admin","12312","asdsad@yahoo.com","asdas","dasd","inactive"),
("image/external-hard-drive.jpg","13","admin","","Ssss","Lssss","L","Admin","123","l@yahoo.com","123","123","inactive"),
("image/external-hard-drive.jpg","14","jaja","","Benedict","","Pabatao","Admin","09567330463","jajapabatao@yahoo.com","23 San Isidro","Pasig City","inactive"),
("camera.jpg","15","test","admin","Test","Tests","Test","Foreman","123","test@yahoo.com","test","test","Active"),
("camera.jpg","16","test","test","test","test","test","Foreman","123","test@yahoo.com","test","test","inactive"),
("mbuntu-11.jpg","17","emp","emp","emp","emp","emp","Stockman","123","emp@yahoo.com","emp","emp","Active"),
("mbuntu-11.jpg","18","finale","admin","finale","finale","finale","Secretary","123","finale@yahoo.com","finale","finale","Active");




CREATE TABLE `inventory_form` (
  `Item_no` varchar(100) DEFAULT NULL,
  `Date_if` date DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Unit` varchar(100) DEFAULT NULL,
  `Unit_Cost` int(11) DEFAULT NULL,
  `Grand_Total` int(11) DEFAULT NULL,
  `Company_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `material_requisition` (
  `Requisition_slip_no` varchar(100) DEFAULT NULL,
  `Project` varchar(100) DEFAULT NULL,
  `Date_MR` varchar(100) DEFAULT NULL,
  `Item_no` varchar(100) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Unit` varchar(100) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `UNIT_COST` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Total_Amount` int(11) DEFAULT NULL,
  `Released_by` varchar(100) DEFAULT NULL,
  `Checked_by` varchar(100) DEFAULT NULL,
  `Accepted_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `materialreq` (
  `req_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(123) NOT NULL,
  `project` varchar(123) NOT NULL,
  `date` varchar(123) NOT NULL,
  `requested_by` varchar(123) NOT NULL,
  `status` varchar(123) NOT NULL,
  PRIMARY KEY (`req_no`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


INSERT INTO materialreq VALUES
("1","Escobinas, Carmina S.","Persan","01/02/2017","Beltran, Eunice S.","active"),
("2","Escobinas, Carmina S.","Condominium","01/02/2017","Beltran, Eunice S.","active"),
("3","Escobinas, Carmina S.","Condominium","07/02/2017","Beltran, Eunice S.","active"),
("4","Doe, John .","final project","09/02/2018","Beltran, Eunice  S","active"),
("5","Doe, John .","construction","20/02/2018","Beltran, Eunice  S","active"),
("6","132, 132 1.","finale proyekto","23/02/2018","Beltran, Eunice  S","active");




CREATE TABLE `materialreq_cart` (
  `req_no` int(11) DEFAULT NULL,
  `code` varchar(123) NOT NULL,
  `customer` varchar(123) NOT NULL,
  `project` varchar(50) DEFAULT NULL,
  `material_no` int(11) DEFAULT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `scategory_name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `unit_measurement` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `abbre` varchar(50) NOT NULL,
  `status` varchar(123) NOT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO materialreq_cart VALUES
("4","0a84ee0953b62452bcb90119bca34c94","Doe, John .","final project","7","","metals","poles","long","","box","100","0","m","active"),
("6","11c61d87412c7ad3c1f0cdf2c4fda990","132, 132 1.","finale proyekto","9","finale","finale","subcategory testing","finale","finale","finale","123","0","finale","active"),
("3","2d46f7bd000ba733dcd071f9245a05f8","Escobinas, Carmina","Condominium","6","","electrical","wires","aluminum","","","100","1","m","active"),
("4","35e8e2c284c86c05d348d7c2f4e8d579","Doe, John .","final project","8","","woods","ply wood","","","box","50","0","m","active"),
("4","36db2df8531600073f3c4f39dc412d8f","Doe, John .","final project","6","","electrical","wires","aluminum","","box","100","0","m","active"),
("2","55e783de4345fd9ae5f370b83cef5b47","Escobinas, Carmina","Condominium","8","","woods","ply wood","","","","50","0","m","active"),
("1","9312f61cd346132f1f3d8852739952cd","Escobinas, Carmina","Persan","5","mets","metals","nail","heyya","silver","box","100","1","m","active"),
("2","a97ae82b5602aba3ba053fffcb6936a7","Escobinas, Carmina","Condominium","5","mets","metals","nail","heyya","silver","","100","0","m","active"),
("2","c66f0edddecf766ec22a696558561a4c","Escobinas, Carmina","Condominium","7","","metals","poles","long","","","100","0","m","active"),
("5","d1808bc1c7ee936bc9d80ecdae20c7f0","Doe, John .","construction","6","","electrical","wires","aluminum","","","100","0","m","active"),
("4","f5fb3a4d2516bad00dc5bba7000602bf","Doe, John .","final project","5","mets","metals","nail","heyya","silver","box","100","0","m","active");




CREATE TABLE `materials` (
  `material_no` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `scategory_name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `unit_measurement` varchar(50) DEFAULT NULL,
  `abbre` varchar(50) DEFAULT NULL,
  `quantity` int(12) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`material_no`),
  UNIQUE KEY `product_code` (`code`),
  UNIQUE KEY `product_code_2` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


INSERT INTO materials VALUES
("5","mtrl1","metals","nail","heyya","mets","silver","box","100","m","15","100.00","active"),
("6","mtrl6","electrical","wires","aluminum","","","","100","m","0","150.00","Active"),
("7","mtrl7","metals","poles","long","","","","100","m","7","20.00","Active"),
("8","mtrl8","woods","ply wood","","","","","50","m","6","150.00","active"),
("9","mtrl9","finale","subcategory testing","finale","finale","finale","finale","123","finale","12","123.00","Active");




CREATE TABLE `payment` (
  `payment_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(50) NOT NULL,
  `project` varchar(123) NOT NULL,
  `topay` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `chequeno` int(20) NOT NULL,
  `chequedate` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`payment_no`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


INSERT INTO payment VALUES
("1","Escobinas, Carmina","","300.00","300.00","","0","0000-00-00","Cash","hidden"),
("2","Escobinas, Carmina","","1000.00","1000.00","","0","0000-00-00","Cash","Active"),
("3","Escobinas, Carmina","","500.00","500.00","","0","0000-00-00","Cash","Active"),
("4","Escobinas, Carmina","","500.00","500.00","","0","0000-00-00","Cash","Active"),
("5","","","150.00","111.00","","0","0000-00-00","","hidden"),
("6","Doe, John .","","2100.00","2100.00","","0","0000-00-00","Cash","Active"),
("7","Escobinas, Carmina","","500.00","500.00","","0","0000-00-00","Cash","Active"),
("8","Escobinas, Carmina","","1000.00","1000.00","","0","0000-00-00","Cheque","Active"),
("9","Doe, John .","","1200.00","1200.00","","0","0000-00-00","Cash","Active");




CREATE TABLE `position` (
  `position_no` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`position_no`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;


INSERT INTO position VALUES
("1","Admin","Active"),
("2","Foreman","Active"),
("9","Quantity Surveyor","Active"),
("10","Secretary","Active"),
("11","Stockman","Active"),
("12","Accountant","Active"),
("13","user","Active"),
("14","Foremans","active"),
("15","Sample position","Active"),
("16","Finale","Active");




CREATE TABLE `pull_out_form` (
  `Pull_out_form_no` varchar(100) DEFAULT NULL,
  `Project` varchar(100) DEFAULT NULL,
  `Date_pullout` date DEFAULT NULL,
  `Item_no` varchar(100) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Unit` varchar(100) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Released_by` varchar(100) DEFAULT NULL,
  `Checked_by` varchar(100) DEFAULT NULL,
  `Accepted_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `pullout` (
  `pullout_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(123) NOT NULL,
  `project` varchar(123) NOT NULL,
  `date` varchar(123) DEFAULT NULL,
  `accepted_by` varchar(123) NOT NULL,
  `status` varchar(123) NOT NULL,
  PRIMARY KEY (`pullout_no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


INSERT INTO pullout VALUES
("1","Escobinas, Carmina","persan","2017-02-01","Beltran, Eunice S","active"),
("2","Escobinas, Carmina","Condominium","2017-02-01","Beltran, Eunice S","active"),
("3","Escobinas, Carmina","Condominium","2017-02-07","Beltran, Eunice S","active"),
("4","Escobinas, Carmina","Condominium","2017-02-10","Beltran, Eunice S","active"),
("5","Doe, John .","final project","2018-02-09","Beltran, Eunice  S","active"),
("6","Doe, John .","construction","2018-02-20","Beltran, Eunice  S","active"),
("7","132, 132 1.","finale proyekto","2018-02-23","Beltran, Eunice  S","active");




CREATE TABLE `pullout_cart` (
  `pullout_no` int(11) DEFAULT NULL,
  `req_no` int(123) NOT NULL,
  `code` varchar(123) NOT NULL,
  `customer` varchar(123) NOT NULL,
  `project` varchar(123) NOT NULL,
  `material_no` int(11) DEFAULT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `scategory_name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `unit_measurement` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `abbre` varchar(50) NOT NULL,
  `status` varchar(123) NOT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO pullout_cart VALUES
("5","4","03f45224144150fabe51ffded1e9cc94","Doe, John .","final project","7","","metals","poles","long","","box","100","5","m","active"),
("1","1","0638fc039c98a2d90e3414cabbe171b3","Doe, John .","Persan","5","mets","metals","nail","heyya","silver","box","100","4","m","active"),
("5","4","095c68f47258fce505a1e5c35a3b19e7","Doe, John .","final project","8","","woods","ply wood","","","box","50","5","m","active"),
("5","4","1de32c3b04c2dcd3b9e457e8bc37dfad","Doe, John .","final project","5","mets","metals","nail","heyya","silver","box","100","5","m","active"),
("2","2","351e52cf533540975d33c1762aae6694","Doe, John .","Condominium","7","","metals","poles","long","","","100","2","m","active"),
("2","2","48f4e333ec7bcbdd4a0abf45af429437","Doe, John .","Condominium","8","","woods","ply wood","","","","50","2","m","active"),
("4","3","749f88508fa2044990a629edbeb64796","Doe, John .","Condominium","6","","electrical","wires","aluminum","","","100","1","m","active"),
("6","5","80db1ec7eeef6c4c5c7e7ca79eb9a794","Doe, John .","construction","6","","electrical","wires","aluminum","","","100","5","m","active"),
("7","6","bf4daf7cf397a9ef6e7981382e7219a4","132, 132 1.","finale proyekto","9","finale","finale","subcategory testing","finale","finale","finale","123","5","finale","active"),
("3","3","c135eed170fda1a6e6f273f9ce508122","Doe, John .","Condominium","6","","electrical","wires","aluminum","","","100","3","m","active"),
("2","2","c7a425f5b1257a058200d77d4a587b1a","Doe, John .","Condominium","5","mets","metals","nail","heyya","silver","","100","2","m","active"),
("5","4","f101349d19e28d8dfb518d91e1acff89","Doe, John .","final project","6","","electrical","wires","aluminum","","box","100","5","m","active");




CREATE TABLE `purchase_cart` (
  `po_no` int(11) DEFAULT NULL,
  `code` varchar(123) NOT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `material_no` int(11) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `scategory_name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `package` varchar(100) DEFAULT NULL,
  `unit_measurement` varchar(100) DEFAULT NULL,
  `abbre` varchar(123) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(123) NOT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO purchase_cart VALUES
("2","09a2d1e1aec9aee0352a13e3eda84895","1","8","","woods","ply wood","","","box","50","m","0","active"),
("4","1084296a50a665719dbdcc982b5c2a9b","1","7","","metals","poles","long","","box","100","m","0","active"),
("2","4af97ceed7071d0bae0f3e6dc6e5bd11","1","5","mets","metals","nail","heyya","silver","box","100","m","0","active"),
("2","69f66b85404bed4680be69b8e8b57700","1","6","","electrical","wires","aluminum","","box","100","m","0","active"),
("4","81f3232159c4930c74cf89bf79fd1b58","1","6","","electrical","wires","aluminum","","box","100","m","0","active"),
("1","8b11c545a802b4c508c2943ff7c8849b","1","5","mets","metals","nail","heyya","silver","box","100","m","3","active"),
("5","bae41e3e5d70bfa7cca77eab4a1fe80c","4","9","finale","finale","subcategory testing","finale","finale","finale","123","finale","0","active"),
("4","e3286f6d2058a02d67b373e5077761ca","1","8","","woods","ply wood","","","box","50","m","0","active"),
("2","ece9f3d3e39d7b0d37d176198307543c","1","7","","metals","poles","long","","box","100","m","0","active"),
("4","fe029477f7b244cbc16bdd0fe7b35b1d","1","5","mets","metals","nail","heyya","silver","box","100","m","0","active");




CREATE TABLE `purchase_order` (
  `po_no` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(50) DEFAULT NULL,
  `date` varchar(123) DEFAULT NULL,
  `ordered_by` varchar(50) DEFAULT NULL,
  `status` varchar(123) NOT NULL,
  PRIMARY KEY (`po_no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO purchase_order VALUES
("1","Persan","01/02/2017","Beltran, Eunice S.","active"),
("2","Persan","01/02/2017","Beltran, Eunice S.","active"),
("4","Persan","24/11/2017","Beltran, Eunice S.","active"),
("5","final supplier","02-23-2018","Beltran, Eunice  S","active");




CREATE TABLE `quotation` (
  `quote_no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `project` varchar(100) DEFAULT NULL,
  `date` varchar(123) DEFAULT NULL,
  `due_date` varchar(123) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sales_person` varchar(100) DEFAULT NULL,
  `prepared_by` varchar(100) DEFAULT NULL,
  `status` varchar(123) NOT NULL,
  `total_amount` double(100,2) DEFAULT NULL,
  `balance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`quote_no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO quotation VALUES
("1","john","admin","Escobinas, Carmina","Persan","2017-02-01","2018-02-28","Ricoa","","johndoe@yahoo.com","","Beltran, Eunice S.","active","1500.00","0.00"),
("2","john","admin","Escobinas, Carmina","Condominium","2017-02-01","2017-11-30","Ricoa","","johndoe@yahoo.com","","Beltran, Eunice S.","active","150.00","150.00"),
("3","john","admin","Doe, John .","final project","2018-02-09","2018-07-25","Ricoa","","johndoe@yahoo.com","","Beltran, Eunice  S","active","2100.00","0.00"),
("4","john","admin","Doe, John .","construction","2018-02-20","2018-07-07","Ricoa","","johndoe@yahoo.com","","Beltran, Eunice  S","active","1200.00","0.00"),
("5","123","123","132, 132 1.","finale proyekto","2018-02-23","2018-02-23","13","","13@yahoo.com","","Beltran, Eunice  S","active","615.00","615.00");




CREATE TABLE `quotation_cart` (
  `quote_no` int(11) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `project` varchar(50) DEFAULT NULL,
  `material_no` int(11) NOT NULL,
  `code` varchar(123) NOT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `scategory_name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `unit_measurement` varchar(50) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `quantity_remaining` int(123) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `abbre` varchar(11) NOT NULL,
  `status` varchar(123) NOT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO quotation_cart VALUES
("4","Doe, John .","final project","8","070d94720e2eb553186018050d5759b5","","woods","ply wood","","","box","50","5","0","150","m","active"),
("2","Persan","Condominium","7","07bd9ad622ebfc020cdc8c83fd9c048f","","metals","poles","long","","","100","2","3","20","m","active"),
("2","Persan","Condominium","5","1a0f7df48b464edffa43d2e12788a7f1","mets","metals","nail","heyya","silver","","100","4","1","100","m","active"),
("4","Doe, John .","construction","6","6bcebdde33ad61c5f4c33fd57716eb28","","electrical","wires","aluminum","","","100","8","3","150","m","active"),
("5","132, 132 1.","finale proyekto","9","792945a53155bd9e160b9bb1c8f1d9b6","finale","finale","subcategory testing","finale","finale","finale","123","5","0","123","finale","active"),
("3","Persan","Condominium","6","8b82d85f60e1ce5ba2984e4fca9acfd0","","electrical","wires","aluminum","","","100","1","0","150","m","active"),
("4","Doe, John .","final project","7","8b91347fe9b4e24f34d4153b72ef8646","","metals","poles","long","","box","100","5","0","20","m","active"),
("4","Doe, John .","final project","5","d2f77aae4e211be1012d6a6fe0b2062d","mets","metals","nail","heyya","silver","box","100","5","0","100","m","active"),
("4","Doe, John .","final project","6","f13ddb7e72b549ed8dfd36084598a46f","","electrical","wires","aluminum","","box","100","5","0","150","m","active");




CREATE TABLE `sample` (
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` varchar(123) NOT NULL,
  `account_status` varchar(11) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;


INSERT INTO sample VALUES
("1","admin","admin","admin","active","active"),
("2","cnieva","admin","admin","inactive","active"),
("3","user1","admin","Foreman","inactive","active"),
("4","user2","admin","Quantity Surveyor","inactive","inactive"),
("5","user3","admin","Secretary","inactive","Active"),
("6","user4","admin","Stockman","inactive","inactive"),
("8","user5","admin","Accountant","inactive","inactive"),
("9","john","admin","customer","inactive","active"),
("10","admin1","admin","Admin","inactive","Active"),
("11","nina","nina","Quantity Surveyor","inactive","inactive"),
("12","cj","cj","Foreman","inactive","inactive"),
("13","asd","asd","Admin","inactive","Active"),
("15","jaja","admin","Admin","inactive","Active"),
("16","test","test","Foreman","inactive","inactive"),
("17","emp","emp","Stockman","inactive","Active"),
("18","finale","admin","Secretary","inactive","Active"),
("20","123","123","customer","inactive","active");




CREATE TABLE `subcategory` (
  `scategory_no` int(100) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `scategory_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`scategory_no`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


INSERT INTO subcategory VALUES
("1","metals","trusses","Active"),
("2","woods","ply wood","Active"),
("3","metals","nail","Active"),
("4","metals","poles","active"),
("5","electrical","wires","active"),
("6","finale","subcategory testing","Active");




CREATE TABLE `supplier` (
  `supplier_no` int(11) NOT NULL AUTO_INCREMENT,
  `supp_name` varchar(25) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `middlename` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`supplier_no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


INSERT INTO supplier VALUES
("1","Maralabs","123456789","6546846546","supplier1@yahoo.com","Edwin","","Marquez","09236873123","Maginhawa","Negros","active"),
("2","Persan","7245961","1234567891","persaninc@yahoo.com","Kobe","","Bryant","09353791848","23 Ortega St.","San juan","Active"),
("3","8Layer","45698745","","geekineers@8layertech.com","Meric","","Mara","9512364","East Drive","Pasig City","Active"),
("4","final supplier","123","123","finale@yahoo.com","finale","finale","finaleq","123","finale","finale","Active");




CREATE TABLE `unitmeasurement` (
  `unit_no` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `unit_measurment` varchar(50) DEFAULT NULL,
  `Abbreviation` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`unit_no`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


INSERT INTO unitmeasurement VALUES
("1","","","kilogram","kg","Active"),
("2","","","gram","g","Active"),
("3","","","milligram","mg","active"),
("4","","","inch","in","Active"),
("5","","","centimeter","cm","Active"),
("6","","","meter","m","Active"),
("7","","","liters","L","active"),
("8","","","finale","finale","Active");


