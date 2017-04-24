FROM php:7.1-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install zlib1g-dev git -y

RUN docker-php-ext-install pdo pdo_mysql zip

RUN curl -O https://nodejs.org/dist/v7.7.4/node-v7.7.4-linux-x64.tar.xz
RUN tar -C /usr/local --strip-components 1 -xJf node-v7.7.4-linux-x64.tar.xz

RUN npm install -g gulp

ENV user olp
ARG PUID=1000
ARG PGID=1000
RUN groupadd -g $PGID $user && \
    useradd -u $PUID -g $user -m $user

USER $user

WORKDIR /var/www
