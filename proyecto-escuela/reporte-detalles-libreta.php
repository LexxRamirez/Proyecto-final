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
<?php
    include("conexion.php");
    $notas=mysql_query("SELECT materia.materia, notas.periodo1, notas.periodo2, notas.periodo3 FROM materia, notas WHERE  materia.id_materia = notas.id_materia AND notas.id_alumno = '$_GET[id]'");
    $nombre = mysql_fetch_array(mysql_query("SELECT nombre FROM alumnos WHERE id_alumno = '$_GET[id]'"));
?>
<page backtop="30mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt" backimgx="center" backimgy="bottom" backimgw="100%">
     <page_header>
        
        <table class="page_header" >
            <tr>
                <td style="width: 50%; color: #444444;">
                    <h2><label>CENTRO ESCOLAR CÁNTON LA CANOA</label></h2>
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
            <td align=center style="width:100%; ">LIBRETA DE NOTAS</td>
        </tr>
        <tr>
            <td align=center style="width:100%;"><?php echo $nombre[0];?></td>
        </tr>
            <tr>
            <td align=center style="width:100%; ">FECHA DE IMPRESION: <?php echo date("d-m-Y H:i:s");?></td>
        </tr>
        
    </table>
     <br>
    <table <table align="center" cellspacing="1" border="1"style="width:100%; margin: auto;">
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
            <td colspan="1" rowspan="4" style="width: 70px;">
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
        <?php
        include("conexion.php");
        $notas=mysql_query("SELECT materia.materia, notas.periodo1, notas.periodo2, notas.periodo3 FROM materia, notas WHERE  materia.id_materia = notas.id_materia AND notas.id_alumno = '$_GET[id]'");
        
        while($dato = mysql_fetch_array($notas))
        {
            $p1 = explode("-" ,$dato["periodo1"]);
            $p2 = explode("-" ,$dato["periodo2"]);
            $p3 = explode("-" ,$dato["periodo3"]);
            $nf = $p1[3]+$p2[3]+$p3[3];
            echo "
            <tr>
                <td>$dato[materia]</td>
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
        </table>

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