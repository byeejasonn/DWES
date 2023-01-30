from django.db import models

# Create your models here.

class Tweet(models.Model):
    tweet_text = models.CharField(max_length=255)
    pub_date = models.DateTimeField()
    likes = models.IntegerField(default=0)

class Reply(models.Model):
    tweet = models.ForeignKey(Tweet, on_delete=models.CASCADE)
    reply_text = models.CharField(max_length=255)
    pub_date = models.DateTimeField()
    likes = models.IntegerField(default=0)


