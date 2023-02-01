from django.db import models

# Create your models here.
class Team(models.Model):
    name = models.CharField(max_length=30)
    desc = models.TextField()
    year = models.DateField()

    def __str__(self):
        return f"Team: {self.name} ({self.year})"

# borrado lógico
class Genre(models.Model):
    name = models.CharField(max_length=30)
    desc = models.TextField()

    def __str__(self):
        return f"{self.name}: {self.desc}"

class Game(models.Model):
    name = models.CharField(max_length=30)
    desc = models.TextField()
    year = models.DateField()
    genre = models.ForeignKey(Genre, on_delete=models.SET_NULL, null=True)
    team = models.ManyToManyField(Team, )

    def __str__(self):
        return f"Game: {self.name} [{self.genre}] ({self.year})"