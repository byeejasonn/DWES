# Generated by Django 4.1.5 on 2023-02-23 19:45

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('incidencias', '0003_alter_incidencia_nombre'),
    ]

    operations = [
        migrations.RenameField(
            model_name='incidencia',
            old_name='nombre',
            new_name='texto',
        ),
    ]