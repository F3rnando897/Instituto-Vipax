SELECT eventos_comuns.nome as nome, 
eventos_comuns.descricao as descricao,
eventos_futuros.data as data,
eventos_futuros.horario as horario,
eventos_futuros.preco as preco,
eventos_futuros.vagas as vagas
FROM eventos_comuns, eventos_futuros
WHERE eventos_comuns.id = eventos_futuros.id_eventos_comuns
AND eventos_futuros.data > '2025-10-04'
ORDER BY eventos_futuros.data;

SELECT eventos_comuns.nome AS nome,
eventos_comuns.id AS id,
galeria.path AS foto,
eventos_comuns.descricao AS descricao 
FROM eventos_comuns, galeria 
WHERE eventos_comuns.id_galeria = galeria.id OR galeria.id_eventos_comuns = eventos_comuns.id;