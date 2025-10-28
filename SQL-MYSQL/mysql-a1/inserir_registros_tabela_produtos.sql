# Crie um arquivo inserir_registros_tabela_produtos.sql e, nesse arquivo, insira os 
# comandos para popular a tabela com 10 registros (função INSERT)

USE gestao_produtos;

# produto_id, nome, descricao, categoria, preco, peso, quantidade, fornecedor, criado_em, atualizado_em, deletado_em

INSERT INTO produtos #1
VALUES (DEFAULT, 'Camiseta vermelha gola', 'Camiseta gola goluda, 100% algodão, cor vermelha', 'Roupa masculina', 55.99, 130, 4, 1, NOW(), NULL, NULL);

INSERT INTO produtos (nome, descricao, categoria, preco, peso, quantidade, fornecedor, criado_em) #2
VALUES ('Camisa roxa social', 'Camisa de botão, manga longa, 100% linho, cor roxa', 'Roupa masculina', 149.90, 170, 2, 2, NOW());

INSERT INTO produtos (nome, descricao, categoria, preco, peso, quantidade, fornecedor, criado_em) #3
VALUES ('Camisa amarela social', 'Camisa de botão, manga longa, 100% linho, cor amarela', 'Roupa masculina', 149.90, 170, 6, 3, NOW());

INSERT INTO produtos (nome, descricao, categoria, preco, peso, quantidade, fornecedor, criado_em) #4
VALUES ('Calça marrom jeans', 'Calça reta, denim 100% algodão, cor marrom', 'Roupa masculina', 199.90, 700, 1, 1, NOW());

INSERT INTO produtos (nome, descricao, categoria, preco, peso, quantidade, fornecedor, criado_em) #5
VALUES ('Camisa azul gola', 'Camiseta gola goluda, 100% algodão, cor azul', 'Roupa masculina', 55.99, 130, 8, 2, NOW());

INSERT INTO produtos (nome, descricao, categoria, preco, peso, quantidade, fornecedor, criado_em) #6
VALUES ('Calça preta jeans', 'Calça reta, denim 100% algodão, cor preta', 'Roupa masculina', 199.90, 700, 5, 3, NOW());

INSERT INTO produtos #7
VALUES (DEFAULT, 'Vestido verde rodado', 'Vestido rodado, 50% algodão 50% poliéster, cor verde', 'Roupa feminina', 150.99, 200, 4, 1, NOW(), NULL, NULL);

INSERT INTO produtos #8
VALUES (DEFAULT, 'Saia rosa plissada jeans', 'Saia plissada, denim 100% algodão, cor rosa', 'Roupa feminina', 114.90, 400, 2, 2, NOW(), NULL, NULL);

INSERT INTO produtos #9
VALUES (DEFAULT, 'Blusa flores bata tricô', 'Blusa bata, tricô 100% poliéster, estampa floral', 'Roupa feminina', 60.00, 300, 3, 2, NOW(), NULL, NULL);

INSERT INTO produtos #10
VALUES (DEFAULT, 'Vestido azul marinho rodado', 'Vestido rodado, 50% algodão 50% poliéster, cor azul marinho', 'Roupa feminina', 150.99, 200, 6, 1, NOW(), NULL, NULL);

SELECT * FROM produtos;