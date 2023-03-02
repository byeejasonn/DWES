from django.contrib import admin

# Register your models here.

from .models import Question, Choice

class ChoiceInline(admin.TabularInline):
    model=Choice

class QuestionAdmin(admin.ModelAdmin):
    # # orden de los fields
    # fields = ['question_text', 'pub_date']
    fieldsets = [
        ('Principal', {'fields': ['question_text']}),
        ('Fecha información', {'fields': ['pub_date']})
    ]

    inlines = [ChoiceInline]

    list_display = ('question_text', 'pub_date')
    list_filter = ['pub_date']

admin.site.register(Question, QuestionAdmin)
admin.site.register(Choice)