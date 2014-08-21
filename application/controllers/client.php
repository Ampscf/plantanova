<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Client extends CI_Controller {
	function __construct() {
	   parent::__construct();
	   	$this->load->model('model_user','',TRUE);
	   	$this->load->model('model_order','',TRUE);
	}
	
	public function index()
	{
		$template['header'] = 'header/view_client_header.php';
		$template['body'] = 'body/view_client_body.php';
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}

	public function inform()
	{
		$template['header'] = 'header/view_client_header.php';
		$template['body'] = 'body/view_client_inform.php';
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}

	public function contributors()
	{
		$template['header'] = 'header/view_client_header.php';
		$template['body'] = 'body/view_client_contributor.php';
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	} 

	public function my_acount_form_client(){
		$template['client']=$this->model_user->obtenerCliente($this->session->userdata('id'));
		$template['header'] = 'header/view_client_header.php';
		$template['body'] = 'body/view_client_acount.php';
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}

	public function change_pass(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div style="display:none" id="error">', '</div>');

		$this->form_validation->set_rules('password1', 'password1', 'trim|required|xss_clean|callback_check_user');
	 	
		if($this->form_validation->run() == FALSE) 
		{	
			$this->my_acount_form_client();
		}
		else
		{
			//Manda a la pagina principal del rol que inicia sesión
			echo "simon";
		}
	}

	 function check_user()
	 {
	 	//Carga libreria para encriptar password
	 	$this->load->library('PasswordHash');
		
	 	$pass = $this->input->post('password1');
	 	//Obtiene al usuario 
	 	$user = $this->model_user->login($this->session->userdata('mail'));

	 	//Verifica que exista el usuario
	 	if($user)
	 	{
	 		//Verifica que el password dado y el de la base de datos sean iguales despues de la encripción
	 		if($this->passwordhash->CheckPassword($pass,$user->password))
	 		{
	 			//Establece los datos de sesión
	 			$sessionData = array(
	                "id" => $user->id_user,
	                "mail" => $user->mail,
	                "logged_in" => TRUE,
	                "id_rol" => $user->id_rol,
	            );
	            $this->session->set_userdata($sessionData);
		 		return TRUE;
	 		}
	 		else
	 		{
	 			$this->form_validation->set_message('check_user', 'error');
	 			return FALSE;
	 		}
	 	}
	 	else 
	 	{
	 		$this->form_validation->set_message('check_user', 'error');
	 		return FALSE;
	 	}
	 }
}
?>