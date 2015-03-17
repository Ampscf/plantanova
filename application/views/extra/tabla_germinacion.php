<table class="table table-hover" id="tabla-empresa">
	<th>Cantidad viable</th>
	<th>Fecha</th>
	<th>Semilla</th>
	<th>% de germinación</th>
	<th>Viabilidad</th>
	<th>Comentario</th>
	<th>Editar</th>
	<th>Eliminar</th>

	<?php 
		if(is_array($germination))
		{
			foreach ($germination as $key) 
			{
				echo "<tr>";
				echo "<td>" . number_format($key->volume) . "</td>";
				echo "<td>" . date("d-m-Y",strtotime($key->germ_date)) . "</td>";
				echo "<td>" . $key->seed_name . "</td>";
				echo "<td>" . $key->germ_percentage ."%</td>";
				echo "<td>" . $key->viability . "%</td>";				
				if($key->comment != null){
				echo "<td>" ?>

					<a href="#myModal2<?php echo $key->id_germination; ?>" class="btn btn-default"
	                    title="Comentario"
	                    data-toggle="modal">
						<i class="fa fa-comment-o"></i>
	                </a>
					
					<div id="myModal2<?php echo $key->id_germination;  ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
                				<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    				<h4 class="modal-title">Comentario</h4>
                				</div>
                				<div class="modal-body">
                    				<p><?php echo $key->comment;?></p>
                				</div>
                				<div class="modal-footer">
                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			</div>
            				</div>
        				</div>
    				</div>
    			
    			<?php
    			}else{
    			echo "<td>";
    			} 
    			echo "</td>";
    			echo "<td>";?>
				
					<a href="#myModaleditGerm<?php echo $key->id_germination; ?>" class="btn btn-default"
	                    title="Editar"
	                    data-toggle="modal">
						<i class="fa fa-edit"></i>
	                </a>
	                <?php 
			$attributes = array('id' => 'edit_germination'.$key->id_germination,'name'=>'edit_germination'.$key->id_germination);
			echo form_open('breakdown/edit_germination/'.$this->uri->segment(3),$attributes); 
			?>
			<div id="myModaleditGerm<?php echo $key->id_germination; ?>" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Editar Germinación</h4>
                		</div>
                		<div class="modal-body">
							<div class="input-group">
								<p>Semilla: <?php echo $key->seed_name; ?></p>
								<input type="hidden" id="id_germination" name="id_germination" value="<?php echo $key->id_germination; ?>" />
								<input type="hidden" id="breackdown_Germ<?php echo $key->id_germination; ?>" name="breackdown_Germ<?php echo $key->id_germination; ?>" value="<?php echo $key->id_sowing; ?>" />
							</div><!-- End Cantidad -->
							<p>Fecha</p>
							<div class="input-group">
								<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondateGerm<?php echo $key->id_germination; ?>"><i class="fa fa-calendar"></i></a><input type="text" class="datepicker1" placeholder="--Selecciona una Fecha--" id="datepickerGerm<?php echo $key->id_germination; ?>" name="datepickerGerm<?php echo $key->id_germination; ?>" value="<?php echo date('d-m-Y',strtotime($key->germ_date))?>" style="width:92%; float: right;" readonly></p>
							</div><!-- End fecha -->
							<div class="input-group">
								<p>% de germinación</p>
								<input type="text" class="form-control" placeholder="% de germinación" name="percentageGerm<?php echo $key->id_germination; ?>" id="percentageGerm<?php echo $key->id_germination; ?>" value="<?php echo $key->germ_percentage;?>">
							</div><!-- End Cantidad -->	
							<div class="input-group">
								<p>Viabilidad</p>
								<input type="text" class="form-control" placeholder="Viabilidad" name="viabilityGerm<?php echo $key->id_germination; ?>" id="viabilityGerm<?php echo $key->id_germination; ?>" value="<?php echo $key->viability?>">
							</div><!-- End Viabilidad -->
							<div class="input-group">
								<p>Comentario</p>
								<textarea class="form-control" rows="4" style="height: auto;" id="commentGerm<?php echo $key->id_germination; ?>" name="commentGerm<?php echo $key->id_germination; ?>"><?php echo $key->comment;?></textarea>										
							</div><!-- End Alcance -->	
							<input type="hidden" name="total" id="total" value="<?php echo $suma->result()[0]->volume?>" />                    		
                		</div>
                		<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                			<button type="submit" class="btn btn-success" name="editGerm" id="editGerm<?php echo $key->id_germination; ?>">Confirmar</button>
                		</div>
            		</div>
        		</div>
    		</div>
    	</form>

    	<script>

			$(function() {
				//alert("entro");
				$( "#datepickerGerm<?php echo $key->id_germination; ?>" ).datepicker();
			});
			$(function() {    
		       $('#butondateGerm<?php echo $key->id_germination; ?>').click(function() {
		          $('#datepickerGerm<?php echo $key->id_germination; ?>').datepicker('show');
		       });
		    });

		    $('#editGerm<?php echo $key->id_germination; ?>').click(function() {
		    	var btn = $(this)
		        btn.button('loading')
		        setTimeout(function () {
		            btn.button('reset')
		        }, 2000)
			});
			
			$("#edit_germination<?php echo $key->id_germination;?>").validate({
				
				rules: {
					percentageGerm<?php echo $key->id_germination; ?>:{
			           	number: true,
			           	required: true,
			        	max: 100,
			        	min:0
			        },
			        datepickerGerm<?php echo $key->id_germination; ?>: {
			            required: true
			        },
			        viabilityGerm<?php echo $key->id_germination; ?>:{
			        	number:true,
			        	required: true,
			        	max:100,
			        	min:0
			        }
				},
				messages: {
            		percentageGerm<?php echo $key->id_germination; ?>:{
	                	number: "Este Campo debe ser Númerico",
	                	required: "Este Campo es Requerido",
	                	max: "Ingresa un Porcentaje Valido",
	                	min:"Ingresa un Porcentaje Valido"
	                },
	                 datepickerGerm<?php echo $key->id_germination; ?>:{
	                	required:"El Campo Fecha es Requerido"
	                },
	                viabilityGerm<?php echo $key->id_germination; ?>:{
	                	required: "Este Campo es Requerido",
	                	number:"Este Campo debe ser Númerico",
	                	max:"Ingresa un Porcentaje Valido",
	                	min:"Ingresa un Porcentaje Valido"
	                }

			  	}
			});

			
		</script>
					
		<?php 
				echo "</td>";
				echo "<td>";?>
				
					<a href="#myModal<?php echo $key->id_germination; ?>" class="btn btn-default"
	                    title="Eliminar"
	                    data-toggle="modal">
						<i class="fa fa-times"></i>
	                </a>
					
					<div id="myModal<?php echo $key->id_germination; ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
                				<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    				<h4 class="modal-title">Confirmación</h4>
                				</div>
                				<div class="modal-body">
                    				<p>¿Estás seguro de querer eliminar este registro?</p>
                				</div>
                				<div class="modal-footer">
									<?php echo form_open('breakdown/delete_germination/'.$this->uri->segment(3)); ?>
                    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    					<button type="submit" class="btn btn-success" name="<?php echo $key->id_germination; ?>">Confirmar</button>
                					</form><!--endform2-->
								</div>	
            				</div>
        				</div>
    				</div>
		<?php 
				echo "</td>";
				echo "</tr>";
			}
		}
		?>
	
</table>
