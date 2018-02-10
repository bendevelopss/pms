-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2018 at 10:04 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`date`, `user`, `action`) VALUES
('2018-02-09 08:53:39', 'admin', 'Updated Employee Record:yie->Pasig City'),
('2018-02-09 08:55:54', 'admin', 'Updated Employee Record:Abra --> blank');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billing_no` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `project` varchar(123) NOT NULL,
  `totalcost` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `topay` decimal(10,2) NOT NULL,
  `datee` varchar(50) NOT NULL,
  `enddate` date NOT NULL,
  `prepared` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billing_no`, `customer`, `project`, `totalcost`, `balance`, `topay`, `datee`, `enddate`, `prepared`, `status`) VALUES
(3, 'Escobinas, Carmina', 'Road Widening', '2620.00', '2320.00', '0.00', '2017-02-01', '0000-00-00', 'Beltran, Eunice S.', 'hidden'),
(4, 'Escobinas, Carmina', 'Road Widening', '2320.00', '1320.00', '13220.00', '2017-02-01', '2017-02-01', 'Beltran, Eunice S.', 'hidden'),
(5, 'Escobinas, Carmina', 'Persan', '1500.00', '1000.00', '0.00', '2017-02-01', '0000-00-00', 'Beltran, Eunice S.', 'hidden'),
(6, 'Escobinas, Carmina', 'Condominium', '1040.00', '540.00', '0.00', '2017-02-01', '2017-02-23', 'Beltran, Eunice S.', 'Active'),
(7, 'Escobinas, Carmina', '', '0.00', '0.00', '0.00', '2017-11-23', '0000-00-00', '', ''),
(8, 'Escobinas, Carmina', '', '0.00', '0.00', '0.00', '2017-11-23', '0000-00-00', '', ''),
(9, 'Escobinas, Carmina', 'Condominium', '150.00', '150.00', '150.00', '2017-11-23', '0000-00-00', 'Beltran, Eunice S.', 'Active'),
(10, 'Doe, John .', 'final project', '2100.00', '0.00', '0.00', '2018-02-09', '2018-07-18', 'Beltran, Eunice  S', 'Active'),
(11, 'Escobinas, Carmina', 'Persan', '1000.00', '1000.00', '1000.00', '2018-02-09', '2018-02-28', 'Beltran, Eunice S.', 'Active');

--
-- Triggers `billing`
--
DELIMITER $$
CREATE TRIGGER `bill_add` AFTER INSERT ON `billing` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Billing Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bill_update` AFTER UPDATE ON `billing` FOR EACH ROW begin
declare a varchar(2000);
if(new.status <> old.status)
then set a='Deleted Billing Record';
end if;

if(new.billing_no<>old.billing_no)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.billing_no,''), 'blank'),' --> ',
                  coalesce(nullif(new.billing_no,''), 'blank'),'');
                  end if;
                  
                  if(new.customer<>old.customer)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.customer,''), 'blank'),' --> ',
                  coalesce(nullif(new.customer,''), 'blank'),'');
                  end if;
                  
                   if(new.project<>old.project)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.project,''), 'blank'),' --> ',
                  coalesce(nullif(new.project,''), 'blank'),'');
                  end if;
                  
                   if(new.totalcost<>old.totalcost)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.totalcost,''), 'blank'),' --> ',
                  coalesce(nullif(new.totalcost,''), 'blank'),'');
                  end if;
                  
                   if(new.balance<>old.balance)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.balance,''), 'blank'),' --> ',
                  coalesce(nullif(new.balance,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.topay<>old.topay)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.topay,''), 'blank'),' --> ',
                  coalesce(nullif(new.topay,''), 'blank'),'');
                  end if;
                  
                   if(new.datee<>old.datee)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.datee,''), 'blank'),' --> ',
                  coalesce(nullif(new.datee,''), 'blank'),'');
                  end if;
                  
                  
                  if(new.enddate<>old.enddate)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.enddate,''), 'blank'),' --> ',
                  coalesce(nullif(new.enddate,''), 'blank'),'');
                  end if;
                  
                   if(new.prepared<>old.prepared)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.prepared,''), 'blank'),' --> ',
                  coalesce(nullif(new.prepared,''), 'blank'),'');
                  end if;
                  
                  
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_no` int(11) NOT NULL,
  `category_name` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_no`, `category_name`, `status`) VALUES
(1, 'metals', 'active'),
(2, 'woods', 'Active'),
(3, 'electrical', 'Active');

--
-- Triggers `category`
--
DELIMITER $$
CREATE TRIGGER `category_add` AFTER INSERT ON `category` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Category Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `category_deleted_updated` AFTER UPDATE ON `category` FOR EACH ROW begin
declare a varchar(2000);
if(new.status='active' <> old.status='inactive')
then set a='Deleted Category Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Category Record';
end if;



if(new.category_no<>old.category_no)
then set a=concat('Updated Category Record:',
                  coalesce(nullif(old.category_no,''), 'blank'),' --> ',
                  coalesce(nullif(new.category_no,''), 'blank'),'');
                  end if;
                  
                  if(new.category_name<>old.category_name)
then set a=concat('Updated Category Record:',
                  coalesce(nullif(old.category_name,''), 'blank'),' --> ',
                  coalesce(nullif(new.category_name,''), 'blank'),'');
                  end if;
                  
                  
                  
                  
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_no` int(11) NOT NULL,
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
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_no`, `username`, `password`, `cust_type`, `comp_name`, `phone_num`, `fax`, `email`, `firstname`, `middlename`, `lastname`, `contact`, `street`, `city`, `status`) VALUES
(1, 'john', 'admin', 'Individual', NULL, '', NULL, 'johndoe@yahoo.com', 'John', '', 'Doe', '09123786658', 'Ricoa', 'Valenzuela', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `defect`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_no` int(11) NOT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `date` varchar(123) DEFAULT NULL,
  `verified_by` varchar(50) DEFAULT NULL,
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_no`, `supplier`, `date`, `verified_by`, `status`) VALUES
(1, 'Persan', '2017-02-01', 'Beltran, Eunice S.', 'active'),
(2, 'Persan', '2017-02-01', 'Beltran, Eunice S.', 'active'),
(3, 'Persan', '2017-11-24', 'Beltran, Eunice S.', 'active'),
(4, 'Persan', '2017-11-24', 'Beltran, Eunice S.', 'active'),
(5, 'Persan', '2017-11-24', 'Beltran, Eunice S.', 'active'),
(6, 'Persan', '2017-11-24', 'Beltran, Eunice S.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_cart`
--

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
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_cart`
--

INSERT INTO `delivery_cart` (`delivery_no`, `po_no`, `code`, `supplier`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `abbre`, `status`) VALUES
(1, 1, 'b321a284f16dcfb7f148a006aea26d2e', 'Persan', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 5, 'm', 'active'),
(2, 2, '2d6a0b05c47c1a3e27d0a2f647443ae7', 'Persan', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 5, 'm', 'active'),
(2, 2, '5c8662c6ea9e520a239c37960a207b7b', 'Persan', 7, '', 'metals', 'poles', 'long', '', 'box', '100', 5, 'm', 'active'),
(2, 2, 'fdbc06badfa5bd6ce7c4266c1031fe9a', 'Persan', 6, '', 'electrical', 'wires', 'aluminum', '', 'box', '100', 5, 'm', 'active'),
(2, 2, '9ab3eeeca2c9a1ac4ee6064e87db644b', 'Persan', 8, '', 'woods', 'ply wood', '', '', 'box', '50', 5, 'm', 'active'),
(4, 1, '5ed5414ecfc96975d84485ce5499bd46', 'Persan', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 1, 'm', 'active'),
(4, 4, 'e22a83e4562b8503a4505c60a4ac22e2', 'Persan', 6, '', 'electrical', 'wires', 'aluminum', '', 'box', '100', 4, 'm', 'active'),
(4, 4, 'b138babf37434cc9d56daf2350c1c0ef', 'Persan', 7, '', 'metals', 'poles', 'long', '', 'box', '100', 4, 'm', 'active'),
(4, 4, '0d1bd46b3bf92dd6a7e5c82cd3af618e', 'Persan', 8, '', 'woods', 'ply wood', '', '', 'box', '50', 3, 'm', 'active'),
(4, 4, '4871dc73552bc48fb3b1e7e411769566', 'Persan', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 8, 'm', 'active'),
(4, 2, '04f85531132aca644472d5e234044acd', 'Persan', 6, '', 'electrical', 'wires', 'aluminum', '', 'box', '100', 5, 'm', 'active'),
(4, 2, 'c070f79afc24633b07fae6c47a2e8f7b', 'Persan', 7, '', 'metals', 'poles', 'long', '', 'box', '100', 5, 'm', 'active'),
(4, 2, '54d2373127f4a4eb3eda41c0cffc1c9c', 'Persan', 8, '', 'woods', 'ply wood', '', '', 'box', '50', 5, 'm', 'active'),
(4, 2, '3531472ae8d217b0985024741ac1bcac', 'Persan', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 5, 'm', 'active'),
(4, 1, '87cae00af54d2e4190500b756df5aaa4', 'Persan', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 1, 'm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_no` int(11) NOT NULL,
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
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_no`, `username`, `password`, `firstname`, `middlename`, `lastname`, `position`, `contact`, `email`, `street`, `city`, `status`) VALUES
(1, 'admin', 'admin', 'Eunice ', 'Saus', 'Beltran', 'Admin', '09561574211', 'belts@yahoo.com', '25 N. Domingo', 'San Juan', 'active'),
(2, 'carlito', 'admin', 'Carl', '', 'Kalabaw', 'Foreman', '09489338914', 'edni@gmail.com', 'Sta. Ana', 'Manila', 'active'),
(3, 'erika', '', 'Erika', ' faker', 'Marquez', 'Foreman', '09093354326', 'Erikaperez@gmail.com', 'Iligan ', 'Pampanga', 'Active'),
(4, 'john', 'admin', 'Maria Louis', 'F', 'Equikor', 'Quantity Surveyor', '09235637824', 'mariannebunyi@gmail.com', 'D. Macapagal', 'Manila', 'inactive'),
(5, 'user1', '', 'samp', 'samp', 'samp', 'Secretary', '09167872845', 'faker@gmail.com', 'Iris', 'Mandaluyong', 'Active'),
(6, 'fake', 'admin', 'fake', ' ', 'faker', 'Stockman', '09237658902', 'kleopatra@yahoo.com', 'Kalentong', 'Mandaluyong', 'inactive'),
(7, 'celeena', 'admin', 'steph', ' ', 'curry', 'Stockman', '09127589903', 'shitty@yahoo.com', 'Kalentong', 'Mandaluyong', 'inactive'),
(8, 'klay', 'admin', 'Klay', ' ', 'Thompson', 'Accountant', '09186352227', 'sasuke@gmail.com', 'Theodore', 'Pasig City', 'inactive'),
(9, 'admin1', 'admin', 'Jenrielle', ' ', 'Gaon', 'Admin', '09124676689', 'adminme@gmail.com', 'Maybunga', 'Pasig City', 'Active'),
(10, 'naruto', 'admin', 'naruto', ' E', 'Uzumaki', 'Quantity Surveyor', '09364693975', 'narutoship@gmail.com', 'san miguel', 'pasig city', 'inactive'),
(11, 'test', 'admin', 'test', 'caban', 'o\'neal', 'Foreman', '12345678901', 'antonio_santos@17yahoo.com', '1 gold', 'Pasig City', 'inactive'),
(12, 'asd', 'asd', 'asdasd', 'dasdasd', 'asdasd', 'Admin', '12312', 'asdsad', 'asdas', 'dasd', 'inactive'),
(13, 'admin', '', 'Ssss', 'Lssss', 'L', 'Admin', '123', 'l@yahoo.com', '123', '123', 'inactive'),
(14, 'jaja', '', 'Benedict', '', 'Pabatao', 'Admin', '09567330463', 'jajapabatao@yahoo.com', '23 San Isidro', 'Pasig City', 'Active');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `employee_added` AFTER INSERT ON `employee` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Employee Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `employee_update` AFTER UPDATE ON `employee` FOR EACH ROW begin
declare a varchar(2000);

if(new.status='active' <> old.status='inactive')
then set a='Deleted Employee Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Employee Record';
end if;


if(new.emp_no<>old.emp_no)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.emp_no,''), 'blank'),' --> ',
                  coalesce(nullif(new.emp_no,''), 'blank'),'');
                  end if;
                  
                  if(new.username<>old.username)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.username,''), 'blank'),' --> ',
                  coalesce(nullif(new.username,''), 'blank'),'');
                  end if;
                  
                   if(new.password<>old.password)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.password,''), 'blank'),' --> ',
                  coalesce(nullif(new.password,''), 'blank'),'');
                  end if;
                  
                  
                  
                 
                  
                  
                  if(new.email<>old.email)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.email,''), 'blank'),' --> ',
                  coalesce(nullif(new.email,''), 'blank'),'');
                  end if;
                  
                   if(new.firstname<>old.firstname)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.firstname,''), 'blank'),' --> ',
                  coalesce(nullif(new.firstname,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.middlename<>old.middlename)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.middlename,''), 'blank'),' --> ',
                  coalesce(nullif(new.middlename,''), 'blank'),'');
                  end if;
                  
                   if(new.lastname<>old.lastname)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.lastname,''), 'blank'),' --> ',
                  coalesce(nullif(new.lastname,''), 'blank'),'');
                  end if;
                  
                   if(new.contact<>old.contact)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.contact,''), 'blank'),' --> ',
                  coalesce(nullif(new.contact,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.street<>old.street)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.street,''), 'blank'),' --> ',
                  coalesce(nullif(new.street,''), 'blank'),'');
                  end if;
            
            
             if(new.city<>old.city)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.city,''), 'blank'),' --> ',
                  coalesce(nullif(new.city,''), 'blank'),'');
                  end if;
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_form`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `materialreq`
--

CREATE TABLE `materialreq` (
  `req_no` int(11) NOT NULL,
  `customer` varchar(123) NOT NULL,
  `project` varchar(123) NOT NULL,
  `date` varchar(123) NOT NULL,
  `requested_by` varchar(123) NOT NULL,
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materialreq`
--

INSERT INTO `materialreq` (`req_no`, `customer`, `project`, `date`, `requested_by`, `status`) VALUES
(1, 'Escobinas, Carmina S.', 'Persan', '01/02/2017', 'Beltran, Eunice S.', 'active'),
(2, 'Escobinas, Carmina S.', 'Condominium', '01/02/2017', 'Beltran, Eunice S.', 'active'),
(3, 'Escobinas, Carmina S.', 'Condominium', '07/02/2017', 'Beltran, Eunice S.', 'active'),
(4, 'Doe, John .', 'final project', '09/02/2018', 'Beltran, Eunice  S', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `materialreq_cart`
--

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
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materialreq_cart`
--

INSERT INTO `materialreq_cart` (`req_no`, `code`, `customer`, `project`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `abbre`, `status`) VALUES
(4, '0a84ee0953b62452bcb90119bca34c94', 'Doe, John .', 'final project', 7, '', 'metals', 'poles', 'long', '', 'box', '100', 0, 'm', 'active'),
(3, '2d46f7bd000ba733dcd071f9245a05f8', 'Escobinas, Carmina', 'Condominium', 6, '', 'electrical', 'wires', 'aluminum', '', '', '100', 1, 'm', 'active'),
(4, '35e8e2c284c86c05d348d7c2f4e8d579', 'Doe, John .', 'final project', 8, '', 'woods', 'ply wood', '', '', 'box', '50', 0, 'm', 'active'),
(4, '36db2df8531600073f3c4f39dc412d8f', 'Doe, John .', 'final project', 6, '', 'electrical', 'wires', 'aluminum', '', 'box', '100', 0, 'm', 'active'),
(2, '55e783de4345fd9ae5f370b83cef5b47', 'Escobinas, Carmina', 'Condominium', 8, '', 'woods', 'ply wood', '', '', '', '50', 0, 'm', 'active'),
(1, '9312f61cd346132f1f3d8852739952cd', 'Escobinas, Carmina', 'Persan', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 1, 'm', 'active'),
(2, 'a97ae82b5602aba3ba053fffcb6936a7', 'Escobinas, Carmina', 'Condominium', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', '', '100', 0, 'm', 'active'),
(2, 'c66f0edddecf766ec22a696558561a4c', 'Escobinas, Carmina', 'Condominium', 7, '', 'metals', 'poles', 'long', '', '', '100', 0, 'm', 'active'),
(4, 'f5fb3a4d2516bad00dc5bba7000602bf', 'Doe, John .', 'final project', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 0, 'm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_no` int(11) NOT NULL,
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
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_no`, `code`, `category`, `scategory_name`, `description`, `brand_name`, `color`, `package`, `unit_measurement`, `abbre`, `quantity`, `price`, `status`) VALUES
(5, 'mtrl1', 'metals', 'nail', 'heyya', 'mets', 'silver', 'box', '100', 'm', 15, '100.00', 'Active'),
(6, 'mtrl6', 'electrical', 'wires', 'aluminum', '', '', '', '100', 'm', 5, '150.00', 'Active'),
(7, 'mtrl7', 'metals', 'poles', 'long', '', '', '', '100', 'm', 7, '20.00', 'Active'),
(8, 'mtrl8', 'woods', 'ply wood', '', '', '', '', '50', 'm', 6, '150.00', 'active');

--
-- Triggers `materials`
--
DELIMITER $$
CREATE TRIGGER `materials_added` AFTER INSERT ON `materials` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Materials Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `materials_update` AFTER UPDATE ON `materials` FOR EACH ROW begin
declare a varchar(2000);


if(new.status='active' <> old.status='inactive')
then set a='Deleted Materials Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Materials Record';
end if;


if(new.material_no<>old.material_no)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.material_no,''), 'blank'),' --> ',
                  coalesce(nullif(new.material_no,''), 'blank'),'');
                  end if;
                  
                  if(new.category<>old.category)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.category,''), 'blank'),' --> ',
                  coalesce(nullif(new.category,''), 'blank'),'');
                  end if;
                  
                   if(new.scategory_name<>old.scategory_name)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.scategory_name,''), 'blank'),' --> ',
                  coalesce(nullif(new.scategory_name,''), 'blank'),'');
                  end if;
                  
                   if(new.description<>old.description)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.description,''), 'blank'),' --> ',
                  coalesce(nullif(new.description,''), 'blank'),'');
                  end if;
                  
                   if(new.brand_name<>old.brand_name)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.brand_name,''), 'blank'),' --> ',
                  coalesce(nullif(new.brand_name,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.color<>old.color)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.color,''), 'blank'),' --> ',
                  coalesce(nullif(new.color,''), 'blank'),'');
                  end if;
                  
                
                  
                  if(new.package<>old.package)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.package,''), 'blank'),' --> ',
                  coalesce(nullif(new.package,''), 'blank'),'');
                  end if;
                  
                   if(new.unit_measurement<>old.unit_measurement)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.unit_measurement,''), 'blank'),' --> ',
                  coalesce(nullif(new.unit_measurement,''), 'blank'),'');
                  end if;
                  

 if(new.abbre<>old.abbre)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.abbre,''), 'blank'),' --> ',
                  coalesce(nullif(new.abbre,''), 'blank'),'');
                  end if;
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `material_requisition`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_no` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `project` varchar(123) NOT NULL,
  `topay` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `chequeno` int(20) NOT NULL,
  `chequedate` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_no`, `customer`, `project`, `topay`, `amount`, `bankname`, `chequeno`, `chequedate`, `type`, `status`) VALUES
(1, 'Escobinas, Carmina', '', '300.00', '300.00', '', 0, '0000-00-00', 'Cash', 'hidden'),
(2, 'Escobinas, Carmina', '', '1000.00', '1000.00', '', 0, '0000-00-00', 'Cash', 'Active'),
(3, 'Escobinas, Carmina', '', '500.00', '500.00', '', 0, '0000-00-00', 'Cash', 'Active'),
(4, 'Escobinas, Carmina', '', '500.00', '500.00', '', 0, '0000-00-00', 'Cash', 'Active'),
(5, '', '', '150.00', '111.00', '', 0, '0000-00-00', '', 'hidden'),
(6, 'Doe, John .', '', '2100.00', '2100.00', '', 0, '0000-00-00', 'Cash', 'Active');

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `payment_add` AFTER INSERT ON `payment` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Payment Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `payment_update` AFTER UPDATE ON `payment` FOR EACH ROW begin
declare a varchar(2000);
if(new.status <> old.status)
then set a='Deleted Payment Record';
end if;

if(new.payment_no<>old.payment_no)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.payment_no,''), 'blank'),' --> ',
                  coalesce(nullif(new.payment_no,''), 'blank'),'');
                  end if;
                  
                  if(new.customer<>old.customer)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.customer,''), 'blank'),' --> ',
                  coalesce(nullif(new.customer,''), 'blank'),'');
                  end if;
                  
                   if(new.amount<>old.amount)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.amount,''), 'blank'),' --> ',
                  coalesce(nullif(new.amount,''), 'blank'),'');
                  end if;
                  
                   if(new.bankname<>old.bankname)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.bankname,''), 'blank'),' --> ',
                  coalesce(nullif(new.bankname,''), 'blank'),'');
                  end if;
                  
                   if(new.chequeno<>old.chequeno)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.chequeno,''), 'blank'),' --> ',
                  coalesce(nullif(new.chequeno,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.topay<>old.topay)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.topay,''), 'blank'),' --> ',
                  coalesce(nullif(new.topay,''), 'blank'),'');
                  end if;
                  
                   if(new.chequedate<>old.chequedate)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.chequedate,''), 'blank'),' --> ',
                  coalesce(nullif(new.chequedate,''), 'blank'),'');
                  end if;
                  
                  
                  if(new.type<>old.type)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.type,''), 'blank'),' --> ',
                  coalesce(nullif(new.type,''), 'blank'),'');
                  end if;
                  
                  
                  
                  
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_no` int(11) NOT NULL,
  `position_name` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_no`, `position_name`, `status`) VALUES
(1, 'Admin', 'Active'),
(2, 'Foreman', 'Active'),
(9, 'Quantity Surveyor', 'Active'),
(10, 'Secretary', 'Active'),
(11, 'Stockman', 'Active'),
(12, 'Accountant', 'Active'),
(13, 'user', 'Active'),
(14, 'Foremans', 'active'),
(15, 'Sample position', 'Active');

--
-- Triggers `position`
--
DELIMITER $$
CREATE TRIGGER `position_added` AFTER INSERT ON `position` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Position Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `position_update` AFTER UPDATE ON `position` FOR EACH ROW begin
declare a varchar(2000);

if(new.status='active' <> old.status='inactive')
then set a='Deleted Position Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Position Record';
end if;




if(new.position_no<>old.position_no)
then set a=concat('Updated Position Record:',
                  coalesce(nullif(old.position_no,''), 'blank'),' --> ',
                  coalesce(nullif(new.position_no,''), 'blank'),'');
                  end if;
                  
                  if(new.position_name<>old.position_name)
then set a=concat('Updated Position Record:',
                  coalesce(nullif(old.position_name,''), 'blank'),' --> ',
                  coalesce(nullif(new.position_name,''), 'blank'),'');
                  end if;
                  
                  
                  
               
                  
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pullout`
--

CREATE TABLE `pullout` (
  `pullout_no` int(11) NOT NULL,
  `customer` varchar(123) NOT NULL,
  `project` varchar(123) NOT NULL,
  `date` varchar(123) DEFAULT NULL,
  `accepted_by` varchar(123) NOT NULL,
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pullout`
--

INSERT INTO `pullout` (`pullout_no`, `customer`, `project`, `date`, `accepted_by`, `status`) VALUES
(1, 'Escobinas, Carmina', 'persan', '2017-02-01', 'Beltran, Eunice S', 'active'),
(2, 'Escobinas, Carmina', 'Condominium', '2017-02-01', 'Beltran, Eunice S', 'active'),
(3, 'Escobinas, Carmina', 'Condominium', '2017-02-07', 'Beltran, Eunice S', 'active'),
(4, 'Escobinas, Carmina', 'Condominium', '2017-02-10', 'Beltran, Eunice S', 'active'),
(5, 'Doe, John .', 'final project', '2018-02-09', 'Beltran, Eunice  S', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pullout_cart`
--

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
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pullout_cart`
--

INSERT INTO `pullout_cart` (`pullout_no`, `req_no`, `code`, `customer`, `project`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `abbre`, `status`) VALUES
(5, 4, '03f45224144150fabe51ffded1e9cc94', 'Doe, John .', 'final project', 7, '', 'metals', 'poles', 'long', '', 'box', '100', 5, 'm', 'active'),
(1, 1, '0638fc039c98a2d90e3414cabbe171b3', 'Doe, John .', 'Persan', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 4, 'm', 'active'),
(5, 4, '095c68f47258fce505a1e5c35a3b19e7', 'Doe, John .', 'final project', 8, '', 'woods', 'ply wood', '', '', 'box', '50', 5, 'm', 'active'),
(5, 4, '1de32c3b04c2dcd3b9e457e8bc37dfad', 'Doe, John .', 'final project', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 5, 'm', 'active'),
(2, 2, '351e52cf533540975d33c1762aae6694', 'Doe, John .', 'Condominium', 7, '', 'metals', 'poles', 'long', '', '', '100', 2, 'm', 'active'),
(2, 2, '48f4e333ec7bcbdd4a0abf45af429437', 'Doe, John .', 'Condominium', 8, '', 'woods', 'ply wood', '', '', '', '50', 2, 'm', 'active'),
(4, 3, '749f88508fa2044990a629edbeb64796', 'Doe, John .', 'Condominium', 6, '', 'electrical', 'wires', 'aluminum', '', '', '100', 1, 'm', 'active'),
(3, 3, 'c135eed170fda1a6e6f273f9ce508122', 'Doe, John .', 'Condominium', 6, '', 'electrical', 'wires', 'aluminum', '', '', '100', 3, 'm', 'active'),
(2, 2, 'c7a425f5b1257a058200d77d4a587b1a', 'Doe, John .', 'Condominium', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', '', '100', 2, 'm', 'active'),
(5, 4, 'f101349d19e28d8dfb518d91e1acff89', 'Doe, John .', 'final project', 6, '', 'electrical', 'wires', 'aluminum', '', 'box', '100', 5, 'm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pull_out_form`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `purchase_cart`
--

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
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_cart`
--

INSERT INTO `purchase_cart` (`po_no`, `code`, `supplier`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `abbre`, `quantity`, `status`) VALUES
(2, '09a2d1e1aec9aee0352a13e3eda84895', '1', 8, '', 'woods', 'ply wood', '', '', 'box', '50', 'm', 0, 'active'),
(4, '1084296a50a665719dbdcc982b5c2a9b', '1', 7, '', 'metals', 'poles', 'long', '', 'box', '100', 'm', 0, 'active'),
(2, '4af97ceed7071d0bae0f3e6dc6e5bd11', '1', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 'm', 0, 'active'),
(2, '69f66b85404bed4680be69b8e8b57700', '1', 6, '', 'electrical', 'wires', 'aluminum', '', 'box', '100', 'm', 0, 'active'),
(4, '81f3232159c4930c74cf89bf79fd1b58', '1', 6, '', 'electrical', 'wires', 'aluminum', '', 'box', '100', 'm', 0, 'active'),
(1, '8b11c545a802b4c508c2943ff7c8849b', '1', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 'm', 3, 'active'),
(4, 'e3286f6d2058a02d67b373e5077761ca', '1', 8, '', 'woods', 'ply wood', '', '', 'box', '50', 'm', 0, 'active'),
(2, 'ece9f3d3e39d7b0d37d176198307543c', '1', 7, '', 'metals', 'poles', 'long', '', 'box', '100', 'm', 0, 'active'),
(4, 'fe029477f7b244cbc16bdd0fe7b35b1d', '1', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 'm', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `po_no` int(11) NOT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `date` varchar(123) DEFAULT NULL,
  `ordered_by` varchar(50) DEFAULT NULL,
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`po_no`, `supplier`, `date`, `ordered_by`, `status`) VALUES
(1, 'Persan', '01/02/2017', 'Beltran, Eunice S.', 'active'),
(2, 'Persan', '01/02/2017', 'Beltran, Eunice S.', 'active'),
(4, 'Persan', '24/11/2017', 'Beltran, Eunice S.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quote_no` int(11) NOT NULL,
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
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quote_no`, `username`, `password`, `customer`, `project`, `date`, `due_date`, `address`, `phone`, `email`, `sales_person`, `prepared_by`, `status`, `total_amount`, `balance`) VALUES
(1, 'john', 'admin', 'Escobinas, Carmina', 'Persan', '2017-02-01', '2017-01-21', 'Ricoa', '', 'johndoe@yahoo.com', NULL, 'Beltran, Eunice S.', 'active', 1500.00, '1000.00'),
(2, 'john', 'admin', 'Escobinas, Carmina', 'Condominium', '2017-02-01', '2017-11-30', 'Ricoa', '', 'johndoe@yahoo.com', NULL, 'Beltran, Eunice S.', 'active', 150.00, '150.00'),
(3, 'john', 'admin', 'Doe, John .', 'final project', '2018-02-09', '2018-07-25', 'Ricoa', '', 'johndoe@yahoo.com', NULL, 'Beltran, Eunice  S', 'active', 2100.00, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_cart`
--

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
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation_cart`
--

INSERT INTO `quotation_cart` (`quote_no`, `company`, `project`, `material_no`, `code`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `quantity_remaining`, `price`, `abbre`, `status`) VALUES
(4, 'Doe, John .', 'final project', 8, '070d94720e2eb553186018050d5759b5', '', 'woods', 'ply wood', '', '', 'box', '50', 5, 0, 150, 'm', 'active'),
(2, 'Persan', 'Condominium', 7, '07bd9ad622ebfc020cdc8c83fd9c048f', '', 'metals', 'poles', 'long', '', '', '100', 2, 3, 20, 'm', 'active'),
(2, 'Persan', 'Condominium', 5, '1a0f7df48b464edffa43d2e12788a7f1', 'mets', 'metals', 'nail', 'heyya', 'silver', '', '100', 4, 1, 100, 'm', 'active'),
(3, 'Persan', 'Condominium', 6, '8b82d85f60e1ce5ba2984e4fca9acfd0', '', 'electrical', 'wires', 'aluminum', '', '', '100', 1, 0, 150, 'm', 'active'),
(4, 'Doe, John .', 'final project', 7, '8b91347fe9b4e24f34d4153b72ef8646', '', 'metals', 'poles', 'long', '', 'box', '100', 5, 0, 20, 'm', 'active'),
(4, 'Doe, John .', 'final project', 5, 'd2f77aae4e211be1012d6a6fe0b2062d', 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 5, 0, 100, 'm', 'active'),
(4, 'Doe, John .', 'final project', 6, 'f13ddb7e72b549ed8dfd36084598a46f', '', 'electrical', 'wires', 'aluminum', '', 'box', '100', 5, 0, 150, 'm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `no` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` varchar(123) NOT NULL,
  `account_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`no`, `user`, `pass`, `position`, `status`, `account_status`) VALUES
(1, 'admin', 'admin', 'admin', 'active', 'active'),
(2, 'cnieva', 'admin', 'admin', 'inactive', 'active'),
(3, 'user1', 'admin', 'Foreman', 'inactive', 'active'),
(4, 'user2', 'admin', 'Quantity Surveyor', 'inactive', 'inactive'),
(5, 'user3', 'admin', 'Secretary', 'inactive', 'Active'),
(6, 'user4', 'admin', 'Stockman', 'inactive', 'inactive'),
(8, 'user5', 'admin', 'Accountant', 'inactive', 'inactive'),
(9, 'john', 'admin', 'customer', 'inactive', 'active'),
(10, 'admin1', 'admin', 'Admin', 'inactive', 'Active'),
(11, 'nina', 'nina', 'Quantity Surveyor', 'inactive', 'inactive'),
(12, 'cj', 'cj', 'Foreman', 'inactive', 'inactive'),
(13, 'asd', 'asd', 'Admin', 'inactive', 'inactive'),
(15, 'jaja', 'admin', 'Admin', 'inactive', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `scategory_no` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `scategory_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`scategory_no`, `category_name`, `scategory_name`, `status`) VALUES
(1, 'metals', 'trusses', 'Active'),
(2, 'woods', 'ply wood', 'Active'),
(3, 'metals', 'nail', 'Active'),
(4, 'metals', 'poles', 'active'),
(5, 'electrical', 'wires', 'active');

--
-- Triggers `subcategory`
--
DELIMITER $$
CREATE TRIGGER `subcategory_added` AFTER INSERT ON `subcategory` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Subcategory Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subcategory_update` AFTER UPDATE ON `subcategory` FOR EACH ROW begin
declare a varchar(2000);

if(new.status='active' <> old.status='inactive')
then set a='Deleted Subcategory Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Subcategory Record';
end if;




if(new.scategory_no<>old.scategory_no)
then set a=concat('Updated Subcategory Record:',
                  coalesce(nullif(old.scategory_no,''), 'blank'),' --> ',
                  coalesce(nullif(new.scategory_no,''), 'blank'),'');
                  end if;
                  
                  if(new.category_name<>old.category_name)
then set a=concat('Updated Subcategory Record:',
                  coalesce(nullif(old.category_name,''), 'blank'),' --> ',
                  coalesce(nullif(new.category_name,''), 'blank'),'');
                  end if;
                  
                   if(new.scategory_name<>old.scategory_name)
then set a=concat('Updated Subcategory Record:',
                  coalesce(nullif(old.scategory_name,''), 'blank'),' --> ',
                  coalesce(nullif(new.scategory_name,''), 'blank'),'');
                  end if;
                  
               
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_no` int(11) NOT NULL,
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
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_no`, `supp_name`, `phone`, `fax`, `email`, `firstname`, `middlename`, `lastname`, `contact`, `street`, `city`, `status`) VALUES
(1, 'Maralabs', '123456789', '6546846546', 'supplier1@yahoo.com', 'Edwin', '', 'Marquez', '09236873123', 'Maginhawa', 'Negros', 'active'),
(2, 'Persan', '7245961', '1234567891', 'persaninc@yahoo.com', 'Kobe', '', 'Bryant', '09353791848', '23 Ortega St.', 'San juan', 'Active'),
(3, '8Layer', '45698745', '', 'geekineers@8layertech.com', 'Meric', '', 'Mara', '9512364', 'East Drive', 'Pasig City', 'Active');

--
-- Triggers `supplier`
--
DELIMITER $$
CREATE TRIGGER `supplier_added` AFTER INSERT ON `supplier` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Supplier Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `supplier_update` AFTER UPDATE ON `supplier` FOR EACH ROW begin
declare a varchar(2000);

if(new.status='active' <> old.status='inactive')
then set a='Deleted Supplier Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Supplier Record';
end if;



if(new.supplier_no<>old.supplier_no)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.supplier_no,''), 'blank'),' --> ',
                  coalesce(nullif(new.supplier_no,''), 'blank'),'');
                  end if;
                  
                
                   if(new.supp_name<>old.supp_name)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.supp_name,''), 'blank'),' --> ',
                  coalesce(nullif(new.supp_name,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.phone<>old.phone)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.phone,''), 'blank'),' --> ',
                  coalesce(nullif(new.phone,''), 'blank'),'');
                  end if;
                  
                   if(new.fax<>old.fax)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.fax,''), 'blank'),' --> ',
                  coalesce(nullif(new.fax,''), 'blank'),'');
                  end if;
                  
                  
                  if(new.email<>old.email)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.email,''), 'blank'),' --> ',
                  coalesce(nullif(new.email,''), 'blank'),'');
                  end if;
                  
                   if(new.firstname<>old.firstname)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.firstname,''), 'blank'),' --> ',
                  coalesce(nullif(new.firstname,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.middlename<>old.middlename)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.middlename,''), 'blank'),' --> ',
                  coalesce(nullif(new.middlename,''), 'blank'),'');
                  end if;
                  
                   if(new.lastname<>old.lastname)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.lastname,''), 'blank'),' --> ',
                  coalesce(nullif(new.lastname,''), 'blank'),'');
                  end if;
                  
                   if(new.contact<>old.contact)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.contact,''), 'blank'),' --> ',
                  coalesce(nullif(new.contact,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.street<>old.street)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.street,''), 'blank'),' --> ',
                  coalesce(nullif(new.street,''), 'blank'),'');
                  end if;
            
            
             if(new.city<>old.city)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.city,''), 'blank'),' --> ',
                  coalesce(nullif(new.city,''), 'blank'),'');
                  end if;
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `unitmeasurement`
--

CREATE TABLE `unitmeasurement` (
  `unit_no` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `unit_measurment` varchar(50) DEFAULT NULL,
  `Abbreviation` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unitmeasurement`
--

INSERT INTO `unitmeasurement` (`unit_no`, `category`, `type`, `unit_measurment`, `Abbreviation`, `status`) VALUES
(1, NULL, NULL, 'kilogram', 'kg', 'Active'),
(2, NULL, NULL, 'gram', 'g', 'Active'),
(3, NULL, NULL, 'milligram', 'mg', 'active'),
(4, NULL, NULL, 'inch', 'in', 'Active'),
(5, NULL, NULL, 'centimeter', 'cm', 'Active'),
(6, NULL, NULL, 'meter', 'm', 'Active'),
(7, NULL, NULL, 'liters', 'L', 'active');

--
-- Triggers `unitmeasurement`
--
DELIMITER $$
CREATE TRIGGER `unitmeasurement_added` AFTER INSERT ON `unitmeasurement` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Unit Measurement Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `unitmeasurement_update` AFTER UPDATE ON `unitmeasurement` FOR EACH ROW begin
declare a varchar(2000);

if(new.status='active' <> old.status='inactive')
then set a='Deleted Unit Measurement Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Unit Measurement Record';
end if;


if(new.unit_no<>old.unit_no)
then set a=concat('Updated Unit Measurement Record:',
                  coalesce(nullif(old.unit_no,''), 'blank'),' --> ',
                  coalesce(nullif(new.unit_no,''), 'blank'),'');
                  end if;
                  
                  if(new.category<>old.category)
then set a=concat('Updated Unit Measurement Record:',
                  coalesce(nullif(old.category,''), 'blank'),' --> ',
                  coalesce(nullif(new.category,''), 'blank'),'');
                  end if;
                  
                   if(new.type<>old.type)
then set a=concat('Updated Unit Measurement Record:',
                  coalesce(nullif(old.type,''), 'blank'),' --> ',
                  coalesce(nullif(new.type,''), 'blank'),'');
                  end if;
                  
                   if(new.unit_measurment<>old.unit_measurment)
then set a=concat('Updated Unit Measurement Record:',
                  coalesce(nullif(old.unit_measurment,''), 'blank'),' --> ',
                  coalesce(nullif(new.unit_measurment,''), 'blank'),'');
                  end if;
                  
                   if(new.Abbreviation<>old.Abbreviation)
then set a=concat('Updated Unit Measurement Record:',
                  coalesce(nullif(old.Abbreviation,''), 'blank'),' --> ',
                  coalesce(nullif(new.Abbreviation,''), 'blank'),'');
                  end if;
                  
                  
                  
                  
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billing_no`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_no`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_no`);

--
-- Indexes for table `delivery_cart`
--
ALTER TABLE `delivery_cart`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_no`);

--
-- Indexes for table `materialreq`
--
ALTER TABLE `materialreq`
  ADD PRIMARY KEY (`req_no`);

--
-- Indexes for table `materialreq_cart`
--
ALTER TABLE `materialreq_cart`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_no`),
  ADD UNIQUE KEY `product_code` (`code`),
  ADD UNIQUE KEY `product_code_2` (`code`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_no`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_no`);

--
-- Indexes for table `pullout`
--
ALTER TABLE `pullout`
  ADD PRIMARY KEY (`pullout_no`);

--
-- Indexes for table `pullout_cart`
--
ALTER TABLE `pullout_cart`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `purchase_cart`
--
ALTER TABLE `purchase_cart`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`po_no`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`quote_no`);

--
-- Indexes for table `quotation_cart`
--
ALTER TABLE `quotation_cart`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`scategory_no`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_no`);

--
-- Indexes for table `unitmeasurement`
--
ALTER TABLE `unitmeasurement`
  ADD PRIMARY KEY (`unit_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billing_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `materialreq`
--
ALTER TABLE `materialreq`
  MODIFY `req_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pullout`
--
ALTER TABLE `pullout`
  MODIFY `pullout_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `po_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `quote_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `scategory_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unitmeasurement`
--
ALTER TABLE `unitmeasurement`
  MODIFY `unit_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
