<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function index()
	{
		$template['header'] = "header/view_login_header.php";
		$template['body'] = "body/view_login_body.php";
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}
}