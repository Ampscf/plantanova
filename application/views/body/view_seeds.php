	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Semillas </h3>
				</div>
					<div class="panel-body">
						<div class="clear">&nbsp</div>
						<div class="col-md-3">					
							<div class="input-group input-group-lg">
								<a href="#myModal2" class="btn btn-success" data-toggle="modal">+Agregar Variedad</a>
							</div>				
						</div>
						<div class="col-md-3">
							<div class="input-group input-group-lg">
								<a href="#myModal3" class="btn btn-success" data-toggle="modal">+Agregar Portainjerto</a>
							</div>	
						</div>
						<div class="col-md-3">					
							<div class="input-group input-group-lg">
								<a href="#myModal4" class="btn btn-primary" data-toggle="modal">Eliminar Variedad</a>
							</div>				
						</div>
						<div class="col-md-3">
							<div class="input-group input-group-lg">
								<a href="#myModal5" class="btn btn-primary" data-toggle="modal">Eliminar Portainjerto</a>
							</div>	
						</div>
						<div >&nbsp</div>
						<div >&nbsp</div><div class="clear">&nbsp</div>
						<div class="table-responsive">
							<?php include_once('application/views/extra/tabla_semillas_index.php'); ?>
						</div>
						

						    <?php
						$attributes = array('id' => 'register_variety','name'=>'register_variety');
						echo form_open('order/register_variety/'.$this->uri->segment(3),$attributes); 
						?>
							<div id="myModal2" class="modal fade">
				        		<div class="modal-dialog">
				            		<div class="modal-content">
				                		<div class="modal-header">
				                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                    		<h4 class="modal-title">Nueva Variedad</h4>
				                		</div>
				                		<div class="modal-body">
												<h3>Variedad</h3>
												<div class="input-group input-group-lg">												
													<input type="text" class="form-control" placeholder="Variedad" name="variedad" id="variedad">
												</div><!-- End cantidad -->		
				                		</div>
				                		<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			                    			<button type="submit" id="button" class="btn btn-success" name="">Confirmar</button>
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

					  	    
						$("#register_variety").validate({
							rules: {
								variedad:{
									required: true
								}								
							},
							messages: {
                        		variedad:{
                        			required:"Este Campo es Requerido"
                        		}
				            }
						});
					</script>

					<?php
						$attributes = array('id' => 'register_rootstock','name'=>'register_rootstock');
						echo form_open('order/register_rootstock/'.$this->uri->segment(3),$attributes); 
						?>
							<div id="myModal3" class="modal fade">
				        		<div class="modal-dialog">
				            		<div class="modal-content">
				                		<div class="modal-header">
				                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                    		<h4 class="modal-title">Nuevo Portainjerto</h4>
				                		</div>
				                		<div class="modal-body">
												<h3>Portainjerto</h3>
												<div class="input-group input-group-lg">												
													<input type="text" class="form-control" placeholder="Portainjerto" name="portainjerto" id="portainjerto">
												</div><!-- End cantidad -->		
				                		</div>
				                		<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			                    			<button type="submit" id="buttom" class="btn btn-success" name="">Confirmar</button>
										</div>
				                	</div>
				                </div>
				            </div>	
			        	</form>

			        <script>

			        $('#buttom').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});

					  	    
						$("#register_rootstock").validate({
							rules: {
								portainjerto:{
									required: true
								}								
							},
							messages: {
                        		portainjerto:{
                        			required:"Este Campo es Requerido"
                        		}
				            }
						});
					</script>

					<?php
						$attributes = array('id' => 'delete_variety','name'=>'delete_variety');
						echo form_open('seeds/delete_variety',$attributes); 
						?>
							<div id="myModal4" class="modal fade">
				        		<div class="modal-dialog">
				            		<div class="modal-content">
				                		<div class="modal-header">
				                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                    		<h4 class="modal-title">Eliminar Variedad</h4>
				                		</div>
				                		<div class="modal-body">
											<h3>Variedad</h3>
											<div class="input-group">
												<select class="form-control" name="vari" id="vari" >
													<option value="-1" selected>---Selecciona una Variedad---</option>
													<?php 
														foreach($variety as $key)
														{
															echo "<option value='$key->id_variety'"." set_select('id_variety','".$key->id_variety."')>" .$key->variety_name."</option>";
														}
														
													?>	
												</select>
											</div><!-- End Cantidad -->		
				                		</div>
				                		<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			                    			<button type="submit" id="buttop" class="btn btn-success" name="">Confirmar</button>
										</div>
				                	</div>
				                </div>
				            </div>	
			        	</form>

			        <script>

			        	$('#buttop').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});
					  	    
						$("#delete_variety").validate({
							rules: {
								vari:{
									vari: true
								}
				            }
						});
						$.validator.addMethod("vari", vari, "Selecciona una Variedad");
						function vari(){
							if (document.getElementById('vari').value < 0){
								return false;
							}
							else return true;
						}
					</script>

					<?php
						$attributes = array('id' => 'delete_rootstock','name'=>'delete_rootstock');
						echo form_open('seeds/delete_rootstock/',$attributes); 
						?>
							<div id="myModal5" class="modal fade">
				        		<div class="modal-dialog">
				            		<div class="modal-content">
				                		<div class="modal-header">
				                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                    		<h4 class="modal-title">Eliminar Portainjerto</h4>
				                		</div>
				                		<div class="modal-body">
												<h3>Portainjerto</h3>
											<div class="input-group">
												<select class="form-control" name="por" id="por" >
													<option value="-1" selected>---Selecciona un Portainjerto---</option>
													<?php 
														foreach($rootstock as $key)
														{
															echo "<option value='$key->id_rootstock'>" .$key->rootstock_name."</option>";
														}
														
													?>	
												</select>
											</div><!-- End Cantidad -->		
				                		</div>
				                		<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			                    			<button type="submit" id="buttol" class="btn btn-success" name="">Confirmar</button>
										</div>
				                	</div>
				                </div>
				            </div>	
			        	</form>

			        <script>
			        	$('#buttol').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});
					  	    
						$("#delete_rootstock").validate({
							rules: {
								por:{
									por: true
								}
				            }
						});

						$.validator.addMethod("por", por, "Selecciona un Portainjerto");
						
						function por(){
							if (document.getElementById('por').value < 0){
								return false;
							}
							else return true;
						}
					</script>


					</div>
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->