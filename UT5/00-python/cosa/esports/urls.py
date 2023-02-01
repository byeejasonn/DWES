
from django.contrib import admin
from django.urls import path

from . import views 

app_name='esports'
urlpatterns = [
    path('', views.index),
    path('<str:name>/', views.details, name="details"),
    path('game/<str:name>/', views.games, name="games"),
    path('genre/<str:name>/', views.genres, name="genres"),
]
