# Crie um arquivo selecionar_registros_produtos_fornecedores.sql e, nesse 
# arquivo, insira os comandos para trazer os registros da tabela de produtos e da 
# tabela de fornecedores juntos (função SELECT com JOIN)

USE gestao_produtos;

SELECT * FROM produtos p
JOIN fornecedores f ON p.fornecedor = f.fornecedor_id;