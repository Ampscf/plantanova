<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Breakdown extends CI_Controller {
	function __construct() {
	   parent::__construct();
	   $this->load->model('model_breakdown','',TRUE);
	   $this->load->model('model_order','',TRUE);
	   $this->load->model('model_user','',TRUE);
	}
	
	public function index()
	{
		if($this->session->userdata('id_rol')==1){
			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_admin_body.php';
			$template['footer'] = "footer/view_footer.php";
			//Manda los datos necesarios para cargar los pedidos y datos del usuario
			$template['pedidos'] = $this->model_breakdown->get_new_orders();

			$this->load->view('main',$template);
		} else {
			redirect('client/index/1');
		}
	}

	public function pedido_nuevo(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body.php';
		$template['footer'] = "footer/view_footer.php";
		$template['pedidos'] = $this->model_breakdown->get_new_orders();
		$this->load->view("extra/tabla_pedido_nuevo",$template);
	}

	public function pedido_proceso(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body_process.php';
		$template['footer'] = "footer/view_footer.php";
		$template['pedidos_proceso'] = $this->model_breakdown->get_process_orders();
		$template['pedidos_proceso_germination'] = $this->model_breakdown->get_process_germination();
		$template['pedidos_proceso_graft'] = $this->model_breakdown->get_process_graft();
		$template['pedidos_proceso_punch'] = $this->model_breakdown->get_process_punch();
		$template['pedidos_proceso_transplant'] = $this->model_breakdown->get_process_transplant();
		$template['pedidos_proceso_tutoring'] = $this->model_breakdown->get_process_tutoring();
		$template['pedidos_proceso_sowing'] = $this->model_breakdown->get_process_sowing();
		$this->load->view("main",$template);
	}

	public function pedido_embarcado(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body_embarcado.php';
		$template['footer'] = "footer/view_footer.php";
		$template['pedidos_embarcados'] = $this->model_breakdown->get_embarker_orders();
		$this->load->view("main",$template);
	}

	public function todos()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_all.php';
		$template['footer'] = "footer/view_footer.php";
		$template['pedidos_todos'] = $this->model_breakdown->get_all_orders();

		$this->load->view("main",$template);
	}
	public function cancelados()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body_cancelados.php';
		$template['footer'] = "footer/view_footer.php";
		$template['pedidos_cancelados'] = $this->model_breakdown->get_cancel_orders();

		$this->load->view("main",$template);
	}

	public function finalizado(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body_finalizados.php';
		$template['footer'] = "footer/view_footer.php";
		$template['pedidos_finalizados'] = $this->model_breakdown->get_final_orders();

		$this->load->view("main",$template);
	}
	
	public function finish(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$this->model_breakdown->finish_status($this->uri->segment(3));
		redirect("breakdown/finalizado","refresh");
	}

	public function process()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$breakdown=$this->model_order->get_breakdown($this->uri->segment(3));
		$images=$this->model_breakdown->get_image_process($this->uri->segment(3));
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_process.php';
		$template['footer'] = 'footer/view_footer.php';
		$template['id_order']=$this->uri->segment(3);
		$template['order_number']=$order->result()[0]->order_number;
		$template['id_company']=$order->result()[0]->id_client;
		$template['company']=$this->model_user->get_client($order->result()[0]->id_client);
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['id_plant']=$order->result()[0]->id_plant;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categ']=$order->result()[0]->id_category;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category);
		$template['client']=$this->model_user->obtenerCliente($order->result()[0]->id_client);
		$template['breakdown']=$breakdown;
		$template['germination'] = $this->model_breakdown->get_germination($this->uri->segment(3));
		$template['graft'] = $this->model_breakdown->get_graft($this->uri->segment(3));
		$template['punch']= $this->model_breakdown->get_punch($this->uri->segment(3));
		$template['transplant']= $this->model_breakdown->get_transplant($this->uri->segment(3));
		$template['tutoring']= $this->model_breakdown->get_tutoring($this->uri->segment(3));
		$template['suma']=$this->model_order->suma_volumen_sowing($this->uri->segment(3));
		$template['total_germ']=$this->model_order->get_total_germ($this->uri->segment(3));
		$template['total_graft']=$this->model_order->get_total_graft($this->uri->segment(3));
		$template['total_punch']=$this->model_order->get_total_punch($this->uri->segment(3));
		$template['total_transplant']=$this->model_order->get_total_transplant($this->uri->segment(3));
		$template['total_tutoring']=$this->model_order->get_total_tutoring($this->uri->segment(3));
		$template['t_total_seed']=$this->model_order->get_t_total_seed($this->uri->segment(3));
		$template['sowing'] = $this->model_order->get_sowing($this->uri->segment(3));
		$template['seeds']=$this->model_order->get_seeds($this->uri->segment(3));
		$template['farmer']=$order->result()[0]->farmer;
		$template['varial']=$this->model_breakdown->get_sowing($this->uri->segment(3));
		$template['error']=$this->session->flashdata('error');

		if ($images->result()[0]->img_injer1 == NULL){
			$template['injert1']='<div class="col-xs-3">
								  <a href="#myModal0111" class="btn btn-default" data-toggle="modal">Subir Imágen 1</a>
							      </div>';
		} else {
			$template['injert1']='<div class="col-xs-3">
								  '.$images->result()[0]->img_injer1.' <a href="#myModal0444" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_injer1.'" 
	                    			title="'.$images->result()[0]->img_injer1.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_injer1.'" style="width:100%; height:200px"></a>
								  </div>';
		}	
		if ($images->result()[0]->img_injer2 == NULL){
			$template['injert2']='<div class="col-xs-3">
								  <a href="#myModal0112" class="btn btn-default" data-toggle="modal">Subir Imágen 2</a>
							      </div>';
		} else {
			$template['injert2']='<div class="col-xs-3">
								  '.$images->result()[0]->img_injer2.' <a href="#myModal0445" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_injer2.'" 
	                    			title="'.$images->result()[0]->img_injer2.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_injer2.'" style="width:100%; height:200px;"></a>
								  </div>';
		}
		if ($images->result()[0]->img_injer3 == NULL){
			$template['injert3']='<div class="col-xs-3">
								  <a href="#myModal0113" class="btn btn-default" data-toggle="modal">Subir Imágen 3</a>
							      </div>';
		} else {
			$template['injert3']='<div class="col-xs-3">
								  '.$images->result()[0]->img_injer3.' <a href="#myModal0446" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_injer3.'" 
	                    			title="'.$images->result()[0]->img_injer3.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_injer3.'" style="width:100%; height:200px;"></a>
								  </div>';
		}
		if ($images->result()[0]->img_pinch1 == NULL){
			$template['pinch1']='<div class="col-xs-3">
								  <a href="#myModal0222" class="btn btn-default" data-toggle="modal">Subir Imágen 1</a>
							      </div>';
		} else {
			$template['pinch1']='<div class="col-xs-3">
								  '.$images->result()[0]->img_pinch1.' <a href="#myModal0553" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_pinch1.'" 
	                    			title="'.$images->result()[0]->img_pinch1.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_pinch1.'" style="width:100%; height:200px;"></a>
								  </div>';
		}
		if ($images->result()[0]->img_pinch2 == NULL){
			$template['pinch2']='<div class="col-xs-3">
								  <a href="#myModal0223" class="btn btn-default" data-toggle="modal">Subir Imágen 2</a>
							      </div>';
		} else {
			$template['pinch2']='<div class="col-xs-3">
								  '.$images->result()[0]->img_pinch2.' <a href="#myModal0554" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_pinch2.'" 
	                    			title="'.$images->result()[0]->img_pinch2.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_pinch2.'" style="width:100%; height:200px;"></a>
								  </div>';
		}
		if ($images->result()[0]->img_pinch3 == NULL){
			$template['pinch3']='<div class="col-xs-3">
								  <a href="#myModal0224" class="btn btn-default" data-toggle="modal">Subir Imágen 3</a>
							      </div>';
		} else {
			$template['pinch3']='<div class="col-xs-3">
								  '.$images->result()[0]->img_pinch3.' <a href="#myModal0555" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_pinch3.'" 
	                    			title="'.$images->result()[0]->img_pinch3.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_pinch3.'" style="width:100%; height:200px;"></a>
								  </div>';
		}
		if ($images->result()[0]->img_trans1 == NULL){
			$template['trans1']='<div class="col-xs-3">
								  <a href="#myModal0335" class="btn btn-default" data-toggle="modal">Subir Imágen 1</a>
							      </div>';
		} else {
			$template['trans1']='<div class="col-xs-3">
								  '.$images->result()[0]->img_trans1.' <a href="#myModal0661" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_trans1.'" 
	                    			title="'.$images->result()[0]->img_pinch1.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_trans1.'" style="width:100%; height:200px;"></a>
								  </div>';
		}
		if ($images->result()[0]->img_trans2 == NULL){
			$template['trans2']='<div class="col-xs-3">
								  <a href="#myModal0336" class="btn btn-default" data-toggle="modal">Subir Imágen 2</a>
							      </div>';
		} else {
			$template['trans2']='<div class="col-xs-3">
								  '.$images->result()[0]->img_trans2.' <a href="#myModal0662" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_trans2.'" 
	                    			title="'.$images->result()[0]->img_pinch2.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_trans2.'" style="width:100%; height:200px;"></a>
								  </div>';
		}
		if ($images->result()[0]->img_trans3 == NULL){
			$template['trans3']='<div class="col-xs-3">
								  <a href="#myModal0337" class="btn btn-default" data-toggle="modal">Subir Imágen 3</a>
							      </div>';
		} else {
			$template['trans3']='<div class="col-xs-3">
								  '.$images->result()[0]->img_trans3.' <a href="#myModal0663" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_trans3.'" 
	                    			title="'.$images->result()[0]->img_pinch3.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_trans3.'" style="width:100%; height:200px;"></a>
								  </div>';
		}
		if ($images->result()[0]->img_tuto1 == NULL){
			$template['tuto1']='<div class="col-xs-3">
								  <a href="#myModal0771" class="btn btn-default" data-toggle="modal">Subir Imágen 1</a>
							      </div>';
		} else {
			$template['tuto1']='<div class="col-xs-3">
								  '.$images->result()[0]->img_tuto1.' <a href="#myModal0881" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_tuto1.'" 
	                    			title="'.$images->result()[0]->img_pinch1.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_tuto1.'" style="width:100%; height:200px;"></a>
								  </div>';
		}
		if ($images->result()[0]->img_tuto2 == NULL){
			$template['tuto2']='<div class="col-xs-3">
								  <a href="#myModal0772" class="btn btn-default" data-toggle="modal">Subir Imágen 2</a>
							      </div>';
		} else {
			$template['tuto2']='<div class="col-xs-3">
								  '.$images->result()[0]->img_tuto2.' <a href="#myModal0882" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_tuto2.'" 
	                    			title="'.$images->result()[0]->img_pinch2.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_tuto2.'" style="width:100%; height:200px;"></a>
								  </div>';
		}
		if ($images->result()[0]->img_tuto3 == NULL){
			$template['tuto3']='<div class="col-xs-3">
								  <a href="#myModal0773" class="btn btn-default" data-toggle="modal">Subir Imágen 3</a>
							      </div>';
		} else {
			$template['tuto3']='<div class="col-xs-3">
								  '.$images->result()[0]->img_tuto3.' <a href="#myModal0883" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i></a>

									<a href="/plantanova/uploads/'.$images->result()[0]->img_tuto3.'" 
	                    			title="'.$images->result()[0]->img_pinch3.'"
	                    			data-toggle="modal"
	                    			target="_blank">
									<img src="/plantanova/uploads/'.$images->result()[0]->img_tuto3.'" style="width:100%; height:200px;"></a>
								  </div>';
		}

		$data['id_status']='2';
		$this->model_breakdown->update_order($this->uri->segment(3),$data);
		$this->load->view("main",$template);
	}
	
	public function insert_germination()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$total_germination=$this->model_order->get_total_germ($this->uri->segment(3));
		$total_germ=$total_germination->germination;
		
		$datos['id_order']=$this->uri->segment(3);
		$id_sowing=$this->input->post('breakdown_germination');
		$fecha=$this->input->post('datepicker1');
		$datos['germ_date']=date("Y-m-d H:i:s", strtotime($fecha));
		$datos['germ_percentage']=$this->input->post('percentage');
		$datos['viability']=$this->input->post('viability');
		$datos['comment']=$this->input->post('comment');
		$sowing=$this->model_breakdown->get_sowing_id_sowing($id_sowing);
		$datos['id_sowing']=$sowing[0]->id_sowing;
		$datos['volume']=$sowing[0]->volume*($datos['viability']/100);
		$datos['seed_name']=$sowing[0]->seed;
		
		$order_volume=$this->model_order->get_order_volume($this->uri->segment(3),$datos['seed_name']);
		$total_vial=$this->model_order->get_vial_total($this->uri->segment(3),$datos['seed_name']);
		$new_vol=$total_vial->viability_total+$datos['volume'];
		$scope=($new_vol/$order_volume->order_volume-1)*100;
		$this->model_order->update_total_vial($this->uri->segment(3),$new_vol,$datos['seed_name'],$scope);
		
		$this->model_breakdown->add_germination($datos);

		$order_vol=$this->model_breakdown->get_seed_volume($this->uri->segment(3),$datos['seed_name']);
		
		$total_vol=$total_germ+$datos['volume'];
		$this->model_order->update_total_germination($this->uri->segment(3), $total_vol);
		
		redirect("breakdown/process/".$this->uri->segment(3)."#germinacion", "refresh");
	}

	public function edit_germination()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$total_germination=$this->model_order->get_total_germ($this->uri->segment(3));
		$total_germ=$total_germination->germination;
		
		$datos['id_order']=$this->uri->segment(3);
		$id_germination=$this->input->post('id_germination');
		$id_sowing=$this->input->post('breackdown_Germ'.$id_germination);
		$fecha=$this->input->post('datepickerGerm'.$id_germination);
		$datos['germ_date']=date("Y-m-d H:i:s", strtotime($fecha));
		$datos['germ_percentage']=$this->input->post('percentageGerm'.$id_germination);
		$datos['viability']=$this->input->post('viabilityGerm'.$id_germination);
		$datos['comment']=$this->input->post('commentGerm'.$id_germination);
		$sowing=$this->model_breakdown->get_sowing_id_sowing($id_sowing);
		$datos['id_sowing']=$sowing[0]->id_sowing;
		
		$germination=$this->model_breakdown->get_germination_id_sowing($id_sowing);
		$viability_old=$germination[0]->volume;

		$datos['volume']=$sowing[0]->volume*($datos['viability']/100);
		$datos['seed_name']=$sowing[0]->seed;
	
		$order_volume=$this->model_order->get_order_volume($this->uri->segment(3),$datos['seed_name']);
		$total_vial=$this->model_order->get_vial_total($this->uri->segment(3),$datos['seed_name']);
		$new_vol=$total_vial->viability_total-$viability_old+$datos['volume'];
		$scope=($new_vol/$order_volume->order_volume-1)*100;
	
		$order_vol=$this->model_breakdown->get_seed_volume($this->uri->segment(3),$datos['seed_name']);
		
		$total_vol=$total_germ-$germination[0]->volume+$datos['volume'];
		
		//echo "totalvial".$total_vial->viability_total."viabilityold".$viability_old."datos_volume".$datos['volume']."new_vol".$new_vol;
		$this->model_order->update_total_vial($this->uri->segment(3),$new_vol,$datos['seed_name'],$scope);
		$this->model_order->update_total_germination($this->uri->segment(3), $total_vol);
		$this->model_breakdown->update_germination($datos,$id_germination);
		//echo "totalvial".$total_vial->viability_total."viabilityold".$viability_old."datos_volume".$datos['volume']."new_vol".$new_vol;

		redirect("breakdown/process/".$this->uri->segment(3)."#germinacion", "refresh");
	}

	public function insert_graft(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$total_graft=$this->model_order->get_total_graft($this->uri->segment(3));
		$total_graf=$total_graft->graft;
		$volume=$this->input->post('volume_graft');
		$total_vol=$total_graf+$volume;	
		$order_volume=$this->input->post('order_volume');
		$datos['id_breakdown']=$this->input->post('breakdown_graft');
		$datos['volume']=$this->input->post('volume_graft');
		//$datos['viability']=$this->input->post('viability');
		$datos['comment']=$this->input->post('comment');
		$datos['id_process_type']='2';
		$datos['scope']=($volume/$order_volume)-1;
		//$datos['id_order']=$this->uri->segment(3);
		$fecha=$this->input->post('datepicker2');
		$datos['process_date']=date("Y-m-d H:i:s", strtotime($fecha));

		$breakdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		$this->model_breakdown->update_graft($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume);
		

		$sum_breakdown=$this->model_order->get_total_graft2($datos['id_breakdown']);
		$total_breackdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		if(is_array($sum_breakdown)){
			$datos['scope']=((($sum_breakdown[0]->volume+$datos['volume'])/$total_breackdown[0]->volume) - 1) * 100;
		}else{
			$datos['scope']=(($datos['volume']/$total_breackdown[0]->volume) - 1) * 100;
		}

		$this->model_breakdown->add_graft($datos);
		$this->model_order->update_total_graft($this->uri->segment(3), $total_vol);
		
		$this->model_breakdown->update_scope2($datos['scope'],$datos['id_breakdown'],2);

		redirect("breakdown/process/".$this->uri->segment(3)."#injerto", "refresh");
	}
	
	public function edit_graft(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_process=$this->input->post("id_processGraft");
		$datos['id_breakdown']=$this->input->post("breakdownGraft".$id_process);
		$datos['volume']=$this->input->post("volumeGraft".$id_process);
		$fecha=$this->input->post('datepickerGraft'.$id_process);
		$datos['process_date']=date("Y-m-d H:i:s", strtotime($fecha));
		$datos['comment']=$this->input->post('commentGraft'.$id_process);

		$process=$this->model_breakdown->get_process_id_process($id_process);
		$breakdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);

		$sum_breakdown=$this->model_order->get_total_graft2($datos['id_breakdown']);
		$sum_breakdown2=$sum_breakdown[0]->volume - $process[0]->volume;
		$total_breackdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		$datos['scope']=((($sum_breakdown2 + $datos['volume'])/ $total_breackdown[0]->volume) - 1) * 100;
		
		$total_graft=$this->model_order->get_total_graft($this->uri->segment(3));

		$total_graft2=$total_graft->graft - $process[0]->volume + $datos['volume'];

		$total_seed_graft=$this->model_breakdown->get_total_seed($this->uri->segment(3),$breakdown[0]->variety);
		$volume_seed_graft=$total_seed_graft[0]->graft_total - $process[0]->volume + $datos['volume'];
		$this->model_breakdown->update_graft_seed($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume_seed_graft);
		$this->model_order->update_total_graft($this->uri->segment(3), $total_graft2);
		$this->model_breakdown->update_process($id_process,$datos);

		redirect("breakdown/process/".$this->uri->segment(3)."#injerto", "refresh");
	}

	public function insert_punch()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$total_punch=$this->model_order->get_total_punch($this->uri->segment(3));
		$total_punsh=$total_punch->punch;
		$volume=$this->input->post('volume_punch');
		$total_vol=$total_punsh+$volume;	
		$datos['id_breakdown']=$this->input->post('breakdown_punch');
		$datos['volume']=$this->input->post('volume_punch');
		$datos['comment']=$this->input->post('comment');
		$datos['id_process_type']='3';
		$fecha=$this->input->post('datepicker3');
		$datos['process_date']=date("Y-m-d H:i:s", strtotime($fecha));

		$breakdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		$this->model_breakdown->update_punch($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume);
		
		$sum_breakdown=$this->model_order->get_total_punch2($datos['id_breakdown']);
		$total_breackdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		if(is_array($sum_breakdown)){
			$datos['scope']=((($sum_breakdown[0]->volume+$datos['volume'])/$total_breackdown[0]->volume) - 1) * 100;
		}else{
			$datos['scope']=(($datos['volume']/$total_breackdown[0]->volume) - 1) * 100;
		}
		
		$this->model_breakdown->add_punch($datos);
		$this->model_order->update_total_punch($this->uri->segment(3), $total_vol);

		$this->model_breakdown->update_scope2($datos['scope'],$datos['id_breakdown'],3);

		redirect("breakdown/process/".$this->uri->segment(3)."#pinchado", "refresh");
	}

	public function edit_punch(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_process=$this->input->post("id_processPunch");
		$datos['id_breakdown']=$this->input->post("breakdownPunch".$id_process);
		$datos['volume']=$this->input->post("volumePunch".$id_process);
		$fecha=$this->input->post('datepickerPunch'.$id_process);
		$datos['process_date']=date("Y-m-d H:i:s", strtotime($fecha));
		$datos['comment']=$this->input->post('commentPunch'.$id_process);

		$process=$this->model_breakdown->get_process_id_process($id_process);
		$breakdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);

		$sum_breakdown=$this->model_order->get_total_punch2($datos['id_breakdown']);
		$sum_breakdown2=$sum_breakdown[0]->volume - $process[0]->volume;
		$total_breackdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		$datos['scope']=((($sum_breakdown2 + $datos['volume'])/ $total_breackdown[0]->volume) - 1) * 100;
		
		$total_punch=$this->model_order->get_total_punch($this->uri->segment(3));

		$total_punch2=$total_punch->punch - $process[0]->volume + $datos['volume'];

		$total_seed_punch=$this->model_breakdown->get_total_seed($this->uri->segment(3),$breakdown[0]->variety);
		$volume_seed_punch=$total_seed_punch[0]->punch_total - $process[0]->volume + $datos['volume'];
		$this->model_breakdown->update_punch_seed($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume_seed_punch);
		$this->model_order->update_total_punch($this->uri->segment(3), $total_punch2);
		$this->model_breakdown->update_process($id_process,$datos);

		redirect("breakdown/process/".$this->uri->segment(3)."#pinchado", "refresh");
	}

	public function insert_transplant()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$total_transplant=$this->model_order->get_total_transplant($this->uri->segment(3));
		$total_trans=$total_transplant->transplant;
		$volume=$this->input->post('volume_transplant');
		$total_vol=$total_trans+$volume;
		$datos['id_breakdown']=$this->input->post('breakdown_transplant');
		$datos['volume']=$this->input->post('volume_transplant');
		$datos['comment']=$this->input->post('comment');
		$datos['id_process_type']='4';
		$fecha=$this->input->post('datepicker4');
		$datos['process_date']=date("Y-m-d H:i:s", strtotime($fecha));

		$breakdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		$this->model_breakdown->update_transplant($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume);
		
		$sum_breakdown=$this->model_order->get_total_transplant2($datos['id_breakdown']);
		$total_breackdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		if(is_array($sum_breakdown)){
			$datos['scope']=((($sum_breakdown[0]->volume+$datos['volume'])/$total_breackdown[0]->volume) - 1) * 100;
		}else{
			$datos['scope']=(($datos['volume']/$total_breackdown[0]->volume) - 1) * 100;
		}

		$this->model_breakdown->add_transplant($datos);
		$this->model_order->update_total_transplant($this->uri->segment(3), $total_vol);

		$this->model_breakdown->update_scope2($datos['scope'],$datos['id_breakdown'],4);

		redirect("breakdown/process/".$this->uri->segment(3)."#transplante", "refresh");	
	}
	public function edit_transplant(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_process=$this->input->post("id_processTransplant");
		$datos['id_breakdown']=$this->input->post("breakdownTransplant".$id_process);
		$datos['volume']=$this->input->post("volumeTransplant".$id_process);
		$fecha=$this->input->post('datepickerTransplant'.$id_process);
		$datos['process_date']=date("Y-m-d H:i:s", strtotime($fecha));
		$datos['comment']=$this->input->post('commentTransplant'.$id_process);

		$process=$this->model_breakdown->get_process_id_process($id_process);
		$breakdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);

		$sum_breakdown=$this->model_order->get_total_transplant2($datos['id_breakdown']);
		$sum_breakdown2=$sum_breakdown[0]->volume - $process[0]->volume;
		$total_breackdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		$datos['scope']=((($sum_breakdown2 + $datos['volume'])/ $total_breackdown[0]->volume) - 1) * 100;
		
		$total_transplant=$this->model_order->get_total_transplant($this->uri->segment(3));

		$total_transplant2=$total_transplant->transplant - $process[0]->volume + $datos['volume'];

		$total_seed_transplant=$this->model_breakdown->get_total_seed($this->uri->segment(3),$breakdown[0]->variety);
		$volume_seed_transplant=$total_seed_transplant[0]->transplant_total - $process[0]->volume + $datos['volume'];
		$this->model_breakdown->update_transplant_seed($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume_seed_transplant);
		$this->model_order->update_total_transplant($this->uri->segment(3), $total_transplant2);
		$this->model_breakdown->update_process($id_process,$datos);

		redirect("breakdown/process/".$this->uri->segment(3)."#transplante", "refresh");
	}

	public function insert_tutoring()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$total_tutoring=$this->model_order->get_total_tutoring($this->uri->segment(3));
		$total_tuto=$total_tutoring->tutoring;
		$volume=$this->input->post('volume_tutoring');
		$total_vol=$total_tuto+$volume;
		$datos['id_breakdown']=$this->input->post('breakdown_tutoring');
		$datos['volume']=$this->input->post('volume_tutoring');
		$datos['comment']=$this->input->post('comment');
		$datos['id_process_type']='5';
		$fecha=$this->input->post('datepicker5');
		$datos['process_date']=date("Y-m-d H:i:s", strtotime($fecha));

		$breakdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		$this->model_breakdown->update_tutoring($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume);
		
		$sum_breakdown=$this->model_order->get_total_tutoring2($datos['id_breakdown']);
		$total_breackdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		if(is_array($sum_breakdown)){
			$datos['scope']=((($sum_breakdown[0]->volume+$datos['volume'])/$total_breackdown[0]->volume) - 1) * 100;
		}else{
			$datos['scope']=(($datos['volume']/$total_breackdown[0]->volume) - 1) * 100;
		}

		$this->model_breakdown->add_tutoring($datos);
		$this->model_order->update_total_tutoring($this->uri->segment(3), $total_vol);	

		$this->model_breakdown->update_scope2($datos['scope'],$datos['id_breakdown'],5);

		redirect("breakdown/process/".$this->uri->segment(3)."#tutoreo", "refresh");	
	}

	public function edit_tutoring(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_process=$this->input->post("id_processTutoring");
		$datos['id_breakdown']=$this->input->post("breakdownTutoring".$id_process);
		$datos['volume']=$this->input->post("volumeTutoring".$id_process);
		$fecha=$this->input->post('datepickerTutoring'.$id_process);
		$datos['process_date']=date("Y-m-d H:i:s", strtotime($fecha));
		$datos['comment']=$this->input->post('commentTutoring'.$id_process);

		$process=$this->model_breakdown->get_process_id_process($id_process);
		$breakdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);

		$sum_breakdown=$this->model_order->get_total_tutoring2($datos['id_breakdown']);
		$sum_breakdown2=$sum_breakdown[0]->volume - $process[0]->volume;
		$total_breackdown=$this->model_breakdown->get_breakdown($datos['id_breakdown']);
		$datos['scope']=((($sum_breakdown2 + $datos['volume'])/ $total_breackdown[0]->volume) - 1) * 100;
		
		$total_tutoring=$this->model_order->get_total_tutoring($this->uri->segment(3));

		$total_tutoring2=$total_tutoring->tutoring - $process[0]->volume + $datos['volume'];

		$total_seed_tutoring=$this->model_breakdown->get_total_seed($this->uri->segment(3),$breakdown[0]->variety);
		$volume_seed_tutoring=$total_seed_tutoring[0]->tutoring_total - $process[0]->volume + $datos['volume'];
		$this->model_breakdown->update_tutoring_seed($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume_seed_tutoring);
		$this->model_order->update_total_tutoring($this->uri->segment(3), $total_tutoring2);
		$this->model_breakdown->update_process($id_process,$datos);

		redirect("breakdown/process/".$this->uri->segment(3)."#tutoreo", "refresh");
	}

	
	public function delete_germination()
    {
    	if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
        foreach ($_POST as $key => $value)
        {
            if(is_int($key))
            {    
                $llave=$key;

            }
        }

        /*$volume=$this->model_breakdown->get_volume_germination($llave); 
    	*/
		$seed=$this->model_breakdown->get_seed_name($llave); //Obtiene el nombre de la semilla
		$actual_vol=$this->model_order->get_vial_total($this->uri->segment(3),$seed[0]->seed_name); //Obtiene el volumen actual
		$volume=$this->model_breakdown->get_volume_germination($llave); //Obtiene el volumen que se esta eliminando
		$new_vol=$actual_vol->viability_total - $volume[0]->volume; //Calcula el volumen nuevo, volumen que ya esta - la cantidad que se esta eliminando
		$order_volume=$this->model_order->get_order_volume($this->uri->segment(3),$seed[0]->seed_name);
		$scope=($new_vol/$order_volume->order_volume-1)*100;
		if($scope==-100) {
			$scope=0;
		}
		$this->model_order->update_total_vial($this->uri->segment(3),$new_vol,$seed[0]->seed_name,$scope);
		$total_germination=$this->model_order->get_total_germ($this->uri->segment(3));
		$total_vol=$total_germination->germination - $volume[0]->volume;
		$this->model_order->update_total_germination($this->uri->segment(3), $total_vol);

		//si tiene algun procesos es eliminado
		if($this->model_breakdown->get_breakdown_vr($seed[0]->seed_name,$this->uri->segment(3))){
			$breakdown=$this->model_breakdown->get_breakdown_vr($seed[0]->seed_name,$this->uri->segment(3));
			foreach ($breakdown as $key ) {
				$volume_graft=$this->model_breakdown->get_volume_graft($key->id_breakdown);
				$volume_punch=$this->model_breakdown->get_volume_punch($key->id_breakdown);
				$volume_transplant=$this->model_breakdown->get_volume_transplant($key->id_breakdown);
				if($volume_graft[0]->volume>0){
					$this->model_breakdown->update_total_graft($volume_graft[0]->volume,$this->uri->segment(3));
					$this->model_breakdown->update_graft2($this->uri->segment(3),$key->variety,$key->rootstock,$volume_graft[0]->volume);
				}
				if($volume_punch[0]->volume>0){
					$this->model_breakdown->update_total_punch($volume_punch[0]->volume,$this->uri->segment(3));
					$this->model_breakdown->update_punch2($this->uri->segment(3),$key->variety,$key->rootstock,$volume_punch[0]->volume);
				}
				if($volume_transplant[0]->volume>0){
					$this->model_breakdown->update_total_transplant($volume_graft[0]->volume,$this->uri->segment(3));
					$this->model_breakdown->update_transplant2($this->uri->segment(3),$key->variety,$key->rootstock,$volume_transplant[0]->volume);
				}

				$this->model_breakdown->delete_process_breakdown($key->id_breakdown);
			}
						
		}

      	$this->model_breakdown-> delete_process_germination($llave);
       	redirect("breakdown/process/".$this->uri->segment(3)."#germinacion", "refresh");
    }

    public function delete_graft()
    {
    	if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
        foreach ($_POST as $key => $value)
        {
            if(is_int($key))
            {    
                $llave=$key;

            }
        }


        $volume=$this->model_breakdown->get_volume_process($llave); 
    	$total_graft=$this->model_order->get_total_graft($this->uri->segment(3));
		$total_graf=$total_graft->graft;
		$total_vol=$total_graf - $volume[0]->volume;
		
		$this->model_order->update_total_graft($this->uri->segment(3), $total_vol);

		//borrar procesos si es que tiene mas anidados
		$process=$this->model_breakdown->get_process_id_process($llave);
		$breakdown=$this->model_breakdown->get_breakdown($process[0]->id_breakdown);

		if($this->model_breakdown->get_process_id_breakdown($process[0]->id_breakdown)){
			$volume_punch=$this->model_breakdown->get_volume_punch($process[0]->id_breakdown);
			$volume_transplant=$this->model_breakdown->get_volume_transplant($process[0]->id_breakdown);
			$volume_tutoring=$this->model_breakdown->get_volume_tutoring($process[0]->id_breakdown);

			if($volume_punch[0]->volume > 0){
				$this->model_breakdown->update_total_punch($volume_punch[0]->volume,$this->uri->segment(3));
				$this->model_breakdown->update_punch2($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume_punch[0]->volume);
				$this->model_breakdown->delete_process_id_breakdown_punch($process[0]->id_breakdown);
				
			}
			if($volume_transplant[0]->volume > 0){
				$this->model_breakdown->update_total_transplant($volume_transplant[0]->volume,$this->uri->segment(3));
				$this->model_breakdown->update_transplant2($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume_transplant[0]->volume);
				$this->model_breakdown->delete_process_id_breakdown_transplant($process[0]->id_breakdown);
			}
			if($volume_tutoring[0]->volume > 0){
				$this->model_breakdown->update_total_tutoring($volume_tutoring[0]->volume,$this->uri->segment(3));
				$this->model_breakdown->update_tutoring2($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume_tutoring[0]->volume);
				$this->model_breakdown->delete_process_id_breakdown_tutoring($process[0]->id_breakdown);
			}
			
		}

		$this->model_breakdown->update_graft2($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume[0]->volume);
		
		$volume_total=$this->model_breakdown->get_total($this->uri->segment(3));
		$scope=(($volume_total[0]->graft/$breakdown[0]->volume) - 1) * 100;
		$this->model_breakdown->update_scope2($scope,$process[0]->id_breakdown,2);

       	$this->model_breakdown-> delete_process($llave);
       	redirect("breakdown/process/".$this->uri->segment(3)."#injerto", "refresh");
    }

    public function delete_punch()
    {
    	if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
        foreach ($_POST as $key => $value)
        {
            if(is_int($key))
            {    
                $llave=$key;

            }
        }

		$volume=$this->model_breakdown->get_volume_process($llave); 
		$total_punch=$this->model_order->get_total_punch($this->uri->segment(3));
		$total_punsh=$total_punch->punch;
		$total_vol=$total_punsh - $volume[0]->volume;
		$this->model_order->update_total_punch($this->uri->segment(3), $total_vol);

		//eliminar transplate si es que existe

		$process=$this->model_breakdown->get_process_id_process($llave);
		$breakdown=$this->model_breakdown->get_breakdown($process[0]->id_breakdown);
		if($this->model_breakdown->get_process_id_breakdown2($process[0]->id_breakdown)){
			$volume_transplant=$this->model_breakdown->get_volume_transplant($process[0]->id_breakdown);
			$this->model_breakdown->update_total_transplant($volume_transplant[0]->volume,$this->uri->segment(3));
			$this->model_breakdown->update_transplant2($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume_transplant[0]->volume);
			$this->model_breakdown->delete_process_id_breakdown_transplant($process[0]->id_breakdown);
		}

		$this->model_breakdown->update_punch2($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume[0]->volume);

		$volume_total=$this->model_breakdown->get_total($this->uri->segment(3));
		$scope=(($volume_total[0]->punch/$breakdown[0]->volume) - 1) * 100;
		$this->model_breakdown->update_scope2($scope,$process[0]->id_breakdown,3);

		$this->model_breakdown-> delete_process($llave);
		redirect("breakdown/process/".$this->uri->segment(3)."#pinchado", "refresh");
    }

    public function delete_transplant()
    {
    	if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
        foreach ($_POST as $key => $value)
        {
            if(is_int($key))
            {    
                $llave=$key;

            }
        }

        $volume=$this->model_breakdown->get_volume_process($llave); 
    	$total_transplant=$this->model_order->get_total_transplant($this->uri->segment(3));
		$total_trans=$total_transplant->transplant;
		$total_vol=$total_trans - $volume[0]->volume;
		$this->model_order->update_total_transplant($this->uri->segment(3), $total_vol);

		$process=$this->model_breakdown->get_process_id_process($llave);
		$breakdown=$this->model_breakdown->get_breakdown($process[0]->id_breakdown);
		$this->model_breakdown->update_transplant2($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume[0]->volume);

		$volume_tutoring=$this->model_order->get_total_tutoring($this->uri->segment(3));

		if($volume_tutoring->tutoring>0){
			$this->model_order->update_total_tutoring2($this->uri->segment(3),$volume_tutoring->tutoring);
			$this->model_breakdown->update_tutoring2($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume_tutoring->tutoring);
		}
		$volume_total=$this->model_breakdown->get_total($this->uri->segment(3));
		$scope=(($volume_total[0]->transplant/$breakdown[0]->volume) - 1) * 100;
		$this->model_breakdown->update_scope2($scope,$process[0]->id_breakdown,4);

      	$this->model_breakdown->delete_process($llave);
      	$this->model_breakdown->delete_process_id_breakdown_tutoring($process[0]->id_breakdown);
       	redirect("breakdown/process/".$this->uri->segment(3)."#transplante", "refresh");
    }

    public function delete_tutoring()
    {
    	if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
        foreach ($_POST as $key => $value)
        {
            if(is_int($key))
            {    
                $llave=$key;

            }
        }

        $volume=$this->model_breakdown->get_volume_process($llave); 
    	$total_tutoring=$this->model_order->get_total_tutoring($this->uri->segment(3));
		$total_tuto=$total_tutoring->tutoring;
		$total_vol=$total_tuto - $volume[0]->volume;
		$this->model_order->update_total_tutoring($this->uri->segment(3), $total_vol);


		$process=$this->model_breakdown->get_process_id_process($llave);
		$breakdown=$this->model_breakdown->get_breakdown($process[0]->id_breakdown);
		$this->model_breakdown->update_tutoring2($this->uri->segment(3),$breakdown[0]->variety,$breakdown[0]->rootstock,$volume[0]->volume);

		
		$volume_total=$this->model_breakdown->get_total($this->uri->segment(3));
		$scope=(($volume_total[0]->tutoring/$breakdown[0]->volume) - 1) * 100;
		
		$this->model_breakdown->update_scope2($scope,$process[0]->id_breakdown,5);


      	$this->model_breakdown-> delete_process($llave);
       	redirect("breakdown/process/".$this->uri->segment(3)."#transplante", "refresh");
    }


	public function finish_order()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$a = $this->uri->segment(3);
		$datos['transporter']=$this->input->post('transporter');
		$datos['final_volume']=$this->input->post('final_volume');
		$datos['comment']=$this->input->post('comment');
		$fecha=$this->input->post('datepicker');
		$datos['date']=date("Y-m-d H:i:s", strtotime($fecha));
		$datos['id_order']=$a;

		$data['id_status']='3';
		
		$this->model_breakdown->update_order($a,$data);
		if($this->model_breakdown->get_embark($a) == false){
			$this->model_breakdown->insert_embark($datos);
		}else{
			$this->model_breakdown->update_embark($a,$datos);
		}

		redirect("breakdown/pedido_embarcado/", "refresh");
	}

	/*public function pedido_embarcado_body(){
		$template['id_order']=$this->uri->segment(3);
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['fecha_entrega']=$order->result()[0]->order_date_delivery;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category);
		$template['client']=$this->model_user->obtenerCliente($order->result()[0]->id_client);
		$template['farmer']=$order->result()[0]->farmer;

		if($this->model_breakdown->get_embark($template['id_order']) == false){
			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_embarker_body.php';
			$template['footer'] = 'footer/view_footer.php';

			$this->load->view("main",$template);
		}else{
			$template['embark'] = $this->model_breakdown->get_embark($template['id_order']);
 			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_edit_embarker_body.php';
			$template['footer'] = 'footer/view_footer.php';

			$this->load->view("main",$template);
		}		
	}

	public function edit_embark(){
		//$a = $this->uri->segment(3);
		//$data['id_status']='2';
		
		//$this->model_breakdown->update_order2($a,$data);		

		redirect("breakdown/pedido_embarcado_body/".$this->uri->segment(3).'/'.$this->uri->segment(4), "refresh");
	}*/

	


	public function edit_process(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data['id_status']='2';
		
		$this->model_breakdown->update_order2($this->uri->segment(3),$data);	

		redirect("breakdown/process/".$this->uri->segment(3), "refresh");
	}
	
	public function final_resume()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_final_resume.php';
		$template['footer'] = "footer/view_footer.php";
		$template['order']= $order;
		$template['company']=$this->model_user->obtenerCliente($template['order']->result()[0]->id_client);
		$template['plant']=$this->model_order->get_plant($template['order']->result()[0]->id_plant);
		$template['category']=$this->model_order->get_category($template['order']->result()[0]->id_category);
		$template['breakdown']=$this->model_order->get_breakdown($this->uri->segment(3));
		$template['sowing'] = $this->model_order->get_sowing2($this->uri->segment(3));
		$template['germination'] = $this->model_breakdown->get_final_germination($this->uri->segment(3));
		$template['graft'] = $this->model_breakdown->get_graft($this->uri->segment(3));
		$template['punch']= $this->model_breakdown->get_punch($this->uri->segment(3));
		$template['transplant']= $this->model_breakdown->get_transplant($this->uri->segment(3));
		$template['tutoring']= $this->model_breakdown->get_tutoring($this->uri->segment(3));
		$template['img_injer']=$this->model_breakdown->get_image_injer($this->uri->segment(3));
		$template['img_pinch']=$this->model_breakdown->get_image_pinch($this->uri->segment(3));
		$template['img_trans']=$this->model_breakdown->get_image_trans($this->uri->segment(3));
		$template['img_tuto']=$this->model_breakdown->get_image_tuto($this->uri->segment(3));

		$this->load->view('main',$template);	
	}

	public function order_resume_nuevo(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
			$template['header'] = 'header/view_admin_header.php';
				$template['body'] = 'body/view_order_resume_nuevo.php';
				$template['footer'] = "footer/view_footer.php";
				$template['order']=$this->model_order->get_order_id_order($this->uri->segment(3));
				$template['company']=$this->model_user->obtenerCliente($template['order']->result()[0]->id_client);
				$template['plant']=$this->model_order->get_plant($template['order']->result()[0]->id_plant);
				$template['category']=$this->model_order->get_category($template['order']->result()[0]->id_category);
				$template['breakdown']=$this->model_order->get_breakdown($this->uri->segment(3));

				$this->load->view('main',$template);
	}

	public function order_resume_proceso(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
			$template['header'] = 'header/view_admin_header.php';
				$template['body'] = 'body/view_order_resume_proceso.php';
				$template['footer'] = "footer/view_footer.php";
				$template['order']=$this->model_order->get_order_id_order($this->uri->segment(3));
				$template['company']=$this->model_user->obtenerCliente($template['order']->result()[0]->id_client);
				$template['plant']=$this->model_order->get_plant($template['order']->result()[0]->id_plant);
				$template['category']=$this->model_order->get_category($template['order']->result()[0]->id_category);
				$template['breakdown']=$this->model_order->get_breakdown($this->uri->segment(3));

				$this->load->view('main',$template);
	}

	public function update_comment()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id = $this->input->post('id');
		$comment = $this->input->post('coment');
		$this->model_order->update_order_comment($id, $comment);
		redirect("breakdown/pedido_proceso", "refresh");
	}

	public function max_volume_sowing(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_seed = $this->input->post('seeds');
		$seed_volume = $this->input->post('volume');
		$seed=$this->model_breakdown->get_seed_id_seed($id_seed);
		$suma_volumen_sowing=$this->model_breakdown->get_sum_sowing($id_seed);
	    $resta=$seed[0]->volume - $suma_volumen_sowing[0]->volume;
	    
	    if( $seed_volume > $seed[0]->volume || $seed_volume > $resta) {
	      echo "11";//false
	    } else {
	      echo "1";//true
	      
	    }
	}
	public function edit_sowing(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_sowing=$this->input->post('id_sowing');
		$volume=$this->input->post('editVolume'.$id_sowing);
		$date=date("Y-m-d", strtotime($this->input->post('datepicker'.$id_sowing)));
		$comment=$this->input->post('editComment'.$id_sowing);

		$sowing=$this->model_breakdown->get_sowing_id_sowing($id_sowing);
		$t_total=$this->model_breakdown->get_total($this->uri->segment(3));
		$total= $t_total[0]->sowing - $sowing[0]->volume + $volume;

		$t_total_seed=$this->model_breakdown->get_total_seed($this->uri->segment(3),$sowing[0]->seed);
		$total2=$t_total_seed[0]->total - $sowing[0]->volume + $volume; 
		
		$this->model_breakdown->update_sowing_total($total,$this->uri->segment(3));
		$this->model_breakdown->update_sowing_total_seed($total2,$this->uri->segment(3),$sowing[0]->seed);
		$this->model_breakdown->update_sowing($id_sowing,$volume,$date,$comment);

		//reajustar germinacion si es que existe
		$germination=$this->model_breakdown->get_germination_id_sowing($id_sowing);
		if(is_array($germination)){
			$germination=$this->model_breakdown->get_germination_id_sowing($id_sowing);
			$datos["volume"] = $volume * ($germination[0]->viability/100);
			$total_germination=$t_total[0]->germination - $germination[0]->volume + $datos["volume"];
			$t_total_germination=$t_total_seed[0]->viability_total- $germination[0]->volume + $datos["volume"];
			

			$order_volume=$this->model_order->get_order_volume($this->uri->segment(3),$sowing[0]->seed);
			$total_vial=$this->model_order->get_vial_total($this->uri->segment(3),$sowing[0]->seed);
			$new_vol=$total_vial->viability_total-$germination[0]->volume + $datos['volume'];
			$scope=($new_vol/$order_volume->order_volume-1)*100;

			$this->model_order->update_total_germination($this->uri->segment(3), $total_germination);
			$this->model_order->update_total_vial($this->uri->segment(3),$t_total_germination,$sowing[0]->seed,$scope);
			$this->model_breakdown->update_germination($datos,$germination[0]->id_germination);
		}

		redirect("breakdown/process/".$this->uri->segment(3), "refresh");
	}

	public function max_edit_volume_sowing(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_seed = $this->input->post('seeds');
		$seed_volume = $this->input->post('volume');
		$sowing = $this->input->post('sowing');
		$seed=$this->model_breakdown->get_seed_id_seed($id_seed);
		$suma_volumen_sowing=$this->model_breakdown->get_sum_sowing($id_seed);
	    $sowing_seed=$this->model_breakdown->get_sowing_id_sowing($sowing);
	    
	    $resta=$suma_volumen_sowing[0]->volume -  $sowing_seed[0]->volume;
	    $suma=$resta + $seed_volume;
	    
	    if( $seed_volume > $seed[0]->volume || $suma > $seed[0]->volume) {
	      echo "11";//false
	    	//echo $seed[0]->volume ."-". $suma_volumen_sowing[0]->volume."|".$seed_volume.">".$resta;
	    } else {
	      echo "1";//true
	      
	    }
	}

	public function max_volume_graft(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_breakdown = $this->input->post('breakdown_graft');
		$graft_volume = $this->input->post('volume_graft');
		$breakdown = $this->model_breakdown->get_breakdown($id_breakdown);
		
		
		$variedad=$breakdown[0]->variety;
		$portainjerto=$breakdown[0]->rootstock;

		$total_semillas1=$this->model_breakdown->get_total_seed($this->uri->segment(3),$variedad);
		$total_semillas2=$this->model_breakdown->get_total_seed($this->uri->segment(3),$portainjerto);


		if($total_semillas1[0]->viability_total < $total_semillas2[0]->viability_total){
			$maximo=$total_semillas1[0]->viability_total;

			if($total_semillas1[0]->punch_total != 0 && $total_semillas1[0]->punch_total < $maximo){
				$maximo=$total_semillas1[0]->punch_total;
			}
			if($total_semillas1[0]->transplant_total != 0 && $total_semillas1[0]->transplant_total < $maximo ){
				$maximo=$total_semillas1[0]->transplant_total;
			}
			$maximo2=$total_semillas1[0]->graft_total + $graft_volume;
		}else{
			$maximo=$total_semillas2[0]->viability_total;

			if($total_semillas2[0]->punch_total != 0 && $total_semillas2[0]->punch_total < $maximo)
			{
				$maximo=$total_semillas2[0]->punch_total;
			}
			if($total_semillas2[0]->transplant_total != 0 && $total_semillas2[0]->transplant_total < $maximo)
			{
				$maximo=$total_semillas2[0]->transplant_total;
			}
			$maximo2=$total_semillas2[0]->graft_total + $graft_volume;
		}

		$maximo2=$total_semillas1[0]->graft_total + $graft_volume;

		if($maximo < $graft_volume || $maximo2 > $maximo ) {
	        echo "11";//false
	        //echo $id_breakdown."|".$graft_volume;
	    } else {
	        echo "1";//true
	        //echo $id_breakdown."|".$graft_volume;
	    }
	}

	public function max_volume_edit_graft(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_breakdown = $this->input->post('breakdown_graft');
		$graft_volume = $this->input->post('volume_graft');
		$actual_volume= $this->input->post('actual_volume');
		$breakdown = $this->model_breakdown->get_breakdown($id_breakdown);
		
		
		$variedad=$breakdown[0]->variety;
		$portainjerto=$breakdown[0]->rootstock;

		$total_semillas1=$this->model_breakdown->get_total_seed($this->uri->segment(3),$variedad);
		$total_semillas2=$this->model_breakdown->get_total_seed($this->uri->segment(3),$portainjerto);


		if($total_semillas1[0]->viability_total < $total_semillas2[0]->viability_total){
			$maximo=$total_semillas1[0]->viability_total;

			/*if($total_semillas1[0]->punch_total != 0 && $total_semillas1[0]->punch_total < $maximo){
				$maximo=$total_semillas1[0]->punch_total;
			}
			if($total_semillas1[0]->transplant_total != 0 && $total_semillas1[0]->transplant_total < $maximo ){
				$maximo=$total_semillas1[0]->transplant_total;
			}*/
			$maximo2=$total_semillas1[0]->graft_total - $actual_volume + $graft_volume;
		}else{
			$maximo=$total_semillas2[0]->viability_total;

			/*if($total_semillas2[0]->punch_total != 0 && $total_semillas2[0]->punch_total < $maximo)
			{
				$maximo=$total_semillas2[0]->punch_total;
			}
			if($total_semillas2[0]->transplant_total != 0 && $total_semillas2[0]->transplant_total < $maximo)
			{
				$maximo=$total_semillas2[0]->transplant_total;
			}*/
			$maximo2=$total_semillas2[0]->graft_total - $actual_volume + $graft_volume;
		}

		$maximo2=$total_semillas1[0]->graft_total - $actual_volume + $graft_volume;

		if($maximo >= $graft_volume && $maximo2 <= $maximo ) {
	        echo "1";//true
	        //echo $maximo.">=".$graft_volume."|".$maximo2."<=".$maximo;
	    } else {
	        echo "11";//false
	        //echo $maximo.">=".$graft_volume."|".$maximo2."<=".$maximo;
	    }
	}

	public function max_volume_punch(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_breakdown = $this->input->post('breakdown_punch');
		$punch_volume = $this->input->post('volume_punch');
		$breakdown=$this->model_breakdown->get_breakdown($id_breakdown);
	
		$variedad=$breakdown[0]->variety;
		$portainjerto=$breakdown[0]->rootstock;

		$total_semillas1=$this->model_breakdown->get_total_seed($this->uri->segment(3),$variedad);
		$total_semillas2=$this->model_breakdown->get_total_seed($this->uri->segment(3),$portainjerto);


		if($total_semillas1[0]->viability_total < $total_semillas2[0]->viability_total){
			$maximo=$total_semillas1[0]->viability_total;

			if($total_semillas1[0]->graft_total != 0 && $total_semillas1[0]->graft_total < $maximo){
				$maximo=$total_semillas1[0]->graft_total;
			}
			if($total_semillas1[0]->transplant_total != 0 && $total_semillas1[0]->transplant_total < $maximo ){
				$maximo=$total_semillas1[0]->transplant_total;
			}
			$maximo2=$total_semillas1[0]->punch_total + $punch_volume;
		}else{
			$maximo=$total_semillas2[0]->viability_total;

			if($total_semillas2[0]->graft_total != 0 && $total_semillas2[0]->graft_total < $maximo){
				$maximo=$total_semillas2[0]->graft_total;
			}
			if($total_semillas2[0]->transplant_total != 0 && $total_semillas2[0]->transplant_total < $maximo){
				$maximo=$total_semillas2[0]->transplant_total;
			}
			$maximo2=$total_semillas2[0]->punch_total + $punch_volume;
		}

		if($maximo < $punch_volume || $maximo2 > $maximo ) {
	        echo "11";//false
	    } else {
	        echo "1";//true
	    }
	}

	public function max_volume_edit_punch(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_breakdown = $this->input->post('breakdown_punch');
		$punch_volume = $this->input->post('volume_punch');
		$actual_volume= $this->input->post('actual_volume');
		$breakdown=$this->model_breakdown->get_breakdown($id_breakdown);
	
		$variedad=$breakdown[0]->variety;
		$portainjerto=$breakdown[0]->rootstock;

		$total_semillas1=$this->model_breakdown->get_total_seed($this->uri->segment(3),$variedad);
		$total_semillas2=$this->model_breakdown->get_total_seed($this->uri->segment(3),$portainjerto);


		if($total_semillas1[0]->viability_total < $total_semillas2[0]->viability_total){
			$maximo=$total_semillas1[0]->viability_total;

			/*if($total_semillas1[0]->graft_total != 0 && $total_semillas1[0]->graft_total < $maximo){
				$maximo=$total_semillas1[0]->graft_total;
			}
			if($total_semillas1[0]->transplant_total != 0 && $total_semillas1[0]->transplant_total < $maximo ){
				$maximo=$total_semillas1[0]->transplant_total;
			}*/
			$maximo2=$total_semillas1[0]->punch_total - $actual_volume + $punch_volume;
		}else{
			$maximo=$total_semillas2[0]->viability_total;

			/*if($total_semillas2[0]->graft_total != 0 && $total_semillas2[0]->graft_total < $maximo){
				$maximo=$total_semillas2[0]->graft_total;
			}
			if($total_semillas2[0]->transplant_total != 0 && $total_semillas2[0]->transplant_total < $maximo){
				$maximo=$total_semillas2[0]->transplant_total;
			}*/
			$maximo2=$total_semillas2[0]->punch_total - $actual_volume + $punch_volume;
		}

		if($maximo >= $punch_volume && $maximo2 <= $maximo ) {
	        echo "1";//true
	    } else {
	        echo "11";//false
	    }

	}

	public function max_volume_transplant(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_breakdown = $this->input->post('breakdown_transplant');
		$transplant_volume = $this->input->post('volume_transplant');
		$breakdown=$this->model_breakdown->get_breakdown($id_breakdown);
		
		$variedad=$breakdown[0]->variety;
		$portainjerto=$breakdown[0]->rootstock;

		$total_semillas1=$this->model_breakdown->get_total_seed($this->uri->segment(3),$variedad);
		$total_semillas2=$this->model_breakdown->get_total_seed($this->uri->segment(3),$portainjerto);


		if($total_semillas1[0]->viability_total < $total_semillas2[0]->viability_total){
			$maximo=$total_semillas1[0]->viability_total;

			if($total_semillas1[0]->graft_total != 0 && $total_semillas1[0]->graft_total < $maximo){
				$maximo=$total_semillas1[0]->graft_total;
			}
			if($total_semillas1[0]->punch_total != 0 && $total_semillas1[0]->punch_total < $maximo ){
				$maximo=$total_semillas1[0]->punch_total;
			}
			$maximo2=$total_semillas1[0]->transplant_total + $transplant_volume;
		}else{
			$maximo=$total_semillas2[0]->viability_total;

			if($total_semillas2[0]->graft_total != 0 && $total_semillas2[0]->graft_total < $maximo){
				$maximo=$total_semillas2[0]->graft_total;
			}
			if($total_semillas2[0]->punch_total != 0 && $total_semillas2[0]->punch_total < $maximo){
				$maximo=$total_semillas2[0]->punch_total;
			}
			$maximo2=$total_semillas2[0]->transplant_total + $transplant_volume;
		}

		if($maximo < $transplant_volume && $maximo2 > $maximo ) {
	        echo "11";//false
	    } else {
	        echo "1";//true
	    }
	}

	public function max_volume_edit_transplant(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_breakdown = $this->input->post('breakdown_transplant');
		$transplant_volume = $this->input->post('volume_transplant');
		$actual_volume= $this->input->post('actual_volume');
		$breakdown=$this->model_breakdown->get_breakdown($id_breakdown);
		
		$variedad=$breakdown[0]->variety;
		$portainjerto=$breakdown[0]->rootstock;

		$total_semillas1=$this->model_breakdown->get_total_seed($this->uri->segment(3),$variedad);
		$total_semillas2=$this->model_breakdown->get_total_seed($this->uri->segment(3),$portainjerto);


		if($total_semillas1[0]->viability_total < $total_semillas2[0]->viability_total){
			$maximo=$total_semillas1[0]->viability_total;

			/*if($total_semillas1[0]->graft_total != 0 && $total_semillas1[0]->graft_total < $maximo){
				$maximo=$total_semillas1[0]->graft_total;
			}
			if($total_semillas1[0]->punch_total != 0 && $total_semillas1[0]->punch_total < $maximo ){
				$maximo=$total_semillas1[0]->punch_total;
			}*/
			$maximo2=$total_semillas1[0]->transplant_total - $actual_volume + $transplant_volume;
		}else{
			$maximo=$total_semillas2[0]->viability_total;

			/*if($total_semillas2[0]->graft_total != 0 && $total_semillas2[0]->graft_total < $maximo){
				$maximo=$total_semillas2[0]->graft_total;
			}
			if($total_semillas2[0]->punch_total != 0 && $total_semillas2[0]->punch_total < $maximo){
				$maximo=$total_semillas2[0]->punch_total;
			}*/
			$maximo2=$total_semillas2[0]->transplant_total - $actual_volume + $transplant_volume;
		}


		if($maximo >= $transplant_volume && $maximo2 <= $maximo ) {
	        echo "1";//true
	       // echo $maximo .">=". $transplant_volume ."||". $maximo2 ."<=". $maximo;
	    } else {
	        echo "11";//false
	        //echo $maximo .">=". $transplant_volume ."||". $maximo2 ."<=". $maximo;
	    }
	}


	public function max_volume_tutoring(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_breakdown = $this->input->post('breakdown_tutoring');
		$tutoring_volume = $this->input->post('volume_tutoring');
		$breakdown=$this->model_breakdown->get_breakdown($id_breakdown);
		
		$variedad=$breakdown[0]->variety;
		$portainjerto=$breakdown[0]->rootstock;

		$total_semillas1=$this->model_breakdown->get_total_seed($this->uri->segment(3),$variedad);
		//$total_semillas2=$this->model_breakdown->get_total_seed($this->uri->segment(3),$portainjerto);

		$maximo=$total_semillas1[0]->transplant_total;
		$maximo2=$total_semillas1[0]->tutoring_total + $tutoring_volume;
		if($maximo < $tutoring_volume || $maximo2 > $maximo ) {
	        echo "11";//false
	        //echo $maximo."<".$tutoring_volume ."||". $maximo2 .">". $maximo; 
	    } else {
	        echo "1";//true
	        //echo $maximo."<".$tutoring_volume ."||". $maximo2 .">". $maximo; 
	    }
	}

	public function max_volume_edit_tutoring(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_breakdown = $this->input->post('breakdown_tutoring');
		$tutoring_volume = $this->input->post('volume_tutoring');
		$actual_volume= $this->input->post('actual_volume');


		$breakdown=$this->model_breakdown->get_breakdown($id_breakdown);
		
		$variedad=$breakdown[0]->variety;
		$portainjerto=$breakdown[0]->rootstock;

		$total_semillas1=$this->model_breakdown->get_total_seed($this->uri->segment(3),$variedad);
		//$total_semillas2=$this->model_breakdown->get_total_seed($this->uri->segment(3),$portainjerto);

		$maximo=$total_semillas1[0]->transplant_total;
		$maximo2=$total_semillas1[0]->tutoring_total - $actual_volume + $tutoring_volume;
		if($maximo < $tutoring_volume || $maximo2 > $maximo ) {
	        echo "11";//false
	    } else {
	        echo "1";//true
	    }
	}

	public function upload_injer1($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_injer1'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#injerto', 'refresh');
		}
	}

	public function upload_injer2($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_injer2'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#injerto', 'refresh');
		}
	}

	public function upload_injer3($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_injer3'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#injerto', 'refresh');
		}
	}

	public function upload_pinch1($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_pinch1'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#pinchado', 'refresh');
		}
	}

	public function upload_pinch2($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_pinch2'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#pinchado', 'refresh');
		}
	}

	public function upload_pinch3($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_pinch3'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#pinchado', 'refresh');
		}
	}

	public function upload_trans1($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_trans1'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#transplante', 'refresh');
		}
	}

	public function upload_trans2($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_trans2'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#transplante', 'refresh');
		}
	}

	public function upload_trans3($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_trans3'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#transplante', 'refresh');
		}
	}

	public function upload_tuto1($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_tuto1'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#tutoreo', 'refresh');
		}
	}

	public function upload_tuto2($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_tuto2'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#tutoreo', 'refresh');
		}
	}

	public function upload_tuto3($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('breakdown/process/'.$uri.'#error');
		} else {
			$data = $this->upload->data();
			$datos['img_tuto3'] = $data['file_name'];
			$this->model_breakdown->update_image_process($this->uri->segment(3),$datos);			
			
			redirect('breakdown/process/'.$uri.'#tutoreo', 'refresh');
		}
	}



	public function delete_injer1()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_injer1' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_injer1;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#injerto');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function delete_injer2()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_injer2' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_injer2;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#injerto');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function delete_injer3()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_injer3' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_injer3;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#injerto');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function delete_pinch1()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_pinch1' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_pinch1;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#pinchado');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function delete_pinch2()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_pinch2' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_pinch2;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#pinchado');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function delete_pinch3()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_pinch3' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_pinch3;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#pinchado');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function delete_trans1()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_trans1' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_trans1;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#transplante');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function delete_trans2()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_trans2' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_trans2;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#transplante');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function delete_trans3()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_trans3' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_trans3;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#transplante');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function delete_tuto1()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_tuto1' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_tuto1;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#tutoreo');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function delete_tuto2()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_tuto2' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_tuto2;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#tutoreo');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function delete_tuto3()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data = array(
				'img_tuto3' => NULL
			);
		$image_process = $this->model_breakdown->get_image_process($this->uri->segment(3));
		$path = 'uploads/'.$image_process->result()[0]->img_tuto3;
		$this->model_breakdown->update_image_process($this->uri->segment(3),$data);
		if(unlink($path)) {
     		redirect('breakdown/process/'.$this->uri->segment(3).'#tutoreo');
		}
		else {
     		echo 'errors occured';
		}
	}

	public function add_message(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_order=$this->input->post('id');
		$message=$this->input->post('message');
		$this->model_breakdown->add_message($id_order,$message);
		if($this->uri->segment(3)==1){
			redirect('breakdown/index');
		}else if($this->uri->segment(3)==2){
			redirect('breakdown/pedido_proceso');
		}else if($this->uri->segment(3)==3){
			redirect('breakdown/pedido_embarcado');
		}else if($this->uri->segment(3)==4){
			redirect('breakdown/finalizado');
		}
		
	}

}		