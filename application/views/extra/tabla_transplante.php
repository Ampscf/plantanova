<table class="table table-hover" id="tabla-empresa">
	<th>Cantidad</th>
	<th>Fecha</th>
	<th>Variedad/Portainjerto</th>
	<!--<th>Alcance</th>-->
	<th>Comentario</th>
	<th>Editar</th>
	<th>Eliminar</th>

	<?php 

		if(is_array($transplant))
		{
			echo "<input type='hidden' value='1' id='transplanta'>";
			foreach ($transplant as $key) 
			{
				echo "<tr>";
				echo "<td>" . number_format($key->volume) . "</td>";
				echo "<td>" . date("d-m-Y",strtotime($key->process_date)) . "</td>";
				$breakdownn=$this->model_order->get_breakdown_id_breakdown($key->id_breakdown);
				echo "<td>" .$breakdownn[0]->variety."/".$breakdownn[0]->rootstock. "</td>";
				//echo "<td></td>";
				if($key->comment != null){
				echo "<td>" ?>

					<a href="#myModal2<?php echo $key->id_process; ?>" class="btn btn-default"
	                    title="Comentario"
	                    data-toggle="modal">
						<i class="fa fa-comment-o"></i>
	                </a>
					
					<div id="myModal2<?php echo $key->id_process;  ?>" class="modal fade">
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
				
					<a href="#myModaleditTransplant<?php echo $key->id_process; ?>" class="btn btn-default"
	                    title="Editar"
	                    data-toggle="modal">
						<i class="fa fa-edit"></i>
	                </a>
					
					<?php 
			$attributes = array('id' => 'edit_transplant'.$key->id_process,'name'=>'edit_transplant'.$key->id_process);
			echo form_open('breakdown/edit_transplant/'.$this->uri->segment(3),$attributes); 
			?>
			<div id="myModaleditTransplant<?php echo $key->id_process; ?>" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Editar Transplante</h4>
                		</div>
                		<div class="modal-body">
                			<div class="input-group">
								<p>Variedad/Portainjerto: <?php echo $breakdownn[0]->variety."/".$breakdownn[0]->rootstock ?></p>
								<input type="hidden" id="id_processTransplant" name="id_processTransplant" value="<?php echo $key->id_process;?>" >
								<input type="hidden" id="breakdownTransplant<?php echo $key->id_process?>" name="breakdownTransplant<?php echo $key->id_process?>" value="<?php echo $key->id_breakdown;?>" >
							</div><!-- End breakdown_graft -->
							<div>
								<input type="hidden" id="inputvaltransplant<?php echo $key->id_process?>" name="inputvalTransplant<?php echo $key->id_process?>" value="1">
							</div>

							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volumeTransplant<?php echo $key->id_process?>" id="volumeTransplant<?php echo $key->id_process?>" value="<?php echo $key->volume;?>" onchange="maxTransplant<?php echo $key->id_process; ?>(this.value,<?php echo $key->id_breakdown;?>,<?php echo $key->volume; ?>)">
							</div><!-- End Cantidad -->
							<div class="input-group">
								<p>Fecha</p>
								<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondateTransplant<?php echo $key->id_process?>"><i class="fa fa-calendar"></i></a><input type="text" class="datepicker3" placeholder="--Selecciona una Fecha--" value="<?php echo date("d-m-Y",strtotime($key->process_date))?>" id="datepickerTransplant<?php echo $key->id_process?>" name="datepickerTransplant<?php echo $key->id_process?>" style="width:92%; float: right;" readonly></p>
							</div><!-- End fecha -->	
							<div class="input-group">
								<p>Comentario</p>
								<textarea class="form-control" rows="4" style="height: auto;" id="commentTransplant<?php echo $key->id_process?>" name="commentTransplant<?php echo $key->id_process?>"><?php echo $key->comment;?></textarea>										
							</div>
	                		<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    			<button type="submit" class="btn btn-success" name="saveTransplant<?php echo $key->id_process; ?>" id="saveTransplant<?php echo $key->id_process; ?>">Confirmar</button>
	                		</div>
	            		</div>
	        		</div>
	    		</div>
			</div>
		</form>

		<script>

		$(function() {
			$( "#datepickerTransplant<?php echo $key->id_process; ?>" ).datepicker();
		});
		$(function() {    
	    	$('#butondateTransplant<?php echo $key->id_process; ?>').click(function() {
	       		$('#datepickerTransplant<?php echo $key->id_process; ?>').datepicker('show');
	       	});
	    });

					    
	    $('#saveTransplant<?php echo $key->id_process; ?>').click(function() {
	    	var btn = $(this)
	        btn.button('loading')
	        setTimeout(function () {
	            btn.button('reset')
	        }, 2000)
		});

		function maxTransplant<?php echo $key->id_process; ?>(a,b,c){
			$.ajax({
				url: "<?php echo base_url('index.php/breakdown/max_volume_edit_transplant/'.$this->uri->segment(3)); ?>", 
				data: {'volume_transplant':a,'breakdown_transplant':b,'actual_volume':c},
				type: "POST",
				success: function(data){
					
					document.getElementById('inputvaltransplant<?php echo $key->id_process; ?>').value=data;
				},
				failure:function(data){
					
				}
			});
			
		}

		$("#edit_transplant<?php echo $key->id_process; ?>").validate({
			rules: {
				volumeTransplant<?php echo $key->id_process; ?>: {
					required: true,
					number: true,
					//max_edit_transplant<?php echo $key->id_process; ?>:true,
					min:0
				},
				datepickerTransplant<?php echo $key->id_process; ?>: {
		            required: true
		        }
			},
			messages: {
        		volumeTransplant<?php echo $key->id_process; ?>: {
                    required: "Este Campo es Requerido",
                    number: "Este Campo Debe Ser Númerico",
                    min:"Cantidad Invalida"
                    
                },
                 datepickerTransplant<?php echo $key->id_process; ?>:{
                	required:"El Campo Fecha es Requerido"
                },
                viabilityTransplant<?php echo $key->id_process; ?>: {
                    required: "Este Campo es Requerido",
                    number: "Este Campo Debe Ser Númerico"
                }
		  	}
		});

		/*$.validator.addMethod("max_edit_transplant<?php echo $key->id_process; ?>", max_edit_transplant<?php echo $key->id_process; ?>, "Cantidad Invalida");
		
		function max_edit_transplant<?php echo $key->id_process; ?>(){
			if(document.getElementById('inputvaltransplant<?php echo $key->id_process; ?>').value == 1 ){
				return true;
			}else return false;
		}*/
			</script>
		<?php 
				echo "</td>";
				echo "<td>";?>
				
					<a href="#myModal<?php echo $key->id_process; ?>" class="btn btn-default"
	                    title="Eliminar"
	                    data-toggle="modal">
						<i class="fa fa-times"></i>
	                </a>
					
					<div id="myModal<?php echo $key->id_process; ?>" class="modal fade">
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
									<?php echo form_open('breakdown/delete_transplant/'.$this->uri->segment(3)); ?>
                    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    					<button type="submit" class="btn btn-success" name="<?php echo $key->id_process; ?>">Confirmar</button>
                					</form><!--endform2-->
								</div>
            				</div>
        				</div>
    				</div>
		<?php 
				echo "</td>";
				echo "</tr>";
			}
		}else{
			echo "<input type='hidden' value='0' id='transplanta'>";
		}
		?>
</table>