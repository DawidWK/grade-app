# Wybierz obraz bazowy PHP z wersją, która pasuje do Twojej aplikacji
FROM php:8.2-fpm

# Zainstaluj niezbędne zależności
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev

# Wyczyść cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Zainstaluj rozszerzenia PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd pdo_sqlite

# Ustaw ścieżkę
ENV PATH="/composer/vendor/bin:$PATH"

# Pobierz i zainstaluj Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Ustaw folder roboczy dla aplikacji Laravel
WORKDIR /var/www

# Skopiuj wszystkie pliki z bieżącego katalogu do kontenera
COPY . /var/www

# Zainstaluj zależności
RUN composer install

# Zainstaluj Node.js i npm
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - && apt-get install -y nodejs

# zmien nazwe pliku .env.example na .env
RUN mv .env.local .env

# Zbuduj front-end
RUN npm install && npm run build

# Uruchom migracje
RUN php artisan migrate --force

# Udostępnij port 8000
EXPOSE 8000

# Uruchom serwer PHP
CMD php artisan serve --host=0.0.0.0 --port=8000
