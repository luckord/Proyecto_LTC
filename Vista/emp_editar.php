<?php
require_once '../Modelo/Emp_DB.php';
$con = new Emp_DB();
$dato = $con->emp_buscar_id($_GET['id']);
$cargos = $con->cargos();
$paises = $con->paises();
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
        <title></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container col-sm-6">
            <form action="../Controlador/Emp/Emp_Editar.php?id=<?php echo $dato['id']; ?>" method="POST">
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" required="" value="<?php echo $dato['dni']; ?>">
                </div>
                <div class="form-group">
                    <label for="nom">Nombre</label>
                    <input type="text" class="form-control" id="nom" name="nom" required="" value="<?php echo $dato['nom']; ?>">
                </div>
                <div class="form-group">
                    <label for="ape">Apellido</label>
                    <input type="text" class="form-control" id="ape" name="ape" required="" value="<?php echo $dato['ape']; ?>">
                </div>
                <div class="form-group">
                    <label for="tel">Telefono</label>
                    <input type="text" class="form-control" id="tel" name="tel" required="" value="<?php echo $dato['tel']; ?>">
                </div>
                <div class="form-group">
                    <label for="cor">Correo</label>
                    <input type="text" class="form-control" id="cor" name="cor" required="" value="<?php echo $dato['cor']; ?>">
                </div>
                <div class="form-group">
                    <label for="pas">Clave</label>
                    <input type="text" class="form-control" id="pas" name="pas" required="" value="<?php echo $dato['pas']; ?>">
                </div>
                <div class="form-group">
                    <label for="car">Cargo Empleado</label>
                    <select class="form-control" id="car" name="car">
                        <?php
                        foreach ($cargos as $value) {
                            if ($value["cargo"] == $dato['car']) {
                                echo '<option value="' . $value["id"] . '" selected>' . $value["cargo"] . ' </option>';
                            } else {
                                echo '<option value="' . $value["id"] . '">' . $value["cargo"] . '</option>';
                            }
                        }
                        ?>                    
                    </select>
                </div>
                <div class="form-group">
                    <label for="pai">País</label>
                    <select class="form-control" id="pai" name="pai">
                        <?php
                        foreach ($paises as $value) {
                            if ($value["pais"] == $dato['pai']) {
                                echo '<option value="' . $value["id"] . '" selected>' . $value["pais"] . '</option>';
                            } else {
                                echo '<option value="' . $value["id"] . '">' . $value["pais"] . '</option>';
                            }
                        }
                        ?>                    
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="../Vista/empleados.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>
