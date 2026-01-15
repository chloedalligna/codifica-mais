USE gestao_estoque;

CREATE TABLE IF NOT EXISTS categorias (
	categoria VARCHAR(150) PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS subcategorias (
	subcategoria VARCHAR(150) PRIMARY KEY,
    categoria_pai VARCHAR(150),
	FOREIGN KEY (categoria_pai) REFERENCES categorias(categoria) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS produtos (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    categoria VARCHAR(150),
    subcategoria VARCHAR(150),
    preco DECIMAL(10, 2),
    status ENUM('Disponível', 'Esgotado', 'Sob Encomenda'),
    quantidade INT,
    imagem_url VARCHAR(255),
    descricao TEXT,
    FOREIGN KEY (categoria) REFERENCES subcategorias(categoria_pai),
    FOREIGN KEY (subcategoria) REFERENCES subcategorias(subcategoria) ON DELETE CASCADE
);

INSERT INTO categorias VALUES 
('Móveis'), 
('Eletrodomésticos'), 
('Eletroportáteis'), 
('Decoração');

INSERT INTO subcategorias VALUES 
('Móveis'), 
('Eletrodomésticos'), 
('Eletroportáteis'), 
('Decoração');

INSERT INTO subcategorias (subcategoria, categoria_pai) VALUES 
('Sala de Estar', 'Móveis'),
('Quarto', 'Móveis'),
('Cozinha', 'Móveis'),
('Escritório', 'Móveis'),
('Geladeiras', 'Eletrodomésticos'),
('Fogões', 'Eletrodomésticos'),
('Máquinas de Lavar', 'Eletrodomésticos'),
('Micro-ondas', 'Eletrodomésticos'),
('Air Fryers', 'Eletroportáteis'),
('Liquidificadores', 'Eletroportáteis'),
('Cafeteiras', 'Eletroportáteis'),
('Tapetes', 'Decoração'),
('Cortinas', 'Decoração'),
('Quadros', 'Decoração'),
('Iluminação', 'Decoração');

INSERT INTO produtos (nome, categoria, subcategoria, preco, status, quantidade, imagem_url, descricao) VALUES
-- Categoria: Móveis
('Sofá Retrátil 3 Lugares', 'Móveis', 'Sala de Estar', 2499.00, 'Disponível', 15, 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=500', 'Sofá extremamente confortável com tecido suede e molas ensacadas, ideal para maratonar séries.'),
('Guarda-Roupa Casal 6 Portas', 'Móveis', 'Quarto', 1850.50, 'Disponível', 8, 'https://images.unsplash.com/photo-1595428774223-ef52624120d2?w=500', 'Amplo espaço interno com cabideiros em alumínio e 3 gavetas com corrediças telescópicas.'),
('Armário de Cozinha Suspenso', 'Móveis', 'Cozinha', 450.00, 'Sob Encomenda', 3, 'https://images.unsplash.com/photo-1556912177-d54024563720?w=500', 'Design moderno e compacto, perfeito para organizar utensílios e otimizar o espaço da sua cozinha.'),
('Cadeira Ergonômica Office', 'Móveis', 'Escritório', 899.90, 'Disponível', 20, 'https://images.unsplash.com/photo-1505797149-43b0003ee2bb?w=500', 'Cadeira com ajuste de altura e apoio lombar, garantindo conforto durante longas horas de trabalho.'),

-- Categoria: Eletrodomésticos
('Geladeira Frost Free 400L', 'Eletrodomésticos', 'Geladeiras', 3200.00, 'Disponível', 5, 'https://images.pexels.com/photos/2343467/pexels-photo-2343467.jpeg?auto=compress&cs=tinysrgb&w=500', 'Tecnologia Frost Free com prateleiras reversíveis e painel digital para controle de temperatura.'),
('Fogão 5 Bocas Automático', 'Eletrodomésticos', 'Fogões', 1100.00, 'Esgotado', 0, 'https://images.pexels.com/photos/5824901/pexels-photo-5824901.jpeg?auto=compress&cs=tinysrgb&w=500', 'Acendimento automático total e mesa de vidro temperado que facilita a limpeza diária.'),
('Lava e Seca 11kg', 'Eletrodomésticos', 'Máquinas de Lavar', 4150.00, 'Disponível', 4, 'https://images.pexels.com/photos/2582737/pexels-photo-2582737.jpeg?auto=compress&cs=tinysrgb&w=500', 'Lava e seca roupas com inteligência artificial, economizando água e energia com eficiência.'),
('Micro-ondas 30L Espelhado', 'Eletrodomésticos', 'Micro-ondas', 650.00, 'Disponível', 12, 'https://images.pexels.com/photos/4686817/pexels-photo-4686817.jpeg?auto=compress&cs=tinysrgb&w=500', 'Interior de fácil limpeza e diversas funções pré-programadas para facilitar sua rotina.'),

-- Categoria: Eletroportáteis
('Air Fryer Digital 4L', 'Eletroportáteis', 'Air Fryers', 480.00, 'Disponível', 25, 'https://images.pexels.com/photos/6621248/pexels-photo-6621248.jpeg?auto=compress&cs=tinysrgb&w=500', 'Fritadeira sem óleo com controle digital de tempo e temperatura para alimentos crocantes e saudáveis.'),
('Liquidificador Turbo 1200W', 'Eletroportáteis', 'Liquidificadores', 189.90, 'Disponível', 40, 'https://images.pexels.com/photos/3094224/pexels-photo-3094224.jpeg?auto=compress&cs=tinysrgb&w=500', 'Alta potência para triturar gelo e alimentos duros com facilidade, possui 12 velocidades.'),
('Cafeteira de Cápsulas Express', 'Eletroportáteis', 'Cafeteiras', 399.00, 'Sob Encomenda', 2, 'https://images.unsplash.com/photo-1517668808822-9ebb02f2a0e6?w=500', 'Prepare cafés expressos e bebidas cremosas em segundos com apenas um toque.'),

-- Categoria: Decoraçãocategoriascategoriascategoriascategoriascategoriacategoria
('Tapete Turco 200x250', 'Decoração', 'Tapetes', 750.00, 'Disponível', 10, 'https://images.unsplash.com/photo-1534889156217-d3c8ed48ca42?w=500', 'Tapete clássico com estampas geométricas e toque macio, ideal para salas de estar luxuosas.'),
('Cortina Blackout Tecido', 'Decoração', 'Cortinas', 220.00, 'Disponível', 18, 'https://images.unsplash.com/photo-1514894636912-34994458d924?w=500', 'Bloqueia 100% da luz solar, mantendo o ambiente fresco e perfeito para um sono tranquilo.'),
('Quadro Abstrato Moderno', 'Decoração', 'Quadros', 120.50, 'Disponível', 30, 'https://images.unsplash.com/photo-1513519245088-0e12902e5a38?w=500', 'Arte contemporânea em tela de alta qualidade para dar um toque de sofisticação às suas paredes.'),
('Luminária de Chão Industrial', 'Decoração', 'Iluminação', 315.00, 'Esgotado', 0, 'https://images.unsplash.com/photo-1507473885765-e6ed657f9971?w=500', 'Estrutura metálica minimalista que combina com decorações urbanas e modernas.');