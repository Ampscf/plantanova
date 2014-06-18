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
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body.php';
		$template['footer'] = "footer/view_footer.php";
		//Manda los datos necesarios para cargar los pedidos y datos del usuario
		$template['pedidos'] = $this->model_breakdown->get_new_orders();

		$this->load->view('main',$template);
	}

	public function pedido_nuevo(){
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body.php';
		$template['footer'] = "footer/view_footer.php";
		$template['pedidos'] = $this->model_breakdown->get_new_orders();
		$this->load->view("extra/tabla_pedido_nuevo",$template);
	}

	public function pedido_proceso(){
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body_process.php';
		$template['footer'] = "footer/view_footer.php";
		$template['pedidos_proceso'] = $this->model_breakdown->get_process_orders();
		$this->load->view("main",$template);
	}

	public function pedido_embarcado(){
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body_embarcado.php';
		$template['footer'] = "footer/view_footer.php";
		$template['pedidos_embarcados'] = $this->model_breakdown->get_finish_orders();
		$this->load->view("main",$template);
	}
	
	public function process()
	{
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_process.php';
		$template['footer'] = 'footer/view_footer.php';
		$template['id_order']=$this->uri->segment(3);
		$template['id_company']=$order->result()[0]->id_client;
		$template['company']=$this->model_user->get_client($order->result()[0]->id_client);
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['id_plant']=$order->result()[0]->id_plant;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categ']=$order->result()[0]->id_category;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category);
		$template['client']=$this->model_user->obtenerCliente($order->result()[0]->id_client);
		$template['breakdown']=$this->model_order->get_breakdown($this->uri->segment(3));
		$template['germination'] = $this->model_breakdown->get_germination($template['breakdown'][0]->id_breakdown);
		$template['graft'] = $this->model_breakdown->get_graft($template['breakdown'][0]->id_breakdown);
		
		$this->load->view("main",$template);
	}

	public function insert_germination(){
		$datos['id_breakdown']=$this->input->post('breakdown_germination');
		$datos['volume']=$this->input->post('volume');
		$datos['viability']=$this->input->post('viability');
		$datos['comment']=$this->input->post('comment');
		$datos['id_process_type']='2';
		//$datos['id_order']=$this->uri->segment(3);

		$this->model_breakdown->add_germination($datos);
		redirect("breakdown/process/".$this->uri->segment(3), "refresh");

	}
	public function insert_graft(){
		$datos['id_breakdown']=$this->input->post('breakdown_graft');
		$datos['volume']=$this->input->post('volume');
		//$datos['viability']=$this->input->post('viability');
		$datos['comment']=$this->input->post('comment');
		$datos['id_process_type']='3';
		//$datos['id_order']=$this->uri->segment(3);

		$this->model_breakdown->add_germination($datos);
		redirect("breakdown/process/".$this->uri->segment(3), "refresh");

	}

	public function delete_process()
    {
        foreach ($_POST as $key => $value)
        {
            if(is_int($key))
            {    
                $llave=$key;

            }
        }
       $this->model_breakdown-> delete_process($llave);
       redirect("breakdown/process/".$this->uri->segment(3), "refresh");
    }
}		