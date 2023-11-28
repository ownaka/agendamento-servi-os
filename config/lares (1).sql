-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Nov-2023 às 17:31
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lares`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

DROP TABLE IF EXISTS `instituicao`;
CREATE TABLE IF NOT EXISTS `instituicao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(30) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `senha` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telefone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `instituicao`
--

INSERT INTO `instituicao` (`id`, `cnpj`, `email`, `senha`, `nome`, `telefone`) VALUES
(1, '48777253000100', 'gabrielarduvini@outlook.com', '1234', '', '17991854139');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_by` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `status` enum('OPEN','IN_PROGRESS','COMPLETED') DEFAULT 'OPEN',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `task_applications`
--

DROP TABLE IF EXISTS `task_applications`;
CREATE TABLE IF NOT EXISTS `task_applications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_id` int DEFAULT NULL,
  `voluntario_id` int DEFAULT NULL,
  `application_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('PENDING','ACCEPTED','REJECTED') DEFAULT 'PENDING',
  `instituicao_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `user_id` (`voluntario_id`),
  KEY `instituicao_id` (`instituicao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `voluntario`
--

DROP TABLE IF EXISTS `voluntario`;
CREATE TABLE IF NOT EXISTS `voluntario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(30) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `senha` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `voluntario`
--

INSERT INTO `voluntario` (`id`, `cpf`, `email`, `senha`, `nome`, `telefone`) VALUES
(1, '500.654.788-00', 'instituicaolares@gmail.com', '1234', NULL, '17995644237');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `task_applications`
--
ALTER TABLE `task_applications`
  ADD CONSTRAINT `instituicao_id` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicao` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `task_id` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `volunario_id` FOREIGN KEY (`voluntario_id`) REFERENCES `voluntario` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
