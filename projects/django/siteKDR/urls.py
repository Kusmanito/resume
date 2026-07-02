# siteKDR/urls.py
from django.contrib import admin
from django.urls import path
from django.conf import settings
from django.conf.urls.static import static
from mainKDR import views

urlpatterns = [
    path('admin/', admin.site.urls),
    path('profile/', views.profile, name='profile'),
    path('', views.register, name='register'),
    path('login/', views.loginf, name='login'),
    path('logout/', views.logout_view, name='logout'),
    path('download-blank-templates/', views.download_blank_templates, name='download_blank_templates'),
]

if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
    urlpatterns += static(settings.STATIC_URL, document_root=settings.STATIC_ROOT)