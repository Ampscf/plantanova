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
						<div class="clear">&nbsp</div>
						<div class="clear">&nbsp</div><div class="clear">&nbsp</div>
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
			                    			<button type="submit" class="btn btn-success" name="">Confirmar</button>
										</div>
				                	</div>
				                </div>
				            </div>	
			        	</form>

			        <script>

					  	    
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
			                    			<button type="submit" class="btn btn-success" name="">Confirmar</button>
										</div>
				                	</div>
				                </div>
				            </div>	
			        	</form>

			        <script>

					  	    
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


					</div>
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->