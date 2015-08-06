CREATE TABLE `cs361`.`users` (
  `UserID` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NULL,
  `password` VARCHAR(100) NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE INDEX `email_UNIQUE` (`username` ASC));

CREATE USER 'cs361user'@'%' IDENTIFIED BY 'herpaderp';

GRANT SELECT, INSERT, UPDATE, DELETE ON cs361.* TO 'cs361user'@'%';
