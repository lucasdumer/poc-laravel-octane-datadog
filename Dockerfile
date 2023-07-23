FROM ubuntu:22.04

EXPOSE 8000

RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y git
RUN apt-get install -y zip unzip

ENV DEBIAN_FRONTEND noninteractive
ENV DEBCONF_NONINTERACTIVE_SEEN true

RUN apt install -y --no-install-recommends php8.1
RUN apt-get install -y php8.1 php8.1-common php8.1-mysql php8.1-zip php8.1-gd php8.1-mbstring php8.1-curl php8.1-xml php8.1-bcmath

RUN apt-get install -y curl php-pear php8.1-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install swoole

RUN apt install -y software-properties-common && add-apt-repository ppa:openswoole/ppa -y
RUN apt update
RUN apt install -y php8.1-openswoole
RUN php --ri openswoole

WORKDIR /var/www/html

COPY . .

RUN composer install --verbose
RUN php artisan key:generate
RUN php artisan octane:install --server=swoole


CMD ["php", "artisan", "octane:start", "--host=0.0.0.0", "--port=8000", "--workers=10", \
"-vvv", "--server=swoole", "--task-workers=6", "--max-requests=250"]