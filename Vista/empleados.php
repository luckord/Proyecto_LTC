<?php
require_once '../Modelo/Emp_DB.php';
session_start();
$con = new Emp_DB();
$lista = $con->lista();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>LTC - Empleados</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link href="../reosurces/css/emp_lista.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container col-sm-8 cuerpo">
            <div class="jumbotron">
                <h1 class="display-4">Hola, <?php echo $_SESSION['nombre'].", ".$_SESSION['apellido']; ?>!</h1>
                <hr class="my-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary btn-lg" href="emp_detalle.php?id=<?php echo $_SESSION['id']; ?>" role="button">Perfil</a>
                    <a class="btn btn-danger btn-lg" href="../Controlador/Emp/Emp_Salir.php" role="button">Salir</a>
                    
                </div>
            </div>
            <h1>Lista de empleados</h1>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="emp_Insertar.php" class="btn btn-secondary">
                    Registrar
                </a>
            </div>
            <br> 
            <br> 
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Cargo</th>            
                        <th scope="col" class="text-center">Acciones</th>                    
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    foreach ($lista as $dato) {
                        echo '
                        <tr>
                            <th scope="row"><a href="emp_detalle.php?id=' . $dato["id"] . ' " class="enlace">' . $dato["id"] . '</a></th>
                            <td><a href="emp_detalle.php?id=' . $dato["id"] . ' " class="enlace">' . $dato["dni"] . '</a></td>
                            <td><a href="emp_detalle.php?id=' . $dato["id"] . ' " class="enlace">' . $dato["nom"] . '</a></td>
                            <td><a href="emp_detalle.php?id=' . $dato["id"] . ' " class="enlace">' . $dato["ape"] . '</a></td>
                            <td><a href="emp_detalle.php?id=' . $dato["id"] . ' " class="enlace">' . $dato["car"] . '</a></td>
                            <td class="text-center">
                            <a href="emp_editar.php?id=' . $dato["id"] . '" class="btn btn-success">Editar</a>
                            <a href="#" onclick="eliminar(' . $dato["id"] . ')" class="btn btn-danger">Borrar</a>
                            </td>                       
                        </tr>
                        ';
                    }
                    ?>                
                </tbody>
            </table>
        </div>

        <script src="../reosurces/js/emp_js.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>
