/*
 Navicat Premium Dump SQL

 Source Server         : LocalHost
 Source Server Type    : MySQL
 Source Server Version : 90100 (9.1.0-commercial)
 Source Host           : localhost:3306
 Source Schema         : ifprweb

 Target Server Type    : MySQL
 Target Server Version : 90100 (9.1.0-commercial)
 File Encoding         : 65001

 Date: 25/05/2025 11:18:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pessoas
-- ----------------------------
DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE `pessoas` (
  `id` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of pessoas
-- ----------------------------
BEGIN;
INSERT INTO `pessoas` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`) VALUES ('3c7d801e-3968-11f0-a091-99910b8474b8', 'Ana Silva', 'ana.silva@example.com', '$2y$10$RZyShdPQ5sTK5pXYY5gJSOtV/pfTc/6p92I2xE62rOQv78HfZTIoC', '123.456.789-00', '1990-05-14');
INSERT INTO `pessoas` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`) VALUES ('3c7e55b6-3968-11f0-a091-99910b8474b8', 'Carlos Souza', 'carlos.souza@example.com', '$2y$10$uHVnAhKp04N3CXL0oPO1zO1rTYkOQZOd5ZBeRM.3mTULw2ECpPBXi', '987.654.321-00', '1985-11-22');
INSERT INTO `pessoas` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`) VALUES ('3c7e6010-3968-11f0-a091-99910b8474b8', 'Fernanda Lima', 'fernanda.lima@example.com', '$2y$10$N1CD5Hc6dpb6VKTv8cfLeulmT.Qljq0ThUvYGgFxLMkxz/fS1qWXe', '456.789.123-99', '1992-07-09');
INSERT INTO `pessoas` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`) VALUES ('3c7e610a-3968-11f0-a091-99910b8474b8', 'João Pereira', 'joao.pereira@example.com', '$2y$10$GDbIvKp4kXHgA/HczVTxD.0BWK6Kh3NGhxPJyoMKPHn9Z0sJ0kZg2', '321.654.987-77', '1988-02-03');
INSERT INTO `pessoas` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`) VALUES ('3c7e6196-3968-11f0-a091-99910b8474b8', 'Mariana Rocha', 'mariana.rocha@example.com', '$2y$10$hBlTmDNujtM1wGTDX6DFfe3qD0oSBXVdXKk2bGfRoc9n8WEMbyuCW', '159.753.486-20', '1995-09-18');
INSERT INTO `pessoas` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`) VALUES ('3c7e6218-3968-11f0-a091-99910b8474b8', 'Ricardo Alves', 'ricardo.alves@example.com', '$2y$10$E0UTD/xWJX1MlVJJUvtYnePeCfyC5hhAk4gHHRv9VtPvCtOAV2Vqy', '753.951.258-11', '1979-06-25');
INSERT INTO `pessoas` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`) VALUES ('3c7e6290-3968-11f0-a091-99910b8474b8', 'Patrícia Mendes', 'patricia.mendes@example.com', '$2y$10$3HTXFlYoq2OfnqC/z1PfKehzN3AOCLa.zQo8MQcvzO31Q6WmMW2.a', '852.147.963-66', '1993-03-30');
INSERT INTO `pessoas` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`) VALUES ('3c7e6358-3968-11f0-a091-99910b8474b8', 'Thiago Costa', 'thiago.costa@example.com', '$2y$10$0K2Gi9YddZJ8yDBfSIR3cexzS5O/zo6IjGy7J.XVvWyrcJPGW34L6', '369.258.147-44', '1982-12-05');
INSERT INTO `pessoas` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`) VALUES ('3c7e6b3c-3968-11f0-a091-99910b8474b8', 'Juliana Farias', 'juliana.farias@example.com', '$2y$10$A1ZopQquKtHVDW7UcojlHeeSgiPZrTyKufE0J8Q8lz.zN2Zc6SpRe', '741.852.963-33', '1991-01-12');
INSERT INTO `pessoas` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`) VALUES ('3c7e6bd2-3968-11f0-a091-99910b8474b8', 'André Nogueira', 'andre.nogueira@example.com', '$2y$10$Mz5Sn/4HYfY8nnsQp6FczuzFGo8/iw0TlfBRHiQeq9WTkxD.SOUxC', '111.222.333-00', '1987-08-21');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
