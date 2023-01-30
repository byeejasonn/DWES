from django.contrib import admin
from django.urls import include, path

from . import views

app_name = 'twitter'
urlpatterns = [
    path('', views.timeline, name="index"),
]
