#!/bin/sh
set -e

# Siembra el volumen de uploads la primera vez (si está vacío) con las
# imágenes que vienen en el repo, y asegura permisos de escritura de Apache.
UP=/var/www/html/uploads
mkdir -p "$UP"
if [ -z "$(ls -A "$UP" 2>/dev/null)" ] && [ -d /opt/uploads-seed ]; then
  cp -a /opt/uploads-seed/. "$UP"/ 2>/dev/null || true
fi
chown -R www-data:www-data "$UP"

# Crea el admin desde variables de entorno si no existe (idempotente).
if [ -f /opt/bootstrap-admin.php ]; then
  php /opt/bootstrap-admin.php || true
fi

exec "$@"
