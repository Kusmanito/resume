from django import forms
from .models import AttestList, DocWork, Students, Contracts, ControlList, TypePractic, Appendix

# Предопределенные варианты для выпадающих списков
SPECIALTY_CHOICES = [
    ('', '----- Выберите специальность -----'),
    ('09.02.07', '09.02.07 Информационные системы и программирование'),
    ('10.02.05', '10.02.05 Обеспечение информационной безопасности автоматизированных систем'),
]

COURSE_CHOICES = [
    ('', '----- Выберите курс -----'),
    ('1', '1 курс'),
    ('2', '2 курс'),
    ('3', '3 курс'),
    ('4', '4 курс'),
]

PRACTICE_TYPE_CHOICES = [
    ('', '----- Выберите вид практики -----'),
    ('Учебная', 'Учебная практика'),
    ('Производственная', 'Производственная практика'),
]

STUDY_FORM_CHOICES = [
    ('очная', 'Очная форма обучения'),
    ('заочная', 'Заочная форма обучения'),
]

class ProfileForm(forms.Form):
    # Личные данные студента
    familia = forms.CharField(label='Фамилия', max_length=200, required=True)
    name = forms.CharField(label='Имя', max_length=200, required=True)
    otchestvo = forms.CharField(label='Отчество', max_length=200, required=False)
    
    # Выпадающий список для специальности
    specialty = forms.ChoiceField(
        choices=SPECIALTY_CHOICES, 
        label='Специальность',
        required=True,
        widget=forms.Select(attrs={'class': 'form-select'})
    )
    
    # Выпадающий список для курса
    course = forms.ChoiceField(
        choices=COURSE_CHOICES,
        label='Курс',
        required=True,
        widget=forms.Select(attrs={'class': 'form-select'})
    )
    
    # Выпадающий список для вида практики
    practice_type = forms.ChoiceField(
        choices=PRACTICE_TYPE_CHOICES,
        label='Вид практики',
        required=True,
        widget=forms.Select(attrs={'class': 'form-select'})
    )
    
    # Выпадающий список для формы обучения
    study_form = forms.ChoiceField(
        choices=STUDY_FORM_CHOICES,
        label='Форма обучения',
        required=True,
        widget=forms.Select(attrs={'class': 'form-select'})
    )
    
    # Календари для выбора дат (используем DateInput с type="date")
    practice_start_date = forms.DateField(
        label='Дата начала практики',
        required=True,
        widget=forms.DateInput(attrs={'type': 'date', 'class': 'form-control'})
    )
    
    practice_end_date = forms.DateField(
        label='Дата окончания практики',
        required=True,
        widget=forms.DateInput(attrs={'type': 'date', 'class': 'form-control'})
    )
    
    birth_date = forms.DateField(
        label='Дата рождения',
        required=False,
        widget=forms.DateInput(attrs={'type': 'date', 'class': 'form-control'})
    )
    
    # Организация для практики
    organization = forms.CharField(
        label='Организация/Предприятие',
        max_length=500,
        required=True,
        widget=forms.TextInput(attrs={'class': 'form-control'})
    )
    
    organization_address = forms.CharField(
        label='Адрес организации',
        max_length=500,
        required=True,
        widget=forms.TextInput(attrs={'class': 'form-control'})
    )
    
    # Руководители
    company_supervisor = forms.CharField(
        label='Руководитель от организации (ФИО)',
        max_length=300,
        required=True,
        widget=forms.TextInput(attrs={'class': 'form-control'})
    )
    
    institute_supervisor = forms.CharField(
        label='Руководитель от колледжа (ФИО)',
        max_length=300,
        required=True,
        widget=forms.TextInput(attrs={'class': 'form-control'})
    )
    
    # Дополнительные поля
    group_number = forms.CharField(
        label='Номер группы',
        max_length=20,
        required=True,
        widget=forms.TextInput(attrs={'class': 'form-control'})
    )
    
    contract_number = forms.CharField(
        label='Номер договора',
        max_length=50,
        required=False,
        widget=forms.TextInput(attrs={'class': 'form-control'})
    )