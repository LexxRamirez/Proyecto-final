<style type="text/css">
<!--
    table.page_header {width: 100%;     border: none; background-color: #FFFFFF; text-align:right;font-family:helvetica,serif;}
    table.page_footer {width: 100%; border: none; background-color: #A9A9A9;  padding: 2mm;color:#FFFFFF; font-family:helvetica,serif; font-weight:bold;}
    div.note {border: solid 1mm #DDDDDD;background-color: #EEEEEE; padding: 2mm; border-radius: 2mm; width: 100%; }
    ul.main { width: 95%; list-style-type: square; }
    ul.main li { padding-bottom: 2mm; }
    h1 { text-align: center; font-size: 20mm}
    h3 { text-align:right; font-size: 14px; color:#000080}
    table { vertical-align: middle; }
    tr    { vertical-align: middle; }
    p {margin: 0px 5px 0px 5px;}
    span {margin: 5px;}
    img { border: 1px #000000;}  
-->

</style>

<page backtop="30mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt" backimgx="center" backimgy="bottom" backimgw="100%">
     <page_header>
        
        <table class="page_header" >
            <tr>
                <td style="width: 30%; color: #444444;">
                    <h2><label>Centro Escolar La Canoa</label></h2>
                </td>
            
            </tr>
        </table>
    </page_header>
    
    <?php
        function ED($fecha){
        $dia = substr($fecha,8,2);
        $mes = substr($fecha,5,2);
        $a = substr($fecha,0,4);
        $fecha = "$dia-$mes-$a";
        return $fecha;
        }
    ?>

    <table cellspacing="0" style="width: 90%; text-align: left;font-size: 14pt; font-family:Times,serif;">
        <tr>
            
            <td align=center style="width:100%; ">LISTA DE ALUMNOS</td>
            </tr>
            <tr>
            <td align=center style="width:100%; ">FECHA DE IMPRESION: <?php echo date("d-m-Y H:i:s");?></td>
        </tr>
    </table>
     <br>
    <?php
    include("conexion.php");
    $tabla = "<table align=\"center\" cellspacing=\"1\" border=\"1\"style=\"width:100%; margin: auto;\">
    
        <tr class=\"success\">
            <th rowspan=\"4\" style=\"width: 25px;\">
                <label>N°</label>
            </th>
            <th rowspan=\"4\" style=\"width: 250px;\">
                <label>Nombre de los/las alumnos/as</label>
            </th>
            <th colspan=\"4\">
                <label>Actividad1 (35%)</label>
            </th>
            <th colspan=\"4\">
                <label>Actividad2 (35%)</label>
            </th>
            <th colspan=\"4\">
                <label>Actividad3 (30%)</label>
            </th>
            <th colspan=\"1\" rowspan=\"4\" style=\"width: 55px;\">
                <label>Nota final</label>
            </th>
        </tr>
        <tr class=\"success\">
            <th colspan=\"3\">
                <label>Actividad integradora</label>
            </th>
            <th rowspan=\"3\">
                <label>Total</label>
            </th>
            <th colspan=\"3\">
                <label>Actividad Cotidiana</label>
            </th>
            <th rowspan=\"3\">
                <label>Total</label>
            </th>
            <th colspan=\"3\">
                <label>Actividad Examenes</label>
            </th>
            <th rowspan=\"3\">
                <label>Total</label>
            </th>
        </tr>
        <tr class=\"success\">
            <th style=\"width: 48px;\">
                <label>R1</label>
            </th>
            <th style=\width: 48px;\">
                <label>R2</label>
            </th>
            <th style=\"width: 48px;\">
                <label>R3</label>
            </th>
            <th style=\"width: 48px;\">
                <label>R1</label>
            </th>
            <th style=\"width: 48px;\">
                <label>R2</label>
            </th>
            <th style=\"width: 48px;\">
                <label>R3</label>
            </th>
            <th style=\"width: 48px;\">
                <label>R1</label>
            </th>
            <th style=\"width: 48px;\">
                <label>R2</label>
            </th>
            <th style=\"width: 48px;\">
                <label>R3</label>
            </th>
        </tr>
        <tr class=\"success\">
            <th style=\"width: 48px;\">
                <label>10%</label>
            </th>
            <th style=\width: 48px;\">
                <label>10%</label>
            </th>
            <th style=\"width: 48px;\">
                <label>15%</label>
            </th>
            <th style=\"width: 48px;\">
                <label>10%</label>
            </th>
            <th style=\"width: 48px;\">
                <label>10%</label>
            </th>
            <th style=\"width: 48px;\">
                <label>15%</label>
            </th>
            <th style=\"width: 48px;\">
                <label>10%</label>
            </th>
            <th style=\"width: 48px;\">
                <label>10%</label>
            </th>
            <th style=\"width: 48px;\">
                <label>10%</label>
            </th>
        </tr>
    ";
    $periodo1 = "0</td>
        <td style=\"width:30px;\">0</td>
        <td style=\"width:30px;\">0</td>
        <td style=\"width:42px;\">0";
    $periodo2 = "0</td>
        <td style=\"width:30px;\">0</td>
        <td style=\"width:30px;\">0</td>
        <td style=\"width:42px;\">0";
    $periodo3 = "0</td>
        <td style=\"width:30px;\">0</td>
        <td style=\"width:30px;\">0</td>
        <td style=\"width:42px;\">0";
    $p1= 0;
    $p2= 0;
    $p3= 0;
    if($_POST["materia"] != "" && $_POST["grado"]!="")
    {
        $q = $_POST["grado"];
        $s = $_POST["materia"];
        $query=mysql_query("SELECT alumnos.id_alumno, alumnos.nombre, notas.periodo1, notas.periodo2, notas.periodo3, materia.id_materia, materia.materia, grado.id_grado, grado.nombre_grado FROM alumnos, notas, materia, grado WHERE alumnos.id_alumno=notas.id_alumno AND materia.id_materia=notas.id_materia AND grado.id_grado=notas.id_grado AND notas.id_grado = '$q' AND notas.id_materia='$s'");
    
        }
    else if($_POST["grado"] != "")
    {
        $q = $_POST["grado"];
        $query=mysql_query("SELECT alumnos.id_alumno, alumnos.nombre, notas.periodo1, notas.periodo2, notas.periodo3, materia.id_materia, materia.materia, grado.id_grado, grado.nombre_grado FROM alumnos, notas, materia, grado WHERE alumnos.id_alumno=notas.id_alumno AND materia.id_materia=notas.id_materia AND grado.id_grado=notas.id_grado AND notas.id_grado = '$q'");
        }   
    else if($_POST["materio"] != "")
    {
        $s = $_POST["materia"];
        $query=mysql_query("SELECT alumnos.id_alumno, alumnos.nombre, notas.periodo1, notas.periodo2, notas.periodo3, materia.id_materia, materia.materia, grado.id_grado, grado.nombre_grado FROM alumnos, notas, materia, grado WHERE alumnos.id_alumno=notas.id_alumno AND materia.id_materia=notas.id_materia AND grado.id_grado=notas.id_grado AND notas.id_materia = '$s'");  
        }   
    else
    {
        $query=mysql_query("SELECT alumnos.id_alumno, alumnos.nombre, notas.periodo1, notas.periodo2, notas.periodo3, materia.id_materia, materia.materia, grado.id_grado, grado.nombre_grado FROM alumnos, notas, materia, grado WHERE alumnos.id_alumno=notas.id_alumno AND materia.id_materia=notas.id_materia AND grado.id_grado=notas.id_grado");      
        }   
    while($row = mysql_fetch_array($query))
        {   
            $n1 = 0;
            $n2 = 0;
            $n3 = 0;
            if($row["periodo1"] != "")
            {
                $p1 = explode("-", $row["periodo1"]);
                $periodo1 = $p1[0]."</td>
                    <td style=\"width:30px;\">".$p1[1]."</td>
                    <td style=\"width:30px;\">".$p1[2]."</td>
                    <td style=\"width:42px;\">".$p1[3];
                $n1 = $p1[3];
            }
            if($row["periodo2"] != "")
            {
                $p2 = explode("-", $row["periodo2"]);
                $periodo2 = $p2[0]."</td>
                    <td style=\"width:30px;\">".$p2[1]."</td>
                    <td style=\"width:30px;\">".$p2[2]."</td>
                    <td style=\"width:42px;\">".$p2[3];
                $n2 = $p2[3];
            }
            if($row["periodo2"] != "")
            {
                $p3 = explode("-", $row["periodo3"]);
                $periodo3 = $p3[0]."</td>
                    <td style=\"width:30px;\">".$p3[1]."</td>
                    <td style=\"width:30px;\">".$p3[2]."</td>
                    <td style=\"width:42px;\">".$p3[3];
                $n3 = $p3[3];
            }
            
        $nota_final = $n1+$n2+$n3;
        $tabla = $tabla."
        
        <tr>
            <td style=\"width:23px;\">".$row[0]."</td>
            <td style=\"width:174px;\">".$row[1]."</td>
            <td style=\"width:30px;\">".$periodo1."</td>
            <td style=\"width:30px;\">".$periodo2."</td>
            <td style=\"width:30px;\">".$periodo3."</td>
            <td style=\"width:45px;\">".$nota_final."</td>
        </tr>";     
        $periodo1 = "0</td>
            <td style=\"width:30px;\">0</td>
            <td style=\"width:30px;\">0</td>
            <td style=\"width:42px;\">0";
        $periodo2 = "0</td>
            <td style=\"width:30px;\">0</td>
            <td style=\"width:30px;\">0</td>
            <td style=\"width:42px;\">0";
        $periodo3 = "0</td>
            <td style=\"width:30px;\">0</td>
            <td style=\"width:30px;\">0</td>
            <td style=\"width:42px;\">0";
        $p1= 0;
        $p2= 0;
        $p3= 0;
        }
    $tabla= $tabla."</table>";  
    echo $tabla;
?>

    <page_footer>    
        <table class="page_footer">
        
            <tr>
                <td style="width: 40%; text-align: left;">
                    Centro Escolar La Canoa
                </td>
                <td style="width: 30%; text-align: center">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 30%; text-align: right;">
                   ..::CE
                </td>
            </tr>
        </table>
    </page_footer>
</page>