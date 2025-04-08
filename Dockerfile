FROM php:8.2-fpm

# Instalar dependências
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar o diretório de trabalho
WORKDIR /var/www

# Copiar arquivos do Laravel
COPY . .

# Permissões
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

#OPcache
RUN docker-php-ext-install opcache
COPY ./docker/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

CMD ["php-fpm"]
