<?php

require_once '../../Modelo/Emp_DB.php';
$con = new Emp_DB();
$dni = $_POST['dni'];
$pas = $_POST['pas'];
if ($con->login($dni, $pas)== false) {
    header("Location: ../../index.php");
} else {
    $dato = $con->login($dni, $pas);
    session_start();
    if($dato['car']=="Administrador"){
        $_SESSION["nombre"] = $dato['nom'];
        $_SESSION["apellido"] = $dato['ape'];
        $_SESSION["cargo"] = $dato['car'];
        $_SESSION["id"] = $dato['id'];
        header("Location: ../../Vista/empleados.php");
    }else{
        header("Location: ../../Vista/con_lista.php");
    }
    
}
?>