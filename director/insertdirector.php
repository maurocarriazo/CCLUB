<html>
<head>
<title>Problema</title>
</head>
<body>
<?php
include ("../conectar.php");
 $cons = "SELECT * FROM tbl_director where idtbl_director='$_REQUEST[id_director]'";
 $resultado = mysql_query($cons,$conexion);
 $Num_filas = mysql_num_rows($resultado);

if ($Num_filas==0) 
{
mysql_query("insert into tbl_director (idtbl_director, nombre_director, apellido_director, trivia_director, fechanacimiento_director, foto_director) values 
   ('$_REQUEST[id_director]','$_REQUEST[nombre_dir]','$_REQUEST[apellido_dir]','$_REQUEST[trivia]','$_REQUEST[fecha_dir]','$_REQUEST[foto_dir]')", 
   $conexion) or die("Problemas en el select".mysql_error());
echo "Nuevo Director guardado con exito";
mysql_free_result($resultado);
mysql_close($conexion);
}
else
{
?>
<div id="errorregistroexistente">
<?php
 echo "ERROR EL DIRECTOR CON ID YA EXISTE";
?>
</div>
<?php
}
?>
</body>
</html>
