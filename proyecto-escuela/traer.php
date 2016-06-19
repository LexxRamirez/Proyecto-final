<?php
include("conexion.php");
$q = $_GET["q"];
$compo ="<table style='width:100%; text-align:center;' class=\"table table-hover table-bordered\">
		<thead >
		<tr class=\"success\">
			<td rowspan=\"3\" style=\"width:70px;\">
				<label>N°</label>
			</td>
			<td rowspan=\"3\" style=\"width:500px;\">
				<label>Nombre de los/las alumnos/as</label>
			</td>
			<td colspan=\"4\" align=\"center\">
				<label>Actividad1 (35%)</label>
			</td>
		</tr>
		<tr  class=\"success\">
			<td colspan=\"3\" align=\"center\">
				<label>Actividad integradora</label>
			</td>
			<td rowspan=\"2\" style=\"width:100px;\">
				<label>Total</label>
			</td>
		</tr>
		<tr class=\"success\">
			<td>
				<label>R1</label>
			</td>
			<td>
				<label>R2</label>
			</td>
			<td>
				<label>R3</label>
			</td>
		</tr>
		</thead>
";
$query=mysql_query("SELECT * FROM alumnos WHERE id_grado = '$q'");
while($row = mysql_fetch_array($query))
	{
		$compo = $compo. " 
		<tr>
		<td style='width:70px;'>".$row[0]."</td>
		<td style='width:500px;'>".$row[3]."</td>
		<td style='width:100px;'><input type='text' name='n1".$row[0]."' size='4px' id='NA1".$row[0]."' onkeyup='prom(".$row[0].")'></td>
		<td style='width:100px;'><input type='text' name='n2".$row[0]."' size='4px' onkeyup='prom(".$row[0].")' id='NA2".$row[0]."'></td>
		<td style='width:100px;'><input type='text' name='n3".$row[0]."' size='4px' id='NA3".$row[0]."' onkeyup='prom(".$row[0].")'></td>
		<td style='width:100px;'><input type='text' name='n4".$row[0]."' size='4px' id='PROM".$row[0]."'></td></tr>"; 
		}
		$compo = $compo."</table>
		<button type='submit' class=\"btn btn-danger\">Guardar</button>
		";
echo $compo;
?>
