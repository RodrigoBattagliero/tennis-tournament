FROM php:8.3.20-fpm-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN addgroup -g ${GID} --system symfony
RUN adduser -G symfony --system -D -s /bin/sh -u ${UID} symfony

RUN sed -i "s/user = www-data/user = symfony/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = symfony/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

RUN docker-php-ext-install pdo pdo_mysql

RUN composer install
RUN php bin/console doctrine:database:create
RUN php bin/console doctrine:migrations:migrate
    
USER symfony

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
