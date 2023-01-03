<?php

namespace App\Generico;

use App\Tablas\Album;

class Linea extends Modelo
{
    private Album $album;
    private int $cantidad;

    public function __construct(Album $album, int $cantidad = 1)
    {
        $this->setAlbum($album);
        $this->setCantidad($cantidad);
    }

    public function getAlbum(): Album
    {
        return $this->album;
    }

    public function setAlbum(Album $album)
    {
        $this->album = $album;
    }

    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function incrCantidad()
    {
        $this->cantidad++;
    }

    public function decrCantidad()
    {
        $this->cantidad--;
    }
}
