from django.shortcuts import render, HttpResponse

# Create your views here.

def index(request):
    return HttpResponse("Aquí están las encuestas");

def holamundo(request):
    return HttpResponse("Hola mundo");

def navegador(request):
    return HttpResponse(f"Este es tu navegador: {request.META['HTTP_USER_AGENT']}");