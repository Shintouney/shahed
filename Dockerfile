# Use Ubuntu 18.04 LTS as the base image
FROM ubuntu:18.04

# Install system dependencies including git, curl, compilers, and libraries needed for PHP
RUN apt-get update -y && apt-get install -y \
    git \
    curl \
    build-essential \
    libxml2-dev \
    libbz2-dev \
    bzip2 \
    autoconf \
    pkg-config \
    libssl-dev \
    libcurl4-openssl-dev \
    bison \
    re2c \
    libreadline-dev \
    libonig-dev \
    libtidy-dev \
libxslt1-dev \
    libjpeg-dev \
    libpng-dev \
    libonig-dev \
    && rm -rf /var/lib/apt/lists/*

# Clone phpenv and php-build, and set up the environment for phpenv
RUN git clone https://github.com/phpenv/phpenv.git ~/.phpenv \
    && git clone https://github.com/php-build/php-build.git $(~/.phpenv/bin/phpenv root)/plugins/php-build

# Set environment variables for phpenv
ENV PHPENV_ROOT /root/.phpenv
ENV PATH $PHPENV_ROOT/bin:$PHPENV_ROOT/shims:$PATH

# Initialize phpenv and install PHP 7.2.24
RUN eval "$(phpenv init -)" && phpenv install 7.2.24 && phpenv global 7.2.24

WORKDIR /home/soulphysician/app/
# Confirm PHP version
CMD [ "php", "-v" ]

