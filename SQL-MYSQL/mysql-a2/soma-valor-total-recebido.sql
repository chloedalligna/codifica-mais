# Arquivo soma-valor-total-recebido.sql:
# Mostre o valor total recebido com base nas reservas não deletadas, somando apenas o 
# valor da diária multiplicado pelo número de noites.

USE hospeda_brasil;

# SELECT * FROM reservas;

SELECT SUM(valor_noite * (DATEDIFF(data_checkout, data_checkin))) AS 'Valor total recebido com as reservas'
FROM reservas
WHERE deletado_em IS NULL;