<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('model_user','',TRUE);
	   $this->load->model('model_order','',TRUE);
	}

	public function index()
	{
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body.php';
		$template['footer'] = "footer/view_footer.php";
		//Manda los datos necesarios para cargar los pedidos y datos del usuario
		$template['pedidos'] = $this->model_order->get_orders('99');

		$this->load->view('main',$template);
	}

	public function dropdown_companies()
	{
		$result = $this -> model_order -> get_companies_drop();
		foreach($result as $row)
		{
			$companies[$row -> farm_name] = $row -> farm_name; 
		}
		return form_dropdown('companies', $companies);
	}
	
	//obtener la informacion de las compañia e imprimirla
	public function get_companie_info()
	{	
		
		$companie = $this->input->post('id_companie');
		
		if($companie>0){
		$comp=$this->model_user->obtenerCliente($companie);

		$first_name=$comp->result()[0]->first_name;
		$last_name=$comp->result()[0]->last_name;
		$mail=$comp->result()[0]->mail;
		$phone=$comp->result()[0]->phone;
		$street=$comp->result()[0]->street;
		$address_number=$comp->result()[0]->address_number;
		$colony=$comp->result()[0]->colony;
		$cp=$comp->result()[0]->cp;
		$social_reason=$comp->result()[0]->social_reason;

		echo "<br>";
		echo "<p><b>Razón Social:</b> ",$social_reason,"</p>";
		echo "<p><b>Calle/Colonia:</b> ",$street,",",$colony,"</p>";
		echo "<p><b>Numero: </b>",$address_number,"</p>";
		echo "<p><b>C.P.:</b> ",$cp,"</p>";
		echo "<p><b>Telefono:</b> ",$phone,"</p>";
		echo "<p><b>Nombre Completo:</b> ",$first_name," ",$last_name,"</p>";
		echo "<p><b>Correo electronico: </b>",$mail,"</p>";
		
		}else{
			echo "";
		}

		
	}
	
	//Muestra el formulario para empezar a ordenar	
	public function carga_ordenes(){
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_orders.php';
		$template['footer'] = "footer/view_footer.php";
		$template['companies'] = $this->model_order->get_companies_drop();
		
		$this->load->view('main',$template);	
		
	}
	
	public function load_zero_step()
	{
		$this->load->view('body/view_orders.php');
	}
	
	public function load_first_step($id)
	{
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_order_first.php';
		$template['footer'] = "footer/view_footer.php";
		$template['plants'] = $this->model_order->get_plants();
		$template['categories'] = $this->model_order->get_categories();
		$template['id_company']=$id;
		$template['company']=$this->model_user->get_client($id);

		$this->load->view('main',$template);	
	}
	
	public function load_second_step($id, $fecha, $idplant, $voltot, $categ)
	{
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_order_second.php';
		$template['footer'] = "footer/view_footer.php";
		$template['sustratum'] = $this->model_order->get_sustratum();
		$template['id_company']=$id;
		$template['company']=$this->model_user->get_client($id);
		$template['fecha']=$fecha;
		$template['planta']=$this->model_order->get_plant($idplant);
		$template['volumen']=$voltot;
		$template['categoria']=$this->model_order->get_category($categ); 
		$template['id_order']=$this->model_order->get_id_order();
		
		$this->load->view('main',$template);	
	}

	function pending_order_second_next_before(){
		if(!empty($this->input->post('next'))){
			
			
		}
		else if(!empty($this->input->post('before'))){
			$id_order=$this->input->post('id_order');
			$template['order']=$this->model_order->get_order_id_order($id_order);
			$template['order_comment']=$this->model_order->get_order_comment($id_order);
			

			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_order_first_data.php';
			$template['footer'] = "footer/view_footer.php";
			$template['plants'] = $this->model_order->get_plants();
			$template['categories'] = $this->model_order->get_categories();
			
			$template['company']=$this->model_user->get_client($template['order']->result()[0]->id_client);

		$this->load->view('main',$template);	

		}
	}

	//carga las ordenes pendientes
	public function pending_order(){
		
		$a=$this->input->post();
		$id_client=$a['companies'];
		$template['id_company']=$id_client;
		$template['pending_order']=$this->model_order->get_pending_oreder($id_client);
		$template['company']=$this->model_user->get_client($id_client);
		if($id_client > 0){
			//verifica si tiene ordenes pendientes
			if($this->model_order->get_pending_oreder($id_client)!=false){
			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_pending_orders.php';
			$template['footer'] = "footer/view_footer.php";


			$this->load->view('main',$template);
			}
			else{
				$template['body']=$this->load_first_step($id_client);
				
			}
		}else $this->carga_ordenes();

	}

	public function pending_order_two($id){
		
		$id_client=$id;
		$template['id_company']=$id_client;
		$template['pending_order']=$this->model_order->get_pending_oreder($id_client);
		$template['company']=$this->model_user->get_client($id_client);
		if($id_client > 0){
			//verifica si tiene ordenes pendientes
			if($this->model_order->get_pending_oreder($id_client)!=false){
			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_pending_orders.php';
			$template['footer'] = "footer/view_footer.php";

			$this->load->view('main',$template);
			}
			else{
				$template['body']=$this->carga_ordenes();
				
			}
		}else $this->carga_ordenes();

	}

	//funcion para valorar a donde dirigirse en la orden pendiente atras o adelante
	public function pending_order_next_before(){
		if(!empty($this->input->post('next'))){
			$a=$this->input->post();
			$id_client=$a['id_company'];
			$template['body']=$this->load_first_step($id_client);
			
		}
		else if(!empty($this->input->post('before'))){
			$this->carga_ordenes();
		}
	}

	public function pending_order_first_next_before(){
		$a=$this->input->post();
		$id_client=$a['id_company'];
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
		//Valida que los campos que se reciban esten llenos
		$this->form_validation->set_rules('plant', 'cultivo', 'required|xss_clean|callback_sel_plant');
		$this->form_validation->set_rules('datepicker', 'fecha', 'required|xss_clean|callback_sel_date');
		$this->form_validation->set_rules('arms', 'brazos', 'required|xss_clean');
		$this->form_validation->set_rules('category', 'categoria', 'required|xss_clean|callback_sel_category');
		$this->form_validation->set_rules('volume', 'volumen', 'required|numeric|xss_clean');
		$this->form_validation->set_rules('tutoring', 'tutoreo', 'required|xss_clean');
		
		if(!empty($this->input->post('next'))){
			if($this->form_validation->run() == FALSE) 
			{
				//vuelve a la pagina de registro e imprime los errores
				$this->load_first_step($id_client);
				

			}
			else{
				$data['id_status'] = 4;
				$data['id_plant'] = $this->input->post('plant');
				$data['id_category'] = $this->input->post('category');
				$data['id_user'] =$this->session->userdata('id');
				$data['id_client'] = $id_client;
				$fecha=$this->input->post('datepicker');
				$data['order_date_delivery'] = date("Y-m-d H:i:s", strtotime($fecha));
				$data['total_volume'] = $this->input->post('volume');
				$data['branch_number'] = $this->input->post('arms');
				$data['tutoring'] = $this->input->post('tutoring');

				$datas=$this->input->post('comment');

				$idplant=$data['id_plant'];
				$voltot=$data['total_volume'];
				$categ=$data['id_category'];

					
				if($this->model_order->add_order($data) > 0 )
				{
					if($datas!=""){
						$this->model_order->add_coment_oreder($datas);
					}
					unset($data);
					$data['msj'] = "Exito";
					$data['template'] = $this->load_second_step($id_client, $fecha, $idplant, $voltot, $categ);
					

				}
				else
				{
					unset($data);
					$error['msj'] = "Error";
					$error['errores'] = "Error al guardar al usuario";
					$error['template'] = $this->load_first_step($id_client);
					
				}
			
			}
			
			
		}
		else if(!empty($this->input->post('before'))){
			$template['body']=$this->pending_order_two($id_client);
			
		}
	}

	public function pending_order_first_next_before_update(){
		$a=$this->input->post();
		$id_client=$a['id_company'];
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
		//Valida que los campos que se reciban esten llenos
		$this->form_validation->set_rules('plant', 'cultivo', 'required|xss_clean|callback_sel_plant');
		$this->form_validation->set_rules('datepicker', 'fecha', 'required|xss_clean|callback_sel_date');
		$this->form_validation->set_rules('arms', 'brazos', 'required|xss_clean');
		$this->form_validation->set_rules('category', 'categoria', 'required|xss_clean|callback_sel_category');
		$this->form_validation->set_rules('volume', 'volumen', 'required|numeric|xss_clean');
		$this->form_validation->set_rules('tutoring', 'tutoreo', 'required|xss_clean');
		
		if(!empty($this->input->post('next'))){
			if($this->form_validation->run() == FALSE) 
			{
				//vuelve a la pagina de registro e imprime los errores
				$this->load_first_step($id_client);
				

			}
			else{
				$data['id_status'] = 4;
				$data['id_plant'] = $this->input->post('plant');
				$data['id_category'] = $this->input->post('category');
				$data['id_user'] =$this->session->userdata('id');
				$data['id_client'] = $id_client;
				$fecha=$this->input->post('datepicker');
				$data['order_date_delivery'] = date("Y-m-d H:i:s", strtotime($fecha));
				$data['total_volume'] = $this->input->post('volume');
				$data['branch_number'] = $this->input->post('arms');
				$data['tutoring'] = $this->input->post('tutoring');

				$datas['comment_description']=$this->input->post('comment');

				$idplant=$data['id_plant'];
				$voltot=$data['total_volume'];
				$categ=$data['id_category'];

				$id_order=$this->input->post('id_order');

					
				if($this->model_order->update_order($id_order,$data) > 0 )
				{
					$this->model_order->update_coment_oreder($id_order,$datas);
					unset($data);
					$data['msj'] = "Exito";
					$data['template'] = $this->load_second_step($id_client, $fecha, $idplant, $voltot, $categ);
				

				}
				else
				{
					unset($data);
					$error['msj'] = "Error";
					$error['errores'] = "Error al guardar al usuario";
					$error['template'] = $this->load_second_step($id_client, $fecha, $idplant, $voltot, $categ);
				
				}
			
			}
			
			
		}
		else if(!empty($this->input->post('before'))){
			$template['body']=$this->pending_order_two($id_client);
			
		}
	}
	function sel_plant()
	{
		if($this->input->post('plant') == "-1")
		{
			$this->form_validation->set_message('sel_plant', 'Selecciona un %s.');
			return FALSE;
		}
		return TRUE;
	}

	function sel_category()
	{
		if($this->input->post('category') == "-1")
		{
			$this->form_validation->set_message('sel_category', 'Selecciona una %s.');
			return FALSE;
		}
		return TRUE;
	}

	function sel_date()
	{
		$fecha=$this->input->post('datepicker');
		$date= date("Y-m-d H:i:s", strtotime($fecha));
		$cdate=date("Y-m-d H:i:s");
		if($cdate > $date)
		{
			$this->form_validation->set_message('sel_date', 'La %s seleccionada es menor al dia de hoy.');
			return FALSE;
		}
		return TRUE;
	}
}