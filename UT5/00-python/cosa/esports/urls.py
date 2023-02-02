
from django.contrib import admin
from django.conf.urls.static import static
from django.conf import settings
from django.urls import path

from . import views 

app_name='esports'
urlpatterns = [
    path('', views.index),
    path('<str:name>/', views.details, name="details"),
    path('game/<str:name>/', views.games, name="games"),
    path('genre/<str:name>/', views.genres, name="genres"),
] + static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)

# urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)