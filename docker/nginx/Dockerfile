FROM nginx:alpine

COPY ./docker/nginx/conf/nginx.conf /etc/nginx/nginx.conf
COPY ./public /var/www/mf/public/

RUN adduser -D -g '' -G www-data www-data

#USER www-data