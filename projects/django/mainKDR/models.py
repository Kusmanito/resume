# mainVDP/models.py
from django.db import models
from django.contrib.auth.models import User

class Document(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.TextField()
    class Meta:
        managed = False
        db_table = 'document'

class DocWork(models.Model):
    id = models.AutoField(primary_key=True)
    user = models.OneToOneField(User, on_delete=models.CASCADE, null=True, blank=True)
    modul = models.TextField(blank=True, null=True)
    start = models.TextField(blank=True, null=True)
    stmo = models.TextField(blank=True, null=True)
    year = models.IntegerField(blank=True, null=True)
    final = models.TextField(blank=True, null=True)
    fnmo = models.TextField(blank=True, null=True)
    kod = models.TextField(blank=True, null=True)
    name_spec = models.TextField(blank=True, null=True)
    akd = models.IntegerField(blank=True, null=True)
    fio = models.TextField(blank=True, null=True)
    date_birth = models.TextField(blank=True, null=True)
    fio2 = models.TextField(blank=True, null=True)
    date_birth2 = models.TextField(blank=True, null=True)
    fioRuk = models.TextField(blank=True, null=True)
    num = models.TextField(blank=True, null=True)
    fioProfRuk = models.TextField(blank=True, null=True)
    doljnost = models.TextField(blank=True, null=True)
    numProfRuk = models.TextField(blank=True, null=True)
    org = models.TextField(blank=True, null=True)
    ruk = models.TextField(blank=True, null=True)
    fioOtv = models.TextField(blank=True, null=True)
    doljOtv = models.TextField(blank=True, null=True)
    numberOtv = models.TextField(blank=True, null=True)
    
    class Meta:
        managed = False
        db_table = 'doc_work'

class AttestList(models.Model):
    id = models.AutoField(primary_key=True)
    user = models.OneToOneField(User, on_delete=models.CASCADE, null=True, blank=True)
    fio = models.TextField(blank=True, null=True)
    spec = models.TextField(blank=True, null=True)
    grupa = models.TextField(blank=True, null=True)
    kurs = models.TextField(blank=True, null=True)
    obuch = models.TextField(blank=True, null=True)
    data_start = models.TextField(blank=True, null=True)
    data2_start = models.TextField(blank=True, null=True)
    god_start = models.IntegerField(blank=True, null=True)
    data_end = models.TextField(blank=True, null=True)
    data4_end = models.TextField(blank=True, null=True)
    god_end = models.IntegerField(blank=True, null=True)
    vid = models.TextField(blank=True, null=True)
    kod = models.TextField(blank=True, null=True)
    mesto = models.TextField(blank=True, null=True)
    adress = models.TextField(blank=True, null=True)
    ruka = models.TextField(blank=True, null=True)
    work1 = models.TextField(blank=True, null=True)
    work2 = models.TextField(blank=True, null=True)
    work3 = models.TextField(blank=True, null=True)
    work4 = models.TextField(blank=True, null=True)
    work5 = models.TextField(blank=True, null=True)
    work6 = models.TextField(blank=True, null=True)
    work7 = models.TextField(blank=True, null=True)
    work8 = models.TextField(blank=True, null=True)
    work9 = models.TextField(blank=True, null=True)
    work10 = models.TextField(blank=True, null=True)
    work11 = models.TextField(blank=True, null=True)
    pk1 = models.TextField(blank=True, null=True)
    pk2 = models.TextField(blank=True, null=True)
    pk3 = models.TextField(blank=True, null=True)
    pk4 = models.TextField(blank=True, null=True)
    pk5 = models.TextField(blank=True, null=True)
    pk6 = models.TextField(blank=True, null=True)
    result_pract = models.TextField(blank=True, null=True)
    data_result = models.TextField(blank=True, null=True)
    data2_result = models.TextField(blank=True, null=True)
    god_result = models.IntegerField(blank=True, null=True)
    ok1 = models.TextField(blank=True, null=True)
    ok2 = models.TextField(blank=True, null=True)
    ok3 = models.TextField(blank=True, null=True)
    ok4 = models.TextField(blank=True, null=True)
    ok5 = models.TextField(blank=True, null=True)
    ok6 = models.TextField(blank=True, null=True)
    ok7 = models.TextField(blank=True, null=True)
    ok8 = models.TextField(blank=True, null=True)
    ok9 = models.TextField(blank=True, null=True)
    ok10 = models.TextField(blank=True, null=True)
    ok11 = models.TextField(blank=True, null=True)
    otnoshenie = models.TextField(blank=True, null=True)
    poryadok = models.TextField(blank=True, null=True)
    teh_bezop = models.TextField(blank=True, null=True)
    iniciativa = models.TextField(blank=True, null=True)
    vzaimootnoshenie = models.TextField(blank=True, null=True)
    sformirovannost = models.TextField(blank=True, null=True)
    dopolnitelno = models.TextField(blank=True, null=True)
    
    class Meta:
        managed = False
        db_table = 'attest_list'

class Students(models.Model):
    id = models.AutoField(primary_key=True)
    user = models.OneToOneField(User, on_delete=models.CASCADE, null=True, blank=True)
    familia = models.TextField(blank=True, null=True)
    name = models.TextField(blank=True, null=True)
    otchestvo = models.TextField(blank=True, null=True)
    
    class Meta:
        managed = False
        db_table = 'students'

class Contracts(models.Model):
    id = models.AutoField(primary_key=True)
    user = models.OneToOneField(User, on_delete=models.CASCADE, null=True, blank=True)
    num_dogovor = models.TextField(blank=True, null=True)
    profORG = models.TextField(blank=True, null=True)
    ryco = models.TextField(blank=True, null=True)
    adress = models.TextField(blank=True, null=True)
    smart = models.TextField(blank=True, null=True)
    rec = models.TextField(blank=True, null=True)
    
    class Meta:
        managed = False
        db_table = 'contracts'

class ControlList(models.Model):
    id = models.AutoField(primary_key=True)
    user = models.OneToOneField(User, on_delete=models.CASCADE, null=True, blank=True)
    gru = models.TextField(blank=True, null=True)
    code = models.TextField(blank=True, null=True)
    napra = models.TextField(blank=True, null=True)
    data = models.TextField(blank=True, null=True)
    rycSPO = models.TextField(blank=True, null=True)
    date_check = models.TextField(blank=True, null=True)
    pred = models.TextField(blank=True, null=True)
    rycP = models.TextField(blank=True, null=True)
    fio = models.TextField(blank=True, null=True)
    fioO = models.TextField(blank=True, null=True)
    pri = models.TextField(blank=True, null=True)
    
    class Meta:
        managed = False
        db_table = 'control_list'

class Appendix(models.Model):
    id = models.AutoField(primary_key=True)
    user = models.OneToOneField(User, on_delete=models.CASCADE, null=True, blank=True)
    addres = models.TextField(blank=True, null=True)
    namePomech = models.TextField(blank=True, null=True)
    
    class Meta:
        managed = False
        db_table = 'appendix'

class TypePractic(models.Model):
    id = models.AutoField(primary_key=True)
    user = models.OneToOneField(User, on_delete=models.CASCADE, null=True, blank=True)
    field1 = models.TextField(blank=True, null=True)
    
    class Meta:
        managed = False
        db_table = 'type_practic'

# mainKDR/models.py - добавьте в конец файла

class DocumentTemplate(models.Model):
    """Модель для хранения шаблонов документов"""
    
    name = models.CharField(max_length=200, verbose_name='Название шаблона')
    description = models.TextField(blank=True, null=True, verbose_name='Описание')
    template_file = models.FileField(upload_to='document_templates/', verbose_name='Файл шаблона')
    uploaded_at = models.DateTimeField(auto_now_add=True, verbose_name='Дата загрузки')
    is_active = models.BooleanField(default=True, verbose_name='Активен')
    
    class Meta:
        db_table = 'document_templates'
        verbose_name = 'Шаблон документа'
        verbose_name_plural = 'Шаблоны документов'
        ordering = ['-uploaded_at']
    
    def __str__(self):
        return self.name
    
    def filename(self):
        import os
        return os.path.basename(self.template_file.name)