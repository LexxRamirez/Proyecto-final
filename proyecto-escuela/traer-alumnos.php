<?php
	include("sesion.php");
	include("conexion.php");
	$lista = $_GET["q"];
	$tabla ="
	<table style=\"float:right\">
		<tr>
			<td>
				<form action=\"registro.php\">
					<button type=\"submit\" class=\"btn btn-primary\" style=\"float: right\">Agregar nuevo</button>
				</form>
			</td>
		</tr>
	</table>
	<br><br>
	<table style='width:100%; text-align:center;' class=\"table table-hover table-bordered\">
		<thead >
		<tr class=\"success\">
			<td rowspan=\"1\" style=\"width:70px;\">
				<label>N°</label>
			</td>
			<td rowspan=\"1\" style=\"width:500px;\">
				<label>Nombre de los/las alumnos/as</label>
			</td>
			<td colspan=\"1\" align=\"center\" style=\"width:200px;\">
				<label>Aciones</label>
			</td>
		</tr>
		
		</thead>";
	
	$query=mysql_query("SELECT * FROM alumnos WHERE id_grado ='$lista'");
	while ($row = mysql_fetch_array($query)) {
		$tabla = $tabla."
			<tr>
				<td>".$row[0]."</td>
				<td>".$row[3]."</td>
				<td align='center'>
				<select style='width:70px;' class='form-control'>
				<option value=''>Menu</option>
				<option value='3' onclick='ver($row[0],3)'>Ver notas</option>
				<option value='1' onclick='ver($row[0],1)'>Modificar</option>
				<option value='2' onclick='ver($row[0],2)'>Eliminar</option>
				</select>
				</td> 
				<div id='detalles$row[0]' style='display:none;'>
				<div style='width:150px; text-align:left; float:left;'>Id parametro</div><div style='width:250px; text-align:left; float:left; display:inline;'>$row[0]</div><br>
            	<div style='width:150px; text-align:left; float:left;'>Descripcion</div><div style='width:250px; text-align:left; float:left; display:inline;'>$row[3]</div><br>
            	<div style='width:150px; text-align:left; float:left;'>Codigo de barra</div><div style='width:250px; text-align:left; float:left; display:inline;'>$row[1]</div><br>
				</div>
		";

	}
	$compo = $compo."</tr></table>";
	echo $tabla;
	
	
?>