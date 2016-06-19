<?php
include("sesion.php");
require("conexion.php");
include("part-prin-boost.php");
?>

	<script type="text/javascript">
		function llenar()
		{
			var s = document.getElementById("asignatura").value;
			var serc = document.getElementById("grado").value;
			if (serc == "")
			{
				//alert("No ha seleccionado un grado");
			}
			if (s == "")
			{
				//alert("No ha seleccionado una materia");
			}
			
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
						document.getElementById("nota_general").innerHTML =xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET", "traer1.php?q="+serc+"&s="+s,true);
				xmlhttp.send();
			}
	</script>
	<style>
	input[type=number]::-webkit-outer-spin-button,
	input[type=number]::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
	input[type=number] {
		-moz-appearance:textfield;
	}
	</style>
	<?php
			include("menu-all.php");
	?>	
	<div id="contenedor" style="width:1024px; margin: auto;">
	<h3 style="text-align:center;"><label>Cuadro de registro de evaluaciones de los aprendizajes por trimestre</label></h3>
	<form method="POST" action="report-notas-viw.php" target="_blank">
		<table style="margin:auto;">
		<tr>
			<td>
				<label>Asignatura: </label>
			</td>
			<td>
				<select name="materia" id="asignatura" onchange="llenar()" class="form-control">
					<option value="">Seleccione</option>
					<?php
					$querys=mysql_query("SELECT * FROM materia");
					while($rows=mysql_fetch_array($querys))
					{
						echo "<option value='".$rows[0]."'>".$rows[1]."</option> ";
						}
					?>
				</select>
			</td>
			<td>
				<label>Grado: </label>
			</td>
			<td>
				<select name="grado" onchange="llenar()" id="grado" class="form-control">
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
	<br>
	<table style="margin:auto;">
		<tr>
			<td>
				<label>Profesor:</label>
			</td>
			<td>
				<input name="docente" type="text" class="form-control" <?php echo "value='$_SESSION[nombre]'";?>>
			</td>
		</tr>
	</table>
	<button type="submit" class="btn btn-primary" style="float: right">Generar reporte</button>
	</form>
	<form method="POST" action="registro_notas.php">
		<button type="submit" class="btn btn-primary" style="float: right">Registrar notas</button>
	</form>
	<br>
	<br>
	</div>
	<div id="nota_general" style="width:1024px; margin: auto;">
		</div>
		<br>
</body>
</html>
