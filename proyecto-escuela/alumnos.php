<?php
	include("sesion.php");
    include("conexion.php");
?>
<!DOCTYPE html>
<html leng="utf-8">
<head>
<title>..::CE</title>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link href="css/jquery-ui.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.js"></script>  

</head>
			<script>
				function ver(id,sr)
				{
					var select =sr;
					if(select == 0)
					{
					
					}
					else if(select == 1)
					{
						location.replace("registro_ed.php?id="+id);
					}
					else if(select == 2)
					{
						if(window.confirm('¿Desea eliminar este alumno'))
						{
							location.replace("alumnos.php?action=elimin&id="+id);
						}
					}
					else if(select == 3){
						location.replace("libreta-notas.php?id="+id);
					}
				}
			</script>
			<script>
				function alumnos(serc)
				{
					if (serc == "")
					{
						return;
					}
					else
					{
						if (window.XMLHttpRequest)
						{
							xmlhttp = new XMLHttpRequest();
						}
						else 
						{
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function()
						{
							if (xmlhttp.readyState ==4 & xmlhttp.status == 200)
							{
								document.getElementById("lista").innerHTML =xmlhttp.responseText;
							}
						}
						xmlhttp.open("GET", "traer-alumnos.php?q="+serc,true);
						xmlhttp.send();
					}
				}
			</script>
<body>
	<div id="log" style="width:1024px; height:75px; margin: auto; background-color: #B9C9FE">
		<a href="logut.php" style="float:right; color:#000; padding:20px; font-size:17px;"><?php echo $_SESSION["usuario"];?>(Exit)</a>
	</div>
	<h2 align="center"><label>Lista de alumnos</label></h2>
	<br>
	<div id="alum" style="width:1024px; margin: auto;">
		<form method="GET" action="report-alumnos-viw.php" target="_blank">
		<table align="center">
			<tr>
				<td>
					<select name="grado" onchange="alumnos(this.value)" class="form-control">
						<option value="">Seleccione</option>
						<?php
						$query=mysql_query("SELECT * FROM grado");
						while($row=mysql_fetch_array($query))
						{
							echo "<option value='".$row[0]."'>".$row[1]."</option> ";
							}
						?>
					</select>
				</td>
			</tr>
		</table>
		<button type="submit" class="btn btn-primary" style="float: right">Generar reporte</button>
	</form>
	</div>
<div id="lista" style="width:1024px; margin: auto;">
	</div>
</body>
</html>

<?php
	if(isset($_GET["action"])){
	 if($_GET["action"]== "elimin"){
	 	$ids = mysql_fetch_array(mysql_query("SELECT * FROM alumnos WHERE id_alumno = '$_GET[id]'"));
		mysql_query("DELETE FROM alumnos WHERE id_alumno='$_GET[id]'");
		mysql_query("DELETE FROM otros_datos WHERE id_datos='$ids[id_datos]'");
		mysql_query("DELETE FROM situacion_economica WHERE id_eco='$ids[id_eco]'");
	}
	}

?>