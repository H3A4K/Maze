-- Delete in order to respect foreign key constraints
DELETE FROM `scores`;
DELETE FROM `players`;

-- Reset auto_increment
ALTER TABLE `scores` AUTO_INCREMENT = 1;

-- Players
-- Please note, that these Names and Birthdates are completely fictional
INSERT INTO `players` (`email`, `birthdate`, `total_games`, `average`) VALUES
('albert.einstein@yahoo.de', '1955-04-18', 1, 0.39),
('bovbela_THEGOAT@mcmaster.ca', '2004-09-08', 4, 0.319),
('dovbenys_THEGIVEROFMARKS@mcmaster.ca', '2003-03-14', 1, 1.004),
('dumitruf_THEANCIENT@mcmaster.ca', '2005-12-07', 1, 0.217),
('hashmik_THEMITSUBISHIDATAMAN@mcmaster.ca', '2004-08-11', 1, 0.225),
('Ida.Know@gmail.com', '1987-03-14', 1, 0.536),
('joe@gmail.ca', '1111-11-11', 4, 0.184),
('Justin.Time@outlook.com', '1993-09-05', 1, 0.204),
('lochness@monster.scot', '1933-05-02', 2, 0.1),
('Marie.Curie@hotmail.com', '1867-11-07', 2, 0.156),
('melvim1_THEALLKNOWING@mcmaster.ca', '2004-05-26', 1, 0.272),
('scotts52@mcmaster.ca', '1995-06-23', 13, 0.267),
('shahv47_THEKEEPEROFTHEFIRSTLAB@mcmaster.ca', '2003-03-18', 1, 0.124),
('shahza_THEDASHING@mcmaster.ca', '2004-10-23', 1, 0.269),
('sharmg36_THEWISE@mcmaster.ca', '2003-11-23', 1, 0.292),
('zhaok31_THEPLASTIC@mcmaster.ca', '2004-05-25', 1, 0.205);



-- Scores
INSERT INTO `scores` (`id`, `email`, `rooms`, `time`, `controller`, `date`, `time_completed`) VALUES
(1, 'joe@gmail.ca', b'00', 1068, b'1', '2026-04-02', '20:07:31'),
(2, 'joe@gmail.ca', b'00', 3652, b'1', '2026-04-02', '20:07:52'),
(3, 'joe@gmail.ca', b'01', 6347, b'1', '2026-04-02', '20:08:03'),
(4, 'joe@gmail.ca', b'01', 20203, b'1', '2026-04-02', '20:08:31'),
(5, 'lochness@monster.scot', b'01', 4792, b'1', '2026-04-02', '20:11:29'),
(6, 'lochness@monster.scot', b'00', 1512, b'0', '2026-04-02', '20:11:41'),
(7, 'albert.einstein@yahoo.de', b'00', 3896, b'0', '2026-04-02', '20:15:53'),
(8, 'Ida.Know@gmail.com', b'00', 5355, b'0', '2026-04-02', '20:28:56'),
(9, 'Justin.Time@outlook.com', b'00', 2044, b'1', '2026-04-02', '20:30:11'),
(10, 'Marie.Curie@hotmail.com', b'00', 1269, b'1', '2026-04-02', '20:31:17'),
(11, 'Marie.Curie@hotmail.com', b'00', 1852, b'1', '2026-04-02', '20:31:23'),
(12, 'scotts52@mcmaster.ca', b'00', 1767, b'1', '2026-04-02', '20:42:26'),
(13, 'scotts52@mcmaster.ca', b'00', 3182, b'1', '2026-04-02', '20:42:33'),
(14, 'scotts52@mcmaster.ca', b'00', 2824, b'1', '2026-04-02', '20:42:41'),
(15, 'scotts52@mcmaster.ca', b'00', 5860, b'1', '2026-04-02', '20:42:49'),
(16, 'scotts52@mcmaster.ca', b'00', 1917, b'1', '2026-04-02', '20:42:58'),
(17, 'scotts52@mcmaster.ca', b'00', 1761, b'1', '2026-04-02', '20:43:05'),
(18, 'scotts52@mcmaster.ca', b'00', 3366, b'1', '2026-04-02', '20:43:11'),
(19, 'scotts52@mcmaster.ca', b'00', 1944, b'1', '2026-04-02', '20:43:23'),
(20, 'scotts52@mcmaster.ca', b'00', 2376, b'1', '2026-04-02', '20:43:29'),
(21, 'bovbela_THEGOAT@mcmaster.ca', b'00', 3581, b'1', '2026-04-02', '20:44:38'),
(22, 'bovbela_THEGOAT@mcmaster.ca', b'00', 1803, b'1', '2026-04-02', '20:44:46'),
(23, 'bovbela_THEGOAT@mcmaster.ca', b'00', 3840, b'1', '2026-04-02', '20:45:01'),
(24, 'bovbela_THEGOAT@mcmaster.ca', b'00', 3525, b'1', '2026-04-02', '20:45:10'),
(25, 'dovbenys_THEGIVEROFMARKS@mcmaster.ca', b'00', 10036, b'1', '2026-04-02', '20:46:12'),
(26, 'dumitruf_THEANCIENT@mcmaster.ca', b'00', 2171, b'1', '2026-04-02', '20:47:23'),
(27, 'zhaok31_THEPLASTIC@mcmaster.ca', b'00', 2046, b'1', '2026-04-02', '20:49:13'),
(28, 'shahv47_THEKEEPEROFTHEFIRSTLAB@mcmaster.ca', b'00', 1239, b'1', '2026-04-02', '20:50:22'),
(29, 'sharmg36_THEWISE@mcmaster.ca', b'00', 2919, b'1', '2026-04-02', '20:56:17'),
(30, 'shahza_THEDASHING@mcmaster.ca', b'00', 2687, b'1', '2026-04-02', '20:57:21'),
(31, 'melvim1_THEALLKNOWING@mcmaster.ca', b'00', 2724, b'1', '2026-04-02', '20:58:55'),
(32, 'hashmik_THEMITSUBISHIDATAMAN@mcmaster.ca', b'00', 2252, b'1', '2026-04-02', '21:02:17'),
(33, 'scotts52@mcmaster.ca', b'01', 24199, b'1', '2026-04-02', '21:03:35'),
(34, 'scotts52@mcmaster.ca', b'01', 26688, b'1', '2026-04-02', '21:04:08'),
(35, 'scotts52@mcmaster.ca', b'01', 17760, b'1', '2026-04-02', '21:04:30'),
(36, 'scotts52@mcmaster.ca', b'00', 2848, b'1', '2026-04-02', '21:07:08');