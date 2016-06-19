<?php
    include("sesion.php");
	include ("conexion.php");
	include("part-prin-boost.php");
	include("menu-all.php");
    $notas=mysql_query("SELECT materia.materia, notas.periodo1, notas.periodo2, notas.periodo3 FROM materia, notas WHERE  materia.id_materia = notas.id_materia AND notas.id_alumno = '$_GET[id]'");
	$nombre = mysql_fetch_array(mysql_query("SELECT nombre FROM alumnos WHERE id_alumno = '$_GET[id]'"));
?>

	<div id="libreta" style="width:1024px; margin: auto;">
	<h2 align="center"><?php echo $nombre[0];?></h2>
	<h3 align="center">Libreta de notas por asignatura y trimestres por asignatura</h3>
	<table style="width:1024px; margin: auto;" class="table table-hover table-bordered">
	<thead>
		<tr class="success">
			<td rowspan="4" style="width: 250px;">
				<label>Asignatura</label>
			</td>
			<td colspan="4">
				<label>Actividad1 (35%)</label>
			</td>
			<td colspan="4">
				<label>Actividad2 (35%)</label>
			</td>
			<td colspan="4">
				<label>Actividad3 (30%)</label>
			</td>
			<td colspan="1" rowspan="4" style="width: 55px;">
				<label>Promedio final</label>
			</td>
		</tr>
		<tr class="success">
			<td colspan="3">
				<label>Actividad integradora</label>
			</td>
			<td rowspan="3">
				<label>Total</label>
			</td>
			<td colspan="3">
				<label>Actividad Cotidiana</label>
			</td>
			<td rowspan="3">
				<label>Total</label>
			</td>
			<td colspan="3">
				<label>Actividad Examenes</label>
			</td>
			<td rowspan="3">
				<label>Total</label>
			</td>
		</tr>
		<tr class="success">
			<td style="width: 48px;">
				<label>R1</label>
			</td>
			<td style="width: 48px;">
				<label>R2</label>
			</td>
			<td style="width: 48px;">
				<label>R3</label>
			</td>
			<td style="width: 48px;">
				<label>R1</label>
			</td>
			<td style="width: 48px;">
				<label>R2</label>
			</td>
			<td style="width: 48px;">
				<label>R3</label>
			</td>
			<td style="width: 48px;">
				<label>R1</label>
			</td>
			<td style="width: 48px;">
				<label>R2</label>
			</td>
			<td style="width: 48px;">
				<label>R3</label>
			</td>
		</tr>
		<tr class="success">
			<td style="width: 48px;">
				<label>10%</label>
			</td>
			<td style="width: 48px;\">
				<label>10%</label>
			</td>
			<td style="width: 48px;">
				<label>15%</label>
			</td>
			<td style="width: 48px;">
				<label>10%</label>
			</td>
			<td style="width: 48px;">
				<label>10%</label>
			</td>
			<td style="width: 48px;">
				<label>15%</label>
			</td>
			<td style="width: 48px;">
				<label>10%</label>
			</td>
			<td style="width: 48px;">
				<label>10%</label>
			</td>
			<td style="width: 48px;">
				<label>10%</label>
			</td>
		</tr>
		</thead>
		<tbody>
		<?php
		while($dato = mysql_fetch_array($notas))
		{
			$p1 = explode("-" ,$dato["periodo1"]);
			$p2 = explode("-" ,$dato["periodo2"]);
			$p3 = explode("-" ,$dato["periodo3"]);
			$nf = $p1[3]+$p2[3]+$p3[3];
			echo "<tr><td>$dato[materia]</td>
				<td>$p1[0]</td>
				<td>$p1[1]</td>
				<td>$p1[2]</td>
				<td>$p1[3]</td>
				<td>$p2[0]</td>
				<td>$p2[1]</td>
				<td>$p2[2]</td>
				<td>$p2[3]</td>
				<td>$p3[0]</td>
				<td>$p3[1]</td>
				<td>$p3[2]</td>
				<td>$p3[3]</td>
				<td>$nf</td>
			</tr>";
			}
		?>
		</tbody>
		</table>
		</div>
		<br>
</body>
</html>
