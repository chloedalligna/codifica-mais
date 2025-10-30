/* Arquivo resumo-reservas-por-hospede.sql
Monte um relatório que exiba, para cada hóspede:
• O ID e o nome do hóspede;
• O total de reservas confirmadas (excluindo as canceladas, deletadas e 
pendentes);
• A primeira data de check-in registrada;
• A última data de check-out registrada.
Utilize junções adequadas entre as tabelas reservas, hospedes e status_reservas.
Agrupe os resultados por hóspede e ordene de forma decrescente pelo número total 
de reservas, e em ordem alfabética pelo nome em caso de empate.
* É interessante ver como a ordem de nome vai funcionar já que, mesmo em ordem 
alfabética, os hospedes não estarão em ordem numérica. */

USE hospeda_brasil;

SELECT h.id_hospede, h.nome_completo, COUNT(r.id_reserva) AS quantidade_reservas_confirmadas, 
MAX(r.data_checkin) AS checkin_mais_recente, MAX(r.data_checkout) AS checkout_mais_recente
FROM hospedes h
JOIN reservas r ON h.id_hospede = r.id_hospede
JOIN status_reservas s ON r.status_id = s.id_status
WHERE r.deletado_em IS NULL AND s.status_nome = 'Confirmada' 
GROUP BY h.id_hospede
ORDER BY quantidade_reservas_confirmadas DESC, nome_completo ASC;