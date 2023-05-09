FROM php:fpm

WORKDIR /var/www/html

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions @composer

RUN docker-php-ext-install mysqli pdo pdo_mysql \
     && docker-php-ext-enable pdo_mysql \
     && docker-php-ext-enable pdo 
     
RUN composer require phpmailer/phpmailer

