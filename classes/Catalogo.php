<?php
// classes/Catalogo.php
require_once __DIR__ . '/DB.php';

/**
 * Clase para gestionar tablas de catálogo: elementos, rarezas, materiales, accesorios
 */
class Catalogo {

    /**
     * Obtener todos los elementos
     */
    public static function getElementos(): array {
        try {
            $cn = DB::get();
            $sql = "SELECT id_elemento, nombre FROM elementos ORDER BY nombre ASC";
            return $cn->query($sql)->fetchAll();
        } catch (Exception $e) {
            error_log("Error al obtener elementos: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtener todas las rarezas
     */
    public static function getRarezas(): array {
        try {
            $cn = DB::get();
            $sql = "SELECT id_rareza, nombre FROM rareza ORDER BY id_rareza ASC";
            return $cn->query($sql)->fetchAll();
        } catch (Exception $e) {
            error_log("Error al obtener rarezas: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtener todos los materiales
     */
    public static function getMateriales(): array {
        try {
            $cn = DB::get();
            $sql = "SELECT id_material, nombre FROM materiales ORDER BY nombre ASC";
            return $cn->query($sql)->fetchAll();
        } catch (Exception $e) {
            error_log("Error al obtener materiales: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtener todos los accesorios
     */
    public static function getAccesorios(): array {
        try {
            $cn = DB::get();
            $sql = "SELECT id_accesorio, nombre FROM accesorios ORDER BY nombre ASC";
            return $cn->query($sql)->fetchAll();
        } catch (Exception $e) {
            error_log("Error al obtener accesorios: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Crear un nuevo elemento
     */
    public static function crearElemento(string $nombre): bool {
        try {
            $cn = DB::get();
            $sql = "INSERT INTO elementos (nombre) VALUES (:nombre)";
            $stmt = $cn->prepare($sql);
            return $stmt->execute(['nombre' => trim($nombre)]);
        } catch (Exception $e) {
            error_log("Error al crear elemento: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Crear una nueva rareza
     */
    public static function crearRareza(string $nombre): bool {
        try {
            $cn = DB::get();
            $sql = "INSERT INTO rareza (nombre) VALUES (:nombre)";
            $stmt = $cn->prepare($sql);
            return $stmt->execute(['nombre' => trim($nombre)]);
        } catch (Exception $e) {
            error_log("Error al crear rareza: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Crear un nuevo material
     */
    public static function crearMaterial(string $nombre): bool {
        try {
            $cn = DB::get();
            $sql = "INSERT INTO materiales (nombre) VALUES (:nombre)";
            $stmt = $cn->prepare($sql);
            return $stmt->execute(['nombre' => trim($nombre)]);
        } catch (Exception $e) {
            error_log("Error al crear material: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar un elemento (solo si no está en uso)
     */
    public static function eliminarElemento(int $id): bool {
        try {
            $cn = DB::get();
            $sql = "DELETE FROM elementos WHERE id_elemento = :id";
            $stmt = $cn->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (Exception $e) {
            error_log("Error al eliminar elemento: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar una rareza (solo si no está en uso)
     */
    public static function eliminarRareza(int $id): bool {
        try {
            $cn = DB::get();
            $sql = "DELETE FROM rareza WHERE id_rareza = :id";
            $stmt = $cn->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (Exception $e) {
            error_log("Error al eliminar rareza: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar un material (solo si no está en uso)
     */
    public static function eliminarMaterial(int $id): bool {
        try {
            $cn = DB::get();
            $sql = "DELETE FROM materiales WHERE id_material = :id";
            $stmt = $cn->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (Exception $e) {
            error_log("Error al eliminar material: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Verificar si un elemento está en uso
     */
    public static function elementoEnUso(int $id): bool {
        try {
            $cn = DB::get();
            $sql = "SELECT COUNT(*) as count FROM duendes WHERE id_elemento = :id";
            $stmt = $cn->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch();
            return $result['count'] > 0;
        } catch (Exception $e) {
            error_log("Error al verificar uso de elemento: " . $e->getMessage());
            return true; // Por seguridad, asumimos que está en uso
        }
    }

    /**
     * Verificar si una rareza está en uso
     */
    public static function rarezaEnUso(int $id): bool {
        try {
            $cn = DB::get();
            $sql = "SELECT COUNT(*) as count FROM duendes WHERE id_rareza = :id";
            $stmt = $cn->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch();
            return $result['count'] > 0;
        } catch (Exception $e) {
            error_log("Error al verificar uso de rareza: " . $e->getMessage());
            return true;
        }
    }

    /**
     * Verificar si un material está en uso
     */
    public static function materialEnUso(int $id): bool {
        try {
            $cn = DB::get();
            $sql = "SELECT COUNT(*) as count FROM duendes WHERE id_material = :id";
            $stmt = $cn->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch();
            return $result['count'] > 0;
        } catch (Exception $e) {
            error_log("Error al verificar uso de material: " . $e->getMessage());
            return true;
        }
    }
}
