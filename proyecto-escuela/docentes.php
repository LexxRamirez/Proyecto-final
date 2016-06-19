<?php
	include("sesion.php");
	include ("conexion.php");
	include("part-prin-boost.php");
	
?>
<script type="text/javascript">
	
</script>

		<?php
			include("menu-all.php");
		?>	
<div>
	<h3 align="center">Docentes o usuarios</h3>
	<div style="float:right; width:300px; margin: auto">
	
	</div>
	
</div>
<?php
	$tab = "
	<div id=\"docentes\" style=\"width:1024px; margin: auto;\">
	<table style=\"float:right\">
		<tr>
			<td>
				<form action=\"add-docente.php\">
					<button type=\"submit\" class=\"btn btn-primary\" style=\"float: right\">Agregar nuevo</button>
				</form>
			</td>
			<td>
				<form action=\"report-docentes-viw.php\" target=\"_blank\">
					<button type=\"submit\" class=\"btn btn-primary\" style=\"float: right\">Generar reporte</button>
				</form>
			</td>
		</tr>
	</table>
	<br><br>
	<table table style='width:100%; text-align:center;' class=\"table table-hover table-bordered\">
		<tr class=\"success\">
			<td>ID</td>
			<td>Nombre</td>
			<td>Usuario</td>
			<td>Telefono</td>
			<td>Direccion</td>
			<td>Actividades</td>
		</tr>
	";
	$query = mysql_query("SELECT * FROM docentes");
	while ($lis = mysql_fetch_array($query)) {
		$tab = $tab."
			<tr>
				<td>".$lis[0]."</td>
				<td>".$lis[1]."</td>
				<td>".$lis[2]."</td>
				<td>".$lis[4]."</td>
				<td>".$lis[3]."</td>
				<td>
				<a href=\"edit-docente.php?id=".$lis[0]."\">Modificar</a>
				<br>
				<a onclick=\"javascript:if(window.confirm('¿Desea eliminar el docente $lis[1]?'))
					{location.replace('$_SERVER[PHP_SELF]?action=elimin&id=$lis[0]')}\">Eliminar</a>
				</td>
			</tr>
		";
	}
	$tab = $tab."</table></div>";
	echo $tab;


	if(isset($_GET["action"])){
	 if($_GET["action"]== "elimin"){
	 	$doc= mysql_fetch_array(mysql_query("SELECT * FROM docentes WHERE id_docente='$_GET[id]'"));
	 	mysql_query("DELETE FROM docentes WHERE id_docente='$_GET[id]'");

	 	if($doc){
          echo "<script>location.href='docentes.php';</script>";
      }
      else
        {
          echo mysql_error();
        }
	 }
	}
?>
</body>
</html>
