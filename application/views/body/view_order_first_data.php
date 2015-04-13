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
						<li style="position: relative; left:35%;"><a>Cliente: <?php echo $company[0]->farm_name; ?></a></li>
					</ul>
				</div>
				<?php
				$order_number=$order->result()[0]->order_number;
				$id_plant=$order->result()[0]->id_plant;
				$id_category=$order->result()[0]->id_category;
				$datepicker=$order->result()[0]->order_date_delivery;
				$date=date("d-m-Y",strtotime($datepicker));
				$volume=$order->result()[0]->total_volume;
				$branch_number=$order->result()[0]->branch_number;
				$tutoring=$order->result()[0]->tutoring;
				$farmer=$order->result()[0]->farmer;

				$plant_name=$this->model_order->get_plant($id_plant);
				$category_name=$this->model_order->get_category($id_category);
				$comment=$order->result()[0]->comment;

				
				?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<?php 
						$attributes = array('id' => 'update','name' => 'update');
						echo form_open('order/pending_order_first_next_before_update',$attributes);
						?>

						<!-- farm name, street, addr number, colony, cp, state, city, phone, social reason, rfc -->
						<div class="col-md-12">
							<div class="clear">&nbsp</div>
							<div class="col-md-12">
								<h2><span class="glyphicon glyphicon-list-alt"></span> Nuevo Pedido</h2>
								<input type="hidden" value="<?php echo $id_client=$order->result()[0]->id_client;?>" id="id_company" name="id_company">
								<input type="hidden" value="<?php echo $id_order=$order->result()[0]->id_order;?>" id="id_order" name="id_order">
							</div>							
							<div class="clear">&nbsp</div>
							<div class="col-md-6">
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">									

									<h3>Número de Pedido</h3>
									<input type="text" class="form-control" placeholder="Número de Pedido" name="order_number" id="order_number" value="<?php echo $order_number; ?>" onkeydown="valor(this.value)" tabindex="1">
									<input type="hidden" class="form-control"  name="order_number_input" id="order_number_input">
								</div><!-- End Plant -->
								
														
							
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h3>Fecha de entrega</h3>
									<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondate"><i class="fa fa-calendar"></i></a><input type="text" class="form-control" placeholder="--Selecciona una Fecha--" id="datepicker" name="datepicker" readonly style="width:92%; float:right" value="<?php echo $date;?>" tabindex="3"></p>
								</div><!-- End Date -->
								<?php echo form_error('datepicker'); ?>
								
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h3>Brazos</h3>
									<select class="form-control" name="arms" id="arms" tabindex="5">
										<?php if($branch_number==2){?>
											<option value="2" selected>2</option>
											<option value="1">1</option>
											<?php }else{?>
											<option value="1" selected>1</option>
											<option value="2" >2</option>
											<?php } ?>
										
										
									</select>	
								</div><!-- End Arms -->	
								<?php echo form_error('arms'); ?>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h3>Agricultor</h3>
									<input type="text" class="form-control" placeholder="Agricultor" name="farmer" id="farmer"  value="<?php echo $farmer;?>" tabindex="7">
								</div><!-- End Volume -->							
							
							</div>						

							<div class="col-md-6">
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">									

									<h3>Tipo de Cultivo</h3>
									<select class="form-control" name="plant" id="plant" tabindex="1">
										<option value="<?php echo $id_plant;?>" selected><?php echo $plant_name=$plant_name->result()[0]->plant_name; ?></option>
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
									<h3>Categoría</h3>
									<select class="form-control" name="category" id="category" tabindex="2">
										<option value="<?php echo $id_category;?>" selected><?php echo $category_name=$category_name->result()[0]->category_name; ?></option>
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
									<input type="text" class="form-control" placeholder="Volumen" name="volume" id="volume"  value="<?php echo $volume;?>" tabindex="4">
								</div><!-- End Volume -->
								<?php echo form_error('volume'); ?>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h3>Tutoreo</h3>
										<select class="form-control" name="tutoring" id="tutoring" tabindex="6">
											<?php if($tutoring=="No"){?>
											<option value="No" selected>No</option>
											<option value="Si">Si</option>
											<?php }else{?>
											<option value="Si" selected>Si</option>
											<option value="No" >No</option>
											<?php } ?>
											
											
										</select>
								</div><!-- End Tutoring -->
							<?php echo form_error('tutoring'); ?>
							</div>
						
							<div class="col-md-12">
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Comentarios</p>
									<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment" tabindex="8"><?php echo $comment;?></textarea>								
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
					      	<input type="hidden" value="<?php echo $id_client=$order->result()[0]->id_client;?>" id="id_company" name="id_company">
					       <?php echo form_close();?>
					       </ul>	
					</div><!-- End panel-footer -->
					
					 <script>
					     $("#datepicker").datepicker({

					        minDate: 0,
					        onSelect: function(selected) {
					          $("#txtToDate").datepicker("option","minDate", selected)
					        }
					    });

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
						       		required: true
						       },
						        category: {
						            category: true
						        },
						         farmer: {
						            required: true
						        }
							},
							messages: {
                        		volume: {
				                    required: "El Campo Volumen es Requerido",
				                    number: "El Campo Volumen debe ser Numerico"
				                },
				                datepicker: {
				                    required: "El Campo Fecha es Requerido"
				                },
				                farmer: {
				                    required: "El Campo Agricultor es Requerido"
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
														
							if(value == "--Selecciona una Fecha--" )
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