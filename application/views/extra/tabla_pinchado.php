<table class="table table-hover" id="tabla-empresa">
	<th>Cantidad</th>
	<th>Fecha</th>
	<th>Variedad/Portainjerto</th>
	<!--<th>Alcance</th>-->
	<th>Comentario</th>
	<th>Editar</th>
	<th>Eliminar</th>
	
	<?php 

		if(is_array($punch))
		{
			echo "<input type='hidden' value='1' id='puncha'>";
			foreach ($punch as $key) 
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
				
					<a href="#myModaleditPunch<?php echo $key->id_process; ?>" class="btn btn-default"
	                    title="Editar"
	                    data-toggle="modal">
						<i class="fa fa-edit"></i>
	                </a>
					
					<?php 
			$attributes = array('id' => 'edit_punch'.$key->id_process,'name'=>'edit_punch'.$key->id_process);
			echo form_open('breakdown/edit_punch/'.$this->uri->segment(3),$attributes); 
			?>
			<div id="myModaleditPunch<?php echo $key->id_process; ?>" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Editar Pinchado</h4>
                		</div>
                		<div class="modal-body">
                			<div class="input-group">
								<p>Variedad/Portainjerto: <?php echo $breakdownn[0]->variety."/".$breakdownn[0]->rootstock ?></p>
								<input type="hidden" id="id_processPunch" name="id_processPunch" value="<?php echo $key->id_process;?>" >
								<input type="hidden" id="breakdownPunch<?php echo $key->id_process?>" name="breakdownPunch<?php echo $key->id_process?>" value="<?php echo $key->id_breakdown;?>" >
							</div><!-- End breakdown_graft -->
							<div>
								<input type="hidden" id="inputvalpunch<?php echo $key->id_process?>" name="inputvalpunch<?php echo $key->id_process?>" value="1">
							</div>

							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volumePunch<?php echo $key->id_process?>" id="volumePunch<?php echo $key->id_process?>" value="<?php echo $key->volume;?>" onchange="maxPunch<?php echo $key->id_process; ?>(this.value,<?php echo $key->id_breakdown;?>,<?php echo $key->volume; ?>)">
							</div><!-- End Cantidad -->
							<div class="input-group">
								<p>Fecha</p>
								<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondatePunch<?php echo $key->id_process; ?>"><i class="fa fa-calendar"></i></a><input type="text" class="datepicker3" placeholder="--Selecciona una Fecha--" value="<?php echo date("d-m-Y",strtotime($key->process_date))?>" id="datepickerPunch<?php echo $key->id_process?>" name="datepickerPunch<?php echo $key->id_process?>" style="width:92%; float: right;" readonly></p>
							</div><!-- End fecha -->	
							<div class="input-group">
								<p>Comentario</p>
								<textarea class="form-control" rows="4" style="height: auto;" id="commentPunch<?php echo $key->id_process?>" name="commentPunch<?php echo $key->id_process?>"><?php echo $key->comment;?></textarea>										
							</div>
	                		<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    			<button type="submit" class="btn btn-success" name="savePunch<?php echo $key->id_process; ?>" id="savePunch<?php echo $key->id_process; ?>">Confirmar</button>
	                		</div>
	            		</div>
	        		</div>
	    		</div>
			</div>
		</form>

		<script>

		$(function() {
			$( "#datepickerPunch<?php echo $key->id_process; ?>" ).datepicker();
		});
		$(function() {    
	    	$('#butondatePunch<?php echo $key->id_process; ?>').click(function() {
	       		$('#datepickerPunch<?php echo $key->id_process; ?>').datepicker('show');
	       	});
	    });

					    
	    $('#savePunch<?php echo $key->id_process; ?>').click(function() {
	    	var btn = $(this)
	        btn.button('loading')
	        setTimeout(function () {
	            btn.button('reset')
	        }, 2000)
		});

		function maxPunch<?php echo $key->id_process; ?>(a,b,c){
			$.ajax({
				url: "<?php echo base_url('index.php/breakdown/max_volume_edit_punch/'.$this->uri->segment(3)); ?>", 
				data: {'volume_punch':a,'breakdown_punch':b,'actual_volume':c},
				type: "POST",
				success: function(data){
					
					document.getElementById('inputvalpunch<?php echo $key->id_process; ?>').value=data;
				},
				failure:function(data){
					
				}
			});
			
		}

		$("#edit_punch<?php echo $key->id_process; ?>").validate({
			rules: {
				volumePunch<?php echo $key->id_process; ?>: {
					required: true,
					number: true,
					//max_edit_punch<?php echo $key->id_process; ?>:true,
					min:0
				},
				datepickerPunch<?php echo $key->id_process; ?>: {
		            required: true
		        }
			},
			messages: {
        		volumePunch<?php echo $key->id_process; ?>: {
                    required: "Este Campo es Requerido",
                    number: "Este Campo Debe Ser Númerico",
                    min:"Cantidad Invalida"
                    
                },
                 datepickerPunch<?php echo $key->id_process; ?>:{
                	required:"El Campo Fecha es Requerido"
                },
                viabilityPunch<?php echo $key->id_process; ?>: {
                    required: "Este Campo es Requerido",
                    number: "Este Campo Debe Ser Númerico"
                }
		  	}
		});

		/*$.validator.addMethod("max_edit_punch<?php echo $key->id_process; ?>", max_edit_punch<?php echo $key->id_process; ?>, "Cantidad Invalida");
		
		function max_edit_punch<?php echo $key->id_process; ?>(){
			if(document.getElementById('inputvalpunch<?php echo $key->id_process; ?>').value == 1 ){
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
									<?php echo form_open('breakdown/delete_punch/'.$this->uri->segment(3)); ?>
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
			echo "<input type='hidden' value='0' id='puncha'>";
		}
		?>
</table>