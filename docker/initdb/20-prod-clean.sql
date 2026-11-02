-- Producción: no publicar cuentas ni datos personales sembrados en el dump.
-- Corre en el PRIMER arranque del contenedor, después de 01-tienda.sql.
-- El admin real se crea desde variables de entorno (ver bootstrap-admin.php).
SET FOREIGN_KEY_CHECKS = 0;
DELETE FROM carrito_items;
DELETE FROM carritos;
DELETE FROM pedido_items;
DELETE FROM pedidos;
DELETE FROM contactos;
DELETE FROM usuarios;
SET FOREIGN_KEY_CHECKS = 1;
