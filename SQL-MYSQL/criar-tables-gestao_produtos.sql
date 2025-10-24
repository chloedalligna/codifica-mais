USE gestao_produtos;

CREATE TABLE produtos (
id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255),
descricao TEXT,
categoria VARCHAR(50),
preco DECIMAL(10,2),
peso FLOAT,
quantidade INT,
FOREIGN KEY (fornecedor) REFERENCES fornecedores(id),
criado_em DATETIME,
atualizado_em DATETIME,
deletado_em DATETIME
);

CREATE TABLE fornecedores (
id INT PRIMARY KEY AUTO_INCREMENT,
razao_social VARCHAR(255),
cnpj VARCHAR(14),
criado_em DATETIME,
atualizado_em DATETIME,
deletado_em DATETIME
);