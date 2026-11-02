# Tienda Mística — PHP puro servido por Apache (mod_php).
FROM php:8.3-apache

# Driver PDO MySQL para conectar a MariaDB.
RUN docker-php-ext-install pdo_mysql

# Ajustes de PHP para producción (sin fugas de errores al visitante).
RUN { \
      echo 'display_errors = Off'; \
      echo 'log_errors = On'; \
      echo 'expose_php = Off'; \
      echo 'upload_max_filesize = 8M'; \
      echo 'post_max_size = 10M'; \
      echo 'session.use_strict_mode = 1'; \
      echo 'session.cookie_httponly = 1'; \
      echo 'session.cookie_samesite = Lax'; \
      echo 'auto_prepend_file = /var/www/html/security-bootstrap.php'; \
    } > /usr/local/etc/php/conf.d/zz-tienda.ini

# Silenciar el aviso de ServerName de Apache.
RUN echo 'ServerName localhost' > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername

WORKDIR /var/www/html

# Código de la aplicación (sql/, Dockerfile, etc. quedan fuera por .dockerignore).
COPY --chown=www-data:www-data . /var/www/html

# Copia pristina de uploads FUERA del árbol servido, para sembrar el volumen vacío.
RUN mkdir -p /opt/uploads-seed \
    && if [ -d /var/www/html/uploads ]; then \
         cp -a /var/www/html/uploads/. /opt/uploads-seed/ 2>/dev/null || true; \
       fi

# Bootstrap del admin (fuera del árbol servido por Apache).
COPY bootstrap-admin.php /opt/bootstrap-admin.php
RUN sed -i 's/\r$//' /opt/bootstrap-admin.php \
    && rm -f /var/www/html/bootstrap-admin.php

# Endurecimiento de Apache (sin listados, bloqueo de includes/classes y uploads).
COPY apache-hardening.conf /etc/apache2/conf-available/hardening.conf
RUN a2enconf hardening \
    && rm -f /var/www/html/apache-hardening.conf

# Entrypoint (normaliza fin de línea por si se guardó con CRLF en Windows).
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN sed -i 's/\r$//' /usr/local/bin/docker-entrypoint.sh \
    && chmod +x /usr/local/bin/docker-entrypoint.sh \
    && rm -f /var/www/html/docker-entrypoint.sh

EXPOSE 80
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]
