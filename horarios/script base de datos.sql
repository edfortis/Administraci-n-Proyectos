-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema horario
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `horario` ;

-- -----------------------------------------------------
-- Schema horario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `horario` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `horario` ;

-- -----------------------------------------------------
-- Table `horario`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `horario`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nickname` VARCHAR(80) NOT NULL,
  `contrasena` VARCHAR(10) NOT NULL,
  `perfil` TINYINT(3) NOT NULL,
  `activado` VARCHAR(45) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario`.`Licenciaturas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario`.`Licenciaturas` ;

CREATE TABLE IF NOT EXISTS `horario`.`Licenciaturas` (
  `idLicenciatura` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NOT NULL,
  `creditosTotal` INT(3) NOT NULL,
  PRIMARY KEY (`idLicenciatura`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario`.`Experiencias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario`.`Experiencias` ;

CREATE TABLE IF NOT EXISTS `horario`.`Experiencias` (
  `idExperiencia` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NOT NULL,
  `nrc` INT(5) NOT NULL,
  `bloque` INT(1) NOT NULL,
  `seccion` INT(1) NOT NULL,
  `creditos` INT(2) NOT NULL,
  `Licenciaturas_idLicenciatura` INT NOT NULL,
  PRIMARY KEY (`idExperiencia`),
  INDEX `fk_Experiencias_Licenciaturas1_idx` (`Licenciaturas_idLicenciatura` ASC),
  CONSTRAINT `fk_Experiencias_Licenciaturas1`
    FOREIGN KEY (`Licenciaturas_idLicenciatura`)
    REFERENCES `horario`.`Licenciaturas` (`idLicenciatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario`.`Docentes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario`.`Docentes` ;

CREATE TABLE IF NOT EXISTS `horario`.`Docentes` (
  `idDocente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NOT NULL,
  `noPersonal` VARCHAR(45) NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idDocente`),
  INDEX `fk_Docentes_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_Docentes_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `horario`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario`.`Dias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario`.`Dias` ;

CREATE TABLE IF NOT EXISTS `horario`.`Dias` (
  `idDias` INT NOT NULL AUTO_INCREMENT,
  `dias` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idDias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario`.`Horas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario`.`Horas` ;

CREATE TABLE IF NOT EXISTS `horario`.`Horas` (
  `idHoras` INT NOT NULL AUTO_INCREMENT,
  `horas` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idHoras`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario`.`Experiencias_has_Horarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario`.`Experiencias_has_Horarios` ;

CREATE TABLE IF NOT EXISTS `horario`.`Experiencias_has_Horarios` (
  `Experiencias_idExperiencia` INT NOT NULL,
  `Experiencias_Licenciaturas_idLicenciatura` INT NOT NULL,
  `Dias_idDias` INT NOT NULL,
  `Horas_idHoras` INT NOT NULL,
  PRIMARY KEY (`Experiencias_idExperiencia`, `Experiencias_Licenciaturas_idLicenciatura`, `Dias_idDias`, `Horas_idHoras`),
  INDEX `fk_Experiencias_has_Horarios_Experiencias1_idx` (`Experiencias_idExperiencia` ASC, `Experiencias_Licenciaturas_idLicenciatura` ASC),
  INDEX `fk_Experiencias_has_Horarios_Dias1_idx` (`Dias_idDias` ASC),
  INDEX `fk_Experiencias_has_Horarios_Horas1_idx` (`Horas_idHoras` ASC),
  CONSTRAINT `fk_Experiencias_has_Horarios_Experiencias1`
    FOREIGN KEY (`Experiencias_idExperiencia`)
    REFERENCES `horario`.`Experiencias` (`idExperiencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Experiencias_has_Horarios_Dias1`
    FOREIGN KEY (`Dias_idDias`)
    REFERENCES `horario`.`Dias` (`idDias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Experiencias_has_Horarios_Horas1`
    FOREIGN KEY (`Horas_idHoras`)
    REFERENCES `horario`.`Horas` (`idHoras`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario`.`Salones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario`.`Salones` ;

CREATE TABLE IF NOT EXISTS `horario`.`Salones` (
  `idSalon` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSalon`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario`.`Docentes_has_Experiencias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario`.`Docentes_has_Experiencias` ;

CREATE TABLE IF NOT EXISTS `horario`.`Docentes_has_Experiencias` (
  `Docentes_idDocente` INT NOT NULL,
  `Experiencias_idExperiencia` INT NOT NULL,
  PRIMARY KEY (`Docentes_idDocente`, `Experiencias_idExperiencia`),
  INDEX `fk_Docentes_has_Experiencias_Experiencias1_idx` (`Experiencias_idExperiencia` ASC),
  INDEX `fk_Docentes_has_Experiencias_Docentes1_idx` (`Docentes_idDocente` ASC),
  CONSTRAINT `fk_Docentes_has_Experiencias_Docentes1`
    FOREIGN KEY (`Docentes_idDocente`)
    REFERENCES `horario`.`Docentes` (`idDocente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Docentes_has_Experiencias_Experiencias1`
    FOREIGN KEY (`Experiencias_idExperiencia`)
    REFERENCES `horario`.`Experiencias` (`idExperiencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario`.`Docentes_has_Licenciaturas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario`.`Docentes_has_Licenciaturas` ;

CREATE TABLE IF NOT EXISTS `horario`.`Docentes_has_Licenciaturas` (
  `Docentes_idDocente` INT NOT NULL,
  `Licenciaturas_idLicenciatura` INT NOT NULL,
  PRIMARY KEY (`Docentes_idDocente`, `Licenciaturas_idLicenciatura`),
  INDEX `fk_Docentes_has_Licenciaturas_Licenciaturas1_idx` (`Licenciaturas_idLicenciatura` ASC),
  INDEX `fk_Docentes_has_Licenciaturas_Docentes1_idx` (`Docentes_idDocente` ASC),
  CONSTRAINT `fk_Docentes_has_Licenciaturas_Docentes1`
    FOREIGN KEY (`Docentes_idDocente`)
    REFERENCES `horario`.`Docentes` (`idDocente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Docentes_has_Licenciaturas_Licenciaturas1`
    FOREIGN KEY (`Licenciaturas_idLicenciatura`)
    REFERENCES `horario`.`Licenciaturas` (`idLicenciatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
