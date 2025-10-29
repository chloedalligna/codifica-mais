# Crie um arquivo inserir_registros_tabela_fornecedores.sql e, nesse arquivo, 
# insira os comandos para popular a tabela com 3 registros (função INSERT)

USE gestao_produtos;

# fornecedor_id, razao_social, cnpj, criado_em, atualizado_em, deletado_em

INSERT INTO fornecedores #1
VALUES (DEFAULT, 'CA', '66.069.333/0001-85', NOW(), NULL, NULL);

INSERT INTO fornecedores (razao_social, cnpj, criado_em) #2
VALUES ('Renner', '86.577.385/0001-70',  NOW());

INSERT INTO fornecedores (razao_social, cnpj, criado_em) #3
VALUES ('Riachuelo', '51.436.872/0001-38', NOW());