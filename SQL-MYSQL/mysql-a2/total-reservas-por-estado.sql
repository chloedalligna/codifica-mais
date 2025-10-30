/* Arquivo total-reservas-por-estado.sql
Liste o nome do estado, a quantidade total de reservas realizadas em hospedagens
localizadas em cada estado e a soma total simples do valor das reservas (valor da diária
multiplicado pelo número de noites).
Considere apenas as reservas não deletadas e que tenham data de check-in anteriores a
ou iguais Junho de 2025.
Ordene o resultado de forma que os estados com maior número de reservas apareçam
primeiro e, em caso de empate, o estado com maior valor total venha antes. */

USE hospeda_brasil;

SELECT h.estado, COUNT(h.id_hospedagem) AS quantidade_hospedagens,
SUM(r.valor_noite * (DATEDIFF(r.data_checkout, r.data_checkin))) AS soma_valor_reservas
FROM hospedagens h
JOIN reservas r ON h.id_hospedagem = r.id_hospedagem
WHERE r.deletado_em IS NULL AND MONTH(r.data_checkin) <= 6 AND YEAR(r.data_checkin) <= 2025
GROUP BY h.estado
ORDER BY quantidade_hospedagens DESC, soma_valor_reservas DESC;