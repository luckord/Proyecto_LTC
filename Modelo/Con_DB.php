<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Con_DB
 *
 * @author USER
 */
class Con_DB {

    private $url = "localhost";
    private $user = "root";
    private $pas = "";
    private $db = "servicio_ltc";
    public $conexion;

    function __construct() {
        $this->ConexionDB();
    }

    function ConexionDB() {
        $this->conexion = new mysqli($this->url, $this->user, $this->pas, $this->db)or die("No se conexto a la base de datos");
        $this->conexion->set_charset("utf8_decode");
    }

    function CerrarDB() {
        mysqli_close($this->conexion);
    }

}
