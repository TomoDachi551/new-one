# Dockerfile for CI3 (repo root contains index.php)
FROM php:8.2-apache

# Install mysqli/pdo
RUN apt-get update && apt-get install -y --no-install-recommends \
        libzip-dev zip unzip \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Enable rewrite + allow .htaccess
RUN a2enmod rewrite \
 && sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Change Apache to listen on port 10000 (Render expects container to expose that port)
RUN sed -i 's/Listen 80/Listen 10000/g' /etc/apache2/ports.conf \
 && sed -i 's/<VirtualHost *:80>/<VirtualHost *:10000>/g' /etc/apache2/sites-available/000-default.conf

# Copy app files into Apache web root
COPY . /var/www/html/

WORKDIR /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 10000

CMD ["apache2-foreground"]
