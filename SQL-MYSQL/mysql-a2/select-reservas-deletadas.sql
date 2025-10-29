# Arquivo select-reservas-deletadas.sql:
# Liste todas as reservas marcadas como deletadas, com o nome do hóspede, nome do 
# anfitrião, título da hospedagem e data de exclusão.

USE hospeda_brasil;

# SELECT * FROM reservas;

SELECT reservas.id_reserva AS 'ID da reserva', hospedes.nome_completo AS 'Nome completo do hóspede', 
anfitrioes.nome_completo AS 'Nome completo do anfitrião', hospedagens.titulo AS 'Título da hospedagem',
reservas.deletado_em AS 'Excluído em'
FROM reservas
JOIN hospedes ON reservas.id_hospede = hospedes.id_hospede
JOIN hospedagens ON reservas.id_hospedagem = hospedagens.id_hospedagem
JOIN anfitrioes ON hospedagens.id_anfitriao = anfitrioes.id_anfitriao 
# posição da primeira e da segunda tabela da expressão importa, sendo a primeira a tabela "de origem" necessariamente
WHERE reservas.deletado_em IS NOT NULL;