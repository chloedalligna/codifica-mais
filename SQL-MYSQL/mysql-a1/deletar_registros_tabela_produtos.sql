# Crie um arquivo deletar_registros_tabela_produtos.sql e, nesse arquivo, delete 
# informações de 1 produto de sua escolha (função DELETE)

USE gestao_produtos;

DELETE FROM produtos
WHERE produto_id = 3;

UPDATE produtos
SET deletado_em = NOW()
WHERE produto_id = 3;

SELECT * FROM produtos;