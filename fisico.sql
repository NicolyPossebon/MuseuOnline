CREATE DATABASE memorial;
USE memorial;

CREATE TABLE postagens (
descricao_postagem VARCHAR(400),
id_postagem INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
status_moderacao INT(1),
titulo VARCHAR(300),
ano_postagem YEAR(6),
data_atual DATETIME(6),
id_usuario INT(100)
);

CREATE TABLE arquivos (
tipo_arquivo VARCHAR(200),
id_arquivo INT(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
endereco_arquivo VARCHAR(300),
id_postagem INT(10),
FOREIGN KEY(id_postagem) REFERENCES postagens (id_postagem)
);

CREATE TABLE usuario (
id_usuario INT(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
nome VARCHAR(200),
email VARCHAR(200) UNIQUE,
senha VARCHAR(250),
foto VARCHAR(300),
tipo INT(1)
);

CREATE TABLE iffar (
contato VARCHAR(200),
sobre VARCHAR(400),
id_iffar INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
oque VARCHAR(400),
local_iffar VARCHAR(200)
);

CREATE TABLE denuncia (
data_denuncia DATETIME(6),
motivo VARCHAR(400),
id_usuario INT(100),
id_postagem INT(10),
FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario),
FOREIGN KEY(id_postagem) REFERENCES postagens (id_postagem)
);

CREATE TABLE curte (
data_curtida DATETIME(6),
id_usuario INT(100),
id_postagem INT(10),
FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario),
FOREIGN KEY(id_postagem) REFERENCES postagens (id_postagem)
);

ALTER TABLE postagens ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario)
