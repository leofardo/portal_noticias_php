CREATE TABLE tb_noticia(
	id int(4) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	titulo varchar(30) NOT NULL,
	noticia varchar(90) NOT NULL,
	data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tb_contas(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL,
	senha VARCHAR(255) NOT NULL,
	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	funcao INT(1) NOT NULL
);


-- Use esse comando para adicionar um administrador para poder adicionar notícias.
INSERT INTO tb_contas (nome, email, senha, funcao) VALUES ('admin', 'admin@admin.com', '123', 1); 
