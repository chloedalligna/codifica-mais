CREATE DATABASE IF NOT EXISTS gestao_estoque;

USE gestao_estoque;

CREATE TABLE IF NOT EXISTS categorias (
	id_categoria INT AUTO_INCREMENT PRIMARY KEY,
	nome_categoria VARCHAR(150)
);

CREATE TABLE IF NOT EXISTS subcategorias (
	id_subcategoria INT AUTO_INCREMENT PRIMARY KEY,
	nome_subcategoria VARCHAR(150),
    id_categoria INT,
	FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS produtos (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(255) NOT NULL,
    id_categoria INT,
    id_subcategoria INT,
    preco DECIMAL(10, 2),
    status ENUM('Disponível', 'Esgotado', 'Sob Encomenda'),
    quantidade INT,
    imagem_url VARCHAR(255),
    descricao TEXT,
    FOREIGN KEY (id_categoria) REFERENCES subcategorias(id_categoria),
    FOREIGN KEY (id_subcategoria) REFERENCES subcategorias(id_subcategoria) ON DELETE CASCADE
);

INSERT INTO categorias (nome_categoria) VALUES 
('Móveis'), 
('Eletrodomésticos'), 
('Eletroportáteis'), 
('Decoração');

INSERT INTO subcategorias (nome_subcategoria, id_categoria) VALUES 
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

INSERT INTO produtos (nome_produto, id_categoria, id_subcategoria, preco, status, quantidade, imagem_url, descricao) VALUES
-- Categoria: Móveis
('Sofá Retrátil 3 Lugares', '1', '1', 2499.00, 'Disponível', 15, 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=500', 'Sofá extremamente confortável com tecido suede e molas ensacadas, ideal para maratonar séries.'),
('Guarda-Roupa Casal 6 Portas', '1', '2', 1850.50, 'Disponível', 8, 'https://images.unsplash.com/photo-1595428774223-ef52624120d2?w=500', 'Amplo espaço interno com cabideiros em alumínio e 3 gavetas com corrediças telescópicas.'),
('Armário de Cozinha Suspenso', '1', '3', 450.00, 'Sob Encomenda', 3, 'https://images.unsplash.com/photo-1556912177-d54024563720?w=500', 'Design moderno e compacto, perfeito para organizar utensílios e otimizar o espaço da sua cozinha.'),
('Cadeira Ergonômica Office', '1', '4', 899.90, 'Disponível', 20, 'https://images.unsplash.com/photo-1505797149-43b0003ee2bb?w=500', 'Cadeira com ajuste de altura e apoio lombar, garantindo conforto durante longas horas de trabalho.'),

-- Categoria: Eletrodomésticos
('Geladeira Frost Free 400L', '2', '5', 3200.00, 'Disponível', 5, 'https://images.pexels.com/photos/2343467/pexels-photo-2343467.jpeg?auto=compress&cs=tinysrgb&w=500', 'Tecnologia Frost Free com prateleiras reversíveis e painel digital para controle de temperatura.'),
('Fogão 5 Bocas Automático', '2', '6', 1100.00, 'Esgotado', 0, 'https://images.pexels.com/photos/5824901/pexels-photo-5824901.jpeg?auto=compress&cs=tinysrgb&w=500', 'Acendimento automático total e mesa de vidro temperado que facilita a limpeza diária.'),
('Lava e Seca 11kg', '2', '7', 4150.00, 'Disponível', 4, 'https://images.pexels.com/photos/2582737/pexels-photo-2582737.jpeg?auto=compress&cs=tinysrgb&w=500', 'Lava e seca roupas com inteligência artificial, economizando água e energia com eficiência.'),
('Micro-ondas 30L Espelhado', '2', '8', 650.00, 'Disponível', 12, 'https://images.pexels.com/photos/4686817/pexels-photo-4686817.jpeg?auto=compress&cs=tinysrgb&w=500', 'Interior de fácil limpeza e diversas funções pré-programadas para facilitar sua rotina.'),

-- Categoria: Eletroportáteis
('Air Fryer Digital 4L', '3', '9', 480.00, 'Disponível', 25, 'https://images.pexels.com/photos/6621248/pexels-photo-6621248.jpeg?auto=compress&cs=tinysrgb&w=500', 'Fritadeira sem óleo com controle digital de tempo e temperatura para alimentos crocantes e saudáveis.'),
('Liquidificador Turbo 1200W', '3', '10', 189.90, 'Disponível', 40, 'https://images.pexels.com/photos/3094224/pexels-photo-3094224.jpeg?auto=compress&cs=tinysrgb&w=500', 'Alta potência para triturar gelo e alimentos duros com facilidade, possui 12 velocidades.'),
('Cafeteira de Cápsulas Express', '3', '11', 399.00, 'Sob Encomenda', 2, 'https://images.unsplash.com/photo-1517668808822-9ebb02f2a0e6?w=500', 'Prepare cafés expressos e bebidas cremosas em segundos com apenas um toque.'),

-- Categoria: Decoração
('Tapete Turco 200x250', '4', '12', 750.00, 'Disponível', 10, 'https://images.unsplash.com/photo-1534889156217-d3c8ed48ca42?w=500', 'Tapete clássico com estampas geométricas e toque macio, ideal para salas de estar luxuosas.'),
('Cortina Blackout Tecido', '4', '13', 220.00, 'Disponível', 18, 'https://images.unsplash.com/photo-1514894636912-34994458d924?w=500', 'Bloqueia 100% da luz solar, mantendo o ambiente fresco e perfeito para um sono tranquilo.'),
('Quadro Abstrato Moderno', '4', '14', 120.50, 'Disponível', 30, 'https://images.unsplash.com/photo-1513519245088-0e12902e5a38?w=500', 'Arte contemporânea em tela de alta qualidade para dar um toque de sofisticação às suas paredes.'),
('Luminária de Chão Industrial', '4', '15', 315.00, 'Esgotado', 0, 'https://images.unsplash.com/photo-1507473885765-e6ed657f9971?w=500', 'Estrutura metálica minimalista que combina com decorações urbanas e modernas.');