FROM ubuntu:18.04

ENV DEBIAN_FRONTEND=noninteractive

# update package list
RUN apt-get update

# install php
RUN apt-get -y install php7.2 php7.2-dev php-pear php7.2-curl php7.2-xml php7.2-cli php7.2-common php7.2-json php7.2-pgsql php7.2-mysql php7.2-mbstring php7.2-zip php7.2-soap libapache2-mod-php7.2 -y php7.2-gd

ADD php/php.ini /etc/php/7.2/apache2/php.ini
ADD php/php_cli.ini /etc/php/7.2/cli/php.ini

# Enable Apache2 Modules
RUN a2enmod rewrite
RUN a2enmod headers
RUN service apache2 restart

# Install git
RUN apt-get install git -y

# Install make
RUN apt-get install build-essential -y

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create User
ARG APP_USER=mvc
ARG PUID=1000
ARG PGID=1000

ENV PUID ${PUID}
ENV PGID ${PGID}
ENV APP_USER ${APP_USER}

RUN groupadd --gid ${PGID} ${APP_USER} && \
  useradd --uid ${PUID} --gid ${APP_USER} --shell /bin/bash --create-home ${APP_USER} && \
  echo "${APP_USER} ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers

# Set permission for APP_USER
RUN chown -R ${APP_USER}:${APP_USER} /var/www/html

ENV HOME /home/${APP_USER}

RUN service apache2 restart

WORKDIR /var/www/html/
