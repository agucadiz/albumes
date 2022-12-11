<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <title>Temas</title>
</head>

<body>
    <?php
    require '../../vendor/autoload.php';
    require '../../src/_menu.php'; // Menú login.

    $pdo = conectar();
    $id = obtener_get('id');
    //Consulta.
    //Aparte del prepare/execute esta tb el query, consulta simple.
    $sent = $pdo->prepare("SELECT temas.titulo, temas.anyo, temas.duracion 
                         FROM temas 
                         JOIN album_tema ON temas.id=album_tema.tema_id 
                         WHERE album_tema.album_id = :id
                         ORDER BY titulo");
    //Sumatorio duración
    $sent->execute([':id' => $id]);
    $sent2 = $pdo->query("SELECT sum(duracion)
                          FROM album_tema at JOIN temas t ON at.tema_id = t.id
                          WHERE at.album_id = $id");
    $duracion = $sent2->fetch();
    ?>

<div class="container mx-auto relative mt-10 mb-10 shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th scope="col" class="py-3 px-6">Titulo</th>
                <th scope="col" class="py-3 px-6 text-center">Año</th>
                <th scope="col" class="py-3 px-6 text-center">Duración</th>
            </thead>
            <tbody>
                <?php foreach ($sent as $fila) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <!-- Titulo --> 
                        <td class="py-4 px-6"> <?=hh($fila['titulo'])?> </a></td>
                        <!-- Año -->
                        <td class="py-4 px-6 text-center"> <?=hh($fila['anyo'])?> </td>
                        <!-- Duración -->
                        <td class="py-4 px-6 text-center"> <?=hh($fila['duracion'])?> </td>
                    </tr>
                <?php endforeach ?>
                <!--Sumatorio duración -->
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th class="py-4 px-6">Duracion Albúm</th>
                        <td class="py-4 px-6"><?=hh($duracion['sum'])?></td>
                    </tr>
            </tbody>
        </table>
    </div>




    <!--JS-->
    <script src="/js/flowbite/flowbite.js"></script>

</body>

</html>