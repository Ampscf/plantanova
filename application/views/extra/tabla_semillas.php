<table class="table table-hover" id="tabla-empresa">
<thead>
		<th class="col-md-1" style="width: 100px;">Fecha</th>
		<th>Semilla</th>
		<th>Cultivo</th>
		<th>Cantidad</th>
		<th>Lote</th>
		<th>Marca</th>
		<th>% de germinación</th>
		<th>Eliminar</th>
		<th>Editar</th>
<thead>
	<tbody>
		<?php 
		if(is_array($seeds))
		{
			foreach ($seeds as $key) 
			{
				echo "<tr>";
				echo "<td>" . date("d-m-Y",strtotime($key->seeds_date)) . "</td>";
				echo "<td>" . $key->seed_name . "</td>";
				echo "<td>" . $key->plant_name . "</td>";
				echo "<td>" . number_format($key->volume) . "</td>";
				echo "<td>" . $key->batch . "</td>";
				echo "<td>" .$key->mark ."</td>";
				if($key->germ_percentage==0){
					echo "<td>N/A</td>";
				}else{
					echo "<td>" . $key->germ_percentage ."%"."</td>";
				}
				$sowing=$this->model_seeds->get_id_seed($key->id_seed);
				if ($sowing < 1){
					echo "<td>";?>	                 
					 
	                <a href="#myModal<?php echo $key->id_seed; ?>" class="btn btn-default"
	                    title="Eliminar"
	                    data-toggle="modal">
						<i class="fa fa-times"></i>
	                </a>
					
					<div id="myModal<?php echo $key->id_seed; ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
                				<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    				<h4 class="modal-title">Confirmación</h4>
                				</div>
                				<div class="modal-body">
                    				<p>¿Estás seguro de querer eliminar esta semila?</p>
                				</div>
                				<div class="modal-footer">
									<?php echo form_open('seeds/delete_seed/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>
                    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    					<button type="submit" class="btn btn-success" name="<?php echo $key->id_seed; ?>">Aceptar</button>
                					</form>
								</div>
            				</div>
        				</div>
    				</div>
		<?php 
				echo "</td>";

					echo "<td>";?>	                 
					 
	                <a href="#myModaledit<?php echo $key->id_seed; ?>" class="btn btn-default"
	                    title="Editar"
	                    data-toggle="modal">
						<i class="fa fa-edit"></i>
	                </a>
					<?php 
					$editattributes = array('id' => 'edit_register_seeds','name'=>'edit_register_seeds');
					echo form_open('seeds/edit_register_seeds/'.$this->uri->segment(3).'/'.$this->uri->segment(4),$editattributes); 
					?>

					<div id="myModaledit<?php echo $key->id_seed; ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
                				<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    				<h4 class="modal-title">Editar semilla  <?php echo $key->seed_name;?></h4>
                				</div>
                			<div class="modal-body">
							<div class="clear">&nbsp</div>
							<h3>Cantidad</h3>
							<div class="input-group input-group-lg">
								
							<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume" value="<?php echo $key->volume; ?>">
							</div><!-- End cantidad -->	

							<div class="clear">&nbsp</div>
							<h3>Cultivo</h3>
							<div class="input-group input-group-lg">								
								<select class="form-control" name="cropedit" id="croptedit" >
									<?php 
										foreach($crop as $keycrop)
										{
											if($keycrop->plant_name==$key->plant_name){
												echo "<option value='" . $keycrop->plant_name . "' selected>" . $keycrop->plant_name . "</option>";
										
											}else{
												echo "<option value='" . $keycrop->plant_name . "' set_select('plant_name','".$keycrop->plant_name."')>" . $keycrop->plant_name . "</option>";

											}
												}
									?>
								</select>
							</div><!-- End semilla -->

							<div class="clear">&nbsp</div>
							<h3>Marca</h3>
							<div class="input-group input-group-lg">								
								<input type="text" class="form-control" placeholder="marca" name="markedit" id="markedit" value="<?php echo $key->mark; ?>">
							</div><!-- End marca -->

							<div class="clear">&nbsp</div>
							<h3>Lote</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Lote" name="batchedit" id="batchedit" value="<?php echo $key->batch; ?>">
							</div><!-- End lote -->		

							<div class="clear">&nbsp</div>
							<h3>Fecha</h3>
							<div class="input-group input-group-lg">
							<p><a class="btn btn-default"  style="height: 31px; border-radius: 0px;" id="butondate<?php echo $key->id_seed?>" onclick="generatedate(<?php echo $key->id_seed?>)"><i class="fa fa-calendar"></i></a><input type="text" class="datepicker<?php echo $key->id_seed?>"  id="datepicker<?php echo $key->id_seed?>" name="datepicker" style="width:92%; float: right;" readonly value="<?php echo  date("d-m-Y", strtotime($key->seeds_date));?>"></p>
							</div><!-- End fecha -->
							<div class="clear">&nbsp</div>
							<h3>Porcentaje de germinación</h3>
							<div class="input-group input-group-lg">
							<input type="text" class="form-control" placeholder="Porcentaje de germinación" name="germ_percentageedit" id="germ_percentageedit" value="<?php echo $key->germ_percentage; ?>">
							</div><!-- End porcentaje de germ -->		
							<input type="hidden" name="id_seed" id="germ_percentageedit" value="<?php echo $key->id_seed; ?>">
							</div>
                				<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    					<button type="submit" id="butto2" class="btn btn-success" name="">Aceptar</button>
                					</form>
								</div>
            				</div>
        				</div>
    				</div>
		<?php 
				echo "</td>";

				}else{
					echo "<td></td>";
				}
				
				echo "</tr>";
			}
		}
		?>
	</tbody>
</table>
<script>

					  	 $('#butto2').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});

						$("#edit_register_seeds").validate({
							rules: {
								volume: {
									required: true,
									number: true
								},
								marcaedit:{
									required:true
								},
						       	lote:{
						       		required: true
						       },
						        datepicker: {
						            required: true
						        },
						        germ_percentageedit: {
						            number:true,
						            max:100
						        }
							},
							messages: {
                        		volume: {
				                    required: "El Campo Volumen es Requerido",
				                    number: "El Campo Volumen debe ser Numerico"
				                },
				                marcaedit:{
				                	required:"El Campo Marca es Requerido"
				                },
				                lote: {
				                    required: "El Campo Lote es Requerido"
				                },
				                datepicker:{
				                	required:"El Campo Fecha es Requerido"
				                },
				                germ_percentageedit:{
				                	number:"El Campo Porcentaje debe ser Numerico",
				                	max:"Ingrese un Porcentaje Valido"
				                }
						  	}
						});
	
						
						
				</script>	
