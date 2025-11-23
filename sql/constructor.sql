-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17/11/2025 às 15:01
-- Versão do servidor: 9.1.0
-- Versão do PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE vipax
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE vipax;

--
-- Estrutura para tabela `eventos_comuns`
--

DROP TABLE IF EXISTS `eventos_comuns`;
CREATE TABLE IF NOT EXISTS `eventos_comuns` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci,
  `id_galeria` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estrutura para tabela `eventos_futuros`
--

DROP TABLE IF EXISTS `eventos_futuros`;
CREATE TABLE IF NOT EXISTS `eventos_futuros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_eventos_comuns` int NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `preco` int NOT NULL,
  `vagas` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_eventos_comuns` (`id_eventos_comuns`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estrutura para tabela `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_eventos_comuns` int,
  `path` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estrutura para tabela `objetivos`
--

DROP TABLE IF EXISTS `objetivos`;
CREATE TABLE IF NOT EXISTS `objetivos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `texto` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nivel` varchar(30) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'usuario',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `nivel`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$pDvUabqwmOUxiLDErZ/cDukSW4Hd8Zi6J4mABoHs875JzRy5LYJ7O', '', 'admin');

--
-- Estrutura para tabela `vagas_reservadas`
--

DROP TABLE IF EXISTS `vagas_reservadas`;
CREATE TABLE IF NOT EXISTS `vagas_reservadas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_evento` int NOT NULL,
  `id_usuario` int NOT NULL,
  `situacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_evento` (`id_evento`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Restrições para tabelas `eventos_futuros`
--
ALTER TABLE `eventos_futuros`
  ADD CONSTRAINT `eventos_futuros_ibfk_1` FOREIGN KEY (`id_eventos_comuns`) REFERENCES `eventos_comuns` (`id`);

--
-- Restrições para tabelas `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`id_eventos_comuns`) REFERENCES `eventos_comuns` (`id`);
COMMIT;

