FROM php:8.1-rc-apache

# RUN apt install pdo_mysql
# RUN cp scripts/php/ "$PHP_INI_DIR/php.ini" 

# RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# RUN echo "extension=pdo_mysql" >> "$PHP_INI_DIR/conf.d/docker-php-ext-sodium.ini"
# RUN echo "extension=curl" >> "$PHP_INI_DIR/conf.d/docker-php-ext-sodium.ini"

# instalacion modulos php

COPY --from:composer:2.5.1 /usr/bin/composer /usr/bin/composer

# RUN docker-php-ext-install mysqli pdo pdo_mysql mbstring 
# RUN docker-php-ext-enable pdo pdo_mysql

WORKDIR /var/www

RUN apt-get update \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql

EXPOSE 80