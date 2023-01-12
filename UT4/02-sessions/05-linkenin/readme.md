## Tablas

### Usuarios

| **Usuarios** |
| ------------ |
| id           |
| usuario      |
| nombre       |
| passwd       |
| img          |
| correo       |
| desc         |

```sql
CREATE TABLE usuarios (
    id int auto_increment PRIMARY KEY,
    nombre VARCHAR(255),
    passwd VARCHAR(255),
    img    VARCHAR(255),
    correo VARCHAR(255),
    descripcion TEXT
);
```

### Tokens

| **Tokens** |
| ---------- |
| id         |
| idUsuario  |
| token      |
| exp        |


```sql
CREATE TABLE token (
    id int auto_increment PRIMARY KEY,
    id_usuario int,
    valor VARCHAR(255)
    expiracion DATETIME,
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);
```

## Ficheros

- \+ listado.php /listado/< nombre >
- \+ detalle.php /detalle/< id >
- \+ login.php /login/
- \- logout.php /logout/
- \+ registro.php
- \- edit.php /perfil/
- \+ recuperar.php

## Composer

Instala *composer* y luego instala *dotenv*

- dotenv
```s
$ composer require vlucas/phpdotenv 
```

- phpmailer
```s
$ composer require phpmailer/phpmailer
```

Para hacer que funcione correctamente *dotenv* en nuestro archivo de configuración escribiremos las siguientes tres líneas:

```php
require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
```

Ejemplo de env:

```t
TITLE = "Linkenin"
DN_NAME = "linkenin"
DN_USER = "byeejasonn"
DN_PASS = "1234"
DN_HOST = "localhost"
```