CREATE TABLE IF NOT EXISTS `players` (
    `email` varchar(255) PRIMARY KEY,
    `userID` INT UNIQUE AUTO_INCREMENT,
    `birthdate` DATE NOT NULL,
    `total_games` INT DEFAULT(0)
);

CREATE TABLE IF NOT EXISTS `scores` (
    `userID` INT,
    `rooms` bit(2), -- stored as the base 10 power minus 1 (e.g. 100 = 10^2, rooms = 1)
    `time` INT, -- stored in ms
    `controller` bit(1), -- stored as 0 = Trackpad, 1 = Keyboard
    -- `date/time completed`

    FOREIGN KEY (`userID`) REFERENCES `players`(`userID`)
);