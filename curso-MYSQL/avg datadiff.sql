USE insight_places;
SELECT cliente_id, AVG(DATEDIFF(data_fim, data_inicio)) AS media_dias_estadia
FROM reservas
GROUP BY cliente_id
ORDER BY media_dias_estadia DESC;