-- MySQL Script generated by MySQL Workbench
-- Mon Feb 15 09:55:01 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ToolKitGME
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ToolKitGME
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ToolKitGME` DEFAULT CHARACTER SET utf8 ;
USE `ToolKitGME` ;

-- -----------------------------------------------------
-- Table `ToolKitGME`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ToolKitGME`.`categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nombreCategoria` VARCHAR(255) NOT NULL,
  `estadoCategoria` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`idCategoria`));


-- -----------------------------------------------------
-- Table `ToolKitGME`.`filtro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ToolKitGME`.`filtro` (
  `idFiltro` INT NOT NULL AUTO_INCREMENT,
  `nombreFiltro` VARCHAR(255) NOT NULL,
  `estadoFiltro` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`idFiltro`));


-- -----------------------------------------------------
-- Table `ToolKitGME`.`subfiltro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ToolKitGME`.`subfiltro` (
  `idSubFiltro` INT NOT NULL AUTO_INCREMENT,
  `idFiltro` INT NOT NULL,
  `nombreSubfiltro` VARCHAR(255) NOT NULL,
  `estadoSubfiltro` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`idSubFiltro`),
  INDEX `FiltroSubfiltro_idx` (`idFiltro` ASC) ,
  CONSTRAINT `fk_subfiltro_filtro`
    FOREIGN KEY (`idFiltro`)
    REFERENCES `ToolKitGME`.`filtro` (`idFiltro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `ToolKitGME`.`archivoTK`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ToolKitGME`.`archivoTK` (
  `idArchivoTK` INT NOT NULL AUTO_INCREMENT,
  `nombreArchivoTK` VARCHAR(45) NOT NULL,
  `descripcionArchivoTK` VARCHAR(255) NOT NULL,
  `rutaArchivoTK` VARCHAR(45) NOT NULL,
  `estadoArchivoTK` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`idArchivoTK`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ToolKitGME`.`Equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ToolKitGME`.`Equipo` (
  `idEquipo` INT NOT NULL,
  `nombreEquipo` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idEquipo`));


-- -----------------------------------------------------
-- Table `ToolKitGME`.`equipo_archivoTK`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ToolKitGME`.`equipo_archivoTK` (
  `idEquipo` INT NOT NULL,
  `idArchivoTK` INT NOT NULL,
  PRIMARY KEY (`idEquipo`, `idArchivoTK`),
  INDEX `fk_usuarioarchivotk_archivotk_idx` (`idArchivoTK` ASC) ,
  CONSTRAINT `fk_equipoarchivotk_equipo`
    FOREIGN KEY (`idEquipo`)
    REFERENCES `ToolKitGME`.`Equipo` (`idEquipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipoarchivotk_archivotk`
    FOREIGN KEY (`idArchivoTK`)
    REFERENCES `ToolKitGME`.`archivoTK` (`idArchivoTK`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `ToolKitGME`.`archivoTK_filtro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ToolKitGME`.`archivoTK_filtro` (
  `idarchivoTK` INT NOT NULL,
  `idFiltro` INT NOT NULL,
  PRIMARY KEY (`idFiltro`, `idarchivoTK`),
  INDEX `fk_archivotkfiltro_archivotk_idx` (`idarchivoTK` ASC) ,
  CONSTRAINT `fk_archivotkfiltro_archivotk`
    FOREIGN KEY (`idarchivoTK`)
    REFERENCES `ToolKitGME`.`archivoTK` (`idArchivoTK`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_archivotkfiltro_filtro`
    FOREIGN KEY (`idFiltro`)
    REFERENCES `ToolKitGME`.`filtro` (`idFiltro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `ToolKitGME`.`archivoTK_Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ToolKitGME`.`archivoTK_Categoria` (
  `idArchivoTK` INT NOT NULL,
  `idCategoria` INT NOT NULL,
  PRIMARY KEY (`idArchivoTK`, `idCategoria`),
  INDEX `fk_archivotkcategoria_categoria_idx` (`idCategoria` ASC) ,
  CONSTRAINT `fk_archivotkcategoria_categoria`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `ToolKitGME`.`categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_archivotkcategoria_archivotk`
    FOREIGN KEY (`idArchivoTK`)
    REFERENCES `ToolKitGME`.`archivoTK` (`idArchivoTK`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;