<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seeds extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('model_seeds','',TRUE);
		$this->load->model('model_order','',TRUE);
		$this->load->model('model_user','',TRUE);
	}

	public function index(){
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/view_seeds.php";
		$template['footer'] = "footer/view_footer.php";
		$template['seeds'] = $this->model_seeds->get_seeds_lists();
			
		$this->load->view('main',$template);
	}


	public function register_seeds_form(){
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/view_seeds_register.php";
		$template['footer'] = "footer/view_footer.php";
		$template['order']=$this->model_seeds-> get_orders();

		$this->load->view('main',$template);
	}

	//Registra un usuario 
	function register_seeds() 
	{
		$datos['order']=$this->model_seeds-> get_orders();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	 	
	 	//Valida los campos que se reciben
		$this->form_validation->set_rules('id_order','Orden','required|xss_clean');
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
			$error['template'] = $this->load->view('body/view_seeds_register',$datos,TRUE);
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
			if($this->model_seeds->insert_seeds($data) > 0 )
			{
				unset($data);
				$data['msj'] = "Exito";
				$data['template'] = $this->load->view('body/view_seeds_register',$datos,TRUE);
				echo json_encode($data);

				
			}
			else
			{
				unset($data);
				$error['msj'] = "Error";
				$error['errores'] = "Error al guardar al usuario";
				$error['template'] = $this->load->view('body/view_seeds_register',$datos,TRUE);
				echo json_encode($error);
			}
		} 

	
	public function delete_seed()
	{
		foreach ($_POST as $key => $value) 
		{
			if(is_int($key))
			{
				$llave=$key;
			}
		}
		$this -> model_seeds -> delete_seeds($llave);
		redirect("seeds/index", "refresh");

	}
}

?>