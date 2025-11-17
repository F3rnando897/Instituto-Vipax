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
(1, 'Usuario', 'Usuario@gmail.com', '$2y$10$Z0v8DI516lu6JAZ6drdbX.eZI1N1QCC81JpL8rZK5B9E0yOD0zz8q', '', 'usuario'),
(2, 'admin', 'admin@gmail.com', '$2y$10$pDvUabqwmOUxiLDErZ/cDukSW4Hd8Zi6J4mABoHs875JzRy5LYJ7O', '', 'admin');

-- eventos_futuros
INSERT INTO `eventos_futuros` (`id`, `id_eventos_comuns`, `data`, `horario`, `preco`, `vagas`) VALUES
(1, 1, '2025-12-10', '19:00:00', 8000, 30),
(2, 5, '2025-12-18', '09:00:00', 150000, 16),
(3, 2, '2025-12-20', '15:00:00', 5000, 30),
(4, 8, '2025-12-21', '08:00:00', 10000, 10);
