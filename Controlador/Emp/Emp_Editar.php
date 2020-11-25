<?php

require_once '../../Modelo/Emp_DB.php';
$con = new Emp_DB();
$id = $_GET['id'];
$dni = $_POST["dni"];
$nom = $_POST["nom"];
$ape = $_POST["ape"];
$tel = $_POST["tel"];
$cor = $_POST["cor"];
$pas = $_POST["pas"];
$car = $_POST["car"];
$pai = $_POST["pai"];

if($con->emp_buscar_id($id)!= false){
    if($con->emp_editar($dni, $nom, $ape, $tel, $cor, $pas, $car, $pai, $id)){
        header("Location: ../../Vista/empleados.php");
    } else {
        header("Location: ../../Vista/emp_editar.php");
    }
}

