USE insight_places;

SELECT YEAR(data_inicio) AS ano,
MONTH(data_inicio) AS mes,
COUNT(*) AS totais_alugueis
FROM reservas
GROUP BY ano, mes
ORDER BY totais_alugueis DESC;