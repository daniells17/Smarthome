-- phpMyAdmin SQL Dump
-- version 4.1.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 07, 2019 at 05:22 PM
-- Server version: 5.1.67-andiunpam
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doubleceg`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `api` varchar(200) NOT NULL,
  `event` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cam`
--

CREATE TABLE IF NOT EXISTS `cam` (
  `cam_id` int(3) NOT NULL AUTO_INCREMENT,
  `area` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`cam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cam`
--

INSERT INTO `cam` (`cam_id`, `area`, `ip`) VALUES
(1, 'Cam 1 - Living Room', '192.168.0.2'),
(2, 'Cam 2 - Kitchent', '192.168.0.3'),
(3, 'Cam 3 - Carpot', '192.168.0.5'),
(4, 'Cam 4 - Washing', '192.168.0.4');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `header` varchar(20) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `slogan` varchar(30) NOT NULL,
  `url` varchar(200) NOT NULL,
  `akhir` varchar(200) NOT NULL,
  `weather` text NOT NULL,
  `location` varchar(100) NOT NULL,
  `keyboard` varchar(50) NOT NULL,
  `height_iframe` varchar(5) NOT NULL,
  `refresh` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`header`, `nama_file`, `slogan`, `url`, `akhir`, `weather`, `location`, `keyboard`, `height_iframe`, `refresh`) VALUES
('DoubleCEG', 'Mount sky.jpg', 'Smart Home', 'xxx(''http://192.168.0.53:7474/?cmd={%22api_id%22:1004,%22command%22:%22send_code%22,%22mac%22:%2234:ea:34:e4:7f:76%22,%22data%22:%22', '%22}'')', 'https://forecast7.com/en/n6d45106d68/ciseeng/', 'Ciseeng Bogor', 'Non Aktif', '95', 180);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `info_id` int(3) NOT NULL AUTO_INCREMENT,
  `menu_info` varchar(20) NOT NULL,
  `ket_info` varchar(200) NOT NULL,
  PRIMARY KEY (`info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`info_id`, `menu_info`, `ket_info`) VALUES
(1, 'Alexa', 'Echo works with devices such as Lights, Switches, TVs, Air conditioner, Sonoff, etc'),
(2, 'Smarthome Control', 'Alexa, Sonoff, Orvibo, Broadlink, Hikvision, etc'),
(3, 'Sonoff', 'Then you can remote control your home appliances from anywhere at any time.');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(3) NOT NULL AUTO_INCREMENT,
  `menu` varchar(20) NOT NULL,
  `menu_logo` varchar(200) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu`, `menu_logo`) VALUES
(1, 'Lighting', '28092018021352light-bulb128.png'),
(2, 'Socket', '28092018021245socket128.png'),
(3, 'Remote', '28092018021422remote-control128.png');

-- --------------------------------------------------------

--
-- Table structure for table `plugin`
--

CREATE TABLE IF NOT EXISTS `plugin` (
  `plugin_id` int(3) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(20) NOT NULL,
  `plugin_logo` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`plugin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `plugin`
--

INSERT INTO `plugin` (`plugin_id`, `plugin`, `plugin_logo`, `address`, `status`) VALUES
(1, 'IP Cam', '29012019165114cctv128.png', '../plugin/ipcam.php?halaman=3', 'Enable'),
(2, 'Music', '29012019165312music128.png', 'http://www.joox.com', 'Enable'),
(3, 'Alarm', '29012019165341alarm-clock128.png', '../plugin/alarm.html', 'Enable'),
(4, 'Calendar', '29012019165411calendar128.png', '../plugin/calendar.php', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `pro_pengguna`
--

CREATE TABLE IF NOT EXISTS `pro_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipe` int(1) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pro_pengguna`
--

INSERT INTO `pro_pengguna` (`id_pengguna`, `nama`, `username`, `password`, `tipe`) VALUES
(1, 'Daniells', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sublink`
--

CREATE TABLE IF NOT EXISTS `sublink` (
  `sublink_id` int(3) NOT NULL AUTO_INCREMENT,
  `submenu_id` int(3) NOT NULL,
  `sublink` varchar(20) NOT NULL,
  `sublink_url` text NOT NULL,
  `sublink_img` varchar(200) NOT NULL,
  `aktif` varchar(10) NOT NULL,
  PRIMARY KEY (`sublink_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `sublink`
--

INSERT INTO `sublink` (`sublink_id`, `submenu_id`, `sublink`, `sublink_url`, `sublink_img`, `aktif`) VALUES
(1, 3, 'Merah', '26005000000129941015111411150f15111412150e16101412391138103a12381238103a123812381016111313140e3a133812121338121213381237103a13140e16113810161138110005220001264d11000d050000000000000000', '29052019125446merah.png', 'Disable'),
(2, 3, 'Biru', '26005800000127961016101413140f15101413140f1511141238103a103913381139103a12381139103a13140e3a12150e1511141238121312150e3a12150e3a1238123810151139100005220001274d11000c580001274d10000d05', '29052019125551biru.png', 'Disable'),
(3, 3, 'Hijau', '2600580000012796101610141214101511131313101510151238103a10391338113910391338103a1039131310170e3a103a12150e3a12150e15103a103a12150e15113910151139100005220001274d10000c590001274d10000d05', '29052019125620hijau.png', 'Enable'),
(4, 3, 'Putih', '26005800000127961016101412131016101412141015111312391139103912391139103912391139101510141338111313131015103a10151139103a1213103a123811391015103a100005220001274d11000c580001274c12000d05', '29052019125645putih.png', 'Enable'),
(5, 3, 'Ungu', '260058000001299512131015111412131016101412141015103a10391239113910391239113910391313103a1213103a1238111412131015113910161039101610141239113811391200051d00012d4b10000c5a0001294b10000d05', '29052019125725ungu.png', 'Enable'),
(6, 3, 'Fade', '2600580000012994121213131015111313131015121214121039143712381039143711391039143712381039143713111412101510151312101510151312103a13371238103a1337110005210001284b13000c570001274c13000d05', '30052019190722random.png', 'Enable'),
(7, 3, 'Up', '260058000001279412151312131410141212141112141212143712371238143712371238143712371214121214371237123814121138141211381437121214121213123812131238120005200001284b13000c560001274d11000d05', '30052019190809up.png', 'Enable'),
(8, 3, 'Down', '26005800000127961016111313140e17101313140f15111314371139103914371138113815371237113914130f391437113811151138111511131437121214130f170f3910151139100005220001274c12000c570001274d10000d05', '30052019190836down.png', 'Enable'),
(9, 3, 'On/Off', '26005800000129961016101412131016101412131016101412391138113912391138113912391138101610141214101510141214103912141039133811391039123911391015103a100005220001274c11000c580001274d11000d05', '30052019190904off-button.png', 'Enable'),
(10, 3, 'Flash', '26005000000126971015121214121015121313121015121313371337103a13371337103a13371337103a1312103a1312101511141312101612121338111313381237113913381237110005220001274c11000d050000000000000000', '30052019204534lightning.png', 'Disable'),
(11, 13, 'Vol+', '260058000001289413121213123812131114111312131213123813371312123713371337133713361312123813121312121312131213121312371312123813371337123713371337130005270001294a12000c590001294a13000d05', '30052019231914volume +.png', 'Enable'),
(12, 13, 'Vol-', '260050000001299413121212133713121312131213121312133713361312133713371337133613371337133713121213121312121312131212131312133713371237133713371337120005280001294a12000d050000000000000000', '30052019231934volume -.png', 'Enable'),
(13, 13, 'Mute', '260058000001299312131215103812151015101510141114103812381215103812381237123812381238121410151038121510151015101510151038123712131238123812381237120005280001294a12000c5a0001294a12000d05', '30052019231949mute.png', 'Enable'),
(14, 13, 'CH+', '260050000001299312131213123812131213111411141114113812381213123811381238123812381213111411131213121312131213121312381238113812381238123811381238120005280001294a12000d050000000000000000', '30052019232056up.png', 'Enable'),
(15, 13, 'CH-', '260050000001299411141213113812131213121312131213123811381213123812381138123812381238121312131213111312131213121312131238123812371238123812381237120005280001294a13000d050000000000000000', '30052019232114down.png', 'Enable'),
(16, 11, 'UP', '2600d6007b3e0f110e2f0f100f2e10100f2e10100e2f0f110e2f0f100f2e102f0f100f2e0f110e2f0f2f0f2f0f2f0f100f100f2e102e0f100f100f100f0f102e100f0f110e110e100f2f0f0f100f100f0f100f2f0f2f0f2f0f0f100f100f0f2f0f2f0f100f100f0f102e100f0f100f2f0f2f0f2f0f100f0f100f100f0f100f100f100f0f100f100f0f100f100f2f0f0f100f100f0f100f100f100f0f100f100f0f100f100f2f0f0f100f102e100f0f100f100f100f0f100f100f0f2f0f100f2f0f2e102e102e102e100f0f100f100f100f2e100f102e10000d050000', '30052019232718up.png', 'Enable'),
(17, 11, 'down', '2600d6007d3e100f102e100f0f2f0f100f2f0f0f102e100f102e0f100f2f0f2f0f100f2e100f102e102e102e0f2f0f100f100f2e102e100f100f0f100f100f2f0f0f100f100f102e0f100f100f100f0f100f102e102e0f2f0f100f100f0f102e102e100f100f0f100f2f0f100f0f102e102e102e100f0f100f100f0f100f100f100f0f100f100f0f100f100f102e0f100f100f0f100f100f100f0f100f100f0f100f100f102e100f0f100f2f0f0f100f100f100f0f100f100f0f102e100f102e102e102e0f2f0f2f0f100f0f100f102e100f100f0f2f0f000d050000', '30052019232737down.png', 'Enable'),
(18, 11, 'Swing', '2600d6007c3e100f102e100f0f2f0f100e2f0f100f2f0e110d310d120d310d310d110e300e110d310d310d310d310d120d110e300e300e110d120d120d120d300e110e110d120d310d310d120d110e110e110d310d310d310d120d120d110e300e300e110d120d120d300e110e110e300d310d310d120d120e100e110e110e110e110e110e100f2f0f2f0f2f0f2f0e110e110e110e100f100f100e110e110e110e100e110e300e110e300d310d120d110e110e110d120d120d120d300e110e300e300d310d310d310d120d120d110e110e300d310d310d000d050000', '30052019232753swing.png', 'Enable'),
(19, 11, 'Fan', '2600d6007c3e0f100f2f0f100f2e100f102e100f0f2f0f100f2f0f0f102e102e100f102e100f0f2f0f2f0f2f0f2f0f0f100f102e102e100f0f100f100f0f102e100f100f100f0f2f0f2f0f0f100f100f100f0f2f0f2f0f2f0f100f0f100f102e102e0f100f100f0f102e100f100f0f2f0f2f0f2f0f100f0f100f100f0f100f100f0f100f100f100f0f100f100f2f0f0f100f100f0f100f100f100f0f100f100f0f100f100f2f0f2e100f102e100f0f100f100f100f0f100f100f0f2f0f100f2f0f2f0f2e102e102e100f100f0f100f100f2f0f0f102e10000d050000', '30052019233111fan.png', 'Enable'),
(20, 3, 'Orange', '2600580000012a93121310161212131310151212131310151238103a1139103a103a11391238103a121310151238101512381015113910161237103a1312103a11141139111510391300052000012a4911000c5a00012a4910000d05', '31052019142750orange.png', 'Disable'),
(21, 13, 'Input', '2600580000012994121312131138121312131213121312131238123811141138123812381237123812381238121312371213121312131213121312131238121311381238123812381200052700012a4912000c5a0001294a11000d05', '0506201921530430052019190722random.png', 'Enable'),
(22, 11, 'Booster', '2600d6007c3e100f0f2f0f100f2f0f100f2e100f102e100f0f2f0f100f2f0f2f0f0f102e100f102e0f2f0f2f0f2f0f100f0f102e102e100f0f100f100f100f2e100f100f100f0f2f0f2f0f100f100f100f0f0f2f0f2f0f2f0f110e100f100f2e102e0f110e110e110e2f0f100f100f2e0f2f0f2f0f110e100f100f100e110e110e110e100f100f100e2f0f2f0f2f0f110e110e100f100e110e110e110e100f100f100e110e2f0f110e2f0f2f0f100f100e110e110e110e110e100f2e10100e300e2f0f2f0f2f0f2f0f100f100f100e2f0f2f0f2f0f2f0f000d050000', '05062019215551input.png', 'Enable'),
(23, 11, 'Ion', '2600d6007c3e100f102e100f0f2f0f100f2f0f100f2e100f102e100f0f2f0f2f0f100f2e100f102e102e102e0f2f0f100f100f2f0f2e100f100f100f0f100f2f0f100f0f100f102e0f2f0f100f100f100f0f102e102e102f0e110e110e100f2e102e102e10100e110e2f0f110e100f2e102e102e0f110e110e110e100f2e10100f100e110e110e100f100f100e300e110e110e110e100f100e110e110e110e110e100e110e2f0f110d120d120d110e110e110e110d120d120d110e110e110e2f0e300e300e300e300e110e110e110e2f0e300e310d120d000d050000', '05062019215650ion.png', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE IF NOT EXISTS `sub_menu` (
  `submenu_id` int(3) NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(20) NOT NULL,
  `sub_menu` varchar(20) NOT NULL,
  `favorit` varchar(10) NOT NULL,
  `sub_ket` varchar(50) NOT NULL,
  `sub_on` text NOT NULL,
  `sub_off` text NOT NULL,
  `sub_link` text NOT NULL,
  `sub_logo` varchar(200) NOT NULL,
  PRIMARY KEY (`submenu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`submenu_id`, `menu_id`, `sub_menu`, `favorit`, `sub_ket`, `sub_on`, `sub_off`, `sub_link`, `sub_logo`) VALUES
(1, '1', 'Living Room', 'Favorit', 'voice: Turn On/Off Living Room Lighting', '', '', 'b20834000c00013a0d20200d0d20200e0d20200d0d200d200d200d210d20200e0c20200e0d20200e0d20200d0d20200e0d20200d0d200d2100000000', '28092018021558living-room64.png'),
(2, '1', 'Main Bedrooms', '', 'voice: Turn On/Off Main Bedrooms', '', '', 'b20092000c1f200c0d1f200c0d1e210b0d1f200c0d1e0e1f0d1e210b0d1f200c0d1e210c0d1e200c0d1f0d1f0d0001390d1f0d1f0d1e210c0c1f200c0e1e200c0d1e200c0d1f200c0d1e0e1f0d1e210b0d1f200c0d1e210c0d1e210b0d1f0d1f0d0001390d1f0d1f0d1e210c0d1e200c0e1e200c0d1e210b0e1e200c0d1e0e1f0d1e210c0d1e200c0d1f200c0d1e200c0d1f0d0005dc000000000000', '28092018021738bed64.png'),
(3, '1', 'Kitchen', 'Favorit', 'voice: Turn On/Off Kitchen Lighting', '', '', 'b20734000d00013a0d20200d0d20200d0d20200e0d1f0d200d1f0d200d20200d0d20210d0d20200e0d20200d0d20200e0d20200d200d200e00000000', '28092018021927kitchen64.png'),
(4, '1', 'Childrens Bedrooms', '', 'voice: Turn On/Off Children Bedroom Lighting', '', '', 'b2001001200c0d1e200c0d1f0d1f0d00013a0c1f1f0d0c201f0d0c1f0d1f0d1e200d0c1f200c0d1f1f0d0c1f0d200c1f200c0c1f200d0c1f1f0d0c1f200c0d1f0d210b00013a0c1f1f0d0c201f0d0c1f0d1f0d1f1f0d0c1f200c0d1f1f0d0c1f0d200c1f200c0c201f0d0c1f200c0c201f0d0c1f0d1f0d0001390d1f1f0d0d1e200d0c1f0d1f0d1f1f0d0c1f200c0d1f1f0d0c1f0d200c1f1f0d0c1f200c0d1f200c0c201f0d0c1f0d1f0d00013a0c1f1f0d0c1f200d0c1f0d1f0c20200c0c1f200d0c1f1f0d0c200c200c1f1f0d0c201f0d0c1f200c0d1f1f0d0c1f0d1f0d00013a0c1f200c0d1f1f0d0c1f0d1f0d1f1f0d0c1f200d0c1f1f0d0c1f0d200c1f1f0d0c201f0d0c1f200c0d1f1f0d0c1f0d0005dc0000000000000000', '28092018022042baby-crib64.png'),
(5, '1', 'Washing', '', 'voice: Turn On/Off Washing Lighting', '', '', 'b2000c01200c1f0c200d0c00013a0c1f200c0d1f1f0d0c1f0c200d1f1f0c0d1f1f0d0c1f0d200c1f200c0d1f1f0c0d1f1f0d0c1f200d0c1f1f0d1f0c200e0b0001390d1f1f0d0c1f200d0c1f0d1f0d1f1f0d0c1f1f0d0d1e0d200c1f200c0c201f0d0c1f1f0d0d1e200d0c1f1f0d1f0c200d0c00013a0c1f200c0d1e200d0c1f0d1f0d1f1f0d0c1f200d0c1f0d1f0d1f1f0c0d1f200c0c201f0d0c1f200c0d1f1f0d1f0c200c0d0001390d1f1f0d0c1f200d0c1f0d1f0d1f1f0d0c1f200c0d1f0d1f0d1e200d0c1f1f0d0c1f200d0c1f1f0d0c1f200d1f0c1f0d0c00013a0d1f1f0d0c1f200d0c1f0d1f0d1f1f0d0c1f200c0d1f0d1f0c1f200c0d1f1f0d0c201f0d0c1f1f0d0c201f0c200c1f0005dc000000000000000000000000', '28092018022129wash64.png'),
(6, '1', 'Bathroom', '', 'voice: Turn On/Off Bathroom Lighting', '', '', 'b20534000d00013a0d20200d0d20200d0d200d200d20200d0d20200d0d20200d0d200d200d20200d0d20200d0d20200e0d20200d200d200e00000000', '07062019171311shower (1).png'),
(7, '1', 'Carport', 'Favorit', 'voice: Turn On/Off Carport Lighting', '', '', 'b20934000d00013a0e1f0e200d1f210c0e1f210d0e1f200d0d1f210d0d1f0e1f0e1f210d0e1f210c0e1f200d0e1f210d0d1f210c210c210d00000000', '28092018022238garage64.png'),
(8, '1', 'Garden', 'Favorit', 'voice: Turn On/Off Garden Lighting', '', '', 'b20934000e00013a0e1f0e1f0e1f210c0e1f210c0e1f210d0e1f210c0e1f210d0e1f0e1f0e1f210c0e1f210d0e1f210c0e1f210d210c210d00000000', '28092018022759plant64.png'),
(9, '2', 'Water Pump', 'Favorit', 'voice: Turn On/Off Water Pump', 'b20934000d00013a0e1f0e200d1f200d0d1f200d0d1f210d0e1f0e200d1f200d0d1f200d0e1f210d0d1f200d0e1f200d0d1f200d200c200d00000000', 'b20834000e00013a0e1f0e1f0e1f210d0e1f210c0e1f210d0e1f0e1f0e1f210d0d1f210d0e1f210d0e1f210d0e1f210c0e1f210d0d1f0e1f00000000', 'b20934000d00013a0e1f0e200d1f200d0d1f200d0d1f210d0e1f0e200d1f200d0d1f200d0e1f210d0d1f200d0e1f200d0d1f200d200c200d00000000', '28092018022656waterpump64.png'),
(10, '2', 'Garden Irrigation', '', 'voice: Turn On/Off Garden Irrigation', '', '', '', '28092018022727hydroponic64.png'),
(11, '3', 'AC Living Room', 'Favorit', 'voice: Turn On/Off AC Living Room', '', '', '2600d6007c3e100f0f2f0f100f2e100f102e100f102e100f0f2f0f100f2e102e100f102e100f102e0f2f0f2f0f2f0f0f100f102e102e100f0f100f100f0f102e100f100f0f100f2f0f100f0f100f100f0f100f2f0f2f0f2f0f0f100f100f102e0f100f100f0f100f102e100f0f100f2f0f2f0f2f0f0f100f100f100f0f100f100f0f100f100f100f0f100f100f2e100f100f100f0f100f100f0f100f100f100f0f100f100f2e100f100f100f100f0f100f100f0f100f100f0f100f2f0f100f2e102e102e102e102e100f0f100f100f2e102e102e102e10000d050000', '28092018022845air-conditioner64.png'),
(12, '3', 'AC Main Bedrooms', '', 'voice: Turn On/Off AC Main Bedrooms', '', '', '', '28092018022910air-conditioner64.png'),
(13, '3', 'Television', 'Favorit', 'voice: Turn On/Off Television', '', '', '260058000001289413121213123812131114111312131213123812381213123713371238123812371213121312131238121312131213121311381337123812131237123812381337120005280001294a13000c590001294a13000d05', '28092018022936tv64.png'),
(14, '3', 'AC Childrens Bedroom', '', 'voice: Turn On/Off AC Children Bedroom', '', '', '', '28092018023000air-conditioner64.png'),
(15, '2', 'Speaker', 'Favorit', 'voice: Turn On/Off Speaker', 'b20934000d00013a0d20200d0d1f210d0e1f0e200d20200d0d1f0e200d1f210d0d20200d0d1f200d0d1f210d0d1f210d0d20200d200d210d00000000', 'b20634000d00013a0d1f200d0d1f200d0d1f0e200d1f210d0d200d200d1f200d0d1f200d0e1f200d0d1f210d0e1f200d0d1f200d0d1f0e2000000000', 'b20934000d00013a0d20200d0d1f210d0e1f0e200d20200d0d1f0e200d1f210d0d20200d0d1f200d0d1f210d0d1f210d0d20200d200d210d00000000', '07062019171344speakers.png'),
(16, '2', 'Socket 1', '', 'voice: Turn On/Off Socket 1', '', '', 'b200a2001e0c200d0c00013a0d1f1f0c0e1f0c200c1f200c0d1f1f0d0c1f200c0d1f0d1f0d1e200d0c1f200c0d1e200d0c201f0c0d1f200c1f0c200d0c00013a0d1e200d0c1f0d200c1f200c0d1e200c0d1f200c0d1f0d1f0d1e200c0d1f200c0c1f200d0c1f200c0d1f1f0c200c200c0d00013a0c1f200c0d1f0d1f0c201f0d0c1f200c0d1e210c0d1e0d1f0d1f200c0d1f200c0c1f200d0c1f1f0d0d1e200c200c200005dc000000000000', '07062019171432socket (1).png'),
(17, '2', 'Socket 2', '', 'voice: Turn On/Off Socket 2', '', '', 'b2000a010d1f0d1f0d0001390d1f1f0d0d1e0d1f0d1f200c0d1e200d0d1e200c0d1f0d1f0c1f200c0d1f200c0d1e200d0c1f200c0d1f1f0c0e1e0d200c00013a0c1f200c0d1e0e1f0d1e200d0c1f200c0d1e200c0d1f0d1f0d1f200c0d1f1f0d0c1f200c0d1f1f0d0c1f200c0d1e0e1f0d0001390d1e200d0c1f0d1f0d1f200c0d1e200d0c1f200c0d1f0d1f0c1f200d0c1f200c0d1e200d0d1e200d0c1f200c0d1e0e1e0d00013a0d1e200c0d1f0d1f0d1f200c0d1e200c0d1f200c0d1f0d1f0c201f0d0c1f200c0d1f1f0c0d1f200c0d1e210c0d1e0d1f0d00013a0c1f200c0d1f0d1f0d1e200d0c1f200c0d1f200c0d1e0d200c1f200c0d1f1f0d0d1e200c0d1f200c0d1e200c0e1e0d0005dc0000000000000000000000000000', '07062019171522socket (1).png'),
(18, '2', 'Socket 3', '', 'voice: Turn On/Off Socket 3', '', '', 'b20634000d00013a0d1f200d0d1f0e200d1f210d0d1f210d0e1f200d0d1f210d0d200e200d1f210d0d1f210d0d1f200d0d1f210d200c210d00000000', '07062019171543socket (1).png'),
(19, '2', 'Socket 4', '', 'voice: Turn On/Off Socket 4', '', '', 'b20036010d1e210b0e1e0e1e0d1f200c0d1e200c0d1f200c0d1e200c0d1f0d1f0d1f200c0d1e200c0d1f200c0d1e210b0e1e0d1f0d0001390d1f200c0d1e0e1e0d1f200c0d1f200c0d1e200d0d1e200c0d1e0d200c1f200c0d1f1f0d0d1e200c0d1e210c0d1e0d1f0e0001380e1e200c0d1f0d1f0d1e200d0c1f200c0d1e200c0e1e200c0d1f0d1f0d1e200c0d1f200c0d1e210b0d1f200c0d1e0e1f0d0001390d1e210b0e1e0d1f0d1e210c0c1f200c0d1f200c0d1e200c0d1f0d1f0d1f200c0d1e200c0d1f200c0d1e210b0d1f0d1f0d0001390d1f200c0d1e0e1f0d1e200c0d1f200c0d1e210b0d1f200c0d1f0d1f0d1e200c0d1f200c0d1e200d0c1f200c0d1e0e1f0d0001390d1f1f0d0d1e0e1e0d1f200c0d1e200d0d1e200c0d1e210c0d1e0e1f0c1f200c0d1e200d0c1f200c0d1e210c0c1f0e0005dc0000', '07062019171713socket (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(100) NOT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id_file`, `nama_file`) VALUES
(1, 'Blue Gravity.jpg'),
(2, 'Blue Star.jpg'),
(3, 'City.jpg'),
(4, 'High.jpg'),
(5, 'Mount sky.jpg'),
(6, 'Mountain in Night.jpg'),
(7, 'Mountain lake.jpg'),
(8, 'Purple.jpg'),
(11, 'green.jpg'),
(12, 'kitchen.jpg'),
(13, 'borobudur.jpg'),
(14, 'bird house.jpg'),
(15, 'WI Borobudur.jpg'),
(16, 'Bali.jpg'),
(17, 'WI Raja Ampat.JPG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
