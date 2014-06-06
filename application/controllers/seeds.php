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