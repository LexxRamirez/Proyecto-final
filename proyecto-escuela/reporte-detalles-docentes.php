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

<page backtop="30mm" backbottom="14mm" backleft="5mm" backright="10mm" style="font-size: 12pt" backimgx="center" backimgy="bottom" backimgw="100%">
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
            
            <td align=center style="width:100%; ">LISTA DE DOCENTES</td>
            </tr>
            <tr>
            <td align=center style="width:100%; ">FECHA DE IMPRESION: <?php echo date("d-m-Y H:i:s");?></td>
        </tr>
    </table>
     <br>
    <table align="center" cellspacing="1" style="width: 100%; border: solid 1px black; background: #A9A9A9; text-align: center; font-size: 11pt; color:#FFFFFF; font-family:helvetica,serif;">
        <tr>
            <th style="width: 5%">N°</th>
            <th style="width: 25%">Nombre</th>
            <th style="width: 25%">Usuario</th>   
            <th style="width: 25%">Telefono</th>          
            <th style="width: 25%">Direccion</th>
        </tr>
    </table>

    <?php
        include('conexion.php');
        $query=mysql_query("SELECT * FROM docentes ORDER BY id_docente");
        $i=1;
        while($row = mysql_fetch_array($query))
        {

    ?>
    <table border="0.5px" align="center" cellspacing="0"  style="width: 100%; border:none; text-align: center; font-size: 11pt; color:#000; font-family:helvetica,serif;">
    
        <tr>
            <td style="width:5%"><?php echo $i;?></td>
            <td style="width:25%"><?php echo utf8_decode($row['nombre']); ?></td>
            <td style="width:25%"><?php echo utf8_decode($row['usuario']); ?></td> 
            <td style="width:25%"><?php echo utf8_decode($row['telefono']); ?></td>
            <td style="width:25%"><?php echo utf8_decode($row['direccion']); ?></td>  
        </tr>
    </table>
    <?php
        $i++;
        }
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