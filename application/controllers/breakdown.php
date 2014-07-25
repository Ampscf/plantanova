

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
		$template['pedidos_proceso_germination'] = $this->model_breakdown->get_process_germination();
		$template['pedidos_proceso_graft'] = $this->model_breakdown->get_process_graft();
		$template['pedidos_proceso_punch'] = $this->model_breakdown->get_process_punch();
		$template['pedidos_proceso_transplant'] = $this->model_breakdown->get_process_transplant();
		$template['pedidos_proceso_sowing'] = $this->model_breakdown->get_process_sowing();
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
		$breakdown=$this->model_order->get_breakdown($this->uri->segment(3));
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
		$template['breakdown']=$breakdown;
		$template['germination'] = $this->model_breakdown->get_germination($this->uri->segment(3));
		$template['graft'] = $this->model_breakdown->get_graft($this->uri->segment(3));
		$template['punch']= $this->model_breakdown->get_punch($this->uri->segment(3));
		$template['transplant']= $this->model_breakdown->get_transplant($this->uri->segment(3));
		$template['suma']=$this->model_order->suma_volumen_sowing($this->uri->segment(3));
		$template['total_germ']=$this->model_order->get_total_germ($this->uri->segment(3));
		$template['total_graft']=$this->model_order->get_total_graft($this->uri->segment(3));
		$template['total_punch']=$this->model_order->get_total_punch($this->uri->segment(3));
		$template['total_transplant']=$this->model_order->get_total_transplant($this->uri->segment(3));
		$template['sowing'] = $this->model_order->get_sowing($this->uri->segment(3));
		$template['seeds']=$this->model_order->get_seeds($this->uri->segment(3));
		//$template['alcance_germinacion']=(($template['total_germ']->germination/$order->result()[0]->total_volume)-1) * 100;
		//$template['alcance_injerto']=(($template['total_graft']->graft/$order->result()[0]->total_volume)-1) * 100;
		//$template['alcance_pinchado']=(($template['total_punch']->punch/$order->result()[0]->total_volume)-1) * 100;
		//$template['alcance_transplante']=(($template['total_transplant']->transplant/$order->result()[0]->total_volume)-1) * 100;
		$template['farmer']=$order->result()[0]->farmer;
		$template['varial']=$this->model_breakdown->get_sowing($this->uri->segment(3));
		//$template['injertal']=$this->model_breakdown->get_order_rootstock($this->uri->segment(3));
		$this->load->view("main",$template);
	}

	public function insert_germination()
	{
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
		$total_vial=$this->model_order->get_vial_total($this->uri->segment(3),$datos['seed_name']);
		echo $total_vial->viability_total;
		
		$this->model_breakdown->add_germination($datos);

		$order_vol=$this->model_breakdown->get_seed_volume($this->uri->segment(3),$datos['seed_name']);
		
		$total_vol=$total_germ+$datos['volume'];
		$this->model_order->update_total_germination($this->uri->segment(3), $total_vol);
		
		redirect("breakdown/process/".$this->uri->segment(3), "refresh");
	}

	public function insert_graft(){
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

		$this->model_breakdown->add_graft($datos);
		$this->model_order->update_total_graft($this->uri->segment(3), $total_vol);
		redirect("breakdown/process/".$this->uri->segment(3), "refresh");
	}
	
	public function insert_punch()
	{
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
		
		$this->model_breakdown->add_punch($datos);
		$this->model_order->update_total_punch($this->uri->segment(3), $total_vol);
		redirect("breakdown/process/".$this->uri->segment(3), "refresh");
	}

	public function insert_transplant()
	{
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
		
		$this->model_breakdown->add_transplant($datos);
		$this->model_order->update_total_transplant($this->uri->segment(3), $total_vol);	
		redirect("breakdown/process/".$this->uri->segment(3), "refresh");	
	}
	
	public function delete_germination()
    {
        foreach ($_POST as $key => $value)
        {
            if(is_int($key))
            {    
                $llave=$key;

            }
        }

        $volume=$this->model_breakdown->get_volume_germination($llave); 
    	$total_germination=$this->model_order->get_total_germ($this->uri->segment(3));
		$total_germ=$total_germination->germination;
		$total_vol=$total_germ - $volume[0]->volume;
		$this->model_order->update_total_germination($this->uri->segment(3), $total_vol);

       $this->model_breakdown-> delete_process_germination($llave);
       redirect("breakdown/process/".$this->uri->segment(3), "refresh");
    }

    public function delete_graft()
    {
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

       	$this->model_breakdown-> delete_process($llave);
       	redirect("breakdown/process/".$this->uri->segment(3), "refresh");
    }

    public function delete_punch()
    {
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

       $this->model_breakdown-> delete_process($llave);
       redirect("breakdown/process/".$this->uri->segment(3), "refresh");
    }

    public function delete_transplant()
    {
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

      	$this->model_breakdown-> delete_process($llave);
       	redirect("breakdown/process/".$this->uri->segment(3), "refresh");
    }
	public function finish_order()
	{
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

	public function pedido_embarcado_body(){
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
		$a = $this->uri->segment(3);
		$data['id_status']='2';
		
		$this->model_breakdown->update_order2($a,$data);
		
		

		redirect("breakdown/process/".$a, "refresh");
	}
	
	public function final_resume()
	{
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_final_resume.php';
		$template['footer'] = "footer/view_footer.php";
		$template['order']= $order;
		$template['company']=$this->model_user->obtenerCliente($template['order']->result()[0]->id_client);
		$template['plant']=$this->model_order->get_plant($template['order']->result()[0]->id_plant);
		$template['category']=$this->model_order->get_category($template['order']->result()[0]->id_category);
		$template['breakdown']=$this->model_order->get_breakdown($this->uri->segment(3));
		$template['sowing'] = $this->model_order->get_sowing($this->uri->segment(3));
		$template['germination'] = $this->model_breakdown->get_final_germination($this->uri->segment(3));
		$template['graft'] = $this->model_breakdown->get_graft($this->uri->segment(3));
		$template['punch']= $this->model_breakdown->get_punch($this->uri->segment(3));
		$template['transplant']= $this->model_breakdown->get_transplant($this->uri->segment(3));
		
		$this->load->view('main',$template);	
	}

	public function order_resume_nuevo(){
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
		$id = $this->input->post('id');
		$comment = $this->input->post('coment');
		$this->model_order->update_order_comment($id, $comment);
		redirect("breakdown/pedido_proceso", "refresh");
	}

	public function max_volume_sowing(){
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

	public function max_volume_graft(){
		$id_breakdown = $this->input->post('breakdown_graft');
		$graft_volume = $this->input->post('volume_graft');
		$breakdown=$this->model_breakdown->get_breakdown($id_breakdown);
		$sum_variety=$this->model_breakdown-> sum_seed($breakdown[0]->variety, $breakdown[0]->id_order);
		$sum_rootstock=$this->model_breakdown-> sum_seed($breakdown[0]->rootstock, $breakdown[0]->id_order);

		if ($sum_variety[0]->volume < $sum_rootstock[0]->volume){
			$minimo=$sum_variety[0]->volume;
		}else{
			$minimo=$sum_rootstock[0]->volume;
		}

		$sum_graft=$this->model_breakdown->sum_graft($id_breakdown);

		if($graft_volume > $minimo || $sum_graft[0]->volume + $graft_volume > $minimo) {
	        echo "11";//false
	    } else {
	        echo "1";//true
	    }
	}

	public function max_volume_punch(){
		$id_breakdown = $this->input->post('breakdown_punch');
		$punch_volume = $this->input->post('volume_punch');
		$sum_graft=$this->model_breakdown->sum_graft($id_breakdown);
		$sum_punch=$this->model_breakdown->sum_punch($id_breakdown);

		if($punch_volume > $sum_graft[0]->volume || $sum_punch[0]->volume + $punch_volume > $sum_graft[0]->volume){
	        echo "11";//false
	    } else {
	        echo "1";//true
	    }
		

		
	}

	public function max_volume_transplant(){
		$id_breakdown = $this->input->post('breakdown_transplant');
		$transplant_volume = $this->input->post('volume_transplant');
		$sum_graft=$this->model_breakdown->sum_graft($id_breakdown);
		$sum_punch=$this->model_breakdown->sum_punch($id_breakdown);
		$sum_transplant=$this->model_breakdown->sum_transplant($id_breakdown);

		if($sum_punch[0]->volume >0){
			$max=$sum_punch[0]->volume;
		}else if($sum_graft[0]->volume){
			$max=$sum_graft[0]->volume;
		}

		if($transplant_volume>$max || $sum_transplant[0]->volume + $transplant_volume > $max){
			echo "11";//false
		}else{
			echo "1";//true
		}
		

		
	}
}		