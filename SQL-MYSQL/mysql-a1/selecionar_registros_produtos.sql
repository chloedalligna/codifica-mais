# Crie um arquivo selecionar_registros_produtos.sql e, nesse arquivo, insira os 
# comandos para selecionar os produtos que possuem quantidade maior que 5 e que 
# a coluna deletado_em esteja vazia (função SELECT)

USE gestao_produtos;

SELECT * FROM produtos
WHERE quantidade > 5 AND deletado_em IS NULL;