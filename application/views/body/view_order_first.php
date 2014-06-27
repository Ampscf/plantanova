<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div id="result">				
				<div class="panel-header">
					<ul class="nav nav-tabs">
						<li><a>Cliente</a></li>
						<li><a>&rarr;</a></li>
						<li class="active"><a>Orden</a></li>
						<li><a>&rarr;</a></li>
						<li><a>Desglose</a></li>
						<li><a>&rarr;</a></li>
						<li><a>Resumen</a></li>
						<li style="position: relative; left:35%;"><a>Cliente: <?php echo $company->farm_name; ?></a></li>
					</ul>
				</div>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<?php 
						$attributes = array('id' => 'update','name' => 'update');
						echo form_open('order/pending_order_first_next_before',$attributes);
						?>

						<!-- farm name, street, addr number, colony, cp, state, city, phone, social reason, rfc -->
						<div class="col-md-12">
							<div class="clear">&nbsp</div>
							<div class="col-md-12">
								<h2><span class="glyphicon glyphicon-list-alt"></span> Nuevo Pedido</h2>
							</div>

							<input type="hidden" value="<?php echo $id_company;?>" id="id_company" name="id_company">
							
							<div class="clear">&nbsp</div>
							<div class="col-md-6">
							
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">									

									<h3>Tipo de Cultivo</h3>
									<select class="form-control" name="plant" id="plant">
										<option value="-1" selected>---Selecciona un cultivo---</option>
										<?php 
										foreach($plants as $key)
										{
											echo "<option value='" . $key->id_plant . "' set_select('state','".$key->id_plant."')>" . $key->plant_name . "</option>";
										}
										?>
									</select>
								</div><!-- End Plant -->
								<?php echo form_error('plant'); ?>							
							
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h3>Fecha de entrega</h3>
									<p><input type="text" class="form-control" value="--Selecciona una Fecha--" id="datepicker" name="datepicker" readonly></p>
								</div><!-- End Date -->
								<?php echo form_error('datepicker'); ?>
								
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h3>Brazos</h3>
									<select class="form-control" name="arms" id="arms">
										<option value="2" selected>2</option>
										<option value="1">1</option>
									</select>	
								</div><!-- End Arms -->	
								<?php echo form_error('arms'); ?>							
							
							</div>						

							<div class="col-md-6">
							
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h3>Categoría</h3>
									<select class="form-control" name="category" id="category">
										<option value="-1" selected>---Selecciona una categoría---</option>
										<?php 
										foreach($categories as $key)
										{
											echo "<option value='" . $key->id_category . "' set_select('state','".$key->id_category."')>" . $key->category_name . "</option>";
										}
										?>								
									</select>
								</div><!-- End Category -->
								<?php echo form_error('category'); ?>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h3>Volumen</h3>
									<input type="text" class="form-control" placeholder="Volumen" name="volume" id="volume" value="">
								</div><!-- End Volume -->
								<?php echo form_error('volume'); ?>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h3>Tutoreo</h3>
										<select class="form-control" name="tutoring" id="tutoring">
											<option value="No" selected>No</option>
											<option value="Si" >Si</option>
										</select>
								</div><!-- End Tutoring -->
							<?php echo form_error('tutoring'); ?>
							</div>
						
							<div class="col-md-12">
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h3>Comentarios</h3>
									<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment"></textarea>								
								</div><!-- End Comments -->
							</div>					

						</div>
				
					</div><!-- End panel-body -->

					<div class="panel-footer">						
						<ul class="pager">
							<input type="submit" value="Siguiente &rarr;" class="btn btn-default" style="float: right;" id="next" name="next" />
							<?php echo form_close();
							echo form_open('order/pending_order_first_next_before');?>
							<input type="submit" value="&larr; Anterior" class="btn btn-default" style="float: left;" id="before" name="before"/>
					       	<input type="hidden" value="<?php echo $id_company;?>" id="id_company" name="id_company">
					       <?php echo form_close();?>
					       </ul>	
					</div><!-- End panel-footer -->
					
					 <script>
					    
						$("#update").validate({
							rules: {
								volume: {
									required: true,
									number: true
								},
								plant: {
						            plant: true
						        },
						       datepicker:{
						       		datepicker: true
						       },
						        category: {
						            category: true
						        }
							},
							messages: {
                        		volume: {
				                    required: "El Campo Volumen es Requerido",
				                    number: "El Campo Volumen debe ser Numerico"
				                }
						  	}
						});

						$.validator.addMethod("plant", plant, "Selecciona un Tipo de Cultivo");
						$.validator.addMethod("category", category, "Selecciona una Categoria");
						$.validator.addMethod("datepicker", datepicker, "Selecciona una Fecha Valida");

						function plant(){
							if (document.getElementById('plant').value < 0){
								return false;
							}else return true;
						}

						function category(){
							if (document.getElementById('category').value < 0){
								return false;
							}else return true;
						}

						function datepicker(){
							var value = document.getElementById('datepicker').value;
							var today = new Date();
							var date= new Date(value);
							
							if(date < today )
							{
								return false;
							}else{
								return true;
							} 
						}	
						</script>	
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->