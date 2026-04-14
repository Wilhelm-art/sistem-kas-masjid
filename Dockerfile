# Gunakan image resmi PHP dengan Apache
FROM php:8.2-apache

# Set direktori kerja di container
WORKDIR /var/www/html

# Install dependensi sistem dan ekstensi PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm

# Bersihkan cache apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install ekstensi PHP yang dibutuhkan Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip

# Aktifkan mod_rewrite Apache untuk routing Laravel
RUN a2enmod rewrite

# Konfigurasi Apache DocumentRoot ke folder /public Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Render secara default mengatur port aplikasi melalui environment variable PORT (biasanya 10000).
# Pastikan Apache mendengarkan port yang dinamis ini:
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Salin semua file project ke dalam working directory
COPY . /var/www/html

# Karena ini mode produksi di Docker tanpa .env host, 
# buat fallback .env sementaramu untuk proses build asset bila diperlukan
RUN cp .env.example .env

# Install dependensi PHP (tanpa paket dev)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Install dependensi frontend dan kompilasi asset menggunakan Vite
RUN npm install
RUN npm run build

# Atur permission yang benar untuk folder storage dan cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Jalankan Apache di foreground
CMD ["apache2-foreground"]
