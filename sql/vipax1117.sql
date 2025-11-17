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
-- Banco de dados: `vipax`
--

-- --------------------------------------------------------

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
-- Despejando dados para a tabela `eventos_comuns`
--

INSERT INTO `eventos_comuns` (`id`, `nome`, `descricao`, `id_galeria`) VALUES
(1, 'Cine roça', 'Uma sessão de cinema especial em ambiente acolhedor, que une a simplicidade da vida no campo com filmes que inspiram, emocionam e geram reflexão.', NULL),
(2, 'Meditação', 'Encontros voltados ao equilíbrio emocional e mental, com práticas guiadas para reduzir o estresse, aumentar a concentração e promover bem-estar.', NULL),
(3, 'Café da manhã', 'Um momento de confraternização com mesa farta, feito para fortalecer laços, compartilhar ideias e começar o dia com energia positiva.', NULL),
(4, 'Curso vipax', 'Programa de aprendizado exclusivo, com conteúdos práticos e transformadores, pensado para quem busca evolução pessoal e profissional.', NULL),
(5, 'Vencendo Desafios', 'Palestra e atividades dinâmicas que motivam a superar limites, despertar a autoconfiança e conquistar novos objetivos.', NULL),
(6, 'Caminhada Lua Cheia com Pizza', 'Um passeio noturno especial sob a luz da lua cheia, unindo contato com a natureza, momentos de contemplação e, para finalizar, uma confraternização saborosa com pizza.', NULL),
(8, 'Rapél', 'Uma experiência de aventura e superação, que une contato direto com a natureza, prática esportiva e o desafio de descer paredões com segurança e emoção.', NULL);

-- --------------------------------------------------------

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
-- Despejando dados para a tabela `eventos_futuros`
--



-- --------------------------------------------------------

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
-- Despejando dados para a tabela `galeria`
--

INSERT INTO `galeria` (`id`, `id_eventos_comuns`, `path`) VALUES
(1, 1, 'galeria/cine_roca.png'),
(2, 2, 'galeria/meditacao.png'),
(3, 3, 'galeria/cafe_da_manha.png'),
(4, 4, 'galeria/curso.png'),
(5, 5, 'galeria/vd.png'),
(6, 6, 'galeria/pizza.png');

-- --------------------------------------------------------

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
-- Despejando dados para a tabela `objetivos`
--

INSERT INTO `objetivos` (`id`, `titulo`, `texto`) VALUES
(1, 'Missao', 'Na nossa empresa de autoconhecimento, cultivamos a autenticidade vibracional como guia quântico de todas as decisões. Valorizamos a escuta do silêncio e a cocriação de realidades expandidas, onde cada insight se torna um KPI de consciência.'),
(2, 'Valores', 'Nosso DNA corporativo pulsa no ritmo da consciência integral exponencial, fomentando a cocriação de realidades expandida em cada reunião de alinhamento estratégico. Valorizamos a escuta circular do silêncio pleno, permitindo que o não-dito também tenha voz nas tomadas de decisão plurais. Acreditamos que o autoconhecimento é o combustível etéreo que move a engrenagem do impacto planetário sustentável. Assim, buscamos constantemente o equilíbrio entre a performance energética e a entrega de valor intangível, garantindo que cada KPI seja um reflexo cristalino da jornada interior. Em resumo: nosso valor maior é transformar a experiência humana em um laboratório de possibilidades infinitas, onde cada insight é uma estrela a mais no céu corporativo.'),
(3, 'Pilares', 'Valorizamos a escuta circular do silêncio pleno, permitindo que o não-dito também tenha voz nas tomadas de decisão plurais. Acreditamos que o autoconhecimento é o combustível etéreo que move a engrenagem do impacto planetário sustentável. Assim, buscamos constantemente o equilíbrio entre a performance energética e a entrega de valor intangível, garantindo que cada KPI seja um reflexo cristalino da jornada interior. Em resumo: nosso valor maior é transformar a experiência humana em um laboratório de possibilidades infinitas, onde cada insight é uma estrela a mais no céu corporativo.');

-- --------------------------------------------------------

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

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `nivel`) VALUES
(1, 'Usuario', 'Usuario@gmail.com', '$2y$10$Z0v8DI516lu6JAZ6drdbX.eZI1N1QCC81JpL8rZK5B9E0yOD0zz8q', '', 'usuario');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vagas_reservadas`
--

DROP TABLE IF EXISTS `vagas_reservadas`;
CREATE TABLE IF NOT EXISTS `vagas_reservadas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_evento` int NOT NULL,
  `id_usuario` int NOT NULL,
  `situacao` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_evento` (`id_evento`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vagas_reservadas`
--

INSERT INTO `vagas_reservadas` (`id`, `id_evento`, `id_usuario`, `situacao`) VALUES
(3, 4, 1, NULL),
(4, 5, 1, NULL);

--
-- Restrições para tabelas despejadas
--

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
 

--
-- Restrições para tabelas `vagas_reservadas`
--
ALTER TABLE `vagas_reservadas`
  ADD CONSTRAINT `vagas_reservadas_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos_futuros` (`id`),
  ADD CONSTRAINT `vagas_reservadas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;
