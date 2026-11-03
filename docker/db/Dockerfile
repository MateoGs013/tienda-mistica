# Imagen de la base: MariaDB con el esquema y los datos horneados.
# El SQL corre en el PRIMER arranque (datadir vacío), sin bind mounts del repo:
# en Coolify el origen relativo del bind podía resolverse como carpeta vacía y
# romper el import ("Can't read from a directory"), dejando la db sin iniciar.
FROM mariadb:11

# 01: esquema + datos (dump de phpMyAdmin).
# 20: limpieza de cuentas y datos personales de desarrollo, tras el dump.
# Los scripts de /docker-entrypoint-initdb.d/ corren en orden alfabetico.
COPY sql/tienda_mistica.sql /docker-entrypoint-initdb.d/01-tienda.sql
COPY docker/initdb/20-prod-clean.sql /docker-entrypoint-initdb.d/20-prod-clean.sql
