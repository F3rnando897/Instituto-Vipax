create database vipax
default character set utf8
default collate utf8_general_ci;

use vipax;

-- phpMyAdmin SQL Dump
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `eventos_comuns` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `fotos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `eventos_futuros` (
  `id` int(11) NOT NULL,
  `id_eventos_comuns` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `preco` float(8,2) NOT NULL,
  `vagas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `objetivos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `vagas_reservadas` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `eventos_comuns`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `eventos_futuros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eventos_comuns` (`id_eventos_comuns`);

ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_evento` (`id_evento`);

ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `vagas_reservadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

ALTER TABLE `eventos_comuns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `eventos_futuros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `objetivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `vagas_reservadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `eventos_futuros`
  ADD CONSTRAINT `eventos_futuros_ibfk_1` FOREIGN KEY (`id_eventos_comuns`) REFERENCES `eventos_comuns` (`id`);

ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos_comuns` (`id`);

ALTER TABLE `vagas_reservadas`
  ADD CONSTRAINT `vagas_reservadas_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos_futuros` (`id`),
  ADD CONSTRAINT `vagas_reservadas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;
