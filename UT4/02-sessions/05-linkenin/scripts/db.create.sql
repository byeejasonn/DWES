-- SET @INT_DAY := 7;

DROP TABLE IF EXISTS token;
DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id INT auto_increment PRIMARY KEY,
    nombre VARCHAR(255),
    passwd VARCHAR(255),
    img    VARCHAR(255) DEFAULT './uploads/profile/img/default.jpg',
    correo VARCHAR(255) unique,
    descripcion TEXT,
    verificacion INT DEFAULT 0
);

CREATE TABLE token (
    id INT auto_increment PRIMARY KEY,
    id_usuario INT,
    valor VARCHAR(255),
    tipo INT,
    expiracion DATETIME DEFAULT (NOW() + INTERVAL 7 DAY), -- no consigo que vaya con variable
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);
