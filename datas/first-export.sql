-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema skeleton2
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `skeleton2` ;

-- -----------------------------------------------------
-- Schema skeleton2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `skeleton2` DEFAULT CHARACTER SET utf8 ;
USE `skeleton2` ;

-- -----------------------------------------------------
-- Table `skeleton2`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skeleton2`.`roles` ;

CREATE TABLE IF NOT EXISTS `skeleton2`.`roles` (
  `idroles` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thename` VARCHAR(60) NOT NULL,
  `thevalue` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`idroles`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `thename_UNIQUE` ON `skeleton2`.`roles` (`thename` ASC);


-- -----------------------------------------------------
-- Table `skeleton2`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skeleton2`.`users` ;

CREATE TABLE IF NOT EXISTS `skeleton2`.`users` (
  `idusers` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thelogin` VARCHAR(80) NOT NULL,
  `thepwd` CHAR(60) NOT NULL,
  `themail` VARCHAR(200) NOT NULL,
  `roles_idroles` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idusers`),
  CONSTRAINT `fk_users_roles1`
    FOREIGN KEY (`roles_idroles`)
    REFERENCES `skeleton2`.`roles` (`idroles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `login_UNIQUE` ON `skeleton2`.`users` (`thelogin` ASC);

CREATE INDEX `fk_users_roles1_idx` ON `skeleton2`.`users` (`roles_idroles` ASC);


-- -----------------------------------------------------
-- Table `skeleton2`.`articles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skeleton2`.`articles` ;

CREATE TABLE IF NOT EXISTS `skeleton2`.`articles` (
  `idarticles` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` VARCHAR(150) NOT NULL,
  `theslug` VARCHAR(150) NOT NULL,
  `thedescription` TEXT NOT NULL,
  `thedate` DATETIME NULL,
  `users_idusers` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idarticles`),
  CONSTRAINT `fk_articles_users`
    FOREIGN KEY (`users_idusers`)
    REFERENCES `skeleton2`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `theslug_UNIQUE` ON `skeleton2`.`articles` (`theslug` ASC);

CREATE INDEX `fk_articles_users_idx` ON `skeleton2`.`articles` (`users_idusers` ASC);


-- -----------------------------------------------------
-- Table `skeleton2`.`rubriques`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skeleton2`.`rubriques` ;

CREATE TABLE IF NOT EXISTS `skeleton2`.`rubriques` (
  `idrubriques` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thertitle` VARCHAR(60) NULL,
  PRIMARY KEY (`idrubriques`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `skeleton2`.`articles_has_rubriques`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skeleton2`.`articles_has_rubriques` ;

CREATE TABLE IF NOT EXISTS `skeleton2`.`articles_has_rubriques` (
  `articles_idarticles` INT UNSIGNED NOT NULL,
  `rubriques_idrubriques` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`articles_idarticles`, `rubriques_idrubriques`),
  CONSTRAINT `fk_articles_has_rubriques_articles1`
    FOREIGN KEY (`articles_idarticles`)
    REFERENCES `skeleton2`.`articles` (`idarticles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articles_has_rubriques_rubriques1`
    FOREIGN KEY (`rubriques_idrubriques`)
    REFERENCES `skeleton2`.`rubriques` (`idrubriques`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_articles_has_rubriques_rubriques1_idx` ON `skeleton2`.`articles_has_rubriques` (`rubriques_idrubriques` ASC);

CREATE INDEX `fk_articles_has_rubriques_articles1_idx` ON `skeleton2`.`articles_has_rubriques` (`articles_idarticles` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
