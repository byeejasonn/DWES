from django.db import models

# Create your models here.


class Section(models.Model):
    name = models.CharField(max_length=50)


class Mission(models.Model):
    name = models.CharField(max_length=40)
    desc = models.TextField()
    section = models.ForeignKey(Section, on_delete=models.CASCADE)
