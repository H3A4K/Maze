CREATE TABLE IF NOT EXISTS `players` (
    `email` varchar(255) PRIMARY KEY, -- acting as userID
    `birthdate` DATE NOT NULL,  -- acting as password
    `total_games` INT DEFAULT(0),
    `average` FLOAT DEFAULT(0)
);

CREATE TABLE IF NOT EXISTS `scores` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `email` varchar(255),
    `rooms` bit(2), -- stored as the base 10 power minus 1 (e.g. 100 = 10^2, rooms = 1)
    `time` INT, -- stored in ms
    `controller` bit(1), -- stored as 0 = Trackpad, 1 = Keyboard
    `date` DATE,
    `time_completed` TIME,
    FOREIGN KEY (`email`) REFERENCES `players`(`email`)
);