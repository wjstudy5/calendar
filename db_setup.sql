-- MySQL Script generated by MySQL Workbench
-- 12/29/14 20:43:45
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema schedule
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema schedule
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `schedule` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `schedule`;

-- -----------------------------------------------------
-- Table `schedule`.`user_monthly_table`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `schedule`.`user_monthly_table` ;

CREATE TABLE IF NOT EXISTS `schedule`.`user_monthly_table` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `summary` VARCHAR(100) NULL,
  `start_date` VARCHAR(45) NULL,
  `start_datetime` TIME NULL,
  `end_date` VARCHAR(100) NULL,
  `end_datetime` TIME NULL,
  `user_id` INT(10) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `schedule`.`user_weekly_table`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `schedule`.`user_weekly_table` ;

CREATE TABLE IF NOT EXISTS `schedule`.`user_weekly_table` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `summary` VARCHAR(100) NULL,
  `day` VARCHAR(10) NULL,
  `start_time` VARCHAR(45) NULL,
  `end_time` VARCHAR(45) NULL,
  `due_start_date` VARCHAR(45) NULL,
  `due_end_date` VARCHAR(45) NULL,
  `user_id` INT(10) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `schedule`.`meetings_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `schedule`.`meetings_users` ;

CREATE TABLE IF NOT EXISTS `schedule`.`meetings_users` (
  `users_id` INT(10) NOT NULL,
  `meetings_id` INT(10) NOT NULL,
  UNIQUE INDEX `key` (`users_id` ASC, `meetings_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `schedule`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `schedule`.`users` ;

CREATE TABLE IF NOT EXISTS `schedule`.`users` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(50) NULL,
  `password` VARCHAR(255) NULL,
  `is_google` INT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `schedule`.`meetings_schedule_type1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `schedule`.`meetings_schedule_type1` ;

CREATE TABLE IF NOT EXISTS `schedule`.`meetings_schedule_type1` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `meetings_id` INT(10) NULL,
  `nickname` VARCHAR(45) NULL,
  `date` VARCHAR(10) NULL,
  `time` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `schedule`.`meetings_schedule_type2`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `schedule`.`meetings_schedule_type2` ;

CREATE TABLE IF NOT EXISTS `schedule`.`meetings_schedule_type2` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `meetings_id` INT(10) NULL,
  `nickname` VARCHAR(45) NULL,
  `date` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `schedule`.`meetings_schedule_type3`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `schedule`.`meetings_schedule_type3` ;

CREATE TABLE IF NOT EXISTS `schedule`.`meetings_schedule_type3` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `meetings_id` INT(10) NULL,
  `nickname` VARCHAR(45) NULL,
  `date` VARCHAR(45) NULL,
  `time` TIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `schedule`.`meetings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `schedule`.`meetings` ;

CREATE TABLE IF NOT EXISTS `schedule`.`meetings` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `type` INT(1) NULL,
  `start_date` VARCHAR(45) NULL,
  `end_date` VARCHAR(45) NULL,
  `due_date` VARCHAR(45) NULL,
  `selected_date` VARCHAR(45) NULL,
  `hashed_link` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
