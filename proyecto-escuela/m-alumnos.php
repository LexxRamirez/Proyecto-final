<?php
	include("sesion.php");
    include("conexion.php");
    include("part-prin-boost.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
	</head>
	<body>
		<?php
		include("menu-all.php");
		?>
	<h2 align="center"><label>Lista de alumnos</label></h2>
	<br>
	<div id="alum" style="width:1024px; margin: auto;">
		<form method="GET" action="report-alumnos-viw.php" target="_blank">
		<table style="margin:auto">
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
