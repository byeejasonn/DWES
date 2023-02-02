from django.db import models
from django.urls import reverse

# Create your models here.
class Team(models.Model):
    name = models.CharField(max_length=30)
    desc = models.TextField()
    year = models.DateField()
    slug = models.SlugField(max_length=255, unique=True, null=True)
    img = models.ImageField(upload_to='equipos', null=True)
    
    def __str__(self):
        return f"Team: {self.name} ({self.year})"

    def get_absolute_url(self):
            return reverse("slug", kwargs={"slug": self.slug})

# borrado lógico
class Genre(models.Model):
    name = models.CharField(max_length=30)
    desc = models.TextField()
    slug = models.SlugField(max_length=255, unique=True, null=True)

    def __str__(self):
        return f"{self.name}: {self.desc}"

    def get_absolute_url(self):
            return reverse("slug", kwargs={"slug": self.slug})

class Game(models.Model):
    name = models.CharField(max_length=30)
    desc = models.TextField()
    year = models.DateField()
    genre = models.ForeignKey(Genre, on_delete=models.SET_NULL, null=True)
    team = models.ManyToManyField(Team, )
    slug = models.SlugField(max_length=255, unique=True, null=True)

    def __str__(self):
        return f"Game: {self.name} [{self.genre}] ({self.year})"

    def get_absolute_url(self):
            return reverse("slug", kwargs={"slug": self.slug})