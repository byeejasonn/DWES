from django.shortcuts import render, HttpResponse, get_object_or_404

from .models import Tweet, Reply

# Create your views here.

def timeline(request):
    tweets = Tweet.objects.order_by('-pub_date')[:10]

    return render(request, 'twitter/index.html', {'tweets': tweets});