<?php
    include ("conexion.php");
    include ("part-principal-ma.php");  
    $id=$_GET["id"];
    $query = mysql_fetch_array(mysql_query("SELECT * FROM docentes WHERE id_docente=$id"));
    include("menu-all.php");
?>
  <script>
         $(document).ready(function() {
         $('select').material_select();
      });
    </script>

    <div style="width:500px; margin:auto">
    <form align="center" class="col s12" method="POST">
      <h3 align="center">Editar docente</h3>
      <br>
     <div class="row">
      <div class="input-field col s12">
        <input name="nombre" id="nombre" type="text" class="validate" <?php echo "value='$query[nombre]'";?>>
        <label  for="first_name2">Nombre:</label> 
      </div>
      <div class="input-field col s12">
        <input name="direccion" id="direccion" size="50px" type="text" class="validate"<?php echo "value='$query[direccion]'";?>> 
        <label class="active" for="first_name">Dirección:</label> 
      </div>
      <div class="input-field col s12">
        <input name="telefono" id="telefono" size="50px" type="text" class="validate" <?php echo "value='$query[telefono]'";?>> 
        <label class="active" for="first_name">Telefono:</label> 
      </div>
      <div class="input-field col s12">
        <input name="dui" id="dui" type="text" class="validate" <?php echo "value='$query[dui]'";?>> 
        <label class="active" for="last_name">DUI:</label> 
      </div>
      <div class="input-field col s6">
        <input name="user" id="user" type="text" class="validate" <?php echo "value='$query[usuario]'";?>> 
        <label for="first_name2">Usuario:</label> 
      </div>
      <div class="row">
      <div class="input-field col s6">
        <input name="password" type="password" type="text" class="validate"> 
        <label class="active" for="password">Contraseña:</label> 
      </div>
      </div>
      <div class="row">
          <label>Grado:</label>
            <select name="grado" id="grado">
              <option value="" disabled selected>Seleccione</option>
                <?php
                    $query=mysql_query("SELECT * FROM grado");
                    while($row=mysql_fetch_array($query))
                    {
                      echo "<option value='".$row[0]."'>".$row[1]."</option> ";
                      }
                  ?>
            </select>               
      </div>
      <button class="waves-effect waves-light btn">Guardar</button>
      </div>
    </form>
    </div>

    
  </body>
</html>
<?php
    if($_POST){
      $nombre=$_POST["nombre"];
      $user=$_POST["user"];
      $direc=$_POST["direccion"];
      $tel=$_POST["telefono"];
      $dui=$_POST["dui"];
      $grado=$_POST["grado"];
      $pass=MD5($_POST["password"]);
      $docentes = mysql_query("UPDATE docentes SET nombre='$nombre',usuario='$user',direccion='$direc',telefono='$tel',dui='$dui',clave='$pass',id_grado='$grado' WHERE id_docente='$id'");
      if($docentes){
          echo "<script>location.href='docentes.php';</script>";
      }
      else
        {
          echo mysql_error();
        }
      }
?>