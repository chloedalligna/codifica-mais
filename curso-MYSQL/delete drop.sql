DELETE FROM avaliacoes
WHERE hospedagem_id IN ('10000', '1001');

# tem que apagar o(s) dado(s) de outras tabelas em que é foreign key antes de apagar da "tabela mãe/de origem"

DELETE FROM reservas
WHERE hospedagem_id IN ('10000', '1001');

DELETE FROM hospedagens
WHERE hospedagem_id IN ('10000', '1001');

# DROP SCHEMA insight_places;

# DROP TABLE avaliacoes;