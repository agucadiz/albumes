<?php

session_start();

require '../../vendor/autoload.php';

use App\Tablas\Album;

$id = obtener_post('id');

if (!isset($id)) {
    return volver_admin();
}

// Comprobar si el album tiene canciones.
$pdo = conectar();
$sent = $pdo->prepare("SELECT COUNT(*) 
                       FROM albumes 
                       JOIN album_tema 
                       ON albumes.id=album_tema.album_id
                       WHERE id = :id");
$sent->execute([':id' => $id]);
if ($sent->fetchColumn() === 0) {
    Album::borrar($id);
    $_SESSION['exito'] = 'El Album se ha borrado correctamente.';
    volver_admin();
} else {
    $_SESSION['error'] = 'El Album tiene temas asociados.';
    volver_admin();
}

