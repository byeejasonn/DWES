from django.shortcuts import HttpResponse

def index (request):
    return HttpResponse("Inicio de nuestra web")