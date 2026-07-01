FROM php:8.3-apache

RUN apt-get update && apt-get install -y git unzip zip libzip-dev libsqlite3-dev nodejs npm \
 && docker-php-ext-install pdo pdo_sqlite zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN npm install
RUN npm run build
RUN ls -la public/build

RUN a2enmod rewrite
RUN chown -R www-data:www-data storage bootstrap/cache database
RUN chmod -R 775 storage bootstrap/cache database

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

CMD php artisan storage:link || true && php artisan view:clear && php artisan config:clear && php artisan route:clear && php artisan cache:clear && apache2-foreground