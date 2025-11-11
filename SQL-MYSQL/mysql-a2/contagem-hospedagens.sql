# Arquivo contagem-hospedagens.sql:
# Liste os nomes dos anfitriões e a contagem de hospedagens que eles possuem.

USE hospeda_brasil;

# SELECT * FROM anfitrioes;

SELECT a.nome_completo AS 'Nome completo', COUNT(h.id_anfitriao) AS 'Hospedagens que possui'
FROM anfitrioes a
JOIN hospedagens h ON a.id_anfitriao = h.id_anfitriao
GROUP BY a.nome_completo;