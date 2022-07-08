CREATE DATABASE icourse;

CREATE TABLE icourse.usuarios ( id INT NOT NULL AUTO_INCREMENT,
                                nome VARCHAR(255) NOT NULL,
                                email varbinary(9999) NOT NULL,
                                senha varbinary(9999) NOT NULL,
                                tipo ENUM('ADMIN', 'ENDUSER') NOT NULL DEFAULT 'ENDUSER',
                                ativo BOOLEAN NOT NULL DEFAULT 1,
                                PRIMARY KEY (id));

CREATE TABLE icourse.instituicao ( id INT NOT NULL AUTO_INCREMENT,
                                nome VARCHAR(255) NOT NULL,
                                descricao VARCHAR(255) NOT NULL,
                                endereco VARCHAR(255) NOT NULL,
                                tags VARCHAR(999),
                                ativo BOOLEAN NOT NULL DEFAULT 1,
                                data_criado INT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                data_deletado INT,
                                PRIMARY KEY (id));

CREATE TABLE icourse.cursos (   id INT NOT NULL AUTO_INCREMENT, 
                                nome VARCHAR(255) NOT NULL, 
                                descricao VARCHAR(255) NOT NULL, 
                                tags VARCHAR(999), 
                                ativo BOOLEAN NOT NULL DEFAULT 1, 
                                id_instituicao INT NOT NULL,
                                data_criado INT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                data_deletado INT,
                                PRIMARY KEY (id),
                                FOREIGN KEY (id_instituicao) REFERENCES icourse.instituicao(id));