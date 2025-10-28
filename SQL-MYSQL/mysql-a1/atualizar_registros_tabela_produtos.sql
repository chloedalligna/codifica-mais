# Crie um arquivo atualizar_registros_tabela_produtos.sql e, nesse arquivo, altere 
# informações de 3 produtos de sua escolha (função UPDATE)

USE gestao_produtos;

UPDATE produtos
SET preco = 130.90, atualizado_em = NOW()
WHERE produto_id = 7;

UPDATE produtos
SET quantidade = 3, atualizado_em = NOW()
WHERE produto_id = 4;

UPDATE produtos
SET quantidade = 7, atualizado_em = NOW()
WHERE produto_id = 10;

SELECT * FROM produtos;