<?php
    require("conexion.php");
    $id = $_GET["id"];
    $id_eco = $_GET["id_ec"];
    $dt = mysql_fetch_array(mysql_query("SELECT * FROM otros_datos WHERE id_datos = $id"));
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
                <option value="si"  <?php if($dt["repite"] == "si"){ echo "selected";}?>>Si</option>
                <option value="no" <?php if($dt["repite"] == "no"){ echo "selected";}?>>No</option>
               </select> 
            </td>
            <td>
                <label>Estudio parbularia:</label>
            </td>
            <td style=" width:200px">
               <select name="parbularia" class="form-control">
                <option value="">Seleccione</option>
                <option value="si" <?php if($dt["parbularia"] == "si"){ echo "selected";}?>>Si</option>
                <option value="no" <?php if($dt["parbularia"] == "no"){ echo "selected";}?>>No</option>
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
                <option value="si" <?php if($dt["sobredad"] == "si"){ echo "selected";}?>>Si</option>
                <option value="no" <?php if($dt["sobredad"] == "no"){ echo "selected";}?>>No</option>
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
                <input type="text" name="trabajo" size="100%" class="form-control" <?php echo "value='$dt[trabajo]'";?>>
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
                <option value="mama" <?php if($dt["vive"] == "mama"){ echo "selected";}?>>Mamá</option>
                <option value="papa" <?php if($dt["vive"] == "papa"){ echo "selected";}?>>Papá</option>
                <option value="papa y mama" <?php if($dt["vive"] == "papa y mama"){ echo "selected";}?>>Papá y mamá</option>
                <option value="familiar" <?php if($dt["vive"] == "familiar"){ echo "selected";}?>>Familiar</option>
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
                <input type="text" name="enfermedad" class="form-control" size="100%" <?php echo "value='$dt[enfermedad]'";?>>
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
                <option value="si" <?php if($dt["vacunas"] == "si"){ echo "selected";}?>>Si</option>
                <option value="no" <?php if($dt["vacunas"] == "no"){ echo "selected";}?>>No</option>
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
                <input type="text" name="encargado" class="form-control" size="100%" <?php echo "value='$dt[encargado]'";?>>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td width="200px">
                <label>DUI:</label>
            </td>
            <td>
                <input type="text" name="dui" size="36px;" class="form-control" <?php echo "value='$dt[dui]'";?>>
            </td>
        </tr>
        <tr>
            <td>
                <label>Tel de casa:</label>
            </td>
            <td>
                <input type="text" name="Tcasa" size="36px" class="form-control" <?php echo "value='$dt[tel_casa]'";?>>
            </td>
        </tr>
        <tr>
            <td>
                <label>Tel de celular:</label>
            </td>
            <td>
                <input type="text" name="Tcel" size="36px" class="form-control" <?php echo "value='$dt[tel_cel]'";?>>
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
    $query=mysql_query("UPDATE otros_datos SET repite = '$_POST[repite]', parbularia = '$_POST[parbularia]',
    sobredad =' $_POST[sobre_edad]', trabajo = '$_POST[trabajo]', vive = '$_POST[vive]' , enfermedad = '$_POST[enfermedad]',
    vacunas = '$_POST[vacunas]', encargado = '$_POST[encargado]', dui = '$_POST[dui]', tel_casa = '$_POST[Tcasa]', 
    tel_cel = '$_POST[Tcel]'");
     if($query)
     {
         echo"<script>location.replace('registro-2_ed.php?id_eco=$id_eco');</script>";
     }
         else
        {
            echo mysql_error();
         }
}
?>
