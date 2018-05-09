FROM php:7.1-apache
LABEL maintainer="docker-web"

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini

RUN apt-get update \
    && apt-get -y install unzip git vim wget lsb-release libicu-dev mysql-client libfreetype6-dev libjpeg62-turbo-dev libpng12-dev \
    && docker-php-ext-install pdo_mysql mysqli intl gd
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
RUN ln -s /etc/apache2/mods-available/vhost_alias.load /etc/apache2/mods-enabled
RUN echo ServerName $HOSTNAME > /etc/apache2/conf-available/fqdn.conf && a2enconf fqdn

COPY ./php.ini /usr/local/etc/php/

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

# add docker sudo user
RUN groupadd -g 1000 docker && \
    useradd  -g      docker -G sudo -m -s /bin/bash docker && \
    echo 'docker:docker' | chpasswd

RUN echo 'Defaults visiblepw'            >> /etc/sudoers
RUN echo 'docker ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers

# change packagist.jp
RUN composer config -g repos.packagist composer https://packagist.jp

# install prestissimo plugin
RUN composer global require hirak/prestissimo

# 以降は、rootではなくdockerユーザで実行される
# ENV HOME /home/docker
# WORKDIR /home/docker
# USER docker
