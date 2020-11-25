<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConexionDB
 *
 * @author USER
 */
class Emp_DB {

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

    function login($dni, $pas) {
        try {
            $this->ConexionDB();
            $sql = "call emp_login('$dni','$pas')";
            $resultado = $this->conexion->query($sql) or die($this->conexion->error);
            if ($resultado) {
                return $resultado->fetch_array(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Error al listar';
        } finally {
            $this->CerrarDB();
        }
    }

    function lista() {
        try {
            $this->ConexionDB();
            $sql = "call emp_lista()";
            $resultado = $this->conexion->query($sql) or die($this->conexion->error);
            if ($resultado) {
                return $resultado->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Error al listar';
        } finally {
            $this->CerrarDB();
        }
    }

    function cargos() {
        try {
            $this->ConexionDB();
            $sql = "call car_lista()";
            $resultado = $this->conexion->query($sql) or die($this->conexion->error);
            if ($resultado) {
                return $resultado->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Error al listar';
        } finally {
            $this->CerrarDB();
        }
    }

    function paises() {
        try {
            $this->ConexionDB();
            $sql = "call pai_lista()";
            $resultado = $this->conexion->query($sql) or die($this->conexion->error);
            if ($resultado) {
                return $resultado->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Error al listar';
        } finally {
            $this->CerrarDB();
        }
    }
    
    function emp_insertar($dni,$nom,$ape,$tel,$cor,$pas,$car,$pai) {
        try {
            $this->ConexionDB();
            $sql = "call emp_insertar('$dni','$nom','$ape','$tel','$cor','$pas','$car','$pai')";
            $resultado = $this->conexion->query($sql) or die($this->conexion->error);
             if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Error al listar';
        } finally {
            $this->CerrarDB();
        }
    }
    
    function emp_editar($dni,$nom,$ape,$tel,$cor,$pas,$car,$pai,$id) {
        try {
            $this->ConexionDB();
            $sql = "call emp_editar('$dni','$nom','$ape','$tel','$cor','$pas','$car','$pai','$id')";
            $resultado = $this->conexion->query($sql) or die($this->conexion->error);
             if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Error al listar';
        } finally {
            $this->CerrarDB();
        }
    }
    
    function emp_buscar_id($id) {
        try {
            $this->ConexionDB();
            $sql = "call emp_buscar_id('$id')";
            $resultado = $this->conexion->query($sql) or die($this->conexion->error);
            if ($resultado) {
                return $resultado->fetch_array(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Error al listar';
        } finally {
            $this->CerrarDB();
        }
    }
    
    function emp_eliminar($id){
        try {
            $this->ConexionDB();
            $sql = "call emp_eliminar('$id')";
            $resultado = $this->conexion->query($sql) or die($this->conexion->error);
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Error al listar';
        } finally {
            $this->CerrarDB();
        }
    }

    function CerrarDB() {
        mysqli_close($this->conexion);
    }

}
