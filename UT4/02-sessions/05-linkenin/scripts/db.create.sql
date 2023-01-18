-- DECLARE @DAY AS INT;
SET @DAY = 7;

DROP TABLE IF EXISTS token;
DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id int auto_increment PRIMARY KEY,
    nombre VARCHAR(255),
    passwd VARCHAR(255),
    img    VARCHAR(255) DEFAULT './uploads/profile/img/default.jpg',
    correo VARCHAR(255) unique,
    descripcion TEXT
);

CREATE TABLE token (
    id int auto_increment PRIMARY KEY,
    id_usuario int,
    valor VARCHAR(255),
    tipo int,
    expiracion DATETIME DEFAULT (NOW() + INTERVAL @DAY DAY),
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);
