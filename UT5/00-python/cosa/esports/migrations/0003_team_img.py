# Generated by Django 4.1.5 on 2023-02-02 18:42

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('esports', '0002_game_slug_genre_slug_team_slug'),
    ]

    operations = [
        migrations.AddField(
            model_name='team',
            name='img',
            field=models.ImageField(null=True, upload_to='equipos'),
        ),
    ]
