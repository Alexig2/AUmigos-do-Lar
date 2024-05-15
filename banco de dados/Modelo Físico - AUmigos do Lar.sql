DROP DATABASE IF EXISTS aumigos;
CREATE DATABASE aumigos;
USE aumigos;

CREATE TABLE Usuario (
	usuario_codigo INT NOT NULL AUTO_INCREMENT,
	usuario_cpf VARCHAR(14) NOT NULL UNIQUE,
    usuario_foto VARCHAR(255),
	nome VARCHAR(45) NOT NULL,
	sobrenome VARCHAR(45) NOT NULL,
	data_nasc DATE NOT NULL,
	email VARCHAR(45) NOT NULL,
	senha VARCHAR(45) NOT NULL,
	cidade VARCHAR(45) NOT NULL,
	estado VARCHAR(45) NOT NULL,
	PRIMARY KEY (usuario_codigo)
);
INSERT INTO Usuario (usuario_cpf, nome, sobrenome, data_nasc, email, senha, cidade, estado, usuario_foto)
VALUES ('111.111.111-11', 'Fulana', 'de Tal', '1990-01-31', 'fulana@email.com', '123fulana', 'Cidade Um', 'MG', 'pessoa2.jpg'),
('222.222.222-22', 'Cliclana', 'Palone', '1991-01-31', 'ciclana@mail.com', '123ciclana', 'Cidade Três', 'MS', 'ciclana.jpg'),
('333.333.333-33', 'Deutrano', 'De Certo', '1998-02-28', 'deutrano@mail.com', '123deutrano', 'Cidade Cataratas', 'PA', 'homem1.jpg');


CREATE TABLE Ong (
	ong_codigo INT NOT NULL AUTO_INCREMENT,
	ong_cnpj VARCHAR(45) NOT NULL UNIQUE,
	nome_fantasia VARCHAR(45) NOT NULL,
    ong_foto VARCHAR(255),
	cidade VARCHAR(45) NOT NULL,
	estado VARCHAR(45) NOT NULL,
	endereco VARCHAR(45) NOT NULL,
	descricao VARCHAR(80),
	email_ong VARCHAR(45) NOT NULL,
	senha_ong VARCHAR(45) NOT NULL,
	agencia VARCHAR(45),
	conta_corrente VARCHAR(45),
	chave_pix VARCHAR(45),
	caixa_postal VARCHAR(45),
	PRIMARY KEY (ong_codigo)
);
INSERT INTO Ong (ong_cnpj, nome_fantasia, cidade, estado, endereco, descricao, email_ong, senha_ong, agencia, conta_corrente, chave_pix, caixa_postal, ong_foto)
VALUES ('123-1', 'ONG Um', 'Cidade Um', 'SP', 'Rua Um, Nº 1111', 'Horário de Funcionamento: das 9h às 18h', 'ong1@mail.com', 'senhaong1', 'ag123', 'cc123', 'pix123', 'postal123', 'sarah-dorweiler-x2Tmfd1-SgA-unsplash.jpg'),
('123-2', 'ONG Dois', 'Cidade Dois', 'RJ', 'Rua Dois, Nº 2222', 'Horário de Funcionamento: das 8h às 17h', 'ong2@mail.com', 'senhaong2', 'ag222', 'cc222', 'pix222', 'postal222', 'pxfuel square.jpg'),
('123-3', 'ONG Donk', 'Cidade Danova', 'RJ', 'Rua Dorcas, Nº 3333', 'Horário de Funcionamento: das 11h às 19h', 'ongdonk@mail.com', '123', 'ag333', 'cc333', 'pix333', 'postal333', 'christmas-1911637_640.jpg');


CREATE TABLE Denuncia (
	denuncia_codigo INT NOT NULL AUTO_INCREMENT,
	cidade VARCHAR(45) NOT NULL,
    estado VARCHAR(45) NOT NULL,
    endereco VARCHAR(45) NOT NULL,
    descricao VARCHAR(80) NOT NULL,
    quantidade INT NOT NULL,
    data_denuncia DATE NOT NULL,
    denuncia_disponi INT,
    PRIMARY KEY (denuncia_codigo)
);
INSERT INTO Denuncia (cidade, estado, endereco, descricao, quantidade, data_denuncia, denuncia_disponi)
VALUES ('Cidade Um', 'SP', 'Rua Dois', 'Cachorro', 1, '2023-02-01', 1),
('Cidade Dois', 'RJ', 'Rua Três', 'Cachorros', 2, '2023-03-02', 1);


CREATE TABLE Resgate (
	resgate_codigo INT NOT NULL AUTO_INCREMENT,
    ong_codigo INT NOT NULL,
	denuncia_codigo INT NOT NULL,
    animal_encontrado INT NOT NULL,
    data_acao DATE NOT NULL,
    PRIMARY KEY (resgate_codigo),
    FOREIGN KEY (ong_codigo) REFERENCES Ong (ong_codigo),
    FOREIGN KEY (denuncia_codigo) REFERENCES Denuncia (denuncia_codigo)
);
INSERT INTO Resgate (ong_codigo, denuncia_codigo, animal_encontrado, data_acao)
VALUES (1, 1, 1, '2023-02-02');


CREATE TABLE Animal (
	animal_codigo INT NOT NULL AUTO_INCREMENT,
    ong_codigo INT NOT NULL,
    animal_foto VARCHAR(255),
    nome VARCHAR(45) NOT NULL,
	idade INT,
    medida_idade VARCHAR(45),
	raca VARCHAR(45) NOT NULL,
	porte VARCHAR(45) NOT NULL,
	especie VARCHAR(45) NOT NULL,
	descricao VARCHAR(80) NOT NULL,
	sexo VARCHAR(10) NOT NULL,
    animal_disponi INT,
	PRIMARY KEY (animal_codigo),
	FOREIGN KEY (ong_codigo) REFERENCES Ong (ong_codigo)
);
INSERT INTO Animal (ong_codigo, nome, idade, raca, porte, especie, descricao, sexo, animal_disponi, animal_foto, medida_idade)
VALUES (1, 'Lola', 5, 'Shih Tzu', 'pequeno', 'cachorro', 'Pelo branco e mansa.', 'femea', 1, 'lola.jpg', 'anos'),
(2, 'Thomas', 6, 'SRD', 'pequeno', 'gato', 'Bravíssimo. Um ótimo caçador.', 'macho', 2, 'bolota.jpg', 'anos'),
(1, 'Filomena', 7, 'Siamês', 'medio', 'gato', 'Chata.', 'femea', 1, 'filomena.jpg', 'meses'),
(2, 'Rex', 4, 'Pastor Alemão', 'pequeno', 'cachorro', 'Roedor de canelas.', 'macho', 1, 'rex.jpeg', 'meses');


CREATE TABLE Animal_resgatado (
	resgate_codigo INT NOT NULL AUTO_INCREMENT,
    animal_codigo INT NOT NULL,
    PRIMARY KEY (resgate_codigo),
    FOREIGN KEY (resgate_codigo) REFERENCES Resgate (resgate_codigo),
    FOREIGN KEY (animal_codigo) REFERENCES Animal (animal_codigo)
);
INSERT INTO Animal_resgatado (animal_codigo)
VALUES (1);

CREATE TABLE Pedido_adocao (
	pedido_codigo INT NOT NULL AUTO_INCREMENT,
    usuario_codigo INT NOT NULL,
    animal_codigo INT NOT NULL,
    termo VARCHAR(45) NOT NULL,
	comprovante_endereco VARCHAR(45) NOT NULL,
    data1 DATE NOT NULL,
    data2 DATE NOT NULL,
    data3 DATE NOT NULL,
    horario1 TIME NOT NULL,
    horario2 TIME NOT NULL,
    horario3 TIME NOT NULL,
	documento_foto VARCHAR(45) NOT NULL,
    pedido_disponi INT,
    PRIMARY KEY (pedido_codigo),
    FOREIGN KEY (usuario_codigo) REFERENCES Usuario (usuario_codigo),
    FOREIGN KEY (animal_codigo) REFERENCES Animal (animal_codigo)
);
INSERT INTO Pedido_adocao (usuario_codigo, animal_codigo, termo, comprovante_endereco, documento_foto, data1, data2, data3, horario1, horario2, horario3, pedido_disponi)
VALUES (1, 2, 'Diretório do termo', 'Diretório do comprovante de endereço', 'Diretório do documento com foto', '2023-02-01', '2023-02-02', '2023-02-03', '14:30', '15:30', '16:30', 0),
(2, 3, 'Diretório do termo2', 'Diretório do comprovante de endereço2', 'Diretório do documento com foto2', '2023-03-03', '2023-03-04', '2023-03-05', '14:00', '15:00', '19:30', 1),
(3, 4, 'Diretório do termo4', 'Diretório do comprovante de endereço4', 'Diretório do documento com foto4', '2023-04-04', '2023-04-15', '2023-04-16', '13:20', '13:50', '14:18', 1);

CREATE TABLE Adocao (
	adocao_codigo INT NOT NULL AUTO_INCREMENT,
	usuario_cpf VARCHAR(14) NOT NULL,
    ong_codigo INT NOT NULL,
    pedido_codigo INT NOT NULL,
	confirmacao INT NOT NULL,
	data_adocao DATE NOT NULL,
    data_retirada DATE,
	PRIMARY KEY (adocao_codigo),
    FOREIGN KEY (usuario_cpf) REFERENCES Usuario (usuario_cpf),
    FOREIGN KEY (ong_codigo) REFERENCES Ong (ong_codigo),
    FOREIGN KEY (pedido_codigo) REFERENCES Pedido_adocao (pedido_codigo)
);
INSERT INTO Adocao (pedido_codigo, ong_codigo, confirmacao, data_adocao, data_retirada, usuario_cpf)
VALUES (1, 1, 1, '2023-02-10', '2023-02-11', '111.111.111-11');