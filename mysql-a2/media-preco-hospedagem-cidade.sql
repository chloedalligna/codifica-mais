# Arquivo media-preco-hospedagem-cidade.sql:
# Calcule o valor total médio por dia das reservas, agrupado por cidade da hospedagem

USE hospeda_brasil;

# SELECT * FROM reservas;

SELECT hospedagens.cidade AS 'Cidade', AVG(reservas.valor_noite) AS 'Valor médio por noite'
FROM reservas
JOIN hospedagens ON reservas.id_hospedagem = hospedagens.id_hospedagem
GROUP BY hospedagens.cidade;