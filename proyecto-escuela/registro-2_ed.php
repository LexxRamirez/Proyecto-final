<?php
    require("conexion.php");
    $id_eco = $_GET["id_eco"];
    $dt = mysql_fetch_array(mysql_query("SELECT * FROM situacion_economica WHERE id_eco = $id_eco"));

?>
<!DOCTYPE html>
<html leng="utf-8">
<head>
<title>..::CE</title>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
</head>
<body>
<br>
<div id="mainwrap">	
    <div id="contenedor-sup" style="width:900px; margin: auto;">
    <h4 style="text-align:center">SITUACION SOCIOECONOMICA</h4>
    <form method="POST">
        <table>
            <tr>
                <td width="200px">
                    <label>INGRESO FAMILIAR:</label>
                </td>
                <td style=" width:225px">
                    <select name="ingreso" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="padre" <?php if($dt["ingreso"] == "padre"){ echo "selected";}?>>Padre</option>
                        <option value="madre" <?php if($dt["ingreso"] == "madre"){ echo "selected";}?>>Madre</option>
                    </select> 
                </td>
                <td>
                    <label>OTROS:</label></td>
                <td>
                    <input type="text" name="otr" class="form-control" size="40px">
                </td>
            </tr>
            <tr>
                <td>
                    <label>VIVIENDA:</label>
                </td>
                <td style=" width:225px">
                    <select name="vivienda" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="propia" <?php if($dt["vivienda"] == "propia"){ echo "selected";}?>>Propia</option>
                        <option value="alquilada" <?php if($dt["vivienda"] == "alquilada"){ echo "selected";}?>>Alquilada</option>
                    </select> 
                </td>
                <td>
                    <label>TIPO DE VIVIENDA:</label></td>
                <td>
                    <input type="text" name="vivi" class="form-control" <?php echo "value='$dt[vivienda]'";?>>
                </td>
            </tr>
        </table>
    </fieldset>
    <h4 style="text-align:center">DATOS PERSONALES DEL NIÑO Y GRUPO FAMILIAR</h4>
    <fieldset>
        <table>
            <tr>
                <td width="200px">
                    <label>Embarazo:</label>
                </td>
                <td style=" width:225px">
                    <select name="embarazo" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="Normal" <?php if($dt["embarazo"] == "Normal"){ echo "selected";}?>>Normal</option>
                        <option value="Anormal" <?php if($dt["embarazo"] == "Anormal"){ echo "selected";}?>>Anormal</option>
                    </select> 
                </td>
                <td width="100px">
                    <label>Parto:</label>
                </td>
                <td style=" width:225px">
                    <select name="parto" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="Normal" <?php if($dt["parto"] == "Normal"){ echo "selected";}?>>Normal</option>
                        <option value="Anormal" <?php if($dt["parto"] == "Anormal"){ echo "selected";}?>>Anormal</option>
                    </select> 
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td width="200px">
                    <label>N. de la madre:</label>
                </td>
                <td>
                    <input type="text" name="nmadre" class="form-control" size="36px" <?php echo "value='$dt[Nmadre]'";?>>
                </td>
                <td>
                    <label>Edad:</label>
                </td>
                <td>
                    <input type="text" name="Medad" class="form-control" size="37px" <?php echo "value='$dt[edadM]'";?>>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td width="200px">
                    <label>Sabe:</label>
                </td>
                <td style=" width:225px">
                    <select name="m_sabe" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="leer" <?php if($dt["sabeM"] == "leer"){ echo "selected";}?>>Leer</option>
                        <option value="escribir" <?php if($dt["sabeM"] == "escribir"){ echo "selected";}?>>Escribir</option>
                        <option value="leer y escribir" <?php if($dt["sabeM"] == "leer y escribir"){ echo "selected";}?>>Leer y Escribir</option>
                    </select> 
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td width="200px">
                    <label>N. del padre:</label>
                </td>
                <td>
                    <input type="text" name="npadre" class="form-control" size="36px" <?php echo "value ='$dt[Npadre]'";?>>
                </td>
                <td>
                    <label>Edad:</label>
                </td>
                <td>
                    <input type="text" name="Pedad" class="form-control" size="37px" <?php echo "value ='$dt[edadP]'";?>>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td width="200px">
                    <label>Sabe:</label>
                </td>
                <td style=" width:225px">
                   <select name="p_sabe" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="leer" <?php if($dt["sabeP"] == "leer"){ echo "selected";}?>>Leer</option>
                        <option value="escribir" <?php if($dt["sabeP"] == "escribir"){ echo "selected";}?>>Escribir</option>
                        <option value="leer y escribir" <?php if($dt["sabeP"] == "leer y escribir"){ echo "selected";}?>>Leer y Escribir</option>
                    </select> 
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td width="200px">
                    <label>N° de hermanos:</label>
                </td>
                <td>
                    <input type="text" name="Nhnos" size="36px" class="form-control" <?php echo "value ='$dt[Nhermanos]'";?>>
                </td>
                <td>
                    <label>N° de hermanas:</label>
                </td>
                <td>
                    <input type="text" name="Nhnas" size="37px" class="form-control" <?php echo "value ='$dt[Nhermanas]'";?>>
                </td>
            </tr>
        </table>
        <h4 style="text-align:center">COMPORTAMIENTO DEL NIÑO</h4>
        <table style="margin:auto;">
            <tr>
                <td width="100px">
                    <input type="checkbox" name="ch1" <?php 
                    if (strpos($dt["comportamiento"], 'Inquieto')) {
					    echo 'checked';
					}
                    ?>>
                    <label>Inquieto</label>
                </td>
                <td width="100px">
                    <input type="checkbox" name="ch2" <?php 
                    if (strpos($dt["comportamiento"], 'Timido')) {
					    echo 'checked';
					}
                    ?>>
                    <label>Timido</label>
                </td>
                <td width="120px">
                    <input type="checkbox" name="ch3" <?php 
                    if (strpos($dt["comportamiento"], 'Cooperativo')) {
					    echo 'checked';
					}
                    ?>>
                    <label>Cooperativo</label>
                </td>
                <td width="120px">
                    <input type="checkbox" name="ch4" <?php 
                    if (strpos($dt["comportamiento"], 'Respetuoso')) {
					    echo 'checked';
					}
                    ?>>
                    <label>Respetuoso</label>
                </td>
                <td width="120px">
                    <input type="checkbox" name="ch5" <?php 
                    if (strpos($dt["comportamiento"], 'Responsable')) {
					    echo 'checked';
					}
                    ?>>
                    <label>Responsable</label>
                </td>
                <td width="100px">
                    <input type="checkbox" name="ch6" <?php 
                    if (strpos($dt["comportamiento"], 'Creativo')) {
					    echo 'checked';
					}
                    ?>>
                    <label>Creativo</label>
                </td>
                <td width="100px">
                    <input type="checkbox" name="ch7" <?php 
                    if (strpos($dt["comportamiento"], 'Ordenado')) {
					    echo 'checked';
					}
                    ?>>
                    <label>Ordenado</label>
                </td>
            </tr>
        </table>
    </fieldset>
    <h4 style="text-align:center">DOCUMENTO QUE PRESENTO</h4>
    <table style="margin:auto">
        <tr>
            <td width="150px">
                <input type="checkbox" name="c1" <?php 
                    if (strpos($dt["documentos"], 'Copia de Partida')) {
					    echo 'checked';
					}
                    ?>>
                <label>Copia de partida</label>  
            </td>
            <td width="200px">
                <input type="checkbox" name="c2" <?php 
                    if (strpos($dt["documentos"], 'Certificado Original')) {
					    echo 'checked';
					}
                    ?>>
                <label>Certificado Original</label>
            </td>
            <td width="100px">
                <input type="checkbox" name="c3" <?php 
                    if (strpos($dt["documentos"], 'DUI')) {
					    echo 'checked';
					}
                    ?>>
                <label>DUI</label>
            </td>
            <td width="px">
                <input type="checkbox" name="c4" <?php 
                    if (strpos($dt["documentos"], 'Constancia de Conducta')) {
					    echo 'checked';
					}
                    ?>>
                <label>Constancia de conducta</label>
            </td>
        </tr>
    </table>

    <button class="btn btn-primary">Guardar</button>
	</form>
    </div>
    <br>
        </div>
    </div>
</div>
</body>
</html>
<?php
if($_POST)
{
	$comp = "";
	$doc = "";
	if($_POST["ch1"] == "on")
	{
		$comp = $comp ." Inquieto ,";
		}
	if($_POST["ch2"] == "on")
	{
		$comp = $comp ." Timido ,";
		}
	if($_POST["ch3"] == "on")
	{
		$comp = $comp ." Cooperativo ,";
		}
	if($_POST["ch4"] == "on")
	{
		$comp = $comp ."Respetuoso ,";
		}
	if($_POST["ch5"] == "on")
	{
		$comp = $comp ." Responsable ,";
		}	
	if($_POST["ch6"] == "on")
	{
		$comp = $comp ." Creativo ,";
		}
	if($_POST["ch7"] == "on")
	{
		$comp = $comp ." Ordenado ,";
		}
		
	$comp = $comp." Fin";	
		
	if($_POST["c1"] == "on")
	{
		$doc = $doc ." Copia de Partida ,";
		}
	if($_POST["c2"] == "on")
	{
		$doc = $doc ." Certificado Original ,";
		}
	if($_POST["c3"] == "on")
	{
		$doc = $doc ." DUI ,";
		}
	if($_POST["c4"] == "on")
	{
		$doc = $doc ." Constancia de Conducta ,";
	}		
	$doc = $doc." Fin";	
	$query = mysql_query("UPDATE situacion_economica SET ingreso='$_POST[ingreso]', vivienda='$_POST[vivienda]',
	embarazo='$_POST[embarazo]', parto='$_POST[parto]', Nmadre='$_POST[nmadre]', edadM='$_POST[Medad]', sabeM='$_POST[m_sabe]',
	Npadre='$_POST[npadre]', edadP='$_POST[Pedad]', Psabe='$_POST[p_sabe]', Nhermanos='$_POST[Nhnos]', Nhermanas='$_POST[Nhnas]',
	comportamiento='$comp',	documentos='$doc' WHERE id_eco = $id_eco");
	if($query)
	{http://localhost/lexx/proyecto-escuela/registro-2_ed.php?id_eco=10
		echo"<script>location.replace('notas.php');</script>";
		}
	}
?>
