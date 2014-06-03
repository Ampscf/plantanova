<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div id="result">						
					<div class="panel-header">				
						<ul class="nav nav-tabs">
							<li><a>Cliente</a></li>
							<li><a>Orden</a></li>
							<li><a>Desglose</a></li>
							<li class="active"><a>Resumen</a></li>
							<li style="position: relative; left:50%;"><a>Cliente: <?php echo $company->result()[0]->farm_name ?></a></li>
						</ul>
					</div>	
									
					<!-- Cuerpo del panel-->
					<div class="panel-body">
						<div class="col-md-12">
							<h1>Resumen</h1>
						</div>
						
						<div class="clear">&nbsp</div>		
						<div class="col-md-12">
							<h4>*Datos del cliente</h4>
						</div>
						
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<p>Nombre Completo: <?php echo $company->result()[0]->first_name . " " . $company->result()[0]->last_name;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Correo Electrónico: <?php echo $company->result()[0]->mail;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Teléfono: <?php echo $company->result()[0]->phone;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Calle/Colonia: <?php echo $company->result()[0]->street . " " . $company->result()[0]->colony;?></p>
							</div><!-- End Plant -->
							
						</div>
						
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<p>Número #: <?php echo $company->result()[0]->address_number;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>CP: <?php echo $company->result()[0]->cp;?></p>
							</div><!-- End Plant -->
						
							<div class="input-group input-group-lg">
								<p>Razón Social: <?php echo $company->result()[0]->social_reason;?></p>
							</div><!-- End Plant -->
							
						</div>
						
						<div class="clear">&nbsp</div>		
						<div class="col-md-12">
							<h4>*Datos del pedido</h4>
						</div>
						
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<p>Fecha: <?php echo date("y-m-d", strtotime($order->result()[0]->order_date_delivery));?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Tipo de cultivo: <?php echo $plant->result()[0]->plant_name;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Volumen total: <?php echo $order->result()[0]->total_volume;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Categoría: <?php echo $category->result()[0]->category_name;?></p>
							</div><!-- End Plant -->
							
						</div>
						
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<p>Volumen restante: <?php echo 'var';?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Brazos: <?php echo $order->result()[0]->branch_number;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Tutoreo: <?php echo $order->result()[0]->tutoring;?></p>
							</div><!-- End Plant -->
						</div>
						
						<div class="clear">&nbsp</div>					
						<div class="input-group input-group-lg">
							<h4>*Desglose de la orden:</h4>
						</div><!-- End Desglose -->					
						
						<table>
							<th>Sustrato</th>
							<th>Subtipo</th>
							<th>Variedad</th>
							<th>PortaInjerto</th>
							<th>Volumen</th>
							
							<tbody>
								<?php
								if(is_array($breakdown))
								{
									foreach ($breakdown as $key) 
									{
										$subtype_a=$this->model_order->get_id_sustratum($key->id_subtype);
										$subtype_name_a=$subtype_a->result()[0]->subtype_name;
										$sustratum_a=$this->model_order->get_sustratum_id($subtype_a->result()[0]->id_sustratum);
										$sustratum_name_a=$sustratum_a->result()[0]->sustratum_name;
										echo "<tr>";
										echo "<td>" . $sustratum_name_a . "</td>";
										echo "<td>" . $subtype_name_a . "</td>";
										echo "<td>" . $key->variety . "</td>";
										echo "<td>" . $key->rootstock . "</td>";
										echo "<td>" . $key->volume . "</td>";
										echo "</tr>";
									}
								}
								?>
							</tbody>
						</table>
						
					</div><!-- fin cuerpo del panel -->
									
					<div class="panel-footer">
						<ul class="pager">
							<?php 
							
							echo form_open('order/order_last_next_before');
							?>
							<input type="hidden" id="id_order" name="id_order" value="<?php echo $order->result()[0]->id_order; ?>">
							<input type="submit" value="&larr; Anterior" class="btn btn-default" style="float: left;" id="before" name="before"/>
					        <input type="submit" value="Agregar &rarr;" class="btn btn-default" style="float: right;" id="next" name="next"/>
							<?php form_close(); ?>
						</ul>
					</div><!-- fin panel footer -->	
					
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
