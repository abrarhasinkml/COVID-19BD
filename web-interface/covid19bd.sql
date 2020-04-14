-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 12:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `Title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `Source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `awarenessnews`
--

INSERT INTO `awarenessnews` (`date`, `Title`, `image`, `link`, `Source`) VALUES
('2020-04-15', 'কেন ২০ সেকেন্ড হাত ধুতে হবে?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/04/10/modhura-chowdhury-brac-02.jpg/ALTERNATES/w140/modhura-chowdhury-brac-02.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1745427.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-15', 'নিয়ম মেনে চললেই করোনা হয়ে যাবে অতীত!', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/04/10/kumar-bishwajit-100420-18.jpg/ALTERNATES/w140/kumar-bishwajit-100420-18.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1745437.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-15', 'করোনাভাইরাস: হাতের পরিচ্ছন্নতায় করণীয়', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/04/10/washing-hands-brac-02.jpg/ALTERNATES/w140/washing-hands-brac-02.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1745468.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-15', 'করোনাভাইরাস নিয়ে কিছু জরুরি তথ্য', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/04/10/anbabil-sen-brac-01.jpg/ALTERNATES/w140/anbabil-sen-brac-01.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1745430.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-15', 'হোম কোয়ারেন্টিন কীভাবে?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/30/coronavirus-quarantine-brac.jpg/ALTERNATES/w140/coronavirus-quarantine-brac.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1740551.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-15', 'হোম কোয়ারেন্টিন কী?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/20/quarantine-seal-200320-01.jpg/ALTERNATES/w140/quarantine-seal-200320-01.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1740550.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-15', '‘সবার ভালর কথা ভাইবা’ বন্ধু যখন একলা রয়', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/31/momotaj-brac-310320-01.jpg/ALTERNATES/w140/momotaj-brac-310320-01.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1741339.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-15', 'চিকিৎসক কীভাবে কভিড-১৯ রোগী দেখবেন?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/30/coronavirus-doctors-reuters.jpg/ALTERNATES/w140/coronavirus-doctors-reuters.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1740549.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-15', 'পরীক্ষা করাতে হবে কখন?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/28/coronavirus-test-reuters-280320-02.jpg/ALTERNATES/w140/coronavirus-test-reuters-280320-02.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1740068.bdnews', 'https://bangla.bdnews24.com/'),
('2020-04-15', 'দূরত্বই সুরক্ষা দেবে?', 'https://d30fl32nd2baj9.cloudfront.net/media/2020/03/30/benjir-ahmed-health-brac.jpg/ALTERNATES/w140/benjir-ahmed-health-brac.jpg', 'https://bangla.bdnews24.com/covid19-awareness-video/article1740548.bdnews', 'https://bangla.bdnews24.com/');

-- --------------------------------------------------------

--
-- Table structure for table `covidnews`
--

CREATE TABLE `covidnews` (
  `date` date NOT NULL,
  `Title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `Source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `covidnews`
--

INSERT INTO `covidnews` (`date`, `Title`, `image`, `link`, `Source`) VALUES
('2020-04-15', 'করোনা ছড়িয়ে পড়েছে ৩৭ জেলায়', 'https://www.ittefaq.com.bd/cache-images/news_photos/2020/04/14/resize-342x260x1x0-image-144733-1586878471.jpg', 'https://www.ittefaq.com.bd/national/144733/করোনা-ছড়িয়ে-পড়েছে-৩৭-জেলায়', 'https://www.ittefaq.com.bd'),
('2020-04-15', 'চিকিৎসক-নার্সদের জন্য ১৯ হোটেলের তালিকা', 'https://www.ittefaq.com.bd/cache-images/news_photos/2020/04/14/resize-342x260x1x0-image-144715-1586872294.jpg', 'https://www.ittefaq.com.bd/covid19-update/144715/চিকিৎসক-নার্সদের-জন্য-১৯-হোটেলের-তালিকা', 'https://www.ittefaq.com.bd'),
('2020-04-15', '‘করোনামুক্ত বাংলাদেশে আবার উৎসবের আনন্দে মিলিত হবো’', 'https://www.ittefaq.com.bd/cache-images/news_photos/2020/04/14/resize-248x150x1x0-image-144711-1586870516.jpg', 'https://www.ittefaq.com.bd/national/144711/করোনামুক্ত-বাংলাদেশে-আবার-উৎসবের-আনন্দে-মিলিত-হবো', 'https://www.ittefaq.com.bd'),
('2020-04-15', 'করোনা আতঙ্কেই বাংলাদেশসহ বিভিন্ন দেশে ছড়াতে পারে হাম', 'https://www.ittefaq.com.bd/cache-images/news_photos/2020/04/14/resize-248x150x1x0-image-144709-1586869945.jpg', 'https://www.ittefaq.com.bd/national/144709/করোনা-আতঙ্কেই-বাংলাদেশসহ-বিভিন্ন-দেশে-ছড়াতে-পারে-হাম', 'https://www.ittefaq.com.bd'),
('2020-04-15', 'করোনা শনাক্তে শিগগিরই আরও ১১টি পরীক্ষাগার', 'https://www.ittefaq.com.bd/cache-images/news_photos/2020/04/14/resize-248x150x1x0-image-144706-1586868088.jpg', 'https://www.ittefaq.com.bd/covid19-update/144706/করোনা-শনাক্তে-শিগগিরই-আরও-১১টি-পরীক্ষাগার', 'https://www.ittefaq.com.bd'),
('2020-04-15', 'দেশে আক্রান্ত হাজার পেরিয়েছে ৩৮ দিনে, অন্যান্য দেশের কতদিন লেগেছে', 'https://www.ntvbd.com/sites/default/files/styles/social_share/public/images/2020/04/14/1000.jpg?itok=J8EgeeF9', 'https://www.ntvbd.com/bangladesh/%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A7%87-%E0%A6%86%E0%A6%95%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%A8%E0%A7%8D%E0%A6%A4-%E0%A6%B9%E0%A6%BE%E0%A6%9C%E0%A6%BE%E0%A6%B0-%E0%A6%AA%E0%A7%87%E0%A6%B0%E0%A6%BF%E0%A7%9F%E0%A7%87%E0%A6%9B%E0', 'https://www.ntvbd.com'),
('2020-04-15', 'করোনায় কোন জেলায় কতজন আক্রান্ত', 'https://www.ntvbd.com/sites/default/files/styles/social_share/public/images/2020/04/14/kronaa.jpg?itok=01vf3DWb', 'https://www.ntvbd.com/bangladesh/%E0%A6%95%E0%A6%B0%E0%A7%87%E0%A6%BE%E0%A6%A8%E0%A6%BE%E0%A7%9F-%E0%A6%95%E0%A7%8B%E0%A6%A8-%E0%A6%9C%E0%A7%87%E0%A6%B2%E0%A6%BE%E0%A7%9F-%E0%A6%95%E0%A6%A4%E0%A6%9C%E0%A6%A8-%E0%A6%86%E0%A6%95%E0%A7%8D%E0%A6%B0%E0%A6%BE%E', 'https://www.ntvbd.com'),
('2020-04-15', 'রাজধানীর ওয়ারীতে সর্বাধিক করোনায় আক্রান্ত', 'https://www.ntvbd.com/sites/default/files/styles/social_share/public/images/2020/04/09/dhaka.jpg?itok=1eQCE4Q_', 'https://www.ntvbd.com/bangladesh/%E0%A6%B0%E0%A6%BE%E0%A6%9C%E0%A6%A7%E0%A6%BE%E0%A6%A8%E0%A7%80%E0%A6%B0-%E0%A6%93%E0%A7%9F%E0%A6%BE%E0%A6%B0%E0%A7%80%E0%A6%A4%E0%A7%87-%E0%A6%B8%E0%A6%B0%E0%A7%8D%E0%A6%AC%E0%A6%BE%E0%A6%A7%E0%A6%BF%E0%A6%95-%E0%A6%95%E0', 'https://www.ntvbd.com'),
('2020-04-15', 'কোন জেলায় কতজন করোনায় আক্রান্ত হলো, জেনে নিন', 'https://www.ntvbd.com/sites/default/files/styles/social_share/public/images/2020/04/13/coronavirus-1.jpg?itok=k4m_eH2Z', 'https://www.ntvbd.com/bangladesh/%E0%A6%95%E0%A7%8B%E0%A6%A8-%E0%A6%9C%E0%A7%87%E0%A6%B2%E0%A6%BE%E0%A7%9F-%E0%A6%95%E0%A6%A4%E0%A6%9C%E0%A6%A8-%E0%A6%95%E0%A6%B0%E0%A7%8B%E0%A6%A8%E0%A6%BE%E0%A7%9F-%E0%A6%86%E0%A6%95%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%A8%E', 'https://www.ntvbd.com'),
('2020-04-15', '১৩ হাজার পরীক্ষায় মিলল হাজারো করোনা রোগী', 'https://www.ntvbd.com/sites/default/files/styles/social_share/public/images/2020/04/14/iedcr-1.jpg?itok=uq04iWmX', 'https://www.ntvbd.com/bangladesh/%E0%A7%A7%E0%A7%A9-%E0%A6%B9%E0%A6%BE%E0%A6%9C%E0%A6%BE%E0%A6%B0-%E0%A6%AA%E0%A6%B0%E0%A7%80%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%BE%E0%A7%9F-%E0%A6%AE%E0%A6%BF%E0%A6%B2%E0%A6%B2-%E0%A6%B9%E0%A6%BE%E0%A6%9C%E0%A6%BE%E0%A6%B0%E', 'https://www.ntvbd.com'),
('2020-04-15', '\nহাতেগোনা কিছু সামগ্রী বিতরণ আর ফটোসেশনে ব্যস্ত বিএনপি : হাছান মাহমুদ\n', '//paloimages.prothom-alo.com/contents/cache/images/400x225x1/uploads/media/2020/04/14/7f80482ad6eb66c5fef5c606ecbb13f4-5e95f731cd74e.jpg?jadewits_media_id=1525707', 'https://www.prothomalo.com/bangladesh/article/1650876/%E0%A6%B9%E0%A6%BE%E0%A6%A4%E0%A7%87%E0%A6%97%E0%A7%8B%E0%A6%A8%E0%A6%BE-%E0%A6%95%E0%A6%BF%E0%A6%9B%E0%A7%81-%E0%A6%B8%E0%A6%BE%E0%A6%AE%E0%A6%97%E0%A7%8D%E0%A6%B0%E0%A7%80-%E0%A6%AC%E0%A6%BF%E0%A6%A4', 'https://www.prothomalo.com'),
('2020-04-15', '\nকরোনার সময় বিনা খরচে সেবা দেবে ‘ভার্চ্যুয়াল হাসপাতাল’\n', '//paloimages.prothom-alo.com/contents/cache/images/400x225x1/uploads/media/2020/04/14/24d29897d54ee07e3664f8abad760238-5e95f600ab96a.jpg?jadewits_media_id=1525706', 'https://www.prothomalo.com/bangladesh/article/1650875/%E0%A6%95%E0%A6%B0%E0%A7%8B%E0%A6%A8%E0%A6%BE%E0%A6%B0-%E0%A6%B8%E0%A6%AE%E0%A7%9F-%E0%A6%AC%E0%A6%BF%E0%A6%A8%E0%A6%BE-%E0%A6%96%E0%A6%B0%E0%A6%9A%E0%A7%87-%E0%A6%B8%E0%A7%87%E0%A6%AC%E0%A6%BE-%E0%A6%', 'https://www.prothomalo.com'),
('2020-04-15', '\nজমি নিয়ে দুপক্ষের সংঘর্ষে নিহত ২\n', '//paloimages.prothom-alo.com/contents/cache/images/400x225x1/uploads/media/2016/09/14/84f256690589da22c0a7be24b9cace05-dinajpur.jpg?jadewits_media_id=671953', 'https://www.prothomalo.com/bangladesh/article/1650873/%E0%A6%9C%E0%A6%AE%E0%A6%BF-%E0%A6%A8%E0%A6%BF%E0%A7%9F%E0%A7%87-%E0%A6%A6%E0%A7%81%E0%A6%AA%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A7%87%E0%A6%B0-%E0%A6%B8%E0%A6%82%E0%A6%98%E0%A6%B0%E0%A7%8D%E0%A6%B7%E0%A7%87', 'https://www.prothomalo.com'),
('2020-04-15', '\nরাজধানীর ইনসাফ বারাকা হাসপাতাল লকডাউন\n', '//paloimages.prothom-alo.com/contents/cache/images/400x225x1/uploads/media/2020/04/14/fe09fe06550d1fae66f9b3d81f9323ef-5e95f40df194b.jpg?jadewits_media_id=1525704', 'https://www.prothomalo.com/bangladesh/article/1650872/%E0%A6%87%E0%A6%A8%E0%A6%B8%E0%A6%BE%E0%A6%AB-%E0%A6%AC%E0%A6%BE%E0%A6%B0%E0%A6%BE%E0%A6%95%E0%A6%BE-%E0%A6%B9%E0%A6%BE%E0%A6%B8%E0%A6%AA%E0%A6%BE%E0%A6%A4%E0%A6%BE%E0%A6%B2%E0%A7%87%E0%A6%B0-%E0%A6%9A', 'https://www.prothomalo.com'),
('2020-04-15', '\nদিনাজপুরে প্রথমবারের মতো ৭ জন করোনায় আক্রান্ত\n', '//paloimages.prothom-alo.com/contents/cache/images/400x225x1/uploads/media/2020/03/08/b10290a115406ade47885d119c13978b-5e65106799798.jpg?jadewits_media_id=1515628', 'https://www.prothomalo.com/bangladesh/article/1650868/%E0%A6%A6%E0%A6%BF%E0%A6%A8%E0%A6%BE%E0%A6%9C%E0%A6%AA%E0%A7%81%E0%A6%B0%E0%A7%87-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%A5%E0%A6%AE%E0%A6%AC%E0%A6%BE%E0%A6%B0%E0%A7%87%E0%A6%B0-%E0%A6%AE%E0%A6%A4%E0%A7%8B-', 'https://www.prothomalo.com'),
('2020-04-15', 'করোনাভাইরাস: বাংলাদেশে সংক্রমণ হাজার ছাড়াল, মৃত্যুও বেড়েছে', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/0179/production/_111777300_gettyimages-1209268023.jpg', 'https://www.bbc.com/bengali/news-52277617', 'https://www.bbc.com'),
('2020-04-15', 'করোনাভাইরাস: বাংলাদেশে সংক্রমণ চূড়ায় পৌঁছাবে কবে?', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/16965/production/_111771529_0e14f3e3-9e66-42a9-86aa-4a3e1a55e8b1.jpg', 'https://www.bbc.com/bengali/news-52270934', 'https://www.bbc.com'),
('2020-04-15', 'করোনাভাইরাসের কারণে হিমাগারে ইলিশের স্তূপ', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/4E81/production/_111779002_gettyimages-170504792.jpg', 'https://www.bbc.com/bengali/news-52277618', 'https://www.bbc.com'),
('2020-04-15', 'লকডাউন তুলে নেয়া নিয়ে রাজ্যগুলোর সঙ্গে প্রেসিডেন্ট ট্রাম্পের বিরোধ', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/122B2/production/_111781447_gettyimages-1218650098.jpg', 'https://www.bbc.com/bengali/news-52281513', 'https://www.bbc.com'),
('2020-04-15', 'করোনাভাইরাস: লকডাউনের মধ্যে একাকী তিন নারীর ঘরবন্দী জীবন', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/6AD4/production/_111784372_a3d5c661-83f8-4f3f-ac86-d8eba6005948.jpg', 'https://www.bbc.com/bengali/news-52286072', 'https://www.bbc.com'),
('2020-04-15', 'মুম্বাইয়ের রেলস্টেশনে পুলিশের লাঠিচার্জ - খবর, সর্বশেষ খবর, ব্রেকিং নিউজ | News, latest news, breaking news', 'https://news.files.bbci.co.uk/ws/img/logos/og/bengali.png', 'https://www.bbc.com/bengali/live/news-52269498', 'https://www.bbc.com'),
('2020-04-15', 'করোনাভাইরাস: ঝুঁকি বাড়ছে ডাক্তারদেরও', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/16C2C/production/_111782239_doc1.jpg', 'https://www.bbc.com/bengali/news-52283869', 'https://www.bbc.com'),
('2020-04-15', 'করোনাভাইরাস: কংগ্রেসের মতে মোদীর ঘোষণা \'দিশাহীন\', হতাশ শিল্প মহলও', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/16CEA/production/_111781439_whatsubject.jpg', 'https://www.bbc.com/bengali/news-52281881', 'https://www.bbc.com'),
('2020-04-15', 'করোনাভাইরাস: বাইরে থেকে ঘরে ঢুকতে কী সতর্কতা নেবেন?', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/1686B/production/_111776229_gettyimages-1209809298.jpg', 'https://www.bbc.com/bengali/news-52279291', 'https://www.bbc.com'),
('2020-04-15', 'আক্রান্ত বাবা-মা, আর পথে-হাসপাতালে সন্তানের বিভীষিকা', 'https://ichef.bbci.co.uk/news/1024/branded_bengali/14101/production/_111777128_gettyimages-1207348419.jpg', 'https://www.bbc.com/bengali/news-52277616', 'https://www.bbc.com');

-- --------------------------------------------------------

--
-- Table structure for table `dhakadata`
--

CREATE TABLE `dhakadata` (
  `Location` varchar(255) NOT NULL,
  `Freq.` int(11) NOT NULL,
  `Latitude` varchar(255) NOT NULL,
  `Longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dhakadata`
--

INSERT INTO `dhakadata` (`Location`, `Freq.`, `Latitude`, `Longitude`) VALUES
('Adabor', 5, '23.7711152', '90.3557741'),
('Agargaon', 2, '23.7811642', '90.3793618'),
('Armanitola', 1, '23.7132502', '90.40327982413443'),
('Ashkona', 1, '23.8540439', '90.4187945'),
('Azimpur', 6, '23.722900250000002', '90.38590560430791'),
('Babu Bazar', 11, '23.7121618', '90.4056942'),
('Badda', 6, '23.7935129', '90.4423712'),
('Baily Road', 3, '23.741307', '90.403885'),
('Banani', 8, '23.790321', '90.4076959'),
('Bangshal', 7, '23.7175341', '90.4078169'),
('Banianagar', 1, '0.0', '0.0'),
('Basabo', 14, '23.7410812', '90.4364365'),
('Bashundhora', 4, '22.05113625', '92.10898240793651'),
('Begunbari', 1, '23.7610926', '90.4053635'),
('Beribadh', 1, '23.7325617', '90.3625719'),
('Bosila', 1, '23.7337449', '90.3239417'),
('Buet Area', 1, '23.7259574', '90.3889212144622'),
('Central Road', 1, '23.7836351', '90.3969425'),
('Chankharpool', 2, '0.0', '0.0'),
('Chawk Bazar', 6, '22.3685212', '91.8302107'),
('Dhakkeshori', 1, '0.0', '0.0'),
('Dhanmondi', 16, '23.7593572', '90.3788136'),
('Dholaikhal', 1, '23.7105494', '90.4177793'),
('Doyaganj', 1, '0.0', '0.0'),
('Eskaton', 1, '23.746831', '90.4016967'),
('Farmgate', 1, '23.7593572', '90.3788136'),
('Gendaria', 12, '23.7017419', '90.4292622'),
('Green Road', 10, '23.7437581', '90.3845921'),
('Gulistan', 2, '23.7249491', '90.4120842'),
('Gulshan', 6, '23.789986749999997', '90.41162696284682'),
('Hatir jhil', 1, '23.7593572', '90.3788136'),
('Hatirpool', 3, '23.7417837', '90.3909892'),
('Hazaribagh', 8, '23.7363543', '90.3679624'),
('Islampur', 2, '23.7105078', '90.4053455'),
('Jailgate', 2, '23.2053142', '90.3514662'),
('Jatrabari', 19, '23.7104228', '90.4344666'),
('Jigatala', 4, '23.738649', '90.3708493'),
('Jurain', 1, '23.697178100000002', '90.42862477881545'),
('Kallyanpur', 1, '23.7806848', '90.3613321'),
('Kamrangir Char', 2, '23.708552', '90.3806081'),
('Kazi para', 1, '23.7973859', '90.375154'),
('Khilgaon', 1, '23.749702149999997', '90.41756573810491'),
('Kodomtoli', 1, '23.6850327', '90.4360043047327'),
('Kotowali', 2, '23.7065453', '90.4088572'),
('Kuril', 1, '23.8250753', '90.4218873'),
('Lalbagh', 18, '23.721128', '90.3862208'),
('Laxmibazar', 2, '0.0', '0.0'),
('Malibagh', 4, '23.7468668', '90.4155105'),
('Manikdi', 1, '23.8248086', '90.3936849'),
('Matuail', 1, '23.6932985', '90.4755745'),
('Mirhajaribagh', 2, '0.0', '0.0'),
('Mirpur-1', 6, '23.7983138', '90.35362923839398'),
('Mirpur-6', 2, '23.8122292', '90.3596698'),
('Mirpur-10', 6, '23.8073171', '90.3684551'),
('Mirpur-11', 11, '23.8207028', '90.3650245'),
('Mirpur-12', 10, '23.8254095', '90.3710484'),
('Mirpur-13', 2, '23.8122292', '90.3596698'),
('Mirpur-14', 5, '23.7986707', '90.3871115'),
('Mitford', 1, '23.71298265', '90.40101241856296'),
('Mogbazar', 10, '23.754373700000002', '90.40960178750615'),
('Mohakhali', 9, '23.7794534', '90.4045517'),
('Mohammadpur', 17, '23.76327225', '90.35982402380321'),
('Motijeel', 1, '0.0', '0.0'),
('Mugda', 1, '23.734213', '90.4368779'),
('Nawabpur', 1, '23.6761867', '89.5238064'),
('Narinda', 2, '23.710897', '90.4220765'),
('Nikunja', 1, '23.8242795', '90.4191806'),
('Pirerbagh', 2, '23.7855779', '90.3677402'),
('Purana Paltan', 2, '23.7383278', '90.4115892'),
('Rajarbagh', 6, '23.740494400000003', '90.41719264855735'),
('Rampura', 2, '23.7632414', '90.4348482'),
('Rayerbagh', 1, '0.0', '0.0'),
('Rayerbazar', 1, '23.74921435', '90.36153893381372'),
('Sabujbagh', 2, '0.0', '0.0'),
('Sayedabad', 1, '23.7152237', '90.42488016623244'),
('Shah Ali Bagh', 2, '23.7974702', '90.3563554'),
('Shahbag', 3, '23.7380681', '90.3960234'),
('Shakharibazar', 0, '0.0', '0.0'),
('Shantibagh', 1, '23.7441878', '90.4164725'),
('Shampur', 1, '23.6840321', '90.4360088'),
('Shantinagar', 6, '23.7416008', '90.4118658'),
('Shaymoli', 1, '23.7745217', '90.3656665'),
('Showari Ghat', 3, '23.7109701', '90.3943614'),
('Siddheshwari', 1, '23.7415099', '90.406936175'),
('Sonir akhra', 1, '23.7028544', '90.4508643'),
('Sutrapur', 6, '24.0799224', '90.1865732'),
('Tejgaon', 15, '23.7791044', '90.3840838'),
('Tolarbag', 19, '23.7593572', '90.3788136'),
('Urdu Road', 1, '23.7172232', '90.3957312');

-- --------------------------------------------------------

--
-- Table structure for table `iedcrdata`
--

CREATE TABLE `iedcrdata` (
  `Date` date NOT NULL,
  `TOTAL COVID-19 TESTS` int(11) NOT NULL,
  `LAST 24 Hours Test` int(11) NOT NULL,
  `Covid-19 Positive Cases` int(11) NOT NULL,
  `Last 24Hours Cases` int(11) NOT NULL,
  `Recovered` int(11) NOT NULL,
  `Death Cases` int(11) NOT NULL,
  `Recovery Rate` float NOT NULL,
  `Death Rate` float NOT NULL,
  `New Recoveries` int(11) NOT NULL,
  `Deaths in last 24 hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('2020-04-12', 9653, 1340, 621, 139, 39, 34, 6.28019, 5.47504, 3, 4),
('2020-04-13', 11223, 1570, 803, 182, 42, 39, 5.23039, 4.85679, 3, 5),
('2020-04-14', 13128, 1905, 1012, 209, 42, 46, 4.1502, 4.54545, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `regiondata`
--

CREATE TABLE `regiondata` (
  `Location` varchar(255) NOT NULL,
  `Freq.` int(11) NOT NULL,
  `Latitude` varchar(255) NOT NULL,
  `Longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regiondata`
--

INSERT INTO `regiondata` (`Location`, `Freq.`, `Latitude`, `Longitude`) VALUES
('Dhaka City', 456, '23.7593572', '90.3788136'),
('Dhaka District ', 28, '23.779814950000002', '90.36178191089084'),
('Gazipur', 53, '23.9980797', '90.4229848'),
('Kishoreganj', 17, '25.899303', '89.0169223'),
('Madaripur', 19, '23.1675473', '90.2049733'),
('Manikganj', 5, '23.83298355', '89.9666878246911'),
('Narayanganj', 164, '23.6238108', '90.4999662'),
('Munshigonj', 21, '23.5107641', '90.4680237'),
('Narshingdi', 28, '23.9131323', '90.7002246'),
('Rajbari', 6, '23.73983725', '89.5704133269708'),
('Faridpur', 2, '23.6040182', '89.8415542'),
('Tangail', 7, '24.2507265', '89.9149441'),
('Shariatpur', 5, '23.2132841', '90.3481247'),
('Gopalganj', 9, '23.0059418', '89.8263479'),
('Chattogram', 20, '22.3307998', '91.8412863'),
('Cox s bazar', 1, '0.0', '0.0'),
('Cumilla', 14, '23.9582189', '91.1097726'),
('B Baria', 8, '22.8673181', '89.863529'),
('Laksmipur', 1, '0.0', '0.0'),
('Chandpur', 6, '24.426694750000003', '91.96290920902106'),
('Moulovi Bazar', 2, '22.6030567', '90.6725398'),
('Sunamganj', 1, '25.0653149', '91.406908'),
('Hobiganj', 2, '0.0', '0.0'),
('Sylhet', 1, '24.59107805', '91.71773617004385'),
('Rangpur', 2, '25.837227', '88.97008543390905'),
('Gaibandha', 8, '25.0860006', '89.8696436'),
('Nilphamari', 4, '25.9339275', '88.8534588'),
('Lalmonirhat', 1, '25.9163848', '89.4461215'),
('Kurigram', 1, '25.8121378', '89.6441289'),
('Thakurgaon', 3, '26.0200532', '88.4694397'),
('Khulna', 1, '22.815139549999998', '89.44492672055918'),
('Narail', 1, '25.0748842', '90.391651'),
('Chuadanga', 1, '23.756870539623318', '88.94544633107863'),
('Mymensingh', 7, '24.8386014', '90.41126950462677'),
('Jamalpur', 9, '24.9277076', '89.9478205'),
('Netrokona', 2, '24.8853398', '90.7326247'),
('Sherpur', 3, '25.0227686', '90.0060793'),
('Barguna', 3, '22.157833', '90.12949481850049'),
('Barishal', 7, '22.7562851', '90.41098391553726'),
('Potuakhali', 2, '23.7727014', '90.3486932'),
('Pirojpur', 1, '22.50956015', '90.00725950308801'),
('Jhalokathi', 3, '22.5623905', '90.17429268473443'),
('Rajshahi', 3, '24.5390275', '88.93844161614119');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
