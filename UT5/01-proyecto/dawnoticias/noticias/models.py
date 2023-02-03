from django.db import models

# Create your models here.
class Noticia(models.Model):
    titulo = models.CharField(max_length=50)
    desc = models.TextField()
    img1 = models.ImageField(upload_to="noticias")
    img2 = models.ImageField(upload_to="noticias", null=True, blank=True)
    img3 = models.ImageField(upload_to="noticias", null=True, blank=True)
    img4 = models.ImageField(upload_to="noticias", null=True, blank=True)
    img5 = models.ImageField(upload_to="noticias", null=True, blank=True)

    def __str__(self):
        return self.titulo

    def getImages(self):
        return [self.img1, self.img2, self.img3, self.img4, self.img5]