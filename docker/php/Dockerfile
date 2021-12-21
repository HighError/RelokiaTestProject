FROM php:7.4-fpm

#RUN curl -sS https://getcomposer.org/installer | php -- \
#--install-dir=/usr/bin --filename=composer && chmod +x /usr/bin/composer

RUN pecl install xdebug && docker-php-ext-enable xdebug

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /var/www

CMD ["php-fpm"]