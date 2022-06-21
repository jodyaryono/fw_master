-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6219
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table fw-master.admin_groups
CREATE TABLE IF NOT EXISTS `admin_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.admin_groups: ~6 rows (approximately)
/*!40000 ALTER TABLE `admin_groups` DISABLE KEYS */;
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
	(1, 'webmaster', 'Webmaster');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
	(11, 'admin', 'Administrator');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
	(12, 'assesor', 'Asesor');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
	(13, 'admin_tuk', 'ADMIN TUK');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
	(14, 'peserta', 'Peserta');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
	(15, 'pantek', 'Pantek');
/*!40000 ALTER TABLE `admin_groups` ENABLE KEYS */;

-- Dumping structure for table fw-master.admin_login_attempts
CREATE TABLE IF NOT EXISTS `admin_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.admin_login_attempts: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_login_attempts` ENABLE KEYS */;

-- Dumping structure for table fw-master.admin_users
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.admin_users: ~4 rows (approximately)
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES
	(1, '127.0.0.1', 'webmaster', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', NULL, NULL, NULL, NULL, NULL, NULL, 1451900190, 1594628963, 1, 'Webmaster', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES
	(2, '127.0.0.1', 'admin', '$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW', NULL, NULL, NULL, NULL, NULL, NULL, 1451900228, 1465489580, 1, 'Admin', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES
	(3, '127.0.0.1', 'manager', '$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa', NULL, NULL, NULL, NULL, NULL, NULL, 1451900430, 1531790898, 1, 'Manager', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES
	(4, '127.0.0.1', 'staff', '$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6', NULL, NULL, NULL, NULL, NULL, NULL, 1451900439, 1465489590, 1, 'Staff', NULL);
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES
	(5, '::1', 'observer', '$2y$08$16kdP9SbQFi.HMHgPB.PPOGFfjMa471MeOLFsEr9cRz21FIqtwgXO', NULL, NULL, NULL, NULL, NULL, NULL, 1531506497, NULL, 1, 'OBSERVER', 'ALMARJAN');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

-- Dumping structure for table fw-master.admin_users_groups
CREATE TABLE IF NOT EXISTS `admin_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.admin_users_groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `admin_users_groups` DISABLE KEYS */;
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
	(1, 1, 1);
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
	(2, 2, 2);
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
	(3, 3, 3);
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
	(4, 4, 4);
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
	(5, 4, 5);
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
	(6, 5, 4);
/*!40000 ALTER TABLE `admin_users_groups` ENABLE KEYS */;

-- Dumping structure for table fw-master.api_access
CREATE TABLE IF NOT EXISTS `api_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.api_access: ~0 rows (approximately)
/*!40000 ALTER TABLE `api_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_access` ENABLE KEYS */;

-- Dumping structure for table fw-master.api_keys
CREATE TABLE IF NOT EXISTS `api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.api_keys: ~0 rows (approximately)
/*!40000 ALTER TABLE `api_keys` DISABLE KEYS */;
INSERT INTO `api_keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
	(1, 0, 'anonymous', 1, 1, 0, NULL, 1463388382);
/*!40000 ALTER TABLE `api_keys` ENABLE KEYS */;

-- Dumping structure for table fw-master.api_limits
CREATE TABLE IF NOT EXISTS `api_limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.api_limits: ~0 rows (approximately)
/*!40000 ALTER TABLE `api_limits` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_limits` ENABLE KEYS */;

-- Dumping structure for table fw-master.api_logs
CREATE TABLE IF NOT EXISTS `api_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.api_logs: ~0 rows (approximately)
/*!40000 ALTER TABLE `api_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_logs` ENABLE KEYS */;

-- Dumping structure for table fw-master.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `headline_id` tinytext,
  `headline_jp` tinytext CHARACTER SET utf8,
  `content_id` text,
  `content_jp` text CHARACTER SET utf8,
  `updatetime` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table fw-master.articles: ~2 rows (approximately)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `headline_id`, `headline_jp`, `content_id`, `content_jp`, `updatetime`, `user_id`) VALUES
	(1, 'Banjir Meme Lucu Jerman Dilibas Korsel', ' テストコンテンツ', '<p><a href="https://inet.detik.com/fotoinet/d-4087155/banjir-meme-lucu-jerman-dilibas-korsel?_ga=2.114805636.2000521913.1530092963-1820897464.1527539558" style="font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 30px; background-color: rgb(255, 255, 255);">Banjir Meme Lucu Jerman Dilibas Korsel</a></p>\r\n<p>\r\n	<strong>detikInet | Kamis, 28 Jun 2018 06:40 WIB</strong></p>\r\n<p>\r\n	Meme lucu masih terus banjir di media sosial pasca kekalahan Jerman dari Korea Selatan yang membuat sang juara bertahan tersingkir dari Piala Dunia 2018.</p>\r\n<p>\r\n	<img alt="" src="https://akcdn.detik.net.id/community/media/visual/2018/06/28/d6cc0c8d-8c4b-492e-bd31-449d61d74aeb.png?w=780&amp;q=90" style="width: 200px; height: 199px;"></p>\r\n<p>\r\n	<img alt="" src="https://inet.detik.com/fotoinet/d-4087155/banjir-meme-lucu-jerman-dilibas-korsel?_ga=2.102166018.2000521913.1530092963-1820897464.1527539558"></p>\r\n', '<div>\r\n	悲惨な洪水ミームドイツ南部を打ち負かす</div>\r\n<div>\r\n	detikInet | 木曜日、2018年6月28日06:40 WIB</div>\r\n<div>\r\n	 </div>\r\n<div>\r\n	2018年のワールドカップでディフェンディングチャンピオンを排除した韓国からのドイツの敗北の後、ソーシャルメディアで悲しいままになったミーム。</div>\r\n<div>\r\n	<img alt="" src="https://akcdn.detik.net.id/community/media/visual/2018/06/28/d6cc0c8d-8c4b-492e-bd31-449d61d74aeb.png?w=780&q=90" style="width: 200px; height: 199px;" /></div>\r\n<p>\r\n	 </p>\r\n', '2018-07-03 11:36:25', 1);
INSERT INTO `articles` (`id`, `headline_id`, `headline_jp`, `content_id`, `content_jp`, `updatetime`, `user_id`) VALUES
	(2, 'Test berita menyambut KORBAN', 'テストニュース歓迎Qurban', '<p>\r\n	Berita utama ini cukup penting bagi anda dan perlu anda ketahui</p>\r\n<p>\r\n	<img alt="" src="http://localhost/fw-master/assets/uploads/134a9-Ciri-ciri-Hewan-Kurban-Yang-Baik.png" style="width: 300px; height: 183px;" /></p>\r\n', '<p>\r\n	この見出しはあなたにとって非常に重要で、あなたは知る必要があります この見出しはあなたにとって非常に重要で、あなたは知る必要があります</p>\r\n<p>\r\n	<img alt="" src="http://localhost/fw-master/assets/uploads/134a9-Ciri-ciri-Hewan-Kurban-Yang-Baik.png" style="width: 300px; height: 183px;" /></p>\r\n<p>\r\n	 </p>\r\n', '2018-07-03 22:22:05', 1);
INSERT INTO `articles` (`id`, `headline_id`, `headline_jp`, `content_id`, `content_jp`, `updatetime`, `user_id`) VALUES
	(3, 'Test berita utama dari jepang', '日本のニュースの見出しをテストする', '<p>\r\n	Kami melaporkan berita di Indonesia sesegera mungkin dalam bahasa Jepang, dan juga memposting berita yang terkait dengan Jepang dan India. Dari informasi tentang supermarket makanan Jepang hingga berita komunitas dan panduan acara dari masyarakat Jepang, kami memberikan informasi yang berguna untuk kehidupan pembaca Jepang</p>\r\n', '<p>\r\n	できるだけ早くインドネシアでのニュースを日本語で、また日本とインドに関するニュースを掲載しています。 日本の食品スーパーマーケットから、日本社会のコミュニティニュースやイベントガイドまで、日本の読者の生活に役立つ情報を提供しています</p>\r\n', '2018-06-27 22:46:47', 1);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Dumping structure for table fw-master.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.groups: ~0 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'members', 'General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table fw-master.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table fw-master.jurusan: ~2 rows (approximately)
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` (`id`, `nama`) VALUES
	(1, 'FISIP');
INSERT INTO `jurusan` (`id`, `nama`) VALUES
	(2, 'MATEMATIKA');
INSERT INTO `jurusan` (`id`, `nama`) VALUES
	(3, 'KOMPUTER');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;

-- Dumping structure for table fw-master.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.login_attempts: ~0 rows (approximately)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Dumping structure for table fw-master.log_action
CREATE TABLE IF NOT EXISTS `log_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime_event` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `detail` mediumtext,
  `ip` varchar(55) NOT NULL,
  `page` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2725 DEFAULT CHARSET=latin1;

-- Dumping data for table fw-master.log_action: 56 rows
/*!40000 ALTER TABLE `log_action` DISABLE KEYS */;
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2669, '2018-07-17 10:33:23', 1, 'Jenis Kelamin', 'Tambah Data:Jenis Kelamin', '::1', 80);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2670, '2018-07-17 10:34:27', 1, 'Jenis Kelamin', 'Hapus Data:Jenis Kelamin', '::1', 81);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2671, '2018-07-17 10:41:52', 1, 'Jenis Kelamin', 'Tambah Data:Jenis Kelamin', '::1', 82);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2672, '2018-07-17 10:42:20', 1, 'Jenis Kelamin', 'Hapus Data:Jenis Kelamin', '::1', 83);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2673, '2018-07-17 11:15:41', 1, 'Jenis Kelamin', 'Tambah Data:Jenis Kelamin', '::1', 84);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2674, '2018-07-17 11:15:47', 1, 'Jenis Kelamin', 'Hapus Data:Jenis Kelamin', '::1', 85);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2675, '2018-07-17 22:51:54', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 86);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2676, '2018-07-17 22:52:32', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 87);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2677, '2018-07-17 22:57:32', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 88);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2678, '2018-07-17 22:58:14', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 89);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2679, '2018-07-17 22:59:35', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 90);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2680, '2018-07-17 23:03:17', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 91);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2681, '2018-07-17 23:06:10', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 92);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2682, '2018-07-17 23:07:26', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 93);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2683, '2018-07-17 23:09:24', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 94);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2684, '2018-07-17 23:14:06', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 95);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2685, '2018-07-17 23:15:45', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 96);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2686, '2018-07-17 23:18:01', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 97);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2687, '2018-07-17 23:21:38', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 98);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2688, '2018-07-17 23:25:52', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 99);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2689, '2018-07-17 23:25:57', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 100);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2690, '2018-07-17 23:28:39', 1, 'Jenis Kelamin', 'Merubah Data:Jenis Kelamin', '::1', 101);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2691, '2018-07-18 08:58:34', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2692, '2018-07-18 14:28:59', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2693, '2018-07-22 11:34:09', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2694, '2018-07-22 16:31:15', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2695, '2018-07-22 16:49:44', 1, 'Login Out', 'Log Out System ', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2696, '2018-08-25 05:57:38', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2697, '2018-08-25 09:13:39', 1, 'Media', 'Tambah Data:Media', '::1', 102);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2698, '2018-08-25 09:16:08', 1, 'Media', 'Hapus Data:Media', '::1', 103);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2699, '2018-08-25 11:46:27', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2700, '2018-11-08 22:47:46', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '127.0.0.1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2701, '2018-12-13 21:20:24', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2702, '2019-06-13 09:03:40', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2703, '2019-07-31 11:35:50', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2704, '2019-09-03 06:35:37', 0, 'Login Out', 'Log Out System ', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2705, '2019-09-03 06:35:51', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2706, '2019-09-03 06:45:42', 1, 'Login System', '<p>Log In Berhasil</p> member@member.com', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2707, '2019-09-03 06:58:43', 1, 'Login System', '<p>Log In Berhasil</p> member@member.com', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2708, '2019-09-10 04:26:29', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2709, '2019-09-18 11:57:38', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2710, '2019-09-18 11:58:14', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2711, '2019-09-18 11:58:32', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2712, '2020-01-12 22:40:07', 0, 'Login System', '<p>Log In Gagal</p> indentity:admin@example.com', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2713, '2020-01-14 06:23:57', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2714, '2020-01-14 13:13:15', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2715, '2020-01-14 22:53:40', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2716, '2020-01-15 04:09:09', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2717, '2020-01-17 07:11:41', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2718, '2020-01-17 07:39:07', 1, 'Login Out', 'Log Out System ', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2719, '2020-01-17 07:39:14', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2720, '2020-01-17 07:39:57', 1, 'Login Out', 'Log Out System ', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2721, '2020-01-17 07:40:02', 0, 'Login System', '<p>Log In Gagal</p> indentity:webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2722, '2020-01-17 07:40:09', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2723, '2020-01-17 07:40:41', 1, 'Login Out', 'Log Out System ', '::1', 0);
INSERT INTO `log_action` (`id`, `datetime_event`, `user_id`, `action`, `detail`, `ip`, `page`) VALUES
	(2724, '2020-01-17 07:40:47', 1, 'Login System', '<p>Log In Berhasil</p> webmaster', '::1', 0);
/*!40000 ALTER TABLE `log_action` ENABLE KEYS */;

-- Dumping structure for table fw-master.log_change
CREATE TABLE IF NOT EXISTS `log_change` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime_event` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `old` mediumtext,
  `new` mediumtext,
  `ip` varchar(55) NOT NULL,
  `page` int(11) DEFAULT '0' COMMENT '0:frontend;1:backend',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table fw-master.log_change: 24 rows
/*!40000 ALTER TABLE `log_change` DISABLE KEYS */;
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(80, '2018-07-17 10:33:23', 1, 'Tambah Jenis Kelamin', 'N/A', 'Array\n(\n    [jenis_kelamin] => RETESTE\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(81, '2018-07-17 10:34:27', 1, 'Edit Jenis Kelamin', '', '', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(82, '2018-07-17 10:41:52', 1, 'Tambah Jenis Kelamin', 'N/A', 'Array\n(\n    [jenis_kelamin] => TESTER\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(83, '2018-07-17 10:42:20', 1, 'Hapus Jenis Kelamin', '', '', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(84, '2018-07-17 11:15:41', 1, 'Tambah Jenis Kelamin', 'N/A', 'Array\n(\n    [jenis_kelamin] => ALAYERS\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(85, '2018-07-17 11:15:47', 1, 'Hapus Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 10\n            [jenis_kelamin] => ALAYERS\n        )\n\n)\n', '', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(86, '2018-07-17 22:51:54', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 2\n            [jenis_kelamin] => PEREMPUAN\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => PEREMPUANX\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(87, '2018-07-17 22:52:32', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 2\n            [jenis_kelamin] => PEREMPUANX\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => PEREMPUAN\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(88, '2018-07-17 22:57:32', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 2\n            [jenis_kelamin] => PEREMPUAN\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => PEREMPUANX\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(89, '2018-07-17 22:58:14', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 2\n            [jenis_kelamin] => PEREMPUANX\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => PEREMPUAN\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(90, '2018-07-17 22:59:35', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 2\n            [jenis_kelamin] => PEREMPUAN\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => PEREMPUAN\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(91, '2018-07-17 23:03:17', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 1\n            [jenis_kelamin] => LAKI-LAKI\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => LAKI-LAKIX\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(92, '2018-07-17 23:06:10', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 1\n            [jenis_kelamin] => LAKI-LAKIX\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => LAKI-LAKI\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(93, '2018-07-17 23:07:26', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => stdClass Object\n        (\n            [id] => 1\n            [jenis_kelamin] => LAKI-LAKI\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => LAKI-LAKIX\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(94, '2018-07-17 23:09:24', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 1\n            [jenis_kelamin] => LAKI-LAKIX\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => LAKI-LAKI\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(95, '2018-07-17 23:14:06', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 1\n            [jenis_kelamin] => LAKI-LAKI\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => LAKI-LAKIX\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(96, '2018-07-17 23:15:45', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 1\n            [jenis_kelamin] => LAKI-LAKIX\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => LAKI-LAKIX\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(97, '2018-07-17 23:18:01', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 1\n            [jenis_kelamin] => LAKI-LAKIX\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => LAKI-LAKI\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(98, '2018-07-17 23:21:38', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 1\n            [jenis_kelamin] => LAKI-LAKI\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => LAKI-LAKIX\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(99, '2018-07-17 23:25:52', 1, 'Edit Jenis Kelamin', 'Array\n(\n)\n', 'Array\n(\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(100, '2018-07-17 23:25:57', 1, 'Edit Jenis Kelamin', 'Array\n(\n)\n', 'Array\n(\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(101, '2018-07-17 23:28:39', 1, 'Edit Jenis Kelamin', 'Array\n(\n    [0] => Array\n        (\n            [id] => 1\n            [jenis_kelamin] => LAKI-LAKI\n        )\n\n)\n', 'Array\n(\n    [jenis_kelamin] => LAKI-LAKIX\n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(102, '2018-08-25 09:13:39', 1, 'Tambah Media', 'N/A', 'Array\n(\n    [s572d4e42] => \n    [url] => e7b99-hae.png\n    [title] => \n    [order] => \n)\n', '::1', 0);
INSERT INTO `log_change` (`id`, `datetime_event`, `user_id`, `action`, `old`, `new`, `ip`, `page`) VALUES
	(103, '2018-08-25 09:16:07', 1, 'Hapus Media', 'Array\n(\n    [0] => Array\n        (\n            [id] => 3\n            [url] => e7b99-hae.png\n            [title] => \n            [order] => \n        )\n\n)\n', '', '::1', 0);
/*!40000 ALTER TABLE `log_change` ENABLE KEYS */;

-- Dumping structure for table fw-master.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jurusan` int(11) NOT NULL DEFAULT '0',
  `nim` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `telp` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table fw-master.mahasiswa: ~2 rows (approximately)
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` (`id`, `id_jurusan`, `nim`, `nama`, `telp`, `tgl_lahir`, `keterangan`) VALUES
	(1, 3, '12345', 'ALI', 89298214, '2019-10-15', NULL);
INSERT INTO `mahasiswa` (`id`, `id_jurusan`, `nim`, `nama`, `telp`, `tgl_lahir`, `keterangan`) VALUES
	(2, 2, '32423423', 'Test 1234', 1234567, '2019-10-18', NULL);
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

-- Dumping structure for table fw-master.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `width` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table fw-master.media: ~0 rows (approximately)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id`, `identifier`, `file_url`, `width`, `height`) VALUES
	(1, 'logo', 'c3d3d-framework_master_orange.png', 220, NULL);
INSERT INTO `media` (`id`, `identifier`, `file_url`, `width`, `height`) VALUES
	(2, 'small_logo', '51ec5-framework_master_light.png', 80, 50);
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Dumping structure for table fw-master.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  `menu_icon` varchar(255) DEFAULT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `menu_sequence` varchar(100) NOT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table fw-master.menu: ~6 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_url`, `menu_icon`, `menu_parent_id`, `menu_sequence`) VALUES
	(1, 'Menu 1', '#', NULL, 3, '3.2');
INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_url`, `menu_icon`, `menu_parent_id`, `menu_sequence`) VALUES
	(2, 'Menu 2', '#', NULL, NULL, '1');
INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_url`, `menu_icon`, `menu_parent_id`, `menu_sequence`) VALUES
	(3, 'Menu 3', '#', NULL, 2, '2.1');
INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_url`, `menu_icon`, `menu_parent_id`, `menu_sequence`) VALUES
	(4, 'Menu 4', '#', NULL, 3, '3.3');
INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_url`, `menu_icon`, `menu_parent_id`, `menu_sequence`) VALUES
	(5, 'Menu 5', '#', NULL, NULL, '2');
INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_url`, `menu_icon`, `menu_parent_id`, `menu_sequence`) VALUES
	(6, 'Menu 6', '#', NULL, 5, '5.1');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table fw-master.site_access
CREATE TABLE IF NOT EXISTS `site_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime_event` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_id` int(11) DEFAULT NULL,
  `ip` varchar(55) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18013 DEFAULT CHARSET=latin1;

-- Dumping data for table fw-master.site_access: 152 rows
/*!40000 ALTER TABLE `site_access` DISABLE KEYS */;
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17995, '2019-09-03 07:01:38', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17994, '2019-09-03 07:01:05', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17993, '2019-09-03 07:00:16', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17992, '2019-09-03 06:59:56', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17991, '2019-09-03 06:58:44', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17990, '2019-09-03 06:57:25', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17989, '2019-09-03 06:56:15', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17988, '2019-09-03 06:45:43', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17987, '2019-09-03 06:24:24', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17986, '2019-09-03 06:19:10', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17985, '2019-09-03 06:18:23', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17984, '2019-09-03 05:58:51', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17983, '2019-09-02 06:00:14', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17982, '2019-08-27 09:27:07', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17981, '2019-07-31 11:35:38', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17980, '2019-06-21 06:09:09', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17979, '2019-06-14 00:52:09', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17978, '2019-06-14 00:25:01', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17977, '2019-06-13 09:03:24', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17976, '2019-05-20 23:11:23', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17975, '2019-05-12 07:35:04', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17974, '2018-11-08 22:47:35', 0, '127.0.0.1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17973, '2018-09-09 07:51:14', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17972, '2018-08-25 23:11:49', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17971, '2018-08-25 23:03:10', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17970, '2018-08-25 23:01:35', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17969, '2018-08-25 23:01:25', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17968, '2018-08-25 23:00:45', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17967, '2018-08-25 22:57:23', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17966, '2018-08-25 22:48:11', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17965, '2018-08-25 20:31:07', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17964, '2018-08-25 17:56:23', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17963, '2018-08-25 17:55:37', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17962, '2018-08-25 17:53:50', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17961, '2018-08-25 17:25:03', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17960, '2018-08-25 17:21:42', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17959, '2018-08-25 17:20:47', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17958, '2018-08-25 17:20:20', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17957, '2018-08-25 17:13:14', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17956, '2018-08-25 17:10:00', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17955, '2018-08-25 17:04:54', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17954, '2018-08-25 17:04:24', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17953, '2018-08-25 16:58:58', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17952, '2018-08-25 16:57:14', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17951, '2018-08-25 16:56:55', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17950, '2018-08-25 16:56:39', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17949, '2018-08-25 16:53:04', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17948, '2018-08-25 16:52:48', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17947, '2018-08-25 16:51:28', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17946, '2018-08-25 16:50:29', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17945, '2018-08-25 16:50:04', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17944, '2018-08-25 16:47:52', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17943, '2018-08-25 16:47:25', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17942, '2018-08-25 16:46:20', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17941, '2018-08-25 16:45:22', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17940, '2018-08-25 16:42:59', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17939, '2018-08-25 16:41:29', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17938, '2018-08-25 16:39:18', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17937, '2018-08-25 16:36:31', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17936, '2018-08-25 16:35:11', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17935, '2018-08-25 16:32:54', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17934, '2018-08-25 16:31:33', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17933, '2018-08-25 16:23:32', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17932, '2018-08-25 16:22:28', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17931, '2018-08-25 16:20:18', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17930, '2018-08-25 16:14:30', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17929, '2018-08-25 16:06:06', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17928, '2018-08-25 16:05:44', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17927, '2018-08-25 16:05:06', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17926, '2018-08-25 16:04:23', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17925, '2018-08-25 16:03:51', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17924, '2018-08-25 16:02:55', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17923, '2018-08-25 16:02:32', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17922, '2018-08-25 16:02:09', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17921, '2018-08-25 16:01:48', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17920, '2018-08-25 16:01:26', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17919, '2018-08-25 16:00:47', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17918, '2018-08-25 16:00:20', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17917, '2018-08-25 15:59:55', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17916, '2018-08-25 15:59:38', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17915, '2018-08-25 15:59:16', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17914, '2018-08-25 15:58:44', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17913, '2018-08-25 15:58:15', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17912, '2018-08-25 15:57:45', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17911, '2018-08-25 15:53:32', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17910, '2018-08-25 15:53:03', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17909, '2018-08-25 15:50:04', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17908, '2018-08-25 15:49:33', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17907, '2018-08-25 15:48:58', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17906, '2018-08-25 15:48:24', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17905, '2018-08-25 15:46:03', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17904, '2018-08-25 15:45:46', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17903, '2018-08-25 15:22:01', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17902, '2018-08-25 15:17:50', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17901, '2018-08-25 15:17:44', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17900, '2018-08-25 15:16:33', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17899, '2018-08-25 15:14:22', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17898, '2018-08-25 15:11:22', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17897, '2018-08-25 15:10:50', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17896, '2018-08-25 15:10:42', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17895, '2018-08-25 15:08:59', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17894, '2018-08-25 15:08:29', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17893, '2018-08-25 15:05:05', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17892, '2018-08-25 15:03:57', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17891, '2018-08-25 15:02:58', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17890, '2018-08-25 14:57:42', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17889, '2018-08-25 14:55:52', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17888, '2018-08-25 14:54:12', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17887, '2018-08-25 14:53:17', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17886, '2018-08-25 14:53:09', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17885, '2018-08-25 14:52:35', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17884, '2018-08-25 14:50:43', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17883, '2018-08-25 14:45:32', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17882, '2018-08-25 14:37:30', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17881, '2018-08-25 14:37:18', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17880, '2018-08-25 14:35:34', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17879, '2018-08-25 14:32:48', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17878, '2018-08-25 14:32:40', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17877, '2018-08-25 14:32:19', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17876, '2018-08-25 14:29:13', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17875, '2018-08-25 14:19:43', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17874, '2018-08-25 14:19:38', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17873, '2018-08-25 14:19:27', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17872, '2018-08-25 13:08:06', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17871, '2018-08-25 07:03:08', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17870, '2018-08-25 07:03:04', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17869, '2018-08-25 07:02:58', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17868, '2018-08-25 07:00:29', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17867, '2018-08-25 07:00:26', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17866, '2018-08-25 07:00:22', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17865, '2018-08-25 07:00:15', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17864, '2018-08-25 06:58:23', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17863, '2018-08-25 06:58:19', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17862, '2018-08-25 06:52:20', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17861, '2018-08-25 06:31:57', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17996, '2019-09-03 07:09:24', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17997, '2019-09-03 07:10:36', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17998, '2019-09-03 07:11:22', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(17999, '2019-09-03 07:12:25', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18000, '2019-09-08 09:27:41', 0, '::1', 1);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18001, '2019-09-08 15:07:54', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18002, '2019-09-10 04:26:16', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18003, '2019-09-10 04:32:01', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18004, '2019-09-10 05:29:12', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18005, '2019-09-10 05:45:42', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18006, '2019-09-18 11:57:28', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18007, '2020-01-12 22:39:54', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18008, '2020-01-14 06:23:43', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18009, '2020-01-14 13:13:00', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18010, '2020-01-14 22:53:22', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18011, '2020-01-15 04:08:57', 0, '::1', 0);
INSERT INTO `site_access` (`id`, `datetime_event`, `page_id`, `ip`, `user_id`) VALUES
	(18012, '2020-02-03 17:50:29', 0, '::1', 0);
/*!40000 ALTER TABLE `site_access` ENABLE KEYS */;

-- Dumping structure for table fw-master.site_map
CREATE TABLE IF NOT EXISTS `site_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(55) DEFAULT NULL,
  `access` int(11) DEFAULT '0' COMMENT '0:frontend;1:backend',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table fw-master.site_map: 2 rows
/*!40000 ALTER TABLE `site_map` DISABLE KEYS */;
INSERT INTO `site_map` (`id`, `page`, `access`) VALUES
	(1, 'Home', 0);
INSERT INTO `site_map` (`id`, `page`, `access`) VALUES
	(2, 'Home', 1);
/*!40000 ALTER TABLE `site_map` ENABLE KEYS */;

-- Dumping structure for table fw-master.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
	(1, '127.0.0.1', 'member', '$2y$08$AeMD2FZhBxazgujFO1kGtOLFV1cB0qH.DC6C9UWASn2SUqQijEHsy', NULL, 'member@member.com', NULL, NULL, NULL, NULL, 1451903855, 1567468723, 1, 'Member', 'One', NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table fw-master.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table fw-master.users_groups: ~0 rows (approximately)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(1, 1, 1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
