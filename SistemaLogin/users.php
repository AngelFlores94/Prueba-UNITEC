<?php require_once 'templates/header.php';
 
require 'conexion.php';
	
	$sql = "SELECT * FROM users";
	$resultado = $mysqli->query($sql);  
        
?>

<div class="content">
    <div class="container">
        
        <button class="btn btn-success"><a href="register.php">Nuevo Registro</a></button> <br> <br>  
        
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">  
<table border='1'>
      <tr>
      <td><strong>Id</strong></td>
        <td><strong>Nombre</strong></td>
        <td><strong>Correo</strong></td>
        <td><strong>Acciones</strong></td>
      </tr>

        <?php while($res = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
        
 <?php echo "<tr>
            <td>".$res['user_id']."</td>
            <td>".$res['nombre']."</td>
            <td>".$res['correo']."</td>
            <td><button class='btn btn-info'><a href='edit.php?user=".$res['user_id']."'>Modificar</a></button> &nbsp;&nbsp;
           <button class='btn btn-danger'><a href='#' data-href='delete.php?user=".$res['user_id']."' data-toggle='modal' data-target='#confirm-delete'>Eliminar</a></button></td>  
        </tr>"; ?>
        
<?php 

}

?>
      
         </table> 
      </form>
        
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Eliminar</a>
					</div>
				</div>
			</div>
		</div>
        
        <script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
        
    </div>
    </div>
     		
<?php require_once 'templates/footer.php';