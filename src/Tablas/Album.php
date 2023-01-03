<?php

namespace App\Tablas;

use PDO;

class Album extends Modelo
{
    protected static string $tabla = 'albumes';

    public $id;
    public $titulo;
    public $anyo;
    public $precio;
    public $stock;

    public function __construct(array $campos)
    {
        $this->id = $campos['id'];
        $this->titulo = $campos['titulo'];
        $this->anyo = $campos['anyo'];
        $this->precio = $campos['precio'];
        $this->stock = $campos['stock'];
    }

    public static function insertar($titulo, $anyo, $precio, $stock, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare('INSERT INTO albumes (titulo, anyo, $precio, $stock)
                                    VALUES (:titulo, :anyo, :precio, :stock)');
        $sent->execute([':titulo' => $titulo, ':anyo' => $anyo, ':precio' => $precio, ':stock' => $stock]);
    }

    public static function modificar($id, $titulo, $anyo, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare("UPDATE albumes
                                  SET titulo = :titulo, anyo = :anyo
                                WHERE id = :id");
        $sent->execute([':id' => $id, ':titulo' => $titulo, ':anyo' => $anyo]);
    }

    public static function borrar($id, ?PDO $pdo = null)
    {
    
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare("DELETE FROM albumes
                                     WHERE id = :id");
        $sent->execute([':id' => $id]);
    }

    public static function existe(int $id, ?PDO $pdo = null): bool
    {
        return static::obtener($id, $pdo) !== null;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getAnyo()
    {
        return $this->anyo;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStock()
    {
        return $this->stock;
    }
}