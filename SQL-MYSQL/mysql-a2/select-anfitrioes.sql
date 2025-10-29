# Arquivo select-anfitrioes.sql:
# Liste o nome e o e-mail de todos os anfitriões.

USE hospeda_brasil;

# SELECT * FROM anfitrioes;

SELECT nome_completo AS 'Nome completo', email AS 'E-mail'
FROM anfitrioes;