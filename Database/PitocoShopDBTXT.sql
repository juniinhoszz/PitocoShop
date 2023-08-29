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
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`cor_animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`cor_animal` (
  `id` INT NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`raca_animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`raca_animal` (
  `id` INT NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`especie_animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`especie_animal` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `id_raca` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_raca_idx` (`id_raca` ASC) VISIBLE,
  CONSTRAINT `fk_especie_raca`
    FOREIGN KEY (`id_raca`)
    REFERENCES `PitocoShopDB`.`raca_animal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`animal` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `idade` INT NOT NULL,
  `porte` VARCHAR(7) NOT NULL,
  `peso` DOUBLE NOT NULL,
  `castrado` TINYINT NOT NULL,
  `id_especie` INT NOT NULL,
  `id_dono` INT NOT NULL,
  `id_cor` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_cor_idx` (`id_cor` ASC) VISIBLE,
  INDEX `id_especie_idx` (`id_especie` ASC) VISIBLE,
  INDEX `id_dono_idx` (`id_dono` ASC) VISIBLE,
  CONSTRAINT `fk_animal_cor`
    FOREIGN KEY (`id_cor`)
    REFERENCES `PitocoShopDB`.`cor_animal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animal_especie`
    FOREIGN KEY (`id_especie`)
    REFERENCES `PitocoShopDB`.`especie_animal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animal_cliente`
    FOREIGN KEY (`id_dono`)
    REFERENCES `PitocoShopDB`.`clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
-- Table `PitocoShopDB`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `preco` DOUBLE NOT NULL,
  `quantidade` INT NULL,
  `codigo` INT NOT NULL,
  `id_categoria` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_categoria_idx` (`id_categoria` ASC) VISIBLE,
  CONSTRAINT `fk_produto_categoria`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `PitocoShopDB`.`categoria_produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`vendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`vendas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datahora_venda` DATE NOT NULL,
  `id_cliente` INT NOT NULL,
  `id_animal` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_cliente_idx` (`id_cliente` ASC) VISIBLE,
  INDEX `fk_id_venda_animal_idx` (`id_animal` ASC) VISIBLE,
  CONSTRAINT `fk_vendas_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `PitocoShopDB`.`clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vendas_animal`
    FOREIGN KEY (`id_animal`)
    REFERENCES `PitocoShopDB`.`animal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`hotel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`hotel` (
  `id` INT NOT NULL,
  `checkin` DATETIME NOT NULL,
  `checkout` DATETIME NOT NULL,
  `valor_diaria` DOUBLE NOT NULL,
  `id_animal` INT NOT NULL,
  `observacao` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  INDEX `id_animal_idx` (`id_animal` ASC) VISIBLE,
  CONSTRAINT `fk_hotel_animal`
    FOREIGN KEY (`id_animal`)
    REFERENCES `PitocoShopDB`.`animal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`agenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`agenda` (
  `id` INT NOT NULL,
  `data` DATE NOT NULL,
  `horario_entrada` DATETIME NOT NULL,
  `horario_saida` DATETIME NOT NULL,
  `id_animal` INT NOT NULL,
  `observacao` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  INDEX `id_animal_idx` (`id_animal` ASC) VISIBLE,
  UNIQUE INDEX `horario_entrada_UNIQUE` (`horario_entrada` ASC) VISIBLE,
  UNIQUE INDEX `horario_saida_UNIQUE` (`horario_saida` ASC) VISIBLE,
  CONSTRAINT `fk_agenda_animal`
    FOREIGN KEY (`id_animal`)
    REFERENCES `PitocoShopDB`.`animal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PitocoShopDB`.`venda_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PitocoShopDB`.`venda_item` (
  `quantidade` DOUBLE NOT NULL,
  `valor_unitario` DOUBLE NOT NULL,
  `total` DOUBLE NOT NULL,
  `id_venda` INT NOT NULL,
  `id_produto` INT NOT NULL,
  PRIMARY KEY (`id_produto`, `id_venda`),
  INDEX `id_venda_idx` (`id_venda` ASC) VISIBLE,
  CONSTRAINT `fk_vendaItem_vendas`
    FOREIGN KEY (`id_venda`)
    REFERENCES `PitocoShopDB`.`vendas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vendaItem_produto`
    FOREIGN KEY (`id_produto`)
    REFERENCES `PitocoShopDB`.`produto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
