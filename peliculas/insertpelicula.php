<html>
<head>
<title>Problema</title>
</head>
<body>
<?php
include ("../conectar.php");
 $cons = "SELECT * FROM tbl_generos where idtbl_generos='$_REQUEST[id_genero]'";
 $resultado = mysql_query($cons,$conexion);
 $Num_filas = mysql_num_rows($resultado);

if ($Num_filas==0) 
{
mysql_query("insert into tbl_generos (idtbl_generos, nombre_genero) values 
   ('$_REQUEST[id_genero]','$_REQUEST[genero]')", 
   $conexion) or die("Problemas en el select".mysql_error());
echo "Nuevo género guardado con exito";
mysql_free_result($resultado);
mysql_close($conexion);
}
else
{
?>
<div id="errorregistroexistente">
<?php
 echo "ERROR EL GENERO YA EXISTE";
?>
</div>
<?php
}
?>
</body>
</html>
