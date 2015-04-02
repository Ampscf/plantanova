	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Clientes</h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<?php echo anchor('admin/register_client_form','Agregar Nuevo', 'class="btn btn-success"'); ?>
							<a href="#myModalUser1" class="btn btn-success" data-toggle="modal">Agregar usuario a cliente</a>
							<?php include_once('application/views/extra/tabla_empresa.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->

<?php
	$attributes = array('id' => 'upload_sub_user','name'=>'upload_plant');
	echo form_open('admin/upload_sub_user/',$attributes);
?>
	<div id="myModalUser1" class="modal fade">
		<div class="modal-dialog">
    		<div class="modal-content">
        		<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title">Agregar Usuario</h4>	  
        		</div>
        		<div class="modal-body">
        			<div class="input-group input-group-lg">									
						<h3>Cliente</h3>
						<select class="form-control" name="id_user" id="id_user" tabindex="1"> 
							<option value="-1" selected>---Selecciona un cliente---</option>
							<?php 
							foreach($users as $key)
							{
								echo "<option value='" . $key->id_user . "' set_select('id_user','".$key->id_user."')>" . $key->farm_name ." / ".$key->mail. "</option>";
							}
							?>
						</select>
					</div><!-- End Plant -->
                	<h3>Correo</h3>
					<input type="text" class="form-control" placeholder="Correo" name="mail" id="mail">
					<h3>Contraseña</h3>
					<input type="text" class="form-control" placeholder="Contraseña" name="password" id="password">
				
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        			<button type="submit" class="btn btn-success" id="button1" name="" >Confirmar</button>
        		</div>
    		</div>
		</div>
	</div>
</form><script>
	$('#button1').click(function() {
    	var btn = $(this)
        btn.button('loading')
        setTimeout(function () {
            btn.button('reset')
        }, 2000)
	});

	$("#upload_sub_user").validate({
		rules:{
			id_user: {
	            min:0
	        },
	        mail:{
	        	required:true,
	        	email:true
	        },
	        password:{
	        	required:true	        	
	        }
		},
		messages:{
			id_user:{
				min:"Selecciona un cliente"
			},
			mail:{
	        	required:"Esté campo es requerido",
	        	email:"Correo invalido"
	        },
	        password:{
	        	required:"Esté campo es requerido"	        	
	        }
		}
	});
</script>