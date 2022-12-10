<?php

namespace App\Tablas;

use PDO;

class Album
{
    public $id;
    public $titulo;
    public $anyo;

    public function __construct(array $campos)
    {
        $this->id = $campos['id'];
        $this->titulo = $campos['titulo'];
        $this->anyo = $campos['anyo'];
    }

    public static function insertar($titulo, $anyo, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare('INSERT INTO albumes (titulo, anyo)
                                    VALUES (:titulo, :anyo)');
        $sent->execute([':titulo' => $titulo, ':anyo' => $anyo]);
    }

    public static function modificar($id, $titulo, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare("UPDATE albumes 
                                  SET titulo= :titulo
                                WHERE id = :id");
        $sent->execute([':id' => $id, ':titulo' => $titulo]);
    }

    public static function borrar($id, ?PDO $pdo = null)
    {
    
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare("DELETE FROM albumes
                                     WHERE id = :id");
        $sent->execute([':id' => $id]);
    }
}
