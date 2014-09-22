<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {
	function __construct() {
	   parent::__construct();
	   	$this->load->model('model_user','',TRUE);
	   	$this->load->model('model_order','',TRUE);
	   	$this->load->model('model_client','',TRUE);
	   	$this->load->model('model_publicity','',TRUE);
	}

	//funcion para monitorear el tiempo de logout
	public function update_logout_time(){
		$loguot_time=time();
		$login_time=$this->session->userdata('login_time');
		$user=$this->session->userdata('id');
		$this->model_client->update_logout_time($loguot_time,$user,$login_time);
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in')==FALSE)
		{
			$template['header'] = "header/view_login_header.php";
			$template['body'] = "body/view_login_body.php";
			$template['footer'] = "footer/view_footer.php";
		} else {
			$termsncon=$this->model_client->get_user($this->session->userdata('id'));
			if($termsncon[0]->terms_conditions == 0){
				$template['header'] = 'header/view_client_header.php';
				$template['body'] = 'body/view_client_terms_cond.php';
				$template['footer'] = "footer/view_footer.php";
			}else{
				$template['user']=$this->model_client->get_user($this->session->userdata('id'));
				$template['alerts']=$this->model_client->get_alert($this->session->userdata('id'));
				$template['messages']=$this->model_client->get_messages($this->session->userdata('id'));
				$template['orders']=$this->model_client->get_order($this->session->userdata('id'));			
				$template['publicity'] = $this->model_publicity->get_client_pub($this->session->userdata('id'));
				$template['header'] = 'header/view_client_header.php';
				$template['body'] = 'body/view_client_body.php';
				$template['footer'] = "footer/view_footer.php";
			}

			
		}

		$this->load->view('main',$template);
	}

	public function pedido_proceso(){
		$template['messages']=$this->model_client->get_messages($this->session->userdata('id'));
		$template['process_order']=$this->model_client->get_process_order($this->session->userdata('id'));
		$template['publicity'] = $this->model_publicity->get_client_pub($this->session->userdata('id'));
		$template['header'] = 'header/view_client_header.php';
		$template['body'] = 'body/view_client_body_process.php';
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}

	public function pedido_embarcado(){
		$template['messages']=$this->model_client->get_messages($this->session->userdata('id'));
		$template['embarker_order']=$this->model_client->get_process_embarker($this->session->userdata('id'));
		$template['publicity'] = $this->model_publicity->get_client_pub($this->session->userdata('id'));
		$template['header'] = 'header/view_client_header.php';
		$template['body'] = 'body/view_client_body_embarker.php';
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}

	public function finalizado(){
		$template['messages']=$this->model_client->get_messages($this->session->userdata('id'));
		$template['final_order']=$this->model_client->get_final_order($this->session->userdata('id'));
		$template['publicity'] = $this->model_publicity->get_client_pub($this->session->userdata('id'));
		$template['header'] = 'header/view_client_header.php';
		$template['body'] = 'body/view_client_body_final.php';
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}

	public function todos(){
		$template['messages']=$this->model_client->get_messages($this->session->userdata('id'));
		$template['all_order']=$this->model_client->get_order($this->session->userdata('id'));
		$template['publicity'] = $this->model_publicity->get_client_pub($this->session->userdata('id'));
		$template['header'] = 'header/view_client_header.php';
		$template['body'] = 'body/view_client_body_all.php';
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}

	public function inform()
	{
		$template['user']=$this->model_client->get_user($this->session->userdata('id'));
		$template['messages']=$this->model_client->get_alert($this->session->userdata('id'));
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

		$this->form_validation->set_rules('password1', 'password1', 'trim|required|xss_clean|callback_check_user');
	 	
		if($this->form_validation->run() == FALSE) 
		{	
			$this->my_acount_form_client();
			?>
			<script>
			alert("La Contrase\u00f1a ingresada es incorrecta. No se realizo ningun cambio.");
			</script>
			<?php
		}
		else
		{

			$password=$this->passwordhash->HashPassword($this->input->post('password2'));
			$this->model_client->update_pass($password);
			?>
			<script>
			alert("La contrase\u00f1a se modifico con exito!");
			</script>
			<?php
			$this->my_acount_form_client();

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