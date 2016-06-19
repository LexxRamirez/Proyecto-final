<?php
    require("conexion.php");
    include("part-prin-boost.php");
    $id = $_GET["id"];
    $dt = mysql_fetch_array(mysql_query("SELECT * FROM alumnos WHERE id_alumno = $id"));
?>
<div id="mainwrap">	
    <div id="contenedor-sup" style="width:900px; margin: auto;">
    <h3>FICHA DE MATRICULA</h3>
    <h5><label>Centro Escolar Canton "La Canoa". Codigo: 13072 Distrito: 12-05</label></h5>
    <form method="POST">
    <table >
        <tr>
            <td width="200px">
                <label>Año:</label>
            </td>
            <td>
                <input type="text" name="anho" class="form-control" size="100%" <?php echo "value='$dt[anho]'";?>>
            </td>
        </tr>
        <tr>
            <td>
                <label>Grado: </label>
            </td>
            <td>
                <select name="grado" onchange="llenar()" id="grado" class="form-control">
                    <option value="">Seleccione</option>
                    <?php
                    $query=mysql_query("SELECT * FROM grado");
                    while($row=mysql_fetch_array($query))
                    {
                        echo "<option value='".$row[0]."'";
                        if($dt["id_grado"] == $row[0]){ echo "selected";}
                        echo ">".$row[1]."</option> ";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label>Matricula numero:</label>
            </td>
            <td>
                <input type="text" name="matriculaN" class="form-control" <?php echo "value='$dt[matricula]'";?>>
            </td>
        </tr>
        <tr>
            <td>
                <label>Nombre del alumno(a):</label>
            </td>
            <td>
                <input type="text" name="nombre" class="form-control" <?php echo "value='$dt[nombre]'";?>>
            </td>
        </tr>
        <tr>
            <td>
                <label>NIE</label>
            </td>
            <td>
                <input type="text" name="nie" class="form-control" <?php echo "value='$dt[nie]'";?>>
            </td>
        </tr>
        <tr>
            <td width="200px">
                <label>Fecha de nacimiento:</label>
            </td>
            <td>
                <input type="text" name="fecha" class="form-control" size="36px" <?php echo "value='$dt[fecha_nacimiento]'";?>>
            </td>
         </tr>
         <tr>
            <td>
                <label>Edad:</label>
            </td>
            <td>
                <input type="text" name="edad" class="form-control" size="37px" <?php echo "value='$dt[edad]'";?>>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td>
                <label>Año en el que estudio el ultimo grado:</label>
            </td>
            <td>
                <input type="text" name="ultimo" size="12px" class="form-control" <?php echo "value='$dt[anho_ultimo_grado]'";?>>
            </td>
            <td style=" width:200px">
                <label>Lugar de residencia:</label>
            </td>
            <td style=" width:200px">
               <select name="residencia" class="form-control">
                <option value="">Seleccione</option>
                <option value="rural" <?php if($dt["recidencia"] == "rural"){ echo "selected";}?>>Rural</option>
                <option value="urbana" <?php if($dt["recidencia"] == "urbana"){ echo "selected";}?>>Urbana</option>
               </select> 
            </td>
        </tr>
            
        </tr>
        <tr>
            <td style="width:200px">
                <label >Municipio en el que esudio el ultimo año:</label>
            </td>
            <td>
                <input type="text" name="muniultimo" class="form-control" size="40px" <?php echo "value='$dt[minicipio_ultimo_grado]'";?>>
            </td>
            <td>
                <label>Codigo:</label>
            </td>
            <td>
                <input type="text" name="codigo" class="form-control" size="40px" <?php echo "value='$dt[codigo]'";?>>
            </td>
        </tr>
        <tr>
            <td>
                <label>Tipo de discapacidad:</label>
            </td>
            <td>
                <input type="text" name="discapacidad" class="form-control" size="40px" <?php echo "value='$dt[discapacidad]'";?>>
            </td>
            <td>
                <label>Tipo de educacion especial:</label>
            </td>
            <td>
                <input type="text" name="eduEspecial" class="form-control" size="40px" <?php echo "value='$dt[estudio_especial]'";?>>
            </td>
        </tr>
        <tr><td><br></td></tr>
        
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
    $query = mysql_query("UPDATE alumnos SET  anho = '$_POST[anho]', matricula = '$_POST[matriculaN]',
    nombre = '$_POST[nombre]', nie = '$_POST[nie]', anho_ultimo_grado = '$_POST[ultimo]',
    minicipio_ultimo_grado = '$_POST[muniultimo]', codigo = '$_POST[codigo]', discapacidad = '$_POST[discapacidad]',
    estudio_especial = '$_POST[eduEspecial]', recidencia = '$_POST[residencia]', fecha_nacimiento = '$_POST[fecha]',
    edad = '$_POST[edad]', id_grado = '$_POST[grado]' WHERE id_alumno = $id");
     if($query)
     {
         echo"<script>location.replace('registro-1_ed.php?id=$dt[id_datos]&id_ec=$dt[id_eco]');</script>";
         }
         else
        {
            echo mysql_error();
         }
}
?>
