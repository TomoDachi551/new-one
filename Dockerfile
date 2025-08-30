# Use official PHP image
FROM php:8.2-cli

# Install needed PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory
WORKDIR /app

# Copy project files
COPY . /app

# Expose Render’s required port
EXPOSE 10000

# Start built-in PHP server, serving from repo root (where index.php is)
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
