USE gestao_produtos;

CREATE TABLE fornecedores (
fornecedor_id INT PRIMARY KEY AUTO_INCREMENT,
razao_social VARCHAR(255),
cnpj VARCHAR(18),
criado_em DATETIME,
atualizado_em DATETIME,
deletado_em DATETIME
);

CREATE TABLE produtos (
produto_id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255),
descricao TEXT,
categoria VARCHAR(50),
preco DECIMAL(10,2),
peso FLOAT, # em gramas [g]
quantidade INT,
fornecedor INT,
criado_em DATETIME,
atualizado_em DATETIME,
deletado_em DATETIME,
FOREIGN KEY (fornecedor) REFERENCES fornecedores(fornecedor_id)
);