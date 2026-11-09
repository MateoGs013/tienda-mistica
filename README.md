# Tienda Mística

E-commerce ficticio de duendes mágicos en PHP puro, sin framework: front controller, PDO y MariaDB. Catálogo, carrito, blog y panel de administración, con estética arcade.

Proyecto académico, Escuela Da Vinci.

En vivo: [mistica.mateogs.tech](https://mistica.mateogs.tech) · Caso: [mateogs.tech](https://mateogs.tech/projects/tienda-mistica)

## Stack

PHP 8.3 sobre Apache (`mod_php`) · MariaDB · Tailwind CSS · JavaScript · Docker Compose.

## Correrlo en local

```bash
cp .env.example .env
docker compose up -d --build
```

Abre en http://localhost:8080. La base se importa sola en el primer arranque. Variables de entorno y despliegue en Coolify: [README-deploy.md](README-deploy.md).
