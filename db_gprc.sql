-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 26-Mar-2018 às 04:12
-- Versão do servidor: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gprc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_access_log`
--

CREATE TABLE `system_access_log` (
  `id` int(11) NOT NULL,
  `sessionid` text,
  `login` text,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logout_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_access_log`
--

INSERT INTO `system_access_log` (`id`, `sessionid`, `login`, `login_time`, `logout_time`) VALUES
(1, '2miq2ead05luq66kp6sbplipl0', 'luis', '2017-03-03 00:08:27', '2017-03-03 00:09:06'),
(2, 'btnvr0v6qntldjic83s6ilbjd0', 'santiago', '2017-03-03 00:09:15', '2017-03-03 00:19:37'),
(3, '4kp08ap5jn5n1rs7p2s4qnac95', 'luis', '2017-03-03 00:19:40', '2017-03-03 00:28:38'),
(4, '35nibs4f7iifqgo9c0suk7lvl7', 'santiago', '2017-03-03 00:28:46', '2017-03-03 01:03:15'),
(5, 'o96k50cofd96n9jbarvkv14he7', 'viviane', '2017-03-03 01:03:29', '2017-03-03 01:04:00'),
(6, 'd016bqf1vskemr95bbtav9m3r4', 'luis', '2017-03-03 01:04:04', '2017-03-03 01:06:07'),
(7, '74opleaugvm5gmok87isunbu70', 'viviane', '2017-03-03 01:06:14', '2017-03-03 01:06:22'),
(8, '4svhvsvoma3ltk7pmb2aqtmbf2', 'santiago', '2017-03-03 01:06:30', '2017-03-03 01:07:46'),
(9, 'eftibr5m0vu24jk0kg0pta4u17', 'user', '2017-03-03 01:07:52', '2017-03-03 01:08:07'),
(10, '9de5dji8pnvpd22k8no1hbdgp0', 'luis', '2017-03-03 01:17:30', '2017-03-03 01:17:47'),
(11, 'aara1bm6or8v4e908gr43f8le0', 'luis', '2017-03-03 01:22:36', '2017-03-03 01:25:44'),
(12, 'rk531f4plesoamp7je7ddbueq7', 'luis', '2017-03-03 23:02:40', '2017-03-03 23:57:00'),
(13, 'd7eiuksvlau898c5upegbi8li3', 'luis', '2017-03-03 23:57:03', '0000-00-00 00:00:00'),
(14, 'vpchgo6km75cq64lc654dd5j12', 'luis', '2017-03-04 12:13:30', '0000-00-00 00:00:00'),
(15, 'bv4f6vaea5cpbbatq0momulqm2', 'luis', '2017-03-06 13:39:50', '0000-00-00 00:00:00'),
(16, 'te92vva9c24r6cfhqpcjfvsd41', 'luis', '2017-03-07 00:50:49', '0000-00-00 00:00:00'),
(17, 'frvekqpoheesfkcs7ib76iub31', 'luis', '2017-03-08 14:43:08', '2017-03-08 14:44:13'),
(18, '9c40fjkpupe1civ764pq7iqnu2', 'luis', '2017-03-08 15:17:26', '2017-03-08 15:24:57'),
(19, 'q7r6k7t4i38t0vgou14lip8o87', 'luis', '2017-03-08 17:21:50', '2017-03-08 17:24:03'),
(20, 'eic5efoadbth5fqfgfqb25c134', 'luis', '2017-03-08 17:31:41', '2017-03-08 17:37:15'),
(21, 'hfqattqieqje7bq69s8dhbla93', 'luis', '2017-03-08 18:06:27', '0000-00-00 00:00:00'),
(22, 'ol7iv4dql9bgcfot0v0le63oo0', 'luis', '2017-03-09 17:24:08', '2017-03-09 17:24:24'),
(23, '1atp1o7d0u8b6qj3jt0ec2ld91', 'luis', '2017-03-12 14:01:45', '2017-03-12 14:11:12'),
(24, '65qnecq0sugm8uonqo00mq41c1', 'santiago', '2017-03-12 14:11:19', '2017-03-12 14:15:30'),
(25, '3qh1rvkkc7gj4c9fi43a161ag6', 'luis', '2017-03-12 14:15:33', '2017-03-12 18:05:44'),
(26, 'k2955ofmet3sp2o11fqj1v3me0', 'santiago', '2017-03-12 19:38:07', '2017-03-12 19:40:09'),
(27, 'jdlljuaigds8dnmjnageijcp71', 'santiago', '2017-03-12 19:40:15', '2017-03-12 19:43:44'),
(28, '3que8dm8svsa28ni6f99c7u8r0', 'luis', '2017-03-12 19:43:50', '0000-00-00 00:00:00'),
(29, 'lghru6f75sk7dos01e0i4f4kg3', 'luis', '2017-03-12 21:15:53', '2017-03-12 21:18:33'),
(30, 'gmaeu3mp4783aaofsrjn9i02v1', 'luis', '2017-03-13 01:36:07', '2017-03-13 01:52:04'),
(31, 'd9csuig84k70drueull3hrqog2', 'santiago', '2017-03-13 01:52:12', '2017-03-13 01:53:31'),
(32, '2v5ff2ubh93ihel92fedfjdee0', 'santiago', '2017-03-13 01:53:37', '2017-03-13 02:01:19'),
(33, 'ki23ueu8s360nd2hghumo8r091', 'santiago', '2017-03-13 02:01:26', '0000-00-00 00:00:00'),
(34, 'sgof1o0lns6o22llq8ff1g75b4', 'luis', '2017-03-13 13:39:54', '2017-03-13 13:47:22'),
(35, '3tnupgi7gnptvkmeb696t86jd6', 'luis', '2017-03-13 13:49:15', '0000-00-00 00:00:00'),
(36, 'u6mc0jpqdgfb3i239l04r4vre7', 'luis', '2017-03-14 19:36:14', '2017-03-14 20:02:05'),
(37, 'gitpfove5o91b1ovrqp0m07k24', 'luis', '2017-03-15 14:58:12', '2017-03-15 15:00:03'),
(38, 'be9an6g37aqtujot7s8s2jkj33', 'luis', '2017-03-16 14:13:03', '0000-00-00 00:00:00'),
(39, '4u72r5oqj2c6qr1mfgnq8rnfd7', 'luis', '2017-03-16 20:04:26', '2017-03-16 20:06:45'),
(40, '1fgputrgsu31ghm52k7vk6m3t5', 'luis', '2017-03-19 22:37:59', '2017-03-19 22:51:17'),
(41, 'blqc9124lfpvult6m9gvmojv65', 'luis', '2017-03-19 22:51:20', '0000-00-00 00:00:00'),
(42, '7bihioh82q6jsalsnfhu1vn7c4', 'luis', '2017-03-20 21:49:58', '0000-00-00 00:00:00'),
(43, 'u6im1asdunt4kq87ef9hv2ve02', 'luis', '2017-03-22 13:12:07', '2017-03-22 19:03:46'),
(44, '00cvhge4j7oqer0sobo4n8m497', 'SANTIAGO', '2017-03-22 16:46:07', '0000-00-00 00:00:00'),
(45, 'eeucfbnq9sc1d2dft88sa9qkk5', 'luis', '2017-03-23 17:23:55', '2017-03-23 19:39:25'),
(46, 'doosl3nbqlr4fhhqb83957hfn6', 'luis', '2017-03-23 18:10:24', '0000-00-00 00:00:00'),
(47, 'f0lrufgm0j164b4ooh3nutp4l5', 'luis', '2017-03-23 20:38:12', '2017-03-24 17:21:41'),
(48, 'oomkugocotkbgcbaldbi0i8qv2', 'luis', '2017-03-24 18:24:54', '2017-03-24 18:25:35'),
(49, 'rheuh81t4unb1roph01nfqjcn5', 'luis', '2017-03-25 01:37:13', '2017-03-25 01:54:49'),
(50, 'lq2copn3o4p9cde8v35qivkit0', 'santiago', '2017-03-25 01:55:02', '2017-03-25 01:59:01'),
(51, 'a19rqv86jm5f78dhq5blro1033', 'luis', '2017-03-25 01:59:03', '2017-03-25 02:25:14'),
(52, '1mgv27cc00dpa3ju4d6h8ec073', 'luis', '2017-03-25 02:29:52', '2017-03-25 02:30:03'),
(53, '57avtsqlprer2kdjr2mg8h5g76', 'santiago', '2017-03-25 02:30:08', '0000-00-00 00:00:00'),
(54, 'vetk6rq0ho4l16o7grbkk2eo13', 'luis', '2017-03-25 12:29:21', '2017-03-27 14:21:08'),
(55, 'qmbgjmvn13a4k8756p6k45e413', 'luis', '2017-03-31 17:05:59', '2017-03-31 17:07:20'),
(56, 'ubmjecnm8tt62m720i366ehcm7', 'luis', '2017-03-31 17:07:34', '2017-03-31 17:10:24'),
(57, 'h9f5n7bjalu9dub8bosusk7an1', 'luis', '2017-04-02 20:03:15', '2017-04-02 20:10:29'),
(58, 'eecemids7jij5lcvjh3ahuthf3', 'santiago', '2017-04-02 20:10:37', '2017-04-02 20:14:55'),
(59, 't52nuq2v6jocrl2i2qpl6d2g13', 'luis', '2017-04-02 20:15:04', '2017-04-02 21:26:30'),
(60, '33cj4j11mg83ehk2cbnm16np64', 'santiago', '2017-04-02 21:26:36', '2017-04-02 21:46:09'),
(61, 'i1b2cbfddfna747hsth86mna31', 'luis', '2017-04-03 18:45:11', '2017-04-03 18:47:45'),
(62, '6glo0l9av9lr18an5drmo8i973', 'santiago', '2017-04-04 14:30:49', '0000-00-00 00:00:00'),
(63, 'thag0fe3jjgk5thoqejjam5mj1', 'luis', '2017-04-05 18:29:54', '2017-04-05 18:30:15'),
(64, 'uk8m7k3stk3mj71jitp15dtld0', 'luis', '2017-04-05 19:27:36', '2017-04-05 19:28:19'),
(65, '8lt1vgv2rdkfo4lv15arf4l8p4', 'santiago', '2017-04-05 19:45:32', '2017-04-05 19:46:17'),
(66, '8mqtai3cc64rjiipbj842bku24', 'luis', '2017-04-06 19:20:14', '2017-04-06 19:21:53'),
(67, 'a1g72q13tnsjfqdkh0p22hj482', 'luis', '2017-04-06 23:03:24', '0000-00-00 00:00:00'),
(68, '7ogfhf8kqtefmu95kvteuoetq4', 'luis', '2017-04-08 00:47:37', '0000-00-00 00:00:00'),
(69, 'r5dh0qkbn0qituin9v58avavg7', 'luis', '2017-04-10 14:41:40', '2017-04-10 14:48:20'),
(70, 'rue2cil2fcskmg6mgnn9qim060', 'luis', '2017-04-13 20:30:07', '0000-00-00 00:00:00'),
(71, '3shgv8odccbqcq6n3eh6149dq0', 'santiago', '2017-04-16 16:50:45', '0000-00-00 00:00:00'),
(72, 's59d19rjsdrvv06h0k5mshpi96', 'luis', '2017-04-16 18:50:14', '2017-04-16 18:50:25'),
(73, 'hskvl8s05erbj512rrpb0co1d4', 'santiago', '2017-04-16 18:50:34', '2017-04-16 19:24:08'),
(74, '7jkh6v1unlq4r67l58jttclga6', 'luis', '2017-04-16 21:59:09', '0000-00-00 00:00:00'),
(75, 'j75qlo8g8tjpnd0fan0ctcen27', 'luis', '2017-04-19 03:04:08', '2017-04-19 03:04:37'),
(76, 'a4128hg6tpdfj5t0r9694jtsu2', 'luis', '2017-04-19 03:04:44', '2017-04-19 03:11:00'),
(77, '5arhhg1lrk9e0cdvhrep5m9jt6', 'luis', '2017-04-19 15:30:29', '0000-00-00 00:00:00'),
(78, 'kdor0c17eibnm0uqhgr6tkppr0', 'luis', '2017-04-23 02:00:30', '0000-00-00 00:00:00'),
(79, 'tl2hkaneevul1m1cgt90ijdq72', 'luis', '2017-04-27 15:09:31', '2017-04-27 15:09:47'),
(80, '4pmb2l8dci6sgtc4bge7tj9tn2', 'luis', '2017-04-27 15:10:13', '2017-05-03 18:17:03'),
(81, 'csnng1oet3frh04biumdjl13a6', 'luis', '2017-04-29 14:54:19', '2017-04-29 17:15:22'),
(82, 'gh20qilam1ulct4l6m4jv1miv4', 'santiago', '2017-04-29 17:15:35', '2017-05-03 22:39:20'),
(83, 'ddn46cbujbtm27dso30j03ock1', 'luis', '2017-04-30 21:38:46', '0000-00-00 00:00:00'),
(84, 'ercptiue5t78racjbs3n6cnmu2', 'santiago', '2017-05-02 19:22:29', '0000-00-00 00:00:00'),
(85, '6k4qnm0nakfk4ia69rihjpani6', 'santiago', '2017-05-03 22:39:29', '0000-00-00 00:00:00'),
(86, 'errimtm7qd4uefavrjvl56hpk0', 'luis', '2017-05-03 23:30:17', '2017-05-04 00:46:40'),
(87, '9aap9v30fg1ebi1umgcv5vltr5', 'luis', '2017-05-05 19:55:38', '2017-05-05 20:07:21'),
(88, '063c01g9kc2an12qacaofcvjs0', 'luis', '2017-05-05 20:05:13', '2017-05-05 21:09:28'),
(89, 'p8me0thp4rr2ulhd1oj9c8aor1', 'luis', '2017-05-05 21:05:57', '2017-05-05 21:06:07'),
(90, '75r96bcf51tdmb9uehi4b3a906', 'santiago', '2017-05-05 21:06:13', '2017-05-05 21:13:34'),
(91, 'h4datbu96h7af0972c3ro81bp7', 'luis', '2017-05-05 21:09:33', '2017-05-05 21:09:39'),
(92, 'io5mc080ctbnjetmlvj4scl7l4', 'Liliane', '2017-05-05 21:09:57', '2017-05-05 21:11:04'),
(93, 'eh7pq61pp9arvmqlmctsintfv4', 'luis', '2017-05-05 21:11:08', '0000-00-00 00:00:00'),
(94, 'ssveott8t8jk19q9c8e75d5ut7', 'santiago', '2017-05-06 21:59:06', '2017-05-06 22:27:17'),
(95, '7s39lqkvn043etq1tefv3k7s65', 'luis', '2017-05-06 23:04:47', '0000-00-00 00:00:00'),
(96, 're0n1vncnkadhdgla4siler7s1', 'santiago', '2017-05-07 00:35:09', '2017-05-07 18:17:02'),
(97, 'i4j5l3g8349e3pa9n9k72uaui1', 'santiago', '2017-05-07 18:33:53', '2017-05-08 01:31:00'),
(98, 'hm62pit0orbk28q07nda0vm1g4', 'santiago', '2017-05-08 01:55:10', '0000-00-00 00:00:00'),
(99, '3jjc08kofk8ss1atgvddl4dii5', 'santiago', '2017-05-08 17:48:16', '2017-05-08 17:56:30'),
(100, '6ir87o08351oi5394alpk8nst2', 'luis', '2017-05-09 18:12:34', '2017-05-09 18:19:29'),
(101, 'dp6drecr1568g415lhctlml786', 'luis', '2017-05-10 02:53:38', '0000-00-00 00:00:00'),
(102, 'p2ugagnuqkme55lkjikuiidmf4', 'luis', '2017-05-10 13:41:49', '0000-00-00 00:00:00'),
(103, 'dvhnmscteaq85snag0vmhh5q50', 'santiago', '2017-05-11 01:21:04', '0000-00-00 00:00:00'),
(104, '4e21u1nobmen88697sskanoq77', 'luis', '2017-05-11 06:14:48', '2017-05-11 15:31:14'),
(105, 's82o5dj6l4de74ksvt241r63p7', 'luis', '2017-05-11 15:31:20', '2017-05-11 15:32:06'),
(106, 'js1psa4tgbotli22j00lejisg7', 'luis', '2017-05-11 18:46:53', '0000-00-00 00:00:00'),
(107, 'nv54sncecu510206urclggmpk0', 'luis', '2017-05-11 18:47:10', '2017-05-11 18:47:19'),
(108, 'ro1496e4sfp255orm37b26n2b0', 'luis', '2017-05-14 12:06:26', '2017-05-14 12:09:23'),
(109, '4iteo87gdp6jtb3os7unughs96', 'luis', '2017-05-14 12:21:54', '2017-05-14 12:22:36'),
(110, 'f9b78k6k1rcti20j5h9lf8vpu3', 'santiago', '2017-05-15 16:18:07', '0000-00-00 00:00:00'),
(111, 'pfp5mh1cbpkctcc947726p00d6', 'luis', '2017-05-16 02:19:54', '2017-05-16 02:20:55'),
(112, 'ulr472nbi1m3p4q9cgdq9kfvt7', 'luis', '2017-05-16 02:36:02', '2017-05-16 02:36:32'),
(113, 'iu2dcsfprcgr59bbqih4h6msj0', 'luis', '2017-05-16 03:10:26', '2017-05-16 03:25:45'),
(114, '9ne13h1pct4937mt3pegs3run2', 'luis', '2017-05-16 03:29:33', '0000-00-00 00:00:00'),
(115, 'qjlcn1uf1tskrlk3nbuvsm3hf0', 'luis', '2017-05-16 19:25:31', '0000-00-00 00:00:00'),
(116, '623meliinjudr032rq64snkk45', 'luis', '2017-05-17 02:10:06', '2017-05-17 20:42:07'),
(117, 'gp58psnmmbvhqvk2igbaur6pl6', 'luis', '2017-05-17 14:12:44', '0000-00-00 00:00:00'),
(118, '4d0u7ov900epfq75u9791msd12', 'luis', '2017-05-17 20:42:14', '2017-05-18 01:14:22'),
(119, 'h77bakbgpt83mpur0rfdm10rk2', 'luis', '2017-05-17 23:18:29', '2017-05-17 23:23:23'),
(120, 'n0qmt9ba84qku88fm9kugqgk74', 'luis', '2017-05-18 01:14:30', '2017-05-18 01:15:10'),
(121, '0nihl2nqccuqjf66kv405rjmf5', 'luis', '2017-05-18 02:05:52', '2017-05-18 02:24:55'),
(122, 'f8lpd8mfhk24tohece2rr77s21', 'luis', '2017-05-18 12:58:06', '2017-05-18 12:59:00'),
(123, 'cq2lkg3ipr7je9i21d2p3s5pq6', 'luis', '2017-05-18 12:59:15', '2017-05-18 13:00:24'),
(124, 'rgbrcgs3g1t1238c7o8s2job42', 'luis', '2017-05-18 15:03:57', '2017-05-18 15:12:37'),
(125, 'dse2tdv8r6r44itk729hge91u6', 'luis', '2017-05-18 15:12:48', '2017-05-18 15:12:54'),
(126, 'vmlgm87oj5j8ohlv3n7kee9dg3', 'luis', '2017-05-18 17:45:23', '0000-00-00 00:00:00'),
(127, '8pa564erv0rkhu18l9psjnjj33', 'luis', '2017-05-19 15:01:07', '2017-05-19 15:03:16'),
(128, 'mh4kr9hsflhhur1csklc3j45n4', 'luis', '2017-05-19 20:47:54', '0000-00-00 00:00:00'),
(129, 'u900kqbb62hmtajddda0odnhm4', 'santiago', '2017-05-21 19:21:58', '2017-05-21 19:26:37'),
(130, 'ble2pi3e8tgftomevbl0d4ue55', 'santiago', '2017-05-22 13:57:09', '2017-05-22 14:07:21'),
(131, 'fkcrhf0kiv2uatgl1f91kp04p1', 'luis', '2017-05-22 16:59:52', '2017-05-22 17:00:16'),
(132, 'kooja2qddj157m7tbf1atj0ou3', 'luis', '2017-05-22 18:20:28', '2017-05-22 18:26:07'),
(133, 'q6e7cj4uv8q8mie4hfj7rov2g5', 'santiago', '2017-05-23 17:57:19', '0000-00-00 00:00:00'),
(134, '5lmjhbn90808rgm16hp526dvs5', 'luis', '2017-05-23 19:41:48', '2017-05-23 21:21:30'),
(135, 'f2f4nqp4gp5ov263he5eo9fti5', 'luis', '2017-05-23 21:21:37', '2017-05-23 21:41:23'),
(136, 'jb42pgg7tbc275b3lacslnps35', 'luis', '2017-05-24 01:11:54', '2017-05-24 01:16:02'),
(137, 'tj5s1a3luop47tsnja4qpq4231', 'luis', '2017-05-24 01:55:15', '2017-05-24 02:20:32'),
(138, '5nvi44pijqn6u6nbn3s8k3rqf6', 'santiago', '2017-05-24 01:56:05', '2017-05-24 02:13:15'),
(139, '4et796n751l6lod5bfmad7u0h5', 'luis', '2017-05-24 02:20:57', '2017-05-24 03:13:40'),
(140, '7l9pdm9kfdb5mce5hhcfrmdde6', 'santiago', '2017-05-24 02:48:38', '0000-00-00 00:00:00'),
(141, 'kld83j8pqa0ualvne5gps8dhl2', 'luis', '2017-05-24 14:12:17', '2017-05-24 14:16:23'),
(142, 'ajn5ji6cqu53glu92262udl2s0', 'luis', '2017-05-24 14:19:33', '2017-05-24 20:53:59'),
(143, 'nbk56gfc7k4bgbq94q6br83bt5', 'luis', '2017-05-24 20:54:10', '2017-05-24 21:35:58'),
(144, 'slpu1bb84svh4cp1nsihf41uv7', 'luis', '2017-05-24 21:36:17', '2017-05-24 23:42:54'),
(145, 'boba77t3ti8ell28uhkfqidvm6', 'luis', '2017-05-24 23:42:58', '0000-00-00 00:00:00'),
(146, 'r2rapf58l335ogf9j7i1ea8st3', 'santiago', '2017-05-25 09:56:28', '2017-05-25 10:01:30'),
(147, '0j5sc981r0ikaph1amaumk9mc3', 'luis', '2017-05-25 12:08:40', '0000-00-00 00:00:00'),
(148, '1qe8j61lt6f9p5sqe62gk8iar5', 'luis', '2017-05-25 17:05:00', '2017-05-25 23:01:57'),
(149, 'oulgepdp077bif28s2occhc4e5', 'santiago', '2017-05-25 20:47:13', '0000-00-00 00:00:00'),
(150, 'pm46d4s270sqe9ulk4r2lahp52', 'santiago', '2017-05-26 01:46:05', '2017-05-26 01:46:25'),
(151, '97f7jkoosug8jhak5700ohsn63', 'luis', '2017-05-26 01:46:29', '2017-05-26 22:59:36'),
(152, 'b2bqb5r17bhf5pucpbsm075997', 'luis', '2017-05-26 12:10:35', '2017-05-26 13:06:22'),
(153, 'g7resu8pon7ea9a3a4krfhpvl7', 'santiago', '2017-05-26 22:59:47', '2017-05-26 23:51:15'),
(154, 'dltjqt7286jof6q05987nfs413', 'santiago', '2017-05-26 23:51:21', '2017-05-27 13:44:31'),
(155, 't91j48695skhqt78b4s1lchcf1', 'santiago', '2017-05-27 13:44:37', '2017-05-27 14:40:43'),
(156, '6f635d7qmq7ree9f7ebfqojih2', 'santiago', '2017-05-27 14:40:57', '2017-05-27 16:05:30'),
(157, 'lc645c8dcqd8vp2b46qkcbl7q0', 'santiago', '2017-05-27 16:05:37', '2017-05-27 18:08:47'),
(158, '7u7clm02j5bjrto32spl7kvcd4', 'santiago', '2017-05-27 16:12:19', '0000-00-00 00:00:00'),
(159, 'ai1v9hvb93vhq8eq3infq87oe6', 'santiago', '2017-05-27 18:08:58', '0000-00-00 00:00:00'),
(160, '0thfljenkv00o4cv9r4po2ldl6', 'santiago', '2017-05-27 18:53:33', '2017-05-27 19:05:41'),
(161, 'mjpj3f2ee2dlp7klua33ctqtm5', 'santiago', '2017-05-27 19:05:47', '2017-05-29 22:06:08'),
(162, 'ikcebnehhs77b004lrnq49o6p5', 'luis', '2017-05-28 02:10:04', '2017-05-28 02:18:12'),
(163, 'dbcuuccrcs74obh3nkfq8tcve4', 'luis', '2017-05-29 14:41:59', '2017-05-29 14:45:26'),
(164, 'd3ldf88fb9url5quh0e4kgeop4', 'santiago', '2017-05-29 22:06:22', '2017-05-29 23:39:57'),
(165, 'm8phnccb8j8s7ovj335d0reeq0', 'santiago', '2017-05-30 00:12:11', '2017-05-30 00:14:48'),
(166, 'v6dglkf6cn19ma1t664lb6shl1', 'vivia', '2017-05-30 00:15:00', '0000-00-00 00:00:00'),
(167, 'j9dhvjnrb93moga6gs7gt8mns6', 'luis', '2017-05-30 14:50:13', '2017-05-30 14:54:30'),
(168, 'orqssthqb7aimq9u34skuti825', 'luis', '2017-05-30 17:40:09', '2017-05-30 17:42:21'),
(169, '0nli79vpfpla113u61hetkt0n5', 'luis', '2017-05-31 16:29:24', '0000-00-00 00:00:00'),
(170, 'ji6um1qghqqblvakavpafcjc07', 'luis', '2017-05-31 19:58:43', '2017-05-31 19:59:42'),
(171, '0subfhvupn3ih2ce7t120iu4u6', 'luis', '2017-06-01 14:25:53', '2017-06-01 14:28:50'),
(172, 'ticjep0nokb2jol5usp4ctolq1', 'luis', '2017-06-01 16:51:29', '2017-06-01 16:52:34'),
(173, 'cq6r7j2g5g27sq2njg7j17rt57', 'luis', '2017-06-02 12:31:01', '0000-00-00 00:00:00'),
(174, 'k7ppgjhu0d6i9epbe9nqmpm9t1', 'luis', '2017-06-04 16:34:02', '2017-06-04 16:37:51'),
(175, 'q8kuqj4stn4dedb2th18ogrht4', 'santiago', '2017-06-04 16:50:26', '2017-06-05 10:24:33'),
(176, 'dthe2vhbtmpqqtrrki94ho5bf6', 'luis', '2017-06-04 16:50:33', '2017-06-04 16:52:51'),
(177, '4vjfacmdrn10pvuk1nf18eido0', 'luis', '2017-06-04 16:56:26', '0000-00-00 00:00:00'),
(178, '8p9v9gpiacb1096arvcgvccd93', 'luis', '2017-06-05 14:20:10', '2017-06-05 14:20:57'),
(179, 'n1edtkbcgr8foq21idev3q8dd6', 'santiago', '2017-06-06 00:27:55', '2017-06-06 00:28:17'),
(180, '2rpi5vvvs4to68jig6uuc4rct0', 'santiago', '2017-06-06 00:29:22', '0000-00-00 00:00:00'),
(181, '3ltk46avdfpok8q0mqjr4p01i7', 'santiago', '2017-06-06 12:39:41', '2017-06-06 13:01:46'),
(182, 'dvkas9beq7a9ltkm446pqriv75', 'luis', '2017-06-06 12:41:28', '2017-06-06 12:43:57'),
(183, 'g6sjh9igefbpl7rk1j036g5k35', 'santiago', '2017-06-07 02:08:46', '2017-06-07 02:58:08'),
(184, 'gt5k8qgrloa470ke4tj2242q03', 'santiago', '2017-06-07 02:58:14', '2017-06-07 03:18:33'),
(185, 'tu2gkilakr3n14jqg984nok990', 'santiago', '2017-06-07 03:32:48', '2017-06-07 03:33:08'),
(186, 'o6frja7esroebbip7rcrvji676', 'luis', '2017-06-07 10:23:50', '2017-06-07 10:25:34'),
(187, 'oi8fuuqvhp9n60ilajg1scnh73', 'luis', '2017-06-07 17:52:10', '2017-06-07 18:05:14'),
(188, 't23qtc5ih37vtr4oqocpen7104', 'luis', '2017-06-08 16:24:15', '2017-06-08 16:27:00'),
(189, 'ednl8pp8vtgk6nkr1cagq91ui5', 'santiago', '2017-06-09 00:48:45', '0000-00-00 00:00:00'),
(190, '0ml19nkc6rc2bfg4aqounteog6', 'luis', '2017-06-11 17:10:06', '0000-00-00 00:00:00'),
(191, 'fe15j12skvinas2v4vpu35nd51', 'LUIS', '2017-06-14 21:58:49', '2017-06-14 22:21:39'),
(192, 'l40ii433393d3rb5cps5q4d1c1', 'luis', '2017-06-14 22:19:07', '2017-06-14 22:21:50'),
(193, 'hq2oesg642il3t4qjh6gm3v027', 'santiago', '2017-06-14 22:21:54', '0000-00-00 00:00:00'),
(194, 'odd0jelo0cnucg1qrs5mclkju1', 'santiago', '2017-06-14 22:48:27', '0000-00-00 00:00:00'),
(195, '6rs2kmdjivbbelukopsde5g036', 'luis', '2017-06-15 19:15:00', '2017-06-15 22:59:37'),
(196, 't80phs1i072b16pg4qcl9mvc73', 'luis', '2017-06-15 22:59:43', '0000-00-00 00:00:00'),
(197, 'l3dol9gpnhkr94j8vdv4bpq8t7', 'santiago', '2017-06-17 19:03:24', '0000-00-00 00:00:00'),
(198, '88tc9b9r9diciufjtiequ1hd06', 'santiago', '2017-06-17 22:01:16', '0000-00-00 00:00:00'),
(199, '27vcbkljah2lrgkltekfcjuba7', 'luis', '2017-06-18 17:29:10', '0000-00-00 00:00:00'),
(200, 'at27vvjfb0q593thi34kg1eku7', 'santiago', '2017-06-18 19:39:52', '2017-06-18 20:49:03'),
(201, 'u43rdliuqrvn2grfduj80ann44', 'luis', '2017-06-19 02:20:12', '0000-00-00 00:00:00'),
(202, 'kh3o6qitd9sqgbvaos4uonpqc0', 'santiago', '2017-06-19 22:23:11', '0000-00-00 00:00:00'),
(203, 'hs9bgalggg248r4g9gn8kvqvb6', 'santiago', '2017-06-24 20:48:19', '2017-06-25 13:22:41'),
(204, 'si5kc92snkqiq6bjlk7f7btcm5', 'luis', '2017-06-25 13:22:46', '0000-00-00 00:00:00'),
(205, 'drhbdahd8i7pgmin2bqgk3b8b7', 'santiago', '2017-06-25 19:51:29', '2017-06-25 22:31:24'),
(206, 'pr8rbnle393kfp6t6odn6rjj75', 'luis', '2017-06-25 22:34:31', '0000-00-00 00:00:00'),
(207, 'pfm9m0lj27020sqbem7tlvfns4', 'luis', '2017-07-09 12:25:42', '2017-07-09 12:28:32'),
(208, 'm9ft783b9ouab8gav6k6sak2s6', 'luis', '2017-08-02 15:45:17', '2017-08-02 17:28:32'),
(209, 'ghs1273sbhj81h00reptfvc6n4', 'luis', '2017-08-06 14:12:15', '0000-00-00 00:00:00'),
(210, 'sla3gm7k9csm00bim2ueoarv60', 'santiago', '2017-08-06 15:01:22', '0000-00-00 00:00:00'),
(211, 'fjknchk7ng08sh1h5t7gp49kh2', 'santiago', '2017-08-21 12:08:45', '2017-08-21 12:10:56'),
(212, 'ui1q8mkmk4a770751j15bbslp4', 'santiago', '2017-08-21 17:42:42', '2017-08-21 17:48:17'),
(213, '8td7fodk4bcvur9jl31mrrjb50', 'santiago', '2017-08-27 21:19:05', '2017-08-27 21:19:16'),
(214, 'qkgcrvig4boefeilu0nmu97sb7', 'santiago', '2017-08-28 23:56:07', '2017-08-28 23:56:20'),
(215, 'p4k38ff8bn6aeoq48n9gatssp4', 'santiago', '2017-08-31 22:14:51', '2017-09-04 23:27:44'),
(216, '9dfn46h68v04q6ne8sd4n7fdq5', 'santiago', '2017-09-04 23:29:05', '2017-09-04 23:29:12'),
(217, '6boul44dmnikdiq3ps7shq0bt6', 'santiago', '2017-09-04 23:29:33', '2017-09-04 23:35:03'),
(218, '0k5imilvrvlme2okusteoj9g03', 'santiago', '2017-09-04 23:37:19', '0000-00-00 00:00:00'),
(219, 'dhh2naiod2rd8ei83ckcqb3n41', 'santiago', '2017-09-07 15:09:49', '0000-00-00 00:00:00'),
(220, 'uv7k1mcdvv7s39appcjc4m16u3', 'luis', '2017-09-12 00:31:51', '2017-09-12 00:34:23'),
(221, 'dps62ncvhkbaab5oah6cl2aja0', 'santiago', '2017-09-26 19:35:11', '0000-00-00 00:00:00'),
(222, '2ss16f305rhbmniscrjqa9dbe5', 'santiago', '2017-11-11 13:39:50', '0000-00-00 00:00:00'),
(223, 'f8bd5b10c8972c8c8a0cc4cf28494288', 'santiago', '2017-11-11 18:45:02', '0000-00-00 00:00:00'),
(224, 'f50fb78a0e2bd7aee3ffa7afaf0b2a79', 'santiago', '2017-11-15 20:48:47', '2017-11-15 20:51:29'),
(225, '07714b58b1ce4b29264ebfd7bf93fc58', 'santiago', '2017-11-15 20:51:49', '0000-00-00 00:00:00'),
(226, '52a5354bd9a95eaf8de893b2b734f795', 'santiago', '2017-11-23 22:56:14', '2017-11-23 22:56:54'),
(227, 'd76ccedf9afc63ed899cc76def8473b6', 'santiago', '2017-11-26 12:01:43', '2017-11-26 13:21:39'),
(228, '0f81ae8f040bb84cfd0abdd67f7a4b83', 'admin', '2017-12-03 11:52:35', '2017-12-03 11:53:22'),
(229, '8f34b19333e67d0ce7a775461d18e8c6', 'santiago', '2017-12-03 11:53:47', '2017-12-03 12:00:55'),
(230, 'd49ded83942599fbb4ec1d64f8603d8f', 'santiago', '2017-12-03 12:03:55', '2017-12-03 17:51:18'),
(231, '672924a2c6ff1c2aafda8afd915f452a', 'luis', '2017-12-03 17:51:36', '2017-12-03 17:51:41'),
(232, '9a4f5549005615581e7df30622052214', 'viviane', '2017-12-03 17:52:10', '2017-12-03 18:36:19'),
(233, '489c9e891689893832116d16eeddc8eb', 'santiago', '2017-12-03 18:37:01', '2017-12-12 14:06:08'),
(234, 'b3d0f2113b27a4d28548ad90f95930ee', 'santiago', '2017-12-12 14:06:51', '0000-00-00 00:00:00'),
(235, '6439577c4e0ec7a59bf6620c75c75219', 'santiago', '2017-12-18 02:16:46', '2017-12-18 20:24:04'),
(236, '870776105f472e5d38acab34fe99f910', 'viviane', '2017-12-18 20:24:09', '2017-12-18 22:18:17'),
(237, 'db278432ef7353ea5c65de4db6e8603e', 'santiago', '2017-12-18 22:18:21', '2017-12-20 15:34:04'),
(238, '55b12a1b0f1af2580c499a72d7bfb896', 'santiago', '2017-12-20 15:34:26', '2017-12-20 15:37:15'),
(239, '06698dd6dc74fa5f01ed11f5781b1095', 'santiago', '2017-12-20 15:37:50', '2017-12-20 15:56:07'),
(240, '74f81a504e9705bcec401af853f681f2', 'santiago', '2017-12-28 01:35:31', '2017-12-28 01:36:18'),
(241, '8ba32091604c0f7e386bdb58fef078fb', 'luis', '2017-12-28 01:36:24', '0000-00-00 00:00:00'),
(242, '494f8d56b40513d411f3186efe6159d6', 'santiago', '2017-12-28 11:54:09', '2017-12-28 23:55:10'),
(243, 'b36d66bb78ff4e914807c1ec612ad753', 'santiago', '2017-12-28 23:55:30', '2017-12-29 01:50:14'),
(244, '7c9d4c1b7323ea0e5e39c3b498fb9870', 'santiago', '2017-12-29 01:50:20', '2018-01-02 00:16:13'),
(245, 'f72ca9bfc86893350e8bd3f2070eb150', 'santiago', '2018-01-08 15:32:55', '0000-00-00 00:00:00'),
(246, '3da9b2942bf36e8f4a796f0eec70efe0', 'santiago', '2018-02-11 22:05:16', '0000-00-00 00:00:00'),
(247, 'f8149e4555f31261cd6537802ddc25e1', 'santiago', '2018-02-18 18:13:18', '0000-00-00 00:00:00'),
(248, '41f78c2e356564fc74473b13a81fd614', 'santiago', '2018-02-20 01:19:36', '2018-02-20 22:10:39'),
(249, '346a3fa8e525aaf43af0359f1c2e84f5', 'santiago', '2018-02-20 22:18:55', '2018-02-20 22:28:07'),
(250, '606f4b73f0273da8f904e6470cea800a', 'santiago', '2018-02-20 22:54:14', '0000-00-00 00:00:00'),
(251, 'b65ef368a5349b5a2e1336dc0aa3a130', 'santiago', '2018-02-21 19:29:21', '0000-00-00 00:00:00'),
(252, '68fff64d980e3b47d9d77f8db62eac96', 'santiago', '2018-02-23 17:44:25', '0000-00-00 00:00:00'),
(253, '5e91086e6cecc0fb0888af4c8317935c', 'santiago', '2018-02-23 18:42:51', '0000-00-00 00:00:00'),
(254, 'b31100a165ca9d1efc7d55e9b6544b4f', 'santiago', '2018-02-23 19:15:24', '2018-02-23 19:25:18'),
(255, '591d46bc5bbcc71e41a02cc578985881', 'santiago', '2018-03-05 21:35:21', '0000-00-00 00:00:00'),
(256, '4e97a63a21bbeb81b81616ba2c60f8f5', 'santiago', '2018-03-08 23:16:37', '2018-03-09 00:53:49'),
(257, '8bdcd5525ff6b48c57a171fcc191ebde', 'santiago', '2018-03-09 00:56:13', '2018-03-09 00:56:52'),
(258, '9745b79a300b1f4a86d204ec1b3a41dd', 'santiago', '2018-03-09 00:56:56', '2018-03-09 01:03:00'),
(259, '3d2b072de76d9d9b6ddea559bb24ae8b', 'santiago', '2018-03-09 01:03:16', '2018-03-09 01:07:24'),
(260, 'de7244926b4ba7db1588bee977b3038a', 'luis', '2018-03-09 01:07:41', '0000-00-00 00:00:00'),
(261, 'd8050bf4399c091944628fb129acd98d', 'santiago', '2018-03-15 02:30:58', '2018-03-15 02:34:48'),
(262, 'a2bcde096fdcb4f7fb04dcfa9ff4f2c7', 'santiago', '2018-03-15 02:34:56', '2018-03-16 01:25:04'),
(263, '00cf4f81768f671feea0572602489f83', 'santiago', '2018-03-15 02:35:20', '2018-03-15 02:55:40'),
(264, '33269519b9b68184f1dbc0a1c85dd66f', 'santiago', '2018-03-15 03:32:19', '2018-03-15 23:07:36'),
(265, '8dafb48e1b5d2ca663ef57c3ad68c7d7', 'santiago', '2018-03-16 01:25:26', '0000-00-00 00:00:00'),
(266, '247dfde2bffbddad8231560fa108a6e8', 'santiago', '2018-03-16 01:25:57', '2018-03-16 01:49:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_avaliacao_bdi`
--

CREATE TABLE `system_avaliacao_bdi` (
  `codBDI` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codAvaliador` int(6) UNSIGNED ZEROFILL NOT NULL,
  `sessaoBDI` int(2) DEFAULT NULL,
  `conclusao` int(2) NOT NULL,
  `parecer` text NOT NULL,
  `dataBDI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_avaliacao_bdi`
--

INSERT INTO `system_avaliacao_bdi` (`codBDI`, `codPaciente`, `codAvaliador`, `sessaoBDI`, `conclusao`, `parecer`, `dataBDI`) VALUES
(000000001, 000000007, 000005, NULL, 1, 'Teste 23', '2017-05-06'),
(000000002, 000000007, 000007, NULL, 1, 'Teste 060', '2017-12-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_avaliacao_clinica`
--

CREATE TABLE `system_avaliacao_clinica` (
  `codAva` int(9) NOT NULL,
  `codPaciente` varchar(60) NOT NULL,
  `codAvaliador` varchar(60) NOT NULL,
  `parecer` text,
  `dataAva` date DEFAULT NULL,
  `hipoDiag` varchar(45) DEFAULT NULL,
  `hipoClin` varchar(45) DEFAULT NULL,
  `clFuncional` int(2) DEFAULT NULL,
  `clWeber` int(2) DEFAULT NULL,
  `anginah` int(2) DEFAULT NULL,
  `diabetes` int(2) DEFAULT NULL,
  `dislipidemia` int(2) DEFAULT NULL,
  `hiperArterial` int(2) DEFAULT NULL,
  `tabagismo` int(2) DEFAULT NULL,
  `icdac` int(2) DEFAULT NULL,
  `obesidade` int(2) DEFAULT NULL,
  `angina` int(2) DEFAULT NULL,
  `arritmia` int(2) DEFAULT NULL,
  `chagas` int(2) DEFAULT NULL,
  `cansaco` int(2) DEFAULT NULL,
  `febre` int(11) DEFAULT NULL,
  `isCardiaca` int(2) DEFAULT NULL,
  `acidenteVe` int(2) DEFAULT NULL,
  `isMitral` int(2) DEFAULT NULL,
  `doencaPulmonar` int(2) DEFAULT NULL,
  `infarto` int(2) DEFAULT NULL,
  `cardiopatia` int(2) DEFAULT NULL,
  `soproAsma` int(2) DEFAULT NULL,
  `miocardiopatia` int(2) DEFAULT NULL,
  `sincope` int(2) DEFAULT NULL,
  `outroac` varchar(45) DEFAULT NULL,
  `checkup` int(2) DEFAULT NULL,
  `preoperatorio` int(2) DEFAULT NULL,
  `trocaValvula` int(2) DEFAULT NULL,
  `revascularizacao` int(2) DEFAULT NULL,
  `angioplastia` int(2) DEFAULT NULL,
  `transplante` int(2) DEFAULT NULL,
  `cateterismo` int(2) DEFAULT NULL,
  `posoperatorio` int(2) DEFAULT NULL,
  `marcaPasso` int(2) DEFAULT NULL,
  `outropr` varchar(45) DEFAULT NULL,
  `peso` int(3) DEFAULT NULL,
  `estatura` int(3) DEFAULT NULL,
  `circAbdominal` int(4) DEFAULT NULL,
  `circQuadril` int(4) DEFAULT NULL,
  `frequencia` int(4) DEFAULT NULL,
  `pressao1` int(4) DEFAULT NULL,
  `pressao2` int(4) DEFAULT NULL,
  `osteoarticular` int(2) DEFAULT NULL,
  `cardiovascular` int(2) DEFAULT NULL,
  `respiratorio` int(2) DEFAULT NULL,
  `abdominal` int(2) DEFAULT NULL,
  `extremidades` int(2) DEFAULT NULL,
  `eletrocardiograma` int(2) DEFAULT NULL,
  `a0` int(4) DEFAULT NULL,
  `ae` int(4) DEFAULT NULL,
  `s` int(4) DEFAULT NULL,
  `pp` int(4) DEFAULT NULL,
  `ve` int(4) DEFAULT NULL,
  `fe` int(4) DEFAULT NULL,
  `sistolica` varchar(45) DEFAULT NULL,
  `diastolica` varchar(45) DEFAULT NULL,
  `valvas` varchar(45) DEFAULT NULL,
  `outroeco` varchar(45) DEFAULT NULL,
  `repousovo2` int(4) DEFAULT NULL,
  `repousofc` int(4) DEFAULT NULL,
  `repousopa1` int(4) DEFAULT NULL,
  `repousopa2` int(4) DEFAULT NULL,
  `plimiar1vo2` int(4) DEFAULT NULL,
  `plimiar1fc` int(4) DEFAULT NULL,
  `plimiar1pa1` int(4) DEFAULT NULL,
  `plimiar1pa2` int(4) DEFAULT NULL,
  `plimiar2vo2` int(4) DEFAULT NULL,
  `plimiar2fc` int(4) DEFAULT NULL,
  `plimiar2pa1` int(4) DEFAULT NULL,
  `plimiar2pa2` int(4) DEFAULT NULL,
  `isqvo2` int(4) DEFAULT NULL,
  `isqfc` int(4) DEFAULT NULL,
  `isqpa1` int(4) DEFAULT NULL,
  `isqpa2` int(4) DEFAULT NULL,
  `mxvo2` int(4) DEFAULT NULL,
  `mxfc` int(4) DEFAULT NULL,
  `mxpa1` int(4) DEFAULT NULL,
  `mxpa2` int(4) DEFAULT NULL,
  `data1` date DEFAULT NULL,
  `data2` date DEFAULT NULL,
  `data3` date DEFAULT NULL,
  `data4` date DEFAULT NULL,
  `data5` date DEFAULT NULL,
  `data6` date DEFAULT NULL,
  `data7` date DEFAULT NULL,
  `data8` date DEFAULT NULL,
  `data9` date DEFAULT NULL,
  `data10` date DEFAULT NULL,
  `classe1` varchar(40) DEFAULT NULL,
  `classe2` varchar(40) DEFAULT NULL,
  `classe3` varchar(40) DEFAULT NULL,
  `classe4` varchar(40) DEFAULT NULL,
  `classe5` varchar(40) DEFAULT NULL,
  `classe6` varchar(40) DEFAULT NULL,
  `classe7` varchar(40) DEFAULT NULL,
  `classe8` varchar(40) DEFAULT NULL,
  `classe9` varchar(40) DEFAULT NULL,
  `classe10` varchar(40) DEFAULT NULL,
  `classe11` varchar(40) DEFAULT NULL,
  `classe12` varchar(40) DEFAULT NULL,
  `med1` varchar(30) DEFAULT NULL,
  `med2` varchar(30) DEFAULT NULL,
  `med3` varchar(30) DEFAULT NULL,
  `med4` varchar(30) DEFAULT NULL,
  `med5` varchar(30) DEFAULT NULL,
  `med6` varchar(30) DEFAULT NULL,
  `med7` varchar(30) DEFAULT NULL,
  `med8` varchar(30) DEFAULT NULL,
  `med9` varchar(30) DEFAULT NULL,
  `med10` varchar(30) DEFAULT NULL,
  `med11` varchar(30) DEFAULT NULL,
  `med12` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_avaliacao_clinica`
--

INSERT INTO `system_avaliacao_clinica` (`codAva`, `codPaciente`, `codAvaliador`, `parecer`, `dataAva`, `hipoDiag`, `hipoClin`, `clFuncional`, `clWeber`, `anginah`, `diabetes`, `dislipidemia`, `hiperArterial`, `tabagismo`, `icdac`, `obesidade`, `angina`, `arritmia`, `chagas`, `cansaco`, `febre`, `isCardiaca`, `acidenteVe`, `isMitral`, `doencaPulmonar`, `infarto`, `cardiopatia`, `soproAsma`, `miocardiopatia`, `sincope`, `outroac`, `checkup`, `preoperatorio`, `trocaValvula`, `revascularizacao`, `angioplastia`, `transplante`, `cateterismo`, `posoperatorio`, `marcaPasso`, `outropr`, `peso`, `estatura`, `circAbdominal`, `circQuadril`, `frequencia`, `pressao1`, `pressao2`, `osteoarticular`, `cardiovascular`, `respiratorio`, `abdominal`, `extremidades`, `eletrocardiograma`, `a0`, `ae`, `s`, `pp`, `ve`, `fe`, `sistolica`, `diastolica`, `valvas`, `outroeco`, `repousovo2`, `repousofc`, `repousopa1`, `repousopa2`, `plimiar1vo2`, `plimiar1fc`, `plimiar1pa1`, `plimiar1pa2`, `plimiar2vo2`, `plimiar2fc`, `plimiar2pa1`, `plimiar2pa2`, `isqvo2`, `isqfc`, `isqpa1`, `isqpa2`, `mxvo2`, `mxfc`, `mxpa1`, `mxpa2`, `data1`, `data2`, `data3`, `data4`, `data5`, `data6`, `data7`, `data8`, `data9`, `data10`, `classe1`, `classe2`, `classe3`, `classe4`, `classe5`, `classe6`, `classe7`, `classe8`, `classe9`, `classe10`, `classe11`, `classe12`, `med1`, `med2`, `med3`, `med4`, `med5`, `med6`, `med7`, `med8`, `med9`, `med10`, `med11`, `med12`) VALUES
(1, 'Apolonio Santiago da Silva Junior', 'Luís Aparecido de Oliveira Freitas', 'Teste1', '2017-04-11', 'adasd', 'asdfad', 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'asdf', 1, 1, 1, 1, 1, 1, 1, 1, 1, 'asdfads', 12342, 2324, 234, 23, 234, 234, 234, 0, 0, 0, 0, 0, 1, 23, 423, 4234, 234, 234, 423, 'ads', 'asdfsd', 'asdfs', 'dfa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Fabio Lucas Santiago Bonjardim', 'Luís Aparecido de Oliveira Freitas', 'teste 3', '2017-04-17', 'Segundo Teste', 'Segundo Teste', 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'segundo teste', 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 90, 90, 90, 90, 90, 90, 90, 0, 0, 0, 0, 0, 1, 123, 123, 123, 123, 123, 123, 'segundo teste', 'segundo teste', 'segundo testes', 'segundo teste', 123, 123, 123, 123, 123, 123, 213, 123, 123, 131, 3265, 65, 465, 4, 65, 465, 46, 54, 6, 465, '2017-05-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Fabio Lucas Santiago Bonjardim', 'Luís Aparecido de Oliveira Freitas', 'teste 3', '2017-04-18', 'Segundo Teste', 'Segundo Teste', 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'segundo teste', 1, 0, 1, 1, 1, 0, 0, 1, 1, 'teste 122', 90, 90, 90, 90, 90, 90, 90, 0, 0, 0, 0, 0, 1, 123, 123, 123, 123, 123, 123, 'segundo teste', 'segundo teste', 'segundo testes', 'segundo teste', 123, 123, 123, 123, 123, 123, 213, 123, 123, 131, 3265, 65, 465, 4, 65, 465, 46, 54, 6, 465, '2017-05-01', '2018-02-13', '2018-01-31', '2018-02-13', '2018-02-21', '2018-02-14', '2018-02-13', '2018-02-15', '2018-02-14', '2018-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_avaliacao_equilibrio`
--

CREATE TABLE `system_avaliacao_equilibrio` (
  `codAvaliacaoEquilibrio` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codAvaliador` int(9) UNSIGNED ZEROFILL NOT NULL,
  `sessaoEquilibrio` int(2) NOT NULL,
  `media` int(11) DEFAULT NULL,
  `conclusao` int(2) NOT NULL,
  `dataAvaliacao` date NOT NULL,
  `parecer` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_avaliacao_equilibrio`
--

INSERT INTO `system_avaliacao_equilibrio` (`codAvaliacaoEquilibrio`, `codPaciente`, `codAvaliador`, `sessaoEquilibrio`, `media`, `conclusao`, `dataAvaliacao`, `parecer`) VALUES
(000000007, 000000007, 000000005, 0, 222, 1, '2017-05-06', 'Teste 21'),
(000000008, 000000008, 000000005, 0, 10, 1, '2017-05-24', NULL),
(000000009, 000000007, 000000008, 0, 77777, 2, '2017-05-29', 'Teste 33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_avaliacao_hiit`
--

CREATE TABLE `system_avaliacao_hiit` (
  `codHiit` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` varchar(60) NOT NULL,
  `codAvaliador` varchar(60) NOT NULL,
  `sessao` int(4) DEFAULT NULL,
  `fcintervalar` int(4) DEFAULT NULL,
  `fcintervalar2` int(4) DEFAULT NULL,
  `fcalta1` int(4) DEFAULT NULL,
  `fcalta2` int(4) DEFAULT NULL,
  `bdi1` int(4) DEFAULT NULL,
  `bdi2` int(4) DEFAULT NULL,
  `bei1` int(4) DEFAULT NULL,
  `bei2` int(4) DEFAULT NULL,
  `bdf1` int(4) DEFAULT NULL,
  `bdf2` int(4) DEFAULT NULL,
  `bef1` int(4) DEFAULT NULL,
  `bef2` int(4) DEFAULT NULL,
  `fci` int(4) DEFAULT NULL,
  `fcfim` int(4) DEFAULT NULL,
  `sati` int(4) DEFAULT NULL,
  `satfim` int(4) DEFAULT NULL,
  `duracao` int(4) DEFAULT NULL,
  `velocidade` int(4) DEFAULT NULL,
  `assento` int(4) DEFAULT NULL,
  `manivela` int(4) DEFAULT NULL,
  `duracao2` int(4) DEFAULT NULL,
  `velocidade2` int(4) DEFAULT NULL,
  `assento2` int(4) DEFAULT NULL,
  `tempoa` int(4) DEFAULT NULL,
  `cicloergometro` int(4) DEFAULT NULL,
  `rotacao` int(4) DEFAULT NULL,
  `fcinicial` int(4) DEFAULT NULL,
  `fcfinal` int(4) DEFAULT NULL,
  `periodicidade` int(4) DEFAULT NULL,
  `tempott` int(4) DEFAULT NULL,
  `fc1i` int(4) DEFAULT NULL,
  `fc1f` int(4) DEFAULT NULL,
  `tpb1` int(4) DEFAULT NULL,
  `fc2i` int(4) DEFAULT NULL,
  `fc2f` int(4) DEFAULT NULL,
  `tpa1` int(4) DEFAULT NULL,
  `fc3i` int(4) DEFAULT NULL,
  `fc3f` int(4) DEFAULT NULL,
  `tpb2` int(4) DEFAULT NULL,
  `fc4i` int(4) DEFAULT NULL,
  `fc4f` int(4) DEFAULT NULL,
  `tpa2` int(4) DEFAULT NULL,
  `fc5i` int(4) DEFAULT NULL,
  `fc5f` int(4) DEFAULT NULL,
  `tpb3` int(4) DEFAULT NULL,
  `fc1min` int(4) DEFAULT NULL,
  `fc2min` int(4) DEFAULT NULL,
  `fc3min` int(4) DEFAULT NULL,
  `fc4min` int(4) DEFAULT NULL,
  `fc5min` int(4) DEFAULT NULL,
  `fc6min` int(4) DEFAULT NULL,
  `fc7min` int(4) DEFAULT NULL,
  `fc8min` int(4) DEFAULT NULL,
  `fc9min` int(4) DEFAULT NULL,
  `fc10min` int(4) DEFAULT NULL,
  `fc11min` int(4) DEFAULT NULL,
  `fc12min` int(4) DEFAULT NULL,
  `fc13min` int(4) DEFAULT NULL,
  `fc14min` int(4) DEFAULT NULL,
  `fc15min` int(4) DEFAULT NULL,
  `fc16min` int(4) DEFAULT NULL,
  `fc17min` int(4) DEFAULT NULL,
  `ifc1i` int(4) DEFAULT NULL,
  `ifc1f` int(4) DEFAULT NULL,
  `itpb1` int(4) DEFAULT NULL,
  `ifc2i` int(4) DEFAULT NULL,
  `ifc2f` int(4) DEFAULT NULL,
  `itpa1` int(4) DEFAULT NULL,
  `ifc3i` int(4) DEFAULT NULL,
  `ifc3f` int(4) DEFAULT NULL,
  `itpb2` int(4) DEFAULT NULL,
  `ifc4i` int(4) DEFAULT NULL,
  `ifc4f` int(4) DEFAULT NULL,
  `itpa2` int(4) DEFAULT NULL,
  `ifc5i` int(4) DEFAULT NULL,
  `ifc5f` int(4) DEFAULT NULL,
  `itpb3` int(4) DEFAULT NULL,
  `fc18min` int(4) DEFAULT NULL,
  `fc19min` int(4) DEFAULT NULL,
  `fc20min` int(4) DEFAULT NULL,
  `fc21min` int(4) DEFAULT NULL,
  `fc22min` int(4) DEFAULT NULL,
  `fc23min` int(4) DEFAULT NULL,
  `fc24min` int(4) DEFAULT NULL,
  `fc25min` int(4) DEFAULT NULL,
  `fc26min` int(4) DEFAULT NULL,
  `fc27min` int(4) DEFAULT NULL,
  `fc28min` int(4) DEFAULT NULL,
  `fc29min` int(4) DEFAULT NULL,
  `fc30min` int(4) DEFAULT NULL,
  `fc31min` int(4) DEFAULT NULL,
  `fc32min` int(4) DEFAULT NULL,
  `fc33min` int(4) DEFAULT NULL,
  `fc34min` int(4) DEFAULT NULL,
  `borg` int(4) DEFAULT NULL,
  `dataHiit` date DEFAULT NULL,
  `parecer` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_avaliacao_hiit`
--

INSERT INTO `system_avaliacao_hiit` (`codHiit`, `codPaciente`, `codAvaliador`, `sessao`, `fcintervalar`, `fcintervalar2`, `fcalta1`, `fcalta2`, `bdi1`, `bdi2`, `bei1`, `bei2`, `bdf1`, `bdf2`, `bef1`, `bef2`, `fci`, `fcfim`, `sati`, `satfim`, `duracao`, `velocidade`, `assento`, `manivela`, `duracao2`, `velocidade2`, `assento2`, `tempoa`, `cicloergometro`, `rotacao`, `fcinicial`, `fcfinal`, `periodicidade`, `tempott`, `fc1i`, `fc1f`, `tpb1`, `fc2i`, `fc2f`, `tpa1`, `fc3i`, `fc3f`, `tpb2`, `fc4i`, `fc4f`, `tpa2`, `fc5i`, `fc5f`, `tpb3`, `fc1min`, `fc2min`, `fc3min`, `fc4min`, `fc5min`, `fc6min`, `fc7min`, `fc8min`, `fc9min`, `fc10min`, `fc11min`, `fc12min`, `fc13min`, `fc14min`, `fc15min`, `fc16min`, `fc17min`, `ifc1i`, `ifc1f`, `itpb1`, `ifc2i`, `ifc2f`, `itpa1`, `ifc3i`, `ifc3f`, `itpb2`, `ifc4i`, `ifc4f`, `itpa2`, `ifc5i`, `ifc5f`, `itpb3`, `fc18min`, `fc19min`, `fc20min`, `fc21min`, `fc22min`, `fc23min`, `fc24min`, `fc25min`, `fc26min`, `fc27min`, `fc28min`, `fc29min`, `fc30min`, `fc31min`, `fc32min`, `fc33min`, `fc34min`, `borg`, `dataHiit`, `parecer`) VALUES
(000000002, 'Fabio Lucas Santiago Bonjardim', 'Luís Aparecido de Oliveira Freitas', 8, 132, 13, 2, 31, 123, 123, 123, 123, 123, 123, 123, 123, 123, 132, 132, 132, 123, 213, 123, 123, 123, 123, 123, 123, 1, 123, 3, 123, 123, 132, 3, 123, 32, 21, 32, 1323, 21, 321, 3213, 32, 132, 21, 13, 23, 32, 3, 12, 32, 13, 2, NULL, 132, 32, 13, 213, 13, 2132, 13, 21, 21, 32, 13, 123, 234, 213, 54, 35, 3, 54, 54, 43, 543, 54, 543, 54, 354, 43, 5, 43, 54, 435, 43, 54, 35, 54, 35, 43, 35, 43, 54, 5, 354, 54, 35, 9, '2017-04-16', 'Segundo Teste'),
(000000003, 'Apolonio Santiago da Silva Junior', 'Luís Aparecido de Oliveira Freitas', 4, 879879, 879, 8, 98, 789, 798, 798, 978, 98, 798, 798, 9, 89, 879, 879, 89, 98, 798, 79, 87, 98, 798, 79, 879, 0, 87, 98, 79, 879, 87, 798, 79, 98, 879, 87, 79, 987, 76, 87, 78, 76, 68, 76, 876, 68, 87, 987, 98, 987, 987, 98, 79, 7, 687, 687, 876, 87, 687, 687, 87, 68, 7, 87, 8, 876, 8776, 7, 876, 7, 687, 68, 8, 768, 687, 76, 87, 68, 76, 87, 6, 6, 876, 87, 687, 6, 87, 87, 76, 876, 87, 67, 687, 687, 68, 11, '2017-05-10', 'Teste numero 30'),
(000000004, 'Aldecy Ayres da Fonseca', 'Luís Aparecido de Oliveira Freitas', 4, 68, 72, 93, 96, 103, 46, 109, 68, 99, 68, 102, 63, 66, 72, 98, 97, 14, 50, 11, 1, 14, 50, 8, 5, 0, 50, 77, 80, 3, 34, 78, 76, 3, 85, 81, 4, 77, 80, 3, 81, 84, 4, 75, 77, 3, 78, 77, 76, 85, 84, 81, 81, 77, 77, 80, 81, 80, 88, 84, 75, 79, 77, 79, 85, 3, 84, 86, 4, 83, 82, 3, 84, 87, 4, 82, 82, 3, 79, 84, 85, 84, 89, 87, 86, 83, 80, 82, 84, 87, 86, 87, 82, 80, 82, 13, '2016-11-29', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_avaliacao_minnesota`
--

CREATE TABLE `system_avaliacao_minnesota` (
  `codMin` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codAvaliador` int(9) UNSIGNED ZEROFILL NOT NULL,
  `sessaoMinnesota` int(2) NOT NULL,
  `conclusao` int(2) NOT NULL,
  `parecer` varchar(250) NOT NULL,
  `dataMin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_avaliacao_minnesota`
--

INSERT INTO `system_avaliacao_minnesota` (`codMin`, `codPaciente`, `codAvaliador`, `sessaoMinnesota`, `conclusao`, `parecer`, `dataMin`) VALUES
(000000001, 000000007, 000000007, 0, 1, 'TESTE JUNHO', '2017-06-25'),
(000000002, 000000007, 000000007, 0, 1, 'Teste 67', '2017-12-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_avaliacao_ombros`
--

CREATE TABLE `system_avaliacao_ombros` (
  `codAvaliacaoOmbros` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codAvaliador` int(9) UNSIGNED ZEROFILL NOT NULL,
  `sessaoOmbro` int(2) NOT NULL,
  `dataAvaliacao` date DEFAULT NULL,
  `media` int(4) NOT NULL,
  `maoDominante` int(2) NOT NULL,
  `conclusao` int(2) NOT NULL,
  `parecer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_avaliacao_ombros`
--

INSERT INTO `system_avaliacao_ombros` (`codAvaliacaoOmbros`, `codPaciente`, `codAvaliador`, `sessaoOmbro`, `dataAvaliacao`, `media`, `maoDominante`, `conclusao`, `parecer`) VALUES
(000000001, 000000007, 000000007, 0, '2017-06-25', 1234, 1, 2, 'TESTE DE JUNHO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_avaliacao_ventilatoria`
--

CREATE TABLE `system_avaliacao_ventilatoria` (
  `codVent` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` varchar(60) DEFAULT NULL,
  `codAvaliador` varchar(60) DEFAULT NULL,
  `sessaoVentilatoria` int(2) NOT NULL,
  `fc` int(6) NOT NULL,
  `pa1` int(6) NOT NULL,
  `pa2` int(6) NOT NULL,
  `sat` int(6) NOT NULL,
  `sindex` int(6) NOT NULL,
  `pimax` int(6) NOT NULL,
  `pinasd` int(6) NOT NULL,
  `pinase` int(6) NOT NULL,
  `PEmax` int(6) NOT NULL,
  `PImaxm` int(6) NOT NULL,
  `cv` int(6) NOT NULL,
  `cpt` int(6) NOT NULL,
  `cvf` int(6) NOT NULL,
  `vef1` int(6) NOT NULL,
  `vef2` int(6) NOT NULL,
  `petco2` int(4) DEFAULT NULL,
  `conclusao` varchar(150) NOT NULL,
  `parecer` text NOT NULL,
  `dataVent` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_avaliacao_ventilatoria`
--

INSERT INTO `system_avaliacao_ventilatoria` (`codVent`, `codPaciente`, `codAvaliador`, `sessaoVentilatoria`, `fc`, `pa1`, `pa2`, `sat`, `sindex`, `pimax`, `pinasd`, `pinase`, `PEmax`, `PImaxm`, `cv`, `cpt`, `cvf`, `vef1`, `vef2`, `petco2`, `conclusao`, `parecer`, `dataVent`) VALUES
(000000002, 'Fabio Lucas Santiago Bonjardim', 'Vivaldo Resende', 0, 123, 132, 123, 123, 123, 123, 213, 123, 123, 123, 123, 123, 123, 132, 213, NULL, '213', 'asdf asdf asdf asedf a sdfasdf adsfasda', '2017-03-20'),
(000000004, 'Thatyane Resende Bomjardim', 'Marialva Resende Bonjardim', 0, 2222, 2222, 2, 222, 222, 2, 2, 2, 2, 22, 2, 2, 2, 2, 2, NULL, 'pppp', 'edfadsf adf', '2017-03-16'),
(000000005, 'Ketelyn Bonjardim Santiago', 'Vivaldo Resende', 0, 99, 9, 9, 9, 9, 9, 999, 999, 9, 99, 9, 99, 9, 9, 9, NULL, '999 jhkh', 'kj uoiu', '2017-03-16'),
(000000006, 'Apolonio Santiago da Silva Junior', 'Marialva Resende Bonjardim', 0, 123, 13, 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 13, 123, NULL, 'adsf asdf asdasdf', 'dsfa asdfasd', '2017-03-21'),
(000000007, 'Apolonio Santiago da Silva Junior', 'Alexandra Silvestre de Lemos Silva', 0, 456, 890, 890, 678, 123, 123, 123, 123, 123, 123, 345, 34, 345, 345, 345, 345, 'teste 40', 'Parecer teste alcançado', '2017-06-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_avaliacao_wells`
--

CREATE TABLE `system_avaliacao_wells` (
  `codWells` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codAvaliador` int(9) UNSIGNED ZEROFILL NOT NULL,
  `sessaoWells` int(2) NOT NULL,
  `media` int(4) NOT NULL,
  `conclusao` int(2) NOT NULL,
  `parecer` text NOT NULL,
  `dataAvaliacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_avaliacao_wells`
--

INSERT INTO `system_avaliacao_wells` (`codWells`, `codPaciente`, `codAvaliador`, `sessaoWells`, `media`, `conclusao`, `parecer`, `dataAvaliacao`) VALUES
(000000001, 000000007, 000000005, 0, 888, 2, 'Teste 28', '2017-05-06'),
(000000002, 000000007, 000000005, 0, 111, 2, 'Teste 32 Objetivo ALcançado', '2017-05-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_avaliador`
--

CREATE TABLE `system_avaliador` (
  `codigoAvaliador` int(9) NOT NULL,
  `nomeAvaliador` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `profissao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_avaliador`
--

INSERT INTO `system_avaliador` (`codigoAvaliador`, `nomeAvaliador`, `telefone`, `email`, `profissao`) VALUES
(5, 'Luís Aparecido de Oliveira Freitas', '(61)98621-7208', 'luisdeoliveirafreitas@gmail.com', 'Fisioterapeuta'),
(7, 'Gerson Cipriano Junior', '(61)98190-7111', 'ciprianeft@gmail.com', 'Fisioterapeuta/Professor/Coordenador GPRC'),
(8, 'Alexandra Corrêa Gervazoni Balbuena de Lima', '(61)99975-1658', 'alexandra.lima@gmail.com', 'Médica Cardiologista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_change_log`
--

CREATE TABLE `system_change_log` (
  `id` int(11) NOT NULL,
  `logdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login` text,
  `tablename` text,
  `primarykey` text,
  `pkvalue` text,
  `operation` text,
  `columnname` text,
  `oldvalue` text,
  `newvalue` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_complementar_exame`
--

CREATE TABLE `system_complementar_exame` (
  `codExameComp` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` varchar(60) NOT NULL,
  `codAvaliador` varchar(60) NOT NULL,
  `file_path` varchar(150) NOT NULL,
  `exame` varchar(45) NOT NULL,
  `parecer` text NOT NULL,
  `dataExameComp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_complementar_exame`
--

INSERT INTO `system_complementar_exame` (`codExameComp`, `codPaciente`, `codAvaliador`, `file_path`, `exame`, `parecer`, `dataExameComp`) VALUES
(000000001, 'Apolonio Santiago da Silva Junior', 'Alexandra Corrêa Gervazoni Balbuena de Lima', 'Captura de Tela 2017-12-17 a?s 23.21.26.png', 'Eletro', 'teste21', '2017-12-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_document`
--

CREATE TABLE `system_document` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `title` text,
  `description` text,
  `category_id` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `archive_date` date DEFAULT NULL,
  `filename` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_document_category`
--

CREATE TABLE `system_document_category` (
  `id` int(11) NOT NULL,
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_document_group`
--

CREATE TABLE `system_document_group` (
  `id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `system_group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_document_user`
--

CREATE TABLE `system_document_user` (
  `id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `system_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_exame_item`
--

CREATE TABLE `system_exame_item` (
  `codExameItem` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codAvaliador` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codTipoExame` int(9) UNSIGNED ZEROFILL NOT NULL,
  `file_path` varchar(60) NOT NULL,
  `parecer` varchar(250) NOT NULL,
  `dataExameItem` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_exame_item`
--

INSERT INTO `system_exame_item` (`codExameItem`, `codAvaliador`, `codPaciente`, `codTipoExame`, `file_path`, `parecer`, `dataExameItem`) VALUES
(000000001, 000000007, 000000007, 000000002, 'btc-min-santicoin.png', 'Teste 065', '2017-12-18'),
(000000002, 000000007, 000000007, 000000003, 'Captura de Tela 2017-12-20 às 19.17.09.png', 'Teste 66', '2017-12-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_group`
--

CREATE TABLE `system_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_group`
--

INSERT INTO `system_group` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Standard'),
(3, 'Paciente'),
(4, 'Medicamento'),
(5, 'Evolução'),
(6, 'Avaliadores'),
(7, 'Exames Complementares'),
(8, 'Prescrição'),
(9, 'Avaliação'),
(10, 'Relatórios'),
(11, 'Formulários'),
(12, 'Pesquisa Avaliação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_group_program`
--

CREATE TABLE `system_group_program` (
  `id` int(11) NOT NULL,
  `system_group_id` int(11) DEFAULT NULL,
  `system_program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_group_program`
--

INSERT INTO `system_group_program` (`id`, `system_group_id`, `system_program_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 8),
(8, 1, 9),
(9, 1, 11),
(10, 1, 14),
(11, 1, 15),
(12, 2, 10),
(13, 2, 12),
(14, 2, 13),
(15, 2, 16),
(16, 2, 17),
(17, 2, 18),
(18, 2, 19),
(19, 2, 20),
(20, 1, 21),
(21, 2, 22),
(22, 2, 23),
(23, 2, 24),
(24, 2, 25),
(25, 1, 26),
(26, 1, 27),
(27, 1, 28),
(28, 1, 29),
(29, 2, 30),
(74, 4, 37),
(75, 4, 38),
(76, 4, 45),
(175, 8, 53),
(176, 8, 54),
(177, 8, 52),
(178, 8, 71),
(187, 6, 32),
(188, 6, 34),
(189, 6, 42),
(190, 6, 43),
(191, 6, 73),
(201, 5, 60),
(202, 5, 61),
(203, 5, 62),
(204, 5, 63),
(205, 5, 64),
(206, 5, 65),
(207, 5, 66),
(208, 5, 68),
(209, 5, 69),
(210, 5, 74),
(211, 10, 48),
(212, 11, 75),
(213, 9, 59),
(214, 9, 58),
(215, 9, 44),
(216, 9, 41),
(217, 9, 40),
(218, 9, 55),
(219, 9, 67),
(220, 9, 70),
(221, 9, 77),
(222, 9, 76),
(223, 9, 78),
(224, 9, 79),
(225, 9, 80),
(226, 1, 8),
(227, 2, 16),
(228, 1, 102),
(229, 1, 103),
(230, 1, 104),
(231, 1, 105),
(232, 7, 49),
(233, 7, 106),
(234, 3, 31),
(235, 3, 33),
(236, 3, 35),
(237, 3, 36),
(238, 3, 39),
(239, 3, 50),
(240, 3, 51),
(241, 3, 57),
(242, 3, 72),
(243, 3, 106),
(244, 12, 107),
(245, 12, 108),
(246, 12, 77),
(247, 12, 76);

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_grupo_remedio`
--

CREATE TABLE `system_grupo_remedio` (
  `codigoGrupoRemedio` int(4) NOT NULL,
  `descricaoGrupo` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_grupo_remedio`
--

INSERT INTO `system_grupo_remedio` (`codigoGrupoRemedio`, `descricaoGrupo`) VALUES
(1, 'Alfa-bloqueador adrenérgico '),
(2, 'Anticoagulante'),
(3, 'Antidiabético'),
(4, 'Antitiroidiano'),
(5, 'Antiarrítimico'),
(6, 'Betabloqueador Adrenérgico'),
(7, 'Digitálico'),
(8, 'Diurético'),
(9, 'Estalina'),
(10, 'Inibidos da Enzima Conversora da Angiotensina (IECA)'),
(11, 'Antiacidez estomacal'),
(12, 'Antiagregante'),
(13, 'Diurético'),
(14, 'Anti-hipertensivo'),
(15, 'Diurético poupador de potássio; antagonista da aldosterona'),
(16, 'Antiarrítmico classe III'),
(17, 'Inibidor da síntese do hormônio tireoidiano'),
(18, 'Antiulceroso; inibidor da bomba de prótons (H+/K+ ATPase na ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_message`
--

CREATE TABLE `system_message` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_user_to_id` int(11) DEFAULT NULL,
  `subject` text,
  `message` text,
  `dt_message` text,
  `checked` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_muscoesqueletica`
--

CREATE TABLE `system_muscoesqueletica` (
  `codFM` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` varchar(60) NOT NULL,
  `codAvaliador` varchar(60) NOT NULL,
  `sessao` int(2) DEFAULT NULL,
  `pamsd1` int(4) DEFAULT NULL,
  `pamsd2` int(4) DEFAULT NULL,
  `pamse1` int(4) DEFAULT NULL,
  `pamse2` int(4) DEFAULT NULL,
  `fc` int(4) DEFAULT NULL,
  `sat` int(4) DEFAULT NULL,
  `assento` int(4) DEFAULT NULL,
  `manivela` int(4) DEFAULT NULL,
  `assento2` int(4) DEFAULT NULL,
  `cargaS1` int(3) DEFAULT NULL,
  `cargaS2` int(3) DEFAULT NULL,
  `cargaS3` int(3) DEFAULT NULL,
  `mediaS` int(3) DEFAULT NULL,
  `cargaI1` int(3) DEFAULT NULL,
  `cargaI2` int(3) DEFAULT NULL,
  `cargaI3` int(3) DEFAULT NULL,
  `mediaI` int(3) DEFAULT NULL,
  `lowback` int(4) DEFAULT NULL,
  `abdominal` int(4) DEFAULT NULL,
  `chestpress` int(4) DEFAULT NULL,
  `pulldown` int(4) DEFAULT NULL,
  `shoulderpress` int(4) DEFAULT NULL,
  `tricepsdips` int(4) DEFAULT NULL,
  `totalhip` int(4) DEFAULT NULL,
  `legextension` int(4) DEFAULT NULL,
  `abduction` int(4) DEFAULT NULL,
  `adduction` int(4) DEFAULT NULL,
  `seatedlegcurl` int(4) DEFAULT NULL,
  `seatedlegpress` int(4) DEFAULT NULL,
  `squat` int(4) DEFAULT NULL,
  `lowbackR` int(4) DEFAULT NULL,
  `abdominalR` int(4) DEFAULT NULL,
  `chestpressR` int(4) DEFAULT NULL,
  `pulldownR` int(4) DEFAULT NULL,
  `shoulderpressR` int(4) DEFAULT NULL,
  `tricepsdipsR` int(4) DEFAULT NULL,
  `totalhipR` int(4) DEFAULT NULL,
  `legextensionR` int(4) DEFAULT NULL,
  `abductionR` int(4) DEFAULT NULL,
  `adductionR` int(4) DEFAULT NULL,
  `seatedlegcurlR` int(4) DEFAULT NULL,
  `seatedlegpressR` int(4) DEFAULT NULL,
  `squatR` int(4) DEFAULT NULL,
  `lowbackI` int(4) DEFAULT NULL,
  `abdominalI` int(4) DEFAULT NULL,
  `chestpressI` int(4) DEFAULT NULL,
  `pulldownI` int(4) DEFAULT NULL,
  `shoulderpressI` int(4) DEFAULT NULL,
  `tricepsdipsI` int(4) DEFAULT NULL,
  `totalhipI` int(4) DEFAULT NULL,
  `legextensionI` int(4) DEFAULT NULL,
  `abductionI` int(4) DEFAULT NULL,
  `adductionI` int(4) DEFAULT NULL,
  `seatedlegcurlI` int(4) DEFAULT NULL,
  `seatedlegpressI` int(4) DEFAULT NULL,
  `squatI` int(4) DEFAULT NULL,
  `lowbackS` int(4) DEFAULT NULL,
  `abdominalS` int(4) DEFAULT NULL,
  `chestpressS` int(4) DEFAULT NULL,
  `pulldownS` int(4) DEFAULT NULL,
  `shoulderpressS` int(4) DEFAULT NULL,
  `tricepsdipsS` int(4) DEFAULT NULL,
  `totalhipS` int(4) DEFAULT NULL,
  `legextensionS` int(4) DEFAULT NULL,
  `abductionS` int(4) DEFAULT NULL,
  `adductionS` int(4) DEFAULT NULL,
  `seatedlegcurlS` int(4) DEFAULT NULL,
  `seatedlegpressS` int(4) DEFAULT NULL,
  `squatS` int(4) DEFAULT NULL,
  `parecer` text,
  `midposicao` int(4) DEFAULT NULL,
  `midveloc` int(4) DEFAULT NULL,
  `midflex` int(4) DEFAULT NULL,
  `midext` int(4) DEFAULT NULL,
  `midadmflex` int(4) DEFAULT NULL,
  `midadmext` int(4) DEFAULT NULL,
  `middefflex` int(4) DEFAULT NULL,
  `middefext` int(4) DEFAULT NULL,
  `mieposicao` int(4) DEFAULT NULL,
  `mieveloc` int(4) DEFAULT NULL,
  `mieflex` int(4) DEFAULT NULL,
  `mieext` int(4) DEFAULT NULL,
  `mieadmflex` int(4) DEFAULT NULL,
  `mieadmext` int(4) DEFAULT NULL,
  `miedefflex` int(4) DEFAULT NULL,
  `miedefext` int(4) DEFAULT NULL,
  `msdsegundos` int(4) DEFAULT NULL,
  `msdp1` int(4) DEFAULT NULL,
  `msdp2` int(4) DEFAULT NULL,
  `msdp3` int(4) DEFAULT NULL,
  `msdmedia` int(4) DEFAULT NULL,
  `msesegundos` int(4) DEFAULT NULL,
  `msep1` int(4) DEFAULT NULL,
  `msep2` int(4) DEFAULT NULL,
  `msep3` int(4) DEFAULT NULL,
  `msemedia` int(4) DEFAULT NULL,
  `dataFM` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_muscoesqueletica`
--

INSERT INTO `system_muscoesqueletica` (`codFM`, `codPaciente`, `codAvaliador`, `sessao`, `pamsd1`, `pamsd2`, `pamse1`, `pamse2`, `fc`, `sat`, `assento`, `manivela`, `assento2`, `cargaS1`, `cargaS2`, `cargaS3`, `mediaS`, `cargaI1`, `cargaI2`, `cargaI3`, `mediaI`, `lowback`, `abdominal`, `chestpress`, `pulldown`, `shoulderpress`, `tricepsdips`, `totalhip`, `legextension`, `abduction`, `adduction`, `seatedlegcurl`, `seatedlegpress`, `squat`, `lowbackR`, `abdominalR`, `chestpressR`, `pulldownR`, `shoulderpressR`, `tricepsdipsR`, `totalhipR`, `legextensionR`, `abductionR`, `adductionR`, `seatedlegcurlR`, `seatedlegpressR`, `squatR`, `lowbackI`, `abdominalI`, `chestpressI`, `pulldownI`, `shoulderpressI`, `tricepsdipsI`, `totalhipI`, `legextensionI`, `abductionI`, `adductionI`, `seatedlegcurlI`, `seatedlegpressI`, `squatI`, `lowbackS`, `abdominalS`, `chestpressS`, `pulldownS`, `shoulderpressS`, `tricepsdipsS`, `totalhipS`, `legextensionS`, `abductionS`, `adductionS`, `seatedlegcurlS`, `seatedlegpressS`, `squatS`, `parecer`, `midposicao`, `midveloc`, `midflex`, `midext`, `midadmflex`, `midadmext`, `middefflex`, `middefext`, `mieposicao`, `mieveloc`, `mieflex`, `mieext`, `mieadmflex`, `mieadmext`, `miedefflex`, `miedefext`, `msdsegundos`, `msdp1`, `msdp2`, `msdp3`, `msdmedia`, `msesegundos`, `msep1`, `msep2`, `msep3`, `msemedia`, `dataFM`) VALUES
(000000007, 'Apolonio Santiago da Silva Junior', 'Alexandra Silvestre de Lemos Silva', 0, 500, 123, 123, 123, 123, 2000, 234, 234, 4, 5, 4, 234, 234, 234, 5, 6, 5, 123, 123, 123, 132, 133, 123, 123, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, 234, 234, 234, 234, 2234, 234, 234, NULL, 234, 'Teste realizado com sucesso. Teste 33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-17'),
(000000008, 'Aldecy Ayres da Fonseca', 'Luís Aparecido de Oliveira Freitas', 0, 3, 66, 72, 93, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-28'),
(000000010, 'Celso Gomes de Moraes', 'Luís Aparecido de Oliveira Freitas', 10, 890, 890, 890, 890, 890, 890, 678, 678, 678, 678, 678, 678, 809, 789, 899, 789, 789, 789, 789, 567, 567, 567, 567, 567, 567, 345, 678, 678, 678, 678, 789, 789, 567, 567, 567, 56, 76, 567, 345, 678, 678, 678, 678, 789, 789, 567, 67, 57, 567, 567, 56, 345, 678, 678, 768, 678, 789, 89, 567, 67, 67, 76, 567, 456, 345, 787, 78, 678, 678, 'Teste 01 update Teste 02', 34, 5345, 345, 345, 345, 345, 345, 345, 345, 345, 35, 345, 543, 345, 345, 345, 45, 54, 43, 54, 45, 34, 54, 54, 34, 54, '2017-06-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_notification`
--

CREATE TABLE `system_notification` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_user_to_id` int(11) DEFAULT NULL,
  `subject` text,
  `message` text,
  `dt_message` text,
  `action_url` text,
  `action_label` text,
  `icon` text,
  `checked` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_objetivo_clinico`
--

CREATE TABLE `system_objetivo_clinico` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_objetivo_clinico`
--

INSERT INTO `system_objetivo_clinico` (`id`, `name`) VALUES
(0001, 'Hipertensão Arterial Sistêmica'),
(0002, 'Angina'),
(0003, 'Dispineia'),
(0004, 'Dislipidemia'),
(0005, 'Obesidade'),
(0006, 'Tabagismo'),
(0007, 'Depressão'),
(0008, 'Estresse');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_paciente`
--

CREATE TABLE `system_paciente` (
  `codigoPaciente` int(9) UNSIGNED ZEROFILL NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` int(2) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `peso` varchar(7) DEFAULT NULL,
  `estatura` int(3) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_paciente`
--

INSERT INTO `system_paciente` (`codigoPaciente`, `nome`, `sexo`, `dataNascimento`, `email`, `peso`, `estatura`, `telefone`) VALUES
(000000001, 'Viviane Resende Bonjardim Santiago', 1, '1986-01-28', 'vivicachos@gmail.com', '85', 165, '(61)98581-3445'),
(000000002, 'Fabio Lucas Santiago Bonjardim', 0, '2011-04-14', 'fabiolucas@yahoo.com.br', '35', 110, '(26)22222-2222'),
(000000004, 'Jairo Pereira Bonjardim', 0, '1955-04-15', 'jairo@icriacoes.com.br', '88', 180, '(27)98845-5888'),
(000000005, 'Ketelyn Santiago Bonjardim', 1, '2017-09-08', 'ketely@gmail.com', '18', 125, '(61)32640-824'),
(000000007, 'Apolonio Santiago da Silva Junior', 0, '1980-07-18', 'apolocomputacao@gmail.com', '90', 189, '(61)98495-2820'),
(000000008, 'Aldecy Ayres da Fonseca', 1, '1951-09-12', 'aldecy@gmail.com (falso)', '67', 162, '(61)03458-1296'),
(000000009, 'Celso Gomes de Moraes', 0, '1949-07-12', 'celsogomesdemoraes@gmail.com', '76', 165, '(61)98334-2440');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_preference`
--

CREATE TABLE `system_preference` (
  `id` text,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_prescricao`
--

CREATE TABLE `system_prescricao` (
  `id` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` varchar(60) NOT NULL,
  `codAvaliador` varchar(60) NOT NULL,
  `diagnostico` varchar(150) DEFAULT NULL,
  `angina` int(2) DEFAULT NULL,
  `hiperArterial` int(2) DEFAULT NULL,
  `tabagismo` int(2) DEFAULT NULL,
  `dislipidemia` int(2) DEFAULT NULL,
  `obesidade` int(2) DEFAULT NULL,
  `estresse` int(2) DEFAULT NULL,
  `depressao` int(8) DEFAULT NULL,
  `dispineia` int(6) DEFAULT NULL,
  `cardio` int(6) DEFAULT NULL,
  `fmr` int(6) DEFAULT NULL,
  `dlv` int(6) DEFAULT NULL,
  `ddo` int(6) DEFAULT NULL,
  `afme` int(6) DEFAULT NULL,
  `af` int(6) DEFAULT NULL,
  `me` int(11) DEFAULT NULL,
  `frequencia` int(4) DEFAULT NULL,
  `tempoAlta` int(4) DEFAULT NULL,
  `tempoBaixa` int(4) DEFAULT NULL,
  `fcinfB` int(4) DEFAULT NULL,
  `fcsupB` int(3) DEFAULT NULL,
  `fcinfA` int(3) DEFAULT NULL,
  `fcsupA` int(3) DEFAULT NULL,
  `tempo` int(4) DEFAULT NULL,
  `fcinf` int(3) DEFAULT NULL,
  `fcsup` int(3) DEFAULT NULL,
  `cargapi` int(4) DEFAULT NULL,
  `cargapi2` int(2) DEFAULT NULL,
  `tempopi` int(4) DEFAULT NULL,
  `seriepi` int(2) DEFAULT NULL,
  `repeticaopi` int(2) DEFAULT NULL,
  `fspi` int(3) DEFAULT NULL,
  `cargasi` int(2) DEFAULT NULL,
  `cargasi2` int(2) DEFAULT NULL,
  `temposi` int(4) DEFAULT NULL,
  `seriesi` int(2) DEFAULT NULL,
  `repeticaosi` int(2) DEFAULT NULL,
  `fssi` int(3) DEFAULT NULL,
  `duracaos` int(4) DEFAULT NULL,
  `cargas` int(2) DEFAULT NULL,
  `rpms` int(3) DEFAULT NULL,
  `manivela` int(4) DEFAULT NULL,
  `assento` int(4) DEFAULT NULL,
  `duracaoi` int(4) DEFAULT NULL,
  `cargai` int(2) DEFAULT NULL,
  `rpmi` int(3) DEFAULT NULL,
  `posicaoi` int(4) DEFAULT NULL,
  `esteiraV` int(4) DEFAULT NULL,
  `esteiraI` int(4) DEFAULT NULL,
  `lowback` int(4) DEFAULT NULL,
  `abdominal` int(4) DEFAULT NULL,
  `chestpress` int(4) DEFAULT NULL,
  `pulldown` int(4) DEFAULT NULL,
  `shoulderpress` int(4) DEFAULT NULL,
  `tricepsdips` int(4) DEFAULT NULL,
  `totalhip` int(4) DEFAULT NULL,
  `legextension` int(4) DEFAULT NULL,
  `abduction` int(4) DEFAULT NULL,
  `adduction` int(4) DEFAULT NULL,
  `seatedlegcurl` int(4) DEFAULT NULL,
  `seatedlegpress` int(4) DEFAULT NULL,
  `squat` int(4) DEFAULT NULL,
  `lowback2` int(4) DEFAULT NULL,
  `abdominal2` int(4) DEFAULT NULL,
  `chestpress2` int(4) DEFAULT NULL,
  `pulldown2` int(4) DEFAULT NULL,
  `shoulderpress2` int(4) DEFAULT NULL,
  `tricepsdips2` int(4) DEFAULT NULL,
  `totalhip2` int(4) DEFAULT NULL,
  `legextension2` int(4) DEFAULT NULL,
  `abduction2` int(4) DEFAULT NULL,
  `adduction2` int(4) DEFAULT NULL,
  `seatedlegcurl2` int(4) DEFAULT NULL,
  `seatedlegpress2` int(4) DEFAULT NULL,
  `squat2` int(4) DEFAULT NULL,
  `lowbackR` int(4) DEFAULT NULL,
  `abdominalR` int(4) DEFAULT NULL,
  `chestpressR` int(4) DEFAULT NULL,
  `pulldownR` int(4) DEFAULT NULL,
  `shoulderpressR` int(4) DEFAULT NULL,
  `tricepsdipsR` int(4) DEFAULT NULL,
  `totalhipR` int(4) DEFAULT NULL,
  `legextensionR` int(4) DEFAULT NULL,
  `abductionR` int(4) DEFAULT NULL,
  `adductionR` int(4) DEFAULT NULL,
  `seatedlegcurlR` int(4) DEFAULT NULL,
  `seatedlegpressR` int(4) DEFAULT NULL,
  `squatR` int(4) DEFAULT NULL,
  `lowbackI` int(4) DEFAULT NULL,
  `abdominalI` int(4) DEFAULT NULL,
  `chestpressI` int(4) DEFAULT NULL,
  `pulldownI` int(4) DEFAULT NULL,
  `shoulderpressI` int(4) DEFAULT NULL,
  `tricepsdipsI` int(4) DEFAULT NULL,
  `totalhipI` int(4) DEFAULT NULL,
  `legextensionI` int(4) DEFAULT NULL,
  `abductionI` int(4) DEFAULT NULL,
  `adductionI` int(4) DEFAULT NULL,
  `seatedlegcurlI` int(4) DEFAULT NULL,
  `seatedlegpressI` int(4) DEFAULT NULL,
  `squatI` int(4) DEFAULT NULL,
  `lowbackS` int(4) DEFAULT NULL,
  `abdominalS` int(4) DEFAULT NULL,
  `chestpressS` int(4) DEFAULT NULL,
  `pulldownS` int(4) DEFAULT NULL,
  `shoulderpressS` int(4) DEFAULT NULL,
  `tricepsdipsS` int(4) DEFAULT NULL,
  `totalhipS` int(4) DEFAULT NULL,
  `legextensionS` int(4) DEFAULT NULL,
  `abductionS` int(4) DEFAULT NULL,
  `adductionS` int(4) DEFAULT NULL,
  `seatedlegcurlS` int(4) DEFAULT NULL,
  `seatedlegpressS` int(4) DEFAULT NULL,
  `squatS` int(4) DEFAULT NULL,
  `parecer` text,
  `dataPresc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_prescricao`
--

INSERT INTO `system_prescricao` (`id`, `codPaciente`, `codAvaliador`, `diagnostico`, `angina`, `hiperArterial`, `tabagismo`, `dislipidemia`, `obesidade`, `estresse`, `depressao`, `dispineia`, `cardio`, `fmr`, `dlv`, `ddo`, `afme`, `af`, `me`, `frequencia`, `tempoAlta`, `tempoBaixa`, `fcinfB`, `fcsupB`, `fcinfA`, `fcsupA`, `tempo`, `fcinf`, `fcsup`, `cargapi`, `cargapi2`, `tempopi`, `seriepi`, `repeticaopi`, `fspi`, `cargasi`, `cargasi2`, `temposi`, `seriesi`, `repeticaosi`, `fssi`, `duracaos`, `cargas`, `rpms`, `manivela`, `assento`, `duracaoi`, `cargai`, `rpmi`, `posicaoi`, `esteiraV`, `esteiraI`, `lowback`, `abdominal`, `chestpress`, `pulldown`, `shoulderpress`, `tricepsdips`, `totalhip`, `legextension`, `abduction`, `adduction`, `seatedlegcurl`, `seatedlegpress`, `squat`, `lowback2`, `abdominal2`, `chestpress2`, `pulldown2`, `shoulderpress2`, `tricepsdips2`, `totalhip2`, `legextension2`, `abduction2`, `adduction2`, `seatedlegcurl2`, `seatedlegpress2`, `squat2`, `lowbackR`, `abdominalR`, `chestpressR`, `pulldownR`, `shoulderpressR`, `tricepsdipsR`, `totalhipR`, `legextensionR`, `abductionR`, `adductionR`, `seatedlegcurlR`, `seatedlegpressR`, `squatR`, `lowbackI`, `abdominalI`, `chestpressI`, `pulldownI`, `shoulderpressI`, `tricepsdipsI`, `totalhipI`, `legextensionI`, `abductionI`, `adductionI`, `seatedlegcurlI`, `seatedlegpressI`, `squatI`, `lowbackS`, `abdominalS`, `chestpressS`, `pulldownS`, `shoulderpressS`, `tricepsdipsS`, `totalhipS`, `legextensionS`, `abductionS`, `adductionS`, `seatedlegcurlS`, `seatedlegpressS`, `squatS`, `parecer`, `dataPresc`) VALUES
(000000006, 'Apolonio Santiago da Silva Junior', 'Alexandra Silvestre de Lemos Silva', 'Necessita tratamento', 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 1500, 500, 123, 123, 123, 123, 2000, 123, 123, 234, 234, 4, 5, 4, 234, 234, 234, 5, 6, 5, 324, 10, 12, 123, 223, 12312, 0, 12, 2312, 123, 1231, 2131, 123, 123, 123, 132, 133, 123, 123, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, 234, 234, 234, 234, 2234, 234, 234, NULL, 234, 'Teste realizado com sucesso. Teste 32', '2017-05-06'),
(000000007, 'Apolonio Santiago da Silva Junior', 'Alexandra Silvestre de Lemos Silva', 'Necessita tratamento', 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 1500, 500, 123, 123, 123, 123, 2000, 123, 123, 234, 234, 4, 5, 4, 234, 234, 234, 5, 6, 5, 324, 10, 12, 123, 223, 12312, 0, 12, 2312, 123, 1231, 2131, 123, 123, 123, 132, 133, 123, 123, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, 234, NULL, 234, 234, 234, 234, 234, 234, 234, 234, 234, 2234, 234, 234, NULL, 234, 'Teste realizado com sucesso. Teste 33', '2017-05-17'),
(000000009, 'Apolonio Santiago da Silva Junior', 'Gerson Cipriano Junior', 'teste12', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 143, 12, 23, 12341, 34123, 1234, 41234, 13, 1234, 1234, 3, 55, 3, 3, 3, 3, 3, 3, 34, 4, 4, 4, 4, 56, 56, NULL, 56, 56, 56, 56, 56, 56, 65, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 2, 2, 2, 2, 2, 3, 2, 2, 2, 2, 2, 2, 3, 'teste final', '2018-02-19'),
(000000010, 'Fabio Lucas Santiago Bonjardim', 'Luís Aparecido de Oliveira Freitas', 'Dor de Barriga', 0, 1, 1, 1, 0, 1, 0, 1, 0, 0, 1, 1, 1, 1, 0, 123, 12, 12, 1234, 1234, 1234, 1234, 12, 3241, 341, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'Teste 050', '2018-02-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_prescricao_objetivo`
--

CREATE TABLE `system_prescricao_objetivo` (
  `id` int(9) UNSIGNED ZEROFILL NOT NULL,
  `customer_id` int(9) UNSIGNED ZEROFILL NOT NULL,
  `skill_id` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_prescricao_objetivo`
--

INSERT INTO `system_prescricao_objetivo` (`id`, `customer_id`, `skill_id`) VALUES
(000000006, 000000001, 000006),
(000000007, 000000001, 000007),
(000000009, 000000002, 000001),
(000000010, 000000002, 000002),
(000000011, 000000002, 000006),
(000000012, 000000002, 000007),
(000000013, 000000002, 000008);

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_program`
--

CREATE TABLE `system_program` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `controller` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_program`
--

INSERT INTO `system_program` (`id`, `name`, `controller`) VALUES
(1, 'System Group Form', 'SystemGroupForm'),
(2, 'System Group List', 'SystemGroupList'),
(3, 'System Program Form', 'SystemProgramForm'),
(4, 'System Program List', 'SystemProgramList'),
(5, 'System User Form', 'SystemUserForm'),
(6, 'System User List', 'SystemUserList'),
(7, 'Common Page', 'CommonPage'),
(8, 'System PHP Info', 'SystemPHPInfoView'),
(9, 'System ChangeLog View', 'SystemChangeLogView'),
(10, 'Welcome View', 'WelcomeView'),
(11, 'System Sql Log', 'SystemSqlLogList'),
(12, 'System Profile View', 'SystemProfileView'),
(13, 'System Profile Form', 'SystemProfileForm'),
(14, 'System SQL Panel', 'SystemSQLPanel'),
(15, 'System Access Log', 'SystemAccessLogList'),
(16, 'System Message Form', 'SystemMessageForm'),
(17, 'System Message List', 'SystemMessageList'),
(18, 'System Message Form View', 'SystemMessageFormView'),
(19, 'System Notification List', 'SystemNotificationList'),
(20, 'System Notification Form View', 'SystemNotificationFormView'),
(21, 'System Document Category List', 'SystemDocumentCategoryFormList'),
(22, 'System Document Form', 'SystemDocumentForm'),
(23, 'System Document Upload Form', 'SystemDocumentUploadForm'),
(24, 'System Document List', 'SystemDocumentList'),
(25, 'System Shared Document List', 'SystemSharedDocumentList'),
(26, 'System Unit Form', 'SystemUnitForm'),
(27, 'System Unit List', 'SystemUnitList'),
(28, 'System Access stats', 'SystemAccessLogStats'),
(29, 'System Preference form', 'SystemPreferenceForm'),
(30, 'System Support form', 'SystemSupportForm'),
(31, 'Cadastro Paciente', 'CadastroPaciente'),
(32, 'Cadastro Avaliador', 'CadastroAvaliador'),
(33, 'Relatório Paciente', 'RelatorioPaciente'),
(34, 'Relatório Avaliador', 'RelatorioAvaliador'),
(35, 'Pesquisa Paciente', 'PesquisaPaciente'),
(36, 'Formulário Paciente', 'PacienteForm'),
(37, 'Cadastro Grupo Remédio', 'CadastroGrupoRemedio'),
(38, 'Cadastro Remédio', 'CadastroRemedio'),
(39, 'Relatórios de Pacientes PDF', 'PacienteRelatorio'),
(40, 'Cadastro de Avaliação de Equilíbrio', 'CadastroAvaliacaoEquilibrio'),
(41, 'Cadastro de Teste Wells', 'CadastroWells'),
(42, 'Pesquisa de Avaliador', 'PesquisaAvaliador'),
(43, 'Formulário Avaliador', 'AvaliadorForm'),
(44, 'Cadastro de Teste dos Ombros', 'CadastroTesteOmbros'),
(45, 'Pesquisa de Remédios', 'PesquisaRemedio'),
(46, 'Cadastro de Exames', 'CadastroExames'),
(47, 'Pesquisa de Exames', 'PesquisaExames'),
(48, 'Relatório CSV Exame', 'CSVPaciente'),
(49, 'Cadastro Exame Complementar', 'ExameComplementar'),
(50, 'Ficha do Paciente', 'FichaIndividual'),
(51, 'Formulário de Exame', 'ExameForm'),
(52, 'Cadastro de Prescrição', 'AvaliacaoPrescricao'),
(53, 'Pesquisa Prescrição', 'PesquisaPrescricao'),
(54, 'Formulário de Edição de Prescrição', 'PrescricaoForm'),
(55, 'Cadastro de Avaliação Ventilatória', 'CadastroVentilatoria'),
(56, 'Relatório Avaliação Ventiatória', 'RelatorioVentilatoria'),
(57, 'Formulário Avaliação Clínica', 'AvaliacaoPaciente'),
(58, 'Formulário de Questionário BDI', 'BDI'),
(59, 'Formulário de Avaliação Minnesota', 'Minnesota'),
(60, 'Formulário de Cadastro de HIIT', 'HIIT'),
(61, 'Cadastro de Treinamento Resistido', 'TreinamentoResistido'),
(62, 'Pesquisa de Treinamento Resistido', 'PesquisaTreinamentoResistido'),
(63, 'Formulário de Edição de Treinamento Resistido', 'TreinamentoResistidoForm'),
(64, 'Cadastro de Treinamento Aeróbico', 'TreinamentoAerobico'),
(65, 'Formulário de Edição de Treinamento Aeróbico', 'TreinamentoAerobicoForm'),
(66, 'Pesquisa de Treinamento Aeróbico', 'PesquisaTreinamentoAerobico'),
(67, 'Ficha de Avaliação', 'Ficha'),
(68, 'Formulário de Edição Hiit', 'HiitForm'),
(69, 'Pesquisa Hiit', 'PesquisaHiit'),
(70, 'Menu de Avaliação', 'MenuAvaliacao'),
(71, 'Menu de Prescrição', 'MenuPrescricao'),
(72, 'Menu do Paciente', 'MenuPaciente'),
(73, 'Menu do Avaliador', 'MenuAvaliador'),
(74, 'Menu de Evolução', 'MenuEvolucao'),
(75, 'Formulários Download', 'Formularios'),
(76, 'Pesquisa de Avaliação Clínica', 'PesquisaAvaliacaoClinica'),
(77, 'Formulário de Edição de Avaliação Clínica', 'AvaliacaoClinicaForm'),
(78, 'Formulário de Avaliação Muscoesquelética', 'Muscoesqueletica'),
(79, 'Pesquisa de Avaliação Muscoesquelética', 'PesquisaAvaliacaoMuscoesqueletica'),
(80, 'Formulário de Edição Avaliação Muscoesquelética', 'AvaliacaoMuscoesqueleticaForm'),
(81, 'System ChangeLog View', 'SystemChangeLogView'),
(82, 'Welcome View', 'WelcomeView'),
(83, 'System Sql Log', 'SystemSqlLogList'),
(84, 'System Profile View', 'SystemProfileView'),
(85, 'System Profile Form', 'SystemProfileForm'),
(86, 'System SQL Panel', 'SystemSQLPanel'),
(87, 'System Access Log', 'SystemAccessLogList'),
(88, 'System Message List', 'SystemMessageList'),
(89, 'System Message Form View', 'SystemMessageFormView'),
(90, 'System Notification List', 'SystemNotificationList'),
(91, 'System Notification Form View', 'SystemNotificationFormView'),
(92, 'System Document Category List', 'SystemDocumentCategoryFormList'),
(93, 'System Document Form', 'SystemDocumentForm'),
(94, 'System Document Upload Form', 'SystemDocumentUploadForm'),
(95, 'System Document List', 'SystemDocumentList'),
(96, 'System Shared Document List', 'SystemSharedDocumentList'),
(97, 'System Unit Form', 'SystemUnitForm'),
(98, 'System Unit List', 'SystemUnitList'),
(99, 'System Access stats', 'SystemAccessLogStats'),
(100, 'System Preference form', 'SystemPreferenceForm'),
(101, 'System Support form', 'SystemSupportForm'),
(102, 'System PHP Error', 'SystemPHPErrorLogView'),
(103, 'System Database Browser', 'SystemDatabaseExplorer'),
(104, 'System Table List', 'SystemTableList'),
(105, 'System Data Browser', 'SystemDataBrowser'),
(106, 'Formulario de Edicao de Exames', 'ExameForm'),
(107, 'Pesquisa Avaliação Muscoesquelética', 'PesquisaAvaliacaoMuscoesqueletica'),
(108, 'Formulário de Edição da Avaliação Muscoesquelética', 'AvaliacaoMuscoesqueleticaForm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_remedio`
--

CREATE TABLE `system_remedio` (
  `codigoRemedio` int(6) NOT NULL,
  `codigoGrupoRemedio` varchar(60) DEFAULT NULL,
  `descricaoRemedio` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_remedio`
--

INSERT INTO `system_remedio` (`codigoRemedio`, `codigoGrupoRemedio`, `descricaoRemedio`) VALUES
(1, 'Estalina', 'Estalina'),
(2, 'Inibidos da Enzima Conversora da Angiotensina (IECA)', 'Angiotensina');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_sql_log`
--

CREATE TABLE `system_sql_log` (
  `id` int(11) NOT NULL,
  `logdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login` text,
  `database_name` text,
  `sql_command` text,
  `statement_type` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_tipo_exames`
--

CREATE TABLE `system_tipo_exames` (
  `codTipoExame` int(3) UNSIGNED ZEROFILL NOT NULL,
  `descricaoTipoExame` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_tipo_exames`
--

INSERT INTO `system_tipo_exames` (`codTipoExame`, `descricaoTipoExame`) VALUES
(001, 'Radiografia Torax'),
(002, 'Eletrocardiograma'),
(003, 'Encefalograma');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_treinamento_aerobico`
--

CREATE TABLE `system_treinamento_aerobico` (
  `codAerobico` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` varchar(60) NOT NULL,
  `codAvaliador` varchar(60) NOT NULL,
  `sessao` int(2) DEFAULT NULL,
  `periodicidade` int(4) DEFAULT NULL,
  `tempoD` int(4) DEFAULT NULL,
  `minutos` int(4) DEFAULT NULL,
  `bdi1` int(4) DEFAULT NULL,
  `bdi2` int(4) DEFAULT NULL,
  `bei1` int(4) DEFAULT NULL,
  `bei2` int(4) DEFAULT NULL,
  `bdf1` int(4) DEFAULT NULL,
  `bdf2` int(4) DEFAULT NULL,
  `bef1` int(4) DEFAULT NULL,
  `bef2` int(11) DEFAULT NULL,
  `fci` int(11) DEFAULT NULL,
  `fcfim` int(11) DEFAULT NULL,
  `fcinf` int(11) DEFAULT NULL,
  `fcinf2` int(11) DEFAULT NULL,
  `fcalta` int(11) DEFAULT NULL,
  `fcalta2` int(11) DEFAULT NULL,
  `sati` int(11) DEFAULT NULL,
  `satfim` int(11) DEFAULT NULL,
  `tempo` int(4) DEFAULT NULL,
  `fcinftcim` int(4) DEFAULT NULL,
  `fcsuptcim` int(4) DEFAULT NULL,
  `duracaos` int(4) DEFAULT NULL,
  `cargas` int(4) DEFAULT NULL,
  `rpms` int(4) DEFAULT NULL,
  `manivela` int(4) DEFAULT NULL,
  `assento` int(4) DEFAULT NULL,
  `duracaoi` int(4) DEFAULT NULL,
  `cargai` int(4) DEFAULT NULL,
  `rpmi` int(4) DEFAULT NULL,
  `posicaoi` int(4) DEFAULT NULL,
  `esteiraV` int(4) DEFAULT NULL,
  `esteiraI` int(4) DEFAULT NULL,
  `parecer` text,
  `dataAerobico` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_treinamento_aerobico`
--

INSERT INTO `system_treinamento_aerobico` (`codAerobico`, `codPaciente`, `codAvaliador`, `sessao`, `periodicidade`, `tempoD`, `minutos`, `bdi1`, `bdi2`, `bei1`, `bei2`, `bdf1`, `bdf2`, `bef1`, `bef2`, `fci`, `fcfim`, `fcinf`, `fcinf2`, `fcalta`, `fcalta2`, `sati`, `satfim`, `tempo`, `fcinftcim`, `fcsuptcim`, `duracaos`, `cargas`, `rpms`, `manivela`, `assento`, `duracaoi`, `cargai`, `rpmi`, `posicaoi`, `esteiraV`, `esteiraI`, `parecer`, `dataAerobico`) VALUES
(000000001, 'Apolonio Santiago da Silva Junior', '', 3, 678, 678, 678, 123, 121, 123, 123, 123, 123, 123, 123, 123, 123, 678, 678, 678, 678, 123, 123, 12, 123, 123, 2, 123412, 123, 213, 123, 12, 123, 123, 1234, 213, 123, 'Teste 29 com sucesso', '2017-05-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_treinamento_resistido`
--

CREATE TABLE `system_treinamento_resistido` (
  `codTr` int(9) UNSIGNED ZEROFILL NOT NULL,
  `codPaciente` varchar(60) NOT NULL,
  `codAvaliador` varchar(60) NOT NULL,
  `sessao` int(2) DEFAULT NULL,
  `periodicidade` int(4) DEFAULT NULL,
  `tempoD` int(4) DEFAULT NULL,
  `minutos` int(4) DEFAULT NULL,
  `bdi1` int(4) DEFAULT NULL,
  `bdi2` int(4) DEFAULT NULL,
  `bei1` int(4) DEFAULT NULL,
  `bei2` int(4) DEFAULT NULL,
  `bdf1` int(4) DEFAULT NULL,
  `bdf2` int(4) DEFAULT NULL,
  `bef1` int(4) DEFAULT NULL,
  `bef2` int(11) DEFAULT NULL,
  `fci` int(11) DEFAULT NULL,
  `fcfim` int(11) DEFAULT NULL,
  `fcinf` int(11) DEFAULT NULL,
  `fcinf2` int(11) DEFAULT NULL,
  `fcalta` int(11) DEFAULT NULL,
  `fcalta2` int(11) DEFAULT NULL,
  `sati` int(11) DEFAULT NULL,
  `satfim` int(11) DEFAULT NULL,
  `lowback` int(4) DEFAULT NULL,
  `abdominal` int(4) DEFAULT NULL,
  `chestpress` int(4) DEFAULT NULL,
  `pulldown` int(4) DEFAULT NULL,
  `shoulderpress` int(4) DEFAULT NULL,
  `tricepsdips` int(4) DEFAULT NULL,
  `totalhip` int(4) DEFAULT NULL,
  `legextension` int(4) DEFAULT NULL,
  `abduction` int(4) DEFAULT NULL,
  `adduction` int(4) DEFAULT NULL,
  `seatedlegcurl` int(4) DEFAULT NULL,
  `seatedlegpress` int(4) DEFAULT NULL,
  `squat` int(4) DEFAULT NULL,
  `lowback2` int(4) DEFAULT NULL,
  `abdominal2` int(4) DEFAULT NULL,
  `chestpress2` int(4) DEFAULT NULL,
  `pulldown2` int(4) DEFAULT NULL,
  `shoulderpress2` int(4) DEFAULT NULL,
  `tricepsdips2` int(4) DEFAULT NULL,
  `totalhip2` int(4) DEFAULT NULL,
  `legextension2` int(4) DEFAULT NULL,
  `abduction2` int(4) DEFAULT NULL,
  `adduction2` int(4) DEFAULT NULL,
  `seatedlegcurl2` int(4) DEFAULT NULL,
  `seatedlegpress2` int(4) DEFAULT NULL,
  `squat2` int(4) DEFAULT NULL,
  `lowbackR` int(4) DEFAULT NULL,
  `abdominalR` int(4) DEFAULT NULL,
  `chestpressR` int(4) DEFAULT NULL,
  `pulldownR` int(4) DEFAULT NULL,
  `shoulderpressR` int(4) DEFAULT NULL,
  `tricepsdipsR` int(4) DEFAULT NULL,
  `totalhipR` int(4) DEFAULT NULL,
  `legextensionR` int(4) DEFAULT NULL,
  `abductionR` int(4) DEFAULT NULL,
  `adductionR` int(4) DEFAULT NULL,
  `seatedlegcurlR` int(4) DEFAULT NULL,
  `seatedlegpressR` int(4) DEFAULT NULL,
  `squatR` int(4) DEFAULT NULL,
  `lowbackI` int(4) DEFAULT NULL,
  `abdominalI` int(4) DEFAULT NULL,
  `chestpressI` int(4) DEFAULT NULL,
  `pulldownI` int(4) DEFAULT NULL,
  `shoulderpressI` int(4) DEFAULT NULL,
  `tricepsdipsI` int(4) DEFAULT NULL,
  `totalhipI` int(4) DEFAULT NULL,
  `legextensionI` int(4) DEFAULT NULL,
  `abductionI` int(4) DEFAULT NULL,
  `adductionI` int(4) DEFAULT NULL,
  `seatedlegcurlI` int(4) DEFAULT NULL,
  `seatedlegpressI` int(4) DEFAULT NULL,
  `squatI` int(4) DEFAULT NULL,
  `lowbackS` int(4) DEFAULT NULL,
  `abdominalS` int(4) DEFAULT NULL,
  `chestpressS` int(4) DEFAULT NULL,
  `pulldownS` int(4) DEFAULT NULL,
  `shoulderpressS` int(4) DEFAULT NULL,
  `tricepsdipsS` int(4) DEFAULT NULL,
  `totalhipS` int(4) DEFAULT NULL,
  `legextensionS` int(4) DEFAULT NULL,
  `abductionS` int(4) DEFAULT NULL,
  `adductionS` int(4) DEFAULT NULL,
  `seatedlegcurlS` int(4) DEFAULT NULL,
  `seatedlegpressS` int(4) DEFAULT NULL,
  `squatS` int(4) DEFAULT NULL,
  `parecer` text,
  `dataTr` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_treinamento_resistido`
--

INSERT INTO `system_treinamento_resistido` (`codTr`, `codPaciente`, `codAvaliador`, `sessao`, `periodicidade`, `tempoD`, `minutos`, `bdi1`, `bdi2`, `bei1`, `bei2`, `bdf1`, `bdf2`, `bef1`, `bef2`, `fci`, `fcfim`, `fcinf`, `fcinf2`, `fcalta`, `fcalta2`, `sati`, `satfim`, `lowback`, `abdominal`, `chestpress`, `pulldown`, `shoulderpress`, `tricepsdips`, `totalhip`, `legextension`, `abduction`, `adduction`, `seatedlegcurl`, `seatedlegpress`, `squat`, `lowback2`, `abdominal2`, `chestpress2`, `pulldown2`, `shoulderpress2`, `tricepsdips2`, `totalhip2`, `legextension2`, `abduction2`, `adduction2`, `seatedlegcurl2`, `seatedlegpress2`, `squat2`, `lowbackR`, `abdominalR`, `chestpressR`, `pulldownR`, `shoulderpressR`, `tricepsdipsR`, `totalhipR`, `legextensionR`, `abductionR`, `adductionR`, `seatedlegcurlR`, `seatedlegpressR`, `squatR`, `lowbackI`, `abdominalI`, `chestpressI`, `pulldownI`, `shoulderpressI`, `tricepsdipsI`, `totalhipI`, `legextensionI`, `abductionI`, `adductionI`, `seatedlegcurlI`, `seatedlegpressI`, `squatI`, `lowbackS`, `abdominalS`, `chestpressS`, `pulldownS`, `shoulderpressS`, `tricepsdipsS`, `totalhipS`, `legextensionS`, `abductionS`, `adductionS`, `seatedlegcurlS`, `seatedlegpressS`, `squatS`, `parecer`, `dataTr`) VALUES
(000000001, 'Apolonio Santiago da Silva Junior', 'Gerson Cipriano Junior', 3, 678, 678, 678, 123, 121, 123, 123, 123, 123, 123, 123, 123, 123, 678, 678, 678, 678, 123, 123, 678, 678, 8, 678, 678, 667, 76, 76, 687, 87, 687, 768, 87, 678, 678, 678, 687, 678, 8, 786, 876, 68, 68, 68, 687687, 687, 678, 678, 678, 687, 687, 7687, 87, 87, 768, 768, 76, 68, 68, 678, 678, 678, 86, 68, 87, 687, 68, 76, 76, 87, 76, 76, 867, 678, 678, 687, 787, 68, 68, 7687, 876, 87, 68, 87, 876, 'Teste 29 com sucesso', '2017-05-19'),
(000000002, 'Viviane Resende Bonjardim Santiago', 'Gerson Cipriano Junior', 5, 789, 789, 789, 1239, 789, 789, 789, 789, 789, 789, 789, 789, 789, 789, 789, 789, 789, 789, 789, 998, 809, 9, 9, 809, 80, 0, 809, 80, 980, 98, 98, 809, 890, 809, 809, 80, 0, 98, 98, 80, 98, 98, 98, 9, 80, 89, 9, 0, 980, 9, 98, 9, 9, 98, 9, 9, 809, 98, 9, 80, 98, 9, 9, 9, 9, 809, 9, 80, 80, 8, 9, 890, 98, 9, 809, 809, 809, 809, 809, 80, 98, 98, 9, 809, 'Teste 41', '2017-05-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_unit`
--

CREATE TABLE `system_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_user`
--

CREATE TABLE `system_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `frontpage_id` int(11) DEFAULT NULL,
  `system_unit_id` int(11) DEFAULT NULL,
  `active` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_user`
--

INSERT INTO `system_user` (`id`, `name`, `login`, `password`, `email`, `frontpage_id`, `system_unit_id`, `active`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.net', 10, NULL, 'Y'),
(2, 'User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@user.net', 7, NULL, 'Y'),
(3, 'Apolonio Santiago da Silva Junior', 'santiago', 'a6f30815a43f38ec6de95b9a9d74da37', 'apolocomputacao@gmail.com', 10, NULL, 'Y'),
(4, 'Luis de oliveira Freitas', 'luis', '502ff82f7f1f8218dd41201fe4353687', 'luisdeoliveirafreitas@gmail.com', 73, NULL, 'Y'),
(5, 'Viviane Resende Bonjardim Santiago', 'viviane', '202cb962ac59075b964b07152d234b70', 'vivicachos@gmail.com', 35, NULL, 'Y'),
(6, 'Liliane Campos Machado', 'Liliane', '4d9482987c356ec2ddf8837b21188e48', 'lcmpedagogia@gmail.com', NULL, NULL, 'Y'),
(7, 'vivia sant', 'vivia', '202cb962ac59075b964b07152d234b70', 'vivicachos@hotmail.com', 50, NULL, 'Y');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_user_group`
--

CREATE TABLE `system_user_group` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_user_group`
--

INSERT INTO `system_user_group` (`id`, `system_user_id`, `system_group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 2),
(137, 7, 3),
(138, 7, 4),
(139, 7, 5),
(140, 7, 6),
(141, 7, 7),
(142, 7, 8),
(143, 7, 9),
(144, 7, 10),
(165, 4, 1),
(166, 4, 3),
(167, 4, 4),
(168, 4, 5),
(169, 4, 6),
(170, 4, 7),
(171, 4, 8),
(172, 4, 9),
(173, 4, 10),
(174, 4, 11),
(184, 6, 3),
(185, 6, 4),
(186, 6, 6),
(187, 6, 7),
(188, 6, 9),
(189, 6, 10),
(190, 6, 11),
(191, 5, 3),
(192, 5, 4),
(193, 5, 5),
(194, 5, 6),
(195, 5, 7),
(196, 5, 8),
(197, 5, 9),
(198, 5, 10),
(199, 5, 11),
(200, 3, 1),
(201, 3, 2),
(202, 3, 3),
(203, 3, 4),
(204, 3, 5),
(205, 3, 6),
(206, 3, 7),
(207, 3, 8),
(208, 3, 9),
(209, 3, 10),
(210, 3, 11),
(211, 3, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_user_program`
--

CREATE TABLE `system_user_program` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_user_program`
--

INSERT INTO `system_user_program` (`id`, `system_user_id`, `system_program_id`) VALUES
(1, 2, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_user_unit`
--

CREATE TABLE `system_user_unit` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `system_avaliacao_bdi`
--
ALTER TABLE `system_avaliacao_bdi`
  ADD PRIMARY KEY (`codBDI`);

--
-- Indexes for table `system_avaliacao_clinica`
--
ALTER TABLE `system_avaliacao_clinica`
  ADD PRIMARY KEY (`codAva`);

--
-- Indexes for table `system_avaliacao_equilibrio`
--
ALTER TABLE `system_avaliacao_equilibrio`
  ADD PRIMARY KEY (`codAvaliacaoEquilibrio`);

--
-- Indexes for table `system_avaliacao_hiit`
--
ALTER TABLE `system_avaliacao_hiit`
  ADD PRIMARY KEY (`codHiit`);

--
-- Indexes for table `system_avaliacao_minnesota`
--
ALTER TABLE `system_avaliacao_minnesota`
  ADD PRIMARY KEY (`codMin`);

--
-- Indexes for table `system_avaliacao_ombros`
--
ALTER TABLE `system_avaliacao_ombros`
  ADD PRIMARY KEY (`codAvaliacaoOmbros`);

--
-- Indexes for table `system_avaliacao_ventilatoria`
--
ALTER TABLE `system_avaliacao_ventilatoria`
  ADD PRIMARY KEY (`codVent`);

--
-- Indexes for table `system_avaliacao_wells`
--
ALTER TABLE `system_avaliacao_wells`
  ADD PRIMARY KEY (`codWells`),
  ADD KEY `codWells` (`codWells`),
  ADD KEY `codWells_2` (`codWells`);

--
-- Indexes for table `system_avaliador`
--
ALTER TABLE `system_avaliador`
  ADD PRIMARY KEY (`codigoAvaliador`);

--
-- Indexes for table `system_change_log`
--
ALTER TABLE `system_change_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_complementar_exame`
--
ALTER TABLE `system_complementar_exame`
  ADD PRIMARY KEY (`codExameComp`);

--
-- Indexes for table `system_document`
--
ALTER TABLE `system_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_document_category`
--
ALTER TABLE `system_document_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_document_group`
--
ALTER TABLE `system_document_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_document_user`
--
ALTER TABLE `system_document_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_exame_item`
--
ALTER TABLE `system_exame_item`
  ADD PRIMARY KEY (`codExameItem`);

--
-- Indexes for table `system_group`
--
ALTER TABLE `system_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_group_program`
--
ALTER TABLE `system_group_program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `system_group_program_program_idx` (`system_program_id`),
  ADD KEY `system_group_program_group_idx` (`system_group_id`);

--
-- Indexes for table `system_grupo_remedio`
--
ALTER TABLE `system_grupo_remedio`
  ADD PRIMARY KEY (`codigoGrupoRemedio`);

--
-- Indexes for table `system_message`
--
ALTER TABLE `system_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_muscoesqueletica`
--
ALTER TABLE `system_muscoesqueletica`
  ADD PRIMARY KEY (`codFM`);

--
-- Indexes for table `system_notification`
--
ALTER TABLE `system_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_objetivo_clinico`
--
ALTER TABLE `system_objetivo_clinico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_paciente`
--
ALTER TABLE `system_paciente`
  ADD PRIMARY KEY (`codigoPaciente`);

--
-- Indexes for table `system_prescricao`
--
ALTER TABLE `system_prescricao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_prescricao_objetivo`
--
ALTER TABLE `system_prescricao_objetivo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_program`
--
ALTER TABLE `system_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_remedio`
--
ALTER TABLE `system_remedio`
  ADD PRIMARY KEY (`codigoRemedio`);

--
-- Indexes for table `system_sql_log`
--
ALTER TABLE `system_sql_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_tipo_exames`
--
ALTER TABLE `system_tipo_exames`
  ADD PRIMARY KEY (`codTipoExame`);

--
-- Indexes for table `system_treinamento_aerobico`
--
ALTER TABLE `system_treinamento_aerobico`
  ADD PRIMARY KEY (`codAerobico`);

--
-- Indexes for table `system_treinamento_resistido`
--
ALTER TABLE `system_treinamento_resistido`
  ADD PRIMARY KEY (`codTr`);

--
-- Indexes for table `system_unit`
--
ALTER TABLE `system_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_user`
--
ALTER TABLE `system_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `system_user_program_idx` (`frontpage_id`);

--
-- Indexes for table `system_user_group`
--
ALTER TABLE `system_user_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `system_user_group_group_idx` (`system_group_id`),
  ADD KEY `system_user_group_user_idx` (`system_user_id`);

--
-- Indexes for table `system_user_program`
--
ALTER TABLE `system_user_program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `system_user_program_program_idx` (`system_program_id`),
  ADD KEY `system_user_program_user_idx` (`system_user_id`);

--
-- Indexes for table `system_user_unit`
--
ALTER TABLE `system_user_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `system_user_id` (`system_user_id`),
  ADD KEY `system_unit_id` (`system_unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `system_avaliacao_bdi`
--
ALTER TABLE `system_avaliacao_bdi`
  MODIFY `codBDI` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `system_avaliacao_clinica`
--
ALTER TABLE `system_avaliacao_clinica`
  MODIFY `codAva` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `system_avaliacao_equilibrio`
--
ALTER TABLE `system_avaliacao_equilibrio`
  MODIFY `codAvaliacaoEquilibrio` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `system_avaliacao_hiit`
--
ALTER TABLE `system_avaliacao_hiit`
  MODIFY `codHiit` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `system_avaliacao_minnesota`
--
ALTER TABLE `system_avaliacao_minnesota`
  MODIFY `codMin` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `system_avaliacao_ombros`
--
ALTER TABLE `system_avaliacao_ombros`
  MODIFY `codAvaliacaoOmbros` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `system_avaliacao_ventilatoria`
--
ALTER TABLE `system_avaliacao_ventilatoria`
  MODIFY `codVent` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `system_complementar_exame`
--
ALTER TABLE `system_complementar_exame`
  MODIFY `codExameComp` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `system_exame_item`
--
ALTER TABLE `system_exame_item`
  MODIFY `codExameItem` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `system_grupo_remedio`
--
ALTER TABLE `system_grupo_remedio`
  MODIFY `codigoGrupoRemedio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `system_muscoesqueletica`
--
ALTER TABLE `system_muscoesqueletica`
  MODIFY `codFM` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `system_objetivo_clinico`
--
ALTER TABLE `system_objetivo_clinico`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `system_paciente`
--
ALTER TABLE `system_paciente`
  MODIFY `codigoPaciente` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `system_prescricao`
--
ALTER TABLE `system_prescricao`
  MODIFY `id` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `system_prescricao_objetivo`
--
ALTER TABLE `system_prescricao_objetivo`
  MODIFY `id` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `system_remedio`
--
ALTER TABLE `system_remedio`
  MODIFY `codigoRemedio` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `system_tipo_exames`
--
ALTER TABLE `system_tipo_exames`
  MODIFY `codTipoExame` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `system_treinamento_aerobico`
--
ALTER TABLE `system_treinamento_aerobico`
  MODIFY `codAerobico` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `system_treinamento_resistido`
--
ALTER TABLE `system_treinamento_resistido`
  MODIFY `codTr` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `system_group_program`
--
ALTER TABLE `system_group_program`
  ADD CONSTRAINT `system_group_program_ibfk_1` FOREIGN KEY (`system_group_id`) REFERENCES `system_group` (`id`),
  ADD CONSTRAINT `system_group_program_ibfk_2` FOREIGN KEY (`system_program_id`) REFERENCES `system_program` (`id`);

--
-- Limitadores para a tabela `system_user`
--
ALTER TABLE `system_user`
  ADD CONSTRAINT `system_user_ibfk_1` FOREIGN KEY (`frontpage_id`) REFERENCES `system_program` (`id`);

--
-- Limitadores para a tabela `system_user_group`
--
ALTER TABLE `system_user_group`
  ADD CONSTRAINT `system_user_group_ibfk_1` FOREIGN KEY (`system_user_id`) REFERENCES `system_user` (`id`),
  ADD CONSTRAINT `system_user_group_ibfk_2` FOREIGN KEY (`system_group_id`) REFERENCES `system_group` (`id`);

--
-- Limitadores para a tabela `system_user_program`
--
ALTER TABLE `system_user_program`
  ADD CONSTRAINT `system_user_program_ibfk_1` FOREIGN KEY (`system_user_id`) REFERENCES `system_user` (`id`),
  ADD CONSTRAINT `system_user_program_ibfk_2` FOREIGN KEY (`system_program_id`) REFERENCES `system_program` (`id`);

--
-- Limitadores para a tabela `system_user_unit`
--
ALTER TABLE `system_user_unit`
  ADD CONSTRAINT `system_user_unit_ibfk_1` FOREIGN KEY (`system_user_id`) REFERENCES `system_user` (`id`),
  ADD CONSTRAINT `system_user_unit_ibfk_2` FOREIGN KEY (`system_unit_id`) REFERENCES `system_unit` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
