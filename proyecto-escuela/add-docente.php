<?php
    include ("sesion.php");
    include ("conexion.php");
    include ("part-principal-ma.php");  
  ?>

    <?php
        if($_POST){
          $nombre=$_POST["nombre"];
          $user=$_POST["user"];
          $direc=$_POST["direccion"];
          $tel=$_POST["telefono"];
          $dui=$_POST["dui"];
          $grado=$_POST["grado"];
          $pass=MD5($_POST["password"]);
          $query = mysql_query("INSERT INTO docentes (id_docente, nombre, usuario, direccion, telefono, dui, clave, id_grado) 
            VALUES(NULL,'$nombre','$user','$direc','$tel','$dui','$pass','$grado')");

          echo "<script>alert('Datos ingresados')</script>";
          echo "<script>location.href='docentes.php';</script>";
        }else{
            echo mysql_error();
        }

        include("menu-all.php");
    ?>
    <script>
         $(document).ready(function() {
         $('select').material_select();
      });
    </script>
    <div style="width:500px; margin:auto">
    <form align="center" class="col s12" method="POST">
      <h3 align="center">Registro de Docente</h3>
      <br>
     <div class="row">
      <div class="input-field col s12">
        <input name="nombre" id="nombre" type="text" class="validate"> 
        <label  for="first_name2">Nombre:</label> 
      </div>
      <div class="input-field col s12">
        <input name="direccion" id="direccion" size="50px" type="text" class="validate"> 
        <label for="first_name">Dirección:</label> 
      </div>
      <div class="input-field col s12">
        <input name="telefono" id="telefono" size="50px" type="text" class="validate"> 
        <label for="first_name">Telefono:</label> 
      </div>
      <div class="input-field col s12">
        <input name="dui" id="dui" type="text" class="validate"> 
        <label for="last_name">DUI:</label> 
      </div>
      <div class="input-field col s6">
        <input name="user" id="user" type="text" class="validate"> 
        <label for="first_name2">Usuario:</label> 
      </div>
      <div class="row">
      <div class="input-field col s6">
        <input name="password" type="password" type="text" class="validate"> 
        <label for="password">Contraseña:</label> 
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
