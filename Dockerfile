FROM alpine:latest

RUN echo 'http://mirrors.aliyun.com/alpine/latest-stable/main/' > /etc/apk/repositories; \
    echo 'http://mirrors.aliyun.com/alpine/latest-stable/community/' >> /etc/apk/repositories; \
    apk update;

RUN apk add nginx; \
    mkdir -p /run/nginx; \
    mkdir -p /usr/share/nginx/html;

RUN apk add php7 php7-ctype php7-curl php7-dom php7-exif php7-fileinfo php7-gd \
            php7-gettext php7-iconv php7-imagick php7-json php7-mbstring \
            php7-mcrypt php7-memcached php7-mysqli php7-mysqlnd php7-opcache \
            php7-openssl php7-pcntl php7-pdo php7-pdo_mysql php7-pdo_pgsql \
            php7-pdo_sqlite php7-posix php7-redis php7-session \php7-simplexml \
            php7-sockets php7-sqlite3 php7-xml php7-xmlwriter php7-zlib;

RUN apk add php7-fpm

RUN apk add mysql mysql-client;

COPY script/start.sh /data/script/start.sh
COPY script/import.sh /data/script/import.sh
COPY config/my.cnf /etc/mysql/my.cnf
COPY config/default.conf /etc/nginx/conf.d/
COPY sqldata/vuldump.sql /data/sqldata/vuldump.sql
COPY index.php /usr/share/nginx/html/index.php

RUN /bin/sh /data/script/import.sh
VOLUME ['/usr/share/nginx/html/']
CMD ["/bin/sh", "/data/script/start.sh"]
