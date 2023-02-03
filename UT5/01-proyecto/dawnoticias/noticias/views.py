from django.shortcuts import HttpResponse, render, get_object_or_404

from .models import *
# Create your views here.
def index(request):
    noticias = Noticia.objects.all()
    return render(request, "noticias/index.html", {
        'titulo': 'Listado',
        'noticias': noticias
    })

def detalle(request, id):
    noticia = get_object_or_404(Noticia, id = id)

    return render(request, 'noticias/detalle.html', {
        'titulo': noticia.titulo,
        'noticia': noticia
    })