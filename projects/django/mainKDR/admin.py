# mainKDR/admin.py
from django.contrib import admin
from .models import DocWork, AttestList, Students, Contracts, ControlList, TypePractic, Appendix, Document, DocumentTemplate

@admin.register(Students)
class StudentsAdmin(admin.ModelAdmin):
    list_display = ('id', 'user', 'familia', 'name', 'otchestvo')
    search_fields = ('familia', 'name', 'user__username')
    list_filter = ('user',)

@admin.register(DocWork)
class DocWorkAdmin(admin.ModelAdmin):
    list_display = ('id', 'user', 'modul', 'start', 'year')
    search_fields = ('modul', 'user__username')
    list_filter = ('year',)

@admin.register(AttestList)
class AttestListAdmin(admin.ModelAdmin):
    list_display = ('id', 'user', 'fio', 'spec', 'grupa')
    search_fields = ('fio', 'spec', 'user__username')

@admin.register(Contracts)
class ContractsAdmin(admin.ModelAdmin):
    list_display = ('id', 'user', 'num_dogovor', 'profORG')
    search_fields = ('num_dogovor', 'profORG')

@admin.register(ControlList)
class ControlListAdmin(admin.ModelAdmin):
    list_display = ('id', 'user', 'gru', 'pred')
    search_fields = ('gru', 'pred')

@admin.register(TypePractic)
class TypePracticAdmin(admin.ModelAdmin):
    list_display = ('id', 'user', 'field1')
    list_filter = ('field1',)

@admin.register(Appendix)
class AppendixAdmin(admin.ModelAdmin):
    list_display = ('id', 'user', 'addres', 'namePomech')
    search_fields = ('addres',)

@admin.register(Document)
class DocumentAdmin(admin.ModelAdmin):
    list_display = ('id', 'name')


# Простая админка для шаблонов
@admin.register(DocumentTemplate)
class DocumentTemplateAdmin(admin.ModelAdmin):
    list_display = ('name', 'description', 'uploaded_at', 'is_active')
    list_filter = ('is_active', 'uploaded_at')
    search_fields = ('name', 'description')
    list_editable = ('is_active',)
    
    fieldsets = (
        ('Основная информация', {
            'fields': ('name', 'description', 'is_active')
        }),
        ('Файл шаблона', {
            'fields': ('template_file',),
            'description': 'Загрузите файл шаблона документа (.docx). Используйте переменные вида {{fio}}, {{spec}}, {{data}} и т.д.'
        }),
    )