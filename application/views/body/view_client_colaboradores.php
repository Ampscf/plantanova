<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Colaboradores</h3>
					</div>
					<div class="panel-body">
						<div class="col-md-6 col-md cat">
							<h1>¡Hola <?php echo $user[0]->farm_name; ?>!<h1>
																	
						<?php 
						$cont=0;
						if(is_array($messages)){
						$lon=count($messages);
						
						foreach($messages as $key){
								$cont++;			
							echo "<div id='cliente".$cont."'><table class='contenido' >
							<tr>
							<td><a href='".$key->p_url."' target='blank'><img src='/plantanova/img/Publicidad/".$key->p_image."' width'850' height='450'></a></td>	
							<td><div id='text1' class='texto'>".$key->p_parrafo1."</div><br><div id='text2' class='texto'>".$key->p_parrafo2."</div><br><div id='text3' class='texto'> ".$key->p_parrafo3."</div></td>
							</tr>
							</table>	<button type='button' class='glyphicon glyphicon-arrow-right'  Onclick='cambio(".$cont.",".$lon.")'></button></div>";
							echo "<style> div#cliente".$cont."{display:none;}</style>";
						}
						if($this->uri->segment(3)){
							$default="cliente".$this->uri->segment(3);
							
							echo "<style>div#".$default."{display:block;}</style>";
						}else{
							echo "<style>div#cliente1{display:block;}</style>";
						}
						}
						?>
						
						<script type="text/javascript">
							function cambio(cont,lon){
							cont++;
							if(cont<=lon){
							aux=cont-1;
							caja1="cliente"+aux;
							caja2="cliente"+cont;
								document.getElementById(caja1).style.display="none";
								document.getElementById(caja2).style.display="block";
							
							}else{
							aux=cont-1;
							caja1="cliente"+aux;
								document.getElementById(caja1).style.display="none";
								document.getElementById("cliente1").style.display="block";
							}

							}

						</script>

						</div>

					</div>
				</div>
			
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->