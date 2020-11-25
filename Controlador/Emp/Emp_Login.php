<?php

require_once '../../Modelo/Emp_DB.php';
$con = new Emp_DB();
$dni = $_POST['dni'];
$pas = $_POST['pas'];
if ($con->login($dni, $pas)== false) {
    header("Location: ../../index.php");
} else {
    header("Location: ../../Vista/empleados.php");
}
?>