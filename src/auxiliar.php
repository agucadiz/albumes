<?php
/**
 * @author Agustín Pedrote Bejarano
 * @copyright Copyright (c) 2022 Agustín Pedrote Bejarano
 * @license https://www.gnu.org/licenses/gpl.txt
 */

 //Conectar a base de datos.
function conectar()
{
    return new \PDO('pgsql:host=localhost,dbname=albumes', 'albumes', 'albumes');
}

//Evitar inyeccioón de código malicioso.
function hh($x)
{
    return htmlspecialchars($x ?? '', ENT_QUOTES | ENT_SUBSTITUTE);
}

//CRUD.
function obtener_get($par)
{
    return obtener_parametro($par, $_GET);
}

function obtener_post($par)
{
    return obtener_parametro($par, $_POST);
}

function obtener_parametro($par, $array)
{
    return isset($array[$par]) ? trim($array[$par]) : null;
}

function volver()
{
    header('Location: /index.php');
}

//login
function volver_admin()
{
    header("Location: /admin/");
}

//Registrar
function redirigir_login()
{
    header('Location: /login.php');
}

//Formato monetario
function dinero($s)
{
    return number_format($s, 2, ',', ' ') . ' €';
}

//Carrito
function carrito()
{
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = serialize(new \App\Generico\Carrito());
    }

    return $_SESSION['carrito'];
}

function carrito_vacio()
{
    $carrito = unserialize(carrito());

    return $carrito->vacio();
}
