<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/output.css" rel="stylesheet">
  <title>Modificar</title>
</head>

<body>
  <?php
  require '../../vendor/autoload.php';

  $pdo = conectar();

  $id = obtener_get('albumid');
  $titulo = obtener_get('titulo');
  $album_anyo = obtener_get('album_anyo');
  $album = obtener_post('album');
  $anyo = obtener_post('anyo');

  if (isset($album) && $album != '' && isset($anyo) && $anyo != '') {
    \App\Tablas\Album::modificar($id, $album, $anyo, $pdo);
    $_SESSION['exito'] = "El album se ha modificado correctamente.";
    return volver_admin();
  }
  ?>


  <form class="mt-5 mr-96 ml-96" action="" method="POST">
    <div class="mb-6">
      <label for="album" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
        Nombre album</label>
      <input type="text" id="album" name="album" value="<?= $titulo ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">

      <label for="anyo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
        Año album</label>
      <input type="text" id="anyo" name="anyo" value="<?= $album_anyo ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      modificar</button>
  </form>

  <script src="../js/flowbite/flowbite.js"></script>

</body>

</html>