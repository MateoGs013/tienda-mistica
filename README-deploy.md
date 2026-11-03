# Despliegue — Tienda Mística

App PHP pura (sin framework ni build) servida por Apache + `mod_php`, con MariaDB.
Todo autocontenido en `docker-compose.yml`.

## Configuración por entorno

El código lee estas variables (con defaults pensados para XAMPP, así la copia local sigue andando sin tocar nada):

| Variable | Default (XAMPP) | En el VPS |
|---|---|---|
| `DB_HOST` | `localhost` | `db` (servicio compose) o el host de la DB gestionada |
| `DB_PORT` | `3306` | `3306` |
| `DB_NAME` | `tienda_mistica` | `tienda_mistica` |
| `DB_USER` | `root` | un usuario propio (p. ej. `tienda`) |
| `DB_PASS` | *(vacío)* | **contraseña fuerte** |
| `APP_BASE_PATH` | `/tienda_mistica/` | `/` (dominio propio, raíz) |

## Probar en local (Docker)

```bash
cp .env.example .env   # opcional; sin .env usa los defaults del compose
docker compose up -d --build
```

Abrir http://localhost:8080. Para apagar y borrar todo:

```bash
docker compose down -v
```

La base se importa sola en el **primer** arranque (volumen vacío): el esquema y los datos van horneados en la imagen de la DB (`docker/db/Dockerfile`), no por bind mount. Las imágenes de `uploads/` siembran un volumen persistente, así que lo que cargues desde el admin sobrevive a cada redeploy.

## Coolify

1. Nuevo recurso → **Docker Compose**, apuntando a este repo (rama `main`).
2. Variables de entorno: `DB_NAME`, `DB_USER`, `DB_PASS`, `DB_ROOT_PASS`, `APP_BASE_PATH=/`.
3. Dominio (p. ej. `tienda.mateogs.tech`) hacia el servicio **`app`**, puerto `80`. Traefik termina el SSL.
4. Marcar como persistentes los volúmenes `mariadb_data` y `uploads`. No hacen falta bind mounts del repo ni "Preserve repository": el SQL va horneado en la imagen de la DB.
5. Deploy. El esquema + datos se importan solos la **primera** vez, con `mariadb_data` vacío. Si un intento anterior dejó ese volumen a medio inicializar, borralo (o recreá la base) antes de redeployar para que el import vuelva a correr.

> Si preferís la base gestionada de Coolify en vez del servicio `db`, borrá el servicio `db` del compose y apuntá `DB_HOST`/`DB_PORT`/credenciales a esa base.

## Pendiente antes de abrirla al público

Pasada de seguridad: validación de subida de archivos, acceso directo a `actions/` y `admin/`, errores en producción y revisión de la autenticación del panel. (Ver el chat con Claude.)
