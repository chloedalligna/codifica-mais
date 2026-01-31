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
    FOREIGN KEY (category_id) REFERENCES subcategories(category_id) ON DELETE CASCADE,
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
('Sofá Retrátil 3 Lugares', 1, 1, 15, 2499.00, 'Sofá extremamente confortável com tecido suede e molas ensacadas.', 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=500', 1),
('Guarda-Roupa Casal 6 Portas', 1, 2, 8, 1850.50, 'Amplo espaço interno com cabideiros em alumínio e 3 gavetas.', 'https://images.unsplash.com/photo-1595428774223-ef52624120d2?w=500', 1),
('Armário de Cozinha Suspenso', 1, 3, 3, 450.00, 'Design moderno e compacto, perfeito para organizar utensílios.', 'https://images.unsplash.com/photo-1556912177-d54024563720?w=500', 1),
('Cadeira Ergonômica Office', 1, 4, 20, 899.90, 'Cadeira com ajuste de altura e apoio lombar ergonômico.', 'https://images.unsplash.com/photo-1505797149-43b0003ee2bb?w=500', 1),

-- Categoria: Eletrodomésticos
('Geladeira Frost Free 400L', 2, 5, 5, 3200.00, 'Tecnologia Frost Free com prateleiras reversíveis e painel digital.', 'https://images.pexels.com/photos/2343467/pexels-photo-2343467.jpeg?auto=compress&cs=tinysrgb&w=500', 1),
('Fogão 5 Bocas Automático', 2, 6, 0, 1100.00, 'Acendimento automático total e mesa de vidro temperado.', 'https://images.pexels.com/photos/5824901/pexels-photo-5824901.jpeg?auto=compress&cs=tinysrgb&w=500', 2),
('Lava e Seca 11kg', 2, 7, 4, 4150.00, 'Lava e seca roupas com inteligência artificial e economia de energia.', 'https://images.pexels.com/photos/2582737/pexels-photo-2582737.jpeg?auto=compress&cs=tinysrgb&w=500', 1),
('Micro-ondas 30L Espelhado', 2, 8, 12, 650.00, 'Interior de fácil limpeza e diversas funções pré-programadas.', 'https://images.pexels.com/photos/4686817/pexels-photo-4686817.jpeg?auto=compress&cs=tinysrgb&w=500', 1),

-- Categoria: Eletroportáteis
('Air Fryer Digital 4L', 3, 9, 25, 480.00, 'Fritadeira sem óleo com controle digital de tempo e temperatura.', 'https://images.pexels.com/photos/6621248/pexels-photo-6621248.jpeg?auto=compress&cs=tinysrgb&w=500', 1),
('Liquidificador Turbo 1200W', 3, 10, 40, 189.90, 'Alta potência para triturar gelo e alimentos duros com facilidade.', 'https://images.pexels.com/photos/3094224/pexels-photo-3094224.jpeg?auto=compress&cs=tinysrgb&w=500', 1),
('Cafeteira de Cápsulas Express', 3, 11, 1, 399.00, 'Prepare cafés expressos e bebidas cremosas em segundos.', 'https://images.unsplash.com/photo-1517668808822-9ebb02f2a0e6?w=500', 3),

-- Categoria: Decoração
('Tapete Turco 200x250', 4, 12, 10, 750.00, 'Tapete clássico com estampas geométricas e toque macio.', 'https://images.unsplash.com/photo-1534889156217-d3c8ed48ca42?w=500', 1),
('Cortina Blackout Tecido', 4, 13, 18, 220.00, 'Bloqueia 100% da luz solar, mantendo o ambiente fresco.', 'https://images.unsplash.com/photo-1514894636912-34994458d924?w=500', 1),
('Quadro Abstrato Moderno', 4, 14, 30, 120.50, 'Arte contemporânea em tela de alta qualidade para suas paredes.', 'https://images.unsplash.com/photo-1513519245088-0e12902e5a38?w=500', 1),
('Luminária de Chão Industrial', 4, 15, 0, 315.00, 'Estrutura metálica minimalista para decorações modernas.', 'https://images.unsplash.com/photo-1507473885765-e6ed657f9971?w=500', 2);