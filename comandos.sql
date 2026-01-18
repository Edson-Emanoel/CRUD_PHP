CREATE DATABASE crud_php;

USE crud_php;
CREATE TABLE usuarios (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(125),
    email VARCHAR(255),
    data_nascimento DATE,
    senha VARCHAR(100)
);
DROP TABLE usuarios;

CREATE TABLE usuarios (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(125),
    email VARCHAR(255),
    data_nascimento DATE,
    senha VARCHAR(100),
    perfil_id INT,
    CONSTRAINT fk_usuario_perfil
        FOREIGN KEY (perfil_id)
        REFERENCES perfil(id)
);

SELECT * FROM usuarios;

CREATE TABLE perfil (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(25) default("cliente")
);
SELECT * FROM perfil;