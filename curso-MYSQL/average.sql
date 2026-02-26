SELECT cliente_id, AVG(preco_total) AS ticket_medio
FROM reservas
GROUP BY cliente_id;