<?php
include("conexion.php");
$id=$_GET["id"];
$ac=$_GET["ac"];
$dui=$_GET["dui"];
if($ac=="i")
{
$cons=mysql_fetch_array(mysql_query("SELECT * FROM otros_datos WHERE dui='$dui'"));
$idd=$cons[0];
$insert=mysql_query("UPDATE alumnos SET id_datos = '$idd' WHERE id_alumno = '$id'");
echo "<script>location.replace('registro-2.php?id=$id')</script>";
}
else if($ac=="u1")
{
$cons=mysql_fetch_array(mysql_query("SELECT MAX(id_eco) AS id FROM situacion_economica"));
$idd=$cons[0];
$insert=mysql_query("UPDATE alumnos SET id_eco ='$idd' WHERE id_alumno='$id'");
echo "<script>location.replace('notas.php')</script>";
}
?>
