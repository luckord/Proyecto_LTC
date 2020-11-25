<?php
require_once '../../Modelo/Emp_DB.php';
$con = new Emp_DB();
$id = $_GET["id"];
if($con->emp_eliminar($id)){
    header("Location: ../../Vista/empleados.php");
}


