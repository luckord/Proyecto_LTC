<?php
require_once '../../Modelo/Emp_DB.php';
$con = new Emp_DB();
$dni = $_POST["dni"];
$nom = $_POST["nom"];
$ape= $_POST["ape"];
$tel = $_POST["tel"];
$cor= $_POST["cor"];
$pas = $_POST["pas"];
$car = $_POST["car"];
$pai  = $_POST["pai"];
if($con->emp_insertar($dni, $nom, $ape, $tel, $cor, $pas, $car, $pai)){
     header("Location: ../../Vista/empleados.php");
} else {
     header("Location: ../../Vista/emp_Insertar.php");
}


