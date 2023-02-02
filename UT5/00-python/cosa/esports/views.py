from django.shortcuts import render, HttpResponse, get_object_or_404

from .models import Team, Game, Genre
# Create your views here.

def index(request):
    teams = Team.objects.all()

    # team_games = ', '.join([game for game in teams.game_set.all()]) 

    return render(request, "esports/index.html", {
        'title': 'Inicio',
        'teams': teams,
        # 'team_games': team_games
    })

def details(request, name):
    team = get_object_or_404(Team, name=name)

    return render(request, 'esports/details.html', {
        'title': "Detalles del equipo",
        'team': team
    })

def games(request, name):
    game = get_object_or_404(Game, name=name)

    return render(request, 'esports/games.html', {
        'title': "Detalles del Juego",
        'game': game
    })

    # return HttpResponse("Games")

def genres(request, name):

    return HttpResponse("Genres")