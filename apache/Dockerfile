FROM php:7.1-apache
LABEL maintainer="docker-web"

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini

RUN apt-get update \
    && apt-get -y install vim wget lsb-release libicu-dev mysql-client libfreetype6-dev libjpeg62-turbo-dev libpng12-dev \
    && docker-php-ext-install pdo_mysql mysqli intl gd
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
RUN ln -s /etc/apache2/mods-available/vhost_alias.load /etc/apache2/mods-enabled
RUN echo ServerName $HOSTNAME > /etc/apache2/conf-available/fqdn.conf && a2enconf fqdn

COPY ./php.ini /usr/local/etc/php/