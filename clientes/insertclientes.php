<html>
<head>
<title>Problema</title>
</head>
<body>
<?php
include ("../conectar.php");
 $cons = "SELECT * FROM tbl_clientes where cedula_cliente='$_REQUEST[id_cliente]'";
 $resultado = mysql_query($cons,$conexion);
 $Num_filas = mysql_num_rows($resultado);

if ($Num_filas==0) 
{
mysql_query("insert into tbl_clientes (cedula_cliente, nombre_cliente, apellido_cliente, sexo_cliente, direccion_cliente, nacimiento_cliente, telefono_cliente, email_cliente) values 
   ('$_REQUEST[id_cliente]','$_REQUEST[nombre_cliente]','$_REQUEST[apellido_cliente]','$_REQUEST[sexo]','$_REQUEST[direccion]','$_REQUEST[fecha_cliente]','$_REQUEST[tel_cliente]','$_REQUEST[email]')", 
   $conexion) or die("Problemas en el select".mysql_error());
echo "Nuevo Cliente guardado con exito";
mysql_free_result($resultado);
mysql_close($conexion);
}
else
{
?>
<div id="errorregistroexistente">
<?php
 echo "ERROR EL CLIENTE	 YA EXISTE";
?>
</div>
<?php
}
?>
</body>
</html>
