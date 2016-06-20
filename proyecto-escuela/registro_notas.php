<?php
include("sesion.php");
require("conexion.php");
include("part-prin-boost.php");
?>
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
<script type="text/javascript">
var p1 = 0.1;
var p2 = 0.15;
function llenar(serc)
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
				document.getElementById("notas").innerHTML =xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "traer.php?q="+serc,true);
		xmlhttp.send();
	}
}
function prom(id)
{
	var n1 = document.getElementById("NA1"+id).value;
	var n2 = document.getElementById("NA2"+id).value;
	var n3 = document.getElementById("NA3"+id).value;
	if(n1 == "")
	{
		n1=0;
		}
	if(n2 == "")
	{
		n2=0;
		}
	if(n3 == "")
	{
		n3=0;
		}	
	var promed = (parseFloat(n1)*p1 + parseFloat(n2)*p1 + parseFloat(n3)*p2);
	document.getElementById("PROM"+id).value = parseFloat(promed).toFixed(2); 
	}
function porc(porcentaje){
	 	if (porcentaje == 3)
			{
			p2 = 0.1;
			}
		else
		{
			p2 = 0.15;
			}
	}
</script>
	<?php
		include("menu-all.php");
	?>	
	<form method="POST">
	<div id="contenedor" style="width:1024px; margin: auto;">
	<h3 style="text-align:center;"><label>Cuadro de registro de evaluaciones de los aprendizajes por trimestre</label></h3>
	<table style="margin:auto;">
		<tr>
			<td>
				<label>Periodo: </label>
			</td>
			<td>
				<input name="periodo" type="number" onkeyup="porc(this.value)" step="any" class="form-control" required>
			</td>
			<td>
				<label>Asignatura: </label>
			</td>
			<td>
				<select name="asignatura" class="form-control" required>
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
				<select name="grado" onchange="llenar(this.value)" class="form-control">
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
	<br>
	</div>
	<div id="notas" style="width:1024px; margin: auto;">
	</div>
	</form>
</body>
</html>
<?php
if($_POST)
{
	$count = 0;
	$per = "periodo".$_POST["periodo"];
	$querrr = mysql_query("SELECT $per FROM notas WHERE id_grado = '$_POST[grado]' AND id_materia = '$_POST[asignatura]'");
	if(mysql_num_rows($querrr) > 0)
	{
		echo "<script>alert('Ya se registraron notas para este periodo');</script>";
	}
	else
	{
	$querya = mysql_query("SELECT id_alumno FROM alumnos WHERE id_grado = '$_POST[grado]' ");
	while($rowa = mysql_fetch_array($querya))
	{
		$val1="n1".$rowa[0];
		$val2="n2".$rowa[0];
		$val3="n3".$rowa[0];
		$val4="n4".$rowa[0];
		$nota1=$_POST[$val1];
		$nota2=$_POST[$val2];
		$nota3=$_POST[$val3];
		$promedio=$_POST[$val4];
		$nota=$nota1."-".$nota2."-".$nota3."-".$promedio;
		if($_POST["periodo"] == "1")
		{
		$sql = mysql_query("INSERT INTO notas (id, id_materia, id_grado, id_docente, id_alumno, periodo1) VALUES 
		(NULL, '$_POST[asignatura]', '$_POST[grado]', '$_SESSION[id_docente]', '$rowa[0]', '$nota')");
		}
		else if($_POST["periodo"] == "2")
		{
		 $sql = mysql_query("UPDATE notas SET periodo2 = '$nota' WHERE id_alumno = '$rowa[0]' AND id_materia = '$_POST[asignatura]'");
		}
		else if($_POST["periodo"] == "3")
		{
		 $sql = mysql_query("UPDATE notas SET periodo3 = '$nota' WHERE id_alumno = '$rowa[0]' AND id_materia = '$_POST[asignatura]'");
		}
		if($sql)
		{
			$count = count+1;
			}
			else
			{
				echo mysql_error();
				}
		}
		if(mysql_num_rows($querya) == $count)
		{
			echo "<script>alert('Exito se realizaron $count inserciones');</script>";
		}		
	}
}
?>
