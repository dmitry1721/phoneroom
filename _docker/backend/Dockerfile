FROM php:8.1-fpm

ARG user
ARG uid

RUN apt-get update && apt-get install -y \
    build-essential \
    libpq-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libonig-dev \
    zip \
    libzip-dev \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl && \
    docker-php-ext-install pdo_pgsql mbstring zip exif pcntl bcmath sockets zip && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    # Clear cache
    apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user


RUN apt-get install -y nodejs

WORKDIR /var/www/back

#COPY back/package*.json ./

RUN chown -R $user ./
RUN chmod -R 777 ./
RUN npm cache clean --force

RUN npm install -g npm@latest
RUN npm update
USER $user
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=192.168.240.2"]
CMD ["php-fpm"]