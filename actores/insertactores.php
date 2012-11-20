<html>
<head>
<title>Problema</title>
</head>
<body>
<?php
include ("../conectar.php");
 $cons = "SELECT * FROM tbl_actores where idtbl_actores='$_REQUEST[id_actor]'";
 $resultado = mysql_query($cons,$conexion);
 $Num_filas = mysql_num_rows($resultado);

if ($Num_filas==0) 
{
mysql_query("insert into tbl_actores (idtbl_actores, nombre_actor, apellido_actor, trivia_actor, fechanacimiento_actor, foto_actor) values 
   ('$_REQUEST[id_actor]','$_REQUEST[nombre_act]','$_REQUEST[apellido_act]','$_REQUEST[trivia]','$_REQUEST[fecha_act]','$_REQUEST[foto_act]')", 
   $conexion) or die("Problemas en el select".mysql_error());
echo "Nuevo Actor guardado con exito";
mysql_free_result($resultado);
mysql_close($conexion);
}
else
{
?>
<div id="errorregistroexistente">
<?php
 echo "ERROR EL ACTOR YA EXISTE";
?>
</div>
<?php
}
?>
</body>
</html>
