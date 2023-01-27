from django.shortcuts import render

# Create your views here.

from django.http import HttpResponse


def index(request):
    return HttpResponse("Hello, world. You're at the polls index.")

def holamundo(request):
    return HttpResponse(f"Holitas Jason uwu. {request.META['HTTP_USER_AGENT']}")
