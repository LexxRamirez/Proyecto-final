<?php
include("sesion.php");
include("conexion.php");
include("part-prin-boost.php");

if(isset($_POST['crear'])){
  $target_path = getcwd();
  $now = str_replace(":", "", date("Y-m-d H:i"));
  $outputfilename = $db . '-' . $now . '.sql';
  $outputfilename = str_replace(" ", "-", $outputfilename);
  $save_path = $target_path . '/'.$outputfilename;
          
  $command = "mysqldump --user=$user --password=$pass $db > $outputfilename";
  shell_exec($command);
            
  //Para forzar la descarga del navegador
  header('Content-Type: application/octet-stream');
  header("Content-Transfer-Encoding: Binary"); 
  header('Content-Disposition: attachment; filename='.basename($outputfilename));
  header('Content-Transfer-Encoding: binary');
  header("Content-Type: application/download");
  header("Content-Description: File Transfer"); 
  header("Content-Length: ".filesize($outputfilename));
  readfile($save_path);
         
  //Eliminar el archivo del servidor
  shell_exec('rm ' . $save_path);  
}

if($_FILES){
  $target_path = getcwd();
  $databasefilename = $_FILES["databasefile"]["name"];
  $save_path = $target_path . '/backup/';
  $restore_path = $target_path . '/backup/'.$databasefilename;
  //Subir archivo a directorio de backup
  move_uploaded_file($_FILES["databasefile"]["tmp_name"], $target_path . '/backup/' . $databasefilename);
  
  //Restaurando base de datos         
  $command="mysql --user=$user --password=$pass $db < $restore_path";
  exec($command,$result, $output);

  if($output != 0) {
    echo "<script>alert('Error al restauraurar base de datos');</script>";
  }else {
    echo "<script>alert('Datos restaurados con Exito');</script>";
  }
}
include("menu-all.php");
?>

<br>
    
      <div style="width:950px; margin:auto">
        <div>
		 <div >
			<h3>Crear Copia de seguridad</h3>
		</div>
        
        <div >
          <form method="POST">
           <table> 
            <tr>
              <td><input type="hidden" name="crear" value="crear"></td>
              <td><input type="submit"class="btn btn-primary" value="Crear Copia"></td>
            </tr>
            </table>
          </form>
            
        </div>
      </div>

<div >
  <div >
    <h3>Restaurar Copia de seguridad</h3>
  </div>
  <div >
    <form method="POST" enctype="multipart/form-data">
      <input type="file" name="databasefile" / required>
      <br><br>
      <input type="submit" class="btn btn-primary" value="Restaurar"/>
    </form>
  </div>
</div>
      </div>
      <br>


