# Dockerfile.app
# Usa uma imagem PHP-FPM como base
FROM php:8.2-fpm-alpine

# Instala as dependências do sistema e extensões PHP essenciais
RUN apk add --no-cache \
    git \
    curl \
    mysql-client \
    # Instala extensões PHP necessárias para Laravel e Composer
    && docker-php-ext-install pdo_mysql opcache

# Instala o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Define o diretório de trabalho padrão
WORKDIR /var/www/html