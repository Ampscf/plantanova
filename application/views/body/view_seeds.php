	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Semillas </h3>
				</div>
					<div class="panel-body">
						<div class="clear">&nbsp</div>
						<div class="table-responsive">
							<a href="#myModal" class="btn btn-success" data-toggle="modal">+ Agregar Marca de Semillas</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive">
							<?php include_once('application/views/extra/tabla_semillas_index.php'); ?>
						</div>
						<?php
						$attributes = array('id' => 'register_mark','name'=>'register_mark');
						echo form_open('seeds/register_mark',$attributes); 
						?>
							<div id="myModal" class="modal fade">
				        		<div class="modal-dialog">
				            		<div class="modal-content">
				                		<div class="modal-header">
				                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                    		<h4 class="modal-title">Nueva Marca de Semillas</h4>
				                		</div>
				                		<div class="modal-body">
				                			<div class="clear">&nbsp</div>
												<h3>Marca</h3>
												<div class="input-group input-group-lg">												
													<input type="text" class="form-control" placeholder="Marca" name="mark" id="mark">
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


					</div>
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->