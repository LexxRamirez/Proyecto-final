<?php
include("conexion.php");
if(isset($_GET["id"]))
{
$id=$_GET["id"];
}
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
                        <option value="padre">Padre</option>
                        <option value="madre">Madre</option>
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
                        <option value="propia">Propia</option>
                        <option value="alquilada">Alquilada</option>
                    </select> 
                </td>
                <td>
                    <label>TIPO DE VIVIENDA:</label></td>
                <td>
                    <input type="text" name="vivi" class="form-control">
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
                        <option value="Normal">Normal</option>
                        <option value="Anormal">Anormal</option>
                    </select> 
                </td>
                <td width="100px">
                    <label>Parto:</label>
                </td>
                <td style=" width:225px">
                    <select name="parto" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="Normal">Normal</option>
                        <option value="Anormal">Anormal</option>
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
                    <input type="text" name="nmadre" class="form-control" size="36px">
                </td>
                <td>
                    <label>Edad:</label>
                </td>
                <td>
                    <input type="text" name="Medad" class="form-control" size="37px">
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
                        <option value="leer">Leer</option>
                        <option value="escribir">Escribir</option>
                        <option value="leer y escribir">Leer y Escribir</option>
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
                    <input type="text" name="npadre" class="form-control" size="36px">
                </td>
                <td>
                    <label>Edad:</label>
                </td>
                <td>
                    <input type="text" name="Pedad" class="form-control" size="37px">
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
                        <option value="leer">Leer</option>
                        <option value="escribir">Escribir</option>
                        <option value="leer y escribir">Leer y Escribir</option>
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
                    <input type="text" name="Nhnos" size="36px" class="form-control">
                </td>
                <td>
                    <label>N° de hermanas:</label>
                </td>
                <td>
                    <input type="text" name="Nhnas" size="37px" class="form-control">
                </td>
            </tr>
        </table>
        <h4 style="text-align:center">COMPORTAMIENTO DEL NIÑO</h4>
        <table style="margin:auto;">
            <tr>
                <td width="100px">
                    <input type="checkbox" name="ch1">
                    <label>Inquieto</label>
                </td>
                <td width="100px">
                    <input type="checkbox" name="ch2">
                    <label>Timido</label>
                </td>
                <td width="120px">
                    <input type="checkbox" name="ch3">
                    <label>Cooperativo</label>
                </td>
                <td width="120px">
                    <input type="checkbox" name="ch4">
                    <label>Respetuoso</label>
                </td>
                <td width="120px">
                    <input type="checkbox" name="ch5">
                    <label>Responsable</label>
                </td>
                <td width="100px">
                    <input type="checkbox" name="ch6">
                    <label>Creativo</label>
                </td>
                <td width="100px">
                    <input type="checkbox" name="ch7">
                    <label>Ordenado</label>
                </td>
            </tr>
        </table>
    </fieldset>
    <h4 style="text-align:center">DOCUMENTO QUE PRESENTO</h4>
    <table style="margin:auto">
        <tr>
            <td width="150px">
                <input type="checkbox" name="c1">
                <label>Copia de partida</label>  
            </td>
            <td width="200px">
                <input type="checkbox" name="c2">
                <label>Certificado Original</label>
            </td>
            <td width="100px">
                <input type="checkbox" name="c3">
                <label>DUI</label>
            </td>
            <td width="px">
                <input type="checkbox" name="c4">
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
		
	$query=mysql_query("INSERT INTO situacion_economica(id_eco, ingreso, vivienda, embarazo, parto, Nmadre, edadM, sabeM, Npadre, 
	edadP, Psabe, Nhermanos, Nhermanas, comportamiento, documentos) VALUES 
	(null, '$_POST[ingreso]', '$_POST[vivienda]', '$_POST[embarazo]', '$_POST[parto]', '$_POST[nmadre]', '$_POST[Medad]',
	'$_POST[m_sabe]', '$_POST[npadre]', '$_POST[Pedad]', '$_POST[p_sabe]', '$_POST[Nhnos]', '$_POST[Nhnas]', '$comp', '$doc')
	");
	if($query)
	{
		echo"<script>location.replace('replace.php?ac=u1&id=$id');</script>";
		}
	}
?>
