-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema PitocoShopDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema PitocoShopDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PitocoShopDB` DEFAULT CHARACTER SET utf8 ;
USE `PitocoShopDB` ;

-- -----------------------------------------------------
-- Table `PitocoShopDB`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` CHAR(11) NOT NULL,
  `telefone` CHAR(11) NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `id_animais` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`racas_passaro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`racas_passaro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_raca` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`racas_roedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`racas_roedor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_raca` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`racas_peixe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`racas_peixe` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_raca` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`racas_cachorro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`racas_cachorro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_raca` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`racas_gato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`racas_gato` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_raca` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`racas_reptil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`racas_reptil` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_raca` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`animais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`animais` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `id_dono` INT NOT NULL,
  `id_especie` INT NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `id_raca` VARCHAR(45) NOT NULL,
  `id_cor` INT NOT NULL,
  `porte` VARCHAR(7) NOT NULL,
  `peso` DOUBLE NOT NULL,
  `castrado` VARCHAR(21) NOT NULL,
  `idade` INT NOT NULL,
  `racas_passaro_id` INT NOT NULL,
  `racas_roedor_id` INT NOT NULL,
  `racas_peixe_id` INT NOT NULL,
  `racas_cachorro_id` INT NOT NULL,
  `racas_gato_id` INT NOT NULL,
  `racas_reptil_id` INT NOT NULL,
  PRIMARY KEY (`id`, `racas_roedor_id`, `racas_peixe_id`, `racas_cachorro_id`, `racas_gato_id`, `racas_reptil_id`),
  INDEX `fk_animais_racas_passaro_idx` (`racas_passaro_id` ASC) VISIBLE,
  INDEX `fk_animais_racas_roedor1_idx` (`racas_roedor_id` ASC) VISIBLE,
  INDEX `fk_animais_racas_peixe1_idx` (`racas_peixe_id` ASC) VISIBLE,
  INDEX `fk_animais_racas_cachorro1_idx` (`racas_cachorro_id` ASC) VISIBLE,
  INDEX `fk_animais_racas_gato1_idx` (`racas_gato_id` ASC) VISIBLE,
  INDEX `fk_animais_racas_reptil1_idx` (`racas_reptil_id` ASC) VISIBLE,
  CONSTRAINT `fk_animais_racas_passaro`
    FOREIGN KEY (`racas_passaro_id`)
    REFERENCES `PitocoShopDB`.`racas_passaro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animais_racas_roedor1`
    FOREIGN KEY (`racas_roedor_id`)
    REFERENCES `PitocoShopDB`.`racas_roedor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animais_racas_peixe1`
    FOREIGN KEY (`racas_peixe_id`)
    REFERENCES `PitocoShopDB`.`racas_peixe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animais_racas_cachorro1`
    FOREIGN KEY (`racas_cachorro_id`)
    REFERENCES `PitocoShopDB`.`racas_cachorro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animais_racas_gato1`
    FOREIGN KEY (`racas_gato_id`)
    REFERENCES `PitocoShopDB`.`racas_gato` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animais_racas_reptil1`
    FOREIGN KEY (`racas_reptil_id`)
    REFERENCES `PitocoShopDB`.`racas_reptil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`servicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`servicos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_descricao_servico` INT NOT NULL,
  `id_preco_servico` INT NOT NULL,
  `horario_entrega` DATE NOT NULL,
  `horario_busca` DATE NOT NULL,
  `id_cliente` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`especie_animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`especie_animal` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`estoque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`estoque` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `produto` VARCHAR(45) NOT NULL,
  `id_categoria` INT NOT NULL,
  `preco` DOUBLE NOT NULL,
  `quantidade` INT NOT NULL,
  `codigo` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`tipo_servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`tipo_servico` (
  `id` INT NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `preco` DOUBLE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`vendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`vendas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_produto` VARCHAR(45) NOT NULL,
  `id_preco` DOUBLE NOT NULL,
  `datahora_venda` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`categoria_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`categoria_produtos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`clientes_animais_assoc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`clientes_animais_assoc` (
  `id` INT NOT NULL,
  `id_dono` INT NOT NULL,
  `id_animais` INT NOT NULL,
  PRIMARY KEY (`id`, `id_dono`, `id_animais`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`cores_animais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`cores_animais` (
  `id` INT NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
