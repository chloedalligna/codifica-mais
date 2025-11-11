# Arquivo select-reservas-confirmadas.sql:
# Liste todas as reservas confirmadas (status = 'Confirmada') com data de check-in após o 
# mês de Maio de 2025 e que não estejam excluídas.

USE hospeda_brasil;

# SELECT * FROM reservas;

SELECT reservas.id_reserva AS 'ID da reserva', reservas.data_checkin AS 'Data de check-in', 
status_reservas.status_nome AS 'Status'
FROM reservas
JOIN status_reservas ON reservas.status_id = status_reservas.id_status
WHERE status_reservas.status_nome = 'Confirmada' 
AND YEAR(reservas.data_checkin) >= 2025 AND MONTH(reservas.data_checkin) > 05
AND reservas.deletado_em IS NULL;