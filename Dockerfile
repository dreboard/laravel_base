FROM php:7.1.10-apache

MAINTAINER DreBoard <dre.board@gmail.com>

COPY . /var/www/
COPY /dev_ops/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
EXPOSE 80