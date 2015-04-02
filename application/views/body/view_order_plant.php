	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-tags"></i>Cultivos, Sustratos y Subtipos</h3>
					</div>
					<div class="panel-body">
						<h5 style="color:red;">
						<?php 							
						echo $this->session->flashdata('error');		
						?></h5>
						<div class="row">
							<div class="col-xs-12 col-md-12">
								<div class="col-xs-6 col-md-6 ">
									<a href="#myModalTipoCultivo1" class="btn btn-success" data-toggle="modal" style="width: 100%;">Agregar Tipo de Cultivo</a>
								</div>
								<div class="col-xs-6 col-md-6">
									<a href="#myModalTipoCultivo2" class="btn btn-primary" data-toggle="modal" style="width: 100%;margin-top: 10px;">Eliminar Tipo de Cultivo</a>
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="col-xs-6 col-md-6 ">
									<a href="#myModalSustrato1" class="btn btn-success" data-toggle="modal" style="width: 100%;">Agregar Sustrato</a>
								</div>
								<div class="col-xs-6 col-md-6">
									<a href="#myModalSustrato2" class="btn btn-primary" data-toggle="modal" style="width: 100%;margin-top: 10px;">Eliminar Sustrato</a>
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="col-xs-6 col-md-6 ">
									<a href="#myModalSubtype1" class="btn btn-success" data-toggle="modal" style="width: 100%;">Agregar Subtipo</a>
								</div>
								<div class="col-xs-6 col-md-6">
									<a href="#myModalSubtype2" class="btn btn-primary" data-toggle="modal" style="width: 100%;margin-top: 10px;">Eliminar Subtipo</a>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">						
						</div>	
					</div>	
				</div>
			</div>	
		</div> <!-- End row -->
	</div> <!-- End container -->


<?php
	$attributes = array('id' => 'upload_plant','name'=>'upload_plant');
	echo form_open('order/upload_plant/',$attributes);
?>
	<div id="myModalTipoCultivo1" class="modal fade">
		<div class="modal-dialog">
    		<div class="modal-content">
        		<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title">Agregar Tipo de Cultivo</h4>	  
        		</div>
        		<div class="modal-body">
        			
                	<h3>Nombre</h3>
					<input type="text" class="form-control" placeholder="Nombre del Tipo de Cultivo" name="plant_name" id="plant_name">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        			<button type="submit" class="btn btn-success" id="button1" name="" >Confirmar</button>
        		</div>
    		</div>
		</div>
	</div>
</form>

<script>
	$('#button1').click(function() {
    	var btn = $(this)
        btn.button('loading')
        setTimeout(function () {
            btn.button('reset')
        }, 2000)
	});

	$("#upload_plant").validate({
		rules:{
			plant_name: {
	            required:true
	        }
		},
		messages:{
			plant_name:{
				required:"El campo es requerido"
			}
		}
	});
</script>

<?php
	$attributes = array('id' => 'delete_plant','name'=>'delete_plant');
	echo form_open('order/delete_plant/',$attributes);
?>
	<div id="myModalTipoCultivo2" class="modal fade">
		<div class="modal-dialog">
    		<div class="modal-content">
        		<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title">Eliminar Tipo de Cultivo</h4>	  
        		</div>
        		<div class="modal-body">
        			
                	<div class="input-group input-group-lg">									

						<h3>Tipo de Cultivo</h3>
						<select class="form-control" name="id_plant" id="id_plant" tabindex="1"> 
							<option value="-1" selected>---Selecciona un cultivo---</option>
							<?php 
							foreach($plants as $key)
							{
								echo "<option value='" . $key->id_plant . "' set_select('id_plant','".$key->id_plant."')>" . $key->plant_name . "</option>";
							}
							?>
						</select>
					</div><!-- End Plant -->
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        			<button type="submit" class="btn btn-success" id="button2" name="" >Confirmar</button>
        		</div>
    		</div>
		</div>
	</div>
</form>

<script>
	$('#button2').click(function() {
    	var btn = $(this)
        btn.button('loading')
        setTimeout(function () {
            btn.button('reset')
        }, 2000)
	});

	$("#delete_plant").validate({
		rules:{
			plant_name: {
	            required:true
	        }
		},
		messages:{
			plant_name:{
				required:"El campo es requerido"
			}
		}
	});
</script>

<?php
	$attributes = array('id' => 'upload_sustratum','name'=>'upload_sustratum');
	echo form_open('order/upload_sustratum/',$attributes);
?>
	<div id="myModalSustrato1" class="modal fade">
		<div class="modal-dialog">
    		<div class="modal-content">
        		<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title">Agregar Sustrato</h4>	  
        		</div>
        		<div class="modal-body">
        			
                	<h3>Nombre</h3>
					<input type="text" class="form-control" placeholder="Nombre del Sustrato" name="sustratum_name" id="sustratum_name">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        			<button type="submit" class="btn btn-success" id="button3" name="" >Confirmar</button>
        		</div>
    		</div>
		</div>
	</div>
</form>

<script>
	$('#button3').click(function() {
    	var btn = $(this)
        btn.button('loading')
        setTimeout(function () {
            btn.button('reset')
        }, 2000)
	});

	$("#upload_sustratum").validate({
		rules:{
			sustratum_name: {
	            required:true
	        }
		},
		messages:{
			sustratum_name:{
				required:"El campo es requerido"
			}
		}
	});
</script>

<?php
	$attributes = array('id' => 'delete_sustratum','name'=>'delete_sustratum');
	echo form_open('order/delete_sustratum/',$attributes);
?>
	<div id="myModalSustrato2" class="modal fade">
		<div class="modal-dialog">
    		<div class="modal-content">
        		<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title">Eliminar Sustrato</h4>	  
        		</div>
        		<div class="modal-body">
        			
                	<div class="input-group input-group-lg">									

						<h3>Sustrato</h3>
						<select class="form-control" name="id_sustratum" id="id_sustratum" tabindex="1"> 
							<option value="-1" selected>---Selecciona un sustrato---</option>
							<?php 
							foreach($sustratum as $key)
							{
								echo "<option value='" . $key->id_sustratum . "' set_select('id_sustratum','".$key->id_sustratum."')>" . $key->sustratum_name . "</option>";
							}
							?>
						</select>
					</div><!-- End Plant -->
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        			<button type="submit" class="btn btn-success" id="button4" name="" >Confirmar</button>
        		</div>
    		</div>
		</div>
	</div>
</form>

<script>
	$('#button4').click(function() {
    	var btn = $(this)
        btn.button('loading')
        setTimeout(function () {
            btn.button('reset')
        }, 2000)
	});

	$("#delete_sustratum").validate({
		rules:{
			sustratum_name: {
	            required:true
	        }
		},
		messages:{
			sustratum_name:{
				required:"El campo es requerido"
			}
		}
	});
</script>


<?php
	$attributes = array('id' => 'upload_subtype','name'=>'upload_subtype');
	echo form_open('order/upload_subtype/',$attributes);
?>
	<div id="myModalSubtype1" class="modal fade">
		<div class="modal-dialog">
    		<div class="modal-content">
        		<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title">Agregar Subtipo</h4> 
        		</div>
        		<div class="modal-body">
        			
                	<div class="input-group">
						<h3>Sustrato</h3>
						<select class="form-control" name="id_sustratum" id="id_sustratum" onchange="get_subtype(this.value);">
							<option value="-1" selected>---Selecciona un Sustrato---</option>
							<?php 
								foreach($sustratum as $key)
								{
									echo "<option value='" . $key->id_sustratum . "' set_select('sustratum','".$key->id_sustratum."')>" . $key->sustratum_name . "</option>";
								}
							?>	
						</select>
					</div>
					<div class="input-group">
						<h3>Nombre</h3>
						<input type="text" class="form-control" placeholder="Nombre del Subtipo" name="subtype_name" id="subtype_name">
					</div><!-- End Subtipo -->
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        			<button type="submit" class="btn btn-success" id="button5" name="" >Confirmar</button>
        		</div>
    		</div>
		</div>
	</div>
</form>

<script>
	$('#button5').click(function() {
    	var btn = $(this)
        btn.button('loading')
        setTimeout(function () {
            btn.button('reset')
        }, 2000)
	});

	$("#upload_subtype").validate({
		rules:{
			subtype_name: {
	            required:true
	        }
		},
		messages:{
			subtype_name:{
				required:"El campo es requerido"
			}
		}
	});
</script>

<?php
	$attributes = array('id' => 'delete_subtype','name'=>'delete_subtype');
	echo form_open('order/delete_subtype/',$attributes);
?>
	<div id="myModalSubtype2" class="modal fade">
		<div class="modal-dialog">
    		<div class="modal-content">
        		<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title">Eliminar Subtipo</h4>	  
        		</div>
        		<div class="modal-body">
        			<div class="input-group">
						<p>Sustrato</p>
						<select class="form-control" name="sustratum" id="sustratum" onchange="get_subtype(this.value);">
							<option value="-1" selected>---Selecciona un Sustrato---</option>
							<?php 
								foreach($sustratum as $key)
								{
									echo "<option value='" . $key->id_sustratum . "' set_select('sustratum','".$key->id_sustratum."')>" . $key->sustratum_name . "</option>";
								}
							?>	
						</select>
					</div>
					<div class="input-group">
						<p>Subtipo</p>
						<select class="form-control" name="subtype" id="subtype">
							<option value="-1" selected>---Selecciona un Subtipo---</option>
							
						</select>
					</div><!-- End Subtipo -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        		<button type="submit" class="btn btn-success" id="button6" name="" >Confirmar</button>
	        	</div>
        		
    		</div>
		</div>
	</div>
</form>

<script>
	$('#button6').click(function() {
    	var btn = $(this)
        btn.button('loading')
        setTimeout(function () {
            btn.button('reset')
        }, 2000)
	});

	$("#upload_subtype").validate({
		rules:{
			subtype_name: {
	            required:true
	        }
		},
		messages:{
			subtype_name:{
				required:"El campo es requerido"
			}
		}
	});
</script>