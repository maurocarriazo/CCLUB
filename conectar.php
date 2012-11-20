<?php
$conexion=mysql_connect("localhost","root","root") 
  or die("Problemas en la conexion");
mysql_select_db("cclub",$conexion) or
  die("Problemas en la seleccion de la base de datos");
?>