<?php require_once 'templates/header.php';
require 'conexion.php';

$userid=($_GET['user']);

	$sql = "SELECT * FROM users WHERE user_id = '$userid'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
        
        date_default_timezone_set('America/Mexico_City');

?>

	<div class="content">
            <div class="container">
                
  <h1>EDITAR USUARIO</h1><br>         
  <form class="form-horizontal" name="form1" method="POST" action="update.php" autocomplete="off">
  <div class="form-group">
      <label>Id</label><input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $row['user_id']; ?>" readonly="readonly"><br>
      
      <label>Nombre</label><input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $row['nombre']; ?>" required><br>
      
      <label>Apellido Paterno</label><input class="form-control" id="apellidop" name="apellidop" type="text" value="<?php echo $row['apellidop']; ?>" required><br>
      
      <label>Apellido Materno</label><input class="form-control" id="apellidom" name="apellidom" type="text" value="<?php echo $row['apellidom']; ?>" required><br>
      
      <label>G&eacute;nero</label><select class="form-control" id="genero" name="genero" required>
         <option value="">Seleccione una opci&oacute;n</option>
	 <option value="Masculino" <?php if($row['genero']=='Masculino') echo 'selected'; ?>>Masculino</option>
	 <option value="Femenino" <?php if($row['genero']=='Femenino') echo 'selected'; ?>>Femenino</option>
     </select><br>
     
     <label>Edad</label><input class="form-control" id="edad" name="edad" type="number" min="1" max="99" value="<?php echo $row['edad']; ?>" required><br>
     
      <label>Estado Civil</label><select class="form-control" id="estadocivil" name="estadocivil" required>
         <option value="">Seleccione una opci&oacute;n</option>
	 <option value="Soltero" <?php if($row['estadocivil']=='Soltero') echo 'selected'; ?>>Soltero</option>
	 <option value="Casado" <?php if($row['estadocivil']=='Casado') echo 'selected'; ?>>Casado</option>
         <option value="Divorciado" <?php if($row['estadocivil']=='Divorciado') echo 'selected'; ?>>Divorciado</option>
     </select><br>
     
     <label>Nivel de Inter&eacute;s</label><select class="form-control" id="nivel" name="nivel" onchange="cambia_grado()" required>
         <option value="">Seleccione una opci&oacute;n</option>
	 <option value="1" <?php if($row['nivel']=='1') echo 'selected'; ?>>Preparatoria</option>
	 <option value="2" <?php if($row['nivel']=='2') echo 'selected'; ?>>Licenciatura</option>
         <option value="3" <?php if($row['nivel']=='3') echo 'selected'; ?>>Posgrado</option>
     </select><br>
     
           <label>Especialidad</label><select name="grado" class="form-control" required> 
                                <option value="">Seleccione una Opcion</option> 
                            </select><br>
      
      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="users.php">Regresar</a>
  </div>
</form>
  
<script>
    
  var Preparatoria=new Array("Sin Opciones Disponibles");
  var Licenciatura=new Array("Seleccione una Opcion","Lic. en Derecho","Lic. En Finanzas");
  var Posgrado=new Array("Seleccione una Opcion","Mtria. Admon. De Negocios ","Mtria. Direccion de proyectos");

  var todosGrados = [
    [],
    Preparatoria,
    Licenciatura,
    Posgrado
  ];

  function cambia_grado(){ 
   	var nivel;
   	nivel = document.form1.nivel[document.form1.nivel.selectedIndex].value;
   	if (nivel !== 0) { 
      	mis_grados=todosGrados[nivel];
      	num_grados = mis_grados.length;
      	document.form1.grado.length = num_grados;
      	for(i=0;i<num_grados;i++){ 
         	document.form1.grado.options[i].value=mis_grados[i];
         	document.form1.grado.options[i].text=mis_grados[i];
      	}	
   	}else{ 
      	document.form1.grado.length = 1; 
      	document.form1.grado.options[0].value = ""; 
      	document.form1.grado.options[0].text = ""; 
   	} 
   	document.form1.grado.options[0].selected = true;
}

</script>
     		
     	</div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>	