<?php 
include('Models/Base_datos.php');//Conexion a la base de datos 
    $salida_datos = "";
    $buscar_usuarios = "SELECT * FROM usuarios"; //Consulta para solicitar todos los datos de la tabla

    if(isset($_POST['inputbuscador'])){
        $buscar_caracteres = $conexion->real_escape_string($_POST['inputbuscador']);//Creamos una variable para agregarle la funcion real_escape_string la cual nos servira para prevenir ataques de inyeccion sql, como estamos buscando informacion en la BD con esto evitamos alguna inyeccion que pueda mostrar informacion no deseada de la base de datos

        //Creamos una variable donde alojamos una consulta que nos servira para que en cada columna al momento de ir ingresando caracteres vaya buscando por campo, estamos seleccionando cada una de las celdas existentes en esa tabla y concatenando a la varia $buscar
        $buscar_usuarios = "SELECT id_usuario,nombre,apellidos,usuario FROM usuarios WHERE nombre LIKE '%".$buscar_caracteres."%' OR apellidos LIKE '%".$buscar_caracteres."%' OR usuario LIKE '%".$buscar_caracteres."%' OR id_usuario LIKE '%".$buscar_caracteres."%'";
    }
    //Alojamos la conexion y la consulta en un nueva variable
    $resultado = $conexion->query($buscar_usuarios);
    if($resultado->num_rows > 0){
        $salida_datos.= "<table class='table'>
        <thead>
            <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Usuario</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>";
        while($usuarios = $resultado->fetch_assoc()){//creamos un arregalo y o asociamos con la variable que tiene alojada la consulta 
            $salida_datos.="<tr>
                    <td>".$usuarios['id_usuario']."</td>
                    <td>".$usuarios['nombre']."</td>
                    <td>".$usuarios['apellidos']."</td>
                    <td>".$usuarios['usuario']."</td>
                    <td>
                    <button type='submit' class='btn btn-danger'>Eliminar</button>
                    <button type='submit' class='btn btn-success'>Editar</button>
                    </td>
                    </tr>";
                }
            $salida_datos.="</tbody></table>";
        
        
    }else{
        $salida_datos.="<h3 class='text-center'>No se encontraron registros en la base de datos</h3>";
    }
    echo $salida_datos;
    $conexion->close();
?>

    