CREATE DATABASE `AGENDA` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `USER` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userPassword` char(128) NOT NULL,
  `userEmail` varchar(64) NOT NULL,
  `userName` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `idUSER_UNIQUE` (`userId`),
  UNIQUE KEY `emailUser_UNIQUE` (`userEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CONTACT` (
  `contactId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `contactName` varchar(100) DEFAULT NULL,
  `contactEmail` varchar(100) DEFAULT NULL,
  `contactPhone` varchar(100) DEFAULT NULL,
  `contactStreet` varchar(100) DEFAULT NULL,
  `contactZipcode` varchar(100) DEFAULT NULL,
  `contactCity` varchar(100) DEFAULT NULL,
  `contactState` varchar(100) DEFAULT NULL,
  `contactCountry` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`contactId`),
  KEY `fk_CONTACT_1_idx` (`userId`),
  CONSTRAINT `fk_CONTACT_1` FOREIGN KEY (`userId`) REFERENCES `USER` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
