<?php

use App\Tablas\Album;

session_start();

require '../vendor/autoload.php';

try {
    $id = obtener_get('id');

    if ($id === null) {
        return volver();
    }

    //Control de las existencias.
    $album = Album::obtener($id);

    if ($album === null) {
        return volver();
    }

    if ($album->getStock() <= 0) {
        $_SESSION['error'] = 'No hay existencias suficientes.';
        return volver();
    }

    $carrito = unserialize(carrito());
    $carrito->insertar($id);
    $_SESSION['carrito'] = serialize($carrito);
} catch (ValueError $e) {
    // TODO: mostrar mensaje de error en un Alert
}

volver();
