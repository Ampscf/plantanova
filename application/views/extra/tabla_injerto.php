<table class="table table-hover" id="tabla-empresa">
	<th>Cantidad</th>
	<th>Fecha</th>
	<th>Variedad/Portainjerto</th>
	<!--<th>Alcance</th>-->
	<th>Comentario</th>
	<th>Editar</th>
	<th>Eliminar</th>

	<?php 

		if(is_array($graft))
		{	
			echo "<input type='hidden' value='1' id='grafta'>";
			foreach ($graft as $key) 
			{

				echo "<tr>";
				echo "<td>" . number_format($key->volume) . "</td>";
				echo "<td>" . date("d-m-Y",strtotime($key->process_date)) . "</td>";
				$breakdownn=$this->model_order->get_breakdown_id_breakdown($key->id_breakdown);
				echo "<td>" .$breakdownn[0]->variety."/".$breakdownn[0]->rootstock. "</td>";
				//echo "<td>".$key->viability."</td>";
				if($key->comment != null){
				echo "<td>" ?>

					<a href="#myModal21<?php echo $key->id_process; ?>" class="btn btn-default"
	                    title="Comentario"
	                    data-toggle="modal">
						<i class="fa fa-comment-o"></i>
	                </a>
					
					<div id="myModal21<?php echo $key->id_process;  ?>" class="modal fade">
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
				
					<a href="#myModaleditGraft<?php echo $key->id_process; ?>" class="btn btn-default"
	                    title="Editar"
	                    data-toggle="modal">
						<i class="fa fa-edit"></i>
	                </a>
					<?php 
			$attributes = array('id' => 'edit_graft'.$key->id_process,'name'=>'edit_graft'.$key->id_process);
			echo form_open('breakdown/edit_graft/'.$this->uri->segment(3),$attributes); 
			?>
			<input type="hidden" id="order_volume" name="order_volume" value="<?php echo $volumen;?>">
			<div id="myModaleditGraft<?php echo $key->id_process; ?>" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Editar Injerto</h4>
                		</div>
                		<div class="modal-body">
							<div class="input-group">
								<p>Variedad/Portainjerto: <?php echo $breakdownn[0]->variety."/".$breakdownn[0]->rootstock ?></p>
								<input type="hidden" id="id_processGraft" name="id_processGraft" value="<?php echo $key->id_process;?>" >
								<input type="hidden" id="breakdownGraft<?php echo $key->id_process?>" name="breakdownGraft<?php echo $key->id_process?>" value="<?php echo $key->id_breakdown;?>" >
							</div><!-- End breakdown_graft -->
							<div>
								<input type="text" id="inputvalgraft<?php echo $key->id_process; ?>" name="inputvalgraft<?php echo $key->id_process; ?>" value="1">
							</div>
							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volumeGraft<?php echo $key->id_process; ?>" id="volumeGraft<?php echo $key->id_process; ?>" value="<?php echo $key->volume ?>" onchange="max_graft<?php echo $key->id_process; ?>(this.value,<?php echo $key->id_breakdown;?>,<?php echo $key->volume ?>)">
							</div><!-- End Cantidad -->	
							<div class="input-group">
								<p>Fecha</p>
								<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondateGraft<?php echo $key->id_process; ?>"><i class="fa fa-calendar"></i></a><input type="text" class="datepicker2" value="<?php echo date("d-m-Y",strtotime($key->process_date)) ?>" placeholder="--Selecciona una Fecha--" id="datepickerGraft<?php echo $key->id_process; ?>" name="datepickerGraft<?php echo $key->id_process; ?>" style="width:92%; float: right;" readonly></p>
							</div><!-- End fecha -->
							
							<div class="input-group">
									<!--<p>Viabilidad</p>
									<input type="text" class="form-control" placeholder="Viabilidad" name="viability" id="viability">
								</div><!-- End Viabilidad -->
								<div class="input-group">
									<p>Comentario</p>
									<textarea class="form-control" rows="4" style="height: auto;" id="commentGraft<?php echo $key->id_process; ?>" name="commentGraft<?php echo $key->id_process; ?>"><?php echo $key->comment;?></textarea>										
								</div><!-- End Alcance -->	                    		
                			</div>
	                		<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    			<button type="submit" class="btn btn-success" name="saveGraft<?php echo $key->id_process; ?>" id="saveGraft<?php echo $key->id_process; ?>">Confirmar</button>
	                		</div>
            			</div>
        			</div>
    			</div>
    		</div>
    	</form>

    	<script>

    	$(function() {
			//alert("entro");
			$( "#datepickerGraft<?php echo $key->id_process; ?>" ).datepicker();
		});
		$(function() {    
	       $('#butondateGraft<?php echo $key->id_process; ?>').click(function() {
	          $('#datepickerGraft<?php echo $key->id_process; ?>').datepicker('show');
	       });
	    });

	    $('#saveGraft<?php echo $key->id_process; ?>').click(function() {
	    	var btn = $(this)
	        btn.button('loading')
	        setTimeout(function () {
	            btn.button('reset')
	        }, 2000)
		});

		$("#edit_graft<?php echo $key->id_process; ?>").validate({
			rules: {
				volumeGraft<?php echo $key->id_process; ?>: {
					required: true,
					number: true,
					//max_edit_graft<?php echo $key->id_process; ?>:true,
					min:0
				},
				datepickerGraft<?php echo $key->id_process; ?>: {
		            required: true
		        }
			},
			messages: {
        		volumeGraft<?php echo $key->id_process; ?>: {
                    required: "Este Campo es Requerido",
                    number: "Este Campo Debe Ser Númerico",
                    min:"Cantidad Invalida"
                    
                },
                 datepicker<?php echo $key->id_process; ?>:{
                	required:"El Campo Fecha es Requerido"
                },
                viabilityGraft<?php echo $key->id_process; ?>: {
                    required: "Este Campo es Requerido",
                    number: "Este Campo Debe Ser Númerico"
                }
		  	}
		});

		/*$.validator.addMethod("max_edit_graft<?php echo $key->id_process; ?>", max_edit_graft<?php echo $key->id_process; ?>, "Cantidad Invalida");
		
		function max_edit_graft<?php echo $key->id_process; ?>(){
			if(document.getElementById('inputvalgraft<?php echo $key->id_process; ?>').value == 1 ){
				return true;
			}else return false;
		}

		function max_graft<?php echo $key->id_process;?>(a,b,c){
			
			$.ajax({
				url: "<?php echo base_url('index.php/breakdown/max_volume_edit_graft/'.$this->uri->segment(3)); ?>", 
				data: {'volume_graft':a,'breakdown_graft':b,'actual_volume':c},
				type: "POST",
				success: function(data){
					document.getElementById('inputvalgraft<?php echo $key->id_process; ?>').value=data;
				},
				failure:function(data){
					
				}
			});
			if(document.getElementById('inputvalgraft<?php echo $key->id_process; ?>').value == 1 ){
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
									<?php echo form_open('breakdown/delete_graft/'.$this->uri->segment(3)); ?>
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

			}//end_foreach
		}else{
			echo "<input type='hidden' value='0' id='grafta'>";
		}
		?>
	
</table>
