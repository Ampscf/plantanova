<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('model_user','',TRUE);
	   $this->load->model('model_order','',TRUE);
	   $this->load->model('model_client','',TRUE);
	}

	public function index()
	{
		$sessionData = array(
            "id" => null,
            "mail" => null,
            "logged_in" => FALSE,
            "id_rol" => 0
        );

        $this->session->set_userdata($sessionData);

		$template['header'] = "header/view_login_header.php";
		$template['body'] = "body/view_login_body.php";
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}


	//Verifica informacion y entra a la pagina principal con una sesion
	function log_in() 
	{
		//Carga la libreria de validación de campos
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	 
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean|callback_check_user');
	 	
		if($this->form_validation->run() == FALSE) 
		{
			$template['header'] = "header/view_login_header.php";
			$template['body'] = "body/view_login_body.php";
			$template['footer'] = "footer/view_footer.php";
			//Error en el inicio de sesión devuelve a la pagina de log in
			$this->load->view('main',$template);
		}
		else
		{
			//Manda a la pagina principal del rol que inicia sesión
			if($this->session->userdata('id_rol')!=1){
				$this->model_user->insert_time($this->session->userdata('id'),$this->session->userdata('login_time'));
			}
			
			redirect('breakdown/index','refresh');
		}
	 }


	 //Verifica que los datos de usuario introducidos coincidan con los de la base de datos
	 function check_user()
	 {
	 	//Carga libreria para encriptar password
	 	$this->load->library('PasswordHash');
		//Genera un password bcrypt del input
		//$hash = $this->passwordhash->HashPassword($this->input->post('password'));
		//echo $hash;

	 	$mail = $this->input->post('email');
	 	$pass = $this->input->post('password');
	 	//Obtiene al usuario por su email
	 	$user = $this->model_user->login($mail);

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
	                "login_time"=>time()
	            );
	            $this->session->set_userdata($sessionData);
		 		return TRUE;
	 		}
	 		else
	 		{
	 			$this->form_validation->set_message('check_user', 'El correo o la contraseña son incorrectos.');
	 			return FALSE;
	 		}
	 	}
	 	else 
	 	{
	 		$this->form_validation->set_message('check_user', 'El correo o la contraseña son incorrectos.');
	 		return FALSE;
	 	}
	 }

	 //Destruye la sessión actual y regresa a página de login
	 function logout()
	 {
	 	if($this->session->userdata('id_rol')!=1){
	 		$loguot_time=time();
			$login_time=$this->session->userdata('login_time');
			$user=$this->session->userdata('id');
			$this->model_client->update_logout_time($loguot_time,$user,$login_time);
		}
	 	$user_out = $this->session->all_userdata();
	 	$this->session->unset_userdata($user_out);
	 	session_destroy();
	 	redirect('principal/index','refresh');
	 }
}