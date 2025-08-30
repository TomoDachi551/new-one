# Use PHP with Apache
FROM php:8.2-apache

# Install PHP extensions required for CI3
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache rewrite module (needed for CI3's clean URLs)
RUN a2enmod rewrite

# Set Apache document root (CI3 index.php is in root folder)
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Update Apache config to use the new document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy your CodeIgniter app into container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Expose port 80 (Render maps $PORT to this automatically)
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
