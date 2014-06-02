<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div id="result">				
				<div class="panel-header">
					<ul class="nav nav-tabs">
						<li><a>Cliente</a></li>
						<li class="active"><a>Orden</a></li>
						<li><a>Desglose</a></li>
						<li><a>Resumen</a></li>
						<li style="position: relative; left:50%;"><a>Cliente: <?php echo $company->farm_name; ?></a></li>
					</ul>
				</div>
				<?php
				$id_plant=$order->result()[0]->id_plant;
				$id_category=$order->result()[0]->id_category;
				$datepicker=$order->result()[0]->order_date_delivery;
				$date=date("m/d/Y",strtotime($datepicker));
				$volume=$order->result()[0]->total_volume;
				$branch_number=$order->result()[0]->branch_number;
				$tutoring=$order->result()[0]->tutoring;

				$plant_name=$this->model_order->get_plant($id_plant);
				$category_name=$this->model_order->get_category($id_category);

				if(isset($order_comment->result()[0]->comment_description)){
				$comment=$order_comment->result()[0]->comment_description;
				}else{
					$comment="";
				}
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
								<h3><span class="glyphicon glyphicon-list-alt"></span> Nuevo Pedido</h3>
								<input type="hidden" value="<?php echo $id_client=$order->result()[0]->id_client;?>" id="id_company" name="id_company">
								<input type="hidden" value="<?php echo $id_order=$order->result()[0]->id_order;?>" id="id_order" name="id_order">
							</div>							
							<div class="clear">&nbsp</div>
							<div class="col-md-6">
							
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">									

									<p>Tipo de Cultivo</p>
									<select class="form-control" name="plant" id="plant">
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
									<p>Fecha de entrega</p>
									<p><input type="text" class="form-control" placeholder="--Selecciona una Fecha--" id="datepicker" name="datepicker" readonly value="<?php echo $date;?>"></p>
								</div><!-- End Date -->
								<?php echo form_error('datepicker'); ?>
								
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Brazos</p>
									<select class="form-control" name="arms" id="arms">
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
							
							</div>						

							<div class="col-md-6">
							
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Categoría</p>
									<select class="form-control" name="category" id="category">
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
									<p>Volumen</p>
									<input type="text" class="form-control" placeholder="Volumen" name="volume" id="volume" value="<?php echo $volume;?>">
								</div><!-- End Volume -->
								<?php echo form_error('volume'); ?>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Tutoreo</p>
										<select class="form-control" name="tutoring" id="tutoring">
											<?php if($tutoring==0){?>
											<option value="0" selected>No</option>
											<option value="1">Si</option>
											<?php }else{?>
											<option value="1" selected>Si</option>
											<option value="0" >No</option>
											<?php } ?>
											
											
										</select>
								</div><!-- End Tutoring -->
							<?php echo form_error('tutoring'); ?>
							</div>
						
							<div class="col-md-12">
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Comentarios</p>
									<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment" ><?php echo $comment;?></textarea>								
								</div><!-- End Comments -->
							</div>					

						</div>
				
					</div><!-- End panel-body -->

					<div class="panel-footer">						
						<ul class="pager">
							<input type="submit" value="&larr; Anterior" class="btn btn-default" style="float: left;" id="before" name="before"/>
					        <input type="submit" value="Siguiente &rarr;" class="btn btn-default" style="float: right;" id="next" name="next" />
						</ul>	
					</div><!-- End panel-footer -->
					<?php echo form_close();?>
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->