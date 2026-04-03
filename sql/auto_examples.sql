-- Delete in order to respect foreign key constraints
DELETE FROM `scores`;
DELETE FROM `players`;

-- Reset auto_increment
ALTER TABLE `scores` AUTO_INCREMENT = 1;

-- Players
INSERT INTO `players` (`email`, `birthdate`, `total_games`, `average`) VALUES
('alice@example.com', '1990-03-15',  2, 0.535),
('bob@example.com', '1985-11-22',  3, 0.507),
('carol@example.com', '2000-07-04',  7, 0.532),
('dave@example.com', '1978-01-30',  3, 0.387),
('eve@example.com', '1995-09-09',  5, 0.578),
('frank@example.com', '1992-05-18',  6, 0.565),
('grace@example.com', '1988-12-03',  7, 0.471),
('hank@example.com', '2001-08-27',  5, 0.448),
('ivy@example.com', '1997-02-14',  5, 0.322),
('jake@example.com', '1983-10-31',  3, 0.700),
('karen@example.com', '1993-06-22',  6, 0.645),
('liam@example.com', '2003-04-11',  7, 0.516);

-- Scores
INSERT INTO `scores` (`email`, `rooms`, `time`, `controller`, `date`, `time_completed`) VALUES
-- 10 rooms
('alice@example.com', b'01',    5787, b'0', '2024-02-09', '21:03:16'),
('alice@example.com', b'01',    4904, b'0', '2024-12-05', '07:44:45'),
('bob@example.com', b'01',    3791, b'1', '2024-12-28', '16:06:56'),
('carol@example.com', b'01',    7865, b'0', '2024-04-02', '14:59:52'),
('carol@example.com', b'01',    4244, b'1', '2024-02-02', '21:53:28'),
('eve@example.com', b'01',    9072, b'1', '2024-08-21', '18:37:36'),
('eve@example.com', b'01',    7659, b'0', '2024-11-16', '12:37:26'),
('frank@example.com', b'01',    5814, b'1', '2024-10-27', '16:44:04'),
('frank@example.com', b'01',    9754, b'0', '2024-05-17', '08:56:55'),
('frank@example.com', b'01',    2005, b'0', '2024-05-07', '13:52:40'),
('grace@example.com', b'01',    4731, b'1', '2024-10-24', '17:20:32'),
('grace@example.com', b'01',    7319, b'1', '2024-11-29', '22:37:18'),
('grace@example.com', b'01',    5674, b'0', '2024-01-31', '22:48:52'),
('hank@example.com', b'01',    5380, b'0', '2024-05-24', '07:52:41'),
('ivy@example.com', b'01',    2283, b'1', '2024-06-27', '20:46:18'),
('ivy@example.com', b'01',    2099, b'0', '2024-02-24', '10:40:58'),
('ivy@example.com', b'01',    5064, b'1', '2024-01-03', '17:18:20'),
('jake@example.com', b'01',    9831, b'1', '2024-07-09', '16:12:02'),
('jake@example.com', b'01',    8072, b'1', '2024-02-26', '15:03:46'),
('karen@example.com', b'01',    9741, b'1', '2024-10-14', '11:27:48'),
('karen@example.com', b'01',    5711, b'0', '2024-07-06', '16:19:00'),
('liam@example.com', b'01',    4728, b'1', '2024-05-29', '14:15:43'),
('liam@example.com', b'01',    5219, b'1', '2024-01-30', '18:08:41'),
('liam@example.com', b'01',    4455, b'1', '2024-03-16', '17:57:37'),
('liam@example.com', b'01',    5314, b'0', '2024-09-13', '16:03:52'),
-- 100 rooms
('bob@example.com', b'10',   52177, b'1', '2024-04-30', '07:47:14'),
('carol@example.com', b'10',   43073, b'0', '2024-10-03', '10:39:52'),
('carol@example.com', b'10',   32293, b'1', '2024-10-15', '22:17:30'),
('carol@example.com', b'10',   62147, b'1', '2024-09-22', '09:44:23'),
('carol@example.com', b'10',   42667, b'0', '2024-07-21', '21:37:01'),
('carol@example.com', b'10',   71419, b'0', '2024-01-09', '07:29:14'),
('dave@example.com', b'10',   58344, b'0', '2024-08-22', '19:53:53'),
('dave@example.com', b'10',   25460, b'0', '2024-07-16', '16:22:46'),
('eve@example.com', b'10',   43413, b'1', '2024-06-23', '14:20:31'),
('frank@example.com', b'10',   57333, b'1', '2024-07-24', '09:45:23'),
('frank@example.com', b'10',   70476, b'0', '2024-10-17', '11:30:25'),
('grace@example.com', b'10',   43359, b'0', '2024-06-29', '08:28:28'),
('grace@example.com', b'10',   28997, b'1', '2024-05-17', '15:58:17'),
('grace@example.com', b'10',   28662, b'0', '2024-05-07', '17:49:19'),
('hank@example.com', b'10',   54509, b'1', '2024-03-02', '10:48:32'),
('hank@example.com', b'10',   54468, b'0', '2024-10-05', '07:11:01'),
('ivy@example.com', b'10',   34469, b'0', '2024-03-29', '09:33:26'),
('jake@example.com', b'10',   31081, b'1', '2024-08-22', '19:50:23'),
('karen@example.com', b'10',   70668, b'1', '2024-04-14', '14:05:14'),
('karen@example.com', b'10',   74802, b'1', '2024-03-13', '20:17:46'),
('liam@example.com', b'10',   62421, b'1', '2024-03-30', '15:34:24'),
('liam@example.com', b'10',   53655, b'1', '2024-05-14', '13:50:56'),
-- 1000 rooms
('bob@example.com', b'11',  621590, b'0', '2024-06-18', '21:04:46'),
('dave@example.com', b'11',  321652, b'0', '2024-05-22', '08:37:05'),
('eve@example.com', b'11',  546389, b'0', '2024-10-15', '10:22:27'),
('eve@example.com', b'11',  236879, b'0', '2024-05-29', '12:42:28'),
('frank@example.com', b'11',  355771, b'0', '2024-11-22', '18:55:48'),
('grace@example.com', b'11',  515022, b'1', '2024-04-28', '11:27:22'),
('hank@example.com', b'11',  380627, b'0', '2024-04-08', '07:32:42'),
('hank@example.com', b'11',  232089, b'0', '2024-07-20', '13:15:46'),
('ivy@example.com', b'11',  319110, b'0', '2024-09-13', '10:28:57'),
('karen@example.com', b'11',  274327, b'1', '2024-11-26', '08:27:23'),
('karen@example.com', b'11',  598098, b'1', '2024-09-18', '09:15:48'),
('liam@example.com', b'11',  476183, b'0', '2024-09-10', '16:09:37');