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

Y habrá que poner esto para que funcione *phpmailer*
```php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

// cambiamos el autoloader del ejemplo por el init que cargará las clases
require('../src/init.php');
```

Ejemplo de env:

```t
TITLE = "Linkenin"
DN_NAME = "linkenin"
DN_USER = "byeejasonn"
DN_PASS = "1234"
DN_HOST = "localhost"
```

## Mailer

Clase estatica de tres parametros:
- correo
- nombre de usuario
- subject