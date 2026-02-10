CREATE DATABASE IF NOT EXISTS controle_de_estoque;

USE controle_de_estoque;

CREATE TABLE IF NOT EXISTS categories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(150)
);

CREATE TABLE IF NOT EXISTS subcategories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(150),
    category_id INT,
	FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS products (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category_id INT,
    subcategory_id INT,
    quantity INT,
    price DECIMAL(10, 2),
    description TEXT,
    image_path VARCHAR(255),
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
    FOREIGN KEY (subcategory_id) REFERENCES subcategories(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS product_status (
	id INT AUTO_INCREMENT PRIMARY KEY,
	status VARCHAR(40)
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
);

ALTER TABLE products
ADD COLUMN status_id INT REFERENCES product_status(id);

INSERT INTO categories (name) VALUES 
('Móveis'), 
('Eletrodomésticos'), 
('Eletroportáteis'), 
('Decoração');

INSERT INTO subcategories (name, category_id) VALUES 
('Sala de Estar', '1'),
('Quarto', '1'),
('Cozinha', '1'),
('Escritório', '1'),
('Geladeiras', '2'),
('Fogões', '2'),
('Máquinas de Lavar', '2'),
('Micro-ondas', '2'),
('Air Fryers', '3'),
('Liquidificadores', '3'),
('Cafeteiras', '3'),
('Tapetes', '4'),
('Cortinas', '4'),
('Quadros', '4'),
('Iluminação', '4');

INSERT INTO product_status (status) VALUES
('Disponível'),
('Esgotado'),
('Última Unidade');

INSERT INTO products (name, 
                    category_id, 
                    subcategory_id, 
                    quantity, 
                    price, 
                    description, 
                    image_path, 
                    status_id) 
VALUES
-- Categoria: Móveis
('Sofá Retrátil 3 Lugares', 1, 1, 15, 2499.00, 'Sofá extremamente confortável com tecido suede e molas ensacadas.', 'sofa.jpg', 1),
('Guarda-Roupa Casal 6 Portas', 1, 2, 8, 1850.50, 'Amplo espaço interno com cabideiros em alumínio e 3 gavetas.', 'guarda-roupa.jpg', 1),
('Armário de Cozinha Suspenso', 1, 3, 3, 450.00, 'Design moderno e compacto, perfeito para organizar utensílios.', 'armario-suspenso.jpg', 1),
('Cadeira Ergonômica Office', 1, 4, 20, 899.90, 'Cadeira com ajuste de altura e apoio lombar ergonômico.', 'cadeira-office.jpg', 1),

-- Categoria: Eletrodomésticos
('Geladeira Frost Free 400L', 2, 5, 5, 3200.00, 'Tecnologia Frost Free com prateleiras reversíveis e painel digital.', 'geladeira.jpeg', 1),
('Fogão 5 Bocas Automático', 2, 6, 0, 1100.00, 'Acendimento automático total e mesa de vidro temperado.', 'fogao-5-bocas.jpg', 2),
('Lava e Seca 11kg', 2, 7, 4, 4150.00, 'Lava e seca roupas com inteligência artificial e economia de energia.', 'lava-e-seca.jpg', 1),
('Micro-ondas 30L Espelhado', 2, 8, 12, 650.00, 'Interior de fácil limpeza e diversas funções pré-programadas.', 'microondas.jpg', 1),

-- Categoria: Eletroportáteis
('Air Fryer Digital 4L', 3, 9, 25, 480.00, 'Fritadeira sem óleo com controle digital de tempo e temperatura.', 'air-fryer.jpg', 1),
('Liquidificador Turbo 1200W', 3, 10, 40, 189.90, 'Alta potência para triturar gelo e alimentos duros com facilidade.', 'liquidificador.jpg', 1),
('Cafeteira de Cápsulas Express', 3, 11, 1, 399.00, 'Prepare cafés expressos e bebidas cremosas em segundos.', 'cafeteira.jpg', 3),

-- Categoria: Decoração
('Tapete Turco 200x250', 4, 12, 10, 750.00, 'Tapete clássico com estampas geométricas e toque macio.', 'tapete-turco.jpg', 1),
('Cortina Blackout Tecido', 4, 13, 18, 220.00, 'Bloqueia 100% da luz solar, mantendo o ambiente fresco.', 'cortina.jpg', 1),
('Quadro Abstrato Moderno', 4, 14, 30, 120.50, 'Arte contemporânea em tela de alta qualidade para suas paredes.', 'quadro-abstrato.jpg', 1),
('Luminária de Chão Industrial', 4, 15, 0, 315.00, 'Estrutura metálica minimalista para decorações modernas.', 'luminaria.jpg', 2);