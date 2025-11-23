-- Eventos comuns
INSERT INTO `eventos_comuns` (`id`, `nome`, `descricao`, `id_galeria`) VALUES
(1, 'Cine roça', 'Uma sessão de cinema especial em ambiente acolhedor, que une a simplicidade da vida no campo com filmes que inspiram, emocionam e geram reflexão.', NULL),
(2, 'Meditação', 'Encontros voltados ao equilíbrio emocional e mental, com práticas guiadas para reduzir o estresse, aumentar a concentração e promover bem-estar.', NULL),
(3, 'Café da manhã', 'Um momento de confraternização com mesa farta, feito para fortalecer laços, compartilhar ideias e começar o dia com energia positiva.', NULL),
(4, 'Curso vipax', 'Programa de aprendizado exclusivo, com conteúdos práticos e transformadores, pensado para quem busca evolução pessoal e profissional.', NULL),
(5, 'Vencendo Desafios', 'Palestra e atividades dinâmicas que motivam a superar limites, despertar a autoconfiança e conquistar novos objetivos.', NULL),
(6, 'Caminhada Lua Cheia com Pizza', 'Um passeio noturno especial sob a luz da lua cheia, unindo contato com a natureza, momentos de contemplação e, para finalizar, uma confraternização saborosa com pizza.', NULL),
(8, 'Rapél', 'Uma experiência de aventura e superação, que une contato direto com a natureza, prática esportiva e o desafio de descer paredões com segurança e emoção.', NULL);

-- Objetivos
INSERT INTO `objetivos` (`id`, `titulo`, `texto`) VALUES
(1, 'Missao', 'Na nossa empresa de autoconhecimento, cultivamos a autenticidade vibracional como guia quântico de todas as decisões. Valorizamos a escuta do silêncio e a cocriação de realidades expandidas, onde cada insight se torna um KPI de consciência.'),
(2, 'Valores', 'Nosso DNA corporativo pulsa no ritmo da consciência integral exponencial, fomentando a cocriação de realidades expandida em cada reunião de alinhamento estratégico. Valorizamos a escuta circular do silêncio pleno, permitindo que o não-dito também tenha voz nas tomadas de decisão plurais. Acreditamos que o autoconhecimento é o combustível etéreo que move a engrenagem do impacto planetário sustentável. Assim, buscamos constantemente o equilíbrio entre a performance energética e a entrega de valor intangível, garantindo que cada KPI seja um reflexo cristalino da jornada interior. Em resumo: nosso valor maior é transformar a experiência humana em um laboratório de possibilidades infinitas, onde cada insight é uma estrela a mais no céu corporativo.'),
(3, 'Pilares', 'Valorizamos a escuta circular do silêncio pleno, permitindo que o não-dito também tenha voz nas tomadas de decisão plurais. Acreditamos que o autoconhecimento é o combustível etéreo que move a engrenagem do impacto planetário sustentável. Assim, buscamos constantemente o equilíbrio entre a performance energética e a entrega de valor intangível, garantindo que cada KPI seja um reflexo cristalino da jornada interior. Em resumo: nosso valor maior é transformar a experiência humana em um laboratório de possibilidades infinitas, onde cada insight é uma estrela a mais no céu corporativo.');

-- Galeria
INSERT INTO `galeria` (`id`, `id_eventos_comuns`, `path`) VALUES
(1, 1, 'galeria/cine_roca.png'),
(2, 2, 'galeria/meditacao.png'),
(3, 3, 'galeria/cafe_da_manha.png'),
(4, 4, 'galeria/curso.png'),
(5, 5, 'galeria/vd.png'),
(6, 6, 'galeria/pizza.png'),
(7, 8, 'galeria/rapel.png');

-- Usuarios
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `nivel`) VALUES
(2, 'Usuario', 'Usuario@gmail.com', '$2y$10$Z0v8DI516lu6JAZ6drdbX.eZI1N1QCC81JpL8rZK5B9E0yOD0zz8q', '', 'usuario'),
(3, 'Ana Lima', 'ana.lima@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11911111111', 'usuario'),
(4, 'Bruno Martins', 'bruno.martins@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11922222222', 'usuario'),
(5, 'Carla Souza', 'carla.souza@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11933333333', 'usuario'),
(6, 'Daniel Rocha', 'daniel.rocha@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11944444444', 'usuario'),
(7, 'Eduarda Meireles', 'edu.meireles@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11955555555', 'usuario'),
(8, 'Felipe Braga', 'felipe.braga@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11966666666', 'usuario'),
(9, 'Gabriela Torres', 'gabriela.torres@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11977777777', 'usuario'),
(10, 'Henrique Prado', 'henrique.prado@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11988888888', 'usuario'),
(11, 'Isabela Nunes', 'isabela.nunes@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11999999999', 'usuario'),
(12, 'João Pedro', 'joao.pedro@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11910101010', 'usuario'),
(13, 'Karen Ramos', 'karen.ramos@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11920202020', 'usuario'),
(14, 'Leonardo Silva', 'leonardo.silva@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11930303030', 'usuario'),
(15, 'Marina Costa', 'marina.costa@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11940404040', 'usuario'),
(16, 'Nicolas Freitas', 'nicolas.freitas@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11950505050', 'usuario'),
(17, 'Olivia Mendes', 'olivia.mendes@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11960606060', 'usuario'),
(18, 'Paulo Teixeira', 'paulo.teixeira@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11970707070', 'usuario'),
(19, 'Queila Dias', 'queila.dias@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11980808080', 'usuario'),
(20, 'Rodrigo Cunha', 'rodrigo.cunha@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11990909090', 'usuario'),
(21, 'Sabrina Lopes', 'sabrina.lopes@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11911112222', 'usuario'),
(22, 'Thiago Almeida', 'thiago.almeida@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11911113333', 'usuario'),
(23, 'Ursula Barreto', 'ursula.barreto@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11911114444', 'usuario'),
(24, 'Victor Araujo', 'victor.araujo@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11911115555', 'usuario'),
(25, 'Wellington Reis', 'wellington.reis@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11911116666', 'usuario'),
(26, 'Ximena Prado', 'ximena.prado@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11911117777', 'usuario'),
(27, 'Yago Farias', 'yago.farias@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11911118888', 'usuario'),
(28, 'Zoe Correia', 'zoe.correia@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11911119999', 'usuario'),
(29, 'Caio Brito', 'caio.brito@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11888887777', 'usuario'),
(30, 'Lara Monteiro', 'lara.monteiro@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11877776666', 'usuario'),
(31, 'Renan Ribeiro', 'renan.ribeiro@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11866665555', 'usuario'),
(32, 'Beatriz Amaral', 'beatriz.amaral@example.com', '$2y$10$Yg7nT4GJm9E1qXa8kLsJ4O1tTq3tP8vJZxx', '11855554444', 'usuario');

-- eventos_futuros
INSERT INTO `eventos_futuros` (`id`, `id_eventos_comuns`, `data`, `horario`, `preco`, `vagas`) VALUES
(1, 1, '2025-12-10', '19:00:00', 8000, 30),
(2, 5, '2025-12-18', '09:00:00', 150000, 16),
(3, 2, '2025-12-20', '15:00:00', 5000, 30),
(4, 8, '2025-12-21', '08:00:00', 10000, 10);


-- vagas
INSERT INTO vagas_reservadas (id_evento, id_usuario, situacao) VALUES
-- PENDENTES (NULL)
(1, 3, NULL),
(1, 4, NULL),
(2, 5, NULL),
(2, 6, NULL),
(3, 7, NULL),
(3, 8, NULL),
(4, 9, NULL),
(4, 10, NULL),
(5, 11, NULL),
(5, 12, NULL),
(6, 13, NULL),
(6, 14, NULL),
(7, 15, NULL),
(7, 16, NULL),
(8, 17, NULL),

-- APROVADOS
(1, 18, 'aprovado'),
(2, 19, 'aprovado'),
(3, 20, 'aprovado'),
(4, 21, 'aprovado'),
(5, 22, 'aprovado'),
(6, 23, 'aprovado'),
(7, 24, 'aprovado'),
(8, 25, 'aprovado'),
(9, 26, 'aprovado'),
(10, 27, 'aprovado'),
(11, 28, 'aprovado'),
(12, 29, 'aprovado'),
(3, 30, 'aprovado'),
(4, 31, 'aprovado'),
(6, 32, 'aprovado');
