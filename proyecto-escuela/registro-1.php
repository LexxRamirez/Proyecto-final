<?php
include("conexion.php");
if(isset($_GET["nie"]))
{
	$nie = $_GET["nie"];
	$i = mysql_fetch_array(mysql_query("SELECT * FROM alumnos WHERE nie = '$nie'"));
	$id = $i[0];
	}
	echo $id;
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
	<h5><label>Municipio en el que estudia actualmente: <u><i>San Miguel</i></u></label></h5>
    <h5><label>Codigo: 1217</label></h5>
    <form method="POST">
    <table>	
        <tr>
            <td style=" width:200px">
                <label>Repite grado:</label>
            </td>
            <td style=" width:200px">
               <select name="repite" class="form-control">
                <option value="">Seleccione</option>
                <option value="si">Si</option>
                <option value="no">No</option>
               </select> 
            </td>
            <td>
                <label>Estudio parvularia:</label>
            </td>
            <td style=" width:200px">
               <select name="parbularia" class="form-control">
                <option value="">Seleccione</option>
                <option value="si">Si</option>
                <option value="no">No</option>
               </select> 
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style=" width:200px">
                <label>Tiene sobre edad:</label>
            </td>
            <td style=" width:200px">
               <select name="sobre_edad" class="form-control">
                <option value="">Seleccione</option>
                <option value="si">Si</option>
                <option value="no">No</option>
               </select> 
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td width="200pxs">
                <label>Tipo de trabajo que realiza:</label>
            </td>
            <td>
                <input type="text" name="trabajo" size="100%" class="form-control">
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td width="200px">
                <label>Vive con:</label>
            </td>
           
            <td style=" width:200px">
               <select name="vive" class="form-control">
                <option value="">Seleccione</option>
                <option value="mama">Mamá</option>
                <option value="papa">Papá</option>
                <option value="papa y mama">Papá y mamá</option>
                <option value="familiar">Familiar</option>
               </select> 
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td width="200px">
                <label>Tipo de enfermedad:</label>
            </td>
            <td>
                <input type="text" name="enfermedad" class="form-control" size="100%">
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td width="200px;">
                <label>Vacunas completas:</label>
            </td>
            <td style=" width:200px">
               <select name="vacunas" class="form-control">
                <option value="">Seleccione</option>
                <option value="si">Si</option>
                <option value="no">No</option>
               </select> 
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td width="200px">
                <label>Nombre del padre o encargado:</label>
                
            </td>
            <td>
                <input type="text" name="encargado" class="form-control" size="100%">
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td width="200px">
                <label>DUI:</label>
            </td>
            <td>
                <input type="text" name="dui" size="36px;" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                <label>Tel de casa:</label>
            </td>
            <td>
                <input type="text" name="Tcasa" size="36px" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                <label>Tel de celular:</label>
            </td>
            <td>
                <input type="text" name="Tcel" size="36px" class="form-control">
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
	$query=mysql_query("INSERT INTO otros_datos(id_datos, repite, parbularia, sobredad, trabajo, vive, enfermedad, vacunas, 
	encargado, dui, tel_casa, tel_cel) VALUES (null,'$_POST[repite]', '$_POST[parbularia]', '$_POST[sobre_edad]', '$_POST[trabajo]',
	 '$_POST[vive]', '$_POST[enfermedad]', '$_POST[vacunas]', '$_POST[encargado]', '$_POST[dui]', '$_POST[Tcasa]', '$_POST[Tcel]') 
	 ");
	 if($query)
	 {
		echo"<script>location.replace('replace.php?ac=i&dui=$_POST[dui]&id=$id');</script>";
	 }
		 else
		{
			echo mysql_error();
		 }
}
?>
