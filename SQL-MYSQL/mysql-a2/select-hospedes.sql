# Arquivo select-hospedes.sql:
# Liste o nome e a data de nascimento de todos os hospedes nascidos após 01 de 
# Janeiro de 1990 e ordene-os por data de nascimento.

USE hospeda_brasil;

# SELECT * FROM hospedes;

SELECT nome_completo AS 'Nome completo', data_nascimento AS 'Data de nascimento'
FROM hospedes
WHERE YEAR(data_nascimento) > 1990 AND MONTH(data_nascimento) > 01 AND DAY(data_nascimento) > 01
ORDER BY data_nascimento;