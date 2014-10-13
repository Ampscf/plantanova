	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-tags"></i> Archivos </h3>
					</div>
					<div class="panel-body">
							<h5 style="color:red;">
							<?php 							
								echo $this->session->flashdata('error');		
							?></h5>
					<div class="row">
						<div class="col-xs-12 col-md-12 pubcol1 ">
							<a href="#myModal" class="btn btn-success" data-toggle="modal">+Agregar Archivo</a>
							<a href="#myModal1" class="btn btn-primary" data-toggle="modal">Eliminar Archivo</a>
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
</div> <!-- End content div -->


				<?php
					$attributes = array('id' => 'upload_files','name'=>'upload_files');
					echo form_open_multipart('files/upload_files/',$attributes);
				?>
					<div id="myModal" class="modal fade">
		        		<div class="modal-dialog">
		            		<div class="modal-content">
		                		<div class="modal-header">
		                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                			<h4 class="modal-title">Agregar Archivo</h4>	  
		                		</div>
		                		<div class="modal-body">
		                			
				                	<h3>Selecciona la orden</h3>
									<select class="form-control" name="order" id="order">
										<?php 
											foreach($order as $key)
											{
												echo "<option value='" . $key->id_order . "'>" ."Orden: ".$key->id_order." Agricultor: ". $key->farmer .  "</option>";
											}
										?>
									</select>
									<div class="clear">&nbsp</div>
									
									
										<h3 style='color:#6BBD44'>Selecciona un Archivo</h3>
										<input id='uploadFile".$key->id_breakdown."' placeholder='Elige una imagen' disabled='disabled' style='height: 30px; width: 100%;' value=''/>
										<div class='fileUpload btn btn-success' style='width: 100%; margin: 0px; margin-top: 10px;'>
			    							<span>Buscar</span>
										    <input id='uploadBtn".$key->id_breakdown."' type='file' class='upload' name='userfile'/>
										</div>

										<script>
											document.getElementById('uploadBtn".$key->id_breakdown."').onchange = function () {
								    			document.getElementById('uploadFile".$key->id_breakdown."').value = this.value;
											};
										</script>
									
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    			<button type="submit" class="btn btn-success" id="button" name="" onclick="update_pass()">Confirmar</button>
		                		</div>
		            		</div>
		        		</div>
		        	</div>
		        </form>

						<script>
						$('#button').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});
						</script>
					

				<?php
					$attributes = array('id' => 'delete_files','name'=>'delete_files');
					echo form_open_multipart('files/delete_files/',$attributes);
				?>
					<div id="myModal1" class="modal fade">
		        		<div class="modal-dialog">
		            		<div class="modal-content">
		                		<div class="modal-header">
		                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                			<h4 class="modal-title">Eliminar Archivo</h4>	  
		                		</div>
		                		<div class="modal-body">
		                			
				                	<h3>Selecciona la orden</h3>
									<select class="form-control" name="order" id="order" onchange="get_file(this.value)">
										<?php 
											echo "<option value='-1'>Selecciona una orden</option>";
											foreach($order as $key)
											{
												echo "<option value='" . $key->id_order . "'>" ."Orden: ".$key->id_order." Agricultor: ". $key->farmer .  "</option>";
											}
										?>
									</select>
									<div class="clear">&nbsp</div>
									<h3>Selecciona un archivo</h3>
									<select class="form-control" name="order_delete" id="order_delete">
										
									</select>
									
										
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    			<button type="submit" class="btn btn-success" id="button" name="" onclick="update_pass()">Confirmar</button>
		                		</div>
		            		</div>
		        		</div>
		        	</div>
		        </form>

						<script>
						$('#button').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});

						$("#delete_files").validate({
							rules:{
								order: {
						            min: 0
						        }
							},
							messages:{
								
						       	order:{
						        	min:"Selecciona una Orden"
						        }
							}
						});

						function get_file(id_order){
							if($("#order [value='-1']").length)
							{
								$("#order [value='-1']").remove();
							}
					    	$.ajax({
								url: site_url + 'files/get_files',
								data: {'id_order':+id_order},
								type: "POST",
								success: function(data){
									$("#order_delete").html(data);
								},
								failure:function(data){
									alert("fallo");
								}
							});
					    }
						</script>