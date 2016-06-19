<?php
	include("sesion.php");
    include("conexion.php");
    include("part-prin-boost.php");
?>

<div style="width:1024px; margin: auto;">
	<form role="form" method="GET" action="report-alumnos-viw.php" target="_blank" id="form">
		<h2 align="center"><label>Seleccione el grado</label><h2>
		<table align="center">
			<tr>
				<td>
					<select name="grado" class="form-control">
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
			<tr>
				<td>
					<button type="submit" class="btn btn-primary">Generar reporte</button>
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>