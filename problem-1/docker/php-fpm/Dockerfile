FROM php:7.1-fpm

RUN apt-get update -yqq && \
    apt-get install -y --no-install-recommends \
    git zlib1g-dev && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    docker-php-ext-install opcache && \
    docker-php-ext-install zip && \
    rm -rf /var/lib/apt/lists/*

# Copy xdebug configuration for remote debugging
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Copy opcache configration
COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Install composer and add its bin to the PATH.
RUN curl -s http://getcomposer.org/installer | php && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer

# Source the bash
RUN . ~/.bashrc

RUN usermod -u 1000 www-data

WORKDIR /var/www/coding-test

CMD ["php-fpm"]

EXPOSE 9000