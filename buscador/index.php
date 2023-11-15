<?php
include('libraries/Librerias.php');//Mandamos a llamar al archivo que contiene las librerias de bootstrap y ajax
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador en tiempo real con php, js y ajax</title>
</head>
<body>
       
<h1 class="text-center p-4 bg-dark text-white">Buscador de tiempo real</h1>

<div class="container">
    <!--Creamos un input de tipo search para nustros buscador y le colocamos un id-->
    <input type="search" class="form-control " placeholder="Buscar caracter..." id="buscar_registros"><br> 

    <!--Creamos un div identificado con id para el contenido de la tabla-->
    <div id="mostrar_registros">
        <!--Contenido de tabla en tiempo real-->
    </div>
</div>

<!--Archivo js donde estaran almacenadas funciones que haran funcionar el input y el div-->
<script src="js/Buscador.js"></script>
</body>
</html>