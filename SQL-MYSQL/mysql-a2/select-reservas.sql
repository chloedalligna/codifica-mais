# Arquivo select-reservas.sql:
# Liste as reservas com o nome do hóspede, o título da hospedagem e o status da 
# reserva.

USE hospeda_brasil;

# SELECT * FROM reservas;

SELECT reservas.id_reserva AS 'ID da reserva', hospedes.nome_completo AS 'Nome completo do hóspede', 
hospedagens.titulo AS 'Título da hospedagem', status_reservas.status_nome AS 'Status'
FROM reservas
JOIN hospedes ON reservas.id_hospede = hospedes.id_hospede
JOIN hospedagens ON reservas.id_hospedagem = hospedagens.id_hospedagem
JOIN status_reservas ON reservas.status_id = status_reservas.id_status;