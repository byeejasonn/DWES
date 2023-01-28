## Error loading MySQLdb Module 'Did you install mysqlclient or MySQL-python?'

[Stack overflow](https://stackoverflow.com/questions/46902357/error-loading-mysqldb-module-did-you-install-mysqlclient-or-mysql-python)

```
pip install pymysql
```

Then, edit the __init__.py file in your project origin dir(the same as settings.py)

```py
import pymysql

pymysql.install_as_MySQLdb()
```

Añadir a settings.py la configuración de la app *polls*

```py
INSTALLED_APPS = [
    'polls.apps.PollsConfig', # <--
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
]
```

**opcional??**
[mariadb conector windows](https://mariadb.com/downloads/connectors/)


## Después de conectar la BD

Crear los modelos para las encuestas y crear el super usuarios para el apartado de admin mediante:

```
python manage.py createsuperuser

# ponemos nombre y contraseña y podremos acceder al área administrativa
```

Para que dentro del área podamos manipular los modelos tendremos que añadirlos en el fichero admin.py

```py
from django.contrib import admin

# Register your models here.

from .models import Question, Choice

admin.site.register(Question)
admin.site.register(Choice)
```

