	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-tags"></i> Publicidad </h3>
					</div>
					<div class="panel-body">
							<h5 style="color:red;">
							<?php 							
								echo $this->session->flashdata('error');		
							?></h5>
					<div class="col-md-12">
						<div class="col-md-3 ">
							<div class="clear">&nbsp</div>
							<a href="#myModal" class="btn btn-default" data-toggle="modal">Agregar Publicidad a Cliente</a>
						</div>
						<div class="col-md-4">
							<div class="clear">&nbsp</div>
							<a href="#myModal2" class="btn btn-default" data-toggle="modal">Quitar Publicidad de Cliente</a>
						</div>
						<div class="col-md-2">
							<div class="clear">&nbsp</div>
							<a href="#myModal3" class="btn btn-default" data-toggle="modal">Agregar Publicidad</a>
						</div>
						<div class="col-md-2">
							<div class="clear">&nbsp</div>
							<a href="#myModal4" class="btn btn-default" data-toggle="modal">Eliminar Publicidad</a>
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


				<?php echo form_open('publicity/send_publicity/');?>
					<div id="myModal" class="modal fade">
		        		<div class="modal-dialog">
		            		<div class="modal-content">
		                		<div class="modal-header">
		                			<h4 class="modal-title">Agregar Publicidad a Cliente</h4>	  
		                		</div>
		                		<div class="modal-body">
		                			
				                	<h3>Seleccionar cliente</h3>
									<select class="form-control" name="client" id="client">
										<?php 
											foreach($users as $key)
											{
												echo "<option value='" . $key->id_user . "' set_select('state','".$key->id_user."')>" . $key->farm_name . "</option>";
											}
										?>
									</select>
									<div class="clear">&nbsp</div>
									<h3>Selecciona la publicidad a enviar</h3>
									<select class="form-control" name="pub" id="pub" onchange="pu(this.value)">
											<option value="-1" selected>---Selecciona una publicidad---</option>
										<?php 
											foreach($publicity as $key)
											{
												echo "<option value='" . $key->id_publicity . "' set_select('state','".$key->id_publicity."')>" . $key->p_name . "</option>";
											}
										?>
									</select>
									<div class="clear">&nbsp</div>
									<div id="p2" class="img-previ"></div> 
									<div class="clear">&nbsp</div>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    			<button type="submit" class="btn btn-success" name="" onclick="update_pass()">Confirmar</button>
		                		</div>
		            		</div>
		        		</div>
		        	</div>
		        </form>

						<script>
						function pu(data){
							var posicion = data;
				           
				           $.ajax({
							url: site_url + 'publicity/get_publicity_image',
							data: {'id_publicity':+posicion},
							type: "POST",
							success: function(data){
								$("#p2").html(data);
								//alert(data);
							},
							failure:function(data){
								alert("fallo");
							}	
							});
						}
						</script>
					
				<?php echo form_open('publicity/delete_publicity');?>
					<div id="myModal2" class="modal fade">
		        		<div class="modal-dialog">
		            		<div class="modal-content">
		                		<div class="modal-header">
		                			<h4 class="modal-title">Quitar Publicidad del Cliente</h4>	  
		                		</div>
		                		<div class="modal-body">
		                			<div class="input-group">
		                				<p>Seleccionar Cliente</p>										     		
			                			<select class="form-control" name="client" id="client" onchange="get_publicity(this.value);">
			                				<option value="-1" selected>---Selecciona un usuario---</option>
											<?php
												foreach($users as $key)
												{
													echo "<option value='" . $key->id_user . "' set_select('user','".$key->id_user."')>" . $key->farm_name . "</option>";
												}
											?>
										</select>
									</div>
		                			<div class="clear">&nbsp</div>
			                		<div class="input-group">
			                			<p>Seleccionar la publicidad a quitar</p>
										 <select class="form-control" name="public" id="public" onchange="pu2(this.value)">
											<option value="-1" selected>---Selecciona una publicidad---</option>
										</select>   		
			                		</div>
			                				 
			                		<div class="clear">&nbsp</div>
									<div id="p3" class="img-previ"></div> 
									<div class="clear">&nbsp</div>               		
		                		</div>
		                		<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    			<button type="submit" class="btn btn-success" name="" onclick="update_pass()">Confirmar</button>
		                		</div>
		            		</div>
		        		</div>
		        	</div>
		        </form>
					<script>
						function pu2(data){
							var posicion = data;
				           if(posicion>0){
					           	$.ajax({
								url: site_url + 'publicity/get_publicity_image2',
								data: {'id_pub_client':+posicion},
								type: "POST",
								success: function(data){
									$("#p3").html(data);
									//alert(data);
								},
								failure:function(data){
									alert("fallo");
								}	
								});
					        }else{
					        	$("#p3").html("");
					        }
				           
						}
					</script>

			<div id="myModal3" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar Publicidad</h4>
            			</div>
            			<div class="modal-body">

                			<?php
                				$attributes = array('id' => 'newpub', 'name' => 'newpub'); 
                				echo form_open_multipart('publicity/upload_publicity/');
                			?>
                			<p>Nombre:</p>
							<input id="p_name" name="p_name" placeholder="Nombre" />
                			<p>Elige una imagen de publicidad</p>
							<input id="uploadFile" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn").onchange = function () {
					    			document.getElementById("uploadFile").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>

			<script>
			$("#newpub").validate({
				rules: {
					p_name: {
						required: true
					}, 
					messages: {
						p_name: "El Campo Nombre es Requerido"
					}
				}
			});
			</script>

			<div id="myModal4" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Eliminar Publicidad</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('publicity/delete_pub/');?>
                			<p>Elige la publicidad a eliminar</p>
							<select class="form-control" name="publy" id="publy">
								<?php 
									foreach($publicity as $key)
									{
										echo "<option value='" . $key->id_publicity . "' set_select('state','".$key->id_publicity."')>" . $key->p_name . "</option>";
									}
								?>
							</select>
							<p class="text-warning"><small>Eliminando una publicidad también la quitará de todos los clientes.</small></p>
           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary">Eliminar</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>