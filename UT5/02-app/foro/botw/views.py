from django.shortcuts import render, HttpResponse, get_object_or_404

# Create your views here.
def index(request):
    return HttpResponse('Buenas este es el index')