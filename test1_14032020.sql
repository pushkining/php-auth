-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "director" -------------------------------------
CREATE TABLE `director` ( 
	`directorId` Int( 11 ) NOT NULL,
	`nameDir` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	PRIMARY KEY ( `directorId` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "movie" ----------------------------------------
CREATE TABLE `movie` ( 
	`movieId` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`directorId` Int( 11 ) NOT NULL,
	`nameMov` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`description` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`releaseDate` Date NOT NULL,
	PRIMARY KEY ( `movieId` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------


-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`username` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`password` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- -------------------------------------------------------------


-- Dump data of "director" ---------------------------------
INSERT INTO `director`(`directorId`,`nameDir`) VALUES 
( '1', 'Cameron' ),
( '2', 'Tarantino' ),
( '3', 'Abrams' );
-- ---------------------------------------------------------


-- Dump data of "movie" ------------------------------------
INSERT INTO `movie`(`movieId`,`directorId`,`nameMov`,`description`,`releaseDate`) VALUES 
( '1', '1', 'Avatar', 'fantasy', '2000-01-01' ),
( '2', '2', 'Kill Bill', 'crime', '2004-01-01' ),
( '4', '3', 'Star treck', 'fantastic', '2009-01-01' ),
( '5', '2', 'Pulp fiction', 'crime', '1994-01-01' );
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`id`,`username`,`password`) VALUES 
( '1', 'admin', 'admin' ),
( '2', 'user', 'user' );
-- ---------------------------------------------------------


-- CREATE INDEX "directorId" -----------------------------------
CREATE INDEX `directorId` USING BTREE ON `movie`( `directorId` );
-- -------------------------------------------------------------


-- CREATE LINK "movie_ibfk_1" ----------------------------------
ALTER TABLE `movie`
	ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY ( `directorId` )
	REFERENCES `director`( `directorId` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


