-- MySQL Script generated by MySQL Workbench
-- Fri Dec 14 23:06:50 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`especialidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`especialidade` (
  `codEspecialidade` INT NOT NULL AUTO_INCREMENT,
  `descriEspecialidade` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`codEspecialidade`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipoPermissoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipoPermissoes` (
  `codPermissao` INT NOT NULL AUTO_INCREMENT,
  `descriPermissao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`codPermissao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`comprador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`comprador` (
  `codComprador` INT NOT NULL AUTO_INCREMENT,
  `emailComprador` VARCHAR(45) NOT NULL,
  `passComprador` CHAR(32) NOT NULL,
  `nrOrdem` INT NULL,
  `dataNascComprador` DATE NULL,
  `nomeComprador` VARCHAR(45) NOT NULL,
  `formacaoCarreira` VARCHAR(255) NULL,
  `moradaComprador` VARCHAR(45) NULL,
  `codPostalComprador` VARCHAR(45) NULL,
  `localidadeComprador` VARCHAR(45) NULL,
  `NIBComprador` VARCHAR(45) NULL,
  `NIFComprador` VARCHAR(45) NULL,
  `contacto1Comprador` VARCHAR(45) NULL,
  `contacto2Comprador` VARCHAR(45) NULL,
  `ccComprador` VARCHAR(45) NULL,
  `sexoComprador` VARCHAR(45) NULL,
  `observacoesComprador` VARCHAR(45) NULL,
  `LEIComprador` VARCHAR(45) NULL,
  `emailconfirmComprador` INT NULL,
  `codEspecialidade` INT NOT NULL,
  `codPermissao` INT NOT NULL,
  `estadoComprador` INT NOT NULL,
  `tokenComprador` VARCHAR(45) NULL,
  `linkimagem` VARCHAR(200) NULL,
  `codeEmailConfirm` VARCHAR(120) NULL,
  `notas` VARCHAR(1000) NULL,
  `quantidadeMedicos` INT NULL,
  `preco` DOUBLE NULL,
  `associacao` INT NULL,
  PRIMARY KEY (`codComprador`, `emailComprador`),
  INDEX `fk_medico_especialidade_idx` (`codEspecialidade` ASC) VISIBLE,
  INDEX `fk_medico_tipoPermissoes1_idx` (`codPermissao` ASC) VISIBLE,
  CONSTRAINT `fk_medico_especialidade`
    FOREIGN KEY (`codEspecialidade`)
    REFERENCES `mydb`.`especialidade` (`codEspecialidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_medico_tipoPermissoes1`
    FOREIGN KEY (`codPermissao`)
    REFERENCES `mydb`.`tipoPermissoes` (`codPermissao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`medicamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`medicamento` (
  `codMedicamento` INT NOT NULL AUTO_INCREMENT,
  `nomeGenerico` VARCHAR(120) NULL,
  `nomeMedicamento` VARCHAR(100) NULL,
  `formaFarmaceutica` VARCHAR(100) NULL,
  `dosagem` VARCHAR(60) NULL,
  `generico` VARCHAR(20) NULL,
  `titularAIM` VARCHAR(110) NULL,
  PRIMARY KEY (`codMedicamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`subsistemas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`subsistemas` (
  `codSubsistema` INT NOT NULL AUTO_INCREMENT,
  `descriSubsistema` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`codSubsistema`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`utente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`utente` (
  `ccUtente` INT NOT NULL AUTO_INCREMENT,
  `passUtente` CHAR(32) NOT NULL,
  `NIBUtente` VARCHAR(45) NULL,
  `NIFUtente` VARCHAR(45) NULL,
  `nomeUtente` VARCHAR(45) NOT NULL,
  `dataNascUtente` DATE NULL,
  `sexoUtente` VARCHAR(45) NOT NULL,
  `moradaUtente` VARCHAR(45) NULL,
  `contacto1Utente` VARCHAR(45) NULL,
  `contacto2Utente` VARCHAR(45) NULL,
  `emailUtente` VARCHAR(45) NOT NULL,
  `ObservacoesUtente` VARCHAR(45) NULL,
  `emailconfirmUtente` INT NULL,
  `codPermissao` INT NOT NULL,
  `codPostalUtente` VARCHAR(45) NULL,
  `localidadeUtente` VARCHAR(45) NULL,
  `nrSubSistema` VARCHAR(45) NULL,
  `codSubsistema` INT NOT NULL,
  `tokenUtente` VARCHAR(45) NULL,
  `linkimagem` VARCHAR(200) NULL,
  `codeEmailConfirm` VARCHAR(120) NULL,
  `notas` VARCHAR(1000) NULL,
  PRIMARY KEY (`ccUtente`),
  INDEX `fk_utente_tipoPermissoes1_idx` (`codPermissao` ASC) VISIBLE,
  INDEX `fk_utente_subsistemas1_idx` (`codSubsistema` ASC) VISIBLE,
  CONSTRAINT `fk_utente_tipoPermissoes1`
    FOREIGN KEY (`codPermissao`)
    REFERENCES `mydb`.`tipoPermissoes` (`codPermissao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utente_subsistemas1`
    FOREIGN KEY (`codSubsistema`)
    REFERENCES `mydb`.`subsistemas` (`codSubsistema`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`planoMedicacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`planoMedicacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(220) NOT NULL,
  `start` DATETIME NULL,
  `ccUtente` INT NOT NULL,
  `codComprador` INT NOT NULL,
  `end` DATETIME NULL,
  `codMedicamento` INT NOT NULL,
  `color` VARCHAR(10) NULL,
  `observacoes` VARCHAR(300) NULL,
  `confirmacaoplano` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_planoMedicacao_utente1_idx` (`ccUtente` ASC) VISIBLE,
  INDEX `fk_planoMedicacao_medico1_idx` (`codComprador` ASC) VISIBLE,
  INDEX `fk_planoMedicacao_medicamento1_idx` (`codMedicamento` ASC) VISIBLE,
  CONSTRAINT `fk_planoMedicacao_utente1`
    FOREIGN KEY (`ccUtente`)
    REFERENCES `mydb`.`utente` (`ccUtente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_planoMedicacao_medico1`
    FOREIGN KEY (`codComprador`)
    REFERENCES `mydb`.`comprador` (`codComprador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_planoMedicacao_medicamento1`
    FOREIGN KEY (`codMedicamento`)
    REFERENCES `mydb`.`medicamento` (`codMedicamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`local`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`local` (
  `codLocal` INT NOT NULL AUTO_INCREMENT,
  `descriLocal` VARCHAR(45) NOT NULL,
  `moradaLocal` VARCHAR(45) NOT NULL,
  `localidadeLocal` VARCHAR(45) NOT NULL,
  `codPostalLocal` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`codLocal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipoServico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipoServico` (
  `codTipoServico` INT NOT NULL AUTO_INCREMENT,
  `descriTipoServico` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`codTipoServico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`servico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pvpServico` DOUBLE NOT NULL,
  `nSala` INT NULL,
  `codLocal` INT NOT NULL,
  `codComprador` INT NOT NULL,
  `ccUtente` INT NOT NULL,
  `codTipoServico` INT NOT NULL,
  `title` VARCHAR(220) NULL,
  `color` VARCHAR(10) NULL DEFAULT NULL,
  `start` DATETIME NULL DEFAULT NULL,
  `end` DATETIME NULL DEFAULT NULL,
  `observacoes` VARCHAR(600) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_servico_local1_idx` (`codLocal` ASC) VISIBLE,
  INDEX `fk_servico_medico1_idx` (`codComprador` ASC) VISIBLE,
  INDEX `fk_servico_utente1_idx` (`ccUtente` ASC) VISIBLE,
  INDEX `fk_servico_tipoServico1_idx` (`codTipoServico` ASC) VISIBLE,
  CONSTRAINT `fk_servico_local1`
    FOREIGN KEY (`codLocal`)
    REFERENCES `mydb`.`local` (`codLocal`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_servico_medico1`
    FOREIGN KEY (`codComprador`)
    REFERENCES `mydb`.`comprador` (`codComprador`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_servico_utente1`
    FOREIGN KEY (`ccUtente`)
    REFERENCES `mydb`.`utente` (`ccUtente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_servico_tipoServico1`
    FOREIGN KEY (`codTipoServico`)
    REFERENCES `mydb`.`tipoServico` (`codTipoServico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`medicamentoEspecialidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`medicamentoEspecialidade` (
  `codMedicamento` INT NOT NULL,
  `codEspecialidade` INT NOT NULL,
  `codComprador` INT NOT NULL,
  INDEX `fk_medicamento_has_especialidade_especialidade1_idx` (`codEspecialidade` ASC) VISIBLE,
  INDEX `fk_medicamento_has_especialidade_medicamento1_idx` (`codMedicamento` ASC) VISIBLE,
  PRIMARY KEY (`codMedicamento`, `codEspecialidade`),
  INDEX `fk_medicamentoEspecialidade_comprador1_idx` (`codComprador` ASC) VISIBLE,
  CONSTRAINT `fk_medicamento_has_especialidade_medicamento1`
    FOREIGN KEY (`codMedicamento`)
    REFERENCES `mydb`.`medicamento` (`codMedicamento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_medicamento_has_especialidade_especialidade1`
    FOREIGN KEY (`codEspecialidade`)
    REFERENCES `mydb`.`especialidade` (`codEspecialidade`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_medicamentoEspecialidade_comprador1`
    FOREIGN KEY (`codComprador`)
    REFERENCES `mydb`.`comprador` (`codComprador`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`registoCampos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`registoCampos` (
  `codRegistoCampos` INT NOT NULL AUTO_INCREMENT,
  `nomeCampo` VARCHAR(45) NOT NULL,
  `unidadeCampo` VARCHAR(45) NOT NULL,
  `codEspecialidade` INT NOT NULL,
  `codComprador` INT NOT NULL,
  PRIMARY KEY (`codRegistoCampos`),
  INDEX `codComprador_idx` (`codComprador` ASC) VISIBLE,
  INDEX `codEspecialidade_idx` (`codEspecialidade` ASC) VISIBLE,
  CONSTRAINT `codComprador`
    FOREIGN KEY (`codComprador`)
    REFERENCES `mydb`.`comprador` (`codComprador`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `codEspecialidade`
    FOREIGN KEY (`codEspecialidade`)
    REFERENCES `mydb`.`especialidade` (`codEspecialidade`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`registoDados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`registoDados` (
  `codRegistoDados` INT NOT NULL AUTO_INCREMENT,
  `valorDados` VARCHAR(45) NOT NULL,
  `codServico` INT NOT NULL,
  `codRegistoCampos` INT NOT NULL,
  PRIMARY KEY (`codRegistoDados`),
  INDEX `fk_registoDados_servico1_idx` (`codServico` ASC) VISIBLE,
  INDEX `fk_registoDados_registoCampos1_idx` (`codRegistoCampos` ASC) VISIBLE,
  CONSTRAINT `fk_registoDados_servico1`
    FOREIGN KEY (`codServico`)
    REFERENCES `mydb`.`servico` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_registoDados_registoCampos1`
    FOREIGN KEY (`codRegistoCampos`)
    REFERENCES `mydb`.`registoCampos` (`codRegistoCampos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`estadoAlertaComprador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`estadoAlertaComprador` (
  `estadoComprador` INT NOT NULL,
  `descriEstadoComprador` VARCHAR(45) NULL,
  PRIMARY KEY (`estadoComprador`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`associados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`associados` (
  `idAssoc` INT NOT NULL AUTO_INCREMENT,
  `comprador_codComprador` INT NOT NULL,
  `utente_ccUtente` INT NOT NULL,
  `comprador_emailComprador` VARCHAR(45) NULL,
  `confirmacao` INT NULL,
  INDEX `fk_comprador_has_utente_utente1_idx` (`utente_ccUtente` ASC) VISIBLE,
  INDEX `fk_comprador_has_utente_comprador1_idx` (`comprador_codComprador` ASC, `comprador_emailComprador` ASC) VISIBLE,
  PRIMARY KEY (`idAssoc`),
  CONSTRAINT `fk_comprador_has_utente_comprador1`
    FOREIGN KEY (`comprador_codComprador` , `comprador_emailComprador`)
    REFERENCES `mydb`.`comprador` (`codComprador` , `emailComprador`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comprador_has_utente_utente1`
    FOREIGN KEY (`utente_ccUtente`)
    REFERENCES `mydb`.`utente` (`ccUtente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`alertaComprador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`alertaComprador` (
  `codAlertaComprador` INT NOT NULL AUTO_INCREMENT,
  `descriAlertaComprador` VARCHAR(100) NULL,
  `estadoComprador` INT NOT NULL,
  `codComprador` INT NOT NULL,
  `dataAlertaComprador` DATETIME NULL,
  `idAssoc` INT NULL,
  PRIMARY KEY (`codAlertaComprador`),
  INDEX `fk_alertaComprador_estadoAlertaComprador1_idx` (`estadoComprador` ASC) VISIBLE,
  INDEX `fk_alertaComprador_comprador1_idx` (`codComprador` ASC) VISIBLE,
  INDEX `fk_alertaComprador_associados1_idx` (`idAssoc` ASC) VISIBLE,
  CONSTRAINT `fk_alertaComprador_estadoAlertaComprador1`
    FOREIGN KEY (`estadoComprador`)
    REFERENCES `mydb`.`estadoAlertaComprador` (`estadoComprador`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_alertaComprador_comprador1`
    FOREIGN KEY (`codComprador`)
    REFERENCES `mydb`.`comprador` (`codComprador`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_alertaComprador_associados1`
    FOREIGN KEY (`idAssoc`)
    REFERENCES `mydb`.`associados` (`idAssoc`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`estadoAlertaUtente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`estadoAlertaUtente` (
  `estadoUtente` INT NOT NULL,
  `descriEstadoUtente` VARCHAR(45) NULL,
  PRIMARY KEY (`estadoUtente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`alertaUtente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`alertaUtente` (
  `codAlertaUtente` INT NOT NULL AUTO_INCREMENT,
  `descriAlertaUtente` VARCHAR(100) NULL,
  `estadoUtente` INT NOT NULL,
  `ccUtente` INT NOT NULL,
  `servico_id` INT NULL,
  `planoMedicacao_id` INT NULL,
  `idAssoc` INT NULL,
  `dataAlertaUtente` DATETIME NULL,
  PRIMARY KEY (`codAlertaUtente`),
  INDEX `fk_alertaUtente_estadoAlertaUtente1_idx` (`estadoUtente` ASC) VISIBLE,
  INDEX `fk_alertaUtente_utente1_idx` (`ccUtente` ASC) VISIBLE,
  INDEX `fk_alertaUtente_servico1_idx` (`servico_id` ASC) VISIBLE,
  INDEX `fk_alertaUtente_planoMedicacao1_idx` (`planoMedicacao_id` ASC) VISIBLE,
  INDEX `fk_alertaUtente_associados1_idx` (`idAssoc` ASC) VISIBLE,
  CONSTRAINT `fk_alertaUtente_estadoAlertaUtente1`
    FOREIGN KEY (`estadoUtente`)
    REFERENCES `mydb`.`estadoAlertaUtente` (`estadoUtente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_alertaUtente_utente1`
    FOREIGN KEY (`ccUtente`)
    REFERENCES `mydb`.`utente` (`ccUtente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_alertaUtente_servico1`
    FOREIGN KEY (`servico_id`)
    REFERENCES `mydb`.`servico` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_alertaUtente_planoMedicacao1`
    FOREIGN KEY (`planoMedicacao_id`)
    REFERENCES `mydb`.`planoMedicacao` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_alertaUtente_associados1`
    FOREIGN KEY (`idAssoc`)
    REFERENCES `mydb`.`associados` (`idAssoc`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categorias` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nomeCategoria` VARCHAR(80) NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`medicamentoCategoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`medicamentoCategoria` (
  `codMedicamento` INT NOT NULL,
  `idcategoria` INT NOT NULL,
  `codComprador` INT NOT NULL,
  PRIMARY KEY (`codMedicamento`, `idcategoria`),
  INDEX `fk_medicamento_has_categorias_categorias1_idx` (`idcategoria` ASC) VISIBLE,
  INDEX `fk_medicamento_has_categorias_medicamento1_idx` (`codMedicamento` ASC) VISIBLE,
  INDEX `fk_medicamentoCategoria_comprador1_idx` (`codComprador` ASC) VISIBLE,
  CONSTRAINT `fk_medicamento_has_categorias_medicamento1`
    FOREIGN KEY (`codMedicamento`)
    REFERENCES `mydb`.`medicamento` (`codMedicamento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_medicamento_has_categorias_categorias1`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `mydb`.`categorias` (`idcategoria`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_medicamentoCategoria_comprador1`
    FOREIGN KEY (`codComprador`)
    REFERENCES `mydb`.`comprador` (`codComprador`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
