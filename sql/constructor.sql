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
  `id_galeria` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `eventos_futuros` (
  `id` int(11) NOT NULL,
  `id_eventos_comuns` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `preco` int NOT NULL,
  `vagas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `id_eventos_comuns` int(11) NOT NULL,
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
  `id_usuario` int(11) NOT NULL,
  `situacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `eventos_comuns`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `eventos_futuros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eventos_comuns` (`id_eventos_comuns`);

ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_eventos_comuns` (`id_eventos_comuns`);

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
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`id_eventos_comuns`) REFERENCES `eventos_comuns` (`id`);

ALTER TABLE `vagas_reservadas`
  ADD CONSTRAINT `vagas_reservadas_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos_futuros` (`id`),
  ADD CONSTRAINT `vagas_reservadas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;


-- PREENCHIMENTO DE TESTE
-- Eventos comuns
INSERT INTO eventos_comuns (nome, descricao) 
VALUES ('Cine roça', 'Uma sessão de cinema especial em ambiente acolhedor, que une a simplicidade da vida no campo com filmes que inspiram, emocionam e geram reflexão.');

INSERT INTO eventos_comuns (nome, descricao) 
VALUES ('Meditação', 'Encontros voltados ao equilíbrio emocional e mental, com práticas guiadas para reduzir o estresse, aumentar a concentração e promover bem-estar.');

INSERT INTO eventos_comuns (nome, descricao) 
VALUES ('Café da manhã', 'Um momento de confraternização com mesa farta, feito para fortalecer laços, compartilhar ideias e começar o dia com energia positiva.');

INSERT INTO eventos_comuns (nome, descricao) 
VALUES ('Curso vipax', 'Programa de aprendizado exclusivo, com conteúdos práticos e transformadores, pensado para quem busca evolução pessoal e profissional.');

INSERT INTO eventos_comuns (nome, descricao) 
VALUES ('Vencendo Desafios', 'Palestra e atividades dinâmicas que motivam a superar limites, despertar a autoconfiança e conquistar novos objetivos.');

INSERT INTO eventos_comuns (nome, descricao) 
VALUES ('Caminhada Lua Cheia com Pizza', 'Um passeio noturno especial sob a luz da lua cheia, unindo contato com a natureza, momentos de contemplação e, para finalizar, uma confraternização saborosa com pizza.');

INSERT INTO eventos_comuns (nome, descricao) 
VALUES ('Rapel', 'Uma experiência de aventura e superação, que une contato direto com a natureza, prática esportiva e o desafio de descer paredões com segurança e emoção.');

-- Eventos futuros
INSERT INTO eventos_futuros (id_eventos_comuns, data, horario, preco, vagas)
VALUES (1 , '2025-12-20', '19:00:00', 7050, 20);

INSERT INTO eventos_futuros (id_eventos_comuns, data, horario, preco, vagas)
VALUES (2 , '2025-12-23', '20:30:00', 10000, 26);

INSERT INTO eventos_futuros (id_eventos_comuns, data, horario, preco, vagas)
VALUES (3 , '2025-11-03', '08:00:00', 4000, 20);

INSERT INTO eventos_futuros (id_eventos_comuns, data, horario, preco, vagas)
VALUES (2 , '2025-11-12', '15:00:00', 12000, 30);

INSERT INTO eventos_futuros (id_eventos_comuns, data, horario, preco, vagas)
VALUES (4 , '2025-12-05', '13:30:00', 4000, 10);

-- Objetivos
INSERT INTO objetivos (titulo, texto)
VALUES ('Objetivos', 'Na nossa empresa de autoconhecimento, cultivamos a autenticidade vibracional como guia quântico de todas as decisões. Valorizamos a escuta do silêncio e a cocriação de realidades expandidas, onde cada insight se torna um KPI de consciência.');

INSERT INTO objetivos (titulo, texto)
VALUES ('Valores', 'Nosso DNA corporativo pulsa no ritmo da consciência integral exponencial, fomentando a cocriação de realidades expandida em cada reunião de alinhamento estratégico. Valorizamos a escuta circular do silêncio pleno, permitindo que o não-dito também tenha voz nas tomadas de decisão plurais. Acreditamos que o autoconhecimento é o combustível etéreo que move a engrenagem do impacto planetário sustentável. Assim, buscamos constantemente o equilíbrio entre a performance energética e a entrega de valor intangível, garantindo que cada KPI seja um reflexo cristalino da jornada interior. Em resumo: nosso valor maior é transformar a experiência humana em um laboratório de possibilidades infinitas, onde cada insight é uma estrela a mais no céu corporativo.');

INSERT INTO objetivos (titulo, texto)
VALUES ('Pilares', 'Valorizamos a escuta circular do silêncio pleno, permitindo que o não-dito também tenha voz nas tomadas de decisão plurais. Acreditamos que o autoconhecimento é o combustível etéreo que move a engrenagem do impacto planetário sustentável. Assim, buscamos constantemente o equilíbrio entre a performance energética e a entrega de valor intangível, garantindo que cada KPI seja um reflexo cristalino da jornada interior. Em resumo: nosso valor maior é transformar a experiência humana em um laboratório de possibilidades infinitas, onde cada insight é uma estrela a mais no céu corporativo.');

-- Galeria
INSERT INTO galeria (id_eventos_comuns, path)
VALUES (1, 'galeria/cine_roca.png');

INSERT INTO galeria (id_eventos_comuns, path)
VALUES (2, 'galeria/meditacao.png');

INSERT INTO galeria (id_eventos_comuns, path)
VALUES (3, 'galeria/cafe_da_manha.png');

INSERT INTO galeria (id_eventos_comuns, path)
VALUES (4, 'galeria/curso.png');

INSERT INTO galeria (id_eventos_comuns, path)
VALUES (5, 'galeria/vd.png');

INSERT INTO galeria (id_eventos_comuns, path)
VALUES (6, 'galeria/pizza.png');

INSERT INTO galeria (id_eventos_comuns, path)
VALUES (7, 'galeria/rapel.png');