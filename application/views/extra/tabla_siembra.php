<table class="table table-hover" id="tabla-empresa">
		<th>Cantidad</th>
		<th>Fecha</th>	
		<th>Semilla</th>	
		<th>Comentario</th>
		<th>Editar</th>
		<th>Eliminar</th>
	
		<?php 
		if(is_array($sowing))
		{
			foreach ($sowing as $key) 
			{
				echo "<tr>";
				echo "<td>" . number_format($key->volume) . "</td>";
				echo "<td>" . date("d-m-Y",strtotime($key->sowing_date)) . "</td>";
				//$breakdownn=$this->model_order->get_breakdown_id_breakdown($key->id_breakdown);
				echo "<td>" . $key->seed. "</td>";
				if($key->comment != null){
				echo "<td>" ?>

					<a href="#myModal2<?php echo $key->id_sowing; ?>" class="btn btn-default"
	                    title="Comentario"
	                    data-toggle="modal">
						<i class="fa fa-comment-o"></i>
	                </a>
					
					<div id="myModal2<?php echo $key->id_sowing;  ?>" class="modal fade">
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
				
					<a href="#myModaledit<?php echo $key->id_sowing; ?>" class="btn btn-default"
	                    title="Editar"
	                    data-toggle="modal">
						<i class="fa fa-edit"></i>
	                </a>
					<?php 
						$attributes = array('id' => 'edit_sowing'.$key->id_sowing,'name'=>'edit_sowing'.$key->id_sowing);
						echo form_open('breakdown/edit_sowing/'.$this->uri->segment(3),$attributes); 
					?>
					<div id="myModaledit<?php echo $key->id_sowing; ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
            						<div class="modal-header">
	                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    				<h4 class="modal-title">Editar Siembra</h4>
	                				</div>
	                				<div class="modal-body">
					                	<div class="input-group">
											<p>Semilla: <?php echo $key->seed; ?></p>
										</div><!-- End Semilla -->	
										<div>
											<input type="hidden" id="inputval2<?php echo $key->id_sowing; ?>" name="inputval2<?php echo $key->id_sowing; ?>" value="1" />
											<input type="hidden" id="id_sowing" name="id_sowing" value="<?php echo $key->id_sowing; ?>" />
										</div>
										<div class="input-group">
											<p>Cantidad</p>
											<input type="text" class="form-control" placeholder="Cantidad" name="editVolume<?php echo $key->id_sowing; ?>" id="editVolume<?php echo $key->id_sowing; ?>" value="<?php echo $key->volume; ?>" onkeydown="valor_max<?php echo $key->id_sowing; ?>(this.value,<?php echo  $key->id_seed;?>,<?php echo $key->id_sowing; ?>)">
										</div><!-- End Cantidad -->
										<p>Fecha</p>
										<div class="input-group">
											<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondate<?php echo $key->id_sowing; ?>"><i class="fa fa-calendar"></i></a><input type="text" class="form-control" value="<?php echo date("d-m-Y",strtotime($key->sowing_date)); ?>" placeholder="<?php echo date("d-m-Y",strtotime($key->sowing_date)); ?>" id="datepicker<?php echo $key->id_sowing; ?>" name="datepicker<?php echo $key->id_sowing; ?>" style="width:92%; float: right;" readonly></p>
										</div><!-- End fecha -->
										<div class="input-group">
											<p>Comentario</p>
											<textarea class="form-control" rows="4" style="height: auto;" id="editComment<?php echo $key->id_sowing; ?>" name="editComment<?php echo $key->id_sowing; ?>"><?php echo $key->comment;?></textarea>										
										</div><!-- End Alcance -->				
					                </div>
	                				<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    					<button type="submit" class="btn btn-success" id="buttonEditSowing" name="<?php echo $key->id_sowing; ?>">Confirmar</button>
	                				</div>
            				</div>
        				</div>
    				</div>
    				</form><!--endform2-->

    				<script>

    				$(function() {
						//alert("entro");
						$( "#datepicker<?php echo $key->id_sowing; ?>" ).datepicker();
					});
					$(function() {    
				       $('#butondate<?php echo $key->id_sowing; ?>').click(function() {
				          $('#datepicker<?php echo $key->id_sowing; ?>').datepicker('show');
				       });
				    });

				    $('#buttonEditSowing').click(function() {
				    	var btn = $(this)
				        btn.button('loading')
				        setTimeout(function () {
				            btn.button('reset')
				        }, 2000)
					});
					
					$("#edit_sowing<?php echo $key->id_sowing;?>").validate({
						
						rules: {
							editVolume<?php echo $key->id_sowing; ?>: {
								required: true,
								number: true,
								valor_max2<?php echo $key->id_sowing; ?>: true,
								min:0

							}
						},
						messages: {
		            		 
			                editVolume<?php echo $key->id_sowing; ?>: {
			                    required: "Este Campo es Requerido",
			                    number: "Este Campo debe ser Númerico",
			                    min:"Cantidad Invalida"
			                    //remote:"Cantidad Invalida"
			                }
					  	}
					});

					$.validator.addMethod("valor_max2<?php echo $key->id_sowing; ?>", valor_max2<?php echo $key->id_sowing; ?>, "Cantidad Invalida");
					

					 function valor_max<?php echo $key->id_sowing; ?>(volume,seed,sowing){
						$.ajax({
							url: "<?php echo base_url('index.php/breakdown/max_edit_volume_sowing'); ?>", 
							data: {'volume':volume,'seeds':seed,'sowing':sowing},
							type: "POST",
							success: function(data){
								document.getElementById('inputval2<?php echo $key->id_sowing; ?>').value=data;
								
							},
							failure:function(data){
								
							}
						});
						
					}

					function valor_max2<?php echo $key->id_sowing; ?>(){
						if(document.getElementById('inputval2<?php echo $key->id_sowing; ?>').value == 1 ){
							return true;
						}else return false;
					}

					
					</script>
		<?php 
				echo "</td>";
				echo "<td>";?>
				
					<a href="#myModal11<?php echo $key->id_sowing; ?>" class="btn btn-default"
	                    title="Eliminar"
	                    data-toggle="modal">
						<i class="fa fa-times"></i>
	                </a>
					
					<div id="myModal11<?php echo $key->id_sowing; ?>" class="modal fade">
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
									<?php echo form_open('order/delete_sowing/'.$this->uri->segment(3)); ?>
                    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    					<button type="submit" class="btn btn-success" name="<?php echo $key->id_sowing; ?>">Confirmar</button>
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
