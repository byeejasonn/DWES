from django.shortcuts import render, HttpResponse, HttpResponseRedirect, get_object_or_404
# from django.http import Http404
# from django.template import loader
from django.urls import reverse

from django.views import generic

# importamos los modelos para desplegarlos en la pantalla de inicio como listado de las preguntas
from .models import Question, Choice

# Create your views here.
# def index(request):
#     # return HttpResponse("Aquí están las encuestas");

#     # seleccionamos las 5 ultimas preguntas ordenadas por fecha de publicaciones desc
#     latest_question = Question.objects.order_by("-pub_date")[:5]

#     # hacemos una cadena separada por comas para mostrarlo en el index como resumen de las preguntas de la base de datos
#     # salida = ', '.join([question.question_text for question in latest_question]);
#     # return HttpResponse(salida);

#     # cargamos el tema que hemos creado en la ruta templates/polls 
#         # ** importando render podemos no recuperar el tema y escogerlo en el return **
#     # tema = loader.get_template("polls/index.html")
#     # diccionario de variables que tiene que pasar al tema
#     context = {
#         'latest_question': latest_question,
#     }

#     # return HttpResponse(tema.render(context, request));
#     return render(request, "polls/index.html", context)

class IndexView(generic.ListView):
    template_name = 'polls/index.html'
    context_object_name = 'latest_question'

    paginate_by = 5

    def get_queryset(self):
        """Return the last five published questions."""
        return Question.objects.order_by('-pub_date')[:5]


def holamundo(request):
    return HttpResponse("Hola mundo");

def navegador(request):
    return HttpResponse(f"Este es tu navegador: {request.META['HTTP_USER_AGENT']}")

# def detail(request, question_id):
#     # return HttpResponse(f"Estas consultado la pregunta {question_id}");

#     # capturamos la expecion de que el id de la pregunta no exista para levantar un error 404, si no se renderiza todo correctamente
#         # ** eso o podemos usar el atajo de obtener el objeto o levantar el error **
#     # try:
#     #     pregunta = Question.objects.get(id=question_id)
#     # except Question.DoesNotExist:
#     #     raise Http404("La pregunta no existe")

#     question = get_object_or_404(Question, pk = question_id)

#     return render(request, "polls/detail.html", {'question': question})

class DetailView(generic.DetailView):
    model = Question
    context_object_name = 'question'
    template_name = 'polls/detail.html'

# def results(request, question_id):
#     # return HttpResponse(f"Estas consultado los resultados de la pregunta {question_id}")
#     question = get_object_or_404(Question, pk = question_id)
#     return render(request, 'polls/results.html', {'question': question})

class ResultsView(generic.DetailView):
    model = Question
    context_object_name = 'question'
    template_name = 'polls/results.html'

def vote(request, question_id):
    # return HttpResponse(f"Estas votando por la pregunta {question_id}")

    question = get_object_or_404(Question, pk = question_id)
    try:
        selected_choice = question.choice_set.get(pk = request.POST['choice'])
    except (KeyError, Choice.DoesNotExist):
        return render(request, 'polls/detail.html', {
            'question': question,
            'error_message': "No ha seleccionado ninguna opción.",
        })
    else:
        selected_choice.votes += 1
        selected_choice.save()

        return HttpResponseRedirect(reverse('polls:results', args=(question.id,)))

from rest_framework import viewsets
from .serializer import QuestionSerializer

class QuestionViewSet(viewsets.ModelViewSet):
    queryset = Question.objects.all().order_by('-pub_date')
    serializer_class = QuestionSerializer