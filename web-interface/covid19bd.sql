-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 08:23 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `awarenessnews`
--

CREATE TABLE `awarenessnews` (
  `date` date NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `link` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Source` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `awarenessnews`
--

INSERT INTO `awarenessnews` (`date`, `Title`, `image`, `link`, `Source`) VALUES
('2020-04-13', 'কেন ২০ সেকেন্ড হাত ধুতে হবে?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/04/10/modhura-chowdhury-brac-02.jpg/ALTERNATES/w140/modhura-chowdhury-brac-02.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1745427.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-13', 'নিয়ম মেনে চললেই করোনা হয়ে যাবে অতীত!', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/04/10/kumar-bishwajit-100420-18.jpg/ALTERNATES/w140/kumar-bishwajit-100420-18.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1745437.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-13', 'করোনাভাইরাস: হাতের পরিচ্ছন্নতায় করণীয়', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/04/10/washing-hands-brac-02.jpg/ALTERNATES/w140/washing-hands-brac-02.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1745468.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-13', 'করোনাভাইরাস নিয়ে কিছু জরুরি তথ্য', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/04/10/anbabil-sen-brac-01.jpg/ALTERNATES/w140/anbabil-sen-brac-01.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1745430.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-13', 'হোম কোয়ারেন্টিন কীভাবে?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/30/coronavirus-quarantine-brac.jpg/ALTERNATES/w140/coronavirus-quarantine-brac.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1740551.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-13', 'হোম কোয়ারেন্টিন কী?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/20/quarantine-seal-200320-01.jpg/ALTERNATES/w140/quarantine-seal-200320-01.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1740550.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-13', '‘সবার ভালর কথা ভাইবা’ বন্ধু যখন একলা রয়', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/31/momotaj-brac-310320-01.jpg/ALTERNATES/w140/momotaj-brac-310320-01.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1741339.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-13', 'চিকিৎসক কীভাবে কভিড-১৯ রোগী দেখবেন?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/30/coronavirus-doctors-reuters.jpg/ALTERNATES/w140/coronavirus-doctors-reuters.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1740549.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-13', 'পরীক্ষা করাতে হবে কখন?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/28/coronavirus-test-reuters-280320-02.jpg/ALTERNATES/w140/coronavirus-test-reuters-280320-02.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1740068.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-13', 'দূরত্বই সুরক্ষা দেবে?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/30/benjir-ahmed-health-brac.jpg/ALTERNATES/w140/benjir-ahmed-health-brac.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1740548.bdnews', 'https://bangla.bdnews24.com/');

-- --------------------------------------------------------

--
-- Table structure for table `covidnews`
--

CREATE TABLE `covidnews` (
  `date` date NOT NULL,
  `Title` varchar(5000) CHARACTER SET utf8mb4 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `link` varchar(5000) NOT NULL,
  `Source` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `covidnews`
--

INSERT INTO `covidnews` (`date`, `Title`, `image`, `link`, `Source`) VALUES
('2020-04-13', 'যারা হাত পাততে পারে না, তাদের ঘরে খাদ্য পৌঁছে দেওয়ার নির্দেশ', 'https://www.ittefaq.com.bd/cache-images/news_photos/2020/04/12/resize-342x260x1x0-image-144355-1586711592.jpg', 'https://www.ittefaq.com.bd/national/144355/যারা-হাত-পাততে-পারে-না-তাদের-ঘরে-খাদ্য-পৌঁছে-দেওয়ার-নির্দেশ', 'https://www.ittefaq.com.bd'),
('2020-04-13', 'সেনাপ্রধানের ১৬ দফা নির্দেশনায় করোনা যুদ্ধে ঝাঁপিয়ে পড়েছে সেনাবাহিনী', 'https://www.ittefaq.com.bd/cache-images/news_photos/2020/04/12/resize-342x260x1x0-image-144335-1586708058.jpg', 'https://www.ittefaq.com.bd/national/144335/সেনাপ্রধানের-১৬-দফা-নির্দেশনায়-করোনা-যুদ্ধে-ঝাঁপিয়ে-পড়েছে-সেনাবাহিনী', 'https://www.ittefaq.com.bd'),
('2020-04-13', 'নারায়ণগঞ্জে মাজেদের লাশ দাফন সম্পন্ন', 'https://www.ittefaq.com.bd/cache-images/news_photos/2020/04/12/resize-248x150x1x0-image-144280-1586703222.jpg', 'https://www.ittefaq.com.bd/national/144280/নারায়ণগঞ্জে-মাজেদের-লাশ-দাফন-সম্পন্ন', 'https://www.ittefaq.com.bd'),
('2020-04-13', 'মানসম্মত পণ্য উৎপাদনে ২০ প্রতিষ্ঠানকে বিএসটিআই’র তাগিদ', 'https://www.ittefaq.com.bd/cache-images/news_photos/2020/04/12/resize-248x150x1x0-image-144248-1586699777.jpg', 'https://www.ittefaq.com.bd/national/144248/মানসম্মত-পণ্য-উৎপাদনে-২০-প্রতিষ্ঠানকে-বিএসটিআইর-তাগিদ', 'https://www.ittefaq.com.bd'),
('2020-04-13', 'পাইলটদের দক্ষতায় বিমান বাহিনীর হেলিকপ্টারের জরুরি অবতরণ', 'https://www.ittefaq.com.bd/cache-images/news_photos/2020/04/12/resize-248x150x1x0-image-144243-1586699162.jpg', 'https://www.ittefaq.com.bd/national/144243/পাইলটদের-দক্ষতায়-বিমান-বাহিনীর-হেলিকপ্টারের-জরুরি-অবতরণ', 'https://www.ittefaq.com.bd'),
('2020-04-13', 'মাজেদের গোসল ও খাওয়া শেষ, কারাগারে সিভিল সার্জন', 'https://www.ntvbd.com/sites/default/files/styles/social_share/public/images/2020/04/11/mazed_1.jpg?itok=5-0E1XkP', 'https://www.ntvbd.com/bangladesh/%E0%A6%AE%E0%A6%BE%E0%A6%9C%E0%A7%87%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%97%E0%A7%8B%E0%A6%B8%E0%A6%B2-%E0%A6%93-%E0%A6%96%E0%A6%BE%E0%A6%93%E0%A7%9F%E0%A6%BE-%E0%A6%B6%E0%A7%87%E0%A6%B7-%E0%A6%95%E0%A6%BE%E0%A6%B0%E0%A6%BE%E0%A6%97%E0%A6%BE%E0%A6%B0%E0%A7%87-%E0%A6%B8%E0%A6%BF%E0%A6%AD%E0%A6%BF%E0%A6%B2-%E0%A6%B8%E0%A6%BE%E0%A6%B0%E0%A7%8D%E0%A6%9C%E0%A6%A8-731201', 'https://www.ntvbd.com'),
('2020-04-13', '‘খুনি মাজেদের মরদেহ ভোলায় প্রবেশ করতে দেব না’', 'https://www.ntvbd.com/sites/default/files/styles/social_share/public/images/2020/04/07/mazed.jpg?itok=hmifspx0', 'https://www.ntvbd.com/bangladesh/%E0%A6%96%E0%A7%81%E0%A6%A8%E0%A6%BF-%E0%A6%AE%E0%A6%BE%E0%A6%9C%E0%A7%87%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%AE%E0%A6%B0%E0%A6%A6%E0%A7%87%E0%A6%B9-%E0%A6%AD%E0%A7%8B%E0%A6%B2%E0%A6%BE%E0%A7%9F-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%AC%E0%A7%87%E0%A6%B6-%E0%A6%95%E0%A6%B0%E0%A6%A4%E0%A7%87-%E0%A6%A6%E0%A7%87%E0%A6%AC-%E0%A6%A8%E0%A6%BE-731105', 'https://www.ntvbd.com'),
('2020-04-13', 'অর্ধেকে নামল করোনায় আক্রান্ত ও মৃতের সংখ্যা', 'https://www.ntvbd.com/sites/default/files/styles/social_share/public/images/2020/04/11/sabrina.jpg?itok=38mmnwub', 'https://www.ntvbd.com/bangladesh/%E0%A6%85%E0%A6%B0%E0%A7%8D%E0%A6%A7%E0%A7%87%E0%A6%95%E0%A7%87-%E0%A6%A8%E0%A6%BE%E0%A6%AE%E0%A6%B2-%E0%A6%95%E0%A6%B0%E0%A7%8B%E0%A6%A8%E0%A6%BE%E0%A7%9F-%E0%A6%86%E0%A6%95%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%A8%E0%A7%8D%E0%A6%A4-%E0%A6%93-%E0%A6%AE%E0%A7%83%E0%A6%A4%E0%A7%87%E0%A6%B0-%E0%A6%B8%E0%A6%82%E0%A6%96%E0%A7%8D%E0%A6%AF%E0%A6%BE-731041', 'https://www.ntvbd.com'),
('2020-04-13', 'বঙ্গবন্ধুর খুনি মাজেদের ফাঁসি মধ্যরাতের পর : আইজি প্রিজন', 'https://www.ntvbd.com/sites/default/files/styles/social_share/public/images/2020/04/10/mazed.jpg?itok=gskg-KLf', 'https://www.ntvbd.com/bangladesh/%E0%A6%AC%E0%A6%99%E0%A7%8D%E0%A6%97%E0%A6%AC%E0%A6%A8%E0%A7%8D%E0%A6%A7%E0%A7%81%E0%A6%B0-%E0%A6%96%E0%A7%81%E0%A6%A8%E0%A6%BF-%E0%A6%AE%E0%A6%BE%E0%A6%9C%E0%A7%87%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%AB%E0%A6%BE%E0%A6%81%E0%A6%B8%E0%A6%BF-%E0%A6%AE%E0%A6%A7%E0%A7%8D%E0%A6%AF%E0%A6%B0%E0%A6%BE%E0%A6%A4%E0%A7%87%E0%A6%B0-%E0%A6%AA%E0%A6%B0-%E0%A6%86%E0%A6%87%E0%A6%9C%E0%A6%BF-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%BF%E0%A6%9C%E0%A6%A8-731125', 'https://www.ntvbd.com'),
('2020-04-13', 'বঙ্গবন্ধুকে খুনের পর পুরস্কৃত হন মাজেদ, মামলার পর আত্মগোপন করেন', 'https://www.ntvbd.com/sites/default/files/styles/social_share/public/images/2020/04/07/mazed.jpg?itok=hmifspx0', 'https://www.ntvbd.com/bangladesh/%E0%A6%AC%E0%A6%99%E0%A7%8D%E0%A6%97%E0%A6%AC%E0%A6%A8%E0%A7%8D%E0%A6%A7%E0%A7%81%E0%A6%95%E0%A7%87-%E0%A6%96%E0%A7%81%E0%A6%A8%E0%A7%87%E0%A6%B0-%E0%A6%AA%E0%A6%B0-%E0%A6%AA%E0%A7%81%E0%A6%B0%E0%A6%B8%E0%A7%8D%E0%A6%95%E0%A7%83%E0%A6%A4-%E0%A6%B9%E0%A6%A8-%E0%A6%AE%E0%A6%BE%E0%A6%9C%E0%A7%87%E0%A6%A6-%E0%A6%AE%E0%A6%BE%E0%A6%AE%E0%A6%B2%E0%A6%BE%E0%A6%B0-%E0%A6%AA%E0%A6%B0-%E0%A6%86%E0%A6%A4%E0%A7%8D%E0%A6%AE%E0%A6%97%E0%A7%8B%E0%A6%AA%E0%A6%A8-%E0%A6%95%E0%A6%B0%E0%A7%87%E0%A6%A8-731197', 'https://www.ntvbd.com'),
('2020-04-13', '\nদুই সাংবাদিককে টেনেহিঁচড়ে থানায় নিল পুলিশ\n', '//paloimages.prothom-alo.com/contents/cache/images/400x225x1/uploads/media/2016/05/26/ad680b4e608017a6cb29feb7bf2c6e3d-bogura.jpg?jadewits_media_id=596146', 'https://www.prothomalo.com/bangladesh/article/1650458/%E0%A6%A6%E0%A7%81%E0%A6%87-%E0%A6%B8%E0%A6%BE%E0%A6%82%E0%A6%AC%E0%A6%BE%E0%A6%A6%E0%A6%BF%E0%A6%95%E0%A6%95%E0%A7%87-%E0%A6%9F%E0%A7%87%E0%A6%A8%E0%A7%87%E0%A6%B9%E0%A6%BF%E0%A6%81%E0%A6%9A%E0%A7%9C%E0%A7%87-%E0%A6%A5%E0%A6%BE%E0%A6%A8%E0%A6%BE%E0%A7%9F-%E0%A6%A8%E0%A6%BF%E0%A6%B2-%E0%A6%AA%E0%A7%81%E0%A6%B2%E0%A6%BF%E0%A6%B6', 'https://www.prothomalo.com'),
('2020-04-13', '\nশিবগঞ্জে জ্বর-সর্দি নিয়ে কিশোরের মৃত্যু\n', '//paloimages.prothom-alo.com/contents/cache/images/400x225x1/uploads/media/2016/06/05/12d04181f0d9c152a5a8f2e4bee82db0-chapainobabgonj.jpg?jadewits_media_id=602701', 'https://www.prothomalo.com/bangladesh/article/1650457/%E0%A6%B6%E0%A6%BF%E0%A6%AC%E0%A6%97%E0%A6%9E%E0%A7%8D%E0%A6%9C%E0%A7%87-%E0%A6%9C%E0%A7%8D%E0%A6%AC%E0%A6%B0-%E0%A6%B8%E0%A6%B0%E0%A7%8D%E0%A6%A6%E0%A6%BF-%E0%A6%A8%E0%A6%BF%E0%A7%9F%E0%A7%87-%E0%A6%95%E0%A6%BF%E0%A6%B6%E0%A7%8B%E0%A6%B0%E0%A7%87%E0%A6%B0-%E0%A6%AE%E0%A7%83%E0%A6%A4%E0%A7%8D%E0%A6%AF%E0%A7%81', 'https://www.prothomalo.com'),
('2020-04-13', '\nগ্রামের বাজার পাশের স্কুল মাঠে বসাতে বলেছে সরকার\n', '//paloimages.prothom-alo.com/contents/cache/images/400x225x1/uploads/media/2020/04/12/90a85f2b6b5cd2de21df6556a10d2afb-5e934517935b8.jpg?jadewits_media_id=1525145', 'https://www.prothomalo.com/bangladesh/article/1650439/%E0%A6%97%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A7%87%E0%A6%B0-%E0%A6%AC%E0%A6%BE%E0%A6%9C%E0%A6%BE%E0%A6%B0-%E0%A6%AA%E0%A6%BE%E0%A6%B6%E0%A7%87%E0%A6%B0-%E0%A6%B8%E0%A7%8D%E0%A6%95%E0%A7%81%E0%A6%B2-%E0%A6%AE%E0%A6%BE%E0%A6%A0%E0%A7%87-%E0%A6%AC%E0%A6%B8%E0%A6%BE%E0%A6%A4%E0%A7%87-%E0%A6%AC%E0%A6%B2%E0%A7%87%E0%A6%9B%E0%A7%87-%E0%A6%B8%E0%A6%B0%E0%A6%95%E0%A6%BE%E0%A6%B0', 'https://www.prothomalo.com'),
('2020-04-13', '\nচট্টগ্রামে শিশুসহ আরও ৬ জনের করোনা শনাক্ত\n', '//paloimages.prothom-alo.com/contents/cache/images/400x225x1/uploads/media/2016/04/27/b6eb95807bad46ee3ec7d292c712ff9e-chattagong.jpg?jadewits_media_id=577993', 'https://www.prothomalo.com/bangladesh/article/1650436/%E0%A6%9A%E0%A6%9F%E0%A7%8D%E0%A6%9F%E0%A6%97%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A7%87-%E0%A6%B6%E0%A6%BF%E0%A6%B6%E0%A7%81%E0%A6%B8%E0%A6%B9-%E0%A6%86%E0%A6%B0%E0%A6%93-%E0%A7%AC-%E0%A6%9C%E0%A6%A8%E0%A7%87%E0%A6%B0-%E0%A6%95%E0%A6%B0%E0%A7%87%E0%A6%BE%E0%A6%A8%E0%A6%BE-%E0%A6%B6%E0%A6%A8%E0%A6%BE%E0%A6%95%E0%A7%8D%E0%A6%A4', 'https://www.prothomalo.com'),
('2020-04-13', '\n১০ টাকা কেজির চাল খোলাবাজারে, যুবলীগ নেতাসহ ২ জন আটক\n', '//paloimages.prothom-alo.com/contents/cache/images/400x225x1/uploads/media/2016/05/19/6e197cdebd4adee6a0194858406c46d8-norsingdi.jpg?jadewits_media_id=591955', 'https://www.prothomalo.com/bangladesh/article/1650433/%E0%A7%A7%E0%A7%A6-%E0%A6%9F%E0%A6%BE%E0%A6%95%E0%A6%BE-%E0%A6%95%E0%A7%87%E0%A6%9C%E0%A6%BF%E0%A6%B0-%E0%A6%9A%E0%A6%BE%E0%A6%B2-%E0%A6%96%E0%A7%87%E0%A6%BE%E0%A6%B2%E0%A6%BE%E0%A6%AC%E0%A6%BE%E0%A6%9C%E0%A6%BE%E0%A6%B0%E0%A7%87-%E0%A6%AF%E0%A7%81%E0%A6%AC%E0%A6%B2%E0%A7%80%E0%A6%97-%E0%A6%A8%E0%A7%87%E0%A6%A4%E0%A6%BE%E0%A6%B8%E0%A6%B9-%E0%A7%A8-%E0%A6%9C%E0%A6%A8', 'https://www.prothomalo.com'),
('2020-04-13', 'মৃত্যুর মুখ থেকে ফেরা এক বাংলাদেশি ডাক্তারের অভিজ্ঞতা', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/110D6/production/_111764896_sunil.jpg', 'https://www.bbc.com/bengali/news-52263405', 'https://www.bbc.com'),
('2020-04-13', 'ব্রিটিশ প্রধানমন্ত্রীকে সতর্ককারী বাংলাদেশি ডাক্তারের মৃত্যু', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/14CCA/production/_111749158_m7.jpg', 'https://www.bbc.com/bengali/news-52242957', 'https://www.bbc.com'),
('2020-04-13', '‘যে কোন কিছুই হতে পারতো’ -হাসপাতাল ছাড়ার পর বরিস জনসন', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/336E/production/_111766131_whatsubject.jpg', 'https://www.bbc.com/bengali/news-52264960', 'https://www.bbc.com'),
('2020-04-13', 'করোনাভাইরাস: পরীক্ষা এবং চিকিৎসা নিয়ে ভোগান্তির নানা অভিযোগ', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/1938/production/_111765460_gettyimages-1209557880.jpg', 'https://www.bbc.com/bengali/news-52263407', 'https://www.bbc.com'),
('2020-04-13', 'করোনাভাইরাস : \'আমাদের টাকায় জামাতি আর জিহাদির সাহায্য নয়\'', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/9124/production/_111765173_gettyimages-1207338830.jpg', 'https://www.bbc.com/bengali/news-52263406', 'https://www.bbc.com'),
('2020-04-13', 'করোনাভাইরাস: বিল গেটস বলেছেন এই বিশ্ব মহামারি রুখতে টিকা আবিস্কারের বিকল্প নেই - খবর, সর্বশেষ খবর, ব্রেকিং নিউজ | News, latest news, breaking news', 'https://news.files.bbci.co.uk/ws/img/logos/og/bengali.png', 'https://www.bbc.com/bengali/live/news-52259311', 'https://www.bbc.com'),
('2020-04-13', 'করোনাভাইরাস: ওষুধ নিয়ে বাংলাদেশের প্রস্তুতি কতটা?', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/7AC2/production/_111762413_6b5e8a30-291a-4497-8b2e-47f45cf97ffe.jpg', 'https://www.bbc.com/bengali/news-52259137', 'https://www.bbc.com'),
('2020-04-13', 'নিউ ইয়র্কে একজন প্যারামেডিকের ডায়েরি: ‘প্রতিদিনই ৯/১১ এর মতো’', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/7950/production/_111765013_whatsubject.jpg', 'https://www.bbc.com/bengali/news-52263775', 'https://www.bbc.com'),
('2020-04-13', 'করোনাভাইরাস: অতিমাত্রায় আক্রান্ত হচ্ছে এশীয়, আফ্রিকান জনগোষ্ঠী', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/4034/production/_111763461_gettyimages-1208879971.jpg', 'https://www.bbc.com/bengali/news-52261965', 'https://www.bbc.com'),
('2020-04-13', 'বাংলাদেশে একদিনে সর্বোচ্চ ১৩৯ জন রোগী শনাক্ত', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/B0AA/production/_111762254_gettyimages-1206357254.jpg', 'https://www.bbc.com/bengali/news-52260597', 'https://www.bbc.com');

-- --------------------------------------------------------

--
-- Table structure for table `dhakadata`
--

CREATE TABLE `dhakadata` (
  `Location` varchar(255) NOT NULL,
  `Freq.` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhakadata`
--

INSERT INTO `dhakadata` (`Location`, `Freq.`) VALUES
('Adabor', 1),
('Agargaon', 2),
('Ashkona', 1),
('Azimpur', 2),
('Babu Bazar', 3),
('Badda', 4),
('Baily Road', 3),
('Banani', 7),
('Bangshal', 7),
('Basabo', 12),
('Bashundhora', 4),
('Begunbari', 1),
('Beribadh', 1),
('Bosila', 1),
('Buet Area', 1),
('Central Road', 1),
('Chawk Bazar', 4),
('Dhakkeshori', 1),
('Dhanmondi', 14),
('Dholaikhal', 1),
('Doyaganj', 1),
('Eskaton', 1),
('Farmgate', 1),
('Gendaria', 3),
('Green Road', 5),
('Gulistan', 2),
('Gulshan', 4),
('Hatir jhil', 1),
('Hatirpool', 2),
('Hazaribagh', 8),
('Islampur', 2),
('Jailgate', 2),
('Jatrabari', 11),
('Jigatala', 3),
('Kamrangir Char', 1),
('Kazi para', 1),
('Kodomtoli', 1),
('Kotowali', 2),
('Lalbagh', 13),
('Laxmibazar', 2),
('Malibagh', 2),
('Manikdi', 1),
('Mirhajaribagh', 2),
('Mirpur-1', 5),
('Mirpur-6', 2),
('Mirpur-11', 10),
('Mirpur-12', 8),
('Mirpur-13', 2),
('Mitford', 1),
('Mogbazar', 4),
('Mohakhali', 7),
('Mohammadpur', 12),
('Mugda', 1),
('Nawabpur', 1),
('Narinda', 2),
('Nikunja', 1),
('Pirerbagh', 2),
('Purana Paltan', 2),
('Rajarbagh', 2),
('Rampura', 1),
('Rayerbazar', 1),
('Sayedabad', 1),
('Shah Ali Bagh', 2),
('Shahbag', 2),
('Shantinagar', 5),
('Showari Ghat', 3),
('Siddheshwari', 1),
('Sonir akhra', 1),
('Sutrapur', 2),
('Tejgaon', 3),
('Tolarbag', 19),
('Urdu Road', 1),
('Uttara', 17),
('Wari', 16);

-- --------------------------------------------------------

--
-- Table structure for table `iedcrdata`
--

CREATE TABLE `iedcrdata` (
  `Date` date NOT NULL,
  `TOTAL COVID-19 TESTS` int(11) DEFAULT NULL,
  `LAST 24 Hours Test` int(11) DEFAULT NULL,
  `Covid-19 Positive Cases` int(11) NOT NULL,
  `Last 24Hours Cases` int(11) NOT NULL,
  `Recovered` int(11) NOT NULL,
  `Death Cases` int(11) NOT NULL,
  `Recovery Rate` float NOT NULL,
  `Death Rate` float NOT NULL,
  `New Recoveries` int(11) NOT NULL,
  `Deaths in last 24 hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iedcrdata`
--

INSERT INTO `iedcrdata` (`Date`, `TOTAL COVID-19 TESTS`, `LAST 24 Hours Test`, `Covid-19 Positive Cases`, `Last 24Hours Cases`, `Recovered`, `Death Cases`, `Recovery Rate`, `Death Rate`, `New Recoveries`, `Deaths in last 24 hours`) VALUES
('2020-03-25', 794, 82, 39, 0, 7, 5, 17.9487, 12.8205, 0, 0),
('2020-03-26', 920, 126, 44, 5, 11, 5, 25, 11.3636, 4, 0),
('2020-03-27', 1026, 106, 48, 4, 11, 5, 22.9167, 10.4167, 0, 0),
('2020-03-28', 1076, 50, 48, 0, 15, 5, 31.25, 10.4167, 4, 0),
('2020-03-29', 1185, 109, 48, 0, 15, 5, 31.25, 10.4167, 0, 0),
('2020-03-30', 1338, 153, 49, 1, 19, 5, 38.7755, 10.2041, 4, 0),
('2020-03-31', 1602, 140, 51, 2, 25, 5, 49.0196, 9.80392, 6, 0),
('2020-04-01', 1602, 140, 54, 3, 25, 6, 46.2963, 11.1111, 0, 1),
('2020-04-02', 1896, 142, 56, 2, 25, 6, 44.6429, 10.7143, 0, 0),
('2020-04-03', 2086, 180, 61, 5, 26, 6, 42.623, 9.83607, 1, 0),
('2020-04-04', 2086, 180, 70, 9, 30, 8, 42.8571, 11.4286, 4, 2),
('2020-04-05', 1987, 103, 88, 18, 30, 9, 34.0909, 10.2273, 0, 1),
('2020-04-06', 0, 0, 123, 35, 33, 12, 26.8293, 9.7561, 3, 3),
('2020-04-07', 4289, 679, 164, 41, 33, 17, 20.122, 10.3659, 0, 5),
('2020-04-08', 4289, 679, 218, 54, 33, 20, 15.1376, 9.17431, 0, 3),
('2020-04-09', 4289, 679, 330, 112, 33, 21, 10, 6.36364, 0, 1),
('2020-04-10', 7359, 1184, 424, 94, 33, 27, 7.78302, 6.36792, 0, 6),
('2020-04-11', 8313, 954, 482, 58, 36, 30, 7.46888, 6.22407, 3, 3),
('2020-04-12', 9653, 1340, 621, 139, 39, 34, 6.28019, 5.47504, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `regiondata`
--

CREATE TABLE `regiondata` (
  `Location` varchar(255) NOT NULL,
  `Freq.` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regiondata`
--

INSERT INTO `regiondata` (`Location`, `Freq.`) VALUES
('Dhaka City', 313),
('Dhaka District ', 22),
('Gazipur', 23),
('Kishoreganj', 10),
('Madaripur', 19),
('Manikganj', 5),
('Narayanganj', 107),
('Munshigonj', 14),
('Narshingdi', 4),
('Rajbari', 6),
('Tangail', 2),
('Shariatpur', 1),
('Gopalganj', 3),
('Chattogram', 12),
('Cox s bazar', 1),
('Cumilla', 9),
('B Baria', 6),
('Laksmipur', 1),
('Chandpur', 6),
('Moulovi Bazar', 1),
('Hobiganj', 1),
('Sylhet', 1),
('Rangpur', 2),
('Gaibandha', 6),
('Nilphamari', 3),
('Lalmonirhat', 1),
('Thakurgaon', 3),
('Chuadanga', 1),
('Mymensingh', 5),
('Jamalpur', 6),
('Netrokona', 1),
('Sherpur', 2),
('Barguna', 3),
('Potuakhali', 1),
('Jhalokathi', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
