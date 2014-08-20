<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seeds extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('model_seeds','',TRUE);
		$this->load->model('model_order','',TRUE);
		$this->load->model('model_user','',TRUE);
		$this->load->model('model_breakdown','',TRUE);
	}

	public function index(){
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/view_seeds.php";
		$template['footer'] = "footer/view_footer.php";
		$template['seeds'] = $this->model_seeds->select_seed_distinct();
		$template['variety']=$this->model_seeds->get_variety();
		$template['rootstock']=$this->model_seeds->get_rootstock();

			
		$this->load->view('main',$template);
	}


	public function register_seeds_form(){
		
		$template['order']=$this->model_seeds-> get_orders();

		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = "body/view_seeds_register.php";
		$template['footer'] = "footer/view_footer.php";
		$template['id_company']=$order->result()[0]->id_client;
		$template['company']=$this->model_user->get_client($order->result()[0]->id_client);
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['id_plant']=$order->result()[0]->id_plant;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categ']=$order->result()[0]->id_category;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category); 
		$template['id_order']=$this->uri->segment(3);
		$template['client']=$this->model_user->obtenerCliente($order->result()[0]->id_client);
		$template['breakdown']=$this->model_order->get_breakdown($this->uri->segment(3));
		$template['varial']=$this->model_breakdown->get_order_variety($this->uri->segment(3));
		$template['injertal']=$this->model_breakdown->get_order_rootstock($this->uri->segment(3));
		$template['sowing'] = $this->model_order->get_sowing($this->uri->segment(3));
		$template['suma']=$this->model_seeds->suma_volumen_seeds($this->uri->segment(3));	
		$template['farmer']=$order->result()[0]->farmer;
		$template['seeds']=$this->model_seeds->get_client_seeds($this->uri->segment(3));
		$template['ma']=$this->model_seeds->get_mark();

		

		$this->load->view('main',$template);
	}

	//Registra semillas
	public function register_seeds() 
	{
			//Obtiene tdos los campos a guardar del usuario en un arreglo
			$data['id_order'] = $this->uri->segment(3);
			$data['seed_name'] = $this->input->post('seed_name');
			$data['batch'] = $this->input->post('batch');
			$data['volume'] = $this->input->post('volume');
			$data['type'] = $this->input->post('type');
			$date=$this->input->post('datepicker');
			$data['seeds_date'] =  date("Y-m-d H:i:s", strtotime($date));
			$data['germ_percentage']=$this->input->post('germ_percentage');
			$data['mark']=$this->input->post('mark');
			
			$this->model_seeds->insert_seeds($data);

			redirect("seeds/register_seeds_form/".$this->uri->segment(3).'/'.$this->uri->segment(4), "refresh");
			
	} 
	
	//cambia el estatus de semillas a 2
	public function register_status(){
		$this->model_order->update_status($this->uri->segment(3));
		redirect("breakdown/pedido_proceso/", "refresh");
	}

	//funcion que caraga informacion para editar las semillas
	function edit_seeds(){
		$id = $this->uri->segment(3);
		$template['seed']=$this->model_seeds->get_seed_id($id);
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/view_seeds_edit_seeds_body.php";
		$template['footer'] = "footer/view_footer.php";
		$template['order']=$this->model_seeds-> get_orders();

			
		$this->load->view('main',$template);
		
	}

	//edicion de semillas
	public function update_seeds() 
	{
		$datos['order']=$this->model_seeds->get_orders();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	 	
	 	//Valida los campos que se reciben
		$this->form_validation->set_rules('id_order','Orden','required|xss_clean|callback_sel_order');
		$this->form_validation->set_rules('seed_name','Nombre','required|xss_clean');
		$this->form_validation->set_rules('batch','Tipo','required|xss_clean');
		$this->form_validation->set_rules('volume','Cantidad','required|numeric|xss_clean');
		$this->form_validation->set_rules('type','Tipo','required|xss_clean');

		//Algunos datos no son correctos y se tiene que lenar de nuevo
		if($this->form_validation->run() == FALSE) 
		{
			//vuelve a la pagina de registro e imprime los errores
			$error['msj'] = "Error";
			$error['errores'] = "Hay errores en la forma";
			$error['template'] = $this->load->view('body/view_seeds_edit_seeds_body_empty',$datos,TRUE);
			echo json_encode($error);
		}
		//Los datos son correctos y se redirecciona para login
		else
		{
			
			//Obtiene tdos los campos a guardar del usuario en un arreglo
			$data['id_order'] = $this->input->post('id_order');
			$data['seed_name'] = $this->input->post('seed_name');
			$data['batch'] = $this->input->post('batch');
			$data['volume'] = $this->input->post('volume');
			$data['type'] = $this->input->post('type');
			
			//Verifica si hubo una tupla modificada o agregada
			if($this->model_seeds->update_seed($this->uri->segment(3),$data) > 0 )
			{
				unset($data);
				$data['msj'] = "Exito";
				$data['template'] = $this->load->view('body/view_seeds_edit_seeds_body_empty',$datos,TRUE);
				echo json_encode($data);

				
			}
			else
			{
				unset($data);
				$error['msj'] = "Error";
				$error['errores'] = "Error al guardar al usuario";
				$error['template'] = $this->load->view('body/view_seeds_edit_seeds_body_empty',$datos,TRUE);
				echo json_encode($error);
			}
		}	
	} 


	//eliminar semillas
	public function delete_seed()
	{
		$order=$this->uri->segment(3);
		foreach ($_POST as $key => $value) 
		{
			if(is_int($key))
			{
				$llave=$key;
			}
		}
		$this -> model_seeds -> delete_seeds($llave);
		redirect("seeds/register_seeds_form/$order/".$this->uri->segment(4), "refresh");
	}

	function sel_order(){
		if($this->input->post('id_order') == "-1")
		{
			$this->form_validation->set_message('sel_order', 'Selecciona una %s.');
			return FALSE;
		}
		return TRUE;
	}

	//AJAX:Función que regresa variedad o portainjerto de una orden
	public function get_type()
	{	
		$value= $this->input->post('value');
		$id_order= $this->input->post('id_order');
		if($value == "Variedad"){
			$variety = $this->model_breakdown->get_order_variety($id_order);
			$result = "";
			foreach ($variety as $key) 
			{
				$result = $result . "<option value='" . $key->variety . "'>" . $key->variety . "</option>";
			}
			echo $result;
		}
		else if($value == "Portainjerto"){
			$rootstock = $this->model_breakdown->get_order_rootstock($id_order);
			$result = "";
			foreach ($rootstock as $key) 
			{
				$result = $result . "<option value='" . $key->rootstock . "'>" . $key->rootstock . "</option>";
			}
			echo $result;
		}
	}

	public function final_resume(){
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = "body/view_seeds_resume.php";
		$template['footer'] = "footer/view_footer.php";
		$template['id_company']=$order->result()[0]->id_client;
		$template['company']=$this->model_user->get_client($order->result()[0]->id_client);
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['id_plant']=$order->result()[0]->id_plant;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categ']=$order->result()[0]->id_category;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category); 
		$template['id_order']=$this->uri->segment(3);
		$template['client']=$this->model_user->obtenerCliente($order->result()[0]->id_client);
		$template['breakdown']=$this->model_order->get_breakdown($this->uri->segment(3));
		$template['varial']=$this->model_breakdown->get_order_variety($this->uri->segment(3));
		$template['injertal']=$this->model_breakdown->get_order_rootstock($this->uri->segment(3));
		$template['sowing'] = $this->model_order->get_sowing($this->uri->segment(3));
		$template['suma']=$this->model_seeds->suma_volumen_seeds($this->uri->segment(3));	
		$template['farmer']=$order->result()[0]->farmer;
		$template['seeds']=$this->model_seeds->get_client_seeds($this->uri->segment(3));

		$this->load->view('main',$template);
	}


	
	public function add_orders_seed()
	{
		$b = $this->model_seeds->order_seeds(303);
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/prueba.php";
		$template['footer'] = "footer/view_footer.php";
		$i=0;
		$a = array();
		if ($b != null){
			foreach ($b as $key)
			{
				$a[$i]=$key->seed;		
				echo $key->seed;
				$i++;
			}
		} else {
			echo 'oliiii';
		}

		$j=0;
		for($j; $j<count($a);$j++)
		{
			echo $a[$j];
		}	
		/*if(in_array("v1",$a))
		{
			echo $b->result()[$i]->seed;
		}
		else
		{
			echo "no";
		}*/
		$this->load->view('main',$template);
	}

	public function register_mark(){
		$datos['mark']=$this->input->post('mark');
		$this->model_seeds->register_mark($datos);
		redirect("seeds/index", "refresh");

	}

	public function delete_variety(){
		$id_variety=$this->input->post('vari');
		$this->model_seeds->delete_variety($id_variety);
		redirect("seeds/index", "refresh");
	}

	public function delete_rootstock(){
		$id_rootstock=$this->input->post('por');
		$this->model_seeds->delete_rootstock($id_rootstock);
		redirect("seeds/index", "refresh");
	}



}
	
?>