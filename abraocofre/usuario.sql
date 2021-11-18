CREATE SCHEMA `abraocofre` ;
use `abraocofre`;

CREATE TABLE `abraocofre`.`usuario` (
  `apelido` VARCHAR(10) NOT NULL,
  `senha` VARCHAR(8) NOT NULL,
  `nome` VARCHAR(30) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `acumulado` INT NULL,
  `partidas` INT NULL,
  `ultimapartida` INT NULL,
  PRIMARY KEY (`apelido`));
  
ALTER TABLE `abraocofre`.`usuario` 
CHANGE COLUMN `acumulado` `acumulado` INT(11) ZEROFILL NULL DEFAULT NULL ,
CHANGE COLUMN `partidas` `partidas` INT(11) ZEROFILL NULL DEFAULT NULL ,
CHANGE COLUMN `ultimapartida` `ultimapartidal` INT(11) ZEROFILL NULL DEFAULT NULL ;


INSERT INTO `usuario` (`apelido`, `senha`, `nome`, `telefone`) VALUES
('augusto', 'teste', 'augusto', '54999015111');