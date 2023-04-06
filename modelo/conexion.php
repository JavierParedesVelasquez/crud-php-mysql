<?php
// Creando variable conexion
$conexion= new mysqli("localhost", "root", "", "bd_crud");
// Proyecto reconozca caracteres especiales
$conexion->set_charset("utf8")
?>